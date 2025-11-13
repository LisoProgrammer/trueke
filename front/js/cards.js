let capa_principal_solicitar_trueque = document.getElementById(
  "capa_principal_solicitar_trueque"
);
let ventana_solicitar_trueque = document.getElementById(
  "window_solicitar_trueque"
);
let cerrar_ventana_solicitar_trueque = document.getElementById(
  "close_window_solicitar_trueque"
);
let window_solicitar_trueque_close_button = document.getElementById(
  "close_window_solicitar_trueque"
);
let img_articulo_solicitar_trueque = document.getElementById(
  "solicitar-trueque-img"
);
let titulo_ventana_solicitar_trueque = document.getElementById(
  "solicitar-trueque-titulo"
);
let autor_ventana_solicitar_trueque = document.getElementById(
  "solicitar-trueque-autor"
);
let descripcion_ventana_solicitar_trueque = document.getElementById(
  "solicitar-trueque-descripcion"
);
let lineal_gradientes = [
  "linear-gradient(135deg, #3B82F6, #9333EA)", // Azul profundo con violeta
  "linear-gradient(135deg, #F43F5E, #7E22CE)", // Rojo coral con púrpura
  "linear-gradient(135deg, #10B981, #0E7490)", // Verde esmeralda con azul petróleo
  "linear-gradient(135deg, #F59E0B, #D97706)", // Naranja suave con dorado oscuro
  "linear-gradient(135deg, #475569, #7C3AED)", // Azul grisáceo con violeta apagado
  "linear-gradient(135deg, #1E293B, #334155)", // Gris oscuro con azul acero
  "linear-gradient(135deg, #EC4899, #8B5CF6)", // Rosa palo con lavanda
];
window_solicitar_trueque_close_button.addEventListener("click", () => {
  window_solicitar_trueque.classList.remove("opened");
  window_solicitar_trueque.classList.add("closed");
  capa_principal_solicitar_trueque.classList.remove("opened");
  capa_principal_solicitar_trueque.classList.add("closed");
});

function new_card_publication(
  id_pub,
  container,
  autor,
  img_src,
  titulo,
  descripcion,
  visualizations,
  fecha,
  hora
) {
  let header = `
    <div class="flex">
        <div class="flex">
            <img src="/trueke/assets/icons/arrow_right.png" alt="">
            <div class="flex column">
                <span>${autor}</span>
                <span>Hace ${tiempo_transcurrido(fecha, hora)}</span>
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
  if (img_src == "") {
    let title_reduced = titulo.slice(0, 60) + "...";
    img_container.innerHTML = `<h4 style="color: #fff !important">${title_reduced}</h4>`;
    img_container.style = "padding: 10px;text-align: center;";
    img_container.style.background =
      lineal_gradientes[Math.floor(Math.random() * lineal_gradientes.length)];
  } else {
    let img = document.createElement("img");
    img.src = "/trueke/assets/samples/" + img_src;
    img_container.appendChild(img);
  }
  let div_tools = document.createElement("div");
  div_tools.className = "flex tools";
  let button_solicitar_trueke = document.createElement("button");
  button_solicitar_trueke.className = "flex center primary-button";
  button_solicitar_trueke.innerHTML = `
        <img src="/trueke/assets/icons/trueque.png" alt="">
        <span>Solicitar trueque</span>
    `;
  button_solicitar_trueke.addEventListener("click", async () => {
    window_solicitar_trueque.classList.remove("closed");
    window_solicitar_trueque.classList.add("opened");
    capa_principal_solicitar_trueque.classList.remove("closed");
    capa_principal_solicitar_trueque.classList.add("opened");
    console.log(window_solicitar_trueque);
    img_articulo_solicitar_trueque.src = "/trueke/assets/samples/" + img_src;
    titulo_ventana_solicitar_trueque.innerText = titulo;
    autor_ventana_solicitar_trueque.innerText = autor;
    descripcion_ventana_solicitar_trueque.innerText = descripcion;
    let form = new FormData();
    form.append("id_pub", id_pub);
    let update_views_request = await fetch(
      "/trueke/back/api/update_views.php",
      {
        method: "POST",
        body: form,
      }
    );
    if (update_views_request.ok) {
      let response = await update_views_request.json();
      if (response.inserted_dislike) {
        if (container.children.length === 0) {
          renderPublications();
        }
      }
      console.log(response);
    }
  });
  let button_dislike = document.createElement("button");
  button_dislike.innerHTML = `<img src="/trueke/assets/icons/dislike.png" alt="">`;
  button_dislike.addEventListener("click", async () => {
    let form = new FormData();
    form.append("id_pub", id_pub);
    let dislike_request = await fetch("/trueke/back/api/insert_dislike.php", {
      method: "POST",
      body: form,
    });
    if (dislike_request.ok) {
      let response = await dislike_request.text();
      console.log(response);
    }
  });
  div_tools.appendChild(button_solicitar_trueke);
  div_tools.appendChild(button_dislike);
  let div_card = document.createElement("div");
  div_card.className = "card_item";
  div_card.innerHTML = header;
  div_card.appendChild(img_container);
  div_card.appendChild(div_tools);

  container.appendChild(div_card);
  return div_card;
}

function new_card_my_publication(
  id_pub,
  container,
  autor,
  img_src,
  titulo,
  descripcion,
  visualizations,
  n_truekes,
  fecha,
  hora
) {
  let header = `
    <div class="flex">
        <div class="flex">
            <img src="/trueke/assets/icons/arrow_right.png" alt="">
            <div class="flex column">
                <span>${autor}</span>
                <span>Hace ${tiempo_transcurrido(fecha, hora)}</span>
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
  if (img_src == "") {
    let title_reduced = titulo.slice(0, 60) + "...";
    img_container.innerHTML = `<h4 style="color: #fff !important">${title_reduced}</h4>`;
    img_container.style = "padding: 10px;text-align: center;";
    img_container.style.background =
      lineal_gradientes[Math.floor(Math.random() * lineal_gradientes.length)];
  } else {
    let img = document.createElement("img");
    img.src = "/trueke/assets/samples/" + img_src;
    img_container.appendChild(img);
  }
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
  button_eliminar_publicacion.addEventListener("click", async () => {
    Swal.fire({
      title: "¿Estás seguro de aliminar la publicación?",
      text: "No podrás revertir eso",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sí, hazlo",
    }).then(async (result) => {
      if (result.isConfirmed) {
        /*Swal.fire({
          title: "Deleted!",
          text: "Your file has been deleted.",
          icon: "success",
        });*/
        let form = new FormData();
        form.append("id_pub", id_pub);
        let delete_pub_request = await fetch("/trueke/back/api/delete_publication.php",{
          method: "POST",
          body: form
        })
        if(delete_pub_request.ok){
          let response = await delete_pub_request.json();
          console.log(response);
          if(response.deleted){
            div_card.remove();
          }
        }
      }
    });
  });
  container.appendChild(div_card);
  return div_card;
}
function tiempo_transcurrido(fechaStr, horaStr) {
  const ahora = new Date();
  const fechaEvento = new Date(`${fechaStr}T${horaStr}`);
  const diffMs = ahora - fechaEvento; // diferencia en milisegundos

  if (diffMs < 0) return "un tiempo"; //en el futuro

  const segundos = Math.floor(diffMs / 1000);
  const minutos = Math.floor(segundos / 60);
  const horas = Math.floor(minutos / 60);
  const dias = Math.floor(horas / 24);
  const meses = Math.floor(dias / 30);

  // segundos
  if (segundos < 60) return `${segundos}s`;

  // minutos
  if (minutos < 60) return `${minutos}m`;

  // horas
  if (horas < 24) {
    const restoMin = minutos % 60;
    if (restoMin === 0) return `${horas}h`;
    return `${horas} h y ${restoMin}m`;
  }

  // días
  if (dias < 30) return `${dias}d`;

  // meses
  if (meses === 1) return "1 mes";
  return `${meses} meses`;
}
