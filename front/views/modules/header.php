<style>
    header {
        width: 100%;
        padding: 5px;
        height: 50px;
        box-shadow: 0px 0px 10px gray;
        position: sticky;
        top: 0px;
        background: #fff;
        z-index: 30;
    }

    .logo-header {
        height: 100%;
    }

    .logo-header img {
        height: 100%;
    }

    .div-group {
        height: 100%;
        width: 800px;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .input-group-1 {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 65%;
        background: #ededed;
        padding: 5px 10px 5px 5px;
        border-radius: 5px;
    }

    .input-group-1 input {
        border: none;
        background: none;
        width: 100%;
        outline: none;
    }
    .primary-button {
        display: flex;
        align-items: center;
        background: var(--primary-color);
        padding: 5px 10px 5px 5px;
        border: none;
        border-radius: 3px;
        color: #fff;
        cursor: pointer;
    }
    .button-menu {
        background: none;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        cursor: pointer;
    }
</style>
<header>
    <div class="div-group">
        <div class="logo-header">
            <img src="/<?php echo $file_root ?>/assets/logo_zero.png" alt="">
        </div>
        <button class="primary-button" id='button_new_publication_secondary'>
            <span><img src="/<?php echo $file_root ?>/assets/icons/add.png" alt=""></span>
            <span>Publicar nuevo</span>
        </button>
        <div class="input-group-1">
            <span><img src="/<?php echo $file_root ?>/assets/icons/search.png" alt=""></span>
            <input type="text" placeholder="¿Qué necesitas intercambiar? Busca 'Libros' ó 'Tijeras'" style="font-size: 15px;">
        </div>
        <button class="button-menu" id="button_open_menu">
            <img src="/<?php echo $file_root ?>/assets/icons/menu.png" alt="">
        </button>
    </div>

</header>
<?php
include "menu.php"
?>

<script src='/trueke/front/js/controller_window_new_publication.js'></script>