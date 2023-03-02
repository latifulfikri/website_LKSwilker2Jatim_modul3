-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 12:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nusantara_vaccine_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(4, 'effendi_ghazali', '$2y$10$33o.5vb1J7VVfiHBqVfPuetEblx3p9fWGXGQsjeliiekFHfBPBcgi', 'Effendi', 'Ghazali', '2021-03-08 23:57:57', '2021-03-09 02:56:01'),
(6, 'richard04', '$2y$10$55PmxtXZHy443UYbtb9CEef1OsmUFiKI/qHZH7iZs4C2JZQpT/oZ2', 'Richard', 'Simanjuntak', '2021-03-09 00:14:11', '2021-03-09 00:14:11'),
(7, 'santiwil', '$2y$10$lCG5nXMxBTCDxH5LQRkp0uG/Cjy4YwJjkEgg4IBeZs7/uW0C0s1Vm', 'Santi', 'Wilhelmina', '2021-03-09 00:14:45', '2021-03-09 00:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `admins_vac_center`
--

CREATE TABLE `admins_vac_center` (
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2021_03_09_005432_create_admins_table', 1),
(2, '2021_03_09_005812_create_admins_vac_center_table', 1),
(3, '2021_03_09_010040_create_news_table', 1),
(4, '2021_03_09_010448_create_vac_center_table', 1),
(5, '2021_03_09_010945_create_schedule_table', 1),
(6, '2021_03_09_011153_create_vac_center_schedules_table', 1),
(7, '2021_03_09_011757_create_peserta_table', 1),
(8, '2021_03_09_012556_create_vaccination_status_table', 1),
(9, '2021_03_09_012747_create_peserta_vaccination_status_table', 1),
(10, '2021_03_09_013322_create_vaccines_table', 1),
(11, '2021_03_09_013635_create_peserta_vaccines_table', 1),
(12, '2021_03_09_014156_create_stocks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vac_center_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peserta_vaccination_status`
--

CREATE TABLE `peserta_vaccination_status` (
  `id` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `peserta_nik` bigint(20) NOT NULL,
  `vaccination_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peserta_vaccines`
--

CREATE TABLE `peserta_vaccines` (
  `id` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `peserta_nik` bigint(20) NOT NULL,
  `vaccines_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `vac_center_id` int(11) NOT NULL,
  `vaccines_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_status`
--

CREATE TABLE `vaccination_status` (
  `id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vac_center`
--

CREATE TABLE `vac_center` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(14) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vac_center`
--

INSERT INTO `vac_center` (`id`, `name`, `address`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'Rumah Sakit Sejahtera', 'Indonesia Raya Merdeka', 123456, '2021-03-09 01:29:14', '2021-03-09 02:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `vac_center_schedules`
--

CREATE TABLE `vac_center_schedules` (
  `id` int(11) NOT NULL,
  `vac_center_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_id_unique` (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `admins_vac_center`
--
ALTER TABLE `admins_vac_center`
  ADD UNIQUE KEY `admins_vac_center_username_unique` (`username`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_id_unique` (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `peserta_id_unique` (`id`),
  ADD UNIQUE KEY `peserta_nik_unique` (`nik`),
  ADD KEY `peserta_vac_center_id_foreign` (`vac_center_id`);

--
-- Indexes for table `peserta_vaccination_status`
--
ALTER TABLE `peserta_vaccination_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peserta_vaccination_status_peserta_id_foreign` (`peserta_id`),
  ADD KEY `peserta_vaccination_status_vaccination_status_id_foreign` (`vaccination_status_id`);

--
-- Indexes for table `peserta_vaccines`
--
ALTER TABLE `peserta_vaccines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peserta_vaccines_peserta_id_foreign` (`peserta_id`),
  ADD KEY `peserta_vaccines_vaccines_id_foreign` (`vaccines_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schedule_id_unique` (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_vac_center_id_foreign` (`vac_center_id`),
  ADD KEY `stocks_vaccines_id_foreign` (`vaccines_id`);

--
-- Indexes for table `vaccination_status`
--
ALTER TABLE `vaccination_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vaccination_status_id_unique` (`id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vaccines_id_unique` (`id`),
  ADD UNIQUE KEY `vaccines_brand_unique` (`brand`);

--
-- Indexes for table `vac_center`
--
ALTER TABLE `vac_center`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vac_center_id_unique` (`id`);

--
-- Indexes for table `vac_center_schedules`
--
ALTER TABLE `vac_center_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vac_center_schedules_vac_center_id_foreign` (`vac_center_id`),
  ADD KEY `vac_center_schedules_schedule_id_foreign` (`schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta_vaccination_status`
--
ALTER TABLE `peserta_vaccination_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta_vaccines`
--
ALTER TABLE `peserta_vaccines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccination_status`
--
ALTER TABLE `vaccination_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vac_center`
--
ALTER TABLE `vac_center`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vac_center_schedules`
--
ALTER TABLE `vac_center_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_vac_center_id_foreign` FOREIGN KEY (`vac_center_id`) REFERENCES `vac_center` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta_vaccination_status`
--
ALTER TABLE `peserta_vaccination_status`
  ADD CONSTRAINT `peserta_vaccination_status_peserta_id_foreign` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_vaccination_status_vaccination_status_id_foreign` FOREIGN KEY (`vaccination_status_id`) REFERENCES `vaccination_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta_vaccines`
--
ALTER TABLE `peserta_vaccines`
  ADD CONSTRAINT `peserta_vaccines_peserta_id_foreign` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_vaccines_vaccines_id_foreign` FOREIGN KEY (`vaccines_id`) REFERENCES `vaccines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_vac_center_id_foreign` FOREIGN KEY (`vac_center_id`) REFERENCES `vac_center` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stocks_vaccines_id_foreign` FOREIGN KEY (`vaccines_id`) REFERENCES `vaccines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vac_center_schedules`
--
ALTER TABLE `vac_center_schedules`
  ADD CONSTRAINT `vac_center_schedules_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vac_center_schedules_vac_center_id_foreign` FOREIGN KEY (`vac_center_id`) REFERENCES `vac_center` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
