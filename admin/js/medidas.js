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
