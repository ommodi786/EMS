-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2019 at 06:05 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'Admin user', 'phpgurukulofficial@gmail.com', 'admin', '5c428d8875d2948607f3e3fe134d71b4', '2019-06-14 14:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookings`
--

CREATE TABLE `tblbookings` (
  `id` int(11) NOT NULL,
  `BookingId` bigint(12) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `EventId` int(11) DEFAULT NULL,
  `NumberOfMembers` int(11) DEFAULT NULL,
  `UserRemark` mediumtext DEFAULT NULL,
  `AdminRemark` mediumtext DEFAULT NULL,
  `UserCancelRemark` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `BookingStatus` varchar(100) DEFAULT NULL,
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookings`
--

INSERT INTO `tblbookings` (`id`, `BookingId`, `UserId`, `EventId`, `NumberOfMembers`, `UserRemark`, `AdminRemark`, `UserCancelRemark`, `BookingDate`, `BookingStatus`, `LastUpdationDate`) VALUES
(3, 659452988, 1, 2, 4, 'Event booked successfully. Booking number is', 'Your booking is confirmed.', NULL, '2019-06-09 18:48:20', 'Confirmed', '2019-06-12 17:54:57'),
(4, 927630009, 2, 2, 5, 'This is sample text for testing.', 'Your booking is confirmed', NULL, '2019-06-14 14:34:56', 'Confirmed', '2019-06-14 14:54:43'),
(5, 313116173, 2, 5, 4, 'This is sample text for testing', 'Canclled', NULL, '2019-06-14 14:51:29', 'Cancelled', '2019-06-14 14:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CategoryDescription` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsActive` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `CategoryDescription`, `CreationDate`, `UpdationDate`, `IsActive`) VALUES
(2, 'Sports Party', 'Sports Party', '2019-01-07 18:30:11', '2019-06-12 17:49:19', '0'),
(3, 'Music Day', 'Music Day', '2019-01-07 18:30:30', NULL, '1'),
(4, 'Kitty Party', 'Kitty Party', '2019-06-12 17:49:03', NULL, '1'),
(5, 'Test', 'Test 1', '2019-06-14 14:38:12', '2019-06-14 14:38:21', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblevents`
--

CREATE TABLE `tblevents` (
  `id` int(11) NOT NULL,
  `CategoryId` char(10) DEFAULT NULL,
  `SponserId` char(10) DEFAULT NULL,
  `EventName` varchar(255) DEFAULT NULL,
  `EventDescription` mediumtext DEFAULT NULL,
  `EventStartDate` date DEFAULT NULL,
  `EventEndDate` date DEFAULT NULL,
  `EventLocation` varchar(255) DEFAULT NULL,
  `EventImage` varchar(255) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblevents`
--

INSERT INTO `tblevents` (`id`, `CategoryId`, `SponserId`, `EventName`, `EventDescription`, `EventStartDate`, `EventEndDate`, `EventLocation`, `EventImage`, `PostingDate`, `LastUpdationDate`, `IsActive`) VALUES
(1, '3', '1', 'Test Event ', 'This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. This is a sample for text for testing. ', '2019-02-28', '2019-03-28', 'New Delhi, India', '030a598309176bacad1e877e9d2d13fa.jpg', '2019-02-27 18:05:24', '2019-06-13 18:20:43', 1),
(2, '2', '1', 'Cricket Match event', 'This is sample text for testing. This is sample text for testing.  This is sample text for testing.  This is sample text for testing.This is sample text for testing.This is sample text for testing.This is sample text for testing.This is sample text for testing.', '2019-06-15', '2019-06-30', 'New Delhi', '9c27f97f48cb87433e40dcf3e59aa7a0.jpg', '2019-04-18 09:10:09', '2019-06-14 14:36:29', 1),
(5, '3', '1', 'Test Event new', 'This is sample text for testing. This is sample text for testing.This is sample text for testing.This is sample text for testing.This is sample text for testing.', '2019-06-16', '2019-06-30', 'Mumbai India', 'db929cd53bd93e6ef09a870bac6bf286.png', '2019-06-14 14:45:13', '2019-06-14 14:49:26', 1),
(6, '2', '1', 'test', 'test data', '2019-06-01', '2019-06-30', 'Test location', '600c8610fae0e8c11635cc96bbb281bd.png', '2019-06-14 14:50:16', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblgenralsettings`
--

CREATE TABLE `tblgenralsettings` (
  `id` int(11) NOT NULL,
  `SiteName` varchar(200) DEFAULT NULL,
  `PhoneNumber` bigint(12) DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `footercontent` mediumtext DEFAULT NULL,
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgenralsettings`
--

INSERT INTO `tblgenralsettings` (`id`, `SiteName`, `PhoneNumber`, `EmailId`, `address`, `footercontent`, `LastUpdationDate`) VALUES
(1, 'EMS ', 9223372036854775807, 'demotest@test.com', 'Test address\r\nTest City\r\nTest State\r\nIN-110091', 'Copyright 2019 All Rights Reserved', '2019-06-14 14:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblnews`
--

CREATE TABLE `tblnews` (
  `id` int(11) NOT NULL,
  `NewsTitle` varchar(255) DEFAULT NULL,
  `NewsDetails` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageType` varchar(255) DEFAULT NULL,
  `PageDetails` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageType`, `PageDetails`, `LastupdationDate`) VALUES
(1, 'aboutus', 'Sample text for testing. Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.Sample text for testing.', '2019-06-14 14:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblsponsers`
--

CREATE TABLE `tblsponsers` (
  `id` int(11) NOT NULL,
  `sponserName` varchar(255) DEFAULT NULL,
  `sponserLogo` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `lastUpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsponsers`
--

INSERT INTO `tblsponsers` (`id`, `sponserName`, `sponserLogo`, `postingDate`, `lastUpdationDate`) VALUES
(1, 'TCS', '9fd705be3020f133415debe050943b38.png', '2019-02-04 18:05:06', '2019-06-13 18:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscriber`
--

CREATE TABLE `tblsubscriber` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(255) DEFAULT NULL,
  `Regdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubscriber`
--

INSERT INTO `tblsubscriber` (`id`, `UserEmail`, `Regdate`) VALUES
(1, 'phpgurukulofficial@gmail.com', '2019-06-08 12:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `Userid` int(11) NOT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `Emailid` varchar(255) DEFAULT NULL,
  `PhoneNumber` bigint(12) DEFAULT NULL,
  `UserGender` varchar(100) DEFAULT NULL,
  `UserPassword` varchar(255) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`Userid`, `FullName`, `UserName`, `Emailid`, `PhoneNumber`, `UserGender`, `UserPassword`, `RegDate`, `LastUpdationDate`, `IsActive`) VALUES
(1, 'Test user', 'test12', 'ak30@gmail.com', 1234567899, 'Male', '5c428d8875d2948607f3e3fe134d71b4', '2019-06-08 10:31:18', '2019-06-13 19:15:41', 1),
(2, 'Test Demo ', 'test30', 'test@gmail.com', 1234567890, 'Male', 'f925916e2754e5e03f75dd58a5733251', '2019-06-14 14:34:01', '2019-06-14 14:58:42', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbookings`
--
ALTER TABLE `tblbookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblevents`
--
ALTER TABLE `tblevents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgenralsettings`
--
ALTER TABLE `tblgenralsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblnews`
--
ALTER TABLE `tblnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsponsers`
--
ALTER TABLE `tblsponsers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`Userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbookings`
--
ALTER TABLE `tblbookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblevents`
--
ALTER TABLE `tblevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblgenralsettings`
--
ALTER TABLE `tblgenralsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblnews`
--
ALTER TABLE `tblnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblsponsers`
--
ALTER TABLE `tblsponsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsubscriber`
--
ALTER TABLE `tblsubscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
