<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/ProductDao.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/MeasurementDao.php";

/**
 * Este script se realiza para traer las medidas del 
 * producto con respecto a un material  
 * 
 * @author Teenus SAS
 * @version 1.0.0
 * 
 */

header("Content-Type: application/json");
if (isset($_GET["idProduct"]) && isset($_GET["idMaterial"])) {
    $productDao = new ProductDao();
    $measurementDao = new MeasurementDao();
    $product = $productDao->findById($_GET["idProduct"]);
    $materials = $measurementDao->findByMaterial($_GET["idMaterial"], $product);
    echo json_encode($materials);
} else {
    http_response_code(400);
}
