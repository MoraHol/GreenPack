<?php

require_once dirname(dirname(dirname(__DIR__))) . "/dao/ProductAssocDao.php";

$productAssocDao = new ProductAssocDao();
$productsAssoc = $productAssocDao->findByProduct($_POST["idProduct"]);
/* $data = new stdClass();
$data->data = $productsAssoc; */

header("Content-Type: application/json");
echo json_encode($productsAssoc);
