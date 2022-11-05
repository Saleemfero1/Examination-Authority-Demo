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
-- Database: `collage_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `collage_count`
--

CREATE TABLE `collage_count` (
  `count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collage_count`
--

INSERT INTO `collage_count` (`count`) VALUES
(21);

-- --------------------------------------------------------

--
-- Table structure for table `collage_list`
--

CREATE TABLE `collage_list` (
  `collage_id` varchar(30) NOT NULL,
  `collage_name` varchar(100) NOT NULL,
  `address` varchar(600) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `collage_type` varchar(20) NOT NULL,
  `chair_person` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collage_list`
--

INSERT INTO `collage_list` (`collage_id`, `collage_name`, `address`, `phone`, `email`, `collage_type`, `chair_person`, `password`, `image`) VALUES
('1', 'University Visveshvaraya Collage Of Engineering', 'kr circle, bangalore', '748-338-3124', 'naveenkumarraja1@gmail.com', 'government', 'Naveen Kumar R', '12345', ''),
('2', 'asdf', 'asdfasdf', '123-456-7890', 'asdfasdfasdf@gmail.com', 'government', 'asdfasdfsdaf', 'abc', ''),
('3', 'mmmm', 'dsafadsfasdf', '425343453421', 'uvce@gmail.com', 'government', 'sdfafsd', '123456', ''),
('6', 'bvddd', 'asdfsdaf', '123-456-7890', 'uvce@gmail.com', 'private', 'abv', '111111', ''),
('E003', 'B.M.S collage of engineering', 'bangalore , 560006', '123-456-7890', 'bmscollage@gmail.com', 'government', 'mno', '12345678', ''),
('E010', 'asdf', 'asdfasdf', '123-456-7891', 'asdfasdfasdf@gmail.com', 'government', 'asdfasdfsdaf', 'abc', '10'),
('E011', 'asdf', 'asdfasdf', '123-456-7891', 'asdfasdfasdf@gmail.com', 'government', 'asdfasdfsdaf', 'abc', '11'),
('E012', 'asdf', 'asdfasdf', '123-435-1234', 'asdfasdfasdf@gmail.com', 'government', 'asdfasdfsdaf', 'abc', '12'),
('E013', 'University Visveshvaraya Collage Of Engineering', 'kr circle, bangalore', '748-338-3124', 'naveenkumarraja16@gmail.com', 'government', 'abc', '12345', '13'),
('E014', 'University Visveshvaraya Collage Of Engineering', 'kr circle, bangalore', '748-338-3124', 'naveenkumarraja16@gmail.com', 'government', 'abc', '12345', '14'),
('E015', 'mmm', 'adsfasdf', '748-338-3124', 'naveen@gmail.com', 'government', '12345678', '12345678', '15'),
('E016', 'mmm', 'adsfasdf', '748-338-3124', 'naveen@gmail.com', 'private', '12345678', '12345678', '16'),
('E017', 'test', 'adsfasdf', '748-338-3124', 'naveen@gmail.com', 'government', 'test', '12345678', '17'),
('E018', 'naveen', 'byrathi nagar', '098-765-5432', 'naveen@gmail.com', 'private', 'nkr', '12345678', '18'),
('E019', 'mmm', 'byrathi nagar', '098-765-0987', 'naveen@gmail.com', 'private', '12345678', 'qwertyui', '19'),
('E020', 'mmm', 'byrathi nagar', '123-457-0987', 'naveen@gmail.com', 'government', '12345678', '12345678', '20'),
('E021', 'mmm', 'byrathi nagar', '098-765-4321', 'naveen@gmail.com', 'government', 'test', '12345678', '21'),
('E06', 'new horizon collage', 'marathalli , Bangalore', '123-456-7890', 'afsgdh@gmail.com', 'private', 'hai', '12345678', '6'),
('E07', 'dafsgf', 'fsghj', '123-456-7890', 'afsgdh@gmail.com', 'government', 'afsgdhf', '12345678', '7'),
('E08', 'new horizon collage', 'fsghj', '123-456-7890', 'afsgdh@gmail.com', 'private', 'afsgdhf', '12345678', '8'),
('E09', 'asdf', 'asdfasdf', '123-456-7891', 'asdfasdfasdf@gmail.com', 'government', 'asdfasdfsdaf', 'abc', '9');

-- --------------------------------------------------------

--
-- Table structure for table `dcet_2019`
--

CREATE TABLE `dcet_2019` (
  `priority` int(10) DEFAULT NULL,
  `announcement` varchar(100) NOT NULL,
  `link` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dcet_2019`
--

INSERT INTO `dcet_2019` (`priority`, `announcement`, `link`) VALUES
(1, 'dcet broucher for year 2019', '#');

-- --------------------------------------------------------

--
-- Table structure for table `dcet_2021`
--

CREATE TABLE `dcet_2021` (
  `priority` int(10) NOT NULL,
  `announcement` varchar(100) NOT NULL,
  `link` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dcet_2021`
--

INSERT INTO `dcet_2021` (`priority`, `announcement`, `link`) VALUES
(3, 'Application for the year 2021 DCET Procedure Brouc', 'home_page.php'),
(13, 'Dcet 2021 Round 1 option entry is open now ', 'option_entry_login.php'),
(10, 'here is the instructions and procedure for the dcet 2021', '#'),
(11, 'welcome', '#');

-- --------------------------------------------------------

--
-- Table structure for table `diploma_courses`
--

CREATE TABLE `diploma_courses` (
  `collage_id` varchar(20) DEFAULT NULL,
  `cs` varchar(20) NOT NULL,
  `me` varchar(20) NOT NULL,
  `cvl` varchar(20) NOT NULL,
  `eee` varchar(20) NOT NULL,
  `ec` varchar(20) NOT NULL,
  `tx` varchar(20) NOT NULL,
  `fd` varchar(20) NOT NULL,
  `at` varchar(20) NOT NULL,
  `ae` varchar(20) NOT NULL,
  `hm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diploma_courses`
--

INSERT INTO `diploma_courses` (`collage_id`, `cs`, `me`, `cvl`, `eee`, `ec`, `tx`, `fd`, `at`, `ae`, `hm`) VALUES
('1', '60', '60', '60', '60', '60', '', '', '50', '', ''),
('E020', '', '', '', '', '', '', '', '', '', ''),
('2', '20', '', '', '', '10', '', '', '', '', '40'),
('E015', '', '', '', '', '123', '', '', '', '', ''),
('E021', '', '', '', '', '12', '', '', '', '', ''),
('E011', '', '', '11', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kcet_2021`
--

CREATE TABLE `kcet_2021` (
  `announcement` varchar(100) NOT NULL,
  `link` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kcet_2021`
--

INSERT INTO `kcet_2021` (`announcement`, `link`) VALUES
('appplication for kcet 2021 are open now', '#'),
('kcet 2021 broucher ', 'home_page.php');

-- --------------------------------------------------------

--
-- Table structure for table `pg_mba_course_list`
--

CREATE TABLE `pg_mba_course_list` (
  `collage_id` varchar(20) DEFAULT NULL,
  `mba` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg_mba_course_list`
--

INSERT INTO `pg_mba_course_list` (`collage_id`, `mba`) VALUES
('2', '80'),
('E003', '11'),
('E09', '60'),
('E017', '60'),
('E06', '0'),
('E021', '11');

-- --------------------------------------------------------

--
-- Table structure for table `pg_mca_course_list`
--

CREATE TABLE `pg_mca_course_list` (
  `collage_id` varchar(20) DEFAULT NULL,
  `mca` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg_mca_course_list`
--

INSERT INTO `pg_mca_course_list` (`collage_id`, `mca`) VALUES
('1', '60'),
('2', '50'),
('E020', '111'),
('E06', ''),
('E09', ''),
('3', '11'),
('E021', '11');

-- --------------------------------------------------------

--
-- Table structure for table `pg_mtech_course_list`
--

CREATE TABLE `pg_mtech_course_list` (
  `collage_id` varchar(20) DEFAULT NULL,
  `cse` varchar(20) NOT NULL,
  `tt` varchar(20) NOT NULL,
  `cvl` varchar(20) NOT NULL,
  `it` varchar(20) NOT NULL,
  `ec` varchar(20) NOT NULL,
  `wt` varchar(20) NOT NULL,
  `md` varchar(20) NOT NULL,
  `gt` varchar(20) NOT NULL,
  `cn` varchar(20) NOT NULL,
  `nt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pg_mtech_course_list`
--

INSERT INTO `pg_mtech_course_list` (`collage_id`, `cse`, `tt`, `cvl`, `it`, `ec`, `wt`, `md`, `gt`, `cn`, `nt`) VALUES
('1', '20', '5', '7', '', '8', '', '', '10', '', '12'),
('E020', '', '', '', '', '', '', '', '', '', ''),
('E011', '', '', '', '', '', '', '', '', '', ''),
('E09', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
('2', '12', '2', '2', '2', '2', '2', '2', '2', '2', '11'),
('E021', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `recent_circulars`
--

CREATE TABLE `recent_circulars` (
  `circulars` varchar(100) NOT NULL,
  `link` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recent_circulars`
--

INSERT INTO `recent_circulars` (`circulars`, `link`) VALUES
('submission of seat matrix for the diploma admission 2022', '#'),
('submission of seat matrix for the KCET 2022', '#'),
('welcome', '#');

-- --------------------------------------------------------

--
-- Table structure for table `ug_course_list`
--

CREATE TABLE `ug_course_list` (
  `collage_id` varchar(30) DEFAULT NULL,
  `cs` varchar(20) NOT NULL,
  `me` varchar(20) NOT NULL,
  `ce` varchar(20) NOT NULL,
  `eee` varchar(20) NOT NULL,
  `ec` varchar(20) NOT NULL,
  `tx` varchar(20) NOT NULL,
  `au` varchar(20) NOT NULL,
  `mt` varchar(20) NOT NULL,
  `rb` varchar(20) NOT NULL,
  `ise` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ug_course_list`
--

INSERT INTO `ug_course_list` (`collage_id`, `cs`, `me`, `ce`, `eee`, `ec`, `tx`, `au`, `mt`, `rb`, `ise`) VALUES
('1', '70', '80', '60', '60', '70', '', '', '', '', '60'),
('E020', '', '', '', '', '', '', '', '', '', ''),
('2', '41', '5', '1', '', '', '0', '1', '5', '1', '6'),
('E003', '', '', '', '', '', '', '', '', '', ''),
('E015', '111', '1', '', '', '', '', '', '', '', '123'),
('E021', '11', '', '', '', '', '', '', '', '', '22'),
('E014', '', '', '', '', '', '', '', '', '', ''),
('3', '11', '12', '13', '12', '', '10', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collage_count`
--
ALTER TABLE `collage_count`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `collage_list`
--
ALTER TABLE `collage_list`
  ADD PRIMARY KEY (`collage_id`);

--
-- Indexes for table `dcet_2021`
--
ALTER TABLE `dcet_2021`
  ADD PRIMARY KEY (`announcement`);

--
-- Indexes for table `diploma_courses`
--
ALTER TABLE `diploma_courses`
  ADD KEY `collage_id` (`collage_id`);

--
-- Indexes for table `kcet_2021`
--
ALTER TABLE `kcet_2021`
  ADD PRIMARY KEY (`announcement`);

--
-- Indexes for table `pg_mba_course_list`
--
ALTER TABLE `pg_mba_course_list`
  ADD KEY `collage_id` (`collage_id`);

--
-- Indexes for table `pg_mca_course_list`
--
ALTER TABLE `pg_mca_course_list`
  ADD KEY `collage_id` (`collage_id`);

--
-- Indexes for table `pg_mtech_course_list`
--
ALTER TABLE `pg_mtech_course_list`
  ADD KEY `collage_id` (`collage_id`);

--
-- Indexes for table `recent_circulars`
--
ALTER TABLE `recent_circulars`
  ADD PRIMARY KEY (`circulars`);

--
-- Indexes for table `ug_course_list`
--
ALTER TABLE `ug_course_list`
  ADD KEY `collage_id` (`collage_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diploma_courses`
--
ALTER TABLE `diploma_courses`
  ADD CONSTRAINT `diploma_courses_ibfk_1` FOREIGN KEY (`collage_id`) REFERENCES `collage_list` (`collage_id`);

--
-- Constraints for table `pg_mba_course_list`
--
ALTER TABLE `pg_mba_course_list`
  ADD CONSTRAINT `pg_mba_course_list_ibfk_1` FOREIGN KEY (`collage_id`) REFERENCES `collage_list` (`collage_id`);

--
-- Constraints for table `pg_mca_course_list`
--
ALTER TABLE `pg_mca_course_list`
  ADD CONSTRAINT `pg_mca_course_list_ibfk_1` FOREIGN KEY (`collage_id`) REFERENCES `collage_list` (`collage_id`);

--
-- Constraints for table `pg_mtech_course_list`
--
ALTER TABLE `pg_mtech_course_list`
  ADD CONSTRAINT `pg_mtech_course_list_ibfk_1` FOREIGN KEY (`collage_id`) REFERENCES `collage_list` (`collage_id`);

--
-- Constraints for table `ug_course_list`
--
ALTER TABLE `ug_course_list`
  ADD CONSTRAINT `ug_course_list_ibfk_1` FOREIGN KEY (`collage_id`) REFERENCES `collage_list` (`collage_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
