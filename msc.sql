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
  `title` varchar(200) NOT NULL,
  `description` longtext,
  `thumbnail` varchar(150) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `pages` int(5) DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `rates_count` int(10) DEFAULT NULL,
  `publisher` varchar(150) DEFAULT NULL,
  `published_date` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `books` */

insert  into `books`(`id`,`title`,`description`,`thumbnail`,`author`,`pages`,`language`,`rate`,`rates_count`,`publisher`,`published_date`,`created_at`) values ('-8DhHgAACAAJ','PsÄ“phiaka diktya, gnÅsÄ“ kai dÄ“mosia politikÄ“',NULL,NULL,'PersephonÄ“ ZerÄ“',391,'el',0,0,'I. SiderÄ“s','2006','2017-10-26 18:06:06'),('0KiO_W_3w24C','Î‘ÏƒÏÏÎ¼Î±Ï„Î± Î”Î¯ÎºÏ„Ï…Î± Î¥Ï€Î¿Î»Î¿Î³Î¹ÏƒÏ„ÏŽÎ½ Î‘ÏƒÏ†Î¬Î»ÎµÎ¹Î± ÎºÎ±Î¹ Î‘Ï€ÏŒÎ´Î¿ÏƒÎ· Ï„Ï‰Î½ Î ÏÏ‰Ï„Î¿ÎºÏŒÎ»Î»Ï‰Î½ TCP/IP',NULL,'http://books.google.com/books/content?id=0KiO_W_3w24C&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE713J5sjqQTbhB1di3U21Xs3XgnoWt0kSbsMpKPClRD',NULL,540,'el',0,0,'Nikolaos Preve',NULL,'2017-10-26 18:05:22'),('a_wwDwAAQBAJ','Perfect Ten','<p>Â ÎœÎ¹Î± Î±Î¼ÎµÏÎ¹ÎºÎ±Î½Î¯Î´Î± ÏƒÏ…Î½Ï„Î¬ÎºÏ„ÏÎ¹Î± Î¼ÏŒÎ´Î±Ï‚, Î­Î½Î±Ï‚ Î»Î¿Î½Î´ÏÎ­Î¶Î¿Ï‚ Î±ÏÏ‡Î¹Ï„Î­ÎºÏ„Î¿Î½Î±Ï‚, Î­Î½Î±Ï‚ Ï…Î¹ÏŒÏ‚ Î³ÎµÏÎ¿Ï…ÏƒÎ¹Î±ÏƒÏ„Î®, Î¼Î¹Î± ÎºÎ»Î·ÏÎ¿Î½ÏŒÎ¼Î¿Ï‚ Î¿Î¯ÎºÎ¿Ï… Î¼ÏŒÎ´Î±Ï‚ ÎºÎ±Î¹ Î­Î½Î±Ï‚ Î±Ï„Î¯Î¸Î±ÏƒÎ¿Ï‚ Ï€ÏÎ¿Î³ÏÎ±Î¼Î¼Î±Ï„Î¹ÏƒÏ„Î®Ï‚ Î¾ÎµÎºÎ¹Î½Î¿ÏÎ½ Î­Î½Î± Î¹Î´Î¹Î±Î¯Ï„ÎµÏÎ¿ Ï„Î±Î¾Î¯Î´Î¹ Ï€Î¿Ï… Î¸Î± Ï„Î¿Ï…Ï‚ Î±Î»Î»Î¬Î¾ÎµÎ¹ Ï„Î·Î½ Î¶Ï‰Î®. Î£Ï„Î¿ BÃ¼rgenstock Ï„Î·Ï‚ Î•Î»Î²ÎµÏ„Î¯Î±Ï‚, ÏŒÏ€Î¿Ï… Ï‡ÏÏŒÎ½Î¹Î± Ï€ÏÎ¹Î½ ÎµÎ¯Ï‡Îµ ÏƒÏ…Î½ÎµÎ´ÏÎ¹Î¬ÏƒÎµÎ¹ Î· Ï€ÎµÏÎ¯Ï†Î·Î¼Î· Î»Î­ÏƒÏ‡Î· <b>ÎœÏ€Î¯Î»Î½Ï„ÎµÏÎ¼Ï€ÎµÏÎ³Îº</b>, ÏƒÎµ Î¼Î¯Î± Î±Ï€Î¿Î¼Î±ÎºÏÏ…ÏƒÎ¼Î­Î½Î· Ï€Î»Î±Î³Î¹Î¬ Ï€Î¬Î½Ï‰ Î±Ï€ÏŒ Ï„Î·Î½ Î»Î¯Î¼Î½Î· Î›Î¿Ï…ÎºÎ­ÏÎ½Î· Î²ÏÎ¯ÏƒÎºÎµÏ„Î±Î¹ ÎºÎ±Î»Î¬ ÎºÏÏ…Î¼Î¼Î­Î½Î· Î¼Î¹Î± Ï€Î¿Î»Ï…Ï„ÎµÎ»Î®Ï‚ ÎºÎ»Î¹Î½Î¹ÎºÎ®. Î£Îµ Î±Ï…Ï„Î­Ï‚ Ï„Î¹Ï‚ Ï…Ï€ÎµÏÏƒÏÎ³Ï‡ÏÎ¿Î½ÎµÏ‚ ÎµÎ³ÎºÎ±Ï„Î±ÏƒÏ„Î¬ÏƒÎµÎ¹Ï‚ ÎµÎºÏ„Ï…Î»Î¯ÏƒÏƒÎµÏ„Î±Î¹ ÎµÎ´ÏŽ ÎºÎ±Î¹ Î´ÎµÎºÎ±ÎµÏ„Î¯ÎµÏ‚, Î¼Î¹Î± Ï€Î±Î³ÎºÏŒÏƒÎ¼Î¹Î± ÏƒÏ…Î½Ï‰Î¼Î¿ÏƒÎ¯Î± Ï„Ï‰Î½ Î¼ÎµÎ³Î±Î»ÏÏ„ÎµÏÏ‰Î½ ÎµÎ¼Ï€Î¿ÏÎ¹ÎºÏŽÎ½ ÎºÎ¿Î»Î¿ÏƒÏƒÏŽÎ½ Î· Î¿Ï€Î¿Î¯Î± Î³Î¹Î± Ï‡ÏÏŒÎ½Î¹Î± ÎµÏ€Î·ÏÎµÎ¬Î¶ÎµÎ¹Â  ÏŒÎ»Î¿ Ï„Î¿Î½ ÏƒÏÎ³Ï‡ÏÎ¿Î½Î¿ Ï„ÏÏŒÏ€Î¿ Î¶Ï‰Î®Ï‚.Â </p> <p>Î— Î­Î¼Ï†Ï…Ï„Î· Î±Î½Î¬Î³ÎºÎ· Ï„Î¿Ï… Î±Î½Î¸ÏÏŽÏ€Î¿Ï… Î½Î± Î¾ÎµÏ‡Ï‰ÏÎ¯ÏƒÎµÎ¹ ÏƒÏ„Î¿ ÎºÎ¿Î¹Î½Ï‰Î½Î¹ÎºÏŒ Ï„Î¿Ï… ÏƒÏÎ½Î¿Î»Î¿ ÎºÎ±Î¹ Î½Î± Î±Î½Î±Î´ÎµÎ¹Ï‡Î¸ÎµÎ¯ ÎºÎ¿Î¹Î½Ï‰Î½Î¹ÎºÎ¬ Î³Î¯Î½ÎµÏ„Î±Î¹ Î±Î½Ï„Î¹ÎºÎµÎ¯Î¼ÎµÎ½Î¿ ÎµÎºÎ¼ÎµÏ„Î¬Î»Î»ÎµÏ…ÏƒÎ·Ï‚ ÏƒÏ„Î± Ï‡Î­ÏÎ¹Î± Ï„Ï‰Î½ Î»Î¯Î³Ï‰Î½ ÎºÎ±Î¹ ÎµÎºÎ»ÎµÎºÏ„ÏŽÎ½. Î¤Î± Î±Ï€Î¿Ï„ÎµÎ»Î­ÏƒÎ¼Î±Ï„Î±, Î±Ï€Î»Î¬ Î²ÏÎ¯ÏƒÎºÎ¿Î½Ï„Î±Î¹ Î³ÏÏÏ‰ Î¼Î±Ï‚ Ï‡Ï‰ÏÎ¯Ï‚ Î½Î± Ï„Î¿ Î¾Î­ÏÎ¿Ï…Î¼Îµ. </p> <p>Â ÎˆÎ½Î± Ï€ÏÏ‰Ï„ÏŒÏ„Ï…Ï€Î¿ ÏƒÏ…Î½Ï‰Î¼Î¿ÏƒÎ¹Î¿Î»Î¿Î³Î¹ÎºÏŒ Î¼Ï…Î¸Î¹ÏƒÏ„ÏŒÏÎ·Î¼Î± Â Î¸ÏÎ¯Î»ÎµÏ, Î³ÏÎ±Î¼Î¼Î­Î½Î¿ Î¼Îµ ÎºÎ¹Î½Î·Î¼Î±Ï„Î¿Î³ÏÎ±Ï†Î¹ÎºÏŒ Ï„ÏÏŒÏ€Î¿ Î³ÎµÎ¼Î¬Ï„Î¿ Î´ÏÎ¬ÏƒÎ· ÎºÎ±Î¹ Î±Î½Î±Ï„ÏÎ¿Ï€Î­Ï‚ Î±Î»Î»Î¬ ÎºÎ±Î¹ Â Î²Î±Î¸Î¹Î­Ï‚ ÎºÎ¿Î¹Î½Ï‰Î½Î¹ÎºÎ­Ï‚ Ï€ÏÎ¿ÎµÎºÏ„Î¬ÏƒÎµÎ¹Ï‚. Î£Ï„ÏŒÏ‡Î¿Ï‚ Ï„Î¿Ï… ÏƒÏ…Î³Î³ÏÎ±Ï†Î­Î± Â ÎµÎ¯Î½Î±Î¹ Î½Î± Î¼Î±Ï‚ Ï€ÏÎ¿ÎºÎ±Î»Î­ÏƒÎµÎ¹ Ï„Î¿ ÎµÏÏŽÏ„Î·Î¼Î±,Â Â Â Â  Â Â Â Â Â Â Â Â Â Â Â Â </p><p><b>Â Â Â Â¨<i>ÎºÎ±Î¹ Î±Î½ ÎµÎ¯Î½Î±Î¹ ÏŒÎ½Ï„Ï‰Ï‚ Î­Ï„ÏƒÎ¹;</i> Â¨</b></p>','http://books.google.com/books/content?id=a_wwDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE73OVTO6msbIQrCL55vQsM4igo_EHMgRxehrqRGFh4S','Î‘Î»Î­Î¾Î±Î½Î´ÏÎ¿Ï‚ Î’. Î£Ï‰Ï„Î·ÏÎ¬ÎºÎ·Ï‚',280,'el',0,0,'Alexander V. Sotrakis','2017-08-14','2017-10-27 19:16:05'),('FnHENKWLTmcC','Country quilting','Provides instructions and patterns for making quilts and quilted table runners, sewing machine covers, wall hangings, place mats, and pillows','http://books.google.com/books/content?id=FnHENKWLTmcC&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE71gMNc3GS7EGttYTRMAA2k1vlFJqGNySMe7-UH_SNgOeTM1c1W4w','Better Homes and Gardens',80,'en',0,0,'Meredith Press','1992-04','2017-10-24 21:24:28'),('j5jFmAEACAAJ','Wireless Communication Systems',NULL,NULL,'Rajeshwar Das',200,'en',0,0,'I.K. International Publishing House Pvt. Limited','2012-11-01','2017-10-26 18:00:21'),('s1gVAAAAYAAJ','Pride and Prejudice','Austenâ€™s most celebrated novel tells the story of Elizabeth Bennet, a bright, lively young woman with four sisters, and a mother determined to marry them to wealthy men. At a party near the Bennetsâ€™ home in the English countryside, Elizabeth meets the wealthy, proud Fitzwilliam Darcy. Elizabeth initially finds Darcy haughty and intolerable, but circumstances continue to unite the pair','http://books.google.com/books/content?id=s1gVAAAAYAAJ&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE736dxy7JQ4WSc6X7jBpppHRjZvM8NEeZtaZdgMN2OFV6vTOpwBFe','Jane Austen',401,NULL,4,2256,NULL,NULL,'2017-10-24 19:44:24');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`firstname`,`lastname`,`email`,`password`,`country`,`city`,`address`,`created_at`) values (1,'Vaggelis','Kotrotsios','vako88@gmail.com','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 19:42:54'),(13,'Giannis','Kostopoulos','kostopoulos@gmail.comm','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 19:42:54'),(14,'Giannis','Kostopoulos','vako88frfr@gmail.com','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 19:42:54'),(15,'nikos','lazogas','vako881@gmail.com','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 19:42:54'),(16,'giannis','lazogas','vako8fewfwe8@gmail.com','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 19:42:54'),(17,'eleftheria','lazogas','vako8frefr8@gmail.com','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 19:42:54'),(18,'alekos','lazogas','alekos@books.com','010300ed4af61c9b98a0ce35f9284df91110a73c',NULL,NULL,NULL,'2017-10-24 22:08:44');

/*Table structure for table `users_rel_books` */

DROP TABLE IF EXISTS `users_rel_books`;

CREATE TABLE `users_rel_books` (
  `user_id` int(10) unsigned DEFAULT NULL,
  `book_id` varchar(20) DEFAULT NULL,
  `case` enum('read','want','rent') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `user_id_urb_fk` (`user_id`),
  KEY `book_id_urb_fk` (`book_id`),
  CONSTRAINT `book_id_urb_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `user_id_urb_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users_rel_books` */

insert  into `users_rel_books`(`user_id`,`book_id`,`case`,`created_at`) values (1,'s1gVAAAAYAAJ','read','2017-10-24 19:58:12'),(1,'a_wwDwAAQBAJ','read','2017-10-27 19:19:30');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
