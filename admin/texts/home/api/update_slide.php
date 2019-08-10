<?php
//  author: Alexis Holguin Github: MoraHol
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/DBOperator.php";
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/env.php";

if (
    isset($_POST["header"]) && isset($_POST["title"]) && isset($_POST["subtitle"])
    && isset($_POST["image"]) && isset($_POST["id"])
) {
    $db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
    $db->connect();
    $query = "UPDATE `slides_banner` SET `image` = '" . $_POST["image"] . "', `title` = '" . $_POST["title"] . "', `header` = '" . $_POST["header"] . "', `subtitle` = '" . $_POST["subtitle"] . "' WHERE `slides_banner`.`id` = " . $_POST["id"];
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
