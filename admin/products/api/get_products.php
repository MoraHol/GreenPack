<?php

require_once dirname(dirname(dirname(__DIR__))) . "/dao/ProductDao.php";

$productDao = new ProductDao();
$products = $productDao->findAllSimpleProduct();
$data = new stdClass();
$data->data = $products;

header("Content-Type: application/json");
echo json_encode($products);
