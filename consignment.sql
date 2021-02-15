-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 09:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `booking_no` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `length` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_of_booking` varchar(100) NOT NULL,
  `date_of_delivery` varchar(100) DEFAULT NULL,
  `cancelled_date` varchar(100) DEFAULT NULL,
  `cancelled_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment`
--

INSERT INTO `shipment` (`id`, `user_id`, `booking_no`, `email`, `full_name`, `phone`, `origin`, `destination`, `service`, `weight`, `height`, `length`, `width`, `subject`, `status`, `date_of_booking`, `date_of_delivery`, `cancelled_date`, `cancelled_by`) VALUES
(21, 'acha84544', 'RCC2390acha845441379038', 'achawayne@gmail.com', 'acha chiemeil', '4556666', 'abuja', 'enugu', 'normal', '22', '21', '21', '21', 'xbnxzbnxbnx', 'cancelled', '1611767395', 'null', '1/28/2021', 'self'),
(22, 'acha84544', 'RCC2390acha845442662260', 'achawayne@gmail.com', 'acha chiemeil', '4556666', 'lagos', 'abuja', 'normal', '45', '344', '433', '433', 'xchb jb kjds', 'unapproved', '1611815210', NULL, NULL, NULL),
(23, 'acha84544', 'RCC2390acha845443874853', 'achawayne@gmail.com', 'acha chiemeil', '4556666', 'abuja', 'enugu', 'normal', '334', '32', '3322', '333', 'nmc cn mxc x xm', 'unapproved', '1611816298', NULL, NULL, NULL),
(24, 'acha84544', 'RCC2390acha845446218672', 'achawayne@gmail.com', 'acha chiemeil', '4556666', 'enugu', 'lagos', 'normal', '36', '636', '737', '737', 'bnc hdhcsjhcjds', 'unapproved', '1611860249', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date_of_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `date_of_reg`) VALUES
(8, 'acha84544', 'acha', 'chiemeil', 'achawayne@gmail.com', '$2y$10$x/XZ394IN5WKwL.Qj1YB6eyZqAfxFGDrHzf28TmxmATjiKkWiCrhm', '4556666', '2021-01-26 21:57:34'),
(9, 'maka28916', 'maka', 'veli', 'makaveli@gmail.com', '$2y$10$k.y/yU8/cQilLwi2abyhdePFmZWGpg7u.dKcp/nnt.HIxFMDhoZ.2', '7474757755', '2021-01-26 21:58:44'),
(10, 'amaka96139', 'amaka', 'sohia', 'amakasophia@gmail.com', '$2y$10$X99djKNdj9/toT/hlsXXSuG7OXqOWGdvskeonR0Xgbo7WrePdrK4a', '878748488', '2021-01-26 22:01:27'),
(11, 'amaka40503', 'amaka', 'sohia', 'amakasophia4@gmail.com', '$2y$10$yjctN5V90SgWi2iUS6NH7uOKMLk9xseZyF8TXAamde.XMZYvQBYnC', '878748488', '2021-01-26 22:02:00'),
(12, 'amaka89503', 'amaka', 'sohia', 'amakasophia44@gmail.com', '$2y$10$i0MdYwBy8xAbY9RKnm79deZIHANbDsl5.zPJCKSh/M9fthTNip7Au', '878748488', '2021-01-26 22:02:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
