-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2023 at 07:13 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `property_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `property_area` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `property_prize` varchar(50) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `property_name`, `property_area`, `property_prize`, `image`, `status`, `created_date`, `modify_date`) VALUES
(7, 13, 'Birla House', 'Zirkpur', '1000000000', 'WhatsApp Image 2022-11-10 at 07.06.05 (2).jpeg', 0, '2023-02-01 11:22:55', '2023-02-01 11:22:55'),
(8, 13, 'Near House', 'Mohali', '1000000000', 'thumb-1920-614751.jpeg', 0, '2023-02-01 11:26:03', '2023-02-01 11:26:03'),
(9, 13, 'Abhishek House ', 'Punjab', '20000000000', 'WhatsApp Image 2022-11-10 at 07.06.05 (4).jpeg', 0, '2023-02-01 11:26:42', '2023-02-01 11:26:42'),
(10, 13, 'Apna Makan', 'Zirkpur', '1000000000', 'thumb-1920-614751.jpeg', 0, '2023-02-01 11:27:06', '2023-02-01 11:27:06'),
(11, 13, 'Deepu House', 'ChandiGarch', '10000000', 'WhatsApp Image 2022-11-10 at 07.06.05 (2).jpeg', 0, '2023-02-01 13:35:28', '2023-02-01 13:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `property_comments`
--

CREATE TABLE `property_comments` (
  `id` int NOT NULL,
  `property_id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifie_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `property_comments`
--

INSERT INTO `property_comments` (`id`, `property_id`, `user_id`, `user_name`, `comments`, `create_date`, `modifie_date`) VALUES
(1, 7, 11, '', 'nice', '2023-02-01 12:38:55', '2023-02-01 12:38:55'),
(2, 7, 11, '', 'nice', '2023-02-01 12:41:32', '2023-02-01 12:41:32'),
(3, 7, 11, '', 'good', '2023-02-01 12:43:31', '2023-02-01 12:43:31'),
(4, 7, 11, 'abhishek', 'good', '2023-02-01 13:03:07', '2023-02-01 13:03:07'),
(5, 8, 11, 'abhishek', 'nice', '2023-02-01 13:03:31', '2023-02-01 13:03:31'),
(6, 7, 15, 'Amit', 'good place', '2023-02-01 13:39:32', '2023-02-01 13:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `status` int NOT NULL,
  `image` varchar(50) NOT NULL,
  `created_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `modified_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `status`, `image`, `created_date`, `modified_date`) VALUES
(10, 'sachin@gmail.com', '123456', 'user', 0, 'WhatsApp Image 2022-11-10 at 07.06.05 (4).jpeg', '2023-01-31 07:14:39.633163', '2023-01-31 07:14:39.633163'),
(11, 'abhisheck@gmail.com', '$2y$10$OpJ2Fm.8n8wrOOgOg0TP5OxhwmgxNQY8YDaoLNTb5smTnhsNtJpZm', 'user', 0, 'Screenshot from 2022-11-30 15-21-35.png', '2023-01-31 07:25:18.217116', '2023-01-31 07:25:18.217116'),
(13, 'admin1@gmail.com', '$2y$10$bCMfXmZD2Yi0qtwmZU.KMuEEXu5V1ecRRDdjo/7jeduZXTXU7OA7u', 'admin', 0, 'thumb-1920-614751.jpeg', '2023-01-31 09:00:20.738917', '2023-01-31 09:00:20.738917'),
(14, 'gour@gmail.com', '$2y$10$BsLaRyQuw.GXv5ZT5EAtgOdGU6GaWaK1EE24ye1taNKwcdKXqaDYy', 'user', 0, 'naruto1.jpg', '2023-01-31 11:49:43.185070', '2023-01-31 11:49:43.185070'),
(15, 'amit@gmail.com', '$2y$10$xPPyufL6qkx54Nb3i//6kONeIIfBWtRQGkuh5be0orZhXpIoo2WCu', 'user', 0, 'WhatsApp Image 2022-11-10 at 07.06.05 (4).jpeg', '2023-02-01 13:37:55.689255', '2023-02-01 13:37:55.689255');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `first_name`, `last_name`, `contact`, `address`, `create_date`, `modified_date`) VALUES
(3, 10, 'sachin', 'kumar', '7894561235', '316 Abheypur', '2023-01-31 07:14:39', '2023-01-31 07:14:39'),
(4, 11, 'abhishek', 'kumar', '7894561323', '316 Abheypur', '2023-01-31 07:25:18', '2023-01-31 07:25:18'),
(6, 13, 'admin', 'gour', '123456789456', '316 Abheypur', '2023-01-31 09:00:20', '2023-01-31 09:00:20'),
(7, 14, 'deepu', 'kumar', '7894561235', '316 Abheypur', '2023-01-31 11:49:43', '2023-01-31 11:49:43'),
(8, 15, 'Amit', 'gour', '1234567894', 'Mohali', '2023-02-01 13:37:55', '2023-02-01 13:37:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`user_id`);

--
-- Indexes for table `property_comments`
--
ALTER TABLE `property_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `comment_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `property_comments`
--
ALTER TABLE `property_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `property_comments`
--
ALTER TABLE `property_comments`
  ADD CONSTRAINT `comment_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `property_id` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
