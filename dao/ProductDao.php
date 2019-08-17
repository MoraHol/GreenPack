<?php
require_once(__DIR__ . "/ImageDao.php");
require_once(__DIR__ . "/MeasurementDao.php");
require_once(dirname(__DIR__) . "/db/env.php");
require_once  dirname(__DIR__) . "/model/product.php";

require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once __DIR__ . "/MaterialDao.php";
require_once  __DIR__ . "/CategoryDao.php";
/*****************************************************************************
/*Esta clase permite Crear, Actualizar, Buscar y Eliminar Productos
/*Desarrollada por Alexis Holguin(github: MoraHol)
/*Para Teenus.com.co
/*Ultima actualizacion 31/07/2019
/*****************************************************************************/
class ProductDao
{
  private $db;
  private $imageDao;
  private $measurementDao;
  private $materialDao;
  private $categoryDao;
  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
    $this->imageDao = new ImageDao();
    $this->measurementDao = new MeasurementDao();
    $this->materialDao = new MaterialDao();
    $this->categoryDao = new CategoryDao();
  }

  function findAll()
  {
    $products = [];
    $productsDB = $this->db->consult("SELECT * FROM `products`", "yes");

    foreach ($productsDB as $productDB) {
      $product = new Product();
      $product->setId(intval($productDB["id_products"]));
      $product->setName($productDB["name"]);
      $product->setRef($productDB["ref"]);
      $product->setDescription($productDB["description"]);
      $product->setPrice($productDB["price"]);
      $product->setImages($this->imageDao->findByProduct($product));
      $product->setMeasurements($this->measurementDao->findByProduct($product));
      $product->setMaterials($this->materialDao->findByProduct($product));
      $product->setCategory($this->categoryDao->findById($productDB["categories_id_categories"]));
      if (isset($productDB["uses"])) {
        $product->setUses(json_decode($productDB["uses"]));
      }
      array_push($products, $product);
    }
    return $products;
  }
  function findById($id)
  {
    $this->db->connect();
    $productDB = $this->db->consult("SELECT id_products,ref,products.name,description,price, categories.name as category_name, categories.id_categories,uses FROM `products` INNER JOIN categories ON categories.id_categories = products.categories_id_categories WHERE `id_products` = $id", "yes");
    $productDB = $productDB[0];
    $product = new Product();
    $product->setId($productDB["id_products"]);
    $product->setName($productDB["name"]);
    $product->setRef($productDB["ref"]);
    $product->setDescription($productDB["description"]);
    $product->setPrice($productDB["price"]);
    $product->setImages($this->imageDao->findByProduct($product));
    $product->setMeasurements($this->measurementDao->findByProduct($product));
    $product->setMaterials($this->materialDao->findByProduct($product));
    if (isset($productDB["uses"])) {
      $product->setUses(json_decode($productDB["uses"]));
    }
    $category = $this->categoryDao->findById($productDB["id_categories"]);
    $product->setCategory($category);
    $this->db->close();
    return $product;
  }
  function findByCategory($idCategory)
  {
    $products = [];
    $productsDB = $this->db->consult("SELECT id_products,ref,products.name,description,price, categories.name as category_name FROM `products` INNER JOIN categories ON `categories_id_categories` = categories.id_categories WHERE categories.id_categories = $idCategory OR categories.parent_category = $idCategory", "yes");

    foreach ($productsDB as $productDB) {
      $product = new Product();
      $product->setId($productDB["id_products"]);
      $product->setName($productDB["name"]);
      $product->setRef($productDB["ref"]);
      $product->setDescription($productDB["description"]);
      $product->setPrice($productDB["price"]);
      $product->setImages($this->imageDao->findByProduct($product));
      $product->setMeasurements($this->measurementDao->findByProduct($product));
      $product->setMaterials($this->materialDao->findByProduct($product));
      if (isset($productDB["uses"])) {
        $product->setUses(json_decode($productDB["uses"]));
      }
      $category = ["id" => $idCategory, "name" => $productDB["category_name"]];
      $product->setCategory($category);
      array_push($products, $product);
    }
    return $products;
  }
  function findByCategoryWithLimit($idCategory, $initialLimit, $quantity = 6)
  {
    $products = [];
    $query = "SELECT id_products,ref,products.name,products.description,price, products.categories_id_categories as id_categories  FROM `products` INNER JOIN categories ON `categories_id_categories` = categories.id_categories WHERE categories.id_categories = $idCategory OR categories.parent_category = $idCategory LIMIT $initialLimit,$quantity";
    $productsDB = $this->db->consult($query, "yes");

    foreach ($productsDB as $productDB) {
      $product = new Product();
      $product->setId($productDB["id_products"]);
      $product->setName($productDB["name"]);
      $product->setRef($productDB["ref"]);
      $product->setDescription($productDB["description"]);
      $product->setPrice($productDB["price"]);
      $product->setImages($this->imageDao->findByProduct($product));
      $product->setMeasurements($this->measurementDao->findByProduct($product));
      $product->setMaterials($this->materialDao->findByProduct($product));
      if (isset($productDB["uses"])) {
        $product->setUses(json_decode($productDB["uses"]));
      }
      $category = $this->categoryDao->findById($productDB["id_categories"]);
      $product->setCategory($category);
      array_push($products, $product);
    }
    return $products;
  }
  function findRelatedProducts($product, $limit)
  {
    $this->db->connect();
    $products = [];
    $query = "SELECT id_products,ref,products.name,description,price, categories.name as category_name, categories.id_categories FROM `products` INNER JOIN categories ON categories.id_categories = products.categories_id_categories WHERE `id_products` <> " . $product->getId() . " AND categories.id_categories = " . $product->getCategory()->getId() . " LIMIT $limit";
    $productsDB = $this->db->consult($query, "yes");
    foreach ($productsDB as $productDB) {
      $productInstance = new Product();
      $productInstance->setId($productDB["id_products"]);
      $productInstance->setName($productDB["name"]);
      $product->setRef($productDB["ref"]);
      $productInstance->setDescription($productDB["description"]);
      $productInstance->setPrice($productDB["price"]);
      $productInstance->setImages($this->imageDao->findByProduct($productInstance));
      $productInstance->setMeasurements($this->measurementDao->findByProduct($productInstance));
      $productInstance->setMaterials($this->materialDao->findByProduct($productInstance));
      if (isset($productDB["uses"])) {
        $product->setUses(json_decode($productDB["uses"]));
      }
      $category = $this->categoryDao->findById($productDB["id_categories"]);
      $productInstance->setCategory($category);
      array_push($products, $productInstance);
    }
    $this->db->close();
    return $products;
  }
  function search($pattern)
  {
    $products = [];
    $query = "SELECT id_products FROM `products` WHERE `ref` LIKE '%$pattern%' OR `name` LIKE '%$pattern%' OR description LIKE '%$pattern%'";
    $productsDB = $this->db->consult($query, "yes");
    foreach ($productsDB as $productDB) {
      array_push($products, $this->findById($productDB["id_products"]));
    }
    return $products;
  }
  function save($product)
  {
    $this->db->connect();
    $query = "INSERT INTO `products` (`id_products`, `ref`, `name`, `price`, `description`, `categories_id_categories`, `uses`) VALUES (NULL, '" . $product->getRef() . "', '" . $product->getName() . "', '" . $product->getPrice() . "', '" . $product->getDescription() . "', '" . $product->getCategory()->getId() . "', '" . json_encode($product->getUses(), JSON_UNESCAPED_UNICODE) . "')";
    $status = $this->db->consult($query);
    $id = $this->db->consult("SELECT MAX(`id_products`) AS id FROM products", "yes");
    $id = $id[0]["id"];
    $product->setId($id);
    foreach ($product->getImages() as $image) {
      $image->setProduct($product->getId());
      $this->imageDao->save($image);
    }
    foreach ($product->getMaterials() as $material) {
      $this->materialDao->saveByProduct($material, $product);
    }
    foreach ($product->getMeasurements() as $measurement) {
      $measurement->setProduct($product->getId());
      $this->measurementDao->saveByProduct($measurement);
    }
    $this->db->close();
    return $status;
  }
  function update($product)
  {
    $this->db->connect();
    $query = "UPDATE `products` SET `ref` = '" . $product->getRef() . "', `name` = '" . $product->getName() . "', `price` = '" . $product->getPrice() . "', `description` = '" . $product->getDescription() . "', `categories_id_categories` = '" . $product->getCategory()->getId() . "', `uses` = '" . json_encode($product->getUses(), JSON_UNESCAPED_UNICODE) . "' WHERE `products`.`id_products` = " . $product->getId();
    echo $query;
    $status = $this->db->consult($query);
    // echo $status;
    $this->db->close();
    return $status;
  }
  function delete($id)
  {
    $this->db->connect();
    $query = "DELETE FROM `products` WHERE `products`.`id_products` = $id";
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
}
