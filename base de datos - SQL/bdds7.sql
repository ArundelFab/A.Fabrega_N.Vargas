-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2023 a las 08:17:49
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdds7`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `entrada_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `fecha_publicacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`entrada_id`, `usuario_id`, `titulo`, `tema`, `contenido`, `fecha_publicacion`) VALUES
(1, 2, 'Título de primera entrada de pruebas', 'Tema de primera entrada de pruebas', 'Contenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas\r\nContenido de primera entrada de pruebas', '2023-11-05 02:15:31'),
(2, 1, 'Segunda entrada', 'esta es la segunda entrada', 'hola, esta es la segunda entrada en la tabla', '2023-11-05 02:17:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `rol` varchar(1) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `email`, `nombre`, `apellido`, `contraseña`, `rol`, `fecha_registro`) VALUES
(1, 'admin@admin.com', 'admin', 'administrador', 'admin', 'a', '2023-11-05 02:11:50'),
(2, 'usuario@usuario.com', 'usuario', 'usuario', 'usuario', 'u', '2023-11-05 02:11:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`entrada_id`),
  ADD KEY `fk_usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `entrada_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
