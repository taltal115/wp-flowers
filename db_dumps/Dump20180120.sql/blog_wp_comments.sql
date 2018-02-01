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
-- Table structure for table `wp_comments`
--

DROP TABLE IF EXISTS `wp_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10)),
  KEY `woo_idx_comment_type` (`comment_type`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_comments`
--

LOCK TABLES `wp_comments` WRITE;
/*!40000 ALTER TABLE `wp_comments` DISABLE KEYS */;
INSERT INTO `wp_comments` VALUES (1,1,'A WordPress Commenter','wapuu@wordpress.example','https://wordpress.org/','','2018-01-02 07:09:05','2018-01-02 07:09:05','Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com\">Gravatar</a>.',0,'1','','',0,0),(2,2253,'admin','tungpk@cmsmart.net','','117.4.252.165','2016-04-19 10:25:55','2016-04-19 10:25:55','test',0,'1','','',0,0),(3,2255,'jesse','jesse@gmail.com','http://netbaseteam.com','192.168.9.21','2016-08-25 09:47:57','2016-08-25 09:47:57','Nunc eleifend nulla vel orci. Donec sollicitudin. Phasellus urna. Sed sit amet nisi tincidunt quam porta placerat. Phasellus sit amet metus et neque tincidunt porta. Mauris lorem lorem, faucibus sit amet, lobortis non, eleifend eget, massa. Duis odio massa, condimentum sed, fringilla quis, tincidunt quis, mi. Proin et diam. Fusce tortor metus, imperdiet at, vestibulum sed, feugiat et, erat. Cras in tortor. Integer a dui.',0,'0','','',0,0),(4,2257,'admin','thanhtungvqsd@gmail.com','','192.168.9.17','2016-08-25 02:37:46','2016-08-25 02:37:46','i have feedback!',0,'1','','',0,0),(5,2257,'decifupaga','uwouvouwe@newmail.printemailtext.com','http://online-viagracanada.net/','91.200.12.143','2017-04-22 21:45:06','2017-04-22 21:45:06','http://usa-onlineprednisone.net/ - usa-onlineprednisone.net.ankor <a href=\\\"http://salbutamol-ventolin-buy.net/\\\" rel=\\\"nofollow\\\">salbutamol-ventolin-buy.net.ankor</a> http://online-viagracanada.net/',0,'0','','',0,0),(6,2257,'esezjad','eocoyokku@newmail.printemailtext.com','http://online-viagracanada.net/','91.200.12.143','2017-04-22 22:06:49','2017-04-22 22:06:49','http://usa-onlineprednisone.net/ - usa-onlineprednisone.net.ankor <a href=\\\"http://salbutamol-ventolin-buy.net/\\\" rel=\\\"nofollow\\\">salbutamol-ventolin-buy.net.ankor</a> http://online-viagracanada.net/',0,'0','','',0,0),(7,2782,'jesse','jesse@gmail.com','http://netbaseteam.com','192.168.9.21','2016-08-24 09:22:17','2016-08-24 09:22:17','Nunc eleifend nulla vel orci. Donec sollicitudin. Phasellus urna. Sed sit amet nisi tincidunt quam porta placerat. Phasellus sit amet metus et neque tincidunt porta. Mauris lorem lorem, faucibus sit amet, lobortis non, eleifend eget, massa. Duis odio massa, condimentum sed, fringilla quis, tincidunt quis, mi. Proin et diam. Fusce tortor metus, imperdiet at, vestibulum sed, feugiat et, erat. Cras in tortor. Integer a dui.',0,'0','','',0,0),(8,4770,'sâsa','thuyha221094@gmail.com','http://zsaasas','192.168.9.21','2017-08-08 01:35:34','2017-08-08 01:35:34','xsaaasas',0,'0','','',0,0),(9,4776,'Thuy Ha','thuyha221094@gmail.com','','192.168.9.21','2017-07-27 04:02:09','2017-07-27 04:02:09','good',0,'1','','',0,0),(10,2253,'thuyha','thuyha221094@gmail.com','http://thuyha','192.168.9.21','2017-08-09 09:34:10','2017-08-09 09:34:10','thuyha',0,'0','','',0,0),(11,50,'admin','tungpk@cmsmart.net','','::1','2016-04-09 04:47:51','2016-04-09 04:47:51','Business Postcard Template',0,'1','','',0,0),(12,54,'admin','tungpk@cmsmart.net','','::1','2016-04-09 04:42:11','2016-04-09 04:42:11','sf',0,'1','','',0,0),(13,55,'admin','tungpk@cmsmart.net','','::1','2016-04-12 02:20:16','2016-04-12 02:20:16','dsfsf',0,'1','','',0,0),(14,2141,'jesse','jesse@gmail.com','','192.168.9.21','2016-06-28 10:01:07','2016-06-28 10:01:07','Test',0,'0','','',0,0),(15,2141,'admin','thanhtungvqsd@gmail.com','','192.168.9.17','2016-09-20 09:51:07','2016-09-20 09:51:07','i like it !',0,'1','','',0,0),(16,2224,'admin','thanhtungvqsd@gmail.com','','192.168.9.17','2016-09-20 09:49:14','2016-09-20 09:49:14','good!',0,'1','','',0,0),(17,3335,'hanh le','hanh@gmail.com','','192.168.9.21','2016-08-26 04:21:47','2016-08-26 04:21:47','It is beautiful',0,'0','','',0,0),(18,3335,'admin','thanhtungvqsd@gmail.com','','192.168.9.17','2016-09-20 09:50:34','2016-09-20 09:50:34','great!',0,'1','','',0,0),(19,3815,'admin','thanhtungvqsd@gmail.com','','192.168.9.17','2016-07-20 08:19:25','2016-07-20 08:19:25','i like this product',0,'1','','',0,0),(20,4027,'jesse','jesse@gmail.com','','192.168.9.21','2016-09-20 07:05:31','2016-09-20 07:05:31','The product is beautiful',0,'0','','',0,0),(21,4110,'admin','thanhtungvqsd@gmail.com','','192.168.9.17','2016-08-27 04:10:44','2016-08-27 04:10:44','like this product',0,'1','','',0,0),(22,4120,'Netbase Team','netbase@cmsmart.net','http://netbasejsc.com/','192.168.9.168','2017-02-28 02:20:33','2017-02-28 02:20:33','Good !',0,'1','','',0,0),(23,4138,'Netbase Team','netbase@cmsmart.net','http://netbasejsc.com/','192.168.9.168','2017-02-16 02:08:49','2017-02-16 02:08:49','Good!',0,'1','','',0,0),(24,4141,'Netbase Team','netbase@cmsmart.net','http://netbasejsc.com/','192.168.9.168','2017-02-16 02:06:58','2017-02-16 02:06:58','Great!',0,'1','','',0,0),(25,4177,'admin','thanhtungvqsd@gmail.com','','192.168.9.17','2016-09-07 08:47:25','2016-09-07 08:47:25','Good!',0,'1','','',0,0),(26,4179,'admin','thanhtungvqsd@gmail.com','','192.168.9.17','2016-09-06 03:05:52','2016-09-06 03:05:52','Great',0,'1','','',0,0),(27,4181,'admin','thanhtungvqsd@gmail.com','','192.168.9.17','2016-09-06 05:04:19','2016-09-06 05:04:19','good!',0,'1','','',0,0),(28,4183,'admin','thanhtungvqsd@gmail.com','','192.168.9.17','2016-09-06 04:07:20','2016-09-06 04:07:20','great!',0,'1','','',0,0),(29,4183,'FlossieSchef','darrylmccoll@aol.com','','189.15.188.35','2017-03-29 02:24:23','2017-03-29 02:24:23','I see your page needs some unique &amp; fresh articles. Writing manually is time consuming, but there is solution for this hard task. Just search for; Miftolo\\\'s tools rewriter',0,'0','','',0,0),(30,3817,'WooCommerce','woocommerce@192.168.9.17','','','2016-07-20 08:06:06','2016-07-20 08:06:06','Awaiting check payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(31,4232,'WooCommerce','woocommerce@192.168.9.17','','','2016-08-26 07:57:13','2016-08-26 07:57:13','Awaiting check payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(32,4233,'WooCommerce','woocommerce@192.168.9.17','','','2016-08-27 02:26:35','2016-08-27 02:26:35','Awaiting check payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(33,4234,'WooCommerce','woocommerce@192.168.9.17','','','2016-08-29 05:01:15','2016-08-29 05:01:15','Awaiting check payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(34,4535,'WooCommerce','woocommerce@192.168.9.17','','','2016-09-20 10:01:00','2016-09-20 10:01:00','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(35,4586,'WooCommerce','woocommerce@192.168.9.17','','','2016-09-27 02:53:08','2016-09-27 02:53:08','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(36,4587,'WooCommerce','woocommerce@192.168.9.17','','','2016-09-27 02:55:27','2016-09-27 02:55:27','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(37,4609,'WooCommerce','woocommerce@demo7.cmsmart.net','','','2016-11-03 03:44:19','2016-11-03 03:44:19','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(38,4630,'WooCommerce','woocommerce@demo7.cmsmart.net','','','2016-12-02 01:59:20','2016-12-02 01:59:20','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(39,4637,'WooCommerce','woocommerce@demo7.cmsmart.net','','','2016-12-29 14:06:17','2016-12-29 14:06:17','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(40,4640,'WooCommerce','woocommerce@demo7.cmsmart.net','','','2017-01-17 01:51:04','2017-01-17 01:51:04','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(41,4828,'WooCommerce','woocommerce@192.168.9.168','','','2017-02-22 07:11:15','2017-02-22 07:11:15','Awaiting check payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(42,4829,'WooCommerce','woocommerce@192.168.9.168','','','2017-02-22 07:12:53','2017-02-22 07:12:53','Awaiting check payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(43,4897,'WooCommerce','woocommerce@192.168.9.168','','','2017-03-01 09:41:29','2017-03-01 09:41:29','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(44,4900,'WooCommerce','woocommerce@192.168.9.168','','','2017-03-02 04:15:52','2017-03-02 04:15:52','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(45,4905,'WooCommerce','woocommerce@192.168.9.168','','','2017-03-02 06:57:40','2017-03-02 06:57:40','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(46,4918,'WooCommerce','woocommerce@demo7.cmsmart.net','','','2017-03-07 03:28:57','2017-03-07 03:28:57','Awaiting check payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(47,4638,'WooCommerce','woocommerce@demo7.cmsmart.net','','','2017-01-04 10:38:44','2017-01-04 10:38:44','Payment to be made upon delivery. Order status changed from Pending Payment to Processing.',0,'1','','order_note',0,0),(48,4922,'WooCommerce','woocommerce@demo7.cmsmart.net','','','2017-03-15 18:40:02','2017-03-15 18:40:02','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(49,4927,'WooCommerce','woocommerce@demo7.cmsmart.net','','','2017-03-28 01:29:49','2017-03-28 01:29:49','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(50,4928,'WooCommerce','woocommerce@demo7.cmsmart.net','','','2017-03-29 14:11:46','2017-03-29 14:11:46','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(51,4931,'WooCommerce','woocommerce@demo7.cmsmart.net','','','2017-04-10 03:27:47','2017-04-10 03:27:47','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(52,4932,'WooCommerce','woocommerce@demo7.cmsmart.net','','','2017-04-10 20:24:22','2017-04-10 20:24:22','Awaiting BACS payment Order status changed from Pending Payment to On Hold.',0,'1','','order_note',0,0),(53,5319,'WooCommerce','','','','2018-01-07 22:30:21','2018-01-07 20:30:21','Awaiting check payment Order status changed from Pending payment to On hold.',0,'1','WooCommerce','order_note',0,0);
/*!40000 ALTER TABLE `wp_comments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-20 11:46:17
