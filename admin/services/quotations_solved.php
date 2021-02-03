<?php
// author Teenus SAS github: Teenus SAS
require_once dirname(dirname(__DIR__)) . "/db/DBOperator.php";
require_once dirname(dirname(__DIR__)) . "/db/env.php";

$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
// busqueda de cotizaciones no resueltas
$quotationsNoSolved = $db->consult("SELECT count(*) as no_solved FROM quotations WHERE DAYOFYEAR(`created_at`) = DAYOFYEAR(CURDATE()) AND YEAR(`created_at`) = YEAR(CURDATE()) and solved != 0", "yes");
// busqueda de cotizaciones resueltas
$quotationsSolved = $db->consult("SELECT count(*) as solved FROM quotations WHERE DAYOFYEAR(`created_at`) = DAYOFYEAR(CURDATE()) and YEAR(`created_at`) = YEAR(CURDATE()) and solved =  0",  "yes");
$quotationsNoSolved = $quotationsNoSolved[0]["no_solved"];
$quotationsSolved = $quotationsSolved[0]["solved"];
$quotations = new stdClass();
$quotations->noSolved = (int) $quotationsNoSolved;
$quotations->solved = (int) $quotationsSolved;
header('Content-Type: application/json');
echo json_encode($quotations);
