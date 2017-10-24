/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.15-log : Database - msc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`msc` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `msc`;

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text,
  `thumbnail` varchar(150) DEFAULT NULL,
  `author` varchar(50) NOT NULL,
  `pages` int(5) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL,
  `rate` double NOT NULL,
  `rates_count` int(10) DEFAULT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `published_date` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `books` */

insert  into `books`(`id`,`title`,`description`,`thumbnail`,`author`,`pages`,`language`,`rate`,`rates_count`,`publisher`,`published_date`,`created_at`) values ('FnHENKWLTmcC','Country quilting','Provides instructions and patterns for making quilts and quilted table runners, sewing machine covers, wall hangings, place mats, and pillows','http://books.google.com/books/content?id=FnHENKWLTmcC&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE71gMNc3GS7EGttYTRMAA2k1vlFJqGNySMe7-UH_SNgOeTM1c1W4w','Better Homes and Gardens',80,'en',0,0,'Meredith Press','1992-04','2017-10-24 21:24:28'),('j5jFmAEACAAJ','Wireless Communication Systems','','','Rajeshwar Das',200,'en',0,0,'I.K. International Publishing House Pvt. Limited','2012-11-01','2017-10-24 21:26:05'),('s1gVAAAAYAAJ','Pride and Prejudice','Austen’s most celebrated novel tells the story of Elizabeth Bennet, a bright, lively young woman with four sisters, and a mother determined to marry them to wealthy men. At a party near the Bennets’ home in the English countryside, Elizabeth meets the wealthy, proud Fitzwilliam Darcy. Elizabeth initially finds Darcy haughty and intolerable, but circumstances continue to unite the pair','http://books.google.com/books/content?id=s1gVAAAAYAAJ&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE736dxy7JQ4WSc6X7jBpppHRjZvM8NEeZtaZdgMN2OFV6vTOpwBFe','Jane Austen',401,NULL,4,2256,NULL,NULL,'2017-10-24 19:44:24');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `country` varchar(20) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`lastname`,`email`,`password`,`country`,`city`,`address`,`created_at`) values (1,'Vaggelis','Kotrotsios','vako88@gmail.com','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 19:42:54'),(13,'Giannis','Kostopoulos','kostopoulos@gmail.comm','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 19:42:54'),(14,'Giannis','Kostopoulos','vako88frfr@gmail.com','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 19:42:54'),(15,'nikos','lazogas','vako881@gmail.com','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 19:42:54'),(16,'giannis','lazogas','vako8fewfwe8@gmail.com','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 19:42:54'),(17,'eleftheria','lazogas','vako8frefr8@gmail.com','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 19:42:54');

/*Table structure for table `users_rel_books` */

DROP TABLE IF EXISTS `users_rel_books`;

CREATE TABLE `users_rel_books` (
  `user_id` int(10) unsigned DEFAULT NULL,
  `book_id` varchar(20) DEFAULT NULL,
  `case` enum('read','want','rent') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `user_id_urb_fk` (`user_id`),
  KEY `book_id_urb_fk` (`book_id`),
  CONSTRAINT `user_id_urb_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `book_id_urb_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users_rel_books` */

insert  into `users_rel_books`(`user_id`,`book_id`,`case`,`created_at`) values (1,'s1gVAAAAYAAJ','read','2017-10-24 19:58:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
