<?php
require_once dirname(__DIR__) . "/db/env.php";
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/model/Category.php";
/*****************************************************************************
/*Esta clase permite Crear, Actualizar, Buscar y Eliminar Categorias
/*Desarrollada por Teenus SAS
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

  public function save($category)
  {
    $this->db->connect();
    $query = "INSERT INTO `categories` (`name`, `description`, `image`) VALUES('" . $category->getName() . "','" . $category->getDescription() . "', '" . $category->getImage() . "')";
    $status = $this->db->consult($query);
    $last_id = $this->db->lastInsertId();
    $this->db->close();
    return $last_id;
  }

  public function saveSubcategory($subcategory)
  {
    $this->db->connect();
    $query = "INSERT INTO `categories` (`name`, `parent_category`, `description`, `image`) VALUES('" . $subcategory->getName() . "','" . $subcategory->getParentCategory() . "','" . $subcategory->getDescription() . "', '" . $subcategory->getImage() . "')";
    $status = $this->db->consult($query);
    $last_id = $this->db->lastInsertId();
    $this->db->close();
    return $last_id;
  }

  public function saveSubcategories($categoryId, $subcategoryNames)
  {
    try {

      $category = $this->findById($categoryId);
      $this->db->connect();
      foreach ($subcategoryNames as $subcategoryName) {
        $query = "INSERT INTO `categories` (`name`, `parent_category`, `description`, `image`) VALUES('" . $subcategoryName . "','" . $category->getId() . "','" . $category->getDescription() . "', '" . $category->getImage() . "')";
        $status = $this->db->consult($query);
      }

      $this->db->close();
      return $status;
    } catch (\Throwable $th) {
      return 0;
    }
  }

  public function update($category)
  {
    $this->db->connect();
    $query = "UPDATE `categories` SET `description` = '" . $category->getDescription() . "', `image` = '" . $category->getImage() . "' WHERE `categories`.`id_categories` = " . $category->getId();
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  public function delete($id)
  {
    $this->db->connect();
    $query = "DELETE FROM `categories` WHERE `categories`.`id_categories` = $id";
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }

  public function findChildren($idCategory)
  {
    $this->db->connect();
    $categories = [];
    $categoriesDB = $this->db->consult("SELECT * FROM `categories` WHERE parent_category = $idCategory", "yes");
    foreach ($categoriesDB as $categoryDB) {
      $category = new Category();
      $category->setId($categoryDB["id_categories"]);
      $category->setName($categoryDB["name"]);
      $category->setParentcategory($categoryDB["parent_category"]);
      $category->setDescription($categoryDB["description"]);
      $category->setImage($categoryDB["image"]);
      array_push($categories, $category);
    }
    $this->db->close();
    return $categories;
  }
  
  public function findAll()
  {
    $this->db->connect();
    $categories = [];
    $categoriesDB = $this->db->consult("SELECT * FROM categories WHERE parent_category IS NULL", "yes");
    foreach ($categoriesDB as $categoryDB) {
      $category = new Category();
      $category->setId($categoryDB["id_categories"]);
      $category->setName($categoryDB["name"]);
      $category->setParentcategory($categoryDB["parent_category"]);
      $category->setDescription($categoryDB["description"]);
      $category->setImage($categoryDB["image"]);
      array_push($categories, $category);
    }
    $this->db->close();
    return $categories;
  }


  public function findAllsubCategories()
  {
    $this->db->connect();
    $categories = [];
    $categoriesDB = $this->db->consult("SELECT * FROM `categories` WHERE parent_category IS NOT NULL", "yes");
    foreach ($categoriesDB as $categoryDB) {
      $category = new Category();
      $category->setId($categoryDB["id_categories"]);
      $category->setName($categoryDB["name"]);
      $category->setParentcategory($categoryDB["parent_category"]);
      $category->setDescription($categoryDB["description"]);
      $category->setImage($categoryDB["image"]);
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
    $category->setImage($categoryDB["image"]);
    $this->db->close();
    return $category;
  }

  public function findByName($name)
  {
    $this->db->connect();
    $query = "SELECT * FROM `categories` WHERE `categories`.`name` = '" . $name . "'";
    $categoryDB = $this->db->consult($query, "yes");
    $this->db->close();
    return count($categoryDB);
  }
}
