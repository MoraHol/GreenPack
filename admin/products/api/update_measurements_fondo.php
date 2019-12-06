<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/MeasurementDao.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/ProductDao.php";
$productDao = new ProductDao();
$measurementDao = new MeasurementDao();
$product = $productDao->findById($_POST["id"]);

$measurements = [];
foreach (json_decode($_POST["measurements"]) as  $measurementReq) {
    $measurementsByMaterial = $measurementDao->findByMaterial($_POST["idMaterial"], $product);
    $measurement = new Measurement();
    $measurement->setWidth($measurementReq->width);
    $measurement->setHeight($measurementReq->height);
    $measurement->setLength($measurementReq->lenght);
    $measurement->setWindow($measurementReq->window);
    $measurement->setIdMaterial($_POST["idMaterial"]);
    $measurement->setProduct($product->getId());
    if (count($measurementsByMaterial) <= 0) {
        array_push($measurements, $measurement);
        $measurementDao->saveByMaterial($measurement);
    } else {
        foreach ($measurementsByMaterial as $measurementByMaterial) {
            $flag = false;
            if ($measurement->isEqual($measurementByMaterial)) {
                $flag = true;
                break;
            } else {
                $flag = false;
            }
        }
        if (!$flag) {
            $measurementDao->saveByMaterial($measurement);
        }
    }
}
