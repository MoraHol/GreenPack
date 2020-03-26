<?php
require_once __DIR__ . "/Item.php";
class ItemBox extends Item implements JsonSerializable
{
  private $observations;
  private $numberInks;
  private $typeProduct;

  public function __construct()
  {
    parent::__construct();
    $this->numberInks = "NULL";
  }

  public function calculatePrice()
  {
    $directCost =  $this->calculateDirectCost();
    if ($this->getQuantity() < 6000) {
      $this->setPrice($directCost * 4);
    } else if($this->getQuantity() >= 6000 && $this->getQuantity() < 10000) {
      return $this->setPrice($directCost * 3);
    }else{
      return $this->setPrice($directCost * 2.5);
    }
  }
  public function calculateDirectCost()
  {
    return $this->getMaterial()->getPricePerKg() / $this->getMeasurement()->getWindow();
  }

  public function setTypeProduct($typeProduct)
  {
    $this->typeProduct = $typeProduct;
  }

  public function getTypeProduct()
  {
    return $this->typeProduct;
  }

  public function setObservations($observations)
  {
    $this->observations = $observations;
  }

  public function getObservations()
  {
    return $this->observations;
  }

  public function setNumberInks($numberInks)
  {
    $this->numberInks = $numberInks;
  }

  public function getNumberInks()
  {
    return $this->numberInks;
  }
  public function jsonSerialize()
  {
    return get_object_vars($this);
  }
}
