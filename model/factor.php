<?php
class Factor implements JsonSerializable
{
  private $idmaterial;
  private $idproduct;
  private $e1;
  private $e2;
  private $e3;

  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }

  public function getIdmaterial()
  {
    return $this->idmaterial;
  }

  public function setIdmaterial($idmaterial)
  {
    $this->idmaterial = $idmaterial;
  }

  public function getIdproduct()
  {
    return $this->idproduct;
  }

  public function setIdProduct($idproduct)
  {
    $this->idproduct = $idproduct;
  }

  public function getE1()
  {
    return $this->e1;
  }

  public function setE1($e1)
  {
    $this->e1 = $e1;
  }

  public function getE2()
  {
    return $this->e2;
  }

  public function setE2($e2)
  {
    $this->e2 = $e2;
  }

  public function getE3()
  {
    return $this->e3;
  }

  public function setE3($e3)
  {
    $this->e3 = $e3;
  }

  public function jsonSerialize()
  {
    return get_object_vars($this);
  }
}
