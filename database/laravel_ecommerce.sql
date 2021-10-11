-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 11, 2021 at 05:03 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `popular` tinyint(4) NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Shirt', 'Shirt', 'all kinds of shirt items', 0, 1, 'printed-shirts-500x500.jpg', 'Shirt', 'all kinds of shirt items', 'all kinds of shirt items', '2021-10-02 09:12:41', '2021-10-09 09:44:22'),
(2, 'T-Shirt', 't-shirt', 'All kinds of t-shirt item here', 0, 1, 'CU5992_010_49f8.jpg', 'Quality t-shirt item', 'Quality t-shirt item', 'Quality t-shirt item', '2021-10-02 10:33:18', '2021-10-09 09:43:32'),
(8, 'Mobile', 'mobile', 'good quality and color', 0, 1, '71bcl7VlwVL._SL1500_.jpg', 'good quality and color', 'good quality and color', 'good quality and color', '2021-10-03 11:55:55', '2021-10-03 12:07:57'),
(10, 'Electronics', 'electronics', 'good quality and color', 0, 1, 'istockphoto-513381306-612x612.jpg', 'good quality and color', 'good quality and color', 'good quality and color', '2021-10-08 08:32:56', '2021-10-09 09:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_01_150437_create_categories_table', 2),
(7, '2021_10_04_143335_create_products_table', 3),
(8, '2021_10_11_160954_create_carts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `original_price`, `selling_price`, `image`, `quantity`, `tax`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 8, 'Redmi Note 8  pro', 'Samsung', 'Samsung', '14900', '13500', '71bcl7VlwVL._SL1500_.jpg', '1', '140', 0, 1, 'good quality and color', 'good quality and color', 'good quality and color', '2021-10-04 10:31:11', '2021-10-09 12:01:53'),
(2, 1, 'Formal Shirt For Men', 'electronics', 'good quality and color', '1500', '1350', 'printed-shirts-500x500.jpg', '1', '10', 0, 1, 'good quality and color', 'good quality and color', 'good quality and color', '2021-10-04 10:35:00', '2021-10-08 10:20:39'),
(3, 2, 'T-Shirt For Men', 't-shirt', 'Quality household item', '720', '500', 'CU5992_010_49f8.jpg', '1', '10', 0, 1, 'Quality household item', 'Quality household item', 'Quality household item', '2021-10-04 10:38:23', '2021-10-09 12:02:13'),
(4, 10, 'Apple MacBook Pro', 'Apple MacBook Pro', 'Apple MacBook Pro Core i5 8GB RAM 256GB SSD', '140000', '130000', 'giant_114153.jpg', '1', '500', 0, 1, 'Apple MacBook Pro Core i5 8GB RAM 256GB SSD', 'Apple MacBook Pro Core i5 8GB RAM 256GB SSD', 'Apple MacBook Pro Core i5 8GB RAM 256GB SSD', '2021-10-08 08:36:06', '2021-10-11 08:37:07'),
(5, 8, 'Xiaomi Redmi 8', 'Xiaomi Redmi 8', 'Xiaomi Redmi 8 is powered by the Qualcomm SDM439 Snapdragon 439 Octa-core (2×1.95 GHz Cortex-A53 + 6×1.45 GHz Cortex A53) processo', '14000', '13500', 'Xiaomi-Redmi-8.png', '1', '200', 0, 1, 'Xiaomi Redmi 8 is powered by the Qualcomm SDM439 Snapdragon 439 Octa-core (2×1.95 GHz Cortex-A53 + 6×1.45 GHz Cortex A53) processo', 'Xiaomi Redmi 8 is powered by the Qualcomm SDM439 Snapdragon 439 Octa-core (2×1.95 GHz Cortex-A53 + 6×1.45 GHz Cortex A53) processo', 'Xiaomi Redmi 8 is powered by the Qualcomm SDM439 Snapdragon 439 Octa-core (2×1.95 GHz Cortex-A53 + 6×1.45 GHz Cortex A53) processo', '2021-10-08 08:40:24', '2021-10-08 10:21:43'),
(6, 2, 'Kids\' t-shirt', 'Kids\' t-shirt', 'Good t-shirt designs are those that people want to wear', '650', '450', '7feade26-2ce0-438d-ae35-b66c99cebc6e.jpg', '1', '23', 0, 1, 'Good t-shirt designs are those that people want to wear', 'Good t-shirt designs are those that people want to wear', 'Good t-shirt designs are those that people want to wear', '2021-10-08 08:42:34', '2021-10-08 10:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mehedi', 'ms09@gmail.com', NULL, '$2y$10$7NGzG5e/yziY68FhdrKbCu87HMDGFx4h9nyevl3WTMjr7DKWieJLe', 1, NULL, '2021-09-27 09:31:39', '2021-09-27 09:31:39'),
(2, 'MD.MEHEDI HASAN SARKER', 'ms@gmail.com', NULL, '$2y$10$ruiY3QNKrIGi4XJqhtd1xeYMMpxu78WF.uuY8LeVMT7i0VH/UW9xG', 1, NULL, '2021-10-01 08:54:24', '2021-10-01 08:54:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
