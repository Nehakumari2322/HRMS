-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 06:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lcr`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_personal_data`
--

CREATE TABLE `emp_personal_data` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `husband_name` varchar(100) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_termination` date DEFAULT NULL,
  `phone_no` bigint(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `signature` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ac_holder_name` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `ifsc_code` varchar(15) DEFAULT NULL,
  `parmanent_address_line1` varchar(200) DEFAULT NULL,
  `parmanent_address_line2` varchar(200) DEFAULT NULL,
  `p_state` varchar(50) DEFAULT NULL,
  `p_city` varchar(50) DEFAULT NULL,
  `p_pin_code` smallint(6) DEFAULT NULL,
  `current_address_line1` varchar(200) DEFAULT NULL,
  `current_address_line2` varchar(200) DEFAULT NULL,
  `c_state` varchar(50) DEFAULT NULL,
  `c_city` varchar(50) DEFAULT NULL,
  `c_pin_code` smallint(6) DEFAULT NULL,
  `created_ts` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `last_update_ts` datetime DEFAULT NULL,
  `last_updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_personal_data`
--

INSERT INTO `emp_personal_data` (`emp_id`, `name`, `father_name`, `husband_name`, `date_of_joining`, `date_of_birth`, `date_of_termination`, `phone_no`, `gender`, `photo`, `signature`, `email`, `ac_holder_name`, `bank_name`, `account_number`, `branch_name`, `ifsc_code`, `parmanent_address_line1`, `parmanent_address_line2`, `p_state`, `p_city`, `p_pin_code`, `current_address_line1`, `current_address_line2`, `c_state`, `c_city`, `c_pin_code`, `created_ts`, `created_by`, `last_update_ts`, `last_updated_by`) VALUES
(100002, 'neha', 'suraj bali saw', '', '2023-11-16', '2002-01-26', '0000-00-00', 8294372130, 'female', 'IMG20211227215451_00.jpg', 'sig.jpg', 'pinku@gmail.com', 'Neha', 'SBI', '845458743345', 'SBI', 'Dugda', 'D/21 officer colony dugda Bokaro', 'SBI BANK', 'Karnataka', 'Bengaluru Rural', 32767, 'D/21 officer colony dugda Bokaro', 'SBI BANK', 'Karnataka', 'Bengaluru Rural', 32767, '2024-02-21 17:00:10', 'admin', '2024-10-25 15:00:31', 'admin'),
(100024, 'Ansu', 'sunil Kumar', '', '2024-08-02', '2001-07-05', '0000-00-00', 9456789012, 'female', 'neha.jpeg', 'DD.jpg', 'ansu@kioskitech.com', 'Ansu', 'SBI', '845458743345', 'SBI', 'Odisa', '1 Block', 'kormangala', 'Karnataka', 'Banglore', 32767, '1 Block', 'kormangala', 'Karnataka', 'Banglore', 32767, '2024-09-27 11:23:11', 'admin', '2024-10-25 15:37:04', 'admin'),
(100025, 'Diya', 'sonu', '', '2024-04-18', '1999-07-22', NULL, 92344566780, 'female', 'WhatsApp Image 2023-10-26 at 14.54.58_0e711cb0.jpg', 'sig.jpg', 'ansu@kioskitech.com', NULL, NULL, NULL, NULL, NULL, 'Hsr Layout', 'Bangalore', 'Karnataka', 'Bengaluru Rural', 32767, 'hffgdfg', 'rtgrtg', 'hgywereyuky', 'dgnnbf', 32767, '2024-10-24 18:52:16', 'admin', '2024-10-24 18:52:16', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `emp_professional_data`
--

CREATE TABLE `emp_professional_data` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `basic_salary` int(11) DEFAULT NULL,
  `monthly_salary` int(11) DEFAULT NULL,
  `dearance_allowance` varchar(50) DEFAULT NULL,
  `speacial_allowance` varchar(50) DEFAULT NULL,
  `other_allowance` varchar(50) DEFAULT NULL,
  `professional_tax` varchar(50) DEFAULT NULL,
  `monthly_leave` tinyint(4) DEFAULT NULL,
  `yearly_leave` tinyint(4) DEFAULT NULL,
  `work_location` varchar(100) DEFAULT NULL,
  `reason_to_leave` varchar(300) DEFAULT NULL,
  `created_ts` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `last_updated_ts` datetime DEFAULT NULL,
  `last_updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_professional_data`
--

INSERT INTO `emp_professional_data` (`id`, `emp_id`, `designation`, `department`, `basic_salary`, `monthly_salary`, `dearance_allowance`, `speacial_allowance`, `other_allowance`, `professional_tax`, `monthly_leave`, `yearly_leave`, `work_location`, `reason_to_leave`, `created_ts`, `created_by`, `last_updated_ts`, `last_updated_by`) VALUES
(11, '100024', 'Bussiness Executive Developer', 'Sales', 9830, 20000, '439', '835', '334', '345', 4, 18, 'Bangalore', 'testing', '2024-09-27 11:30:37', 'admin', '2024-10-25 15:37:04', 'admin'),
(14, '100002', 'Software Developer', 'IT', 9800, 19000, '345', '280', '', '280', 1, 12, 'Manipal Center', NULL, '2024-10-25 14:56:56', 'admin', '2024-10-25 15:00:31', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `leave_form`
--

CREATE TABLE `leave_form` (
  `l_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `e_name` varchar(100) DEFAULT NULL,
  `leave_date_to` date DEFAULT NULL,
  `leave_date_from` date DEFAULT NULL,
  `leave_reason` varchar(400) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `created_ts` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `last_updated_ts` datetime NOT NULL,
  `last_updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_form`
--

INSERT INTO `leave_form` (`l_id`, `emp_id`, `e_name`, `leave_date_to`, `leave_date_from`, `leave_reason`, `status`, `created_ts`, `created_by`, `last_updated_ts`, `last_updated_by`) VALUES
(1, 100024, 'Ansu', '2024-10-01', '2024-10-04', 'For testing', NULL, '2024-09-30 16:28:33', 'ansu@kioskitech.com', '2024-09-30 16:28:33', 'ansu@kioskitech.com');

-- --------------------------------------------------------

--
-- Table structure for table `login_time`
--

CREATE TABLE `login_time` (
  `attadence_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `login_time` time DEFAULT NULL,
  `created_ts` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `last_updated_ts` datetime DEFAULT NULL,
  `last_updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_time`
--

INSERT INTO `login_time` (`attadence_id`, `emp_id`, `date`, `login_time`, `created_ts`, `created_by`, `last_updated_ts`, `last_updated_by`) VALUES
(1, 100024, '2024-10-01', '02:17:52', '2024-10-01 14:17:59', 'ansu@kioskitech.com', '2024-10-01 14:17:59', 'ansu@kioskitech.com'),
(2, 100024, '2024-10-25', '04:25:03', '2024-10-25 16:25:22', 'ansu@kioskitech.com', '2024-10-25 16:25:22', 'ansu@kioskitech.com');

-- --------------------------------------------------------

--
-- Table structure for table `makeattadence`
--

CREATE TABLE `makeattadence` (
  `attadence_id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `attadence` varchar(10) NOT NULL,
  `overtime` varchar(10) NOT NULL,
  `working_hour` int(11) NOT NULL,
  `date` date NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_ts` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `last_updated_ts` datetime NOT NULL,
  `last_updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `created_ts` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_ts` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`p_id`, `p_name`, `status`, `start`, `end`, `description`, `created_ts`, `created_by`, `updated_ts`, `updated_by`) VALUES
(4, 'bhodhi tree website', 'New', '2024-10-08', '2024-10-11', 'Micro site for the client', '2024-10-08 18:16:52', 'pankaj@gmail.com', '2024-10-08 18:16:52', 'pankaj@gmail.com'),
(5, '', 'Select the project s', '0000-00-00', '0000-00-00', '', '2024-10-24 12:16:14', 'pankaj@gmail.com', '2024-10-24 12:16:14', 'pankaj@gmail.com'),
(6, '', 'Select the project s', '0000-00-00', '0000-00-00', '', '2024-10-25 16:24:05', 'pankaj@gmail.com', '2024-10-25 16:24:05', 'pankaj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `project_assigned`
--

CREATE TABLE `project_assigned` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `reassigned_to` varchar(40) DEFAULT NULL,
  `created_ts` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `last_update_ts` datetime DEFAULT NULL,
  `last_updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_assigned`
--

INSERT INTO `project_assigned` (`id`, `p_id`, `emp_id`, `reassigned_to`, `created_ts`, `created_by`, `last_update_ts`, `last_updated_by`) VALUES
(16, 4, 100002, NULL, '2024-10-25 16:21:34', 'pankaj@gmail.com', '2024-10-25 16:21:34', 'pankaj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created_ts` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `last_updated_ts` datetime DEFAULT NULL,
  `last_updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `password`, `role`, `created_ts`, `created_by`, `last_updated_ts`, `last_updated_by`) VALUES
(1, 'pankaj@gmail.com', 'pankaj123', 'admin', '2024-09-25 15:31:17', 'pankaj@gmail.com', '2024-09-14 15:32:18', 'pankaj@gmail.com'),
(2, 'rohan@gmail.com', 'rohan123', 'empolyee', '2024-09-14 15:30:18', 'pankaj@gmail.com', '2024-09-14 15:30:18', 'pankaj@gmail.com'),
(3, 'ansu@kioskitech.com', 'Ansu@123', 'empolyee', '2024-09-27 11:45:24', 'pankaj@kioskitech.com', '2024-09-27 11:45:23', 'pankaj@kioskitech.com'),
(4, 'ansu@kioskitech.com', 'Ansu@123', 'Employee', '2024-10-24 18:52:16', 'admin', '2024-10-24 18:52:16', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_personal_data`
--
ALTER TABLE `emp_personal_data`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_professional_data`
--
ALTER TABLE `emp_professional_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_form`
--
ALTER TABLE `leave_form`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `login_time`
--
ALTER TABLE `login_time`
  ADD PRIMARY KEY (`attadence_id`);

--
-- Indexes for table `makeattadence`
--
ALTER TABLE `makeattadence`
  ADD PRIMARY KEY (`attadence_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `project_assigned`
--
ALTER TABLE `project_assigned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_personal_data`
--
ALTER TABLE `emp_personal_data`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100026;

--
-- AUTO_INCREMENT for table `emp_professional_data`
--
ALTER TABLE `emp_professional_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `leave_form`
--
ALTER TABLE `leave_form`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_time`
--
ALTER TABLE `login_time`
  MODIFY `attadence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `makeattadence`
--
ALTER TABLE `makeattadence`
  MODIFY `attadence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_assigned`
--
ALTER TABLE `project_assigned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
