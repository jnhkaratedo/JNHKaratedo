/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.11-MariaDB : Database - jnh_db
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


/*Table structure for table `tblclass` */

DROP TABLE IF EXISTS `tblclass`;

CREATE TABLE `tblclass` (
  `Class_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Class_title` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Date_from` date NOT NULL,
  `Date_to` date NOT NULL,
  `Day` varchar(100) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Class_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblclass` */

insert  into `tblclass`(`Class_Id`,`Class_title`,`Location`,`Date_from`,`Date_to`,`Day`,`is_deleted`) values (1,'test','Harmony Village Mall 2nd Floor.','2020-02-25','2020-02-25','Tue',0),(2,'test','Harmony Village Mall 2nd Floor.','2020-02-25','2020-02-25','Tue',0);

/*Table structure for table `tblguardian` */

DROP TABLE IF EXISTS `tblguardian`;

CREATE TABLE `tblguardian` (
  `Id` int(10) NOT NULL,
  `GFname` varchar(100) NOT NULL,
  `GMname` varchar(100) NOT NULL,
  `GLname` varchar(100) NOT NULL,
  `Occupation` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Relationship` varchar(50) NOT NULL,
  `Student_Id` int(10) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Student_Id` (`Student_Id`),
  CONSTRAINT `tblguardian_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `tblstudent_info` (`Student_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblguardian` */

/*Table structure for table `tblinstructor_class` */

DROP TABLE IF EXISTS `tblinstructor_class`;

CREATE TABLE `tblinstructor_class` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `instructor_id` int(10) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `instructor_id` (`instructor_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblinstructor_class` */

insert  into `tblinstructor_class`(`id`,`instructor_id`,`class_id`) values (1,1,1),(2,2,1);

/*Table structure for table `tblinstructor_info` */

DROP TABLE IF EXISTS `tblinstructor_info`;

CREATE TABLE `tblinstructor_info` (
  `Instructor_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Rank` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(5) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Contact_No` bigint(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_deleted` int(1) DEFAULT 0,
  PRIMARY KEY (`Instructor_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblinstructor_info` */

insert  into `tblinstructor_info`(`Instructor_Id`,`Rank`,`Name`,`Address`,`Birthday`,`Age`,`Gender`,`Contact_No`,`Email`,`image`,`is_deleted`) values (26,'red','juan dela cruz','test','2002-01-01',18,'Male',9123456789,'test@test.om','chancellor hotel.png',0);

/*Table structure for table `tblmanager` */

DROP TABLE IF EXISTS `tblmanager`;

CREATE TABLE `tblmanager` (
  `manager_id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(10) NOT NULL,
  `Contact_No` int(50) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  UNIQUE KEY `manager_id` (`manager_id`),
  KEY `tblmanager_ibfk_1` (`user_id`),
  CONSTRAINT `tblmanager_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tblusers` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblmanager` */

insert  into `tblmanager`(`manager_id`,`Name`,`Gender`,`Address`,`Birthday`,`Age`,`Contact_No`,`user_id`) values (1,'noel','Male','san pedro ','1992-10-06',27,2147483647,NULL);

/*Table structure for table `tblpayment` */

DROP TABLE IF EXISTS `tblpayment`;

CREATE TABLE `tblpayment` (
  `Id` int(10) NOT NULL,
  `Student_Id` int(10) NOT NULL,
  `Date` datetime NOT NULL,
  `Amount` int(15) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Student_Id` (`Student_Id`),
  CONSTRAINT `tblpayment_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `tblstudent_info` (`Student_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblpayment` */

/*Table structure for table `tblreservation` */

DROP TABLE IF EXISTS `tblreservation`;

CREATE TABLE `tblreservation` (
  `Reservation_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact_No` int(20) NOT NULL,
  PRIMARY KEY (`Reservation_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblreservation` */

insert  into `tblreservation`(`Reservation_Id`,`Name`,`Email`,`Contact_No`) values (1,'Niamh Chelsy Camaganakan','niamhchelsy@gmail.com',88935229);

/*Table structure for table `tblstudent_info` */

DROP TABLE IF EXISTS `tblstudent_info`;

CREATE TABLE `tblstudent_info` (
  `Student_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Rank` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(10) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Contact_No` varchar(20) NOT NULL,
  `Fathers_Name` varchar(50) NOT NULL,
  `FOccupation` varchar(50) NOT NULL,
  `FContact_No` varchar(20) NOT NULL,
  `Mothers_Name` varchar(50) NOT NULL,
  `MOccupation` varchar(50) NOT NULL,
  `MContact_No` varchar(20) NOT NULL,
  `Payment` float NOT NULL,
  `Balance` float NOT NULL,
  `Comment` varchar(300) NOT NULL,
  PRIMARY KEY (`Student_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblstudent_info` */

insert  into `tblstudent_info`(`Student_Id`,`Rank`,`Name`,`Address`,`Birthday`,`Age`,`Gender`,`Contact_No`,`Fathers_Name`,`FOccupation`,`FContact_No`,`Mothers_Name`,`MOccupation`,`MContact_No`,`Payment`,`Balance`,`Comment`) values (1,'Black','Cerilo Atilano Verdejo Jr','Langgam San Pedro City Laguna','1992-10-13',27,'Male','2147483647','Cerilo Geraldino Verdejo Sr','Driver','88909090','Gina Atilano Verdejo','Bus Attendant','8889090',899,101,'No'),(2,'Red','Patrick Adino Tabogon','Pacita 2B','1997-08-21',22,'Male','2147483647','Felix Tabogon','Driver','8996767','Esperanza Adino','Vendor','8888999',500,500,'No'),(3,'GREEN','Marlou Thomas Rillera','Brgy. Laggam San Pedro City Laguna ','1996-06-16',23,'Male','2147483647','Mr. Rillera','Driver','8900000','Mrs. Rillera','Housewife','8900009',899,101,'No'),(50,'ORANGE','Aldrin Ronnin Salonga','Calendola San Pedro Laguna','2020-02-05',23,'Male','890890890','Mr. Salonga','None','898989','Mrs. Salonga','None','2147483647',800,200,'No'),(52,'ORANGE','Renate Rose Amolar Culubong','Calendola San Pedro Laguna','1991-12-12',0,'Female','2147483647','Mr. Amolar','Driver','2147483647','Mrs.Cabalhin','Housewife','2147483647',1000,0,'No'),(53,'BLUE','Niamh Chelsy Verdejo Camaganakan','Langgam San Pedro City Laguna','2012-11-29',7,'Female','8925223','Joven Camaganakan','Coach','2147483647','Ginalyn Verdejo','None','2147483647',1000,0,'No'),(54,'black','test name','test address','1992-10-06',27,'male','09123456789','test father','test occupation father','09123456798','test mother','test occupation mother','09123456789',0,0,'test'),(55,'black','test name','test address','1992-10-06',27,'male','09123456789','test father','test occupation father','09123456798','test mother','test occupation mother','09123456789',0,0,'test'),(56,'WHITE','test','test','2020-02-10',0,'Male','09123456789','teest','fafad','09123456789','test','adfadf','09123456789',0,1000,'hjgughj');

/*Table structure for table `tblstudentclass` */

DROP TABLE IF EXISTS `tblstudentclass`;

CREATE TABLE `tblstudentclass` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Class_Id` int(10) NOT NULL,
  `Student_id` int(10) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Student_id` (`Student_id`),
  KEY `Class_Id` (`Class_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblstudentclass` */

insert  into `tblstudentclass`(`Id`,`Class_Id`,`Student_id`) values (1,1,1),(2,1,2);

/*Table structure for table `tblusers` */

DROP TABLE IF EXISTS `tblusers`;

CREATE TABLE `tblusers` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblusers` */

insert  into `tblusers`(`user_id`,`Username`,`Password`,`Role`) values (1,'cyhverdz_admin','Aerial_003','super_user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
