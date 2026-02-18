-- MySQL dump 10.13  Distrib 9.2.0, for macos15.2 (arm64)
--
-- Host: localhost    Database: wohl
-- ------------------------------------------------------
-- Server version	9.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_brand`
--

LOCK TABLES `tbl_brand` WRITE;
/*!40000 ALTER TABLE `tbl_brand` DISABLE KEYS */;
INSERT INTO `tbl_brand` VALUES (2,'Puma','2023-11-02 00:00:00'),(3,'Adidas','2023-11-02 00:00:00'),(4,'GUCCI','2023-11-02 00:00:00'),(5,'Campus','2023-11-02 00:00:00'),(6,'Bata','2023-11-02 00:00:00');
/*!40000 ALTER TABLE `tbl_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `variant_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  KEY `variant_id` (`variant_id`),
  CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_cart_ibfk_3` FOREIGN KEY (`variant_id`) REFERENCES `tbl_product_variant` (`variant_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cart`
--

LOCK TABLES `tbl_cart` WRITE;
/*!40000 ALTER TABLE `tbl_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_category` (
  `categoryid` int NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `added_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category`
--

LOCK TABLES `tbl_category` WRITE;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` VALUES (1,'Men','2023-12-07 00:00:00'),(2,'Women','2023-12-07 00:00:00'),(3,'kids','2023-12-07 00:00:00');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_feedback`
--

DROP TABLE IF EXISTS `tbl_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `feedback` text COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_feedback`
--

LOCK TABLES `tbl_feedback` WRITE;
/*!40000 ALTER TABLE `tbl_feedback` DISABLE KEYS */;
INSERT INTO `tbl_feedback` VALUES (1,'Good Products Delivered ',2),(2,'Product is good quality or condition ,\r\nYour Delivery service is good.',3),(3,'gcffcdfgvfdcghgvf',2);
/*!40000 ALTER TABLE `tbl_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `order_number` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payer_email` varchar(100) DEFAULT NULL,
  `contact_no` bigint DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `payment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','paid','shipped','completed','cancelled') DEFAULT 'pending',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_number` (`order_number`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order`
--

LOCK TABLES `tbl_order` WRITE;
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
INSERT INTO `tbl_order` VALUES (1,1,'ORD17569551003172',500.00,'pay_RDMyq6XQnwJXaF','21bmiit145@gmail.com',6357688000,'145 Rajeshwari','2025-09-04 08:35:00','paid'),(2,1,'ORD17569556611895',1200.00,'pay_RDN8i5b90p4MQY','sp8414sp@gmail.com',6357688000,'145 Rajeshwari','2025-09-04 08:44:21','paid');
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order_items`
--

DROP TABLE IF EXISTS `tbl_order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `variant_quantity` decimal(10,2) NOT NULL,
  `variant_unit_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  KEY `variant_unit_id` (`variant_unit_id`),
  CONSTRAINT `tbl_order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_order_items_ibfk_3` FOREIGN KEY (`variant_unit_id`) REFERENCES `tbl_unit` (`unit_id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order_items`
--

LOCK TABLES `tbl_order_items` WRITE;
/*!40000 ALTER TABLE `tbl_order_items` DISABLE KEYS */;
INSERT INTO `tbl_order_items` VALUES (7,1,18,100.00,6,500.00,1),(8,2,18,100.00,6,500.00,2),(9,2,17,100.00,6,100.00,2);
/*!40000 ALTER TABLE `tbl_order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product_variant`
--

DROP TABLE IF EXISTS `tbl_product_variant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_product_variant` (
  `variant_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `variant_quantity` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unit_id` int NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`variant_id`),
  KEY `product_id` (`product_id`),
  KEY `fk_unit` (`unit_id`),
  CONSTRAINT `fk_unit` FOREIGN KEY (`unit_id`) REFERENCES `tbl_unit` (`unit_id`),
  CONSTRAINT `tbl_product_variant_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product_variant`
--

LOCK TABLES `tbl_product_variant` WRITE;
/*!40000 ALTER TABLE `tbl_product_variant` DISABLE KEYS */;
INSERT INTO `tbl_product_variant` VALUES (1,16,100.00,100.00,1,200),(7,17,100.00,100.00,6,3),(8,17,400.00,500.00,1,50),(10,18,100.00,500.00,6,400),(11,18,200.00,30030.00,7,30);
/*!40000 ALTER TABLE `tbl_product_variant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `model_no` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `img1` varchar(600) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img2` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `img3` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `categoryid` int NOT NULL,
  `subcategoryid` int NOT NULL,
  `brandid` int NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `model_no` (`model_no`),
  KEY `category_id` (`categoryid`),
  KEY `subcategoryid` (`subcategoryid`),
  KEY `brandid` (`brandid`),
  CONSTRAINT `brandid` FOREIGN KEY (`brandid`) REFERENCES `tbl_brand` (`id`),
  CONSTRAINT `category_id` FOREIGN KEY (`categoryid`) REFERENCES `tbl_category` (`categoryid`),
  CONSTRAINT `subcategoryid` FOREIGN KEY (`subcategoryid`) REFERENCES `tbl_subcategory` (`subcategoryid`),
  CONSTRAINT `tbl_products_chk_1` CHECK (json_valid(`img2`)),
  CONSTRAINT `tbl_products_chk_2` CHECK (json_valid(`img3`))
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_products`
--

LOCK TABLES `tbl_products` WRITE;
/*!40000 ALTER TABLE `tbl_products` DISABLE KEYS */;
INSERT INTO `tbl_products` VALUES (16,'teste','test','tets','uploads/products/20250903_68b857d34c75c_Pastel Elegance_ Minimalist Beauty.png',NULL,NULL,2,2,2,'2025-09-03 20:29:31',1),(17,'101','200','100','uploads/products/20250903_68b8633e2650b_ticket-SBKQKYOID75XY.png',NULL,NULL,2,9,5,'2025-09-03 20:33:39',1),(18,'Test','hello','test','uploads/products/20250903_68b8651ab9a3f_Pastel Elegance_ Minimalist Beauty.png',NULL,NULL,1,1,3,'2025-09-03 21:26:10',1);
/*!40000 ALTER TABLE `tbl_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subcategory`
--

DROP TABLE IF EXISTS `tbl_subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_subcategory` (
  `subcategoryid` int NOT NULL AUTO_INCREMENT,
  `sname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `categoryid` int NOT NULL,
  `added_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subcategoryid`),
  KEY `categoryid` (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subcategory`
--

LOCK TABLES `tbl_subcategory` WRITE;
/*!40000 ALTER TABLE `tbl_subcategory` DISABLE KEYS */;
INSERT INTO `tbl_subcategory` VALUES (1,'sports',1,'2023-12-07 00:00:00'),(2,'sports',2,'2023-12-07 00:00:00'),(3,'sports',3,'2023-12-07 00:00:00'),(9,'Slippers',2,'2023-12-07 00:00:00'),(10,'Sport',0,'2023-12-09 00:00:00');
/*!40000 ALTER TABLE `tbl_subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_unit`
--

DROP TABLE IF EXISTS `tbl_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_unit` (
  `unit_id` int NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(20) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`unit_id`),
  UNIQUE KEY `unit_name` (`unit_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_unit`
--

LOCK TABLES `tbl_unit` WRITE;
/*!40000 ALTER TABLE `tbl_unit` DISABLE KEYS */;
INSERT INTO `tbl_unit` VALUES (1,'ml','2025-09-03 18:19:04'),(6,'LTR','2025-09-03 18:27:52'),(7,'GM','2025-09-03 18:46:25');
/*!40000 ALTER TABLE `tbl_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` text COLLATE utf8mb4_general_ci NOT NULL,
  `gender` text COLLATE utf8mb4_general_ci NOT NULL,
  `city` int NOT NULL,
  `registered_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city` (`city`),
  CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`city`) REFERENCES `tblcity` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'ADMIN','raviavaiya03@gmail.com','$2y$10$qwrYGZcaWD5ZM82IKnKUauWX1nhYorDL7AQSMDsdT4427WDMjh/qG','8799559020','male',29,'2023-12-07 00:00:00',0),(2,'Ravi Avaiya','21bmiit007@gmail.com','$2y$10$7PF3B4dy.oyoSVg/DY11PuStvnKwAc2y3iKpKXDIA/j1qxzIw5Lzm','9825737303','male',32,'2023-12-07 00:00:00',1),(3,'sahil devani','21bmiit108@gmail.com','$2y$10$YirPI/yiKVJNh5NwzTzYYeb6g0o/s5gLUeEhveEQ/GYyWeFjS8eDi','9714408277','male',31,'2023-12-09 00:00:00',1),(4,'parth sangani','parthsangani45@gmail.com','$2y$10$07fEbydJGr6QUK5vvGkE5uD3tLxt/T4Fhyvj9xDu06CRog79621w2','8401656116','male',30,'2023-12-09 00:00:00',1);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_wishlist`
--

DROP TABLE IF EXISTS `tbl_wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_wishlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `productid` (`product_id`),
  KEY `userid` (`user_id`),
  CONSTRAINT `productid` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`) ON DELETE CASCADE,
  CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_wishlist`
--

LOCK TABLES `tbl_wishlist` WRITE;
/*!40000 ALTER TABLE `tbl_wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_wishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcity`
--

DROP TABLE IF EXISTS `tblcity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `sid` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cityName` (`name`),
  KEY `stateFK` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcity`
--

LOCK TABLES `tblcity` WRITE;
/*!40000 ALTER TABLE `tblcity` DISABLE KEYS */;
INSERT INTO `tblcity` VALUES (1,'East Godavari',1),(2,'West Godavari',1),(3,'Chittoor',1),(4,'Krishna',1),(5,'Guntur',1),(6,'Papum Pare',2),(7,'East Kameng',2),(8,'West Kameng',2),(9,'Changlang',2),(10,'Tirap',2),(11,'Kamrup Metropolitan',3),(12,'Kamrup Rural',3),(13,'Nagaon',3),(14,'Dibrugarh',3),(15,'Sonitpur',3),(16,'Patna',4),(17,'Muzaffarpur',4),(18,'Gaya',4),(19,'Bhagalpur',4),(20,'Nalanda',4),(21,'Raipur',5),(22,'Durg',5),(23,'Bilaspur',5),(24,'Surguja',5),(25,'Korba',5),(26,'North Goa',6),(27,'South Goa',6),(28,'Ahmedabad',7),(29,'Surat',7),(30,'Vadodara',7),(31,'Rajkot',7),(32,'Bhavnagar',7),(33,'Faridabad',8),(34,'Gurugram',8),(35,'Rohtak',8),(36,'Hisar',8),(37,'Sonipat',8),(38,'Kangra',9),(39,'Shimla',9),(40,'Mandi',9),(41,'Solan',9),(42,'Una',9),(43,'Srinagar',10),(44,'Jammu',10),(45,'Baramulla',10),(46,'Anantnag',10),(47,'Pulwama',10),(48,'Ranchi',11),(49,'East Singhbhum',11),(50,'Dhanbad',11),(51,'Bokaro',11),(52,'Hazaribagh',11),(53,'Bangalore Urban',12),(54,'Bangalore Rural',12),(55,'Belgaum',12),(56,'Mysore',12),(57,'Tumkur',12),(58,'Thiruvananthapuram',13),(59,'Ernakulam',13),(60,'Thrissur',13),(61,'Kozhikode',13),(62,'Kollam',13),(63,'Indore',14),(64,'Bhopal',14),(65,'Jabalpur',14),(66,'Gwalior',14),(67,'Ujjain',14),(68,'Mumbai City',15),(69,'Mumbai Suburban',15),(70,'Thane',15),(71,'Pune',15),(72,'Nagpur',15),(73,'Imphal West',16),(74,'Imphal East',16),(75,'East Khasi Hills',17),(76,'West Garo Hills',17),(77,'Aizawl',18),(78,'Dimapur',19),(79,'Kohima',19),(80,'Khordha',20),(81,'Cuttack',20),(82,'Ganjam',20),(83,'Puri',20),(84,'Balasore',20),(85,'Ludhiyan',21),(86,'Amritsar',21),(87,'Jalandhar',21),(88,'Patiala',21),(89,'Bathinda',21),(90,'Jaipur',22),(91,'Jodhpur',22),(92,'Kota',22),(94,'Bikaner',22),(95,'Ajmer',22),(96,'East Sikkim',23),(97,'Chennai',24),(98,'Coimbatore',24),(99,'Chengalpattu',24),(100,'Thiruvallur',24),(101,'Madurai',24),(102,'Hyderabad',25),(103,'Rangareddy',25),(104,'Medchal-Malkajgiri',25),(105,'Warangal Urban',25),(106,'Karimnagar',25),(107,'West Tripura',26),(108,'Gomati',26),(109,'South Tripura',26),(110,'Unakoti',26),(111,'North Tripura',26),(112,'Lucknow',27),(113,'Kanpur',27),(114,'Ghaziabad',27),(115,'Agra',27),(116,'Varanasi',27),(117,'Dehradun',28),(118,'Haridwar',28),(119,'Nainital',28),(120,'Udham Singh Singh',28),(121,'Pauri Garhwal',28),(122,'Kolkata',29),(123,'North 24 Parganas',29),(125,'South 24 Parganas',29),(126,'Howrah',29),(127,'Hooghly',29);
/*!40000 ALTER TABLE `tblcity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblstate`
--

DROP TABLE IF EXISTS `tblstate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblstate` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stateName` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblstate`
--

LOCK TABLES `tblstate` WRITE;
/*!40000 ALTER TABLE `tblstate` DISABLE KEYS */;
INSERT INTO `tblstate` VALUES (1,'Andhra Pradesh'),(2,'Arunachal Pradesh'),(3,'Assam'),(4,'Bihar'),(5,'Chhattisgarh'),(6,'Goa'),(7,'Gujarat'),(8,'Haryana'),(9,'Himachal Pradesh'),(10,'Jammu & Kashmir'),(11,'Jharkhand'),(12,'Karnataka'),(13,'Kerala'),(14,'Madhya Pradesh'),(15,'Maharashtra'),(16,'Manipur'),(17,'Meghalaya'),(18,'Mizoram'),(19,'Nagaland'),(20,'Odisha'),(21,'Punjab'),(22,'Rajasthan'),(23,'Sikkim'),(24,'Tamil Nadu'),(25,'Telangana'),(26,'Tripura'),(27,'Uttar Pradesh'),(28,'Uttarakhand'),(29,'West Bengal');
/*!40000 ALTER TABLE `tblstate` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-04 11:44:48
