let img_preview_element_solicitar_trueque = document.getElementById("preview_img_articulo_solicitar_trueque");
button_close_new_publication_secondary.addEventListener("click", () => {
  if (window_open) {
    window_open = false;
    capa_principal_new_publication.classList.remove("opened");
    capa_principal_new_publication.classList.add("closed");
    window_new_publication.classList.remove("opened");
    window_new_publication.classList.add("closed");
  }
});

// Dropzone: abrir selector de imágenes al hacer click
let dropzone_new_publication_solicitar_trueque = document.getElementById(
  "dropzone_new_publication_solicitar_trueque"
);
let input_imagenes_new_publication_solicitar_trueque = document.getElementById(
  "input_imagenes_new_publication_solictar_trueque"
);

dropzone_new_publication_solicitar_trueque.addEventListener("click", () => {
  input_imagenes_new_publication_solicitar_trueque.click();
});

input_imagenes_new_publication_solicitar_trueque.addEventListener("change", (e) => {
  let p = dropzone_new_publication_solicitar_trueque.querySelector("p");
  
  if (input_imagenes_new_publication_solicitar_trueque.files.length > 0) {
    console.log(input_imagenes_new_publication_solicitar_trueque.files);
    preview_img(input_imagenes_new_publication_solicitar_trueque.files[0],img_preview_element_solicitar_trueque)
    p.textContent =
      input_imagenes_new_publication_solicitar_trueque.files.length +
      " imagen(es) seleccionada(s)";
  } else {
    p.textContent = "Arrastre las imágenes o presione aquí";
  }
});

// Contador de caracteres de la descripción
let descripcion_publicacion_st = document.getElementById(
  "descripcion_publicacion_st"
);
let contador_desc_new_publication_st = document.getElementById(
  "contador_desc_new_publication_st"
);

descripcion_publicacion_st.addEventListener("input", () => {
  contador_desc_new_publication_st.textContent =
    descripcion_publicacion_st.value.length;
});

// Permitir arrastrar y soltar imágenes en la dropzone
dropzone_new_publication_solicitar_trueque.addEventListener("dragover", (e) => {
  e.preventDefault(); // Evita que el navegador abra la imagen
  dropzone_new_publication_solicitar_trueque.style.background = "#f0fff4"; // Efecto visual
  dropzone_new_publication_solicitar_trueque.style.borderColor = "#18a848";
});

dropzone_new_publication_solicitar_trueque.addEventListener("dragleave", () => {
  dropzone_new_publication_solicitar_trueque.style.background = "#fafbfc";
  dropzone_new_publication_solicitar_trueque.style.borderColor = "#d0d7de";
});

dropzone_new_publication_solicitar_trueque.addEventListener("drop", (e) => {
  e.preventDefault();
  dropzone_new_publication_solicitar_trueque.style.background = "#fafbfc";
  dropzone_new_publication_solicitar_trueque.style.borderColor = "#d0d7de";

  // Asigna los archivos arrastrados al input
  input_imagenes_new_publication_solicitar_trueque.files = e.dataTransfer.files;
  console.log(e.dataTransfer.files[0]);
  preview_img(e.dataTransfer.files[0],img_preview_element_solicitar_trueque)
  // Actualiza el texto del cuadro
  const p = dropzone_new_publication_solicitar_trueque.querySelector("p");
  if (input_imagenes_new_publication_solicitar_trueque.files.length > 0) {
    p.textContent =
      input_imagenes_new_publication_solicitar_trueque.files.length +
      " imagen(es) seleccionada(s)";
  } else {
    p.textContent = "Arrastre las imágenes o presione aquí";
  }
});
//Se carga la imagen en el DOM
function preview_img(file, img_element_html) {
  var reader = new FileReader();
  reader.onload = function (event) {
    //img_prod.src = event.target.result;
    img_element_html.src = event.target.result;
  };
  reader.readAsDataURL(file);
}
