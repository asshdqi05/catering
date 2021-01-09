/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.17-MariaDB : Database - catering
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

/*Table structure for table `detail_pesanan_harian` */

DROP TABLE IF EXISTS `detail_pesanan_harian`;

CREATE TABLE `detail_pesanan_harian` (
  `id_dt_harian` int(11) NOT NULL AUTO_INCREMENT,
  `id_dt_pesanan_harian` varchar(20) DEFAULT NULL,
  `id_dt_menu` varchar(20) DEFAULT NULL,
  `dt_jumlah` int(11) DEFAULT NULL,
  `dt_hari` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_dt_harian`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_pesanan_harian` */

insert  into `detail_pesanan_harian`(`id_dt_harian`,`id_dt_pesanan_harian`,`id_dt_menu`,`dt_jumlah`,`dt_hari`) values (4,'0000000001','MN-00001',2,'Senin'),(5,'0000000001','MN-00002',5,'Senin');

/*Table structure for table `detail_pesanan_pesta` */

DROP TABLE IF EXISTS `detail_pesanan_pesta`;

CREATE TABLE `detail_pesanan_pesta` (
  `id_dt_pesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_dt_pesanan_pesta` varchar(20) DEFAULT NULL,
  `id_dt_menu` varchar(20) DEFAULT NULL,
  `dt_jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dt_pesta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_pesanan_pesta` */

insert  into `detail_pesanan_pesta`(`id_dt_pesta`,`id_dt_pesanan_pesta`,`id_dt_menu`,`dt_jumlah`) values (4,'T-0000000001','MN-00006',1),(5,'T-0000000001','MN-00003',12);

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

insert  into `karyawan`(`id_karyawan`,`nama_karyawan`,`no_hp`,`alamat`,`jabatan`) values ('KR-00001','budi','09844','Padang',2),('KR-00002','yuni','1233','Bengkulu',1),('KR-00003','Dajon','09454','Pariaman',3),('KR-00004','Jordy','12434','Meksiko',4);

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
  `hari` varchar(20) DEFAULT NULL,
  `nama_menu` varchar(255) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `foto_makanan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `menu_makanan` */

insert  into `menu_makanan`(`id_menu`,`hari`,`nama_menu`,`harga`,`foto_makanan`) values ('MN-00001','senin','Rendang Ayam',10000,'Rendang_Ayam.jpg'),('MN-00002','senin','Cah Kangkung',10000,'cah_kangkung.jpg'),('MN-00003','selasa','Ayam goreng balado',10000,'Ayam_Balado.jpg'),('MN-00004','selasa','Gulai Cubadak',10000,'gulai_cubadak.jpg'),('MN-00005','rabu','Gulai Cancang',10000,'gulai_cancang.jpeg'),('MN-00006','rabu','Anyang',10000,'anyang.jpg'),('MN-00007','kamis','Ikan bakar',10000,'ikan_bakar.jpg'),('MN-00008','kamis','Tumis Tauge',10000,'Tumis_tauge.jpg'),('MN-00009','jumat','Rendang',10000,'rendang.jpg'),('MN-00010','jumat','Gulai Singkong',10000,'Gulai_Singkong.jpg'),('MN-00011','sabtu','Pangek Padeh',10000,'pangek_padeh.jpg'),('MN-00012','sabtu','Gulai Paku',10000,'gulai_paku.jpg'),('MN-00013','minggu','Dendeng Lado Hijau',10000,'dendeng_lado_hijau.jpg'),('MN-00014','minggu','Sayur Asam',10000,'Sayur_Asam.jpg');

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(10) NOT NULL,
  `nama_pelanggan` varchar(99) DEFAULT NULL,
  `alamat` varchar(99) DEFAULT NULL,
  `nohp` char(15) DEFAULT NULL,
  `email` varchar(99) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`nama_pelanggan`,`alamat`,`nohp`,`email`,`password`,`status`) values ('PL-00001','arohim Furqan','veteran','123456780','rohim98@gmail.com','123','1');

/*Table structure for table `pengeluaran` */

DROP TABLE IF EXISTS `pengeluaran`;

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` char(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pengeluaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengeluaran` */

/*Table structure for table `pesanan_harian` */

DROP TABLE IF EXISTS `pesanan_harian`;

CREATE TABLE `pesanan_harian` (
  `id_pesanan_harian` varchar(255) NOT NULL,
  `id_pesanan_pelanggan` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah_bayar` double DEFAULT NULL,
  `bukti_bayar` longblob DEFAULT NULL,
  `status_pesanan` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_pesanan_harian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pesanan_harian` */

insert  into `pesanan_harian`(`id_pesanan_harian`,`id_pesanan_pelanggan`,`tanggal`,`jumlah_bayar`,`bukti_bayar`,`status_pesanan`) values ('0000000001','PL-00001','2020-12-28',70000,NULL,'1');

/*Table structure for table `pesanan_pesta` */

DROP TABLE IF EXISTS `pesanan_pesta`;

CREATE TABLE `pesanan_pesta` (
  `id_pesanan_pesta` varchar(20) NOT NULL,
  `id_pesanan_pelanggan` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah_bayar` double DEFAULT NULL,
  `bukti_bayar` longblob DEFAULT NULL,
  `status_pesanan` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_pesanan_pesta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pesanan_pesta` */

insert  into `pesanan_pesta`(`id_pesanan_pesta`,`id_pesanan_pelanggan`,`tanggal`,`jumlah_bayar`,`bukti_bayar`,`status_pesanan`) values ('T-0000000001','PL-00001','2020-12-25',130000,NULL,'1');

/*Table structure for table `tmp_pesan_harian` */

DROP TABLE IF EXISTS `tmp_pesan_harian`;

CREATE TABLE `tmp_pesan_harian` (
  `id_tmp_harian` int(11) NOT NULL AUTO_INCREMENT,
  `tmp_id_menu` varchar(20) DEFAULT NULL,
  `tmp_jumlah` int(11) DEFAULT NULL,
  `tmp_id_pelanggan` varchar(255) DEFAULT NULL,
  `tmp_hari` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tmp_harian`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tmp_pesan_harian` */

/*Table structure for table `tmp_pesan_pesta` */

DROP TABLE IF EXISTS `tmp_pesan_pesta`;

CREATE TABLE `tmp_pesan_pesta` (
  `id_tmp_pesta` int(11) NOT NULL AUTO_INCREMENT,
  `tmp_id_menu` varchar(20) DEFAULT NULL,
  `tmp_jumlah` int(11) DEFAULT NULL,
  `tmp_id_pelanggan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_tmp_pesta`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tmp_pesan_pesta` */

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

insert  into `user`(`id_user`,`nama_user`,`username_user`,`password_user`,`level_user`) values ('admin','admin','admin','21232f297a57a5a743894a0e4a801fc3',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
