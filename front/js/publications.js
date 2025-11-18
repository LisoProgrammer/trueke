let container_my_pub = document.getElementById("container_my_pub");
let container_ofertas = document.getElementById("container_ofertas");

let lineal_gradientes = [
  "linear-gradient(135deg, #3B82F6, #9333EA)",
  "linear-gradient(135deg, #F43F5E, #7E22CE)",
  "linear-gradient(135deg, #10B981, #0E7490)",
  "linear-gradient(135deg, #F59E0B, #D97706)",
  "linear-gradient(135deg, #475569, #7C3AED)",
  "linear-gradient(135deg, #1E293B, #334155)",
  "linear-gradient(135deg, #EC4899, #8B5CF6)",
];

console.log("id_pub2:", id_pub2);
console.log("correo:", correo_institucional);
function clean_url(id_pub) {
  const url = new URL(window.location.href);
  // Limpiar todos los parámetros
  url.search = "";
  // Agregar el parámetro id_pub
  url.searchParams.set("id_pub", id_pub);
  // Reemplaza la URL sin recargar la página
  window.history.replaceState({}, document.title, url.toString());
}
// si no hay publicación, salir
if (my_publication == null) {
  window.location.href = "/trueke/front/views/dashboard.php";
}

let type_my_pub = my_publication.servicio == 1 ? "servicio" : "article";

// =====================
//      MI PUBLICACIÓN
// =====================
new_publicacion_details(
  my_publication.id_publicacion,
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

// =====================
//       OFERTAS
// =====================
for (let i in offers) {
  let type_pub = offers[i].servicio == 1 ? "servicio" : "article";

  new_publicacion_details(
    offers[i].id_publicacion,
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

// ==========================================================
//                FUNCIÓN CREAR TARJETA PUBLICACIÓN
// ==========================================================
function new_publicacion_details(
  id_pub,
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

  // ----- LÓGICA DE MI PUBLICACIÓN -----
  if (type_pub == "my") {
    text_type_pub = "Tu publicación";
    icon_type_pub = "/trueke/assets/icons/globe.png";
    classname_div_info_bag = "flex info_bag my_pub";
  }

  // ----- LÓGICA DE OFERTAS -----
  else if (type_pub == "oferta") {
    div_publication.classList.add("oferta");

    text_type_pub = "Oferta";
    icon_type_pub = "/trueke/assets/icons/gift.png";
    classname_div_info_bag = "flex info_bag oferta";
  }

  let fecha_hum = formatearFechaHumanizada(fecha, hora);

  div_info_container.innerHTML = `
    <div class="info_container">
        <div class="flex">
            <span class="${classname_div_info_bag}">
                <img src="${icon_type_pub}" alt="">
                <span>${text_type_pub}</span>
            </span>
            <span>Tipo</span>
            <span class="flex info_bag ${type_oferta}">
                <img src="${
                  type_oferta == "article"
                    ? "/trueke/assets/icons/book.png"
                    : "/trueke/assets/icons/agree.png"
                }">
                <span>${
                  type_oferta == "article" ? "Artículo" : "Servicio"
                }</span>
            </span>
        </div>
        <span class="datetime">${fecha_hum}</span>
    </div>
  `;

  // ===========================
  //     AUTOR + SELECTOR
  // ===========================
  let div_autor_button = document.createElement("div");
  div_autor_button.className = "flex";

  // ---- SI ESTA PUBLICACIÓN ES LA OFERTA ACEPTADA ----
  if (id_pub2 != null && id_pub2 == id_pub) {
    div_autor_button.innerHTML = `
      <div class="flex">
          <img src="/trueke/assets/icons/arrow_right_z.png" alt="">
          <span>
            <b>${autor}</b><br>
            <a href="mailto:${correo_institucional}">${correo_institucional}</a>
          </span>
      </div>
    `;
  }

  // ---- SI ES MI PUBLICACIÓN ----
  else if (type_pub == "my") {
    div_autor_button.innerHTML = `
      <div class="flex">
          <img src="/trueke/assets/icons/arrow_right_z.png" alt="">
          <span><b>${autor}</b></span>
      </div>
    `;
  }

  // ---- SI ES OFERTA Y NO ES LA ACEPTADA → SOLO NOMBRE ----
  else {
    div_autor_button.innerHTML = `
      <div class="flex">
          <img src="/trueke/assets/icons/arrow_right_z.png" alt="">
          <span><b>${autor}</b></span>
      </div>
    `;
  }

  // ===============================================================
  //             BOTÓN (mi publicación / oferta)
  // ===============================================================

  let button_action = null;

  // -------- BOTÓN MI PUBLICACIÓN --------
  if (type_pub == "my") {
    button_action = document.createElement("button");
    button_action.className = "flex delete";
    button_action.innerHTML = `<img src="/trueke/assets/icons/delete.png"><span>Eliminar publicación</span>`;
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
              window.location.href = "/trueke/front/views/dashboard.php";
            }
          }
        }
      });
    });
  }

  // -------- BOTÓN OFERTA --------
  else if (type_pub == "oferta") {
    button_action = document.createElement("button");

    // ---- SI ESTA OFERTA ES LA ACEPTADA -> MOSTRAR SELECTOR ----
    if (id_pub2 != null && id_pub2 == id_pub) {
      button_action = "";
      if (trueke_hecho == 1) {
        button_action = document.createElement("span");
        button_action.innerText = "Trueke realizado";
        button_action.className = "trueke-realizado";
      } else {
        button_action = document.createElement("select");
        button_action.className = "trueke-selector";

        button_action.innerHTML = `
      <option value="selection">Seleccionar acción</option>
      <option value="cancelar">Cancelar trueque</option>
      <option value="terminar">Terminar trueque</option>`;
        button_action.addEventListener("change", () => {
          if (button_action.value == "cancelar") {
            Swal.fire({
              title: "¿Estás seguro de cancelar el trueque?",
              text: "Se cancelará y podrás solicitar otros trueques",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Sí, hazlo",
            }).then(async (result) => {
              if (result.isConfirmed) {
                let form = new FormData();
                form.append("id_pub2", id_pub);
                let cancel_trueke_request = await fetch(
                  "/trueke/back/api/cancel_trueque.php",
                  {
                    method: "POST",
                    body: form,
                  }
                );
                if (cancel_trueke_request.ok) {
                  let response = await cancel_trueke_request.json();
                  console.log(response.canceled_trueke);
                  if (response.canceled_trueke) {
                    window.location.href =
                      "/trueke/front/views/details_trueke.php?code_msg=440&id_pub=" +
                      my_publication.id_publicacion;
                  }
                }
              } else {
                button_action.value = "selection";
              }
            });
          } else if (button_action.value == "terminar") {
            Swal.fire({
              title: "¿Terminaste el trueque?",
              text: "Marca esto solo si concretaron el intercambio",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Sí, hazlo",
            }).then(async (result) => {
              if (result.isConfirmed) {
                let form = new FormData();
                form.append("id_pub2", id_pub);
                let finish_trueke_request = await fetch(
                  "/trueke/back/api/finish_trueque.php",
                  {
                    method: "POST",
                    body: form,
                  }
                );
                if (finish_trueke_request.ok) {
                  let response = await finish_trueke_request.json();
                  console.log(response.ended_trueke);
                  if (response.ended_trueke) {
                    window.location.href =
                      "/trueke/front/views/details_trueke.php?code_msg=450&id_pub=" +
                      my_publication.id_publicacion;
                  }
                }
              } else {
                button_action.value = "selection";
              }
            });
          }
        });
      }
    }

    // ---- SI AÚN NO HAY TRUEQUE ACEPTADO → SE PUEDE ACEPTAR ----
    else if (id_pub2 == null) {
      button_action.className = "flex primary-button accept_trueke";
      button_action.innerHTML = `<img src="/trueke/assets/icons/check.png"><span>Aceptar trueque</span>`;
      button_action.addEventListener("click", async () => {
        Swal.fire({
          title: "¿Estás seguro de aceptar este trueque?",
          text: "Puedes cancelarlo más tarde",
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
            form.append("id_pub1", my_publication.id_publicacion);
            form.append("id_pub2", id_pub);
            let acept_pub_request = await fetch(
              "/trueke/back/api/acept_trueque.php",
              {
                method: "POST",
                body: form,
              }
            );
            if (acept_pub_request.ok) {
              let response = await acept_pub_request.json();
              console.log(response);
              if (response.accepted_trueke) {
                window.location.reload();
              }
            }
          }
        });
      });
    }

    // ---- SI YA HAY OTRO TRUEQUE ACEPTADO → NO MOSTRAR BOTÓN ----
    else if (id_pub2 != id_pub) {
      button_action = null;
    }
  }

  // Agregar botón si existe
  if (button_action) div_autor_button.appendChild(button_action);

  // ===========================
  //  CONTENIDO DEL CUERPO
  // ===========================
  let body_pub = document.createElement("div");
  body_pub.innerHTML = `<h2>${titulo}</h2><span>${descripcion}</span>`;

  content.appendChild(div_info_container);
  content.appendChild(div_autor_button);
  content.appendChild(body_pub);

  div_publication.appendChild(img_container);
  div_publication.appendChild(content);
  container.appendChild(div_publication);
}

// ==========================================================
//                 FUNCIÓN FORMATEAR FECHA
// ==========================================================
function formatearFechaHumanizada(fechaStr, horaStr) {
  const ahora = new Date();
  const fecha = new Date(`${fechaStr}T${horaStr}`);

  const msPorDia = 1000 * 60 * 60 * 24;
  const diffDias = Math.floor((ahora - fecha) / msPorDia);

  let horas = fecha.getHours();
  let minutos = fecha.getMinutes().toString().padStart(2, "0");
  const ampm = horas >= 12 ? "PM" : "AM";
  horas = horas % 12 || 12;

  const hoy = new Date();
  const esMismaFecha =
    fecha.getDate() === hoy.getDate() &&
    fecha.getMonth() === hoy.getMonth() &&
    fecha.getFullYear() === hoy.getFullYear();

  if (esMismaFecha) return `Hoy, a las ${horas}:${minutos} ${ampm}`;
  if (diffDias === 1) return `Ayer, a las ${horas}:${minutos} ${ampm}`;
  if (diffDias === 2) return `Antier, a las ${horas}:${minutos} ${ampm}`;

  const dia = fecha.getDate().toString().padStart(2, "0");
  const mes = (fecha.getMonth() + 1).toString().padStart(2, "0");
  const año = fecha.getFullYear();
  const hora24 = fecha.getHours().toString().padStart(2, "0");

  return `${dia}/${mes}/${año} - ${hora24}:${minutos}`;
}
