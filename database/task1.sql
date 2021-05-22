-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 09:03 AM
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
-- Database: `task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `L_ID` int(11) NOT NULL,
  `ID` int(11) DEFAULT NULL,
  `Title` text DEFAULT NULL,
  `Des` text DEFAULT NULL,
  `Seeking` text DEFAULT NULL,
  `img_src` text NOT NULL,
  `submitted` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`L_ID`, `ID`, `Title`, `Des`, `Seeking`, `img_src`, `submitted`) VALUES
(18, 4, 'Laptop1', 'Processor= i5 7th generation', '800$', 'productimages/photo-1561517146-815245fcbfde.jpg', '0000-00-00 00:00:00'),
(19, 4, 'Laptop 2', 'i3', '700$', 'productimages/photo-1588872657578-7efd1f1555ed.jpg', '0000-00-00 00:00:00'),
(20, 4, 'Laptop100', 'i7 8th', '1000$', 'productimages/photo-1593006428925-9d7e6675b3d3.jpg', '0000-00-00 00:00:00'),
(21, 5, 'Laptop PH1', '.....', '9000K', 'productimages/photo-1593642632823-8f785ba67e45.jpg', '0000-00-00 00:00:00'),
(22, 5, 'ii', '9th generation', '111k', 'productimages/photo-1593642634443-44adaa06623a.jpg', '0000-00-00 00:00:00'),
(23, 5, '10th gen', '1tb ssd', '1111k', 'productimages/photo-1593642702821-c8da6771f0c6.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `M_ID` int(11) NOT NULL,
  `ID` int(11) DEFAULT NULL,
  `sent_ID` int(11) DEFAULT NULL,
  `L_ID` int(11) DEFAULT NULL,
  `text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`M_ID`, `ID`, `sent_ID`, `L_ID`, `text`) VALUES
(15, 4, 5, 18, 'Hello sir I am interested in your laptop.');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `O_ID` int(11) NOT NULL,
  `ID` int(11) DEFAULT NULL,
  `L_ID` int(11) DEFAULT NULL,
  `offer` text DEFAULT NULL,
  `accepted` text DEFAULT NULL,
  `submitted` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `PASSWORD` varchar(225) DEFAULT NULL,
  `location` varchar(225) DEFAULT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `email`, `PASSWORD`, `location`, `contact`) VALUES
(4, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Pune', 2147483647),
(5, 'Pranav', 'ph@gmail.com', '202cb962ac59075b964b07152d234b70', 'Pune', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`L_ID`),
  ADD KEY `laptop_ibfk_1` (`ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`M_ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `L_ID` (`L_ID`),
  ADD KEY `message_ibfk_3` (`sent_ID`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`O_ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `L_ID` (`L_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `L_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `laptop_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`L_ID`) REFERENCES `laptop` (`L_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`sent_ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`L_ID`) REFERENCES `laptop` (`L_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
