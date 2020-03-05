<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">
<?php
require dirname(dirname(__DIR__)) . "/dao/NoticeDao.php";
require dirname(dirname(__DIR__)) . "/db/conversor_date.php";
include("../partials/verify-session.php");
$noticeDao = new NoticeDao();
$notices = $noticeDao->findAll();
$conversorDate = new ConversorDate();
?>

<head>
  <title>Greenpack | Noticias</title>
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
              <a href="/admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Noticias</li>
          </ol>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Noticias del Blog</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Titulo</th>
                      <th>Imagen</th>
                      <th>Activa</th>
                      <th>Visitas</th>
                      <th>Visualizar</th>
                      <th>Actualizar</th>
                      <th>Borrar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($notices as $notice) { ?>
                    <tr>
                      <td><?php echo $notice->getTitle(); ?></td>
                      <td><img src="<?php echo $notice->getImage(); ?>" height="50" width="50"></td>
                      <td><?php echo $notice->getActive() ? "<span>Si</span>" : "<span style='color:red;'>No</span>"; ?></td>
                      <td class="text-center"><?= $notice->getHits() ?></td>
                      <td class="text-center"><a href="/blog/blog-post.php?id=<?php echo $notice->getId(); ?>&admin=true" target="_blank" rel="noopener noreferrer"><i class="fas fa-eye"></i></a></td>
                      <td class="text-center"><a class="text-center" href="/admin/blog/update-notice.php?id=<?php echo $notice->getId(); ?>"><i class="fas fa-fw fa-sync"></a></td>
                      <td class="text-center"><a onclick="modal(<?php echo $notice->getId(); ?>)" href="#"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div>
                <a class="btn btn-primary" href="create-notice.php"> <i class="fas fa-plus"></i> Crear</a>
              </div>
            </div>
          </div>
        </div>
        <?php include("../partials/footer.html"); ?>
      </div>
    </div>

    <!-- Modal  delete notice-->
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Greenpack</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Estás seguro de borrar esta noticia?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <a id="linkDelete" role="button" class="btn btn-danger" style="color:white" href="#">Si</a>
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
    <script>
      $(() => {
        $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
        $('#blog-item').addClass('active')
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

    <script>
      function modal(id) {
        $('#ModalDelete').modal()
        $('#linkDelete').on('click', () => {
          $.post('api/delete_notice.php', {
            id: id
          }, (data, status) => {
            if (status == 'success') {
              window.location.reload()
            }
          })
        })
      }
      const urlParams = new URLSearchParams(window.location.search);
      const updated = urlParams.get('updated');

      if (updated == 'true') {
        $.notify({
          message: 'Noticia actualizada',
          title: 'Exito',
          icon: 'notification_important'
        }, {
          type: 'success'
        })
        if (typeof window.history.pushState == 'function') {
          window.history.pushState({}, "Hide", location.pathname);
        }
      }
    </script>
</body>

</html>