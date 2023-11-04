-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 02:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `sno` int(11) NOT NULL,
  `msg` text NOT NULL,
  `room` text NOT NULL,
  `ip` text NOT NULL,
  `stime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`sno`, `msg`, `room`, `ip`, `stime`) VALUES
(70, 'find and u', '32ddsdsds', '::1', '2023-09-17 17:03:38'),
(71, 'find and u', '32ddsdsds', '::1', '2023-09-17 17:03:50'),
(72, 'find and u', '32ddsdsds', '::1', '2023-09-17 17:03:50'),
(73, 'find and u', '32ddsdsds', '::1', '2023-09-17 17:04:00'),
(74, 'find and u', '32ddsdsds', '::1', '2023-09-17 17:04:00'),
(75, '', '32ddsdsds', '::1', '2023-09-17 17:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `sno` int(11) NOT NULL,
  `roomname` text NOT NULL,
  `stime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`sno`, `roomname`, `stime`) VALUES
(1, 'room1', '2023-09-17 14:09:01'),
(2, 'dsasdsa', '2023-09-17 15:01:54'),
(3, 'room11', '2023-09-17 15:07:44'),
(4, 'sakshi', '2023-09-17 15:16:38'),
(5, 'sasasasasa', '2023-09-17 15:20:06'),
(6, 'sasasasasasasasa', '2023-09-17 15:22:07'),
(7, 'dsdsdsds', '2023-09-17 15:24:51'),
(8, 'sasaasasa', '2023-09-17 15:26:13'),
(9, 'werer', '2023-09-17 15:27:15'),
(10, 'erotir', '2023-09-17 15:27:50'),
(11, 'aweorew', '2023-09-17 15:32:18'),
(12, 'sareree', '2023-09-17 15:38:31'),
(13, '32ddsdsds', '2023-09-17 15:39:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
