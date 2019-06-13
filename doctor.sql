-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 12:24 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609');

-- --------------------------------------------------------

--
-- Table structure for table `disease_tbl`
--

CREATE TABLE `disease_tbl` (
  `id` int(11) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `createddate` datetime NOT NULL,
  `updatedate` datetime NOT NULL,
  `orderby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease_tbl`
--

INSERT INTO `disease_tbl` (`id`, `disease`, `createddate`, `updatedate`, `orderby`) VALUES
(19, 'Hair Treatment', '2019-06-11 11:03:33', '2019-06-13 12:13:45', 5),
(20, 'Skin Treatment', '2019-06-11 11:03:41', '2019-06-13 12:13:45', 2),
(21, 'Psoriasis - Allergy - Eczema', '2019-06-11 11:03:51', '2019-06-13 12:13:45', 6),
(22, 'Ayurvedic Pain Management', '2019-06-11 11:03:58', '2019-06-13 12:13:45', 7),
(23, 'Infertility and PCOD Treatment ', '2019-06-11 11:04:05', '2019-06-13 12:13:45', 3),
(24, 'Depression and Insomnia ', '2019-06-11 11:04:13', '2019-06-13 12:13:45', 4),
(25, 'Weight Loss Treatment', '2019-06-11 11:04:23', '2019-06-13 12:13:45', 1),
(26, 'Menstruation Problems', '2019-06-11 11:04:31', '2019-06-13 12:13:45', 10),
(27, 'Pimples Treatment', '2019-06-11 11:04:39', '2019-06-13 12:13:45', 8),
(28, 'Piles and Fissure Treatment', '2019-06-11 11:04:51', '2019-06-13 12:13:45', 9),
(29, 'Tattoo and Birthmark remove', '2019-06-11 11:04:58', '2019-06-13 12:13:45', 11),
(30, 'Other', '2019-06-11 11:05:12', '2019-06-13 12:13:45', 12);

-- --------------------------------------------------------

--
-- Table structure for table `patinet_tbl`
--

CREATE TABLE `patinet_tbl` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `diseaseid` int(11) NOT NULL,
  `dob` date NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `appointmentdate` date NOT NULL,
  `appointmenttime` time NOT NULL,
  `userid` int(11) NOT NULL,
  `symtoms` text NOT NULL,
  `prescription` text NOT NULL,
  `createddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobileno` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `username`, `email`, `password`, `mobileno`, `status`, `createddate`) VALUES
(34, 'paresh', 'paresh@gmail.com', '6c452c76957f2c36c9d4f8394e2a63a3', '9630214578', 1, '2019-06-07'),
(37, 'bhargav', 'bhargav@gmail.com', '6bfbd7be3be0a2445508edb9b979f642', '9874562130', 1, '2019-06-07'),
(38, 'parth', 'parth@gmail.com', '04788c4f5295bc48719eb9d8d3dec40d', '9874561230', 1, '2019-06-07'),
(39, 'Test name', 'testsuthar123@gmail.com', 'ceb6c970658f31504a901b89dcd3e461', '7891236540', 1, '2019-06-10'),
(40, 'Mitesh', 'mitesh123@yopmail.com', 'e6e061838856bf47e1de730719fb2609', '7485960123', 1, '2019-06-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `disease_tbl`
--
ALTER TABLE `disease_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `disease` (`disease`);

--
-- Indexes for table `patinet_tbl`
--
ALTER TABLE `patinet_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobileno` (`mobileno`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `userid` (`userid`),
  ADD KEY `diseaseid` (`diseaseid`) USING BTREE;

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobileno` (`mobileno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `disease_tbl`
--
ALTER TABLE `disease_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `patinet_tbl`
--
ALTER TABLE `patinet_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patinet_tbl`
--
ALTER TABLE `patinet_tbl`
  ADD CONSTRAINT `patinet_tbl_ibfk_1` FOREIGN KEY (`diseaseid`) REFERENCES `disease_tbl` (`id`),
  ADD CONSTRAINT `patinet_tbl_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user_tbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
