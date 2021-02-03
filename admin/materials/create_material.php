<?php
include("../partials/verify-session.php");
?>
<!-- author: Teenus SAS, github: Teenus SAS -->
<!doctype html>
<html lang="es">

<head><meta charset="gb18030">
  <title>Materiales | Greenpack</title>
  <!-- Required meta tags -->
  
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
            <li class="breadcrumb-item"><a href="/admin/materials">Materiales</a></li>
            <li class="breadcrumb-item active">Crear Material</li>
          </ol>
          <div class="container">
            <form id="form-creator">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="nameMaterial">Nombre:</label>
                    <br>
                    <input type="text" required placeholder="Ej: Bond" id="nameMaterial" class="form-control">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="pricePerKg">Precio por Kilogramo:</label>
                    <br>
                    <input type="number" required id="pricePerKg" placeholder="Ej: 2000" class="form-control">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="grammage">Gramaje:</label>
                    <br>
                    <input type="number" required id="grammage" placeholder="Ej: 60" class="form-control">
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Precio pliego 60*90</label>
                    <input type="text" name="" id="p5400" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId">Solo para  materiales de bolsas laminadas</small>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="">Precio pliego 70*100:</label>
                    <input type="text" name="" id="p7000" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId">Solo para  materiales de bolsas laminadas</small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="description">Descripción:</label>
                <br>
                <textarea id="description" class="form-control" rows="5" placeholder="Ingresa la descripción detallada del material"></textarea>
              </div>
              <br>
              <div class="row" style="margin-bottom: 20px; margin-top: 20px;">
                <div class="col"></div>
                <div class="col text-center"><input class="btn btn-primary btn-lg" value="Crear" type="submit"></div>
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
        $.post('api/create_material.php', {
          name: $('#nameMaterial').val(),
          price: $('#pricePerKg').val(),
          grammage: $('#grammage').val(),
          description: $('#description').val(),
          p5400: $('#p5400').val(),
          p7000: $('#p7000').val()
        }, (data, status) => {
          if (status == 'success') {
            $.notify({
              message: 'Materia Prima creada',
              //title: '<strong>Greenpack</strong>',
              icon: 'fas fa-exclamation-triangle'
            }, {
              type: 'success'
            })
            clearFields()
          } else {
            $.notify({
              message: 'Error al crear la Materia Prima',
             //title: '<strong>Greenpack</strong>',
              icon: 'fas fa-exclamation-triangle'
            }, {
              type: 'danger'
            })
          }
        })
      })
    })

    function clearFields() {
      $('#nameMaterial').val('')
      $('#pricePerKg').val('')
      $('#grammage').val('')
      $('#description').val('')
      $('#p5400').val('')
      $('#p7000').val('')
    }
  </script>
  <script>
    $(() => {
      $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
      $('#material-item').addClass('active')
    })
  </script>
</body>

</html>