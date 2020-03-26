<?php
require("./DBOperator.php");
require("./conversor_date.php");
require_once "./env.php";
$conversor = new ConversorDate();
$consult = $_POST["search"];
$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"]);
$query = "SELECT * FROM `notices` WHERE title LIKE '%$consult%' OR content LIKE '%$consult%'";
//echo $query;
$notices = $db->consult($query, "yes");
for ($i = 0; $i < count($notices); $i++) {
    $notices[$i]["created_at"] = date_parse($notices[$i]["created_at"]);
    $notices[$i]["created_at"] = $notices[$i]["created_at"]["day"] . " de " . $conversor->monthToString($notices[$i]["created_at"]["month"]) . ", " . $notices[$i]["created_at"]["year"];
}

echo json_encode($notices);
$db->close();
