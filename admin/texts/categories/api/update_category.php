<?php
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/dao/CategoryDao.php";

if (isset($_POST["id"]) && isset($_POST["description"]) && isset($_POST["image"])) {
	$categoryDao = new CategoryDao();
	$category = $categoryDao->findById($_POST["id"]);
	$category->setDescription($_POST["description"]);
	$category->setImage($_POST["image"]);
	if ($categoryDao->update($category) > 0) {
		http_response_code(200);
	} else {
		http_response_code(500);
	}
} else {
	http_response_code(400);
}
