-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk kliniku
CREATE DATABASE IF NOT EXISTS `kliniku` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `kliniku`;

-- membuang struktur untuk table kliniku.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8mb3_bin NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.migration: ~0 rows (lebih kurang)
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1682239251);

-- membuang struktur untuk table kliniku.obat
CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `harga_obat` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.obat: ~2 rows (lebih kurang)
INSERT INTO `obat` (`id_obat`, `nama_obat`, `harga_obat`) VALUES
	(1, 'Paramex', 2500),
	(2, 'Oskadon', 4000),
	(3, 'Osagi', 1000);

-- membuang struktur untuk table kliniku.pasien
CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  `ttl_pasien` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `jenis_kelamin_pasien` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  `alamat_pasien` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  `telepon_pasien` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.pasien: ~0 rows (lebih kurang)
INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `ttl_pasien`, `jenis_kelamin_pasien`, `alamat_pasien`, `telepon_pasien`) VALUES
	(1, 'test', '2023-04-23', '0', 'awedqw', '082120741970'),
	(2, 'iwan', '2023-04-24', '1', 'awedqw', '123123213');

-- membuang struktur untuk table kliniku.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `telepon_pegawai` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `email_pegawai` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `nip_pegawai` int NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.pegawai: ~0 rows (lebih kurang)
INSERT INTO `pegawai` (`id_pegawai`, `id_user`, `telepon_pegawai`, `email_pegawai`, `nip_pegawai`) VALUES
	(1, 1, '123123', 'gilangsupratman@gmail.com', 123123);

-- membuang struktur untuk table kliniku.pemeriksaan
CREATE TABLE IF NOT EXISTS `pemeriksaan` (
  `id_pemeriksaan` int NOT NULL AUTO_INCREMENT,
  `id_pasien` int NOT NULL DEFAULT '0',
  `id_pegawai` int NOT NULL DEFAULT '0',
  `id_obat` int NOT NULL DEFAULT '0',
  `id_tindakan` int NOT NULL DEFAULT '0',
  `id_wilayah` int NOT NULL DEFAULT '0',
  `keterangan` varchar(255) COLLATE utf8mb3_bin DEFAULT '0',
  PRIMARY KEY (`id_pemeriksaan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.pemeriksaan: ~0 rows (lebih kurang)
INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `id_pasien`, `id_pegawai`, `id_obat`, `id_tindakan`, `id_wilayah`, `keterangan`) VALUES
	(1, 1, 1, 1, 1, 1, '1dasd');

-- membuang struktur untuk table kliniku.tindakan
CREATE TABLE IF NOT EXISTS `tindakan` (
  `id_tindakan` int NOT NULL AUTO_INCREMENT,
  `nama_tindakan` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tindakan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.tindakan: ~0 rows (lebih kurang)
INSERT INTO `tindakan` (`id_tindakan`, `nama_tindakan`) VALUES
	(1, 'suntik mati'),
	(2, 'suntik rabies');

-- membuang struktur untuk table kliniku.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nama_user` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'jivi12313',
  `password_hash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `role` int DEFAULT '2',
  `status` smallint NOT NULL DEFAULT '10',
  `accessToken` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT '112-token',
  `created_at` char(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT '',
  `updated_at` char(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.users: ~3 rows (lebih kurang)
INSERT INTO `users` (`id_user`, `username`, `nama_user`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `accessToken`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'jivi', 'jivi12313', '$2y$13$E9Gl0t7Ye2puITpW6JdViOgaAkE5N8LKzFN6iJivqzvqdw8CI68uu', NULL, 'jivisada@gmail.com', 1, 10, '112-token', '', NULL),
	(2, 'user', 'jivi', 'jivi12313', '$2y$13$xeoUVoI9d75DIpHRzrpdMetxil1L/E48gbm/4NRx0tmrWsMq9fmYm', NULL, 'jivirasgal@gmail.com', 2, 10, '112-token', '', NULL),
	(3, 'pegawai', 'jivi', 'jivi12313', '$2y$13$JjnO/rNkU9KFkcCLLat7pOwZ8j72E1q6Bmf7/LtibZYmj2xRkIe9.', NULL, 'jiuv@gmail.com', 3, 10, '112-token', '', NULL);

-- membuang struktur untuk table kliniku.wilayah
CREATE TABLE IF NOT EXISTS `wilayah` (
  `id_wilayah` int NOT NULL AUTO_INCREMENT,
  `nama_wilayah` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_wilayah`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.wilayah: ~0 rows (lebih kurang)
INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`) VALUES
	(1, 'jakarta'),
	(2, 'bandung');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
