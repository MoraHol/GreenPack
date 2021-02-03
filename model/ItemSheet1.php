<?php
require_once __DIR__ . "/Item.php";
class ItemSheet extends Item implements JsonSerializable
{
    public function __construct()
  {
    parent::__construct();
  }
  public function calculatePrice()
  {
    $directCost = $this->calculateDirectCost();
    if($this->getQuantity() < 20000){
        return $this->setPrice($directCost * 3.5);
    }else if($this->getQuantity() > 20000 && $this->getQuantity() < 50000){
        return $this->setPrice($directCost * 3);
    }else{
        return $this->setPrice($directCost * 2.5);
    }
  }
  public function calculateDirectCost()
  {
      // calculo de costos 
      // (Ancho * alto * GR_Material * Precio_Material ) / 10.000.000
    return ($this->getMeasurement()->getWidth() * 
    $this->getMeasurement()->getHeight() * 
    $this->getMaterial()->getGrammage() * 
    $this->getMaterial()->getPricePerKg()) 
    / 10000000;
  }
  public function setTypeProduct($typeProduct)
	{
		$this->typeProduct = $typeProduct;
	}

	public function getTypeProduct()
	{
		return $this->typeProduct;
	}

	public function setObservations($observations)
	{
		$this->observations = $observations;
	}

	public function getObservations()
	{
		return $this->observations;
	}
}