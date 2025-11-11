<?php
require __DIR__."/../connection.php";
if(isset($_GET["buscar"])){
    $sql_busqueda=$con->prepare("SELECT `id_publicacion`, `id_autor`, `titulo`, `descripcion`, `imagen`, `fecha`, `hora`, `visualizaciones` FROM `publicacion` WHERE titulo LIKE CONCAT('%',?,'%') OR descripcion LIKE CONCAT('%',?,'%') ORDER BY id_publicacion DESC");
    if($sql_busqueda){
        $sql_busqueda->bind_param("ss",$_GET["buscar"],$_GET["buscar"]);
        $sql_busqueda->execute();
        $result=$sql_busqueda->get_result();
        $all_result=[];
        while($row=$result->fetch_assoc()){

            $all_result[$row["id_publicacion"]] = [
                "id_autor" => $row["id_autor"],
                "titulo" => $row["titulo"],
                "descripcion" => $row["descripcion"],
                "imagen" => $row["imagen"],
                "fecha" => $row["fecha"],
                "hora " => $row["hora"],
                "visualizaciones" => $row["visualizaciones"]
            ];
        }
        echo "<script>";
        print_r("let results = ".json_encode($all_result));
        echo "</script>";
    }
        
}
