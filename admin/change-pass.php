<?php
/*
* Desarrollada por Alexis Holguin(github: MoraHol)
*/
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/db/env.php";
session_start();
$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);

$query = "UPDATE `admins` SET `password` = '" . hash("sha256", $_POST["password"]) . "' WHERE `admins`.`id_admins` = '" . $_POST["id"] . "'";
if ($db->consult($query) > 0) {
    http_response_code(200);
} else {
    http_response_code(400);
}
