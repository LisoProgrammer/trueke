<?php
require __DIR__."/../../back/check_sesion.php";
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
    include "modules/header.php";
    ?>
    <main>
        <h2>¡Hola Lisandro!, tienes 1 solicitud(es) de trueque</h2>
        <div class="div-group">
            <div class="card_dash green">
                <div>
                    <span>1</span>
                    <span><img src="/trueke/assets/icons/clip.png" alt=""></span>
                </div>
                <span>Pendientes</span>
            </div>
            <div class="card_dash red">
                <div>
                    <span>1</span>
                    <span><img src="/trueke/assets/icons/info.png" alt=""></span>
                </div>
                <span>Cancelados</span>
            </div>
            <div class="card_dash yellow">
                <div>
                    <span>4.5</span>
                    <span><img src="/trueke/assets/icons/star.png" alt=""></span>
                </div>
                <span>Tu calificación</span>
            </div>
            <div class="card_dash blue">
                <div>
                    <span>5</span>
                    <span><img src="/trueke/assets/icons/trending.png" alt=""></span>
                </div>
                <span>Trueques hechos</span>
            </div>
        </div>
        <h2>Tus publicaciones</h2>

        <div class="layout-move-items">
            <!-- Botón izquierda -->
            <button class="btn-move prev">
                <img src="/trueke/assets/icons/left.png" alt="">
            </button>

            <!-- Contenedor de tarjetas -->
            <div class="cards-wrapper">
                <div class="card_item">
                    <div class="flex">
                        <div class="flex">
                            <img src="/trueke/assets/icons/arrow_right.png" alt="">
                            <div class="flex column">
                                <span>Lisandro Z...</span>
                                <span>Hace 3 minutos</span>
                            </div>
                        </div>

                        <div class="flex"> 
                            <span><img src="/trueke/assets/icons/view.png" alt="" class="s"></span>
                            <span>8</span>
                        </div>
                    </div>

                    <div class="img">
                        <img src="/trueke/assets/samples/4335.jpg" alt="">
                    </div>

                    <div class="flex tools">
                        <button class="flex delete">
                            <img src="/trueke/assets/icons/delete.png" alt="">
                            <span>
                               Eliminar publicación 
                            </span>
                        </button>
                        <button>
                            <span class="num_buble">1</span>
                            <img src="/trueke/assets/icons/gift.png" alt="">
                        </button>
                    </div>
                </div>
                <div class="card_item">
                    <div class="flex">
                        <div class="flex">
                            <img src="/trueke/assets/icons/arrow_right.png" alt="">
                            <div class="flex column">
                                <span>Lisandro Z...</span>
                                <span>Hace 3 minutos</span>
                            </div>
                        </div>

                        <div class="flex"> 
                            <span><img src="/trueke/assets/icons/view.png" alt="" class="s"></span>
                            <span>8</span>
                        </div>
                    </div>

                    <div class="img">
                        <img src="/trueke/assets/samples/4335.jpg" alt="">
                    </div>

                    <div class="flex tools">
                        <button class="flex delete">
                            <img src="/trueke/assets/icons/delete.png" alt="">
                            <span>
                               Eliminar publicación 
                            </span>
                        </button>
                        <button>
                            <span class="num_buble">1</span>
                            <img src="/trueke/assets/icons/gift.png" alt="">
                        </button>
                    </div>
                </div>
                <div class="card_item">
                    <div class="flex">
                        <div class="flex">
                            <img src="/trueke/assets/icons/arrow_right.png" alt="">
                            <div class="flex column">
                                <span>Lisandro Z...</span>
                                <span>Hace 3 minutos</span>
                            </div>
                        </div>

                        <div class="flex"> 
                            <span><img src="/trueke/assets/icons/view.png" alt="" class="s"></span>
                            <span>8</span>
                        </div>
                    </div>

                    <div class="img">
                        <img src="/trueke/assets/samples/4335.jpg" alt="">
                    </div>

                    <div class="flex tools">
                        <button class="flex delete">
                            <img src="/trueke/assets/icons/delete.png" alt="">
                            <span>
                               Eliminar publicación 
                            </span>
                        </button>
                        <button>
                            <span class="num_buble">1</span>
                            <img src="/trueke/assets/icons/gift.png" alt="">
                        </button>
                    </div>
                </div>

                <div class="card_item">
                    <div class="flex">
                        <div class="flex">
                            <img src="/trueke/assets/icons/arrow_right.png" alt="">
                            <div class="flex column">
                                <span>Lisandro Z...</span>
                                <span>Hace 3 minutos</span>
                            </div>
                        </div>

                        <div class="flex"> 
                            <span><img src="/trueke/assets/icons/view.png" alt="" class="s"></span>
                            <span>8</span>
                        </div>
                    </div>

                    <div class="img">
                        <img src="/trueke/assets/samples/4335.jpg" alt="">
                    </div>

                    <div class="flex tools">
                        <button class="flex delete">
                            <img src="/trueke/assets/icons/delete.png" alt="">
                            <span>
                               Eliminar publicación 
                            </span>
                        </button>
                        <button>
                            <span class="num_buble">1</span>
                            <img src="/trueke/assets/icons/gift.png" alt="">
                        </button>
                    </div>
                </div>
            </div>

            <!-- Botón derecha -->
            <button class="btn-move next">
                <img src="/trueke/assets/icons/right.png" alt="">
            </button>
        </div>
        <h2>Sugerencias para tí</h2>
        <div class="grid_layout_cards">
            <div class="card_item">
                <div class="flex">
                    <div class="flex">
                        <img src="/trueke/assets/icons/arrow_right.png" alt="">
                        <div class="flex column">
                            <span>Lisandro Z...</span>
                            <span>Hace 3 minutos</span>
                        </div>
                    </div>

                <div class="flex">
                <span><img src="/trueke/assets/icons/view.png" alt="" class="s"></span>
                <span>8</span>
            </div>
                </div>

                <div class="img">
                    <img src="/trueke/assets/samples/4335.jpg" alt="">
                </div>
                <div class="flex tools">
                    <button class="flex center primary-button">
                        <img src="/trueke/assets/icons/trueque.png" alt="">
                        <span>Solicitar trueque</span>
                    </button>
                    <button>
                        <img src="/trueke/assets/icons/dislike.png" alt="">
                    </button>
                </div>
            </div>
            <div class="card_item">
                <div class="flex">
                    <div class="flex">
                        <img src="/trueke/assets/icons/arrow_right.png" alt="">
                        <div class="flex column">
                            <span>Lisandro Z...</span>
                            <span>Hace 3 minutos</span>
                        </div>
                    </div>

                <div class="flex">
                <span><img src="/trueke/assets/icons/view.png" alt="" class="s"></span>
                <span>8</span>
            </div>
                </div>

                <div class="img">
                    <img src="/trueke/assets/samples/4335.jpg" alt="">
                </div>
                <div class="flex tools">
                    <button class="flex center primary-button">
                        <img src="/trueke/assets/icons/trueque.png" alt="">
                        <span>Solicitar trueque</span>
                    </button>
                    <button>
                        <img src="/trueke/assets/icons/dislike.png" alt="">
                    </button>
                </div>
            </div>
            <div class="card_item">
                <div class="flex">
                    <div class="flex">
                        <img src="/trueke/assets/icons/arrow_right.png" alt="">
                        <div class="flex column">
                            <span>Lisandro Z...</span>
                            <span>Hace 3 minutos</span>
                        </div>
                    </div>

                <div class="flex">
                <span><img src="/trueke/assets/icons/view.png" alt="" class="s"></span>
                <span>8</span>
            </div>
                </div>

                <div class="img">
                    <img src="/trueke/assets/samples/4335.jpg" alt="">
                </div>
                <div class="flex tools">
                    <button class="flex center primary-button">
                        <img src="/trueke/assets/icons/trueque.png" alt="">
                        <span>Solicitar trueque</span>
                    </button>
                    <button>
                        <img src="/trueke/assets/icons/dislike.png" alt="">
                    </button>
                </div>
            </div>
            <div class="card_item">
                <div class="flex">
                    <div class="flex">
                        <img src="/trueke/assets/icons/arrow_right.png" alt="">
                        <div class="flex column">
                            <span>Lisandro Z...</span>
                            <span>Hace 3 minutos</span>
                        </div>
                    </div>

                <div class="flex">
                <span><img src="/trueke/assets/icons/view.png" alt="" class="s"></span>
                <span>8</span>
            </div>
                </div>

                <div class="img">
                    <img src="/trueke/assets/samples/4335.jpg" alt="">
                </div>
                <div class="flex tools">
                    <button class="flex center primary-button">
                        <img src="/trueke/assets/icons/trueque.png" alt="">
                        <span>Solicitar trueque</span>
                    </button>
                    <button>
                        <img src="/trueke/assets/icons/dislike.png" alt="">
                    </button>
                </div>
            </div>
            <div class="card_item">
                <div class="flex">
                    <div class="flex">
                        <img src="/trueke/assets/icons/arrow_right.png" alt="">
                        <div class="flex column">
                            <span>Lisandro Z...</span>
                            <span>Hace 3 minutos</span>
                        </div>
                    </div>

                <div class="flex">
                <span><img src="/trueke/assets/icons/view.png" alt="" class="s"></span>
                <span>8</span>
            </div>
                </div>

                <div class="img">
                    <img src="/trueke/assets/samples/4335.jpg" alt="">
                </div>
                <div class="flex tools">
                    <button class="flex center primary-button">
                        <img src="/trueke/assets/icons/trueque.png" alt="">
                        <span>Solicitar trueque</span>
                    </button>
                    <button>
                        <img src="/trueke/assets/icons/dislike.png" alt="">
                    </button>
                </div>
            </div>
            <div class="card_item">
                <div class="flex">
                    <div class="flex">
                        <img src="/trueke/assets/icons/arrow_right.png" alt="">
                        <div class="flex column">
                            <span>Lisandro Z...</span>
                            <span>Hace 3 minutos</span>
                        </div>
                    </div>

                <div class="flex">
                <span><img src="/trueke/assets/icons/view.png" alt="" class="s"></span>
                <span>8</span>
            </div>
                </div>

                <div class="img">
                    <img src="/trueke/assets/samples/4335.jpg" alt="">
                </div>
                <div class="flex tools">
                    <button class="flex center primary-button">
                        <img src="/trueke/assets/icons/trueque.png" alt="">
                        <span>Solicitar trueque</span>
                    </button>
                    <button>
                        <img src="/trueke/assets/icons/dislike.png" alt="">
                    </button>
                </div>
            </div>
        </div>
    </main>

</body>

</html>