<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/CantidadDao.php";

$cantidadDao = new CantidadDao();

if (isset($_POST['cantidades'])) {

  $cantidadReq = $_POST['cantidades'];
  $cantidad = new Cantidad();

  $cantidad->setId($cantidadReq["id"]);
  $cantidad->setIdproduct($cantidadReq["id_product"]);
  $cantidad->setE1min($cantidadReq["e1_min"]);
  $cantidad->setE1max($cantidadReq["e1_max"]);
  $cantidad->setE2min($cantidadReq["e2_min"]);
  $cantidad->setE2max($cantidadReq["e2_max"]);
  $cantidad->setE3min($cantidadReq["e3_min"]);
  $cantidad->setE3max($cantidadReq["e3_max"]);


  if ($cantidadDao->update($cantidad)) {
    http_response_code(200);
  } else {
    http_response_code(500);
  }
} else {
  http_response_code(400);
}
