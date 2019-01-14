-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 11:49 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saai_holidays`
--

-- --------------------------------------------------------

--
-- Table structure for table `saai_adminusers`
--

CREATE TABLE `saai_adminusers` (
  `adminuser_id` int(10) NOT NULL COMMENT 'Unique identification of admin user',
  `adminuser_username` varchar(150) NOT NULL COMMENT 'Stores the username of admin user',
  `adminuser_password` varchar(150) NOT NULL COMMENT 'Stores the password of admin user',
  `adminuser_email` varchar(150) NOT NULL COMMENT 'Stores the email of admin user',
  `adminuser_mobile` bigint(15) NOT NULL COMMENT 'Stores the mobile number of admin user',
  `adminuser_is_superuser` tinyint(1) NOT NULL COMMENT 'Stores whether the admin user is superuser or not',
  `adminuser_status` tinyint(1) NOT NULL COMMENT 'Stores the status of admin user whether active or inactive',
  `adminuser_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of admin user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saai_adminusers`
--

INSERT INTO `saai_adminusers` (`adminuser_id`, `adminuser_username`, `adminuser_password`, `adminuser_email`, `adminuser_mobile`, `adminuser_is_superuser`, `adminuser_status`, `adminuser_create_date`) VALUES
(1, 'admin', 'admin@123', 'senthilvelan@zoho.com', 7418519514, 1, 1, '2016-09-30 07:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `saai_end_users`
--

CREATE TABLE `saai_end_users` (
  `user_id` int(10) NOT NULL,
  `user_reg_by` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `user_mobile` bigint(15) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_dob` date NOT NULL,
  `user_package` varchar(100) NOT NULL,
  `users_count` int(100) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saai_users`
--

CREATE TABLE `saai_users` (
  `user_id` int(10) NOT NULL,
  `user_reg_by` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `user_mobile` bigint(15) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_dob` date NOT NULL,
  `user_package` varchar(100) NOT NULL,
  `users_count` int(100) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `unique_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saai_users`
--

INSERT INTO `saai_users` (`user_id`, `user_reg_by`, `first_name`, `user_mobile`, `user_email`, `user_password`, `user_dob`, `user_package`, `users_count`, `user_status`, `user_createddate`, `unique_id`) VALUES
(1, 'admin', 'anand', 9944919023, 'anans.09@gmail.com', 'UY9XLZlf', '2017-11-22', '4', 0, 1, '2017-11-22 13:31:37', 'Saai_1'),
(2, 'admin', 'anand', 9944919023, 'anans.09@gmail.com', '2OzTwjF6', '2017-10-12', '8', 0, 1, '2017-11-23 04:29:06', 'Saai_2'),
(3, 'admin', 'anand', 9944919023, 'anand@etekchnoservices.com', 'X6mNwZBA', '2017-11-23', '5', 0, 1, '2017-11-23 04:29:20', 'Saai_3'),
(4, 'admin', 'anand', 9944919023, 'anans.09@gmail.com', '4OQqBMK7', '2017-11-23', '8', 0, 1, '2017-11-23 04:30:33', 'Saai_4'),
(5, 'admin', 'anand', 9944919023, 'anans.09@gmail.com', 'FiR7VLUo', '2017-11-15', '4', 0, 1, '2017-11-23 04:32:40', 'Saai_5'),
(6, '5', 'anand', 9944919023, 'anans.09@gmail.com', 'A0WxbiNt', '2017-12-20', '3', 0, 1, '2017-12-20 07:26:16', 'Saai_6'),
(7, '5', 'anand', 9944919023, 'anans.09@gmail.com', 'NVoqPTl9', '2017-12-20', '3', 0, 1, '2017-12-20 07:27:21', 'Saai_7'),
(8, 'admin', 'anand', 9944919023, 'anans.09@gmail.com', 'DG59Bn4W', '2017-12-20', '1', 0, 1, '2017-12-20 07:38:22', 'Saai_8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `saai_end_users`
--
ALTER TABLE `saai_end_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `saai_users`
--
ALTER TABLE `saai_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `saai_end_users`
--
ALTER TABLE `saai_end_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saai_users`
--
ALTER TABLE `saai_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
