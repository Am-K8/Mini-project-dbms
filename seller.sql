-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2024 at 06:21 PM
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
-- Database: `seller`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `unique_ID` varchar(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `is_verified` int NOT NULL,
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`unique_ID`, `fname`, `lname`, `email`, `phone`, `password`, `image`, `verification_code`, `is_verified`, `resettoken`, `resettokenexpire`) VALUES
('1320037222', 'Komal', 'Ambe', 'princessofthieves18@gmail.com', 2147483647, '$2y$10$6FbnG4sWFEuDGxtGI3fHi.bwS1qkLX2tHkzuybz8p1ilySp2ZCNdW', '', 'd84ea8d2b5108c3376fc0e092d8ca5f5', 1, NULL, NULL),
('1685862318', 'Komal', 'Ambe', 'komalcambe@gmail.com', 2147483647, '$2y$10$9Wspc9D/2fKq9NiAWBpcVulGj7jxoeAq3e0Z.N0HukZ5MTDLgfL1e', '', 'a32152d0169c6488d34eb91adbf5dfb4', 1, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
