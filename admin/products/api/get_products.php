<?php

require_once dirname(dirname(dirname(__DIR__))) . "/dao/ProductDao.php";

$productDao = new ProductDao();

if (empty($_POST))
    $products = $productDao->findAllSimpleProduct();
else
    $products = $productDao->findById($_POST['idProduct']);

$data = new stdClass();
$data->data = $products;

header("Content-Type: application/json");
echo json_encode($products);
