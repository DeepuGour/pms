-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2023 at 06:24 PM
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
(17, 'gdeepu@teqmavens.com', '$2y$10$Ukgc.cZ2g.TzR.fU8GiOQO8JWk1v3/688qTHlIPXx6r1BZz/ToZqW', 'admin', 1, 'person_2.jpg', '2023-02-02 05:38:52.548552', '2023-02-02 05:38:52.548552'),
(18, 'admin@gmail.com', '$2y$10$cr6L6NXIwDKYYlLJ4YSV2eBTLszKqYgFxC7IkzPEM4M7cshm4IdWi', 'user', 1, 'thumb-1920-614751.jpeg', '2023-02-02 10:25:42.410781', '2023-02-02 10:25:42.410781'),
(19, 'abhisheck@gmail.com', '$2y$10$.dcYutMrVaCoNlpo4cF51uFbReNt8FUMLmA3zBe0LPDA9gzAzXj6C', 'user', 1, 'team-6.jpg', '2023-02-02 11:20:50.471422', '2023-02-02 11:20:50.471422'),
(20, 'deep@gmail.com', '$2y$10$Fnr5iqlYpUPBy3gd5Z.KHO1UXn8EnZ51ZqaDPjGcyIj9ZFRRyG5Li', 'user', 1, 'person_1.jpg', '2023-02-02 11:36:22.758951', '2023-02-02 11:36:22.758951');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
