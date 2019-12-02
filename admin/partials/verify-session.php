
<?php
/*
*Desarrollada por Alexis Holguin(github: MoraHol)
*/
header("Content-Type: text/html; charset=utf-8");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION["admin"])) {
        header("Location: /admin");
    }
}