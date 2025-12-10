-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2025 at 08:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fayae`
--

-- --------------------------------------------------------

--
-- Table structure for table `kedai_runcit`
--

CREATE TABLE `kedai_runcit` (
  `idbarang` varchar(10) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `bilstok` int(15) NOT NULL,
  `jenisbarang` varchar(20) NOT NULL,
  `harga` double NOT NULL,
  `catatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kedai_runcit`
--

INSERT INTO `kedai_runcit` (`idbarang`, `namabarang`, `bilstok`, `jenisbarang`, `harga`, `catatan`) VALUES
('A004', 'Beras Cap Rambutan', 48, 'Bahan Mentah/Dapur', 32.55, 'Import dari Thailand'),
('A078', 'Tepung Gandum', 55, 'Bahan Mentah/Dapur', 6.7, 'Stok lama'),
('A110', 'Sos Cili Life', 77, 'Bahan Mentah/Dapur', 8.8, 'Stok baharu'),
('F001', 'Ubat Gigi Colgate', 200, 'Produk Kebersihan', 6.7, 'Stok lama'),
('F300', 'Roti Ban Kelapa', 32, 'Makanan', 6, 'Tarikh luput dalam dua minggu\r\n'),
('F444', 'Air Tin Coke', 24, 'Minuman', 2.5, 'Tiada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kedai_runcit`
--
ALTER TABLE `kedai_runcit`
  ADD PRIMARY KEY (`idbarang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
