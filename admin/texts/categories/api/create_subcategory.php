<?php
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/dao/CategoryDao.php";
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/model/Category.php";

if (isset($_POST["nameSubcategory"]) && isset($_POST["description"]) && isset($_POST["image"]) && isset($_POST["idCategory"])) {
    $categoryDao = new CategoryDao();
    $categoryName = strtolower($_POST["nameSubcategory"]);
   /*  if ($categoryDao->findByName($categoryName) > 0) {
        $response = new stdClass();
        $response->code = 303;
        http_response_code(303);
        return $response;
    } */
    $category = new Category();
    $category->setName($_POST["nameSubcategory"]);
	$category->setDescription($_POST["description"]);
    $category->setImage($_POST["image"]);
    $category->setParentcategory($_POST["idCategory"]);
    
    $savedCategory = $categoryDao->saveSubcategory($category);

	if ($savedCategory > 0) {
		http_response_code(200);
	} else {
		http_response_code(500);
	}
} else {
	http_response_code(400);
}
