CREATE DATABASE  IF NOT EXISTS `citizenv` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `citizenv`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: citizenv
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `a1`
--

DROP TABLE IF EXISTS `a1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `a1` (
  `username` int NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `author_code` int DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a1`
--

-- LOCK TABLES `a1` WRITE;
/*!40000 ALTER TABLE `a1` DISABLE KEYS */;
INSERT INTO `a1` VALUES (1,'1',1);
/*!40000 ALTER TABLE `a1` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `a2`
--

DROP TABLE IF EXISTS `a2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `a2` (
  `cityCode` int NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `cityName` varchar(45) DEFAULT NULL,
  `author_code` int DEFAULT NULL,
  PRIMARY KEY (`cityCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a2`
--

-- LOCK TABLES `a2` WRITE;
/*!40000 ALTER TABLE `a2` DISABLE KEYS */;
/*!40000 ALTER TABLE `a2` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `a3`
--

DROP TABLE IF EXISTS `a3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `a3` (
  `districtCode` int NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `cityCode` int NOT NULL,
  `districtName` varchar(45) DEFAULT NULL,
  `author_code` int DEFAULT NULL,
  PRIMARY KEY (`districtCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a3`
--

-- LOCK TABLES `a3` WRITE;
/*!40000 ALTER TABLE `a3` DISABLE KEYS */;
/*!40000 ALTER TABLE `a3` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `authorization`
--

DROP TABLE IF EXISTS `authorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authorization` (
  `author_detail_code` int NOT NULL AUTO_INCREMENT,
  `authorCode` int DEFAULT NULL,
  `action` varchar(45) DEFAULT NULL,
  `is_lisenced` int DEFAULT NULL,
  PRIMARY KEY (`author_detail_code`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authorization`
--

-- LOCK TABLES `authorization` WRITE;
/*!40000 ALTER TABLE `authorization` DISABLE KEYS */;
INSERT INTO `authorization` VALUES (1,1,'GENERATE CODE',1),(2,1,'GENERATE ACCOUNT',1),(3,1,'GRANT DECLARATION PRIVILEGE',1),(4,1,'TRACK PROGRESS',1),(5,1,'VIEW ANALYTIC',1),(6,1,'VIEW LIST',1),(7,1,'VIEW INFOR',1),(8,1,'IMPORT DATA',0),(9,1,'PRINT SURVEY FORM',0),(10,2,'GENERATE CODE',0),(11,2,'GENERATE ACCOUNT',0),(12,2,'GRANT DECLARATION PRIVILEGE',0),(13,2,'TRACK PROGRESS',1),(14,2,'VIEW ANALYTIC',1),(15,2,'VIEW LIST',1),(16,2,'VIEW INFOR',1),(17,2,'IMPORT DATA',0),(18,2,'PRINT SURVEY FORM',0),(19,3,'GENERATE CODE',0),(20,3,'GENERATE ACCOUNT',0),(21,3,'GRANT DECLARATION PRIVILEGE',0),(22,3,'TRACK PROGRESS',0),(23,3,'VIEW ANALYTIC',0),(24,3,'VIEW LIST',0),(25,3,'VIEW INFOR',0),(26,3,'IMPORT DATA',0),(27,3,'PRINT SURVEY FORM',0),(28,4,'GENERATE CODE',1),(29,4,'GENERATE ACCOUNT',1),(30,4,'GRANT DECLARATION PRIVILEGE',1),(31,4,'TRACK PROGRESS',1),(32,4,'VIEW ANALYTIC',1),(33,4,'VIEW LIST',1),(34,4,'VIEW INFOR',1),(35,4,'IMPORT DATA',1),(36,4,'PRINT SURVEY FORM',1),(37,5,'GENERATE CODE',0),(38,5,'GENERATE ACCOUNT',0),(39,5,'GRANT DECLARATION PRIVILEGE',0),(40,5,'TRACK PROGRESS',0),(41,5,'VIEW ANALYTIC',0),(42,5,'VIEW LIST',0),(43,5,'VIEW INFOR',0),(44,5,'IMPORT DATA',1),(45,5,'PRINT SURVEY FORM',0);
/*!40000 ALTER TABLE `authorization` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `b1`
--

DROP TABLE IF EXISTS `b1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `b1` (
  `code` int NOT NULL,
  `cityCode` int NOT NULL,
  `districtCode` int NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `author_code` int DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b1`
--

-- LOCK TABLES `b1` WRITE;
/*!40000 ALTER TABLE `b1` DISABLE KEYS */;
/*!40000 ALTER TABLE `b1` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `b2`
--

DROP TABLE IF EXISTS `b2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `b2` (
  `code` int NOT NULL,
  `cityCode` int NOT NULL,
  `districtCode` int NOT NULL,
  `wardCommuneCode` int NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `author_code` int DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b2`
--

-- LOCK TABLES `b2` WRITE;
/*!40000 ALTER TABLE `b2` DISABLE KEYS */;
/*!40000 ALTER TABLE `b2` ENABLE KEYS */;
-- UNLOCK TABLES;

--
-- Table structure for table `citizen`
--

DROP TABLE IF EXISTS `citizen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `citizen` (
  `ID` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `cityCode` int DEFAULT NULL,
  `districtCode` int DEFAULT NULL,
  `wardCommuneCode` int DEFAULT NULL,
  `hamletCode` int DEFAULT NULL,
  `job` varchar(45) DEFAULT NULL,
  `tongiao` varchar(45) DEFAULT NULL,
  `cultureLevel` varchar(45) DEFAULT NULL,
  `tempCityCode` int DEFAULT NULL,
  `tempDistrictCode` int DEFAULT NULL,
  `tempCommuneCode` int DEFAULT NULL,
  `tempHamletCode` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citizen`
--

-- LOCK TABLES `citizen` WRITE;
/*!40000 ALTER TABLE `citizen` DISABLE KEYS */;
/*!40000 ALTER TABLE `citizen` ENABLE KEYS */;
-- UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-19 10:19:46
