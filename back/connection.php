<?php
$server_db = "localhost";
$user_db = "root";
$pass_db = "";
$database_name = "trueke";
$con = new mysqli($server_db, $user_db, $pass_db, $database_name);
if($con->connect_error){
    die("Error en la conexión de la base de datos");
}
?>