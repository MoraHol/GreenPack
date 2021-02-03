<?php
require_once dirname(__DIR__) . "/db/env.php";
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/model/Cotizador.php";
/*****************************************************************************
/*Esta clase permite Buscar Cotizadores
/*Desarrollada por Teenus SAS
/*Para Teenus.com.co
/*Ultima actualizacion 10/01/2021
/*****************************************************************************/
class CotizadorDao
{
  private $db;

  public function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }


  public function findAll()
  {
    $this->db->connect();
    $cotizadores = [];
    $cotizadoresDB = $this->db->consult("SELECT * FROM `cotizadores`", "yes");
    foreach ($cotizadoresDB as $cotizadorDB) {
      $cotizador = new Cotizador();
      $cotizador->setId($cotizadorDB["id"]);
      $cotizador->setName($cotizadorDB["name"]);
      array_push($cotizadores, $cotizador);
    }
    $this->db->close();
    return $cotizadores;
  }

  public function findById($id)
  {
    $this->db->connect();
    $cotizadorDB = $this->db->consult("SELECT * FROM `cotizadores` WHERE id = $id", "yes");
    $cotizadorDB = $cotizadorDB[0];
    $cotizador = new Cotizador();
    $cotizador->setId($cotizadorDB["id"]);
    $cotizador->setName($cotizadorDB["name"]);
    $this->db->close();
    return $cotizador;
  }

  public function findByName($name)
  {
    $this->db->connect();
    $query = "SELECT * FROM `cotizadores` WHERE `cotizadores`.`name` = '" . $name . "'";
    $cotizadorDB = $this->db->consult($query, "yes");
    $this->db->close();
    return count($cotizadorDB);
  }
}
