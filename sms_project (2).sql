-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 09:51 PM
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
  `level` int(11) NOT NULL,
  `role` enum('student','teacher') NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `type`, `email`, `password`, `name`, `level`, `role`) VALUES
(1, 'teacher', 'teacher.1@example.com', '25f9e794323b453885f5181f1b624d0b', 'Teacher1', 3, 'teacher'),
(2, 'teacher', 'teacher.2@example.com', '25f9e794323b453885f5181f1b624d0b', 'Teacher2', 2, 'teacher'),
(7, 'teacher', 'teacher.3@tech.sms', 'e807f1fcf82d132f9bb018ca6738a19f', 'Teacher3 ', 1, 'teacher'),
(34, 'parent', 'parent@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'parentt', 1, 'student'),
(44, 'teacher', 'teacher.4@example.com', 'asdfasdfasdf', 'Teacher4', 2, 'teacher'),
(45, 'teacher', 'teacher.5@example.com', 'zxcvzxcvzxcv', 'Teacher5', 3, 'teacher'),
(46, 'teacher', 'teacher.6@example.com', 'asdfasdfasdf', 'Teacher6', 1, 'teacher'),
(47, 'teacher', 'teacher.7@example.com', 'zxcvzxcvzxcv', 'Teacher7', 2, 'teacher'),
(48, 'teacher', 'teacher.8@example.com', 'asdfasdfasdf', 'Teacher8', 3, 'teacher'),
(49, 'teacher', 'teacher.9@example.com', 'zxcvzxcvzxcv', 'Teacher9', 2, 'teacher'),
(50, 'teacher', 'teacher.10@example.com', 'zxcvzxcvzxcv', 'Teacher10', 2, 'teacher'),
(60, 'teacher', 'teacher.11@example.com', 'zxcvzxcvzxcv', 'Teacher11', 3, 'teacher'),
(67, 'student', 'student.1@example.com', '25f9e794323b453885f5181f1b624d0b', 'student 1', 1, 'student'),
(68, 'student', 'faridamohmed@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'farida mohamed', 2, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_std`
--

CREATE TABLE `attendance_std` (
  `id` int(11) NOT NULL,
  `attendance_month` text NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `attendance_value` longtext NOT NULL,
  `std_id` int(11) NOT NULL,
  `current_session` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_std`
--

INSERT INTO `attendance_std` (`id`, `attendance_month`, `modified_date`, `attendance_value`, `std_id`, `current_session`) VALUES
(2, 'may', '2024-05-15 22:37:47', 'a:1:{i:16;a:3:{s:9:\"signin_at\";i:1715801850;s:10:\"signout_at\";i:1715801867;s:4:\"date\";s:2:\"16\";}}', 67, '2024-05-15 19:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_tch`
--

CREATE TABLE `attendance_tch` (
  `id` int(11) NOT NULL,
  `attendance_month` text NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `attendance_value` longtext NOT NULL,
  `tch_id` int(11) NOT NULL,
  `current_session` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_tch`
--

INSERT INTO `attendance_tch` (`id`, `attendance_month`, `modified_date`, `attendance_value`, `tch_id`, `current_session`) VALUES
(1, 'may', '2024-05-15 22:48:51', 'a:1:{i:16;a:3:{s:9:\"signin_at\";i:1715802480;s:10:\"signout_at\";i:1715802531;s:4:\"date\";s:2:\"16\";}}', 1, '2024-05-15 19:43:49');

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
(0, 'Class-1', 'section A ', '2024-03-31'),
(2, 'Class-2', 'section A , section B', '2024-03-31'),
(17, '', '', '2024-05-15');

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg` varchar(255) DEFAULT NULL,
  `outcoming_msg` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg`, `outcoming_msg`, `msg`) VALUES
(1, 'teacher', 'student', 'student hello'),
(2, 'student', 'teacher', 'teacher'),
(3, 'teacher', 'student', 'hi');

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
(12, 10, 'to', '10:00'),
(13, 5, 'from', '07:00'),
(14, 5, 'to', '07:45'),
(15, 6, 'from', '07:45'),
(16, 6, 'to', '08:30'),
(17, 8, 'from', '08:30'),
(18, 8, 'to', '09:15'),
(19, 11, 'from', '10:00'),
(20, 11, 'to', '10:30'),
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
(60, 33, 'from', '10:30'),
(61, 33, 'to', '11:15'),
(62, 34, 'from', '11:15'),
(63, 34, 'to', '12:00'),
(64, 37, 'class_id', '1'),
(65, 37, 'section_id', '1'),
(66, 37, 'teacher_id', '44'),
(67, 37, 'period_id', '6'),
(68, 37, 'day_name', 'tuesday'),
(69, 37, 'subject_id', '22'),
(70, 38, 'class_id', '1'),
(71, 38, 'section_id', '3'),
(72, 38, 'teacher_id', '44'),
(73, 38, 'period_id', '8'),
(74, 38, 'day_name', 'monday'),
(75, 38, 'subject_id', '22'),
(78, 1, 'section', '3'),
(79, 30, 'section', '29'),
(80, 36, 'section', '3'),
(81, 36, 'section', '4'),
(82, 42, 'section', '3'),
(83, 42, 'section', '4'),
(84, 42, 'section', '29'),
(85, 101, 'class_id', '2'),
(86, 101, 'section_id', '3'),
(87, 101, 'teacher_id', '44'),
(88, 101, 'period_id', '5'),
(89, 101, 'day_name', 'sunday'),
(90, 101, 'subject_id', '22'),
(91, 102, 'class', '1'),
(92, 102, 'subject', '12'),
(93, 102, 'file_attachment', 'login.php'),
(94, 103, 'class', '1'),
(95, 103, 'subject', '12'),
(96, 103, 'file_attachment', 'logout.php'),
(97, 104, 'class', '2'),
(98, 104, 'subject', '13'),
(99, 104, 'file_attachment', 'footer.php');

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
(1, 1, 'Class-1', 'Class-1 Description', 'class', '2024-04-07 14:50:10', '2024-04-28 10:52:40', 'publish', 0),
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
(18, 1, 'Computer', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:32:38', 'publish', 0),
(19, 1, 'History', '', 'subject', '2024-04-08 10:42:56', '2024-04-08 10:42:56', 'publish', 0),
(20, 1, 'Geography', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:32:46', 'publish', 0),
(21, 1, 'Chemistry', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:32:52', 'publish', 0),
(22, 1, 'Physics', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:32:58', 'publish', 0),
(23, 1, 'Philosophy', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:33:05', 'publish', 0),
(24, 1, 'Psychology', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:33:10', 'publish', 0),
(25, 1, 'Biology', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:33:17', 'publish', 0),
(26, 1, 'Geology', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:33:17', 'publish', 0),
(29, 1, 'Section C', 'description', 'section', '2024-04-16 21:22:06', '2024-04-16 21:22:06', 'publish', 0),
(30, 1, 'Class-3', 'description', 'class', '2024-04-16 21:25:25', '2024-04-16 21:25:25', 'publish', 0),
(31, 1, '', '', 'timetable', '2024-04-17 10:44:54', '2024-04-16 22:44:54', 'publish', 0),
(32, 1, '', '', 'timetable', '2024-04-17 10:45:31', '2024-04-16 22:45:31', 'publish', 0),
(33, 1, 'Sixth Period', '', 'period', '2024-04-23 06:57:49', '2024-04-23 18:57:49', 'publish', 0),
(34, 1, 'Seventh Period', '', 'period', '2024-04-23 06:58:43', '2024-04-23 18:58:43', 'publish', 0),
(35, 1, 'Arabic', '', 'subject', '2024-04-08 10:42:56', '2024-04-11 16:33:17', 'publish', 0),
(36, 1, 'Class-4', 'Class-4 Description', 'class', '2024-04-07 14:50:10', '2024-04-07 14:50:31', 'publish', 0),
(38, 1, 'timetable', 'description', 'timetable', '2024-04-23 22:38:44', '2024-04-23 22:38:44', 'publish', 0),
(101, 1, 'timetable', 'description', 'timetable', '2024-04-28 11:11:29', '2024-04-28 11:11:29', 'publish', 0),
(102, 1, 'PDF for algebra', 'PDF for algebra', 'study-material', '2024-05-02 23:50:57', '2024-05-02 23:50:57', 'publish', 0),
(103, 1, 'PDF for algebra', 'PDF for algebra', 'study-material', '2024-05-02 23:53:44', '2024-05-02 23:53:44', 'publish', 0),
(104, 1, 'PDF for english', 'PDF for english', 'study-material', '2024-05-03 00:04:47', '2024-05-03 00:04:47', 'publish', 0),
(105, 1, 'timetable', 'description', 'timetable', '2024-05-15 17:19:16', '2024-05-15 17:19:16', 'publish', 0);

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
(1, 'Section A'),
(2, 'Section B'),
(3, 'Section C'),
(4, 'Section D');

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
(93, 67, 'dob', '2006-02-09'),
(94, 67, 'mobile', '0125466525'),
(95, 67, 'payment_method', 'online'),
(96, 67, 'address', '6 Mohamed Al Rawi Street , Giza '),
(97, 67, 'country', 'Egypt '),
(98, 67, 'state', 'Giza'),
(99, 67, 'zip', '02'),
(114, 67, 'class', '1'),
(115, 67, 'section', '3'),
(118, 68, 'dob', '1997-11-09'),
(119, 68, 'mobile', '1234567890'),
(120, 68, 'payment_method', 'online'),
(121, 68, 'address', ''),
(122, 68, 'country', 'egypt'),
(123, 68, 'state', 'jjj'),
(124, 68, 'zip', '226010'),
(125, 68, 'father_name', 'mohamed ahmed'),
(126, 68, 'father_mobile', '1234567890'),
(127, 68, 'mother_name', 'yasmin yaser'),
(128, 68, 'mother_mobile', '1876530345'),
(129, 68, 'parents_address', 'tttyyuiii'),
(130, 68, 'parents_country', 'egypt'),
(131, 68, 'parents_state', 'jjj'),
(132, 68, 'parents_zip', '226010MVP'),
(133, 68, 'school_name', 'MPV'),
(134, 68, 'previous_class', '1'),
(135, 68, 'status', 'passed'),
(136, 68, 'total_marks', '500'),
(137, 68, 'obtain_mark', '445'),
(138, 68, 'previous_percentage', '89'),
(139, 68, 'class', '2'),
(140, 68, 'section', '3'),
(141, 68, 'subject_streem', ''),
(142, 68, 'doa', '2024-10-09'),
(143, 69, 'dob', '2000-05-05'),
(144, 69, 'mobile', '657874'),
(145, 69, 'payment_method', 'offline'),
(146, 69, 'address', 'e'),
(147, 69, 'country', 'Egypt'),
(148, 69, 'state', 'Egypt'),
(149, 69, 'zip', '35004'),
(150, 69, 'father_name', ''),
(151, 69, 'father_mobile', ''),
(152, 69, 'mother_name', ''),
(153, 69, 'mother_mobile', ''),
(154, 69, 'parents_address', ''),
(155, 69, 'parents_country', ''),
(156, 69, 'parents_state', ''),
(157, 69, 'parents_zip', ''),
(158, 69, 'school_name', ''),
(159, 69, 'previous_class', ''),
(160, 69, 'status', ''),
(161, 69, 'total_marks', ''),
(162, 69, 'obtain_mark', ''),
(163, 69, 'previous_percentage', ''),
(164, 69, 'class', ''),
(165, 69, 'section', ''),
(166, 69, 'subject_streem', ''),
(167, 69, 'doa', ''),
(168, 70, 'dob', '2000-02-22'),
(169, 70, 'mobile', '657874'),
(170, 70, 'payment_method', 'offline'),
(171, 70, 'address', 'e'),
(172, 70, 'country', 'Egypt'),
(173, 70, 'state', 'Egypt'),
(174, 70, 'zip', '35004'),
(175, 70, 'father_name', ''),
(176, 70, 'father_mobile', ''),
(177, 70, 'mother_name', ''),
(178, 70, 'mother_mobile', ''),
(179, 70, 'parents_address', ''),
(180, 70, 'parents_country', ''),
(181, 70, 'parents_state', ''),
(182, 70, 'parents_zip', ''),
(183, 70, 'school_name', ''),
(184, 70, 'previous_class', ''),
(185, 70, 'status', ''),
(186, 70, 'total_marks', ''),
(187, 70, 'obtain_mark', ''),
(188, 70, 'previous_percentage', ''),
(189, 70, 'class', ''),
(190, 70, 'section', ''),
(191, 70, 'subject_streem', ''),
(192, 70, 'doa', ''),
(193, 71, 'dob', '2000-04-04'),
(194, 71, 'mobile', '01559881139'),
(195, 71, 'payment_method', 'offline'),
(196, 71, 'address', ''),
(197, 71, 'country', 'Egypt'),
(198, 71, 'state', 'Africa'),
(199, 71, 'zip', ''),
(200, 71, 'father_name', ''),
(201, 71, 'father_mobile', ''),
(202, 71, 'mother_name', ''),
(203, 71, 'mother_mobile', ''),
(204, 71, 'parents_address', ''),
(205, 71, 'parents_country', ''),
(206, 71, 'parents_state', ''),
(207, 71, 'parents_zip', ''),
(208, 71, 'school_name', ''),
(209, 71, 'previous_class', ''),
(210, 71, 'status', ''),
(211, 71, 'total_marks', ''),
(212, 71, 'obtain_mark', ''),
(213, 71, 'previous_percentage', ''),
(214, 71, 'class', ''),
(215, 71, 'section', ''),
(216, 71, 'subject_streem', ''),
(217, 71, 'doa', ''),
(218, 72, 'dob', '2009-01-01'),
(219, 72, 'mobile', '01559881139'),
(220, 72, 'payment_method', 'offline'),
(221, 72, 'address', ''),
(222, 72, 'country', 'Egypt'),
(223, 72, 'state', 'Africa'),
(224, 72, 'zip', ''),
(225, 72, 'father_name', ''),
(226, 72, 'father_mobile', ''),
(227, 72, 'mother_name', ''),
(228, 72, 'mother_mobile', ''),
(229, 72, 'parents_address', ''),
(230, 72, 'parents_country', ''),
(231, 72, 'parents_state', ''),
(232, 72, 'parents_zip', ''),
(233, 72, 'school_name', ''),
(234, 72, 'previous_class', ''),
(235, 72, 'status', ''),
(236, 72, 'total_marks', ''),
(237, 72, 'obtain_mark', ''),
(238, 72, 'previous_percentage', ''),
(239, 72, 'class', ''),
(240, 72, 'section', ''),
(241, 72, 'subject_streem', ''),
(242, 72, 'doa', ''),
(243, 73, 'dob', '2000-04-05'),
(244, 73, 'mobile', '01559881139'),
(245, 73, 'payment_method', 'offline'),
(246, 73, 'address', ''),
(247, 73, 'country', 'Egypt'),
(248, 73, 'state', 'Africa'),
(249, 73, 'zip', ''),
(250, 73, 'father_name', ''),
(251, 73, 'father_mobile', ''),
(252, 73, 'mother_name', ''),
(253, 73, 'mother_mobile', ''),
(254, 73, 'parents_address', ''),
(255, 73, 'parents_country', ''),
(256, 73, 'parents_state', ''),
(257, 73, 'parents_zip', ''),
(258, 73, 'school_name', ''),
(259, 73, 'previous_class', ''),
(260, 73, 'status', ''),
(261, 73, 'total_marks', ''),
(262, 73, 'obtain_mark', ''),
(263, 73, 'previous_percentage', ''),
(264, 73, 'class', ''),
(265, 73, 'section', ''),
(266, 73, 'subject_streem', ''),
(267, 73, 'doa', ''),
(268, 74, 'dob', '2000-05-05'),
(269, 74, 'mobile', '01559881139'),
(270, 74, 'payment_method', 'offline'),
(271, 74, 'address', ''),
(272, 74, 'country', 'Egypt'),
(273, 74, 'state', 'Africa'),
(274, 74, 'zip', ''),
(275, 74, 'father_name', ''),
(276, 74, 'father_mobile', ''),
(277, 74, 'mother_name', ''),
(278, 74, 'mother_mobile', ''),
(279, 74, 'parents_address', ''),
(280, 74, 'parents_country', ''),
(281, 74, 'parents_state', ''),
(282, 74, 'parents_zip', ''),
(283, 74, 'school_name', ''),
(284, 74, 'previous_class', ''),
(285, 74, 'status', ''),
(286, 74, 'total_marks', ''),
(287, 74, 'obtain_mark', ''),
(288, 74, 'previous_percentage', ''),
(289, 74, 'class', ''),
(290, 74, 'section', ''),
(291, 74, 'subject_streem', ''),
(292, 74, 'doa', ''),
(293, 75, 'dob', '2000-04-05'),
(294, 75, 'mobile', '01559881139'),
(295, 75, 'payment_method', 'offline'),
(296, 75, 'address', ''),
(297, 75, 'country', 'Egypt'),
(298, 75, 'state', 'Africa'),
(299, 75, 'zip', ''),
(300, 75, 'father_name', ''),
(301, 75, 'father_mobile', ''),
(302, 75, 'mother_name', ''),
(303, 75, 'mother_mobile', ''),
(304, 75, 'parents_address', ''),
(305, 75, 'parents_country', ''),
(306, 75, 'parents_state', ''),
(307, 75, 'parents_zip', ''),
(308, 75, 'school_name', ''),
(309, 75, 'previous_class', ''),
(310, 75, 'status', ''),
(311, 75, 'total_marks', ''),
(312, 75, 'obtain_mark', ''),
(313, 75, 'previous_percentage', ''),
(314, 75, 'class', ''),
(315, 75, 'section', ''),
(316, 75, 'subject_streem', ''),
(317, 75, 'doa', ''),
(318, 76, 'dob', '2000-02-02'),
(319, 76, 'mobile', '564878'),
(320, 76, 'payment_method', 'offline'),
(321, 76, 'address', ''),
(322, 76, 'country', '54'),
(323, 76, 'state', ''),
(324, 76, 'zip', ''),
(325, 76, 'father_name', ''),
(326, 76, 'father_mobile', ''),
(327, 76, 'mother_name', ''),
(328, 76, 'mother_mobile', ''),
(329, 76, 'parents_address', ''),
(330, 76, 'parents_country', ''),
(331, 76, 'parents_state', ''),
(332, 76, 'parents_zip', ''),
(333, 76, 'school_name', ''),
(334, 76, 'previous_class', ''),
(335, 76, 'status', ''),
(336, 76, 'total_marks', ''),
(337, 76, 'obtain_mark', ''),
(338, 76, 'previous_percentage', ''),
(339, 76, 'class', ''),
(340, 76, 'section', ''),
(341, 76, 'subject_streem', ''),
(342, 76, 'doa', ''),
(343, 77, 'dob', '2000-02-04'),
(344, 77, 'mobile', '+557858796'),
(345, 77, 'payment_method', 'offline'),
(346, 77, 'address', '2022-2023'),
(347, 77, 'country', ''),
(348, 77, 'state', ''),
(349, 77, 'zip', ''),
(350, 77, 'father_name', ''),
(351, 77, 'father_mobile', ''),
(352, 77, 'mother_name', ''),
(353, 77, 'mother_mobile', ''),
(354, 77, 'parents_address', ''),
(355, 77, 'parents_country', ''),
(356, 77, 'parents_state', ''),
(357, 77, 'parents_zip', ''),
(358, 77, 'school_name', ''),
(359, 77, 'previous_class', ''),
(360, 77, 'status', ''),
(361, 77, 'total_marks', ''),
(362, 77, 'obtain_mark', ''),
(363, 77, 'previous_percentage', ''),
(364, 77, 'class', ''),
(365, 77, 'section', ''),
(366, 77, 'subject_streem', ''),
(367, 77, 'doa', ''),
(368, 78, 'dob', '2000-03-02'),
(369, 78, 'mobile', '879878879'),
(370, 78, 'payment_method', ''),
(371, 78, 'address', ''),
(372, 78, 'country', ''),
(373, 78, 'state', ''),
(374, 78, 'zip', ''),
(375, 78, 'father_name', ''),
(376, 78, 'father_mobile', ''),
(377, 78, 'mother_name', ''),
(378, 78, 'mother_mobile', ''),
(379, 78, 'parents_address', ''),
(380, 78, 'parents_country', ''),
(381, 78, 'parents_state', ''),
(382, 78, 'parents_zip', ''),
(383, 78, 'school_name', ''),
(384, 78, 'previous_class', ''),
(385, 78, 'status', ''),
(386, 78, 'total_marks', ''),
(387, 78, 'obtain_mark', ''),
(388, 78, 'previous_percentage', ''),
(389, 78, 'class', ''),
(390, 78, 'section', ''),
(391, 78, 'subject_streem', ''),
(392, 78, 'doa', ''),
(393, 79, 'dob', '2000-02-02'),
(394, 79, 'mobile', '5478787'),
(395, 79, 'payment_method', ''),
(396, 79, 'address', ''),
(397, 79, 'country', ''),
(398, 79, 'state', ''),
(399, 79, 'zip', ''),
(400, 79, 'father_name', ''),
(401, 79, 'father_mobile', ''),
(402, 79, 'mother_name', ''),
(403, 79, 'mother_mobile', ''),
(404, 79, 'parents_address', ''),
(405, 79, 'parents_country', ''),
(406, 79, 'parents_state', ''),
(407, 79, 'parents_zip', ''),
(408, 79, 'school_name', ''),
(409, 79, 'previous_class', ''),
(410, 79, 'status', ''),
(411, 79, 'total_marks', ''),
(412, 79, 'obtain_mark', ''),
(413, 79, 'previous_percentage', ''),
(414, 79, 'class', ''),
(415, 79, 'section', ''),
(416, 79, 'subject_streem', ''),
(417, 79, 'doa', ''),
(418, 80, 'dob', '2000-02-05'),
(419, 80, 'mobile', '+557858796'),
(420, 80, 'payment_method', ''),
(421, 80, 'address', ''),
(422, 80, 'country', ''),
(423, 80, 'state', ''),
(424, 80, 'zip', ''),
(425, 80, 'father_name', ''),
(426, 80, 'father_mobile', ''),
(427, 80, 'mother_name', ''),
(428, 80, 'mother_mobile', ''),
(429, 80, 'parents_address', ''),
(430, 80, 'parents_country', ''),
(431, 80, 'parents_state', ''),
(432, 80, 'parents_zip', ''),
(433, 80, 'school_name', ''),
(434, 80, 'previous_class', ''),
(435, 80, 'status', ''),
(436, 80, 'total_marks', ''),
(437, 80, 'obtain_mark', ''),
(438, 80, 'previous_percentage', ''),
(439, 80, 'class', ''),
(440, 80, 'section', ''),
(441, 80, 'subject_streem', ''),
(442, 80, 'doa', ''),
(443, 81, 'dob', '2000-02-02'),
(444, 81, 'mobile', '544897789'),
(445, 81, 'payment_method', ''),
(446, 81, 'address', '2022-2023'),
(447, 81, 'country', ''),
(448, 81, 'state', ''),
(449, 81, 'zip', ''),
(450, 81, 'father_name', ''),
(451, 81, 'father_mobile', ''),
(452, 81, 'mother_name', ''),
(453, 81, 'mother_mobile', ''),
(454, 81, 'parents_address', ''),
(455, 81, 'parents_country', ''),
(456, 81, 'parents_state', ''),
(457, 81, 'parents_zip', ''),
(458, 81, 'school_name', ''),
(459, 81, 'previous_class', ''),
(460, 81, 'status', ''),
(461, 81, 'total_marks', ''),
(462, 81, 'obtain_mark', ''),
(463, 81, 'previous_percentage', ''),
(464, 81, 'class', ''),
(465, 81, 'section', ''),
(466, 81, 'subject_streem', ''),
(467, 81, 'doa', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_std`
--
ALTER TABLE `attendance_std`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_tch`
--
ALTER TABLE `attendance_tch`
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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `attendance_std`
--
ALTER TABLE `attendance_std`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance_tch`
--
ALTER TABLE `attendance_tch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
