<style>
    .subcapa-menu {
        width: 100vw;
        height: 100vh;
        position: fixed;
        z-index: 300;
        background: rgba(128, 128, 128, 0.33);
        top: 0;
    }

    .menu {
        width: 300px;
        height: 100vh;
        position: fixed;
        top: 0;
        right: -100%;
        /* Comienza oculto */
        background: #fff;
        transition: right 0.3s ease;
    }

    .menu header {
        width: 100%;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0px 0px 10px grey;
    }

    .menu>header button {
        border: none;
        background: transparent;
    }

    .menu.opened {
        right: 0;
    }

    .menu.closed {
        right: -100%;
    }

    .subcapa-menu.close {
        z-index: -300;
        background: transparent;
    }
</style>
<div class="subcapa-menu close" id="subcapa_menu">
    <div class="menu" id="menu">
        <header>
            <div>
                <h2>Menú</h2>
            </div>
            <button id="close_menu">
                <img src="/trueke/assets/icons/close.png" alt="">
            </button>
        </header>
    </div>
</div>
<script src="/trueke/front/views/modules/js/menu.js"></script>