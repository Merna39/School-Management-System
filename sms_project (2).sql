-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 12:02 AM
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
(1, 'teacher', 'mohamedkhaled@teach.com', '25f9e794323b453885f5181f1b624d0b', 'Mohamed khaled', 3, 'teacher'),
(2, 'teacher', 'ashrafgaid@teach.com', '25f9e794323b453885f5181f1b624d0b', 'Ashraf Gaid', 2, 'teacher'),
(7, 'teacher', 'meladmoner@teach.sms', 'e807f1fcf82d132f9bb018ca6738a19f', 'Melad Moner', 1, 'teacher'),
(44, 'teacher', 'talaatzaky@teach.com', '25f9e794323b453885f5181f1b624d0b', 'Talaat Zaky', 2, 'teacher'),
(45, 'teacher', 'youssefabdallah@teach.com', '25f9e794323b453885f5181f1b624d0b', 'Youssef Abdalah ', 3, 'teacher'),
(46, 'teacher', 'mariamerahem@teach.com', '25f9e794323b453885f5181f1b624d0b', 'Mariam Ebrahem', 1, 'teacher'),
(47, 'teacher', 'abdalahmohamed@teach.com', '25f9e794323b453885f5181f1b624d0b', 'Abdalah Mohamed ', 2, 'teacher'),
(48, 'teacher', 'markusessa@teach.com', '25f9e794323b453885f5181f1b624d0b', 'Markus Essa', 1, 'teacher'),
(49, 'teacher', 'ahmedshady@teach.com', '25f9e794323b453885f5181f1b624d0b', 'Ahmed Shady', 2, 'teacher'),
(50, 'teacher', 'marwaahmed@teach.com', '25f9e794323b453885f5181f1b624d0b', 'Marwa Ahmed', 2, 'teacher'),
(60, 'teacher', 'khaledmohsen@teach.com', '25f9e794323b453885f5181f1b624d0b', 'khaled Mohsen', 3, 'teacher'),
(67, 'student', 'aliadel@stud.com', '25f9e794323b453885f5181f1b624d0b', 'Ali Adel', 1, 'student'),
(68, 'student', 'faridamohmed@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Farida Mohamed', 2, 'student'),
(69, 'student', 'amrahmed@stud.com', '781e5e245d69b566979b86e28d23f2c7', 'Amr Ahmed', 1, 'student'),
(70, 'student', 'ahmedmohamed@stud.com', '781e5e245d69b566979b86e28d23f2c7', 'Ahmed Mohamed', 3, 'student'),
(84, 'student', 'Ayaahmed@stud.com', '660fd8d5bcbfa37c40f5b2b892636fca', 'Aya Ahmed', 2, 'student'),
(85, 'student', 'Mariememad@stud.com', '4f7a0009b455fb1289657352debb2473', 'Mariem Emad', 2, 'student');

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
(10, 'June', '2024-06-23 18:47:15', 'a:1:{i:23;a:3:{s:9:\"signin_at\";i:1719157493;s:10:\"signout_at\";i:1719157635;s:4:\"date\";s:2:\"23\";}}', 67, '2024-06-23 15:44:32'),
(11, 'June', '2024-06-23 18:58:13', '', 68, '2024-06-23 15:58:13'),
(12, 'June', '2024-06-23 18:58:13', '', 69, '2024-06-23 15:58:13'),
(14, 'June', '2024-06-23 18:59:18', '', 70, '2024-06-23 15:59:18'),
(15, 'June', '2024-06-23 18:59:18', '', 84, '2024-06-23 15:59:18'),
(16, 'June', '2024-06-23 18:59:18', '', 85, '2024-06-23 15:59:18');

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
(11, 'June', '2024-06-23 19:01:52', '', 1, '2024-06-23 16:01:52'),
(12, 'June', '2024-06-23 19:01:52', '', 2, '2024-06-23 16:01:52'),
(13, 'June', '2024-06-23 19:01:52', '', 7, '2024-06-23 16:01:52'),
(14, 'June', '2024-06-23 19:01:52', '', 44, '2024-06-23 16:01:52'),
(15, 'June', '2024-06-23 22:42:36', 'a:2:{i:23;a:3:{s:9:\"signin_at\";i:1719158574;s:10:\"signout_at\";i:1719158587;s:4:\"date\";s:2:\"23\";}i:24;a:3:{s:9:\"signin_at\";N;s:10:\"signout_at\";i:1719171756;s:4:\"date\";s:2:\"24\";}}', 45, '2024-06-23 16:01:52'),
(16, 'June', '2024-06-23 19:01:52', '', 46, '2024-06-23 16:01:52'),
(17, 'June', '2024-06-23 19:01:52', '', 47, '2024-06-23 16:01:52'),
(18, 'June', '2024-06-23 19:01:52', '', 48, '2024-06-23 16:01:52'),
(19, 'June', '2024-06-23 19:01:52', '', 49, '2024-06-23 16:01:52'),
(20, 'June', '2024-06-23 19:01:52', '', 50, '2024-06-23 16:01:52'),
(21, 'June', '2024-06-23 19:01:52', '', 60, '2024-06-23 16:01:52');

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
(17, '', '', '2024-05-15'),
(18, '', '', '2024-06-19'),
(19, '', '', '2024-06-19'),
(20, '', '', '2024-06-19'),
(21, 'kluivbl', '', '2024-06-19'),
(22, '', '', '2024-06-19');

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
  `outcoming_msg` int(11) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `incoming_msg` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `outcoming_msg`, `msg`, `timestamp`, `incoming_msg`, `file_path`, `status`) VALUES
(0, 67, 'hi', '2024-06-23 15:35:13', 7, NULL, 'unread'),
(0, 67, 'hi', '2024-06-23 19:44:23', 0, NULL, 'unread'),
(0, 67, 'hi', '2024-06-23 19:45:35', 69, NULL, 'unread'),
(0, 67, 'hi', '2024-06-23 19:45:49', 48, NULL, 'unread'),
(0, 67, 'hi', '2024-06-23 19:45:55', 46, NULL, 'unread'),
(0, 45, 'hi', '2024-06-23 19:54:00', 1, NULL, 'unread'),
(0, 45, '', '2024-06-23 19:55:26', 1, '../dist/uploads/download (2).jpeg', 'unread'),
(0, 1, 'I will try', '2024-06-23 21:16:59', 45, NULL, 'unread');

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
(99, 104, 'file_attachment', 'footer.php'),
(106, 106, 'amount', '500'),
(107, 106, 'status', 'success'),
(108, 106, 'student_id', '68'),
(109, 106, 'month', 'January'),
(110, 107, 'amount', '500'),
(111, 107, 'status', 'success'),
(112, 107, 'student_id', '68'),
(113, 107, 'month', 'May'),
(114, 108, 'amount', '500'),
(115, 108, 'status', 'success'),
(116, 108, 'student_id', '68'),
(117, 108, 'month', 'May'),
(118, 109, 'amount', '500'),
(119, 109, 'status', 'success'),
(120, 109, 'student_id', '68'),
(121, 109, 'month', 'January'),
(122, 110, 'amount', '500'),
(123, 110, 'status', 'success'),
(124, 110, 'student_id', '68'),
(125, 110, 'month', 'January'),
(126, 111, 'amount', '500'),
(127, 111, 'status', 'success'),
(128, 111, 'student_id', '68'),
(129, 111, 'month', 'February'),
(130, 113, 'section', '3'),
(131, 113, 'section', '4'),
(132, 123, 'amount', '500'),
(133, 123, 'status', 'success'),
(134, 123, 'student_id', '67'),
(135, 123, 'month', 'January');

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
(38, 1, 'timetable', 'description', 'timetable', '2024-04-23 22:38:44', '2024-04-23 22:38:44', 'publish', 0),
(101, 1, 'timetable', 'description', 'timetable', '2024-04-28 11:11:29', '2024-04-28 11:11:29', 'publish', 0),
(102, 1, 'PDF for algebra', 'PDF for algebra', 'study-material', '2024-05-02 23:50:57', '2024-05-02 23:50:57', 'publish', 0),
(103, 1, 'PDF for algebra', 'PDF for algebra', 'study-material', '2024-05-02 23:53:44', '2024-05-02 23:53:44', 'publish', 0),
(104, 1, 'PDF for english', 'PDF for english', 'study-material', '2024-05-03 00:04:47', '2024-05-03 00:04:47', 'publish', 0),
(105, 1, 'timetable', 'description', 'timetable', '2024-05-15 17:19:16', '2024-05-15 17:19:16', 'publish', 0),
(106, 68, 'January - Fee', '', 'payment', '2024-06-18 13:17:00', '2024-06-18 13:17:00', 'success', 0),
(107, 68, 'May - Fee', '', 'payment', '2024-06-18 13:37:08', '2024-06-18 13:37:08', 'success', 0),
(108, 68, 'May - Fee', '', 'payment', '2024-06-18 13:37:28', '2024-06-18 13:37:28', 'success', 0),
(109, 68, 'January - Fee', '', 'payment', '2024-06-18 13:50:11', '2024-06-18 13:50:11', 'success', 0),
(110, 68, 'January - Fee', '', 'payment', '2024-06-18 13:51:52', '2024-06-18 13:51:52', 'success', 0),
(111, 68, 'February - Fee', '', 'payment', '2024-06-18 13:52:08', '2024-06-18 13:52:08', 'success', 0),
(112, 1, 'Section D', 'description', 'section', '2024-06-19 19:46:24', '2024-06-19 19:46:24', 'publish', 0),
(123, 67, 'January - Fee', '', 'payment', '2024-06-23 14:20:34', '2024-06-23 14:20:34', 'success', 0);

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
(794, 98, 'dob', '2008-02-01'),
(795, 98, 'mobile', '01553906506'),
(796, 98, 'payment_method', 'online'),
(797, 98, 'address', '6 Mohamed Al Rawi Street , Giza '),
(798, 98, 'country', 'Egypt '),
(799, 98, 'state', 'Giza'),
(800, 98, 'zip', '02'),
(801, 98, 'father_name', 'Ahmad'),
(802, 98, 'father_mobile', '01235456321'),
(803, 98, 'mother_name', 'Dalia'),
(804, 98, 'mother_mobile', '01221455425'),
(805, 98, 'parents_address', '6 Mohamed Al Rawi Street , Giza '),
(806, 98, 'parents_country', 'Egypt '),
(807, 98, 'parents_state', 'Giza'),
(808, 98, 'parents_zip', '02'),
(815, 98, 'class', '36'),
(816, 98, 'section', '3'),
(818, 98, 'doa', '2024-06-20');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `attendance_std`
--
ALTER TABLE `attendance_std`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `attendance_tch`
--
ALTER TABLE `attendance_tch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=819;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
