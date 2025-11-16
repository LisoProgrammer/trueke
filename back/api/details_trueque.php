<?php
require __DIR__ ."/../connection.php";
if(isset($_GET["id_pub"])){
    $id_user = $_SESSION["user"]["id"];
    $id_publication = intval($_GET["id_pub"]);
    $sql_get_publication = $con->prepare("SELECT `id_publicacion`, u.primer_nombre, u.primer_apellido, `titulo`, `descripcion`, `servicio`, `imagen`, `fecha`, `hora`, `visualizaciones`, `oferta` FROM `publicacion` JOIN usuario u ON publicacion.id_autor = u.id WHERE id_autor = ? AND id_publicacion = ?");
    if($sql_get_publication){
        $sql_get_publication->bind_param("ii",$id_user,$id_publication);
        $sql_get_publication->execute();
        $result = $sql_get_publication->get_result();
        $response = $result->fetch_assoc();
        echo "<script>";
        echo "let my_publication = " . json_encode($response);
        echo "</script>";
        $sql_get_publication->close();
    }
    $sql_get_publications_offers = $con->prepare("SELECT p.id_publicacion, u.primer_nombre, u.primer_apellido, p.titulo, p.descripcion, p.servicio, p.imagen, p.fecha, p.hora, p.visualizaciones, p.oferta FROM solicitado_a s JOIN publicacion p ON p.id_publicacion = s.id_publicacion2 JOIN usuario u ON u.id = p.id_autor WHERE s.id_publicacion1 = ? AND p.oferta = 1 ORDER BY p.id_publicacion DESC;");
    if($sql_get_publications_offers){
        $sql_get_publications_offers->bind_param("i",$id_publication);
        $sql_get_publications_offers->execute();
        $result = $sql_get_publications_offers->get_result();
        $response = [];
        while($row = $result->fetch_assoc()){
            $response[] = [
                "id_publicacion" => $row["id_publicacion"],
                "primer_nombre" => $row["primer_nombre"],
                "primer_apellido" => $row["primer_apellido"],
                "titulo" => $row["titulo"],
                "descripcion" => $row["descripcion"],
                "imagen" => $row["imagen"],
                "fecha" => $row["fecha"],
                "hora" => $row["hora"],
                "servicio" => $row["servicio"]
            ];
        }
        echo "<script>";
        echo "let offers = " . json_encode($response);
        echo "</script>";
        $sql_get_publications_offers->close();
    }
}