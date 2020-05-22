-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2014 at 06:14 AM
-- Server version: 5.5.40
-- PHP Version: 5.4.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coursehunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(10) NOT NULL,
  `duration` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `department`, `duration`) VALUES
(1, 'medicine and suregery', 'science', '6 years'),
(2, 'marketing', 'arts', '4 years'),
(3, 'accounting', 'arts', '4 years'),
(4, 'public administration', 'arts', '4 years'),
(5, 'music', 'arts', '4 years'),
(6, 'english', 'arts', '4 years'),
(7, 'electronics engineering', 'science', '4 years'),
(8, 'chemical engineering', 'science', '4 years'),
(9, 'petroleum engineering', 'science', '4 years'),
(10, 'fine and applied arts', 'arts', '4 years'),
(11, 'architecture', 'arts', '4 years'),
(12, 'micro biology', 'science', '4 years'),
(13, 'economics', 'arts', '4 years'),
(14, 'civil engineering', 'science', '4 years'),
(15, 'political science', 'science', '4 years'),
(16, 'business administration', 'arts', '4 years'),
(17, 'mechanical engineering', 'science', '4 years'),
(18, 'electronics engineering', 'science', '4 years'),
(19, 'computer science', 'science', '4 years'),
(20, 'banking and finance', 'arts', '4 years'),
(21, 'theatre arts', 'arts', '4 years'),
(22, 'commerce', 'arts', '4 years'),
(23, 'religious studies', 'arts', '4 years'),
(24, 'government', 'arts', '4 years'),
(25, 'history', 'arts', '4 years'),
(26, 'geology', 'science', '4 years'),
(27, 'law', 'arts', '4 years'),
(28, 'secetarial admin', 'arts', '4 years'),
(29, 'mass communication', 'arts', '4 years');

-- --------------------------------------------------------

--
-- Table structure for table `instcourses`
--

CREATE TABLE IF NOT EXISTS `instcourses` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instcourses`
--

INSERT INTO `instcourses` (`id`, `name`, `course`) VALUES
(1, 'university of nigeria', 'medicine and suregery'),
(2, 'university of nigeria', 'marketing'),
(3, 'university of nigeria', 'accounting'),
(4, 'university of nigeria', 'public administration'),
(5, 'university of nigeria', 'electronic engineering'),
(6, 'university of nigeria', 'chemical engineering'),
(7, 'university of nigeria', 'fine and applied arts'),
(8, 'university of nigeria', 'micro biology'),
(9, 'university of nigeria', 'economics'),
(10, 'university of nigeria', 'political science'),
(11, 'university of nigeria', 'business administration'),
(12, 'university of nigeria', 'mechanical engineering'),
(13, 'university of nigeria', 'computer science'),
(14, 'university of nigeria', 'government'),
(15, 'university of nigeria', 'secretarial admin'),
(16, 'university of nigeria', 'religious studies'),
(17, 'university of lagos', 'medicine and surgery'),
(18, 'university of lagos', 'marketing'),
(19, 'university of lagos', 'accounting'),
(20, 'university of lagos', 'public administration'),
(21, 'university of lagos', 'music'),
(22, 'university of lagos', 'english'),
(23, 'university of lagos', 'electronic engineering'),
(24, 'university of lagos', 'chemical engineering'),
(25, 'university of lagos', 'petroleum engineering'),
(26, 'university of lagos', 'architecture'),
(27, 'university of lagos', 'economics'),
(28, 'university of lagos', 'civil engineering'),
(29, 'university of lagos', 'political science'),
(30, 'university of lagos', 'mechanical engineering'),
(31, 'university of lagos', 'computer science'),
(32, 'university of lagos', 'banking and finance'),
(33, 'university of lagos', 'government'),
(34, 'university of lagos', 'history'),
(35, 'university of lagos', 'law'),
(36, 'university of lagos', 'mass communication'),
(37, 'university of portharcourt', 'marketing'),
(38, 'university of portharcourt', 'accounting'),
(39, 'university of portharcourt', 'english'),
(40, 'university of portharcourt', 'chemical engineering'),
(41, 'university of portharcourt', 'petroleum engineering'),
(42, 'university of portharcourt', 'fine and applied arts'),
(43, 'university of portharcourt', 'architecture'),
(44, 'university of portharcourt', 'civil engineering'),
(45, 'university of portharcourt', 'political science'),
(46, 'university of portharcourt', 'mechanical engineering'),
(47, 'university of portharcourt', 'computer science'),
(48, 'university of portharcourt', 'commerce'),
(49, 'university of portharcourt', 'government'),
(50, 'university of portharcourt', 'geology'),
(51, 'university of portharcourt', 'law'),
(52, 'university of portharcourt', 'secretarial admin'),
(53, 'delta state university', 'accounting'),
(54, 'delta state university', 'public administration'),
(55, 'delta state university', 'electronic engineering'),
(56, 'delta state university', 'chemical engineering'),
(57, 'delta state university', 'petroleum engineering'),
(58, 'delta state university', 'architecture'),
(59, 'delta state university', 'economics'),
(60, 'delta state university', 'civil engineering'),
(61, 'delta state university', 'political science'),
(62, 'delta state university', 'mechanical engineering'),
(63, 'delta state university', 'computer science'),
(64, 'delta state university', 'banking and finance'),
(65, 'delta state university', 'commerce'),
(66, 'delta state university', 'government'),
(67, 'delta state university', 'history'),
(68, 'delta state university', 'mass communication'),
(69, 'enugu state university', 'madicine and surgery'),
(70, 'enugu state university', 'accounting'),
(71, 'enugu state university', 'public administration'),
(72, 'enugu state university', 'music'),
(73, 'enugu state university', 'english'),
(74, 'enugu state university', 'chemical engineering'),
(75, 'enugu state university', 'fine and applied arts'),
(76, 'enugu state university', 'micro biology'),
(77, 'enugu state university', 'economics'),
(78, 'enugu state university', 'political science'),
(79, 'enugu state university', 'business administration'),
(80, 'enugu state university', 'mechanical engineering'),
(81, 'enugu state university', 'banking and finance'),
(82, 'enugu state university', 'commerce'),
(83, 'enugu state university', 'religious studies'),
(84, 'enugu state university', 'history'),
(85, 'enugu state university', 'geology'),
(86, 'enugu state university', 'law'),
(87, 'enugu state university', 'secretarial admin'),
(88, 'enugu state university', 'mass communication'),
(89, 'university of benin', 'medicine and surgery'),
(90, 'university of benin', 'accounting'),
(91, 'university of benin', 'english'),
(92, 'university of benin', 'electronic engineering'),
(93, 'university of benin', 'chemical engineering'),
(94, 'university of benin', 'petroleum engineering'),
(95, 'university of benin', 'architecture'),
(96, 'university of benin', 'micro biology'),
(97, 'university of benin', 'political science'),
(98, 'university of benin', 'mechanical engineering'),
(99, 'university of benin', 'computer science'),
(100, 'university of benin', 'government'),
(101, 'university of benin', 'history'),
(102, 'university of benin', 'geology'),
(103, 'university of benin', 'law'),
(104, 'university of benin', 'mass communication'),
(105, 'imo state university', 'medicine and surgery'),
(106, 'imo state university', 'accounting'),
(107, 'imo state university', 'public administration'),
(108, 'imo state university', 'music'),
(109, 'imo state university', 'electronic engineering'),
(110, 'imo state university', 'chemical engineering'),
(111, 'imo state university', 'fine and applied arts'),
(112, 'imo state university', 'architecture'),
(113, 'imo state university', 'micro biology'),
(114, 'imo state university', 'economics'),
(115, 'imo state university', 'political science'),
(116, 'imo state university', 'business administration'),
(117, 'imo state university', 'mechanical engineering'),
(118, 'imo state university', 'computer science'),
(119, 'imo state university', 'banking and finance'),
(120, 'imo state university', 'theatre arts'),
(121, 'imo state university', 'religious studies'),
(122, 'imo state university', 'government'),
(123, 'imo state university', 'geology'),
(124, 'imo state university', 'law'),
(125, 'imo state university', 'secretarial admin'),
(126, 'imo state university', 'mass communication'),
(127, 'university of abuja', 'medicine and surgery'),
(128, 'university of abuja', 'marketing'),
(129, 'university of abuja', 'accounting'),
(130, 'university of abuja', 'public administration'),
(131, 'university of abuja', 'music'),
(132, 'university of abuja', 'english'),
(133, 'university of abuja', 'electronic engineering'),
(134, 'university of abuja', 'chemical engineering'),
(135, 'university of abuja', 'petroleum engineering'),
(136, 'university of abuja', 'architecture'),
(137, 'university of abuja', 'economics'),
(138, 'university of abuja', 'civil engineering'),
(139, 'university of abuja', 'political science'),
(140, 'university of abuja', 'business administration'),
(141, 'university of abuja', 'mechanical engineering'),
(142, 'university of abuja', 'computer science'),
(143, 'university of abuja', 'banking and finance'),
(144, 'university of abuja', 'theatre arts'),
(145, 'university of abuja', 'religious studies'),
(146, 'university of abuja', 'government'),
(147, 'university of abuja', 'law'),
(148, 'university of abuja', 'mass communication'),
(149, 'university of ilorin', 'medicine and surgery'),
(150, 'university of ilorin', 'accounting'),
(151, 'university of ilorin', 'public administration'),
(152, 'university of ilorin', 'engliish'),
(153, 'university of ilorin', 'electronic engineering'),
(154, 'university of ilorin', 'chemical engineering'),
(155, 'university of ilorin', 'fine and applied arts'),
(156, 'university of ilorin', 'architecture'),
(157, 'university of ilorin', 'micro biology'),
(158, 'university of ilorin', 'economics'),
(159, 'university of ilorin', 'business administration'),
(160, 'university of ilorin', 'mechanical engineering'),
(161, 'university of ilorin', 'banking and finance'),
(162, 'university of ilorin', 'theatre arts'),
(163, 'university of ilorin', 'religious studies'),
(164, 'university of ilorin', 'government'),
(165, 'university of ilorin', 'geology'),
(166, 'university of ilorin', 'law'),
(167, 'university of ilorin', 'secretarial admin'),
(168, 'niger delta university', 'marketing'),
(169, 'niger delta university', 'public administration'),
(170, 'niger delta university', 'music'),
(171, 'niger delta university', 'english'),
(172, 'niger delta university', 'chemical engineering'),
(173, 'niger delta university', 'petroleum engineering'),
(174, 'niger delta university', 'micro biology'),
(175, 'niger delta university', 'economics'),
(176, 'niger delta university', 'civil engineering'),
(177, 'niger delta university', 'business administration'),
(178, 'niger delta university', 'mechanical engineering'),
(179, 'niger delta university', 'computer science'),
(180, 'niger delta university', 'commerce'),
(181, 'niger delta university', 'government'),
(182, 'niger delta university', 'history'),
(183, 'niger delta university', 'secretarial admin'),
(184, 'niger delta university', 'mass communicaiton'),
(185, 'university of calabar', 'medicine and surgery'),
(186, 'university of calabar', 'marketing'),
(187, 'university of calabar', 'public administration'),
(188, 'university of calabar', 'music'),
(189, 'university of calabar', 'english'),
(190, 'university of calabar', 'electronic engineering'),
(191, 'university of calabar', 'chemical engineering'),
(192, 'university of calabar', 'petroleum engineering'),
(193, 'university of calabar', 'architecture'),
(194, 'university of calabar', 'micro biology'),
(195, 'university of calabar', 'economics'),
(196, 'university of calabar', 'civil engineering'),
(198, 'university of calabar', 'computer science'),
(199, 'university of calabar', 'banking and finance'),
(200, 'university of calabar', 'theatre arts'),
(201, 'university of calabar', 'commerce'),
(202, 'university of calabar', 'religious studies'),
(203, 'university of calabar', 'law'),
(204, 'university of jos', 'medicine and surgery'),
(205, 'university of jos', 'accounting'),
(206, 'university of jos', 'public administration'),
(207, 'university of jos', 'music'),
(208, 'university of jos', 'electronic engineering'),
(209, 'university of jos', 'chemical engineering'),
(210, 'university of jos', 'petroleum engineering'),
(211, 'university of jos', 'fine and applied arts'),
(212, 'university of jos', 'micro biology'),
(213, 'university of jos', 'economics'),
(214, 'university of jos', 'civil engineering'),
(215, 'university of jos', 'political science'),
(216, 'university of jos', 'business administration'),
(217, 'university of jos', 'mechanical engineering'),
(218, 'university of jos', 'computer science'),
(219, 'university of jos', 'banking and finance'),
(220, 'university of jos', 'theatre arts'),
(221, 'university of jos', 'commerce'),
(222, 'university of jos', 'religious studies'),
(223, 'university of jos', 'government'),
(224, 'university of jos', 'history'),
(225, 'university of jos', 'geology'),
(226, 'university of jos', 'law'),
(227, 'university of jos', 'secretarial admin'),
(228, 'anambra state university', 'medicine and surgery'),
(229, 'anambra state university', 'marketing'),
(230, 'anambra state university', 'accounting'),
(231, 'anambra state university', 'public administration'),
(232, 'anambra state university', 'english'),
(233, 'anambra state university', 'electronic engineering'),
(234, 'anambra state university', 'chemical engineering'),
(235, 'anambra state university', 'fine and applied arts'),
(236, 'anambra state university', 'architecture'),
(237, 'anambra state university', 'economics'),
(238, 'anambra state university', 'civil engineering'),
(239, 'anambra state university', 'business administration'),
(240, 'anambra state university', 'mechanical engineering'),
(241, 'anambra state university', 'computer science'),
(242, 'anambra state university', 'banking and finance'),
(243, 'anambra state university', 'theatre arts'),
(244, 'anambra state university', 'commerce'),
(245, 'anambra state university', 'religious studies'),
(246, 'anambra state university', 'government'),
(247, 'anambra state university', 'history'),
(248, 'anambra state university', 'geology'),
(249, 'anambra state university', 'law'),
(250, 'anambra state university', 'secretarial admin'),
(251, 'anambra state university', 'mass communicaiton'),
(252, 'madonna university', 'computer science'),
(253, 'madonna university', 'english');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE IF NOT EXISTS `institutions` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `website` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `name`, `website`, `state`, `town`) VALUES
(1, 'university of nigeria', 'www.unn.edu.ng', 'enugu', 'nsukka'),
(2, 'university of lagos', 'www.unilag.edu.ng', 'lagos', 'akoka'),
(3, 'university of portharcourt', 'www.uniport.edu.ng', 'river', 'choba'),
(4, 'delta state university', 'www.delsu.edu.ng', 'delta', 'abraka'),
(5, 'enugu state university', 'www.esut.edu.ng', 'enugu', 'agbani'),
(6, 'university of benin', 'www.uniben.edu.ng', 'edo', 'benin city'),
(7, 'imo state university', 'www.imsu.edu.ng', 'imo', 'owerri'),
(8, 'university of abuja', 'www.uniabuja.edu.ng', 'abuja', 'fct abuja'),
(9, 'university of ilorin', 'www.unilorin.edu.ng', 'kwara', 'kwara'),
(10, 'niger delta university', 'www.ndu.edu.ng', 'bayelsa', 'wilberforce island'),
(11, 'university of calabar', 'www.unical.edu.ng', 'crossriver ', 'crossriver'),
(12, 'university of jos', 'www.unijos.edu.ng', 'plateu', 'plateua'),
(13, 'anambra state university', 'www.ansu.edu.ng', 'anambra', 'uli'),
(14, 'madonna university', 'www.madonnauniversity.edu.ng', 'anambra ', 'okija');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Michael', 'u2michael@live.co.uk', 'educate'),
(2, 'Admin', 'info@coursehunt.com', 'emanuel'),
(3, 'man', 'naviewills@yahoo.com', 'passwoed'),
(4, 'navie', 'spaceman33@yahoo.co.uk', 'excel');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
`id` int(10) unsigned NOT NULL,
  `browser` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  `duration` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instcourses`
--
ALTER TABLE `instcourses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `instcourses`
--
ALTER TABLE `instcourses`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=254;
--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
