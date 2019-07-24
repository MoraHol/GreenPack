<?php
class Admin
{
  private $id;
  private $name;
  private $lastName;
  private $email;
  private $password;
  private $tokenPass;
  private $role;

  public function __construct()
  {
    $this->tokenPass = bin2hex(openssl_random_pseudo_bytes(256));
  }

  public function getRole()
  {
    return $this->role;
  }

  public function setRole($role)
  {
    $this->role = $role;
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

  public function getLastName()
  {
    return $this->lastName;
  }

  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getTokenPass()
  {
    return $this->tokenPass;
  }

  public function setTokenPass($tokenPass)
  {
    $this->tokenPass = $tokenPass;
  }
}
