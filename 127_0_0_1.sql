-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 10:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce`
--
CREATE DATABASE IF NOT EXISTS `commerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `commerce`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'Electronics', '2022-06-06 03:52:14', '2022-06-06 03:52:14'),
(8, 'Shoes', '2022-06-06 04:50:09', '2022-06-06 04:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Adiss Abeba'),
(2, 'Adama');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `name`) VALUES
(1, 'New'),
(2, 'Used');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_02_072621_add_google_id_column', 2),
(6, '2022_06_02_110803_product_table', 2),
(7, '2022_06_02_111506_product_category_table', 2),
(8, '2022_06_02_120104_adding_phone_role_column_for_user', 2),
(9, '2022_06_03_053006_adding_additional_attributes', 3),
(10, '2022_06_03_053752_product_typ', 3),
(11, '2022_06_03_063927_adding_address_for_user', 4),
(12, '2022_06_03_114821_create_pending_user_emails_table', 5),
(13, '2022_06_04_063622_create_pending_user_emails_table', 6),
(14, '2022_06_06_055529_categories', 7),
(15, '2022_06_06_060137_categories_table', 8),
(16, '2022_06_06_082038_product_typs', 9),
(17, '2022_06_06_105001_product_typs', 10),
(18, '2022_06_13_063702_condition_table', 11),
(19, '2022_06_13_070541_conditions_table', 12),
(20, '2022_06_13_070804_conditions_table', 13),
(21, '2022_06_13_100536_products_table', 14),
(22, '2022_06_13_101635_products_table', 15),
(23, '2022_06_14_072044_products_table', 16),
(24, '2022_06_30_055212_create_city_table', 17),
(25, '2022_06_30_055924_create_cities_table', 18),
(26, '2022_06_30_060828_adding_city_colomun_for_user', 19),
(27, '2022_07_05_061554_adding_address_colomon_for_products_table', 20),
(28, '2022_07_08_065410_create_jobs_table', 21);

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
('yourweb200@gmail.com', '$2y$10$fj8b60SJW38UWA8R5QUSSeBV5ooiQKsmdvWphddMM2W5izMSjkIcm', '2022-07-12 02:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `pending_user_emails`
--

CREATE TABLE `pending_user_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` double(8,2) DEFAULT NULL,
  `image_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','suspend','soon') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `view` bigint(20) DEFAULT 0,
  `rate` double(8,2) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `model`, `price`, `condition`, `category`, `type`, `description`, `discount_price`, `image_1`, `image_2`, `image_3`, `status`, `view`, `rate`, `user_id`, `created_at`, `updated_at`, `city`) VALUES
(2, 'hp', 'hp 840 3', 25000.00, 'New', 'Electronics', 'Tablet', NULL, NULL, '1-1655191648-hp.jpg', '2-1655191648-hp.jpg', '3-1655191648-hp.jpg', 'active', 1, NULL, 13, '2022-06-14 04:27:28', '2022-07-26 03:00:36', 'Adiss Abeba'),
(3, 'hp 2', 'hp 840 2', 25000.00, 'Used', 'Electronics', 'Laptop', NULL, NULL, '1-1655191760-hp 2.jpg', '2-1655191760-hp 2.jpg', '3-1655191760-hp 2.jpg', 'active', 18, NULL, 13, '2022-06-14 04:29:20', '2022-06-14 04:29:20', 'Adama'),
(4, 'hp 3', 'hp 840 3', 25000.00, 'Used', 'Electronics', 'Laptop', NULL, NULL, '1-1655191831-hp 3.jpg', '2-1655191831-hp 3.jpg', '3-1655191831-hp 3.jpg', 'active', 27, NULL, 16, '2022-06-10 04:30:31', '2022-06-14 04:30:31', 'Adiss Abeba'),
(7, 'hp 10', 'hp 840 10', 25000.00, 'Used', 'Electronics', 'Laptop', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', NULL, '1-1655728853-hp 10.jpg', '2-1655728853-hp 10.jpg', '3-1655728853-hp 10.jpg', 'active', 5, NULL, 13, '2022-06-20 09:40:53', '2022-06-20 09:40:53', 'Adiss Abeba'),
(8, 'hp 12', 'hp 840 12', 15000.00, 'Used', 'Electronics', 'Laptop', NULL, NULL, '1-1655813979-hp 12.jpg', '2-1655813979-hp 12.jpg', '3-1655813979-hp 12.jpg', 'active', 1, NULL, 13, '2022-06-21 09:19:39', '2022-06-21 09:19:39', 'Adiss Abeba'),
(9, 'tablet 1', 'tab 1', 20000.00, 'New', 'Electronics', 'Tablet', NULL, NULL, '1-1655814018-tablet 1.jpg', '2-1655814018-tablet 1.jpg', '3-1655814018-tablet 1.jpg', 'active', 4, NULL, 13, '2022-06-21 09:20:18', '2022-06-21 09:20:18', 'Adiss Abeba'),
(10, 'Tablet 3', 'tab 2', 10000.00, 'Used', 'Electronics', 'Tablet', NULL, NULL, '1-1655814054-Tablet 3.jpg', '2-1655814054-Tablet 3.jpg', '3-1655814054-Tablet 3.jpg', 'active', 0, NULL, 13, '2022-06-21 09:20:54', '2022-06-21 09:20:54', 'Adiss Abeba'),
(11, 'hp 13', 'hp 840 13', 20000.00, 'Used', 'Electronics', 'Laptop', NULL, NULL, '1-1655814092-hp 13.jpg', '2-1655814092-hp 13.jpg', '3-1655814092-hp 13.jpg', 'active', 1, NULL, 13, '2022-06-21 09:21:32', '2022-06-21 09:21:32', 'Adiss Abeba'),
(15, 'dell 2', 'dell latituse', 25000.00, 'New', 'Electronics', 'Laptop', NULL, NULL, '1-1656412487-dell2.jpg', '2-1656412488-dell2.jpg', '3-1656412488-dell2.jpg', 'active', 3, NULL, 13, '2022-06-28 07:34:49', '2022-06-28 07:34:49', 'Adiss Abeba'),
(16, 'dell 3', 'latituse', 25000.00, 'Used', 'Electronics', 'Laptop', NULL, NULL, '1-1656412549-dell3.jpg', '2-1656412549-dell3.jpg', '3-1656412549-dell3.jpg', 'active', 4, NULL, 13, '2022-06-28 07:35:49', '2022-06-28 07:35:49', 'Adiss Abeba'),
(23, 'hp', 'hp latituse', 25000.00, 'Used', 'Electronics', 'Tablet', NULL, NULL, '1-1658903139-view.jpg', '2-1658903140-view.jpg', '3-1658903140-view.jpg', 'active', 7, NULL, 13, '2022-07-27 03:25:40', '2022-07-27 03:25:40', 'Adiss Abeba ');

-- --------------------------------------------------------

--
-- Table structure for table `product_typs`
--

CREATE TABLE `product_typs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_typs`
--

INSERT INTO `product_typs` (`id`, `name`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Tablet', 'Electronics', '2022-06-06 07:54:27', '2022-06-06 07:54:27'),
(3, 'Jordan', 'Shoes', '2022-06-06 07:55:49', '2022-06-06 07:55:49'),
(4, 'Laptop', 'Electronics', '2022-06-14 04:04:36', '2022-06-14 04:04:36');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `phone_1`, `phone_2`, `role`, `address`, `city`) VALUES
(13, 'Abi', 'yourweb200@gmail.com', '2022-06-04 05:01:26', '$2y$10$rQ.BWW1rN5Hsu13oXzoCU.PA9.RwThTAqYk191d9XCMyBvrvBjp8u', NULL, '2022-06-04 05:00:06', '2022-06-30 03:21:53', NULL, '1234567890', NULL, 'admin', 'Lideta2', 'Adiss Abeba '),
(16, 'yared', 'mekonnenabi@gmail.com', '2022-07-15 02:41:13', '$2y$10$p0yO5u75s/9Yb5w92pga8OE3sywcGxyPrb4COj3aVs7Y0aRLCyM0y', 'AsjqCm9zgMXpZu0On8Lj2tTznwIif2L0KVVpiy2GEmK0FPw3P3DZnz61oS9m', '2022-07-15 02:40:45', '2022-07-25 08:59:15', NULL, '0912123456', NULL, 'user', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indexes for table `pending_user_emails`
--
ALTER TABLE `pending_user_emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pending_user_emails_user_type_user_id_index` (`user_type`,`user_id`),
  ADD KEY `pending_user_emails_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_typs`
--
ALTER TABLE `product_typs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_typs_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pending_user_emails`
--
ALTER TABLE `pending_user_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_typs`
--
ALTER TABLE `product_typs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
