<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/QuotationDao.php";
$quotationDao = new QuotationDao();
$quotations = $quotationDao->findAll();
$quotationsSolved = $quotationDao->findSolved();
$quotationNoSolved = $quotationDao->findNoSolved();

foreach ($quotations as $quotation) {
    echo "<br>";
    echo "<br>";
    echo "<br>";
    var_dump($quotation->calculateTotal());
}
