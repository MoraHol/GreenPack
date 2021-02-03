<?php
/*
*Desarrollada por Teenus SAS
*/
require_once dirname(dirname(dirname(__DIR__))) . "/dao/ImageDao.php";
if (isset($_POST["id"])) {
    $imageDao  = new ImageDao();
    if ($imageDao->delete($_POST["id"]) > 0) {
        http_response_code(200);
    }
} else {
    http_response_code(400);
}