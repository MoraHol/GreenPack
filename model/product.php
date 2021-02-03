<?php
class Product implements JsonSerializable
{
  private $id;
  private $name;
  private $price;
  private $description;
  private $images;
  private $materials;
  private $cotizador;
  private $measurements;
  private $category;
  private $uses;
  private $ref;

  function __construct()
  { }

  public function getCategory()
  {
    return $this->category;
  }

  public function setCategory($category)
  {
    $this->category = $category;
  }


  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function setPrice($price)
  {
    $this->price = $price;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getImages()
  {
    return $this->images;
  }

  public function setImages($images)
  {
    $this->images = $images;
  }

  public function getMaterials()
  {
    return $this->materials;
  }

  public function setMaterials($materials)
  {
    $this->materials = $materials;
  }

  public function getCotizador()
  {
    return $this->cotizador;
  }

  public function setCotizador($cotizador)
  {
    $this->cotizador = $cotizador;
  }



  public function getMeasurements()
  {
    return $this->measurements;
  }

  public function setMeasurements($measurements)
  {
    $this->measurements = $measurements;
  }

  public function jsonSerialize()
  {
    return get_object_vars($this);
  }
  
  public function getUses()
  {
    return $this->uses;
  }

  public function setUses($uses)
  {
    $this->uses = $uses;
  }
  public function getRef()
  {
    return $this->ref;
  }

  public function setRef($ref)
  {
    $this->ref = $ref;
  }

  
}
