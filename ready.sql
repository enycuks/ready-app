-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


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
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ready.data_pelapor: ~3 rows (approximately)
/*!40000 ALTER TABLE `data_pelapor` DISABLE KEYS */;
INSERT INTO `data_pelapor` (`id`, `penyidik`, `nama_tersangka`, `pasal`, `jpu`, `kasi`, `aspidum`, `tgl`) VALUES
	(1, 7, 'Asrul', '30 ayat 1', 3, 4, 3, '2022-04-09'),
	(2, 1, 'jamet', 'pasl 31', 3, 4, 3, '2022-04-11'),
	(3, 2, 'redd r', '32', 3, 4, 3, '2022-04-12'),
	(4, 3, 'redd', '32', 3, 4, 7, '2022-04-11');
/*!40000 ALTER TABLE `data_pelapor` ENABLE KEYS */;

-- Dumping structure for table ready.instansi
CREATE TABLE IF NOT EXISTS `instansi` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ready.instansi: ~7 rows (approximately)
/*!40000 ALTER TABLE `instansi` DISABLE KEYS */;
INSERT INTO `instansi` (`id`, `nama`, `no_hp`) VALUES
	(1, 'POLDA - KRIM.MUM', '12345'),
	(2, 'POLDA - KRISMUS', '1234'),
	(3, 'POLDA - NARKOTIKA', '12345678'),
	(4, 'POLDA - TIPIKOR', '12212121'),
	(5, 'BNNP', '2232'),
	(6, 'DISHUT', '121212'),
	(7, 'SPOC', '222');
/*!40000 ALTER TABLE `instansi` ENABLE KEYS */;

-- Dumping structure for table ready.satker_jaksa
CREATE TABLE IF NOT EXISTS `satker_jaksa` (
  `id` int(5) NOT NULL,
  `satker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ready.satker_jaksa: ~16 rows (approximately)
/*!40000 ALTER TABLE `satker_jaksa` DISABLE KEYS */;
INSERT INTO `satker_jaksa` (`id`, `satker`) VALUES
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
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `nip` text,
  `jabatan` varchar(255) DEFAULT NULL,
  `satker` int(5) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('1','2','3','4','5','6','7') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table ready.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `nama`, `nip`, `jabatan`, `satker`, `email`, `no_hp`, `password`, `role`) VALUES
	(1, 'Fendi Admin', '196305041991032002', 'Admin', 1, 'fendcuk@gmail.com', '123', 'aduh', '1'),
	(2, 'Adam Operator', '123333', 'Operator', 2, 'fencuk@gmail.com', '123', 'aduh', '2'),
	(3, 'Fendi JPU', '123333', 'JPU', 1, 'fencuk@gmail.com', '123', 'aduh', '3'),
	(4, 'Adam KASI', '123333', 'KASI', 4, 'fencuk@gmail.com', '123', 'aduh', '4'),
	(5, 'Rudi Wakajati', '123333', 'Wakajati', 3, 'fencuk@gmail.com', '123', 'aduh', '5'),
	(7, 'Asin Aspidum', '123333', 'Aspidum', 2, 'fencuk@gmail.com', '123', 'aduh', '6'),
	(8, 'Alan JPU', '12355', 'JPU', 5, 'siemail.mne@gmail.com', '123', 'aduh', '3'),
	(9, 'Rusli Kasi', '1234', 'KASI', 5, 'siemail.mne@gmail.com', '5454', 'aduh', '4');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
