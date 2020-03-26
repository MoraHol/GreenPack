<?php
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/DBOperator.php";
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/env.php";

$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
$db->connect();
$query = "SELECT * FROM `about`";
$aboutDB = $db->consult($query, "yes");
header("Content-Type: application/json");
echo json_encode($aboutDB);
