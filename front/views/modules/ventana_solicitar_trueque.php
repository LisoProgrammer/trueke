<style>
    /* CONTENEDOR PRINCIPAL DE LOS DOS BLOQUES */
    .detalle-container {
        display: flex;
        gap: 18px;
        /* compacto */
        width: 100%;
        align-items: flex-start;
    }

    /* BLOQUE IZQUIERDO */
    .detalle-left {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    /* Imagen más compacta */
    .detalle-left img#solicitar-trueque-img {
        width: 100%;
        max-height: 340px;
        object-fit: contain;
        display: block;
    }

    /* Tarjeta de texto compacta */
    .detalle-left .info-textos {
        background: #ffffff;
        border-radius: 6px;
        border: 1px solid #ddd;
        padding: 10px 14px;
        font-size: 14px;
    }

    /* BLOQUE DERECHO COMO TARJETA */
    .detalle-right {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .detalle-right-card {
        background: #ffffff;
        border-radius: 6px;
        border: 1px solid #ddd;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        padding: 14px 16px;
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .detalle-right select,
    .detalle-right input,
    .detalle-right textarea {
        width: 100%;
        font-size: 14px;
    }

    /* Dropzone más pequeño */
    .dropzone_new_publication {
        width: 100%;
        min-height: 90px;
        border: 2px dashed #b5c4d4;
        border-radius: 6px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #f8fbff;
        cursor: pointer;
        padding: 10px;
        text-align: center;
        font-size: 14px;
        transition: background 0.15s ease, border-color 0.15s ease;
    }

    /* Imagen preview más pequeña */
    .container_img_articulo img {
        width: 90px;
        height: auto;
        object-fit: contain;
        display: block;
    }

    /* TEXTAREA COMPACTA */
    .textarea_wrapper_new_publication {
        width: 100%;
        position: relative;
    }

    .textarea_new_publication {
        width: 100%;
        min-height: 85px;
        resize: vertical;
        padding-right: 55px;
        font-size: 14px;
    }

    .contador_chars_new_publication {
        position: absolute;
        bottom: 4px;
        right: 6px;
        font-size: 11px;
        color: #666;
    }

    /* ====== AJUSTES DEL MODAL PARA BOTÓN FIJO ====== */

    /* El contenedor de la ventana será un flex en columna
       y limitamos la altura para que haya scroll interno */
    #window_solicitar_trueque {
        display: flex;
        flex-direction: column;
        max-height: 90vh;
        overflow: hidden; /* el scroll se hace solo en .modal-body */
    }

    /* El cuerpo del modal es el que scrollea */
    #window_solicitar_trueque .modal-body {
        flex: 1 1 auto;
        overflow-y: auto;
        padding: 16px;
    }

    /* FOOTER: botón fijo al fondo del modal */
    .modal-footer {
        flex-shrink: 0;
        display: flex;
        justify-content: flex-end;
        padding: 10px 16px;
        margin-top: 0;
        border-top: 1px solid #ddd;
        background: #ffffff;
        position: sticky;
        bottom: 0;
        z-index: 5;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .detalle-container {
            flex-direction: column;
        }
    }
</style>

<div id="capa_principal_solicitar_trueque" class="capa_principal_solicitar_trueque closed">
    <div id="window_solicitar_trueque" class="window_solicitar_trueque closed">

        <header class="modal-header">
            <h5>Detalle del artículo</h5>
            <button id="close_window_solicitar_trueque" class="modal-close" title="Cerrar">
                <img src="/trueke/assets/icons/close.png" alt="">
            </button>
        </header>

        <div class="modal-body">

            <!-- ===================================== -->
            <!--  BLOQUE IZQUIERDO + BLOQUE DERECHO    -->
            <!-- ===================================== -->
            <div class="detalle-container">

                <!-- ========== BLOQUE 1: IZQUIERDA ========== -->
                <div class="detalle-left">

                    <div id="solicitar-trueque-gallery" style="cursor:pointer;">
                        <img id="solicitar-trueque-img" src="" alt="imagen">
                    </div>

                    <div class="info-textos">
                        <div class="mb-2">
                            <label class="form-label mb-0 text-muted">
                                Título:
                                <span><b id="solicitar-trueque-titulo"></b></span>
                            </label>
                        </div>

                        <div class="mb-2">
                            <label class="form-label mb-0 text-muted">
                                Autor:
                                <span><b id="solicitar-trueque-autor"></b></span>
                            </label>
                        </div>

                        <div class="mb-2">
                            <label class="form-label mb-0 text-muted">
                                Descripción:
                                <span><b id="solicitar-trueque-descripcion"></b></span>
                            </label>
                        </div>

                        <div class="mb-2">
                            <small class="text-muted" id="solicitar-trueque-fecha"></small>
                        </div>
                    </div>

                </div>

                <!-- ========== BLOQUE 2: DERECHA ========== -->
                <div class="detalle-right">
                    <div class="detalle-right-card">

                        <!-- ¿ARTÍCULO O SERVICIO? -->
                        <label class="label_new_publication">
                            ¿Es un artículo o un servicio? (obligatorio)
                        </label>
                        <select id="tipo_publicacion" class="input_select_new_publication" name="articulo_or_servicio"
                            required>
                            <option value="">Seleccione...</option>
                            <option value="0">Artículo</option>
                            <option value="1">Servicio</option>
                        </select>

                        <!-- PREVISUALIZACIÓN IMAGEN -->
                        <div class="flex center column container_layout_img_articulo" style="margin-top: 4px;">
                            <span>Previsualización de la imagen</span>
                            <div class="flex center container_img_articulo">
                                <img src="" alt="" id="preview_img_articulo">
                            </div>
                        </div>

                        <!-- DROPZONE -->
                        <label class="label_new_publication" style="margin-top: 8px;">
                            Carga la imagen del artículo (opcional)
                        </label>
                        <div class="dropzone_new_publication" id="dropzone_new_publication">
                            <p>Arrastre las imagen o presione aquí</p>
                            <input type="file" id="input_imagenes_new_publication" name="img_article" multiple
                                accept="image/*">
                        </div>

                        <!-- TÍTULO PUBLICACIÓN -->
                        <label class="label_new_publication" style="margin-top: 8px;">
                            Título (obligatorio)
                        </label>
                        <input type="text" name="titulo" id="titulo_publicacion" class="input_text_new_publication"
                            placeholder="El nombre del artículo o servicio..." maxlength="80" required>

                        <!-- DESCRIPCIÓN PUBLICACIÓN -->
                        <label class="label_new_publication" style="margin-top: 8px;">
                            Descripción (opcional)
                        </label>
                        <div class="textarea_wrapper_new_publication">
                            <textarea id="descripcion_publicacion" name="descripcion" class="textarea_new_publication"
                                placeholder="Describe brevemente lo que ofreces, que defectos tiene el artículo, en qué estado se encuentra..."
                                maxlength="230"></textarea>
                            <span class="contador_chars_new_publication">
                                <span id="contador_desc_new_publication">0</span>/230
                            </span>
                        </div>

                    </div>
                </div>

            </div>

            <!-- ========== FOOTER: BOTÓN SOLICITAR TRUEQUE ========== -->
            <footer class="modal-footer">
                <button class="flex center primary-button">
                    <img src="/trueke/assets/icons/trueque.png" alt="">
                    <span>Solicitar trueque</span>
                </button>
            </footer>

        </div>
    </div>
</div>