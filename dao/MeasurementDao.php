<?php
require_once dirname(__DIR__) . "/model/measurement.php";
require_once(dirname(__DIR__) . "/db/env.php");
require_once dirname(__DIR__) . "/db/DBOperator.php";
/*****************************************************************************
/*Esta clase permite Crear, Actualizar, Buscar y Eliminar Medidas
/*Desarrollada por Alexis Holguin(github: MoraHol)
/*Para Teenus.com.co
/*Ultima actualizacion 31/07/2019
/*****************************************************************************/
class MeasurementDao
{
  private $db;
  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }
  function findByProduct($product)
  {
    $this->db->connect();
    $measurements = [];
    $measurementsDB = $this->db->consult("SELECT * FROM `measurements` WHERE `products_id_products` = " . $product->getId(), "yes");
    foreach ($measurementsDB as  $measurementDB) {
      $measurement = new Measurement();
      $measurement->setId($measurementDB["id_measurements"]);
      $measurement->setLength($measurementDB["lenght"]);
      $measurement->setWidth($measurementDB["width"]);
      $measurement->setHeight($measurementDB["height"]);
      $measurement->setWindow($measurementDB["window"]);
      $measurement->setProduct($product->getId());
      array_push($measurements, $measurement);
    }
    $this->db->close();
    return $measurements;
  }
  function findById($id)
  {
    $this->db->connect();
    $query = "SELECT * FROM `measurements` WHERE `id_measurements` = $id";
    $measurementDB = $this->db->consult($query, "yes");
    $measurementDB = $measurementDB[0];
    $measurement = new Measurement();
    $measurement->setId($measurementDB["id_measurements"]);
    $measurement->setLength($measurementDB["lenght"]);
    $measurement->setWidth($measurementDB["width"]);
    $measurement->setHeight($measurementDB["height"]);
    $measurement->setWindow($measurementDB["window"]);
    $measurement->setProduct($measurementDB["products_id_products"]);
    // $this->db->close();
    return $measurement;
  }
  function saveByProduct($measurement)
  {
    $this->db->connect();
    $query = "INSERT INTO `measurements` (`id_measurements`, `width`, `height`, `lenght`, `products_id_products`, `window`) VALUES (NULL, '" . $measurement->getWidth() . "', '" . $measurement->getHeight() . "', '" . $measurement->getLength() . "', '" . $measurement->getProduct() . "', '" . $measurement->getWindow() . "')";
    echo $query;
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  function searchMeasurementByProduct($product, $height, $width, $length)
  {
    $this->db->connect();
    $query = "SELECT * FROM `measurements` WHERE `width` = $width and `height` = $height and `lenght` = $length AND `products_id_products` = " . $product->getId();
    $measurementDB = $this->db->consult($query, "yes");
    $measurementDB = $measurementDB[0];
    $measurement = new Measurement();
    $measurement->setId($measurementDB["id_measurements"]);
    $measurement->setLength($measurementDB["lenght"]);
    $measurement->setWidth($measurementDB["width"]);
    $measurement->setHeight($measurementDB["height"]);
    $measurement->setWindow($measurementDB["window"]);
    $measurement->setProduct($product->getId());
    $this->db->close();
    return $measurement;
  }
  
  function deleteByProduct($idMeasurement, $idProduct)
  {
    $this->db->connect();
    $query = "DELETE FROM `measurements` WHERE `measurements`.`id_measurements` = $idMeasurement AND `measurements`.`products_id_products` = $idProduct";
    echo $query;
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }

  function update($measurement)
  {
    $this->db->connect();
    $query = "UPDATE `measurements` SET `width` = '" . $measurement->getWidth() . "', `height` = '" . $measurement->getHeight() . "', `lenght` = '" . $measurement->getLength() . "' WHERE `measurements`.`id_measurements` = " . $measurement->getId();
    $this->db->consult($query);
    $this->db->close();
  }
}
