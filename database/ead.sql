-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2022 at 03:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ead`
--

-- --------------------------------------------------------

--
-- Table structure for table `flash_news`
--

CREATE TABLE `flash_news` (
  `news` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flash_news`
--

INSERT INTO `flash_news` (`news`) VALUES
('welcome to EAD');

-- --------------------------------------------------------

--
-- Table structure for table `latest_announcements`
--

CREATE TABLE `latest_announcements` (
  `news` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latest_announcements`
--

INSERT INTO `latest_announcements` (`news`) VALUES
('dcet appliation for the year 2022 is open now'),
('done by naveen'),
('Kcet 2022 Applications are open now'),
('naveen kumar R'),
('welcome to the EAD project'),
('welcome welcome\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flash_news`
--
ALTER TABLE `flash_news`
  ADD PRIMARY KEY (`news`);

--
-- Indexes for table `latest_announcements`
--
ALTER TABLE `latest_announcements`
  ADD PRIMARY KEY (`news`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
