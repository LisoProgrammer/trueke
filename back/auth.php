<?php
session_start();
require "connection.php";
if (isset($_POST["correo"])) {
    $correo = filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["pass"];
    $sql_get_hash = $con->prepare("SELECT id, primer_nombre, primer_apellido, hash_contrasena FROM usuario WHERE correo_institucional = ?");
    if ($sql_get_hash) {
        $sql_get_hash->bind_param("s", $correo);
        $sql_get_hash->execute();
        $result = $sql_get_hash->get_result();
        $assoc_user = $result->fetch_assoc();
        print_r($assoc_user);
        if (password_verify($password, $assoc_user["hash_contrasena"])) {
            echo "Contraseña correcta";
            $_SESSION["user"] = ["id" => $assoc_user["id"], "primer_nombre" => $assoc_user["primer_nombre"], "correo" => $correo];
            header("Location: /trueke/front/views/dashboard.php");
        } else {
            echo "Contraseña errada";
            header("Location: /trueke/front/login.php?code_msg=210");
        }
    }
}