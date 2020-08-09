-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 09, 2020 at 08:05 AM
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
  `gambar` varchar(50) DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `customer_id`, `lokasi`, `keterangan`, `waktu_lapor`, `stat`, `admin_id`, `jenis`, `device_id`, `device2_id`, `device3_id`, `teknisi_id`, `tindakan`, `gambar`, `waktu_selesai`) VALUES
(1, 2, 'lapangan', 'mantap', '2020-08-09 16:04:29', 'Belum Diproses', 0, NULL, 0, 0, 0, 0, NULL, NULL, NULL);

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
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
