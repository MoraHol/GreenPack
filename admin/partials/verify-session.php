<?php

// Desarrollada por Teenus SAS

if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION["admin"])) {
        header("Location: /admin");
    }
}
