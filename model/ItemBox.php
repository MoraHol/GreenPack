<?php
require_once __DIR__ . "/Item.php";
class ItemBox extends Item implements JsonSerializable
{
  private $observations;
  private $numberInks;

  public function __construct()
  {
    parent::__construct();
    $this->numberInks = "NULL";
  }

  public function calculatePrice()
  {
    $directCost =  $this->getMaterial()->getPricePerKg() / $this->getMeasurement()->getWindow();
    if ($this->getQuantity() < 11000) {
      $this->setPrice($directCost * 2);
    } else {
      return $this->setPrice($directCost * 2.5);
    }
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
}
