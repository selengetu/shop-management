-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 192.168.4.170    Database: banana
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `const_balance_type`
--

DROP TABLE IF EXISTS `const_balance_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `const_balance_type` (
  `type_id` int NOT NULL,
  `type_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `multiplier` int DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `const_balance_type`
--

LOCK TABLES `const_balance_type` WRITE;
/*!40000 ALTER TABLE `const_balance_type` DISABLE KEYS */;
INSERT INTO `const_balance_type` VALUES (1,'Ирсэн бараа',1),(2,'Явсан бараа',-1),(3,'Хорогдсон бараа',-1),(4,'Буцаасан бараа',-1),(5,'Бусад зардал',-1),(6,'Зарсан барааны орлого',-1),(7,'Зээл төлөлт',1),(8,'Касс',-1),(9,'Туслах',-1);
/*!40000 ALTER TABLE `const_balance_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `const_pay_type`
--

DROP TABLE IF EXISTS `const_pay_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `const_pay_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `const_pay_type`
--

LOCK TABLES `const_pay_type` WRITE;
/*!40000 ALTER TABLE `const_pay_type` DISABLE KEYS */;
INSERT INTO `const_pay_type` VALUES (0,'Бараа шилжүүлэлт'),(1,'Бэлэн'),(2,'ПОС - Картаар');
/*!40000 ALTER TABLE `const_pay_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `const_product_type`
--

DROP TABLE IF EXISTS `const_product_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `const_product_type` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `const_product_type`
--

LOCK TABLES `const_product_type` WRITE;
/*!40000 ALTER TABLE `const_product_type` DISABLE KEYS */;
INSERT INTO `const_product_type` VALUES (1,'Жимс'),(2,'Бүдүүн ногоо'),(3,'Нарийн ногоо'),(4,'Хатаасан жимс'),(5,'Бусад');
/*!40000 ALTER TABLE `const_product_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `const_shop_state`
--

DROP TABLE IF EXISTS `const_shop_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `const_shop_state` (
  `state_id` int NOT NULL,
  `state_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `const_shop_state`
--

LOCK TABLES `const_shop_state` WRITE;
/*!40000 ALTER TABLE `const_shop_state` DISABLE KEYS */;
INSERT INTO `const_shop_state` VALUES (0,'Ажиллахгүй'),(1,'Ажиллаж байгаа'),(2,'Түр хаасан');
/*!40000 ALTER TABLE `const_shop_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `const_shop_type`
--

DROP TABLE IF EXISTS `const_shop_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `const_shop_type` (
  `type_id` int NOT NULL,
  `type_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `const_shop_type`
--

LOCK TABLES `const_shop_type` WRITE;
/*!40000 ALTER TABLE `const_shop_type` DISABLE KEYS */;
INSERT INTO `const_shop_type` VALUES (1,'Агуулах'),(2,'Дэлгүүр'),(3,'Харилцагч');
/*!40000 ALTER TABLE `const_shop_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `const_user_role`
--

DROP TABLE IF EXISTS `const_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `const_user_role` (
  `id` int unsigned NOT NULL,
  `value` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `const_user_role`
--

LOCK TABLES `const_user_role` WRITE;
/*!40000 ALTER TABLE `const_user_role` DISABLE KEYS */;
INSERT INTO `const_user_role` VALUES (1,'casher','Худалдагч'),(2,'accountant','Нягтлан'),(4,'admin','Админ');
/*!40000 ALTER TABLE `const_user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp_salary`
--

DROP TABLE IF EXISTS `emp_salary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emp_salary` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_id` int DEFAULT NULL,
  `emp_id` int DEFAULT NULL,
  `salary_date` date DEFAULT NULL,
  `salary` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp_salary`
--

LOCK TABLES `emp_salary` WRITE;
/*!40000 ALTER TABLE `emp_salary` DISABLE KEYS */;
INSERT INTO `emp_salary` VALUES (2,1,2,'2020-12-09',24000),(3,2,2,'2020-12-10',20000),(4,8,3,'2020-12-09',20000),(5,2,2,'2020-12-09',4444);
/*!40000 ALTER TABLE `emp_salary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_id` int DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_salary` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,1,'Tuya',25000),(2,2,'Хулан',45000),(3,1,'Tuya',35000);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `count_unit` varchar(2) DEFAULT 'ш' COMMENT 'shirheg kg',
  `thumb_url` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL COMMENT 'nemelt tailbar',
  `count_in_box` double DEFAULT NULL,
  `cost` double DEFAULT NULL COMMENT 'Hudaldaj avsan une',
  `price` double DEFAULT NULL COMMENT 'Zarah une',
  `type` int DEFAULT NULL,
  `order_number` int DEFAULT NULL,
  `state` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=186 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Орос алим','кг','images/product/1597025682.jpg',NULL,15,7900,7900,1,12,1),(2,'Банана','кг','images/product/1597025796.jpg','',15,3900,3900,1,22,1),(3,'Ногоон лийр','кг','images/product/1597026505.jpg','',15,15000,15000,1,9,1),(4,'Тарвас','кг','images/product/1597026338.jpg','',15,2900,2900,1,17,1),(5,'Жүрж','кг','images/product/1597026372.jpg','',15,8900,8900,1,11,1),(6,'Ногоон чили усан үзэм','кг','images/product/1597026423.png','',15,15000,15000,1,1,1),(105,'Лууван','кг','images/product/1597803132.jpg','',50,1500,1500,2,2,1),(104,'Төмс','кг','images/product/1597803190.jpg','',50,1000,1000,2,1,1),(103,'Юуцай','кг','images/product/1597803196.jpeg','',10,5900,5900,3,12,1),(102,'Редиск','кг','images/product/1597803238.png','',10,5900,5900,3,10,1),(101,'Чихэрлэг төмс','кг','images/product/1597803287.jpg','',10,5900,5900,3,11,1),(100,'Хаш','кг','images/product/1598763211.jpg','',10,5900,5900,3,9,1),(99,'Ногоон хулуу','кг','images/product/1597803413.jpg','',10,5900,5900,3,7,1),(153,'Өндөг','ш','images/product/1598763136.png','',360,260,320,NULL,NULL,1),(98,'Шар хулуу','кг','images/product/1597803422.jpg','',10,5900,5900,3,8,1),(96,'Цоо баацай','ш','images/product/1597803531.jpg','',10,3500,3500,3,6,1),(95,'Эрдэнэшиш','ш','images/product/1597803579.jpg','',10,1800,1800,3,5,1),(94,'Нарийн цагаан мөөг','ш','images/product/1597803614.jpg','',10,1800,1800,3,4,1),(93,'Өргөст хэмх','кг','images/product/1597803635.jpg','',10,5900,5900,3,3,1),(92,'Том помидор','кг','images/product/1597803672.jpg','',10,7900,7900,3,2,1),(91,'Гинжин помидор','кг','images/product/1597803698.jpg','',10,7900,7900,3,1,1),(90,'Фүжи алим','кг','images/product/1597025682.jpg','',20,3900,3900,1,20,1),(89,'Цасан гоо алим','кг','images/product/1597025682.jpg','test by josh',20,3900,3900,1,19,1),(88,'Цагаан лийр','кг','images/product/1597737582.jpg','',20,3900,3900,1,18,1),(87,'Том манго','ш','images/product/1597737461.jpg','',20,4900,4900,1,16,1),(86,'Авокадо','ш','images/product/1597737361.jpg','',120,4900,4900,1,15,1),(85,'Слива','кг','images/product/1597737282.jpg','',50,8900,8900,1,14,1),(84,'Тоор','кг','images/product/1597737230.jpg','',20,3900,3900,1,13,1),(83,'Орос Мандарин','ш','images/product/1597737040.jpg','',50,12900,12900,1,8,1),(82,'Ногоон ваш алим','кг','images/product/1597736913.jpg','',50,9900,9900,1,7,1),(81,'Лимон','кг','images/product/1597736734.jpg','',20,8900,8900,1,5,1),(80,'Усан үзэм','кг','images/product/1597026423.png','',15,15000,15000,1,4,1),(79,'Буржгар хар чили усан үзэм','кг','images/product/1597026423.png','',15,15000,15000,1,2,1),(78,'Буржгар бор чили усан үзэм','кг','images/product/1597026423.png','',15,15000,15000,1,3,1),(77,'Гүзээлзгэнэ','кг','images/product/1597026908.jpg','Хуурай сэрүүн нөхцөлд хадгална',15,9500,35000,NULL,NULL,1),(76,'Ананас','кг','images/product/1597026703.jpg','',5,4900,4900,1,21,1),(74,'Киви','кг','images/product/1597026303.png','',15,12900,12900,1,10,1),(73,'Хар чавга','кг','images/product/1597026552.jpg','Хүйтэн сэрүүн нөхцөлд хадгална s',10,6500,6500,NULL,NULL,1),(106,'Баацай','кг','images/product/1597803721.jpg','',50,1500,1500,2,3,1),(107,'Хүрэн манжин','кг','images/product/1597803750.jpg','',50,1500,1500,2,4,1),(108,'Шар манжин','кг','images/product/1597803784.jpg','',50,1500,1500,2,5,1),(109,'Монгол сонгино','кг','images/product/1597803841.jpg','',50,1900,1900,2,6,1),(110,'Сармис','кг','images/product/1597803850.jpg','',50,15000,15000,2,7,1),(111,'Гишүү','кг','images/product/1597803858.jpg','',10,43000,43000,4,1,1),(112,'Миндал','кг','images/product/1597803968.jpg','',10,43000,43000,4,2,1),(113,'Ангаахай','кг','images/product/1597803947.png','',10,43000,43000,4,3,1),(114,'Ястай фундук','кг','images/product/1597804042.jpg','',10,43000,43000,4,4,1),(115,'Ясгүй фундук','кг','images/product/1597804051.jpg','',10,43000,43000,4,5,1),(116,'Холимог самар','кг','images/product/1597804141.jpg','',10,35000,35000,4,6,1),(117,'Хушганы идээ','кг','images/product/1597804152.jpg','',10,35000,35000,4,7,1),(118,'Хушгатай улаан чавга','кг','images/product/1597804201.jpg','',10,35000,35000,4,8,1),(119,'Хатаасан лимон','кг','images/product/1597804179.jpg','',10,35000,35000,4,9,1),(120,'Цангис','ш','images/product/1597804238.jpeg','',10,25000,25000,4,10,1),(121,'Кофетой самар','ш','images/product/1597804293.jpg','',10,25000,25000,4,11,1),(122,'Турк чангаанз','ш','images/product/1597804315.jpg','',10,25000,25000,4,12,1),(123,'Гүнжидийн үртэй самар','ш','images/product/1597804352.jpg','',10,25000,25000,4,13,1),(124,'Хатаасан помидор','ш','images/product/1597804379.jpg','',10,25000,25000,4,14,1),(125,'Шар хуурай үзэм','ш','images/product/1597804430.jpg','',10,25000,25000,4,15,1),(126,'Нойтон холимог','ш','images/product/1597804438.jpeg','',10,25000,25000,4,16,1),(127,'Хатаасан киви','ш','images/product/1597804462.png','',10,25000,25000,4,17,1),(128,'Хаштак','ш','images/product/1597804504.jpg','',10,25000,25000,4,18,1),(129,'Хатаасан манго','ш','images/product/1597804555.jpg','',10,25000,25000,4,19,1),(130,'Ястай хар чавга','ш','images/product/1597804625.jpg','',10,15000,15000,4,20,1),(131,'Ясгүй хар чавга','ш','images/product/1597804644.jpg','',10,25000,25000,4,21,1),(132,'Шар чангаанз','ш','images/product/1597804670.jpg','',10,15000,15000,4,22,1),(133,'Ястай фуки','ш',NULL,NULL,10,15000,15000,4,23,1),(134,'Ясгүй фуки','ш',NULL,NULL,10,15000,15000,4,24,1),(135,'Компот','ш','images/product/1597804707.jpg','',10,15000,15000,4,25,1),(136,'Давстай самар','ш','images/product/1597804727.jpg','',10,15000,15000,4,26,1),(137,'Нар хамба','ш','images/product/1597804783.jpg','',10,15000,15000,4,27,1),(138,'Ястай хушга','ш','images/product/1597804758.jpg','',10,15000,15000,4,28,1),(139,'Хар хуурай үзэм','ш','images/product/1597804804.jpg','',10,15000,15000,4,29,1),(140,'Хөөсөн чихэр','ш','images/product/1597804839.jpg','',10,15000,15000,4,30,1),(141,'3 өнгийн чихэр','ш',NULL,NULL,10,15000,15000,4,31,1),(142,'Хамбо','ш',NULL,NULL,10,15000,15000,4,32,1),(143,'Нандин чавга','ш','images/product/1597804894.jpg','',10,10000,10000,4,33,1),(144,'Бор хуурай үзэм','ш','images/product/1597805292.jpg','',10,10000,10000,4,34,1),(145,'Хасарваань','ш','images/product/1597804936.jpg','',10,10000,10000,4,35,1),(146,'Газрын самар','ш','images/product/1597804927.jpg','',10,10000,10000,4,36,1),(147,'Хар самар','ш','images/product/1597805171.jpg','',10,10000,10000,4,37,1),(148,'Улаан чавга','ш','images/product/1597805162.jpg','',10,10000,10000,4,38,1),(149,'Мортол','ш',NULL,NULL,10,10000,10000,4,39,1),(150,'Харибо','ш','images/product/1597805060.jpg','',10,10000,10000,4,40,1),(151,'Цагаан самар','ш','images/product/1597805125.jpg','',10,10000,10000,4,41,1),(152,'Алаг үрэл','ш','images/product/1597805150.webp','',10,10000,10000,4,42,1),(154,'Чинжүү','кг','images/product/1598763225.jpg','',10,6900,6900,3,13,1),(155,'Бууцай','кг','images/product/1598764099.jpg','',10,10000,10000,3,14,1),(156,'Саладны навч','кг','images/product/1598764110.jpg','',10,8900,8900,3,15,1),(157,'Броколи','кг','images/product/1598764124.jpg','',10,6900,6900,3,16,1),(158,'Сармисны гол','кг','images/product/1598764135.jpg','',10,6900,6900,3,17,1),(159,'Цагаан гаа','кг','images/product/1598764150.jpg','',10,10000,10000,3,18,1),(160,'Ногоон сонгино','кг','images/product/1598764087.jpg','',10,10000,10000,3,19,1),(161,'Яншуй','кг','images/product/1598764076.jpg','',10,15000,15000,3,20,1),(162,'Шанцай','кг','images/product/1598764030.jpg','',10,8900,8900,3,21,1),(163,'Бор мөөг','кг','images/product/1598764016.jfif','',10,13000,13000,3,22,1),(176,'Анарын сок','ш','images/product/1598763987.jfif','',10,3900,3900,5,1,1),(177,'1200 ундаа','ш','images/product/1598763997.jpg','',10,1200,1200,5,2,1),(178,'Шөл','ш','images/product/1598763973.png','',10,3000,3000,5,3,1),(179,'Смүүти','ш','images/product/1598763945.jpg','',10,2500,2500,5,4,1),(180,'Гаа','ш','images/product/1598763853.jpg','',10,1000,1000,5,5,1),(181,'Бохь','ш','images/product/1598763844.jpg','',10,1000,1000,5,6,1),(182,'Овьёос','ш','images/product/1598763836.jpg','',10,4500,4500,5,7,1),(183,'Эрүүл мэндийн ундаа','ш','images/product/1598763826.jpg','',10,2500,2500,5,8,1),(184,'Жижиг даавуун тор','ш','images/product/1598763817.jpg','',10,2500,2500,5,9,1),(185,'Том даавуун тор','ш','images/product/1598763805.jpg','',10,5500,5500,5,10,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_balance`
--

DROP TABLE IF EXISTS `shop_balance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop_balance` (
  `balance_id` bigint NOT NULL AUTO_INCREMENT,
  `from_shop_id` int NOT NULL,
  `to_shop_id` int DEFAULT NULL,
  `balance_type` int NOT NULL,
  `pay_type` int DEFAULT NULL,
  `balance_c1` double DEFAULT '0',
  `balance_value` double DEFAULT NULL,
  `balance_c2` double DEFAULT '0',
  `balance_date` date DEFAULT NULL,
  `balance_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`balance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_balance`
--

LOCK TABLES `shop_balance` WRITE;
/*!40000 ALTER TABLE `shop_balance` DISABLE KEYS */;
INSERT INTO `shop_balance` VALUES (80,0,1,1,0,-365000,32000,-333000,'2020-09-08','Бараа худалдан АВАХ: Агуулах 1','2020-09-08 11:19:29'),(81,0,1,1,0,-333000,32500,64500,'2020-09-08','Бараа худалдан АВАХ: Агуулах 1','2020-09-08 11:19:47'),(82,0,2,1,0,0,150000,150000,'2020-09-01','Бараа худалдан АВАХ: Алтай хотхон 14 байр','2020-09-08 11:20:10'),(83,1,2,1,0,150000,365000,515000,'2020-09-07','Бараа ШИЛЖҮҮЛЭХ / ЗЭЭЛ: Агуулах 1 -> Алтай хотхон 14 байр','2020-09-08 11:22:08'),(84,2,1,2,0,0,-365000,-365000,'2020-09-07','Бараа ШИЛЖҮҮЛЭХ / ЗЭЭЛ: Агуулах 1 -> Алтай хотхон 14 байр','2020-09-08 11:22:09'),(85,0,2,3,0,515000,-107500,407500,'2020-09-08','ХОРОГДСОН бараа бүртгэх: Алтай хотхон 14 байр','2020-09-08 11:23:04'),(99,0,2,5,1,407500,-7500,400000,'2020-09-09','test','2020-09-09 05:56:41'),(104,3,2,1,0,0,320,0,'2020-09-14','Бараа ШИЛЖҮҮЛЭХ / ЗЭЭЛ: Нарны хороолол 1-р салбар -> Алтай хотхон 14 байр','2020-09-14 02:24:42'),(105,0,2,1,0,0,320,0,'2020-09-14','Бараа худалдан АВАХ: Алтай хотхон 14 байр','2020-09-14 02:24:54'),(106,0,2,1,0,0,320,320,'2020-09-14','Бараа худалдан АВАХ: Алтай хотхон 14 байр','2020-09-14 02:25:00'),(107,0,2,1,0,320,320,640,'2020-09-14','Бараа худалдан АВАХ: Алтай хотхон 14 байр','2020-09-14 02:25:52'),(108,0,3,1,0,0,35000,35000,'2020-09-14','Бараа худалдан АВАХ: Нарны хороолол 1-р салбар','2020-09-14 02:26:54'),(109,0,3,3,0,35000,-35000,0,'2020-09-14','ХОРОГДСОН бараа бүртгэх: Нарны хороолол 1-р салбар','2020-09-14 02:28:16'),(110,1,3,1,0,0,6500,6500,'2020-09-14','Бараа ШИЛЖҮҮЛЭХ / ЗЭЭЛ: Агуулах 1 -> Нарны хороолол 1-р салбар','2020-09-14 02:29:51'),(111,3,1,2,0,-365000,-6500,-371500,'2020-09-14','Бараа ШИЛЖҮҮЛЭХ / ЗЭЭЛ: Агуулах 1 -> Нарны хороолол 1-р салбар','2020-09-14 02:29:51'),(112,5,3,1,0,6500,21500,28000,'2020-09-14','Бараа ШИЛЖҮҮЛЭХ / ЗЭЭЛ: Барсын Чимгээ -> Нарны хороолол 1-р салбар','2020-09-14 02:31:44'),(113,3,5,2,0,0,-21500,-21500,'2020-09-14','Бараа ШИЛЖҮҮЛЭХ / ЗЭЭЛ: Барсын Чимгээ -> Нарны хороолол 1-р салбар','2020-09-14 02:31:44'),(114,0,5,5,1,-21500,-20000,-41500,'2020-09-14','zeel tolson','2020-09-14 02:32:11'),(115,0,5,7,1,-41500,2000,-39500,'2020-09-14','zeel tololt','2020-09-14 02:34:20'),(116,0,2,6,1,640,-15000,-14360,'2020-09-19','josh','2020-09-19 03:09:41'),(117,0,1,9,1,-371500,-5000,-376500,'2020-09-19','tuslah','2020-09-19 03:22:00');
/*!40000 ALTER TABLE `shop_balance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_balance_item`
--

DROP TABLE IF EXISTS `shop_balance_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop_balance_item` (
  `item_id` bigint NOT NULL AUTO_INCREMENT,
  `balance_id` bigint NOT NULL,
  `product_id` int NOT NULL,
  `box` int NOT NULL,
  `kg` double NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `recdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_balance_item`
--

LOCK TABLES `shop_balance_item` WRITE;
/*!40000 ALTER TABLE `shop_balance_item` DISABLE KEYS */;
INSERT INTO `shop_balance_item` VALUES (139,80,153,0,100,320,32000,'2020-09-08 11:19:29'),(140,81,73,0,5,6500,32500,'2020-09-08 11:19:47'),(141,82,78,1,10,15000,150000,'2020-09-08 11:20:10'),(142,83,73,1,10,6500,65000,'2020-09-08 11:22:08'),(143,83,6,1,10,15000,150000,'2020-09-08 11:22:09'),(144,83,79,1,10,15000,150000,'2020-09-08 11:22:09'),(145,84,73,1,10,6500,65000,'2020-09-08 11:22:09'),(146,84,6,1,10,15000,150000,'2020-09-08 11:22:09'),(147,84,79,1,10,15000,150000,'2020-09-08 11:22:09'),(148,85,73,0,5,6500,32500,'2020-09-08 11:23:04'),(149,85,6,0,5,15000,75000,'2020-09-08 11:23:04'),(150,104,153,0,1,320,320,'2020-09-14 02:24:42'),(151,105,153,0,1,320,320,'2020-09-14 02:24:54'),(152,106,153,0,1,320,320,'2020-09-14 02:25:00'),(153,107,153,0,1,320,320,'2020-09-14 02:25:52'),(154,108,77,0,1,35000,35000,'2020-09-14 02:26:54'),(155,109,77,0,1,35000,35000,'2020-09-14 02:28:16'),(156,110,73,0,1,6500,6500,'2020-09-14 02:29:51'),(157,111,73,0,1,6500,6500,'2020-09-14 02:29:51'),(158,112,73,0,1,6500,6500,'2020-09-14 02:31:44'),(159,112,6,0,1,15000,15000,'2020-09-14 02:31:44'),(160,113,73,0,1,6500,6500,'2020-09-14 02:31:44'),(161,113,6,0,1,15000,15000,'2020-09-14 02:31:44');
/*!40000 ALTER TABLE `shop_balance_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_product_balance`
--

DROP TABLE IF EXISTS `shop_product_balance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop_product_balance` (
  `bal_id` int NOT NULL AUTO_INCREMENT,
  `shop_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `balance` double DEFAULT NULL,
  PRIMARY KEY (`bal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_product_balance`
--

LOCK TABLES `shop_product_balance` WRITE;
/*!40000 ALTER TABLE `shop_product_balance` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_product_balance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shops` (
  `shop_id` int NOT NULL AUTO_INCREMENT,
  `shop_type` int NOT NULL DEFAULT '0',
  `shop_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_state` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` VALUES (1,1,'Агуулах 1',1),(2,2,'Алтай хотхон 14 байр',1),(3,2,'Нарны хороолол 1-р салбар',1),(4,2,'Нарны хороолол 2-р салбар',1),(5,3,'Барсын Чимгээ',1),(7,3,'НВЦ',1),(8,3,'Бүдүүн ногоо',1),(10,2,'Пуужин Баяраа',1),(11,2,'test1',1);
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Дөлгөөн','dlgn_e@yahoo.com','admin','$2y$10$bOdyuXQuztuGwPiEHT.SbO5eytkN8CacET3o683HNV0ILbGBkOxO6','mnVIXm5NDumvVR5Yn62M2BB262BESh4NBiJCRzrdqOu0rqWnH1tvKyKBGiQ6','2018-02-04 16:26:26','2018-02-04 16:26:26',1),(11,'ноён Жош','nts_2012@yahoo.com','admin','$2y$10$K1Nyj7JuHYetjRajXAYFhuskwgbn2uPusEd.W23dao7V5VF0cdiFO','AhGGaqd5nG6ZIASJ9d3iUCkqbpQvHmxvV0vxsMVpaI3WQdsEZ8NNwCuXg4l4','2020-08-17 18:41:38','2020-08-17 18:41:38',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_shop_balance`
--

DROP TABLE IF EXISTS `v_shop_balance`;
/*!50001 DROP VIEW IF EXISTS `v_shop_balance`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_shop_balance` AS SELECT 
 1 AS `balance_id`,
 1 AS `from_shop_id`,
 1 AS `to_shop_id`,
 1 AS `balance_type`,
 1 AS `pay_type`,
 1 AS `balance_c1`,
 1 AS `balance_value`,
 1 AS `balance_c2`,
 1 AS `balance_date`,
 1 AS `balance_note`,
 1 AS `shop_name`,
 1 AS `to_shop_name`,
 1 AS `type_name`,
 1 AS `pay_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_shop_balance_item`
--

DROP TABLE IF EXISTS `v_shop_balance_item`;
/*!50001 DROP VIEW IF EXISTS `v_shop_balance_item`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_shop_balance_item` AS SELECT 
 1 AS `item_id`,
 1 AS `balance_id`,
 1 AS `product_id`,
 1 AS `box`,
 1 AS `kg`,
 1 AS `price`,
 1 AS `recdate`,
 1 AS `name`,
 1 AS `thumb_url`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_shop_balance`
--

/*!50001 DROP VIEW IF EXISTS `v_shop_balance`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`@dmin$`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_shop_balance` AS select `b`.`balance_id` AS `balance_id`,`b`.`from_shop_id` AS `from_shop_id`,`b`.`to_shop_id` AS `to_shop_id`,`b`.`balance_type` AS `balance_type`,`b`.`pay_type` AS `pay_type`,`b`.`balance_c1` AS `balance_c1`,`b`.`balance_value` AS `balance_value`,`b`.`balance_c2` AS `balance_c2`,date_format(`b`.`balance_date`,'%Y-%m-%d') AS `balance_date`,`b`.`balance_note` AS `balance_note`,`s1`.`shop_name` AS `shop_name`,`s2`.`shop_name` AS `to_shop_name`,`t`.`type_name` AS `type_name`,`p`.`name` AS `pay_name` from ((((`shop_balance` `b` left join `shops` `s1` on((`b`.`from_shop_id` = `s1`.`shop_id`))) join `shops` `s2` on((`s2`.`shop_id` = `b`.`to_shop_id`))) join `const_balance_type` `t` on((`t`.`type_id` = `b`.`balance_type`))) join `const_pay_type` `p` on((`p`.`id` = `b`.`pay_type`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_shop_balance_item`
--

/*!50001 DROP VIEW IF EXISTS `v_shop_balance_item`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`@dmin$`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_shop_balance_item` AS select `i`.`item_id` AS `item_id`,`i`.`balance_id` AS `balance_id`,`i`.`product_id` AS `product_id`,`i`.`box` AS `box`,`i`.`kg` AS `kg`,`i`.`price` AS `price`,`i`.`recdate` AS `recdate`,`p`.`name` AS `name`,`p`.`thumb_url` AS `thumb_url` from (`shop_balance_item` `i` join `products` `p`) where (`p`.`id` = `i`.`product_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-08 14:31:47
