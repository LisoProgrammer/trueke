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