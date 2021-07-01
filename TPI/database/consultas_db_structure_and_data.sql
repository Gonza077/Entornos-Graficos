-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: consultas_db
-- ------------------------------------------------------
-- Server version	8.0.23

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


DROP SCHEMA IF EXISTS `consultas_db`;
CREATE SCHEMA `consultas_db`;
USE `consultas_db`;
--
-- Table structure for table `catedra`
--

DROP TABLE IF EXISTS `catedra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catedra` (
  `id` int NOT NULL AUTO_INCREMENT,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  `jefe_catedra` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catedra`
--

LOCK TABLES `catedra` WRITE;
/*!40000 ALTER TABLE `catedra` DISABLE KEYS */;
INSERT INTO `catedra` (`id`, `create_time`, `update_time`, `jefe_catedra`) VALUES (1,'2021-06-09 00:37:21',NULL,'IsiJefe');
/*!40000 ALTER TABLE `catedra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consulta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `docente_id` int NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT NULL,
  `materia_id` int NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion_baja` varchar(255) DEFAULT NULL,
  `fecha_baja` timestamp NULL DEFAULT NULL,
  `consulta_reemplazo_id` int DEFAULT NULL,
  `cupo` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_materia` (`materia_id`) /*!80000 INVISIBLE */,
  KEY `fk_docente` (`docente_id`) /*!80000 INVISIBLE */,
  KEY `fk_consulta_reemplazo_idx` (`consulta_reemplazo_id`),
  CONSTRAINT `fk_consulta_docente` FOREIGN KEY (`docente_id`) REFERENCES `persona` (`id`),
  CONSTRAINT `fk_consulta_materia` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`),
  CONSTRAINT `fk_consulta_reemplazo` FOREIGN KEY (`consulta_reemplazo_id`) REFERENCES `consulta` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` (`id`, `docente_id`, `create_time`, `update_time`, `materia_id`, `fecha`, `descripcion_baja`, `fecha_baja`, `consulta_reemplazo_id`, `cupo`) VALUES (35,2,'2021-07-01 03:35:40','2021-07-01 03:36:25',3,'2021-07-30 07:00:00',NULL,NULL,NULL,2);
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fechas`
--

DROP TABLE IF EXISTS `fechas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fechas` (
  `fecha` datetime NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fechas`
--

LOCK TABLES `fechas` WRITE;
/*!40000 ALTER TABLE `fechas` DISABLE KEYS */;
INSERT INTO `fechas` (`fecha`, `descripcion`) VALUES ('2021-01-01 00:00:00',NULL),('2021-01-02 00:00:00',NULL),('2021-01-03 00:00:00',NULL),('2021-01-04 00:00:00',NULL),('2021-01-05 00:00:00',NULL),('2021-01-06 00:00:00',NULL),('2021-01-07 00:00:00',NULL),('2021-01-08 00:00:00',NULL),('2021-01-09 00:00:00',NULL),('2021-01-10 00:00:00',NULL),('2021-01-11 00:00:00',NULL),('2021-01-12 00:00:00',NULL),('2021-01-13 00:00:00',NULL),('2021-01-14 00:00:00',NULL),('2021-01-15 00:00:00',NULL),('2021-01-16 00:00:00',NULL),('2021-01-17 00:00:00',NULL),('2021-01-18 00:00:00',NULL),('2021-01-19 00:00:00',NULL),('2021-01-20 00:00:00',NULL),('2021-01-21 00:00:00',NULL),('2021-01-22 00:00:00',NULL),('2021-01-23 00:00:00',NULL),('2021-01-24 00:00:00',NULL),('2021-01-25 00:00:00',NULL),('2021-01-26 00:00:00',NULL),('2021-01-27 00:00:00',NULL),('2021-01-28 00:00:00',NULL),('2021-01-29 00:00:00',NULL),('2021-01-30 00:00:00',NULL),('2021-01-31 00:00:00',NULL),('2021-02-01 00:00:00',NULL),('2021-02-02 00:00:00',NULL),('2021-02-03 00:00:00',NULL),('2021-02-04 00:00:00',NULL),('2021-02-05 00:00:00',NULL),('2021-02-06 00:00:00',NULL),('2021-02-07 00:00:00',NULL),('2021-02-08 00:00:00',NULL),('2021-02-09 00:00:00',NULL),('2021-02-10 00:00:00',NULL),('2021-02-11 00:00:00',NULL),('2021-02-12 00:00:00',NULL),('2021-02-13 00:00:00',NULL),('2021-02-14 00:00:00',NULL),('2021-02-15 00:00:00',NULL),('2021-02-16 00:00:00',NULL),('2021-02-17 00:00:00',NULL),('2021-02-18 00:00:00',NULL),('2021-02-19 00:00:00',NULL),('2021-02-20 00:00:00',NULL),('2021-02-21 00:00:00',NULL),('2021-02-22 00:00:00',NULL),('2021-02-23 00:00:00',NULL),('2021-02-24 00:00:00',NULL),('2021-02-25 00:00:00',NULL),('2021-02-26 00:00:00',NULL),('2021-02-27 00:00:00',NULL),('2021-02-28 00:00:00',NULL),('2021-03-01 00:00:00',NULL),('2021-03-02 00:00:00',NULL),('2021-03-03 00:00:00',NULL),('2021-03-04 00:00:00',NULL),('2021-03-05 00:00:00',NULL),('2021-03-06 00:00:00',NULL),('2021-03-07 00:00:00',NULL),('2021-03-08 00:00:00',NULL),('2021-03-09 00:00:00',NULL),('2021-03-10 00:00:00',NULL),('2021-03-11 00:00:00',NULL),('2021-03-12 00:00:00',NULL),('2021-03-13 00:00:00',NULL),('2021-03-14 00:00:00',NULL),('2021-03-15 00:00:00',NULL),('2021-03-16 00:00:00',NULL),('2021-03-17 00:00:00',NULL),('2021-03-18 00:00:00',NULL),('2021-03-19 00:00:00',NULL),('2021-03-20 00:00:00',NULL),('2021-03-21 00:00:00',NULL),('2021-03-22 00:00:00',NULL),('2021-03-23 00:00:00',NULL),('2021-03-24 00:00:00',NULL),('2021-03-25 00:00:00',NULL),('2021-03-26 00:00:00',NULL),('2021-03-27 00:00:00',NULL),('2021-03-28 00:00:00',NULL),('2021-03-29 00:00:00',NULL),('2021-03-30 00:00:00',NULL),('2021-03-31 00:00:00',NULL),('2021-04-01 00:00:00',NULL),('2021-04-02 00:00:00',NULL),('2021-04-03 00:00:00',NULL),('2021-04-04 00:00:00',NULL),('2021-04-05 00:00:00',NULL),('2021-04-06 00:00:00',NULL),('2021-04-07 00:00:00',NULL),('2021-04-08 00:00:00',NULL),('2021-04-09 00:00:00',NULL),('2021-04-10 00:00:00',NULL),('2021-04-11 00:00:00',NULL),('2021-04-12 00:00:00',NULL),('2021-04-13 00:00:00',NULL),('2021-04-14 00:00:00',NULL),('2021-04-15 00:00:00',NULL),('2021-04-16 00:00:00',NULL),('2021-04-17 00:00:00',NULL),('2021-04-18 00:00:00',NULL),('2021-04-19 00:00:00',NULL),('2021-04-20 00:00:00',NULL),('2021-04-21 00:00:00',NULL),('2021-04-22 00:00:00',NULL),('2021-04-23 00:00:00',NULL),('2021-04-24 00:00:00',NULL),('2021-04-25 00:00:00',NULL),('2021-04-26 00:00:00',NULL),('2021-04-27 00:00:00',NULL),('2021-04-28 00:00:00',NULL),('2021-04-29 00:00:00',NULL),('2021-04-30 00:00:00',NULL),('2021-05-01 00:00:00',NULL),('2021-05-02 00:00:00',NULL),('2021-05-03 00:00:00',NULL),('2021-05-04 00:00:00',NULL),('2021-05-05 00:00:00',NULL),('2021-05-06 00:00:00',NULL),('2021-05-07 00:00:00',NULL),('2021-05-08 00:00:00',NULL),('2021-05-09 00:00:00',NULL),('2021-05-10 00:00:00',NULL),('2021-05-11 00:00:00',NULL),('2021-05-12 00:00:00',NULL),('2021-05-13 00:00:00',NULL),('2021-05-14 00:00:00',NULL),('2021-05-15 00:00:00',NULL),('2021-05-16 00:00:00',NULL),('2021-05-17 00:00:00',NULL),('2021-05-18 00:00:00',NULL),('2021-05-19 00:00:00',NULL),('2021-05-20 00:00:00',NULL),('2021-05-21 00:00:00',NULL),('2021-05-22 00:00:00',NULL),('2021-05-23 00:00:00',NULL),('2021-05-24 00:00:00',NULL),('2021-05-25 00:00:00',NULL),('2021-05-26 00:00:00',NULL),('2021-05-27 00:00:00',NULL),('2021-05-28 00:00:00',NULL),('2021-05-29 00:00:00',NULL),('2021-05-30 00:00:00',NULL),('2021-05-31 00:00:00',NULL),('2021-06-01 00:00:00',NULL),('2021-06-02 00:00:00',NULL),('2021-06-03 00:00:00',NULL),('2021-06-04 00:00:00',NULL),('2021-06-05 00:00:00',NULL),('2021-06-06 00:00:00',NULL),('2021-06-07 00:00:00',NULL),('2021-06-08 00:00:00',NULL),('2021-06-09 00:00:00',NULL),('2021-06-10 00:00:00',NULL),('2021-06-11 00:00:00',NULL),('2021-06-12 00:00:00',NULL),('2021-06-13 00:00:00',NULL),('2021-06-14 00:00:00',NULL),('2021-06-15 00:00:00',NULL),('2021-06-16 00:00:00',NULL),('2021-06-17 00:00:00',NULL),('2021-06-18 00:00:00',NULL),('2021-06-19 00:00:00',NULL),('2021-06-20 00:00:00',NULL),('2021-06-21 00:00:00',NULL),('2021-06-22 00:00:00',NULL),('2021-06-23 00:00:00',NULL),('2021-06-24 00:00:00',NULL),('2021-06-25 00:00:00',NULL),('2021-06-26 00:00:00',NULL),('2021-06-27 00:00:00',NULL),('2021-06-28 00:00:00',NULL),('2021-06-29 00:00:00',NULL),('2021-06-30 00:00:00',NULL),('2021-07-01 00:00:00',NULL),('2021-07-02 00:00:00',NULL),('2021-07-03 00:00:00',NULL),('2021-07-04 00:00:00',NULL),('2021-07-05 00:00:00',NULL),('2021-07-06 00:00:00',NULL),('2021-07-07 00:00:00',NULL),('2021-07-08 00:00:00',NULL),('2021-07-09 00:00:00',NULL),('2021-07-10 00:00:00',NULL),('2021-07-11 00:00:00',NULL),('2021-07-12 00:00:00',NULL),('2021-07-13 00:00:00',NULL),('2021-07-14 00:00:00',NULL),('2021-07-15 00:00:00',NULL),('2021-07-16 00:00:00',NULL),('2021-07-17 00:00:00',NULL),('2021-07-18 00:00:00',NULL),('2021-07-19 00:00:00',NULL),('2021-07-20 00:00:00',NULL),('2021-07-21 00:00:00',NULL),('2021-07-22 00:00:00',NULL),('2021-07-23 00:00:00',NULL),('2021-07-24 00:00:00',NULL),('2021-07-25 00:00:00',NULL),('2021-07-26 00:00:00',NULL),('2021-07-27 00:00:00',NULL),('2021-07-28 00:00:00',NULL),('2021-07-29 00:00:00',NULL),('2021-07-30 00:00:00',NULL),('2021-07-31 00:00:00',NULL),('2021-08-01 00:00:00',NULL),('2021-08-02 00:00:00',NULL),('2021-08-03 00:00:00',NULL),('2021-08-04 00:00:00',NULL),('2021-08-05 00:00:00',NULL),('2021-08-06 00:00:00',NULL),('2021-08-07 00:00:00',NULL),('2021-08-08 00:00:00',NULL),('2021-08-09 00:00:00',NULL),('2021-08-10 00:00:00',NULL),('2021-08-11 00:00:00',NULL),('2021-08-12 00:00:00',NULL),('2021-08-13 00:00:00',NULL),('2021-08-14 00:00:00',NULL),('2021-08-15 00:00:00',NULL),('2021-08-16 00:00:00',NULL),('2021-08-17 00:00:00',NULL),('2021-08-18 00:00:00',NULL),('2021-08-19 00:00:00',NULL),('2021-08-20 00:00:00',NULL),('2021-08-21 00:00:00',NULL),('2021-08-22 00:00:00',NULL),('2021-08-23 00:00:00',NULL),('2021-08-24 00:00:00',NULL),('2021-08-25 00:00:00',NULL),('2021-08-26 00:00:00',NULL),('2021-08-27 00:00:00',NULL),('2021-08-28 00:00:00',NULL),('2021-08-29 00:00:00',NULL),('2021-08-30 00:00:00',NULL),('2021-08-31 00:00:00',NULL),('2021-09-01 00:00:00',NULL),('2021-09-02 00:00:00',NULL),('2021-09-03 00:00:00',NULL),('2021-09-04 00:00:00',NULL),('2021-09-05 00:00:00',NULL),('2021-09-06 00:00:00',NULL),('2021-09-07 00:00:00',NULL),('2021-09-08 00:00:00',NULL),('2021-09-09 00:00:00',NULL),('2021-09-10 00:00:00',NULL),('2021-09-11 00:00:00',NULL),('2021-09-12 00:00:00',NULL),('2021-09-13 00:00:00',NULL),('2021-09-14 00:00:00',NULL),('2021-09-15 00:00:00',NULL),('2021-09-16 00:00:00',NULL),('2021-09-17 00:00:00',NULL),('2021-09-18 00:00:00',NULL),('2021-09-19 00:00:00',NULL),('2021-09-20 00:00:00',NULL),('2021-09-21 00:00:00',NULL),('2021-09-22 00:00:00',NULL),('2021-09-23 00:00:00',NULL),('2021-09-24 00:00:00',NULL),('2021-09-25 00:00:00',NULL),('2021-09-26 00:00:00',NULL),('2021-09-27 00:00:00',NULL),('2021-09-28 00:00:00',NULL),('2021-09-29 00:00:00',NULL),('2021-09-30 00:00:00',NULL),('2021-10-01 00:00:00',NULL),('2021-10-02 00:00:00',NULL),('2021-10-03 00:00:00',NULL),('2021-10-04 00:00:00',NULL),('2021-10-05 00:00:00',NULL),('2021-10-06 00:00:00',NULL),('2021-10-07 00:00:00',NULL),('2021-10-08 00:00:00',NULL),('2021-10-09 00:00:00',NULL),('2021-10-10 00:00:00',NULL),('2021-10-11 00:00:00',NULL),('2021-10-12 00:00:00',NULL),('2021-10-13 00:00:00',NULL),('2021-10-14 00:00:00',NULL),('2021-10-15 00:00:00',NULL),('2021-10-16 00:00:00',NULL),('2021-10-17 00:00:00',NULL),('2021-10-18 00:00:00',NULL),('2021-10-19 00:00:00',NULL),('2021-10-20 00:00:00',NULL),('2021-10-21 00:00:00',NULL),('2021-10-22 00:00:00',NULL),('2021-10-23 00:00:00',NULL),('2021-10-24 00:00:00',NULL),('2021-10-25 00:00:00',NULL),('2021-10-26 00:00:00',NULL),('2021-10-27 00:00:00',NULL),('2021-10-28 00:00:00',NULL),('2021-10-29 00:00:00',NULL),('2021-10-30 00:00:00',NULL),('2021-10-31 00:00:00',NULL),('2021-11-01 00:00:00',NULL),('2021-11-02 00:00:00',NULL),('2021-11-03 00:00:00',NULL),('2021-11-04 00:00:00',NULL),('2021-11-05 00:00:00',NULL),('2021-11-06 00:00:00',NULL),('2021-11-07 00:00:00',NULL),('2021-11-08 00:00:00',NULL),('2021-11-09 00:00:00',NULL),('2021-11-10 00:00:00',NULL),('2021-11-11 00:00:00',NULL),('2021-11-12 00:00:00',NULL),('2021-11-13 00:00:00',NULL),('2021-11-14 00:00:00',NULL),('2021-11-15 00:00:00',NULL),('2021-11-16 00:00:00',NULL),('2021-11-17 00:00:00',NULL),('2021-11-18 00:00:00',NULL),('2021-11-19 00:00:00',NULL),('2021-11-20 00:00:00',NULL),('2021-11-21 00:00:00',NULL),('2021-11-22 00:00:00',NULL),('2021-11-23 00:00:00',NULL),('2021-11-24 00:00:00',NULL),('2021-11-25 00:00:00',NULL),('2021-11-26 00:00:00',NULL),('2021-11-27 00:00:00',NULL),('2021-11-28 00:00:00',NULL),('2021-11-29 00:00:00',NULL),('2021-11-30 00:00:00',NULL),('2021-12-01 00:00:00',NULL),('2021-12-02 00:00:00',NULL),('2021-12-03 00:00:00',NULL),('2021-12-04 00:00:00',NULL),('2021-12-05 00:00:00',NULL),('2021-12-06 00:00:00',NULL),('2021-12-07 00:00:00',NULL),('2021-12-08 00:00:00',NULL),('2021-12-09 00:00:00',NULL),('2021-12-10 00:00:00',NULL),('2021-12-11 00:00:00',NULL),('2021-12-12 00:00:00',NULL),('2021-12-13 00:00:00',NULL),('2021-12-14 00:00:00',NULL),('2021-12-15 00:00:00',NULL),('2021-12-16 00:00:00',NULL),('2021-12-17 00:00:00',NULL),('2021-12-18 00:00:00',NULL),('2021-12-19 00:00:00',NULL),('2021-12-20 00:00:00',NULL),('2021-12-21 00:00:00',NULL),('2021-12-22 00:00:00',NULL),('2021-12-23 00:00:00',NULL),('2021-12-24 00:00:00',NULL),('2021-12-25 00:00:00',NULL),('2021-12-26 00:00:00',NULL),('2021-12-27 00:00:00',NULL),('2021-12-28 00:00:00',NULL),('2021-12-29 00:00:00',NULL),('2021-12-30 00:00:00',NULL),('2021-12-31 00:00:00',NULL);
/*!40000 ALTER TABLE `fechas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_turno` varchar(45) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` (`id`, `nombre_turno`, `hora_inicio`, `hora_fin`) VALUES (1,'Mañana','07:30:00','12:49:59'),(2,'Tarde','12:50:00','18:44:59'),(3,'Noche','18:45:00','24:00:00');
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_time` timestamp NULL DEFAULT NULL,
  `nombre` varchar(32) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `catedra_id` int DEFAULT NULL,
  `anio` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_catedra` (`catedra_id`) /*!80000 INVISIBLE */,
  CONSTRAINT `fk_materia_catedra` FOREIGN KEY (`catedra_id`) REFERENCES `catedra` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` (`id`, `create_time`, `delete_time`, `nombre`, `descripcion`, `catedra_id`, `anio`) VALUES (1,'2021-06-09 00:38:15',NULL,'Análisis Matemático I',NULL,1,1),(2,'2021-06-09 00:38:15',NULL,'Física I',NULL,1,1),(3,'2021-06-09 00:38:15',NULL,'Algoritmo y estructuras de Datos',NULL,1,1),(4,'2021-06-09 00:38:15',NULL,'Arquitectura de Computadoras',NULL,1,1),(5,'2021-06-09 00:38:15',NULL,'Matemática Discreta',NULL,1,1),(6,'2021-06-09 00:38:15',NULL,'Sistemas y Organizaciones',NULL,1,1),(7,'2021-06-09 00:38:15',NULL,'Algebra y Geometría Analítica',NULL,1,1),(8,'2021-06-09 00:38:15',NULL,'Ingeniería y Sociedad',NULL,1,1),(9,'2021-06-09 00:38:15',NULL,'Análisis de Sistemas',NULL,1,2),(10,'2021-06-09 00:38:15',NULL,'Química',NULL,1,2),(11,'2021-06-09 00:38:15',NULL,'Análisis Matemático ll',NULL,1,2),(12,'2021-06-09 00:38:15',NULL,'Sintaxis',NULL,1,2),(13,'2021-06-09 00:38:15',NULL,'Física ll',NULL,1,2),(14,'2021-06-09 00:38:15',NULL,'Inglés l',NULL,1,2),(15,'2021-06-09 00:38:15',NULL,'Sistemas Operativos',NULL,1,2),(16,'2021-06-09 00:38:15',NULL,'Comunicaciones',NULL,1,3),(17,'2021-06-09 00:38:15',NULL,'Matemática Superior',NULL,1,3),(18,'2021-06-09 00:38:15',NULL,'Probabilidades y Estadísticas',NULL,1,3),(19,'2021-06-09 00:38:15',NULL,'Diseño de Sistemas',NULL,1,3),(20,'2021-06-09 00:38:15',NULL,'Gestión de Dat',NULL,1,3),(21,'2021-06-09 00:38:15',NULL,'Matemática Superior',NULL,1,3),(22,'2021-06-09 00:38:15',NULL,'Investigación Operativa',NULL,1,4),(23,'2021-06-09 00:38:15',NULL,'Administración de Recursos',NULL,1,4),(24,'2021-06-09 00:38:15',NULL,'Legislación',NULL,1,4),(25,'2021-06-09 00:38:15',NULL,'Simulación',NULL,1,4),(26,'2021-06-09 00:38:15',NULL,'Teoría de Control',NULL,1,4),(27,'2021-06-09 00:38:15',NULL,'Proyecto Final',NULL,1,5),(28,'2021-06-09 00:38:15',NULL,'Administración Gerencial',NULL,1,5),(29,'2021-06-09 00:38:15',NULL,'Sistemas de Gestión',NULL,1,5),(30,'2021-06-09 00:38:15',NULL,'Inteligencia Artificial',NULL,1,5);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia_docente`
--

DROP TABLE IF EXISTS `materia_docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materia_docente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_time` timestamp NULL DEFAULT NULL,
  `materia_id` int NOT NULL,
  `docente_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_docente` (`docente_id`) /*!80000 INVISIBLE */,
  KEY `fk_materia` (`materia_id`) /*!80000 INVISIBLE */,
  CONSTRAINT `fk_materia_docente_docente` FOREIGN KEY (`docente_id`) REFERENCES `persona` (`id`),
  CONSTRAINT `fk_materia_docente_materia` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_docente`
--

LOCK TABLES `materia_docente` WRITE;
/*!40000 ALTER TABLE `materia_docente` DISABLE KEYS */;
INSERT INTO `materia_docente` (`id`, `create_time`, `delete_time`, `materia_id`, `docente_id`) VALUES (9,'2021-07-01 03:35:14',NULL,1,2),(10,'2021-07-01 03:35:14',NULL,2,2),(11,'2021-07-01 03:35:14',NULL,3,2),(12,'2021-07-01 03:35:14',NULL,4,2),(13,'2021-07-01 03:35:14',NULL,5,2),(14,'2021-07-01 03:35:14',NULL,6,2),(15,'2021-07-01 03:35:14',NULL,7,2),(16,'2021-07-01 03:35:14',NULL,8,2);
/*!40000 ALTER TABLE `materia_docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `deleted_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `legajo` varchar(45) DEFAULT NULL,
  `docente` tinyint NOT NULL,
  `admin` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`id`, `nombre`, `apellido`, `email`, `password`, `deleted_time`, `create_time`, `legajo`, `docente`, `admin`) VALUES (1,'admin','admin','Admin@Admin.com','21232f297a57a5a743894a0e4a801fc3',NULL,'2021-07-01 03:32:38','1',0,1),(2,'Docente','ApellidoDocente','D@D.COM','f623e75af30e62bbd73d6df5b50bb7b5',NULL,'2021-06-12 19:16:59',NULL,1,0),(3,'NoDocente','ApellidoND','ND@ND.COM','9a116c50d133c8648404081885194300',NULL,'2021-06-12 19:17:10',NULL,0,0);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud` (
  `id` int NOT NULL AUTO_INCREMENT,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `persona_id` int NOT NULL,
  `consulta_id` int NOT NULL,
  `aceptada` tinyint NOT NULL DEFAULT '0',
  `fecha_baja` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_persona` (`persona_id`) /*!80000 INVISIBLE */,
  KEY `fk_consula` (`consulta_id`) /*!80000 INVISIBLE */,
  CONSTRAINT `fk_solicitud_consulta` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`),
  CONSTRAINT `fk_solicitud_persona` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud`
--

LOCK TABLES `solicitud` WRITE;
/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'consultas_db'
--
/*!50003 DROP PROCEDURE IF EXISTS `filldates` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `filldates`(dateStart DATE,dateEnd DATE)
BEGIN
DECLARE aDate date;
	WHILE dateStart<= dateEnd DO
		INSERT INTO fechas (fecha) VALUES (dateStart);
		SET dateStart = date_add(dateStart,INTERVAL 1 DAY);
	END WHILE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-01 17:50:42
