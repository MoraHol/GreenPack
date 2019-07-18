<?php
session_start();
session_destroy();
require_once(dirname(__DIR__) . "/model/Quotation.php");
require_once(dirname(__DIR__) . "/model/Item.php");
require_once(dirname(__DIR__) . "/dao/ProductDao.php");
require_once(dirname(__DIR__) . "/dao/MeasurementDao.php");
require_once(dirname(__DIR__) . "/dao/MaterialDao.php");
$cart = unserialize($_SESSION["cart"]);
var_dump($cart->getItems());
