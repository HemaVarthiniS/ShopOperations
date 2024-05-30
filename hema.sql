-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2024 at 03:17 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hema`
--

-- --------------------------------------------------------

--
-- Table structure for table `cus`
--

DROP TABLE IF EXISTS `cus`;
CREATE TABLE IF NOT EXISTS `cus` (
  `cusid` int NOT NULL,
  `cusname` varchar(20) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `phone` double NOT NULL,
  `add` varchar(100) NOT NULL,
  `cre` int NOT NULL,
  `bal` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cus`
--

INSERT INTO `cus` (`cusid`, `cusname`, `gen`, `phone`, `add`, `cre`, `bal`) VALUES
(1, 'Hema', 'Female', 7708145488, 'Municahalai', 1000, 0),
(4, 'Kannika', 'Female', 8897876566, 'Anna Nagar,Madurai', 1000, 0),
(3, 'Nitheesh', 'Male', 8760292750, 'KuyavarPalayam', 1000, 0),
(5, 'Ravi', 'Male', 7708326294, 'Ismailpuram,Maduri', 700, 0),
(6, 'Latha', 'Female', 6786754344, 'Ismailpuram', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('selvaraj', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pro`
--

DROP TABLE IF EXISTS `pro`;
CREATE TABLE IF NOT EXISTS `pro` (
  `category` varchar(20) NOT NULL,
  `pno` int NOT NULL,
  `pname` varchar(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `whosupply` varchar(20) NOT NULL,
  `unitprice` int NOT NULL,
  PRIMARY KEY (`pno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pro`
--

INSERT INTO `pro` (`category`, `pno`, `pname`, `unit`, `whosupply`, `unitprice`) VALUES
('', 1, 'Basumathi', '', '', 100),
('rice', 2, 'Ponni', 'Kilogram', 'Kumar', 120),
('oil', 3, 'Mustad Oil', 'Litre', 'Kumar', 180),
('oil', 6, 'Groundnut oil', 'Litre', 'mani', 120);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `pdate` date NOT NULL,
  `prono` int NOT NULL,
  `proname` varchar(200) NOT NULL,
  `quan` int NOT NULL,
  `uprice` int NOT NULL,
  `tprice` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`pdate`, `prono`, `proname`, `quan`, `uprice`, `tprice`) VALUES
('2024-04-28', 1, 'Basumathi', 3, 100, 300),
('2024-04-28', 1, 'Basumathi', 3, 100, 300),
('2024-05-03', 3, 'Mustad Oil', 4, 180, 720);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `sdate` date NOT NULL,
  `cname` varchar(200) NOT NULL,
  `pno` int NOT NULL,
  `pname` varchar(200) NOT NULL,
  `qua` int NOT NULL,
  `uprice` int NOT NULL,
  `tprice` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sdate`, `cname`, `pno`, `pname`, `qua`, `uprice`, `tprice`) VALUES
('0000-00-00', '', 1, 'Basumathi', 0, 0, 0),
('0000-00-00', '', 1, 'Basumathi', 0, 0, 0),
('0000-00-00', 'Hema', 1, 'Basumathi', 4, 100, 400),
('0000-00-00', 'Hema', 1, 'Basumathi', 7, 100, 700),
('2024-04-28', 'Hema', 1, 'Basumathi', 8, 100, 800),
('2024-05-03', 'Hema', 3, 'Mustad Oil', 2, 180, 360);

-- --------------------------------------------------------

--
-- Table structure for table `sup`
--

DROP TABLE IF EXISTS `sup`;
CREATE TABLE IF NOT EXISTS `sup` (
  `sid` int NOT NULL,
  `sname` varchar(20) NOT NULL,
  `phone` double NOT NULL,
  `address` varchar(100) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `product` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sup`
--

INSERT INTO `sup` (`sid`, `sname`, `phone`, `address`, `gst`, `product`) VALUES
(1, 'Kandhan', 8989098766, 'Amman Sanathi', 'xyz678', 'Rice'),
(4, 'Saravana', 8898876566, 'Keela Mart Veethi,Madurai', 'abc567', 'Mustard Oil'),
(3, 'Kumar', 8897867866, 'Swamy Sanathi', 'abc345', 'flour');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
