<?php

require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/db/env.php";



if (isset($_GET["email"])) {
  $client = new stdClass();
  $db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  $email = $_GET["email"];
  $query = "SELECT * FROM `clients` WHERE `email` = '$email'";
  $clientDB = $db->consult($query, "yes");
  $clientDB = $clientDB[0];
  $client->id = $clientDB["id_clients"];
  $client->name = $clientDB["name"];
  $client->surname = $clientDB["surname"];
  $client->email = $clientDB["email"];
  $client->company = $clientDB["name_company"];
  $query = "SELECT * FROM `quotations` WHERE `clients_id_clients` = " . $client->id . " ORDER by `id_quotations` DESC LIMIT 1";
  $clientDB = $db->consult($query, "yes");
  if (isset($clientDB[0])) {
    $clientDB = $clientDB[0];
    $client->city = $clientDB["city"];
    $client->address = $clientDB["address"];
    $client->cellPhone = $clientDB["cell_phone"];
    $client->phone = $clientDB["phone"];
  } else {
    $client->city = null;
    $client->address = null;
    $client->cellPhone = null;
    $client->phone = null;
  }

  header("Content-Type: application/json");
  echo json_encode($client);
}
