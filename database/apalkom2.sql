-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2024 at 12:40 AM
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
-- Database: `apalkom2`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `kode_aset` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kategori` enum('Elektronik','Non Elektronik') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `laboratorium` int NOT NULL,
  `tahun_pengadaan` year NOT NULL,
  `status_aset` enum('baik','perbaikan','rusak','bekas_pakai') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kalab`
--

CREATE TABLE `kalab` (
  `id_ajuan` int NOT NULL,
  `kategori` enum('Elektronik','Non Elektronik') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` int NOT NULL,
  `laboratorium` int NOT NULL,
  `tgl_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id_laboratorium` int NOT NULL,
  `ruangan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `laboran` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nama_aset`
--

CREATE TABLE `nama_aset` (
  `id_nama_aset` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemusnah`
--

CREATE TABLE `pemusnah` (
  `id_pemusnahan` int NOT NULL,
  `kategori` enum('Elektronik','Non Elektronik') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_aset` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_pemusnahan` date NOT NULL,
  `metode` enum('arsip','sampah','hibah') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('kalab','laboran') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_reparasi` int NOT NULL,
  `kode_aset` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kategori` enum('Elektronik','Non Elektronik') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_reparasi` enum('selesai','perbaikan','rusak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`kode_aset`),
  ADD KEY `laboratorium` (`laboratorium`);

--
-- Indexes for table `kalab`
--
ALTER TABLE `kalab`
  ADD PRIMARY KEY (`id_ajuan`),
  ADD KEY `laboratorium` (`laboratorium`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`id_laboratorium`),
  ADD KEY `laboran` (`laboran`);

--
-- Indexes for table `nama_aset`
--
ALTER TABLE `nama_aset`
  ADD PRIMARY KEY (`id_nama_aset`);

--
-- Indexes for table `pemusnah`
--
ALTER TABLE `pemusnah`
  ADD PRIMARY KEY (`id_pemusnahan`),
  ADD KEY `kode_aset` (`kode_aset`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_reparasi`),
  ADD KEY `kode_aset` (`kode_aset`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kalab`
--
ALTER TABLE `kalab`
  MODIFY `id_ajuan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `id_laboratorium` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nama_aset`
--
ALTER TABLE `nama_aset`
  MODIFY `id_nama_aset` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemusnah`
--
ALTER TABLE `pemusnah`
  MODIFY `id_pemusnahan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id_reparasi` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `aset_ibfk_2` FOREIGN KEY (`laboratorium`) REFERENCES `laboratorium` (`id_laboratorium`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kalab`
--
ALTER TABLE `kalab`
  ADD CONSTRAINT `kalab_ibfk_2` FOREIGN KEY (`laboratorium`) REFERENCES `laboratorium` (`id_laboratorium`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD CONSTRAINT `laboratorium_ibfk_1` FOREIGN KEY (`laboran`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemusnah`
--
ALTER TABLE `pemusnah`
  ADD CONSTRAINT `pemusnah_ibfk_2` FOREIGN KEY (`kode_aset`) REFERENCES `inventaris` (`kode_aset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD CONSTRAINT `teknisi_ibfk_3` FOREIGN KEY (`kode_aset`) REFERENCES `inventaris` (`kode_aset`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
