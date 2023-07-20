-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 06:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perabot ylh`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenama`
--

CREATE TABLE `jenama` (
  `idjenama` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenama`
--

INSERT INTO `jenama` (`idjenama`, `nama`) VALUES
(1, 'none'),
(11, 'FurniA'),
(12, 'Zenn'),
(13, 'Focaster'),
(14, 'Bclean');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` varchar(25) NOT NULL,
  `namapengguna` varchar(25) NOT NULL,
  `katalaluan` varchar(25) NOT NULL,
  `aras` varchar(20) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `namapengguna`, `katalaluan`, `aras`, `picture`) VALUES
('test1@gmail.com', 'test1', 'abcde12345', 'pekerja', './image/newpfpf.png'),
('test2@gmail.com', 'test2', 'abcde12345', 'pekerja', './image/blush.png'),
('test3@gmail.com', 'test3', 'abcde12345', 'pengguna', './image/test3pfp.png'),
('test4@gmail.com', 'test4', 'abcde12345', 'pengguna', './image/test4pfp.png'),
('test5@gmail.com', 'test5', 'abcde12345', 'pengguna', './image/test1pfp.png'),
('test6@gmail.com', 'test6', 'abcde12345', 'pengguna', './image/Pogchamp.png');

-- --------------------------------------------------------

--
-- Table structure for table `pilihanpengguna`
--

CREATE TABLE `pilihanpengguna` (
  `idpengguna` varchar(50) NOT NULL,
  `idproduk` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `jenama` varchar(50) NOT NULL,
  `namaproduk` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `jenama`, `namaproduk`, `gambar`, `detail`, `harga`) VALUES
(1000047, 'FurniA', 'Almari Meja', './image/almari.png', 'Coklat almari dan meja', '99'),
(1000048, 'FurniA', 'Rank Bed', './image/black_bed.png', 'katil hitam', '3000'),
(1000049, 'FurniA', 'Carat Bed', './image/blue_bed.png', 'katil biru', '2899'),
(1000050, 'FurniA', 'Katil S!mple', './image/white_bed.png', 'katil Putih', '1999'),
(1000051, 'Zenn', 'Zenn Black', './image/black_carpet.png', 'Permaidari Hitam 3mete', '45'),
(1000052, 'Zenn', 'Zenn Brown', './image/brown_carpet2.png', 'permaidari coklat 2meter', '30'),
(1000053, 'Zenn', 'Zenn Tradision', './image/red_carpet.png', 'Tradisional design carpet 2m', '30'),
(1000054, 'FurniA', 'Permaidari S!mple', './image/red_carpet2.png', 'Permaidari merah ', '44'),
(1000055, 'FurniA', 'Kerusi S!mple', './image/blue_chair.png', 'Kerusi Biru', '30'),
(1000056, 'Focaster', 'Kerusi Biru', './image/blue_chair2.png', 'Kerusi Biru', '25'),
(1000057, 'Focaster', 'Kerusi Kayu', './image/brown_chair.png', 'Kerusi Kayu Coklat', '35'),
(1000058, 'Focaster', 'Sofa Kelabu', './image/white_sofa.png', 'Sofa Kelabu Size besar', '150'),
(1000059, 'Zenn', 'Zenn Green', './image/green_chair.png', 'Kerusi Hijau unik', '170'),
(1000060, 'Focaster', 'Meja dining', './image/brown_table2.png', 'Meja Coklat', '150'),
(1000061, 'Focaster', 'Meja Anak', './image/blue_table.png', 'meja Biru', '120'),
(1000062, 'Focaster', 'Kerusi Hitam', './image/black_chair.png', 'Kerusi Hitam', '25'),
(1000063, 'Bclean', 'Sofa nick', './image/gray_sofa.png', 'Sofa Kelabu', '168'),
(1000064, 'FurniA', 'Almari Coklat', './image/brown_cabinet.png', 'Almari COklat', '200'),
(1000065, 'Focaster', 'Tingkap roof', './image/white_window.png', 'Tingkap putih', '300');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenama`
--
ALTER TABLE `jenama`
  ADD PRIMARY KEY (`idjenama`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenama`
--
ALTER TABLE `jenama`
  MODIFY `idjenama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000066;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
