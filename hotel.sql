-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2016 at 12:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `bookingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `checkin` enum('N','n','Y','y') NOT NULL,
  `requests` varchar(60) DEFAULT NULL,
  `cost` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingId`, `customerid`, `bookingdate`, `checkindate`, `checkoutdate`, `checkin`, `requests`, `cost`) VALUES
(6, 4, '2016-11-01 00:00:00', '2016-11-10', '2016-11-12', 'N', '', '150.00'),
(7, 5, '2016-11-05 00:00:00', '2016-11-21', '2016-11-22', 'N', 'none', '200.00'),
(8, 8, '2016-11-15 00:00:00', '2016-11-25', '2016-11-27', 'N', 'none', '200.00'),
(13, 10, '2016-11-15 00:00:00', '2016-11-23', '2016-11-27', 'N', 'none', '200.00'),
(14, 18, '0000-00-00 00:00:00', '2016-11-23', '2016-11-24', 'N', NULL, '0.00'),
(15, 19, '0000-00-00 00:00:00', '2016-11-25', '2016-11-30', 'N', NULL, '0.00'),
(16, 20, '2016-11-23 19:22:28', '2016-11-23', '2016-11-24', 'N', NULL, '0.00'),
(17, 21, '2016-11-23 19:24:58', '2016-11-23', '2016-11-24', 'N', NULL, '0.00'),
(18, 22, '2016-11-23 19:25:07', '2016-11-23', '2016-11-24', 'N', NULL, '0.00'),
(19, 23, '2016-11-23 19:25:12', '2016-11-23', '2016-11-24', 'N', NULL, '0.00'),
(20, 24, '2016-11-23 19:25:16', '2016-11-23', '2016-11-24', 'N', NULL, '0.00'),
(21, 25, '2016-11-23 19:25:33', '2016-11-23', '2016-11-24', 'N', NULL, '0.00'),
(22, 26, '2016-11-23 19:26:40', '2016-11-23', '2016-11-24', 'N', NULL, '0.00'),
(23, 27, '2016-11-23 19:26:56', '2016-11-23', '2016-11-24', 'N', NULL, '0.00'),
(24, 28, '2016-11-23 19:27:10', '2016-11-23', '2016-11-24', 'N', NULL, '0.00'),
(25, 37, '2016-11-23 20:31:45', '2016-11-23', '2016-11-24', 'N', NULL, '0.00'),
(26, 39, '2016-11-23 20:33:30', '2016-11-23', '2016-11-24', 'N', 'a request', '0.00'),
(27, 40, '2016-11-23 20:34:34', '2016-11-23', '2016-11-24', 'N', 'Test Requests', '0.00'),
(28, 41, '2016-11-23 20:35:09', '2016-11-23', '2016-11-24', 'N', 'Test Requests', '0.00'),
(29, 46, '2016-11-23 20:45:54', '2016-11-23', '2016-11-24', 'N', 'anna test', '0.00'),
(30, 47, '2016-11-24 19:43:58', '2016-11-25', '2016-11-26', 'N', 'Requests', '0.00'),
(31, 48, '2016-11-25 10:25:52', '2017-11-07', '2017-11-12', 'N', 'Requests', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `bookingsroom`
--

CREATE TABLE `bookingsroom` (
  `bookingId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  `occupancy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingsroom`
--

INSERT INTO `bookingsroom` (`bookingId`, `roomId`, `occupancy`) VALUES
(0, 0, 2),
(16, 0, 3),
(17, 0, 3),
(18, 0, 3),
(19, 0, 3),
(20, 0, 3),
(21, 0, 3),
(22, 0, 3),
(23, 0, 3),
(24, 0, 3),
(29, 0, 3),
(30, 0, 4),
(31, 0, 4),
(13, 1, 2),
(6, 2, 2),
(14, 2, 3),
(15, 3, 2),
(9, 5, 2),
(31, 5, 2),
(7, 6, 1),
(25, 6, 1),
(26, 6, 1),
(30, 6, 4),
(36, 6, 1),
(38, 6, 1),
(0, 7, 2),
(27, 7, 1),
(28, 7, 1),
(32, 7, 2),
(33, 7, 2),
(34, 7, 2),
(35, 7, 2),
(8, 9, 2),
(29, 9, 2),
(42, 9, 2),
(43, 9, 2),
(44, 9, 2),
(45, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `title` char(4) NOT NULL,
  `firstname` char(15) NOT NULL,
  `surname` char(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` char(15) NOT NULL,
  `address` varchar(60) NOT NULL,
  `city` char(20) NOT NULL,
  `postcode` char(10) DEFAULT NULL,
  `county` char(15) NOT NULL,
  `country` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `title`, `firstname`, `surname`, `email`, `phone`, `address`, `city`, `postcode`, `county`, `country`) VALUES
(4, 'Mr', 'Test', 'Test', 'Test@email.com', '0792385998', 'Test street', 'Test City', '5452', 'Co. Test', NULL),
(5, 'mr', 'jonathan', 'quirke', 'jonnir@gmail.com', '0987654322', 'Example street', 'tralee', 'jjiojpi', 'kerry', NULL),
(6, 'Mr', 'jeff', 'o shea', 'iudhfo@example.com', '087116565', 'address Street', 'Killorglin', 'oushdfo', 'cork', NULL),
(7, 'ms', 'mary', 'murphy', 'mary@mary.com', '0879876541', 'mary Street', 'big city', 'ojhdfo', 'Limerick', NULL),
(8, 'ms', 'mary', 'murphy', 'mary@mary.com', '0879876541', 'mary Street', 'big city', 'ojhdfo', 'Limerick', NULL),
(9, 'ms', 'Diane', 'o shea', 'name@email.com', '0875415484', 'example', 'exAMPLE', 'kjkwsdfo', 'dublin', NULL),
(10, 'mr', 'john', 'o connor', 'djfsljdfno@iuwdhfo', 'dsfsd', 'fdsnfs', 'ldonfnpd', 'dsf', 'oldfng', NULL),
(11, 'mr', 'john', 'o connor', 'djfsljdfno@iuwdhfo', 'dsfsd', 'fdsnfs', 'ldonfnpd', 'dsf', 'oldfng', NULL),
(12, 'mr', 'billy', 'sheahan', 'sdafsa@fsfd', 'asdf', 'asdf', 'asdf', 'adsf', 'asdf', 'AS'),
(13, 'Mr', 'jim', 'mack', 'Test@email.com', '0792385998', 'Test street2', 'Test City2', '5452', 'Co. Test2', NULL),
(14, 'Mr', 'jim', 'mack', 'Test@email.com', '0792385998', 'Test street2', 'Test City2', '5452', 'Co. Test2', NULL),
(15, 'Mr', 'jim', 'mack', 'Test@email.com', '0792385998', 'Test street2', 'Test City2', '5452', 'Co. Test2', NULL),
(16, 'Mr', 'jim', 'mack', 'Test@email.com', '0792385998', 'Test street2', 'Test City2', '5452', 'Co. Test2', NULL),
(17, 'Mr', 'jim', 'mack', 'Test@email.com', '0792385998', 'Test street2', 'Test City2', '5452', 'Co. Test2', NULL),
(18, 'mr', 'Darren', 'Moriarty', 'dmamprop@gmail.com', '425242', 'Bay View, High Road', 'Glenbeigh', '234234', 'Co. Kerry', 'IEIE'),
(19, 'miss', 'mary', 'shea', 'mary@mary.com', '342804', 'SDOFHSIODF', 'DSJJHF', 'SDFH', 'OSDHF', 'XBXB'),
(20, 'Mr', 'Darren', 'Moriartyq', 'ohsdodifj@fwofj', 'oiidsfjd', 'ioshjndfpi', 'pidsj', 'pjf', 'pdfj', 'DK'),
(21, 'Mr', 'Darren', 'Moriartyq', 'ohsdodifj@fwofj', 'oiidsfjd', 'ioshjndfpi', 'pidsj', 'pjf', 'pdfj', 'DK'),
(22, 'Mr', 'Darren', 'Moriartyq', 'ohsdodifj@fwofj', 'oiidsfjd', 'ioshjndfpi', 'pidsj', 'pjf', 'pdfj', 'DK'),
(23, 'Mr', 'Darren', 'Moriartyq', 'ohsdodifj@fwofj', 'oiidsfjd', 'ioshjndfpi', 'pidsj', 'pjf', 'pdfj', 'DK'),
(24, 'Mr', 'Darren', 'Moriartyq', 'ohsdodifj@fwofj', 'oiidsfjd', 'ioshjndfpi', 'pidsj', 'pjf', 'pdfj', 'DK'),
(25, 'Mr', 'Darren', 'Moriartyq', 'ohsdodifj@fwofj', 'oiidsfjd', 'ioshjndfpi', 'pidsj', 'pjf', 'pdfj', 'DK'),
(26, 'Mr', 'Darren', 'Moriartyq', 'ohsdodifj@fwofj', 'oiidsfjd', 'ioshjndfpi', 'pidsj', 'pjf', 'pdfj', 'DK'),
(27, 'Mr', 'Darren', 'Moriartyq', 'ohsdodifj@fwofj', 'oiidsfjd', 'ioshjndfpi', 'pidsj', 'pjf', 'pdfj', 'DK'),
(28, 'Mr', 'Darren', 'Moriartyq', 'ohsdodifj@fwofj', 'oiidsfjd', 'ioshjndfpi', 'pidsj', 'pjf', 'pdfj', 'DK'),
(29, 'zgzc', 'zxcvzc', 'zxcvz', 'cxvzxc@sdfg', 'zxcvxzv', 'zxcv', 'asgas', 'asfg', 'asgfsaf', 'AG'),
(30, 'fsdf', 'sdfsd', 'sd', 'fgdgds@fsfs', 'dfgdf', 'dgfsdg', 'sdfgs', 'sdfgsdg', 'dgsdg', 'AQ'),
(31, 'fsdf', 'sdfsd', 'sd', 'fgdgds@fsfs', 'dfgdf', 'dgfsdg', 'sdfgs', 'sdfgsdg', 'dgsdg', 'AQ'),
(32, 'dsfd', 'sdfdsf', 'sdf', 'sdf@sdfsf', 'sdsdfsdf', 'dsfdfhhd', 'sdfsdg', 'dgfh', 'dfghdg', 'AI'),
(33, 'dsfd', 'sdfdsf', 'sdf', 'sdf@sdfsf', 'sdsdfsdf', 'dsfdfhhd', 'sdfsdg', 'dgfh', 'dfghdg', 'AI'),
(34, 'dsfd', 'sdfdsf', 'sdf', 'sdf@sdfsf', 'sdsdfsdf', 'dsfdfhhd', 'sdfsdg', 'dgfh', 'dfghdg', 'AI'),
(35, 'dsfd', 'sdfdsf', 'sdf', 'sdf@sdfsf', 'sdsdfsdf', 'dsfdfhhd', 'sdfsdg', 'dgfh', 'dfghdg', 'AI'),
(36, 'mr', 'john', 'sullivan', 'asdf@asdf', 'asdfasd', 'adsfadf', 'asdfasdf', 'adsf', 'asdf', 'AI'),
(37, 'mr', 'john', 'sullivan', 'asdf@asdf', 'asdfasd', 'adsfadf', 'asdfasdf', 'adsf', 'asdf', 'AI'),
(38, 'mr', 'john', 'sullivan', 'asdf@asdf', 'asdfasd', 'adsfadf', 'asdfasdf', 'adsf', 'asdf', 'AI'),
(39, 'mr', 'john', 'sullivan', 'asdf@asdf', 'asdfasd', 'adsfadf', 'asdfasdf', 'adsf', 'asdf', 'AI'),
(40, 'fsag', 'sfdgsdfg', 'sdfg', 'sdfgsdfg@asdfgassg', 'sfdg', 'dfh', 'sdghsg', 'dfgh', 'dfgh', 'AD'),
(41, 'fsag', 'sfdgsdfg', 'sdfg', 'sdfgsdfg@asdfgassg', 'sfdg', 'dfh', 'sdghsg', 'dfgh', 'dfgh', 'AD'),
(42, 'ms', 'annA', 'SURNAE', 'ASDF@ouh', 'asfgafga', 'fdgadf', 'afgag', 'dhjkf', 'kffjgk', 'AR'),
(43, 'ms', 'annA', 'SURNAE', 'ASDF@ouh', 'asfgafga', 'fdgadf', 'afgag', 'dhjkf', 'kffjgk', 'AR'),
(44, 'ms', 'annA', 'asdf', 'djgh@dgfh', 'sdfs', 'h', 'hg', 'h', 'h', 'AI'),
(45, 'ms', 'annA', 'asdf', 'djgh@dgfh', 'sdfs', 'h', 'hg', 'h', 'h', 'AI'),
(46, 'ms', 'annA', 'asdf', 'djgh@dgfh', 'sdfs', 'h', 'hg', 'h', 'h', 'AI'),
(47, 'd', 'd', 'd', 'd@d', 'd', 'd', 'd', 'd', 'd', 'AQ'),
(48, 'mr', 'Gerard', 'Ryan', 'Ger@ger.com', '0874682970', '33 cois baile dromin ', 'listowel', 'aafsd', 'kerry', 'IEIE');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomid` int(11) NOT NULL,
  `roomtype` char(20) NOT NULL,
  `roomprice` decimal(10,0) NOT NULL,
  `smoking` enum('N','n','Y','y') DEFAULT NULL,
  `description` varchar(40) DEFAULT NULL,
  `breakfast` bit(1) DEFAULT NULL,
  `pictpaths` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `roomtype`, `roomprice`, `smoking`, `description`, `breakfast`, `pictpaths`) VALUES
(1, 'Standard Single', '95', 'Y', 'Single Room, Sleeps 1 only, ensuite, tea', b'0', '../media/images/room1.jpg'),
(2, 'Standard Double', '104', 'Y', 'Double Room, Sleeps 2, hair dryer', b'0', '../media/images/room1.jpg'),
(3, 'Standard Twin', '120', 'Y', 'Standard Twin, Sleeps 2, ebsuite', b'0', '../media/images/room2.jpg'),
(4, 'Standard Studio', '135', 'Y', 'Standard Studio, Microwave, ebsuite', b'0', '../media/images/room2.jpg'),
(5, 'Lavery Double', '150', 'Y', 'Lavery Double, ensuite, wheelcair', b'0', '../media/images/room3.jpg'),
(6, 'Standard Single', '95', 'Y', 'Standard Studio, Microwave, ebsuite', b'0', '../media/images/room3.jpg'),
(7, 'Standard Double', '104', 'N', 'Standard Double, Tea & Coffee', b'0', '../media/images/room4.jpg'),
(8, 'Standard Twin', '120', 'N', 'Standard Twin, ensuite, wheelcair', b'0', '../media/images/room4.jpg'),
(9, 'Standard Studio', '135', 'N', 'Standard Studio, Microwave, ebsuite', b'0', '../media/images/room1.jpg'),
(10, 'Lavery Double', '150', 'N', 'Lavery Double, ensuite, wheelcair', b'0', '../media/images/room1.jpg'),
(11, 'Standard Single', '110', 'Y', 'Standard Single, Microwave, ebsuite', b'1', '../media/images/room2.jpg'),
(12, 'Standard Double', '129', 'Y', 'Standard Double, Tea & Coffee', b'1', '../media/images/room2.jpg'),
(13, 'Standard Twin', '125', 'Y', 'Standard Twin, ensuite, wheelcair', b'1', '../media/images/room3.jpg'),
(14, 'Standard Studio', '150', 'Y', 'Standard Studio, Microwave, ebsuite', b'1', '../media/images/room3.jpg'),
(15, 'Lavery Double', '165', 'Y', 'Lavery Double, ensuite, wheelcair', b'1', '../media/images/room4.jpg'),
(16, 'Standard Single', '110', 'N', 'Standard Single, Microwave, ebsuite', b'1', '../media/images/room4.jpg'),
(17, 'Standard Double', '129', 'N', 'Standard Double, Tea & Coffee', b'1', '../media/images/room1.jpg'),
(18, 'Standard Twin', '125', 'N', 'Standard Twin, ensuite, wheelcair', b'1', '../media/images/room1.jpg'),
(19, 'Standard Studio', '150', 'N', 'Standard Studio, Microwave, ebsuite', b'1', '../media/images/room2.jpg'),
(20, 'Lavery Double', '165', 'N', 'Lavery Double, ensuite, wheelcair', b'1', '../media/images/room2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `fk_cust` (`customerid`);

--
-- Indexes for table `bookingsroom`
--
ALTER TABLE `bookingsroom`
  ADD PRIMARY KEY (`roomId`,`bookingId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_cust` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
