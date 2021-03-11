<?php

use Dompdf\Frame\Factory;

require_once __DIR__ . "/MaterialDao.php";
require_once(dirname(__DIR__) . "/db/env.php");
require_once  __DIR__ . "/CategoryDao.php";
require_once  dirname(__DIR__) . "/model/factor.php";


class FactorDao
{
  private $db;

  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
    /* $this->imageDao = new ImageDao();
      $this->measurementDao = new MeasurementDao();
      $this->materialDao = new MaterialDao();
      $this->categoryDao = new CategoryDao(); */
  }

  // function findAll()
  // {
  //   $factors = [];
  //   $factorDB = $this->db->consult("SELECT * FROM `factores`", "yes");

  //   foreach ($factorDB as $factorDB) {
  //     $factor = new Factor();
  //     $factor->setId(intval($factorDB["id"]));
  //   }
  // }

  function findByProduct($product)
  {
    $this->db->connect();
    $query = "SELECT * FROM `factors` WHERE id_product = $product->getId()";
    $factorDB = $this->db->consult($query, "yes");
    $factorDB = $factorDB[0];
    $factor = new Factor();
    $factor->setIdfactor($factorDB["id"]);
    $factor->setidmaterial($factorDB["id_materials"]);
    $factor->setE1($factorDB["e1"]);
    $factor->setE2($factorDB["e2"]);
    $factor->setE1($factorDB["e3"]);
    
    $this->db->close();
    return $factor;
  }


  function save($factor)
  {
    $this->db->connect();
    $query = "INSERT INTO `factors` (`id_materials`, `e1`, `e2`, `e3`) 
    VALUES ('" . $factor->getIdmaterials() . "', '" . $factor->getE1() . "', '" . $factor->getE2() . "', '" . $factor->getE3() . "')";
  }

  function update($factor)
  {
    $this->db->connect();
    $query = "UPDATE `factors` SET `e1` = '" . $factor->getE1() . "', `e2` = '" . $factor->getE2 . "', `e3` = '" . $factor->getE3 . "' 
    WHERE `factores`.`id` = " . $factor->getIdfactor();

    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }

  function delete($id)
  {
    $this->db->connect();
    $query = "DELETE FROM `factors` WHERE `factores`.`id` = $id";
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
}
