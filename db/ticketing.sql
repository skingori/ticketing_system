-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2017 at 11:33 AM
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

DROP TABLE IF EXISTS `Fan`;
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
-- Table structure for table `Game`
--

DROP TABLE IF EXISTS `Game`;
CREATE TABLE `Game` (
  `Game_Id` int(11) NOT NULL,
  `Game_Type` varchar(20) NOT NULL,
  `Game_DateTime` datetime NOT NULL,
  `Game_Status` varchar(10) NOT NULL,
  `Game_Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Game`
--

INSERT INTO `Game` (`Game_Id`, `Game_Type`, `Game_DateTime`, `Game_Status`, `Game_Description`) VALUES
(6, 'Gor Vs Manch', '2017-11-25 00:00:00', 'complete', '<p>werkjgrjgwejr</p><p>werwer</p>'),
(7, 'hghgjg', '2017-11-23 00:00:00', 'complete', '<p>ughghjgghg</p>'),
(8, 'MANCHESTER', '2017-11-18 00:00:00', 'complete', '<p>This will Be held on 18th Nov</p>');

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

DROP TABLE IF EXISTS `Login`;
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
(123123, 'wqeqweq', '1f5351c26f58cdc2ddb8733b8abbba43', '2'),
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

DROP TABLE IF EXISTS `Payment`;
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
(0, 0, 'Other', '2017-11-09 22:04:35'),
(8786, 89, 'Bank', NULL),
(345345, 4300, 'Airtel Money', '2017-11-15 17:09:48'),
(565466, 65, 'Bank', '2017-11-15 17:12:28'),
(45435345, 5000, 'Bank', '2017-11-15 17:10:35'),
(55555555, 8797, 'M-pesa', NULL),
(453453535, 800, 'Bank', '2017-11-17 21:29:42'),
(2147483647, 200, 'Other', NULL),
(56756755545, 7000, 'Bank', '2017-11-08 09:36:05'),
(77576454543, 1000, 'Bank', NULL),
(7634876874287, 4300, 'Bank', '2017-11-14 16:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `Ticket`
--

DROP TABLE IF EXISTS `Ticket`;
CREATE TABLE `Ticket` (
  `Ticket_Id` bigint(20) NOT NULL,
  `Ticket_Count` int(11) DEFAULT NULL,
  `Ticket_Code` varchar(255) NOT NULL,
  `Ticket_Game_Id` int(11) NOT NULL,
  `Ticket_Seat` int(11) NOT NULL,
  `Ticket_Charge` int(11) DEFAULT NULL,
  `Ticket_Type` varchar(255) DEFAULT NULL,
  `Ticket_Description` varchar(255) DEFAULT NULL,
  `Ticket_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Ticket`
--

INSERT INTO `Ticket` (`Ticket_Id`, `Ticket_Count`, `Ticket_Code`, `Ticket_Game_Id`, `Ticket_Seat`, `Ticket_Charge`, `Ticket_Type`, `Ticket_Description`, `Ticket_Date`) VALUES
(444771511834, 1, '21212', 8, 1, 1000, 'VIP', 'N/A', '2017-11-17 22:15:37'),
(182673077700534, 1, '21212', 7, 34, 800, 'REGULAR', 'hfjdsjkhfkdshf', '2017-11-17 21:29:42'),
(440799116241775, 1, '21212', 8, 2, 800, 'REGULAR', '', '2017-11-18 11:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `Ticket_Payment`
--

DROP TABLE IF EXISTS `Ticket_Payment`;
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
(6, 56756755545, 560281746864301),
(7, 0, 685255584887982),
(8, 7634876874287, 595362901574807),
(9, 345345, 202933639509304),
(10, 45435345, 117404893170726),
(11, 565466, 818770135564867),
(12, 453453535, 182673077700534);

-- --------------------------------------------------------

--
-- Table structure for table `Verification`
--

DROP TABLE IF EXISTS `Verification`;
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
-- Indexes for table `Game`
--
ALTER TABLE `Game`
  ADD PRIMARY KEY (`Game_Id`);

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
  ADD PRIMARY KEY (`Ticket_Id`),
  ADD KEY `Ticket_Seat` (`Ticket_Seat`);

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
-- AUTO_INCREMENT for table `Game`
--
ALTER TABLE `Game`
  MODIFY `Game_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Ticket_Payment`
--
ALTER TABLE `Ticket_Payment`
  MODIFY `Ticket_Payment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
