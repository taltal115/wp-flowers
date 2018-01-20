-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: blog
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `wp_commentmeta`
--

DROP TABLE IF EXISTS `wp_commentmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_commentmeta`
--

LOCK TABLES `wp_commentmeta` WRITE;
/*!40000 ALTER TABLE `wp_commentmeta` DISABLE KEYS */;
INSERT INTO `wp_commentmeta` VALUES (1,2,'_wxr_import_user','1'),(2,3,'akismet_history','a:3:{s:4:\"time\";s:15:\"1472118478.5192\";s:5:\"event\";s:11:\"check-error\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(3,4,'akismet_history','a:4:{s:4:\"time\";s:15:\"1472092666.5165\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:5:\"admin\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(4,4,'_wxr_import_user','1'),(5,5,'akismet_error','1492897506'),(6,5,'akismet_history','a:3:{s:4:\"time\";s:15:\"1492897506.4643\";s:5:\"event\";s:11:\"check-error\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(7,6,'akismet_error','1492898809'),(8,6,'akismet_history','a:3:{s:4:\"time\";s:14:\"1492898809.317\";s:5:\"event\";s:11:\"check-error\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(9,7,'akismet_history','a:3:{s:4:\"time\";s:15:\"1472030537.2475\";s:5:\"event\";s:11:\"check-error\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(10,11,'rating','3'),(11,11,'verified','0'),(12,11,'_wxr_import_user','1'),(13,12,'rating','5'),(14,12,'verified','0'),(15,12,'_wxr_import_user','1'),(16,13,'rating','5'),(17,13,'verified','0'),(18,13,'_wxr_import_user','1'),(19,14,'rating','3'),(20,14,'verified','0'),(21,15,'akismet_history','a:4:{s:4:\"time\";s:15:\"1474365068.2117\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:5:\"admin\";s:4:\"meta\";a:1:{s:8:\"response\";s:0:\"\";}}'),(22,15,'rating','4'),(23,15,'verified','0'),(24,15,'_wxr_import_user','1'),(25,16,'akismet_history','a:4:{s:4:\"time\";s:15:\"1474364955.2771\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:5:\"admin\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(26,16,'rating','4'),(27,16,'verified','0'),(28,16,'_wxr_import_user','1'),(29,17,'akismet_history','a:4:{s:4:\"time\";s:15:\"1472185308.2073\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:6:\"hanhle\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(30,17,'rating','4'),(31,17,'verified','0'),(32,17,'_wxr_import_user','2'),(33,18,'akismet_history','a:4:{s:4:\"time\";s:15:\"1474365034.5038\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:5:\"admin\";s:4:\"meta\";a:1:{s:8:\"response\";s:0:\"\";}}'),(34,18,'rating','5'),(35,18,'verified','0'),(36,18,'_wxr_import_user','1'),(37,19,'rating','4'),(38,19,'verified','0'),(39,19,'_wxr_import_user','1'),(40,20,'akismet_history','a:3:{s:4:\"time\";s:15:\"1474355131.7558\";s:5:\"event\";s:11:\"check-error\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(41,20,'rating','5'),(42,20,'verified','0'),(43,21,'akismet_history','a:4:{s:4:\"time\";s:14:\"1472271044.893\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:5:\"admin\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(44,21,'rating','4'),(45,21,'verified','0'),(46,21,'_wxr_import_user','1'),(47,22,'akismet_error','1488248433'),(48,22,'akismet_history','a:4:{s:4:\"time\";s:15:\"1488248433.6282\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:11:\"netbaseteam\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(49,22,'rating','4'),(50,22,'verified','0'),(51,22,'_wxr_import_user','6'),(52,23,'akismet_error','1487210930'),(53,23,'akismet_history','a:4:{s:4:\"time\";s:15:\"1487210930.8606\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:11:\"netbaseteam\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(54,23,'rating','4'),(55,23,'verified','0'),(56,23,'_wxr_import_user','6'),(57,24,'akismet_error','1487210818'),(58,24,'akismet_history','a:4:{s:4:\"time\";s:15:\"1487210818.7812\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:11:\"netbaseteam\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(59,24,'rating','5'),(60,24,'verified','0'),(61,24,'_wxr_import_user','6'),(62,25,'akismet_history','a:4:{s:4:\"time\";s:15:\"1473238046.2449\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:5:\"admin\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(63,25,'rating','4'),(64,25,'verified','0'),(65,25,'_wxr_import_user','1'),(66,26,'akismet_history','a:4:{s:4:\"time\";s:14:\"1473131152.605\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:5:\"admin\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(67,26,'rating','5'),(68,26,'verified','0'),(69,26,'_wxr_import_user','1'),(70,27,'akismet_history','a:4:{s:4:\"time\";s:15:\"1473138260.4197\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:5:\"admin\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(71,27,'rating','4'),(72,27,'verified','0'),(73,27,'_wxr_import_user','1'),(74,28,'akismet_history','a:4:{s:4:\"time\";s:15:\"1473134841.4112\";s:5:\"event\";s:11:\"check-error\";s:4:\"user\";s:5:\"admin\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(75,28,'rating','5'),(76,28,'verified','0'),(77,28,'_wxr_import_user','1'),(78,29,'akismet_error','1490754263'),(79,29,'akismet_history','a:3:{s:4:\"time\";s:15:\"1490754263.6297\";s:5:\"event\";s:11:\"check-error\";s:4:\"meta\";a:1:{s:8:\"response\";s:7:\"invalid\";}}'),(80,29,'rating','5'),(81,29,'verified','0');
/*!40000 ALTER TABLE `wp_commentmeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-20 11:46:18
