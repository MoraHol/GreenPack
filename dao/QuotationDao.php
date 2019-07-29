<?php
require_once dirname(__DIR__) . "/model/Quotation.php";
require_once dirname(__DIR__) . "/model/Item.php";
require_once dirname(__DIR__) . "/model/ItemBag.php";
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/db/env.php";
require_once dirname(__DIR__) . "/dao/MeasurementDao.php";
require_once dirname(__DIR__) . "/dao/MaterialDao.php";
require_once dirname(__DIR__) . "/dao/ProductDao.php";
require_once dirname(__DIR__) . "/dao/AdminDao.php";
class QuotationDao
{
  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
    $this->measurementDao = new MeasurementDao();
    $this->productDao = new ProductDao();
    $this->materialDao = new MaterialDao();
    $this->adminDao = new AdminDao();
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
    //assing admin
    $quotation = $this->assign($quotation);
    $query = "INSERT INTO `quotations` (`id_quotations`, `city`, `address`, `cell_phone`, `phone`, `description`, `file`, `clients_id_clients`, `created_at`,`id_admin_assignment`,`date_assignment`) VALUES (NULL, '" . $quotation->getCity() . "', '" . $quotation->getAddress() . "', '" . $quotation->getCellPhoneNumber() . "', '" . $quotation->getPhoneNumber() . "', '" . $quotation->getExtraInformation() . "', '" . $quotation->getFile() . "', '$idClient', current_timestamp(),'" . $quotation->getIdAdminAssigned() . "','" . date('Y-m-d H:i:s', $quotation->getDateAssigned()) . "')";
    $this->db->consult($query);
    $idQuotation = $this->db->consult("SELECT MAX(`id_quotations`) AS id FROM `quotations`", "yes");
    $idQuotation = $idQuotation[0]["id"];
    $quotation->setId($idQuotation);
    // Insert Items
    foreach ($quotation->getItems() as $item) {
      $query = "INSERT INTO `quotations_details` (`id_quotations_details`, `products_id_products`, `quantity`, `printed`, `price`, `material_id`, `measurement_id`, `quotations_id_quotations`,`laminated`,`pla`) VALUES (NULL, '" . $item->getProduct()->getId() . "', '" . $item->getQuantity() . "', '" . (int) $item->isPrinting() . "', '" . $item->getPrice() . "', '" . $item->getMaterial()->getId() . "', '" . $item->getMeasurement()->getId() . "', '" . $quotation->getId() . "','" . (int) $item->isLam() . "','" . (int) $item->isPla() . "')";
      $this->db->consult($query);
    }
    $this->db->close();
  }
  function delete($id)
  { }
  function update($quotation)
  {
    $this->db->connect();
    $status = 0;
    //update data client
    $status = $this->db->consult("INSERT INTO `clients` (`id_clients`, `name`, `surname`, `email`, `name_company`) VALUES (NULL, '" . $quotation->getNameClient() . "', '" . $quotation->getLastNameClient() . "', '" . $quotation->getEmail() . "', '" . $quotation->getCompany() . "') ON DUPLICATE KEY UPDATE `name` = '" . $quotation->getNameClient() . "', `surname` =  '" . $quotation->getLastNameClient() . "', `name_company` = '" . $quotation->getCompany() . "'");
    $idClient = $this->db->consult("SELECT `id_clients` AS id FROM `clients` WHERE `email` = '" . $quotation->getEmail() . "'", "yes");
    $idClient = $idClient[0]["id"];
    $quotation->setIdClient($idClient);
    // update quotation
    $query = "UPDATE `quotations` SET `city` = '" . $quotation->getCity() . "', `address` = '" . $quotation->getAddress() . "', `cell_phone` = '" . $quotation->getCellPhoneNumber() . "', `phone` = '" . $quotation->getPhoneNumber() . "', `description` = '" . $quotation->getExtraInformation() . "', `solved` = '" . (int) $quotation->isSolved() . "', `clients_id_clients` = '" . $quotation->getIdClient() . "', `date_solved` = '" . $quotation->getDateSolved() . "', `id_admin_solved` = '" . $quotation->getIdAdminSolved() . "' WHERE `quotations`.`id_quotations` = " . $quotation->getId();
    echo $query;
    $status = $this->db->consult($query);
    // update items
    foreach ($quotation->getItems() as $item) {
      $query = "UPDATE `quotations_details` SET `quantity` = '" . $item->getQuantity() . "', `price` = '" . $item->getPrice() . "' WHERE `quotations_details`.`id_quotations_details` = " . $item->getId();
      $status = $this->db->consult($query);
    }
    $this->db->close();
    return $status;
  }
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
    $quotation->setCreatedAt(strtotime($quotationDB["created_at"]));
    $quotation->setSolved(filter_var($quotationDB["solved"], FILTER_VALIDATE_BOOLEAN));
    $quotation->setId($quotationDB["id_quotations"]);
    $quotation->setIdAdminSolved($quotationDB["id_admin_solved"]);
    $quotation->setIdAdminAssigned($quotationDB["id_admin_assignment"]);
    $quotation->setDateAssigned(strtotime($quotationDB["date_assignment"]));
    $items = [];
    // cargado de cada uno de los items
    $itemsDB = $this->db->consult("SELECT * FROM quotations_details WHERE `quotations_id_quotations` = $id", "yes");
    foreach ($itemsDB as $itemDB) {
      $product = $this->productDao->findById($itemDB["products_id_products"]);
      if ($product->getCategory()->getName() == 'bolsas') {
        $item = new ItemBag();
      } else {
        $item = new ItemBox();
      }
      $item->setId($itemDB["id_quotations_details"]);
      $item->setProduct($product);
      $item->setMaterial($this->materialDao->findById($itemDB["material_id"]));
      $item->setMeasurement($this->measurementDao->findById($itemDB["measurement_id"]));
      $item->setQuantity((int) $itemDB["quantity"]);
      $item->setPrice((int) $itemDB["price"]);
      $item->setPrinting(filter_var($itemDB["printed"], FILTER_VALIDATE_BOOLEAN));
      $item->setLam(filter_var($itemDB["laminated"], FILTER_VALIDATE_BOOLEAN));
      $item->setPla(filter_var($itemDB["pla"], FILTER_VALIDATE_BOOLEAN));
      array_push($items, $item);
    }
    $quotation->setItems($items);
    $this->db->close();
    return $quotation;
  }
  function findAll()
  {
    $this->db->connect();
    $quotationsDB = $this->db->consult("SELECT `id_quotations` AS id FROM `quotations` ORDER BY `created_at` DESC", "yes");
    $quotations = [];
    foreach ($quotationsDB as $quotationDB) {
      array_push($quotations, $this->findById($quotationDB["id"]));
    }
    // $this->db->close();
    return $quotations;
  }
  function findSolved()
  {
    $this->db->connect();
    $quotationsDB = $this->db->consult("SELECT `id_quotations` AS id FROM `quotations` WHERE `solved` != 0 ORDER BY `created_at` DESC", "yes");
    $quotations = [];
    foreach ($quotationsDB as $quotationDB) {
      array_push($quotations, $this->findById($quotationDB["id"]));
    }
    // $this->db->close();
    return $quotations;
  }
  function findNoSolved()
  {
    $this->db->connect();
    $quotationsDB = $this->db->consult("SELECT `id_quotations` AS id FROM `quotations` WHERE `solved` = 0 ORDER BY `created_at` ASC", "yes");
    $quotations = [];
    foreach ($quotationsDB as $quotationDB) {
      array_push($quotations, $this->findById($quotationDB["id"]));
    }
    // $this->db->close();
    return $quotations;
  }
  function findAssignedTo($idAdmin)
  {
    $this->db->connect();
    $quotations = [];
    $query = "SELECT `id_quotations` AS `id` FROM `quotations` WHERE `id_admin_assignment` = $idAdmin";
    $quotationsDB = $this->db->consult($query, "yes");
    foreach ($quotationsDB as $quotationDB) {
      array_push($quotations, $this->findById($quotationDB["id"]));
    }
    return $quotations;
  }
  function assign($quotation)
  {
    $idAdmin = $this->adminDao->findSellerLastAssignment();
    var_dump($idAdmin);
    $admins = $this->adminDao->findSellers();
    // var_dump($admins);
    $adminCurrent = $this->busquedaBinariaRecursiva($admins, $idAdmin, 0, count($admins) - 1);
    $idAssigned = $this->next($admins, $adminCurrent);
    $this->db->connect();
    $query = "UPDATE `assignment_queue` SET `id_admin`= $idAssigned WHERE `id_admin` = $idAdmin";
    $this->db->consult($query);
    $quotation->setIdAdminAssigned($idAssigned);
    $quotation->setDateAssigned(strtotime(date("Y-m-d H:i:s")));
    return $quotation;
  }
  private function next($admins, $adminCurrent)
  {
    if (count($admins) - 1 == $adminCurrent) {
      return $admins[0]->getId();
    } else {
      return $admins[$adminCurrent + 1]->getId();
    }
  }
  private function busquedaBinariaRecursiva($arreglo, $busqueda, $izquierda, $derecha)
  {

    /*
    Comprobar si ya no podemos partir el arreglo
     */
    if ($izquierda > $derecha) {
      return -1;
    }
    # Obtener el valor y elemento de la mitad del arreglo
    $indiceDelElementoMedio = floor(($izquierda + $derecha) / 2);
    $elementoDelMedio = $arreglo[$indiceDelElementoMedio];

    # ¿Lo que buscamos está en la mitad del arreglo? entonces regresa el índice
    if ($busqueda === $elementoDelMedio->getId()) {
      return $indiceDelElementoMedio;
    } else {
      # Si no, partimos el arreglo dependiendo de la búsqueda
      if ($busqueda > $elementoDelMedio->getId()) {
        # Si está a la derecha, lo partimos desde el medio + 1 hasta el elemento dado por derecha
        $izquierda = $indiceDelElementoMedio + 1;
        return $this->busquedaBinariaRecursiva($arreglo, $busqueda, $izquierda, $derecha);
      } else {
        # Si está a la izquierda, lo partimos desde el medio - 1 hasta el elemento dado por izquierda
        $derecha = $indiceDelElementoMedio - 1;
        return $this->busquedaBinariaRecursiva($arreglo, $busqueda, $izquierda, $derecha);
      }
    }
  }
}
