-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2016 at 04:04 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `electromer`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `fullname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `fullname`) VALUES
('acc1', '123', 'someOne'),
('acc2', '123', 'someOne2'),
('acc3', '123', 'someOne3'),
('acc4', '123', 'someOne4'),
('acc5', '123', 'someOne5');

-- --------------------------------------------------------

--
-- Table structure for table `electrometer`
--

CREATE TABLE IF NOT EXISTS `electrometer` (
`id` int(11) NOT NULL,
  `dayRateValue` double unsigned DEFAULT NULL,
  `nightRateValue` double DEFAULT '0',
  `insert_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `electrometer`
--

INSERT INTO `electrometer` (`id`, `dayRateValue`, `nightRateValue`, `insert_date`) VALUES
(1, 12313131.12, 1412, '2016-03-11'),
(2, 1232131313, 12235235423, '0000-00-00'),
(3, 1232131313, 23423424, '2016-03-22'),
(8, 123131.34, 1231231.12, '0000-00-00'),
(12, 1231231.24, 2424242.23, '0000-00-00'),
(13, 12313212321.23, 1232132323.34, '0000-00-00'),
(23, 23234242.23, 234234242.44, '0000-00-00'),
(24, 23234242.23, 234234242.44, '0000-00-00'),
(25, 123123000, 1.2313112312312232e16, '0000-00-00'),
(26, 0, 1231, '0000-00-00'),
(27, 0, 345, '0000-00-00'),
(28, 0, 789, '0000-00-00'),
(29, 0, 444, '0000-00-00'),
(32, 0, 222, '0000-00-00'),
(33, 0, 444, '0000-00-00');

--
-- Triggers `electrometer`
--
DELIMITER //
CREATE TRIGGER `electrometer` BEFORE INSERT ON `electrometer`
 FOR EACH ROW SET NEW.dayRateValue = 
    IF(NEW.dayRateValue < 0,0, TRUNCATE(NEW.dayRateValue,-3))
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) unsigned NOT NULL,
  `first_name` char(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_name` char(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `dayValueRate` float NOT NULL,
  `nightValueRate` float NOT NULL,
`id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='showing rates for energy';

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`dayValueRate`, `nightValueRate`, `id`, `date`) VALUES
(10, 20, 1, '0000-00-00'),
(30, 40, 2, '0000-00-00'),
(30, 20, 3, '0000-00-00'),
(20, 30, 4, '0000-00-00'),
(30, 40, 6, '0000-00-00'),
(222222, 333333, 7, '0000-00-00'),
(333333, 222222, 8, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) NOT NULL,
  `role` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'guest'),
(2, 'admin'),
(3, 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `fname` varchar(10) NOT NULL DEFAULT '',
  `lname` varchar(20) NOT NULL DEFAULT '',
  `age` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `fname`, `lname`, `age`) VALUES
(1, 'angel', '1a1dc91c907325c69271ddf0c944bc72', 3, 'angel', 'flag', 22),
(2, 'ivan', '', 3, 'ivan', 'petrov', 22),
(3, 'peter', '35af4bf130805f0b86b1b13e49c8101e', 3, 'petar', 'velev', 22),
(4, 'angel', '1a1dc91c907325c69271ddf0c944bc72', 1, 'Angel', 'Angelov', 444),
(5, 'test', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Test', 'Testov', 12),
(6, 'asdf', '912ec803b2ce49e4a541068d495ab570', 1, 'asdf', 'asdf', 3),
(7, 'asdfasdfasdf', 'a95c530a7af5f492a74499e70578d150', 1, 'asdfasdfdf', 'asdfasdfasdf', 55),
(8, 'Koceto', '21232f297a57a5a743894a0e4a801fc3', 1, 'Kostadin', 'Voivoda', 25),
(9, 'test4', 'e10adc3949ba59abbe56e057f20f883e', 1, 'test', 'test', 5),
(10, 'test5', '912ec803b2ce49e4a541068d495ab570', 1, 'test5', 'test5', 5),
(11, 'test6', '4cfad7076129962ee70c36839a1e3e15', 1, 'test6', 'test6', 444),
(12, 'DDDD', '', 0, 'DDD', 'DDDD', 4),
(13, 'ttt', '', 0, 'ttt', 'ttt', 10),
(14, 'asdfasdfasfdasfasdf', 'd0b1f51cbb7cd78f8e0241a626963f7b', 1, 'asdf', 'asdf', 33),
(15, 'angel', '1a1dc91c907325c69271ddf0c944bc72', 1, '', '', 0),
(16, 'angel', '1a1dc91c907325c69271ddf0c944bc72', 1, '', '', 0),
(17, 'angel', '1a1dc91c907325c69271ddf0c944bc72', 1, '', '', 0),
(18, 'angel', '1a1dc91c907325c69271ddf0c944bc72', 1, '', '', 0),
(19, 'angel', '1a1dc91c907325c69271ddf0c944bc72', 1, '', '', 0),
(20, 'angel', '1a1dc91c907325c69271ddf0c944bc72', 1, '', '', 0),
(21, '4444', 'dbc4d84bfcfe2284ba11beffb853a8c4', 1, '4444', '4444', 44),
(22, 'qwerqwer', 'd74682ee47c3fffd5dcd749f840fcdd4', 1, 'qwerqwer', 'qwerqwre', 33),
(23, 'tgbtgb', '2a25bd1be01ceaa679ce4590d45aee35', 3, 'tgbtgb', 'tgbtgb', 44),
(24, 'wsx', 'af83f787e8911dea9b3bf677746ebac9', 7, 'wsx', 'wsx', 33),
(25, 'Bojidar', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'Bojidar', 'Dimitrov', 20),
(26, 'proba', 'c0a8e1e5e307cc5b33819b387b5f01fd', 0, 'proba', 'proba', 22),
(27, 'Dragan', '8277e0910d750195b448797616e091ad', 3, 'dragan', 'petkov', 22),
(28, 'Boyan', '81dc9bdb52d04dc20036dbd8313ed055', 3, 'Boyan', 'Naidenov', 22),
(29, 'Kostadin', '81dc9bdb52d04dc20036dbd8313ed055', 2, 'Kostadin', 'Voivoda', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `electrometer`
--
ALTER TABLE `electrometer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `electrometer`
--
ALTER TABLE `electrometer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
