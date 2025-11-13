let container_my_publications = document.getElementById(
  "container_my_publications"
);
let container_publications_sugg = document.getElementById(
  "container_publications_sugg"
);
let button_carrusel_right = document.getElementById("bth_carrusel_right");
let button_carrusel_left = document.getElementById("bth_carrusel_left");
//let card = new_card_publication(1, container_publications_sugg, "Lisandro Zapata","3 minutos",false,"Servicio de monitorias a cambio de un libro","Esto es un texto de relleno",10)
//let card_my_pub = new_card_my_publication(1, container_my_publications, "Lisandro Zapata","3 minutos","botas.png","", 10, 10)
for (let i = 0; i < my_publications.length; i++) {
  let item = my_publications[i];

  new_card_my_publication(
    item.id_publicacion,
    container_my_publications,
    item.autor,
    item.imagen,
    item.titulo,
    item.descripcion,
    item.visualizaciones,
    0,
    item.fecha,
    item.hora
  );
}
if (my_publications.length <= 3) {
    button_carrusel_left.remove();
    button_carrusel_right.remove();
} else {
  button_carrusel_left.addEventListener("click", () => {
    container_my_publications.scrollBy({
      left: -300,
      behavior: "smooth",
    });
  });

  button_carrusel_right.addEventListener("click", () => {
    container_my_publications.scrollBy({
      left: 300,
      behavior: "smooth",
    });
  });
}
for (let i = 0; i < publications.length; i++) {
  let item = publications[i];

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
