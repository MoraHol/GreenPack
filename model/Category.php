<?php
class Category implements JsonSerializable
{
  private $id;
  private $name;
  private $parentCategory;
  private $description;

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;
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
  public function getParentCategory()
  {
    return $this->parentCategory;
  }
  public function setParentcategory($parentCategory)
  {
    return $this->parentCategory = $parentCategory;
  }
  public function jsonSerialize()
  {
    return get_object_vars($this);
  }
}
