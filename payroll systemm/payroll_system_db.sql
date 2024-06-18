-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 06:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `leave_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_accounts`
--

INSERT INTO `employee_accounts` (`employee_id`, `first_name`, `second_name`, `middle_name`, `surname`, `gender`, `contact_number`, `Address`, `email_address`, `password`, `bank_account`, `bank_name`, `Position_number`, `leave_id`) VALUES
(202405, 'Dhaniel', 'asdasfadas', 'asdasdasda', 'Lofamia', 'dasdasda', 12412312, 'asasdafsadas', 'afasdasasf', 'asdasdas', 12423412, 'asfasdasda', 1, 4),
(202406, 'Harvey', 'afasdasd', 'asdasdas', 'Nagtalon', 'asfadsa', 1212312, 'adfsfasdasd', 'afsadasd', 'asgasdasdas', 123123, 'asdasfadas', 2, 5),
(202407, 'Jasmine', 'asfasdad', 'asdadasd', 'Pangilin', 'asdasdas', 12312421, 'fafasdasda', 'afdasfasd', 'asdasdffsa', 123125412, 'asdasfasdaas', 3, 6),
(202408, 'Jamaeilyn', 'sadafa', 'sdaasdagsdf', 'Gascon', 'asfsdfaczxc', 12413123, 'asfasdadsasd', 'fasdasg', '14asdasczsa', 12312412, 'asasdsafasd', 4, 6),
(202409, 'asfgagsdasasd', 'dsdasdadsa', 'asgsdeaa', 'sadasdasfasf', 'gdasdasdas', 12353141, 'asgasdasdas', 'aasdagad', 'asdasgas', 41241531, 'asdsagadas', 2, 7),
(202410, 'okay', 'asfasda', 'sdadsa', 'okay', 'asdasd', 123124123, 'asdasdafsadasd', 'asfasdasd', 'asdasd', 123124123, 'asdasfasdas', 1, 2),
(202411, 'asfadasd', 'asdasd', 'asdasdasd', 'asfasdasd', 'asdadas', 12314123, '1fsdadasdasdas', '1241312', 'asasfas123', 123124, 'asdasfasd', 4, 4),
(202412, 'Ej', 'fasda', 'asdasd', 'rod', 'asfasdas', 213124123, 'aasdasdfsa', 'sfasdasfdas', 'dasdasf', 123124124, 'adasfasfas', 1, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_positions`
--

INSERT INTO `employee_positions` (`Position_number`, `Position`, `Daily_rate`) VALUES
(1, 'Service Crew', 480),
(2, 'Manager', 1100),
(3, 'Crew-Manager', 500),
(4, 'Senior-Crew', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `Position_number` (`Position_number`),
  ADD KEY `leave_id` (`leave_id`);

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
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  ADD CONSTRAINT `employee_accounts_ibfk_1` FOREIGN KEY (`Position_number`) REFERENCES `employee_positions` (`Position_number`),
  ADD CONSTRAINT `employee_accounts_ibfk_2` FOREIGN KEY (`leave_id`) REFERENCES `employee_pending_leaves` (`leave_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
