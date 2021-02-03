<?php
/*
* Desarrollada por Teenus SAS
*/
session_start();
if (isset($_SESSION["admin"])) {
    include("dashboard.php");
} else {
    include("login.html");
}
