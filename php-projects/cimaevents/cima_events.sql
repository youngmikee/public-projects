-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2016 at 08:10 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cima_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(100) DEFAULT NULL,
  `last` varchar(100) DEFAULT NULL,
  `adminNumber` int(11) DEFAULT NULL,
  `live` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `live` (`live`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `adminNumber`, `live`, `deleted`, `created`, `modified`) VALUES
(1, 'Michael', 'Ugborikoko', 10001, 1, 0, '2016-02-14 22:46:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `visibility` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `live` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `live` (`live`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `type`, `price`, `qty`, `visibility`, `status`, `live`, `deleted`, `created`, `modified`) VALUES
(1, 'Chafing Dishes', 'product', 75, 4, 'purchase', 1, 1, 0, '2016-01-29 23:18:19', '2016-01-29 23:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `name` varchar(255) DEFAULT NULL,
  `mime` varchar(32) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `product` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `live` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `live` (`live`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`name`, `mime`, `size`, `width`, `height`, `product`, `id`, `live`, `deleted`, `created`, `modified`) VALUES
('Omega__Chafing_Dishes.jpg', 'image/jpeg', 61193, 330, 330, 'Omega  Chafing Dishes', 1, 1, 0, '2016-02-07 22:52:01', NULL),
('5_Arm_Candelabra.jpg', 'image/jpeg', 25232, 330, 330, '5 Arm Candelabra', 2, 1, 0, '2016-02-07 23:03:50', NULL),
('Organza_Bow_Tie.jpg', 'image/jpeg', 54213, 330, 330, 'Organza Bow Tie', 3, 1, 0, '2016-02-10 00:14:23', NULL),
('Spandex_Stretch_Chair_Cover.jpg', 'image/jpeg', 26174, 330, 330, 'Spandex Stretch Chair Cover', 4, 1, 0, '2016-02-10 00:20:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `catalog` varchar(100) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `visibility` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `live` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `live` (`live`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `catalog`, `description`, `price`, `qty`, `type`, `visibility`, `image`, `live`, `deleted`, `created`, `modified`) VALUES
(1, 'Omega  Chafing Dishes', 'Chafing Dishes', 'A mirror polished stainless steel finish. Each chafer comes complete with: Two handles, Shelf, Two fuel holders, Water pan, Food Pan and with Lid.', 6.99, 5, 'product', 'rental', 'jpg', 1, 0, '2016-02-07 22:52:01', NULL),
(2, '5 Arm Candelabra', 'Candelabra', 'Silver candelabra with  adjustable arms which allows you to turn and shape. It''s a nice size for a table centerpiece. It has a nice weight to it.', 5.99, 4, 'product', 'rental', 'jpg', 1, 0, '2016-02-07 23:03:50', NULL),
(3, 'Organza Bow Tie', 'Bow Tie', ' silver,  Orange, Pink, Hunter Green,  Gold, Blue Organza Wedding Chair Bow Tie \r\nHire single or more available \r\nSize\r\nLength : 3 Meters \r\nWidth : 22 cm\r\nMaterial : Organza \r\nGreat for all parties theme such as weddings indoor or outdoor can be used as swags for any other creative decorations \r\n', 0.42, 200, 'product', 'rental', 'jpg', 1, 0, '2016-02-10 00:14:23', NULL),
(4, 'Spandex Stretch Chair Cover', 'Chair Cover', '  - Elasticated foot pockets. Has pockets at the bottom, so the leg of the chair can fit into the chair cover\r\n  - Can be used to cover all shapes of chair tops: semi-rounded top, round top, square top at your wedding,banquet,anniversary party\r\nSingle hire or more available.', 0.53, 300, 'product', 'rental', 'jpg', 1, 0, '2016-02-10 00:20:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(100) DEFAULT NULL,
  `last` varchar(100) DEFAULT NULL,
  `accountType` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `live` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `password` (`password`),
  KEY `postcode` (`postcode`),
  KEY `address` (`address`),
  KEY `live` (`live`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first`, `last`, `accountType`, `email`, `password`, `postcode`, `address`, `live`, `deleted`, `created`, `modified`) VALUES
(1, 'Michael', 'Ugborikoko', 'admin', 'u2michael@live.co.uk', 'f51a80989232243fe813427f3bb5a1207ed5b207ff566dd972e6f55f115f0cf7', NULL, NULL, 1, 0, '2016-02-15 21:25:41', NULL),
(2, 'John', 'Pual', 'customer', 'youngmikelo@yahoo.com', 'f51a80989232243fe813427f3bb5a1207ed5b207ff566dd972e6f55f115f0cf7', 'e17 4aa', '846 forest road, walthamstow, London', 1, 0, '2016-02-15 21:46:01', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
