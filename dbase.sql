-- MySQL dump 10.16  Distrib 10.2.13-MariaDB, for osx10.13 (x86_64)
--
-- Host: 127.0.0.1    Database: gift
-- ------------------------------------------------------
-- Server version	10.3.9-MariaDB-1:10.3.9+maria~bionic

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
-- Table structure for table `baseprices`
--

DROP TABLE IF EXISTS `baseprices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baseprices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL DEFAULT 1,
  `purchase_price` decimal(6,2) NOT NULL,
  `base_pice` decimal(6,2) NOT NULL,
  `active_from` date DEFAULT NULL,
  `active_till` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-iid-baseprices` (`iid`),
  CONSTRAINT `fk-iid-baseprices` FOREIGN KEY (`iid`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baseprices`
--

LOCK TABLES `baseprices` WRITE;
/*!40000 ALTER TABLE `baseprices` DISABLE KEYS */;
INSERT INTO `baseprices` VALUES (1,1,1500.00,2000.00,'2018-10-25','2018-10-31');
/*!40000 ALTER TABLE `baseprices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citys`
--

DROP TABLE IF EXISTS `citys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_city_cpu` (`cpu`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citys`
--

LOCK TABLES `citys` WRITE;
/*!40000 ALTER TABLE `citys` DISABLE KEYS */;
INSERT INTO `citys` VALUES (1,4000,'Волгоград','volgograd','город Волгоград, волгоградской области.'),(2,6100,'Киров','kirov','город Киров, кировской  области.'),(3,4238,'Набережные челны','naberegnye_chelny','г. Набережные Челны, республика Татарстан.'),(6,300,'Киров','kkirov ','киров'),(7,300,'Камышин','kamysgin','г Камышин'),(8,7000,'Москва','moscow','г. Москва');
/*!40000 ALTER TABLE `citys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliverys`
--

DROP TABLE IF EXISTS `deliverys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deliverys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` decimal(6,2) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliverys`
--

LOCK TABLES `deliverys` WRITE;
/*!40000 ALTER TABLE `deliverys` DISABLE KEYS */;
INSERT INTO `deliverys` VALUES (1,123.00,'Первая доставочная компания. '),(2,256.00,'second service');
/*!40000 ALTER TABLE `deliverys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliverytocitys`
--

DROP TABLE IF EXISTS `deliverytocitys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deliverytocitys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `did` int(11) NOT NULL DEFAULT 1,
  `cid` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk-did-deliverytocitys` (`did`),
  KEY `fk-iid-deliverytocitys` (`cid`),
  CONSTRAINT `fk-did-deliverytocitys` FOREIGN KEY (`did`) REFERENCES `deliverys` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-iid-deliverytocitys` FOREIGN KEY (`cid`) REFERENCES `citys` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliverytocitys`
--

LOCK TABLES `deliverytocitys` WRITE;
/*!40000 ALTER TABLE `deliverytocitys` DISABLE KEYS */;
INSERT INTO `deliverytocitys` VALUES (17,1,6),(18,2,6),(19,2,1),(23,1,2),(24,1,3),(25,1,7);
/*!40000 ALTER TABLE `deliverytocitys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL DEFAULT 1,
  `discount` float DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `start_at` date DEFAULT NULL,
  `stop_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-iid-district` (`iid`),
  CONSTRAINT `fk-iid-district` FOREIGN KEY (`iid`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts`
--

LOCK TABLES `discounts` WRITE;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-cid-district` (`cid`),
  CONSTRAINT `fk-cid-district` FOREIGN KEY (`cid`) REFERENCES `citys` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` VALUES (1,1,'Красноармейский','-'),(2,1,'Кировский','-'),(3,2,'Центральный','-');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fbacks`
--

DROP TABLE IF EXISTS `fbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL DEFAULT 1,
  `oid` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `fbacks` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk-iid-fbacks` (`iid`),
  CONSTRAINT `fk-iid-fbacks` FOREIGN KEY (`iid`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fbacks`
--

LOCK TABLES `fbacks` WRITE;
/*!40000 ALTER TABLE `fbacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `fbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fcategorys`
--

DROP TABLE IF EXISTS `fcategorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fcategorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_category_cpu` (`cpu`),
  FULLTEXT KEY `cpu_categorys` (`cpu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fcategorys`
--

LOCK TABLES `fcategorys` WRITE;
/*!40000 ALTER TABLE `fcategorys` DISABLE KEYS */;
INSERT INTO `fcategorys` VALUES (1,'Мужчины','male','Подарки для мужчин','--'),(2,'Женщины','famele','Подарки для прекрасных дам.','--'),(3,'Дети','children','Подарки для детей.','--');
/*!40000 ALTER TABLE `fcategorys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL DEFAULT 1,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `main` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-iid-images` (`iid`),
  CONSTRAINT `fk-iid-images` FOREIGN KEY (`iid`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,1,'walking_death1','walking_death.png',1),(2,2,'new_year','new_year.png',0);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fcid` int(11) NOT NULL DEFAULT 1,
  `scid` int(11) NOT NULL DEFAULT 1,
  `vid` int(11) NOT NULL DEFAULT 1,
  `exid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lifetime` int(11) NOT NULL DEFAULT 1,
  `rank` int(11) NOT NULL DEFAULT 1,
  `phisical` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_item_cpu` (`cpu`),
  KEY `items_fcid` (`fcid`),
  KEY `items_scid` (`scid`),
  KEY `items_vid` (`vid`),
  CONSTRAINT `fk-items-fcategory` FOREIGN KEY (`fcid`) REFERENCES `fcategorys` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-items-scategory` FOREIGN KEY (`scid`) REFERENCES `scategorys` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-items-vender` FOREIGN KEY (`vid`) REFERENCES `venders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,1,1,1,'Ходячие мертвецы','Ходячие мертвецы','Walking_Dead','Это квест. У него есть возрастные ограничения.','Это квест. У него есть возрастные ограничения.Это квест. У него есть возрастные ограничения.Это квест. У него есть возрастные ограничения.Это квест. У него есть возрастные ограничения.Это квест. У него есть возрастные ограничения.Это квест. У него есть возрастные ограничения.Это квест. У него есть возрастные ограничения.Это квест. У него есть возрастные ограничения.Это квест. У него есть возрастные ограничения.Это квест. У него есть возрастные ограничения.Это квест. У него есть возрастные ограничения.',90,5,0),(2,1,1,1,'Новый год','Новый год','newyear','New year ','New year quest.',90,5,0),(3,1,1,2,'Крутой заезд.','Крутой заезд.','cool_race','Захватывающая гонка на картингах на четверых. Победитель получает кубок. ','Это захватывающая гонка на мощных картах, которая останется в вашей памяти на долго.7',90,0,0),(4,2,2,3,'Масаж горячими камнями.','Масаж горячими камнями.','massage','Масаж горячими камнями.','Офигенный масаж горячими кирпичами из печки. ',90,5,0),(5,3,2,1,'Загадки сказочного леса. Квест.','Загадки сказочного леса. Квест.','quiz_magic_forest','Краткое описание квеста.','Длинное описание детского квеста. Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.Длинное описание детского квеста.',90,0,0);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1540225673),('m181018_175525_fcategorys',1540225675),('m181018_183810_scategorys',1540225675),('m181018_194111_vendors',1540225675),('m181020_171051_items',1540225675),('m181020_172647_sizes',1540225675),('m181020_174837_venderscontacts',1540225675),('m181020_180106_baseprices',1540225675),('m181020_180814_images',1540225675),('m181020_181330_fbacks',1540225675),('m181020_183442_delivery',1540225675),('m181020_184147_citys',1540225675),('m181020_185300_districts',1540225675),('m181020_190037_discounts',1540225675),('m181020_190537_vendertocity',1540225675),('m181020_190933_deliverytoitems',1540225675);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scategorys`
--

DROP TABLE IF EXISTS `scategorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scategorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_category_cpu` (`cpu`),
  FULLTEXT KEY `cpu_categorys` (`cpu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scategorys`
--

LOCK TABLES `scategorys` WRITE;
/*!40000 ALTER TABLE `scategorys` DISABLE KEYS */;
INSERT INTO `scategorys` VALUES (1,'Яркие впечатления','vpechatlrnia','Прыжок с парашютом, полет на самолете или что-то в этом роде','--'),(2,'Отдых','relax','Все что связано с отдыхом.','--');
/*!40000 ALTER TABLE `scategorys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL DEFAULT 1,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `weigth` decimal(3,2) NOT NULL,
  `width` decimal(3,2) NOT NULL,
  `height` decimal(3,2) NOT NULL,
  `length` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iid` (`iid`),
  CONSTRAINT `fk-iid-sizes` FOREIGN KEY (`iid`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sizes`
--

LOCK TABLES `sizes` WRITE;
/*!40000 ALTER TABLE `sizes` DISABLE KEYS */;
INSERT INTO `sizes` VALUES (1,3,'1',1.00,1.00,1.00,1.00);
/*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendercontacts`
--

DROP TABLE IF EXISTS `vendercontacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendercontacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_vid` (`vid`),
  CONSTRAINT `fk-vendercontacts-vender` FOREIGN KEY (`vid`) REFERENCES `venders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendercontacts`
--

LOCK TABLES `vendercontacts` WRITE;
/*!40000 ALTER TABLE `vendercontacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendercontacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venders`
--

DROP TABLE IF EXISTS `venders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venders`
--

LOCK TABLES `venders` WRITE;
/*!40000 ALTER TABLE `venders` DISABLE KEYS */;
INSERT INTO `venders` VALUES (1,'квеструм','г. Набережные челны, пр. Сююмбике, 34','--','Классные позитивные ребята.'),(2,'картадром','ул.  Камаз мастер',' -','Это вендер у которого можно покататься на картингах. '),(3,'СПА Салон Вера','пр. Ленина, 6',' -','Салон СПА для прекрасных дам. '),(4,'Стрелковый клуб Снайпер','г. Набережные челны, пр. Сююмбике, 34','-','Описание стрелкового клуба снайпер. ');
/*!40000 ALTER TABLE `venders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendertocity`
--

DROP TABLE IF EXISTS `vendertocity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendertocity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` int(11) NOT NULL DEFAULT 1,
  `cid` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk-vid-vendertocity` (`vid`),
  KEY `fk-cid-vendertocity` (`cid`),
  CONSTRAINT `fk-cid-vendertocity` FOREIGN KEY (`cid`) REFERENCES `citys` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-vid-vendertocity` FOREIGN KEY (`vid`) REFERENCES `venders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendertocity`
--

LOCK TABLES `vendertocity` WRITE;
/*!40000 ALTER TABLE `vendertocity` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendertocity` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-04  9:49:56
