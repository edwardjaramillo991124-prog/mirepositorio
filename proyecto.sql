-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-09-2026 a las 19:27:06
-- Versión del servidor: 8.4.7
-- Versión de PHP: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

DROP TABLE IF EXISTS `cita`;
CREATE TABLE IF NOT EXISTS `cita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paciente` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medico` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` enum('Pendiente','Confirmada','Cancelada','Ausente') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `medico` (`medico`),
  KEY `paciente` (`paciente`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id`, `paciente`, `medico`, `fecha`, `estado`, `hora`) VALUES
(10, '1007757244', '94250364', '2026-08-31', 'Pendiente', '09:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorio`
--

DROP TABLE IF EXISTS `consultorio`;
CREATE TABLE IF NOT EXISTS `consultorio` (
  `id` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

DROP TABLE IF EXISTS `historia_clinica`;
CREATE TABLE IF NOT EXISTS `historia_clinica` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paciente` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medico` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cita` int DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `diagnostico` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `medico` (`medico`),
  KEY `paciente` (`paciente`),
  KEY `cita` (`cita`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_medicos`
--

DROP TABLE IF EXISTS `horarios_medicos`;
CREATE TABLE IF NOT EXISTS `horarios_medicos` (
  `horario_id` int NOT NULL AUTO_INCREMENT,
  `medico_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_semana` enum('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `duracion_turno_minutos` int DEFAULT '30',
  PRIMARY KEY (`horario_id`),
  KEY `medico_id` (`medico_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horarios_medicos`
--

INSERT INTO `horarios_medicos` (`horario_id`, `medico_id`, `dia_semana`, `hora_inicio`, `hora_fin`, `duracion_turno_minutos`) VALUES
(1, '94250364', 'Lunes', '08:00:00', '12:00:00', 30),
(2, '94250364', 'Lunes', '13:00:00', '17:00:00', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id`, `nombre`, `id_usuario`) VALUES
('94250364', 'EMILIO MONTENEGRO', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `telefono`, `correo`, `id_usuario`, `fecha_nacimiento`) VALUES
('1115195305', 'JHON', '', 'CASTILLO', '', '3102585452', 'jhoncastillo@gmail.com', 28, '1999-02-01'),
('1115195251', 'EDWARD', 'STEVEN', 'JARAMILLO', 'AGUIRRE', '3186997614', 'edward.jaramillo991124@gmail.com', 2, '1999-11-24'),
('1115191023', 'YENIFER', 'ANDREA', 'CHICANGANA', 'CHICANGANA', '3174514255', 'yeniferandreac@gmail.com', 3, '1994-05-27'),
('1007757244', 'ESTEFANIA', '', 'DIAZ', '', '3186997614', 'raquelalvarezpaz@gmail.com', 27, '2001-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionista`
--

DROP TABLE IF EXISTS `recepcionista`;
CREATE TABLE IF NOT EXISTS `recepcionista` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recepcionista`
--

INSERT INTO `recepcionista` (`id`, `nombre`, `id_usuario`) VALUES
('1115195251', 'EDWARD JARAMILLO', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recordatorio`
--

DROP TABLE IF EXISTS `recordatorio`;
CREATE TABLE IF NOT EXISTS `recordatorio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cita` int DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cita` (`cita`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pass` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rol` char(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `pass`, `rol`, `estado`) VALUES
(2, '1115195251', 'Edward', '2', '1'),
(3, '1115191023', 'Yenifer', '3', '1'),
(13, '94250364', '1234', '3', '1'),
(27, '1007757244', '1234', '1', '1'),
(28, '1115195305', '1234', '1', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
