-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: shopping
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Dumping data for table `const_balance_type`
--

LOCK TABLES `const_balance_type` WRITE;
/*!40000 ALTER TABLE `const_balance_type` DISABLE KEYS */;
INSERT INTO `const_balance_type` VALUES (1,'Ирсэн бараа',1),(2,'Явсан бараа',-1),(3,'Хорогдсон бараа',-1),(4,'Буцаасан бараа',-1),(5,'Бусад зардал',-1),(6,'Зарсан барааны орлого',-1),(7,'Зээл төлөлт',1);
/*!40000 ALTER TABLE `const_balance_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `const_pay_type`
--

LOCK TABLES `const_pay_type` WRITE;
/*!40000 ALTER TABLE `const_pay_type` DISABLE KEYS */;
INSERT INTO `const_pay_type` VALUES (0,'Бараа шилжүүлэлт'),(1,'Бэлэн'),(2,'ПОС - Картаар');
/*!40000 ALTER TABLE `const_pay_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `const_product_type`
--

LOCK TABLES `const_product_type` WRITE;
/*!40000 ALTER TABLE `const_product_type` DISABLE KEYS */;
INSERT INTO `const_product_type` VALUES (1,'Ногоо Жимс'),(2,'Мах махан бүтээгдэхүүн'),(3,'Сүүн бүтээгдэхүүн'),(4,'Ахуйн бараа'),(5,'Уух зүйлс');
/*!40000 ALTER TABLE `const_product_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `const_shop_state`
--

LOCK TABLES `const_shop_state` WRITE;
/*!40000 ALTER TABLE `const_shop_state` DISABLE KEYS */;
INSERT INTO `const_shop_state` VALUES (0,'Ажиллахгүй'),(1,'Ажиллаж байгаа'),(2,'Түр хаасан');
/*!40000 ALTER TABLE `const_shop_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `const_shop_type`
--

LOCK TABLES `const_shop_type` WRITE;
/*!40000 ALTER TABLE `const_shop_type` DISABLE KEYS */;
INSERT INTO `const_shop_type` VALUES (1,'Агуулах'),(2,'Дэлгүүр'),(3,'Харилцагч');
/*!40000 ALTER TABLE `const_shop_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `const_user_role`
--

LOCK TABLES `const_user_role` WRITE;
/*!40000 ALTER TABLE `const_user_role` DISABLE KEYS */;
INSERT INTO `const_user_role` VALUES (1,'casher','Худалдагч'),(2,'accountant','Нягтлан'),(4,'admin','Админ');
/*!40000 ALTER TABLE `const_user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (186,'Төмс','кг',NULL,'test',15,1000,1300,NULL,NULL,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shop_balance`
--

LOCK TABLES `shop_balance` WRITE;
/*!40000 ALTER TABLE `shop_balance` DISABLE KEYS */;
INSERT INTO `shop_balance` VALUES (118,0,1,6,1,0,-50000,-50000,'2021-01-04','test','2021-01-04 12:11:15'),(119,0,2,1,0,0,28600,28600,'2021-01-04','Бараа худалдан АВАХ: Дэлгүүр','2021-01-04 12:18:42'),(120,0,2,1,0,28600,6400,35000,'2021-01-05','Бараа худалдан АВАХ: Дэлгүүр','2021-01-05 04:11:40');
/*!40000 ALTER TABLE `shop_balance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shop_balance_item`
--

LOCK TABLES `shop_balance_item` WRITE;
/*!40000 ALTER TABLE `shop_balance_item` DISABLE KEYS */;
INSERT INTO `shop_balance_item` VALUES (162,119,186,1,22,1300,28600,'2021-01-04 12:18:42'),(163,120,186,0,4,1600,6400,'2021-01-05 04:11:40');
/*!40000 ALTER TABLE `shop_balance_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shop_product_balance`
--

LOCK TABLES `shop_product_balance` WRITE;
/*!40000 ALTER TABLE `shop_product_balance` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_product_balance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` VALUES (1,1,'Агуулах 1',1),(2,2,'Дэлгүүр',1);
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (11,'TEST','nts_2012@yahoo.com','admin','$2y$10$XtMebhwScJcwLecFrDuH/.DgW59EtznIlTU17qNHB6.B6ROjM8CYG','Lt4c79lnNLnQ3K12stYCWbVUOitxpFIS09T4Ez3a3BopptrjvW43USoUZxF2','2020-08-17 18:41:38','2021-01-03 17:56:35',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'shopping'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-08 14:39:31
