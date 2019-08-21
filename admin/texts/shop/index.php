<?php
include("../../partials/verify-session.php");
?>
<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">

<head>
  <title>Textos | GreenPack</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="../../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="/css/all.min.css">
  <!-- Page level plugin CSS-->
  <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/vendor/dropzone/dropzone.css">
  <script src="/vendor/dropzone/dropzone.js"></script>
  <style>
    td.highlight {
      background-color: whitesmoke !important;
    }

    .card-body .fas {
      font-size: 12rem;
    }

    #imgUpload {
      display: none;
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
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Textos</li>
          </ol>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Pestañas de la pagina</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="input-picker-background-banner">Escoga el color de fondo del banner:</label>
                    <input type="color" class="form-control" id="input-picker-background-banner">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="input-picker-color-banner">Escoga el color de letra del banner:</label>
                    <input type="color" class="form-control mb-2 mr-auto mt-2" id="input-picker-color-banner">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="input-title-banner">Titulo del Banner</label>
                    <input type="text" class="form-control mt-10" id="input-title-banner">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="input-title-banner">Subtitulo del Banner</label>
                    <input type="text" class="form-control" id="input-subtitle-banner">
                  </div>
                </div>
              </div>
              <div class="row" id="containerImageCategory">
                <div class="col-sm-4">Imagen:</div>
                <div class="col-sm-8 ">
                  <img src="" id="imageBanner" class="img-responsive" width="300">
                </div>
              </div>
              <div class="row" id="containerImageBtn">
                <div class="col-sm-5"></div>
                <div class="col-sm-4"><button class="btn btn-danger" onclick="changeImage()">Cambiar Imagen</button></div>
              </div>
              <div id="imgUpload">
                <span>Suba la imagen de la categoría:</span>
                <div id="myId"></div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center ">
            <div class="col"></div>
            <div class="col"><button class="btn btn-primary btn-lg" id="btn-submit"><i class="fas fa-sync"></i> Actualizar</button></div>
            <div class="col"></div>
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
    <script src="../../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Chartist JS -->
    <script src="../../assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/material-dashboard.js?v=2.1.0"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../../assets/demo/demo.js"></script>
    <script src="../../assets/js/script.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
      $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
      $('#text-item').addClass('active')

      let flagImage = false
      let myDropzone


      loadBanner()
      // Cargado de infromacion de base de datos
      function loadBanner() {
        $.get('api/get_banner.php', (banner, status) => {
          $('#input-picker-background-banner').val(banner.backgroundColor)
          $('#input-picker-color-banner').val(banner.color)
          $('#input-title-banner').val(banner.title)
          $('#input-subtitle-banner').val(banner.subtitle)
          $('#imageBanner').attr('src', banner.image)
        })

      }

      function changeImage() {
        flagImage = true
        $('#containerImageCategory').fadeOut()
        $('#containerImageBtn').fadeOut()
        $('#myId').addClass('dropzone')
        $('#imgUpload').fadeIn()
        myDropzone = new Dropzone("div#myId", {
          url: "/admin/upload.php",
          method: 'post',
          paramName: 'photo',
          maxFiles: 1,
          acceptedFiles: "image/*",
          dictDefaultMessage: 'Sube tus archivos, arrastralos o haz click para buscarlos',
          dictMaxFilesExceeded: 'Solo se permite subir una imagen',
          dictInvalidFileType: 'Solo se permite imagenes'
        })
      }

      function ajax(link) {
        $.post('api/update_banner.php', {
          title: $('#input-title-banner').val(),
          subtitle: $('#input-subtitle-banner').val(),
          backgroundColor: $('#input-picker-background-banner').val(),
          color: $('#input-picker-color-banner').val(),
          image: link
        }, (data, status) => {
          if (status == 'success') {
            $.notify({
              message: 'Se ha actualizado la categoría',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'success'
            })
            myDropzone.removeAllFiles()
            $('#imgUpload').fadeOut()
            $('#containerImageCategory').fadeIn()
            $('#containerImageBtn').fadeIn()
            flagImage = false
            loadBanner()
          } else {
            $.notify({
              message: 'No se ha actualizado la categoría',
              title: 'Error',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
        })
      }


      $('#btn-submit').click(() => {
        if (flagImage) {
          if (myDropzone.getAcceptedFiles().length > 0) {
            response = JSON.parse(myDropzone.getAcceptedFiles()[0].xhr.responseText)
            link = response.link
            ajax(link)
          } else {
            $.notify({
              message: 'Por favor Suba una Imagen',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
        } else {
          ajax($('#imageBanner').attr('src'))
        }
      })
    </script>
</body>

</html>