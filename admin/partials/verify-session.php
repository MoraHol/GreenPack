<?php

// Desarrollada por Teenus SAS

if (!isset($_SESSION)) {
    if (headers_sent())
        echo "Oh no!";
    else
        session_start();
    if (!isset($_SESSION["admin"])) {
        header("Location: /admin");
    }
}
