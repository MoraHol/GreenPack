<?php
// require dirname(dirname(__DIR__)) . "/dao/MaterialDao.php";
include("../../partials/verify-session.php");
// $materialDao = new MaterialDao();
// $materials = $materialDao->findAll();
?>
<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">

<head>
  <title>Textos | GreenPack</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="../../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="/css/all.min.css">
  <!-- Page level plugin CSS-->
  <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/vendor/dropzone/dropzone.css">
  <script src="/vendor/dropzone/dropzone.js"></script>
  <style>
    td.highlight {
      background-color: whitesmoke !important;
    }

    .text-area-control {
      border-left: 1px solid #d2d2d2;
      border-right: 1px solid #d2d2d2;
      border-top: 1px solid #d2d2d2;
    }

    #imgUpload {
      display: none;
    }
  </style>
</head>

<body class="white-edition">
  <div class="wrapper ">
    <?php include("../../partials/sidebar.php"); ?>
    <div class="main-panel">
      <?php include("../../partials/navbar.php");  ?>
      <div class="content">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Textos</li>
          </ol>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Pestañas de la pagina</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Imagen</th>
                      <th>Descripcion</th>
                      <th>Editar</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php include("../../partials/footer.html"); ?>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-4">Categoría:</div>
              <div class="col-sm-8 text-capitalize" id="nameCategoryLoad"></div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4">Descripcion:</div>
              <div class="col-sm-8 ">
                <textarea class="form-control text-area-control" id="descriptionCategoryInput" cols="30" rows="10"></textarea>
              </div>
            </div>
            <br>
            <div class="row" id="containerImageCategory">
              <div class="col-sm-4">Imagen:</div>
              <div class="col-sm-8 ">
                <img src="" id="imageCategory" class="img-responsive" width="300">
              </div>
              <div class="col"><button class="btn btn-danger" onclick="changeImage()">Cambiar</button></div>
            </div>
            <div id="imgUpload">
              <span>Suba la imagen de la categoría:</span>
              <div id="myId"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="buttonSubmitUpdate">Guardar Cambios</button>
          </div>
        </div>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="/js/jquery-2.2.4.min.js"></script>
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="https://unpkg.com/default-passive-events"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Chartist JS -->
    <script src="../../assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/material-dashboard.js?v=2.1.0"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../assets/demo/demo.js"></script>
    <script src="../../assets/js/script.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/vendor/jquery.formatCurrency-1.4.0.min.js"></script>
    <script src="/vendor/jquery.formatCurrency.all.js"></script>
    <script>
      $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
      $('#text-item').addClass('active')
    </script>
    <script>
      let $table
      // Call the dataTables jQuery plugin
      $(document).ready(function() {
        $('tr td:last-child').addClass('text-center')
        $table = $('#dataTable').DataTable({
          "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
              "sFirst": "Primero",
              "sLast": "Último",
              "sNext": "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
          },
          "ajax": 'api/get_categories.php',
          "columnDefs": [{
            "targets": -1,
            render: function(data, type, row) {
              $('tr td:last-child').addClass('text-center')
              $('td img').parent().addClass('text-center')
              $('td.sorting_1').addClass('text-capitalize')
              return `<a class="text-center" href="javascript:modalEdit('${row.name}',${row.id},'${row.description}','${row.image}')"><i class='fas fa-pen'></i></a>`
            }
          }, {
            "targets": 1,
            render: function(data, type, row) {
              $('td img').parent().addClass('text-center')
              $('td.sorting_1').addClass('text-capitalize')
              return `<img width="120" class="text-center" src="${row.image}">`
            }
          }],
          "columns": [{
              "data": "name"
            },
            {
              "data": 'image'
            },

            {
              "data": "description"
            },
            {
              "data": "id"
            }
          ]
        })
      })


      $('td img').parent().addClass('text-center')

      let categoryId

      function modalEdit(nameCategory, idCategory, description, image) {
        $('#modalEdit').modal()
        $('#nameCategoryLoad').text(nameCategory)
        $('#descriptionCategoryInput').val(description)
        $('#imageCategory').attr('src', image)
        categoryId = idCategory
      }
      $('#buttonSubmitUpdate').click(() => {
        if (flagImage) {
          if (myDropzone.getAcceptedFiles().length > 0) {
            response = JSON.parse(myDropzone.getAcceptedFiles()[0].xhr.responseText)
            link = response.link
            ajax(link, categoryId)
          } else {
            $.notify({
              message: 'Por favor Suba una Imagen',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
        } else {
          ajax($('#imageCategory').attr('src'), categoryId)
        }
      })
    </script>
    <script>
      let flagImage = false
      let myDropzone

      function changeImage() {
        flagImage = true
        $('#containerImageCategory').fadeOut()
        $('#myId').addClass('dropzone')
        $('#imgUpload').fadeIn()
        myDropzone = new Dropzone("div#myId", {
          url: "/admin/upload.php",
          method: 'post',
          paramName: 'photo',
          maxFiles: 1,
          acceptedFiles: "image/*",
          dictDefaultMessage: 'Sube tus archivos, arrastralos o haz click para buscarlos',
          dictMaxFilesExceeded: 'Solo se permite subir una imagen',
          dictInvalidFileType: 'Solo se permite imagenes'
        })
      }

      function ajax(link, idCategory) {
        $.post('api/update_category.php', {
          id: idCategory,
          description: $('#descriptionCategoryInput').val(),
          image: link
        }, (data, status) => {
          if (status == 'success') {
            $('#modalEdit').modal('hide')
            $.notify({
              message: 'Se ha actualizado la categoría',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'success'
            })
            console.log($table)
            $table.ajax.reload()
          } else {
            $('#modalEdit').modal('hide')
            $.notify({
              message: 'No se ha actualizado la categoría',
              title: 'Error',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
        })
      }
    </script>

</html>