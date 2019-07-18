<?php
require_once __DIR__ . "/vendor/dompdf/autoload.inc.php";
require_once __DIR__ . "/vendor/PHPMailer/class.phpmailer.php";
require_once __DIR__ . "/vendor/PHPMailer/class.smtp.php";
require_once __DIR__ . "/db/env.php";

use Dompdf\Dompdf;

// $file = "http://" . $_SERVER["HTTP_HOST"] . "/cot-20190127-3564.php?id=" . $_GET["id"];
$file = "http://" . $_SERVER["HTTP_HOST"] . "/Plantilla_Cotizacion.html";
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
$email = "wholguinmor@uniminuto.edu.co";
// envio de email
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Port = $_ENV["smtpPort"];
$mail->IsHTML(true);
$mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
$mail->Host = $_ENV["smtpHost"];
$mail->Username = $_ENV["smtpEmail"];
$mail->Password = $_ENV["smtpPass"];

$mail->From = $_ENV["smtpEmail"]; // Email desde donde env�o el correo.
$mail->FromName = 'greenpack';
$mail->AddAddress($email);
$mail->addStringAttachment($pdf, "cotizacion.pdf");
$mail->Subject = "Envio de Cotización"; // Este es el titulo del email.
$mail->Body = "
<html>
<body>
<p>Nos permitimos enviarle su cotizacion</p>
<p>cotizacion generada</p>
</body>
</html>
";
$mail->SMTPSecure = 'tls';
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
// header("Content-type:application/pdf");
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}


// $dompdf->stream("cot-".bin2hex(openssl_random_pseudo_bytes(12)).".pdf");

// echo $pdf;
