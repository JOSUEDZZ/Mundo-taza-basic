-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para mundotaza
CREATE DATABASE IF NOT EXISTS `mundotaza` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mundotaza`;

-- Volcando estructura para tabla mundotaza.detalles
CREATE TABLE IF NOT EXISTS `detalles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `detalles` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla mundotaza.detalles: ~10 rows (aproximadamente)
REPLACE INTO `detalles` (`id`, `detalles`) VALUES
	(1, 'Sumérgete en la elegancia sobria con nuestra taza negra. Perfecta para aquellos que aprecian la simplicidad y el misterio en cada sorbo.'),
	(2, 'Despierta con energía y vitalidad con nuestra taza naranja. Su color vibrante te recordará la frescura de un amanecer radiante cada mañana.'),
	(3, 'Deja que las olas de tranquilidad te envuelvan con nuestra taza azul. Ideal para quienes buscan calma y serenidad en cada taza de café o té.'),
	(4, 'Embárcate en una aventura intergaláctica con nuestra taza de Star Wars. Que la fuerza te acompañe en cada sorbo de tu bebida favorita.'),
	(5, 'Celebra a papá con nuestra taza especial. Con un diseño cariñoso, es el regalo perfecto para el "Mejor Papá del Mundo".'),
	(6, 'Transforma tu pausa para el café en un momento artístico con nuestra taza de decoración. Un lienzo único para tus bebidas cotidianas.'),
	(7, 'Deja que la magia de los unicornios te acompañe con nuestra encantadora taza. Perfecta para los amantes de los seres mágicos y los colores vibrantes.'),
	(8, 'Celebra la temporada navideña con nuestra taza de Santa Claus. Añade un toque festivo a tus bebidas mientras disfrutas del espíritu navideño.'),
	(9, 'Revive la nostalgia de la infancia con nuestra taza de Mickey Mouse. Ideal para los fanáticos de Disney que buscan un toque de diversión en cada sorbo.'),
	(10, 'Añade un toque adorable a tu día con nuestra taza de gato. Perfecta para los amantes de los felinos, esta taza hará que cada momento sea aún más reconfortante.');

-- Volcando estructura para tabla mundotaza.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `precio` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla mundotaza.productos: ~10 rows (aproximadamente)
REPLACE INTO `productos` (`id`, `nombre`, `precio`) VALUES
	(1, 'taza negra', 60),
	(2, 'taza naranja', 50),
	(3, 'taza azul', 60),
	(4, 'taza star wars', 70),
	(5, 'taza papa', 75),
	(6, 'taza decoracion', 80),
	(7, 'taza unicornio', 85),
	(8, 'taza santa clous', 70),
	(9, 'taza mickey mouse', 90),
	(10, 'taza gato', 60);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
