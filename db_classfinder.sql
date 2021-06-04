-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 06:15 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_classfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(1) NOT NULL,
  `class_name` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`) VALUES
(1, 'มัธยมศึกษาปีที่ 1'),
(2, 'มัธยมศึกษาปีที่ 2'),
(3, 'มัธยมศึกษาปีที่ 3'),
(4, 'มัธยมศึกษาปีที่ 4'),
(5, 'มัธยมศึกษาปีที่ 5'),
(6, 'มัธยมศึกษาปีที่ 6');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `code` varchar(6) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `section` varchar(5) DEFAULT NULL,
  `class` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `code`, `course`, `section`, `class`) VALUES
(1, 'ว31105', 'เทคโนโลยีและวิทยาการคำนวณ', '4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `dataadmin`
--

CREATE TABLE `dataadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passlogin` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dataadmin`
--

INSERT INTO `dataadmin` (`id`, `username`, `passlogin`, `name`) VALUES
(1, 'admin', '1234pass', 'ผู้ดูแลระบบ');

-- --------------------------------------------------------

--
-- Table structure for table `data_logo`
--

CREATE TABLE `data_logo` (
  `id` int(11) NOT NULL,
  `icon_school` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_logo`
--

INSERT INTO `data_logo` (`id`, `icon_school`) VALUES
(1, 'icon_school.png');

-- --------------------------------------------------------

--
-- Table structure for table `data_logo_login`
--

CREATE TABLE `data_logo_login` (
  `id` int(11) NOT NULL,
  `logo_school` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_logo_login`
--

INSERT INTO `data_logo_login` (`id`, `logo_school`) VALUES
(1, 'logo_school.png');

-- --------------------------------------------------------

--
-- Table structure for table `data_system`
--

CREATE TABLE `data_system` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_system`
--

INSERT INTO `data_system` (`id`, `school_name`) VALUES
(1, 'โรงเรียนรัตนาธิเบศร์');

-- --------------------------------------------------------

--
-- Table structure for table `homeroom`
--

CREATE TABLE `homeroom` (
  `id` int(11) NOT NULL,
  `regid` varchar(13) DEFAULT NULL,
  `class` int(1) DEFAULT NULL,
  `room` int(2) DEFAULT NULL,
  `homeroom_line_par` varchar(200) DEFAULT NULL,
  `homeroom_line_stu` varchar(200) DEFAULT NULL,
  `homeroom_gg` varchar(200) DEFAULT NULL,
  `savedate` varchar(10) DEFAULT NULL,
  `savetime` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(2) NOT NULL,
  `room_name` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_name`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `regid` varchar(13) DEFAULT NULL,
  `subject_id` int(3) DEFAULT NULL,
  `class` int(1) DEFAULT NULL,
  `room` int(2) DEFAULT NULL,
  `fb` varchar(200) DEFAULT NULL,
  `line` varchar(200) DEFAULT NULL,
  `gg` varchar(200) DEFAULT NULL,
  `savedate` varchar(10) DEFAULT NULL,
  `savetime` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `regid`, `subject_id`, `class`, `room`, `fb`, `line`, `gg`, `savedate`, `savetime`) VALUES
(1, '1111111111111', 1, 4, 1, '', 'https://line.me/R/ti/g/kUdic_Kbu8', 'https://classroom.google.com/c/MzUwNjYxMDc0NzUz?cjc=w7bxdeo', '04/06/2021', '11:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `regid` varchar(13) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `section` varchar(5) DEFAULT NULL,
  `class` int(1) DEFAULT NULL,
  `room` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `regid`, `name`, `section`, `class`, `room`) VALUES
(1, '1111111111111', 'นายทดลอง สอนเก่ง', '4', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `group_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `group_name`) VALUES
(1, 'ผู้บริหาร'),
(2, 'กลุ่มสาระ ฯ ภาษาไทย'),
(3, 'กลุ่มสาระ ฯ คณิตศาสตร์'),
(4, 'กลุ่มสาระ ฯ วิทยาศาสตร์และเทคโนโลยี'),
(5, 'กลุ่มสาระ ฯ สังคมศึกษา ศาสนา และวัฒนธรรม'),
(6, 'กลุ่มสาระ ฯ สุขศึกษาและพลศึกษา'),
(7, 'กลุ่มสาระ ฯ ศิลปะ'),
(8, 'กลุ่มสาระ ฯ การงานอาชีพ'),
(9, 'กลุ่มสาระ ฯ ภาษาต่างประเทศ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataadmin`
--
ALTER TABLE `dataadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_logo`
--
ALTER TABLE `data_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_logo_login`
--
ALTER TABLE `data_logo_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_system`
--
ALTER TABLE `data_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeroom`
--
ALTER TABLE `homeroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dataadmin`
--
ALTER TABLE `dataadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_logo`
--
ALTER TABLE `data_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_logo_login`
--
ALTER TABLE `data_logo_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_system`
--
ALTER TABLE `data_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homeroom`
--
ALTER TABLE `homeroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
