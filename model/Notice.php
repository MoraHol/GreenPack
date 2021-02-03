<?php
/****************************************************************************************************************
/*Esta clase es el modelo de Noticia
/*Desarrollada por Teenus SAS
/*Para greenpack.com.co
/*Ultima actualizacion 28/06/2019
/****************************************************************************************************************/
class Notice
{
  private $id;
  private $title;
  private $image;
  private $hits;
  private $content;
  private $createdAt;
  private $updatedAt;
  private $active;
  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getImage()
  {
    return $this->image;
  }
  public function setImage($image)
  {
    $this->image = $image;
  }
  public function getHits()
  {
    return $this->hits;
  }
  public function setHits($hits)
  {
    $this->hits = $hits;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }
  public function setUpdatedAt($updatedAt)
  {
    $this->updatedAt = $updatedAt;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setActive($active)
  {
    $this->active = $active;
  }
}