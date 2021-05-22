-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 07:04 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `Mobile` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`User_ID`, `User_Name`, `Email`, `PASSWORD`, `Mobile`) VALUES
(1, 'ph', 'ph@gmail.com', '123', 99999),
(4, 'ph', 'ph12@gmail.com', '123', 11111),
(5, 'pranav', 'ph1@gmail.com', '123', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `B_id` int(11) NOT NULL,
  `B_Name` varchar(20) DEFAULT NULL,
  `Location` varchar(20) DEFAULT NULL,
  `Amount_Person` double DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`B_id`, `B_Name`, `Location`, `Amount_Person`, `User_ID`) VALUES
(1, 'pune`', 'pune', 1000, 1),
(2, 'baner', 'pune', 1000, 1),
(3, 'pimpri', 'pune', 1000, 1),
(4, 'abac', 'shegaon', 200, 1),
(5, 'pune12', 'pune', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `D_id` int(11) NOT NULL,
  `D_Name` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `Mobile` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`D_id`, `D_Name`, `Email`, `PASSWORD`, `Mobile`, `User_ID`) VALUES
(1, 'ph', 'ph@gmail.com', '123', 0, 1),
(3, 'ph1', 'pp@gmail.com', '123', 99999, 1),
(4, 'pranav', 'ph1@gmail.com', '123', 1234567890, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patientf`
--

CREATE TABLE `patientf` (
  `P_id` int(11) NOT NULL,
  `P_Name` varchar(20) DEFAULT NULL,
  `A_Date` date NOT NULL DEFAULT current_timestamp(),
  `Mobile` int(11) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `S_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientf`
--

INSERT INTO `patientf` (`P_id`, `P_Name`, `A_Date`, `Mobile`, `Age`, `S_ID`) VALUES
(1, 'pranavb', '2021-04-13', 1111, 22, 1),
(2, 'ph', '2021-04-13', 6666666, 33, 1),
(3, 'pj', '2021-04-13', 777, 877, 1),
(4, 'uuiui', '2021-04-11', 88, 877, 1),
(5, 'uuiu', '2021-04-12', 88998, 888, 1),
(6, 'uu', '2021-04-12', 88, 88, 1),
(7, 'joui', '2021-04-14', 0, 888, 1),
(8, 'ph', '2021-04-16', 1111111111, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `S_id` int(11) NOT NULL,
  `S_Name` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `Mobile` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `B_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`S_id`, `S_Name`, `Email`, `PASSWORD`, `Mobile`, `User_ID`, `B_ID`) VALUES
(1, 'pranav', 'ph@gmail.com', '123', 8888, 1, 4),
(2, 'pranav', 'ph@gmail.b', '123', 8888, 1, 4),
(3, 'ph', 'ph1@gmail.com', '123', 1111111111, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`B_id`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`D_id`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `patientf`
--
ALTER TABLE `patientf`
  ADD PRIMARY KEY (`P_id`),
  ADD KEY `S_ID` (`S_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`S_id`),
  ADD KEY `staff_ibfk_1` (`User_ID`),
  ADD KEY `B_ID` (`B_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `B_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `D_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patientf`
--
ALTER TABLE `patientf`
  MODIFY `P_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `S_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `admin` (`User_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `admin` (`User_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `patientf`
--
ALTER TABLE `patientf`
  ADD CONSTRAINT `patientf_ibfk_1` FOREIGN KEY (`S_ID`) REFERENCES `staff` (`S_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`B_ID`) REFERENCES `branch` (`B_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
