<?php
require_once(dirname(__DIR__) . "/dao/ProductDao.php");
require_once(dirname(__DIR__) . "/dao/TabProductDao.php");
if (!$_GET) {
  header("Location: /shop");
}
$productDao = new ProductDao();
$product = $productDao->findById($_GET["id"]);
$tabProductDao = new TabProductDao();
$tabs = $tabProductDao->findByProduct($product);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <?php include("../partials/metaproperties.html") ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $product->getName(); ?> | Greenpack</title>
  <!--============= CSS ======================== -->

  <link rel="stylesheet" href="/css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="/css/style-shop.css">

  <link rel="stylesheet" href="/css/linearicons.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/themify-icons/themify-icons.css">
  <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="/css/main.min.css">
  <link rel="stylesheet" href="/css/back-top.css">
  <link rel="stylesheet" href="/css/footer.css">
  <link rel="stylesheet" href="/css/spinner.css">
  <link rel="stylesheet" href="/css/solid.min.css">
  <link rel="stylesheet" href="/css/all.min.css">
  <link rel="stylesheet" href="/css/flexslider.css">
  <link rel="stylesheet" href="/css/nice-select/nice-select.css">
  <link rel="stylesheet" href="/css/style-product.css">
  <link rel="stylesheet" href="/css/basket.css">
  <link rel="stylesheet" href="/css/notify-style.css">
  <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type='text/css' />
  <link rel="stylesheet" href="/css/translate.css">


  <!--===================== JS ================-->
  <script src="/js/jquery.flexslider.js"></script>
  <script src="/js/spinner.js"></script>
  <script src="/js/imagezoom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.easing.1.3.js"></script>

  <style>
     @media screen and (max-width: 500px){
      .flex-direction-nav {
        display: none;
      }
      .flex-direction-nav .flex-prev {
        display: none;
      
    }

    .flex-direction-nav .flex-next {
      display: none;
    }
    
    }
    .flex-direction-nav {
      display: flex;
      justify-content: center;
      position: relative;
      top: -172px;
    }

    .flex-direction-nav .flex-prev {
      position: relative;
      left: -210px;
    }

    .flex-direction-nav .flex-next {
      position: relative;
      right: -210px;
    }

    .fr-view>p[data-f-id="pbf"] {
      display: none;
    }

    .tab-pane .fr-view>p[data-f-id="pbf"] {
      display: none;
    }

    .tab-content .fr-view hr {
      border-top: 1px solid rgba(0, 0, 0, 0.3);
    }

    .fr-view.fr-description p {
      font-size: 1.1rem;
    }

    .card ul,
    .fr-view ul {
      list-style: disc inside;
    }

    #collapseTwo a {
      color: #000;
    }

    @media (min-width: 800px) {
      .single {
        margin-bottom: 500px;
      }
    }

    #container-num-inks {
      display: none;
    }
  </style>

</head>

<body>
  <?php include("../partials/fixed-quoting.html"); ?>
  <div style="background-color: black; height: 81px;"></div>
  <?php include("../partials/header_1.html"); ?>
  <div class="wall-loading">
    <div class="lds-roller">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <div class="container">
    <h2><?= $product->getName(); ?></h2>
    <br>
    <div class="fr-view fr-description">
      <?= $product->getDescription(); ?>
      <br>
    </div>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="/shop/category.php?id=1&page=1">Productos</a></li>
        <li class="breadcrumb-item"><a class="text-capitalize" href="/shop/category.php?id=<?= $product->getCategory()->getId() ?>&page=1"><?= $product->getCategory()->getName() ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><span class="text-capitalize"><?= $product->getName() ?></span></li>
      </ol>
    </nav>
  </div>
  <div class="single">
    <div class="single-top-main">
      <div class="container">
        <div class="single-main">
          <div class="col-md-4 single-top ">
            <div class="flexslider">
              <ul class="slides">
                <?php foreach ($product->getImages() as $image) { ?>
                  <li data-thumb="<?= $image->getUrl(); ?>">
                    <div class="thumb-image"> <img src="<?= $image->getUrl(); ?>" data-imagezoom="true" class="img-responsive"> </div>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-md-5" id="container-cotizador">
            <div class="s_product_text" style="margin-left: 0; margin-top: 0;">

              <!-- nueva pesentacion -->
              <div class="accordion" id="accordion-cotizador">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0 panel-title">
                      <a class="btn btn-link text-left" role="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="more-less fas fa-minus"></i>Caracteristicas
                      </a>
                    </h2>
                  </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion-cotizador">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <span>impresión:</span>
                          <br>
                          <label class="switch">
                            <input type="checkbox" class="checkboxPrinting" id="impresion">
                            <span class="slider round"></span>
                            <span class="questionPrinting">NO</span>
                          </label>
                        </div>
                        <div class="col" id="container-num-inks">
                          <div class="form-group">
                            <label for="num-inks">A cuantas tintas lo quieres:</label>
                            <select id="num-inks" class="form-control">
                              <option value="1">1 tinta</option>
                              <option value="2">2 tintas</option>
                              <option value="3">3 tintas</option>
                              <option value="4">4 tintas</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo" role="tab">
                    <h2 class="mb-0 panel-title">
                      <a class="btn btn-link collapsed text-left" role="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="more-less fas fa-plus"></i>
                        Tipo de Producto
                      </a>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion-cotizador">
                    <div class="card-body">
                        <label class="radio-inline" style="margin-left: 10px;">&nbsp;&nbsp;<input type="radio" name="material" value="Productos Secos">&nbsp;&nbsp;&nbsp;Productos Secos</label>
                        <label class="radio-inline" style="margin-left: 10px;">&nbsp;&nbsp;<input type="radio" name="material" value="Productos Humedos">&nbsp;&nbsp;&nbsp;Productos Humedos</label>
                        <label class="radio-inline" style="margin-left: 10px;">&nbsp;&nbsp;<input type="radio" name="material" value="Productos Grasos">&nbsp;&nbsp;&nbsp;Productos Grasos</label>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0 panel-title">
                      <a class="btn btn-link collapsed text-left" role="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Medidas<i class="more-less fas fa-plus"></i>
                      </a>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion-cotizador">
                    <div class="card-body">
                      <div class="sorting">
                        <div class="row">
                          <div class="col">
                            <label for="width">Ancho:</label>
                            <select id="width" class="form-control">
                              <option selected disabled>Seleccione</option>
                            </select>
                          </div>
                          <div class="col">
                            <label for="height"><?= $product->getCategory()->getName() == "bolsas" ? "Fuelle" : "Alto" ?>:</label>
                            <select id="height" disabled class="form-control">
                              <option selected disabled>Seleccione</option>
                            </select>
                          </div>
                          <div class="col">
                            <label for="length">Largo:</label>
                            <select id="length" disabled class="form-control">
                              <option selected disabled>Seleccione</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingFour">
                    <h2 class="mb-0 panel-title">
                      <a class="btn btn-link collapsed text-left" role="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Cantidad<i class="more-less fas fa-plus"></i>
                      </a>
                    </h2>
                  </div>
                  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion-cotizador">
                    <div class="card-body">
                      <input type="number" name="qty" id="sst" maxlength="12" title="Cantidad:" class="input-text qty form-control">
                      <div id="help-quantity">
                        <br>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingFive">
                    <h2 class="mb-0 panel-title">
                      <a class="btn btn-link collapsed text-left" role="button" data-toggle="collapse" data-target="#collapseFive" aria-controls="collapseFive" aria-expanded="false">
                        Observaciones <i class="more-less fas fa-plus"></i>
                      </a>
                    </h2>
                  </div>
                  <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-parent="#accordion-cotizador">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="observations">Observaciones o especificaciones adicionales para el producto:</label>
                        <textarea id="observations" class="form-control" cols="30" rows="4"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="product_count form-group">
                <br>
                <a class="btn button primary-btn disabled" id="btnCotizar" href="#">adicionar al cotizador</a>
                <br>
                <br>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr width="80%" style="
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
">
  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <div class="row">
        <div class="col-md-3 uses">
          <div class=" card">
            <div class="card-icon"><i class="far fa-list-alt"></i></div>
            <h3>Usos</h3>
            <br>
            <ul>
              <?php foreach ($product->getUses() as $use) { ?>
                <li><?= $use ?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <?php if (count($tabs) > 0) { ?>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <?php foreach ($tabs as $key => $tab) { ?>
                <li class="nav-item">
                  <a class="nav-link <?= $key == 0 ? "active" : "" ?>" id="tab-<?= $tab->getId() ?>" data-toggle="tab" href="#description-tab-<?= $tab->getId() ?>" role="tab" aria-controls="description-tab-<?= $tab->getId() ?>" aria-selected="true"><?= $tab->getTitle() ?></a>
                </li>
              <?php } ?>
            </ul>
          <?php } ?>
          <?php if (count($tabs) > 0) { ?>
            <div class="tab-content" id="myTabContent">
              <?php foreach ($tabs as $key => $tab) { ?>
                <div class="tab-pane fade show <?= $key == 0 ? "active" : "" ?> " id="description-tab-<?= $tab->getId() ?>" role="tabpanel" aria-labelledby="tab<?= $tab->getId() ?>">
                  <div class="fr-view"><?= $tab->getDescription(); ?></div>
                </div>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <hr width="80%" style="
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
">

  <section class="related-product-area mt-0">
    <div class="container">
      <div class="section-intro pb-60px">
        <!-- <p>Articulos relacionados a este producto</p> -->
        <h2>Articulos <span class="section-intro__style">Relacionados</span></h2>
      </div>
    </div>
  </section>
  <section class="lattest-product-area pb-40 category-list" id="products">
    <div class="container">
      <div class="row">
        <?php
        $products = $productDao->findRelatedProducts($product, 4);
        foreach ($products as $productInstance) { ?>
          <div class="col-sm-3">
            <div class="card text-center card-product zoom-in">
              <div class="card-product__img">
                <img class="card-img" src="<?= $productInstance->getImages()[0]->getUrl(); ?>">
                <ul class="card-product__imgOverlay">
                  <li><a href="product.php?id=<?= $productInstance->getId() ?>"><i class="ti-search"></i> Cotizar</a></li>
                </ul>
              </div>
              <div class="card-body">
                <h4 class="card-product__title"><a href="#"><?= $productInstance->getName(); ?></a></h4>
              </div>
            </div>
          </div>
        <?php
        } ?>
      </div>
    </div>
  </section>
  <?php include("../partials/basket.html"); ?>
  <?php include("../partials/footer.html"); ?>
  <!--================End Product Description Area =================-->
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/jquery.nice-select.min.js"></script>
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/jquery.sticky.js"></script>
  <script src="/js/main.js"></script>
  <script src="/js/back-top.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/spinner.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="/js/bootstrap.min.js"></script>

  <script>
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: false,
        directionNav: true,
        nextText: '<i class="fas fa-angle-right fa-3x pl-3"></i>',
        prevText: '<i class="fas fa-angle-left fa-3x pl-3"></i>'
      })

    })
  </script>
  <script>
    function toggleIcon(e) {
      $(e.target)
        .prev(".card-header")
        .find(".more-less")
        .toggleClass("fa-plus fa-minus");
      console.log($(this).attr('id'))
      if ($(this).height() > 100) {
        $('.single').css('margin-bottom', '550px')
      } else {
        $('.single').css('margin-bottom', '500px')
      }
    }

    function toggleIconClose(e) {
      $(e.target)
        .prev(".card-header")
        .find(".more-less")
        .toggleClass("fa-plus fa-minus");
    }
    $(".collapse").on("show.bs.collapse", toggleIcon);
    $(".collapse").on("hide.bs.collapse", toggleIconClose);
  </script>
  <script>
    $('#height').attr("disabled", "false")
    let measurements = `<?= json_encode($product->getMeasurements()); ?>`
    measurements = JSON.parse(measurements)
    let widths = []
    if (measurements.length == 1) {
      $('#height').prop("disabled", true)
      $('#length').prop("disabled", true)
      $('#width').prop("disabled", true)
      $('#width').append(`<option>${measurements[0].width}</option>`)
      $('#width').val(measurements[0].width)
      $('#height').append(`<option>${measurements[0].height}</option>`)
      $('#height').val(measurements[0].height)
      $('#length').append(`<option>${measurements[0].length}</option>`)
      $('#length').val(measurements[0].length)
    } else {
      measurements.forEach(measurement => {
        if (!widths.includes(measurement.width)) {
          widths.push(measurement.width)
          $('#width').append(`<option>${measurement.width}</option>`)

        }
      })
      $('#width').change(function() {
        $('#height').prop("disabled", true)
        $('#length').prop("disabled", true)
        renderHeigths($(this).val())
      })
      $('#height').change(function() {
        $('#length').prop("disabled", true)
        renderLengths($(this).val(), $('#width').val())
      })
    }

    function renderHeigths(width) {
      $('#length').html('')
      $('#height').html('')
      $('#height').append('<option selected disabled>Seleccione</option>')
      $('#length').append('<option selected disabled>Seleccione</option>')
      let measurementsAux = measurements.filter((measurement) => measurement.width == width)
      let heights = []
      measurementsAux.forEach(measurement => {
        if (!heights.includes(measurement.height)) {
          heights.push(measurement.height)
          $('#height').append(`<option>${measurement.height}</option>`)
        }
      })
      $('#height').prop("disabled", false)
    }

    function renderLengths(height, width) {
      $('#length').html('')
      $('#length').append('<option selected disabled>Seleccione</option>')
      console.log(height, width)
      let measurementsAux = measurements.filter((measurement) => {
        if (measurement.height == height && measurement.width == width) {
          return measurement
        }
      })
      let lengths = []
      measurementsAux.forEach(measurement => {
        if (!lengths.includes(measurement.length)) {
          lengths.push(measurement.length)
          $('#length').append(`<option>${measurement.length}</option>`)
        }
      })
      $('#length').prop("disabled", false)
    }


    $('.checkboxPrinting').change(function() {
      if ($(this).prop('checked')) {
        $(this).siblings('.questionPrinting').html('SI')
        $('#container-num-inks').fadeIn()
      } else {
        $(this).siblings('.questionPrinting').html('NO')
        $('#container-num-inks').fadeOut()
      }
    })
  </script>
  <script>
    let category = `<?= $product->getCategory()->getName(); ?>`;
    let minQuantity = 0;
    $('#sst').val(verifyMinQuantity())
    $('#btnCotizar').removeClass("disabled")
    $('#help-quantity').fadeOut()

    function verifyMinQuantity() {
      if (category == "bolsas") {
        if ($('#width').val() < 13) {
          minQuantity = 20000
        } else {
          minQuantity = 10000
        }
      } else {
        minQuantity = 1000
      }
      return minQuantity
    }

    function verifyMinQuantityValue() {
      if ($('#sst').val() < verifyMinQuantity()) {
        $('#btnCotizar').addClass("disabled")
        $('#help-quantity').html(`<br><div class="alert alert-danger alert-min-quantity" role="alert"><span>Cantidad minima ${verifyMinQuantity()} unidades. ¿Te gustaría cotizar una menor cantidad? Te invitamos a visitar a nuestro aliado Greenpoint (<a style="color:green" href="//www.greenpointonline.com.co" target="_blank">www.greenpointonline.com.co</a>)</div>`)
        $('#help-quantity').fadeIn()
        $('.single').css('margin-bottom', '600px')
      } else {

        $('#btnCotizar').removeClass("disabled")
        $('#help-quantity').fadeOut(400, () => {
          $('#help-quantity').html('')
          $('.single').css('margin-bottom', '500px')
        })

      }
    }
    $('#sst').change(verifyMinQuantityValue)
    $('#sst').on('keyup', verifyMinQuantityValue)
    $('#width').change(verifyMinQuantityValue)
    // agregar un producto al carrito
    $('#btnCotizar').click(() => {
      let $printing = $('#impresion').prop('checked')
      let $observations = $('#observations').val()
      let $width = $('#width').val()
      let $height = $('#height').val()
      let $length = $('#length').val()
      let $material = $("input[name='material']:checked").val();
      let $quantity = $('#sst').val()
      let $numInks = $('#num-inks').val()
      let request = {
        idProduct: `<?= $product->getId(); ?>`,
        width: $width,
        height: $height,
        length: $length,
        material: $material,
        quantity: $quantity,
        printing: $printing,
        observations: $observations
      }
      if ($printing) {
        request.numInks = $numInks
      }
      if ($width != null && $height != null && $length != null && $material != undefined && $quantity > 999) {
        $.post('api/add_item.php', request, (data, status) => {
          if (status == 'success') {
            renderCart()
            showCart()
          }
        })
      } else {
        if ($width == null || $height == null || $length == null) {
          $.notify({
            message: 'Selecciona las medidas',
            title: 'Greenpack',
            icon: 'fas fa-exclamation-triangle'
          }, {
            type: 'danger'
          })
        }
        if ($material == undefined) {
          $.notify({
            message: 'Selecciona la materia prima',
            title: 'Greenpack',
            icon: 'fas fa-exclamation-triangle'
          }, {
            type: 'danger'
          })
        }
      }
    })
    $('[data-toggle="popover"]').popover();
  </script>

</body>


</html>