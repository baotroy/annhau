-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for fur
CREATE DATABASE IF NOT EXISTS `fur` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `fur`;


-- Dumping structure for table fur.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fur.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


-- Dumping structure for table fur.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `image`, `created`, `modified`, `deleted`) VALUES
	(1, 'Bedroom', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(2, 'Living Room', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(3, 'Kitchen &  Dining', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table fur.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `product` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modfied` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `author_name`, `email`, `product`, `content`, `created`, `modfied`, `deleted`) VALUES
	(1, 'Bao', 'llj.com', 1, 'contetn', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table fur.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `category` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `image_1` varchar(50) NOT NULL,
  `image_2` varchar(50) NOT NULL,
  `image_3` varchar(50) NOT NULL,
  `image_4` varchar(50) NOT NULL,
  `image_5` varchar(50) NOT NULL,
  `available` tinyint(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.products: ~4 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `short_description`, `long_description`, `category`, `creator`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `available`, `created`, `modified`, `deleted`) VALUES
	(1, 'Procat1sub11', '', '', 1, 0, '', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(2, 'Procat1sub12', '', '', 1, 0, '', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(3, 'Procat1sub21', '', '', 2, 0, 'p1_1.jpg', 'p1_2.jpg', 'p1_1.jpg', 'p1_2.jpg', 'p1_1.jpg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(4, 'Procat2sub41', '', '', 4, 0, '', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table fur.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner` varchar(50) NOT NULL DEFAULT '0',
  `map_lat` varchar(20) NOT NULL DEFAULT '0',
  `map_long` varchar(20) NOT NULL DEFAULT '0',
  `site_name` varchar(100) NOT NULL DEFAULT '0',
  `address` varchar(100) NOT NULL DEFAULT '0',
  `tel` varchar(20) NOT NULL DEFAULT '0',
  `email` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table fur.settings: ~0 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Dumping structure for table fur.subcategories
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.subcategories: ~5 rows (approximately)
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` (`id`, `name`, `category`, `created`, `modified`, `deleted`) VALUES
	(1, 'Beds', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(2, 'Dressers', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(3, 'Bedroom Sets', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(4, 'TV Stands', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(5, 'Leather Furniture', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
