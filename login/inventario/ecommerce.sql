-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2022 a las 16:15:14
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` tinyint(2) UNSIGNED NOT NULL,
  `categoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `categoria`) VALUES
(1, 'televisores'),
(2, 'heladeras'),
(3, 'muebles'),
(4, 'lavarropas'),
(5, 'computadoras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigoProducto` int(12) UNSIGNED NOT NULL,
  `nombreProducto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precioProducto` float(9,2) UNSIGNED DEFAULT NULL,
  `cantidadProducto` smallint(5) DEFAULT NULL,
  `fotoProducto` varchar(100) COLLATE utf8_spanish_ci DEFAULT "default.jpg",
  `fotoMarca` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcionProducto` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `detallesProducto` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `categoriaProducto` tinyint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigoProducto`, `nombreProducto`, `precioProducto`, `cantidadProducto`, `fotoProducto`, `fotoMarca`, `descripcionProducto`, `detallesProducto`, `categoriaProducto`) VALUES
(1, 'TV LG 42 pulgadas', 10000.00, 5, NULL, NULL, 'La mejor tele para ver el mundial', 'Se ve genial', 1),
(2, 'TV Philco 32 pulgadas', 5000.00, 3, NULL, NULL, 'Una tele para ver en el dormitorio', 'Se ve muy bien', 1),
(3, 'Heladera Patrick tropical', 6000.00, 2, NULL, NULL, 'Enfria re bien', 'Color blanco', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigoProducto`),
  ADD KEY `fk1` (`categoriaProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`categoriaProducto`) REFERENCES `categorias` (`idCategoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
