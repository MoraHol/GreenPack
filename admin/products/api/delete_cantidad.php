<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/CantidadDao.php";
$CantidadDao = new CantidadDao();
if (!$_POST) {
  http_response_code(400);
} else {
  if (isset($_POST["id"])) {
    if ($CantidadDao->deleteById($_POST["id"] > 0)) {
      http_response_code(200);
    } else {
      http_response_code(500);
    }
  } else {
    http_response_code(400);
  }
}