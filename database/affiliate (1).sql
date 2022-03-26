-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 10:04 PM
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
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `short_desc` text NOT NULL,
  `blog_link` varchar(255) NOT NULL,
  `blog_category` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `short_desc`, `blog_link`, `blog_category`, `img`, `video`) VALUES
(1, 'test blog', 'test test                                                                                                                                                                                                                                                                                                                                                                                                                                    ', 'short description', 'hello', 'test 1111111', 'Screenshot (89).png', ''),
(2, 'test 1', 'sdfsf', 'fhgf', '', 'test', '645810324257_Screenshot (91).png', ''),
(3, 'test 2', 'test 4', 'this is a test blog', '', 'test', 'Screenshot (280).png', '');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `video` varchar(200) NOT NULL,
  `link` varchar(300) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `video`, `link`, `category_id`, `status`) VALUES
(1, 'game', 'Blessings of Baapu Full Video - Gagan Kokri Ft. Yograj Singh - Speed Records.mp4', 'http:www/gpg;efkld', 7, 'active'),
(6, 'test product', 'Blessings of Baapu Full Video - Gagan Kokri Ft. Yograj Singh - Speed Records.mp4', 'http:www/gpg;efklddsd/.com', 0, 'complete'),
(7, 'test', 'Ajj Marzi De Faisle Sunne Jatt Ne - Himant Sandhu - Dakuaan Da Munda -.mp4', 'djkfhsjk', 0, 'pending'),
(10, '', '', '', 0, 'active'),
(11, 'test campaign', '', 'http:www/gpg;efklddsd/.com/', 0, 'active'),
(12, 'test11', 'Ajj Marzi De Faisle Sunne Jatt Ne - Himant Sandhu - Dakuaan Da Munda -.mp4', '', 6, 'active'),
(13, 'dsfq', '', 'gfhgfh', 11, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_form`
--

CREATE TABLE `campaign_form` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(16) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created`) VALUES
(5, 'test1', '2022-03-25 16:46:48'),
(6, 'test 2', '2022-03-25 16:47:20'),
(7, 'game ', '2022-03-25 23:41:19'),
(11, 'finance', '2022-03-26 11:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `kyc_doc` varchar(30) NOT NULL,
  `kyc_status` tinyint(1) NOT NULL DEFAULT 0,
  `kcy_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1 => Admin, 2 => Affiliate',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `total_points` int(11) NOT NULL DEFAULT 0,
  `point_rate` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'pending',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `current_point` int(11) NOT NULL,
  `aadhar_no` varchar(20) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `aadhar_file` varchar(200) NOT NULL,
  `pan_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `email`, `mobile`, `otp`, `total_points`, `point_rate`, `status`, `created`, `current_point`, `aadhar_no`, `pan_no`, `aadhar_file`, `pan_file`) VALUES
(1, 2, 'amit ', 'solanki', 'abc1@gmail.com', 2147483647, '', 0, 0, 'complete', '2022-03-20 12:38:40', 0, '', '', '', ''),
(9, 1, 'admin', NULL, 'admin@gmail.com', 0, '', 0, 0, 'complete', '2022-03-21 21:56:36', 0, '', '', '', ''),
(14, 2, 'amit', 'amit', 'amit100lanki70122@gmail.com', 9910628828, '3623', 0, 0, 'pending', '2022-03-26 13:25:53', 0, '18272', '1123', '1.jpg', 'Screenshot (90).png');

-- --------------------------------------------------------

--
-- Table structure for table `user_campaign_histories`
--

CREATE TABLE `user_campaign_histories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `visit` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_form`
--
ALTER TABLE `campaign_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_campaign_histories`
--
ALTER TABLE `user_campaign_histories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `campaign_form`
--
ALTER TABLE `campaign_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_campaign_histories`
--
ALTER TABLE `user_campaign_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
