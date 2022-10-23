-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2022 at 08:35 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catlib`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `num` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `username`, `password`, `num`) VALUES
(1, 'James Edward', 'Mulle', 'james', 'james', '2020200'),
(2, 'Emmanuel', 'Nocedo', 'Emman', 'emman', '2147483647');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bnumber` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `vol` varchar(100) NOT NULL,
  `pages` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `year` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `bnumber`, `class`, `author`, `booktitle`, `edition`, `vol`, `pages`, `source`, `price`, `publisher`, `year`, `status`) VALUES
(1, '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13'),
(2, 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_info`
--

DROP TABLE IF EXISTS `borrowed_info`;
CREATE TABLE IF NOT EXISTS `borrowed_info` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `booktitle` varchar(255) NOT NULL,
  `approve` varchar(255) NOT NULL,
  `b_date` varchar(50) NOT NULL,
  `r_date` varchar(50) NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed_info`
--

INSERT INTO `borrowed_info` (`id`, `username`, `booktitle`, `approve`, `b_date`, `r_date`, `action`) VALUES
('8', 'james', 'Dressmaking, Technical-Vocational-Livehood Track: Home Economics Strand K to 12', '<p style=\"background-color: #67B35F;\">Available</p>', 'October 02, 2022', 'October 12, 2022', ''),
('8', 'james', 'Dressmaking, Technical-Vocational-Livehood Track: Home Economics Strand K to 12', '<p style=\"background-color: #67B35F;\">Available</p>', 'October 02, 2022', 'October 09, 2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `id` varchar(255) NOT NULL,
  `booktitle` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `first` varchar(50) NOT NULL,
  `last` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `booktitle`, `author`, `first`, `last`, `address`, `number`, `username`) VALUES
('8', 'Dressmaking, Technical-Vocational-Livehood Track: Home Economics Strand K to 12', 'Rondilla, Aida H.', 'James Edward', 'Mulle', 'Dulong Hernandez St. Catmon Malabon City', '2020200', 'james');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(50) NOT NULL,
  `last` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `num` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first`, `last`, `address`, `num`, `username`, `password`) VALUES
(1, 'James Edward', 'Mulle', 'Dulong Hernandez St. Catmon Malabon City', '2020200', 'james', 'james'),
(2, 'Sairah', 'Bernabe', 'Crazy Dave St.', '09123456789', 'peashooter', 'peashooter'),
(3, 'Sairah', 'Bernabe', 'Crazy Dave St.', '09123456789', 'peeshooter', 'peeshooter'),
(4, 'Emmanuel', 'Nocedo', 'Dulong Hernandez St. Catmon Malabon City', '2020200', 'emman', 'emman');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
