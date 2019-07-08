<!-- author: Alexis Holguin, github: MoraHol -->
<!doctype html>
<html lang="es">
<?php
require_once dirname(dirname(__DIR__)) . "/dao/ProductDao.php";
require_once dirname(dirname(__DIR__)) . "/dao/MaterialDao.php";
$productDao = new ProductDao();
if (!isset($_GET["id"])) {
  header("Location: /admin/products");
}
$product = $productDao->findById($_GET["id"]);
$indexField = 1;
$indexMeasurement = 1;
$indexMaterial = 1;

$materialDao = new MaterialDao();
$materials = $materialDao->findAll();
?>

<head>
  <title>Actualizar Producto</title>
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
  <style>
  .alert-minimalist {
	background-color: rgb(241, 242, 240);
	border-color: rgba(149, 149, 149, 0.3);
	border-radius: 3px;
	color: rgb(149, 149, 149);
	padding: 10px;
}
.alert-minimalist > [data-notify="icon"] {
	height: 50px;
	margin-right: 12px;
}
.alert-minimalist > [data-notify="title"] {
	color: rgb(51, 51, 51);
	display: block;
	font-weight: bold;
	margin-bottom: 5px;
}
.alert-minimalist > [data-notify="message"] {
	font-size: 80%;
}
.alert-minimalist-warning {
	background-color: #ff9e0f;
	border-color: rgba(149, 149, 149, 0.3);
	border-radius: 3px;
	color: rgb(149, 149, 149);
	padding: 10px;
}
.alert-minimalist-warning > [data-notify="icon"] {
	height: 50px;
	margin-right: 12px;
}
.alert-minimalist-warning > [data-notify="title"] {
	color: rgb(51, 51, 51);
	display: block;
	font-weight: bold;
	margin-bottom: 5px;
}
.alert-minimalist-warning > [data-notify="message"] {
	font-size: 80%;
}</style>
  <?php if ($_SERVER["HTTP_HOST"] != "localhost") {
    echo "<style>.fr-wrapper>div:first-child {display: none !important;}</style>";
  } ?>

</head>

<body class="white-edition" id="body">
  <div class="wrapper ">
    <?php include("../partials/sidebar.html") ?>
    <div id="main-panel">
    <div class="main-panel" id="main-panel-child">
      <!-- Navbar -->
      <?php include("../partials/navbar.php"); ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/admin/">Dashboard</a>
            </li>
            <li class="breadcrumb-item "><a href="/admin/products">Productos</a></li>
            <li class="breadcrumb-item active">Actualizar Producto</li>
          </ol>

          <br>
          <div class="form-group">
            <label for="title">Escriba el Nombre del producto:</label>
            <input type="text" placeholder="Ej. bolsa de manija" id="title" class="form-control" value="<?php echo $product->getName(); ?>">
          </div>
          <br>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="ref">Escriba la Referencia del producto:</label>
                <input type="text" placeholder="Ej. LV-12" id="ref" class="form-control" value="<?php echo $product->getRef(); ?>">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="price">Escriba el precio del producto:</label>
                <input type="number" placeholder="Ej. 2000" id="price" class="form-control" value="<?php echo $product->getPrice(); ?>">
              </div>
            </div>
          </div>

          <br>
          <div class="form-group">
            <label for="content">Escriba la descripción del producto:</label>
            <br>
            <textarea name="content" id="content"></textarea>
          </div>

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
            <div class="carousel-inner" role="listbox">
              <!--First slide-->
              <div class="carousel-item active">
                <?php $counter = 0;
                foreach ($product->getImages() as $image) {
                  if ($counter % 4 == 0 && $counter != 0) {
                    echo "</div>";
                    echo "<div class='carousel-item'>";
                  } ?>
                  <div class="col-md-3 mb-3">
                    <div class="card">
                      <div class="imagen" style="background-image: url(<?php echo $image->getUrl(); ?>);">
                        <div class="info">
                          <p class="descripcion"><button class="btn btn-danger" onclick="deleteImage(<?php echo $image->getId(); ?>,'<?php echo $image->getUrl(); ?>')">Eliminar</button></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  $counter++;
                }
                if ($counter % 4 != 0) {
                  echo "</div>";
                } ?>

              </div>
            </div>
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
                <?php foreach ($product->getUses() as $use) { ?>
                  <div class="col-sm-4">
                    Uso <?php echo $indexField; ?>:<input type="text" id="field<?php echo $indexField; ?>" class="form-control" value="<?php echo $use; ?>">
                  </div>
                  <?php $indexField++;
                } ?>
              </div>
              </div>
              <button class="btn btn-primary" onclick="addField()" title="Agregar un uso"><i class="fas fa-plus"></i></button>
              <hr>
              
            </div>
            <div class="form-gruop" id="measurement-container">
                <label for="campo1">Medidas:</label>
                <ul class="list-unstyled" id="measurements">
                  <?php foreach ($product->getMeasurements() as $measurement) { ?>
                    <li>Medida <?php echo $indexMeasurement ?>:<div class="row">
                        <div class="col"><label for="width<?php echo $indexMeasurement ?>">Ancho:</label><input type="number" id="width<?php echo $indexMeasurement ?>" class="form-control" value="<?php echo $measurement->getWidth(); ?>" readonly></div>
                        <div class="col"><label for="height<?php echo $indexMeasurement ?>">Alto:</label><input type="number" id="height<?php echo $indexMeasurement ?>" class="form-control" value="<?php echo $measurement->getHeight(); ?>" readonly></div>
                        <div class="col"><label for="lenght<?php echo $indexMeasurement ?>">Largo:</label><input type="number" id="lenght<?php echo $indexMeasurement ?>" class="form-control" value="<?php echo $measurement->getLength(); ?>" readonly></div>
                        <div class="col-sm-2"><button class="btn btn-danger" onclick="deleteMeasurement(<?php echo $product->getId() ?>,<?php echo $measurement->getId() ?>)">Eliminar</button></div>
                      </div>
                    </li>
                    <?php $indexMeasurement++;
                  } ?>
                </ul>
              </div>
              <button class="btn btn-primary" onclick="addMeasurement()" title="Agregar una medida"><i class="fas fa-plus"></i></button>
              <hr>
              <div class="form-gruop">
                <label for="campo1">Materiales:</label>
                <ul class="list-unstyled" id="materials">
                  <?php foreach ($product->getMaterials() as $materialProduct) { ?>
                    <li>
                      <div class="row">
                        <div class="col-sm-10"><select class="wide disabled" style="margin-bottom: 10px;" id="material<?php echo $indexMaterial; ?>">
                            <option disabled>Seleccione un material</option>
                            <?php
                            foreach ($materials as  $material) {
                              $materialSelected = $materialProduct->getId() == $material->getId() ? $material : $materialSelected ?>
                              <option value="<?php echo $material->getId(); ?>" <?php echo $materialProduct->getId() == $material->getId() ? "selected" : "" ?> disabled><?php echo $material->getName(); ?></option>
                            <?php }
                            ?>
                          </select></div>
                        <div class="col"><button class="btn btn-danger" onclick="deleteMaterial(<?php echo $product->getId() ?>,<?php echo $materialSelected->getId() ?>)">Eliminar</button></div>
                      </div>
                    </li>
                    <?php $indexMaterial++;
                  } ?>
                </ul>
              </div>

              <button class="btn btn-primary" onclick="addMaterial()" title="Agregar un material"><i class="fas fa-plus"></i></button>
              <hr>
              <?php
              require_once dirname(dirname(__DIR__)) . "/dao/CategoryDao.php";
              $categoryDao = new CategoryDao();
              $categories = $categoryDao->findAll(); ?>
              <div class="form-group">
                <label for="category">Seleccione la categoría del producto:</label>
                <br>
                <select id="category" class="wide">
                  <option disabled>Seleccione una categoría</option>
                  <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category->getId(); ?>" <?php echo $product->getCategory()->getId() == $category->getId() ? "selected" : ""; ?>><?php echo $category->getName(); ?></option>
                  <?php } ?>
                </select>
              </div>


              <div class="row" style="margin-bottom: 20px; margin-top: 60px;">
                <div class="col"></div>
                <div class="col text-center"><button id="submitEditor" class="btn btn-primary btn-lg">Enviar</button></div>
                <div class="col"></div>
              </div>
          </div>
          <?php include("../partials/footer.html"); ?>
        </div>
      </div>
    </div>
    
      <!--   Core JS Files   -->
      <!-- <script src="../assets/js/core/jquery.min.js"></script> -->
      <script src="/js/jquery-1.11.0.min.js"></script>
      <script src="../assets/js/core/popper.min.js"></script>
      <script src="/js/jquery.nice-select.min.js"></script>
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
      <script src="../assets/js/script.js">
      </script>
      <script src="/js/es.js"></script>
      <script src="/vendor/dropzone/dropzone.js"></script>
      <script>
        $(() => {
          $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
          $('#product-item').addClass('active')
          $('.imagen').height($('.imagen').parent().height())
          $('.imagen').width($('.imagen').parent().width())
          $('.imagen .info').height($('.imagen').parent().height())
          $('.imagen div.info').width($('.imagen').parent().width())
        })

        function deleteImage(id, url) {
          $.post('/admin/image_delete.php', {
            src: url
          }, (data, status) => {
            if (status != "success") {
              alert("error")
            }
          })
          $.post('api/image_delete.php', {
            id: id
          }, (data, status) => {
            if (status == "success") {
              $.notify({
              message: 'Se ha borrado la imagen',
              title: '<strong>Borrado</strong>',
              icon: 'fas fa-exclamation-triangle'
            },{type: 'warning'})
              reloadPage()
            }
          })
        }

        function deleteMeasurement(idProduct, idMeasurement) {
          $.post('api/delete_measurement.php', {
            idProduct: idProduct,
            idMeasurement: idMeasurement
          }, (data, status) => {
            if (status == 'success') {
              reloadPage()
              $.notify({
                icon: 'fas fa-exclamation-triangle',
                title: 'Borrado Exitoso',
                message: 'Se ha borrado la medida',
              },{type: 'warning'})
              location.href = '#measurement-container'
            }
          })
        }

        function deleteMaterial(idProduct, idMaterial) {
          $.post('api/delete_material.php', {
            idProduct: idProduct,
            idMaterial: idMaterial
          }, (data, status) => {
            if (status == 'success') {
              reloadPage()
              $.notify({
              message: 'Se ha borrado el material',
              title: '<strong>Borrado</strong>',
              icon: 'fas fa-exclamation-triangle'
            },{type: 'warning'})
            }

          })
        }

        function reloadPage() {
          $('#main-panel').html('')
          $('#main-panel').load('update_product.php?id=<?php echo $product->getId(); ?> #main-panel-child',(response, status,xhr)=>{
            if(status == 'error'){
              alert('error')
            }else{
            initialize()
            }
          })
        }
      </script>
      <script>
        let editor
        let myDropzone
        let flagImage = false
        let text = `<?php echo $product->getDescription(); ?>`

        function initialize() {
          $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
          $('#product-item').addClass('active')
          $('.imagen').height($('.imagen').parent().height())
          $('.imagen').width($('.imagen').parent().width())
          $('.imagen .info').height($('.imagen').parent().height())
          $('.imagen div.info').width($('.imagen').parent().width())
          $('select').niceSelect()
          $('#title').val(`<?php echo $product->getName(); ?>`)
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
              }
            }
          }, () => {
            editor.html.set(text)
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
            if ($('#title').val() != '' && editor.html.get() != '') {
              let responses = []
              let uses = []
              let materials = []
              let measurements = []

              for (let index = 0; index < $('#fields').children().length; index++) {
                if (typeof($('#field' + (index + 1)).val()) != 'undefined' && $('#field' + (index + 1)).val() !== "") {
                  uses.push($('#field' + (index + 1)).val())
                }
              }
              $('select').niceSelect('update')
              for (let index = 0; index < $('#materials').children().length; index++) {
                let value = $('#material' + (index + 1)).val()
                if (value != '' && typeof(value) != 'undefined' && value != null) {
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
              if (myDropzone.getAcceptedFiles().length > 0) {
                let responses = []
                myDropzone.getAcceptedFiles().forEach(image => {
                  let response = JSON.parse(image.xhr.responseText)
                  responses.push(response.link)
                })
                ajax(responses, uses, materials, measurements)
              } else {
                update(uses, materials, measurements)
              }
            } else {
              alert("los campos deben ser completados")
            }
          })
        }
        $(() => {
          initialize()
        })

        function update(uses, materials, measurements) {
          $.post("api/update_product.php", {
            id: <?php echo $product->getId(); ?> ,
            title: $('#title').val(),
            content: editor.html.get(),
            uses: JSON.stringify(uses),
            ref: $('#ref').val(),
            category: $('#category').val(),
            price: $('#price').val(),
            materials: JSON.stringify(materials),
            measurements: JSON.stringify(measurements)
          }, (data, status) => {
              reloadPage()
              $.notify({
              message: 'Se ha actualizado el producto',
              title: 'Exito',
              icon: 'fas fa-check-circle'
            },{type: 'success'})
          })
        }

        function ajax(responses, uses, materials, measurements) {
          $.post("api/update_product.php", {
            id: <?php echo $product->getId(); ?> ,
            title : $('#title').val(),
            content: editor.html.get(),
            photos: JSON.stringify(responses),
            uses: JSON.stringify(uses),
            ref: $('#ref').val(),
            category: $('#category').val(),
            price: $('#price').val(),
            materials: JSON.stringify(materials),
            measurements: JSON.stringify(measurements)
          }, (data, status) => {
            reloadPage()
            $.notify({
              message: 'Se ha actualizado el producto',
              title: 'Exito',
              icon: 'fas fa-check-circle'
            },{type: 'success'})
          })
        }
      </script>
      <script>
        indexField = <?php echo--$indexField; ?> ;
        indexMeasurement = <?php echo--$indexMeasurement; ?> ;
        indexMaterial = <?php echo--$indexMaterial; ?> ;

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
          indexMaterial++;
          $('#materials').append(`<li><select class="wide" style="margin-bottom: 10px;" id="material${indexMaterial}"><option disabled selected>Seleccione un material</option>
                  <?php
                  foreach ($materials as  $material) { ?>
                            <option value="<?php echo $material->getId(); ?>"><?php echo $material->getName(); ?></option>
                  <?php }
                  ?>
                </select></li>`)
          $('select').niceSelect()
          $('select').niceSelect('update')

        }
      </script>
      <script src="/vendor/bootstrap-notify.min.js"></script>
      <script src="/vendor/sleep.js"></script>
</body>

</html>