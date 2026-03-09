-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2026 at 05:14 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen-it`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `kode` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_divisi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_anggota` int NOT NULL DEFAULT '0',
  `jumlah_barang` int NOT NULL DEFAULT '0',
  `status` enum('Pinjam','Tidak Pinjam') COLLATE utf8mb4_general_ci DEFAULT 'Tidak Pinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`kode`, `nama_divisi`, `jumlah_anggota`, `jumlah_barang`, `status`) VALUES
('#DIV-001', 'Marketing', 10, 5, 'Pinjam'),
('#DIV-002', 'IT', 4, 12, 'Pinjam'),
('#DIV-003', 'HR', 8, 20, 'Tidak Pinjam'),
('#DIV-004', 'Redaksi', 15, 21, 'Tidak Pinjam'),
('#DIV-005', 'Riset', 6, 22, 'Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `no_seri` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `merk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_pengadaan` year NOT NULL,
  `pemeliharaan` date NOT NULL,
  `jumlah` int NOT NULL DEFAULT '1',
  `kondisi` enum('Baik','Pemeliharaan','Rusak') COLLATE utf8mb4_general_ci DEFAULT 'Baik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`no_seri`, `merk`, `tahun_pengadaan`, `pemeliharaan`, `jumlah`, `kondisi`) VALUES
('#LP-001', 'Lenovo ThinkPad X1', '2023', '2024-01-10', 5, 'Baik'),
('#LP-002', 'MacBook Pro M2', '2023', '2024-02-15', 3, 'Pemeliharaan'),
('#LP-003', 'Asus ROG Zephyrus', '2022', '2024-03-20', 2, 'Rusak'),
('#LP-004', 'Dell XPS 13', '2021', '2023-12-12', 4, 'Baik'),
('#LP-005', 'HP EliteBook', '2022', '2024-05-05', 6, 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `no_seri` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `merk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_pengadaan` year NOT NULL,
  `pemeliharaan` date NOT NULL,
  `jumlah` int NOT NULL DEFAULT '1',
  `kondisi` enum('Baik','Pemeliharaan','Rusak') COLLATE utf8mb4_general_ci DEFAULT 'Baik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`no_seri`, `merk`, `tahun_pengadaan`, `pemeliharaan`, `jumlah`, `kondisi`) VALUES
('#MN-002', 'Samsung 27 Inch', '2021', '2023-12-15', 3, 'Pemeliharaan'),
('#MN-003', 'Dell UltraSharp', '2023', '2024-02-20', 2, 'Rusak'),
('#MN-004', 'Asus ROG Monitor', '2023', '2024-03-05', 4, 'Baik'),
('#MN-005', 'AOC Pro', '2020', '2023-11-22', 1, 'Baik'),
('Gbsklals', 'Samsung 32', '2026', '2026-03-10', 1, 'Baik'),
('K34zg5', 'LG 24 Inch', '2022', '2024-01-10', 5, 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `no_seri` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `merk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_pengadaan` year NOT NULL,
  `pemeliharaan` date NOT NULL,
  `jumlah` int NOT NULL DEFAULT '1',
  `kondisi` enum('Baik','Pemeliharaan','Rusak') COLLATE utf8mb4_general_ci DEFAULT 'Baik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`no_seri`, `merk`, `tahun_pengadaan`, `pemeliharaan`, `jumlah`, `kondisi`) VALUES
('#PC-001', 'PC Rakitan IT', '2021', '2024-01-05', 5, 'Baik'),
('#PC-002', 'HP Pavilion Desktop', '2022', '2023-10-10', 3, 'Pemeliharaan'),
('#PC-003', 'Dell OptiPlex', '2020', '2024-02-02', 10, 'Baik'),
('#PC-004', 'Lenovo IdeaCentre', '2023', '2024-03-12', 2, 'Rusak'),
('#PC-005', 'Asus ExpertCenter', '2022', '2024-04-18', 4, 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat_eksternal`
--

CREATE TABLE `perangkat_eksternal` (
  `no_seri` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `merk` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_pengadaan` year NOT NULL,
  `pemeliharaan` date NOT NULL,
  `jumlah` int NOT NULL DEFAULT '1',
  `kondisi` enum('Baik','Pemeliharaan','Rusak') COLLATE utf8mb4_general_ci DEFAULT 'Baik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perangkat_eksternal`
--

INSERT INTO `perangkat_eksternal` (`no_seri`, `merk`, `tahun_pengadaan`, `pemeliharaan`, `jumlah`, `kondisi`) VALUES
('#PE-001', 'Keyboard Logitech', '2023', '2024-01-20', 10, 'Baik'),
('#PE-002', 'Mouse Wireless Razer', '2022', '2024-02-11', 15, 'Baik'),
('#PE-003', 'Headset Sony', '2021', '2023-09-09', 5, 'Rusak'),
('#PE-004', 'Webcam C920', '2023', '2024-03-15', 8, 'Pemeliharaan'),
('#PE-005', 'Flashdisk Sandisk 64GB', '2020', '2024-01-05', 20, 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `kode_pinjam` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `no_seri_barang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kode_divisi` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kondisi` enum('Baik','Pemeliharaan','Rusak') COLLATE utf8mb4_general_ci DEFAULT 'Pemeliharaan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`kode_pinjam`, `no_seri_barang`, `nama_barang`, `username`, `email`, `kode_divisi`, `kondisi`) VALUES
('#SRV-001', '#LP-002', 'MacBook Pro M2', 'nas_user', 'nas@gmail.com', '#DIV-001', 'Pemeliharaan'),
('#SRV-002', '#MN-002', 'Samsung 27 Inch', 'IT', 'rezky@gmail.com', '#DIV-002', 'Pemeliharaan'),
('#SRV-003', '#PE-003', 'Headset Sony', 'ijlal', 'ijl@gmail.com', '#DIV-005', 'Rusak'),
('#SRV-004', '#PC-004', 'Lenovo IdeaCentre', 'reza_staff', 'rez@gmail.com', '#DIV-004', 'Rusak'),
('#SRV-005', '#LP-005', 'HP EliteBook', 'HRD', 'akb@gmail.com', '#DIV-003', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_user` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` enum('Admin','IT Support','HRD','Staff') COLLATE utf8mb4_general_ci NOT NULL,
  `kode_divisi` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') COLLATE utf8mb4_general_ci DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama_user`, `email`, `password`, `remember_token`, `role`, `kode_divisi`, `status`) VALUES
('admin', 'Administrator Utama', 'admin@gmail.com', '$2y$12$ht.Aj21a4wPXiWL30PM2ne0ZHlUbNhnB0z/MR5MB7W60P2142LGiW', 'p5A7kMvQQMIjJZKm3BIPiymMLC8XYKDnQ01HR0FfpX5hjuDZ8XgqvsBT5gho', 'Admin', NULL, 'Aktif'),
('HRD', 'Akbar', 'akb@gmail.com', '$2y$12$Jx8GJZbs3NcIDvSILKe7a.pWhOh7xMubaczDSXF/luKkc9Hc7J6ke', NULL, 'HRD', '#DIV-003', 'Aktif'),
('ijlal', 'Ijlal', 'ijl@gmail.com', '123', NULL, 'IT Support', '#DIV-005', 'Aktif'),
('IT', 'Muhammad Rezky', 'rezky@gmail.com', '$2y$12$pbjJA9olR6i83ZTKSMQOD.nSgHqsc10Em.shXHBc6N7c.VyxjSSnS', NULL, 'IT Support', '#DIV-002', 'Aktif'),
('nas_user', 'Nas', 'nas@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Staff', '#DIV-001', 'Aktif'),
('reza_staff', 'Reza', 'rez@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Staff', '#DIV-004', 'Nonaktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`no_seri`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`no_seri`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`no_seri`);

--
-- Indexes for table `perangkat_eksternal`
--
ALTER TABLE `perangkat_eksternal`
  ADD PRIMARY KEY (`no_seri`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`kode_pinjam`),
  ADD KEY `username` (`username`),
  ADD KEY `kode_divisi` (`kode_divisi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `kode_divisi` (`kode_divisi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`kode_divisi`) REFERENCES `divisi` (`kode`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`kode_divisi`) REFERENCES `divisi` (`kode`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
