<?php
require __DIR__ . "/../../back/check_sesion.php";
$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="/trueke/assets/css/solicitar_trueque.css?v=3">
    <title>TRUEKE | Dashboard</title>
    <style>
        h1,
        h2,
        h3 {
            color: #000;
        }
    </style>
</head>

<body>
    <?php
    include "../../setting.php";
    include "modules/ventana_new_publication.php";
    include "modules/header.php";
    ?>
    <main>
        <h2>Ofertas de trueque</h2>
    </main>
    <?php 
    //include __DIR__ . '/modules/ventana_solicitar_trueque.php'; 
    //include __DIR__ . "/../../back/api/my_publications.php";
    //include __DIR__ . "/../../back/api/publications.php";
    include "../events.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/trueke/front/js/cards.js"></script>
    <script src="/trueke/front/js/load_publications.js"></script>
</body>

</html>