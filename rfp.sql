-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 11:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `question_id`) VALUES
(24, 'o1', 33),
(25, 'o2', 33),
(26, 'o3', 33),
(27, 'c1', 34),
(28, 'c2', 34),
(29, 'c4', 34),
(30, 'o1', 35),
(31, 'o2', 35),
(32, 'o3', 35),
(33, 'ch1', 39),
(34, 'ch2', 39),
(35, 'ch3', 39),
(36, 'r1', 40),
(37, 'e3', 40),
(38, 't5', 40),
(39, 'ch1', 41),
(40, 'ch2', 41),
(41, 'check3', 41),
(42, 'r1', 42),
(43, 'r3', 42),
(44, 'r6', 42),
(45, 'one', 43),
(46, 'tow', 43),
(47, 'three 3', 43),
(48, 'four', 43),
(49, 'r1', 44),
(50, 'e4', 44),
(51, 't5', 44),
(52, 'option1', 46),
(53, 'option2', 46),
(54, 'option1', 47),
(55, 'op2', 47),
(56, 'op 3', 47);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hs1876@fayoum.edu.eg', '$2y$10$0fyzcb6YhAAe3.F96VY3gewl2jKMhHvVZafTWwmeD8JJTwvcIXz2K', '2023-03-05 16:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(11) NOT NULL,
  `ticket_name` varchar(255) NOT NULL,
  `proposal` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `request_review` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `ticket_name`, `proposal`, `comment`, `request_review`, `type`, `created_at`, `updated_at`, `is_approved`) VALUES
(18, 'sales_member_presales_member_1', '1677609255.pdf', 'this is first proposal', '0', 'proposal', '2023-02-28 20:34:15', '2023-02-28 22:19:12', 1),
(19, 'sales_member_presales_member_1', '0', '0', 'please add something', 'review', '2023-02-28 20:35:38', '2023-02-28 22:19:12', 1),
(21, 'sales_member_presales_mdm_1', '1677615768.pdf', 'first proposal', '0', 'proposal', '2023-02-28 22:22:48', '2023-02-28 22:30:18', -1),
(22, 'sales_member_presales_mdm_1', '0', '0', 'review this section', 'review', '2023-02-28 22:26:04', '2023-02-28 22:30:18', -1),
(23, 'sales_member_presales_mdm_1', '1677616038.pdf', NULL, '0', 'proposal', '2023-02-28 22:27:18', '2023-02-28 22:30:18', -1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(250) NOT NULL,
  `number` int(11) NOT NULL,
  `solution_id` int(11) NOT NULL,
  `answer_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `number`, `solution_id`, `answer_type`) VALUES
(31, 'text', 0, 1, 'text'),
(32, 'number', 1, 1, 'number'),
(33, 'dropdown', 2, 1, 'dropdown'),
(34, 'checkbox', 3, 1, 'checkbox'),
(35, 'radio', 0, 1, 'radio'),
(36, 'what', 0, 2, 'text'),
(37, 'how many', 1, 2, 'number'),
(38, 'how many', 0, 1, 'number'),
(39, 'check of them', 1, 1, 'checkbox'),
(40, 'chose one', 2, 1, 'radio'),
(41, 'check of them', 0, 3, 'checkbox'),
(42, 'chose one', 1, 3, 'radio'),
(43, 'chose of them', 0, 9, 'checkbox'),
(44, 'chose one of them', 1, 9, 'radio'),
(45, 'text input question', 2, 9, 'text'),
(46, 'which of thoes', 0, 1, 'dropdown'),
(47, 'chose of them', 1, 1, 'checkbox');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `cname` varchar(255) DEFAULT NULL,
  `cphone` varchar(255) DEFAULT NULL,
  `cemail` varchar(255) DEFAULT NULL,
  `caddress` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ptitle` varchar(255) DEFAULT NULL,
  `pemail` varchar(255) DEFAULT NULL,
  `cr` varchar(255) DEFAULT NULL,
  `gosi` varchar(255) DEFAULT NULL,
  `ticket_name` varchar(250) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`cname`, `cphone`, `cemail`, `caddress`, `pname`, `ptitle`, `pemail`, `cr`, `gosi`, `ticket_name`, `id`, `created_at`, `updated_at`) VALUES
('my company', '+201119583047', 'e@gmail.com', 'cairo', 'sales', 'sales', NULL, '1677609157.pdf', '1677609158.pdf', 'sales_member_presales_member_1', 9, '2023-02-28 20:32:38', '2023-02-28 20:32:38'),
('elnaser', '+201119583047', 'c@gmail.com', 'cairo', 'sales', 'sales', NULL, '1677615463.pdf', '1677615463.pdf', 'sales_member_presales_mdm_1', 10, '2023-02-28 22:17:43', '2023-02-28 22:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `request_answers`
--

CREATE TABLE `request_answers` (
  `id` int(11) NOT NULL,
  `ticket_name` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_answers`
--

INSERT INTO `request_answers` (`id`, `ticket_name`, `question`, `answer`) VALUES
(6, 'sales_member_presales_member_1', 'text', 'text one'),
(7, 'sales_member_presales_member_1', 'number', '3'),
(8, 'sales_member_presales_member_1', 'dropdown', 'o2'),
(9, 'sales_member_presales_member_1', 'checkbox', 'c2'),
(10, 'sales_member_presales_member_1', 'radio', 'o2'),
(11, 'sales_member_presales_member_1', 'how many', '4'),
(12, 'sales_member_presales_member_1', 'check of them', 'ch2&&ch3'),
(13, 'sales_member_presales_member_1', 'chose one', 'e3'),
(14, 'sales_member_presales_member_1', 'which of thoes', 'option2'),
(15, 'sales_member_presales_member_1', 'chose of them', 'option1&&op2'),
(16, 'sales_member_presales_mdm_1', 'what', 'text one'),
(17, 'sales_member_presales_mdm_1', 'how many', '3');

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE `solutions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solutions`
--

INSERT INTO `solutions` (`id`, `name`) VALUES
(1, 'MDAWM'),
(2, 'MDM'),
(3, 'HALA CALL'),
(4, 'PIP Trunk-Go'),
(5, 'SMART-VPN'),
(6, 'DIA-Zain'),
(7, 'DIA-Mobily'),
(8, 'DIA-Go'),
(9, 'DIA-Global IT');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `ticket_name` varchar(255) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `presales_id` int(11) NOT NULL,
  `ticket_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_name`, `sales_id`, `presales_id`, `ticket_status`) VALUES
(6, 'sales_member_presales_member_1', 10, 11, '2'),
(7, 'sales_member_presales_mdm_1', 10, 13, '-1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `solution_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `solution_id`) VALUES
(1, 'admin', 'rfpadmin@gmail.com', 'admin', NULL, '$2y$10$pWfTSJMlkrc6H7DI1RArvO8V7meYr2sXsTGgOB3Goq95R5VHLznlW', '', '2023-02-25 14:05:27', '2023-03-01 12:28:41', NULL),
(10, 'sales_member', 'sales_member@gmail.com', 'team_sales_member', NULL, '$2y$10$WMumPvfiHWsmmlMgftzwoefXnoNgeas.KGcxxNiTBbraeytmbqFaW', NULL, '2023-02-28 18:24:17', '2023-02-28 18:24:17', NULL),
(11, 'presales_member', 'presales_member@gmail.com', 'presales', NULL, '$2y$10$NB.vACE3PelUB.d0N33OiO.B9T1FqgPctIGBqZZEPct/3YLa4SY1e', NULL, '2023-02-28 18:25:22', '2023-02-28 18:25:22', 1),
(12, 'hossam', 'hs1876@fayoum.edu.eg', 'team_sales_member', NULL, '$2y$10$cdc20tM4GhfKT2fWYu1ML.AcVySscf1vHKgYxFw..ZdHOEDMLOh0W', 'K2XVs2RsR1J0JZ4RrcW6IH7Mvg8bNtCFzedfs8VGtIeAJdzWewh1r5JHK7gx', '2023-02-28 19:07:08', '2023-03-04 12:07:46', NULL),
(13, 'presales_mdm', 'mdm@gmail.com', 'presales', NULL, '$2y$10$Q/7SVe.C.arPNNfyJuGnsOuEfceJr2bfXT8bmtDqSee0esJm4A8P2', NULL, '2023-02-28 20:12:57', '2023-02-28 20:12:57', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_fk` (`question_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_answers`
--
ALTER TABLE `request_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solutions`
--
ALTER TABLE `solutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `pr_cat_id` (`solution_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `request_answers`
--
ALTER TABLE `request_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `solutions`
--
ALTER TABLE `solutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_fk` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `pr_cat_id` FOREIGN KEY (`solution_id`) REFERENCES `solutions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
