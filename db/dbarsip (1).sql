-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 08:20 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbarsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id_arsip` int(11) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_arsip`
--

INSERT INTO `tbl_arsip` (`id_arsip`, `no_surat`, `tanggal_surat`, `tanggal_diterima`, `perihal`, `id_departemen`, `id_pengirim`, `file`) VALUES
(6, 'ARC/2024/02/29/001', '2024-02-02', '2024-02-02', 'Permintaan Informasi Penawaran Produk', 21, 8, ''),
(7, 'ARC/2024/02/29/00', '0000-00-00', '0000-00-00', '', 21, 0, ''),
(8, 'ARC/2024/02/29/002', '2024-02-02', '2024-02-03', 'Pemberitahuan Perubahan Jadwal Rapat', 25, 5, '65e02e84d9693.png'),
(9, 'ARC/2024/02/29/003', '2024-02-02', '2024-02-04', 'Pemberitahuan Pelaksanaan Training Internal', 18, 7, '65e02ec198341.png'),
(10, 'ARC/2024/02/02/004', '2024-02-02', '2024-02-05', 'Permohonan Izin Cuti', 25, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departemen`
--

CREATE TABLE `tbl_departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_departemen`
--

INSERT INTO `tbl_departemen` (`id_departemen`, `nama_departemen`) VALUES
(21, ' Puskesmas'),
(19, 'Gramedia'),
(25, 'Human Resources Department (HRD)'),
(18, 'perpustakaan'),
(22, 'Ruang BK'),
(20, 'Rumah Sakit'),
(26, 'sales & marketing'),
(23, 'Sekretariat'),
(24, 'Tata Ruang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengirim_surat`
--

CREATE TABLE `tbl_pengirim_surat` (
  `id_pengirim_surat` int(11) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengirim_surat`
--

INSERT INTO `tbl_pengirim_surat` (`id_pengirim_surat`, `nama_pengirim`, `alamat`, `no_hp`, `email`) VALUES
(3, 'Jaemin', 'Jalan Mawar Indah No. 12, Kelurahan Bintang Sejahtera, Kota Cemerlang', '083820479585', 'jaemin@flowermail.com'),
(4, 'Renjun', 'Perumahan Anggrek Permai Blok C3 No. 45, Desa Dahlia Damai, Kecamatan Surya Makmur', '0887678765453', 'Renjun@starlightmail.net'),
(5, 'Jeno', 'Apartemen Melati Vista Tower 17, Jalan Harmoni Raya, Daerah Sentosa', '087656543241', 'Jeno@oceanviewmail.com'),
(6, 'Haechan', 'Villa Dahlia Persada No. 8, Taman Bunga Indah, Kabupaten Ceria', '0876765435261', 'haechan@cityscapemail.net'),
(7, 'Mark Lee', 'Jalan Flamboyan Sejahtera No. 20, Perumahan Nusa Indah, Kota Damai', '087856545432', 'mark@dreamlandmail.com'),
(8, 'Chenle', 'Rumah Cempaka Permai, Jalan Cendana Asri, Perumahan Delima Indah', '087776765432', 'Chonlo@sunsetmail.ne');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id_arsip`),
  ADD UNIQUE KEY `no_surat` (`no_surat`);

--
-- Indexes for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  ADD PRIMARY KEY (`id_departemen`),
  ADD UNIQUE KEY `nama_departemen` (`nama_departemen`);

--
-- Indexes for table `tbl_pengirim_surat`
--
ALTER TABLE `tbl_pengirim_surat`
  ADD PRIMARY KEY (`id_pengirim_surat`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_pengirim_surat`
--
ALTER TABLE `tbl_pengirim_surat`
  MODIFY `id_pengirim_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
