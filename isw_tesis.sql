-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2021 a las 08:09:57
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
  `boleta1` int(11) NOT NULL,
  `boleta2` int(11) NOT NULL,
  `boleta3` int(11) NOT NULL,
  `boleta4` int(11) NOT NULL,
  `profe1` int(15) NOT NULL,
  `profe2` int(15) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`num_boleta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
