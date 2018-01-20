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
-- Table structure for table `wp_termmeta`
--

DROP TABLE IF EXISTS `wp_termmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_termmeta`
--

LOCK TABLES `wp_termmeta` WRITE;
/*!40000 ALTER TABLE `wp_termmeta` DISABLE KEYS */;
INSERT INTO `wp_termmeta` VALUES (1,31,'order_pa_color','0'),(2,31,'thumbnail_id','0'),(3,31,'display_type','Color'),(4,31,'color','#1e73be'),(5,32,'order_pa_product-intro','0'),(6,32,'thumbnail_id','0'),(7,32,'display_type','Color'),(8,32,'color','#ffffff'),(9,33,'order_pa_color','0'),(10,33,'thumbnail_id','0'),(11,33,'display_type','Color'),(12,33,'color','#81d742'),(13,34,'order_pa_product-intro','0'),(14,34,'thumbnail_id','0'),(15,34,'display_type','Color'),(16,34,'color','#ffffff'),(17,35,'order_pa_product-intro','0'),(18,35,'thumbnail_id','0'),(19,35,'display_type','Color'),(20,35,'color','#ffffff'),(21,36,'order_pa_color','0'),(22,36,'thumbnail_id','0'),(23,36,'display_type','Color'),(24,36,'color','#dd3333'),(25,37,'order','0'),(26,37,'order','0'),(27,37,'product_count_product_cat','16'),(28,37,'display_type',''),(29,37,'thumbnail_id','0'),(30,38,'order','0'),(31,38,'order','0'),(32,38,'product_count_product_cat','12'),(33,39,'order','0'),(34,39,'order','0'),(35,39,'product_count_product_cat','7'),(36,40,'order','0'),(37,40,'order','0'),(38,40,'product_count_product_cat','8'),(39,40,'display_type',''),(40,40,'thumbnail_id','0'),(41,41,'order','0'),(42,41,'order','0'),(43,41,'product_count_product_cat','17'),(44,42,'order','0'),(45,42,'order','0'),(46,42,'product_count_product_cat','14'),(47,43,'order','0'),(48,43,'order','0'),(49,43,'product_count_product_cat','13'),(50,44,'order','0'),(51,44,'order','0'),(52,44,'product_count_product_cat','16'),(53,45,'order','0'),(54,45,'order','0'),(55,45,'product_count_product_cat','15'),(56,46,'order','0'),(57,46,'order','0'),(58,46,'display_type',''),(59,46,'thumbnail_id','0'),(60,46,'product_count_product_cat','8'),(61,47,'order','0'),(62,47,'order','0'),(63,47,'product_count_product_cat','8'),(64,48,'order','0'),(65,48,'order','0'),(66,48,'product_count_product_cat','8'),(67,48,'display_type',''),(68,48,'thumbnail_id','0'),(72,50,'order','0'),(73,50,'order','0'),(74,50,'product_count_product_cat','7'),(75,51,'order','0'),(76,51,'order','0'),(77,51,'product_count_product_cat','13'),(78,52,'order','0'),(79,52,'order','0'),(80,52,'display_type',''),(81,52,'thumbnail_id','0'),(82,52,'product_count_product_cat','8'),(83,53,'order','0'),(84,53,'order','0'),(85,53,'display_type',''),(86,53,'thumbnail_id','0'),(87,53,'product_count_product_cat','7'),(88,54,'order','0'),(89,54,'order','0'),(90,54,'display_type',''),(91,54,'thumbnail_id','0'),(92,54,'product_count_product_cat','8'),(93,55,'order','0'),(94,55,'order','0'),(95,55,'display_type',''),(96,55,'thumbnail_id','0'),(97,55,'product_count_product_cat','8');
/*!40000 ALTER TABLE `wp_termmeta` ENABLE KEYS */;
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
