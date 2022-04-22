-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ready
CREATE DATABASE IF NOT EXISTS `ready` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ready`;

-- Dumping structure for table ready.data_pelapor
CREATE TABLE IF NOT EXISTS `data_pelapor` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `penyidik` int(5) DEFAULT NULL,
  `nama_tersangka` varchar(255) DEFAULT NULL,
  `pasal` varchar(255) DEFAULT NULL,
  `jpu` int(5) DEFAULT NULL,
  `kasi` int(5) DEFAULT NULL,
  `aspidum` int(5) DEFAULT NULL,
  `koor` int(5) NOT NULL,
  `tgl` date DEFAULT NULL,
  `s1` enum('y','n') NOT NULL,
  `s1_tgl` date NOT NULL,
  `p17` enum('y','n') NOT NULL,
  `berkas` enum('1','2','3','4') NOT NULL,
  `jexposes` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ready.data_pelapor: ~2 rows (approximately)
/*!40000 ALTER TABLE `data_pelapor` DISABLE KEYS */;
INSERT INTO `data_pelapor` (`id`, `penyidik`, `nama_tersangka`, `pasal`, `jpu`, `kasi`, `aspidum`, `koor`, `tgl`, `s1`, `s1_tgl`, `p17`, `berkas`, `jexposes`) VALUES
	(1, 3, 'asri', '32', 20, 15, 12, 14, '2022-04-27', 'y', '2022-04-22', '', '4', 1),
	(2, 2, 'BOGEL', '21 Ayat 5', 23, 16, 12, 14, '2022-04-21', 'y', '2022-04-21', 'y', '1', 0);
/*!40000 ALTER TABLE `data_pelapor` ENABLE KEYS */;

-- Dumping structure for table ready.exposes
CREATE TABLE IF NOT EXISTS `exposes` (
  `id_exposes` int(5) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ready.exposes: ~0 rows (approximately)
/*!40000 ALTER TABLE `exposes` DISABLE KEYS */;
INSERT INTO `exposes` (`id_exposes`, `tempat`, `waktu`) VALUES
	(1, 'asrama', '2022-04-22 14:32:00');
/*!40000 ALTER TABLE `exposes` ENABLE KEYS */;

-- Dumping structure for table ready.instansi
CREATE TABLE IF NOT EXISTS `instansi` (
  `id_instansi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ready.instansi: ~8 rows (approximately)
/*!40000 ALTER TABLE `instansi` DISABLE KEYS */;
INSERT INTO `instansi` (`id_instansi`, `nama`, `no_hp`) VALUES
	(1, 'POLDA - KRIM.MUM', '1234'),
	(2, 'POLDA - KRISMUS', '1234'),
	(3, 'POLDA - NARKOTIKA', '12345678'),
	(4, 'POLDA - TIPIKOR', '12212121'),
	(5, 'BNNP', '2232'),
	(6, 'DISHUT', '121212'),
	(7, 'SPOC', '222'),
	(9, 'POLDA KRIMUM.MANTO', '082255789572');
/*!40000 ALTER TABLE `instansi` ENABLE KEYS */;

-- Dumping structure for table ready.satker_jaksa
CREATE TABLE IF NOT EXISTS `satker_jaksa` (
  `id_satker` int(5) NOT NULL AUTO_INCREMENT,
  `satker` varchar(50) NOT NULL,
  PRIMARY KEY (`id_satker`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ready.satker_jaksa: ~16 rows (approximately)
/*!40000 ALTER TABLE `satker_jaksa` DISABLE KEYS */;
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
	(16, 'Cabang Kejaksaan Negeri Palingkau di Kapuas');
/*!40000 ALTER TABLE `satker_jaksa` ENABLE KEYS */;

-- Dumping structure for table ready.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `nip` text,
  `jabatan` varchar(255) DEFAULT NULL,
  `satker` int(5) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('1','2','3','4','5','6','7') DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table ready.user: ~17 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `nama`, `nip`, `jabatan`, `satker`, `email`, `no_hp`, `password`, `role`, `file`) VALUES
	(10, 'ADMINcuk', '199210232020121020', 'Analis Sistem Informasi', 1, 'joem.borne5o@gmail.com', '082255789572', 'qwerty', '2', ''),
	(11, 'OPERATOR', '199210232020121020', 'Operator', 1, 'joem.borneoop@gmail.com', '082255789572', 'qwerty', '2', ''),
	(12, 'ASPIDUM', '196909131996031003', 'Asisten Tindak Pidana umum ', 1, 'joem.borneo.aspidum@gmail.com', '082163128888', 'qwerty', '4', ''),
	(13, 'WAKAJATI', '196909131996031003', 'Wakil Kepala Kejaksaan Tinggi Kalimantan Tengah', 1, 'joem.borneo.wakajati@gmail.com', '082255789572', 'qwerty', '3', ''),
	(14, 'JOKO WURYANTO', '197302142000031003', 'Koordinator Pidum', 1, 'joem.borneo.koordinator@gmail.com', '081328807555', 'qwerty', '5', ''),
	(15, 'I WAYAN GEDIN ARIANTA', '197408111999031001', 'KASI TERORISME', 1, 'joem.borneo.terorisme@gmail.com', '082291388717', 'qwerty', '6', ''),
	(16, 'YULIATI', '197408111999031001', 'KASI NARKOTIKA', 1, 'joem.borneo.narkotika@gmail.com', '082153943913', 'qwerty', '6', ''),
	(17, 'DWINANTO AGUNG W', '198001012005011015', 'KASI OHARDA', 1, 'joem.borneo.oharda@gmail.com', '085821714131', 'qwerty', '6', ''),
	(18, 'SUTRISNO TABEAS', '197601282001121004', 'KASI TPUL', 1, 'joem.borneo.tpul@gmail.com', '089679262944', 'qwerty', '6', ''),
	(19, 'SITI MUTHOSIAH', '197407061997032003', 'Jaksa Fungsional', 1, 'joem.borneo.jpu.sm@gmail.com', '081295729167', 'qwerty', '7', ''),
	(20, 'JUMAIYATI', '196408091988032002', 'Jaksa Fungsional', 1, 'siemail.mne@gmail.com', '08125079600', 'qwerty', '7', ''),
	(21, 'HULMAN SITUNGKIR', '197310291998031005', 'Jaksa Fungsional', 1, 'joem.borneo.jpu.hs@gmail.com', '082250731115', 'qwerty', '7', ''),
	(22, 'WAGIMAN', '196303041983031002', 'Jaksa Fungsional', 1, 'joem.borneo.jfu.w@gmail.com', '081250810255', 'qwerty', '7', ''),
	(23, 'RIWUN SRIWATI', '1984031200222001', 'Jaksa Fungsional', 1, 'joem.borneo@gmail.com', '081254065265', 'qwerty', '7', ''),
	(24, 'PUGUH TRIHADI', '197108042005011009', 'Tata Usaha', 1, 'joem.borneo@gmai.com', '081251237808', 'qwerty', '2', ''),
	(25, 'RECKY EDO MALFRENDO', '199301252020121014', 'Tata Usaha', 1, 'joem.borneo@gmail.com', '085768068144', 'qwerty', '2', ''),
	(27, 'Baru nich', '123', 'BOs', 4, 'vogol68653@sartess.com', '08525252505', 'qwerty', '7', 'vanderwijk.png');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
