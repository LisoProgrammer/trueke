<div class='capa_principal_new_publication closed' id='capa_principal_new_publication'>
    <div class='window_new_publication closed' id='window_new_publication'>
        <header class='flex'>
            <div>
                <h3 style="margin: 0; color: var(--primary-color) !important;">Publicar un nuevo articulo o servicio para intercambiar</h3>
            </div>
            <button id="close_window_new_publication">
                <img src="/trueke/assets/icons/close.png" alt="">
            </button>
        </header>
        <form class="form_new_publication" id="form_new_publication" autocomplete="off" action="/trueke/back/api/creat_new_publication.php" enctype="multipart/form-data" method="POST">
          <div class="body_new_publication">
            <div class="column_left_new_publication">
              <label class="label_new_publication">¿Es un artículo o un servicio? (obligatorio)</label>
              <select id="tipo_publicacion" class="input_select_new_publication" name="articulo_or_servicio" required>
                <option value="">Seleccione...</option>
                <option value="0">Artículo</option>
                <option value="1">Servicio</option>
              </select>
              <div class="flex center column container_layout_img_articulo">
                <span>Previsualización de la imagen</span>
                <div class="flex center container_img_articulo">
                  <img src="" alt="" id="preview_img_articulo">
                </div>
              </div>
              <label class="label_new_publication" style="margin-top: 12px;">
                Carga la imagen del artículo (opcional)
              </label>
              <div class="dropzone_new_publication" id="dropzone_new_publication">
                <p>Arrastre las imagen o presione aquí</p>
                <input type="file" id="input_imagenes_new_publication"
                      name="img_article" multiple accept="image/*">
              </div>
            </div>

            <div class="column_right_new_publication">
              <label class="label_new_publication">Título (obligatorio)</label>
              <input type="text"
                    name="titulo"
                    id="titulo_publicacion"
                    class="input_text_new_publication"
                    placeholder="El nombre del artículo o servicio..."
                    maxlength="80"
                    required>

              <label class="label_new_publication" style="margin-top: 12px;">Descripción (opcional)</label>
              <div class="textarea_wrapper_new_publication">
                <textarea id="descripcion_publicacion"
                          name="descripcion"
                          class="textarea_new_publication"
                          placeholder="Describe brevemente lo que ofreces, que defectos tiene el artículo, en qué estado se encuentra..."
                          maxlength="400"></textarea>
                <span class="contador_chars_new_publication">
                  <span id="contador_desc_new_publication">0</span>/400
                </span>
              </div>
            </div>
          </div>

          <div class="footer_new_publication">
            <button type="submit" class="flex primary-button">
              <span>
                <img src="/trueke/assets/icons/add.png" alt="">
              </span>
              <span>Publicar nuevo</span>
            </button>
          </div>
        </form>
    </div>
</div>