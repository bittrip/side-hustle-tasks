-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 07:01 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(256) NOT NULL,
  `DESCRIPTION` varchar(2048) DEFAULT NULL,
  `CREATED_ON` datetime DEFAULT current_timestamp(),
  `MODIFIED_ON` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`ID`, `NAME`, `DESCRIPTION`, `CREATED_ON`, `MODIFIED_ON`) VALUES
(1, 'TESTING DB 001', 'TESTING DB 001', '2021-07-08 02:42:45', '2021-07-08 02:42:45'),
(2, 'TESTING DB 002', 'TESTING DB 002', '2021-07-08 02:43:12', '2021-07-08 02:43:12'),
(3, 'TESTING DB 003', 'TESTING DB 003', '2021-07-08 02:44:48', '2021-07-08 02:44:48'),
(4, 'TESTING DB 004', 'TESTING DB 004', '2021-07-08 03:43:35', '2021-07-08 03:43:56'),
(5, 'TESTING DB 005', 'TESTING DB 005', '2021-07-08 03:44:12', '2021-07-08 03:58:50'),
(6, 'TESTING DB 006', 'TESTING DB 006', '2021-07-08 03:53:24', '2021-07-08 05:32:41'),
(7, 'TESTING DB 007', 'TESTING DB 007', '2021-07-08 03:58:35', '2021-07-08 03:58:35'),
(8, 'TESTING DB 008', 'TESTING DB 008', '2021-07-08 04:53:28', '2021-07-08 04:53:28'),
(9, 'TESTING DB 009', 'TESTING DB 009', '2021-07-08 05:26:36', '2021-07-08 05:26:36'),
(12, 'TESTING DB 010', 'EDIT', '2021-07-08 05:56:16', '2021-07-08 05:56:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
