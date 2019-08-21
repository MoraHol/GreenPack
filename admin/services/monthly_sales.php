<?php
$query = "SELECT count(*) AS n_quotations, (ELT(MONTH(`created_at`),'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre')) AS month FROM `quotations` GROUP BY MONTH(`created_at`) ORDER BY MONTH(`created_at`) ASC";

require_once dirname(dirname(__DIR__)) . "/db/DBOperator.php";
require_once dirname(dirname(__DIR__)) . "/db/env.php";

$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
$monthlySalesDB = $db->consult($query, "yes");
$months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
$monthlySales = [];
if ($monthlySalesDB !== false) {

  foreach ($months as  $month) {
    $n = 0;
    foreach ($monthlySalesDB as $monthlySaleDB) {
      if ($monthlySaleDB["month"] == $month) {
        $n = (int) $monthlySaleDB["n_quotations"];
        break;
      }
    }
    array_push($monthlySales, $n);
  }
} else { 
  $monthlySales = [0,0,0,0,0,0,0,0,0,0,0,0];
}
$db->close();
header('Content-Type: application/json');
echo json_encode($monthlySales);
