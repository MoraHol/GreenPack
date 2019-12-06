<?php

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/DBOperator.php";
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/env.php";
$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
$db->connect();
if (isset($_POST["images"])) {
  $images = json_decode($_POST["images"]);
  foreach ($images as $image) {
    $query = "INSERT INTO `carousel_clients` (`id`, `image_url`) VALUES (NULL, '$image')";
    $db->consult($query);
  }
  http_response_code(201);
} else {
  http_response_code(400);
}
