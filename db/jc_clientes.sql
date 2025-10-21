-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2025 a las 19:25:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jc_clientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_asesor` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_asesor`, `usuario`, `clave`, `rol`) VALUES
(1, 'esteban', 'admin', 'administrador'),
(2, 'julian', 'julian', 'asesor'),
(3, 'juan', 'juan', 'asesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `cedula` int(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(20) NOT NULL,
  `pedido` varchar(50) NOT NULL,
  `creado_by` int(20) NOT NULL,
  `servicio` varchar(250) NOT NULL,
  `fecha_creacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `mes`, `nombres`, `cedula`, `direccion`, `telefono`, `pedido`, `creado_by`, `servicio`, `fecha_creacion`) VALUES
(2, 'Noviembre', 'SARA MARIA ARANGO GARCIA', 1036936197, 'CL 31 # 32 A - 37 IN 301', 2147483647, '1002', 1, 'se repara el sistema operativo, se formatea equipo con todos los programass', '2025-07-25'),
(3, 'Noviembre', 'SARA MARIA ARANGO GARCIA', 1036936197, 'CL 31 # 32 A - 37 IN 301', 2147483647, '1003', 3, 'se repara el sistema operativo, se formatea equipo con todos los programas', '2025-07-25'),
(59, 'enero', 'juan pablo', 12340, 'KR 51 50 14 IN 101 SANTUARIO', 2147483647, '2951', 2, 'El soporte técnico es un servicio esencial en cualquier organización que utilice te', '0000-00-00'),
(60, 'enero', 'juan pablo', 12340, 'KR 51 50 14 IN 101 SANTUARIO', 2147483647, '3971', 2, 'mantener los sistemas funcionando correctamente, ofreciendo soluciones rápidas y efectivas a ', '0000-00-00'),
(61, 'enero', 'MARIA XIMENA ESCOBAR VALENCIA', 12340, 'KR 51 50 14 IN 101 SANTUARIO', 2147483647, '2119', 2, 'se cambia disco duro hdd, por estado solido', '2025-10-21'),
(62, 'octubre', 'cliente de bibiana  updated', 12340, 'KR 51 50 14 IN 101 SANTUARIO', 2147483647, '3756', 3, 'se cambia el disco duro mecanico de 1 tera por ssd de 240 gb sata', '2025-10-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_asesor`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pedido` (`pedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_asesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
