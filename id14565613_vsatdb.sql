-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Okt 2020 pada 13.14
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id14565613_vsatdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `device`
--

CREATE TABLE `device` (
  `device_id` int(11) NOT NULL,
  `device_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `device`
--

INSERT INTO `device` (`device_id`, `device_name`) VALUES
(1, 'Modem'),
(2, 'LNB'),
(3, 'BUC'),
(4, 'Adaptor'),
(5, 'Piringan Antena'),
(6, 'Pedestal'),
(7, 'Canister'),
(8, 'Feed Support'),
(9, 'Kabel Coaxial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `error_list`
--

CREATE TABLE `error_list` (
  `id_error` int(11) NOT NULL,
  `jenis_error` text COLLATE utf8_unicode_ci NOT NULL,
  `kode_error` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `report_id` int(10) NOT NULL,
  `customer_id` int(6) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `waktu_lapor` datetime NOT NULL,
  `stat` varchar(20) NOT NULL,
  `admin_id` int(6) NOT NULL DEFAULT 0,
  `jenis` varchar(100) DEFAULT NULL,
  `error_id` int(3) NOT NULL,
  `device_id` int(4) NOT NULL DEFAULT 0,
  `device2_id` int(6) NOT NULL DEFAULT 0,
  `device3_id` int(6) NOT NULL DEFAULT 0,
  `teknisi_id` int(11) NOT NULL DEFAULT 0,
  `tindakan` varchar(200) DEFAULT NULL,
  `sinyal` int(5) DEFAULT NULL,
  `terdampak` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `report`
--

INSERT INTO `report` (`report_id`, `customer_id`, `lokasi`, `keterangan`, `waktu_lapor`, `stat`, `admin_id`, `jenis`, `error_id`, `device_id`, `device2_id`, `device3_id`, `teknisi_id`, `tindakan`, `sinyal`, `terdampak`, `gambar`, `waktu_selesai`) VALUES
(1, 3, 'Jl. Adhyaksa Baru No.14', 'Lampu indikator receive modem mati', '2020-08-16 20:54:37', 'Selesai', 5, 'Receive', 0, 2, 9, 0, 4, 'Dilakukan penggantian kabel coxial pada sambungan LNB ke modem.', 85, 'Kabel Coaxial', '1597648472-1.jpg', '2020-08-17 15:14:32'),
(3, 3, 'Jl. Racing Center No.1', 'Gagal transmit', '2020-08-18 14:27:15', 'Selesai', 5, 'Transmit', 0, 4, 3, 8, 4, 'Ganti perangkat', 90, 'BUC', '1598544891-3.png', '2020-08-28 00:14:51'),
(4, 3, 'Jl. Poros Asrama Haji Sudiang', 'Antena rubuh', '2020-08-28 13:33:55', 'Selesai', 5, 'Fisik', 0, 7, 6, 5, 6, 'Penggantian badan antena', 90, 'Badan antena', '1598592946-4.jpeg', '2020-08-28 13:35:46'),
(5, 3, 'Jln. Todopulli 5 setapak 1', 'Gagal transmit', '2020-08-28 19:48:59', 'Sedang Diproses', 5, 'Transmit', 0, 3, 9, 1, 4, NULL, NULL, NULL, NULL, NULL),
(6, 3, 'Jl. Toddopuli 1', 'Antena terhalang pohon', '2020-08-28 20:06:46', 'Sedang Diproses', 5, 'Transmit', 0, 7, 3, 0, 6, NULL, NULL, NULL, NULL, NULL),
(7, 3, 'Jln. Toddopuli 5 No 10', 'Lampu indikator receive modem mati', '2020-08-30 19:20:46', 'Selesai', 5, 'Receive', 0, 2, 9, 1, 4, 'Penggantian kabel pada LNB dan modem', 85, 'Kabel Coaxial', '1598789590-7.jpg', '2020-08-30 20:13:10'),
(8, 3, 'Jl. Adhyaksa Baru no.1', 'Lampu indikator receive mati', '2020-09-24 14:42:03', 'Selesai', 5, 'Receive', 0, 2, 9, 1, 4, 'Penggantian modem', 90, 'Modem', '1600930281-8.jpg', '2020-09-24 14:51:21'),
(9, 3, 'Jl. Adhyaksa Baru no.13', 'Lampu receive modem mati', '2020-10-01 12:52:10', 'Belum Diproses', 0, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `telegram_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nama`, `email`, `hp`, `role`, `pass`, `telegram_id`) VALUES
(1, 'SuperUser', 'super@test.com', '000000000', 'superuser', '12345678', ''),
(2, 'Customer 0', 'a@a.com', '081081081081', 'customer', '12341234', ''),
(3, 'Customer 1', 'customer1@test.com', '081111222333', 'customer', 'qwerty', ''),
(4, 'Teknisi 1', 'teknisi1@test.com', '08222333444', 'teknisi', 'qwerty', '956827994'),
(5, 'Admin 1', 'admin1@test.com', '08555666777', 'admin', 'qwerty', ''),
(6, 'Teknisi 2', 'teknisi2@test.com', '08111222333', 'teknisi', 'qwerty', '956827994');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`device_id`);

--
-- Indeks untuk tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `device`
--
ALTER TABLE `device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
