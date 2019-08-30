<?php
require_once dirname(dirname(__DIR__)) . "/dao/QuotationDao.php";
include("../partials/verify-session.php");
$quotationDao = new QuotationDao();
if (!isset($_GET["id"])) {
  header("Location: /admin/materials");
}
$quotation = $quotationDao->findById($_GET["id"]);
?>
<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">

<head>
  <title>Cotizacion No <?= $quotation->getId() ?> | GreenPack</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="/css/all.min.css">
  <!-- Page level plugin CSS-->
  <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/modal-confirm.css">
  <!-- Include Editor style. -->
  <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type='text/css' />
  <style>
    .alert-price {
      display: none;
    }
  </style>
</head>

<body class="white-edition">
  <div class="wrapper ">
    <?php include("../partials/sidebar.php"); ?>
    <div class="main-panel">
      <?php include("../partials/navbar.php");  ?>
      <div class="content">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item"><a href="/admin/quotations">Cotizaciones</a></li>
            <li class="breadcrumb-item active">Editar Cotizacion</li>
          </ol>
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="nameClient" class="bmd-label-floating">Nombre</label>
                  <input type="text" class="form-control" id="nameClient" value="<?= $quotation->getNameClient() ?>">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="lastName" class="bmd-label-floating">Apellido</label>
                  <input type="text" class="form-control" id="lastName" value="<?= $quotation->getLastNameClient() ?>">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="company" class="bmd-label-floating">Empresa</label>
                  <input type="text" class="form-control" id="company" value="<?= $quotation->getCompany() ?>">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="city" class="bmd-label-floating">Ciudad</label>
                  <input type="text" class="form-control" id="city" value="<?= $quotation->getCity() ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="address" class="bmd-label-floating">Direccion</label>
                  <input type="text" class="form-control" id="address" value="<?= $quotation->getAddress() ?>">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="emailClient" class="bmd-label-floating">Correo Electronico</label>
                  <input type="email" class="form-control" id="emailClient" value="<?= $quotation->getEmail() ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <label for="extraInformation">Observaciones:</label>
                <textarea class="form-control" id="extraInformation" rows="3"></textarea>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="phone" class="bmd-label-floating">Telefono</label>
                  <input type="text" class="form-control" id="phone" value="<?= $quotation->getPhoneNumber() ?>">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="cellphone" class="bmd-label-floating">Celular</label>
                  <input type="text" class="form-control" id="cellphone" value="<?= $quotation->getCellPhoneNumber() ?>">
                </div>
              </div>
            </div>
            <div class="card" id="products">
              <?php foreach ($quotation->getItems() as $item) { ?>
                <div class="row align-items-center">
                  <div class="col-md-2 text-center"><img src="<?= $item->getProduct()->getImages()[0]->getUrl() ?>" alt="" width="150" height="150"></div>
                  <div class="col-md-3 align-self-center">
                    <h5><?= $item->getProduct()->getName() ?></h5>
                    <br>
                    <p><span class="text-primary">Impresion:</span> <?= $item->isPrinting() ? "SI" : "NO" ?></p>
                    <?php if ($item->getProduct()->getCategory()->getId() == 1) { ?>
                      <p><span class="text-primary">Ventanilla:</span> <?= $item->isPla() ? "SI" : "NO" ?></p>
                      <p><span class="text-primary">Laminada:</span> <?= $item->isLam() ? "SI" : "NO" ?></p>
                      <p><span class="text-primary">Material:</span> <?= $item->getMaterial()->getName() ?></p>
                      <?php } else {
                          if ($item->isPrinting()) { ?>
                        <p><span class="text-primary">Número de tintas:</span> <?= $item->getNumberInks() ?></p>
                      <?php } ?>
                      <p><span class="text-primary">Tipo de Producto:</span> <?= $item->getTypeProduct() ?></p>
                      <p><span class="text-primary">Material: <select class="form-control select-option-material" id="<?= $item->getId() ?>"><?php foreach ($item->getProduct()->getMaterials() as  $material) { ?>
                              <option <?= $item->getMaterial() == $material ? "selected" : "" ?> value="<?= $material->getId() ?>"><?= $material->getName() ?></option>
                            <?php } ?></select></p>
                    <?php } ?>

                    <p><span class="text-primary">Medidas:</span></p>
                    <p>
                      <ul class="measurements list-inline">
                        <li class="list-inline-item"><span class="text-primary">Ancho:</span> <?= $item->getMeasurement()->getWidth() ?></li>
                        <li class="list-inline-item"><span class="text-primary"><?= $item->getProduct()->getCategory()->getId() == 1 ? "Fuelle" : "Alto" ?>:</span> <?= $item->getMeasurement()->getHeight() ?></li>
                        <li class="list-inline-item"><span class="text-primary">Largo:</span> <?= $item->getMeasurement()->getLength() ?></li>
                      </ul>
                    </p>
                    <?php if ($item->getProduct()->getCategory()->getId() != 1) { ?>
                      <p><span class="text-primary">Observaciones:</span> <?= $item->getObservations() ?></p>
                    <?php } ?>
                  </div>
                  <div class="col-md-2">
                    <p><span class="text-primary">Cantidad:</span></p>
                    <p><input type="number" id="quantity<?= $item->getId() ?>" value="<?= $item->getQuantity() ?>" class="form-control quantity"></p>
                  </div>
                  <div class="col-md-2">
                    <p><span class="text-primary">Precio:</span></p>
                    <p><input type="number" id="price<?= $item->getId() ?>" value="<?= $item->getPrice() ?>" class="form-control price"></p>
                  </div>
                  <div class="col">
                    <p><span class="text-primary">Total:</span></p>
                    <p class="money" id="total<?= $item->getId() ?>"><?= $item->calculateTotal() ?></p>
                  </div>
                </div>
                <div id="priceHelp<?= $item->getId() ?>" class="alert-price">

                </div>
                <hr>

              <?php } ?>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="payment-conditions">Condiciones de pago</label>
                      <textarea id="payment-conditions" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="delivery-time">Tiempos de envio</label>
                      <textarea id="delivery-time" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="validity">Vigencia</label>
                      <textarea id="validity" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row" style="margin-bottom: 20px; margin-top: 20px;">
              <div class="col text-center"><a class="btn btn-danger btn-lg" href="/admin/quotations/#no-solved"><i class="material-icons">arrow_back</i> Regresar</a></div>
              <div class="col text-center"><button onclick="recalculate()" class="btn btn-info btn-lg"><i class="material-icons">trending_up</i> Calcular Precios</button></div>
              <div class="col text-center"><button onclick="update()" class="btn btn-info btn-lg"><i class="material-icons md-48">update</i> Actualizar</button></div>
              <div class="col text-center"><button onclick="$('#modalContentEmail').modal()" class="btn btn-primary btn-lg"><i class="material-icons">email</i> Enviar Cotización</button></div>
            </div>
          </div>
        </div>
        <div id="load_pdf">
        </div>
        <?php include("../partials/footer.html"); ?>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="modalContentEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cuerpo del Mensaje</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="content"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="send()" class="btn btn-primary">Enviar</button>
        </div>
      </div>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="/js/jquery-2.2.4.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="../assets/js/script.js"></script>
  <script src="/vendor/jquery.formatCurrency-1.4.0.min.js"></script>
  <script src="/vendor/jquery.formatCurrency.all.js"></script>
  <script src="/vendor/froala_editor.pkgd.min.js"></script>
  <script src="/js/es.js"></script>
  <script>
    $(() => {
      $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
      $('#quotations-item').addClass('active')
      $('#extraInformation').val(`<?= $quotation->getExtraInformation() ?>`)
      $('#payment-conditions').val(`<?= $quotation->getPaymentConditions() ?>`)
      $('#delivery-time').val(`<?= $quotation->getDeliveryTime() ?>`)
      $('#validity').val(`<?= $quotation->getValidity() ?>`)
      $('#load_pdf').html('')
      $('#load_pdf').append(`<embed  src="/services/view-quotation.php?id=<?= $quotation->getId() ?>#toolbar=0&navpanes=0&scrollbar=0&statusbar=0&zoom=55" type="application/pdf" width="100%" height="600px" />`)
      formatMoney()
      $('.price').keyup(function() {
        let id = $(this).context.id.substring(5, $(this).context.id.length)

      })
      $('.quantity').keyup(function() {
        let id = $(this).context.id.substring(8, $(this).context.id.length)
        eventChangeValuesItem(id)
      })
      $('.price').change(function() {
        let id = $(this).context.id.substring(5, $(this).context.id.length)
        eventChangeValuesItem(id)
      })
      $('.quantity').change(function() {
        let id = $(this).context.id.substring(8, $(this).context.id.length)
        eventChangeValuesItem(id)
      })

    })

    function eventChangeValuesItem(id) {
      calculateTotal(id)
      verifyDirectCost(id)
    }

    function verifyDirectCost(id) {
      $.get('api/calculate_cost_item.php', {
        id
      }, (data, status) => {
        let cost = parseInt(data)
        if (parseInt($(`#price${id}`).val()) < cost) {
          console.log($(`#priceHelp${id}`))
          $(`#priceHelp${id}`).html(`<div class="alert alert-danger fade show mb-0">Estas por debajo del costo del producto, el cual equivale a $${cost} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>`)
          $(`#priceHelp${id}`).fadeIn()
        } else {
          $(`#priceHelp${id}`).fadeOut()
        }
      })
    }

    function calculateTotal(id) {
      let quantity = parseInt($(`#quantity${id}`).val())
      let price = parseInt($(`#price${id}`).val())
      let total = quantity * price
      $(`#total${id}`).html(total)
      formatMoney()
    }

    function formatMoney() {
      $('.money').formatCurrency({
        region: 'es-CO'
      })
    }

    function viewPdf(id) {
      $('#load_pdf').html('')
      $('#load_pdf').append(`<embed  src="/services/view-quotation.php?id=${id}#toolbar=0&navpanes=0&scrollbar=0&statusbar=0%zoom=20" type="application/pdf" width="100%" height="600px" />`)
    }

    function recalculate() {
      $.post('api/recalculate_prices.php', {
          id: `<?= $_GET["id"]; ?>`
        },
        (data, status) => {
          if (status == 'success') {
            location.reload()
          }
        })
    }

    function send() {
      update()
      $('#modalContentEmail').modal('hide')
      $.notify({
        message: 'Enviando Correo',
        title: 'Procesando',
        icon: 'email'
      }, {
        type: 'info'
      })
      $.post('api/sent_email.php', {
        id: `<?= $quotation->getId() ?>`,
        content: editor.html.get()
      }, (data, status, xhr) => {
        if (status == 'success' && xhr.readyState == 4) {
          $.notify({
            message: 'La cotizacion ha sido enviada correctamente al Cliente',
            title: 'Exito',
            icon: 'email'
          }, {
            type: 'success'
          })
        }
      })
    }

    function update() {
      let products = []
      $.each($('.price'), function() {
        let id = $(this).context.id.substring(5, $(this).context.id.length)
        let product = {}
        product.price = $(this).val()
        product.quantity = $(`#quantity${id}`).val()
        product.material = $('#' + id).val()
        products.push(product)
      })
      $.post('api/update-quotation.php', {
        id: `<?= $quotation->getId() ?>`,
        name: $('#nameClient').val(),
        lastname: $('#lastName').val(),
        company: $('#company').val(),
        city: $('#city').val(),
        address: $('#address').val(),
        email: $('#emailClient').val(),
        extra: $('#extraInformation').val(),
        phone: $('#phone').val(),
        cellphone: $('#cellphone').val(),
        products: JSON.stringify(products),
        paymentConditions: $('#payment-conditions').val(),
        deliveryTime: $('#delivery-time').val(),
        validity: $('#validity').val()
      }, (data, status) => {
        if (status == 'success') {
          $.notify({
            message: 'Se ha actualizado la cotizacion',
            title: 'Exito',
            icon: 'notification_important'
          }, {
            type: 'success'
          })
          viewPdf(`<?= $quotation->getId() ?>`)
        }
        if (status == 'notmodified') {
          $.notify({
            message: 'No se ha cambiado ningun valor',
            title: 'Actualización',
            icon: 'warning'
          }, {
            type: 'warning'
          })
        }
      })
    }
    var editor = new FroalaEditor('#content', {
      language: 'es',
      height: 300,
      imageUploadParam: 'photo',
      imageUploadURL: '/admin/upload.php',
      imageUploadMethod: 'POST',
      videoUploadParam: 'video',
      videoUploadURL: 'upload-video.php',
      imageUploadMethod: 'POST',
      fileUploadParam: 'file',
      fileUploadURL: '/admin/upload-file.php',
      fileUploadMethod: 'POST',
      events: {
        'image.removed': function($img) {
          img = $img[0]
          $.post('/admin/image_delete.php', {
            src: $img.attr('src')
          }, (data, status) => {
            if (status != "success") {
              alert("error")
            }
          })
        },
        'file.removed': function($file) {
          file = $file[0]
          $.post('/admin/file_delete.php', {
            src: $file.attr('src')
          }, (data, status) => {
            if (status != "success") {
              alert("error")
            }
          })
        },
        'keyup': function(keyupEvent) {
          if (document.domain != 'localhost') {
            $('.fr-wrapper>div:first-child').css('visibility', 'hidden')
          }
        }
      }
    }, () => {
      editor.html.set(`<html><body><p>Nos permitimos enviarle su cotizacion</p><p>cotizacion generada</p></body></html>`)
      if (document.domain != 'localhost') {
        $('.fr-wrapper>div:first-child').css('visibility', 'hidden')
      }
    })

    $('.select-option-material').change(function() {
      $.post('api/calculate_price_item.php', {
        id: $(this).attr("id"),
        material: $(this).val()
      }, (data, status) => {
        $(`#price${$(this).attr('id')}`).val(data)
        calculateTotal($(this).attr("id"))
      })
    })
  </script>
</body>

</html>