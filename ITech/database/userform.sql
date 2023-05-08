-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 09:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userform`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(255) NOT NULL,
  `FN` varchar(255) NOT NULL,
  `MN` varchar(255) NOT NULL,
  `LN` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpNumber` bigint(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` int(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleInitial` varchar(125) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` bigint(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` int(255) NOT NULL,
  `code1` int(255) NOT NULL,
  `code2` int(255) NOT NULL,
  `code3` int(255) NOT NULL,
  `code4` int(255) NOT NULL,
  `code5` int(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `lastName`, `firstName`, `middleInitial`, `email`, `phoneNumber`, `password`, `code`, `code1`, `code2`, `code3`, `code4`, `code5`, `status`) VALUES
(28, 'Perdigon', 'John Stephen', '', 'perdigonjohnstephen@gmail.com', 9292305957, '$2y$10$MygAblXekn5Dr9SVbLOdQ.0GAFDJcMPeONVdH5PM/n/BYIE/4NJP2', 0, 0, 0, 0, 0, 0, 'verified'),
(34, 'Perdigon', 'John Stephen', '', 'tsinelassssss@gmail.com', 9292305957, '$2y$10$so22197r88035mA1PIhGa.mDgMKT9m3nYJtC1YB4lrmLmg0XPSVaS', 9, 6, 3, 8, 9, 4, 'notverified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
