<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">
<?php if (!isset($_SESSION)) {
  session_start();
}
require_once dirname(__DIR__) . "/model/Admin.php";
$admin = unserialize($_SESSION["admin"]);
if ($admin->getRole() == 3) {
  header("Location: /admin/blog");
}
if ($admin->getRole() == 1) {
  header("Location: /admin/quotations/");
}
?>

<head>
  <title>Dashboard | GreenPack</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <style>
    .ct-chart .ct-label {
      fill: #fafafa;
      color: #fafafa;
      display: -webkit-flex;
      display: flex;
      font-weight: bold;
    }

    .card-header-secundary {
      background-color: #e6e6e6fa !important;
    }
  </style>
</head>

<body class="white-edition">
  <div class="wrapper ">
    <?php include("partials/sidebar.php"); ?>
    <div class="main-panel">
      <?php include("partials/navbar.php");  ?>
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="row">
            <div class="col-xl-4 col-lg-12">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Cotizaciones semanales</h4>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> Actualizado hace 4 minutos
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-12">
              <div class="card card-chart">
                <div class="card-header card-header-secundary">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Cotizaciones</h4>
                  <!-- <div style="float: right"><span>Total: </span> <span id="totalQuotations"></span></div> -->
                  <p class="card-category"><i class="fas fa-square" style="color: #00bcd4 "></i> Cotizaciones contestadas
                    <br>
                    <i class="fas fa-square" style="color: #f44336"></i> Cotizaciones no contestadas</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <span>Total de Cotizaciones en el dia: &nbsp;</span> <span id="totalQuotations"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include("partials/footer.html"); ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="./assets/js/plugins/chartist.min.js"></script>
  <script src="./assets/js/plugins/chartist-plugin-pointlabels.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <script src="./assets/js/script.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>