<?php
class Cantidad implements JsonSerializable
{
  private $id;
  private $idproduct;
  private $e1min;
  private $e1max;
  private $e2min;
  private $e2max;
  private $e3min;
  private $e3max;

  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getIdproduct()
  {
    return $this->idproduct;
  }

  public function setIdProduct($idproduct)
  {
    $this->idproduct = $idproduct;
  }

  public function setE1min($e1min)
  {
    $this->e1min = $e1min;
  }

  public function getE1min()
  {
    return $this->e1min;
  }

  public function setE1max($e1max)
  {
    $this->e1max = $e1max;
  }

  public function getE1max()
  {
    return $this->e1max;
  }


  public function setE2min($e2min)
  {
    $this->e2min = $e2min;
  }
  public function getE2min()
  {
    return $this->e2min;
  }

  public function setE2max($e2max)
  {
    $this->e2max = $e2max;
  }

  public function getE2max()
  {
    return $this->e2max;
  }

  public function setE3min($e3min)
  {
    $this->e3min = $e3min;
  }

  public function getE3min()
  {
    return $this->e3min;
  }

  public function setE3max($e3max)
  {
    $this->e3max = $e3max;
  }

  public function getE3max()
  {
    return $this->e3max;
  }


  public function jsonSerialize()
  {
    return get_object_vars($this);
  }
}
