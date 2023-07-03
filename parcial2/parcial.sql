-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-06-2023 a las 13:55:51
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `apellido`, `dni`) VALUES
(1, 'Rodrigo', 'Castillo', 42356568),
(3, 'Exequiel', 'Castro', 123456),
(4, 'Fernando', ' Muñoz', 5412);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion`
--

DROP TABLE IF EXISTS `condicion`;
CREATE TABLE IF NOT EXISTS `condicion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `condicion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `condicion`
--

INSERT INTO `condicion` (`id`, `condicion`) VALUES
(1, 'regular'),
(2, 'libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

DROP TABLE IF EXISTS `inscripcion`;
CREATE TABLE IF NOT EXISTS `inscripcion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mesa_ins` int NOT NULL COMMENT 'fk',
  `alumno_ins` int NOT NULL COMMENT 'fk',
  `condicion_ins` int NOT NULL COMMENT 'fk',
  `fecha_ins` date NOT NULL,
  `asistencia` int NOT NULL,
  `nota` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mesa_ins` (`mesa_ins`),
  KEY `alumno_ins` (`alumno_ins`),
  KEY `condicion_ins` (`condicion_ins`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `mesa_ins`, `alumno_ins`, `condicion_ins`, `fecha_ins`, `asistencia`, `nota`) VALUES
(1, 1, 1, 2, '2023-06-10', 0, 0),
(2, 1, 4, 1, '2023-06-10', 0, 0),
(3, 1, 3, 2, '2023-06-10', 0, 0),
(4, 2, 4, 1, '2023-06-10', 0, 0),
(5, 2, 3, 2, '2023-06-12', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa_examen`
--

DROP TABLE IF EXISTS `mesa_examen`;
CREATE TABLE IF NOT EXISTS `mesa_examen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `materia` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_mesa` int NOT NULL COMMENT 'fk_tipomesa',
  `profesor_titutlar` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `profesor_vocal1` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `profesor_vocal2` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_mesa` (`tipo_mesa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `mesa_examen`
--

INSERT INTO `mesa_examen` (`id`, `materia`, `tipo_mesa`, `profesor_titutlar`, `profesor_vocal1`, `profesor_vocal2`, `fecha`) VALUES
(1, 'Programacion', 2, 'a', 'b', 'c', '2023-06-21'),
(2, 'Contexto', 2, 'sa', 'a', 'eq', '2023-06-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `clave` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nom_completo` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `perfil` int NOT NULL COMMENT 'fk',
  PRIMARY KEY (`id`),
  KEY `perfil` (`perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `nom_completo`, `perfil`) VALUES
(1, 'rodrigo', '123', 'Rodrigo Fabian Castillo', 1),
(2, 'Exe', '123', 'Exequiel Castro', 2),
(3, 'Fer', '123', 'Fernando Muñoz', 2),
(4, 'Maxi', '123', 'Maximiliano Cordoba', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_perfil`
--

DROP TABLE IF EXISTS `usuario_perfil`;
CREATE TABLE IF NOT EXISTS `usuario_perfil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `perfil` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perfil` (`perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_perfil`
--

INSERT INTO `usuario_perfil` (`id`, `perfil`) VALUES
(1, 'administrativo'),
(2, 'operador');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`condicion_ins`) REFERENCES `condicion` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`alumno_ins`) REFERENCES `alumno` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `inscripcion_ibfk_3` FOREIGN KEY (`mesa_ins`) REFERENCES `mesa_examen` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `mesa_examen`
--
ALTER TABLE `mesa_examen`
  ADD CONSTRAINT `mesa_examen_ibfk_1` FOREIGN KEY (`tipo_mesa`) REFERENCES `condicion` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`perfil`) REFERENCES `usuario_perfil` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
