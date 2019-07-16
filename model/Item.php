<?php
class Item
{
  private $product;
  private $quantity;
  private $material;
  private $printing;
  private $measurement;
  private $id;
  private $price;

  public function __construct()
  {
    $this->id = bin2hex(openssl_random_pseudo_bytes(256));
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function setPrice($price)
  {
    $this->price = $price;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getProduct()
  {
    return $this->product;
  }

  public function setProduct($product)
  {
    $this->product = $product;
  }

  public function getQuantity()
  {
    return $this->quantity;
  }

  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }

  public function getMaterial()
  {
    return $this->material;
  }

  public function setMaterial($material)
  {
    $this->material = $material;
  }

  public function isPrinting()
  {
    return $this->printing;
  }

  public function setPrinting($printing)
  {
    $this->printing = $printing;
  }

  public function getMeasurement()
  {
    return $this->measurement;
  }

  public function setMeasurement($measurement)
  {
    $this->measurement = $measurement;
  }
  public function isEqual($item)
  {
    if (
      $this->printing == $item->isPrinting() && $this->measurement == $item->getMeasurement()
      && $this->product == $item->getProduct() && $this->material == $item->getMaterial()
    ) {
      return true;
    } else {
      return false;
    }
  }
  public function calculateTotal()
  {
    return (int) $this->price * (int) $this->quantity;
  }
  public function calculatePrice()
  {
    $LongUseful = $this->measurement->getLength() - 3;
    $AT = (($this->measurement->getWidth() + $this->measurement->getHeight()) * 2) + 2;
    $V = $this->measurement->getWidth() - 6;
    $PAPER = ($AT * $this->measurement->getLength() * $this->material->getGrammage()) / 10000000;
    $PLA = ((($V + 3) * $this->measurement->getLength()) * 30) / 10000000;
    $LAM = ($AT * $this->measurement->getLength() * 30) / 1000000;
    $directCost = $PAPER * $this->material->getPricePerKg();
    if ($this->quantity < 2000) {
      $this->price = $directCost * 3.5;
    }
    if ($this->quantity > 20000 &&  $this->quantity < 60000) {
      $this->price = $directCost * 3;
    }
    if ($this->quantity > 60000 &&  $this->quantity < 100000) {
      $this->price = $directCost * 2.8;
    }
    if ($this->quantity > 100000 &&  $this->quantity < 1000000) {
      $this->price = $directCost * 2.3;
    } else {
      $this->price = $directCost * 2.3;
    }
  }
}
