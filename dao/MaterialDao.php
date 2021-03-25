<?php
require_once(dirname(__DIR__) . "/db/DBOperator.php");
require_once(dirname(__DIR__) . "/model/material.php");
require_once(dirname(__DIR__) . "/db/env.php");
// require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/composer/vendor/autoload.php";

// use Monolog\Logger;
// use Monolog\Handler\StreamHandler;

/*****************************************************************************
/*Esta clase permite Crear, Actualizar, Buscar y Eliminar Materiales
/*Desarrollada por Teenus SAS
/*Para Teenus.com.co
/*Ultima actualizacion 31/07/2019
/*****************************************************************************/
class MaterialDao
{
  private $db;
  static $logger;

  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
    // self::$logger = new Logger('channel-name');
    // self::$logger->pushHandler(new StreamHandler($_SERVER["DOCUMENT_ROOT"] . '/logs/app.log', Logger::DEBUG));
  }
  function findAll()
  {
    $materials = [];
    $materialsDB = $this->db->consult("SELECT * FROM materials m INNER JOIN products_has_materials phm ON m.id_materials = phm.materials_id_materials ORDER BY `name`", "yes");
    foreach ($materialsDB as  $materialDB) {
      $material = new Material();
      $material->setId($materialDB["id_materials"]);
      $material->setName($materialDB["name"]);
      $material->setDescription($materialDB["description"]);
      $material->setGrammage($materialDB["grammage"]);
      $material->setPricePerKg($materialDB["price_per_kg"]);
      $material->setE1($materialDB["e1"]);
      $material->setE2($materialDB["e2"]);
      $material->setE3($materialDB["e3"]);
      //$material->p5400 = $materialDB["price_5400"];
      //$material->p7000 = $materialDB["price_7000"];
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
    $material->p5400 = $materialDB["price_5400"];
    $material->p7000 = $materialDB["price_7000"];
    // $this->db->close();
    return $material;
  }

  function findByIdByProduct($id, $product)
  {
    $this->db->connect();
    $query = "SELECT * FROM `products_has_materials` INNER JOIN materials ON `materials_id_materials` = materials.id_materials WHERE materials_id_materials = $id  AND products_id_products = " . $product->getId();
    $materialDB = $this->db->consult($query, "yes");
    $materialDB = $materialDB[0];
    $material = new Material();
    $material->setId($materialDB["id_materials"]);
    $material->setName($materialDB["name"]);
    $material->setDescription($materialDB["description"]);
    $material->setGrammage($materialDB["grammage"]);
    $material->setPricePerKg($materialDB["price_per_kg"]);
    $material->setMinimunScale($materialDB["minimun_scale"]);
    $material->setMediumScale($materialDB["medium_scale"]);
    $material->setMaximunScale($materialDB["maximun_scale"]);
    $material->p5400 = $materialDB["price_5400"];
    $material->p7000 = $materialDB["price_7000"];
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

      $material->setE1($materialDB["e1"]);
      $material->setE2($materialDB["e2"]);
      $material->setE3($materialDB["e3"]);

      $material->setMinimunScale($materialDB["minimun_scale"]);
      $material->setMediumScale($materialDB["medium_scale"]);
      $material->setMaximunScale($materialDB["maximun_scale"]);

      //$material->p5400 = $materialDB["price_5400"];
      //$material->p7000 = $materialDB["price_7000"];
      array_push($materials, $material);
    }
    $this->db->close();
    return $materials;
  }

  function saveByProduct($material, $product, $minimunScale = "NULL", $mediumScale = "NULL", $maximunScale = "NULL")
  {
    $this->db->connect();
    $query = "INSERT INTO `products_has_materials` (`products_id_products`, `materials_id_materials`, `e1`, `e2`, `e3`, `minimun_scale`, `medium_scale`, `maximun_scale`) 
    VALUES ('" . $product->getId() . "', '" . $material->getId() . "' , '" . $material->getE1() . "', '" . $material->getE2() . "', '" . $material->getE3() . "',$minimunScale, $mediumScale, $maximunScale)
    ON DUPLICATE KEY UPDATE `minimun_scale` = $minimunScale,`medium_scale` = $mediumScale,`maximun_scale` = $maximunScale";
    $status = $this->db->consult($query);
    // self::$logger->info($query);
    $this->db->close();
    return $status;
  }

  function save($material)
  {
    $this->db->connect();
    $query = "INSERT INTO `materials` (`id_materials`, `name`, `description`,
    `grammage`,`price_per_kg`,`price_5400`, `price_7000`) 
    VALUES (NULL, '" . $material->getName() . "', 
    '" . $material->getDescription() . "','" . $material->getGrammage() . "',
    '" . $material->getPricePerKg() . "', " . $material->p5400 . ",
    " . $material->p7000 . ")";
    $status = $this->db->consult($query);
    $this->db->close();
    // self::$logger->info($query);
    echo $query;
    return $status;
  }

  function delete($id)
  {
    $this->db->connect();
    $query = "DELETE FROM `materials` WHERE `materials`.`id_materials` = $id";
    $status = $this->db->consult($query);
    $this->db->close();
    //self::$logger->info($query);
    return $status;
  }

  function update($material)
  {
    $this->db->connect();
    $query = "UPDATE `materials` SET `name` = '" . $material->getName() . "',
    `grammage` = '" . $material->getGrammage() . "',
    `price_per_kg` = '" . $material->getPricePerKg() . "',
    `description` = '" . $material->getDescription() . "',
    `price_5400` = " . $material->p5400 . " ,
    `price_7000` = " . $material->p7000 . "
    WHERE `materials`.`id_materials` = " . $material->getId();
    $status = $this->db->consult($query);
    $this->db->close();
    // self::$logger->info($query);
    return $status;
  }

  function deleteByProduct($id, $product)
  {
    $this->db->connect();
    $query = "DELETE FROM `products_has_materials` WHERE `products_has_materials`.`products_id_products` = $product  AND `products_has_materials`.`materials_id_materials` = $id";
    $status = $this->db->consult($query);
    $this->db->close();
    // self::$logger->info($query);
    return $status;
  }

  function updateFactors($factor)
  {
    $this->db->connect();
    $query = "UPDATE `products_has_materials` SET `e1` = '" . $factor->getE1() . "', `e2` = '" . $factor->getE2() . "', `e3` = '" . $factor->getE3() . "' 
    WHERE `factores`.`id` = " . $factor->getIdfactor();

    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
}
