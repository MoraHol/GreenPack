<?php
require_once dirname(dirname(dirname(__DIR__))) . "/dao/MeasurementDao.php";
$measurementDao = new MeasurementDao();
if (!$_POST) {
  http_response_code(400);
} else {
  if (isset($_POST["idProduct"]) && isset($_POST["idMeasurement"])) {
    if ($measurementDao->deleteByProduct($_POST["idMeasurement"], $_POST["idProduct"]) > 0) {
      http_response_code(200);
    } else {
      http_response_code(500);
    }
  } else {
    http_response_code(400);
  }
}
