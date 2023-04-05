-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 05:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syspexshwe_v8_now_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountings`
--

CREATE TABLE `accountings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` int(11) NOT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `general_project_flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accountings`
--

INSERT INTO `accountings` (`id`, `account_code`, `account_name`, `account_type`, `project_id`, `amount`, `created_at`, `updated_at`, `general_project_flag`) VALUES
(24, 'rev_001', 'Rev001', 6, 10, 100, '2022-03-02 10:40:18', '2022-03-02 10:40:18', 1),
(25, 'rece_001', 'Rece001', 7, 10, -5900, '2022-03-02 10:40:19', '2022-03-02 12:48:16', 1),
(26, 'exp_001', 'Exp001', 10, 10, 0, '2022-03-02 10:40:19', '2022-03-02 10:40:19', 1),
(27, 'pay_001', 'Pay001', 9, 10, 50, '2022-03-02 10:40:19', '2022-03-02 10:40:19', 1),
(30, 'f445', 'A1', 8, 10, 5000, '2022-03-03 13:13:16', '2022-03-04 06:10:08', 1),
(31, '0001', 'A4', 4, NULL, 42000, '2022-03-03 16:27:19', '2022-03-05 08:18:53', 0),
(37, '2531', 'petty', 3, NULL, 10000, NULL, NULL, 0),
(38, 'MS-001', 'main_sale', 3, NULL, 7000, NULL, '2022-03-04 06:02:44', 0),
(39, 'A001', 'Account1', 8, 10, 1000, '2022-03-04 12:02:08', '2022-03-04 12:09:54', 0),
(40, '0004', 'A7', 4, NULL, 27000, '2022-03-05 06:04:59', '2022-03-05 08:18:53', 0),
(45, 'A-1113', 'Account-Twelve', 12, NULL, 42833, NULL, '2022-03-06 19:40:08', 0),
(63, 'A-0111', 'fix_account_tripleone', 11, NULL, 108333, '2022-03-06 19:19:14', '2022-03-06 19:19:32', 0),
(64, 'A-0101', 'fix_account_one', 1, NULL, 341666, '2022-03-06 19:25:14', '2022-03-06 19:38:21', 0),
(65, 'A-0101', 'fix_account_one', 11, NULL, 158334, '2022-03-06 19:25:14', '2022-03-06 19:38:21', 0),
(66, 'A-0103', 'fix_account_three', 1, NULL, 51667, '2022-03-06 19:39:47', '2022-03-06 19:40:08', 0),
(67, 'A-0103', 'fix_account_three', 11, NULL, 8333, '2022-03-06 19:39:47', '2022-03-06 19:40:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accounting_types`
--

CREATE TABLE `accounting_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounting_types`
--

INSERT INTO `accounting_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Fixed-Asset', NULL, NULL),
(2, 'Current-Asset', NULL, NULL),
(3, 'Cash', NULL, NULL),
(4, 'Bank', NULL, NULL),
(5, 'Cash-In-Hand', NULL, NULL),
(6, 'Revenue', NULL, NULL),
(7, 'Receiveable', NULL, NULL),
(8, 'Expense', NULL, NULL),
(9, 'Payable', NULL, NULL),
(10, 'COGS', NULL, NULL),
(11, 'Accumulated Depriciation', NULL, NULL),
(12, 'Expense Depreciation', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `description`, `short_description`, `photo_path`, `expired_at`, `created_at`, `updated_at`, `start_date`, `package_id`) VALUES
(4, 'aaavvv', 'For  this month', 'lkj', '1624946626-Screenshot_20210129_160054.png', '2021-07-06 00:00:00', '2021-06-29 06:03:46', '2021-06-29 06:03:46', '2021-06-29', NULL),
(5, '12', '12', 'kl;', 'default.png', '2021-07-07 00:00:00', '2021-06-30 06:35:58', '2021-06-30 06:35:58', '2021-06-30', NULL),
(6, 'sdf', 'sdf', 'kl', 'default.png', '2021-07-07 00:00:00', '2021-06-30 06:41:45', '2021-06-30 06:41:45', '2021-06-30', NULL),
(7, 'sfd', 'sdf', 'kl', 'default.png', '2021-07-07 00:00:00', '2021-06-30 08:13:41', '2021-06-30 08:13:41', '2021-06-30', 19),
(8, 'adver1', 'sdf', 'kl;', 'default.png', '2021-07-12 00:00:00', '2021-07-05 09:14:09', '2021-07-05 09:14:09', '2021-07-05', 20),
(9, 'Adv for package', 'long', 'short', 'default.png', '2021-07-12 00:00:00', '2021-07-05 10:14:30', '2021-07-05 10:14:30', '2021-07-05', 21),
(10, 'sdf test', 'long', 'short', 'default.png', '2021-07-12 00:00:00', '2021-07-05 10:21:06', '2021-07-05 10:21:06', '2021-07-05', 22);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_status` tinyint(1) NOT NULL,
  `expired_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `description`, `short_description`, `photo_path`, `slide_status`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 'Announcement title one', 'Announcement description onw', 'short de', '1622693425-doctor-visit.jpg', 0, '2022-06-03 00:00:00', '2021-06-03 04:10:25', '2021-06-03 04:10:25'),
(2, 'Announcement title two', 'Announcement description onw', 'short de', '1622693425-doctor-visit.jpg', 0, '2022-06-03 00:00:00', '2021-06-03 04:10:25', '2021-06-03 04:10:25'),
(3, 'Announcement title three', 'Announcement description onw', 'short de', '1622693425-doctor-visit.jpg', 0, '2022-06-03 00:00:00', '2021-06-03 04:10:25', '2021-06-03 04:10:25'),
(4, 'add one', 'Long', 'Short', '1625478695-Screenshot_20210129_160054.png', 0, '2021-07-12 00:00:00', '2021-07-05 09:51:35', '2021-07-05 09:51:35'),
(5, 'anno', 'Long test', 'Short test', '1625478749-Screenshot_20210209_165347.png', 0, '2021-07-12 00:00:00', '2021-07-05 09:52:29', '2021-07-05 09:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `clinic_patient_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `from_clinic` int(11) NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctor_id`, `clinic_patient_id`, `date`, `from_clinic`, `time`, `created_at`, `updated_at`, `token`) VALUES
(1, 2, 6, '2021-09-10', 1, '04:07:00', '2021-09-10 09:52:21', '2021-09-10 09:52:21', ''),
(2, 2, 4, '2021-09-10', 1, '04:24:00', '2021-09-10 09:55:10', '2021-09-10 09:55:10', ''),
(4, 2, 3, '2021-09-10', 1, '05:50:00', '2021-09-10 11:20:53', '2021-09-10 11:20:53', ''),
(5, 2, 3, '2021-09-10', 1, '06:14:00', '2021-09-10 11:44:46', '2021-09-10 11:44:46', ''),
(6, 1, 8, '2021-09-10', 1, '07:04:00', '2021-09-10 12:34:39', '2021-09-10 12:34:39', ''),
(7, 2, 3, '2021-09-10', 1, '07:06:00', '2021-09-10 12:36:39', '2021-09-10 12:36:39', ''),
(8, 2, 9, '2021-09-13', 1, '03:50:00', '2021-09-13 09:21:23', '2021-09-13 09:21:23', ''),
(9, 2, 3, '2021-09-13', 1, '04:06:00', '2021-09-13 09:36:34', '2021-09-13 09:36:34', ''),
(10, 2, 11, '2021-09-13', 1, '04:16:00', '2021-09-13 09:49:49', '2021-09-13 09:49:49', ''),
(11, 2, 12, '2021-09-13', 1, '04:23:00', '2021-09-13 09:54:25', '2021-09-13 09:54:25', ''),
(12, 2, 3, '2021-09-13', 1, '04:39:00', '2021-09-13 10:09:29', '2021-09-13 10:09:29', ''),
(13, 2, 3, '2021-09-14', 1, '11:30:00', '2021-09-14 05:00:35', '2021-09-14 05:00:35', ''),
(14, 2, 8, '2021-09-16', 1, '04:40:00', '2021-09-16 10:11:15', '2021-09-16 10:11:15', ''),
(15, 2, 9, '2021-09-17', 1, '02:42:00', '2021-09-17 08:12:52', '2021-09-17 08:12:52', ''),
(16, 2, 9, '2021-09-20', 1, '12:17:00', '2021-09-20 05:47:43', '2021-09-20 05:47:43', ''),
(17, 2, 13, '2021-09-21', 1, '03:49:00', '2021-09-21 09:19:09', '2021-09-21 09:19:09', ''),
(18, 2, 15, '2021-09-25', 1, '02:57:00', '2021-09-25 08:27:45', '2021-09-25 08:27:45', 'TKN-001'),
(19, 2, 16, '2021-09-25', 1, '02:57:00', '2021-09-25 08:28:16', '2021-09-25 08:28:16', 'TKN-002'),
(20, 2, 17, '2021-09-27', 1, '04:16:00', '2021-09-27 09:47:10', '2021-09-27 09:47:10', 'TKN-001'),
(22, 2, 9, '2021-10-20', 1, '12:09:00', '2021-10-20 05:39:53', '2021-10-20 05:39:53', 'TKN-001'),
(23, 2, 9, '2021-10-26', 1, '06:01:00', '2021-10-26 11:32:05', '2021-10-26 11:32:05', 'TKN-001'),
(24, 2, 3, '2021-10-26', 1, '06:02:00', '2021-10-26 11:32:27', '2021-10-26 11:32:27', 'TKN-002'),
(25, 1, 3, '2021-11-01', 1, '03:50:00', '2021-11-01 09:20:32', '2021-11-01 09:20:32', 'TKN-001'),
(26, 1, 9, '2021-11-02', 1, '11:39:00', '2021-11-02 05:10:05', '2021-11-02 05:10:05', 'TKN-001'),
(27, 2, 9, '2021-11-02', 1, '04:24:00', '2021-11-02 09:54:56', '2021-11-02 09:54:56', 'TKN-001'),
(28, 2, 9, '2021-11-02', 1, '04:24:00', '2021-11-02 09:54:57', '2021-11-02 09:54:57', 'TKN-002'),
(29, 1, 9, '2021-11-03', 1, '01:02:00', '2021-11-03 06:32:39', '2021-11-03 06:32:39', 'TKN-001'),
(30, 2, 3, '2021-11-03', 1, '01:02:00', '2021-11-03 06:33:06', '2021-11-03 06:33:06', 'TKN-001'),
(31, 1, 8, '2021-11-05', 1, '03:59:00', '2021-11-05 09:29:29', '2021-11-05 09:29:29', 'TKN-001'),
(34, 2, 3, '2021-11-08', 1, '02:49:00', '2021-11-08 08:20:24', '2021-11-08 08:20:24', 'TKN-001'),
(35, 2, 19, '2021-11-12', 1, '03:57:00', '2021-11-12 09:28:52', '2021-11-12 09:28:52', 'TKN-001'),
(37, 2, 21, '2021-11-15', 1, '01:12:00', '2021-11-15 06:45:45', '2021-11-15 06:45:45', 'TKN-002'),
(38, 2, 20, '2021-11-15', 1, '01:36:00', '2021-11-15 07:08:31', '2021-11-15 07:08:31', 'TKN-003'),
(39, 2, 22, '2021-11-15', 1, '05:42:00', '2021-11-15 11:15:06', '2021-11-15 11:15:06', 'TKN-004'),
(40, 2, 23, '2021-11-16', 1, '04:34:00', '2021-11-16 10:07:23', '2021-11-16 10:07:23', 'TKN-001'),
(41, 2, 24, '2021-11-19', 1, '11:46:00', '2021-11-19 05:19:05', '2021-11-19 05:19:05', 'TKN-001'),
(42, 2, 25, '2021-12-17', 1, '09:55:00', '2021-12-17 03:25:52', '2021-12-17 03:25:52', 'TKN-001'),
(43, 2, 26, '2021-12-17', 1, '09:55:00', '2021-12-17 03:26:48', '2021-12-17 03:26:48', 'TKN-002'),
(44, 2, 3, '2021-12-22', 1, '06:19:00', '2021-12-22 11:49:32', '2021-12-22 11:49:32', 'TKN-001'),
(45, 2, 9, '2021-11-22', 1, '06:19:00', '2021-12-22 11:49:57', '2021-12-22 11:49:57', 'TKN-001');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_attachments`
--

CREATE TABLE `appointment_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_attachments`
--

INSERT INTO `appointment_attachments` (`id`, `attachment`, `description`, `appointment_id`, `created_at`, `updated_at`) VALUES
(3, '/files/attachments/1632125278moonlight.jpg', 'scan bone', 8, '2021-09-20 08:07:58', '2021-09-20 08:07:58'),
(4, '/files/attachments/1632215990moonlight.jpg', 'Scan Bone', 17, '2021-09-21 09:19:50', '2021-09-21 09:19:50'),
(5, '/files/attachments/1634872144GOF Design Patterns.pdf', 'Scan Bone', 22, '2021-10-22 03:09:04', '2021-10-22 03:09:04'),
(7, '/files/attachments/1634880342GOF Design Patterns.pdf', 'sdfsf', 22, '2021-10-22 05:25:42', '2021-10-22 05:25:42'),
(8, '/files/attachments/16369602501635758864807.jpg', 'X ray', 38, '2021-11-15 07:10:50', '2021-11-15 07:10:50'),
(11, '/files/attachments/1636966466java-11-web-applications-and-java-ee.pdf', 'Scan Bone', 29, '2021-11-15 08:54:26', '2021-11-15 08:54:26'),
(12, '/files/attachments/1636966580java-9-swing-documents-and-printing.pdf', 'hEART SCAN', 28, '2021-11-15 08:56:20', '2021-11-15 08:56:20'),
(13, '/files/attachments/163697539016369752283906691480424598330125.jpg', 'X ray', 39, '2021-11-15 11:23:10', '2021-11-15 11:23:10'),
(14, '/files/attachments/163697539416369752283906691480424598330125.jpg', 'X ray', 39, '2021-11-15 11:23:14', '2021-11-15 11:23:14'),
(15, '/files/attachments/163705800916370578411268565350687453463961.jpg', 'X ray', 31, '2021-11-16 10:20:09', '2021-11-16 10:20:09'),
(16, '/files/attachments/1638095606Screenshot from 2021-11-25 02-26-04.png', 'mg', 29, '2021-11-28 10:33:26', '2021-11-28 10:33:26'),
(17, '/files/attachments/1638096056Screenshot from 2021-11-25 02-26-04.png', 'mg', 29, '2021-11-28 10:40:56', '2021-11-28 10:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_diagnosis`
--

CREATE TABLE `appointment_diagnosis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `diagnosis_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_diagnosis`
--

INSERT INTO `appointment_diagnosis` (`id`, `appointment_id`, `diagnosis_id`, `created_at`, `updated_at`) VALUES
(1, 8, 1, NULL, NULL),
(2, 8, 5, NULL, NULL),
(3, 13, 5, NULL, NULL),
(4, 13, 2, NULL, NULL),
(5, 15, 5, NULL, NULL),
(6, 22, 2, NULL, NULL),
(7, 22, 5, NULL, NULL),
(8, 23, 1, NULL, NULL),
(9, 23, 6, NULL, NULL),
(10, 23, 1, NULL, NULL),
(11, 26, 1, NULL, NULL),
(12, 26, 5, NULL, NULL),
(45, 36, 11, NULL, NULL),
(46, 41, 11, NULL, NULL),
(47, 41, 12, NULL, NULL),
(48, 41, 13, NULL, NULL),
(49, 41, 14, NULL, NULL),
(50, 41, 15, NULL, NULL),
(53, 29, 11, NULL, NULL),
(54, 29, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opeing_date` date NOT NULL,
  `account_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `account_id`, `account_name`, `opeing_date`, `account_holder_name`, `balance`, `bank_name`, `bank_address`, `bank_contact`, `created_at`, `updated_at`, `account_code`) VALUES
(1, 31, 'A4', '2022-03-03', 'UUU', 42000, 'AYA', 'Thaketa', '456432', '2022-03-03 16:21:28', '2022-03-05 08:18:53', '0001'),
(6, 40, 'A7', '2022-03-05', 'po po', 27000, 'KBZ', 'mayan gone', '09775', '2022-03-05 06:04:59', '2022-03-05 08:18:53', '0004');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_date` date NOT NULL,
  `est_time` time DEFAULT NULL,
  `token_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'operator',
  `submit_by` int(11) NOT NULL DEFAULT 0,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `floor_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_change_log_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark_booking_date` date DEFAULT NULL,
  `booking_status` int(11) DEFAULT NULL COMMENT 'manual-0 , online-1 ,reserved-2',
  `zoom_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zoom_psw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_status` int(11) NOT NULL DEFAULT 0 COMMENT '0-Meeting not start, 1-start, 2 - finished'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `age`, `phone`, `address`, `booking_date`, `est_time`, `token_number`, `status`, `relation`, `submit_by`, `doctor_id`, `user_id`, `floor_id`, `schedule_change_log_id`, `deleted_at`, `created_at`, `updated_at`, `description`, `diagnosis`, `remark_booking_date`, `booking_status`, `zoom_id`, `zoom_psw`, `start_url`, `join_url`, `patient_document`, `meeting_status`) VALUES
(11, 'Daw Zun Phoo Phoo', '33', ' 09250206903', 'Tarmwe Yangon', '2021-01-16', '12:53:00', 'TKN-001', 3, 'operator', 0, 1, 1, 1, 55, NULL, '2021-01-05 09:58:03', '2021-01-06 06:31:45', 'descrioption', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 0),
(12, 'patientone', '10', '09250206903', 'south dagon', '2021-01-16', '12:53:00', 'TKN-002', 3, 'operator', 0, 1, 1, 1, 55, NULL, '2021-01-05 09:58:03', '2021-01-06 06:31:45', 'descrioption', 'Biochecki', '2021-07-16', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(13, 'Daw Win Win Zaw', '33', '092323', 'south dagon', '2021-01-16', '12:53:00', 'TKN-003', 3, 'operator', 0, 1, 1, 1, 55, NULL, '2021-01-05 09:58:20', '2021-01-06 06:31:45', 'descrioption', 'Biochecki', '2021-07-16', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, 'driverfour', '33', '444414', 'yangon', '2021-01-16', '12:53:00', 'TKN-004', 3, 'operator', 0, 1, 1, 1, 55, NULL, '2021-01-05 09:58:36', '2021-01-06 06:31:46', 'descrioption', 'Biochecki', '2021-07-16', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(15, 'a', '1', '11111111111', NULL, '2021-01-11', '12:30:00', 'TKN-001', 2, 'MYSELF', 0, 1, 13, 0, NULL, '2021-01-10 13:20:22', '2021-01-10 12:54:04', '2021-01-10 13:20:23', 'descrioption', 'Biochecki', '2021-07-16', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(16, 'U Aung Lin Kyaw', '33', ' 09250206903', 'Tarmwe Yangon', '2021-06-05', NULL, 'TKN-001', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-06-03 03:52:15', '2021-06-03 03:52:15', 'descrioption', 'Biochecki', '2021-07-16', 2, NULL, NULL, NULL, NULL, NULL, 0),
(17, 'patient one', '23', '09333', 'yangon', '2021-06-05', NULL, 'TKN-002', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-06-03 03:52:15', '2021-06-03 03:52:15', 'descrioption', 'Biochecki', '2021-07-16', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(18, 'Daw Aye Nyein Thu', '33', ' 09250206903', 'Tarmwe Yangon', '2021-06-03', NULL, 'TKN-001', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-06-03 04:11:40', '2021-06-03 04:11:40', 'descrioption', 'Biochecki', '2021-07-16', 2, NULL, NULL, NULL, NULL, NULL, 0),
(19, 'patient one', '45', '09444', 'yangon', '2021-06-03', NULL, 'TKN-002', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-06-03 04:11:40', '2021-06-03 04:11:40', NULL, 'Biochecki', '2021-07-16', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(20, 'patient two', '34', '09199', 'yangon', '2021-06-03', NULL, 'TKN-003', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-06-03 04:12:12', '2021-06-03 04:12:12', 'descrioption', 'Biochecki', '2021-07-16', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(21, 'Daw Yamone Oo', '33', ' 09250206903', 'Tarmwe Yangon', '2021-06-04', NULL, 'TKN-001', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-06-03 04:12:36', '2021-06-03 04:12:36', 'descrioption', 'Biochecki', '2021-07-16', 2, NULL, NULL, NULL, NULL, NULL, 0),
(22, 'patient three', '45', '09199', 'yangon', '2021-06-04', NULL, 'TKN-002', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-06-03 04:12:36', '2021-06-03 04:12:36', 'descrioption', 'Biochecki', '2021-07-16', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(23, 'patient three', '34', '09444', 'yangon', '2021-06-04', NULL, 'TKN-003', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-06-03 04:14:41', '2021-06-03 04:14:41', 'descrioption', 'Biochecki', '2021-07-16', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(24, 'patient four', '45', '09333', 'yangon', '2021-06-05', NULL, 'TKN-003', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-06-03 04:15:02', '2021-06-03 04:15:02', 'descrioption', 'Biochecki', '2021-07-16', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(25, 'Daw Zun Phoo Phoo', '33', ' 09250206903', 'Tarmwe Yangon', '2021-06-06', NULL, 'TKN-001', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-06-03 04:15:25', '2021-06-03 04:15:25', 'descrioption', 'Biochecki', '2021-07-16', 2, NULL, NULL, NULL, NULL, NULL, 0),
(26, 'patient five', '34', '09199', 'yangon', '2021-07-09', '13:59:00', 'TKN-002', 3, 'operator', 0, 1, 1, 1, 74, NULL, '2021-06-03 04:15:25', '2021-07-06 09:29:59', 'descrioption', 'Biochecki', '2021-07-16', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(27, 'patient five', '45', '09444', 'yangon', '2021-07-13', '13:59:00', 'TKN-004', 5, 'operator', 0, 1, 1, 1, 74, NULL, '2021-06-03 04:15:46', '2021-07-13 03:38:34', 'This guy is in danger', 'Intrinsicly maximize premium technology via enabled strategic theme areas. Dynamically.', '2021-07-13', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(28, 'Daw Zun Phoo Phoo', '33', ' 09250206903', 'Tarmwe Yangon', '2021-07-29', NULL, 'TKN-001', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-07-29 09:22:24', '2021-07-29 09:22:24', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 0),
(29, 'Lu Nar one', '34', '09234234', 'Yangon', '2021-07-29', NULL, 'TKN-002', 5, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-07-29 09:22:24', '2021-07-29 13:58:54', 'This guy is in danger', 'Intrinsicly maximize premium technology via enabled strategic theme areas. Dynamically.', '2021-07-29', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(32, 'U Pyae Phyo Win', '33', ' 09250206903', 'Tarmwe Yangon', '2021-08-10', NULL, 'TKN-001', 4, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-03 10:20:25', '2021-08-10 15:06:21', '1', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0),
(33, 'Lu Nar Three', '41', '09234234', 'yangon', '2021-08-05', NULL, 'TKN-002', 0, 'operator', 0, 12, 1, 1, NULL, NULL, '2021-08-03 10:20:25', '2021-08-05 10:12:19', 'This guy is in danger', 'Intrinsicly maximize premium technology via enabled strategic theme areas. Dynamically.', '2021-08-03', 0, NULL, NULL, NULL, NULL, NULL, 0),
(34, 'Lu Nar Four', '45', '09234234', 'yangon,', '2021-08-16', NULL, 'TKN-003', 1, 'operator', 0, 12, 1, 1, NULL, NULL, '2021-08-03 10:47:41', '2021-08-03 10:48:11', 'This guy is in danger', 'Intrinsicly maximize premium technology via enabled strategic theme areas. Dynamically.', '2021-08-04', 1, '82304580349', '111111111', NULL, NULL, NULL, 0),
(35, 'Lu Nar one', '45', '09199', 'Yangon', '2021-08-16', NULL, 'TKN-004', 1, 'operator', 0, 12, 1, 1, NULL, NULL, '2021-08-03 10:49:19', '2021-08-04 09:26:30', 'This guy is in danger', 'Intrinsicly maximize premium technology via enabled strategic theme areas. Dynamically.', '2021-08-04', 1, '3485039485', '1112111', NULL, NULL, NULL, 0),
(36, 'Lu Nar one1', '23', '09444', 'yangon,', '2021-08-16', NULL, 'TKN-005', 0, 'operator', 0, 12, 1, 1, NULL, NULL, '2021-08-03 10:58:06', '2021-08-05 10:27:45', 'This guy is in danger', 'Intrinsicly maximize premium technology via enabled strategic theme areas. Dynamically.', '2021-08-04', 2, '380394535341', '35890345', NULL, NULL, NULL, 0),
(37, 'Daw Zin Zin Win', '47', '09250206903', 'Tarmwe Yangon', '2021-08-16', NULL, 'TKN-001', 5, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-11 07:37:06', '2021-08-13 10:43:52', 'This guy is in danger', NULL, '2021-08-13', 0, NULL, NULL, NULL, NULL, '/image/patientHistory/1628842117.pdf', 0),
(38, 'zoom test', '35', '09444', 'Yangon', '2021-08-16', NULL, 'TKN-002', 2, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-11 07:40:27', '2021-08-11 14:49:30', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0),
(39, '၀က်', '34', '09234234', 'Yangon', '2021-08-16', NULL, 'TKN-003', 2, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-11 07:47:24', '2021-08-12 03:56:58', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0),
(40, '၀က်', '34', '09444', 'yangon', '2021-08-16', NULL, 'TKN-004', 5, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-11 07:49:46', '2021-08-13 08:10:37', NULL, NULL, '2021-08-13', 2, NULL, NULL, NULL, NULL, '/image/patientHistory/1628842237.pdf', 0),
(41, 'ကြက်', '34', '09444', 'Yangon', '2021-08-16', NULL, 'TKN-005', 5, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-11 07:51:37', '2021-08-11 15:00:47', 'sd', 'sd', '2021-08-11', 0, NULL, NULL, NULL, NULL, NULL, 0),
(42, 'ကြက်', '34', '09444', 'yangon', '2021-08-16', NULL, 'TKN-006', 4, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-11 07:53:02', '2021-08-11 08:11:16', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0),
(43, 'Drum', '35', '09444', 'Yangon', '2021-08-18', NULL, 'TKN-007', 5, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-11 08:06:48', '2021-08-18 09:20:39', 'This guy is in danger', 'Intrinsicly maximize premium technology via enabled strategic theme areas. Dynamically.', '2021-08-20', 1, '86163826230', 'WFLi3r', 'https://us05web.zoom.us/s/86163826230?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InBtQVZIQWNZY2duZlhab0tTbkVrT3p0RjVRcG9mWnB5bjhDUFU1SU8yUEEuQUcuNXZ5R2dfMUVvMlJ5MnVDZkxka3c1S2d2QjNkYXNfMUN4ZlBBVWIyZ0pzbGtGVTlsU1huTms5Uk9IYmJxQXpxVHdsc2RXVDZlUVd0S1BNeEwuN0RQWVFxVGlzNlR6QXRMcGhCREU2QS5yOThVWHlLc1E4ZzA4U2lsIiwiZXhwIjoxNjI4Njc2NDg5LCJpYXQiOjE2Mjg2NjkyODksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.qb8lFHOasR0jSysVHVcLbh7pPlnAmLSsepXN-YKK1ww', 'https://us05web.zoom.us/j/86163826230?pwd=bVhSamoyaGdxN0p0ZW1sWXhzMXVxUT09', '/image/patientHistory/1629278439.pdf', 2),
(44, 'Daw Yamone Phoo', '33', ' 09250206903', 'Tarmwe Yangon', '2021-08-13', NULL, 'TKN-001', 4, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-11 08:13:33', '2021-08-13 10:45:12', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 0),
(45, 'Drum', '34', '09234234', 'Yangon', '2021-08-13', NULL, 'TKN-002', 5, 'operator', 0, 1, 21, 1, NULL, NULL, '2021-08-11 08:13:33', '2021-08-13 07:19:01', NULL, 'Intrinsicly maximize premium technology via enabled strategic theme areas. Dynamically.', NULL, 1, '88619841295', 'Wrwqa5', 'https://us05web.zoom.us/s/88619841295?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjhGbm5yaWNLcXpGWloyb3QyNzhGX1RkOFduY3Rib3ItRzRFb3FxRzZSQ1kuQUcucWE2WWdlbXM5UjZyNHJHa2ZhV1kxZ1c3ZVFuX3N1dWtLX0p5eUVyZ3JmYXdjQmRUNG01Tjc5XzlhLXdBX09oYkQwSko3NmxUTm9mUlk2eHYucmZFenc0RXR4blQ3VnRyM0ZCckd2US5DSVVGWEVBVFFmM3psOHhPIiwiZXhwIjoxNjI4Njc2ODk0LCJpYXQiOjE2Mjg2Njk2OTQsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.L-1PCeQEffzgsXQXq0a_qDq3MzPmipqpxFxmlBRVcb0', 'https://us05web.zoom.us/j/88619841295?pwd=emh2UDhLVGdrWkFxYnBIMEYwaW0rdz09', '/image/patientHistory/1628839141.pdf', 1),
(46, 'ပင်လယ်စာ', '34', '09444', 'Yangon', '2021-08-13', NULL, 'TKN-008', 4, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-11 08:54:41', '2021-08-11 14:37:45', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0),
(47, 'Ko Nyei Maung', '34', '09333', 'Yangon', '2021-08-14', NULL, 'TKN-009', 4, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-11 08:56:08', '2021-08-14 16:03:06', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0),
(48, '၀က်ww', '35', '09234234', 'Yangon', '2021-08-13', NULL, 'TKN-010', 5, 'operator', 0, 1, 21, 1, NULL, NULL, '2021-08-11 10:11:34', '2021-08-13 08:20:18', NULL, 'Intrinsicly maximize premium technology via enabled strategic theme areas. Dynamically.', '2021-08-13', 1, '81378775847', '2r2zsU', 'https://us05web.zoom.us/s/81378775847?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkpsOFMxYzZNZU9hQlNMVmlPMFFFOFJKMGhiRjc4WDFrUk53UXJDeFZnUTQuQUcuYUJ1dW5mNHhSNDJBMDF4bHJjdTBBbEo3NmFLQjdTc1hrOGwwbi1jVTlSangyWmMwUjZKM2R2dlpsWk1aOS1HVUU0RHhFWk9WUXNVYjdHR3IuTm1VUnJiZmdySFhoTnlMcUo4MVk3QS5TdU1CMzdaLXlTSXdxdThXIiwiZXhwIjoxNjI4NjgzOTc2LCJpYXQiOjE2Mjg2NzY3NzYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.mvokd86QteXLYXCvDeMNEmWBrrM_Lw2ngzv41TQET_M', 'https://us05web.zoom.us/j/81378775847?pwd=VUdkSG8rTCt2TWx1RTI3RFYrdjB0QT09', '/image/patientHistory/1628842818.pdf', 1),
(49, 'U Aung Lin Kyaw', '33', ' 09250206903', 'Tarmwe Yangon', '2021-08-25', NULL, 'TKN-001', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:09:17', '2021-08-25 07:09:17', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 0),
(50, 'Drum', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-002', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:09:17', '2021-08-25 07:09:17', NULL, NULL, NULL, 1, '87902591812', 'W54EbM', 'https://us05web.zoom.us/s/87902591812?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ii1WWnNRWUFXX0Q5LUdnNXA5OHBsYzcycEkySVB6R1d2dzVMcE9qUUd3RlEuQUcud2NlU3BxbFVRaEhhbmpkdG1ULTU4YWxRR0FDWnZydnJUSHQ3cXVBZTFudXhaQ3JjaUNMd041MlRxWDR0b1NwVzJodmRGTmV0TW80bVpxQWgubXhBZk4zU1ZjQjE0d0hBeENGci1xUS5ER0lqVUxxdDVNNEMwY2ZjIiwiZXhwIjoxNjI5ODgyNjQ3LCJpYXQiOjE2Mjk4NzU0NDcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.l45WJBnUIwFKb2CCcdxm1CH7Hl0ud2g8a3g3BEmDTnk', 'https://us05web.zoom.us/j/87902591812?pwd=QzZicnhxa2F4bjRFZnViUjVNbExLdz09', NULL, 0),
(51, '၀က်', '35', '09234234', 'Yangon', '2021-08-25', NULL, 'TKN-003', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:11:19', '2021-08-25 07:11:19', NULL, NULL, NULL, 1, '89059064493', 'dHQ8zh', 'https://us05web.zoom.us/s/89059064493?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InZVa3VJS3NwTVN6UnRYWVVCS2F3V0trMHAzckkwd3pnd0F6X1l0a1BpM0EuQUcuUnpMdzU1N2hRZ01rclQ1Y3JSRXRDb0hELXhmNDdhU083WWxkOEkwdFVMeThSd3lab29aWEozeWJYTFNid3RwSmU1amxIaXNieFFvZ3htQjIuNWloYUMta2lZSmZMOGhiSVQ4LWc0QS5ueFFGWHlrYnl0eU41cklhIiwiZXhwIjoxNjI5ODgyNzcwLCJpYXQiOjE2Mjk4NzU1NzAsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.qf7YZrSNsxrpxQZopx0dgcpEEdVh67FdQBnkwdE3Zl8', 'https://us05web.zoom.us/j/89059064493?pwd=THc0VytyM3lDN1BubE9WYlJ5eFl2dz09', NULL, 0),
(52, '၀က်', '35', '09234234', 'Yangon', '2021-08-25', NULL, 'TKN-004', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:12:03', '2021-08-25 07:12:03', NULL, NULL, NULL, 1, '81199535612', '323VRs', 'https://us05web.zoom.us/s/81199535612?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjBNS19nM29QV2d6ZlFnZk9RR3pzanFUU3NUN0dCY1hlVi1vZ2Q4VkNnQWsuQUcuZVhES0RtcjUwSGlmWGxmTGkxbXZfTmFVLVBlUHhmQWtQc2JYeTZIZElFWnFiSTBQS0xhbFZoQ1hUZnkyLTZGeWxNVDhpdGNKZFhuNzVzU0UuZHU5R25IdDdwUUVaYWV3NVppekRRdy4wX1JzTjZpN2tTMWdnanpxIiwiZXhwIjoxNjI5ODgyODEzLCJpYXQiOjE2Mjk4NzU2MTMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.2RQVzfXqasIjAePrul5j13sQImrTk3QcPeU45WVaKdk', 'https://us05web.zoom.us/j/81199535612?pwd=WXA5bnVqd1VyVDh6VUIzdENDOXRkQT09', NULL, 0),
(53, '၀က်', '35', '09234234', 'Yangon', '2021-08-25', NULL, 'TKN-005', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:12:36', '2021-08-25 07:12:36', NULL, NULL, NULL, 1, '88511942030', 'xs780c', 'https://us05web.zoom.us/s/88511942030?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Imh3bVZZSTVLd0RoRWxLbjYwU0NFLUVRb1VVMU1fblJxMXJzVkNWeFpDdk0uQUcucjlZQWRtNW10QmlKZDdGMzU0eGFkQl9ucTlrV1BVbXFFS2h6M2luQldTUG44anJSX3BjMV9fUUlaUkxZR1lwX3RvbDRZNzJQTHlGUFVDV3EuRWZyZ1pTbmp1ZnNlM0hWZllzTjZhdy5rS1lmQlZES0U2dlBsX2RjIiwiZXhwIjoxNjI5ODgyODQ3LCJpYXQiOjE2Mjk4NzU2NDcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.c-qQCn2OyN8Dt6AHne1ExONA_-h8AryyWXFvcmD5LlQ', 'https://us05web.zoom.us/j/88511942030?pwd=V1hraExjRU1KM3U4bFR3c3RwblBvZz09', NULL, 0),
(54, '၀က်', '35', '09234234', 'Yangon', '2021-08-25', NULL, 'TKN-006', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:12:58', '2021-08-25 07:12:58', NULL, NULL, NULL, 1, '89631265203', '8si0Rr', 'https://us05web.zoom.us/s/89631265203?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkxKR29wUnJDdDN0dDY5MWpuNUdTTVZ5YS1HTXowS1RwbXpEZUdSVXY0RFkuQUcuaDdMcUUzVlhIeFpkSjdWcV9nS1BRMGNtYmVQNjZRNFN2aGdSMTlfblgzeTh4cVlqSG0tMHJaRmI4RV84eWJpTi1KVERiOWl3NmRQVWJnNlEuazlUT0NwNlRIeDdteWMzWkNJQWdaZy5Ca1JzRnQ0cWNVMWpKY215IiwiZXhwIjoxNjI5ODgyODY5LCJpYXQiOjE2Mjk4NzU2NjksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.wmmaTRlefoqi2sZbXcH8VYdNoe0Kw3v6oZr3GALj3dQ', 'https://us05web.zoom.us/j/89631265203?pwd=WlFQeDNLc1A2VEc2V1kreS84MlpHUT09', NULL, 0),
(55, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-007', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:13:24', '2021-08-25 07:13:24', NULL, NULL, NULL, 1, '88608087218', 'hTY5mm', 'https://us05web.zoom.us/s/88608087218?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlBBM2RtRGQ4cmo2TV90bWF1LVV3ZWQ4WGkwdjZRS0NrVThVY183R193WVkuQUcuc1JPWGE4TGpxdXNnbnVLQmVzX0xudlIxOHMwWlBmaUFFQThCV2w0dDI4NU04Vm1FaGJIX2Q5THEtMWk1b0drRVZXUUFJQzBvRlhxWVlfWm4uemYtNDhBV2FNZGJLZDc2d1NNZWF5QS5TckM2ZVpJbjFPMW1VQlkyIiwiZXhwIjoxNjI5ODgyODk1LCJpYXQiOjE2Mjk4NzU2OTUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.t76AUO6FY8yBIfNxodE2NpClzsqx1lsT36VSLebbNyw', 'https://us05web.zoom.us/j/88608087218?pwd=NGplMElNN1ZjdlFQbFd6T3h1eW1CUT09', NULL, 0),
(56, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-008', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:14:18', '2021-08-25 07:14:18', NULL, NULL, NULL, 1, '81174071887', '1UfWSi', 'https://us05web.zoom.us/s/81174071887?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkF3SV9vZjBPSUF3SjZiQlA5NE1jQm9ON21hSGU2VHNtMTlxdGgxUVB4SW8uQUcuOUNXY1loeVAwTUptdnViVWw1ZDAtM0MweXc2UEIzaE5fdUR2ZnIwd255Ui1icnpMWjF3eGpPckZaYWtGbGk3cnhYRTNrZ2xGSW1UWnZsUFEuZW1DcE1fdGhxd0lSRVBzSnJ5S0lwZy5jUFhxRHpCdzBqVklPREJfIiwiZXhwIjoxNjI5ODgyOTQ5LCJpYXQiOjE2Mjk4NzU3NDksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.eSjLcDd3S5OH0SmJwHmBzHs6P1gzL8BZMRPAe7OfbJg', 'https://us05web.zoom.us/j/81174071887?pwd=eGRpZWdoaFc3ditUSnFmeGVYRVAvZz09', NULL, 0),
(57, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-009', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:14:48', '2021-08-25 07:14:48', NULL, NULL, NULL, 1, '85994127843', 'ekdm2F', 'https://us05web.zoom.us/s/85994127843?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Iko2MUxSZ2VvMGlDejZRUVVOd2hWUzZSWG52UlZTUGt3QVowc3hRaEpBaEEuQUcuZ0JJYlJ2c19qZnJYRVY4X2IzSmhwdTZ3cTZlcEJRd09RRl82Sk4tVnQ2UHlrWGpITXdLR1pIVS03YTNJbnZ4bk16bHdOeEtPT3ZSaDRwUnQuZnZyTG5XMjFXQTJ4eVZhQ2JlRVpxdy5pUjNCWmhHOGJNMC04Z2taIiwiZXhwIjoxNjI5ODgyOTgwLCJpYXQiOjE2Mjk4NzU3ODAsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.ceE34vB4T1XIxvPnG1zhK1ZUB6eOQ8gLA2Vb5ErnUOs', 'https://us05web.zoom.us/j/85994127843?pwd=N2dPZCtiUHZEOWNpRlViZ25RTkxxQT09', NULL, 0),
(58, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-010', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:16:44', '2021-08-25 07:16:44', NULL, NULL, NULL, 1, '83723101318', '107xTX', 'https://us05web.zoom.us/s/83723101318?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkVMakt4OUdRRTBXQktHLVpaRVQ0QWxCdmZ1azlHY0wzdWJSTmFxYnlqNFkuQUcucmJUd2wxVnpKSUlObGxBakNabFlsN202ZW9TS01NVTRMeU5oWU1DSFU2S0piS3JoTEVhREhCTTU3XzEyTnZKaVd5X0k2WFBTRE1VX2tLV0suZC1veWh3OG40LVFac3FPNGplbkVLdy5ILVpNRGozc1VsaE1SdWxfIiwiZXhwIjoxNjI5ODgzMDk1LCJpYXQiOjE2Mjk4NzU4OTUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.Gkme7E9bSn74aYcbmsp-FEEZGz9fBwzUXkDe5qcxUGM', 'https://us05web.zoom.us/j/83723101318?pwd=RkROUFJjNVl4eDFXRnY3MkhKT1R5UT09', NULL, 0),
(59, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-011', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:17:31', '2021-08-25 07:17:31', NULL, NULL, NULL, 1, '88042490717', 'WQ3uDj', 'https://us05web.zoom.us/s/88042490717?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjZOanRqSUpWSmpEMnE1eEpueTlYSXpFOHZ1d1FKWWIyQ0plODN2QVp3a0UuQUcuaWF4OG1VYXc1OGlfMlUzal83TnNHOXlreFpqZGdUSi1IRUx4VVhLZXlqbDVPWFdWU1dveG9ZdWk3ZGFPZnhsUWRzSlktbnhVQWVfakRKWWkuRnN5WVE2ZUVyTmlTdGU3R3k2T3V3dy5RSGFxRkpRcnBpeW5VaS1RIiwiZXhwIjoxNjI5ODgzMTQyLCJpYXQiOjE2Mjk4NzU5NDIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.hHF1EY6h8laUTxf_5o6JKH7m84GnGX3eAyVppz3MCEs', 'https://us05web.zoom.us/j/88042490717?pwd=YUc2eWk3WTZBQjNqcC82NjFmSFVPdz09', NULL, 0),
(60, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-012', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:23:26', '2021-08-25 07:23:26', NULL, NULL, NULL, 1, '81024301626', 'Lw3meb', 'https://us05web.zoom.us/s/81024301626?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjBjZTRjR1hRLU9FS2oxNDRsY0RWamdZVmlEazZBWTg3Nm5nTGxxRU45RnMuQUcudWhfemdjN0N1TkJxZnd5TTJSQldXc2JTdzdDYTJEeVFENWhWS3NiMnpNWkJLMVFFT1Brdjh1eE1ESGV5SmlrbG5yeXh1OUtNZDhkTThybHcuZjRXdXFYRUJJZkl1UjFNOHdfbHNjQS5yRHdNWFNVLUtYcFF4dlM4IiwiZXhwIjoxNjI5ODgzNDk3LCJpYXQiOjE2Mjk4NzYyOTcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.Ez9woJBhIwy8mVoIs9bHxML5V3u2HDG1008UmfgljYU', 'https://us05web.zoom.us/j/81024301626?pwd=NWJXY0IrWWZmd1MwK1NBeEtaUjF1UT09', NULL, 0),
(61, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-013', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:27:39', '2021-08-25 07:27:39', NULL, NULL, NULL, 1, '88522687893', 'uape93', 'https://us05web.zoom.us/s/88522687893?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkFqS0d0WDdZMDFYMWRiM1hIZTVZU2hrei02dU1CbC1xV2pKSkxwVzNwZnMuQUcuLWRid0NXWmlOWDlLU2I1WDcyQUdvRUpTbVIzTU5IX2IxTW45NHBoLXF0cnp3ZDQtaTlrVVI2SXc4ZlN6eUlMbjJ6OXYtVm1BNS1HU1FaLXYuTi1yb1g2LTViYV9yR2VqTW42UW9kZy5CZ2xUcURfOGdjcGplT3llIiwiZXhwIjoxNjI5ODgzNzUwLCJpYXQiOjE2Mjk4NzY1NTAsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.m1dl9tmJ1ai0jK3oVam1ibyDyejnY4OofpQSTEiRIZc', 'https://us05web.zoom.us/j/88522687893?pwd=WjVFc3FGRVBFU3lPalAxUmlwaVJjZz09', NULL, 0),
(62, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-014', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:29:01', '2021-08-25 07:29:01', NULL, NULL, NULL, 1, '86562649013', '81ddCV', 'https://us05web.zoom.us/s/86562649013?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImJUMm9VbzVCN2d2b3EtS1ZLeVlKVUlCSHREM2JObjBYZUh5d2JHQnhONTQuQUcuakNhb1NyZGZ0UXI0SHF2cGxfV2xONTRJU1VzS1hvejdQQ3M2a3hsWndqWG51WTdjaWp5SjJIYlBjU0R2TDBpeUlKbllSVWJWWGRPSEpGYzQuZWhDMlZtZFdjY1pnMjV5aTl1ajMzQS5sdU5aTUtGeUtoMGJ1c05aIiwiZXhwIjoxNjI5ODgzODMyLCJpYXQiOjE2Mjk4NzY2MzIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.IAxoslIoDgjQlE4ihGBIH8g6zi1fkXOFXek-qiR76bU', 'https://us05web.zoom.us/j/86562649013?pwd=UjhvSTJ5ZlR4MUJtSldyZ1lMN2VMZz09', NULL, 0),
(63, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-015', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:29:42', '2021-08-25 07:29:42', NULL, NULL, NULL, 1, '87444173349', 'FYkb6J', 'https://us05web.zoom.us/s/87444173349?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImJDeUtVMW03MFpIVDl3eFlPQ0V5VnhHM3E1Y2RWUlJocTdYOFdHeE5oaVUuQUcuUjJCUzBkSzNpV05NNDhsWlp2ZkxYS0dfWEw0VUJucWxRdnFxWWU0NmIwUmNVS1dSM0VLNlJtc1JhZk5DWU1oM2Y4b2xtQWxpc0gxMVNqQjkuN1FyZnB2NXZubkF1NnZER0VQZVgtdy5hQWJFU3M2a2dVZHhnVFNsIiwiZXhwIjoxNjI5ODgzODczLCJpYXQiOjE2Mjk4NzY2NzMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.vZftz6MH_iOIRhTLAtCleY-20H8uaUrX6cSS6LXCOHc', 'https://us05web.zoom.us/j/87444173349?pwd=ZFdlcEFyK0ppaGs0Tk5VdXh0c1dZZz09', NULL, 0),
(64, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-016', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:30:21', '2021-08-25 07:30:21', NULL, NULL, NULL, 1, '88431087310', '876JCX', 'https://us05web.zoom.us/s/88431087310?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InZBR1RaUmlyVFFNUTFQYm00TWFsVUpVLTdVUmRUT19tcFVIbVF4eUpNbTAuQUcuT1Vfc2xrSE5BQzlsQmZDM3FEVW5CdzJjU0hFakx2RzFEOVZWaThnaGMzMU5GR2UzTnhydEFlTUR0ekJIR3BXWkVianNMeV9TQVV0WTZHczcuWUhWZVBUV2R0eURpMGFJMlZlVEd3QS42UGxSeXlic2dMT0NsMVJfIiwiZXhwIjoxNjI5ODgzOTEyLCJpYXQiOjE2Mjk4NzY3MTIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.2jHQWWg-bR8b3sFx-HNtHXmt3wFWkzrP6VavMZeFriE', 'https://us05web.zoom.us/j/88431087310?pwd=TmpzeGFlc2kyWG9WSml4T3hLdEJmUT09', NULL, 0),
(65, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-017', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:30:44', '2021-08-25 07:30:44', NULL, NULL, NULL, 1, '89531601053', 'Q43ipY', 'https://us05web.zoom.us/s/89531601053?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImluZWJKY1N6cDhWTExZSm5ORVgxY3BqOXBmazAyNk95S3dkUEFCNkJidlUuQUcuc1VVeWdyTkRJc2tPTW10M0NPMjBRUzJuNEpPeW1LR2haUGFZS0xNSzdkRjFDMVVHQ3JfVmYtUERJV21MRFNkRDRZbzAwOEpUcmR3Q2tOOXYuUmZRR3ZBTTlYTDhHNDBIQUZab093US5fLTk4VldIVk9wZzNveFFPIiwiZXhwIjoxNjI5ODgzOTM1LCJpYXQiOjE2Mjk4NzY3MzUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.dL5ZTpB0o2Or70C3QGyk89RvgSyN0wXBkOZN8Opp1LA', 'https://us05web.zoom.us/j/89531601053?pwd=Rm5SdzI5bHMwK1duVDdIbXlyRUVLUT09', NULL, 0),
(66, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-018', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:31:39', '2021-08-25 07:31:39', NULL, NULL, NULL, 1, '83346432129', 'Vt2L2h', 'https://us05web.zoom.us/s/83346432129?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InlaQjVjUWZKd2ZUbkxDTEhoaXo1Umo3ZDIyUy1iNU52dzNReXpqcmNpMVEuQUcuVVVlLWNPcjY1VTQ3NWNfUHZPUGxGVnRqcm5HOVhXODRaWlZfLVBPS0JBSDhLT3oyZkxINnFpTF9MVG1lMHVpdDZSQ0pHbTNjNGdFb0J0dkcuZ3Qxek9WQlYtMk93YXZHR1h2RmY4QS5yeWt3M2FWTEpMWHk5RXZoIiwiZXhwIjoxNjI5ODgzOTkxLCJpYXQiOjE2Mjk4NzY3OTEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.gehU78DErujICxc5PjNpcvplXoTEoHUPTL4HtdnK-7c', 'https://us05web.zoom.us/j/83346432129?pwd=T2JINHUyV2p2L1ZBaW5Tck5pbGprdz09', NULL, 0),
(67, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-019', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:33:02', '2021-08-25 07:33:02', NULL, NULL, NULL, 1, '89575541560', 'MvghV8', 'https://us05web.zoom.us/s/89575541560?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InZ2QWxuNmlNcHJyQ1ZfaHdaVTUxWTNvaGhiOW1zdWMxMWVGQzBYY1ZQOEEuQUcuTXFEcFJ0Y24tR2kwYWpsZjJ6MkpscWlNRGhoRXdaaUxXU2VORWJCbnJkTWJkbEZFUTRON1NaMy0wT2NEYTVrM09HSUdiOFZkN0Mtd25scVAuWVh6VHVscmFWSnFnTFMzUGZjRFlIZy5XUk9IcFVZdnlqME83dkMxIiwiZXhwIjoxNjI5ODg0MDczLCJpYXQiOjE2Mjk4NzY4NzMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.fZEY75qVq470lwamxecpbviAz1D3hs6f5zn7LoiOfQw', 'https://us05web.zoom.us/j/89575541560?pwd=Tk5NUGV5V3VBMEpYVWZ1dnBJNlk0dz09', NULL, 0),
(68, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-020', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:33:32', '2021-08-25 07:33:32', NULL, NULL, NULL, 1, '81148447709', 'MJMXC9', 'https://us05web.zoom.us/s/81148447709?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImRtSnNBQnEzNU9XbVY3YVZHeE5Fa3V4eXJpd0hLQkNIM3RkSllrWEFmQ0EuQUcuWUg2aWRPWjV4dV91eVdhN0dvUEwyLTFya2dSNmg3YzZCUEZlYXo2QmllSEJQZlFzNTk4SV9QeWx6dTkxV0lBREU2T1VnYm5UN3Y3Q09iYm8udTJGZzNqNVRZWlBSc0JwcjM1Ukptdy5QbkFLN2t4cEhpdUNjSmZJIiwiZXhwIjoxNjI5ODg0MTAzLCJpYXQiOjE2Mjk4NzY5MDMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.syhKcaeFJFmUO2HnCFTxBvPvWN52FmzhKe1JiUPY2hQ', 'https://us05web.zoom.us/j/81148447709?pwd=KzR4bGI5M2hwaDFZMlB6T3YzZS8rQT09', NULL, 0),
(69, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-021', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:33:49', '2021-08-25 07:33:49', NULL, NULL, NULL, 1, '85342388255', 'U6git1', 'https://us05web.zoom.us/s/85342388255?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjJBVlFmZFdaaThPM1RkcVV1cjl1NzZVRWZGVFpBblJ0UXBzTm9lcS02S00uQUcucTRWT3dyeHc0OHlHOGlCSDZWbElORlNBZ2xDbEg4akJGaTN4eWpGcElIbTBhaXNhS3Q3eXNiSDdmVFJITGV1RG9SSDJWZEdzdUZKMXl0M28udzA2ZUd1ZXNBcXN1cWJ3czB5UEVHUS4zVS1tcjhPNU1GSzNoUlVWIiwiZXhwIjoxNjI5ODg0MTIwLCJpYXQiOjE2Mjk4NzY5MjAsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.AL4YZ0vBaGF__8ug-yzd62fOMvYjPQP0rAKnwpcF5Yo', 'https://us05web.zoom.us/j/85342388255?pwd=MGNPa2trcHBQRGU1MTg1d2l1T2J4UT09', NULL, 0),
(70, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-022', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:34:42', '2021-08-25 07:34:42', NULL, NULL, NULL, 1, '87970557175', 'c7V52M', 'https://us05web.zoom.us/s/87970557175?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Im5hcktiVF9ZMkl6U3JwckZJU1pjTGdCRGRnZGlFLVdJeTdGdzY0T29UMXMuQUcuU0NZa0JFNWFGR1BLdXZfZElQWThjRVdZYWpaaDNfemlVTGcwS0FrTlQ3ZkJjRkdkS0VfNHRvLUppXzBEYUl2NkZHZjRRdkNza0xwU3B3NmMuUF9NekhINVg5eGhxcVZwY1BidWJWZy5HcDJnX2loSXd1QXdOVU5aIiwiZXhwIjoxNjI5ODg0MTczLCJpYXQiOjE2Mjk4NzY5NzMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.ufd_hez2nUB4y8FkjZVCCnqNVZt9G3_oxbJu3tUYszs', 'https://us05web.zoom.us/j/87970557175?pwd=T09ZSXFPTG43K2N5NVBBRnVaWWZqdz09', NULL, 0),
(71, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-023', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:35:12', '2021-08-25 07:35:12', NULL, NULL, NULL, 1, '88402610696', 'ZNGD2G', 'https://us05web.zoom.us/s/88402610696?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkhDV3B6b29YOFNZRFVwYmZvTkZPRWlhX1lfMkMtWV83aHkxVXh6bGl6QzQuQUcuZFNSdjkwTnUzTURqbnpkMmtZcGdaY3JkVW1ZVGFzVEw0U2EwT3ZxNmFzZVppd3FudzNCNEp0Sy1nWlh0a1N1VGR6bjBWaFJ2R3h6MElNUm0ualhQRXFsTTk0VlpNcWFuNmt1b3gzdy5EekQxaGxPbnZJemk3RWVJIiwiZXhwIjoxNjI5ODg0MjAzLCJpYXQiOjE2Mjk4NzcwMDMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.Aq_8s3YLNhAoDmlAnw6MAhdMQt8oU306eS5MfLdnQ-Y', 'https://us05web.zoom.us/j/88402610696?pwd=OGFxVVZFdG1raHowSGJnVmJWcDBnUT09', NULL, 0),
(72, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-024', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:37:45', '2021-08-25 07:37:45', NULL, NULL, NULL, 1, '85642212995', '58v8Gu', 'https://us05web.zoom.us/s/85642212995?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InVmRnVxRzkxaVR4blF3M1pQUUQxSmNldUZCR211M1k0UGg4MnlnUGtsWXMuQUcubkRxV25QdTVwSS12VUtCSXNUOGxhZUx1cEY2YkV0NXV2cmR4dXMwMWdOZVE2YkdHWmpGSW9IVnFteFhldng1aXg2MFlkNk5RQ0U2eXJ3bVgudUFPWFdWOE9HV3FoXzlranFuNEZpQS5JRksweE5Ec1hraFVNbFdlIiwiZXhwIjoxNjI5ODg0MzU2LCJpYXQiOjE2Mjk4NzcxNTYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.L1o_zN-WE_3hfkgxfPYJ-5ldns4KpLUH08o7DCbWO3Q', 'https://us05web.zoom.us/j/85642212995?pwd=dVdWeFpmMHBET3pTSmNZNkNyb1V3QT09', NULL, 0),
(73, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-025', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:38:28', '2021-08-25 07:38:28', NULL, NULL, NULL, 1, '84792055615', '0MmQHp', 'https://us05web.zoom.us/s/84792055615?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImhNaHRVekpIRkRBSnV5bDNZdzB6VFBQNER5bGotWmNNS1EzNlQ1cE1Zc2cuQUcuOTBpVU9mSE4xMmswT0E2Z1h2YmpPM2JoUXZSbmptcUVXV0JHT2E2MFNkMU9yaDc0bWtsczYzTFBLR3lENTBtX3RETXdDNkR3b2FXOFNmM1YuLWxqQjl5UUJibnNSUXJrd0VYaVdady41QzdObkI4QUwzTmdKVG1UIiwiZXhwIjoxNjI5ODg0Mzk5LCJpYXQiOjE2Mjk4NzcxOTksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.9tUZWzK746_1zw-Cdz3lt0tM0E0kiY8Fs-uMheKMWiQ', 'https://us05web.zoom.us/j/84792055615?pwd=SXp5YXptZElpc1ZjRlVFL3hSSDNHZz09', NULL, 0),
(74, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-026', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:38:49', '2021-08-25 07:38:49', NULL, NULL, NULL, 1, '83075197220', '6B2fxN', 'https://us05web.zoom.us/s/83075197220?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InU1QnllenNvX2drX2k3QjQzU0ZWZzB5QXBjbzd4SmNORVR6cHlaRkU1ejAuQUcuWmxvc1BpT051VmhUUDRXX2NDUjNtb2UzQkJRTG16ZndjcV91Rnp3cS1Vb2FUYS00akk1UUp1MzV1ZEl1LVpFVzFUX2UwZVVtaURGNmJCelUuY2VBamhsMHRYckNXU0t6SnQzdGhFZy5JQWt2eVFoM0dVMHl6VUFLIiwiZXhwIjoxNjI5ODg0NDIwLCJpYXQiOjE2Mjk4NzcyMjAsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.ylWBbJjxvukItDhnxOYXKde86JtceAKngy2haQxI4WQ', 'https://us05web.zoom.us/j/83075197220?pwd=anlvVUpGbCtYQWlUc2xxRXpPOTZYQT09', NULL, 0),
(75, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-027', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:39:05', '2021-08-25 07:39:05', NULL, NULL, NULL, 1, '84985153718', 'y2SbxT', 'https://us05web.zoom.us/s/84985153718?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkMxQ0dReUtZSkJFWnZSZUpuX3hzTHM0WUNkUm5PTktSc0p4c3pCMzJub2cuQUcuZ0ZaeTV3Nmpzb2x4V2g3MkpzRW5oU1VDLV9kd1NqYTJXWWFHdlpHUlRKeWZncUVScWkxWVFXZTNEcUpKeEtJdmstRjlnWUY5N0MxX3ZPX0MuNWc2cjYzRkw3ZkNHQUVZRTVqMnAtUS5qM0U3c3B0aThTcjk4SDlhIiwiZXhwIjoxNjI5ODg0NDM2LCJpYXQiOjE2Mjk4NzcyMzYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.PK5YulUw5hPomog9AzfFc7Yagvj1dCK7dlJQKdk3ZNk', 'https://us05web.zoom.us/j/84985153718?pwd=c3R4ckRWa3U0Qk04bzZBaVphWkpzQT09', NULL, 0),
(76, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-028', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:40:06', '2021-08-25 07:40:06', NULL, NULL, NULL, 1, '86129672128', 'auLh6w', 'https://us05web.zoom.us/s/86129672128?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Il90ZGluazB2N09jUkNuR2JJVGlmQ2JacDRaUTI2MWdlZFJUc0R1d1VFaDguQUcuY1Q5R19KdDc1TkZ6OW8yV0ZMWFJPVFJ3NU51TUVpak04WnFKSTl6WmU5Tl8xYVF4Tm9fendHblhBdndKR3hZWllXZkdxVnlqUldnSWpPamUueWhDbXpLaExaczRnVXdzVjN5czJEQS5mUmxTTy1qTXVGT1RyQjJXIiwiZXhwIjoxNjI5ODg0NDk3LCJpYXQiOjE2Mjk4NzcyOTcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.-bkjxchUey84-UYtz4fBWDWGeWxRs8H23aOaoZ8vgEk', 'https://us05web.zoom.us/j/86129672128?pwd=Nk1oVVA1ei8zSzdaT1VHVWZuejRjZz09', NULL, 0),
(77, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-029', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:41:30', '2021-08-25 07:41:30', NULL, NULL, NULL, 1, '89918879192', 'G8eegr', 'https://us05web.zoom.us/s/89918879192?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlpaazJqT09rZVNfc2ptdENoamd3VnByT0JVazd3S19taWFseFh1cHJBZ2cuQUcuZm9GcXduVjRmek9MQUhBeW1RemxibUFnRnJFYWhEeFlSMGFzM1VGUjZWc1ItUDR4MVNDS2ZCWXVmZWJlbjRkVDJUYWZfa215ODJ2aWM0dV8uenhrbnFNLXZLMWVYUXJMUTB3MXJsZy5RQnVVMnhWb3VDcnFGc2FlIiwiZXhwIjoxNjI5ODg0NTgxLCJpYXQiOjE2Mjk4NzczODEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.Ann3TXVPILgNwItA73kmsndyKquCmS_L7aEFs0VDBuA', 'https://us05web.zoom.us/j/89918879192?pwd=TnhMeGNoTHNLVW5pQS9PZFU0aWp4UT09', NULL, 0),
(78, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-030', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:41:42', '2021-08-25 07:41:42', NULL, NULL, NULL, 1, '86295925506', 'u96aRW', 'https://us05web.zoom.us/s/86295925506?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlBYMU93eWViOFc2d0xaVFp1QS1TUHplUTZvUGljWXJiT2RDSTA1RWZFRzQuQUcuZkpVZThSLWtfeFJSbVk5SDl0OG1yWW5qX3VGaDFYbVV4ZzJLOUN1LXJxQWwyMTFsRXVqMTliRHJnOGxFVURtLTVRbHhvbWhFVlFOU1hPckwuWVY1Z0F1ZjFVV0RvNC0wNXlnS21LUS5GUDg2VTBTNHdOYVhfSlpaIiwiZXhwIjoxNjI5ODg0NTkzLCJpYXQiOjE2Mjk4NzczOTMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.5GRTUdnhZLL5By2fJ01k6EDPR5Lyr96GwRFbRg24QHc', 'https://us05web.zoom.us/j/86295925506?pwd=c2tTMStoWXdHc29XblZpUUFLQTBXUT09', NULL, 0),
(79, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-031', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:42:25', '2021-08-25 07:42:25', NULL, NULL, NULL, 1, '84297066530', 'Gbw9Bg', 'https://us05web.zoom.us/s/84297066530?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ikx5eFlUWklEV2ZqOVVIUlVrR3pReGxOWkZPRU9wOG5nQk9WVHFrR3BRcFUuQUcuYWJJRW5UUDRJUTh3SUFtZklHakNZQkZoa0ZNTFRCNGZrVy1HMG8tb1d0YUhSdk1LTmtsdXlNOW1IMnNEWmNleEUzeWZMNXprc1lxSTNQa1ouYm8zWjhOUU04VjZnQWlDT25IT2dQdy5kdG9oWXp4V1JzNkRkRUtSIiwiZXhwIjoxNjI5ODg0NjM2LCJpYXQiOjE2Mjk4Nzc0MzYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.32udzX4bilpWiNTJyYEu1H0audSn3zPQcBH69ZTNH-4', 'https://us05web.zoom.us/j/84297066530?pwd=bkhFb0UwUklQcThuZzV4NjlNM3dhZz09', NULL, 0),
(80, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-032', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:43:11', '2021-08-25 07:43:11', NULL, NULL, NULL, 1, '84263860241', '55VUuk', 'https://us05web.zoom.us/s/84263860241?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ik1pZTNzNlJrS1I0SnBiUDNncnEtQzVjRWlRd0NXTUFybjNXc0VsODZ4R3MuQUcubVhjOU03dDQxWG1qaDFKRktnSElUc1ZJcEZXQWYtUEpodk5kWVpHdTBoMWM1bmVNcUpkbElUVS1oV3JONDBXMVFFSUVKSVlpT2gyZi12dHguOWZRWHRyZVoySXBFNHZYcGRHR2xOdy5QQmNaVGVZdjV3eExNdEVvIiwiZXhwIjoxNjI5ODg0NjgyLCJpYXQiOjE2Mjk4Nzc0ODIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.PVaVJ3870AVY_KYDUbJRCxoN1WR7CVfNQU2VoLMkHvM', 'https://us05web.zoom.us/j/84263860241?pwd=UVYyZjJZcjhMUXZBWmdsTGRPb21XZz09', NULL, 0),
(81, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-033', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:44:14', '2021-08-25 07:44:14', NULL, NULL, NULL, 1, '87904401085', 'vu8PyK', 'https://us05web.zoom.us/s/87904401085?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ii1FN1JXcnFjR2FEcWh3Unc0dmdiUXpvaXJJOW5rWlVycl9JMDQ5Smt3b1kuQUcuZWJ6eDhjV3VQbDZpODVmYW82ZFZhanpkV0JWYTYwc3c0dklUYmhNNkFUMUxCeHA0Zk5CY2NIdVJSNXRaaHRWbklmTEJKTEZvbzlROEdoN3guZHhuUE5rZ0tsTEpLQTdERmlacG03Zy43S00tU05Tb1p5VlI4TXh0IiwiZXhwIjoxNjI5ODg0NzQ1LCJpYXQiOjE2Mjk4Nzc1NDUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.liGbXZB8Z958814rfxth_3EcXML88HjEk5manA1k7Qk', 'https://us05web.zoom.us/j/87904401085?pwd=ZU1ienpOUXIveUJqVzlFVGM4UHJoQT09', NULL, 0),
(82, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-034', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:44:36', '2021-08-25 07:44:36', NULL, NULL, NULL, 1, '84506921897', '0V4xCH', 'https://us05web.zoom.us/s/84506921897?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Il9nLVFRazZBT2NyWFJZSWxtelZwYTVTSUw2S2F6c3ZodHdueEJCdy1Fc2cuQUcuU2lQU2VreW1pTFBlTGlKNTBXXzlxZ25QWmdrVDJFNFFGb1lHWFNOOFNyX29NeVF1LU1VbWhNUFdtMVhBS01VTERVZGF5TTFEV1ZYbXpkQnYuQlNOWHlhQXA5aVFVVUdhSEVqNW5wZy40Qi1DTDFibzB3WFZjeXFHIiwiZXhwIjoxNjI5ODg0NzY3LCJpYXQiOjE2Mjk4Nzc1NjcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.lXE2xx7_seN0xJK4F35P9L1_8KjRdolgfo-qrDUeJ9g', 'https://us05web.zoom.us/j/84506921897?pwd=ZldPRFM2TUl5QkM2dGxPR25JYnZFZz09', NULL, 0),
(83, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-035', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:44:52', '2021-08-25 07:44:52', NULL, NULL, NULL, 1, '82700772323', 'b93LYQ', 'https://us05web.zoom.us/s/82700772323?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjVRYTNneXdBQ3dkd0hRcGQ5dmY2WlY4Q1NEVXNhYTlDMjFmUmZUbTFsYkkuQUcuOXhnYmhhNGtZMkdTaVl0RHdGR2RiQmYtS25CR0MySndBZ25TSUhGejlyV0hMQkd3WUFGOHh2SWE5dDZsSWFBZ04zb21NaHYzTmlwUk1wSkMuYU1jZGhaN2YwYkZaaUxNSm5uUDVvQS5QT0c1UlhwSm5iTExEVDVGIiwiZXhwIjoxNjI5ODg0NzgzLCJpYXQiOjE2Mjk4Nzc1ODMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.8E-eUR62kbSw21ITSZy5m3ek2K9OJ88KBI74p8K1Opc', 'https://us05web.zoom.us/j/82700772323?pwd=KzVyNlpOTmpRQmpqUGZQd0p0RURTQT09', NULL, 0),
(84, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-036', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:45:07', '2021-08-25 07:45:07', NULL, NULL, NULL, 1, '87069442384', '8dvtFx', 'https://us05web.zoom.us/s/87069442384?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImtPbzBURVd1WGptM21hak9mUFlSVGFRY3NoU3dZNUJZY0Z4N3YzOE5kM1kuQUcuNzVoR2hhWk5FUGNuSWdxeG5KSGJ2YkRwMjNhTFhoQm1Pdjd3WkRYdk1GMUlhVmloM1hxQm05U0t0ZDZrcmRXRExHNG02WUVnN09Sa01xU1cuUzZRRVAzRG04S0FyS2wtUk9JbUFYQS52RUt3OWY2aWxiWkNmUC1xIiwiZXhwIjoxNjI5ODg0Nzk4LCJpYXQiOjE2Mjk4Nzc1OTgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.AabQChlBPmZDdd6Z8P0gIVGv2Q6PNYXyQ0sBZxFF_t8', 'https://us05web.zoom.us/j/87069442384?pwd=cEZZS0xhTkEyenVhUllOVmJ1cWNjQT09', NULL, 0),
(85, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-037', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:45:21', '2021-08-25 07:45:21', NULL, NULL, NULL, 1, '89505908913', 'K7KCYh', 'https://us05web.zoom.us/s/89505908913?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Imk1S2dRSUJRb0xPYkJmbEVJMkpENUtzQ0dXOHEzcHMwRGQyTXpEWm5nX3MuQUcuZ00xazRTczRoLXl3S1lrOWVGdmlYZlJsZkoxaE03eFNVMEhvMjZzeE5STXBhSDFvRFlTNEk4QTV5SFUyZE40cHA3SVg0TnpURUo1MlVfa2guS3hlc1BOaGpRSWt3TFI0Q2pVMnFQUS5QRXRpY08wakxVNUNwdnhYIiwiZXhwIjoxNjI5ODg0ODEyLCJpYXQiOjE2Mjk4Nzc2MTIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.1VbSxYGkNVKXp-hEEn3wemi8G_-mPrwVfZSOcGav4oI', 'https://us05web.zoom.us/j/89505908913?pwd=eWIwWjd5dENlNm5mSmxIM2tyRVJMUT09', NULL, 0),
(86, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-038', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:45:34', '2021-08-25 07:45:34', NULL, NULL, NULL, 1, '82031005826', 'Wh564d', 'https://us05web.zoom.us/s/82031005826?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjdnakNhZmxiZ0ZHeDlSdTFKdkhCalJqXzJaOVpKaDVydC1OLTVoM2xCVEEuQUcuNlg2UE5ST1NBUkFuOTRwQk9hdnc1aGRyX19BenNTVTI3RGVOWEZVSWhZdUcyZ0VUVFVpWGJyX3JwMTJoWnRUTk9jbXY4ZjhlWjQ0QmE5WW0uTFJCSU9ZeUZGZkZwaFVpRGRFR1oyZy4yUVNQQTZLSW1qNC1GUDFDIiwiZXhwIjoxNjI5ODg0ODI1LCJpYXQiOjE2Mjk4Nzc2MjUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.8QeCGynPsAUprR05BjRXYuyQXRG6jh3HSQ7mUvP2KCM', 'https://us05web.zoom.us/j/82031005826?pwd=bHdjWk5Ta1dNSmFSWDlwSzBrb0xXQT09', NULL, 0),
(87, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-039', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:46:18', '2021-08-25 07:46:18', NULL, NULL, NULL, 1, '88107037482', 'Ve79Vs', 'https://us05web.zoom.us/s/88107037482?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkxWMDJBSEhfaTZCWWNFbGljWGlkc0pXbDBIVDNfeUhuM1F3dXVybGZvUzAuQUcuQ05nNS1PazNNdEg4VFc4aTJvWV9BWUFjeG5SekxGUDBnd01nNjZub2x5LVhocXBxaFpFNm83c1RJZktnb21vaHJkWHZ4T1JQWno2NGg0c2kuV0xKQVppXy1oeFl0TVlTWlBaNmRTZy45VDdoWkZaSllNejBRTHpXIiwiZXhwIjoxNjI5ODg0ODY5LCJpYXQiOjE2Mjk4Nzc2NjksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.3mJQrN_Bhp5DCW8o9EWilzXEFqB9mKMhwy7vSAcm6kc', 'https://us05web.zoom.us/j/88107037482?pwd=YmNkOEhiczZMMGpYT0ZrV1FtZE5PUT09', NULL, 0),
(88, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-040', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:47:10', '2021-08-25 07:47:10', NULL, NULL, NULL, 1, '83286000982', 'an1LJA', 'https://us05web.zoom.us/s/83286000982?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InViWlNPYjgwVnByRzFZRmNGaWN3MkdoOS11Ul9RWE1aMU91b2d1cU92MDAuQUcuay1nQktSaG5maDV6a1E2YklCODFiWHNZaWRwY3FKcXZma0dyZk1wMUtiQTFNOEZUa3lCWTZkOWxCN2I5WGVwWTVmTDNDUHFhSjBkQUdOc0EuSXNocDV4bTROMjZWcWsxaU5FRDBiUS5JMnFNSDBGOUloQ1NMOXJiIiwiZXhwIjoxNjI5ODg0OTIxLCJpYXQiOjE2Mjk4Nzc3MjEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.qm5xTpdt0-jSCN8BDE4aY1NOJQb8RcOd55gHdMTWsMM', 'https://us05web.zoom.us/j/83286000982?pwd=Y2N5OE1hamd3MVZYc0pBNDJRSEVjZz09', NULL, 0),
(89, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-041', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:47:35', '2021-08-25 07:47:35', NULL, NULL, NULL, 1, '89829691168', 'mARq1u', 'https://us05web.zoom.us/s/89829691168?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InhWMElYcVJMRUxlTktKTGtILXNwbTlvNUZQWVV1NW5QQ0luekVSdHJfekUuQUcuZGlYczBYZzIzT3JUSGlZSGJKZk94N2tTYVRZVnlWZ3J4NUsydUxnZUFEWDZ1V2lPZ1FUazhHeDJ3QzhmaTYxOHdYbzE2bHdocjlfYW5MSlcuc3Y5VW40dng4MVZ1Z0pQaDBHNHRHUS5sVmFuR050LXNRanRDUW0wIiwiZXhwIjoxNjI5ODg0OTQ2LCJpYXQiOjE2Mjk4Nzc3NDYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.lNzZLime1JoI0rz4fvnu_G1g2-LRiBQCeePVgO1jYxg', 'https://us05web.zoom.us/j/89829691168?pwd=L1NPK1RYa3pUdXRabmROV1RVOHZRdz09', NULL, 0),
(90, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-042', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:48:20', '2021-08-25 07:48:20', NULL, NULL, NULL, 1, '89299051065', 'teuc6h', 'https://us05web.zoom.us/s/89299051065?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImhMTW9UNUJMQTV6YlJrMGtadmduazI5N3JyNkNxWGdfZ3c3VGVWeVhyTjAuQUcuZEN5cENVbU5UZFdnTkNablY0ZDN1bkV5WUJha19CMXBCR3VreUhyenNRTEo3bUVPWExVMmlEejBoR2ZYZG9UT0RDSWpzZklrNlJMMjJzWEguTkFKZUNENFVEa1EyZ0ptSDlkT1B3QS40NE51c1pGemRFa3BQQnlfIiwiZXhwIjoxNjI5ODg0OTkxLCJpYXQiOjE2Mjk4Nzc3OTEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.oiACFNlCxfrRGT6-TQHVAUU1NJmKvO-FwNrNpz-kWCE', 'https://us05web.zoom.us/j/89299051065?pwd=ODJxbzUwMnVXbkwrWm1ZZXQ4VWRJQT09', NULL, 0);
INSERT INTO `bookings` (`id`, `name`, `age`, `phone`, `address`, `booking_date`, `est_time`, `token_number`, `status`, `relation`, `submit_by`, `doctor_id`, `user_id`, `floor_id`, `schedule_change_log_id`, `deleted_at`, `created_at`, `updated_at`, `description`, `diagnosis`, `remark_booking_date`, `booking_status`, `zoom_id`, `zoom_psw`, `start_url`, `join_url`, `patient_document`, `meeting_status`) VALUES
(91, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-043', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:48:30', '2021-08-25 07:48:30', NULL, NULL, NULL, 1, '84486225501', '5S53Mp', 'https://us05web.zoom.us/s/84486225501?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjN3R0xrMEwtbVlZOXdvdHgwUWx6VGtncFRJYTlFZGNRNkJzY1BUQ0FGTDQuQUcuR0dUNzE5NjcwY2YxVEc0VUpxb2NvQl9Rc0Ftd0tyRDltMkhrcDRrWm5RMlN5M09vSmJuUFMtamFHbVVfdk82eHdZbXcwRi1xTDJjaVN1YTkuX0t1dzNZeGFoTkpoMGhtS0FZa0FfZy5IakRkSVkzM190NUlMNjdBIiwiZXhwIjoxNjI5ODg1MDAxLCJpYXQiOjE2Mjk4Nzc4MDEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.13k0dRCpjAUzTMY62TC3eMSzZdXXdT2tVAaRkzc1Mvo', 'https://us05web.zoom.us/j/84486225501?pwd=YVUzdGZLZnlWMlV5dzZSS1Y0cG54Zz09', NULL, 0),
(92, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-044', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:48:50', '2021-08-25 07:48:50', NULL, NULL, NULL, 1, '87902367680', 'E6naVx', 'https://us05web.zoom.us/s/87902367680?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImpCWFdQcEhNQWFoN2h3ZXRFLTdXNFBxU2h2SzF4SDRvZEI4WDFPQ2Mzc28uQUcuQlhOZmJ5NTRuSWlLRmlmaUJVTVY0NnhPc3FBLUo5bWl3dFIyTW8zTjBScHhqNTFUc0NyZVJ0VDdPUGVzbHBPN0xwZ094MTdlbWhGaXNQVGEudGZNQ3c5V3ptQzFNVlpLVVp1ZkhMUS5QU3R1YW1FR2M3blQ0eDlxIiwiZXhwIjoxNjI5ODg1MDIxLCJpYXQiOjE2Mjk4Nzc4MjEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.cx3m5nt-pHswMhWoRrOyHsJzxb9fKVTj0DnEQ5RfqRk', 'https://us05web.zoom.us/j/87902367680?pwd=eExONWlLTFdDMGlDSWZTUkw5RGNidz09', NULL, 0),
(93, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-045', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:49:25', '2021-08-25 07:49:25', NULL, NULL, NULL, 1, '81564317916', '1WX4M1', 'https://us05web.zoom.us/s/81564317916?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjRYdFFDSkRVYi1ERUJfX1F6UXgxUEpQTkhsd29qeHlQZG9DeFNaaVA2SmMuQUcuNmVFU0trMGhFNERHUGxRT2htQnVlRkhHQWNnTS1rNXA4RlJ4ZWJ2OHdlZWxOeHNnUXliNzIxV05nM2lNVC1raF9wRXNZVmUtRDJqTzZVZFcuRlh1U2JvUTVkV0QtazM2Mlh3VEVCdy5Vc0MtM09uWkpsdzBWYXBxIiwiZXhwIjoxNjI5ODg1MDU2LCJpYXQiOjE2Mjk4Nzc4NTYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.AwpMUR6JIyUiH2xqthBC1Ls98QCsOwJtLpwdXQOT8Jo', 'https://us05web.zoom.us/j/81564317916?pwd=UnRmNklEbDRNN2JBSE94WmcrdEdmZz09', NULL, 0),
(94, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-046', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:49:35', '2021-08-25 07:49:35', NULL, NULL, NULL, 1, '86542160463', 'g8h2Js', 'https://us05web.zoom.us/s/86542160463?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlNIT2lHTEVRX0p6dlhERGppaGphYzhfN2k0WTh1NHRHOGY3bnlVOWpJZG8uQUcuR2dqd1Nqc1AtaWtfVTJra3YyYXMtcUlMa0laZENILWpuUlZFc1REZ0xaU1FZbksxcHhMeWFUZkVYOXpSYVpIWVRkU1p3dGx2SDNiLW1teVMuakFpOEtIX3NmZHFQSWx2d0xJOG1Jdy5lNnhsS2FoWXU1R0oxa01HIiwiZXhwIjoxNjI5ODg1MDY2LCJpYXQiOjE2Mjk4Nzc4NjYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.GwQLCMqxZqWkVFL8nC250BUyQAciZoJhYl0xRzjU6dg', 'https://us05web.zoom.us/j/86542160463?pwd=a0JhZXVhR1ZnV3BSdmV1dEhrakRMdz09', NULL, 0),
(95, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-047', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:49:49', '2021-08-25 07:49:49', NULL, NULL, NULL, 1, '88328071305', 'AtEL0R', 'https://us05web.zoom.us/s/88328071305?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InBWbVBuX210WUpnM0lOY2pZWmRJemt1TkJEbklMekhWeHZQVmZVVzdtMlkuQUcuNXRtQ3pqTTIwbXRwTGdZNFMwTF9Lb2E5NjRaVmNfSjJHbmNnQzlzS1pfYjNtVmMxa2I0NUFaMkxqdHIzQV9xXy16YTF3TzN1UktSYjBySWouOVNPRVdTV3Q5YXBoMko1N0o3OGhQdy5yeHlGa2NaOFR4YjFQMmg5IiwiZXhwIjoxNjI5ODg1MDgwLCJpYXQiOjE2Mjk4Nzc4ODAsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.wBWFUnJ-OhXb9LXPH_04sYVDkz_0gbPAv-le7lQ7GtE', 'https://us05web.zoom.us/j/88328071305?pwd=dlVCTGFnWlJLRGRDS0RQOW45cW1rdz09', NULL, 0),
(96, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-048', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:49:58', '2021-08-25 07:49:58', NULL, NULL, NULL, 1, '88449785715', 'w5tw4A', 'https://us05web.zoom.us/s/88449785715?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IklzLTJjT0ZKVDEtUUpWblFHQm0wdUh3bVBWSXhyZVV0SUJ4dVpaTzVkeEEuQUcuTjgxMEVoNktOQmlaWGd0am44U1RXYl9MQ1o5dHNfeDhRYjJYTHdGb1JQbU9jQWdDcGdZVzN5bkVMSE9OdFhTQVlJdkdWRHJ4ZkM4a2IxWGMuc0thcEpORDNGU3N4Nm9hM21DTk1vUS4wZHBNclBZZklmZXJYdjRuIiwiZXhwIjoxNjI5ODg1MDg5LCJpYXQiOjE2Mjk4Nzc4ODksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.oV6sqyqj21VhhPIUlMcmsms1xh1AiIDxVKdxZ5PcaJk', 'https://us05web.zoom.us/j/88449785715?pwd=TGFLQW9PRjhmdlcwbDFzQlBOSENXQT09', NULL, 0),
(97, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-049', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:51:43', '2021-08-25 07:51:43', NULL, NULL, NULL, 1, '89992350338', 'z8MAvs', 'https://us05web.zoom.us/s/89992350338?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Im10MjZZWERkWEhxWjlRVW90VGtiVURnMFF4a3pTd3JwVGVvaUE5MkpjRzAuQUcuRjcyVWtYUVZrWmdtaVN2U1k2TzBhTVFYYWVxQzdVR1JpdTVHeDJPRDZ5NnVEZS12TXRyeVBrcGpUSEtOU1JkZXZpQ3NGVjEwTkdCczRaMUguY19xV2x2N25LazJybllRM3VYSVVuUS5OYkR6Q21uNl85Z2V5LTB6IiwiZXhwIjoxNjI5ODg1MTk1LCJpYXQiOjE2Mjk4Nzc5OTUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.CYaUvSMDUJEMQYHOCqTZ_jF8sbwQteM9_rygidGWcjg', 'https://us05web.zoom.us/j/89992350338?pwd=YlJ4TitnQWdjOWRmL3FzaVFkSnc1QT09', NULL, 0),
(98, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-050', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:52:13', '2021-08-25 07:52:13', NULL, NULL, NULL, 1, '84333279046', 'FbWuj5', 'https://us05web.zoom.us/s/84333279046?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlUtRFF1MTBDN1dyaTFVWFF5OTB5ODdqXy1hOXJsamxmYTdYOXVIVFdPYWcuQUcuOVVsMVA4a1p3a2JWWDRhMzFOU09vS3hrcGlnMkFjME1yZnJtMVpaNGtHbHhtWVJZeGliWUNQbDdqM2xUTHlscktWeEZHaS1sU29UbUZKZUQuUmRLSzJyYy03VVQ0R3VYYThlZV83Zy5KSG4xWnpETlliZFZwalFCIiwiZXhwIjoxNjI5ODg1MjI0LCJpYXQiOjE2Mjk4NzgwMjQsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.9eliWquqdQp-vqss5v6zojnb--elLGs2x79mzOIVTy8', 'https://us05web.zoom.us/j/84333279046?pwd=c0NOQ3poS0ZoMTMyVVpaS3FIY1QrQT09', NULL, 0),
(99, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-051', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:52:28', '2021-08-25 07:52:28', NULL, NULL, NULL, 1, '86854849200', '78RmAx', 'https://us05web.zoom.us/s/86854849200?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlAwMDZqQTFrMmpHWWtQRWNvOHZCdlBuUjI3UkFIU0xlWHNDVlFzU0pRR0kuQUcuWUtmd25JaXBQeDZNc05MRDE4Q3JVYndhZWVQRFhGa0Q3UGpNRGI4eEYtTEhCNUxIRVRkOEp5Q3RRZmtzODVYSFNfdGJDQi1hMXFGbF85X18uVElSaFpkdVd0bXA2MkhtWTNEU3UxUS5YTzVNSHJNNTZNUmpvRlBsIiwiZXhwIjoxNjI5ODg1MjM5LCJpYXQiOjE2Mjk4NzgwMzksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.S9hka3ddQwrVz610qvnhUIX9bWQntAtdo-oPO9dvOAg', 'https://us05web.zoom.us/j/86854849200?pwd=Z3NibGg4QXlKdmlIbkg3NWVtQkU2UT09', NULL, 0),
(100, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-052', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:52:58', '2021-08-25 07:52:58', NULL, NULL, NULL, 1, '89983112956', 'N6afpG', 'https://us05web.zoom.us/s/89983112956?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlROckdYUmRUdV94a1A0Y3ZKY3Zod0Q1dlFhcUVlWDNNN0JhbTh5bVNvQVkuQUcuZU9BcXppWUVxYXN0RmstU1U3UFFGY1RMTW9FTXlOYi1fa05nSTl2OHdVVFhTdE9NWVNlTnZDTUl1T2lsQUpWVi1VeDZ1bVd2YXd3SnpKS1ouQ3h1bEVqdGp2M0dvX1p0Mkc5Ykd0QS5EQ216U29yYWZaZUdRSXdKIiwiZXhwIjoxNjI5ODg1MjY5LCJpYXQiOjE2Mjk4NzgwNjksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.wz7KDRqx0jn2F0eLXSLBsq3s6jw1CBMyULpfCE3-GU0', 'https://us05web.zoom.us/j/89983112956?pwd=WkNSYlhaMmozOVl4dFlkUjNtcWo2dz09', NULL, 0),
(101, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-053', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:57:26', '2021-08-25 07:57:26', NULL, NULL, NULL, 1, '85084816513', 'xGrDY8', 'https://us05web.zoom.us/s/85084816513?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjRzM3N0QnUzT1lIdnhWUHpCbF9JdjViY2hzT1dWdnpqUmpvVEtjZmZYa0kuQUcuSEJobWZTUlpIT0hjaTZGa3J0Z3hmMDdUY1JFS2lkYVRJd3NJUUE3LWtvMVFibktJdDljQ1lha2tycXg3ckRocnZlT3gxR1NiYjc4RVRMR3YuM3ktYkd5RlZnNDBEeGp4V013ZEhGQS5Xd1FfVFF3TmM1dGZ2dTV6IiwiZXhwIjoxNjI5ODg1NTM3LCJpYXQiOjE2Mjk4NzgzMzcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.7XuL7xpUpo54vZsP8kgEJerXnpAk8ljX-NJ-ulMZGpg', 'https://us05web.zoom.us/j/85084816513?pwd=dW1ZWDhyS0xHbWJDcGZBSUZFUGkrUT09', NULL, 0),
(102, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-054', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:58:39', '2021-08-25 07:58:39', NULL, NULL, NULL, 1, '82812959499', 'P41LFn', 'https://us05web.zoom.us/s/82812959499?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImVxWVgwS19ZY21wY1BJWXlVa3JfOExTZ2thQi1TWXhTckVXRUYzVFJMX2cuQUcuOWdwYjRwUTY2YzFON1NpbDY4WjAwQVpTaFJGb2QxSzd0SlRkaHRXZ2tqaGpFQWtKYmNOWVhTcmF4bzdHeFRVbUlIX1VrbUp2YXV6TDFvU2IucWtLX2ZIMklHaGx5Q3Y1YzFFdEI2QS5rWkVuTzZ5NEVlS0dnRjRJIiwiZXhwIjoxNjI5ODg1NjEwLCJpYXQiOjE2Mjk4Nzg0MTAsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.klsS6XbsLU2k2AEjuWNGxjoqdIbcn1dJ_5d7hjGXcFY', 'https://us05web.zoom.us/j/82812959499?pwd=RGlFNldDaG1JSzhwWUk0L0k3M2ErQT09', NULL, 0),
(103, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-055', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 07:58:58', '2021-08-25 07:58:58', NULL, NULL, NULL, 1, '86285538895', '41uWBB', 'https://us05web.zoom.us/s/86285538895?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InB2M3FHYnBtRnlyUkltZ1c1V0M3dUU5a1NtU2hZVkxMT0xlNlZsZTZoc28uQUcudWNvVUtINExJV2lodFo0dVV6ZVhscFRZQXVBajBNSVdaTG1WXzU3SzN3dlo0Z0dENEpSb0VMX0xOZjNTUlBfOV9nSkdrZGlPeTlkdDF2MXUuRnRlUUc4S3JiLUVDRnh3Q0JGZGZHUS5KQm5OZDBLNG80bVVsa2lHIiwiZXhwIjoxNjI5ODg1NjI5LCJpYXQiOjE2Mjk4Nzg0MjksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.YHU83GAAdKknDEbKaGqsyoCRcWLBkPklJd5pE-HbE8U', 'https://us05web.zoom.us/j/86285538895?pwd=RVJ4cHlNcDNRTDFKM3M2UVZFbzh2QT09', NULL, 0),
(104, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-056', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 08:00:27', '2021-08-25 08:00:27', NULL, NULL, NULL, 1, '85936080219', 'ZWuG7H', 'https://us05web.zoom.us/s/85936080219?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InZwQWhmMzR3elU5UlNuT1RjZFdCcmpseVZHWjF0ajdRVEJEVHRfS0hzM00uQUcucV9TRnZBZUFvT0RYbnprM3dGU1NnNklDZzlQSno1LTNOdFljSlIydUxGNV8wQ1NPdklIV2UtRldsZE5BTkM4RkpmTjhNc1lHTFJGMTJKZmkuV2daMEpnZFpOWHZPcU96RFBvaXV4QS5Pc1JCZ0ppVFlJZUpONk9iIiwiZXhwIjoxNjI5ODg1NzE4LCJpYXQiOjE2Mjk4Nzg1MTgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.RUkRh4t2L9eSJkUxVUPw95cO7WDgLOgiOXJjIHHeOg8', 'https://us05web.zoom.us/j/85936080219?pwd=eEpQM3JaUUM5bUNMSHJmOHVrZzhzdz09', NULL, 0),
(105, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-057', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 08:00:36', '2021-08-25 08:00:36', NULL, NULL, NULL, 1, '82391177368', 'tsxhw6', 'https://us05web.zoom.us/s/82391177368?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InNGRDBQRGdXUVFXQU9Fd3hqQlpyYzJnZjFmSy0yVVFYVzIwdTFJVGxQV0EuQUcuS2NWVTdUaWhQUDl4QXlTTkZxNUtUMlZRVnVBWDA1aUh6bkpXV1ZvNWdNSGJKcURmalc2emEzaGt4T1FYdFdUQkw5a0JiVUR1ZTJSbi1ZaXEuZVVkWklsLWhYTnJfb0YyVmduc2g0US5XMHI1RzNsYnllQWNycWZ3IiwiZXhwIjoxNjI5ODg1NzI3LCJpYXQiOjE2Mjk4Nzg1MjcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.z4Hc1TFyJT4sazG8DMKKO7IuSjcsjzwbeoAIOL1px38', 'https://us05web.zoom.us/j/82391177368?pwd=RVhGeTNTbkxKdzlTZGpxYnZmOGFMUT09', NULL, 0),
(106, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-058', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 08:05:35', '2021-08-25 08:05:35', NULL, NULL, NULL, 1, '82856242982', 'uMyc0f', 'https://us05web.zoom.us/s/82856242982?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjhzRjhiVWR3TF9IVGhrZVRLTmVSN3ZWVW52OUJjam1fVGZTbXZxMnBkak0uQUcuX3RWUjQ3WnR4THFHOHloVTV5YmdLOUNoSTNnLXpfdFB6YTR6M1h1d3Utc0VEWVYxWXRzTnFROXk3RmFiWkZyM1kyS1BmNWNWbHVqLVNmeWwuV3Q5bFBQRkN3TXVhU0hidlFDTy1tQS5nQk56OWd3WWU5aHM0a0pWIiwiZXhwIjoxNjI5ODg2MDI2LCJpYXQiOjE2Mjk4Nzg4MjYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.NSQdsIuM_puaZXzDB_ifc8nmaeyOWMWwDzmrqwqFQZM', 'https://us05web.zoom.us/j/82856242982?pwd=SFdTTEh2VVVuMkFWVGhWVGc1Z0QyQT09', NULL, 0),
(107, '၀က်', '34', '09444', 'Yangon', '2021-08-25', NULL, 'TKN-059', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 08:06:36', '2021-08-25 08:06:36', NULL, NULL, NULL, 1, '87365679415', '0kCxx9', 'https://us05web.zoom.us/s/87365679415?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InJxcl8wcF9QQkJXZUlKUXVBNGE4bFpVUUtRQzdRaXNHRWRZb1Z5LWxiTUEuQUcuTnYtRVRQMTVXbGU1TE5yQTBLOU42SzJScENjRC1vVVdUVWtBLUNzZGpXX2h2LS1Lc1VkaHlFUmk1WDFvQzRBbUw1VFNkOXltSlFhSGYydlMuZG94VHptVUNKSmUzXzYwNGpKRm9zdy5GQW9YZ2FDbmFad1R0eVhJIiwiZXhwIjoxNjI5ODg2MDg3LCJpYXQiOjE2Mjk4Nzg4ODcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.JmfhbNzK6mK6phVhwni7lYzNLuXJh2Wy7HBKSusN7Uw', 'https://us05web.zoom.us/j/87365679415?pwd=OHVvWjdjT1k2UzVBcU8wMnlKUWdZQT09', NULL, 0),
(108, 'Drum', '37', '09199', 'Yangon', '2021-08-25', NULL, 'TKN-060', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 08:14:40', '2021-08-25 08:14:40', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0),
(109, 'Drum', '35', '09250206903', 'Yangon', '2021-08-25', NULL, 'TKN-061', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 08:29:01', '2021-08-25 08:29:01', NULL, NULL, NULL, 1, '84355126881', 'ZtKL93', 'https://us05web.zoom.us/s/84355126881?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IldiR1F1dG9YZjJjTVN6Nll2dUcyZU5WR2FoZGRnRDNlSFlXaFVRV052aHMuQUcuUXVjYnVBMVZMdFRzS3B5ZmZDdUJQVW5zM1l5c1U1dUhVOF9DYXgzbGtBQl9NSlA0X0hPWWRmQ0VVcHVhbS1zZm5JU21haHB4T3VYbHJmbUouV2tldmsyb3RPeWpmbkh6LU5zSnVFUS5wT0dSVTFEX1NpYlo0N3V3IiwiZXhwIjoxNjI5ODg3NDMyLCJpYXQiOjE2Mjk4ODAyMzIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.5Miz7NJlmMnpHY95TLA9jyXm_DOsKUwQfQ2xRVS70Ig', 'https://us05web.zoom.us/j/84355126881?pwd=c2xrSGwxMUtJdmI5dTR3d1hnVEdMUT09', NULL, 0),
(110, 'Drum', '35', '09250206903', 'Yangon', '2021-08-25', NULL, 'TKN-062', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 08:31:11', '2021-08-25 08:31:11', NULL, NULL, NULL, 1, '85239144701', '664BYz', 'https://us05web.zoom.us/s/85239144701?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkZVZmc1bFI5bTN6SUluUXB1QWdlZUxKS2lEVjM4NndXRVA0eUtSRFdKSGcuQUcuVTFSVGZzYk5UeWlxb1VtYm1nb25SbWg0dUZZV1Y4Z2Q1NzBxZHRaYkFVUTkyQ2pGRHJRTDhSaDNwQ2hfaFZfS0dpSi1zMXpNVzRBVlVhQmouNlV6NzhlS1dCMzBUQnQ0Z3E3M0R0dy5kZzhfaG9GQlQxRnBVVTJIIiwiZXhwIjoxNjI5ODg3NTYyLCJpYXQiOjE2Mjk4ODAzNjIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.LvM2D6TV0hvJA9ZZQj-OnJgEiPWiNvqh48dta19hunY', 'https://us05web.zoom.us/j/85239144701?pwd=R2RqMm1pYlNGRStXd3NuRzV2aG9YQT09', NULL, 0),
(111, 'Drum', '35', '09250206903', 'Yangon', '2021-08-25', NULL, 'TKN-063', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 08:32:50', '2021-08-25 08:32:50', NULL, NULL, NULL, 1, '87984103485', 'seGD85', 'https://us05web.zoom.us/s/87984103485?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlZsQzdxeFVuUzVsZi1CMFVSQWZJUWxoWFMyY20wa0llWHQwZFRxZl9VcGsuQUcudnB1U1Rrdktid1oyMTFFZnJ6b1RnN0VrTEJGMEpIdGFuV09RUHozek5PR1J1b2ZsSGgtbjAxMGpvZEF1aHppd19xUXhJMWxSc25Ka2k2d0suSjIzZ0gxN09IWVRSMzZwbmRuWC1sQS4yN3Q1alQtSE1VUkhuenZJIiwiZXhwIjoxNjI5ODg3NjYxLCJpYXQiOjE2Mjk4ODA0NjEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.TygHsQgenqremNIIl-o-fWSJSITZIPf286bSeVX3PUQ', 'https://us05web.zoom.us/j/87984103485?pwd=TXBsMXZYZ0h6SitvdkJCcDc2K0tpUT09', NULL, 0),
(112, 'Drum', '35', '09250206903', 'Yangon', '2021-08-25', NULL, 'TKN-064', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 08:34:16', '2021-08-25 08:34:16', NULL, NULL, NULL, 1, '86014410125', 'SuF4Ea', 'https://us05web.zoom.us/s/86014410125?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ikltcmw2dGQ4d1ozc2gtVl9JNlZ2bURBSExwaC1VS3praGlWdXpyYm5FV1UuQUcubDc1Q1EwTWNWa201cmNaRTg1S1dzSmhxaE01eUpna3R3amxwUkFFdF9uTFlaWjA4eERERUlUeS1RZ2lmMjlHOXYteGM0QUNZLUxwWDI2bTUuSWhiWjlVbTFLWktNdkRwdHpiTG9WZy5TNDJ5VGgyY1R2eG1MT19fIiwiZXhwIjoxNjI5ODg3NzQ4LCJpYXQiOjE2Mjk4ODA1NDgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.PFc0SlOaC6W5_30VIlAo22CRYXj5Q5RDGjGEo9_ZV-k', 'https://us05web.zoom.us/j/86014410125?pwd=RjZRS3ZraGhQVFczcU92ZEN5b2tXUT09', NULL, 0),
(113, 'Drum', '35', '09250206903', 'Yangon', '2021-08-25', NULL, 'TKN-065', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 08:34:45', '2021-08-25 08:34:45', NULL, NULL, NULL, 1, '88254220842', 'xEmgG2', 'https://us05web.zoom.us/s/88254220842?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlBMbGk3aE0zdlk1dm1SR3I0NHFVd3VSWmNzWWhjbUNnNUgzQ0FKSjhFVUUuQUcuMDI3V09WdjBBVUJ6bF9uY0c4UjNkT2hFaklDQkhobExCVmtuMWRJbVFqNDY3ZGhwUTBMZzRhQWRzeUxvZnRyMnVVT19WWjNScE1yVlllTC0uX3hDQ1h5aDRnWUQwSnMxakZleGpHZy5qbXlfTVNYRF9fVUYybmdiIiwiZXhwIjoxNjI5ODg3Nzc2LCJpYXQiOjE2Mjk4ODA1NzYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.-MWg-953VDpNXdXn4vvlGwXhWq8tLdj0G0Fg0UyGCx0', 'https://us05web.zoom.us/j/88254220842?pwd=cm9OTzdjM2FDVlJUdUNCajdDeUZsUT09', NULL, 0),
(114, 'Drum', '35', '09250206903', 'Yangon', '2021-08-25', NULL, 'TKN-066', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 08:35:01', '2021-08-25 08:35:01', NULL, NULL, NULL, 1, '81168800770', '5vN2Cb', 'https://us05web.zoom.us/s/81168800770?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ijg5TGdCX1Z6T2ROVWlVbHJ0eUZETzVJeG5jNHFpMFFTd2JteDRjU2UyNnMuQUcuZjFFbDNtVTM3cE1kRWs2anB6NHcwTVdGNDBrcmtVRUFkc3dWcGQzb1RvYTZwZlJROGYyRHNWUkZWY2NRYmpSQVlOaXRvMVlyUEFvcXlTRW4uMEpBZHpZcDNJNWd4TmpxS2dQTHgwQS5nMHBoaUtnVmJrYmNYS3BSIiwiZXhwIjoxNjI5ODg3NzkyLCJpYXQiOjE2Mjk4ODA1OTIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.ePBYKOUm_MRdjNqAbhpsp07qRUHGSIf8z99-fJtep-s', 'https://us05web.zoom.us/j/81168800770?pwd=VFFSTFVuSHhzV0h6bmRHc28wU09vZz09', NULL, 0),
(115, 'Drum', '35', '09250206903', 'Yangon', '2021-08-25', NULL, 'TKN-067', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-25 09:15:27', '2021-08-25 09:15:27', NULL, NULL, NULL, 1, '89619357816', 'g7cr1g', 'https://us05web.zoom.us/s/89619357816?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjFkcE1Rc2ZLOWc2bkp2QTZ0QndHQzJMaU42WHlSSjU2U2JTNnYxaXJwUVEuQUcuZk5LeDhsMmJQN1dkV21xRTJFdXZPUzJ5SkRySEZNcVc0OUw0ZkhkbXRXMmY5MWM2VE5wanpwSURPUHI4aDRiNmJLNFdmYjVmWEViTXdpMFouYXQ3aVpVYVV1MDg2OGxJTHk4RGJLZy5uQmlSR1Z1UklNcUR0SmpFIiwiZXhwIjoxNjI5ODkwMjE4LCJpYXQiOjE2Mjk4ODMwMTgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.uXGyCH_i5PjRs4tCaNJj2jF9Z-5CgpMF9F7YzxZ3V0M', 'https://us05web.zoom.us/j/89619357816?pwd=dzA1dVRTMjhvc3drNWVPY0IzMUlKdz09', NULL, 0),
(116, 'Daw Khin Myit Sein', '33', ' 09250206903', 'Tarmwe Yangon', '2021-08-26', NULL, 'TKN-001', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:16:11', '2021-08-26 06:16:11', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 0),
(118, 'Drum', '35', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-002', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:22:24', '2021-08-26 06:22:24', NULL, NULL, NULL, 1, '81898347268', 'K0GiqQ', 'https://us05web.zoom.us/s/81898347268?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjVYdEg0el9SeTRSZ25vS3l5YTZMWjcwd0Z3MlRBck9hQzU4WktwRkRQLVEuQUcuNWxfaFRRaU11VWgyQkxDd1hNRG11WWZTZGFQcTgzV0ZtR0hlSl9VemJoZGN2YkRRaHdNbUpjSG1rS3Q4Q1QyRXVuLVhTQm4xWHJ3enAydksudGRNNVI4b2N4M3ZHUXlLRjlJcFVXQS56UDNGQ3lPaGkxd0IxV2JpIiwiZXhwIjoxNjI5OTY2MjM2LCJpYXQiOjE2Mjk5NTkwMzYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.QuxgR9v6KKp4v2kq9D2KS7CWHvhUXlN8_bpinlE7KDE', 'https://us05web.zoom.us/j/81898347268?pwd=ODMyOTRTNWRjbWNaL0FBajlDUDVCZz09', NULL, 0),
(119, 'Drum', '35', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-003', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:23:06', '2021-08-26 06:23:06', NULL, NULL, NULL, 1, '84567973556', 'X4qcUM', 'https://us05web.zoom.us/s/84567973556?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InNYNHdnelJRQTJfT3VUQm1QUEpHM2R6dHdxeDVUMmdFeXNZdkNha0w5N2cuQUcuOVNBV0p6NjVxOFowTTduNVJSS0FYbmxVbUJWMnhINzBYOEpsdW5xQUdEajlIY0pFSkVSa3l4YUdpUDhfVjJmVnRRcjdpeTU5TjU4RG84cFouY2l1dmZOUVpSbXZMM21RX2RNVVo3Zy5wdEM1OGl0cGNMVlFreUEtIiwiZXhwIjoxNjI5OTY2Mjc4LCJpYXQiOjE2Mjk5NTkwNzgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.UN7mNDa9gDTDfJ1zECYdjupaqtV50VJkfQa0_vK7MQw', 'https://us05web.zoom.us/j/84567973556?pwd=VGdLb2FQN3ZDY0YrVmQxWWVyVFY4UT09', NULL, 0),
(120, 'Drum', '35', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-004', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:23:33', '2021-08-26 06:23:33', NULL, NULL, NULL, 1, '86828787881', '7T9Bvf', 'https://us05web.zoom.us/s/86828787881?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IndTTGFid2NackRqZnFVejVxSEltMmdCSG55ZkVSWmhqUEJvWEhSVGYydlUuQUcuX0lrZlVHV1FseXBJT2JiRWhVTXhQQi0tbUdxZUlGMDZ3d2tpQnRhSk9Ha1dFUmRFQ0xONE02cTdWdklWNW9NSDNKbTJfN1pKYXVGRW9UWFIud05ETkRMMHVPZFRBdFFEcHFScDRoZy5wQWJ6OV84eUpmcE1aUU54IiwiZXhwIjoxNjI5OTY2MzA1LCJpYXQiOjE2Mjk5NTkxMDUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.TBebKwXwL2JwNH-Ds4aK2VwjpIauPByQubrM91RPhqc', 'https://us05web.zoom.us/j/86828787881?pwd=YkZWSzZDcHZjU0FSSEpIZmVuQ3FEQT09', NULL, 0),
(121, 'Drum', '35', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-005', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:29:21', '2021-08-26 06:29:21', NULL, NULL, NULL, 1, '83242870642', 'a6ZiYz', 'https://us05web.zoom.us/s/83242870642?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImtkRllPelZicUs3NDh0VkhzZTVsZFh6MFhfWTk0d2FvM0ctQk9weXZPX3cuQUcuamk2VXphdm5PSGxabklMY3RwOXBaaWU1dDFSZ2x2Q2x5bHdlT2s0cUY0SG9UcGl4U3JuVW9MRF9XZmVkTnhWamxGYUZEcGFQOHF6WVhkWmUuOTBBc3NBS3g2Qm9yMW9iSTJXUEVydy5saU4zejVqOUN3TktSdW4wIiwiZXhwIjoxNjI5OTY2NjUzLCJpYXQiOjE2Mjk5NTk0NTMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.aI8PirFmUOw-ggQH_oO6dHJkgeA4wpjzKAKcuEd_Z5I', 'https://us05web.zoom.us/j/83242870642?pwd=NEEzU1lFN3VuSlE2T2JTS1BhcjQxZz09', NULL, 0),
(122, 'Drum', '35', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-006', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:29:59', '2021-08-26 06:29:59', NULL, NULL, NULL, 1, '82677575328', 'B2dC0y', 'https://us05web.zoom.us/s/82677575328?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkRuXy05eXk2UTJoR3RBZFpZaTluZWNudkNOd0F1b1pnTFVaQWkyVnBGU0UuQUcudHBqRzd4RnoxTldDYjd3d3hTY2kwR2pEaV80M0dMQ2djeVlXNlVxV2NKZnZ0NHpSTlhlV0MxUjM3QVRLSjBway1JbzE2RFBxZXM3R3gyOWguMmVvTlpMQkxTVkNGX1JWa3FENWFGQS5KeHBHc1pjU3ZTOHFUQkhRIiwiZXhwIjoxNjI5OTY2NjkyLCJpYXQiOjE2Mjk5NTk0OTIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.bMJ1FmBE_3mWJBocY3a8H0hUd7Bq1g6GDG636Sq9IMo', 'https://us05web.zoom.us/j/82677575328?pwd=cFArRGpkYVovb1JiRHF2SThqTlMyUT09', NULL, 0),
(123, 'Drum', '35', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-007', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:30:41', '2021-08-26 06:30:41', NULL, NULL, NULL, 1, '84055965611', '8fNG9c', 'https://us05web.zoom.us/s/84055965611?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Img3aXlZLUE0V2kyQnFPTVVFMTF6SG1TREd4UXhEMnhZemVYMnZPVWtpeWcuQUcuOGgxME1KT0otRVo1QVA0UlRtc1ZTanl5cFljR1FCWGc4TDZiTmhYOWtuNlpRZWxYOHdHbmhGeURxbnFtVjlJT0dJaDEzY0lLamxWZkJDVWIucUZrWFVMWnlkQ0czRDBpdGdfTE5IZy45NXJBME5pOWFJTGtWdGZTIiwiZXhwIjoxNjI5OTY2NzM0LCJpYXQiOjE2Mjk5NTk1MzQsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.FZxTTrZwY6JW5GSJ2UEebzzIdK43nWFxab6ibkaizcI', 'https://us05web.zoom.us/j/84055965611?pwd=S1JhZ3ZvZkFmdThSQ1BTcHlndG8wZz09', NULL, 0),
(124, 'Drum', '35', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-008', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:32:31', '2021-08-26 06:32:31', NULL, NULL, NULL, 1, '88576240387', '2W7BDx', 'https://us05web.zoom.us/s/88576240387?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Im9MX251MmRzMXNBYXNLSkRxM0s5Sm51RXN4YVBzWl9vVjJKbnRFR1didzguQUcuaW9ZTjM2cHVXS0tJS2JfWjhmTVR6eXg0X2p0S1NTeFpnaUJuQ3U2bXZaVFhnYzI0UWNTTHR5OEFOM3FCUnJVWUF6Y21RR2ZUR2dLTnVMMkEuMWt4U1l6dDJrWFFqajlvWVZIVTZydy4yYzhtUHhFelRFNEM3bDNzIiwiZXhwIjoxNjI5OTY2ODQ0LCJpYXQiOjE2Mjk5NTk2NDQsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.yPTrasvJtzT1g4KeiGei4B5eurEuf7dlTXWIV9fuGhM', 'https://us05web.zoom.us/j/88576240387?pwd=WWhUWjl3aXQ2S2hNTSs5RkNLRzNDUT09', NULL, 0),
(125, 'ကြက်', '34', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-009', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:37:11', '2021-08-26 06:37:11', NULL, NULL, NULL, 1, '89786466044', '34XKRQ', 'https://us05web.zoom.us/s/89786466044?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Im9zc0l0cGJDbWxCU3IwdllBNDZTeHJpTkEzanFHZWdvelRkdmpnRllrZzAuQUcuYkZEbjg3b1ZXVkN5eFJvbnpPSmZZZmNwMkI0MzhtMnZTWkg2OUZQUEl4dlNkRlB0c3ZSeXhieUl6d3NmN0ZKQzlQcXN1ekFxdXVVUW5KWE8ud2YzbWpxVEVSeFhGeXd4aUpaRVFIZy41VkpVVXdVc0ZiaTBPOVFpIiwiZXhwIjoxNjI5OTY3MTIzLCJpYXQiOjE2Mjk5NTk5MjMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.Ew_ZHgl3t_CXKdaFISGwV8Dewp-vLwfWpZCKgE-Rgjw', 'https://us05web.zoom.us/j/89786466044?pwd=WTIwZFVYTzNjT1lBcDdFWU4vTWhLZz09', NULL, 0),
(126, '၀က်', '35', '09444', 'yangon', '2021-08-26', NULL, 'TKN-010', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:49:00', '2021-08-26 06:49:00', NULL, NULL, NULL, 1, '87006467081', 'W3n2fn', 'https://us05web.zoom.us/s/87006467081?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlZKeWtlclZpaF9PVkJrcnVpSG5PalBEY0pMRUZDQ3pnWFBhREVrWW1yTjAuQUcuRmFTS0NOcFZBT3R5bjJKaG04UmZPVk51VVpuc2FzSDM5M1ZuZC1yRDhhWThxZlBCTXlVWmwxVFNETzJtOElFaGRRck02bjhtT2F5RzhxYUIuWEhCckNUSjVfMkxzcTcxN1gtazRrZy5aeERVdUlJcTNSTENWSHBTIiwiZXhwIjoxNjI5OTY3ODMyLCJpYXQiOjE2Mjk5NjA2MzIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.yKJWlokMx9mcJuKLbMhi30apX-8CORDFO8kYt5ed4mU', 'https://us05web.zoom.us/j/87006467081?pwd=OXZzcklHZVZWbFZjc2EzMUVycHp4QT09', NULL, 0),
(127, '၀က်', '35', '09444', 'yangon', '2021-08-26', NULL, 'TKN-011', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:49:36', '2021-08-26 06:49:36', NULL, NULL, NULL, 1, '81837870667', 'nyCv23', 'https://us05web.zoom.us/s/81837870667?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ikl2VEVKdjRxRnYyS1ktWFFzczR0Y0lNV2xrbHRhWmhzSWFnQnN5TkRNUmsuQUcuMGVlTWFqMjI5eDVWbDY5eGF4VldMa0VnaHV0RXMxa1dKZ1ZoVXAtVThFLWFyd1RDblQxSWhRUjFjY3ViS2JNWWxxQ2xrYmYxR0J3X1Y5RTkuWFQzLTFGYjVZTkNuN1c3d0xaRzUtQS5zM1RWQWlmOE5QenlMR3pIIiwiZXhwIjoxNjI5OTY3ODY5LCJpYXQiOjE2Mjk5NjA2NjksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.0ZBJtHQwvbQtKhbALVbTdiN6g9ZHrEc3tmjP_fjHeio', 'https://us05web.zoom.us/j/81837870667?pwd=cXVMVUU4Qk1zcGoxb3pGMWU5TVoxdz09', NULL, 0),
(128, '၀က်', '35', '09444', 'yangon', '2021-08-26', NULL, 'TKN-012', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:54:48', '2021-08-26 06:54:48', NULL, NULL, NULL, 1, '84887214757', 'Sb1VK0', 'https://us05web.zoom.us/s/84887214757?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Il9SQmNXdG9CaVdRZDVNMzlxNi1GTFRZX1BRdGpDZ0xzUW1hM0drS0VwWFUuQUcuVzROYXJpazg0MGdUSTN5cThIYmdDV2pXblV5NGpNRnR4Q01qVVdRODFac3d1ekxzNHdoNDVVbXFLWWhfVk1rZjRmTVVsSng5a3dGVmtUUFUudVFUVW41ZXpLZ2FoU0dPTVV6empVUS40dW9Hc3NFdkVHbkpjQTB3IiwiZXhwIjoxNjI5OTY4MTgwLCJpYXQiOjE2Mjk5NjA5ODAsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.IBUGJt03z1JSaN0kCh1Lrg6R-gfS_Zrop5J7QDiKyxo', 'https://us05web.zoom.us/j/84887214757?pwd=UUoyTEdMcmtPdFdjNEtLdThSSHA3Zz09', NULL, 0),
(129, '၀က်', '35', '09444', 'yangon', '2021-08-26', NULL, 'TKN-013', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:57:03', '2021-08-26 06:57:03', NULL, NULL, NULL, 1, '87210954614', '5nkEV8', 'https://us05web.zoom.us/s/87210954614?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImtpaE8xVWpvY1NpX05xVm9vWUQwSjN2LVUtc1NFa1lwM09iZ1Q5UlN5U28uQUcuNE1sS1pTQlZJcDRYSUFvSzdTRDc4U1h2WVlzMTI0bGViWElhSlhIVXgtWVhDeU5mc2ZPeGFvV2haOTMxeFRKWTloLURVT19xS3BjdjJYWUguQnBMMENIVUhadHdTbUVzRlZHbDR3Zy5UMVZRVU9pRmtTYzhRVzhoIiwiZXhwIjoxNjI5OTY4MzE2LCJpYXQiOjE2Mjk5NjExMTYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.bIBifZLnU11GoWAJq9XangFjfy59AsCjZtDucGlk6m4', 'https://us05web.zoom.us/j/87210954614?pwd=NHJyR0tlelUxd2xtekdQS0Y0MXdudz09', NULL, 0),
(130, '၀က်', '35', '09444', 'yangon', '2021-08-26', NULL, 'TKN-014', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:57:26', '2021-08-26 06:57:26', NULL, NULL, NULL, 1, '81061816899', 'fX59K5', 'https://us05web.zoom.us/s/81061816899?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImRnTHZvN3J4LWphcjNKUGFUTXd5b2VUUXJITWxvMkliMGJJOWJEYXc2NnMuQUcuMlprNm83ZWhjWk9Ya2dZX1JjR3Jzc3VSZ2NmMU1QOG9SR2ZYWXJPZWtzU3FTVnRTMFBwMnVNY21yeFhhUk9XRmlHMnV5LUpwUUprYUVnTV8uUzQzMHVzYTRFdGZoT1N1WHFlSm13US5VempoeUswNVFmSHVfdVdPIiwiZXhwIjoxNjI5OTY4MzM4LCJpYXQiOjE2Mjk5NjExMzgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.W7US5sn9samzMWA9PjIFZUjfXYUH4cHI1eUTeQcbRwo', 'https://us05web.zoom.us/j/81061816899?pwd=RlozYWkrangzd2REUXd4NTNkQmVsdz09', NULL, 0),
(131, '၀က်', '35', '09444', 'yangon', '2021-08-26', NULL, 'TKN-015', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 06:59:46', '2021-08-26 06:59:46', NULL, NULL, NULL, 1, '82791321476', 'Z89f4f', 'https://us05web.zoom.us/s/82791321476?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ik1XR01yV2VoeGw1cFFqV0dmWWdXNVA5MmFmNi1FTkdyaW9tWVlWWm11Z2MuQUcuVkc4MDhZVFVhS0pvNzYxdDFqTEt2RWRiY2lrMFlOencwMGd0VHgtdnZWT2lDWXYyMVhsd0JFeFQ5NUNTWms1TzRSUGlucTlIWHdTSHRxRnIudWRVMndwdGlFMUJPMFJ4aklnUHhady5OczBpWUtsYUVWbGpTdGxnIiwiZXhwIjoxNjI5OTY4NDc5LCJpYXQiOjE2Mjk5NjEyNzksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.u0HiJ-CK6wB2RVuVUSI2aIhUeprExANq_2aE0p9Y3CQ', 'https://us05web.zoom.us/j/82791321476?pwd=M2ZZYlZPL1MyWTB2MSs1TTFNR0dTZz09', NULL, 0),
(132, '၀က်', '35', '09444', 'yangon', '2021-08-26', NULL, 'TKN-016', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:00:02', '2021-08-26 07:00:02', NULL, NULL, NULL, 1, '87958497325', '5R8ayA', 'https://us05web.zoom.us/s/87958497325?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlNDNi1OaFZyb3AtMXBoVlp1ekFEQXFpbm5RM2swWU84b0NzcFJ4eng3UVkuQUcuRkF6QjhhYk1kTUpKdk52a1JKNnZNRTYzWVhrdkF3Q2FyZGFtUXBGX04xdk1yNk1TbnltMXdzT1dNR0JrTGtvTTBNYnpYVkdFRGJqOThmYWYuOFBkN2trRElJbG83VTFuejQyeFp0Zy52LUlhMTNYVkRqVXZSUmQ0IiwiZXhwIjoxNjI5OTY4NDk1LCJpYXQiOjE2Mjk5NjEyOTUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.8OV99AS-sZMPklnK5oXRdh3Fqnxn9assaiX-KvdWdtI', 'https://us05web.zoom.us/j/87958497325?pwd=aC9Mb25xL0g3cVhzbjdvKytkRGRMQT09', NULL, 0),
(133, '၀က်', '35', '09444', 'yangon', '2021-08-26', NULL, 'TKN-017', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:01:19', '2021-08-26 07:01:19', NULL, NULL, NULL, 1, '82378585654', '27PFhJ', 'https://us05web.zoom.us/s/82378585654?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImlzTFdPNkdVUDVpS3dsNGRTeFpuOXhPRFZ5WDl3REhjUHNwbFZKWGlYR1kuQUcuaGhGLXc3Y2loU2ZxU2tmX3dYNlpYaDJjRlBSekR2Ul9FRzdXZHczcnlNVXFBejl0OWJWamtRbkh1anhtdUo0dzVhY0VXbm5iNnpqQk9pWDAuSTJJdFVzNFlfbWY3aTNFZTZ6ZXRxZy5ZXzI0dThYMGhCSWFqQzdKIiwiZXhwIjoxNjI5OTY4NTcyLCJpYXQiOjE2Mjk5NjEzNzIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.tHkgi4vFyg-e12Od9UcExez9jFHXrSFzy0Ub_CVq4Ds', 'https://us05web.zoom.us/j/82378585654?pwd=c2FkK2E4OUZXYnlOZnd3d0xZSVpEUT09', NULL, 0),
(134, '၀က်', '35', '09444', 'yangon', '2021-08-26', NULL, 'TKN-018', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:04:16', '2021-08-26 07:04:16', NULL, NULL, NULL, 1, '86182413244', 'ZLwS9z', 'https://us05web.zoom.us/s/86182413244?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImFzODFoS20yN1ZNY3BYX0pEc0doNldIN0NIeEhOWWxsT1VqdVZqMjEydUUuQUcuSENIVXdVOUVsVVFraHRVX2pUbjZfak5VbnRua3B4VlJEX1VIWFBsdmtZSmNPNFBzTjNYTEtNcE5DTjNVMURldmRaWk9BS2xkYWI0el96VEMuREQ3dTVmWVVubXJiWW9xX0oyVDRady4yZkZXdnRDdkozN0dxVWFRIiwiZXhwIjoxNjI5OTY4NzQ5LCJpYXQiOjE2Mjk5NjE1NDksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.2AVO6SpHIUe_l2dtrKbJUm1BGdTD_53UPNAORe3wsYk', 'https://us05web.zoom.us/j/86182413244?pwd=UDlyR0l5bEpQbE1pQ1d6YmxnNC9EZz09', NULL, 0),
(135, '၀က်', '35', '09444', 'yangon', '2021-08-26', NULL, 'TKN-019', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:06:12', '2021-08-26 07:06:12', NULL, NULL, NULL, 1, '88354160190', 'Qk1ke5', 'https://us05web.zoom.us/s/88354160190?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkUyV3g5a3Z1dVNRVmc4TEZVdDgyT3F4X0JaZE5CY0Zodnp4VHFSZFcwcGsuQUcuY0gySFdPaWwwTE1JWkgzMEJDMnlGaG9ONEEyNklRd290MF90Yld0TklxZGpsNHJIaVJraW9xa2pGX2ZZYURmUnI5RkVqNk1NMGZ6NTVFVjAuQUY2UFMtazhrNVFuQ1RnbHR4RFFvQS5YeWtZTWtncE5FOVBxR1BHIiwiZXhwIjoxNjI5OTY4ODY0LCJpYXQiOjE2Mjk5NjE2NjQsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.RmiNRdsx-hwYoGyyBG-Wv6wFDdi8ir__o9IW6nI12ps', 'https://us05web.zoom.us/j/88354160190?pwd=SDZvZ2p0WlBFRkVJTHJkUWZ4Q3ZCZz09', NULL, 0),
(136, 'Drum', '34', '09333', 'yangon,', '2021-08-26', NULL, 'TKN-020', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:12:16', '2021-08-26 07:12:16', NULL, NULL, NULL, 1, '87677755019', 'VYCPz6', 'https://us05web.zoom.us/s/87677755019?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkRSaFBLaVlvNDktOVdYZGF3TF9KaUx1UjFOUHY4aW00UXFSNVBIZE85OFkuQUcuTGtBT28wZTk2d2RTc3FFT0lYNHp2NEFqUlZvbjNDUHlJTjRtcVFHM2hfUm5XNVNUeTUzM0o0azFwS2g0MTR3OFNncnp3c2w2WC1CSEg3TjcuUFh4eFZMUEg5bllpUmxuZWJ6cElody45UzFRbHUtb2ItOWZrSmRTIiwiZXhwIjoxNjI5OTY5MjI4LCJpYXQiOjE2Mjk5NjIwMjgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.fU3bHx1OVkOG8NqqJ5k00gJNgw7nWpnoICs-HSNMVLQ', 'https://us05web.zoom.us/j/87677755019?pwd=MTBBa3hqVVlOdlhMMFhJSTY4eXNuUT09', NULL, 0),
(137, 'Drum', '34', '09333', 'yangon,', '2021-08-26', NULL, 'TKN-021', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:13:20', '2021-08-26 07:13:20', NULL, NULL, NULL, 1, '85684402047', 'i8S8m3', 'https://us05web.zoom.us/s/85684402047?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InpkVHVFd3J2OElKQ2xLTWRrX3FSczFSU1hXSlB0d0l0TmdOZG9nZEcxZUEuQUcuOWxUOFc1cHB2SW9MMVpmR3JyV3FEd0Jjd3pHQ0ZEakNSWnpjRUMzYVl2aEpnTUVDaHdIbm5ybnY2NmJUcEx3MXBESjdGWWhNdGVLRkFqSUguaGZyTWNibzA3QVVhM25EN3FPTDlDQS5uTnpTS2p5N2ZReFV0THRkIiwiZXhwIjoxNjI5OTY5MjkzLCJpYXQiOjE2Mjk5NjIwOTMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.ODpL6aMqmWiZsTU-DDmUwpjDrzYd0otejPfncHjuCyc', 'https://us05web.zoom.us/j/85684402047?pwd=Q0M1a1BIUGpDL0ZzTWlBc29yQ21wZz09', NULL, 0),
(138, '၀က်', '37', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-022', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:15:21', '2021-08-26 07:15:21', NULL, NULL, NULL, 1, '85676560244', '3enE96', 'https://us05web.zoom.us/s/85676560244?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlZ0THl4UkJfRXpZdEhCQnJ4Y1hoN1dFYWR2V29RWGN2QVVCNFFLd3ZYcG8uQUcucjBvZ0dpcklNQmJjSU8wTTZDdEt1b2h3Q19hWnJiREhRRU1NSGRFXzVWaEhWTFN0TjBSTlVacm5Ca2JIb1RDa0JVRHVNTUIzeHBQZFRhc0EuQmNkR1VYT0xpUVBQMGppelZxdHNPUS4waHZPZWtfa0Ruc0hGbVZPIiwiZXhwIjoxNjI5OTY5NDEzLCJpYXQiOjE2Mjk5NjIyMTMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.VaVBSWXI3s_SeZ_8I3vPHT7HYsajs3KJkXySSYHpSDU', 'https://us05web.zoom.us/j/85676560244?pwd=ei9MREV2WHBkeHlpM29ZRlZ0bDVLZz09', NULL, 0),
(139, '၀က်', '37', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-023', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:19:48', '2021-08-26 07:19:48', NULL, NULL, NULL, 1, '83075998874', 'E36ub7', 'https://us05web.zoom.us/s/83075998874?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InllZmZtVjlRMmZfQWItcUJmVlF6cmFjNmhqZlhaYmNNUE80LUV0SFZ4R0kuQUcuN1N0em9qOW5la1RYOHNvb19mME5hdEpkdXBlaEVRVWRJUDR4Mjk1aEF5Qlh5RHowMGVuUEpPbFJKSE9WVE9HMDgxUWxBTTVCUDBGb0ZjSkwucWVXdEdhYVVuZ0tjZ3AwT25rZ1FMZy5ETGtVclEtMjVLZ19oNnRjIiwiZXhwIjoxNjI5OTY5NjgxLCJpYXQiOjE2Mjk5NjI0ODEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.GaYSrfY6OOdzlqF-EkfAv10dGf9MI-0aMYS5BO1Rd1M', 'https://us05web.zoom.us/j/83075998874?pwd=YUFyakhvT1V2QU1RN3ZCWGxGcGt1UT09', NULL, 0),
(140, '၀က်', '37', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-024', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:20:20', '2021-08-26 07:20:20', NULL, NULL, NULL, 1, '81106798011', 'XvJPR2', 'https://us05web.zoom.us/s/81106798011?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkExdjNJdktrNGJ5VFVnUHZDdkNWbUNiMEF2clNCcjUwZGpNUzBwbEp1V00uQUcuQUpHbXlqX2pEU2pzbE1Ba1V6TFZmVzk0M0hDWEowSXc0T0NGNXBKRk8zM1MzMDE4ZlhJeGJKd3ZxNGV5cWNNTXloZFB6RHV3N0w2T19SR3EuaHM1SkV6UU16UTNGY3lmbHA3Q2RlZy5GLWt3Q0tUYW5faDBjdnRkIiwiZXhwIjoxNjI5OTY5NzEzLCJpYXQiOjE2Mjk5NjI1MTMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.q8xAjVjOnmL9YQsiVTaV93ZzfVl79tBAPHnu95ixZL0', 'https://us05web.zoom.us/j/81106798011?pwd=a2krSzlGTmx5dWdXM2ZYQTVyeTFsQT09', NULL, 0),
(141, '၀က်', '37', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-025', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:21:04', '2021-08-26 07:21:04', NULL, NULL, NULL, 1, '81475506545', 'gz7mxR', 'https://us05web.zoom.us/s/81475506545?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjJEQllaTk9HeXd3Z1gyVXFEcmoyZU1hdWUwNmdiVlZtY3BlQV9pYkZiYjQuQUcuSkdrS3hrbTVjdksxLWFKSUxPWnVOZmpUTXlROTNMc1c4OWU0dEtHN01qYjhDSGpmbzBscEhvT1BBdFNQRzk4STNYN3dVQVpPQVdBTmtjQkEuUDNqN3U1eHNFWEotZjBNR1lmQjUxUS5YS1ZuNnFiYnplNHZISzNXIiwiZXhwIjoxNjI5OTY5NzU2LCJpYXQiOjE2Mjk5NjI1NTYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.Kn277F05CbRMzNAMJkPUrAHJZZXcHnR1xpMpJI3nfko', 'https://us05web.zoom.us/j/81475506545?pwd=bVQxM1AvNnQxeUtSTlJYaExacVdndz09', NULL, 0),
(142, '၀က်', '37', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-026', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:21:55', '2021-08-26 07:21:55', NULL, NULL, NULL, 1, '89688393153', '4Kk3iu', 'https://us05web.zoom.us/s/89688393153?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImhkMnN0TElJMGk4Y2NsTmJwTks0UjF6ZlFheDRybU1LWkxsOXFyc0c2S3MuQUcuQTFMME02OUJPMDZzV2JDZzZyOHpUSnltZTJuMVZpaDhvWWUxRXB6XzlxZTlyWE9MTjlVX1hwcjduN1BRNHQ2eGZlX3hfWmVvSlJQYUVKUVkudGE2cE9xX3pZV1hQeXh5bTd1emg0QS45bTlKN29pLU5udjZZd0pEIiwiZXhwIjoxNjI5OTY5ODA4LCJpYXQiOjE2Mjk5NjI2MDgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.8s_runrosZpSTVLXzBA9Smw-xUIDyFv6bVikLIV0bSI', 'https://us05web.zoom.us/j/89688393153?pwd=aEJkT1Byc05XVjlXcVRlVkplQzg4QT09', NULL, 0),
(143, '၀က်', '37', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-027', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:22:51', '2021-08-26 07:22:51', NULL, NULL, NULL, 1, '87864995094', '1mirbF', 'https://us05web.zoom.us/s/87864995094?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ii05UDlSQjM0UEF2clktbGhWdjV4QjAxNVktbkE2OEg2ZW9ZOWxsbGgzTFEuQUcuNzBaVElPT24xU09XNXJxTmVZX1ZlSzRNX2plY0ZobTlSN2hpUDBaZExvS1BjRzJJYWlMNWpUbmE0VXdYbHN4MFZVaVNRY1pTbnlycWw0X1UuQ1B5RDlXdW9LQmNUX3o4QVdscWRRUS5lZlZkQ1NTd0tEdFdxVDFrIiwiZXhwIjoxNjI5OTY5ODY0LCJpYXQiOjE2Mjk5NjI2NjQsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.go7iuSyfeLKF9uecFqsiYSNZKlv6V2v-Biiu_ef5S14', 'https://us05web.zoom.us/j/87864995094?pwd=TUVvOFpMSGYxdm9MMG9KUjBnTU1MQT09', NULL, 0),
(144, '၀က်', '37', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-028', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:25:21', '2021-08-26 07:25:21', NULL, NULL, NULL, 1, '87218384625', '8Hu1YL', 'https://us05web.zoom.us/s/87218384625?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImRRejZjWkF0Uk9ndDcwV3ZjUDFidEZFRnZzaUY3a3IzU256ZDdfdVdsUmcuQUcuY2I0WjgzRHRZQXlodnhBNGRkNEV5QjhfQ1k4Q1ZraUhhY0FYV3NEM2Y1bFhYVm40dHNEZEZueUZQaVluZXlfSW5TRktTRlRvdVlWSjdrNUguTWVsN0JTY2FoMjU2RjRLeWxnd2ctQS42UVFLV3htdGZ0QVU4QUVwIiwiZXhwIjoxNjI5OTcwMDEzLCJpYXQiOjE2Mjk5NjI4MTMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.YCDvP8eZKFq9pWUBKXujIl0MJsXdfACN8twGPLV977g', 'https://us05web.zoom.us/j/87218384625?pwd=TkhyOVNtR2dpcGlGNHJWenNMZU0zdz09', NULL, 0),
(145, '၀က်', '37', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-029', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:25:26', '2021-08-26 07:25:26', NULL, NULL, NULL, 1, '88060115079', 'zP6rkc', 'https://us05web.zoom.us/s/88060115079?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IllzZ0dOY3haRVlJTWZKTlRyd285VG5KMjNQaWdtRTh3UHpZcHBuWlR1ODguQUcuX0FTVndvakw4QXR5TUhHSUNtNTdmYjdvcThoYlFXXzJuMmIwOVBRWXl6REctQ1JWcmZlTW9nUDZQZDVrYVFSTG9QQWlhbGVIRTNCSXFTY2MueUtMMmRNY2FPQXNPTnp6c1hZN3I5Zy5FTldrQVJrTmpfM2ZGMzZ2IiwiZXhwIjoxNjI5OTcwMDE5LCJpYXQiOjE2Mjk5NjI4MTksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.FzIRuIaZS6Oxu7yIX4lnWKP7GYcgW-N5iiiyTQnT2iM', 'https://us05web.zoom.us/j/88060115079?pwd=VjBydE9zZ1l6YXNvd0RkekMwM085QT09', NULL, 0),
(146, '၀က်', '37', '09234234', 'Yangon', '2021-08-26', NULL, 'TKN-030', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:28:56', '2021-08-26 07:28:56', NULL, NULL, NULL, 1, '89899639787', 'AnP8bH', 'https://us05web.zoom.us/s/89899639787?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ijl5LXpuT2FDVUt1QVBwRGZaZ2QtYUdHTm1rNGd2TEZaeC1zMFhLa0FKMGsuQUcuT05TVW1LMFZqeWRkQnVOeVI4V2RtSk9kWmhkN293QUdEdzJ5Y1F5eml3YTNpek1hRW04cEV1WEdnSnZzU09tSFJ4N2J6amNrS1ZNamYxcnYuS3Jvc09ZNmVWZXhpMTdLWXBsV3lHZy5WeWo2RjlEeVE5S18waVFMIiwiZXhwIjoxNjI5OTcwMjI4LCJpYXQiOjE2Mjk5NjMwMjgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.NqTkh2e8uoHOLq4G9Pj8SWUodutKrYw3vpWfbA7pfSE', 'https://us05web.zoom.us/j/89899639787?pwd=V0pHT0JFOC84WXdUeW5rNFI1ZThPUT09', NULL, 0);
INSERT INTO `bookings` (`id`, `name`, `age`, `phone`, `address`, `booking_date`, `est_time`, `token_number`, `status`, `relation`, `submit_by`, `doctor_id`, `user_id`, `floor_id`, `schedule_change_log_id`, `deleted_at`, `created_at`, `updated_at`, `description`, `diagnosis`, `remark_booking_date`, `booking_status`, `zoom_id`, `zoom_psw`, `start_url`, `join_url`, `patient_document`, `meeting_status`) VALUES
(147, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-031', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:29:22', '2021-08-26 07:29:22', NULL, NULL, NULL, 1, '81074737155', 'ngh42A', 'https://us05web.zoom.us/s/81074737155?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjJxTEZHNENmZk5lcTdsUGhLb25SV1cxMzdFeVpJX3V1WUg1UFNiWFlUaWMuQUcuWkVuNXBHQng4VHVEVnpoNUhlRlk0dllKZkhuYXpEbm1qSjlTeTVVVnFMOFJwczRqcWRqTnUyUDNZTF9DRXFRX25TVmFlMDItQ0tYWXlMRnIuRkNISkh6VlJsUXgySzI4ellsajR4US5fdlVvendkYkdma3hUd1kyIiwiZXhwIjoxNjI5OTcwMjU0LCJpYXQiOjE2Mjk5NjMwNTQsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.7uUAurqUyk8VOAApxCIswGmmdKgj2-FCY2k-aoe3aPo', 'https://us05web.zoom.us/j/81074737155?pwd=WnI4UWJEeUk5SFY2SzNVblc2NHB0UT09', NULL, 0),
(148, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-032', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:37:17', '2021-08-26 07:37:17', NULL, NULL, NULL, 1, '87050903787', 'LDX9CJ', 'https://us05web.zoom.us/s/87050903787?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IndXT2I3NGtfa3dyQnE2RkhuVUllZ2VpMTczZ3VPSE1rdUhjMTQ5OFV6ajguQUcuWGE3b0c5NTJ4QUg1ZjV0b20wX3lWZnJkTEdXbnkwUGRUZl9rWnJUck1LNDNfUmdZT0ZXSUkwZmtra1JMb2U5M05Wd3BRNmJjQVN5ZWZsbzUuZHZtVGJGN1pkcEdCYTlxVldfX3N4QS43RDhKaDA4YVFISlVfdl8zIiwiZXhwIjoxNjI5OTcwNzI5LCJpYXQiOjE2Mjk5NjM1MjksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.Bu7PewTB7lPvQyuZPsZKyXvnyF7qorqiPGYT6QQAznU', 'https://us05web.zoom.us/j/87050903787?pwd=d1FVS3FIOWsxTXhlVFVRNFJPWHo2UT09', NULL, 0),
(149, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-033', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:38:04', '2021-08-26 07:38:04', NULL, NULL, NULL, 1, '84661221426', 'kJYNC8', 'https://us05web.zoom.us/s/84661221426?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Im1JSTFvMlRMZDJsYnFCUUFZd2xHXzBTdnZ1YmtzUXZrNDVCeU9GRXFyZGcuQUcuYkZOdHc3alNtb0pFVTFic0lSUmVuOVV2VXhDUUpIUnJJSU1MaFJtUnV3MU02V2RxSm5faDJEMGQ3MWp6ZUUtc3daaTF4Z2lYOXdOR1BIdHkuTUh0MnBCQkwzT3lEblBHeWZKTHJnUS50RWNBbkxXMjhueHJOWDhCIiwiZXhwIjoxNjI5OTcwNzc3LCJpYXQiOjE2Mjk5NjM1NzcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.J1mEq2Uw--1zsqzMoZUGxkT9ZiMdz9dSggYvjNw-oms', 'https://us05web.zoom.us/j/84661221426?pwd=eXhtbGxnaGhYdXJmbG1GQkw2a2EyZz09', NULL, 0),
(150, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-034', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:38:38', '2021-08-26 07:38:38', NULL, NULL, NULL, 1, '86808907758', 'twKp61', 'https://us05web.zoom.us/s/86808907758?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InFoRjB1LW5qM3JpSjY3eTNyOEYxLUNqU051ak5YazhrbWtXNFIwQ1pyVHMuQUcuUThkRnNYalFyUXNOam53NFNsQS1BNU9aQWJmMkhUQWhyV2E2S3BJMkRIS1NuT19NbC1Vekx0dTN5cXdZQldOU1FVT1FwTUtUQ3FnaTc5a24uYkVKcV9LQi1LeUlpdDhuTm9LTC1xUS5meFA3RWNxdlE3U0dJbTJyIiwiZXhwIjoxNjI5OTcwODEwLCJpYXQiOjE2Mjk5NjM2MTAsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.rbjxGtc-ZDS9vH-BO8rbf4ZFR0e7_dL-SaDQmkOhsDo', 'https://us05web.zoom.us/j/86808907758?pwd=ajJxZG5zY3ZpN1FaSEx3alhrTEU1dz09', NULL, 0),
(151, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-035', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:46:42', '2021-08-26 07:46:42', NULL, NULL, NULL, 1, '81361231334', 'Jz9HJF', 'https://us05web.zoom.us/s/81361231334?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ik9ZbFdtOTJaVjE4RzREaHVXdmRoLVZPVFRXQmR5UGN1Vk45R0wwSWF3QVEuQUcublRqczkzZ2g2aXNBVjI4M0k3QXF4a1Rid1BhOFNORjdQYW5wWnJkZ05lcXU3amY4eXk5ZldLZjByemhPeS1ldnZtT2lnSy1UVzFfRzFvaWQuaExoT2pBbVJvSE9ZM1lFa0ZabEVlUS5TTnhSbThXWXpoVkVKd0ZkIiwiZXhwIjoxNjI5OTcxMjk1LCJpYXQiOjE2Mjk5NjQwOTUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.1UYzbqFLifCRLbh2LX8mIWHuzOrQg9wbVNi2frl0ROg', 'https://us05web.zoom.us/j/81361231334?pwd=MGdhQVpBZkdvdmVrQ2dSSk5zakF3dz09', NULL, 0),
(152, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-036', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:47:29', '2021-08-26 07:47:29', NULL, NULL, NULL, 1, '87493245981', '0qE6WG', 'https://us05web.zoom.us/s/87493245981?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IktQcnBWRFNBNVgxeWUySmpEQkFLZEMtOHNHZGw0azI0cWZaamxCY0ZHZlUuQUcuQ2JoODFYd3BjeHFQaC1udUxJeC01SXFCNklhV0lhdWRWSzFiN3Fkc3FXWGt1c3RIY0dtN0FWRWZ4d1RQNkxiaHdCMkxGSnE1bWFsR24xbVcuSElPWlQ0aktxMV9lUHBBeFN5YUs0Zy5wWlpuSkF3aHB0azh1Q2k3IiwiZXhwIjoxNjI5OTcxMzQyLCJpYXQiOjE2Mjk5NjQxNDIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.W56b1dtGuQsG7_geZEIT9ndUf7c9AriMZXC-unx5cG8', 'https://us05web.zoom.us/j/87493245981?pwd=UFNsL0lZTXFwVTI5TzUrWFBvUy85UT09', NULL, 0),
(153, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-037', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:47:52', '2021-08-26 07:47:52', NULL, NULL, NULL, 1, '81587483322', '4dUW4C', 'https://us05web.zoom.us/s/81587483322?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ii1HSU81Q1RXZmJVcXV3Q3BaeUtlazh4SHZWRThZYUR5bktuaXJYWU5Fa1EuQUcudzQ0MVozN2lJRFZzYkdubG9WLVRZRHpWY0RhTHVFa1NEajlzMlVOb0ZiSjg3Zms4dlo1eklJbVZadnhWNjRVSU9ZelhuTU4tZGtVUi02UGEuRGtIbnN5b05OcnFPRmJITWUySVhSZy5CdUlZRWpydFZyYlItQ1VHIiwiZXhwIjoxNjI5OTcxMzY1LCJpYXQiOjE2Mjk5NjQxNjUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.uysmBYvtRkC4xLm9eiSq-Nm1T9VxfxEnfQO7JI5lHPA', 'https://us05web.zoom.us/j/81587483322?pwd=bVRSVlBxR2JuQWJIc0ZxWjNZVDlrUT09', NULL, 0),
(154, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-038', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:47:55', '2021-08-26 07:47:55', NULL, NULL, NULL, 1, '83123767970', 'LKq7NB', 'https://us05web.zoom.us/s/83123767970?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkJwR3FLTTVEanphUmtmU2xxUWZzbU1XS0t6ZUw2RmhoclZsZnVVdVBXS0kuQUcuRkw1S0VIZVVSOE9fM1p0Nzk3MGtGYzA2Mzgyb3pkZjFQZ2dSNGRIQUd1SWdHOU5MS1NXa1NYQ0hweVd6LXgxUE1IOF9xVkhLSFE4YWtsVkQuaEgwWFNKS3dSanZBYVBSRW1WRWNQQS5FQWt0dlh2VGZXSlZxdFIxIiwiZXhwIjoxNjI5OTcxMzY4LCJpYXQiOjE2Mjk5NjQxNjgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.2_9l17Kv6FDDOcpHU_yPlW7yMAqrZlOLCAY_L9Vam3k', 'https://us05web.zoom.us/j/83123767970?pwd=aEk5RFlHNlNnaERPVjdLaFVsK3JnZz09', NULL, 0),
(155, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-039', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:48:47', '2021-08-26 07:48:47', NULL, NULL, NULL, 1, '89861192221', '9dSpNj', 'https://us05web.zoom.us/s/89861192221?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ijl0ckNZQmVJUnBEaldFNDhqSmhtTnhaUmloSVpldzAwNThwb1J3YWpMZncuQUcueWdHU2xmOFRtYWtBSXFTaXZZXzllWUllUGhmWVhJaDNBZjRpV3c0RFBsYUVoOGRsejBNcGFmdEljTFNEZTYyNlk3Z1p2MHVmOGpSa0xiczAucXJIU3ZTaUNIUnR4d3FsbzBiLTExUS5zaW1Bek1pam5nNEZ3Z3NEIiwiZXhwIjoxNjI5OTcxNDE5LCJpYXQiOjE2Mjk5NjQyMTksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.noUYDrFFxGUMEbP5dnFBfFWIn-5v35YTk4QOxpwy-HY', 'https://us05web.zoom.us/j/89861192221?pwd=eG1YOE04Q2ttRkFvdXg0Y2NObSsvUT09', NULL, 0),
(156, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-040', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:50:25', '2021-08-26 07:50:25', NULL, NULL, NULL, 1, '87097773932', 'dDjp2Y', 'https://us05web.zoom.us/s/87097773932?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Im1jOGJ3S2I0VHdtZWJnc0hkdXVtdXktU0hkbGpRamFVb3N6ZkRpSFE3TjAuQUcuMEpFM25tM3ZLY000TkQwSDdJY2hzV3BiaXlqcjdTOGVINEtRTm5vek1Zd2N4VDhrd1lielA0Z0dia2ZNSWxvSlRaeGV6ZXFIalFYUnlzR2IuWEpWVld2RENvSnRJUXNKeFNkMGNWQS56eV9jUktFbHpUUEI4aEdjIiwiZXhwIjoxNjI5OTcxNTE4LCJpYXQiOjE2Mjk5NjQzMTgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.akZ407q1TZ8wyiEfxP51ELvomQsvkNPylidOLF_IQAs', 'https://us05web.zoom.us/j/87097773932?pwd=NUp6SDgza0ZFZ0s3MzA5YXZHb2JEdz09', NULL, 0),
(157, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-041', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:50:59', '2021-08-26 07:50:59', NULL, NULL, NULL, 1, '82273298306', '9Smdtw', 'https://us05web.zoom.us/s/82273298306?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImJBaUpCcElvR2xqQzB5c2EtOGROYms4cHlYOTBXXzJCRVdfRi1iajVIbW8uQUcuSGFqM2FmNm84RG1BT2RxdDFaOEpqN3h3LUNia0pYYVBSbkFPQWlYR2FwWkRXVnlxLTRUblEwQktjS3V0TDQ0YUIzWEE0RjczTkNGSWg1aVQuMThtUU5PaXk2MVJLZjE5VWxtQzJKUS42UnoyejdOaTY3cU50Zi1BIiwiZXhwIjoxNjI5OTcxNTUyLCJpYXQiOjE2Mjk5NjQzNTIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.UTXO57wa7QNAN-6Hm990Ma-QHnHpe-Bza91aOICitFM', 'https://us05web.zoom.us/j/82273298306?pwd=TzViZmF1bjlEMFhVRmVIdEhTOGZlQT09', NULL, 0),
(158, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-042', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:51:52', '2021-08-26 07:51:52', NULL, NULL, NULL, 1, '83771612704', 'tNQF1X', 'https://us05web.zoom.us/s/83771612704?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlBKSWx2amNUZkxYTXMyWC1Ud0hpbzY0bWsycG5kXzVOVWJLS2lUWjl6X3cuQUcuLUNUaVJTWV9MSEVLOHExZUVSN2ViamZKS09IZzI0eVFabXZodVpOYUQzLWFpZENvN2hJU2wwdzF3bFZUbml4aDlORVJoeWVMU19UNmFueGEuRlVUTl95THk0ZU51bzRVZ0pzMHdnZy5DSVZaQ3pROVd3OTNFWlNXIiwiZXhwIjoxNjI5OTcxNjA0LCJpYXQiOjE2Mjk5NjQ0MDQsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.tj4G5I7m4MnAflx4Ql4392iq6Fv4YTjZyIPAFHHu4EE', 'https://us05web.zoom.us/j/83771612704?pwd=eCtzeXd5ZC9QNHhNVTg4Ylg3ME5odz09', NULL, 0),
(159, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-043', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:52:20', '2021-08-26 07:52:20', NULL, NULL, NULL, 1, '89342871819', 'JH2bbY', 'https://us05web.zoom.us/s/89342871819?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InlsdXZqUVQ0d1BQc1ZPY2tIVVpzSmZuUlIzaFZEMXpQbGpFUjd2aWhOcVkuQUcuZlZjQU1xVmw1dHQ1TGVsYVIxV3JrQTVSY0MzSFJHa0NpN2FBSlVBZEV5WXJNQnRodFc2dl9PaGZfSlcxMGZzb3lKZEVaSE9jeUNTV1ZsS0YuNjE1SEE5VlNpSlJNaWFyOUpCU3pMZy5GaVQxNlF4V18wLXdmVHgtIiwiZXhwIjoxNjI5OTcxNjMzLCJpYXQiOjE2Mjk5NjQ0MzMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.1L-66I2njCOtdGFuce1Y6IthrNH8TyAvhvsl04hZahk', 'https://us05web.zoom.us/j/89342871819?pwd=OWFuZ3VITEZDWk9iWmJSWW05VERwdz09', NULL, 0),
(160, 'Drum', '40', '09234234', 'yangon', '2021-08-26', NULL, 'TKN-044', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 07:54:43', '2021-08-26 07:54:43', NULL, NULL, NULL, 1, '83381482798', 'A2e1kv', 'https://us05web.zoom.us/s/83381482798?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Il80TXB5c051a09heG9meGhBUEk5TW1aVHhaX3pUTXZxN2prMnBhcHd1YzguQUcuQnVOQ0QzeGJUV3BzTXJxOGxoNzNPbXFiSDlEOU00NG5iOTNLakJDWlh5cEVrRThrZzhWeHotY1RVY0ZDek1WaWQ4QnNBU1B6OWpQbnRtVDcuRjJWWW9ZTjdHX2M1a2xLLVItUjZNdy5jMDdiN09FazFLZGJyLXE4IiwiZXhwIjoxNjI5OTcxNzc1LCJpYXQiOjE2Mjk5NjQ1NzUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.WbngZf4HaoFDwAts_L4WWJfIByMOdQ6LzKmZj7RDh38', 'https://us05web.zoom.us/j/83381482798?pwd=YkdIZlpvUGxHeE1jeUlMeTg3MUpxQT09', NULL, 0),
(161, 'Ko Nyei Maung', '34', '09250206903', 'Yangon', '2021-08-26', NULL, 'TKN-045', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 08:58:17', '2021-08-26 08:58:17', NULL, NULL, NULL, 1, '85642056063', 'Uc8z3n', 'https://us05web.zoom.us/s/85642056063?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjNqd0JkbXg5U1FZQjBQWmJseEc1UXFkOEdaalcyLXNIT1NMWEdVMEdfUUkuQUcuTDdsVDV6YmlZZzg2Nl9PM2s2dlluNmh2ZW1jS0h2TVFHQnQ0aHh0ZU9pbVAzZTlWSkpQNE4zUGJUb3ZoMFNiSDlTc29rZDV3ZmFGLTlwSmYuY1pvWV91TFRLRUhVdG5OQnp2OVQydy5ZVkJjOHJYOFdOM2xGdWZBIiwiZXhwIjoxNjI5OTc1NTg5LCJpYXQiOjE2Mjk5NjgzODksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.x_bl2v7ri8ueTMaMFaWsb-W5NmclzsXdnqoLkV_pqlM', 'https://us05web.zoom.us/j/85642056063?pwd=NnNab0dvKzZCbUZOUDMzcXMybnFSZz09', NULL, 0),
(162, 'Drum', '35', '09250206903', 'Yangon', '2021-08-26', NULL, 'TKN-046', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:16:45', '2021-08-26 09:16:45', NULL, NULL, NULL, 1, '81957412420', 'hXMJy6', 'https://us05web.zoom.us/s/81957412420?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkhLZ1duVjI2LU9Oa1FxaEh2elotYVQ5aE1tNmJLODVHaTAtU2VNendySEEuQUcudUM0U2FPMjFSa3ctbHNtTF9SX3J4MFhCTncxaThHc0tyQlVxdEdlWXZzN3RySTJtbW9jR0ZfQks1c2ZrVzFiQVlqdUJUb0liRUw1Z3E0clUuODA5QVZVQ29qU1U2ZjNRbHJMUjcxUS5KcnNvQWwtN2MyNXFWZUp2IiwiZXhwIjoxNjI5OTc2Njk4LCJpYXQiOjE2Mjk5Njk0OTgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.C2av0dzi6hMtuAzlmQnMHtb1zCmr3JDv0td_ZiUEIr4', 'https://us05web.zoom.us/j/81957412420?pwd=Mk1RTmp6WEk1SWZGd1ZsWDVoYkZjdz09', NULL, 0),
(163, 'Drum', '35', '09250206903', 'Yangon', '2021-08-26', NULL, 'TKN-047', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:18:22', '2021-08-26 09:18:22', NULL, NULL, NULL, 1, '81648013093', 'CsTk5h', 'https://us05web.zoom.us/s/81648013093?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Im9KRDlqY2pGb1VhdHRKcHhXcWc5MFowUFMyOFpiWkVuNXZfSnYtUEdtbTQuQUcuNFJxc0VCTUctZ2JJQlNRblNGZHV0YkdUNHVGd0g0TTBHT1VRUDQ3cm5SZFVMSlYtbTlQanZCSmh5TkNnVkdFMjFuYUkwTHBiWXZZSE9xUy0ucnNvLVBuX3dlS0hudE90eU9vVXJjQS56MlUtSURHWTdVSk5lOVJVIiwiZXhwIjoxNjI5OTc2Nzk1LCJpYXQiOjE2Mjk5Njk1OTUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.2nfbAcdVZuFeL-t3ljlaPDTitYRd5EbAt8cbuc7iCLk', 'https://us05web.zoom.us/j/81648013093?pwd=UEdzNExURHQzZTRma1F2N1pZN1N6UT09', NULL, 0),
(164, 'Drum', '35', '09250206903', 'Yangon', '2021-08-26', NULL, 'TKN-048', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:18:25', '2021-08-26 09:18:25', NULL, NULL, NULL, 1, '89284295087', '6Xkgi1', 'https://us05web.zoom.us/s/89284295087?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ilh2Rk5DUGdjMDN6MTNmcllySGpjQjlWVHdKTGxaT3ZHdUpURm5nU2UyWTAuQUcuNDM5aENLNi1od3hEa3dISUpSMFB1UnZGWVROOFA4ZTJTQTB0aldSSXVmME15a2hmMWN3TV9sTFJIRE9DMUJ2YWNsVTZOSE51ZHFNUjJKQXQuZnhRbXVLU3dUNnhVa2wwTXBxb1BpQS4xb1czOV8yNTREejZwOWFUIiwiZXhwIjoxNjI5OTc2Nzk4LCJpYXQiOjE2Mjk5Njk1OTgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.S9QwYZq7TA99cXTsn6nMCgFxxzTnOAAuqgt-4WqvC6k', 'https://us05web.zoom.us/j/89284295087?pwd=aHpSVC8xNHQ1L3A2K09vM1dZZGFCUT09', NULL, 0),
(165, 'Drum', '35', '09250206903', 'Yangon', '2021-08-26', NULL, 'TKN-049', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:27:16', '2021-08-26 09:27:16', NULL, NULL, NULL, 1, '88917881082', 'PC3Lze', 'https://us05web.zoom.us/s/88917881082?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkdlNzI4TkRKWmpzRFBrb1FtXzZHb0JIUXJYcHUxRzZSUWx6emNzWTNFTGMuQUcuZDVITk5PMko3NEVKSXZIemZxWU9mbk1PY29ZXzJyMjNNTEZKVlJ5MTBOZTUtYjNjTjB3eGg0REVYV29xNmprSDJVRXFvTkQ5T3E2Y2NRT1YuTWFIcU1zQ1BUZnZKNVl0MkJFbHJody55Y3dJc210LVYyWEtQVzRTIiwiZXhwIjoxNjI5OTc3MzI5LCJpYXQiOjE2Mjk5NzAxMjksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.jFs5xSwHMS1Hy37O_aH18VK_ka9a_EqFv4trIdeypw4', 'https://us05web.zoom.us/j/88917881082?pwd=cm43K2M4TXcxTVB3NzZDbElWbmFVQT09', NULL, 0),
(166, 'Drum', '35', '09250206903', 'Yangon', '2021-08-26', NULL, 'TKN-050', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:28:27', '2021-08-26 09:28:27', NULL, NULL, NULL, 1, '87199735776', 'M7f7dR', 'https://us05web.zoom.us/s/87199735776?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImxkZ1gzc0xCVUdlbnkzU0lVYmR6S2hRbUhGVXNKQzhId01xaWdwR1ZoWTAuQUcud2ZiR3VIWmF2enFOeU91dDctUWxyNkN5em5CWFhEOHN4NS11d3VVVzdWV09aVEZMSjBOdUR0c0g0a29MSUNMWEQ0d0Q2S0RXWjZxaF9CbDMuX2dON241UW0tbWs4UGFTZVZYQVJEUS4zQmw2TURWU09DcThwNzNhIiwiZXhwIjoxNjI5OTc3Mzk5LCJpYXQiOjE2Mjk5NzAxOTksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.gcYbyeoU7qG-oHHqtt4xNQ4jFboSFKMwocWXg4v1FBU', 'https://us05web.zoom.us/j/87199735776?pwd=M2ljd1loRkVKYWxoNE4wUU1EczJ3Zz09', NULL, 0),
(167, 'Drum', '35', '09250206903', 'Yangon', '2021-08-26', NULL, 'TKN-051', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:28:55', '2021-08-26 09:28:55', NULL, NULL, NULL, 1, '83001257335', '532HPR', 'https://us05web.zoom.us/s/83001257335?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImNzNlgyRmhRUmF5S2ZnUFNiTnYwZVFGcXpvb0hxaEtNOGc5azlLcXVzTTQuQUcuUk4tZTAwd2lSQTNMWHdISWw3UEFQRDFzQWdHU2FqSnhZTVdXeDZWbzZCeTAxV0JvcjNndXR4VlI4Z3Y0dHowazB1T0JJRXczVENnSWF1X2wuaGMtOG1yQWY5Sm1odENHZG1hRGdtQS5xcE5OUjc3NlZqQkJ1VGJLIiwiZXhwIjoxNjI5OTc3NDI4LCJpYXQiOjE2Mjk5NzAyMjgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.rvFlctW9ylrzHPd6LvzO-PsBRe6TL5jrS0Zfx3WL5o8', 'https://us05web.zoom.us/j/83001257335?pwd=dWd0T01zWmVWWWxOeXVKQVppemc0UT09', NULL, 0),
(168, 'Drum', '35', '09250206903', 'Yangon', '2021-08-26', NULL, 'TKN-052', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:29:33', '2021-08-26 09:29:33', NULL, NULL, NULL, 1, '89693983641', 'UMRk4d', 'https://us05web.zoom.us/s/89693983641?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkNqUHNVajFEcjlBZlkxUTVyb1JMcVREcXNyd2g5TFN3WWtXTVl6TkZHYXMuQUcuTTdtVFFUWTlJUjZLLWFzR2lNeTVuV1dQTEFiem5Bb3gxLWJvdFJiaGsxUlBVR1dvaHpiTHdFREtqUTg0elJaRWVldURsUW1LamxSYUlnaXEuR0htdUlTeGJCaDZpSkhPVnlWc3BsUS5tR0NVaXk2c3lHNnhndDVOIiwiZXhwIjoxNjI5OTc3NDY2LCJpYXQiOjE2Mjk5NzAyNjYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.-CfsKjyXXetkimtP1yueMpVaPpIpjqH2R_F83LpydUU', 'https://us05web.zoom.us/j/89693983641?pwd=YkxCd2FqRnlMMG51TWJPRkFjamxiUT09', NULL, 0),
(169, 'Drum', '35', '09250206903', 'Yangon', '2021-08-26', NULL, 'TKN-053', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:31:35', '2021-08-26 09:31:35', NULL, NULL, NULL, 1, '81402365707', 'C4bU9S', 'https://us05web.zoom.us/s/81402365707?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IklXV01sRE9Wb0JTYURGQzhaWjFENlR6UFJUU3Y3R3U3ZU9FWFBvcF9temsuQUcub0w1ZWdWOE1xbWdpSGtoUEtTUGxNTzM0M0h3aUpBd0VKZ3FPbDlvN1JNcHFIbVM2d1EzR0FUbGxHLVNtbldla19vVXQ5Vlgtb2VJNkpIc1oub2ZSUlI2c1FNZFpQaEdEelJQVTZuZy5NX2VHNXRkTHJqYm04VkFGIiwiZXhwIjoxNjI5OTc3NTg3LCJpYXQiOjE2Mjk5NzAzODcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.cB7nKXfXGPWr0vK5uWQH6U0wjvZl65waAx04uxI8z2Y', 'https://us05web.zoom.us/j/81402365707?pwd=bkE3TDJqdEpVSkU1bC9LWS90S0RIZz09', NULL, 0),
(170, 'Drum', '35', '09250206903', 'Yangon', '2021-08-26', NULL, 'TKN-054', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:32:06', '2021-08-26 09:32:06', NULL, NULL, NULL, 1, '89662493523', '5k2bnV', 'https://us05web.zoom.us/s/89662493523?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkJUVS1yNFlzODIzaUJNWDl1N0VaX1FjdnBJemdVc3RqdW1wVmhENWY4djguQUcuRVl5U0l1MDZwSkZQZzdsbWN4cjJzXy1kWHJhOHhKTVd2Rl9QV3dJYnJkVWxfYWlRY1Vyd3BxSGRZVXVWN2Y0ZHRhX3VjNTdzNWNTdWFaZ1kuT3o0dEpuWEhGX291ZGh1aVBPb1hqQS5TTjVrcWFGU25fRlhTQkN0IiwiZXhwIjoxNjI5OTc3NjE5LCJpYXQiOjE2Mjk5NzA0MTksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.8FU8AHD6GU07hG8T5QqiqhBJy067G5ChIfP5JxC9Fzw', 'https://us05web.zoom.us/j/89662493523?pwd=VEgyUHZvbndhZUdTclRIU0ZVYVNKQT09', NULL, 0),
(171, 'Drum', '35', '09250206903', 'Yangon', '2021-08-26', NULL, 'TKN-055', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:32:19', '2021-08-26 09:32:19', NULL, NULL, NULL, 1, '82717228338', 'nhJ1A9', 'https://us05web.zoom.us/s/82717228338?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImVxQko3bzVnUGE0S25TWUdOZ2VZZHF1RUQtbFdEU25kOFBwdUJOV18zbG8uQUcuVTJHajdtVWxjdWw3X0RXV2pXZ216SUNJMzVWZnhGNy16MlQ0Q0tKejJWOWt3Z0xJVjRCODVkYmlFcUotX2R2aUFYdU5lWkppY2pTVEFod2UuNjM0SUVCYWVQdmYxTEQ3RXJJZ25rZy5MVi1ySFpwVUxOdGZUVWJKIiwiZXhwIjoxNjI5OTc3NjMyLCJpYXQiOjE2Mjk5NzA0MzIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.hnzD9TWiwhEfNyjlqT9vfjBC7cqIU7jRcBU0jUT9vBw', 'https://us05web.zoom.us/j/82717228338?pwd=MWRmUUxadURCeDZ6d2hjay9OeWFnUT09', NULL, 0),
(172, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-056', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:34:02', '2021-08-26 09:34:02', NULL, NULL, NULL, 1, '86183831255', 'j27nFa', 'https://us05web.zoom.us/s/86183831255?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ik8xeVEyTmY4MjVPSHplNmJVa2VaWXRVLWlHazJsUjdVYUI2aFMxZUhRX00uQUcuSDFscWxmR2l6bFUtcDVIVFNmdW55azh6dmJreGdpcDBOVmN4SUhGZ2JrdUc2dXlHSTc4WG1TclU5VWliOTRNR0dXanA1SFg2Q0VoeXdpbEouU1Z0WkFUeXB4d3dicTlNejd1UlNJdy5Oa0FDN0N6TlphWEF6Q1FTIiwiZXhwIjoxNjI5OTc3NzM1LCJpYXQiOjE2Mjk5NzA1MzUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.s7SnMF9uGAqJtRY8tSUMst1U9t2bpHWgu_sboboQsv4', 'https://us05web.zoom.us/j/86183831255?pwd=R3U0ZHNxNVRMT3UxTnMyZStZdzZGUT09', NULL, 0),
(173, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-057', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:34:19', '2021-08-26 09:34:19', NULL, NULL, NULL, 1, '89482565905', 'EAjL2V', 'https://us05web.zoom.us/s/89482565905?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InJEdWJoOFhqZ0FyWWFIMU5SYWp4S0o1ejlndXAzVkU2bTJZYmxYcXdLNE0uQUcuVXF3cmxya25raXI5YTh0bXJsZkczQmZWbkJWR0Y5dkE5aVY5ZjZGblJrWEJzN0QyNTJ2UHpFa0dxZFhoS0pjcGd5Rkdjejg0ckJFdGFuRGIuZWdDRWwxdDZ2cnlzX1V4UFppc05oQS54QXRHR3JBNnEtV0s0QWxDIiwiZXhwIjoxNjI5OTc3NzUxLCJpYXQiOjE2Mjk5NzA1NTEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ._nO_CPS5qTuctU9xHJlNDRBb1e8b89eG1o9YfcJn02A', 'https://us05web.zoom.us/j/89482565905?pwd=cWJoMFBXSXdGZ2d5YUZ2Y2VkRUpCQT09', NULL, 0),
(174, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-058', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:35:01', '2021-08-26 09:35:01', NULL, NULL, NULL, 1, '86461366286', '7Vfag8', 'https://us05web.zoom.us/s/86461366286?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjlIZWtmLTRaVTE3N1ZfMnNUb3J0MEZlXzNudndHNXlteWN3el8wLUR2VHMuQUcuLVNMd05iQXhMT0xlNjlEN0huZjJXMkUxcWNDMGZ0UjVjQVBXU2FIOFBsZDZWSDBGNThZZlJWWXNqcjRQX0Q0dkhKVVI3elVVRnRXSzBuanMuY2xYRTE4NENGOFZZeUlVdHQ0bG50dy5xb2ZGNjNIVEM3ZFMzVnVJIiwiZXhwIjoxNjI5OTc3Nzk0LCJpYXQiOjE2Mjk5NzA1OTQsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.9DFAdFehIgXC_Rup0zhh4g_4-AgHd5f-xGWWcNRn-QM', 'https://us05web.zoom.us/j/86461366286?pwd=WHVqZ2hJalRVQXFuekZBa1VmSXdaZz09', NULL, 0),
(175, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-059', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:35:11', '2021-08-26 09:35:11', NULL, NULL, NULL, 1, '88163078554', 'j88WL9', 'https://us05web.zoom.us/s/88163078554?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImRRWTNNZEQwaHMtdHBPcUdYandhbXZGbTRzVUtQTG5Zd1EzeDZLWTA2U3MuQUcudi1DOUR4WV9pZDJzTDdWUlV0OF9QSzVyTHZuZ1NJbzZ3VDdacGp6ZkdsMDNMR1c5UGl2T2h5aUIxU0lKczRaSjlyTzBGV05naFNtN3lkMzEuaHJzeVR2RUhRRlViQl80NVhpUkZ2Zy50eW5BMlBFZE11TGRuY3ktIiwiZXhwIjoxNjI5OTc3ODA0LCJpYXQiOjE2Mjk5NzA2MDQsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.JYPLTOzHge-jE4ZE6PI5WTiWqQvpDLucn57kESSB0uI', 'https://us05web.zoom.us/j/88163078554?pwd=K2Q0allNdjd2ZTRpNVA4dERoVFY5UT09', NULL, 0),
(176, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-060', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:35:20', '2021-08-26 09:35:20', NULL, NULL, NULL, 1, '88920533408', 'Ba85T7', 'https://us05web.zoom.us/s/88920533408?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkpJeU9CbHkyTUIxc19IY0EzWlU0UDBRMjB2S05WRXF3aTk2a3pxdXhPZ2MuQUcuR1Vha3pqc3YtYXdVaWNwMlFrSVAtTTRHVU91ZGZQN0Y4TXZtWm5UNGRPV3hsd2hPMTVnMVRaYXhqZ21rUDFMZTVNUFhmeG51dzIybDBEaVIuRkxxekt3WWJNdm1DbDNuQVhSMHVNdy5DbEFybFQzcEd4TEtHTTlCIiwiZXhwIjoxNjI5OTc3ODEzLCJpYXQiOjE2Mjk5NzA2MTMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.c3h-xE5am0LxUWl5HbD-pwZj6u5TlzYac1gXaVdjvLg', 'https://us05web.zoom.us/j/88920533408?pwd=YmtteU9vZVpkVDA2Zk1hUGZQSTdHZz09', NULL, 0),
(177, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-061', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:35:31', '2021-08-26 09:35:31', NULL, NULL, NULL, 1, '89984621714', 'svuB04', 'https://us05web.zoom.us/s/89984621714?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlRZcUk0U0x3NXRsR3k5eE41SGtrX21vSllsTFh0Zmw1cnpSQmxDbjdzbWMuQUcuc3AxVXA5S3diSXJsVHBud1ZnTjdEYl9jYlF4Zy02amxiWk1Pd1VvTVhxTFE5ai1EZzRfUGlSR2hCSEFGc0hHd0pMZDFwanR5WkNHQmtnODMucjRpYjhFQlJpTGtMYUl6dGRNd3lsQS5sZHJCcXRYZ0dlRU9OR3NPIiwiZXhwIjoxNjI5OTc3ODI0LCJpYXQiOjE2Mjk5NzA2MjQsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.PJ_HesoYeV1Uq_rEqjWjj9Z7iiZKJYxQ5QISMhZEplA', 'https://us05web.zoom.us/j/89984621714?pwd=aXRZMzRBRk9BNThQbzFpN3poakI0QT09', NULL, 0),
(178, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-062', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:36:49', '2021-08-26 09:36:49', NULL, NULL, NULL, 1, '88018161098', '1t8RCD', 'https://us05web.zoom.us/s/88018161098?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkJXYUFEVlE2N2llY0RrVUZPelFVSHlrbHZ0ZWxRblRIZG0tb25OS3J3RkEuQUcuNUNvTWNVZF83ZWpUZ0RzYjBFclpRMkJ4UDNESUhzc0RjaHJkTzRoUUhHQWZMUUtPTlJOVm9ZZFB1YVJmT050VTdzZHNMdVNPakN6Um5OYWQuSVFkYTdobVNvM2s4aHRkdV81aVdSZy5VQmZ3bnlmdVZJb2ZWd1k2IiwiZXhwIjoxNjI5OTc3OTAxLCJpYXQiOjE2Mjk5NzA3MDEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.v8erhSTOWnRzICltk1WS55FxXORpuV4nt4AjzLYw4BY', 'https://us05web.zoom.us/j/88018161098?pwd=bmQxUEZvTHU4cmJzVWpOZkY4RVk5Zz09', NULL, 0),
(179, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-063', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:37:26', '2021-08-26 09:37:26', NULL, NULL, NULL, 1, '87608204395', '8Fw6W2', 'https://us05web.zoom.us/s/87608204395?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkJwa0RzREZESXJjc1lrVnc0cXh2V2c4QUgyUGpvVWdoam55REltX0l4MzQuQUcuRWIyT2FYLTA3YmVkdU5jY3JlS1VxYWdkcmM5eVFOaFFXMVF0d00zQ0lPUHE5a2JtZ0U1QTRVVU83bW9rRDVhd09SeFk5b0xQV1g1MGRDclQubjVnbHlnTHN1M3RYZEJzRDNzTFpDUS5GN0NzQy1BaWEzeU83c2ZfIiwiZXhwIjoxNjI5OTc3OTM5LCJpYXQiOjE2Mjk5NzA3MzksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.aegDb0kkTJjFEIgECqIkHtoofTBZdEihhqZDeaz95xM', 'https://us05web.zoom.us/j/87608204395?pwd=TVhSVVRuT3UwWlJxM3l3eG5CL2tyQT09', NULL, 0),
(180, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-064', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:37:56', '2021-08-26 09:37:56', NULL, NULL, NULL, 1, '87183592114', 's5UhTY', 'https://us05web.zoom.us/s/87183592114?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkwtR2dIUU9tVUFWUmFLSEtOQTRTNnVQcWY5V0dsOVlPckVWTWVfTHVScUUuQUcucXlzaVlKS0szaE9HcFRhTVpDWXhqRXlwS2F5bDc3QVExMWx2LTNhT3Y1bEJWY2I0X2NQVUlZQ210ZTZtTU1vRGZpVHBuazNTTWxtaEM5MEQuc29pcFJndnBYaHBNc0QwMDRxeGJ3Zy5NMm4xT3c3SEQ4UGlhSnprIiwiZXhwIjoxNjI5OTc3OTY4LCJpYXQiOjE2Mjk5NzA3NjgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.IlulS-bSBUfLVrlwdi11jJqYyk104ZP3yGknWt5wFIU', 'https://us05web.zoom.us/j/87183592114?pwd=WERWdmE1U2J3SEJOOTZzYW5GcmRTZz09', NULL, 0),
(181, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-065', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:38:04', '2021-08-26 09:38:04', NULL, NULL, NULL, 1, '88945332907', 'BV1Ljc', 'https://us05web.zoom.us/s/88945332907?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlZTNG1lVUdJRWQteEo1R0lwVFZCYXEwN0JMRTF1R2JDbmdHN25jYktzUk0uQUcueFBuVWFMYmlBVUg5dFZXbzFsNXRUd0NlMjVOMUw1ZTg0eE8tSFQxRWt0a05KUmlKUTF0RTJCenFLb1NFVkRuOWU3RzZxNmxNQzlaSE9ZRjAua0lUT1F1REQwVVNRUmlBYjd1eC03dy5QMEtsaDFoNXFINGdDYnVyIiwiZXhwIjoxNjI5OTc3OTc3LCJpYXQiOjE2Mjk5NzA3NzcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.nEaw9f2fyQ1n69dTI057tdLDWRApXOF-vqZ2y0wNYOM', 'https://us05web.zoom.us/j/88945332907?pwd=WFpMUGdKWXRUT09mekpaKzJoeVdFZz09', NULL, 0),
(182, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-066', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:38:14', '2021-08-26 09:38:14', NULL, NULL, NULL, 1, '88940748791', 'xMSDC6', 'https://us05web.zoom.us/s/88940748791?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Im9SZnpYZHZBOXo0czUwNHZRdWNCNXhycTlDbmxxUWVvbUsxOUFZLXQ5M1EuQUcubVE1T0VSZnJmNzgwQld4enRTQVNmQU0tbTdOa1NkcFVKWFNuT05JWmVVMU9VVTlNVEwtNmtLWUt0LUpOZTRTVG5PQy1haThlOFdOeXpHbW0uNGxRa1QyS3R4OHZNaTJNakQ2RF93US5kdFF0WFJtZTNldWpSeWtZIiwiZXhwIjoxNjI5OTc3OTg3LCJpYXQiOjE2Mjk5NzA3ODcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.p2t_20ubM9I7Cjy-93gPPAtkqOCBfgjRmRZhZZv-v9I', 'https://us05web.zoom.us/j/88940748791?pwd=MkRQL25DQzArejlDZTRNRXJBODA5Zz09', NULL, 0),
(183, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-067', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:42:02', '2021-08-26 09:42:02', NULL, NULL, NULL, 1, '87183527353', 'q0QwBD', 'https://us05web.zoom.us/s/87183527353?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkhMQ2UwU1FQNmt6SFIyc1pzU25mLWw2OUZ5UUZteUUxa1B2Skk0Nk11OGcuQUcuejZxQ0JFdDZ3VmRZUDNDT0ZLQUoxbmxqSHNGZTAwaENqZkV5elhjV21JdWxPbjRBSUh1MEpab2plNmc3aG5VSUwyQVlvazJDcVg4cGlzbTMuVFFQVldraGRZTmt1enVwczZqdVRwZy5HaVhmTlg3M1R2cVVYVXY5IiwiZXhwIjoxNjI5OTc4MjE1LCJpYXQiOjE2Mjk5NzEwMTUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.p0QbZ15i-BYjiPWDxmYN_bVWHhu_NoE2SLaIJdv_Wek', 'https://us05web.zoom.us/j/87183527353?pwd=RzExNXBLa2twVFdNSlVJSDNHV0ZmUT09', NULL, 0),
(184, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-068', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:42:39', '2021-08-26 09:42:39', NULL, NULL, NULL, 1, '83525625541', '5MyEQ8', 'https://us05web.zoom.us/s/83525625541?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjRNZU84NEdEX3pkS2g0bzJ5dGlNMFZENTBMWnZUd3dkTjh0MnZnaU02ejguQUcuMVNpak1VdUtJZFZaR1lPUU9EVnpLdHVFb0JhcU16azFVZ18tUHVkM1doeXVNUUZLLVdTRUJCVy13dVpSMmJEQ0VuUlFBRjE5RVJ0TUtlOHIuME5CdmE3U1ByZTI0TndfaTFQWVRvZy5UemJaZzVkc3VWbmo3UDMyIiwiZXhwIjoxNjI5OTc4MjUxLCJpYXQiOjE2Mjk5NzEwNTEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.ljXY9gDBGP75ObFUBWCH17l7nKrAT3qr4WmlMpq46e8', 'https://us05web.zoom.us/j/83525625541?pwd=VytNWUZsTkhaU3dWaUIxTzBQVlBvUT09', NULL, 0),
(185, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-069', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:43:25', '2021-08-26 09:43:25', NULL, NULL, NULL, 1, '82371237039', 'Jc4uyw', 'https://us05web.zoom.us/s/82371237039?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Indhd01rZml2b3otSzl1S0EwNDB4bE9vbHk2VEl5aWNvS3dTWm56LVpjVGsuQUcuUUVncEZkTC1wS0dwS1N0MlBocDZMU29OaHEtNlhYaEpIUUpkME5ZNGE0cDhoUUlqU041bU9UU25oVjFJTldpbnFvajFxdEM2RDU5aVlzY2IuY1p0YUEwVk8xVncyOFV6WEVQRWdSdy5pcXc0dXBOMVA2NDJJQVh0IiwiZXhwIjoxNjI5OTc4Mjk4LCJpYXQiOjE2Mjk5NzEwOTgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.4OvwpXFsVYMccXxTHHUVHrYPBZozt4KPXyvfHGqM-Sk', 'https://us05web.zoom.us/j/82371237039?pwd=TlNWQlJ6dlpMRklkVmtCZmxKRDF0Zz09', NULL, 0),
(186, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-070', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:44:00', '2021-08-26 09:44:00', NULL, NULL, NULL, 1, '87607180586', '5mdERe', 'https://us05web.zoom.us/s/87607180586?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImhtN3dncktndXJwNklfMXlIX0xkZlNBZU1kampRWFFCTzJmdmlYVllaZmsuQUcudzJIbnRYbmx3TUFyTEFkbTBuNWp0dEJpc1RTd0ZvQ0tSMkwtak5MeWlVSnVsWC1RWS1DSkdZamVrYjZyWnFRZmt2UXlSMXNYLVZDRXVUcUEuUEpRNEhZOGVrQTNCQUE5Y003QmExZy4tUEwtNFQwaFFQbDlmM0ctIiwiZXhwIjoxNjI5OTc4MzMzLCJpYXQiOjE2Mjk5NzExMzMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.Ays-54fIIDN5VsfNJhhK52LrEVG5yDj6-U0U1fpTCws', 'https://us05web.zoom.us/j/87607180586?pwd=L2RodmhadWp0dW5WTkk5d3F5Q0tldz09', NULL, 0),
(187, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-071', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:44:55', '2021-08-26 09:44:55', NULL, NULL, NULL, 1, '83482542194', '8UGMAF', 'https://us05web.zoom.us/s/83482542194?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjNMYTE1WTlHNlNkbzFzaEZKdTdHUXZsQThHMjh5Z09BelM5cy1LSVZYWlkuQUcuNXNaUFZFRGhyemR5QUdHOWZfMmxjWWw5STd4RDBXc1YtWTc0OGp1UXdQSTRCeUJpNW04Ulc2ZlBpOHJPakk3clBSbHJEUC1ZUURURDdLbzEuUlI4SFVnalNGWHpjX2FXSmE1cGZOQS5pVElRaElzcXNlNEFsR3NWIiwiZXhwIjoxNjI5OTc4Mzg4LCJpYXQiOjE2Mjk5NzExODgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.pge5akih2MvRzkE51UuAGUPmN1MuhSVZ1aJqxPgXN3o', 'https://us05web.zoom.us/j/83482542194?pwd=R3hrQ29sUVI0ZmhJOFFnZVVHM0t3UT09', NULL, 0),
(188, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-072', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:45:09', '2021-08-26 09:45:09', NULL, NULL, NULL, 1, '82079885815', 'dN3z4T', 'https://us05web.zoom.us/s/82079885815?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImJUbU1vaUtqcXg4dHRtTl9kcFhmTEQ5Rm91ZlhaTXFnVlI1b2lZY1dPSWsuQUcubzBIeFVCTk80WHJZTjhjaGs0NjRyazdZSEw4Uk9YM2RrY1Y0aE4wLTNZN2dJN2FadDhqSzdzdWhvc1FnYlhISlF6d3FJemF3MElaaHBveEcud1pkdkk2dEVURi00MFoyeWdjaC1VUS5mdk96QVYxamxLd0hkcmc4IiwiZXhwIjoxNjI5OTc4NDAxLCJpYXQiOjE2Mjk5NzEyMDEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.Rjn7GZO7QuScSu7aWZEQx8dx6vLv95jSGWEfZxdsLFE', 'https://us05web.zoom.us/j/82079885815?pwd=NVZwSEJqajZleERCaWhkYUpKSVNHZz09', NULL, 0),
(189, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-073', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:45:59', '2021-08-26 09:45:59', NULL, NULL, NULL, 1, '84446386199', 'vsCyW7', 'https://us05web.zoom.us/s/84446386199?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlNLaml0NFRfazNhOWxKbUl6VTItV1ljR05DYjktZlFhOGhIWlN0T1hvUEUuQUcuT1BibWtLSXVVZWRDdXpGMDdMeWtQY3YxLWpPSEQtclNhdFhoX0NCbUZWZjc4VHB5OUVqZmNMWWQ2MjUxRmNjdXVoaEE0LWJKLW9JSG8yWksud3NHZkVVOXJxRDBUNS1GeXhJUkNEdy5TSnEyYXUxenFqSlZVZFdPIiwiZXhwIjoxNjI5OTc4NDUyLCJpYXQiOjE2Mjk5NzEyNTIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.3HK2lHLKx-Cyq3fT9gFQcc5YxkxcrlHDJ_OG41LLTLk', 'https://us05web.zoom.us/j/84446386199?pwd=d3phTnNyQnRKbUFTaGhLQS9VSUg4Zz09', NULL, 0),
(190, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-074', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 09:55:28', '2021-08-26 09:55:28', NULL, NULL, NULL, 1, '89449364922', '3hdXmU', 'https://us05web.zoom.us/s/89449364922?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InliY295TkNrTDlrT0xidGtHTWN6VHNMVlluSnUwVmM4Q1JndzZ5OE14aWcuQUcuaERMc3ZPa2lqRGtLcE42UmxRT1VIWnk2LUpnN3I2TlJsZEg2SDBHUk5ubWdxdTFTTHVseExPajhrUjBqSWY0Z2NUZHdRNG5HYmMwY3VtQXUuS05tWDZacTF2RmlkRzFTVUZzV01wZy5jSFRzaVNYZ3JCYzdRWGc4IiwiZXhwIjoxNjI5OTc5MDIwLCJpYXQiOjE2Mjk5NzE4MjAsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.BXz98-d_8U5yGlZHIRVDlGH3a5ObOUikVuV-GWu_tJY', 'https://us05web.zoom.us/j/89449364922?pwd=VEdtWXBtLzJqNGlEcVlPb1JxYytLdz09', NULL, 0),
(191, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-075', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 10:00:56', '2021-08-26 10:00:56', NULL, NULL, NULL, 1, '86580423525', 'qemu5C', 'https://us05web.zoom.us/s/86580423525?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjlUT3ZIcDc2MXBURzJyT05zRTFtb0lOVzNPVldkdWFfU2FBR2pTdlNwak0uQUcuRXcyQ0RiZ2lIeTVMaU1iZmlucnJhbFNOQkg5WEgwR1NBeWNucjZIWDhJQTc2cGZwN1BpMmxxU2p0Z1ZfZ1VtWjY2Yjl0ZWsyNHFxeFMxazUuS05PNVYyOUJLU25mSUh2UHowRkpqUS5PQVBlR1RFN0Y1VXJZUS1kIiwiZXhwIjoxNjI5OTc5MzQ4LCJpYXQiOjE2Mjk5NzIxNDgsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.TWXJHKhjeWhVwVYurrip8q30FQLzKTU63GaDcR2lRJs', 'https://us05web.zoom.us/j/86580423525?pwd=S2JmSldMbmQ2WjR3eW5ZOGw1am9KZz09', NULL, 0),
(192, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-076', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 10:05:28', '2021-08-26 10:05:28', NULL, NULL, NULL, 1, '83928899343', 'w6DgGj', 'https://us05web.zoom.us/s/83928899343?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6ImpBdnh1SktmU1Y2akx2WDBtVExPbGd4bkxqMjRGbTVxNFZ3YkJtelZXTU0uQUcuLWRhd1BPckxId3VUVzI0NVNBVkc2QkcyNk5FU0dNQ1hycjYxWXJKbmhLcVFHUEl5a2tPUzgwNVVGYlpNSnFpbkRuR3VISDdxQzl4ZW54Y0wubVphbTdHcnpvSmhCZzBMOW5UWC1oUS5zWVZFRnJHY00xa2RvNUVmIiwiZXhwIjoxNjI5OTc5NjIxLCJpYXQiOjE2Mjk5NzI0MjEsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.vF2psaojPItDc2KLqD9nI5NcmL9Gt-2p9kr0KXL7jsU', 'https://us05web.zoom.us/j/83928899343?pwd=N3pFWUJYQjhnM0xKN0FCVTFPNlMyUT09', NULL, 0),
(193, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-077', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 10:05:40', '2021-08-26 10:05:40', NULL, NULL, NULL, 1, '83270493878', '2u43km', 'https://us05web.zoom.us/s/83270493878?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InhZUVNLajY3YldhelRaclBLM0hmeHV2X2YxQjVKOFBIZllWdkZMYlBDb0kuQUcuVkEwSlByX2ZCLURDaFBySlF2Zm1FLW5kaDJPVVFnVzB0QXBYX0hkRFhEYW5zRmJEX0l1cVZoT3cyc0g2dlplQXFac3Y2Z2VGRDB2RDJOZkUuZmJfODJzUkR5dktiTmlpcTFUcXN6US5tc1ZiYTdYQlF0azJPdGJYIiwiZXhwIjoxNjI5OTc5NjMzLCJpYXQiOjE2Mjk5NzI0MzMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.wl3nl1hSwpgCDL_RfC1XCDHC70eH2JtrvwIRsJ1ulkQ', 'https://us05web.zoom.us/j/83270493878?pwd=cHhGcHhhTk8xRm00RnRmUGRHK3FsUT09', NULL, 0),
(194, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-078', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 10:06:00', '2021-08-26 10:06:00', NULL, NULL, NULL, 1, '89351350344', 'M4g0J9', 'https://us05web.zoom.us/s/89351350344?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IkFEWHFySWFPS19lX29TWnkybWRSelBXcmtDaXhvQkM0eDN4S2FVRVE0OGsuQUcuOVFaRGlNN1o1YWFHby05M1FoeXdOalVCcFlkQ3JJVlUxNE1sMWtBRHhtUms3UFdERVY5dXJ4T1hGdkhRMlJyZWlxRlJqZ3BLbGRjUml5SV8uTGtocExNZGVWQUIwaGFYMGgxRTZ5Zy5EdURnbTZaQ1k1RVdSRjFzIiwiZXhwIjoxNjI5OTc5NjUyLCJpYXQiOjE2Mjk5NzI0NTIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.szHrXgzLr2yeRs97Cb5WLF0wjsFS7CpcKlcfwo5EfR4', 'https://us05web.zoom.us/j/89351350344?pwd=SXR0NkFBSHZFcDV3SnlITTJseThCdz09', NULL, 0),
(195, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-079', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 10:08:16', '2021-08-26 10:08:16', NULL, NULL, NULL, 1, '82079328979', 'EdxS4g', 'https://us05web.zoom.us/s/82079328979?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InFiYXNlQzRlWmd1T0JzT0lOQlRzU3hQVDJCMkVXeFFnTWNkYUZTR0s5cWMuQUcudHl3VU5hbVowRktUQURBVlU4dTNSTWd4YVdFd1d4NXpFQnNuVmhkLVJTdmljSzktMENGVmlSb0g4QXA4dTByUTVYelVxLUlvQTdsSlV3cDEucE5kbFZ0QWlSU2kzRjRfUXd2cjZKdy5uMExHcFVsbVBNT2pEV2ZWIiwiZXhwIjoxNjI5OTc5Nzg5LCJpYXQiOjE2Mjk5NzI1ODksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.OV_leaMVr8x6KNyEol0eIFurhKyCP8gi6G4fGSlONsE', 'https://us05web.zoom.us/j/82079328979?pwd=L1JPZUwwd1VVQ3hlYmxyZDNucG5zUT09', NULL, 0),
(196, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-080', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 10:08:51', '2021-08-26 10:08:51', NULL, NULL, NULL, 1, '84877629721', '2QqMnE', 'https://us05web.zoom.us/s/84877629721?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IlN1MzNfY0hSdWNvUnQtLUFfMGdrZnJBb2IxZmltcEpqNVRiaUd4RHdjaXcuQUcubEVhUGJGSzFyY1NzLS12dEd4d09Lc1dCZ09PU2NqZE5XNGVicW9qYnFDQWpjc1R3TWJFTmdCWHJaUEhKQWxIOUN5bVJRVUlEZXdCRk1BWlouR2tXeTh5WGNxXzJTemNGUjZCX1Nody5RYXFwUVdwenNpRVM2Z0EyIiwiZXhwIjoxNjI5OTc5ODI0LCJpYXQiOjE2Mjk5NzI2MjQsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.54_7gktbKnRAtfSI5u07o6CFfimVkDaLODPaCkDdOn8', 'https://us05web.zoom.us/j/84877629721?pwd=L3VWTlRUVVRjYzVyYUFOMmhYcFFYZz09', NULL, 0),
(197, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-081', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 10:43:16', '2021-08-26 10:43:16', NULL, NULL, NULL, 1, '83948202423', 'KQC05d', 'https://us05web.zoom.us/s/83948202423?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Il8xTnY2d1RkRUx4aG01VEVpR190MVRYOXo5d2NMYmgtQlUzeHdBN3dUdkUuQUcuYjlyek41XzFJR3JmNjZzYjdVUWNqSUZheTFNTEdkVUZuOVFEeE5GY0ptVDZ4WDI3NTE5c0JIay1lazZxLVZLM0taWEo1aUF5aUMzcklZTDUub1FENDdhWjZJbnRzM29DVG1UVkhwZy5QNU5wc280R1FuOTZaWEMtIiwiZXhwIjoxNjI5OTgxODg5LCJpYXQiOjE2Mjk5NzQ2ODksImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.HAEBHXzEfYC_qeKekBrH0ChQs9L5chitVHD3C-GSyEo', 'https://us05web.zoom.us/j/83948202423?pwd=RnAwZUlYbkNyak9pQzRiL0NYVU9OZz09', NULL, 0),
(198, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-082', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 10:48:30', '2021-08-26 10:48:30', NULL, NULL, NULL, 1, '82127482631', 'Tj0HfP', 'https://us05web.zoom.us/s/82127482631?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjBXQ3JRQlVDanRjckxDRTdjOWRpQ1NtTklDci1nc0dqTFNueXk5WHNsa28uQUcueEdILXNkS1F4bzRVeUpKQXFRdzh6b0VoWV9qdmlEZGQ4cUlIRmJWdXQ0NUVsVnlkdmQyQ2ZXc2xOdlBRVmlNd0VIRlA4MUNjNlRVcEFjZFEuSWxNZmQ4NDhmTFUtOWpNWGZ2aEdIZy5XYTV4V1dDOHJmQS01OU5kIiwiZXhwIjoxNjI5OTgyMjAyLCJpYXQiOjE2Mjk5NzUwMDIsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.TNb-C6zmonjVPW3gInVfloF-CJET0slTXMG0pk3CkQ8', 'https://us05web.zoom.us/j/82127482631?pwd=RzhONjV1WTRFbG9pN2k0anlNMTNZZz09', NULL, 0),
(199, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-083', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 10:50:40', '2021-08-26 10:50:40', NULL, NULL, NULL, 1, '85721828153', 'wW4Mqa', 'https://us05web.zoom.us/s/85721828153?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjM5V3Q3Q1o0cHlyLS1BTnhld1JHYXpmX05fSzFvV3lBcGlBWTBjem9OSUEuQUcuOFZVd0UxMGNEZWd2TGJkLTVZRG9tLUptUExsMk9yYVBaY0ZwM0pDYk40dTJBZEhKVEg0a2ZTQVhycXlGOUF2eVd6Z3B2UEN2UWZUM1dtYTUuTERXT2lLMkEtZGFFbnFhS2o0NGxvdy5WRUxqS2NENS1LWTlsUHZJIiwiZXhwIjoxNjI5OTgyMzMzLCJpYXQiOjE2Mjk5NzUxMzMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.KnJg5GeDmR9gQKIBlzaJTam_zWmKkvRKqy0R9H5hU9I', 'https://us05web.zoom.us/j/85721828153?pwd=bzBtc3dha2FINVlYTkhuSHZGTFh1dz09', NULL, 0),
(200, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-084', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 10:51:44', '2021-08-26 10:51:44', NULL, NULL, NULL, 1, '84375485301', 'ZVJ0Xz', 'https://us05web.zoom.us/s/84375485301?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6InBwOERmb2RoR0FVT245ck9yTUZDQjNvRlVqVmlpYUVBUkNTX1JJVTI2d00uQUcuS1RpdUJnZmNId0JNaGY0WDZTMmVZazRJVjUtWHBwWVdOeUNhamVhVjFRUTdpbHZPanFsQzFBZENhUXdxMVVXd09pLWxBY252aDBzMGNhWXouTmFGRHhOckg1QUd2Q3EtdkFZNkJidy53UU94TFRHdWlmTEZYaGtRIiwiZXhwIjoxNjI5OTgyMzk3LCJpYXQiOjE2Mjk5NzUxOTcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.4wn_GZJt6YOH15iIw0dzvEcc44B2NPm34BDzZ0dcRQU', 'https://us05web.zoom.us/j/84375485301?pwd=T1RIc3diejJGWmcyU05mU1hKOWR6Zz09', NULL, 0);
INSERT INTO `bookings` (`id`, `name`, `age`, `phone`, `address`, `booking_date`, `est_time`, `token_number`, `status`, `relation`, `submit_by`, `doctor_id`, `user_id`, `floor_id`, `schedule_change_log_id`, `deleted_at`, `created_at`, `updated_at`, `description`, `diagnosis`, `remark_booking_date`, `booking_status`, `zoom_id`, `zoom_psw`, `start_url`, `join_url`, `patient_document`, `meeting_status`) VALUES
(201, 'Drum', '35', '09199', 'yangon', '2021-08-26', NULL, 'TKN-085', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 10:51:47', '2021-08-26 10:51:47', NULL, NULL, NULL, 1, '88560619358', 'qyWsx8', 'https://us05web.zoom.us/s/88560619358?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ind5azZkdzlhQU1sNnFtVXEwZ2pjcEV3RlRFSjRFTHFWLWdqdUpUR2RQNUkuQUcuMEdiM09oaXRNTjUtYUJYX09kZjVfeHEybFZhLUs2T1hlMUY1SEozRUlNMTlOWmdfQVZsYlN0LWMtQVNoZkV0S2p0QnZrOXBUU09YbDJ2MUEuMi1XbTF3MTFJcUY1MkkzUjFMVEJyZy5Ya2QwVEVhaXF5UkZZNDg2IiwiZXhwIjoxNjI5OTgyNDAwLCJpYXQiOjE2Mjk5NzUyMDAsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.NH-J3GmWIP2_odvbnxfv5ibG1EuGk0G92DZ4Xlh25Wk', 'https://us05web.zoom.us/j/88560619358?pwd=Nk1CNVoyU2UxZkxmMFhZMy9pTVh1QT09', NULL, 0),
(202, 'Drum', '45', '09250206903', 'Yangon', '2021-08-26', NULL, 'TKN-086', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-26 10:52:44', '2021-08-26 10:52:44', NULL, NULL, NULL, 1, '89963009846', 'Tz18px', 'https://us05web.zoom.us/s/89963009846?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IndrQ2JOdEZvMmlyR1VsaHJMQ2JCNHNaZ2E4aWdJQWdIMGVZRWJweldTd1kuQUcucXNYXzEtMzNGMjEwcUhLOFN0eVVtRVhiUG4zTk5GUnljMGkxUnAtWURlOVRzaUdNMHJJUm41N2w1LXpRRXRIQldrOVkyMmR3VkFKVkdSeTkuU1pFSUJNb0xzeEVRd3Y1RzJBQ1Bzdy5jbXFXejZtcTFSdU1vVXExIiwiZXhwIjoxNjI5OTgyNDU2LCJpYXQiOjE2Mjk5NzUyNTYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.zrNIiXOk2eZT8Rpq4z8Iyp58lUUrfx65Ec2rnRfaI9s', 'https://us05web.zoom.us/j/89963009846?pwd=S2VlMUlsa0JXemx4Q3RMcW90Wlk3UT09', NULL, 0),
(203, 'U Zaw Win', '33', ' 09250206903', 'Tarmwe Yangon', '2021-08-27', NULL, 'TKN-001', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-27 06:08:51', '2021-08-27 06:08:51', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 0),
(204, 'Drum', '34', '09250206903', 'yangon', '2021-08-27', NULL, 'TKN-002', 5, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-27 06:08:51', '2021-08-27 10:37:20', 'This guy is in danger', NULL, '2021-08-27', 0, NULL, NULL, NULL, NULL, '/image/patientHistory/1630060640.pdf', 2),
(205, 'Drum', '34', '09250206903', 'yangon', '2021-08-27', NULL, 'TKN-003', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-27 06:17:29', '2021-08-27 10:00:49', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 2),
(206, '၀က်', '40', '09250206903', 'Yangon', '2021-08-27', NULL, 'TKN-004', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-27 07:14:19', '2021-08-27 07:14:19', NULL, NULL, NULL, 1, '86782388109', 'UiG4mW', 'https://us05web.zoom.us/s/86782388109?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Im8tX0NHbTF2YVhia2JqcVJFRnZBM3hLaGRUMWxFdzkwWnVGekxXc3A3MlkuQUcuSjVNckhLZHgycFh6UWZuM1dBSnRhS0E0VUNMMUZ5bUNUYWJPallwa3RkWk5iRFdCTFllVHdqSzVhNVBuejRYa0xtcVplTXhrYnlTbGl3Yy0uSUxrUjFiTHlSSXFyVkxJRFdSdzlKdy5OdWxYUkZNdTAyU3VkeVprIiwiZXhwIjoxNjMwMDU1NzUzLCJpYXQiOjE2MzAwNDg1NTMsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.DIelMDU7gge-z5-Whxgi3GWh1M-VU8zOTr7Px8441dc', 'https://us05web.zoom.us/j/86782388109?pwd=L0hCU3pmRjN1RDRGMHgwQTgybjMwdz09', NULL, 0),
(207, 'Drum', '37', '09250206903', 'Yangon', '2021-08-27', NULL, 'TKN-005', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-27 08:31:43', '2021-08-27 09:55:47', NULL, NULL, NULL, 1, '82835622779', '4zhDVV', 'https://us05web.zoom.us/s/82835622779?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6IjRBcDVtRG5JcnEycGd0Sm1famFkOG9TdW9xazZWQzRhMnBrWG5KTVdjUVUuQUcuU3VaVGdtVWt1c0VVNnZUU1ZGZG4yWElsd1ZjSHk4eldSVTBOVWM5aVVybUR6WkRkSzVFbkJETk95YWpjUWlfV2ZCTzktNGxXVEpidEVOWEguQ3ROV25RdWw3N0I1ckppcXptX0NFQS5oU2UzV0t4dFhIcnZfMDJCIiwiZXhwIjoxNjMwMDYwMzk3LCJpYXQiOjE2MzAwNTMxOTcsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.hwWfkE9xuhvCMJULKNdQw3DL-7720mqWiA64JRy9qgI', 'https://us05web.zoom.us/j/82835622779?pwd=S1J3NkxucjZpYjU3VU5jdk5DeFNCQT09', NULL, 0),
(208, '၀က်', '34', '09333', 'yangon,', '2021-08-27', NULL, 'TKN-006', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-08-27 09:05:02', '2021-08-27 09:48:01', NULL, NULL, NULL, 1, '86504862128', 'x411CG', 'https://us05web.zoom.us/s/86504862128?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Imc5MEg4OG5pMlowOTRGSFJkRmpnc1laUF8taDNCY0lMczZ4Z0t2Q05HSjAuQUcucmRiMldwTURwTnZ0ZVJ2YTZnWERmVGpZRVRaSTIxVTVLSEl2UGNfdlRUWnJYVlVETzhJT1dJNDFxWXl2NkhEUE9XTXc3RVRWQk4ycUFubGwudFdPMUJENWMyOVliOUh4dFdJVVRZQS50bmRBV1JoSXk2ZVZFQm1zIiwiZXhwIjoxNjMwMDYyMzk2LCJpYXQiOjE2MzAwNTUxOTYsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.n3sFtuyvJpi_oAEeHQRXySs5IEaGWRtPTHBR93jt14Y', 'https://us05web.zoom.us/j/86504862128?pwd=aHZseGI5aVF0cVVXY3FNMUpSZ0t1Zz09', NULL, 0),
(209, 'Daw Aye Nyein Thu', '33', ' 09250206903', 'Tarmwe Yangon', '2021-09-04', NULL, 'TKN-001', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-09-04 04:05:32', '2021-09-04 04:05:32', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 0),
(212, 'Mg Mg', '34', '0923463434', 'Room No (34),45 street', '2021-09-04', NULL, 'TKN-004', 4, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-09-04 04:08:15', '2021-09-04 04:26:20', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0),
(213, 'Aung Aung', '45', '09454112122', 'Room No (34),45 street', '2021-09-04', NULL, 'TKN-005', 1, 'operator', 0, 1, 1, 1, NULL, NULL, '2021-09-04 04:09:57', '2021-09-04 04:09:57', NULL, NULL, NULL, 1, '83434455602', 'ZbvJ9c', 'https://us05web.zoom.us/s/83434455602?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IjZ1eVB6Rlg2U2NXWGxnekhoU2E3bXciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEsIndjZCI6InVzMDUiLCJjbHQiOjAsInN0ayI6Ii1rLTBfZElyVGNZMDgtUEprT1dSNWQtb3JnVF92ZFpEd19TWlNaUWxCOVUuQUcuOU1tZzV1ZENsYzJoSlhPdkFoUTAtSUEzOU9tVlVONWx4V2VtTlZyeEFpVm9ZVTluNUZmU2tvaGRtR1BkQ3VmNVQ1ZE9Vd2pwUWNpQmtYWUsuN1oxT3BJT2ZwTzJLd0xnVERYekZhdy5XLU12YW02Tkd4OGFGS0x4IiwiZXhwIjoxNjMwNzM1ODk1LCJpYXQiOjE2MzA3Mjg2OTUsImFpZCI6InE3dkJ2SEg3UlpTTmsySnJVYUs1R3ciLCJjaWQiOiIifQ.3130D-rS7xLlXtt3_zyX2NJ8YEGdLMBHimtbHwoFE7k', 'https://us05web.zoom.us/j/83434455602?pwd=MDJIbGlXRjBlbE1peU9tMm5BbzMxQT09', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking_infos`
--

CREATE TABLE `booking_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_code`, `name`, `created_at`, `updated_at`) VALUES
(5, '01', 'brand_one', '2022-03-06 07:48:55', '2022-03-06 07:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `brand_sub_category`
--

CREATE TABLE `brand_sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_sub_category`
--

INSERT INTO `brand_sub_category` (`id`, `brand_id`, `sub_category_id`, `created_at`, `updated_at`) VALUES
(6, 5, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Buildingone', '2021-06-03 03:54:22', '2021-06-03 03:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `cashes`
--

CREATE TABLE `cashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cashes`
--

INSERT INTO `cashes` (`id`, `account_id`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(1, 37, 'petty account', 10000, NULL, NULL),
(2, 38, 'main sale account', 7000, NULL, '2022-03-04 06:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_code`, `category_name`, `created_at`, `updated_at`) VALUES
(1, '001', 'may', '2022-03-05 09:47:51', '2022-03-05 09:47:51'),
(2, '002', 'zaw', '2022-03-05 09:48:08', '2022-03-05 09:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `clinicappointmentinfos`
--

CREATE TABLE `clinicappointmentinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body_temperature` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloodpressure_lower` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloodpressure_higher` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oxygen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `next_appointmentdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `weight_kg` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight_lb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ht` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lgs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abd` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titles` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `procedure` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinicappointmentinfos`
--

INSERT INTO `clinicappointmentinfos` (`id`, `body_temperature`, `bloodpressure_lower`, `bloodpressure_higher`, `oxygen`, `appointment_id`, `next_appointmentdate`, `created_at`, `updated_at`, `weight_kg`, `weight_lb`, `gc`, `ht`, `lgs`, `abd`, `titles`, `descriptions`, `complaint`, `pr`, `procedure`) VALUES
(3, '100', '100', '100', '100', 6, '2021-09-16', '2021-09-16 14:38:41', '2021-09-16 14:42:31', '0', '0', '', '', '', '', '', '', '', '0', ''),
(4, '90', '100', '110', '90', 8, '2021-09-17', '2021-09-17 09:43:10', '2021-10-05 05:07:45', '60', '10', '200', '300', '400', '500', '[\"sdk\",\"lung\"]', '[\"700\",\"500\"]', 'test complaint', '110', 'test procedure'),
(5, '200', '100', '200', '100', 17, NULL, '2021-09-21 09:20:35', '2021-09-21 09:20:35', '0', '0', '', '', '', '', '', '', '', '0', ''),
(6, NULL, NULL, NULL, NULL, 18, '2021-09-25', '2021-09-25 08:54:34', '2021-09-25 08:54:34', '0', '0', '', '', '', '', '', '', '', '0', ''),
(7, NULL, NULL, NULL, NULL, 15, '2021-10-06', '2021-10-06 07:29:07', '2021-10-06 07:29:07', NULL, NULL, 'kjl', 'kljkl', 'kjl;k', 'kljlkj', '[\"kjlk\"]', '[\"lkjlk\"]', 'hj', NULL, 'kljkl'),
(8, NULL, NULL, NULL, NULL, 22, '2021-10-20', '2021-10-20 09:07:36', '2021-10-20 09:07:36', NULL, NULL, 'testing', 'testing', 'testing2', 'testing4', '[\"teest\"]', '[\"testing6\"]', 'Rapidiously architect alternative alignments rather than 2.0 materials. Interactively syndicate world-class web services through accurate partnerships. Seamlessly.', NULL, 'Rapidiously architect alternative alignments rather than 2.0 materials. Interactively syndicate world-class web services through accurate partnerships. Seamlessly.'),
(9, '100', '100', '100', '100', 23, '2021-11-01', '2021-10-26 11:35:51', '2021-11-01 09:20:09', '100', '100', 'testing', '34', '400', '500', '[null]', '[null]', 'testing', '100', 'testing'),
(10, '100', '100', '100', '100', 25, NULL, '2021-11-01 09:23:45', '2021-11-01 09:23:45', '100', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100', NULL),
(11, '100', '200', '100', '100', 26, '2021-11-02', '2021-11-02 07:48:22', '2021-11-02 08:05:29', '100', '100', 'test one', 'test one', 'test one', 'test one', '[\"teston\"]', '[\"tonest\"]', 'test one', '100', 'skdfk'),
(12, '100', '200', '20', '20', 29, '2021-11-03', '2021-11-03 08:25:25', '2021-11-28 10:22:42', '10', '20', 'testing', '300', 'liver', '43', '[\"teston\",\"lungl\"]', '[\"tonest\",\"moonlight\"]', 'ksdfjilkk', '100', 'jlkj'),
(13, '100', '100', '100', '1001', 34, NULL, '2021-11-08 08:36:51', '2021-11-08 08:36:51', '100', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100', NULL),
(15, '96', '130', '80', '97', 39, NULL, '2021-11-15 11:21:05', '2021-11-15 11:21:05', '64', '140', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '96', NULL),
(16, '100', '120', '80', '99', 40, NULL, '2021-11-16 10:08:16', '2021-11-16 10:08:16', '12', '454', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99', NULL),
(17, '98', '120', '80', '99', 41, '2021-11-21', '2021-11-19 05:20:16', '2021-11-21 07:26:57', '20', '60', 'sdfkl', 'sldkf', 's;ldfk', 'sldkfsl', '[]', '[]', 'skdf;saldf', '80', 'sdf'),
(18, '100', '100', '100', '100', 2, NULL, '2021-11-21 13:35:55', '2021-11-21 13:35:55', '100', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100', NULL),
(19, '10', '20', '30', '40', 43, NULL, '2021-12-17 03:32:57', '2021-12-17 03:32:57', '50', '60', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '70', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clinic_patients`
--

CREATE TABLE `clinic_patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_month` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinic_patients`
--

INSERT INTO `clinic_patients` (`id`, `name`, `father_name`, `age`, `phone`, `address`, `created_at`, `updated_at`, `code`, `age_month`) VALUES
(3, 'Mg Mg', 'Mg Mg Father', 34, '09250206903', 'Yangon', '2021-09-10 09:34:56', '2021-09-10 09:34:56', 'PTN-0001', 0),
(4, 'Mg Mg 2', 'Mg Mg Father', 34, '09250206903', 'Yangon', '2021-09-10 09:35:38', '2021-09-10 09:35:38', 'PTN-0002', 0),
(5, 'Drum', 'Mg Mg Father', 35, '09199', 'y', '2021-09-10 09:41:34', '2021-09-10 09:41:34', 'PTN-0003', 0),
(6, 'Drum2', 'Mg Mg Father', 35, '09199', 'y', '2021-09-10 09:52:21', '2021-09-10 09:52:21', 'PTN-0004', 0),
(7, 'Mg Mg 3', 'Mg Mg Father', 34, '095464564', 'yANGHJ', '2021-09-10 09:55:10', '2021-09-10 09:55:10', 'PTN-0005', 0),
(8, 'Baung Baung', 'Baung Baung Father', 89, '094456456', 'Yangon', '2021-09-10 12:34:39', '2021-09-10 12:34:39', 'PTN-0006', 0),
(9, 'Daung Daung', 'Daung Daung Father', 37, '094564564', 'Yangon', '2021-09-13 09:21:23', '2021-09-13 09:21:23', 'PTN-0007', 0),
(10, 'Eg Eg', 'Eg Eg father', 59, '09536756', 'Yangon', '2021-09-13 09:36:34', '2021-09-13 09:36:34', 'PTN-0008', 0),
(11, 'Gaung Gaung', 'Gung Gung Father', 35, '09444', 'Yangon', '2021-09-13 09:49:49', '2021-09-13 09:49:49', 'PTN-0009', 0),
(12, 'Hung Hung', 'Hung Hung Father', 34, '094564345', 'Yangon ,45 street', '2021-09-13 09:54:25', '2021-09-13 09:54:25', 'PTN-0010', 0),
(13, 'Ko Tin Swe', 'U Aye Han', 37, '09245643563', 'Soth Okkalapa', '2021-09-21 09:19:09', '2021-09-21 09:19:09', 'PTN-0011', 0),
(15, 'test', 'test father', 37, '09250206903', 'yangon', '2021-09-25 08:27:45', '2021-09-25 08:27:45', 'PTN-0012', 0),
(16, 'test two', 'test two father', 37, '09250206903', 'yangon', '2021-09-25 08:28:16', '2021-09-25 08:28:16', 'PTN-0013', 0),
(17, 'Ko Lu Aye', 'Ko Lu Aye', 53, '09456456345', 'Yangon', '2021-09-27 09:47:10', '2021-09-27 09:47:10', 'PTN-0014', 0),
(18, 'Ko Tin Ag', 'Ko Tin Ag father', 43, '064545', 'sfaskldfjk', '2021-10-15 04:26:55', '2021-10-15 04:26:55', 'PTN-0015', 0),
(19, 'သဇင်မြင့်မိုးသူဇာ', 'မိုးသူဇာ', 12, '094545454', 'ရန်ကုန်', '2021-11-12 09:28:52', '2021-11-12 09:28:52', 'PTN-0016', 0),
(20, 'သုတ', 'သုတ တ', 25, '09786543583', 'Yangon', '2021-11-15 06:44:59', '2021-11-15 06:44:59', 'PTN-0017', 0),
(21, 'ကြယ်စင်', 'ဦးညာူိ', 25, '09754354356184', 'Yangon', '2021-11-15 06:45:45', '2021-11-15 06:45:45', 'PTN-0018', 0),
(22, '​ဒေါ်​အေး​အေးမြင့်', 'ဦးးး', 63, '09972340102', '၄၂/ ဦးလင်းလမ်း', '2021-11-15 11:15:06', '2021-11-15 11:15:06', 'PTN-0019', 0),
(23, 'သုတ', 'ဦးညာူိ', 52, '897546585', '41', '2021-11-16 10:07:23', '2021-11-16 10:07:23', 'PTN-0020', 0),
(24, 'Mya Mya', 'U', 23, '0987375483154', 'Yangon', '2021-11-19 05:19:05', '2021-11-19 05:19:05', 'PTN-0021', 0),
(25, 'YKKO', 'POPO', 4, '09', 'y', '2021-12-17 03:25:52', '2021-12-17 03:25:52', 'PTN-0022', 5),
(26, 'YKKO', 'POPO', 4, '09', 'y', '2021-12-17 03:26:48', '2021-12-17 03:26:48', 'PTN-0023', 0);

-- --------------------------------------------------------

--
-- Table structure for table `counting_units`
--

CREATE TABLE `counting_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_code` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_code` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reorder_quantity` int(11) NOT NULL,
  `normal_sale_price` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counting_units`
--

INSERT INTO `counting_units` (`id`, `unit_name`, `unit_code`, `original_code`, `reorder_quantity`, `normal_sale_price`, `purchase_price`, `item_id`, `stock_qty`, `deleted_at`, `created_at`, `updated_at`) VALUES
(118, 'Tablet', NULL, NULL, 0, 0, 0, 26, 0, NULL, '2021-11-01 03:45:00', '2021-11-01 03:45:00'),
(119, 'Capsule', NULL, NULL, 0, 0, 0, 27, 0, NULL, '2021-11-01 04:08:56', '2021-11-01 04:08:56'),
(120, 'Capsule', NULL, NULL, 0, 0, 0, 28, 0, NULL, '2021-11-01 04:09:22', '2021-11-01 04:09:22'),
(121, 'Tablet', NULL, NULL, 0, 0, 0, 29, 0, NULL, '2021-11-01 04:09:53', '2021-11-01 04:09:53'),
(122, 'Tablet', NULL, NULL, 0, 0, 0, 30, 0, NULL, '2021-11-01 04:10:12', '2021-11-01 04:10:12'),
(123, 'Tablet', NULL, NULL, 0, 0, 0, 31, 0, NULL, '2021-11-01 04:10:33', '2021-11-01 04:10:33'),
(124, 'Tablet', NULL, NULL, 0, 0, 0, 32, 0, NULL, '2021-11-01 04:11:11', '2021-11-01 04:11:11'),
(125, 'Tablet', NULL, NULL, 0, 0, 0, 33, 0, NULL, '2021-11-01 04:11:28', '2021-11-01 04:11:28'),
(126, 'Tablet', NULL, NULL, 0, 0, 0, 34, 0, NULL, '2021-11-01 04:11:43', '2021-11-01 04:11:43'),
(127, 'Tablet', NULL, NULL, 0, 0, 0, 35, 0, NULL, '2021-11-01 04:12:03', '2021-11-01 04:12:03'),
(128, 'Tablet', NULL, NULL, 0, 0, 0, 36, 0, NULL, '2021-11-01 04:12:24', '2021-11-01 04:12:24'),
(129, 'Tablet', NULL, NULL, 0, 0, 0, 38, 0, NULL, '2021-11-01 04:13:58', '2021-11-01 04:13:58'),
(130, 'Tablet', NULL, NULL, 0, 0, 0, 39, 0, NULL, '2021-11-01 04:14:13', '2021-11-01 04:14:13'),
(131, 'Tablet', NULL, NULL, 0, 0, 0, 40, 0, NULL, '2021-11-01 04:14:29', '2021-11-01 04:14:29'),
(132, 'Tablet', NULL, NULL, 0, 0, 0, 41, 0, NULL, '2021-11-01 04:14:47', '2021-11-01 04:14:47'),
(133, 'Tablet', NULL, NULL, 0, 0, 0, 42, 0, NULL, '2021-11-01 04:15:02', '2021-11-01 04:15:02'),
(134, 'Tablet', NULL, NULL, 0, 0, 0, 43, 0, NULL, '2021-11-01 04:15:19', '2021-11-01 04:15:19'),
(135, 'Tablet', NULL, NULL, 0, 0, 0, 44, 0, NULL, '2021-11-01 04:15:35', '2021-11-01 04:15:35'),
(136, 'Tablet', NULL, NULL, 0, 0, 0, 45, 0, NULL, '2021-11-01 04:15:49', '2021-11-01 04:15:49'),
(137, 'Tablet', NULL, NULL, 0, 0, 0, 46, 0, NULL, '2021-11-01 04:16:02', '2021-11-01 04:16:02'),
(138, 'Tablet', NULL, NULL, 0, 0, 0, 47, 0, NULL, '2021-11-01 04:16:15', '2021-11-01 04:16:15'),
(139, 'Tablet', NULL, NULL, 0, 0, 0, 48, 0, NULL, '2021-11-01 04:16:29', '2021-11-01 04:16:29'),
(140, 'Tablet', NULL, NULL, 0, 0, 0, 50, 0, NULL, '2021-11-01 04:16:52', '2021-11-01 04:16:52'),
(141, 'Tablet', NULL, NULL, 0, 0, 0, 51, 0, NULL, '2021-11-01 04:17:17', '2021-11-01 04:17:17'),
(142, 'Tablet', NULL, NULL, 0, 0, 0, 52, 0, NULL, '2021-11-01 04:17:28', '2021-11-01 04:17:28'),
(143, 'Tablet', NULL, NULL, 0, 0, 0, 53, 0, NULL, '2021-11-01 04:17:38', '2021-11-01 04:17:38'),
(144, 'Tablet', NULL, NULL, 0, 0, 0, 54, 0, NULL, '2021-11-01 04:17:55', '2021-11-01 04:17:55'),
(145, 'Syrup', NULL, NULL, 0, 0, 0, 55, 0, NULL, '2021-11-01 04:49:16', '2021-11-01 04:49:16'),
(146, 'Syrup', NULL, NULL, 0, 0, 0, 56, 0, NULL, '2021-11-01 04:59:05', '2021-11-01 04:59:05'),
(147, 'Tablet', NULL, NULL, 0, 0, 0, 57, 0, NULL, '2021-11-01 05:00:16', '2021-11-01 05:00:16'),
(148, 'Tablet', NULL, NULL, 0, 0, 0, 58, 0, NULL, '2021-11-01 05:00:37', '2021-11-01 05:00:37'),
(149, 'Syrup', NULL, NULL, 0, 0, 0, 59, 0, NULL, '2021-11-01 05:01:01', '2021-11-01 05:01:01'),
(150, 'Syrup', NULL, NULL, 0, 0, 0, 60, 0, NULL, '2021-11-01 05:03:52', '2021-11-01 05:03:52'),
(151, 'Tablet', NULL, NULL, 0, 0, 0, 61, 0, NULL, '2021-11-01 05:04:20', '2021-11-01 05:04:20'),
(152, 'Tablet', NULL, NULL, 0, 0, 0, 62, 0, NULL, '2021-11-01 05:05:34', '2021-11-01 05:05:34'),
(153, 'Tablet', NULL, NULL, 0, 0, 0, 63, 0, NULL, '2021-11-01 05:06:19', '2021-11-01 05:06:19'),
(154, 'Tablet', NULL, NULL, 0, 0, 0, 64, 0, NULL, '2021-11-01 05:09:02', '2021-11-01 05:09:02'),
(155, 'Capsule', NULL, NULL, 0, 0, 0, 65, 0, NULL, '2021-11-01 05:11:12', '2021-11-01 05:11:12'),
(156, 'Capsule', NULL, NULL, 0, 0, 0, 66, 0, NULL, '2021-11-01 05:12:08', '2021-11-01 05:12:16'),
(157, 'Tablet', NULL, NULL, 0, 0, 0, 67, 0, NULL, '2021-11-01 05:13:40', '2021-11-01 05:13:40'),
(158, 'Tablet', NULL, NULL, 0, 0, 0, 68, 0, NULL, '2021-11-01 05:14:08', '2021-11-01 05:14:08'),
(159, 'Tablet', NULL, NULL, 0, 0, 0, 69, 0, NULL, '2021-11-01 05:14:37', '2021-11-01 05:14:37'),
(160, 'Tablet', NULL, NULL, 0, 0, 0, 69, 0, '2021-11-01 05:14:54', '2021-11-01 05:14:37', '2021-11-01 05:14:54'),
(161, 'Tablet', NULL, NULL, 0, 0, 0, 70, 0, NULL, '2021-11-01 05:15:22', '2021-11-01 05:15:22'),
(162, 'Bottle', NULL, NULL, 0, 0, 0, 71, 0, NULL, '2021-11-01 05:15:57', '2021-11-01 05:15:57'),
(163, 'Tablet', NULL, NULL, 0, 0, 0, 72, 0, NULL, '2021-11-01 05:16:46', '2021-11-01 05:16:46'),
(164, 'Tablet', NULL, NULL, 0, 0, 0, 73, 0, NULL, '2021-11-01 05:17:05', '2021-11-01 05:17:05'),
(165, 'Tablet', NULL, NULL, 0, 0, 0, 74, 0, NULL, '2021-11-01 05:18:20', '2021-11-01 05:18:20'),
(166, 'Tablet', NULL, NULL, 0, 0, 0, 75, 0, NULL, '2021-11-01 05:18:57', '2021-11-01 05:18:57'),
(167, 'Tablet', NULL, NULL, 0, 0, 0, 76, 0, NULL, '2021-11-01 05:19:12', '2021-11-01 05:19:12'),
(168, 'Capsule', NULL, NULL, 0, 0, 0, 77, 0, NULL, '2021-11-01 05:19:48', '2021-11-01 05:19:48'),
(169, 'Tablet', NULL, NULL, 0, 0, 0, 78, 0, NULL, '2021-11-01 05:21:45', '2021-11-01 05:21:45'),
(170, 'Tablet', NULL, NULL, 0, 0, 0, 79, 0, NULL, '2021-11-01 05:22:29', '2021-11-01 05:22:29'),
(171, 'Tablet', NULL, NULL, 0, 0, 0, 79, 0, '2021-11-01 05:22:35', '2021-11-01 05:22:29', '2021-11-01 05:22:35'),
(172, 'Tablet', NULL, NULL, 0, 0, 0, 80, 0, NULL, '2021-11-01 05:22:51', '2021-11-01 05:22:51'),
(173, 'Tablet', NULL, NULL, 0, 0, 0, 81, 0, NULL, '2021-11-01 05:23:12', '2021-11-01 05:23:12'),
(174, 'Tablet', NULL, NULL, 0, 0, 0, 82, 0, NULL, '2021-11-01 05:23:39', '2021-11-01 05:23:39'),
(175, 'Tablet', NULL, NULL, 0, 0, 0, 83, 0, NULL, '2021-11-01 05:23:55', '2021-11-01 05:23:55'),
(176, 'Tablet', NULL, NULL, 0, 0, 0, 84, 0, NULL, '2021-11-01 05:24:08', '2021-11-01 05:24:08'),
(177, 'Tablet', NULL, NULL, 0, 0, 0, 85, 0, NULL, '2021-11-01 05:24:18', '2021-11-01 05:24:18'),
(178, 'Tablet', NULL, NULL, 0, 0, 0, 86, 0, NULL, '2021-11-01 05:24:30', '2021-11-01 05:24:30'),
(179, 'Tablet', NULL, NULL, 0, 0, 0, 87, 0, NULL, '2021-11-01 05:24:40', '2021-11-01 05:24:40'),
(180, 'Tablet', NULL, NULL, 0, 0, 0, 88, 0, NULL, '2021-11-01 05:25:24', '2021-11-01 05:25:24'),
(181, 'Capsule', NULL, NULL, 0, 0, 0, 89, 0, NULL, '2021-11-01 05:25:41', '2021-11-01 05:25:41'),
(182, 'Tablet', NULL, NULL, 0, 0, 0, 90, 0, NULL, '2021-11-01 05:25:55', '2021-11-01 05:25:55'),
(183, 'Capsule', NULL, NULL, 0, 0, 0, 91, 0, NULL, '2021-11-01 05:26:11', '2021-11-01 05:26:11'),
(184, 'Capsule', NULL, NULL, 0, 0, 0, 92, 0, NULL, '2021-11-01 05:26:23', '2021-11-01 05:26:23'),
(185, 'Tablet', NULL, NULL, 0, 0, 0, 93, 0, NULL, '2021-11-01 05:26:34', '2021-11-01 05:26:34'),
(186, 'Tablet', NULL, NULL, 0, 0, 0, 94, 0, NULL, '2021-11-01 05:26:56', '2021-11-01 05:26:56'),
(187, 'Capsule', NULL, NULL, 0, 0, 0, 95, 0, NULL, '2021-11-01 05:27:51', '2021-11-01 05:27:51'),
(188, 'Cream', NULL, NULL, 0, 0, 0, 96, 0, NULL, '2021-11-01 05:28:06', '2021-11-01 05:28:06'),
(189, 'Sachet', NULL, NULL, 0, 0, 0, 97, 0, NULL, '2021-11-01 05:28:30', '2021-11-01 05:28:30'),
(190, 'Bottle', NULL, NULL, 0, 0, 0, 98, 0, NULL, '2021-11-01 05:34:09', '2021-11-01 05:34:09'),
(191, 'Tablet', NULL, NULL, 0, 0, 0, 99, 0, NULL, '2021-11-01 05:34:23', '2021-11-01 05:34:23'),
(192, 'Tablet', NULL, NULL, 0, 0, 0, 100, 0, NULL, '2021-11-01 05:34:37', '2021-11-01 05:34:37'),
(193, 'Tablet', NULL, NULL, 0, 0, 0, 101, 0, NULL, '2021-11-01 05:34:48', '2021-11-01 05:34:48'),
(194, 'Bottle', NULL, NULL, 0, 0, 0, 102, 0, NULL, '2021-11-01 05:34:59', '2021-11-01 05:34:59'),
(195, 'Tablet', NULL, NULL, 0, 0, 0, 103, 0, NULL, '2021-11-01 05:35:14', '2021-11-01 05:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `counting_unit_voucher`
--

CREATE TABLE `counting_unit_voucher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` int(10) UNSIGNED NOT NULL,
  `counting_unit_id` int(10) UNSIGNED NOT NULL,
  `quantity` float NOT NULL COMMENT 'total qty for clinic ',
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dose` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doseper_qty` float DEFAULT NULL,
  `duration` int(11) DEFAULT NULL COMMENT 'days',
  `look_procedure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counting_unit_voucher`
--

INSERT INTO `counting_unit_voucher` (`id`, `voucher_id`, `counting_unit_id`, `quantity`, `price`, `created_at`, `updated_at`, `dose`, `doseper_qty`, `duration`, `look_procedure`) VALUES
(117, 1385, 118, 1, 0, NULL, NULL, 'Hs', 1, 1, 0),
(118, 1385, 120, 1, 0, NULL, NULL, 'Hs', 1, 1, 0),
(119, 1386, 118, 1, 0, NULL, NULL, 'Hs', 1, 1, 0),
(184, 1389, 121, 0, 0, NULL, NULL, 'Injection', 5, 2, 0),
(185, 1389, 119, 0, 0, NULL, NULL, 'Injection', 1, 1, 1),
(195, 1390, 119, 5, 0, NULL, NULL, '5 times', 1, 1, 1),
(196, 1391, 119, 0, 0, NULL, NULL, 'Choose', 1, 1, 1),
(204, 1387, 118, 1, 0, NULL, NULL, 'OD', 1, 1, 0),
(205, 1387, 119, 0, 0, NULL, NULL, 'Choose', 1, 1, 0),
(213, 1388, 118, 5, 0, NULL, NULL, '5 times', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ongoing_project` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `company_name`, `business_type`, `address`, `email`, `website`, `contact_person_name`, `contact_number`, `ongoing_project`, `created_at`, `updated_at`) VALUES
(1, 'Mg Aung Gyi', 'Alone', 'Yangon', 'aung123@gmail.com', 'aungaung.com', 'Mg Aung Lay', '09887877654', NULL, '2022-02-25 09:21:13', '2022-02-25 09:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `customer_sale_project`
--

CREATE TABLE `customer_sale_project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_project_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_sale_project`
--

INSERT INTO `customer_sale_project` (`id`, `sale_project_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 8, 1, NULL, NULL),
(3, 9, 1, NULL, NULL),
(4, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Monday', '2020-12-28 05:30:45', '2020-12-28 05:30:45'),
(2, 'Tuesday', '2020-12-28 05:30:45', '2020-12-28 05:30:45'),
(3, 'Wednesday', '2020-12-28 05:33:06', NULL),
(4, 'Thursday', '2020-12-28 05:33:06', '2020-12-28 05:33:06'),
(5, 'Friday', '2020-12-28 05:33:37', '2020-12-28 05:33:37'),
(6, 'Saturday', '2020-12-28 05:33:37', '2020-12-28 05:33:37'),
(7, 'Sunday', '2020-12-28 05:33:53', '2020-12-28 05:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `day_doctor`
--

CREATE TABLE `day_doctor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_doctor`
--

INSERT INTO `day_doctor` (`id`, `day_id`, `doctor_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '12:30:00', '14:30:00', NULL, NULL),
(2, 2, 1, '12:30:00', '14:30:00', NULL, NULL),
(3, 3, 1, '12:30:00', '14:30:00', NULL, NULL),
(4, 4, 1, '12:30:00', '14:30:00', NULL, NULL),
(5, 5, 1, '12:30:00', '14:30:00', NULL, NULL),
(6, 6, 1, '12:30:00', '14:30:00', NULL, NULL),
(7, 7, 1, '10:00:00', '12:00:00', NULL, NULL),
(14, 1, 2, '07:00:00', '23:00:00', NULL, NULL),
(15, 2, 2, '07:00:00', '23:00:00', NULL, NULL),
(16, 3, 2, '07:00:00', '23:00:00', NULL, NULL),
(17, 4, 2, '07:00:00', '23:00:00', NULL, NULL),
(18, 5, 2, '07:00:00', '23:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `department_code`, `description`, `status`, `photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Clinic One', 'DEPT0001', 'Clinic One', 1, '5871e5df632851fbcfb2d3525427c344.jpg', '2020-12-28 05:13:41', '2020-12-28 05:13:41'),
(2, 'Clinic Two', 'DEPT0002', 'Clinic Two', 1, 'doctor-visit.jpg', '2021-06-03 04:21:17', '2021-06-03 04:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `name`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Abdominal Lump\r\n', NULL, NULL, 0),
(2, 'Abdominal Pain\r\n', NULL, NULL, 0),
(5, 'Abnormal Facial Expressions\r\n\r\n', NULL, NULL, 0),
(6, 'Dizziness', NULL, NULL, 0),
(7, 'Muscle stiffness (rigidity)', NULL, NULL, 0),
(8, 'Agitation', NULL, NULL, 0),
(9, 'Fever', '2021-10-04 04:01:06', '2021-10-04 04:01:06', 0),
(10, 'blood cancer', '2021-11-03 04:35:22', '2021-11-03 04:35:22', 19),
(11, 'Fever', '2021-11-05 04:24:42', '2021-11-05 04:24:42', 5),
(12, 'Ill', '2021-11-05 04:24:52', '2021-11-05 04:24:52', 5),
(13, 'test one', '2021-11-21 06:40:05', '2021-11-21 06:40:05', 5),
(14, 'test two', '2021-11-21 06:41:34', '2021-11-21 06:41:34', 5),
(15, 'test three', '2021-11-21 06:43:51', '2021-11-21 06:43:51', 5),
(16, 'test foure', '2021-11-21 06:44:19', '2021-11-21 06:44:19', 5),
(17, 'test too', '2021-11-21 06:47:50', '2021-11-21 06:47:50', 5),
(18, 'test five', '2021-11-21 06:48:28', '2021-11-21 06:48:28', 5),
(19, 'test1', '2021-11-21 06:48:55', '2021-11-21 06:48:55', 5),
(20, 'test one', '2021-11-21 06:53:39', '2021-11-21 06:53:39', 5),
(21, 'toehs', '2021-11-21 06:54:06', '2021-11-21 06:54:06', 5),
(22, 'test onewe', '2021-11-21 07:11:12', '2021-11-21 07:11:12', 5),
(23, 'test4', '2021-11-21 07:11:48', '2021-11-21 07:11:48', 5),
(24, 'test5', '2021-11-21 07:12:14', '2021-11-21 07:12:14', 5),
(25, 'test3', '2021-11-21 07:12:42', '2021-11-21 07:12:42', 5),
(26, 'test6', '2021-11-21 07:13:15', '2021-11-21 07:13:15', 5),
(27, 'test sss', '2021-11-21 07:13:54', '2021-11-21 07:13:54', 5),
(28, 'sdsdf', '2021-11-21 07:14:37', '2021-11-21 07:14:37', 5),
(29, 'sdfsfd', '2021-11-21 07:15:19', '2021-11-21 07:15:19', 5),
(30, 'sdks', '2021-11-21 07:16:32', '2021-11-21 07:16:32', 5),
(31, 'tiels', '2021-11-21 07:21:42', '2021-11-21 07:21:42', 5),
(32, 'sdfsdss', '2021-11-21 07:23:15', '2021-11-21 07:23:15', 5),
(33, 'sdfas', '2021-11-21 07:23:49', '2021-11-21 07:23:49', 5),
(34, 'sdfsdsssdf', '2021-11-21 07:24:51', '2021-11-21 07:24:51', 5),
(35, 'sdfsdfsdssfsadf', '2021-11-21 07:26:10', '2021-11-21 07:26:10', 5),
(36, 'smsakdmsklc', '2021-11-21 07:26:31', '2021-11-21 07:26:31', 5);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_doc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `online_early_payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `doctor_code`, `position`, `about_doc`, `gender`, `address`, `phone`, `photo`, `status`, `department_id`, `user_id`, `created_at`, `updated_at`, `online_early_payment`) VALUES
(1, 'Testing Doctor', 'DOC-0002', 'Dr.', 'Nice Guy', 'male', 'yangon', '09250206903', 'user.jpg', 1, 1, 19, '2020-12-28 05:27:47', '2021-09-02 11:35:56', 3000),
(2, 'Dr. Thel Su San', '', 'Doctor', 'The most talent doctor', 'female', 'yangon', '09199', 'user.jpg', 1, 2, 5, '2021-06-03 04:27:24', '2021-11-01 07:38:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_day`
--

CREATE TABLE `doctor_day` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_infos`
--

CREATE TABLE `doctor_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maximum_token` int(11) NOT NULL,
  `reserved_token` int(11) NOT NULL,
  `advance_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_per_patient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_infos`
--

INSERT INTO `doctor_infos` (`id`, `booking_range`, `maximum_token`, `reserved_token`, `advance_time`, `time_per_patient`, `status`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, '3-week', 10, 1, '0', '0', 2, 1, '2020-12-28 05:27:47', '2021-09-02 11:44:24'),
(2, '50-week', 50, 1, '0', '0', 1, 2, '2021-06-03 04:27:24', '2021-06-03 04:27:24'),
(13, '8-week', 9, 8, '0', '0', 1, 13, '2021-11-01 07:55:37', '2021-11-01 07:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_notifications`
--

CREATE TABLE `doctor_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_service`
--

CREATE TABLE `doctor_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_times`
--

CREATE TABLE `doctor_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_doctor_id` int(10) UNSIGNED NOT NULL,
  `floor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doses`
--

CREATE TABLE `doses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doses`
--

INSERT INTO `doses` (`id`, `name`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'Choose ', 0, NULL, NULL),
(2, 'Injection', 0, NULL, NULL),
(3, 'OD', 1, NULL, NULL),
(4, 'Cm', 1, NULL, NULL),
(5, 'Hs', 1, NULL, NULL),
(6, 'pm', 1, NULL, NULL),
(7, 'BD', 2, NULL, NULL),
(8, 'TDs', 3, NULL, NULL),
(9, 'QID', 4, NULL, NULL),
(10, '5 times', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education_information`
--

CREATE TABLE `education_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_information`
--

INSERT INTO `education_information` (`id`, `degree`, `university`, `subject`, `doctor_id`, `created_at`, `updated_at`) VALUES
(3, 'Doctor Degree', 'University', 'Medical', 6, '2021-06-03 04:29:06', '2021-06-03 04:29:06'),
(4, 'iii', 'iii', 'ii', 7, '2021-06-03 04:30:03', '2021-06-03 04:30:03'),
(5, 'ii', 'ii', 'ii', 8, '2021-06-03 04:30:59', '2021-06-03 04:30:59'),
(6, 'iii', 'ii', 'ii', 9, '2021-06-03 04:31:43', '2021-06-03 04:31:43'),
(7, 'ii', 'ii', 'ii', 10, '2021-06-03 04:34:19', '2021-06-03 04:34:19'),
(8, 'dd', 'dd', 'dd', 11, '2021-06-28 11:05:44', '2021-06-28 11:05:44'),
(27, 'Degree', 'University', 'Subject', 1, '2021-09-02 11:44:24', '2021-09-02 11:44:24'),
(32, 'Doctor Degree', 'Medical Unversity', 'Surgin', 2, '2021-11-01 07:50:06', '2021-11-01 07:50:06'),
(33, 'k', 'k', 'k', 13, '2021-11-01 07:55:37', '2021-11-01 07:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `employee_code`, `dob`, `phone`, `photo`, `user_id`, `position_id`, `created_at`, `updated_at`) VALUES
(1, 'KyalSin Clinic', 'EMP_001', '1997-01-09', '09222222222', '/image/admin/user.jpg', 4, 1, '2020-12-28 07:57:54', '2021-11-11 07:03:37'),
(4, 'test counter', 'EMP_027', '2021-11-11', '09250206903', '/image/admin/1636622290-744742.jpg', 27, 1, '2021-11-11 09:18:10', '2021-11-11 09:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `type`, `date`, `remark`, `amount`, `created_at`, `updated_at`) VALUES
(15, 'Electric Fee', '2022-03-04', 'payy', 1000, '2022-03-04 12:03:18', '2022-03-04 12:03:18'),
(16, 'Electric Fee', '2022-03-04', 'payy', 1000, '2022-03-04 12:05:29', '2022-03-04 12:05:29'),
(17, 'Electric Fee', '2022-03-04', 'payy', 1000, '2022-03-04 12:06:08', '2022-03-04 12:06:08'),
(18, 'Electric Fee', '2022-03-04', 'payy', 1000, '2022-03-04 12:09:14', '2022-03-04 12:09:14'),
(19, 'Rent', '2022-03-04', 'youu', 1000, '2022-03-04 12:09:54', '2022-03-04 12:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `experience_information`
--

CREATE TABLE `experience_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experience_information`
--

INSERT INTO `experience_information` (`id`, `position`, `doctor_id`, `created_at`, `updated_at`, `place`) VALUES
(3, 'Doctor', 6, '2021-06-03 04:29:06', '2021-06-03 04:29:06', 'Yangon'),
(4, 'ii', 7, '2021-06-03 04:30:03', '2021-06-03 04:30:03', 'iii'),
(5, 'ii', 8, '2021-06-03 04:30:59', '2021-06-03 04:30:59', 'ii'),
(6, 'ii', 9, '2021-06-03 04:31:43', '2021-06-03 04:31:43', 'ii'),
(7, 'ii', 10, '2021-06-03 04:34:19', '2021-06-03 04:34:19', 'ii'),
(8, 'dd', 11, '2021-06-28 11:05:44', '2021-06-28 11:05:44', 'dd'),
(16, 'General Doctor', 1, NULL, NULL, 'Yangon'),
(21, 'Doctor', 2, NULL, NULL, 'Yangon'),
(22, 'k', 13, '2021-11-01 07:55:37', '2021-11-01 07:55:37', 'k');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assets`
--

CREATE TABLE `fixed_assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_purchase_price` int(11) NOT NULL,
  `salvage_value` int(11) NOT NULL,
  `use_life` int(11) NOT NULL,
  `yearly_depriciation` int(11) NOT NULL,
  `daily_depriciation` int(11) NOT NULL,
  `existing_flag` int(11) NOT NULL,
  `used_years` int(11) NOT NULL,
  `current_value` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `sell_or_end_flag` int(11) NOT NULL DEFAULT 0,
  `sell_price` int(11) NOT NULL DEFAULT 0,
  `profit_loss_value` int(11) NOT NULL DEFAULT 0,
  `sell_date` date DEFAULT NULL,
  `end_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `future_day` date NOT NULL,
  `future_date` date NOT NULL,
  `depriciation_total` int(11) NOT NULL DEFAULT 0,
  `profit_loss_status` int(11) NOT NULL DEFAULT 0,
  `account_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `monthly_depriciation` int(11) NOT NULL,
  `future_month` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixed_assets`
--

INSERT INTO `fixed_assets` (`id`, `name`, `type`, `description`, `initial_purchase_price`, `salvage_value`, `use_life`, `yearly_depriciation`, `daily_depriciation`, `existing_flag`, `used_years`, `current_value`, `start_date`, `sell_or_end_flag`, `sell_price`, `profit_loss_value`, `sell_date`, `end_remark`, `end_date`, `future_day`, `future_date`, `depriciation_total`, `profit_loss_status`, `account_code`, `account_name`, `created_at`, `updated_at`, `monthly_depriciation`, `future_month`) VALUES
(12, 'honda', 2, 'to drive', 500000, 300000, 4, 50000, 137, 1, 3, 341666, '2022-03-07', 0, 0, 0, NULL, NULL, NULL, '2022-03-08', '2023-03-07', 150000, 0, 'A-0101', 'fix_account_one', '2022-03-06 19:25:14', '2022-03-06 19:38:21', 4167, '2022-04-07'),
(13, 'homeThree', 1, 'to live', 60000, 40000, 5, 4000, 11, 1, 2, 51667, '2022-03-07', 0, 0, 0, NULL, NULL, NULL, '2022-03-08', '2023-03-07', 8000, 0, 'A-0103', 'fix_account_three', '2022-03-06 19:39:47', '2022-03-06 19:40:08', 333, '2022-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_room` int(11) NOT NULL,
  `building_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `name`, `number_of_room`, `building_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'floor one', 6, 1, 1, '2021-06-03 03:54:42', '2021-06-03 03:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` date NOT NULL,
  `sale_project_id` bigint(20) UNSIGNED NOT NULL,
  `total_product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `paid_status` int(11) NOT NULL DEFAULT 0,
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `invoice_date`, `sale_project_id`, `total_product_qty`, `created_at`, `updated_at`, `paid_status`, `total_amount`) VALUES
(9, 'Inv - 001', '2022-03-02', 10, 3, '2022-03-02 10:50:55', '2022-03-02 12:48:17', 1, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_product_lists`
--

CREATE TABLE `invoice_product_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_product_lists`
--

INSERT INTO `invoice_product_lists` (`id`, `product_id`, `invoice_id`, `created_at`, `updated_at`, `qty`, `sub_total`) VALUES
(9, 2, 5, '2022-03-01 08:10:11', '2022-03-01 08:10:11', 1, 500),
(10, 3, 5, '2022-03-01 08:10:12', '2022-03-01 08:10:12', 1, 500),
(11, 1, 8, '2022-03-02 09:29:26', '2022-03-02 09:29:26', 1, 70000),
(12, 2, 8, '2022-03-02 09:29:26', '2022-03-02 09:29:26', 1, 500),
(13, 3, 8, '2022-03-02 09:29:26', '2022-03-02 09:29:26', 1, 500),
(14, 2, 9, '2022-03-02 10:50:55', '2022-03-02 10:50:55', 2, 1000),
(15, 3, 9, '2022-03-02 10:50:55', '2022-03-02 10:50:55', 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_path` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `model` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_code`, `item_name`, `created_by`, `photo_path`, `category_id`, `sub_category_id`, `brand_id`, `type_id`, `model`, `deleted_at`, `created_at`, `updated_at`) VALUES
(26, '001', 'Aithromycin 500 mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 03:44:47', '2021-11-01 07:00:08'),
(27, '002', 'Amoxicillin 250 mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 03:50:08', '2021-11-01 03:50:08'),
(28, '003', 'Amoxicillin 500 mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 03:55:19', '2021-11-01 03:55:19'),
(29, '004', 'Augmentin 625mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 03:55:44', '2021-11-01 03:55:44'),
(30, '005', 'Augmentin 375mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 03:56:19', '2021-11-01 03:56:19'),
(31, '006', 'Acyclovir 200mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 03:56:49', '2021-11-01 03:56:49'),
(32, '007', 'Acecclofanace 100mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 03:57:20', '2021-11-01 03:57:20'),
(33, '008', 'Atovastatin 10mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 03:57:45', '2021-11-01 03:57:45'),
(34, '009', 'Atovastatin 20mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 03:58:06', '2021-11-01 03:58:06'),
(35, '010', 'Amlosum 10mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 03:58:27', '2021-11-01 03:58:27'),
(36, '011', 'Amlodipine 10mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 03:58:58', '2021-11-01 03:58:58'),
(37, '012', 'Atenolol  50mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 03:59:38', '2021-11-01 03:59:38'),
(38, '013', 'Angilock 25mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:00:27', '2021-11-01 04:00:27'),
(39, '014', 'Angilock 50mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:01:14', '2021-11-01 04:01:14'),
(40, '015', 'Aspilet', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:01:54', '2021-11-01 04:01:54'),
(41, '016', 'Azolam 25mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:02:14', '2021-11-01 04:02:14'),
(42, '017', 'Azolam 5mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:02:38', '2021-11-01 04:02:38'),
(43, '018', 'Admon L', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:02:56', '2021-11-01 04:02:56'),
(44, '019', 'Allercet P', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:03:16', '2021-11-01 04:03:16'),
(45, '020', 'Aldactone 25mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:03:38', '2021-11-01 04:03:38'),
(46, '021', 'Allopurinol 100mg', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:04:05', '2021-11-01 04:04:05'),
(47, '022', 'Allerfast 120', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:04:22', '2021-11-01 04:04:22'),
(48, '023', 'Air  x', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:04:54', '2021-11-01 04:04:54'),
(49, '024', 'Ace Drop', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:05:11', '2021-11-01 04:05:11'),
(50, '025', 'Albendazole', 'Ko Min Min Clinic', 'default.jpg', 1, 0, 0, 0, '0', NULL, '2021-11-01 04:05:34', '2021-11-01 04:05:34'),
(51, '026', 'Belax', 'Ko Min Min Clinic', 'default.jpg', 2, 0, 0, 0, '0', NULL, '2021-11-01 04:05:54', '2021-11-01 04:05:54'),
(52, '027', 'B1', 'Ko Min Min Clinic', 'default.jpg', 2, 0, 0, 0, '0', NULL, '2021-11-01 04:06:47', '2021-11-01 04:06:47'),
(53, '028', 'B2', 'Ko Min Min Clinic', 'default.jpg', 2, 0, 0, 0, '0', NULL, '2021-11-01 04:07:06', '2021-11-01 04:07:06'),
(54, '029', 'B12', 'Ko Min Min Clinic', 'default.jpg', 2, 0, 0, 0, '0', NULL, '2021-11-01 04:07:28', '2021-11-01 04:07:28'),
(55, '030', 'Baby Cough Antihistamin', 'Ko Min Min Clinic', 'default.jpg', 2, 0, 0, 0, '0', NULL, '2021-11-01 04:07:54', '2021-11-01 04:07:54'),
(56, '031', 'Baby Cough without', 'Ko Min Min Clinic', 'default.jpg', 2, 0, 0, 0, '0', NULL, '2021-11-01 04:24:40', '2021-11-01 04:24:40'),
(57, '032', 'Burmeton', 'Ko Min Min Clinic', 'default.jpg', 2, 0, 0, 0, '0', NULL, '2021-11-01 04:25:07', '2021-11-01 04:25:07'),
(58, '033', 'Blumox P 125mg', 'Ko Min Min Clinic', 'default.jpg', 2, 0, 0, 0, '0', NULL, '2021-11-01 04:25:32', '2021-11-01 04:25:32'),
(59, '034', 'Best ORS', 'Ko Min Min Clinic', 'default.jpg', 2, 0, 0, 0, '0', NULL, '2021-11-01 04:25:50', '2021-11-01 04:25:50'),
(60, '035', 'BPI ORS', 'Ko Min Min Clinic', 'default.jpg', 2, 0, 0, 0, '0', NULL, '2021-11-01 04:26:05', '2021-11-01 04:26:05'),
(61, '036', 'Cardivas 3. 125mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:26:32', '2021-11-01 04:26:32'),
(62, '036', 'Cardivas 6. 25mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:26:54', '2021-11-01 04:26:54'),
(63, '038', 'Camlodin 5mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:27:12', '2021-11-01 04:27:12'),
(64, '039', 'Clopilet', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:27:30', '2021-11-01 04:27:30'),
(65, '040', 'Ceflaxine 250mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:28:07', '2021-11-01 04:28:07'),
(66, '041', 'Ceflaxine 500mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:28:30', '2021-11-01 04:28:30'),
(67, '042', 'Cefixime 1000mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:29:11', '2021-11-01 04:29:11'),
(68, '043', 'Cefixime 200mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:29:43', '2021-11-01 04:29:43'),
(69, '044', 'Ciprofloxacin 250mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:30:06', '2021-11-01 04:30:06'),
(70, '045', 'Ciprofloxacin 500mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:30:29', '2021-11-01 04:30:29'),
(71, '046', 'Cifram eye drop', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:30:53', '2021-11-01 04:30:53'),
(72, '047', 'Cosy', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:31:16', '2021-11-01 04:31:16'),
(73, '048', 'Child Cvit', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:31:39', '2021-11-01 04:31:39'),
(74, '049', 'Cvit 100mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:31:57', '2021-11-01 04:31:57'),
(75, '050', 'Ceovit 500mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:32:17', '2021-11-01 04:32:17'),
(76, '051', 'Calcium 500mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:32:34', '2021-11-01 04:32:34'),
(77, '052', 'Celecoxib 100mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:32:51', '2021-11-01 04:32:51'),
(78, '053', 'Cyclo 20mg', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:34:43', '2021-11-01 04:34:43'),
(79, '054', 'Contus', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:37:03', '2021-11-01 04:37:03'),
(80, '055', 'Cetrizine', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:38:21', '2021-11-01 04:38:21'),
(81, '056', 'Cyproheptidine', 'Ko Min Min Clinic', 'default.jpg', 3, 0, 0, 0, '0', NULL, '2021-11-01 04:38:44', '2021-11-01 04:38:44'),
(82, '057', 'Detussin', 'Ko Min Min Clinic', 'default.jpg', 4, 0, 0, 0, '0', NULL, '2021-11-01 04:39:05', '2021-11-01 04:39:05'),
(83, '058', 'Duragesic', 'Ko Min Min Clinic', 'default.jpg', 4, 0, 0, 0, '0', NULL, '2021-11-01 04:39:23', '2021-11-01 04:39:23'),
(84, '059', 'Diclo 25mg', 'Ko Min Min Clinic', 'default.jpg', 4, 0, 0, 0, '0', NULL, '2021-11-01 04:39:45', '2021-11-01 04:39:45'),
(85, '060', 'Diclo 50mg', 'Ko Min Min Clinic', 'default.jpg', 4, 0, 0, 0, '0', NULL, '2021-11-01 04:40:41', '2021-11-01 04:40:41'),
(86, '061', 'Danzo', 'Ko Min Min Clinic', 'default.jpg', 4, 0, 0, 0, '0', NULL, '2021-11-01 04:40:59', '2021-11-01 04:40:59'),
(87, '052', 'Deriphllin 150mg', 'Ko Min Min Clinic', 'default.jpg', 4, 0, 0, 0, '0', NULL, '2021-11-01 04:41:19', '2021-11-01 04:41:19'),
(88, '063', 'Dexamethasone 5mg', 'Ko Min Min Clinic', 'default.jpg', 4, 0, 0, 0, '0', NULL, '2021-11-01 04:41:40', '2021-11-01 04:41:40'),
(89, '064', 'Eposoft', 'Ko Min Min Clinic', 'default.jpg', 5, 0, 0, 0, '0', NULL, '2021-11-01 04:42:03', '2021-11-01 04:42:03'),
(90, '065', 'Empott', 'Ko Min Min Clinic', 'default.jpg', 5, 0, 0, 0, '0', NULL, '2021-11-01 04:42:13', '2021-11-01 04:42:13'),
(91, '066', 'Flumox 500mg', 'Ko Min Min Clinic', 'default.jpg', 6, 0, 0, 0, '0', NULL, '2021-11-01 04:42:29', '2021-11-01 04:42:29'),
(92, '067', 'Felxicam 20mg', 'Ko Min Min Clinic', 'default.jpg', 6, 0, 0, 0, '0', NULL, '2021-11-01 04:42:48', '2021-11-01 04:42:48'),
(93, '068', 'Folic Acid', 'Ko Min Min Clinic', 'default.jpg', 6, 0, 0, 0, '0', NULL, '2021-11-01 04:43:57', '2021-11-01 04:43:57'),
(94, '069', 'FOB', 'Ko Min Min Clinic', 'default.jpg', 6, 0, 0, 0, '0', NULL, '2021-11-01 04:44:09', '2021-11-01 04:44:09'),
(95, '070', 'Gabapentin 100mg', 'Ko Min Min Clinic', 'default.jpg', 7, 0, 0, 0, '0', NULL, '2021-11-01 04:44:27', '2021-11-01 04:44:27'),
(96, '071', 'Generlog Oral', 'Ko Min Min Clinic', 'default.jpg', 7, 0, 0, 0, '0', NULL, '2021-11-01 04:44:52', '2021-11-01 04:44:52'),
(97, '072', 'Glucose Powder', 'Ko Min Min Clinic', 'default.jpg', 7, 0, 0, 0, '0', NULL, '2021-11-01 04:45:17', '2021-11-01 04:45:17'),
(98, '074', 'Hb Max', 'Ko Min Min Clinic', 'default.jpg', 8, 0, 0, 0, '0', NULL, '2021-11-01 04:46:00', '2021-11-01 04:46:00'),
(99, '075', 'Ibuprofen 200mg', 'Ko Min Min Clinic', 'default.jpg', 9, 0, 0, 0, '0', NULL, '2021-11-01 04:46:28', '2021-11-01 04:46:28'),
(100, '076', 'Ibuprofen 400mg', 'Ko Min Min Clinic', 'default.jpg', 9, 0, 0, 0, '0', NULL, '2021-11-01 04:46:56', '2021-11-01 04:46:56'),
(101, '077', 'Imotil', 'Ko Min Min Clinic', 'default.jpg', 9, 0, 0, 0, '0', NULL, '2021-11-01 04:47:10', '2021-11-01 04:47:10'),
(102, '078', 'Itrodex eye drop', 'Ko Min Min Clinic', 'default.jpg', 9, 0, 0, 0, '0', NULL, '2021-11-01 04:47:50', '2021-11-01 04:47:50'),
(103, '079', 'Histacin', 'Ko Min Min Clinic', 'default.jpg', 8, 0, 0, 0, '0', NULL, '2021-11-01 05:30:57', '2021-11-01 05:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `linked_social_accounts`
--

CREATE TABLE `linked_social_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(43, '2020_07_08_043319_change_place_from_experience_information', 12),
(225, '2014_10_12_000000_create_users_table', 13),
(226, '2014_10_12_100000_create_password_resets_table', 13),
(227, '2016_06_01_000001_create_oauth_auth_codes_table', 13),
(228, '2016_06_01_000002_create_oauth_access_tokens_table', 13),
(229, '2016_06_01_000003_create_oauth_refresh_tokens_table', 13),
(230, '2016_06_01_000004_create_oauth_clients_table', 13),
(231, '2016_06_01_000005_create_oauth_personal_access_clients_table', 13),
(232, '2019_08_19_000000_create_failed_jobs_table', 13),
(233, '2020_01_24_221741_create_doctors_table', 13),
(234, '2020_01_24_222201_create_days_table', 13),
(235, '2020_01_24_222349_create_doctor_day_table', 13),
(236, '2020_01_24_222645_create_patients_table', 13),
(238, '2020_02_04_063910_create_departments_table', 13),
(239, '2020_02_04_171250_create_education_information_table', 13),
(240, '2020_02_04_172223_create_experience_information_table', 13),
(241, '2020_02_05_034117_create_roles_table', 13),
(242, '2020_02_05_034750_create_role_user_table', 13),
(243, '2020_02_06_094814_create_doctor_times_table', 13),
(244, '2020_02_14_083032_create_doctor_infos_table', 13),
(245, '2020_02_19_095055_create_buildings_table', 13),
(246, '2020_02_19_095143_create_floors_table', 13),
(247, '2020_02_19_095154_create_rooms_table', 13),
(248, '2020_02_21_071543_create_room_types_table', 13),
(250, '2020_03_03_100250_create_doctor_notifications_table', 13),
(251, '2020_03_23_025053_create_employees_table', 13),
(252, '2020_03_23_030113_create_positions_table', 13),
(253, '2020_04_23_202703_create_linked_social_accounts_table', 13),
(254, '2020_07_06_065511_create_verify_users_table', 13),
(255, '2020_07_06_194723_add_reation_to_bookings', 13),
(256, '2020_07_07_090834_create_booking_infos_table', 13),
(257, '2020_07_08_034554_change_floor_id_from_bookings', 13),
(258, '2020_07_08_035559_remove_start_and_end_from_education_information', 13),
(259, '2020_07_08_040234_remove_start_and_end_from_experience_information', 13),
(260, '2020_07_08_041602_add_place_to_experience_information', 13),
(261, '2020_07_17_053331_create_announcements_table', 13),
(262, '2020_07_17_053506_create_advertisements_table', 13),
(263, '2020_07_24_120953_add_provider_to_users_table', 13),
(264, '2020_07_27_114527_change_toke_number_in_bookings_table', 13),
(265, '2020_07_28_110431_add_advance_time_and_time_per_patient_to_doctor_infos_table', 13),
(271, '2020_02_28_074129_create_schedule_change_logs_table', 16),
(272, '2020_01_24_223609_create_bookings_table', 17),
(273, '2020_08_07_161448_create_states_table', 18),
(274, '2020_08_07_161637_create_towns_table', 19),
(275, '2021_06_12_113307_create_categories_table', 19),
(276, '2021_06_12_113332_create_sub_categories_table', 19),
(277, '2021_06_12_113346_create_brands_table', 19),
(278, '2021_06_12_113356_create_types_table', 19),
(279, '2021_06_12_113415_create_items_table', 19),
(280, '2021_06_13_150045_create_brand_subcategory_table', 20),
(284, '2021_06_13_224126_create_counting_units_table', 21),
(285, '2021_06_13_224555_create_unit_conversions_table', 21),
(286, '2021_06_13_224710_create_unit_relations_table', 21),
(287, '2021_06_13_224880_create_stock_counts_table', 22),
(288, '2021_06_16_164553_create_services_table', 23),
(289, '2021_06_16_165917_create_doctor_service_table', 24),
(290, '2021_06_16_165918_create_doctor_service_table', 25),
(291, '2021_06_29_114522_add_start_date_to_advertisement_table', 26),
(292, '2021_06_29_124925_create_packages_table', 27),
(293, '2021_06_29_125510_create_package_service_table', 28),
(294, '2021_06_29_171117_add_package_id_to_advertisement_table', 29),
(298, '2021_07_08_164730_create_service_voucher_table', 30),
(299, '2021_07_12_125107_add_desc_to_bookings_table', 31),
(301, '2021_08_05_151821_add_status_to_bookings_table', 32),
(302, '2021_08_05_151822_add_status_to_bookings_table', 33),
(303, '2021_08_05_151823_add_status_to_bookings_table', 34),
(304, '2021_08_10_144401_add_urls_to_booking_table', 35),
(305, '2021_08_11_115651_add_document_to_bookings_table', 36),
(306, '2021_08_12_105651_add_meeting_status_to_bookings_table', 37),
(307, '2021_08_26_151602_add_online_line_payment_to_doctors_table', 38),
(308, '2021_09_01_132918_add_status_to_towns_table', 39),
(310, '2021_09_10_145217_create_clinic_patients_table', 40),
(312, '2021_09_10_150021_create_appointments_table', 41),
(318, '2021_09_16_171859_create_clinicappointmentinfos_table', 43),
(319, '2021_09_16_212212_add_dose_to_counting_unit_voucher_table', 44),
(320, '2021_09_14_170731_add_appointment_id_to_vouchers_table', 45),
(321, '2021_09_17_142417_create_appointment_attachments_table', 46),
(322, '2021_09_25_145514_add_token_to_appointments_table', 47),
(323, '2021_09_27_155446_add_code_to_clinic_patients_table', 48),
(324, '2021_10_03_123618_create_diagnoses_table', 49),
(325, '2021_10_03_125338_create_appointments_diagnoses_table', 50),
(326, '2021_10_04_112201_add_physicial_examinations_to_clinicappointmentinfos_table', 51),
(328, '2021_10_05_104243_add_procedure_to_clinicappointmentinfos_table', 52),
(329, '2021_10_05_153734_create_doses_table', 53),
(331, '2021_10_06_105426_add_duration_to_counting_unit_voucher_table', 54),
(332, '2021_11_03_124225_add_ownerstatus_to_roles_table', 55),
(333, '2021_12_17_095050_add_age_month_to_clinic_patients_table', 56),
(335, '2022_02_25_132243_create_accountings_table', 57),
(336, '2022_02_25_142902_create_sale_projects_table', 58),
(337, '2022_02_25_150917_create_customers_table', 59),
(338, '2022_02_25_185517_create_year_projects_table', 60),
(339, '2022_02_25_190507_create_customer_sale_project_table', 61),
(340, '2022_02_25_192119_create_accounting_types_table', 62),
(341, '2022_02_25_213057_create_products_table', 63),
(342, '2022_02_25_231529_create_invoices_table', 64),
(343, '2022_02_25_231954_create_invoice_product_lists_table', 65),
(344, '2022_03_01_120841_add_product_code_to_products_table', 66),
(345, '2022_03_01_143630_add_qty_sub_total_to_invoice_product_lists_table', 67),
(346, '2022_03_02_130252_add_paid_status_to_invoices_table', 68),
(347, '2022_03_02_165532_add_roi_value_to_sale_projects_table', 69),
(348, '2022_03_02_171336_add_total_price_to_invoices_table', 70),
(350, '2022_02_26_101219_create_categories_table', 72),
(351, '2022_02_26_104812_create_banks_table', 73),
(352, '2022_02_26_113532_add_account_code_to_banks_table', 74),
(353, '2022_03_01_090216_create_fixed_assets_table', 75),
(354, '2022_03_02_124123_add_general_project_flag_to_accountings_table', 76),
(355, '2022_03_02_142703_create_cashes_table', 77),
(357, '2022_03_02_164157_create_expenses_table', 78),
(358, '2022_03_02_175336_create_transactions_table', 79),
(360, '2022_03_03_173914_add_expense_flag_to_transactions_table', 80),
(361, '2022_03_06_170129_add_monthly_depriciation_to_fixed_assets_table', 81),
(363, '2022_03_06_171405_add_future_month_to_fixed_assets_table', 82);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0dfb99db0783c5ba70a5bfe8da1b59f1f1f610cc4e7aff96eacead671a4837ab50e25d71432dea77', 15, 3, 'Laravel Personal Access Client', '[]', 0, '2021-06-04 06:44:42', '2021-06-04 06:44:42', '2022-06-04 13:14:42'),
('1cbefe109a2160e718ff765265bc1b5e759df35139d14bb3332f9c2da11e0eedca00268f33dd6403', 14, 3, 'Laravel Personal Access Client', '[]', 0, '2021-06-04 06:46:29', '2021-06-04 06:46:29', '2022-06-04 13:16:29'),
('23c155c50580c3109bc3ee2444c75a895325343321f50b20cd9a2633a29466bacd774d410869e325', 18, 3, 'Laravel Personal Access Client', '[]', 0, '2021-06-07 10:33:46', '2021-06-07 10:33:46', '2022-06-07 17:03:46'),
('2a04c83c304fe8938297339e7e87a9277f2b067c03f433892fb30930620cd74bda6c42bce3386997', 16, 3, 'Laravel Personal Access Client', '[]', 1, '2021-06-07 06:48:05', '2021-06-07 06:48:05', '2022-06-07 13:18:05'),
('2b48212a3bcc533a996ff6aca57b4eea762a5018624979db2b7afd6df837c3c04f8d0583791eb4ee', 6, 1, 'Laravel Personal Access Client', '[]', 0, '2021-01-07 10:15:49', '2021-01-07 10:15:49', '2022-01-07 16:45:49'),
('454a1025fb226771a2d3c6bc72f02cb9a5bb979987fd3ae2b4a02c37fdca7400092668a037627901', 6, 1, 'Laravel Personal Access Client', '[]', 1, '2021-01-07 10:09:05', '2021-01-07 10:09:05', '2022-01-07 16:39:05'),
('4ad28ac04ce6510ca6ec216bc5471cd401bfbc3b9f2e691cd11f41f021e40f4d5710edc46855ef77', 16, 3, 'Laravel Personal Access Client', '[]', 0, '2021-06-07 07:05:54', '2021-06-07 07:05:54', '2022-06-07 13:35:54'),
('4e3d5012148cae69114b373f53d02083514c59369e75e6b0d85f695babb17f4c563106378586d303', 13, 3, 'Laravel Personal Access Client', '[]', 0, '2021-01-10 12:49:41', '2021-01-10 12:49:41', '2022-01-10 19:19:41'),
('52dc66aaee4cd26067bfe072afee284d86bbaacb2c76cd57af6985847a16ea5fd0684928250903e7', 6, 1, 'Laravel Personal Access Client', '[]', 1, '2021-01-07 10:05:37', '2021-01-07 10:05:37', '2022-01-07 16:35:37'),
('5bf0cc057aa0d9ed581bc5739dbb0e83899a6be31f8c3916420a2d8e0b4a502358fec5fdeaac7c07', 6, 1, 'Laravel Personal Access Client', '[]', 1, '2021-01-07 09:59:33', '2021-01-07 09:59:33', '2022-01-07 16:29:33'),
('637681fa383a5a6d033969bfe0962eeda187f39967cd6954af4e36deb242d72e74e2836ab4d3ee90', 6, 1, 'Laravel Personal Access Client', '[]', 1, '2021-01-07 10:00:10', '2021-01-07 10:00:10', '2022-01-07 16:30:10'),
('67b06c247d5c85051787055bd0b28af1f441d7ce88ff61e954067bbf3c667869f76d8b85e28466c1', 16, 3, 'Laravel Personal Access Client', '[]', 1, '2021-06-07 06:50:30', '2021-06-07 06:50:30', '2022-06-07 13:20:30'),
('893ec06e08a26ab9be730fcc31604dcfb633032179b26c994d3f69f8ce5bdbeffec64687d90c484d', 15, 3, 'Laravel Personal Access Client', '[]', 1, '2021-06-04 06:30:37', '2021-06-04 06:30:37', '2022-06-04 13:00:37'),
('8af0a2fdcec2768fbf957cb2824071c7611039d83b4ac0fcc90d35cdf186146c79c80ea9c6d6e548', 6, 1, 'Laravel Personal Access Client', '[]', 1, '2021-01-07 10:06:35', '2021-01-07 10:06:35', '2022-01-07 16:36:35'),
('968e2fff49070511efc2ec9eba7fea72826e1aec314594b90305f72c170170c497c02390df7d43be', 7, 3, 'Laravel Personal Access Client', '[]', 0, '2021-01-10 13:10:38', '2021-01-10 13:10:38', '2022-01-10 19:40:38'),
('97832bd9360e77c558099e7ac90eead9882ebdf66511779c442642d9fa2d0705cb7be33c6fb83617', 16, 3, 'Laravel Personal Access Client', '[]', 1, '2021-06-07 06:47:01', '2021-06-07 06:47:01', '2022-06-07 13:17:01'),
('a2a92352bcffb8c9ddee885fe0c8d9eb095baf52a6b7b73ad97088d03ae4bf130713e78f45066c86', 14, 3, 'Laravel Personal Access Client', '[]', 1, '2021-06-04 06:29:07', '2021-06-04 06:29:07', '2022-06-04 12:59:07'),
('b089a55b046dfd4a282e7d7de595e512960b2bc88b08532584fc2dc23edccb534e9430c5c78dc69f', 12, 1, 'Laravel Personal Access Client', '[]', 0, '2021-01-07 09:15:37', '2021-01-07 09:15:37', '2022-01-07 15:45:37'),
('b6a82b08dc88dc027df5d870c06c623bb484d1eedd80b039d62aad7e1c5036848ad18a49e57470b5', 21, 3, 'Laravel Personal Access Client', '[]', 0, '2021-08-12 03:36:41', '2021-08-12 03:36:41', '2022-08-12 10:06:41'),
('e9abc60d9e2281a3e7d4c17126e2f4cf135f63f50ebcd5389bc4e5abd1549a98fd479a677aa89cd8', 6, 1, 'Laravel Personal Access Client', '[]', 1, '2021-01-07 09:57:51', '2021-01-07 09:57:51', '2022-01-07 16:27:51'),
('edef99e58e960c0b066f33f376a7cdc637dcb78c4a7e9ac67cb5a3a1ecca7877934fa4674d00ca52', 13, 1, 'Laravel Personal Access Client', '[]', 1, '2021-01-07 09:40:32', '2021-01-07 09:40:32', '2022-01-07 16:10:32'),
('f2821a5011555ed9cdb018e72f38dc120f13aff31983124129d1a65778ad0a7b3e7eb8d6387f2e04', 16, 3, 'Laravel Personal Access Client', '[]', 1, '2021-06-07 07:05:44', '2021-06-07 07:05:44', '2022-06-07 13:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'QsNtRvFQuRuUv6X3OPlGQcYado54uKQfDvLUs2aF', 'http://localhost', 1, 0, 0, '2021-01-07 09:15:07', '2021-01-07 09:15:07'),
(2, NULL, 'Laravel Password Grant Client', 'RuLLLEHP0isfIfOFcRlEa3EhJKVQvY3o9ZytCTmd', 'http://localhost', 0, 1, 0, '2021-01-07 09:15:07', '2021-01-07 09:15:07'),
(3, NULL, 'Laravel Personal Access Client', 'VTPUHUVpa7WiVNa3N03nKcRstxY7efoava4N80Cr', 'http://localhost', 1, 0, 0, '2021-01-10 12:49:13', '2021-01-10 12:49:13'),
(4, NULL, 'Laravel Password Grant Client', 'WfcFWRc9sCBcxNpVBGOwwJ12fJQsAgPNAWqZtHGr', 'http://localhost', 0, 1, 0, '2021-01-10 12:49:14', '2021-01-10 12:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-01-07 09:15:07', '2021-01-07 09:15:07'),
(2, 3, '2021-01-10 12:49:14', '2021-01-10 12:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_charges` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `total_charges`, `cost`, `created_at`, `updated_at`) VALUES
(5, 'ကြက်', 'sdfsadf', 21, 12, '2021-06-29 10:12:57', '2021-06-29 10:12:57'),
(6, 'ကြက်', 'sdfsadf', 12, 12, '2021-06-29 10:15:07', '2021-06-29 10:15:07'),
(7, 'ကြက်', 'For  this month', 123, 123, '2021-06-29 10:47:26', '2021-06-29 10:47:26'),
(8, '၀က်', 'Quickly integrate emerging best practices rather than reliable processes. Distinctively drive just in time alignments whereas stand-alone imperatives. Assertively redefine cooperative convergence via e-business growth strategies. Holisticly matrix vertical potentialities through enterprise information. Completely repurpose leading-edge mindshare vis-a-vis intuitive methods of empowerment.  Interactively reconceptualize open-source services whereas multimedia based markets. Synergistically reinvent principle-centered resources without.', 12, 12, '2021-06-29 10:51:17', '2021-06-29 10:51:17'),
(9, 'ကြက်', 'For  this month', 90, 78, '2021-06-29 10:54:01', '2021-06-29 10:54:01'),
(10, 'ကြက်', 'For  this month', 90, 78, '2021-06-29 10:54:33', '2021-06-29 10:54:33'),
(11, 'ကြက်', 'For  this month', 90, 78, '2021-06-29 10:56:28', '2021-06-29 10:56:28'),
(12, 'ကြက်', 'For  this month', 90, 78, '2021-06-29 10:56:47', '2021-06-29 10:56:47'),
(13, 'ကြက်', 'sdfsadf', 12, 12, '2021-06-29 10:59:19', '2021-06-29 10:59:19'),
(14, '၀က်', 'weekly', 13, 12, '2021-06-29 11:01:19', '2021-06-29 11:01:19'),
(15, '၀က်', 'For  this month', 20, 123, '2021-06-30 06:27:40', '2021-06-30 06:27:40'),
(16, '၀က်', 'For  this month', 20, 123, '2021-06-30 06:35:56', '2021-06-30 06:35:56'),
(17, 'ပင်လယ်စာ', 'Quickly integrate emerging best practices rather than reliable processes. Distinctively drive just in time alignments whereas stand-alone imperatives. Assertively redefine cooperative convergence via e-business growth strategies. Holisticly matrix vertical potentialities through enterprise information. Completely repurpose leading-edge mindshare vis-a-vis intuitive methods of empowerment.  Interactively reconceptualize open-source services whereas multimedia based markets. Synergistically reinvent principle-centered resources without.', 1300, 1400, '2021-06-30 06:41:02', '2021-06-30 06:41:02'),
(18, 'ပင်လယ်စာ', 'Quickly integrate emerging best practices rather than reliable processes. Distinctively drive just in time alignments whereas stand-alone imperatives. Assertively redefine cooperative convergence via e-business growth strategies. Holisticly matrix vertical potentialities through enterprise information. Completely repurpose leading-edge mindshare vis-a-vis intuitive methods of empowerment.  Interactively reconceptualize open-source services whereas multimedia based markets. Synergistically reinvent principle-centered resources without.', 1300, 1400, '2021-06-30 06:41:45', '2021-06-30 06:41:45'),
(19, 'ငါး', 'For  this month', 123, 12, '2021-06-30 08:13:41', '2021-06-30 08:13:41'),
(20, 'ငါး', 'Quickly integrate emerging best practices rather than reliable processes. Distinctively drive just in time alignments whereas stand-alone imperatives. Assertively redefine cooperative convergence via e-business growth strategies. Holisticly matrix vertical potentialities through enterprise information. Completely repurpose leading-edge mindshare vis-a-vis intuitive methods of empowerment.  Interactively reconceptualize open-source services whereas multimedia based markets. Synergistically reinvent principle-centered resources without.', 1000, 1000, '2021-07-05 09:14:09', '2021-07-05 09:14:09'),
(21, 'Package Service Six', 'Rapidiously synergize mission-critical action items whereas bleeding-edge partnerships. Conveniently build high-payoff core.', 1300, 1200, '2021-07-05 10:14:30', '2021-07-05 10:14:30'),
(22, 'ပင်လယ်စာ', 'Quickly integrate emerging best practices rather than reliable processes. Distinctively drive just in time alignments whereas stand-alone imperatives. Assertively redefine cooperative convergence via e-business growth strategies. Holisticly matrix vertical potentialities through enterprise information. Completely repurpose leading-edge mindshare vis-a-vis intuitive methods of empowerment.  Interactively reconceptualize open-source services whereas multimedia based markets. Synergistically reinvent principle-centered resources without.', 13, 12, '2021-07-05 10:21:06', '2021-07-05 10:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `package_service`
--

CREATE TABLE `package_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_service`
--

INSERT INTO `package_service` (`id`, `package_id`, `service_id`, `created_at`, `updated_at`) VALUES
(8, 7, 1, NULL, NULL),
(9, 7, 7, NULL, NULL),
(10, 7, 9, NULL, NULL),
(11, 8, 7, NULL, NULL),
(12, 8, 10, NULL, NULL),
(13, 9, 7, NULL, NULL),
(14, 10, 7, NULL, NULL),
(15, 11, 7, NULL, NULL),
(16, 12, 7, NULL, NULL),
(17, 13, 1, NULL, NULL),
(18, 14, 1, NULL, NULL),
(19, 15, 8, NULL, NULL),
(20, 15, 9, NULL, NULL),
(21, 16, 8, NULL, NULL),
(22, 16, 9, NULL, NULL),
(23, 17, 8, NULL, NULL),
(24, 17, 9, NULL, NULL),
(25, 18, 8, NULL, NULL),
(26, 18, 9, NULL, NULL),
(27, 19, 8, NULL, NULL),
(28, 19, 9, NULL, NULL),
(29, 20, 10, NULL, NULL),
(30, 20, 11, NULL, NULL),
(31, 21, 7, NULL, NULL),
(32, 21, 10, NULL, NULL),
(33, 22, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_voucher`
--

CREATE TABLE `package_voucher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_voucher`
--

INSERT INTO `package_voucher` (`id`, `voucher_id`, `package_id`, `quantity`, `created_at`, `updated_at`) VALUES
(13, 1353, 16, 2, NULL, NULL),
(14, 1354, 10, 1, NULL, NULL),
(15, 1354, 21, 1, NULL, NULL),
(16, 1355, 21, 1, NULL, NULL),
(17, 1389, 1, 1, NULL, NULL),
(18, 1389, 7, 1, NULL, NULL),
(19, 1389, 8, 1, NULL, NULL),
(20, 1391, 1, 1, NULL, NULL),
(21, 1387, 1, 1, NULL, NULL),
(22, 1387, 8, 1, NULL, NULL),
(23, 1387, 7, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_code`, `name`, `phone`, `age`, `photo`, `address`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BHS-PTT00001', 'nnnn', '', '', 'user.jpg', 'yangon', 11, 0, '2021-01-07 09:13:19', '2021-01-07 09:13:19'),
(2, 'BHS-PTT00002', 'nnnn', '', '', 'user.jpg', 'yangon', 12, 0, '2021-01-07 09:15:36', '2021-01-07 09:15:37'),
(3, 'BHS-PTT00003', 'nnnn', '', '', 'user.jpg', 'yangon', 13, 0, '2021-01-07 09:40:32', '2021-01-07 09:40:32'),
(4, 'BHS-PTT00004', 'Ei Zin Htay', '09787786905', '23', 'user.jpg', 'yangon', 14, 0, '2021-06-04 06:29:07', '2021-06-04 06:29:07'),
(5, 'BHS-PTT00005', 'Ei Zin Htay', '09787786905', '23', 'user.jpg', 'yangon', 15, 0, '2021-06-04 06:30:37', '2021-06-04 06:30:37'),
(6, 'BHS-PTT00006', 'naypaingsoe', '09787786905', '23', 'user.jpg', 'yangon', 16, 0, '2021-06-07 06:47:01', '2021-06-07 06:47:01'),
(7, 'BHS-PTT00007', 'naypaingsoe', '0977777777', '23', 'user.jpg', '1234567890', 18, 0, '2021-06-07 10:33:46', '2021-06-07 10:33:46'),
(8, 'BHS-PTT000021', 'Lu Nar', '0977777777', '23', 'user.jpg', '1234567890', 21, 0, '2021-06-07 10:33:46', '2021-06-07 10:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `web_or_mobile` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `total`, `paid_amount`, `invoice_no`, `date`, `web_or_mobile`, `created_at`, `updated_at`) VALUES
(1, 207, 0, 3000, 1630053103, '2021-08-27', 0, '2021-08-27 08:35:26', '2021-08-27 08:35:26'),
(2, 208, 0, 3000, 1630055102, '2021-08-27', 0, '2021-08-27 09:06:34', '2021-08-27 09:06:34'),
(3, 213, 0, 3000, 1630728597, '2021-09-04', 0, '2021-09-04 04:13:37', '2021-09-04 04:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'level1n', '2020-12-28 07:08:09', '2020-12-28 07:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `shelve_id` bigint(20) UNSIGNED DEFAULT NULL,
  `model_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measuring_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `reorder_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minnimum_order_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retail_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wholesale_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_flag` int(11) NOT NULL DEFAULT 0,
  `discount_type` int(11) NOT NULL DEFAULT 0,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_date` date NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` date NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `shelve_id`, `model_number`, `measuring_unit`, `name`, `stock_qty`, `reorder_qty`, `minnimum_order_qty`, `purchase_price`, `retail_price`, `wholesale_price`, `discount_flag`, `discount_type`, `location`, `reg_date`, `photo`, `serial_number`, `purchase_date`, `category_id`, `subcategory_id`, `supplier_id`, `description`, `selling_price`, `department_id`, `created_at`, `updated_at`, `product_code`) VALUES
(1, 1, NULL, NULL, '12', 'Vokar', 5, '30', '20', '50000', NULL, NULL, 0, 0, NULL, '2022-02-25', 'unicodeone.jpg', NULL, '2022-02-25', 1, 1, 1, 'tytyty', 70000, 1, '2022-02-25 15:21:34', '2022-02-25 15:21:34', 'Pro-001'),
(2, 1, NULL, NULL, 'bottle', 'SkyHigh', 3, '343', '20', '50000', NULL, NULL, 0, 0, NULL, '2022-02-04', 'unicode.png', NULL, '2022-02-04', 1, 1, 1, 'tetete', 500, 1, '2022-02-25 16:05:26', '2022-02-25 16:05:26', 'Pro-002'),
(3, 1, NULL, NULL, 'set', 'Tom', 4, '30', '20', '50000', NULL, NULL, 0, 0, NULL, '2022-02-26', 'naruto-ninetail-form.jpg', NULL, '2022-02-26', 1, 1, 1, 'ssds', 500, 1, '2022-02-26 03:40:35', '2022-02-26 03:40:35', 'Pro-003');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ownerstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `ownerstatus`) VALUES
(1, 'Project Manager', '2020-12-28 06:02:58', '2020-12-28 06:02:58', 0),
(2, 'Doctor', '2020-12-28 06:02:58', '2020-12-28 06:02:58', 0),
(3, 'Patient', '2020-12-28 06:03:17', '2020-12-28 06:03:17', 0),
(4, 'EmployeeC', '2020-12-28 06:03:17', '2020-12-28 06:03:17', 0),
(5, 'DoctorC', '2020-12-28 06:03:17', '2020-12-28 06:03:17', 0),
(6, 'PatientC', '2020-12-28 06:03:17', '2020-12-28 06:03:17', 0),
(7, 'DoctorC', '2020-12-28 06:03:17', '2020-12-28 06:03:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(5, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor_id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_projects`
--

CREATE TABLE `sale_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimate_date` date NOT NULL,
  `type` int(11) NOT NULL,
  `rfq_file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `submission_date` date NOT NULL,
  `year` int(11) NOT NULL,
  `project_value` int(11) DEFAULT NULL,
  `expected_budget` int(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `government_department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roi_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_projects`
--

INSERT INTO `sale_projects` (`id`, `name`, `description`, `estimate_date`, `type`, `rfq_file_path`, `status`, `submission_date`, `year`, `project_value`, `expected_budget`, `location`, `project_contact_person`, `phone`, `email`, `government_department_name`, `project_owner`, `created_at`, `updated_at`, `roi_value`) VALUES
(10, 'Project One', 'testing testing one', '2022-03-02', 2, 'q1.jpg', 1, '2022-03-02', 2022, 100, 50, 'Mandalay', 'U Myo Thant', '09090990', 'mana@gmail.com', NULL, '1', '2022-03-02 10:40:18', '2022-03-02 10:40:18', 100);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_change_logs`
--

CREATE TABLE `schedule_change_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_date` date DEFAULT NULL,
  `request_time` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initial_date` date NOT NULL,
  `initial_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `request_doc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `request_doc_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `change_doc_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule_change_logs`
--

INSERT INTO `schedule_change_logs` (`id`, `request_date`, `request_time`, `initial_date`, `initial_time`, `type`, `status`, `request_doc_id`, `request_doc_name`, `doctor_id`, `change_doc_type`, `created_at`, `updated_at`) VALUES
(46, '2021-01-07', '4:29 PM', '2021-01-06', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-05 09:59:07', '2021-01-05 09:59:07'),
(47, '2021-01-09', '4:41 PM', '2021-01-07', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-05 10:11:18', '2021-01-05 10:11:18'),
(48, '2021-01-10', '4:42 PM', '2021-01-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-05 10:12:34', '2021-01-05 10:12:34'),
(49, '2021-01-11', '5:01 PM', '2021-01-10', '10:00 AM,12:00 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-05 10:31:36', '2021-01-05 10:31:36'),
(50, '2021-01-11', '7:43 PM', '2021-01-10', '10:00 AM,12:00 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-05 13:13:53', '2021-01-05 13:13:53'),
(51, '2021-01-12', '7:46 PM', '2021-01-11', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-05 13:16:56', '2021-01-05 13:16:56'),
(52, '2021-01-13', '7:46 PM', '2021-01-12', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-05 13:20:38', '2021-01-05 13:20:38'),
(53, '2021-01-14', '7:46 PM', '2021-01-13', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-05 13:24:51', '2021-01-05 13:24:51'),
(54, '2021-01-15', '12:53 PM', '2021-01-14', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-06 06:23:34', '2021-01-06 06:23:34'),
(55, '2021-01-16', '12:53 PM', '2021-01-15', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-06 06:31:45', '2021-01-06 06:31:45'),
(56, '2021-01-07', '10:45 AM', '2021-01-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-08 04:15:18', '2021-01-08 04:15:18'),
(57, '2021-01-07', '10:45 AM', '2021-01-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-08 04:15:49', '2021-01-08 04:15:49'),
(58, '2021-01-07', '10:45 AM', '2021-01-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-08 04:15:56', '2021-01-08 04:15:56'),
(59, '2021-01-07', '10:45 AM', '2021-01-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-08 04:16:03', '2021-01-08 04:16:03'),
(60, '2021-01-07', '10:45 AM', '2021-01-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-08 04:16:06', '2021-01-08 04:16:06'),
(61, '2021-01-07', '10:45 AM', '2021-01-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-01-08 04:16:09', '2021-01-08 04:16:09'),
(62, '2021-06-10', '10:28 PM', '2021-06-03', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-06-03 03:58:31', '2021-06-03 03:58:31'),
(63, NULL, NULL, '2021-06-06', '10:00 AM,12:00 PM', 1, 1, NULL, 'U Aye Maung', 1, 2, '2021-06-03 04:00:19', '2021-06-03 04:00:19'),
(64, '2021-07-14', '3:45 PM', '2021-07-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:15:59', '2021-07-06 09:15:59'),
(65, '2021-07-14', '3:45 PM', '2021-07-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:16:02', '2021-07-06 09:16:02'),
(66, '2021-07-14', '12:00 AM', '2021-07-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:16:13', '2021-07-06 09:16:13'),
(67, '2021-07-14', '12:00 AM', '2021-07-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:16:14', '2021-07-06 09:16:14'),
(68, '2021-07-14', '12:00 AM', '2021-07-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:16:29', '2021-07-06 09:16:29'),
(69, '2021-07-13', '12:00 AM', '2021-07-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:16:55', '2021-07-06 09:16:55'),
(70, '2021-07-10', '1:49 PM', '2021-07-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:20:03', '2021-07-06 09:20:03'),
(71, '2021-07-10', '1:49 PM', '2021-07-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:20:06', '2021-07-06 09:20:06'),
(72, '2021-07-10', '1:49 PM', '2021-07-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:20:08', '2021-07-06 09:20:08'),
(73, '2021-07-10', '1:49 PM', '2021-07-09', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:20:18', '2021-07-06 09:20:18'),
(74, '2021-07-09', '1:59 PM', '2021-07-08', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:29:59', '2021-07-06 09:29:59'),
(75, '2021-07-09', '1:59 PM', '2021-07-08', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:30:01', '2021-07-06 09:30:01'),
(76, '2021-07-09', '1:59 PM', '2021-07-08', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:30:03', '2021-07-06 09:30:03'),
(77, '2021-07-09', '1:59 PM', '2021-07-08', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-07-06 09:30:09', '2021-07-06 09:30:09'),
(78, '2021-08-04', '6:10 PM', '2021-08-03', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-08-03 08:40:38', '2021-08-03 08:40:38'),
(79, '2021-08-05', '8:46 PM', '2021-08-04', '12:30 PM,02:30 PM', 0, 1, NULL, NULL, 1, 0, '2021-08-03 09:16:22', '2021-08-03 09:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `charges` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `status` smallint(6) NOT NULL COMMENT '0= doctorsevice,1= otherservice',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `charges`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 'medical', 'Assertively impact visionary e-commerce rather than future-proof models. Rapidiously monetize progr', 30000, 20000, 1, NULL, '2021-06-29 06:08:50'),
(2, 'Medical Services doctor', 'Completely provide access to user-centric infomediaries after high-payoff leadership', 40000, 30000, 0, NULL, '2021-06-29 06:09:16'),
(4, 'check bood doctor', 'Completely provide access to user-centric infomediaries after high-payoff leadership', 345, 56, 0, '2021-06-28 09:40:53', '2021-06-28 09:40:53'),
(7, 'Package Service one', 'Quickly integrate emerging best practices rather than relia', 12000, 7000, 1, '2021-06-29 06:05:51', '2021-06-29 06:09:24'),
(8, 'Package Service two', 'Quickly integrate emerging best practices rather than reliable processes. Distinctively drive just in', 40000, 20000, 1, '2021-06-29 06:06:17', '2021-06-29 06:09:32'),
(9, 'Package Service three', 'Quickly integrate emerging best practices rather than reliable processes. Distinctively drive just in time alignments wher', 12000, 10000, 1, '2021-06-29 06:06:37', '2021-06-29 06:09:40'),
(10, 'Package Service four', 'Quickly integrate emerging best practices rather than reliable processes. Distinctively drive just in time ali', 40000, 30000, 1, '2021-06-29 06:07:00', '2021-06-29 06:09:48'),
(11, 'ပင်လယ်စာ', 'Quickly integrate emerging best practices rather than reliable processes. Distinctively drive just in time alignments whereas stand-alone imperatives. Assertively redefine cooperative convergence via e-business growth strategies. Holisticly matrix vertical potentialities through enterprise information. Completely repurpose leading-edge mindshare vis-a-vis intuitive methods of empowerment.  Interactively reconceptualize open-source services whereas multimedia based markets. Synergistically reinvent principle-centered resources without.', 1200, 1300, 1, '2021-07-05 09:12:27', '2021-07-05 09:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `service_voucher`
--

CREATE TABLE `service_voucher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_voucher`
--

INSERT INTO `service_voucher` (`id`, `service_id`, `voucher_id`, `quantity`, `doctor_id`, `created_at`, `updated_at`) VALUES
(85, 1, 1386, 1, NULL, NULL, NULL),
(106, 1, 1388, 1, NULL, NULL, NULL),
(107, 9, 1388, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_code`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 'MMR001', 'Kachin State', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(2, 'MMR002', 'Kayah State', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(3, 'MMR003', 'Kayin State', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(4, 'MMR004', 'Chin State', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(5, 'MMR005', 'Sagaing State', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(6, 'MMR006', 'Tanintharyi State', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(7, 'MMR007', 'Bago State (East)', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(8, 'MMR008', 'Bago State (West)', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(9, 'MMR009', 'Magway State', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(10, 'MMR010', 'Mandalay State', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(11, 'MMR011', 'Mon State', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(12, 'MMR012', 'Rakhine State', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(13, 'MMR013', 'Yangon State', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(14, 'MMR014', 'Shan State (South)', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(15, 'MMR015', 'Shan State (North)', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(16, 'MMR016', 'Shan State (East)', '2020-08-07 10:13:29', '2020-08-07 10:13:29'),
(17, 'MMR017', 'Ayeyarwady State', '2020-08-07 10:13:29', '2020-08-07 10:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcategory_code`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(2, '002', 'sub_category_two', 3, '2021-06-13 09:44:55', '2021-06-13 09:44:55'),
(3, '003', 'sub_category_three', 1, '2021-06-13 16:49:39', '2021-06-13 16:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `town_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 not allow delivery 1 delivery ',
  `delivery_charges` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`id`, `town_code`, `town_name`, `state_id`, `created_at`, `updated_at`, `status`, `delivery_charges`) VALUES
(1, 'MMR001001', 'Myitkyina', 1, '2020-08-07 10:37:26', '2021-09-02 06:11:58', 1, 20000),
(2, 'MMR001002', 'Waingmaw', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 1, 2000),
(3, 'MMR001003', 'Injangyang', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 1, 2000),
(4, 'MMR001004', 'Tanai', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 1, 2000),
(5, 'MMR001005', 'Chipwi', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 1, 2000),
(6, 'MMR001006', 'Tsawlaw', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 0, NULL),
(7, 'MMR001007', 'Mohnyin', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 0, NULL),
(8, 'MMR001008', 'Mogaung', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 0, NULL),
(9, 'MMR001009', 'Hpakan', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 0, NULL),
(10, 'MMR001010', 'Bhamo', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 1, 2000),
(11, 'MMR001011', 'Shwegu', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 1, 2000),
(12, 'MMR001012', 'Momauk', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 0, NULL),
(13, 'MMR001013', 'Mansi', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 0, NULL),
(14, 'MMR001014', 'Puta-O', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 0, NULL),
(15, 'MMR001015', 'Sumprabum', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 1, 2000),
(16, 'MMR001016', 'Machanbaw', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 0, NULL),
(17, 'MMR001017', 'Nogmung', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 1, 2000),
(18, 'MMR001018', 'Kawnglanghpu', 1, '2020-08-07 10:37:26', '2020-08-07 10:37:26', 0, NULL),
(19, 'MMR002001', 'Loikaw', 2, '2020-08-07 10:42:53', '2020-08-07 10:42:53', 1, 2000),
(20, 'MMR002002', 'Demoso', 2, '2020-08-07 10:42:53', '2020-08-07 10:42:53', 0, NULL),
(21, 'MMR002003', 'Hpruso', 2, '2020-08-07 10:42:53', '2020-08-07 10:42:53', 1, 2000),
(22, 'MMR002004', 'Shadaw', 2, '2020-08-07 10:42:53', '2020-08-07 10:42:53', 0, NULL),
(23, 'MMR002005', 'Bawlakhe', 2, '2020-08-07 10:42:53', '2020-08-07 10:42:53', 1, 2000),
(24, 'MMR002006', 'Hpasawng', 2, '2020-08-07 10:42:53', '2020-08-07 10:42:53', 0, NULL),
(25, 'MMR002007', 'Mese', 2, '2020-08-07 10:42:53', '2020-08-07 10:42:53', 0, NULL),
(26, 'MMR003001', 'Hpa-An', 3, '2020-08-07 10:45:13', '2020-08-07 10:45:13', 1, 2000),
(27, 'MMR003002', 'Hlaingbwe', 3, '2020-08-07 10:45:13', '2020-08-07 10:45:13', 0, NULL),
(28, 'MMR003003', 'Hpapun', 3, '2020-08-07 10:45:13', '2020-08-07 10:45:13', 0, NULL),
(29, 'MMR003004', 'Thandaung', 3, '2020-08-07 10:45:13', '2020-08-07 10:45:13', 1, 2000),
(30, 'MMR003005', 'Myawaddy', 3, '2020-08-07 10:45:13', '2020-08-07 10:45:13', 0, NULL),
(31, 'MMR003006', 'Kawkareik', 3, '2020-08-07 10:45:13', '2020-08-07 10:45:13', 0, NULL),
(32, 'MMR003007', 'Kyain Seikgyi', 3, '2020-08-07 10:45:13', '2020-08-07 10:45:13', 0, NULL),
(33, 'MMR004001', 'Falam', 4, '2020-08-07 10:47:39', '2020-08-07 10:47:39', 1, 2000),
(34, 'MMR004002', 'Hakha', 4, '2020-08-07 10:47:39', '2020-08-07 10:47:39', 0, NULL),
(35, 'MMR004003', 'Htantlang', 4, '2020-08-07 10:47:39', '2020-08-07 10:47:39', 0, NULL),
(36, 'MMR004004', 'Tiddim', 4, '2020-08-07 10:47:39', '2020-08-07 10:47:39', 0, NULL),
(37, 'MMR004005', 'Tonzang', 4, '2020-08-07 10:47:39', '2020-08-07 10:47:39', 0, NULL),
(38, 'MMR004006', 'Mindat', 4, '2020-08-07 10:47:39', '2020-08-07 10:47:39', 1, 2000),
(39, 'MMR004007', 'Madupi', 4, '2020-08-07 10:47:39', '2020-08-07 10:47:39', 0, NULL),
(40, 'MMR004008', 'Kanpetlet', 4, '2020-08-07 10:47:39', '2020-08-07 10:47:39', 0, NULL),
(41, 'MMR004009', 'Paletwa', 4, '2020-08-07 10:47:39', '2020-08-07 10:47:39', 0, NULL),
(42, 'MMR005001', 'Sagaing', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(43, 'MMR005002', 'Myinmu', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 1, 2000),
(44, 'MMR005003', 'Myaung', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(45, 'MMR005004', 'Shwebo', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(46, 'MMR005005', 'Khin-U', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(47, 'MMR005006', 'Wetlet', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 1, 2000),
(48, 'MMR005007', 'Kanbalu', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(49, 'MMR005008', 'Kyunhla', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(50, 'MMR005009', 'Ye-U', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 1, 2000),
(51, 'MMR005010', 'Tabayin', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(52, 'MMR005011', 'Taze', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(53, 'MMR005012', 'Monywa', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 1, 2000),
(54, 'MMR005013', 'Budalin', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(55, 'MMR005014', 'Ayadaw', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(56, 'MMR005015', 'Chaung-U', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(57, 'MMR005016', 'Yinmabin', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 1, 2000),
(58, 'MMR005017', 'Kani', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(59, 'MMR005018', 'Salingyi', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(60, 'MMR005019', 'Pale', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(61, 'MMR005020', 'Katha', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 1, 2000),
(62, 'MMR005021', 'Indaw', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(63, 'MMR005022', 'Tigyaing', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(64, 'MMR005023', 'Banmauk', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(65, 'MMR005024', 'Kawlin', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(66, 'MMR005025', 'Wuntho', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(67, 'MMR005026', 'Pinlebu', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 1, 2000),
(68, 'MMR005027', 'Kale', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(69, 'MMR005028', 'Kalewa', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(70, 'MMR005029', 'Kalewa', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(71, 'MMR005030', 'Tamu', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(72, 'MMR005031', 'Mawlaik', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 1, NULL),
(73, 'MMR005032', 'Paungbyin', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(74, 'MMR005033', 'Hkamti', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 1, 2000),
(75, 'MMR005034', 'Homalin', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(76, 'MMR005035', 'Lay Shi', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(77, 'MMR005036', 'Lahe', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(78, 'MMR005037', 'Nanyun', 5, '2020-08-09 16:38:44', '2020-08-09 16:38:44', 0, NULL),
(79, 'MMR006001', 'Dawei', 6, '2020-08-09 16:42:35', '2020-08-09 16:42:35', 0, NULL),
(80, 'MMR006002', 'Launglon', 6, '2020-08-09 16:42:35', '2020-08-09 16:42:35', 0, NULL),
(81, 'MMR006003', 'Thayetchaung', 6, '2020-08-09 16:42:35', '2020-08-09 16:42:35', 0, NULL),
(82, 'MMR006004', 'Yebyu', 6, '2020-08-09 16:42:35', '2020-08-09 16:42:35', 0, NULL),
(83, 'MMR006005', 'Myeik', 6, '2020-08-09 16:42:35', '2020-08-09 16:42:35', 0, NULL),
(84, 'MMR006006', 'Kyunsu', 6, '2020-08-09 16:42:35', '2020-08-09 16:42:35', 0, NULL),
(85, 'MMR006007', 'Palaw', 6, '2020-08-09 16:42:35', '2020-08-09 16:42:35', 0, NULL),
(86, 'MMR006008', 'Tanintharyi', 6, '2020-08-09 16:42:35', '2020-08-09 16:42:35', 0, NULL),
(87, 'MMR006009', 'Kawthoung', 6, '2020-08-09 16:42:35', '2020-08-09 16:42:35', 0, NULL),
(88, 'MMR006010', 'Bokpyin', 6, '2020-08-09 16:42:35', '2020-08-09 16:42:35', 0, NULL),
(89, 'MMR007001', 'Bago', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(90, 'MMR007002', 'Thanatpin', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(91, 'MMR007003', 'Kawa', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(92, 'MMR007004', 'Waw', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(93, 'MMR007005', 'Nyaunglebin', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(94, 'MMR007006', 'Kyauktaga', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(95, 'MMR007007', 'Daik-U', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(96, 'MMR007008', 'Shwegyin', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(97, 'MMR007009', 'Taungoo', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(98, 'MMR007010', 'Yedashe', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(99, 'MMR007011', 'Kyaukkyi', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(100, 'MMR007012', 'Phyu', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(101, 'MMR007013', 'Oktwin', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(102, 'MMR007014', 'Tantabin', 7, '2020-08-09 16:45:48', '2020-08-09 16:45:48', 0, NULL),
(103, 'MMR008001', 'Pyay', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(104, 'MMR008002', 'Pauk Kaung', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(105, 'MMR008003', 'Padaung', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(106, 'MMR008004', 'Paungde', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(107, 'MMR008005', 'Thegon', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(108, 'MMR008006', 'Shwedaung', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(109, 'MMR008007', 'Thayarwady', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(110, 'MMR008008', 'Letpadan', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(111, 'MMR008009', 'Minhla', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(112, 'MMR008010', 'Okpho', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(113, 'MMR008011', 'Zigon', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(114, 'MMR008012', 'Nattalin', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(115, 'MMR008013', 'Monyo', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(116, 'MMR008014', 'Gyobingauk', 8, '2020-08-09 16:48:39', '2020-08-09 16:48:39', 0, NULL),
(117, 'MMR009001', 'Magway', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(118, 'MMR009002', 'Yenangyaung', 9, '2020-08-09 16:54:51', '2020-08-11 16:44:19', 0, NULL),
(119, 'MMR009003', 'Chauk', 9, '2020-08-09 16:54:51', '2020-08-11 16:44:38', 0, NULL),
(120, 'MMR009004', 'Taungdwingyi', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(121, 'MMR009005', 'Myothit', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(122, 'MMR009006', 'Natmauk', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(123, 'MMR009007', 'Minbu', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(124, 'MMR009008', 'Pwintbyu', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(125, 'MMR009009', 'Ngape', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(126, 'MMR009010', 'Salin', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(127, 'MMR009011', 'Sidoktaya', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(128, 'MMR009012', 'Thayet', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(129, 'MMR009013', 'Minhla', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(130, 'MMR009014', 'Mindon', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(131, 'MMR009015', 'Kamma', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(132, 'MMR009016', 'Aunglan', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(133, 'MMR009017', 'Sinbaungwe', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(134, 'MMR009018', 'Pakokku', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(135, 'MMR009019', 'Yesagyo', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(136, 'MMR009020', 'Myaing', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(137, 'MMR009021', 'Pauk', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(138, 'MMR009022', 'Seikphyu', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(139, 'MMR009023', 'Gangaw', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(140, 'MMR009024', 'Tilin', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(141, 'MMR009025', 'Saw', 9, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(143, 'MMR010001', 'Aungmyaythazan', 10, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(144, 'MMR010002', 'Chanayethazan', 10, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(145, 'MMR010003', 'Mahaaungmyay', 10, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(146, 'MMR010004', 'Chanmyathazi', 10, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(147, 'MMR010005', 'Pyigyitagon', 10, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(148, 'MMR010006', 'Amarapura', 10, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(149, 'MMR010007', 'Patheingyi', 10, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(150, 'MMR010008', 'Pyinoolwin', 10, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(151, 'MMR010009', 'Madaya', 10, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(152, 'MMR010010', 'Singu', 10, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(153, 'MMR010011', 'Mogoke', 10, '2020-08-09 16:54:51', '2020-08-11 09:36:02', 0, NULL),
(154, 'MMR010012', 'Thabeikkyin', 10, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(155, 'MMR010013', 'Kyaukse', 10, '2020-08-09 16:54:51', '2020-08-09 16:54:51', 0, NULL),
(156, 'MMR010014', 'Sintgaing', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(157, 'MMR010015', 'Myittha', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(158, 'MMR010016', 'Tada-U', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(159, 'MMR010017', 'Myingyan', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(160, 'MMR010018', 'Taungtha', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(161, 'MMR010019', 'Natogyi', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(162, 'MMR010020', 'Kyaukpadaung', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(163, 'MMR010021', 'Ngazun', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(164, 'MMR010022', 'Nyaung-U', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(165, 'MMR010023', 'Yamethin', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(166, 'MMR010024', 'Pyawbwe', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(167, 'MMR010025', 'Tatkon', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(168, 'MMR010026', 'Pyinmana', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(169, 'MMR010027', 'Lewe', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(170, 'MMR010028', 'Meiktila', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(171, 'MMR010029', 'Mahlaing', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(172, 'MMR010030', 'Thazi', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(173, 'MMR010031', 'Wundwin', 10, '2020-08-09 16:54:52', '2020-08-09 16:54:52', 0, NULL),
(174, 'MMR011001', 'Mawlamyine', 11, '2020-08-09 16:58:01', '2020-08-09 16:58:01', 0, NULL),
(175, 'MMR011002', 'Kyaikmaraw', 11, '2020-08-09 16:58:01', '2020-08-09 16:58:01', 0, NULL),
(176, 'MMR011003', 'Chaungzon', 11, '2020-08-09 16:58:01', '2020-08-09 16:58:01', 0, NULL),
(177, 'MMR011004', 'Thanbyuzayat', 11, '2020-08-09 16:58:01', '2020-08-09 16:58:01', 0, NULL),
(178, 'MMR011005', 'Mudon', 11, '2020-08-09 16:58:01', '2020-08-09 16:58:01', 0, NULL),
(179, 'MMR011006', 'Ye', 11, '2020-08-09 16:58:01', '2020-08-09 16:58:01', 0, NULL),
(180, 'MMR011007', 'Thaton', 11, '2020-08-09 16:58:01', '2020-08-09 16:58:01', 0, NULL),
(181, 'MMR011008', 'Paung', 11, '2020-08-09 16:58:01', '2020-08-09 16:58:01', 0, NULL),
(182, 'MMR011009', 'Kyaikto', 11, '2020-08-09 16:58:01', '2020-08-09 16:58:01', 0, NULL),
(183, 'MMR011010', 'Bilin', 11, '2020-08-09 16:58:01', '2020-08-09 16:58:01', 0, NULL),
(184, 'MMR012001', 'Thandwe', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(185, 'MMR012002', 'Ramree', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(186, 'MMR012003', 'Munaung', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(187, 'MMR012004', 'Maungdaw', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(188, 'MMR012005', 'Mrauk-U', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(189, 'MMR012006', 'Pauktaw', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(190, 'MMR012007', 'Ponnagyun', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(191, 'MMR012008', 'Sittwe', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(192, 'MMR012009', 'Minbya', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(193, 'MMR012010', 'Gwa', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(194, 'MMR012011', 'Kyauktaw', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(195, 'MMR012012', 'Myebon', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(196, 'MMR012013', 'Rathedaung', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(197, 'MMR012014', 'Buthidaung', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(198, 'MMR012015', 'Toungup', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(199, 'MMR012016', 'Bilin', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(200, 'MMR012017', 'Kyaukpyu', 12, '2020-08-09 17:01:57', '2020-08-09 17:01:57', 0, NULL),
(201, 'MMR013001', 'Insein', 13, '2020-08-09 19:50:15', '2020-08-09 19:50:15', 0, NULL),
(202, 'MMR013002', 'Mingaladon', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(203, 'MMR013003', 'Hmawbi', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(204, 'MMR013004', 'Hlegu', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(205, 'MMR013005', 'Taikkyi', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(206, 'MMR013006', 'Htantabin', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(207, 'MMR013007', 'Shwepyithar', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(208, 'MMR013008', 'Hlaingtharya', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(209, 'MMR013009', 'Thingangkuun', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(210, 'MMR013010', 'Yankin', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(211, 'MMR013011', 'South Okkalapa', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(212, 'MMR013012', 'North Okkalapa', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(213, 'MMR013013', 'Thaketa', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(214, 'MMR013014', 'Dawbon', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(215, 'MMR013015', 'Tamwe', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(216, 'MMR013016', 'Pazundaung', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(217, 'MMR013017', 'Botahtaung', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(218, 'MMR013018', 'Dagon Myothit(South)', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(219, 'MMR013019', 'Dagon Myothit(North)', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(220, 'MMR013020', 'Dagon Myothit(East)', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(221, 'MMR013021', 'Dagon Myothit(Seikkan)', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(222, 'MMR013022', 'Mingalartaungnyunt', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(223, 'MMR013023', 'Thanlyin', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(224, 'MMR013024', 'Kyauktan', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(225, 'MMR013025', 'Thongwa', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(226, 'MMR013026', 'Kayan', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(227, 'MMR013027', 'Twantay', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(228, 'MMR013028', 'Kawhmu', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(229, 'MMR013029', 'Kungyangon', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(230, 'MMR013030', 'Dala', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(231, 'MMR013031', 'Seikgyikanaungto', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(232, 'MMR013032', 'Cocokyun', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(233, 'MMR013033', 'Kyauktada', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(234, 'MMR013034', 'Pabedan', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(235, 'MMR013035', 'Lanmadaw', 13, '2020-08-11 09:51:08', '2020-08-11 09:51:08', 0, NULL),
(236, 'MMR013036', 'Latha', 13, '2020-08-11 09:51:09', '2020-08-11 09:51:09', 0, NULL),
(237, 'MMR013037', 'Ahlone', 13, '2020-08-11 09:51:09', '2020-08-11 09:51:09', 0, NULL),
(238, 'MMR013038', 'Kyeemyindaing', 13, '2020-08-11 09:51:09', '2020-08-11 09:51:09', 0, NULL),
(239, 'MMR013039', 'Sanchaung', 13, '2020-08-11 09:51:09', '2020-08-11 09:51:09', 0, NULL),
(240, 'MMR013040', 'Hlaing', 13, '2020-08-11 09:51:09', '2020-08-11 09:51:09', 0, NULL),
(241, 'MMR013041', 'Kamaryut', 13, '2020-08-11 09:51:09', '2020-08-11 09:51:09', 0, NULL),
(242, 'MMR013042', 'Mayangone', 13, '2020-08-11 09:51:09', '2020-08-11 09:51:09', 0, NULL),
(243, 'MMR013043', 'Dagon', 13, '2020-08-11 09:51:09', '2020-08-11 09:51:09', 0, NULL),
(244, 'MMR013044', 'Bahan', 13, '2020-08-11 09:51:09', '2020-08-11 09:51:09', 0, NULL),
(245, 'MMR013045', 'Seikkan', 13, '2020-08-11 09:51:09', '2020-08-11 09:51:09', 0, NULL),
(246, 'MMR013002', 'Mingaladon', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(247, 'MMR013003', 'Hmawbi', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(248, 'MMR013004', 'Hlegu', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(249, 'MMR013005', 'Taikkyi', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(250, 'MMR013006', 'Htantabin', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(251, 'MMR013007', 'Shwepyithar', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(252, 'MMR013008', 'Hlaingtharya', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(253, 'MMR013009', 'Thingangkuun', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(254, 'MMR013010', 'Yankin', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(255, 'MMR013011', 'South Okkalapa', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(256, 'MMR013012', 'North Okkalapa', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(257, 'MMR013013', 'Thaketa', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(258, 'MMR013014', 'Dawbon', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(259, 'MMR013015', 'Tamwe', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(260, 'MMR013016', 'Pazundaung', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(261, 'MMR013017', 'Botahtaung', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(262, 'MMR013018', 'Dagon Myothit(South)', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(263, 'MMR013019', 'Dagon Myothit(North)', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(264, 'MMR013020', 'Dagon Myothit(East)', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(265, 'MMR013021', 'Dagon Myothit(Seikkan)', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(266, 'MMR013022', 'Mingalartaungnyunt', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(267, 'MMR013023', 'Thanlyin', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(268, 'MMR013024', 'Kyauktan', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(269, 'MMR013025', 'Thongwa', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(270, 'MMR013026', 'Kayan', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(271, 'MMR013027', 'Twantay', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(272, 'MMR013028', 'Kawhmu', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(273, 'MMR013029', 'Kungyangon', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(274, 'MMR013030', 'Dala', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(275, 'MMR013031', 'Seikgyikanaungto', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(276, 'MMR013032', 'Cocokyun', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(277, 'MMR013033', 'Kyauktada', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(278, 'MMR013034', 'Pabedan', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(279, 'MMR013035', 'Lanmadaw', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(280, 'MMR013036', 'Latha', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(281, 'MMR013037', 'Ahlone', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(282, 'MMR013038', 'Kyeemyindaing', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(283, 'MMR013039', 'Sanchaung', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(284, 'MMR013040', 'Hlaing', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(285, 'MMR013041', 'Kamaryut', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(286, 'MMR013042', 'Mayangone', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(287, 'MMR013043', 'Dagon', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(288, 'MMR013044', 'Bahan', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(289, 'MMR013045', 'Seikkan', 13, '2020-08-11 10:02:25', '2020-08-11 10:02:25', 0, NULL),
(290, 'MMR015001', 'Lashio', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(291, 'MMR015002', 'Hseni', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(292, 'MMR015003', 'Mongyai', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(293, 'MMR015004', 'Tangyan', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(294, 'MMR015005', 'Pangsang', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(295, 'MMR015006', 'Namphan', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(296, 'MMR015007', 'Pangwaun', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(297, 'MMR015008', 'Mongmao', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(298, 'MMR015009', 'Muse', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(299, 'MMR015010', 'Nanhkan', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(300, 'MMR015011', 'Kutkai', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(301, 'MMR015012', 'Kyuakme', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(302, 'MMR015013', 'Nawnghkio', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(303, 'MMR015014', 'Hsipaw', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(304, 'MMR015015', 'Namtu', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(305, 'MMR015016', 'Namhsan', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(306, 'MMR015017', 'Mongmit', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(307, 'MMR015018', 'Mabein', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(308, 'MMR015019', 'Manton', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(309, 'MMR015020', 'Kunlong', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(310, 'MMR015021', 'Hopang', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(311, 'MMR015022', 'Laukkaing', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(312, 'MMR015023', 'Konkyan', 15, '2020-08-11 10:14:46', '2020-08-11 10:14:46', 0, NULL),
(313, 'MMR016001', 'Kengtung', 16, '2020-08-11 10:22:13', '2020-08-11 10:22:13', 0, NULL),
(314, 'MMR016002', 'Mongkhet', 16, '2020-08-11 10:22:13', '2020-08-11 10:22:13', 0, NULL),
(315, 'MMR016003', 'Mongyang', 16, '2020-08-11 10:22:13', '2020-08-11 10:22:13', 0, NULL),
(316, 'MMR016004', 'Matman', 16, '2020-08-11 10:22:13', '2020-08-11 10:22:13', 0, NULL),
(317, 'MMR016005', 'Mongla', 16, '2020-08-11 10:22:13', '2020-08-11 10:22:13', 0, NULL),
(318, 'MMR016006', 'Monghsat', 16, '2020-08-11 10:22:13', '2020-08-11 10:22:13', 0, NULL),
(319, 'MMR016007', 'Mongping', 16, '2020-08-11 10:22:13', '2020-08-11 10:22:13', 0, NULL),
(320, 'MMR016008', 'Mongton', 16, '2020-08-11 10:22:13', '2020-08-11 10:22:13', 0, NULL),
(321, 'MMR016009', 'Tachileik', 16, '2020-08-11 10:22:13', '2020-08-11 10:22:13', 0, NULL),
(322, 'MMR016010', 'Monghpyak', 16, '2020-08-11 10:22:13', '2020-08-11 10:22:13', 0, NULL),
(323, 'MMR016011', 'Mongyawng', 16, '2020-08-11 10:22:13', '2020-08-11 10:22:13', 0, NULL),
(324, 'MMR017001', 'Pathein', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(325, 'MMR017002', 'Kangyidaunt', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(326, 'MMR017003', 'Thabaung', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(327, 'MMR017004', 'Ngapudaw', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(328, 'MMR017005', 'Kyonpyaw', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(329, 'MMR017006', 'Yegyi', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(330, 'MMR017007', 'Kyaunggon', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(331, 'MMR017008', 'Hinthada', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(332, 'MMR017009', 'Zalun', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(333, 'MMR017010', 'Lemyethna', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(334, 'MMR017011', 'Myanaung', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(335, 'MMR017012', 'Kyangin', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(336, 'MMR017013', 'Ingapu', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(337, 'MMR017014', 'Myaungmya', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(338, 'MMR017015', 'Einme', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(339, 'MMR017016', 'Labutta', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(340, 'MMR017017', 'Wakema', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(341, 'MMR017018', 'Mawlamyinegyun', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(342, 'MMR017019', 'Maubin', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(343, 'MMR017020', 'Pantanaw', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(344, 'MMR017021', 'Nyaungdon', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(345, 'MMR017022', 'Danubyu', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(346, 'MMR017023', 'Pyapon', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(347, 'MMR017024', 'Bogale', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(348, 'MMR017025', 'Kyaiklat', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(349, 'MMR017026', 'Dedaye', 17, '2020-08-11 10:26:40', '2020-08-11 10:26:40', 0, NULL),
(350, 'MMR014001', 'Taunggyi', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(351, 'MMR014002', 'Nyaungshwe', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(352, 'MMR014003', 'Hopong', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(353, 'MMR014004', 'Hsihseng', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(354, 'MMR014005', 'Kalaw', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(355, 'MMR014006', 'Pindaya', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(356, 'MMR014007', 'Ywangan', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(357, 'MMR014008', 'Lawksawk', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(358, 'MMR014009', 'Pinlaung', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(359, 'MMR014010', 'Pekon', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(360, 'MMR014011', 'Loilen', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(361, 'MMR014012', 'Laihka', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(362, 'MMR014013', 'Nansang', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(363, 'MMR014014', 'Kunhing', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(364, 'MMR014015', 'Kyethi', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(365, 'MMR014016', 'Mongkaung', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(366, 'MMR014017', 'Monghsu', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(367, 'MMR014018', 'Langkho', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(368, 'MMR014019', 'Mongnai', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(369, 'MMR014020', 'Mawkmai', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(370, 'MMR014021', 'Mongpan', 14, '2020-08-11 17:03:02', '2020-08-11 17:03:02', 0, NULL),
(373, 'MMR001019', 'test town', 1, '2021-09-01 07:28:38', '2021-09-01 07:28:38', 1, 2000),
(374, 'MMR001020', 'test town2', 1, '2021-09-01 07:29:01', '2021-09-01 07:29:01', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '1-debit, 2 - credit',
  `related_project_flag` int(11) NOT NULL DEFAULT 0,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `related_transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_flag` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expense_flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `account_id`, `amount`, `date`, `remark`, `type`, `related_project_flag`, `project_id`, `related_transaction_id`, `type_flag`, `created_at`, `updated_at`, `expense_flag`) VALUES
(138, 64, 4167, '2022-03-07', 'Monthly Depriciation', 2, 2, NULL, NULL, 2, '2022-03-06 19:25:36', '2022-03-06 19:25:36', 0),
(139, 65, 4167, '2022-03-07', 'Monthly Depriciation', 1, 2, NULL, NULL, 2, '2022-03-06 19:25:36', '2022-03-06 19:25:36', 0),
(140, 45, 4167, '2022-03-07', 'Monthly Depriciation', 1, 2, NULL, NULL, 2, '2022-03-06 19:25:36', '2022-03-06 19:25:36', 0),
(141, 64, 4167, '2022-03-07', 'Monthly Depriciation', 2, 2, NULL, NULL, 2, '2022-03-06 19:38:21', '2022-03-06 19:38:21', 0),
(142, 65, 4167, '2022-03-07', 'Monthly Depriciation', 1, 2, NULL, NULL, 2, '2022-03-06 19:38:21', '2022-03-06 19:38:21', 0),
(143, 45, 4167, '2022-03-07', 'Monthly Depriciation', 1, 2, NULL, NULL, 2, '2022-03-06 19:38:21', '2022-03-06 19:38:21', 0),
(144, 66, 333, '2022-03-07', 'Monthly Depriciation', 2, 2, NULL, NULL, 2, '2022-03-06 19:40:08', '2022-03-06 19:40:08', 0),
(145, 67, 333, '2022-03-07', 'Monthly Depriciation', 1, 2, NULL, NULL, 2, '2022-03-06 19:40:08', '2022-03-06 19:40:08', 0),
(146, 45, 333, '2022-03-07', 'Monthly Depriciation', 1, 2, NULL, NULL, 2, '2022-03-06 19:40:08', '2022-03-06 19:40:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_conversions`
--

CREATE TABLE `unit_conversions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_unit_id` int(11) NOT NULL,
  `from_unit_quantity` int(11) NOT NULL,
  `to_unit_id` int(11) NOT NULL,
  `to_unit_quantity` int(11) NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_conversions`
--

INSERT INTO `unit_conversions` (`id`, `from_unit_id`, `from_unit_quantity`, `to_unit_id`, `to_unit_quantity`, `item_id`, `created_at`, `updated_at`) VALUES
(1, 15, 9, 16, 90, 1, '2021-07-07 04:41:22', '2021-07-07 04:41:22'),
(2, 15, 8, 16, 140, 1, '2021-07-07 04:42:07', '2021-07-07 04:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `unit_relations`
--

CREATE TABLE `unit_relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_unit` int(11) NOT NULL,
  `to_unit` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_relations`
--

INSERT INTO `unit_relations` (`id`, `from_unit`, `to_unit`, `quantity`, `item_id`, `created_at`, `updated_at`) VALUES
(1, 16, 15, 50, 1, '2021-07-07 04:24:45', '2021-07-07 04:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `provider`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Dr. Thel Su San', 'drthelsusan@gmail.com', NULL, NULL, '$2y$10$5v911.LJAHlu3ZAEll06auc5NhAm8IGqc7Vh78JndqqRbe7yDB9z.', NULL, NULL, NULL, '2021-01-07 08:52:17', '2021-11-01 07:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `user_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `sale_by` int(11) NOT NULL,
  `voucher_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_status` int(11) DEFAULT NULL COMMENT '0- direct,1- pickup,2 - delivery',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `town_id` bigint(20) UNSIGNED DEFAULT NULL,
  `delivery_charges` int(11) DEFAULT NULL,
  `appointment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `clinicvoucher_status` int(11) DEFAULT NULL COMMENT 'for clinic record = 0, voucher = 1',
  `medicine_charges` int(11) DEFAULT NULL,
  `service_charges` int(11) DEFAULT NULL,
  `doctor_charges` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `voucher_code`, `total_price`, `total_quantity`, `type`, `status`, `sale_by`, `voucher_date`, `deleted_at`, `created_at`, `updated_at`, `delivery_status`, `name`, `phone`, `address`, `date`, `state_id`, `town_id`, `delivery_charges`, `appointment_id`, `clinicvoucher_status`, `medicine_charges`, `service_charges`, `doctor_charges`) VALUES
(1385, 'VOU-01112021-0001', 53000, 0, 1, 0, 5, '2021-12-23', NULL, '2021-11-01 08:01:30', '2021-11-01 08:01:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 0, 10000, 20000, 23000),
(1386, 'VOU-02112021-1386', 7000, 0, 1, 0, 19, '2021-11-02', NULL, '2021-11-02 08:04:16', '2021-11-02 08:27:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 1, 1000, 3000, 3000),
(1387, 'VOU-03112021-1387', 41200, 0, 1, 0, 5, '2021-12-09', NULL, '2021-12-09 09:35:28', '2021-11-22 05:01:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, 1, 10000, 30000, 1200),
(1388, 'VOU-08112021-1388', 3900, 0, 1, 0, 5, '2021-12-25', NULL, '2021-12-25 15:17:45', '2021-11-22 04:54:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, 1, 1200, 1300, 1400),
(1389, 'VOU-09112021-1389', 6000, 0, 1, 0, 5, '2021-12-28', NULL, '2021-12-28 03:25:52', '2021-11-15 03:30:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, 1, 1000, 2000, 3000),
(1390, 'VOU-21112021-1390', 6000, 0, 1, 0, 5, '2021-12-29', NULL, '2021-12-29 16:49:11', '2021-11-21 06:15:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 1, 1000, 2000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `year_projects`
--

CREATE TABLE `year_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `year_projects`
--

INSERT INTO `year_projects` (`id`, `year`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 2022, 2, '2022-02-25 12:36:16', '2022-02-25 12:36:16'),
(2, 2022, 3, '2022-02-25 14:29:52', '2022-02-25 14:29:52'),
(3, 2022, 4, '2022-02-25 14:31:23', '2022-02-25 14:31:23'),
(4, 2022, 5, '2022-02-25 14:33:30', '2022-02-25 14:33:30'),
(5, 2022, 6, '2022-02-25 14:34:01', '2022-02-25 14:34:01'),
(6, 2022, 7, '2022-02-25 14:35:31', '2022-02-25 14:35:31'),
(7, 2022, 8, '2022-02-26 03:42:33', '2022-02-26 03:42:33'),
(8, 2022, 9, '2022-03-02 10:13:02', '2022-03-02 10:13:02'),
(9, 2022, 10, '2022-03-02 10:40:18', '2022-03-02 10:40:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountings`
--
ALTER TABLE `accountings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounting_types`
--
ALTER TABLE `accounting_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisements_package_id_foreign` (`package_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_attachments`
--
ALTER TABLE `appointment_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_attachments_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `appointment_diagnosis`
--
ALTER TABLE `appointment_diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_schedule_change_log_id_foreign` (`schedule_change_log_id`);

--
-- Indexes for table `booking_infos`
--
ALTER TABLE `booking_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_sub_category`
--
ALTER TABLE `brand_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_sub_category_brand_id_foreign` (`brand_id`),
  ADD KEY `brand_sub_category_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashes`
--
ALTER TABLE `cashes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinicappointmentinfos`
--
ALTER TABLE `clinicappointmentinfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinicappointmentinfos_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `clinic_patients`
--
ALTER TABLE `clinic_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counting_units`
--
ALTER TABLE `counting_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counting_unit_voucher`
--
ALTER TABLE `counting_unit_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_sale_project`
--
ALTER TABLE `customer_sale_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_doctor`
--
ALTER TABLE `day_doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_day`
--
ALTER TABLE `doctor_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_infos`
--
ALTER TABLE `doctor_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_notifications`
--
ALTER TABLE `doctor_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_service`
--
ALTER TABLE `doctor_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_service_doctor_id_foreign` (`doctor_id`),
  ADD KEY `doctor_service_service_id_foreign` (`service_id`);

--
-- Indexes for table `doctor_times`
--
ALTER TABLE `doctor_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doses`
--
ALTER TABLE `doses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_information`
--
ALTER TABLE `education_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience_information`
--
ALTER TABLE `experience_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixed_assets`
--
ALTER TABLE `fixed_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_product_lists`
--
ALTER TABLE `invoice_product_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linked_social_accounts`
--
ALTER TABLE `linked_social_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_service`
--
ALTER TABLE `package_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_service_package_id_foreign` (`package_id`),
  ADD KEY `package_service_service_id_foreign` (`service_id`);

--
-- Indexes for table `package_voucher`
--
ALTER TABLE `package_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_projects`
--
ALTER TABLE `sale_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_change_logs`
--
ALTER TABLE `schedule_change_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_change_logs_request_doc_id_foreign` (`request_doc_id`),
  ADD KEY `schedule_change_logs_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_voucher`
--
ALTER TABLE `service_voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_voucher_service_id_foreign` (`service_id`),
  ADD KEY `service_voucher_voucher_id_foreign` (`voucher_id`),
  ADD KEY `service_voucher_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `types_brand_id_foreign` (`brand_id`),
  ADD KEY `types_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `unit_conversions`
--
ALTER TABLE `unit_conversions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_relations`
--
ALTER TABLE `unit_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year_projects`
--
ALTER TABLE `year_projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountings`
--
ALTER TABLE `accountings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `accounting_types`
--
ALTER TABLE `accounting_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `appointment_attachments`
--
ALTER TABLE `appointment_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `appointment_diagnosis`
--
ALTER TABLE `appointment_diagnosis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `booking_infos`
--
ALTER TABLE `booking_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand_sub_category`
--
ALTER TABLE `brand_sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cashes`
--
ALTER TABLE `cashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clinicappointmentinfos`
--
ALTER TABLE `clinicappointmentinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `clinic_patients`
--
ALTER TABLE `clinic_patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `counting_units`
--
ALTER TABLE `counting_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `counting_unit_voucher`
--
ALTER TABLE `counting_unit_voucher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_sale_project`
--
ALTER TABLE `customer_sale_project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20201228120310;

--
-- AUTO_INCREMENT for table `day_doctor`
--
ALTER TABLE `day_doctor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctor_day`
--
ALTER TABLE `doctor_day`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_infos`
--
ALTER TABLE `doctor_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctor_notifications`
--
ALTER TABLE `doctor_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_service`
--
ALTER TABLE `doctor_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `doctor_times`
--
ALTER TABLE `doctor_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doses`
--
ALTER TABLE `doses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `education_information`
--
ALTER TABLE `education_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `experience_information`
--
ALTER TABLE `experience_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixed_assets`
--
ALTER TABLE `fixed_assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoice_product_lists`
--
ALTER TABLE `invoice_product_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `linked_social_accounts`
--
ALTER TABLE `linked_social_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `package_service`
--
ALTER TABLE `package_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `package_voucher`
--
ALTER TABLE `package_voucher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_projects`
--
ALTER TABLE `sale_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule_change_logs`
--
ALTER TABLE `schedule_change_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `service_voucher`
--
ALTER TABLE `service_voucher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `towns`
--
ALTER TABLE `towns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit_conversions`
--
ALTER TABLE `unit_conversions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit_relations`
--
ALTER TABLE `unit_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1392;

--
-- AUTO_INCREMENT for table `year_projects`
--
ALTER TABLE `year_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appointment_attachments`
--
ALTER TABLE `appointment_attachments`
  ADD CONSTRAINT `appointment_attachments_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_schedule_change_log_id_foreign` FOREIGN KEY (`schedule_change_log_id`) REFERENCES `schedule_change_logs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `brand_sub_category`
--
ALTER TABLE `brand_sub_category`
  ADD CONSTRAINT `brand_sub_category_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `brand_sub_category_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clinicappointmentinfos`
--
ALTER TABLE `clinicappointmentinfos`
  ADD CONSTRAINT `clinicappointmentinfos_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_service`
--
ALTER TABLE `doctor_service`
  ADD CONSTRAINT `doctor_service_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_service`
--
ALTER TABLE `package_service`
  ADD CONSTRAINT `package_service_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedule_change_logs`
--
ALTER TABLE `schedule_change_logs`
  ADD CONSTRAINT `schedule_change_logs_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_change_logs_request_doc_id_foreign` FOREIGN KEY (`request_doc_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_voucher`
--
ALTER TABLE `service_voucher`
  ADD CONSTRAINT `service_voucher_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_voucher_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_voucher_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `types_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `types_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
