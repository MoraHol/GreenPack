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
  <!--<link rel="stylesheet" href="css/main.css">-->
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
  <!--===================== JS ================-->
  <script src="/js/jquery.flexslider.js"></script>
  <script src="/js/spinner.js"></script>
  <script src="/js/imagezoom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.easing.1.3.js"></script>


  <script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
      });
    });
  </script>
  <style>
    @media (min-width: 992px) {

      .col-md-1,
      .col-md-2,
      .col-md-3,
      .col-md-4,
      .col-md-5,
      .col-md-6,
      .col-md-7,
      .col-md-8,
      .col-md-9,
      .col-md-10,
      .col-md-11,
      .col-md-12 {
        float: left;
      }


    }

    .button:hover {
      color: #000;
      background-image: -webkit-linear-gradient(0deg, #7dff1abd 0%, #17c53dc9 100%);
    }

    .card {
      box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
      border-radius: 6px;
      padding-bottom: 10px;
      padding-left: 20px;
      padding-top: 20px;
    }

    .card-product {
      border: 0;
      margin-bottom: 30px;
      box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
      border-radius: 15px;
    }


    .card-icon {
      width: 60px;
      color: #fff;
      font-size: 30px;
      border-radius: 3px;
      background-color: #999999;
      padding: 15px;
      margin-top: -20px;
      margin-right: 15px;
      float: left;
      box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(255, 152, 0, 0.4);
      background: linear-gradient(60deg, #15cc91, #23b32a);
      position: relative;
      bottom: 20px;
    }
  </style>
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
          <div class="col-md-5 single-top ">
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
          <div class="col-md-4 ">
            <div class="s_product_text">
              <h3><?php echo $product->getName(); ?></h3>
              <p><?php echo strip_tags($product->getDescription()); ?></p>
              <div class="sorting form-group">
                <label for="printing">Tipo de impresion:</label>
                <select id="printing">
                  <option value="generica">generica</option>
                  <option value="impresa">impresa</option>
                </select>
              </div>
              <div class="sorting">
                <select>
                  <?php foreach ($product->getMaterials() as $material) { ?>
                    <option value="<?php echo $material->getName(); ?>"><?php echo $material->getName(); ?></option>
                  <?php
                  } ?>
                </select>
              </div>
              <div class="sorting">
                <select>
                  <?php foreach ($product->getMeasurements() as $measurement) { ?>
                    <option value="<?php echo $measurement->getId(); ?>"><?php echo $measurement->getWidth() . "+" . $measurement->getLength() . "*" . $measurement->getHeight(); ?></option>
                  <?php
                  } ?>
                </select>
              </div>
              <div class="product_count">
                <label for="qty">Cantidad:</label>
                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="ti-angle-left"></i></button>
                <input type="text" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="ti-angle-right"></i></button>
                <a class="button primary-btn" href="#">Add to Cart</a>
              </div>
            </div>
            <div class="clearfix"> </div>
          </div>
          <div class="col-md-3">
            <div class="s_product_text card">
              <div class="card-icon"><i class="far fa-list-alt"></i></div>
              <h3>Usos</h3>
              <ul>
                <?php foreach ($product->getUses() as $use) { ?>
                  <li><?php echo $use ?></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
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
  <script>
    $(document).ready(function() {
      $('select').niceSelect()
      if ($('#description1').height() < 100) {
        if ($('#description1').height() == 0) {
          $('.single').css("margin-bottom", (($('#description1').height() + 1) * 6) + 400)
        } else {
          $('.single').css("margin-bottom", ($('#description1').height() * 10) + 350)
        }
      } else {
        $('.single').css("margin-bottom", ($('#description1').height() * 2.2) + 110)
      }
    })
  </script>
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

</body>


</html>