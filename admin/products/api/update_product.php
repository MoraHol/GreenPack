<?php
/*
*Desarrollada por Alexis Holguin(github: MoraHol)
*/
require_once dirname(dirname(dirname(__DIR__))) . "/dao/ProductDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/CategoryDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/model/Image.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/ImageDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/MaterialDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/MeasurementDao.php";
$productDao = new ProductDao();
$categoryDao = new CategoryDao();
$imageDao = new ImageDao();
$materialDao = new MaterialDao();
$measurementDao = new MeasurementDao();
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
$product->setPrice($_POST["price"]);
$product->setRef($_POST["ref"]);
$product->setUses(json_decode($_POST["uses"]));
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
if ($product->getId() == $_ENV["id_fondo_auto"] || $product->getCategory()->getid() == 8) {
  //si el la bolsa de fondo automatico
  foreach (json_decode($_POST["materials"]) as  $materialReq) {
    $material = $materialDao->findById((int) $materialReq->id);
    $materialReq->minimunScale = $materialReq->minimunScale == null ? "NULL" : $materialReq->minimunScale;
    $materialReq->mediumScale = $materialReq->mediumScale == null ? "NULL" : $materialReq->mediumScale;
    $materialReq->maximunScale = $materialReq->maximunScale == null ? "NULL" : $materialReq->maximunScale;

    $materialDao->saveByProduct($material, $product, $materialReq->minimunScale, $materialReq->mediumScale, $materialReq->maximunScale);
  }
} else {
  foreach (json_decode($_POST["materials"]) as  $materialId) {
    $material = $materialDao->findById((int) $materialId);
    if (count($materialsByProduct) <= 0) {
      array_push($materials, $material);
      $materialDao->saveByProduct($material, $product);
    } else {
      foreach ($materialsByProduct as $materialProduct) {
        if ($materialProduct->getId() != $material->getId()) {
          array_push($materials, $material);
          $materialDao->saveByProduct($material, $product);
        }
      }
    }
  }
}

$measurements = [];
foreach (json_decode($_POST["measurements"]) as  $measurementReq) {
  $measurementsByProduct = $measurementDao->findByProduct($product);
  $measurement = new Measurement();
  $measurement->setWidth($measurementReq->width);
  $measurement->setHeight($measurementReq->height);
  $measurement->setLength($measurementReq->lenght);
  $measurement->setWindow($measurementReq->window);
  $measurement->setProduct($product->getId());
  if ($product->getCategory()->getId() == 8) {
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
// var_dump($measurements);
$productDao->update($product);
