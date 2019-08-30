<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/QuotationDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/MaterialDao.php";
if (isset($_POST["id"]) && isset($_POST["material"])) {
  $quotationDao = new QuotationDao();
  $materialDao = new MaterialDao();
  $item = $quotationDao->findItemById($_POST["id"]);
  $item->setMaterial($materialDao->findById($_POST["material"]));
  $item->calculatePrice();
  header("Content-Type: text/plain");
  echo $item->getPrice();
} else {
  http_response_code(400);
}
