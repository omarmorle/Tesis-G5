-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2021 a las 09:13:25
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `isw_tesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `num_boleta` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`num_boleta`, `nombre`, `email`, `contrasena`, `rol`) VALUES
(2019630425, 'Omar Moreno Lozano', 'omarmorleno@gmail.com', 'contrasena', 'Alumno'),
(2019630444, 'Yair Mejia', 'yartsmuxoflow@gmai.com', '12345678', 'Trabajador'),
(2019630458, 'Yosoy Chotin', 'sisoy@choto.com', '123456', 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis`
--

CREATE TABLE `tesis` (
  `id` int(100) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `escuela` varchar(100) NOT NULL,
  `anio` int(5) NOT NULL,
  `boleta1` int(11) NOT NULL,
  `boleta2` int(11) NOT NULL,
  `boleta3` int(11) NOT NULL,
  `boleta4` int(11) NOT NULL,
  `profe1` int(15) NOT NULL,
  `profe2` int(15) NOT NULL,
  `link` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tesis`
--

INSERT INTO `tesis` (`id`, `nombre`, `escuela`, `anio`, `boleta1`, `boleta2`, `boleta3`, `boleta4`, `profe1`, `profe2`, `link`) VALUES
(1, 'SISTEMA DE GESTIÓN DE ASISTENCIA Y ACTIVIDADES PARA CLUBES ESCOLARES SIGA-CLUB', 'ESCOM', 2021, 2019630444, 2019630425, 0, 0, 777, 0, 'http://localhost/niws/tesis/protocolo SIGA-club.pdf'),
(2, 'APLICACION WEB PARA REFORZAMIENTO DE MATEMATICAS PARA NIVEL SECUNDARIA MEDIANTE QUIZZES CON ANALISIS DE DATOS APLICANDO MÉTODOS DE MACHINE LEARNING', 'ESCOM', 2020, 2014080736, 2014090423, 2013090075, 0, 52039, 0, 'http://localhost/niws/tesis/Aplicacion-Web-para-reforzamiento-de-matematicas-para-nivel-secundaria-mediante-quizzes-con-analisis-de-datos-aplicando-métodos-de-machine-learning.pdf'),
(3, 'PROTOTIPO DE SISTEMA DE RECONOCIMIENTO DE AUTOMÓVILES', 'ESCOM', 2020, 2014630005, 2014630319, 2016630328, 0, 52010, 520101, 'http://localhost/niws/tesis/Prototipo-de-Sistema-de-Reconocimiento-de-Automóviles.pdf'),
(4, 'PROTOTIPO DE RECORRIDO VIRTUAL INMERSIVO A DOS SALAS DEL PALACIO DE BELLAS ARTES', 'ESCOM', 2021, 2018321102, 2019630079, 2019630522, 2019630083, 52038, 0, 'http://localhost/niws/tesis/PROTOTIPO-DE-RECORRIDO-VIRTUAL-INMERSIVO-A-DOS-SALAS-DEL.pdf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`num_boleta`);

--
-- Indices de la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tesis`
--
ALTER TABLE `tesis`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
