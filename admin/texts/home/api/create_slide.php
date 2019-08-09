<?php
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/DBOperator.php";
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/env.php";

if (
    isset($_POST["header"]) && isset($_POST["title"]) && isset($_POST["subtitle"])
    && isset($_POST["image"])
) {
    $db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
    $db->connect();
    $query = "INSERT INTO `slides_banner` (`id`, `image`, `header`, `title`, `subtitle`) VALUES (NULL, '" . $_POST["image"] . "', '" . $_POST["header"] . "', '" . $_POST["title"] . "', '" . $_POST["subtitle"] . "')";
    $db->consult($query);
    $db->close();
    http_response_code(201);
} else {
    http_response_code(400);
}
