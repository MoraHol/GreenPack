<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/QuotationDao.php";
$quotationDao = new QuotationDao();
if (isset($_POST)) {
  $quotation = $quotationDao->findById($_POST["id"]);
  foreach ($quotation->getItems() as $item) {
    $item->calculatePrice();
  }
  if ($quotationDao->update($quotation) > 0) {
    http_response_code(200);
    echo $item->calculateDirectCost();
  } else {
    http_response_code(500);
  }
} else {
  http_response_code(404);
}
