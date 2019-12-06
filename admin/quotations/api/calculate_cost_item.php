<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/QuotationDao.php";
if (isset($_GET["id"])) {
  $quotationDao = new QuotationDao();
  $item = $quotationDao->findItemById($_GET["id"]);
  header("Content-Type: text/plain");
  echo $item->calculateDirectCost();
} else {
  http_response_code(400);
}
