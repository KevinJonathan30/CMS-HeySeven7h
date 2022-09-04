-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2022 at 10:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heyseven7h`
--

-- --------------------------------------------------------

--
-- Table structure for table `heyseven7h_admin`
--

CREATE TABLE `heyseven7h_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heyseven7h_admin`
--

INSERT INTO `heyseven7h_admin` (`id`, `name`, `username`, `password`, `role`) VALUES
(2, 'Seven7h Edu Course', 'admin', '$2y$10$cBnq54JXITHKnt8HTHxzDO7O/KiZh32H2StbRAvnbkUTHZ8ZSyGem', 0),
(4, 'Kevin Jonathan', 'kevinjo30', '$2y$10$svo2xNwGhZ7sctSl.F/kSOAAB1lBG7Mkgbayiq9GKCux9Mux0VtL2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `heyseven7h_attendance`
--

CREATE TABLE `heyseven7h_attendance` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cal1` varchar(10) NOT NULL,
  `cal2` varchar(10) NOT NULL,
  `cal3` varchar(10) NOT NULL,
  `cal4` varchar(10) NOT NULL,
  `cal5` varchar(10) NOT NULL,
  `cal6` varchar(10) NOT NULL,
  `cal7` varchar(10) NOT NULL,
  `cal8` varchar(10) NOT NULL,
  `cal9` varchar(10) NOT NULL,
  `cal10` varchar(10) NOT NULL,
  `cal11` varchar(10) NOT NULL,
  `cal12` varchar(10) NOT NULL,
  `cal13` varchar(10) NOT NULL,
  `cal14` varchar(10) NOT NULL,
  `cal15` varchar(10) NOT NULL,
  `cal16` varchar(10) NOT NULL,
  `cal17` varchar(10) NOT NULL,
  `cal18` varchar(10) NOT NULL,
  `cal19` varchar(10) NOT NULL,
  `cal20` varchar(10) NOT NULL,
  `cal21` varchar(10) NOT NULL,
  `cal22` varchar(10) NOT NULL,
  `cal23` varchar(10) NOT NULL,
  `cal24` varchar(10) NOT NULL,
  `cal25` varchar(10) NOT NULL,
  `cal26` varchar(10) NOT NULL,
  `cal27` varchar(10) NOT NULL,
  `cal28` varchar(10) NOT NULL,
  `cal29` varchar(10) NOT NULL,
  `cal30` varchar(10) NOT NULL,
  `cal31` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heyseven7h_attendance`
--

INSERT INTO `heyseven7h_attendance` (`id`, `name`, `cal1`, `cal2`, `cal3`, `cal4`, `cal5`, `cal6`, `cal7`, `cal8`, `cal9`, `cal10`, `cal11`, `cal12`, `cal13`, `cal14`, `cal15`, `cal16`, `cal17`, `cal18`, `cal19`, `cal20`, `cal21`, `cal22`, `cal23`, `cal24`, `cal25`, `cal26`, `cal27`, `cal28`, `cal29`, `cal30`, `cal31`) VALUES
(2, 'Budi', '', '', '', '', 'Mat', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Andi', '', 'Fis', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'Ani', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `heyseven7h_private_attendance`
--

CREATE TABLE `heyseven7h_private_attendance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `subject` varchar(100) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `heyseven7h_question`
--

CREATE TABLE `heyseven7h_question` (
  `id` int(11) NOT NULL,
  `question` varchar(2048) NOT NULL,
  `answerA` varchar(1024) NOT NULL,
  `answerB` varchar(1024) NOT NULL,
  `answerC` varchar(1024) NOT NULL,
  `answerD` varchar(1024) NOT NULL,
  `answerE` varchar(1024) NOT NULL,
  `correctAnswer` varchar(1) NOT NULL,
  `tryout_id` int(11) DEFAULT NULL,
  `pembahasan` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `heyseven7h_score`
--

CREATE TABLE `heyseven7h_score` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `score` double NOT NULL,
  `dateSubmitted` varchar(100) NOT NULL,
  `tryout_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heyseven7h_score`
--

INSERT INTO `heyseven7h_score` (`id`, `name`, `score`, `dateSubmitted`, `tryout_id`) VALUES
(8, 'a', 100, '2021-03-30 11:06:33pm', 14);

-- --------------------------------------------------------

--
-- Table structure for table `heyseven7h_student`
--

CREATE TABLE `heyseven7h_student` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `priceperhour` int(11) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heyseven7h_student`
--

INSERT INTO `heyseven7h_student` (`id`, `name`, `address`, `phone`, `priceperhour`, `tutor_id`) VALUES
(3, 'Ryan', 'babatan pratama', '081', 75000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `heyseven7h_tryout`
--

CREATE TABLE `heyseven7h_tryout` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `linkTo` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heyseven7h_tryout`
--

INSERT INTO `heyseven7h_tryout` (`id`, `name`, `time`, `linkTo`) VALUES
(14, 'aaa', 0, 'None');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `heyseven7h_admin`
--
ALTER TABLE `heyseven7h_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heyseven7h_attendance`
--
ALTER TABLE `heyseven7h_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heyseven7h_private_attendance`
--
ALTER TABLE `heyseven7h_private_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heyseven7h_question`
--
ALTER TABLE `heyseven7h_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heyseven7h_score`
--
ALTER TABLE `heyseven7h_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heyseven7h_student`
--
ALTER TABLE `heyseven7h_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heyseven7h_tryout`
--
ALTER TABLE `heyseven7h_tryout`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `heyseven7h_admin`
--
ALTER TABLE `heyseven7h_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `heyseven7h_attendance`
--
ALTER TABLE `heyseven7h_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `heyseven7h_private_attendance`
--
ALTER TABLE `heyseven7h_private_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `heyseven7h_question`
--
ALTER TABLE `heyseven7h_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `heyseven7h_score`
--
ALTER TABLE `heyseven7h_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `heyseven7h_student`
--
ALTER TABLE `heyseven7h_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `heyseven7h_tryout`
--
ALTER TABLE `heyseven7h_tryout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
