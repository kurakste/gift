# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.5.5-10.3.9-MariaDB-1:10.3.9+maria~bionic)
# Схема: gift
# Время создания: 2018-12-13 17:21:15 +0000
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
	(8,84,2800.00,3500.00,'2018-12-13','2019-01-31');

/*!40000 ALTER TABLE `baseprices` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы certificates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `certificates`;

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_price` decimal(6,2) NOT NULL,
  `sale_price` decimal(6,2) NOT NULL,
  `certid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iid` int(11) NOT NULL DEFAULT 1,
  `donor_name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `donor_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `donor_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `recipient_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `recipient_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `activated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `closed_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `certid_index` (`certid`),
  KEY `status_index` (`status`),
  KEY `status_iid` (`status`),
  KEY `fk-certificates-items` (`iid`),
  CONSTRAINT `fk-certificates-items` FOREIGN KEY (`iid`) REFERENCES `items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `certificates` WRITE;
/*!40000 ALTER TABLE `certificates` DISABLE KEYS */;

INSERT INTO `certificates` (`id`, `purchase_price`, `sale_price`, `certid`, `iid`, `donor_name`, `donor_phone`, `donor_email`, `recipient_name`, `recipient_phone`, `created_at`, `activated_at`, `closed_at`, `status`)
VALUES
	(7,2800.00,3500.00,'QRR9-IXGQQ7',84,'Степан','89176450029','kurakste@gmail.com','Елена','89869347745','2018-12-13 17:20:10','0000-00-00 00:00:00','0000-00-00 00:00:00',1);

/*!40000 ALTER TABLE `certificates` ENABLE KEYS */;
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
	(2,0,'Киров','kirov','г. Киров кировской оласти.'),
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
	(1,'Девушке','female','Подарки для прекрасных дам. ','/img/category/female_1000.jpg'),
	(2,'Парням','male','Подарки для сильной половины.','/img/category/male_1000.jpg'),
	(9,'Детям','children','Подарки для детей','/img/category/children_1000.jpg'),
	(10,'Родителям','parents','Для родителей.','/img/category/parents_1000.jpg'),
	(11,'Для компании','company','-','-'),
	(15,'Коллеги','collage','Подарок для коллеги.','/');

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
	(12,84,'spykids','/img/products/esc/spykids1.png',1);

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  KEY `items_vid` (`vid`),
  CONSTRAINT `fk-items-vender` FOREIGN KEY (`vid`) REFERENCES `venders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;

INSERT INTO `items` (`id`, `vid`, `exid`, `name`, `cpu`, `short_description`, `description`, `lifetime`, `rank`, `phisical`)
VALUES
	(84,7,'Дети Шпионов.','Дети Шпионов','spykids','Сверхсекретное квест-задание Дети Шпионов: Лазерный лабиринт. Уровень 2 (12+)','Вы-команда юных спецагентов-Дети Шпионов, которым предстоит разгадать все тайные шифры, добраться до главного хранилища секретов и вернуть украденное!\r\nУ вас на пути встанет лазерный лабиринт и вы почувствуете себя настоящими шпионами!\r\n12+',90,1,0);

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
	(62,84,9),
	(63,84,10),
	(64,84,11);

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
	(20,84,3);

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
	('m181118_145406_favorite',1542565306),
	('m181124_190926_quote',1543086806),
	('m181201_194459_certificate',1543758984);

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы quotes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quotes`;

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;

INSERT INTO `quotes` (`id`, `body`)
VALUES
	(1,'Женщина любит ушами, а уши любят бриллианты.\nТамара Клейман'),
	(2,'Подарите женщине весь мир, и она первым делом избавится от вас.\nАркадий Давидович'),
	(3,'Выбрать подарок ко дню рождения жены обычно труднее, чем было выбрать саму жену.'),
	(4,'Люди редко думают одинаково, кроме тех случаев, когда они выбирают свадебные подарки.\n\n'),
	(5,'Ничто так не привязывает нас к женщине, как подаренные ей нами дорогие подарки.\nНеизвестный автор'),
	(6,'Получив подарок от жизни, посмотри, нет ли на нём цены.\nСергей Балашов'),
	(7,'Самая большая ценность — подаренное нам время.\nВалерий Миронов'),
	(8,'Выбранный с любовью подарок узнается сразу по стремлению угадать вкус адресата, по оригинальности замысла, по самой манере преподносить подарок. (А. Моруа)\n'),
	(9,'Долгая надежда слаще, чем скорый сюрприз. (И. Рихтер)\n'),
	(10,'Подарок, преподнесенный с улыбкой, ценен вдвойне. (Т. Фуллер)\n'),
	(11,'Кто умеет дарить, тот умеет жить. (Французская поговорка)\n'),
	(12,'Ничто так не разжигает подозрений жены, как неожиданный подарок от мужа. (Неизвестный автор)\n'),
	(13,'Придя к убеждению, что «в мире нет ничего, что было бы достойно ее!», мужчина предлагает себя. (С. Трейси)\n'),
	(14,'Если подарок понравился, значит, ты отдал часть своей души. (Японская мудрость)\n'),
	(15,'Должен ли джентльмен стирать цену с подарка, если он делает подарок деньгами? (К. Мелихан)\n'),
	(16,'Каждый подарок от друга – это пожелание счастья. (Р. Бах\n'),
	(17,'Дарите вашим подружкам те же духи, что и у ваших жен. У жен исключительный нюх. (Надин Ротшильд)\n'),
	(18,'— Мне тут жена сертификат на эротический массаж подарила.\n— Кажется, ты сделал слишком много ошибок в словосочетании «пенка для бритья».'),
	(19,'Идеальный подарок мужчине, у которого все есть, – женщина, которая знает, что со всем этим делать. (Неизвестный автор)'),
	(20,'Только подарок без повода - настоящий подарок.'),
	(21,'Женщине невозможно подарить слишком много цветов, а ребёнку - слишком много игрушек.'),
	(22,'Если муж дарит жене цветы безо всякой причины, значит, он только что виделся с этой причиной.'),
	(23,'Вы дарите мало, когда дарите из того, что у вас есть. Когда вы дарите часть себя - это искренний дар.'),
	(24,'Полезные подарки лучше всего. Скажем, я ему - носовые платки, он мне - норковое манто.'),
	(25,'Счастлив не тот, кто получает подарок, а тот, кто подарок делает. '),
	(26,'Если жена не с того, ни с сего дарит вам галстук, значит, новая норковая шуба ей уже не нравится. ');

/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
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
	(2,'релакс',' relax','Расслабление и отдых.','-'),
	(3,'драйв','drive','Драйвовые подвижные подарки',''),
	(4,'красота','beauty','/',''),
	(5,'хобби','hobby','/','');

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
	(7,3,'Квест рум  ESC','г. Набережные Челны, пр. Сююмбике, 46','/','+79539991221\r\n');

/*!40000 ALTER TABLE `venders` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
