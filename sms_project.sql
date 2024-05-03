-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 11:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
(1, 'teacher', 'teacher.1@example.com', '25f9e794323b453885f5181f1b624d0b', 'Teacher1', 3),
(2, 'teacher', 'teacher.2@example.com', 'zxcvzxcvzxcv', 'Teacher2', 2),
(7, 'teacher', 'teacher.3@tech.sms', 'e807f1fcf82d132f9bb018ca6738a19f', 'Teacher3 ', 1),
(34, 'parent', 'parent@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'parentt', 1),
(44, 'teacher', 'teacher.4@example.com', 'asdfasdfasdf', 'Teacher4', 2),
(45, 'teacher', 'teacher.5@example.com', 'zxcvzxcvzxcv', 'Teacher5', 3),
(46, 'teacher', 'teacher.6@example.com', 'asdfasdfasdf', 'Teacher6', 1),
(47, 'teacher', 'teacher.7@example.com', 'zxcvzxcvzxcv', 'Teacher7', 2),
(48, 'teacher', 'teacher.8@example.com', 'asdfasdfasdf', 'Teacher8', 3),
(49, 'teacher', 'teacher.9@example.com', 'zxcvzxcvzxcv', 'Teacher9', 2),
(50, 'teacher', 'teacher.10@example.com', 'zxcvzxcvzxcv', 'Teacher10', 2),
(60, 'teacher', 'teacher.11@example.com', 'zxcvzxcvzxcv', 'Teacher11', 3),
(67, 'student', 'student.1@example.com', '25f9e794323b453885f5181f1b624d0b', 'student 1', 0),
(68, 'student', 'faridamohmed@gmail.com', '6444bf502edde76588fb7c6b63cd3fd5', 'farida mohamed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `attendance_month` text NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `attendance_value` longtext NOT NULL,
  `std_id` int(11) NOT NULL,
  `current_session` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `attendance_month`, `modified_date`, `attendance_value`, `std_id`, `current_session`) VALUES
(1, 'may', '2024-05-03 21:32:43', 'a:33:{i:1;a:3:{s:9:\"signin_at\";i:1714511330;s:10:\"signout_at\";i:1714511330;s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}s:2:\"03\";a:3:{s:9:\"signin_at\";i:1714696071;s:10:\"signout_at\";s:0:\"\";s:4:\"date\";s:2:\"03\";}s:2:\"04\";a:3:{s:9:\"signin_at\";i:1714761163;s:10:\"signout_at\";s:0:\"\";s:4:\"date\";s:2:\"04\";}}', 67, '2024-04-30 20:12:09'),
(3, 'january', '2024-05-04 00:17:38', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', 68, '2024-05-03 21:17:38'),
(4, 'fabruary', '2024-05-04 00:17:38', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', 68, '2024-05-03 21:17:38'),
(5, 'march', '2024-05-04 00:17:38', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', 68, '2024-05-03 21:17:38'),
(6, 'april', '2024-05-04 00:17:38', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', 68, '2024-05-03 21:17:38'),
(7, 'may', '2024-05-04 00:17:38', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', 68, '2024-05-03 21:17:38'),
(8, 'june', '2024-05-04 00:17:38', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', 68, '2024-05-03 21:17:38'),
(9, 'july', '2024-05-04 00:17:38', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', 68, '2024-05-03 21:17:38'),
(10, 'august', '2024-05-04 00:17:38', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', 68, '2024-05-03 21:17:38'),
(11, 'september', '2024-05-04 00:17:39', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', 68, '2024-05-03 21:17:39'),
(12, 'october', '2024-05-04 00:17:39', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', 68, '2024-05-03 21:17:39'),
(13, 'november', '2024-05-04 00:17:39', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', 68, '2024-05-03 21:17:39'),
(14, 'december', '2024-05-04 00:17:39', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:27;}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', 68, '2024-05-03 21:17:39');

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
(2, 'Class-2', 'section A , section B', '2024-03-31');

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
(104, 1, 'PDF for english', 'PDF for english', 'study-material', '2024-05-03 00:04:47', '2024-05-03 00:04:47', 'publish', 0);

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
(142, 68, 'doa', '2024-10-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
