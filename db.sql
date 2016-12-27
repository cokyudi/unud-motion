/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.13-MariaDB : Database - udayana_motion
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`udayana_motion` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `favorit` */

CREATE TABLE `favorit` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `id_info` int(8) NOT NULL,
  `user` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `favorit` */

insert  into `favorit`(`id`,`id_info`,`user`) values (3,1,'1408605014'),(4,2,'1408605014');

/*Table structure for table `info` */

CREATE TABLE `info` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user` varchar(16) NOT NULL,
  `tanggal` date NOT NULL,
  `judul_info` varchar(32) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL,
  `komentar` int(4) NOT NULL DEFAULT '0',
  `favorit` int(4) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `info` */

insert  into `info`(`id`,`user`,`tanggal`,`judul_info`,`foto`,`deskripsi`,`komentar`,`favorit`,`status`) values (1,'ilmu_komputer','2016-12-30','aaaaa','aaa','aaaaa',8,1,1),(2,'ilmu_komputer','2016-12-31','aaaaa','aaa','ssss',0,0,0),(3,'1408605048','2016-12-26','aaa','aaa','aaa',0,0,0);

/*Table structure for table `komentar` */

CREATE TABLE `komentar` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `id_info` int(8) NOT NULL,
  `user` varchar(16) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `komentar` */

/*Table structure for table `pengaduan` */

CREATE TABLE `pengaduan` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `oleh_user` varchar(16) NOT NULL,
  `kepada_user` varchar(16) NOT NULL,
  `nama_laporan` varchar(32) NOT NULL,
  `foto` varchar(256) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `jenis_laporan` varchar(16) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `vote` int(4) NOT NULL DEFAULT '0',
  `status` varchar(32) NOT NULL DEFAULT 'belum diverifikasi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `pengaduan` */

insert  into `pengaduan`(`id`,`oleh_user`,`kepada_user`,`nama_laporan`,`foto`,`deskripsi`,`jenis_laporan`,`tgl_dibuat`,`vote`,`status`) values (1,'1408605014','ilmu_komputer','Gedung kyk hutan aj ajka akjsa a','aaa','aaaaaaaaa','pengaduan','2016-11-24 00:00:00',0,'belum diverifikasi'),(6,'1408605014','ilmu_komputer','ada dada asdjdj','aaa','asas asasasa ','pengaduan','2016-11-24 00:00:00',0,'dikerjakan'),(7,'1408605014','ilmu_komputer','tolong!','uploads/pengaduan_1482603877.jpg','aaa','pengaduan','2016-12-24 00:00:00',0,'belum diverifikasi'),(8,'1408605014','himakom','TOLONG!!','s','aaaaa','pengaduan','2016-12-26 05:13:30',0,'terverifikasi'),(15,'ilmu_komputer','','Listrik sudah ada','pengaduan_1482804257','asdasd asadasdjpg','laporan','2016-12-27 03:04:17',0,'laporan'),(16,'ilmu_komputer','','Laporan lagi','pengaduan_1482804369','aad ad  asdajpg','laporan','2016-12-27 10:06:09',0,'laporan'),(17,'ilmu_komputer','','asas','uploads/pengaduan_1482804586.jpg','asas','laporan','2016-12-27 10:09:46',0,'laporan'),(18,'ilmu_komputer','','Laporan lagi','uploads/pengaduan_1482804673.jpg','asasas','laporan','2016-12-27 10:11:13',0,'laporan');

/*Table structure for table `token` */

CREATE TABLE `token` (
  `token` varchar(200) NOT NULL,
  PRIMARY KEY (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `token` */

insert  into `token`(`token`) values ('akjsdhkasjhdadadqwdasd');

/*Table structure for table `user` */

CREATE TABLE `user` (
  `user` varchar(16) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `role` int(1) NOT NULL,
  `pengaduan` int(4) NOT NULL DEFAULT '0',
  `favorit` int(4) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user`,`password`,`nama`,`foto`,`role`,`pengaduan`,`favorit`,`status`) values ('1408605014','827ccb0eea8a706c4c34a16891f84e7b','Gung De Surya','uploads/profil_1408605014.jpg',1,0,0,1),('himakom','827ccb0eea8a706c4c34a16891f84e7b','Himakom','uploads/profil_1408605014.jpg',3,0,0,1),('ilmu_komputer','827ccb0eea8a706c4c34a16891f84e7b','Ilmu Komputer','aaa',3,0,0,1);

/*Table structure for table `vote` */

CREATE TABLE `vote` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `id_pengaduan` int(8) NOT NULL,
  `user` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `vote` */

insert  into `vote`(`id`,`id_pengaduan`,`user`) values (10,1,'1408605014'),(11,1,'ilmu_komputer');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
