<?php
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/dao/CategoryDao.php";
$categoryDao = new CategoryDao();
if (!$_POST) {
  http_response_code(400);
} else {
  if (isset($_POST["idCategory"])) {
    if ($categoryDao->delete($_POST["idCategory"]) > 0) {
      http_response_code(200);
    } else {
      http_response_code(500);
    }
  } else {
    http_response_code(400);
  }
}