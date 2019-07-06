<?php
require_once dirname(__DIR__) . "/db/env.php";
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/model/Category.php";
class CategoryDao
{
  private $db;

  public function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }

  public function save()
  { }
  public function update()
  { }
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
    $this->db->close();
    return $category;
  }
}
