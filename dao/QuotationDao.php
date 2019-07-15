<?php
require_once dirname(__DIR__) . "/model/Quotation.php";
require_once dirname(__DIR__) . "/model/Item.php";
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/db/env.php";
require_once dirname(__DIR__) . "/dao/MeasurementDao.php";
require_once dirname(__DIR__) . "/dao/MaterialDao.php";
require_once dirname(__DIR__) . "/dao/ProductDao.php";
class QuotationDao
{
  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
    $this->measurementDao = new MeasurementDao();
    $this->productDao = new ProductDao();
    $this->materialDao = new MaterialDao();
  }
  function save($quotation)
  {
    $this->db->connect();
    // Insert client
    $this->db->consult("INSERT INTO `clients` (`id_clients`, `name`, `surname`, `email`, `name_company`) VALUES (NULL, '" . $quotation->getNameClient() . "', '" . $quotation->getLastNameClient() . "', '" . $quotation->getEmail() . "', '" . $quotation->getCompany() . "') ON DUPLICATE KEY UPDATE `name` = '" . $quotation->getNameClient() . "', `surname` =  '" . $quotation->getLastNameClient() . "', `name_company` = '" . $quotation->getCompany() . "'");
    $idClient = $this->db->consult("SELECT MAX(`id_clients`) AS id FROM `clients`", "yes");
    $idClient = $idClient[0]["id"];
    $quotation->setIdClient($idClient);
    // Insert quotation
    $query = "INSERT INTO `quotations` (`id_quotations`, `city`, `address`, `cell_phone`, `phone`, `description`, `file`, `clients_id_clients`, `created_at`) VALUES (NULL, '" . $quotation->getCity() . "', '" . $quotation->getAddress() . "', '" . $quotation->getCellPhoneNumber() . "', '" . $quotation->getPhoneNumber() . "', '" . $quotation->getExtraInformation() . "', '" . $quotation->getFile() . "', '$idClient', current_timestamp())";
    $this->db->consult($query);
    $idQuotation = $this->db->consult("SELECT MAX(`id_quotations`) AS id FROM `quotations`", "yes");
    $idQuotation = $idQuotation[0]["id"];
    $quotation->setId($idQuotation);
    // Insert Items
    foreach ($quotation->getItems() as $item) {
      $query = "INSERT INTO `quotations_details` (`id_quotations_details`, `products_id_products`, `quantity`, `printed`, `price`, `material_id`, `measurement_id`, `quotations_id_quotations`) VALUES (NULL, '" . $item->getProduct()->getId() . "', '" . $item->getQuantity() . "', '" . (int) $item->isPrinting() . "', '" . $item->getPrice() . "', '" . $item->getMaterial()->getId() . "', '" . $item->getMeasurement()->getId() . "', '" . $quotation->getId() . "')";
      $this->db->consult($query);
    }
    $this->close();
  }
  function delete($id)
  { }
  function update($quotation)
  { }
  function findById($id)
  {
    // query para buscar la cotizacion con la información del cliente
    $this->db->connect();
    $quotationDB = $this->db->consult("SELECT * FROM quotations INNER JOIN clients ON clients_id_clients = clients.id_clients WHERE id_quotations = $id", "yes");
    $quotationDB = $quotationDB[0];
    $quotation = new Quotation();
    $quotation->setNameClient($quotationDB["name"]);
    $quotation->setLastNameClient($quotationDB["surname"]);
    $quotation->setCompany($quotationDB["name_company"]);
    $quotation->setAddress($quotationDB["address"]);
    $quotation->setCity($quotationDB["city"]);
    $quotation->setEmail($quotationDB["email"]);
    $quotation->setPhoneNumber($quotationDB["phone"]);
    $quotation->setCellPhoneNumber($quotationDB["cell_phone"]);
    $quotation->setExtraInformation($quotationDB["description"]);
    $quotation->setSolved(filter_var($quotationDB["solved"], FILTER_VALIDATE_BOOLEAN));
    $quotation->setId($quotationDB["id_quotations"]);
    $items = [];
    // cargado de cada uno de los items
    $itemsDB = $this->db->consult("SELECT * FROM quotations_details WHERE `quotations_id_quotations` = $id", "yes");
    foreach ($itemsDB as $itemDB) {
      $item = new Item();
      $item->setProduct($this->productDao->findById($itemDB["products_id_products"]));
      $item->setMaterial($this->materialDao->findById($itemDB["material_id"]));
      $item->setMeasurement($this->measurementDao->findById($itemDB["measurement_id"]));
      $item->setQuantity($itemDB["quantity"]);
      $item->setPrice($itemDB["price"]);
      $item->setPrinting(filter_var($itemDB["printed"], FILTER_VALIDATE_BOOLEAN));
      array_push($items, $item);
    }
    $quotation->setItems($items);
    $this->db->close();
    return $quotation;
  }
  function findAll()
  { }
}
