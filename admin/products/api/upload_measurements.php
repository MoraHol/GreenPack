<?php
/*
* Desarrollada por Alexis Holguin(github: MoraHol)
*/
require_once dirname(dirname(dirname(__DIR__))) . '/vendor/PHPExcel/PHPExcel.php';
require_once dirname(dirname(dirname(__DIR__))) . '/dao/MeasurementDao.php';
$host = $_SERVER["HTTP_HOST"];
$src = explode("https://$host", $_POST["file"]);
$src = $src[1];
$measurementDao = new MeasurementDao();
$archivo = dirname(dirname(dirname(__DIR__))) . $src;
$inputFileType = PHPExcel_IOFactory::identify($archivo);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($archivo);
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
for ($row = 2; $row <= $highestRow; $row++) {
    $measurement = new Measurement();
    $measurement->setWidth((int) $sheet->getCell("A" . $row)->getValue());
    $measurement->setHeight((int) $sheet->getCell("B" . $row)->getValue());
    $measurement->setLength((int) $sheet->getCell("C" . $row)->getValue());
    $measurement->setWindow((int) $sheet->getCell("D" . $row)->getValue());
    $measurement->setProduct($_POST["id"]);
    $measurementDao->saveByProduct($measurement);
}
