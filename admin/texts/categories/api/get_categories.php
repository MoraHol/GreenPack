<?php
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/dao/CategoryDao.php";
$categoryDao = new CategoryDao();
$categories = $categoryDao->findAll();
$data = new stdClass();
$data->data = $categories;
header("Content-Type: application/json");
$data->links = [];
foreach ($categories as $category) {
    array_push($data->links, "<a href='" . $category->getId() . "'><i class='fas fa-pen'></i></a>");
}
echo json_encode($data);
