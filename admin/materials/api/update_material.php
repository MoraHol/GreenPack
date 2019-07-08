<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/MaterialDao.php";
$materialDao = new MaterialDao();
if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["grammage"]) && isset($_POST["description"])) {
  $material = $materialDao->findById($_POST["id"]);
  $material->setName($_POST["name"]);
  $material->setPricePerKg($_POST["price"]);
  $material->setGrammage($_POST["grammage"]);
  $material->setDescription($_POST["description"]);
  if ($materialDao->update($material) > 0) {
    http_response_code(200);
    echo "true";
  }
} else {
  http_response_code(400);
}
