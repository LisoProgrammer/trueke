INSERT INTO `usuario` (`id`, `primer_nombre`, `primer_apellido`, `foto_perfil`, `correo_institucional`, `hash_contrasena`, `calificacion`, `n_votantes`) VALUES
(1, 'Lisandro', 'Zapata', '', 'lizapata@utb.edu.co', '$2y$10$af4nH7I7CxFoFBfG0/XRRucJYI61NxExdwCBFZd7lEu6W9Fn7uV46', 0.5, 0),
(2, 'Javier', 'Mercado', '', 'jbolivar@utb.edu.co', '$2y$10$ppHTXWS3L09lnVUQ4iBwGu3SvEZOfirJ1kFGH9breqZ7T0FTNDgKe', 0.5, 0),
(3, 'Juan', 'Ramos', '', 'jramos@utb.edu.co', '$2y$10$l236WTwq/h0meO4HywQRXu5YOuJ5iBrPbMBMf3ZFFwaF7.L1eYUju', 0.5, 0),
(4, 'Juana', 'Florez', '', 'florezj@utb.edu.co', '$2y$10$Xq5lfoEb.W4swpRV/7CsS.iXFf8R6qEsicBru/Lt3u.IPrAIweUve', 0.5, 0);


INSERT INTO publicacion (id_autor, titulo, descripcion, imagen, fecha, hora, visualizaciones) 
VALUES (1, 'Cambio de libros de ciencia', 'Ofrezco cambiar libros de ciencia por novelas, interesados escribir.', 'libro.jpg', '2025-11-10', '18:00:00', 15);

INSERT INTO publicacion (id_autor, titulo, descripcion, imagen, fecha, hora, visualizaciones)
VALUES (1, 'Trueque de ropa', 'Cambio bata en buen estado por zapatos deportivos, talla M.', 'bata.png', '2025-11-10', '18:30:00', 20);

INSERT INTO publicacion (id_autor, titulo, descripcion, imagen, fecha, hora, visualizaciones)
VALUES (1, 'Intercambio de juegos', 'Ofrezco juegos de mesa a cambio de videojuegos de PS4.', 'juego.png', '2025-11-10', '19:00:00', 10);

INSERT INTO publicacion (id_autor, titulo, descripcion, imagen, fecha, hora, visualizaciones)
VALUES (1, 'Herramientas por utensilios', 'Busco intercambiar botas por utensilios de cocina variados.', 'botas.png', '2025-11-10', '19:30:00', 25);
