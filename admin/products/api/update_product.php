<?php
/*
*Desarrollada por Teenus SAS
*/
require_once dirname(dirname(dirname(__DIR__))) . "/dao/ProductDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/CategoryDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/model/Image.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/ImageDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/MaterialDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/MeasurementDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/CantidadDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/FactorDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/ProductAssocDao.php";

$productDao = new ProductDao();
$categoryDao = new CategoryDao();
$imageDao = new ImageDao();
$materialDao = new MaterialDao();
$measurementDao = new MeasurementDao();
$cantidadDao = new CantidadDao();
$factorDao = new FactorDao();
$productAssocDao = new ProductAssocDao();

/* instanciar clase para almacenar array factores */

if (!$_POST) {
  http_response_code(404);
  exit;
}

$product = $productDao->findById($_POST["id"]);
$name = $_POST["title"];
$description = $_POST["content"];
$product->setName($name);
$product->setDescription($description);
//$product->setCategory($categoryDao->findById($_POST["category"]));
$product->setCategory($_POST["category"]);
$product->setSubCategory($_POST["subcategory"]);
$product->setRef($_POST["ref"]);
$product->setUses(json_decode($_POST["uses"]));
$product->setCotizador($_POST["cotizador"]);

if (isset($_POST["photos"])) {
  $photos = json_decode($_POST["photos"]);
  $images = [];
  foreach ($photos as $photo) {
    $image = new Image();
    $image->setProduct($product->getId());
    $image->setUrl($photo);
    $imageDao->save($image);
    array_push($images, $image);
  }
  $product->setImages($images);
}

$materials = [];
$materialsByProduct = $materialDao->findByProduct($product);

foreach (json_decode($_POST["materials"]) as  $materialReq) {
  $material = $materialDao->findById((int) $materialReq->material);
  $material->setId($materialReq->material);
  $material->setE1($materialReq->e1);
  $material->setE2($materialReq->e2);
  $material->setE3($materialReq->e3);

  if (count($materialsByProduct) <= 0) {
    array_push($materials, $material, $factor);
    $materialDao->saveByProduct($material, $product);
  } else {
    $find = 0;
    for ($i = 0; $i < sizeof($materialsByProduct); $i++) {

      if ($materialsByProduct[$i]->getId() == $materialReq->material) {
        $find = 1;
        $materialDao->updateFactors($_POST["id"], $material, $materialReq->material);
      }
    }
    if ($find != 1) {
      array_push($materials, $material);
      $materialDao->saveByProduct($material, $product);
    }
  }
}

$measurements = [];

foreach (json_decode($_POST["measurements"]) as  $measurementReq) {
  $measurementsByProduct = $measurementDao->findByProduct($product);
  $measurement = new Measurement();
  $measurement->setcodigo($measurementReq->codigo);
  $measurement->setWidth($measurementReq->width);
  $measurement->setHeight($measurementReq->height);
  $measurement->setLength($measurementReq->length);
  $measurement->setLargoUtil($measurementReq->largoUtil);
  $measurement->setAnchoTotal($measurementReq->anchoTotal);
  $measurement->setVentaMinimaGenerica($measurementReq->ventaMinimaGenerica);
  $measurement->setVentaMinimaImpresa($measurementReq->ventaMinimaImpresa);
  $measurement->setProduct($product->getId());

  if ($product->getCotizador() == 2) {
    $measurement->setPliego($measurementReq->pliego);
  }

  if (count($measurementsByProduct) <= 0) {
    array_push($measurements, $measurement);
    $measurementDao->saveByProduct($measurement);
  } else {
    foreach ($measurementsByProduct as $measurementByProduct) {
      if ($measurement->isEqual($measurementByProduct)) {
        $flag = true;
        break;
      } else {
        $flag = false;
      }
    }

    if (!$flag) {
      $measurementDao->saveByProduct($measurement);
    }
  }
}

$cantidad = [];

foreach (json_decode($_POST["cantidades"]) as  $cantidadReq) {
  $cantidad = new Cantidad();
  $cantidad->setIdProduct($product->getId());
  $cantidad->setE1min($cantidadReq->e1min);
  $cantidad->setE1max($cantidadReq->e1max);
  $cantidad->setE2min($cantidadReq->e2min);
  $cantidad->setE2max($cantidadReq->e2max);
  $cantidad->setE3min($cantidadReq->e3min);
  $cantidad->setE3max($cantidadReq->e3max);
  $cantidadDao->save($cantidad);
}

if (!empty($_POST["productsAssoc"])) {
  $productsAssoc = $_POST["productsAssoc"];

  foreach ($productsAssoc as $productAssoc) {
    $prod_assoc = new ProductsAssoc();
    $prod_assoc->setIdProduct($product->getId());
    $prod_assoc->setProductAssoc($productAssoc);
    $productAssocDao->save($prod_assoc);
  }
}

$productDao->update($product);
