<?php
require_once __DIR__ . "/vendor/dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$content = file_get_contents("cot-20190127-3564.html");

$dompdf = new Dompdf(array('enable_remote' => true));
$dompdf->load_html(utf8_decode($content));
$dompdf->setPaper('A4');
$dompdf->render();
$pdf = $dompdf->output();
$dompdf->stream('cotizacion.pdf');
