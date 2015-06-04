-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for annhau
CREATE DATABASE IF NOT EXISTS `annhau` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `annhau`;


-- Dumping structure for table annhau.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table annhau.categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `image`, `created`, `modified`, `deleted`) VALUES
	(1, 'Bedroom', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(2, 'Living Room', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(3, 'Kitchen &  Dining', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table annhau.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) NOT NULL DEFAULT '0',
  `commentator` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT '0000-00-00 00:00:00',
  `modified` datetime DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table annhau.comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table annhau.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `category` int(11) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `long_description` text NOT NULL,
  `image_1` varchar(50) NOT NULL,
  `image_2` varchar(50) NOT NULL,
  `image_3` varchar(50) NOT NULL,
  `image_4` varchar(50) NOT NULL,
  `image_5` varchar(50) NOT NULL,
  `creator` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `available` tinyint(4) NOT NULL DEFAULT '1',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table annhau.products: ~4 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `category`, `short_description`, `long_description`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `creator`, `created`, `modified`, `available`, `deleted`) VALUES
	(1, 'Procat1sub11', 1, '', '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
	(2, 'Procat1sub12', 1, '', '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
	(3, 'Procat1sub21', 2, '', '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
	(4, 'Procat2sub41', 4, '', '', '', '', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table annhau.subcategories
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table annhau.subcategories: ~5 rows (approximately)
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
