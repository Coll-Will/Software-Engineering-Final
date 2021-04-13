-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2021 at 08:47 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16184555_whereswalldo`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CID` int(11) NOT NULL,
  `fname` varchar(36) DEFAULT NULL,
  `lname` varchar(36) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `street` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CID`, `fname`, `lname`, `email`, `phone`, `street`, `city`, `state`, `zip`, `pass`) VALUES
(11, 'collin', 'williams', '1@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$Ya18oaYkMh3YC8IM6ZCKhukBuZJpS/LOVzhB4iPzyU/w4ireYIK4a'),
(12, 'niko', NULL, 'niko@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$3VARS9hXNMTJe9fwJLDQlODh9Jdo8zps01opByNqYvh1yzsXhHtXG'),
(13, 'Adam', 'Volz', 'adamcvolz@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$YzNd14B30.FpizPphMCsduIiKHWNBAcpFrjXpTx4T9CpsXTEWgrW6'),
(14, 'Miqaaiyl', 'Fahiym', 'miqaaiylf@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$uUubV9uitp62nuf21/olZuuUC8nuBn0CKNFsup7bPSgP4dG1ZIOdK'),
(15, 'Adam', 'Volz', 'adamvolz@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$RqPMUBYYdAjuSDWU4i10ou6BC1j6AYkOsGN.4fypj.PzgqhTLKyba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
