-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2020 at 02:40 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

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
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `device_id` int(11) NOT NULL,
  `device_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`device_id`, `device_name`) VALUES
(1, 'Modem'),
(2, 'LNB'),
(3, 'BUC'),
(4, 'Adaptor'),
(5, 'Antena Dish'),
(6, 'Pedestal'),
(7, 'Canister'),
(8, 'Feed Support'),
(9, 'Kabel Coaxial');

-- --------------------------------------------------------

--
-- Table structure for table `report`
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
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `customer_id`, `lokasi`, `keterangan`, `waktu_lapor`, `stat`, `admin_id`, `jenis`, `device_id`, `device2_id`, `device3_id`, `teknisi_id`, `tindakan`, `sinyal`, `terdampak`, `gambar`, `waktu_selesai`) VALUES
(1, 2, 'lapangan', 'mantap', '2020-08-09 16:04:29', 'Selesai', 5, 'Satelit ', 7, 4, 6, 4, 'Oke', NULL, NULL, '1596970121-1.jpg', '2020-08-09 18:48:41'),
(2, 3, 'Jl. Adhyaksa No.1', 'Antena rubuh', '2020-08-09 16:05:58', 'Selesai', 5, 'Antena rubuh', 5, 7, 6, 4, 'Penggantian badan antena', NULL, NULL, '1596960778-2.jpg', '2020-08-09 16:12:58'),
(3, 3, 'Jl. AP Pettarani', 'Kabel putus', '2020-08-09 18:35:13', 'Selesai', 5, 'Kabel putus', 9, 0, 0, 4, 'Ganti kabel', NULL, NULL, '1596970296-3.jpg', '2020-08-09 18:51:36'),
(4, 3, 'Lorong 9', 'Got mampet', '2020-08-09 18:49:29', 'Selesai', 5, 'test', 6, 1, 2, 4, 'test lagi', NULL, NULL, '1596970593-4.jpeg', '2020-08-09 18:56:33'),
(5, 2, 'halo', 'testing', '2020-08-09 19:03:23', 'Selesai', 5, 'kuy', 9, 0, 0, 4, 'oioi', NULL, NULL, '1596971079-5.png', '2020-08-09 19:04:39'),
(6, 2, 'report', 'fix bug', '2020-08-09 19:11:42', 'Selesai', 5, 'oi', 3, 0, 0, 4, 'hmhmhm', NULL, NULL, '1596971717-6.png', '2020-08-09 19:15:17'),
(7, 2, 'lokasi', 'final test', '2020-08-09 19:18:00', 'Selesai', 5, 'feed', 8, 0, 0, 4, 'kokoko', NULL, NULL, '1596971941-7.png', '2020-08-09 19:19:01'),
(8, 3, 'Jl. Batua Raya', 'Sembarang', '2020-08-09 19:23:16', 'Selesai', 5, 'Tidak ada', 1, 0, 0, 4, 'Ganti skin', NULL, NULL, '1596972383-8.jpg', '2020-08-09 19:26:23'),
(9, 3, 'Jl. Hertasning', 'Overheat', '2020-08-10 18:39:17', 'Selesai', 5, 'Modem', 4, 1, 0, 4, 'ganti modem', NULL, NULL, '1597057859-9.jpg', '2020-08-10 19:10:59'),
(10, 3, 'Lorong 7', 'Konslet', '2020-08-10 19:34:37', 'Sedang Diproses', 5, 'Kelistrikan', 4, 0, 0, 4, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `email`, `hp`, `role`, `pass`) VALUES
(1, 'SuperUser', 'super@test.com', '000000000', 'superuser', '12345678'),
(2, 'Customer 0', 'a@a.com', '081081081081', 'customer', '12341234'),
(3, 'Customer 1', 'customer1@test.com', '081111222333', 'customer', 'qwerty'),
(4, 'Teknisi 1', 'teknisi1@test.com', '08222333444', 'teknisi', 'qwerty'),
(5, 'Admin 1', 'admin1@test.com', '08555666777', 'admin', 'qwerty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
