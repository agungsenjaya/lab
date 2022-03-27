-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Mar 2022 pada 15.18
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabangs`
--

CREATE TABLE `cabangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`map`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cabangs`
--

INSERT INTO `cabangs` (`id`, `name`, `kota`, `img`, `kode`, `alamat`, `map`, `created_at`, `updated_at`) VALUES
(1, 'bali united', 'KABUPATEN GARUT', NULL, 'f4e4dee0', 'jl cisaat utara dan sekitarnya', NULL, '2022-03-23 00:07:52', '2022-03-23 00:07:52'),
(2, 'persib bandung', 'KABUPATEN BANDUNG', NULL, '5f21b7b0', 'jl dua lipa utara', NULL, '2022-03-23 00:10:51', '2022-03-23 00:10:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cetaks`
--

CREATE TABLE `cetaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosas`
--

CREATE TABLE `diagnosas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `cabang_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `catatan` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diagnosas`
--

INSERT INTO `diagnosas` (`id`, `kode`, `dokter_id`, `data`, `cabang_id`, `pasien_id`, `user_id`, `catatan`, `pembayaran`, `created_at`, `updated_at`) VALUES
(1, '2b5eef80-abf3-11ec-845e-b394c87b660d', 3, '[\"[{\\\"id\\\":1,\\\"data\\\":{\\\"id\\\":1,\\\"judul\\\":\\\"Hemoglobin\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":null,\\\"content\\\":\\\"12 - 16 g\\/dl,14 - 18 f\\/dl\\\",\\\"created_at\\\":\\\"2021-10-16T16:18:04.000000Z\\\",\\\"updated_at\\\":\\\"2021-10-16T16:18:04.000000Z\\\"},\\\"nilai\\\":\\\"13\\\",\\\"price\\\":\\\"400.000\\\"},{\\\"id\\\":2,\\\"data\\\":{\\\"id\\\":2,\\\"judul\\\":\\\"Eritrosit\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":null,\\\"content\\\":\\\"4,0 - 5,5 juta \\/ ul 4,5 - 6,0 juta \\/ ul\\\",\\\"created_at\\\":\\\"2021-10-16T16:18:05.000000Z\\\",\\\"updated_at\\\":\\\"2021-10-16T16:18:05.000000Z\\\"},\\\"nilai\\\":\\\"5\\\",\\\"price\\\":\\\"30.000\\\"},{\\\"id\\\":3,\\\"data\\\":{\\\"id\\\":3,\\\"judul\\\":\\\"Leukosit\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":null,\\\"content\\\":\\\"Dewasa : 5.000 - 10.000, Bayi : 7.000 - 17.000 \\/ ul\\\",\\\"created_at\\\":\\\"2021-10-16T16:18:06.000000Z\\\",\\\"updated_at\\\":\\\"2021-10-16T16:18:06.000000Z\\\"},\\\"nilai\\\":\\\"6000\\\",\\\"price\\\":\\\"20.000\\\"},{\\\"id\\\":38,\\\"data\\\":{\\\"id\\\":38,\\\"judul\\\":\\\"SGOT\\\",\\\"formula_kat_id\\\":2,\\\"formula_sub_id\\\":4,\\\"sub_kat\\\":null,\\\"content\\\":\\\"< 31 U\\/L < 34 U\\/L\\\",\\\"created_at\\\":\\\"2021-10-16T16:18:41.000000Z\\\",\\\"updated_at\\\":\\\"2021-10-16T16:18:41.000000Z\\\"},\\\"nilai\\\":\\\"30\\\",\\\"price\\\":\\\"20.000\\\",\\\"anormali\\\":\\\"*\\\"},{\\\"id\\\":39,\\\"data\\\":{\\\"id\\\":39,\\\"judul\\\":\\\"SGPT\\\",\\\"formula_kat_id\\\":2,\\\"formula_sub_id\\\":4,\\\"sub_kat\\\":null,\\\"content\\\":\\\"< 36 U\\/L < 46 U\\/L\\\",\\\"created_at\\\":\\\"2021-10-16T16:18:42.000000Z\\\",\\\"updated_at\\\":\\\"2021-10-16T16:18:42.000000Z\\\"},\\\"nilai\\\":\\\"20\\\",\\\"price\\\":\\\"12.000\\\",\\\"anormali\\\":\\\"*\\\"}]\"]', 1, 1, 3, NULL, ' 482.000', '2022-03-24 21:22:23', '2022-03-24 21:22:23'),
(2, '12957b60-ac42-11ec-a9a7-91f6adea2cba', 3, '[\"[{\\\"id\\\":2,\\\"data\\\":{\\\"id\\\":2,\\\"judul\\\":\\\"Eritrosit\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":null,\\\"content\\\":\\\"4,0 - 5,5 juta \\/ ul 4,5 - 6,0 juta \\/ ul\\\",\\\"created_at\\\":\\\"2021-10-16T16:18:05.000000Z\\\",\\\"updated_at\\\":\\\"2021-10-16T16:18:05.000000Z\\\"},\\\"nilai\\\":\\\"4\\\",\\\"price\\\":\\\"30.000\\\"},{\\\"id\\\":1,\\\"data\\\":{\\\"id\\\":1,\\\"judul\\\":\\\"Hemoglobin\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":null,\\\"content\\\":\\\"12 - 16 g\\/dl,14 - 18 f\\/dl\\\",\\\"created_at\\\":\\\"2021-10-16T16:18:04.000000Z\\\",\\\"updated_at\\\":\\\"2021-10-16T16:18:04.000000Z\\\"},\\\"nilai\\\":\\\"13\\\",\\\"price\\\":\\\"400.000\\\"},{\\\"id\\\":38,\\\"data\\\":{\\\"id\\\":38,\\\"judul\\\":\\\"SGOT\\\",\\\"formula_kat_id\\\":2,\\\"formula_sub_id\\\":4,\\\"sub_kat\\\":null,\\\"content\\\":\\\"< 31 U\\/L < 34 U\\/L\\\",\\\"created_at\\\":\\\"2021-10-16T16:18:41.000000Z\\\",\\\"updated_at\\\":\\\"2021-10-16T16:18:41.000000Z\\\"},\\\"nilai\\\":\\\"30\\\",\\\"price\\\":\\\"20.000\\\"},{\\\"id\\\":39,\\\"data\\\":{\\\"id\\\":39,\\\"judul\\\":\\\"SGPT\\\",\\\"formula_kat_id\\\":2,\\\"formula_sub_id\\\":4,\\\"sub_kat\\\":null,\\\"content\\\":\\\"< 36 U\\/L < 46 U\\/L\\\",\\\"created_at\\\":\\\"2021-10-16T16:18:42.000000Z\\\",\\\"updated_at\\\":\\\"2021-10-16T16:18:42.000000Z\\\"},\\\"nilai\\\":\\\"38\\\",\\\"price\\\":\\\"12.000\\\"},{\\\"id\\\":40,\\\"data\\\":{\\\"id\\\":40,\\\"judul\\\":\\\"Gamma GT\\\",\\\"formula_kat_id\\\":2,\\\"formula_sub_id\\\":4,\\\"sub_kat\\\":null,\\\"content\\\":\\\"< 32 U\\/L < 50 U\\/L\\\",\\\"created_at\\\":\\\"2021-10-16T16:18:43.000000Z\\\",\\\"updated_at\\\":\\\"2021-10-16T16:18:43.000000Z\\\"},\\\"nilai\\\":\\\"60\\\",\\\"price\\\":\\\"30.000\\\",\\\"anormali\\\":\\\"*\\\"}]\"]', 1, 2, 3, NULL, ' 492.000', '2022-03-25 06:47:12', '2022-03-25 06:47:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokters`
--

CREATE TABLE `dokters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `specialist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cabang_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokters`
--

INSERT INTO `dokters` (`id`, `name`, `user_id`, `specialist`, `cabang_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'boyke', 2, 'umum', 1, NULL, NULL, NULL),
(2, 'elman', 2, 'gigi', 1, NULL, NULL, NULL),
(3, 'sarah', 2, 'jantung', 1, NULL, NULL, NULL),
(4, 'budi dalton', 2, NULL, 1, NULL, '2022-03-23 01:59:41', '2022-03-23 01:59:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `formulas`
--

CREATE TABLE `formulas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formula_kat_id` int(11) NOT NULL,
  `formula_sub_id` int(11) DEFAULT NULL,
  `sub_kat` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `formulas`
--

INSERT INTO `formulas` (`id`, `judul`, `formula_kat_id`, `formula_sub_id`, `sub_kat`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Hemoglobin', 1, NULL, NULL, '12 - 16 g/dl,14 - 18 f/dl', '2021-10-16 09:18:04', '2021-10-16 09:18:04'),
(2, 'Eritrosit', 1, NULL, NULL, '4,0 - 5,5 juta / ul 4,5 - 6,0 juta / ul', '2021-10-16 09:18:05', '2021-10-16 09:18:05'),
(3, 'Leukosit', 1, NULL, NULL, 'Dewasa : 5.000 - 10.000, Bayi : 7.000 - 17.000 / ul', '2021-10-16 09:18:06', '2021-10-16 09:18:06'),
(4, 'Hitung Jenis', 1, NULL, NULL, NULL, '2021-10-16 09:18:07', '2021-10-16 09:18:07'),
(5, 'Basofil', 1, NULL, 4, '0 - 1 %', '2021-10-16 09:18:08', '2021-10-16 09:18:08'),
(6, 'Eosinofil', 1, NULL, 4, '1 - 3 %', '2021-10-16 09:18:09', '2021-10-16 09:18:09'),
(7, 'N Batang', 1, NULL, 4, '2 - 6 %', '2021-10-16 09:18:10', '2021-10-16 09:18:10'),
(8, 'N Segmen', 1, NULL, 4, '50 - 70 %', '2021-10-16 09:18:11', '2021-10-16 09:18:11'),
(9, 'Limfosit', 1, NULL, 4, '20 - 40 %', '2021-10-16 09:18:12', '2021-10-16 09:18:12'),
(10, 'Monosit', 1, NULL, 4, '2 - 6 %', '2021-10-16 09:18:13', '2021-10-16 09:18:13'),
(11, 'LED', 1, NULL, NULL, '< 20 mm / 1 jam < 15 mm / 1 jam', '2021-10-16 09:18:14', '2021-10-16 09:18:14'),
(12, 'Trombosit', 1, NULL, NULL, '150.000 - 450.000 / ul', '2021-10-16 09:18:15', '2021-10-16 09:18:15'),
(13, 'Hematokrit', 1, NULL, NULL, '35 - 45 % 40 - 50 %', '2021-10-16 09:18:16', '2021-10-16 09:18:16'),
(14, 'Golongan Darah Rhesus', 1, NULL, NULL, NULL, '2021-10-16 09:18:17', '2021-10-16 09:18:17'),
(15, 'MCV', 1, NULL, NULL, '85 - 95 fL', '2021-10-16 09:18:18', '2021-10-16 09:18:18'),
(16, 'MCH', 1, NULL, NULL, '28 - 32 pg', '2021-10-16 09:18:19', '2021-10-16 09:18:19'),
(17, 'MCHC', 1, NULL, NULL, '32 - 36 %', '2021-10-16 09:18:20', '2021-10-16 09:18:20'),
(18, 'Jumlah Retikulosit', 1, NULL, NULL, 'Dewasa : 0,5 - 1,5 %,Bayi : 2 - 6 %', '2021-10-16 09:18:21', '2021-10-16 09:18:21'),
(19, 'Besi', 1, 1, NULL, '37 - 145 ug/dl 59 - 158 ug/dl', '2021-10-16 09:18:22', '2021-10-16 09:18:22'),
(20, 'Retikulosit', 1, 1, NULL, '0,2 - 2,0 %', '2021-10-16 09:18:23', '2021-10-16 09:18:23'),
(21, 'Morfologi Darah Tepi', 1, 1, NULL, NULL, '2021-10-16 09:18:24', '2021-10-16 09:18:24'),
(22, 'Ferriniti', 1, 1, NULL, '10 - 120 ng/ml 20 - 250 ng/ml', '2021-10-16 09:18:25', '2021-10-16 09:18:25'),
(23, 'Transferrin', 1, 1, NULL, NULL, '2021-10-16 09:18:26', '2021-10-16 09:18:26'),
(24, '.TIBC', 1, 1, NULL, '274 - 385 ug/dl', '2021-10-16 09:18:27', '2021-10-16 09:18:27'),
(25, 'MDT', 1, 1, NULL, NULL, '2021-10-16 09:18:28', '2021-10-16 09:18:28'),
(26, 'TIBC', 1, 1, NULL, '228 - 482 ug/dl', '2021-10-16 09:18:29', '2021-10-16 09:18:29'),
(27, 'ANA TEST', 1, 1, NULL, 'Negatif : < 20,Moderat Positif : 20 - 60', '2021-10-16 09:18:30', '2021-10-16 09:18:30'),
(28, 'Waktu Pendarahan (BT)', 1, 2, NULL, '1 - 3 menit / duke', '2021-10-16 09:18:31', '2021-10-16 09:18:31'),
(29, 'Waktu Pendarahan (CT)', 1, 2, NULL, '1 - 11 menit', '2021-10-16 09:18:32', '2021-10-16 09:18:32'),
(30, 'APPT', 1, 2, NULL, NULL, '2021-10-16 09:18:33', '2021-10-16 09:18:33'),
(31, 'Retraksi Bekuan', 1, 2, NULL, '11 - 15 detik', '2021-10-16 09:18:34', '2021-10-16 09:18:34'),
(32, 'Analisa Bekuan', 1, 2, NULL, NULL, '2021-10-16 09:18:35', '2021-10-16 09:18:35'),
(33, 'Hb Fetal', 1, 2, NULL, NULL, '2021-10-16 09:18:36', '2021-10-16 09:18:36'),
(34, 'Asam Kolat', 1, 3, NULL, NULL, '2021-10-16 09:18:37', '2021-10-16 09:18:37'),
(35, 'Microfilorid', 1, 3, NULL, NULL, '2021-10-16 09:18:38', '2021-10-16 09:18:38'),
(36, 'HB - Electroforesa', 1, 3, NULL, NULL, '2021-10-16 09:18:39', '2021-10-16 09:18:39'),
(37, 'Serum Iron', 1, 3, NULL, '59 - 158 ug/dl', '2021-10-16 09:18:40', '2021-10-16 09:18:40'),
(38, 'SGOT', 2, 4, NULL, '< 31 U/L < 34 U/L', '2021-10-16 09:18:41', '2021-10-16 09:18:41'),
(39, 'SGPT', 2, 4, NULL, '< 36 U/L < 46 U/L', '2021-10-16 09:18:42', '2021-10-16 09:18:42'),
(40, 'Gamma GT', 2, 4, NULL, '< 32 U/L < 50 U/L', '2021-10-16 09:18:43', '2021-10-16 09:18:43'),
(41, 'Fosfatesa Alkali', 2, 4, NULL, '< 98 U/L < 128 U/L', '2021-10-16 09:18:44', '2021-10-16 09:18:44'),
(42, 'Bilirubin Total', 2, 4, NULL, '< 1,10 mg/dl', '2021-10-16 09:18:45', '2021-10-16 09:18:45'),
(43, 'Bilirubin Direk', 2, 4, NULL, '< 0,25 mg/dl', '2021-10-16 09:18:46', '2021-10-16 09:18:46'),
(44, 'Bilirubin Indirek', 2, 4, NULL, '< 0,25 mg/dl', '2021-10-16 09:18:47', '2021-10-16 09:18:47'),
(45, 'Protein Total', 2, 4, NULL, '6,7 - 8,7 mg/dl', '2021-10-16 09:18:48', '2021-10-16 09:18:48'),
(46, 'Albumin', 2, 4, NULL, '3,5 - 5,0 mg/dl', '2021-10-16 09:18:49', '2021-10-16 09:18:49'),
(47, 'Globulin', 2, 4, NULL, NULL, '2021-10-16 09:18:50', '2021-10-16 09:18:50'),
(48, 'Glukosa Puasa*', 2, 5, NULL, '70 - 110 mg/dl', '2021-10-16 09:18:51', '2021-10-16 09:18:51'),
(49, 'Glukosa 2 jam PP', 2, 5, NULL, '< 140 mg/dl', '2021-10-16 09:18:52', '2021-10-16 09:18:52'),
(50, 'Glukosa Sewaktu', 2, 5, NULL, '< 180 mg/dl', '2021-10-16 09:18:53', '2021-10-16 09:18:53'),
(51, 'GTT*', 2, 5, NULL, NULL, '2021-10-16 09:18:54', '2021-10-16 09:18:54'),
(52, 'Hb A 1c', 2, 5, NULL, '< 6,5 %', '2021-10-16 09:18:55', '2021-10-16 09:18:55'),
(53, 'Cholesterol Total', 2, 6, NULL, '< 200 mg/dl', '2021-10-16 09:18:56', '2021-10-16 09:18:56'),
(54, 'Cholesterol LDL', 2, 6, NULL, '< 150 mg/dl', '2021-10-16 09:18:57', '2021-10-16 09:18:57'),
(55, 'Cholesterol HDL', 2, 6, NULL, '> 35 mg/dl', '2021-10-16 09:18:58', '2021-10-16 09:18:58'),
(56, 'Trigliserida', 2, 6, NULL, '< 200 mg/dl', '2021-10-16 09:18:59', '2021-10-16 09:18:59'),
(57, 'Apo A1*', 2, 6, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'CK', 2, 7, NULL, '< 167 U/L < 190 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'CK - MB', 2, 7, NULL, '< 25 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'LDH', 2, 7, NULL, '225 - 450 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'HsCRP', 2, 7, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Troponin - T', 2, 7, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Ureum', 2, 8, NULL, '20 - 50 mg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'Creatinin', 2, 8, NULL, '< 0.9 mg/dl < 1,1 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'Asam Urat*', 2, 8, NULL, '< 5,7 mg/dl < 7,0 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'Kalium', 2, 9, NULL, '3,6 - 5,5 mmol/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'Gas Darah', 2, 9, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'Natrium', 2, 9, NULL, '135 - 155 mmol/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'Chlorida', 2, 9, NULL, '95 - 115 mmol/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Calcium', 2, 9, NULL, '8,1 - 10,8 mmol/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'Magnesium', 2, 9, NULL, '1,9 - 2,5 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'Hitung Jumlah Sel', 2, 10, NULL, '5 - 7 Sel/mm3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'Protein Liquor', 2, 10, NULL, '15 - 40 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'Glukosa Liquor', 2, 10, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'Diff', 2, 10, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'Segmen', 2, 10, 75, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'Limfosit', 2, 10, 75, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'Amilase', 2, 10, NULL, '< 86 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'Lipase', 2, 10, NULL, '13 - 60 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'Widal', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'TO', 3, NULL, 80, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'TH', 3, NULL, 80, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'AH', 3, NULL, 80, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'BH', 3, NULL, 80, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'AO', 3, NULL, 80, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'BO', 3, NULL, 80, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'CO', 3, NULL, 80, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'CH', 3, NULL, 80, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Hepatitis', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'Anti HAV IgM', 3, NULL, NULL, 'Negatif : < 2,1 , Positif : > 2,1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'HBsAg Kualitatif', 3, NULL, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'HBsAg Kuantitatif', 3, NULL, NULL, 'Non Reaktif S/N : < 2 , Reaktif S/N : > 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'Anti HBsAg Kualitatif', 3, NULL, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'Anti HBsAg Kuantitatif', 3, NULL, NULL, 'Ab Reaktif > 10 mIu/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'HBeAg Kualitatif', 3, NULL, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'HBeAg Kuantitatif', 3, NULL, NULL, 'Negatif : Indeks < 0,1 , Positif : Indeks > 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'Anti HBeAg Kuantitatif', 3, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'Anti HCV Kualitatif', 3, NULL, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'Anti HBc Total', 3, NULL, NULL, 'Negatif : Indeks >= 1,4 , Positif : Indeks < 1,0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'Anti HAV Total', 3, NULL, NULL, 'Negatif : < 15 mIu/mL , Positif : > 20 mIu/mL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'Anti HBc IgM', 3, NULL, NULL, 'Negatif : Indeks < 0,80 , Positif : Indeks > 1,20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'Anti HAV', 3, NULL, NULL, 'Negatif : < 15 , Positif : > 15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'TORCH', 3, 11, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'Anti - Toxoplasma IgG', 3, 11, NULL, 'Negatif : Titer < 32 IU/ml , Positif : Titer > 32 IU/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'Anti - Toxoplasma IgM', 3, 11, NULL, 'Negatif : Indeks < 0,90 , Positif : Indeks > 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'Anti - Rubella IgG', 3, 11, NULL, 'Negatif : Titer < 15 , Positif : Titer > 15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'Anti - Rubella IgM', 3, 11, NULL, 'Negatif : Indeks < 0,90 , Positif : Indeks > 1,0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'Anti - CMV IgG', 3, 11, NULL, 'Negatif : Titer < 15 AU/ml , Positif : Titer > 15 AU/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'Anti - CMV IgM', 3, 11, NULL, 'Negatif Indeks < 0,40 , Positif Indeks >= 0,50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'Anti - HSV1 IgG', 3, 11, NULL, 'Negatif Indeks < 0,91 , Positif Indeks > 1,09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'Anti - HSV1 IgM', 3, 11, NULL, 'Negatif Indeks < 0,91 , Positif Indeks > 1,09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'Anti - HSV2 IgG', 3, 11, NULL, 'Negatif Indeks < 0,91 , Borderline Indeks > 0,919', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'Anti - HSV2 IgM', 3, 11, NULL, 'Negatif Indeks < 9 , Borderline Indeks : 9 - 11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'VDRL / RPR', 3, 12, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'TPHA', 3, 12, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'Anti - Chlamydia IgG', 3, 12, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'Anti - Chlamydia IgM', 3, 12, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'Chlamydia Ag', 3, 12, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'GO (Mikroskopik)', 3, 12, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'Anti - Dengue IgG', 3, 13, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'Anti - Dengue IgM', 3, 13, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'Anti - H. pylorii IgG (Rapid)', 3, 13, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'Anti - H. pylorii', 3, 13, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'Malaria (Mirkrosopik)', 3, 13, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'ICT Malaria PF', 3, 13, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'ICT Malaria PV', 3, 13, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'ICT Malaria', 3, 13, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'Anti - HIV', 3, 13, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'DENGUE NS-1', 3, 13, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'RF Kualitatif', 3, 14, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'RF Kuantitatif', 3, 14, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'ASTO Kualitatif', 3, 14, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'ASTO Kualitatif', 3, 14, NULL, '< 200 I.U/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'Anti HBsAg Kuantitatif', 3, 14, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'CRP Kualitatif', 3, 14, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'CRP Kuantitatif', 3, 14, NULL, '< 6 MG/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'ANA TEST', 3, 14, NULL, 'Negatif < 20 , Moderat Positif 20 - 60', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'Resistensi', 4, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'Pengecatan Gram', 4, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'Candida', 4, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'Diphteria', 4, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'Trichomonas', 4, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'Leuccocyt', 4, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'Secret Vagina', 4, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'Diplococus', 4, NULL, 144, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'Leukosit', 4, NULL, 144, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'Erytosit', 4, NULL, 144, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'Trichomonas', 4, NULL, 144, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'Candida', 4, NULL, 144, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'Gram Negatif', 4, NULL, 144, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'BTA (Microskopik)', 5, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'Anti - Tb (Rapid)', 5, NULL, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'ICT TB', 5, NULL, 152, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'TSHs', 6, 15, NULL, '0,4 - 6.0 uiu/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'T3 (Total)', 6, 15, NULL, '0,6 - 1,85 ng/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'T4 (Total)', 6, 15, NULL, '5,0 - 13,0 ug/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'Free T3', 6, 15, NULL, '4,00 - 8,30 pmol/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'Free T4', 6, 15, NULL, '1,4 - 4,2 ng/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'LH # Kualitatif', 6, 16, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'LH # Kuantitatif', 6, 16, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'FSH #', 6, 16, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'Prolactin', 6, 16, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'Beta hCG', 6, 16, NULL, '< 1 Minggu 5 - 50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'Testosteron', 6, 16, NULL, '3,0 - 10,6 ng/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'AFP Kualitatif', 6, 17, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'AFP Kuantitatif', 6, 17, NULL, '<= 7 ng/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'CEA Kualitatif', 6, 17, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'CEA Kuantitatif', 6, 17, NULL, '0 - 5,0 ng/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'CA 19-9', 6, 17, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'CA 72-4', 6, 17, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'CA 125', 6, 17, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'CA 15-3', 6, 17, NULL, '< 25 u/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'MCA', 6, 17, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'PSA Kualitatif', 6, 17, NULL, '< = 4 Ng/mL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'PSA Kuantitatif', 6, 17, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'Free PSA', 6, 17, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'SCC', 6, 17, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'LgE Total', 6, 18, NULL, 'Dewasa : < 100 IU/mL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'Eosiofil', 6, 18, NULL, '80 - 360', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'LgE Total', 6, 18, NULL, '>80', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'Urine Lengkap', 7, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'Aceton', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'Nitrit ', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'Berat Jenis', 7, NULL, 181, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'Bilirubin', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'Eritrosit', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'Glukosa', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'Keton', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'Leukosit', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'Nitrit ', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'Ph/Reaksi', 7, NULL, 181, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'Protein', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'Sediment - Bacteri', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'Sediment - Epitel ', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'Sediment - Eritrosit ', 7, NULL, 181, '0 - 1 Lpb', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'Sediment - Jamur', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'Sediment - Kristal', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'Sediment - Leukosit ', 7, NULL, 181, '3 -5/Lpb', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'Sediment - Silinder ', 7, NULL, 181, '0/Lpk', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'Sediment - Silinder Hilai', 7, NULL, 181, '0/Lpk', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'Urobilin', 7, NULL, 181, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'Urobilinogen', 7, NULL, 181, 'Normal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'Warna ', 7, NULL, 181, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'Kekeruhan', 7, NULL, 181, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'Tes Narkoba', 7, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'Amphetamin', 7, NULL, 205, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'Bonzodiazepin', 7, NULL, 205, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'Cocain', 7, NULL, 205, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'Marijuana', 7, NULL, 205, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'Methamphetamin', 7, NULL, 205, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'Morphin', 7, NULL, 205, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'Tes Kehamilan', 7, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'Urine Rutin', 7, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'Protein', 7, NULL, 213, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 'Reduksi', 7, NULL, 213, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'Feaces Lengkap', 7, 19, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'Amoeba', 7, 19, 216, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'Amylum', 7, 19, 216, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'Bau', 7, 19, 216, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'Benzidine Test', 7, 19, 216, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'Eritrosit', 7, 19, 216, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'Consistensi', 7, 19, 216, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'Lendir', 7, 19, 216, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'Leucosit', 7, 19, 216, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'Nanah', 7, 19, 216, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'Serat Tumbuhan', 7, 19, 216, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'Telur Cacing', 7, 19, 216, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'Darah', 7, 19, 216, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'Warna ', 7, 19, 216, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'Benzidin Test', 7, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'Feaces Rutin', 7, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'Eritrosit', 7, NULL, 231, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 'Konsistensi', 7, NULL, 231, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'Leukosit', 7, NULL, 231, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'Telur Cacing', 7, NULL, 231, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'Warna ', 7, NULL, 231, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'Analisa Sperma', 7, 20, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'Jumlah Eristrosit', 7, 20, 237, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 'Jumlah Leukosit', 7, 20, 237, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'Jumlah Total Sperma', 7, 20, 237, '20 - 200 Juta/cc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'Morfologi Abnormal', 7, 20, 237, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'Morfologi Normal', 7, 20, 237, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 'Mortilitas Aktif', 7, 20, 237, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'Mortilitas Mati', 7, 20, 237, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'Mortilitas Non Aktif', 7, 20, 237, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'Viskositas', 7, 20, 237, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'Volume', 7, 20, 237, '2 - 6 ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 'Waktu dikeluarkan', 7, 20, 237, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'Waktu depriksa', 7, 20, 237, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 'Warna ', 7, 20, 237, 'Homogen Putih Kelabu Keruh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 'Reduksi Urine', 7, 20, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 'Secret Vagina', 7, 20, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 'Protein Urine', 7, 20, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 'Tensi Darah', 7, 20, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 'Tensi Darah', 8, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formula_kats`
--

CREATE TABLE `formula_kats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `formula_kats`
--

INSERT INTO `formula_kats` (`id`, `judul`, `created_at`, `updated_at`) VALUES
(1, 'hematologi', '2021-10-16 09:18:04', '2021-10-16 09:18:04'),
(2, 'klinik kimia', '2021-10-16 09:18:05', '2021-10-16 09:18:05'),
(3, 'immuno serologi', '2021-10-16 09:18:06', '2021-10-16 09:18:06'),
(4, 'mikrobiologi', '2021-10-16 09:18:07', '2021-10-16 09:18:07'),
(5, 'tuberkulosis', '2021-10-16 09:18:08', '2021-10-16 09:18:08'),
(6, 'endokrinologi', '2021-10-16 09:18:09', '2021-10-16 09:18:09'),
(7, 'urinalisa', '2021-10-16 09:18:10', '2021-10-16 09:18:10'),
(8, 'tekanan darah', '2021-10-16 09:18:11', '2021-10-16 09:18:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formula_subs`
--

CREATE TABLE `formula_subs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `formula_subs`
--

INSERT INTO `formula_subs` (`id`, `judul`, `created_at`, `updated_at`) VALUES
(1, 'anemia', '2021-10-16 09:18:04', '2021-10-16 09:18:04'),
(2, 'koagulasi', '2021-10-16 09:18:05', '2021-10-16 09:18:05'),
(3, 'lain - lain hermatologi', '2021-10-16 09:18:06', '2021-10-16 09:18:06'),
(4, 'hati', '2021-10-16 09:18:07', '2021-10-16 09:18:07'),
(5, 'diabetes', '2021-10-16 09:18:08', '2021-10-16 09:18:08'),
(6, 'lemak', '2021-10-16 09:18:09', '2021-10-16 09:18:09'),
(7, 'jantung', '2021-10-16 09:18:10', '2021-10-16 09:18:10'),
(8, 'ginjal - hipertensi', '2021-10-16 09:18:11', '2021-10-16 09:18:11'),
(9, 'elektrolit - gas darah', '2021-10-16 09:18:12', '2021-10-16 09:18:12'),
(10, 'csf', '2021-10-16 09:18:13', '2021-10-16 09:18:13'),
(11, 'hepatitis', '2021-10-16 09:18:14', '2021-10-16 09:18:14'),
(12, 'torch', '2021-10-16 09:18:15', '2021-10-16 09:18:15'),
(13, 'phs', '2021-10-16 09:18:16', '2021-10-16 09:18:16'),
(14, 'infeksi lain', '2021-10-16 09:18:17', '2021-10-16 09:18:17'),
(15, 'imunologi lain', '2021-10-16 09:18:18', '2021-10-16 09:18:18'),
(16, 'tiroid', '2021-10-16 09:18:19', '2021-10-16 09:18:19'),
(17, 'reproduksi - gestasi', '2021-10-16 09:18:20', '2021-10-16 09:18:20'),
(18, 'penanda tumor', '2021-10-16 09:18:21', '2021-10-16 09:18:21'),
(19, 'alergi', '2021-10-16 09:18:22', '2021-10-16 09:18:22'),
(20, 'analisa faeces', '2021-10-16 09:18:23', '2021-10-16 09:18:23'),
(21, 'lain - lain urinalisa', '2021-10-16 09:18:24', '2021-10-16 09:18:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(48, '2014_10_12_100000_create_password_resets_table', 1),
(49, '2019_08_19_000000_create_failed_jobs_table', 1),
(50, '2021_09_16_030845_create_pasiens_table', 1),
(51, '2021_09_16_031128_create_diagnosas_table', 1),
(54, '2021_09_17_052338_create_formulas_table', 1),
(55, '2021_09_21_091600_laratrust_setup_tables', 1),
(56, '2021_12_24_133650_create_formula_kats_table', 1),
(57, '2021_12_24_133702_create_formula_subs_table', 1),
(58, '2021_12_25_052023_create_cetaks_table', 1),
(59, '2022_01_05_140636_create_prices_table', 1),
(60, '2014_10_12_000000_create_users_table', 2),
(61, '2021_09_16_041509_create_cabangs_table', 3),
(62, '2021_09_16_132925_create_dokters_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasiens`
--

CREATE TABLE `pasiens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` bigint(20) NOT NULL,
  `ktp` bigint(20) DEFAULT NULL,
  `kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasiens`
--

INSERT INTO `pasiens` (`id`, `name`, `tanggal_lahir`, `ktp`, `kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'agung senjaya', 27, 320, 'laki-laki', 'Jl. Engku Putri, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29444, Indonesia', '2022-03-24 21:22:23', '2022-03-24 21:22:23'),
(2, 'buri rahman', 18, NULL, 'laki-laki', 'Sukamulya, Kec. Tegalwaru, Kabupaten Purwakarta, Jawa Barat, Indonesia', '2022-03-25 06:47:12', '2022-03-25 06:47:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cabang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `formula_id` int(11) NOT NULL,
  `pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prices`
--

INSERT INTO `prices` (`id`, `cabang_id`, `user_id`, `formula_id`, `pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '400.000', '2022-03-16 03:32:20', '2022-03-16 03:32:20'),
(2, 1, 1, 2, '30.000', '2022-03-16 03:32:23', '2022-03-16 03:32:23'),
(3, 1, 1, 3, '20.000', '2022-03-16 03:32:25', '2022-03-16 03:32:25'),
(4, 1, 1, 4, '0', '2022-03-16 03:32:27', '2022-03-24 23:34:14'),
(5, 1, 1, 5, '14.000', '2022-03-16 03:32:31', '2022-03-16 03:32:31'),
(6, 1, 1, 6, '45.000', '2022-03-16 03:32:37', '2022-03-16 03:32:37'),
(7, 1, 1, 7, '12.000', '2022-03-16 03:32:40', '2022-03-16 03:32:40'),
(8, 1, 1, 8, '10.000', '2022-03-16 03:32:45', '2022-03-16 03:32:45'),
(9, 1, 1, 38, '20.000', '2022-03-16 03:34:43', '2022-03-16 03:34:43'),
(10, 1, 1, 39, '12.000', '2022-03-16 03:34:46', '2022-03-16 03:34:46'),
(11, 1, 1, 40, '30.000', '2022-03-16 03:34:48', '2022-03-23 02:05:14'),
(12, 1, 1, 41, '5.000', '2022-03-16 03:34:51', '2022-03-16 03:34:51'),
(13, 1, 1, 42, '3.000', '2022-03-21 00:49:17', '2022-03-21 00:49:47'),
(14, 1, 1, 43, '10.000', '2022-03-21 00:49:21', '2022-03-21 00:49:21'),
(15, 1, 1, 44, '10.000', '2022-03-21 00:50:01', '2022-03-21 00:50:01'),
(16, 1, 1, 45, '5.000', '2022-03-21 00:50:04', '2022-03-21 00:50:04'),
(17, 1, 1, 46, '40.000', '2022-03-23 02:05:01', '2022-03-23 02:05:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'Owner', NULL, '2022-03-22 04:36:59', '2022-03-22 04:36:59'),
(2, 'superadmin', 'Superadmin', NULL, '2022-03-22 04:36:59', '2022-03-22 04:36:59'),
(3, 'admin', 'Admin', NULL, '2022-03-22 04:36:59', '2022-03-22 04:36:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(3, 3, 'App\\User'),
(2, 4, 'App\\User'),
(3, 5, 'App\\User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `cabang_id`, `user_id`, `email`, `deleted_at`, `email_verified_at`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'owner', 1, 1, 'owner@sample.com', NULL, NULL, '$2y$10$WCE.kk4ZHw3IVZLaFxTlCuhSH7LiezYNcvER4K6nybkfpL5hvPHUm', NULL, NULL, '2022-03-22 04:36:59', '2022-03-22 04:36:59'),
(2, 'superadmin', 1, 1, 'super@sample.com', NULL, NULL, '$2y$10$h.lEog1ZC8sPpldDhpLJ2urCN78uYellThvxzh4tMFrCefkiVjS0y', NULL, NULL, '2022-03-22 04:36:59', '2022-03-22 04:36:59'),
(3, 'admin', 1, 2, 'admin@sample.com', NULL, NULL, '$2y$10$ZmMdkjK35Otv9xSDtI42ped4Hy6UdgxuOwcb9SFgRPlruBYfpQ/GG', NULL, NULL, '2022-03-22 04:37:00', '2022-03-22 04:37:00'),
(4, 'budi ramayana', 2, 1, 'budi@sample.com', NULL, NULL, '$2y$10$W/bkHBfH4qHZ1POm5OQUSuh6OogQLEhXCvY8NZJPV.nHkHUkDpbW.', NULL, NULL, '2022-03-23 00:43:14', '2022-03-23 01:06:36'),
(5, 'cinta luna', 1, 2, 'cinta@sample.com', NULL, NULL, '$2y$10$09MD8bLY9ZrqcJkKIWrAwOB3uRi1YZqT5BIkIkpFf/Cgr5cbPOrcy', NULL, NULL, '2022-03-23 02:20:57', '2022-03-23 02:20:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cabangs`
--
ALTER TABLE `cabangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cetaks`
--
ALTER TABLE `cetaks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `diagnosas`
--
ALTER TABLE `diagnosas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `formulas`
--
ALTER TABLE `formulas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `formula_kats`
--
ALTER TABLE `formula_kats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `formula_subs`
--
ALTER TABLE `formula_subs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indeks untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indeks untuk tabel `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cabangs`
--
ALTER TABLE `cabangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cetaks`
--
ALTER TABLE `cetaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `diagnosas`
--
ALTER TABLE `diagnosas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `formulas`
--
ALTER TABLE `formulas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT untuk tabel `formula_kats`
--
ALTER TABLE `formula_kats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `formula_subs`
--
ALTER TABLE `formula_subs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
