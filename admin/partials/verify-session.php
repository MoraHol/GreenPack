<?php

// Desarrollada por Teenus SAS
if (headers_sent()) {
    echo "Oh no!";
}
if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["admin"])) {
        header("Location: /admin");
    }
}
