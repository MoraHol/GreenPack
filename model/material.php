<?php
class Material implements JsonSerializable
{
  private $id;
  private $name;
  private $description;
  private $grammage;
  private $pricePerKg;
  
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

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getGrammage()
  {
    return $this->grammage;
  }

  public function setGrammage($grammage)
  {
    $this->grammage = $grammage;
  }

  public function getPricePerKg()
  {
    return $this->pricePerKg;
  }

  public function setPricePerKg($pricePerKg)
  {
    $this->pricePerKg = $pricePerKg;
  }

  public function jsonSerialize()
  {
    return get_object_vars($this);
  }

  public function getMinimunScale(){
		return $this->minimunScale;
	}

	public function setMinimunScale($minimunScale){
		$this->minimunScale = $minimunScale;
	}

	public function getMediumScale(){
		return $this->mediumScale;
	}

	public function setMediumScale($mediumScale){
		$this->mediumScale = $mediumScale;
	}

	public function getMaximunScale(){
		return $this->maximunScale;
	}

	public function setMaximunScale($maximunScale){
		$this->maximunScale = $maximunScale;
	}
}
