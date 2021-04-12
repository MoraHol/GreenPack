<?php

require_once __DIR__ . "/MaterialDao.php";
require_once(dirname(__DIR__) . "/db/env.php");
require_once  __DIR__ . "/CategoryDao.php";
require_once  dirname(__DIR__) . "/model/cantidad.php";
/*****************************************************************************
/*Esta clase permite Crear, Actualizar, Buscar y Eliminar Cantidades minimas a fabricar para los productos
/*Desarrollada por Teenus SAS
/*Para Teenus.com.co
/*Ultima actualizacion 08/04/2021
/*****************************************************************************/

class CantidadDao
{
  private $db;

  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }

  function findByProduct($product)
  {
    $this->db->connect();
    $query = "SELECT * FROM `cantidades_producto` WHERE `id_product` = " . $product->getid();
    $cantidadDB = $this->db->consult($query, "yes");
    if (sizeof($cantidadDB) > 0) {
      $cantidadDB = $cantidadDB[0];
      $cantidad = new Cantidad();
      $cantidad->setId($cantidadDB["id"]);
      $cantidad->setIdproduct($cantidadDB["id_product"]);
      $cantidad->setE1min($cantidadDB["e1_min"]);
      $cantidad->setE1max($cantidadDB["e1_max"]);
      $cantidad->setE2min($cantidadDB["e2_min"]);
      $cantidad->setE2max($cantidadDB["e2_max"]);
      $cantidad->setE3min($cantidadDB["e3_min"]);
      $cantidad->setE3max($cantidadDB["e3_max"]);
      $this->db->close();
      return $cantidad;
    } else {
      $cantidad = new Cantidad();
      $cantidad->setId(0);
      $cantidad->setIdproduct(0);
      $cantidad->setE1min(0);
      $cantidad->setE1max(0);
      $cantidad->setE2min(0);
      $cantidad->setE2max(0);
      $cantidad->setE3min(0);
      $cantidad->setE3max(0);
      $this->db->close();
      return $cantidad;
    }
  }

  function save($cantidad)
  {
    $this->db->connect();

    $query = "SELECT * FROM `cantidades_producto` WHERE `id_product` = '" . $cantidad->getIdproduct() . "' ";
    $cantidadDB = $this->db->consult($query, "yes");
    if (sizeof($cantidadDB) > 0) {
      $this->update($cantidad);
    } else {
      $query = "INSERT INTO `cantidades_producto` (`id_product`, `e1_min`, `e1_max` , `e2_min`, `e2_max` , `e3_min`, `e3_max`) 
      VALUES ('" . $cantidad->getIdproduct() . "', '" . $cantidad->getE1min() . "', '" . $cantidad->getE1max() . "', '" . $cantidad->getE2min() . "', '" . $cantidad->getE2max() . "', '" . $cantidad->getE3min() . "', '" . $cantidad->getE3max() . "')";
      $status = $this->db->consult($query);
      $this->db->close();
      // self::$logger->info($query);
      return $status;
    }
  }

  function update($cantidad)
  {
    $this->db->connect();
    $query = "UPDATE `cantidades_producto` SET `e1_min` = '" . $cantidad->getE1min() . "', `e1_max` = '" . $cantidad->getE1max() . "' , `e2_min` = '" . $cantidad->getE2min() . "', `e2_max` = '" . $cantidad->getE2max() . "' , `e3_min` = '" . $cantidad->getE3min() . "' , `e3_max` = '" . $cantidad->getE3max() . "' 
    WHERE `id` ='"  . $cantidad->getidproduct() . "' ";

    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }

  function deleteById($id)
  {
    $this->db->connect();
    $query = "DELETE FROM `cantidades_producto` WHERE `id` = $id";
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
}
