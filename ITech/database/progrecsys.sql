-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 05:32 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progrecsys`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `answertbl`
--

CREATE TABLE `answertbl` (
  `id` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `choice` varchar(11) NOT NULL,
  `optionname` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answertbl`
--

INSERT INTO `answertbl` (`id`, `questionid`, `choice`, `optionname`, `userid`, `useremail`) VALUES
(160, 8, 'A', 'A. Consciousness', '', ''),
(161, 9, 'B', 'B. Negative reinforcement', '', ''),
(162, 9, 'B', 'B. Negative reinforcement', '', ''),
(163, 10, 'C', 'C. Gestalt psychology', '', ''),
(164, 11, 'D', 'D. None of the above', '', ''),
(165, 12, 'B', 'B. Humanistic psychology', '', ''),
(166, 13, 'A', 'A. Geometry', '', ''),
(167, 14, 'C', 'C. 3.14159', '', ''),
(168, 15, 'A', 'A. 6', '', '');

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
  `program` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examinationtbl`
--

INSERT INTO `examinationtbl` (`id`, `uid`, `question`, `answer`, `option1`, `option2`, `option3`, `option4`, `questionAddedDT`, `program`) VALUES
(133, 'BS-EMC', 'What is multimedia?', 'B', 'A. The study of human-computer interaction', 'B. The integration of different forms of media such as text, audio, images, and video', 'C. The process of designing and constructing buildings', 'D. The study of electrical circuits and systems', '2023-05-19 04:50:55.000000', ''),
(134, 'BS-EMC', 'What is digital imaging?', 'A', 'A. The process of creating, manipulating, and enhancing digital images', 'B. The study of computer networks', 'C. The process of repairing computer hardware', 'D. The practice of connecting computers and other devices to create networks', '2023-05-19 04:50:55.000000', ''),
(135, 'BS-EMC', 'What is game development?', 'D', 'A. The practice of protecting computer systems and data from unauthorized access', 'B. The study of computer hardware components', 'C. The process of creating computer programs', 'D. The process of designing and creating interactive digital games', '2023-05-19 04:50:55.000000', ''),
(136, 'BS-EMC', 'What is animation?', 'C', 'A. The process of designing user interfaces for software applications', 'B. The study of computer algorithms', 'C. The process of creating the illusion of movement through a series of images', 'D. The study of computer viruses and malware', '2023-05-19 04:50:55.000000', ''),
(137, 'BS-EMC', 'What is digital audio?', 'A', 'A. Sound represented as a numerical value that can be stored and manipulated by a computer', 'B. The practice of examining and interpreting data to extract valuable insights and information', 'C. The study of computer graphics and animation', 'D. The process of optimizing computer performance', '2023-05-19 04:50:55.000000', ''),
(138, 'BS-PubAdmin', 'What is public administration?', 'D', 'A. The study of public speaking and communication', 'B. The process of managing public transportation systems', 'C. The study of political ideologies and systems', 'D. The implementation of government policies and programs to serve the public', '2023-05-19 04:50:55.000000', ''),
(139, 'BS-PubAdmin', 'What is public policy?', 'C', 'A. The process of designing and constructing public buildings', 'B. The study of international relations', 'C. The course of action or inaction chosen by public authorities to address a particular issue', 'D. The study of economic systems', '2023-05-19 04:50:55.000000', ''),
(140, 'BS-PubAdmin', 'What is bureaucratic accountability?', 'B', 'A. The study of public opinion and polling', 'B. The obligation of public officials to provide an account of their actions and decisions', 'C. The process of creating government budgets', 'D. The study of urban planning and development', '2023-05-19 04:50:55.000000', ''),
(141, 'BS-PubAdmin', 'What is public budgeting?', 'A', 'A. The process of allocating and managing public funds', 'B. The study of public health systems', 'C. The practice of organizing public events and celebrations', 'D. The study of social welfare policies', '2023-05-19 04:50:55.000000', ''),
(142, 'BS-PubAdmin', 'What is administrative law?', 'D', 'A. The study of diplomatic relations between countries', 'B. The process of implementing public infrastructure projects', 'C. The study of public opinion and polling', 'D. The body of law that governs the actions of administrative agencies and ensures procedural fairness', '2023-05-19 04:50:55.000000', ''),
(166, '6470cd8de699b', '', 'A', '', '', '', '', '2023-05-26 23:17:33.944644', 'BSEMC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `f_name` varchar(10) CHARACTER SET utf16 NOT NULL,
  `l_name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 NOT NULL,
  `session` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(7) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `firstName` varchar(150) NOT NULL,
  `middleInitial` varchar(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` int(1) NOT NULL,
  `code1` int(1) NOT NULL,
  `code2` int(1) NOT NULL,
  `code3` int(1) NOT NULL,
  `code4` int(1) NOT NULL,
  `code5` int(1) NOT NULL,
  `status` text NOT NULL,
  `role` text NOT NULL,
  `otp_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `lastName`, `firstName`, `middleInitial`, `email`, `phoneNumber`, `password`, `code`, `code1`, `code2`, `code3`, `code4`, `code5`, `status`, `role`, `otp_time`) VALUES
(28, 'Perdigon', 'John Stephen', '', 'perdigonjohnstephen@gmail.com', '9292305957', '$2y$10$MygAblXekn5Dr9SVbLOdQ.0GAFDJcMPeONVdH5PM/n/BYIE/4NJP2', 0, 0, 0, 0, 0, 0, 'verified', 'Admin', '2023-04-01 15:35:56.914648'),
(35, 'Perdigon', 'John Stephen ', '', 'entertainmentcore22@gmail.com', '9292305957', '$2y$10$qvLVowuYxwBaj7Gyk8VU/.ivJqov8h9PLjPtNQGfAc97JTv7Sw9XO', 0, 0, 0, 0, 0, 0, 'verified', '', '2023-04-01 15:35:56.914648'),
(36, 'mariano', 'ervin', '', 'ervinjeffersonmariano@gmail.com', '956841705', '$2y$10$HOG.IBF6XlRPtosUn7BH4uYdAK86lVbvgDt2CriD1m62cUSPXI2wy', 0, 0, 0, 0, 0, 0, 'verified', '', '2023-04-01 15:35:56.914648'),
(42, 'Perdigon', 'John Stephen', '', 'tsinelasisthename@gmail.com', '9292305957', '$2y$10$rpLnwOnSDIMzRkv5z.7IQeEAleR735wtDEF89LInX8u1kZxbLP.2W', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-01 15:35:56.914648'),
(43, 'Audencial', 'Ria', '', 'audencialria@gmail.com', '(929) 230-5957', '$2y$10$hdICsYzC7Qt5cB56CIPtYuzVVGpDCjg5AZSM7d50uAV91EZNL0Anq', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-01 15:35:56.914648'),
(45, 'Villamin', 'Ashlly', '', 'villamin.nicoleashllybsit2020@gmail.com', '(929) 230-5957', '$2y$10$W/5sUyu8s6yz74v/MmwuLeLklZTR71WqndkjE/bwxu2RHxQMXJuxu', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-01 15:35:56.914648'),
(46, 'Fontanilla', 'Yra', '', 'terkoiz07@gmail.com', '(929) 230-5957', '$2y$10$U/N6cG5Tc0maDiFG2eRZyu.6cbQkd2H7haagoHH2SEJxx4gt3jZzC', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-01 15:35:56.914648'),
(48, 'Acuzar', 'Pippen', '', 'tsinelassssss@gmail.com', '(929) 239-5957', '$2y$10$hlUNBRNIXWqa99nsYNol1ebF9lv8m0jyJAlGn4fOyhjeRSMx4wQga', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-02 13:48:09.370490'),
(49, 'losaynon', 'alexander', '', 'alexanderlosaynonII@gmail.com', '(927) 977-2966', '$2y$10$x2fcjmIblZ.TcFz3.csfOOCgcXwIDE0KbbuaEAh9wvYRMbpcIopkG', 0, 0, 0, 0, 0, 0, 'verified', 'Admin', '2023-04-02 15:15:52.954100'),
(54, 'Barrios', 'Joemen', 'G.', 'joemen.barrios@gmail.com', '(929) 343-4038', '$2y$10$3hjRCcU9vtmzjJxScl65XeTN.C7bAYoPxvs4y6yuxEmk9hR81VyRK', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-03 07:31:23.291443'),
(55, 'losaynon', 'alexander', '', 'alexanderlosaynon@gmail.com', '(927) 977-2966', '$2y$10$iGZY2ywretkH10JgyhXn1u.SIvXiiADLS5RPnViF.38yUO4HD2Yv6', 0, 0, 0, 0, 0, 0, 'verified', 'Student', '2023-04-22 15:52:15.746740'),
(71, 'losaynon', 'xander', 'b', 'xanderlosaynon@gmail.com', '(927) 977-2966', '$2y$10$Va4Kt8vWOJRqQ69xCC3krePSg4KFmtSl8wUmZTUr/2RBmrINnUgqe', 9, 9, 6, 7, 5, 7, 'notverified', 'Student', '2023-05-09 13:44:37.510412');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answertbl`
--
ALTER TABLE `answertbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examinationtbl`
--
ALTER TABLE `examinationtbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `answertbl`
--
ALTER TABLE `answertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `examinationtbl`
--
ALTER TABLE `examinationtbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
