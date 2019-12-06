<?php

require_once __DIR__ . "/Item.php";

class ItemFondoAutomatico extends Item implements JsonSerializable
{
  public function __construct()
  {
    parent::__construct();
  }
  public function calculatePrice()
  {
    $directCost = $this->calculateDirectCost();
    if ($this->getQuantity() <= 20000) {
      return $this->setPrice($directCost * $this->getMaterial()->getMinimunScale());
    } else if ($this->getQuantity() > 20000 && $this->getQuantity() <= 100000) {
      return $this->setPrice($directCost * $this->getMaterial()->getMediumScale());
    } else {
      return $this->setPrice($directCost * $this->getMaterial()->getMaximunScale());
    }
  }
  public function calculateDirectCost()
  {
    // calculo de costos 
		// (Ancho total * largo * GR_Material * Precio_Material ) / 10.000.000
		// ancho total = mod5((ancho + fuelle) * 2)
		$anchoTotal = $this->mod5(($this->getMeasurement()->getWidth() + $this->getMeasurement()->getHeight()) * 2);
		return ($anchoTotal *
			$this->getMeasurement()->getLength() *
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

  private function mod5($number)
	{
		$sobra = $number % 5;
		if ($sobra < 5) {
			return ($number - $sobra) + 5;
		} else {
			return ($number - $sobra) + 10;
		}
	}
}
