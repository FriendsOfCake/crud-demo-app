-- MySQL dump 10.13  Distrib 5.6.16-64.2, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: crud3
-- ------------------------------------------------------
-- Server version	5.6.16-64.2-569.wheezy-log

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,5,'amaze!','weee','2014-04-18 12:00:00','2014-04-17 17:46:31'),(2,35,'nice','device','2014-04-17 18:01:46','2014-04-17 18:01:46'),(3,35,'amaze','weeee','2014-04-17 18:02:01','2014-04-17 18:02:01'),(4,5,'nice kit','weee','2014-04-17 18:08:43','2014-04-17 18:08:43'),(5,5,'much amaze','weee','2014-04-17 18:16:52','2014-04-17 18:16:52'),(6,26,'amaze','much comment','2014-04-17 18:51:54','2014-04-17 18:51:54');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_count` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `body` text NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (5,3,'ok mew mew!!!',1,'epic winning','2014-04-17 18:22:00','2014-04-16 18:22:00'),(6,0,'ok mew mew',0,'wee','2014-04-16 18:22:00','2014-04-16 18:22:00'),(7,0,'ok mew mew',0,'wee','2014-04-16 18:22:00','2014-04-16 18:22:00'),(8,0,'ok mew mew',0,'wee','2014-04-16 18:22:00','2014-04-16 18:22:00'),(9,0,'ok mew mew',0,'wee','2014-04-16 18:22:00','2014-04-16 18:22:00'),(21,0,'kit kat',0,'wee',NULL,NULL),(22,0,'kit kat',0,'wee',NULL,NULL),(23,0,'hello world',0,'wee',NULL,NULL),(24,0,'hello world',0,'wee',NULL,NULL),(25,0,'hello world',0,'wee',NULL,NULL),(26,1,'hello world',0,'wee',NULL,NULL),(27,0,'hello world',0,'wee',NULL,NULL),(28,0,'hello world',0,'wee',NULL,NULL),(29,0,'hello world',0,'wee',NULL,NULL),(30,0,'hello world',0,'wee',NULL,NULL),(31,0,'hello world',0,'wee',NULL,NULL),(32,0,'hello world',0,'wee',NULL,NULL),(33,0,'weeee',0,'weeee',NULL,NULL),(34,0,'weeee',0,'weeee',NULL,NULL),(35,0,'weeee',0,'weeee',NULL,NULL),(36,0,'weeee',0,'weeee',NULL,NULL),(37,0,'weeee',0,'weeee',NULL,NULL),(38,0,'wee',0,'eeeee',NULL,NULL),(39,0,'wee',0,'eeeee',NULL,NULL),(41,0,'hi how are you?',1,'hello world',NULL,NULL),(42,0,'hi how are you?',1,'hello world',NULL,NULL),(43,0,'hi how are you?',1,'hello world',NULL,NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-03 11:24:16
