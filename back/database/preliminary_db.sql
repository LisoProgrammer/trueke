CREATE DATABASE trueke;
USE trueke;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    primer_nombre TEXT NOT NULL,
    primer_apellido TEXT NOT NULL,
    foto_perfil TEXT NOT NULL,
    correo_institucional TEXT UNIQUE NOT NULL,
    hash_contrasena TEXT NOT NULL,
    calificacion DECIMAL(2,1) DEFAULT 0.5 CHECK (calificacion BETWEEN 0.5 AND 5.0),
    n_votantes INT DEFAULT 0
);

CREATE TABLE publicacion (
    id_publicacion INT AUTO_INCREMENT PRIMARY KEY,
    id_autor INT NOT NULL,
    titulo TEXT NOT NULL,
    descripcion TEXT,
    servicio INT NOT NULL DEFAULT 0 CHECK (servicio IN (0,1)),
    imagen TEXT,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    visualizaciones INT DEFAULT 0,
    CONSTRAINT fk_publicacion_autor
        FOREIGN KEY (id_autor) REFERENCES usuario(id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE trueke (
    id_trueke INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    pendiente TINYINT(1) DEFAULT 1,
    cancelado TINYINT(1) DEFAULT 0,
    CONSTRAINT fk_trueke_usuario
        FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE solicitado_a (
    id_solicitado_a INT AUTO_INCREMENT PRIMARY KEY,
    id_publicacion1 INT NOT NULL,
    descripcion TEXT,
    id_publicacion2 INT NOT NULL,
    id_usuario1 INT NOT NULL,
    id_usuario2 INT NOT NULL,
    CONSTRAINT fk_sol_pub1
        FOREIGN KEY (id_publicacion1) REFERENCES publicacion(id_publicacion)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_sol_pub2
        FOREIGN KEY (id_publicacion2) REFERENCES publicacion(id_publicacion)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_sol_user1
        FOREIGN KEY (id_usuario1) REFERENCES usuario(id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_sol_user2
        FOREIGN KEY (id_usuario2) REFERENCES usuario(id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE intereses (
    id_interes INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    titulo_articulo TEXT NOT NULL,
    descripcion TEXT,
    servicio TEXT,
    le_gusta TINYINT(1) DEFAULT 0,
    CONSTRAINT fk_interes_usuario
        FOREIGN KEY (id_usuario) REFERENCES usuario(id)
        ON UPDATE CASCADE ON DELETE CASCADE
);
