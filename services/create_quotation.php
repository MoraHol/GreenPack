<?php
require_once dirname(__DIR__) . "/model/Quotation.php";
require_once dirname(__DIR__) . "/model/Item.php";
require_once dirname(__DIR__) . "/dao/QuotationDao.php";
session_start();
if (isset($_SESSION["cart"])) {
  $quotationDao = new QuotationDao();
  $cart = unserialize($_SESSION["cart"]);
  $cart->setNameClient($_POST["name"]);
  $cart->setLastNameClient($_POST["lastname"]);
  $cart->setCompany($_POST["company"]);
  $cart->setAddress($_POST["address"]);
  $cart_ > setCity($_POST["city"]);
  $cart->setEmail($_POST["email"]);
  $cart->setPhoneNumber($_POST["phone"]);
  $cart->setCellPhoneNumber($_POST["cellphone"]);
  $quotationDao->save($cart);
} else {
  http_response_code(404);
}
