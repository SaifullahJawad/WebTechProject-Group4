-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 07:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c&c_dist_mgt_systm`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `aid` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `crop_picture` varchar(50) NOT NULL,
  `time_added` datetime NOT NULL DEFAULT current_timestamp(),
  `accepted_by` varchar(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`aid`, `product_name`, `quantity`, `price`, `crop_picture`, `time_added`, `accepted_by`, `user_id`) VALUES
(18, 'Carrots', 60, 45, 'carrots.jpg', '2020-12-31 16:00:41', 'none', 19),
(19, 'Chickpeas', 40, 70, 'chickpea.jpg', '2020-12-31 16:01:39', 'none', 19),
(31, 'Tractor', 0, 1000, 'tractor.jpg', '2021-01-02 03:00:51', 'none', 21),
(33, 'Harvester', 0, 600, 'harvester.jpg', '2021-01-02 04:53:56', 'none', 21),
(37, 'Corn', 67, 90, 'cornPicture.jpg', '2021-01-03 03:45:16', 'none', 19),
(38, 'Pesticide Sprayer', 0, 150, 'pesticideSprayer.jpg', '2021-01-03 14:47:59', 'none', 23),
(39, 'Tractor', 0, 800, 'tractor.jpg', '2021-01-03 14:52:06', 'none', 23),
(40, 'Chickpeas', 40, 90, 'chickpea.jpg', '2021-01-03 15:02:15', 'none', 24),
(41, 'Harvester', 0, 700, 'harvester.jpg', '2021-01-03 15:07:31', 'none', 23),
(42, 'Harvester', 0, 900, 'harvester.jpg', '2021-01-03 15:21:21', 'none', 25),
(43, 'Tractor', 0, 900, 'tractor.jpg', '2021-01-03 15:22:47', 'none', 25),
(44, 'Pesticide Sprayer', 0, 100, 'pesticideSprayer.jpg', '2021-01-03 15:23:36', 'none', 25),
(45, 'Carrots', 67, 90, 'carrots.jpg', '2021-01-03 15:29:31', 'none', 24),
(47, 'Wheat', 60, 25, 'wheatPicture.jpg', '2021-01-03 15:47:34', 'none', 24),
(48, 'Wheat', 45, 30, 'wheatPicture.jpg', '2021-01-03 16:51:27', 'none', 26);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_name` varchar(100) NOT NULL,
  `complaint_detail` text NOT NULL,
  `posted_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `farming_tips`
--

CREATE TABLE `farming_tips` (
  `id` int(11) NOT NULL,
  `headline` varchar(50) NOT NULL,
  `tips_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farming_tips`
--

INSERT INTO `farming_tips` (`id`, `headline`, `tips_details`) VALUES
(2, 'Some tips', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(3, 'Some other Tips', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(4, 'Some more tips', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `phone`, `gender`, `dob`, `picture`, `user_type`) VALUES
(19, 'Sayedul Islam', 'sayedul@gmail.com', 'Sayedul', '321', '01719580024', 'Male', '07/02/1969', 'farmer.png', 'farmer'),
(20, 'Tanzil Shohan', 'shohan@gmail.com', 'Shohan', '123', '01711112222', 'Male', '01/01/1998', 'Supplier.png', 'supplier'),
(21, 'Zahidul Hasan', 'zahid@gmail.com', 'Joy', '123', '01811112222', 'Male', '01/01/1998', 'equipmentRentee.png', 'rentee'),
(23, 'Moudud Ahmed', 'moudud@gmail.com', 'Moudud', '123', '01811112222', 'Male', '01/01/1984', 'equipmentRentee.png', 'rentee'),
(24, 'Ishmam Ahmed', 'ishmam@gmail.com', 'Ishmam', '123', '01811112222', 'Male', '01/02/1996', 'farmer.png', 'farmer'),
(25, 'Mahir Abrar', 'mahir@gmail.com', 'Mahir', '123', '01911112222', 'Male', '11/08/2005', 'equipmentRentee.png', 'rentee'),
(26, 'Saifullah Jawad', 'iamnafis.45@gmail.com', 'Jawad', '123', '01811112222', 'Male', '18/02/1996', 'farmer.png', 'farmer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `posted_by_user_id_fk` (`posted_by`);

--
-- Indexes for table `farming_tips`
--
ALTER TABLE `farming_tips`
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
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farming_tips`
--
ALTER TABLE `farming_tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`posted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
