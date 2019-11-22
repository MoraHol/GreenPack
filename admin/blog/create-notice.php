<?php
include("../partials/verify-session.php");
?>
<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">

<head>
  <title>GreenPack | Crear Noticia</title>
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

  <!-- Include Editor style. -->
  <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type='text/css' />


  <link rel="stylesheet" href="/vendor/dropzone/dropzone.css">

  <!-- Include JS file. -->
  <script type="text/javascript" src="/vendor/froala_editor.pkgd.min.js"></script>
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
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Crear una nueva Noticia</li>
          </ol>
          <br>
          <br>

          <div class="form-group">
            <label for="title">Escriba el titulo de la noticia:</label>
            <input type="text" placeholder="Titulo de la noticia" id="title" class="form-control">
          </div>
          <br>
          <div class="form-group">
            <label for="content">Escriba el contenido de la noticia:</label>
            <br>
            <textarea name="content" id="content"></textarea>
          </div>
          <div class="form-group">
            <label for="myId">Suba la imagen oficial del blog:</label>
            <div id="myId" class="dropzone"></div>
          </div>
          <br>
          <br>
          <!-- active checkbox -->
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="activeBtn">
            <label class="custom-control-label" for="activeBtn">Guardar como Borrador</label>
            <a data-toggle="popover" title="Guardar como borrador" data-content="Si se guarda esta noticia como borrador no aparecera publicada dentro de la pagina." style="color:gray; font-size:10px;"><i class="fas fa-question"></i></a>
          </div>

          <div class="row" style="margin-bottom: 20px; margin-top: 20px;">
            <div class="col"></div>
            <div class="col text-center"><button id="submitEditor" class="btn btn-primary btn-lg">Enviar</button></div>
            <div class="col"></div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Green Pack
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
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
  <script src="/js/es.js"></script>
  <script src="/vendor/dropzone/dropzone.js"></script>
  <script>
    $(document).ready(function() {
      $('[data-toggle="popover"]').popover();
    });
  </script>
  <script>
    let editor
    let myDropzone
    $(() => {
      Dropzone.autoDiscover = false
      editor = new FroalaEditor('#content', {
        language: 'es',
        height: 300,
        imageUploadParam: 'photo',
        imageUploadURL: '/admin/upload.php',
        imageUploadMethod: 'POST',
        videoUploadParam: 'video',
        videoUploadURL: 'upload-video.php',
        imageUploadMethod: 'POST',
        fileUploadParam: 'file',
        fileUploadURL: '/admin/upload-file.php',
        fileUploadMethod: 'POST',
        events: {
          'image.removed': function($img) {
            img = $img[0]
            $.post('/admin/image_delete.php', {
              src: $img.attr('src')
            }, (data, status) => {
              if (status != "success") {
                $.notify({
                  message: 'Error',
                  title: 'Error',
                  icon: 'notification_important'
                }, {
                  type: 'warning'
                })
              }
            })
          },
          'file.removed': function($file) {
            file = $file[0]
            $.post('/admin/file_delete.php', {
              src: $file.attr('src')
            }, (data, status) => {
              if (status != "success") {
                $.notify({
                  message: 'Error',
                  title: 'Error',
                  icon: 'notification_important'
                }, {
                  type: 'warning'
                })
              }
            })
          },
          'keyup': function(keyupEvent) {
            if (document.domain != 'localhost') {
              $('.fr-wrapper>div:first-child').css('visibility', 'hidden')
            }
          }
        }
      }, () => {
        if (document.domain != 'localhost') {
          $('.fr-wrapper>div:first-child').css('visibility', 'hidden')
        }
      })
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
      $('button#submitEditor').click(() => {
        if (myDropzone.getAcceptedFiles().length > 0 && $('#title').val() != '' && editor.html.get() != '') {
          let response = JSON.parse(myDropzone.getAcceptedFiles()[0].xhr.responseText)
          $.post("api/create_notice.php", {
            title: $('#title').val(),
            content: editor.html.get(),
            photo: response.link,
            active: !$('#activeBtn').prop('checked')
          }, (data, status) => {
            $.notify({
              message: 'Se ha creado la noticia',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'success'
            })
            fieldsClear()
          })
        } else {
          $.notify({
            message: 'Los campos deben ser completados',
            title: 'Error',
            icon: 'notification_important'
          }, {
            type: 'warning'
          })
        }
      })
    })

    function fieldsClear() {
      $('#title').val('')
      editor.html.set('')
      myDropzone.removeAllFiles()
    }
  </script>
</body>

</html>