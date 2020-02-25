-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2018 a las 17:46:23
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pedidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `vendedor` varchar(50) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_menu`
--

CREATE TABLE `log_menu` (
  `idlogmenu` int(11) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `navegador` varchar(150) NOT NULL,
  `usuario` varchar(150) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `ventana` varchar(150) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `log_menu`
--

INSERT INTO `log_menu` (`idlogmenu`, `ip`, `navegador`, `usuario`, `idmenu`, `nombre`, `ventana`, `fecha`) VALUES
(1, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:13:48'),
(2, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:13:49'),
(3, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:15:16'),
(4, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:15:17'),
(5, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:29:11'),
(6, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:37:15'),
(7, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:37:24'),
(8, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:37:30'),
(9, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:38:38'),
(10, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:38:39'),
(11, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:44:23'),
(12, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:45:09'),
(13, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:45:11'),
(14, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-11 20:45:30'),
(15, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:03:12'),
(16, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:09:02'),
(17, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:09:34'),
(18, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:17:10'),
(19, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:18:49'),
(20, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:21:27'),
(21, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:23:05'),
(22, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:23:41'),
(23, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:23:42'),
(24, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:23:51'),
(25, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:23:51'),
(26, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:24:13'),
(27, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:27:25'),
(28, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:27:57'),
(29, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:29:22'),
(30, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:35:00'),
(31, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:35:21'),
(32, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:35:30'),
(33, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:35:43'),
(34, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:40:27'),
(35, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:40:47'),
(36, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:41:53'),
(37, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:41:54'),
(38, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:43:16'),
(39, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:44:01'),
(40, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:44:02'),
(41, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:44:11'),
(42, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:44:19'),
(43, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:44:20'),
(44, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:50:17'),
(45, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:53:09'),
(46, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:53:11'),
(47, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:53:56'),
(48, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:53:57'),
(49, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:53:57'),
(50, '::1', 'Chrome - 71.0.3578.80', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 20:56:52'),
(51, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 21:03:29'),
(52, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-12 21:03:32'),
(53, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:39:54'),
(54, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:40:14'),
(55, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:41:19'),
(56, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:41:56'),
(57, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:42:08'),
(58, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:48:19'),
(59, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:49:05'),
(60, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:49:47'),
(61, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:50:08'),
(62, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:50:17'),
(63, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:57:58'),
(64, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:58:15'),
(65, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 20:58:54'),
(66, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:01:49'),
(67, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:02:17'),
(68, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:02:18'),
(69, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:08:23'),
(70, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:08:38'),
(71, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:08:53'),
(72, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:12:36'),
(73, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:17:21'),
(74, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:20:56'),
(75, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:22:38'),
(76, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:25:32'),
(77, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:28:14'),
(78, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:28:24'),
(79, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:28:39'),
(80, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:28:47'),
(81, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-17 21:36:39'),
(82, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:16:21'),
(83, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:16:24'),
(84, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:22:56'),
(85, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:22:57'),
(86, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:26:53'),
(87, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:28:05'),
(88, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:28:06'),
(89, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:28:24'),
(90, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:29:45'),
(91, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:30:36'),
(92, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:30:40'),
(93, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:31:21'),
(94, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:31:30'),
(95, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:31:36'),
(96, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:31:40'),
(97, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:45:59'),
(98, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:53:45'),
(99, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:59:37'),
(100, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 21:59:50'),
(101, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 22:01:57'),
(102, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 22:04:41'),
(103, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 22:05:23'),
(104, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-18 22:07:12'),
(105, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:16:00'),
(106, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:27:07'),
(107, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:41:18'),
(108, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:41:19'),
(109, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:45:12'),
(110, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:45:40'),
(111, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:46:03'),
(112, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:49:29'),
(113, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:52:32'),
(114, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:53:38'),
(115, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:54:49'),
(116, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:55:31'),
(117, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:55:52'),
(118, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 20:56:06'),
(119, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 21:04:12'),
(120, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 21:04:12'),
(121, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 21:07:19'),
(122, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 21:08:11'),
(123, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-20 21:08:17'),
(124, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-20 21:10:06'),
(125, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-20 21:10:26'),
(126, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-20 21:10:35'),
(127, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-20 21:10:49'),
(128, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-20 21:10:52'),
(129, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-21 18:18:17'),
(130, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-21 18:27:11'),
(131, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-21 18:27:17'),
(132, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-21 18:27:54'),
(133, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-21 18:33:05'),
(134, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-21 18:33:10'),
(135, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-21 18:39:19'),
(136, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-21 18:43:23'),
(137, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-21 18:44:43'),
(138, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-21 18:49:07'),
(139, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-21 18:50:56'),
(140, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-21 18:51:43'),
(141, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-22 16:17:13'),
(142, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 16:17:15'),
(143, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 16:20:35'),
(144, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 16:28:45'),
(145, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 16:29:44'),
(146, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 16:30:27'),
(147, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 16:37:27'),
(148, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 16:38:48'),
(149, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 16:38:55'),
(150, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 16:39:27'),
(151, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 16:40:05'),
(152, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 16:52:26'),
(153, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 16:52:50'),
(154, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 17:23:56'),
(155, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 17:27:17'),
(156, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 17:28:45'),
(157, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 17:33:16'),
(158, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 17:33:27'),
(159, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 17:33:35'),
(160, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 17:34:15'),
(161, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 17:34:53'),
(162, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 17:35:26'),
(163, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 17:36:31'),
(164, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 17:56:50'),
(165, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 17:59:14'),
(166, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 18:01:17'),
(167, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-22 18:09:01'),
(168, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-22 18:09:02'),
(169, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 18:09:09'),
(170, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 18:09:10'),
(171, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 18:16:13'),
(172, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 18:22:15'),
(173, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 18:26:04'),
(174, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 18:29:09'),
(175, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-22 18:37:09'),
(176, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 18:37:11'),
(177, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 18:37:16'),
(178, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-22 19:09:58'),
(179, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 19:10:02'),
(180, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-22 19:10:41'),
(181, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-22 19:10:45'),
(182, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-22 19:12:12'),
(183, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-22 19:12:22'),
(184, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-22 19:12:29'),
(185, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-22 19:18:17'),
(186, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-22 19:20:11'),
(187, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-22 19:20:14'),
(188, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-22 19:23:57'),
(189, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-23 11:58:13'),
(190, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 11:58:15'),
(191, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 11:59:41'),
(192, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 11:59:43'),
(193, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:04:08'),
(194, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:05:16'),
(195, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:05:34'),
(196, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:09:43'),
(197, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:09:45'),
(198, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:09:54'),
(199, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:11:59'),
(200, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:15:47'),
(201, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:21:34'),
(202, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:24:52'),
(203, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:26:57'),
(204, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:29:51'),
(205, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:42:50'),
(206, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:44:30'),
(207, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:45:36'),
(208, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:47:15'),
(209, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:50:16'),
(210, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:55:02'),
(211, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:55:57'),
(212, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 12:57:51'),
(213, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:05:42'),
(214, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:05:43'),
(215, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:05:59'),
(216, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:20:36'),
(217, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:22:15'),
(218, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:23:14'),
(219, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:23:53'),
(220, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:25:15'),
(221, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:26:47'),
(222, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:28:45'),
(223, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:36:57'),
(224, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:40:01'),
(225, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 13:52:58'),
(226, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 14:04:11'),
(227, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-23 14:24:43'),
(228, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-23 14:58:00'),
(229, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-23 14:58:02'),
(230, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-23 14:58:03'),
(231, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-23 14:58:05'),
(232, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-23 22:26:01'),
(233, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-23 22:26:25'),
(234, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-23 22:30:57'),
(235, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-23 22:30:59'),
(236, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-23 22:31:09'),
(237, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-23 22:31:11'),
(238, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-23 22:32:47'),
(239, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-23 22:33:00'),
(240, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-23 22:43:21'),
(241, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-23 22:50:05'),
(242, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-23 22:53:42'),
(243, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-23 22:58:15'),
(244, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-23 23:00:27'),
(245, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-23 23:02:00'),
(246, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-23 23:07:10'),
(247, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-23 23:18:35'),
(248, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-23 23:20:24'),
(249, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-24 12:30:42'),
(250, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-24 12:30:45'),
(251, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-24 12:40:32'),
(252, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-24 13:10:55'),
(253, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-24 13:21:02'),
(254, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-24 13:27:00'),
(255, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-24 13:33:28'),
(256, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-24 13:34:24'),
(257, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-24 13:43:38'),
(258, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-24 18:16:25'),
(259, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-24 18:21:00'),
(260, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-24 18:21:02'),
(261, '::1', 'Chrome - 71.0.3578.98', 'admin', 4, 'Accesos', 'accesos', '2018-12-24 18:21:11'),
(262, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-24 18:21:13'),
(263, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-24 18:22:17'),
(264, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-24 18:22:38'),
(265, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-24 18:22:59'),
(266, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-29 12:57:31'),
(267, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 12:57:35'),
(268, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:01:17'),
(269, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-29 13:04:00'),
(270, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:04:04'),
(271, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:04:08'),
(272, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:10:40'),
(273, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:18:27'),
(274, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:22:51'),
(275, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:29:08'),
(276, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:39:48'),
(277, '::1', 'Chrome - 71.0.3578.98', 'admin', 5, 'Usuarios', 'usuarios', '2018-12-29 13:39:54'),
(278, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:40:23'),
(279, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:40:40'),
(280, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:40:42'),
(281, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:40:50'),
(282, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:41:02'),
(283, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:41:05'),
(284, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:46:37'),
(285, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:49:59'),
(286, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:58:57'),
(287, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:59:16'),
(288, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:59:21'),
(289, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 13:59:24'),
(290, '::1', 'Chrome - 71.0.3578.98', 'admin', 6, 'Productos', 'productos', '2018-12-29 13:59:43'),
(291, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 14:00:16'),
(292, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 14:18:42'),
(293, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 14:42:46'),
(294, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 14:50:34'),
(295, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 14:52:51'),
(296, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 14:53:31'),
(297, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 14:53:54'),
(298, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 14:54:09'),
(299, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 14:54:31'),
(300, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 14:54:51'),
(301, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 14:55:22'),
(302, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 14:56:15'),
(303, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 15:25:08'),
(304, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 15:26:47'),
(305, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 15:32:29'),
(306, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 15:38:44'),
(307, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 15:39:30'),
(308, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 15:40:25'),
(309, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 15:45:54'),
(310, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-29 15:59:17'),
(311, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 15:59:20'),
(312, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 15:59:23'),
(313, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 16:10:14'),
(314, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 16:11:01'),
(315, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 16:11:47'),
(316, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 16:16:51'),
(317, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 16:19:02'),
(318, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-29 19:48:38'),
(319, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 19:48:43'),
(320, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-29 21:56:54'),
(321, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 21:56:57'),
(322, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 22:11:14'),
(323, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 22:51:43'),
(324, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 22:52:11'),
(325, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 23:02:18'),
(326, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 23:02:36'),
(327, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 23:09:12'),
(328, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-29 23:17:42'),
(329, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-30 11:59:10'),
(330, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 11:59:16'),
(331, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 12:16:29'),
(332, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 12:27:48'),
(333, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 12:35:55'),
(334, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 12:36:22'),
(335, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 12:38:08'),
(336, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 12:43:50'),
(337, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 12:47:31'),
(338, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 13:44:45'),
(339, '::1', 'Chrome - 71.0.3578.98', 'admin', 2, 'Inicio', 'inicio', '2018-12-30 16:08:08'),
(340, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 16:08:11'),
(341, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 17:05:30'),
(342, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 17:09:45'),
(343, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 17:12:47'),
(344, '::1', 'Chrome - 71.0.3578.98', 'admin', 7, 'Pedidos', 'pedidos', '2018-12-30 17:41:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `idpadre` int(11) DEFAULT NULL,
  `estado` varchar(10) NOT NULL,
  `ventana` varchar(30) DEFAULT NULL,
  `framework` varchar(150) DEFAULT NULL,
  `orden` int(11) NOT NULL,
  `es_menu` char(2) NOT NULL,
  `icono` varchar(50) NOT NULL,
  `usuario_actualizacion` varchar(50) DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idmenu`, `nombre`, `idpadre`, `estado`, `ventana`, `framework`, `orden`, `es_menu`, `icono`, `usuario_actualizacion`, `fecha_actualizacion`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, 'Menú', NULL, 'ACTIVO', NULL, NULL, 1, 'SI', 'glyphicon-home', NULL, NULL, 'admin', '2018-12-11 00:00:00'),
(2, 'Inicio', 1, 'ACTIVO', 'inicio', 'jquery,bootstrap,highcharts', 1, 'NO', 'glyphicon-star', NULL, NULL, 'admin', '2018-12-11 00:00:00'),
(3, 'Configuración', NULL, 'ACTIVO', NULL, NULL, 2, 'SI', 'glyphicon-cog', NULL, NULL, 'admin', '2018-12-20 00:00:00'),
(4, 'Accesos', 3, 'ACTIVO', 'accesos', 'jquery,bootstrap,jquery-treeview,chosen', 1, 'NO', 'glyphicon-list-alt', NULL, NULL, 'admin', '2018-12-20 00:00:00'),
(5, 'Usuarios', 3, 'ACTIVO', 'usuarios', 'jquery,bootstrap,datatables', 2, 'NO', 'glyphicon-user', NULL, NULL, 'admin', '2018-12-22 00:00:00'),
(6, 'Productos', 1, 'ACTIVO', 'productos', 'jquery,bootstrap,datatables', 2, 'NO', 'glyphicon-picture', NULL, NULL, 'admin', '2018-12-23 00:00:00'),
(7, 'Pedidos', 1, 'ACTIVO', 'pedidos', 'jquery,bootstrap,datatables', 3, 'NO', 'glyphicon-file', NULL, NULL, 'admin', '2018-12-24 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `parametro` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `valor` varchar(250) NOT NULL,
  `usuario_actualizacion` varchar(50) DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`parametro`, `nombre`, `descripcion`, `valor`, `usuario_actualizacion`, `fecha_actualizacion`, `usuario_creacion`, `fecha_creacion`) VALUES
('claveusuario', 'Clave Usuario', 'Clave que se establecera al crear un usuario', '12345', NULL, NULL, 'admin', '2018-12-23 00:00:00'),
('impuesto', 'IMPUESTO', 'IMPUESTO', '12', NULL, NULL, 'admin', '2018-12-29 00:00:00'),
('paginadefecto', 'PAGINA DEFECTO', 'Pagina por defecto', 'inicio', NULL, NULL, 'admin', '2018-12-11 00:00:00'),
('timeout', 'TIME OUT', 'Tiempo maximo sin realizar acciones en minutos', '60', NULL, NULL, 'admin', '2018-12-11 00:00:00'),
('webversion', 'WEB VERSION', 'Sirve principalemente para el caching de los javascript, css', '9', NULL, NULL, 'admin', '2018-12-07 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_cabecera`
--

CREATE TABLE `pedidos_cabecera` (
  `idpedcab` int(11) NOT NULL,
  `vendedor` varchar(50) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `valor_impuesto` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `numero_factura` int(11) DEFAULT NULL,
  `error_servicio` text,
  `usuario_actualizacion` varchar(50) DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos_cabecera`
--

INSERT INTO `pedidos_cabecera` (`idpedcab`, `vendedor`, `cliente`, `direccion`, `subtotal`, `valor_impuesto`, `total`, `estado`, `numero_factura`, `error_servicio`, `usuario_actualizacion`, `fecha_actualizacion`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, 'admin', 'rosa', 'Norte de la ciudad', 23.00, 2.76, 25.76, 'CANCELADO', NULL, NULL, NULL, NULL, 'admin', '2018-12-29 22:38:22'),
(2, 'admin', 'maria', 'sur de la ciudad', 2.40, 0.29, 2.69, 'CANCELADO', NULL, NULL, NULL, NULL, 'admin', '2018-12-29 22:52:43'),
(3, 'admin', 'maria', 'Centro de la ciudad', 40.50, 4.29, 44.79, 'FACTURADO', 3, NULL, NULL, NULL, 'admin', '2018-12-30 17:06:20'),
(4, 'admin', 'rosa', 'Sur de la ciudad', 7.20, 0.00, 7.20, 'FACTURADO', 2, NULL, NULL, NULL, 'admin', '2018-12-30 17:13:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_detalle`
--

CREATE TABLE `pedidos_detalle` (
  `idpeddet` int(11) NOT NULL,
  `idpedcab` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `impuesto` int(11) NOT NULL,
  `valor_impuesto` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `usuario_actualizacion` varchar(50) DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos_detalle`
--

INSERT INTO `pedidos_detalle` (`idpeddet`, `idpedcab`, `idproducto`, `precio`, `cantidad`, `subtotal`, `impuesto`, `valor_impuesto`, `total`, `usuario_actualizacion`, `fecha_actualizacion`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, 1, 1, 10.30, 2, 20.60, 12, 2.47, 23.07, NULL, NULL, 'admin', '2018-12-29 22:38:22'),
(2, 1, 3, 1.20, 2, 2.40, 12, 0.29, 2.69, NULL, NULL, 'admin', '2018-12-29 22:38:22'),
(3, 2, 3, 1.20, 2, 2.40, 12, 0.29, 2.69, NULL, NULL, 'admin', '2018-12-29 22:52:43'),
(4, 3, 1, 10.30, 3, 30.90, 12, 3.71, 34.61, NULL, NULL, 'admin', '2018-12-30 17:06:20'),
(5, 3, 2, 2.40, 2, 4.80, 0, 0.00, 4.80, NULL, NULL, 'admin', '2018-12-30 17:06:20'),
(6, 3, 3, 1.20, 4, 4.80, 12, 0.58, 5.38, NULL, NULL, 'admin', '2018-12-30 17:06:20'),
(7, 4, 2, 2.40, 3, 7.20, 0, 0.00, 7.20, NULL, NULL, 'admin', '2018-12-30 17:13:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `estado` char(10) NOT NULL,
  `impuesto` char(2) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `usuario_actualizacion` varchar(50) DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre`, `descripcion`, `estado`, `impuesto`, `precio`, `stock`, `usuario_actualizacion`, `fecha_actualizacion`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, 'Azzurra', 'Talco', 'ACTIVO', 'SI', 10.30, 31, 'admin', '2018-12-30 17:06:20', 'admin', '2018-12-24 13:11:41'),
(2, 'Azucar', 'Dulce para las bebidas', 'ACTIVO', 'NO', 2.40, 7, 'admin', '2018-12-30 17:13:13', 'admin', '2018-12-24 13:35:38'),
(3, 'Coca Cola', 'Bebida', 'ACTIVO', 'SI', 1.20, 16, 'admin', '2018-12-30 17:06:20', 'admin', '2018-12-29 14:00:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `usuario_actualizacion` varchar(50) DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `nombre`, `email`, `clave`, `tipo_usuario`, `usuario_actualizacion`, `fecha_actualizacion`, `usuario_creacion`, `fecha_creacion`) VALUES
('admin', 'Administrador', 'admin@email.com', 'c80cff134da3185475daaff865759b5afa89fc137843b97c8f8ff0c56720312a535c44348c6bbc913a1a3d791c30cd387d912d40472a7e9d41d8464a925a275c', 'ADMINISTRADOR', NULL, NULL, 'admin', '2018-12-05 00:00:00'),
('jose', 'José', 'pepe@email.com', 'c80cff134da3185475daaff865759b5afa89fc137843b97c8f8ff0c56720312a535c44348c6bbc913a1a3d791c30cd387d912d40472a7e9d41d8464a925a275c', 'VENDEDOR', 'admin', '2018-12-23 14:04:18', 'admin', '2018-12-05 00:00:00'),
('maria', 'Maria', 'maria@email.com', 'c80cff134da3185475daaff865759b5afa89fc137843b97c8f8ff0c56720312a535c44348c6bbc913a1a3d791c30cd387d912d40472a7e9d41d8464a925a275c', 'CLIENTE', 'admin', '2018-12-23 14:17:44', 'admin', '2018-12-23 14:15:22'),
('rosa', 'Rosa Villamar', 'rosa@email.com', 'c80cff134da3185475daaff865759b5afa89fc137843b97c8f8ff0c56720312a535c44348c6bbc913a1a3d791c30cd387d912d40472a7e9d41d8464a925a275c', 'CLIENTE', NULL, NULL, 'admin', '2018-12-29 13:40:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_accesos`
--

CREATE TABLE `usuarios_accesos` (
  `idmenu` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_accesos`
--

INSERT INTO `usuarios_accesos` (`idmenu`, `usuario`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, 'admin', 'admin', '2018-12-24 18:21:08'),
(1, 'jose', 'admin', '2018-12-22 18:38:35'),
(2, 'admin', 'admin', '2018-12-24 18:21:08'),
(2, 'jose', 'admin', '2018-12-22 18:38:35'),
(3, 'admin', 'admin', '2018-12-24 18:21:09'),
(4, 'admin', 'admin', '2018-12-24 18:21:09'),
(5, 'admin', 'admin', '2018-12-24 18:21:09'),
(6, 'admin', 'admin', '2018-12-24 18:21:08'),
(7, 'admin', 'admin', '2018-12-24 18:21:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD UNIQUE KEY `clave_unica` (`vendedor`,`cliente`,`idproducto`);

--
-- Indices de la tabla `log_menu`
--
ALTER TABLE `log_menu`
  ADD PRIMARY KEY (`idlogmenu`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD UNIQUE KEY `parametro` (`parametro`);

--
-- Indices de la tabla `pedidos_cabecera`
--
ALTER TABLE `pedidos_cabecera`
  ADD PRIMARY KEY (`idpedcab`);

--
-- Indices de la tabla `pedidos_detalle`
--
ALTER TABLE `pedidos_detalle`
  ADD PRIMARY KEY (`idpeddet`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuarios_accesos`
--
ALTER TABLE `usuarios_accesos`
  ADD UNIQUE KEY `IDMENU_USUARIO` (`idmenu`,`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `log_menu`
--
ALTER TABLE `log_menu`
  MODIFY `idlogmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedidos_cabecera`
--
ALTER TABLE `pedidos_cabecera`
  MODIFY `idpedcab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos_detalle`
--
ALTER TABLE `pedidos_detalle`
  MODIFY `idpeddet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
