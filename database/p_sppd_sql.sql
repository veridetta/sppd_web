-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2022 pada 15.52
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p_sppd.sql`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(49) NOT NULL,
  `password` varchar(49) NOT NULL,
  `level` varchar(25) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `level`) VALUES
(1, 'operator', 'operator', 'operator'),
(2, 'kabag', 'kabag', 'kabag');

-- --------------------------------------------------------
--
-- Struktur dari tabel `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(5) NOT NULL,
  `id_tujuan` varchar(100) NOT NULL,
  `lumpsum` varchar(100) NOT NULL,
  `penginapan` varchar(100) NOT NULL,
  `transportasi` varchar(100) NOT NULL,
  `id_golongan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya`
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
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(10) NOT NULL,
  `golongan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `golongan`) VALUES
(2, 'Kepala Daerah'),
(3, 'Sekretaris Daerah'),
(4, 'Golongan IV'),
(5, 'Golongan III'),
(6, 'Golongan II'),
(7, 'Golongan I dan PTT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
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
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id`, `namainstansi`, `keteranganinstansi`, `alamatlengkapinstansi`, `kotainstansi`, `kodepos`, `telp`, `faks`, `pimpinaninstansi`, `namapimpinaninstansi`, `nippimpinaninstansi`, `jabatanpimpinaninstansi`) VALUES
(1, 'PEMERINTAH KABUPATEN SOURCECODEKU.COM', 'SEKRETARIAT DAERAH', 'Jl. Raya Lubuk Begalung, Kota Padang, Sumatera Barat, Indonesia', 'Kota Padang', '12345', '0897-4650-548', '0897-4650-548', 'BUPATI SOURCECODEKU.COM', 'Dr. Admin, S.E., M.M., M.Si.', '19601012 198903 1 005', 'PEMBINA UTAMA MADYA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kwitansi`
--

CREATE TABLE `kwitansi` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kwitansi`
--

INSERT INTO `kwitansi` (`id_kwitansi`, `id_sppd`, `id_pegawai`, `dari`, `untuk`, `lama`, `lumpsum`, `penginapan`, `transportasi`, `tujuan`) VALUES
(3, 105, '13', ' KUASA PENGGUNA ANGGARAN / KEPALA BAGIAN KESEJAHTERAAN RAKYAT SEKRETARIAT DAERAH', 'Perjalanan Dinas', '5', '280000', '100000', '100000', 'Kec.Rangsang'),
(4, 106, '14', 'Kepala Daerah', 'Perjalanan Dinas', '5', '280000', '100000', '100000', 'Kec.Rangsang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lpd`
--

CREATE TABLE `lpd` (
  `id_lpd` int(5) NOT NULL,
  `id_spt` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL,
  `hasil` text NOT NULL,
  `hari` varchar(30) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lpd`
--

INSERT INTO `lpd` (`id_lpd`, `id_spt`, `id_pegawai`, `hasil`, `hari`, `tanggal`) VALUES
(1, 50, 13, '		  Adapun hasil perjalanan dinas tersebut adalah sebagai berikut :<br>1. Masyarakat Merasa Antusias Dengan Sosialisasi yang diadakan oleh pemerintah<br>2. Terdapat Keluhan-keluhan dari Petani (Masalah Lahan, Kekurangan Alat)<br><br>', 'Sabtu', '2016-03-12'),
(2, 51, 1, '		  Adapun hasil perjalanan dinas tersebut adalah sebagai berikut :<br>1. Adapun hasil perjalanan dinas tersebut adalah sebagai berikut :<br>2. Adapun hasil perjalanan dinas tersebut adalah sebagai berikut :<br>3. Adapun hasil perjalanan dinas tersebut adalah sebagai berikut : \r\n		  ', 'Jumat', '2016-04-15'),
(3, 60, 13, '		  Adapun hasil perjalanan dinas tersebut adalah sebagai berikut : kita makan bareng\r\n		  ', 'Jumat', '2021-04-16'),
(4, 63, 13, '		  Adapun hasil perjalanan dinas tersebut adalah sebagai berikut : Kami makan makan gaes\r\n		  ', 'Selasa', '2021-04-20'),
(5, 63, 14, 'Adapun hasil perjalanan dinas tersebut adalah sebagai berikut : jadi gan', 'Selasa', '2021-04-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nppt`
--

CREATE TABLE `nppt` (
  `id_nppt` int(5) NOT NULL,
  `id_pegawai` varchar(60) NOT NULL,
  `id_tujuan` varchar(100) NOT NULL,
  `maksud` text NOT NULL,
  `id_transportasi` varchar(100) NOT NULL,
  `lama` varchar(25) NOT NULL,
  `tgl_pergi` varchar(25) NOT NULL,
  `tgl_kembali` varchar(25) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nppt`
--

INSERT INTO `nppt` (`id_nppt`, `id_pegawai`, `id_tujuan`, `maksud`, `id_transportasi`, `lama`, `tgl_pergi`, `tgl_kembali`, `status`) VALUES
(92, '13-14', '2', 'Membeli kue tahun baru', '3-4', '5', '2021-04-20', '2021-04-25', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `nip` varchar(90) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` varchar(200) NOT NULL,
  `id_golongan` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `unitkerja` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `pangkat`, `id_golongan`, `jabatan`, `unitkerja`, `username`, `password`) VALUES
(1, '196103111 198804 1 001', 'Rosdaner, S.Pd', 'Pembina', '4', 'Kepala Bagian Kesejahteraan Rakyat', 'Sekretariat Daerah Kabupaten Kepulauan Meranti', '196103111 198804 1 001', '196103111 198804 1 001'),
(13, '19790628 201102 1 001', 'Kurniawan Hadiputra, SE', ' Penata Muda Tk.I', '5', 'Kasubbag Pemuda dan Olahraga', 'Sekretariat Daerah Kabupaten Kepulauan Meranti', '19790628 201102 1 001', '19790628 201102 1 001'),
(14, '19760814 201102 1001', 'Agus Hatorangan, S.Ag', 'Penata Muda Tk.I', '5', 'Kasubbah Kesejahteraan Sosial', 'Sekretariat Daerah Kabupaten Kepulauan Meranti', '19760814 201102 1001', '19760814 201102 1001'),
(15, '19760410 200701 1003', 'Husni Mubarak, S. Ag, M.Pd.I', 'Penata Muda Tk.I', '5', 'Kasubbag Pendidikan Agama dan Kebudayaan ', 'Sekretariat Daerah Kabupaten Kepulauan Meranti', '19760410 200701 1003', '19760410 200701 1003'),
(16, '19850622 201001 2 024', 'Sesi Suswanti, S.Pd', 'Penata Muda', '5', 'Staf Bagian Kesejahteraan Rakyat', 'Sekretariat Daerah Kabupaten Kepulauan Meranti', '19850622 201001 2 024', '19850622 201001 2 024'),
(17, '19770403 2012 12 1 003', 'Agusnadi', 'Pengatur Muda', '5', 'Staf Bagian Kesejahteraan Rakyat', 'Sekretariat Daerah Kabupaten Kepulauan Meranti', '19770403 2012 12 1 003', '19770403 2012 12 1 003'),
(20, '19830403 201102 1001', 'Desy Erita', 'Penata Muda', '5', 'Staf Bagian Kesejahteraan Rakyat', 'Sekretariat Daerah Kabupaten Kepulauan Meranti', '19830403 201102 1001', '19830403 201102 1001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sppd`
--

CREATE TABLE `sppd` (
  `id_sppd` int(11) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `id_nppt` varchar(100) NOT NULL,
  `no_sppd` varchar(50) NOT NULL,
  `pemberi_perintah` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `mata_anggaran` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `tgl_sppd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sppd`
--

INSERT INTO `sppd` (`id_sppd`, `id_pegawai`, `id_nppt`, `no_sppd`, `pemberi_perintah`, `instansi`, `mata_anggaran`, `keterangan`, `tgl_sppd`) VALUES
(105, '13', '92', '2021/02/19', 'Joni M.Ag', 'Kominfo', 'DIPA2021', 'Tidak Ada', '19/04/2021'),
(106, '14', '92', '2021/02/19', 'Joni M.Ag', 'Kominfo', 'DIPA2021', 'Tidak Ada', '19/04/2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spt`
--

CREATE TABLE `spt` (
  `id_spt` int(6) NOT NULL,
  `no_spt` varchar(100) NOT NULL,
  `id_nppt` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `tugas` text NOT NULL,
  `tgl_spt` varchar(50) NOT NULL,
  `dasar_hukum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spt`
--

INSERT INTO `spt` (`id_spt`, `no_spt`, `id_nppt`, `id_pegawai`, `tugas`, `tgl_spt`, `dasar_hukum`) VALUES
(63, '2021/04/21', '92', '13-14', 'Membeli kue tahun baru', '19/04/2021', '....');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportasi`
--

CREATE TABLE `transportasi` (
  `id_transportasi` int(5) NOT NULL,
  `transportasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transportasi`
--

INSERT INTO `transportasi` (`id_transportasi`, `transportasi`) VALUES
(1, 'Pompong'),
(2, 'Kapal Feri'),
(3, 'Pesawat'),
(4, 'Bus'),
(5, 'Mobil Dinas'),
(6, 'Kereta Api');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttdkwitansi`
--

CREATE TABLE `ttdkwitansi` (
  `id` int(11) NOT NULL,
  `kabag` varchar(100) NOT NULL,
  `nip_kabag` varchar(100) NOT NULL,
  `bendahara` varchar(100) NOT NULL,
  `nip_bendahara` varchar(100) NOT NULL,
  `pptk` varchar(100) NOT NULL,
  `nip_pptk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ttdkwitansi`
--

INSERT INTO `ttdkwitansi` (`id`, `kabag`, `nip_kabag`, `bendahara`, `nip_bendahara`, `pptk`, `nip_pptk`) VALUES
(1, 'ROSDANER,S.Pd', '19610311 198804 1 001 1', 'ABU BAKAR SALEH,A.Ma', '19610311 198804 1 0011', 'Bambang. S.ag', '19760814 201102 1 0011');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` int(5) NOT NULL,
  `tujuan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `tujuan`) VALUES
(1, 'Kec.Tebing Tinggi Timur'),
(2, 'Kec.Rangsang'),
(3, 'Kec.Merbau'),
(4, 'Kec. Pulau Merbau'),
(5, 'Kec.Rangsang Barat'),
(6, 'Batam'),
(7, 'Pekanbaru'),
(8, 'Tanjung Pinang'),
(9, 'Kab. Pelelawan'),
(10, 'Kab.Bengkalis'),
(11, 'Bandung'),
(12, 'Yogyakarta'),
(13, 'Surabaya'),
(14, 'Jambi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`id_kwitansi`);

--
-- Indeks untuk tabel `lpd`
--
ALTER TABLE `lpd`
  ADD PRIMARY KEY (`id_lpd`);

--
-- Indeks untuk tabel `nppt`
--
ALTER TABLE `nppt`
  ADD PRIMARY KEY (`id_nppt`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `sppd`
--
ALTER TABLE `sppd`
  ADD PRIMARY KEY (`id_sppd`);

--
-- Indeks untuk tabel `spt`
--
ALTER TABLE `spt`
  ADD PRIMARY KEY (`id_spt`);

--
-- Indeks untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id_transportasi`);

--
-- Indeks untuk tabel `ttdkwitansi`
--
ALTER TABLE `ttdkwitansi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kwitansi`
--
ALTER TABLE `kwitansi`
  MODIFY `id_kwitansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lpd`
--
ALTER TABLE `lpd`
  MODIFY `id_lpd` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `nppt`
--
ALTER TABLE `nppt`
  MODIFY `id_nppt` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `sppd`
--
ALTER TABLE `sppd`
  MODIFY `id_sppd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT untuk tabel `spt`
--
ALTER TABLE `spt`
  MODIFY `id_spt` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id_transportasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ttdkwitansi`
--
ALTER TABLE `ttdkwitansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
