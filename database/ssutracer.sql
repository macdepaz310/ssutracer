-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2017 at 12:29 PM
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
  `respondent_ID` int(100) NOT NULL,
  `answerText` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer_tbl`
--

INSERT INTO `answer_tbl` (`answerID`, `question_id`, `respondent_ID`, `answerText`) VALUES
(3, 1, 4, 'Yes'),
(4, 1, 4, 'yes'),
(5, 1, 4, 'no'),
(6, 1, 4, 'yes'),
(7, 1, 4, 'no'),
(8, 1, 3, 'yes'),
(9, 1, 4, 'yes'),
(10, 1, 4, 'yes'),
(11, 1, 4, 'no'),
(12, 1, 4, 'yes'),
(13, 2, 4, 'Self-Employed'),
(14, 3, 4, '8k-15k'),
(15, 3, 4, '15k-25k'),
(16, 3, 4, '8k-15k'),
(17, 4, 4, 'familyBusiness'),
(18, 5, 4, '1-2years'),
(19, 6, 4, 'self-employed'),
(20, 1, 4, 'no'),
(21, 2, 4, 'Self-Employed'),
(22, 3, 4, '<8k'),
(23, 4, 4, 'familyBusiness'),
(24, 5, 4, '1-5mos'),
(25, 6, 4, 'managerial/executive'),
(26, 1, 5, 'yes'),
(27, 2, 5, 'Temporary'),
(28, 3, 5, '<8k'),
(29, 4, 5, 'recommendedBySomeone'),
(30, 5, 5, '1-5mos'),
(31, 6, 5, 'self-employed'),
(32, 1, 10, 'yes'),
(33, 2, 10, 'Temporary'),
(34, 3, 10, '<8k'),
(35, 4, 10, 'recommendedBySomeone'),
(36, 5, 10, '1-5mos'),
(37, 6, 10, 'professional/advisory'),
(38, 1, 11, 'yes'),
(39, 2, 11, 'Casual'),
(40, 3, 11, '8k-15k'),
(41, 4, 11, 'responseToAdvertisement'),
(42, 5, 11, '5-11mos'),
(43, 6, 11, 'professional/advisory'),
(44, 1, 12, 'no'),
(45, 1, 12, 'yes'),
(46, 2, 12, 'Contractual'),
(47, 3, 12, '8k-15k'),
(48, 4, 12, 'arrangeBytheSchoolOrJobPlacementOffer'),
(49, 5, 12, '1-5mos'),
(50, 6, 12, 'managerial/executive'),
(51, 1, 14, 'yes'),
(52, 2, 14, 'Temporary'),
(53, 3, 14, '8k-15k'),
(54, 4, 14, 'responseToAdvertisement'),
(55, 5, 14, '1-2years'),
(56, 6, 14, 'professional/advisory'),
(57, 1, 16, 'yes'),
(58, 2, 16, 'Self-Employed'),
(59, 3, 16, '15k-25k'),
(60, 4, 16, 'familyBusiness'),
(61, 5, 16, '1-5mos'),
(62, 6, 16, 'self-employed'),
(63, 1, 17, 'yes'),
(64, 2, 17, 'Temporary'),
(65, 3, 17, '15k-25k'),
(66, 4, 17, 'recommendedBySomeone'),
(67, 5, 17, '5-11mos'),
(68, 6, 17, 'managerial/executive'),
(69, 1, 19, 'yes'),
(70, 2, 19, 'Temporary'),
(71, 3, 19, '8k-15k'),
(72, 4, 19, 'recommendedBySomeone'),
(73, 5, 19, '1-5mos'),
(74, 6, 19, 'rank/clerical'),
(75, 1, 20, 'yes'),
(76, 2, 20, 'Contractual'),
(77, 3, 20, '8k-15k'),
(78, 4, 20, 'jobFairOrPublicEmploymentServiceOffice'),
(79, 5, 20, '1-5mos'),
(80, 6, 20, 'professional/advisory'),
(81, 1, 21, 'yes'),
(82, 2, 21, 'Contractual'),
(83, 3, 21, '>25k'),
(84, 4, 21, 'responseToAdvertisement'),
(85, 5, 21, '5-11mos'),
(86, 6, 21, 'managerial/executive'),
(87, 1, 23, 'yes'),
(88, 2, 23, 'Self-Employed'),
(89, 3, 23, '<8k'),
(90, 4, 23, 'jobFairOrPublicEmploymentServiceOffice'),
(91, 5, 23, '1-5mos'),
(92, 6, 23, 'self-employed'),
(93, 1, 25, 'yes'),
(94, 2, 25, 'Self-Employed'),
(95, 3, 25, '<8k'),
(96, 4, 25, 'familyBusiness'),
(97, 5, 25, '1-5mos'),
(98, 6, 25, 'self-employed'),
(99, 1, 27, 'yes'),
(100, 2, 27, 'Temporary'),
(101, 3, 27, '15k-25k'),
(102, 4, 27, 'recommendedBySomeone'),
(103, 5, 27, '1-5mos'),
(104, 6, 27, 'rank/clerical'),
(105, 1, 30, 'yes'),
(106, 2, 30, 'Self-Employed'),
(107, 3, 30, '<8k'),
(108, 4, 30, 'familyBusiness'),
(109, 5, 30, '1-5mos'),
(110, 6, 30, 'self-employed'),
(111, 1, 31, 'yes'),
(112, 2, 31, 'Regular'),
(113, 3, 31, '8k-15k'),
(114, 4, 31, 'arrangeBytheSchoolOrJobPlacementOffer'),
(115, 5, 31, '1-5mos'),
(116, 6, 31, 'rank/clerical'),
(117, 1, 32, 'yes'),
(118, 2, 32, 'Casual'),
(119, 3, 32, '15k-25k'),
(120, 4, 32, 'walkInApplicant'),
(121, 5, 32, '1-2years'),
(122, 6, 32, 'rank/clerical'),
(123, 1, 34, 'yes'),
(124, 2, 34, 'Temporary'),
(125, 3, 34, '8k-15k'),
(126, 4, 34, 'recommendedBySomeone'),
(127, 5, 34, '1-5mos'),
(128, 6, 34, 'rank/clerical'),
(129, 1, 36, 'yes'),
(130, 2, 36, 'Contractual'),
(131, 3, 36, '15k-25k'),
(132, 4, 36, 'recommendedBySomeone'),
(133, 5, 36, '5-11mos'),
(134, 6, 36, 'professional/advisory'),
(135, 1, 37, 'yes'),
(136, 2, 37, 'Regular'),
(137, 3, 37, '8k-15k'),
(138, 4, 37, 'arrangeBytheSchoolOrJobPlacementOffer'),
(139, 5, 37, '5-11mos'),
(140, 6, 37, 'rank/clerical'),
(141, 1, 39, 'yes'),
(142, 2, 39, 'Contractual'),
(143, 3, 39, '>25k'),
(144, 4, 39, 'jobFairOrPublicEmploymentServiceOffice'),
(145, 5, 39, '2-3years'),
(146, 6, 39, 'rank/clerical'),
(147, 1, 41, 'yes'),
(148, 2, 41, 'Temporary'),
(149, 3, 41, '15k-25k'),
(150, 4, 41, 'recommendedBySomeone'),
(151, 5, 41, '1-2years'),
(152, 6, 41, 'rank/clerical'),
(153, 1, 42, 'yes'),
(154, 2, 42, 'Temporary'),
(155, 3, 42, '8k-15k'),
(156, 4, 42, 'walkInApplicant'),
(157, 5, 42, '1-5mos'),
(158, 6, 42, 'rank/clerical'),
(159, 1, 43, 'yes'),
(160, 2, 43, 'Regular'),
(161, 3, 43, '15k-25k'),
(162, 4, 43, 'arrangeBytheSchoolOrJobPlacementOffer'),
(163, 5, 43, '5-11mos'),
(164, 6, 43, 'rank/clerical'),
(165, 1, 45, 'yes'),
(166, 2, 45, 'Casual'),
(167, 3, 45, '15k-25k'),
(168, 4, 45, 'walkInApplicant'),
(169, 5, 45, '1-5mos'),
(170, 6, 45, 'rank/clerical'),
(171, 1, 47, 'yes'),
(172, 2, 47, 'Regular'),
(173, 3, 47, '15k-25k'),
(174, 4, 47, 'walkInApplicant'),
(175, 5, 47, '1-5mos'),
(176, 6, 47, 'professional/advisory'),
(177, 1, 48, 'yes'),
(178, 2, 48, 'Regular'),
(179, 3, 48, '8k-15k'),
(180, 4, 48, 'recommendedBySomeone'),
(181, 5, 48, '5-11mos'),
(182, 6, 48, 'managerial/executive'),
(183, 1, 49, 'yes'),
(184, 2, 49, 'Regular'),
(185, 3, 49, '<8k'),
(186, 4, 49, 'walkInApplicant'),
(187, 5, 49, '1-5mos'),
(188, 6, 49, 'rank/clerical'),
(189, 1, 4, 'yes'),
(190, 1, 4, 'no'),
(191, 1, 4, 'no'),
(192, 1, 51, 'yes'),
(193, 2, 51, 'Regular'),
(194, 3, 51, '8k-15k'),
(195, 4, 51, 'walkInApplicant'),
(196, 5, 51, '1-5mos'),
(197, 6, 51, 'rank/clerical'),
(198, 1, 4, 'yes'),
(199, 1, 4, 'no'),
(200, 1, 52, 'yes'),
(201, 2, 52, 'Casual'),
(202, 3, 52, '8k-15k'),
(203, 4, 52, 'recommendedBySomeone'),
(204, 5, 52, '5-11mos'),
(205, 6, 52, 'rank/clerical'),
(206, 1, 4, 'yes'),
(207, 1, 4, 'yes'),
(208, 1, 4, 'yes'),
(209, 1, 4, 'no'),
(210, 1, 4, 'no'),
(211, 1, 54, 'yes'),
(212, 2, 54, 'Regular'),
(213, 3, 54, '15k-25k'),
(214, 4, 54, 'jobFairOrPublicEmploymentServiceOffice'),
(215, 5, 54, '5-11mos'),
(216, 6, 54, 'professional/advisory'),
(217, 1, 54, 'no'),
(218, 1, 54, 'no'),
(219, 1, 46, 'yes'),
(220, 2, 46, 'Regular'),
(221, 3, 46, '8k-15k'),
(222, 4, 46, 'responseToAdvertisement'),
(223, 5, 46, '5-11mos'),
(224, 1, 56, 'yes'),
(225, 2, 56, 'Regular'),
(226, 3, 56, '8k-15k'),
(227, 4, 56, 'walkInApplicant'),
(228, 5, 56, '1-5mos'),
(229, 6, 56, 'rank/clerical'),
(230, 1, 60, 'yes'),
(231, 2, 60, 'Regular'),
(232, 3, 60, '8k-15k'),
(233, 4, 60, 'walkInApplicant'),
(234, 5, 60, '1-5mos'),
(235, 6, 60, 'rank/clerical'),
(236, 1, 62, 'yes'),
(237, 2, 62, 'Temporary'),
(238, 3, 62, '8k-15k'),
(239, 4, 62, 'recommendedBySomeone'),
(240, 5, 62, '1-5mos'),
(241, 6, 62, 'rank/clerical'),
(242, 1, 63, 'yes'),
(243, 2, 63, 'Regular'),
(244, 3, 63, '8k-15k'),
(245, 4, 63, 'responseToAdvertisement'),
(246, 5, 63, '1-5mos'),
(247, 6, 63, 'rank/clerical'),
(248, 1, 4, 'yes'),
(249, 7, 4, 'yes'),
(250, 1, 46, 'no'),
(251, 1, 46, 'no');

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
(3, 2017, 'Michael Jake', 'G', 'Bacuetes', 'Male', '1999-12-25', 'single', 'BSIS', 'Catbalogan Samar', '123456', 'mjbacuetes@gmail.com', '$2y$10$lg.aixUXSP9ACJ.F6pGkm.htzDWFWp4AhCGVyPyZl7ay7xQV6oJxy'),
(4, 2017, 'vincent', 'D', 'mendez', 'Male', '0000-00-00', 'single', 'BSIS', 'Catbalogan', '1231', 'mendez@gmail.com', '$2y$10$TAKRPl11kcKomLX.5b1FVeZfDaJYW2.L/p1QgAKzPI/Shkx6VnoQa'),
(5, 2014, 'reymart', 'D', 'mendez', 'Male', '1992-05-20', 'single', 'BSIT', 'san jose de buan samar', '098765432', 'remart@yahoo.com', '$2y$10$hv9p6aEWcBJzkJN5717JSeC4oxCCZbtxZsEdVc4zYu/hTBBwNSapq'),
(6, 2014, 'reymart', 'D', 'mendez', 'Male', '1992-05-20', 'single', 'BSIT', 'san jose de buan samar', '09098765', 'matt@yahoo', '$2y$10$LeLsWVzPT1hkfQ5TvAYcluSnAW3fGx6fJOXSYYNKCGenQf/kagfUm'),
(7, 2017, 'Michael jaka', 'A', 'Bacuetes', 'Male', '0000-00-00', 'separated', 'BSIS', 'catbalogan', '09489888343', 'mj.bacuetes@gmail.com', '$2y$10$VI/0JfzxbN30YJ/djgTvoeayUhHZUm85TQuGLWWu1X8KmMt1Ihhv2'),
(8, 2017, 'Anna', 'A', 'Reyes', 'Female', '1999-08-07', 'single', 'BSIS', 'Calbayog', '09293910293', 'ann@yahoo.com', '$2y$10$LYcWdrSRwMQNzZLRsHvpZu2qz/SnkVgz3wNCyTPGzJdcYsvPWzsW2'),
(9, 2017, 'Lolita', 'P', 'Makapanan', 'Female', '1999-11-14', 'single', 'BSIS', 'Catbalogan', '0999220391', 'lolita99@gmail.com', '$2y$10$X6Rvk0IfWDQmFMK4ArxaYuVKn95uL2NmqNc7BYQzB4r6r2jNWh7oS'),
(10, 2013, 'albert', 'S', 'Anchita', 'Male', '0000-00-00', 'single', 'BSIT', 'BRGY. BINANALAN STA. RITA SAMA', '09482356789', 'alber@yahoo', '$2y$10$vZFzQPEYd/ovRAJZHZH8RO3tzwSRq27T0kXuGRqC/Jr/UqfPIxfX.'),
(11, 2013, 'Jozel ', 'F', 'Buenaventura', 'Male', '1994-04-04', 'married', 'BSIT', 'Catbalogan W. Samar', '0945679679', 'jozel@yahoo', '$2y$10$rCscjWnvNyDP1lsZcCs/jOmlsjvF05KJkxUU5msS.II0X0ggE.qo.'),
(12, 2013, 'Abby Gail ', 'B', 'Cabangunay', 'Female', '1994-04-09', 'single', 'BSIT', 'Brgy. Lipata Paranas, Samar', '0948356788', 'abby@yahoo', '$2y$10$2yf1nMpGNbhtJ3o/E3LTduYfkKUW8xkelq69l7LusAv.Qzb2CH0Ba'),
(13, 2014, 'Lemar', 'B', 'Balinan', 'Male', '1991-08-11', 'married', 'BSIS', 'Brgy. Uno Calbiga samar', '09754562873', 'lemar45@gmail.com', '$2y$10$hVTbxCGtX4ZDyG032qTg2O6PCwnujIX71GhCKpn7Ak5mKdykZTMkO'),
(14, 2013, 'PAULO ', 'L', 'GABILLETE', 'Male', '1992-04-04', 'married', 'BSIT', 'CATBALOGAN CITY, SAMAR', '0948356789', 'paulo@yahoo', '$2y$10$ip7YvTxv7huF872Z8cqkeO3Fz3nEnTIv7nvWwA48Thnam4oAxtI5C'),
(15, 2014, 'Rizza ', 'C', 'Gilhang', 'Female', '1990-03-22', 'single', 'BSIS', 'Publasyon 1 Pinabacdao, Samar', '09435621225', 'rezza21@yahoo.com', '$2y$10$q94s.XH2gAAl9JNe6wSswOGMrEYAo.v9nFV702epNCEA7RacGZS2y'),
(16, 2013, 'Kenneth ', 'Y', 'Coscolluela', 'Male', '1992-09-04', 'single', 'BSIT', '#1320 Mahatma Gandhi St., Brgy 674, Xone 73 Paco Manila', '09482356789', 'kenneth@yahoo', '$2y$10$5mqrXUwuo51XnHsBollJh.yEzezmvb1RZqAUzGAq.xmzHfVLAPTzW'),
(17, 2013, 'Mark Bons ', 'M', ' Fernandez', 'Male', '1990-06-06', 'single', 'BSIT', 'Access Road, Zone III, Victoria, Northern Samar', '0909345673', 'mark@yahoo', '$2y$10$IVWcEORtX/M3vEXvb.S7ouxnciEa1k5gYmFdv0PCy0hVUxgnCIvey'),
(18, 2014, 'NiÃ±o joy', 'R', 'Arcallana', 'Male', '1991-07-06', 'married', 'BSIS', 'Brgy. Porok 1 canlapwas Catbalogan City', '09458634221', 'ninojoy18@gmail.com', '$2y$10$NjZJCpAnwjTYSDsuSfkKDuJDOKhjqEywa7X3iM1.Vad8GfSxhe18i'),
(19, 2013, 'Rojay ', 'd', 'Flores', 'Male', '1990-06-09', 'single', 'BSIT', 'Guinsorongan Catbalogan City', '0909234568', 'rojay@yahoo', '$2y$10$fROn78yN7KRVB9BPJ8f15eEd9z30yZ44eSHzdOktyej.Lxx1i48vC'),
(20, 2013, 'Wilson V', 'V', ' Deo Jr.', 'Male', '1990-09-09', 'married', 'BSIT', 'Maulong Catbalogan City Samar', '09095678954', 'wilson@yahoo', '$2y$10$cE10OpdYOc/3DykdkWgVR.JO4W4tuh4bRTjZnsaOW8ym2PlB/U69C'),
(21, 2013, 'Ma. Sheila May ', 'N', 'Uy', 'Female', '1991-10-04', 'single', 'BSIT', 'Catbalogan City', '0912345678', 'may@yahoo', '$2y$10$dSdDVovFnMOFVduW98VO1ubl.XBtetnR5WrEZfzmZYv/lcq4ZehnG'),
(22, 2014, 'Normilyn ', 'C', 'Banon', 'Female', '1991-02-10', 'married', 'BSIS', 'jiabong Samar', '09455455541', 'normi09@yahoo.com', '$2y$10$F3NtG5HR4/Ny94XvZeEOwejtRz3RdR8mKkxnsK32z30dr0Lzw1lG2'),
(23, 2013, 'Lea Rose ', 'G', 'Dabocol', 'Female', '1990-09-11', 'married', 'BSIT', 'Catbalogan City', '09095678765', 'lea@yahoo', '$2y$10$wjjj/vA1iWum3hKnJ6YY8OVOaOYNQyFPsUtIAdUoAQi7p.I4XjXFO'),
(24, 2014, 'Arman', 'H', 'Degasa', 'Male', '1991-12-05', 'married', 'BSIS', 'Salog premira Catbalogan City', '0988145643', 'Armangrapo@yahoo.com', '$2y$10$ZWLNO7Cjsmvr9TgwgYqw1O0ckS58/kD5MlT1Zy6Hk7Jt66/cnpjx6'),
(25, 2013, 'Ronel ', 'C', 'Labong', 'Male', '1989-10-09', 'married', 'BSIT', 'Motiong, Samar', '09092345678', 'ronel@yahoo', '$2y$10$1JWrIyAOy5ZHB48GBpdqGe5k0/86eMtty6FSH84HWTDZ4Qjf1f0WW'),
(26, 2014, 'Raul ', 'T', 'Oy', 'Male', '1989-11-02', 'separated', 'BSIS', 'Purok 4 canlapwas catbalogan city', '09415234666', 'rauloy55@gmail.com', '$2y$10$mgwe3JUV4MjBJ.OVOoGb9e/6aSvmniUUHoiBGIvwpIN5EQ6JxaNPG'),
(27, 2013, 'albert', 'A', 'BARCOMA', 'Male', '1990-07-06', 'married', 'BSIT', 'BRGY. MABUHAY SAN JORGE SAMAR', '09093885655', 'albert@yahoo', '$2y$10$tm2skJK1JGBhPq15sd8oQOvn3e8sjF2vCcU4eYU/0nAMS7l0LqJT6'),
(28, 2013, 'Jomar ', 'O', 'Basas', 'Male', '1994-07-06', 'single', 'BSIT', 'Bagacay Daram Samar', '09098756467', 'jomar@yahoo', '$2y$10$YxQzos/K1UfNUP00/4qUTO3175F3pVBHxe7B5BE95E9BbAPR1moRq'),
(29, 2014, 'Pinpin', 'D', 'Sarapin ', 'Female', '1992-07-18', 'widowed', 'BSIS', 'Sulangan Catbalogan city', '09754055345', 'pinpindesarapin@yahoo.com', '$2y$10$7qte48nlSna6OlUXM7rUm./RjSVLnP1ikC4vUSAapwdC4LVm1Hguq'),
(30, 2013, 'Ronnie ', 'A', 'Paca-ol', 'Male', '1990-09-10', 'married', 'BSIT', 'Hinabangan Samar', '090987536734', 'ronie@yahoo', '$2y$10$ONUPeQAYNEakuo81x1U/fe876.u.q13pqpzsSs7jU0EmJM1JqK5re'),
(31, 2013, 'Ruth ', 'A', 'Castillo', 'Female', '1994-04-10', 'single', 'BSIT', 'Catbalogan City, Samar', '09095678054', 'ruth@yahoo', '$2y$10$As3otS1h/66N/Duh43xtO.93jWHjRiDoHRmjdbbNzkNN/ir/qVlG2'),
(32, 2013, 'JAFFET ', 'A', 'GABUYA', 'Male', '1996-06-09', 'separated', 'BSIT', 'CALALPI MOTIONG, SAMAR', '090973563655', 'jaffet@yahoo', '$2y$10$SdGZ2tur4z6xwR.ogswHseRPj7Zid7/48jAZlipDIThMD3ljIIH0C'),
(33, 2014, 'Jeron', 'Z', 'Tambor', 'Male', '1990-07-19', 'separated', 'BSIS', 'Salog segonda catbalogan Samar', '09548564123', 'jeron@yahoo.com', '$2y$10$kuJZeJ0WOkRWOw8x2Efa4.L34AZbUe6oLz8qxIL4Y5cj6UDGtUWUK'),
(34, 2013, 'Havana ', 'M', 'Oga', 'Female', '1990-06-11', 'widowed', 'BSIT', 'Brilliantes Compound, Gov. Ramos, Sta. Maria, Zamboanga City', '09055879723', 'havana@yahoo', '$2y$10$0qrCKuwQj2ccVeMq7i1Gq.QV8gvm5gx0o9dJhv3L9IZWtSbMr0o3.'),
(35, 2014, 'Frank', 'J', 'Domenador', 'Male', '1991-11-29', 'single', 'BSIS', 'Sanpablo catbalogan city', '09754652331', 'frank@gmail.com', '$2y$10$adkID6cCtraBRh/mS9w.xuEDIW3cC.vmUrOzWSrx9bRpSsjRgzFQe'),
(36, 2013, 'LEZIL ', 'O', 'CALUTAN', 'Female', '1990-10-09', 'separated', 'BSIT', 'SAN ISIDRO, STA. RITA SAMAE', '09093563663', 'lezil@yahoo', '$2y$10$ZHGCy0hlwjtAhi0OtTMNV.yNDjnOKN3Q7FB.jhlxHhVLBXdYJaEAq'),
(37, 2013, 'Kristine', 'A', 'dacles', 'Female', '1990-06-11', 'widowed', 'BSIT', 'Purok 3 ', '09063477332', 'tine@yahoo', '$2y$10$I33wxkLJcS.sY9hJrnQm.ulGknRZFqEJpM8nmaUjKIfdnWoPThyJe'),
(38, 2014, 'Jordan jay ', 'R', 'Tan', 'Male', '1993-06-07', 'married', 'BSIS', 'Brgy. 13 catbalogan city', '0996545666', 'jordan@yahoo.com', '$2y$10$1t1t9u5CSGo9Xn2H.sACqO6aT1a3lQX94U0.Z.vvRVXCpu0h/WRsm'),
(39, 2013, 'Virnaliza ', 'L', 'Sumampong', 'Female', '1991-10-08', 'widowed', 'BSIT', 'Brgy. Guindapunan Catb. City', '09053434353', 'liza@yahoo', '$2y$10$CJn8795EsvVNX7oMbOaAt.kOE2uYhDDIOP3Ca36yC5j.yXByvx6pi'),
(40, 2014, 'Aimie ', 'S', 'Mahusay', 'Female', '1991-09-08', 'married', 'BSIS', 'Payao catbalogan city', '09452738468', 'mahusay@gmail.com', '$2y$10$vX1iDdXOOnc27f1tjCCtaOe4QZgECG77AWO6e.G0hEv/YXb5iDhV2'),
(41, 2013, 'MaryJane ', 'G', 'Bejerano', 'Female', '1989-12-09', 'single', 'BSIT', '317 Medel Street, Central Signal Village, Taguig City', '0909545433634', 'jane@yahoo', '$2y$10$4vUSfr.S24zQ8JjXCvhx1.H4FyvrvGht5omcsNuDSMmTjUCIxA1hC'),
(42, 2013, 'Janice ', 'B', 'Colebra', 'Female', '1989-09-07', 'married', 'BSIT', 'Pier 2 Catbalogan City', '090956678766', 'janice@yahoo', '$2y$10$7Rq4rKkXeN7DsJO31c9Qt.zXIc3PJl.5AOfDsB.dd2uoqBdrrHj7W'),
(43, 2013, 'Mary Rose ', 'D', ' Briones', 'Female', '1991-10-10', 'married', 'BSIT', 'Siazon Compound, Del Rosario St., Brgy. 6, Catbalogan City', '09480827234', 'rose@yahoo', '$2y$10$hOCZMXCACakQneurlayMdOiOCMUMKrQRtOPRbNQFJf0AAk9bRtjnC'),
(44, 2014, 'Carena', 'C', 'Ligatob', 'Female', '1990-07-03', 'separated', 'BSIS', 'Silangga catbalogan City ', '09764553761', 'carena@yahoo.com', '$2y$10$Zx0v.PlGYrlM4s2y21ZJNueFxkSl6BiP5S73xrhxbVg19lkYghCyK'),
(45, 2013, 'ZENNY ', 'M', 'LAZARRA', 'Female', '1989-12-04', 'married', 'BSIT', 'SAN JOSE DE BUAN,SAMAR', '0909536743', 'zenny@yahoo', '$2y$10$kCCKQyeRPjALgefhZGcIheicofdwMqseGGYzyqkGhUe46Vc72fXPm'),
(46, 2014, 'Janna ', 'N', 'Galang', 'Female', '1990-05-19', 'married', 'BSIS', 'Hinabangan Samar', '09634587644', 'janna@gmail.com', '$2y$10$cjA.XPbmBReHRB5SJhYAROzzV0d7b1KgR7/MyPxDUshc3/4ZYDLL.'),
(47, 2013, 'Maricel ', 'D', ' Castillo', 'Female', '1989-09-09', 'married', 'BSIT', 'Tacloban City', '09091685253', 'cel@yahoo', '$2y$10$ACc88vUp9BsluXWH2l54a.fRXHkp1LA35MOybcCz0.bz.63Manrkm'),
(48, 2013, 'Alvin ', 'G', 'Paculaba', 'Male', '1994-10-09', 'married', 'BSIT', 'Brgy. Alejandrea, Jiabong, Samar', '0905830943', 'alvin@yahoo', '$2y$10$.NTUt3KatEC7BOcK7FYdo.FRLjfol8LYEupJjNZQoCXbBaMSdJNy2'),
(49, 2013, 'Shaira ', 'F', 'Tapay', 'Female', '1989-10-02', 'single', 'BSIT', 'Dolores E. Samar', '0909466434', 'shaira@yahoo', '$2y$10$MzwTaRoJa902MOQxPqGtiuEPrdZFfJO/ojdDbq6C8JcNn3zFhrDJm'),
(50, 2014, 'Jazlyn ', 'D', 'Cabubas', 'Female', '1991-05-08', 'married', 'BSIS', 'Maulong Catbalogan city ', '097564643734', 'jazlyn@gmail.com', '$2y$10$5Ti91JEoAtLvdnDwChfBr.fVtY5/TPTMqrJdDKsbUZhHXhiXGFvo2'),
(51, 2013, ' Analiza ', 'M', 'Jacob ', 'Female', '1990-06-09', 'married', 'BSIT', 'Hitaasan San Sebastian', '090572379722', 'ana@yahoo', '$2y$10$vmryMV5Cpb5J/VERh/V41.k1ok6GekxYV9eaTTHIGr7zi2CNe/qga'),
(52, 2013, 'Edison ', 'T', 'Unay', 'Male', '1993-04-04', 'separated', 'BSIT', 'Brgy. Jia-an, Jiabong, Samar', '0905830408', 'son@yahoo', '$2y$10$B5EYyXRix6dFBCyfVZPIxO3AVFmetl..vQp6U3wXVpXT73Iux0aym'),
(53, 2014, 'Rey', 'L', 'Tabontabon', 'Male', '1991-08-09', 'married', 'BSIS', 'jiabong Samar', '09755435455', 'jey@yahoo.com', '$2y$10$ifFx7YeNniY31XjVbfWUWOrZ4rI14/SgoUlFWxqNwKwcDfKQGA.GO'),
(54, 2013, 'JANSSEN ', 'C', 'GABIETA', 'Male', '1991-10-09', 'married', 'BSIT', 'BRGY.ALEJANDREA, JIABONG, SAMAR', '09097327374', 'jan@yahoo', '$2y$10$Cr2ZxPMq6dpVeZTmlY3g0.Gm1q5TyK1EIK2DVaPt2JW5FL/cc.7H2'),
(55, 2014, 'Ronald ', 'W', 'Bagasala', 'Male', '1992-09-12', 'married', 'BSIS', 'jiabong Samar', '09976724857', 'ronald@gmail.com', '$2y$10$rkqaCp8Qi88SnkOuZt.gzOpEqT0p2sYbZudzQhy8.HsADNsv6f2P6'),
(56, 2013, 'Ricardo ', 'A', 'Sapayan Jr', 'Male', '1990-06-06', 'separated', 'BSIS', 'Catbalogan City, Samar', '0905374733', 'cardo@yahoo', '$2y$10$L8wnixY3Pjgz4NQayY6MbeCzliQ5fnlB4jjOMBvW2r7ArhpWnDpJy'),
(58, 2014, 'Madelyn', 'F', 'Talodtod', 'Male', '1992-09-12', 'separated', 'BSIS', 'Purok 4 canlapwas catbalogan city', '099673458465', 'madelyn@gmail.com', '$2y$10$VW/QdsMBMa/hIWClZgqTveyLeQJ12MR2DXGkCDTW0vgqGNARqQgau'),
(60, 2013, 'Maiden Rose ', 'L', 'Gutierrez', 'Female', '1905-09-07', 'widowed', 'BSIS', 'Daram, Samar', '0909545433', 'den@yahoo', '$2y$10$gxdDt.2jwtn7PrhHlWqlAuZiDQRkt2TVMNuRk5EFkp.wbsbUw4skm'),
(61, 2014, 'Gena', 'L', 'Singson', 'Female', '1992-09-14', 'married', 'BSIS', 'Salog premira Catbalogan City', '090557548456', 'gena@gmail.com', '$2y$10$19zCHRnEQPzxYLJP2E0kyu.EjOXWSXHfgeT8dvIF3fZB/LWRGfFDa'),
(62, 2013, 'Michael ', 'F', 'Disepeda', 'Male', '1994-09-07', 'separated', 'BSIS', '510 cdcc cathedral compound f legaspi st.maybunga pasig city', '0909347673', 'mic@yahoo', '$2y$10$soaeC.dSjsI3EXQMMEAku.wILuO1lyuvB3uYQAilSGk6nf.tknqMW'),
(63, 2013, 'Lyndon ', 'E', 'Bulan', 'Male', '1992-06-06', 'single', 'BSIS', 'Brgy. Astorga Daram Samar', '090523772352', 'don@yahoo', '$2y$10$9vq1Dw9Ofzsp8.mtLGkmHumV6X87u.c5QRmTcKpsw/sLYA1tqSATW'),
(64, 2014, 'Sam', 'D', 'Mageba', 'Male', '1991-09-19', 'married', 'BSIS', 'Brgy. Uno Calbiga samar', '09765728484', 'sam@gmail.com', '$2y$10$O1jSx0iQueBl5jRBbSffoe9w1JekgENIWFmlV/yBQ2jJE2oFZiXei'),
(65, 2014, 'Marlo', 'R', 'Napaka', 'Male', '1992-08-09', 'married', 'BSIS', 'Salog premira Catbalogan City', '0975645455', 'marlo@gmail.com', '$2y$10$FEe5OH6LJj1nU3csxgF11u/XfPjtVsOYc28ldsHZutUEs/dUgfOs6'),
(66, 2014, 'Malyn', 'S', 'Salingsing', 'Female', '1987-09-12', 'married', 'BSIS', 'Purok 4 canlapwas catbalogan city', '09675485735', 'malyn@gmail', '$2y$10$EJ0I1UpVRY0wtCDi8hJT7uwtYi/i70tEXFF3zWsYtSzKMI5gTx30C'),
(67, 2015, 'Alfie ', 'R', 'Degase', 'Male', '1987-09-12', 'married', 'BSIS', 'Purok 4 canlapwas catbalogan city', '09675485735', 'alfie@yahoo.com', '$2y$10$LFP/428c2q3GaymslVOgh.OyUDYO3mO/mRHP35jzghF3NGzGDs1Yq');

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
(6, 'Job level position?'),
(7, 'Does your work related with your course taken in college?');

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
  ADD KEY `question_id` (`question_id`),
  ADD KEY `respondednt_ID` (`respondent_ID`);

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
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT for table `batch_tbl`
--
ALTER TABLE `batch_tbl`
  MODIFY `batchID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2018;
--
-- AUTO_INCREMENT for table `personalinfo_tbl`
--
ALTER TABLE `personalinfo_tbl`
  MODIFY `respondentID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `question_tbl`
--
ALTER TABLE `question_tbl`
  MODIFY `questionID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `response_tbl`
--
ALTER TABLE `response_tbl`
  MODIFY `responseID` int(100) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer_tbl`
--
ALTER TABLE `answer_tbl`
  ADD CONSTRAINT `answer_tbl_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question_tbl` (`questionID`),
  ADD CONSTRAINT `answer_tbl_ibfk_2` FOREIGN KEY (`respondent_ID`) REFERENCES `personalinfo_tbl` (`respondentID`);

--
-- Constraints for table `personalinfo_tbl`
--
ALTER TABLE `personalinfo_tbl`
  ADD CONSTRAINT `personalinfo_tbl_ibfk_1` FOREIGN KEY (`yearBatch`) REFERENCES `batch_tbl` (`batchID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
