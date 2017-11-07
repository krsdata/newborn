-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2017 at 12:55 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.23-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yellotasker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `name`) VALUES
(1, 'admin@admin.com', '$2y$10$G8ILTi8Gmte4Te51RNAj2OiQ2zI5H3SNUfypMHV/MYoAe7J1v8XJ2', 'sE8GA2BgaIluQosd23UKZz91tyCkCBib9LoEK5VcDwHZqyxf9unoRQRzPOfK', NULL, '2017-10-12 15:19:16', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `photo` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_group_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_group_image` text COLLATE utf8_unicode_ci,
  `category_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `parent_id` int(11) DEFAULT NULL,
  `level` int(10) UNSIGNED DEFAULT '1',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `category_name`, `category_group_name`, `category_group_image`, `category_image`, `description`, `parent_id`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'abc', 'abc-g1', 'abc-g1', '1500123991s3.png', NULL, '', 0, 1, 1, '2017-07-12 16:00:20', '2017-07-16 05:59:37'),
(7, NULL, 'kandy2', 'sub-cat1', 'abc-1', '1500123991s3.png', '1500136292s4.png', '', 1, 2, 1, '2017-07-15 11:01:32', '2017-07-16 06:29:24'),
(9, NULL, '', 'sub-cat2', 'abc-1', '1500123991s3.png', '1500137558s3.png', '', 1, 2, 1, '2017-07-15 11:22:38', '2017-07-15 11:22:38'),
(10, NULL, '', 'sub-cat11', 'abc-2', '1500123991s3.png', '1500206522s1.png', '', 1, 2, 1, '2017-07-16 06:32:02', '2017-07-16 06:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoryDashboard`
--

CREATE TABLE `categoryDashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `display_order` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoryDashboard`
--

INSERT INTO `categoryDashboard` (`id`, `name`, `display_order`, `category_id`, `created_at`, `updated_at`) VALUES
(30, 'sub-cat1', 1, 7, '2017-10-29 03:36:47', '2017-10-29 03:36:47'),
(31, 'sub-cat2', 2, 9, '2017-10-29 03:36:47', '2017-10-29 03:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `categoryId` int(10) UNSIGNED DEFAULT NULL,
  `categoryName` text,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `address` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `position`, `firstName`, `lastName`, `email`, `mobile`, `phone`, `categoryId`, `categoryName`, `user_id`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Mr.', 'fdsf', 'kundan', 'roy', 'kroy.webxpert@gmail.com', NULL, '8103194076', NULL, '1,7', NULL, 'Indore\r\nmp', '2017-09-07 15:55:07', '2017-10-13 19:45:40'),
(3, 'Mr.', 'sfdsf', 'k3', 'roy3', 'kroy.webxpert@gmail.com', NULL, '8103194076', NULL, NULL, NULL, 'gfhfgh', NULL, '2017-10-17 22:36:42'),
(5, 'Mrs.', 'sfdsf', 'kundan', 'roy', 'kroy.webxpert@gmail.com', NULL, '8103194076', NULL, NULL, NULL, 'indore', '2017-10-08 13:21:56', '2017-10-08 13:26:46'),
(6, 'Mr.', '', 'kundan', 'roy', 'kroy.webxpert@gmail.com', NULL, '8103194076', NULL, '1', NULL, 'indore', '2017-10-13 16:01:36', '2017-10-13 16:03:49'),
(7, 'Miss', 's', 'kanika3', 's', 'kroy.webxpert@gmail.com', NULL, '24', NULL, '1', NULL, 'indore', '2017-10-13 16:14:16', '2017-10-13 16:14:44'),
(8, 'Mr.', '', 'kundan', 'roy', 'kroy.webxpert@gmail.com', NULL, '8103194076', NULL, '1,7,9,10', NULL, 'indore', '2017-10-13 17:22:09', '2017-10-13 17:22:09'),
(9, 'Mrs.', '', 'kundan', 'roy', 'kroy.webxpert@gmail.com', NULL, '8103194076', NULL, '1', NULL, 'indore', '2017-10-13 19:31:16', '2017-10-13 19:31:16'),
(10, 'Mrs.', '', 'kundan', 'roy', 'kroy.webxpert@gmail.com', NULL, '8103194076', NULL, '1,7,9,10', NULL, 'indore', '2017-10-13 19:46:10', '2017-10-13 19:46:21'),
(11, 'mr', 'deve', NULL, NULL, 'kroy@gmail.com', '8908989', '89890809', NULL, NULL, NULL, 'indore', '2017-10-14 17:16:52', '2017-10-14 17:16:52'),
(12, 'mr', 'deve', NULL, NULL, 'kroy@gmail.com', '8908989', '89890809', NULL, NULL, NULL, 'indore', '2017-10-14 17:18:06', '2017-10-14 17:18:06'),
(13, 'mr', 'deve', NULL, NULL, 'kroy@gmail.com', '8908989', '89890809', NULL, NULL, NULL, 'indore', '2017-10-14 17:19:05', '2017-10-14 17:19:05'),
(14, 'mr', 'deve', NULL, NULL, 'kroy@gmail.com', '8908989', '89890809', NULL, NULL, NULL, 'indore', '2017-10-14 17:19:22', '2017-10-14 17:19:22'),
(15, 'mr', 'deve', NULL, NULL, 'kroy@gmail.com', '8908989', '89890809', NULL, NULL, NULL, 'indore', '2017-10-14 17:19:41', '2017-10-14 17:19:41'),
(16, 'mr', 'deve', NULL, NULL, 'kroy@gmail.com', '8908989', '89890809', NULL, NULL, NULL, 'indore', '2017-10-14 17:21:48', '2017-10-14 17:21:48'),
(17, 'mr', 'deve', NULL, NULL, 'kroy@gmail.com', '8908989', '89890809', NULL, NULL, NULL, 'indore', '2017-10-14 17:21:55', '2017-10-14 17:21:55'),
(18, 'mr', 'deve', NULL, NULL, 'kroy@gmail.com', '8908989', '89890809', NULL, NULL, NULL, 'indore', '2017-10-14 17:22:12', '2017-10-14 17:22:12'),
(19, 'mr', 'deve', NULL, NULL, 'kroy@gmail.com', '8908989', '89890809', NULL, NULL, NULL, 'indore', '2017-10-14 17:23:39', '2017-10-14 17:23:39'),
(20, 'mr', 'deve', NULL, NULL, 'kroy@gmail.com', '8908989', '89890809', NULL, NULL, NULL, 'indore', '2017-10-14 17:23:47', '2017-10-14 17:23:47'),
(25, 'mr', 'deve', NULL, NULL, 'kroy@gmail.com', '8908989', '89890809', NULL, NULL, NULL, 'indore', '2017-10-14 17:42:48', '2017-10-14 17:42:48'),
(26, 'Mr.', 'deve', 'k2', '', 'kroy@gmail.com', '8908989', '89890809', NULL, '1,7', NULL, 'indore', '2017-10-14 17:43:27', '2017-10-14 18:07:16'),
(33, 'Mr.', 'deve', 'k1', '', 'kroy@gmail.com', '8908989', '89890809', NULL, '1', NULL, 'indore', '2017-10-14 17:58:09', '2017-10-14 18:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `contact_fields`
--

CREATE TABLE `contact_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `contactId` int(10) UNSIGNED DEFAULT NULL,
  `fieldKey` varchar(255) DEFAULT NULL,
  `fieldValue` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_groups`
--

CREATE TABLE `contact_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `groupName` varchar(255) DEFAULT NULL,
  `groupCategory` varchar(255) DEFAULT NULL,
  `contactId` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_groups`
--

INSERT INTO `contact_groups` (`id`, `groupName`, `groupCategory`, `contactId`, `parent_id`, `email`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(4, 'grp1', NULL, 1, 0, 'rbsartistry@infowayindia.in', 'Anand Dubey', NULL, '2017-10-07 04:34:23', '2017-10-11 06:39:08'),
(7, 'grp1', NULL, 7, 4, NULL, 'safsa', NULL, '2017-10-07 04:34:23', '2017-10-17 18:22:12'),
(8, 'group2', NULL, NULL, 0, NULL, NULL, NULL, '2017-10-07 06:08:29', '2017-10-07 06:08:29'),
(9, 'group2', NULL, 1, 8, 'rbsartistry@infowayindia.in', 'Anand Dubey', NULL, '2017-10-07 06:08:30', '2017-10-07 06:08:30'),
(10, 'group2', NULL, 2, 8, 'varun@gmail.com', 'varun2', NULL, '2017-10-07 06:08:30', '2017-10-07 06:08:30'),
(11, 'tess', NULL, NULL, 0, NULL, NULL, NULL, '2017-10-13 17:32:32', '2017-10-13 17:32:32'),
(12, 'tess', NULL, 8, 11, 'kroy.webxpert@gmail.com', NULL, NULL, '2017-10-13 17:32:32', '2017-10-13 17:32:32'),
(13, 'dsd', NULL, NULL, 0, NULL, NULL, NULL, '2017-10-13 17:34:03', '2017-10-13 17:34:03'),
(14, 'dsd', NULL, 8, 13, 'kroy.webxpert@gmail.com', NULL, NULL, '2017-10-13 17:34:04', '2017-10-13 17:34:04'),
(15, 'sdsd', NULL, NULL, 0, NULL, NULL, NULL, '2017-10-13 17:34:27', '2017-10-13 17:34:27'),
(16, 'sdsd', NULL, 8, 15, 'kroy.webxpert@gmail.com', NULL, NULL, '2017-10-13 17:34:28', '2017-10-13 17:34:28'),
(21, 'xzzc', NULL, NULL, 0, NULL, NULL, NULL, '2017-10-13 17:37:57', '2017-10-13 17:37:57'),
(22, 'xzzc', NULL, 6, 21, 'kroy.webxpert@gmail.com', NULL, NULL, '2017-10-13 17:37:58', '2017-10-13 17:37:58'),
(46, 'grp1', NULL, 1, 4, NULL, NULL, NULL, '2017-10-17 18:31:02', '2017-10-17 18:31:02'),
(48, 'xzzc', NULL, 3, 21, NULL, NULL, NULL, '2017-10-17 18:32:40', '2017-10-17 18:32:40'),
(49, 'xzzc', NULL, 1, 21, NULL, NULL, NULL, '2017-10-17 18:33:25', '2017-10-17 18:33:25'),
(50, 'xzzc', NULL, 5, 21, NULL, NULL, NULL, '2017-10-17 18:34:33', '2017-10-17 18:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `customer_supports`
--

CREATE TABLE `customer_supports` (
  `id` int(10) NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `support_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `support_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `support_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `email_message_history`
--

CREATE TABLE `email_message_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `groupId` int(10) UNSIGNED DEFAULT NULL,
  `contactId` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `subject` text,
  `senderEmail` varchar(255) DEFAULT NULL,
  `recieverEmail` varchar(255) DEFAULT NULL,
  `senderPhone` varchar(255) DEFAULT NULL,
  `recieverPhone` varchar(255) DEFAULT NULL,
  `content` text,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2017_03_12_221035_create_admin_table', 1),
('2017_03_12_221035_create_assignments_table', 1),
('2017_03_12_221035_create_courses_table', 1),
('2017_03_12_221035_create_password_resets_table', 1),
('2017_03_12_221035_create_permission_role_table', 1),
('2017_03_12_221035_create_permissions_table', 1),
('2017_03_12_221035_create_professor_profiles_table', 1),
('2017_03_12_221035_create_role_user_table', 1),
('2017_03_12_221035_create_roles_table', 1),
('2017_03_12_221035_create_student_courses_table', 1),
('2017_03_12_221035_create_student_profiles_table', 1),
('2017_03_12_221035_create_users_table', 1),
('2017_03_12_221037_add_foreign_keys_to_assignments_table', 1),
('2017_03_12_221037_add_foreign_keys_to_courses_table', 1),
('2017_03_12_221037_add_foreign_keys_to_permission_role_table', 1),
('2017_03_12_221037_add_foreign_keys_to_professor_profiles_table', 1),
('2017_03_12_221037_add_foreign_keys_to_role_user_table', 1),
('2017_03_12_221037_add_foreign_keys_to_student_courses_table', 1),
('2017_03_12_221037_add_foreign_keys_to_student_profiles_table', 1),
('2017_03_18_071810_add_column_to_courses_table', 2),
('2017_03_18_072721_add_column_to_assignments_table', 2),
('2017_03_18_194033_create_syllabus_table', 2),
('2017_03_26_063346_update_email_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `page_content` text,
  `creeated_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tasks`
--

CREATE TABLE `post_tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locationType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeOfPeople` text COLLATE utf8_unicode_ci,
  `totalAmount` float(10,2) DEFAULT '0.00',
  `hourlyRate` float(10,2) DEFAULT '0.00',
  `totalHours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `peopleRequired` int(11) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `budgetType` mediumtext COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_tasks`
--

INSERT INTO `post_tasks` (`id`, `title`, `description`, `locationType`, `address`, `zipcode`, `typeOfPeople`, `totalAmount`, `hourlyRate`, `totalHours`, `userId`, `dueDate`, `peopleRequired`, `budget`, `budgetType`, `status`, `created_at`, `updated_at`) VALUES
(2, 'k', 'dasd', '0', '0', '0', '0', 0.00, 0.00, '0', 68, '2017-09-28', 1, 10, 'ssfdf', '0', '2017-10-27 19:28:42', '2017-09-27 15:29:42'),
(3, NULL, 'dasd', '0', '0', '0', '0', 0.00, 0.00, '0', 68, '2017-09-27', 1, 10, 'ssfdf', '0', '2017-10-29 13:38:04', '2017-09-27 15:29:59'),
(4, 'sadasdsadasd', 'dasd', '0', '0', '0', '0', 0.00, 0.00, '0', 68, '2017-09-26', 1, 10, 'ssfdf', 'open', '2017-10-29 13:38:09', '2017-09-27 15:30:23'),
(5, 'abc', 'desc', 'loc', 'add', '45112', '1', 100.00, 5.00, '2', 2, '2025-12-17', NULL, 100, 'abc', '1', '2017-10-27 14:07:51', '2017-10-27 14:07:51'),
(6, 'test', 'desc', 'remote', 'indore', '452001', '1', 100.00, 5.00, '2', 2, '2025-12-19', NULL, 100, 'abc', 'open', '2017-10-29 13:38:16', '2017-10-27 15:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_category` int(10) UNSIGNED DEFAULT NULL,
  `product_sub_category` int(10) UNSIGNED DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `qty` int(10) UNSIGNED DEFAULT '1',
  `discount` float(10,2) NOT NULL DEFAULT '0.00',
  `description` mediumtext COLLATE utf8_unicode_ci,
  `photo` mediumtext COLLATE utf8_unicode_ci,
  `product_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `validity` int(10) UNSIGNED DEFAULT NULL,
  `product_key_id` int(10) UNSIGNED DEFAULT NULL,
  `total_stocks` int(10) UNSIGNED DEFAULT NULL,
  `available_stocks` int(10) UNSIGNED DEFAULT NULL,
  `views` int(10) UNSIGNED DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `programms`
--

CREATE TABLE `programms` (
  `id` int(10) UNSIGNED NOT NULL,
  `program_name` varchar(255) DEFAULT NULL,
  `description` text,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `target_users` varchar(255) DEFAULT NULL,
  `complete_task` int(10) DEFAULT NULL,
  `reward_point` float DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programms`
--

INSERT INTO `programms` (`id`, `program_name`, `description`, `start_date`, `end_date`, `target_users`, `complete_task`, `reward_point`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'sdfsfdsf', 'dfdsfds', '02/10/2017', '11/10/2017', 'last_15_days', 0, 0, NULL, '2017-09-25 18:30:00', '2017-10-01 10:31:10'),
(3, 'program1', 'desc', '01/10/2017', '30/10/2017', 'last_30_days', 1, 2, NULL, '2017-10-01 10:30:23', '2017-10-01 10:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `field_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `field_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `support_type` varchar(255) DEFAULT NULL,
  `subject` tinytext,
  `description` text,
  `ticket_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_key_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `coupan_id` int(11) UNSIGNED DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_price` float(10,2) DEFAULT NULL,
  `discount_price` float(10,2) DEFAULT '0.00',
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_details` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `phone`, `role_type`, `email`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(53, NULL, NULL, 'kkrr', '3432432', NULL, 'admin@admin.com', '$2y$10$tbp3e6ekaJ5Ghdi/zYCcGunMWfEn4R/IE4JbrbqqOrFUhPbKiDOvK', NULL, 1, '2017-07-11 14:37:38', '2017-10-08 13:36:49'),
(55, 'kandy', NULL, 'kk', '5434543', '1', 'kroy@mailinator.com', '$2y$10$eKzyFWR1EKF18FdH2jvkXuUiifiivJ2eA5ojP9Yht7NHpuECu34dS', NULL, 1, '2017-07-11 15:34:06', '2017-10-08 13:36:42'),
(65, 'kandy', 'roy', 'kundan roy', '8103194076', '', 'kroy.webxpert@gmail.com', '$2y$10$BQLhriXxC7vmBuxpCBJGz.C40SrOtfXBG/jU3ZMPVlIlHFDgaxdVO', NULL, 1, '2017-09-22 11:21:46', '2017-10-08 13:33:02'),
(70, NULL, NULL, 'sdfds', '8103194076', '1', 'kroy.webxddpert@gmail.com', '$2y$10$YfzSndUHAw5yx1P3M5ye3.rKpM25jAOH2ik01kAlN0N70RV43tQQm', NULL, 1, '2017-10-06 16:42:55', '2017-10-08 13:32:52'),
(71, NULL, NULL, NULL, NULL, '', 'kroy.iips@gmail.com', '$2y$10$ABa8..BlZZEAzDegqKfAgu5OWfuTRL/F7kGuy0kSwcs9MLUFmSIzC', NULL, 1, '2017-10-14 04:29:13', '2017-10-14 04:29:13'),
(72, NULL, NULL, NULL, NULL, '', 'kroy.45@gmail.com', '$2y$10$y6cCcKsdKR8/P/VG4gJtCOP8WBEsR7oQsppbovTVpNKGCmCIF.JvO', NULL, 1, '2017-10-14 04:37:02', '2017-10-14 04:37:02'),
(73, 'abc', NULL, NULL, NULL, '', 'kroy.456@gmail.com', '$2y$10$3lRhiHwH4J2isNwSMlAwU.ieucq.2u8FJAwsDeGOwOC8yEDvE1kgm', NULL, 1, '2017-10-14 04:37:28', '2017-10-14 04:37:28'),
(74, 'abc', NULL, NULL, NULL, '', 'kroy.4546@gmail.com', '$2y$10$4zcjlGoudcvsNh34GNxki.BP76.P7OZkNUeFiXMo8qZSWenOvxgLu', NULL, 1, '2017-10-14 04:38:11', '2017-10-14 04:38:11'),
(75, 'abc', NULL, NULL, NULL, '', 'kroy.45445@gmail.com', '$2y$10$rFycXa5SVRPek2Qv7ADy7OfpSLNlMPXkFYIGqPU.BCID38cvmNhSm', NULL, 1, '2017-10-14 04:42:34', '2017-10-14 04:42:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoryDashboard`
--
ALTER TABLE `categoryDashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_fields`
--
ALTER TABLE `contact_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contactId`),
  ADD KEY `contact_id_2` (`contactId`);

--
-- Indexes for table `contact_groups`
--
ALTER TABLE `contact_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_message_history`
--
ALTER TABLE `email_message_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `post_tasks`
--
ALTER TABLE `post_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programms`
--
ALTER TABLE `programms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categoryDashboard`
--
ALTER TABLE `categoryDashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `contact_fields`
--
ALTER TABLE `contact_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_groups`
--
ALTER TABLE `contact_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `email_message_history`
--
ALTER TABLE `email_message_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_tasks`
--
ALTER TABLE `post_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `programms`
--
ALTER TABLE `programms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_fields`
--
ALTER TABLE `contact_fields`
  ADD CONSTRAINT `contact_fields_ibfk_1` FOREIGN KEY (`contactId`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
