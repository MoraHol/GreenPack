<?php
class ProductsAssoc implements JsonSerializable
{
  private $idproduct;
  private $productAssoc;

  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  }

  public function getIdproduct()
  {
    return $this->idproduct;
  }

  public function setIdProduct($idproduct)
  {
    $this->idproduct = $idproduct;
  }

  public function getProductAssoc()
  {
    return $this->productAssoc;
  }

  public function setProductAssoc($productAssoc)
  {
    $this->productAssoc = $productAssoc;
  }

  public function jsonSerialize()
  {
    return get_object_vars($this);
  }
}
