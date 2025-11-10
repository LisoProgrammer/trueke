-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2025 a las 18:25:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trueke`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `primer_nombre` text NOT NULL,
  `primer_apellido` text NOT NULL,
  `foto_perfil` text NOT NULL,
  `correo_institucional` text NOT NULL,
  `hash_contrasena` text NOT NULL,
  `calificacion` decimal(2,1) DEFAULT 0.5 CHECK (`calificacion` between 0.5 and 5.0),
  `n_votantes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `primer_nombre`, `primer_apellido`, `foto_perfil`, `correo_institucional`, `hash_contrasena`, `calificacion`, `n_votantes`) VALUES
(1, 'Lisandro', 'Zapata', '', 'lizapata@utb.edu.co', '$2y$10$af4nH7I7CxFoFBfG0/XRRucJYI61NxExdwCBFZd7lEu6W9Fn7uV46', 0.5, 0),
(2, 'Javier', 'Mercado', '', 'jbolivar@utb.edu.co', '$2y$10$ppHTXWS3L09lnVUQ4iBwGu3SvEZOfirJ1kFGH9breqZ7T0FTNDgKe', 0.5, 0),
(3, 'Juan', 'Ramos', '', 'jramos@utb.edu.co', '$2y$10$l236WTwq/h0meO4HywQRXu5YOuJ5iBrPbMBMf3ZFFwaF7.L1eYUju', 0.5, 0),
(4, 'Juana', 'Florez', '', 'florezj@utb.edu.co', '$2y$10$Xq5lfoEb.W4swpRV/7CsS.iXFf8R6qEsicBru/Lt3u.IPrAIweUve', 0.5, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo_institucional` (`correo_institucional`) USING HASH;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
