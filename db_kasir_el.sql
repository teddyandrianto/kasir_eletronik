-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 05:34 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir_el`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `barcode` int(15) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `barcode`, `nama_barang`, `stok`, `harga_jual`, `harga_beli`) VALUES
(3, 1001234, 'TV\'LCD 21\" POLYTRON', 14, 2000000, 1500000),
(4, 1001235, 'TV\'LCD 32\" SAMSUNG', 13, 3000000, 2500000),
(5, 1001236, 'TV\'LCD 21\"SHARP ', 11, 2000000, 1500000),
(6, 1001237, 'TV\'LCD 25\"SONY', 11, 4000000, 3000000),
(7, 5291114, 'Apple Iphone X', 9, 12500000, 12000000),
(8, 5291115, 'Apple Iphone XS', 8, 21000000, 20000000),
(9, 5291116, 'Apple Iphone XR', 15, 12000000, 11500000),
(10, 5291120, 'Apple Macbook Pro', 9, 35000000, 32000000),
(11, 5291119, 'Apple Macbook Air', 11, 13500000, 12000000),
(12, 1001238, 'TV\'LCD 43\" SAMSUNG', 10, 4000000, 3000000),
(13, 5291215, 'Apple Watch series 3', 17, 5000000, 4500000),
(14, 1001244, 'ASUS ROG GL552JX-XO139D ', 11, 11000000, 10000000),
(15, 1001257, 'ASUS ROG GL752VW-T4211T ', 9, 19000000, 15000000),
(16, 1452674, 'Samsung Galaxy S9', 10, 9000000, 8200000),
(17, 1001256, 'ASUS ROG G752VS-BA230T', 6, 30000000, 25000000),
(18, 1001255, 'ASUS ROG GX800VH-GY002T ', 4, 90000000, 85000000),
(19, 1001254, 'ASUS ROG GX800VH(KBL)-GY005T', 0, 96000000, 90000000),
(20, 5291299, 'Apple iMac', 18, 78000000, 70000000),
(21, 1001282, 'Dell Alienware M14X', 6, 19000000, 15000000),
(22, 1001281, 'Dell Alienware M17X', 4, 28000000, 25000000),
(23, 5291130, 'Apple iPad Pro', 7, 25000000, 22000000),
(24, 1001272, 'MSI GT83VR 7RE TITAN SLI', 5, 70000000, 59000000),
(25, 222879, 'Harman/Kardon Aura Studio 2', 12, 6200000, 5760000),
(26, 1001271, 'MSI GL62M 7RDX', 11, 12000000, 9000000),
(27, 322675, 'Sennheiser Momentum in Ear', 7, 1500000, 1200000),
(28, 1001262, 'HP OMEN 17-an002tx', 5, 38000000, 29000000),
(29, 1001261, 'HP OMEN 15-5117tx', 16, 16000000, 12000000),
(30, 1001253, 'ASUS ROG GX700VO-GC011T', 6, 80000000, 70000000),
(31, 1001252, 'ASUS ROG G501VW-FI174T', 14, 23500000, 19500000),
(32, 1001251, 'Notebook ASUS ROG GL552VW-CN46', 21, 15000000, 11500000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_transaksi`
--

CREATE TABLE `tbl_detail_transaksi` (
  `id_detail_tr` int(11) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_transaksi`
--

INSERT INTO `tbl_detail_transaksi` (`id_detail_tr`, `id_transaksi`, `id_barang`, `jumlah`, `harga_beli`, `harga_jual`) VALUES
(1, 'TR00000001', 3, 1, 1500000, 2000000),
(2, 'TR00000001', 3, 1, 1500000, 2000000),
(3, 'TR00000001', 5, 1, 1500000, 2000000),
(4, 'TR00000001', 7, 1, 12000000, 12500000),
(5, 'TR00000001', 19, 3, 90000000, 96000000),
(6, 'TR00000002', 26, 1, 9000000, 12000000),
(7, 'TR00000003', 5, 1, 1500000, 2000000),
(8, 'TR00000004', 6, 1, 3000000, 4000000),
(9, 'TR00000005', 5, 1, 1500000, 2000000),
(12, 'TR00000007', 5, 1, 1500000, 2000000),
(13, 'TR00000009', 13, 1, 4500000, 5000000),
(19, 'TR00000011', 5, 1, 1500000, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_trx` int(11) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `nama_pembeli` varchar(30) NOT NULL,
  `no_telpon` int(15) NOT NULL,
  `tanggal` datetime NOT NULL,
  `bayar` int(9) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_trx`, `id_transaksi`, `id_kasir`, `nama_pembeli`, `no_telpon`, `tanggal`, `bayar`, `status`) VALUES
(1, 'TR00000001', 3, 'Teddy', 2147483647, '2018-11-13 12:25:49', 200000000, 1),
(2, 'TR00000002', 4, 'Sageri', 89009889, '2018-11-13 12:42:07', 13000000, 1),
(3, 'TR00000003', 3, 'Sageri', 2147483647, '2018-11-13 12:33:03', 2000000, 1),
(4, 'TR00000004', 3, 'Sageri FR', 87789987, '2018-11-13 12:43:02', 4000000, 1),
(6, 'TR00000005', 3, 'Choddy', 87765676, '2018-11-13 12:56:11', 2000000, 1),
(7, 'TR00000007', 3, 'cahyono', 8676567, '2018-12-03 02:19:47', 2000000, 1),
(8, 'TR00000008', 3, 'Teddy', 78987, '2018-12-03 02:26:32', 2, 1),
(9, 'TR00000009', 3, 'Teddyw', 87987, '2018-12-03 02:32:23', 5000000, 1),
(10, 'TR00000010', 3, '', 0, '0000-00-00 00:00:00', 0, 0),
(11, 'TR00000011', 12, '', 0, '0000-00-00 00:00:00', 0, 0),
(12, 'TR00000012', 13, '', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `status` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama_user`, `telpon`, `foto`, `status`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin', '851233211', '', '1'),
(2, 'manager', '0795151defba7a4b5dfa89170de46277', 'Manager', '089987789987', '', '2'),
(3, 'kasir', 'de28f8f7998f23ab4194b51a6029416f', 'kasir', '097789987789', '', '3'),
(12, 'cahyono', '4b882c3c7d73f98ac7b7827b31173b83', 'Cahyono R A', '089765674560', '', '3'),
(13, 'rifki', '498e4b31af6ea07d4eaaaa87b011fdbc', 'Rifki Fauzi', '081234567812', '', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `barcode` (`barcode`);

--
-- Indexes for table `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_tr`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_trx`),
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  MODIFY `id_detail_tr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_trx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
