-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 04:25 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_Barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Varian` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stok` int(11) NOT NULL,
  `Harga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_Barang`, `Nama`, `Varian`, `Stok`, `Harga`, `created_at`, `updated_at`) VALUES
('IB-0001', 'Keripik', 'Pedas', 8, 'Rp. 20000', NULL, NULL),
('IB-0002', 'Jagung', 'Pedas asin', 13, 'Rp. 20.000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `ID_Barang_Masuk` bigint(20) UNSIGNED NOT NULL,
  `ID_Barang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah_Barang_Masuk` int(11) NOT NULL,
  `Tanggal_Barang_Masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`ID_Barang_Masuk`, `ID_Barang`, `Jumlah_Barang_Masuk`, `Tanggal_Barang_Masuk`, `created_at`, `updated_at`) VALUES
(9, 'IB-0002', 2, '2023-01-19', NULL, NULL),
(11, 'IB-0002', 10, '2023-01-30', NULL, NULL);

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `tg_kurang_stok_barang` AFTER DELETE ON `barang_masuk` FOR EACH ROW begin update barang set Stok = Stok-OLD.Jumlah_Barang_Masuk where barang.ID_Barang=OLD.ID_Barang; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID_Customer` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_Customer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `No_Telepon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID_Customer`, `Nama_Customer`, `Alamat`, `No_Telepon`, `created_at`, `updated_at`) VALUES
('IC-0001', 'Wawan', 'bandung', '08123325551', NULL, NULL),
('IC-0002', 'Agung', 'bandung', '08123222222', NULL, NULL);

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_01_18_144836_create_barang_table', 1),
(11, '2023_01_19_034949_create_barang_masuk_table', 2),
(12, '2023_01_19_073049_create_customer_table', 3),
(13, '2023_01_19_090108_create_sales_table', 4);

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
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `ID_Sales` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Customer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Qty` int(11) NOT NULL,
  `Tanggal_Transaksi` date NOT NULL,
  `Harga_Sales` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Metode_Pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`ID_Sales`, `ID_Barang`, `ID_Customer`, `Qty`, `Tanggal_Transaksi`, `Harga_Sales`, `Metode_Pembayaran`, `created_at`, `updated_at`) VALUES
('IS-0001', 'IB-0001', 'IC-0001', 1, '2022-12-31', 'Rp. 20.000', 'Tunai', NULL, NULL),
('IS-0002', 'IB-0002', 'IC-0002', 21, '2023-01-24', 'Rp. 20.000', 'Tunai', NULL, NULL),
('IS-0003', 'IB-0002', 'IC-0002', 2, '2023-01-23', 'Rp. 20.000', 'Non Tunai', NULL, NULL),
('IS-0004', 'IB-0001', 'IC-0002', 1, '2022-11-25', 'Rp. 8.000', 'Tunai', NULL, NULL),
('IS-0005', 'IB-0001', 'IC-0001', 1, '2022-10-25', 'Rp. 20.000', 'Tunai', NULL, NULL),
('IS-0006', 'IB-0001', 'IC-0002', 1, '2022-09-25', 'Rp. 20.000', 'Tunai', NULL, NULL),
('IS-0007', 'IB-0001', 'IC-0001', 1, '2022-08-25', 'Rp. 20.000', 'Tunai', NULL, NULL),
('IS-0008', 'IB-0001', 'IC-0001', 1, '2022-07-25', 'Rp. 20.000', 'Tunai', NULL, NULL),
('IS-0009', 'IB-0001', 'IC-0002', 1, '2022-06-25', 'Rp. 10.000', 'Tunai', NULL, NULL),
('IS-0010', 'IB-0001', 'IC-0002', 1, '2022-05-25', 'Rp. 10.000', 'Tunai', NULL, NULL),
('IS-0011', 'IB-0002', 'IC-0002', 1, '2022-04-25', 'Rp. 20.000', 'Tunai', NULL, NULL),
('IS-0012', 'IB-0001', 'IC-0001', 3, '2023-01-30', 'Rp. 50.000', 'Tunai', NULL, NULL),
('IS-0013', 'IB-0001', 'IC-0001', 1, '2023-02-07', 'Rp. 20.000', 'Tunai', NULL, NULL),
('IS-0014', 'IB-0001', 'IC-0002', 2, '2023-02-07', 'Rp.40.000', 'Non Tunai', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_User` int(20) UNSIGNED NOT NULL,
  `Nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_User`, `Nama`, `Username`, `Password`, `created_at`, `updated_at`) VALUES
(1, 'Fitri Amaliah', 'admin', 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_Barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`ID_Barang_Masuk`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_Customer`);

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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`ID_Sales`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`),
  ADD UNIQUE KEY `users_email_unique` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `ID_Barang_Masuk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
