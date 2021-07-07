<!-- author: Teenus SAS, github: Teenus SAS -->
<!doctype html>
<html lang="es">
<?php if (!empty($_SESSION)) {
  session_start();
}
require_once dirname(__DIR__) . "/model/Admin.php";
$admin = unserialize($_SESSION["admin"]);
if ($admin->getRole() == 3) {
  header("Location: /admin/blog");
}
if ($admin->getRole() == 1) {
  header("Location: /admin/quotations/");
}
?>

<head>
  <title>Dashboard | Greenpack</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type='text/css' />
  <style>
    .form-check .form-check-input {
      opacity: 100;
      height: 13px;
      width: 13px;
      overflow: hidden;
    }
  </style>
</head>

<body class="white-edition">
  <div class="wrapper ">
    <?php include("partials/sidebar.php"); ?>
    <div class="main-panel">
      <?php include("partials/navbar.php");  ?>
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/admin">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Email Marketing</li>
          </ol>

          <div class="form-group">
            <label for="subject">Asunto:</label>
            <br>
            <input class="form-control" type="text" id="subject">
          </div>

          <div class="form-group">
            <label for="content">Contenido:</label>
            <br>
            <textarea name="content" id="content"></textarea>
          </div>
          <div class="row">
            <div class="col-12">Seleciona a quien deseas enviar:</div>
            <div class="col-1"></div>
            <div class="col-11">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckboxClientes" value="option1">
                <label class="form-check-label" for="inlineCheckboxClientes">Clientes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckboxSuscriptores" value="option2">
                <label class="form-check-label" for="inlineCheckboxSuscriptores">Suscriptores</label>
              </div>
            </div>
          </div>

          <div class="row" style="margin-bottom: 20px; margin-top: 20px;">
            <div class="col"></div>
            <div class="col text-center"><button id="submitEditor" class="btn btn-primary btn-lg">Enviar</button></div>
            <div class="col"></div>
          </div>
        </div>
      </div>
      <?php include("partials/footer.html"); ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <!-- <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script> -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="./assets/js/plugins/chartist.min.js"></script>
  <script src="./assets/js/plugins/chartist-plugin-pointlabels.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <script src="./assets/js/script.js"></script>
  <script type="text/javascript" src="/vendor/froala_editor.pkgd.min.js"></script>
  <script src="/js/es.js"></script>
  <script>
    $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
    $('#email-item').addClass('active')

    let editor
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
                //title: 'Greenpack',
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
                //title: 'Greenpack',
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

    $('#submitEditor').click(function() {
      let checkboxClient = $('#inlineCheckboxClientes').prop('checked')
      let checkboxSubs = $('#inlineCheckboxSuscriptores').prop('checked')
      if (!checkboxClient && !checkboxSubs) {
        $.notify({
          message: 'Selecciona a quien deseas enviar el correo',
          //title: 'Greenpack',
          icon: 'notification_important'
        }, {
          type: 'warning'
        })
        return false;
      }
      $.post('email_marketing_api.php', {
        checkboxClient,
        checkboxSubs,
        text: editor.html.get(),
        subject: $('#subject').val()
      }, function(data, status) {
        if (status == 'success') {
          if (data.status) {
            $.notify({
              message: 'Mensajes enviado',
              //title: 'Greenpack',
              icon: 'notification_important'
            }, {
              type: 'success'
            })
          } else {
            $.notify({
              message: 'data.error',
              //title: 'Greenpack',
              icon: 'notification_important'
            }, {
              type: 'danger'
            })
          }
        }
      })
    })
  </script>

</body>

</html>