let index = 2;

const loadSelectProducts = (index = 1) => {
  $.post("api/get_products.php", function (data, textStatus, jqXHR) {
    let productsAssoc = $(`#productoAssoc${index}`);
    $("#productoAsoc").val();
    productsAssoc.find("option").remove();
    productsAssoc.append(
      `<option value="0" selected disabled>Seleccionar</option>`
    );
    for (let i = 0; i < data.length; i++) {
      productsAssoc.append(
        `<option value="${data[i]["id"]}">${data[i]["name"]}</option>`
      );
    }
  });
};

const deleteProductAssoc = () => {};

$("#addProductAssoc").click(function (e) {
  e.preventDefault();
  $("#productsAssoc").append(`<div>
      <select class="form-control" style="margin-bottom: 10px; width:50%" id="productoAssoc${index}"></select></div>`);
  loadSelectProducts(index);
  index++;
});

const loadProductsSave = () => {
  idProduct = obtenerValorParametro();
  $.post(
    "api/get_products_assoc.php",
    { idProduct },
    function (data, textStatus, jqXHR) {
      for (let i = 1; i < data.length; i++) {
        $("#addProductAssoc").click();
      }
      setTimeout(() => {
        j = 1;
        for (let i = 0; i < data.length; i++) {
          $(`#productoAssoc${j}`).val(data[i]["productAssoc"]);
          j++;
        }
      }, 500);
    }
  );
};

function obtenerValorParametro(sParametroNombre) {
  var sPaginaURL = window.location.search.substring(1);
  var sParametro = sPaginaURL.split("=");
  return sParametro[1];
}

loadSelectProducts();
loadProductsSave();
