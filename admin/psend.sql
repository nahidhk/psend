-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2024 at 01:09 PM
-- Server version: 8.0.40-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psend`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `pin` int DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `joindate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int NOT NULL,
  `code` varchar(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `bname` varchar(255) DEFAULT NULL,
  `updatex` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `price`, `flag`, `bname`, `updatex`) VALUES
(1, 'BDT', '1.00', '/flag/Bangladesh.svg', 'টাকা', NULL),
(2, 'AED', '2.00', '/flag/Dubai.svg', 'দিরহাম', '2024-12-15 20:06:15 PM'),
(3, 'SAR', '1.00', '/flag/Saudi Arabia.svg', 'রিয়াল', '2024-12-15 20:06:09 PM'),
(4, 'MYR', '26.76', '/flag/Malaysia.svg', 'রিঙ্গিত', '2024-12-16 16:17:36 PM');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int NOT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `cpt` varchar(100) DEFAULT NULL,
  `bdt` decimal(10,2) DEFAULT NULL,
  `fee` decimal(10,2) DEFAULT NULL,
  `methoads` varchar(100) DEFAULT NULL,
  `accno` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `adminid` varchar(50) DEFAULT NULL,
  `adminname` varchar(100) DEFAULT NULL,
  `adminpin` varchar(20) DEFAULT NULL,
  `adminimg` varchar(255) DEFAULT NULL,
  `transition` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `statust` varchar(50) DEFAULT NULL,
  `statuscolor` varchar(20) DEFAULT NULL,
  `postdate` varchar(15) DEFAULT NULL,
  `sendbdt` varchar(20) DEFAULT NULL,
  `duebdt` varchar(20) DEFAULT NULL,
  `sendaccno` varchar(20) DEFAULT NULL,
  `typex` varchar(20) DEFAULT NULL,
  `trx` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
