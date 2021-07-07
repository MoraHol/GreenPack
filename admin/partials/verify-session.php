<?php

if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

//session_start();

if (!isset($_SESSION)) {
    if (!isset($_SESSION["admin"])) {
        header("Location: /admin");
    }
}
