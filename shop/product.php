<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/dao/ProductDao.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/db/env.php");

if (!$_GET) {
  header("Location: /shop");
}
$productDao = new ProductDao();
$product = $productDao->findById($_GET["id"]);

if ($product->getCategory()->getId() == 1) { // bolsas
  if ($product->getId() == $_ENV["id_sacos"]) {
    include_once('product_saco.php');
  } 
  else if($product->getId() == $_ENV["id_fondo_auto"]){
    include_once('product_fondo_automatico.php');
  }else {
    include_once('product_bolsas.php');
  }
} elseif ($product->getCategory()->getId() == 6) { //laminas
  include_once('product_laminas.php');
}elseif ($product->getCategory()->getId() == 8) { // bolsas laminadas
  include_once('product_saco.php');
} 
else {
  include_once('product_copy.php');
}
