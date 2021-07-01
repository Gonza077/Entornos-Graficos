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

/*!40000 ALTER TABLE `catedra` DISABLE KEYS */;
INSERT INTO `catedra` (`id`, `create_time`, `update_time`, `jefe_catedra`) VALUES (1,'2021-06-09 00:37:21',NULL,'IsiJefe');
/*!40000 ALTER TABLE `catedra` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` (`id`, `docente_id`, `create_time`, `update_time`, `materia_id`, `fecha`, `descripcion_baja`, `fecha_baja`, `consulta_reemplazo_id`, `cupo`) VALUES (35,2,'2021-07-01 03:35:40','2021-07-01 03:36:25',3,'2021-07-30 07:00:00',NULL,NULL,NULL,2);
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` (`id`, `nombre_turno`, `hora_inicio`, `hora_fin`) VALUES (1,'Mañana','07:30:00','12:49:59'),(2,'Tarde','12:50:00','18:44:59'),(3,'Noche','18:45:00','24:00:00');
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` (`id`, `create_time`, `delete_time`, `nombre`, `descripcion`, `catedra_id`, `anio`) VALUES (1,'2021-06-09 00:38:15',NULL,'Análisis Matemático I',NULL,1,1),(2,'2021-06-09 00:38:15',NULL,'Física I',NULL,1,1),(3,'2021-06-09 00:38:15',NULL,'Algoritmo y estructuras de Datos',NULL,1,1),(4,'2021-06-09 00:38:15',NULL,'Arquitectura de Computadoras',NULL,1,1),(5,'2021-06-09 00:38:15',NULL,'Matemática Discreta',NULL,1,1),(6,'2021-06-09 00:38:15',NULL,'Sistemas y Organizaciones',NULL,1,1),(7,'2021-06-09 00:38:15',NULL,'Algebra y Geometría Analítica',NULL,1,1),(8,'2021-06-09 00:38:15',NULL,'Ingeniería y Sociedad',NULL,1,1),(9,'2021-06-09 00:38:15',NULL,'Análisis de Sistemas',NULL,1,2),(10,'2021-06-09 00:38:15',NULL,'Química',NULL,1,2),(11,'2021-06-09 00:38:15',NULL,'Análisis Matemático ll',NULL,1,2),(12,'2021-06-09 00:38:15',NULL,'Sintaxis',NULL,1,2),(13,'2021-06-09 00:38:15',NULL,'Física ll',NULL,1,2),(14,'2021-06-09 00:38:15',NULL,'Inglés l',NULL,1,2),(15,'2021-06-09 00:38:15',NULL,'Sistemas Operativos',NULL,1,2),(16,'2021-06-09 00:38:15',NULL,'Comunicaciones',NULL,1,3),(17,'2021-06-09 00:38:15',NULL,'Matemática Superior',NULL,1,3),(18,'2021-06-09 00:38:15',NULL,'Probabilidades y Estadísticas',NULL,1,3),(19,'2021-06-09 00:38:15',NULL,'Diseño de Sistemas',NULL,1,3),(20,'2021-06-09 00:38:15',NULL,'Gestión de Dat',NULL,1,3),(21,'2021-06-09 00:38:15',NULL,'Matemática Superior',NULL,1,3),(22,'2021-06-09 00:38:15',NULL,'Investigación Operativa',NULL,1,4),(23,'2021-06-09 00:38:15',NULL,'Administración de Recursos',NULL,1,4),(24,'2021-06-09 00:38:15',NULL,'Legislación',NULL,1,4),(25,'2021-06-09 00:38:15',NULL,'Simulación',NULL,1,4),(26,'2021-06-09 00:38:15',NULL,'Teoría de Control',NULL,1,4),(27,'2021-06-09 00:38:15',NULL,'Proyecto Final',NULL,1,5),(28,'2021-06-09 00:38:15',NULL,'Administración Gerencial',NULL,1,5),(29,'2021-06-09 00:38:15',NULL,'Sistemas de Gestión',NULL,1,5),(30,'2021-06-09 00:38:15',NULL,'Inteligencia Artificial',NULL,1,5);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `materia_docente` DISABLE KEYS */;
INSERT INTO `materia_docente` (`id`, `create_time`, `delete_time`, `materia_id`, `docente_id`) VALUES (9,'2021-07-01 03:35:14',NULL,1,2),(10,'2021-07-01 03:35:14',NULL,2,2),(11,'2021-07-01 03:35:14',NULL,3,2),(12,'2021-07-01 03:35:14',NULL,4,2),(13,'2021-07-01 03:35:14',NULL,5,2),(14,'2021-07-01 03:35:14',NULL,6,2),(15,'2021-07-01 03:35:14',NULL,7,2),(16,'2021-07-01 03:35:14',NULL,8,2);
/*!40000 ALTER TABLE `materia_docente` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`id`, `nombre`, `apellido`, `email`, `password`, `deleted_time`, `create_time`, `legajo`, `docente`, `admin`) VALUES (1,'admin','admin','Admin@Admin.com','21232f297a57a5a743894a0e4a801fc3',NULL,'2021-07-01 03:32:38','1',0,1),(2,'Docente','ApellidoDocente','D@D.COM','f623e75af30e62bbd73d6df5b50bb7b5',NULL,'2021-06-12 19:16:59',NULL,1,0),(3,'NoDocente','ApellidoND','ND@ND.COM','9a116c50d133c8648404081885194300',NULL,'2021-06-12 19:17:10',NULL,0,0);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-01  0:41:11
