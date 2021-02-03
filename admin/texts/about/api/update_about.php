<?php
//  author: Teenus SAS Github: Teenus SAS
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/DBOperator.php";
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/env.php";

if (
     isset($_POST["title"]) && isset($_POST["content"])
    && isset($_POST["image"]) && isset($_POST["id"])
) {
    $db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
    $db->connect();
    $query = "UPDATE `about` SET `image` = '" . $_POST["image"] . "', `title` = '" . $_POST["title"] . "', `content` = '" . $_POST["content"] . "' WHERE `about`.`id_about` = " . $_POST["id"];
    if ($db->consult($query) > 0) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
    $db->close();
    exit;
} else {
    http_response_code(400);
    exit;
}
