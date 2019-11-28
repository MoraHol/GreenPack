<?php

include_once  $_SERVER["DOCUMENT_ROOT"] . "/db/env.php";

if($_GET["id"] == $_ENV["id_fondo_auto"]){
    include_once "update_product_fondo.php";
}else{
    include_once "update_product_normal.php";
}