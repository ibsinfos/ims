-- MySQL dump 10.13  Distrib 5.5.25a, for Win32 (x86)
--
-- Host: localhost    Database: book_stocks
-- ------------------------------------------------------
-- Server version	5.5.25a

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
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(200) NOT NULL,
  `book_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,'123',1,2,2000.00,'2012-06-01','ryan'),(2,'456',2,3,2500.00,'2012-06-02','ryan'),(3,'789',2,4,4500.00,'2012-06-03','test'),(4,'789',3,2,5000.00,'2012-06-03','test'),(5,'987',5,6,8000.00,'2012-06-04','ryan'),(6,'123',1,2,2000.00,'2012-06-01','ryan'),(7,'456',2,3,2500.00,'2012-06-02','ryan'),(8,'789',2,4,4500.00,'2012-06-03','test'),(9,'789',3,2,5000.00,'2012-06-03','test'),(10,'987',5,6,8000.00,'2012-06-04','ryan');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_author`
--

DROP TABLE IF EXISTS `tbl_author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_author` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(100) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_author`
--

LOCK TABLES `tbl_author` WRITE;
/*!40000 ALTER TABLE `tbl_author` DISABLE KEYS */;
INSERT INTO `tbl_author` VALUES (1,'Garcia Markez'),(2,'Alberto Moravia'),(3,'J. K. Rowling');
/*!40000 ALTER TABLE `tbl_author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_books`
--

DROP TABLE IF EXISTS `tbl_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(100) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `publish_date` date NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `book_image` varchar(200) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_books`
--

LOCK TABLES `tbl_books` WRITE;
/*!40000 ALTER TABLE `tbl_books` DISABLE KEYS */;
INSERT INTO `tbl_books` VALUES (3,'Harry Potter','0-7475-3269-9','$25','asdf afasfeasdfa','1997-06-26','Bloomsbury','Garcia Markez','1368875674_book01.jpg'),(4,'Harry Potter','0-7475-3269-9','$25','asdf afasfeasdfa','1997-06-26','Bloomsbury','Garcia Markez','1368875758_book01.jpg'),(5,'Harry Potter','0-7475-3269-9','$25','asdfa sdga','1997-06-26','Bloomsbury','J. K. Rowling',''),(6,'love in the time of cholera','41234-43-3434','$25','sdfa fsagsd','1997-06-26','Bloomsbury','Garcia Markez','1368876042_book.jpg'),(7,'','','','','0000-00-00','Bloomsbury','Garcia Markez',''),(8,'amfkc','fcsk','$10','vsdv','2002-05-07','Bloomsbury','Alberto Moravia','1368878065_book.jpg'),(9,'','','','','0000-00-00','Bloomsbury','Garcia Markez',''),(10,'','','','','0000-00-00','Bloomsbury','Garcia Markez','');
/*!40000 ALTER TABLE `tbl_books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_publisher`
--

DROP TABLE IF EXISTS `tbl_publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_publisher` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(50) NOT NULL,
  PRIMARY KEY (`publisher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_publisher`
--

LOCK TABLES `tbl_publisher` WRITE;
/*!40000 ALTER TABLE `tbl_publisher` DISABLE KEYS */;
INSERT INTO `tbl_publisher` VALUES (3,'Bloomsbury');
/*!40000 ALTER TABLE `tbl_publisher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_access`
--

DROP TABLE IF EXISTS `tbl_user_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_access` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level` varchar(45) NOT NULL,
  `remark` varchar(100) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_access`
--

LOCK TABLES `tbl_user_access` WRITE;
/*!40000 ALTER TABLE `tbl_user_access` DISABLE KEYS */;
INSERT INTO `tbl_user_access` VALUES (1,'admin','have all the access'),(2,'customer','limited access'),(3,'front_staff',''),(4,'store_keeper','');
/*!40000 ALTER TABLE `tbl_user_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nic` varchar(45) DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'admin','3c057cb2b41f22c0e740974d7a428918','test@gmail.com',NULL,NULL,NULL,NULL,'',NULL,1),(2,'mad','1234','mmmm@gmail.com',NULL,NULL,NULL,NULL,'',NULL,2),(3,'upek','12','qwer@yahoo.com',NULL,NULL,NULL,NULL,'',NULL,2),(4,'mmup','1235','mmmmmm@gmail.com',NULL,NULL,NULL,NULL,'',NULL,2),(5,'madhimm','4397a09c4cb35e85a293b857c53c00ca','madupek@gmail.com','Madhavi','Upeksha','1989-12-17','898523217V','0774111420','',1),(6,'ryan','123','ryn.asdf@sad.com','Madhavi','Upeksha','1989-12-17','898523217V','0774111420','1364642753_logo-1.png',1),(9,'jehan','1234','ryan.jehan@gmail.com','Ryan','Benjamin','1987-07-15','871970068V','0777596006','',2),(10,'Ben','1234','madhavi.upeksha@gmil.com','Madhavi','Benjamin','1987-07-15','871970068V','0777596006','',2),(11,'gayani','123','gpitiyage@gmail.com','Gayani','Pitiyage','1979-01-02','795023217V','0112789538','1365244339_1363966180_002.png',1),(12,'raji','81dc9bdb52d04dc20036dbd8313ed055','rcpitiyage@yahoo.com','Rajitha','Pitiyage','1980-12-31','803662666V','0777218642','',2),(13,'thushi','79d8ac368a35c13fa202a2bc64a6de07','thushani.withanage@gmail.com','thushani','withanage','1989-12-24','898594106V','0715177557','1365248021_user_02.png',2),(14,'thushi','79d8ac368a35c13fa202a2bc64a6de07','thushani.withanage@gmail.com','thushani','withanage','1989-12-24','898594106V','0715177557','1365249018_user_02.png',2),(15,'sheno','3aea9319c79c129bb84158f59d24be73','mahpitiyage@yahoo.com','Shenoli','Jayasinghe','1989-12-17','898523217V','0134276507','1365249324_user_02.png',2),(16,'uma','8cc7b66b38555b2dd550623ead7dcd9b','uma@gmail.com','Umasha','Madanayaka','1989-12-13','898484321V','0771559808','1366356633_user_02.png',2),(17,'nadee','6f8081e7155b2abfec36e7ec254dc7f6','nadee@gmail.com','Nadeesha','Rathnayaka','1989-03-06','895643217V','0778124398','1366357083_user_02.png',3),(18,'hasara','657af33d1a3dd3241b73cffb8c167739','hasaram@gmail.com','Hasara','Mendis','1989-03-20','890795432V','0775432872','1366357555_user01.png',4),(19,'sdkv','827ccb0eea8a706c4c34a16891f84e7b','msdfvs@gmail.com','fwfws','gtreyger','1989-12-13','890877654V','0986548761','',2),(20,'ryanm','63faf9a9e04759f4ece532f53c0c8129','jehan@gmail.com','jehan','ryan','1987-07-15','871970068V','0777596006','1366358626_user01.png',1),(21,'waru','81dc9bdb52d04dc20036dbd8313ed055','waru@gmail.com','Warunika','Sandeepani','1984-10-08','847823062V','0778543789','1366360017_user_02.png',2),(22,'madhi','202cb962ac59075b964b07152d234b70','madupek@gmail.com','ryan','ben','1987-04-09','871970068V','0771559808','1366442307_1363966180_002.png',1);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-07-13 15:58:47
