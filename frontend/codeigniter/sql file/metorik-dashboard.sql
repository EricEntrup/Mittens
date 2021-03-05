-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2020 at 05:02 PM
-- Server version: 5.7.28-0ubuntu0.19.04.2
-- PHP Version: 7.2.26-1+ubuntu19.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metorik-dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `service_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `price` double(20,4) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `category_id`, `service_id`, `user_id`, `price`, `name`, `email`, `contact_number`, `date`, `time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 1, NULL, 150.0000, 'Nik', 'nil@example.com', '458487456', '2020-03-10', '12:03:00', '2020-02-10 06:34:56', '2020-02-12 01:55:06', NULL),
(3, 1, 1, NULL, 150.0000, 'Vicky', 'vicky@example.com', '345345353', '2020-02-13', '02:00:00', '2020-02-10 23:55:51', '2020-02-12 01:49:13', NULL),
(4, 3, 13, NULL, 400.0000, 'Alex', 'alex@example.com', '6789323122', '2020-02-22', '10:00:00', '2020-02-12 02:37:02', '2020-02-12 02:37:02', NULL),
(5, 2, 7, 3, 1500.0000, NULL, NULL, NULL, '2020-04-09', '13:30:00', '2020-02-12 02:38:31', '2020-02-12 02:38:31', NULL),
(6, 3, 11, NULL, 2000.0000, 'Johnny', 'johnny@example.com', '9876543215', '2020-02-03', '07:25:00', '2020-02-12 02:36:04', '2020-02-12 02:41:28', NULL),
(7, 1, 3, 3, 200.0000, NULL, NULL, NULL, '2020-03-15', '12:30:00', '2020-02-12 02:41:23', '2020-02-12 02:41:57', NULL),
(9, 1, 3, NULL, 200.0000, 'Anna', 'anna@example.com', '434345566', '2020-03-26', '08:33:00', '2020-02-12 03:04:49', '2020-02-12 03:05:07', NULL),
(10, 3, 14, NULL, 1500.0000, 'Carl Price', 'carl@exmple.in', '56789023', '2020-03-01', '08:00:00', '2020-02-12 03:25:02', '2020-02-12 03:25:02', NULL),
(11, 3, 11, NULL, 2000.0000, 'Mark Lucas', 'marklucas@example.com', '344556672', '2020-03-22', '10:45:00', '2020-02-12 03:26:45', '2020-02-12 03:27:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT NULL,
  `sequence` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `title`, `color`, `status`, `sequence`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Todo', '#65ccf7', 1, 1, NULL, '2020-02-12 23:46:54', NULL),
(2, 'Planning', '#827af3', 1, 2, '2020-02-11 06:40:23', '2020-02-12 23:46:54', NULL),
(3, 'Working', '#3dbb58', 1, 3, '2020-02-11 22:15:55', '2020-02-12 23:46:54', NULL),
(4, 'Complete', '#fbc647', 1, 4, '2020-02-12 04:52:30', '2020-02-12 23:46:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `board_task`
--

CREATE TABLE `board_task` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `board_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `board_task`
--

INSERT INTO `board_task` (`id`, `board_id`, `name`, `description`, `priority`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Contact with john', 'Contact with jones for new project', '2', '2020-02-13', '2020-02-11 05:55:31', '2020-02-12 23:53:10', NULL),
(2, 2, 'Presentations', 'New project\'s presentations', '2', '2020-02-13', '2020-02-11 06:40:48', '2020-02-12 23:53:08', NULL),
(3, 1, 'Assign Project', 'Assign new  project to Emma', '3', '2020-02-19', '2020-02-11 22:32:18', '2020-02-12 23:53:00', NULL),
(4, 2, 'Meeting', 'Discuss point of new project', '1', '2020-02-26', '2020-02-12 00:03:24', '2020-02-12 07:14:55', NULL),
(5, 3, 'Product Campaign', 'Marketing Strategy , Planning , Discussion', '3', '2020-02-12', '2020-02-12 04:48:29', '2020-02-12 04:51:10', NULL),
(6, 4, 'Meeting', 'Meeting with Mr Alex about new project', '1', '2020-02-13', '2020-02-12 04:57:31', '2020-02-12 07:15:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Salon', 1, '#0a0c0a', '2020-02-12 06:09:22', '2020-02-12 00:47:43', NULL),
(2, 'Dental Clinic', 1, '#90acac', '2020-02-12 00:47:22', '2020-02-12 00:51:54', NULL),
(3, 'Cleaning', 1, '#00d0ff', '2020-02-12 01:18:51', '2020-02-12 01:18:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission_roles`
--

CREATE TABLE `permission_roles` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE `roles_users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `label`, `category_id`, `status`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Boy Hair Cut', NULL, 1, 1, 150, '2020-02-10 06:30:23', '2020-02-12 00:57:17', NULL),
(2, 'Orthodontics', NULL, 2, 1, 2500, '2020-02-10 06:30:38', '2020-02-12 00:52:20', NULL),
(3, 'Girl Hair Cut', NULL, 1, 1, 200, '2020-02-12 00:56:28', '2020-02-12 00:56:28', NULL),
(4, 'Beard trim', NULL, 1, 1, 100, '2020-02-12 00:56:58', '2020-02-12 00:56:58', NULL),
(5, 'Teeth cleaning and Polishing', NULL, 2, 1, 999, '2020-02-12 00:59:14', '2020-02-12 00:59:14', NULL),
(6, 'Tooth Extraction', NULL, 2, 1, 1500, '2020-02-12 01:00:13', '2020-02-12 01:00:13', NULL),
(7, 'Root canal treatment - front teeth', NULL, 2, 1, 1500, '2020-02-12 01:02:30', '2020-02-12 01:03:12', NULL),
(8, 'Root canal treatment - back teeth', NULL, 2, 1, 2000, '2020-02-12 01:02:55', '2020-02-12 01:02:55', NULL),
(9, 'Tooth Extraction - Regular', NULL, 2, 1, 550, '2020-02-12 01:04:33', '2020-02-12 01:04:33', NULL),
(10, 'Curtains', NULL, 3, 1, 120, '2020-02-12 01:28:47', '2020-02-12 01:28:47', NULL),
(11, 'Leather Sofa', NULL, 3, 1, 2000, '2020-02-12 01:56:09', '2020-02-12 01:56:09', NULL),
(12, 'Carpet Shampooing', NULL, 3, 1, 750, '2020-02-12 01:56:43', '2020-02-12 01:56:43', NULL),
(13, 'Mattress Shampooing', NULL, 3, 1, 400, '2020-02-12 01:57:17', '2020-02-12 01:57:17', NULL),
(14, 'Kichen , Bathrooms', NULL, 3, 1, 1500, '2020-02-12 03:23:57', '2020-02-12 03:23:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `contact_number` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `gender` varchar(5) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `modified`, `last_login`, `created`, `user_type`, `contact_number`, `address`, `profile_image`, `gender`) VALUES
(1, 'admin', '$2a$08$XZJGTIxzgK54dJvxFzOEIeuHjTPZwKSpOgzaHfFEtNaFjDMB1OAgu', 'admin@admin.com', 1, 0, NULL, NULL, NULL, NULL, '982bebf97a4b113a41e9a2d4ac6f3d21', '127.0.0.1', '2020-02-18 02:35:17', '2020-02-18 13:35:17', '2020-02-06 10:13:21', 'admin', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board_task`
--
ALTER TABLE `board_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `board_task`
--
ALTER TABLE `board_task`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
