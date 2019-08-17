<?php
require_once dirname(__DIR__) . "/db/env.php";
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/model/Category.php";
/*****************************************************************************
/*Esta clase permite Crear, Actualizar, Buscar y Eliminar Categorias
/*Desarrollada por Alexis Holguin(github: MoraHol)
/*Para Teenus.com.co
/*Ultima actualizacion 31/07/2019
/*****************************************************************************/
class CategoryDao
{
  private $db;

  public function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }

  public function save()
  { }
  public function update($category)
  {
    $this->db->connect();
    $query = "UPDATE `categories` SET `description` = '" . $category->getDescription() . "' WHERE `categories`.`id_categories` = " . $category->getId();
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  public function delete()
  { }
  public function findAll()
  {
    $this->db->connect();
    $categories = [];
    $categoriesDB = $this->db->consult("SELECT * FROM `categories`", "yes");
    foreach ($categoriesDB as $categoryDB) {
      $category = new Category();
      $category->setId($categoryDB["id_categories"]);
      $category->setName($categoryDB["name"]);
      $category->setParentcategory($categoryDB["parent_category"]);
      $category->setDescription($categoryDB["description"]);
      array_push($categories, $category);
    }
    $this->db->close();
    return $categories;
  }
  public function findById($id)
  {
    $this->db->connect();
    $categoryDB = $this->db->consult("SELECT * FROM `categories` WHERE id_categories = $id", "yes");
    $categoryDB = $categoryDB[0];
    $category = new Category();
    $category->setId($categoryDB["id_categories"]);
    $category->setName($categoryDB["name"]);
    $category->setParentcategory($categoryDB["parent_category"]);
    $category->setDescription($categoryDB["description"]);
    $this->db->close();
    return $category;
  }
}
