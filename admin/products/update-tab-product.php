<!-- author: Teenus SAS, github: Teenus SAS -->
<!doctype html>
<html lang="es">
<?php if (!isset($_SESSION)) {
  session_start();
}
include("../partials/verify-session.php");
if (!isset($_GET["id"])) {
  header("Location : /admin/products");
}
require_once dirname(dirname(__DIR__)) . "/dao/TabProductDao.php";
require_once dirname(dirname(__DIR__)) . "/dao/ProductDao.php";
$tabProductDao = new TabProductDao();
$tab = $tabProductDao->findById($_GET["id"]);
$productDao  = new ProductDao();
$product = $productDao->findById($tab->getIdProduct());
?>

<head>
  <title>Dashboard | Actualizar Pestaña</title>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <style>
    .ct-chart .ct-label {
      fill: #fafafa;
      color: #fafafa;
      display: -webkit-flex;
      display: flex;
      font-weight: bold;
    }

    .card-header-secundary {
      background-color: #e6e6e6fa !important;
    }
  </style>
  <!-- Include Editor style. -->
  <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type='text/css' />
  <link rel="stylesheet" href="/css/nice-select.css">


  <link rel="stylesheet" href="/vendor/dropzone/dropzone.css">

  <!-- Include JS file. -->
  <script type="text/javascript" src="/vendor/froala_editor.pkgd.min.js"></script>
</head>

<body class="white-edition">
  <div class="wrapper ">
    <?php include("../partials/sidebar.php"); ?>
    <div class="main-panel">
      <?php include("../partials/navbar.php");  ?>
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/admin/">Dashboard</a>
            </li>
            <li class="breadcrumb-item "><a href="/admin/products">Productos</a></li>
            <li class="breadcrumb-item "><a href="/admin/products/update_product.php?id=<?= $product->getId() ?>"><?= $product->getName() ?></a></li>
            <li class="breadcrumb-item active">Actualizar Pestaña</li>
          </ol>

          <div class="form-group">
            <label for="title">Titulo:</label>
            <input type="text" placeholder="Ej. Caracteristicas" id="title" class="form-control" value="<?= $tab->getTitle() ?>">
          </div>
          <br>
          <div class="form-group">
            <label for="content">Contenido:</label>
            <br>
            <textarea name="content" id="content"></textarea>
          </div>
        </div>
        <div class="row" style="margin-bottom: 20px; margin-top: 60px;">
          <div class="col"><a href="/admin/products/update_product.php?id=<?= $tab->getIdProduct() ?>" class="btn btn-danger btn-lg">Regresar</a></div>
          <div class="col text-center"><button id="submitEditor" class="btn btn-primary btn-lg">Crear</button></div>
          <div class="col"></div>
        </div>
      </div>
      <?php include("../partials/footer.html"); ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <!-- <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script> -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <script src="../assets/js/plugins/chartist-plugin-pointlabels.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="../assets/js/script.js"></script>
  <script src="/js/es.js"></script>
  <script src="/vendor/dropzone/dropzone.js"></script>

  <script>
    let editor
    let myDropzone
    let text = `<?= $tab->getDescription() ?>`


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
    $('#submitEditor').click(() => {
      $.post('api/update_tab_product.php', {
        idProduct: `<?= $_GET["id"] ?>`,
        title: $('#title').val(),
        content: editor.html.get()
      }, (data, status) => {
        if (status == 'success') {
          location.href = `/admin/products/update_product.php?id=<?= $tab->getIdProduct() ?>&updated=true`
        }
      })
    })
  </script>
</body>

</html>