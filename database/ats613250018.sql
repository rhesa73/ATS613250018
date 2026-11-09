-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Nov 2026 pada 07.57
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ats613250018`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_018`
--

CREATE TABLE `member_018` (
  `id` int(10) NOT NULL,
  `email` varchar(34) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `aktive` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `member_018`
--

INSERT INTO `member_018` (`id`, `email`, `password`, `nama`, `aktive`) VALUES
(1, 'rhesa@example.com', 'Rhesa018!', 'Rhesa Naufal', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil018`
--

CREATE TABLE `mobil018` (
  `no_id` int(10) NOT NULL,
  `nomor_kendaraan` varchar(12) NOT NULL,
  `jenis_kendaraan` enum('Sedan','Pickup','Truk','Bemo') NOT NULL,
  `pemilik` varchar(50) NOT NULL,
  `tahun_pembuatan` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mobil018`
--

INSERT INTO `mobil018` (`no_id`, `nomor_kendaraan`, `jenis_kendaraan`, `pemilik`, `tahun_pembuatan`) VALUES
(1, 'D 1018 RN', 'Sedan', 'Rhesa Naufal', '2022'),
(2, 'D 2018 TM', 'Pickup', 'reza', '2021'),
(3, 'D 3018 TK', 'Truk', 'valentino', '2026');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `member_018`
--
ALTER TABLE `member_018`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil018`
--
ALTER TABLE `mobil018`
  ADD PRIMARY KEY (`no_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `member_018`
--
ALTER TABLE `member_018`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mobil018`
--
ALTER TABLE `mobil018`
  MODIFY `no_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
