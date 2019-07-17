<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/QuotationDao.php";
$quotationDao = new QuotationDao();

if (isset($_POST["id"])) {
  $quotation = $quotationDao->findById($_POST["id"]);
  $quotation->setNameClient($_POST["name"]);
  $quotation->setLastNameClient($_POST["lastname"]);
  $quotation->setCompany($_POST["company"]);
  $quotation->setAddress($_POST["address"]);
  $quotation->setCity($_POST["city"]);
  $quotation->setEmail($_POST["email"]);
  $quotation->setPhoneNumber($_POST["phone"]);
  $quotation->setCellPhoneNumber($_POST["cellphone"]);
  if (isset($_POST["extra"])) {
    $quotation->setExtraInformation($_POST["extra"]);
  }
  $items = json_decode($_POST["products"]);
  foreach ($quotation->getItems() as $key => $item) {
    $item->setQuantity($items[$key]->quantity);
    $item->setPrice($items[$key]->price);
  }
  $quotationCompare = $quotationDao->findById($_POST["id"]);
  if ($quotationCompare == $quotation) {
    http_response_code(304);
    exit;
  }
  if ($quotationDao->update($quotation) > 0) {
    http_response_code(200);
    exit;
  }
} else {
  http_response_code(400);
  exit;
}
