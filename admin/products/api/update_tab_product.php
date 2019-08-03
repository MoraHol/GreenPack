<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/TabProductDao.php";
if (
    isset($_POST["title"]) && isset($_POST["content"]) && isset($_POST["id"])
) {
    $tabProductDao = new TabProductDao();
    $tab = $tabProductDao->findById($_POST["id"]);
    $tab->setTitle($_POST["title"]);
    $tab->setDescription($_POST["content"]);
    if ($tabProductDao->update($tab) > 0) {
        http_response_code(201);
    } else {
        http_response_code(500);
    }
} else {
    http_response_code(400);
}
