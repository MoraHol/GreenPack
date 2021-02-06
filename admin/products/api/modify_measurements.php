<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/MeasurementDao.php";
/* require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/ProductDao.php"; */
/* $productDao = new ProductDao(); */
$measurementDao = new MeasurementDao();
/* $product = $productDao->findById($_POST["id"]); */

if (isset($_POST['measurements'])) {
    var_dump($_POST['measurements']);
    $measurementReq = $_POST['measurements'];
    $measurement = new Measurement();
    $measurement->setWidth($measurementReq['width']);
    $measurement->setHeight($measurementReq['height']);
    $measurement->setLength($measurementReq['length']);
    $measurement->setWindow($measurementReq['window']);
    $measurement->setLargoUtil($measurementReq['largoUtil']);
    $measurement->setAnchoTotal($measurementReq['anchoTotal']);
    $measurement->setcodigo($measurementReq['codigo']);
    $measurement->setVentaMinimaImpresa($measurementReq['ventaMinimaImpresa']);
    $measurement->setVentaMinimaGenerica($measurementReq['ventaMinimaGenerica']);
    $measurement->setId($measurementReq['idMeasurement' ]);

    if($measurementDao->update($measurement)){
    http_response_code(200);
} else {
  http_response_code(500);
}
}
else {
    http_response_code(400);
}

