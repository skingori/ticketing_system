-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2017 at 01:54 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `Fan`
--

CREATE TABLE `Fan` (
  `Fan_Id` int(255) NOT NULL DEFAULT '0',
  `Fan_Name` varchar(255) DEFAULT NULL,
  `Fan_Gender` varchar(255) DEFAULT NULL,
  `Fan_Age` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `Login_Id` int(255) NOT NULL DEFAULT '0',
  `Login_Username` varchar(255) DEFAULT NULL,
  `Login_Password` varchar(255) DEFAULT NULL,
  `Login_Rank` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`Login_Id`, `Login_Username`, `Login_Password`, `Login_Rank`) VALUES
(0, 'ewewe', '7be790e8f2934273c118ef565475c216', '2'),
(1214, 'ssdsde', '7be790e8f2934273c118ef565475c216', '2'),
(21212, 'user', '21232f297a57a5a743894a0e4a801fc3', '2'),
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
  `Payment_Id` int(255) NOT NULL DEFAULT '0',
  `Payment_Amount` int(255) DEFAULT NULL,
  `Payment_Mode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Ticket`
--

CREATE TABLE `Ticket` (
  `Ticket_Id` int(255) NOT NULL DEFAULT '0',
  `Ticket_Count` int(255) DEFAULT NULL,
  `Ticket_Charge` int(255) DEFAULT NULL,
  `Ticket_Type` varchar(255) DEFAULT NULL,
  `Ticket_Description` varchar(255) DEFAULT NULL,
  `Ticket_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Ticket_Payment`
--

CREATE TABLE `Ticket_Payment` (
  `Ticket_Payment_Id` int(255) NOT NULL DEFAULT '0',
  `Ticket_Payment_Payment_Id` int(255) DEFAULT NULL,
  `Ticket_Payment_Ticket_Id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
