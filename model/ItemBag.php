<?php
require_once __DIR__ . "/Item.php";
class ItemBag extends Item implements JsonSerializable
{
  public function calculatePrice()
  {
    $directCost = $this->calculateDirectCost();
    if ($this->getQuantity() > 20000 &&  $this->getQuantity() < 60000) {
      $this->setPrice($directCost * 3);
    } elseif ($this->getQuantity() > 60000 &&  $this->getQuantity() < 100000) {
      $this->setPrice($directCost * 2.8);
    } elseif ($this->getQuantity() > 100000 &&  $this->getQuantity() < 1000000) {
      $this->setPrice($directCost * 2.3);
    } else {
      $this->setPrice($directCost * 2.3);
    }
  }
  public function calculateDirectCost()
  {
    $file = "http://" . $_SERVER["HTTP_HOST"] . "/services/get_price_pla.php";
    $curl = curl_init();
    curl_setopt_array($curl, [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_URL => $file
    ]);
    $content = curl_exec($curl);
    curl_close($curl);
    $pricePLA = (int) $content;
    $LongUseful = $this->getMeasurement()->getLength() - 3;
    $AT = (($this->getMeasurement()->getWidth() + $this->getMeasurement()->getHeight()) * 2) + 2;
    $V = $this->getMeasurement()->getWindow();
    $PAPER = ($AT * $this->getMeasurement()->getLength() * $this->getMaterial()->getGrammage()) / 10000000;
    $PLA = ((($V + 3) * $this->getMeasurement()->getLength()) * 30) / 10000000;
    $LAM = ($AT * $this->getMeasurement()->getLength() * 30) / 10000000;
    $CPLA = $PLA * $pricePLA;
    $CLAM = $LAM * $pricePLA;
    $CPAPER = $PAPER * $this->getMaterial()->getPricePerKg();
    $directCost = $CPAPER;
    if ($this->isLam() && $this->isPla()) {
      $directCost = $CPAPER + $CLAM + $CPLA;
    } else {
      if ($this->isLam()) {
        $directCost = $CPAPER + $CLAM;
      } else {
        if ($this->isPla()) {
          $directCost = $CPAPER + $CPLA;
        } else {
          $directCost = $CPAPER;
        }
      }
    }
    return $directCost;
  }
  public function jsonSerialize()
  {
    return get_object_vars($this);
  }
}
