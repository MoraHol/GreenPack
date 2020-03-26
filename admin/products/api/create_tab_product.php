<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/TabProductDao.php";
if (isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["idProduct"])) {
  $tabProductDao = new TabProductDao();
  $tab  = new TabProduct();
  $tab->setTitle($_POST["title"]);
  $tab->setDescription($_POST["content"]);
  $tab->setIdProduct($_POST["idProduct"]);
  if ($tabProductDao->save($tab) > 0) {
    http_response_code(200);
  } else {
    http_response_code(500);
  }
} else {
  http_response_code(400);
}
