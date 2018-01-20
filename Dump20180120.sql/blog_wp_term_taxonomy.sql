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
-- Table structure for table `wp_term_taxonomy`
--

DROP TABLE IF EXISTS `wp_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_taxonomy`
--

LOCK TABLES `wp_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `wp_term_taxonomy` DISABLE KEYS */;
INSERT INTO `wp_term_taxonomy` VALUES (1,1,'category','',0,1),(2,2,'category','',0,6),(3,3,'category','',0,6),(4,4,'category','',0,14),(5,5,'category','',0,6),(6,6,'category','',0,14),(7,7,'category','',0,6),(8,8,'category','',0,6),(9,9,'category','',0,14),(10,10,'category','',0,6),(11,11,'post_tag','',0,0),(12,12,'post_tag','',0,0),(13,13,'nav_menu','',0,7),(14,14,'nav_menu','',0,21),(15,15,'nav_menu','',0,5),(16,16,'category','',0,0),(17,17,'nav_menu','',0,1),(18,18,'product_type','',0,51),(19,19,'product_type','',0,0),(20,20,'product_type','',0,2),(21,21,'product_type','',0,0),(22,22,'product_visibility','',0,0),(23,23,'product_visibility','',0,0),(24,24,'product_visibility','',0,0),(25,25,'product_visibility','',0,1),(26,26,'product_visibility','',0,0),(27,27,'product_visibility','',0,0),(28,28,'product_visibility','',0,0),(29,29,'product_visibility','',0,3),(30,30,'product_visibility','',0,3),(31,31,'pa_color','',0,2),(32,32,'pa_product-intro','',0,1),(33,33,'pa_color','',0,2),(34,34,'pa_product-intro','',0,1),(35,35,'pa_product-intro','',0,1),(36,36,'pa_color','',0,2),(37,37,'product_cat','',0,16),(38,38,'product_cat','',0,12),(39,39,'product_cat','',0,7),(40,40,'product_cat','',0,8),(41,41,'product_cat','',0,17),(42,42,'product_cat','',0,14),(43,43,'product_cat','',0,13),(44,44,'product_cat','',0,16),(45,45,'product_cat','',0,15),(46,46,'product_cat','',40,8),(47,47,'product_cat','',0,8),(48,48,'product_cat','',0,8),(50,50,'product_cat','',0,7),(51,51,'product_cat','',0,13),(52,52,'product_cat','',48,8),(53,53,'product_cat','',48,7),(54,54,'product_cat','',48,8),(55,55,'product_cat','',48,8);
/*!40000 ALTER TABLE `wp_term_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-20 11:46:20
