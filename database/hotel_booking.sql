-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 04:22 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int NOT NULL,
  `booking_id` varchar(200) DEFAULT NULL,
  `hotel_id` int DEFAULT NULL,
  `c_id` int DEFAULT NULL,
  `make_date` date DEFAULT NULL,
  `make_time` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` varchar(30) DEFAULT NULL,
  `booking_date2` date DEFAULT NULL,
  `booking_time2` varchar(30) DEFAULT NULL,
  `bill` float DEFAULT NULL,
  `transactionid` varchar(100) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0- reject, 1-confirmed',
  `reject` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `booking_id`, `hotel_id`, `c_id`, `make_date`, `make_time`, `name`, `phone`, `booking_date`, `booking_time`, `booking_date2`, `booking_time2`, `bill`, `transactionid`, `status`, `reject`) VALUES
(14, '636c7e204628c', 4, 17, '2022-11-10', '10:29:20am', 'subarna lohani', '9840390366', '2022-11-11', '10:00am', '2022-11-26', '10:00am', 1000, NULL, 0, 0),
(17, '636d285ab5ff2', 4, 17, '2022-11-10', '10:35:38pm', 'subarna', '9840390366', '2022-11-19', '10:00am', '2022-11-16', '10:00am', 2000, NULL, 0, 0),
(18, '63e45c5b774d2', 4, 17, '2023-02-09', '08:37:15am', 'subarna', '9840390366', '2023-02-09', '10:00am', '2023-02-10', '10:00am', 1000, NULL, 0, 0),
(19, '63e46273d0a6c', 4, 4, '2023-02-09', '09:03:15am', 'Crowny', '9869036420', '2023-02-09', '10:00am', '2023-02-09', '10:00am', 2500, NULL, 0, 0),
(20, '63e4629b72f01', 4, 4, '2023-02-09', '09:03:55am', 'Crowny', '9869036420', '2023-02-16', '10:00am', '2023-02-16', '10:00am', 2000, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking_room`
--

CREATE TABLE `booking_room` (
  `id` int NOT NULL,
  `booking_id` varchar(200) DEFAULT NULL,
  `room_id` int DEFAULT NULL,
  `qty` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_room`
--

INSERT INTO `booking_room` (`id`, `booking_id`, `room_id`, `qty`) VALUES
(14, '636c7cc955646', 18, 1),
(15, '636c7e204628c', 18, 1),
(16, '636d285ab5ff2', 18, 2),
(17, '63e45c5b774d2', 18, 1),
(18, '63e46273d0a6c', 18, 1),
(19, '63e46273d0a6c', 19, 1),
(20, '63e4629b72f01', 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE `hotel_info` (
  `id` int NOT NULL,
  `hotel_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `location` int NOT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `approve_status` int NOT NULL DEFAULT '0' COMMENT '0-not approve,1-approve ',
  `role` int DEFAULT NULL COMMENT '1 = restaurant, 2 = customer '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `hotel_name`, `email`, `phone`, `address`, `location`, `logo`, `password`, `approve_status`, `role`) VALUES
(4, 'Crowny', 'admin@gmail.com', '9869036420', 'Kalanki, Kathmandu', 1, 'park.jpg', 'Hello123', 0, 1),
(17, 'subarna', 'hello@gmail.com', '9840390366', 'kathmandu', 0, '', 'Hello123', 0, 2),
(18, 'Sanaski', 'hahaa@gmail.com', '9814511960', 'Shantinagar', 0, '', 'Kias98080', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int NOT NULL,
  `location_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`) VALUES
(1, 'Kathmandu'),
(2, 'Lalitpur'),
(3, 'Bhaktapur');

-- --------------------------------------------------------

--
-- Table structure for table `menu_room`
--

CREATE TABLE `menu_room` (
  `id` int NOT NULL,
  `hotel_id` int DEFAULT NULL,
  `item_name` varchar(200) DEFAULT NULL,
  `madeby` varchar(300) DEFAULT NULL,
  `food_type` varchar(100) NOT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_room`
--

INSERT INTO `menu_room` (`id`, `hotel_id`, `item_name`, `madeby`, `food_type`, `price`, `image`) VALUES
(18, 4, 'Single Room', 'Smoking<br>\r\nFree and unlimited Wi-Fi<br>\r\nBathtub, separate shower & care products<br>', 'Fast Food', 1000, 'singleroom.jpg'),
(19, 4, 'Double Room', 'Smoking<br>\r\nFree and unlimited Wi-Fi<br>\r\nBathtub, separate shower & care products<br>', 'Fast Food', 1500, 'doubleroom.jpg'),
(20, 4, 'King Room', 'Smoking<br>\r\nFree and unlimited Wi-Fi<br>\r\nBathtub, separate shower & care products', 'Fast Food', 2500, 'kingroom.jpg'),
(21, 4, 'Junior Suite', 'Smoking<br>\r\nFree and unlimited Wi-Fi<br>\r\nBathtub, separate shower & care products', 'Fast Food', 3000, 'jsuite.jpg'),
(22, 4, 'idk sth', 'xxxxxxxxxxxxxx', 'Fast Food', 2222, 'cr.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_room`
--
ALTER TABLE `menu_room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `booking_room`
--
ALTER TABLE `booking_room`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hotel_info`
--
ALTER TABLE `hotel_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu_room`
--
ALTER TABLE `menu_room`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
