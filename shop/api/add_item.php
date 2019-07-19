<?php
require_once(dirname(dirname(__DIR__)) . "/model/Quotation.php");
require_once(dirname(dirname(__DIR__)) . "/model/Item.php");
require_once(dirname(dirname(__DIR__)) . "/dao/ProductDao.php");
require_once(dirname(dirname(__DIR__)) . "/dao/MeasurementDao.php");
require_once(dirname(dirname(__DIR__)) . "/dao/MaterialDao.php");
session_start();
if (
  isset($_POST["idProduct"]) && isset($_POST["width"])
  && isset($_POST["height"]) && isset($_POST["length"])
  && isset($_POST["printing"]) && isset($_POST["material"])
  && isset($_POST["quantity"])
) {
  $materialDao = new MaterialDao();
  $measurementDao = new MeasurementDao();
  $productDao = new ProductDao();
  if (isset($_SESSION["cart"])) {
    $cart = unserialize($_SESSION["cart"]);
    $item = new Item();
    $item->setMaterial($materialDao->findById($_POST["material"]));
    $item->setProduct($productDao->findById($_POST["idProduct"]));
    $item->setMeasurement($measurementDao->searchMeasurementByProduct($item->getProduct(), $_POST["height"], $_POST["width"], $_POST["length"]));
    $item->setPrinting(filter_var($_POST["printing"], FILTER_VALIDATE_BOOLEAN));
    $item->setQuantity($_POST["quantity"]);
    $items = $cart->addItem($item);
    $_SESSION["cart"] = serialize($cart);
    http_response_code(200);
  } else {
    $cart = new Quotation();
    $cart->setItems([]);
    $item = new Item();
    $item->setMaterial($materialDao->findById($_POST["material"]));
    $item->setProduct($productDao->findById($_POST["idProduct"]));
    $item->setMeasurement($measurementDao->searchMeasurementByProduct($item->getProduct(), $_POST["height"], $_POST["width"], $_POST["length"]));
    $item->setPrinting(filter_var($_POST["printing"], FILTER_VALIDATE_BOOLEAN));
    $item->setQuantity($_POST["quantity"]);
    $items = $cart->addItem($item);
    $_SESSION["cart"] = serialize($cart);
    http_response_code(200);
  }
} else {
  http_response_code(400);
}
