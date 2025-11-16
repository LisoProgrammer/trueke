<?php
require __DIR__ . "/../connection.php";
$id_user = $_SESSION["user"]["id"];
$sql_my_publications = $con->prepare("SELECT p.id_publicacion, u.primer_nombre, u.primer_apellido, p.titulo, p.descripcion, p.imagen, p.fecha, p.hora, p.visualizaciones, (SELECT COUNT(*) FROM solicitado_a s WHERE s.id_publicacion1 = p.id_publicacion) AS num_ofertas FROM publicacion p JOIN usuario u ON u.id = p.id_autor WHERE p.id_autor = ? AND p.oferta != 1 ORDER BY p.id_publicacion DESC;");
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
            "visualizaciones" => $row["visualizaciones"],
            "num_ofertas" => $row["num_ofertas"]
        ];
    }

    echo "<script>";
    print_r("let my_publications = " . json_encode($all_result));
    echo "</script>";
}
