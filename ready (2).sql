-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 11:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ready`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pelapor`
--

CREATE TABLE `data_pelapor` (
  `id` int(5) NOT NULL,
  `penyidik` int(5) DEFAULT NULL,
  `nama_tersangka` varchar(255) DEFAULT NULL,
  `pasal` varchar(255) DEFAULT NULL,
  `waka` int(5) DEFAULT NULL,
  `jpu` int(5) DEFAULT NULL,
  `kasi` int(5) DEFAULT NULL,
  `aspidum` int(5) DEFAULT NULL,
  `koor` int(5) NOT NULL,
  `tgl` date DEFAULT NULL,
  `s1` enum('y','n') NOT NULL,
  `s1_tgl` date NOT NULL,
  `p17` enum('Sudah','Belum') NOT NULL DEFAULT 'Belum',
  `berkas` enum('Sudah','Belum','Expose','Proses') DEFAULT 'Proses',
  `exposes` enum('Sudah','Belum','a') NOT NULL DEFAULT 'a',
  `jexposes` int(5) NOT NULL,
  `hasil_exposes` enum('P-18','P-21') DEFAULT NULL,
  `tgl_hasile` date DEFAULT NULL,
  `petunjuk` enum('Belum','Sudah') DEFAULT NULL,
  `kejari` int(5) NOT NULL,
  `tgl_t2` datetime DEFAULT NULL,
  `t2` enum('Belum','Sudah','Proses') DEFAULT 'Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pelapor`
--

INSERT INTO `data_pelapor` (`id`, `penyidik`, `nama_tersangka`, `pasal`, `waka`, `jpu`, `kasi`, `aspidum`, `koor`, `tgl`, `s1`, `s1_tgl`, `p17`, `berkas`, `exposes`, `jexposes`, `hasil_exposes`, `tgl_hasile`, `petunjuk`, `kejari`, `tgl_t2`, `t2`) VALUES
(4, 3, 'Pertama', '35', 13, 20, 16, 12, 14, '2022-04-23', 'y', '2022-04-23', 'Belum', 'Sudah', 'Sudah', 0, NULL, NULL, NULL, 3, '2022-04-23 23:37:00', 'Sudah'),
(5, 1, 'Kedua', '35', 13, 20, 15, 12, 14, '2022-04-23', 'y', '2022-04-23', 'Belum', 'Sudah', 'Sudah', 0, NULL, NULL, NULL, 4, '2022-04-23 23:55:00', 'Sudah'),
(6, 2, 'Ketiga', '89', 13, 20, 16, 12, 14, '2022-04-23', 'y', '2022-04-23', 'Belum', 'Sudah', 'Sudah', 0, NULL, NULL, NULL, 5, '2022-04-24 00:42:00', 'Sudah'),
(7, 3, 'Keempat', '777', 13, 20, 15, 12, 14, '2022-04-23', 'y', '2022-04-23', 'Belum', 'Sudah', 'Sudah', 0, NULL, NULL, NULL, 16, '2022-04-13 00:45:00', 'Sudah'),
(8, 4, 'Kelima', '889', 13, 20, 17, 12, 14, '2022-04-23', 'y', '2022-04-23', 'Belum', 'Expose', 'a', 8, 'P-21', '2022-04-23', NULL, 15, '2022-04-24 01:32:00', 'Sudah'),
(9, 2, 'Keenam', '90', 13, 20, 16, 12, 14, '2022-04-23', 'y', '2022-04-23', 'Belum', 'Sudah', 'Sudah', 0, NULL, NULL, NULL, 3, '2022-04-24 01:47:00', 'Sudah'),
(10, 3, 'Ketujuh', '90', 13, 20, 15, 12, 14, '2022-04-23', 'y', '2022-04-23', 'Belum', 'Belum', 'Belum', 10, 'P-21', '2022-04-23', NULL, 14, '2022-04-24 02:03:00', 'Sudah'),
(11, 5, 'Kedelapan', '88', 13, 20, 16, 12, 14, '2022-04-23', 'y', '2022-04-23', 'Belum', 'Sudah', 'Sudah', 0, NULL, NULL, NULL, 8, '2022-04-24 04:29:00', 'Sudah'),
(12, 3, 'Kesembilan', '99', 13, 20, 15, 12, 14, '2022-04-24', 'y', '2022-04-24', 'Belum', 'Expose', 'a', 12, 'P-21', '2022-04-24', NULL, 15, '2022-04-24 11:20:00', 'Sudah'),
(15, 2, 'Kesepuluh', '10', 13, 20, 16, 12, 14, '2022-04-24', 'y', '2022-04-24', 'Belum', 'Expose', 'a', 15, 'P-21', '2022-04-24', NULL, 4, '2022-04-24 12:03:00', 'Sudah'),
(16, 1, 'Kesebelas', '11', 13, 20, 16, 12, 14, '2022-04-24', 'y', '2022-04-24', 'Belum', 'Expose', 'a', 16, 'P-18', '2022-04-24', 'Sudah', 0, NULL, 'Proses'),
(17, 2, 'P-17', '17', 13, 20, 16, 12, 14, '2022-05-25', 'n', '0000-00-00', 'Sudah', 'Proses', 'a', 0, NULL, NULL, NULL, 0, NULL, 'Proses'),
(19, 3, 'Tahap 2', 'T2', 13, 20, 17, 12, 14, '2022-04-24', 'y', '2022-05-02', 'Belum', 'Sudah', 'Sudah', 0, NULL, NULL, NULL, 1, '2022-04-24 12:44:00', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `exposes`
--

CREATE TABLE `exposes` (
  `id_exposes` int(5) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exposes`
--

INSERT INTO `exposes` (`id_exposes`, `tempat`, `waktu`) VALUES
(8, 'arab', '2022-04-24 00:50:00'),
(8, 'arab', '2022-04-18 00:52:00'),
(8, 'arab', '2022-04-24 01:03:00'),
(8, 'arav', '2022-04-24 01:19:00'),
(10, 'dumai', '2022-04-24 01:57:00'),
(12, 'uma', '2022-04-24 11:19:00'),
(13, 'juki', '2022-04-24 11:23:00'),
(13, 'juki', '2022-04-24 11:38:00'),
(15, 'er', '2022-04-24 11:57:00'),
(15, 'eee', '2022-04-24 12:03:00'),
(16, 'fgfg', '2022-04-24 12:06:00'),
(20, 'er', '2022-04-24 16:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama`, `no_hp`) VALUES
(1, 'POLDA - KRIMUM', '1234'),
(2, 'POLDA - KRISMUS', '1234'),
(3, 'POLDA - NARKOTIKA', '12345678'),
(4, 'POLDA - TIPIKOR', '12212121'),
(5, 'BNNP', '2232'),
(6, 'DISHUT', '121212'),
(7, 'SPOC', '222'),
(9, 'POLDA KRIMUM.MANTO', '082255789572');

-- --------------------------------------------------------

--
-- Table structure for table `satker_jaksa`
--

CREATE TABLE `satker_jaksa` (
  `id_satker` int(5) NOT NULL,
  `satker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satker_jaksa`
--

INSERT INTO `satker_jaksa` (`id_satker`, `satker`) VALUES
(1, 'Kejaksaan Tinggi Kalimantan Tengah'),
(2, 'Kejaksaan Negeri Palangka Raya'),
(3, 'Kejaksaan Negeri Pulang Pisau'),
(4, 'Kejaksaan Negeri Kapuas'),
(5, 'Kejaksaan Negeri Kotawaringin Timur'),
(6, 'Kejaksaan Negeri Kotawaringin Barat'),
(7, 'Kejaksaan Negeri Katingan'),
(8, 'Kejaksaan Negeri Gunung Mas'),
(9, 'Kejaksaan Negeri Seruyan'),
(10, 'Kejaksaan Negeri Sukamara'),
(11, 'Kejaksaan Negeri Lamandau'),
(12, 'Kejaksaan Negeri Barito Selatan'),
(13, 'Kejaksaan Negeri Barito Timur'),
(14, 'Kejaksaan Negeri Barito Utara'),
(15, 'Kejaksaan Negeri Murung Raya'),
(16, 'Cabang Kejaksaan Negeri Kapuas di Palingkau');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` text DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `satker` int(5) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('1','2','3','4','5','6','7') DEFAULT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nip`, `jabatan`, `satker`, `email`, `no_hp`, `password`, `role`, `file`) VALUES
(10, 'ADMIN.OK', '199210232020121020', 'Analis Sistem Informasi', 1, 'joem.borne5o@gmail.com', '082255789572', 'qwerty', '2', 'KEJATI_KALTENG.png'),
(11, 'OPERATOR', '199210232020121020', 'Operator', 1, 'joem.borneoop@gmail.com', '082255789572', 'qwerty', '2', 'male.png'),
(12, 'ASPIDUM', '196909131996031003', 'Asisten Tindak Pidana umum ', 1, 'joem.borneo.aspidum@gmail.com', '082163128888', 'qwerty', '4', 'male1.png'),
(13, 'WAKAJATI', '196909131996031003', 'Wakil Kepala Kejaksaan Tinggi Kalimantan Tengah', 1, 'joem.borneo.wakajati@gmail.com', '082255789572', 'qwerty', '3', 'male2.png'),
(14, 'JOKO WURYANTO', '197302142000031003', 'Koordinator Pidum', 1, 'joem.borneo.koordinator@gmail.com', '081328807555', 'qwerty', '5', 'male3.png'),
(15, 'I WAYAN GEDIN ARIANTA', '197408111999031001', 'KASI TERORISME', 1, 'joem.borneo.terorisme@gmail.com', '082291388717', 'qwerty', '6', 'male4.png'),
(16, 'YULIATI', '197408111999031001', 'KASI NARKOTIKA', 1, 'joem.borneo.narkotika@gmail.com', '082153943913', 'qwerty', '6', 'female.png'),
(17, 'DWINANTO AGUNG W', '198001012005011015', 'KASI OHARDA', 1, 'joem.borneo.oharda@gmail.com', '085821714131', 'qwerty', '6', 'male5.png'),
(18, 'SUTRISNO TABEAS', '197601282001121004', 'KASI TPUL', 1, 'joem.borneo.tpul@gmail.com', '089679262944', 'qwerty', '6', 'female1.png'),
(19, 'SITI MUTHOSIAH', '197407061997032003', 'Jaksa Fungsional', 1, 'joem.borneo.jpu.sm@gmail.com', '081295729167', 'qwerty', '7', 'female2.png'),
(20, 'JUMAIYATI', '196408091988032002', 'Jaksa Fungsional', 1, 'siemail.mne@gmail.com', '08125079600', 'qwerty', '7', 'female3.png'),
(21, 'HULMAN SITUNGKIR', '197310291998031005', 'Jaksa Fungsional', 1, 'joem.borneo.jpu.hs@gmail.com', '082250731115', 'qwerty', '7', 'male6.png'),
(22, 'WAGIMAN', '196303041983031002', 'Jaksa Fungsional', 1, 'joem.borneo.jfu.w@gmail.com', '081250810255', 'qwerty', '7', 'male7.png'),
(23, 'RIWUN SRIWATI', '1984031200222001', 'Jaksa Fungsional', 1, 'joem.borneo@gmail.com', '081254065265', 'qwerty', '7', 'female4.png'),
(24, 'PUGUH TRIHADI', '197108042005011009', 'Tata Usaha', 1, 'joem.borneo@gmai.com', '081251237808', 'qwerty', '2', 'male8.png'),
(25, 'RECKY EDO MALFRENDO', '199301252020121014', 'Tata Usaha', 1, 'joem.borneo@gmail.com', '085768068144', 'qwerty', '2', 'male9.png'),
(27, 'Baru nich', '123', 'BOs', 4, 'vogol68653@sartess.com', '08525252505', 'qwerty', '7', 'vanderwijk.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pelapor`
--
ALTER TABLE `data_pelapor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `satker_jaksa`
--
ALTER TABLE `satker_jaksa`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pelapor`
--
ALTER TABLE `data_pelapor`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `satker_jaksa`
--
ALTER TABLE `satker_jaksa`
  MODIFY `id_satker` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
