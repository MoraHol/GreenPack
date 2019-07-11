<?php
if (!$_GET) {
  header("Location: /blog/?page=1");
}
require_once(dirname(__DIR__) . "/db/conversor_date.php");
require_once(dirname(__DIR__) . "/db/env.php");
require_once(dirname(__DIR__) . "/dao/NoticeDao.php");
$conversor = new ConversorDate();


$noticeDao = new NoticeDao();
$notices = $noticeDao->findAllActive();
$pages = ceil(count($notices) / 4);
$pageInit = ($_GET["page"] - 1) * 4;
$noticesToShow = $noticeDao->findWithLimit($pageInit);
if ($_GET["page"] > $pages || $_GET["page"] <= 0) {
  header("Location: /blog/?page=1");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Blog | Green Pack</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include('../partials/metaproperties.html') ?>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
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
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/back-top.css">
  <link rel="stylesheet" href="/css/footer.css">
  <link rel="stylesheet" href="/css/spinner.css">
  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="/css/style-blog.css" />
  <link rel="stylesheet" href="/css/basket.css">
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

    .search {
      color: #fff;
    }

    .carousel-slick .carousel-item-notice {
      color: #fff;
      padding-top: 201px;
      padding-left: 300px;
    }

    .carousel-slick .carousel-item-notice .notice {
      border-left: 2px solid #fff;
      padding-left: 32px;
      padding-bottom: 25px;
      font-size: 17px;
      text-transform: uppercase;
      line-height: normal;
      letter-spacing: 0.100em;
      display: block;
    }

    .carousel-slick .carousel-item-notice .title {
      font-size: 22px;
      letter-spacing: 0.230em;
      position: relative;
      left: -190px;
      top: 25px;
      text-transform: uppercase;
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

  <?php
  include("../partials/header_1.html");
  ?>
  <section class="default-banner">

    <div class="hero-area section" style="height: 600px;">

      <!-- Backgound Image -->
      <div class="bg-image bg-parallax overlay" style="background-image:url(/images/nature-3294681_1920.jpg)"></div>
      <!-- /Backgound Image -->

      <div class="container align-items-end">
        <div class="carousel-slick">
          <?php
          $noticesLastest = $noticeDao->findlastest(5);
          // var_dump($noticesLastest);
          foreach ($noticesLastest as $noticeLastest) { ?>
            <div class="carousel-item-notice ">
              <span class="title">NOTICIAS</span>
              <span class="notice"><?php echo $noticeLastest->getTitle(); ?></span>
            </div>
          <?php } ?>
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

          <!-- row -->
          <div class="row" id="notices">
            <?php foreach ($noticesToShow as $notice) { ?>
              <!-- single blog -->
              <div class="col-md-6">
                <div class="single-blog">
                  <div style="margin-bottom: 6px;">
                    <div style="float:left"><i class="fas fa-fw fa-eye"></i> VISITAS: <span>0</span></div>
                    <div class="text-right">
                      <span class=""><?php echo $notice->getCreatedAt()["day"];
                                      echo " de " .  " " . $conversor->monthToString($notice->getCreatedAt()["month"]) . ", " . $notice->getCreatedAt()["year"];; ?></span>
                    </div>
                  </div>

                  <div class="blog-img">
                    <a href="blog-post.php?id=<?php echo $notice->getId() ?>">
                      <img height="264" src="<?php echo $notice->getImage() ?>" alt="">
                    </a>
                  </div>
                  <h4><a href="blog-post.php?id=<?php echo $notice->getId() ?>"><?php echo $notice->getTitle() ?>.</a></h4>
                  <hr>
                </div>
              </div>
              <!-- /single blog -->
            <?php } ?>
          </div>
          <!-- /row -->

          <!-- row -->
          <div class="row" id="pagination">

            <!-- pagination -->
            <div class="col-md-12">
              <div class="post-pagination">
                <a href="/blog/?page=<?php echo $_GET["page"] - 1 ?>" class="pagination-back pull-left btn <?php echo $_GET["page"] <= 1 ? "disabled" : ""; ?>">Anterior</a>
                <ul class="pages">
                  <?php for ($i = 0; $i < $pages; $i++) {
                    if ($_GET["page"] == $i + 1) {
                      echo "<li class='active'><a href='/blog/?page=" . ($i + 1) . "'>" . ($i + 1) . "</a></li>";
                    } else {
                      echo "<li><a href='/blog/?page=" . ($i + 1) . "'>" . ($i + 1) . "</a></li>";
                    }
                  } ?>
                </ul>
                <a href="/blog/?page=<?php echo $_GET["page"] + 1 ?>" class="pagination-next pull-right btn <?php echo $_GET["page"] >= $pages ? "disabled" : ""; ?>">Siguiente</a>
              </div>
            </div>
            <!-- pagination -->

          </div>
          <!-- /row -->
        </div>
        <!-- /main blog -->

        <!-- aside blog -->
        <div id="aside" class="col-md-3">

          <!-- search widget -->
          <div class="widget search-widget">
            <!--<form method="post" action="db/searchNotices.php">-->
            <input class="input" type="text" name="search" id="in-search">
            <button id="btn-search"><i class="fa fa-search"></i></button>
            <!--</form>-->
          </div>
          <!-- /search widget -->

          <!-- posts widget -->
          <div class="widget posts-widget">
            <h3>Noticias Recientes</h3>
            <?php $RecentsNotices = $noticeDao->findlastest(3);
            foreach ($RecentsNotices as $notice) { ?>
              <!-- single posts -->
              <div class="single-post">
                <a class="single-post-img" href="blog-post.php?id=<?php echo $notice->getId() ?>">
                  <img src="<?php echo $notice->getImage() ?>" alt="">
                </a>
                <a href="blog-post.php?id=<?php echo $notice->getId() ?>" style="line-height: 0px;"><small><?php echo $notice->getTitle() ?></small></a>
                <!-- <p><small><?php echo $notice->getCreatedAt()["day"];
                                echo " de " .  " " . $conversor->monthToString($notice->getCreatedAt()["month"]) . ", " . $notice->getCreatedAt()["year"]; ?></small></p> -->
              </div>
              <!-- /single posts -->
            <?php } ?>
          </div>
          <!-- /posts widget -->
        </div>
        <!-- /aside blog -->

      </div>
      <!-- row -->

    </div>
    <!-- container -->

  </div>
  <!-- /Blog -->
  <?php include("../partials/basket.html"); ?>
  <?php include("../partials/footer.html") ?>
  <div id="test"></div>
  <a href="#" id="back-to-top" title="Regresar al inicio"><i class="fas fa-arrow-up"></i></a>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.ajaxchimp.min.js"></script>
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.sticky.js"></script>
  <script src="/js/slick.js"></script>
  <script src="/js/jquery.counterup.min.js"></script>
  <script src="/js/waypoints.min.js"></script>
  <script src="/js/main.js"></script>
  <script src="/js/back-top.js"></script>
  <script src="https://kit.fontawesome.com/58e9d196f8.js"></script>
  <script>
    $(() => {
      $('.carousel-slick').slick({
        slidesToShow: 1,
        infinite: true,
        autoplay: true,
        arrows: false,
        draggable: true
      })
    })

    $(document).ready(function() {
      $('#btn-search').click(function() {
        if ($('#in-search').val() == '') {
          location.reload()
          location.href = "#notices"
        } else {
          $.post('/db/searchNotices.php', {
            search: $('#in-search').val()
          }, function(data, status) {
            console.log($('#in-search').val())
            let notices = JSON.parse(data)
            renderNotices(notices)
          })
        }
      })
      $('#in-search').keyup((event) => {
        if (event.which == 13) {
          if ($('#in-search').val() == '') {
            location.reload()
            location.href = "#notices"
          } else {
            $.post('/db/searchNotices.php', {
              search: $('#in-search').val()
            }, function(data, status) {
              console.log($('#in-search').val())
              let notices = JSON.parse(data)
              renderNotices(notices)
            })
          }
        }
      })
    })

    function renderNotices(notices) {
      $('#notices').html('')
      if (notices.length > 0) {
        notices.forEach(notice => {
          $('#notices').append(`<div class="col-md-6">
                <div class="single-blog">
                  <div class="blog-img">
                    <a href="blog-post.php?id=${notice.id_notice}">
                      <img src="${notice.photo}" alt="">
                    </a>
                  </div>
                  <h4><a href="blog-post.php?id=${notice.id_notice}">${notice.title}.</a></h4>
                  <div class="blog-meta">

                    <div class="pull-right">
                      <span>${notice.created_at}</span>
                    </div>
                  </div>
                </div>
              </div>`)
          $('#pagination').fadeOut()
          location.href = "#notices"
        });
      } else {
        $('#notices').append('<h3>No se encontraron resultados</h3>')
        $('#pagination').fadeOut()
        location.href = "#notices"
      }

    }
  </script>
</body>

</html>