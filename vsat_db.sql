-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2020 at 11:22 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsat_db`
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
(16, 'shalo'),
(17, 'anu'),
(18, 'OTAK-01');

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
  `admin_id` int(6) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `device_id` int(4) NOT NULL,
  `device2_id` int(6) NOT NULL,
  `device3_id` int(6) NOT NULL,
  `teknisi_id` int(11) NOT NULL,
  `tindakan` varchar(200) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `waktu_selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `customer_id`, `lokasi`, `keterangan`, `waktu_lapor`, `stat`, `admin_id`, `jenis`, `device_id`, `device2_id`, `device3_id`, `teknisi_id`, `tindakan`, `gambar`, `waktu_selesai`) VALUES
(1, 1, 'ajsk didosm dskld oioudsfpuoids fduifopdufo dfidofpuid', 'beb fyduisouys jflhsjlhfs djfhlkjshjf djslhfjsld dhfkjslhfs sjfdlsjhfjdsk dshfjslhfjdslkfh sdjflhsfj', '2020-08-02 00:55:04', 'Sedang Diproses', 2, 'u', 16, 0, 0, 0, '', '', '0000-00-00 00:00:00'),
(2, 1, 'Jl. Toddopuli 7 no. 23', 'Otaknya rusak', '2020-08-04 19:42:20', 'Selesai', 2, 'hahaha, joe', 18, 17, 16, 3, 'asasa', '1596637731-2.png', '2020-08-05 22:28:51'),
(3, 1, 'a', 'b', '2020-08-04 23:05:20', 'Sedang Diproses', 2, 'anu rusak', 18, 17, 18, 3, '', '', '0000-00-00 00:00:00');

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
(1, 'Tester', 'tester1@test.com', '08123456789', 'customer', '1234'),
(2, 'Tester 2', 'tester2@test.com', '082222222222', 'admin', '4321'),
(3, 'Teknisi 1', 'teknisi1@test.com', '080808080808', 'teknisi', '1111'),
(4, 'Teknisi 2', 'teknisi2@test.com', '080707070707', 'teknisi', '1111');

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
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
