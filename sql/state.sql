-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2021 at 05:22 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onl`
--

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int NOT NULL,
  `name` varchar(512) NOT NULL DEFAULT '',
  `is_deleted` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `is_deleted`) VALUES
(4, 'Maharashtra', 0),
(5, 'Andaman & Nicobar Islands', 0),
(6, 'Andhra Pradesh', 0),
(7, 'Arunachal Pradesh', 0),
(8, 'Assam', 0),
(9, 'Bihar', 0),
(10, 'Chhattisgarh', 0),
(11, 'Dadra & Nagar Haveli', 0),
(12, 'Daman & Diu', 0),
(13, 'Delhi', 0),
(14, 'Goa', 0),
(15, 'Gujarat', 0),
(16, ' India', 0),
(17, 'Gujrat', 0),
(18, 'Hariyana', 0),
(19, 'Haryana', 0),
(20, 'Himachal Pradesh', 0),
(21, 'Jammu & Kashmir', 0),
(22, 'Jharkhand', 0),
(23, 'Karnataka', 0),
(24, 'Kerala', 0),
(25, 'Lakshadweep', 0),
(26, 'Madhya Pradesh', 0),
(28, 'Manipur', 0),
(29, 'Meghalaya', 0),
(30, 'Mizoram', 0),
(31, 'Nagaland', 0),
(32, 'Orissa', 0),
(33, 'Pondicherry', 0),
(34, 'Punjab', 0),
(35, 'Rajasthan', 0),
(36, 'Rajastan', 0),
(37, 'Sikkim', 0),
(38, 'West Bengal', 0),
(39, 'Tamil Nadu', 0),
(40, 'Tripura', 0),
(41, 'Uttar Pradesh', 0),
(42, ' Ghazipur', 0),
(43, ' Hardoi', 0),
(44, ' Rampur', 0),
(45, ' Agra', 0),
(46, ' Farrukhabad', 0),
(47, ' Bulandshahr', 0),
(48, 'Uttarakhand', 0),
(49, ' Purulia', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
