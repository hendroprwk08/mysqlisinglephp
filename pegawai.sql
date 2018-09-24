-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.25 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for pegawai
DROP DATABASE IF EXISTS `pegawai`;
CREATE DATABASE IF NOT EXISTS `pegawai` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pegawai`;

-- Dumping structure for table pegawai.divisi
DROP TABLE IF EXISTS `divisi`;
CREATE TABLE IF NOT EXISTS `divisi` (
  `id_divisi` int(3) NOT NULL AUTO_INCREMENT,
  `divisi` varchar(22) DEFAULT '0',
  `honor_divisi` double DEFAULT '0',
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table pegawai.divisi: ~2 rows (approximately)
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
REPLACE INTO `divisi` (`id_divisi`, `divisi`, `honor_divisi`) VALUES
	(2, 'Marketing', 800000),
	(3, 'Produksi', 900000);
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;

-- Dumping structure for table pegawai.jabatan
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(3) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(22) NOT NULL DEFAULT '0',
  `honor_jabatan` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table pegawai.jabatan: ~2 rows (approximately)
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
REPLACE INTO `jabatan` (`id_jabatan`, `jabatan`, `honor_jabatan`) VALUES
	(1, 'Staff', 500000),
	(2, 'Supervisor', 800000);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;

-- Dumping structure for table pegawai.karyawan
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE IF NOT EXISTS `karyawan` (
  `idPegawai` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(22) NOT NULL DEFAULT '0',
  `alamat` varchar(50) NOT NULL DEFAULT '0',
  `usia` int(2) NOT NULL DEFAULT '0',
  `kelamin` varchar(7) NOT NULL DEFAULT '0',
  `status` varchar(20) NOT NULL DEFAULT '0',
  `id_divisi` int(11) NOT NULL DEFAULT '0',
  `id_jabatan` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table pegawai.karyawan: ~1 rows (approximately)
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
REPLACE INTO `karyawan` (`idPegawai`, `nama`, `alamat`, `usia`, `kelamin`, `status`, `id_divisi`, `id_jabatan`) VALUES
	(7, 'fdsff', 'asdf fdasd', 9, 'Pria', 'Kontrak', 0, 0),
	(9, 'sdfasd', 'fsadfasd', 12, 'Wanita', 'Kontrak', 3, 2);
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
