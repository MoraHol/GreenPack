<?php
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/model/Image.php";
require_once(dirname(__DIR__) . "/db/env.php");
/*****************************************************************************
/*Esta clase permite Crear, Actualizar, Buscar y Eliminar Imagenes
/*Desarrollada por Teenus SAS
/*Para Teenus.com.co
/*Ultima actualizacion 31/07/2019
/*****************************************************************************/
class ImageDao
{

  private $db;
  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }

  function findById($id)
  {
  }
  function findByProduct($product)
  {
    $this->db->connect();
    $images = [];
    $query = "SELECT * FROM `product_image` WHERE `products_id_products` = " . $product->getId();
    $imagesDB = $this->db->consult($query, "yes");
    if (sizeof($imagesDB) == 0)
      $images[0] = '';
    foreach ($imagesDB as  $imageDB) {
      $image = new Image();
      $image->setId($imageDB["id_product_image"]);
      $image->setUrl($imageDB["file_image"]);
      $image->setProduct($product->getId());
      array_push($images, $image);
    }
    $this->db->close();
    return $images;
  }

  function save($image)
  {
    $this->db->connect();
    $query = "INSERT INTO `product_image` (`id_product_image`, `file_image`, `products_id_products`) VALUES (NULL, '" . $image->getUrl() . "', '" . $image->getProduct() . "')";
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }

  function delete($id)
  {
    $this->db->connect();

    $query = "SELECT * FROM `product_image` WHERE `product_image`.`id_product_image` = $id";
    $imagesDB = $this->db->consult($query, "yes");

    $id_product = json_encode($imagesDB[0]['products_id_products']);

    $query = "SELECT * FROM product_image WHERE products_id_products = $id_product";
    $imagesDB = $this->db->consult($query, "yes");
    $tm = sizeof($imagesDB);
    if (sizeof($imagesDB) > 1) {
      $query = "DELETE FROM product_image WHERE id_product_image = $id";
      $status = $this->db->consult($query);
      $this->db->close();
      return $status;
    }
    $this->db->close();
  }

  function update($id, $url)
  {
  }
}
