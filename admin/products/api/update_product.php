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
//require_once dirname(dirname(dirname(__DIR__))) . "/dao/FactorDao.php";

$productDao = new ProductDao();
$categoryDao = new CategoryDao();
$imageDao = new ImageDao();
$materialDao = new MaterialDao();
$measurementDao = new MeasurementDao();
$cantidadDao = new CantidadDao();
//$factorDao = new FactorDao();

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
$product->setCategory($categoryDao->findById($_POST["category"]));
//$product->setPrice($_POST["price"]);
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
/* if ($product->getId() == $_ENV["id_fondo_auto"] || $product->getCategory()->getid() == 8) { */
//si el la bolsa de fondo automatico
foreach (json_decode($_POST["materials"]) as  $materialReq) {
  $material = $materialDao->findById((int) $materialReq->material);
  $material->setE1($materialReq->e1);
  $material->setE2($materialReq->e2);
  $material->setE3($materialReq->e3);
  /* $materialReq->minimunScale = $materialReq->minimunScale == null ? "NULL" : $materialReq->minimunScale;
    $materialReq->mediumScale = $materialReq->mediumScale == null ? "NULL" : $materialReq->mediumScale;
    $materialReq->maximunScale = $materialReq->maximunScale == null ? "NULL" : $materialReq->maximunScale;
     */
  if (count($materialsByProduct) <= 0) {
    array_push($materials, $material, $factor);
    $materialDao->saveByProduct($material, $product);
  } else {
    $find = 0;
    for ($i = 0; $i < sizeof($materialsByProduct); $i++) {
      //foreach ($materialsByProduct as $materialProduct) {
      if ($materialsByProduct[$i]->getId() == $materialReq->material) {
        $find = 1;
      }
    }
    if ($find != 1) {
      array_push($materials, $material);
      $materialDao->saveByProduct($material, $product);
    }
    //$materialDao->saveByProduct($material, $product, $materialReq->minimunScale, $materialReq->mediumScale, $materialReq->maximunScale);
  }
}
/* } else { */
/* foreach (json_decode($_POST["materials"]) as  $materialId) {
  $material = $materialDao->findById((int) $materialId);
} */
/* } */

$measurements = [];
foreach (json_decode($_POST["measurements"]) as  $measurementReq) {
  $measurementsByProduct = $measurementDao->findByProduct($product);
  $measurement = new Measurement();
  $measurement->setcodigo($measurementReq->codigo);
  $measurement->setWidth($measurementReq->width);
  $measurement->setHeight($measurementReq->height);
  $measurement->setLength($measurementReq->length);
  //$measurement->setWindow($measurementReq->window);
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

/* Cantidades */

$cantidad = [];

foreach (json_decode($_POST["cantidades"]) as  $cantidadReq) {
  $cantidad = new Cantidad();

  //$cantidad->setId($cantidadReq->getId());
  $cantidad->setIdProduct($product->getId());
  $cantidad->setE1min($cantidadReq->e1min);
  $cantidad->setE1max($cantidadReq->e1max);
  $cantidad->setE2min($cantidadReq->e2min);
  $cantidad->setE2max($cantidadReq->e2max);
  $cantidad->setE3min($cantidadReq->e3min);
  $cantidad->setE3max($cantidadReq->e3max);

  //array_push($cantidades, $cantidad);
  $cantidadDao->save($cantidad);
}

/* Crear funcion para almacenar factores setter y getter */

/* $factors = [];
foreach (json_decode($_POST["materialFactors"]) as $factorReq) {
  $factorsByProduct = $factorDao->findByProduct($product);
  $factor = new Factor();
  $factor->setIdmaterial($factorReq->materials);
  $factor->setIdProduct($factorReq->product);
  $factor->setE1($factorReq->e1);
  $factor->setE2($factorReq->e2);
  $factor->setE3($factorReq->e3);

  if (count($factorsByProduct) <= 0) {
    array_push($factors, $factor);
    $factorDao->save($factor);
  } else {
    foreach ($factorsByProduct as $factorProduct) {
      if ($factorProduct->getId() != $factor->getIdproduct()) {
        array_push($factors, $factor);
        $factorDao->save($factor);
      }
    }
  }
} */

// var_dump($measurements);
$productDao->update($product);
