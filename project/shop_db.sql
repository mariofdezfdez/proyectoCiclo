-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.21-MariaDB - mariadb.org binary distribution
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


-- Volcando estructura de base de datos para shop_db
CREATE DATABASE IF NOT EXISTS `shop_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `shop_db`;

-- Volcando estructura para tabla shop_db.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `quantity` int(100) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `certified` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla shop_db.cart: ~0 rows (aproximadamente)

-- Volcando estructura para tabla shop_db.message
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla shop_db.message: ~1 rows (aproximadamente)
REPLACE INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
	(3, 3, 'ana', 'miguel@gmail.com', '546465', 'hola probando ');

-- Volcando estructura para tabla shop_db.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `cif` varchar(50) DEFAULT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla shop_db.orders: ~7 rows (aproximadamente)
REPLACE INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `cif`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
	(7, 3, 'asdas', 'asd', '', 'credit card', 'ad', 'asd', ', Poliester (50) , Lana (60) , Nylon (78) , Lana (2) ', 722, '05-Sep-2022', 'acabado'),
	(9, 3, '', '', '', 'credit card', '', '', ', Seda (20) , Lana (12) , Poliester (4) ', 188, '06-Sep-2022', 'pedido recibido'),
	(10, 3, '', '', '', 'credit card', '', '', ', Poliester (401010) , Seda (0) ', 802020, '06-Sep-2022', 'enviado'),
	(12, 3, 'inditex', '6515645', 'sara@hotymsil.xom', 'credit card', '', '', ', Algodon (50) ', 250, '06-Sep-2022', 'proceso productivo'),
	(13, 3, 'ADIDAS', '19823019038', 'mariofernandezfernandez1@gmail41', 'credit card', 'ASDA', '54656', ', Nylon (60) ', 240, '10-Sep-2022', 'pedido recibido'),
	(14, 1, '', '', '', 'credit card', '', '', ', Poliester (50) ', 50, '10-Sep-2022', 'pending'),
	(15, 15, 'adidas', '615984654', 'anita@gmail.com', 'paypal', 'asd', 'asd', ', Nylon (324) ', 1296, '10-Sep-2022', 'pending');

-- Volcando estructura para tabla shop_db.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla shop_db.products: ~11 rows (aproximadamente)
REPLACE INTO `products` (`id`, `name`, `price`) VALUES
	(2, 'Poliester', 1),
	(3, 'Seda', 6),
	(5, 'Nylon', 4),
	(10, 'Algodón', 2),
	(11, 'Lana', 5),
	(12, 'Elastano', 3),
	(13, 'Viscosa', 3),
	(14, 'Rayon', 4),
	(15, 'lyocell', 4),
	(16, 'Lino', 5),
	(17, 'Yute', 5);

-- Volcando estructura para tabla shop_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla shop_db.users: ~12 rows (aproximadamente)
REPLACE INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
	(1, 'sara', 'mariofernandezfernandez1@gmail.es', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
	(2, 'a', 'mariofernandezfernandez1@gmail', '0cc175b9c0f1b6a831c399e269772661', 'user'),
	(3, 'mario', 'mariofernandezfernandez1@gmail.es', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
	(4, 'lucas', 'hola@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'admin'),
	(5, 'sara', 'julia@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'admin'),
	(6, 'salvadoroo', 's@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
	(7, 'lucas', 'h@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
	(8, 'lucas', 'j@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
	(9, 'ana', 'p@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
	(13, 'inditex', 'p@hotmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
	(14, 'a', 'j@hmail.com', '1', 'user'),
	(15, 'anita', 'anita@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
	(16, 'mario', 'mariofernandezfernandez1@gmail.es', '5a05254570cc97ac9582ad7c5877f1ad', 'user'),
	(17, 'mario', 'mariofernandezfernandez1@gmail.es', '7367cc4cee061a476290d18978830414', 'user'),
	(18, 'mario', 'guapa@gmail.com', '7367cc4cee061a476290d18978830414', 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
