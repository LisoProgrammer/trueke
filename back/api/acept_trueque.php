<?php
require __DIR__ . "/../connection.php";
if (isset($_POST["id_pub1"]) && isset($_POST["id_pub2"])) {
    $id_pub1 = intval($_POST["id_pub1"]);
    $id_pub2 = intval($_POST["id_pub2"]);
    $sql_insert_trueke = $con->prepare("INSERT INTO `trueke`(`id_pub1`, `id_pub2`, `pendiente`, `cancelado`, `hecho`) VALUES (?, ?, 1, 0, 0)");
    if ($sql_insert_trueke) {
        try {
            $sql_insert_trueke->bind_param("ii", $id_pub1, $id_pub2);
            $sql_insert_trueke->execute();
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            if ($sql_insert_trueke->insert_id > -1) {
                print_r(json_encode(["accepted_trueke" => true, "id_pub1" => $id_pub1, "id_pub2" => $id_pub2]));
            }
        } catch (Exception $e) {
            print_r(json_encode(["accepted_trueke" => false, "id_pub1" => $id_pub1, "id_pub2" => $id_pub2]));
        }
    }
}
