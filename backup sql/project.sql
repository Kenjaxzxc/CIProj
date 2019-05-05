-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2018 at 02:56 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_type` varchar(45) DEFAULT NULL COMMENT 'admin/teacher/student',
  `username` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_type`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'teacher', '123456', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'teacher', '1234562', '6978915ee7dbc5aff1bc34b59e8c0fc5'),
(4, 'student', '123456222', '6561c46b23d21e4a2de0267f558a4537'),
(5, 'student', '12341234', 'ed2b1f468c5f915f3f1cf75d7068baae'),
(6, 'student', '456456', 'b51e8dbebd4ba8a8f342190a4b9f08d7'),
(7, 'student', '33', '182be0c5cdcd5072bb1864cdee4d3d6e'),
(8, 'student', '3232', '12e086066892a311b752673a28583d3f'),
(9, 'student', '18138', '440be16e6577fac91de2fbfee4b91503'),
(10, 'teacher', '18139', '66d83a2d2a6d2bd6265c95aa833b121b'),
(11, 'teacher', '181310', 'a516dc121900367e1393c2f9ecae114d'),
(12, 'teacher', '181311', '1b614ccc3088218cce4ee06c884daa87'),
(13, 'teacher', '181312', '09820cfbf136f15a58ffabf7bc711292'),
(14, 'student', '181313', 'fbd82f65342e5750d4af9418a3ba2262');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `subject_id`, `student_id`, `grade`) VALUES
(1, 1, 8, '4'),
(3, 1, 10, '5');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `action` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `action`, `date`, `account_id`) VALUES
(1, 'Created section', '2018-10-07 18:54:33', 1),
(2, 'Created section', '2018-10-07 18:54:41', 1),
(3, 'Created subject', '2018-10-07 18:55:27', 1),
(4, 'Created subject', '2018-10-07 18:55:33', 1),
(5, 'Added teacher', '2018-10-07 19:00:42', 1),
(6, 'Added teacher', '2018-10-07 19:27:27', 1),
(7, 'Added student', '2018-10-07 19:37:37', 1),
(8, 'test', '2018-10-07 20:47:01', 2),
(9, 'test2', '2018-10-07 20:57:24', 4),
(10, 'Logout', '2018-10-07 21:13:26', 1),
(11, 'Login', '2018-10-07 21:40:07', 3),
(12, 'Logout', '2018-10-07 21:41:06', 3),
(13, 'Logout', '2018-10-07 21:43:13', NULL),
(14, 'Login', '2018-10-07 21:43:59', 3),
(15, 'Logout', '2018-10-07 21:44:08', 3),
(16, 'Login', '2018-10-07 21:44:13', 3),
(17, 'Logout', '2018-10-07 21:44:35', 3),
(18, 'Login', '2018-10-07 21:44:37', 3),
(19, 'Logout', '2018-10-07 21:44:46', 3),
(20, 'Login', '2018-10-07 21:44:57', 4),
(21, 'Logout', '2018-10-07 21:45:47', 4),
(22, 'Login', '2018-10-07 21:45:50', 4),
(23, 'Logout', '2018-10-07 21:48:12', 4),
(24, 'Login', '2018-10-07 21:53:32', 4),
(25, 'Login', '2018-10-07 21:53:42', 4),
(26, 'Logout', '2018-10-07 21:53:48', 4),
(27, 'Login', '2018-10-07 21:54:22', 4),
(28, 'Logout', '2018-10-07 21:54:29', 4),
(29, 'Login', '2018-10-07 21:54:41', 3),
(30, 'Logout', '2018-10-07 21:54:49', 3),
(31, 'Login', '2018-10-07 21:54:53', 1),
(32, 'Logout', '2018-10-07 21:55:59', 1),
(33, 'Login', '2018-10-07 21:56:09', 3),
(34, 'Logout', '2018-10-07 21:56:26', 3),
(35, 'Login', '2018-10-08 11:26:39', 1),
(36, 'Logout', '2018-10-08 11:47:25', 1),
(37, 'Login', '2018-10-08 11:48:59', 1),
(38, 'Logout', '2018-10-08 11:54:03', 1),
(39, 'Login', '2018-10-08 11:58:10', 2),
(40, 'Logout', '2018-10-08 12:00:49', 2),
(41, 'Login', '2018-10-08 12:00:56', 1),
(42, 'Logout', '2018-10-08 12:05:11', 1),
(43, 'Logout', '2018-10-08 12:17:52', NULL),
(44, 'Logout', '2018-10-08 12:18:09', NULL),
(45, 'Login', '2018-10-08 12:19:16', 1),
(46, 'Login', '2018-10-08 12:19:29', 1),
(47, 'Login', '2018-10-08 12:22:35', 1),
(48, 'Login', '2018-10-08 12:23:43', 1),
(49, 'Login', '2018-10-08 12:23:59', 1),
(50, 'Login', '2018-10-08 12:24:11', 1),
(51, 'Login', '2018-10-08 12:24:22', 1),
(52, 'Login', '2018-10-08 12:24:34', 1),
(53, 'Login', '2018-10-08 12:24:51', 1),
(54, 'Login', '2018-10-08 12:26:24', 2),
(55, 'Logout', '2018-10-08 12:33:57', 2),
(56, 'Login', '2018-10-08 12:36:13', 4),
(57, 'Logout', '2018-10-08 12:36:41', 4),
(58, 'Login', '2018-10-08 12:37:33', 1),
(59, 'Logout', '2018-10-08 12:37:41', 1),
(60, 'Login', '2018-10-08 12:37:48', 2),
(61, 'Logout', '2018-10-08 15:26:47', 2),
(62, 'Login', '2018-10-08 15:27:52', 1),
(63, 'Added student', '2018-10-08 15:28:42', 1),
(64, 'Logout', '2018-10-08 15:28:48', 1),
(65, 'Login', '2018-10-08 15:28:58', 2),
(66, 'Logout', '2018-10-08 15:29:07', 2),
(67, 'Login', '2018-10-08 15:29:24', 1),
(68, 'Added student', '2018-10-08 15:29:47', 1),
(69, 'Logout', '2018-10-08 15:29:53', 1),
(70, 'Login', '2018-10-08 15:29:59', 2),
(71, 'Logout', '2018-10-08 15:33:23', 2),
(72, 'Login', '2018-10-08 15:33:33', 1),
(73, 'Added student', '2018-10-08 15:33:51', 1),
(74, 'Logout', '2018-10-08 15:33:55', 1),
(75, 'Login', '2018-10-08 15:34:00', 2),
(76, 'Logout', '2018-10-08 15:34:41', 2),
(77, 'Login', '2018-10-08 15:34:45', 1),
(78, 'Added student', '2018-10-08 15:35:02', 1),
(79, 'Logout', '2018-10-08 15:35:07', 1),
(80, 'Login', '2018-10-08 15:35:16', 2),
(81, 'Logout', '2018-10-08 17:05:25', 2),
(82, 'Login', '2018-10-08 17:05:40', 4),
(83, 'Logout', '2018-10-08 17:12:15', 4),
(84, 'Login', '2018-10-08 17:12:19', 8),
(85, 'Logout', '2018-10-08 17:29:44', 8),
(86, 'Login', '2018-10-08 17:30:03', 2),
(87, 'Logout', '2018-10-08 17:51:51', 2),
(88, 'Login', '2018-10-08 17:52:13', 6),
(89, 'Login', '2018-10-11 10:45:57', 2),
(90, 'Login', '2018-10-12 12:56:41', 2),
(91, 'Logout', '2018-10-12 15:57:28', 2),
(92, 'Login', '2018-10-12 15:57:38', 4),
(93, 'Logout', '2018-10-13 08:09:32', NULL),
(94, 'Login', '2018-10-13 08:10:58', 1),
(95, 'Added student', '2018-10-13 08:34:35', 1),
(96, 'Added teacher', '2018-10-13 08:34:57', 1),
(97, 'Added teacher', '2018-10-13 08:36:11', 1),
(98, 'Added teacher', '2018-10-13 08:37:09', 1),
(99, 'Added teacher', '2018-10-13 08:37:20', 1),
(100, 'Added student', '2018-10-13 08:39:37', 1),
(101, 'Logout', '2018-10-13 08:39:53', 1),
(102, 'Login', '2018-10-13 08:40:36', 13),
(103, 'Logout', '2018-10-13 08:41:06', 13),
(104, 'Login', '2018-10-13 08:41:10', 14),
(105, 'Logout', '2018-10-13 08:51:53', 14),
(106, 'Login', '2018-10-13 08:51:58', 1),
(107, 'Logout', '2018-10-13 08:52:11', 1),
(108, 'Login', '2018-10-13 08:52:21', 14),
(109, 'Logout', '2018-10-13 08:53:46', 14),
(110, 'Login', '2018-10-13 08:53:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`) VALUES
(1, 'computer1'),
(2, 'computer2');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `profile_pic` varchar(225) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `account_id`, `section_id`, `subject_id`, `fname`, `lname`, `age`, `gender`, `profile_pic`, `date`) VALUES
(8, 8, 2, 1, 'qwer', 'qwe', 23, 'f', '89d6b56d3535629a8d5ff36a16ed876b.jpg', '2018-10-08 15:35:02'),
(9, 9, 1, 1, 'Syrel', 'qweqwe', 14, 'm', 'Hydrangeas.jpg', '2018-10-13 08:34:35'),
(10, 14, 1, 1, 'Syrel', 'qwe', 23, 'f', '3a9714bdc1edf71d7818b5c46068ecc1.jpg', '2018-10-13 08:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`) VALUES
(1, 'PHP'),
(2, 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL COMMENT 'FK',
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `account_id`, `section_id`, `subject_id`, `fname`, `lname`, `age`, `gender`, `date`) VALUES
(1, 2, 2, 2, 'EM', 'Cabua', 23, 'm', '2018-10-07 19:00:42'),
(2, 3, 1, 1, 'Tin', 'Claro', 23, 'f', '2018-10-07 19:27:27'),
(3, 10, 1, 1, 'syrel', 'qwe', 23, 'f', '2018-10-13 08:34:57'),
(4, 11, 1, 1, 'qwe', 'qwe', 323, 'f', '2018-10-13 08:36:11'),
(5, 12, 1, 1, 'qwe', 'qe', 23, 'f', '2018-10-13 08:37:09'),
(6, 13, 1, 1, 'qwe', 'qwe', 23, 'f', '2018-10-13 08:37:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `fk_grades_subjects1_idx` (`subject_id`),
  ADD KEY `fk_grades_students1_idx` (`student_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_logs_accounts1_idx` (`account_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_students_accounts_idx` (`account_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `account_id_UNIQUE` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `fk_grades_students1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grades_subjects1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_accounts1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_accounts` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teachers_accounts1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
