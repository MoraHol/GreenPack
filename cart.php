<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cotización | GreenPack</title>
  <?php include("partials/metaproperties.html") ?>
  <link rel="stylesheet" href="/css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
  <!-- <link rel="stylesheet" href="/css/style-shop.css"> -->

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

  <script src="/js/jquery-1.11.0.min.js"></script>
  <script src="/js/spinner.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <style>
    .cart p {
      margin-bottom: 0 !important;
    }

    .cart .button-delete {
      font-size: 20px;
    }

    .cart .button-delete:hover {
      color: #949aa0;
    }
    .cart .measurements{
      padding-left: 15px;
    }
  </style>
</head>

<body>
  <div class="fixed-quoting text-center">
    <img src="/images/icon.png" alt="">
    <div class="fixed-link">
      <a href="">
        <span>Cotizar</span>
      </a>
    </div>
  </div>
  <div style="background-color: black; height: 81px;"></div>
  <?php include("partials/header_1.html"); ?>
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

  <div class="container-fluid cart">
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-8" >
        <div class="card">
          <div class="row align-items-center">
            <div class="col-md-3"><img src="https://greenpack.com.co/wp-content/uploads/2017/07/cea-fr.jpg" alt="" width="150" height="150"></div>
            <div class="col-md-5 align-self-center">
              <h5>Nombre del Producto</h5>
              <br>
              <p><span class="text-primary">Impresion:</span> SI</p>
              <p><span class="text-primary">Material:</span> Bond</p>
              <p><span class="text-primary">Medidas:</span></p>
              <p>
                <ul class="measurements list-inline">
                  <li class="list-inline-item"><span class="text-primary">Ancho:</span> 10</li>
                  <li class="list-inline-item"><span class="text-primary">Alto:</span> 10</li>
                  <li class="list-inline-item"><span class="text-primary">Largo:</span> 10</li>
                </ul>
              </p>
            </div>
            <div class="col-md-3">
              <p><span class="text-primary">Cantidad:</span></p>
              <p>144</p>
            </div>
            <div class="col-md-1"><a href="" class="button-delete"><i class="far fa-trash-alt"></i></a></div>
          </div>
          <hr>
          <div class="row align-items-center">
            <div class="col-md-3"><img src="https://greenpack.com.co/wp-content/uploads/2017/07/cem-ca.jpg" alt="" width="150" height="150"></div>
            <div class="col-md-5 align-self-center">
              <h5>Nombre del Producto</h5>
              <br>
              <p><span class="text-primary">Impresion:</span> SI</p>
              <p><span class="text-primary">Material:</span> Bond</p>
              <p><span class="text-primary">Medidas:</span></p>
              <p>
                <ul class="measurements list-inline">
                  <li class="list-inline-item"><span class="text-primary">Ancho:</span> 10</li>
                  <li class="list-inline-item"><span class="text-primary">Alto:</span> 10</li>
                  <li class="list-inline-item"><span class="text-primary">Largo:</span> 10</li>
                </ul>
              </p>
            </div>
            <div class="col-md-3">
              <p><span class="text-primary">Cantidad:</span></p>
              <p>144</p>
            </div>
            <div class="col-md-1"><a href="" class="button-delete"><i class="far fa-trash-alt"></i></a></div>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>
</body>

</html>