<?php
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/DBOperator.php";
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/env.php";

if (isset($_POST["innovations"]) && isset($_POST["products"]) && isset($_POST["clients"])) {
    $db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
    $db->connect();
    $query = "UPDATE `numbers_home` SET `value` = '" . $_POST["products"] . "' WHERE `numbers_home`.`id_numbers` = 1";
    $db->consult($query);
    $query = "UPDATE `numbers_home` SET `value` = '" . $_POST["innovations"] . "' WHERE `numbers_home`.`id_numbers` = 2";
    $db->consult($query);
    $query = "UPDATE `numbers_home` SET `value` = '" . $_POST["clients"] . "' WHERE `numbers_home`.`id_numbers` = 3";
    $db->consult($query);
    $db->close();
    http_response_code(200);
    exit;
} else {
    http_response_code(400);
    exit;
}
