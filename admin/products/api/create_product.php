<?php
/*
*Desarrollada por Alexis Holguin(github: MoraHol)
*/
require_once dirname(dirname(dirname(__DIR__))) . "/dao/ProductDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/model/product.php";
require_once dirname(dirname(dirname(__DIR__))) . "/model/Image.php";
require_once dirname(dirname(dirname(__DIR__))) . "/model/measurement.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/CategoryDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/MaterialDao.php";
$categoryDao = new CategoryDao();
$productDao = new ProductDao();
$materialDao = new MaterialDao();
$product = new Product();
if (isset($_POST)) {
  $name = $_POST["title"];
  $description = $_POST["content"];
  $photos = json_decode($_POST["photos"]);
  $uses = json_decode($_POST["uses"]);
  $ref = $_POST["ref"];
  $price = $_POST["price"];
  $product->setName($name);
  $product->setDescription($description);
  $images = [];
  foreach ($photos as $photo) {
    $image = new Image();
    $image->setUrl($photo);
    array_push($images, $image);
  }
  $materials = [];
  foreach (json_decode($_POST["materials"]) as  $materialId) {
    $material = $materialDao->findById((int) $materialId);
    array_push($materials, $material);
  }
  $measurements = [];
  foreach (json_decode($_POST["measurements"]) as  $measurementReq) {
    $measurement = new Measurement();
    $measurement->setWidth($measurementReq->width);
    $measurement->setHeight($measurementReq->height);
    $measurement->setLength($measurementReq->lenght);
    array_push($measurements, $measurement);
  }
  $product->setImages($images);
  $product->setMaterials($materials);
  $product->setMeasurements($measurements);
  $product->setCategory($categoryDao->findById($_POST["category"]));
  $product->setUses($uses);
  $product->setRef($ref);
  $product->setPrice($price);
  if ($productDao->save($product) > 0) {
    echo "true";
  } else {
    http_response_code(400);
  }
} else {
  http_response_code(400);
}
