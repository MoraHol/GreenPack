<?php
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/DBOperator.php";
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/env.php";

$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
if (
  isset($_POST["title"]) && isset($_POST["subtitle"]) && isset($_POST["color"]) &&
  isset($_POST["backgroundColor"]) && isset($_POST["image"])
) {
  $query = "UPDATE `banner_shop` SET `color` = '" . $_POST["color"] . "', `background_color` = '" . $_POST["backgroundColor"] . "',
     `title` = '" . $_POST["title"] . "', `subtitle` = '" . $_POST["subtitle"] . "', `image` = '" . $_POST["image"] . "' 
     WHERE `banner_shop`.`id_banner_shop` = 1";
  if ($db->consult($query) > 0) {
    http_response_code(200);
  } else {
    http_response_code(500);
  }
} else {
  http_response_code(400);
}
