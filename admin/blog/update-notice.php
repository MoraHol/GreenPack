<?php
include("../partials/verify-session.php");
require dirname(dirname(__DIR__)) . "/dao/NoticeDao.php";
$noticeDao = new NoticeDao();
if (isset($_GET["id"])) {
  $notice =  $noticeDao->findById($_GET["id"]);
}
?>
<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">

<head>
  <title>GreenPack | Actualizar Noticia</title>
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

  <style>
    div#imagen {
      width: 300px;
      height: 200px;
      background-size: cover;
      /*sólo para ejemplo*/
      background-image: url("<?php echo $notice->getImage(); ?>");
      margin: 30px auto;
    }

    div#info {
      position: absolute;
      overflow: hidden;
      width: 300px;
      height: 200px;
      background-color: rgba(31, 31, 31, 0.9);
      opacity: 0;
      transition: opacity 0.3s;
    }

    div#imagen:hover div#info {
      opacity: 0.6;
    }

    p#headline {
      position: absolute;
      font-size: 1.5rem;
      margin-left: -75px;
      margin-top: 15px;
      transition: margin-left 0.3s;
    }

    div#imagen:hover p#headline {
      margin-left: 115px;
    }

    p#descripcion {
      font-size: 1rem;
      text-align: center;
      margin-top: 200px;
      transition: margin-top 0.4s;
    }

    div#imagen:hover p#descripcion {
      margin-top: 75px;
    }
  </style>
  <?php if ($_SERVER["HTTP_HOST"] != "localhost") {
    echo "<style>.fr-wrapper>div:first-child {display: none !important;}</style>";
  } ?>

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
            <li class="breadcrumb-item">
              <a href="/admin/blog">Noticias</a></li>
            <li class="breadcrumb-item active">Actualizar Noticias</li>
          </ol>


          <div class="container">
            <div class="form-group">
              <label for="title">Escriba el titulo de la noticia:</label>
              <br>
              <input type="text" placeholder="Titulo de la noticia" id="title" class="form-control">
            </div>
            <br>
            <br>
            <div class="form-group">
              <label for="content">Escriba el contenido de la noticia:</label>
              <br>
              <textarea name="content" id="content"></textarea>
            </div>
            <br>
            <br>
            <!-- Default checked -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="activeBtn" <?php echo !$notice->getActive() ?  "checked" : ""; ?>>
              <label class="custom-control-label" for="activeBtn">Guardar como Borrador</label>
              <a data-toggle="popover" title="Guardar como borrador" data-content="Si se guarda esta noticia como borrador no aparecera publicada dentro de la pagina." style="color:gray; font-size:10px;"><i class="fas fa-question"></i></a>
            </div>
            <br>
            <br>
            <div id="image-info">Imagen de la Noticia:
              <div id="imagen">
                <img src="<?php echo $notice->getImage() ?>" alt="" height="200" width="200" id="imgNotice" hidden>
                <div id="info">
                  <p id="descripcion"><button id="changeImg" class="btn btn-primary">Cambiar</button></p>
                </div>
              </div>
            </div>
            <div id="imgUpload">
              <label for="">Suba la imagen oficial del blog:</label>
              <div id="myId"></div>
            </div>
            <div class="row" style="margin-bottom: 20px; margin-top: 20px;">
              <div class="col"></div>
              <div class="col text-center"><button id="submitEditor" class="btn btn-primary btn-lg">Enviar</button></div>
              <div class="col"></div>
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
    let flagImage = false
    let text = ` <?php echo $notice->getContent() ?> `
    $(() => {
      $('#imgUpload').fadeOut()
      $('#title').val('<?php echo $notice->getTitle() ?>')
      Dropzone.autoDiscover = false;
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
                alert("error")
              }
            })
          },
          'file.removed': function($file) {
            file = $file[0]
            $.post('/admin/file_delete.php', {
              src: $file.attr('src')
            }, (data, status) => {
              if (status != "success") {
                alert("error")
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
        editor.html.set(text)
        if (document.domain != 'localhost') {
          $('.fr-wrapper>div:first-child').css('visibility', 'hidden')
        }
      })
      $('#changeImg').click(() => {
        $.post('/admin/image_delete.php', {
          src: $('#imgNotice').attr('src')
        }, (data, status) => {
          if (status != "success") {
            alert("error")
          }
        })
        flagImage = true
        $('#image-info').fadeOut();
        $('#imgNotice').fadeOut()
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
      })
      $('button#submitEditor').click(() => {
        let link
        if (!flagImage) {
          link = $('#imgNotice').attr("src")
          ajax(link)
        } else {
          if (myDropzone.getAcceptedFiles().length > 0 && $('#title').val() != '' && editor.html.get() != '') {
            response = JSON.parse(myDropzone.getAcceptedFiles()[0].xhr.responseText)
            link = response.link
            ajax(link)
          } else {
            $.notify({
              message: 'Se ha actulizado la noticia',
              title: 'Exito',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
        }
      })
    })

    function ajax(link) {
      $.post("api/update_notice.php", {
        update: true,
        id: <?php echo $notice->getId() ?>,
        title: $('#title').val(),
        content: editor.html.get(),
        photo: link,
        category: $('#category').val(),
        active: !$('#activeBtn').prop('checked')
      }, (data, status) => {
        $.notify({
          message: 'Se ha actulizado la noticia',
          title: 'Exito',
          icon: 'notification_important'
        }, {
          type: 'success'
        })
      })
    }

    function fieldsClear() {
      $('#title').val('')
      editor.html.set('')
      myDropzone.removeAllFiles();
    }
  </script>
</body>

</html>