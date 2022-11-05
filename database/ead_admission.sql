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
-- Database: `ead_admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `course` varchar(50) NOT NULL,
  `display` varchar(25) NOT NULL,
  `link` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `edit_option` varchar(30) NOT NULL,
  `seat_matrix` varchar(50) NOT NULL,
  `seat_matrix_edit` varchar(50) NOT NULL,
  `option_entry` varchar(50) NOT NULL,
  `Result` varchar(50) NOT NULL,
  `ongoing_option_entry` int(50) NOT NULL,
  `option_entry_1` varchar(50) NOT NULL,
  `option_entry_2` varchar(50) NOT NULL,
  `option_entry_3` varchar(50) NOT NULL,
  `expell_round_1` varchar(50) NOT NULL,
  `expell_round_2` varchar(50) NOT NULL,
  `expell_round_3` varchar(50) NOT NULL,
  `admissions` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`course`, `display`, `link`, `status`, `edit_option`, `seat_matrix`, `seat_matrix_edit`, `option_entry`, `Result`, `ongoing_option_entry`, `option_entry_1`, `option_entry_2`, `option_entry_3`, `expell_round_1`, `expell_round_2`, `expell_round_3`, `admissions`) VALUES
('DCET 2019', 'previous', '', 'closed', 'closed', '', 'closed', 'closed', '', 0, '', '', '', '', '', '', 'closed'),
('DCET 2021', 'previous', 'dcet.php', 'closed', 'closed', 'created', 'closed', 'closed', 'open', 3, 'allocated', 'allocated', 'allocated', 'expelled', 'expelled', 'expelled', 'closed'),
('KCET 2021', 'previous', '', 'open', 'closed', 'created', 'open', 'open', '', 0, '', '', '', '', '', '', 'closed'),
('KCET 2022', 'present', 'dcet.php', 'closed', 'closed', 'created', 'closed', 'closed', '', 0, '', '', '', '', '', '', 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `name` varchar(50) NOT NULL,
  `card_number` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `security_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`name`, `card_number`, `date`, `security_code`) VALUES
('RuPay', '1234-5678-9012-3456', '2022-07', '123');

-- --------------------------------------------------------

--
-- Table structure for table `dcet_2019`
--

CREATE TABLE `dcet_2019` (
  `application_id` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adhaar` varchar(30) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `mother_tongue` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `caste` varchar(20) NOT NULL,
  `sub_caste` varchar(30) NOT NULL,
  `address` varchar(10000) NOT NULL,
  `state` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `pincode` int(30) NOT NULL,
  `10_studied_state` varchar(50) NOT NULL,
  `10_passed_year` year(4) NOT NULL,
  `10_marks` int(30) NOT NULL,
  `10_total_marks` int(50) NOT NULL,
  `10_type` varchar(30) NOT NULL,
  `10_roll_number` varchar(30) NOT NULL,
  `diploma_course` varchar(100) NOT NULL,
  `diploma_1year_total_marks` int(50) NOT NULL,
  `diploma_2year_total_marks` int(50) NOT NULL,
  `diploma_3year_total_marks` int(50) NOT NULL,
  `diploma_roll_number` varchar(30) NOT NULL,
  `diploma_year_1_marks` int(30) NOT NULL,
  `diploma_year_1_status` varchar(30) NOT NULL,
  `diploma_year_2_marks` int(30) NOT NULL,
  `diploma_year_2_status` varchar(30) NOT NULL,
  `diploma_year_3_marks` int(30) NOT NULL,
  `diploma_year_3_status` varchar(30) NOT NULL,
  `ead_total_marks` int(100) NOT NULL,
  `ead_obtained_marks` int(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `final_submit` varchar(50) NOT NULL,
  `application_payment` varchar(30) NOT NULL,
  `application_fee` int(50) NOT NULL,
  `ead_marks` int(100) NOT NULL,
  `ranking` int(100) NOT NULL,
  `verification` varchar(100) NOT NULL,
  `option_entry` varchar(10000) NOT NULL,
  `option_entry_1_result` varchar(50) NOT NULL,
  `option_entry_1_selected` varchar(50) NOT NULL,
  `option_entry_2_selected` varchar(50) NOT NULL,
  `option_entry_2_result` varchar(50) NOT NULL,
  `option_entry_3_selected` varchar(50) NOT NULL,
  `option_entry_3_result` varchar(50) NOT NULL,
  `option_entry_mock_selected` varchar(50) NOT NULL,
  `option_entry_mock_result` varchar(50) NOT NULL,
  `selected_collage` varchar(50) NOT NULL,
  `admission_amount` int(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `collage_admitted_status` varchar(50) NOT NULL,
  `admission_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dcet_2019`
--

INSERT INTO `dcet_2019` (`application_id`, `name`, `dob`, `gender`, `phone`, `email`, `adhaar`, `nationality`, `mother_tongue`, `religion`, `caste`, `sub_caste`, `address`, `state`, `district`, `pincode`, `10_studied_state`, `10_passed_year`, `10_marks`, `10_total_marks`, `10_type`, `10_roll_number`, `diploma_course`, `diploma_1year_total_marks`, `diploma_2year_total_marks`, `diploma_3year_total_marks`, `diploma_roll_number`, `diploma_year_1_marks`, `diploma_year_1_status`, `diploma_year_2_marks`, `diploma_year_2_status`, `diploma_year_3_marks`, `diploma_year_3_status`, `ead_total_marks`, `ead_obtained_marks`, `password`, `final_submit`, `application_payment`, `application_fee`, `ead_marks`, `ranking`, `verification`, `option_entry`, `option_entry_1_result`, `option_entry_1_selected`, `option_entry_2_selected`, `option_entry_2_result`, `option_entry_3_selected`, `option_entry_3_result`, `option_entry_mock_selected`, `option_entry_mock_result`, `selected_collage`, `admission_amount`, `payment_status`, `collage_admitted_status`, `admission_status`) VALUES
('1111', 'dummy', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, 0, 0, '', '', '', 0, 0, 0, '', 0, '', 0, '', 0, '', 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', 0, '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dcet_2019_count`
--

CREATE TABLE `dcet_2019_count` (
  `count` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dcet_2019_count`
--

INSERT INTO `dcet_2019_count` (`count`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `dcet_2021`
--

CREATE TABLE `dcet_2021` (
  `application_id` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adhaar` varchar(30) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `mother_tongue` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `caste` varchar(20) NOT NULL,
  `sub_caste` varchar(30) NOT NULL,
  `address` varchar(10000) NOT NULL,
  `state` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `pincode` int(30) NOT NULL,
  `10_studied_state` varchar(50) NOT NULL,
  `10_passed_year` year(4) NOT NULL,
  `10_marks` int(30) NOT NULL,
  `10_total_marks` int(50) NOT NULL,
  `10_type` varchar(30) NOT NULL,
  `10_roll_number` varchar(30) NOT NULL,
  `diploma_course` varchar(100) NOT NULL,
  `diploma_1year_total_marks` int(50) NOT NULL,
  `diploma_2year_total_marks` int(50) NOT NULL,
  `diploma_3year_total_marks` int(50) NOT NULL,
  `diploma_roll_number` varchar(30) NOT NULL,
  `diploma_year_1_marks` int(30) NOT NULL,
  `diploma_year_1_status` varchar(30) NOT NULL,
  `diploma_year_2_marks` int(30) NOT NULL,
  `diploma_year_2_status` varchar(30) NOT NULL,
  `diploma_year_3_marks` int(30) NOT NULL,
  `diploma_year_3_status` varchar(30) NOT NULL,
  `ead_total_marks` int(100) NOT NULL,
  `ead_obtained_marks` int(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `final_submit` varchar(50) NOT NULL,
  `application_payment` varchar(30) NOT NULL,
  `application_fee` int(50) NOT NULL,
  `ead_marks` int(100) NOT NULL,
  `ranking` int(100) NOT NULL,
  `verification` varchar(100) NOT NULL,
  `option_entry` varchar(10000) NOT NULL,
  `option_entry_1_result` varchar(50) NOT NULL,
  `option_entry_1_selected` varchar(50) NOT NULL,
  `option_entry_2_selected` varchar(50) NOT NULL,
  `option_entry_2_result` varchar(50) NOT NULL,
  `option_entry_3_selected` varchar(50) NOT NULL,
  `option_entry_3_result` varchar(50) NOT NULL,
  `option_entry_mock_selected` varchar(50) NOT NULL,
  `option_entry_mock_result` varchar(50) NOT NULL,
  `selected_collage` varchar(50) NOT NULL,
  `admission_amount` int(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `collage_admitted_status` varchar(50) NOT NULL,
  `admission_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dcet_2021`
--

INSERT INTO `dcet_2021` (`application_id`, `name`, `dob`, `gender`, `phone`, `email`, `adhaar`, `nationality`, `mother_tongue`, `religion`, `caste`, `sub_caste`, `address`, `state`, `district`, `pincode`, `10_studied_state`, `10_passed_year`, `10_marks`, `10_total_marks`, `10_type`, `10_roll_number`, `diploma_course`, `diploma_1year_total_marks`, `diploma_2year_total_marks`, `diploma_3year_total_marks`, `diploma_roll_number`, `diploma_year_1_marks`, `diploma_year_1_status`, `diploma_year_2_marks`, `diploma_year_2_status`, `diploma_year_3_marks`, `diploma_year_3_status`, `ead_total_marks`, `ead_obtained_marks`, `password`, `final_submit`, `application_payment`, `application_fee`, `ead_marks`, `ranking`, `verification`, `option_entry`, `option_entry_1_result`, `option_entry_1_selected`, `option_entry_2_selected`, `option_entry_2_result`, `option_entry_3_selected`, `option_entry_3_result`, `option_entry_mock_selected`, `option_entry_mock_result`, `selected_collage`, `admission_amount`, `payment_status`, `collage_admitted_status`, `admission_status`) VALUES
('1111', 'dummy', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, 0, 0, '', '', '', 0, 0, 0, '', 0, '', 0, '', 0, '', 0, 0, '', '', '', 0, 0, 4, '', '', '', '', '', '', '', '', '', '', 'ise_1', 0, '0', '', ''),
('dcet2021001', 'Naveen Kumar R', '2001-11-16', 'male', '7483383124', 'naveenkumarraja16@gmail.com', '409544729868', 'indian', 'telugu', 'hindu', 'SC', 'Adi Dravida', '56/7 maruthi township , bileshivlae,doddagubbi main road,bangalore 560077', 'Karnataka', 'bangalore urban', 560077, 'Karnataka', 2017, 484, 600, 'icse', '6446689', 'CS', 1200, 1350, 1200, '175CS17031', 1160, 'Pass', 1180, 'Pass', 1069, 'Pass', 180, 140, '16112001@Naveen', 'done', 'done', 500, 83, 1, '', 'cs_1 ise_1 cs_2 ise_2 cs_3 cs_E015 ise_E015 cs_E021 ise_E021 ', 'ise_1', 'option_2', 'option_2', 'ise_1', 'option_1', 'ise_1', '', '', 'ise_1', 500, 'done', 'admitted', ''),
('dcet20210011', 'Naveen Kumar R', '0000-00-00', 'NULL', '1234567890', 'afsgdh@gmail.com', 'NULL', 'NULL', 'NULL', 'NULL', 'SNQ', 'NULL', 'NULL', 'NULL', 'NULL', 0, '', 0000, 0, 0, 'NULL', 'NULL', 'eee', 0, 0, 1000, '0', 0, 'NULL', 0, 'NULL', 780, 'NULL', 180, 120, '16112001@Naveen', 'done', 'done', 500, 72, 3, '', 'eee_1 eee_3 ', 'eee_1', 'option_2', 'option_3', '', '', 'eee_1', '', '', '', 0, '0', '', ''),
('dcet2021004', 'Naveen Kumar R', '2001-06-16', 'male', '7338047790', 'naveenkumarraja16@gmail.com', '409544729868', 'indian', 'telugu', 'hindu', 'general', '', '56/7 maruthi township , bileshivlae,doddagubbi main road,bangalore 560077', 'Andaman and Nicobar Islands', 'bangalore urban', 560077, 'Andaman and Nicobar Islands', 2017, 456, 600, 'icse', '6446689', 'ise', 525, 625, 650, '17217890', 500, 'Pass', 600, 'Pass', 612, 'Pass', 180, 111, '16112001', 'done', 'done', 650, 78, 2, '', 'ise_1 cs_1 ', 'ise_1', 'option_1', 'option_1', 'ise_1', '', 'ise_1', '', '', '', 19090, 'done', 'admitted', '');

-- --------------------------------------------------------

--
-- Table structure for table `dcet_2021_count`
--

CREATE TABLE `dcet_2021_count` (
  `count` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dcet_2021_count`
--

INSERT INTO `dcet_2021_count` (`count`) VALUES
(15);

-- --------------------------------------------------------

--
-- Table structure for table `dcet_2021_seat_matrix`
--

CREATE TABLE `dcet_2021_seat_matrix` (
  `collage_id` varchar(30) DEFAULT NULL,
  `course` varchar(10) DEFAULT NULL,
  `collage_id_and_total_seats` varchar(50) NOT NULL,
  `total_seats` int(50) DEFAULT NULL,
  `general` int(30) DEFAULT NULL,
  `2A` int(30) DEFAULT NULL,
  `2B` int(30) DEFAULT NULL,
  `3A` int(30) DEFAULT NULL,
  `3B` int(30) DEFAULT NULL,
  `SC` int(30) DEFAULT NULL,
  `ST` int(30) DEFAULT NULL,
  `SNQ` int(30) DEFAULT NULL,
  `HYK` int(30) DEFAULT NULL,
  `collage_submission_status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dcet_2021_seat_matrix`
--

INSERT INTO `dcet_2021_seat_matrix` (`collage_id`, `course`, `collage_id_and_total_seats`, `total_seats`, `general`, `2A`, `2B`, `3A`, `3B`, `SC`, `ST`, `SNQ`, `HYK`, `collage_submission_status`) VALUES
('2', 'au', 'au_2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'submitted'),
('1', 'ce', 'ce_1', 6, 1, 2, 1, 0, 0, 1, 1, 0, 0, 'submitted'),
('2', 'ce', 'ce_2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'submitted'),
('1', 'cs', 'cs_1', 3, 0, 0, 0, 0, 1, 0, 0, 1, 0, 'submitted'),
('2', 'cs', 'cs_2', 4, 1, 1, 0, 0, 0, -2, 0, 1, 0, 'submitted'),
('1', 'ce', 'ec_1', 7, 3, 0, 0, 0, 0, 3, 0, 1, 0, 'submitted'),
('1', 'eee', 'eee_1', 6, 0, 3, 0, 0, 1, 1, 1, 0, 0, 'submitted'),
('1', 'ise', 'ise_1', 4, 0, 0, 0, 1, 0, 0, 0, 0, 0, 'submitted'),
('2', 'ise', 'ise_2', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'submitted'),
('2', 'mt', 'mt_2', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 'submitted'),
('2', 'rb', 'rb_2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `kcet_2021_seat_matrix`
--

CREATE TABLE `kcet_2021_seat_matrix` (
  `collage_id` varchar(30) DEFAULT NULL,
  `course` varchar(30) DEFAULT NULL,
  `collage_id_and_total_seats` varchar(50) NOT NULL,
  `total_seats` int(50) DEFAULT NULL,
  `general` int(30) DEFAULT NULL,
  `2A` int(30) DEFAULT NULL,
  `2B` int(30) DEFAULT NULL,
  `3A` int(30) DEFAULT NULL,
  `3B` int(30) DEFAULT NULL,
  `SC` int(30) DEFAULT NULL,
  `ST` int(30) DEFAULT NULL,
  `SNQ` int(30) DEFAULT NULL,
  `HYK` int(30) DEFAULT NULL,
  `collage_submission_status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kcet_2021_seat_matrix`
--

INSERT INTO `kcet_2021_seat_matrix` (`collage_id`, `course`, `collage_id_and_total_seats`, `total_seats`, `general`, `2A`, `2B`, `3A`, `3B`, `SC`, `ST`, `SNQ`, `HYK`, `collage_submission_status`) VALUES
('2', 'au', 'au_2', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'ce', 'ce_1', 60, 60, 0, 0, 0, 0, 0, 0, 0, 0, 'submitted'),
('2', 'ce', 'ce_2', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'ce', 'ce_3', 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'ec', 'ec_1', 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'eee', 'eee_1', 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'eee', 'eee_3', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'ise', 'ise_1', 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2', 'ise', 'ise_2', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('E015', 'ise', 'ise_E015', 123, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('E021', 'ise', 'ise_E021', 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'me', 'me_1', 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2', 'me', 'me_2', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'me', 'me_3', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('E015', 'me', 'me_E015', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2', 'mt', 'mt_2', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2', 'rb', 'rb_2', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'tx', 'tx_3', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kcet_2022_seat_matrix`
--

CREATE TABLE `kcet_2022_seat_matrix` (
  `collage_id` varchar(30) DEFAULT NULL,
  `course` varchar(30) DEFAULT NULL,
  `collage_id_and_total_seats` varchar(50) NOT NULL,
  `total_seats` int(50) DEFAULT NULL,
  `general` int(30) DEFAULT NULL,
  `2A` int(30) DEFAULT NULL,
  `2B` int(30) DEFAULT NULL,
  `3A` int(30) DEFAULT NULL,
  `3B` int(30) DEFAULT NULL,
  `SC` int(30) DEFAULT NULL,
  `ST` int(30) DEFAULT NULL,
  `SNQ` int(30) DEFAULT NULL,
  `HYK` int(30) DEFAULT NULL,
  `collage_submission_status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kcet_2022_seat_matrix`
--

INSERT INTO `kcet_2022_seat_matrix` (`collage_id`, `course`, `collage_id_and_total_seats`, `total_seats`, `general`, `2A`, `2B`, `3A`, `3B`, `SC`, `ST`, `SNQ`, `HYK`, `collage_submission_status`) VALUES
('2', 'au', 'au_2', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'ce', 'ce_1', 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2', 'ce', 'ce_2', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'ce', 'ce_3', 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'ec', 'ec_1', 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'eee', 'eee_1', 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'eee', 'eee_3', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'ise', 'ise_1', 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2', 'ise', 'ise_2', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('E015', 'ise', 'ise_E015', 123, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('E021', 'ise', 'ise_E021', 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1', 'me', 'me_1', 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2', 'me', 'me_2', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'me', 'me_3', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('E015', 'me', 'me_E015', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2', 'mt', 'mt_2', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2', 'rb', 'rb_2', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'tx', 'tx_3', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`name`) VALUES
('Andaman and Nicobar Islands'),
('Andhra Pradesh'),
('Arunachal Pradesh'),
('Assam'),
('Bihar'),
('chandigarh'),
('Chhattisgarh'),
('Dadra and Nagar Haveli'),
('Daman and Diu'),
('Delhi'),
('Goa'),
('Gujarat'),
('Haryana'),
('Himachal Pradesh'),
('Jammu and Kashmir'),
('Jharkhand'),
('Karnataka'),
('Kerala'),
('lakshadweep'),
('Madhaya Pradesh'),
('Maharastra'),
('Manipur'),
('Meghalaya'),
('Mizoram'),
('Nagaland'),
('Odisha'),
('Puducherry'),
('Punjab'),
('Rajasthan'),
('Sikkim'),
('Tamil Nadu'),
('Telangana'),
('Tripura'),
('Uttar Pradesh'),
('Uttarkhand'),
('West Bengal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`course`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_number`);

--
-- Indexes for table `dcet_2019`
--
ALTER TABLE `dcet_2019`
  ADD PRIMARY KEY (`application_id`,`phone`);

--
-- Indexes for table `dcet_2021`
--
ALTER TABLE `dcet_2021`
  ADD PRIMARY KEY (`application_id`,`phone`);

--
-- Indexes for table `dcet_2021_seat_matrix`
--
ALTER TABLE `dcet_2021_seat_matrix`
  ADD PRIMARY KEY (`collage_id_and_total_seats`);

--
-- Indexes for table `kcet_2021_seat_matrix`
--
ALTER TABLE `kcet_2021_seat_matrix`
  ADD PRIMARY KEY (`collage_id_and_total_seats`);

--
-- Indexes for table `kcet_2022_seat_matrix`
--
ALTER TABLE `kcet_2022_seat_matrix`
  ADD PRIMARY KEY (`collage_id_and_total_seats`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
