<?php
class Measurement implements JsonSerializable
{
  /**
   * id de medida
   * @var id 
   */
  private $id;
  private $width;
  private $height;
  private $length;
  private $product;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getWidth()
  {
    return $this->width;
  }

  public function setWidth($width)
  {
    $this->width = $width;
  }

  public function getHeight()
  {
    return $this->height;
  }

  public function setHeight($height)
  {
    $this->height = $height;
  }

  public function getLength()
  {
    return $this->length;
  }

  public function setLength($length)
  {
    $this->length = $length;
  }

  public function getProduct()
  {
    return $this->product;
  }

  public function setProduct($product)
  {
    $this->product = $product;
  }
  public function jsonSerialize()
  {
    return get_object_vars($this);
  }
  public function isEqual($measurement)
  {
    if ($this->getWidth() == $measurement->getWidth() && $this->getHeight() == $measurement->getHeight() && $this->getLength() == $measurement->getLength()) {
      return true;
    } else {
      return false;
    }
  }
}
