<?php
/*
*Desarrollada por Teenus SAS
*/
require_once dirname(dirname(dirname(__DIR__))) . "/dao/NoticeDao.php";
$noticeDao = new NoticeDao();
if (isset($_POST["id"])) {
  $notice = $noticeDao->findById($_POST["id"]);
  $host = $_SERVER["HTTP_HOST"];
  $src = explode("https://$host", $notice->getImage());
  $src = $src[1];
  if (unlink(dirname(dirname(dirname(__DIR__))) . $src)) {
    echo true;
  }
  $noticeDao->delete($_POST["id"]);
} else {
  http_response_code(400);
}
