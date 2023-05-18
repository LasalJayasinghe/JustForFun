-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 03:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuelup`
--

-- --------------------------------------------------------

--
-- Table structure for table `forumposts`
--

CREATE TABLE `forumposts` (
  `postID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(100) NOT NULL,
  `content` varchar(512) NOT NULL,
  `ownerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_admin`
--

CREATE TABLE `org_admin` (
  `id` int(11) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `brn` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileno` int(12) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `org_admin`
--

INSERT INTO `org_admin` (`id`, `companyname`, `brn`, `email`, `mobileno`, `password_hash`) VALUES
(55, 'Zilion PVT LTD', 'WP50706058', 'Zilion@email.com', 714589554, '$2y$10$Ob8AxpGBmQCWTjOFVbeWsOFawF9nh7qxJtkXwfgf0mwkFyL9zIMw6'),
(56, 'ABC Company', 'WP12345678', 'abc@email.com', 714589665, '$2y$10$TApjV5uFkbjvR1xWLvZMreltNa75vhRf8ENROm67dsTnT0KCPQkYG');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `phone` char(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `nic`, `phone`, `name`, `email`, `password`) VALUES
(19, '200026101465', '0716436885', 'LJ', 'LJ@email.com', '$2y$10$FgZCwY.pdxyjVGA207.Pk.EhAYQSY6IPfrxBrjewORfV7cP.Wunmy');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `station_id` char(6) NOT NULL,
  `operator` varchar(20) NOT NULL,
  `vehicle` int(11) NOT NULL,
  `Date-time` timestamp NOT NULL DEFAULT current_timestamp(),
  `fuel` char(6) NOT NULL,
  `fueltype` varchar(5) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `v_id` int(11) NOT NULL,
  `nic` char(12) NOT NULL,
  `vletter` varchar(3) DEFAULT NULL,
  `vnumber` varchar(4) DEFAULT NULL,
  `vtype` varchar(6) NOT NULL,
  `vfuel` varchar(6) NOT NULL,
  `chassis` varchar(17) NOT NULL,
  `alloc_quota` int(2) DEFAULT NULL,
  `bal_quota` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forumposts`
--
ALTER TABLE `forumposts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `org_admin`
--
ALTER TABLE `org_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `BRN` (`brn`),
  ADD UNIQUE KEY `MobileNo` (`mobileno`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `station_id` (`station_id`),
  ADD KEY `operator` (`operator`),
  ADD KEY `vehicle` (`vehicle`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`v_id`),
  ADD UNIQUE KEY `chassis` (`chassis`),
  ADD KEY `nic` (`nic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forumposts`
--
ALTER TABLE `forumposts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `org_admin`
--
ALTER TABLE `org_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
