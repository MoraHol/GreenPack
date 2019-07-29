<?php
require_once dirname(dirname(__DIR__)) . "/vendor/PHPMailer/class.phpmailer.php";
require_once dirname(dirname(__DIR__)) . "/vendor/PHPMailer/class.smtp.php";
require_once dirname(dirname(__DIR__)) . "/db/env.php";
if ($_GET["email"]) {
  $email = $_GET["email"];
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
  $mail->FromName = 'GreenPack';
  $mail->AddAddress($email);
  $mail->Subject = "Nueva Cotización"; // Este es el titulo del email.
  $mail->Body = "<!DOCTYPE html>
  <html>
  <head>
  <meta charset=utf-8 />
  <title>Notificación de nueva cotizacion</title>
  </head>
  <body>
  <img src='data:image/png;base64,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'>
    <p>Se le ha sido asignado una nueva cotización. A partir de este momento tiene 30 minutos para darle respuesta. O sera asignada a otro vendedor.
    <a href='https://" . $_SERVER["HTTP_HOST"] . "/admin'>Contestar Cotizacion</a></p>
  </body>
  </html>";
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
