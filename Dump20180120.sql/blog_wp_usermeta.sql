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
-- Table structure for table `wp_usermeta`
--

DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_usermeta`
--

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'nickname','root'),(2,1,'first_name','gfds'),(3,1,'last_name','gfdg'),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'syntax_highlighting','true'),(7,1,'comment_shortcuts','false'),(8,1,'admin_color','fresh'),(9,1,'use_ssl','0'),(10,1,'show_admin_bar_front','true'),(11,1,'locale',''),(12,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(13,1,'wp_user_level','10'),(14,1,'dismissed_wp_pointers','theme_editor_notice,plugin_editor_notice,text_widget_custom_html'),(15,1,'show_welcome_panel','1'),(16,1,'session_tokens','a:2:{s:64:\"b56ed9db196bd39aa0b67ab808c53427040e0d785ff1ba9836dd2f1a18efa505\";a:4:{s:10:\"expiration\";i:1516086565;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:104:\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.62 Safari/537.36\";s:5:\"login\";i:1514876965;}s:64:\"55e051f72ad6b269a3e416f92f765aa55800da293dfe91e3d10c616dd50b561e\";a:4:{s:10:\"expiration\";i:1516361681;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36\";s:5:\"login\";i:1515152081;}}'),(17,1,'wp_dashboard_quick_press_last_post_id','5333'),(18,1,'community-events-location','a:1:{s:2:\"ip\";s:2:\"::\";}'),(20,1,'nav_menu_recently_edited','14'),(21,1,'managenav-menuscolumnshidden','a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),(22,1,'metaboxhidden_nav-menus','a:6:{i:0;s:18:\"mega_menu_meta_box\";i:1;s:21:\"add-post-type-product\";i:2;s:26:\"add-post-type-home-service\";i:3;s:12:\"add-post_tag\";i:4;s:15:\"add-product_cat\";i:5;s:15:\"add-product_tag\";}'),(23,1,'jetpack_tracks_anon_id','jetpack:Aa2Utx9m/87v8RWnY7NJsy/L'),(24,1,'wp_user-settings','libraryContent=browse&editor=html'),(25,1,'wp_user-settings-time','1515360302'),(26,1,'last_update','1515357018'),(27,1,'billing_first_name','gfds'),(28,1,'billing_last_name','gfdg'),(29,1,'billing_address_1','gfsd'),(30,1,'billing_address_2','gfsd'),(31,1,'billing_city','fdgsdf'),(32,1,'billing_postcode','5432543'),(33,1,'billing_country','IL'),(34,1,'billing_email','taltal115@gmail.com'),(35,1,'billing_phone','546546848'),(36,1,'shipping_first_name','gfds'),(37,1,'shipping_last_name','gfdg'),(38,1,'shipping_address_1','gfsd'),(39,1,'shipping_address_2','gfsd'),(40,1,'shipping_city','fdgsdf'),(41,1,'shipping_postcode','5432543'),(42,1,'shipping_country','IL'),(44,1,'shipping_method','a:1:{i:0;s:11:\"flat_rate:1\";}'),(46,1,'_woocommerce_persistent_cart_1','a:1:{s:4:\"cart\";a:0:{}}');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-20 11:46:19
