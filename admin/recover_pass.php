<?php
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/db/env.php";

$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
if (isset($_GET["id"]) && isset($_GET["token"])) {
  $user = $db->consult("SELECT * FROM `admins` WHERE `id_admins` = '" . $_GET["id"] . "' AND `token_password` = '" . $_GET["token"] . "'", "yes");
  if (count($user) > 0) {
    $user = $user[0];
  } else {
    header("Location: /admin/404-no-token.html");
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset=" UTF-8">
  <meta name=" viewport " content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Recuperar Contraseña | GreenPack</title>
  <link rel=" stylesheet " href="/admin/assets/css/login-admin.css">
  <link rel=" stylesheet " href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/all.min.css">
</head>

<body>
  <div class="container  align-items-center" style="height: 600px">
    <div class="card card-container">
      <div class="text-center"> <img class="text-center" src="/images/greenpack_logo_verde.png" /></div>
      <p id="profile-name" class="profile-name-card"></p>
      <form class="form-signin" id="form">
        <span id="reauth-email" class="reauth-email"></span>
        <input type="password" id="inputPassword" name="pa ss" class="form-control" placeholder="Nueva Contraseña" required>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Cambiar Contraseña</button>
      </form>
    </div><!-- /card-container -->
  </div><!-- /container -->

  <script src="/js/jquery-2.2.4.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <script src="/vendor/bootstrap-notify.min.js"></script>
  <script>
    $('#form').submit((event) => {
      event.preventDefault()
      $.post('change-pass.php', {
        id: `<?php  echo $_GET["id"]; ?>`,
        password: $('#inputPassword').val()
      }, (data, status) => {
        if (status == 'success') {
          $.notify({
            message: 'Se ha cambiado la contraseña, Click para iniciar Sesion',
            title: '<strong>Exito</strong>',
            icon: 'fas fa-exclamation-triangle',
            url: '/admin'
          }, {
            type: 'success'
          })
        }
      })
    })
  </script>
</body>

</html>