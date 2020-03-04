<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Recuperar Contraseña | GreenPack</title>
  <link rel="stylesheet" href="/admin/assets/css/login-admin.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/all.min.css">
</head>

<body>
  <div class="container  align-items-center" style="height: 600px">
    <div class="card card-container">
      <!-- <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" /> -->
      <div class="text-center"> <img class="text-center" src="/images/greenpack_logo_verde.png" /></div>
      <p id="profile-name" class="profile-name-card"></p>
      <form class="form-signin" id="form">
        <span id="reauth-email" class="reauth-email"></span>
        <input type="email"  id="email" class="form-control" placeholder="Email" required autofocus>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Recuperar Contraseña</button>
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
      $.post('generate_pass.php', {
        email: $('#email').val()
      }, (data, status) => {
        if (status == 'success') {
          $.notify({
            message: 'Correo de recuperación enviado',
            title: '<strong>Greenpack</strong>',
            icon: 'fas fa-exclamation-triangle'
          }, {
            type: 'success'
          })
        }
      })
    })
  </script>
</body>

</html>