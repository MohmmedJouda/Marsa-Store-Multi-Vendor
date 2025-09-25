-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2025 at 02:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL,
  `recipient_name` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `postal_code` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('6e69cfff18f49bcc38d669ba7d5a9b69', 'i:1;', 1756543943),
('6e69cfff18f49bcc38d669ba7d5a9b69:timer', 'i:1756543943;', 1756543943),
('94f171e8fc61eb12d1bf23135e7a5bd2', 'i:1;', 1756544109),
('94f171e8fc61eb12d1bf23135e7a5bd2:timer', 'i:1756544109;', 1756544109),
('fd4eeaae734b155228fe2100234b53e2', 'i:1;', 1756544091),
('fd4eeaae734b155228fe2100234b53e2:timer', 'i:1756544091;', 1756544091);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) NOT NULL,
  `owner` varchar(191) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'images/iphone.png', '2025-08-15 10:36:26', '2025-08-15 10:36:26'),
(2, 'Fashion', 'images/iphone.png', '2025-08-15 10:36:26', '2025-08-15 10:36:26'),
(3, 'Home & Kitchen', 'images/iphone.png', '2025-08-15 10:36:26', '2025-08-15 10:36:26'),
(4, 'Beauty & Personal Care', 'images/iphone.png', '2025-08-15 10:36:26', '2025-08-15 10:36:26'),
(5, 'Books & Stationery', 'images/iphone.png', '2025-08-15 10:36:26', '2025-08-15 10:36:26'),
(6, 'Toys & Games', 'images/iphone.png', '2025-08-15 10:36:26', '2025-08-15 10:36:26'),
(7, 'Sports & Outdoors', 'images/iphone.png', '2025-08-15 10:36:26', '2025-08-15 10:36:26'),
(8, 'Automotive', 'images/iphone.png', '2025-08-15 10:36:26', '2025-08-15 10:36:26'),
(9, 'Grocery & Food', 'images/iphone.png', '2025-08-15 10:36:26', '2025-08-15 10:36:26'),
(10, 'Health & Wellness', 'images/iphone.png', '2025-08-15 10:36:26', '2025-08-15 10:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `profile_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_devices`
--

CREATE TABLE `customer_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `device_info` varchar(191) NOT NULL,
  `ip_address` varchar(191) NOT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_support_tickets`
--

CREATE TABLE `customer_support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'open',
  `admin_response` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_01_01_000000_create_users_table', 1),
(4, '2025_05_12_112616_create_vendor_documents_table', 1),
(5, '2025_05_12_114753_add_two_factor_columns_to_users_table', 1),
(6, '2025_05_12_114914_create_personal_access_tokens_table', 1),
(7, '2025_06_18_114009_add_social_fields_to_users_table', 1),
(8, '2025_06_24_112451_create_categories_table', 1),
(9, '2025_06_24_112451_create_stores_table', 1),
(10, '2025_06_24_112451_create_subcategories_table', 1),
(11, '2025_07_04_104225_create_customers_table', 1),
(12, '2025_07_06_104402_create_addresses_table', 1),
(13, '2025_07_07_110744_create_order_items_table', 1),
(14, '2025_07_07_120848_create_orders_table', 1),
(15, '2025_07_07_121045_create_reviews_table', 1),
(16, '2025_07_07_121120_create_cart_items_table', 1),
(17, '2025_07_15_122352_create_products_table', 1),
(18, '2025_07_16_102811_create_product_variants_table', 1),
(19, '2025_07_16_104136_create_wishlists_table', 1),
(20, '2025_07_16_104307_create_customer_support_tickets_table', 1),
(21, '2025_07_16_104835_create_notifications_table', 1),
(22, '2025_07_16_105609_create_payments_table', 1),
(23, '2025_07_16_110553_create_vendors_table', 1),
(24, '2025_07_16_111125_create_saved_carts_table', 1),
(25, '2025_07_16_111228_create_customer_devices_table', 1),
(26, '2025_07_16_121959_create_product_attributes_table', 1),
(27, '2025_07_16_122413_create_product_attribute_values_table', 1),
(28, '2025_07_16_122444_create_product_images_table', 1),
(29, '2025_07_17_103601_create_product_variant_attribute_value_table', 1),
(30, '2025_07_17_105459_create_product_returns_table', 1),
(31, '2025_07_17_110347_create_refunds_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `body` text NOT NULL,
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
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_method` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'pending',
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(191) NOT NULL,
  `payment_status` varchar(191) NOT NULL,
  `transaction_id` varchar(191) DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
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
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(5,2) DEFAULT 0.00,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `price`, `discount`, `stock`, `status`, `is_featured`, `deleted_at`, `created_at`, `updated_at`, `subcategory_id`, `store_id`) VALUES
(6, 'Tad Klein', 'tad-klein', 'Aperiam ut saepe mag', 626.00, 36.00, 1494, 'inactive', 0, NULL, '2025-08-30 05:54:55', '2025-08-30 05:56:20', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `name`, `created_at`, `updated_at`, `product_id`) VALUES
(8, 'Christen Finch', '2025-08-30 05:56:20', '2025-08-30 05:56:20', 6),
(9, 'Dalton Mccarthy', '2025-08-30 05:56:20', '2025-08-30 05:56:20', 6);

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_values`
--

CREATE TABLE `product_attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attribute_values`
--

INSERT INTO `product_attribute_values` (`id`, `product_attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(8, 8, 'Sed eum aut voluptat', '2025-08-30 05:56:20', '2025-08-30 05:56:20'),
(9, 9, 'Quia eaque et omnis', '2025-08-30 05:56:20', '2025-08-30 05:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(191) NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `is_main`, `created_at`, `updated_at`) VALUES
(11, 6, 'products/IsVMsLqCHB0t6XFubwAX7NnXxwHhf4wLtAKMtobR.jpg', 1, '2025-08-30 05:54:56', '2025-08-30 05:54:56'),
(12, 6, 'products/BpycF0wREJSQK2kaZ1HAj3E9ckjVGoukGPgHTN9z.jpg', 0, '2025-08-30 05:54:56', '2025-08-30 05:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_returns`
--

CREATE TABLE `product_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `reason` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `combination` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`combination`)),
  `price` decimal(10,2) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `sku` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `combination`, `price`, `quantity`, `sku`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '{\"Christen Finch\":\"Sed eum aut voluptat\",\"Dalton Mccarthy\":\"Quia eaque et omnis\"}', 100.00, 100, 'TADKLEIN-SEDEUMAUTVOLUPTAT-QUIAEAQUEETOMNIS', 'variant_images/9HQ0d28aDLTZbi0mbYNuqlLjtd2XW0l8hPw2Dt7n.png', 6, '2025-08-30 05:54:56', '2025-08-30 05:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_attribute_value`
--

CREATE TABLE `product_variant_attribute_value` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` bigint(20) UNSIGNED NOT NULL,
  `product_attribute_id` bigint(20) UNSIGNED NOT NULL,
  `product_attribute_value_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variant_attribute_value`
--

INSERT INTO `product_variant_attribute_value` (`id`, `product_variant_id`, `product_attribute_id`, `product_attribute_value_id`, `created_at`, `updated_at`) VALUES
(3, 1, 8, 8, '2025-08-30 05:56:20', '2025-08-30 05:56:20'),
(4, 1, 9, 9, '2025-08-30 05:56:20', '2025-08-30 05:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_return_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review_text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saved_carts`
--

CREATE TABLE `saved_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `slug`, `description`, `logo`, `phone`, `address`, `status`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, 'Zemlak, Murray and Ullrich', 'zemlak-murray-and-ullrich-3aXld', 'Recusandae dicta dolor ipsam rem. Commodi minus alias omnis iure repellendus. Expedita explicabo cupiditate impedit iure eveniet veritatis. Et doloremque vitae exercitationem aut quo.', NULL, '(831) 347-0244', '17042 Dwight Roads Apt. 894\nGrahamside, IN 24126-2468', 'pending', '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL, 1),
(2, 'Paucek, Farrell and Thiel', 'paucek-farrell-and-thiel-aKmAj', 'Sunt est unde eveniet ullam corporis ratione eligendi. Dolore incidunt suscipit quo doloribus. Omnis quas quia maiores similique amet quidem beatae. Consequatur quam minima unde.', NULL, '1-720-721-1474', '516 Jaclyn Path\nFarrellmouth, WA 42639', 'pending', '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL, 2),
(3, 'Fahey Inc', 'fahey-inc-fUCNo', 'Repellat quia temporibus ullam consequatur sit. Eius rerum cupiditate quia omnis fugiat quis perferendis. Adipisci modi distinctio ab. Provident aut aperiam maxime assumenda.', NULL, '+16294472365', '7737 Ryan Mountain Suite 957\nNew Tyreek, VT 19620', 'rejected', '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL, 3),
(4, 'Denesik-Witting', 'denesik-witting-RdxjA', 'Et similique dolorem porro. Omnis unde sit dolorum velit laboriosam minima quaerat nihil. Cupiditate nostrum ex blanditiis quo fuga et quae. Veritatis et est alias voluptas.', NULL, '+1-352-547-6675', '7724 Kody Drive\nJohnsonmouth, ME 14963-5117', 'approved', '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL, 4),
(5, 'Cronin, Thompson and Pagac', 'cronin-thompson-and-pagac-qxZQg', 'Doloremque ab voluptatum voluptatem repudiandae voluptatem. Nostrum et omnis consectetur ea aperiam. Sed velit nam amet accusamus ut. Nobis et expedita distinctio eos.', NULL, '+1 (689) 761-0230', '53500 Wolf Fork\nWillfort, PA 63375-6051', 'rejected', '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL, 5),
(6, 'Corkery, Runolfsdottir and Flatley', 'corkery-runolfsdottir-and-flatley-sTzGf', 'Inventore in reiciendis iste. Esse recusandae nostrum fugiat. Veniam aut voluptatem qui laudantium. Veritatis unde quo dolor.', NULL, '1-929-678-3373', '6206 Will Knoll\nEllieshire, IA 75354-6709', 'pending', '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL, 6),
(7, 'McLaughlin PLC', 'mclaughlin-plc-hoSSK', 'Molestiae consequuntur a eum odit commodi ut aperiam. At maxime sit corporis fugiat sit commodi et.', NULL, '1-212-530-5992', '3288 Graham Curve\nNew Astrid, MD 72887-7190', 'rejected', '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL, 7),
(8, 'Parker, Carroll and Kirlin', 'parker-carroll-and-kirlin-uW8rc', 'Natus voluptatem corrupti quam iure est molestiae reiciendis. Autem exercitationem autem et tempora adipisci doloremque ipsum esse. Nobis id nam nisi dolores sed enim ipsa. Doloremque magnam impedit dolor dolor.', NULL, '(283) 643-3557', '89759 Irving Shoals Suite 480\nHellerhaven, TX 31782-3358', 'rejected', '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL, 8),
(9, 'Kulas Group', 'kulas-group-F4Yuz', 'Ipsa illo at et veritatis facilis asperiores nulla. Sapiente fuga qui ut ducimus maxime inventore. Ut nemo sit omnis fuga quae. Corrupti excepturi et incidunt labore non nihil.', NULL, '(573) 243-0993', '114 Retha Flat\nPort Winifredfurt, WI 34109', 'pending', '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL, 9),
(10, 'Nikolaus Inc', 'nikolaus-inc-KWJLA', 'Autem non quod aliquid nostrum laborum ullam. Ut quo eum quia qui dicta. Aut pariatur natus quo impedit.', NULL, '+1-617-353-5255', '2863 Romaguera Forge Apt. 706\nNorth Dusty, NH 86332-0214', 'pending', '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL, 10),
(11, 'apple', 'apple', 'apple', NULL, '+970597482723', 'palestine', 'approved', '2025-08-30 05:53:16', '2025-08-30 05:53:16', NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `description`, `slug`, `image`, `is_active`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Phones', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:26', '2025-08-15 10:36:26', 1),
(2, 'Laptops', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:26', '2025-08-15 10:36:26', 1),
(3, 'Tablets', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:26', '2025-08-15 10:36:26', 1),
(4, 'Smart Watches', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:26', '2025-08-15 10:36:26', 1),
(5, 'Headphones & Earbuds', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:26', '2025-08-15 10:36:26', 1),
(6, 'Cameras', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:26', '2025-08-15 10:36:26', 1),
(7, 'Televisions', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:26', '2025-08-15 10:36:26', 1),
(8, 'Gaming Consoles', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:26', '2025-08-15 10:36:26', 1),
(9, 'Accessories', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 1),
(10, 'Men\'s Clothing', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 2),
(11, 'Women\'s Clothing', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 2),
(12, 'Shoes', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 2),
(13, 'Bags & Backpacks', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 2),
(14, 'Watches', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 2),
(15, 'Sunglasses & Eyewear', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 2),
(16, 'Jewelry', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 2),
(17, 'Furniture', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 3),
(18, 'Kitchen Appliances', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 3),
(19, 'Cookware & Utensils', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 3),
(20, 'Home Decor', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 3),
(21, 'Lighting', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 3),
(22, 'Bedding & Linen', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 3),
(23, 'Cleaning Supplies', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 3),
(24, 'Skincare', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 4),
(25, 'Makeup', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 4),
(26, 'Hair Care', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 4),
(27, 'Fragrances', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 4),
(28, 'Men\'s Grooming', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 4),
(29, 'Bath & Body', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 4),
(30, 'Tools & Accessories', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 4),
(31, 'School Supplies', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 5),
(32, 'Office Supplies', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 5),
(33, 'Fiction Books', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 5),
(34, 'Non-Fiction Books', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 5),
(35, 'Children’s Books', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 5),
(36, 'Educational Books', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 5),
(37, 'Art Supplies', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 5),
(38, 'Educational Toys', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 6),
(39, 'Action Figures', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 6),
(40, 'Puzzles & Board Games', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 6),
(41, 'Stuffed Animals', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 6),
(42, 'Outdoor Toys', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 6),
(43, 'Remote Control Toys', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 6),
(44, 'Building Blocks', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 6),
(45, 'Fitness Equipment', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 7),
(46, 'Sportswear', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 7),
(47, 'Footwear', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 7),
(48, 'Camping & Hiking', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 7),
(49, 'Bicycles & Accessories', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 7),
(50, 'Water Sports', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 7),
(51, 'Team Sports', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 7),
(52, 'Car Accessories', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 8),
(53, 'Oils & Fluids', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 8),
(54, 'Car Electronics', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 8),
(55, 'Tires & Wheels', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 8),
(56, 'Tools & Equipment', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 8),
(57, 'Cleaning & Detailing', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 8),
(58, 'Motorcycle Parts', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 8),
(59, 'Snacks', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 9),
(60, 'Beverages', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 9),
(61, 'Canned Goods', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 9),
(62, 'Spices & Herbs', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 9),
(63, 'Organic Products', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 9),
(64, 'Breakfast Items', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 9),
(65, 'Baking Essentials', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 9),
(66, 'Vitamins & Supplements', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 10),
(67, 'Medical Equipment', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 10),
(68, 'First Aid Supplies', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 10),
(69, 'Personal Care', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 10),
(70, 'Pain Relief', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 10),
(71, 'Health Monitoring', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 10),
(72, 'Weight Management', NULL, NULL, 'images/iphone.png', 1, '2025-08-15 10:36:27', '2025-08-15 10:36:27', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `role` enum('customer','vendor','moderator','gest','super_admin') NOT NULL DEFAULT 'customer',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `provider_id` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `role`, `is_active`, `email_verified_at`, `current_team_id`, `profile_photo_path`, `remember_token`, `provider`, `provider_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Marcia Feest', 'julien.brekke@example.org', '$2y$12$7yiGCbVWNxCD5qvcdJDeSuNSjwyMU4NDY0rmEfql9DmEaYqhjz5Ya', NULL, NULL, NULL, 'moderator', 1, '2025-08-15 10:36:27', NULL, NULL, 'cq7Rd3yzbtVg88Z4BK4CDICQpVvbA4GBEozfC4ga4gAOkSvNiBYFS0UBAjk6', NULL, NULL, '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL),
(2, 'Baby Gutkowski', 'lockman.brent@example.net', '$2y$12$7yiGCbVWNxCD5qvcdJDeSuNSjwyMU4NDY0rmEfql9DmEaYqhjz5Ya', NULL, NULL, NULL, 'customer', 1, '2025-08-15 10:36:27', NULL, NULL, 'jSs09DXErqJDyrRlwgqAz6FAm3awiSNxSo9mr0MhI5IqtgHUFc0v4pr5UxMx', NULL, NULL, '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL),
(3, 'Sonny O\'Keefe', 'vicky13@example.net', '$2y$12$7yiGCbVWNxCD5qvcdJDeSuNSjwyMU4NDY0rmEfql9DmEaYqhjz5Ya', NULL, NULL, NULL, 'vendor', 1, '2025-08-15 10:36:27', NULL, NULL, '0J9AsdqM5z', NULL, NULL, '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL),
(4, 'Dr. Lurline Schaden III', 'ngreenfelder@example.org', '$2y$12$7yiGCbVWNxCD5qvcdJDeSuNSjwyMU4NDY0rmEfql9DmEaYqhjz5Ya', NULL, NULL, NULL, 'vendor', 1, '2025-08-15 10:36:27', NULL, NULL, 'TaiAHZMJ3z', NULL, NULL, '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL),
(5, 'Mr. Coy Thiel V', 'kling.elsa@example.com', '$2y$12$7yiGCbVWNxCD5qvcdJDeSuNSjwyMU4NDY0rmEfql9DmEaYqhjz5Ya', NULL, NULL, NULL, 'vendor', 1, '2025-08-15 10:36:27', NULL, NULL, '3ML5wJ15XP', NULL, NULL, '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL),
(6, 'Mr. Lewis Mueller', 'wveum@example.org', '$2y$12$7yiGCbVWNxCD5qvcdJDeSuNSjwyMU4NDY0rmEfql9DmEaYqhjz5Ya', NULL, NULL, NULL, 'vendor', 1, '2025-08-15 10:36:27', NULL, NULL, '0c2pKP2zM8', NULL, NULL, '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL),
(7, 'Gregory Daniel', 'cassidy23@example.org', '$2y$12$7yiGCbVWNxCD5qvcdJDeSuNSjwyMU4NDY0rmEfql9DmEaYqhjz5Ya', NULL, NULL, NULL, 'vendor', 1, '2025-08-15 10:36:27', NULL, NULL, 'jReV2KZonG', NULL, NULL, '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL),
(8, 'Abdullah Bode', 'mante.krystal@example.com', '$2y$12$7yiGCbVWNxCD5qvcdJDeSuNSjwyMU4NDY0rmEfql9DmEaYqhjz5Ya', NULL, NULL, NULL, 'vendor', 1, '2025-08-15 10:36:27', NULL, NULL, '7wCJcMjEPA', NULL, NULL, '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL),
(9, 'Walker Gleichner', 'bernardo37@example.org', '$2y$12$7yiGCbVWNxCD5qvcdJDeSuNSjwyMU4NDY0rmEfql9DmEaYqhjz5Ya', NULL, NULL, NULL, 'vendor', 1, '2025-08-15 10:36:27', NULL, NULL, 'S7JUNJCsP5', NULL, NULL, '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL),
(10, 'Ms. Annalise Moore Jr.', 'jerde.rod@example.org', '$2y$12$7yiGCbVWNxCD5qvcdJDeSuNSjwyMU4NDY0rmEfql9DmEaYqhjz5Ya', NULL, NULL, NULL, 'vendor', 1, '2025-08-15 10:36:27', NULL, NULL, 'eZzRBbUQN1', NULL, NULL, '2025-08-15 10:36:27', '2025-08-15 10:36:27', NULL),
(11, 'nader', 'naderfares1995@gmail.com', '$2y$12$Uely96f08ayldk6ulKPl.eYoh5QcGksLTNGNs691MfJ4iHbEi7WAu', NULL, NULL, NULL, 'vendor', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2025-08-30 05:53:16', '2025-08-30 05:53:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(191) NOT NULL,
  `business_license` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_documents`
--

CREATE TABLE `vendor_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `document_type` enum('commercial_register','tax_certificate','id_card','other') NOT NULL,
  `document_url` varchar(191) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `admin_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `customer_devices`
--
ALTER TABLE `customer_devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_devices_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customer_support_tickets`
--
ALTER TABLE `customer_support_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_support_tickets_customer_id_foreign` (`customer_id`);

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
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `notifications_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_store_id_foreign` (`store_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attribute_values_product_attribute_id_foreign` (`product_attribute_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_returns`
--
ALTER TABLE `product_returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_returns_order_item_id_foreign` (`order_item_id`),
  ADD KEY `product_returns_customer_id_foreign` (`customer_id`),
  ADD KEY `product_returns_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_variants_sku_unique` (`sku`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variant_attribute_value`
--
ALTER TABLE `product_variant_attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variant_attribute_value_product_variant_id_foreign` (`product_variant_id`),
  ADD KEY `product_variant_attribute_value_product_attribute_id_foreign` (`product_attribute_id`),
  ADD KEY `pvav_value_fk` (`product_attribute_value_id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refunds_product_return_id_foreign` (`product_return_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `saved_carts`
--
ALTER TABLE `saved_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_carts_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stores_slug_unique` (`slug`),
  ADD KEY `stores_user_id_foreign` (`user_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_slug_unique` (`slug`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_user_id_foreign` (`user_id`);

--
-- Indexes for table `vendor_documents`
--
ALTER TABLE `vendor_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_documents_user_id_foreign` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_customer_id_foreign` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_devices`
--
ALTER TABLE `customer_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_support_tickets`
--
ALTER TABLE `customer_support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_returns`
--
ALTER TABLE `product_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_variant_attribute_value`
--
ALTER TABLE `product_variant_attribute_value`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saved_carts`
--
ALTER TABLE `saved_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_documents`
--
ALTER TABLE `vendor_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_devices`
--
ALTER TABLE `customer_devices`
  ADD CONSTRAINT `customer_devices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_support_tickets`
--
ALTER TABLE `customer_support_tickets`
  ADD CONSTRAINT `customer_support_tickets_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD CONSTRAINT `product_attribute_values_product_attribute_id_foreign` FOREIGN KEY (`product_attribute_id`) REFERENCES `product_attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_returns`
--
ALTER TABLE `product_returns`
  ADD CONSTRAINT `product_returns_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_returns_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_returns_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variant_attribute_value`
--
ALTER TABLE `product_variant_attribute_value`
  ADD CONSTRAINT `product_variant_attribute_value_product_attribute_id_foreign` FOREIGN KEY (`product_attribute_id`) REFERENCES `product_attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_variant_attribute_value_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pvav_value_fk` FOREIGN KEY (`product_attribute_value_id`) REFERENCES `product_attribute_values` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refunds`
--
ALTER TABLE `refunds`
  ADD CONSTRAINT `refunds_product_return_id_foreign` FOREIGN KEY (`product_return_id`) REFERENCES `product_returns` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_carts`
--
ALTER TABLE `saved_carts`
  ADD CONSTRAINT `saved_carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_documents`
--
ALTER TABLE `vendor_documents`
  ADD CONSTRAINT `vendor_documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
