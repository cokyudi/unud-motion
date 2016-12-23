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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `favorit` */

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `info` */

insert  into `info`(`id`,`user`,`tanggal`,`judul_info`,`foto`,`deskripsi`,`komentar`,`favorit`,`status`) values (1,'ilmu_komputer','2016-11-25','aaaaa','aaa','aaaaa',4,1,1);

/*Table structure for table `komentar` */

CREATE TABLE `komentar` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `id_info` int(8) NOT NULL,
  `user` varchar(16) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `komentar` */

insert  into `komentar`(`id`,`id_info`,`user`,`komentar`,`tanggal`) values (2,1,'1408605014','ssasasaasas sas','2016-11-24 00:00:00'),(3,1,'1408605014','ahsk kajhasa','2016-11-24 00:00:00');

/*Table structure for table `pengaduan` */

CREATE TABLE `pengaduan` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `oleh_user` varchar(16) NOT NULL,
  `kepada_user` varchar(16) NOT NULL,
  `nama_laporan` varchar(32) NOT NULL,
  `foto` varchar(256) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `jenis_laporan` varchar(16) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `vote` int(4) NOT NULL DEFAULT '0',
  `status` varchar(32) NOT NULL DEFAULT 'belum diverifikasi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `pengaduan` */

insert  into `pengaduan`(`id`,`oleh_user`,`kepada_user`,`nama_laporan`,`foto`,`deskripsi`,`jenis_laporan`,`tgl_dibuat`,`vote`,`status`) values (1,'1408605014','ilmu_komputer','Gedung kyk hutan','aaa','aaaaaaaaa','pengaduan','2016-11-24',4,'belum diverifikasi'),(6,'1408605014','ilmu_komputer','ada dada asdjdj','aaa','asas asasasa ','pengaduan','2016-11-24',0,'selesai');

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

insert  into `user`(`user`,`password`,`nama`,`foto`,`role`,`pengaduan`,`favorit`,`status`) values ('1408605014','827ccb0eea8a706c4c34a16891f84e7b','Gung De Surya Kusuma','aaaa',1,4,0,1),('ilmu_komputer','827ccb0eea8a706c4c34a16891f84e7b','Jurusan Ilmu Komputer','aaa',3,0,0,1);

/*Table structure for table `vote` */

CREATE TABLE `vote` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `id_pengaduan` int(8) NOT NULL,
  `user` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vote` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
