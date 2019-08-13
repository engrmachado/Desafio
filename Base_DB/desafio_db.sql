/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.3.15-MariaDB : Database - desafio_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`desafio_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `desafio_db`;

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_color` varchar(255) NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`users_id`,`user_login`,`password_hash`,`user_full_name`,`user_email`,`user_color`) values (5,'rmachado','$2y$10$eqtz.OQctS/K5rBKXQ827e86mzW12P5stI5DMNI6JeiTBXOXLGwDS','Rogerio Machado','engrmachado@gmail.com','#e83602'),(12,'Matheus','$2y$10$uKe6VmtdR4RaY1bEeSHD9uFyYDCmFzS9twqJnJol2q6UdI.7.3vnG','Matheus Martins ','r@gmail.com','#00ff40'),(13,'joana','$2y$10$3/GrOPOBF5WBaDdwoqVwDuYe.3eyI7P8XRI.DPsJ6rx4UFH7aP/Ya','joana Machado','Joana@gmail.com','#ff8000'),(16,'Marcela','$2y$10$C4cFfmBaeIDdsa4JJV85B.PQnWo25fgGDfQQv1sIFrVrvO5c0cf/G','Marcela Moraes','moraes@gmail.com','#ff80ff'),(17,'Carla','$2y$10$/VES1nlH9lfMXDbkIMzS5OJdVxaUMmA7LdcTsS9/YZ9286ZMeHvne','Carla Almeida','almeida@gmail.com','#a6eac5'),(18,'Bruna','$2y$10$MMu5aYN3MdcEV3B1Qq8gbus7jKA8w/GK6/IrlEj5lCTpNf/8qUAle','Bruna Guimaraes','guimaraes@gmail.com','#2145c0'),(19,'Marcelo','$2y$10$AF.wEoVmvDptmh6AXtOddeI5Ec5LNMkBd0hrAlEAM9KSxps2gGdXa','Marcelo Manfrin','manfrin@gmail.com','#87d035'),(20,'Lucas ','$2y$10$y8.wJW5iUXNXouSzSZesRuNxL9AnBADcR5Tj.XkAUCuM9NlsjQuES','Lucas  Simões','simoes@gmail.com','#c5b965'),(21,'Renan','$2y$10$uWwRA/ND382A08v3gzyCRuQEXf2DoBgBC4PocpJOdfpdlTLrW6Aue','Renan Vieira','vieira@gmail.com','#ff80ff'),(22,'Daina','$2y$10$1Kn0XvjqWBzGT6EWWQLSyOGqJ5rXAt0AblAUzhoFDs6xckynPcLrS','Daiana Dias','dias@gmail.com','#831ffc'),(23,'Eliane','$2y$10$7JAX3NDodKl5cyCWRjwvau8mD8a3Ef03UE19xdHV4BiF.jRIe3N2i','Eliane souza','souza@gmail.com','#9ae2f8'),(24,'Taila','$2y$10$e3SXS8mkkrI8XAoKvsyvh.62KaReynjNSen7k1suECsf5EZImp5A.','Taila Strabelle','taila@gmail.com','#ff00ff'),(25,'master','$2y$10$gZukF5rmomfdEP8Id5disOBcXN//fF/y1xf30gJa/EsvitHbA99aG','master','master@gmail.com','#b43307');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
