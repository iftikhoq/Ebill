-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 07:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electricitybill`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'rohed', '2296');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(14) NOT NULL,
  `uid` int(14) NOT NULL,
  `units` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bdate` date NOT NULL,
  `ddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `uid`, `units`, `amount`, `status`, `bdate`, `ddate`) VALUES
(1, 1, 20, 80.00, 'PROCESSED', '2024-02-02', '2024-02-09'),
(2, 2, 25, 100.00, 'PROCESSED', '2024-02-02', '2024-02-09'),
(3, 3, 30, 120.00, 'PROCESSED', '2024-02-02', '2024-02-09'),
(4, 1, 40, 160.00, 'PENDING', '2024-02-02', '2024-02-09'),
(5, 2, 45, 180.00, 'PENDING', '2024-02-02', '2024-02-09'),
(6, 3, 50, 200.00, 'PENDING', '2024-02-02', '2024-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `username`, `Address`, `email`, `phone`, `password`) VALUES
(2, 'ifti', 'eidgha', 'ifti@gmail.com', '12154121', '1111'),
(3, 'kuma', 'dewanhat', 'kuma@gmail.com', '01886856121', '1131'),
(1, 'ove', 'navy gate', 'rohedove23@gmail.com', '01812856123', '2296');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `ftext` varchar(500) NOT NULL,
  `fdate` date NOT NULL,
  `processed` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `cid`, `ftext`, `fdate`, `processed`) VALUES
(1, 1, 'Bill Not Correct', '2024-02-02', '1'),
(2, 1, 'Bill Generated Late', '2024-02-02', '2'),
(3, 2, 'Transaction Not Processed', '2024-02-02', '1'),
(4, 2, 'Previous Complaint Not Processed', '2024-02-02', '2'),
(5, 3, 'Bill Generated Late', '2024-02-02', '0'),
(6, 3, 'Transaction Not Processed', '2024-02-02', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
