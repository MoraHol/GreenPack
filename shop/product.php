<?php
require_once(dirname(__DIR__) . "/dao/ProductDao.php");
if (!$_GET) {
  header("Location: index.php");
}
$productDao = new ProductDao();
$product = $productDao->findById($_GET["id"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <?php include("../partials/metaproperties.html") ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="/js/jquery-1.11.0.min.js"></script>
  <title><?php echo $product->getName(); ?> | Greenpack</title>
  <!--============= CSS ======================== -->

  <link rel="stylesheet" href="/css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="/css/style-shop.css">

  <link rel="stylesheet" href="/css/linearicons.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/themify-icons/themify-icons.css">
  <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/back-top.css">
  <link rel="stylesheet" href="/css/footer.css">
  <link rel="stylesheet" href="/css/spinner.css">
  <link rel="stylesheet" href="/css/solid.min.css">
  <link rel="stylesheet" href="/css/all.min.css">
  <link rel="stylesheet" href="/css/flexslider.css">
  <link rel="stylesheet" href="/css/nice-select/nice-select.css">
  <link rel="stylesheet" href="/css/style-product.css">
  <!--===================== JS ================-->
  <script src="/js/jquery.flexslider.js"></script>
  <script src="/js/spinner.js"></script>
  <script src="/js/imagezoom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.easing.1.3.js"></script>


  <script>
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: false,
        directionNav: true,
        prevText: "prev",
        nextText: "next"
      });
    });
  </script>
</head>

<body>

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
  <div class="single">
    <div class="container">
      <div class="single-main">
        <div class="single-top-main">
          <div class="col-md-4 single-top ">
            <div class="flexslider">
              <ul class="slides">
                <?php foreach ($product->getImages() as $image) { ?>
                  <li data-thumb="<?php echo $image->getUrl(); ?>">
                    <div class="thumb-image"> <img src="<?php echo $image->getUrl(); ?>" data-imagezoom="true" class="img-responsive"> </div>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-md-7" id="container-cotizador">
            <div class="s_product_text" style="margin-left: 0; margin-top: 0;">
              <h3><?php echo $product->getName(); ?></h3>
              <!-- <p><?php echo strip_tags($product->getDescription()); ?></p> -->
              <!-- nueva pesentacion -->
              <div class="accordion" id="accordion-cotizador">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0 panel-title">
                      <a class="btn btn-link text-left" role="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="more-less fas fa-minus"></i>Impresión
                      </a>
                    </h2>
                  </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion-cotizador">
                    <div class="card-body">
                      <label class="switch">
                        <input type="checkbox" id="checkboxPrinting">
                        <span class="slider round"></span>
                        <span id="questionPrinting">NO</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo" role="tab">
                    <h2 class="mb-0 panel-title">
                      <a class="btn btn-link collapsed text-left" role="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="more-less fas fa-plus"></i>
                        Materiales
                      </a>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion-cotizador">
                    <div class="card-body">
                      <?php foreach ($product->getMaterials() as $material) { ?>
                        <label class="radio-inline" style="margin-left: 10px;"><input type="radio" name="material"><?php echo $material->getName(); ?></label>
                      <?php
                      } ?>
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
                            <label for="height">Alto:</label>
                            <select id="height" disabled class="form-control">
                              <option selected disabled>Seleccione</option>
                            </select>
                          </div>
                          <div class="col">
                            <label for="length">largo:</label>
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
                      <label for="sst">Cantidad:</label>
                      <input type="number" name="qty" id="sst" maxlength="12" value="1000" title="Cantidad:" class="input-text qty form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div class="product_count form-group">
                <br>
                <a class="btn button primary-btn" id="btnCotizar" href="#">Añadir al cotizador</a>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <div class="row">
        <div class="col-md-3 uses">
          <div class=" card">
            <div class="card-icon"><i class="far fa-list-alt"></i></div>
            <h3>Usos</h3>
            <ul>
              <?php foreach ($product->getUses() as $use) { ?>
                <li><?php echo $use ?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Descripción</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Especificaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <p><?php echo $product->getDescription(); ?></p>
            </div>
            <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                        <h5>Width</h5>
                      </td>
                      <td>
                        <h5>128mm</h5>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h5>Height</h5>
                      </td>
                      <td>
                        <h5>508mm</h5>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h5>Depth</h5>
                      </td>
                      <td>
                        <h5>85mm</h5>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h5>Weight</h5>
                      </td>
                      <td>
                        <h5>52gm</h5>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h5>Quality checking</h5>
                      </td>
                      <td>
                        <h5>yes</h5>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h5>Freshness Duration</h5>
                      </td>
                      <td>
                        <h5>03days</h5>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h5>When packeting</h5>
                      </td>
                      <td>
                        <h5>Without touch of hand</h5>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h5>Each Box contains</h5>
                      </td>
                      <td>
                        <h5>60pcs</h5>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="related-product-area section-margin--small mt-0">
    <div class="container">
      <div class="section-intro pb-60px">
        <p>Articulos relacionados a este producto</p>
        <h2>Articulos <span class="section-intro__style">Relacionados</span></h2>
      </div>
    </div>
  </section>
  <section class="lattest-product-area pb-40 category-list" id="products">
    <div class="container">
      <div class="row">
        <?php
        $products = $productDao->findRelatedProducts($product);
        foreach ($products as $productInstance) { ?>
          <div class="col-md-6 col-lg-4">
            <div class="card text-center card-product zoom-in">
              <div class="card-product__img">
                <img class="card-img" src="<?php echo $productInstance->getImages()[0]->getUrl(); ?>">
                <ul class="card-product__imgOverlay">
                  <li><a href="product.php?id=<?php echo $productInstance->getId() ?>"><i class="ti-search"></i> Cotizar</a></li>
                </ul>
              </div>
              <div class="card-body">
                <p><?php echo $productInstance->getCategory()->getName(); ?></p>
                <h4 class="card-product__title"><a href="#"><?php echo $productInstance->getName(); ?></a></h4>
                <p class="card-product__price">$<?php echo $productInstance->getPrice(); ?></p>
              </div>
            </div>
          </div>
        <?php
        } ?>
      </div>
    </div>
  </section>
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
    function toggleIcon(e) {
      $(e.target)
        .prev(".card-header")
        .find(".more-less")
        .toggleClass("fa-plus fa-minus");
    }
    $(".collapse").on("hide.bs.collapse", toggleIcon);
    $(".collapse").on("show.bs.collapse", toggleIcon);
  </script>
  <script>
    $('#height').attr("disabled", "false")
    let measurements = `<?php echo json_encode($product->getMeasurements()); ?>`
    measurements = JSON.parse(measurements)
    let widths = []
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


    function renderHeigths(width) {
      $('#length').html('')
      $('#height').html('')
      $('#height').append('<option selected disabled>alto</option>')
      $('#length').append('<option selected disabled>largo</option>')
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
      $('#length').append('<option selected disabled>largo</option>')
      console.log(height, width)
      let measurementsAux = measurements.filter((measurement) => {
        if (measurement.height == height && measurement.width == width) {
          return measurement
        }
      })
      console.log(measurementsAux)
      let lengths = []
      measurementsAux.forEach(measurement => {
        if (!lengths.includes(measurement.length)) {
          lengths.push(measurement.length)
          $('#length').append(`<option>${measurement.length}</option>`)
        }
      })
      $('#length').prop("disabled", false)
    }
    $('#checkboxPrinting').change(function() {
      if ($(this).prop('checked')) {
        $('#questionPrinting').html('SI')
      } else {
        $('#questionPrinting').html('NO')
      }
    })
  </script>
  <script>
    $('#sst').change(function() {
      if ($(this).val() < 1000) {
        $('#btnCotizar').addClass("disabled")
      } else {
        $('#btnCotizar').removeClass("disabled")
      }
    })
    $('#sst').on('keyup', function() {
      if ($(this).val() < 1000) {
        $('#btnCotizar').addClass("disabled")
      } else {
        $('#btnCotizar').removeClass("disabled")
      }
    })
  </script>

</body>


</html>