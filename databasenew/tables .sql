-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version 5.6.23-log

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
-- Table structure for table `constructor`
--

DROP TABLE IF EXISTS `constructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `constructor` (
  `con_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `constructor`
--

LOCK TABLES `constructor` WRITE;
/*!40000 ALTER TABLE `constructor` DISABLE KEYS */;
INSERT INTO `constructor` VALUES (4,7),(13,6),(14,9);
/*!40000 ALTER TABLE `constructor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donor`
--

DROP TABLE IF EXISTS `donor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donor` (
  `d_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donor`
--

LOCK TABLES `donor` WRITE;
/*!40000 ALTER TABLE `donor` DISABLE KEYS */;
INSERT INTO `donor` VALUES (3,1),(7,1),(7,2),(8,3);
/*!40000 ALTER TABLE `donor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `st_id` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(145) NOT NULL,
  `salt` varchar(36) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `Email` varchar(245) DEFAULT NULL,
  `password` varchar(245) DEFAULT NULL,
  `Activation` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'Ashu',NULL,NULL,NULL,NULL,NULL),(2,'admin','68','admin','admin@gmail.com','6ab4982aea57c805e6872de119b04603',NULL),(3,'donor','24','donor','donor@gmail.com','ed89a1143c076225b867b47c39175112',NULL),(4,'const','25','const','const@gmail.com','151b073ff03b542b3cbee5b49405ed85',NULL),(5,'commu','93','commu','commu@gmail.com','3b03fc5c80131086873eae1c88a9bfb9',NULL),(6,'partner','79','partner','partner@gmail.com','6b257c8bdbdc2f2b6ea0559134f4bf3e',NULL),(7,'donor1','80','donor','donor1@gmail.com','a35c24d45e5ee6b130ea54008bbc876f',NULL),(8,'donor2','11','donor','donor2@gmail.com','914e0cc6d06f0c7186a6f5d6d866b603',NULL),(9,'partner1','73','partner','partner1@gmail.com','4483ec398b03890ceeb3a802db80e36f',NULL),(10,'partner2','87','partner','partner2@gmail.com','5f5bf574b5644732f4ec700897a2cfd8',NULL),(11,'commu1','24','commu','commu1@gmail.com','f1c8c983fc8eebe2a098ef4d99348fd3',NULL),(12,'commu2','46','commu','commu2@gmail.com','23faf5c95fe93aa2bcbaafc8787f98b6',NULL),(13,'const1','8','const','const1@gmail.com','ecc57ba859a4d9a33e394249cad882a0',NULL),(14,'const2','9','const','const2@gmail.com','1ad008c506af56c40246b0d1b1b2fa2d',NULL);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problems`
--

DROP TABLE IF EXISTS `problems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `problems` (
  `prob_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `contents` varchar(4000) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`prob_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problems`
--

LOCK TABLES `problems` WRITE;
/*!40000 ALTER TABLE `problems` DISABLE KEYS */;
INSERT INTO `problems` VALUES (1,1,'Schools down!',7),(2,2,'Need more funding!',9);
/*!40000 ALTER TABLE `problems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `site_preparation` int(11) DEFAULT NULL,
  `brick_walls` int(11) DEFAULT NULL,
  `carpentry` int(11) DEFAULT NULL,
  `paint` int(11) DEFAULT NULL,
  `electric_work` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` VALUES (1,1,'12/07/2015',25,30,20,10,5),(2,2,'12/07/2015',34,34,44,33,55);
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(245) NOT NULL,
  `region` varchar(245) NOT NULL,
  `p_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `completed` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school`
--

LOCK TABLES `school` WRITE;
/*!40000 ALTER TABLE `school` DISABLE KEYS */;
INSERT INTO `school` VALUES (1,'Fatima','Mumbai',6,5,4,0),(2,'SVP High School','Nashik',9,11,13,10),(3,'ABC School','Pune',10,12,14,85);
/*!40000 ALTER TABLE `school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stories`
--

DROP TABLE IF EXISTS `stories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stories` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `contents` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stories`
--

LOCK TABLES `stories` WRITE;
/*!40000 ALTER TABLE `stories` DISABLE KEYS */;
/*!40000 ALTER TABLE `stories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_reports`
--

DROP TABLE IF EXISTS `tmp_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_reports` (
  `tmp_id` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `date` varchar(145) DEFAULT NULL,
  `site_preparation` int(11) DEFAULT NULL,
  `brick_walls` int(11) DEFAULT NULL,
  `carpentry` int(11) DEFAULT NULL,
  `paint` int(11) DEFAULT NULL,
  `electric_work` int(11) DEFAULT NULL,
  PRIMARY KEY (`tmp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_reports`
--

LOCK TABLES `tmp_reports` WRITE;
/*!40000 ALTER TABLE `tmp_reports` DISABLE KEYS */;
INSERT INTO `tmp_reports` VALUES (1,2,'12/07/2015',34,34,44,33,55);
/*!40000 ALTER TABLE `tmp_reports` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-11 20:48:01
