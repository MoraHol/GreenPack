<?php

require_once __DIR__ . "/MaterialDao.php";
require_once(dirname(__DIR__) . "/db/env.php");
require_once  __DIR__ . "/CategoryDao.php";
require_once  dirname(__DIR__) . "/model/cantidad.php";


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
    $query = "SELECT * FROM `cantidades_producto` WHERE `id_product` = " . $product->getId();
    $cantidadDB = $this->db->consult($query, "yes");
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
  }

  function save($cantidad)
  {
    $this->db->connect();
    $query = "INSERT INTO `cantidades_producto` (`id_product`, `e1_min`, `e1_max` , `e2_min`, `e2_max` , `e3_min`, `e3_max`) 
    VALUES ('" . $cantidad->getIdproduct() . "', '" . $cantidad->getE1min() . "', '" . $cantidad->getE1max() . "', '" . $cantidad->getE2min() . "', '" . $cantidad->getE2max() . "', '" . $cantidad->getE3min() . "', '" . $cantidad->getE3max() . "')";
    $status = $this->db->consult($query);
    $this->db->close();
    // self::$logger->info($query);
    return $status;
  }

  function update($cantidad)
  {
    $this->db->connect();
    $query = "UPDATE `cantidades_producto` SET `e1_min` = '" . $cantidad->getE1min() . "', `e1_max` = '" . $cantidad->getE1max() . "' , `e2_min` = '" . $cantidad->getE2min() . "', `e2_max` = '" . $cantidad->getE2max() . "' , `e3_min` = '" . $cantidad->getE3min() . "' , `e3_max` = '" . $cantidad->getE3max() . "' 
    WHERE `id` ='"  . $cantidad->getid(). "' " ;

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
