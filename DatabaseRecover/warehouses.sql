-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2021 at 08:49 AM
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
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `WID` int(11) NOT NULL,
  `street` varchar(64) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`WID`, `street`, `state`, `city`, `zip`, `latitude`, `longitude`) VALUES
(1, '600 Dexter Ave', 'AL', 'Montgomery', 36130, 32, -86),
(2, '120 4th St', 'AK', 'Juneau', 99801, 58, -134),
(3, '1700 W Washington St', 'AZ', 'Phoenix', 85007, 58, 25),
(4, '500 Woodlane St', 'AR', 'Little Rock', 72201, 43, -82),
(5, '1300 L St', 'CA', 'Sacramento', 95814, 39, -121),
(6, '200 E Colfax Ave', 'CO', 'Denver', 80203, 54, 19),
(7, '210 Capitol Ave', 'CT', 'Hartford', 6106, -32, 116),
(8, '411 Legislative Ave', 'DE', 'Dover', 19901, -23, -50),
(9, '400 S Monroe St', 'FL', 'Tallahassee', 32399, 30, -84),
(10, 'Capitol Square SW,', 'GA', 'Atlanta', 30334, 38, -1),
(11, '415 S Beretania St', 'HI', 'Honolulu', 96813, 21, -158),
(12, '700 W Jefferson St', 'ID', 'Boise', 83702, -26, -49),
(13, '401 S 2nd St', 'IL', 'Springfield', 62701, 40, -90),
(14, '200 W Washington St', 'IN', 'Indianapolis', 46204, 40, -86),
(15, '1007 E Grand Ave', 'IA', 'Des Moines,', 50319, 55, 24),
(16, '300 SW 10th St, Topeka, KS 66612', 'KS', 'Topeka', 66612, 26, -100),
(17, '700 Capital Ave', 'KY', 'Frankfort', 40601, 50, 19),
(18, '1051 N 3rd St', 'LA', 'Baton Rouge', 70802, -16, -48),
(19, '210 State St', 'ME', 'Augusta', 4330, 43, 25),
(20, '100 State Cir', 'MD', 'Annapolis', 21401, 53, 11),
(21, '24 Beacon St', 'MA', 'Boston', 2133, 49, 16),
(22, '100 N Capitol Ave', 'MI', 'Lansing', 48933, -9, -40),
(23, '75 Rev Dr Martin Luther King Jr Boulevard.', 'MN', 'St Paul', 55155, -8, -36),
(24, '400 High St', 'MS', 'Jackson', 39201, 28, 48),
(25, '201 W Capitol Ave', 'MO', 'Jefferson City', 65101, 58, 27),
(26, '1301 E 6th Ave', 'MT', 'Helena', 59601, 1, 104),
(27, '1445 K St', 'NE', 'Lincoln', 68508, -5, -49),
(28, '101 N Carson St', 'NV', 'Carson City', 89701, -27, -52),
(29, '107 N Main St', 'NH', 'Concord', 3303, 41, 20),
(30, '125 W State St', 'NJ', 'Trenton', 8608, 47, 9),
(31, '490 Old Santa Fe Trail', 'NM', 'Santa Fe', 87501, -24, -53),
(32, '222 Madison Ave', 'NY', 'Albany', 12230, 43, -74),
(33, '1 E Edenton St', 'NC', 'Raleigh', 27601, 36, -79),
(34, '600 E Boulevard Ave', 'ND', 'Bismarck', 58505, 47, -101),
(35, '1 Capitol Square', 'OH', 'Columbus', 43215, 40, -83),
(36, '2300 N Lincoln Blvd', 'OK', 'Oklahoma City', 73105, 36, -98),
(37, '900 Court St NE', 'OR', 'Salem', 97301, 45, -123),
(38, '501 N 3rd St', 'PA', 'Harrisburg', 17120, 40, -77),
(39, '82 Smith St', 'RI', 'Providence', 2903, 42, -71),
(40, '1100 Gervais St', 'SC', 'Columbia', 29208, 34, -81),
(41, '500 E Capitol Ave', 'SD', 'Pierre', 57501, 45, -100),
(42, '600 Dr. M.L.K. Jr Blvd', 'TN', 'Nashville', 37243, 36, -87),
(43, '1100 Congress Ave', 'TX', 'Austin', 78701, 30, -98),
(44, '350 State St', 'UT', 'Salt Lake City', 84103, 41, -112),
(45, '115 State St', 'VT', 'Montpelier', 5633, 44, -73),
(46, '1000 Bank St', 'VA', 'Richmond', 23218, 38, -77),
(47, '416 Sid Snyder Ave SW', 'WA', 'Olympia', 98504, 47, -123),
(48, '1716 Kanawha Blvd E', 'WV', 'Charleston', 25305, 38, -82),
(49, '2 E Main St', 'WI', 'Madison', 53703, 43, -89),
(50, '200 W 24th St', 'WY', 'Cheyenne', 82001, 41, -105);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`WID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `WID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
