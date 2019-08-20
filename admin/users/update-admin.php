<!-- author: Alexis Holguin, github: MoraHol -->

<?php
require_once dirname(dirname(__DIR__)) . "/db/DBOperator.php";
require_once dirname(dirname(__DIR__)) . "/db/env.php";
$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
$roles = $db->consult("SELECT * FROM `roles_admin`", "yes");
include("../partials/verify-session.php");
?>

<!doctype html>
<html lang="es">

<head>
  <title>Actualizar Usuario | GreenPack</title>
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
            <li class="breadcrumb-item"><a href="/admin/materials">Usuarios</a></li>
            <li class="breadcrumb-item active">Actualizar Usuario</li>
          </ol>
          <?php
          require_once dirname(dirname(__DIR__)) . "/dao/AdminDao.php";
          $adminDao = new AdminDao();
          if (isset($_GET["id"])) {
            $admin = $adminDao->findById($_GET["id"]);
          }
          ?>
          <div class="container">
            <form id="form-creator">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="nameUser">Nombre del Usuario/Administrador:</label>
                    <br>
                    <input type="text" required placeholder="Ej: Alejandra" id="nameUser" class="form-control" value="<?= $admin->getName() ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="lastNameUser">Apellido del Usuario/Administrador:</label>
                    <br>
                    <input type="text" required id="lastNameUser" placeholder="Ej: Martinez" class="form-control" value="<?= $admin->getLastName() ?>">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="">Numero de Telefono del Usuario/Administrador:</label>
                    <br>
                    <input type="number" required id="phoneUser" placeholder="Ej: 3223764531" class="form-control" value="<?= $admin->getPhone() ?>">
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-5">
                  <div class="form-group">
                    <label for="email">Correo :</label>
                    <br>
                    <input type="email" id="emailUser" placeholder="Ej: admin1@admin.com" class="form-control" value="<?= $admin->getEmail() ?>" readonly aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">El correo no podra ser modificado.</small>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="form-group">
                    <label for="passwordUser">Contraseña:</label>
                    <br>
                    <input type="password" id="passwordUser" placeholder="Ej: ******" class="form-control" aria-describedby="passwordHelp">
                    <small id="passwordHelp" class="form-text text-muted">Dejarlo en blanco en caso de no querer cambiar la contraseña.</small>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <label for="passwordUser">Rol:</label>
                    <br>
                    <select class="form-control" id="role">
                      <?php foreach ($roles as $role) { ?>
                      <option value="<?= $role["id_role"] ?>" <?= $admin->getRole() == $role["id_role"] ? "selected" : "" ?>><?= $role["name"] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <br>
              <div class="row" style="margin-bottom: 20px; margin-top: 20px;">
                <div class="col"></div>
                <div class="col text-center"><input class="btn btn-primary btn-lg" value="Enviar" type="submit"></div>
                <div class="col"></div>
              </div>
            </form>
          </div>
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
  <script>
    $(() => {
      $('#form-creator').submit((event) => {
        event.preventDefault()
        if ($('#passwordUser').val() == '' || $('#passwordUser').val() == undefined) {
          ajaxWithoutPass()
        } else {
          ajaxWithPass()
        }
      })
    })

    function ajaxWithPass() {
      $.post('api/update_admin.php', {
        id: `<?= $_GET["id"]; ?>`,
        idAdmin: $('#role').val(),
        name: $('#nameUser').val(),
        lastName: $('#lastNameUser').val(),
        password: $('#passwordUser').val(),
        phone: $('#phoneUser').val()
      }, (data, status) => {
        if (status == 'success') {
          $.notify({
            message: 'Se ha actualizado el Usuario',
            title: '<strong>Exito</strong>',
            icon: 'fas fa-exclamation-triangle'
          }, {
            type: 'success'
          })
        } else {
          $.notify({
            message: 'No se ha podido actualizar el usuario',
            title: '<strong>Error</strong>',
            icon: 'fas fa-exclamation-triangle'
          }, {
            type: 'danger'
          })
        }
      })
    }

    function ajaxWithoutPass() {
      $.post('api/update_admin.php', {
        id: `<?= $_GET["id"]; ?>`,
        idAdmin: $('#role').val(),
        name: $('#nameUser').val(),
        lastName: $('#lastNameUser').val()
      }, (data, status) => {
        if (status == 'success') {
          $.notify({
            message: 'Se ha actualizado el Usuario',
            title: '<strong>Exito</strong>',
            icon: 'fas fa-exclamation-triangle'
          }, {
            type: 'success'
          })
        } else {
          $.notify({
            message: 'No se ha podido actualizar el usuario',
            title: '<strong>Error</strong>',
            icon: 'fas fa-exclamation-triangle'
          }, {
            type: 'danger'
          })
        }
      })
    }
  </script>
  <script>
    $(() => {
      $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
      $('#users-item').addClass('active')
    })
  </script>
</body>

</html>