CREATE DATABASE  IF NOT EXISTS `bookreviews` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bookReviews`;
-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: bookReviews
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (4,'Horns','Joe Hill','2016-04-20 10:33:02','2016-04-20 10:33:02'),(5,'The Great Gatsby','F. Scott Fitzgerald','2016-04-20 10:43:25','2016-04-20 10:43:25'),(6,'Girl with the Dragon Tattoo','Stieg Larsson','2016-04-20 10:43:54','2016-04-20 10:43:54'),(7,'Hatchet','Gary Paulson','2016-04-20 10:44:10','2016-04-20 10:44:10'),(8,'Fahrenheit 451','Ray Bradbury','2016-04-20 10:44:42','2016-04-20 10:44:42'),(9,'A Game of Thrones','George R. R. Martin','2016-04-20 10:45:13','2016-04-20 10:45:13'),(11,'A Feast of Crows','George R. R. Martin','2016-04-20 13:15:46','2016-04-20 13:15:46'),(12,'Blood of Elves','Andrzej Sapkowski','2016-04-20 13:22:29','2016-04-20 13:22:29'),(13,'The Longest Book Title Ever What Does Clinton Know About CSS','a Swedish Guy','2016-04-20 13:28:15','2016-04-20 13:28:15'),(14,'A Wrinkle in Time','Madeleine L\'Engle','2016-04-20 13:30:59','2016-04-20 13:30:59');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `stars` tinyint(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reviews_users_idx` (`user_id`),
  KEY `fk_reviews_books1_idx` (`book_id`),
  CONSTRAINT `fk_reviews_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_books1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (3,'Test from review only page.',2,'2016-04-20 10:41:59','2016-04-20 10:41:59',1,4),(4,'it was quite nice',4,'2016-04-20 10:43:25','2016-04-20 10:43:25',1,5),(5,'awesome book',4,'2016-04-20 10:43:54','2016-04-20 10:43:54',1,6),(6,'my favorite book as a kid',5,'2016-04-20 10:44:10','2016-04-20 10:44:10',1,7),(7,'another one I liked as a child.',3,'2016-04-20 10:44:42','2016-04-20 10:44:42',1,8),(9,'This is the second review for this Farnheit 451',3,'2016-04-20 11:21:32','2016-04-20 11:21:32',1,8),(10,'This is the third review for this book because, why not?',2,'2016-04-20 11:27:52','2016-04-20 11:27:52',1,8),(11,'Another great book by George R. R. Martin',5,'2016-04-20 13:15:46','2016-04-20 13:15:46',1,11),(12,'The Witcher series is one of the best fantasy series of all time!',5,'2016-04-20 13:22:29','2016-04-20 13:22:29',2,12),(13,'this book sucks!',5,'2016-04-20 13:28:15','2016-04-20 13:28:15',2,13),(15,'A smashing great read!',5,'2016-04-20 14:02:04','2016-04-20 14:02:04',2,9);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Cody Williams','Bulldog','codyw9524@gmail.com','$2y$10$c6y6Fz7KPgeUjhCyTthtce6x4mfNttDGGoDnxp8R4GSdbZQprNqGS','2016-04-19 22:27:05','2016-04-19 22:27:05'),(2,'David Bowie','Ziggy Stardust','codyw9524@ziggy.com','$2y$10$duwOAE1Apisp7NWNjKagl.kLlgQCtwXd5YlHpWX9CFhUaRMXR0ZgO','2016-04-20 13:18:03','2016-04-20 13:18:03'),(3,'Michael Bolton','Assclown','codyw9524@michael.com','$2y$10$oVYfTIwWSZ3CPCkE5PAjGeVt5gzuPVHQ8hL36y6keEG8alb/PxlAq','2016-04-20 13:21:02','2016-04-20 13:21:02');
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

-- Dump completed on 2016-04-20 14:10:25
