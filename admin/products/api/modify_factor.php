<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/FactorDao.php";

$factorDao = new FactorDao();

if (isset($_POST['factors'])) {

  $factorReq = $_POST['factors'];
  $factor = new Factor();

  $factor->setidmaterial($factorReq["idMaterial"]);
  $factor->setIdProduct($factorReq["idProduct"]);
  $factor->setE1($factorReq["e1"]);
  $factor->setE2($factorReq["e2"]);
  $factor->setE3($factorReq["e3"]);

  if ($factorDao->update($factor)) {
    http_response_code(200);
  } else {
    http_response_code(500);
  }
} else {
  http_response_code(400);
}
