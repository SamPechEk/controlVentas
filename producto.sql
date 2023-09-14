-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `control_ventas`;
CREATE DATABASE `control_ventas` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `control_ventas`;

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(99) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `producto` (`idproducto`, `nombre`, `precio`, `cantidad`, `total`) VALUES
(116,	'COCA',	45,	5,	225);

-- 2021-12-15 00:56:22
