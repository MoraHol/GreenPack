<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/AdminDao.php";
$adminDao = new AdminDao();
if (isset($_POST["name"]) && isset($_POST["lastName"]) && isset($_POST["email"]) && isset($_POST["password"])) {
  $admin = new Admin();
  $admin->setName($_POST["name"]);
  $admin->setLastName($_POST["lastName"]);
  $admin->setEmail($_POST["email"]);
  $admin->setPassword(hash("sha256", $_POST["password"]));
  $admin->setRole($_POST["idAdmin"]);
  if ($adminDao->save($admin) > 0) {
    http_response_code(201);
    exit;
  } else {
    http_response_code(500);
    exit;
  }
} else {
  http_response_code(400);
  exit;
}
