-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 12:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phoneno` int(10) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `approval` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `phoneno`, `email`, `cdate`, `approval`) VALUES
(12, 'surveyform', 2147483647, 'mohdambaliyasana440@gmail.com', '2021-10-01', 'Not Allowed');

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id`, `name`) VALUES
(1, 'g1.jpg'),
(2, 'g2.jpg'),
(3, 'g3.jpg'),
(4, 'g4.jpg'),
(5, 'g5.jpg'),
(6, 'g6.jpg'),
(7, 'g7.jpg'),
(8, 'g8.jpg'),
(9, 'g9.jpg'),
(10, 'g10.jpg'),
(11, 'g2.jpg'),
(12, 'a1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `usname` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `usname`, `pass`) VALUES
(3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `newsletterlog`
--

CREATE TABLE `newsletterlog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(52) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `news` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletterlog`
--

INSERT INTO `newsletterlog` (`id`, `title`, `subject`, `news`) VALUES
(1, 'ffff', 'ffff', 'ffff');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) DEFAULT NULL,
  `title` varchar(5) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `troom` varchar(30) DEFAULT NULL,
  `tbed` varchar(30) DEFAULT NULL,
  `nroom` int(11) DEFAULT NULL,
  `cin` date DEFAULT NULL,
  `cout` date DEFAULT NULL,
  `ttot` double(8,2) DEFAULT NULL,
  `fintot` double(8,2) DEFAULT NULL,
  `mepr` double(8,2) DEFAULT NULL,
  `meal` varchar(30) DEFAULT NULL,
  `btot` double(8,2) DEFAULT NULL,
  `noofdays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `title`, `fname`, `lname`, `troom`, `tbed`, `nroom`, `cin`, `cout`, `ttot`, `fintot`, `mepr`, `meal`, `btot`, `noofdays`) VALUES
(2, 'Mr.', 'Akbar', 'mdd', 'Superior Room', 'Single', 1, '2021-07-06', '2021-07-31', 8000.00, 8400.00, 320.00, 'Full Board', 80.00, 25),
(3, 'Mr.', 'Sabbir', 'Kadiwal', 'Single Room', 'Single', 1, '2021-07-12', '2021-06-14', -4200.00, -4242.00, 0.00, 'Room only', -42.00, -28),
(4, 'Mr.', 'Akbar', 'Kadiwal', 'Deluxe Room', 'Double', 1, '2021-07-09', '2021-07-11', 440.00, 484.00, 35.20, 'Full Board', 8.80, 2),
(7, 'Mr.', 'Mohammad', 'Hussain', 'Superior Room', 'Single', 1, '2021-10-01', '2021-10-01', 0.00, 0.00, 0.00, 'Full Board', 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `bedding` varchar(10) DEFAULT NULL,
  `place` varchar(10) DEFAULT NULL,
  `cusid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `type`, `bedding`, `place`, `cusid`) VALUES
(1, 'Superior Room', 'Single', 'NotFree', 7),
(2, 'Superior Room', 'Double', 'Free', NULL),
(3, 'Superior Room', 'Triple', 'Free', NULL),
(4, 'Single Room', 'Quad', 'Free', NULL),
(5, 'Superior Room', 'Quad', 'Free', NULL),
(6, 'Deluxe Room', 'Single', 'Free', NULL),
(7, 'Deluxe Room', 'Double', 'Free', 0),
(8, 'Deluxe Room', 'Triple', 'Free', NULL),
(9, 'Deluxe Room', 'Quad', 'Free', NULL),
(10, 'Guest House', 'Single', 'Free', NULL),
(11, 'Guest House', 'Double', 'Free', NULL),
(12, 'Guest House', 'Quad', 'Free', NULL),
(13, 'Single Room', 'Single', 'NotFree', 3),
(14, 'Single Room', 'Double', 'Free', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roombook`
--

CREATE TABLE `roombook` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(5) DEFAULT NULL,
  `FName` text DEFAULT NULL,
  `LName` text DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `National` varchar(30) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `Phone` text DEFAULT NULL,
  `TRoom` varchar(20) DEFAULT NULL,
  `Bed` varchar(10) DEFAULT NULL,
  `NRoom` varchar(2) DEFAULT NULL,
  `Meal` varchar(15) DEFAULT NULL,
  `cin` date DEFAULT NULL,
  `cout` date DEFAULT NULL,
  `stat` varchar(15) DEFAULT NULL,
  `nodays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roombook`
--

INSERT INTO `roombook` (`id`, `Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `TRoom`, `Bed`, `NRoom`, `Meal`, `cin`, `cout`, `stat`, `nodays`) VALUES
(3, 'Mr.', 'Sabbir', 'Kadiwal', 'sabirkadiwal@gmail.com', 'Non Sri Lankan ', 'India', '9601766028', 'Single Room', 'Single', '1', 'Room only', '2021-07-12', '2021-06-14', 'Conform', -28),
(5, 'Dr.', 'Firoj', 'Meman', 'Firojkhan@gmail.com', 'Sri Lankan', 'India', '97328517209', 'Single Room', 'Single', '1', 'Half Board', '2021-07-23', '2021-07-27', 'Not Conform', 4),
(6, 'Mr.', 'Akbar', 'Kadiwal', 'aas@gmail.com', 'Sri Lankan', 'India', '7069321317', 'Deluxe Room', 'Double', '1', 'Full Board', '2021-07-23', '2021-07-31', 'Not Conform', 8),
(7, 'Mr.', 'Mohammad', 'Hussain', 'imakbarkadiwal@gmail.com', 'Sri Lankan', 'India', '9999999999', 'Superior Room', 'Single', '1', 'Full Board', '2021-10-01', '2021-10-01', 'Conform', 0),
(8, 'Dr.', 'xs', 'asjbbdj', 'mohdambaliyasana440@gmail.com', 'Sri Lankan', 'Barbados', '9825893429', 'Single Room', 'Single', '1', 'Room only', '2021-10-02', '2021-10-16', 'Not Conform', 14),
(9, 'Mr.', 'aaaaaaaaaaaaaa', 'aaaaaaaaa', 'justwatches.72@gmail.com', 'Sri Lankan', 'Barbados', '99999999999999', 'Guest House', 'Triple', '4', 'Half Board', '2021-10-21', '2021-10-30', 'Not Conform', 9),
(10, 'Rev .', 'ssssssssssss', 'ssssssssssssss', 'sajidhussin1427@gmail.com', 'Sri Lankan', 'Bangladesh', '999999999999999', 'Deluxe Room', 'Quad', '5', 'Breakfast', '2021-10-28', '2021-10-31', 'Not Conform', 3),
(11, 'Dr.', 'xs', 'ds', 'aaa@gmail.com', 'Sri Lankan', 'Anguilla', '9999888898', 'Superior Room', 'Double', '2', 'Breakfast', '2021-10-04', '2021-10-17', 'Not Conform', 13),
(12, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 'Not Conform', NULL),
(13, 'Dr.', 'xs', 'ds', 'aaaa1a@gmail.com', 'Sri Lankan', 'Bahrain', '99999999999999999', 'Superior Room', 'Quad', '4', 'Room only', '2021-10-04', '2021-10-17', 'Not Conform', 13);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `name`, `email`, `password`) VALUES
(2, 'test', 'sajidhussin1427@gmail.com', 'aa'),
(3, 'Mohammad', 'mohdambaliyasana440@gmail.com', 'aa'),
(4, 'Akbarhussain', 'akbar@gmail.com', 'aa'),
(5, 'Fatteh', 'fatteh@gmail.com', 'aa'),
(6, 'Haidar', 'haaa@gmail.com', 'aa'),
(7, 'Mustakim', 'must@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletterlog`
--
ALTER TABLE `newsletterlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roombook`
--
ALTER TABLE `roombook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletterlog`
--
ALTER TABLE `newsletterlog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roombook`
--
ALTER TABLE `roombook`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
