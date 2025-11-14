<?php
session_start();
require "../connection.php";
echo "\nAqui se cargaran las estadisticas<br>";
$id_user = $_SESSION["user"]["id"];
echo "id del usuario: ".$id_user;
$sqlget_pendiente = $con->prepare("SELECT count(id_solicitado_a) AS n_filas FROM solicitado_a WHERE id_usuario1 = ?");
if($sqlget_pendiente){
    $sqlget_pendiente->bind_param("i",$id_user);
    $sqlget_pendiente->execute();
    $sqlget_pendiente->bind_result($n_filas);
    $sqlget_pendiente->fetch();
    echo "<br>pendientes:".$n_filas;
    $sqlget_pendiente->close();
}

$sqlget_calificacion = $con->prepare("SELECT calificacion FROM usuario WHERE id = ?");
if($sqlget_calificacion){
    $sqlget_calificacion->bind_param("i",$id_user);
    $sqlget_calificacion->execute();
    $sqlget_calificacion->bind_result($calificacion);
    $sqlget_calificacion->fetch();
    echo "<br>Calificacion:".$calificacion;
    $sqlget_calificacion->close();
}