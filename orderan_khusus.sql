-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Des 2017 pada 08.38
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orderan_khusus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `status` varchar(5) NOT NULL,
  `jadi` varchar(5) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `keterangan_konfirm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kemasan` varchar(30) NOT NULL,
  `cabang` varchar(10) NOT NULL,
  `nama pemesan` varchar(30) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_supplier`
--

CREATE TABLE `order_supplier` (
  `id_order` int(11) NOT NULL,
  `nama_sc` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kemasan` varchar(30) NOT NULL,
  `cabang` varchar(30) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `nama_purchasing` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `konfirmasi` varchar(255) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_supplier`
--

INSERT INTO `order_supplier` (`id_order`, `nama_sc`, `tanggal`, `nama_barang`, `jumlah`, `kemasan`, `cabang`, `cp`, `nama_purchasing`, `status`, `konfirmasi`, `keterangan`) VALUES
(1, 'Asrul', '2017-10-17', 'WLD 731', 4, 'GALON', 'CWA 1', 'GINIK', 'Refo Junior', 'Ada', 'Jadi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesan`
--

CREATE TABLE `pemesan` (
  `id_pemesan` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesan`
--

INSERT INTO `pemesan` (`id_pemesan`, `nama_pemesan`, `alamat`) VALUES
(1, 'CWA 1', 'Jl. Imam Bonjol'),
(2, 'CWA 2', 'Jl Imam Bonjol'),
(3, 'CWA 3', 'Jl. Buluh Indah'),
(4, 'CWA 4', 'Jl. Raya Canggu'),
(14, 'CWA 5', 'Jl. teuku Umar'),
(15, 'CWA 6', 'Jl. Sunset Road'),
(16, 'CWA 7', 'Jl. Gatsu Timur'),
(17, 'CWA 8', 'Jl. Cok Rai Pudak'),
(18, 'CWA 9', 'Jl. Nusa Dua'),
(19, 'CWA 10', 'Jl. Mahendradatta '),
(20, 'CWA 11', 'Jl. Mahendradatta Semabaung'),
(21, 'CWA 12', 'Jl. By Pass Kediri Tabanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `privilege`) VALUES
(1, 'refo', '9009337cf16333f07109b593405cf7552ed8059a', 'spv'),
(2, 'asrul', '52b337a9d416dcdcd505f59e20b455d2ba0ef61f', 'sc'),
(3, 'sukari', '8d4f76e75d51a932b2b291a356c7d30915445671', 'purchasing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_supplier`
--
ALTER TABLE `order_supplier`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id_pemesan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_supplier`
--
ALTER TABLE `order_supplier`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id_pemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
