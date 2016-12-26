-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2016 at 04:04 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `misfeedback`
--
CREATE DATABASE IF NOT EXISTS `misfeedback` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `misfeedback`;

-- --------------------------------------------------------

--
-- Table structure for table `achievement_master`
--

CREATE TABLE IF NOT EXISTS `achievement_master` (
  `achievement_id` int(11) NOT NULL AUTO_INCREMENT,
  `roll_no` int(11) NOT NULL,
  `achievement_name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`achievement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `achievement_master`
--

INSERT INTO `achievement_master` (`achievement_id`, `roll_no`, `achievement_name`, `description`) VALUES
(1, 11118064, 'raaga', 'coordinator'),
(2, 11118064, 'GRE', 'SCORE 314/340'),
(3, 11118902, 'GATE', 'Rank 300 Score : 50/65'),
(4, 11118064, 'GATE', 'rank : 50000');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_no`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `batch_master`
--

CREATE TABLE IF NOT EXISTS `batch_master` (
  `batch_id` int(20) NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(255) NOT NULL,
  `feedback_no` int(2) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `batch_master`
--

INSERT INTO `batch_master` (`batch_id`, `batch_name`, `feedback_no`) VALUES
(1, 'Jun07', 2),
(2, 'Aug08', 1),
(3, 'Feb09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch_master`
--

CREATE TABLE IF NOT EXISTS `branch_master` (
  `b_id` int(20) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(255) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `branch_master`
--

INSERT INTO `branch_master` (`b_id`, `b_name`) VALUES
(1, 'CS'),
(2, 'MECHANICAL'),
(3, 'ECE'),
(4, 'MININIG'),
(5, 'CHEMICAL');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE IF NOT EXISTS `complain` (
  `complain_id` int(11) NOT NULL AUTO_INCREMENT,
  `roll_no` int(11) NOT NULL,
  `complain` varchar(300) NOT NULL,
  `complain_date` date NOT NULL,
  PRIMARY KEY (`complain_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complain_id`, `roll_no`, `complain`, `complain_date`) VALUES
(1, 11118064, 'ccc', '2014-11-02'),
(2, 11118064, 'Complain about infrastructure \r\nlab systems should be formatted frequently.', '2014-11-03'),
(3, 11118064, 'ragging karta h senior', '2014-12-09'),
(4, 11118902, 'complain', '0000-00-00'),
(5, 1111902, 'complian', '2014-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `division_master`
--

CREATE TABLE IF NOT EXISTS `division_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `division` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `division_master`
--

INSERT INTO `division_master` (`id`, `division`) VALUES
(1, 'Class A'),
(2, 'Class B'),
(4, 'Class C');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_master`
--

CREATE TABLE IF NOT EXISTS `faculty_master` (
  `f_id` int(20) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `b_id` int(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `faculty_master`
--

INSERT INTO `faculty_master` (`f_id`, `f_name`, `l_name`, `b_id`, `password`) VALUES
(1, 'Mr. Sudhakar', 'Pandey', 1, 'faculty'),
(2, 'Mr. Sanjay', 'Kumar', 1, 'faculty'),
(3, 'Ms.Rakesh', 'Tripathi', 1, 'faculty'),
(4, 'Dr. Rajesh', 'Doriya', 1, 'faculty'),
(5, 'Mr. Deepika', 'Agarwal', 1, 'faculty'),
(6, 'Ms. Nivedita', 'Sharma', 1, 'faculty'),
(7, 'Ms. Prachi', 'Agarwal', 2, 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_master`
--

CREATE TABLE IF NOT EXISTS `feedback_master` (
  `feed_id` int(20) NOT NULL AUTO_INCREMENT,
  `roll_no` varchar(255) NOT NULL,
  `b_id` int(20) NOT NULL,
  `batch_id` int(20) NOT NULL,
  `feedback_no` int(20) NOT NULL,
  `sem_id` int(20) NOT NULL,
  `f_id` int(20) NOT NULL,
  `sub_id` int(20) NOT NULL,
  `division_id` int(10) NOT NULL,
  `ans1` int(20) NOT NULL,
  `ans2` int(20) NOT NULL,
  `ans3` int(20) NOT NULL,
  `ans4` int(20) NOT NULL,
  `ans5` int(20) NOT NULL,
  `ans6` int(20) NOT NULL,
  `ans7` int(20) NOT NULL,
  `ans8` int(20) NOT NULL,
  `ans9` int(20) NOT NULL,
  `remark` text NOT NULL,
  `feed_date` date NOT NULL,
  PRIMARY KEY (`feed_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `feedback_master`
--

INSERT INTO `feedback_master` (`feed_id`, `roll_no`, `b_id`, `batch_id`, `feedback_no`, `sem_id`, `f_id`, `sub_id`, `division_id`, `ans1`, `ans2`, `ans3`, `ans4`, `ans5`, `ans6`, `ans7`, `ans8`, `ans9`, `remark`, `feed_date`) VALUES
(1, 'PGI08082255', 1, 2, 1, 2, 1, 2, 1, 8, 7, 6, 9, 5, 7, 5, 4, 6, 'this is test', '2009-03-18'),
(2, 'PGI08082266', 1, 2, 1, 2, 1, 2, 1, 6, 9, 8, 4, 5, 2, 3, 5, 7, 'this is test', '2009-03-18'),
(3, 'pgi08082268', 1, 2, 1, 2, 1, 2, 1, 5, 7, 8, 8, 9, 7, 6, 5, 7, '', '2009-03-18'),
(4, 'pgi08082268', 1, 2, 1, 2, 2, 5, 1, 7, 7, 8, 8, 9, 6, 5, 6, 7, '', '2009-03-18'),
(6, 'PGI08082266', 2, 2, 1, 1, 7, 10, 1, 9, 8, 6, 8, 5, 7, 8, 8, 4, 'this is the test ', '2009-03-18'),
(7, 'PIG08082245', 1, 2, 1, 2, 1, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'this is the test', '2009-03-19'),
(8, 'PGI08082260', 1, 2, 1, 2, 1, 2, 1, 8, 9, 7, 9, 7, 8, 6, 5, 7, '', '2009-04-20'),
(9, 'PGI08082245', 1, 2, 1, 2, 1, 2, 1, 9, 7, 5, 8, 5, 7, 5, 9, 6, '', '2009-04-20'),
(10, 'PGI08082255', 1, 2, 1, 2, 4, 7, 1, 3, 4, 5, 6, 7, 8, 9, 4, 2, '', '2012-05-03'),
(11, 'PGI08082255', 1, 2, 1, 2, 1, 2, 2, 3, 4, 6, 8, 9, 3, 5, 2, 4, 'New division added', '2012-06-06'),
(12, 'PGI08082255', 1, 2, 1, 2, 1, 3, 1, 7, 4, 7, 5, 5, 7, 8, 9, 5, '', '2012-06-06'),
(13, '08082255998', 1, 2, 1, 1, 1, 1, 1, 5, 5, 3, 6, 7, 4, 3, 5, 3, 'test', '2013-01-24'),
(14, '08082255398', 1, 2, 1, 2, 1, 2, 1, 4, 2, 4, 5, 6, 8, 6, 4, 5, '', '2013-06-26'),
(15, '08082255348', 1, 2, 1, 2, 1, 2, 1, 8, 3, 2, 5, 6, 7, 4, 3, 2, '', '2013-06-26'),
(17, '11118064', 1, 0, 0, 2, 1, 2, 1, 6, 6, 2, 6, 6, 6, 6, 6, 6, 'vbv', '2014-11-02'),
(18, '11118064', 1, 2, 1, 2, 1, 2, 1, 6, 6, 2, 6, 6, 2, 2, 9, 6, 'bbb', '2014-11-02'),
(19, '11118064', 1, 2, 1, 2, 5, 5, 1, 2, 5, 4, 2, 2, 6, 7, 8, 9, '', '2014-11-02'),
(20, '11118064', 1, 2, 1, 2, 2, 3, 1, 4, 6, 7, 8, 9, 4, 3, 2, 1, 'This faculty is very good.', '2014-11-03'),
(21, 'admin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2014-11-03'),
(22, '11118064', 1, 2, 1, 2, 4, 3, 1, 5, 3, 2, 1, 8, 7, 6, 5, 3, 'HE is a good teacher.', '2014-12-09'),
(23, '11118064', 1, 2, 1, 2, 2, 2, 1, 4, 6, 7, 2, 9, 4, 5, 4, 3, 'HELLOOOO', '2014-12-09'),
(24, '11118064', 1, 2, 1, 2, 1, 1, 1, 4, 4, 4, 4, 4, 4, 4, 4, 4, 'helloworld', '2014-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_para`
--

CREATE TABLE IF NOT EXISTS `feedback_para` (
  `para_id` int(1) NOT NULL,
  `batch_id` int(10) NOT NULL,
  `b_id` int(10) NOT NULL,
  `sem_id` int(10) NOT NULL,
  `division_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_para`
--

INSERT INTO `feedback_para` (`para_id`, `batch_id`, `b_id`, `sem_id`, `division_id`) VALUES
(1, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_ques_master`
--

CREATE TABLE IF NOT EXISTS `feedback_ques_master` (
  `q_id` int(20) NOT NULL AUTO_INCREMENT,
  `ques` varchar(255) NOT NULL,
  `one_word` varchar(255) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `feedback_ques_master`
--

INSERT INTO `feedback_ques_master` (`q_id`, `ques`, `one_word`) VALUES
(1, 'Faculty was punctual in class.', 'Punctual '),
(2, 'Faculty was well prepared for the classes.', 'Well_prepared'),
(3, 'Faculty communication skill were good.', 'Communication'),
(4, 'Teaching methodology was good.', 'Methodology '),
(5, 'Faculty had clearly defined objectives for each class.', 'Defined_objectives'),
(6, 'Faculty adequately cleared all my doubts and was helpful in solving queries.', 'Solving_queries'),
(7, 'Faculty treated me with respect and aided in my learning.', 'Respected'),
(8, 'Faculty was instrumental in the value addition process.', 'Instrumental_use'),
(9, 'In my opinion the same faculty should be continued for such subjects.', 'Be_continued');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `password`) VALUES
('admin', '*00A51F3F48415C7D4E8908980D443C29C69B60C9');

-- --------------------------------------------------------

--
-- Table structure for table `semester_master`
--

CREATE TABLE IF NOT EXISTS `semester_master` (
  `sem_id` int(20) NOT NULL AUTO_INCREMENT,
  `sem_name` varchar(255) NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `semester_master`
--

INSERT INTO `semester_master` (`sem_id`, `sem_name`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `roll_no` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  PRIMARY KEY (`roll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll_no`, `password`, `Name`, `batch_id`, `b_id`) VALUES
(11118064, 'student', 'Sanjeev Ahuja', 2, 1),
(11118902, 'student', 'K Suraj', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

CREATE TABLE IF NOT EXISTS `subject_master` (
  `sub_id` int(20) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(255) NOT NULL,
  `sem_id` int(20) NOT NULL,
  `f_id` int(20) NOT NULL,
  `batch_id` int(20) NOT NULL,
  `division_id` int(10) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`sub_id`, `sub_name`, `sem_id`, `f_id`, `batch_id`, `division_id`) VALUES
(1, 'RAP', 1, 1, 2, 1),
(2, 'AOA', 2, 1, 2, 1),
(3, 'Linux Archi.', 2, 1, 2, 1),
(4, 'PM', 1, 2, 2, 1),
(5, 'Comp Network', 2, 2, 2, 2),
(6, 'Wireless Comm.', 1, 4, 2, 1),
(7, 'Wireless LAN', 2, 4, 2, 2),
(8, 'CCN', 1, 5, 2, 1),
(9, 'ND&O', 2, 5, 2, 2),
(10, 'Database', 1, 7, 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
