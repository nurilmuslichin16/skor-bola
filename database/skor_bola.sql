-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for skor_bola
CREATE DATABASE IF NOT EXISTS `skor_bola` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `skor_bola`;

-- Dumping structure for table skor_bola.tb_klub
CREATE TABLE IF NOT EXISTS `tb_klub` (
  `id_klub` int NOT NULL AUTO_INCREMENT,
  `nama_klub` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `kota_klub` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `ma` int DEFAULT '0' COMMENT 'Banyak Pertandingan',
  `me` int DEFAULT '0' COMMENT 'Banyak Menang',
  `s` int DEFAULT '0' COMMENT 'Banyak Seri',
  `k` int DEFAULT '0' COMMENT 'Banyak Kalah',
  `gm` int DEFAULT '0' COMMENT 'Banyak Goal Masuk',
  `gk` int DEFAULT '0' COMMENT 'Banyak Goal Lawan',
  `point` int DEFAULT '0' COMMENT 'Banyak Poin',
  PRIMARY KEY (`id_klub`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table skor_bola.tb_klub: ~4 rows (approximately)
INSERT INTO `tb_klub` (`id_klub`, `nama_klub`, `kota_klub`, `ma`, `me`, `s`, `k`, `gm`, `gk`, `point`) VALUES
	(1, 'Persib', 'Bandung', 4, 2, 2, 0, 8, 4, 8),
	(2, 'Arema', 'Malang', 2, 1, 0, 1, 4, 5, 3),
	(3, 'Persija', 'Jakarta', 2, 1, 1, 0, 4, 3, 4),
	(5, 'Persip', 'Pekalongan', 4, 0, 1, 3, 5, 9, 1);

-- Dumping structure for table skor_bola.tb_match
CREATE TABLE IF NOT EXISTS `tb_match` (
  `id_match` int NOT NULL AUTO_INCREMENT,
  `klub_home` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `score_home` int NOT NULL,
  `klub_away` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `score_away` int NOT NULL,
  PRIMARY KEY (`id_match`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table skor_bola.tb_match: ~6 rows (approximately)
INSERT INTO `tb_match` (`id_match`, `klub_home`, `score_home`, `klub_away`, `score_away`) VALUES
	(1, 'Persib', 3, 'Arema', 0),
	(2, 'Persib', 2, 'Persija', 2),
	(3, 'Arema', 4, 'Persip', 2),
	(4, 'Persib', 2, 'Persip', 1),
	(5, 'Persip', 1, 'Persib', 1),
	(6, 'Persija', 2, 'Persip', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
