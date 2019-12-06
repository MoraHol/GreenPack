<?php
require_once(dirname(__DIR__) . "/db/conversor_date.php");
require_once(dirname(__DIR__) . "/db/DBOperator.php");
require_once(dirname(__DIR__) . "/db/env.php");
require_once(dirname(__DIR__) . "/dao/NoticeDao.php");
$idNotice = $_GET["id"];
$noticeDao = new NoticeDao();
$notice = $noticeDao->findById($idNotice);
$conversor = new ConversorDate();
if (!isset($_GET["admin"])) {
  $notice->setHits($notice->getHits() + 1);
  $noticeDao->update($notice);
  $notice = $noticeDao->findById((int) $_GET["id"]);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php //include("../partials/metaproperties.html"); 
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $notice->getTitle(); ?></title>
  <script src="/js/jquery-1.11.0.min.js"></script>
  <link href="/images/icon.png" rel="icon" type="image/png">
  <meta property="og:type" content="article">
  <meta property="og:title" content="<?= $notice->getTitle(); ?>">
  <meta property="og:description" content="<?= strip_tags($notice->getContent()); ?>">
  <meta property="og:url" content="<?= "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
  <meta property="og:site_name" content="GreenPack">
  <meta property="og:image" content="<?= $notice->getImage() ?>">
  <meta name="description" content="<?= strip_tags($notice->getContent()); ?>">
  <link rel="canonical" href="<?= "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:description" content="<?= substr(strip_tags($notice->getContent()), 0, 200) . "[...]"; ?>">
  <meta name="twitter:title" content="<?= $notice->getTitle(); ?>">
  <meta name="twitter:image" content="<?= $notice->getImage() ?>">
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="/css/linearicons.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">

  <link rel="stylesheet" href="/css/magnific-popup.css">
  <link rel="stylesheet" href="/css/animate.min.css">
  <link rel="stylesheet" href="/css/owl.carousel.css">
  <link rel="stylesheet" href="/css/main.min.css">
  <link rel="stylesheet" href="/css/back-top.css">
  <link rel="stylesheet" href="/css/footer.css">
  <link rel="stylesheet" href="/css/spinner.css">
  <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type='text/css' />
  <link rel="stylesheet" href="/css/translate.css">
  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="/css/style-blog.css" />
  <link rel="stylesheet" href="/css/basket.css">
  <link rel="stylesheet" href="/css/all.min.css">
  <link rel="stylesheet" href="/css/notify-style.css">
  <style>
    .search input.serch {
      color: #fff;
      padding-left: 5px;
      border: none;
      outline: none;
      display: inline-block;
      background: transparent;
      width: 120px;
    }

    ul,
    ol {
      margin: 0;
      padding-left: 2rem;
    }

    .search {
      color: #fff;
    }

    @media(min-width: 300px) {
      #block-title {
        padding-top: 140px;
        padding-bottom: 140px;
      }
    }

    @media(min-width: 900px) {
      #block-title {
        padding: 140px;
      }
    }

    @media only screen and (max-width: 767px),
    screen and (orientation: portrait) {
      .blog-post {
        width: 100%;
        padding-left: 20px;
        padding-right: 20px;
      }
    }
  </style>

  <script src="/js/spinner.js"></script>
</head>

<body>
  <?php include("../partials/fixed-quoting.html"); ?>

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
  <?php include("../partials/header_1.html") ?>
  <section class="default-banner">
    <div class="hero-area section">

      <!-- Backgound Image -->
      <div class="bg-image bg-parallax overlay" style="background-image:url(<?= $notice->getImage(); ?>); height: 580px;"></div>
      <!-- /Backgound Image -->
      <div class="container">
        <div class="row" id="block-title">
          <div class="col-md-10 col-md-offset-1 text-center">
            <!-- <ul class="hero-area-tree">
                            <li><a href="/">Inicio</a></li>
                            <li><a href="/blog">Blog</a></li>
                            <li><?= $notice->getTitle(); ?></li>
                        </ul> -->
            <h1 class="white-text"><?= $notice->getTitle(); ?></h1>
            <ul class="blog-post-meta">

              <li><?= $notice->getCreatedAt()["day"];
                  echo " de " .  " " . $conversor->monthToString($notice->getCreatedAt()["month"]) . ", " . $notice->getCreatedAt()["year"];; ?></li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- Blog -->
  <div id="blog" class="section">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- main blog -->
        <div id="main" class="col-md-9">
          <!-- blog post -->
          <div class="blog-post">
            <div class="fr-view">
              <?= $notice->getContent(); ?>
            </div>
          </div>
          <!-- /blog post -->

          <!-- blog share -->
          <div class="blog-share">
            <h4>¿Te gusto? Comparte esta Noticia:</h4>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode("https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>&t=<?= urlencode($notice->getTitle()) ?>" class="facebook"><i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com/intent/tweet?text=<?= urlencode($notice->getTitle()) ?>&url=<?= urlencode("https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>" class="twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode("https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>&title=<?= urlencode($notice->getTitle()) ?>&summary=<?= urlencode(strip_tags($notice->getContent())) ?>&source=<?= $_SERVER["HTTP_HOST"] ?>" class="facebook"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <!-- /blog share -->
        </div>
        <!-- /main blog -->

        <!-- aside blog -->
        <div id="aside" class="col-md-3">

          <!-- search widget -->
          <div class="widget search-widget">
            <form>
              <input class="input" type="text" name="search">
              <button><i class="fa fa-search"></i></button>
            </form>
          </div>
          <!-- /search widget -->

          <!-- posts widget -->
          <div class="widget posts-widget">
            <h3>Noticias Recientes</h3>
            <?php $RecentsNotices = $noticeDao->findlastest(4);
            foreach ($RecentsNotices as $notice) { ?>
            <!-- single posts -->
            <div class="single-post">
              <a class="single-post-img" href="blog-post.php?id=<?= $notice->getId() ?>">
                <img src="<?= $notice->getImage() ?>" alt="">
              </a>
              <p><small><a href="blog-post.php?id=<?= $notice->getId() ?>"><?= $notice->getTitle() ?></a></small></p>
              <!-- <p><small><?= $notice->getCreatedAt()["day"];
                                echo " de " .  " " . $conversor->monthToString($notice->getCreatedAt()["month"]) . ", " . $notice->getCreatedAt()["year"]; ?></small></p> -->
            </div>
            <!-- /single posts -->
            <?php } ?>
          </div>
          <!-- /posts widget -->
          <?php
          $notice = $noticeDao->findById((int) $_GET["id"]); ?>
        </div>
        <!-- /aside blog -->

      </div>
      <!-- row -->

    </div>
    <!-- container -->

  </div>

  <!-- Modal -->
  <div class="modal fade" id="suscription-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Suscribete</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>

        <form class="form-horizontal" role="form" id="form-suscription">
          <div class="modal-body">

            <p>Suscríbete y seras el <strong>primero</strong> en recibir información interesante y relevante en tu buzón de correo.
            </p>
            <br>
            <!--End mc_embed_signup-->

            <!-- Begin MailChimp Signup Form -->

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" value="" name="EMAIL" class="required email form-control" id="mce-EMAIL" />
              </div>
            </div>
            <div id="mce-responses" class="clear">
              <div class="response" id="mce-error-response" style="display:none"></div>
              <div class="response" id="mce-success-response" style="display:none"></div>
            </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;">
              <input type="email" value="" id="email-suscription-modal" />
            </div>


            <!--End mc_embed_signup-->
          </div>
          <div class="modal-footer remove-top">
            <button type="submit" class="btn btn-danger btn-block">Subscribete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Blog -->
  <?php include("../partials/basket.html"); ?>
  <?php include("../partials/footer.html") ?>
  <a href="#" id="back-to-top" title="Regresar al inicio"><i class="fas fa-arrow-up"></i></a>
  <script src="/js/jquery.ajaxchimp.min.js"></script>
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.sticky.js"></script>
  <script src="/js/slick.min.js"></script>
  <script src="/js/jquery.counterup.min.js"></script>
  <script src="/js/waypoints.min.js"></script>
  <script src="/js/main.js"></script>
  <script src="/js/back-top.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script>
    let minutes = `<?= str_word_count(strip_tags($notice->getContent())) / 130; ?>`;
    let time = (minutes / 0.1) * 1000
    setTimeout(() => {
      $('#suscription-modal').modal()
    }, time)
    $('#form-suscription').submit((e) => {
      e.preventDefault()
      $.post('/services/suscribe.php', {
        email: $('#email-suscription-modal').val()
      }, (data, status) => {
        if (status == 'success') {
          $('#suscription-modal').modal('hide')
          $.notify({
            message: '<br>Te has suscrito <br> Revisa tu correo ',
            title: '<strong>Suscripcion Exitosa</strong>',
            icon: 'fas fa-exclamation-triangle'
          }, {
            type: 'success'
          })
        }
      })
    })
  </script>
</body>

</html>