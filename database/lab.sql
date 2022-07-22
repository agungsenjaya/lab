-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2022 at 03:20 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

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
-- Table structure for table `cabangs`
--

CREATE TABLE `cabangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cabangs`
--

INSERT INTO `cabangs` (`id`, `name`, `kota`, `img`, `kode`, `alamat`, `map`, `created_at`, `updated_at`) VALUES
(1, 'bali united', 'KABUPATEN GARUT', NULL, 'f4e4dee0', 'jl cisaat utara dan sekitarnya', NULL, '2022-03-23 00:07:52', '2022-03-23 00:07:52'),
(2, 'persib bandung', 'KABUPATEN BANDUNG', NULL, '5f21b7b0', 'jl dua lipa utara', NULL, '2022-03-23 00:10:51', '2022-03-23 00:10:51'),
(3, 'klinik permata', 'KABUPATEN SUKABUMI', NULL, '2205fd80', 'kec. gunungpuyuh\r\nkabupaten sukabumi\r\njawa barat\r\nindonesia', NULL, '2022-07-20 05:45:16', '2022-07-20 05:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `cetaks`
--

CREATE TABLE `cetaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diagnosa_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cetaks`
--

INSERT INTO `cetaks` (`id`, `diagnosa_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '2022-05-05 07:14:08', '2022-05-05 07:14:08'),
(7, 3, 3, '2022-05-05 08:08:33', '2022-05-05 08:08:33'),
(8, 3, 3, '2022-05-05 08:34:53', '2022-05-05 08:34:53'),
(9, 3, 3, '2022-05-19 04:05:30', '2022-05-19 04:05:30'),
(10, 3, 3, '2022-05-19 04:06:10', '2022-05-19 04:06:10'),
(11, 3, 3, '2022-05-20 03:02:40', '2022-05-20 03:02:40'),
(12, 3, 3, '2022-05-20 03:14:57', '2022-05-20 03:14:57'),
(13, 3, 3, '2022-05-20 06:21:56', '2022-05-20 06:21:56'),
(14, 3, 3, '2022-05-20 06:22:07', '2022-05-20 06:22:07'),
(15, 3, 3, '2022-05-20 06:24:38', '2022-05-20 06:24:38'),
(16, 3, 3, '2022-06-15 19:23:41', '2022-06-15 19:23:41'),
(17, 3, 3, '2022-06-15 19:25:51', '2022-06-15 19:25:51'),
(18, 4, 3, '2022-06-20 23:21:14', '2022-06-20 23:21:14'),
(19, 4, 3, '2022-06-20 23:22:53', '2022-06-20 23:22:53'),
(20, 5, 3, '2022-07-19 15:17:48', '2022-07-19 15:17:48'),
(21, 5, 3, '2022-07-19 15:18:18', '2022-07-19 15:18:18'),
(22, 4, 3, '2022-07-19 15:19:41', '2022-07-19 15:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosas`
--

CREATE TABLE `diagnosas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `cabang_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `catatan` longtext COLLATE utf8mb4_unicode_ci,
  `pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosas`
--

INSERT INTO `diagnosas` (`id`, `kode`, `dokter_id`, `data`, `cabang_id`, `pasien_id`, `user_id`, `catatan`, `pembayaran`, `created_at`, `updated_at`) VALUES
(1, '4a5ee590-0840-11ed-b987-337ea7d7ee56', 3, '[\"[{\\\"id\\\":1,\\\"data\\\":{\\\"id\\\":1,\\\"judul\\\":\\\"Hemoglobin\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":null,\\\"content\\\":\\\"14 - 18 f\\/dl\\\",\\\"created_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"updated_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"content_ori\\\":\\\"12 - 16 g\\/dl,14 - 18 f\\/dl\\\"},\\\"nilai\\\":\\\"13\\\",\\\"price\\\":\\\"20.000\\\"},{\\\"id\\\":2,\\\"data\\\":{\\\"id\\\":2,\\\"judul\\\":\\\"Eritrosit\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":null,\\\"content\\\":\\\"4,5 - 6,0 juta \\/ ul\\\",\\\"created_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"updated_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"content_ori\\\":\\\"4,0 - 5,5 juta \\/ ul 4,5 - 6,0 juta \\/ ul\\\"},\\\"nilai\\\":\\\"4\\\",\\\"price\\\":\\\"15.000\\\"},{\\\"id\\\":3,\\\"data\\\":{\\\"id\\\":3,\\\"judul\\\":\\\"Leukosit\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":null,\\\"content\\\":\\\"Dewasa : 5.000 - 10.000\\\",\\\"created_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"updated_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"content_ori\\\":\\\"Dewasa : 5.000 - 10.000, Bayi : 7.000 - 17.000 \\/ ul\\\"},\\\"nilai\\\":\\\"5000\\\",\\\"price\\\":\\\"30.000\\\"},{\\\"id\\\":4,\\\"data\\\":{\\\"id\\\":4,\\\"judul\\\":\\\"Hitung Jenis\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":null,\\\"content\\\":\\\"-\\\",\\\"created_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"updated_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"content_ori\\\":\\\"-\\\"},\\\"nilai\\\":\\\"-\\\",\\\"price\\\":\\\"56.000\\\"},{\\\"id\\\":5,\\\"sub_kat\\\":4,\\\"data\\\":{\\\"id\\\":5,\\\"judul\\\":\\\"Basofil\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":4,\\\"content\\\":\\\"0 - 1 %\\\",\\\"created_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"updated_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"content_ori\\\":\\\"0 - 1 %\\\"},\\\"nilai\\\":\\\"2\\\",\\\"price\\\":\\\"0\\\",\\\"anormali\\\":\\\"*\\\"},{\\\"id\\\":6,\\\"sub_kat\\\":4,\\\"data\\\":{\\\"id\\\":6,\\\"judul\\\":\\\"Eosinofil\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":4,\\\"content\\\":\\\"1 - 3 %\\\",\\\"created_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"updated_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"content_ori\\\":\\\"1 - 3 %\\\"},\\\"nilai\\\":\\\"1\\\",\\\"price\\\":\\\"0\\\"},{\\\"id\\\":7,\\\"sub_kat\\\":4,\\\"data\\\":{\\\"id\\\":7,\\\"judul\\\":\\\"N Batang\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":4,\\\"content\\\":\\\"2 - 6 %\\\",\\\"created_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"updated_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"content_ori\\\":\\\"2 - 6 %\\\"},\\\"nilai\\\":\\\"1\\\",\\\"price\\\":\\\"0\\\",\\\"anormali\\\":\\\"*\\\"},{\\\"id\\\":8,\\\"sub_kat\\\":4,\\\"data\\\":{\\\"id\\\":8,\\\"judul\\\":\\\"N Segmen\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":4,\\\"content\\\":\\\"50 - 70 %\\\",\\\"created_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"updated_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"content_ori\\\":\\\"50 - 70 %\\\"},\\\"nilai\\\":\\\"10\\\",\\\"price\\\":\\\"0\\\",\\\"anormali\\\":\\\"*\\\"},{\\\"id\\\":9,\\\"sub_kat\\\":4,\\\"data\\\":{\\\"id\\\":9,\\\"judul\\\":\\\"Limfosit\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":4,\\\"content\\\":\\\"20 - 40 %\\\",\\\"created_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"updated_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"content_ori\\\":\\\"20 - 40 %\\\"},\\\"nilai\\\":\\\"30\\\",\\\"price\\\":\\\"0\\\"},{\\\"id\\\":10,\\\"sub_kat\\\":4,\\\"data\\\":{\\\"id\\\":10,\\\"judul\\\":\\\"Monosit\\\",\\\"formula_kat_id\\\":1,\\\"formula_sub_id\\\":null,\\\"sub_kat\\\":4,\\\"content\\\":\\\"2 - 6 %\\\",\\\"created_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"updated_at\\\":\\\"-000001-11-29T16:52:48.000000Z\\\",\\\"content_ori\\\":\\\"2 - 6 %\\\"},\\\"nilai\\\":\\\"3\\\",\\\"price\\\":\\\"0\\\"}]\"]', 1, 10, 3, NULL, ' 121.000', '2022-07-20 15:26:13', '2022-07-20 15:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
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
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id`, `name`, `user_id`, `specialist`, `cabang_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'boyke', 2, 'umum', 1, NULL, NULL, NULL),
(2, 'elman', 2, 'gigi', 1, NULL, NULL, NULL),
(3, 'sarah', 2, 'jantung', 1, NULL, NULL, NULL),
(4, 'budi dalton', 2, NULL, 1, NULL, '2022-03-23 01:59:41', '2022-03-23 01:59:41'),
(5, 'rayan', 2, NULL, 1, NULL, '2022-04-15 19:42:25', '2022-04-15 19:42:25'),
(6, 'dr hena', 6, NULL, 3, NULL, '2022-07-20 05:49:38', '2022-07-20 05:49:38'),
(7, 'dr kuaci', 6, NULL, 3, NULL, '2022-07-20 05:52:45', '2022-07-20 05:52:45');

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
-- Table structure for table `formulas`
--

CREATE TABLE `formulas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formula_kat_id` int(11) NOT NULL,
  `formula_sub_id` int(11) DEFAULT NULL,
  `sub_kat` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formulas`
--

INSERT INTO `formulas` (`id`, `judul`, `formula_kat_id`, `formula_sub_id`, `sub_kat`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Hemoglobin', 1, NULL, NULL, 'L :14 - 18 f/dlP :12 - 16 g/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:07'),
(2, 'Eritrosit', 1, NULL, NULL, 'L :4,5 - 6,0 juta / ulP :4,0 - 5,5 juta / ul', '0000-00-00 00:00:00', '2022-07-22 02:24:07'),
(3, 'Leukosit', 1, NULL, NULL, 'L :4,5 - 6,0 juta / ulP :4,0 - 5,5 juta / ul', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(4, 'Hitung Jenis', 1, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Basofil', 1, NULL, 4, 'L :4,5 - 6,0 juta / ulP :4,0 - 5,5 juta / ul', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(6, 'Eosinofil', 1, NULL, 4, 'L :4,5 - 6,0 juta / ulP :4,0 - 5,5 juta / ul', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(7, 'N Batang', 1, NULL, 4, 'L :4,5 - 6,0 juta / ulP :4,0 - 5,5 juta / ul', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(8, 'N Segmen', 1, NULL, 4, 'L :4,5 - 6,0 juta / ulP :4,0 - 5,5 juta / ul', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(9, 'Limfosit', 1, NULL, 4, 'L :4,5 - 6,0 juta / ulP :4,0 - 5,5 juta / ul', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(10, 'Monosit', 1, NULL, 4, 'L :4,5 - 6,0 juta / ulP :4,0 - 5,5 juta / ul', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(11, 'LED', 1, NULL, NULL, 'L :< 15 mm / 1 jamP :< 20 mm / 1 jam', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(12, 'Trombosit', 1, NULL, NULL, 'L :< 15 mm / 1 jamP :< 20 mm / 1 jam', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(13, 'Hematokrit', 1, NULL, NULL, 'L :40 - 50 %P :35 - 45 %', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(14, 'Golongan Darah Rhesus', 1, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'MCV', 1, NULL, NULL, 'L :40 - 50 %P :35 - 45 %', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(16, 'MCH', 1, NULL, NULL, 'L :40 - 50 %P :35 - 45 %', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(17, 'MCHC', 1, NULL, NULL, 'L :40 - 50 %P :35 - 45 %', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(18, 'Jumlah Retikulosit', 1, NULL, NULL, 'L :40 - 50 %P :35 - 45 %', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(19, 'Besi', 1, 1, NULL, 'L :59 - 158 ug/dlP :37 - 145 ug/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(20, 'Retikulosit', 1, 1, NULL, 'L :59 - 158 ug/dlP :37 - 145 ug/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(21, 'Morfologi Darah Tepi', 1, 1, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Ferriniti', 1, 1, NULL, 'L :20 - 250 ng/mlP :10 - 120 ng/ml', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(23, 'Transferrin', 1, 1, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '.TIBC', 1, 1, NULL, 'L :20 - 250 ng/mlP :10 - 120 ng/ml', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(25, 'MDT', 1, 1, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'TIBC', 1, 1, NULL, 'L :20 - 250 ng/mlP :10 - 120 ng/ml', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(27, 'ANA TEST', 1, 1, NULL, 'L :20 - 250 ng/mlP :10 - 120 ng/ml', '0000-00-00 00:00:00', '2022-07-22 02:24:08'),
(28, 'Waktu Pendarahan (BT)', 1, 2, NULL, 'L :20 - 250 ng/mlP :10 - 120 ng/ml', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(29, 'Waktu Pendarahan (CT)', 1, 2, NULL, 'L :20 - 250 ng/mlP :10 - 120 ng/ml', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(30, 'APPT', 1, 2, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Retraksi Bekuan', 1, 2, NULL, 'L :20 - 250 ng/mlP :10 - 120 ng/ml', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(32, 'Analisa Bekuan', 1, 2, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Hb Fetal', 1, 2, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Asam Kolat', 1, 3, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Microfilorid', 1, 3, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'HB - Electroforesa', 1, 3, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Serum Iron', 1, 3, NULL, 'L :20 - 250 ng/mlP :10 - 120 ng/ml', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(38, 'SGOT', 2, 4, NULL, 'L :< 34 U/LP :< 31 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(39, 'SGPT', 2, 4, NULL, 'L :< 46 U/LP :< 36 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(40, 'Gamma GT', 2, 4, NULL, 'L :< 50 U/LP :< 32 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(41, 'Fosfatesa Alkali', 2, 4, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(42, 'Bilirubin Total', 2, 4, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(43, 'Bilirubin Direk', 2, 4, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(44, 'Bilirubin Indirek', 2, 4, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(45, 'Protein Total', 2, 4, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(46, 'Albumin', 2, 4, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(47, 'Globulin', 2, 4, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'Glukosa Puasa*', 2, 5, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(49, 'Glukosa 2 jam PP', 2, 5, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(50, 'Glukosa Sewaktu', 2, 5, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(51, 'GTT*', 2, 5, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Hb A 1c', 2, 5, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(53, 'Cholesterol Total', 2, 6, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(54, 'Cholesterol LDL', 2, 6, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(55, 'Cholesterol HDL', 2, 6, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(56, 'Trigliserida', 2, 6, NULL, 'L :< 128 U/LP :< 98 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(57, 'Apo A1*', 2, 6, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'CK', 2, 7, NULL, 'L :< 190 U/LP :< 167 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:09'),
(59, 'CK - MB', 2, 7, NULL, 'L :< 190 U/LP :< 167 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(60, 'LDH', 2, 7, NULL, 'L :< 190 U/LP :< 167 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(61, 'HsCRP', 2, 7, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Troponin - T', 2, 7, NULL, 'L :< 190 U/LP :< 167 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(63, 'Ureum', 2, 8, NULL, 'L :< 190 U/LP :< 167 U/L', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(64, 'Creatinin', 2, 8, NULL, 'L :< 1,1 mg/dlP :< 0.9 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(65, 'Asam Urat*', 2, 8, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(66, 'Kalium', 2, 9, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(67, 'Gas Darah', 2, 9, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'Natrium', 2, 9, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(69, 'Chlorida', 2, 9, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(70, 'Calcium', 2, 9, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(71, 'Magnesium', 2, 9, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(72, 'Hitung Jumlah Sel', 2, 10, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(73, 'Protein Liquor', 2, 10, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(74, 'Glukosa Liquor', 2, 10, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'Diff', 2, 10, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'Segmen', 2, 10, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'Limfosit', 2, 10, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'Amilase', 2, 10, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(79, 'Lipase', 2, 10, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(80, 'Widal', 3, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'TO', 3, NULL, 80, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(82, 'TH', 3, NULL, 80, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(83, 'AH', 3, NULL, 80, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(84, 'BH', 3, NULL, 80, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(85, 'AO', 3, NULL, 80, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(86, 'BO', 3, NULL, 80, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(87, 'CO', 3, NULL, 80, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(88, 'CH', 3, NULL, 80, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(89, 'Hepatitis', 3, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'Anti HAV IgM', 3, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:10'),
(91, 'HBsAg Kualitatif', 3, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(92, 'HBsAg Kuantitatif', 3, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(93, 'Anti HBsAg Kualitatif', 3, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(94, 'Anti HBsAg Kuantitatif', 3, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(95, 'HBeAg Kualitatif', 3, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(96, 'HBeAg Kuantitatif', 3, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(97, 'Anti HBeAg Kuantitatif', 3, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'Anti HCV Kualitatif', 3, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(99, 'Anti HBc Total', 3, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(100, 'Anti HAV Total', 3, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(101, 'Anti HBc IgM', 3, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(102, 'Anti HAV', 3, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(103, 'TORCH', 3, 11, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'Anti - Toxoplasma IgG', 3, 11, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(105, 'Anti - Toxoplasma IgM', 3, 11, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(106, 'Anti - Rubella IgG', 3, 11, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(107, 'Anti - Rubella IgM', 3, 11, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(108, 'Anti - CMV IgG', 3, 11, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(109, 'Anti - CMV IgM', 3, 11, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(110, 'Anti - HSV1 IgG', 3, 11, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(111, 'Anti - HSV1 IgM', 3, 11, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(112, 'Anti - HSV2 IgG', 3, 11, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(113, 'Anti - HSV2 IgM', 3, 11, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(114, 'VDRL / RPR', 3, 12, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(115, 'TPHA', 3, 12, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(116, 'Anti - Chlamydia IgG', 3, 12, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:11'),
(117, 'Anti - Chlamydia IgM', 3, 12, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(118, 'Chlamydia Ag', 3, 12, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(119, 'GO (Mikroskopik)', 3, 12, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(120, 'Anti - Dengue IgG', 3, 13, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(121, 'Anti - Dengue IgM', 3, 13, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(122, 'Anti - H. pylorii IgG (Rapid)', 3, 13, NULL, 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'Anti - H. pylorii', 3, 13, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'Malaria (Mirkrosopik)', 3, 13, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(125, 'ICT Malaria PF', 3, 13, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(126, 'ICT Malaria PV', 3, 13, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(127, 'ICT Malaria', 3, 13, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'Anti - HIV', 3, 13, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'DENGUE NS-1', 3, 13, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(130, 'RF Kualitatif', 3, 14, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(131, 'RF Kuantitatif', 3, 14, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(132, 'ASTO Kualitatif', 3, 14, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(133, 'ASTO Kualitatif', 3, 14, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(134, 'Anti HBsAg Kuantitatif', 3, 14, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'CRP Kualitatif', 3, 14, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(136, 'CRP Kuantitatif', 3, 14, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(137, 'ANA TEST', 3, 14, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(138, 'Resistensi', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'Pengecatan Gram', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'Candida', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'Diphteria', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'Trichomonas', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'Leuccocyt', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'Secret Vagina', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'Diplococus', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'Leukosit', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'Erytosit', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'Trichomonas', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'Candida', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'Gram Negatif', 4, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'BTA (Microskopik)', 5, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'Anti - Tb (Rapid)', 5, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(153, 'ICT TB', 5, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(154, 'TSHs', 6, 15, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:12'),
(155, 'T3 (Total)', 6, 15, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(156, 'T4 (Total)', 6, 15, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(157, 'Free T3', 6, 15, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(158, 'Free T4', 6, 15, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(159, 'LH # Kualitatif', 6, 16, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'LH # Kuantitatif', 6, 16, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'FSH #', 6, 16, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'Prolactin', 6, 16, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'Beta hCG', 6, 16, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(164, 'Testosteron', 6, 16, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(165, 'AFP Kualitatif', 6, 17, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(166, 'AFP Kuantitatif', 6, 17, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(167, 'CEA Kualitatif', 6, 17, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(168, 'CEA Kuantitatif', 6, 17, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(169, 'CA 19-9', 6, 17, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'CA 72-4', 6, 17, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'CA 125', 6, 17, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'CA 15-3', 6, 17, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(173, 'MCA', 6, 17, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'PSA Kualitatif', 6, 17, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(175, 'PSA Kuantitatif', 6, 17, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(176, 'Free PSA', 6, 17, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'SCC', 6, 17, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'LgE Total', 6, 18, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(179, 'Eosiofil', 6, 18, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(180, 'LgE', 6, 18, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(181, 'Urine Lengkap', 7, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'Aceton', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(183, 'Nitrit ', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(184, 'Berat Jenis', 7, NULL, 181, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'Bilirubin', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(186, 'Eritrosit', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(187, 'Glukosa', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(188, 'Keton', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(189, 'Leukosit', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(190, 'Nitrit ', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:13'),
(191, 'Ph/Reaksi', 7, NULL, 181, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'Protein', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(193, 'Sediment - Bacteri', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(194, 'Sediment - Epitel ', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(195, 'Sediment - Eritrosit ', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(196, 'Sediment - Jamur', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(197, 'Sediment - Kristal', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(198, 'Sediment - Leukosit ', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(199, 'Sediment - Silinder ', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(200, 'Sediment - Silinder Hilai', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(201, 'Urobilin', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(202, 'Urobilinogen', 7, NULL, 181, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(203, 'Warna ', 7, NULL, 181, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'Kekeruhan', 7, NULL, 181, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'Tes Narkoba', 7, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'Amphetamin', 7, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(207, 'Bonzodiazepin', 7, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(208, 'Cocain', 7, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(209, 'Marijuana', 7, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(210, 'Methamphetamin', 7, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(211, 'Morphin', 7, NULL, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(212, 'Tes Kehamilan', 7, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'Urine Rutin', 7, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'Protein', 7, NULL, 213, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(215, 'Reduksi', 7, NULL, 213, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(216, 'Feaces Lengkap', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'Amoeba', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'Amylum', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'Bau', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'Benzidine Test', 7, 19, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(221, 'Eritrosit', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'Consistensi', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'Lendir', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'Leucosit', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'Nanah', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'Serat Tumbuhan', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'Telur Cacing', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'Darah', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'Warna ', 7, 19, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'Benzidin Test', 7, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'Feaces Rutin', 7, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'Eritrosit', 7, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 'Konsistensi', 7, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'Leukosit', 7, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'Telur Cacing', 7, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'Warna ', 7, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'Analisa Sperma', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'Jumlah Eristrosit', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 'Jumlah Leukosit', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'Jumlah Total Sperma', 7, 20, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(241, 'Morfologi Abnormal', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'Morfologi Normal', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 'Mortilitas Aktif', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'Mortilitas Mati', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'Mortilitas Non Aktif', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'Viskositas', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'Volume', 7, 20, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(248, 'Waktu dikeluarkan', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'Waktu depriksa', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 'Warna ', 7, 20, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:14'),
(251, 'Reduksi Urine', 7, 20, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:15'),
(252, 'Secret Vagina', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 'Protein Urine', 7, 20, NULL, 'L :< 7,0 mg/dlP :< 5,7 mg/dl', '0000-00-00 00:00:00', '2022-07-22 02:24:15'),
(254, 'Tensi Darah', 7, 20, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 'Tensi Darah', 8, NULL, NULL, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `formula_kats`
--

CREATE TABLE `formula_kats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formula_kats`
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
-- Table structure for table `formula_subs`
--

CREATE TABLE `formula_subs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formula_subs`
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
(48, '2014_10_12_100000_create_password_resets_table', 1),
(49, '2019_08_19_000000_create_failed_jobs_table', 1),
(50, '2021_09_16_030845_create_pasiens_table', 1),
(51, '2021_09_16_031128_create_diagnosas_table', 1),
(54, '2021_09_17_052338_create_formulas_table', 1),
(55, '2021_09_21_091600_laratrust_setup_tables', 1),
(56, '2021_12_24_133650_create_formula_kats_table', 1),
(57, '2021_12_24_133702_create_formula_subs_table', 1),
(59, '2022_01_05_140636_create_prices_table', 1),
(60, '2014_10_12_000000_create_users_table', 2),
(61, '2021_09_16_041509_create_cabangs_table', 3),
(62, '2021_09_16_132925_create_dokters_table', 4),
(63, '2022_03_26_020756_create_pricings_table', 5),
(64, '2021_12_25_052023_create_cetaks_table', 6),
(65, '2022_04_19_093802_create_nilais_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `formula_id` int(11) NOT NULL,
  `kelamin` enum('laki-laki','laki-laki dewasa','laki-laki bayi','perempuan','perempuan dewasa','perempuan bayi','dewasa','bayi','all') COLLATE utf8mb4_unicode_ci NOT NULL,
  `normal` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id`, `formula_id`, `kelamin`, `normal`, `created_at`, `updated_at`) VALUES
(1, 1, 'perempuan', '12 - 16 g/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'laki-laki', '14 - 18 f/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 'perempuan', '4,0 - 5,5 juta / ul', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 'laki-laki', '4,5 - 6,0 juta / ul', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 3, 'dewasa', 'Dewasa : 5.000 - 10.000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 3, 'bayi', 'Bayi : 7.000 - 17.000 / ul', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 5, 'all', '0 - 1 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 6, 'all', '1 - 3 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 7, 'all', '2 - 6 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 8, 'all', '50 - 70 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 9, 'all', '20 - 40 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 10, 'all', '2 - 6 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 11, 'perempuan', '< 20 mm / 1 jam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 11, 'laki-laki', '< 15 mm / 1 jam', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 12, 'all', '150.000 - 450.000 / ul', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 13, 'perempuan', '35 - 45 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 13, 'laki-laki', '40 - 50 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 15, 'all', '85 - 95 fL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 16, 'all', '28 - 32 pg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 17, 'all', '32 - 36 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 18, 'dewasa', 'Dewasa : 0,5 - 1,5 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 18, 'bayi', 'Bayi : 2 - 6 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 19, 'perempuan', '37 - 145 ug/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 19, 'laki-laki', '59 - 158 ug/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 20, 'all', '0,2 - 2,0 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 22, 'perempuan', '10 - 120 ng/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 22, 'laki-laki', '20 - 250 ng/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 24, 'all', '274 - 385 ug/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 26, 'all', '228 - 482 ug/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 27, 'all', 'Negatif : < 20,Moderat Positif : 20 - 60', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 28, 'all', '1 - 3 menit / duke', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 29, 'all', '1 - 11 menit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 31, 'all', '11 - 15 detik', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 37, 'all', '59 - 158 ug/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 38, 'perempuan', '< 31 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 38, 'laki-laki', '< 34 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 39, 'perempuan', '< 36 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 39, 'laki-laki', '< 46 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 40, 'perempuan', '< 32 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 40, 'laki-laki', '< 50 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 41, 'perempuan', '< 98 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 41, 'laki-laki', '< 128 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 42, 'all', '< 1,10 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 43, 'all', '< 0,25 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 44, 'all', '< 0,25 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 45, 'all', '6,7 - 8,7 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 46, 'all', '3,5 - 5,0 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 48, 'all', '70 - 110 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 49, 'all', '< 140 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 50, 'all', '< 180 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 52, 'all', '< 6,5 %', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 53, 'all', '< 200 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 54, 'all', '< 150 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 55, 'all', '> 35 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 56, 'all', '< 200 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 58, 'perempuan', '< 167 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 58, 'laki-laki', '< 190 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 59, 'all', '< 25 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 60, 'all', '225 - 450 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 62, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 63, 'all', '20 - 50 mg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 64, 'perempuan', '< 0.9 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 64, 'laki-laki', '< 1,1 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 65, 'perempuan', '< 5,7 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 65, 'laki-laki', '< 7,0 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 66, 'all', '3,6 - 5,5 mmol/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 68, 'all', '135 - 155 mmol/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 69, 'all', '95 - 115 mmol/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 70, 'all', '8,1 - 10,8 mmol/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 71, 'all', '1,9 - 2,5 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 72, 'all', '5 - 7 Sel/mm3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 73, 'all', '15 - 40 mg/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 78, 'all', '< 86 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 79, 'all', '13 - 60 U/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 81, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 82, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 83, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 84, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 85, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 86, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 87, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 88, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 90, 'all', 'Negatif : < 2,1 , Positif : > 2,1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 91, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 92, 'all', 'Non Reaktif S/N : < 2 , Reaktif S/N : > 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 93, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 94, 'all', 'Ab Reaktif > 10 mIu/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 95, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 96, 'all', 'Negatif : Indeks < 0,1 , Positif : Indeks > 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 98, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 99, 'all', 'Negatif : Indeks >= 1,4 , Positif : Indeks < 1,0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 100, 'all', 'Negatif : < 15 mIu/mL , Positif : > 20 mIu/mL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 101, 'all', 'Negatif : Indeks < 0,80 , Positif : Indeks > 1,20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 102, 'all', 'Negatif : < 15 , Positif : > 15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 104, 'all', 'Negatif : Titer < 32 IU/ml , Positif : Titer > 32 IU/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 105, 'all', 'Negatif : Indeks < 0,90 , Positif : Indeks > 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 106, 'all', 'Negatif : Titer < 15 , Positif : Titer > 15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 107, 'all', 'Negatif : Indeks < 0,90 , Positif : Indeks > 1,0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 108, 'all', 'Negatif : Titer < 15 AU/ml , Positif : Titer > 15 AU/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 109, 'all', 'Negatif Indeks < 0,40 , Positif Indeks >= 0,50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 110, 'all', 'Negatif Indeks < 0,91 , Positif Indeks > 1,09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 111, 'all', 'Negatif Indeks < 0,91 , Positif Indeks > 1,09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 112, 'all', 'Negatif Indeks < 0,91 , Borderline Indeks > 0,919', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 113, 'all', 'Negatif Indeks < 9 , Borderline Indeks : 9 - 11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 114, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 115, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 116, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 117, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 118, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 119, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 120, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 121, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 124, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 125, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 126, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 129, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 130, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 131, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 132, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 133, 'all', '< 200 I.U/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 135, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 136, 'all', '< 6 MG/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 137, 'all', 'Negatif < 20 , Moderat Positif 20 - 60', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 152, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 153, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 154, 'all', '0,4 - 6.0 uiu/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 155, 'all', '0,6 - 1,85 ng/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 156, 'all', '5,0 - 13,0 ug/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 157, 'all', '4,00 - 8,30 pmol/L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 158, 'all', '1,4 - 4,2 ng/dl', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 163, 'all', '< 1 Minggu 5 - 50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 164, 'all', '3,0 - 10,6 ng/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 165, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 166, 'all', '<= 7 ng/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 167, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 168, 'all', '0 - 5,0 ng/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 172, 'all', '< 25 u/ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 174, 'all', '< = 4 Ng/mL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 175, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 178, 'dewasa', 'Dewasa : < 100 IU/mL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 179, 'all', '80 - 360', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 180, 'all', '>80', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 182, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 183, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 185, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 186, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 187, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 188, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 189, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 190, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 192, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 193, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 194, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 195, 'all', '0 - 1 Lpb', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 196, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 197, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 198, 'all', '3 -5/Lpb', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 199, 'all', '0/Lpk', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 200, 'all', '0/Lpk', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 201, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 202, 'all', 'Normal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 206, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 207, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 208, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 209, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 210, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 211, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 214, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 215, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 220, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 240, 'all', '20 - 200 Juta/cc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 247, 'all', '2 - 6 ml', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 250, 'all', 'Homogen Putih Kelabu Keruh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 251, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 253, 'all', 'Negatif', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
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
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `name`, `tanggal_lahir`, `ktp`, `kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'agung senjaya', 27, 320, 'laki-laki', 'Jl. Engku Putri, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29444, Indonesia', '2022-03-24 21:22:23', '2022-03-24 21:22:23'),
(2, 'buri rahman', 18, NULL, 'laki-laki', 'Sukamulya, Kec. Tegalwaru, Kabupaten Purwakarta, Jawa Barat, Indonesia', '2022-03-25 06:47:12', '2022-03-25 06:47:12'),
(3, 'udin sedunia', 30, 320320, 'laki-laki', 'Mangunsari Kec. Sidomukti Kota Salatiga Jawa Tengah 50721', '2022-04-11 08:52:54', '2022-04-11 08:52:54'),
(4, 'rabu senjaya', 20, 1234, 'laki-laki', 'Jl. Rumah Sakit No.01, Cikole, Kec. Cikole, Kota Sukabumi, Jawa Barat 43111', '2022-04-11 09:31:25', '2022-04-11 09:31:25'),
(5, 'radian hardi', 45, 1445, 'laki-laki', 'Mayofield Mall, JL. Simpang Tiga, Ramanuju, 42431 Cilegon, Indonesia, Ramanuju, Purwakarta, Cilegon City, Banten 42431', '2022-04-11 09:43:59', '2022-04-11 09:43:59'),
(6, 'yadi istana', 16, NULL, 'laki-laki', 'Mayofield Mall, JL. Simpang Tiga, Ramanuju, 42431 Cilegon, Indonesia, Ramanuju, Purwakarta, Cilegon City, Banten 42431', '2022-04-11 09:45:10', '2022-04-11 09:45:10'),
(7, 'rudi senjaya', 80, 555, 'laki-laki', 'Gunungparang, Cikole, Gunungparang, Kec. Cikole, Kota Sukabumi, Jawa Barat 43111', '2022-04-11 19:02:17', '2022-04-11 19:02:17'),
(8, 'santi wijaya', 25, 4455, 'perempuan', 'jalwdjakwdjawkldjalkwdawd', '2022-04-12 07:17:58', '2022-04-12 07:17:58'),
(9, 'muklis robinhood', 40, 16523, 'laki-laki', 'Karangtengah, Kec. Cibadak, Kabupaten Sukabumi, Jawa Barat 43351', '2022-04-14 20:32:22', '2022-04-14 20:32:22'),
(10, 'agung senjaya', 30, 12345, 'laki-laki', '3XV3+R5G, Jl. Subang Jaya-Selabintana, Sukajaya, Kec. Sukabumi, Kabupaten Sukabumi, Jawa Barat 43151, Indonesia', '2022-04-28 06:37:54', '2022-04-28 06:37:54'),
(11, 'sandi sandoro', 40, NULL, 'laki-laki', 'jl pelda re surayanta gg maruf rt 04 rw 04 kec citamiang kel nanggeleng kab sukabumi', '2022-06-20 23:20:41', '2022-06-20 23:20:41'),
(12, 'ihsan zaidi', 20, NULL, 'laki-laki', 'jl pelda re surayanta gg maruf rt 04 rw 04 kec citamiang kel nanggeleng kab sukabumi', '2022-06-22 22:46:39', '2022-06-22 22:46:39');

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
-- Table structure for table `permissions`
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
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
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
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `cabang_id`, `user_id`, `formula_id`, `pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '20.000', '2022-04-22 22:29:01', '2022-05-19 04:09:29'),
(2, 1, 1, 2, '15.000', '2022-04-22 22:29:04', '2022-04-22 22:29:04'),
(3, 1, 1, 3, '30.000', '2022-04-22 22:29:05', '2022-04-22 22:29:09'),
(4, 1, 1, 4, '56.000', '2022-04-22 22:29:14', '2022-04-22 23:07:30'),
(5, 1, 1, 6, '0', '2022-04-22 23:05:09', '2022-04-22 23:07:26'),
(6, 1, 1, 5, '0', '2022-04-22 23:07:31', '2022-04-22 23:07:31'),
(7, 1, 1, 7, '0', '2022-04-22 23:07:33', '2022-04-22 23:07:33'),
(8, 1, 1, 8, '0', '2022-04-22 23:07:35', '2022-04-22 23:07:35'),
(9, 1, 1, 9, '0', '2022-04-22 23:07:35', '2022-04-22 23:07:35'),
(10, 1, 1, 10, '0', '2022-04-22 23:07:37', '2022-04-22 23:07:37'),
(11, 1, 1, 11, '35.000', '2022-04-22 23:07:44', '2022-04-22 23:07:44'),
(12, 1, 1, 12, '15.000', '2022-04-22 23:07:46', '2022-04-22 23:07:46'),
(13, 1, 1, 38, '18.000', '2022-04-22 23:08:15', '2022-04-22 23:08:15'),
(14, 1, 1, 39, '12.000', '2022-04-22 23:08:17', '2022-04-22 23:08:17'),
(15, 1, 1, 40, '10.000', '2022-04-22 23:08:22', '2022-04-22 23:08:22'),
(16, 1, 1, 41, '12.000', '2022-04-22 23:08:25', '2022-04-22 23:08:25'),
(17, 1, 1, 42, '5.000', '2022-04-22 23:08:28', '2022-04-22 23:08:28'),
(18, 1, 1, 43, '7.000', '2022-04-22 23:08:31', '2022-04-22 23:08:31'),
(19, 1, 1, 13, '10.000', '2022-04-27 23:57:36', '2022-04-27 23:57:36'),
(20, 1, 1, 14, '5.000', '2022-04-27 23:58:06', '2022-04-27 23:58:06'),
(21, 1, 1, 15, '15.000', '2022-04-27 23:58:09', '2022-04-27 23:58:09'),
(22, 1, 1, 16, '10.000', '2022-04-27 23:58:14', '2022-04-27 23:58:14'),
(23, 1, 1, 44, '30.000', '2022-04-27 23:59:28', '2022-04-27 23:59:28'),
(24, 1, 1, 45, '10.000', '2022-04-27 23:59:32', '2022-04-27 23:59:32'),
(25, 1, 1, 46, '5.000', '2022-04-27 23:59:35', '2022-04-27 23:59:35'),
(26, 1, 1, 47, '5.000', '2022-04-27 23:59:37', '2022-04-27 23:59:37'),
(27, 1, 1, 80, '2.500', '2022-04-28 00:00:42', '2022-04-28 00:00:42'),
(28, 1, 1, 81, '3.000', '2022-04-28 00:00:48', '2022-04-28 00:00:48'),
(29, 1, 1, 82, '1.500', '2022-04-28 00:00:49', '2022-04-28 00:00:49'),
(30, 1, 1, 83, '14.000', '2022-04-28 00:00:49', '2022-04-28 00:00:49'),
(31, 1, 1, 84, '10.000', '2022-04-28 00:00:50', '2022-04-28 00:00:50'),
(32, 1, 1, 181, '75.000', '2022-05-05 05:45:29', '2022-05-05 05:45:29'),
(33, 1, 1, 182, '0', '2022-05-05 05:45:30', '2022-05-05 05:45:30'),
(34, 1, 1, 183, '0', '2022-05-05 05:45:31', '2022-05-05 05:45:31'),
(35, 1, 1, 184, '0', '2022-05-05 05:45:32', '2022-05-05 05:45:32'),
(36, 1, 1, 185, '0', '2022-05-05 05:45:34', '2022-05-05 05:45:34'),
(37, 1, 1, 186, '0', '2022-05-05 05:45:35', '2022-05-05 05:45:35'),
(38, 1, 1, 187, '0', '2022-05-05 05:45:36', '2022-05-05 05:45:36'),
(39, 1, 1, 188, '0', '2022-05-05 05:45:37', '2022-05-05 05:45:37'),
(40, 1, 1, 189, '0', '2022-05-05 05:45:37', '2022-05-05 05:45:37'),
(41, 1, 1, 190, '0', '2022-05-05 05:45:38', '2022-05-05 05:45:38'),
(42, 1, 1, 191, '0', '2022-05-05 05:45:40', '2022-05-05 05:45:40'),
(43, 1, 1, 192, '0', '2022-05-05 05:45:40', '2022-05-05 05:45:40'),
(44, 1, 1, 193, '0', '2022-05-05 05:45:41', '2022-05-05 05:45:41'),
(45, 1, 1, 194, '0', '2022-05-05 05:45:42', '2022-05-05 05:45:42'),
(46, 1, 1, 195, '0', '2022-05-05 05:45:43', '2022-05-05 05:45:43'),
(47, 1, 1, 196, '0', '2022-05-05 05:45:44', '2022-05-05 05:45:44'),
(48, 1, 1, 197, '0', '2022-05-05 05:45:44', '2022-05-05 05:45:44'),
(49, 1, 1, 198, '0', '2022-05-05 05:45:45', '2022-05-05 05:45:45'),
(50, 1, 1, 199, '0', '2022-05-05 05:45:46', '2022-05-05 05:45:46'),
(51, 1, 1, 200, '0', '2022-05-05 05:45:46', '2022-05-05 05:45:46'),
(52, 1, 1, 202, '0', '2022-05-05 05:45:47', '2022-05-05 05:45:47'),
(53, 1, 1, 204, '0', '2022-05-05 05:45:51', '2022-05-05 05:45:51'),
(54, 1, 1, 203, '0', '2022-05-05 05:45:52', '2022-05-05 05:45:52'),
(55, 1, 1, 201, '0', '2022-05-05 05:46:02', '2022-05-05 05:46:02'),
(56, 1, 2, 19, '12.000', '2022-07-19 15:58:06', '2022-07-19 15:58:06'),
(57, 1, 2, 18, '0', '2022-07-19 15:58:13', '2022-07-19 15:58:13'),
(58, 1, 2, 20, '0', '2022-07-19 15:58:14', '2022-07-19 15:58:14'),
(59, 1, 2, 17, '0', '2022-07-19 15:58:15', '2022-07-19 15:58:15'),
(60, 1, 2, 22, '0', '2022-07-19 15:58:17', '2022-07-19 15:58:17'),
(61, 1, 2, 21, '0', '2022-07-19 15:58:18', '2022-07-19 15:58:18'),
(62, 1, 2, 23, '0', '2022-07-19 15:58:20', '2022-07-19 15:58:20'),
(63, 1, 2, 24, '0', '2022-07-19 15:58:22', '2022-07-19 15:58:22'),
(64, 1, 2, 25, '0', '2022-07-19 15:58:24', '2022-07-19 15:58:24'),
(65, 1, 2, 26, '0', '2022-07-19 15:58:25', '2022-07-19 15:58:25'),
(66, 1, 2, 27, '0', '2022-07-19 15:58:26', '2022-07-19 15:58:26'),
(67, 1, 2, 28, '0', '2022-07-19 15:58:27', '2022-07-19 15:58:27'),
(68, 1, 2, 29, '0', '2022-07-19 15:58:28', '2022-07-19 15:58:28'),
(69, 1, 2, 30, '0', '2022-07-19 15:58:29', '2022-07-19 15:58:29'),
(70, 1, 2, 31, '0', '2022-07-19 15:58:30', '2022-07-19 15:58:30'),
(71, 1, 2, 32, '0', '2022-07-19 15:58:31', '2022-07-19 15:58:31'),
(72, 1, 2, 33, '0', '2022-07-19 15:58:32', '2022-07-19 15:58:32'),
(73, 1, 2, 34, '0', '2022-07-19 15:58:33', '2022-07-19 15:58:33'),
(74, 1, 2, 35, '0', '2022-07-19 15:58:34', '2022-07-19 15:58:34'),
(75, 1, 2, 36, '0', '2022-07-19 15:58:37', '2022-07-19 15:58:37'),
(76, 1, 2, 37, '0', '2022-07-19 15:58:38', '2022-07-19 15:58:38'),
(77, 3, 6, 1, '10.000', '2022-07-20 06:59:13', '2022-07-20 06:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `pricings`
--

CREATE TABLE `pricings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cabang_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricings`
--

INSERT INTO `pricings` (`id`, `cabang_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', NULL, '2022-04-22 21:18:06'),
(2, 2, 1, '0', NULL, '2022-04-12 05:31:13'),
(3, 3, 1, '1', '2022-07-20 05:45:16', '2022-07-20 05:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
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
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'Owner', NULL, '2022-03-22 04:36:59', '2022-03-22 04:36:59'),
(2, 'superadmin', 'Superadmin', NULL, '2022-03-22 04:36:59', '2022-03-22 04:36:59'),
(3, 'admin', 'Admin', NULL, '2022-03-22 04:36:59', '2022-03-22 04:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(2, 4, 'App\\User'),
(2, 6, 'App\\User'),
(3, 3, 'App\\User'),
(3, 5, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `cabang_id`, `user_id`, `email`, `deleted_at`, `email_verified_at`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'owner', 1, 1, 'owner@sample.com', NULL, NULL, '$2y$10$WCE.kk4ZHw3IVZLaFxTlCuhSH7LiezYNcvER4K6nybkfpL5hvPHUm', NULL, NULL, '2022-03-22 04:36:59', '2022-03-22 04:36:59'),
(2, 'superadmin', 1, 1, 'super@sample.com', NULL, NULL, '$2y$10$h.lEog1ZC8sPpldDhpLJ2urCN78uYellThvxzh4tMFrCefkiVjS0y', NULL, NULL, '2022-03-22 04:36:59', '2022-03-22 04:36:59'),
(3, 'admin', 1, 2, 'admin@sample.com', NULL, NULL, '$2y$10$ZmMdkjK35Otv9xSDtI42ped4Hy6UdgxuOwcb9SFgRPlruBYfpQ/GG', NULL, NULL, '2022-03-22 04:37:00', '2022-03-22 04:37:00'),
(4, 'budi ramayana', 2, 1, 'budi@sample.com', NULL, NULL, '$2y$10$W/bkHBfH4qHZ1POm5OQUSuh6OogQLEhXCvY8NZJPV.nHkHUkDpbW.', NULL, NULL, '2022-03-23 00:43:14', '2022-03-23 01:06:36'),
(5, 'cinta luna', 1, 2, 'cinta@sample.com', NULL, NULL, '$2y$10$09MD8bLY9ZrqcJkKIWrAwOB3uRi1YZqT5BIkIkpFf/Cgr5cbPOrcy', NULL, NULL, '2022-03-23 02:20:57', '2022-03-23 02:20:57'),
(6, 'hanhan', 3, 1, 'hanhan@sample.com', NULL, NULL, '$2y$10$f6kzZfer3rs17ovQOXa5/eaw0.j9xg5LlD1BG8Vm6dATJhB/CfMpy', NULL, NULL, '2022-07-20 05:48:08', '2022-07-20 05:48:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabangs`
--
ALTER TABLE `cabangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cetaks`
--
ALTER TABLE `cetaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosas`
--
ALTER TABLE `diagnosas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formulas`
--
ALTER TABLE `formulas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formula_kats`
--
ALTER TABLE `formula_kats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formula_subs`
--
ALTER TABLE `formula_subs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricings`
--
ALTER TABLE `pricings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabangs`
--
ALTER TABLE `cabangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cetaks`
--
ALTER TABLE `cetaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `diagnosas`
--
ALTER TABLE `diagnosas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formulas`
--
ALTER TABLE `formulas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `formula_kats`
--
ALTER TABLE `formula_kats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `formula_subs`
--
ALTER TABLE `formula_subs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `pricings`
--
ALTER TABLE `pricings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
