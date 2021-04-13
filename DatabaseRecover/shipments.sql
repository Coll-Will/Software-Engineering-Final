-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2021 at 08:48 AM
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
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `SID` int(11) NOT NULL,
  `IID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `MID` int(11) DEFAULT NULL,
  `WID` int(11) DEFAULT NULL,
  `to_street` varchar(64) DEFAULT NULL,
  `to_city` varchar(64) DEFAULT NULL,
  `to_state` varchar(2) DEFAULT NULL,
  `to_zip` int(11) DEFAULT NULL,
  `cur_street` varchar(64) DEFAULT NULL,
  `cur_city` varchar(64) DEFAULT NULL,
  `cur_state` varchar(2) DEFAULT NULL,
  `cur_zip` int(11) DEFAULT NULL,
  `inTransit` char(1) DEFAULT NULL,
  `cancel` char(1) DEFAULT NULL,
  `refund` char(1) DEFAULT NULL,
  `remaining_dist` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`SID`, `IID`, `CID`, `MID`, `WID`, `to_street`, `to_city`, `to_state`, `to_zip`, `cur_street`, `cur_city`, `cur_state`, `cur_zip`, `inTransit`, `cancel`, `refund`, `remaining_dist`) VALUES
(123456, 1, 13, 1, 35, '1', '1', '1', 1, '1', '1', '1', 1, '1', '0', '0', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `fk_IID` (`IID`),
  ADD KEY `fk_CID` (`CID`),
  ADD KEY `fk_WID` (`WID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123457;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `fk_CID` FOREIGN KEY (`CID`) REFERENCES `customers` (`CID`),
  ADD CONSTRAINT `fk_IID` FOREIGN KEY (`IID`) REFERENCES `inventory` (`IID`),
  ADD CONSTRAINT `fk_WID` FOREIGN KEY (`WID`) REFERENCES `warehouses` (`WID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
