<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">

<head>
  <title>GreenPack | Crear Producto</title>
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
  <link rel="stylesheet" href="/css/nice-select.css">


  <link rel="stylesheet" href="/vendor/dropzone/dropzone.css">

  <!-- Include JS file. -->
  <script type="text/javascript" src="/vendor/froala_editor.pkgd.min.js"></script>

  <?php
  require_once dirname(dirname(__DIR__)) . "/dao/MaterialDao.php";
  $materialDao = new MaterialDao();
  $materials = $materialDao->findAll();
  if ($_SERVER["HTTP_HOST"] != "localhost") {
    echo "<style>.fr-wrapper>div:first-child {display: none !important;}</style>";
  } ?>
  <style>
    select .wide {
      width: 90%;
    }

    hr {
      border-top: 3px solid rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body class="white-edition">
  <div class="wrapper ">
    <?php include("../partials/sidebar.html") ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
            <a href="" class="navbar-brand">Blog</a>
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
                  <p class="d-lg-none d-md-block">
                    Notifications
                  </p>
                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
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
          <div class="form-group">
            <label for="title">Escriba el Nombre del producto:</label>
            <input type="text" placeholder="Ej. bolsa de manija" id="title" class="form-control">
          </div>
          <br>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="ref">Escriba la Referencia del producto:</label>
                <input type="text" placeholder="Ej. LV-12" id="ref" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="price">Escriba el precio del producto:</label>
                <input type="number" placeholder="Ej. 2000" id="price" class="form-control">
              </div>
            </div>
          </div>

          <br>
          <div class="form-group">
            <label for="content">Escriba la descripción del producto:</label>
            <br>
            <textarea name="content" id="content"></textarea>
          </div>
          <div class="form-group">
            <label for="myId">Suba las imagenes del producto:</label>
            <div id="myId" class="dropzone"></div>
          </div>
          <br>
          <br>
          <div class="form-gruop">
            <label for="campo1">Usos:</label>
            <div class="container">
              <div class="row" id="fields">

              </div>
              <div>
              </div>
              <button class="btn btn-primary" onclick="addField()" title="Agregar un uso"><i class="fas fa-plus"></i></button>
              <hr>
              <div class="form-gruop">
                <label for="campo1">Medidas:</label>
                <ul class="list-unstyled" id="measurements">

                </ul>
              </div>
              <button class="btn btn-primary" onclick="addMeasurement()" title="Agregar una medida"><i class="fas fa-plus"></i></button>
              <hr>
              <div class="form-gruop">
                <label for="campo1">Materiales:</label>
                <ul class="list-unstyled" id="materials">


                </ul>
              </div>

              <button class="btn btn-primary" onclick="addMaterial()" title="Agregar un material"><i class="fas fa-plus"></i></button>
              <hr>
              <?php
              require dirname(dirname(__DIR__)) . "/dao/CategoryDao.php";
              $categoryDao = new CategoryDao();
              $categories = $categoryDao->findAll(); ?>
              <div class="form-group">
                <label for="category">Seleccione la categoría del producto:</label>
                <br>
                <select id="category" class="wide">
                  <option disabled selected>Seleccione una categoría</option>
                  <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></option>
                  <?php } ?>
                </select>
              </div>


              <div class="row" style="margin-bottom: 20px; margin-top: 60px;">
                <div class="col"></div>
                <div class="col text-center"><button id="submitEditor" class="btn btn-primary btn-lg">Enviar</button></div>
                <div class="col"></div>
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
      <script src="/js/jquery.nice-select.min.js"></script>
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
          $('#product-item').addClass('active')
        })
      </script>
      <script src="../assets/js/script.js"></script>
      <script src="/js/es.js"></script>
      <script src="/vendor/dropzone/dropzone.js"></script>
      <script>
        let indexField = 1
        let indexMeasurement = 1
        $(document).ready(function() {
          $('[data-toggle="popover"]').popover();
          $('#fields').append(`<div class="col-sm-4">
                  Uso ${indexField}:<input type="text" id="field${indexField}" class="form-control">
                </div>`)
          $('#measurements').append(`<li>Medida ${indexField}:<div class="row">
                  <div class="col"><label for="width${indexMeasurement}">Ancho:</label><input type="number" id="width${indexMeasurement}" class="form-control"></div>
                  <div class="col"><label for="height${indexMeasurement}">Alto:</label><input type="number" id="height${indexMeasurement}" class="form-control"></div>
                  <div class="col"><label for="lenght${indexMeasurement}">Largo:</label><input type="number" id="lenght${indexMeasurement}" class="form-control"</div>
                </div></li>`)
          $('#materials').append(`<li><select class="wide" style="margin-bottom: 10px;"><option disabled selected>Seleccione un material</option>
                  <?php
                  foreach ($materials as  $material) { ?>
                                                                        <option value="<?php echo $material->getId(); ?>"><?php echo $material->getName(); ?></option>
                  <?php }
                  ?>
                </select></li>`)
        });

        function addField() {
          indexField++;
          $('#fields').append(`<div class="col-sm-4">
                  Uso ${indexField}:<input type="text" id="field${indexField}" class="form-control">
                </div>`)
        }

        function addMeasurement() {
          indexMeasurement++;
          $('#measurements').append(`<li>Medida ${indexMeasurement}:<div class="row">
                  <div class="col"><label for="width${indexMeasurement}">Ancho:</label><input type="number" id="width${indexMeasurement}" class="form-control"></div>
                  <div class="col"><label for="height${indexMeasurement}">Alto:</label><input type="number" id="height${indexMeasurement}" class="form-control"></div>
                  <div class="col"><label for="lenght${indexMeasurement}">Largo:</label><input type="number" id="lenght${indexMeasurement}" class="form-control"</div>
                </div></li>`)
        }

        function addMaterial() {
          $('#materials').append(`<li><select class="wide" style="margin-bottom: 10px;" ><option disabled selected>Seleccione un material</option>
                  <?php
                  foreach ($materials as  $material) { ?>
                                                                        <option value="<?php echo $material->getId(); ?>"><?php echo $material->getName(); ?></option>
                  <?php }
                  ?>
                </select></li>`)
          $('select').niceSelect()

        }
      </script>
      <script>
        let editor
        let myDropzone
        $(() => {
          $('select').niceSelect()
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
              }
            }
          })
          myDropzone = new Dropzone("div#myId", {
            url: "/admin/upload.php",
            method: 'post',
            paramName: 'photo',
            acceptedFiles: "image/*",
            dictDefaultMessage: 'Sube tus archivos, arrastralos o haz click para buscarlos',
            dictMaxFilesExceeded: 'Solo se permite subir una imagen',
            dictInvalidFileType: 'Solo se permite imagenes'
          })
          $('button#submitEditor').click(() => {
            if (myDropzone.getAcceptedFiles().length > 0 && $('#title').val() != '' && editor.html.get() != '') {
              let responses = []
              let uses = []
              let materials = []
              let measurements = []
              myDropzone.getAcceptedFiles().forEach(image => {
                let response = JSON.parse(image.xhr.responseText)
                responses.push(response.link)
              })
              for (let index = 0; index < $('#fields').children().length; index++) {
                if (typeof($('#field' + index).val()) != 'undefined' && $('#field' + index).val() !== "") {
                  uses.push($('#field' + index).val())
                }
              }

              for (let index = 0; index < $('#materials').children().length; index++) {
                let value = $('#materials').children()[index].firstElementChild.value
                if (value != '' && typeof(value) != 'undefined') {
                  materials.push(value)
                }
              }
              for (let index = 0; index < $('#measurements').children().length; index++) {
                let measurement = {}

                measurement.width = $('#width' + (index + 1)).val()
                measurement.height = $('#height' + (index + 1)).val()
                measurement.lenght = $('#lenght' + (index + 1)).val()
                if (typeof($('#width' + (index + 1)).val()) != 'undefinded' && $('#width' + (index + 1)).val() != '' &&
                  typeof($('#height' + (index + 1)).val()) != 'undefined' && $('#height' + (index + 1)).val() != '' && typeof($('#lenght' + (index + 1)).val()) != 'undefined' && $('#lenght' + (index + 1)).val() != '') {
                  measurements.push(measurement)
                }
              }
              $.post("api/create_product.php", {
                title: $('#title').val(),
                content: editor.html.get(),
                photos: JSON.stringify(responses),
                uses: JSON.stringify(uses),
                ref: $('#ref').val(),
                category: $('#category').val(),
                price: $('#price').val(),
                materials: JSON.stringify(materials),
                measurements: JSON.stringify(measurements)
              }, (data, status) => {
                alert("se ha subido el producto")
                //fieldsClear()
              })
            } else {
              alert("los campos deben ser completados")
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