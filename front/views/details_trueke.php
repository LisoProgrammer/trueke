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
    <title>TRUEKE | Ofertas de trueque</title>
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
        <h2>Tu publicación</h2>
        <div class="publication">
            <div class="img">
                <img src="/trueke/assets/samples/juego.png" alt="">
            </div>
            <div class="content">
                <div class="info_container">
                    <div class="flex">
                        <span class="flex info_bag my_pub">
                            <img src="/trueke/assets/icons/globe.png" alt="">
                            <span>Tu publicación</span>
                        </span>
                        <span>Tipo</span>
                        <span class="flex info_bag article">
                            <img src="/trueke/assets/icons/book.png" alt="">
                            <span>Artículo</span>
                        </span>
                    </div>
                    <span>Hoy, a las 9:30 AM</span>
                </div>
                <div class="flex">
                    <div class="flex">
                        <img src="/trueke/assets/icons/arrow_right_z.png" alt="">
                        <span><b>Lisandro Zapata</b></span>
                    </div>
                    <button class="flex delete">
                        <img src="/trueke/assets/icons/delete.png" alt="">
                        <span>
                            Eliminar publicación
                        </span>
                    </button>
                </div>
                <div>
                    <h2>Cambio una calculadora por cualquier cosa.</h2>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam nam omnis nobis eveniet quisquam quod ad voluptatum, reiciendis, odit repudiandae eaque sapiente consectetur, perspiciatis molestias dolorum quasi aliquam? Optio, qui.</span>
                </div>
            </div>
        </div>
        <h2>Ofertas de trueque</h2>
        <div class="publication oferta">
            <div class="img">
                <img src="/trueke/assets/samples/juego.png" alt="">
            </div>
            <div class="content">
                <div class="info_container">
                    <div class="flex">
                        <span class="flex info_bag oferta">
                            <img src="/trueke/assets/icons/gift.png" alt="">
                            <span>Oferta</span>
                        </span>
                        <span>Tipo</span>
                        <span class="flex info_bag servicio">
                            <img src="/trueke/assets/icons/agree.png" alt="">
                            <span>Servicio</span>
                        </span>
                    </div>
                    <span>Hoy, a las 9:30 AM</span>
                </div>
                <div class="flex">
                    <div class="flex">
                        <img src="/trueke/assets/icons/arrow_right_z.png" alt="">
                        <span><b>Lisandro Zapata</b></span>
                    </div>
                    <button class="flex primary-button accept_trueke">
                        <img src="/trueke/assets/icons/check.png" alt="">
                        <span>
                            Aceptar trueque
                        </span>
                    </button>
                </div>
                <div>
                    <h2>Cambio una calculadora por cualquier cosa.</h2>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam nam omnis nobis eveniet quisquam quod ad voluptatum, reiciendis, odit repudiandae eaque sapiente consectetur, perspiciatis molestias dolorum quasi aliquam? Optio, qui.</span>
                </div>
            </div>
        </div>
        <div class="publication oferta">
            <div class="img">
                <img src="/trueke/assets/samples/bata.png" alt="">
            </div>
            <div class="content">
                <div class="info_container">
                    <div class="flex">
                        <span class="flex info_bag oferta">
                            <img src="/trueke/assets/icons/gift.png" alt="">
                            <span>Oferta</span>
                        </span>
                        <span>Tipo</span>
                        <span class="flex info_bag servicio">
                            <img src="/trueke/assets/icons/agree.png" alt="">
                            <span>Servicio</span>
                        </span>
                    </div>
                    <span>Hoy, a las 9:30 AM</span>
                </div>
                <div class="flex">
                    <div class="flex">
                        <img src="/trueke/assets/icons/arrow_right_z.png" alt="">
                        <span><b>Lisandro Zapata</b></span>
                    </div>
                    <button class="flex primary-button accept_trueke">
                        <img src="/trueke/assets/icons/check.png" alt="">
                        <span>
                            Aceptar trueque
                        </span>
                    </button>
                </div>
                <div>
                    <h2>Cambio una calculadora por cualquier cosa.</h2>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam nam omnis nobis eveniet quisquam quod ad voluptatum, reiciendis, odit repudiandae eaque sapiente consectetur, perspiciatis molestias dolorum quasi aliquam? Optio, qui.</span>
                </div>
            </div>
        </div>
        <div class="publication oferta">
            <div class="img">
                <img src="/trueke/assets/samples/4335.jpg" alt="">
            </div>
            <div class="content">
                <div class="info_container">
                    <div class="flex">
                        <span class="flex info_bag oferta">
                            <img src="/trueke/assets/icons/gift.png" alt="">
                            <span>Oferta</span>
                        </span>
                        <span>Tipo</span>
                        <span class="flex info_bag servicio">
                            <img src="/trueke/assets/icons/agree.png" alt="">
                            <span>Servicio</span>
                        </span>
                    </div>
                    <span>Hoy, a las 9:30 AM</span>
                </div>
                <div class="flex">
                    <div class="flex">
                        <img src="/trueke/assets/icons/arrow_right_z.png" alt="">
                        <span><b>Lisandro Zapata</b></span>
                    </div>
                    <button class="flex primary-button accept_trueke">
                        <img src="/trueke/assets/icons/check.png" alt="">
                        <span>
                            Aceptar trueque
                        </span>
                    </button>
                </div>
                <div>
                    <h2>Cambio una calculadora por cualquier cosa.</h2>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam nam omnis nobis eveniet quisquam quod ad voluptatum, reiciendis, odit repudiandae eaque sapiente consectetur, perspiciatis molestias dolorum quasi aliquam? Optio, qui.</span>
                </div>
            </div>
        </div>
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