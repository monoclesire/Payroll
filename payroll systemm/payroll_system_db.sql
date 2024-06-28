-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 10:42 AM
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
-- Database: `payroll_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_accounts`
--

CREATE TABLE `employee_accounts` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `second_name` varchar(55) NOT NULL,
  `middle_name` varchar(55) NOT NULL,
  `surname` varchar(55) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `Address` text NOT NULL,
  `email_address` varchar(55) NOT NULL,
  `password` varchar(20) NOT NULL,
  `bank_account` int(20) NOT NULL,
  `bank_name` varchar(55) NOT NULL,
  `Position_number` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `employee_payslip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_accounts`
--

INSERT INTO `employee_accounts` (`employee_id`, `first_name`, `second_name`, `middle_name`, `surname`, `gender`, `contact_number`, `Address`, `email_address`, `password`, `bank_account`, `bank_name`, `Position_number`, `leave_id`, `employee_payslip_id`) VALUES
(202405, 'Dhaniel', 'asdasfadas', 'asdasdasda', 'Lofamia', 'dasdasda', 12412312, 'asasdafsadas', 'afasdasasf', 'asdasdas', 12423412, 'asfasdasda', 1, 4, 88),
(202406, 'Harvey', 'afasdasd', 'asdasdas', 'Nagtalon', 'asfadsa', 1212312, 'adfsfasdasd', 'afsadasd', 'asgasdasdas', 123123, 'asdasfadas', 2, 5, 89),
(202407, 'Jasmine', 'asfasdad', 'asdadasd', 'Pangilin', 'asdasdas', 12312421, 'fafasdasda', 'afdasfasd', 'asdasdffsa', 123125412, 'asdasfasdaas', 3, 6, 90),
(202408, 'Jamaeilyn', 'sadafa', 'sdaasdagsdf', 'Gascon', 'asfsdfaczxc', 12413123, 'asfasdadsasd', 'fasdasg', '14asdasczsa', 12312412, 'asasdsafasd', 4, 6, 91),
(202409, 'asfgagsdasasd', 'dsdasdadsa', 'asgsdeaa', 'sadasdasfasf', 'gdasdasdas', 12353141, 'asgasdasdas', 'aasdagad', 'asdasgas', 41241531, 'asdsagadas', 2, 7, 92),
(202410, 'okay', 'asfasda', 'sdadsa', 'okay', 'asdasd', 123124123, 'asdasdafsadasd', 'asfasdasd', 'asdasd', 123124123, 'asdasfasdas', 1, 2, 92),
(202411, 'asfadasd', 'asdasd', 'asdasdasd', 'asfasdasd', 'asdadas', 12314123, '1fsdadasdasdas', '1241312', 'asasfas123', 123124, 'asdasfasd', 4, 4, 94),
(202412, 'Ej', 'fasda', 'asdasd', 'rod', 'asfasdas', 213124123, 'aasdasdfsa', 'sfasdasfdas', 'dasdasf', 123124124, 'adasfasfas', 1, 2, 95);

-- --------------------------------------------------------

--
-- Table structure for table `employee_pending_leaves`
--

CREATE TABLE `employee_pending_leaves` (
  `leave_id` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Position` varchar(55) NOT NULL,
  `Leave_type` varchar(55) NOT NULL,
  `applied_date` datetime NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_pending_leaves`
--

INSERT INTO `employee_pending_leaves` (`leave_id`, `Name`, `Position`, `Leave_type`, `applied_date`, `status`) VALUES
(1, 'safasda', 'adasdasas', 'asdasdagsd', '2024-06-12 04:11:13', 'Approved'),
(2, 'safadasd', 'aafasdasd', 'safgasdas', '2024-06-19 03:12:21', 'Approved'),
(3, 'asdafad', 'fgsadsD', 'sdasd', '2024-06-26 06:16:00', 'Approved'),
(4, 'sfasdasd', 'dsafasadsa', 'dasdasdasf', '2024-06-12 05:12:00', 'Declined'),
(5, 'asdasgasd', 'asdasfasd', 'asfsfdasd', '2024-06-28 02:22:00', 'Declined'),
(6, 'agdadafsa', 'dgvafasf', 'adasdasdf', '2024-06-12 00:00:00', 'Declined'),
(7, 'asfasdaga', 'dasfadas', 'fasdasfasd', '2024-06-27 00:34:00', 'Declined'),
(8, 'asfasgasdas', 'fasdasdas', 'asfasdasda', '2024-06-25 00:00:00', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `employee_positions`
--

CREATE TABLE `employee_positions` (
  `Position_number` int(11) NOT NULL,
  `Position` varchar(55) NOT NULL,
  `Daily_rate` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_positions`
--

INSERT INTO `employee_positions` (`Position_number`, `Position`, `Daily_rate`) VALUES
(1, 'Service Crew', 480),
(2, 'Manager', 1100),
(3, 'Crew-Manager', 500),
(4, 'Senior-Crew', 500);

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_datas`
--

CREATE TABLE `employee_salary_datas` (
  `employee_payslip_id` int(11) NOT NULL,
  `month` varchar(55) NOT NULL,
  `position_name` varchar(20) NOT NULL,
  `worked_hours` int(20) NOT NULL,
  `overtime_hours` int(20) NOT NULL,
  `overtime_pay` int(20) NOT NULL,
  `holiday_pay` int(20) NOT NULL,
  `gross_pay` int(20) NOT NULL,
  `net_pay` int(20) NOT NULL,
  `total_deductions` int(20) NOT NULL,
  `date_transaction` date NOT NULL,
  `time_transaction` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_salary_datas`
--

INSERT INTO `employee_salary_datas` (`employee_payslip_id`, `month`, `position_name`, `worked_hours`, `overtime_hours`, `overtime_pay`, `holiday_pay`, `gross_pay`, `net_pay`, `total_deductions`, `date_transaction`, `time_transaction`) VALUES
(50, '', '', 321, 312, 18720, 118080, 290880, 288978, 1902, '0000-00-00', '11:05:04'),
(51, '', '', 123, 213, 12780, 22080, 34860, 30081, 4779, '0000-00-00', '11:05:19'),
(52, '', '', 32, 132, 7920, 395520, 418800, 294021, 124779, '0000-00-00', '11:06:02'),
(53, '', '', 32, 132, 7920, 395520, 418800, 294021, 124779, '0000-00-00', '11:06:18'),
(54, '', '', 32, 132, 7920, 395520, 418800, 294021, 124779, '0000-00-00', '11:06:21'),
(55, '', '', 32, 132, 7920, 395520, 418800, 294021, 124779, '0000-00-00', '11:06:56'),
(56, '', '', 32, 132, 7920, 395520, 418800, 294021, 124779, '0000-00-00', '11:07:13'),
(57, '', '', 32, 132, 7920, 395520, 418800, 294021, 124779, '0000-00-00', '11:07:53'),
(58, '', '', 32, 132, 7920, 395520, 418800, 294021, 124779, '0000-00-00', '11:07:55'),
(59, '', '', 32, 132, 7920, 395520, 418800, 294021, 124779, '0000-00-00', '11:08:03'),
(60, '', '', 32, 132, 7920, 395520, 418800, 294021, 124779, '0000-00-00', '11:09:55'),
(61, '', '', 32, 132, 7920, 395520, 418800, 294021, 124779, '0000-00-00', '11:10:02'),
(62, '', '', 123, 0, 0, 0, 59040, 57384, 1656, '0000-00-00', '11:10:23'),
(63, '', '', 123, 0, 0, 0, 59040, 57384, 1656, '0000-00-00', '11:10:44'),
(64, '', '', 123, 0, 0, 0, 59040, 57384, 1656, '0000-00-00', '11:10:59'),
(65, '', '', 123, 0, 0, 0, 59040, 57384, 1656, '0000-00-00', '11:11:24'),
(66, '', '', 231, 123, 7380, 0, 118260, 115373, 2887, '0000-00-00', '11:14:41'),
(67, '', '', 12, 12, 720, 11520, 18000, 12932, 5068, '0000-00-00', '11:15:40'),
(68, '', '', 12, 12, 720, 11520, 18000, 12932, 5068, '0000-00-00', '11:16:36'),
(69, '', '', 123, 123, 7380, 0, 66420, 64743, 1677, '0000-00-00', '11:18:47'),
(70, '', '', 32, 4, 240, 2880, 18480, 0, 33789, '0000-00-00', '01:40:13'),
(71, '', '', 32, 4, 240, 2880, 18480, 0, 33789, '0000-00-00', '01:43:10'),
(72, '', '', 32, 4, 240, 2880, 18480, 0, 33789, '0000-00-00', '01:43:10'),
(73, '', '', 32, 4, 240, 2880, 18480, 0, 33789, '0000-00-00', '01:43:11'),
(74, '', '', 20, 8, 500, 4000, 14500, 12775, 1725, '0000-00-00', '02:28:01'),
(75, '', '', 4, 2, 120, 10560, 12600, 9620, 2980, '0000-00-00', '02:29:29'),
(76, '', '', 12, 12, 720, 11520, 18000, 16344, 1656, '0000-00-00', '02:36:48'),
(77, '', '', 12, 12, 720, 11520, 18000, 16344, 1656, '0000-00-00', '02:43:27'),
(78, '', '', 12, 12, 720, 11520, 18000, 16344, 1656, '0000-00-00', '02:43:28'),
(79, '', '', 4, 0, 0, 0, 1920, 232, 1688, '0000-00-00', '02:43:44'),
(80, '', '', 2, 4, 240, 2880, 4080, 2424, 1656, '0000-00-00', '02:44:04'),
(81, '', '', 2, 4, 240, 2880, 4080, 2424, 1656, '0000-00-00', '02:50:05'),
(82, '', '', 2, 4, 240, 2880, 4080, 2424, 1656, '0000-00-00', '02:50:05'),
(83, '', '', 2, 4, 240, 2880, 4080, 2424, 1656, '0000-00-00', '02:50:08'),
(84, '', '', 4, 2, 120, 960, 3000, 344, 2656, '0000-00-00', '02:50:31'),
(85, '', '', 4, 2, 120, 960, 3000, 344, 2656, '0000-00-00', '02:52:03'),
(86, '', '', 4, 2, 120, 960, 3000, 344, 2656, '0000-00-00', '02:52:03'),
(87, '', '', 41, 0, 0, 0, 19680, 18024, 1656, '0000-00-00', '02:52:11'),
(88, 'June', 'Dhaniel', 42, 32, 1920, 960, 23040, 18171, 4869, '0000-00-00', '05:51:56'),
(89, 'June', 'Harvey', 32, 2, 275, 2200, 37675, 31567, 6108, '0000-00-00', '05:53:20'),
(90, 'June', 'Jasmine', 23, 233, 14563, 123000, 149063, 24215, 124848, '0000-00-00', '05:53:39'),
(91, 'June', 'Dhaniel', 14, 4, 240, 1920, 8880, 6224, 2656, '0000-00-00', '05:56:53'),
(92, 'January', 'Dhaniel', 14, 2, 120, 2880, 9720, 7064, 2656, '0000-00-00', '05:57:26'),
(93, 'June', 'Dhaniel', 336, 2, 120, 3840, 10680, 8024, 2656, '0000-00-00', '06:01:06'),
(94, 'June', 'Dhaniel', 32, 32, 1920, 960, 18240, 15584, 2656, '2024-06-22', '08:57:22'),
(95, 'June', 'okay', 4, 2, 0, 960, 2880, 224, 2656, '2024-06-22', '09:04:28'),
(96, 'June', 'Harvey', 14, 2, 275, 8800, 24475, 19680, 4795, '2024-06-22', '09:24:53'),
(97, 'June', 'Harvey', 360, 4, 550, 4400, 21450, 16655, 4795, '0000-00-00', '09:27:51'),
(98, 'June', 'Dhaniel', 0, 0, 0, 0, 0, 0, 1656, '0000-00-00', '23:19:46'),
(99, 'June', 'Dhaniel', 96, 2, 120, 1920, 3960, 0, 15200, '0000-00-00', '00:41:56'),
(100, 'June', 'Dhaniel', 96, 2, 120, 960, 3000, 1032, 1968, '0000-00-00', '00:42:28'),
(101, 'June', 'Dhaniel', 96, 2, 120, 1920, 3960, 2304, 1656, '0000-00-00', '01:10:39'),
(102, 'June', 'Dhaniel', 96, 2, 120, 960, 3000, 1344, 1656, '2024-06-28', '01:14:04'),
(103, 'June', 'Dhaniel', 96, 23, 1380, 1920, 5220, 3564, 1656, '2024-06-28', '01:38:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `Position_number` (`Position_number`),
  ADD KEY `leave_id` (`leave_id`),
  ADD KEY `employee_payslip_id` (`employee_payslip_id`);

--
-- Indexes for table `employee_pending_leaves`
--
ALTER TABLE `employee_pending_leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `employee_positions`
--
ALTER TABLE `employee_positions`
  ADD PRIMARY KEY (`Position_number`);

--
-- Indexes for table `employee_salary_datas`
--
ALTER TABLE `employee_salary_datas`
  ADD PRIMARY KEY (`employee_payslip_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202413;

--
-- AUTO_INCREMENT for table `employee_pending_leaves`
--
ALTER TABLE `employee_pending_leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_positions`
--
ALTER TABLE `employee_positions`
  MODIFY `Position_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_salary_datas`
--
ALTER TABLE `employee_salary_datas`
  MODIFY `employee_payslip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  ADD CONSTRAINT `employee_accounts_ibfk_1` FOREIGN KEY (`Position_number`) REFERENCES `employee_positions` (`Position_number`),
  ADD CONSTRAINT `employee_accounts_ibfk_2` FOREIGN KEY (`leave_id`) REFERENCES `employee_pending_leaves` (`leave_id`),
  ADD CONSTRAINT `employee_accounts_ibfk_3` FOREIGN KEY (`employee_payslip_id`) REFERENCES `employee_salary_datas` (`employee_payslip_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
