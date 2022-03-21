-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 11:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `affiliate`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `campaign_id` int(11) NOT NULL,
  `campaign_name` varchar(100) NOT NULL,
  `campaign_price` float NOT NULL,
  `campaign_desc` text NOT NULL,
  `campaign_short_desc` text NOT NULL,
  `campaign_img` varchar(200) NOT NULL,
  `campaign_video` varchar(200) NOT NULL,
  `campaign_category` varchar(30) NOT NULL,
  `campaign_sub_category` text NOT NULL,
  `campaign_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refer`
--

CREATE TABLE `refer` (
  `ref_id` int(11) NOT NULL,
  `ref_user_email` varchar(30) NOT NULL,
  `ref_amount` float NOT NULL,
  `ref_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 3 COMMENT '1 => Admin, 2 => Employee, 3 => Affiliate',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `referal_code` varchar(30) NOT NULL,
  `user_code` varchar(30) NOT NULL,
  `referral_points` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL,
  `img` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `email`, `password`, `mobile`, `otp`, `referal_code`, `user_code`, `referral_points`, `status`, `img`, `created`) VALUES
(1, 3, 'amit ', 'solanki', 'abc1@gmail.com', '$2y$10$TG/yE1wKL4Kg6V97pxXOeetUWP2hMKf28NtgdrFWkctj4l6RpgW2a', 2147483647, '', 'P77jamYP', '5stYBzm0', 60, 0, '', '2022-03-20 12:38:40'),
(2, 3, 'amit ', 'solanki', 'a@gmail.com', '$2y$10$PjGSxpPRd5E5lneUa4bS7ee8u/JFytaY3J0KoVM1HxDw4Qn4Y4ywq', 2147483647, '', '', 'P77jamYP', 0, 0, '', '2022-03-20 12:41:18'),
(3, 3, 'amit', 'amit', 'a11@gmail.com', '$2y$10$gDVsh63T0FDrTpup5UoVs.dv2mEpZ3g96veZWxVWPnceqemMM/5/e', 2147483647, '', '', 'jj5mpu7', 0, 0, '', '2022-03-20 12:46:48'),
(4, 3, 'amit', 'amit', 'a111@gmail.com', '$2y$10$59M9n03Vretpm7lmNGTPFe4kfsMZiXPN7rUTkl5pLHt8U4A95aIsy', 9910628828, '', 'jj5mpu7', 'fOT6VVhn', 0, 0, '', '2022-03-20 12:51:08'),
(6, 3, 'amit', 'fdgfd', 'amit100lanki7011@gmail.com', '$2y$10$6yfYRMVFP0qgxA2JWhh0Oe1b/u43PnAjeROPdF1eqKF49cSUEu51u', 9910628828, '', '5stYBzm0', '0ljgMPHE', 0, 0, '', '2022-03-20 15:36:45'),
(7, 3, 'amit', 'fdgfd', 'amit10lanki7011@gmail.com', '$2y$10$nh.8rUEzqlt0ztiZBGLW4eHycCoG8KLwaXeFC2QWAOg5SuuxfocyK', 9910628828, '', '5stYBzm0', 'o4wjkyhL', 10, 0, '', '2022-03-20 15:41:48'),
(8, 3, 'ram ', 'shyam', 'ram@gmail.com', '$2y$10$qRa4zM5Huac3d7FP1tLtWOjpRKFqTUFiACAUXkAORyqrudesbVVDS', 9910628828, '', '5stYBzm0', '59VEP57', 60, 0, '', '2022-03-20 15:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `visted`
--

CREATE TABLE `visted` (
  `vist_id` int(11) NOT NULL,
  `vist_count` int(11) NOT NULL,
  `vist_location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`campaign_id`);

--
-- Indexes for table `refer`
--
ALTER TABLE `refer`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visted`
--
ALTER TABLE `visted`
  ADD PRIMARY KEY (`vist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refer`
--
ALTER TABLE `refer`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `visted`
--
ALTER TABLE `visted`
  MODIFY `vist_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
