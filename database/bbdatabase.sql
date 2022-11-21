-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 02:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget_bbudget`
--

CREATE TABLE `budget_bbudget` (
  `budget_id` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `SMonth` varchar(30) DEFAULT NULL,
  `SYear` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category_bbudget`
--

CREATE TABLE `category_bbudget` (
  `category_name` varchar(30) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `limitS` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `SMonth` varchar(30) DEFAULT NULL,
  `SYear` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_bbudget`
--

INSERT INTO `category_bbudget` (`category_name`, `category_id`, `user_id`, `limitS`, `total`, `SMonth`, `SYear`) VALUES
('food', 0, 0, 100, 25, 'January', '2022'),
('cloth', 1, 0, 100, 40, 'January', '2022'),
('ultility', 2, 0, 100, 90, 'January', '2022'),
('transportation', 3, 0, 100, 75, 'January', '2022'),
('medial', 4, 0, 100, 59, 'January', '2022'),
('entertaiment', 5, 0, 100, 0, 'January', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `currentq`
--

CREATE TABLE `currentq` (
  `queue` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `typeof_user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currentq`
--

INSERT INTO `currentq` (`queue`, `user_id`, `typeof_user`) VALUES
(1, 0, 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `spending_bbudget`
--

CREATE TABLE `spending_bbudget` (
  `spending_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `costName` varchar(30) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `Samount` float DEFAULT NULL,
  `timeS` date DEFAULT NULL,
  `SDate` varchar(30) DEFAULT NULL,
  `SMonth` varchar(30) DEFAULT NULL,
  `SYear` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_bbudget`
--

CREATE TABLE `users_bbudget` (
  `user_name` varchar(30) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `nick_name` varchar(30) DEFAULT NULL,
  `typeof_user` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_bbudget`
--

INSERT INTO `users_bbudget` (`user_name`, `first_name`, `last_name`, `email`, `phone_number`, `nick_name`, `typeof_user`, `password`, `user_id`) VALUES
('guest', 'guest', 'guest', 'guest', 'guest', 'guest', 'reg', 'guest1', 0),
('maxstvq', 'Max', 'Nguyen', 'fftpnhan2246@gmail.com', '2365138761', 'maxstvq', 'reg', 'thiennhan', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget_bbudget`
--
ALTER TABLE `budget_bbudget`
  ADD PRIMARY KEY (`budget_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category_bbudget`
--
ALTER TABLE `category_bbudget`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `currentq`
--
ALTER TABLE `currentq`
  ADD PRIMARY KEY (`queue`);

--
-- Indexes for table `spending_bbudget`
--
ALTER TABLE `spending_bbudget`
  ADD PRIMARY KEY (`spending_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_bbudget`
--
ALTER TABLE `users_bbudget`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget_bbudget`
--
ALTER TABLE `budget_bbudget`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_bbudget`
--
ALTER TABLE `category_bbudget`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spending_bbudget`
--
ALTER TABLE `spending_bbudget`
  MODIFY `spending_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_bbudget`
--
ALTER TABLE `users_bbudget`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budget_bbudget`
--
ALTER TABLE `budget_bbudget`
  ADD CONSTRAINT `budget_bbudget_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_bbudget` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_bbudget`
--
ALTER TABLE `category_bbudget`
  ADD CONSTRAINT `category_bbudget_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_bbudget` (`user_id`);

--
-- Constraints for table `spending_bbudget`
--
ALTER TABLE `spending_bbudget`
  ADD CONSTRAINT `spending_bbudget_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_bbudget` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `spending_bbudget_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users_bbudget` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
