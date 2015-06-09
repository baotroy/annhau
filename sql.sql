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
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `role`, `created`, `modified`, `deleted`) VALUES
	(1, 'admin', '1869e5577985ea2ef0a34e443a5b57276f9fb78a', NULL, NULL, NULL, 1, '2015-06-09 18:55:21', '2015-06-09 18:55:21', 0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


-- Dumping structure for table fur.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(50) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.banners: ~2 rows (approximately)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`id`, `image`, `del_flg`) VALUES
	(1, 'golden_banner.png', 0),
	(2, 'blue.jpg', 0);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;


-- Dumping structure for table fur.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(50) NOT NULL,
  `name_vi` varchar(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description_vi` mediumtext,
  `description_en` mediumtext,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name_en`, `name_vi`, `image`, `description_vi`, `description_en`, `created`, `modified`, `deleted`) VALUES
	(1, 'Bedroom', 'Phòng ngủ', NULL, 'Mô tả tiến việt', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas sed nunc in ex porttitor ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(2, 'Living Room', 'Phòng khách', NULL, 'Mô tả tiến việt', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas sed nunc in ex porttitor ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(3, 'Kitchen &  Dining', 'Bếp & Nhà ăn', NULL, 'Mô tả tiến việt', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas sed nunc in ex porttitor ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table fur.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentator` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `product` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.comments: ~4 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `commentator`, `email`, `product`, `content`, `created`, `modified`, `deleted`) VALUES
	(15, 'bao', 'troy@kjsl.com', 3, 'jaldkj lksjlfks\r\nsdf\r\nsf\r\nsd\r\nfsd\r\nf', '2015-06-05 18:31:34', '2015-06-05 18:31:34', 0),
	(17, 'sfs', 'kljf@sdlkfj.kjlk', 3, 'lsdkfjlkd', '2015-06-05 18:32:58', '2015-06-05 18:32:58', 0),
	(19, 'Thor', 'thor@heaven.com', 3, 'lkdsfl\r\ndsf\r\nsd\'dfsf\'df', '2015-06-05 18:41:47', '2015-06-05 18:41:47', 0),
	(20, 'troy', 'lks@lhlk.com', 3, 'sdfs', '2015-06-05 18:44:44', '2015-06-05 18:44:44', 0),
	(21, 'dfjl', 'lj@klj.com', 1, 'dsfsdf', '2015-06-08 14:04:21', '2015-06-08 14:04:21', 0);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table fur.inqueries
CREATE TABLE IF NOT EXISTS `inqueries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `content` varchar(200) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.inqueries: ~2 rows (approximately)
/*!40000 ALTER TABLE `inqueries` DISABLE KEYS */;
INSERT INTO `inqueries` (`id`, `email`, `content`, `tel`, `created`, `del_flg`) VALUES
	(1, 'baotq@bit-vietnam.com', 'ljla\r\nad\r\n', '9808098', '2015-06-09 17:35:34', 0),
	(2, 'jlj@klsj.com', 'jlsd\r\n\r\nsf', '0809089', '2015-06-09 17:40:34', 0);
/*!40000 ALTER TABLE `inqueries` ENABLE KEYS */;


-- Dumping structure for table fur.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(100) NOT NULL,
  `name_vi` varchar(100) NOT NULL,
  `short_description_en` text NOT NULL,
  `short_description_vi` text NOT NULL,
  `long_description_en` text NOT NULL,
  `long_description_vi` text NOT NULL,
  `category` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `image_1` varchar(50) NOT NULL,
  `image_2` varchar(50) NOT NULL,
  `image_3` varchar(50) NOT NULL,
  `image_4` varchar(50) NOT NULL,
  `image_5` varchar(50) NOT NULL,
  `rate` float NOT NULL DEFAULT '0',
  `rate_count` int(11) NOT NULL DEFAULT '0',
  `available` tinyint(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.products: ~5 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name_en`, `name_vi`, `short_description_en`, `short_description_vi`, `long_description_en`, `long_description_vi`, `category`, `creator`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `rate`, `rate_count`, `available`, `created`, `modified`, `deleted`) VALUES
	(1, 'Procat1sub11', 'Sản phẩm 1sub11', 'shor shor shor shor shor shor shor shor shor shor shor shor shor shor ', '', 'long long long long long long long long long long long long long long long long long ', '', 1, 0, '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', 3.3125, 9, 1, '2015-06-07 17:18:48', '0000-00-00 00:00:00', 0),
	(2, 'Procat1sub12', 'Sản phẩm 1sub12', '', '', '', '', 1, 0, '2.jpg', '1.jpg', '3.jpg', '4.jpg', '5.jpg', 0, 0, 1, '2015-06-07 17:17:53', '0000-00-00 00:00:00', 0),
	(3, 'Procat1sub21', 'Sản phẩm 1sub21', '', '', '', '', 2, 0, '3.jpg', '2.jpg', '1.jpg', '4.jpg', '5.jpg', 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(4, 'Procat2sub41', 'Sản phẩm 2sub41', '', '', '', '', 4, 0, '4.jpg', '2.jpg', '3.jpg', '1.jpg', '5.jpg', 0, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(5, 'Procat1sub21', 'Sản phẩm 1sub21', '', '', '', '', 2, 0, '3.jpg', '2.jpg', '1.jpg', '4.jpg', '5.jpg', 0, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table fur.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner` varchar(50) NOT NULL,
  `map_lat` varchar(20) DEFAULT NULL,
  `map_long` varchar(20) DEFAULT NULL,
  `site_name` varchar(100) DEFAULT '0',
  `address_1_en` varchar(100) DEFAULT NULL,
  `address_2_en` varchar(100) DEFAULT NULL,
  `address_1_vi` varchar(100) DEFAULT NULL,
  `address_2_vi` varchar(100) DEFAULT NULL,
  `tel_1` varchar(20) DEFAULT NULL,
  `tel_2` varchar(20) DEFAULT NULL,
  `fax_1` varchar(20) DEFAULT NULL,
  `fax_2` varchar(20) DEFAULT NULL,
  `contact_info_en` text,
  `contact_info_vi` text,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.settings: ~1 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `banner`, `map_lat`, `map_long`, `site_name`, `address_1_en`, `address_2_en`, `address_1_vi`, `address_2_vi`, `tel_1`, `tel_2`, `fax_1`, `fax_2`, `contact_info_en`, `contact_info_vi`, `email`) VALUES
	(1, '', '10.765678', '106.706346', '0', 'Address 1', 'Address 2', 'Địa chỉ 1', 'Địa chỉ 2', '1234567890', '9876543210', '1234567890', '9876543210', 'Contact info Contact info Contact info Contact info Contact info Contact info Contact info Contact info Contact info ', 'Thông tin liên hệ Thông tin liên hệ Thông tin liên hệ', 'email@ex.com');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


-- Dumping structure for table fur.subcategories
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(50) NOT NULL,
  `name_vi` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table fur.subcategories: ~5 rows (approximately)
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` (`id`, `name_en`, `name_vi`, `category`, `created`, `modified`, `deleted`) VALUES
	(1, 'Beds', 'Giường', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(2, 'Dressers', 'Bàn trang điểm', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(3, 'Bedroom Sets', 'Bộ phòng ngủ', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(4, 'TV Stands', 'Chân TV', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
	(5, 'Leather Furniture', 'Đồ da', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
