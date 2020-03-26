<?php
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/db/env.php";

$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);

$query = "SELECT * FROM `materials` WHERE `name` = 'PLA'";

$PLA = $db->consult($query, "yes");
$PLA = $PLA[0];

$price = $PLA["price_per_kg"];
header("Content-Type: text/plain");
echo $price;
