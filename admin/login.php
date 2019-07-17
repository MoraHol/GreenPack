<?php
/*
* Desarrollada por Alexis Holguin(github: MoraHol)
*/

if (!isset($_SESSION)) {
    header("Location: /admin");
}
if (isset($_POST["email"]) && isset($_POST["pass"])) {
    require dirname(__DIR__) . "/dao/AdminDao.php";
    $adminDao = new AdminDao();
    // $db = new DBOperator($_ENV["db_host"], $_ENV["db_user"], $_ENV["db_name"], $_ENV["db_pass"]);
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $admin = $adminDao->findByEmail($email);
    if (hash("sha256", $password) == $admin->getPassword()) {
        session_start();
        $_SESSION["admin"] = serialize($admin);
        var_dump($_SESSION);
        header("Location: /admin");
        echo "<script>location.reload()</script>";
    }
}
