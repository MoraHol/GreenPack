<?php
include("../../partials/verify-session.php");
?>
<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">

<head>
  <title>Textos - Clientes | GreenPack</title>
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
  <style>
    div.imagen {
      width: auto;
      height: 200px;
      background-size: cover;
      margin: 0 auto;
      padding: 2px 2px;
    }

    div.info {
      position: absolute;
      overflow: hidden;
      background-color: rgba(31, 31, 31, 0.9);
      opacity: 0;
      transition: opacity 0.3s;
    }

    div.imagen:hover div.info {
      opacity: 0.8;
    }

    p.descripcion {
      font-size: 1rem;
      text-align: center;
      margin-top: 200px;
      transition: margin-top 0.4s;
    }

    div.imagen:hover p.descripcion {
      margin-top: 75px;
    }

    @media (min-width: 768px) {
      .carousel-multi-item-2 .col-md-3 {
        float: left;
        width: 25%;
        max-width: 100%;
      }
    }

    .carousel-multi-item-2 .card img {
      border-radius: 2px;
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
            <li class="breadcrumb-item">
              <a href="/admin/texts">Textos</a>
            </li>
            <li class="breadcrumb-item">
              <a href="/admin/texts/home">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Clientes</li>
          </ol>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Pestañas de la pagina</div>
            <div class="card-body">
              <!--Carousel Wrapper-->
              <div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">
                <h5>Imagenes del Producto</h5>
                <!--Controls-->
                <div class="controls-top text-center">
                  <a class="black-text" href="#multi-item-example" data-slide="prev"><i class="fas fa-angle-left fa-3x pr-3"></i></a>
                  <a class="black-text" href="#multi-item-example" data-slide="next"><i class="fas fa-angle-right fa-3x pl-3"></i></a>
                </div>
                <!--/.Controls-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox" id="clients">
                  <!--First slide-->

                </div>
              </div>
              <div class="form-group">
                <label for="myId">Suba las imagenes del producto:</label>
                <div id="myId" class="dropzone"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col"></div>
            <div class="col"> <a class="btn btn-primary btn-lg" href="javascript:update()">Actualizar</a></div>
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
    <script src="/vendor/dropzone/dropzone.js"></script>
    <script>
      $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
      $('#text-item').addClass('active')
      loadCarousel()

      function loadCarousel() {
        $.get('api/get_clients.php', (data, status) => {
          let clients = data
          let counter = 0
          let $carousel = $('#clients')

          let html = '<div class="carousel-item active">'
          clients.forEach(client => {
            if (counter % 4 == 0 && counter != 0) {
              html += "</div><div class='carousel-item'>"
            }
            html += `<div class="col-md-3 mb-3">
                        <div class="card">
                          <div class="imagen" style="background-image: url(${client.image_url});">
                            <div class="info">
                              <p class="descripcion"><button class="btn btn-danger" onclick="deleteImage(${client.id},'${client.image_url}')">Eliminar</button></p>
                            </div>
                          </div>
                        </div>
                      </div>`
            counter++
          })
          if (counter % 4 != 0) {
            html += "</div>"
          }
          $carousel.html(html)
          $('.imagen').height($('.imagen').parent().height())
          $('.imagen').width($('.imagen').parent().width())
          $('.imagen .info').height($('.imagen').parent().height())
          $('.imagen div.info').width($('.imagen').parent().width())
        })
      }

      function deleteImage(id, url) {
        $.post('/admin/image_delete.php', {
          src: url
        }, (data, status) => {
          if (status != "success") {
            alert("error")
          }
        })
        $.post('api/delete_client.php', {
          id: id
        }, (data, status) => {
          if (status == "success") {
            $.notify({
              message: 'Se ha borrado la imagen',
              title: '<strong>Borrado</strong>',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
            loadCarousel()
          }
        })
      }

      // dropzone
      let myDropzone
      myDropzone = new Dropzone("div#myId", {
        url: "/admin/upload.php",
        method: 'post',
        paramName: 'photo',
        acceptedFiles: "image/*",
        dictDefaultMessage: 'Sube tus archivos, arrastralos o haz click para buscarlos',
        dictMaxFilesExceeded: 'Solo se permite subir una imagen',
        dictInvalidFileType: 'Solo se permite imagenes'
      })

      function update() {
        if (myDropzone.getAcceptedFiles().length > 0) {
          let responses = []
          myDropzone.getAcceptedFiles().forEach(image => {
            let response = JSON.parse(image.xhr.responseText)
            responses.push(response.link)
          })
          ajax(responses)
        } else {
          $.notify({
            message: 'No se ha cargado imagenes',
            title: '<strong>Sin Imagenes</strong>',
            icon: 'notification_important'
          }, {
            type: 'warning'
          })
        }
      }


      function ajax(images) {
        $.post('api/update_clients.php', {
          images: JSON.stringify(images)
        }, (data, status) => {
          if (status == 'success') {
            $.notify({
              message: 'Se ha cargado imagenes',
              title: '<strong>Exito</strong>',
              icon: 'notification_important'
            }, {
              type: 'success'
            })
          }
        })
        loadCarousel()
        myDropzone.removeAllFiles()
      }
    </script>
</body>

</html>