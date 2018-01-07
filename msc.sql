-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2018 at 05:57 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msc`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `thumbnail`, `author`, `pages`, `language`, `rate`, `rates_count`, `publisher`, `published_date`, `created_at`) VALUES
('-8DhHgAACAAJ', 'Psēphiaka diktya, gnōsē kai dēmosia politikē', NULL, NULL, 'Persephonē Zerē', 391, 'el', 0, 0, 'I. Siderēs', '2006', '2017-10-26 15:06:06'),
('0KiO_W_3w24C', 'Ασύρματα Δίκτυα Υπολογιστών Ασφάλεια και Απόδοση των Πρωτοκόλλων TCP/IP', NULL, 'http://books.google.com/books/content?id=0KiO_W_3w24C&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE713J5sjqQTbhB1di3U21Xs3XgnoWt0kSbsMpKPClRD', NULL, 540, 'el', 0, 0, 'Nikolaos Preve', NULL, '2017-10-26 15:05:22'),
('1q2-Wvd2eX0C', 'DAF Trucks Since 1949', 'This book chronicles the fascinating first 80 years of DAF’s history, from being a small Dutch trailer manufacturer through to its acquisition by US truck giant Paccar, and the development of the company to its present position as the top-selling truck in the UK and a major global brand. Buses, cars and army trucks are also covered, as well as details of how DAF has worked with various other truck makers, such as Leyland, International Harvester, Renault, RABA and GINAF, making the book essential reading for truck enthusiasts everywhere.', 'https://books.google.com/books/content?id=1q2-Wvd2eX0C&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE70sD1B1mWfDXZF-DfETeoy-q94MJ__6PNAi5py-h8JfB7Qyu2SI0tGC26g98C4x9NRPkoznflRo5mUjA90ysKHw3YOGtOkwkcO09Jf3waUmY9NaY4MchkA7pBe0V5eDZgflxd-9&source=gbs_api', 'Colin Peck', 128, 'en', 0, 0, 'Veloce Publishing Ltd', '2010-07-15', '2017-12-11 22:32:29'),
('7GsK_v8H_qcC', 'Growth Hormone And The Heart', 'Growth Hormone and the Heart endeavors to bring together knowledge that has been accumulated in the area of GH and the heart, from basic to clinical studies, by research groups working on this topic throughout the world. Lessons from different experimental models and from several human diseases (acromegaly, adult GH deficiency, heart failure) suggest to endocrinologists and cardiologists that GH may not only have a role in the physiology and pathophysiology of heart function, but that GH itself may have a place in the treatment of primary heart diseases (such as dilated cardiomyopathy) or of cardiac complications of hypopituitarism.<br> Growth Hormone and the Heart will be a useful update of the research produced in the field of cardiovascular endocrinology. The Editors also hope that this book will serve as the primary step in the recognition of the wide physiological and clinical significance of GH and heart interactions.', 'https://books.google.com/books/content?id=7GsK_v8H_qcC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE71n7SRUvOaFP7jrgC5ZFL4ak9K2F-_H5Jo0qC-0WKUoIorNvEfBNjKBItkjy8hdPhAN9R0CCqvyln9Eq3EAcPXdNlnAtgk3DIpNL_lDMj9ExT64i1TlTWKLG9SuUQMNPasodZw0&source=gbs_api', 'Andrea Giustina', 216, 'en', 5, 1, 'Springer Science & Business Media', '2000-11-30', '2017-11-27 22:06:26'),
('9TVuAAAAMAAJ', 'NM, in His Own Words, As Seen by Others', 'Commemorative volume on Nanayakkarapathirage Martin Perera, 1905-1979, former finance minister of Sri Lanka and founder member of the Lanka Sama Samaja Party; includes part of his autobiography, a selection of his speeches and writings, and articles on his life and works by various authors.', 'https://books.google.com/books/content?id=9TVuAAAAMAAJ&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE71sSHZR8GJfTtFBTMBxLIqQxgQrbxzNr5gefGAqlbx3xHJX7SqZNg5DZ_Dg2r9KAB-mLBuKhMocUn4H4WjRSJVeYRdm7APMMKjtIuN9ShFm-OdJg2A&source=gbs_api', 'Colvin Goonaratna', 480, 'en', 0, 0, 'Dr. N.M. Perera Centre', '2006-01-01', '2017-11-27 22:21:36'),
('AnXDLk5S5P8C', 'Lily Daw and the Three Ladies', '\"Lily Daw is young, pretty, perhaps more than a little peculiar, and in love! However, the well-meaning ladies of the Helping Hand Society are determined to see Lily off to the State Home for the Feeble-Minded. They just don\'t believe her when she says she\'s planning to be married this very day. The ladies certainly do have grounds for concern. Lily has always had an odd imagination, and the man she\'s describing now is a \'show fellow.\' One thing is clear to the ladies, the faster they can get Lily committed, the better. They urgently try to get her consent. As they\'re winning her over, a \'show fellow\' appears and actually wants to marry Lily.\"--From publisher\'s website.', 'http://books.google.com/books/content?id=AnXDLk5S5P8C&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE72eFS0bdpr04C0_cP6XUXgg6eUXZlHAvbkwuXRLsmO', 'Ruth Perry, Eudora Welty', 39, 'en', 0, 0, 'Dramatic Publishing', '1972', '2017-10-30 20:14:50'),
('a_wwDwAAQBAJ', 'Perfect Ten', '<p> Μια αμερικανίδα συντάκτρια μόδας, ένας λονδρέζος αρχιτέκτονας, ένας υιός γερουσιαστή, μια κληρονόμος οίκου μόδας και ένας ατίθασος προγραμματιστής ξεκινούν ένα ιδιαίτερο ταξίδι που θα τους αλλάξει την ζωή. Στο Bürgenstock της Ελβετίας, όπου χρόνια πριν είχε συνεδριάσει η περίφημη λέσχη <b>Μπίλντερμπεργκ</b>, σε μία απομακρυσμένη πλαγιά πάνω από την λίμνη Λουκέρνη βρίσκεται καλά κρυμμένη μια πολυτελής κλινική. Σε αυτές τις υπερσύγχρονες εγκαταστάσεις εκτυλίσσεται εδώ και δεκαετίες, μια παγκόσμια συνωμοσία των μεγαλύτερων εμπορικών κολοσσών η οποία για χρόνια επηρεάζει  όλο τον σύγχρονο τρόπο ζωής. </p> <p>Η έμφυτη ανάγκη του ανθρώπου να ξεχωρίσει στο κοινωνικό του σύνολο και να αναδειχθεί κοινωνικά γίνεται αντικείμενο εκμετάλλευσης στα χέρια των λίγων και εκλεκτών. Τα αποτελέσματα, απλά βρίσκονται γύρω μας χωρίς να το ξέρουμε. </p> <p> Ένα πρωτότυπο συνωμοσιολογικό μυθιστόρημα  θρίλερ, γραμμένο με κινηματογραφικό τρόπο γεμάτο δράση και ανατροπές αλλά και  βαθιές κοινωνικές προεκτάσεις. Στόχος του συγγραφέα  είναι να μας προκαλέσει το ερώτημα,                 </p><p><b>   ¨<i>και αν είναι όντως έτσι;</i> ¨</b></p>', 'http://books.google.com/books/content?id=a_wwDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE73OVTO6msbIQrCL55vQsM4igo_EHMgRxehrqRGFh4S', 'Αλέξανδρος Β. Σωτηράκης', 280, 'el', 0, 0, 'Alexander V. Sotrakis', '2017-08-14', '2017-10-27 16:16:05'),
('EROJDgAAQBAJ', 'Η δίψα', 'Ο Χάρι Χόλε επιστρέφει με την ενδέκατη περιπέτειά του! <br>Η δίψα αποτελεί τη συνέχεια του μπεστ σέλερ Η αστυνομία (του δέκατου βιβλίου στη σειρά Χάρι Χόλε), στο οποίο ο βετεράνος επιθεωρητής παλεύει να προστατέψει τους συναδέλφους του από έναν δολοφόνο που επιζητά εκδίκηση από την αστυνομία. Στη Δίψα ο Χάρι θα ξαναενταχθεί στις τάξεις της αστυνομίας του Όσλο για να εντοπίσει έναν σίριαλ κίλερ που σκοτώνει χρήστες του κοινωνικού δικτύου γνωριμιών Tinder. Ο τρόπος του και η μέθοδος του δολοφόνου θα οδηγήσουν τον Χάρι στο κυνήγι μιας νέμεσής του από το παρελθόν. <br><br>Πλινκ: Ο ήχος του ταιριάσματος στο Tinder είναι ο τελευταίος που θα ακούσει η Ελίζε Χέρμανσεν πριν πέσει θύμα δολοφονίας μες στο διαμέρισμά της. Το νεκρό κορμί της θα βρεθεί από την αστυνομία σημαδεμένο και στραγγισμένο από το αίμα. <br>Όταν μια ακόμα γυναίκα δολοφονείται, τα αντανακλαστικά του πρώην επιθεωρητή και νυν καθηγητή στην Αστυνομική Ακαδημία Χάρι Χόλε, θρυλικού διώκτη σίριαλ κίλερ, ενεργοποιούνται…<br>Άλλωστε ένας επαναλαμβανόμενος εφιάλτης στοιχειώνει τον ύπνο του, φωνές κατακλύζουν κάθε τόσο το μυαλό του: υπάρχει ένας δολοφόνος που ο Χάρι δεν κατάφερε να συλλάβει. Μήπως ήρθε η ώρα να αναμετρηθούν ξανά;<br><br>«Σιωπηλές κραυγές φούντωναν μες στο κεφάλι του, κατέκλυζαν το δωμάτιο και το κορμί του. Κραυγές που ήθελαν να δραπετεύσουν, που έπρεπε να δραπετεύσουν. Μήπως αποτρελαινόταν; Σήκωσε το βλέμμα προς το τζάμι του παραθύρου. Το μόνο πράγμα που φαινόταν στο σκοτάδι ήταν η αντανάκλασή του. Ήταν εκείνος. Εκεί έξω ήταν εκείνος. Τους περίμενε. Τραγουδώντας. Βγείτε να παίξουμε!<br>Ο Χάρι έκλεισε τα μάτια του.<br>Όχι, δεν τους περίμενε. Τον περίμενε. Περίμενε τον Χάρι. Βγες να παίξουμε!»', 'http://books.google.com/books/content?id=EROJDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE71BZpE2kS8Q_HgIug7rWmEcyfUamHVh3DM5Tj5lXkt', 'Jo Nesbo', 513, 'el', 0, 0, 'Metaichmio Publications', '2017-03-28', '2017-10-30 19:48:07'),
('FnHENKWLTmcC', 'Country quilting', 'Provides instructions and patterns for making quilts and quilted table runners, sewing machine covers, wall hangings, place mats, and pillows', 'http://books.google.com/books/content?id=FnHENKWLTmcC&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE71gMNc3GS7EGttYTRMAA2k1vlFJqGNySMe7-UH_SNgOeTM1c1W4w', 'Better Homes and Gardens', 80, 'en', 0, 0, 'Meredith Press', '1992-04', '2017-10-24 18:24:28'),
('FWmbHHL4BwsC', 'Growth Hormone Related Diseases and Therapy', '<p>The molecular era ushered in the cloning of the growth hormone (GH) gene and the production of unlimited amounts of GH through recombinant technology. The continuing momentum of research from basic science to clinical evaluation has brought unprecedented advances to the understanding of GH biology for the clinical endocrinologist. Growth Hormone Related Diseases and Therapy: A Molecular and Physiological Perspective for the Clinician distills all the new information of relevance to the endocrinologist over the last 20 years by offering five sections: physiology, molecular genetics, GH deficiency, acromegaly and pharmacotherapy. The first section on physiology focuses on GH action.</p><p> </p><p>A review on the structure and function of the GH receptor is followed by a perspective on the regulatory role of ghrelin on GH secretion. The second section on genetics covers pituitary function and adenomas, including new and fascinating information on familial pituitary adenomas, their genotype and phenotype. The adult GH deficiency section spans the epidemiology and diagnosis of GH deficiency with a strong reminder for the clinician that the transition period represents a critical time of somatic maturation, which continues for years after cessation of liner growth. The section on acromegaly focuses on management, giving practical guides to the value of GH and IGF-1 measurements, the place of somatostatin analogues and of radiotherapy while reminding the reader as to why evaluating quality of life is an important part of management. Finally, the section on GH pharmacology takes the reader through innovative developments of long-acting GH formulations with some products on the threshold of clinical use. This section provides a balanced evidence based review of the effects of GH supplementation in aging and in sports where recent data indicates an enhancing effect on a selective aspect of performance. Growth Hormone Related Diseases and Therapy: A Molecular and Physiological Perspective for the Clinician integrates a wealth of information and will prove an invaluable reference for pediatric endocrinologists, adult endocrinologists, endocrine scientists and internists interested in the human biology of GH.</p>', 'https://books.google.com/books/content?id=FWmbHHL4BwsC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE734Q1_G6vezFc6T5kQC4Zt3VzXw5Zxk0RbdwxbxIRM0XD37us5JTWafnDbDvgh_OQY4wDaBTI0b1Ut-D971SGhsinwaeevRHiEEq64a2-8aPeWflMvsr0rRVxGyHUZQ2UPVwXub&source=gbs_api', 'Ken Ho', 414, 'en', 0, 0, 'Springer Science & Business Media', '2011-08-12', '2017-11-27 22:06:20'),
('GJgbW9c9mpwC', 'J.K. Rowling', '<p>The unprecedented popularity of the Harry Potter books took the publishing world by storm and captured the imaginations of readers around the world. This unofficial biographical study of J. K. Rowling invites fans and critics alike to take a close look at the person behind the phenomenon, the facts of her life as a writer, and the extraordinary success of an ordinary woman. DEGREESL This detailed book explores both the critical acclaim and the controversies surrounding Rowling\'s books and the characters, who seem to have found a life of their own. Chapters take the reader from Rowling\'s early childhood in England through her school years, friendships, and early influences, tracing her family life, her travels and personal relationships, and the development of her career as a writer.</p><p></p><p>The Harry Potter books are carefully considered against the backdrop of the fantasy genre and are also situated within the broader framework of popular culture. A bibliography provides reviews, critical articles, biographical sources, and related Web site information. A timeline highlights the events of Rowling\'s life and career. Other appendices cite the many awards her books have received around the world. Also included are lists of her special literary and humanitarian interests.</p>', 'https://books.google.com/books/content?id=GJgbW9c9mpwC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE70AxMImkHImj3os2C1v7fbVU7rKK5-_Nyj_hlRtoWgo_l9-4EGrW43ZnrPCwukpFtvXrRC84_Wzd6x9kyAZyqac76MjeVHYmhLATc-8x0SkJYbdWRaUwaLgoOtCQAJAkljvQTt7&source=gbs_api', 'Connie Ann Kirk', 141, 'en', 4, 6, 'Greenwood Publishing Group', '2003', '2017-11-27 22:11:48'),
('j5jFmAEACAAJ', 'Wireless Communication Systems', NULL, NULL, 'Rajeshwar Das', 200, 'en', 0, 0, 'I.K. International Publishing House Pvt. Limited', '2012-11-01', '2017-10-26 15:00:21'),
('JCp-yVMib6IC', 'The Bat', '<p><b>20th anniversary edition of the first book in the internationally bestselling Harry Hole series</b></p><p>Includes the opening of the brand new Harry Hole thriller, <i>The Thirst</i>, and an exclusive new introduction by Jo Nesbo</p><br><p>HARRY IS OUT OF HIS DEPTH</p><p>Detective Harry Hole is meant to keep out of trouble. A young Norwegian girl taking a gap year in Sydney has been murdered, and Harry has been sent to Australia to assist in any way he can. </p><p>HE\'S NOT SUPPOSED TO GET TOO INVOLVED...</p><p>When the team unearths a string of unsolved murders and disappearances, nothing will stop Harry from finding out the truth. The hunt for a serial killer is on, but the murderer will talk only to Harry. </p><p>...BUT HE MIGHT JUST BE THE NEXT VICTIM</p>', 'http://books.google.com/books/content?id=JCp-yVMib6IC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE71GR1_l5D5RCYrBzKXc4f-ymqilXlaknCsARRt6N0P', 'Jo Nesbo', 448, 'en', 3.5, 74, 'Random House', '2012-10-11', '2017-10-30 19:50:13'),
('kqPhohQqARkC', 'The Gospel According to Dan Brown', 'The authors respectfully interpret all of Brown\'s fiction (Digital Fortress, Deception Point, Angels and Demons and The Da Vinci Code) and distill their common message.', 'https://books.google.com/books/content?id=kqPhohQqARkC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE701wvwQ0apkS_XK2dth1kgPr6DchnTkdE6IIxwfvkIYXliE0q0QvohjddC2kgyU_t5OIDENTanct51v5XaxFUln1ziZjJWt_H1TeUcGqqLXT2oZc6ZuGuy4_4EJyGNsVr7rnu5u&source=gbs_api', 'Jeff Dunn, Craig Bubeck', 237, 'en', 0, 0, 'David C Cook', '2006', '2017-11-26 11:30:05'),
('NOg03GhaZioC', 'Communication', 'Do you know how to listen to your spouse? How can you \"give life\" to your marriage with your words? Dan B. Allender and Tremper Longman III have together written this inductive Bible study guide to help couples build healthy and happy marriages. Through six study sessions for individuals, couples or groups, they help you explore differences that might hinder communication and learn strategies that can strengthen your marriage. Intimate Marriage Bible studies bring spouses into deeper communion with God and with each other. In marriage a man and a woman are called to leave their families of origin, to weave their individual lives into a unity and to cleave to each other. How can fallen human beings even begin to contemplate this ideal--God\'s ideal? These studies will help you take small but real steps toward honoring the image of God in each other and living out God\'s goal for marriage. As you explore and respond to Scripture together, you will discover strength and beauty in your marriage and become even more intimate companions.', 'https://books.google.com/books/content?id=NOg03GhaZioC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE714CfFGb9p2c88TQ4vMywrPpfGAgXZqfEi6kv_oHltSvbXUiY97MvLnPvEonTKoY8Ih7JDBiWcSObNCIRVtNfnDWdJmF6UDU2OinFc_GSbNXRd0TE6zixdXvbQ4wZgu5b4ynEM_&source=gbs_api', 'Dan B. Allender, Tremper Longman III', 65, 'en', 0, 0, 'InterVarsity Press', '2010-08-22', '2017-11-27 22:00:03'),
('Pz4YDQAAQBAJ', 'Origin', '<b>The #1 <i>New York Times</i> Bestseller from the author of The Da Vinci Code</b><br> <br> <b><i>Bilbao, Spain</i></b><br>  <br> Robert Langdon, Harvard professor of symbology and religious iconology, arrives at the ultramodern Guggenheim Museum Bilbao to attend a major announcement—the unveiling of a discovery that “will change the face of science forever.” The evening’s host is Edmond Kirsch, a forty-year-old billionaire and futurist whose dazzling high-tech inventions and audacious predictions have made him a renowned global figure. Kirsch, who was one of Langdon’s first students at Harvard two decades earlier, is about to reveal an astonishing breakthrough . . . one that will answer two of the fundamental questions of human existence.<br>     As the event begins, Langdon and several hundred guests find themselves captivated by an utterly original presentation, which Langdon realizes will be far more controversial than he ever imagined. But the meticulously orchestrated evening suddenly erupts into chaos, and Kirsch’s precious discovery teeters on the brink of being lost forever. Reeling and facing an imminent threat, Langdon is forced into a desperate bid to escape Bilbao. With him is Ambra Vidal, the elegant museum director who worked with Kirsch to stage the provocative event. Together they flee to Barcelona on a perilous quest to locate a cryptic password that will unlock Kirsch’s secret.<br>     Navigating the dark corridors of hidden history and extreme religion, Langdon and Vidal must evade a tormented enemy whose all-knowing power seems to emanate from Spain’s Royal Palace itself . . . and who will stop at nothing to silence Edmond Kirsch. On a trail marked by modern art and enigmatic symbols, Langdon and Vidal uncover clues that ultimately bring them face-to-face with Kirsch’s shocking discovery . . . and the breathtaking truth that has long eluded us.<br>  <br><i>Origin</i> is stunningly inventive—Dan Brown\'s most brilliant and entertaining novel to date.', 'http://books.google.com/books/content?id=Pz4YDQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE70LEtvE1bat-C1b6m5dS4NYnlVNoljX1E0UwPoyZFe4jKzxaWr3EnlpvHD1vW8b8ser6dzUzDe77G5rNOhsRbKaIPgPz6khYLb-QPHBJ8cMxvRyEM55YKYFg4q7XjzYTRJxK3TR&source=gbs_api', 'Dan Brown', 480, 'en', 0, 0, 'Knopf Doubleday Publishing Group', '2017-10-03', '2017-11-11 11:32:06'),
('RqxC94F-_loC', 'Dan Brown: The Unauthorized Biography', '<p>The Revealing Story of Dan Brown, the Man Who Outsold the Bible </p><p><i>The Da Vinci Code </i>made Dan Brown one of the most popular authors in history. Yet he\'s also one of the most secretive, rarely granting interviews or making public appearances.</p><p>In this illuminating biography, Lisa Rogak uncovers the life of the high school English teacher and singer/songwriter who became one of the world\'s bestselling writers. She recounts his bumpy road to publishing success and the legal battle that he fought and won. And she sheds light on the writing process--- and Brown\'s fascination with puzzles and codes--- that has brought us <i>Digital Fortress, Deception Point, Angels & Demons, The Da Vinci Code, The Lost Symbol,</i> and <i>Inferno</i>.</p><p>For the first time in paperback, this revised-and-updated biography offers fans a chance to learn more about the author whose novels have captivated millions of readers.</p>', 'https://books.google.com/books/content?id=RqxC94F-_loC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE71-sBru8BfdaJXEY9dAphyweT9XPl6WwSL_LyBTaID9h24p65-sz4U-ZZN8mt_OQAcHVCykz5ON4IvMZc44IvklN5-O3Hwq2giLFwuBcFs6uQbzyvZD--aYi6WtWkJP8VxlRLL8&source=gbs_api', 'Lisa Rogak', 192, 'en', 0, 0, 'St. Martin\'s Press', '2013-05-07', '2017-11-19 08:20:48'),
('RwqlDgAAQBAJ', 'The Routledge Dictionary of Pronunciation for Current English', '<p>The Routledge Dictionary of Pronunciation for Current English is the most up-to-date record of the pronunciation of British and American English. Based on research by a joint UK and US team of linguistics experts, this is a unique survey of how English is really spoken in the twenty-first century. This second edition has been fully revised to include:</p> <ul> <p> <li>a full reappraisal of the pronunciation models for modern British and American English;</li> <p></p> <p> <li>2,000 new entries, including new words from the last decade, encyclopedic terms and proper names;</li> <p></p> <p> <li>separate IPA transcriptions for British and American English for over 100,000 words;</li> <p></p> <p> <li>information on grammatical variants including plurals, comparative and superlative adjectives, and verb tenses.</li> <p></p></ul> <p></p> <p>The most comprehensive dictionary of its type available, The Routledge Dictionary of Pronunciation for Current English is the essential reference for those interested in English pronunciation.</p>', 'https://books.google.com/books/content?id=RwqlDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE71esLcYoo9LTOj0vff8ANCnt5W4wWNU_e1vk6yESKvxpGxJ2NPZNt2RASX9ZE5f-ZA1IO6ao-90XBvaw1fb8YnQ2jLRW7wEmkaCX6XWoJhOPgxOM_Ds50WRqoDeaafJafC8NBy1&source=gbs_api', 'Clive Upton, William A. Kretzschmar, Jr.', 1590, 'en', 0, 0, 'Routledge', '2017-04-11', '2017-11-26 11:49:28'),
('s1gVAAAAYAAJ', 'Pride and Prejudice', 'Austen’s most celebrated novel tells the story of Elizabeth Bennet, a bright, lively young woman with four sisters, and a mother determined to marry them to wealthy men. At a party near the Bennets’ home in the English countryside, Elizabeth meets the wealthy, proud Fitzwilliam Darcy. Elizabeth initially finds Darcy haughty and intolerable, but circumstances continue to unite the pair', 'http://books.google.com/books/content?id=s1gVAAAAYAAJ&printsec=frontcover&img=1&zoom=1&imgtk=AFLRE736dxy7JQ4WSc6X7jBpppHRjZvM8NEeZtaZdgMN2OFV6vTOpwBFe', 'Jane Austen', 401, NULL, 4, 2256, NULL, NULL, '2017-10-24 16:44:24'),
('zMIDAAAAQAAJ', 'Plutarchi Vitae, curavit G.H. Schæfer', NULL, 'https://books.google.com/books/content?id=zMIDAAAAQAAJ&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE73B7Mu7zsdEKIu2p4n9jcRmWC5lhCeNlPy9U7--jFBGXStO8HO76swh5_zMvjPs1wsqX15Ho7C6OkKLbeGzNzoLpVRuXHdMPrYHfZLRm9UKIuBTG0BEtrUkNSyKsZ8dTkWHed9W&source=gbs_api', 'Plutarchus', 976, 'el', 0, 0, NULL, '1825', '2017-11-27 22:06:23'),
('ZY6Xn4DmuCoC', 'Dark Tourism', 'This book sets out to explore \'dark tourism\'; that is, the representation of inhuman acts, and how these are interpreted for visitors at a number of places throughout the world, for example the sites of concentration camps in both Western and Eastern Europe. Many people wish to experience the reality behind the media images, or are prompted to find out more by a personal association with places or events. The phenomenon raises ethical issues over the status and nature of objects, the extent of their interpretation, the appropriate political and managerial response and the nature of the experience as perceived by the visitor, their residents and local residents. Events, sites, types of visit and \'host\' reactions are considered in order to construct the parameters of the concept of \'dark tourism\'. Many acts of inhumanity are celebrated as heritage sites in Britain (for example, the Tower of London, Edinburgh Castle), and the Berlin Wall has become a significant attraction despite claiming many victims.', 'https://books.google.com/books/content?id=ZY6Xn4DmuCoC&printsec=frontcover&img=1&zoom=1&edge=curl&imgtk=AFLRE72DwJ1d8TeZ4rdOJXfmqzvLg4r0e9Pp0BAYlNKedfjz9iEPVNkIYG1lCRQbKWSEwZNYpy8rCJ8tYnbQMg4GNQtep2kqSMGDK1BZKyZfblrmuwho7X4NUTzMhWhwW09g-PY1HkXS&source=gbs_api', 'J. John Lennon, Malcolm Foley', 184, 'en', 5, 1, 'Cengage Learning EMEA', '2000', '2018-01-07 16:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `metrics`
--

CREATE TABLE `metrics` (
  `id` int(11) NOT NULL,
  `action` text NOT NULL,
  `timestamp` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `metrics`
--

INSERT INTO `metrics` (`id`, `action`, `timestamp`, `userId`) VALUES
(18, 'searchBookAction', '2018-01-07 00:00:00', 6114655),
(19, 'searchBookAction', '2018-01-07 00:00:00', 6114655),
(20, 'searchBookAction', '2018-01-07 16:56:58', 6114655);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `country` varchar(20) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `country`, `city`, `address`, `created_at`) VALUES
(1, 'Vaggelis', 'Kotrotsios', 'vako88@gmail.com', '010300ed4af61c9b98a0ce35f9284df91110a73c', 'Greece', 'Thessaloniki', 'Zaloggou 6', '2017-10-24 16:42:54'),
(13, 'Giannis', 'Kostopoulos', 'kostopoulos@gmail.comm', '010300ed4af61c9b98a0ce35f9284df91110a73c', NULL, NULL, NULL, '2017-10-24 16:42:54'),
(14, 'Giannis', 'Kostopoulos', 'vako88frfr@gmail.com', '010300ed4af61c9b98a0ce35f9284df91110a73c', NULL, NULL, NULL, '2017-10-24 16:42:54'),
(15, 'nikos', 'lazogas', 'vako881@gmail.com', '010300ed4af61c9b98a0ce35f9284df91110a73c', NULL, NULL, NULL, '2017-10-24 16:42:54'),
(16, 'giannis', 'lazogas', 'vako8fewfwe8@gmail.com', '010300ed4af61c9b98a0ce35f9284df91110a73c', NULL, NULL, NULL, '2017-10-24 16:42:54'),
(17, 'eleftheria', 'lazogas', 'vako8frefr8@gmail.com', '010300ed4af61c9b98a0ce35f9284df91110a73c', NULL, NULL, NULL, '2017-10-24 16:42:54'),
(18, 'alekos', 'lazogas', 'alekos@books.com', '010300ed4af61c9b98a0ce35f9284df91110a73c', NULL, NULL, NULL, '2017-10-24 19:08:44'),
(19, 'Vangelis', 'Kostopoulos', 'vaggos_kostopoulos@yahoo.gr', 'f193f4dd355a06cedce409eacd81c7463165c586', 'GR', '6', 'Zaloggou 6', '2017-11-27 19:50:00'),
(20, 'kjhkj', 'kjhjk', 'va@dssd.gr', '010300ed4af61c9b98a0ce35f9284df91110a73c', 'GR', '1', 'dsklvjdk', '2018-01-07 16:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `users_rel_books`
--

CREATE TABLE `users_rel_books` (
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `book_id` varchar(20) DEFAULT NULL,
  `case` enum('read','want','rent') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_rel_books`
--

INSERT INTO `users_rel_books` (`user_id`, `book_id`, `case`, `created_at`) VALUES
(1, '9TVuAAAAMAAJ', 'read', '2017-11-27 22:21:36'),
(1, 'RqxC94F-_loC', 'rent', '2017-12-11 20:56:32'),
(19, 'RqxC94F-_loC', 'want', '2017-12-11 22:28:57'),
(19, '1q2-Wvd2eX0C', 'rent', '2017-12-11 22:32:29'),
(20, 'ZY6Xn4DmuCoC', 'read', '2018-01-07 16:48:30'),
(20, 'ZY6Xn4DmuCoC', 'rent', '2018-01-07 16:48:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metrics`
--
ALTER TABLE `metrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_rel_books`
--
ALTER TABLE `users_rel_books`
  ADD KEY `user_id_urb_fk` (`user_id`),
  ADD KEY `book_id_urb_fk` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `metrics`
--
ALTER TABLE `metrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_rel_books`
--
ALTER TABLE `users_rel_books`
  ADD CONSTRAINT `book_id_urb_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_urb_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
