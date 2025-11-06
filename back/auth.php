<?php
session_start();
$correo = $_POST["correo"] ?? "";
$password = $_POST["pass"] ?? "";
//Si la contraseña es correcta
if(true){
    $_SESSION["user"] = ["id" => 0, "nombre" => "Juan", "correo" => $_POST["correo"], "pass" => $_POST["pass"]];
    header("Location: /trueke/front/views/dashboard.php");
    exit;
}