<?php include("../partials/verify-session.php");
require_once dirname(dirname(__DIR__)) . "/dao/ProductDao.php";
require_once dirname(dirname(__DIR__)) . "/dao/MaterialDao.php";
require_once dirname(dirname(__DIR__)) . "/dao/TabProductDao.php";
$productDao = new ProductDao();
if (!isset($_GET["id"])) {
  header("Location: /admin/products");
}
$product = $productDao->findById($_GET["id"]);
$tabProductDao = new TabProductDao();
$indexField = 1;
$indexMeasurement = 1;
$indexMaterial = 1;

$materialDao = new MaterialDao();
$materials = $materialDao->findAll();
$tabs = $tabProductDao->findByProduct($product);

$nameAdditional = "";
$routeDownloadFileExample = "";
switch ($product->getCategory()->getId()) {
  case 1:
    $nameAdditional = "Ventana";
    $routeDownloadFileExample = "/Catalogos/FormatMeasurements.xlsx";
    break;
  case 2:
    $nameAdditional = "Piezas por Pliego";
    $routeDownloadFileExample = "/Catalogos/FormatMeasurementsBoxes.xlsx";
    break;
  case 3:
    $nameAdditional = "Piezas por Pliego";
    $routeDownloadFileExample = "/Catalogos/FormatMeasurementsBoxes.xlsx";
    break;
  case 4:
    $nameAdditional = "Piezas por Pliego";
    $routeDownloadFileExample = "/Catalogos/FormatMeasurementsBoxes.xlsx";
    break;
  case 5:
    $nameAdditional = "Piezas por Pliego";
    $routeDownloadFileExample = "/Catalogos/FormatMeasurementsBoxes.xlsx";
    break;
}
?>
  <!-- author: Alexis Holguin, github: MoraHol -->
  <!doctype html>
  <html lang="es">

  <head>
    <title>Actualizar Producto | <?= $product->getName() ?></title>
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

      .alert-minimalist>[data-notify="icon"] {
        height: 50px;
        margin-right: 12px;
      }

      .alert-minimalist>[data-notify="title"] {
        color: rgb(51, 51, 51);
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
      }

      .alert-minimalist>[data-notify="message"] {
        font-size: 80%;
      }

      .alert-minimalist-warning {
        background-color: #ff9e0f;
        border-color: rgba(149, 149, 149, 0.3);
        border-radius: 3px;
        color: rgb(149, 149, 149);
        padding: 10px;
      }

      .alert-minimalist-warning>[data-notify="icon"] {
        height: 50px;
        margin-right: 12px;
      }

      .alert-minimalist-warning>[data-notify="title"] {
        color: rgb(51, 51, 51);
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
      }

      .alert-minimalist-warning>[data-notify="message"] {
        font-size: 80%;
      }
    </style>
    <?php if($product->getCategory()->getId() == 6){
      echo "<style>
      .lenght,.window{
        display: none;
      }
      </style>";
    } ?>
  </head>

  <body class="white-edition" id="body">
    <div class="wrapper ">
      <?php include("../partials/sidebar.php") ?>
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
                <li class="breadcrumb-item active">Actualizar Producto | <?= $product->getName() ?></li>
              </ol>

              <br>
              <div class="form-group">
                <label for="title">Producto:</label>
                <input type="text" placeholder="Ej. bolsa de manija" id="title" class="form-control" value="<?= $product->getName(); ?>">
              </div>
              <br>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="ref">Referencia:</label>
                    <input type="text" placeholder="Ej. LV-12" id="ref" class="form-control" value="<?= $product->getRef(); ?>">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="price">Gramaje:</label>
                    <input type="number" placeholder="Ej. 40" id="price" class="form-control" value="<?= $product->getPrice(); ?>">
                  </div>
                </div>
              </div>

              <br>
              <div class="form-group">
                <label for="content">descripción:</label>
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
                          <div class="imagen" style="background-image: url(<?= $image->getUrl(); ?>);">
                            <div class="info">
                              <p class="descripcion"><button class="btn btn-danger" onclick="deleteImage(<?= $image->getId(); ?>,'<?= $image->getUrl(); ?>')">Eliminar</button></p>
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
                <label for="myId">Sube las imagenes del producto:</label>
                <div id="myId" class="dropzone"></div>
              </div>
              <br>
              <br>
              <div class="form-gruop">
                <label for="campo1">Usos:</label>
                <div class="container">
                  <div class="row" id="fields">
                    <?php
                    if (is_array($product->getUses()) || is_object($product->getUses())) {
                      foreach ($product->getUses() as $use) { ?>
                        <div class="col-sm-4">
                          Uso <?= $indexField; ?>:<input type="text" id="field<?= $indexField; ?>" class="form-control" value="<?= $use; ?>">
                        </div>
                    <?php $indexField++;
                      }
                    } ?>
                  </div>
                </div>
                <button class="btn btn-primary" onclick="addField()" title="Agregar un uso"><i class="fas fa-plus"></i></button>
                <hr>

              </div>
              <div class="form-gruop" id="measurement-container">
                <label for="campo1">Medidas:</label>
                <button class="btn btn-primary" id="hideMeasurements">Ver Medidas</button>
                <ul class="list-unstyled" id="measurements">
                  <?php foreach ($product->getMeasurements() as $measurement) {
                    ?>
                    <li>Medida <?= $indexMeasurement ?>:<div class="row">
                        <div class="col"><label for="width<?= $indexMeasurement ?>">Ancho:</label><input type="number" id="width<?= $indexMeasurement ?>" class="form-control" value="<?= $measurement->getWidth(); ?>" readonly></div>
                        <div class="col height"><label for="height<?= $indexMeasurement ?>">Alto:</label><input type="number" id="height<?= $indexMeasurement ?>" class="form-control" value="<?= $measurement->getHeight(); ?>" readonly></div>
                        <div class="col lenght"><label for="lenght<?= $indexMeasurement ?>">Largo:</label><input type="number" id="lenght<?= $indexMeasurement ?>" class="form-control" value="<?= $measurement->getLength(); ?>" readonly></div>
                        <div class="col window"><label for="window<?= $indexMeasurement ?>"> <?= $nameAdditional ?></label><input type="number" id="window<?= $indexMeasurement ?>" class="form-control" value="<?= $measurement->getWindow(); ?>" readonly></div>
                        <div class="col-sm-2" style="margin-top: 1rem; display: flex; justify-content:flex-end;"><button class="btn btn-danger" onclick="deleteMeasurement(<?= $product->getId() ?>,<?= $measurement->getId() ?>)">Eliminar</button></div>
                        <div class="col-sm-2" style="margin-top: 1rem;"><button class="btn btn-warning" onclick="updateMeasurement(<?= $product->getId() ?>,<?= $measurement->getId() ?>,<?= $indexMeasurement ?>,this)">Modificar</button></div>
                      </div>
                    </li>
                  <?php $indexMeasurement++;
                  } ?>
                </ul>
              </div>
              <button class="btn btn-primary" onclick="addMeasurement()" title="Agregar una medida"><i class="fas fa-plus"></i></button>
              <button id="btnUploadExcel" class="btn btn-primary" title="Cargar Medidas"><i class="fas fa-cloud-upload-alt"></i></button>
              <div id="uploadExcel"></div>
              <hr>
              <div class="form-gruop">
                <label for="campo1">Materiales:</label>
                <ul class="list-unstyled" id="materials">
                  <?php foreach ($product->getMaterials() as $materialProduct) { ?>
                    <li>
                      <div class="row">
                        <div class="col-sm-10"><select class="wide disabled" style="margin-bottom: 10px;" id="material<?= $indexMaterial; ?>">
                            <option disabled>Seleccione un material</option>
                            <?php
                              foreach ($materials as  $material) {
                                $materialSelected = $materialProduct->getId() == $material->getId() ? $material : $materialSelected ?>
                              <option value="<?= $material->getId(); ?>" <?= $materialProduct->getId() == $material->getId() ? "selected" : "" ?> disabled><?= $material->getName(); ?></option>
                            <?php }
                              ?>
                          </select></div>
                        <div class="col"><button class="btn btn-danger" onclick="deleteMaterial(<?= $product->getId() ?>,<?= $materialSelected->getId() ?>)">Eliminar</button></div>
                      </div>
                    </li>
                  <?php $indexMaterial++;
                  } ?>
                </ul>
              </div>

              <button class="btn btn-primary" onclick="addMaterial()" title="Agregar un material"><i class="fas fa-plus"></i></button>
              <hr>
              <div class="container-fluid">
                <div class="row">Pestañas del producto:</div>
                <hr>
                <?php
                // echo count($tabs); 
                if (count($tabs) > 0) {
                  foreach ($tabs as $tab) {
                    ?>
                    <div class="row align-center">
                      <div class="col-sm-6 "><?= $tab->getTitle() ?></div>
                      <div class="col-sm-3 text-center"><a class="text-center" href="update-tab-product.php?id=<?= $tab->getId() ?>">Editar <i class="fas fa-pen"></i></a></div>
                      <div class="col-sm-3 text-center"><a class="text-center" href="javascript:deleteTab(`<?= $tab->getId() ?>`)">Borrar <i class="fas fa-trash-alt"></i></a></div>
                    </div>
                    <hr>
                <?php }
                } ?>
                <a href="new-tab-product.php?id=<?= $product->getId() ?>" class="btn btn-primary"><i class="fas fa-plus"> Crear</i></a>
              </div>
              <hr>
              <?php
              require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/CategoryDao.php";
              $categoryDao = new CategoryDao();
              $categories = $categoryDao->findAll(); ?>
              <div class="form-group">
                <label for="category">Selecciona la categoría del producto:</label>
                <br>
                <select id="category" class="wide">
                  <option disabled>Selecciona una categoría</option>
                  <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category->getId(); ?>" <?= $product->getCategory()->getId() == $category->getId() ? "selected" : ""; ?>><?= $category->getName(); ?></option>
                  <?php } ?>
                </select>
              </div>


              <div class="row" style="margin-bottom: 20px; margin-top: 60px;">
                <div class="col"><a href="/admin/products" class="btn btn-danger btn-lg"><i class="fas fa-arrow-left"></i> Regresar</a></div>
                <div class="col text-center"><button id="submitEditor" class="btn btn-primary btn-lg"><i class="fas fa-sync"></i> Guardar</button></div>
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

document.addEventListener('wheel', function(e) {
    e.preventDefault();
}, { passive: false });
/* 
document.addEventListener("mousewheel", this.mousewheel.bind(this), { passive: false }); */

      jQuery.event.special.touchstart = {
        setup: function (_, ns, handle) {
          this.addEventListener('touchstart', handle, { passive: !ns.includes('noPreventDefault') });
        }
      };
      jQuery.event.special.touchmove = {
        setup: function (_, ns, handle) {
          this.addEventListener('touchmove', handle, { passive: !ns.includes('noPreventDefault') });
        }
      };

      jQuery.event.special.wheel = {
        setup: function (_, ns, handle) {
          this.addEventListener('wheel', handle, { passive: !ns.includes('noPreventDefault') });
        }
      };


/* let scrollTimeout = 1;
        let throttle = 4500;

        window.addEventListener('wheel', ev => {
          console.log('si');
          if (scrollTimeout === 0) {
            setTimeout(() => {
              scrollTimeout = 1;
            }, throttle);
            ev.preventDefault();
            return false;
          }
          else {
            scrollTimeout = 0;
          }
        }, { passive: false}); */

        if (parseInt($('#category').val()) == 6) {
          $('.lenght').css('display', 'none')
          $('.window').css('display', 'none')
        }

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
                message: 'Imagen Eliminada',
                //title: '<strong>Greenpack</strong>',
                icon: 'fas fa-exclamation-triangle'
              }, {
                type: 'warning'
              })
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
                //title: 'Greenpack',
                message: 'Medida eliminada',
              }, {
                type: 'warning'
              })
              location.href = '#measurement-container'
            }
          })
        }

        function updateMeasurement(idProduct, idMeasurement, indexMeasurement, evTarget) {

          const widthInput = elById(`width${indexMeasurement}`);
          const heightInput = elById(`height${indexMeasurement}`);
          const lengthInput = elById(`lenght${indexMeasurement}`);
          const windowInput = elById(`window${indexMeasurement}`)
          if (evTarget.textContent === 'Modificar') {

            evTarget.textContent = 'Guardar';
          widthInput.readOnly = false;
          heightInput.readOnly = false;
          lengthInput.readOnly = false;
          windowInput.readOnly = false;
          evTarget.classList.replace('btn-warning', 'btn-info');
          } else {

            const measurementInfo = {
              idMeasurement: idMeasurement,
              width : widthInput.value,
              height : heightInput.value,
              length : lengthInput.value,
              window : windowInput.value
            };

            $.post('api/modify_measurements.php', { measurements : measurementInfo }, 
            (data, status) => {
              if (status === 'success') {
                $.notify({
                icon: 'fas fa-exclamation-triangle',
                //title: 'Greenpack',
                message: 'Medida Actualizada',
              }, {
                type: 'warning'
              })
              }
              evTarget.textContent = 'Modificar';
            widthInput.readOnly = true;
          heightInput.readOnly = true;
          lengthInput.readOnly = true;
          windowInput.readOnly = true;
          evTarget.classList.replace('btn-info', 'btn-warning');
          });
        }
      }
    

        function elById(id) {
          return document.getElementById(id);
        }

        function deleteMaterial(idProduct, idMaterial) {
          $.post('api/delete_material.php', {
            idProduct: idProduct,
            idMaterial: idMaterial
          }, (data, status) => {
            if (status == 'success') {
              reloadPage()
              $.notify({
                message: 'Material eliminado',
                title: '<strong>Greenpack</strong>',
                icon: 'fas fa-exclamation-triangle'
              }, {
                type: 'warning'
              })
            }

          })
        }

        function reloadPage() {
          $('#main-panel').html('')
          $('#main-panel').load('update_product.php?id=<?= $product->getId(); ?> #main-panel-child', (response, status, xhr) => {
            if (status == 'error') {
              alert('error')
            } else {
              initialize()
            }
          })
        }
      </script>
      <script>
        let editor
        let myDropzone
        let flagImage = false
        let text = `<?= $product->getDescription(); ?>`
        $('#measurements').fadeOut()

        function initialize() {
          $('.sidebar div.sidebar-wrapper ul.nav li:first').removeClass('active')
          $('#product-item').addClass('active')
          $('.imagen').height($('.imagen').parent().height())
          $('.imagen').width($('.imagen').parent().width())
          $('.imagen .info').height($('.imagen').parent().height())
          $('.imagen div.info').width($('.imagen').parent().width())
          $('select').niceSelect()
          if (parseInt($('#category').val()) == 6) {
            $('.height').children('label').text('Largo:')
          }
          $('#title').val(`<?= $product->getName(); ?>`)
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
          myDropzone = new Dropzone("div#myId", {
            url: "/admin/upload.php",
            method: 'post',
            paramName: 'photo',
            acceptedFiles: "image/*",
            dictDefaultMessage: 'Sube tus archivos, arrastralos o haz click para buscarlos',
            dictMaxFilesExceeded: 'Carga solo una imagen',
            dictInvalidFileType: 'Carga solo imagenes'
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
                measurement.window = $('#window' + (index + 1)).val()
                if (typeof($('#width' + (index + 1)).val()) != 'undefinded' && $('#width' + (index + 1)).val() != '' &&
                  typeof($('#height' + (index + 1)).val()) != 'undefined' && $('#height' + (index + 1)).val() != '' &&
                  typeof($('#lenght' + (index + 1)).val()) != 'undefined' && $('#lenght' + (index + 1)).val() != '' &&
                  $('#window' + (index + 1)).val() != undefined) {
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
              alert("Completa todos los campos")
            }
          })
          $('#btnUploadExcel').click(() => {
            $('#uploadExcel').html('<div>Descarga aqui el formato para cargar medidas <a id="uploadExcelFile" href="<?= $routeDownloadFileExample ?>" download="FormatoMedidas.xlsx" class="btn btn-info"><i class="fas fa-file-download"></i></a></div><div id="uploadFileExcel" class="dropzone"></div>')
            DropzoneExcel = new Dropzone("div#uploadFileExcel", {
              url: "/admin/upload-file.php",
              method: 'post',
              paramName: 'file',
              maxFiles: 1,
              dictDefaultMessage: 'Carga el archivo Excel con las medidas del producto',
              dictMaxFilesExceeded: 'Carga solo un archivo',
              dictInvalidFileType: 'Carga solo archivos de Excel'
            })
            DropzoneExcel.on('success', function(file) {
              let response = JSON.parse(file.xhr.responseText)
              let url = response.link
              $.post('api/upload_measurements.php', {
                id: `<?= $_GET["id"] ?>`,
                file: url
              }, (data, status) => {
                if (status == "success") {
                  alert('Cargado')
                }
              })
            })
          })
          $('#hideMeasurements').click(function() {
            $('#measurements').fadeToggle()
            $(this).text(function(i, text) {
              return text === "Ocultar" ? "Ver Medidas" : "Ocultar";
            })
            $(this).toggleClass('btn-primary')
          })
        }
        $(() => {
          initialize()
        })

        function update(uses, materials, measurements) {
          $.post("api/update_product.php", {
            id: <?= $product->getId(); ?>,
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
            text = editor.html.get()
            $.notify({
              message: 'Producto actualizado',
              //title: 'Greenpack',
              icon: 'fas fa-check-circle'
            }, {
              type: 'success'
            })
          })
        }

        function ajax(responses, uses, materials, measurements) {
          $.post("api/update_product.php", {
            id: <?= $product->getId(); ?>,
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
            reloadPage()
            text = editor.html.get()

            $.notify({
              message: 'Producto actualizado',
              //title: 'Greenpack',
              icon: 'fas fa-check-circle'
            }, {
              type: 'success'
            })
          })
        }
      </script>
      <script>
        indexField = <?= --$indexField; ?>;
        indexMeasurement = <?= --$indexMeasurement; ?>;
        indexMaterial = <?= --$indexMaterial; ?>;

        function addField() {
          indexField++;
          $('#fields').append(`<div class="col-sm-4">
                      Uso ${indexField}:<input type="text" id="field${indexField}" class="form-control">
                    </div>`)
        }

        function addMeasurement() {
          indexMeasurement++;
          $('#measurements').append(`
        <li>Medida ${indexMeasurement}:
          <div class="row">
            <div class="col">
              <label for="width${indexMeasurement}">Ancho:</label>
              <input type="number" id="width${indexMeasurement}" class="form-control">
            </div>
            <div class="col height">
              <label for="height${indexMeasurement}">Alto:</label>
              <input type="number" id="height${indexMeasurement}" class="form-control">
            </div>
            <div class="col lenght">
              <label for="lenght${indexMeasurement}">Largo:</label>
              <input type="number" id="lenght${indexMeasurement}" class="form-control">
            </div>
            <div class="col window">
              <label for="window${indexMeasurement}"><?= $nameAdditional ?>:</label>
              <input type="number" id="window${indexMeasurement}" class="form-control">
            </div>
            <div class="col-sm-2">
            </div>
          </div>
        </li>`)
          if (parseInt($('#category').val()) == 6) {
            $('.height').children('label').text('Largo:')
            $('.lenght').css('display', 'none')
            $('.window').css('display', 'none')
            $(`#lenght${indexMeasurement}`).val(0)
            $(`#window${indexMeasurement}`).val(0)
          }
        }



        function addMaterial() {
          indexMaterial++;
          $('#materials').append(`<li><select class="wide" style="margin-bottom: 10px;" id="material${indexMaterial}"><option disabled selected>Seleccione un material</option>
                      <?php
                      foreach ($materials as  $material) { ?>
                                                                                    <option value="<?= $material->getId(); ?>"><?= $material->getName(); ?></option>
                      <?php }
                      ?>
                    </select></li>`)
          $('select').niceSelect()
          $('select').niceSelect('update')

        }
      </script>
      <script>
        function deleteTab(id) {
          $.post('api/delete_tab_product.php', {
            id: id
          }, (data, status) => {
            if (status == 'success') {
              location.reload()
            }
          })
        }
        const urlParams = new URLSearchParams(window.location.search);
        const updated = urlParams.get('updated');

        if (updated == 'true') {
          $.notify({
            message: 'Pestaña actualizada',
            //title: 'Greenpack',
            icon: 'notification_important'
          }, {
            type: 'success'
          })
          if (typeof window.history.pushState == 'function') {
            window.history.pushState({}, "Hide", location.pathname + '?id=' + urlParams.get('id'));
          }
        }

      </script>
      <script src="/vendor/bootstrap-notify.min.js"></script>
      <script src="/vendor/sleep.js"></script>
  </body>

  </html>