-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 07:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ieas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ic` int(7) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `admin_password` int(60) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ic`, `admin_name`, `admin_password`, `user_type`) VALUES
(1111, 'Zanizah Bte Taimain', 1234, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendances_id` int(60) NOT NULL,
  `student_ic` varchar(60) NOT NULL,
  `tutor_ic` varchar(60) NOT NULL,
  `attendance_time` time NOT NULL,
  `attendances_date` date NOT NULL,
  `attendance_approveDate` datetime NOT NULL,
  `attendance_status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendances_id`, `student_ic`, `tutor_ic`, `attendance_time`, `attendances_date`, `attendance_approveDate`, `attendance_status`) VALUES
(65, '960501016261', '800323013454', '15:56:05', '2020-06-16', '0000-00-00 00:00:00', 'Pending'),
(67, '970202012222', '800323013454', '16:24:11', '2020-06-16', '0000-00-00 00:00:00', 'Pending'),
(68, '970501014545', '800323013454', '16:24:37', '2020-06-16', '0000-00-00 00:00:00', 'Pending'),
(71, '971102016663', '800323013454', '16:34:19', '2020-06-17', '2020-06-17 21:48:30', 'Attend'),
(88, '020503011034', '800323013454', '21:35:27', '2020-06-18', '2020-06-18 21:35:46', 'Attend'),
(89, '970501014545', '800323013454', '21:39:59', '2020-06-18', '2020-06-18 23:04:45', 'Attend'),
(94, '971102016663', '800323013454', '16:49:51', '2020-06-19', '2020-06-19 17:25:47', 'Not Attend'),
(97, '12234566', '800323013454', '21:09:22', '2020-06-20', '2020-06-20 21:13:54', 'Not Attend'),
(99, '971102016663', '800323013454', '12:00:44', '2020-06-25', '2020-06-25 12:04:07', 'Attend'),
(100, '971102016663', '800323013454', '12:23:39', '2020-06-29', '2020-06-29 20:45:04', 'Not Attend'),
(102, '020503011034', '800323013454', '11:20:34', '2020-07-02', '2020-07-02 11:22:21', 'Attend'),
(103, '970501014545', '800323013454', '11:21:05', '2020-07-02', '2020-07-02 11:22:27', 'Attend'),
(104, '970501013636', '800323013454', '11:21:38', '2020-07-02', '2020-07-02 11:22:35', 'Attend'),
(105, '971201014565', '800323013454', '11:21:57', '2020-07-02', '0000-00-00 00:00:00', 'Pending'),
(106, '971102016663', '800323013454', '11:58:17', '2020-07-02', '2020-07-02 12:13:01', 'Attend'),
(107, '020503011034', '800323013454', '14:41:33', '2020-07-10', '2020-07-10 14:44:01', 'Attend'),
(108, '960501016261', '800323013454', '14:41:52', '2020-07-10', '2020-07-10 14:44:07', 'Attend'),
(109, '970501013636', '800323013454', '14:42:09', '2020-07-10', '2020-07-10 14:44:12', 'Not Attend'),
(110, '971201014565', '800323013454', '14:42:48', '2020-07-10', '2020-07-10 14:47:32', 'Attend'),
(111, '971102016663', '800323013454', '14:46:32', '2020-07-10', '2020-07-10 14:47:48', 'Attend');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_ic` varchar(12) NOT NULL,
  `student_ic` varchar(60) NOT NULL,
  `parent_name` varchar(60) NOT NULL,
  `parent_password` varchar(60) NOT NULL,
  `parent_hp` varchar(11) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_ic`, `student_ic`, `parent_name`, `parent_password`, `parent_hp`, `user_type`) VALUES
('12345', '12234566', 'J bin Johor', '1234', '01126417297', 'Parent'),
('690402019638', '970501013636', 'Noh Salleh Bin Ayub', '12345', '0177310800', 'Parent'),
('700302016958', '971201014565', 'Iqbal Bin Mohamed', '12345', '0132564658', 'Parent'),
('700501016121', '971102016663', 'Ahmad Bin Jaafar', '12345', '0197141900', 'Parent'),
('710303014646', '970501014545', 'Dol bin Said', '12345', '0172364585', 'Parent'),
('711105013636', '020503011034', 'Asyraf Bin Muslim', '12345', '0143253425', 'Parent');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_ic` varchar(13) NOT NULL,
  `student_fullname` varchar(60) NOT NULL,
  `student_password` varchar(60) NOT NULL,
  `student_hp` varchar(11) NOT NULL,
  `subject_id` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_ic`, `student_fullname`, `student_password`, `student_hp`, `subject_id`, `user_type`) VALUES
('020503011034', 'Nur Adrianna Ellina Binti Asyraf', '12345', '0182484305', 'MAT05', 'Student'),
('960501016261', 'Siti Saleha Binti Afdlin', '12345', '0197141932', 'MAT05', 'Student'),
('970501013636', 'Zulkarnain Bin Mohd Noh', '12345', '0192543637', 'MAT05', 'Student'),
('970501014545', 'Nur Syafika Binti Dol', '12345', '0132456525', 'MAT05', 'Student'),
('971102016663', 'Muhammad Faris Bin Ahmad', '12345', '0177310800', 'MAT05', 'Student'),
('971201014565', 'Najwa Latif Binti Iqbal', '12345', '0163452521', 'MAT05', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(60) NOT NULL,
  `tutor_ic` varchar(13) NOT NULL,
  `admin_ic` varchar(13) NOT NULL,
  `subject_name` varchar(60) NOT NULL,
  `subject_startTime` time NOT NULL,
  `subject_endTime` time NOT NULL,
  `subject_day` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `tutor_ic`, `admin_ic`, `subject_name`, `subject_startTime`, `subject_endTime`, `subject_day`) VALUES
('MAT05', '800323013454', '700201015908', 'Mathematics', '20:00:00', '22:00:00', 'Wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutor_ic` varchar(13) NOT NULL,
  `tutor_name` varchar(60) NOT NULL,
  `tutor_password` varchar(60) NOT NULL,
  `subject_id` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutor_ic`, `tutor_name`, `tutor_password`, `subject_id`, `user_type`) VALUES
('800303014422', 'Abu Bakar Bin Said', '3333', 'MAT05', 'Tutor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ic`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendances_id`),
  ADD KEY `student_ic` (`student_ic`,`tutor_ic`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_ic`),
  ADD KEY `student_ic` (`student_ic`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_ic`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `tutor_ic` (`tutor_ic`,`admin_ic`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutor_ic`),
  ADD UNIQUE KEY `subject_id` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendances_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
