-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 12:57 PM
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
  `userid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answertbl`
--

INSERT INTO `answertbl` (`id`, `questionid`, `choice`, `optionname`, `userid`) VALUES
(83, 8, 'A', 'A. Consciousness', ''),
(84, 9, 'B', 'B. Negative reinforcement', ''),
(85, 10, 'C', 'C. Gestalt psychology', ''),
(86, 11, 'D', 'D. None of the above', ''),
(87, 12, 'B', 'B. Humanistic psychology', ''),
(88, 13, 'C', 'C. Calculus', ''),
(89, 8, 'A', 'A. Consciousness', ''),
(90, 9, 'B', 'B. Negative reinforcement', ''),
(91, 10, 'C', 'C. Gestalt psychology', ''),
(92, 11, 'D', 'D. None of the above', ''),
(93, 12, 'C', 'C. Psychoanalysis', ''),
(94, 13, 'B', 'B. Algebra', ''),
(95, 14, 'A', 'A. 2.718', ''),
(96, 15, 'D', 'D. None of the above', '');

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
  `questionAddedDT` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examinationtbl`
--

INSERT INTO `examinationtbl` (`id`, `uid`, `question`, `answer`, `option1`, `option2`, `option3`, `option4`, `questionAddedDT`) VALUES
(8, 'BS-Psych', 'What is the main focus of behaviorism?', 'B', 'A. Consciousness', 'B. Observable behavior', 'C. Unconscious mind', 'D. Subconscious mind', '2023-05-19 04:32:01.000000'),
(9, 'BS-Psych', 'Which of the following is associated with classical conditioning?', 'C', 'A. Positive reinforcement', 'B. Negative reinforcement', 'C. Pavlovian response', 'D. None of the above', '2023-05-19 04:32:01.000000'),
(10, 'BS-Psych', 'Which of the following is a key concept in social psychology?', 'A', 'A. Conformity', 'B. Operant conditioning', 'C. Gestalt psychology', 'D. None of the above', '2023-05-19 04:32:01.000000'),
(11, 'BS-Psych', 'What is the primary goal of cognitive psychology?', 'D', 'A. Understanding unconscious desires', 'B. Analyzing observable behavior', 'D. Examining mental processes', 'D. None of the above', '2023-05-19 04:32:01.000000'),
(12, 'BS-Psych', 'Which perspective in psychology focuses on self-actualization?', 'B', 'A. Behaviorism', 'B. Humanistic psychology', 'C. Psychoanalysis', 'D. None of the above', '2023-05-19 04:32:01.000000'),
(13, 'BS-Math', 'Which branch of mathematics studies the properties of shapes?', 'A', 'A. Geometry', 'B. Algebra', 'C. Calculus', 'D. None of the above', '2023-05-19 04:32:01.000000'),
(14, 'BS-Math', 'What is the value of π (pi)?', 'C', 'A. 2.718', 'B. 3.142', 'C. 3.14159', 'D. None of the above', '2023-05-19 04:32:01.000000'),
(15, 'BS-Math', 'What is the square root of 64?', 'B', 'A. 6', 'B. 8', 'C. 10', 'D. None of the above', '2023-05-19 04:32:01.000000'),
(16, 'BS-Math', 'Which mathematical notation represents the ratio of a circle\'s circumference to its diameter?', 'C', 'A. A = πr²', 'B. a² + b² = c²', 'C. C = πd', 'D. None of the above', '2023-05-19 04:32:01.000000'),
(17, 'BS-Math', 'What is the value of 2²?', 'D', 'A. 1', 'B. 2', 'D. 4', 'D. None of the above', '2023-05-19 04:32:01.000000'),
(18, 'BS-Psych', 'What is the main focus of behaviorism?', 'B', 'A. Consciousness', 'B. Observable behavior', 'C. Unconscious mind', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(19, 'BS-Psych', 'Which of the following is associated with classical conditioning?', 'C', 'A. Positive reinforcement', 'B. Negative reinforcement', 'C. Pavlovian response', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(20, 'BS-Psych', 'Which of the following is a key concept in social psychology?', 'A', 'A. Conformity', 'B. Operant conditioning', 'C. Gestalt psychology', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(21, 'BS-Psych', 'What is the primary goal of cognitive psychology?', 'D', 'A. Understanding unconscious desires', 'B. Analyzing observable behavior', 'D. Examining mental processes', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(22, 'BS-Psych', 'Which perspective in psychology focuses on self-actualization?', 'B', 'A. Behaviorism', 'B. Humanistic psychology', 'C. Psychoanalysis', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(23, 'BS-Math', 'Which branch of mathematics studies the properties of shapes?', 'A', 'A. Geometry', 'B. Algebra', 'C. Calculus', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(24, 'BS-Math', 'What is the value of π (pi)?', 'C', 'A. 2.718', 'B. 3.142', 'C. 3.14159', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(25, 'BS-Math', 'What is the square root of 64?', 'B', 'A. 6', 'B. 8', 'C. 10', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(26, 'BS-Math', 'Which mathematical notation represents the ratio of a circle\'s circumference to its diameter?', 'C', 'A. A = πr²', 'B. a² + b² = c²', 'C. C = πd', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(27, 'BS-Math', 'What is the value of 2²?', 'D', 'A. 1', 'B. 2', 'D. 4', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(28, 'BS-CS', 'Which programming language is used for web development?', 'B', 'A. Java', 'B. HTML', 'C. C++', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(29, 'BS-CS', 'What does SQL stand for?', 'C', 'A. Simple Query Language', 'B. Structured Query Logic', 'C. Structured Query Language', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(30, 'BS-CS', 'What is an algorithm?', 'A', 'A. A step-by-step procedure for solving a problem', 'B. A high-level programming language', 'C. A type of computer memory', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(31, 'BS-CS', 'Which data structure uses Last-In-First-Out (LIFO) order?', 'D', 'A. Queue', 'B. Tree', 'D. Stack', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(32, 'BS-CS', 'What does HTTP stand for?', 'C', 'A. HyperText Markup Protocol', 'B. HyperText Transfer Logic', 'C. HyperText Transfer Protocol', 'D. None of the above', '2023-05-19 04:32:26.000000'),
(33, 'BS-IS', 'What is the primary role of an information system?', 'C', 'A. Data analysis', 'B. Software development', 'C. Managing and processing information', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(34, 'BS-IS', 'What is the difference between data and information?', 'B', 'A. Data is processed information', 'B. Data is raw facts, and information is processed data', 'C. Data and information are the same', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(35, 'BS-IS', 'What is the purpose of a database management system (DBMS)?', 'A', 'A. Organizing and storing data', 'B. Designing user interfaces', 'C. Creating network infrastructure', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(36, 'BS-IS', 'What is the OSI model in computer networking?', 'D', 'A. A programming language', 'B. A database management system', 'D. A framework for understanding network protocols', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(37, 'BS-IS', 'What is the role of a system analyst?', 'C', 'A. Managing computer networks', 'B. Developing software applications', 'C. Analyzing and designing information systems', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(38, 'BS-IT', 'What is the purpose of an operating system?', 'B', 'A. Managing computer hardware', 'B. Managing computer software and resources', 'C. Developing computer networks', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(39, 'BS-IT', 'What is a firewall?', 'C', 'A. A hardware component of a computer', 'B. A programming language', 'C. A security system that monitors network traffic', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(40, 'BS-IT', 'What is cloud computing?', 'A', 'A. Storing and accessing data and programs over the internet', 'B. Programming software applications', 'C. Building computer networks', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(41, 'BS-IT', 'What is the purpose of encryption?', 'D', 'A. Managing computer networks', 'B. Developing software applications', 'D. Securing data by converting it into a coded form', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(42, 'BS-IT', 'What is the difference between a LAN and a WAN?', 'C', 'A. LAN is wireless, and WAN is wired', 'B. LAN is slower than WAN', 'C. LAN is a local network, and WAN is a wide area network', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(43, 'BS-EMC', 'What is the purpose of video editing software?', 'B', 'A. Creating 3D models', 'B. Editing and manipulating video footage', 'C. Designing user interfaces', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(44, 'BS-EMC', 'What is the role of a sound engineer?', 'C', 'A. Creating visual effects for movies', 'B. Programming video games', 'C. Recording, mixing, and mastering audio', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(45, 'BS-EMC', 'What is the difference between 2D and 3D animation?', 'A', 'A. 2D animation is flat, and 3D animation has depth and dimension', 'B. 2D animation is slower than 3D animation', 'C. 2D animation uses physical models, and 3D animation uses computer-generated models', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(46, 'BS-EMC', 'What is the purpose of graphic design software?', 'D', 'A. Creating music compositions', 'B. Writing code for software applications', 'D. Designing visual elements for print and digital media', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(47, 'BS-EMC', 'What is the role of a game designer?', 'B', 'A. Creating special effects for movies', 'B. Designing gameplay and mechanics for video games', 'C. Recording and producing music', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(48, 'BPA', 'What is public administration?', 'A', 'A. The study and implementation of government policies and programs', 'B. The management of private businesses', 'C. The practice of law in the public sector', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(49, 'BPA', 'What is the role of a public administrator?', 'B', 'A. Enforcing laws and regulations', 'B. Planning and implementing public policies', 'C. Conducting economic research', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(50, 'BPA', 'What are the key functions of public administration?', 'C', 'A. Marketing and advertising', 'B. Financial management', 'C. Policy formulation, implementation, and evaluation', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(51, 'BPA', 'What is bureaucratic accountability?', 'D', 'A. The responsibility of private companies to shareholders', 'B. The transparency of financial records', 'D. The obligation of public officials to answer for their actions', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(52, 'BPA', 'What are the challenges of public administration?', 'A', 'A. Balancing competing interests and limited resources', 'B. Maintaining political stability', 'C. Ensuring universal healthcare coverage', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(53, 'BPA-SP', 'What is the focus of the special program in public administration?', 'B', 'A. International relations', 'B. Nonprofit and community organizations', 'C. Environmental policy and advocacy', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(54, 'BPA-SP', 'What is social entrepreneurship?', 'C', 'A. The management of public funds', 'B. The study of political ideologies', 'C. Using business strategies to solve social problems', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(55, 'BPA-SP', 'What is community development?', 'D', 'A. The administration of public health programs', 'B. The management of public infrastructure projects', 'D. Empowering and improving the quality of life in local communities', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(56, 'BPA-SP', 'What is policy advocacy?', 'A', 'A. Promoting and influencing policies to address social issues', 'B. Evaluating the performance of public officials', 'C. Implementing government programs', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(57, 'BPA-SP', 'What is the role of a nonprofit organization in public administration?', 'B', 'A. Collecting taxes and managing public funds', 'B. Addressing social needs and providing community services', 'C. Conducting public opinion polls', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(58, 'BA-Comm', 'What is mass communication?', 'C', 'A. One-on-one communication between individuals', 'B. Communication within small groups', 'C. Communication to a large audience through various media channels', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(59, 'BA-Comm', 'What is the role of media in society?', 'A', 'A. Informing, entertaining, and shaping public opinion', 'B. Promoting commercial products', 'C. Conducting market research', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(60, 'BA-Comm', 'What is intercultural communication?', 'D', 'A. Communication between individuals of the same cultural background', 'B. Communication within a specific organization', 'D. Communication between individuals from different cultural backgrounds', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(61, 'BA-Comm', 'What is the purpose of public relations?', 'B', 'A. Managing internal communications within an organization', 'B. Building and maintaining a positive image for an organization', 'C. Conducting political campaigns', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(62, 'BA-Comm', 'What is the difference between verbal and nonverbal communication?', 'C', 'A. Verbal communication uses written language, and nonverbal communication uses spoken language', 'B. Verbal communication is more effective than nonverbal communication', 'C. Verbal communication uses words, and nonverbal communication uses gestures and body language', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(63, 'AB-PolSci', 'What is political science?', 'A', 'A. The study of government, political systems, and political behavior', 'B. The practice of law in the public sector', 'C. The analysis of economic systems', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(64, 'AB-PolSci', 'What is the difference between power and authority?', 'B', 'A. Power is legitimate, and authority is coercive', 'B. Power is the ability to influence others, and authority is the right to exercise power', 'C. Power and authority are the same', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(65, 'AB-PolSci', 'What is the role of a political scientist?', 'C', 'A. Enforcing laws and regulations', 'B. Developing public policies', 'C. Studying political systems and analyzing political behavior', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(66, 'AB-PolSci', 'What is the concept of sovereignty?', 'D', 'A. The separation of powers', 'B. The rule of law', 'D. The supreme authority of a state to govern itself', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(67, 'AB-PolSci', 'What are the different forms of government?', 'A', 'A. Democracy, monarchy, dictatorship, and republic', 'B. Communism, socialism, and capitalism', 'C. Totalitarianism, authoritarianism, and liberalism', 'D. None of the above', '2023-05-19 04:32:27.000000'),
(68, 'BS-Psych', 'What is cognitive psychology?', 'A', 'A. The study of mental processes such as perception, memory, and problem-solving', 'B. The analysis of human behavior in social settings', 'C. The study of abnormal psychology', 'D. The examination of conscious and unconscious mental processes', '2023-05-19 04:38:57.000000'),
(69, 'BS-Psych', 'What is the nature-nurture debate in psychology?', 'B', 'A. The influence of genetics on behavior', 'B. The debate about the relative importance of genetic and environmental factors in shaping behavior', 'C. The study of early childhood development', 'D. The study of human cognitive processes', '2023-05-19 04:38:57.000000'),
(70, 'BS-Psych', 'What is the bystander effect?', 'C', 'A. The tendency to conform to group norms', 'B. The experience of intense fear and anxiety', 'C. The phenomenon where individuals are less likely to help in an emergency situation when others are present', 'D. The effect of media on behavior', '2023-05-19 04:38:57.000000'),
(71, 'BS-Psych', 'What is operant conditioning?', 'D', 'A. The process of forming associations between stimuli and responses', 'B. The exploration of the unconscious mind', 'D. The learning process where behavior is strengthened through consequences', 'C. The study of human motivation', '2023-05-19 04:38:57.000000'),
(72, 'BS-Psych', 'What is social psychology?', 'A', 'A. The study of how individuals interact and influence each other', 'B. The analysis of personality traits and disorders', 'C. The study of brain functions and structure', 'D. The examination of human sensory perception', '2023-05-19 04:38:57.000000'),
(73, 'BS-Math', 'What is a prime number?', 'C', 'A. A number that can be divided by 2', 'B. A number that can be divided by 3', 'C. A number greater than 1 that has no divisors other than 1 and itself', 'D. A number that can be divided by 5', '2023-05-19 04:38:57.000000'),
(74, 'BS-Math', 'What is the value of pi (π)?', 'B', 'A. 3.1415', 'B. Approximately 3.14159', 'C. 3.14', 'D. 22/7', '2023-05-19 04:38:57.000000'),
(75, 'BS-Math', 'What is the Pythagorean theorem?', 'A', 'A. In a right-angled triangle, the square of the hypotenuse is equal to the sum of the squares of the other two sides', 'B. The sum of angles in a triangle is always 180 degrees', 'C. The ratio of the circumference of a circle to its diameter is constant', 'D. The formula for finding the area of a circle', '2023-05-19 04:38:57.000000'),
(76, 'BS-Math', 'What is a quadratic equation?', 'D', 'A. An equation with one variable', 'B. An equation with two variables', 'D. A polynomial equation of degree 2', 'C. An equation involving logarithms', '2023-05-19 04:38:57.000000'),
(77, 'BS-Math', 'What is the factorial of 0?', 'A', 'A. 1', 'B. 0', 'C. Undefined', 'D. Infinity', '2023-05-19 04:38:57.000000'),
(78, 'BS-CS', 'What is a programming language?', 'B', 'A. A language used for communication between computers', 'B. A formal language used to write instructions for computers to execute', 'C. A language used for designing user interfaces', 'D. A language used for creating databases', '2023-05-19 04:38:57.000000'),
(79, 'BS-CS', 'What is an algorithm?', 'C', 'A. A computer program', 'B. A computer virus', 'C. A step-by-step procedure or set of rules for solving a specific problem or accomplishing a specific task', 'D. A type of computer hardware', '2023-05-19 04:38:57.000000'),
(80, 'BS-CS', 'What is a variable in programming?', 'A', 'A. A named storage location that holds a value', 'B. A mathematical constant', 'C. A reserved keyword in programming languages', 'D. A type of programming error', '2023-05-19 04:38:57.000000'),
(81, 'BS-CS', 'What is object-oriented programming (OOP)?', 'D', 'A. A programming language used for web development', 'B. A programming paradigm based on procedural programming', 'D. A programming approach that models concepts as objects', 'C. A programming technique for optimizing code execution', '2023-05-19 04:38:57.000000'),
(82, 'BS-CS', 'What is a database?', 'B', 'A. A software tool used for editing images', 'B. A structured collection of data stored and organized in a computer system', 'C. A programming language used for creating websites', 'D. A hardware component of a computer', '2023-05-19 04:38:57.000000'),
(83, 'BS-IS', 'What is information system?', 'C', 'A. A system for organizing files and folders on a computer', 'B. A set of computer programs used to manage business operations', 'C. A combination of people, processes, and technology that interact to collect, process, store, and disseminate information to support decision-making', 'D. A software application used for creating presentations', '2023-05-19 04:38:57.000000'),
(84, 'BS-IS', 'What is a database management system?', 'A', 'A. Software that allows users to create, manipulate, and manage databases', 'B. A hardware component used to store data', 'C. A programming language used for web development', 'D. A network protocol for transferring files over the internet', '2023-05-19 04:38:57.000000'),
(85, 'BS-IS', 'What is data mining?', 'D', 'A. The process of storing data in a secure and encrypted format', 'B. The process of removing duplicate data from a database', 'C. The process of transforming data into information', 'D. The process of discovering patterns and relationships in large datasets', '2023-05-19 04:38:57.000000'),
(86, 'BS-IS', 'What is system development life cycle (SDLC)?', 'B', 'A. The process of designing user interfaces for software applications', 'B. A framework for describing the phases involved in developing and maintaining information systems', 'C. The process of managing computer networks', 'D. A project management technique used in software development', '2023-05-19 04:38:57.000000'),
(87, 'BS-IS', 'What is cloud computing?', 'A', 'A. The delivery of computing services over the internet', 'B. The process of creating backups of computer files', 'C. The study of computer networks', 'D. The process of optimizing computer performance', '2023-05-19 04:38:57.000000'),
(88, 'BS-IT', 'What is information technology?', 'D', 'A. The process of designing and constructing buildings', 'B. The study of electrical circuits and systems', 'C. The process of repairing computer hardware', 'D. The use of computers and telecommunications equipment to store, retrieve, transmit, and manipulate data', '2023-05-19 04:38:57.000000'),
(89, 'BS-IT', 'What is computer networking?', 'C', 'A. The process of designing user interfaces for software applications', 'B. The study of computer algorithms', 'C. The practice of connecting computers and other devices to create networks', 'D. The study of computer viruses and malware', '2023-05-19 04:38:57.000000'),
(90, 'BS-IT', 'What is cybersecurity?', 'A', 'A. The practice of protecting computer systems and data from unauthorized access, use, disclosure, disruption, modification, or destruction', 'B. The study of computer hardware components', 'C. The process of creating computer programs', 'D. The study of human-computer interaction', '2023-05-19 04:38:57.000000'),
(91, 'BS-IT', 'What is software engineering?', 'B', 'A. The process of managing computer networks', 'B. The application of engineering principles to the design, development, testing, and maintenance of software systems', 'C. The study of computer graphics and animation', 'D. The process of optimizing computer performance', '2023-05-19 04:38:57.000000'),
(92, 'BS-IT', 'What is data analytics?', 'C', 'A. The process of creating backups of computer files', 'B. The study of computer viruses and malware', 'C. The practice of examining and interpreting data to extract valuable insights and information', 'D. The study of computer algorithms', '2023-05-19 04:38:57.000000'),
(93, 'BS-EMC', 'What is multimedia?', 'B', 'A. The study of human-computer interaction', 'B. The integration of different forms of media such as text, audio, images, and video', 'C. The process of designing and constructing buildings', 'D. The study of electrical circuits and systems', '2023-05-19 04:38:57.000000'),
(94, 'BS-EMC', 'What is digital imaging?', 'A', 'A. The process of creating, manipulating, and enhancing digital images', 'B. The study of computer networks', 'C. The process of repairing computer hardware', 'D. The practice of connecting computers and other devices to create networks', '2023-05-19 04:38:57.000000'),
(95, 'BS-EMC', 'What is game development?', 'D', 'A. The practice of protecting computer systems and data from unauthorized access', 'B. The study of computer hardware components', 'C. The process of creating computer programs', 'D. The process of designing and creating interactive digital games', '2023-05-19 04:38:57.000000'),
(96, 'BS-EMC', 'What is animation?', 'C', 'A. The process of designing user interfaces for software applications', 'B. The study of computer algorithms', 'C. The process of creating the illusion of movement through a series of images', 'D. The study of computer viruses and malware', '2023-05-19 04:38:57.000000'),
(97, 'BS-EMC', 'What is digital audio?', 'A', 'A. Sound represented as a numerical value that can be stored and manipulated by a computer', 'B. The practice of examining and interpreting data to extract valuable insights and information', 'C. The study of computer graphics and animation', 'D. The process of optimizing computer performance', '2023-05-19 04:38:57.000000'),
(98, 'BS-PubAdmin', 'What is public administration?', 'D', 'A. The study of public speaking and communication', 'B. The process of managing public transportation systems', 'C. The study of political ideologies and systems', 'D. The implementation of government policies and programs to serve the public', '2023-05-19 04:38:57.000000'),
(99, 'BS-PubAdmin', 'What is public policy?', 'C', 'A. The process of designing and constructing public buildings', 'B. The study of international relations', 'C. The course of action or inaction chosen by public authorities to address a particular issue', 'D. The study of economic systems', '2023-05-19 04:38:57.000000'),
(100, 'BS-PubAdmin', 'What is bureaucratic accountability?', 'B', 'A. The study of public opinion and polling', 'B. The obligation of public officials to provide an account of their actions and decisions', 'C. The process of creating government budgets', 'D. The study of urban planning and development', '2023-05-19 04:38:57.000000'),
(101, 'BS-PubAdmin', 'What is public budgeting?', 'A', 'A. The process of allocating and managing public funds', 'B. The study of public health systems', 'C. The practice of organizing public events and celebrations', 'D. The study of social welfare policies', '2023-05-19 04:38:57.000000'),
(102, 'BS-PubAdmin', 'What is administrative law?', 'D', 'A. The study of diplomatic relations between countries', 'B. The process of implementing public infrastructure projects', 'C. The study of public opinion and polling', 'D. The body of law that governs the actions of administrative agencies and ensures procedural fairness', '2023-05-19 04:38:57.000000'),
(103, 'BS-Comm', 'What is mass communication?', 'B', 'A. The study of human communication in intimate relationships', 'B. The process of creating and disseminating messages to a large audience through various media channels', 'C. The study of nonverbal communication', 'D. The practice of managing public relations for organizations', '2023-05-19 04:38:58.000000'),
(104, 'BS-Comm', 'What is journalism?', 'C', 'A. The study of advertising and marketing strategies', 'B. The process of designing and producing visual communication materials', 'C. The profession of gathering, assessing, creating, and presenting news and information to the public', 'D. The practice of conducting surveys and collecting data', '2023-05-19 04:38:58.000000'),
(105, 'BS-Comm', 'What is media ethics?', 'D', 'A. The study of political ideologies and systems', 'B. The process of planning and organizing events', 'C. The practice of conducting interviews and focus groups', 'D. The principles and standards that guide the responsible and ethical use of media', '2023-05-19 04:38:58.000000'),
(106, 'BS-Comm', 'What is public relations?', 'A', 'A. The practice of managing communication between an organization and its stakeholders to build and maintain a positive image', 'B. The study of interpersonal communication in organizational settings', 'C. The process of creating and managing online content', 'D. The study of human communication in legal contexts', '2023-05-19 04:38:58.000000'),
(107, 'BS-Comm', 'What is visual communication?', 'C', 'A. The study of nonverbal communication', 'B. The process of creating and disseminating messages through audio recordings', 'C. The practice of creating and presenting visual messages using various media', 'D. The study of communication disorders', '2023-05-19 04:38:58.000000'),
(108, 'BS-Psych', 'What is cognitive psychology?', 'A', 'A. The study of mental processes such as perception, memory, and problem-solving', 'B. The analysis of human behavior in social settings', 'C. The study of abnormal psychology', 'D. The examination of conscious and unconscious mental processes', '2023-05-19 04:50:54.000000'),
(109, 'BS-Psych', 'What is the nature-nurture debate in psychology?', 'B', 'A. The influence of genetics on behavior', 'B. The debate about the relative importance of genetic and environmental factors in shaping behavior', 'C. The study of early childhood development', 'D. The study of human cognitive processes', '2023-05-19 04:50:54.000000'),
(110, 'BS-Psych', 'What is the bystander effect?', 'C', 'A. The tendency to conform to group norms', 'B. The experience of intense fear and anxiety', 'C. The phenomenon where individuals are less likely to help in an emergency situation when others are present', 'D. The effect of media on behavior', '2023-05-19 04:50:54.000000'),
(111, 'BS-Psych', 'What is operant conditioning?', 'D', 'A. The process of forming associations between stimuli and responses', 'B. The exploration of the unconscious mind', 'D. The learning process where behavior is strengthened through consequences', 'C. The study of human motivation', '2023-05-19 04:50:54.000000'),
(112, 'BS-Psych', 'What is social psychology?', 'A', 'A. The study of how individuals interact and influence each other', 'B. The analysis of personality traits and disorders', 'C. The study of brain functions and structure', 'D. The examination of human sensory perception', '2023-05-19 04:50:54.000000'),
(113, 'BS-Math', 'What is a prime number?', 'C', 'A. A number that can be divided by 2', 'B. A number that can be divided by 3', 'C. A number greater than 1 that has no divisors other than 1 and itself', 'D. A number that can be divided by 5', '2023-05-19 04:50:54.000000'),
(114, 'BS-Math', 'What is the value of pi (π)?', 'B', 'A. 3.1415', 'B. Approximately 3.14159', 'C. 3.14', 'D. 22/7', '2023-05-19 04:50:54.000000'),
(115, 'BS-Math', 'What is the Pythagorean theorem?', 'A', 'A. In a right-angled triangle, the square of the hypotenuse is equal to the sum of the squares of the other two sides', 'B. The sum of angles in a triangle is always 180 degrees', 'C. The ratio of the circumference of a circle to its diameter is constant', 'D. The formula for finding the area of a circle', '2023-05-19 04:50:54.000000'),
(116, 'BS-Math', 'What is a quadratic equation?', 'D', 'A. An equation with one variable', 'B. An equation with two variables', 'D. A polynomial equation of degree 2', 'C. An equation involving logarithms', '2023-05-19 04:50:54.000000'),
(117, 'BS-Math', 'What is the factorial of 0?', 'A', 'A. 1', 'B. 0', 'C. Undefined', 'D. Infinity', '2023-05-19 04:50:54.000000'),
(118, 'BS-CS', 'What is a programming language?', 'B', 'A. A language used for communication between computers', 'B. A formal language used to write instructions for computers to execute', 'C. A language used for designing user interfaces', 'D. A language used for creating databases', '2023-05-19 04:50:55.000000'),
(119, 'BS-CS', 'What is an algorithm?', 'C', 'A. A computer program', 'B. A computer virus', 'C. A step-by-step procedure or set of rules for solving a specific problem or accomplishing a specific task', 'D. A type of computer hardware', '2023-05-19 04:50:55.000000'),
(120, 'BS-CS', 'What is a variable in programming?', 'A', 'A. A named storage location that holds a value', 'B. A mathematical constant', 'C. A reserved keyword in programming languages', 'D. A type of programming error', '2023-05-19 04:50:55.000000'),
(121, 'BS-CS', 'What is object-oriented programming (OOP)?', 'D', 'A. A programming language used for web development', 'B. A programming paradigm based on procedural programming', 'D. A programming approach that models concepts as objects', 'C. A programming technique for optimizing code execution', '2023-05-19 04:50:55.000000'),
(122, 'BS-CS', 'What is a database?', 'B', 'A. A software tool used for editing images', 'B. A structured collection of data stored and organized in a computer system', 'C. A programming language used for creating websites', 'D. A hardware component of a computer', '2023-05-19 04:50:55.000000'),
(123, 'BS-IS', 'What is information system?', 'C', 'A. A system for organizing files and folders on a computer', 'B. A set of computer programs used to manage business operations', 'C. A combination of people, processes, and technology that interact to collect, process, store, and disseminate information to support decision-making', 'D. A software application used for creating presentations', '2023-05-19 04:50:55.000000'),
(124, 'BS-IS', 'What is a database management system?', 'A', 'A. Software that allows users to create, manipulate, and manage databases', 'B. A hardware component used to store data', 'C. A programming language used for web development', 'D. A network protocol for transferring files over the internet', '2023-05-19 04:50:55.000000'),
(125, 'BS-IS', 'What is data mining?', 'D', 'A. The process of storing data in a secure and encrypted format', 'B. The process of removing duplicate data from a database', 'C. The process of transforming data into information', 'D. The process of discovering patterns and relationships in large datasets', '2023-05-19 04:50:55.000000'),
(126, 'BS-IS', 'What is system development life cycle (SDLC)?', 'B', 'A. The process of designing user interfaces for software applications', 'B. A framework for describing the phases involved in developing and maintaining information systems', 'C. The process of managing computer networks', 'D. A project management technique used in software development', '2023-05-19 04:50:55.000000'),
(127, 'BS-IS', 'What is cloud computing?', 'A', 'A. The delivery of computing services over the internet', 'B. The process of creating backups of computer files', 'C. The study of computer networks', 'D. The process of optimizing computer performance', '2023-05-19 04:50:55.000000'),
(128, 'BS-IT', 'What is information technology?', 'D', 'A. The process of designing and constructing buildings', 'B. The study of electrical circuits and systems', 'C. The process of repairing computer hardware', 'D. The use of computers and telecommunications equipment to store, retrieve, transmit, and manipulate data', '2023-05-19 04:50:55.000000'),
(129, 'BS-IT', 'What is computer networking?', 'C', 'A. The process of designing user interfaces for software applications', 'B. The study of computer algorithms', 'C. The practice of connecting computers and other devices to create networks', 'D. The study of computer viruses and malware', '2023-05-19 04:50:55.000000'),
(130, 'BS-IT', 'What is cybersecurity?', 'A', 'A. The practice of protecting computer systems and data from unauthorized access, use, disclosure, disruption, modification, or destruction', 'B. The study of computer hardware components', 'C. The process of creating computer programs', 'D. The study of human-computer interaction', '2023-05-19 04:50:55.000000'),
(131, 'BS-IT', 'What is software engineering?', 'B', 'A. The process of managing computer networks', 'B. The application of engineering principles to the design, development, testing, and maintenance of software systems', 'C. The study of computer graphics and animation', 'D. The process of optimizing computer performance', '2023-05-19 04:50:55.000000'),
(132, 'BS-IT', 'What is data analytics?', 'C', 'A. The process of creating backups of computer files', 'B. The study of computer viruses and malware', 'C. The practice of examining and interpreting data to extract valuable insights and information', 'D. The study of computer algorithm', '2023-05-19 04:50:55.000000'),
(133, 'BS-EMC', 'What is multimedia?', 'B', 'A. The study of human-computer interaction', 'B. The integration of different forms of media such as text, audio, images, and video', 'C. The process of designing and constructing buildings', 'D. The study of electrical circuits and systems', '2023-05-19 04:50:55.000000'),
(134, 'BS-EMC', 'What is digital imaging?', 'A', 'A. The process of creating, manipulating, and enhancing digital images', 'B. The study of computer networks', 'C. The process of repairing computer hardware', 'D. The practice of connecting computers and other devices to create networks', '2023-05-19 04:50:55.000000'),
(135, 'BS-EMC', 'What is game development?', 'D', 'A. The practice of protecting computer systems and data from unauthorized access', 'B. The study of computer hardware components', 'C. The process of creating computer programs', 'D. The process of designing and creating interactive digital games', '2023-05-19 04:50:55.000000'),
(136, 'BS-EMC', 'What is animation?', 'C', 'A. The process of designing user interfaces for software applications', 'B. The study of computer algorithms', 'C. The process of creating the illusion of movement through a series of images', 'D. The study of computer viruses and malware', '2023-05-19 04:50:55.000000'),
(137, 'BS-EMC', 'What is digital audio?', 'A', 'A. Sound represented as a numerical value that can be stored and manipulated by a computer', 'B. The practice of examining and interpreting data to extract valuable insights and information', 'C. The study of computer graphics and animation', 'D. The process of optimizing computer performance', '2023-05-19 04:50:55.000000'),
(138, 'BS-PubAdmin', 'What is public administration?', 'D', 'A. The study of public speaking and communication', 'B. The process of managing public transportation systems', 'C. The study of political ideologies and systems', 'D. The implementation of government policies and programs to serve the public', '2023-05-19 04:50:55.000000'),
(139, 'BS-PubAdmin', 'What is public policy?', 'C', 'A. The process of designing and constructing public buildings', 'B. The study of international relations', 'C. The course of action or inaction chosen by public authorities to address a particular issue', 'D. The study of economic systems', '2023-05-19 04:50:55.000000'),
(140, 'BS-PubAdmin', 'What is bureaucratic accountability?', 'B', 'A. The study of public opinion and polling', 'B. The obligation of public officials to provide an account of their actions and decisions', 'C. The process of creating government budgets', 'D. The study of urban planning and development', '2023-05-19 04:50:55.000000'),
(141, 'BS-PubAdmin', 'What is public budgeting?', 'A', 'A. The process of allocating and managing public funds', 'B. The study of public health systems', 'C. The practice of organizing public events and celebrations', 'D. The study of social welfare policies', '2023-05-19 04:50:55.000000'),
(142, 'BS-PubAdmin', 'What is administrative law?', 'D', 'A. The study of diplomatic relations between countries', 'B. The process of implementing public infrastructure projects', 'C. The study of public opinion and polling', 'D. The body of law that governs the actions of administrative agencies and ensures procedural fairness', '2023-05-19 04:50:55.000000'),
(154, '646f2e49ed1a7', '123', '', '123', '123', '123', '123', '2023-05-25 17:45:45.971861'),
(155, '646f2f5a4c73b', '', '', '', '', '', '', '2023-05-25 17:50:18.313682'),
(156, '646f32e231d5f', 'dfasdfsa', '', 'a', 'b', 'c', 'd', '2023-05-25 18:05:22.204697');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `examinationtbl`
--
ALTER TABLE `examinationtbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

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
