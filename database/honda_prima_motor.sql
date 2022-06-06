/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.21-MariaDB : Database - honda_prima_motor
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`honda_prima_motor` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `honda_prima_motor`;

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `nik_karyawan` varchar(10) NOT NULL,
  `level_karyawan` varchar(10) DEFAULT NULL,
  `nama_karyawan` varchar(30) DEFAULT NULL,
  `alamat_karyawan` text DEFAULT NULL,
  `kontak_karyawan` varchar(15) DEFAULT NULL,
  `username_karyawan` varchar(20) DEFAULT NULL,
  `password_karyawan` varchar(20) DEFAULT NULL,
  `foto_karyawan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nik_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `karyawan` */

insert  into `karyawan`(`nik_karyawan`,`level_karyawan`,`nama_karyawan`,`alamat_karyawan`,`kontak_karyawan`,`username_karyawan`,`password_karyawan`,`foto_karyawan`) values 
('11111','Admin','Angga','Kuningan','081111111111','admin','admin',''),
('22222','Pimpinan','Pimpinan','Kuningan','082222222222','pimpinan','pimpinan',NULL),
('33333','Sales','Adi','Kuningan','083333333333','sales1','sales1',NULL),
('44444','Sales','Beni','Kuningan','084444444444','sales2','sales2',NULL),
('55555','Sales','Cica','Kuningan','085555555555','sales3','sales3',NULL),
('66666','Sales','Dita','Kuningan','089666666666','sales4','sales4',NULL),
('77777','Sales','Deni','Kuningan\r\n','087777777777','sales5','sales5',NULL);

/*Table structure for table `kriteria` */

DROP TABLE IF EXISTS `kriteria`;

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(20) DEFAULT NULL,
  `keterangan_kriteria` text DEFAULT NULL,
  `penilaian_kriteria` varchar(20) DEFAULT NULL,
  `bobot_kriteria` float DEFAULT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kriteria` */

insert  into `kriteria`(`kode_kriteria`,`nama_kriteria`,`keterangan_kriteria`,`penilaian_kriteria`,`bobot_kriteria`) values 
('K1','Absensi','Menilai dari aspek bla bla bla','k1_penilaian',1),
('K2','Data Kanvasing','Menilai dari aspek bla bla bla','k2_penilaian',1),
('K3','Data Penjualan','Menilai dari aspek bla bla bla','k3_penilaian',1),
('K4','Keaktifan','Menilai dari aspek bla bla bla','k4_penilaian',1);

/*Table structure for table `penilaian` */

DROP TABLE IF EXISTS `penilaian`;

CREATE TABLE `penilaian` (
  `kode_penilaian` int(10) NOT NULL AUTO_INCREMENT,
  `kode_rekap` varchar(50) DEFAULT NULL,
  `nik_karyawan` varchar(10) DEFAULT NULL,
  `tanggal_penilaian` date DEFAULT NULL,
  `k1_penilaian` float DEFAULT NULL,
  `k2_penilaian` float DEFAULT NULL,
  `k3_penilaian` float DEFAULT NULL,
  `k4_penilaian` float DEFAULT NULL,
  `lf_penilaian` float DEFAULT NULL,
  `ef_penilaian` float DEFAULT NULL,
  `nf_penilaian` float DEFAULT NULL,
  `ranking_penilaian` int(10) DEFAULT NULL,
  `kelayakan_penilaian` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kode_penilaian`)
) ENGINE=InnoDB AUTO_INCREMENT=44460 DEFAULT CHARSET=utf8mb4;

/*Data for the table `penilaian` */

insert  into `penilaian`(`kode_penilaian`,`kode_rekap`,`nik_karyawan`,`tanggal_penilaian`,`k1_penilaian`,`k2_penilaian`,`k3_penilaian`,`k4_penilaian`,`lf_penilaian`,`ef_penilaian`,`nf_penilaian`,`ranking_penilaian`,`kelayakan_penilaian`) values 
(0,NULL,'33333','2022-04-22',1,1,1,1,NULL,NULL,NULL,NULL,NULL),
(2,'RKP-20220606080649','44444','2022-06-24',3,4,5,3,0.7425,0.495,0.2475,2,NULL),
(3,'RKP-20220606080649','55555','2022-06-24',4,3,4,2,0.495,0.66,-0.165,4,NULL),
(4,'RKP-20220606080649','66666','2022-06-01',4,5,3,1,0.5775,0.66,-0.0825,3,NULL),
(5,'RKP-20220606080649','77777','2022-06-24',2,1,2,4,0.2475,1.0725,-0.825,5,NULL),
(44454,'RKP-20220606080649','33333','2022-06-27',5,4,4,5,0.99,0.165,0.825,1,NULL);

/*Table structure for table `rekap` */

DROP TABLE IF EXISTS `rekap`;

CREATE TABLE `rekap` (
  `kode_rekap` varchar(50) NOT NULL,
  `tanggal_rekap` datetime DEFAULT NULL,
  `keterangan_rekap` text DEFAULT NULL,
  PRIMARY KEY (`kode_rekap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `rekap` */

insert  into `rekap`(`kode_rekap`,`tanggal_rekap`,`keterangan_rekap`) values 
('RKP-20220606080649','2022-06-06 08:06:49','Mantap');

/*Table structure for table `subkriteria` */

DROP TABLE IF EXISTS `subkriteria`;

CREATE TABLE `subkriteria` (
  `kode_subkriteria` varchar(5) NOT NULL,
  `kode_kriteria` varchar(5) DEFAULT NULL,
  `nama_subkriteria` varchar(20) DEFAULT NULL,
  `persentase_subkriteria` varchar(20) DEFAULT NULL,
  `bobot_subkriteria` float DEFAULT NULL,
  PRIMARY KEY (`kode_subkriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `subkriteria` */

insert  into `subkriteria`(`kode_subkriteria`,`kode_kriteria`,`nama_subkriteria`,`persentase_subkriteria`,`bobot_subkriteria`) values 
('K11','K1','Sangat Baik','100%',5),
('K12','K1','Baik','95%',4),
('K13','K1','Cukup','90%',3),
('K14','K1','Kurang','85%',2),
('K15','K1','Sangat Kurang','80%',1),
('K21','K2','Sangat Baik','41 Orang',5),
('K22','K2','Baik','31 Orang',4),
('K23','K2','Cukup','21 Orang',3),
('K24','K2','Kurang','11 Orang',2),
('K25','K2','Sangat Kurang','1 Orang',1),
('K31','K3','Sangat Baik','15 Unit',5),
('K32','K3','Baik','10 Unit',4),
('K33','K3','Cukup','7 Unit',3),
('K34','K3','Kurang','4 Unit',2),
('K35','K3','Sangat Kurang','1 Unit',1),
('K41','K4','Sangat Baik','20 Video',5),
('K42','K4','Baik','15 Video',4),
('K43','K4','Cukup','10 Video',3),
('K44','K4','Kurang','5 Video',2),
('K45','K4','Sangat Kurang','1 Video',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
