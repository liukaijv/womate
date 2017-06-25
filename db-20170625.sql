-- MySQL dump 10.14  Distrib 5.5.44-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: womate
-- ------------------------------------------------------
-- Server version	5.5.44-MariaDB-log

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
-- Table structure for table `ad_positions`
--

DROP TABLE IF EXISTS `ad_positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad_positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `is_blank` tinyint(1) NOT NULL DEFAULT '0',
  `system_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad_positions`
--

LOCK TABLES `ad_positions` WRITE;
/*!40000 ALTER TABLE `ad_positions` DISABLE KEYS */;
INSERT INTO `ad_positions` VALUES (1,'首页banner',1920,520,0,1,'2017-03-12 04:44:09','2017-03-12 04:44:09'),(2,'内页banner',1920,600,0,1,'2017-03-12 04:44:09','2017-03-12 04:44:09');
/*!40000 ALTER TABLE `ad_positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_name_unique` (`name`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','89016230@qq.com','$2y$10$XjGpqiul.mk7ADJOfpTcyukeCcsT89YOGxEaxTsaUlSs.t9ZUBvSu',NULL,1,NULL,'2017-03-12 04:44:09','2017-03-12 04:44:09');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '255',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ads`
--

LOCK TABLES `ads` WRITE;
/*!40000 ALTER TABLE `ads` DISABLE KEYS */;
INSERT INTO `ads` VALUES (1,1,'','','uploads/ad/2017031307052158c644b1c14b5.jpg','/',255,'2017-03-12 04:44:09','2017-03-12 23:38:05'),(4,1,'','','uploads/ad/2017031307521058c64faa73590.jpg','',255,'2017-03-12 23:02:21','2017-03-12 23:52:11');
/*!40000 ALTER TABLE `ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,NULL,'小郭','15680766916','我要打扫房间','2017-03-12 04:44:09','2017-03-12 04:44:09');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (15,'2014_10_12_000000_create_users_table',1),(16,'2014_10_12_100000_create_password_resets_table',1),(17,'2017_01_14_052330_create_admins_table',1),(18,'2017_01_14_091714_create_pages_table',1),(19,'2017_01_14_091719_create_post_catalogs_table',1),(20,'2017_01_14_091723_create_posts_table',1),(21,'2017_01_14_091848_create_product_catalogs_table',1),(22,'2017_01_14_091859_create_products_table',1),(23,'2017_01_14_091911_create_menus_table',1),(24,'2017_02_08_113507_create_recruit_table',1),(25,'2017_02_09_052634_create_ad_positions_table',1),(26,'2017_02_09_052642_create_ads_table',1),(27,'2017_03_12_041330_create_settings_table',1),(28,'2017_03_12_054638_create_feedback_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `in_sidebar` tinyint(1) NOT NULL DEFAULT '1',
  `system_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_catalogs`
--

DROP TABLE IF EXISTS `post_catalogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_catalogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `system_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_catalogs`
--

LOCK TABLES `post_catalogs` WRITE;
/*!40000 ALTER TABLE `post_catalogs` DISABLE KEYS */;
INSERT INTO `post_catalogs` VALUES (1,0,'企业动态','Consequuntur in non soluta nostrum veritatis voluptatem corporis. Sunt neque provident dolor beatae nam iste laborum. Sint perferendis enim deserunt rem harum eos.',0,1,'2017-03-12 04:44:09','2017-03-12 04:44:09'),(2,0,'行业动态','Ut voluptas quos ut magnam cumque iure natus sint. Sint officia cum ut similique ut. Unde omnis a exercitationem nam hic voluptates.',0,1,'2017-03-12 04:44:09','2017-03-12 04:44:09'),(3,0,'帮助中心','商家名称：厦门沃玛特清洁\r\n联  系  人：贺经理\r\n电子邮箱：18054824961@qq.com\r\n联系电话：18054824961\r\n联系电话：13950130791\r\nQ        Q：\r\n联系地址：厦门湖里双十钟宅村\r\n服务区域： 厦门\r\n',0,1,'2017-03-12 04:44:09','2017-03-12 23:15:22');
/*!40000 ALTER TABLE `post_catalogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catalog_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `cover_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `is_recommend` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_catalogs`
--

DROP TABLE IF EXISTS `product_catalogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_catalogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_catalogs`
--

LOCK TABLES `product_catalogs` WRITE;
/*!40000 ALTER TABLE `product_catalogs` DISABLE KEYS */;
INSERT INTO `product_catalogs` VALUES (1,0,'家庭保洁','2017-03-12 04:44:09','2017-03-12 04:44:09'),(2,0,'搬家搬厂','2017-03-12 04:44:09','2017-03-12 04:44:09'),(3,0,'家电洗修拆','2017-03-12 04:44:09','2017-03-12 04:44:09'),(4,0,'洗涤维护','2017-03-12 04:44:09','2017-03-12 04:44:09'),(5,0,'外墙清洗','2017-03-12 04:44:09','2017-03-12 04:44:09');
/*!40000 ALTER TABLE `product_catalogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `price_display` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscription` int(11) DEFAULT NULL,
  `options` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `cover_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '255',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `is_recommend` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'工程保洁',5,'Ut sed animi illo.',0,'',0,'{\"\\u5458\\u5de5\\u7c7b\\u522b\":\"\\u4f18\\u79c0\",\"\\u987e\\u5ba2\\u6ee1\\u610f\\u7387\":\"99%\"}','<p><span style=\"color:#ff0000\"><strong>外墙幕墙清洗</strong></span>、各类房屋的室内外涂料粉刷。</p>','uploads/post/2017031307174958c6479d1fa3d.jpg',255,0,0,'2017-03-12 04:44:09','2017-03-12 23:35:57'),(4,'家庭保洁',1,'',0,'',0,'{\"\\u5458\\u5de5\\u7c7b\\u522b\":\"\\u4f18\\u79c0\",\"\\u987e\\u5ba2\\u6ee1\\u610f\\u7387\":\"99%\"}','<p>家庭保洁标准：<br/>玻璃：目视无水痕、无手印、洁净光亮；框缝无尘土、洁净；窗台下手摸光滑无尘土。<br/>卫生间：无杂物、无污渍、洁具触摸光滑、有光泽、无异味。 厨房：无杂物、无污渍、瓷砖表面洁净，手摸光滑，有光泽。<br/>卧室及大厅：墙壁手摸光滑、无尘土，开关盒、排风口、空调出风口等无尘土、无污渍，灯具洁净。<br/>门及框：手摸光滑、无污渍、沿口处无尘土，无死角，有光泽。<br/>地面：无尘土、无污渍、地板光滑有光泽，石材光亮。<br/>地角线：无尘土、洁净、无胶渍。</p>','uploads/post/2017031307194458c6481032d7e.jpg',255,0,0,'2017-03-12 04:44:09','2017-03-12 23:35:14'),(7,'外墙清洗',5,'工程保洁',0,'',0,'{\"\\u5458\\u5de5\\u7c7b\\u522b\":\"\\u4f18\\u79c0\",\"\\u987e\\u5ba2\\u6ee1\\u610f\\u7387\":\"99%\"}','<p>清洁标准：<br/>　　 洁净、无灰尘、无污点、无油渍，以客户验收、签字为标准。<br/>备注：保洁员统一着装、使用一次性新毛巾、一次性鞋套、所使用设备、工具经过消毒处理、专人负责现场服务全过程</p>','uploads/post/2017031310002558c66db932cee.jpg',255,0,0,'2017-03-12 04:44:09','2017-03-13 02:00:29'),(11,'家庭保洁',3,'',0,'',0,'{\"\\u5458\\u5de5\\u7c7b\\u522b\":\"\\u4f18\\u79c0\",\"\\u987e\\u5ba2\\u6ee1\\u610f\\u7387\":\"99%\"}','<p>广告牌清洗和<a style=\"color: rgb(75, 75, 75); text-decoration: none;\" href=\"http://www.kmjqj.com/\">外墙清洗</a>一 样，广告牌的清洗也是一件高风险，高技术的清洁工作，广告牌的清洗也有很多需要注意的细节：清洁时向下的速度不要太快，以免漏水，产生水印，影响清洁效 果。广告牌的质地不同，有些酸性、碱性太强的清洁剂不宜滥用。4级以上风力天气不宜作业。为了安全起见，广告牌清洗时采取相应的保护措施(如：彻底切断电 源，系上安全带等)。厦门沃玛特清洁服务公司是一家合法的上海<a style=\"color: rgb(75, 75, 75); text-decoration: none;\" href=\"http://www.kmjqj.com/\">清洁公司</a>，具有丰富的广告牌清洗保洁经验，是您值得依赖的好帮手。</p>','uploads/post/2017031307234558c6490101490.jpg',255,0,0,'2017-03-12 04:44:09','2017-03-12 23:36:19'),(14,'地毯清洗',1,'',0,'',0,'{\"\\u5458\\u5de5\\u7c7b\\u522b\":\"\\u4f18\\u79c0\",\"\\u987e\\u5ba2\\u6ee1\\u610f\\u7387\":\"99%\"}','<p>精保洁是对开荒保洁的再一次巩固，再开荒保洁的基础上做好精保洁，能更好的体现房产的本身价值，让业主放心的拥有，安心的享受开发商为他们提供的洁净、舒 适的环境。开荒保洁是着重处理大面上由于装修遗留下的污渍、垃圾、灰尘等，精保洁是在开荒保洁基础上，对房间进行的再一次保洁，所注重之处在细节上，虽然 做过了开荒保洁，但仍会一些浮尘落下，所以精保洁仍需全面清洁。</p>','uploads/post/2017031307251358c6495962ace.jpg',255,0,0,'2017-03-12 04:44:09','2017-03-12 23:36:41'),(15,'物业保洁',5,'',0,'',0,'{\"\\u5458\\u5de5\\u7c7b\\u522b\":\"\\u4f18\\u79c0\",\"\\u987e\\u5ba2\\u6ee1\\u610f\\u7387\":\"99%\"}','<p><span style=\"font-family: 宋体; font-size: 13px; background-color: white;\">玻璃的标准：目视无水痕、无手印、无污渍、光亮洁净。&nbsp;<br/>卫生间的标准：墙体无色差、无明显污渍、无涂料点、无胶迹、洁具洁净光亮、不锈钢管件光亮洁净、地面无死角、无遗漏、无异味。<br/> 厨房标准：墙体无色差、无明显污渍、无涂料点、无胶迹、不锈钢管件光亮洁净、地面无死角、无遗漏。<br/> 卧室及大厅标准：墙壁无尘土，灯具洁净，开关盒洁净无胶渍，排风口、空调出风口无灰尘、无胶点；<br/> 门及框标准：无胶渍、无漆点、触摸光滑、有光泽，门沿上无尘土。<br/> 地面的标准：木地板无胶渍、洁净；瓷砖无尘土、无漆点、无水泥渍、有光泽；石材无污渍、无胶点、光泽度高。</span></p>','uploads/post/2017031307255758c649851f507.jpg',255,0,0,'2017-03-12 04:44:09','2017-03-12 23:37:10');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recruits`
--

DROP TABLE IF EXISTS `recruits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recruits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recruits`
--

LOCK TABLES `recruits` WRITE;
/*!40000 ALTER TABLE `recruits` DISABLE KEYS */;
/*!40000 ALTER TABLE `recruits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site_title','沃玛特清洁服务'),(2,'site_keywords','外墙清洗，家庭保洁，物业保洁，开荒保洁，石材护理，高空保洁，地毯清洗'),(3,'site_description','沃玛特服务产业有限公司是一家将英式管家服务引入企业，并结合中国国情创立的御侍管家服务公司。'),(4,'site_status','1'),(5,'offline_reason','网站维护中'),(6,'upload_dir','uploads'),(7,'qq','865329456'),(8,'email','865329456@qq.com'),(9,'mobile','13950130791'),(10,'company_intro','沃玛特服务产业有限公司是一家将英式管家服务引入企业，并结合中国国情创立的御侍管家服务公司。'),(11,'footer_info','Copyright © 沃玛特清洁服务, 2016. All Rights Reserved.'),(12,'address','厦门市思明区黄厝村茂后159号沃玛特（厦门）清洁服务有限公司'),(13,'sina_weibo','/'),(14,'tencent_weibo','/');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2017-06-25 21:06:46
