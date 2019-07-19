<?php
require_once dirname(dirname(__DIR__)) . "/db/DBOperator.php";
require_once dirname(dirname(__DIR__)) . "/db/env.php";

$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);

$dailySalesDB = $db->consult("SELECT (ELT(WEEKDAY(`created_at`) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA,count(*) AS n_quotations FROM quotations WHERE week(`created_at`) = week(CURDATE()) GROUP BY DIA_SEMANA ORDER BY DIA_SEMANA", "yes");
$days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
$dailySales = [];
foreach ($days as $day) {
  $n = 0;
  foreach ($dailySalesDB as $dailySaleDB) {
    if ($dailySaleDB["DIA_SEMANA"]  == $day) {
      $n = (int) $dailySaleDB["n_quotations"];
      break;
    }
  }
  array_push($dailySales, $n);
}
header('Content-Type: application/json');
echo json_encode($dailySales);
$db->close();
