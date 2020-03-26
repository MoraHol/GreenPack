<?php
require_once dirname(__DIR__) . "/dao/ProductDao.php";
$productDao = new ProductDao();
echo json_encode($productDao->search($_GET["search"]));
