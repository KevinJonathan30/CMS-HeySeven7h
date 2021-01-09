-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 10:32 AM
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
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heyseven7h_admin`
--

INSERT INTO `heyseven7h_admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '$2y$10$q5lrtGNmyoNhMptXUy.YbOqYoxZ7tOLHVPWRQkhRQaGabzp8KV5wS');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `heyseven7h_admin`
--
ALTER TABLE `heyseven7h_admin`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `heyseven7h_question`
--
ALTER TABLE `heyseven7h_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `heyseven7h_score`
--
ALTER TABLE `heyseven7h_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `heyseven7h_tryout`
--
ALTER TABLE `heyseven7h_tryout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
