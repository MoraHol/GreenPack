<?php
require dirname(dirname(__DIR__)) . "/dao/MaterialDao.php";
include("../partials/verify-session.php");
$materialDao = new MaterialDao();
$materials = $materialDao->findAll();
?>
<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">

<head>
  <title>Materiales | GreenPack</title>
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
  <style>
    td.highlight {
      background-color: whitesmoke !important;
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
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Materiales</li>
          </ol>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Materiales Ofertados</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table row-border table-bordered hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Precio / Kg</th>
                      <th class="text-center">Gramaje</th>
                      <th class="text-center">Descripción</th>
                      <th class="text-center">Actualizar</th>
                      <th class="text-center">Borrar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($materials as $material) { ?>
                    <tr>
                      <td><?php echo $material->getName(); ?></td>
                      <td class="text-center money"><?php echo $material->getPricePerKg(); ?></td>
                      <td class="text-center"><?php echo $material->getGrammage(); ?> grs</td>
                      <td><?= substr($material->getDescription(), 0, 100) . "..."; ?></td>
                      <td class="text-center"><a class="text-center" href="/admin/materials/update-material.php?id=<?php echo $material->getId(); ?>"><i class="fas fa-fw fa-sync"></a></td>
                      <td class="text-center"><a onclick="modal(<?php echo $material->getId(); ?>)" href="#"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div>
                <a class="btn btn-primary" href="create_material.php"> <i class="fas fa-plus"></i> Crear</a>
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
    <script src="../assets/js/script.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/vendor/jquery.formatCurrency-1.4.0.min.js"></script>
    <script src="/vendor/jquery.formatCurrency.all.js"></script>
    <script>
      // Call the dataTables jQuery plugin
      $(document).ready(function() {
        let table = $('#dataTable').DataTable({
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
        $('#dataTable tbody')
          .on('mouseenter', 'td', function() {
            var colIdx = table.cell(this).index().column;

            $(table.cells().nodes()).removeClass('highlight');
            $(table.column(colIdx).nodes()).addClass('highlight');
          });
      })
    </script>
    <!-- Modal  delete Material-->
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Borrar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Estas seguro que quieres borrar este material?
            <br>
            Si lo haces se borrara en todos los productos en los que se utilice
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <a id="linkDelete" role="button" class="btn btn-danger" style="color:white" href="#">Eliminar</a>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(() => {
        $('.money').formatCurrency({
          region: 'es-CO'
        })
        $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
        $('#material-item').addClass('active')
      })
    </script>
    <script>
      function modal(id) {
        $('#ModalDelete').modal()
        $('#linkDelete').on('click', () => {
          $.post('api/delete_material.php', {
            id: id
          }, (data, status) => {
            if (status == 'success') {
              window.location.reload()
            }
          })
        })
      }
    </script>
</body>

</html>