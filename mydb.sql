-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Jun 2024 pada 12.07
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapormas_2.0`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `hasil_penanganan`
--

CREATE TABLE `hasil_penanganan` (
  `id_hasil_penanganan` int NOT NULL,
  `id_laporan_keamanan` int DEFAULT NULL,
  `id_petugas_keamanan` int DEFAULT NULL,
  `hasil_penanganan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_penanganan_tindak_lanjut`
--

CREATE TABLE `hasil_penanganan_tindak_lanjut` (
  `id_hasil_penanganan_tindak_lanjut` int NOT NULL,
  `id_laporan_keamanan` int DEFAULT NULL,
  `id_petugas_keamanan` int DEFAULT NULL,
  `hasil_penanganan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketua_rw`
--

CREATE TABLE `ketua_rw` (
  `id_ketua_rw` int NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `id_perumahan` int DEFAULT NULL,
  `no_rw` int DEFAULT NULL,
  `no_rumah` varchar(10) DEFAULT NULL,
  `sk_rw` varchar(255) DEFAULT NULL,
  `blok_perumahan` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_keamanan`
--

CREATE TABLE `laporan_keamanan` (
  `id_laporan_keamanan` int NOT NULL,
  `id_masyarakat` int DEFAULT NULL,
  `kategori_kejadian` enum('Pencurian dan Perampokan','Kejahatan Kecil (Vandalisme)','Kekerasan dan Ancaman','Gangguan Ketenangan','Masalah Lalu Lintas','Kebakaran dan Kebocoran Gas','Keamanan Lingkungan','Kebersihan dan Kesehatan','Pelanggaran Hukum dan Peraturan','Gangguan Satwa Liar') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('sedang diajukan','sedang diproses','selesai','tindak lanjut') DEFAULT NULL,
  `lokasi_kejadian` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `id_perumahan` int DEFAULT NULL,
  `no_rumah` varchar(10) DEFAULT NULL,
  `surat_domisili` varchar(255) DEFAULT NULL,
  `no_rw` int DEFAULT NULL,
  `blok_perumahan` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `nik` varchar(16) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `role` enum('Admin','Ketua RW','Petugas Keamanan','Masyarakat') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perumahan`
--

CREATE TABLE `perumahan` (
  `id_perumahan` int NOT NULL,
  `nama_perumahan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pengembang` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `perumahan`
--

INSERT INTO `perumahan` (`id_perumahan`, `nama_perumahan`, `alamat`, `email`, `pengembang`, `created_at`, `updated_at`) VALUES
(7, 'Ijen Nirwana', 'Kota Malang', 'ijennirwana@gmail.com', 'PT. Jaya Abadi', '2024-05-30 05:27:07', '2024-05-30 05:27:07'),
(8, 'Ijen Suites', 'Kota Malang, Jawa Timur', 'ijen@gmail.com', 'PT. Agung Sedayu', '2024-06-02 03:51:51', '2024-06-02 03:51:51'),
(9, 'Odessa Village', 'Batam Kota', 'tanyaodessa@gmail.com', 'PT. Jaya Raya Merdeka', '2024-06-02 03:52:28', '2024-06-02 03:52:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas_keamanan`
--

CREATE TABLE `petugas_keamanan` (
  `id_petugas_keamanan` int NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `id_perumahan` int DEFAULT NULL,
  `sk_satpam` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tips_keamanan`
--

CREATE TABLE `tips_keamanan` (
  `id_tips_keamanan` int NOT NULL,
  `id_admin` int DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `nama_penulis` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hasil_penanganan`
--
ALTER TABLE `hasil_penanganan`
  ADD PRIMARY KEY (`id_hasil_penanganan`),
  ADD KEY `id_laporan_keamanan` (`id_laporan_keamanan`),
  ADD KEY `id_petugas_keamanan` (`id_petugas_keamanan`);

--
-- Indeks untuk tabel `hasil_penanganan_tindak_lanjut`
--
ALTER TABLE `hasil_penanganan_tindak_lanjut`
  ADD PRIMARY KEY (`id_hasil_penanganan_tindak_lanjut`),
  ADD KEY `id_laporan_keamanan` (`id_laporan_keamanan`),
  ADD KEY `id_petugas_keamanan` (`id_petugas_keamanan`);

--
-- Indeks untuk tabel `ketua_rw`
--
ALTER TABLE `ketua_rw`
  ADD PRIMARY KEY (`id_ketua_rw`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_perumahan` (`id_perumahan`);

--
-- Indeks untuk tabel `laporan_keamanan`
--
ALTER TABLE `laporan_keamanan`
  ADD PRIMARY KEY (`id_laporan_keamanan`),
  ADD KEY `id_masyarakat` (`id_masyarakat`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_perumahan` (`id_perumahan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `perumahan`
--
ALTER TABLE `perumahan`
  ADD PRIMARY KEY (`id_perumahan`);

--
-- Indeks untuk tabel `petugas_keamanan`
--
ALTER TABLE `petugas_keamanan`
  ADD PRIMARY KEY (`id_petugas_keamanan`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_perumahan` (`id_perumahan`);

--
-- Indeks untuk tabel `tips_keamanan`
--
ALTER TABLE `tips_keamanan`
  ADD PRIMARY KEY (`id_tips_keamanan`),
  ADD KEY `id_admin` (`id_admin`);

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
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_penanganan`
--
ALTER TABLE `hasil_penanganan`
  MODIFY `id_hasil_penanganan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_penanganan_tindak_lanjut`
--
ALTER TABLE `hasil_penanganan_tindak_lanjut`
  MODIFY `id_hasil_penanganan_tindak_lanjut` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ketua_rw`
--
ALTER TABLE `ketua_rw`
  MODIFY `id_ketua_rw` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan_keamanan`
--
ALTER TABLE `laporan_keamanan`
  MODIFY `id_laporan_keamanan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perumahan`
--
ALTER TABLE `perumahan`
  MODIFY `id_perumahan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `petugas_keamanan`
--
ALTER TABLE `petugas_keamanan`
  MODIFY `id_petugas_keamanan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tips_keamanan`
--
ALTER TABLE `tips_keamanan`
  MODIFY `id_tips_keamanan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`);

--
-- Ketidakleluasaan untuk tabel `hasil_penanganan`
--
ALTER TABLE `hasil_penanganan`
  ADD CONSTRAINT `hasil_penanganan_ibfk_1` FOREIGN KEY (`id_laporan_keamanan`) REFERENCES `laporan_keamanan` (`id_laporan_keamanan`),
  ADD CONSTRAINT `hasil_penanganan_ibfk_2` FOREIGN KEY (`id_petugas_keamanan`) REFERENCES `petugas_keamanan` (`id_petugas_keamanan`);

--
-- Ketidakleluasaan untuk tabel `hasil_penanganan_tindak_lanjut`
--
ALTER TABLE `hasil_penanganan_tindak_lanjut`
  ADD CONSTRAINT `hasil_penanganan_tindak_lanjut_ibfk_1` FOREIGN KEY (`id_laporan_keamanan`) REFERENCES `laporan_keamanan` (`id_laporan_keamanan`),
  ADD CONSTRAINT `hasil_penanganan_tindak_lanjut_ibfk_2` FOREIGN KEY (`id_petugas_keamanan`) REFERENCES `petugas_keamanan` (`id_petugas_keamanan`);

--
-- Ketidakleluasaan untuk tabel `ketua_rw`
--
ALTER TABLE `ketua_rw`
  ADD CONSTRAINT `ketua_rw_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`),
  ADD CONSTRAINT `ketua_rw_ibfk_2` FOREIGN KEY (`id_perumahan`) REFERENCES `perumahan` (`id_perumahan`);

--
-- Ketidakleluasaan untuk tabel `laporan_keamanan`
--
ALTER TABLE `laporan_keamanan`
  ADD CONSTRAINT `laporan_keamanan_ibfk_1` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id_masyarakat`);

--
-- Ketidakleluasaan untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD CONSTRAINT `masyarakat_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`),
  ADD CONSTRAINT `masyarakat_ibfk_2` FOREIGN KEY (`id_perumahan`) REFERENCES `perumahan` (`id_perumahan`);

--
-- Ketidakleluasaan untuk tabel `petugas_keamanan`
--
ALTER TABLE `petugas_keamanan`
  ADD CONSTRAINT `petugas_keamanan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`),
  ADD CONSTRAINT `petugas_keamanan_ibfk_2` FOREIGN KEY (`id_perumahan`) REFERENCES `perumahan` (`id_perumahan`);

--
-- Ketidakleluasaan untuk tabel `tips_keamanan`
--
ALTER TABLE `tips_keamanan`
  ADD CONSTRAINT `tips_keamanan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
