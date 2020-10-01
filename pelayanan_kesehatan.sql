-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 01 Okt 2020 pada 15.50
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelayanan_kesehatan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_faskes`
--

CREATE TABLE `ms_faskes` (
  `id_faskes` int(10) NOT NULL,
  `jenis_faskes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_faskes`
--

INSERT INTO `ms_faskes` (`id_faskes`, `jenis_faskes`) VALUES
(1, 'Rumah Sakit'),
(2, 'Puskesmas'),
(3, 'Klinik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_gender`
--

CREATE TABLE `ms_gender` (
  `id_gender` int(3) NOT NULL,
  `nama_gender` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_gender`
--

INSERT INTO `ms_gender` (`id_gender`, `nama_gender`) VALUES
(1, 'Pria'),
(2, 'Wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_namafaskes`
--

CREATE TABLE `ms_namafaskes` (
  `id_namafaskes` int(10) NOT NULL,
  `nama_faskes` varchar(100) NOT NULL,
  `id_faskes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_namafaskes`
--

INSERT INTO `ms_namafaskes` (`id_namafaskes`, `nama_faskes`, `id_faskes`) VALUES
(1, 'Puskesmas Tanah Garam', 2),
(2, 'Puskesmas Tanjung Paku', 2),
(3, 'Puskesmas Nan Balimo', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berobat`
--

CREATE TABLE `tb_berobat` (
  `id` int(11) NOT NULL,
  `nik` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` int(3) NOT NULL,
  `keluhan` varchar(200) NOT NULL,
  `tglberobat` date NOT NULL,
  `faskes` int(11) NOT NULL,
  `namafaskes` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_berobat`
--

INSERT INTO `tb_berobat` (`id`, `nik`, `nama`, `gender`, `keluhan`, `tglberobat`, `faskes`, `namafaskes`, `alamat`) VALUES
(20, 12345661, 'Dono', 1, 'Demam', '2020-08-28', 2, 2, 'Solok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `nik` int(20) NOT NULL,
  `nokk` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` int(3) NOT NULL,
  `tempatlahir` varchar(100) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwd` varchar(200) NOT NULL,
  `faskes` int(10) NOT NULL,
  `nama_faskes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`nik`, `nokk`, `nama`, `gender`, `tempatlahir`, `tgllahir`, `alamat`, `email`, `passwd`, `faskes`, `nama_faskes`) VALUES
(1234566, 1234567, 'Asda', 1, 'Solok', '2020-08-19', 'Tanah Garam', 'asda@gmail.com', '$2y$10$fXcffhi7gRLBInLKxLhwg.CA65C6j/C3avahGi67Ukb1UkEz3GiO2', 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `isActive` int(11) NOT NULL,
  `accessRole` int(11) NOT NULL,
  `faskes` int(11) NOT NULL,
  `nama_faskes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id`, `username`, `passwd`, `isActive`, `accessRole`, `faskes`, `nama_faskes`) VALUES
(1, 'admin', '$2y$10$5aHOMuPVeZTbIuMGhwmZ5eoDngr1YdwU1qBDpluuMiNrpu5slMJyC', 1, 1, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ms_faskes`
--
ALTER TABLE `ms_faskes`
  ADD PRIMARY KEY (`id_faskes`);

--
-- Indeks untuk tabel `ms_gender`
--
ALTER TABLE `ms_gender`
  ADD PRIMARY KEY (`id_gender`);

--
-- Indeks untuk tabel `ms_namafaskes`
--
ALTER TABLE `ms_namafaskes`
  ADD PRIMARY KEY (`id_namafaskes`);

--
-- Indeks untuk tabel `tb_berobat`
--
ALTER TABLE `tb_berobat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ms_namafaskes`
--
ALTER TABLE `ms_namafaskes`
  MODIFY `id_namafaskes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_berobat`
--
ALTER TABLE `tb_berobat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
