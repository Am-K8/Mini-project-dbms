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
-- Database: `verify`
--

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

DROP TABLE IF EXISTS `registered_user`;
CREATE TABLE IF NOT EXISTS `registered_user` (
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passsword` varchar(100) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int NOT NULL DEFAULT '0',
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`full_name`, `username`, `email`, `passsword`, `verification_code`, `is_verified`, `resettoken`, `resettokenexpire`) VALUES
('lilly', 'kk0708', 'komalcambe@gmail.com', '$2y$10$OKOEOvCoHNqdIVf/DA.oseETamA/xDeyPNkovWgG4Q21/eBfjVL36', 'de709e46bfef881030ebab934a15aa9f', 1, NULL, NULL),
('lilly', 'lilly040', 'chandranathambe@gmail.com', '$2y$10$tJNcJqSgnEV7HHDcY46CSuvyshrNotirFpx39yxqHnSvratggXKhe', '01a44fc0101f54237afd3273c7a4f91b', 0, NULL, NULL),
('lilly', 'www0405', 'princessofthieves18@gmail.com', '$2y$10$ZWne1SkUtukgcO5losaQE.w6BC1tbrDhJpXcg4F7t5DTf5SPjIyfW', '46fd4b3dfad8f3d6cecbadca0ba2bf2a', 1, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
