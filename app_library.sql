-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2023 pada 13.40
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datafile`
--

CREATE TABLE `datafile` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datafile`
--

INSERT INTO `datafile` (`id`, `tanggal`, `nama_file`) VALUES
(1, '2023-11-02', 'document.pdf'),
(2, '2023-11-10', 'ewe.jpg'),
(3, '2023-11-23', 'kontol.jpg'),
(4, '2023-11-15', 'memek.jpg'),
(5, '2023-11-29', 'itil.jpg'),
(8, '2023-11-03', 'ttd a umri.jpeg_1.jpg'),
(10, '2023-11-18', 'id-11134207-7r98u-lmh8ey99w93b92.jpeg'),
(11, '2023-11-25', 'eq123.jpg'),
(13, '2023-10-30', '3-1.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datafile`
--
ALTER TABLE `datafile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datafile`
--
ALTER TABLE `datafile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
