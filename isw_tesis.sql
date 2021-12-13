-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2021 a las 05:00:02
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
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `user` varchar(20) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `user`, `contrasena`) VALUES
(1, 'admin', '0a584b7d48a2e6108bbbded4fbafe343'),
(2, 'catt', 'd733afaf22f2e27575a2811c19258280');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `num_boleta` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `contrasena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`num_boleta`, `nombre`, `email`, `rol`, `contrasena`) VALUES
(2018554880, 'Tecla Parra Roberto', 'tecliux@gmail.com', 'Trabajador', '123456'),
(2019630425, 'Moreno Lozano Omar', 'omarmorleno@gmail.com', 'Alumno', 'omarmoreno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profestesis`
--

CREATE TABLE `profestesis` (
  `id` int(100) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `numtesis` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profestesis`
--

INSERT INTO `profestesis` (`id`, `nombre`, `numtesis`) VALUES
(10, 'FRANCO MARTINEZ EDGARDO ADRIAN', 1),
(11, 'CATALáN SALGADO EDGAR ARMANDO', 1),
(12, 'RODRIGUEZ SARABIA TANIA', 1),
(13, 'SERRANO TALAMANTES JOSE FéLIX', 1),
(14, 'TECLA PARRA ROBERTO', 4),
(15, 'LUNA BENOSO BENJAMIN', 2),
(16, 'NIETO PEñA ENRIQUE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis`
--

CREATE TABLE `tesis` (
  `id` int(100) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `escuela` varchar(100) NOT NULL,
  `anio` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `boleta1` int(11) NOT NULL,
  `boleta2` int(11) NOT NULL,
  `boleta3` int(11) NOT NULL,
  `boleta4` int(11) NOT NULL,
  `profe1` varchar(30) NOT NULL,
  `profe2` varchar(30) NOT NULL,
  `cita` varchar(400) NOT NULL,
  `clasificacion` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `link` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tesis`
--

INSERT INTO `tesis` (`id`, `nombre`, `escuela`, `anio`, `fecha`, `boleta1`, `boleta2`, `boleta3`, `boleta4`, `profe1`, `profe2`, `cita`, `clasificacion`, `estado`, `link`) VALUES
(1, 'SIGA CLUB', 'escom', 2021, '2021-12-09', 2019630425, 2019630444, 0, 0, 'FRANCO MARTINEZ EDGARDO ADRIAN', '', 'Mejia, Moreno, SIGA CLUB, ESCOM', 'protocolo', 'En revision', 'http://localhost/niws/tesis/protocolo-SIGA-club.pdf'),
(2, 'SISTEMA DE EVALUACIóN DEL NIVEL DE PELIGRO SEGúN LA ESTRUCTURA URBANA ENFOCADO AL ROBO DE VEHíCULOS (SERVAL)', 'escom', 2016, '2021-12-08', 2013630495, 2013630985, 0, 0, 'CATALáN SALGADO EDGAR ARMANDO', '', 'Eustaquio, Torres, 2017, SERVAL, ESCOM', 'tesis', '', 'http://localhost/niws/tesis/Tesina-(2).pdf'),
(3, 'PROTOTIPO DE SISTEMA DE RECONOCIMIENTO DE AUTOMóVILES', 'ESCOM', 2019, '2021-12-06', 2014630005, 2014630319, 2016630328, 0, 'RODRIGUEZ SARABIA TANIA', 'SERRANO TALAMANTES JOSE FéLIX', 'Aguilera, Minajas, Robles, 2019, Prototipo de Sistema de Reconocimiento de Automóviles', 'tesis', '', 'http://localhost/niws/tesis/Prototipo-de-Sistema-de-Reconocimiento-de-Automóviles.pdf'),
(4, 'LA MEJOR TESIS GENERICA', 'Escom', 2020, '2021-12-09', 2019630444, 0, 0, 0, 'TECLA PARRA ROBERTO', '', 'Mejia, La mejor tesis generica, 2020, ESCOM', 'protocolo', 'En revision', 'http://localhost/niws/tesis/Propuesta1.pdf'),
(5, 'FELIZ NAVIDAD PROFESORA', 'escom', 2021, '2021-12-12', 2019630433, 2019630487, 0, 0, 'TECLA PARRA ROBERTO', 'LUNA BENOSO BENJAMIN', 'Martinez, Vergara, Feliz navidad profesora, 2021, ESCOM', 'tesis', '', 'http://localhost/niws/tesis/Felices-fiestas.pdf'),
(6, 'MICHIS DOING KIASER', 'upitta', 2019, '2021-11-30', 2015489788, 0, 0, 0, 'NIETO PEñA ENRIQUE', '', 'Rodriguez, michis doing kiaser, 2019, UPITTA', 'protocolo', 'En revision', 'http://localhost/niws/tesis/hoja.pdf'),
(7, 'WHY IS LUISMI BEAUTIFUL?', 'ESCOM', 2020, '2021-12-07', 2020630581, 0, 0, 0, 'TECLA PARRA ROBERTO', '', 'Gutierrez, Why is Luismi Beautiful?, 2020, ESCOM', 'version', '', 'http://localhost/niws/tesis/EBOOK---Salarios-TI-en-México-2021---CodersLink.pdf'),
(8, 'YA POR FAVOR', 'escom', 2021, '2021-12-12', 2019630424, 0, 0, 0, 'LUNA BENOSO BENJAMIN', 'TECLA PARRA ROBERTO', 'Bocanegra, Ya por favor, 2021, ESCOM', 'protocolo', 'Rechazado', 'http://localhost/niws/tesis/EXPOSICON.pdf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`num_boleta`);

--
-- Indices de la tabla `profestesis`
--
ALTER TABLE `profestesis`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `profestesis`
--
ALTER TABLE `profestesis`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tesis`
--
ALTER TABLE `tesis`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
