-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2024 at 10:58 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanagementdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `person_id` int NOT NULL,
  `position_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `person_id`, `position_id`, `created_at`, `updated_at`) VALUES
(9, 12, NULL, '2024-01-04 10:03:46', '2024-01-04 10:03:46'),
(8, 11, NULL, '2024-01-04 10:03:22', '2024-01-04 10:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(6, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(7, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(8, '2016_06_01_000004_create_oauth_clients_table', 2),
(9, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(10, '2024_01_03_061208_create_people_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('96e8682beb0d9f5cc0b29e5f1cd350aece1b37e40f3895d4477719dd68b70a34ac2ac47c33e9376c', 7, 1, 'MyApp2', '[]', 0, '2024-01-04 01:37:06', '2024-01-04 01:37:06', '2025-01-04 09:37:06'),
('32a6fce9dce23d0d59880562bb07fa634ab46f6ca3df0e47f79206bc7a9d8d5d2349c8699d1cab6b', 7, 1, 'MyApp2', '[]', 0, '2024-01-04 01:49:36', '2024-01-04 01:49:36', '2025-01-04 09:49:36'),
('96286962aa630d4e9bcaf60d9bb124241a197cc84b611ef184e5160d2572eb8d3947fa801fb33733', 7, 1, 'MyApp2', '[]', 0, '2024-01-04 01:57:57', '2024-01-04 01:57:57', '2025-01-04 09:57:57'),
('c6373d0cac4598ac1993ded6434e7d473350a713e9bcc8024127cb11a9e3c7f74e7ef53a016ca023', 9, 1, 'MyApp', '[]', 0, '2024-01-04 02:03:23', '2024-01-04 02:03:23', '2025-01-04 10:03:23'),
('970cc5a1494795c248b12ecb4754190385317b75c7acdb184654796dca1a24c057e3323bec6f9579', 10, 1, 'MyApp', '[]', 0, '2024-01-04 02:03:47', '2024-01-04 02:03:47', '2025-01-04 10:03:47'),
('1792d87ce05f85fbe8ee45b074c44b7fa342d5b2a610dfb64ec086de54fbd22dedc644923c65a5b8', 9, 1, 'MyApp2', '[]', 0, '2024-01-04 02:12:58', '2024-01-04 02:12:58', '2025-01-04 10:12:58'),
('6100fb4e4e460ef6c14ed9d7f0996efaf124d4f760a54c25f1304fd827610e100288907f6295ae5c', 10, 1, 'MyApp2', '[]', 0, '2024-01-04 02:13:40', '2024-01-04 02:13:40', '2025-01-04 10:13:40'),
('4b5136257e0a0c23239ee8b483d7fb477b76c2479adc5bf3bbcc003fc8e93fc3d5910704cc6209a1', 9, 1, 'MyApp2', '[]', 0, '2024-01-04 02:13:50', '2024-01-04 02:13:50', '2025-01-04 10:13:50'),
('1063c351f4c64de052dfd82a7eab5aa80d8c7dcacd9ac239d0cdaf520ddff06520bc071cc4d1f22c', 9, 1, 'MyApp2', '[]', 0, '2024-01-04 02:49:45', '2024-01-04 02:49:45', '2025-01-04 10:49:45'),
('90e29ac49ef656ac2660d94542361a33d8be5085d1a877e0eba352a1a6db62a95932b344c60fd221', 10, 1, 'MyApp2', '[]', 0, '2024-01-04 02:49:52', '2024-01-04 02:49:52', '2025-01-04 10:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'Wqql2m67C9RP71gF4ceZNWu2Mfkz2Kji8rhZEZin', NULL, 'http://localhost', 1, 0, 0, '2024-01-04 01:33:18', '2024-01-04 01:33:18'),
(2, NULL, 'Laravel Password Grant Client', '8sBgHHvkC05qljacMHGVHx9a4PPDMGAjrQQfAZ3D', 'users', 'http://localhost', 0, 1, 0, '2024-01-04 01:33:18', '2024-01-04 01:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-01-04 01:33:18', '2024-01-04 01:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'MyApp', 'd609024d4b8fd2687b252f1011580ae6aab357c424a362f61a1a324068235276', '[\"*\"]', NULL, NULL, '2024-01-02 22:29:36', '2024-01-02 22:29:36'),
(2, 'App\\Models\\User', 1, 'MyApp', '2b117efe6b5c96df01a9c455e542ad322747f3d2f3933ec502eb63bcff66be72', '[\"*\"]', NULL, NULL, '2024-01-03 17:32:34', '2024-01-03 17:32:34'),
(3, 'App\\Models\\User', 1, 'MyApp', '88ba7e2d38ce560fdc698504f1c60c039be1b1ee72f3007d2f9473fed1c6cd22', '[\"*\"]', NULL, NULL, '2024-01-03 22:44:01', '2024-01-03 22:44:01'),
(4, 'App\\Models\\User', 5, 'MyApp', 'ee6cbca9ca180081ca7a38ca7ae275b550ea70e10f95392ecd4ae96c070f7b23', '[\"*\"]', NULL, NULL, '2024-01-04 00:11:50', '2024-01-04 00:11:50'),
(5, 'App\\Models\\User', 6, 'MyApp', '7aa6b479d737b2cb8e7de2764eef5db201800c04f2283a587b9dc79e5b391412', '[\"*\"]', NULL, NULL, '2024-01-04 00:17:57', '2024-01-04 00:17:57'),
(6, 'App\\Models\\User', 7, 'MyApp', '1409ed9a9e34538ebf9a5c8c1f74c1d3825e73bd1af1cf47a16a124cffdf5570', '[\"*\"]', NULL, NULL, '2024-01-04 00:47:57', '2024-01-04 00:47:57'),
(7, 'App\\Models\\User', 8, 'MyApp', 'cd4c68746a12b0e08bb1e5d02ecc48aac3ed3af8d94f8af5034281bcd8cf11c1', '[\"*\"]', NULL, NULL, '2024-01-04 00:48:17', '2024-01-04 00:48:17'),
(8, 'App\\Models\\User', 7, 'MyApp2', '879d35e6310d6195608df2f73cb6f8366203e799566ca0c618ac3376c66b496f', '[\"*\"]', NULL, NULL, '2024-01-04 01:24:05', '2024-01-04 01:24:05'),
(9, 'App\\Models\\User', 7, 'MyApp2', 'f24032d4cc186388acce6d75b2fe77ac964d103843ae1a003fc60b85278bec2e', '[\"*\"]', NULL, NULL, '2024-01-04 01:27:46', '2024-01-04 01:27:46'),
(10, 'App\\Models\\User', 7, 'MyApp2', 'a6c2615a4f37d794474ff64f47fa2cf430e4724c761c654926e510b2f20f09a5', '[\"*\"]', NULL, NULL, '2024-01-04 01:28:19', '2024-01-04 01:28:19'),
(11, 'App\\Models\\User', 7, 'MyApp2', 'f609c67b12e94fd4355a498ae6e1802741440b4779c2b33d0076c0f9b7076835', '[\"*\"]', NULL, NULL, '2024-01-04 01:29:28', '2024-01-04 01:29:28'),
(12, 'App\\Models\\User', 7, 'MyApp2', '6d7968d5f85d4169205473f4bb4f490bf575a589d348e4f6d28d2b5eeeb3bb9f', '[\"*\"]', NULL, NULL, '2024-01-04 01:29:45', '2024-01-04 01:29:45'),
(13, 'App\\Models\\User', 7, 'MyApp2', 'a53418c9dc24e18725df1c9fcb990f27275e1f007bf9f6c226b789260995dbd6', '[\"*\"]', NULL, NULL, '2024-01-04 01:35:20', '2024-01-04 01:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE IF NOT EXISTS `persons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `lastname`, `firstname`, `created_at`, `updated_at`) VALUES
(12, 'Sarael', 'NECA ROSE', '2024-01-04 10:03:46', '2024-01-04 10:03:46'),
(11, 'Aballe', 'Jason', '2024-01-04 10:03:22', '2024-01-04 10:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `position_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_name`, `created_at`, `updated_at`) VALUES
(1, 'Manager', '2023-12-28 18:37:45', NULL),
(2, 'Web Developer', '2023-12-28 18:37:45', NULL),
(3, 'Web Designer', '2023-12-28 18:37:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `task_name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `assign_to` int NOT NULL,
  `created_by` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `description`, `assign_to`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(5, 'test task', 'dsfasdfsadfasdaf', 8, 9, 3, '2024-01-04 10:03:55', '2024-01-04 10:49:27'),
(3, 'fdsf iii', 'hghfgd', 7, 7, 1, '2024-01-04 09:55:29', '2024-01-04 09:55:29'),
(4, 'fdffsdaa', 'fdsafas', 6, 7, 1, '2024-01-04 09:57:48', '2024-01-04 09:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `task_statuses`
--

DROP TABLE IF EXISTS `task_statuses`;
CREATE TABLE IF NOT EXISTS `task_statuses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `task_statuses`
--

INSERT INTO `task_statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2024-01-04 14:43:03', NULL),
(2, 'On-Going', '2024-01-04 14:43:03', NULL),
(3, 'Finished', '2024-01-04 14:43:03', NULL),
(4, 'Unfinished', '2024-01-04 14:43:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `person_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `person_id`, `employee_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 12, 9, 'necarose02@gmail.com', NULL, '$2y$12$147dqMgDrxiaun8g.XWqsOD5xE2EfM1/OMHkRou7rfQ68eMd4OuyC', NULL, '2024-01-04 02:03:46', '2024-01-04 02:03:46'),
(9, 11, 8, 'jasonaballe0@gmail.com', NULL, '$2y$12$9.euU95DT8ca0mHpiMMXuuflgZf3Atc4K3.h5IdKXEjDpJBLe5o4e', NULL, '2024-01-04 02:03:23', '2024-01-04 02:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Manager', '2023-12-28 12:13:32', NULL, 1),
(2, 'Web Developer', '2023-12-28 12:13:32', NULL, 1),
(3, 'Web Designer', '2023-12-28 12:13:39', NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
