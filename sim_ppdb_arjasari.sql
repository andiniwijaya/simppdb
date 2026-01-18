-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2026 at 02:43 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_ppdb_arjasari`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_pendaftar`
--
CREATE DATABASE sim_ppdb_arjasari;
USE sim_ppdb_arjasari;


CREATE TABLE `berkas_pendaftar` (
  `id_berkas` int NOT NULL,
  `id_pendaftar` int NOT NULL,
  `jenis_berkas` enum('kartu_keluarga','ktp_ayah','ktp_ibu','kip','ijazah_sd','surat_keterangan_lulus','akta_kelahiran','pas_foto') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lokasi_berkas` varchar(255) NOT NULL,
  `status_berkas` enum('menunggu','valid','invalid') DEFAULT 'menunggu',
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berkas_pendaftar`
--

INSERT INTO `berkas_pendaftar` (`id_berkas`, `id_pendaftar`, `jenis_berkas`, `lokasi_berkas`, `status_berkas`, `uploaded_at`) VALUES
(1, 1, 'kartu_keluarga', '/public/uploads/1766419087_logo mandala.jpeg', 'valid', '2025-12-22 15:58:07'),
(3, 1, 'kip', '/public/uploads/1766419129_Cuplikan layar 2025-10-28 153023.png', 'menunggu', '2025-12-22 15:58:49'),
(4, 1, 'ktp_ayah', '/public/uploads/berkas/ktp_ayah_1_1767087747.png', 'menunggu', '2025-12-30 09:42:27'),
(5, 1, 'ktp_ibu', '/public/uploads/berkas/ktp_ibu_1_1767087755.png', 'menunggu', '2025-12-30 09:42:35'),
(6, 1, 'ijazah_sd', '/public/uploads/berkas/ijazah_sd_1_1767088857.png', 'menunggu', '2025-12-30 10:00:57'),
(7, 1, 'surat_keterangan_lulus', '/public/uploads/berkas/surat_keterangan_lulus_1_1767088865.png', 'menunggu', '2025-12-30 10:01:05'),
(8, 1, 'akta_kelahiran', '/public/uploads/berkas/akta_kelahiran_1_1767088874.png', 'menunggu', '2025-12-30 10:01:14'),
(9, 1, 'pas_foto', '/public/uploads/berkas/pas_foto_1_1767088883.png', 'valid', '2025-12-30 10:01:23'),
(12, 4, 'kartu_keluarga', 'kartu_keluarga_4_1768034406.png', 'valid', '2026-01-10 08:40:06'),
(13, 4, 'ktp_ayah', 'ktp_ayah_4_1768034415.png', 'valid', '2026-01-10 08:40:15'),
(14, 4, 'ktp_ibu', 'ktp_ibu_4_1768034423.png', 'valid', '2026-01-10 08:40:23'),
(15, 4, 'kip', 'kip_4_1768034430.png', 'valid', '2026-01-10 08:40:30'),
(16, 4, 'ijazah_sd', 'ijazah_sd_4_1768034438.png', 'valid', '2026-01-10 08:40:38'),
(17, 4, 'surat_keterangan_lulus', 'surat_keterangan_lulus_4_1768034444.png', 'valid', '2026-01-10 08:40:44'),
(18, 4, 'akta_kelahiran', 'akta_kelahiran_4_1768034452.png', 'valid', '2026-01-10 08:40:52'),
(19, 4, 'pas_foto', 'pas_foto_4_1768034460.png', 'valid', '2026-01-10 08:41:00'),
(20, 16, 'kartu_keluarga', 'kartu_keluarga_16_1768262157.png', 'valid', '2026-01-12 23:55:57'),
(21, 16, 'ktp_ayah', 'ktp_ayah_16_1768262165.png', 'valid', '2026-01-12 23:56:05'),
(22, 16, 'ktp_ibu', 'ktp_ibu_16_1768262171.png', 'valid', '2026-01-12 23:56:11'),
(23, 16, 'kip', 'kip_16_1768262178.png', 'valid', '2026-01-12 23:56:18'),
(24, 16, 'ijazah_sd', 'ijazah_sd_16_1768262185.png', 'valid', '2026-01-12 23:56:25'),
(25, 16, 'surat_keterangan_lulus', 'surat_keterangan_lulus_16_1768262191.png', 'valid', '2026-01-12 23:56:31'),
(26, 16, 'akta_kelahiran', 'akta_kelahiran_16_1768262197.png', 'valid', '2026-01-12 23:56:37'),
(27, 16, 'pas_foto', 'pas_foto_16_1768262204.png', 'valid', '2026-01-12 23:56:44'),
(28, 17, 'kartu_keluarga', 'kartu_keluarga_17_1768268133.png', 'valid', '2026-01-13 01:35:33'),
(29, 18, 'kartu_keluarga', 'kartu_keluarga_18_1768273967.png', 'valid', '2026-01-13 03:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id_orang_tua` int NOT NULL,
  `id_pendaftar` int NOT NULL,
  `jenis` enum('Ayah','Ibu','Wali') NOT NULL,
  `nama_orang_tua` varchar(100) DEFAULT NULL,
  `pendidikan_terakhir` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `penghasilan` varchar(50) DEFAULT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_rumah` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`id_orang_tua`, `id_pendaftar`, `jenis`, `nama_orang_tua`, `pendidikan_terakhir`, `pekerjaan`, `penghasilan`, `nomor_hp`, `tempat_lahir`, `tanggal_lahir`, `alamat_rumah`) VALUES
(4, 4, 'Ayah', 'Opik', 'SMA', 'Petani', '2000.000', '098765432456', 'Jakarta', '1970-01-03', 'Jakarta'),
(5, 4, 'Ibu', 'Siti', 'SMA', 'Ibu Rumah Tangga', '-', '098765789654', 'Malang', '1980-09-08', 'Bandung'),
(8, 16, 'Ayah', 'Rahmat', 'SMA', 'idol', 'Rp. 10.000.000', '098765432456', 'Jakarta', '1978-08-09', 'tasikmalaya'),
(9, 16, 'Ibu', 'seila', 'SMA', 'Ibu Rumah Tangga', '-', '098776543678', 'korea', '1999-05-07', 'bandung'),
(10, 17, 'Ayah', 'aliando', 'SMA', 'idol', 'Rp. 10.000.000', '098765432456', 'korea', '1978-08-07', 'cikoranji'),
(11, 17, 'Ibu', 'abcd', 'SMA', 'Ibu Rumah Tangga', 'Rp. 16.000.000', '083876543123', 'korea', '1870-08-09', 'bandung');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_pendaftar` int NOT NULL,
  `tanggal_bayar` datetime DEFAULT CURRENT_TIMESTAMP,
  `jumlah` int NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `status_bayar` enum('menunggu','lunas') DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pendaftar`, `tanggal_bayar`, `jumlah`, `bukti_transfer`, `status_bayar`) VALUES
(1, 1, '2025-12-30 17:01:58', 500, 'bayar_1_1767088918.png', 'lunas'),
(2, 1, '2025-12-30 17:02:32', 500, 'bayar_1_1767088952.png', 'lunas'),
(5, 4, '2026-01-10 15:52:37', 500, 'bayar_4_1768035157.png', 'lunas'),
(10, 16, '2026-01-13 07:06:43', 500000, 'bayar_16_1768262803.png', 'lunas'),
(11, 18, '2026-01-13 10:13:30', 500000, 'bayar_18_1768274010.png', 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id_pendaftar` int NOT NULL,
  `id_pengguna` int DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Budha','Konghucu','Lainnya') DEFAULT NULL,
  `alamat` text,
  `status_tinggal` enum('bersama_ortu','wali','kost','asrama','lainnya') DEFAULT 'bersama_ortu',
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `anak_ke` int DEFAULT NULL,
  `jumlah_saudara` int DEFAULT NULL,
  `status_anak` enum('kandung','tiri','angkat') NOT NULL,
  `yatim_status` enum('bukan','yatim','piatu','yatim_piatu') DEFAULT 'bukan',
  `bahasa_rumah` varchar(100) DEFAULT NULL,
  `tinggi_badan` int DEFAULT NULL,
  `berat_badan` int DEFAULT NULL,
  `penyakit` text,
  `tahun_lulus` year DEFAULT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status_data` enum('belum_lengkap','lengkap','terverifikasi') DEFAULT 'belum_lengkap'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id_pendaftar`, `id_pengguna`, `nik`, `nisn`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `status_tinggal`, `asal_sekolah`, `anak_ke`, `jumlah_saudara`, `status_anak`, `yatim_status`, `bahasa_rumah`, `tinggi_badan`, `berat_badan`, `penyakit`, `tahun_lulus`, `nomor_hp`, `email`, `tanggal_daftar`, `status_data`) VALUES
(1, 2, '3206384406040006', '9988776611', 'mutiara botani', 'Perempuan', 'tasik', '2026-06-04', 'Islam', 'gdcgcdytj', 'kost', 'smk', 1, 3, 'kandung', 'bukan', 'indonesia', 156, 40, 'ga ada ', '2023', '087858452650', 'mutiarabotani381@gmail.com', '2025-12-22 15:43:49', 'terverifikasi'),
(4, 5, '1234567890', '1234567890', 'RPL', 'Perempuan', 'Bandung', '2017-06-04', 'Islam', 'Gg Lapang 88, Kebon Kangkung, Kiaracondong', 'bersama_ortu', 'Sd Kiaracondong', 2, 3, 'kandung', 'bukan', 'Bahasa Indonesia', 160, 45, 'Tidak ada riwayat penyakit', '2024', '086754368765', 'ppdbarjasari@gmail.com', '2026-01-10 08:30:23', 'lengkap'),
(8, 14, '3344556677889988', '0045597479', 'Mutiara Botani', 'Perempuan', 'Tasikmalaya', '2004-06-04', 'Islam', 'Kp cikoranji', 'bersama_ortu', 'SMK Plus YSB Suryalaya', 1, 3, 'kandung', 'bukan', 'Bahasa Indonesia', 140, 40, 'tidak memiliki riwayat penyakit', '2023', '087858452650', 'mutiarabotani381@gmail.com', '2026-01-12 12:12:38', 'lengkap'),
(15, 21, NULL, '3434343434', 'Kelompok 2 - RPL', NULL, NULL, NULL, NULL, NULL, 'bersama_ortu', 'sd', NULL, NULL, 'kandung', 'bukan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-12 14:57:23', 'belum_lengkap'),
(16, 23, '3402140908020006', '0065432198', 'Kelompok 2 - RPL', 'Perempuan', 'Bandung', '2026-07-08', 'Islam', 'Bandung', 'bersama_ortu', 'SDN BANDUNG', 2, 5, 'kandung', 'bukan', 'Bahasa Indonesia', 160, 45, 'Tidak memiliki riwayat penyakit', '2023', '098765432345', 'kelompok2rpl@gmail.com', '2026-01-12 23:35:56', 'terverifikasi'),
(17, 22, '7876678765654567', '6565656565', 'RPL', 'Perempuan', 'Tasikmalaya', '9778-09-08', 'Islam', 'cikoranji', 'bersama_ortu', 'SMK Plus YSB Suryalaya', 3, 2, 'kandung', 'bukan', 'Bahasa Indonesia', 167, 45, 'ga ada', '2023', '098765432345', 'rpldasar@gmail.com', '2026-01-13 01:28:49', 'terverifikasi'),
(18, 24, '8978767876765432', '6765465657', 'Silvia Agustina', 'Perempuan', 'Bandung', '2002-08-10', 'Islam', 'bandung', 'bersama_ortu', 'sd ', 3, 4, 'kandung', 'bukan', 'Bahasa Indonesia', 170, 46, 'tidak ', '2023', '086754368765', 'sipiada11@gmail.com', '2026-01-13 03:10:09', 'terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_pengguna` varchar(50) DEFAULT NULL,
  `kata_sandi` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `peran` enum('admin','siswa') DEFAULT 'siswa',
  `dibuat_pada` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nisn`, `nama_pengguna`, `kata_sandi`, `email`, `peran`, `dibuat_pada`) VALUES
(1, '', 'admin', '$2y$10$bqkiHtr4ExZ3lOBbCNdc3Ok1YEp23S9xkMCId0Trk3EhkOOKPwrs6', 'admin@gmail.com', 'admin', '2025-12-22 15:00:35'),
(2, '', 'wijay', '$2y$10$6pV5tdd5kyoTG01C.3hLa.jvi9ACyXRvgKBG8RqrUIvg3HBBnq1QK', 'ann.wijay@gmail.com', 'siswa', '2025-12-22 15:15:37'),
(5, '', 'RPL-Dasar', '$2y$10$MSynNor0m260SoplAwnIgue0YM52TDMj7gu.zFTP0SuJJrh6fHsHC', 'ppdbarjasari@gmail.com', 'siswa', '2026-01-10 08:27:18'),
(14, '0045597479', 'Mutiara Botani', '$2y$10$X3k0W/T0dQcl7o8ldTDnd...GkfStKQCvnu.v7t2IzssU0CACxuEe', 'mutiarabotani381@gmail.com', 'siswa', '2026-01-12 12:12:38'),
(21, '3434343434', 'Winda Aryanti', '$2y$10$uy.Mz1NkCddFE5BH.Cd.1ud.EjZJY12XjcR8iuqVZs.vAk3WghQPW', 'winda@gmail.com', 'siswa', '2026-01-12 14:57:23'),
(22, '6565656565', 'Rekayasa Perangkat Lunak', '$2y$10$jyQ0CM4NDcB/DG23Xj3mzOwGfeyyq3OmjKon/zI21WbuHsuw2sgG6', 'rpl@gmail.com', 'siswa', '2026-01-12 16:07:45'),
(23, '1234321234', 'Kelompok 2', '$2y$10$tF3Opt71SxL3zVo.oyCAe..iuD0A3LY7bY8g.ncvJRr1qgVWQIFeC', 'kelompok2rpl@gmail.com', 'siswa', '2026-01-12 23:35:56'),
(24, '6765465657', 'Silvia Agustina', '$2y$10$nwbLtfWtO1unRIPCkxBFsON8j7GKE8TLYOnB5HqkMgsmv8qv5fYGi', 'sipiada11@gmail.com', 'siswa', '2026-01-13 03:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int NOT NULL,
  `id_pendaftar` int DEFAULT NULL,
  `status_penerimaan` enum('menunggu','diterima','tidak_diterima') DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_pendaftar`, `status_penerimaan`) VALUES
(1, 1, 'diterima'),
(2, 1, 'diterima'),
(3, 1, 'diterima'),
(4, 1, 'diterima'),
(5, 1, 'diterima'),
(6, 1, 'diterima'),
(7, 1, 'diterima'),
(8, 1, 'diterima'),
(9, 1, 'diterima'),
(10, 1, 'diterima'),
(11, 1, 'diterima'),
(12, 1, 'diterima'),
(13, 1, 'diterima'),
(14, 1, 'diterima'),
(15, 1, 'diterima'),
(16, 1, 'diterima'),
(17, 1, 'diterima'),
(18, 1, 'diterima'),
(19, 1, 'diterima'),
(20, 1, 'diterima'),
(21, 1, 'diterima'),
(22, 1, 'diterima'),
(23, 1, 'diterima'),
(24, 1, 'diterima'),
(25, 1, 'diterima'),
(26, 1, 'diterima'),
(27, 1, 'diterima'),
(28, 1, 'diterima'),
(29, 1, 'diterima'),
(30, 1, 'diterima'),
(31, 1, 'diterima'),
(32, 1, 'diterima'),
(33, 1, 'diterima'),
(34, 1, 'diterima'),
(35, 1, 'diterima'),
(36, 1, 'diterima'),
(37, 1, 'diterima'),
(38, 1, 'diterima'),
(39, 1, 'diterima'),
(40, 1, 'diterima'),
(41, 1, 'diterima'),
(42, 1, 'diterima'),
(43, 1, 'diterima'),
(44, 1, 'diterima'),
(45, 1, 'diterima'),
(46, 1, 'diterima'),
(47, 1, 'diterima'),
(48, 1, 'diterima'),
(49, 1, 'diterima'),
(50, 1, 'diterima'),
(51, 1, 'diterima'),
(52, 1, 'diterima'),
(53, 1, 'diterima'),
(54, 1, 'diterima'),
(55, 1, 'diterima'),
(56, 1, 'diterima'),
(57, 1, 'diterima'),
(58, 1, 'diterima'),
(59, 1, 'diterima'),
(62, 1, 'diterima'),
(63, 1, 'diterima'),
(64, 1, 'diterima'),
(65, 1, 'diterima'),
(66, 1, 'diterima'),
(73, 1, 'diterima'),
(81, 1, 'diterima'),
(82, 1, 'diterima'),
(83, 1, 'diterima'),
(84, 4, 'diterima'),
(85, 4, 'diterima'),
(86, 4, 'diterima'),
(87, 4, 'diterima'),
(88, 1, 'diterima'),
(89, 1, 'diterima'),
(90, 1, 'diterima'),
(91, 1, 'diterima'),
(92, 1, 'diterima'),
(93, 1, 'diterima'),
(94, 1, 'diterima'),
(95, 4, 'diterima'),
(96, 4, 'diterima'),
(97, 1, 'diterima'),
(98, 1, 'diterima'),
(99, 4, 'diterima'),
(100, 4, 'menunggu'),
(101, 1, 'diterima'),
(102, 1, 'diterima'),
(103, 1, 'diterima'),
(110, 1, 'diterima'),
(111, 1, 'diterima'),
(114, 8, 'menunggu'),
(115, 8, 'menunggu'),
(126, 1, 'diterima'),
(138, 15, 'menunggu'),
(139, 15, 'menunggu'),
(140, 15, 'menunggu'),
(141, 16, 'diterima'),
(142, 16, 'diterima'),
(143, 16, 'diterima'),
(144, 16, 'diterima'),
(145, 1, 'diterima'),
(146, 1, 'diterima'),
(147, 1, 'diterima'),
(148, 16, 'diterima'),
(149, 16, 'diterima'),
(150, 17, 'menunggu'),
(151, 17, 'menunggu'),
(152, 18, 'menunggu'),
(153, 18, 'menunggu'),
(154, 18, 'menunggu'),
(155, 18, 'menunggu'),
(156, 18, 'menunggu'),
(157, 1, 'diterima'),
(158, 1, 'diterima'),
(159, 1, 'diterima'),
(160, 1, 'diterima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_pendaftar`
--
ALTER TABLE `berkas_pendaftar`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `id_pendaftar` (`id_pendaftar`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id_orang_tua`),
  ADD KEY `id_pendaftar` (`id_pendaftar`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pendaftar` (`id_pendaftar`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `nama_pengguna` (`nama_pengguna`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_pendaftar` (`id_pendaftar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_pendaftar`
--
ALTER TABLE `berkas_pendaftar`
  MODIFY `id_berkas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id_orang_tua` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id_pendaftar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berkas_pendaftar`
--
ALTER TABLE `berkas_pendaftar`
  ADD CONSTRAINT `berkas_pendaftar_ibfk_1` FOREIGN KEY (`id_pendaftar`) REFERENCES `pendaftar` (`id_pendaftar`) ON DELETE CASCADE;

--
-- Constraints for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD CONSTRAINT `orang_tua_ibfk_1` FOREIGN KEY (`id_pendaftar`) REFERENCES `pendaftar` (`id_pendaftar`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pendaftar`) REFERENCES `pendaftar` (`id_pendaftar`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_pendaftar`) REFERENCES `pendaftar` (`id_pendaftar`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
