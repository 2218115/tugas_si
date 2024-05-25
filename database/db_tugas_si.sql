-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2024 at 05:36 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tugas_si`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('h4eRMfmTBfTWHg5hpYJ8V0n2lSBaqiZ02y0iGfea', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZEZaT3UwSVNXQldDMFRCUEhvY0JFRVJtZHh2dWZHZk9sOWZOc3FsWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9rb25zdW1lbi1wZWxhbmdnYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1716614437),
('H6CqI4DFF8EhaTUn8v6jODuI8RV4UXCaWJkWcLQc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUjNvRjRJWUk2bU1HZ3I4dDhOWTZnV3RNb2VDaG1zd0F6clh2QXBYbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW5nZ3VuYS9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1716614909);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int NOT NULL,
  `id_kategori_barang` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga` bigint NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_kategori_barang`, `nama`, `satuan`, `harga`, `keterangan`) VALUES
(14, 1, 'Kemeja Flanel motif kotak kotak', 'Biji', 50000, 'Baju Flanel Laki - Laki'),
(15, 6, 'Polo Adem', 'Biji', 8000, NULL),
(17, 14, 'Blankon', 'Lusin', 25000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pengguna`
--

CREATE TABLE `tb_detail_pengguna` (
  `id_detail_pengguna` int NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `detail_alamat` text NOT NULL,
  `telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_detail_pengguna`
--

INSERT INTO `tb_detail_pengguna` (`id_detail_pengguna`, `provinsi`, `kota`, `kelurahan`, `detail_alamat`, `telepon`) VALUES
(1, 'jawa timur', 'blitar', 'ponggok', 'jl raya penataran', '123'),
(2, 'jawa timur', 'blitar', 'ponggok', 'jl raya penataran', '123'),
(3, 'fasfsdf', 'sadfsadf', 'asdfsaf', 'fsafasdf', 'asdfsadf'),
(7, 'Jawa Timur', 'Blitar', 'Ponggok', 'Jl Raya Penataran', '085123123123'),
(8, 'Jawa Timur', 'Blitar', 'Ponggok', 'Desa Sidorejo', '083'),
(9, 'Jawa Timur', 'Blitar', 'Ponggok', 'Jl Raya Penataran', '123123'),
(10, 'Jawa Timur', 'Blitar', 'Ponggok', 'Jl Raya Penataran', '08580988080u');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi_penjualan`
--

CREATE TABLE `tb_detail_transaksi_penjualan` (
  `id_detail_transaksi_penjualan` int NOT NULL,
  `id_barang` int NOT NULL,
  `jumlah` int NOT NULL,
  `total_harga` bigint NOT NULL,
  `id_transaksi_penjualan` int NOT NULL,
  `harga` bigint NOT NULL,
  `id_penukaran_poin` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_detail_transaksi_penjualan`
--

INSERT INTO `tb_detail_transaksi_penjualan` (`id_detail_transaksi_penjualan`, `id_barang`, `jumlah`, `total_harga`, `id_transaksi_penjualan`, `harga`, `id_penukaran_poin`) VALUES
(19, 17, 1, 25000, 45, 25000, NULL),
(20, 14, 1, 50000, 46, 50000, NULL),
(21, 14, 1, 50000, 47, 50000, NULL),
(22, 14, 1, 50000, 48, 50000, NULL),
(23, 15, 2, 16000, 48, 8000, NULL),
(24, 14, 3, 150000, 49, 50000, NULL),
(25, 15, 10, 80000, 49, 8000, NULL),
(26, 17, 1, 25000, 50, 25000, NULL),
(28, 14, 1, 50000, 52, 50000, NULL),
(29, 14, 1, 50000, 53, 50000, NULL),
(31, 15, 2, 16000, 55, 8000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_pembayaran`
--

CREATE TABLE `tb_jenis_pembayaran` (
  `id_jenis_pembayaran` int NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_jenis_pembayaran`
--

INSERT INTO `tb_jenis_pembayaran` (`id_jenis_pembayaran`, `jenis`) VALUES
(1, 'KREDIT'),
(2, 'TUNAI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_barang`
--

CREATE TABLE `tb_kategori_barang` (
  `id_kategori_barang` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kategori_barang`
--

INSERT INTO `tb_kategori_barang` (`id_kategori_barang`, `nama`) VALUES
(1, 'Baju Kemeja Laki-Laki'),
(2, 'Baju Kemeja Perempuan'),
(6, 'Baju Polo'),
(7, 'Baju Batik'),
(10, 'Baju Kaos'),
(14, 'Baju Tradisional'),
(15, 'Aksesoris Tangan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kritik_dan_saran`
--

CREATE TABLE `tb_kritik_dan_saran` (
  `id_kritik_dan_saran` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `saran_kritik` text NOT NULL,
  `tanggal_submit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kritik_dan_saran`
--

INSERT INTO `tb_kritik_dan_saran` (`id_kritik_dan_saran`, `id_pengguna`, `saran_kritik`, `tanggal_submit`) VALUES
(1, 1, 'Wau aplikasinya bagus', '2024-05-23 18:11:32'),
(3, 9, 'Aplikasinya Mantap', '2024-05-25 10:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_tukar_poin`
--

CREATE TABLE `tb_nilai_tukar_poin` (
  `id_nilai_tukar_poin` int NOT NULL,
  `nilai_tukar` int NOT NULL,
  `tanggal_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_nilai_tukar_poin`
--

INSERT INTO `tb_nilai_tukar_poin` (`id_nilai_tukar_poin`, `nilai_tukar`, `tanggal_dibuat`) VALUES
(1, 1, '2024-05-24 03:18:44'),
(2, 10, '2024-05-25 04:09:02'),
(3, 10, '2024-05-25 04:09:14'),
(4, 10, '2024-05-25 04:09:19'),
(5, 10, '2024-05-25 04:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `id_detail_pengguna` int DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `email`, `password`, `role`, `id_detail_pengguna`, `remember_token`) VALUES
(1, 'coba', 'coba@gmail.com', '$2y$12$Jm5Cygp6s1jQGk/zzfN7/.w/6oOGjahEAUeHo/S6astxSLjsNObg2', 'Admin', NULL, NULL),
(2, 'Mas Budi', 'pelanggan@mail.com', 'ksadflkasjlfjsajflksjadflkj', 'Pelanggan', 1, NULL),
(4, 'Joko', 'joko@gmail.com', 'lkasjfklasjfdlkj', 'Pelanggan', 2, NULL),
(8, 'Bagus', 'bagus@gmail.com', '$2y$12$gvPQJUhM4ymq1RV8x4AmIuxT3/06Gl/VFNFYDSEA2h56ecooO7x2u', 'Distributor', 7, NULL),
(9, 'Mas Joko', 'pelanggan@gmail.com', '$2y$12$gVkgri6rWrxO/Ofxl9EbQuXKa63rdpGtxNDy9hq7ym.4YXRw23JzC', 'Pelanggan', 8, NULL),
(10, 'Bambang Konsumen', 'konsumen@gmail.com', '$2y$12$Zt.L8.ZPKK0pKppRJHwPAuPYnaN8xQAsfYMBJ7mPmMzxYeCe1hWbG', 'Pelanggan', 9, NULL),
(11, 'Joko', 'joko@mail.com', '$2y$12$wAO.wRv2jm1noXQglPLTZOi/uVmot4o3SG9nkPnUBdaSK3Oe6a.Xq', 'Konsumen', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penukaran_poin`
--

CREATE TABLE `tb_penukaran_poin` (
  `id_penukaran_poin` int NOT NULL,
  `id_nilai_tukar_poin` int NOT NULL,
  `tanggal_penukaran` datetime NOT NULL,
  `jumlah_poin_ditukar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_penukaran_poin`
--

INSERT INTO `tb_penukaran_poin` (`id_penukaran_poin`, `id_nilai_tukar_poin`, `tanggal_penukaran`, `jumlah_poin_ditukar`) VALUES
(11, 1, '2024-05-24 20:47:45', 0),
(12, 5, '2024-05-25 11:39:17', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_poin`
--

CREATE TABLE `tb_poin` (
  `id_poin` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `jumlah_poin` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_poin`
--

INSERT INTO `tb_poin` (`id_poin`, `id_pelanggan`, `jumlah_poin`) VALUES
(1, 2, 0),
(2, 9, 20),
(3, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_penjualan`
--

CREATE TABLE `tb_transaksi_penjualan` (
  `id_transaksi_penjualan` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `id_jenis_pembayaran` int NOT NULL,
  `id_distributor` int NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `nominal_pembayaran` bigint NOT NULL,
  `nominal_kembalian` bigint NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `nominal_total` bigint NOT NULL,
  `id_penukaran_poin` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_transaksi_penjualan`
--

INSERT INTO `tb_transaksi_penjualan` (`id_transaksi_penjualan`, `id_pengguna`, `id_jenis_pembayaran`, `id_distributor`, `tanggal_transaksi`, `nominal_pembayaran`, `nominal_kembalian`, `status`, `nominal_total`, `id_penukaran_poin`) VALUES
(45, 4, 1, 8, '2024-05-24 20:47:18', 100000, 75000, 'DIBUAT', 25000, NULL),
(46, 2, 1, 8, '2024-05-24 20:47:45', 100000, 50000, 'DI_DISTRIBUSIKAN', 50000, 11),
(47, 2, 1, 8, '2024-05-25 04:52:38', 100000, 50000, 'SELESAI', 50000, NULL),
(48, 4, 1, 8, '2024-05-25 10:04:05', 200000, 134000, 'DIBUAT', 66000, NULL),
(49, 9, 1, 8, '2024-05-25 10:04:53', 2000000, 1770000, 'DIBUAT', 230000, NULL),
(50, 9, 1, 8, '2024-05-25 11:39:17', 100000, 85000, 'DIBUAT', 25000, 12),
(52, 9, 1, 8, '2024-05-25 12:02:17', 100000, 50000, 'DIBUAT', 50000, NULL),
(53, 9, 1, 8, '2024-05-25 12:02:34', 100000, 50000, 'DIBUAT', 50000, NULL),
(55, 10, 1, 8, '2024-05-25 12:10:13', 20000, 4000, 'DI_DISTRIBUSIKAN', 16000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori_barang` (`id_kategori_barang`);

--
-- Indexes for table `tb_detail_pengguna`
--
ALTER TABLE `tb_detail_pengguna`
  ADD PRIMARY KEY (`id_detail_pengguna`);

--
-- Indexes for table `tb_detail_transaksi_penjualan`
--
ALTER TABLE `tb_detail_transaksi_penjualan`
  ADD PRIMARY KEY (`id_detail_transaksi_penjualan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `tb_detail_transaksi_penjualan_ibfk_1` (`id_transaksi_penjualan`);

--
-- Indexes for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indexes for table `tb_kategori_barang`
--
ALTER TABLE `tb_kategori_barang`
  ADD PRIMARY KEY (`id_kategori_barang`);

--
-- Indexes for table `tb_kritik_dan_saran`
--
ALTER TABLE `tb_kritik_dan_saran`
  ADD PRIMARY KEY (`id_kritik_dan_saran`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_nilai_tukar_poin`
--
ALTER TABLE `tb_nilai_tukar_poin`
  ADD PRIMARY KEY (`id_nilai_tukar_poin`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `tb_pengguna_ibfk_1` (`id_detail_pengguna`);

--
-- Indexes for table `tb_penukaran_poin`
--
ALTER TABLE `tb_penukaran_poin`
  ADD PRIMARY KEY (`id_penukaran_poin`),
  ADD KEY `id_nilai_tukar_poin` (`id_nilai_tukar_poin`);

--
-- Indexes for table `tb_poin`
--
ALTER TABLE `tb_poin`
  ADD PRIMARY KEY (`id_poin`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tb_transaksi_penjualan`
--
ALTER TABLE `tb_transaksi_penjualan`
  ADD PRIMARY KEY (`id_transaksi_penjualan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_jenis_pembayaran` (`id_jenis_pembayaran`),
  ADD KEY `id_distributor` (`id_distributor`),
  ADD KEY `tb_transaksi_penjualan_ibfk_4` (`id_penukaran_poin`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_detail_pengguna`
--
ALTER TABLE `tb_detail_pengguna`
  MODIFY `id_detail_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_detail_transaksi_penjualan`
--
ALTER TABLE `tb_detail_transaksi_penjualan`
  MODIFY `id_detail_transaksi_penjualan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kategori_barang`
--
ALTER TABLE `tb_kategori_barang`
  MODIFY `id_kategori_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_kritik_dan_saran`
--
ALTER TABLE `tb_kritik_dan_saran`
  MODIFY `id_kritik_dan_saran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_nilai_tukar_poin`
--
ALTER TABLE `tb_nilai_tukar_poin`
  MODIFY `id_nilai_tukar_poin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_penukaran_poin`
--
ALTER TABLE `tb_penukaran_poin`
  MODIFY `id_penukaran_poin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_poin`
--
ALTER TABLE `tb_poin`
  MODIFY `id_poin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi_penjualan`
--
ALTER TABLE `tb_transaksi_penjualan`
  MODIFY `id_transaksi_penjualan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_kategori_barang`) REFERENCES `tb_kategori_barang` (`id_kategori_barang`);

--
-- Constraints for table `tb_detail_transaksi_penjualan`
--
ALTER TABLE `tb_detail_transaksi_penjualan`
  ADD CONSTRAINT `tb_detail_transaksi_penjualan_ibfk_1` FOREIGN KEY (`id_transaksi_penjualan`) REFERENCES `tb_transaksi_penjualan` (`id_transaksi_penjualan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tb_detail_transaksi_penjualan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Constraints for table `tb_kritik_dan_saran`
--
ALTER TABLE `tb_kritik_dan_saran`
  ADD CONSTRAINT `tb_kritik_dan_saran_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`);

--
-- Constraints for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD CONSTRAINT `tb_pengguna_ibfk_1` FOREIGN KEY (`id_detail_pengguna`) REFERENCES `tb_detail_pengguna` (`id_detail_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penukaran_poin`
--
ALTER TABLE `tb_penukaran_poin`
  ADD CONSTRAINT `tb_penukaran_poin_ibfk_2` FOREIGN KEY (`id_nilai_tukar_poin`) REFERENCES `tb_nilai_tukar_poin` (`id_nilai_tukar_poin`);

--
-- Constraints for table `tb_poin`
--
ALTER TABLE `tb_poin`
  ADD CONSTRAINT `tb_poin_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pengguna` (`id_pengguna`);

--
-- Constraints for table `tb_transaksi_penjualan`
--
ALTER TABLE `tb_transaksi_penjualan`
  ADD CONSTRAINT `tb_transaksi_penjualan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`),
  ADD CONSTRAINT `tb_transaksi_penjualan_ibfk_2` FOREIGN KEY (`id_jenis_pembayaran`) REFERENCES `tb_jenis_pembayaran` (`id_jenis_pembayaran`),
  ADD CONSTRAINT `tb_transaksi_penjualan_ibfk_3` FOREIGN KEY (`id_distributor`) REFERENCES `tb_pengguna` (`id_pengguna`),
  ADD CONSTRAINT `tb_transaksi_penjualan_ibfk_4` FOREIGN KEY (`id_penukaran_poin`) REFERENCES `tb_penukaran_poin` (`id_penukaran_poin`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
