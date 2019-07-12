<?php
session_start();
require_once(dirname(dirname(__DIR__)) . "/model/Quotation.php");
require_once(dirname(dirname(__DIR__)) . "/model/Item.php");
require_once(dirname(dirname(__DIR__)) . "/dao/ProductDao.php");
require_once(dirname(dirname(__DIR__)) . "/dao/MeasurementDao.php");
require_once(dirname(dirname(__DIR__)) . "/dao/MaterialDao.php");
if (isset($_POST["quantity"]) && isset($_POST["id_item"])) {
    $cart = unserialize($_SESSION["cart"]);
    $indexItem = $cart->searchItem($_POST["id_item"]);
    $cart->getItems()[$indexItem]->setQuantity($_POST["quantity"]);
    $_SESSION["cart"] = serialize($cart);
} else {
    http_response_code(400);
}
