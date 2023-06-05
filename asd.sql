-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para proyectophp
CREATE DATABASE IF NOT EXISTS `proyectophp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `proyectophp`;

-- Volcando estructura para tabla proyectophp.paqueteturistico
CREATE TABLE IF NOT EXISTS `paqueteturistico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `direccion` varchar(50) NOT NULL,
  `duracion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyectophp.paqueteturistico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `paqueteturistico` DISABLE KEYS */;
INSERT INTO `paqueteturistico` (`id`, `nombre`, `direccion`, `duracion`) VALUES
	(2, 'asd', 'asd', 15);
/*!40000 ALTER TABLE `paqueteturistico` ENABLE KEYS */;

-- Volcando estructura para tabla proyectophp.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL,
  `fechasolicitud` date NOT NULL,
  `fechadestino` date NOT NULL,
  `costo` double DEFAULT NULL,
  `destino` varchar(50) NOT NULL,
  `fkidusuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pedidos_usuarios` (`fkidusuario`),
  CONSTRAINT `FK_pedidos_usuarios` FOREIGN KEY (`fkidusuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyectophp.pedidos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` (`id`, `fechasolicitud`, `fechadestino`, `costo`, `destino`, `fkidusuario`) VALUES
	(1, '2023-06-05', '2023-06-06', 500, 'Lima', 1);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla proyectophp.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `ruc` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  PRIMARY KEY (`ruc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyectophp.proveedores: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` (`ruc`, `nombre`, `pais`) VALUES
	('123456720', 'zxc', 'asd'),
	('123456789', 'ProveedorB', 'CountryB');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;

-- Volcando estructura para tabla proyectophp.reservainteresados
CREATE TABLE IF NOT EXISTS `reservainteresados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `precioTotal` decimal(10,2) NOT NULL,
  `fkidUsuario` int(11) NOT NULL,
  `fkidServicio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_paqueteturistico_usuarios` (`fkidUsuario`),
  KEY `FK_paqueteturistico_servicio` (`fkidServicio`),
  CONSTRAINT `FK_paqueteturistico_servicio` FOREIGN KEY (`fkidServicio`) REFERENCES `servicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_paqueteturistico_usuarios` FOREIGN KEY (`fkidUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyectophp.reservainteresados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reservainteresados` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservainteresados` ENABLE KEYS */;

-- Volcando estructura para tabla proyectophp.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyectophp.roles: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nombre`) VALUES
	(1, 'usuario'),
	(2, 'admin'),
	(3, 'interesado');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla proyectophp.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `costo` decimal(10,2) NOT NULL,
  `fkidPaqueteTuristico` int(11) NOT NULL DEFAULT 0,
  `fkidProveedor` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_servicios_proveedor` (`fkidProveedor`),
  KEY `FK_servicios_paqueteturistico` (`fkidPaqueteTuristico`),
  CONSTRAINT `FK_servicios_paqueteturistico` FOREIGN KEY (`fkidPaqueteTuristico`) REFERENCES `paqueteturistico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_servicios_proveedor` FOREIGN KEY (`fkidProveedor`) REFERENCES `proveedores` (`ruc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyectophp.servicios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` (`id`, `nombre`, `costo`, `fkidPaqueteTuristico`, `fkidProveedor`) VALUES
	(4, 'asd', 500.00, 2, '123456789');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;

-- Volcando estructura para tabla proyectophp.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `numeroCelular` varchar(20) NOT NULL,
  `rol` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usuarios_roles` (`rol`),
  CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla proyectophp.usuarios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `password`, `numeroCelular`, `rol`, `email`) VALUES
	(1, 'Johne', 'Doe', '1234', '966000002', 2, '123@gmail.com'),
	(3, 'qwe', 'qwe', '1234', '123456789', 1, '1234@gmail.com'),
	(6, 'uio', 'uio', '147', '123456781', 1, 'uio@gmail.com');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
