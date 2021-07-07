// Call the dataTables jQuery plugin

$(document).ready(function () {
  let table = $(".dataTable").DataTable({
    order: [[0, "desc"]],
    scrollY: "500px",
    scrollCollapse: true,
    paging: false,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    columnDefs: [
      {
        targets: [0, 1, 2],
        orderable: true,
      },
    ],
    headerCallback: function (thead, data, start, end, display) {
      thead.style.width = "1000px";
    },
    initComplete: function (settings, json) {
      /* console.log(settings, json); */
      /*  $(".dataTable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");  */
      /* table.columns.adjust(); */
    },
  });

  table.columns.adjust();

  table.on("draw", function () {
    $(".money").formatCurrency({
      region: "es-CO",
    });
  });
  $("#dataTable tbody").on("mouseenter", "td", function () {
    var colIdx = table.cell(this).index().column;

    $(table.cells().nodes()).removeClass("highlight");
    $(table.column(colIdx).nodes()).addClass("highlight");
  });
});

function activateTheads() {
  setTimeout(() => {
    document.getElementById("thId-third").click();
    document.getElementById("thId-second").nextElementSibling.click();
    document
      .querySelector('a[href$="solved"]')
      .closest("li")
      .removeEventListener("click", activateTheads);
    document
      .querySelector('a[href$="no-solved"]')
      .closest("li")
      .removeEventListener("click", activateTheads);
  }, 180);
}

document
  .querySelector('a[href$="no-solved"]')
  .closest("li")
  .addEventListener("click", activateTheads);

document
  .querySelector('a[href$="solved"]')
  .closest("li")
  .addEventListener("click", () => {
    setTimeout(() => {
      document.getElementById("thId-second").click();
    }, 180);
  });

/*  document.getElementById('thId-third').click(); */
$(() => {
  $(".money").formatCurrency({
    region: "es-CO",
  });
  $(".sidebar div.sidebar-wrapper ul.nav li:first").removeClass("active");
  $("#quotations-item").addClass("active");
  var url = document.location.toString();
  if (url.match("#")) {
    $('.nav-tabs a[href="#' + url.split("#")[1] + '"]').tab("show");
  }
});
var editor = new FroalaEditor(
  "#content",
  {
    language: "es",
    height: 300,
    imageUploadParam: "photo",
    imageUploadURL: "/admin/upload.php",
    imageUploadMethod: "POST",
    videoUploadParam: "video",
    videoUploadURL: "upload-video.php",
    imageUploadMethod: "POST",
    fileUploadParam: "file",
    fileUploadURL: "/admin/upload-file.php",
    fileUploadMethod: "POST",
    events: {
      "image.removed": function ($img) {
        img = $img[0];
        $.post(
          "/admin/image_delete.php",
          {
            src: $img.attr("src"),
          },
          (data, status) => {
            if (status != "success") {
              alert("error");
            }
          }
        );
      },
      "file.removed": function ($file) {
        file = $file[0];
        $.post(
          "/admin/file_delete.php",
          {
            src: $file.attr("src"),
          },
          (data, status) => {
            if (status != "success") {
              alert("error");
            }
          }
        );
      },
      keyup: function (keyupEvent) {
        if (document.domain != "localhost") {
          $(".fr-wrapper>div:first-child").css("visibility", "hidden");
        }
      },
    },
  },
  () => {
    editor.html.set(
      `<html><body><p>Muy buen dia. Es un gusto saludarlo(a). Esperamos que todo le este saliendo de maravilla. Para nosotros es un gusto enviarle su cotizacion</p><p>Cordialmente</p></body></html>`
    );
    if (document.domain != "localhost") {
      $(".fr-wrapper>div:first-child").css("visibility", "hidden");
    }
  }
);

function viewPdf(id) {
  $("#load_pdf").html(
    `<div class="wall-loading"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>`
  );
  $(".wall-loading").width($("#load_pdf").width());
  $(".wall-loading").height($("#load_pdf").height());
  $("#load_pdf").append(`<div class="card"></div>`);
  $("#load_pdf .card").append(
    `<embed  src="/services/view-quotation.php?id=${id}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />`
  );
  $("#load_pdf .card embed")[0].onload = fadeSpinner();
  location.href = "#load_pdf";
}

function fadeSpinner() {
  $(".wall-loading").delay(100).fadeOut("slow");
  $(".spinner").delay(100).fadeOut("slow");
  $(".wall-loading").css("z-index", -20);
}

function sentEmail(id) {
  $("#btn-send-email").attr("data-id-quotation", id);
  $("#modalContentEmail").modal();
}

function send() {
  $.notify(
    {
      message: "Enviando Correo...",
      //title: 'Greenpack',
      icon: "email",
    },
    {
      type: "info",
    }
  );
  $("#modalContentEmail").modal("hide");
  $.post(
    "api/sent_email.php",
    {
      id: $("#btn-send-email").attr("data-id-quotation"),
      content: editor.html.get(),
    },
    (data, status, xhr) => {
      if (status == "success" && xhr.readyState == 4) {
        location.href = "#no-solved";
        location.reload();
      }
    }
  );
}

function openWindow(id) {
  window.open(
    `/services/view-quotation.php?id=${id}`,
    "Cotizacion No " + id,
    "width=600, height=800"
  );
}
