-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 05:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hm`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `name`, `email`, `phone`, `address`, `product_title`, `price`, `quantity`, `image`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 'Tran Tan Tai', 'taitt.21it@vku.udn.vn', '0389093655', 'Quang Nam', 'Dog KeyChain', '0', '10', '1667118703.jpg', NULL, '2', '2022-11-17 06:56:52', '2022-11-17 06:56:52'),
(49, 'Tran Tai', 'trantantai310803@gmail.com', '0327529889', 'Da Nang', 'Amigurumi pattern monkey', '10', '2', '1669472992.avif', '23', '1', '2022-11-30 09:10:02', '2022-11-30 09:10:03'),
(50, 'Tran Tai', 'trantantai310803@gmail.com', '0327529889', 'Da Nang', 'Handmade Wooden Yarn Bowl', '50', '2', '1669472568.avif', '21', '1', '2022-11-30 09:16:49', '2022-11-30 09:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(8, 'KeyChain', '2022-10-30 00:56:14', '2022-10-30 00:56:14'),
(11, 'Home & Hobby', '2022-11-26 07:18:34', '2022-11-26 07:18:34'),
(12, 'Jewelry & Beauty', '2022-11-26 07:18:41', '2022-11-26 07:18:41'),
(13, 'Sewing & Fiber', '2022-11-26 07:18:47', '2022-11-26 07:18:47'),
(14, 'Papercraft', '2022-11-26 07:19:18', '2022-11-26 07:19:18'),
(15, 'Visual Arts', '2022-11-26 07:19:24', '2022-11-26 07:19:24'),
(16, 'Sculpting & Forming', '2022-11-26 07:19:29', '2022-11-26 07:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Tran Tai', 'sdf', '1', '2022-11-28 07:40:16', '2022-11-28 07:40:16'),
(2, 'Tran Tai', 'sdf\r\n            sdf', '1', '2022-11-28 21:19:10', '2022-11-28 21:19:10'),
(3, 'Tran Tai', 'd', '1', '2022-11-29 01:04:46', '2022-11-29 01:04:46'),
(4, 'Tran Tan Tai', 'tran', '2', '2022-11-29 03:20:53', '2022-11-29 03:20:53'),
(5, 'Tran Tan Tai', 'ta', '2', '2022-11-29 03:46:35', '2022-11-29 03:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_10_24_140012_create_sessions_table', 1),
(7, '2022_10_24_163109_update_user', 2),
(8, '2022_10_25_175755_create_categories_table', 3),
(9, '2022_10_29_073243_create_products_table', 4),
(10, '2022_11_13_121138_create_carts_table', 5),
(11, '2022_11_18_071616_create_orders_table', 6),
(12, '2022_11_23_112342_create_notifications_table', 7),
(13, '2022_11_28_132727_create_comments_table', 8),
(14, '2022_11_28_132753_create_replies_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `delivery_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `user_id`, `product_title`, `quantity`, `price`, `image`, `product_id`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(13, 'Tran Tai', 'trantantai310803@gmail.com', '0327529889', 'Da Nang', '1', 'Handmade Wooden Yarn Bowl', '1', '25', '1669472568.avif', '21', 'Cash On Delivery', 'Processing', '2022-11-28 05:32:53', '2022-11-28 05:32:53'),
(14, 'Tran Tai', 'trantantai310803@gmail.com', '0327529889', 'Da Nang', '1', 'High Quality Grade A Natural Garnet Semi', '1', '15', '1669473322.webp', '26', 'Cash On Delivery', 'Processing', '2022-11-28 05:32:53', '2022-11-28 05:32:53'),
(15, 'Tran Tai', 'trantantai310803@gmail.com', '0327529889', 'Da Nang', '1', 'High Quality Grade A Natural Garnet Semi', '1', '15', '1669473322.webp', '26', 'Paid', 'Processing', '2022-11-28 05:44:09', '2022-11-28 05:44:09'),
(16, 'Tran Tai', 'trantantai310803@gmail.com', '0327529889', 'Da Nang', '1', '100 Wood Beads', '1', '14', '1669473208.webp', '25', 'Paid', 'Processing', '2022-11-28 05:44:09', '2022-11-28 05:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `category`, `quantity`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(21, 'Handmade Wooden Yarn Bowl', 'This knitted crochet thread storage box to prevent thread hooking and entanglement, the most perfect yarn container. Prevents damage of yarn by pets when you make knitting projects.', '1669472568.avif', 'Home & Hobby', '120', '25', NULL, '2022-11-26 07:22:48', '2022-11-26 07:22:48'),
(23, 'Amigurumi pattern monkey', 'What do you need to make a monkey? - Size C (2,5 mm / 2,75 mm) crochet hook - Tapestry needle - Stitch marker - Fiberfill - Three different colours of yarn - Dark brown or black safety eyes (8mm)', '1669472992.avif', 'Home & Hobby', '12', '5', NULL, '2022-11-26 07:29:52', '2022-11-26 07:29:52'),
(24, 'Natural Blue Diamond Beads', 'Type : Gemstone : Strand  Gemstone Type : Blue Diamond  Stone Size : 3 to 5 MM', '1669473111.webp', 'Jewelry & Beauty', '7', '100', '90', '2022-11-26 07:31:51', '2022-11-26 07:31:51'),
(25, '100 Wood Beads', 'We give a part of our profits to the nonprofit organization \"Niños de Papel\" that works to provide hope and a bright future to Latin American children', '1669473208.webp', 'Jewelry & Beauty', '23', '15', '14', '2022-11-26 07:33:28', '2022-11-26 07:33:28'),
(26, 'High Quality Grade A Natural Garnet Semi', '5 sizes available: approx 4mm (92 - 98 beads), approx 6mm (60 - 66 beads), approx 8mm (45 - 49 beads), approx 10mm (36 - 40 beads), 12mm (32 - 34 beads) please choose your preferred size from the drop-down list under the item title', '1669473322.webp', 'Jewelry & Beauty', '4', '15', NULL, '2022-11-26 07:35:22', '2022-11-26 07:35:22'),
(27, 'Santa SVG, Santa Face SVG,', 'Perfect for personalized gifts. Endless possible print on projects from tumblers, cards, t-shirts, face mask, sweatshirts, coffee mugs, caps and many more.', '1669473423.webp', 'Papercraft', '23', '2', NULL, '2022-11-26 07:37:03', '2022-11-26 07:37:03'),
(28, 'trs', 'sdf', '1669553807.png', 'Sewing & Fiber', '1', '1', '90', '2022-11-27 05:56:47', '2022-11-27 05:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment_id` varchar(255) NOT NULL,
  `reply` longtext NOT NULL,
  `used_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `name`, `comment_id`, `reply`, `used_id`, `created_at`, `updated_at`) VALUES
(1, 'Tran Tan Tai', '1', 'fs', '2', '2022-11-29 03:18:54', '2022-11-29 03:18:54'),
(2, 'Tran Tan Tai', '1', 'tran', '2', '2022-11-29 03:21:29', '2022-11-29 03:21:29'),
(3, 'Tran Tan Tai', '5', 'tai', '2', '2022-11-29 03:46:43', '2022-11-29 03:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dSGvsnxrnPd9aEnIJOZ6cTkY6RMAEQe8iJHzD1J2', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWG5hb3Y5aDhicERkbnFmeWFuZ09CYk1tbUx0Yk03dGxiY2dTSHNpNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmRlciI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1669969909),
('j0EnhzX5b9MRE3z6nBNrqPExx8paoImVgPOBU6f8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0NDMU5VNU1iZjZWZkhUZ2tPNGlBbHpHSjdGbkYxSkI4bVI5SGlKTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1684073125),
('s8M8cwteQbEpSZQLv9ZyEXxsBtwQrfFFp77jAWJO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 Edg/107.0.1418.62', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWlJvOGdGRmZIN29DNHpFMVE5eXdFbWNnZ2Rla1p3ZTJPaWttWTJQUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1670135727);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `address`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Tran Tai', 'trantantai310803@gmail.com', '0', 'Da Nang', '0327529889', '2022-11-21 01:57:17', '$2y$10$JyNeTewz.lMsZ20io4BC5OiRIa19MhEgBIDtAVn0WsKYe2IwhaPSG', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-24 07:33:28', '2022-11-21 01:57:17'),
(2, 'Tran Tan Tai', 'taitt.21it@vku.udn.vn', '1', 'Quang Nam', '0389093655', '2022-11-21 11:23:40', '$2y$10$K9zu.uKpUyAz0/pYOSbu4.Qo9k4m3BbB/fWdulDKVXbK6CIvz0Rai', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-24 10:50:48', '2022-11-21 11:23:40'),
(3, 'Tai', 'tantai310803@gmail.com', '0', 'Tam Ki, Quang Nam', '032765876', '2022-11-21 01:53:03', '$2y$10$oQZR7BcsV/DFS./rl7OaZOsugtcURQkLMzBcfaFJd6Tbko1EX.P0.', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 01:52:37', '2022-11-21 01:53:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
