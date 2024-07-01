-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 01:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resevation`
--

-- --------------------------------------------------------

--
-- Table structure for table `cottage/hall`
--

CREATE TABLE `cottage/hall` (
  `id` int(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `actual_no` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `max_person` int(250) NOT NULL,
  `price` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cottage/hall`
--

INSERT INTO `cottage/hall` (`id`, `img`, `actual_no`, `name`, `type`, `category`, `max_person`, `price`) VALUES
(2, 'uploads/small-cottage-18.jpg', '01', 'this is cottage name', 'Cottage', '1st Class', 12, 300);

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id` int(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `desc` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id`, `img`, `name`, `desc`) VALUES
(12, 'uploads/crimson-resort-spa-mactan-workshop-and-training-event-space-cebu-philippines-medium.jpg', 'sample', 'this is sample description'),
(13, 'uploads/crimson-resort-spa-mactan-workshop-and-training-event-space-cebu-philippines-medium.jpg', 'sample', 'this is sample description'),
(10, 'uploads/crimson-resort-spa-mactan-workshop-and-training-event-space-cebu-philippines-medium.jpg', 'sample', 'sample'),
(11, 'uploads/crimson-resort-spa-mactan-workshop-and-training-event-space-cebu-philippines-medium.jpg', 'sample', 'this is sample description'),
(14, 'uploads/small-cottage-18.jpg', 'sample', 'sample'),
(15, 'uploads/images.jpg', 'this is name sample', 'this is description sample');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(250) NOT NULL,
  `cust_id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `cust_id`, `name`, `description`) VALUES
(1, 0, 'sample name', 'good experience nice place');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(250) NOT NULL,
  `transaction_id` int(250) NOT NULL,
  `ammount_payment` int(250) NOT NULL,
  `payment_status` varchar(250) NOT NULL,
  `ref_no` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `transaction_id`, `ammount_payment`, `payment_status`, `ref_no`) VALUES
(1, 1197077060, 476, 'Fullypaid', 'sample12345');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `des` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `img`, `name`, `des`) VALUES
(6, 'uploads/3-1.jpg', 'sample', 'sample'),
(7, 'uploads/7-1.jpg', 'sample', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(250) NOT NULL,
  `trans_no` varchar(250) NOT NULL,
  `date_reserve` date NOT NULL,
  `child` int(250) NOT NULL,
  `adult` int(250) NOT NULL,
  `check_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `check_out` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(250) NOT NULL,
  `cottage/hall_id` int(250) NOT NULL,
  `customer_id` int(250) NOT NULL,
  `date_created` date NOT NULL,
  `downpayment` int(250) NOT NULL,
  `balance` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `trans_no`, `date_reserve`, `child`, `adult`, `check_in`, `check_out`, `status`, `cottage/hall_id`, `customer_id`, `date_created`, `downpayment`, `balance`) VALUES
(3, '1197077060', '2022-11-11', 3, 2, '2022-11-08 11:44:34', '0000-00-00 00:00:00', 'Fullypaid', 2, 18, '2022-11-08', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `contact_no` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `uname` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `user_type_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `contact_no`, `address`, `uname`, `pass`, `user_type_id`) VALUES
(1, 'admin', 'admin', '0', 'poblacion', 'admin', 'admin', 1),
(18, 'Cardo', 'Dalisay', '09783648265', 'this is sample address', 'cardo', 'cardo1234', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(250) NOT NULL,
  `user_type_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_name`) VALUES
(1, 'admin'),
(2, 'superadmin'),
(3, 'customer'),
(4, 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cottage/hall`
--
ALTER TABLE `cottage/hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cottage/hall`
--
ALTER TABLE `cottage/hall`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
