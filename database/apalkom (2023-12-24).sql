-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 12:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apalkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `kode_aset` varchar(100) NOT NULL,
  `kategori` enum('Elektronik','Non Elektronik') NOT NULL,
  `nama` int(11) NOT NULL,
  `laboratorium` int(11) NOT NULL,
  `tahun_pengadaan` year(4) NOT NULL,
  `status_aset` enum('baik','perbaikan','rusak','bekas_pakai') NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`kode_aset`, `kategori`, `nama`, `laboratorium`, `tahun_pengadaan`, `status_aset`, `catatan`) VALUES
('AST-0001-E', 'Elektronik', 2, 6, 2008, 'baik', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'),
('AST-0002-N', 'Non Elektronik', 4, 6, 2008, 'perbaikan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit2.'),
('AST-0003-E', 'Elektronik', 5, 6, 2008, 'perbaikan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit 2.'),
('AST-0004-N', 'Non Elektronik', 7, 8, 2009, 'rusak', 'hapusDataAset_'),
('AST-0005-E', 'Elektronik', 8, 7, 2019, 'perbaikan', ''),
('AST-0006-E', 'Elektronik', 2, 8, 2007, 'bekas_pakai', '');

-- --------------------------------------------------------

--
-- Table structure for table `kalab`
--

CREATE TABLE `kalab` (
  `id_ajuan` int(11) NOT NULL,
  `kategori` enum('Elektronik','Non Elektronik') NOT NULL,
  `nama` int(11) NOT NULL,
  `laboratorium` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id_laboratorium` int(11) NOT NULL,
  `ruangan` varchar(30) NOT NULL,
  `laboran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`id_laboratorium`, `ruangan`, `laboran`) VALUES
(5, 'Lab 1', 8),
(6, 'Lab 2', 9),
(7, 'Lab 3', 10),
(8, 'Lab 4', 8);

-- --------------------------------------------------------

--
-- Table structure for table `nama_aset`
--

CREATE TABLE `nama_aset` (
  `id_nama_aset` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nama_aset`
--

INSERT INTO `nama_aset` (`id_nama_aset`, `nama`) VALUES
(1, 'Komputer Rakitan'),
(2, 'Komputer Desktop'),
(4, 'Meja Kayu'),
(5, 'Proyektor'),
(6, 'Mouse'),
(7, 'Keyboard'),
(8, 'Kabel HDMI');

-- --------------------------------------------------------

--
-- Table structure for table `pemusnah`
--

CREATE TABLE `pemusnah` (
  `id_pemusnahan` int(11) NOT NULL,
  `kategori` enum('Elektronik','Non Elektronik') NOT NULL,
  `nama` int(11) NOT NULL,
  `kode_aset` varchar(100) NOT NULL,
  `tgl_pemusnahan` date NOT NULL,
  `metode` enum('arsip','sampah','hibah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemusnah`
--

INSERT INTO `pemusnah` (`id_pemusnahan`, `kategori`, `nama`, `kode_aset`, `tgl_pemusnahan`, `metode`) VALUES
(10, 'Non Elektronik', 7, 'AST-0004-N', '2023-12-22', 'hibah'),
(21, 'Non Elektronik', 7, 'AST-0004-N', '2023-12-15', 'sampah'),
(22, 'Non Elektronik', 7, 'AST-0004-N', '2023-12-14', 'arsip'),
(23, 'Non Elektronik', 7, 'AST-0004-N', '2023-12-21', 'sampah'),
(24, 'Non Elektronik', 7, 'AST-0004-N', '2023-12-07', 'hibah'),
(25, 'Non Elektronik', 7, 'AST-0004-N', '2023-12-29', 'arsip'),
(26, 'Non Elektronik', 7, 'AST-0004-N', '2023-12-19', 'sampah');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` enum('kalab','laboran') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama`, `level`) VALUES
(1, 'tanio', '202cb962ac59075b964b07152d234b70', 'Tanio', 'kalab'),
(2, 'fata', '202cb962ac59075b964b07152d234b70', 'Fata', 'kalab'),
(7, 'zein', '202cb962ac59075b964b07152d234b70', 'Zein', 'kalab'),
(8, 'alip', '81dc9bdb52d04dc20036dbd8313ed055', 'Alif Aji', 'laboran'),
(9, 'huda', '202cb962ac59075b964b07152d234b70', 'Miftahul Huda', 'laboran'),
(10, 'wayan', '202cb962ac59075b964b07152d234b70', 'Adrianus Wayan', 'laboran');

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_reparasi` int(11) NOT NULL,
  `kode_aset` varchar(100) NOT NULL,
  `nama` int(11) NOT NULL,
  `kategori` enum('Elektronik','Non Elektronik') NOT NULL,
  `status_reparasi` enum('selesai','perbaikan','rusak') NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_reparasi`, `kode_aset`, `nama`, `kategori`, `status_reparasi`, `tgl_masuk`, `tgl_keluar`) VALUES
(1, 'AST-0002-N', 4, 'Non Elektronik', 'selesai', '2023-12-12', '2023-12-15'),
(3, 'AST-0003-E', 5, 'Elektronik', 'rusak', '2023-12-15', '2023-12-17'),
(4, 'AST-0005-E', 8, 'Elektronik', 'perbaikan', '2023-12-04', '2023-12-10'),
(5, 'AST-0002-N', 4, 'Non Elektronik', 'perbaikan', '2023-12-15', '2023-12-22'),
(6, 'AST-0005-E', 8, 'Elektronik', 'perbaikan', '2023-12-22', '2023-12-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`kode_aset`),
  ADD KEY `nama` (`nama`,`laboratorium`),
  ADD KEY `laboratorium` (`laboratorium`);

--
-- Indexes for table `kalab`
--
ALTER TABLE `kalab`
  ADD PRIMARY KEY (`id_ajuan`),
  ADD KEY `nama` (`nama`,`laboratorium`),
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
  ADD KEY `nama` (`nama`),
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
  ADD KEY `nama` (`nama`,`kode_aset`),
  ADD KEY `kode_aset` (`kode_aset`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kalab`
--
ALTER TABLE `kalab`
  MODIFY `id_ajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `id_laboratorium` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nama_aset`
--
ALTER TABLE `nama_aset`
  MODIFY `id_nama_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemusnah`
--
ALTER TABLE `pemusnah`
  MODIFY `id_pemusnahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id_reparasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `aset_ibfk_1` FOREIGN KEY (`nama`) REFERENCES `nama_aset` (`id_nama_aset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aset_ibfk_2` FOREIGN KEY (`laboratorium`) REFERENCES `laboratorium` (`id_laboratorium`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kalab`
--
ALTER TABLE `kalab`
  ADD CONSTRAINT `kalab_ibfk_1` FOREIGN KEY (`nama`) REFERENCES `nama_aset` (`id_nama_aset`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `pemusnah_ibfk_1` FOREIGN KEY (`nama`) REFERENCES `nama_aset` (`id_nama_aset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemusnah_ibfk_2` FOREIGN KEY (`kode_aset`) REFERENCES `aset` (`kode_aset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD CONSTRAINT `teknisi_ibfk_2` FOREIGN KEY (`nama`) REFERENCES `nama_aset` (`id_nama_aset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teknisi_ibfk_3` FOREIGN KEY (`kode_aset`) REFERENCES `aset` (`kode_aset`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
