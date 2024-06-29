-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2022 pada 15.51
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eeg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `eeg_processeds`
--

CREATE TABLE `eeg_processeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `pasien_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `eeg_processeds`
--

INSERT INTO `eeg_processeds` (`id`, `pasien_id`, `description`, `created_at`, `updated_at`) VALUES
(2, '00007', 'Ada 3 file yah', '2022-11-30 03:37:03', '2022-11-30 03:37:03'),
(4, '0012', 'SATU', '2022-11-30 03:48:35', '2022-11-30 03:48:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `eeg_processed_attachments`
--

CREATE TABLE `eeg_processed_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `eeg_processed_id` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `eeg_processed_attachments`
--

INSERT INTO `eeg_processed_attachments` (`id`, `eeg_processed_id`, `file`, `caption`, `created_at`, `updated_at`) VALUES
(1, 2, 'Emil.pdf', '-', '2022-11-30 03:37:03', '2022-11-30 03:37:03'),
(3, 2, 'hamidan 2.pdf', '-', '2022-11-30 03:37:03', '2022-11-30 03:37:03'),
(4, 4, 'format_soal_ujianpg.xlsx', '-', '2022-11-30 03:48:35', '2022-11-30 03:48:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `eeg_results`
--

CREATE TABLE `eeg_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `pasien_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `eeg_results`
--

INSERT INTO `eeg_results` (`id`, `pasien_id`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(2, '00011', 6, 'ADA DAN TIADA', '2022-11-30 02:26:13', '2022-11-30 02:26:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `eeg_result_attachments`
--

CREATE TABLE `eeg_result_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `eeg_id` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `eeg_result_attachments`
--

INSERT INTO `eeg_result_attachments` (`id`, `eeg_id`, `file`, `caption`, `created_at`, `updated_at`) VALUES
(3, 2, 'tanpa nama.pdf', '-', '2022-11-30 02:43:32', '2022-11-30 02:43:32'),
(4, 2, 'Testing.pdf', '-', '2022-11-30 02:43:32', '2022-11-30 02:43:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`id`, `key`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, NULL),
(2, 'petugas', 'Petugas EEG', NULL, NULL),
(3, 'pengolah', 'Pengolah', NULL, NULL),
(4, 'dokter', 'Dokter', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `level_id`, `name`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Beranda', NULL, 'dashboard', NULL, NULL),
(2, 1, 'User Management', NULL, 'user', NULL, NULL),
(3, 1, 'Data Pasien', NULL, 'patient', NULL, NULL),
(4, 2, 'Dashboard', NULL, 'dashboard', NULL, NULL),
(5, 2, 'Data EEG', NULL, 'eeg', NULL, NULL),
(6, 3, 'Dashboard', NULL, 'dashboard', NULL, NULL),
(7, 3, 'Pengolahan EEG', NULL, 'eeg-processed', NULL, NULL),
(8, 4, 'Dasboard', NULL, 'dashboard', NULL, NULL),
(9, 4, 'Data EEG', NULL, 'eeg', NULL, NULL),
(10, 4, 'Pengolahan EEG', NULL, 'eeg-processed', NULL, NULL),
(11, 4, 'Note Pasien', NULL, 'patient-note', NULL, NULL),
(12, 2, 'Data Pasien', NULL, 'patient', NULL, NULL),
(13, 2, 'Note Pasien', NULL, 'patient-note', NULL, NULL),
(14, 3, 'Data EEG', NULL, 'eeg', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_11_08_012326_create_levels_table', 1),
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(6, '2022_11_08_012429_create_roles_table', 3),
(7, '2022_11_09_221858_create_sessions_table', 3),
(8, '2022_11_14_010928_create_menus_table', 4),
(9, '2022_11_16_104306_create_eeg_processeds_table', 5),
(10, '2022_11_16_124536_create_eeg_processed_attachments_table', 5),
(11, '2022_11_16_124555_create_eeg_results_table', 5),
(12, '2022_11_16_124610_create_eeg_result_attachments_table', 5),
(13, '2022_11_16_124721_create_patient_notes_table', 6),
(14, '2022_11_16_125705_patient', 6),
(15, '2022_11_30_065024_col_patient', 7);

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
-- Struktur dari tabel `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `pasien_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sesi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `drug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_history` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heart_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `patients`
--

INSERT INTO `patients` (`id`, `pasien_id`, `sesi`, `start_date`, `start_time`, `age`, `drug`, `disease_history`, `heart_rate`, `record_time`, `gender`, `created_at`, `updated_at`) VALUES
(1, '00011', '001', '2022-07-31', '11:56', 99, 'Ativan, Depakote, Dilantin, dan Propofal', NULL, NULL, NULL, '1', NULL, '2022-11-22 17:47:32'),
(2, '00007', '003', '2022-02-02', '08:00', 62, 'Ativan', NULL, NULL, NULL, '1', '2022-11-22 17:12:36', '2022-11-22 17:12:36'),
(3, '0034', '009', '2022-02-20', '08:00', 46, 'Propd', NULL, NULL, NULL, '2', '2022-11-22 17:14:03', '2022-11-22 17:14:03'),
(4, '00008', '003', '2002-02-02', '08:00', 34, 'Admin', NULL, NULL, NULL, '2', '2022-11-22 17:24:17', '2022-11-22 17:24:17'),
(6, '0012', '012', '2022-11-30', '08:00', 54, 'Ativan', NULL, NULL, NULL, '2', '2022-11-30 00:02:48', '2022-11-30 00:02:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `patient_notes`
--

CREATE TABLE `patient_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `pasien_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnostic_result` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_step` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `patient_notes`
--

INSERT INTO `patient_notes` (`id`, `user_id`, `pasien_id`, `diagnostic_result`, `next_step`, `created_at`, `updated_at`) VALUES
(1, 7, '00007', 'Ouh Iya', 'ASHIAPP', '2022-11-30 04:58:35', '2022-11-30 05:04:55'),
(2, 7, '00011', 'Oke Bro', 'What', '2022-11-30 05:02:31', '2022-11-30 05:02:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `user_id`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 3, 2, '2022-11-14 00:52:18', '2022-11-14 00:52:18'),
(3, 4, 3, '2022-11-14 00:53:11', '2022-11-14 01:05:08'),
(5, 5, 4, '2022-11-14 00:59:58', '2022-11-14 01:05:22'),
(8, 6, 2, '2022-11-14 01:06:52', '2022-11-14 01:06:52'),
(9, 7, 4, '2022-11-22 19:17:03', '2022-11-22 19:17:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('citmdkua71Au0zCWn29vPD4VohJpW57dbax0VlBt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 OPR/93.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTVJVemhxSE5KMXZrcGt6MUNiamFURTZuZHhyZUN3Njk1YU5yRTRMNyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1669990854),
('mnTXiTIToyfiqD6HpUUF1glcJtml3a35gPUGiDts', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36 OPR/93.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZERGckc2ZElSUFdYTkF3T2s1RTlUS3dQZXg0TEVHNU13VkNYekdNdyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoidXNlciI7TzoxNToiQXBwXE1vZGVsc1xVc2VyIjozMjp7czoxMToiACoAZmlsbGFibGUiO2E6Mzp7aTowO3M6NDoibmFtZSI7aToxO3M6NToiZW1haWwiO2k6MjtzOjg6InBhc3N3b3JkIjt9czo5OiIAKgBoaWRkZW4iO2E6NDp7aTowO3M6ODoicGFzc3dvcmQiO2k6MTtzOjE0OiJyZW1lbWJlcl90b2tlbiI7aToyO3M6MjU6InR3b19mYWN0b3JfcmVjb3ZlcnlfY29kZXMiO2k6MztzOjE3OiJ0d29fZmFjdG9yX3NlY3JldCI7fXM6ODoiACoAY2FzdHMiO2E6MTp7czoxNzoiZW1haWxfdmVyaWZpZWRfYXQiO3M6ODoiZGF0ZXRpbWUiO31zOjEwOiIAKgBhcHBlbmRzIjthOjE6e2k6MDtzOjE3OiJwcm9maWxlX3Bob3RvX3VybCI7fXM6NzoiACoAd2l0aCI7YToxOntpOjA7czo0OiJyb2xlIjt9czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czo1OiJ1c2VycyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6MTI6IgAqAHdpdGhDb3VudCI7YTowOnt9czoxOToicHJldmVudHNMYXp5TG9hZGluZyI7YjowO3M6MTA6IgAqAHBlclBhZ2UiO2k6MTU7czo2OiJleGlzdHMiO2I6MTtzOjE4OiJ3YXNSZWNlbnRseUNyZWF0ZWQiO2I6MDtzOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7czoxMzoiACoAYXR0cmlidXRlcyI7YToxMDp7czoyOiJpZCI7aTo0O3M6NDoibmFtZSI7czoxNDoiQnVkaSBTdWphdG1pa28iO3M6NToiZW1haWwiO3M6MTQ6ImJ1ZGlAZ21haWwuY29tIjtzOjE3OiJlbWFpbF92ZXJpZmllZF9hdCI7TjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkL1AyY1hLTjVBdzRmckpJY2FWckpET3V0dGxTOUxCUDF0b0hHMmNYMU5kU3JBUUd3TWhDRmEiO3M6MTc6InR3b19mYWN0b3Jfc2VjcmV0IjtOO3M6MjU6InR3b19mYWN0b3JfcmVjb3ZlcnlfY29kZXMiO047czoyMzoidHdvX2ZhY3Rvcl9jb25maXJtZWRfYXQiO047czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMi0xMS0xNCAwNzo1MzoxMSI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMi0xMS0yMyAwMjowNDowOCI7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjEwOntzOjI6ImlkIjtpOjQ7czo0OiJuYW1lIjtzOjE0OiJCdWRpIFN1amF0bWlrbyI7czo1OiJlbWFpbCI7czoxNDoiYnVkaUBnbWFpbC5jb20iO3M6MTc6ImVtYWlsX3ZlcmlmaWVkX2F0IjtOO3M6ODoicGFzc3dvcmQiO3M6NjA6IiQyeSQxMCQvUDJjWEtONUF3NGZySkljYVZySkRPdXR0bFM5TEJQMXRvSEcyY1gxTmRTckFRR3dNaENGYSI7czoxNzoidHdvX2ZhY3Rvcl9zZWNyZXQiO047czoyNToidHdvX2ZhY3Rvcl9yZWNvdmVyeV9jb2RlcyI7TjtzOjIzOiJ0d29fZmFjdG9yX2NvbmZpcm1lZF9hdCI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIyLTExLTE0IDA3OjUzOjExIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIyLTExLTIzIDAyOjA0OjA4Ijt9czoxMDoiACoAY2hhbmdlcyI7YTowOnt9czoxNzoiACoAY2xhc3NDYXN0Q2FjaGUi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', 1669992424);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@eeg.id', NULL, '$2y$10$xdkgSeXgPCfT219M./OsDOEplNoKsw3T245CZNU8F9KWO7quHemc.', NULL, NULL, NULL, NULL, NULL),
(4, 'Budi Sujatmiko', 'budi@gmail.com', NULL, '$2y$10$/P2cXKN5Aw4frJIcaVrJDOuttlS9LBP1toHG2cX1NdSrAQGwMhCFa', NULL, NULL, NULL, '2022-11-14 00:53:11', '2022-11-22 19:04:08'),
(6, 'Rifki', 'rifki@gmail.com', NULL, '$2y$10$k0R9NEmahxHYgI3ouIBZ.eqqXLvFrm92UX.WEpQhTObHg7PLqviIq', NULL, NULL, NULL, '2022-11-14 01:06:52', '2022-11-22 18:04:43'),
(7, 'Ryan', 'ryan@gmail.com', NULL, '$2y$10$cOGbxeQJXMb8iENbBmYfMuGvNKn5niqWYaYUTa5S3L24awlY8c3ca', NULL, NULL, NULL, '2022-11-22 19:17:03', '2022-11-22 19:17:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `eeg_processeds`
--
ALTER TABLE `eeg_processeds`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `eeg_processed_attachments`
--
ALTER TABLE `eeg_processed_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eeg_processed_attachments_eeg_processed_id_foreign` (`eeg_processed_id`);

--
-- Indeks untuk tabel `eeg_results`
--
ALTER TABLE `eeg_results`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `eeg_result_attachments`
--
ALTER TABLE `eeg_result_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eeg_result_attachments_eeg_id_foreign` (`eeg_id`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_level_id_foreign` (`level_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `patient_notes`
--
ALTER TABLE `patient_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `eeg_processeds`
--
ALTER TABLE `eeg_processeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `eeg_processed_attachments`
--
ALTER TABLE `eeg_processed_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `eeg_results`
--
ALTER TABLE `eeg_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `eeg_result_attachments`
--
ALTER TABLE `eeg_result_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `patient_notes`
--
ALTER TABLE `patient_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `eeg_processed_attachments`
--
ALTER TABLE `eeg_processed_attachments`
  ADD CONSTRAINT `eeg_processed_attachments_eeg_processed_id_foreign` FOREIGN KEY (`eeg_processed_id`) REFERENCES `eeg_processeds` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `eeg_result_attachments`
--
ALTER TABLE `eeg_result_attachments`
  ADD CONSTRAINT `eeg_result_attachments_eeg_id_foreign` FOREIGN KEY (`eeg_id`) REFERENCES `eeg_results` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
