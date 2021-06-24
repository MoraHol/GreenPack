let lista;

$(document).ready(function () {
  const loadSelectsCategories = () => {
    $.post(
      "../products/api/get_categories.php",
      function (data, textStatus, jqXHR) {
        lista = data;
      }
    );
  };

  recargarLista = () => {
    data = JSON.parse(lista);
    select = $("#category").val();
    subcategory = $("#subcategory");
    subcategory.find("option").remove();

    data.forEach((element) => {
      if (select === element.parentCategory) {
        subcategory.append(
          `<option value="${element.id}">${element.name}</option>`
        );
      }
    });
  };

  $("#category").change(function (e) {
    e.preventDefault();
    recargarLista();
  });

  loadSelectsCategories();
});
