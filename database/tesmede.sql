-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2022 at 08:21 AM
-- Server version: 5.7.33
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tesmede`
--

-- --------------------------------------------------------

--
-- Table structure for table `komoditas`
--

CREATE TABLE `komoditas` (
  `id` int(11) NOT NULL,
  `komoditas_kode` varchar(4) NOT NULL,
  `komoditas_nama` varchar(30) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komoditas`
--

INSERT INTO `komoditas` (`id`, `komoditas_kode`, `komoditas_nama`, `created_at`, `updated_at`) VALUES
(1, 'K001', 'CABE', '2022-03-15', '2022-03-15'),
(2, 'K002', 'Jagung', '2022-03-15', '2022-03-15'),
(5, 'K003', 'Gandum', '2022-03-16', '2022-03-16'),
(7, 'K004', 'Terong', '2022-03-16', '2022-03-16'),
(8, 'K005', 'Bawang', '2022-03-16', '2022-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `komoditas_kode` varchar(255) NOT NULL,
  `produksi` bigint(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id`, `komoditas_kode`, `produksi`, `tanggal`) VALUES
(3, '1', 9000, '2022-03-16'),
(4, '2', 12000, '2022-04-13'),
(5, '5', 540, '2022-03-17'),
(6, '7', 3200, '2022-03-18'),
(7, '8', 10000, '2022-06-18'),
(8, '8', 150, '2022-07-18'),
(9, '1', 9000, '2022-03-16'),
(10, '1', 9000, '2022-03-16'),
(11, '5', 900, '2022-03-23'),
(12, '5', 120, '2022-04-06'),
(13, '5', 200, '2022-04-08');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_rekap_laporan`
-- (See below for the actual view)
--
CREATE TABLE `view_rekap_laporan` (
`tahun` int(4)
,`komoditas_nama` varchar(30)
,`tanggal` date
,`produksi` bigint(20)
);

-- --------------------------------------------------------

--
-- Structure for view `view_rekap_laporan`
--
DROP TABLE IF EXISTS `view_rekap_laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rekap_laporan`  AS SELECT extract(year from `produksi`.`tanggal`) AS `tahun`, `komoditas`.`komoditas_nama` AS `komoditas_nama`, `produksi`.`tanggal` AS `tanggal`, `produksi`.`produksi` AS `produksi` FROM (`produksi` join `komoditas` on((`komoditas`.`id` = `produksi`.`komoditas_kode`))) WHERE `produksi`.`tanggal` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komoditas`
--
ALTER TABLE `komoditas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
