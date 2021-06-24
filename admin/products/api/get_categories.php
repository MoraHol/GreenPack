<?php
//require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/dao/CategoryDao.php";


require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/CategoryDao.php";
$categoryDao = new CategoryDao();
//$categories = $categoryDao->findAll();
$subcategories = $categoryDao->findAllAll();

//echo json_encode($categories);
echo json_encode($subcategories);
