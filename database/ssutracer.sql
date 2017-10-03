-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2017 at 10:45 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

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
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `userid` int(100) NOT NULL,
  `adminuser` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`userid`, `adminuser`, `password`) VALUES
(1, 'ssucasadmin', '015b67f79411d74b9de2a689a04517ff');

-- --------------------------------------------------------

--
-- Table structure for table `answer_tbl`
--

CREATE TABLE `answer_tbl` (
  `answerID` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answerText` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer_tbl`
--

INSERT INTO `answer_tbl` (`answerID`, `question_id`, `answerText`) VALUES
(1, 1, 'yes'),
(2, 1, 'no');

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
(4, 'How did you land your first job?'),
(5, 'How long did it take you to land your first job?'),
(6, 'Job level position?');

-- --------------------------------------------------------

--
-- Table structure for table `response_tbl`
--

CREATE TABLE `response_tbl` (
  `responseID` int(100) NOT NULL,
  `answer_ID` int(100) NOT NULL,
  `respondent_id` int(100) NOT NULL,
  `responseToQuestion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response_tbl`
--

INSERT INTO `response_tbl` (`responseID`, `answer_ID`, `respondent_id`, `responseToQuestion`) VALUES
(1, 2, 3, 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `answer_tbl`
--
ALTER TABLE `answer_tbl`
  ADD PRIMARY KEY (`answerID`),
  ADD KEY `question_id` (`question_id`);

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
  ADD KEY `question_ID` (`answer_ID`),
  ADD KEY `respondent_id` (`respondent_id`),
  ADD KEY `answer_ID` (`answer_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `answer_tbl`
--
ALTER TABLE `answer_tbl`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `questionID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `response_tbl`
--
ALTER TABLE `response_tbl`
  MODIFY `responseID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer_tbl`
--
ALTER TABLE `answer_tbl`
  ADD CONSTRAINT `answer_tbl_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question_tbl` (`questionID`);

--
-- Constraints for table `personalinfo_tbl`
--
ALTER TABLE `personalinfo_tbl`
  ADD CONSTRAINT `personalinfo_tbl_ibfk_1` FOREIGN KEY (`yearBatch`) REFERENCES `batch_tbl` (`batchID`);

--
-- Constraints for table `response_tbl`
--
ALTER TABLE `response_tbl`
  ADD CONSTRAINT `response_tbl_ibfk_1` FOREIGN KEY (`answer_ID`) REFERENCES `answer_tbl` (`answerID`),
  ADD CONSTRAINT `response_tbl_ibfk_2` FOREIGN KEY (`respondent_id`) REFERENCES `personalinfo_tbl` (`respondentID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
