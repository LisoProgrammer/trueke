<?php
require __DIR__ . "/../connection.php";

if (isset($_POST["id_pub"])) {
    $id_pub = intval($_POST["id_pub"]);
    $sql_update_views = $con->prepare("UPDATE publicacion SET visualizaciones = visualizaciones + 1 WHERE id_publicacion = ?");
    
    if ($sql_update_views) {
        $sql_update_views->bind_param("i", $id_pub);
        $sql_update_views->execute();

        if ($sql_update_views->affected_rows > 0) {
            echo "Visualización actualizada correctamente";
        } else {
            echo "No se encontró la publicación o no se actualizó.";
        }

        $sql_update_views->close();
    } else {
        echo "Error al preparar la consulta.";
    }
}
