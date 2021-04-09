function deleteImage(id, url) {
  $.post(
    "/admin/image_delete.php",
    {
      src: url,
    },
    (data, status) => {
      if (status != "success") {
        alert("error");
      }
    }
  );
  $.post(
    "api/image_delete.php",
    {
      id: id,
    },
    (data, status) => {
      if (status == "success") {
        $.notify(
          {
            message: "Imagen Eliminada",
            icon: "fas fa-exclamation-triangle",
          },
          {
            type: "warning",
          }
        );
        reloadPage();
      }
    }
  );
}
