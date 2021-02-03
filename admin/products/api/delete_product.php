<?php
/*
*Desarrollada por Teenus SAS
*/
require_once dirname(dirname(dirname(__DIR__))) . "/dao/ProductDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/ImageDao.php";
$productDao = new ProductDao();
if (isset($_POST["id"])) {
  $product = $productDao->findById($_POST["id"]);
  $host = $_SERVER["HTTP_HOST"];
  foreach ($product->getImages() as $image) {
    $src = explode("https://$host", $image->getUrl());
    $src = $src[1];
    if (unlink(dirname(dirname(dirname(__DIR__))) . $src)) {
      echo true;
    }
  }
  $productDao->delete($_POST["id"]);
} else {
  http_response_code(400);
}