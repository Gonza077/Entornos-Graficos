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

--
-- Dumping data for table `catedra`
--

LOCK TABLES `catedra` WRITE;
/*!40000 ALTER TABLE `catedra` DISABLE KEYS */;
INSERT INTO `catedra` (`id`, `create_time`, `update_time`, `jefe_catedra`) VALUES (1,'2021-06-09 00:37:21',NULL,'IsiJefe');
/*!40000 ALTER TABLE `catedra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `estado_consulta`
--

LOCK TABLES `estado_consulta` WRITE;
/*!40000 ALTER TABLE `estado_consulta` DISABLE KEYS */;
INSERT INTO `estado_consulta` (`id`, `codigo`, `descripcion`) VALUES (1,'CONFIRMADA',NULL),(2,'BLOQUEADA',NULL);
/*!40000 ALTER TABLE `estado_consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `estado_consulta_estado`
--

LOCK TABLES `estado_consulta_estado` WRITE;
/*!40000 ALTER TABLE `estado_consulta_estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado_consulta_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` (`id`, `create_time`, `delete_time`, `nombre`, `descripcion`, `catedra_id`, `anio`) VALUES (116,'2021-06-09 00:38:15',NULL,'Análisis Matemático I',NULL,1,1),(117,'2021-06-09 00:38:15',NULL,'Física I',NULL,1,1),(118,'2021-06-09 00:38:15',NULL,'Algoritmo y estructuras de Datos',NULL,1,1),(119,'2021-06-09 00:38:15',NULL,'Arquitectura de Computadoras',NULL,1,1),(120,'2021-06-09 00:38:15',NULL,'Matemática Discreta',NULL,1,1),(121,'2021-06-09 00:38:15',NULL,'Sistemas y Organizaciones',NULL,1,1),(122,'2021-06-09 00:38:15',NULL,'Algebra y Geometría Analítica',NULL,1,1),(123,'2021-06-09 00:38:15',NULL,'Ingeniería y Sociedad',NULL,1,1),(124,'2021-06-09 00:38:15',NULL,'Análisis de Sistemas',NULL,1,2),(125,'2021-06-09 00:38:15',NULL,'Química',NULL,1,2),(126,'2021-06-09 00:38:15',NULL,'Análisis Matemático ll',NULL,1,2),(127,'2021-06-09 00:38:15',NULL,'Sintaxis',NULL,1,2),(128,'2021-06-09 00:38:15',NULL,'Física ll',NULL,1,2),(129,'2021-06-09 00:38:15',NULL,'Inglés l',NULL,1,2),(130,'2021-06-09 00:38:15',NULL,'Sistemas Operativos',NULL,1,2),(131,'2021-06-09 00:38:15',NULL,'Comunicaciones',NULL,1,3),(132,'2021-06-09 00:38:15',NULL,'Matemática Superior',NULL,1,3),(133,'2021-06-09 00:38:15',NULL,'Probabilidades y Estadísticas',NULL,1,3),(134,'2021-06-09 00:38:15',NULL,'Diseño de Sistemas',NULL,1,3),(135,'2021-06-09 00:38:15',NULL,'Gestión de Dat',NULL,1,3),(136,'2021-06-09 00:38:15',NULL,'Matemática Superior',NULL,1,3),(137,'2021-06-09 00:38:15',NULL,'Investigación Operativa',NULL,1,4),(138,'2021-06-09 00:38:15',NULL,'Administración de Recursos',NULL,1,4),(139,'2021-06-09 00:38:15',NULL,'Legislación',NULL,1,4),(140,'2021-06-09 00:38:15',NULL,'Simulación',NULL,1,4),(141,'2021-06-09 00:38:15',NULL,'Teoría de Control',NULL,1,4),(142,'2021-06-09 00:38:15',NULL,'Proyecto Final',NULL,1,5),(143,'2021-06-09 00:38:15',NULL,'Administración Gerencial',NULL,1,5),(144,'2021-06-09 00:38:15',NULL,'Sistemas de Gestión',NULL,1,5),(145,'2021-06-09 00:38:15',NULL,'Inteligencia Artificial',NULL,1,5);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `materia_docente`
--

LOCK TABLES `materia_docente` WRITE;
/*!40000 ALTER TABLE `materia_docente` DISABLE KEYS */;
/*!40000 ALTER TABLE `materia_docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `solicitud`
--

LOCK TABLES `solicitud` WRITE;
/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-08 21:51:12
