-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 03:14 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mukernas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_peserta`
--

CREATE TABLE `data_peserta` (
  `id_data_peserta` int(4) NOT NULL,
  `nomor` int(4) NOT NULL,
  `nama_lengkap_fam` varchar(200) NOT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL,
  `dpc_dpw` varchar(50) NOT NULL,
  `no_registrasi` varchar(20) NOT NULL,
  `qrcode` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `link` varchar(75) NOT NULL,
  `insert_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_peserta`
--

INSERT INTO `data_peserta` (`id_data_peserta`, `nomor`, `nama_lengkap_fam`, `nomor_hp`, `dpc_dpw`, `no_registrasi`, `qrcode`, `status`, `link`, `insert_time`, `update_time`) VALUES
(7, 1, 'Hasan Bahsien', '', 'DPC RA Pidie & Pidie Jaya', 'MUKERNAS-RA-1', 'http---saa-pemudara..-code-mukernas-ra-1', 0, 'http://saa.pemudarabithah.org/index.php?code=mukernas-ra-1', NULL, NULL),
(8, 2, 'Mustafa Bahsien', '4321', 'DPC RA Pidie & Pidie Jaya', 'MUKERNAS-RA-2', 'http---saa-pemudara..-code-mukernas-ra-2', 0, 'http://saa.pemudarabithah.org/index.php?code=mukernas-ra-2', NULL, NULL),
(9, 3, 'Husein Idham Syahab', '0813 4557 7977', 'DPC RA Ketapang', 'MUKERNAS-RA-3', 'http---saa-pemudara..-code-mukernas-ra-3', 0, 'http://saa.pemudarabithah.org/index.php?code=mukernas-ra-3', NULL, NULL),
(10, 4, 'Khairumah Yusuf Alaydrus', '0895 3390 12773 / 08', 'DPC RA Ketapang', 'MUKERNAS-RA-4', 'http---saa-pemudara..-code-mukernas-ra-4', 0, 'http://saa.pemudarabithah.org/index.php?code=mukernas-ra-4', NULL, NULL),
(11, 5, 'Yaser Alatas', '0812 2755 527', 'DPC RA Magelang', 'MUKERNAS-RA-5', 'http---saa-pemudara..-code-mukernas-ra-5', 0, 'http://saa.pemudarabithah.org/index.php?code=mukernas-ra-5', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_peserta`
--
ALTER TABLE `data_peserta`
  ADD PRIMARY KEY (`id_data_peserta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_peserta`
--
ALTER TABLE `data_peserta`
  MODIFY `id_data_peserta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
