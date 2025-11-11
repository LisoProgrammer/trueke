<?php
require "../connecion.php";
if(isset($_GET["buscar"])){
    $sql_busqueda=$con->prepare("SELECT `id_publicacion`, `id_autor`, `titulo`, `descripcion`, `imagen`, `fecha`, `hora`, `visualizaciones` FROM `publicacion` WHERE titulo=? ");
    if($sql_busqueda){
        $sql_busqueda->bind_parem("s",$_GET["buscar"]);
        $sql_busqueda->execute();
        $result=$sql_busqueda->get_result();
        $all_result=[];
        while($row=$result->fetch_assoc()){

            $all_result[$row["id_publicacion"]]=[
                "id_autor"=>$row["id_autor"],
                "titulo"=>$row["titulo"],
                "descripcion"=>$row["descripcion"],
                "imagen"=>$row["imagen"],
                "fecha"=>$row["fecha"],
                "hora "=>$row["hora"],
                "visualizaciones"=>$row["visualizaciones"]
            ];
        }
        print_r(all_result);
    }
        
}
