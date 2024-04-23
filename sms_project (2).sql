-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 04:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `type`, `email`, `password`, `name`, `level`) VALUES
(1, 'teacher', 'teacher.1@example.com', 'asdfasdfasdf', 'Teacher1', 3),
(2, 'teacher', 'teacher.2@example.com', 'zxcvzxcvzxcv', 'Teacher2', 2),
(3, 'student', 'student.1@example.com', '25f9e794323b453885f5181f1b624d0b', 'Student1', 2),
(4, 'student', 'student.2@example.com', 'test', 'Student2', 3),
(5, 'student', 'mohamed@stud.sms', 'e807f1fcf82d132f9bb018ca6738a19f', 'mohamed', 1),
(6, 'student', 'ali@stud.sms', 'e807f1fcf82d132f9bb018ca6738a19f', 'ali ', 2),
(7, 'teacher', 'teacher.3@tech.sms', 'e807f1fcf82d132f9bb018ca6738a19f', 'Teacher3 ', 1),
(9, 'student', 'student.5@example.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'student', 2),
(13, 'student', 'asdf@asdf.asdf', '3ab8e8739c50726bceeb9a382e7e1959', 'Test user', 1),
(14, 'student', 'modifiercrazy@gmail.com', 'c1368ca1ed59971a44f6dec37b6ecd8e', 'Test user 2', 3),
(15, 'student', 'modifiercrazy-1@gmail.com', 'c1368ca1ed59971a44f6dec37b6ecd8e', 'Test user 2', 2),
(18, 'student', 'test@test.test', 'c3a1e14cfd1ff4cec66d163ff7a350fe', 'test 3', 1),
(32, 'student', 'mm@mm.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'madonnaa', 3),
(33, 'student', 't@t.t', 'e807f1fcf82d132f9bb018ca6738a19f', 'test user3 ', 2),
(34, 'parent', 'parent@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'parentt', 1),
(35, 'student', 'student.10@example.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'student 10', 3),
(43, 'student', 'student.11@example.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'student11', 1),
(44, 'teacher', 'teacher.4@example.com', 'asdfasdfasdf', 'Teacher4', 2),
(45, 'teacher', 'teacher.5@example.com', 'zxcvzxcvzxcv', 'Teacher5', 3),
(46, 'teacher', 'teacher.6@example.com', 'asdfasdfasdf', 'Teacher6', 1),
(47, 'teacher', 'teacher.7@example.com', 'zxcvzxcvzxcv', 'Teacher7', 2),
(48, 'teacher', 'teacher.8@example.com', 'asdfasdfasdf', 'Teacher8', 3),
(49, 'teacher', 'teacher.9@example.com', 'zxcvzxcvzxcv', 'Teacher9', 2),
(50, 'teacher', 'teacher.10@example.com', 'zxcvzxcvzxcv', 'Teacher10', 2),
(54, 'student', 'student.12@example.com', '68fdf102297da1530d4cbbcd13cbb958', 'student 12', 1),
(55, 'student', 'student.13@example.com', '7d89f0e36783f169e2de744b03612d4d', 'student 13', 3),
(56, 'student', 'student.14@example.com', 'f6860f36e4d4cfb807e79c4184871af1', 'student 14', 2),
(57, 'student', 'student.15@example.com', '0365d092668f56c82a0ebeb3f73686ea', 'student 15', 1),
(58, 'student', 'student.16@example.com', '4aaf7bc01953490fe910ebf6a42ed6f0', 'student 16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `section` varchar(50) NOT NULL,
  `added_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `title`, `section`, `added_date`) VALUES
(1, 'Class-1', '1', '2024-03-31'),
(5, 'Class-2', '1,2,3', '2024-03-31'),
(6, 'Class-3', '1,2,3', '2024-03-31'),
(14, 'Class-4', '2,3', '2024-04-17'),
(15, 'Class-5', '2,3,42', '2024-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `duration` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `category`, `duration`, `date`, `image`) VALUES
(15, 'Scratch', 'web-design-and-development', '4 Hours', '2024-04-02 00:00:00', 'download.png'),
(17, 'HTML', 'web-design-and-development', '2 Hours', '2024-04-02 00:00:00', 'images.png'),
(18, 'CSS', 'web-design-and-development', '3 Hours', '2024-04-02 00:00:00', 'download (1).png'),
(21, 'NODE JS', 'web-design-and-development', '3 Hours', '2024-04-02 00:00:00', '1_v2vdfKqD4MtmTSgNP0o5cg.png'),
(22, 'PHP', 'web-design-and-development', '2 Hours', '2024-04-02 00:00:00', 'download (2).png'),
(23, 'JAVA SCRIPT', 'web-design-and-development', '4 Hours', '2024-04-02 00:00:00', 'download (1).jpeg'),
(24, 'REACT JS', 'web-design-and-development', '2 Hours', '2024-04-02 00:00:00', 'react.js-img.png'),
(25, 'JQUERY', 'web-design-and-development', '3 Hours', '2024-04-02 00:00:00', 'Bootstrap_logo.svg.png'),
(27, 'PYTHON', 'web-design-and-development', '2 Hours', '2024-04-02 00:00:00', 'Python-logo-notext.svg.png');

-- --------------------------------------------------------

--
-- Table structure for table `metadata`
--

CREATE TABLE `metadata` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `meta_key` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metadata`
--

INSERT INTO `metadata` (`id`, `item_id`, `meta_key`, `meta_value`) VALUES
(1, 2, 'section', '3'),
(2, 2, 'section', '4'),
(3, 7, 'day_name', 'Saturday'),
(4, 7, 'teacher_id', '2'),
(5, 7, 'subject_id', '12'),
(6, 7, 'period_id', '5'),
(7, 0, 'from', '08:30'),
(8, 0, 'to', '09:15'),
(11, 10, 'from', '09:15'),
(12, 10, 'to', '10:35'),
(13, 5, 'from', '07:00'),
(14, 5, 'to', '07:45'),
(15, 6, 'from', '07:45'),
(16, 6, 'to', '08:30'),
(17, 8, 'from', '08:30'),
(18, 8, 'to', '09:15'),
(19, 11, 'from', '10:35'),
(20, 11, 'to', '11:20'),
(21, 18, 'class_id', '1'),
(22, 18, 'section_id', '4'),
(23, 18, 'teacher_id', '2'),
(24, 18, 'period_id', '5'),
(25, 18, 'day_name', 'sunday'),
(26, 18, 'subject_id', '12'),
(27, 7, 'class_id', '1'),
(28, 7, 'section_id', '4'),
(29, 14, 'class_id', '1'),
(30, 14, 'section_id', '3'),
(31, 14, 'teacher_id', '1'),
(32, 14, 'period_id', '6'),
(33, 14, 'day_name', 'saturday'),
(34, 14, 'subject_id', '13'),
(35, 15, 'class_id', '1'),
(36, 15, 'section_id', '3'),
(37, 15, 'teacher_id', '1'),
(38, 15, 'period_id', '10'),
(39, 15, 'day_name', 'monday'),
(40, 15, 'subject_id', '13'),
(41, 16, 'class_id', '1'),
(42, 16, 'section_id', '3'),
(43, 16, 'teacher_id', '2'),
(44, 16, 'period_id', '10'),
(45, 16, 'day_name', 'monday'),
(46, 16, 'subject_id', '12'),
(47, 30, 'section', '4'),
(48, 31, 'class_id', '1'),
(49, 31, 'section_id', '4'),
(50, 31, 'teacher_id', '44'),
(51, 31, 'period_id', '10'),
(52, 31, 'day_name', 'sunday'),
(53, 31, 'subject_id', '18'),
(54, 32, 'class_id', '1'),
(55, 32, 'section_id', '4'),
(56, 32, 'teacher_id', '7'),
(57, 32, 'period_id', '11'),
(58, 32, 'day_name', 'saturday'),
(59, 32, 'subject_id', '22');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL DEFAULT 1,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `description`, `type`, `publish_date`, `modified_date`, `status`, `parent`) VALUES
(1, 1, 'Class-1', 'Class-1 Description', 'class', '2024-04-07 14:50:10', '2024-04-07 14:50:31', 'publish', 0),
(2, 1, 'Class-2', 'Class-2 Description', 'Class', '2024-04-07 14:51:40', '2024-04-07 14:51:40', 'publish', 0),
(3, 1, 'Section A', 'Section A Description', 'Section ', '2024-04-07 14:57:30', '2024-04-07 16:10:20', 'publish', 0),
(4, 1, 'Section B', 'Section A Description', 'Section ', '2024-04-07 14:57:30', '2024-04-07 16:10:25', 'publish', 0),
(5, 1, 'First Period', 'First Period Description', 'Period', '2024-04-07 14:57:30', '2024-04-07 16:10:35', 'publish', 0),
(6, 1, 'Second Period', 'Second Period Description', 'Period', '2024-04-07 14:57:30', '2024-04-07 16:10:40', 'publish', 0),
(7, 1, 'Saturday-First Period', 'Saturday-First Period Description', 'timetable', '2024-04-07 14:57:30', '2024-04-07 16:10:44', 'publish', 0),
(8, 1, 'Third Period', '', 'period', '2024-04-07 02:59:10', '2024-04-07 16:10:47', 'publish', 0),
(10, 1, 'Fourth Period', '', 'period', '2024-04-07 04:34:20', '2024-04-07 16:34:20', 'publish', 0),
(11, 1, 'Fifth Period', '', 'period', '2024-04-07 06:04:56', '2024-04-07 18:04:56', 'publish', 0),
(12, 1, 'Mathematics', '', 'subject', '2024-04-08 10:42:56', '2024-04-08 10:42:56', 'publish', 0),
(13, 1, 'English', '', 'subject', '2024-04-08 10:42:56', '2024-04-08 10:42:56', 'publish', 0),
(14, 1, '', '', 'timetable', '2024-04-08 10:53:42', '2024-04-08 10:53:42', 'publish', 0),
(15, 1, '', '', 'timetable', '2024-04-08 23:38:04', '2024-04-09 11:38:04', 'publish', 0),
(16, 1, '', '', 'timetable', '2024-04-08 23:51:07', '2024-04-09 11:51:07', 'publish', 0),
(17, 1, 'Sciences', '', 'subject', '2024-04-08 10:42:56', '2024-04-08 10:42:56', 'publish', 0),
(18, 1, 'Computer', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:32:38', 'publish', 0),
(19, 1, 'History', '', 'subject', '2024-04-08 10:42:56', '2024-04-08 10:42:56', 'publish', 0),
(20, 1, 'Geography', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:32:46', 'publish', 0),
(21, 1, 'Chemistry', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:32:52', 'publish', 0),
(22, 1, 'Physics', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:32:58', 'publish', 0),
(23, 1, 'Philosophy', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:33:05', 'publish', 0),
(24, 1, 'Psychology', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:33:10', 'publish', 0),
(25, 1, 'Biology', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:33:17', 'publish', 0),
(26, 1, 'Geology', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:33:17', 'publish', 0),
(27, 1, '', '', '', '2024-04-16 20:55:18', '2024-04-16 20:55:18', '', 0),
(28, 1, '', '', '', '2024-04-16 20:56:02', '2024-04-16 20:56:02', '', 0),
(29, 1, 'Section C', 'description', 'section', '2024-04-16 21:22:06', '2024-04-16 21:22:06', 'publish', 0),
(30, 1, 'Class-3', 'description', 'class', '2024-04-16 21:25:25', '2024-04-16 21:25:25', 'publish', 0),
(31, 1, '', '', 'timetable', '2024-04-17 10:44:54', '2024-04-16 22:44:54', 'publish', 0),
(32, 1, '', '', 'timetable', '2024-04-17 10:45:31', '2024-04-16 22:45:31', 'publish', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`) VALUES
(1, 'section A'),
(2, 'section B'),
(3, 'section C'),
(42, 'Section D'),
(43, 'Section E');

-- --------------------------------------------------------

--
-- Table structure for table `usermeta`
--

CREATE TABLE `usermeta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meta_key` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usermeta`
--

INSERT INTO `usermeta` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES
(52, 54, 'dob', '2003-02-02'),
(53, 54, 'mobile', ''),
(54, 55, 'dob', '2004-02-03'),
(55, 55, 'mobile', ''),
(56, 56, 'dob', '2004-06-05'),
(57, 56, 'mobile', ''),
(58, 56, 'payment_method', 'online'),
(59, 56, 'class', ''),
(60, 57, 'dob', '2003-08-25'),
(61, 57, 'mobile', ''),
(62, 57, 'payment_method', 'online'),
(63, 57, 'class', ''),
(64, 58, 'dob', '2003-06-05'),
(65, 58, 'mobile', ''),
(66, 58, 'payment_method', 'online'),
(67, 58, 'class', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermeta`
--
ALTER TABLE `usermeta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
