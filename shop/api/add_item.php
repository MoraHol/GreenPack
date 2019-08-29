<?php
require_once(dirname(dirname(__DIR__)) . "/model/Quotation.php");
require_once(dirname(dirname(__DIR__)) . "/model/Item.php");
require_once(dirname(dirname(__DIR__)) . "/model/ItemBag.php");
require_once(dirname(dirname(__DIR__)) . "/model/ItemBox.php");
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
  } else {
    $cart = new Quotation();
    $cart->setItems([]);
  }
  $product = $productDao->findById($_POST["idProduct"]);
  if ($product->getCategory()->getName() == 'bolsas') {
    $item = new ItemBag();
    $item->setLam(filter_var($_POST["lam"], FILTER_VALIDATE_BOOLEAN));
    $item->setPla(filter_var($_POST["window"], FILTER_VALIDATE_BOOLEAN));
  } else {
    $item = new ItemBox();
    $item->setLam(false);
    $item->setPla(false);
    $item->setObservations($_POST["observations"]);
    if (isset($_POST["numInks"])) {
      $item->setNumberInks($_POST["numInks"]);
    }
  }
  $item->setMaterial($materialDao->findById($_POST["material"]));
  $item->setProduct($product);
  $item->setMeasurement($measurementDao->searchMeasurementByProduct($item->getProduct(), $_POST["height"], $_POST["width"], $_POST["length"]));
  $item->setPrinting(filter_var($_POST["printing"], FILTER_VALIDATE_BOOLEAN));
  $item->setQuantity($_POST["quantity"]);
  $items = $cart->addItem($item);
  $_SESSION["cart"] = serialize($cart);
  http_response_code(200);
} else {
  http_response_code(400);
}
