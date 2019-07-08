<?php
require_once(dirname(__DIR__) . "/db/DBOperator.php");
require_once(dirname(__DIR__) . "/model/material.php");
require_once(dirname(__DIR__) . "/db/env.php");
class MaterialDao
{
  private $db;
  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }
  function findAll()
  {
    $materials = [];
    $materialsDB = $this->db->consult("SELECT * FROM `materials`", "yes");
    foreach ($materialsDB as  $materialDB) {
      $material = new Material();
      $material->setId($materialDB["id_materials"]);
      $material->setName($materialDB["name"]);
      $material->setDescription($materialDB["description"]);
      $material->setGrammage($materialDB["grammage"]);
      $material->setPricePerKg($materialDB["price_per_kg"]);
      array_push($materials, $material);
    }
    return $materials;
  }
  function findById($id)
  {
    $this->db->connect();
    $material = new Material();
    $materialDB = $this->db->consult("SELECT * FROM `materials` WHERE `id_materials` = $id", "yes");
    $materialDB = $materialDB[0];
    $material->setId($materialDB["id_materials"]);
    $material->setName($materialDB["name"]);
    $material->setDescription($materialDB["description"]);
    $material->setGrammage($materialDB["grammage"]);
    $material->setPricePerKg($materialDB["price_per_kg"]);
    $this->db->close();
    return $material;
  }
  function findByProduct($product)
  {
    $this->db->connect();
    $materials = [];
    $materialsDB = $this->db->consult("SELECT * FROM `products_has_materials` INNER JOIN materials ON `materials_id_materials` = materials.id_materials WHERE products_id_products = " . $product->getId(), "yes");
    foreach ($materialsDB as  $materialDB) {
      $material = new Material();
      $material->setId($materialDB["id_materials"]);
      $material->setName($materialDB["name"]);
      $material->setDescription($materialDB["description"]);
      $material->setGrammage($materialDB["grammage"]);
      $material->setPricePerKg($materialDB["price_per_kg"]);
      array_push($materials, $material);
    }
    $this->db->close();
    return $materials;
  }
  function saveByProduct($material, $product)
  {
    $this->db->connect();
    $query = "INSERT INTO `products_has_materials` (`products_id_products`, `materials_id_materials`) VALUES ('" . $product->getId() . "', '" . $material->getId() . "')";
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  function save($material)
  {
    $this->db->connect();
    $query = "INSERT INTO `materials` (`id_materials`, `name`, `description`,`grammage`,`price_per_kg`) VALUES (NULL, '" . $material->getName() . "', '" . $material->getDescription() . "','" . $material->getGrammage() . "','" . $material->getPricePerKg() . "')";
    echo $query;
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  function delete($id)
  {
    $this->db->connect();
    $query = "DELETE FROM `materials` WHERE `materials`.`id_materials` = $id";
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  function update($material)
  {
    $this->db->connect();
    $query = "UPDATE `materials` SET `name` = '" . $material->getName() . "', `grammage` = '" . $material->getGrammage() . "', `price_per_kg` = '" . $material->getPricePerKg() . "', `description` = '" . $material->getDescription() . "' WHERE `materials`.`id_materials` = " . $material->getId();
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  function deleteByProduct($id, $product)
  {
    $this->db->connect();
    $query = "DELETE FROM `products_has_materials` WHERE `products_has_materials`.`products_id_products` = $product  AND `products_has_materials`.`materials_id_materials` = $id";
    echo $query;
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
}
