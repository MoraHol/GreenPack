<?php

// Desarrollada por Teenus SAS
session_start();
if (!isset($_SESSION["admin"]))
    header("Location: /admin");
