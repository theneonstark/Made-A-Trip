-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 11:24 AM
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
-- Database: `trip`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `pass`, `phone`, `address`, `username`, `name`) VALUES
(1, '1234', '9966774455', 'kalkaji', 'amit.saha', 'amit');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(100) NOT NULL,
  `name` varchar(32) NOT NULL,
  `family_mem` int(32) NOT NULL,
  `cost` int(100) NOT NULL,
  `package` varchar(32) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(32) DEFAULT 'wait for confirmation',
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `name`, `family_mem`, `cost`, `package`, `contact`, `address`, `status`, `customer_id`) VALUES
(4, 'amit', 2, 0, '', '5577889900', 'malviya nagar', 'cancel', 1),
(5, 'Shahid', 4, 8000, 'Gandhi Smiriti', '55667788', 'badarpur', 'confirm', 1),
(6, 'amit', 1, 2000, 'Gandhi Smiriti', '44556677', 'malviya nagar', 'confirm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(100) NOT NULL,
  `name` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `name`, `pass`, `phone`, `address`, `gender`, `email`) VALUES
(1, 'amit', '1234', '999778882', 'saket', 'male', 'amit@gamil.com'),
(3, 'Shahid', '1234', '9667519717', 'Badarpur', 'male', 'mohd47149@gmail.com'),
(6, 'amit', 'mnbv', '9667519718', 'badarpur09', 'male', 'amit08867@gamil.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `email` varchar(100) NOT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `feed` varchar(250) DEFAULT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`email`, `contact`, `feed`, `name`) VALUES
('mohan@gmail.com', '9988776655', 'this is nice wbsite', 'mohan'),
('mohd47149@gmail.com', '', 'This is very wonderful website, it provide very good services\r\nEnjoy a lot,\r\nI recommend this website  for travel service\r\nThanks', 'Shahid');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `cost` int(200) DEFAULT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `cost`, `description`) VALUES
(1, 'Akshardham Temple', 2000, ''),
(2, 'Gandhi Smiriti', 2000, ''),
(3, 'Humayun Tomb', 2000, ''),
(4, 'Indiagate', 2000, ''),
(5, 'Jama Masjid', 2000, ''),
(6, 'Lal Quila', 2000, ''),
(7, 'Lotus Temple', 2000, ''),
(8, 'Purana Quila', 2000, ''),
(9, 'Qutub Minar', 2000, ''),
(10, 'SafdarJang Tomb', 2000, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
