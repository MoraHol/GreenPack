<?php
require_once __DIR__ . "/vendor/dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$file = "http://" . $_SERVER["HTTP_HOST"] . "/cot-20190127-3564.php?id=" . $_GET["id"];
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $file
]);
$content = curl_exec($curl);
curl_close($curl);
$dompdf = new Dompdf(array('enable_remote' => true));
$dompdf->load_html(utf8_decode($content));
$dompdf->setPaper('letter');
$dompdf->render();
$pdf = $dompdf->output();
$dompdf->stream("cot-".bin2hex(openssl_random_pseudo_bytes(12)).".pdf");

echo $content;
