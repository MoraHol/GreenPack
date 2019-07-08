
<?php
/*
*Desarrollada por Alexis Holguin(github: MoraHol)
*/
if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["admin"])) {
        header("Location: /admin");
    }
}