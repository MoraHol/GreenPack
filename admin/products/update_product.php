<?php

include_once  $_SERVER["DOCUMENT_ROOT"] . "/db/env.php";
include_once  $_SERVER["DOCUMENT_ROOT"] . "/dao/ProductDao.php";


$productDao = new ProductDao();
$product = $productDao->findById($_GET["id"]);


if ($product->getCotizador() == 1) {
    include_once('update_product_normal.php');
  } else
  include_once "update_product_bolsas_laminadas.php";

/* if ($_GET["id"] == $_ENV["id_fondo_auto"]) {
    include_once "update_product_fondo.php";
} else if ($product->getCategory()->getId() == 8) {
    include_once "update_product_bolsas_laminadas.php";
} else {
    include_once "update_product_normal.php";
} */
