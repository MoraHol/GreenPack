<?php

/****************************************************************************************************************
/*Esta clase permite hacer conversion de fechas dadas por php
/*Desarrollada por Alexis Holguin(github: MoraHol)
/*Para Teenus.com.co
/*Ultima actualizacion 06/06/2019
/****************************************************************************************************************/
class ConversorDate
{
  public function monthToString($numberMonth)
  {
    switch ($numberMonth) {
      case 1:
        return "enero";
        break;
      case 2:
        return "febrero";
        break;
      case 3:
        return "marzo";
        break;
      case 4:
        return "abril";
        break;
      case 5:
        return "mayo";
        break;
      case 6:
        return "junio";
        break;
      case 7:
        return "julio";
        break;
      case 8:
        return "agosto";
        break;
      case 9:
        return "septiembre";
        break;
      case 10:
        return "octubre";
        break;
      case 11:
        return "noviembre";
        break;
      case 12:
        return "diciembre";
        break;
    }
  }
  public function dateToString($date)
  {
    $month = $this->monthToString($date["month"]);
    return "$month, " . $date["day"] . " " . $date["year"] . ", " . $this->formatHour($date);
  }
  public function formatHour($date)
  {
    if ($date["hour"] > 12) {
      $hour = $date["hour"] - 12;
      $minute = $date["minute"] < 10 ? "0" . $date["minute"] : $date["minute"];
      return "$hour:$minute a.m";
    } else {
      $minute = $date["minute"] < 10 ? "0" . $date["minute"] : $date["minute"];
      return $date["hour"] . ":$minute p.m";
    }
  }
  public function dateToStringShort($date)
  {
    $month = $this->monthToString($date["month"]);
    return "$month " . $date["day"] . ", " . $date["year"];
  }
}
