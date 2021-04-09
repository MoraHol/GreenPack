<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/CantidadDao.php";

$cantidadDao = new CantidadDao();

if (isset($_POST['cantidades'])) {

  $cantidadReq = $_POST['cantidades'];
  $cantidad = new Cantidad();

  $cantidad->setId($cantidadReq["id"]);
  //$cantidad->setIdproduct($cantidadReq["id_product"]);
  $cantidad->setE1min($cantidadReq["e1min"]);
  $cantidad->setE1max($cantidadReq["e1max"]);
  $cantidad->setE2min($cantidadReq["e2min"]);
  $cantidad->setE2max($cantidadReq["e2max"]);
  $cantidad->setE3min($cantidadReq["e3min"]);
  $cantidad->setE3max($cantidadReq["e3max"]);


  if ($cantidadDao->update($cantidad)) {
    http_response_code(200);
  } else {
    http_response_code(500);
  }
} else {
  http_response_code(400);
}
