-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2023 a las 04:15:17
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca_inter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `ID` int(11) NOT NULL,
  `Nombre_cliente` varchar(50) NOT NULL,
  `Cedula_cliente` varchar(10) NOT NULL,
  `Titulo_libro` varchar(100) NOT NULL,
  `Editorial_libro` varchar(100) NOT NULL,
  `Fecha_dev` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `ID` int(11) NOT NULL,
  `Titulo_libro` varchar(100) NOT NULL,
  `Autor_libro` varchar(50) NOT NULL,
  `Editorial_libro` varchar(100) NOT NULL,
  `Numero_paginas` int(11) NOT NULL,
  `Portada` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`ID`, `Titulo_libro`, `Autor_libro`, `Editorial_libro`, `Numero_paginas`, `Portada`) VALUES
(7, 'El caballero de la armadura oxidada', 'Robert Fisher', 'Obelisco', 108, 0x706f7274616461732f636162616c6c65726f2e6a7067),
(8, 'María', 'Jorge Isaacs', 'Samuel', 266, 0x706f7274616461732f4d6172c3ad615f2831383939292e6a7067),
(9, 'EL LAZARILLO DE TORMES', 'Anonimo', 'Mestas Ediciones S.L.', 96, 0x706f7274616461732f6c617a6172696c6c6f2e77656270),
(10, 'Juan Salvador Gaviota', 'Richard Bach', 'Ediciones B', 144, 0x706f7274616461732f676176696f74612e77656270),
(12, 'El Principito', 'Antoine De Saint-Exupéry', 'Emecé', 112, 0x706f7274616461732f456c5f7072696e63697069746f2e6a7067),
(13, 'La Divina Comedia', 'Dante Alighieri', 'Createspace Independent Publishing Platform', 304, 0x706f7274616461732f446976696e6120432e77656270),
(14, 'La Torá', 'Anónimo', 'Createspace Independent Publishing Platform', 788, 0x706f7274616461732f546f72612e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `ID` int(11) NOT NULL,
  `Nombre_cliente` varchar(50) NOT NULL,
  `Cedula_cliente` varchar(10) NOT NULL,
  `Titulo_libro` varchar(100) NOT NULL,
  `Editorial_libro` varchar(100) NOT NULL,
  `Fecha_pre` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
