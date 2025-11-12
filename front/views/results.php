<?php
require __DIR__."/../../back/check_sesion.php";
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
        <?php
        require __DIR__."/../../back/api/results.php";
        $buscar = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
        $string_output = "";
        // Usa mb_ para soportar acentos/ñ
        $max = 22;
        if (mb_strlen($buscar, 'UTF-8') > $max) {
            // Cortamos y escapamos para evitar XSS
            $trunc = mb_substr($buscar, 0, $max, 'UTF-8');
            $string_output = htmlspecialchars($trunc, ENT_QUOTES, 'UTF-8') . '...';
        } else {
            $string_output = htmlspecialchars($buscar, ENT_QUOTES, 'UTF-8');
        }
        ?>
        <h2>Resultados encontrados para "<?php echo $string_output ?>" (<span id="n_results"></span>) </h2>
        <div class="grid_layout_cards" id="container_publications">
            
        </div>
        <?php
        include "modules/ventana_solicitar_trueque.php";
        ?>
        </main>   
    <script src="/trueke/front/js/cards.js"></script> 
    <script src="/trueke/front/js/load_results.js"></script>
</body>
</html>