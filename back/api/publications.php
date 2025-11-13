<?php
require __DIR__ . "/../connection.php";
$id_user = $_SESSION["user"]["id"];
//$sql_my_publications = $con->prepare("SELECT `id_publicacion`, usuario.primer_nombre as primer_nombre, usuario.primer_apellido as primer_apellido, `titulo`, `descripcion`, `imagen`, `fecha`, `hora`, `visualizaciones` FROM `publicacion` JOIN usuario ON usuario.id = publicacion.id_autor WHERE id_autor != ? ORDER BY id_publicacion DESC");
$sql_my_publications = $con->prepare("SELECT p.id_publicacion, u.primer_nombre AS primer_nombre, u.primer_apellido AS primer_apellido, p.titulo, p.descripcion, p.imagen, p.fecha, p.hora, p.visualizaciones, CASE WHEN nlg.id_usuario IS NOT NULL THEN 1 ELSE 0 END AS no_le_gusta FROM publicacion p JOIN usuario u ON u.id = p.id_autor LEFT JOIN no_le_gusta nlg ON p.id_publicacion = nlg.id_pub AND nlg.id_usuario = ? WHERE p.id_autor != ? ORDER BY no_le_gusta ASC, p.id_publicacion DESC;");
if ($sql_my_publications) {
    $sql_my_publications->bind_param("ii", $id_user, $id_user);
    $sql_my_publications->execute();
    $result = $sql_my_publications->get_result();
    $all_result = [];
    while ($row = $result->fetch_assoc()) {
        $all_result[] = [
            "id_publicacion" => $row["id_publicacion"],
            "autor" => $row["primer_nombre"] . " " . $row["primer_apellido"],
            "titulo" => $row["titulo"],
            "descripcion" => $row["descripcion"],
            "imagen" => $row["imagen"],
            "fecha" => $row["fecha"],
            "hora" => $row["hora"],
            "visualizaciones" => $row["visualizaciones"]
        ];
    }

    echo "<script>";
    print_r("let publications = " . json_encode($all_result));
    echo "</script>";
}
