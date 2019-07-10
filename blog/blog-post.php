<?php
require_once(dirname(__DIR__) . "/db/conversor_date.php");
require_once(dirname(__DIR__) . "/db/DBOperator.php");
require_once(dirname(__DIR__) . "/db/env.php");
require_once(dirname(__DIR__) . "/dao/NoticeDao.php");
$idNotice = $_GET["id"];
$noticeDao = new NoticeDao();
$notice = $noticeDao->findById($idNotice);
$conversor = new ConversorDate();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("../partials/metaproperties.html"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $notice->getTitle(); ?></title>
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
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.0.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type='text/css' />
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/css/style-blog.css" />
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
    </style>

    <script src="/js/spinner.js"></script>
</head>

<body>


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
            <div class="bg-image bg-parallax overlay" style="background-image:url(<?php echo $notice->getImage(); ?>); height: 580px;"></div>
            <!-- /Backgound Image -->
            <div class="container">
                <div class="row" id="block-title">
                    <div class="col-md-10 col-md-offset-1 text-center">
                        <!-- <ul class="hero-area-tree">
                            <li><a href="/">Inicio</a></li>
                            <li><a href="/blog">Blog</a></li>
                            <li><?php echo $notice->getTitle(); ?></li>
                        </ul> -->
                        <h1 class="white-text"><?php echo $notice->getTitle(); ?></h1>
                        <ul class="blog-post-meta">

                            <li><?php echo $notice->getCreatedAt()["day"];
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
                        <?php echo $notice->getContent(); ?>
                    </div>
                    <!-- /blog post -->

                    <!-- blog share -->
                    <div class="blog-share">
                        <h4>¿Te gusto? Comparte esta Noticia:</h4>
                        <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="google-plus"><i class="fab fa-google-plus"></i></a>
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
                                <a class="single-post-img" href="blog-post.php?id=<?php echo $notice->getId() ?>">
                                    <img src="<?php echo $notice->getImage() ?>" alt="">
                                </a>
                                <p><small><a href="blog-post.php?id=<?php echo $notice->getId() ?>"><?php echo $notice->getTitle() ?></a></small></p>
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
    <?php include("../partials/footer.html") ?>
    <a href="#" id="back-to-top" title="Regresar al inicio"><i class="fas fa-arrow-up"></i></a>
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
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>