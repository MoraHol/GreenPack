<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/MaterialDao.php";
$materialDao = new MaterialDao();
if (!$_POST) {
  http_response_code(400);
} else {
  if (isset($_POST["idProduct"]) && isset($_POST["idMaterial"])) {
    if ($materialDao->deleteByProduct($_POST["idMaterial"], $_POST["idProduct"]) > 0) {
      http_response_code(200);
    } else {
      http_response_code(500);
    }
  } else {
    http_response_code(400);
  }
}
