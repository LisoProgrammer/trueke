<?php
require __DIR__ . "/../connection.php";
if (isset($_GET["buscar"])) {
    $sql_busqueda = $con->prepare("SELECT `id_publicacion`, usuario.primer_nombre as primer_nombre, usuario.primer_apellido as primer_apellido, `titulo`, `descripcion`, `imagen`, `fecha`, `hora`, `visualizaciones` FROM `publicacion` JOIN usuario ON usuario.id = publicacion.id_autor WHERE LOWER(titulo) LIKE CONCAT('%',?,'%') OR LOWER(descripcion) LIKE CONCAT('%',?,'%') ORDER BY id_publicacion DESC");
    if ($sql_busqueda) {
        $input_lower = strtolower($_GET["buscar"]);
        $sql_busqueda->bind_param("ss", $input_lower, $input_lower);
        $sql_busqueda->execute();
        $result = $sql_busqueda->get_result();
        $all_result = [];
        while ($row = $result->fetch_assoc()) {

            $all_result[$row["id_publicacion"]] = [
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
        print_r("let results = " . json_encode($all_result));
        echo "</script>";
    }
}
