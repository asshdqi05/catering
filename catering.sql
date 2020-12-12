/*
SQLyog Ultimate v12.09 (32 bit)
MySQL - 10.4.13-MariaDB : Database - catering
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`catering` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `catering`;

/*Table structure for table `detail_menu` */

DROP TABLE IF EXISTS `detail_menu`;

CREATE TABLE `detail_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `nama_makanan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_menu` */

/*Table structure for table `jabatan` */

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id_jabatan` int(1) NOT NULL,
  `nama_jabatan` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jabatan` */

insert  into `jabatan`(`id_jabatan`,`nama_jabatan`) values (1,'Administrasi'),(2,'Juru Masak'),(3,'Kurir'),(4,'Cleaning Service');

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id_karyawan` char(10) NOT NULL,
  `nama_karyawan` varchar(99) DEFAULT NULL,
  `no_hp` varchar(99) DEFAULT NULL,
  `alamat` varchar(99) DEFAULT NULL,
  `jabatan` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `karyawan` */

insert  into `karyawan`(`id_karyawan`,`nama_karyawan`,`no_hp`,`alamat`,`jabatan`) values ('KR-00001','aa','333','aaa',1);

/*Table structure for table `level_user` */

DROP TABLE IF EXISTS `level_user`;

CREATE TABLE `level_user` (
  `id` int(1) NOT NULL,
  `level` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `level_user` */

insert  into `level_user`(`id`,`level`) values (1,'Admin'),(2,'Pimpinan');

/*Table structure for table `menu_makanan` */

DROP TABLE IF EXISTS `menu_makanan`;

CREATE TABLE `menu_makanan` (
  `id_menu` char(10) NOT NULL,
  `nama_menu` varchar(255) DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `foto_makanan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `menu_makanan` */

insert  into `menu_makanan`(`id_menu`,`nama_menu`,`hari`,`foto_makanan`) values ('MN-00001','Rendang Ayam','senin','Rendang_Ayam.jpg');

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(10) NOT NULL,
  `nama_pelanggan` varchar(99) DEFAULT NULL,
  `alamat` varchar(99) DEFAULT NULL,
  `nohp` char(15) DEFAULT NULL,
  `email` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pelanggan` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` char(10) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `username_user` varchar(30) DEFAULT NULL,
  `password_user` varchar(255) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
