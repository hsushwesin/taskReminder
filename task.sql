-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 08:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

CREATE TABLE `assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigns`
--

INSERT INTO `assigns` (`id`, `person`, `id_number`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Assign 1', '1', 'manager', '2020-10-22 22:20:21', '2020-10-22 22:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `assigntos`
--

CREATE TABLE `assigntos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigntos`
--

INSERT INTO `assigntos` (`id`, `to`, `id_number`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Assign to1', '1', 'manager', '2020-10-22 22:20:40', '2020-10-22 22:20:40');

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
(50, '2014_10_12_000000_create_users_table', 1),
(51, '2014_10_12_100000_create_password_resets_table', 1),
(52, '2019_08_19_000000_create_failed_jobs_table', 1),
(53, '2020_10_11_104431_create_tasks_table', 1),
(54, '2020_10_13_141247_create_assigntos_table', 1),
(55, '2020_10_13_141341_create_projects_table', 1),
(56, '2020_10_14_025300_create_assigns_table', 1);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `created_at`, `updated_at`) VALUES
(1, 'pro1', '2020-10-22 22:20:48', '2020-10-22 22:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `input_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_task` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekend` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `others` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearly` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_person` bigint(20) UNSIGNED NOT NULL,
  `assigned_to` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completedate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `input_date`, `project`, `task_name`, `task_detail`, `type_task`, `workday`, `weekend`, `monthly`, `others`, `yearly`, `start_date`, `end_date`, `assigned_person`, `assigned_to`, `message`, `remark`, `progress`, `status`, `completedate`, `created_at`, `updated_at`) VALUES
(3, '2020-10-23', 1, 'task3', '2020-10-30', 'Daily', 'Daily', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 1, 1, 'remark', 'remark', '100', 'complete', '2020-10-23 15:45:31', '2020-10-22 22:25:12', '2020-10-23 09:15:31'),
(4, '2020-10-23', 1, 'task4', 'detail3', 'Others', 'Na', 'Na', 'Na', 'Others', 'Na', '2020-10-23', '2020-10-27', 1, 1, 'remark', 'remarks state', '100', 'complete', '2020-10-23 13:39:25', '2020-10-22 22:25:39', '2020-10-23 07:09:25'),
(5, '2020-10-23', 1, 'task5', 'detail', 'Yearly', 'Na', 'Na', 'Na', 'Na', 'Yearly', '2020-10-22', '2020-11-08', 1, 1, 'remark', 'remark', '100', 'complete', '2020-10-23 13:39:32', '2020-10-22 22:26:04', '2020-10-23 07:09:32'),
(6, '2020-12-14', 1, 'gdg', 'dgdgdgdg', 'Daily', 'Daily', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 1, 1, 'Na', 'Na', 'Na', 'Na', 'Na', '2020-12-14 00:59:10', '2020-12-14 00:59:10'),
(7, '2020-12-14', 1, 'yiyo', 'a', 'Daily', 'Daily', 'Na', 'Na', 'Na', 'Na', 'Na', 'Na', 1, 1, 'tjgjtgj', 'tjgjtgj', 'Na', 'Na', 'Na', '2020-12-14 01:02:27', '2020-12-14 01:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigns`
--
ALTER TABLE `assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigntos`
--
ALTER TABLE `assigntos`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigns`
--
ALTER TABLE `assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigntos`
--
ALTER TABLE `assigntos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
