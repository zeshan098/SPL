/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.14 : Database - standpharma
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`standpharma` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `standpharma`;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `role` enum('fm','zm','nsm','csm','admin') DEFAULT NULL,
  `ccrsid` varchar(100) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_approved` bit(1) DEFAULT NULL,
  `is_active` bit(1) DEFAULT NULL,
  `is_deleted` bit(1) DEFAULT NULL,
  `approved_by` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`ccrsid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`email`,`contact`,`role`,`ccrsid`,`password`,`remember_token`,`is_approved`,`is_active`,`is_deleted`,`approved_by`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Ibrahim','Khan','ibrahimijk@yahoo.com','+923164216411','fm','000000','$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui',NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-14 20:18:20',NULL,'2019-04-14 20:18:20');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
