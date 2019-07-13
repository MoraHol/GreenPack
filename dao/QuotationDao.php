<?php
require_once dirname(__DIR__) . "/model/Quotation.php";
require_once dirname(__DIR__) . "/model/Item.php";
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/db/env.php";
class QuotationDao
{
  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
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
  }
  function delete($id)
  { }
  function update($quotation)
  { }
  function findById($id)
  { }
  function findAll()
  { }
}
