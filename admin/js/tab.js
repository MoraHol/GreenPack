function deleteTab(id) {
    $.post('api/delete_tab_product.php', {
      id: id
    }, (data, status) => {
      if (status == 'success') {
        location.reload()
      }
    })
  }
  const urlParams = new URLSearchParams(window.location.search);
  const updated = urlParams.get('updated');

  if (updated == 'true') {
    $.notify({
      message: 'Pestaña actualizada',
      icon: 'notification_important'
    }, {
      type: 'success'
    })
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", location.pathname + '?id=' + urlParams.get('id'));
    }
  }