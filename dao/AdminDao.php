<?php
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/db/env.php";
require_once dirname(__DIR__) . "/model/Admin.php";
class AdminDao
{
  public function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }
  function findAll()
  {
    $this->db->connect();
    $adminsDB = $this->db->consult("SELECT * FROM `admins`", "yes");
    $admins = [];
    foreach ($adminsDB as  $adminDB) {
      $admin = new Admin();
      $admin->setId($adminDB["id_admins"]);
      $admin->setEmail($adminDB["email"]);
      $admin->setName($adminDB["name"]);
      $admin->setLastName($adminDB["last_name"]);
      $admin->setPassword($adminDB["password"]);
      $admin->setTokenPass($adminDB["token_password"]);
      $admin->setRole($adminDB["id_role"]);
      array_push($admins, $admin);
    }
    $this->db->close();
    return $admins;
  }
  function findById($id)
  {
    $this->db->connect();
    $adminDB = $this->db->consult("SELECT * FROM `admins` WHERE `id_admins` = $id", "yes");
    $adminDB = $adminDB[0];
    $admin = new Admin();
    $admin->setId($adminDB["id_admins"]);
    $admin->setEmail($adminDB["email"]);
    $admin->setName($adminDB["name"]);
    $admin->setLastName($adminDB["last_name"]);
    $admin->setPassword($adminDB["password"]);
    $admin->setTokenPass($adminDB["token_password"]);
    $admin->setRole($adminDB["id_role"]);
    $this->db->close();
    return $admin;
  }
  function findByEmail($email)
  {
    $this->db->connect();
    $query = "SELECT * FROM `admins` WHERE `email` = '$email'";
    $adminDB = $this->db->consult($query, "yes");
    $adminDB = $adminDB[0];
    $admin = new Admin();
    $admin->setId($adminDB["id_admins"]);
    $admin->setEmail($adminDB["email"]);
    $admin->setName($adminDB["name"]);
    $admin->setLastName($adminDB["last_name"]);
    $admin->setPassword($adminDB["password"]);
    $admin->setTokenPass($adminDB["token_password"]);
    $admin->setRole($adminDB["id_role"]);
    $this->db->close();
    return $admin;
  }
  function save($admin)
  {
    $this->db->connect();
    $query = "INSERT INTO `admins` (`id_admins`, `name`, `last_name`, `email`, `password`, `token_password`,`id_role`) VALUES (NULL, '" . $admin->getName() . "', '" . $admin->getLastName() . "', '" . $admin->getEmail() . "', '" . $admin->getPassword() . "', '" . $admin->getTokenPass() . "','" . $admin->getRole() . "')";
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  function update($admin)
  {
    $this->db->connect();
    $query = "UPDATE `admins` SET `name` = '" . $admin->getName() . "', `last_name` = '" . $admin->getLastName() . "', `password` = '" . $admin->getPassword() . "', `token_password` = '" . $admin->getTokenPass() . "', `id_role` = '" . $admin->getRole() . "' WHERE `admins`.`id_admins` = " . $admin->getId();
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  function delete($id)
  { }
  function findSellers()
  {
    $this->db->connect();
    $admins = [];
    $query = "SELECT `id_admins` FROM admins WHERE id_role = 1 ORDER BY `id_admins` ASC";
    $adminsDB = $this->db->consult($query, "yes");
    foreach ($adminsDB as $adminDB) {
      array_push($admins, $this->findById($adminDB["id_admins"]));
    }
    $this->db->close();
    return $admins;
  }
  function findSellerLastAssignment()
  {
    $this->db->connect();
    $query = "SELECT * FROM `assignment_queue` LIMIT 1";
    $id = $this->db->consult($query, "yes");
    $id = $id[0];
    return $id;
  }
}
