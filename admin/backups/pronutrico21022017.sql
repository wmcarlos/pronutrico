-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Fev-2017 às 13:16
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pronutrico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chofer`
--

CREATE TABLE `chofer` (
  `cedula` varchar(20) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `despacho`
--

CREATE TABLE `despacho` (
  `nro_despacho` int(11) NOT NULL,
  `fecha_despacho` date NOT NULL,
  `cedula_supervisor` varchar(20) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linea_despacho`
--

CREATE TABLE `linea_despacho` (
  `codigo_linea_despacho` int(11) NOT NULL,
  `nro_despacho` int(11) NOT NULL,
  `codigo_turno` int(11) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linea_recepcion`
--

CREATE TABLE `linea_recepcion` (
  `codigo_linea` int(11) NOT NULL,
  `nro_recepcion` int(11) NOT NULL,
  `codigo_transporte` int(11) NOT NULL,
  `cedula_chofer` varchar(20) NOT NULL,
  `placa` varchar(15) NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `origen`
--

CREATE TABLE `origen` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `producto`
--

CREATE TABLE `producto` (
  `codigo_producto` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `codigo_unidad_medida` int(11) NOT NULL,
  `cantidad_minima` int(11) NOT NULL,
  `cantidad_maxima` int(11) NOT NULL,
  `existencia` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recepcion`
--

CREATE TABLE `recepcion` (
  `nro_recepcion` int(11) NOT NULL,
  `fecha_recepcion` date NOT NULL,
  `codigo_origen` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `supervisor`
--

CREATE TABLE `supervisor` (
  `cedula` varchar(20) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tmodulo`
--

CREATE TABLE `tmodulo` (
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(1) NOT NULL,
  `posicion` int(11) DEFAULT NULL,
  `icono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url_modulo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Extraindo dados da tabela `tmodulo`
--

INSERT INTO `tmodulo` (`id_modulo`, `nombre`, `estatus`, `posicion`, `icono`, `url_modulo`) VALUES
(6, 'CONFIGURACION', 1, 1, NULL, NULL),
(7, 'SEGURIDAD', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transporte`
--

CREATE TABLE `transporte` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `trol`
--

CREATE TABLE `trol` (
  `codigo` int(1) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Extraindo dados da tabela `trol`
--

INSERT INTO `trol` (`codigo`, `nombre`, `estatus`) VALUES
(3, 'ADMINISTRADOR', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trol_servicio`
--

CREATE TABLE `trol_servicio` (
  `id_rol_servicio` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Extraindo dados da tabela `trol_servicio`
--

INSERT INTO `trol_servicio` (`id_rol_servicio`, `id_rol`, `id_servicio`, `estatus`) VALUES
(5, 3, 1, 0),
(6, 3, 2, 0),
(8, 3, 3, 0),
(9, 3, 4, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tservicio`
--

CREATE TABLE `tservicio` (
  `id_servicio` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(1) NOT NULL,
  `posicion` int(11) DEFAULT NULL,
  `icono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Extraindo dados da tabela `tservicio`
--

INSERT INTO `tservicio` (`id_servicio`, `id_modulo`, `nombre`, `url`, `estatus`, `posicion`, `icono`) VALUES
(1, 6, 'MODULO', 'vistaTmodulo.php', 1, 1, NULL),
(2, 6, 'SERVICIO', 'vistaTservicio.php', 1, 2, NULL),
(3, 7, 'ROL', 'vistaTrol.php', 1, 1, NULL),
(4, 7, 'USUARIO', 'vistaTusuario.php', 1, 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

CREATE TABLE `turno` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tusuario`
--

CREATE TABLE `tusuario` (
  `nombre_usu` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `clave` char(41) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(1) NOT NULL,
  `pregunta` text COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` text COLLATE utf8_spanish_ci NOT NULL,
  `intentos` int(11) NOT NULL DEFAULT '0',
  `estatus` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1',
  `nombre_completo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Extraindo dados da tabela `tusuario`
--

INSERT INTO `tusuario` (`nombre_usu`, `clave`, `tipo`, `pregunta`, `respuesta`, `intentos`, `estatus`, `nombre_completo`, `correo`, `id_usuario`) VALUES
('wmcarlos', 'carlos19455541', 3, 'NOMBRE DE MI PRIMERA MASCOTA', 'MANCHITA', 0, '1', 'CARLOS VARGAS', 'LIBROSDELPROGRAMADOR@GMAIL.COM', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `codigo` int(11) NOT NULL,
  `siglas` varchar(15) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chofer`
--
ALTER TABLE `chofer`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `despacho`
--
ALTER TABLE `despacho`
  ADD PRIMARY KEY (`nro_despacho`),
  ADD KEY `fk_cedula_supervisor` (`cedula_supervisor`);

--
-- Indexes for table `linea_despacho`
--
ALTER TABLE `linea_despacho`
  ADD PRIMARY KEY (`codigo_linea_despacho`),
  ADD KEY `fk_nro_despacho` (`nro_despacho`),
  ADD KEY `fk_codigo_turno` (`codigo_turno`),
  ADD KEY `fk_codigo_producto01` (`codigo_producto`);

--
-- Indexes for table `linea_recepcion`
--
ALTER TABLE `linea_recepcion`
  ADD PRIMARY KEY (`codigo_linea`),
  ADD KEY `fk_nro_recepcion` (`nro_recepcion`),
  ADD KEY `fk_codigo_transporte` (`codigo_transporte`),
  ADD KEY `fk_cedula_chofer` (`cedula_chofer`),
  ADD KEY `fk_codigo_producto` (`codigo_producto`);

--
-- Indexes for table `origen`
--
ALTER TABLE `origen`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo_producto`),
  ADD KEY `fk_codigo_unidad_medida` (`codigo_unidad_medida`);

--
-- Indexes for table `recepcion`
--
ALTER TABLE `recepcion`
  ADD PRIMARY KEY (`nro_recepcion`),
  ADD KEY `fk_codigo_origen` (`codigo_origen`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `tmodulo`
--
ALTER TABLE `tmodulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indexes for table `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `trol`
--
ALTER TABLE `trol`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `trol_servicio`
--
ALTER TABLE `trol_servicio`
  ADD PRIMARY KEY (`id_rol_servicio`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indexes for table `tservicio`
--
ALTER TABLE `tservicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- Indexes for table `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo` (`tipo`);

--
-- Indexes for table `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `linea_despacho`
--
ALTER TABLE `linea_despacho`
  MODIFY `codigo_linea_despacho` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `linea_recepcion`
--
ALTER TABLE `linea_recepcion`
  MODIFY `codigo_linea` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `origen`
--
ALTER TABLE `origen`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `codigo_producto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmodulo`
--
ALTER TABLE `tmodulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transporte`
--
ALTER TABLE `transporte`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trol`
--
ALTER TABLE `trol`
  MODIFY `codigo` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trol_servicio`
--
ALTER TABLE `trol_servicio`
  MODIFY `id_rol_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;
--
-- AUTO_INCREMENT for table `tservicio`
--
ALTER TABLE `tservicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tusuario`
--
ALTER TABLE `tusuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `despacho`
--
ALTER TABLE `despacho`
  ADD CONSTRAINT `fk_cedula_supervisor` FOREIGN KEY (`cedula_supervisor`) REFERENCES `supervisor` (`cedula`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `linea_despacho`
--
ALTER TABLE `linea_despacho`
  ADD CONSTRAINT `fk_codigo_producto01` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codigo_turno` FOREIGN KEY (`codigo_turno`) REFERENCES `turno` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nro_despacho` FOREIGN KEY (`nro_despacho`) REFERENCES `despacho` (`nro_despacho`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `linea_recepcion`
--
ALTER TABLE `linea_recepcion`
  ADD CONSTRAINT `fk_cedula_chofer` FOREIGN KEY (`cedula_chofer`) REFERENCES `chofer` (`cedula`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codigo_producto` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codigo_transporte` FOREIGN KEY (`codigo_transporte`) REFERENCES `transporte` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nro_recepcion` FOREIGN KEY (`nro_recepcion`) REFERENCES `recepcion` (`nro_recepcion`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_codigo_unidad_medida` FOREIGN KEY (`codigo_unidad_medida`) REFERENCES `unidad_medida` (`codigo`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `recepcion`
--
ALTER TABLE `recepcion`
  ADD CONSTRAINT `fk_codigo_origen` FOREIGN KEY (`codigo_origen`) REFERENCES `origen` (`codigo`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `trol_servicio`
--
ALTER TABLE `trol_servicio`
  ADD CONSTRAINT `trol_servicio_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `trol` (`codigo`),
  ADD CONSTRAINT `trol_servicio_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `tservicio` (`id_servicio`);

--
-- Limitadores para a tabela `tservicio`
--
ALTER TABLE `tservicio`
  ADD CONSTRAINT `tservicio_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `tmodulo` (`id_modulo`);

--
-- Limitadores para a tabela `tusuario`
--
ALTER TABLE `tusuario`
  ADD CONSTRAINT `tusuario_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `trol` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
