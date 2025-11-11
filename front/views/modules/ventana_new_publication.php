<div class='capa_principal_new_publication closed' id='capa_principal_new_publication'>
    <div class='window_new_publication closed' id='window_new_publication'>
        <header class='flex'>
            <div>
                <h2>Publicar un nuevo articulo para intercambiar</h2>
            </div>
            <button id="close_window_new_publication">
                <img src="/trueke/assets/icons/close.png" alt="">
            </button>
        </header>
        <form class="form_new_publication" id="form_new_publication" autocomplete="off">
          <div class="body_new_publication">

            <div class="column_left_new_publication">
              <label class="label_new_publication">¿Es un artículo o un servicio?</label>
              <select id="tipo_publicacion" class="input_select_new_publication" required>
                <option value="">Seleccione...</option>
                <option value="articulo">Artículo</option>
                <option value="servicio">Servicio</option>
              </select>

              <label class="label_new_publication" style="margin-top: 12px;">
                Carga las imágenes del artículo
              </label>
              <div class="dropzone_new_publication" id="dropzone_new_publication">
                <p>Arrastre las imágenes o presione aquí</p>
                <input type="file" id="input_imagenes_new_publication"
                       name="imagenes[]" multiple accept="image/*">
              </div>
            </div>

            <div class="column_right_new_publication">
              <label class="label_new_publication">Título</label>
              <input type="text"
                     id="titulo_publicacion"
                     class="input_text_new_publication"
                     placeholder="El nombre del artículo o servicio..."
                     maxlength="80"
                     required>

              <label class="label_new_publication" style="margin-top: 12px;">Descripción</label>
              <div class="textarea_wrapper_new_publication">
                <textarea id="descripcion_publicacion"
                          class="textarea_new_publication"
                          placeholder="Describe brevemente lo que ofreces..."
                          maxlength="400"></textarea>
                <span class="contador_chars_new_publication">
                  <span id="contador_desc_new_publication">0</span>/400
                </span>
              </div>
            </div>
          </div>

          <div class="footer_new_publication">
            <button type="submit" class="btn_publicar_new_publication">
              + Publicar nuevo
            </button>
          </div>
        </form>
    </div>
</div>