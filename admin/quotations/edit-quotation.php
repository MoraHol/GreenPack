<?php
require_once dirname(dirname(__DIR__)) . "/dao/QuotationDao.php";
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
                <label for="extraInformation">Información extra</label>
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
                    <p><span class="text-primary">Con ventanilla:</span> <?= $item->isPla() ? "SI" : "NO" ?></p>
                    <p><span class="text-primary">Laminada:</span> <?= $item->isLam() ? "SI" : "NO" ?></p>
                    <p><span class="text-primary">Material:</span> <?= $item->getMaterial()->getName() ?></p>
                    <p><span class="text-primary">Medidas:</span></p>
                    <p>
                      <ul class="measurements list-inline">
                        <li class="list-inline-item"><span class="text-primary">Ancho:</span> <?= $item->getMeasurement()->getWidth() ?></li>
                        <li class="list-inline-item"><span class="text-primary">Alto:</span> <?= $item->getMeasurement()->getHeight() ?></li>
                        <li class="list-inline-item"><span class="text-primary">Largo:</span> <?= $item->getMeasurement()->getLength() ?></li>
                      </ul>
                    </p>
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
                <hr>
              <?php } ?>
            </div>
            <div class="row" style="margin-bottom: 20px; margin-top: 20px;">
              <div class="col text-center"><a class="btn btn-danger btn-lg" href="/admin/quotations/#no-solved"><i class="material-icons">arrow_back</i> Regresar</a></div>
              <div class="col text-center"><button onclick="update()" class="btn btn-info btn-lg"><i class="material-icons md-48">update</i> Actualizar</button></div>
              <div class="col text-center"><button onclick="recalculate()" class="btn btn-info btn-lg"><i class="material-icons">trending_up</i> Calcular Precios</button></div>
              <div class="col text-center"><button onclick="send()" class="btn btn-primary btn-lg"><i class="material-icons">email</i> Enviar Cotización</button></div>
            </div>
          </div>
        </div>
        <div id="load_pdf">
        </div>
        <?php include("../partials/footer.html"); ?>
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
  <script>
    $(() => {
      $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
      $('#quotations-item').addClass('active')
      $('extraInformation').val(`<?= $quotation->getExtraInformation() ?>`)
      $('#load_pdf').html('')
      $('#load_pdf').append(`<embed  src="/services/view-quotation.php?id=<?= $quotation->getId() ?>#toolbar=0&navpanes=0&scrollbar=0&statusbar=0&zoom=55" type="application/pdf" width="100%" height="600px" />`)
      formatMoney()
      $('.price').keyup(function() {
        let id = $(this).context.id.substring(5, $(this).context.id.length)
        calculateTotal(id)
      })
      $('.quantity').keyup(function() {
        let id = $(this).context.id.substring(8, $(this).context.id.length)
        calculateTotal(id)
      })
    })

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
      $.notify({
        message: 'Enviando Correo',
        title: 'Procesando',
        icon: 'email'
      }, {
        type: 'info'
      })
      $.post('api/sent_email.php', {
        id: `<?= $quotation->getId() ?>`
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
        products: JSON.stringify(products)
      }, (data, status) => {
        if (status == 'success') {
          $.notify({
            message: 'Se ha actulizado la cotizacion',
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
            title: 'Actualizacion',
            icon: 'warning'
          }, {
            type: 'warning'
          })
        }
      })
    }
  </script>
</body>

</html>