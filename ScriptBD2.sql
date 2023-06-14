-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.33 - MySQL Community Server - GPL
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
CREATE DATABASE IF NOT EXISTS `proyectophp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `proyectophp`;

-- Volcando estructura para tabla proyectophp.paqueteturistico
CREATE TABLE IF NOT EXISTS `paqueteturistico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `direccion` varchar(50) NOT NULL,
  `duracion` int NOT NULL,
  `preciototal` double NOT NULL,
  `imagen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla proyectophp.paqueteturistico: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `paqueteturistico` DISABLE KEYS */;
INSERT INTO `paqueteturistico` (`id`, `nombre`, `direccion`, `duracion`, `preciototal`, `imagen`) VALUES
	(1, 'Playas del Norte', 'Piura', 4, 500, '1.jpeg'),
	(2, 'Playas del Norte', 'Tumbes', 4, 700, '2.jpg'),
	(3, 'Ciudades de Europa', 'Francia', 14, 5000, '3.jpg'),
	(4, 'Aventura en la Selva', 'Iquitos', 7, 1500, '4.jpg'),
	(5, 'Explorando las Ruinas', 'Cusco', 5, 500, '5.jpg');
/*!40000 ALTER TABLE `paqueteturistico` ENABLE KEYS */;

-- Volcando estructura para tabla proyectophp.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fechasolicitud` date NOT NULL,
  `fechadestino` date NOT NULL,
  `costo` double DEFAULT NULL,
  `destino` varchar(50) NOT NULL,
  `fkidusuario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pedidos_usuarios` (`fkidusuario`),
  CONSTRAINT `FK_pedidos_usuarios` FOREIGN KEY (`fkidusuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla proyectophp.pedidos: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` (`id`, `fechasolicitud`, `fechadestino`, `costo`, `destino`, `fkidusuario`) VALUES
	(1, '2023-06-05', '2023-06-06', 700, 'Lima', 2),
	(2, '2023-06-07', '2023-06-15', 600, 'Cancun', 10),
	(3, '2023-06-07', '2023-06-24', 500, 'Mexico', 2),
	(4, '2023-06-08', '2023-06-12', 800, 'Madrid', 6),
	(5, '2023-06-10', '2023-06-18', 900, 'París', 7),
	(6, '2023-06-12', '2023-06-20', 750, 'Roma', 8),
	(7, '2023-06-15', '2023-06-25', 1000, 'Nueva York', 9),
	(8, '2023-06-18', '2023-06-22', 850, 'Barcelona', 5),
	(9, '2023-06-20', '2023-06-25', 950, 'Tokio', 10),
	(10, '2023-06-22', '2023-06-30', 700, 'Ámsterdam', 6);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla proyectophp.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `ruc` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  PRIMARY KEY (`ruc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla proyectophp.proveedores: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` (`ruc`, `nombre`, `pais`) VALUES
	('123456720', 'AirPlanes', 'Chile'),
	('123456789', 'AeroPeru', 'Lima'),
	('135792468', 'CaribbeanGetaways', 'Jamaica'),
	('246813579', 'AsiaTour', 'China'),
	('543210987', 'EuroTrip', 'Francia'),
	('632459781', 'MountainHikes', 'Suiza'),
	('718293546', 'TropicalParadise', 'Brasil'),
	('864209753', 'AussieAdventures', 'Australia'),
	('975318624', 'SafariExplorers', 'Kenia'),
	('987654321', 'TravelWorld', 'Estados Unidos');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;

-- Volcando estructura para tabla proyectophp.reservainteresados
CREATE TABLE IF NOT EXISTS `reservainteresados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `precioTotal` decimal(10,2) NOT NULL,
  `fkidUsuario` int NOT NULL,
  `fkidServicio` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_paqueteturistico_usuarios` (`fkidUsuario`),
  KEY `FK_paqueteturistico_servicio` (`fkidServicio`),
  CONSTRAINT `FK_paqueteturistico_usuarios` FOREIGN KEY (`fkidUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_reservainteresados_paqueteturistico` FOREIGN KEY (`fkidServicio`) REFERENCES `paqueteturistico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla proyectophp.reservainteresados: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `reservainteresados` DISABLE KEYS */;
INSERT INTO `reservainteresados` (`id`, `nombre`, `precioTotal`, `fkidUsuario`, `fkidServicio`) VALUES
	(1, 'Reserva miami', 1452.00, 2, 4),
	(2, 'Reserva miami', 2564.00, 10, 1),
	(3, 'Reserva Mexico', 6517.00, 2, 4),
	(4, 'Reserva Londres', 3298.00, 6, 2),
	(5, 'Reserva París', 2175.00, 7, 3),
	(6, 'Reserva Roma', 1890.00, 8, 5),
	(7, 'Reserva Nueva York', 4100.00, 9, 1),
	(8, 'Reserva Barcelona', 2915.00, 5, 3),
	(9, 'Reserva Tokio', 5260.00, 10, 2),
	(10, 'Reserva Ámsterdam', 1725.00, 6, 4);
/*!40000 ALTER TABLE `reservainteresados` ENABLE KEYS */;

-- Volcando estructura para tabla proyectophp.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla proyectophp.roles: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nombre`) VALUES
	(1, 'usuario'),
	(2, 'admin'),
	(3, 'interesado');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla proyectophp.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `costo` decimal(10,2) NOT NULL,
  `fkidPaqueteTuristico` int NOT NULL DEFAULT '0',
  `fkidProveedor` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_servicios_proveedor` (`fkidProveedor`),
  KEY `FK_servicios_paqueteturistico` (`fkidPaqueteTuristico`),
  CONSTRAINT `FK_servicios_paqueteturistico` FOREIGN KEY (`fkidPaqueteTuristico`) REFERENCES `paqueteturistico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_servicios_proveedor` FOREIGN KEY (`fkidProveedor`) REFERENCES `proveedores` (`ruc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla proyectophp.servicios: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` (`id`, `nombre`, `costo`, `fkidPaqueteTuristico`, `fkidProveedor`) VALUES
	(1, 'Alojamiento', 1500.00, 3, '123456720'),
	(2, 'Alimentacion', 500.00, 2, '123456789'),
	(3, 'Alimentacion', 400.00, 1, '123456789'),
	(4, 'Alojamiento', 600.00, 1, '123456789'),
	(5, 'Transporte', 800.00, 2, '987654321'),
	(6, 'Excursiones', 350.00, 3, '543210987'),
	(7, 'Guía turístico', 250.00, 2, '246813579'),
	(8, 'Actividades acuáticas', 450.00, 1, '135792468'),
	(9, 'Espectáculos culturales', 300.00, 4, '864209753'),
	(10, 'Safari en la selva', 700.00, 3, '975318624'),
	(11, 'Senderismo en montañas', 400.00, 1, '632459781'),
	(12, 'Paquetes turísticos personalizados', 1200.00, 3, '718293546');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;

-- Volcando estructura para tabla proyectophp.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `numeroCelular` varchar(20) NOT NULL,
  `rol` int NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usuarios_roles` (`rol`),
  CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla proyectophp.usuarios: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `password`, `numeroCelular`, `rol`, `email`) VALUES
	(1, 'Johne', 'Doe', '$2y$10$tUdKI21G3Fz52TUZi/aSNevlIL132RWVwwU43PvPwgE9Ge3H7vBVe', '966000002', 2, '123@gmail.com'),
	(2, 'Maria', 'Peres', '$2y$10$tUdKI21G3Fz52TUZi/aSNevlIL132RWVwwU43PvPwgE9Ge3H7vBVe', '987654321', 1, 'maria@gmail.com'),
	(3, 'Ana', 'Gomez', '$2y$10$tUdKI21G3Fz52TUZi/aSNevlIL132RWVwwU43PvPwgE9Ge3H7vBVe', '5551234567', 1, 'ana@gmail.com'),
	(4, 'Luis', 'Hernandez', '$2y$10$tUdKI21G3Fz52TUZi/aSNevlIL132RWVwwU43PvPwgE9Ge3H7vBVe', '999888777', 1, 'luis@gmail.com'),
	(5, 'Carolina', 'Lopez', '$2y$10$tUdKI21G3Fz52TUZi/aSNevlIL132RWVwwU43PvPwgE9Ge3H7vBVe', '111222333', 2, 'carolina@gmail.com'),
	(6, 'Pedro', 'Rodríguez', '$2y$10$tUdKI21G3Fz52TUZi/aSNevlIL132RWVwwU43PvPwgE9Ge3H7vBVe', '5555555555', 1, 'pedro.rodriguez@example.com'),
	(7, 'Laura', 'González', '$2y$10$tUdKI21G3Fz52TUZi/aSNevlIL132RWVwwU43PvPwgE9Ge3H7vBVe', '6666666666', 2, 'laura.gonzalez@example.com'),
	(8, 'Carlos', 'Martínez', '$2y$10$tUdKI21G3Fz52TUZi/aSNevlIL132RWVwwU43PvPwgE9Ge3H7vBVe', '7777777777', 3, 'carlos.martinez@example.com'),
	(9, 'Sofía', 'Herrera', '$2y$10$tUdKI21G3Fz52TUZi/aSNevlIL132RWVwwU43PvPwgE9Ge3H7vBVe', '8888888888', 2, 'sofia.herrera@example.com'),
	(10, 'Juan', 'Pedro', '$2y$10$tUdKI21G3Fz52TUZi/aSNevlIL132RWVwwU43PvPwgE9Ge3H7vBVe', '123456789', 1, 'pedro@gmail.com');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
