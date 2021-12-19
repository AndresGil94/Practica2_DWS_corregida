-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2021 a las 17:30:45
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `studium_dws_p2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninos`
--

CREATE TABLE `ninos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `fechaDeNacimiento` varchar(255) NOT NULL,
  `bueno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ninos`
--

INSERT INTO `ninos` (`id`, `nombre`, `apellidos`, `fechaDeNacimiento`, `bueno`) VALUES
(5, 'Alberto', 'Alcantara', '1994/10/13', 0),
(7, 'Carlos', 'Crepo', '1998/12/01', 0),
(8, 'Diana', 'Dominguez', '1987/09/02', 0),
(12, 'Beatriz', 'Bueno', '1982/04/18', 1),
(13, 'Emilio', 'Enamorado', '1996/08/12', 1),
(14, 'Francisca', 'Fernandez', '1990/07/28', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninos_regalos`
--

CREATE TABLE `ninos_regalos` (
  `id` int(11) NOT NULL,
  `ninos_id` int(11) NOT NULL,
  `regalos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ninos_regalos`
--

INSERT INTO `ninos_regalos` (`id`, `ninos_id`, `regalos_id`) VALUES
(1, 5, 1),
(2, 5, 2),
(3, 5, 6),
(4, 12, 1),
(5, 5, 10),
(6, 5, 12),
(7, 7, 9),
(8, 7, 3),
(9, 7, 8),
(10, 13, 9),
(11, 13, 4),
(12, 13, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL,
  `rey_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`id`, `nombre`, `precio`, `rey_id`) VALUES
(1, 'Aula de ciencia: Robot Mini ERP', '159,95', 7),
(2, 'Carbon', '0,00', 7),
(3, 'Cochecito Classic', '99,95', 7),
(4, 'Consola PS4 1 TB', '349,90', 7),
(5, 'Lego Villa familiar modular', '64,99', 7),
(6, 'Magia Borrás Clásica 150 trucos con luz', '32,95', 6),
(7, 'Meccano Excavadora construcción', '30,99', 6),
(8, 'Nenuco Hace pompas', '29,95', 6),
(9, 'Peluche delfín rosa', '34,00', 6),
(10, 'Pequeordenador', '22,95', 5),
(11, 'Robot Coji', '69,95', 5),
(12, 'Telescopio astronómico terrestre', '72,00', 5),
(13, 'Twister', '17,95', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rey`
--

CREATE TABLE `rey` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rey`
--

INSERT INTO `rey` (`id`, `nombre`) VALUES
(5, 'Melchor'),
(6, 'Gaspar'),
(7, 'Baltasar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ninos`
--
ALTER TABLE `ninos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ninos_regalos`
--
ALTER TABLE `ninos_regalos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ninos_id` (`ninos_id`),
  ADD KEY `regalos_id` (`regalos_id`) USING BTREE;

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rey_id` (`rey_id`);

--
-- Indices de la tabla `rey`
--
ALTER TABLE `rey`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ninos`
--
ALTER TABLE `ninos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `ninos_regalos`
--
ALTER TABLE `ninos_regalos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `rey`
--
ALTER TABLE `rey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ninos_regalos`
--
ALTER TABLE `ninos_regalos`
  ADD CONSTRAINT `fk_ninos_id` FOREIGN KEY (`ninos_id`) REFERENCES `ninos` (`id`),
  ADD CONSTRAINT `fk_regalos_id` FOREIGN KEY (`regalos_id`) REFERENCES `regalos` (`id`);

--
-- Filtros para la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD CONSTRAINT `regalos_ibfk_1` FOREIGN KEY (`rey_id`) REFERENCES `rey` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
