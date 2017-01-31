-- MySQL dump 10.13  Distrib 5.5.25a, for Win32 (x86)
--
-- Host: localhost    Database: ims
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
-- Table structure for table `tbl_allocation`
--

DROP TABLE IF EXISTS `tbl_allocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_allocation` (
  `allocation_id` int(10) NOT NULL AUTO_INCREMENT,
  `schedule_id` int(11) NOT NULL,
  `class_id` int(10) NOT NULL,
  `resource_id` varchar(20) NOT NULL,
  PRIMARY KEY (`allocation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_allocation`
--

LOCK TABLES `tbl_allocation` WRITE;
/*!40000 ALTER TABLE `tbl_allocation` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_allocation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_assignment_marks`
--

DROP TABLE IF EXISTS `tbl_assignment_marks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_assignment_marks` (
  `Assignment_mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `Marks` varchar(25) NOT NULL,
  `checked_on` date NOT NULL,
  PRIMARY KEY (`Assignment_mark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_assignment_marks`
--

LOCK TABLES `tbl_assignment_marks` WRITE;
/*!40000 ALTER TABLE `tbl_assignment_marks` DISABLE KEYS */;
INSERT INTO `tbl_assignment_marks` VALUES (1,0,0,'$marks','0000-00-00'),(2,12,2,'44','2013-08-19'),(3,14,2,'15','2013-08-19'),(4,12,2,'33','2013-08-19'),(5,14,2,'3','2013-08-19'),(6,12,2,'45','2013-08-19'),(7,14,2,'5','2013-08-19'),(8,12,2,'12','2013-08-19'),(9,14,2,'2','2013-08-19'),(10,12,2,'89','2013-08-19'),(11,14,2,'90','2013-08-19'),(12,29,2,'91','2013-08-19'),(13,12,1,'75','2013-08-23'),(14,14,1,'70','2013-08-23'),(15,29,1,'80','2013-08-23'),(16,1,3,'80','2013-09-06'),(17,2,3,'60','2013-09-06'),(18,4,3,'92','2013-09-06'),(19,5,3,'55','2013-09-06');
/*!40000 ALTER TABLE `tbl_assignment_marks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_assignments`
--

DROP TABLE IF EXISTS `tbl_assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_assignments` (
  `assignment_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `uploaded_date` date NOT NULL,
  `due_date` date NOT NULL,
  `content` varchar(1000) NOT NULL,
  `course_id` int(11) NOT NULL,
  `file` varchar(300) NOT NULL,
  `uploaded by` varchar(25) NOT NULL,
  PRIMARY KEY (`assignment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_assignments`
--

LOCK TABLES `tbl_assignments` WRITE;
/*!40000 ALTER TABLE `tbl_assignments` DISABLE KEYS */;
INSERT INTO `tbl_assignments` VALUES (1,'Assignment 01','2013-08-14','2013-08-21','<div align=\"center\"><b><u>Science Assignment</u></b><br></div><b><u><span style=\"color:rgb(0, 148, 133);\"></span></u></b>',21,'','20'),(2,'Assignment 02','2013-08-16','2013-08-31','<ul><li><b><u><span style=\"color:rgb(0, 148, 133);\"><b><u><span style=\"color:rgb(0, 148, 133);\"><u style=\"color: rgb(0, 148, 133);\"><span style=\"color: rgb(252, 229, 205);\"><span style=\"color:rgb(252,229,205);\"><a style=\"color:rgb(252,229,205);\"><span style=\"color: rgb(39, 78, 19);\"><span style=\"color: rgb(39, 78, 19);\"><span style=\"color: rgb(39, 78, 19);\"><span style=\"color: rgb(39, 78, 19);\"><span style=\"color: rgb(39, 78, 19);\">2<sup style=\"color: rgb(39, 78, 19);\">nd</sup>Assignment</span></span></span></span></span></a><a style=\"color: rgb(39, 78, 19);\">&nbsp;</a></span></span></u></span></u></b></span></u></b></li></ul><b><u><b><u><b><u><span style=\"color:rgb(0, 148, 133);\"></span></u></b></u></b></u></b>',21,'1376653539_assignment02.txt','20'),(3,'Assignment 01 - Functions','2013-09-06','2013-09-19','<b><u><span style=\"color:rgb(0, 148, 133);\"><ul><li>Explain Functions</li></ul></span></u></b>',37,'1376653539_assignment02.txt','11');
/*!40000 ALTER TABLE `tbl_assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_classroom`
--

DROP TABLE IF EXISTS `tbl_classroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_classroom` (
  `classroom_id` int(10) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(10) NOT NULL,
  `classroom_type` varchar(25) NOT NULL,
  `size` varchar(10) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `availability` int(2) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`classroom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_classroom`
--

LOCK TABLES `tbl_classroom` WRITE;
/*!40000 ALTER TABLE `tbl_classroom` DISABLE KEYS */;
INSERT INTO `tbl_classroom` VALUES (1,'F1',' ','25','floor_one','KEY INST building',1,'no projector '),(2,'F2',' ','','floor_one','',0,''),(3,'F3',' ','','floor_one','',0,'first floor\r\n'),(5,'S1','Lecture hall','200','floor_two','KEY INST building',0,'max students 225');
/*!40000 ALTER TABLE `tbl_classroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course`
--

DROP TABLE IF EXISTS `tbl_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_category` int(11) NOT NULL,
  `course_name` varchar(40) NOT NULL,
  `teacher` varchar(80) NOT NULL,
  `fee` varchar(10) NOT NULL,
  `description` varchar(40) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course`
--

LOCK TABLES `tbl_course` WRITE;
/*!40000 ALTER TABLE `tbl_course` DISABLE KEYS */;
INSERT INTO `tbl_course` VALUES (1,1,'ELOCUTION','7','600','elocution classes for grade 2'),(2,1,'Sinhala','4','600','Sinhala classes for grade 2'),(3,2,'ELOCUTION','7','650','Elocution classes'),(4,2,'Sinhala','4','650','Sinhala language'),(5,3,'Scholarship','3','600','scholarship oriented'),(6,4,'Scholarship','3','600','scholarship oriented'),(7,5,'Mathematics','8','900','group class'),(8,5,'Sinhala','4','700','Mass class'),(9,5,'English','7','950','English language and Spoken english'),(10,6,'Sinhala','4','750','grade 7 sinhala group class'),(11,6,'English','7','1000','Group class'),(12,6,'Science','1','800','mass class'),(13,6,'Mathematics','8','1000','group class'),(14,7,'Science','1','800','Mass class'),(15,7,'Mathematics','8','900','Mass class'),(16,7,'Sinhala','4','500','Mass class'),(17,7,'English','7','600','Mass class'),(18,8,'Science','1','700','Mass Class'),(19,8,'Social studies','3','700','group class'),(20,8,'English','7','750','group'),(21,8,'Mathematics','8','800','Mass Class'),(22,8,'IT','5','1000','Mass Class'),(23,9,'Commerce','2','700','Group class'),(24,9,'Science','1','600','Mass Class'),(25,9,'Mathematics','8','800','O/L maths'),(26,9,'Sinhala','3','550','O/L sinhala'),(27,9,'English','7','700','Mass Class'),(28,9,'English Literature','7','1000','O/L English literature'),(29,9,'O/L ICT','5','950','O/L syllabus oriented'),(30,10,'O/L ICT','5','850','O/L ICT'),(31,10,'Sinhala','3','500','Mass Class'),(32,10,'Commerce','2','700','Mass Class'),(33,10,'Mathematics','8','1000','Mass'),(34,10,'English','7','450','Mass Class'),(35,10,'English Literature','7','650','Group Class'),(36,10,'Science','1','500','Mass Class'),(37,11,'Combined Maths','8','1200','Group class'),(38,11,'Chemistry','9','1200','A/L chemistry'),(39,11,'Physics','10','950','Mass Class'),(40,11,'Biology','1','900','A/L biology'),(41,12,'Accounting','2','1100','Mass class'),(42,12,'Business Studies','11','800','Mass Class'),(43,12,'Economics','2','1000','for both arts and commerce students'),(44,13,'Logic','4','750','Mass Class'),(45,13,'Sinhala Literature','3','800','Sinahala lit for A/L students'),(46,13,'Drama','3','900','Drama subject'),(47,14,'Spoken English','7','1500','General course'),(48,15,'Graphic Designing','6','2500','6 months');
/*!40000 ALTER TABLE `tbl_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course_category`
--

DROP TABLE IF EXISTS `tbl_course_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course_category` (
  `course_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_category_name` varchar(40) NOT NULL,
  `description` varchar(80) NOT NULL,
  PRIMARY KEY (`course_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course_category`
--

LOCK TABLES `tbl_course_category` WRITE;
/*!40000 ALTER TABLE `tbl_course_category` DISABLE KEYS */;
INSERT INTO `tbl_course_category` VALUES (1,'Grade 2','classes for grade 2 students'),(2,'Grade 3','classes for grade 3 students'),(3,'Grade 4','Scholarship based classes'),(4,'Grade 5','Scholarship based classes'),(5,'Grade 6','classes for grade 6 students'),(6,'Grade 7','classes for grade 7 students'),(7,'Grade 8','classes for grade 8 students'),(8,'Grade 9','classes for grade 9 students'),(9,'Grade 10','O/L examination target class'),(10,'Grade 11','O/L examination target class'),(11,'A/L Science ','Science stream subjects'),(12,'A/L Commerce','Commerce Stream  subjects'),(13,'A/L Arts','Arts stream subjects'),(14,'Proffessional','Professional courses for adults'),(15,'IT','Short courses');
/*!40000 ALTER TABLE `tbl_course_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course_drops`
--

DROP TABLE IF EXISTS `tbl_course_drops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course_drops` (
  `course_drop_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `drop_date` datetime NOT NULL,
  PRIMARY KEY (`course_drop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course_drops`
--

LOCK TABLES `tbl_course_drops` WRITE;
/*!40000 ALTER TABLE `tbl_course_drops` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_course_drops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course_evaluation`
--

DROP TABLE IF EXISTS `tbl_course_evaluation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course_evaluation` (
  `course_evaluation_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question_one` int(11) NOT NULL,
  `question_two` int(11) NOT NULL,
  `question_three` int(11) NOT NULL,
  `question_four` int(11) NOT NULL,
  `question_five` int(11) NOT NULL,
  `question_six` varchar(300) NOT NULL,
  PRIMARY KEY (`course_evaluation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course_evaluation`
--

LOCK TABLES `tbl_course_evaluation` WRITE;
/*!40000 ALTER TABLE `tbl_course_evaluation` DISABLE KEYS */;
INSERT INTO `tbl_course_evaluation` VALUES (1,12,25,5,4,4,4,3,'afs\r\n         '),(2,12,15,2,2,3,3,2,'\r\n         '),(3,12,21,5,5,5,5,4,'Test'),(4,12,4,3,2,1,1,0,''),(5,12,21,2,3,4,2,3,'sada');
/*!40000 ALTER TABLE `tbl_course_evaluation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course_payment_scheme`
--

DROP TABLE IF EXISTS `tbl_course_payment_scheme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course_payment_scheme` (
  `payment_scheme_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment` varchar(25) NOT NULL,
  `amount` varchar(40) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_scheme_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course_payment_scheme`
--

LOCK TABLES `tbl_course_payment_scheme` WRITE;
/*!40000 ALTER TABLE `tbl_course_payment_scheme` DISABLE KEYS */;
INSERT INTO `tbl_course_payment_scheme` VALUES (1,'admission','1000','');
/*!40000 ALTER TABLE `tbl_course_payment_scheme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_course_payments`
--

DROP TABLE IF EXISTS `tbl_course_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_course_payments` (
  `course_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `recip_id` varchar(15) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(10) NOT NULL,
  `remark` varchar(40) NOT NULL,
  `late_status` int(11) NOT NULL,
  PRIMARY KEY (`course_payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=320 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course_payments`
--

LOCK TABLES `tbl_course_payments` WRITE;
/*!40000 ALTER TABLE `tbl_course_payments` DISABLE KEYS */;
INSERT INTO `tbl_course_payments` VALUES (1,'PR001',1,37,'full','2011-01-06','1200','',0),(2,'PR001',1,39,'full','2011-09-04','950','',0),(3,'PR001',1,38,'full','2011-09-04','1200','',0),(4,'PR002',2,37,'full','2011-01-15','1200','',0),(5,'PR002',2,39,'full','2011-01-15','950','',0),(6,'',3,39,'full','2011-09-05','950','',0),(7,'',3,40,'full','2011-09-05','900','',0),(8,'',4,37,'full','2011-09-05','1200','',0),(9,'',4,39,'full','2011-09-05','950','',0),(10,'',5,37,'full','2011-09-05','1200','',0),(11,'',5,38,'full','2011-09-05','1200','',0),(12,'',6,38,'full','2011-09-05','1200','',0),(13,'',6,39,'full','2011-09-05','950','',0),(14,'',7,38,'full','2011-09-05','1200','',0),(15,'',7,40,'full','2011-09-05','900','',0),(17,'',8,41,'full','2011-05-05','1100','',0),(18,'',8,42,'full','2011-05-05','800','',0),(19,'',8,43,'full','2011-05-05','1000','',0),(20,'',9,41,'full','2011-04-20','1100','',0),(21,'',9,43,'full','2011-04-20','1000','',0),(22,'',10,42,'full','2011-04-01','800','',0),(23,'',10,43,'full','2011-04-01','1000','',0),(24,'',11,41,'full','2011-05-05','1100','',0),(25,'',11,42,'full','2011-05-05','800','',0),(26,'',11,43,'full','2011-05-05','1000','',0),(27,'',12,41,'full','2011-06-05','1100','',0),(28,'',12,43,'full','2011-06-05','1000','',0),(29,'',13,43,'full','2011-01-05','1000','',0),(30,'',13,44,'full','2011-01-05','750','',0),(31,'',13,45,'full','2011-01-05','800','',0),(32,'',14,44,'full','2011-06-05','750','',0),(33,'',14,45,'full','2011-06-05','800','',0),(34,'',14,46,'full','2011-06-05','900','',0),(35,'',15,44,'full','2011-06-05','750','',0),(36,'',15,46,'full','2011-06-05','900','',0),(37,'',16,44,'full','2011-01-05','750','',0),(38,'',16,46,'full','2011-01-05','900','',0),(39,'',17,44,'full','2011-04-20','750','',0),(40,'',17,45,'full','2011-04-20','800','',0),(41,'',18,30,'full','2011-01-05','850','',0),(42,'',18,31,'full','2011-01-05','500','',0),(43,'',18,33,'full','2011-01-05','1000','',0),(44,'',18,35,'full','2011-01-05','650','',0),(45,'',18,36,'full','2011-01-05','500','',0),(46,'',19,32,'full','2011-04-01','700','',0),(47,'',19,34,'full','2011-04-01','450','',0),(48,'',19,35,'full','2011-04-01','650','',0),(49,'',20,30,'full','2011-04-20','850','',0),(50,'',21,31,'full','2011-04-20','500','',0),(51,'',21,35,'full','2011-04-20','650','',0),(52,'',21,23,'full','2011-01-05','700','',0),(53,'',21,25,'full','2011-01-05','800','',0),(54,'',21,26,'full','2011-01-05','550','',0),(55,'',21,29,'full','2011-01-05','950','',0),(56,'',22,23,'full','2011-04-01','700','',0),(57,'',22,24,'full','2011-04-01','600','',0),(58,'',22,25,'full','2011-04-01','800','',0),(59,'',22,27,'full','2011-04-01','700','',0),(60,'',23,26,'full','2011-06-05','550','',0),(61,'',23,27,'full','2011-06-05','700','',0),(62,'',23,28,'full','2011-06-05','1000','',0),(63,'',24,24,'full','2011-01-05','600','',0),(64,'',24,25,'full','2011-01-05','800','',0),(65,'',24,26,'full','2011-01-05','550','',0),(66,'',25,18,'full','2011-04-01','700','',0),(67,'',25,19,'full','2011-04-01','700','',0),(68,'',25,22,'full','2011-04-01','1000','',0),(69,'',26,19,'full','2011-01-05','700','',0),(70,'',26,20,'full','2011-01-05','750','',0),(71,'',26,21,'full','2011-01-05','800','',0),(72,'',27,22,'full','2011-01-05','1000','',0),(73,'',27,18,'full','2011-01-05','700','',0),(74,'',28,22,'full','2011-01-05','1000','',0),(136,'',28,17,'full','2011-01-15','600','',0),(137,'',28,16,'full','2011-01-15','500','',0),(138,'',28,14,'full','2011-01-15','800','',0),(139,'',29,17,'full','2011-01-25','600','',0),(140,'',29,15,'full','2011-01-25','900','',0),(141,'',29,14,'full','2011-01-25','800','',0),(142,'',30,13,'full','2011-01-30','1000','',0),(143,'',30,11,'full','2011-01-30','1000','',0),(144,'',30,10,'full','2011-01-30','750','',0),(145,'',31,12,'full','2011-01-15','800','',0),(146,'',31,11,'full','2011-01-15','1000','',0),(147,'',31,10,'full','2011-01-15','750','',0),(148,'',32,4,'full','2011-02-06','650','',0),(149,'',32,3,'full','2011-02-06','650','',0),(150,'',33,2,'full','2011-01-15','600','',0),(151,'',33,1,'full','2011-01-15','600','',0),(152,'',34,9,'full','2011-01-25','950','',0),(153,'',34,8,'full','2011-01-25','700','',0),(154,'',34,7,'full','2011-01-25','900','',0),(155,'',35,9,'full','2011-02-06','950','',0),(156,'',35,7,'full','2011-02-06','900','',0),(157,'',36,9,'full','2011-02-06','950','',0),(158,'',36,8,'full','2011-02-06','700','',0),(159,'',37,6,'full','2012-01-15','600','',0),(160,'',38,6,'full','2011-01-25','600','',0),(161,'',39,5,'full','2011-02-06','600','',0),(162,'',40,5,'full','2012-01-15','600','',0),(163,'',41,2,'full','2011-01-25','600','',0),(164,'',42,3,'full','2011-01-30','650','',0),(167,'',0,41,'full','2012-05-05','1100','',0),(168,'',0,42,'full','2012-05-05','800','',0),(169,'',0,43,'full','2012-05-05','1000','',0),(170,'',0,41,'full','2012-04-20','1100','',0),(171,'',0,43,'full','2012-04-20','1000','',0),(172,'',0,42,'full','2012-04-01','800','',0),(173,'',0,43,'full','2012-04-01','1000','',0),(174,'',0,41,'full','2012-05-05','1100','',0),(175,'',0,42,'full','2012-05-05','800','',0),(176,'',0,43,'full','2012-05-05','1000','',0),(177,'',0,41,'full','2012-06-05','1100','',0),(178,'',0,43,'full','2012-06-05','1000','',0),(179,'',0,43,'full','2012-01-05','1000','',0),(180,'',0,45,'full','2012-06-05','800','',0),(181,'',0,45,'full','2012-06-05','800','',0),(182,'',0,44,'full','2012-06-05','750','',0),(183,'',0,45,'full','2012-06-05','800','',0),(184,'',0,46,'full','2012-06-05','900','',0),(185,'',0,44,'full','2012-06-05','750','',0),(186,'',0,46,'full','2012-06-05','900','',0),(187,'',0,44,'full','2012-01-05','750','',0),(188,'',0,46,'full','2012-01-05','900','',0),(189,'',0,44,'full','2012-04-20','750','',0),(190,'',0,45,'full','2012-04-20','800','',0),(191,'',0,30,'full','2012-01-05','850','',0),(192,'',0,31,'full','2012-01-05','500','',0),(193,'',0,33,'full','2012-01-05','1000','',0),(194,'',0,35,'full','2012-01-05','650','',0),(195,'',0,36,'full','2012-01-05','500','',0),(196,'',0,32,'full','2012-04-01','700','',0),(197,'',0,34,'full','2012-04-01','450','',0),(198,'',0,35,'full','2012-04-01','650','',0),(199,'',0,30,'full','2012-04-20','850','',0),(200,'',0,31,'full','2012-04-20','500','',0),(201,'',0,35,'full','2012-04-20','650','',0),(202,'',0,23,'full','2012-01-05','700','',0),(203,'',0,25,'full','2012-01-05','800','',0),(204,'',0,26,'full','2012-01-05','550','',0),(205,'',0,29,'full','2012-01-05','950','',0),(206,'',0,23,'full','2012-04-01','700','',0),(207,'',0,24,'full','2012-04-01','600','',0),(208,'',0,25,'full','2012-04-01','800','',0),(209,'',0,27,'full','2012-04-01','700','',0),(210,'',0,26,'full','2012-06-05','550','',0),(211,'',0,27,'full','2012-06-05','700','',0),(212,'',0,28,'full','2012-06-05','1000','',0),(213,'',0,24,'full','2012-01-05','600','',0),(214,'',0,25,'full','2012-01-05','800','',0),(215,'',0,26,'full','2012-01-05','550','',0),(216,'',0,18,'full','2012-04-01','700','',0),(217,'',0,19,'full','2012-04-01','700','',0),(218,'',0,22,'full','2012-04-01','1000','',0),(219,'',0,19,'full','2012-01-05','700','',0),(220,'',0,20,'full','2012-01-05','750','',0),(221,'',0,21,'full','2012-01-05','800','',0),(222,'',0,22,'full','2012-01-05','1000','',0),(223,'',0,18,'full','2012-01-05','700','',0),(224,'',0,22,'full','2012-01-05','1000','',0),(225,'',0,45,'full','2012-06-05','800','',0),(226,'',0,26,'full','2012-01-05','550','',0),(227,'',0,20,'full','2012-01-05','750','',0),(228,'',0,17,'full','2012-01-15','600','',0),(229,'',0,16,'full','2012-01-15','500','',0),(230,'',0,14,'full','2012-01-15','800','',0),(231,'',0,17,'full','2012-01-25','600','',0),(232,'',0,15,'full','2012-01-25','900','',0),(233,'',0,14,'full','2012-01-25','800','',0),(234,'',0,13,'full','2012-01-30','1000','',0),(235,'',0,11,'full','2012-01-30','1000','',0),(236,'',0,10,'full','2012-01-30','750','',0),(237,'',0,12,'full','2012-01-15','800','',0),(238,'',0,11,'full','2012-01-15','1000','',0),(239,'',0,10,'full','2012-01-15','750','',0),(240,'',0,4,'full','2012-02-06','650','',0),(241,'',0,3,'full','2012-02-06','650','',0),(242,'',0,2,'full','2012-01-15','600','',0),(243,'',0,1,'full','2012-01-15','600','',0),(244,'',0,9,'full','2012-01-25','950','',0),(245,'',0,8,'full','2012-01-25','700','',0),(246,'',0,7,'full','2012-01-25','900','',0),(247,'',0,9,'full','2012-02-06','950','',0),(248,'',0,7,'full','2012-02-06','900','',0),(249,'',0,9,'full','2012-02-06','950','',0),(250,'',0,8,'full','2012-02-06','700','',0),(251,'',0,6,'full','2012-01-15','600','',0),(252,'',0,6,'full','2012-01-25','600','',0),(253,'',0,5,'full','2012-02-06','600','',0),(254,'',0,5,'full','2012-01-15','600','',0),(255,'',0,2,'full','2012-01-25','600','',0),(256,'',0,3,'full','2012-01-30','650','',0),(288,'',28,17,'full','2013-01-15','600','',0),(289,'',28,16,'full','2013-01-15','500','',0),(290,'',28,14,'full','2013-01-15','800','',0),(291,'',29,17,'full','2013-01-25','600','',0),(292,'',29,15,'full','2013-01-25','900','',0),(293,'',29,14,'full','2013-01-25','800','',0),(294,'',30,13,'full','2013-01-30','1000','',0),(295,'',30,11,'full','2013-01-30','1000','',0),(296,'',30,10,'full','2013-01-30','750','',0),(297,'',31,12,'full','2013-01-15','800','',0),(298,'',31,11,'full','2013-01-15','1000','',0),(299,'',31,10,'full','2013-01-15','750','',0),(300,'',32,4,'full','2013-02-06','650','',0),(301,'',32,3,'full','2013-02-06','650','',0),(302,'',33,2,'full','2013-01-15','600','',0),(303,'',33,1,'full','2013-01-15','600','',0),(304,'',34,9,'full','2013-01-25','950','',0),(305,'',34,8,'full','2013-01-25','700','',0),(306,'',34,7,'full','2013-01-25','900','',0),(307,'',35,9,'full','2013-02-06','950','',0),(308,'',35,7,'full','2013-02-06','900','',0),(309,'',36,9,'full','2013-02-06','950','',0),(310,'',36,8,'full','2013-02-06','700','',0),(311,'',37,6,'full','2012-01-15','600','',0),(312,'',38,6,'full','2013-01-25','600','',0),(313,'',39,5,'full','2013-02-06','600','',0),(314,'',40,5,'full','2012-01-15','600','',0),(315,'',41,2,'full','2013-01-25','600','',0),(316,'',42,3,'full','2013-01-30','650','',0),(317,'PR003',1,37,'','2013-09-06','','',0),(318,'PR003',1,38,'','2013-09-06','','',0),(319,'PR003',1,39,'half','2013-09-06','475','',1);
/*!40000 ALTER TABLE `tbl_course_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_employees`
--

DROP TABLE IF EXISTS `tbl_employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(5) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(8) NOT NULL,
  `prof_image` varchar(300) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(80) NOT NULL,
  `nic` varchar(11) NOT NULL,
  `login_acc_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_employees`
--

LOCK TABLES `tbl_employees` WRITE;
/*!40000 ALTER TABLE `tbl_employees` DISABLE KEYS */;
INSERT INTO `tbl_employees` VALUES (1,'Mr','Harsha','Gamage','1984-01-15','male','1376377803_user01.png','1','0771598808','Colombo','840159864V',1),(2,'Mr','Ryan','Benjamin','1987-07-15','male','1376377803_user01.png','5','0771234348','Kottawa','871970068V',2),(3,'Miss','Umasha','Samurdhi','1989-12-13','female','1373448568_1373298331_Person_Undefined_Female_Light.png','2','0789342021','Thalawathugoda','898449085V',3),(4,'Mr','Tharaka','Kothalawala','1985-11-15','male','1378387638_1378331440_Client_Male_Light.png','6','0779135875','','853180954V',86);
/*!40000 ALTER TABLE `tbl_employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_late_payments`
--

DROP TABLE IF EXISTS `tbl_late_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_late_payments` (
  `late_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(10) NOT NULL,
  `remark` varchar(40) NOT NULL,
  PRIMARY KEY (`late_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_late_payments`
--

LOCK TABLES `tbl_late_payments` WRITE;
/*!40000 ALTER TABLE `tbl_late_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_late_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lecture_evaluation`
--

DROP TABLE IF EXISTS `tbl_lecture_evaluation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_lecture_evaluation` (
  `lecture_evaluation_Id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question_one` int(11) NOT NULL,
  `question_two` int(11) NOT NULL,
  `question_three` int(11) NOT NULL,
  `question_four` int(11) NOT NULL,
  `question_five` int(11) NOT NULL,
  `question_six` varchar(20) NOT NULL,
  PRIMARY KEY (`lecture_evaluation_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lecture_evaluation`
--

LOCK TABLES `tbl_lecture_evaluation` WRITE;
/*!40000 ALTER TABLE `tbl_lecture_evaluation` DISABLE KEYS */;
INSERT INTO `tbl_lecture_evaluation` VALUES (1,3,25,3,3,3,4,0,''),(2,2,15,3,3,4,3,0,''),(3,12,21,5,5,5,5,5,'Testset ASFASD'),(4,12,5,3,4,1,4,0,''),(5,12,21,5,3,2,4,4,'test test test');
/*!40000 ALTER TABLE `tbl_lecture_evaluation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lecture_hours`
--

DROP TABLE IF EXISTS `tbl_lecture_hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_lecture_hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `act_start` time NOT NULL,
  `act_end` time NOT NULL,
  `total_hours` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lecture_hours`
--

LOCK TABLES `tbl_lecture_hours` WRITE;
/*!40000 ALTER TABLE `tbl_lecture_hours` DISABLE KEYS */;
INSERT INTO `tbl_lecture_hours` VALUES (13,1,16,'08:00:00','10:00:00','2'),(14,1,17,'11:00:00','13:00:00','2'),(15,1,33,'14:30:00','18:30:00','4'),(16,1,51,'13:30:00','16:30:00','3');
/*!40000 ALTER TABLE `tbl_lecture_hours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lecturer_increments`
--

DROP TABLE IF EXISTS `tbl_lecturer_increments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_lecturer_increments` (
  `increment_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `new_amount` varchar(20) NOT NULL,
  PRIMARY KEY (`increment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lecturer_increments`
--

LOCK TABLES `tbl_lecturer_increments` WRITE;
/*!40000 ALTER TABLE `tbl_lecturer_increments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_lecturer_increments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lessons`
--

DROP TABLE IF EXISTS `tbl_lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_lessons` (
  `tbl_lesson_id` int(11) NOT NULL AUTO_INCREMENT,
  `course` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(400) NOT NULL,
  PRIMARY KEY (`tbl_lesson_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lessons`
--

LOCK TABLES `tbl_lessons` WRITE;
/*!40000 ALTER TABLE `tbl_lessons` DISABLE KEYS */;
INSERT INTO `tbl_lessons` VALUES (1,21,'2013-08-10','<b><u><i><span style=\"color:rgb(0, 148, 133);\">Science</span> </i></u></b>'),(2,21,'2013-08-16','<div style=\"height: 153px;\" align=\"center\"><b style=\"height: 153px;\"><u><span style=\"height: 153px;\">Science Assignment</span></u></b><br style=\"height: 153px;\"><br style=\"height: 153px;\"></div><b><u><span style=\"color:rgb(0, 148, 133);\"></span></u></b>'),(5,37,'2013-09-17','<ul><li><span style=\"line-height: normal;\">Real Number Systems</span></li><li><span style=\"line-height: normal;\">boolean algebra</span></li></ul><b><u><span style=\"color:rgb(0, 148, 133);\"></span></u></b>'),(6,37,'2013-09-24','<ol><li><span style=\"line-height: normal;\">Exponential functions</span></li><li><span style=\"line-height: normal;\">functions</span></li></ol><b><u><span style=\"color:rgb(0, 148, 133);\"></span></u></b>');
/*!40000 ALTER TABLE `tbl_lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_notifications`
--

DROP TABLE IF EXISTS `tbl_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `notification_type` varchar(45) NOT NULL,
  `sent_to` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_notifications`
--

LOCK TABLES `tbl_notifications` WRITE;
/*!40000 ALTER TABLE `tbl_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_parent_student_relation`
--

DROP TABLE IF EXISTS `tbl_parent_student_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_parent_student_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_parent_student_relation`
--

LOCK TABLES `tbl_parent_student_relation` WRITE;
/*!40000 ALTER TABLE `tbl_parent_student_relation` DISABLE KEYS */;
INSERT INTO `tbl_parent_student_relation` VALUES (1,1,1),(2,3,3),(3,4,4),(4,5,5),(5,6,6),(6,7,7),(8,8,8),(9,9,9),(10,10,10),(11,11,11),(12,12,12),(13,13,13),(14,14,14),(15,15,15),(16,16,16),(17,17,17),(18,18,18),(19,19,19),(20,20,20),(21,21,21),(22,22,22),(23,23,23),(24,24,24),(25,25,25),(26,26,26),(27,27,27),(28,0,0),(29,28,3),(30,29,6),(31,30,4),(32,31,9),(33,32,3),(34,33,5),(35,34,7),(36,35,8),(37,36,11),(38,37,15),(39,38,19),(40,39,21),(41,40,24),(42,41,16),(43,42,14),(44,0,0),(45,44,28),(46,45,29),(47,46,30),(48,47,12),(49,48,31),(50,49,15),(51,50,32),(52,51,33),(53,52,34),(54,53,35),(55,54,36),(56,55,37),(57,56,17),(58,57,38),(59,58,39),(60,59,40),(61,60,41),(62,61,42),(63,62,18),(64,63,20),(65,64,43),(66,65,44),(67,66,45),(68,67,46),(69,68,47),(70,69,21),(71,70,48),(72,71,49),(73,72,50),(74,73,24),(75,74,51),(76,75,52),(77,76,53),(78,77,26),(79,78,54);
/*!40000 ALTER TABLE `tbl_parent_student_relation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_parents`
--

DROP TABLE IF EXISTS `tbl_parents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_parents` (
  `parent_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_name` varchar(30) NOT NULL,
  `relation` varchar(15) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `parent_contact` varchar(15) NOT NULL,
  `parent_email` varchar(20) NOT NULL,
  `student_id` int(10) NOT NULL,
  `login_acc_id` int(11) NOT NULL,
  PRIMARY KEY (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_parents`
--

LOCK TABLES `tbl_parents` WRITE;
/*!40000 ALTER TABLE `tbl_parents` DISABLE KEYS */;
INSERT INTO `tbl_parents` VALUES (1,'A. Perera','Mother','none','600980986V','795511096','aperera@gmail.com',1,16),(2,'A Jayawardhana','Mother','none','551239868V','771999001','rjaywardana@gmail.co',2,18),(3,'W.Withanage','Mother','none','551231538V','0771999002','wwithanage@gmail.com',3,19),(4,'A Kulathunga','Mother','none','611239869V','0771999006','',4,21),(5,'K Athukorala','Father','Lawyaer','551249869V','0771999005','athukoralaa@ymail.co',5,23),(6,'E Rupasinghe','Father','Doctor','608039872V','0771999004','erupa@ymail.com',6,25),(7,'ASenevirathna','Father','Business ','608739872V','0771999003','hhh@abc.llk',7,27),(8,'t Perera','Mother','doctor','600983986V','771999007','praba@gmail.com',8,30),(9,'y Silva','Father','lawyer','500983986V','771999008','sup@gmail.com',9,32),(10,'u Abeysinghe','Mother','accountant','620983986V','771999009','waru@gmail.com',10,34),(11,'R Wickramanayaka','Father','lawyer','570983986V','771999010','thanu@gmail.com',11,36),(12,'A Silva','Mother','none','645983986V','771999011','thili@gmail.com',12,38),(13,'S Abeysinghe','Father','accountant','530983986V','771999012','saku@gmail.com',13,40),(14,'F Perera','Mother','doctor','560983986V','771999013','Idil@gmail.com',14,42),(15,'H Kulathunga','Mother','none','590983986V','771999014','nadee@gmail.com',15,44),(16,'K Wickramasinghe','Mother','none','6400983986','771999015','dinesha@gmail.com',16,46),(17,'L Silva','Mother','none','653983986V','771999016','hash@gmail.com',17,48),(18,'V Abeysingha','Mother','accountant','614983986V','771999017','akp@gmail.com',18,50),(19,'C Perera','Mother','doctor','541983986V','771999018','thush@gmail.com',19,52),(20,'N Mendis','Mother','lawyer','559983986V','771999019','dil@gmail.com',20,54),(21,'M Abeysinghe','Father','none','495559839V','771999020','kpeiris@gmail.com',21,56),(22,'S Wickramasinghe','Father','none','604983986V','771999021','rhas@gmail.com',22,58),(23,'W Silva','Father','accountant','500983986V','771999022','jehan@gmail.com',23,60),(24,'R Perera','Father','none','650983986V','771999023','upek@gmail.com',24,62),(25,'D Abeysinghe','Mother','doctor','666983986V','771999024','gih@gmail.com',25,64),(26,'B Kulathunga','Father','none','678983986V','771999025','key@idm.lk',26,66),(27,'P Wickramasinghe','Mother','accountant','659983986V','771999026','keys@idmm.lk',27,68),(28,'t Perera','Mother','doctor','600983986V','771999007','praba@gmail.com',44,0),(29,'y Silva','Father','lawyer','500983986V','771999008','sup@gmail.com',45,0),(30,'u Abeysinghe','Mother','accountant','620983986V','771999009','waru@gmail.com',46,0),(31,'R Wickramanayaka','Father','lawyer','570983986V','771999010','thanu@gmail.com',48,0),(32,'A Silva','Mother','none','645983986V','771999011','thili@gmail.com',50,0),(33,'S Abeysinghe','Father','accountant','530983986V','771999012','saku@gmail.com',51,0),(34,'F Perera','Mother','doctor','560983986V','771999013','Idil@gmail.com',52,0),(35,'H Kulathunga','Mother','none','590983986V','771999014','nadee@gmail.com',53,0),(36,'K Wickramasinghe','Mother','none','6400983986','771999015','dinesha@gmail.com',54,0),(37,'L Silva','Mother','none','653983986V','771999016','hash@gmail.com',55,0),(38,'V Abeysingha','Mother','accountant','614983986V','771999017','akp@gmail.com',57,0),(39,'C Perera','Mother','doctor','541983986V','771999018','thush@gmail.com',58,0),(40,'N Mendis','Mother','lawyer','559983986V','771999019','dil@gmail.com',59,0),(41,'M Abeysinghe','Father','none','495559839V','771999020','kpeiris@gmail.com',60,0),(42,'S Wickramasinghe','Father','none','604983986V','771999021','rhas@gmail.com',61,0),(43,'W Silva','Father','accountant','500983986V','771999022','jehan@gmail.com',64,0),(44,'R Perera','Father','none','650983986V','771999023','upek@gmail.com',65,0),(45,'D Abeysinghe','Mother','doctor','666983986V','771999024','gih@gmail.com',66,0),(46,'B Kulathunga','Father','none','678983986V','771999025','key@idm.lk',67,0),(47,'P Wickramasinghe','Mother','accountant','659983986V','771999026','keys@idmm.lk',78,0),(48,'S Wickramasinghe','Father','none','604983986V','771999021','rhas@gmail.com',70,0),(49,'F Perera','Mother','doctor','560983986V','771999013','Idil@gmail.com',71,0),(50,'y Gunarathna','Father','lawyer','500983986V','771999008','sup@gmail.com',72,0),(51,'y Silva','Father','lawyer','500983986V','771999008','sup@gmail.com',74,0),(52,'u Abeysinghe','Mother','accountant','620983986V','771999009','waru@gmail.com',75,0),(53,'H Kulathunga','Father','doctor','604983986V','771999024','akp@gmail.com',76,0),(54,'L Silva','Mother','none','604983986V','771899024','dil@gmail.com',78,0);
/*!40000 ALTER TABLE `tbl_parents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payment_dates`
--

DROP TABLE IF EXISTS `tbl_payment_dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_payment_dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_date` varchar(11) NOT NULL,
  `set_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payment_dates`
--

LOCK TABLES `tbl_payment_dates` WRITE;
/*!40000 ALTER TABLE `tbl_payment_dates` DISABLE KEYS */;
INSERT INTO `tbl_payment_dates` VALUES (1,'15','2012-02-02 11:42:32');
/*!40000 ALTER TABLE `tbl_payment_dates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payments`
--

DROP TABLE IF EXISTS `tbl_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(25) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` varchar(20) NOT NULL,
  `student_id` int(11) NOT NULL,
  `remark` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payments`
--

LOCK TABLES `tbl_payments` WRITE;
/*!40000 ALTER TABLE `tbl_payments` DISABLE KEYS */;
INSERT INTO `tbl_payments` VALUES (1,'admission','2011-01-06','1000',1,''),(2,'admission','2011-01-15','1000',2,'new'),(3,'admission','2011-09-05','1000',3,''),(8,'admission','2011-05-05','1000',8,'new'),(9,'admission','2011-04-20','1000',9,'new'),(10,'admission','2011-04-01','1000',10,'new'),(11,'admission','2011-05-05','1000',11,'new'),(12,'admission','2011-06-05','1000',12,'new'),(13,'admission','2011-01-05','1000',13,'new'),(14,'admission','2011-06-05','1000',14,'new'),(15,'admission','2011-06-05','1000',15,'new'),(16,'admission','2011-01-05','1000',16,'new'),(17,'admission','2011-04-20','1000',17,'new'),(18,'admission','2011-01-05','1000',18,'new'),(19,'admission','2011-04-01','1000',19,'new'),(20,'admission','2011-04-20','1000',20,'new'),(21,'admission','2011-01-05','1000',21,'new'),(22,'admission','2011-04-01','1000',22,'new'),(23,'admission','2011-06-05','1000',23,'new'),(24,'admission','2011-01-05','1000',24,'new'),(25,'admission','2011-04-01','1000',25,'new'),(26,'admission','2011-01-05','1000',26,'new'),(27,'admission','2011-01-05','1000',27,'new'),(29,'admission','2010-05-05','1000',28,'new'),(30,'admission','2010-04-20','1000',29,'new'),(31,'admission','2010-04-01','1000',30,'new'),(32,'admission','2010-05-05','1000',31,'new'),(33,'admission','2010-06-05','1000',32,'new'),(34,'admission','2010-01-05','1000',33,'new'),(35,'admission','2010-06-05','1000',34,'new'),(36,'admission','2010-06-05','1000',35,'new'),(37,'admission','2010-01-05','1000',36,'new'),(38,'admission','2010-04-20','1000',37,'new'),(39,'admission','2010-01-05','1000',38,'new'),(40,'admission','2010-04-01','1000',39,'new'),(41,'admission','2010-04-20','1000',40,'new'),(42,'admission','2010-01-05','1000',41,'new'),(43,'admission','2010-04-01','1000',42,'new');
/*!40000 ALTER TABLE `tbl_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_resource_category`
--

DROP TABLE IF EXISTS `tbl_resource_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_resource_category` (
  `resource_category_id` int(10) NOT NULL AUTO_INCREMENT,
  `resource_category` varchar(20) NOT NULL,
  PRIMARY KEY (`resource_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_resource_category`
--

LOCK TABLES `tbl_resource_category` WRITE;
/*!40000 ALTER TABLE `tbl_resource_category` DISABLE KEYS */;
INSERT INTO `tbl_resource_category` VALUES (1,'Projector'),(2,'Computer');
/*!40000 ALTER TABLE `tbl_resource_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_resources`
--

DROP TABLE IF EXISTS `tbl_resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_resources` (
  `resource_id` int(10) NOT NULL AUTO_INCREMENT,
  `category` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `price` varchar(25) NOT NULL,
  `purchase_date` date NOT NULL,
  `availability` int(2) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`resource_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_resources`
--

LOCK TABLES `tbl_resources` WRITE;
/*!40000 ALTER TABLE `tbl_resources` DISABLE KEYS */;
INSERT INTO `tbl_resources` VALUES (1,1,' Dell 2400MP projector','Dell','Rs.10400.00','2013-04-01',0,'Projector'),(2,2,'Hp Computer','HP','Rs.48000.00','2013-01-10',1,'Lab Computer'),(3,1,'Toshiba TDP-S25U projecto','Toshiba','Rs. 74,000.00','2013-01-01',1,'toshiba');
/*!40000 ALTER TABLE `tbl_resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_schedule`
--

DROP TABLE IF EXISTS `tbl_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `course` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_schedule`
--

LOCK TABLES `tbl_schedule` WRITE;
/*!40000 ALTER TABLE `tbl_schedule` DISABLE KEYS */;
INSERT INTO `tbl_schedule` VALUES (1,1,'2013-05-28','08:00:00','10:00:00'),(2,37,'2013-01-01','15:00:00','18:30:00'),(3,37,'2013-01-08','15:00:00','18:30:00'),(4,37,'2013-01-15','15:00:00','18:30:00'),(5,37,'2013-01-22','15:00:00','18:30:00'),(6,37,'2013-01-29','15:00:00','18:30:00'),(7,37,'2013-02-05','15:00:00','18:30:00'),(8,37,'2013-02-12','15:00:00','18:30:00'),(9,37,'2013-02-19','15:00:00','18:30:00'),(10,37,'2013-02-26','15:00:00','18:30:00'),(11,37,'2013-03-05','15:00:00','18:30:00'),(12,37,'2013-03-12','15:00:00','18:30:00'),(13,37,'2013-03-19','15:00:00','18:30:00'),(14,37,'2013-03-26','15:00:00','18:30:00'),(15,37,'2013-04-02','15:00:00','18:30:00'),(16,37,'2013-04-09','15:00:00','18:30:00'),(17,37,'2013-04-16','15:00:00','18:30:00'),(18,37,'2013-04-23','15:00:00','18:30:00'),(19,37,'2013-04-30','15:00:00','18:30:00'),(20,37,'2013-05-07','15:00:00','18:30:00'),(21,37,'2013-05-14','15:00:00','18:30:00'),(22,37,'2013-05-21','15:00:00','18:30:00'),(23,37,'2013-05-28','15:00:00','18:30:00'),(24,37,'2013-06-04','15:00:00','18:30:00'),(25,37,'2013-06-11','15:00:00','18:30:00'),(26,37,'2013-06-18','15:00:00','18:30:00'),(27,37,'2013-06-25','15:00:00','18:30:00'),(28,37,'2013-07-02','15:00:00','18:30:00'),(29,37,'2013-07-09','15:00:00','18:30:00'),(30,37,'2013-07-16','15:00:00','18:30:00'),(31,37,'2013-07-23','15:00:00','18:30:00'),(32,37,'2013-07-30','15:00:00','18:30:00'),(33,37,'2013-08-06','15:00:00','18:30:00'),(34,37,'2013-08-13','15:00:00','18:30:00'),(35,37,'2013-08-20','15:00:00','18:30:00'),(36,37,'2013-08-27','15:00:00','18:30:00'),(37,37,'2013-09-03','15:00:00','18:30:00'),(38,37,'2013-09-10','15:00:00','18:30:00'),(39,37,'2013-09-17','15:00:00','18:30:00'),(40,37,'2013-09-24','15:00:00','18:30:00'),(41,38,'2013-05-01','15:00:00','18:30:00'),(42,38,'2013-05-08','15:00:00','18:30:00'),(43,38,'2013-05-15','15:00:00','18:30:00'),(44,38,'2013-05-22','15:00:00','18:30:00'),(45,38,'2013-05-29','15:00:00','18:30:00'),(46,38,'2013-08-07','15:00:00','18:30:00'),(47,38,'2013-08-14','15:00:00','18:30:00'),(48,38,'2013-08-21','15:00:00','18:30:00'),(49,38,'2013-08-28','15:00:00','18:30:00'),(50,38,'2013-07-03','15:00:00','18:30:00'),(51,38,'2013-07-10','15:00:00','18:30:00'),(52,38,'2013-07-17','15:00:00','18:30:00'),(53,38,'2013-07-24','15:00:00','18:30:00'),(54,38,'2013-07-31','15:00:00','18:30:00'),(55,38,'2013-09-04','15:00:00','18:30:00'),(56,38,'2013-09-11','15:00:00','18:30:00'),(57,38,'2013-09-18','15:00:00','18:30:00'),(58,38,'2013-09-25','15:00:00','18:30:00');
/*!40000 ALTER TABLE `tbl_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_stu_payment_schemes`
--

DROP TABLE IF EXISTS `tbl_stu_payment_schemes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_stu_payment_schemes` (
  `payment_scheme_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `payment_method` varchar(10) NOT NULL,
  PRIMARY KEY (`payment_scheme_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_stu_payment_schemes`
--

LOCK TABLES `tbl_stu_payment_schemes` WRITE;
/*!40000 ALTER TABLE `tbl_stu_payment_schemes` DISABLE KEYS */;
INSERT INTO `tbl_stu_payment_schemes` VALUES (1,1,37,'full'),(2,1,39,'full'),(3,1,38,'full'),(4,3,39,'full'),(5,3,40,'full'),(6,4,37,'full'),(7,4,39,'full'),(8,5,37,'full'),(9,5,38,'full'),(10,6,38,'full'),(11,6,39,'full'),(12,7,38,'full'),(13,7,40,'full');
/*!40000 ALTER TABLE `tbl_stu_payment_schemes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_student_attendance`
--

DROP TABLE IF EXISTS `tbl_student_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_student_attendance` (
  `student_attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance` varchar(75) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`student_attendance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_student_attendance`
--

LOCK TABLES `tbl_student_attendance` WRITE;
/*!40000 ALTER TABLE `tbl_student_attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_student_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_students`
--

DROP TABLE IF EXISTS `tbl_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_students` (
  `student_id` int(10) NOT NULL AUTO_INCREMENT,
  `stu_admission_no` varchar(20) NOT NULL,
  `stu_admission_date` date NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `name_initials` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `prof_image` varchar(300) NOT NULL,
  `school` varchar(50) NOT NULL,
  `course` varchar(30) NOT NULL,
  `address` varchar(80) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `home_phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `login_account_id` int(15) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_students`
--

LOCK TABLES `tbl_students` WRITE;
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;
INSERT INTO `tbl_students` VALUES (1,'KI001','2013-09-04','Mr','Gayan','Perera','GH Perera','1991-10-15','male','1378324885_1378338622_Child_Male_Light.png','Mahanama college','37,38,39','Maharagama','0795511092','0112905075','gayan456@ymail.com',15),(2,'KI002','2010-01-15','Mr','Janith','jayawardana','JR  Jayawardhana','1991-01-10','male\r\n','1378324885_1378338622_Child_Male_Light.png','Royal College','37,39','Kaluthara','797777981','112990770','jan1234@ymail.com',17),(3,'KI003','2013-09-05','Miss','Thushani','Withanage','TU Withanage','1991-12-24','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Anula Vidyalaya','39,40','Homagama','0797777982','0112990771','thushai.withanage@gmail.com',18),(4,'KI004','0000-00-00','Miss','Arosha','Kulathunga','CA Kulathunga','1991-08-06','female','1378351017_1373298348_user_female.png','SPM','37,39','Kalaniya','0797777986','0112990775','aros@yahoo.com',20),(5,'KI005','0000-00-00','Mr','Dinith','Athukorala','DU Athukorala','1991-07-29','male','1378351189_1378331440_Client_Male_Light.png','DS Senanayaka College','37,38','Thalawathugoda','0797777985','0112990774','dini@qick.com',22),(6,'KI006','0000-00-00','Mr','Ksun','Rupasinghe','K A Rupasinghe','1991-05-01','male','1378351389_1378331463_Administrator 3.png','Royal College','38,39','Kalaniya','0797777984','0112990773','karupasinghe@yahoo.com',24),(7,'KI007','0000-00-00','Miss','Harshi','Senevirathna','HA Senevirathna','1991-07-20','female','1378351577_1373298341_Caucasian_female_boss.png','SBV','38,40','Kalaniya','0797777983','0112990772','ysenevirathana@gmail.com',26),(8,'KI008','2010-05-05','Mr','Dilum','Perera','D Perera','1991-03-06','male','1378324885_1378338622_Child_Male_Light.png','Royal College','41,42,43','Piliyndala','797777987','112990776','abc@gmail.com',29),(9,'KI009','2010-04-20','Mr','Pasan','Silva','P Silva','1991-10-19','male','1378324885_1378338622_Child_Male_Light.png','Isipathana College','41,43','Gampaha','797777988','112990777','acc@ymail.com',31),(10,'KI010','2010-04-01','Miss','Gayani','Abeysinghe','G Abeysinghe','1991-10-19','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Devi Balika vidyalaya','42,43','Kottawa','797777989','112990778','sdl@yahoo.com',33),(11,'KI011','2010-05-05','Miss','Kalpani','Wickramasinghe','K Wickramanayaka','1991-03-16','female','1378350878_1373298331_Person_Undefined_Female_Light.png','SPM','41,42,43','Malabe','797777990','112990779','abcd@gmail.com',35),(12,'KI012','2010-06-05','Miss','Asara','Silva','A Silva','1991-04-24','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Devi Balika vidyalaya','41,43','Kottawa','797777991','112990780','asdf@yahoo.com',37),(13,'KI013','2010-01-05','Mr','Vidura','Abeysinghe','V Abeysinghe','1991-10-19','male','1378324885_1378338622_Child_Male_Light.png','Royal College','43,44,45','Piliyndala','797777992','112990781','kls@rocketmail.com',39),(14,'KI014','2010-06-05','Miss','Ashani','Perera','A Perera','1991-03-16','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Vishaka Vidyalaya','44,45,46','Kalaniya','797777993','112990782','depoi@gmail.com',41),(15,'KI015','2010-06-05','Mr','Damith','Kulathunga','D Kulathunga','1991-04-24','male','1378324885_1378338622_Child_Male_Light.png','Isipathana College','44,46','Malabe','797777994','112990783','thsi@gmail.com',43),(16,'KI016','2010-01-05','Miss','Jayani','Wickramasinghe','J Wickramasinghe','1991-10-19','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Vishaka Vidyalaya','44,46','Gampaha','797777995','112990784','amp@gmail.com',45),(17,'KI017','2010-04-20','Miss','Kulani','Silva','K Silva','1991-03-16','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Devi Balika vidyalaya','44,45','Kottawa','797777996','112990785','dhaja@gmail.com',47),(18,'KI018','2010-01-05','Mr','Rajantha','Abeysinghe','R Abeysingha','1991-04-24','male','1378324885_1378338622_Child_Male_Light.png','Nalanda College','30,31,33,35,36','Kottawa','797777997','112990786','kish@gmail.com',49),(19,'KI019','2010-04-01','Mr','Priyanga','Perera','P Perera','1991-10-19','male','1378324885_1378338622_Child_Male_Light.png','Ananda College','32,34,35','Piliyndala','797777998','112990787','arosha@gmail.com',51),(20,'KI020','2010-04-20','Miss','Pulmini','Mendis','P Mendis','1991-03-16','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Ananda College','31,30,35','Malabe','797777999','112990788','budd@gmail.com',53),(21,'KI021','2010-01-05','Mr','Hasara','Abeysinghe','H Abeysinghe','1991-04-24','male','1378324885_1378338622_Child_Male_Light.png','Royal College','23,25,26,29','Kalaniya','797778000','112990789','ashp@gmail.com',55),(22,'KI022','2010-04-01','Mr','Dishan','Wickramasinghe','D Wickramasinghe','1991-10-19','male','1378324885_1378338622_Child_Male_Light.png','Nalanda College','23,24,25,27','Gampaha','797778001','112990790','lasksh@gmail.com',57),(23,'KI023','2010-06-05','Mr','Dulan','Silva','D Silva','1991-03-16','male','1378324885_1378338622_Child_Male_Light.png','Ananda College','26,27,28','Kottawa','797778002','112990791','jaja@gmail.com',59),(24,'KI024','2010-01-05','Miss','Dilini','Perera','D Perera','1991-04-24','female','1378350878_1373298331_Person_Undefined_Female_Light.png','SPM','24,25,26','Gampaha','797778003','112990792','sheno@gmail.com',61),(25,'KI025','2010-04-01','Miss','Thilni','Abeysinghe','T Abeysinghe','1991-10-19','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Devi Balika vidyalaya','18,19,22','Kalaniya','797778004','112990793','ish@gmail.com',63),(26,'KI026','2010-01-05','Mr','Dulitha','Kulathunga','D Kulathunga','1991-03-16','male','1378324885_1378338622_Child_Male_Light.png','Isipathana College','19,20,21,22','Piliyndala','797778005','112990794','ruksh@gmail.com',65),(27,'KI027','2010-01-05','Miss','Wasana','Wickramasinghe','W Wickramasinghe','1991-04-24','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Vishaka Vidyalaya','18,22','Malabe','797778006','112990795','dini@gmail.com',67),(28,'KI028','2011-01-15','Mr','Pasan','Silva','P Silva','1994-02-01','male','1378324885_1378338622_Child_Male_Light.png','Royal College','17,16,14','Kottawa','797778007','112990796','amp@gmail.com',70),(29,'KI029','2011-01-25','Miss','Gayani','Abeysinghe','G Abeysinghe','1994-03-05','female','1378324885_1378338622_Child_Male_Light.png','Isipathana College','17,15,14','kohuwala','797778008','112990797','dhaja@gmail.com',71),(30,'KI030','2011-01-30','Mr','Hasara','Abeysinghe','H Abeysinghe','1994-06-25','male','1378324885_1378338622_Child_Male_Light.png','Devi Balika vidyalaya','13,11,10','nawala','797778009','112990798','kish@gmail.com',72),(31,'KI031','2011-01-15','Mr','Dishan','Wickramasinghe','D Wickramasinghe','1995-07-15','male','1378350878_1373298331_Person_Undefined_Female_Light.png','Vishaka Vidyalaya','12,11,10','rajagiriya','797778010','112990799','arosha@gmail.com',73),(32,'KI032','2011-02-06','Mr','Damith','Kulathunga','D Kulathunga','1994-06-15','male','1378350878_1373298331_Person_Undefined_Female_Light.png','SPM','4,3','kaduwela','797778011','112990800','budd@gmail.com',74),(33,'KI033','2011-01-15','Miss','Jayani','Wickramasinghe','J Wickramasinghe','1997-12-12','female','1378324885_1378338622_Child_Male_Light.png','Devi Balika vidyalaya','2,1','thalahena','797778012','112990801','ashp@gmail.com',75),(34,'KI034','2011-01-25','Miss','Wasana','Wickramasinghe','W Wickramasinghe','1996-11-02','female','1378350878_1373298331_Person_Undefined_Female_Light.png','SPM','9,8,7','malabe','797778013','112990802','lasksh@gmail.com',76),(35,'KI035','2011-02-06','Mr','Priyanga','Perera','P Perera','1997-01-20','male','1378324885_1378338622_Child_Male_Light.png','Isipathana College','9,7','kaluthara','797778014','112990803','jaja@gmail.com',77),(36,'KI036','2012-01-15','Miss','Ashani','Perera','A Perera','1996-05-30','female','1378324885_1378338622_Child_Male_Light.png','Ananda College','9,8','kalaniya','797778015','112990804','sheno@gmail.com',78),(37,'KI037','2011-01-25','Mr','Rajantha','Abeysinghe','R Abeysingha','1995-02-11','male','1378324885_1378338622_Child_Male_Light.png','Ananda College','6','panadura','797778016','112990805','ish@gmail.com',79),(38,'KI038','2011-02-06','Mr','Priyanga','Perera','P Perera','1996-11-21','male','1378324885_1378338622_Child_Male_Light.png','Royal College','6','wattala','797778017','112990806','ruksh@gmail.com',80),(39,'KI039','2012-01-15','Mr','Dilum','Perera','D Perera','1998-10-10','male','1378324885_1378338622_Child_Male_Light.png','Vishaka Vidyalaya','5','baththaramulla','797778018','112990807','dini@gmail.com',81),(40,'KI040','2011-01-25','Mr','Pasan','Silva','P Silva','1997-01-01','male','1378324885_1378338622_Child_Male_Light.png','Devi Balika vidyalaya','5','panadura','797778019','112990808','jaja@gmail.com',82),(41,'KI041','2011-01-30','Mr','Hasara','Abeysinghe','H Abeysinghe','1994-06-25','male','1378350878_1373298331_Person_Undefined_Female_Light.png','Devi Balika vidyalaya','2','nawala','797778009','112990798','kish@gmail.com',83),(42,'KI042','2011-01-15','Mr','Dishan','Wickramasinghe','D Wickramasinghe','1995-07-15','male','1378350878_1373298331_Person_Undefined_Female_Light.png','Vishaka Vidyalaya','3','rajagiriya','797778010','112990799','arosha@gmail.com',84),(44,'KI043','2013-05-05','Mr','Dilum','Perera','D Perera','1991-03-06','male','1378324885_1378338622_Child_Male_Light.png','Royal College','41,42,43','Piliyndala','797777987','112990776','abc@gmail.com',0),(45,'KI044','2013-04-20','Mr','Pasan','Silva','P Silva','1991-10-19','male','1378350878_1373298331_Person_Undefined_Female_Light.png','Isipathana College','41,43','Gampaha','797777988','112990777','acc@ymail.com',0),(46,'KI045','2013-04-01','Miss','Gayani','Abeysinghe','G Abeysinghe','1991-10-19','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Devi Balika vidyalaya','42,43','Kottawa','797777989','112990778','sdl@yahoo.com',0),(47,'KI046','2013-05-05','Miss','Kalpani','Wickramasinghe','K Wickramanayaka','1991-03-16','female','1378350878_1373298331_Person_Undefined_Female_Light.png','SPM','41,42,43','Malabe','797777990','112990779','abcd@gmail.com',0),(48,'KI047','2013-06-05','Miss','Asara','Silva','A Silva','1991-04-24','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Devi Balika vidyalaya','41,43','Kottawa','797777991','112990780','asdf@yahoo.com',0),(49,'KI048','2013-01-05','Mr','Vidura','Abeysinghe','V Abeysinghe','1991-10-19','male','1378324885_1378338622_Child_Male_Light.png','Royal College','43,44,45','Piliyndala','797777992','112990781','kls@rocketmail.com',0),(50,'KI049','2013-06-05','Miss','Ashani','Perera','A Perera','1991-03-16','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Vishaka Vidyalaya','44,45,46','Kalaniya','797777993','112990782','depoi@gmail.com',0),(51,'KI050','2013-06-05','Mr','Damith','Kulathunga','D Kulathunga','1991-04-24','male','1378324885_1378338622_Child_Male_Light.png','Isipathana College','44,46','Malabe','797777994','112990783','thsi@gmail.com',0),(52,'KI051','2013-01-05','Miss','Jayani','Wickramasinghe','J Wickramasinghe','1991-10-19','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Vishaka Vidyalaya','44,46','Gampaha','797777995','112990784','amp@gmail.com',0),(53,'KI052','2013-04-20','Miss','Kulani','Silva','K Silva','1991-03-16','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Devi Balika vidyalaya','44,45','Kottawa','797777996','112990785','dhaja@gmail.com',0),(54,'KI053','2013-01-05','Mr','Rajantha','Abeysinghe','R Abeysingha','1991-04-24','male','1378324885_1378338622_Child_Male_Light.png','Nalanda College','30,31,33,35,36','Kottawa','797777997','112990786','kish@gmail.com',0),(55,'KI054','2013-04-01','Mr','Priyanga','Perera','P Perera','1991-10-19','male','1378324885_1378338622_Child_Male_Light.png','Ananda College','32,34,35','Piliyndala','797777998','112990787','arosha@gmail.com',0),(56,'KI055','2013-04-20','Miss','Pulmini','Mendis','P Mendis','1991-03-16','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Ananda College','31,30,35','Malabe','797777999','112990788','budd@gmail.com',0),(57,'KI056','2013-01-05','Mr','Hasara','Abeysinghe','H Abeysinghe','1991-04-24','male','1378324885_1378338622_Child_Male_Light.png','Royal College','23,25,26,29','Kalaniya','797778000','112990789','ashp@gmail.com',0),(58,'KI057','2013-04-01','Mr','Dishan','Wickramasinghe','D Wickramasinghe','1991-10-19','male','1378324885_1378338622_Child_Male_Light.png','Nalanda College','23,24,25,27','Gampaha','797778001','112990790','lasksh@gmail.com',0),(59,'KI058','2013-06-05','Mr','Dulan','Silva','D Silva','1991-03-16','male','1378324885_1378338622_Child_Male_Light.png','Ananda College','26,27,28','Kottawa','797778002','112990791','jaja@gmail.com',0),(60,'KI059','2013-01-05','Miss','Dilini','Perera','D Perera','1991-04-24','female','1378350878_1373298331_Person_Undefined_Female_Light.png','SPM','24,25,26','Gampaha','797778003','112990792','sheno@gmail.com',0),(61,'KI060','2013-04-01','Miss','Thilni','Abeysinghe','T Abeysinghe','1991-10-19','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Devi Balika vidyalaya','18,19,22','Kalaniya','797778004','112990793','ish@gmail.com',0),(62,'KI061','2013-01-05','Mr','Dulitha','Kulathunga','D Kulathunga','1991-03-16','male','1378324885_1378338622_Child_Male_Light.png','Isipathana College','19,20,21,22','Piliyndala','797778005','112990794','ruksh@gmail.com',0),(63,'KI062','2013-01-05','Miss','Wasana','Wickramasinghe','W Wickramasinghe','1991-04-24','female','1378350878_1373298331_Person_Undefined_Female_Light.png','Vishaka Vidyalaya','18,22','Malabe','797778006','112990795','dini@gmail.com',0),(64,'KI063','2013-01-05','Mr','Pasan','Silva','P Silva','1994-02-01','male','1378324885_1378338622_Child_Male_Light.png','Royal College','17,16,14','Kottawa','797778007','112990796','amp@gmail.com',0),(65,'KI064','2013-04-01','Miss','Gayani','Abeysinghe','G Abeysinghe','1994-03-05','female','1378324885_1378338622_Child_Male_Light.png','Isipathana College','17,15,14','kohuwala','797778008','112990797','dhaja@gmail.com',0),(66,'KI065','2013-04-20','Mr','Hasara','Abeysinghe','H Abeysinghe','1994-06-25','male','1378324885_1378338622_Child_Male_Light.png','Devi Balika vidyalaya','13,11,10','nawala','797778009','112990798','kish@gmail.com',0),(67,'KI066','2013-06-05','Mr','Dishan','Wickramasinghe','D Wickramasinghe','1995-07-15','male','1378350878_1373298331_Person_Undefined_Female_Light.png','Vishaka Vidyalaya','12,11,10','rajagiriya','797778010','112990799','arosha@gmail.com',0),(68,'KI067','2013-05-05','Mr','Damith','Kulathunga','D Kulathunga','1994-06-15','male','1378350878_1373298331_Person_Undefined_Female_Light.png','SPM','4,3','kaduwela','797778011','112990800','budd@gmail.com',0),(69,'KI068','2013-01-05','Miss','Jayani','Wickramasinghe','J Wickramasinghe','1997-12-12','female','1378324885_1378338622_Child_Male_Light.png','Devi Balika vidyalaya','2,1','thalahena','797778012','112990801','ashp@gmail.com',0),(70,'KI069','2013-05-05','Miss','Wasana','Wickramasinghe','W Wickramasinghe','1996-11-02','female','1378350878_1373298331_Person_Undefined_Female_Light.png','SPM','9,8,7','malabe','797778013','112990802','lasksh@gmail.com',0),(71,'KI070','2013-04-01','Mr','Priyanga','Perera','P Perera','1997-01-20','male','1378324885_1378338622_Child_Male_Light.png','Isipathana College','9,7','kaluthara','797778014','112990803','jaja@gmail.com',0),(72,'KI071','2013-04-20','Miss','Ashani','Perera','A Perera','1996-05-30','female','1378324885_1378338622_Child_Male_Light.png','Ananda College','9,8','kalaniya','797778015','112990804','sheno@gmail.com',0),(73,'KI072','2013-01-05','Mr','Rajantha','Abeysinghe','R Abeysingha','1995-02-11','male','1378324885_1378338622_Child_Male_Light.png','Ananda College','6','panadura','797778016','112990805','ish@gmail.com',0),(74,'KI073','2013-06-05','Mr','Priyanga','Perera','P Perera','1996-11-21','male','1378324885_1378338622_Child_Male_Light.png','Royal College','6','wattala','797778017','112990806','ruksh@gmail.com',0),(75,'KI074','2013-05-05','Mr','Dilum','Perera','D Perera','1998-10-10','male','1378324885_1378338622_Child_Male_Light.png','Vishaka Vidyalaya','5','baththaramulla','797778018','112990807','dini@gmail.com',0),(76,'KI075','2013-04-01','Mr','Pasan','Silva','P Silva','1997-01-01','male','1378324885_1378338622_Child_Male_Light.png','Devi Balika vidyalaya','5','panadura','797778019','112990808','jaja@gmail.com',0),(77,'KI076','2013-01-05','Mr','Hasara','Abeysinghe','H Abeysinghe','1994-06-25','male','1378350878_1373298331_Person_Undefined_Female_Light.png','Devi Balika vidyalaya','2','nawala','797778009','112990798','kish@gmail.com',0),(78,'KI077','2013-04-01','Mr','Dishan','Wickramasinghe','D Wickramasinghe','1995-07-15','male','1378350878_1373298331_Person_Undefined_Female_Light.png','Vishaka Vidyalaya','3','rajagiriya','797778010','112990799','arosha@gmail.com',0);
/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_teacher_payrates`
--

DROP TABLE IF EXISTS `tbl_teacher_payrates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_teacher_payrates` (
  `pay_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_level` varchar(30) NOT NULL,
  `rate` varchar(25) NOT NULL,
  PRIMARY KEY (`pay_rate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_teacher_payrates`
--

LOCK TABLES `tbl_teacher_payrates` WRITE;
/*!40000 ALTER TABLE `tbl_teacher_payrates` DISABLE KEYS */;
INSERT INTO `tbl_teacher_payrates` VALUES (1,'Assistant Lecturer','300'),(2,'Junior Lecturer','400'),(3,'Lecturer ','500'),(4,'Senior Lecturer','600');
/*!40000 ALTER TABLE `tbl_teacher_payrates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_teachers`
--

DROP TABLE IF EXISTS `tbl_teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_teachers` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(8) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nic` varchar(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `subjects` varchar(100) NOT NULL,
  `achievements` varchar(150) NOT NULL,
  `prof_image` varchar(200) NOT NULL,
  `pay_rate` varchar(15) NOT NULL,
  `login_account_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_teachers`
--

LOCK TABLES `tbl_teachers` WRITE;
/*!40000 ALTER TABLE `tbl_teachers` DISABLE KEYS */;
INSERT INTO `tbl_teachers` VALUES (1,'Mr','Duminda','Kumara','1979-01-10','male','Piliyandala','dumi125@yahoo.com','0776071349','790105438V','active','Bsc,Diploma in Science','Science','5 year experience','1378313584_1378331440_Client_Male_Light.png','3',4),(2,'Mr','Anura','Priyankara','1981-10-19','male','Kohuwala','anura109@gmail.com','0791230863','810965497V','active','Bcom,','Commerce,Accounting,Business studies,Economics','Financial advisior','1378313779_1378331463_Administrator 3.png','3',5),(3,'Mrs','Wasanthi','Priyangika','1969-10-15','female','Maharagama','wasanthi456@ymail.com','0720973562','697900852V','active','Arts degree, Msc','Sinhala','teacher in a national college','1378314913_1373298341_Caucasian_female_boss.png','4',6),(4,'Miss','Indika','Chiranthi','1976-11-11','female','Nawala','chiranthin@yahoo.com','0791759365','768017696V','active','Diploma in art','Sinhala, political science,Logic,','1year experience','1378314913_1373298341_Caucasian_female_boss.png','1',7),(5,'Mr','Jehan','Ryan','1986-07-15','male','panadura','ryan890@ymail.com','0770126708','861970068V','active','BIT,HDIT,DIT','ICT,GIT','@nd upper degree','1378315268_1378331440_Client_Male_Light.png','2',8),(6,'Mr','Gayan','Dhanushka','1988-10-19','male','Malabe','dhanugayan@rocketmail.com','0773098123','880981237V','active','Dip in graphic design, video editing','Graphic designing,hardware and networking','1 year experience','1378315590_1378333381_man.png','1',9),(7,'Mr','Dilum','Kothalawala','1983-07-12','male','Kandy','tharkadil12@outlook.com','0781235680','830629842V','active','Dip in English','Spoken English, English','7 years experince','1378315788_1378333396_administrator.png','4',10),(8,'Miss','Buddhika','Rathnayaka','1992-02-10','female','Maharagama','budd@ymail.com','0715012098','921678945V','active','BIT, ','IT,Maths,','1st class degree','1378317210_1373298348_user_female.png','2',11),(9,'Mr','Ajith','Perera','1965-11-10','male','Homagama','ajipe1234@hotmail.com','0712097354','650983947V','active','Dip in Chemistry','chemistry,physics','2 years experience','1378320806_1378338602_user_male.png','3',12),(10,'Mrs','Geetha','Ranasinghe','1955-10-20','female','Bambalapitiya','gettha098@gmail.com','0777777345','550981678V','active','Bsc ','Physics','20 years experiece','1378317210_1373298348_user_female.png','4',13),(11,'Mr','Tharindu','Perera','1977-11-26','male','Kollonnawa','tharindu345@ymail.com','0774871284','770348754V','active','CIMA','Accouting, Business Studies','Charted Accountancy','1378321268_1378338612_client.png','3',14);
/*!40000 ALTER TABLE `tbl_teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_transcripts`
--

DROP TABLE IF EXISTS `tbl_transcripts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_transcripts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `requested_on` datetime NOT NULL,
  `status` varchar(11) NOT NULL,
  `issued_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_transcripts`
--

LOCK TABLES `tbl_transcripts` WRITE;
/*!40000 ALTER TABLE `tbl_transcripts` DISABLE KEYS */;
INSERT INTO `tbl_transcripts` VALUES (1,16,16,'2013-09-03 09:36:27','pending','0000-00-00 00:00:00'),(2,12,21,'2013-09-04 09:24:06','done','2013-09-04 10:20:30'),(3,1,37,'2013-09-06 12:50:04','done','2013-09-06 14:54:26');
/*!40000 ALTER TABLE `tbl_transcripts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_login_account`
--

DROP TABLE IF EXISTS `tbl_user_login_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_login_account` (
  `login_acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_role` int(10) NOT NULL,
  `email` varchar(25) NOT NULL DEFAULT ' ',
  `log_in_time` datetime NOT NULL,
  `log_out_time` datetime NOT NULL,
  `log_time` time NOT NULL,
  PRIMARY KEY (`login_acc_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_name_2` (`user_name`),
  UNIQUE KEY `user_name_3` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_login_account`
--

LOCK TABLES `tbl_user_login_account` WRITE;
/*!40000 ALTER TABLE `tbl_user_login_account` DISABLE KEYS */;
INSERT INTO `tbl_user_login_account` VALUES (1,'admin','1234',1,' harsha@gmail.com','2013-09-06 17:50:06','2013-09-06 15:01:30','00:00:00'),(2,'ryan','1212',5,' ryan123@gmail.com','2013-09-06 17:41:15','2013-09-06 17:49:58','00:00:00'),(3,'uma','123',2,' uma123@gmail.com','2013-09-06 15:53:00','2013-09-06 17:23:32','00:00:00'),(4,'Duminda','duminda',7,'dumi125@yahoo.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(5,'Anura','anura',7,'anura109@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(6,'Wasanthi','wasanthi',7,'wasanthi456@ymail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(7,'Indika','indika',7,'chiranthin@yahoo.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(8,'Jehan','jehan',7,'ryan890@ymail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(9,'Gayan','gayan',7,'dhanugayan@rocketmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(10,'Dilum','dilum',7,'tharkadil12@outlook.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(11,'Buddhika','buddhika',7,'budd@ymail.com','2013-09-06 15:01:40','2013-09-06 16:37:02','00:00:00'),(12,'Ajith','ajith',7,'ajipe1234@hotmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(13,'Geetha','geetha',7,'gettha098@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(14,'Tharindu','tharindu',7,'tharindu345@ymail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(15,'KI001','KI001',3,'gayan456@ymail.com','2013-09-06 13:00:32','2013-09-06 13:16:14','00:00:00'),(16,'PA001','KI001',4,'aperera@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(17,'KI002','KI002',3,'jan1234@ymail.com ','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(18,'KI003','KI003',3,'thushai.withanage@gmail.c','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(19,'PA003','KI003',4,'wwithanage@gmail.com','2013-09-06 13:16:25','2013-09-06 14:19:30','00:00:00'),(20,'KI004','KI004',3,'aros@yahoo.com','2013-09-05 19:57:20','2013-09-05 20:20:37','00:00:00'),(21,'PA004','KI004',4,'','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(22,'KI005','KI005',3,'dini@qick.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(23,'PA005','KI005',4,'athukoralaa@ymail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(24,'KI006','KI006',3,'karupasinghe@yahoo.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(25,'PA006','KI006',4,'erupa@ymail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(26,'KI007','KI007',3,'ysenevirathana@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(27,'PA007','KI007',4,'hhh@abc.llk','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(28,'dgs','gdsg',0,' ','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(29,'KI008','KI008',3,'abc@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(30,'PA008','KI008',4,'praba@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(31,'KI009','KI009',3,'acc@ymail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(32,'PA009','KI009',4,'sup@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(33,'KI010','KI010',3,'sdl@yahoo.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(34,'PA010','KI010',4,'waru@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(35,'KI011','KI011',3,'abcd@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(36,'PA011','KI011',4,'thanu@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(37,'KI012','KI012',3,'asdf@yahoo.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(38,'PA012','KI012',4,'thili@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(39,'KI013','KI013',3,'kls@rocketmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(40,'PA013','KI013',4,'saku@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(41,'KI014','KI014',3,'depoi@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(42,'PA014','KI014',4,'Idil@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(43,'KI015','KI015',3,'thsi@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(44,'PA015','KI015',4,'nadee@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(45,'KI016','KI016',3,'amp@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(46,'PA016','KI016',4,'dinesha@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(47,'KI017','KI017',3,'dhaja@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(48,'PA017','KI017',4,'hash@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(49,'KI018','KI018',3,'kish@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(50,'PA018','KI018',4,'akp@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(51,'KI019','KI019',3,'arosha@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(52,'PA019','KI019',4,'thush@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(53,'KI020','KI020',3,'budd@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(54,'PA020','KI020',4,'dil@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(55,'KI021','KI021',3,'ashp@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(56,'PA021','KI021',4,'kpeiris@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(57,'KI022','KI022',3,'lasksh@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(58,'PA022','KI022',4,'rhas@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(59,'KI023','KI023',3,'jaja@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(60,'PA023','KI023',4,'jehan@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(61,'KI024','KI024',3,'sheno@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(62,'PA024','KI024',4,'upek@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(63,'KI025','KI025',3,'ish@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(64,'PA025','KI025',4,'gih@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(65,'KI026','KI026',3,'ruksh@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(66,'PA026','KI026',4,'key@idm.lk','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(68,'PA027','KI027',4,'keys@idmm.lk','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(70,'KI027','KI027',3,'amp@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(71,'KI028','KI028',3,'dhaja@gmail.com','2013-09-06 13:15:00','2013-09-06 14:57:39','00:00:00'),(72,'KI029','KI029',3,'kish@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(73,'KI030','KI030',3,'arosha@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(74,'KI031','KI031',3,'budd@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(75,'KI032','KI032',3,'ashp@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(76,'KI033','KI033',3,'lasksh@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(77,'KI034','KI034',3,'jaja@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(78,'KI035','KI035',3,'sheno@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(79,'KI036','KI036',3,'ish@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(80,'KI037','KI037',3,'ruksh@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(81,'KI038','KI038',3,'dini@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(82,'KI039','KI039',3,'jaja@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(83,'KI040','KI040',3,'kish@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(84,'KI041','KI041',3,'arosha@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(85,'KI042','KI042',3,'key_ins@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(86,'Tharaka','tharaka',6,'tharaka@gmail.com','2013-09-06 17:59:01','2013-09-06 18:01:56','00:00:00');
/*!40000 ALTER TABLE `tbl_user_login_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(20) NOT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'admin'),(2,'receptionist'),(3,'student'),(4,'parent'),(5,'coordinator'),(6,'manager'),(7,'lecturer');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-06 22:11:15
