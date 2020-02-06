-- MySQL dump 10.13  Distrib 5.5.42-37.1, for Linux (x86_64)
--
-- Host: localhost    Database: chelmyer_statusboard
-- ------------------------------------------------------
-- Server version	5.5.42-37.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `boardDates`
--

DROP TABLE IF EXISTS `boardDates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boardDates` (
  `termID` int(11) NOT NULL,
  `dateName` varchar(200) NOT NULL,
  `dateValue` varchar(200) NOT NULL,
  PRIMARY KEY (`termID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boardDates`
--

LOCK TABLES `boardDates` WRITE;
/*!40000 ALTER TABLE `boardDates` DISABLE KEYS */;
INSERT INTO `boardDates` (`termID`, `dateName`, `dateValue`) VALUES (1,'yearStart','9/22/2014'),(2,'yearEnd','9/5/2015'),(3,'finalStart','6/06/2015'),(4,'termStart','3/30/2015'),(5,'termEnd','6/10/2015');
/*!40000 ALTER TABLE `boardDates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boardInfo`
--

DROP TABLE IF EXISTS `boardInfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boardInfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `calendarLink` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boardInfo`
--

LOCK TABLES `boardInfo` WRITE;
/*!40000 ALTER TABLE `boardInfo` DISABLE KEYS */;
INSERT INTO `boardInfo` (`id`, `calendarLink`) VALUES (1,'');
/*!40000 ALTER TABLE `boardInfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facultyInfo`
--

DROP TABLE IF EXISTS `facultyInfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facultyInfo` (
  `ID` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `office` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `phone` varchar(1000) NOT NULL,
  `officeHours` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultyInfo`
--

LOCK TABLES `facultyInfo` WRITE;
/*!40000 ALTER TABLE `facultyInfo` DISABLE KEYS */;
INSERT INTO `facultyInfo` (`ID`, `name`, `title`, `office`, `email`, `phone`, `officeHours`, `image`) VALUES (1,'Ted Artz','Associate Professor, DIGM','URBN 230F','taa28@drexel.edu','215-895-1663','','ted-artz.png'),(2,'Jeremy Fernsler','Assoc. Prog. Dir., GMAP','URBN 230B','jeremy.fernsler@drexel.edu','215-895-2554','','jeremy-fernsler.png'),(3,'Frank Lee','Associate Professor, GMAP','ExCiTe Center','frank.j.lee@drexel.edu','215-895-4953','','frank-lee.png'),(4,'Stefan Rank','Assistant Professor, GMAP','URBN 220H','stefan.rank@drexel.edu','215-571-4429','','stefan.png'),(5,'Daphney Wright','Admin. Assistant, DIGM','URBN 220A','dbw37@drexel.edu','215-895-2554','','daphney.jpg'),(6,'John Berton','Assistant Professor, ANIM','URBN 220D','jabertonjr@drexel.edu','215-895-5901','','john-berton.png'),(7,'Troy Finamore','Program Director, IDM','URBN 230C','twf23@drexel.edu','215-895-2012','','troy.png'),(8,'Dave Mauriello','Assistant Professor, ANIM','URBN 230E','david.a.mauriello@drexel.edu','215-895-2554','','dave.png'),(9,'Jervis Thompson','Teaching Professor, IDM','URBN 230A','jervis.walter.thompson@drexel.edu','215-895-5937','','jervis.png'),(10,'Jichen Zhu','Assistant Professor, GMAP','URBN 220H','jichen.zhu@drexel.edu','215-571-4220','','jichen.png'),(11,'Paul Diefenbach','Associate Professor, GMAP','URBN 220F','pjdief@drexel.edu','215-895-1618','','paul.png'),(12,'Nick Jushchyshyn','Program Director, ANIM','URBN 230D','nickj@drexel.edu','215-895-2401','','nick-j.png'),(13,'Glen Muschio','Associate Professor','URBN 220E','glen.j.muschio@drexel.edu','215-895-2056','','glen.png'),(14,'Michael Wagner','Department Head','URBN 220C','michael.g.wagner@drexel.edu','215-895-2554','','wagner.png'),(15,'Robert Lloyd','Visiting Teaching Professor','URBN 220D','robert.e.lloyd@drexel.edu','215-571-4434','','lloyd.jpg');
/*!40000 ALTER TABLE `facultyInfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `quoteText` text NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes`
--

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT INTO `quotes` (`ID`, `quoteText`, `author`) VALUES (1,'Always be rendering. Render early, render often. Why aren\'t you rendering?','Jeremy Fernsler'),(3,'Complicate things at the start to make them simpler for you at the end.','Jeremy Fernsler'),(4,'The best way to predict the future is to invent it!','Alan Kay'),(5,'Any sufficiently advanced technology is indistinguishable from magic.','Arthur C. Clarke'),(6,'One eye sees, the other feels.','Paul Klee'),(7,'Every artist was first an amateur.','Ralph Waldo Emerson'),(9,'I wouldn&#039;t have seen it if I hadn&#039;t believed it.','Marshal McLuhan'),(10,'There is nothing worse than a sharp image of a fuzzy concept.','Ansel Adams'),(11,'Don&#039;t you have work to do?','Dave Mauriello'),(12,'If I could spell...I would be dangerous.','Jervis Thompson'),(13,'Geek hard...Geek often.','Jervis Thompson'),(14,'Don&#039;t stop when you&#039;re tired, stop when you&#039;re done.','Phil Sinatra'),(15,'What does the player know?  What does the player see?  What does the player do?','Paul Diefenbach'),(18,'It&#039;s not a challenge of technology. It&#039;s a challenge of imagination.','Josh Clark'),(20,'When you design for meaning, good things will happen.','Doug Dietz'),(22,'If I had asked my customers what they wanted, they would have said a faster horse.','Henry Ford'),(25,'Innovation is not about creating something that has never existed. It is about adding value where it did not previously exist.','Jared Spool'),(26,'An idea is the feat of association.','Robert Frost'),(27,'When inspiration does not come to me, I go halfwayÂ to meet it.','Sigmund Freud'),(28,'Genius is one percent inspiration and ninety-nine percent perspiration.','Thomas Edison'),(44,'In every design discipline, the artist must first acknowledge\r\ntheir constraints, and then devise a solution.','Andrew Maier'),(30,'If it is not fun, you are wasting your life.','Tom J. Peters'),(31,'It is not where you take things from,Â â€¨it is where you take things to.','Jean Luc Godard'),(32,'People only see what they are prepared to see.','Ralph Waldo Emerson'),(33,'Creativity is allowing yourself to make mistakes. Art is knowing which ones to keep.','Scott Adams'),(34,'Mind are like a parachutes they only function when they are open.','Thomas Dewar'),(45,'Design is about solving problems, but itâ€™s not always going to change your lifeâ€“it can enhance life and simply give pleasure as we','Gemma Curtin');
/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `room` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` (`ID`, `room`) VALUES (4,'202'),(5,'204'),(6,'206'),(7,'239'),(8,'246'),(9,'248'),(10,'250'),(11,'252');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(255) DEFAULT NULL,
  `courseTitle` varchar(255) DEFAULT NULL,
  `building` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `startTime` varchar(255) DEFAULT NULL,
  `endTime` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` (`ID`, `course`, `courseTitle`, `building`, `room`, `startTime`, `endTime`, `day`, `instructor`) VALUES (1,'Course','Course Title','Bldg Code','Room Code','Begin Time','End Time','Day','Instructor'),(2,'ANIM 140 001','Computer Graphics Imagery I','URBN','247','1230','1520','T','Reagan, Ross'),(3,'ANIM 140 002','Computer Graphics Imagery I','URBN','247','1530','1820','T','Pettit, Stephen'),(4,'ANIM 140 003','Computer Graphics Imagery I','URBN','250','1800','2050','M','Crowe, Jeffrey'),(5,'ANIM 140 004','Computer Graphics Imagery I','URBN','247','0900','1150','M','Reagan, Ross'),(6,'ANIM 140 005','Computer Graphics Imagery I','URBN','248','1800','2050','W','Kirk, Jason'),(7,'ANIM 140 006','Computer Graphics Imagery I','URBN','248','1530','1820','R','Suen, Ian'),(8,'ANIM 140 007','Computer Graphics Imagery I','URBN','248','1830','2120','R','Crowe, Jeffrey'),(9,'ANIM 140 008','Computer Graphics Imagery I','URBN','247','1500','1750','W','Suen, Ian'),(10,'ANIM 152 001','Multimedia Timeline Design','URBN','252','0900','1150','M','Martin, Eric'),(11,'ANIM 152 002','Multimedia Timeline Design','URBN','248','1830','2120','T','Whitaker, Francis'),(12,'ANIM 152 003','Multimedia Timeline Design','URBN','250','0930','1220','T','Martin, Eric'),(13,'ANIM 152 004','Multimedia Timeline Design','URBN','250','1830','2120','R','Whitaker, Francis'),(14,'ANIM 212 001','Animation II','URBN','247','1200','1450','W','Jushchyshyn, Nicholas'),(15,'ANIM 212 002','Animation II','URBN','247','1230','1520','R','Mauriello, David'),(16,'ANIM 212 003','Animation II','URBN','248','0900','1150','W','Fernsler, Jeremy'),(17,'ANIM 212 004','Animation II','URBN','247','1830','2120','T','Gross, Kevin'),(18,'ANIM 212 005','Animation II','URBN','250','0930','1220','R','Fernsler, Jeremy'),(19,'ANIM 215 001','History of Animation','UCROSS','030','1230','1520','T','Artz, Theo'),(20,'ANIM 215 002','History of Animation','URBN','ANNEX 110','1230','1520','R','Artz, Theo'),(21,'ANIM 315 001','Character Animation II','URBN','252','1200','1450','W','Mauriello, David'),(22,'ANIM 399 001','Artful Digital 2D-Cel Anim.','','','','','','Artz, Theo'),(23,'ANIM 399 002','Adv. Character Animation','','','','','','Mauriello, David'),(24,'ANIM 399 003','Tech Directing for Animation','','','','','','Berton, John'),(25,'ANIM 410 001','Visual Effects','URBN','247','1200','1450','M','Fernsler, Jeremy'),(26,'ANIM 465 001','ST: Adv Facial ANIM Research','URBN','239','1230','1520','T','Jushchyshyn, Nicholas'),(27,'DIGM 100 001','Digital Design Tools','URBN','250','1500','1750','M','Aspland, Kurt'),(28,'DIGM 100 002','Digital Design Tools','URBN','247','1800','2050','M','Aspland, Kurt'),(29,'DIGM 100 003','Digital Design Tools','URBN','247','1800','2050','W','Fernandez, Christopher'),(30,'DIGM 100 004','Digital Design Tools','URBN','247','1830','2120','R','Newcomer, Daniel'),(31,'DIGM 451 001','Explorations in New Media','URBN','252','1800','2150','M','Lloyd, Robert'),(32,'DIGM 451 002','Explorations in New Media','URBN','248','1800','2150','M','Gross, Kevin'),(33,'DIGM 451 003','Explorations in New Media','URBN','202','1500','1850','W','Oum, Kenneth'),(34,'DIGM 465 001','ST:DIGM Senior Lab II','URBN','252','0830','0920','T','Jushchyshyn, Nicholas'),(35,'DIGM 465 002','ST:DIGM Senior Lab II','URBN','247','0830','0920','T','Berton, John'),(36,'DIGM 465 003','ST:DIGM Senior Lab II','URBN','248','0830','0920','T','Zhu, Jichen'),(37,'DIGM 465 004','ST:DIGM Senior Lab II','URBN','250','0830','0920','T','Rank, Stefan'),(38,'DIGM 465 005','ST:DIGM Senior Lab II','URBN','239','0830','0920','T','Lee, Frank'),(39,'DIGM 465 006','ST:DIGM Senior Lab II','URBN','206','0830','0920','T','Lloyd, Robert'),(40,'DIGM 465 007','ST:DIGM Senior Lab II','URBN','ANNEX 110','0830','0920','T','Diefenbach, Paul'),(41,'DIGM 493 001','Sr Proj II - Dig Media','URBN','ANNEX 110','0930','1220','T','Wagner, Michael'),(42,'DIGM 526 001','Advanced Animation II','URBN','202','0900','1150','M','Berton, John'),(43,'DIGM 526 002','Advanced Animation II','URBN','202','0900','1150','W','Berton, John'),(44,'DIGM 530 001','Advanced Game Design I','URBN','202','1530','1820','T','Zhu, Jichen'),(45,'DIGM 530 002','Advanced Game Design I','URBN','206','1530','1820','T','Rank, Stefan'),(46,'DIGM 540 001','New Media Project','URBN','247','1500','1750','M','Muschio, Glen'),(47,'DIGM 540 002','New Media Project','URBN','250','1500','1750','W','Mauriello, David'),(48,'DIGM 630 001','Digital Media Group Workshop','URBN','202','1800','2050','M','Diefenbach, Paul'),(49,'DIGM 680 001','Thesis Development','URBN','202','1200','1450','M','Muschio, Glen'),(50,'DIGM 680 002','Thesis Development','URBN','206','1200','1450','M','Zhu, Jichen'),(51,'DIGM 699 001','Native iOS App Dev','','','','','','Thompson, Jervis'),(52,'DIGM 699 002','Advanced ANIM: Stats Board','','','','','','Thompson, Jervis'),(53,'DIGM 699 003','Animation Facial Modeling','','','','','','Mauriello, David'),(54,'DIGM 699 004','Dual Player Game Dev','','','','','','Thompson, Jervis'),(55,'GMAP 345 001','Game Development Foundations','URBN','252','0930','1220','R','Ontanon, Santiago'),(56,'GMAP 345 002','Game Development Foundations','URBN','250','1830','2120','T','Ontanon, Santiago'),(57,'GMAP 345 003','Game Development Foundations','URBN','250','1200','1450','M','Chapin, Aaron'),(58,'GMAP 348 001','Experimental Games','URBN','250','1230','1350','T  R','Chapin, Aaron'),(59,'GMAP 348 002','Experimental Games','URBN','250','1400','1520','T  R','Lee, Frank'),(60,'GMAP 378 001','Game Development: Workshop II','URBN','248','1200','1450','W','Diefenbach, Paul'),(61,'GMAP 378 002','Game Development: Workshop II','URBN','252','1200','1450','M','Lloyd, Robert'),(62,'GMAP 399 001','Adv Experimental Game','','','','','','Wagner, Michael'),(63,'WBDV 216 001','History of Web Development','URBN','349','1200','1450','W','Finamore, Troy'),(64,'WBDV 240 001','Web Authoring I','URBN','252','1830','2120','R','Sinatra, Philip'),(65,'WBDV 240 003','Web Authoring I','URBN','252','1830','2120','T','Sinatra, Philip'),(66,'WBDV 241 001','Vector Authoring I','URBN','252','1230','1520','R','Thompson, Jervis'),(67,'WBDV 241 002','Vector Authoring I','URBN','252','1530','1820','T','Oum, Kenneth'),(68,'WBDV 241 003','Vector Authoring I','URBN','252','1530','1820','R','Oum, Kenneth'),(69,'WBDV 241 004','Vector Authoring I','URBN','252','0900','1150','W','Myers, Chelsea'),(70,'WBDV 241 005','Vector Authoring I','URBN','252','1800','2050','W','Yakovich, Edward'),(71,'WBDV 371 001','Mobile Interactive Design II','URBN','250','1530','1820','T','Thompson, Jervis'),(72,'WBDV 449 001','IDM Workshop II','URBN','247','1530','1820','R','Finamore, Troy'),(73,'WBDV 460 002','Experimental Web Technologies','URBN','248','0930','1220','R','Thompson, Jervis');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statusBoardInfo`
--

DROP TABLE IF EXISTS `statusBoardInfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statusBoardInfo` (
  `section` int(11) NOT NULL,
  `sectionTitle` varchar(1000) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`section`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statusBoardInfo`
--

LOCK TABLES `statusBoardInfo` WRITE;
/*!40000 ALTER TABLE `statusBoardInfo` DISABLE KEYS */;
INSERT INTO `statusBoardInfo` (`section`, `sectionTitle`, `url`, `content`) VALUES (1,'DIGM Demo Reel 2014','',''),(2,'DIGM Jobs','http://digm.drexel.edu/news/jobs/feed/',''),(3,'DIGM Events','http://digm.drexel.edu/news/events/feed/',''),(4,'Featured Events','http://digm.drexel.edu/featured/feed/',''),(5,'Lab Schedule','','');
/*!40000 ALTER TABLE `statusBoardInfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'chelmyer_statusboard'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-16 21:49:49
