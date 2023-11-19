-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2023 a las 08:38:52
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
-- Estructura de tabla para la tabla `historial_libros_visitados`
--

CREATE TABLE `historial_libros_visitados` (
  `id_historial` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_libro` int(11) DEFAULT NULL,
  `fecha_visita` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial_libros_visitados`
--

INSERT INTO `historial_libros_visitados` (`id_historial`, `id_usuario`, `id_libro`, `fecha_visita`) VALUES
(5, 9, 20, '2023-11-19 07:14:47'),
(6, 9, 18, '2023-11-19 07:14:49'),
(7, 9, 17, '2023-11-19 07:14:53'),
(8, 9, 7, '2023-11-19 07:14:57'),
(9, 10, 8, '2023-11-19 07:17:03'),
(10, 10, 9, '2023-11-19 07:17:05'),
(11, 10, 10, '2023-11-19 07:17:07'),
(12, 10, 13, '2023-11-19 07:17:08'),
(13, 11, 16, '2023-11-19 07:22:03'),
(14, 11, 20, '2023-11-19 07:22:08'),
(15, 11, 13, '2023-11-19 07:22:13'),
(16, 11, 9, '2023-11-19 07:22:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `ID_libro` int(11) NOT NULL,
  `Titulo_libro` varchar(100) NOT NULL,
  `Autor_libro` varchar(50) NOT NULL,
  `Editorial_libro` varchar(100) NOT NULL,
  `Numero_paginas` int(11) NOT NULL,
  `Portada` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`ID_libro`, `Titulo_libro`, `Autor_libro`, `Editorial_libro`, `Numero_paginas`, `Portada`) VALUES
(7, 'El caballero de la armadura oxidada', 'Robert Fisher', 'Obelisco', 108, 0x706f7274616461732f636162616c6c65726f2e6a7067),
(8, 'María', 'Jorge Isaacs', 'Samuel', 266, 0x706f7274616461732f4d6172c3ad615f2831383939292e6a7067),
(9, 'EL LAZARILLO DE TORMES', 'Anonimo', 'Mestas Ediciones S.L.', 96, 0x706f7274616461732f6c617a6172696c6c6f2e77656270),
(10, 'Juan Salvador Gaviota', 'Richard Bach', 'Ediciones B', 144, 0x706f7274616461732f676176696f74612e77656270),
(12, 'El Principito', 'Antoine De Saint-Exupéry', 'Emecé', 112, 0x706f7274616461732f456c5f7072696e63697069746f2e6a7067),
(13, 'La Divina Comedia', 'Dante Alighieri', 'Createspace Independent Publishing Platform', 304, 0x706f7274616461732f446976696e6120432e77656270),
(14, 'La Torá', 'Anónimo', 'Createspace Independent Publishing Platform', 788, 0x706f7274616461732f546f72612e6a7067),
(16, 'Cien Años de Soledad', 'Gabriel García Márquez', 'Debols!Llo', 494, 0x706f7274616461732f6369656e20736f6c656461642e77656270),
(17, 'It (Eso)', 'Stephen King', 'Debolsillo', 1504, 0x706f7274616461732f69742e77656270),
(18, 'El resplandor', 'Stephen King', 'Debolsillo', 270, 0x706f7274616461732f726573706c616e646f722e77656270),
(19, 'Cujo', 'Stephen King', 'Debolsillo', 400, 0x706f7274616461732f576861747341707020496d61676520323032332d31312d313520617420342e34362e313520504d2e6a706567),
(20, 'La Niebla', 'Stephen King', 'Debolsillo', 314, 0x706f7274616461732f6c61206e6965626c612e77656270);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `ID_pre` int(11) NOT NULL,
  `Nombre_cliente` varchar(50) NOT NULL,
  `Cedula_cliente` varchar(10) NOT NULL,
  `Titulo_libro` varchar(100) NOT NULL,
  `libro_id` int(11) DEFAULT NULL,
  `Fecha_pre` date NOT NULL,
  `Fecha_dev` date NOT NULL,
  `Estado` varchar(50) NOT NULL DEFAULT 'Prestado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email_telefono` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email_telefono`, `contrasena`, `fecha_registro`, `foto`) VALUES
(9, 'Guillermo Ochoa', 'memoochoa@gmail.com', '1234567890', '2023-11-19 02:14:29', 0x666f746f734163742f62643332363965636166376362616561393236616263633632376265386263652e6a7067),
(10, 'Elza Patinho', 'elza2023@gmail.com', '0987654321', '2023-11-19 02:16:43', 0x666f746f734163742f7375706572626f6d6265726d616e72327468756d622d313639343532363931313033362e6a7067),
(11, 'Jose Mourinho', 'josemourinho@gmail.com', 'josemourinho2023', '2023-11-19 02:20:30', 0x666f746f734163742f68692d7265732d64303064323335373135353234316264333963616563376664646532313133635f63726f705f65786163742e6a7067);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial_libros_visitados`
--
ALTER TABLE `historial_libros_visitados`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`ID_libro`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`ID_pre`),
  ADD KEY `fk_libro_prestamos` (`libro_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_telefono` (`email_telefono`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial_libros_visitados`
--
ALTER TABLE `historial_libros_visitados`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `ID_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `ID_pre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_libros_visitados`
--
ALTER TABLE `historial_libros_visitados`
  ADD CONSTRAINT `historial_libros_visitados_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `historial_libros_visitados_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`ID_libro`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `fk_libro_prestamos` FOREIGN KEY (`libro_id`) REFERENCES `libro` (`ID_libro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
