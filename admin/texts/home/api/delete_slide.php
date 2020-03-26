<?php
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/DBOperator.php";
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/env.php";
$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
$db->connect();
if (isset($_POST["id"])) {
    $query = "DELETE FROM `slides_banner` WHERE `slides_banner`.`id` =" . $_POST["id"];
    if ($db->consult($query) > 0) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
}else{
    http_response_code(400);
}
