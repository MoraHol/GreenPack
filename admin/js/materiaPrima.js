function elById(id) {
  return document.getElementById(id);
}

function deleteMaterial(idProduct, idMaterial) {
  $.post(
    "api/delete_material.php",
    {
      idProduct: idProduct,
      idMaterial: idMaterial,
    },
    (data, status) => {
      if (status == "success") {
        reloadPage();
        $.notify(
          {
            message: "Material eliminado",
            title: "<strong>Greenpack</strong>",
            icon: "fas fa-exclamation-triangle",
          },
          {
            type: "warning",
          }
        );
      }
    }
  );
}

function updateMaterial(idProduct, idMaterial, IdBtn) {
  let btn = $(`#btnUpdateMaterial${IdBtn}`).val();

  if (btn == "Modifica2") {
    $(`#e1${IdBtn}`).prop("readonly", false);
    $(`#e2${IdBtn}`).prop("readonly", false);
    $(`#e3${IdBtn}`).prop("readonly", false);
    $(`#btnUpdateMaterial${IdBtn}`).html("Actualizar");
    $(`#btnUpdateMaterial${IdBtn}`).val("modificado");
  } else {
    const e1 = $(`#e1${IdBtn}`).val();
    const e2 = $(`#e2${IdBtn}`).val();
    const e3 = $(`#e3${IdBtn}`).val();

    const materialInfo = {
      idMaterial,
      idProduct,
      e1,
      e2,
      e3,
    };

    $.post(
      "api/modify_factor.php",
      {
        factors: materialInfo,
      },
      (data, status) => {
        if (status === "success") {
          $.notify(
            {
              icon: "fas fa-exclamation-triangle",
              message: "Medida Actualizada",
            },
            {
              type: "warning",
            }
          );
        }
      }
    ).always(() => {
      $(`#e1${IdBtn}`).prop("readonly", true);
      $(`#e2${IdBtn}`).prop("readonly", true);
      $(`#e3${IdBtn}`).prop("readonly", true);

      $(`#btnUpdateMaterial${IdBtn}`).html("Actualizado");
      $(`#btnUpdateMaterial${IdBtn}`).val("modifica2");
    });
  }
}

$(document).ready(function () {
  let selectElement = document.querySelector(".material");
  if (selectElement == null) {
    selectElement = 1;
    return false;
  }

});
