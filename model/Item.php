<?php
class Item
{
	private $product;
	private $quantity;
	
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
}
