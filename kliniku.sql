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

-- membuang struktur untuk table kliniku.auth_assignment
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Membuang data untuk tabel kliniku.auth_assignment: ~0 rows (lebih kurang)

-- membuang struktur untuk table kliniku.auth_item
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Membuang data untuk tabel kliniku.auth_item: ~0 rows (lebih kurang)

-- membuang struktur untuk table kliniku.auth_item_child
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Membuang data untuk tabel kliniku.auth_item_child: ~0 rows (lebih kurang)

-- membuang struktur untuk table kliniku.auth_rule
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Membuang data untuk tabel kliniku.auth_rule: ~0 rows (lebih kurang)

-- membuang struktur untuk table kliniku.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8mb3_bin NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.migration: ~5 rows (lebih kurang)
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1682239251),
	('m140506_102106_rbac_init', 1682386076),
	('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1682386076),
	('m180523_151638_rbac_updates_indexes_without_prefix', 1682386076),
	('m200409_110543_rbac_update_mssql_trigger', 1682386076);

-- membuang struktur untuk table kliniku.obat
CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int NOT NULL AUTO_INCREMENT,
  `nama_obat` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `harga_obat` int NOT NULL DEFAULT '0',
  `stock` int DEFAULT '0',
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.obat: ~4 rows (lebih kurang)
INSERT INTO `obat` (`id_obat`, `nama_obat`, `harga_obat`, `stock`) VALUES
	(1, 'Paramex', 2500, 13),
	(2, 'Oskadon', 4000, 11),
	(3, 'Osagi', 1000, 20),
	(4, 'panadol', 1400, 9);

-- membuang struktur untuk table kliniku.pasien
CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int NOT NULL AUTO_INCREMENT,
  `nik` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `nama_pasien` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  `ttl_pasien` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `jenis_kelamin_pasien` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  `alamat_pasien` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  `telepon_pasien` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pasien`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.pasien: ~1 rows (lebih kurang)
INSERT INTO `pasien` (`id_pasien`, `nik`, `nama_pasien`, `ttl_pasien`, `jenis_kelamin_pasien`, `alamat_pasien`, `telepon_pasien`) VALUES
	(1, '1231313', 'testa', '2023-04-23', '0', 'awedqw', '082120741970'),
	(2, '13213232', 'iwan', '2023-04-24', '1', 'awedqw', '123123213'),
	(3, '123123', 'adi', '2001-04-07', '1', 'jl. gatot kaca', '082120754044'),
	(4, '123123123', 'jivi', '2001-04-07', '1', 'jl. gatot kaca', '082121115441'),
	(5, '3209121', 'jivi Muz', '2023-04-27', '1', 'jl. gatot kaca', '13331');

-- membuang struktur untuk table kliniku.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `telepon_pegawai` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `email_pegawai` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `nip_pegawai` int NOT NULL,
  PRIMARY KEY (`id_pegawai`),
  UNIQUE KEY `email_pegawai` (`email_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.pegawai: ~2 rows (lebih kurang)
INSERT INTO `pegawai` (`id_pegawai`, `id_user`, `telepon_pegawai`, `email_pegawai`, `nip_pegawai`) VALUES
	(1, 1, '123123', 'gilangsupratman@gmail.com', 123123),
	(2, 3, '1231', 'jivirasgal@gmail.com', 341213);

-- membuang struktur untuk table kliniku.pemeriksaan
CREATE TABLE IF NOT EXISTS `pemeriksaan` (
  `id_pemeriksaan` int NOT NULL AUTO_INCREMENT,
  `nik` char(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  `id_pegawai` int NOT NULL DEFAULT '0',
  `id_wilayah` int NOT NULL DEFAULT '0',
  `keterangan` varchar(255) COLLATE utf8mb3_bin DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pemeriksaan`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.pemeriksaan: ~5 rows (lebih kurang)
INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `nik`, `id_pegawai`, `id_wilayah`, `keterangan`, `created_at`) VALUES
	(1, '1231313', 1, 1, '1dasd', NULL),
	(12, '1231313', 1, 2, 'qweqe', NULL),
	(13, '1231313', 1, 1, 'sakit gigi', '2023-04-27 11:39:28'),
	(14, '123123', 1, 1, 'asda', '2023-04-27 13:09:50'),
	(15, '3209121', 1, 1, 'sakit gigi', '2023-04-27 14:35:17');

-- membuang struktur untuk table kliniku.pengobatan
CREATE TABLE IF NOT EXISTS `pengobatan` (
  `id_pengobatan` int NOT NULL AUTO_INCREMENT,
  `id_obat` int NOT NULL,
  `jml_obat` int NOT NULL DEFAULT '1',
  `id_pemeriksaan` int NOT NULL,
  PRIMARY KEY (`id_pengobatan`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.pengobatan: ~6 rows (lebih kurang)
INSERT INTO `pengobatan` (`id_pengobatan`, `id_obat`, `jml_obat`, `id_pemeriksaan`) VALUES
	(10, 3, 1, 6),
	(12, 4, 3, 6),
	(16, 1, 1, 1),
	(17, 2, 1, 1),
	(18, 1, 1, 12),
	(20, 4, 1, 12),
	(22, 4, 2, 15);

-- membuang struktur untuk table kliniku.tindakan
CREATE TABLE IF NOT EXISTS `tindakan` (
  `id_tindakan` int NOT NULL AUTO_INCREMENT,
  `nama_tindakan` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tindakan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.tindakan: ~0 rows (lebih kurang)
INSERT INTO `tindakan` (`id_tindakan`, `nama_tindakan`) VALUES
	(1, 'Diminum 3x1'),
	(2, 'Diminum 2x1'),
	(3, 'Suntik Cairan'),
	(4, 'Dioles 3x1'),
	(5, 'Dioles 2x1');

-- membuang struktur untuk table kliniku.tindak_obat
CREATE TABLE IF NOT EXISTS `tindak_obat` (
  `id_tindak_obat` int NOT NULL AUTO_INCREMENT,
  `id_pengobatan` int NOT NULL DEFAULT '0',
  `id_tindakan` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tindak_obat`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.tindak_obat: ~4 rows (lebih kurang)
INSERT INTO `tindak_obat` (`id_tindak_obat`, `id_pengobatan`, `id_tindakan`) VALUES
	(1, 18, 1),
	(2, 18, 2),
	(12, 22, 1);

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
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.users: ~3 rows (lebih kurang)
INSERT INTO `users` (`id_user`, `username`, `nama_user`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `accessToken`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'jivi', 'jivi12313', '$2y$13$E9Gl0t7Ye2puITpW6JdViOgaAkE5N8LKzFN6iJivqzvqdw8CI68uu', NULL, 'jivisada@gmail.com', 1, 10, '112-token', '', NULL),
	(2, 'master', 'jivi', 'jivi12313', '$2y$13$xeoUVoI9d75DIpHRzrpdMetxil1L/E48gbm/4NRx0tmrWsMq9fmYm', NULL, 'jivirasgal@gmail.com', 2, 10, '112-token', '', NULL),
	(3, 'pegawai', 'jivi', 'jivi12313', '$2y$13$JjnO/rNkU9KFkcCLLat7pOwZ8j72E1q6Bmf7/LtibZYmj2xRkIe9.', NULL, 'jiuv@gmail.com', 3, 10, '112-token', '', NULL);

-- membuang struktur untuk table kliniku.wilayah
CREATE TABLE IF NOT EXISTS `wilayah` (
  `id_wilayah` int NOT NULL AUTO_INCREMENT,
  `nama_wilayah` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  `harga_daftar` int DEFAULT NULL,
  `harga_dokter` int DEFAULT NULL,
  PRIMARY KEY (`id_wilayah`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Membuang data untuk tabel kliniku.wilayah: ~0 rows (lebih kurang)
INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`, `harga_daftar`, `harga_dokter`) VALUES
	(1, 'jakarta', 10000, 30000),
	(2, 'bandung', 10000, 30000);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
