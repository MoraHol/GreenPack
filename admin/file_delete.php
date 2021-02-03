  
<?php
/*
* Desarrollada por Teenus SAS
*/
$host = $_SERVER["HTTP_HOST"];
$protocol = isset($_SERVER["HTTPS"]) ? "https":"http";
$src = explode("$protocol://$host", $_POST["src"]);
$src = $src[1];
if (unlink(dirname(__DIR__) . $src)) {
	echo true;
} else {
	http_response_code(400);
}
