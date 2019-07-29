<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">
<?php
if (!isset($_SESSION)) {
  session_start();
}
require dirname(dirname(__DIR__)) . "/dao/AdminDao.php";
require dirname(dirname(__DIR__)) . "/dao/QuotationDao.php";
$quotationDao = new QuotationDao();
$adminDao = new AdminDao();
$admin = unseralize($_SESSION["admin"]);
$quotations = $quotationDao->findAssignedTo($admin->getId());
?>

<head>
  <title>GreenPack | Cotizaciones</title>
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
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Cotizaciones</li>
          </ol>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Cotizaciones Asignadas</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Apellido</th>
                      <th class="text-center">Empresa</th>
                      <th class="text-center">Total de la cotización</th>
                      <th class="text-center">Fecha</th>
                      <th class="text-center">Ver Cotizacion</th>
                      <th class="text-center">Editar</th>
                      <th class="text-center">Descargar</th>
                      <th class="text-center">Enviar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <<?php foreach ($quotations as $quotation) { ?> <tr>
                        <td><?php echo $quotation->getNameClient(); ?></td>
                        <td><?php echo $quotation->getLastNameClient(); ?></td>
                        <td class="text-center"><?php echo $quotation->getCompany() == "" ? "N/A" : $quotation->getCompany(); ?> </td>
                        <td class="text-center money"><?php echo $quotation->calculateTotal(); ?></td>
                        <td class="text-center"><?= date("d-m-Y", $quotation->getCreatedAt()); ?></td>
                        <td class="text-center"><a class="text-center" href="javascript:viewPdf(`<?= $quotation->getId(); ?>`)" title="Ver Aqui"><i class="material-icons">remove_red_eye</i> <a href="#" onclick="openWindow(`<?= $quotation->getId(); ?>`)" title="Ver en nueva Ventana"><i class="material-icons">featured_video</i></a></td>
                        <td class="text-center"><a href="edit-quotation.php?id=<?= $quotation->getId() ?>"><i class="material-icons">create</i></a></td>
                        <td class="text-center"><a class="text-center" target="_blank" title="descargar" href="/services/download-quotation.php?id=<?php echo $quotation->getId(); ?>"><i class="material-icons">cloud_download</a></td>
                        <td class="text-center"><a class="text-center" href="javascript:sentEmail(`<?php echo $quotation->getId(); ?>`)"><i class="material-icons">email</a></td>
                        </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
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
    <script>
      $(() => {
        $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
        $('#quotations-item').addClass('active')
      })
    </script>
    <script src="../assets/js/script.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
      // Call the dataTables jQuery plugin
      $(document).ready(function() {
        $('#dataTable').DataTable({
          "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
              "sFirst": "Primero",
              "sLast": "Último",
              "sNext": "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

          }
        })
      })
    </script>
</body>

</html>