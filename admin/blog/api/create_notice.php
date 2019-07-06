<?php
/*
*Desarrollada por Alexis Holguin(github: MoraHol)
*/
require_once dirname(dirname(dirname(__DIR__))) . "/dao/NoticeDao.php";
require_once dirname(dirname(dirname(__DIR__))) . "/model/Notice.php";
$noticeDao = new NoticeDao();
$notice = new Notice();
if (isset($_POST)) {
  $title = $_POST["title"];
  $content = $_POST["content"];
  $photo = $_POST["photo"];
  $notice->setTitle($title);
  $notice->setContent($content);
  $notice->setImage($photo);
  $notice->setActive(filter_var($_POST["active"], FILTER_VALIDATE_BOOLEAN));
  if ($noticeDao->save($notice) > 0) {
    echo "true";
  } else {
    http_response_code(400);
  }
} else {
  http_response_code(400);
}
