console.log(results);
let container_publications = document.getElementById("container_publications");
let span_num_results = document.getElementById("n_results");
span_num_results.innerText = Object.keys(results).length;
for (let id_publication in results) {
  let item = results[id_publication];
  console.log(item);

  new_card_publication(
    id_publication,
    container_publications,
    item.autor,
    item.imagen,
    item.titulo,
    item.descripcion,
    item.visualizaciones,
    item.fecha,
    item.hora
  );
}