<?php
class Item
{
  private $product;
  private $quantity;
  private $material;
  private $printing;
  private $measurement;
  private $id;

  public function __construct()
  {
    $this->id = bin2hex(openssl_random_pseudo_bytes(256));
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
}
