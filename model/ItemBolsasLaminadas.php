<?php

require_once __DIR__ . "/Item.php";

class ItemBolsasLaminadas extends Item implements JsonSerializable
{
    public function __construct()
  {
    parent::__construct();
  }
  public function calculatePrice()
  {
    $directCost = $this->calculateDirectCost();
    if ($this->getQuantity() <= 5000) {
      return $this->setPrice($directCost * $this->getMaterial()->getMinimunScale());
    } else if ($this->getQuantity() > 5000 && $this->getQuantity() <= 20000) {
      return $this->setPrice($directCost * $this->getMaterial()->getMediumScale());
    } else {
      return $this->setPrice($directCost * $this->getMaterial()->getMaximunScale());
    }
  }
  public function calculateDirectCost()
  {
    if($this->getMeasurement()->getPliego() == 5400){
      return $this->getMaterial()->p5400 / $this->getMeasurement()->getWindow();
    }else{
      return $this->getMaterial()->p7000 / $this->getMeasurement()->getWindow();
    }
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
}