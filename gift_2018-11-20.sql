# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.5.5-10.3.9-MariaDB-1:10.3.9+maria~bionic)
# Схема: gift
# Время создания: 2018-11-20 18:26:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы baseprices
# ------------------------------------------------------------

DROP TABLE IF EXISTS `baseprices`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `baseprices` WRITE;
/*!40000 ALTER TABLE `baseprices` DISABLE KEYS */;

INSERT INTO `baseprices` (`id`, `iid`, `purchase_price`, `base_pice`, `active_from`, `active_till`)
VALUES
	(1,1,3000.00,4000.00,'2018-11-15','2018-12-31'),
	(2,3,2500.00,3250.00,'2018-11-15','2018-12-31'),
	(3,5,7000.00,9000.00,'2018-11-15','2018-12-31'),
	(4,6,3000.00,4000.00,'2018-11-15','2018-12-31'),
	(5,9,3500.00,5500.00,'2018-11-15','2018-12-31'),
	(6,10,4000.00,6000.00,'2018-11-15','2018-12-31');

/*!40000 ALTER TABLE `baseprices` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы citys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `citys`;

CREATE TABLE `citys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_city_cpu` (`cpu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `citys` WRITE;
/*!40000 ALTER TABLE `citys` DISABLE KEYS */;

INSERT INTO `citys` (`id`, `code`, `name`, `cpu`, `notes`)
VALUES
	(2,0,'Киров','Kirov','г. Киров кировской оласти.'),
	(3,0,'Набережные Челны','naberegnye_chelny','Город в республику Татарстан.');

/*!40000 ALTER TABLE `citys` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы deliverys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `deliverys`;

CREATE TABLE `deliverys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` decimal(6,2) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Дамп таблицы deliverytocitys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `deliverytocitys`;

CREATE TABLE `deliverytocitys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `did` int(11) NOT NULL DEFAULT 1,
  `cid` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk-did-deliverytocitys` (`did`),
  KEY `fk-iid-deliverytocitys` (`cid`),
  CONSTRAINT `fk-did-deliverytocitys` FOREIGN KEY (`did`) REFERENCES `deliverys` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-iid-deliverytocitys` FOREIGN KEY (`cid`) REFERENCES `citys` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Дамп таблицы discounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `discounts`;

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



# Дамп таблицы districts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `districts`;

CREATE TABLE `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-cid-district` (`cid`),
  CONSTRAINT `fk-cid-district` FOREIGN KEY (`cid`) REFERENCES `citys` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Дамп таблицы favorites
# ------------------------------------------------------------

DROP TABLE IF EXISTS `favorites`;

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `favid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iid` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk-iid-favorites` (`iid`),
  CONSTRAINT `fk-iid-favorites` FOREIGN KEY (`iid`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;

INSERT INTO `favorites` (`id`, `favid`, `iid`)
VALUES
	(14,'5bf1ac1791d0d',9),
	(16,'5bf1ac1791d0d',1);

/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы fbacks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fbacks`;

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



# Дамп таблицы fcategorys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fcategorys`;

CREATE TABLE `fcategorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_category_cpu` (`cpu`),
  FULLTEXT KEY `cpu_categorys` (`cpu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `fcategorys` WRITE;
/*!40000 ALTER TABLE `fcategorys` DISABLE KEYS */;

INSERT INTO `fcategorys` (`id`, `name`, `cpu`, `description`, `image`)
VALUES
	(1,' Девушкам.','fmail','Подарки для прекрасных дам. ','/img/category/female_1000.jpg'),
	(2,'Парням.','male','Подарки для сильной половины.','/img/category/male_1000.jpg'),
	(9,'Детям','children','Подарки для детей','/img/category/children_1000.jpg'),
	(10,'Родителям','parents','Для родителей.','/img/category/parents_1000.jpg'),
	(11,'Для компании','company','-','-');

/*!40000 ALTER TABLE `fcategorys` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL DEFAULT 1,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `main` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-iid-images` (`iid`),
  CONSTRAINT `fk-iid-images` FOREIGN KEY (`iid`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`id`, `iid`, `alt`, `path`, `main`)
VALUES
	(2,1,'','/img/products/silen-hill.jpg',1),
	(3,3,'','/img/products/master.jpg',1),
	(4,5,'','/img/products/romantic.jpg',1),
	(5,6,'','/img/products/mad-race.jpg',1),
	(8,9,'SPA','/img/products/spa-relax.png',1),
	(9,10,'fitnes','/img/products/fitness.jpg',1),
	(10,6,'-','/img/products/spa-relax.png	',NULL);

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;

INSERT INTO `items` (`id`, `fcid`, `scid`, `vid`, `exid`, `name`, `cpu`, `short_description`, `description`, `lifetime`, `rank`, `phisical`)
VALUES
	(1,1,1,1,'Квест Сайлент Хилл','Приключение \"Сайлент Хилл\" на 6-ть персон.','silent-hill','Это крутой и страшный квест.','Это полное описание крутого и классного квеста.',90,0,0),
	(3,1,1,1,'Хозяин','Страшное приключение на 4 персоны \"Хозяин\"','master','Участие в квесте: Где-то живет странный человек... каждый год на свой день рождения он делает себе подарок, живой подарок. И в очередной такой праздничный день новые трофеи оказались в заточении. Все участники ','Где-то живет странный человек... каждый год на свой день рождения он делает себе подарок, живой подарок. И в очередной такой праздничный день новые трофеи оказались в заточении. Все участники очнутся, не помня последних суток. Сыро, подвально, темно..\r\n',90,0,0),
	(5,1,1,1,'Романтик.','Романтический ужин на двоих на крыше.','romantic','Ужин на крыше дома с шикарным видом на реку. ','Ужин на крыше дома с шикарным видом на реку. ',90,0,0),
	(6,2,1,2,'Чумовой заезд 2','Чумовой заезд. Гонка на картингах для банды в 6-ть человек.','mad-raice','Гонка на картингах для банды в 6-ть человек. Три заезда по три минуты. Лучший получит кубок от заведения!','Гонка на картингах для банды в 6-ть человек. Три заезда по три минуты. Лучший получит кубок от заведения!Гонка на картингах для банды в 6-ть человек. Три заезда по три минуты. Лучший получит кубок от заведения!Гонка на картингах для банды в 6-ть человек. Три заезда по три минуты. Лучший получит кубок от заведения!',90,0,0),
	(9,1,1,3,'Релакс и красота.','Релакс и красота.','relax-and-buty','Это два часа СПА процедур в одном из самых профисиональных салонов города.','Это два часа СПА процедур в одном из самых профисиональных салонов города.',90,0,0),
	(10,1,1,4,'Пол года на здоровье.','Пол года на здоровье.','fitnes','Абонимент в фитнескоплекс на 3 мес.','Подарите три месяца здорового образа жизни для ваших родных и близких людей.',90,0,0);

/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы itemtofcats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `itemtofcats`;

CREATE TABLE `itemtofcats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL DEFAULT 1,
  `fcid` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk-iid-itemtofcats` (`iid`),
  KEY `fk-fcid-itemtofcats` (`fcid`),
  CONSTRAINT `fk-fcid-itemtofcats` FOREIGN KEY (`fcid`) REFERENCES `fcategorys` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-iid-itemtofcats` FOREIGN KEY (`iid`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `itemtofcats` WRITE;
/*!40000 ALTER TABLE `itemtofcats` DISABLE KEYS */;

INSERT INTO `itemtofcats` (`id`, `iid`, `fcid`)
VALUES
	(46,5,1),
	(47,5,2),
	(50,9,1),
	(51,9,10),
	(52,1,1),
	(53,1,2),
	(54,1,10),
	(55,1,11),
	(56,3,1),
	(57,3,2),
	(58,3,11),
	(59,6,1),
	(60,6,2),
	(61,6,11);

/*!40000 ALTER TABLE `itemtofcats` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы itemtoscats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `itemtoscats`;

CREATE TABLE `itemtoscats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL DEFAULT 1,
  `scid` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk-iid-itemtoscats` (`iid`),
  KEY `fk-fcid-itemtoscats` (`scid`),
  CONSTRAINT `fk-fcid-itemtoscats` FOREIGN KEY (`scid`) REFERENCES `scategorys` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-iid-itemtoscats` FOREIGN KEY (`iid`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `itemtoscats` WRITE;
/*!40000 ALTER TABLE `itemtoscats` DISABLE KEYS */;

INSERT INTO `itemtoscats` (`id`, `iid`, `scid`)
VALUES
	(14,5,2),
	(16,9,2),
	(17,1,1),
	(18,3,1),
	(19,6,1);

/*!40000 ALTER TABLE `itemtoscats` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;

INSERT INTO `migration` (`version`, `apply_time`)
VALUES
	('m000000_000000_base',1541879176),
	('m181018_170900_citys',1541879179),
	('m181018_175525_fcategorys',1541879179),
	('m181018_183810_scategorys',1541879179),
	('m181018_194111_vendors',1541879179),
	('m181020_171051_items',1541879180),
	('m181020_172647_sizes',1541879180),
	('m181020_174837_venderscontacts',1541879180),
	('m181020_180106_baseprices',1541879180),
	('m181020_180814_images',1541879180),
	('m181020_181330_fbacks',1541879180),
	('m181020_183442_delivery',1541879180),
	('m181020_185300_districts',1541879180),
	('m181020_190037_discounts',1541879180),
	('m181020_190933_deliverytoitems',1541879181),
	('m181111_185617_itemtofcats',1541963967),
	('m181111_190539_itemtoscats',1541966613),
	('m181118_145406_favorite',1542565306);

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы scategorys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `scategorys`;

CREATE TABLE `scategorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_category_cpu` (`cpu`),
  FULLTEXT KEY `cpu_categorys` (`cpu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `scategorys` WRITE;
/*!40000 ALTER TABLE `scategorys` DISABLE KEYS */;

INSERT INTO `scategorys` (`id`, `name`, `cpu`, `description`, `image`)
VALUES
	(1,'экстрим','extremal','Острые ощущения','-'),
	(2,'раслабуха',' relax','Расслабление и отдых.','-');

/*!40000 ALTER TABLE `scategorys` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы sizes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sizes`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Дамп таблицы vendercontacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vendercontacts`;

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



# Дамп таблицы venders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `venders`;

CREATE TABLE `venders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cityid` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `venders_cityid` (`id`),
  KEY `fk-venders-cities` (`cityid`),
  CONSTRAINT `fk-venders-cities` FOREIGN KEY (`cityid`) REFERENCES `citys` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `venders` WRITE;
/*!40000 ALTER TABLE `venders` DISABLE KEYS */;

INSERT INTO `venders` (`id`, `cityid`, `name`, `address`, `url`, `description`)
VALUES
	(1,3,'Выйти из комнаты.','пр. Ленина, 5','-','Это крутой оператор квестов в г. киров '),
	(2,3,'Картодром','пр. Ленина, 5','-','Это картодром в челнах.'),
	(3,3,'СПА Отель','пр. Ленина','https://rasstal.ru/spa-klub/','СПА Отель'),
	(4,3,'Планета Фитнес','пр. Ленина','https://planeta.fitness/clubs/chulman-117/?utm_source=google&utm_medium=cpc&utm_campaign=chelnypoisk','-');

/*!40000 ALTER TABLE `venders` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
