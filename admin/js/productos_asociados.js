let index = 2;

const loadProducts = (index = 1) => {
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
  loadProducts(index);
  index++;
});

loadProducts();
