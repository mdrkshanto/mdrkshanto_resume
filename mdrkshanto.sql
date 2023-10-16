-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 02:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mdrkshanto`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `page_title` text NOT NULL,
  `object` longtext DEFAULT NULL,
  `object_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `page_title`, `object`, `object_status`, `created_at`, `updated_at`) VALUES
(1, 'about_content', 'About Me', 'Diam rebum sea stet rebum ea. Et kasd amet et accusam elitr voluptua. Tempor dolore sit et accusam ipsum erat duo. Gubergren et takimata dolor duo amet et sanctus elitr lorem. Ipsum amet duo rebum dolor labore. No diam duo lorem elitr dolor takimata elitr no. Magna et gubergren duo ipsum sed, amet ea voluptua dolores voluptua dolor ipsum et. Sit takimata erat consetetur invidunt lorem consetetur. Lorem magna diam vero nonumy. Aliquyam diam voluptua magna et magna nonumy. Accusam rebum clita et sit vero lorem, voluptua amet sit eos no et labore vero, et consetetur justo et et sit aliquyam labore, sit erat lorem justo dolores kasd est sit. Dolor et accusam ea et dolor sit.', 1, '2023-10-12 09:27:44', '2023-10-13 00:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `about_components`
--

CREATE TABLE `about_components` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_id` tinyint(4) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `field_value` varchar(255) NOT NULL,
  `field_type` tinyint(1) NOT NULL DEFAULT 0,
  `field_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_components`
--

INSERT INTO `about_components` (`id`, `about_id`, `field_name`, `field_value`, `field_type`, `field_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Birthday', '1990-03-09', 1, 1, '2023-10-12 09:29:14', '2023-10-12 09:29:14'),
(3, 1, 'Phone', '+8801978167206', 0, 1, '2023-10-12 09:33:37', '2023-10-12 09:33:37'),
(4, 1, 'Email', 'bdshantosignup@outlook.com', 0, 1, '2023-10-12 09:34:14', '2023-10-12 09:34:14'),
(5, 1, 'Address', 'North Badda, Dhaka - 1212, Bangladesh', 0, 1, '2023-10-12 09:34:48', '2023-10-12 09:34:48'),
(6, 1, 'Freelance', 'Available', 0, 1, '2023-10-12 09:35:17', '2023-10-12 09:35:17'),
(7, 1, 'Local Market', 'Available', 0, 1, '2023-10-12 09:35:37', '2023-10-12 09:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `admin_homes`
--

CREATE TABLE `admin_homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` text NOT NULL,
  `image` text DEFAULT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_homes`
--

INSERT INTO `admin_homes` (`id`, `unique_id`, `image`, `name`, `created_at`, `updated_at`) VALUES
(1, 'only-me', 'images/home/1779563759265617.webp', 'Md. Rezaul Karim Shanto', '2023-10-12 09:24:11', '2023-10-12 09:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `admin_home_subtitles`
--

CREATE TABLE `admin_home_subtitles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_home_id` int(11) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_home_subtitles`
--

INSERT INTO `admin_home_subtitles` (`id`, `admin_home_id`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 1, 'Frontend Developer', '2023-10-12 09:24:44', '2023-10-12 09:24:44'),
(2, 1, 'Backend Developer', '2023-10-12 09:24:53', '2023-10-12 09:24:53'),
(3, 1, 'Full Stack Developer', '2023-10-12 09:25:04', '2023-10-12 09:25:04');

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
-- Table structure for table `home_buttons`
--

CREATE TABLE `home_buttons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `link` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_buttons`
--

INSERT INTO `home_buttons` (`id`, `name`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'contact', '#contact', 0, '2023-10-12 09:26:54', '2023-10-12 09:27:08');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_01_021608_create_sessions_table', 1),
(7, '2023_10_05_012728_create_admin_homes_table', 1),
(8, '2023_10_05_114554_create_admin_home_subtitles_table', 1),
(9, '2023_10_05_114833_create_social_media_links_table', 1),
(10, '2023_10_07_124823_create_home_buttons_table', 1),
(11, '2023_10_10_103033_create_abouts_table', 1),
(12, '2023_10_11_090756_create_about_components_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
('Tfgcn34JmHfbyNtZ4ZO5Yf6jVGQlJ6ZCfVNvAmTi', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVHRpV2NzcjlNSkRodUhoVlVrbUhEOGJIZ2xZRUtzZUtuNllVV2ZyQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkakJHL3FZREVlZEJibVRpb1dYWG5kdWNHR2ZNeWN6U1JwSDNFaGFyZnE2TnZmVGFyNGl5b3UiO30=', 1697286107);

-- --------------------------------------------------------

--
-- Table structure for table `social_media_links`
--

CREATE TABLE `social_media_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_home_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media_links`
--

INSERT INTO `social_media_links` (`id`, `admin_home_id`, `name`, `icon`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'Github', '<i class=\"fa-brands fa-github\"></i>', 'https://github.com/mdrkshanto', '2023-10-12 09:26:24', '2023-10-12 09:26:24'),
(2, 1, 'Facebook', '<i class=\"fa-brands fa-facebook-f\"></i>', 'http://facebook.com/mdrkshantobd', '2023-10-13 02:09:02', '2023-10-13 02:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$jBG/qYDEedBbmTioWXXnducGGfMyczSRpH3Eharfq6NvfTar4iyou', NULL, NULL, NULL, 'vTBelNqoI8Vdaxt12FGtbaPw8SmFasVfihXkRQVE8Xq5WiwXlHqgWswJ3ZJh', NULL, NULL, '2023-10-12 09:19:19', '2023-10-12 09:19:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `abouts_name_unique` (`name`);

--
-- Indexes for table `about_components`
--
ALTER TABLE `about_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_homes`
--
ALTER TABLE `admin_homes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_homes_unique_id_unique` (`unique_id`) USING HASH;

--
-- Indexes for table `admin_home_subtitles`
--
ALTER TABLE `admin_home_subtitles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_buttons`
--
ALTER TABLE `home_buttons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `home_buttons_name_unique` (`name`) USING HASH,
  ADD UNIQUE KEY `home_buttons_link_unique` (`link`) USING HASH;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `social_media_links`
--
ALTER TABLE `social_media_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_media_links_icon_unique` (`icon`),
  ADD UNIQUE KEY `social_media_links_name_unique` (`name`) USING HASH,
  ADD UNIQUE KEY `social_media_links_link_unique` (`link`) USING HASH;

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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_components`
--
ALTER TABLE `about_components`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin_homes`
--
ALTER TABLE `admin_homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_home_subtitles`
--
ALTER TABLE `admin_home_subtitles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_buttons`
--
ALTER TABLE `home_buttons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_media_links`
--
ALTER TABLE `social_media_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
