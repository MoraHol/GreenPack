<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/AdminDao.php";
$adminDao = new AdminDao();
if (isset($_POST["id"])) {
    if ($adminDao->delete($_POST["id"]) > 0) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
} else {
    http_response_code(400);
}
