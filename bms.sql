-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 10:46 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `cust_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_phone`, `cust_email`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Den 2', '0162336567', 'Dania@lgmail.com', '2019-11-19 15:19:37', '2019-11-19 15:19:37', '2019-11-19 15:19:37'),
(2, 'Muhammad Adib Noor Hazuki', '0182556064', 'adibhazuki6064@gmail.com', NULL, NULL, NULL),
(3, 'Zharfan Yek', '0116567121', 'zharfan@gmail.com', NULL, NULL, NULL),
(4, 'asimmm', '0198080909', '1@gmail.com', NULL, NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_date_in` date NOT NULL,
  `item_price` double(8,2) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `item_name`, `item_date_in`, `item_price`, `item_qty`, `created_at`, `updated_at`) VALUES
(1, 'Hard Disk 100TB', '2019-11-01', 200.00, 35, NULL, NULL),
(2, 'Laptop Fans Asus', '2019-11-01', 150.00, 10, NULL, NULL),
(3, 'SanDisk 16GB Thumb Drive', '2019-11-19', 80.00, 20, NULL, NULL),
(4, 'Mouse Logitech', '2019-11-27', 60.00, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_resets_table', 1),
(33, '2019_08_19_000000_create_failed_jobs_table', 1),
(34, '2019_10_21_063319_create_customers_table', 1),
(35, '2019_10_29_180409_create_sales_table', 1),
(36, '2019_10_29_182725_create_inventory_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` bigint(20) NOT NULL,
  `sales_date_in` date NOT NULL,
  `sales_cust_id` bigint(20) NOT NULL,
  `sales_item_id` bigint(20) NOT NULL,
  `sales_desc` varchar(255) COLLATE utf8_bin NOT NULL,
  `sales_total` float NOT NULL,
  `sales_amount_received` float NOT NULL,
  `sales_balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_date_in`, `sales_cust_id`, `sales_item_id`, `sales_desc`, `sales_total`, `sales_amount_received`, `sales_balance`) VALUES
(1, '2019-11-30', 2, 4, '1', 80, 100, 20);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_date_in` date NOT NULL,
  `service_cust_id` int(11) NOT NULL,
  `device_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `device_model` varchar(255) COLLATE utf8_bin NOT NULL,
  `device_color` varchar(255) COLLATE utf8_bin NOT NULL,
  `service_item_id` int(11) NOT NULL,
  `service_desc` varchar(255) COLLATE utf8_bin NOT NULL,
  `total_amount` double NOT NULL,
  `amount_received` double NOT NULL,
  `balance` double NOT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_date_in`, `service_cust_id`, `device_name`, `device_model`, `device_color`, `service_item_id`, `service_desc`, `total_amount`, `amount_received`, `balance`, `status`) VALUES
(1, '2019-11-01', 2, 'asus', 'md121', 'Noor Hazuki', 1, 'hdd', 12, 14, 2, 'Waiting for sparepart'),
(2, '2019-11-15', 2, 'asus', 'md121', 'Noor Hazuki', 1, 'hdd', 12, 15, 3, 'On progress'),
(4, '2019-11-21', 3, 'razer', 'gtx122', 'green', 2, 'fan', 67, 70, 3, 'Ready for pick up'),
(5, '2019-11-30', 1, 'rog', 'md254', 'red', 1, 'hdd', 205, 210, 5, 'On progress'),
(6, '2019-11-27', 4, 'rog', 'gtx122', 'blue', 2, 'replace laptop fans', 199, 200, 1, 'On progress'),
(7, '2019-11-27', 4, 'rog', 'der1', 'blue', 2, 'replace laptop fans', 199, 200, 1, 'Waiting for sparepart'),
(8, '2019-11-26', 4, 'acer', 'gtx122', 'blue', 2, 'replace laptop fans', 199, 200, 1, 'Waiting for sparepart'),
(9, '2019-11-27', 4, 'asus', 'md121', 'blue', 2, 'replace laptop fans', 205, 210, 5, 'Ready for pick up'),
(10, '2019-12-06', 1, 'mbo', 'md121', 'debb', 4, 'fans', 12, 15, 3, 'On progress');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@nowui.com', '2019-11-19 15:19:36', '$2y$10$iIl0eyEmA2bNnCy98Zmm0.TZ8RbpPsE8DIi4xzn1CzzdUwWp/xc4G', NULL, '2019-11-19 15:19:36', '2019-11-19 15:19:36'),
(2, 'Staff', 'staff@nowui.com', '2019-11-19 15:19:36', '$2y$10$HA1tqeDwapTTR4ES.2zPiuGXJTlwoqGfHxW0MZxRHs6oT7OkrmWfu', NULL, '2019-11-19 15:19:36', '2019-11-19 15:19:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `customers_cust_email_unique` (`cust_email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `sales_cust_id` (`sales_cust_id`),
  ADD KEY `sales_item_id` (`sales_item_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `service_cust_id` (`service_cust_id`),
  ADD KEY `service_item_id` (`service_item_id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
