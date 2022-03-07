-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-03-2022 a las 03:50:10
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `04masw01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

DROP TABLE IF EXISTS `actores`;
CREATE TABLE IF NOT EXISTS `actores` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  `Apellidos` varchar(200) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Nacionalidad` varchar(200) DEFAULT NULL,
  `Vigencia` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`ID`, `Nombre`, `Apellidos`, `Fecha`, `Nacionalidad`, `Vigencia`) VALUES
(1, 'pablo', 'vicencio contreras', '1993-03-03', 'chile', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

DROP TABLE IF EXISTS `directores`;
CREATE TABLE IF NOT EXISTS `directores` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  `Apellidos` varchar(200) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Nacionalidad` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

DROP TABLE IF EXISTS `idiomas`;
CREATE TABLE IF NOT EXISTS `idiomas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  `ISO_code` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Idiomas_unique` (`ISO_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

DROP TABLE IF EXISTS `plataformas`;
CREATE TABLE IF NOT EXISTS `plataformas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Título` varchar(200) DEFAULT NULL,
  `Plataforma` int(11) DEFAULT NULL,
  `Director` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_serie_director_idx` (`Director`),
  KEY `fk_serie_plataforma_idx` (`Plataforma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie_actores`
--

DROP TABLE IF EXISTS `serie_actores`;
CREATE TABLE IF NOT EXISTS `serie_actores` (
  `Id` int(11) NOT NULL,
  `IDserie` int(11) NOT NULL,
  `IDActores` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_serie_idx` (`IDserie`),
  KEY `fk_actor_idx` (`IDActores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `fk_serie_director` FOREIGN KEY (`Director`) REFERENCES `directores` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_serie_plataforma` FOREIGN KEY (`Plataforma`) REFERENCES `plataformas` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `serie_actores`
--
ALTER TABLE `serie_actores`
  ADD CONSTRAINT `fk_actor` FOREIGN KEY (`IDActores`) REFERENCES `actores` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_serie` FOREIGN KEY (`IDserie`) REFERENCES `series` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
