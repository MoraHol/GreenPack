<?php

// Desarrollada por Teenus SAS
if (!headers_sent())
    if (!isset($_SESSION))
        session_start();


if (!isset($_SESSION)) {
    if (!isset($_SESSION["admin"])) {
        header("Location: /admin");
    }
}
