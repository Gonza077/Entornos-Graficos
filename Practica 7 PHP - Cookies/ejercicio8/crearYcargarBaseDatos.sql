-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2021 a las 04:49:38
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `BuscadorCanciones`
--
CREATE DATABASE IF NOT EXISTS `BuscadorCanciones` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `BuscadorCanciones`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Buscador`
--

DROP TABLE IF EXISTS `Buscador`;
CREATE TABLE `Buscador` (
  `IdCancion` int(11) NOT NULL,
  `Canciones` varchar(50) NOT NULL,
  `Duracion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Buscador`
--

INSERT INTO `Buscador` (`IdCancion`, `Canciones`, `Duracion`) VALUES
(1, 'Cerati - Lago en el cielo', 5),
(2, 'Cerati - Musica para volar', 5),
(3, 'Cerati - De Musica Ligera', 3),
(4, 'La Bersuit - Señor Cobranza', 5),
(5, 'La Bersuit - El tiempo no para', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Buscador`
--
ALTER TABLE `Buscador`
  ADD PRIMARY KEY (`IdCancion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
