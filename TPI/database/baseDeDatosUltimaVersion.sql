-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-07-2021 a las 18:14:11
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultas_db`
--
CREATE DATABASE IF NOT EXISTS `consultas_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `consultas_db`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `crear_consulta_excel`$$
CREATE DEFINER=`id17138319_administrador`@`%` PROCEDURE `crear_consulta_excel` (IN `codigo_materia` VARCHAR(3), IN `legajo` INT, IN `fecha` DATETIME, IN `cupo` INT)  BEGIN
INSERT INTO consulta (docente_id,materia_id,fecha,cupo)
select p.id,m.id,fecha,cupo
from materia_docente md 
inner join materia m on m.codigo=codigo_materia and md.materia_id=m.id
inner join persona p on p.legajo=legajo and md.docente_id=p.id and p.docente;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catedra`
--

DROP TABLE IF EXISTS `catedra`;
CREATE TABLE `catedra` (
  `id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL,
  `jefe_catedra` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catedra`
--

INSERT INTO `catedra` (`id`, `create_time`, `update_time`, `jefe_catedra`) VALUES
(1, '2021-06-09 00:37:21', NULL, 'IsiJefe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL,
  `materia_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion_baja` varchar(255) DEFAULT NULL,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  `consulta_reemplazo_id` int(11) DEFAULT NULL,
  `cupo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id`, `docente_id`, `create_time`, `update_time`, `materia_id`, `fecha`, `descripcion_baja`, `fecha_baja`, `consulta_reemplazo_id`, `cupo`) VALUES
(2681, 4, '2021-07-26 14:05:33', NULL, 11, '2021-07-27 11:00:00', NULL, NULL, NULL, 15),
(2682, 4, '2021-07-26 14:05:33', NULL, 11, '2021-08-03 11:00:00', NULL, NULL, NULL, 15),
(2683, 4, '2021-07-26 14:05:33', NULL, 11, '2021-08-10 11:00:00', NULL, NULL, NULL, 15),
(2684, 4, '2021-07-26 14:05:33', NULL, 11, '2021-08-17 11:00:00', NULL, NULL, NULL, 15),
(2685, 4, '2021-07-26 14:05:33', NULL, 11, '2021-08-24 11:00:00', NULL, NULL, NULL, 15),
(2686, 4, '2021-07-26 14:05:33', NULL, 11, '2021-08-31 11:00:00', NULL, NULL, NULL, 15),
(2687, 4, '2021-07-26 14:05:33', NULL, 11, '2021-09-07 11:00:00', NULL, NULL, NULL, 15),
(2688, 4, '2021-07-26 14:05:33', NULL, 11, '2021-09-14 11:00:00', NULL, NULL, NULL, 15),
(2689, 4, '2021-07-26 14:05:33', NULL, 11, '2021-09-21 11:00:00', NULL, NULL, NULL, 15),
(2690, 4, '2021-07-26 14:05:33', NULL, 11, '2021-09-28 11:00:00', NULL, NULL, NULL, 15),
(2691, 4, '2021-07-26 14:05:33', NULL, 11, '2021-10-05 11:00:00', NULL, NULL, NULL, 15),
(2692, 4, '2021-07-26 14:05:33', NULL, 11, '2021-10-12 11:00:00', NULL, NULL, NULL, 15),
(2693, 4, '2021-07-26 14:05:33', NULL, 11, '2021-10-19 11:00:00', NULL, NULL, NULL, 15),
(2694, 4, '2021-07-26 14:05:33', NULL, 11, '2021-10-26 11:00:00', NULL, NULL, NULL, 15),
(2695, 4, '2021-07-26 14:05:33', NULL, 11, '2021-11-02 11:00:00', NULL, NULL, NULL, 15),
(2696, 4, '2021-07-26 14:05:33', NULL, 11, '2021-11-09 11:00:00', NULL, NULL, NULL, 15),
(2697, 4, '2021-07-26 14:05:33', NULL, 11, '2021-11-16 11:00:00', NULL, NULL, NULL, 15),
(2698, 4, '2021-07-26 14:05:33', NULL, 11, '2021-11-23 11:00:00', NULL, NULL, NULL, 15),
(2699, 4, '2021-07-26 14:05:33', NULL, 11, '2021-11-30 11:00:00', NULL, NULL, NULL, 15),
(2700, 4, '2021-07-26 14:05:33', NULL, 11, '2021-12-07 11:00:00', NULL, NULL, NULL, 15),
(2701, 4, '2021-07-26 14:05:33', NULL, 11, '2021-12-14 11:00:00', NULL, NULL, NULL, 15),
(2702, 4, '2021-07-26 14:05:33', NULL, 11, '2021-12-21 11:00:00', NULL, NULL, NULL, 15),
(2703, 4, '2021-07-26 14:05:33', NULL, 11, '2021-12-28 11:00:00', NULL, NULL, NULL, 15),
(2704, 4, '2021-07-26 14:05:33', NULL, 20, '2021-07-27 10:00:00', NULL, NULL, NULL, 10),
(2705, 4, '2021-07-26 14:05:33', NULL, 20, '2021-08-03 10:00:00', NULL, NULL, NULL, 10),
(2706, 4, '2021-07-26 14:05:33', NULL, 20, '2021-08-10 10:00:00', NULL, NULL, NULL, 10),
(2707, 4, '2021-07-26 14:05:33', NULL, 20, '2021-08-17 10:00:00', NULL, NULL, NULL, 10),
(2708, 4, '2021-07-26 14:05:33', NULL, 20, '2021-08-24 10:00:00', NULL, NULL, NULL, 10),
(2709, 4, '2021-07-26 14:05:33', NULL, 20, '2021-08-31 10:00:00', NULL, NULL, NULL, 10),
(2710, 4, '2021-07-26 14:05:33', NULL, 20, '2021-09-07 10:00:00', NULL, NULL, NULL, 10),
(2711, 4, '2021-07-26 14:05:33', NULL, 20, '2021-09-14 10:00:00', NULL, NULL, NULL, 10),
(2712, 4, '2021-07-26 14:05:33', NULL, 20, '2021-09-21 10:00:00', NULL, NULL, NULL, 10),
(2713, 4, '2021-07-26 14:05:33', NULL, 20, '2021-09-28 10:00:00', NULL, NULL, NULL, 10),
(2714, 4, '2021-07-26 14:05:33', NULL, 20, '2021-10-05 10:00:00', NULL, NULL, NULL, 10),
(2715, 4, '2021-07-26 14:05:33', NULL, 20, '2021-10-12 10:00:00', NULL, NULL, NULL, 10),
(2716, 4, '2021-07-26 14:05:33', NULL, 20, '2021-10-19 10:00:00', NULL, NULL, NULL, 10),
(2717, 4, '2021-07-26 14:05:33', NULL, 20, '2021-10-26 10:00:00', NULL, NULL, NULL, 10),
(2718, 4, '2021-07-26 14:05:33', NULL, 20, '2021-11-02 10:00:00', NULL, NULL, NULL, 10),
(2719, 4, '2021-07-26 14:05:33', NULL, 20, '2021-11-09 10:00:00', NULL, NULL, NULL, 10),
(2720, 4, '2021-07-26 14:05:33', NULL, 20, '2021-11-16 10:00:00', NULL, NULL, NULL, 10),
(2721, 4, '2021-07-26 14:05:33', NULL, 20, '2021-11-23 10:00:00', NULL, NULL, NULL, 10),
(2722, 4, '2021-07-26 14:05:33', NULL, 20, '2021-11-30 10:00:00', NULL, NULL, NULL, 10),
(2723, 4, '2021-07-26 14:05:33', NULL, 20, '2021-12-07 10:00:00', NULL, NULL, NULL, 10),
(2724, 4, '2021-07-26 14:05:33', NULL, 20, '2021-12-14 10:00:00', NULL, NULL, NULL, 10),
(2725, 4, '2021-07-26 14:05:33', NULL, 20, '2021-12-21 10:00:00', NULL, NULL, NULL, 10),
(2726, 4, '2021-07-26 14:05:33', NULL, 20, '2021-12-28 10:00:00', NULL, NULL, NULL, 10),
(2727, 4, '2021-07-26 14:05:33', NULL, 18, '2021-07-28 15:00:00', NULL, NULL, NULL, 10),
(2728, 4, '2021-07-26 14:05:33', NULL, 18, '2021-08-04 15:00:00', NULL, NULL, NULL, 10),
(2729, 4, '2021-07-26 14:05:33', NULL, 18, '2021-08-11 15:00:00', NULL, NULL, NULL, 10),
(2730, 4, '2021-07-26 14:05:33', NULL, 18, '2021-08-18 15:00:00', NULL, NULL, NULL, 10),
(2731, 4, '2021-07-26 14:05:33', NULL, 18, '2021-08-25 15:00:00', NULL, NULL, NULL, 10),
(2732, 4, '2021-07-26 14:05:33', NULL, 18, '2021-09-01 15:00:00', NULL, NULL, NULL, 10),
(2733, 4, '2021-07-26 14:05:33', NULL, 18, '2021-09-08 15:00:00', NULL, NULL, NULL, 10),
(2734, 4, '2021-07-26 14:05:33', NULL, 18, '2021-09-15 15:00:00', NULL, NULL, NULL, 10),
(2735, 4, '2021-07-26 14:05:33', NULL, 18, '2021-09-22 15:00:00', NULL, NULL, NULL, 10),
(2736, 4, '2021-07-26 14:05:33', NULL, 18, '2021-09-29 15:00:00', NULL, NULL, NULL, 10),
(2737, 4, '2021-07-26 14:05:33', NULL, 18, '2021-10-06 15:00:00', NULL, NULL, NULL, 10),
(2738, 4, '2021-07-26 14:05:33', NULL, 18, '2021-10-13 15:00:00', NULL, NULL, NULL, 10),
(2739, 4, '2021-07-26 14:05:33', NULL, 18, '2021-10-20 15:00:00', NULL, NULL, NULL, 10),
(2740, 4, '2021-07-26 14:05:33', NULL, 18, '2021-10-27 15:00:00', NULL, NULL, NULL, 10),
(2741, 4, '2021-07-26 14:05:33', NULL, 18, '2021-11-03 15:00:00', NULL, NULL, NULL, 10),
(2742, 4, '2021-07-26 14:05:33', NULL, 18, '2021-11-10 15:00:00', NULL, NULL, NULL, 10),
(2743, 4, '2021-07-26 14:05:33', NULL, 18, '2021-11-17 15:00:00', NULL, NULL, NULL, 10),
(2744, 4, '2021-07-26 14:05:33', NULL, 18, '2021-11-24 15:00:00', NULL, NULL, NULL, 10),
(2745, 4, '2021-07-26 14:05:33', NULL, 18, '2021-12-01 15:00:00', NULL, NULL, NULL, 10),
(2746, 4, '2021-07-26 14:05:33', NULL, 18, '2021-12-08 15:00:00', NULL, NULL, NULL, 10),
(2747, 4, '2021-07-26 14:05:33', NULL, 18, '2021-12-15 15:00:00', NULL, NULL, NULL, 10),
(2748, 4, '2021-07-26 14:05:33', NULL, 18, '2021-12-22 15:00:00', NULL, NULL, NULL, 10),
(2749, 4, '2021-07-26 14:05:33', NULL, 18, '2021-12-29 15:00:00', NULL, NULL, NULL, 10),
(2750, 4, '2021-07-26 14:05:33', NULL, 17, '2021-07-28 20:00:00', NULL, NULL, NULL, 15),
(2751, 4, '2021-07-26 14:05:33', NULL, 17, '2021-08-04 20:00:00', NULL, NULL, NULL, 15),
(2752, 4, '2021-07-26 14:05:33', NULL, 17, '2021-08-11 20:00:00', NULL, NULL, NULL, 15),
(2753, 4, '2021-07-26 14:05:33', NULL, 17, '2021-08-18 20:00:00', NULL, NULL, NULL, 15),
(2754, 4, '2021-07-26 14:05:33', NULL, 17, '2021-08-25 20:00:00', NULL, NULL, NULL, 15),
(2755, 4, '2021-07-26 14:05:33', NULL, 17, '2021-09-01 20:00:00', NULL, NULL, NULL, 15),
(2756, 4, '2021-07-26 14:05:33', NULL, 17, '2021-09-08 20:00:00', NULL, NULL, NULL, 15),
(2757, 4, '2021-07-26 14:05:33', NULL, 17, '2021-09-15 20:00:00', NULL, NULL, NULL, 15),
(2758, 4, '2021-07-26 14:05:33', NULL, 17, '2021-09-22 20:00:00', NULL, NULL, NULL, 15),
(2759, 4, '2021-07-26 14:05:33', NULL, 17, '2021-09-29 20:00:00', NULL, NULL, NULL, 15),
(2760, 4, '2021-07-26 14:05:33', NULL, 17, '2021-10-06 20:00:00', NULL, NULL, NULL, 15),
(2761, 4, '2021-07-26 14:05:33', NULL, 17, '2021-10-13 20:00:00', NULL, NULL, NULL, 15),
(2762, 4, '2021-07-26 14:05:33', NULL, 17, '2021-10-20 20:00:00', NULL, NULL, NULL, 15),
(2763, 4, '2021-07-26 14:05:33', NULL, 17, '2021-10-27 20:00:00', NULL, NULL, NULL, 15),
(2764, 4, '2021-07-26 14:05:33', NULL, 17, '2021-11-03 20:00:00', NULL, NULL, NULL, 15),
(2765, 4, '2021-07-26 14:05:33', NULL, 17, '2021-11-10 20:00:00', NULL, NULL, NULL, 15),
(2766, 4, '2021-07-26 14:05:33', NULL, 17, '2021-11-17 20:00:00', NULL, NULL, NULL, 15),
(2767, 4, '2021-07-26 14:05:33', NULL, 17, '2021-11-24 20:00:00', NULL, NULL, NULL, 15),
(2768, 4, '2021-07-26 14:05:33', NULL, 17, '2021-12-01 20:00:00', NULL, NULL, NULL, 15),
(2769, 4, '2021-07-26 14:05:33', NULL, 17, '2021-12-08 20:00:00', NULL, NULL, NULL, 15),
(2770, 4, '2021-07-26 14:05:33', NULL, 17, '2021-12-15 20:00:00', NULL, NULL, NULL, 15),
(2771, 4, '2021-07-26 14:05:33', NULL, 17, '2021-12-22 20:00:00', NULL, NULL, NULL, 15),
(2772, 4, '2021-07-26 14:05:33', NULL, 17, '2021-12-29 20:00:00', NULL, NULL, NULL, 15),
(2773, 4, '2021-07-26 14:05:33', NULL, 15, '2021-07-29 20:00:00', NULL, NULL, NULL, 15),
(2774, 4, '2021-07-26 14:05:33', NULL, 15, '2021-08-05 20:00:00', NULL, NULL, NULL, 15),
(2775, 4, '2021-07-26 14:05:33', NULL, 15, '2021-08-12 20:00:00', NULL, NULL, NULL, 15),
(2776, 4, '2021-07-26 14:05:33', NULL, 15, '2021-08-19 20:00:00', NULL, NULL, NULL, 15),
(2777, 4, '2021-07-26 14:05:33', NULL, 15, '2021-08-26 20:00:00', NULL, NULL, NULL, 15),
(2778, 4, '2021-07-26 14:05:33', NULL, 15, '2021-09-02 20:00:00', NULL, NULL, NULL, 15),
(2779, 4, '2021-07-26 14:05:33', NULL, 15, '2021-09-09 20:00:00', NULL, NULL, NULL, 15),
(2780, 4, '2021-07-26 14:05:33', NULL, 15, '2021-09-16 20:00:00', NULL, NULL, NULL, 15),
(2781, 4, '2021-07-26 14:05:33', NULL, 15, '2021-09-23 20:00:00', NULL, NULL, NULL, 15),
(2782, 4, '2021-07-26 14:05:33', NULL, 15, '2021-09-30 20:00:00', NULL, NULL, NULL, 15),
(2783, 4, '2021-07-26 14:05:33', NULL, 15, '2021-10-07 20:00:00', NULL, NULL, NULL, 15),
(2784, 4, '2021-07-26 14:05:33', NULL, 15, '2021-10-14 20:00:00', NULL, NULL, NULL, 15),
(2785, 4, '2021-07-26 14:05:33', NULL, 15, '2021-10-21 20:00:00', NULL, NULL, NULL, 15),
(2786, 4, '2021-07-26 14:05:33', NULL, 15, '2021-10-28 20:00:00', NULL, NULL, NULL, 15),
(2787, 4, '2021-07-26 14:05:33', NULL, 15, '2021-11-04 20:00:00', NULL, NULL, NULL, 15),
(2788, 4, '2021-07-26 14:05:33', NULL, 15, '2021-11-11 20:00:00', NULL, NULL, NULL, 15),
(2789, 4, '2021-07-26 14:05:33', NULL, 15, '2021-11-18 20:00:00', NULL, NULL, NULL, 15),
(2790, 4, '2021-07-26 14:05:33', NULL, 15, '2021-11-25 20:00:00', NULL, NULL, NULL, 15),
(2791, 4, '2021-07-26 14:05:33', NULL, 15, '2021-12-02 20:00:00', NULL, NULL, NULL, 15),
(2792, 4, '2021-07-26 14:05:33', NULL, 15, '2021-12-09 20:00:00', NULL, NULL, NULL, 15),
(2793, 4, '2021-07-26 14:05:33', NULL, 15, '2021-12-16 20:00:00', NULL, NULL, NULL, 15),
(2794, 4, '2021-07-26 14:05:33', NULL, 15, '2021-12-23 20:00:00', NULL, NULL, NULL, 15),
(2795, 4, '2021-07-26 14:05:33', NULL, 15, '2021-12-30 20:00:00', NULL, NULL, NULL, 15),
(2796, 5, '2021-07-26 14:05:33', NULL, 12, '2021-08-02 16:00:00', NULL, NULL, NULL, 25),
(2797, 5, '2021-07-26 14:05:33', NULL, 12, '2021-08-09 16:00:00', NULL, NULL, NULL, 25),
(2798, 5, '2021-07-26 14:05:33', NULL, 12, '2021-08-16 16:00:00', NULL, NULL, NULL, 25),
(2799, 5, '2021-07-26 14:05:33', NULL, 12, '2021-08-23 16:00:00', NULL, NULL, NULL, 25),
(2800, 5, '2021-07-26 14:05:33', NULL, 12, '2021-08-30 16:00:00', NULL, NULL, NULL, 25),
(2801, 5, '2021-07-26 14:05:33', NULL, 12, '2021-09-06 16:00:00', NULL, NULL, NULL, 25),
(2802, 5, '2021-07-26 14:05:33', NULL, 12, '2021-09-13 16:00:00', NULL, NULL, NULL, 25),
(2803, 5, '2021-07-26 14:05:33', NULL, 12, '2021-09-20 16:00:00', NULL, NULL, NULL, 25),
(2804, 5, '2021-07-26 14:05:33', NULL, 12, '2021-09-27 16:00:00', NULL, NULL, NULL, 25),
(2805, 5, '2021-07-26 14:05:33', NULL, 12, '2021-10-04 16:00:00', NULL, NULL, NULL, 25),
(2806, 5, '2021-07-26 14:05:33', NULL, 12, '2021-10-11 16:00:00', NULL, NULL, NULL, 25),
(2807, 5, '2021-07-26 14:05:33', NULL, 12, '2021-10-18 16:00:00', NULL, NULL, NULL, 25),
(2808, 5, '2021-07-26 14:05:33', NULL, 12, '2021-10-25 16:00:00', NULL, NULL, NULL, 25),
(2809, 5, '2021-07-26 14:05:33', NULL, 12, '2021-11-01 16:00:00', NULL, NULL, NULL, 25),
(2810, 5, '2021-07-26 14:05:33', NULL, 12, '2021-11-08 16:00:00', NULL, NULL, NULL, 25),
(2811, 5, '2021-07-26 14:05:33', NULL, 12, '2021-11-15 16:00:00', NULL, NULL, NULL, 25),
(2812, 5, '2021-07-26 14:05:33', NULL, 12, '2021-11-22 16:00:00', NULL, NULL, NULL, 25),
(2813, 5, '2021-07-26 14:05:33', NULL, 12, '2021-11-29 16:00:00', NULL, NULL, NULL, 25),
(2814, 5, '2021-07-26 14:05:33', NULL, 12, '2021-12-06 16:00:00', NULL, NULL, NULL, 25),
(2815, 5, '2021-07-26 14:05:33', NULL, 12, '2021-12-13 16:00:00', NULL, NULL, NULL, 25),
(2816, 5, '2021-07-26 14:05:33', NULL, 12, '2021-12-20 16:00:00', NULL, NULL, NULL, 25),
(2817, 5, '2021-07-26 14:05:33', NULL, 12, '2021-12-27 16:00:00', NULL, NULL, NULL, 25),
(2818, 5, '2021-07-26 14:05:33', NULL, 14, '2021-08-02 10:00:00', NULL, NULL, NULL, 25),
(2819, 5, '2021-07-26 14:05:33', NULL, 14, '2021-08-09 10:00:00', NULL, NULL, NULL, 25),
(2820, 5, '2021-07-26 14:05:33', NULL, 14, '2021-08-16 10:00:00', NULL, NULL, NULL, 25),
(2821, 5, '2021-07-26 14:05:33', NULL, 14, '2021-08-23 10:00:00', NULL, NULL, NULL, 25),
(2822, 5, '2021-07-26 14:05:33', NULL, 14, '2021-08-30 10:00:00', NULL, NULL, NULL, 25),
(2823, 5, '2021-07-26 14:05:33', NULL, 14, '2021-09-06 10:00:00', NULL, NULL, NULL, 25),
(2824, 5, '2021-07-26 14:05:33', NULL, 14, '2021-09-13 10:00:00', NULL, NULL, NULL, 25),
(2825, 5, '2021-07-26 14:05:33', NULL, 14, '2021-09-20 10:00:00', NULL, NULL, NULL, 25),
(2826, 5, '2021-07-26 14:05:33', NULL, 14, '2021-09-27 10:00:00', NULL, NULL, NULL, 25),
(2827, 5, '2021-07-26 14:05:33', NULL, 14, '2021-10-04 10:00:00', NULL, NULL, NULL, 25),
(2828, 5, '2021-07-26 14:05:33', NULL, 14, '2021-10-11 10:00:00', NULL, NULL, NULL, 25),
(2829, 5, '2021-07-26 14:05:33', NULL, 14, '2021-10-18 10:00:00', NULL, NULL, NULL, 25),
(2830, 5, '2021-07-26 14:05:33', NULL, 14, '2021-10-25 10:00:00', NULL, NULL, NULL, 25),
(2831, 5, '2021-07-26 14:05:33', NULL, 14, '2021-11-01 10:00:00', NULL, NULL, NULL, 25),
(2832, 5, '2021-07-26 14:05:33', NULL, 14, '2021-11-08 10:00:00', NULL, NULL, NULL, 25),
(2833, 5, '2021-07-26 14:05:33', NULL, 14, '2021-11-15 10:00:00', NULL, NULL, NULL, 25),
(2834, 5, '2021-07-26 14:05:33', NULL, 14, '2021-11-22 10:00:00', NULL, NULL, NULL, 25),
(2835, 5, '2021-07-26 14:05:33', NULL, 14, '2021-11-29 10:00:00', NULL, NULL, NULL, 25),
(2836, 5, '2021-07-26 14:05:33', NULL, 14, '2021-12-06 10:00:00', NULL, NULL, NULL, 25),
(2837, 5, '2021-07-26 14:05:33', NULL, 14, '2021-12-13 10:00:00', NULL, NULL, NULL, 25),
(2838, 5, '2021-07-26 14:05:33', NULL, 14, '2021-12-20 10:00:00', NULL, NULL, NULL, 25),
(2839, 5, '2021-07-26 14:05:33', NULL, 14, '2021-12-27 10:00:00', NULL, NULL, NULL, 25),
(2840, 5, '2021-07-26 14:05:33', NULL, 13, '2021-07-30 10:00:00', NULL, NULL, NULL, 10),
(2841, 5, '2021-07-26 14:05:33', NULL, 13, '2021-08-06 10:00:00', NULL, NULL, NULL, 10),
(2842, 5, '2021-07-26 14:05:33', NULL, 13, '2021-08-13 10:00:00', NULL, NULL, NULL, 10),
(2843, 5, '2021-07-26 14:05:33', NULL, 13, '2021-08-20 10:00:00', NULL, NULL, NULL, 10),
(2844, 5, '2021-07-26 14:05:33', NULL, 13, '2021-08-27 10:00:00', NULL, NULL, NULL, 10),
(2845, 5, '2021-07-26 14:05:33', NULL, 13, '2021-09-03 10:00:00', NULL, NULL, NULL, 10),
(2846, 5, '2021-07-26 14:05:33', NULL, 13, '2021-09-10 10:00:00', NULL, NULL, NULL, 10),
(2847, 5, '2021-07-26 14:05:33', NULL, 13, '2021-09-17 10:00:00', NULL, NULL, NULL, 10),
(2848, 5, '2021-07-26 14:05:33', NULL, 13, '2021-09-24 10:00:00', NULL, NULL, NULL, 10),
(2849, 5, '2021-07-26 14:05:33', NULL, 13, '2021-10-01 10:00:00', NULL, NULL, NULL, 10),
(2850, 5, '2021-07-26 14:05:33', NULL, 13, '2021-10-08 10:00:00', NULL, NULL, NULL, 10),
(2851, 5, '2021-07-26 14:05:33', NULL, 13, '2021-10-15 10:00:00', NULL, NULL, NULL, 10),
(2852, 5, '2021-07-26 14:05:33', NULL, 13, '2021-10-22 10:00:00', NULL, NULL, NULL, 10),
(2853, 5, '2021-07-26 14:05:33', NULL, 13, '2021-10-29 10:00:00', NULL, NULL, NULL, 10),
(2854, 5, '2021-07-26 14:05:33', NULL, 13, '2021-11-05 10:00:00', NULL, NULL, NULL, 10),
(2855, 5, '2021-07-26 14:05:33', NULL, 13, '2021-11-12 10:00:00', NULL, NULL, NULL, 10),
(2856, 5, '2021-07-26 14:05:33', NULL, 13, '2021-11-19 10:00:00', NULL, NULL, NULL, 10),
(2857, 5, '2021-07-26 14:05:33', NULL, 13, '2021-11-26 10:00:00', NULL, NULL, NULL, 10),
(2858, 5, '2021-07-26 14:05:33', NULL, 13, '2021-12-03 10:00:00', NULL, NULL, NULL, 10),
(2859, 5, '2021-07-26 14:05:33', NULL, 13, '2021-12-10 10:00:00', NULL, NULL, NULL, 10),
(2860, 5, '2021-07-26 14:05:33', NULL, 13, '2021-12-17 10:00:00', NULL, NULL, NULL, 10),
(2861, 5, '2021-07-26 14:05:33', NULL, 13, '2021-12-24 10:00:00', NULL, NULL, NULL, 10),
(2862, 5, '2021-07-26 14:05:33', NULL, 13, '2021-12-31 10:00:00', NULL, NULL, NULL, 10),
(2863, 5, '2021-07-26 14:05:33', NULL, 2, '2021-07-30 11:00:00', NULL, NULL, NULL, 10),
(2864, 5, '2021-07-26 14:05:33', NULL, 2, '2021-08-06 11:00:00', NULL, NULL, NULL, 10),
(2865, 5, '2021-07-26 14:05:33', NULL, 2, '2021-08-13 11:00:00', NULL, NULL, NULL, 10),
(2866, 5, '2021-07-26 14:05:33', NULL, 2, '2021-08-20 11:00:00', NULL, NULL, NULL, 10),
(2867, 5, '2021-07-26 14:05:33', NULL, 2, '2021-08-27 11:00:00', NULL, NULL, NULL, 10),
(2868, 5, '2021-07-26 14:05:33', NULL, 2, '2021-09-03 11:00:00', NULL, NULL, NULL, 10),
(2869, 5, '2021-07-26 14:05:33', NULL, 2, '2021-09-10 11:00:00', NULL, NULL, NULL, 10),
(2870, 5, '2021-07-26 14:05:33', NULL, 2, '2021-09-17 11:00:00', NULL, NULL, NULL, 10),
(2871, 5, '2021-07-26 14:05:33', NULL, 2, '2021-09-24 11:00:00', NULL, NULL, NULL, 10),
(2872, 5, '2021-07-26 14:05:33', NULL, 2, '2021-10-01 11:00:00', NULL, NULL, NULL, 10),
(2873, 5, '2021-07-26 14:05:33', NULL, 2, '2021-10-08 11:00:00', NULL, NULL, NULL, 10),
(2874, 5, '2021-07-26 14:05:33', NULL, 2, '2021-10-15 11:00:00', NULL, NULL, NULL, 10),
(2875, 5, '2021-07-26 14:05:33', NULL, 2, '2021-10-22 11:00:00', NULL, NULL, NULL, 10),
(2876, 5, '2021-07-26 14:05:33', NULL, 2, '2021-10-29 11:00:00', NULL, NULL, NULL, 10),
(2877, 5, '2021-07-26 14:05:33', NULL, 2, '2021-11-05 11:00:00', NULL, NULL, NULL, 10),
(2878, 5, '2021-07-26 14:05:33', NULL, 2, '2021-11-12 11:00:00', NULL, NULL, NULL, 10),
(2879, 5, '2021-07-26 14:05:33', NULL, 2, '2021-11-19 11:00:00', NULL, NULL, NULL, 10),
(2880, 5, '2021-07-26 14:05:33', NULL, 2, '2021-11-26 11:00:00', NULL, NULL, NULL, 10),
(2881, 5, '2021-07-26 14:05:33', NULL, 2, '2021-12-03 11:00:00', NULL, NULL, NULL, 10),
(2882, 5, '2021-07-26 14:05:33', NULL, 2, '2021-12-10 11:00:00', NULL, NULL, NULL, 10),
(2883, 5, '2021-07-26 14:05:33', NULL, 2, '2021-12-17 11:00:00', NULL, NULL, NULL, 10),
(2884, 5, '2021-07-26 14:05:33', NULL, 2, '2021-12-24 11:00:00', NULL, NULL, NULL, 10),
(2885, 5, '2021-07-26 14:05:33', NULL, 2, '2021-12-31 11:00:00', NULL, NULL, NULL, 10),
(2886, 6, '2021-07-26 14:05:33', NULL, 3, '2021-07-30 11:00:00', NULL, NULL, NULL, 20),
(2887, 6, '2021-07-26 14:05:33', NULL, 3, '2021-08-06 11:00:00', NULL, NULL, NULL, 20),
(2888, 6, '2021-07-26 14:05:33', NULL, 3, '2021-08-13 11:00:00', NULL, NULL, NULL, 20),
(2889, 6, '2021-07-26 14:05:33', NULL, 3, '2021-08-20 11:00:00', NULL, NULL, NULL, 20),
(2890, 6, '2021-07-26 14:05:33', NULL, 3, '2021-08-27 11:00:00', NULL, NULL, NULL, 20),
(2891, 6, '2021-07-26 14:05:33', NULL, 3, '2021-09-03 11:00:00', NULL, NULL, NULL, 20),
(2892, 6, '2021-07-26 14:05:33', NULL, 3, '2021-09-10 11:00:00', NULL, NULL, NULL, 20),
(2893, 6, '2021-07-26 14:05:33', NULL, 3, '2021-09-17 11:00:00', NULL, NULL, NULL, 20),
(2894, 6, '2021-07-26 14:05:33', NULL, 3, '2021-09-24 11:00:00', NULL, NULL, NULL, 20),
(2895, 6, '2021-07-26 14:05:33', NULL, 3, '2021-10-01 11:00:00', NULL, NULL, NULL, 20),
(2896, 6, '2021-07-26 14:05:33', NULL, 3, '2021-10-08 11:00:00', NULL, NULL, NULL, 20),
(2897, 6, '2021-07-26 14:05:33', NULL, 3, '2021-10-15 11:00:00', NULL, NULL, NULL, 20),
(2898, 6, '2021-07-26 14:05:33', NULL, 3, '2021-10-22 11:00:00', NULL, NULL, NULL, 20),
(2899, 6, '2021-07-26 14:05:33', NULL, 3, '2021-10-29 11:00:00', NULL, NULL, NULL, 20),
(2900, 6, '2021-07-26 14:05:33', NULL, 3, '2021-11-05 11:00:00', NULL, NULL, NULL, 20),
(2901, 6, '2021-07-26 14:05:33', NULL, 3, '2021-11-12 11:00:00', NULL, NULL, NULL, 20),
(2902, 6, '2021-07-26 14:05:33', NULL, 3, '2021-11-19 11:00:00', NULL, NULL, NULL, 20),
(2903, 6, '2021-07-26 14:05:33', NULL, 3, '2021-11-26 11:00:00', NULL, NULL, NULL, 20),
(2904, 6, '2021-07-26 14:05:33', NULL, 3, '2021-12-03 11:00:00', NULL, NULL, NULL, 20),
(2905, 6, '2021-07-26 14:05:33', NULL, 3, '2021-12-10 11:00:00', NULL, NULL, NULL, 20),
(2906, 6, '2021-07-26 14:05:33', NULL, 3, '2021-12-17 11:00:00', NULL, NULL, NULL, 20),
(2907, 6, '2021-07-26 14:05:33', NULL, 3, '2021-12-24 11:00:00', NULL, NULL, NULL, 20),
(2908, 6, '2021-07-26 14:05:33', NULL, 3, '2021-12-31 11:00:00', NULL, NULL, NULL, 20),
(2909, 6, '2021-07-26 14:05:33', NULL, 22, '2021-07-30 10:00:00', NULL, NULL, NULL, 10),
(2910, 6, '2021-07-26 14:05:33', NULL, 22, '2021-08-06 10:00:00', NULL, NULL, NULL, 10),
(2911, 6, '2021-07-26 14:05:33', NULL, 22, '2021-08-13 10:00:00', NULL, NULL, NULL, 10),
(2912, 6, '2021-07-26 14:05:33', NULL, 22, '2021-08-20 10:00:00', NULL, NULL, NULL, 10),
(2913, 6, '2021-07-26 14:05:33', NULL, 22, '2021-08-27 10:00:00', NULL, NULL, NULL, 10),
(2914, 6, '2021-07-26 14:05:33', NULL, 22, '2021-09-03 10:00:00', NULL, NULL, NULL, 10),
(2915, 6, '2021-07-26 14:05:33', NULL, 22, '2021-09-10 10:00:00', NULL, NULL, NULL, 10),
(2916, 6, '2021-07-26 14:05:33', NULL, 22, '2021-09-17 10:00:00', NULL, NULL, NULL, 10),
(2917, 6, '2021-07-26 14:05:33', NULL, 22, '2021-09-24 10:00:00', NULL, NULL, NULL, 10),
(2918, 6, '2021-07-26 14:05:33', NULL, 22, '2021-10-01 10:00:00', NULL, NULL, NULL, 10),
(2919, 6, '2021-07-26 14:05:33', NULL, 22, '2021-10-08 10:00:00', NULL, NULL, NULL, 10),
(2920, 6, '2021-07-26 14:05:33', NULL, 22, '2021-10-15 10:00:00', NULL, NULL, NULL, 10),
(2921, 6, '2021-07-26 14:05:33', NULL, 22, '2021-10-22 10:00:00', NULL, NULL, NULL, 10),
(2922, 6, '2021-07-26 14:05:33', NULL, 22, '2021-10-29 10:00:00', NULL, NULL, NULL, 10),
(2923, 6, '2021-07-26 14:05:33', NULL, 22, '2021-11-05 10:00:00', NULL, NULL, NULL, 10),
(2924, 6, '2021-07-26 14:05:33', NULL, 22, '2021-11-12 10:00:00', NULL, NULL, NULL, 10),
(2925, 6, '2021-07-26 14:05:33', NULL, 22, '2021-11-19 10:00:00', NULL, NULL, NULL, 10),
(2926, 6, '2021-07-26 14:05:33', NULL, 22, '2021-11-26 10:00:00', NULL, NULL, NULL, 10),
(2927, 6, '2021-07-26 14:05:33', NULL, 22, '2021-12-03 10:00:00', NULL, NULL, NULL, 10),
(2928, 6, '2021-07-26 14:05:33', NULL, 22, '2021-12-10 10:00:00', NULL, NULL, NULL, 10),
(2929, 6, '2021-07-26 14:05:33', NULL, 22, '2021-12-17 10:00:00', NULL, NULL, NULL, 10),
(2930, 6, '2021-07-26 14:05:33', NULL, 22, '2021-12-24 10:00:00', NULL, NULL, NULL, 10),
(2931, 6, '2021-07-26 14:05:33', NULL, 22, '2021-12-31 10:00:00', NULL, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

DROP TABLE IF EXISTS `horarios`;
CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `nombre_turno` varchar(45) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `nombre_turno`, `hora_inicio`, `hora_fin`) VALUES
(1, 'Mañana', '07:30:00', '12:49:59'),
(2, 'Tarde', '12:50:00', '18:44:59'),
(3, 'Noche', '18:45:00', '24:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `delete_time` timestamp NULL DEFAULT NULL,
  `nombre` varchar(32) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `catedra_id` int(11) DEFAULT NULL,
  `anio` int(11) NOT NULL,
  `codigo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `create_time`, `delete_time`, `nombre`, `descripcion`, `catedra_id`, `anio`, `codigo`) VALUES
(1, '2021-06-09 00:38:15', NULL, 'Análisis Matemático I', NULL, 1, 1, 'AM1'),
(2, '2021-06-09 00:38:15', NULL, 'Física I', NULL, 1, 1, 'FI1'),
(3, '2021-06-09 00:38:15', NULL, 'Algoritmo y estructuras de Datos', NULL, 1, 1, 'ALG'),
(4, '2021-06-09 00:38:15', NULL, 'Arquitectura de Computadoras', NULL, 1, 1, 'ARQ'),
(5, '2021-06-09 00:38:15', NULL, 'Matemática Discreta', NULL, 1, 1, 'MDI'),
(6, '2021-06-09 00:38:15', NULL, 'Sistemas y Organizaciones', NULL, 1, 1, 'SYO'),
(7, '2021-06-09 00:38:15', NULL, 'Algebra y Geometría Analítica', NULL, 1, 1, 'ALG'),
(8, '2021-06-09 00:38:15', NULL, 'Ingeniería y Sociedad', NULL, 1, 1, 'IYS'),
(9, '2021-06-09 00:38:15', NULL, 'Análisis de Sistemas', NULL, 1, 2, 'ADS'),
(10, '2021-06-09 00:38:15', NULL, 'Química', NULL, 1, 2, 'QUI'),
(11, '2021-06-09 00:38:15', NULL, 'Análisis Matemático ll', NULL, 1, 2, 'AM2'),
(12, '2021-06-09 00:38:15', NULL, 'Sintaxis', NULL, 1, 2, 'SIN'),
(13, '2021-06-09 00:38:15', NULL, 'Física ll', NULL, 1, 2, 'FI2'),
(14, '2021-06-09 00:38:15', NULL, 'Inglés l', NULL, 1, 2, 'IN2'),
(15, '2021-06-09 00:38:15', NULL, 'Sistemas Operativos', NULL, 1, 2, 'SSO'),
(16, '2021-06-09 00:38:15', NULL, 'Comunicaciones', NULL, 1, 3, 'COM'),
(17, '2021-06-09 00:38:15', NULL, 'Matemática Superior', NULL, 1, 3, 'MSU'),
(18, '2021-06-09 00:38:15', NULL, 'Probabilidades y Estadísticas', NULL, 1, 3, 'PYE'),
(19, '2021-06-09 00:38:15', NULL, 'Diseño de Sistemas', NULL, 1, 3, 'DIS'),
(20, '2021-06-09 00:38:15', NULL, 'Gestión de Dat', NULL, 1, 3, 'GES'),
(22, '2021-06-09 00:38:15', NULL, 'Investigación Operativa', NULL, 1, 4, 'IOP'),
(23, '2021-06-09 00:38:15', NULL, 'Administración de Recursos', NULL, 1, 4, 'ADR'),
(24, '2021-06-09 00:38:15', NULL, 'Legislación', NULL, 1, 4, 'LEG'),
(25, '2021-06-09 00:38:15', NULL, 'Simulación', NULL, 1, 4, 'SIM'),
(26, '2021-06-09 00:38:15', NULL, 'Teoría de Control', NULL, 1, 4, 'TDC'),
(27, '2021-06-09 00:38:15', NULL, 'Proyecto Final', NULL, 1, 5, 'PFF'),
(28, '2021-06-09 00:38:15', NULL, 'Administración Gerencial', NULL, 1, 5, 'ADG'),
(29, '2021-06-09 00:38:15', NULL, 'Sistemas de Gestión', NULL, 1, 5, 'SDG'),
(30, '2021-06-09 00:38:15', NULL, 'Inteligencia Artificial', NULL, 1, 5, 'IAA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_docente`
--

DROP TABLE IF EXISTS `materia_docente`;
CREATE TABLE `materia_docente` (
  `id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `delete_time` timestamp NULL DEFAULT NULL,
  `materia_id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia_docente`
--

INSERT INTO `materia_docente` (`id`, `create_time`, `delete_time`, `materia_id`, `docente_id`) VALUES
(17, '2021-07-03 00:58:45', NULL, 11, 4),
(18, '2021-07-03 00:58:45', NULL, 12, 5),
(19, '2021-07-03 00:58:45', NULL, 13, 6),
(20, '2021-07-03 00:58:45', NULL, 14, 3),
(21, '2021-07-03 00:59:36', NULL, 20, 4),
(22, '2021-07-03 00:59:36', NULL, 18, 4),
(23, '2021-07-03 00:59:36', NULL, 17, 4),
(24, '2021-07-03 00:59:36', NULL, 15, 4),
(25, '2021-07-03 00:59:36', NULL, 14, 5),
(26, '2021-07-03 00:59:36', NULL, 13, 5),
(27, '2021-07-03 00:59:36', NULL, 22, 6),
(28, '2021-07-03 00:59:36', NULL, 23, 6),
(29, '2021-07-03 00:59:36', NULL, 25, 6),
(30, '2021-07-03 00:59:36', NULL, 6, 6),
(31, '2021-07-03 00:59:36', NULL, 3, 6),
(32, '2021-07-03 00:59:36', NULL, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `deleted_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `legajo` varchar(45) DEFAULT NULL,
  `docente` tinyint(4) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellido`, `email`, `password`, `deleted_time`, `create_time`, `legajo`, `docente`, `admin`) VALUES
(1, 'admin', 'admin', 'Admin@Admin.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '2021-07-01 03:32:38', '1', 0, 1),
(2, 'Docente', 'ApellidoDocente', 'D@D.COM', 'f623e75af30e62bbd73d6df5b50bb7b5', NULL, '2021-06-12 19:16:59', '2', 1, 0),
(3, 'NoDocente', 'ApellidoND', 'ND@ND.COM', '9a116c50d133c8648404081885194300', NULL, '2021-06-12 19:17:10', NULL, 0, 0),
(4, 'Javier', 'Borja', 'Jborja@hotmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '2021-06-12 19:17:10', '5504', 1, 0),
(5, 'Estella', 'Campillo', 'ECampillo@hotmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '2021-06-12 19:17:10', '6678', 1, 0),
(6, 'Jorge', 'Monserrat', 'JMonserrat@hotmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '2021-06-12 19:17:10', '3045', 1, 0),
(7, 'Nicole', 'Campos', 'NCampos@hotmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '2021-06-12 19:17:10', '2545', 1, 0),
(8, 'Paulina', 'Gordo', 'PGordo@hotmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '2021-06-12 19:17:10', '6786', 1, 0),
(9, 'Leopoldo', 'Granado', 'LGranado@hotmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '2021-06-12 19:17:10', '9789', 1, 0),
(13, 'Nicolas', 'Mateucci', 'nico-mateucci@hotmail.com', '42e7f4c1a076d74b98e1452af8ac6d3c', NULL, '2021-07-19 21:04:36', '42868', 0, 0),
(14, 'David', 'Ulla', 'davoulla@gmail.com', 'c893bad68927b457dbed39460e6afd62', NULL, '2021-07-19 21:55:41', '42111', 0, 0),
(15, 'franco', 'pinacca', 'francoo_27@hotmail.com', '981c04d43bc1f1af7793f1a14c7e8649', NULL, '2021-07-19 21:56:16', '43133', 0, 0),
(16, 'alumno1', 'alumno1', 'alumno1@alumno1.com', '202cb962ac59075b964b07152d234b70', NULL, '2021-07-19 22:07:36', '44444', 0, 0),
(17, 'John', 'Popper', 'john@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', NULL, '2021-07-19 22:08:35', '122587', 0, 0),
(18, 'Leonel', 'Messi', 'messi@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, '2021-07-19 22:10:40', '10', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp(),
  `persona_id` int(11) NOT NULL,
  `consulta_id` int(11) NOT NULL,
  `aceptada` tinyint(4) NOT NULL DEFAULT 0,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catedra`
--
ALTER TABLE `catedra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_materia` (`materia_id`),
  ADD KEY `fk_docente` (`docente_id`),
  ADD KEY `fk_consulta_reemplazo_idx` (`consulta_reemplazo_id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_catedra` (`catedra_id`);

--
-- Indices de la tabla `materia_docente`
--
ALTER TABLE `materia_docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docente` (`docente_id`),
  ADD KEY `fk_materia` (`materia_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_persona` (`persona_id`),
  ADD KEY `fk_consula` (`consulta_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catedra`
--
ALTER TABLE `catedra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2932;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `materia_docente`
--
ALTER TABLE `materia_docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_consulta_docente` FOREIGN KEY (`docente_id`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `fk_consulta_materia` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`),
  ADD CONSTRAINT `fk_consulta_reemplazo` FOREIGN KEY (`consulta_reemplazo_id`) REFERENCES `consulta` (`id`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_materia_catedra` FOREIGN KEY (`catedra_id`) REFERENCES `catedra` (`id`);

--
-- Filtros para la tabla `materia_docente`
--
ALTER TABLE `materia_docente`
  ADD CONSTRAINT `fk_materia_docente_docente` FOREIGN KEY (`docente_id`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `fk_materia_docente_materia` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_solicitud_consulta` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`),
  ADD CONSTRAINT `fk_solicitud_persona` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
