-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 08:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question`, `answer`) VALUES
(12, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `examinationtbl`
--

CREATE TABLE `examinationtbl` (
  `id` int(7) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `question` varchar(150) NOT NULL,
  `answer` varchar(150) NOT NULL,
  `option1` varchar(150) NOT NULL,
  `option2` varchar(150) NOT NULL,
  `option3` varchar(150) NOT NULL,
  `option4` varchar(150) NOT NULL,
  `questionAddedDT` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `role` varchar(255) NOT NULL DEFAULT 'part1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examinationtbl`
--

INSERT INTO `examinationtbl` (`id`, `uid`, `question`, `answer`, `option1`, `option2`, `option3`, `option4`, `questionAddedDT`, `role`) VALUES
(49, '64667dd851a5a', 'What does CPU stand for?', 'A', 'Central Processing Unit', 'Computer Processing Unit', 'Central Processor Unit', 'Computer Processor Unit', '2023-05-19 03:34:48.334543', 'part1'),
(50, '64667df5d32cb', 'What is the purpose of an operating system?', 'A', 'Manage computer hardware and software resources', 'Control the speed of the CPU', 'Store and organize files on a computer', 'Connect to the internet', '2023-05-19 03:35:17.865097', 'part1'),
(51, '64667e0f50f6b', 'What is the function of RAM in a computer?', 'D', 'Store permanent data', 'Execute program instructions', 'Control input and output devices', 'Temporarily store data and program instructions', '2023-05-19 03:35:43.331749', 'part1'),
(52, '64667e259cca0', 'What is the binary equivalent of the decimal number 10?', 'A', '1010', '1100', '1111', '1001', '2023-05-19 03:36:05.642283', 'part1'),
(53, '64667e4a36c6a', 'What is a virus in the context of computers?', 'A', 'A malicious program that replicates and infects other programs', 'A hardware component of a computer', 'A type of computer network', 'A software used for data encryption', '2023-05-19 03:36:42.224564', 'part1'),
(54, '64667e660fc1b', 'What is the function of a firewall?', 'B', 'Protect the computer from physical damage', 'Prevent unauthorized access to a computer or network', 'Enhance the performance of the CPU', 'Control the flow of electricity in a computer', '2023-05-19 03:37:10.064651', 'part1'),
(55, '64667e97e6fa8', 'What does HTML stand for?', 'A', 'HyperText Markup Language', 'High-Tech Markup Language', 'Hyperlink Text Markup Language', 'Home Tool Markup Language', '2023-05-19 03:37:59.946144', 'part1'),
(56, '64667eaf8afb2', 'What is the purpose of a URL?', 'A', 'Identify the location of a webpage on the internet', 'Store data in a database', 'Encrypt files for secure transmission', 'Control the flow of data in a network', '2023-05-19 03:38:23.569366', 'part1'),
(57, '64667ec594aac', 'What is the function of a compiler in programming?', 'B', ' Execute program instructions', 'Translate source code into machine code', 'Store and retrieve data', 'Control computer peripherals', '2023-05-19 03:38:45.609085', 'part1'),
(58, '64667ee013f8d', 'What is the difference between hardware and software?', 'A', 'Hardware refers to physical components, while software refers to programs and data', 'Hardware is used for storage, while software is used for processing', 'Hardware is tangible, while software is intangible', 'Hardware is essential, while software is optional', '2023-05-19 03:39:12.081903', 'part1'),
(0, '6469a3c70aace', 'ano ang pangalan ko?', 'd', 'a', 'b', 'c', 'd', '2023-05-21 12:53:27.044726', 'role'),
(0, '6469a40ef16a9', 'ano ang pangalan ko??', 'a', 'a', 'b', 'c', 'd', '2023-05-21 12:54:38.989841', 'part2');

-- --------------------------------------------------------

--
-- Table structure for table `examineetbl`
--

CREATE TABLE `examineetbl` (
  `uid` varchar(255) NOT NULL,
  `id` int(7) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `firstName` varchar(150) NOT NULL,
  `middleInitial` varchar(150) NOT NULL,
  `desiredProg` varchar(255) NOT NULL,
  `remarks` int(255) NOT NULL,
  `examDate` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examineetbl`
--

INSERT INTO `examineetbl` (`uid`, `id`, `lastName`, `firstName`, `middleInitial`, `desiredProg`, `remarks`, `examDate`) VALUES
('0000', 0, 'Losaynon', 'Alexander', 'b', 'IT', 100, '0000-00-00 00:00:00.000000');

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
  `phoneNumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` int(255) NOT NULL,
  `code1` int(255) NOT NULL,
  `code2` int(255) NOT NULL,
  `code3` int(255) NOT NULL,
  `code4` int(255) NOT NULL,
  `code5` int(255) NOT NULL,
  `status` text NOT NULL,
  `role` text NOT NULL,
  `otp_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `lastName`, `firstName`, `middleInitial`, `email`, `phoneNumber`, `password`, `code`, `code1`, `code2`, `code3`, `code4`, `code5`, `status`, `role`, `otp_time`) VALUES
(28, 'Perdigon', 'John Stephen', '', 'perdigonjohnstephen@gmail.com', '9292305957', '$2y$10$MygAblXekn5Dr9SVbLOdQ.0GAFDJcMPeONVdH5PM/n/BYIE/4NJP2', 0, 0, 0, 0, 0, 0, 'verified', 'Admin', '2023-04-01 07:35:56.914648'),
(35, 'Perdigon', 'John Stephen ', '', 'entertainmentcore22@gmail.com', '9292305957', '$2y$10$qvLVowuYxwBaj7Gyk8VU/.ivJqov8h9PLjPtNQGfAc97JTv7Sw9XO', 0, 0, 0, 0, 0, 0, 'verified', '', '2023-04-01 07:35:56.914648'),
(36, 'mariano', 'ervin', '', 'ervinjeffersonmariano@gmail.com', '956841705', '$2y$10$HOG.IBF6XlRPtosUn7BH4uYdAK86lVbvgDt2CriD1m62cUSPXI2wy', 0, 0, 0, 0, 0, 0, 'verified', '', '2023-04-01 07:35:56.914648'),
(42, 'Perdigon', 'John Stephen', '', 'tsinelasisthename@gmail.com', '9292305957', '$2y$10$rpLnwOnSDIMzRkv5z.7IQeEAleR735wtDEF89LInX8u1kZxbLP.2W', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-01 07:35:56.914648'),
(43, 'Audencial', 'Ria', '', 'audencialria@gmail.com', '(929) 230-5957', '$2y$10$hdICsYzC7Qt5cB56CIPtYuzVVGpDCjg5AZSM7d50uAV91EZNL0Anq', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-01 07:35:56.914648'),
(45, 'Villamin', 'Ashlly', '', 'villamin.nicoleashllybsit2020@gmail.com', '(929) 230-5957', '$2y$10$W/5sUyu8s6yz74v/MmwuLeLklZTR71WqndkjE/bwxu2RHxQMXJuxu', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-01 07:35:56.914648'),
(46, 'Fontanilla', 'Yra', '', 'terkoiz07@gmail.com', '(929) 230-5957', '$2y$10$U/N6cG5Tc0maDiFG2eRZyu.6cbQkd2H7haagoHH2SEJxx4gt3jZzC', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-01 07:35:56.914648'),
(48, 'Acuzar', 'Pippen', '', 'tsinelassssss@gmail.com', '(929) 239-5957', '$2y$10$hlUNBRNIXWqa99nsYNol1ebF9lv8m0jyJAlGn4fOyhjeRSMx4wQga', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-02 05:48:09.370490'),
(49, 'losaynon', 'alexander', '', 'alexanderlosaynonII@gmail.com', '(927) 977-2966', '$2y$10$x2fcjmIblZ.TcFz3.csfOOCgcXwIDE0KbbuaEAh9wvYRMbpcIopkG', 0, 0, 0, 0, 0, 0, 'verified', 'Admin', '2023-04-02 07:15:52.954100'),
(54, 'Barrios', 'Joemen', 'G.', 'joemen.barrios@gmail.com', '(929) 343-4038', '$2y$10$3hjRCcU9vtmzjJxScl65XeTN.C7bAYoPxvs4y6yuxEmk9hR81VyRK', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-02 23:31:23.291443'),
(55, 'losaynon', 'alexander', '', 'alexanderlosaynon@gmail.com', '(927) 977-2966', '$2y$10$iGZY2ywretkH10JgyhXn1u.SIvXiiADLS5RPnViF.38yUO4HD2Yv6', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-22 07:52:15.746740'),
(71, 'losaynon', 'xander', 'b', 'xanderlosaynon@gmail.com', '(927) 977-2966', '$2y$10$Va4Kt8vWOJRqQ69xCC3krePSg4KFmtSl8wUmZTUr/2RBmrINnUgqe', 0, 0, 0, 0, 0, 0, 'verified', 'Registrar', '2023-05-09 05:44:37.510412');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
