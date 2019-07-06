  
<?php
/*
* Desarrollada por Alexis Holguin(github: MoraHol)
*/
$host = $_SERVER["HTTP_HOST"];
$src = explode("http://$host", $_POST["src"]);
$src = $src[1];
if (unlink(dirname(__DIR__) . $src)) {
	echo true;
} else {
	http_response_code(400);
}
