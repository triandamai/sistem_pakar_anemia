-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Des 2019 pada 08.08
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spanemia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(36) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` varchar(30) NOT NULL,
  `id_admin` varchar(36) NOT NULL,
  `judul_artikel` varchar(150) NOT NULL,
  `isi_artikel` text NOT NULL,
  `thumbnail` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `id_konsultasi` varchar(20) NOT NULL,
  `id_gejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyakit`
--

CREATE TABLE `detail_penyakit` (
  `id_penyakit` varchar(5) NOT NULL,
  `id_gejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(50) NOT NULL,
  `deskripsi_gejala` text NOT NULL,
  `foto` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` varchar(30) NOT NULL,
  `id_user` varchar(36) NOT NULL,
  `tanggal_konsultasi` datetime NOT NULL,
  `id_penyakit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` varchar(5) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `deskripsi_penyakit` text NOT NULL,
  `solusi_penyakit` text NOT NULL,
  `foto` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(36) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `fk_artikel_admin` (`id_admin`);

--
-- Indexes for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD KEY `fk_konsultasi_detail` (`id_konsultasi`),
  ADD KEY `fk_konsultasi_gejala` (`id_gejala`);

--
-- Indexes for table `detail_penyakit`
--
ALTER TABLE `detail_penyakit`
  ADD KEY `fk_penyakit_detail` (`id_penyakit`),
  ADD KEY `fk_penyakit_gejala` (`id_gejala`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `fk_konsultasi_penyakit` (`id_penyakit`),
  ADD KEY `fk_konsultasi_user` (`id_user`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `fk_artikel_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD CONSTRAINT `fk_konsultasi_detail` FOREIGN KEY (`id_konsultasi`) REFERENCES `konsultasi` (`id_konsultasi`),
  ADD CONSTRAINT `fk_konsultasi_gejala` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`);

--
-- Ketidakleluasaan untuk tabel `detail_penyakit`
--
ALTER TABLE `detail_penyakit`
  ADD CONSTRAINT `fk_penyakit_detail` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`),
  ADD CONSTRAINT `fk_penyakit_gejala` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`);

--
-- Ketidakleluasaan untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `fk_konsultasi_penyakit` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`),
  ADD CONSTRAINT `fk_konsultasi_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
