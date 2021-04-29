-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: fms_test
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (1,'1','1','1','3x.gif'),(2,'2','2','2','p4sxib.gif'),(3,'3','3','3','Capture.PNG');
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_ID` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `status` enum('Enable','Disable') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES (3,'Kong Shun Kang','shunkang_129@live.com','61164','$2y$10$xBJX5xCMWlGpSKvpPQR3fe2gUUKRf3.YTHIp1ikhafNIqYN4i9gpC','Admin','Enable'),(4,'user','user@test.com','111112','$2y$10$N/f9UDNtFKSH54cTgKqGduPIMe4JDkzAuKIkivczIOHMVJhhSOpp2','User','Enable'),(5,'admin2','admin2@gmail.com','22','$2y$10$JIVXt5rfs2hj4lrKtU79EOPbLX4bCn241L5qztQkvPbHJodwr1WZO','Admin','Enable'),(36,'jackson','jackson@gmail.com','10110','$2y$10$0OL9dkjA.DiBmH0iH9TPaO1rmGwc5Nk3rocAnvNpguIIa0uZ8Jaj6','User','Enable'),(37,'daniel','daniel@gmail.com','12345','$2y$10$L6ubpB2sG0s6x6izZZZt6eAnKocfLDWAj2HlqBr/aCsECzdDoJNZO','User','Enable'),(38,'David','david@user.com','97978','$2y$10$0IWDQ7FkkfWJgiFyPJnyy.ittJIOXXza/jZrdhVyKHlPRg76fZLmq','User','Enable');
/*!40000 ALTER TABLE `register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(255) NOT NULL,
  `incidentArea` varchar(255) NOT NULL,
  `incidentCause` varchar(255) NOT NULL,
  `reportDate` date NOT NULL,
  `victimFatality` int(11) NOT NULL,
  `victimInjured` int(11) NOT NULL,
  `victimSaved` int(11) NOT NULL,
  `asset_lost` double NOT NULL,
  `asset_recover` double NOT NULL,
  `contactMethod` varchar(255) NOT NULL,
  `personInCharge` varchar(255) NOT NULL,
  `reportStatus` varchar(255) NOT NULL,
  `reportCreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `docName` varchar(255) NOT NULL,
  `docSize` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` VALUES (1,'Stadium Ipoh','Manjung','Faulty Wiring','2021-04-01',1,2,4,500,1500,'999','Kong Shun Kang','Closed','2021-04-21 06:21:37','',0),(2,'Meru Raya','Hulu Perak','Faulty Wiring','2021-04-03',1,3,4,500,4000,'Others','Kong Shun Kang','Closed','2021-04-21 06:21:37','',0),(3,'Pengkalan','Kinta','Faulty Wiring','2021-03-31',0,1,4,600,200,'Station Hotline','Kong Shun Kang','Closed','2021-04-21 06:21:37','',0),(4,'Gopeng','Kuala Kangsar','Others','2021-03-18',0,0,1,450,1700,'Others','Kong Shun Kang','Pending','2021-04-21 06:21:37','',0),(5,'Stadium Ipoh','Others','Others','2021-04-01',0,1,2,250,1000,'Others','Kong Shun Kang','Closed','2021-04-21 06:21:37','',0),(6,'Stadium Ipoh','Hulu Perak','Equipment Defective','2021-04-01',0,0,0,0,0,'Station Hotline','Kong Shun Kang','Fake','2021-04-21 06:21:37','',0),(7,'Meru Raya','Others','Equipment Defective','2021-02-04',0,0,0,0,0,'','','Closed','2021-04-21 06:21:37','',0),(9,'Stadium Ipoh','Hulu Perak','Faulty Wiring','2021-04-19',1,2,4,500,1500,'','','Closed','2021-04-21 06:21:37','',0),(10,'Stadium Ipoh','Hulu Perak','Faulty Wiring','2021-04-18',0,2,4,560,1000,'','','Closed','2021-04-21 06:21:37','',0),(11,'Pengkalan','Hulu Perak','Faulty Wiring','2021-05-05',1,2,2,600,1450,'','','Closed','2021-04-21 06:21:37','',0),(12,'Pengkalan','Hulu Perak','Crime','2021-04-19',1,4,4,600,3000,'','','Closed','2021-04-21 06:21:37','',0),(13,'Stadium Ipoh','Hulu Perak','Faulty Wiring','2021-04-20',0,0,4,50,2500,'','','Closed','2021-04-21 06:21:37','',0),(14,'Stadium Ipoh','Hulu Perak','Equipment Defective','2021-04-17',0,1,2,500,5000,'','','Closed','2021-04-21 06:21:37','',0),(15,'Stadium Ipoh','Hulu Perak','Faulty Wiring','2021-04-20',1,1,3,2500,600,'','','Closed','2021-04-21 06:21:37','',0),(16,'Pengkalan','Hulu Perak','Equipment Defective','2021-04-20',1,2,1,600,1560,'','','Closed','2021-04-21 06:21:37','',0),(17,'Stadium Ipoh','Hulu Perak','Equipment Defective','2021-04-21',1,1,2,500,650,'','Kong Shun Kang','Closed','2021-04-21 08:46:30','',0),(18,'Stadium Ipoh','Hulu Perak','Crime','2021-01-13',1,2,0,6000,3500,'','daniel','Closed','2021-04-21 09:20:57','',0),(20,'Pengkalan','Hulu Perak','Equipment Defective','2021-04-20',0,2,3,5000,150,'','Kong Shun Kang','Closed','2021-04-22 10:06:57','',0),(21,'Stadium Ipoh','Hulu Perak','Faulty Wiring','2021-04-24',0,2,1,600,500,'','Kong Shun Kang','Closed','2021-04-24 13:30:51','',0),(22,'Pengkalan','Hulu Perak','Equipment Defective','2021-04-24',1,1,1,1500,2000,'Report at station','Kong Shun Kang','Closed','2021-04-24 13:32:53','',0),(23,'Stadium Ipoh','Hulu Perak','Faulty Wiring','2021-04-25',1,1,2,500,500,'Station Hotline','Kong Shun Kang','Closed','2021-04-25 06:47:27','',0),(24,'Pengkalan','Hulu Perak','Faulty Wiring','2021-04-25',0,1,3,50,250,'999','Kong Shun Kang','Closed','2021-04-25 06:48:05','Timeline.pdf',97504),(25,'Gopeng','Manjung','Faulty Wiring','2021-03-03',0,0,3,500,5000,'Station Hotline','Kong Shun Kang','Closed','2021-04-25 06:52:52','',0),(26,'Meru Raya','Manjung','Faulty Wiring','2021-04-25',1,2,4,500,500,'999','Kong Shun Kang','Pending','2021-04-25 07:28:09','Things to mention.docx',0),(27,'Meru Raya','Kuala Kangsar','Others','2021-04-25',0,0,0,0,0,'999','Kong Shun Kang','Fake','2021-04-25 07:28:32','',0),(28,'Gopeng','Kuala Kangsar','Crime','2021-06-03',0,3,4,1200,1600,'999','Kong Shun Kang','Closed','2021-04-25 08:56:24','Objectives.doc',28672),(29,'Stadium Ipoh','Hulu Perak','Equipment Defective','2021-04-25',1,1,2,600,600,'Station Hotline','daniel','Pending','2021-04-25 08:58:57','',0),(30,'Stadium Ipoh','Hulu Perak','Crime','2021-05-01',0,2,4,2000,1500,'Station Hotline','user','Closed','2021-04-29 06:50:59','the-business-model-canvas.pdf',39208),(31,'Gopeng','Kuala Kangsar','Equipment Defective','2021-05-13',0,1,2,6000,15000,'Station Hotline','Kong Shun Kang','Closed','2021-04-29 06:58:10','thoughts.docx',14506),(32,'Meru Raya','Hulu Perak','Faulty Wiring','2021-05-13',0,1,1,500,1500,'Report at station','Kong Shun Kang','Pending','2021-04-29 06:59:18','',0),(33,'Meru Raya','Kinta','Faulty Wiring','2021-06-10',0,4,4,5500,6200,'Station Hotline','Kong Shun Kang','Closed','2021-04-29 07:54:40','',0),(34,'Gopeng','Kuala Kangsar','Crime','2021-07-02',0,2,2,500,1200,'999','Kong Shun Kang','Pending','2021-04-29 07:56:08','',0);
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-29 17:31:40
