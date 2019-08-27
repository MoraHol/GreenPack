<?php
require_once __DIR__ . "/Item.php";
class ItemBox extends Item implements JsonSerializable
{
  public function calculatePrice()
  {
    $directCost =  $this->getMaterial()->getPrice() / $this->getMeasurement()->getWindow();
    if ($this->getQuantity() < 11000) {
      return $directCost * 2;
    } else {
      return $directCost * 2.5;
    }
  }
}
