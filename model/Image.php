<?php
class Image implements JsonSerializable
{
  private $id;
  private $url;
  private $product;


  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getUrl()
  {
    return $this->url;
  }

  public function setUrl($url)
  {
    $this->url = $url;
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
}
