<?php
require_once dirname(dirname(__DIR__)) . "/dao/QuotationDao.php";
$quotationDao = new QuotationDao();
$quotation = $quotationDao->findById($_GET["id"]);
header('Content-Type: application/json');
echo json_encode($quotation);
