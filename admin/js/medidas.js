function deleteMeasurement(idProduct, idMeasurement) {
  $.post(
    "api/delete_measurement.php",
    {
      idProduct: idProduct,
      idMeasurement: idMeasurement,
    },
    (data, status) => {
      if (status == "success") {
        reloadPage();
        $.notify(
          {
            icon: "fas fa-exclamation-triangle",
            message: "Medida eliminada",
          },
          {
            type: "warning",
          }
        );
        location.href = "#measurement-container";
      }
    }
  );
}

function updateMeasurement(
  idProduct,
  idMeasurement,
  indexMeasurement,
  evTarget
) {
  const codigoInput = $(`#codigo${indexMeasurement}`).val();
  const widthInput = $(`#width${indexMeasurement}`).val();
  const heightInput = $(`#height${indexMeasurement}`).val();
  const lengthInput = $(`#length${indexMeasurement}`).val();
  // const windowInput = $(`#window${indexMeasurement}`).val();
  const largoUtilInput = $(`#largoUtil${indexMeasurement}`).val();
  const anchoTotalInput = $(`#anchoTotal${indexMeasurement}`).val();
  const VentaMinimaImpresaInput = $(
    `#VentaMinimaImpresa${indexMeasurement}`
  ).val();
  const VentaMinimaGenericaInput = $(
    `#VentaMinimaGenerica${indexMeasurement}`
  ).val();

  if (evTarget.closest("button").value === "Modificar") {
    /*   evTarget.closest('button').value = 'Guardar'; */
    evTarget.closest("button").value = "Guardar";
    evTarget.closest("button").textContent = "Guardar";

    $(`#codigo${indexMeasurement}`).prop("readonly", false);
    $(`#width${indexMeasurement}`).prop("readonly", false);
    $(`#height${indexMeasurement}`).prop("readonly", false);
    $(`#length${indexMeasurement}`).prop("readonly", false);
    $(`#largoUtil${indexMeasurement}`).prop("readonly", false);
    $(`#anchoTotal${indexMeasurement}`).prop("readonly", false);
    $(`#VentaMinimaImpresa${indexMeasurement}`).prop("readonly", false);
    $(`#VentaMinimaGenerica${indexMeasurement}`).prop("readonly", false);

    evTarget.classList.replace("btn-warning", "btn-info");
  } else {
    const measurementInfo = {
      idMeasurement: idMeasurement,
      codigo: codigoInput,
      width: widthInput,
      height: heightInput,
      length: lengthInput,
      largoUtil: largoUtilInput,
      anchoTotal: anchoTotalInput,
      ventaMinimaImpresa: VentaMinimaImpresaInput,
      ventaMinimaGenerica: VentaMinimaGenericaInput,
    };

    $.post(
      "api/modify_measurements.php",
      {
        measurements: measurementInfo,
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
      evTarget.closest("button").value = "Modificar";
      evTarget.closest("button").innerHTML =
        '<i class="fas fa-pencil-alt"></i>';

      $(`#codigo${indexMeasurement}`).prop("readonly", true);
      $(`#width${indexMeasurement}`).prop("readonly", true);
      $(`#height${indexMeasurement}`).prop("readonly", true);
      $(`#lenght${indexMeasurement}`).prop("readonly", true);
      $(`#largoUtil${indexMeasurement}`).prop("readonly", true);
      $(`#anchoTotal${indexMeasurement}`).prop("readonly", true);
      $(`#VentaMinimaImpresa${indexMeasurement}`).prop("readonly", true);
      $(`#VentaMinimaGenerica${indexMeasurement}`).prop("readonly", true);

      evTarget.classList.replace("btn-info", "btn-warning");
    });
  }
}

function addMeasurement2() {
  indexMeasurement++;
  $("#measurements").slideDown();
  $("#measurements").append(`
      <li>Medida ${indexMeasurement}:
        <div class="row">
          <div class="col-2 ml-4 codigo">
            <label for="codigo${indexMeasurement}">Codigo:</label>
            <input type="text" id="codigo${indexMeasurement}" class="form-control">
          </div>
          <div class="col-2 ml-4">
            <label for="width${indexMeasurement}">Ancho:</label>
            <input type="number" id="width${indexMeasurement}" class="form-control">
          </div>
          <div class="col-2 height">
            <label for="height${indexMeasurement}">Alto/Fuelle:</label>
            <input type="number" id="height${indexMeasurement}" class="form-control">
          </div>
          <div class="col-2 length">
            <label for="length${indexMeasurement}">Largo:</label>
            <input type="number" id="length${indexMeasurement}" class="form-control">
          </div>
          
          <div class="col-2 LargoUtil">
            <label for="largoUtil${indexMeasurement}">Largo Útil:</label>
            <input type="number" id="largoUtil${indexMeasurement}" class="form-control">
          </div>
          
          <div class="col-2 ml-4 anchototal">
            <label for="anchoTotal${indexMeasurement}">Ancho Total:</label>
            <input type="number" id="anchoTotal${indexMeasurement}" class="form-control">
          </div>
          
          <!--</div>
          <div class="row">-->
          <div class="col-2 Pliego">
            <label for="Pliego${indexMeasurement}"><?= $nameAdditional ?>Piezas x Pliego:</label>
            <input type="number" id="pliego${indexMeasurement}" class="form-control">
          </div>
          <div class="col-2 VentaMinimaImpresa">
            <label for="VentaMinimaImpresa${indexMeasurement}">Venta Mínima Impresa:</label>
            <input type="number" id="VentaMinimaImpresa${indexMeasurement}" class="form-control">
          </div>
          <div class="col-2 VentaMinimaGenerica">
            <label for="VentaMinimaGenerica${indexMeasurement}">Venta Mínima Genérica:</label>
            <input type="number" id="VentaMinimaGenerica${indexMeasurement}" class="form-control">
          </div>
          
          
        </div>
      </li>`);
  /* $('select').niceSelect() */
  /* if (parseInt($('#category').val()) == 6) {
      $('.height').children('label').text('Largo:')
      $('.length').css('display', 'none')
      $('.window').css('display', 'none')
      $(`#length${indexMeasurement}`).val(0)
      $(`#window${indexMeasurement}`).val(0)
    } */
}
