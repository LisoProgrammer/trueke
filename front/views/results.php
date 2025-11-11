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
        require __DIR__."/../../api/results.php";
        ?>
        <h2>Resultados encontrados para "<?php echo $_GET["buscar"] ?>" (50) </h2>
    </main>    

</body>
</html>