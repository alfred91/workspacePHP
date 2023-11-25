-- MariaDB dump 10.19-11.1.2-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Regalos
-- ------------------------------------------------------
-- Server version	11.1.2-MariaDB-1:11.1.2+maria~ubu2204

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Enlaces`
--

DROP TABLE IF EXISTS `Enlaces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Enlaces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `enlaceWeb` varchar(45) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `prioridad` varchar(45) DEFAULT NULL,
  `idRegalo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idRegalo_idx` (`idRegalo`),
  CONSTRAINT `idRegalo` FOREIGN KEY (`idRegalo`) REFERENCES `Regalos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Enlaces`
--

LOCK TABLES `Enlaces` WRITE;
/*!40000 ALTER TABLE `Enlaces` DISABLE KEYS */;
INSERT INTO `Enlaces` VALUES
(2,'Prueba','www','100','','2',2),
(47,'a','b','5.01','0','2',1),
(57,'a','b','10','','0',2),
(64,'a','b','4','','0',2),
(68,'a','b','5.01','','0',2),
(69,'a','b','5.01','1','1',1),
(71,'a','b','5.01','','2',1),
(73,'a','c','0.01','13','1',22),
(74,'a','c','0.01','13','1',22),
(75,'132','c','0.01','13','1',42),
(77,'b','c','0.02','13','3',21),
(78,'nuevo','enlace','0.02','13','0',45);
/*!40000 ALTER TABLE `Enlaces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Regalos`
--

DROP TABLE IF EXISTS `Regalos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Regalos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `destinatario` varchar(45) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUsuario_idx` (`idUsuario`),
  CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `Usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Regalos`
--

LOCK TABLES `Regalos` WRITE;
/*!40000 ALTER TABLE `Regalos` DISABLE KEYS */;
INSERT INTO `Regalos` VALUES
(1,'Logitech G502X Plus','Alfredo',130,'comprado',2007,1),
(2,'Klim chroma','Juan',50,'Nuevo',2021,2),
(4,'MSI GE72-6QD','Jose',600,'Seminuevo',2016,2),
(21,'prueba','nadie',2,'pendiente',2023,1),
(22,'Klim Lighting Wireless','Juan Guarnizo',50,'pendiente',2021,1),
(41,'Prueba','Jose',1,'entregado',2000,1),
(42,'Regalazo','jose juan',5,'comprado',2000,1),
(43,'a','b',1,'pendiente',2000,1),
(45,'algo','reglao',2,'comprado',2001,1),
(52,'MI ENORME COYUNTURA','A',1,'pendiente',2000,1),
(53,'Proyecto 13','a',2,'pendiente',2000,2),
(57,'a','b',1,'pendiente',2000,1);
/*!40000 ALTER TABLE `Regalos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES
(1,'a@a.com','12345678A','Alfredo'),
(2,'b@b.com','12345678A','Juan'),
(3,'c@c.com','12345678A','Ana');
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-25 21:00:17
