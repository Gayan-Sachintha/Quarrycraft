-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2023 at 01:04 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quarrycraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `email` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `Name`, `Price`, `email`, `path`) VALUES
(1, 'we', 'R.s.20000/=', '', 'uploads/6mm pipe.jpg'),
(2, 'we', 'R.s.20000/=', '', 'uploads/6mm pipe.jpg'),
(3, 'meka ', 'sd', '', 'uploads/6mm pipe.jpg'),
(4, 'mekath oine', 'R.s.32500/=', '', 'uploads/1.5 inch crusher run stone.jpg'),
(5, 'mekath oine', 'R.s.32500/=', '', 'uploads/1.5 inch crusher run stone.jpg'),
(6, 'ahmhmhm', 'dtd', '', 'uploads/1.5 inch crusher run stone.jpg'),
(7, 'meka ', 'sd', '', 'uploads/6mm pipe.jpg'),
(8, 'meka ', 'sd', '', 'uploads/6mm pipe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Path` varchar(500) NOT NULL,
  `Post` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Email`, `Name`, `Price`, `Path`, `Post`) VALUES
(12, 'admin@gmail.com', 'meka ', 'sd', 'uploads/6mm pipe.jpg', 1),
(14, 'admin@gmail.com', ' coockie', 'dtd', 'uploads/1.5 inch crusher run stone.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Fullname` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cnumber` int NOT NULL,
  `Password` varchar(50) NOT NULL,
  `utype` varchar(10) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Fullname`, `Email`, `Cnumber`, `Password`, `utype`) VALUES
('Robert', 's@gmail.com', 33355533, '1111', 'customer'),
('admin', 'admin@gmail.com', 1234, '1111', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
