-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2026 at 10:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaps_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `full_name` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL,
  `mob_num` varchar(16) DEFAULT NULL,
  `user_role` varchar(16) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `full_name`, `email`, `mob_num`, `user_role`, `status`) VALUES
(1, 'admin1', 'admin1', 'The Son', 'theson@gmail.com', NULL, 'admin', 'Active'),
(2, 'mod1', 'mod1', 'Tike Myson', 'tikemyson@gmail.com', '222222222222', 'moderator', 'Active'),
(3, 'business1', 'business1', 'Dobert Rowney Jr', 'dobertrowneyjr@gmail.com', '333333333333', 'business', 'Active'),
(4, 'member1', 'member1', 'Mat Ponahan', 'matponahan@gmail.com', NULL, 'member', 'Active'),
(5, 'admin2', 'admin2', 'Swiftlor Tay', 'swiftlortay@gmail.com', '555555555555', 'admin', 'Active'),
(6, 'mod2', 'mod2', 'Hom Tolland', 'homtolland@gmail.com', NULL, 'moderator', 'Active'),
(7, 'business2', 'business2', 'Hewis Lamilton', 'hewislamilton@gmail.com', NULL, 'business', 'Active'),
(8, 'member2', 'member2', 'Bichael Muble', 'bichaelmuble@gmail.com', '888888888888', 'member', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
