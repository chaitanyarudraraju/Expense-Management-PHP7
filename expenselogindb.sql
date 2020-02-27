-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 11:45 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expenselogindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(200) NOT NULL,
  `upass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `upass`) VALUES
('chaitanya', 'chYO9Uzez.cJQ'),
('chaitanya', 'chYO9Uzez.cJQ');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `uid` int(11) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `income` int(11) NOT NULL,
  `expense` int(11) NOT NULL,
  `date` date NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`uid`, `uname`, `income`, `expense`, `date`, `balance`) VALUES
(64, 'suryah', 0, 0, '0000-00-00', 0),
(65, 'chaithu1', 0, 0, '0000-00-00', 0),
(66, '123456', 0, 0, '0000-00-00', 0),
(67, 'chaitanya', 0, 0, '0000-00-00', 0),
(68, 'ManojKumar', 0, 0, '0000-00-00', 0),
(69, 'ManojKumar', 0, 0, '0000-00-00', 0),
(70, 'ManojKumar', 1000, 0, '2019-04-15', 1000),
(71, 'ManojKumar', 0, 100, '2019-04-15', -100),
(72, 'ManojKumar', 10000, 200, '2019-04-15', 9800),
(73, 'ManojKumar', 10000, 200, '2019-04-15', 9800),
(74, 'ManojKumar', 1000, 0, '2019-04-01', 1000),
(75, 'ManojKumar', 1000, 0, '2019-04-01', 1000),
(76, 'ManojKumar', 1000, 10, '2019-04-01', 990),
(77, 'ManojKumar', 1000, 10, '2019-04-01', 990),
(78, 'suryah', 10000, 0, '2019-04-14', 10000),
(79, 'suryah', 894775, 46, '2019-04-14', 894729),
(80, 'suryah', 766546, 487, '2019-04-15', 766059),
(81, 'suryah', 33982847, 972426, '2019-04-22', 33010421);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `ufname` varchar(200) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `upass` varchar(200) NOT NULL,
  `uemail` varchar(200) NOT NULL,
  `imglink` varchar(200) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `ufname`, `uname`, `upass`, `uemail`, `imglink`, `type`) VALUES
(27, 'suryah', 'suryah', 'suHSEMshX4BO.', 'suryah@gmail.com', 'uploads/', 0),
(28, 'chaithu1', 'chaithu1', 'ch/7cMOvjlyj.', 'chaithu1@gmail.com', 'uploads/', 0),
(32, 'ManojKumar', 'ManojKumar', 'MajZkB0VHu5Ns', 'ManojKumar@gmail.com', 'uploads/Capture.JPG', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
