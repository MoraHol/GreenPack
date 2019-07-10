<?php
class quotation
{
  private $nameClient;
  private $lastNameClient;
  private $company;
  private $address;
  private $country;
  private $items;
  private $email;
  private $phoneNumber;
  private $cellphoneNumber;

  public function getNameClient()
  {
    return $this->nameClient;
  }

  public function setNameClient($nameClient)
  {
    $this->nameClient = $nameClient;
  }

  public function getLastNameClient()
  {
    return $this->lastNameClient;
  }

  public function setLastNameClient($lastNameClient)
  {
    $this->lastNameClient = $lastNameClient;
  }

  public function getCompany()
  {
    return $this->company;
  }

  public function setCompany($company)
  {
    $this->company = $company;
  }

  public function getAddress()
  {
    return $this->address;
  }

  public function setAddress($address)
  {
    $this->address = $address;
  }

  public function getCountry()
  {
    return $this->country;
  }

  public function setCountry($country)
  {
    $this->country = $country;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }

  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }

  public function getCellphoneNumber()
  {
    return $this->cellphoneNumber;
  }

  public function setCellphoneNumber($cellphoneNumber)
  {
    $this->cellphoneNumber = $cellphoneNumber;
  }

  public function addItem($item)
  {
    array_push($this->items, $item);
  }
  
  public function removeItem($item)
  {
    $index = array_search($item, $this->items);
    if ($index !== false) {
      unset($this->items[$index]);
    }
  }
}
