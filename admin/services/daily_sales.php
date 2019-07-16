<?php
require_once dirname(dirname(__DIR__)) . "/db/DBOperator.php";
require_once dirname(dirname(__DIR__)) . "/db/env.php";

$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);

$dailySalesDB = $db->consult("SELECT (ELT(WEEKDAY(`created_at`) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA,count(*) AS n_quotations FROM quotations WHERE week(`created_at`) = week(CURDATE()) GROUP BY DIA_SEMANA ORDER BY DIA_SEMANA", "yes");

$dailySales = [];
foreach ($dailySalesDB as $dailySaleDB) {
    array_push($dailySales, (int) $dailySaleDB["n_quotations"]);
}
if (count($dailySales) < 7) {
    $nSales = count($dailySales);
    for ($i = $nSales; $i < 7; $i++) {
        array_push($dailySales, 0);
    }
}
header('Content-Type: application/json');
echo json_encode($dailySales);
$db->close();