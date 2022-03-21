-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2022 pada 18.48
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_type`
--

CREATE TABLE `book_type` (
  `sku` varchar(150) NOT NULL,
  `weight_stuff` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `disk_type`
--

CREATE TABLE `disk_type` (
  `sku` varchar(150) NOT NULL,
  `size_stuff` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `furniture_type`
--

CREATE TABLE `furniture_type` (
  `sku` varchar(150) NOT NULL,
  `height_stuff` float NOT NULL,
  `width_stuff` float NOT NULL,
  `lenght_stuff` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stuff`
--

CREATE TABLE `stuff` (
  `sku` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book_type`
--
ALTER TABLE `book_type`
  ADD PRIMARY KEY (`sku`);

--
-- Indeks untuk tabel `disk_type`
--
ALTER TABLE `disk_type`
  ADD PRIMARY KEY (`sku`);

--
-- Indeks untuk tabel `furniture_type`
--
ALTER TABLE `furniture_type`
  ADD PRIMARY KEY (`sku`);

--
-- Indeks untuk tabel `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`sku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
