<?php
/*
* Desarrollada por Alexis Holguin(github: MoraHol)
*/
session_start();
if (isset($_SESSION["admin"])) {
    include("dashboard.php");
} else {
    include("login.html");
}
