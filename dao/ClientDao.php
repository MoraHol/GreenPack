<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/db/DBOperator.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/db/env.php";

class ClientDao
{
  private $db;
  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }


  public function findById()
  { }

  public function findSuscriberById()
  { }

  public function findAllSuscribers()
  {
    $suscribers = [];
    $this->db->connect();
    $query = "SELECT * FROM `suscribers`";
    $suscribersDB = $this->db->consult($query, "yes");
    foreach ($suscribersDB as  $suscriberDB) {
      $suscriber = new stdClass();
      $suscriber->id = $suscriberDB["id_suscriber"];
      $suscriber->email = $suscriberDB["email"];
      array_push($suscribers, $suscriber);
    }
    return $suscribers;
  }

  public function findAll()
  { 
    $clients = [];
    $this->db->connect();
    $query = "SELECT * FROM `clients`";
    $clientsDB = $this->db->consult($query, "yes");
    foreach ($clientsDB as  $clientDB) {
      $client = new stdClass();
      $client->id = $clientDB["id_clients"];
      $client->email = $clientDB["email"];
      $client->name = $clientDB["name"];
      $client->surname = $clientDB["surname"];
      $client->nameCompany = $clientDB["name_company"];
      array_push($clients, $client);
    }
    return $clients;
  }
  
}
