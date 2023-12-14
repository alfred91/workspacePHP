-- MariaDB dump 10.19-11.1.2-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: AmigoInvisibleBD
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
-- Table structure for table `AmigoInvisible`
--

DROP TABLE IF EXISTS `AmigoInvisible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AmigoInvisible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `maximoDinero` varchar(45) DEFAULT NULL,
  `fechaTope` varchar(45) DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `emoji` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AmigoInvisible`
--

LOCK TABLES `AmigoInvisible` WRITE;
/*!40000 ALTER TABLE `AmigoInvisible` DISABLE KEYS */;
INSERT INTO `AmigoInvisible` VALUES
(1,'Raton','activo','20','2020-12-15','cuevas','color oscuro',':D'),
(2,'Teclado','comprado','30','2020-12-18','vera','mecanico',':('),
(3,'Cable HDMI','activo','20','2020-12-22','Garrucha','5m',':D');
/*!40000 ALTER TABLE `AmigoInvisible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AmigosParticipantes`
--

DROP TABLE IF EXISTS `AmigosParticipantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AmigosParticipantes` (
  `idAmigo` int(11) NOT NULL,
  `idParticipante` int(11) NOT NULL,
  PRIMARY KEY (`idAmigo`,`idParticipante`),
  KEY `Participantes_idx` (`idParticipante`),
  CONSTRAINT `Amigos` FOREIGN KEY (`idAmigo`) REFERENCES `AmigoInvisible` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Participantes` FOREIGN KEY (`idParticipante`) REFERENCES `Participante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AmigosParticipantes`
--

LOCK TABLES `AmigosParticipantes` WRITE;
/*!40000 ALTER TABLE `AmigosParticipantes` DISABLE KEYS */;
INSERT INTO `AmigosParticipantes` VALUES
(1,1),
(2,1),
(1,2),
(2,2),
(1,3);
/*!40000 ALTER TABLE `AmigosParticipantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Participante`
--

DROP TABLE IF EXISTS `Participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Participante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Participante`
--

LOCK TABLES `Participante` WRITE;
/*!40000 ALTER TABLE `Participante` DISABLE KEYS */;
INSERT INTO `Participante` VALUES
(1,'a@a.com','Alfredo','666222555'),
(2,'b@b.com','Jhonny','666555444'),
(3,'c@c.com','Javi','123456789'),
(4,'d@d.com','Estela','321654987');
/*!40000 ALTER TABLE `Participante` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-12 20:00:24
