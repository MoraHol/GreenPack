<?php
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/model/TabProduct.php";
require_once dirname(__DIR__) . "/db/env.php";

/*****************************************************************************
/*Esta clase permite Crear, Actualizar, Buscar y Eliminar Pestañas de productos
/*Desarrollada por Alexis Holguin(github: MoraHol)
/*Para Teenus.com.co
/*Ultima actualizacion 31/07/2019
/*****************************************************************************/
class TabProductDao
{
  private $db;
  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }
  function save($tab)
  {
    $this->db->connect();
    $query = "INSERT INTO `products_tabs` (`id_tab`, `title`, `description`, `product_id`) VALUES 
    (NULL, '" . $tab->getTitle() . "', '" . $tab->getDescription() . "', '" . $tab->getIdProduct() . "')";
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  function update($tab)
  {
    $this->db->connect();
    $query = "UPDATE `products_tabs` SET `title` = '" . $tab->getTitle() . "', `description` = '" . $tab->getDescription() . "',
    WHERE `products_tabs`.`id_tab` = " . $tab->getId();
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  function delete($id)
  {

    $this->db->connect();
    $query = "DELETE FROM `products_tabs` WHERE `id_tab` = $id";
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  function findByProduct($product)
  {

    $this->db->connect();
    $query = "SELECT `id_tab` FROM `products_tabs` WHERE `product_id` = " . $product->getId();
    $tabsProductDB = $this->db->consult($query, "yes");
    $tabs = [];
    if (count($tabsProductDB) > 0) {
      foreach ($tabsProductDB as $tab) {
        array_push($tabs, $this->findById($tab["id_tab"]));
      }
    }
    $this->db->close();
    return $tabs;
  }
  function findById($id)
  {
    $this->db->connect();
    $query = "SELECT * FROM `products_tabs` WHERE `id_tab` = $id";
    $tabProductDB = $this->db->consult($query, "yes");
    $tabProductDB = $tabProductDB[0];
    $tab = new TabProduct();
    $tab->setId($tabProductDB["id_tab"]);
    $tab->setTitle($tabProductDB["title"]);
    $tab->setDescription($tabProductDB["description"]);
    $tab->setIdProduct($tabProductDB["product_id"]);
    return $tab;
  }
}
