-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2017 a las 00:37:35
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pronutrico`
--
CREATE DATABASE `pronutrico` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `pronutrico`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tchofer`
--

CREATE TABLE IF NOT EXISTS `tchofer` (
  `chofer_id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `transportista_id` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`chofer_id`),
  KEY `fk_transportista_id` (`transportista_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tchofer`
--

INSERT INTO `tchofer` (`chofer_id`, `cedula`, `nombre`, `apellido`, `direccion`, `correo`, `telefono`, `transportista_id`, `estatus`) VALUES
(1, '19902881', 'JULIAN', 'PATINO', 'EL ESTE PATRIO', 'JULIAN@FORTRAN.COM', '04160984343', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodulo`
--

CREATE TABLE IF NOT EXISTS `tmodulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(1) NOT NULL,
  `posicion` int(11) DEFAULT NULL,
  `icono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url_modulo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tmodulo`
--

INSERT INTO `tmodulo` (`id_modulo`, `nombre`, `estatus`, `posicion`, `icono`, `url_modulo`) VALUES
(6, 'CONFIGURACION', 1, 1, NULL, NULL),
(7, 'SEGURIDAD', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol`
--

CREATE TABLE IF NOT EXISTS `trol` (
  `codigo` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `trol`
--

INSERT INTO `trol` (`codigo`, `nombre`, `estatus`) VALUES
(3, 'ADMINISTRADOR', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol_servicio`
--

CREATE TABLE IF NOT EXISTS `trol_servicio` (
  `id_rol_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `estatus` int(1) NOT NULL,
  PRIMARY KEY (`id_rol_servicio`),
  KEY `id_rol` (`id_rol`),
  KEY `id_servicio` (`id_servicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=289 ;

--
-- Volcado de datos para la tabla `trol_servicio`
--

INSERT INTO `trol_servicio` (`id_rol_servicio`, `id_rol`, `id_servicio`, `estatus`) VALUES
(282, 3, 3, 0),
(283, 3, 1, 0),
(284, 3, 4, 0),
(285, 3, 2, 0),
(286, 3, 5, 0),
(287, 3, 6, 0),
(288, 3, 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tservicio`
--

CREATE TABLE IF NOT EXISTS `tservicio` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(1) NOT NULL,
  `posicion` int(11) DEFAULT NULL,
  `icono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_servicio`),
  KEY `id_modulo` (`id_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `tservicio`
--

INSERT INTO `tservicio` (`id_servicio`, `id_modulo`, `nombre`, `url`, `estatus`, `posicion`, `icono`) VALUES
(1, 6, 'MODULO', 'vistaTmodulo.php', 1, 1, NULL),
(2, 6, 'SERVICIO', 'vistaTservicio.php', 1, 2, NULL),
(3, 7, 'ROL', 'vistaTrol.php', 1, 1, NULL),
(4, 7, 'USUARIO', 'vistaTusuario.php', 1, 2, NULL),
(5, 6, 'TRANSPORTISTA', 'vistaTtransportista.php', 0, 3, ''),
(6, 6, 'CHOFER', 'vistaTchofer.php', 0, 4, ''),
(7, 6, 'VEHICULO', 'vistaTvehiculo.php', 0, 5, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttransportista`
--

CREATE TABLE IF NOT EXISTS `ttransportista` (
  `transportista_id` int(11) NOT NULL AUTO_INCREMENT,
  `rif` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `razon_social` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`transportista_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ttransportista`
--

INSERT INTO `ttransportista` (`transportista_id`, `rif`, `razon_social`, `direccion`, `correo`, `telefono`, `estatus`) VALUES
(1, '19455541', 'TRANSPORTES RUFO', 'URB LOS APAMATES', 'RUFOS@GMAIL.COM', '04160984789', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE IF NOT EXISTS `tusuario` (
  `nombre_usu` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `clave` char(41) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(1) NOT NULL,
  `pregunta` text COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` text COLLATE utf8_spanish_ci NOT NULL,
  `intentos` int(11) NOT NULL DEFAULT '0',
  `estatus` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1',
  `nombre_completo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_usuario`),
  KEY `tipo` (`tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`nombre_usu`, `clave`, `tipo`, `pregunta`, `respuesta`, `intentos`, `estatus`, `nombre_completo`, `correo`, `id_usuario`) VALUES
('wmcarlos', 'carlos19455541', 3, 'NOMBRE DE MI PRIMERA MASCOTA', 'MANCHITA', 0, '1', 'CARLOS VARGAS', 'LIBROSDELPROGRAMADOR@GMAIL.COM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tvehiculo`
--

CREATE TABLE IF NOT EXISTS `tvehiculo` (
  `vehiculo_id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `modelo` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `placa` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `serialmotor` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`vehiculo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tchofer`
--
ALTER TABLE `tchofer`
  ADD CONSTRAINT `fk_transportista_id` FOREIGN KEY (`transportista_id`) REFERENCES `ttransportista` (`transportista_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `trol_servicio`
--
ALTER TABLE `trol_servicio`
  ADD CONSTRAINT `trol_servicio_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `tservicio` (`id_servicio`),
  ADD CONSTRAINT `trol_servicio_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `trol` (`codigo`);

--
-- Filtros para la tabla `tservicio`
--
ALTER TABLE `tservicio`
  ADD CONSTRAINT `tservicio_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `tmodulo` (`id_modulo`);

--
-- Filtros para la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD CONSTRAINT `tusuario_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `trol` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
