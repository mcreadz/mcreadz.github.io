-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 11:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calculator`
--

-- --------------------------------------------------------

--
-- Table structure for table `formsubmit`
--

CREATE TABLE `formsubmit` (
  `id` int(11) NOT NULL,
  `guest2` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `operation2` varchar(255) NOT NULL,
  `answer2` float NOT NULL,
  `timedate2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formsubmit`
--

INSERT INTO `formsubmit` (`id`, `guest2`, `email2`, `operation2`, `answer2`, `timedate2`) VALUES
(1, 'Tester T. Testing', 'test@demo.com', '4 + 8 =', 12, '2025-06-20 04:49:17am'),
(2, 'Tester T. Testing', 'test@demo.com', '4 - 8 =', -4, '2025-06-20 04:49:29am'),
(3, 'Tester T. Testing', 'test@demo.com', '4 x 8 =', 32, '2025-06-20 04:49:40am'),
(4, 'Tester T. Testing', 'test@demo.com', '4 / 8 =', 0.5, '2025-06-20 04:49:52am'),
(5, 'Tester T. Testing', 'test@demo.com', '8 x .5 =', 4, '2025-06-20 04:50:28am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formsubmit`
--
ALTER TABLE `formsubmit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formsubmit`
--
ALTER TABLE `formsubmit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
