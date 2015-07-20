-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql311.byethost14.com
-- Generation Time: Jul 20, 2015 at 04:18 AM
-- Server version: 5.6.22-71.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b14_16323844_ryta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `role`, `active`, `created`, `modified`, `deleted`) VALUES
(1, 'admin', '1869e5577985ea2ef0a34e443a5b57276f9fb78a', NULL, NULL, NULL, 1, 1, '2015-06-09 18:55:21', '2015-06-11 19:19:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(50) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `del_flg`) VALUES
(1, 'golden_banner.png', 1),
(2, 'blue.jpg', 1),
(3, 'banner150610173133.PNG', 1),
(4, 'banner150610173703.jpg', 1),
(5, 'banner150610174118.gif', 1),
(6, 'banner150611202546.jpeg', 1),
(7, 'banner150613094211.jpg', 0),
(8, 'banner150613094219.jpg', 0),
(9, 'banner150613094226.jpg', 1),
(10, 'banner150613094232.jpg', 1),
(11, 'banner150613094241.jpg', 1),
(12, 'banner150613100533.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(50) NOT NULL,
  `name_vi` varchar(50) NOT NULL,
  `description_vi` mediumtext,
  `description_en` mediumtext,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_vi`, `description_vi`, `description_en`, `created`, `modified`, `deleted`) VALUES
(1, 'WOOD FLOORS', 'SÀN GỖ', 'Sàn gỗ', 'Wood floors', '0000-00-00 00:00:00', '2015-06-15 19:15:30', 0),
(2, 'WALLPAPER', 'DÁN TƯỜNG', 'DÁN TƯỜNG', 'WALLPAPER', '0000-00-00 00:00:00', '2015-06-15 19:16:33', 0),
(3, 'SOFA', 'SOFA', 'Mô tả tiếng việt', 'SOFA', '0000-00-00 00:00:00', '2015-06-15 19:17:28', 0),
(4, 'ACCESSORIES', 'PHỤ KIỆN', 'PHỤ KIỆN', 'ACCESSORIES', '2015-06-13 09:41:17', '2015-07-13 09:38:12', 0),
(6, 'LADY ACCESSORIES', 'TRANG SỨC NỮ', '', '', '2015-07-15 09:03:17', '2015-07-15 09:03:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `commentator`, `email`, `product`, `content`, `created`, `modified`, `deleted`) VALUES
(15, 'bao', 'troy@kjsl.com', 3, 'jaldkj lksjlfks\r\nsdf\r\nsf\r\nsd\r\nfsd\r\nf', '2015-06-05 18:31:34', '2015-06-11 20:06:21', 1),
(17, 'sfs', 'kljf@sdlkfj.kjlk', 3, 'lsdkfjlkd', '2015-06-05 18:32:58', '2015-06-11 20:10:19', 1),
(19, 'Thor', 'thor@heaven.com', 3, 'lkdsfl\r\ndsf\r\nsd''dfsf''df', '2015-06-05 18:41:47', '2015-06-11 20:00:35', 1),
(20, 'troy', 'lks@lhlk.com', 3, 'sdfs', '2015-06-05 18:44:44', '2015-06-11 20:00:06', 1),
(21, 'dfjl', 'lj@klj.com', 1, 'dsfsdf', '2015-06-08 14:04:21', '2015-06-11 19:58:59', 1),
(22, 'bao', 'tjlk@ljlk.com', 1, 'sdfsdfsdf', '2015-06-11 20:07:24', '2015-06-11 20:09:23', 1),
(23, 'Bao', 'baotq@bit-vietnam.com', 4, 'Dhdjdjd', '2015-06-11 20:19:21', '2015-06-11 20:19:21', 0),
(24, 'Binh', 'binhnt126@gmail.com', 8, 'asdasdasd', '2015-06-13 10:23:19', '2015-06-13 10:23:19', 0),
(25, 'asd', 'meomotmi46@yahoo.com', 6, 'asdasd', '2015-06-13 11:14:43', '2015-06-13 11:14:43', 0),
(26, 'asdasd', 't2l_099@yahoo.com.vn', 8, 'asdasd', '2015-06-13 11:15:11', '2015-06-13 11:15:11', 0),
(27, 'bình nguyễn', 't2l_099@yahoo.com.vn', 1, 'babyonemoretime', '2015-06-13 20:24:18', '2015-06-13 20:24:18', 0),
(28, 'Nguyễn Thanh Bình', 'meomotmi46@yahoo.com', 1, 'bababababa', '2015-06-13 20:24:58', '2015-06-13 20:24:58', 0),
(29, 'bình nguyễn', 'baotran_troy@yahoo.co.uk', 9, 'ljlklk', '2015-06-13 20:25:59', '2015-06-13 20:25:59', 0),
(30, 'bao', 'baotran_troy@yahoo.co.uk', 9, 'ljlklk', '2015-06-13 20:30:13', '2015-06-13 20:30:13', 0),
(31, 'Nguyễn Bình', 'binhnt@bit-vietnam.com', 7, 'babeby', '2015-06-13 20:54:01', '2015-06-13 20:54:01', 0),
(32, 'asdasd', 't2l_099@yahoo.com.vn', 7, 'sadfasdfasdf', '2015-06-13 20:54:23', '2015-06-13 20:54:23', 0),
(33, 'comm', 'baotq@bit-vietnam.com', 9, 'fadfadf', '2015-06-13 20:59:59', '2015-06-13 20:59:59', 0),
(34, 'zzz', 'baotran_troy@yahoo.co.uk', 9, 'adfasfafd', '2015-06-13 21:00:10', '2015-06-13 21:00:10', 0),
(35, 'bitu', 'meomotmi46@yahoo.com', 7, 'adasdasd', '2015-06-13 21:01:51', '2015-06-13 21:01:51', 0),
(36, 'abc', 'bitu_pl91@yahoo.com', 7, 'abkklkj', '2015-06-13 21:05:28', '2015-06-13 21:05:28', 0),
(37, 'babycon', 't2l_099@yahoo.com.vn', 1, 'baby be', '2015-06-13 21:06:37', '2015-06-13 21:06:37', 0),
(38, 'com', 'baotran_troy@yahoo.co.uk', 9, 'adfasdf', '2015-06-13 21:29:36', '2015-06-13 21:29:36', 0),
(39, 'new', 'baotq@bit-vietnam.com', 9, 'sdadf', '2015-06-13 21:30:33', '2015-06-13 21:30:33', 0),
(40, 'core', 'baotran_troy@yahoo.co.uk', 9, 'afsdfad', '2015-06-14 08:31:47', '2015-06-14 08:31:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inqueries`
--

CREATE TABLE IF NOT EXISTS `inqueries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `content` varchar(200) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `read` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `inqueries`
--

INSERT INTO `inqueries` (`id`, `name`, `email`, `content`, `tel`, `read`, `created`, `del_flg`) VALUES
(1, '0', 'baotq@bit-vietnam.com', 'ljla\r\nad\r\n', '9808098', 0, '2015-06-09 17:35:34', 1),
(2, '0', 'jlj@klsj.com', 'jlsd\r\n\r\nsf', '0809089', 127, '2015-04-09 17:40:34', 0),
(3, '0', 'baotq@bit-vietnam.com', 'sdfs\r\nsdfsd', '80808', 0, '2015-06-10 20:16:38', 1),
(4, 'bao', 'baotq@bit-vietnam.com', 'sjdflsdf', '08089', 127, '2015-06-10 20:19:10', 1),
(5, 'jl', 'jlj@klsj.com', 'lksfs\r\nsdfsf\r\nsdfsf\r\nsfsdf', '324234234', 127, '2015-06-10 20:22:32', 0),
(6, 'Bình', 'binhnt126@gmail.com', 'testing', '+84975645845', 127, '2015-06-13 10:10:28', 0),
(7, 'bao tesst', 'baotran_troy@yahoo.co.uk', 'dlajfdfadfa\r\ndf\r\naddf\r\nádf', '01292939393', 0, '2015-06-13 10:14:57', 0),
(8, 'sdasd', 'abc@gmail.com', 'asdasd', '35345', 127, '2015-06-13 10:26:03', 0),
(9, 'dasd', 'anhmuonnoiloiyeuem_2704@yahoo.', 'asdasd', '243234', 0, '2015-06-13 11:34:44', 0),
(10, 'bao', 'baotran_troy@yahoo.co.uk', 'gjhghjgjh', '09890808080', 127, '2015-06-13 20:12:07', 0),
(11, 'asdasd', 'meomotmi46@yahoo.com', 'asdasdfadsgag', '23423', 127, '2015-06-13 21:08:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(100) NOT NULL,
  `name_vi` varchar(100) NOT NULL,
  `short_description_en` text NOT NULL,
  `short_description_vi` text NOT NULL,
  `long_description_en` text NOT NULL,
  `long_description_vi` text NOT NULL,
  `category` int(11) NOT NULL,
  `creator` int(11) NOT NULL DEFAULT '1',
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_vi`, `short_description_en`, `short_description_vi`, `long_description_en`, `long_description_vi`, `category`, `creator`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `rate`, `rate_count`, `available`, `created`, `modified`, `deleted`) VALUES
(39, 'Product 27', 'Sản phẩm 27', '', '', '', '', 6, 1, 'p015150715091047.jpg', '', '', '', '', 0, 0, 1, '2015-07-15 09:10:47', '2015-07-15 09:10:47', 0),
(40, 'Product 28', 'Sản phẩm 28', '', '', '', '', 6, 1, 'p015150715091103.jpg', '', '', '', '', 0, 0, 1, '2015-07-15 09:11:03', '2015-07-15 09:11:03', 0),
(41, 'Product 29', 'Sản phẩm 29', '', '', '', '', 6, 1, 'p015150715091118.jpg', '', '', '', '', 0, 0, 1, '2015-07-15 09:11:18', '2015-07-15 09:11:18', 0),
(12, 'Product 2', 'Sản phẩm 2', '', '', '', '', 4, 1, 'p015150713093913.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:39:13', '2015-07-13 09:39:13', 0),
(13, 'Product 3', 'Sản phẩm 3', '', '', '', '', 3, 1, 'p015150713093936.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:39:36', '2015-07-13 09:39:36', 0),
(14, 'Product 4', 'Sản phẩm 4', '', '', '', '', 4, 1, 'p015150713094042.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:40:42', '2015-07-13 09:40:42', 0),
(15, 'Product 5', 'Sản phẩm 5', '', '', '', '', 4, 1, 'p015150713094114.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:41:14', '2015-07-13 09:41:14', 0),
(16, 'Product 6', 'Sản phẩm 6', '', '', '', '', 3, 1, 'p015150713094156.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:41:56', '2015-07-13 09:41:56', 0),
(17, 'Product 7', 'Sản phẩm 7', '', '', '', '', 4, 1, 'p015150713094219.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:42:19', '2015-07-13 09:42:19', 0),
(18, 'Product 8', 'Sản phẩm 8', '', '', '', '', 3, 1, 'p015150713094239.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:42:39', '2015-07-13 09:42:39', 0),
(19, 'Product 9', 'Sản phẩm 9', '', '', '', '', 4, 1, 'p015150713094306.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:43:06', '2015-07-13 09:43:06', 0),
(20, 'Product 10', 'Sản phẩm 10', '', '', '', '', 4, 1, 'p015150713094329.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:43:29', '2015-07-13 09:43:29', 0),
(21, 'Product 11', 'Sản phẩm 11', '', '', '', '', 4, 1, 'p015150713094351.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:43:51', '2015-07-13 09:43:51', 0),
(22, 'Product 12', 'Sản phẩm 12', '', '', '', '', 4, 1, 'p015150713094500.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:45:00', '2015-07-13 09:45:00', 0),
(23, 'Product 13', 'Sản phẩm 13', '', '', '', '', 4, 1, 'p015150713094529.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:45:29', '2015-07-13 09:45:29', 0),
(24, 'Product 14', 'Sản phẩm 14', '', '', '', '', 4, 1, 'p015150713094547.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:45:47', '2015-07-13 09:45:47', 0),
(25, 'Product 14', 'Sản phẩm 14', '', '', '', '', 4, 1, 'p015150713094549.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:45:49', '2015-07-13 09:48:39', 1),
(26, 'Product 15', 'Sản phẩm 15', '', '', '', '', 4, 1, 'p015150713094607.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:46:07', '2015-07-13 09:46:07', 0),
(27, 'Product 16', 'Sản phẩm 16', '', '', '', '', 4, 1, 'p015150713095024.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:46:24', '2015-07-13 09:50:24', 0),
(28, 'Product 17', 'Sản phẩm 17', '', '', '', '', 4, 1, 'p015150713095040.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:50:40', '2015-07-13 09:50:40', 0),
(29, 'Product 18', 'Sản phẩm 18', '', '', '', '', 4, 1, 'p015150713095112.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:51:12', '2015-07-13 09:51:12', 0),
(30, 'Product 19', 'Sản phẩm 19', '', '', '', '', 4, 1, 'p015150713095129.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:51:29', '2015-07-13 09:51:29', 0),
(31, 'Product 20', 'Sản phẩm 20', '', '', '', '', 4, 1, 'p015150713095158.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:51:58', '2015-07-13 09:51:58', 0),
(32, 'Product 21', 'Sản phẩm 21', '', '', '', '', 4, 1, 'p015150713095221.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:52:21', '2015-07-13 09:52:21', 0),
(33, 'Product 22', 'Sản phẩm 22', '', '', '', '', 4, 1, 'p015150713095236.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:52:36', '2015-07-13 09:52:36', 0),
(34, 'Product 22', 'Sản phẩm 22', '', '', '', '', 6, 1, 'p015150715090442.jpg', '', '', '', '', 0, 0, 1, '2015-07-15 09:04:42', '2015-07-15 09:04:42', 0),
(35, 'Product 23', 'Sản phẩm 23', '', '', '', '', 6, 1, 'p015150715090505.jpg', '', '', '', '', 0, 0, 1, '2015-07-15 09:05:05', '2015-07-15 09:05:05', 0),
(36, 'Product 24', 'Sản phẩm 24', '', '', '', '', 6, 1, 'p015150715090521.jpg', '', '', '', '', 0, 0, 1, '2015-07-15 09:05:21', '2015-07-15 09:05:21', 0),
(37, 'Product 25', 'Sản phẩm 25', '', '', '', '', 6, 1, 'p015150715090957.jpg', '', '', '', '', 0, 0, 1, '2015-07-15 09:09:57', '2015-07-15 09:10:18', 0),
(38, 'Product 26', 'Sản phẩm 26', '', '', '', '', 6, 1, 'p015150715091031.jpg', '', '', '', '', 0, 0, 1, '2015-07-15 09:10:31', '2015-07-15 09:12:43', 1),
(11, 'Product 1', 'Sản phẩm 1', '', '', '', '', 4, 1, 'p015150713093755.jpg', '', '', '', '', 0, 0, 1, '2015-07-13 09:37:55', '2015-07-13 09:37:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(255) DEFAULT NULL,
  `name_vi` varchar(255) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `description_en` text,
  `description_vi` text,
  `content_en` longtext,
  `content_vi` longtext,
  `created` datetime DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name_en`, `name_vi`, `image`, `description_en`, `description_vi`, `content_en`, `content_vi`, `created`, `deleted`) VALUES
(2, 'Advisory', 'Tư vấn', 'upl150615194105.jpg', 'Advisory description', 'Mô tả tư vấn', '', '', '2015-06-15 13:08:36', 0),
(3, 'Constructing', 'Thi công', 'upl150615194052.jpg', 'Constructing description', 'Mô tả thi công', '<p><u>adfadf</u></p>\r\n', '<p>adfadf&nbsp;<img alt="" src="http://localhost/fur/annhau/images/uploads/upl150613103745.jpg" style="height:192px; width:500px" /></p>\r\n', '2015-06-15 13:09:04', 0),
(4, 'Design', 'Thiết kế', 'upl150615194036.jpg', 'Design description', 'Mô tả thiết kế', '<p>The Wikimedia Foundation has decided the time is right to implement HTTPS on all its projects, for all users, all the time.</p>\r\n\r\n<p>It&#39;s been possible to access the Foundation&#39;s works &ndash; notably Wikipedia &ndash; with HTTPs for a while if you&#39;re willing to jump through some hoops. The Foundation&#39;s now decided to go all-HTTPs, all the time, was made because the Foundation&nbsp;<a href="https://blog.wikimedia.org/2015/06/12/securing-wikimedia-sites-with-https/" style="text-decoration: none; color: rgb(221, 0, 0);" target="_blank">says</a>&nbsp;&ldquo;Over the last few years, increasing concerns about government surveillance prompted members of the Wikimedia community to push for more broad protection through HTTPS.&rdquo;</p>\r\n\r\n<p>&ldquo;We believe encryption makes the web stronger for everyone,&rdquo; the Foundation&#39;s post says. &ldquo;In a world where mass surveillance has become a serious threat to intellectual freedom, secure connections are essential for protecting users around the world. Without encryption, governments can more easily surveil sensitive information, creating a chilling effect, and deterring participation, or in extreme cases they can isolate or discipline citizens. Accounts may also be hijacked, pages may be censored, other security flaws could expose sensitive user information and communications. Because of these circumstances, we believe that the time for HTTPS for all Wikimedia traffic is now.&rdquo;</p>\r\n\r\n<p>&ldquo;We encourage others to join us as we move forward with this commitment.&rdquo;</p>\r\n\r\n<p>The post announcing the change says that the Foundation needs to do rather more than flick a switch to make the move.</p>\r\n\r\n<p>&ldquo;Our first steps involved improving our infrastructure and code base so we could support HTTPS. We also significantly expanded and updated our server hardware,&rdquo; the Foundation writes. &ldquo;Since we don&rsquo;t employ third party content delivery systems, we had to manage this process for our entire infrastructure stack in-house.&rdquo;</p>\r\n\r\n<p>There&#39;s also been work to ensure that the small overhead encryption imposes doesn&#39;t make using Wikipedia even less fun.</p>\r\n\r\n<p>The Foundation says it&#39;s been working on this for a while, but has now reached the final push and expects that HTTPs will be on by default in about three weeks. &reg;</p>\r\n', '<p>1. &quot;T&ocirc;i tin rằng 50% quyết định một doanh nh&acirc;n th&agrave;nh c&ocirc;ng hay thất bại chỉ đơn thuần l&agrave; ở t&iacute;nh ki&ecirc;n tr&igrave;&quot;</p>\r\n\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" class="tplCaption" style="font-family:arial; font-size:14px; line-height:normal; margin:0px auto 10px; max-width:100%; padding:0px; width:470px">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt="stevejobs-02-4083-1434218772.jpg" src="http://c1.f25.img.vnecdn.net/2015/06/14/stevejobs-02-4083-1434218772.jpg" style="border:0px; font-size:0px; line-height:0; margin:0px; max-width:100%; padding:0px; width:470px" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>L&atilde;nh đạo huyền thoại của Apple - Steve Jobs. Ảnh:&nbsp;<em>Ctest</em></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Jeff Haden - bi&ecirc;n tập vi&ecirc;n tạp ch&iacute; Inc l&yacute; giải mọi người đều n&oacute;i họ muốn l&agrave;m nhiều việc hơn. Nhưng tr&ecirc;n thực tế, kh&ocirc;ng c&oacute;&nbsp;ai thực hiện được điều đ&oacute;. Hầu hết mọi người nghĩ rằng chẳng ai l&agrave;m như vậy, n&ecirc;n họ cũng chẳng tội g&igrave; phải l&agrave;m. V&agrave; họ từ bỏ. Đ&oacute; l&agrave; l&yacute; do v&igrave; sao những người th&agrave;nh c&ocirc;ng thường rất hiếm hoi. V&agrave; ch&iacute;nh những việc bạn l&agrave;m nhiều hơn người kh&aacute;c sẽ cho bạn cơ hội.</p>\r\n\r\n<p>Đi sớm. Về muộn. L&agrave;m nhiều việc hơn. Gọi th&ecirc;m điện thoại. Gửi th&ecirc;m email. Nghi&ecirc;n cứu nhiều hơn. Hỗ trợ kh&aacute;ch h&agrave;ng tận t&igrave;nh hơn nữa.</p>\r\n\r\n<p>Đừng đợi đến khi được y&ecirc;u cầu, h&atilde;y tự gi&aacute;c. Đừng chỉ ra lệnh cho nh&acirc;n vi&ecirc;n, h&atilde;y chỉ dẫn v&agrave; l&agrave;m việc c&ugrave;ng họ.</p>\r\n\r\n<p>Khi l&agrave;m việc g&igrave; đ&oacute;, h&atilde;y l&agrave;m nhiều hơn nếu c&oacute; thể, đặc biệt nếu kh&ocirc;ng ai kh&aacute;c chịu l&agrave;m.&nbsp;Điều đ&oacute; sẽ kh&ocirc;ng dễ d&agrave;ng g&igrave;. Nhưng ch&iacute;nh n&oacute; tạo n&ecirc;n sự kh&aacute;c biệt cho bạn. V&agrave; theo thời gian, điều đ&oacute; sẽ khiến bạn trở n&ecirc;n cực kỳ th&agrave;nh c&ocirc;ng.</p>\r\n\r\n<p>2. &quot;Những thứ t&ocirc;i tr&acirc;n trọng kh&ocirc;ng tốn một xu n&agrave;o cả. R&otilde; r&agrave;ng t&agrave;i nguy&ecirc;n qu&yacute; gi&aacute; nhất m&agrave; ch&uacute;ng ta c&oacute; l&agrave; thời gian&quot;</p>\r\n\r\n<p>Thời hạn về bản chất chỉ l&agrave; những th&ocirc;ng số, nhưng thường mang nghĩa ti&ecirc;u cực. Nếu c&oacute; 2 tuần để ho&agrave;n th&agrave;nh nhiệm vụ, hầu hết mọi người sẽ ph&acirc;n bổ nguồn lực của m&igrave;nh để thực hiện việc đ&oacute; trong vừa đ&uacute;ng 2 tuần, d&ugrave; họ c&oacute; thể l&agrave;m xong sớm hơn.</p>\r\n\r\n<p>V&igrave; thế h&atilde;y qu&ecirc;n hết c&aacute;c loại hạn ch&oacute;t đi. L&agrave;m mọi thứ nhanh v&agrave; hiệu quả nhất c&oacute; thể. Sau đ&oacute;, h&atilde;y sử dụng thời gian rảnh để ho&agrave;n th&agrave;nh những c&ocirc;ng việc kh&aacute;c theo c&aacute;ch tương tự.</p>\r\n\r\n<p>Người b&igrave;nh thường để thời gian chi phối m&igrave;nh. C&ograve;n người giỏi để &yacute; ch&iacute; của m&igrave;nh l&agrave;m chủ thời gian.</p>\r\n', '2015-06-15 13:09:10', 0),
(5, 'asdfasdf', 'asdfasdf', NULL, 'adsfadsf', 'sdf', '<p>adfadf</p>\r\n', '', '2015-06-15 14:24:17', 1),
(6, 'asdfasdf', 'asdfasdf', NULL, 'adsfadsf', 'sdf', '<p>adfadf</p>\r\n', '', '2015-06-15 14:26:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `email_1` varchar(30) DEFAULT NULL,
  `email_2` varchar(30) DEFAULT NULL,
  `about_en` longtext,
  `about_vi` longtext,
  `description_vi` text,
  `description_en` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `map_lat`, `map_long`, `site_name`, `address_1_en`, `address_2_en`, `address_1_vi`, `address_2_vi`, `tel_1`, `tel_2`, `fax_1`, `fax_2`, `contact_info_en`, `contact_info_vi`, `email_1`, `email_2`, `about_en`, `about_vi`, `description_vi`, `description_en`) VALUES
(1, '30.032948', '-89.861797', '0', 'District 4', 'HCMC, VN', '422 Đào Trí, phường Phú Thuận, quận 7', '422 Đào Trí, phường Phú Thuận, quận 8', '(08) 86673 1313', '9876543210', '121231', '', 'contact\r\ncontact adf adf adf\r\nsdfsdf\r\n', 'description dsf adf a', 'admin@ryta.com', 'admin@ryta.vn', '<div class="content__header tonal__header u-cf">\r\n<div class="gs-container" style="position: relative; margin: 0px auto; max-width: 81.25rem; box-sizing: border-box; padding: 0px 1.25rem;">\r\n<div class="content__main-column" style="max-width: 38.75rem; margin: auto 20rem auto 15rem; position: relative;">\r\n<h1><span style="color:#FF0000">Wikipedia: account at centre of row &#39;not linked&#39; to Grant Shapps</span></h1>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="tonal__standfirst u-cf">\r\n<div class="gs-container" style="position: relative; margin: 0px auto; max-width: 81.25rem; box-sizing: border-box; padding: 0px 1.25rem;">\r\n<div class="content__main-column" style="max-width: 38.75rem; margin: auto 20rem auto 15rem; position: relative;">\r\n<div class="content__standfirst" style="font-size: 1.125rem; line-height: 1.375rem; font-family: ''Guardian Egyptian Web'', ''Guardian Text Egyptian Web'', Georgia, serif; margin-bottom: 0.375rem; color: rgb(118, 118, 118);">\r\n<p>Online encyclopedia&rsquo;s arbitration committee says site administrator had &lsquo;no significant evidence&rsquo; to link account under name Contribsx to Tory MP</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="content__main tonal__main tonal__main--tone-news" style="font-family: ''Guardian Text Egyptian Web'', Georgia, serif; font-size: medium; line-height: 24px;">\r\n<div class="gs-container" style="position: relative; margin: 0px auto; max-width: 81.25rem; box-sizing: border-box; padding: 0px 1.25rem;">\r\n<div class="content__main-column content__main-column--article js-content-main-column " style="min-height: 17.25rem; max-width: 38.75rem; margin: auto 20rem auto 15rem; position: relative;">\r\n<div class="js-football-tabs football-tabs content__mobile-full-width" style="margin-left: 0px; margin-right: 0px;">&nbsp;</div>\r\n\r\n<div><img alt="" src="http://ryta.byethost8.com/images/uploads/upl150613103745.jpg" style="height:192px; width:500px" /></div>\r\n\r\n<div><img alt="" src="http://ryta.byethost8.com/images/uploads/upl150613103745.jpg" style="height:115px; width:500px" /></div>\r\n\r\n<p>&nbsp;The Guardian pointed out that Grant Shapps&rsquo;s Wikipedia page appeared to have had critical comments removed. Photograph: Leon Neal/AFP/Getty Images</p>\r\n\r\n<div class="content__meta-container js-content-meta js-football-meta u-cf\r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    " style="min-height: 2.25rem; position: absolute; margin-bottom: 1rem; border-top-width: 0px; border-bottom-width: 0px; top: 0px; margin-left: -15rem; width: 13.75rem;">\r\n<p><a class="tone-colour" href="http://www.theguardian.com/profile/randeepramesh" rel="author" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; background: transparent;">Randeep Ramesh</a></p>\r\n\r\n<p>Tuesday 9 June 2015&nbsp;20.06&nbsp;BSTLast modified on Wednesday 10 June 201500.19&nbsp;BST</p>\r\n\r\n<div class="meta__extras" style="position: relative; clear: both;">\r\n<div class="meta__social" style="border-top-width: 0.0625rem; border-top-style: dotted; border-top-color: rgb(223, 223, 223); padding: 0px; box-sizing: border-box;">\r\n<ul>\r\n	<li><a class="social__action social-icon-wrapper" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fgu.com%2Fp%2F49jne%2Fsfb&amp;ref=responsive" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; display: inline-block; background: transparent;" target="_blank" title="Facebook">Share on Facebook</a></li>\r\n	<li><a class="social__action social-icon-wrapper" href="https://twitter.com/intent/tweet?text=Wikipedia%3A+account+at+centre+of+row+%27not+linked%27+to+Grant+Shapps&amp;url=http%3A%2F%2Fgu.com%2Fp%2F49jne%2Fstw" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; display: inline-block; background: transparent;" target="_blank" title="Twitter">Share on Twitter</a></li>\r\n	<li><a class="social__action social-icon-wrapper" href="mailto:?subject=Wikipedia%3A%20account%20at%20centre%20of%20row%20%27not%20linked%27%20to%20Grant%20Shapps&amp;body=http%3A%2F%2Fgu.com%2Fp%2F49jne%2Fsbl" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; display: inline-block; background: transparent;" target="_blank" title="Email">Share via Email</a></li>\r\n	<li><a class="social__action social-icon-wrapper" href="http://www.linkedin.com/shareArticle?mini=true&amp;title=Wikipedia%3A+account+at+centre+of+row+%27not+linked%27+to+Grant+Shapps&amp;url=http%3A%2F%2Fgu.com%2Fp%2F49jne" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; display: inline-block; background: transparent;" target="_blank" title="LinkedIn">Share on LinkedIn</a></li>\r\n	<li><a class="social__action social-icon-wrapper" href="https://plus.google.com/share?url=http%3A%2F%2Fgu.com%2Fp%2F49jne%2Fsgp&amp;amp;hl=en-GB&amp;amp;wwc=1" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none; display: inline-block; background: transparent;" target="_blank" title="Google plus">Share on Google+</a></li>\r\n</ul>\r\n</div>\r\n\r\n<div class="meta__numbers modern-visible" style="border-top-width: 0.0625rem; border-top-style: dotted; border-top-color: rgb(223, 223, 223); height: 2.25rem; padding: 0.375rem 0px; border-bottom-width: 0.0625rem; border-bottom-style: dotted; border-bottom-color: rgb(223, 223, 223);">\r\n<div class="meta__number js-sharecount" style="height: 36px; float: left; padding-right: 0.6875rem;" title="Facebook: 18 \r\nTwitter: 33">\r\n<h3>Shares</h3>\r\n\r\n<div class="sharecount__value sharecount__value--full" style="font-family: ''Guardian Egyptian Web'', ''Guardian Text Egyptian Web'', Georgia, serif; font-size: 1.125rem;">51</div>\r\n</div>\r\n\r\n<div class="u-h meta__number" style="border-left-width: 0.0625rem; border-left-style: solid; border-left-color: rgb(241, 241, 241); height: 1px; padding-right: 0px; padding-left: 0.625rem; float: left; border-top-width: 0px !important; border-right-width: 0px !important; border-bottom-width: 0px !important; clip: rect(0px 0px 0px 0px) !important; margin: -0.0625rem !important; overflow: hidden !important; padding-top: 0px !important; padding-bottom: 0px !important; position: absolute !important; width: 0.0625rem !important;">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="content__article-body from-content-api js-article__body" style="word-wrap: break-word; position: relative;">\r\n<p>A Wikipedia account that was suspended on suspicions that it was being used by the former Conservative party co-chairman&nbsp;<a class="u-underline" href="http://www.theguardian.com/politics/grant-shapps" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none !important; border-bottom-width: 0.0625rem; border-bottom-style: solid; border-bottom-color: rgb(220, 220, 220); transition: border-color 0.15s ease-out; -webkit-transition: border-color 0.15s ease-out; background: transparent;">Grant Shapps</a>&nbsp;or &ldquo;someone acting on his behalf&rdquo; was unblocked following a vote by members of the site&rsquo;s &ldquo;high court&rdquo;.</p>\r\n\r\n<p>The online encyclopedia&rsquo;s arbitration committee, comprised of volunteers elected to consider controversial decisions, chose to remove the status of site administrator from Richard Symonds, who had blocked an account belonging to a user known as Contribsx because he thought there was evidence linking it to Shapps.</p>\r\n\r\n<p>In a ruling, the committee said Symonds had an &ldquo;apparent&rdquo; conflict of interest because he was a former Lib Dem supporter, that he had not been able to produce three years of records detailing previous investigations and had supplied information to the Guardian which &ldquo;gave the appearance of exert[ing] political or social control&rdquo;.</p>\r\n\r\n<p>A few hours after the vote, another&nbsp;<a class="u-underline" href="http://www.theguardian.com/technology/wikipedia" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none !important; border-bottom-width: 0.0625rem; border-bottom-style: solid; border-bottom-color: rgb(220, 220, 220); transition: border-color 0.15s ease-out; -webkit-transition: border-color 0.15s ease-out; background: transparent;">Wikipedia</a>&nbsp;administrator moved to reverse Symonds&rsquo;s decision to block the user Contribsx.</p>\r\n\r\n<p>Wikipedia&rsquo;s arbitration committee decided that there was no &ldquo;definitive&rdquo; evidence that linked the user to Shapps and criticised Symonds for not running his decision past colleagues, who are all volunteers, before blocking the account.</p>\r\n\r\n<p>At the time of&nbsp;<a class="u-underline" href="http://www.theguardian.com/politics/2015/apr/21/grant-shapps-accused-of-editing-wikipedia-pages-of-tory-rivals" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none !important; border-bottom-width: 0.0625rem; border-bottom-style: solid; border-bottom-color: rgb(220, 220, 220); transition: border-color 0.15s ease-out; -webkit-transition: border-color 0.15s ease-out; background: transparent;">making of the decision</a>&nbsp;in April, Symonds said that &ldquo;<a class="u-underline" href="http://www.theguardian.com/technology/2015/apr/23/interview-richard-symonds-wikipedia-administrator-blocked-account-linked-to-shapps" style="color: rgb(0, 86, 137); cursor: pointer; text-decoration: none !important; border-bottom-width: 0.0625rem; border-bottom-style: solid; border-bottom-color: rgb(220, 220, 220); transition: border-color 0.15s ease-out; -webkit-transition: border-color 0.15s ease-out; background: transparent;">there&rsquo;s no smoking gun</a>, just a wealth of other evidence that really points in [Shapps&rsquo;s] general direction&rdquo;. Shapps had strenuously denied the allegations, saying they were &ldquo;false and defamatory&rdquo;.</p>\r\n\r\n<p>Symonds&rsquo;s decision to investigate Contribsx was sparked by the Guardian, which had approached Wikipedia to point out that Shapps&rsquo;s page on the site appeared to have had critical comments removed. Other users had also asked whether this was not the result of &ldquo;sock puppetry&rdquo; &ndash; editing under a fake online identity &ndash; by the party co-chairman.</p>\r\n\r\n<p>The Guardian had first approached the website&rsquo;s administrators on 2 April and Symonds said he had &ldquo;decided to look into the edits independently of the newspaper ... I asked them for any evidence they h</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>1. MOS l&agrave; g&igrave;????</strong></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>MOS: Microsoft Office&nbsp; Specialist</strong>&nbsp;&nbsp;l&agrave; b&agrave;i thi đ&aacute;nh gi&aacute; kỹ năng tin học văn ph&ograve;ng được sử dụng rộng r&atilde;i nhất tr&ecirc;n thế giới với hơn 1 triệu b&agrave;i thi được tổ chức h&agrave;ng năm.</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">B&agrave;i thi MOS được s&aacute;ng tạo bởi Microsoft&nbsp; v&agrave; triển khai bởi Certiport (Hoa Kỳ). B&agrave;i thi được thực hiện hiện trực tuyến, với hơn 25 ng&ocirc;n ngữ được x&acirc;y dựng v&agrave; được được Việt h&oacute;a b&agrave;i thi, gi&aacute;o tr&igrave;nh đ&atilde; được IIG Việt Nam bi&ecirc;n soạn dựa tr&ecirc;n thực tế tại Việt Nam.</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">MOS l&agrave; chứng chỉ duy nhất x&aacute;c nhận kỹ năng sử dụng phần mềm tin học văn ph&ograve;ng Microsoft Office v&agrave; do Microsoft trực tiếp cấp chứng chỉ.</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">C&aacute;c cấp độ của chứng chỉ MOS</span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">&nbsp;Specialist: Chứng nhận kỹ năng cơ bản trong c&aacute;c sản phẩm Microsoft Office: Word, Excel, PowerPoint, Access, Outlook.</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">&nbsp;Expert: Chứng nhận kỹ năng cao cấp trong Microsoft Word v&agrave; Microsoft Excel.</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">&nbsp;Master: &nbsp;Chứng nhận kỹ năng tổng thể to&agrave;n diện cao cấp nhất trong sử dụng Microsoft Office. Y&ecirc;u cầu 4 b&agrave;i thi: Word Expert, Excel Expert, PowerPoint v&agrave; một trong 2 b&agrave;i thi: Outlook hoặc Access.</span></span></li>\r\n</ul>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">&nbsp;<br />\r\n<strong>2. Thời gian l&agrave;m b&agrave;i thi</strong><br />\r\nMỗi b&agrave;i thi 50 ph&uacute;t</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>3. Nội dung c&aacute;c b&agrave;i thi</strong></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">Chứng chỉ MOS do Microsoft ch&iacute;nh thức cấp cho c&aacute;c chương tr&igrave;nh tr&igrave;nh ứng dụng tin học văn ph&ograve;ng bao gồm</span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">C&aacute;c b&agrave;i thi MOS 2007: Word&reg; 2007, Excel&reg; 2007, PowerPoint&reg; 2007, Outlook&reg; 2007, Access&reg; 2007, Word 2007 Expert, Excel&reg; 2007 Expert</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">C&aacute;c b&agrave;i thi MOS 2010: Word&reg;2010, 2010, PowerPoint&reg; 2010, Access&reg; 2010, Outlook&reg; 2010, SharePoint&reg; 2010, Word 2010 Expert, Excel&reg; 2010 Expert</span></span></li>\r\n</ul>\r\n\r\n<p style="text-align:center"><span style="font-size:small"><span style="font-family:arial">&nbsp;<img alt="" src="http://www.shmula.com/wp-content/uploads/2011/12/warehouse-management-supply-chain.jpg" style="height:305px; width:474px" /></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>4. Lợi &iacute;ch của b&agrave;i thi MOS</strong></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">Được c&ocirc;ng nhận rộng r&atilde;i tr&ecirc;n thế giới, chứng chỉ MOS gi&uacute;p bạn chứng tỏ được năng lực một c&aacute;ch dễ d&agrave;ng. Cho d&ugrave; bạn đang t&igrave;m kiếm một c&ocirc;ng việc, một cơ hội thăng tiến trong sự nghiệp hay theo đuổi một mục ti&ecirc;u học tập, MOS l&agrave; c&ocirc;ng cụ hữu hiệu để bạn khẳng định bản th&acirc;n v&agrave; tiến xa hơn trong m&ocirc;i trường học tập v&agrave; l&agrave;m việc cạnh tranh.&nbsp;</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>*Đối với người t&igrave;m việc</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">MOS gi&uacute;p bạn nổi bật để gi&agrave;nh được c&ocirc;ng việc m&agrave; bạn mong muốn. Một nghi&ecirc;n cứu cho thấy c&aacute;c ứng vi&ecirc;n c&oacute; chứng chỉ MOS kh&ocirc;ng những t&igrave;m được c&ocirc;ng việc nhanh hơn m&agrave; thu nhập của họ cũng cao hơn khoảng 12% so với những người kh&ocirc;ng c&oacute; chứng chỉ n&agrave;y</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">MOS l&agrave; chứng nhận r&otilde; r&agrave;ng nhất cho việc bạn đ&atilde; được đ&agrave;o tạo th&agrave;nh thạo về chương tr&igrave;nh tin học văn ph&ograve;ng của Microsoft.</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Đối với những người đang t&igrave;m kiếm cơ hội thăng tiến</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Tăng mức lương k&igrave; vọng. Nghi&ecirc;n cứu cho thấy 82% số người sở hữu MOS đạt được mức lương cao hơn so với trước khi c&oacute; chứng chỉ n&agrave;y.</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Khẳng định vị thế ti&ecirc;n phong trong c&ocirc;ng ty như một chuy&ecirc;n gia tin học văn ph&ograve;ng.</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Mang lại nhiều cơ hội nghề nghiệp. 88% c&aacute;c nh&agrave; quản l&yacute; cho rằng những nh&acirc;n vi&ecirc;n sở hữu chứng chỉ MOS sẽ c&oacute; lợi thế hơn trong việc tuyển dụng v&agrave; đề bạt, điều n&agrave;y cũng đồng nghĩa với sự gia tăng của mức lương v&agrave; sự t&ocirc;n trọng từ ph&iacute;a c&aacute;c đồng nghiệp kh&aacute;c.</span></span></li>\r\n</ul>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>*Đối với sinh vi&ecirc;n</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">MOS l&agrave; chứng chỉ đ&aacute;nh gi&aacute; kỹ năng nghệ nghiệp được c&ocirc;ng nhận tr&ecirc;n to&agrave;n cầu</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Chứng minh được năng lực sử dụng m&aacute;y t&iacute;nh đặc biệt trong mội trường l&agrave;m việc</span></span></li>\r\n</ul>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>5. Thời hạn</strong>&nbsp;</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial">Chứng chỉ MOS c&oacute; gi&aacute; trị v&ocirc; thời hạn ( gi&aacute; trị trọn đời)</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>6. Chứng chỉ</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Th&iacute; sinh ho&agrave;n th&agrave;nh b&agrave;i thi n&agrave;o sẽ c&oacute; chứng chỉ của b&agrave;i thi đ&oacute; (Specialist)</span></span></li>\r\n</ul>\r\n\r\n<p><span style="font-size:small"><span style="font-family:arial"><img alt="" src="http://www.iigvietnam.com/userfiles/image/cac%20san%20pham/Noi%20dung.png" style="border:0px none; display:block; height:166px; margin:0px auto; padding:0px; width:440px" /></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">&nbsp;Ngay sau khi ho&agrave;n th&agrave;nh b&agrave;i thi, th&iacute; sinh sẽ biết điểm v&agrave; c&oacute; thể tải về chứng chỉ online tr&ecirc;n website:</span></span><span style="color:rgb(0, 0, 255)"><a href="http://www.certiport.com/" style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); text-decoration: none;"><span style="color:rgb(0, 0, 255); font-size:small"><span style="font-family:arial">www.certiport.com</span></span></a></span><span style="font-size:small"><span style="font-family:arial">&nbsp;c&oacute; m&atilde; x&aacute;c nhận.</span></span></li>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Mẫu chứng chỉ tham khảo</span></span></li>\r\n</ul>\r\n\r\n<p><span style="font-size:small"><span style="font-family:arial"><img src="http://www.iigvietnam.com/images/anh/MOS%20Certi.jpg" style="border:0px none; display:block; margin:0px auto; padding:0px; width:550px" /></span></span></p>\r\n\r\n<p><span style="font-size:small"><span style="font-family:arial"><strong>7. Lịch thi MOS tại c&aacute;c Văn ph&ograve;ng IIG Việt Nam:</strong></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small">- Tại H&agrave; Nội: 14h chiều thứ 5 h&agrave;ng tuần</span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small">- Tại Đ&agrave; Nẵng: 14h chiều thứ 5 h&agrave;ng tuần</span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small">- Tại TP. Hồ Ch&iacute; Minh:&nbsp;14h chiều thứ 5 h&agrave;ng tuần</span></p>\r\n\r\n<p style="text-align:justify"><span style="font-size:small"><span style="font-family:arial"><strong>8. Hướng dẫn dự thi MOS</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style="font-size:small"><span style="font-family:arial">Vui l&ograve;ng tải về hướng dẫn dự thi MOS tại</span></span><span style="color:rgb(0, 0, 255)"><a href="http://www.iigvietnam.com/Uploads/Download/HDDT_MOS.pdf" style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); text-decoration: none;"><span style="color:rgb(0, 0, 255); font-size:small"><span style="font-family:arial">&nbsp;đ&acirc;y</span></span></a></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n', 'mo ta adf adsfa sdf', 'description adsf adf');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(50) NOT NULL,
  `name_vi` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_en`, `name_vi`, `category`, `created`, `modified`, `deleted`) VALUES
(1, 'Beds', 'Giường', 1, '0000-00-00 00:00:00', '2015-06-11 18:45:39', 0),
(2, 'Dressers', 'Bàn trang điểm', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'Bedroom Sets', 'Bộ phòng ngủ', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'TV Stands', 'Chân TV', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'Leather Furniture', 'Đồ da', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 'new sub', 'Ten moi', 4, '2015-06-13 10:12:31', '2015-06-13 10:18:36', 1),
(7, 'Dining table', 'Bàn ăn', 3, '2015-06-13 09:28:32', '2015-06-13 09:28:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(50) DEFAULT NULL,
  `name_vi` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `description_en` tinytext,
  `description_vi` tinytext,
  `content_en` text,
  `content_vi` text,
  `created` datetime DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `image`, `name_vi`, `name_en`, `description_en`, `description_vi`, `content_en`, `content_vi`, `created`, `deleted`) VALUES
(4, 'upl150615152319.jpg', 'Sự nhạy cảm mang tên ''dạy thêm''', 'Columbia and Kootenay Railway', 'The Columbia and Kootenay Railway was a historic railway in the Interior of British Columbia between Nelson on Kootenay Lake and Robson at the confluence of the Kootenay River and the Columbia River near Castlegar operated as part of the Canadian Pacific ', 'Vấn đề dạy thêm, học thêm lại rộ lên trên báo chí và các diễn đàn mạng. Chuyện bắt nguồn từ việc một số địa phương tổ chức "bắt quả tang" và lập biên bản một số giáo viên dạy thêm sai qu', '<h2>History pre-1900</h2>\r\n\r\n<p>The railway was chartered by a senior officer of the CPR and immediately leased for 999 years to the CPR. The CPR built the line to obtain mining traffic that was then being sent by boat along Kootenay Lake and south to the United States. By building along the 25-mile (40&nbsp;km) unnavigable&nbsp;<a href="https://en.wikipedia.org/wiki/Kootenay_River" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="Kootenay River">Kootenay River</a>&nbsp;between Kootenay Lake and the Columbia River, the CPR used steamers to connect with its mainline at&nbsp;<a href="https://en.wikipedia.org/wiki/Revelstoke,_British_Columbia" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="Revelstoke, British Columbia">Revelstoke</a>&nbsp;up the&nbsp;<a href="https://en.wikipedia.org/wiki/Arrow_Lakes" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="Arrow Lakes">Arrow Lakes</a>&nbsp;and the&nbsp;<a href="https://en.wikipedia.org/wiki/Columbia_River" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="Columbia River">Columbia River</a>. In 1891, the first train travelled between Nelson and Robson.</p>\r\n\r\n<p>Low water and ice on the Arrow Lakes made connecting route unreliable so in 1897, the CPR extended the railway up the Slocan Valley to&nbsp;<a class="mw-redirect" href="https://en.wikipedia.org/wiki/Slocan_City,_British_Columbia" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="Slocan City, British Columbia">Slocan City</a>&nbsp;on the shore of&nbsp;<a href="https://en.wikipedia.org/wiki/Slocan_Lake" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="Slocan Lake">Slocan Lake</a>.&nbsp;<a href="https://en.wikipedia.org/wiki/Train_ferry" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="Train ferry">Boats</a>(?) and&nbsp;<a href="https://en.wikipedia.org/wiki/Car_float" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="Car float">barges</a>&nbsp;moved railway cars and goods to the north end of the lake which connected with its&nbsp;<a href="https://en.wikipedia.org/wiki/Nakusp_and_Slocan_Railway" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="Nakusp and Slocan Railway">Nakusp and Slocan Railway</a>&nbsp;which continued to Nakusp on the Arrow Lake much closer to its mainline at Revelstoke. This branch also provided a connection to the rich mining region around&nbsp;<a href="https://en.wikipedia.org/wiki/Sandon,_British_Columbia" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="Sandon, British Columbia">Sandon</a>.</p>\r\n', '<p>C&acirc;u hỏi đ&oacute; nhạy cảm đến mức ch&uacute;ng ta cố gắng n&eacute; tr&aacute;nh trả lời. Hầu như ai cũng c&oacute; người th&acirc;n, bạn b&egrave; l&agrave; gi&aacute;o vi&ecirc;n. Vợ t&ocirc;i, chị vợ, anh vợ đều l&agrave; gi&aacute;o vi&ecirc;n, bạn b&egrave; t&ocirc;i nhiều người l&agrave; gi&aacute;o vi&ecirc;n, ch&iacute;nh t&ocirc;i cũng ngại n&oacute;i những vấn đề nhạy cảm của ng&agrave;nh gi&aacute;o dục. Chẳng mấy ai vui vẻ với cảnh con c&aacute;i m&igrave;nh từ s&aacute;ng tới khuya v&ugrave;i đầu học h&agrave;nh, kể cả v&agrave;o những ng&agrave;y nghỉ cuối tuần. C&aacute;c b&agrave; mẹ, &ocirc;ng bố tất bật đưa đ&oacute;n con đi học th&ecirc;m. Bố mẹ bận việc th&igrave; thu&ecirc; xe &ocirc;m đưa đ&oacute;n con. Mỗi th&aacute;ng, c&aacute;c gia đ&igrave;nh chi từ dăm ba trăm cho đến một v&agrave;i triệu đồng tiền học th&ecirc;m cho mỗi đứa con. Đối với đại đa số c&aacute;c gia đ&igrave;nh Việt Nam, số tiền chi cho việc học th&ecirc;m của con c&aacute;i l&agrave; kh&ocirc;ng nhỏ. Nhưng ai cũng ngại trả lời c&acirc;u hỏi kh&oacute; tr&ecirc;n: &quot;Nếu kh&ocirc;ng dạy th&ecirc;m th&igrave; gi&aacute;o vi&ecirc;n ăn g&igrave;?&quot;.</p>\r\n\r\n<p>Ch&uacute;ng ta c&oacute; thể n&eacute; tr&aacute;nh m&atilde;i được kh&ocirc;ng? C&aacute;ch học sinh học th&ecirc;m ở nước ta kh&ocirc;ng chỉ g&acirc;y tốn k&eacute;m c&ocirc;ng sức, tiền bạc cho c&aacute;c gia đ&igrave;nh, m&agrave; c&ograve;n ảnh hưởng ti&ecirc;u cực đến sự c&acirc;n bằng học h&agrave;nh - nghỉ ngơi v&agrave; sự ph&aacute;t triển to&agrave;n diện tr&iacute; - lực của c&aacute;c ch&aacute;u. N&oacute; ph&aacute; vỡ sự c&ocirc;ng bằng trong thụ hưởng gi&aacute;o dục, thiệt th&ograve;i cho con em c&aacute;c gia đ&igrave;nh c&oacute; kh&oacute; khăn kinh tế. N&oacute; l&agrave;m xấu đi h&igrave;nh ảnh thầy c&ocirc; trong con mắt học tr&ograve; v&agrave; phụ huynh.</p>\r\n\r\n<p>Tr&ecirc;n thực tế, kh&ocirc;ng phải tất cả 1,2 triệu gi&aacute;o vi&ecirc;n trong cả nước đều c&oacute; cơ hội dạy th&ecirc;m. N&oacute;i chung, 240.000 gi&aacute;o vi&ecirc;n mầm non, 87.000 gi&aacute;o vi&ecirc;n đại học v&agrave; cao đẳng, 18.000 gi&aacute;o vi&ecirc;n trung cấp chuy&ecirc;n nghiệp hầu như kh&ocirc;ng c&oacute; cơ hội dạy th&ecirc;m.</p>\r\n\r\n<p>Cũng kh&ocirc;ng phải tất cả 840.000 gi&aacute;o vi&ecirc;n phổ th&ocirc;ng trong cả nước đều c&oacute; cơ hội dạy th&ecirc;m, m&agrave; chủ yếu l&agrave; c&aacute;c gi&aacute;o vi&ecirc;n phổ th&ocirc;ng ở th&agrave;nh phố, thị x&atilde;.</p>\r\n\r\n<p>Cũng kh&ocirc;ng phải tất cả gi&aacute;o vi&ecirc;n ở th&agrave;nh phố, thị x&atilde; c&oacute; cơ hội dạy th&ecirc;m, m&agrave; trong số đ&oacute;, thường chỉ l&agrave; c&aacute;c gi&aacute;o vi&ecirc;n dạy c&aacute;c m&ocirc;n học sinh c&oacute; nhu cầu học th&ecirc;m, đ&oacute; l&agrave; 5 m&ocirc;n: to&aacute;n, l&yacute;, ho&aacute;, văn, ngoại ngữ.</p>\r\n\r\n<p>Nhưng cũng kh&ocirc;ng phải tất cả c&aacute;c gi&aacute;o vi&ecirc;n to&aacute;n, l&yacute;, ho&aacute;, văn, ngoại ngữ ở th&agrave;nh phố, thị x&atilde; c&oacute; cơ hội dạy th&ecirc;m, m&agrave; chỉ một số trong số c&aacute;c gi&aacute;o vi&ecirc;n đ&oacute;.</p>\r\n\r\n<p>Như vậy, rất nhiều gi&aacute;o vi&ecirc;n (trong tổng số 1,2 triệu gi&aacute;o vi&ecirc;n trong cả nước) kh&ocirc;ng c&oacute; cơ hội dạy th&ecirc;m. C&aacute;c gi&aacute;o vi&ecirc;n kh&ocirc;ng dạy th&ecirc;m đ&oacute; đ&atilde; v&agrave; đang sống như thế n&agrave;o?</p>\r\n\r\n<p>Rất tiếc l&agrave; cho đến nay chưa c&oacute; cuộc khảo s&aacute;t, nghi&ecirc;n cứu n&agrave;o về vấn đề n&agrave;y. C&ocirc; gi&aacute;o nh&agrave; t&ocirc;i đ&atilde; một thời may gia c&ocirc;ng kimono để c&oacute; th&ecirc;m thu nhập cho gia đ&igrave;nh. Ch&uacute;ng t&ocirc;i kh&ocirc;ng bao giờ thấy xấu hổ v&igrave; điều đ&oacute;. Mọi lao động v&agrave; thu nhập hợp ph&aacute;p đều vinh quang.</p>\r\n\r\n<p>Thời đi học, ch&uacute;ng t&ocirc;i kh&ocirc;ng phải học th&ecirc;m, nhưng chắc g&igrave; chất lượng học đ&atilde; k&eacute;m so với hiện nay? Học sinh Việt Nam được gửi ra nước ngo&agrave;i trong c&aacute;c thập kỷ 1970-80 học rất tốt so với học sinh c&aacute;c nước kh&aacute;c, thường chiếm c&aacute;c vị tr&iacute; đứng đầu. R&otilde; r&agrave;ng việc học th&ecirc;m phổ biến một số m&ocirc;n l&acirc;u nay kh&ocirc;ng hề l&agrave;m cho chất lượng gi&aacute;o dục của nước ta được cải thiện. N&oacute; chỉ cho thấy chất lượng dạy ch&iacute;nh kho&aacute; bị giảm s&uacute;t, nếu học sinh kh&ocirc;ng học th&ecirc;m th&igrave; kh&ocirc;ng b&ugrave; đắp được kiến thức, l&agrave;m b&agrave;i kiểm tra v&agrave; thi kh&ocirc;ng tốt. N&oacute; l&agrave; hệ quả của c&aacute;c bất cập trong c&aacute;ch dạy ch&iacute;nh kho&aacute;, c&aacute;ch thi.</p>\r\n\r\n<p>Một nền gi&aacute;o dục tử tế l&agrave; nơi học sinh c&oacute; thể nắm vững kiến thức từ c&aacute;c b&agrave;i giảng tr&ecirc;n lớp v&agrave; c&aacute;c b&agrave;i tập về nh&agrave;. Đ&oacute; cũng l&agrave; sự cam kết, tr&aacute;ch nhiệm của ng&agrave;nh gi&aacute;o dục với người d&acirc;n - những người đ&oacute;ng thuế nu&ocirc;i ng&agrave;nh gi&aacute;o dục. Đối với c&aacute;c học sinh c&oacute; học lực yếu hơn, nh&agrave; trường cần tổ chức phụ đạo miễn ph&iacute; để gi&uacute;p c&aacute;c em đ&aacute;p ứng được y&ecirc;u cầu về chuẩn kiến thức, thu hẹp khoảng c&aacute;c với c&aacute;c học sinh kh&aacute;, giỏi.</p>\r\n\r\n<p>Singapore v&agrave; nhiều nước kh&aacute;c l&agrave;m như thế, kh&ocirc;ng c&oacute; chuyện nh&agrave; trường hoặc gi&aacute;o vi&ecirc;n thu tiền phụ đạo c&aacute;c học sinh c&oacute; học lực k&eacute;m hơn. Thật kh&oacute; chấp nhận một nền gi&aacute;o dục m&agrave; nếu học sinh kh&ocirc;ng học th&ecirc;m th&igrave; kh&oacute; đạt được chuẩn kiến thức kỹ năng của m&ocirc;n học, cấp học. Đối với học sinh kh&aacute; giỏi, c&oacute; năng khiếu về c&aacute;c bộ m&ocirc;n, nh&agrave; trường cần tổ chức chương tr&igrave;nh bồi dưỡng để c&aacute;c em c&oacute; thể ph&aacute;t triển tối đa năng lực của m&igrave;nh. V&agrave; thực tế l&agrave; trong hoạt động dạy học của c&aacute;c trường phổ th&ocirc;ng đ&atilde; c&oacute; những nội dung n&agrave;y. Vậy học sinh phổ th&ocirc;ng đi học th&ecirc;m tr&agrave;n lan th&igrave; c&aacute;c em học c&aacute;i g&igrave; v&agrave; học để l&agrave;m g&igrave;?</p>\r\n\r\n<p>Ở c&aacute;c nước kh&aacute;c c&oacute; dạy th&ecirc;m, học th&ecirc;m kh&ocirc;ng? C&acirc;u trả lời l&agrave; c&oacute;, ở đ&acirc;u cũng c&oacute;. Ở một số nước như Nhật Bản, H&agrave;n Quốc, học sinh học th&ecirc;m rất nhiều. Ở Mỹ v&agrave; ch&acirc;u &Acirc;u, Singapore, Australia, New Zealand, học sinh học th&ecirc;m &iacute;t hơn, nhưng cũng c&oacute;. Chỉ c&oacute; điều, chuyện dạy th&ecirc;m, học th&ecirc;m ở nước ta v&agrave; ở c&aacute;c nước kh&aacute;c về bản chất kh&aacute;c nhau. Ở họ, dạy th&ecirc;m, học th&ecirc;m chủ yếu được tổ chức theo hai m&ocirc; h&igrave;nh: (a) c&aacute;c trung t&acirc;m luyện thi (&quot;cram schools&quot;, loại gi&aacute;o dục n&agrave;y được gọi l&agrave; &quot;cram education&quot;), (b) c&aacute;c c&acirc;u lạc bộ năng khiếu (&acirc;m nhạc, hội hoạ, thể thao, kỹ thuật - c&ocirc;ng nghệ...). Lực lượng gi&aacute;o vi&ecirc;n gi&aacute;o dục ch&iacute;nh quy v&agrave; ở c&aacute;c trung t&acirc;m luyện thi, c&acirc;u lạc bộ năng khiếu độc lập với nhau, kh&ocirc;ng được l&agrave;m việc lẫn lộn. C&aacute;c trung t&acirc;m luyện thi, c&aacute;c c&acirc;u lạc bộ năng khiếu nằm ngo&agrave;i hệ thống gi&aacute;o dục, nhưng phải đăng k&yacute; v&agrave; đ&oacute;ng thuế thu nhập. Ở Nhật Bản, nếu gi&aacute;o vi&ecirc;n n&agrave;o bị ph&aacute;t hiện dạy th&ecirc;m ngo&agrave;i hoạt động ch&iacute;nh quy, gi&aacute;o vi&ecirc;n đ&oacute; sẽ bị sa thải, hiệu trưởng trường đ&oacute; phải từ chức.</p>\r\n\r\n<p>T&ocirc;i rất muốn thu nhập của tất cả gi&aacute;o vi&ecirc;n trong cả nước được cải thiện theo lộ tr&igrave;nh cải c&aacute;ch triệt để gi&aacute;o dục Việt Nam, c&oacute; sự c&acirc;n đối h&agrave;i ho&agrave; với c&aacute;c lĩnh vực kh&aacute;c. Mặc d&ugrave; vậy, nếu buộc phải lựa chọn giữa một b&ecirc;n l&agrave; quyền được dạy th&ecirc;m của mấy chục ngh&igrave;n hoặc mấy trăm ngh&igrave;n gi&aacute;o vi&ecirc;n, một b&ecirc;n l&agrave; một nền gi&aacute;o dục tử tế (nơi học sinh c&oacute; thể đạt chuẩn gi&aacute;o dục từ chương tr&igrave;nh ch&iacute;nh kho&aacute; m&agrave; kh&ocirc;ng cần học th&ecirc;m, đồng thời những em c&oacute; học lực yếu hơn được nh&agrave; trường phụ đạo miễn ph&iacute;), sự ph&aacute;t triển c&acirc;n đối tr&iacute; - lực của h&agrave;ng chục triệu trẻ em, t&ocirc;i tin ch&uacute;ng ta cần chọn vế thứ hai chứ kh&ocirc;ng phải vế thứ nhất.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, vấn đề n&agrave;y cần được giải quyết với một lộ tr&igrave;nh v&agrave;i ba năm để chuẩn bị tư tưởng cho c&aacute;c gi&aacute;o vi&ecirc;n, phụ huynh v&agrave; học sinh, vừa n&acirc;ng cấp chất lượng giảng dạy ch&iacute;nh kho&aacute;. Kh&ocirc;ng n&ecirc;n &aacute;p dụng c&aacute;c biện ph&aacute;p phi gi&aacute;o dục kiểu r&igrave;nh bắt quả tang v&agrave; lập bi&ecirc;n bản gi&aacute;o vi&ecirc;n vi phạm trước mặt học sinh.</p>\r\n\r\n<p>Cần ph&aacute;t triển mạnh mẽ c&aacute;c m&ocirc; h&igrave;nh trung t&acirc;m luyện thi v&agrave; c&acirc;u lạc bộ năng khiếu để việc dạy th&ecirc;m, học th&ecirc;m kh&ocirc;ng ph&aacute;t sinh ti&ecirc;u cực m&agrave;, ngược lại, đ&oacute;ng g&oacute;p hiệu quả cho việc n&acirc;ng cao chất lượng, năng lực người Việt Nam. Trong 5 năm đầu, gi&aacute;o vi&ecirc;n gi&aacute;o dục ch&iacute;nh quy c&oacute; thể được kết hợp dạy học ở c&aacute;c trung t&acirc;m v&agrave; c&aacute;c c&acirc;u lạc bộ. Sau đ&oacute; phải t&aacute;ch bạch giữa hai hệ thống, mỗi gi&aacute;o vi&ecirc;n tự chọn đứng trong hệ thống n&agrave;o một c&aacute;ch minh bạch (gi&aacute;o dục ch&iacute;nh quy hay gi&aacute;o dục phi ch&iacute;nh quy).</p>\r\n', '2015-06-15 14:37:11', 0),
(5, 'upl150615151326.jpg', 'Visa và tầm nhìn', 'Ada County Highway District', 'ACHD covers the entirety of Ada County, including the six cities within it, and is responsible for short-range planning, construction, maintenance and improvements to Ada County''s local roads and bridges (excluding state highways like Eagle Road, Intersta', 'Lo mất 11 triệu USD thu phí visa một năm là rất thiển cận. Chúng tôi tính rằng nếu Việt Nam bỏ cấp visa với một số nước như Thái Lan, Singapore đã làm, chỉ với lượng khách tăng 160.000 người mỗi năm', '<p style="text-align:center"><img alt="" src="http://localhost/fur/annhau/images/uploads/upl150615151833.jpg" style="height:100px; width:133px" /></p>\r\n\r\n<p>Five Commissioners govern the District. Together, they are responsible for guiding the planning, development and implementation of transportation facilities throughout the county. Elections are held every two years on a rotating basis, and each Commissioner represents a separate subdistrict.</p>\r\n\r\n<p>Because strong public involvement is crucial to the transportation planning process, the Commissioners and staff regularly host and attend meetings and public hearings to gather feedback from citizens. The Commissioners also hold regular public meetings at the District&#39;s headquarters, and participate in joint meetings with municipal and county officials.</p>\r\n\r\n<p>An appointed Director, who serves as chief administrator, manages the District on a day-to-day basis. The Director is responsible for managing five departments: Administration, Engineering, Maintenance and Operations, Traffic, and Planning and Development, which combined, total nearly 300 employees.</p>\r\n', '<p>Chỉ một ng&agrave;y trước, h&ocirc;m 8/6, tại phi&ecirc;n họp Quốc hội, Bộ trưởng Văn ho&aacute; - Thể thao - Du lịch Ho&agrave;ng Tuấn Anh l&agrave;m ph&eacute;p so s&aacute;nh cụ thể hơn, khi cho biết Th&aacute;i Lan đ&atilde; miễn thị thực cho 61 nước, trong đ&oacute; 40 nước được miễn đơn phương, Singapore đ&atilde; miễn thị thực cho 180 nước, trong đ&oacute; 80 nước được miễn đơn phương. Rồi &ocirc;ng kết th&uacute;c b&agrave;i ph&aacute;t biểu của m&igrave;nh với c&acirc;u hỏi bu&ocirc;ng lửng: &ldquo;Việt Nam đứng&nbsp;thứ s&aacute;u&nbsp;trong 20 điểm đến hấp dẫn nhất thế giới, c&oacute; nhiều b&atilde;i biển thuộc hạng đẹp nhất thế giới. Sơn Đo&ograve;ng l&agrave; một trong 12 hang động kỳ th&uacute; nhất thế giới. Vịnh Hạ Long l&agrave; một trong những kỳ quan ấn tượng nhất thế giới...Vậy, điều g&igrave; l&agrave;m ảnh hưởng đến khả năng tăng trưởng kh&aacute;ch du lịch?&rdquo;. T&ocirc;i cảm nhận c&oacute; sự ấm ức trong từng c&acirc;u ph&aacute;t biểu của Bộ trưởng tại nghị trường.</p>\r\n\r\n<p>Những người kh&ocirc;ng ủng hộ việc nới lỏng visa du lịch thường n&ecirc;u điều kiện:<em>miễn visa song phương</em>, tr&ecirc;n cơ sở c&oacute; đi c&oacute; lại. Đ&ocirc;i khi họ cũng lợi dụng t&acirc;m l&yacute; tự t&ocirc;n, cho rằng người ta coi thường m&igrave;nh, người ta c&oacute; miễn visa cho m&igrave;nh đ&acirc;u m&agrave; m&igrave;nh lại miễn visa cho người ta? Theo t&ocirc;i đ&oacute; l&agrave; một c&aacute;ch suy nghĩ thiển cận.</p>\r\n\r\n<p>Khoảng 20 năm trước, một c&aacute;n bộ ngoại giao T&acirc;y &Acirc;u trao đổi với t&ocirc;i: &quot;Visa du lịch chưa bao giờ v&agrave; sẽ kh&ocirc;ng bao giờ l&agrave; nguy&ecirc;n tắc song phương. Mỗi nước c&oacute; những ưu ti&ecirc;n ri&ecirc;ng v&agrave; những vấn đề x&atilde; hội ri&ecirc;ng. C&aacute;c nước miễn visa du lịch cho c&ocirc;ng d&acirc;n nước t&ocirc;i v&igrave; họ muốn nhiều c&ocirc;ng d&acirc;n nước t&ocirc;i đến tham quan, nghỉ dưỡng v&agrave; mang nhiều ngoại tệ v&agrave;o nước họ. Du lịch l&agrave; một kiểu xuất khẩu tại chỗ. Du kh&aacute;ch nước t&ocirc;i cũng kh&ocirc;ng g&acirc;y ra hệ lụy g&igrave; đ&aacute;ng kể cho nước họ. Nhưng ch&uacute;ng t&ocirc;i lại c&oacute; những ưu ti&ecirc;n, vấn đề rất kh&aacute;c, ch&uacute;ng t&ocirc;i kh&ocirc;ng thể qu&aacute; tho&aacute;ng với kh&aacute;ch du lịch đến từ nước họ, để c&ocirc;ng d&acirc;n của họ đến nước ch&uacute;ng t&ocirc;i qu&aacute; dễ, qu&aacute; đ&ocirc;ng&quot;. Khi đọc tin tức về một số người Việt trồng &quot;cỏ&quot; (cần sa), lao động chui, trốn thuế ở một số nước, t&ocirc;i c&oacute; thể hiểu được những ẩn &yacute; sau lời giải th&iacute;ch của nh&agrave; ngoại giao. Ch&iacute;nh s&aacute;ch miễn visa du lịch đơn phương của Th&aacute;i Lan, Singapore cũng l&agrave; minh chứng thuyết phục cho những g&igrave; &ocirc;ng giải th&iacute;ch cho t&ocirc;i. Ch&uacute;ng ta cần cải thiện thương hiệu người Việt trong con mắt thi&ecirc;n hạ, để người ta y&ecirc;n t&acirc;m mở cửa ch&agrave;o đ&oacute;n ch&uacute;ng ta.</p>\r\n\r\n<p>Cũng c&oacute; người cho rằng việc siết chặt visa l&agrave; v&igrave; an ninh, quốc ph&ograve;ng. Nhưng t&ocirc;i chưa bao giờ thấy l&atilde;nh đạo Bộ C&ocirc;ng an, Bộ Quốc ph&ograve;ng c&oacute; &yacute; kiến như vậy. Việc miễn visa kh&ocirc;ng đồng nghĩa với việc bất kỳ c&ocirc;ng d&acirc;n n&agrave;o của nước được miễn visa cũng mặc nhi&ecirc;n c&oacute; quyền v&agrave;o nước ta. Cho v&agrave;o hay kh&ocirc;ng cho người n&agrave;o đ&oacute; v&agrave;o l&agrave; quyền của mỗi quốc gia. Kh&ocirc;ng ai c&oacute; quyền y&ecirc;u cầu lời giải th&iacute;ch. Ngay cả khi t&ocirc;i c&oacute; visa v&agrave;o Mỹ, cơ quan cửa khẩu của Mỹ vẫn c&oacute; quyền kh&ocirc;ng cho t&ocirc;i nhập cảnh m&agrave; kh&ocirc;ng cần giải th&iacute;ch l&yacute; do. Mặc d&ugrave; c&aacute;c nước ASEAN đ&atilde; miễn thị thực du lịch cho nhau, nhưng người thường xuy&ecirc;n c&oacute; th&aacute;i độ th&ugrave; địch, k&iacute;ch động hận th&ugrave; với Việt Nam c&oacute; thể bị từ chối nhập cảnh v&agrave; chẳng c&oacute; quyền g&igrave; y&ecirc;u cầu c&aacute;c cơ quan nước ta giải th&iacute;ch l&yacute; do từ chối. Kh&ocirc;ng ai c&oacute; quyền khiếu nại những quyền bất khả x&acirc;m phạm của quốc gia kh&aacute;c, kể cả quyền cho hay kh&ocirc;ng cho ph&eacute;p nhập cảnh. Người n&agrave;o cũng c&oacute; thể đến g&otilde; cửa nh&agrave; t&ocirc;i, kh&ocirc;ng cần c&oacute; thư mời, nhưng mở cửa mời người đ&oacute; v&agrave;o hay kh&ocirc;ng lại l&agrave; quyền của t&ocirc;i.</p>\r\n\r\n<p>Gi&aacute; trị của việc miễn visa du lịch kh&ocirc;ng nằm ở tiền. Kh&aacute;ch du lịch v&agrave;o Việt Nam mỗi người chi ti&ecirc;u 1.000-1.500 USD, tương đương với việc của ta mua mấy tấn gạo, họ kh&ocirc;ng tiếc mấy chục USD lệ ph&iacute; visa. Nhưng tờ visa tạo ra cho họ nhiều thủ tục nhi&ecirc;u kh&ecirc;, nhiều mối bận t&acirc;m kh&oacute; chịu. C&oacute; &iacute;t kh&aacute;ch du lịch n&agrave;o được trả đ&uacute;ng mức lệ ph&iacute; visa như Bộ T&agrave;i ch&iacute;nh c&ocirc;ng bố. Hầu hết kh&aacute;ch du lịch phải xin visa qua c&aacute;c c&ocirc;ng ty dịch vụ v&agrave; phải trả cao hơn nhiều.</p>\r\n\r\n<p>Việt Nam kh&ocirc;ng c&oacute; đại sứ qu&aacute;n, l&atilde;nh sự qu&aacute;n ở nhiều nơi tr&ecirc;n thế giới để kh&aacute;ch du lịch dễ tiếp cận xin visa. Việt Nam cũng kh&ocirc;ng c&oacute; ch&iacute;nh s&aacute;ch uỷ quyền cho nước kh&aacute;c cấp visa (như Latvia ủy quyền cho Hungary, Lithunia ủy quyền cho Đan Mạch nhận hồ sơ v&agrave; cấp visa ở Việt Nam).</p>\r\n\r\n<p>Theo t&ocirc;i, những hạn chế về ch&iacute;nh s&aacute;ch visa du lịch v&agrave; bất cập trong hoạt động quảng b&aacute; du lịch l&agrave; hai &quot;n&uacute;t thắt cổ chai&quot; ch&iacute;nh cho sự ph&aacute;t triển du lịch.</p>\r\n\r\n<p>Việt Nam cần c&oacute; ch&iacute;nh s&aacute;ch cởi mở hơn về visa du lịch, bao gồm tăng danh s&aacute;ch nước được miễn visa, triển khai visa điện tử (e-visa), ho&agrave;n thiện ch&iacute;nh s&aacute;ch visa tại cửa khẩu (visa-on-arrival), &aacute;p dụng visa trung chuyển (transit visa). Đối với hoạt động quảng b&aacute; du lịch, cần nhanh ch&oacute;ng h&igrave;nh th&agrave;nh Quỹ ph&aacute;t triển du lịch v&agrave; Cơ quan quảng b&aacute; du lịch Việt Nam tr&ecirc;n cơ sở &aacute;p dụng c&aacute;c kinh nghiệm thực tiễn&nbsp;tốt của khu vực v&agrave; thế giới.</p>\r\n', '2015-06-15 15:13:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(20) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `image`, `created`, `deleted`) VALUES
(14, 'upl150613103745.jpg', '2015-06-13 10:37:45', 0),
(15, 'upl150615112936.jpg', '2015-06-15 11:29:36', 0),
(16, 'upl150615151833.jpg', '2015-06-15 15:18:33', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
