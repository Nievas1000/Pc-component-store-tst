-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2021 a las 16:03:39
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `productosKC`
--
CREATE DATABASE IF NOT EXISTS `productosKC` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `productosKC`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_componente`
--

CREATE TABLE `tipo_componente` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id` int(11) NOT NULL,
  `nombre_prod` varchar(45) DEFAULT NULL,
  `marca` varchar(41) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_componente` int(11) NOT NULL,
  `texto` varchar(500) DEFAULT NULL,
  `user_coment` varchar(500) DEFAULT NULL,
  `puntaje` int(11) NOT NULL,
  `fecha` date DEFAULT  CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indices de la tabla `tipo_componente`
--
ALTER TABLE `tipo_componente`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `componentes`
--
--

ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `usuarios`
--
--

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `comentarios`
--
--

ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tipo_componente`
--
ALTER TABLE `tipo_componente`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;  

--
-- Indice clave foranea tabla `componentes`
--
--

ALTER TABLE `componentes`
  ADD FOREIGN KEY (`id_tipo`) REFERENCES `tipo_componente`(`id_tipo`) ON DELETE CASCADE;

--
-- Indice clave foranea tabla `componentes`
--
--

ALTER TABLE `comentarios`
  ADD FOREIGN KEY (`id_componente`) REFERENCES `componentes`(`id`) ON DELETE CASCADE;


--
-- Volcado de datos para la tabla `tipo_componente`
--


INSERT INTO `tipo_componente` (`id_tipo`,`nombre`) VALUES
(1,'Monitores'),
(2,'Teclados'),
(3,'Mouses'),
(4,'Procesadores'),
(5,'Placas de video');


--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`id`, `nombre_prod`, `marca`, `descripcion`, `precio`, `id_tipo`) VALUES
(1,'Monitor P224', 'HP', 'El diseño de perfil elegante y moderno ofrece funciones de presentación esenciales y de conectividad avanzadas a un precio increíble.',18000,1),
(2,'Monitor T350', 'Samsung', 'Diseño minimalista, máxima concentración. La pantalla sin bordes en tres de sus lados aporta una estética clara y moderna a cualquier entorno de trabajo.',25000,1),
(3,'Teclado Mecanico 80%', 'Soul', 'Compatible con ps4, largo del cable: 1,75mt',4500,2),
(4,'Teclado G PRO Mechanical Black 920', 'Logitech', 'Este teclado Logitech de alto rendimiento permite que puedas disfrutar de horas ilimitadas de juegos. Está diseñado especialmente para que puedas expresar tanto tus habilidades como tu estilo.',11900,2),
(5,'Mouse M100 RGB', 'Lenovo', 'El mouse para juegos RGB M100 lo prepara para la victoria con 7 botones programables, un sensor de 3200 DPI de precisión y una forma ergonómica para que pueda jugar por horas sin molestias. ',4200,3),
(6,'Mouse G203 Lightsync Rgb', 'Logitech', 'Sistema mecánico de tensión de botones con resortes; los botones principales son mecánicos y se tensan con resortes metálicos duraderos para ofrecer fiabilidad, rendimiento',2300,3),
(7,'Procesador Celeron G5920 10gen', 'Intel', 'Product CollectionIntel® Celeron® Processor G Series',12000,4),
(8,'Procesador 5 5600x', 'Ryzen', 'Este procesador cuenta con 6 nucleos, 12 hilos, y una frecuencia de hasta 4,6 GHz con soporte para tecnología DDR4 y PCI-e 4.0.',41000,4),
(9,'Placa de video Asus ROG Strix GeForce RTX 20 Series RTX 2060 ', 'Nvidia', 'Como cuenta con 1920 núcleos, los cálculos para el procesamiento de gráficos se realizarán de forma simultánea logrando un resultado óptimo del trabajo de la placa.',169000,5);

--
-- Volcado de datos para la tabla `usuarios`
--


INSERT INTO `usuarios` (`id_usuario`,`email`,`nombre`,`password`,`admin`) VALUES
(1,'admin@gmail.com','Administrador','$2y$10$s28K/cECIkHFDun8UVtCmOs8D70aA4jGqRE6MveJbgX/O4C60s3i.',1),
(2,'lautynievas09@gmail.com','Lautaro Nievas','$2y$10$s28K/cECIkHFDun8UVtCmOs8D70aA4jGqRE6MveJbgX/O4C60s3i.',0);
COMMIT;