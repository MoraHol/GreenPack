<?php
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/dao/AdminDao.php";
require_once dirname(__DIR__) . "/db/env.php";
require_once dirname(__DIR__) . "/vendor/PHPMailer/class.phpmailer.php";
require_once dirname(__DIR__) . "/vendor/PHPMailer/class.smtp.php";
$db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
$query = "SELECT TIMESTAMPDIFF(HOUR,`created_at`,now()) AS tiempo FROM quotations WHERE `solved` = 0 and TIMESTAMPDIFF(HOUR,`created_at`,now()) > 3";
$db->connect();
$quotations = $db->consult($query, "yes");
$nQuotations = count($quotations);
$adminDao = new AdminDao();
$admins = $adminDao->findAll();
if ($nQuotations > 0) {
    // envio de email
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Port = $_ENV["smtpPort"];
    $mail->IsHTML(true);
    $mail->CharSet = "utf-8";
    var_dump($admins);
    // VALORES A MODIFICAR //
    $mail->Host = $_ENV["smtpHost"];
    $mail->Username = $_ENV["smtpEmail"];
    $mail->Password = $_ENV["smtpPass"];

    $mail->From = $_ENV["smtpEmail"]; // Email desde donde env�o el correo.
    $mail->FromName = 'greenpack';
    foreach ($admins as $admin) {
        $mail->AddAddress($admin->getEmail());
    }

    $mail->Subject = "Envio de Cotización"; // Este es el titulo del email.
    $mail->Body = "<html><body><p>Tienes $nQuotations Cotizaciones sin ser atentidas por favor revisalas</p></body></html>";
    $mail->SMTPSecure = 'tls';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    if (!$mail->send()) {
        http_response_code(500);
        exit;
    } else {
        http_response_code(200);
        exit;
    }
}
