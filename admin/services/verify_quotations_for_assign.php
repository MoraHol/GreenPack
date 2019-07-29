<?php
require_once dirname(dirname(__DIR__)) . "/dao/QuotationDao.php";
$quotationDao = new QuotationDao();
$quotations = $quotationDao->findNoSolved();
foreach ($quotations as $quotation) {
  $now = new DateTime(date('Y-m-d H:i:s'));
  $createdDate = new DateTime(date('Y-m-d H:i:s', $quotation->getCreatedAt()));
  $diff = $createdDate->diff($now);
  $minutes = (int) $diff->format('%i');
  if ($minutes > 30) {
    $quotation = $quotationDao->assign($quotation);
    $quotationDao->update($quotation);
  }
}
