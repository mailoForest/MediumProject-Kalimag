-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: kalimag_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model` varchar(60) NOT NULL,
  `minicategory_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(100) NOT NULL,
  `warranty` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `model_UNIQUE` (`model`),
  KEY `fk_products_subcategories1_idx` (`minicategory_id`),
  KEY `fk_products_manufacturers_idx` (`manufacturer_id`),
  CONSTRAINT `fk_manufacturers_products` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_subcategories1` FOREIGN KEY (`minicategory_id`) REFERENCES `minicategories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Смартфон',1,'Galaxy J5 (2016)',1,330,'Samsung-J3-2016.jpg',24,50),(2,'Смартфон',3,'P8 Lite',1,300,'huawei-p8-lite.jpg',24,43),(3,'Смартфон',2,'iPhone 7',1,1400,'iphone7.jpg',30,20),(4,'Смартфон',1,'Galaxy S7 Edge',1,1000,'samsung-s7-edge.jpg',24,30),(5,'Смартфон',4,'A7010',1,289,'lenovo-a7010.jpg',24,50),(6,'Смартфон',1,'Galaxy A5 (2016)',1,500,'samsung-a5-2016.jpg',25,50),(7,'Смартфон',3,'P9 Lite',1,450,'huawei-P9 Lite.jpg',24,60),(8,'Смартфон',4,'K6',1,300,'lenovo-k6.jpg',24,40),(9,'Смартфон',5,'ZenFone Go ZB500KL',1,250,'ASUS-ZenFone-Go-ZB500KL.jpg',24,30),(10,'Смартфон',2,'iPhone 5S',1,550,'iPhone-5S.jpg',30,25),(11,'Смартфон',6,'Xperia M5',1,500,'xperia-m5.jpg',30,54),(12,'Смартфон',6,'Xperia XA',1,540,'xperia-xa.jpg',30,48),(13,'Смартфон',6,'Xperia Z5',1,901,'sony-z5.jpg',28,56),(14,'Смартфон',7,'G4 Dual Sim',1,704,'lg-g4.jpg',24,7),(15,'Протектор',11,'A+ Case ultraslim за iPhone 6/6s',2,15,'A+CaseultraslimiPhone6s.jpg',3,20),(16,'Протектор',11,'A+ Case Nude за Iphone 6/6S, Gold',2,17.55,'ACaseNudIphone6Gold.jpg',4,74),(17,'Силиконов гръб',8,'Jelly Case Sony Xperia M4 Aqua',2,4.23,'MercuryJellyCaseSonyXperM4Aqua.jpg',0,33),(18,'Силиконов гръб',8,'Samsung S7 Edge, Blue',2,1,'SamsungS7EdgeBlue.jpg',0,8),(19,'Кожен калъф',10,'Flip Cover Samsung Galaxy S3 Neo',2,9.53,'zagsmnetFlipCoverSamsungGalaxyS3Neo.jpg',1,14),(20,'Твърд гръб',10,'Огледален Huawei P9 lite&sbquo;Златист',2,13.71,'zaGSMnetОгледаленHuaweiP9lite&sbquo;Златист.jpg',2,18),(21,'Вертикален Флип калъф със силиконово легло',9,'Samsung Galaxy J1 Mini, Черен',2,9.92,'FlexSamsungGalaxyJ1Mini,Черен.jpg',0,25),(22,'Лаптоп',5,'X540SA-XX411',12,439.9,'ASUS-X540SA-XX411.jpg',36,12),(23,'Лаптоп',13,'15-ay008nu',12,471.24,'HP 15-ay008nu.jpg',12,5),(24,'Лаптоп',4,'IdeaPad110',12,544.5,'lenovo-IdeaPad110.jpg',24,17),(25,'Лаптоп',14,'Inspiron 3552',12,480,'Inspiron3552.jpg',32,48),(26,'Лаптоп',2,'MacBook Air 13',12,1000000,'MacBookAir13.jpg',1000,3),(27,'Лаптоп',12,'Aspire E5-774G-32AX',12,1001,'AspireE5-774G-32AX.jpg',24,15);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-28 11:39:22
