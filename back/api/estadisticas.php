<?php
require __DIR__."/../connection.php";
$id_user = $_SESSION["user"]["id"];
#echo "id del usuario: ".$id_user;

$respuesta = [
    "pendientes" => 0, 
    "calificacion" => 0,
    "views" => 0,
    "truekes_hechos" => 0
]; 

$sqlget_pendiente = $con->prepare("SELECT count(id_solicitado_a) AS n_filas FROM solicitado_a WHERE id_usuario1 = ?");
if($sqlget_pendiente){
    $sqlget_pendiente->bind_param("i",$id_user);
    $sqlget_pendiente->execute();
    $sqlget_pendiente->bind_result($n_filas);
    $sqlget_pendiente->fetch();
    #echo "<br>pendientes:".$n_filas;
    $respuesta["pendientes"] = $n_filas;
    $sqlget_pendiente->close();
}

$sqlget_calificacion = $con->prepare("SELECT calificacion FROM usuario WHERE id = ?");
if($sqlget_calificacion){
    $sqlget_calificacion->bind_param("i",$id_user);
    $sqlget_calificacion->execute();
    $sqlget_calificacion->bind_result($calificacion);
    $sqlget_calificacion->fetch();
    #echo "<br>Calificacion:".$calificacion;
    $respuesta["calificacion"] = $calificacion;
    $sqlget_calificacion->close();
}

$sqlget_view = $con->prepare("SELECT sum(visualizaciones) AS views FROM publicacion WHERE id_autor = ?");
if($sqlget_view){
    $sqlget_view->bind_param("i",$id_user);
    $sqlget_view->execute();
    $sqlget_view->bind_result($view);
    $sqlget_view->fetch();
    #echo "<br>View:".$view;
    $respuesta["views"] = $view;
    $sqlget_view->close();
}

$sqlget_hechos = $con->prepare("SELECT count(hecho) AS hechos FROM trueke WHERE id_usuario = ?");
if($sqlget_hechos){
    $sqlget_hechos->bind_param("i",$id_user);
    $sqlget_hechos->execute();
    $sqlget_hechos->bind_result($hechos);
    $sqlget_hechos->fetch();
    #echo "<br>Hechos:".$hechos;
    $respuesta["truekes_hechos"] = $hechos;
    $sqlget_hechos->close();
}

echo "<script>";
print_r("let estadisticas = ".json_encode($respuesta));
echo "</script>";