<?php
require_once dirname(__DIR__) . "/model/measurement.php";
require_once(dirname(__DIR__) . "/db/env.php");
require_once dirname(__DIR__) . "/db/DBOperator.php";
class MeasurementDao
{
  private $db;
  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }
  function findByProduct($product)
  {
    $measurements = [];
    $measurementsDB = $this->db->consult("SELECT * FROM `measurements` WHERE `products_id_products` = " . $product->getId(), "yes");
    foreach ($measurementsDB as  $measurementDB) {
      $measurement = new Measurement();
      $measurement->setId($measurementDB["id_measurements"]);
      $measurement->setLength($measurementDB["lenght"]);
      $measurement->setWidth($measurementDB["width"]);
      $measurement->setHeight($measurementDB["height"]);
      $measurement->setProduct($product->getId());
      array_push($measurements, $measurement);
    }
    return $measurements;
  }
  function findById($id)
  { }
  function saveByProduct($measurement)
  {
    $this->db->connect();
    $query = "INSERT INTO `measurements` (`id_measurements`, `width`, `height`, `lenght`, `products_id_products`) VALUES (NULL, '" . $measurement->getWidth() . "', '" . $measurement->getHeight() . "', '" . $measurement->getLength() . "', '" . $measurement->getProduct() . "')";
    $status = $this->db->consult($query);
    echo $query;
    $this->db->close();
    return $status;
  }
  function delete($id)
  { }
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
