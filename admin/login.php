<?php
require_once dirname(__DIR__) . "/db/env.php";
/*
* Desarrollada por Alexis Holguin(github: MoraHol)
*/
if (!isset($_SESSION)) {
    header("Location: /admin");
}
if (isset($_POST["email"]) && isset($_POST["pass"])) {
    require dirname(__DIR__) . "/db/DBOperator.php";
    $db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $user_db = $db->consult("SELECT * FROM `admins` WHERE email = '$email' LIMIT 1", "yes");
    $user_db = $user_db[0];
    if (hash("sha256", $password) == $user_db["password"]) {
        session_start();
        $user = new stdClass();
        $user->email = $email;
        $user->password = $password;
        $_SESSION["admin"] = serialize($user);
        header("Location: /admin");
        echo "<script>location.reload()</script>";
    }
}
