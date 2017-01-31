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
-- Table structure for table `tbl_class_allocation`
--

DROP TABLE IF EXISTS `tbl_class_allocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_class_allocation` (
  `class_allocation_id` int(10) NOT NULL AUTO_INCREMENT,
  `class_id` int(10) NOT NULL,
  `schedule_id` int(10) NOT NULL,
  `resourse_id` int(11) NOT NULL,
  PRIMARY KEY (`class_allocation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_class_allocation`
--

LOCK TABLES `tbl_class_allocation` WRITE;
/*!40000 ALTER TABLE `tbl_class_allocation` DISABLE KEYS */;
INSERT INTO `tbl_class_allocation` VALUES (1,1,1,0);
/*!40000 ALTER TABLE `tbl_class_allocation` ENABLE KEYS */;
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
INSERT INTO `tbl_classroom` VALUES (1,'F1',' ','25','floor_one','KEY INST building',1,'no projector '),(2,'F2',' ','','floor_one','',0,''),(3,'F3',' ','','floor_one','',0,'first floor\r\n'),(5,'S1','Lecture hall','200','floor_two','KEY INST building',1,'max students 225');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course`
--

LOCK TABLES `tbl_course` WRITE;
/*!40000 ALTER TABLE `tbl_course` DISABLE KEYS */;
INSERT INTO `tbl_course` VALUES (1,1,'Spoken English','2','','spoken english for adults '),(2,3,'Science','4','','science subject '),(3,5,'Sinhala','','','grade 3 sinhala'),(4,3,'Mathametics','','',''),(5,12,'Science','','','O/L'),(6,9,'Social Studies','','',''),(7,8,'English','','',''),(8,2,'English','','',''),(9,6,'scholarship','','',''),(10,7,'scholarship','','',''),(11,11,'Science','','',''),(12,3,'Commerce','','',''),(13,11,'Mathametics','','',''),(14,13,'ICT','','',''),(15,17,'Biology','','600',''),(16,16,'Chemistry','','850',''),(17,17,'Physics','','500',''),(18,14,'Business Studies','','400',''),(19,15,'Logic','','',''),(20,16,'Combined Maths','','700','');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_course_category`
--

LOCK TABLES `tbl_course_category` WRITE;
/*!40000 ALTER TABLE `tbl_course_category` DISABLE KEYS */;
INSERT INTO `tbl_course_category` VALUES (1,'Professional',''),(2,'Grade 2','Grade 2 classes'),(3,'Grade 10','subject for grade 10 students'),(4,'Grade 1',''),(5,'Grade 3','grade 3'),(6,'Grade 4',''),(7,'Grade 5','Scholarship '),(8,'Grade 6',''),(9,'Grade 7',''),(10,'Grade 8',''),(11,'Grade 9',''),(12,'Grade 11','O/L'),(13,'Grade 12','A/L'),(14,'A/L-Commerce','A/L'),(15,'A/L - Arts',''),(16,'A/L -Mathametics',''),(17,'A/L- Biology','');
/*!40000 ALTER TABLE `tbl_course_category` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_parents`
--

LOCK TABLES `tbl_parents` WRITE;
/*!40000 ALTER TABLE `tbl_parents` DISABLE KEYS */;
INSERT INTO `tbl_parents` VALUES (1,'$parent_name','$relation','$occupation','$nic','$parent_contact','',0,0),(2,'N.pitiyage','Mother','none','541986543V','0112789538','',8,0),(3,'L.Madanayaka','Father','ds','551231538V','0112789534','',9,0),(4,'L.Madanayaka','Father','none','551231538V','0112789534','',10,0),(5,'N.pitiyage','Mother','none','541986543V','0112789538','',11,0),(6,'W. Brito','Father','none','551231538V','0112885346','abc@gmail.com',12,0),(7,'','','','','','',13,13),(8,'asdff','Mother','none','609877438V','0777596006','abb@yahoo.com',14,15),(9,'','','','','','',0,22),(11,'$parent_name','$relation','$occupation','$nic','$parent_contact','$parent_email',0,0),(12,'A.Perera','Father','none','551231538V','0778553360','aperera@gmail.com',16,38),(13,'M. Kotagala','Mother','none','645987264V','0774654128','mkotagala@gmail.com',0,40),(21,'W.Withanage','Mother','none','541986543V','0112875349','wwithanage@gmail.com',18,60),(22,'Y.perera','Father','none','449875410V','0112894583','yperera@gmail.com',19,62),(23,'P. Jayasinghe','Father','none','668887983V','0112870049','pjayasinghe@yahoo.co',20,64),(24,'N.pitiyage','Mother','none','541986543V','0112789538','npitiyage@gmail.com',21,66),(25,'','','','','','',22,68);
/*!40000 ALTER TABLE `tbl_parents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payment_scheme`
--

DROP TABLE IF EXISTS `tbl_payment_scheme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_payment_scheme` (
  `payment_scheme_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment` varchar(25) NOT NULL,
  `amount` varchar(40) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_scheme_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payment_scheme`
--

LOCK TABLES `tbl_payment_scheme` WRITE;
/*!40000 ALTER TABLE `tbl_payment_scheme` DISABLE KEYS */;
INSERT INTO `tbl_payment_scheme` VALUES (1,'admission','1000','');
/*!40000 ALTER TABLE `tbl_payment_scheme` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payments`
--

LOCK TABLES `tbl_payments` WRITE;
/*!40000 ALTER TABLE `tbl_payments` DISABLE KEYS */;
INSERT INTO `tbl_payments` VALUES (3,'admission','2013-07-09','1000.00',18,''),(4,'admission','2013-07-10','1000.00',18,''),(5,'admission','2013-07-10','1000.00',18,''),(6,'admission','2013-07-10','1000.00',18,''),(7,'admission','2013-07-10','1000.00',18,''),(8,'admission','2013-07-10','1000.00',19,''),(9,'admission','2013-07-10','1000.00',20,''),(10,'admission','2013-07-10','1000.00',20,''),(11,'admission','2013-07-10','1000.00',20,''),(12,'admission','2013-07-10','1000.00',20,''),(13,'admission','2013-07-10','1000.00',20,'');
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
INSERT INTO `tbl_resources` VALUES (1,1,' Dell 2400MP projector','Dell','Rs.10400.00','2013-04-01',1,'Projector'),(2,2,'Hp Computer','HP','Rs.48000.00','2013-01-10',1,'Lab Computer'),(3,1,'Toshiba TDP-S25U projecto','Toshiba','01-01-2013','0000-00-00',1,'toshiba');
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
  `allocation_id` int(11) NOT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_schedule`
--

LOCK TABLES `tbl_schedule` WRITE;
/*!40000 ALTER TABLE `tbl_schedule` DISABLE KEYS */;
INSERT INTO `tbl_schedule` VALUES (1,1,'2013-05-28','08:00:00','10:00:00',1),(2,2,'2013-06-30','15:00:00','18:00:00',1),(3,2,'2013-06-18','13:00:00','15:00:00',3);
/*!40000 ALTER TABLE `tbl_schedule` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_student_attendance`
--

LOCK TABLES `tbl_student_attendance` WRITE;
/*!40000 ALTER TABLE `tbl_student_attendance` DISABLE KEYS */;
INSERT INTO `tbl_student_attendance` VALUES (1,'10,11',1,'not_late');
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
  `phone` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `login_account_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_students`
--

LOCK TABLES `tbl_students` WRITE;
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;
INSERT INTO `tbl_students` VALUES (7,'0','0000-00-00','','$first_name','$last_name','$name_initials','0000-00-00','$sex','','$school','0','$address',0,'$email',0),(10,'KI002','2013-06-12','Miss','Umasha','Madanayaka','KUS Madanayaka','1989-12-13','female','','SPM','1','Baththaramulla',713033826,'umasha@cbsl.lk',1),(11,'KI003','2013-06-12','Mr','Rajitha','Pitiyage','RC Pitiyage','1980-12-31','male','','Nalanda college','1','colombo',777218642,'raji@gmail.com',3),(12,'KI004','2013-06-13','Miss','Himani','Chathurika','WBH Chathurika','1990-09-14','male','','SBV','2','Rajagiriya',11885346,'himani@gmail.com',10),(13,'KI005','2013-06-13','Miss','mad','upek','mu','1981-09-01','female','','wfws','0','',0,'',12),(14,'KI006','2013-06-13','Mr','Jehan','Benjamin','JR Benjamin','0987-07-15','male','','mahanama college','0','kottawa',777596006,'ryan@gmail.com',14),(16,'KI007','2013-07-03','Miss','Warunika','Perera','WS Perera','1984-10-08','female','','Gothami Balika','16,20','Thalahena',778553360,'warunikaperera@gmail.com',37),(18,'KI008','2013-07-09','Miss','Thushani','Withanage','T Withanage','1989-12-24','female','1373359211_1373298341_Caucasian_female_boss.png','Anula Vidyalaya','15','homagama',713033026,'thushani.withanage@gmail.com',59),(19,'KI009','2013-07-10','Mr','Gayan','Sanjeewa','G Sanjeewa','1987-12-10','male','1373447137_1365513370_Users.png','Royal College','18','Malabe',777723418,'gsanjeewa@gmail.com',61),(20,'KI0010','2013-07-10','Miss','Shenoli','Jayasinghe','AS Jayasinghe','1989-10-15','female','1373448568_1373298331_Person_Undefined_Female_Light.png','Lindsey Balika Vidyalaya','14','Kirulopane',712348765,'sheno.jayasinghe@gmail.com',63),(21,'KI0011','2013-07-10','Miss','Madhavi','Upeksha','MU Pitiyage','1989-12-17','female','1373453301_1373298331_Person_Undefined_Female_Light.png','SPM','15,17','Thalahena',774111420,'madupek@gmail.com',65),(22,'KI0012','2013-07-14','','','','','0000-00-00','','','','','',0,'',67);
/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;
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
  `prof_image` varchar(200) NOT NULL,
  `login_account_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_teachers`
--

LOCK TABLES `tbl_teachers` WRITE;
/*!40000 ALTER TABLE `tbl_teachers` DISABLE KEYS */;
INSERT INTO `tbl_teachers` VALUES (3,'Mr','Ryan ','Benjamin','1987-07-15','male','kottawa','ryan.jehan@gmail.com','0777596006','871970068V','active','BIT','IT','1372068010_user01.png',0),(4,'Miss','Madhavi','Upeksha','1989-12-17','female','Malabe','madupek@gmail.com','0774111420','898523217V','active','BIT','IT','1372070556_user_02.png',20);
/*!40000 ALTER TABLE `tbl_teachers` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_login_account`
--

LOCK TABLES `tbl_user_login_account` WRITE;
/*!40000 ALTER TABLE `tbl_user_login_account` DISABLE KEYS */;
INSERT INTO `tbl_user_login_account` VALUES (1,'KI002','KI002',0,'umasha@cbsl.lk','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(2,'admin','1234',1,'madupek@gmail.com','2013-07-15 09:32:12','2013-07-15 13:11:22','00:00:04'),(3,'KI003','KI003',3,'','2013-06-16 15:53:17','2013-06-16 15:56:47','00:00:00'),(4,'PA003','KI003',4,'','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(5,'uma','123',2,'uma@gmail.com','2013-07-19 07:12:29','2013-07-19 07:41:04','00:00:00'),(6,'gayani','10315',7,'madupek@gmail.com','2013-06-30 12:37:49','2013-06-30 12:37:59','00:00:00'),(7,'ryan','1212',5,'ryan.jehan@gmail.com','2013-07-15 17:36:47','2013-07-15 18:00:22','00:00:00'),(10,'KI004','KI004',3,'himani@gmail.com','2013-07-15 13:11:33','2013-07-15 13:15:03','00:00:00'),(11,'PA004','KI004',4,'abc@gmail.com','2013-06-30 12:37:23','2013-06-30 12:37:30','00:00:00'),(12,'KI005','KI005',3,'','2013-06-25 18:57:56','2013-06-25 19:14:39','00:00:00'),(13,'PA005','KI005',4,'','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(14,'KI006','KI006',3,'ryan@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(15,'PA006','KI006',4,'abb@yahoo.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(20,'Madhavi','898523217V',7,'madupek@gmail.com','2013-06-25 17:55:32','2013-06-25 18:34:01','00:00:01'),(37,'KI007','KI007',3,'warunikaperera@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(38,'PA007','KI007',4,'aperera@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(59,'KI008','KI008',3,'thushani.withanage@gmail.','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(60,'PA008','KI008',4,'wwithanage@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(61,'KI009','KI009',3,'gsanjeewa@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(62,'PA009','KI009',4,'yperera@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(63,'KI0010','KI0010',3,'sheno.jayasinghe@gmail.co','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(64,'PA0010','KI0010',4,'pjayasinghe@yahoo.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(65,'KI0011','KI0011',3,'madupek@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(66,'PA0011','KI0011',4,'npitiyage@gmail.com','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(67,'KI0012','KI0012',3,'','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00'),(68,'PA0012','KI0012',4,'','0000-00-00 00:00:00','0000-00-00 00:00:00','00:00:00');
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

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `profile_image` varchar(300) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Madhavi','Upeksha','0000-00-00','0774111420','madupek@gmail.com','898523217V','','admin','admin','1234'),(3,'Ryan','Ben','0000-00-00','0777596006','ryan.jehan@gmail.com','871970068V','1368466966_1363966180_002.png','coordinator','ryan','1212'),(6,'Gayani','Pitiyage','0000-00-00','0112789538','madupek@gmail.com','795023217V','1368509560_user_02.png','Lecturer','gayani','10315'),(7,'Umasha','Madanayaka','1989-12-13','0777123765','uma@gmail.com','898481247V','','receptionist','uma','123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-07-19 11:11:49
