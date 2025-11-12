let capa_principal_solicitar_trueque=document.getElementById("capa_principal_solicitar_trueque");
let ventana_solicitar_trueque=document.getElementById("window_solicitar_trueque");
let cerrar_ventana_solicitar_trueque=document.getElementById("close_window_solicitar_trueque");
let window_solicitar_trueque_close_button=document.getElementById("close_window_solicitar_trueque");
let img_articulo_solicitar_trueque =document.getElementById("solicitar-trueque-img");
let titulo_ventana_solicitar_trueque =document.getElementById("solicitar-trueque-titulo");
let autor_ventana_solicitar_trueque =document.getElementById("solicitar-trueque-autor");
let descripcion_ventana_solicitar_trueque =document.getElementById("solicitar-trueque-descripcion");

window_solicitar_trueque_close_button.addEventListener("click",()=>{ 
    window_solicitar_trueque.classList.remove("opened");
    window_solicitar_trueque.classList.add("closed");
    capa_principal_solicitar_trueque.classList.remove("opened");
    capa_principal_solicitar_trueque.classList.add("closed")
});


function new_card_publication(id_pub, container, autor, time, img_src, titulo, descripcion, visualizations) {
    let header = `
    <div class="flex">
        <div class="flex">
            <img src="/trueke/assets/icons/arrow_right.png" alt="">
            <div class="flex column">
                <span>${autor}</span>
                <span>Hace ${time}</span>
            </div>
        </div>
        <div class="flex">
            <span>
                <img src="/trueke/assets/icons/view.png" alt="" class="s">
                <span>${visualizations}</span>
            </span>
        </div>
    </div>`;
    let img_container = document.createElement("div");
    img_container.className = "img";
    let img = document.createElement("img");
    img.src = "/trueke/assets/samples/"+img_src;
    img_container.appendChild(img);
    let div_tools = document.createElement("div");
    div_tools.className = "flex tools";
    let button_solicitar_trueke = document.createElement("button");
    button_solicitar_trueke.className = "flex center primary-button";
    button_solicitar_trueke.innerHTML = `
        <img src="/trueke/assets/icons/trueque.png" alt="">
        <span>Solicitar trueque</span>
    `;
    button_solicitar_trueke.addEventListener("click",()=>{
        window_solicitar_trueque.classList.remove("closed");
        window_solicitar_trueque.classList.add("opened");
        capa_principal_solicitar_trueque.classList.remove("closed");
        capa_principal_solicitar_trueque.classList.add("opened")
        console.log(window_solicitar_trueque);
        img_articulo_solicitar_trueque.src="/trueke/assets/samples/"+img_src;
        titulo_ventana_solicitar_trueque.innerText=titulo;
        autor_ventana_solicitar_trueque.innerText=autor;
        descripcion_ventana_solicitar_trueque.innerText=descripcion;
    })
    let button_dislike = document.createElement("button");
    button_dislike.innerHTML = `<img src="/trueke/assets/icons/dislike.png" alt="">`;
    div_tools.appendChild(button_solicitar_trueke);
    div_tools.appendChild(button_dislike);
    let div_card = document.createElement("div");
    div_card.className = "card_item";
    div_card.innerHTML = header;
    div_card.appendChild(img_container);
    div_card.appendChild(div_tools);
    
    container.appendChild(div_card)
    return div_card;
}

function new_card_my_publication(id_pub, container, autor, time, img_src, text, visualizations, n_truekes) {
  let header = `
    <div class="flex">
        <div class="flex">
            <img src="/trueke/assets/icons/arrow_right.png" alt="">
            <div class="flex column">
                <span>${autor}</span>
                <span>Hace ${time}</span>
            </div>
        </div>
        <div class="flex">
            <span>
                <img src="/trueke/assets/icons/view.png" alt="" class="s">
                <span>${visualizations}</span>
            </span>
        </div>
    </div>`;
    let img_container = document.createElement("div");
    img_container.className = "img";
    let img = document.createElement("img");
    img.src = "/trueke/assets/samples/"+img_src;
    img_container.appendChild(img);
    let div_tools = document.createElement("div");
    div_tools.className = "flex tools";
    let button_eliminar_publicacion = document.createElement("button");
    button_eliminar_publicacion.className = "flex delete";
    button_eliminar_publicacion.innerHTML = `
        <img src="/trueke/assets/icons/delete.png" alt="">
        <span>Eliminar publicación</span>
    `;
    let button_truekes = document.createElement("button");
    button_truekes.innerHTML = `
        <span class="num_buble">${n_truekes}</span>
        <img src="/trueke/assets/icons/gift.png" alt="">`;
    div_tools.appendChild(button_eliminar_publicacion);
    div_tools.appendChild(button_truekes);
    let div_card = document.createElement("div");
    div_card.className = "card_item";
    div_card.innerHTML = header;
    div_card.appendChild(img_container);
    div_card.appendChild(div_tools);
    
    container.appendChild(div_card)
    return div_card;
}
