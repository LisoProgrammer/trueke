<?php
session_start();
require '../connection.php';

if (isset($_POST["id_pub"])) {
    $id_user = $_SESSION["user"]["id"];
    $id_pub = intval($_POST["id_pub"]);

    // 1 Verificar si ya existe el dislike
    $sql_check = $con->prepare("SELECT 1 FROM no_le_gusta WHERE id_usuario = ? AND id_pub = ?");
    $sql_check->bind_param("ii", $id_user, $id_pub);
    $sql_check->execute();
    $result_check = $sql_check->get_result();

    if ($result_check->num_rows > 0) {
        // Ya existe el dislike
        echo json_encode(["inserted_dislike" => false, "message" => "already_exists"]);
    } else {
        // 2 Insertar el dislike
        $sql_insert = $con->prepare("INSERT INTO no_le_gusta (id_usuario, id_pub) VALUES (?, ?)");
        if ($sql_insert) {
            $sql_insert->bind_param("ii", $id_user, $id_pub);
            $sql_insert->execute();

            if ($sql_insert->affected_rows > 0) {
                echo json_encode(["inserted_dislike" => true]);
            } else {
                echo json_encode(["inserted_dislike" => false]);
            }
        }
    }
}
?>
