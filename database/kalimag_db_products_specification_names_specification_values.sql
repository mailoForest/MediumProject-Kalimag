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
-- Table structure for table `products_specification_names_specification_values`
--

DROP TABLE IF EXISTS `products_specification_names_specification_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_specification_names_specification_values` (
  `product_id` int(11) NOT NULL,
  `specification_names` varchar(50) NOT NULL,
  `specification_values` varchar(50) NOT NULL,
  KEY `fk_productId_products_idx` (`product_id`),
  CONSTRAINT `fk_productId_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_specification_names_specification_values`
--

LOCK TABLES `products_specification_names_specification_values` WRITE;
/*!40000 ALTER TABLE `products_specification_names_specification_values` DISABLE KEYS */;
INSERT INTO `products_specification_names_specification_values` VALUES (1,'Процесор','Quad Core 1.2Ghz'),(1,'Размери (Ш x В x Д мм)','72.3 x 145.8 x 8.1'),(1,'Тегло (гр)','159'),(1,'Операционна система','Android v6.0 (Marshmallow)'),(1,'Вътрешна памет','16 GB'),(1,'RAM памет','2 GB'),(1,'Тип дисплей','Super AMOLED'),(1,'Диагонал','5.2'),(1,'Oсновна камера (Mp)','13'),(1,'Вторична камера (Mp)','5'),(1,'Батерия','3100 mAh'),(2,'Процесор','Octa Core 1.2GHz'),(2,'Размери (Ш x В x Д мм)','70.6 x 143 x 7.7'),(2,'Операционна система','Android v5.0 (Lollipop)'),(2,'Вътрешна памет','16 GB'),(2,'RAM памет','2 GB'),(2,'Тип дисплей','IPS LSD'),(2,'Диагонал','5.0'),(2,'Oсновна камера (Mp)','13'),(2,'Вторична камера (Mp)','13'),(2,'Батерия','2200 mAh'),(3,'Процесор','A10 Fusion'),(3,'Размери (Ш x В x Д мм)','67.1 x 138.3 x 7.1'),(3,'Тегло (гр)','138'),(3,'Операционна система','iOS 10'),(3,'Вътрешна памет','32 GB'),(3,'Тип дисплей','IPS LCD'),(3,'Диагонал','4,7'),(3,'Основна камера (Mp)','12'),(3,'Вторична камера (Mp)','7'),(3,'Батерия','до 240 часа'),(4,'Процесор','2 x Quad Core, 2.3GHz + 1.6Ghz'),(4,'Размери (Ш x В x Д мм)','72.6 x 150.9 x 7.7'),(4,'Тегло (гр)','157'),(4,'Операционна система','Android v6.0 (Marshmallow)'),(4,'Вътрешна памет','32 GB'),(4,'RAM памет','4 GB'),(4,'Тип дисплей','Super AMOLED'),(4,'Диагонал','5.5'),(4,'Основна камера (Mpх)','12'),(4,'Вторична камера (Mpх)','5'),(4,'Батерия','3600 mAh'),(5,'Процесор','Mediatek MT6753 Octa-Core, 1.3GHz'),(5,'Размери (Ш x В x Д мм)','76.5 x 153.6 x 9'),(5,'Тегло (гр)','160'),(5,'Операционна система','Android v5.1 (Lollipop)'),(5,'Вътрешна памет','32 GB'),(5,'RAM памет','2 GB'),(5,'Тип дисплей','Full HD IPS'),(5,'Диагонал','5.5'),(5,'Основна камера (Mpх)','13'),(5,'Вторична камера (Mpх)','5'),(5,'Батерия','3300 mAh'),(6,'Процесор','Octa-Core, 1.6GHz'),(6,'Размери (Ш x В x Д мм)','71 x 144.8 x 7.3'),(6,'Тегло (гр)','155'),(6,'Операционна система','Android v5.1 (Lollipop)'),(6,'Вътрешна памет','16 GB'),(6,'RAM памет','2 GB'),(6,'Тип дисплей','Super AMOLED'),(6,'Диагонал','5.2'),(6,'Основна камера (Mpх)','13'),(6,'Вторична камера (Mpх)','5'),(6,'Батерия','2900 mAh'),(7,'Процесор','2 x Quad Core, 2GHz + 1.7GHz'),(7,'Размери (Ш x В x Д мм)','72.6 x 146.8 x 7.5 mm'),(7,'Тегло (гр)','147'),(7,'Операционна система','Android v6.0 (Marshmallow)'),(7,'Вътрешна памет','16 GB'),(7,'RAM памет','2 GB'),(7,'Тип дисплей','IPS LCD'),(7,'Диагонал','5.2'),(7,'Основна камера (Mpх)','13'),(7,'Вторична камера (Mpх)','8'),(7,'Батерия','3000 mAh'),(8,'Процесор','Qualcomm Snapdragon 430 Octa Core, 1.4GHz'),(8,'Размери (Ш x В x Д мм)','70.3 x 141.9 x 8.2'),(8,'Тегло (гр)','140'),(8,'Операционна система','Android v6.0 (Marshmallow)'),(8,'Вътрешна памет','16 GB'),(8,'RAM памет','2 GB'),(8,'Тип дисплей','IPS'),(8,'Диагонал','5'),(8,'Основна камера (Mpх)','13'),(8,'Вторична камера (Mpх)','8'),(8,'Батерия','3000 mAh'),(9,'Процесор','Qualcomm MSM8916 Quad-Core, 1GHz'),(9,'Размери (Ш x В x Д мм)','70.8 x 143.7 x 11.2'),(9,'Тегло (гр)','150'),(9,'Операционна система','Android v6.0 (Marshmallow)'),(9,'Вътрешна памет','16 GB'),(9,'RAM памет','2 GB'),(9,'Тип дисплей','IPS'),(9,'Диагонал','5'),(9,'Основна камера (Mpх)','13'),(9,'Вторична камера (Mpх)','5'),(9,'Батерия','2600 mAh'),(10,'Процесор','A7 64-bit (копроцесор M7 motion)'),(10,'Размери (Ш x В x Д мм)','58,6 х 123,8 х 7.6'),(10,'Тегло (гр)','112'),(10,'Вътрешна памет','16 GB'),(10,'RAM памет','1 GB'),(10,'Тип дисплей','Retina display'),(10,'Диагонал','4'),(10,'Основна камера (Mpх)','8'),(10,'Вторична камера (Mpх)','1.2'),(10,'Батерия','250 часа'),(11,'Процесор','Octa Core, 2.0 GHz Cortex-A53'),(11,'Размери (Ш x В x Д мм)','72 x 145 x 7.6 mm'),(11,'Тегло (гр)','142.5'),(11,'Операционна система','Android'),(11,'Вътрешна памет','16 GB'),(11,'RAM памет','3 GB'),(11,'Тип дисплей','Full-HD IPS LCD capacitive touchscreen'),(11,'Диагонал','5'),(11,'Основна камера (Mpх)','21.5'),(11,'Вторична камера (Mpх)','13 MP'),(11,'Батерия','2600 mAh'),(12,'Процесор','2 x Helio P10 Octa Core, 2GHz +1GHz'),(12,'Размери (Ш x В x Д мм)','66.8 x 143.6 x 7.9'),(12,'Тегло (гр)','138'),(12,'Операционна система','Android v6.0 (Marshmallow)'),(12,'Вътрешна памет','16 GB'),(12,'RAM памет','2 GB'),(12,'Тип дисплей','IPS LCD'),(12,'Диагонал','5'),(12,'Основна камера (Mpх)','13'),(12,'Вторична камера (Mpх)','8'),(12,'Процесор','2300 mAh'),(15,'Материал','Силикон'),(16,'Материал','Пластмаса'),(17,'Материал','TPU'),(18,'Материал','TPU'),(19,'Материал','Пластмаса, Естествена кожа'),(20,'Материал','Пластмасa, Алуминий'),(21,'Материал','Кожа, Силикон'),(22,'Процесор','Intel Celeron Dual Core, 1.6GHz up to 2.48GHz'),(22,'Тип дисплей','LCD LED'),(22,'Диагонал','15.6'),(22,'Хард диск','1TB HDD'),(22,'RAM памет','4GB DDR3'),(22,'Видео карта','Intel HD Graphics 400'),(22,'Батерия','Li Ion 3 клетки'),(22,'Размери (Ш x В x Д мм)','381.4 x 25.4 x 251.5'),(22,'Тегло (kg)','1.9'),(22,'Материал на корпуса','Пластмаса'),(22,'Операционна система','Windows 98'),(23,'Процесор','Intel Pentium Quad Core, 1.6GHz up to 2.56GHz'),(23,'Тип дисплей','LCD LED'),(23,'Диагонал','15.6'),(23,'Хард диск','1TB HDD'),(23,'RAM памет','8GB'),(23,'Видео карта','AMD Radeon R5 M430 2GB'),(23,'Батерия','Li Ion 4 клетки'),(23,'Тегло (kg)','2.04'),(23,'Материал на корпуса','Пластмаса'),(23,'Операционна система','Ubunto'),(24,'Процесор','Intel Pentium Quad-Core, 1.6GHz up to 2.56GHz'),(24,'Тип дисплей','LCD LED'),(24,'Диагонал','15.6'),(24,'Хард диск','1TB HDD'),(24,'RAM памет','4GB DDR3L'),(24,'Видео карта','Intel HD Graphics 405'),(24,'Батерия','Li Ion 3 клетки'),(24,'Размери (Ш x В x Д мм)','378 x 22.9 x 265'),(24,'Тегло (kg)','2.2'),(24,'Материал на корпуса','Пластмаса'),(24,'Операционна система','Kobunto'),(25,'Процесор','Intel Celeron N3060 1.60 GHz'),(25,'Тип дисплей','LCD LED'),(25,'Диагонал','15.6'),(25,'Хард диск','500GB HDD'),(25,'RAM памет','4GB DDR3L'),(25,'Видео карта','Intel HD Graphics 400'),(25,'Батерия','Li Ion 4 клетки'),(25,'Размери (Ш x В x Д мм)','376.4 x 24.6 - 23.2 x 259'),(25,'Тегло (kg)','2.2'),(25,'Материал на корпуса','Пластмаса'),(25,'Операционна система','Free DOS'),(26,'Процесор','Intel Heca Core i15 350GHz'),(26,'Тип дисплей','LCD LED'),(26,'Диагонал','13.3'),(26,'Хард диск','128GB SSD'),(26,'RAM памет','8GB LPDDR3'),(26,'Видео карта','Intel HD Graphics 6000+'),(26,'Батерия','Li-Polymer'),(26,'Размери (Ш x В x Д мм)','325 x 3 - 17 x 227'),(26,'Тегло (kg)','1.35'),(26,'Материал на корпуса','Алуминий'),(26,'Операционна система','Mac OS X El Capitan'),(27,'Процесор','Intel Core i3-6100U 2.30GHz'),(27,'Тип дисплей','LCD LED'),(27,'Диагонал','17.3'),(27,'Хард диск','128GB SSD'),(27,'RAM памет','4GB DDR4'),(27,'Видео карта','NVIDIA GeForce GTX 950M'),(27,'Батерия','Li Ion 6 клетки'),(27,'Размери (Ш x В x Д мм)','423.3 x 33.1 - 27.58 x 281.9'),(27,'Тегло (kg)','3.3'),(27,'Материал на корпуса','Пластмаса'),(27,'Операционна система','Linux');
/*!40000 ALTER TABLE `products_specification_names_specification_values` ENABLE KEYS */;
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
