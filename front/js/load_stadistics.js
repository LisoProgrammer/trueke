let pendiente_span = document.getElementById("pendiente_span")
let vistas_span = document.getElementById("vistas_span");
let calificacion_span = document.getElementById("calificacion_span");
let truekes_hechos_span = document.getElementById("truekes_hechos_span");
console.log(estadisticas.calificacion)
pendiente_span.innerText = estadisticas.pendientes;
calificacion_span = estadisticas.calificacion;
vistas_span = estadisticas.views;
truekes_hechos_span = estadisticas.truekes_hechos;
