<?php
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/DBOperator.php";
require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/db/env.php";

$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);

$query = "SELECT * FROM `banner_shop`";
$bannerDB = $db->consult($query, "yes");
$bannerDB = $bannerDB[0];

$banner = new stdClass();
$banner->title = $bannerDB["title"];
$banner->subtitle = $bannerDB["subtitle"];
$banner->backgroundColor = $bannerDB["background_color"];
$banner->color = $bannerDB["color"];
$banner->image = $bannerDB["image"];

header("Content-Type: application/json");
echo json_encode($banner);
