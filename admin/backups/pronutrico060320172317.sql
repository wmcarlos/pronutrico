-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2017 a las 23:16:55
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcodigo_area`
--

CREATE TABLE IF NOT EXISTS `tcodigo_area` (
  `codigo_area` int(11) NOT NULL AUTO_INCREMENT,
  `codificacion` varchar(10) NOT NULL,
  `ubicacion` varchar(60) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tcodigo_area`
--

INSERT INTO `tcodigo_area` (`codigo_area`, `codificacion`, `ubicacion`, `estatus`) VALUES
(1, '0416', 'MOVILNET', 1),
(2, '0414', 'MOVISTAR', 1),
(3, '0424', 'MOVISTAR', 1),
(4, '0426', 'MOVILNET', 1),
(5, '0412', 'DIGITEL', 1),
(6, '0255', 'PORTUGUESA', 1),
(7, '0251', 'LARA', 1),
(8, '0254', 'YARACUY', 1),
(9, '0212', 'CARACAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdominio_correo`
--

CREATE TABLE IF NOT EXISTS `tdominio_correo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tdominio_correo`
--

INSERT INTO `tdominio_correo` (`codigo`, `nombre`, `estatus`) VALUES
(1, 'HOTMAIL.COM', 1),
(2, 'GMAIL.COM', 1),
(3, 'YAHOO.COM', 1),
(4, 'OUTLOOK.COM', 1),
(5, 'PRONUTRICO.COM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tentrada`
--

CREATE TABLE IF NOT EXISTS `tentrada` (
  `nro_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_entrada` date NOT NULL,
  `rif_proveedor` varchar(15) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nro_entrada`),
  KEY `fk_rif_proveedor` (`rif_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlinea_entrada`
--

CREATE TABLE IF NOT EXISTS `tlinea_entrada` (
  `codigo_linea_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `nro_entrada` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `rif_transportista` varchar(15) NOT NULL,
  `chofer` varchar(50) NOT NULL,
  `placa` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`codigo_linea_entrada`),
  KEY `fk_codigo_producto` (`codigo_producto`),
  KEY `fk_rif_transportista` (`rif_transportista`),
  KEY `fk_nro_entrada` (`nro_entrada`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlinea_salida`
--

CREATE TABLE IF NOT EXISTS `tlinea_salida` (
  `codigo_linea_salida` int(11) NOT NULL AUTO_INCREMENT,
  `nro_salida` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `matempcons` double DEFAULT NULL,
  `bolcom` double DEFAULT NULL,
  `desperdicio` double DEFAULT NULL,
  PRIMARY KEY (`codigo_linea_salida`),
  KEY `fk_codigo_producto1` (`codigo_producto`),
  KEY `nro_salida` (`nro_salida`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmarca`
--

CREATE TABLE IF NOT EXISTS `tmarca` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tmarca`
--

INSERT INTO `tmarca` (`codigo`, `nombre`, `estatus`) VALUES
(1, 'VENEZUELA', 1),
(2, 'NO APLICA', 1),
(3, 'CASA', 1),
(4, 'RMN', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tmodulo`
--

INSERT INTO `tmodulo` (`id_modulo`, `nombre`, `estatus`, `posicion`, `icono`, `url_modulo`) VALUES
(6, 'CONFIGURACION', 1, 1, NULL, NULL),
(7, 'SEGURIDAD', 1, 2, NULL, NULL),
(8, 'INVENTARIO', 0, 2, '', ''),
(9, 'REPORTES', 0, 3, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproducto`
--

CREATE TABLE IF NOT EXISTS `tproducto` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nacionalidad` char(1) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `tipo_producto` char(2) NOT NULL,
  `codigo_marca` int(11) NOT NULL,
  `codigo_unidad_medida` int(11) NOT NULL,
  `existencia_minima` int(11) NOT NULL,
  `existencia_maxima` int(11) NOT NULL,
  `existencia` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`),
  KEY `fk_codigo_marca` (`codigo_marca`),
  KEY `fk_codigo_unidad_medida` (`codigo_unidad_medida`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tproducto`
--

INSERT INTO `tproducto` (`codigo`, `nacionalidad`, `nombre`, `tipo_producto`, `codigo_marca`, `codigo_unidad_medida`, `existencia_minima`, `existencia_maxima`, `existencia`, `estatus`) VALUES
(1, 'V', 'MAÃZ', 'MP', 2, 3, 500000, 5000000, 0, 1),
(2, 'V', 'HARINA DE MAIZ', 'PT', 1, 2, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tproveedor`
--

CREATE TABLE IF NOT EXISTS `tproveedor` (
  `rif` varchar(15) NOT NULL,
  `razon_social` varchar(60) NOT NULL,
  `codigo_tipo_proveedor` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `codigo_area` int(11) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `codigo_dominio_correo` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`rif`),
  KEY `fk_codigo_tipo_proveedor` (`codigo_tipo_proveedor`),
  KEY `fk_codigo_area1` (`codigo_area`),
  KEY `fk_codigo_dominio_correo1` (`codigo_dominio_correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tproveedor`
--

INSERT INTO `tproveedor` (`rif`, `razon_social`, `codigo_tipo_proveedor`, `direccion`, `codigo_area`, `telefono`, `codigo_dominio_correo`, `correo`, `estatus`) VALUES
('J-123456789', 'CASA-IMPORTADORA', 1, 'ARAURE', 6, '6220987', 2, 'CASAIMPORTADORA', 1),
('J-223344556', 'CASA-SILOS GUACARA', 1, 'GUACARA', 5, '0984345', 1, 'SILOS_GUACARA', 1),
('J-334411890', 'LOGICASA', 2, 'LA GUAIRA', 2, '3345678', 1, 'LOGICASA', 1),
('J-445566777', 'SERV TRANSP FUFO', 2, 'ARAURE', 2, '4563738', 2, 'FUFO.TRANSPORTES', 1),
('J-634568976', 'ASOCI COOP PUERTO BOLIVAR', 2, 'BOLIVAR', 5, '4563234', 4, 'COOPBOLIVAR', 1),
('J-987654321', 'CASA-SILOS LA FLECHA', 1, 'ARAURE', 6, '6217156', 2, 'CASA.SILOS.LA.FLECHA', 1),
('V-19455541', 'IANCARINA', 1, 'ARAURE', 6, '6217144', 1, 'IANCARINA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol`
--

CREATE TABLE IF NOT EXISTS `trol` (
  `codigo` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `trol`
--

INSERT INTO `trol` (`codigo`, `nombre`, `estatus`) VALUES
(3, 'WEBMASTER', '1'),
(4, 'ADMINISTRADOR', ''),
(5, 'RECEPTOR', ''),
(6, 'COORDINADOR', ''),
(7, 'SUPERVISOR', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=49 ;

--
-- Volcado de datos para la tabla `trol_servicio`
--

INSERT INTO `trol_servicio` (`id_rol_servicio`, `id_rol`, `id_servicio`, `estatus`) VALUES
(20, 4, 5, 0),
(21, 4, 6, 0),
(22, 4, 7, 0),
(23, 4, 8, 0),
(24, 4, 9, 0),
(25, 4, 10, 0),
(26, 4, 11, 0),
(27, 4, 12, 0),
(37, 3, 1, 0),
(38, 3, 3, 0),
(39, 3, 4, 0),
(40, 3, 2, 0),
(41, 5, 13, 0),
(42, 5, 16, 0),
(43, 5, 10, 0),
(44, 6, 17, 0),
(45, 6, 11, 0),
(46, 7, 14, 0),
(47, 7, 17, 0),
(48, 7, 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsalida`
--

CREATE TABLE IF NOT EXISTS `tsalida` (
  `nro_salida` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_salida` date NOT NULL,
  `ceudula_supervisor` varchar(12) NOT NULL,
  `turno` char(2) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nro_salida`),
  KEY `fk_cedula_supervisor` (`ceudula_supervisor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `tservicio`
--

INSERT INTO `tservicio` (`id_servicio`, `id_modulo`, `nombre`, `url`, `estatus`, `posicion`, `icono`) VALUES
(1, 6, 'MODULO', 'vistaTmodulo.php', 1, 1, NULL),
(2, 6, 'SERVICIO', 'vistaTservicio.php', 1, 2, NULL),
(3, 7, 'ROL', 'vistaTrol.php', 1, 1, NULL),
(4, 7, 'USUARIO', 'vistaTusuario.php', 1, 2, NULL),
(5, 6, 'CÃ“DIGO DE AREA', 'vistaTcodigo_area.php', 0, 3, ''),
(6, 6, 'DOMINIO DE CORREO', 'vistaTdominio_correo.php', 0, 4, ''),
(7, 6, 'MARCA', 'vistaTmarca.php', 0, 5, ''),
(8, 6, 'UNIDAD DE MEDIDA', 'vistaTunidad_medida.php', 0, 6, ''),
(9, 6, 'TIPO PROVEEDOR', 'vistaTtipo_proveedor.php', 0, 7, ''),
(10, 6, 'PROVEEDOR', 'vistaTproveedor.php', 0, 8, ''),
(11, 6, 'SUPERVISOR', 'vistaTsupervisor.php', 0, 9, ''),
(12, 6, 'PRODUCTO', 'vistaTproducto.php', 0, 10, ''),
(13, 8, 'RECEPCION', 'vistaTentrada.php', 0, 1, ''),
(14, 8, 'DESPACHO', 'vistaTsalida.php', 0, 2, ''),
(15, 9, 'INVENTARIO', 'vistaReporte_inventario.php', 0, 1, ''),
(16, 9, 'RECEPCIONES', 'vistaReporte_recepciones.php', 0, 2, ''),
(17, 9, 'DESPACHOS', 'vistaReporte_despachos.php', 0, 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsupervisor`
--

CREATE TABLE IF NOT EXISTS `tsupervisor` (
  `cedula` varchar(12) NOT NULL,
  `nacionalidad` char(1) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `codigo_area` int(11) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `codigo_dominio_correo` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cedula`),
  KEY `fk_codigo_area` (`codigo_area`),
  KEY `fk_codigo_dominio_correo` (`codigo_dominio_correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tsupervisor`
--

INSERT INTO `tsupervisor` (`cedula`, `nacionalidad`, `nombres`, `apellidos`, `direccion`, `codigo_area`, `telefono`, `codigo_dominio_correo`, `email`, `estatus`) VALUES
('19455541', 'V', 'VICTOR', 'TORO', 'ARAURE', 5, '0984342', 5, 'VICTORTORO', 1),
('19455543', 'V', 'ENRIQUE', 'FENOMENO', 'ACARIGUA', 3, '0254789', 5, 'ENRIQUEFENOMENO', 1),
('19902887', 'V', 'GLADYS', 'COLMENAREZ', 'ARAURE', 4, '4431302', 5, 'GLADYSCOLMENAREZ', 1),
('19908447', 'V', 'WILLIAM', 'NAVARRO', 'ACARIGUA', 1, '0654178', 5, 'WILLIAMNAVAARRO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipo_proveedor`
--

CREATE TABLE IF NOT EXISTS `ttipo_proveedor` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ttipo_proveedor`
--

INSERT INTO `ttipo_proveedor` (`codigo`, `nombre`, `estatus`) VALUES
(1, 'PRODUCTOR', 1),
(2, 'TRANSPORTE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tunidad_medida`
--

CREATE TABLE IF NOT EXISTS `tunidad_medida` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tunidad_medida`
--

INSERT INTO `tunidad_medida` (`codigo`, `nombre`, `estatus`) VALUES
(2, 'BULTOS', 1),
(3, 'KILOGRAMOS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE IF NOT EXISTS `tusuario` (
  `nombre_usu` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `clave` char(41) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(1) DEFAULT NULL,
  `pregunta` text COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` text COLLATE utf8_spanish_ci NOT NULL,
  `intentos` int(11) NOT NULL DEFAULT '0',
  `estatus` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1',
  `nombre_completo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_usuario`),
  KEY `tipo` (`tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`nombre_usu`, `clave`, `tipo`, `pregunta`, `respuesta`, `intentos`, `estatus`, `nombre_completo`, `correo`, `id_usuario`) VALUES
('WEBMASTER', '123456', 3, 'NOMBRE DE MI PRIMERA MASCOTA', 'COLOR', 0, '1', 'VERDE', 'WEBMASTER@GMAIL.COM', 1),
('ADMINISTRADOR', '123456', 4, 'COLOR', 'ROJO', 0, '1', 'ADMINISTRADOR', 'ADMINISTRADOR@PRONUTRICO.COM', 2),
('COORDINADOR1', '123456', 5, 'COLOR', 'NARANJA', 0, '1', 'COORDINADOR 1', 'COORDINADOR1@PRONUTRICO.COM', 6),
('AUXILIAR', '123456', 5, 'COLOR', 'VERDE', 0, '1', 'AUXILIAR', 'AUXILIAR@PRONUTRICO.COM', 7),
('COORDINADOR2', '123456', 6, 'COLOR', 'ROJO', 0, '1', 'COORDINADOR 2', 'COORDINADOR2@PRONUTRICO.COM', 8),
('VTORO', '123456', 7, 'COLOR', 'AZUL', 0, '1', 'VICTOR TORO', 'VICTORTORO@PRONUTRICO.COM', 9),
('EFENOMENO', '123456', 7, 'COLOR', 'AMARILLO', 0, '1', 'ENRIQUE FENOMENO', 'ENRIQUEFENOMENO@PRONUTRICO.COM', 10),
('GCOLMENAREZ', '123456', 7, 'COLOR', 'ROSADO', 0, '1', 'GLADYS COLMENAREZ', 'GLADYSCOLMENAREZ@PRONUTRICO.COM', 11),
('WNAVARRO', '123456', 7, 'COLOR', 'TURQUESA', 0, '1', 'WILLIAM NAVARRO', 'WILLIAMNAVARRO@PRONUTRICO.COM', 12);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tentrada`
--
ALTER TABLE `tentrada`
  ADD CONSTRAINT `fk_rif_proveedor` FOREIGN KEY (`rif_proveedor`) REFERENCES `tproveedor` (`rif`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tlinea_entrada`
--
ALTER TABLE `tlinea_entrada`
  ADD CONSTRAINT `fk_codigo_producto` FOREIGN KEY (`codigo_producto`) REFERENCES `tproducto` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nro_entrada` FOREIGN KEY (`nro_entrada`) REFERENCES `tentrada` (`nro_entrada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rif_transportista` FOREIGN KEY (`rif_transportista`) REFERENCES `tproveedor` (`rif`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tlinea_salida`
--
ALTER TABLE `tlinea_salida`
  ADD CONSTRAINT `fk_codigo_producto1` FOREIGN KEY (`codigo_producto`) REFERENCES `tproducto` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nro_salida` FOREIGN KEY (`nro_salida`) REFERENCES `tsalida` (`nro_salida`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tproducto`
--
ALTER TABLE `tproducto`
  ADD CONSTRAINT `fk_codigo_marca` FOREIGN KEY (`codigo_marca`) REFERENCES `tmarca` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codigo_unidad_medida` FOREIGN KEY (`codigo_unidad_medida`) REFERENCES `tunidad_medida` (`codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tproveedor`
--
ALTER TABLE `tproveedor`
  ADD CONSTRAINT `fk_codigo_area1` FOREIGN KEY (`codigo_area`) REFERENCES `tcodigo_area` (`codigo_area`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codigo_tipo_proveedor` FOREIGN KEY (`codigo_tipo_proveedor`) REFERENCES `ttipo_proveedor` (`codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `trol_servicio`
--
ALTER TABLE `trol_servicio`
  ADD CONSTRAINT `trol_servicio_ibfk_4` FOREIGN KEY (`id_servicio`) REFERENCES `tservicio` (`id_servicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trol_servicio_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `trol` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tsalida`
--
ALTER TABLE `tsalida`
  ADD CONSTRAINT `fk_cedula_supervisor` FOREIGN KEY (`ceudula_supervisor`) REFERENCES `tsupervisor` (`cedula`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tservicio`
--
ALTER TABLE `tservicio`
  ADD CONSTRAINT `tservicio_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `tmodulo` (`id_modulo`);

--
-- Filtros para la tabla `tsupervisor`
--
ALTER TABLE `tsupervisor`
  ADD CONSTRAINT `fk_codigo_area` FOREIGN KEY (`codigo_area`) REFERENCES `tcodigo_area` (`codigo_area`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD CONSTRAINT `tusuario_ibfk_2` FOREIGN KEY (`tipo`) REFERENCES `trol` (`codigo`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
