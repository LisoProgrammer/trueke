<?php
require __DIR__ . "/../connection.php";
$id_user = $_SESSION["user"]["id"];
$sql_my_publications = $con->prepare("SELECT `id_publicacion`, usuario.primer_nombre as primer_nombre, usuario.primer_apellido as primer_apellido, `titulo`, `descripcion`, `imagen`, `fecha`, `hora`, `visualizaciones` FROM `publicacion` JOIN usuario ON usuario.id = publicacion.id_autor WHERE id_autor = ? AND oferta != 1 ORDER BY id_publicacion DESC");
if ($sql_my_publications) {
    $sql_my_publications->bind_param("i", $id_user);
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
    print_r("let my_publications = " . json_encode($all_result));
    echo "</script>";
}
