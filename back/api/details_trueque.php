<?php
require __DIR__ . "/../connection.php";
if (isset($_GET["id_pub"])) {
    $id_user = $_SESSION["user"]["id"];
    $id_publication = intval($_GET["id_pub"]);
    //obtener ID de la publicacion oferta y el correo institucional solo si ya se hizo la aceptación del trueque
    $sql_id_pub2 = $con->prepare("SELECT t.id_pub2, t.hecho, u.correo_institucional FROM trueke t JOIN publicacion p ON t.id_pub2 = p.id_publicacion JOIN usuario u ON u.id = p.id_autor WHERE t.id_pub1 = ? LIMIT 1");
    if ($sql_id_pub2) {

        $sql_id_pub2->bind_param("i", $id_publication);
        $sql_id_pub2->execute();
        $result = $sql_id_pub2->get_result();
        $row = $result->fetch_assoc();

        // Valores por defecto
        $id_pub2 = "null";                  // JavaScript null
        $correo_institucional = "''";       // JS string vacío
        $trueke_hecho = isset($row["hecho"]) ? intval($row["hecho"]) : 0;
        if ($row) {
            // Si existe fila en trueke
            $id_pub2 = $row["id_pub2"] !== null ? $row["id_pub2"] : "null";
            // Asegurar que el correo se imprima como string JS
            $correo_institucional = $row["correo_institucional"] ? ("'" . $row["correo_institucional"] . "'") : "''";
        }

        echo "\n<script>";
        echo "let id_pub2 = $id_pub2;";
        echo "let correo_institucional = $correo_institucional;";
        echo "let trueke_hecho = $trueke_hecho;";
        echo "</script>\n";

        $sql_id_pub2->close();
    }


    $sql_get_publication = $con->prepare("SELECT `id_publicacion`, u.primer_nombre, u.primer_apellido, `titulo`, `descripcion`, `servicio`, `imagen`, `fecha`, `hora`, `visualizaciones`, `oferta` FROM `publicacion` JOIN usuario u ON publicacion.id_autor = u.id WHERE id_autor = ? AND id_publicacion = ?");
    if ($sql_get_publication) {
        $sql_get_publication->bind_param("ii", $id_user, $id_publication);
        $sql_get_publication->execute();
        $result = $sql_get_publication->get_result();
        $response = $result->fetch_assoc();
        echo "<script>";
        echo "let my_publication = " . json_encode($response);
        echo "</script>";
        $sql_get_publication->close();
    }

    $sql_get_publications_offers = $con->prepare("SELECT p.id_publicacion, u.primer_nombre, u.primer_apellido, p.titulo, p.descripcion, p.servicio, p.imagen, p.fecha, p.hora, p.visualizaciones, p.oferta FROM solicitado_a s JOIN publicacion p ON p.id_publicacion = s.id_publicacion2 JOIN usuario u ON u.id = p.id_autor WHERE s.id_publicacion1 = ? AND p.oferta = 1 ORDER BY p.id_publicacion DESC;");
    if ($sql_get_publications_offers) {
        $sql_get_publications_offers->bind_param("i", $id_publication);
        $sql_get_publications_offers->execute();
        $result = $sql_get_publications_offers->get_result();
        $response = [];
        while ($row = $result->fetch_assoc()) {
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
