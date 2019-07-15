<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/AdminDao.php";
$adminDao = new AdminDao();
if (isset($_POST["id"])) {
  $admin = $adminDao->findById($_POST["id"]);
} else {
  http_response_code(400);
  exit;
}

if (isset($_POST["name"]) && isset($_POST["lastName"])) {
  $admin->setName($_POST["name"]);
  $admin->setLastName($_POST["lastName"]);
  if (isset($_POST["password"])) {
    $admin->setPassword(hash("sha256", $_POST["password"]));
  }
  if ($adminDao->update($admin) > 0) {
    http_response_code(200);
    exit;
  } else {
    http_response_code(500);
    exit;
  }
} else {
  http_response_code(400);
  exit;
}
