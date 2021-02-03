<?php
/*
* Desarrollada por Teenus SAS
*/
if (isset($_POST["logout"])) {
  if ($_POST["logout"] == "true") {
    session_start();
    session_unset();
    session_destroy();
    header("Location: /admin");
  }
}
