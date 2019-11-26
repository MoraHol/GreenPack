<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/QuotationDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/dao/MaterialDao.php";
$quotationDao = new QuotationDao();
$materialDao = new MaterialDao();
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
  $quotation->setPaymentConditions($_POST["paymentConditions"]);
  $quotation->setDeliveryTime($_POST["deliveryTime"]);
  $quotation->setValidity($_POST["validity"]);
  if (isset($_POST["extra"])) {
    $quotation->setExtraInformation($_POST["extra"]);
  }
  $items = json_decode($_POST["products"]);
  foreach ($quotation->getItems() as $key => $item) {
    $item->setQuantity($items[$key]->quantity);
    $item->setPrice($items[$key]->price);
    if (is_a($item, "ItemBox") || is_a($item, "ItemIndividual") || is_a($item, "ItemSheet")) {
      $item->setMaterial($materialDao->findById($items[$key]->material));
    }
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
