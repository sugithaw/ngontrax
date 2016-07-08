-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2016 at 09:18 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngontrax`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_depan`, `nama_belakang`, `jk`, `no_telp`, `email`, `password`, `foto`) VALUES
(1, 'Budi', 'Harta', 'L', '087861448382', 'budiharta_21@live.com', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(2) NOT NULL,
  `agama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(12, 'Hindu'),
(13, 'Islam'),
(14, 'Budha'),
(15, 'Kristen');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(9) NOT NULL,
  `no_identitas` varchar(16) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_agama` int(2) NOT NULL,
  `status_kawin` varchar(1) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat_asal` text NOT NULL,
  `level` int(1) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto` varchar(14) NOT NULL,
  `confirmed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_kamar`
--

CREATE TABLE `detail_kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_fasilitas` int(3) NOT NULL,
  `kondisi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_kontrakan`
--

CREATE TABLE `detail_kontrakan` (
  `id_kontrakan` int(10) NOT NULL,
  `id_fasilitas` int(3) NOT NULL,
  `kondisi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(3) NOT NULL,
  `fasilitas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `fasilitas`) VALUES
(1, 'AC'),
(2, 'Parkir'),
(3, 'Kamar Mandi');

-- --------------------------------------------------------

--
-- Table structure for table `favorit_kontrakan`
--

CREATE TABLE `favorit_kontrakan` (
  `id_favorit_kontrakan` int(10) NOT NULL,
  `id_anggota` int(9) NOT NULL,
  `id_kontrakan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorit_kos`
--

CREATE TABLE `favorit_kos` (
  `id_favorit_kos` int(10) NOT NULL,
  `id_anggota` int(9) NOT NULL,
  `id_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iklan_kontrakan`
--

CREATE TABLE `iklan_kontrakan` (
  `id_iklan_kontrakan` int(10) NOT NULL,
  `id_kontrakan` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `status_iklan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iklan_kos`
--

CREATE TABLE `iklan_kos` (
  `id_iklan_kos` int(10) NOT NULL,
  `id_rumah_kos` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `status_iklan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kamar_kos`
--

CREATE TABLE `kamar_kos` (
  `id_kamar` int(11) NOT NULL,
  `id_rumah_kos` int(10) NOT NULL,
  `nama_kmr_kos` int(2) NOT NULL,
  `luas` int(2) NOT NULL,
  `harga` int(7) NOT NULL,
  `air` varchar(10) NOT NULL,
  `listrik` int(5) NOT NULL,
  `foto` varchar(16) NOT NULL,
  `video` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(3, 'Villa'),
(4, 'Guest House'),
(5, 'Home Stay');

-- --------------------------------------------------------

--
-- Table structure for table `kontrakan`
--

CREATE TABLE `kontrakan` (
  `id_kontrakan` int(10) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `id_pemilik` int(9) NOT NULL,
  `nama_kontrakan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `luas` int(5) NOT NULL,
  `jumlah_lantai` int(2) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(8) NOT NULL,
  `air` varchar(10) NOT NULL,
  `listrik` int(5) NOT NULL,
  `id_kota` int(3) NOT NULL,
  `x` varchar(11) NOT NULL,
  `y` varchar(11) NOT NULL,
  `foto` varchar(15) NOT NULL,
  `video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(3) NOT NULL,
  `id_provinsi` int(2) NOT NULL,
  `kota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_provinsi`, `kota`) VALUES
(11, 1, 'Denpasar'),
(13, 2, 'Jakarta'),
(14, 3, 'Kota Nyaa');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(9) NOT NULL,
  `no_identitas` varchar(16) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_agama` int(2) NOT NULL,
  `status_kawin` varchar(1) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto` varchar(14) NOT NULL,
  `confirmed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyewa_kontrakan`
--

CREATE TABLE `penyewa_kontrakan` (
  `id_anggota` int(9) NOT NULL,
  `id_kontrakan` int(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyewa_kos`
--

CREATE TABLE `penyewa_kos` (
  `id_kamar` int(11) NOT NULL,
  `id_anggota` int(9) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(2) NOT NULL,
  `provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `provinsi`) VALUES
(1, 'Bali'),
(2, 'Jawa Barat'),
(3, 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `review_kontrakan`
--

CREATE TABLE `review_kontrakan` (
  `id_review_kontrakan` int(10) NOT NULL,
  `id_kontrakan` int(10) NOT NULL,
  `id_anggota` int(9) NOT NULL,
  `isi` text NOT NULL,
  `rate` int(1) NOT NULL,
  `tgl_review` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review_kos`
--

CREATE TABLE `review_kos` (
  `id_review_kos` int(10) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_anggota` int(9) NOT NULL,
  `isi` text NOT NULL,
  `rate` int(1) NOT NULL,
  `tgl_review` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kontrakan`
--

CREATE TABLE `riwayat_kontrakan` (
  `id_riwayat_kontrakan` int(10) NOT NULL,
  `id_anggota` int(9) NOT NULL,
  `id_kontrakan` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `penjelasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kos`
--

CREATE TABLE `riwayat_kos` (
  `id_riwayat_kos` int(10) NOT NULL,
  `id_anggota` int(9) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `penjelasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rumah_kos`
--

CREATE TABLE `rumah_kos` (
  `id_rumah_kos` int(10) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `id_pemilik` int(9) NOT NULL,
  `nama_rumah_kos` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `luas` int(5) NOT NULL,
  `jumlah_lantai` int(2) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kota` int(3) NOT NULL,
  `x` varchar(11) NOT NULL,
  `y` varchar(11) NOT NULL,
  `foto` varchar(15) NOT NULL,
  `video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_kontrakan`
--

CREATE TABLE `tagihan_kontrakan` (
  `id_tagihan_kontrakan` int(10) NOT NULL,
  `id_anggota` int(9) NOT NULL,
  `id_kontrakan` int(10) NOT NULL,
  `periode` varchar(19) NOT NULL,
  `bayar` int(9) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_kos`
--

CREATE TABLE `tagihan_kos` (
  `id_tagihan_kos` int(10) NOT NULL,
  `id_anggota` int(9) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `bulan_tagihan` int(2) NOT NULL,
  `listrik` int(7) NOT NULL,
  `air` int(7) NOT NULL,
  `tambahan` int(7) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kota`
--
CREATE TABLE `view_kota` (
`id_provinsi` int(2)
,`id_kota` int(3)
,`provinsi` varchar(30)
,`kota` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `view_kota`
--
DROP TABLE IF EXISTS `view_kota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kota`  AS  select `provinsi`.`id_provinsi` AS `id_provinsi`,`kota`.`id_kota` AS `id_kota`,`provinsi`.`provinsi` AS `provinsi`,`kota`.`kota` AS `kota` from (`kota` join `provinsi` on((`kota`.`id_provinsi` = `provinsi`.`id_provinsi`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `favorit_kos`
--
ALTER TABLE `favorit_kos`
  ADD PRIMARY KEY (`id_favorit_kos`);

--
-- Indexes for table `iklan_kontrakan`
--
ALTER TABLE `iklan_kontrakan`
  ADD PRIMARY KEY (`id_iklan_kontrakan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontrakan`
--
ALTER TABLE `kontrakan`
  ADD PRIMARY KEY (`id_kontrakan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `review_kos`
--
ALTER TABLE `review_kos`
  ADD PRIMARY KEY (`id_review_kos`);

--
-- Indexes for table `riwayat_kos`
--
ALTER TABLE `riwayat_kos`
  ADD PRIMARY KEY (`id_riwayat_kos`);

--
-- Indexes for table `rumah_kos`
--
ALTER TABLE `rumah_kos`
  ADD PRIMARY KEY (`id_rumah_kos`);

--
-- Indexes for table `tagihan_kontrakan`
--
ALTER TABLE `tagihan_kontrakan`
  ADD PRIMARY KEY (`id_tagihan_kontrakan`);

--
-- Indexes for table `tagihan_kos`
--
ALTER TABLE `tagihan_kos`
  ADD PRIMARY KEY (`id_tagihan_kos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `favorit_kos`
--
ALTER TABLE `favorit_kos`
  MODIFY `id_favorit_kos` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iklan_kontrakan`
--
ALTER TABLE `iklan_kontrakan`
  MODIFY `id_iklan_kontrakan` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kontrakan`
--
ALTER TABLE `kontrakan`
  MODIFY `id_kontrakan` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `review_kos`
--
ALTER TABLE `review_kos`
  MODIFY `id_review_kos` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `riwayat_kos`
--
ALTER TABLE `riwayat_kos`
  MODIFY `id_riwayat_kos` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rumah_kos`
--
ALTER TABLE `rumah_kos`
  MODIFY `id_rumah_kos` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tagihan_kontrakan`
--
ALTER TABLE `tagihan_kontrakan`
  MODIFY `id_tagihan_kontrakan` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tagihan_kos`
--
ALTER TABLE `tagihan_kos`
  MODIFY `id_tagihan_kos` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
