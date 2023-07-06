-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 06:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
  `sample_id` int(250) NOT NULL,
  `hospital` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `units` int(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available`
--

INSERT INTO `available` (`sample_id`, `hospital`, `type`, `units`, `time`) VALUES
(1, 'a', 'O+', 3, '2022-09-02 11:06:27'),
(2, 'a', 'A+', 2, '2022-09-02 11:11:34'),
(3, 'a', 'AB+', 7, '2022-09-02 11:12:02'),
(4, 'a', 'B+', 16, '2022-09-02 11:13:49'),
(5, 'a', 'O-', 7, '2022-09-02 11:18:25'),
(6, 'a', 'A-', 25, '2022-09-02 11:20:20'),
(7, 'a', 'AB-', 20, '2022-09-02 11:37:35'),
(8, 'q', 'A-', 21, '2022-09-02 12:33:05'),
(9, 'q', 'AB-', 64, '2022-09-02 12:33:26'),
(10, 'hospital', 'O-', 16, '2022-09-02 16:02:07'),
(11, 'a', 'Blood Type', 6, '2022-09-02 16:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `req_id` int(250) NOT NULL,
  `sample` int(250) NOT NULL,
  `user` varchar(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(250) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`req_id`, `sample`, `user`, `time`, `status`) VALUES
(1, 10, 'z', '2022-09-02 16:02:54', 0),
(2, 10, 'w', '2022-09-02 16:06:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `type` text NOT NULL,
  `blood_group` varchar(250) DEFAULT NULL,
  `contact` int(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `type`, `blood_group`, `contact`, `time`) VALUES
(1, 'a', 'a', 'hospital', NULL, 1, '2022-09-01 07:19:38'),
(2, '1', '1', 'hospital', '', 1000000000, '2022-09-01 07:24:41'),
(3, '1', '1', 'hospital', '', 1000000000, '2022-09-01 07:25:18'),
(4, '1', '1', 'hospital', '', 1000000000, '2022-09-01 07:26:08'),
(5, 'z', 'z', 'receiver', '', 1000000000, '2022-09-02 05:44:33'),
(6, 'q', 'q', 'hospital', '', 1000000000, '2022-09-02 12:32:19'),
(7, 'w', 'w', 'receiver', '', 1000000000, '2022-09-02 12:35:25'),
(8, 'hospital', 'a', 'hospital', '', 1000000000, '2022-09-02 16:00:05'),
(9, 'a', 'a', 'hospital', '', 1000000000, '2022-09-02 16:19:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`sample_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `sample` (`sample`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available`
--
ALTER TABLE `available`
  MODIFY `sample_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `req_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`sample`) REFERENCES `available` (`sample_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
