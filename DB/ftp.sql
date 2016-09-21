-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2013 a las 16:55:01
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ftp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE IF NOT EXISTS `archivos` (
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `size` varchar(20) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `materia` varchar(40) NOT NULL,
  `matriculaUsuario` varchar(30) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `matricula_Usuario` varchar(20) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `hora` varchar(20) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `archivo` varchar(50) NOT NULL,
  PRIMARY KEY (`matricula_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
  `Nombre` varchar(30) NOT NULL,
  `Apellido_Paterno` varchar(30) NOT NULL,
  `Matricula` varchar(30) NOT NULL,
  `Correo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`Nombre`, `Apellido_Paterno`, `Matricula`, `Correo`) VALUES
('Juan Carlos', 'Martinez', '11111111', 'juan@hotmail.com'),
('Rogelio', 'Reyes', '22222222', 'royerjava@hotmail.com'),
('Andres', 'Granados', '33333333', 'andie@hotmail.com'),
('Herlinda', 'Martinez', '44444444', 'herlinda@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `folio` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `grupo` varchar(30) NOT NULL,
  `matriculaDocente` varchar(30) NOT NULL,
  PRIMARY KEY (`folio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`folio`, `nombre`, `grupo`, `matriculaDocente`) VALUES
('1', 'Circuitos Electricos I', 'ISC301M', '11111111'),
('2', 'Programacion Estructurada', 'ISC301M', '22222222'),
('3', 'Circuitos Logicos', 'ISC301M', '11111111'),
('4', 'Programacion Orientada a Objetos', 'ISC301M', '22222222'),
('5', 'Fisica III', 'ISC301M', '33333333'),
('6', 'Calculo Integral I', 'ISC301M', '44444444'),
('7', 'Matematicas Aplicadas', 'ISC601M', '44444444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Nombre` varchar(30) NOT NULL,
  `Apellido_Paterno` varchar(30) NOT NULL,
  `Matricula` varchar(30) NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `Grupo` varchar(20) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  PRIMARY KEY (`Matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre`, `Apellido_Paterno`, `Matricula`, `Correo`, `Grupo`, `Estado`) VALUES
('Juan Carlos', 'Martinez', '11111111', 'juan@hotmail.com', '', 'Activo'),
('Jose Eduardo', 'Galvan', '2012210522', 'pqjazzn@gmail.com', 'ISC301M', 'Activo'),
('Luis', 'Gutierrez', '23232323', 'luis@hotmail.com', 'ISC301M', 'Activo'),
('Andres', 'Granados', '33333333', 'andie@hotmail.com', '-', 'Activo'),
('Herlinda', 'Martinez', '44444444', 'herlinda@hotmail.com', '-', 'Activo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
