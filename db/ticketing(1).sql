-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2017 at 10:09 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing`
--
CREATE DATABASE IF NOT EXISTS `ticketing` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ticketing`;

-- --------------------------------------------------------

--
-- Table structure for table `Fan`
--

CREATE TABLE `Fan` (
  `Fan_Id` int(11) NOT NULL,
  `Fan_Name` varchar(255) DEFAULT NULL,
  `Fan_Gender` varchar(255) DEFAULT NULL,
  `Fan_Age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Fan`
--

INSERT INTO `Fan` (`Fan_Id`, `Fan_Name`, `Fan_Gender`, `Fan_Age`) VALUES
(0, 'james Test', 'Male', 34),
(21212, 'James Maina', 'Male', 21);

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `Login_Id` int(11) NOT NULL DEFAULT '0',
  `Login_Username` varchar(255) DEFAULT NULL,
  `Login_Password` varchar(255) DEFAULT NULL,
  `Login_Rank` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`Login_Id`, `Login_Username`, `Login_Password`, `Login_Rank`) VALUES
(1214, 'ssdsde', '7be790e8f2934273c118ef565475c216', '2'),
(12121, 'wqw', 'e110fb45bc4f7cc5d367b06bfbc8e5c3', '2'),
(21212, 'user', '21232f297a57a5a743894a0e4a801fc3', '2'),
(2432434, 'rerere', '98aedadb27f98c64d43dbddc762267a7', '2'),
(4543434, 'dfdfdfd', '7be790e8f2934273c118ef565475c216', '2'),
(12345678, 'admin1', '7be790e8f2934273c118ef565475c216', '2'),
(23232323, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(34343434, 'samsy', '7be790e8f2934273c118ef565475c216', '2'),
(43434343, 'ereree', '7be790e8f2934273c118ef565475c216', '2');

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `Payment_Id` bigint(20) NOT NULL,
  `Payment_Amount` int(255) DEFAULT NULL,
  `Payment_Mode` varchar(255) DEFAULT NULL,
  `Payment_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`Payment_Id`, `Payment_Amount`, `Payment_Mode`, `Payment_Date`) VALUES
(8786, 89, 'Bank', NULL),
(55555555, 8797, 'M-pesa', NULL),
(2147483647, 200, 'Other', NULL),
(56756755545, 7000, 'Bank', '2017-11-08 09:36:05'),
(77576454543, 1000, 'Bank', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Ticket`
--

CREATE TABLE `Ticket` (
  `Ticket_Id` bigint(20) NOT NULL,
  `Ticket_Count` int(11) DEFAULT NULL,
  `Ticket_Code` varchar(255) NOT NULL,
  `Ticket_Charge` int(11) DEFAULT NULL,
  `Ticket_Type` varchar(255) DEFAULT NULL,
  `Ticket_Description` varchar(255) DEFAULT NULL,
  `Ticket_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ticket`
--

INSERT INTO `Ticket` (`Ticket_Id`, `Ticket_Count`, `Ticket_Code`, `Ticket_Charge`, `Ticket_Type`, `Ticket_Description`, `Ticket_Date`) VALUES
(145921741075500, 1, '21212', 500, 'REGULAR', 'yuiymuyouiyiiu', '2017-11-08 08:54:16'),
(263284346807860, 1, '21212', 500, 'REGULAR', 'hfgrcggkhmuyui', '2017-11-08 09:01:44'),
(312890563275377, 1, '21212', 500, 'REGULAR', 'hgbotiu', '2017-11-08 09:21:13'),
(544565479019479, 1, '21212', 500, 'REGULAR', 'unuyiuymyyiu', '2017-11-08 08:57:20'),
(560281746864301, 1, '21212', 500, 'REGULAR', 'iuuuyuynuyrcerterw', '2017-11-08 09:36:05'),
(944712186786475, 1, '21212', 500, 'REGULAR', 'hfgrcggkhmuyui', '2017-11-08 08:59:59'),
(959032292822917, 1, '21212', 500, 'REGULAR', 'yuiymuyouiyiiu', '2017-11-08 08:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `Ticket_Payment`
--

CREATE TABLE `Ticket_Payment` (
  `Ticket_Payment_Id` int(11) NOT NULL,
  `Ticket_Payment_Payment_Id` bigint(20) DEFAULT NULL,
  `Ticket_Payment_Ticket_Id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ticket_Payment`
--

INSERT INTO `Ticket_Payment` (`Ticket_Payment_Id`, `Ticket_Payment_Payment_Id`, `Ticket_Payment_Ticket_Id`) VALUES
(2, 55555555, 2147483647),
(3, 2147483647, 2147483647),
(4, 77576454543, 944712186786475),
(5, 8786, 312890563275377),
(6, 56756755545, 560281746864301);

-- --------------------------------------------------------

--
-- Table structure for table `Verification`
--

CREATE TABLE `Verification` (
  `Verification_Id` int(255) NOT NULL DEFAULT '0',
  `Verification_Login_Id` int(255) DEFAULT NULL,
  `Verification_Payment_Mode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Fan`
--
ALTER TABLE `Fan`
  ADD PRIMARY KEY (`Fan_Id`);

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`Login_Id`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`Payment_Id`);

--
-- Indexes for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`Ticket_Id`);

--
-- Indexes for table `Ticket_Payment`
--
ALTER TABLE `Ticket_Payment`
  ADD PRIMARY KEY (`Ticket_Payment_Id`);

--
-- Indexes for table `Verification`
--
ALTER TABLE `Verification`
  ADD PRIMARY KEY (`Verification_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Ticket_Payment`
--
ALTER TABLE `Ticket_Payment`
  MODIFY `Ticket_Payment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
