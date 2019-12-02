<?php
/*
*Desarrollada por Alexis Holguin(github: MoraHol)
*/
if (session_status() == PHP_SESSION_NONE) {
    if (!isset($_SESSION["admin"])) {
        header("Location: /admin");
    }
}