-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 11:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oun`
--

-- --------------------------------------------------------

--
-- Table structure for table `babysitter`
--

CREATE TABLE `babysitter` (
  `name` varchar(20) NOT NULL,
  `national_ID` int(10) NOT NULL,
  `phoneNo` int(10) NOT NULL,
  `password` varchar(128) NOT NULL,
  `gender` enum('Female','Male') NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `sitter_image` varchar(500) NOT NULL DEFAULT 'images\\prpic.png',
  `average_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `babysitter`
--

INSERT INTO `babysitter` (`name`, `national_ID`, `phoneNo`, `password`, `gender`, `age`, `email`, `city`, `bio`, `sitter_image`, `average_rate`) VALUES
('lama', 1118954211, 561111111, '202cb962ac59075b964b07152d234b70', 'Female', 24, 'lama@gmail.com', 'riyadh', 'bachelor in education, 2 years in experience', 'prpic.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(10) NOT NULL,
  `request_id` int(10) NOT NULL,
  `offer_id` int(10) NOT NULL,
  `review` varchar(500) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `request_id`, `offer_id`, `review`, `rating`) VALUES
(28, 25, 22, NULL, NULL),
(29, 28, 24, NULL, NULL),
(30, 36, 28, NULL, NULL),
(31, 37, 29, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(10) NOT NULL,
  `babysitter_id` int(10) NOT NULL,
  `request_id` int(10) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `babysitter_id`, `request_id`, `price`, `status`) VALUES
(22, 1118954211, 25, 44, 'a'),
(24, 1118954211, 28, 80, 'a'),
(28, 1118954211, 36, 100, 'a'),
(29, 1118954211, 37, 25, 'a'),
(30, 1118954211, 38, 40, 'r');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(10) NOT NULL,
  `parent_image` varchar(500) DEFAULT 'prpic.png',
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `buildingNo` varchar(20) DEFAULT NULL,
  `phoneNo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `parent_image`, `name`, `email`, `password`, `city`, `district`, `street`, `buildingNo`, `phoneNo`) VALUES
(4, 'prpic.png', 'nesreen', 'nesreen@gmail.com', '202cb962ac59075b964b07152d234b70', 'riyadh', 'alyasmeen', 'T.B.O', '19A', 568585559);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(10) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `numOfKids` int(11) NOT NULL,
  `kid_name` varchar(100) NOT NULL,
  `kid_age` varchar(11) NOT NULL,
  `service_type` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `parent_id`, `numOfKids`, `kid_name`, `kid_age`, `service_type`, `date`, `start_time`, `end_time`) VALUES
(25, 4, 1, 'haifa', '10', 'cooking', '2022-11-09', '02:00:00', '06:00:00'),
(28, 4, 1, 'hisham hamad', '10', 'babysitting', '2022-11-09', '22:10:00', '12:10:00'),
(36, 4, 1, 'arwa', '3', 'babysitting', '2022-11-09', '22:58:00', '23:58:00'),
(37, 4, 1, 'munira', '3', 'tutoring', '2022-11-10', '23:03:00', '12:03:00'),
(38, 4, 1, 'huda', '2', 'cooking', '2022-11-24', '12:03:00', '13:03:00'),
(39, 4, 2, 'noura, sara', '2,5', 'tutoring', '2022-11-10', '12:52:00', '15:52:00'),
(40, 4, 2, 'sultan, abdullah', '2,5', 'babysitting', '2022-11-11', '13:59:00', '13:59:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `babysitter`
--
ALTER TABLE `babysitter`
  ADD PRIMARY KEY (`national_ID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `order_id` (`request_id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `babysitter_id` (`babysitter_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`offer_id`);

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`babysitter_id`) REFERENCES `babysitter` (`national_ID`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `request` (`request_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
