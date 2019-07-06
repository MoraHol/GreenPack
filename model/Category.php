<?php
class Category
{
    private $id;
    private $name;
    private $parentCategory;
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
}
