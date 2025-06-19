-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 11:40 PM
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
-- Database: `formsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `formsubmit`
--

CREATE TABLE `formsubmit` (
  `id` int(11) NOT NULL,
  `Person` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `points` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formsubmit`
--

INSERT INTO `formsubmit` (`id`, `Person`, `email`, `points`) VALUES
(1, 'Raffiel Jon Macabasa', 'raffielmacabasa@gmail.com', 81),
(2, 'Tyron John Macabasa', 'tjmcread@gmail.com', 88),
(3, 'Trext Jemimah Macabasa', 'tjmacabasa@gmail.com', 90),
(4, 'Tita Macabasa', 'titamacabasa@gmail.com', 89),
(5, 'Johnny Macabasa', 'johnmc@gmail.com', 87);

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
