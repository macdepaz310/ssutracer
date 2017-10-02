-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2017 at 11:32 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssutracer`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch_tbl`
--

CREATE TABLE `batch_tbl` (
  `batchID` int(100) NOT NULL,
  `yearBatch` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_tbl`
--

INSERT INTO `batch_tbl` (`batchID`, `yearBatch`) VALUES
(2013, 2013),
(2014, 2014),
(2015, 2015),
(2016, 2016),
(2017, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `personalinfo_tbl`
--

CREATE TABLE `personalinfo_tbl` (
  `respondentID` int(100) NOT NULL,
  `yearBatch` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_initial` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `course` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalinfo_tbl`
--

INSERT INTO `personalinfo_tbl` (`respondentID`, `yearBatch`, `first_name`, `middle_initial`, `last_name`, `gender`, `birthdate`, `civil_status`, `course`, `address`, `contact_number`, `email_address`, `password`) VALUES
(3, 2017, 'Michael Jake', 'G', 'Bacuetes', 'Male', '1999-12-25', 'single', 'BSIS', 'Catbalogan Samar', '123456', 'mjbacuetes@gmail.com', '$2y$10$lg.aixUXSP9ACJ.F6pGkm.htzDWFWp4AhCGVyPyZl7ay7xQV6oJxy');

-- --------------------------------------------------------

--
-- Table structure for table `question_tbl`
--

CREATE TABLE `question_tbl` (
  `questionID` int(100) NOT NULL,
  `questionText` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_tbl`
--

INSERT INTO `question_tbl` (`questionID`, `questionText`) VALUES
(1, 'Are you currently employed?'),
(2, 'Employment Status?'),
(3, 'What is your initial gross monthly income in your first job after college?'),
(4, 'How did you land your first job?');

-- --------------------------------------------------------

--
-- Table structure for table `response_tbl`
--

CREATE TABLE `response_tbl` (
  `responseID` int(100) NOT NULL,
  `question_ID` int(100) NOT NULL,
  `respondent_id` int(100) NOT NULL,
  `responseToQuestion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch_tbl`
--
ALTER TABLE `batch_tbl`
  ADD PRIMARY KEY (`batchID`);

--
-- Indexes for table `personalinfo_tbl`
--
ALTER TABLE `personalinfo_tbl`
  ADD PRIMARY KEY (`respondentID`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD KEY `yearBatch` (`yearBatch`);

--
-- Indexes for table `question_tbl`
--
ALTER TABLE `question_tbl`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `response_tbl`
--
ALTER TABLE `response_tbl`
  ADD PRIMARY KEY (`responseID`),
  ADD KEY `question_ID` (`question_ID`),
  ADD KEY `respondent_id` (`respondent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch_tbl`
--
ALTER TABLE `batch_tbl`
  MODIFY `batchID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2018;
--
-- AUTO_INCREMENT for table `personalinfo_tbl`
--
ALTER TABLE `personalinfo_tbl`
  MODIFY `respondentID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `question_tbl`
--
ALTER TABLE `question_tbl`
  MODIFY `questionID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `response_tbl`
--
ALTER TABLE `response_tbl`
  MODIFY `responseID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `personalinfo_tbl`
--
ALTER TABLE `personalinfo_tbl`
  ADD CONSTRAINT `personalinfo_tbl_ibfk_1` FOREIGN KEY (`yearBatch`) REFERENCES `batch_tbl` (`batchID`);

--
-- Constraints for table `response_tbl`
--
ALTER TABLE `response_tbl`
  ADD CONSTRAINT `response_tbl_ibfk_1` FOREIGN KEY (`question_ID`) REFERENCES `question_tbl` (`questionID`),
  ADD CONSTRAINT `response_tbl_ibfk_2` FOREIGN KEY (`respondent_id`) REFERENCES `personalinfo_tbl` (`respondentID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
