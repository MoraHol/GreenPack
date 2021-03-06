<?php
/*
* Desarrollada por Teenus SAS
*/
$uploads_dir = dirname(__DIR__) . "/upload/file";
$host = $_SERVER["HTTP_HOST"];
if (isset($_FILES["file"])) {
  // fecha para crear timestamp
  $date = new DateTime();
  // nombre de la imagen
  $name = $_FILES["file"]["name"];
  // sacar extencion de la imagen
  $extension = explode(".", $name);
  $ext = $extension[1]; //AQUI LA EXTENSION
  // nuevo nombre de la imagen
  $name = "FILE-" . $date->getTimestamp() . "-" . uniqid() . "." . $ext;
  // ruta temporal de subida
  $tmp_name = $_FILES["file"]["tmp_name"];
  $url = "$uploads_dir/$name";
  if (move_uploaded_file($tmp_name, $url)) {
    chmod($url, 0777);
    header('Content-type: application/json');
    $url = new stdClass();
    $protocol = isset($_SERVER["HTTPS"]) ? "https":"http";
    $url->link = "$protocol://$host/upload/file/$name";
    echo json_encode($url);
  } else {
    http_response_code(400);
  }
}
