<?php
require_once dirname(__DIR__) . "/model/measurement.php";
require_once(dirname(__DIR__) . "/db/env.php");
require_once dirname(__DIR__) . "/db/DBOperator.php";
// require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/composer/vendor/autoload.php";

// use Monolog\Logger;
// use Monolog\Handler\StreamHandler;

/*****************************************************************************
/*Esta clase permite Crear, Actualizar, Buscar y Eliminar Medidas
/*Desarrollada por Teenus SAS
/*Para Teenus.com.co
/*Ultima actualizacion 31/07/2019
/*****************************************************************************/
class MeasurementDao
{
  private $db;
  static $logger;
  function __construct()
  {
    $this->db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
    // self::$logger = new Logger('channel-name');
    // self::$logger->pushHandler(new StreamHandler($_SERVER["DOCUMENT_ROOT"] . '/logs/measurement.log', Logger::DEBUG));
  }
  function findByProduct($product)
  {
    $this->db->connect();
    $measurements = [];
    $measurementsDB = $this->db->consult("SELECT * FROM `measurements` WHERE `products_id_products` = " . $product->getId(), "yes");
    foreach ($measurementsDB as  $measurementDB) {
      $measurement = new Measurement();
      $measurement->setId($measurementDB["id_measurements"]);
      $measurement->setLength($measurementDB["lenght"]);
      $measurement->setWidth($measurementDB["width"]);
      $measurement->setHeight($measurementDB["height"]);
      $measurement->setWindow($measurementDB["window"]);
      $measurement->setProduct($product->getId());
      $measurement->setPliego($measurementDB["pliego"]);
      $measurement->setLargoUtil($measurementDB["largo_util"]);
      $measurement->setAnchoTotal($measurementDB["ancho_total"]);
      $measurement->setVentaMinimaImpresa($measurementDB["venta_minima_impresa"]);
      $measurement->setVentaMinimaGenerica($measurementDB["venta_minima_generica"]);
      $measurement->setcodigo($measurementDB["codigo"]);
      array_push($measurements, $measurement);
    }
    $this->db->close();
    return $measurements;
  }
  function findById($id)
  {
    $this->db->connect();
    $query = "SELECT * FROM `measurements` WHERE `id_measurements` = $id";
    $measurementDB = $this->db->consult($query, "yes");
    $measurementDB = $measurementDB[0];
    $measurement = new Measurement();
    $measurement->setId($measurementDB["id_measurements"]);
    $measurement->setLength($measurementDB["lenght"]);
    $measurement->setWidth($measurementDB["width"]);
    $measurement->setHeight($measurementDB["height"]);
    $measurement->setWindow($measurementDB["window"]);
    $measurement->setLargoUtil($measurementDB["largo_util"]);
    $measurement->setAnchoTotal($measurementDB["ancho_total"]);
    $measurement->setProduct($measurementDB["products_id_products"]);
    $measurement->setPliego($measurementDB["pliego"]);
    $measurement->setVentaMinimaImpresa($measurementDB["venta_minima_impresa"]);
    $measurement->setVentaMinimaGenerica($measurementDB["venta_minima_generica"]);
    $measurement->setcodigo($measurementDB["codigo"]);
    // $this->db->close();
    return $measurement;
  }
  function saveByProduct($measurement)
  {
    $this->db->connect();
    // self::$logger->warning('pliego:'. $measurement->getPliego() );
    if ($measurement->getPliego() != null) {
      $query = "INSERT INTO `measurements` (`id_measurements`, `width`, `height`,
      `lenght`, `products_id_products`, `window` , `largo_util`, `ancho_total`, `venta_minima_impresa`, `venta_minima_generica`,`pliego`,`codigo`) VALUES (NULL, '" . $measurement->getWidth() . "', '"
        . $measurement->getHeight() . "', '" . $measurement->getLength() . "', 
      '" . $measurement->getProduct() . "', '" . $measurement->getWindow() . "', '" . $measurement->getLargoUtil() . "' , '" . $measurement->getAnchoTotal() . "' , '" . $measurement->getVentaMinimaImpresa() . "' , '" . $measurement->getVentaMinimaGenerica() . "' , '" . $measurement->getPliego() . "' , " . $measurement->getcodigo() . "')";
    } else {
      $query = "INSERT INTO `measurements` (`id_measurements`, `width`, `height`,
      `lenght`, `products_id_products`, `largo_util`, `ancho_total`, `venta_minima_impresa` , `venta_minima_generica`, `window`,`codigo`) VALUES (NULL, '" . $measurement->getWidth() . "', '"
        . $measurement->getHeight() . "', '" . $measurement->getLength() . "', 
      '" . $measurement->getProduct() . "', '" . $measurement->getLargoUtil() . "', '" . $measurement->getAnchoTotal() . "', '" . $measurement->getVentaMinimaImpresa() . "', '" . $measurement->getVentaMinimaGenerica() . "',   '" . $measurement->getWindow() . "' , " . $measurement->getcodigo() . "')"; 
    }
    $status = $this->db->consult($query);
    $this->db->close();
    // self::$logger->info($query);
    return $status;
  }
  function searchMeasurementByProduct($product, $height, $width, $length, $codigo)
  {
    $this->db->connect();
    $query = "SELECT * FROM `measurements` WHERE `codigo` = $codigo and `width` = $width and `height` = $height and `lenght` = $length AND `products_id_products` = " . $product->getId();
    $measurementDB = $this->db->consult($query, "yes");
    $measurementDB = $measurementDB[0];
    $measurement = new Measurement();
    $measurement->setId($measurementDB["id_measurements"]);
    $measurement->setLength($measurementDB["lenght"]);
    $measurement->setcodigo($measurementDB["codigo"]);
    $measurement->setWidth($measurementDB["width"]);
    $measurement->setHeight($measurementDB["height"]);
    $measurement->setWindow($measurementDB["window"]);
    $measurement->setLargoUtil($measurementDB["largo_util"]);
    $measurement->setAnchoTotal($measurementDB["ancho_total"]);
    $measurement->setProduct($product->getId());
    $measurement->setPliego($measurementDB["pliego"]);
    $measurement->setVentaMinimaImpresa($measurementDB["venta_minima_impresa"]);
    $measurement->setVentaMinimaGenerica($measurementDB["venta_minima_generica"]);
    // self::$logger->info($query);
    $this->db->close();
    return $measurement;
  }

  function deleteByProduct($idMeasurement, $idProduct)
  {
    $this->db->connect();
    $query = "DELETE FROM `measurements` WHERE `measurements`.`id_measurements` = $idMeasurement AND `measurements`.`products_id_products` = $idProduct";
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
  }

  function update($measurement)
  {
    $this->db->connect();
    $query = "UPDATE `measurements` SET `width` = '" . $measurement->getWidth() . "', `height` = '" . $measurement->getHeight() . "', `largo_util` = '" . $measurement->getLargoUtil() . "', `ancho_total` = '" . $measurement->getAnchoTotal() . "', `lenght` = '" . $measurement->getLength() . "' , `venta_minima_impresa` = '" . $measurement->getVentaMinimaImpresa() . "' , `venta_minima_generica` = '" . $measurement->getVentaMinimaGenerica() . "', `codigo` = '" . $measurement->getcodigo() . "' WHERE `measurements`.`id_measurements` = " . $measurement->getId();
    $status = $this->db->consult($query);
    $this->db->close();
    return $status;
    // self::$logger->info($query);
  }

  public function findByMaterial($idMaterial, $product)
  {
    $this->db->connect();
    $measurements = [];
    $query = "SELECT * FROM `measurements` WHERE `id_material` = '$idMaterial' AND `products_id_products` = " . $product->getId();
    $measurementsDB = $this->db->consult($query, "yes");
    foreach ($measurementsDB as  $measurementDB) {
      $measurement = new Measurement();
      $measurement->setId($measurementDB["id_measurements"]);
      $measurement->setLength($measurementDB["lenght"]);
      $measurement->setWidth($measurementDB["width"]);
      $measurement->setcodigo($measurementDB["codigo"]);
      $measurement->setHeight($measurementDB["height"]);
      $measurement->setWindow($measurementDB["window"]);
      $measurement->setLargoUtil($measurementDB["largo_util"]);
      $measurement->setAnchoTotal($measurementDB["ancho_total"]);
      $measurement->setIdMaterial($idMaterial);
      $measurement->setProduct($product->getId());
      $measurement->setVentaMinimaImpresa($measurementDB["venta_minima_impresa"]);
      $measurement->setVentaMinimaGenerica($measurementDB["venta_minima_generica"]);

      // self::$logger->info($query);
      array_push($measurements, $measurement);
    }
    $this->db->close();
    return $measurements;
  }

  public function saveByMaterial($measurement)
  {
    $this->db->connect();
    $query = "INSERT INTO `measurements` (`id_measurements`, `width`, `height`, 
    `lenght`, `products_id_products`, `window`, `id_material`, `codigo` ) 
    VALUES (NULL, '" . $measurement->getWidth() . "', 
    '" . $measurement->getHeight() . "', '" . $measurement->getLength() . "',
     '" . $measurement->getProduct() . "', '" . $measurement->getWindow() . "', '" . $measurement->getIdMaterial() . "', '" . $measurement->getCodigo() ."')"; 
    $status = $this->db->consult($query);
    $this->db->close();
    // self::$logger->info($query);
    return $status;
  }
}
