<div id="capa_principal_solicitar_trueque" class="capa_principal_solicitar_trueque closed">
    <div id="window_solicitar_trueque" class="window_solicitar_trueque closed">

        <header class="modal-header">
            <h3>Detalle de la publicación</h3>
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
                        <div class="mb-2 flex">
                            <label class="form-label mb-0 text-muted">
                                Publica una oferta para intercambiar esto
                            </label>
                            <label>
                                <img src="/trueke/assets/icons/info_black.png" alt="" width="18px">
                            </label>
                        </div>
                        <div class="mb-2">
                            <label class="form-label mb-0 text-muted">
                                <h3 id="solicitar-trueque-titulo">
                                </h3>
                            </label>
                        </div>
                        <div class="mb-2">
                            <label class="form-label mb-0 text-muted">
                                <span id="solicitar-trueque-descripcion"></span>
                            </label>
                        </div>
                        <div class="mb-2">
                            <label class="form-label mb-0 text-muted">
                                <b><span id="solicitar-trueque-autor"></span></b>
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
                        <form method="POST" action="/trueke/back/api/solicitar_trueque.php" enctype="multipart/form-data">
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
                                    <img src="" alt="" id="preview_img_articulo_solicitar_trueque">
                                </div>
                            </div>

                            <!-- DROPZONE -->
                            <label class="label_new_publication" style="margin-top: 8px;">
                                Carga la imagen del artículo (opcional)
                            </label>
                            <div class="dropzone_new_publication" id="dropzone_new_publication_solicitar_trueque">
                                <p>Arrastre las imagen o presione aquí</p>
                                <input type="file" id="input_imagenes_new_publication_solictar_trueque" name="img_article" multiple
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
                                <textarea id="descripcion_publicacion_st" name="descripcion" class="textarea_new_publication"
                                    placeholder="Describe brevemente lo que ofreces, que defectos tiene el artículo, en qué estado se encuentra..."
                                    maxlength="230"></textarea>
                                <span class="contador_chars_new_publication">
                                    <span id="contador_desc_new_publication_st">0</span>/230
                                </span>
                            </div>
                            <input type="hidden" name="id_pub_base" id="id_pub_base">
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
            </form>
        </div>
    </div>
</div>
<script src="/trueke/front/js/solicitar_trueque_form.js"></script>