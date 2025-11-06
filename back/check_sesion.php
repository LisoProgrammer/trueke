<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location: /trueke/front/login.php");
    //echo "El usuario no se ha autenticado";
}