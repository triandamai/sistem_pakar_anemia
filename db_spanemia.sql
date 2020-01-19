-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jan 2020 pada 03.44
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

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
('1a24d4c3-2d6c-11ea-847f-646e69921e02', 'zaenur', 'zaenur.rochman98@gmail.com', 'admin123', '2020-01-02 00:00:00', '2020-01-18 09:14:32');

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

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_admin`, `judul_artikel`, `isi_artikel`, `thumbnail`, `created_at`, `updated_at`) VALUES
('Artikel_001', '1a24d4c3-2d6c-11ea-847f-646e69921e02', 'Contoh pengumuman', '<p>loreloren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;</p>\r\n', 'Artikel_001.jpeg', '2020-01-14 19:06:24', '2020-01-14 19:06:24'),
('Artikel_002', '1a24d4c3-2d6c-11ea-847f-646e69921e02', 'Judul Terakhir', '<p>loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;</p>\r\n', 'Artikel_002.png', '2020-01-14 19:06:46', '2020-01-14 19:06:46'),
('Artikel_003', '1a24d4c3-2d6c-11ea-847f-646e69921e02', 'Kuliah Online', '<p>loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;</p>\r\n', 'Artikel_003.png', '2020-01-14 19:07:09', '2020-01-14 19:07:09'),
('Artikel_004', '1a24d4c3-2d6c-11ea-847f-646e69921e02', 'loren ipsum dolor sit amet ', '<p>loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;loren ipsum dolor sit amet&nbsp;</p>\r\n', 'Artikel_004.png', '2020-01-14 19:07:45', '2020-01-14 19:07:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `id_konsultasi` varchar(20) NOT NULL,
  `id_gejala` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_konsultasi`
--

INSERT INTO `detail_konsultasi` (`id_konsultasi`, `id_gejala`) VALUES
('KST-001', 'G1'),
('KST-001', 'G2'),
('KST-001', 'G3'),
('KST-001', 'G4'),
('KST-001', 'G5'),
('KST-003', 'G1'),
('KST-003', 'G2'),
('KST-003', 'G3'),
('KST-003', 'G4'),
('KST-003', 'G5'),
('KST-004', 'G14'),
('KST-004', 'G15'),
('KST-005', 'G14'),
('KST-005', 'G15'),
('KST-006', 'G1'),
('KST-006', 'G2'),
('KST-006', 'G3'),
('KST-006', 'G4'),
('KST-006', 'G5'),
('KST-006', 'G5'),
('KST-007', 'G1'),
('KST-007', 'G2'),
('KST-007', 'G3'),
('KST-007', 'G4'),
('KST-007', 'G5'),
('KST-008', 'G1'),
('KST-008', 'G10'),
('KST-008', 'G11'),
('KST-008', 'G12'),
('KST-008', 'G13'),
('KST-009', 'G1'),
('KST-009', 'G2'),
('KST-009', 'G3'),
('KST-009', 'G4'),
('KST-009', 'G5'),
('KST-010', 'G6'),
('KST-010', 'G7'),
('KST-010', 'G8'),
('KST-010', 'G9'),
('KST-011', 'G14'),
('KST-011', 'G15'),
('KST-012', 'G1'),
('KST-012', 'G2'),
('KST-012', 'G3'),
('KST-012', 'G4'),
('KST-012', 'G5'),
('KST-013', 'G6'),
('KST-013', 'G7'),
('KST-013', 'G8'),
('KST-013', 'G9'),
('KST-014', 'G6'),
('KST-014', 'G7'),
('KST-014', 'G8'),
('KST-014', 'G9'),
('KST-015', 'G6'),
('KST-015', 'G7'),
('KST-015', 'G8'),
('KST-015', 'G9'),
('KST-016', 'G6'),
('KST-016', 'G7'),
('KST-016', 'G8'),
('KST-016', 'G9'),
('KST-018', 'G6'),
('KST-018', 'G7'),
('KST-018', 'G8'),
('KST-018', 'G9'),
('KST-019', 'G6'),
('KST-019', 'G7'),
('KST-019', 'G8'),
('KST-019', 'G9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyakit`
--

CREATE TABLE `detail_penyakit` (
  `id_detail_penyakit` varchar(5) NOT NULL,
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

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `deskripsi_gejala`, `foto`, `created_at`, `updated_at`) VALUES
('G1', 'Gejala 1', 'loren ipsum dolor sit amet', '', '2020-01-04 05:24:20', '2020-01-08 18:34:01'),
('G10', 'Mual', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:18:09', '0000-00-00 00:00:00'),
('G11', 'Ruam pada kulit', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:18:59', '0000-00-00 00:00:00'),
('G12', 'Ada darah dalam urine', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:19:17', '0000-00-00 00:00:00'),
('G13', 'Perut dan kaki yang membengkak', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:19:38', '0000-00-00 00:00:00'),
('G14', 'Punya bentuk tubuh, kepala, mata atau ukuran jari-', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:19:57', '0000-00-00 00:00:00'),
('G15', 'Mengalami masalah pada jantung, ginjal, dan tulang', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:20:21', '0000-00-00 00:00:00'),
('G16', 'Luka borok bernanah yang sulit sembuh, biasanya pa', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:20:49', '0000-00-00 00:00:00'),
('G17', 'Limpa bengkak dan perut bagian atas sakit', 'Limpa bengkak dan perut bagian atas sakit', '', '2020-01-06 03:21:12', '0000-00-00 00:00:00'),
('G18', 'Adanya syaraf dalam tubuh yang rusak', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:21:33', '0000-00-00 00:00:00'),
('G19', 'Merasa bingung dan lupa gampang', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:21:52', '0000-00-00 00:00:00'),
('G2', 'ini gejala 2', 'sadasdasd', '', '2020-01-04 05:43:29', '0000-00-00 00:00:00'),
('G20', 'Merasa depresi dan berat badan menurun', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:22:12', '0000-00-00 00:00:00'),
('G21', 'Rentan terhadap infeksi', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:22:34', '0000-00-00 00:00:00'),
('G22', 'Nyeri sendi yang parah ', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:22:57', '0000-00-00 00:00:00'),
('G23', 'Tumbuh kembang anak terlambat ', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:23:19', '0000-00-00 00:00:00'),
('G3', 'ini gejala 3', 'asdjasldjalsd', '', '2020-01-04 05:43:44', '0000-00-00 00:00:00'),
('G4', 'ini gejala 4', 'asdasdkasd', '', '2020-01-04 05:44:07', '0000-00-00 00:00:00'),
('G5', 'ini gejala 5', 'asldhaskjdasd', '', '2020-01-04 05:44:20', '0000-00-00 00:00:00'),
('G6', 'ini gejala 6', 'dasdasdasd', '', '2020-01-04 05:50:48', '0000-00-00 00:00:00'),
('G7', 'Diare', 'loren ipsum dolor sit amet', '', '2020-01-06 03:17:12', '0000-00-00 00:00:00'),
('G8', 'Kulit wajah pucat', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:17:34', '0000-00-00 00:00:00'),
('G9', 'Mati rasa pada bagian tubuh tertentu atau kesemuta', 'loren ipsum dolor sit amet ', '', '2020-01-06 03:17:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` varchar(30) NOT NULL,
  `id_user` varchar(36) NOT NULL,
  `tanggal_konsultasi` datetime NOT NULL,
  `id_penyakit` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `id_user`, `tanggal_konsultasi`, `id_penyakit`) VALUES
('KST-001', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-09 01:34:17', 'P1'),
('KST-003', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-09 01:44:15', 'P1'),
('KST-004', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-09 01:52:17', 'P4'),
('KST-005', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-09 02:06:16', 'P4'),
('KST-006', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-14 18:29:27', 'P1'),
('KST-007', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-14 18:30:27', 'P1'),
('KST-008', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-14 18:34:23', 'P3'),
('KST-009', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-14 19:04:36', 'P1'),
('KST-010', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-14 19:04:54', 'P2'),
('KST-011', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-14 19:05:19', 'P4'),
('KST-012', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-15 02:12:59', 'P1'),
('KST-013', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-15 02:13:20', 'P2'),
('KST-014', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-15 02:13:59', 'P2'),
('KST-015', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-15 02:14:38', 'P2'),
('KST-016', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-15 02:22:48', 'P2'),
('KST-017', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-15 02:27:03', NULL),
('KST-018', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-15 02:27:30', 'P2'),
('KST-019', '78727a0a-2d66-11ea-847f-646e69921e02', '2020-01-15 02:28:50', 'P2');

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

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `deskripsi_penyakit`, `solusi_penyakit`, `foto`, `created_at`, `updated_at`) VALUES
('P1', 'Penyakit 1', 'loren ipsum ', 'loren ipsum', 'Penyakit_P1.jpeg', '2020-01-04 05:35:18', '2020-01-14 19:00:01'),
('P2', 'Tessss', 'asdasdkasd', 'asdhaskjdhkasd', 'Penyakit_P2.jpeg', '2020-01-04 05:37:28', '2020-01-14 19:00:11'),
('P3', 'ini penyakit 3', 'loren ', 'loren', 'Penyakit_P3.jpeg', '2020-01-04 05:49:20', '2020-01-14 19:00:17'),
('P4', 'Anemia fanconi', 'loren ipsum dolor sit amet ', 'Pemberian antibiotic untuk membantu melawan infeksi, operasi untuk memperbaiki cacat lahir atau masalah pencernaan, melakukan transfuse darah, pemberian obat untuk membantu tubuh membuat sel-sel darah lebih efektif. ', 'Penyakit_P4.jpeg', '2020-01-06 03:30:33', '2020-01-14 19:00:26'),
('P5', 'Anemia Hemolitik', '', 'Pengobatannya dengan menghentikan konsumsi obat yang memicu anemia hemolitik, mengobati infeksi, mengonsumsi obat-obatan imunosupresan, atau pengangkatan limpa. ', 'Penyakit_P5.jpeg', '2020-01-06 03:30:58', '2020-01-14 19:00:33'),
('P6', 'Anemia Sel Sabit ', '', 'Kondisi ini ditangani dengan suplemen zat besi dan asam folat, cangkok sumsum tulang, dan pemberian kemoterapi, seperti hydroxyurea. Dalam kondisi tertentu, dokter akan memberikan obat Pereda nyeri dan antibiotic. ', 'Penyakit_P6.jpeg', '2020-01-06 03:37:05', '2020-01-14 19:00:54'),
('P7', 'Thalassemia ', '', 'Dokter dapat melakukan transfuse darah, pemberian suplemen asam folat, pengangkatan limpa, dan cangkok sumsum tulang. ', 'Penyakit_P7.jpeg', '2020-01-06 03:37:25', '2020-01-14 19:00:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(36) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `token`, `status`, `created_at`, `updated_at`) VALUES
('14d6e3bc-3a64-11ea-b6fe-646e69921e02', 'zaeeenur', 'zaenur.rochman98@gmail.com', '$2a$08$qsXewXrBR1T6Dy0ZD.c50e0pIo07ygoMApfyjKpTv/zHZgxMUpfH6', 'emFlZWVudXJfemFlbnVyLnJvY2htYW45OEBnbWFpbC5jb20=', 1, '2020-01-19 03:33:33', '2020-01-19 03:44:28'),
('78727a0a-2d66-11ea-847f-646e69921e02', 'rochman', 'zaenur.rochman98@outlook.com', '$2a$08$lRYONB.rfd8Q7dzkBYvxpu1lAyPgLteCQOItiwIt0Zev0CkNyDfdm', '', 0, '2020-01-02 14:47:47', '2020-01-15 02:28:42'),
('b5e7ab8a-2d66-11ea-847f-646e69921e02', 'zaen', 'zaenur.rochman98@email.com', '$2a$08$Hn5L.9rNJnEmCRhTcjc43Oiwwoy5vbQQsGcIZOEcpDZJx41UGdCkK', '', 0, '2020-01-02 14:49:30', '0000-00-00 00:00:00'),
('dc4de97f-36f9-11ea-b853-646e69921e02', 'zaenurrochman', 'iitfintermedia@gmail.com', '$2a$08$hUvcrd6uoPsB.I/oU2a1G.92G3iE619PcO7IzmedMfI4ZiellxGdq', '', 0, '2020-01-14 19:15:35', '2020-01-14 19:15:43');

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
  ADD PRIMARY KEY (`id_detail_penyakit`),
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
