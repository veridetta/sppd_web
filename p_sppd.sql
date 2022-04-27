-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 12:30 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `p_sppd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`id` int(4) NOT NULL,
  `username` varchar(49) NOT NULL,
  `password` varchar(49) NOT NULL,
  `level` varchar(25) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `level`) VALUES
(1, 'operator', 'operator', 'operator'),
(2, 'kabag', 'kabag', 'kabag');

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE IF NOT EXISTS `biaya` (
`id_biaya` int(5) NOT NULL,
  `id_tujuan` varchar(100) NOT NULL,
  `lumpsum` varchar(100) NOT NULL,
  `penginapan` varchar(100) NOT NULL,
  `transportasi` varchar(100) NOT NULL,
  `id_golongan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `id_tujuan`, `lumpsum`, `penginapan`, `transportasi`, `id_golongan`) VALUES
(1, '1-2-3-4-5', '550000', '100000', '100000', '2'),
(2, '1-2-3-4-5', '420000', '100000', '100000', '3'),
(3, '1-2-3-4-5', '340000', '100000', '100000', '4'),
(4, '1-2-3-4-5', '280000', '100000', '100000', '5'),
(5, '1-2-3-4-5', '210000', '100000', '100000', '6'),
(6, '1-2-3-4-5', '170000', '100000', '100000', '7'),
(7, '7', '6000000', '400000', '300000', '5'),
(9, '1-2', '340000', '100000', '100000', '4'),
(10, '6', '340000', '100000', '100000', '4'),
(11, '11-12-13-14', '800000', '900000', '1000000', '3');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
`id_golongan` int(10) NOT NULL,
  `golongan` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `golongan`) VALUES
(4, 'Golongan IV'),
(5, 'Golongan III'),
(6, 'Golongan II'),
(7, 'Golongan I dan PTT');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE IF NOT EXISTS `instansi` (
  `id` int(10) NOT NULL,
  `namainstansi` varchar(255) NOT NULL,
  `keteranganinstansi` varchar(255) NOT NULL,
  `alamatlengkapinstansi` varchar(255) NOT NULL,
  `kotainstansi` varchar(255) NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `faks` varchar(255) NOT NULL,
  `pimpinaninstansi` varchar(255) NOT NULL,
  `namapimpinaninstansi` varchar(255) NOT NULL,
  `nippimpinaninstansi` varchar(255) NOT NULL,
  `jabatanpimpinaninstansi` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id`, `namainstansi`, `keteranganinstansi`, `alamatlengkapinstansi`, `kotainstansi`, `kodepos`, `telp`, `faks`, `pimpinaninstansi`, `namapimpinaninstansi`, `nippimpinaninstansi`, `jabatanpimpinaninstansi`) VALUES
(1, 'PEMERINTAH PROVINSI', 'SEKRETARIAT DAERAH', 'jl. Pahlawan No 9', 'Kota Semarang', '50249', '0897-4650-548', '0897-4650-548', 'Kepala Bagian', 'Dr. Ir. Ihwan Sudrajat, MM', '19601012 198903 1 005', 'PEMBINA UTAMA MADYA');

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE IF NOT EXISTS `kwitansi` (
`id_kwitansi` int(11) NOT NULL,
  `id_sppd` int(4) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `dari` text NOT NULL,
  `untuk` text NOT NULL,
  `lama` varchar(100) NOT NULL,
  `lumpsum` varchar(100) NOT NULL,
  `penginapan` varchar(100) NOT NULL,
  `transportasi` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`id_kwitansi`, `id_sppd`, `id_pegawai`, `dari`, `untuk`, `lama`, `lumpsum`, `penginapan`, `transportasi`, `tujuan`) VALUES
(3, 105, '13', ' KUASA PENGGUNA ANGGARAN / KEPALA BAGIAN KESEJAHTERAAN RAKYAT SEKRETARIAT DAERAH', 'Perjalanan Dinas', '5', '280000', '100000', '100000', 'Kec.Semarang Sel'),
(4, 106, '14', 'Kepala Daerah', 'Perjalanan Dinas', '5', '280000', '100000', '100000', 'Kec.Semarang Sel');

-- --------------------------------------------------------

--
-- Table structure for table `lpd`
--

CREATE TABLE IF NOT EXISTS `lpd` (
`id_lpd` int(5) NOT NULL,
  `id_spt` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `hasil` text NOT NULL,
  `hari` varchar(30) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpd`
--

INSERT INTO `lpd` (`id_lpd`, `id_spt`, `id_pegawai`, `hasil`, `hari`, `tanggal`) VALUES
(1, 50, 13, '		  Adapun hasil perjalanan dinas tersebut adalah sebagai berikut :<br>1. Masyarakat Merasa Antusias Dengan Sosialisasi yang diadakan oleh pemerintah<br>2. Terdapat Keluhan-keluhan dari Petani (Masalah Lahan, Kekurangan Alat)<br><br>', 'Sabtu', '2016-03-12'),
(2, 51, 1, '		  Adapun hasil perjalanan dinas tersebut adalah sebagai berikut :<br>1. Adapun hasil perjalanan dinas tersebut adalah sebagai berikut :<br>2. Adapun hasil perjalanan dinas tersebut adalah sebagai berikut :<br>3. Adapun hasil perjalanan dinas tersebut adalah sebagai berikut : \r\n		  ', 'Jumat', '2016-04-15'),
(3, 60, 13, '		  Adapun hasil perjalanan dinas tersebut adalah sebagai berikut : kita makan bareng\r\n		  ', 'Jumat', '2021-04-16'),
(4, 63, 13, '		  Adapun hasil perjalanan dinas tersebut adalah sebagai berikut : Kami makan makan gaes\r\n		  ', 'Selasa', '2021-04-20'),
(5, 63, 14, 'Adapun hasil perjalanan dinas tersebut adalah sebagai berikut : jadi gan', 'Selasa', '2021-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `nppt`
--

CREATE TABLE IF NOT EXISTS `nppt` (
`id_nppt` int(5) NOT NULL,
  `id_pegawai` varchar(60) NOT NULL,
  `id_tujuan` varchar(100) NOT NULL,
  `maksud` text NOT NULL,
  `id_transportasi` varchar(100) NOT NULL,
  `lama` varchar(25) NOT NULL,
  `tgl_pergi` varchar(25) NOT NULL,
  `tgl_kembali` varchar(25) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nppt`
--

INSERT INTO `nppt` (`id_nppt`, `id_pegawai`, `id_tujuan`, `maksud`, `id_transportasi`, `lama`, `tgl_pergi`, `tgl_kembali`, `status`) VALUES
(92, '13-14', '2', 'Membeli kue tahun baru', '3-4', '5', '2021-04-20', '2021-04-25', 'Y'),
(93, '20', '1', 'Membeli Snack', '3', '1 Hari', '2022-01-10', '2022-01-10', 'Y'),
(94, '15', '1', 'Membeli taplak meja', '3', '1 hari', '2022-01-14', '2022-01-14', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
`id_pegawai` int(5) NOT NULL,
  `nip` varchar(90) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` varchar(200) NOT NULL,
  `id_golongan` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `unitkerja` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `pangkat`, `id_golongan`, `jabatan`, `unitkerja`, `username`, `password`) VALUES
(1, '196103111 198804 1 001', 'Sugeng Suwandono', 'Staf Bagian', '4', 'Staf Bagian', 'Sekretariat Daerah Provinsi Jawa Tengah', '196103111 198804 1 001', '196103111 198804 1 001'),
(13, '19790628 201102 1 001', 'Henry, SE', 'Staf Bagian', '5', 'Analisis Kebijakan', 'Sekretariat Daerah Provinsi Jawa Tengah', '19790628 201102 1 001', '19790628 201102 1 001'),
(14, '19760814 201102 1001', 'Maria Christine, SE', 'Staf Bagian', '5', 'Staf Bagian TU', 'Sekretariat Daerah Provinsi Jawa Tengah', '19760814 201102 1001', '19760814 201102 1001'),
(15, '19760410 200701 1003', 'Puji Haryanti, Msi', 'Staf Bagian', '5', 'Pejabat Pengadaan', 'Sekretariat Daerah Provinsi Jawa Tengah', '19760410 200701 1003', '19760410 200701 1003'),
(30, '199201220 198804 1 001', 'Arya Primanda, SE', 'Staf Bagian', '5', 'Admin TU', 'TU Organisasi', '199201220 198804 1 001', '199201220 198804 1 001'),
(16, '19850622 201001 2 024', 'Indriatmo, SE', 'Staf Bagian', '4', 'Bendahara', 'Sekretariat Daerah Provinsi Jawa Tengah', '19850622 201001 2 024', '19850622 201001 2 024'),
(17, '19770403 2012 12 1 003', 'Winarti, M.Si', 'Pengatur Muda', '5', 'Kasubbag TU', 'Sekretariat Daerah Provinsi Jawa Tengah', '19770403 2012 12 1 003', '19770403 2012 12 1 003'),
(20, '19830403 201102 1001', 'Irfan Nuzul, S.Tr,Ip', 'Staf Bagian', '5', 'Staf Bagian TU', 'Sekretariat Daerah Provinsi Jawa Tengah', '19830403 201102 1001', '19830403 201102 1001');

-- --------------------------------------------------------

--
-- Table structure for table `sppd`
--

CREATE TABLE IF NOT EXISTS `sppd` (
`id_sppd` int(11) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `id_nppt` varchar(100) NOT NULL,
  `no_sppd` varchar(50) NOT NULL,
  `pemberi_perintah` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `mata_anggaran` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `tgl_sppd` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sppd`
--

INSERT INTO `sppd` (`id_sppd`, `id_pegawai`, `id_nppt`, `no_sppd`, `pemberi_perintah`, `instansi`, `mata_anggaran`, `keterangan`, `tgl_sppd`) VALUES
(105, '13', '92', '2021/02/19', 'Joni M.Ag', 'Kominfo', 'DIPA2021', 'Tidak Ada', '19/04/2021'),
(106, '14', '92', '2021/02/19', 'Joni M.Ag', 'Kominfo', 'DIPA2021', 'Tidak Ada', '19/04/2021');

-- --------------------------------------------------------

--
-- Table structure for table `spt`
--

CREATE TABLE IF NOT EXISTS `spt` (
`id_spt` int(6) NOT NULL,
  `no_spt` varchar(100) NOT NULL,
  `id_nppt` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `tugas` text NOT NULL,
  `tgl_spt` varchar(50) NOT NULL,
  `dasar_hukum` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spt`
--

INSERT INTO `spt` (`id_spt`, `no_spt`, `id_nppt`, `id_pegawai`, `tugas`, `tgl_spt`, `dasar_hukum`) VALUES
(63, '2021/04/21', '92', '13-14', 'Membeli kue tahun baru', '19/04/2021', '....'),
(64, 'No SPT Belum Ditentukan', '93', '20', 'Membeli Snack', '10/01/2022', 'Dasar Hukum Belum Ditentukan'),
(65, 'No SPT Belum Ditentukan', '94', '15', 'Membeli taplak meja', '16/01/2022', 'Dasar Hukum Belum Ditentukan');

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE IF NOT EXISTS `transportasi` (
`id_transportasi` int(5) NOT NULL,
  `transportasi` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`id_transportasi`, `transportasi`) VALUES
(1, 'Pesawat'),
(2, 'Bus'),
(3, 'Mobil Dinas'),
(4, 'Kereta Api');

-- --------------------------------------------------------

--
-- Table structure for table `ttdkwitansi`
--

CREATE TABLE IF NOT EXISTS `ttdkwitansi` (
`id` int(11) NOT NULL,
  `kabag` varchar(100) NOT NULL,
  `nip_kabag` varchar(100) NOT NULL,
  `bendahara` varchar(100) NOT NULL,
  `nip_bendahara` varchar(100) NOT NULL,
  `pptk` varchar(100) NOT NULL,
  `nip_pptk` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttdkwitansi`
--

INSERT INTO `ttdkwitansi` (`id`, `kabag`, `nip_kabag`, `bendahara`, `nip_bendahara`, `pptk`, `nip_pptk`) VALUES
(1, 'Dr.Ir.Ihwan Sudrajat, MM', '19610311 198804 1 001 1', 'Puji Haryanti, M.Si', '19610311 198804 1 0011', 'Arya Primanda, SE', '19760814 201102 1 0011');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE IF NOT EXISTS `tujuan` (
`id_tujuan` int(5) NOT NULL,
  `tujuan` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `tujuan`) VALUES
(1, 'Kec.Semarang Tengah'),
(2, 'Surakarta'),
(3, 'Yogyakarta'),
(4, 'Boyolali'),
(5, 'Surabaya'),
(6, 'DKI Jakarta'),
(7, 'Kebumen'),
(8, 'Bandung'),
(9, 'Salatiga'),
(10, 'Kendal'),
(11, 'Tegal'),
(12, 'Temanggung'),
(13, 'Surabaya'),
(14, 'Jambi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
 ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
 ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kwitansi`
--
ALTER TABLE `kwitansi`
 ADD PRIMARY KEY (`id_kwitansi`);

--
-- Indexes for table `lpd`
--
ALTER TABLE `lpd`
 ADD PRIMARY KEY (`id_lpd`);

--
-- Indexes for table `nppt`
--
ALTER TABLE `nppt`
 ADD PRIMARY KEY (`id_nppt`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `sppd`
--
ALTER TABLE `sppd`
 ADD PRIMARY KEY (`id_sppd`);

--
-- Indexes for table `spt`
--
ALTER TABLE `spt`
 ADD PRIMARY KEY (`id_spt`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
 ADD PRIMARY KEY (`id_transportasi`);

--
-- Indexes for table `ttdkwitansi`
--
ALTER TABLE `ttdkwitansi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
 ADD PRIMARY KEY (`id_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
MODIFY `id_biaya` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
MODIFY `id_golongan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kwitansi`
--
ALTER TABLE `kwitansi`
MODIFY `id_kwitansi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lpd`
--
ALTER TABLE `lpd`
MODIFY `id_lpd` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nppt`
--
ALTER TABLE `nppt`
MODIFY `id_nppt` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `sppd`
--
ALTER TABLE `sppd`
MODIFY `id_sppd` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `spt`
--
ALTER TABLE `spt`
MODIFY `id_spt` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `transportasi`
--
ALTER TABLE `transportasi`
MODIFY `id_transportasi` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ttdkwitansi`
--
ALTER TABLE `ttdkwitansi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
MODIFY `id_tujuan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
