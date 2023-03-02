-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 10:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id` int(11) NOT NULL,
  `ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `referensi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id`, `ibu`, `pekerjaan_ibu`, `ayah`, `pekerjaan_ayah`, `referensi`) VALUES
(72, 'doni', 'doni', 'doni', 'doni', 'sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `jenis_sim` varchar(100) NOT NULL,
  `alamat_kota` varchar(100) NOT NULL,
  `alamat_luar` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `kebangsaan` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `tempat_tinggal` varchar(100) NOT NULL,
  `kendaraan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id`, `jabatan`, `nama`, `ktp`, `telp`, `mail`, `jenis_sim`, `alamat_kota`, `alamat_luar`, `jenis_kelamin`, `tinggi`, `berat`, `agama`, `kebangsaan`, `tempat_lahir`, `tgl_lahir`, `status`, `tempat_tinggal`, `kendaraan`) VALUES
(72, 'KEPALA GUDANG', 'Doni alamsyah', '3276451892617892', '62-821-2429-9847', 'donialamsyah@gmail.com', 'SIM B1 Umum', 'Jl. Prof. DR. G.A. Siwabessy, Kukusan, Kecamatan Beji, Kota Depok, Jawa Barat 16425', 'beiji depok', 'Laki-laki', 172, 78, 'Katholik', 'WNI', 'bekasi', '2002-11-08', 'kawin', 'milik orang tua', 'mobil');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `instansi_pendidikan` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tahun_masuk` int(20) NOT NULL,
  `tahun_kelulusan` int(20) NOT NULL,
  `tempat_prakerin` varchar(50) NOT NULL,
  `bidang_prakerin` varchar(50) NOT NULL,
  `lama_prakerin` varchar(50) NOT NULL,
  `instansi_bekerja` varchar(50) NOT NULL,
  `jabatan_kerja` varchar(50) NOT NULL,
  `lama_bekerja` varchar(50) NOT NULL,
  `alasan_berhenti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`id`, `pendidikan`, `instansi_pendidikan`, `jurusan`, `tahun_masuk`, `tahun_kelulusan`, `tempat_prakerin`, `bidang_prakerin`, `lama_prakerin`, `instansi_bekerja`, `jabatan_kerja`, `lama_bekerja`, `alasan_berhenti`) VALUES
(72, 'SMK/Sederajat', 'Yamaha', 'sistem teologi', 2020, 2024, 'RPA', 'IT SUPPORT', '1 tahun', 'Yamaha', 'IT', '2 tahun', 'habis kontrak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ktp` (`ktp`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `fk_pelamar_id` FOREIGN KEY (`id`) REFERENCES `pelamar` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD CONSTRAINT `fk_pelamar_id1` FOREIGN KEY (`id`) REFERENCES `pelamar` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
