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
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(15, 'Instagram'),
(16, 'GOI'),
(6, 'Meta'),
(7, 'Koo');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_title` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(13, 'GOI'),
(12, 'music'),
(10, 'Social Media');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `payment` int NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`, `link`, `payment`) VALUES
(29, 'DigiLocker', 'DigiLocker aims to provide a Digital wallet to every citizen so that all lifelong documents', 'Government', 13, 16, 'dl1.jpg', 'dl2.jpg', 'dl3.jpg', '10', '2023-11-15 08:00:29', 'true', 'https://www.google.com/search?kgmid=/m/012vp98b&hl=en-IN&q=DigiLocker&kgs=969297dec08eaaac&shndl=0&source=sh/x/kp/m1/1', 1),
(28, 'Koo', 'Koo is an Indian microblogging and social networking service', 'Social Media', 10, 7, 'k1.jpg', 'k2.jpg', 'k3.jpg', '200', '2023-11-15 07:50:30', 'true', 'https://www.kooapp.com/', 1),
(27, 'Whatsapp', 'Whatsapp is a very user-friendly, end to end encrypted chat features, enjoyyyy', 'Chat', 10, 6, 'w1.jpg', 'w2.jpg', 'w3.jpg', '800', '2023-11-15 07:48:04', 'true', 'https://www.whatsapp.com/', 1),
(24, 'Spotify', 'Spotify is a digital music, podcast, and video service that gives you access to millions of songs', 'Spotify', 12, 6, 'spotify.jpg', 's2.jpg', 's3.jpg', '200', '2023-11-15 07:35:11', 'true', 'https://open.spotify.com/', 1),
(30, 'duo', 'duo', 'learn', 13, 16, 'd1.jpg', 'd2.jpg', 'd3.jpg', '100', '2023-11-15 10:13:23', 'true', 'gsdh', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
