<?php
session_start();
require '../connection.php';

if (isset($_POST["id_pub"])) {
    $id_user = $_SESSION["user"]["id"];
    $id_pub = intval($_POST["id_pub"]);

    // 1 Obtener la ruta del archivo de imagen
    $sql_get = $con->prepare("SELECT imagen FROM publicacion WHERE id_publicacion = ? AND id_autor = ?");
    $sql_get->bind_param("ii", $id_pub, $id_user);
    $sql_get->execute();
    $result = $sql_get->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filename = $row["imagen"];

        // Ruta completa del archivo
        $file_path = __DIR__ . "/../../assets/samples/" . $filename;

        // 2 Intentar eliminar el archivo si existe
        if (!empty($filename) && file_exists($file_path)) {
            unlink($file_path);
        }

        // 3 Eliminar la publicación de la base de datos
        $sql_delete = $con->prepare("DELETE FROM publicacion WHERE id_publicacion = ? AND id_autor = ?");
        $sql_delete->bind_param("ii", $id_pub, $id_user);
        $sql_delete->execute();

        if ($sql_delete->affected_rows > 0) {
            echo json_encode(["deleted" => true]);
        } else {
            echo json_encode(["deleted" => false, "message" => "db_delete_failed"]);
        }
    } else {
        echo json_encode(["deleted" => false, "message" => "not_found_or_unauthorized"]);
    }
} else {
    echo json_encode(["deleted" => false, "message" => "missing_id_pub"]);
}
?>
