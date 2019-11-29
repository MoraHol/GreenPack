<?php
require_once __DIR__ . "/material.php";
require_once __DIR__ . "/measurement.php";
require_once __DIR__ . "/product.php";

abstract class Item implements JsonSerializable
{
  private $product;
  private $quantity;
  private $material;
  private $printing;
  private $measurement;
  private $id;
  private $price;
  private $pla;
  private $lam;

  public function __construct()
  {
    $this->id = bin2hex(openssl_random_pseudo_bytes(256));
  }

  public function isPla()
  {
    return $this->pla;
  }

  public function setPla($pla)
  {
    $this->pla = $pla;
  }

  public function isLam()
  {
    return $this->lam;
  }

  public function setLam($lam)
  {
    $this->lam = $lam;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function setPrice($price)
  {
    $this->price = $price;
  }

  public function setId($id)
  {
    $this->id = $id;
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
      && $this->pla == $item->isPla() && $this->lam == $item->isLam()
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
  abstract public function calculatePrice();
  
  public function jsonSerialize()
  {
    return get_object_vars($this);
  }
}
