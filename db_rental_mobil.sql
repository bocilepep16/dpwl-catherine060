-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2026 at 10:33 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_akun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `status_akun`) VALUES
('fakhril@atmaluhur.ac.id', '$2y$10$okrESGwfADNfgArEXWdqSu0PQGgk202OVfDq2AkBGJXS2F75WDvnu', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `kode_bayar` varchar(20) NOT NULL,
  `tgl_wkt_byr` datetime NOT NULL,
  `ft_byr` varchar(255) DEFAULT NULL,
  `mtode_byr` varchar(30) NOT NULL,
  `jns_byr` varchar(30) NOT NULL,
  `nominal` decimal(12,2) NOT NULL,
  `sttus_byr` varchar(30) NOT NULL,
  `tgl_wkt_ver` datetime DEFAULT NULL,
  `kode_sewa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `kode_denda` varchar(20) NOT NULL,
  `telat_jam` int(11) NOT NULL,
  `tarif_per_jam` decimal(12,2) NOT NULL,
  `kode_kembali` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kembali`
--

CREATE TABLE `kembali` (
  `kode_kembali` varchar(20) NOT NULL,
  `tgl_wkt_blk` datetime NOT NULL,
  `stts_blk` varchar(30) NOT NULL,
  `ket_blk` text,
  `kode_bayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `no_plat` varchar(10) NOT NULL,
  `nm_mobil` varchar(100) NOT NULL,
  `nkursi` int(11) NOT NULL,
  `nbagasi` int(11) NOT NULL,
  `jns_mobil` varchar(50) NOT NULL,
  `transmisi` varchar(30) NOT NULL,
  `thn_buat` year(4) NOT NULL,
  `ft_depan` varchar(255) DEFAULT NULL,
  `ft_blkg` varchar(255) DEFAULT NULL,
  `ft_interior` varchar(255) DEFAULT NULL,
  `hrg_hari` decimal(12,2) NOT NULL,
  `cttn_unit` text,
  `status_unit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`no_plat`, `nm_mobil`, `nkursi`, `nbagasi`, `jns_mobil`, `transmisi`, `thn_buat`, `ft_depan`, `ft_blkg`, `ft_interior`, `hrg_hari`, `cttn_unit`, `status_unit`) VALUES
('BN 7821 KK', 'Brio', 3, 2, 'MPV', 'Manual', '2000', 'DepanBN 7821 KK.jpg', 'BelakangBN 7821 KK.jpg', 'InteriorBN 7821 KK.jpg', 49998.00, '123', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `user_plg060` varchar(50) NOT NULL,
  `sandi060` varchar(255) NOT NULL,
  `nik060` varchar(20) NOT NULL,
  `nm_lngkp060` varchar(100) NOT NULL,
  `no_hp060` varchar(20) NOT NULL,
  `almt_lngkp060` text NOT NULL,
  `ft_ktp060` varchar(255) DEFAULT NULL,
  `ft_sim_a060` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`user_plg060`, `sandi060`, `nik060`, `nm_lngkp060`, `no_hp060`, `almt_lngkp060`, `ft_ktp060`, `ft_sim_a060`) VALUES
('Cath060', 'kucinglewat', '1271872882718728', 'Cath Audrey', '0123467809123', 'Jl.Batu Tunggal Kadera', 'ft_ktp060_Cath060_6ae8627c3e137.jpg', 'ft_sim_a060_Cath060_6ae8627c3f229.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pilih`
--

CREATE TABLE `pilih` (
  `kode_sewa` varchar(20) NOT NULL,
  `no_plat` varchar(15) NOT NULL,
  `hrg_sewa` decimal(12,2) NOT NULL,
  `n_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `kode_sewa` varchar(20) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `wkt_ambil` datetime DEFAULT NULL,
  `status_sewa` varchar(30) NOT NULL,
  `user_plg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`kode_bayar`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`kode_denda`);

--
-- Indexes for table `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`kode_kembali`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`no_plat`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`user_plg060`);

--
-- Indexes for table `pilih`
--
ALTER TABLE `pilih`
  ADD PRIMARY KEY (`kode_sewa`,`no_plat`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`kode_sewa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
