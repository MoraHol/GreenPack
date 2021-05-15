<?php
include("../../partials/verify-session.php");
?>
<!-- author: Teenus SAS, github: Teenus SAS -->
<!doctype html>
<html lang="es">

<head>
  <title>Textos | Greenpack</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="../../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="/css/all.min.css">
  <!-- Page level plugin CSS-->
  <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="white-edition">
  <div class="wrapper">
    <?php include("../../partials/sidebar.php"); ?>
    <div class="main-panel">
      <?php include("../../partials/navbar.php");  ?>
      <div class="content">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/admin/texts">Textos</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/admin/texts/home">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Numeros</li>
          </ol>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Números</div>
            <div class="card-body">
              <div class="form-group">
                <label for="innovations">Innovaciones Realizadas</label>
                <br>
                <input type="number" required placeholder="Ej: 200" id="innovations" class="form-control">
              </div>
              <div class="form-group">
                <label for="products">Productos Ofertados: </label>
                <br>
                <input type="number" required placeholder="Ej: 200" id="products" class="form-control">
              </div>
              <div class="form-group">
                <label for="clients">Clientes</label>
                <br>
                <input type="number" required placeholder="Ej: 200" id="clients" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col"></div>
            <div class="col"><button class="btn btn-primary btn-lg" id="update-numbers">Actualizar</button></div>
            <div class="col"></div>
          </div>
        </div>
        <?php include("../../partials/footer.html"); ?>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="/js/jquery-2.2.4.min.js"></script>
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="https://unpkg.com/default-passive-events"></script>
    <!-- <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script> -->
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Chartist JS -->
    <script src="../../assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/material-dashboard.js?v=2.1.0"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../assets/demo/demo.js"></script>
    <script src="../../assets/js/script.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/vendor/jquery.formatCurrency-1.4.0.min.js"></script>
    <script src="/vendor/jquery.formatCurrency.all.js"></script>
    <script>
      // get numbers for update
      $.get('api/get_numbers.php', (data, status) => {
        let numbers = data
        $('#innovations').val(numbers[1].value)
        $('#products').val(numbers[0].value)
        $('#clients').val(numbers[2].value)
      })


      $('#update-numbers').click(() => {
        let innovations = $('#innovations').val()
        let products = $('#products').val()
        let clients = $('#clients').val()
        console.log(innovations, products, clients)
        if (innovations != undefined && products != undefined && clients != undefined &&
          innovations != "" && products != "" && clients != "") {
          $.post('api/update_numbers.php', {
            innovations,
            products,
            clients
          }, (data, status) => {
            if (status == 'success') {
              $.notify({
                message: 'Sección actualizada',
                //title: 'Greenpack',
                icon: 'notification_important'
              }, {
                type: 'success'
              })
            } else {
              $.notify({
                message: 'Error',
                //title: 'Greenpack',
                icon: 'notification_important'
              }, {
                type: 'danger'
              })
            }
          })
        } else {
          $.notify({
            message: 'Completa los números',
            //title: 'Greenpack',
            icon: 'notification_important'
          }, {
            type: 'warning'
          })
        }
      })
    </script>
    <script>
    $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
      $('#text-item').addClass('active')
      </script>
</body>

</html>