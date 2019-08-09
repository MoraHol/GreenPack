<?php
// require dirname(dirname(__DIR__)) . "/dao/MaterialDao.php";
include("../../partials/verify-session.php");
// $materialDao = new MaterialDao();
// $materials = $materialDao->findAll();
?>
<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">

<head>
  <title>Textos | GreenPack</title>
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
  <style>
    td.highlight {
      background-color: whitesmoke !important;
    }
  </style>
</head>

<body class="white-edition">
  <div class="wrapper ">
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
            <li class="breadcrumb-item active">Inicio</li>
          </ol>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Pestañas de la pagina</div>
            <div class="card-body">
              <!--Carousel Wrapper-->
              <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">
                <h5>Imagenes del Producto</h5>
                <!--Controls-->
                <div class="controls-top text-center">
                  <a class="black-text" href="#multi-item-example" data-slide="prev"><i class="fas fa-angle-left fa-3x pr-3"></i></a>
                  <a class="black-text" href="#multi-item-example" data-slide="next"><i class="fas fa-angle-right fa-3x pl-3"></i></a>
                </div>
                <!--/.Controls-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                  <!--First slide-->
                  <div class="carousel-item active">
                    <?php $counter = 0;
                    foreach ($product->getImages() as $image) {
                      if ($counter % 4 == 0 && $counter != 0) {
                        echo "</div>";
                        echo "<div class='carousel-item'>";
                      } ?>
                      <div class="col-md-3 mb-3">
                        <div class="card">
                          <div class="imagen" style="background-image: url(<?php echo $image->getUrl(); ?>);">
                            <div class="info">
                              <p class="descripcion"><button class="btn btn-danger" onclick="deleteImage(<?php echo $image->getId(); ?>,'<?php echo $image->getUrl(); ?>')">Eliminar</button></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                      $counter++;
                    }
                    if ($counter % 4 != 0) {
                      echo "</div>";
                    } ?>

                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="myId">Suba las imagenes del producto:</label>
                <div id="myId" class="dropzone"></div>
              </div>
            </div>
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
    <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
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
</body>

</html>