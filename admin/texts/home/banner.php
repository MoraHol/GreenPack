<?php
include("../../partials/verify-session.php");
?>
<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">

<head>
  <title>Textos - Banner | Greenpack</title>
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
  <style>
    td.highlight {
      background-color: whitesmoke !important;
    }

    .title {
      font-size: 30px;
      text-align: center;
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
            <li class="breadcrumb-item active">Banner</li>
          </ol>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Slides del Banner</div>
            <div class="card-body">
              <hr>
              <div class="container" id="banners">
              </div>
              <a href="new_slide.php" class="btn btn-primary bnt-lg"><i class="fas fa-plus"></i> Crear</a>
            </div>
          </div>
          <div class="row">
            <div class="col"><a href="/admin/texts/home" class="btn btn-danger btn-lg">Regresar</a></div>
            <div class="col"></div>
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
    <script src="/vendor/jquery.formatCurrency-1.4.0.min.js"></script>
    <script src="/vendor/jquery.formatCurrency.all.js"></script>
    <script>
      $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
      $('#text-item').addClass('active')
      loadBanner()

      function loadBanner() {
        $.get('api/get_banner.php', (slides, status) => {
          $('#banners').html('')
          slides.forEach(slide => {
            $('#banners').append(`<div class="row align-items-center  justify-content-center ">
                  <div class="col-sm-3"><img src="${slide.image}" alt="" width="200"></div>
                  <div class="col-sm-6 mr-auto">
                    <div class="row  justify-content-center header-title align-items-center">${slide.header}</div>
                    <div class="row  justify-content-center title text-primary">${slide.title}</div>
                    <div class="row  text-gray justify-content-center sub-title-v2">${slide.subtitle}</div>
                  </div>
                  <div class="col-sm-1"><a href="update_slide.php?id=${slide.id}" title="Editar" class="btn btn-primary"><i class="fas fa-pen"></i></a></div>
                  <div class="col-sm-1"><a href="javascript:deleteSlide(${slide.id})" title="Borrar" class="btn btn-primary"><i class="fas fa-trash"></i></a></div>
                </div>
                <hr>`)
          });
        })
      }


      function deleteSlide(id) {
        $.post('api/delete_slide.php', {
          id
        }, (data, status) => {
          if (status == 'sucsess') {
            $.notify({
              message: 'Slide borrado',
              //title: '<strong>Greenpack</strong>',
              icon: 'notification_important'
            }, {
              type: 'warning'
            })
          }
          loadBanner()
        })
      }
    </script>
</body>

</html>