let container_my_pub = document.getElementById("container_my_pub");
let container_ofertas = document.getElementById("container_ofertas");
let lineal_gradientes = [
  "linear-gradient(135deg, #3B82F6, #9333EA)", // Azul profundo con violeta
  "linear-gradient(135deg, #F43F5E, #7E22CE)", // Rojo coral con púrpura
  "linear-gradient(135deg, #10B981, #0E7490)", // Verde esmeralda con azul petróleo
  "linear-gradient(135deg, #F59E0B, #D97706)", // Naranja suave con dorado oscuro
  "linear-gradient(135deg, #475569, #7C3AED)", // Azul grisáceo con violeta apagado
  "linear-gradient(135deg, #1E293B, #334155)", // Gris oscuro con azul acero
  "linear-gradient(135deg, #EC4899, #8B5CF6)", // Rosa palo con lavanda
];
//let my_publication = {"id_publicacion":21,"primer_nombre":"Lisandro","primer_apellido":"Zapata","titulo":"Cambio calculadora cientifica","descripcion":"La calculadora est\u00e1 en buen estado, la compr\u00e9 hace dos semanas, necesito una bata de laboratorio a cambio","servicio":0,"imagen":"_img_69150305cbd0b7.73383067.webp","fecha":"2025-11-12","hora":"00:00:00","visualizaciones":4,"oferta":0};
let type_my_pub = "article";
if (parseInt(my_publication.servicio) == 1) {
  type_my_pub = "servicio";
}
new_publicacion_details(
  container_my_pub,
  "my",
  type_my_pub,
  my_publication.primer_nombre + " " + my_publication.primer_apellido,
  my_publication.titulo,
  my_publication.descripcion,
  my_publication.imagen,
  my_publication.fecha,
  my_publication.hora
);
for (let i in offers) {
  let type_pub = "article";
  if (offers[i].servicio == 1) {
    type_pub = "servicio";
  }
  new_publicacion_details(
    container_ofertas,
    "oferta",
    type_pub,
    offers[i].primer_nombre + " " + offers[i].primer_apellido,
    offers[i].titulo,
    offers[i].descripcion,
    offers[i].imagen,
    offers[i].fecha,
    offers[i].hora
  );
}
//new_publicacion_details(container_my_pub,"my","article","Lisandro Zapata","Cambio una calculadora por lo que sea. Urgee","Lorem ipsum dolor sit amet contessa sas sasada efef asa","","2025-11-14","10:40:00");
//new_publicacion_details(container_ofertas,"oferta","article","Lisandro Zapata","Cambio una calculadora por lo que sea. Urgee","Lorem ipsum dolor sit amet contessa sas sasada efef asa","4335.jpg","2025-11-14","10:40:00");
//new_publicacion_details(container_ofertas,"oferta","servicio","Lisandro Zapata","Cambio una calculadora por lo que sea. Urgee","Lorem ipsum dolor sit amet contessa sas sasada efef asa","4335.jpg","2025-11-14","10:40:00");
function new_publicacion_details(
  container,
  type_pub,
  type_oferta,
  autor,
  titulo,
  descripcion,
  img_src,
  fecha,
  hora
) {
  let div_publication = document.createElement("div");
  div_publication.className = "publication";
  let img_container = document.createElement("div");
  img_container.className = "img";
  if (img_src == "") {
    let title_sliced = titulo.slice(0, 30) + "...";
    img_container.innerHTML = `<h3 style="text-align: center;color: #fff;">${title_sliced}</h3>`;
  } else {
    img_container.innerHTML = `<img src="/trueke/assets/samples/${img_src}" alt="">`;
  }

  img_container.style.background =
    lineal_gradientes[Math.floor(Math.random() * lineal_gradientes.length)];
  let content = document.createElement("div");
  content.className = "content";
  let div_info_container = document.createElement("div");
  let text_type_pub = "";
  let icon_type_pub = "";
  let classname_div_info_bag = "";
  let icon_type_oferta = "";
  let type_oferta_name = "";
  let text_button = "";
  let icon_button = "";
  let class_button = "";
  let fecha_hum = formatearFechaHumanizada(fecha, hora);
  if (type_pub == "my") {
    text_type_pub = "Tu publicación";
    icon_type_pub = "/trueke/assets/icons/globe.png";
    classname_div_info_bag = "flex info_bag my_pub";
    text_button = "Eliminar publicación";
    icon_button = "/trueke/assets/icons/delete.png";
    class_button = "flex delete";
  } else if (type_pub == "oferta") {
    div_publication.classList.add("oferta");
    text_type_pub = "Oferta";
    icon_type_pub = "/trueke/assets/icons/gift.png";
    classname_div_info_bag = "flex info_bag oferta";
    text_button = "Aceptar trueque";
    icon_button = "/trueke/assets/icons/check.png";
    class_button = "flex primary-button accept_trueke";
  }
  if (type_oferta == "article") {
    icon_type_oferta = "/trueke/assets/icons/book.png";
    type_oferta_name = "Artículo";
  } else if (type_oferta == "servicio") {
    icon_type_oferta = "/trueke/assets/icons/agree.png";
    type_oferta_name = "Servicio";
  }
  div_info_container.innerHTML = `
    <div class="info_container">
        <div class="flex">
            <span class="${classname_div_info_bag}">
                <img src="${icon_type_pub}" alt="">
                <span>${text_type_pub}</span>
            </span>
            <span>Tipo</span>
            <span class="flex info_bag ${type_oferta}">
                <img src="${icon_type_oferta}" alt="">
                <span>${type_oferta_name}</span>
            </span>
        </div>
        <span class="datetime">${fecha_hum}</span>
    </div>
    `;
  let div_autor_button = document.createElement("div");
  div_autor_button.className = "flex";
  div_autor_button.innerHTML = `
    <div class="flex">
        <img src="/trueke/assets/icons/arrow_right_z.png" alt="">
        <span><b>${autor}</b></span>
    </div>
    `;
  let button_action = document.createElement("button");
  button_action.className = class_button;
  button_action.innerHTML = `<img src="${icon_button}" alt=""><span>${text_button}</span>`;
  if (type_pub == "my") {
    button_action.addEventListener("click", async () => {
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
          let delete_pub_request = await fetch(
            "/trueke/back/api/delete_publication.php",
            {
              method: "POST",
              body: form,
            }
          );
          if (delete_pub_request.ok) {
            let response = await delete_pub_request.json();
            console.log(response);
            if (response.deleted) {
              window.location.href = "/trueke/"
            }
          }
        }
      });
    });
  }
  let body_pub = document.createElement("div");
  body_pub.innerHTML = `<h2>${titulo}</h2><span>${descripcion}</span>`;
  div_autor_button.appendChild(button_action);
  content.appendChild(div_info_container);
  content.appendChild(div_autor_button);
  content.appendChild(body_pub);
  div_publication.appendChild(img_container);
  div_publication.appendChild(content);
  container.appendChild(div_publication);
}
function formatearFechaHumanizada(fechaStr, horaStr) {
  const ahora = new Date();
  const fecha = new Date(`${fechaStr}T${horaStr}`);

  // --- Obtener diferencias ---
  const msPorDia = 1000 * 60 * 60 * 24;
  const diffDias = Math.floor((ahora - fecha) / msPorDia);

  // --- Obtener hora en formato 12h ---
  let horas = fecha.getHours();
  let minutos = fecha.getMinutes().toString().padStart(2, "0");
  const ampm = horas >= 12 ? "PM" : "AM";
  horas = horas % 12 || 12; // formato 12h

  const horaFormateada = `${horas}:${minutos} ${ampm}`;

  // --- Comparar con hoy ---
  const hoy = new Date();
  const esMismaFecha =
    fecha.getDate() === hoy.getDate() &&
    fecha.getMonth() === hoy.getMonth() &&
    fecha.getFullYear() === hoy.getFullYear();

  if (esMismaFecha) {
    return `Hoy, a las ${horaFormateada}`;
  }

  // --- Ayer / Antier ---
  if (diffDias === 1) return `Ayer, a las ${horaFormateada}`;
  if (diffDias === 2) return `Antier, a las ${horaFormateada}`;

  // --- +3 días → DD/MM/AAAA - HH:MM ---
  const dia = fecha.getDate().toString().padStart(2, "0");
  const mes = (fecha.getMonth() + 1).toString().padStart(2, "0");
  const año = fecha.getFullYear();
  const hora24 = fecha.getHours().toString().padStart(2, "0");
  const min = minutos;

  return `${dia}/${mes}/${año} - ${hora24}:${min}`;
}
