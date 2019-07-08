<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/MaterialDao.php";
$materialDao = new MaterialDao();
if (isset($_POST["id"])) {
    if ($materialDao->delete($_POST["id"])) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
} else {
    http_response_code(400);
}
