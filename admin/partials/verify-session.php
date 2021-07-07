<?php
session_start();

if (!isset($_SESSION)) {
    if (!isset($_SESSION["admin"])) {
        header("Location: /admin");
    }
}
