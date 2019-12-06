<?php include_once("../partials/verify-session.php");
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/ProductDao.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/MaterialDao.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/MeasurementDao.php";

if (!isset($_GET["id"]) || !isset($_GET["id_material"])) {
  header("Location: /admin/products/");
}

$productDao = new ProductDao();
$measurementDao = new MeasurementDao();
$materialDao = new MaterialDao();

$indexMeasurement = 1;

$material = $materialDao->findById($_GET["id_material"]);
$product = $productDao->findById($_GET["id"]);
$measurements = $measurementDao->findByMaterial($_GET["id_material"], $product);

?>

<?php
include("../partials/verify-session.php");
?>
<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">

<head>
  <title>GreenPack | Productos</title>
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
    <?php include("../partials/sidebar.php") ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include("../partials/navbar.php"); ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/admin/">Dashboard</a>
            </li>
            <li class="breadcrumb-item "><a href="/admin/products">Productos</a></li>
            <li class="breadcrumb-item"><a href="/admin/products/update_product.php?id=<?= $product->getId() ?>"></a>Actualizar Producto | <?= $product->getName() ?></li>
            <li class="breadcrumb-item active">Medidas | <?= $material->getName() ?> </li>
          </ol>


          <div class="form-gruop">
            <label for="campo1">Medidas:</label>
            <ul class="list-unstyled" id="measurements">
              <?php foreach ($measurements as $measurement) {
                ?>
                <li>Medida <?= $indexMeasurement ?>:<div class="row">
                    <div class="col">
                      <label for="width<?= $indexMeasurement ?>">Ancho:</label>
                      <input type="number" id="width<?= $indexMeasurement ?>" class="form-control" value="<?= $measurement->getWidth(); ?>" readonly></div>
                    <div class="col height">
                      <label for="height<?= $indexMeasurement ?>">Alto:</label>
                      <input type="number" id="height<?= $indexMeasurement ?>" class="form-control" value="<?= $measurement->getHeight(); ?>" readonly></div>
                    <div class="col lenght">
                      <label for="lenght<?= $indexMeasurement ?>">Largo:</label>
                      <input type="number" id="lenght<?= $indexMeasurement ?>" class="form-control" value="<?= $measurement->getLength(); ?>" readonly></div>
                    <div class="col window">
                      <label for="window<?= $indexMeasurement ?>">Ventana:</label>
                      <input type="number" id="window<?= $indexMeasurement ?>" class="form-control" value="<?= $measurement->getWindow(); ?>" readonly></div>
                    <div class="col-sm-2">
                      <button class="btn btn-danger" onclick="deleteMeasurement(<?= $product->getId() ?>,<?= $measurement->getId() ?>)">Eliminar</button></div>
                  </div>
                </li>
              <?php $indexMeasurement++;
              } ?>
            </ul>
          </div>
          <button class="btn btn-primary" onclick="addMeasurement()" title="Agregar una medida"><i class="fas fa-plus"></i></button>
          <button id="btnUploadExcel" class="btn btn-primary" title="Cargar Medidas"><i class="fas fa-cloud-upload-alt"></i></button>


          <div class="row" style="margin-bottom: 20px; margin-top: 60px;">
            <div class="col"><a href="/admin/products/update_product.php?id=<?= $product->getId() ?>" class="btn btn-danger btn-lg"><i class="fas fa-arrow-left"></i> Regresar</a></div>
            <div class="col text-center"><button id="submitEditor" class="btn btn-primary btn-lg"><i class="fas fa-sync"></i> Actualizar</button></div>
            <div class="col"></div>
          </div>
        </div>
        <?php include("../partials/footer.html"); ?>
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
    <script>
      let indexMeasurement = <?= --$indexMeasurement; ?>;
      $(() => {
        $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
        $('#product-item').addClass('active')
      })

      function addMeasurement() {
        indexMeasurement++;
        $('#measurements').append(`
        <li>Medida ${indexMeasurement}:
          <div class="row">
            <div class="col">
              <label for="width${indexMeasurement}">Ancho:</label>
              <input type="number" id="width${indexMeasurement}" class="form-control">
            </div>
            <div class="col height">
              <label for="height${indexMeasurement}">Alto:</label>
              <input type="number" id="height${indexMeasurement}" class="form-control">
            </div>
            <div class="col lenght">
              <label for="lenght${indexMeasurement}">Largo:</label>
              <input type="number" id="lenght${indexMeasurement}" class="form-control">
            </div>
            <div class="col window">
              <label for="window${indexMeasurement}">Ventana:</label>
              <input type="number" id="window${indexMeasurement}" class="form-control">
            </div>
            <div class="col-sm-2">
            </div>
          </div>
        </li>`)
      }

      function deleteMeasurement(idProduct, idMeasurement) {
        $.post('api/delete_measurement.php', {
          idProduct: idProduct,
          idMeasurement: idMeasurement
        }, (data, status) => {
          location.reload()
        })
      }
      $('button#submitEditor').click(() => {

        let measurements = []
        for (let index = 0; index < $('#measurements').children().length; index++) {
          let measurement = {}
          measurement.width = $('#width' + (index + 1)).val()
          measurement.height = $('#height' + (index + 1)).val()
          measurement.lenght = $('#lenght' + (index + 1)).val()
          measurement.window = $('#window' + (index + 1)).val()
          if (typeof($('#width' + (index + 1)).val()) != 'undefinded' && $('#width' + (index + 1)).val() != '' &&
            typeof($('#height' + (index + 1)).val()) != 'undefined' && $('#height' + (index + 1)).val() != '' &&
            typeof($('#lenght' + (index + 1)).val()) != 'undefined' && $('#lenght' + (index + 1)).val() != '' &&
            $('#window' + (index + 1)).val() != undefined) {
            measurements.push(measurement)
          }
        }
        $.post('api/update_measurements_fondo.php',{
          id: `<?= $product->getId()?>`,
          idMaterial: `<?= $material->getId()?>`,
          measurements: JSON.stringify(measurements)
        },(data,status)=>{
          if(status == 'success'){
            location.reload()
          }else{
            $.notify({
              message: 'No se ha actualizado las medidas',
              title: 'Error',
              icon: 'fas fa-check-circle'
            }, {
              type: 'danger'
            })
          }
        })
      })
    </script>
    <!-- Page level plugin JavaScript-->


</body>

</html>