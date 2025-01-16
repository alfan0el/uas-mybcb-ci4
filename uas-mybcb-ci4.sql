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


-- Dumping database structure for uas-mybcb-ci4
CREATE DATABASE IF NOT EXISTS `uas-mybcb-ci4` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `uas-mybcb-ci4`;

-- Dumping structure for table uas-mybcb-ci4.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table uas-mybcb-ci4.migrations: ~1 rows (approximately)
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2025-01-15-101744', 'App\\Database\\Migrations\\Nasabah', 'default', 'App', 1736938984, 1);

-- Dumping structure for table uas-mybcb-ci4.nasabah
CREATE TABLE IF NOT EXISTS `nasabah` (
  `nasabah_id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_tgl_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomor_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomor_rekening` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `saldo` decimal(15,0) DEFAULT '0',
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nasabah_id`),
  UNIQUE KEY `nama_lengkap` (`nama_lengkap`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `nomor_telepon` (`nomor_telepon`),
  UNIQUE KEY `nomor_rekening` (`nomor_rekening`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table uas-mybcb-ci4.nasabah: ~4 rows (approximately)
INSERT INTO `nasabah` (`nasabah_id`, `nama_lengkap`, `jenis_kelamin`, `tempat_tgl_lahir`, `agama`, `alamat_lengkap`, `nomor_telepon`, `nomor_rekening`, `saldo`, `email`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Alfanoel Audrey', 'Laki-laki', 'Jakarta, 19 Januari 1999', 'Kristen', 'Jl. Raya Ps. Kecapi No.24', '082246613305', '6871812904', 250000000, 'alfanoel9@gmail.com', 'alfan0el', '$2y$10$..c/lhx4DvBxuJ9.mf93D.IPD9oOHuBCUJvsnplxVf5r32nwCWYNq', '2025-01-15 11:30:26', '2025-01-15 11:30:26', '2025-01-15 11:30:26'),
	(9, 'Fickry Pratama', 'Laki-Laki', 'Jakarta, 10 Juli 1945', 'Islam', 'Griya Alam Sentosa', '08224561235', '6871332729', 20000000, 'fickry@gmail.com', 'fickry1', '$2y$10$VTxDqPqKxAViNP367nst8exrrQ14cAAWC1aGNe/KFeyZUJTu/zSve', '2025-01-15 23:41:39', '2025-01-15 23:41:39', NULL),
	(10, 'Roby Rosa', NULL, NULL, NULL, NULL, NULL, '6871279604', 50000, 'roby@gmail.com', 'roby1', '$2y$10$4b5bv7Yg6arDkYUTwsk8v.GdahwUeaIK.0ZUZ7BI5BeaIdiY7V4TG', '2025-01-15 23:45:51', '2025-01-15 23:45:51', NULL),
	(11, 'Dystian', 'Laki-Laki', 'Papua, 20 Desember 1920', 'Islam', 'Tebet ajah', '0824565252', '6871608889', 50000, 'tian@gmail.com', 'tian1', '$2y$10$rfIEewOKq0kh.BHNEc4YQu9C5xLSRY8czpgzY8fYfRUxD3AnzwyIa', '2025-01-15 23:46:36', '2025-01-15 23:46:36', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
