<?php
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/model/Notice.php";
require_once dirname(__DIR__) . "/db/env.php";
/****************************************************************************************************************
/*Esta clase permite Crear, Actualizar, Buscar y Eliminar Noticias
/*Desarrollada por Teenus SAS
/*Para greenpack.com.co
/*Ultima actualizacion 28/06/2019
/****************************************************************************************************************/
class NoticeDao
{
  private $db;
  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }
  public function save($notice)
  {
    $this->db->connect();
    $query = "INSERT INTO `notices` (`id_notice`, `title`, `content`, `photo`, `created_at`, `updated_at`,`active`) VALUES (NULL, '" . $notice->getTitle() . "', '" . $notice->getContent() . "', '" . $notice->getImage() . "', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP," . (int) $notice->getActive() . ")";
    echo $query;
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  public function update($notice)
  {
    $this->db->connect();
    $query = "UPDATE `notices` SET `title` = '" . $notice->getTitle() . "', `content` = '" . $notice->getContent() . "', `photo` = '" . $notice->getImage() . "',`active` = " . (int) $notice->getActive() . ", `hits` = '" . $notice->getHits() . "' WHERE `notices`.`id_notice` = " . $notice->getId();
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }
  public function delete($id)
  {
    $this->db->connect();
    $status = $this->db->consult("DELETE FROM `notices` WHERE `notices`.`id_notice` = $id");
    $this->db->close();
    return $status;
  }
  public function findById($id)
  {
    $this->db->connect();
    $noticeDB = $this->db->consult("SELECT * FROM `notices` WHERE id_notice = $id", "yes");
    $noticeDB = $noticeDB[0];
    $notice = new Notice();
    $notice->setId($noticeDB["id_notice"]);
    $notice->setTitle($noticeDB["title"]);
    $notice->setImage($noticeDB["photo"]);
    $notice->setHits((int) $noticeDB["hits"]);
    $notice->setContent($noticeDB["content"]);
    $notice->setActive(filter_var($noticeDB["active"], FILTER_VALIDATE_BOOLEAN));
    $notice->setCreatedAt(date_parse($noticeDB["created_at"]));
    $notice->setUpdatedAt(date_parse($noticeDB["updated_at"]));
    $this->db->close();
    return $notice;
  }
  public function findByCategory($idCategory)
  {
    $notices = [];
    $noticesDB = $this->db->consult("SELECT * FROM `notices` INNER JOIN categories_notices ON notices.category = categories_notices.id_category WHERE notices.category = " . $idCategory, "yes");
    $this->db->close();
    foreach ($noticesDB as $noticeDB) {
      $notice = new Notice();
      $notice->setId($noticeDB["id_notice"]);
      $notice->setTitle($noticeDB["title"]);
      $notice->setImage($noticeDB["photo"]);
      $notice->setContent($noticeDB["content"]);
      $notice->setHits((int) $noticeDB["hits"]);
      $notice->setActive(filter_var($noticeDB["active"], FILTER_VALIDATE_BOOLEAN));
      $notice->setCreatedAt(date_parse($noticeDB["created_at"]));
      $notice->setUpdatedAt(date_parse($noticeDB["updated_at"]));
      array_push($notices, $notice);
    }
    $this->db->close();
    return $notices;
  }
  public function findWithLimit($limit)
  {
    $this->db->connect();
    $notices = [];
    $noticesDB = $this->db->consult("SELECT * FROM `notices` ORDER BY `updated_at` DESC LIMIT $limit, 6 ", "yes");
    foreach ($noticesDB as $noticeDB) {
      $notice = new Notice();
      $notice->setId($noticeDB["id_notice"]);
      $notice->setTitle($noticeDB["title"]);
      $notice->setImage($noticeDB["photo"]);
      $notice->setHits((int) $noticeDB["hits"]);
      $notice->setContent($noticeDB["content"]);
      $notice->setActive(filter_var($noticeDB["active"], FILTER_VALIDATE_BOOLEAN));
      $notice->setCreatedAt(date_parse($noticeDB["created_at"]));
      $notice->setUpdatedAt(date_parse($noticeDB["updated_at"]));
      if ($notice->getActive()) {
        array_push($notices, $notice);
      }
    }
    $this->db->close();
    return $notices;
  }
  public function findlastest($limit)
  {
    $this->db->connect();
    $notices = [];
    $noticesDB = $this->db->consult("SELECT * FROM `notices` ORDER BY `updated_at` DESC LIMIT  $limit", "yes");
    foreach ($noticesDB as $noticeDB) {
      $notice = new Notice();
      $notice->setId($noticeDB["id_notice"]);
      $notice->setTitle($noticeDB["title"]);
      $notice->setImage($noticeDB["photo"]);
      $notice->setHits((int) $noticeDB["hits"]);
      $notice->setContent($noticeDB["content"]);
      $notice->setActive(filter_var($noticeDB["active"], FILTER_VALIDATE_BOOLEAN));
      $notice->setCreatedAt(date_parse($noticeDB["created_at"]));
      $notice->setUpdatedAt(date_parse($noticeDB["updated_at"]));
      if ($notice->getActive()) {
        array_push($notices, $notice);
      }
    }
    $this->db->close();
    return $notices;
  }
  public function findAllActive()
  {
    $this->db->connect();
    $notices = [];
    $noticesDB = $this->db->consult("SELECT * FROM `notices` WHERE `active` <> 0", "yes");
    foreach ($noticesDB as $noticeDB) {
      $notice = new Notice();
      $notice->setId($noticeDB["id_notice"]);
      $notice->setTitle($noticeDB["title"]);
      $notice->setImage($noticeDB["photo"]);
      $notice->setContent($noticeDB["content"]);
      $notice->setHits((int) $noticeDB["hits"]);
      $notice->setActive(filter_var($noticeDB["active"], FILTER_VALIDATE_BOOLEAN));
      $notice->setCreatedAt(date_parse($noticeDB["created_at"]));
      $notice->setUpdatedAt(date_parse($noticeDB["updated_at"]));
      array_push($notices, $notice);
    }
    $this->db->close();
    return $notices;
  }
  public function findAll()
  {
    $this->db->connect();
    $notices = [];
    $noticesDB = $this->db->consult("SELECT * FROM `notices`", "yes");
    foreach ($noticesDB as $noticeDB) {
      $notice = new Notice();
      $notice->setId($noticeDB["id_notice"]);
      $notice->setTitle($noticeDB["title"]);
      $notice->setImage($noticeDB["photo"]);
      $notice->setHits((int) $noticeDB["hits"]);
      $notice->setContent($noticeDB["content"]);
      $notice->setActive(filter_var($noticeDB["active"], FILTER_VALIDATE_BOOLEAN));
      $notice->setCreatedAt(date_parse($noticeDB["created_at"]));
      $notice->setUpdatedAt(date_parse($noticeDB["updated_at"]));
      array_push($notices, $notice);
    }
    $this->db->close();
    return $notices;
  }
}
