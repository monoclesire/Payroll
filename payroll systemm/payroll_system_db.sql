-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 04:39 AM
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
  `email_address` varchar(55) NOT NULL,
  `password` varchar(20) NOT NULL,
  `bank_account` int(20) NOT NULL,
  `bank_name` varchar(55) NOT NULL,
  `position` varchar(55) NOT NULL,
  `employee_leave_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_accounts`
--

INSERT INTO `employee_accounts` (`employee_id`, `first_name`, `second_name`, `middle_name`, `surname`, `gender`, `contact_number`, `email_address`, `password`, `bank_account`, `bank_name`, `position`, `employee_leave_id`) VALUES
(202401, 'dhaniel', '', 'dela cruz', 'lofamia', 'male', 988378213, 'dhashda@gmail.com', 'dhanielpogi123', 1236123641, 'hahaediwow', 'Service Crew', 1),
(202402, 'boss', 'bossing', 'asdas', 'haha', 'female', 21391823, 'asdasj@gmail.com', 'wowow', 9183112, 'jhagsd', 'Manager', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE `employee_leave` (
  `employee_leave_id` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Position` varchar(55) NOT NULL,
  `Leave_type` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_leave`
--

INSERT INTO `employee_leave` (`employee_leave_id`, `Name`, `Position`, `Leave_type`) VALUES
(1, 'Dhaniel', 'Service Crew', 'Sick leave'),
(2, 'boss', 'Manager', 'Sick Leave');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employee_leave_id` (`employee_leave_id`);

--
-- Indexes for table `employee_leave`
--
ALTER TABLE `employee_leave`
  ADD PRIMARY KEY (`employee_leave_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202403;

--
-- AUTO_INCREMENT for table `employee_leave`
--
ALTER TABLE `employee_leave`
  MODIFY `employee_leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  ADD CONSTRAINT `employee_accounts_ibfk_1` FOREIGN KEY (`employee_leave_id`) REFERENCES `employee_leave` (`employee_leave_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
