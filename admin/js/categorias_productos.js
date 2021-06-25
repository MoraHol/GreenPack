let lista;

$(document).ready(function () {
  const loadSelectsCategories = () => {
    $.post(
      "../products/api/get_categories.php",
      function (data, textStatus, jqXHR) {
        lista = data;
        info = JSON.parse(data);
        select = $("#category");
        select2 = $("#subcategory");
        select.append(
          `<option value="0" selected disabled>Seleccionar</option>`
        );
        info.forEach((element) => {
          if (element.parentCategory == null)
            select.append(
              `<option value="${element.id}">${element.name}</option>`
            );
        });
      }
    );
    loadProductsCategory();
  };

  recargarLista = () => {
    data = JSON.parse(lista);
    select = $("#category").val();
    subcategory = $("#subcategory");
    subcategory.find("option").remove();
    subcategory.append(
      `<option value="0" selected disabled>Seleccionar</option>`
    );
    data.forEach((element) => {
      if (select === element.parentCategory) {
        subcategory.append(
          `<option value="${element.id}">${element.name}</option>`
        );
      }
    });
  };

  const loadProductsCategory = () => {
    idProduct = obtenerValorParametro();
    $.post(
      "../products/api/get_products.php",
      { idProduct: idProduct },
      function (data, textStatus, jqXHR) {
        $("#category").val(data.category.id);
        setTimeout(() => {
          recargarLista();
        }, 5);
        setTimeout(() => {
          $("#subcategory").val(data.subcategory);
        }, 7);
      }
    );
  };

  $("#category").change(function (e) {
    e.preventDefault();
    recargarLista();
  });

  loadSelectsCategories();
});
