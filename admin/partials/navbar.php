<?php include("verify-session.php"); ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">
            <i class="material-icons">notifications</i>
            <span class="notification">5</span>
            <p class="d-lg-none d-md-block">
              Notifications
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              Some Actions
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="javascript:void(0)" data-target="#ModalPass" data-toggle="modal">Cambiar
              Contraseña</a>
            <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#logoutModal">Cerrar Sesion</a>
          </div>
        </li>
        <!-- your navbar here -->
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<!-- Modal  change password-->
<div class="modal fade" id="ModalPass" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name">Escriba la nueva contaseña:</label>
          <input type="password" id="password" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a id="btnEditPass" role="button" class="btn btn-primary" href="#">Actualizar</a>
      </div>
    </div>
  </div>
</div>
<script src="/js/jquery-2.2.4.min.js"></script>
<script>
  $('#btnEditPass').click(() => {
    $.post('/admin/change-password.php', {
      password: $('#password').val()
    }, (data, status) => {
      if (status == 'success') {
        $.notify({
          message: 'Se ha cambiado tu contraseña',
          title: 'Exito',
          // icon: 'fas fa-check-circle'
        },{
          type: 'success'
        })
        $('#ModalPass').modal('hide')
        password: $('#password').val('')
      }
    })
  })
</script>
<!-- author: Alexis Holguin github: MoraHol -->
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
        <form action="/admin/logout.php" method="POST">
          <input value="true" name="logout" hidden>
          <button class="btn btn-primary">Cerrar sesión</button>
        </form>
      </div>
    </div>
  </div>
</div>