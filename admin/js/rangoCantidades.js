function deleteCantidad(id) {
    $.post('api/delete_cantidad.php', {
      id: id
    }, (data, status) => {
      if (status == 'success') {
        location.reload();
        //reloadPage()
        $.notify({
          message: 'Cantidad eliminado',
          title: '<strong>Greenpack</strong>',
          icon: 'fas fa-exclamation-triangle'
        }, {
          type: 'warning'
        })
      }

    })
  }

  function updateCantidad(id) {

    const e1min = $(`#e1_min`).val();
    const e1max = $(`#e1_max`).val();
    const e2min = $(`#e2_min`).val();
    const e2max = $(`#e2_max`).val();
    const e3min = $(`#e3_min`).val();
    const e3max = $(`#e3_max`).val();

    const cantidadInfo = {
      id,
      e1min,
      e1max,
      e2min,
      e2max,
      e3min,
      e3max
    };

    $.post('api/modify_cantidad.php', {
        cantidades: cantidadInfo
      },
      (data, status) => {
        if (status === 'success') {
          $.notify({
            icon: 'fas fa-exclamation-triangle',
            message: 'Medida Actualizada',
          }, {
            type: 'warning'
          })
        }
      })
  }