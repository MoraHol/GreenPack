<?php
require_once __DIR__ . "/Item.php";
class ItemBox extends Item implements JsonSerializable
{
  public function calculatePrice()
  {
    $directCost =  $this->getMaterial()->getPricePerKg() / $this->getMeasurement()->getWindow();
    if ($this->getQuantity() < 11000) {
      $this->setPrice($directCost * 2);
    } else {
      return $this->setPrice($directCost * 2.5);
    }
  }
}
