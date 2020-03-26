<?php
/*
*Desarrollada por Alexis Holguin(github: MoraHol)
*/
require_once dirname(dirname(dirname(__DIR__))) . "/dao/NoticeDao.php";
$noticeDao = new NoticeDao();
if (isset($_POST["update"])) {
  var_dump($_POST);
  $notice = $noticeDao->findById($_POST["id"]);
  $notice->setTitle($_POST["title"]);
  $notice->setContent($_POST["content"]);
  $notice->setImage($_POST["photo"]);
  $notice->setActive(filter_var($_POST["active"], FILTER_VALIDATE_BOOLEAN));
  $noticeDao->update($notice);
}