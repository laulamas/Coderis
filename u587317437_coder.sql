
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2017 at 04:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u587317437_coder`
--

-- --------------------------------------------------------

--
-- Table structure for table `Registro`
--

CREATE TABLE IF NOT EXISTS `Registro` (
  `tipo_usuario` int(11) NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `apellido` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha_desactivado` date NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Coderis Registro de Usuario' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Registro`
--

INSERT INTO `Registro` (`tipo_usuario`, `nombre`, `apellido`, `telefono`, `id_usuario`, `usuario`, `password`, `email`, `fecha_desactivado`) VALUES
(1, 'edxavier', '', '9392595473', 1, 'admin', 'admin', '', '0000-00-00'),
(0, 'Santos', 'jorobado', '777-777-7777', 3, 'santos', 'yo', 'santos@nail.com', '0000-00-00'),
(0, 'Laura', 'Garcia', '787-345-4567', 4, 'laura_garcia', '1234', 'laura@gmail.com', '0000-00-00'),
(0, 'Santos', 'Tomas', '787-333-3333', 5, 'santos_01', 'yo', 'santos_01@gmail.com', '0000-00-00'),
(0, 'Laura', 'Torres', '787-333-3333', 6, 'laura', 'yo', 'laura@gmail.com', '0000-00-00'),
(0, 'Santos w', 'jodfnddfg', '777-777-7777', 7, 'santos_01', 'yo', 'santos@nail.com', '0000-00-00'),
(0, 'Miguel', 'Roberto', '787-245-4567', 8, 'miguel01', '123', 'miguel01@gmail.com', '0000-00-00'),
(0, 'Juan', 'Zoe', '787-333-3333', 9, 'juan_01', 'yo', 'juan_01@gmail.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documento`
--

CREATE TABLE IF NOT EXISTS `tbl_documento` (
  `id_documento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_documento` text COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `sel_documento` int(11) NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `dias_alerta` int(11) NOT NULL,
  `cancelado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_documento`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_documento`
--

INSERT INTO `tbl_documento` (`id_documento`, `nombre_documento`, `id_usuario`, `sel_documento`, `fecha_expiracion`, `dias_alerta`, `cancelado`) VALUES
(3, 'braille.pptx', 6, 2, '2017-04-14', 60, 0),
(6, 'pinewood.txt', 6, 3, '2017-05-09', 60, 0),
(7, 'pinewood.txt', 5, 4, '2017-04-26', 30, 0),
(8, 'Photoshop Certificate.pdf', 5, 0, '2017-05-31', 60, 0),
(9, 'Photoshop Certificate.pdf', 6, 1, '2017-04-28', 60, 0),
(10, 'Photoshop Certificate.pdf', 4, 0, '2017-08-01', 30, 0),
(11, 'Transcript MOS Actualizado.pdf', 0, 1, '2017-05-01', 30, 0),
(12, 'Transcript MOS Actualizado.pdf', 9, 1, '2017-05-01', 30, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
