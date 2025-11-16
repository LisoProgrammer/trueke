let container_my_publications = document.getElementById("container_my_publications");
let container_publications_sugg = document.getElementById("container_publications_sugg");
let button_carrusel_right = document.getElementById("bth_carrusel_right");
let button_carrusel_left = document.getElementById("bth_carrusel_left");

// Función reutilizable para renderizar mis publicaciones
function renderMyPublications() {
  container_my_publications.innerHTML = "";
  for (let item of my_publications) {
    new_card_my_publication(
      item.id_publicacion,
      container_my_publications,
      item.autor,
      item.imagen,
      item.titulo,
      item.descripcion,
      item.visualizaciones,
      item.num_ofertas,
      item.fecha,
      item.hora
    );
  }

  if (my_publications.length <= 3) {
    button_carrusel_left.remove();
    button_carrusel_right.remove();
  } else {
    button_carrusel_left.addEventListener("click", () => {
      container_my_publications.scrollBy({ left: -300, behavior: "smooth" });
    });
    button_carrusel_right.addEventListener("click", () => {
      container_my_publications.scrollBy({ left: 300, behavior: "smooth" });
    });
  }
}

// Función reutilizable para renderizar las sugerencias
function renderPublications() {
  container_publications_sugg.innerHTML = "";
  for (let item of publications) {
    new_card_publication(
      item.id_publicacion,
      container_publications_sugg,
      item.autor,
      item.imagen,
      item.titulo,
      item.descripcion,
      item.visualizaciones,
      item.fecha,
      item.hora
    );
  }
}

// Render inicial
renderMyPublications();
renderPublications();
