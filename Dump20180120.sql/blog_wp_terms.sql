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
-- Table structure for table `wp_terms`
--

DROP TABLE IF EXISTS `wp_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_terms`
--

LOCK TABLES `wp_terms` WRITE;
/*!40000 ALTER TABLE `wp_terms` DISABLE KEYS */;
INSERT INTO `wp_terms` VALUES (1,'Uncategorized','uncategorized',0),(2,'All Same Day','all-same-day',0),(3,'Anniversary','anniversary',0),(4,'Birthday','birthday',0),(5,'Blog','blog',0),(6,'Flowers','flowers',0),(7,'Gift Baskets','gift-baskets',0),(8,'Love &amp; Romance','love-romance',0),(9,'Plants','plants',0),(10,'SYMPATHY','sympathy',0),(11,'sticky','sticky-2',0),(12,'template','template',0),(13,'footer-menu-02','footer-menu-02',0),(14,'main-menu','main-menu',0),(15,'sub_mega_menu','sub_mega_menu',0),(16,'category','category',0),(17,'abc','abc',0),(18,'simple','simple',0),(19,'grouped','grouped',0),(20,'variable','variable',0),(21,'external','external',0),(22,'exclude-from-search','exclude-from-search',0),(23,'exclude-from-catalog','exclude-from-catalog',0),(24,'featured','featured',0),(25,'outofstock','outofstock',0),(26,'rated-1','rated-1',0),(27,'rated-2','rated-2',0),(28,'rated-3','rated-3',0),(29,'rated-4','rated-4',0),(30,'rated-5','rated-5',0),(31,'Blue','blue',0),(32,'Brochure direct mailing services available','brochure-direct-mailing-services-available',0),(33,'Green','green',0),(34,'Lightning-fast turnaround times, including one-day production','lightning-fast-turnaround-times-including-one-day-production',0),(35,'Multiple premium paper stocks and folding options','multiple-premium-paper-stocks-and-folding-options',0),(36,'Red','red',0),(37,'סלסלת פרחים','basket-flower',0),(38,'פרחי יום הולדת','birthday-flower',0),(39,'ליליות','lily-flower',0),(40,'פרחי יום האם','mothers-day-flower',0),(41,'פרחי אמא','mummy-flower',0),(42,'פרחים למשרד','office-flower',0),(43,'וורדים','rose',0),(44,'פרחים לבית הספר','school-flower',0),(45,'פרחי אביב','spring-flower',0),(46,'סיגליות','tulips',0),(47,'פרחי חופשה','vacation-flower',0),(48,'פרחים לחתונה','wedding',0),(50,'פרחי חורף','winter-flower',0),(51,'women day flower','women-day-flower',0),(52,'סלסלת פרחים','basket-and-flower',0),(53,'Contemporary','contemporary',0),(54,'Lilies','lilies',0),(55,'Roses','roses',0);
/*!40000 ALTER TABLE `wp_terms` ENABLE KEYS */;
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
