-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 11, 2025 at 02:49 PM
-- Server version: 8.2.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expanse`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` enum('income','expense') NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `user_id`) VALUES
(1, 'Gaji Bulanan', 'income', NULL),
(2, 'Bonus Proyek', 'income', NULL),
(3, 'Makan Harian', 'expense', NULL),
(4, 'Transportasi', 'expense', NULL),
(5, 'Belanja Online', 'expense', NULL),
(6, 'Gaji Bulanan', 'income', 1),
(7, 'Bonus', 'income', 1),
(8, 'Makan Harian', 'expense', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
CREATE TABLE IF NOT EXISTS `expense` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `description` text,
  `transaction_date` date NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `user_id`, `category_id`, `amount`, `description`, `transaction_date`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 50000.00, 'Sarapan dan makan siang', '2025-07-02', '2025-07-11 21:48:06', '2025-07-11 21:48:06'),
(2, 1, 4, 30000.00, 'Naik ojek ke kantor', '2025-07-03', '2025-07-11 21:48:06', '2025-07-11 21:48:06'),
(3, 1, 5, 150000.00, 'Beli barang di Tokopedia', '2025-07-04', '2025-07-11 21:48:06', '2025-07-11 21:48:06'),
(4, 2, 3, 45000.00, 'Makan siang', '2025-07-02', '2025-07-11 21:48:06', '2025-07-11 21:48:06'),
(5, 1, 8, 1000.00, 'makan', '2025-07-06', '2025-07-11 21:48:08', '2025-07-11 21:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
CREATE TABLE IF NOT EXISTS `income` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `description` text,
  `transaction_date` date NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `user_id`, `category_id`, `amount`, `description`, `transaction_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5000000.00, 'Gaji bulan Juli', '2025-07-01', '2025-07-11 21:47:11', '2025-07-11 21:47:11'),
(2, 1, 2, 1000000.00, 'Bonus dari proyek A', '2025-07-05', '2025-07-11 21:47:11', '2025-07-11 21:47:11'),
(3, 2, 1, 4500000.00, 'Gaji Agus bulan Juli', '2025-07-01', '2025-07-11 21:47:11', '2025-07-11 21:47:11'),
(4, 1, 7, 20000.00, 'fee', '2025-07-07', '2025-07-11 21:47:19', '2025-07-11 21:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `remember_tokens`
--

DROP TABLE IF EXISTS `remember_tokens`;
CREATE TABLE IF NOT EXISTS `remember_tokens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `token` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `type` enum('income','expense') NOT NULL,
  `transaction_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL,
  `description` text,
  `transaction_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `type`, `transaction_id`, `category_id`, `amount`, `description`, `transaction_date`) VALUES
(1, 1, 'income', 1, 1, 5000000.00, 'Gaji bulan Juli', '2025-07-01'),
(2, 1, 'income', 2, 2, 1000000.00, 'Bonus dari proyek A', '2025-07-05'),
(3, 2, 'income', 3, 1, 4500000.00, 'Gaji Agus bulan Juli', '2025-07-01'),
(4, 1, 'expense', 1, 3, 50000.00, 'Sarapan dan makan siang', '2025-07-02'),
(5, 1, 'expense', 2, 4, 30000.00, 'Naik ojek ke kantor', '2025-07-03'),
(6, 1, 'expense', 3, 5, 150000.00, 'Beli barang di Tokopedia', '2025-07-04'),
(7, 2, 'expense', 4, 3, 45000.00, 'Makan siang', '2025-07-02'),
(8, 1, 'income', 4, 7, 20000.00, 'fee', '2025-07-07'),
(9, 1, 'expense', 5, 8, 1000.00, 'makan', '2025-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$J3hNPO6PlwyQKbOWrjbMAeqpgZ8GXN5yD2kews1IrmXrMPkTYN0iG', 'user', '2025-06-14 11:33:36', NULL),
(5, 'asdasdasd', 'asdasd', 'sadasd@gmail.com', '$2y$10$zjbuuqAOmOZM8KJTG9WNYuSwBeySo2dnKFc7ti.pVDOd23aa3b74K', 'user', '2025-07-09 20:42:30', NULL),
(6, 'imam', 'gumay', 'imam@gmail.com', '$2y$10$uRdyr6jSUbPlvQQu21Za.O3QzLuKkQuFkW1yA/nhC/jB80HjhCbr2', 'user', '2025-07-09 20:43:22', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `remember_tokens`
--
ALTER TABLE `remember_tokens`
  ADD CONSTRAINT `remember_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
