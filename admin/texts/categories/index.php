<?php
// require dirname(dirname(__DIR__)) . "/dao/MaterialDao.php";
include("../../partials/verify-session.php");
include_once('../../modals/categorias.php');
// $materialDao = new MaterialDao();
// $materials = $materialDao->findAll();
?>
<!-- author: Teenus SAS, github: Teenus SAS -->
<!doctype html>
<html lang="es">

<head>
  <title>Textos | GreenPack</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../assets/css/material-dashboard.css?v=2.1.0" />
  <link rel="stylesheet" href="/css/all.min.css">
  <link rel="stylesheet" href="/vendor/datatables/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/vendor/dropzone/dropzone.css">
  
  <script src="/vendor/dropzone/dropzone.js"></script>
  <style>
    td.highlight {
      background-color: whitesmoke !important;
    }

    .text-area-control {
      border-left: 1px solid #d2d2d2;
      border-right: 1px solid #d2d2d2;
      border-top: 1px solid #d2d2d2;
    }

    #imgUpload {
      display: none;
    }

    #subcategories{
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      grid-gap: 1em;
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
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Textos</li>
          </ol>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                <div class="card__left col-4">
                  <i class="fas fa-table"></i>
                  Pestañas de la pagina
                </div>
                
                <div class="card__rigth col-8 pr-5">
                  <a href="javascript:modalCreate()" class="btn btn-success text-white float-right">CREAR</a>
                </div>

              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Imagen</th>
                      <th>Descripcion</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                </table>
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
    <!-- <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script> -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../../assets/js/plugins/chartist.min.js"></script>
    <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
    <script src="../../assets/js/material-dashboard.js?v=2.1.0"></script>
    <script src="../../assets/demo/demo.js"></script>
    <script src="../../assets/js/script.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/vendor/jquery.formatCurrency-1.4.0.min.js"></script>
    <script src="/vendor/jquery.formatCurrency.all.js"></script>
    <script src="../../js/categorias.js"></script>

</html>