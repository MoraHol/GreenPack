<?php
/*
* Desarrollada por Teenus SAS
*/
if (!empty($_POST)) {

    require_once dirname(dirname(dirname(__DIR__))) . '/dao/MeasurementDao.php';
    $measurementDao = new MeasurementDao();
    $medidas = $_POST['data'];
    $idProducto = $_POST['id'];
    foreach ($medidas as $medida) {
        $measurement = new Measurement();
        $measurement->setcodigo($medida['Referencia']);
        $measurement->setWidth($medida['Ancho']);
        $measurement->setHeight($medida['Alto']);
        $measurement->setLength($medida['Largo']);
        $measurement->setLargoUtil($medida['LargoUtil']);
        $measurement->setAnchoTotal($medida['AnchoTotal']);
        $measurement->setPliego($medida['PiezasporPliego']);
        $measurement->setVentaMinimaImpresa($medida['VentaMinimaImpresa']);
        $measurement->setVentaMinimaGenerica($medida['VentaMinimaGenerica']);
        $measurement->setProduct($idProducto);
        $measurementDao->saveByProduct($measurement);
    }
}
