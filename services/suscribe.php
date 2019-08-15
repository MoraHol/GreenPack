<?php
require_once dirname(__DIR__) . "/db/DBOperator.php";
require_once dirname(__DIR__) . "/db/env.php";
if ($_POST["email"]) {
  $db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
  $db->connect();
  $query = "INSERT INTO `suscribers` (`id_suscriber`, `email`) VALUES (NULL, '" . $_POST["email"] . "')";
  $db->consult($query);
  $db->close();
}
