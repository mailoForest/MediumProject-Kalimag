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
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subcategories_categories1_idx` (`category_id`),
  CONSTRAINT `fk_subcategories_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategories`
--

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` VALUES (1,'Мобилни телефони и аксесоари',1),(2,'Таблети и аксесоари',1),(3,'Лаптопи и аксесоари',1),(4,'Джаджи, смарт технологии и смартчасовници',1),(5,'Настолни компютри и монитори',2),(6,'Принтери и скенери',2),(7,'Периферия',2),(8,'РС компоненти',2),(9,'Wireless & Networking',2),(10,'Software',2),(11,'Телевизори и аксесоари',3),(12,'Видео проектори и екрани',3),(13,'Електроника',3),(14,'Системи за домашно кино и аудио Hi-Fi',3),(15,'Конзоли и игри',3),(16,'Фотоапарати',4),(17,'Видеокамери',4),(18,'Фото и видео аксесоари',4),(19,'Оптика и астрономия',4),(20,'Хладилна техника',5),(21,'Перални и сушилни за дрехи',5),(22,'Съдомиялни',5),(23,'Уреди за вграждане',5),(24,'Готварски печки и микровълнови',5),(25,'Прахосмукачки и ютии',5),(26,'Кухненски уреди',5),(27,'Онлайн книжарница',6),(28,'Филми',6),(29,'Музика',6),(30,'Офис консумативи',6),(31,'Свободно време',7),(32,'Фитнес и хранителни добавки',7),(33,'Атлетика и бягане',7),(34,'Отборни спортове',7),(35,'Къмпинг артикули',7),(36,'Зимни спортове',7),(37,'Градински мебели',8),(38,'Коледна украса',8),(39,'Домашен текстил и килими',8),(40,'Санитария',8),(41,'Градинска техника',8),(42,'Мебели и матраци',8),(43,'Осветление и електроматериали',8),(44,'Електрическо оборудване',8),(45,'Почистване и поддръжка',8),(46,'За домашните любимци',8),(47,'Готвене и сервиране',8);
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-28 11:39:19
