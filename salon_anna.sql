-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2019 at 02:56 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon_anna`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$yZ1WDQV7MoQrQtgskYjA2eIxLL/hDB7ORFUMRwQsbIUVEep0IX8zG', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kelengkapan` text NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_nota`, `nama_barang`, `kelengkapan`, `jumlah_barang`, `harga_sewa`) VALUES
(11, 8, 'barang1', 'jas, topi', 1, 200000),
(12, 8, 'barang2', 'jas, vest', 2, 150000),
(14, 10, 'barang 1', 'topi, jas', 1, 100000),
(15, 11, 'barang2', 'lengkap', 1, 10000),
(19, 14, 'barang 1', 'jas, vast', 2, 10000),
(20, 15, 'barang 1', 'jas, vast', 2, 10000),
(21, 16, 'barang 2', 'vas, jas', 1, 10000),
(22, 17, 'barang2', 'barang 1', 1, 1000),
(23, 18, 'barang2', 'vas;vest;jas', 1, 10000),
(25, 20, 'barang2', 'vas, jas, dasi', 1, 100000),
(26, 21, 'barang2', 'vas,dasi,jas', 1, 15000),
(28, 23, 'barang2', 'jaket', 1, 100000),
(29, 24, 'barang2', 'arang', 1, 100000),
(32, 26, 'barang2', 'v', 1, 100000),
(33, 26, 'barang 1', 'a', 1, 100000),
(34, 27, 'barang2', 'd', 1, 100000),
(35, 27, 'barang 1', 'a', 1, 200000),
(36, 28, 'barang2', 'barang1,barang2', 1, 100000),
(37, 28, 'barang3', 'jas,dasi', 2, 100000),
(38, 29, 'barang2', 'vas,jas', 0, 1000),
(39, 29, 'barang1', 'celana,rompi', 0, 2000),
(40, 30, 'barang2', 'jas,celana', 0, 0),
(41, 30, 'celana', 'dasi,gesper', 0, 0),
(42, 31, 'barang2', 'jas,celana', 0, 1000),
(43, 31, 'barang 1', 'celana,jas', 0, 230),
(45, 33, 'barang2', 'jas,celana', 1, 10000),
(46, 34, 'barang2', 'JAS,DASI', 1, 10000),
(47, 35, 'Barang1', 'Baju, Celana, Jas, Topi, sabuk', 1, 100000),
(48, 35, 'Barang2', 'Celana, Sabuk, Dasi', 1, 50000),
(49, 36, 'barang2', 'sff', 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomer_handphone` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `nomer_handphone`, `alamat`) VALUES
(8, 'Ari', '085774019998', ''),
(20, 'gerge', '43534', ''),
(21, 'Bagus', '08157701341', ''),
(23, 'Bagus', '08157701341', ''),
(24, 'Bagus', '08157701341', ''),
(26, 'Bagus', '08157701341', ''),
(27, '123', '321', ''),
(28, '123', '321', ''),
(29, 'Bagus', '08157701341', ''),
(30, 'Bagus', '08157701341', ''),
(31, 'Bagus', '08157701341', ''),
(33, 'Bagus', '08157701341', ''),
(34, 'Bagus', '08157701341', ''),
(35, 'Bagus', 'ergreg', ''),
(36, 'regge', '08157701341', ''),
(37, 'Bagus', '08157701341', ''),
(38, '', '', ''),
(39, 'Ari', '0324235', ''),
(40, 'Bagus', '08157701341', ''),
(41, 'Bagus', '08157701341', ''),
(42, 'Bagus', '08157701341', ''),
(43, 'Bagus', '08157701341', ''),
(44, 'Bagus', '08157701341', ''),
(45, 'Bagus', '08157701341', ''),
(46, 'Bagus', '08157701341', ''),
(47, 'Bagus', '085774019998', ''),
(48, 'Asep', '08157701341', ''),
(49, 'Bagus', '0324235', '');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_customers` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `tanggal_sewa` bigint(20) NOT NULL,
  `tanggal_kadaluarsa` bigint(20) NOT NULL,
  `type` enum('meminjam','mengembalikan_sebagian','mengembalikan','membayar_dp') NOT NULL,
  `status` enum('lunas','belum_lunas') NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `terbayar` int(11) NOT NULL,
  `status_barang` enum('terpinjam','kembali','NULL') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id_customers`, `id_nota`, `tanggal_sewa`, `tanggal_kadaluarsa`, `type`, `status`, `harga_sewa`, `terbayar`, `status_barang`) VALUES
(1, 23, 0, 1556125200000, 1556384400000, 'meminjam', 'lunas', 10000, 10000, 'terpinjam'),
(2, 24, 0, 1556557200000, 1556816400000, 'meminjam', 'lunas', 10000, 10000, 'terpinjam'),
(3, 25, 0, 1556557200000, 1556816400000, 'meminjam', 'lunas', 10000, 10000, 'terpinjam'),
(4, 26, 0, 1556557200000, 1556816400000, 'meminjam', 'lunas', 20000, 20000, 'terpinjam'),
(5, 28, 0, 1556730000000, 1556989200000, 'meminjam', 'lunas', 20000, 20000, 'terpinjam'),
(6, 29, 0, 1557507600000, 1557766800000, 'meminjam', 'belum_lunas', 10000, 1000, 'terpinjam'),
(7, 30, 0, 1557853200000, 1558112400000, 'meminjam', 'lunas', 1000, 1000, 'terpinjam'),
(8, 31, 0, 1557853200000, 1558112400000, 'meminjam', 'lunas', 10000, 10000, 'terpinjam'),
(9, 32, 0, 1557853200000, 1558112400000, 'meminjam', 'lunas', 10000, 10000, 'terpinjam'),
(10, 33, 0, 1557853200000, 1558112400000, 'meminjam', 'lunas', 100000, 100000, 'terpinjam'),
(11, 34, 0, 1557853200000, 1558112400000, 'meminjam', 'lunas', 15000, 15000, 'terpinjam'),
(12, 35, 0, 1557853200000, 1558112400000, 'meminjam', 'belum_lunas', 100000, 50000, 'terpinjam'),
(13, 36, 0, 1557853200000, 1558112400000, 'meminjam', 'belum_lunas', 100000, 40000, 'terpinjam'),
(14, 37, 0, 1557853200000, 1558112400000, 'meminjam', 'belum_lunas', 100000, 40000, 'terpinjam'),
(15, 38, 0, 1557853200000, 1558112400000, 'meminjam', 'lunas', 200000, 200000, 'terpinjam'),
(16, 39, 0, 1557853200000, 1558112400000, 'meminjam', 'lunas', 200000, 200000, 'terpinjam'),
(17, 40, 0, 1557853200000, 1558112400000, 'meminjam', 'lunas', 300000, 300000, 'terpinjam'),
(18, 41, 0, 1557853200000, 1558112400000, 'meminjam', 'lunas', 300000, 300000, 'terpinjam'),
(19, 42, 0, 1557853200000, 1558112400000, 'meminjam', 'lunas', 0, 0, 'terpinjam'),
(20, 43, 0, 1557853200000, 1558112400000, 'meminjam', 'lunas', 0, 0, 'terpinjam'),
(21, 44, 0, 1557853200000, 1558112400000, 'meminjam', 'lunas', 0, 0, 'terpinjam'),
(22, 45, 0, 1558112400000, 1558371600000, 'meminjam', 'belum_lunas', 10000, 1000, 'terpinjam'),
(23, 46, 0, 1558112400000, 1558371600000, 'meminjam', 'belum_lunas', 10000, 5000, 'terpinjam'),
(24, 47, 0, 1558544400000, 1558803600000, 'meminjam', 'lunas', 10000, 10000, 'terpinjam'),
(25, 48, 0, 1561309200000, 1561827600000, 'meminjam', 'lunas', 150000, 150000, 'terpinjam'),
(26, 49, 0, 1561309200000, 1561568400000, 'meminjam', 'lunas', 1000, 1000, 'terpinjam');

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan`
--

CREATE TABLE `kelengkapan` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kelengkapan` varchar(255) NOT NULL,
  `status_pinjam` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelengkapan`
--

INSERT INTO `kelengkapan` (`id`, `id_barang`, `kelengkapan`, `status_pinjam`) VALUES
(1, 21, 'vas', 1),
(2, 21, 'jas', 1),
(3, 22, 'barang 1', 0),
(4, 23, 'vas;vest;jas', 0),
(5, 24, 'vas', 0),
(6, 24, 'vest', 0),
(7, 24, 'jast', 0),
(8, 25, 'vas', 1),
(9, 25, ' jas', 1),
(10, 25, ' dasi', 1),
(11, 26, 'vas', 1),
(12, 26, 'dasi', 1),
(13, 26, 'jas', 1),
(14, 27, 'barang', 0),
(15, 28, 'jaket', 0),
(16, 29, 'arang', 0),
(17, 30, 'v', 0),
(18, 31, 'a', 0),
(19, 32, 'v', 0),
(20, 33, 'a', 0),
(21, 34, 'd', 0),
(22, 35, 'a', 0),
(23, 36, 'barang1', 0),
(24, 36, 'barang2', 0),
(25, 37, 'jas', 1),
(26, 37, 'dasi', 1),
(27, 38, 'vas', 0),
(28, 38, 'jas', 0),
(29, 39, 'celana', 1),
(30, 39, 'rompi', 1),
(31, 40, 'jas', 1),
(32, 40, 'celana', 1),
(33, 41, 'dasi', 1),
(34, 41, 'gesper', 1),
(35, 42, 'jas', 1),
(36, 42, 'celana', 1),
(37, 43, 'celana', 1),
(38, 43, 'jas', 1),
(39, 44, 'jas', 0),
(40, 44, 'celana', 0),
(41, 45, 'jas', 1),
(42, 45, 'celana', 1),
(43, 46, 'JAS', 0),
(44, 46, 'DASI', 0),
(45, 47, 'Baju', 1),
(46, 47, ' Celana', 1),
(47, 47, ' Jas', 1),
(48, 47, ' Topi', 1),
(49, 47, ' sabuk', 1),
(50, 48, 'Celana', 1),
(51, 48, ' Sabuk', 1),
(52, 48, ' Dasi', 1),
(53, 49, 'sff', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_customers` int(11) NOT NULL,
  `tanggal_sewa` bigint(20) NOT NULL,
  `tanggal_kadaluarsa` bigint(20) NOT NULL,
  `tanggal_kembali` bigint(20) NOT NULL,
  `status` enum('lunas','belum_lunas') NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `terbayar` int(11) NOT NULL,
  `status_barang` enum('terpinjam','kembali','NULL') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_customers`, `tanggal_sewa`, `tanggal_kadaluarsa`, `tanggal_kembali`, `status`, `harga_sewa`, `terbayar`, `status_barang`) VALUES
(8, 8, 1555970400000, 1556229600000, 0, 'lunas', 350000, 500000, 'kembali'),
(10, 14, 1556143200000, 1556402400000, 0, 'lunas', 100000, 100000, 'kembali'),
(11, 24, 1556557200000, 1556816400000, 0, 'lunas', 10000, 10000, 'kembali'),
(14, 27, 1556730000000, 1556989200000, 0, 'lunas', 20000, 20000, 'kembali'),
(15, 28, 1556730000000, 1556989200000, 0, 'lunas', 20000, 20000, 'kembali'),
(16, 29, 1557507600000, 1557766800000, 0, 'lunas', 10000, 1000, 'kembali'),
(17, 30, 1557853200000, 1558112400000, 0, 'lunas', 1000, 1000, 'kembali'),
(18, 31, 1557853200000, 1558112400000, 0, 'lunas', 10000, 10000, 'kembali'),
(20, 33, 1557853200000, 1558112400000, 0, 'lunas', 100000, 100000, 'kembali'),
(21, 34, 1557853200000, 1558112400000, 0, 'lunas', 15000, 15000, 'kembali'),
(23, 36, 1557853200000, 1558112400000, 0, 'lunas', 100000, 100000, 'kembali'),
(24, 37, 1557853200000, 1558112400000, 0, 'lunas', 100000, 100000, 'kembali'),
(26, 39, 1557853200000, 1558112400000, 0, 'lunas', 200000, 200000, 'kembali'),
(27, 40, 1557853200000, 1558112400000, 0, 'lunas', 300000, 300000, 'kembali'),
(28, 41, 1557853200000, 1558112400000, 0, 'lunas', 300000, 300000, 'kembali'),
(29, 42, 1557853200000, 1558112400000, 0, 'lunas', 0, 0, 'kembali'),
(30, 43, 1557853200000, 1558112400000, 0, 'lunas', 0, 0, 'kembali'),
(31, 44, 1557853200000, 1558112400000, 0, 'lunas', 0, 0, 'kembali'),
(33, 46, 1558112400000, 1558371600000, 0, 'lunas', 10000, 10000, 'kembali'),
(34, 47, 1558544400000, 1558803600000, 0, 'lunas', 10000, 10000, 'kembali'),
(35, 48, 1561309200000, 1561827600000, 0, 'lunas', 150000, 150000, 'kembali'),
(36, 49, 1561309200000, 1561568400000, 0, 'lunas', 1000, 1000, 'terpinjam');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `kelengkapan` text NOT NULL,
  `tanggal_pengembalian` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_barang`, `id_customer`, `id_nota`, `kelengkapan`, `tanggal_pengembalian`) VALUES
(5, 11, 8, 8, 'jas, topi', 1556156950603),
(6, 12, 8, 8, 'jas, vest', 1556156950603),
(7, 14, 14, 10, 'topi, jas', 1556157401050),
(8, 15, 24, 11, 'lengkap', 1556635430795),
(9, 19, 27, 14, 'jas, vast', 1556815932785),
(10, 20, 28, 15, 'jas, vast', 1556818123985),
(11, 21, 29, 16, 'jas', 1557933876258),
(12, 21, 29, 16, 'jas', 1557933915567),
(13, 21, 29, 16, 'vas', 1557933922000),
(14, 22, 30, 17, 'barang 1', 1557933984709),
(15, 23, 31, 18, 'vas;vest;jas', 1557934034795),
(16, 25, 33, 20, ' dasi', 1557934495023),
(17, 25, 33, 20, ' jas', 1557934498859),
(18, 25, 33, 20, 'vas', 1557934522591),
(19, 26, 34, 21, 'jas', 1557934895815),
(20, 26, 34, 21, 'dasi', 1557934899932),
(21, 26, 34, 21, 'vas', 1557934904001),
(22, 28, 36, 23, 'jaket', 1557935716810),
(23, 29, 37, 24, 'arang', 1557935717361),
(24, 32, 39, 26, 'v', 1557935717837),
(25, 33, 39, 26, 'a', 1557935717838),
(26, 34, 40, 27, 'd', 1557935718315),
(27, 35, 40, 27, 'a', 1557935718316),
(28, 36, 41, 28, 'barang2', 1557938042624),
(29, 37, 41, 28, 'jas', 1557938886012),
(30, 37, 41, 28, 'jas', 1557939063101),
(31, 39, 42, 29, 'celana', 1557939299874),
(32, 39, 42, 29, 'rompi', 1557939307260),
(33, 41, 43, 30, 'dasi', 1557939391864),
(34, 41, 43, 30, 'gesper', 1557939398054),
(35, 40, 43, 30, 'celana', 1557939402535),
(36, 40, 43, 30, 'jas', 1557939406431),
(37, 43, 44, 31, 'celana', 1557939485946),
(38, 43, 44, 31, 'jas', 1557939492426),
(39, 42, 44, 31, 'jas', 1557939496689),
(40, 42, 44, 31, 'jas', 1557939498811),
(41, 42, 44, 31, 'celana', 1557939498814),
(42, 42, 44, 31, 'jas,celana', 1557939506965),
(43, 43, 44, 31, 'celana,jas', 1557939506966),
(44, 40, 43, 30, 'jas,celana', 1557939508419),
(45, 41, 43, 30, 'dasi,gesper', 1557939508420),
(46, 45, 46, 33, 'jas', 1558156731476),
(47, 45, 46, 33, 'celana', 1558156737066),
(48, 46, 47, 34, 'JAS,DASI', 1558590602164),
(49, 48, 48, 35, ' Dasi', 1561379345158),
(50, 48, 48, 35, ' Sabuk', 1561379345165),
(51, 47, 48, 35, 'Baju', 1561379354091),
(52, 47, 48, 35, ' Topi', 1561379354094),
(53, 47, 48, 35, ' Celana', 1561379354097),
(54, 47, 48, 35, ' sabuk', 1561379354102),
(55, 48, 48, 35, 'Celana', 1561379362555),
(56, 47, 48, 35, ' Jas', 1561379374273);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
