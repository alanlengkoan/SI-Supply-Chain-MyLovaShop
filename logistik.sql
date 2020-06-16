-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Jun 2018 pada 07.14
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_barang`
--

CREATE TABLE `dta_barang` (
  `kd_barang` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `stock_awal` int(15) NOT NULL,
  `stock_terjual` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_barang`
--

INSERT INTO `dta_barang` (`kd_barang`, `nama`, `jumlah`, `harga`, `satuan`, `kondisi`, `stock_awal`, `stock_terjual`) VALUES
('KDR-0001', 'Kulkas', 15, 3500000, 'Unit', 'Ready Stock', 25, 10),
('KDR-0002', 'Televisi (TV)', 25, 4500000, 'Unit', 'Ready Stock', 25, 0),
('KDR-0003', 'VCD Player / DVD Player', 43, 5000000, 'Unit', 'Ready Stock', 55, 12),
('KDR-0004', 'Kipas Angin', 0, 2500000, 'Unit', 'Ready Stock', 0, 0),
('KDR-0005', 'Mesin Cuci', 50, 4000000, 'Unit', 'Ready Stock', 50, 0),
('KDR-0006', 'Suond System', 0, 5000000, 'Unit', 'Ready Stock', 0, 0),
('KDR-0007', 'Handphone', 0, 2999000, 'Unit', 'Ready Stock', 0, 0),
('KDR-0008', 'AC (Air Conditioner)', 0, 4999000, 'Unit', 'Ready Stock', 0, 0),
('KDR-0009', 'Komputer', 25, 5999000, 'Unit', 'Ready Stock', 25, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_supplier`
--

CREATE TABLE `dta_supplier` (
  `id_supplier` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `fax` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_supplier`
--

INSERT INTO `dta_supplier` (`id_supplier`, `nama`, `nomor`, `fax`, `email`, `website`, `alamat`) VALUES
('IDSUP-0001', 'Pt. Maju Mundur', '098765466536', '1111', 'majumundur@gmail.com', 'majumundur.com', 'Makassar'),
('IDSUP-0002', 'Pt. Prima Indah', '367498232102', '1414', 'primaindah@gmail.com', 'primaindah.com', 'Maros'),
('IDSUP-0003', 'Pt. Bintang Prima', '098763747362', '1515', 'bintangprima@gmail.com', 'bintangprima.com', 'Makassar'),
('IDSUP-0004', 'Pt. Indah Sekali', '098754676541', '1515', 'indahsekali@gmail.com', 'indahsekali.com', 'Pangkep');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_trnsaksi_brng_keluar`
--

CREATE TABLE `dta_trnsaksi_brng_keluar` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_supplier` varchar(20) NOT NULL,
  `nmasup` varchar(50) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `nmabar` varchar(50) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `total` int(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_trnsaksi_brng_keluar`
--

INSERT INTO `dta_trnsaksi_brng_keluar` (`id_transaksi`, `id_supplier`, `nmasup`, `kd_barang`, `nmabar`, `jumlah`, `harga`, `total`, `status`, `waktu`) VALUES
('TRSBK-0001', 'IDSUP-0001', 'Pt. Maju Mundur', 'KDR-0003', 'VCD Player / DVD Player', 12, 5000000, 60000000, 'On-Process', '2018-06-28 11.21.11'),
('TRSBK-0002', 'IDSUP-0001', 'Pt. Maju Mundur', 'KDR-0001', 'Kulkas', 10, 3500000, 35000000, 'On-Process', '2018-06-28 15.08.23');

--
-- Trigger `dta_trnsaksi_brng_keluar`
--
DELIMITER $$
CREATE TRIGGER `kurangjumlahbarang` AFTER INSERT ON `dta_trnsaksi_brng_keluar` FOR EACH ROW begin
update dta_barang set jumlah = jumlah-new.jumlah, stock_terjual = stock_terjual+new.jumlah where kd_barang = new.kd_barang;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_trnsaksi_brng_masuk`
--

CREATE TABLE `dta_trnsaksi_brng_masuk` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_supplier` varchar(20) NOT NULL,
  `nmasup` varchar(50) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `nmabar` varchar(50) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `harga` int(15) NOT NULL,
  `total` int(15) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_trnsaksi_brng_masuk`
--

INSERT INTO `dta_trnsaksi_brng_masuk` (`id_transaksi`, `id_supplier`, `nmasup`, `kd_barang`, `nmabar`, `jumlah`, `harga`, `total`, `waktu`) VALUES
('TRSBM-0001', 'IDSUP-0001', 'Pt. Maju Mundur', 'KDR-0009', 'Komputer', 25, 5999000, 149975000, '2018-06-28 10.32.03'),
('TRSBM-0002', 'IDSUP-0001', 'Pt. Maju Mundur', 'KDR-0005', 'Mesin Cuci', 50, 4000000, 200000000, '2018-06-28 10.32.32'),
('TRSBM-0003', 'IDSUP-0004', 'Pt. Indah Sekali', 'KDR-0003', 'VCD Player / DVD Player', 55, 5000000, 275000000, '2018-06-28 10.33.01'),
('TRSBM-0004', 'IDSUP-0003', 'Pt. Bintang Prima', 'KDR-0001', 'Kulkas', 25, 3500000, 87500000, '2018-06-28 15.07.57'),
('TRSBM-0005', 'IDSUP-0004', 'Pt. Indah Sekali', 'KDR-0002', 'Televisi (TV)', 25, 4500000, 112500000, '2018-06-28 19.34.36');

--
-- Trigger `dta_trnsaksi_brng_masuk`
--
DELIMITER $$
CREATE TRIGGER `tambahjumlahbarang` AFTER INSERT ON `dta_trnsaksi_brng_masuk` FOR EACH ROW begin
update dta_barang set jumlah = jumlah+new.jumlah, stock_awal = stock_awal+new.jumlah where kd_barang = new.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk`
--

CREATE TABLE `masuk` (
  `id` int(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masuk`
--

INSERT INTO `masuk` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dta_barang`
--
ALTER TABLE `dta_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `dta_supplier`
--
ALTER TABLE `dta_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `dta_trnsaksi_brng_keluar`
--
ALTER TABLE `dta_trnsaksi_brng_keluar`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `dta_trnsaksi_brng_masuk`
--
ALTER TABLE `dta_trnsaksi_brng_masuk`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
