let button_new_publication_secondary = document.getElementById('button_new_publication_secondary');
let button_close_new_publication_secondary = document.getElementById('close_window_new_publication');
let window_open = false;
let capa_principal_new_publication = document.getElementById('capa_principal_new_publication');
let window_new_publication = document.getElementById('window_new_publication');

button_new_publication_secondary.addEventListener('click', ()=>{
    if(!window_open){
        window_open=true;
        capa_principal_new_publication.classList.add('opened')
        capa_principal_new_publication.classList.remove('closed')
        window_new_publication.classList.add('opened')
        window_new_publication.classList.remove('closed')
    }
})

button_close_new_publication_secondary.addEventListener('click',()=>{
    if(window_open){
        window_open=false;
        capa_principal_new_publication.classList.remove('opened')
        capa_principal_new_publication.classList.add('closed')
        window_new_publication.classList.remove('opened')
        window_new_publication.classList.add('closed')
    }
})

// Dropzone: abrir selector de imágenes al hacer click
let dropzone_new_publication = document.getElementById('dropzone_new_publication');
let input_imagenes_new_publication = document.getElementById('input_imagenes_new_publication');

dropzone_new_publication.addEventListener('click', ()=>{
    input_imagenes_new_publication.click();
})

input_imagenes_new_publication.addEventListener('change', ()=>{
    let p = dropzone_new_publication.querySelector('p');
    if(input_imagenes_new_publication.files.length > 0){
        p.textContent = input_imagenes_new_publication.files.length + ' imagen(es) seleccionada(s)';
    }else{
        p.textContent = 'Arrastre las imágenes o presione aquí';
    }
})


// Contador de caracteres de la descripción
let descripcion_publicacion = document.getElementById('descripcion_publicacion');
let contador_desc_new_publication = document.getElementById('contador_desc_new_publication');

descripcion_publicacion.addEventListener('input', ()=>{
    contador_desc_new_publication.textContent = descripcion_publicacion.value.length;
})

// Permitir arrastrar y soltar imágenes en la dropzone
dropzone_new_publication.addEventListener('dragover', (e) => {
    e.preventDefault(); // Evita que el navegador abra la imagen
    dropzone_new_publication.style.background = '#f0fff4'; // Efecto visual
    dropzone_new_publication.style.borderColor = '#18a848';
});

dropzone_new_publication.addEventListener('dragleave', () => {
    dropzone_new_publication.style.background = '#fafbfc';
    dropzone_new_publication.style.borderColor = '#d0d7de';
});

dropzone_new_publication.addEventListener('drop', (e) => {
    e.preventDefault();
    dropzone_new_publication.style.background = '#fafbfc';
    dropzone_new_publication.style.borderColor = '#d0d7de';

    // Asigna los archivos arrastrados al input
    input_imagenes_new_publication.files = e.dataTransfer.files;

    // Actualiza el texto del cuadro
    const p = dropzone_new_publication.querySelector('p');
    if (input_imagenes_new_publication.files.length > 0) {
        p.textContent = input_imagenes_new_publication.files.length + ' imagen(es) seleccionada(s)';
    } else {
        p.textContent = 'Arrastre las imágenes o presione aquí';
    }
});
