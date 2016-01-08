-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bjjcomp
-- ------------------------------------------------------
-- Server version	5.5.35-1ubuntu1

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_06_12_204614_create_users_table',1),('2014_06_15_115223_add_weight_to_users',2),('2014_06_15_211849_add_column_gender_on_users',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `belt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'d9b49cf5182154554@bjjcomp.club','MARK','Marc','Wilkinson','1979-01-01','white','2014-06-18 20:39:22','2014-06-18 20:39:22','s_feather','male'),(4,'d1e9c72374fe6fd03@bjjcomp.club','','Ted','Chan','1982-01-01','white','2014-06-18 20:40:02','2014-06-18 20:40:02','rooster','male'),(5,'d80a21003970a4e36@bjjcomp.club','REGINHO','reginho','lunch time','1992-01-01','white','2014-06-18 20:40:56','2014-06-18 20:40:56','s_feather','male'),(6,'a4575f522b859c99b@bjjcomp.club','DJ','Dean','Dj','1992-01-01','white','2014-06-18 20:42:55','2014-06-18 20:42:55','m_heavy','male'),(7,'b191bb32e01677afe@bjjcomp.club','Gaucho','Junior','Gaucho','1982-01-01','white','2014-06-18 20:43:44','2014-06-18 20:43:44','middle','male'),(8,'0d404bc304e9cae4c@bjjcomp.club','','Monica','Monix','1986-01-01','white','2014-06-18 20:44:34','2014-06-18 20:44:34','feather','female'),(9,'c3957e77ef7cd554a@bjjcomp.club','LunchTime','Paul','Brooks','1969-01-01','white','2014-06-18 20:45:08','2014-06-18 20:45:08','middle','male'),(10,'d5099ba82cb1fc477@bjjcomp.club','Ozzy','Ozan','Kurtulus','1989-01-01','white','2014-06-18 20:45:57','2014-06-18 20:45:57','feather','male'),(11,'8b580cc341e5927d7@bjjcomp.club','','Bikram','Lunch Time','1995-01-01','white','2014-06-18 20:47:03','2014-06-18 20:47:03','middle','male'),(12,'63773c57d8ea5dbcf@bjjcomp.club','','Tutu','B.Bjj','1989-01-01','white','2014-06-18 20:47:50','2014-06-18 20:47:50','s_feather','male'),(13,'5b0c732a660b0733d@bjjcomp.club','','Rodolfo','Vieira','1982-01-01','white','2014-06-18 20:48:26','2014-06-18 20:48:26','middle','male'),(14,'69987d6e6a57b1466@bjjcomp.club','','Myao','Brother','1982-01-01','white','2014-06-18 20:49:21','2014-06-18 20:49:21','m_heavy','male'),(15,'b0803d7cf18da167b@bjjcomp.club','','Charlie','Bombril','1989-01-01','white','2014-06-18 20:49:55','2014-06-18 20:49:55','heavy','male'),(16,'b7c9c1ed9e38722f6@bjjcomp.club','','Borja','Casanova','1979-01-01','white','2014-06-18 20:50:35','2014-06-18 20:50:35','feather','male'),(17,'75b0b9944581320ac@bjjcomp.club','','Roberto','Carlos','1983-01-01','white','2014-06-18 20:51:09','2014-06-18 20:51:09','light','male'),(18,'058ac35d270394ff3@bjjcomp.club','Anton','Anthony','Mead','1980-01-01','blue','2014-06-18 20:52:02','2014-06-18 20:52:02','light','male'),(20,'aafca3dee5721fb4e@bjjcomp.club','Galinho','Daniel','Worters','1983-01-01','blue','2014-06-18 20:53:07','2014-06-18 20:53:07','s_feather','male'),(21,'auragoldman@hotmail.co.uk','Cheetara','Aura','Goldman','1990-11-03','white','2014-06-18 21:05:28','2014-06-18 21:05:28','heavy','female'),(22,'kieroncullen@hotmail.com','','Kieron','Cullen','1986-10-22','white','2014-06-18 23:08:08','2014-07-23 22:49:42','s_heavy','male'),(23,'louis.creasey@gmail.com','','Louis','Creasey','1992-01-29','white','2014-06-18 23:10:15','2014-06-18 23:10:15','heavy','male'),(25,'Geoffrey.carbonel@gmail.com','Monsieur','Geoffrey','Carbonel','1985-07-31','blue','2014-06-18 23:16:32','2014-06-18 23:16:32','middle','male'),(26,'hbhamra@gmail.com','insertrandomexpletive','Harman','Bhamra','1983-03-26','purple','2014-06-19 00:19:44','2014-06-19 00:19:44','light','male'),(27,'marcinws25@Gmail.com','miniMi','Marcin ','wiński ','1990-06-26','white','2014-06-19 00:40:23','2014-06-19 00:40:23','s_feather','male'),(28,'ac_gooner@hotmail.com','AufWiedersehen','Alfie','Cook','1989-08-30','white','2014-06-19 02:15:06','2014-06-19 02:15:06','m_heavy','male'),(29,'maska204@wp.pl','MACONHA','krystian','dziedziul','1986-04-04','blue','2014-06-19 12:41:33','2014-06-19 12:41:33','light','male'),(30,'ec572410d81607562@bjjcomp.club','BanBan','Eduard','Eduard','1979-07-01','white','2014-06-19 22:51:26','2014-06-19 22:51:26','s_heavy','male'),(32,'dmitriy@vimesvc.com','Lazy','Dima','Gilgur','1982-09-10','white','2014-06-20 15:44:27','2014-06-20 15:44:27','middle','male'),(33,'cracovia1906ks@gmail.com','Kali','Dariusz ','kalinowski ','1985-09-30','white','2014-06-20 17:40:09','2014-06-20 17:40:09','light','male'),(34,'jellevanderwind@hotmail.com','','Jelle','Van der wind','1978-04-18','white','2014-06-20 19:26:46','2014-06-20 19:26:46','light','male'),(35,'shahmirdh@gmail.com','Shim','Shahmir','Hussain','1989-03-08','white','2014-06-20 20:37:57','2014-06-20 20:37:57','s_feather','male'),(36,'7d9e3cd8d8ed34339@bjjcomp.club','AAALLEEXXXX','Alex','Alex','1983-07-03','white','2014-06-21 00:07:18','2014-06-21 00:07:18','feather','male'),(38,'cestius85@gmail.com','Akos','Akos Janos','Takacs','1985-12-21','white','2014-06-21 01:48:06','2014-06-21 01:48:06','m_heavy','male'),(39,'darrenpilbro40@hotmail.com','','Darren','Pilbro','1988-06-12','white','2014-06-21 18:10:46','2014-06-21 18:10:46','light','male'),(40,'1eff16b0f6eafad59@bjjcomp.club','hermanoellll','emanuel','emanuel','1985-03-01','blue','2014-06-21 18:47:30','2014-06-21 18:47:30','middle','male'),(42,'ba91426296f6ff6ce@bjjcomp.club','Kev','Keviln','K','1985-08-31','white','2014-06-21 18:56:42','2014-06-21 18:56:42','heavy','male'),(43,'86a6e9e17e46fa8a7@bjjcomp.club','Max','Max','M','1986-05-28','blue','2014-06-21 18:57:16','2014-06-21 18:57:16','feather','male'),(44,'gfsteed@hotmail.co.uk','','Guy','Steed','1989-04-16','white','2014-06-21 19:29:59','2014-06-21 19:29:59','light','male'),(45,'scootdog4life@gmail.com','DC','Quinton','Allen','1991-02-26','white','2014-06-22 01:05:21','2014-06-22 01:05:21','middle','male'),(47,'foshatogbe@gmail.com','WillSmith','Femi','Oshatogbe','1987-02-25','white','2014-06-23 13:53:50','2014-06-23 13:53:50','feather','male'),(48,'captainJspaulding@hotmail.co.uk','','Jamie','Ilsley','1981-12-18','white','2014-06-24 15:23:24','2014-06-24 15:23:24','light','male'),(49,'samuel.amco@btinternet.com','Sam','Samuel','Amantea-Collins','1993-03-07','white','2014-06-24 15:52:43','2014-06-24 15:52:43','light','male'),(50,'daviesgareth50@gmail.com','orelha','Gareth','Davies','1992-08-29','white','2014-06-25 13:58:02','2014-06-25 13:58:02','light','male'),(51,'adamsattar@hotmail.com','','Adam','Sattar','1980-07-28','white','2014-06-26 19:30:43','2014-06-26 19:30:43','middle','male'),(52,'2a4f5c817d31ba2b0@bjjcomp.club','Wallid','Luis','Amaral','1980-10-20','blue','2014-06-26 23:08:48','2014-06-26 23:08:48','feather','male'),(53,'nick.butler@investigo.co.uk','Nick','Nick','Butler','1983-05-04','white','2014-06-26 23:28:09','2014-06-26 23:28:09','middle','male'),(54,'Sean.william.richards@gmail.com','','Sean','Richards ','1983-06-18','white','2014-06-27 00:21:48','2014-06-27 00:21:48','m_heavy','male'),(55,'felixhowes@icloud.com','Chiclete','Felix','Howes','1988-05-18','blue','2014-06-27 01:48:03','2014-06-27 01:48:03','m_heavy','male'),(56,'hummingofevil@hotmail.com','Arrombado','Super','Sexyraba','1980-03-15','blue','2014-06-27 02:07:31','2014-06-27 02:07:31','middle','male'),(57,'lo.lilene@gmail.com','Helena','Helene','Lo','1984-04-19','white','2014-06-27 02:21:47','2014-06-27 02:21:47','feather','female'),(58,'jeremypetley@yahoo.co.uk','Ninja','Jeremy','Petley','1985-03-03','blue','2014-06-27 08:34:24','2014-06-27 08:34:24','light','male'),(59,'timothymeathooks@yahoo.co.uk','TheWhiteBull','Timothy','Tyler-Smith','1984-04-16','purple','2014-06-27 13:29:46','2014-06-27 13:29:46','heavy','male'),(60,'sal@salvadorbrown.com','hiccup','salvador','brown','1992-03-26','white','2014-06-28 00:04:10','2014-07-18 15:34:41','light','male'),(61,'philip@ogbodo.com','Spider','Philip ','Og ','1978-05-15','white','2014-07-03 10:05:15','2014-07-03 10:05:15','m_heavy','male'),(62,'ffmilan@yahoo.it','','Francesco','Milan','1984-08-20','white','2014-07-03 16:29:37','2014-07-03 16:29:37','middle','male'),(63,'modris001@inbox.lv','','Modris','Krisjanis','1988-11-04','white','2014-07-04 02:43:32','2014-07-23 08:52:01','m_heavy','male'),(64,'tomel@zoznam.sk','RobertoCarlos','Tomas','Lubusky','1983-04-07','white','2014-07-04 03:59:44','2014-07-04 03:59:44','middle','male'),(65,'stuart.hayter@euroclear.com','','stu','hayter','1975-08-15','blue','2014-07-04 15:42:45','2014-07-04 15:42:45','m_heavy','male'),(66,'tomas_rolles@hotmail.com','Tom','Thomas','Rolles','1986-07-18','white','2014-07-06 00:01:00','2014-07-06 00:01:00','light','male'),(67,'dan.lewis700@gmail.com','Dan','Dan','Lewis','1985-04-10','blue','2014-07-07 14:36:48','2014-07-07 14:36:48','light','male'),(68,'victor.diran@web.de','V','Victor','D','1986-01-20','white','2014-07-07 15:20:46','2014-07-07 15:20:46','light','male'),(69,'ed14900ff106fbc7f@bjjcomp.club','kbcao!!','Mat','harman','2014-07-02','blue','2014-07-07 21:19:51','2014-07-07 21:19:51','middle','male'),(70,'aleksks1@o2.pl','','Konrad','Kowalewski','1992-09-23','blue','2014-07-11 19:09:53','2014-07-11 19:09:53','s_feather','male'),(71,'ashleyh.pt@googlemail.com','','Ashley ','Hamilton','1988-06-11','white','2014-07-11 21:46:39','2014-07-11 21:46:39','heavy','male'),(72,'885b9075e0368d027@bjjcomp.club','Gibi','Marcelo','Dahlke','1975-02-09','purple','2014-07-11 23:53:13','2014-07-11 23:53:13','heavy','male'),(73,'d.burns@rfblegal.co.uk','Deeeeeeeve','David','Burns','1982-09-16','blue','2014-07-12 21:00:54','2014-07-12 21:00:54','light','male'),(74,'ross@rgclark.co.uk','Casper','Ross','Clark','1994-01-29','white','2014-07-14 23:57:02','2014-07-14 23:57:02','m_heavy','male'),(75,'danielprettidesouza@yahoo.co.uk','Maquina','Daniel','PRETTI DE SOUZA ','1978-10-30','white','2014-07-21 00:35:47','2014-07-21 00:35:47','middle','male'),(76,'nytrill@hotmail.com','Stretch','Luis','Quiterio','1980-05-10','blue','2014-07-23 00:36:10','2014-07-23 00:36:10','m_heavy','male'),(77,'jackstunell@gmail.com','JACK','Jack','Stunell','1983-10-13','white','2014-07-23 13:12:05','2014-07-23 13:12:05','middle','male');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-25  2:05:01
