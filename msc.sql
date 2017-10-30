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
  `thumbnail` varchar(300) DEFAULT NULL,
  `author` varchar(300) DEFAULT NULL,
  `pages` int(5) DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `rates_count` int(10) DEFAULT NULL,
  `publisher` varchar(300) DEFAULT NULL,
  `published_date` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `books` */

insert  into `books`(`id`,`title`,`description`,`thumbnail`,`author`,`pages`,`language`,`rate`,`rates_count`,`publisher`,`published_date`,`created_at`) values ('-8DhHgAACAAJ','Psēphiaka diktya, gnōsē kai dēmosia politikē',NULL,NULL,'Persephonē Zerē',391,'el',0,0,'I. Siderēs','2006','2017-10-26 18:06:06'),('0KiO_W_3w24C','Ασύρματα Δίκτυα Υπολογιστών Ασφάλεια και Απόδοση των Πρωτοκόλλων TCP/IP',NULL,'http://books.google.com/books/content?id=0KiO_W_3w24C&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE713J5sjqQTbhB1di3U21Xs3XgnoWt0kSbsMpKPClRD',NULL,540,'el',0,0,'Nikolaos Preve',NULL,'2017-10-26 18:05:22'),('AnXDLk5S5P8C','Lily Daw and the Three Ladies','\"Lily Daw is young, pretty, perhaps more than a little peculiar, and in love! However, the well-meaning ladies of the Helping Hand Society are determined to see Lily off to the State Home for the Feeble-Minded. They just don\'t believe her when she says she\'s planning to be married this very day. The ladies certainly do have grounds for concern. Lily has always had an odd imagination, and the man she\'s describing now is a \'show fellow.\' One thing is clear to the ladies, the faster they can get Lily committed, the better. They urgently try to get her consent. As they\'re winning her over, a \'show fellow\' appears and actually wants to marry Lily.\"--From publisher\'s website.','http://books.google.com/books/content?id=AnXDLk5S5P8C&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE72eFS0bdpr04C0_cP6XUXgg6eUXZlHAvbkwuXRLsmO','Ruth Perry, Eudora Welty',39,'en',0,0,'Dramatic Publishing','1972','2017-10-30 22:14:50'),('a_wwDwAAQBAJ','Perfect Ten','<p> Μια αμερικανίδα συντάκτρια μόδας, ένας λονδρέζος αρχιτέκτονας, ένας υιός γερουσιαστή, μια κληρονόμος οίκου μόδας και ένας ατίθασος προγραμματιστής ξεκινούν ένα ιδιαίτερο ταξίδι που θα τους αλλάξει την ζωή. Στο Bürgenstock της Ελβετίας, όπου χρόνια πριν είχε συνεδριάσει η περίφημη λέσχη <b>Μπίλντερμπεργκ</b>, σε μία απομακρυσμένη πλαγιά πάνω από την λίμνη Λουκέρνη βρίσκεται καλά κρυμμένη μια πολυτελής κλινική. Σε αυτές τις υπερσύγχρονες εγκαταστάσεις εκτυλίσσεται εδώ και δεκαετίες, μια παγκόσμια συνωμοσία των μεγαλύτερων εμπορικών κολοσσών η οποία για χρόνια επηρεάζει  όλο τον σύγχρονο τρόπο ζωής. </p> <p>Η έμφυτη ανάγκη του ανθρώπου να ξεχωρίσει στο κοινωνικό του σύνολο και να αναδειχθεί κοινωνικά γίνεται αντικείμενο εκμετάλλευσης στα χέρια των λίγων και εκλεκτών. Τα αποτελέσματα, απλά βρίσκονται γύρω μας χωρίς να το ξέρουμε. </p> <p> Ένα πρωτότυπο συνωμοσιολογικό μυθιστόρημα  θρίλερ, γραμμένο με κινηματογραφικό τρόπο γεμάτο δράση και ανατροπές αλλά και  βαθιές κοινωνικές προεκτάσεις. Στόχος του συγγραφέα  είναι να μας προκαλέσει το ερώτημα,                 </p><p><b>   ¨<i>και αν είναι όντως έτσι;</i> ¨</b></p>','http://books.google.com/books/content?id=a_wwDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE73OVTO6msbIQrCL55vQsM4igo_EHMgRxehrqRGFh4S','Αλέξανδρος Β. Σωτηράκης',280,'el',0,0,'Alexander V. Sotrakis','2017-08-14','2017-10-27 19:16:05'),('EROJDgAAQBAJ','Η δίψα','Ο Χάρι Χόλε επιστρέφει με την ενδέκατη περιπέτειά του! <br>Η δίψα αποτελεί τη συνέχεια του μπεστ σέλερ Η αστυνομία (του δέκατου βιβλίου στη σειρά Χάρι Χόλε), στο οποίο ο βετεράνος επιθεωρητής παλεύει να προστατέψει τους συναδέλφους του από έναν δολοφόνο που επιζητά εκδίκηση από την αστυνομία. Στη Δίψα ο Χάρι θα ξαναενταχθεί στις τάξεις της αστυνομίας του Όσλο για να εντοπίσει έναν σίριαλ κίλερ που σκοτώνει χρήστες του κοινωνικού δικτύου γνωριμιών Tinder. Ο τρόπος του και η μέθοδος του δολοφόνου θα οδηγήσουν τον Χάρι στο κυνήγι μιας νέμεσής του από το παρελθόν. <br><br>Πλινκ: Ο ήχος του ταιριάσματος στο Tinder είναι ο τελευταίος που θα ακούσει η Ελίζε Χέρμανσεν πριν πέσει θύμα δολοφονίας μες στο διαμέρισμά της. Το νεκρό κορμί της θα βρεθεί από την αστυνομία σημαδεμένο και στραγγισμένο από το αίμα. <br>Όταν μια ακόμα γυναίκα δολοφονείται, τα αντανακλαστικά του πρώην επιθεωρητή και νυν καθηγητή στην Αστυνομική Ακαδημία Χάρι Χόλε, θρυλικού διώκτη σίριαλ κίλερ, ενεργοποιούνται…<br>Άλλωστε ένας επαναλαμβανόμενος εφιάλτης στοιχειώνει τον ύπνο του, φωνές κατακλύζουν κάθε τόσο το μυαλό του: υπάρχει ένας δολοφόνος που ο Χάρι δεν κατάφερε να συλλάβει. Μήπως ήρθε η ώρα να αναμετρηθούν ξανά;<br><br>«Σιωπηλές κραυγές φούντωναν μες στο κεφάλι του, κατέκλυζαν το δωμάτιο και το κορμί του. Κραυγές που ήθελαν να δραπετεύσουν, που έπρεπε να δραπετεύσουν. Μήπως αποτρελαινόταν; Σήκωσε το βλέμμα προς το τζάμι του παραθύρου. Το μόνο πράγμα που φαινόταν στο σκοτάδι ήταν η αντανάκλασή του. Ήταν εκείνος. Εκεί έξω ήταν εκείνος. Τους περίμενε. Τραγουδώντας. Βγείτε να παίξουμε!<br>Ο Χάρι έκλεισε τα μάτια του.<br>Όχι, δεν τους περίμενε. Τον περίμενε. Περίμενε τον Χάρι. Βγες να παίξουμε!»','http://books.google.com/books/content?id=EROJDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE71BZpE2kS8Q_HgIug7rWmEcyfUamHVh3DM5Tj5lXkt','Jo Nesbo',513,'el',0,0,'Metaichmio Publications','2017-03-28','2017-10-30 21:48:07'),('FnHENKWLTmcC','Country quilting','Provides instructions and patterns for making quilts and quilted table runners, sewing machine covers, wall hangings, place mats, and pillows','http://books.google.com/books/content?id=FnHENKWLTmcC&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE71gMNc3GS7EGttYTRMAA2k1vlFJqGNySMe7-UH_SNgOeTM1c1W4w','Better Homes and Gardens',80,'en',0,0,'Meredith Press','1992-04','2017-10-24 21:24:28'),('j5jFmAEACAAJ','Wireless Communication Systems',NULL,NULL,'Rajeshwar Das',200,'en',0,0,'I.K. International Publishing House Pvt. Limited','2012-11-01','2017-10-26 18:00:21'),('JCp-yVMib6IC','The Bat','<p><b>20th anniversary edition of the first book in the internationally bestselling Harry Hole series</b></p><p>Includes the opening of the brand new Harry Hole thriller, <i>The Thirst</i>, and an exclusive new introduction by Jo Nesbo</p><br><p>HARRY IS OUT OF HIS DEPTH</p><p>Detective Harry Hole is meant to keep out of trouble. A young Norwegian girl taking a gap year in Sydney has been murdered, and Harry has been sent to Australia to assist in any way he can. </p><p>HE\'S NOT SUPPOSED TO GET TOO INVOLVED...</p><p>When the team unearths a string of unsolved murders and disappearances, nothing will stop Harry from finding out the truth. The hunt for a serial killer is on, but the murderer will talk only to Harry. </p><p>...BUT HE MIGHT JUST BE THE NEXT VICTIM</p>','http://books.google.com/books/content?id=JCp-yVMib6IC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE71GR1_l5D5RCYrBzKXc4f-ymqilXlaknCsARRt6N0P','Jo Nesbo',448,'en',3.5,74,'Random House','2012-10-11','2017-10-30 21:50:13'),('s1gVAAAAYAAJ','Pride and Prejudice','Austen’s most celebrated novel tells the story of Elizabeth Bennet, a bright, lively young woman with four sisters, and a mother determined to marry them to wealthy men. At a party near the Bennets’ home in the English countryside, Elizabeth meets the wealthy, proud Fitzwilliam Darcy. Elizabeth initially finds Darcy haughty and intolerable, but circumstances continue to unite the pair','http://books.google.com/books/content?id=s1gVAAAAYAAJ&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE736dxy7JQ4WSc6X7jBpppHRjZvM8NEeZtaZdgMN2OFV6vTOpwBFe','Jane Austen',401,NULL,4,2256,NULL,NULL,'2017-10-24 19:44:24');

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

insert  into `users_rel_books`(`user_id`,`book_id`,`case`,`created_at`) values (1,'s1gVAAAAYAAJ','read','2017-10-24 19:58:12'),(1,'a_wwDwAAQBAJ','rent','2017-10-27 19:19:30'),(1,'EROJDgAAQBAJ','read','2017-10-30 21:48:07'),(1,'EROJDgAAQBAJ','want','2017-10-30 21:48:28'),(1,'EROJDgAAQBAJ','rent','2017-10-30 21:48:40'),(1,'JCp-yVMib6IC','want','2017-10-30 21:50:13'),(1,'JCp-yVMib6IC','rent','2017-10-30 21:51:06'),(1,'AnXDLk5S5P8C','read','2017-10-30 22:14:50');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
