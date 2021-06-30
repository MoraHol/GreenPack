<?php
require_once("../../db/env.php");
require_once("../../dao/CategoryDao.php");

$categoryDao = new CategoryDao();
$category = $categoryDao->findById($_POST['idParameter']);
echo $category->getParentCategory();
