-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2024 pada 02.12
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
-- Database: `rfid_data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lift1`
--

CREATE TABLE `lift1` (
  `id` int(11) NOT NULL,
  `kondisi` varchar(12) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lift1`
--

INSERT INTO `lift1` (`id`, `kondisi`, `status`) VALUES
(1, 'NORMAL', 'BERHENTI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lift2`
--

CREATE TABLE `lift2` (
  `id` int(11) NOT NULL,
  `kondisi` varchar(12) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lift2`
--

INSERT INTO `lift2` (`id`, `kondisi`, `status`) VALUES
(1, 'NORMAL', 'BERJALAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lift3`
--

CREATE TABLE `lift3` (
  `id` int(11) NOT NULL,
  `kondisi` varchar(12) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `utilities_data`
--

CREATE TABLE `utilities_data` (
  `id` int(11) NOT NULL,
  `tanggal_jam` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lift` varchar(6) NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `utilities_data`
--

INSERT INTO `utilities_data` (`id`, `tanggal_jam`, `lift`, `deskripsi`) VALUES
(1, '2024-11-25 22:07:12', 'LIFT 1', 'oke\r\n'),
(2, '2024-11-25 22:11:59', 'LIFT 2', 'yang bener'),
(3, '2024-11-25 22:12:19', 'LIFT 2', 'kucluk'),
(4, '2024-11-25 22:13:27', 'LIFT 3', 'oppp'),
(5, '2024-11-25 22:14:05', 'LIFT 1', 'haah la'),
(6, '2024-11-25 22:14:18', 'LIFT 3', 'betul sikit lah'),
(7, '2024-11-25 22:14:40', 'LIFT 1', 'alex bhizer katak pemai'),
(8, '2024-11-25 22:17:31', 'LIFT 2', 'mandi bang bau bnget');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lift1`
--
ALTER TABLE `lift1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lift2`
--
ALTER TABLE `lift2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lift3`
--
ALTER TABLE `lift3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `utilities_data`
--
ALTER TABLE `utilities_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lift1`
--
ALTER TABLE `lift1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lift2`
--
ALTER TABLE `lift2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lift3`
--
ALTER TABLE `lift3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `utilities_data`
--
ALTER TABLE `utilities_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
