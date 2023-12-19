-- MariaDB dump 10.19-11.1.2-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Padel
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
-- Table structure for table `Jugadores`
--

DROP TABLE IF EXISTS `Jugadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Jugadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apodo` varchar(45) DEFAULT NULL,
  `nivel` varchar(30) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Jugadores`
--

LOCK TABLES `Jugadores` WRITE;
/*!40000 ALTER TABLE `Jugadores` DISABLE KEYS */;
INSERT INTO `Jugadores` VALUES
(1,'a@a.com','1234','alfredo','fred','5',31),
(2,'b@b.com','1234','juan','john','4',30),
(3,'c@c.com','1234','Jugador3','Apodo3','1',25),
(4,'d@d.com','1234','Jugador4','Apodo4','5',29),
(5,'e@e.com','1234','Jugador5','Apodo5','3',22),
(6,'f@f.com','1234','Jugador4','Apodo6','1',30),
(7,'g@g.com','1234','Jugador7','Apodo7','4',33),
(8,'h@h.com','1234','Jugador8','Apodo8','2',26),
(9,'i@i.com','1234','Jugador9','Apodo9','3',36),
(10,'j@j.com','1234','Jugador10','Apodo10','4',40);
/*!40000 ALTER TABLE `Jugadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Partidas`
--

DROP TABLE IF EXISTS `Partidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Partidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `cubierto` tinyint(1) DEFAULT NULL,
  `estado` varchar(7) DEFAULT 'abierta',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Partidas`
--

LOCK TABLES `Partidas` WRITE;
/*!40000 ALTER TABLE `Partidas` DISABLE KEYS */;
INSERT INTO `Partidas` VALUES
(2,'2021-11-11','10:00','Los Gallardos','Pista Padel Municipal',1,'Cerrada'),
(22,'2023-12-20','09:00','Ciudad','Lugar',1,'Abierta'),
(25,'2023-12-20','09:00','Ciudad','Lugar',1,'Abierta'),
(29,'2023-12-20','09:00','Ciudad','Lugar',1,'Abierta'),
(46,'2023-12-20','09:00','Mojacar','Parador',1,'Abierta'),
(49,'2023-12-20','09:00','Mojacar','Parador',1,'Abierta'),
(50,'2023-12-20','09:00','Mojacar','Parador',1,'Abierta');
/*!40000 ALTER TABLE `Partidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PartidasJugadores`
--

DROP TABLE IF EXISTS `PartidasJugadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PartidasJugadores` (
  `idPartida` int(11) NOT NULL,
  `idJugador` int(11) NOT NULL,
  PRIMARY KEY (`idPartida`,`idJugador`),
  KEY `fk_PartidasJugadores_2_idx` (`idJugador`),
  CONSTRAINT `fk_PartidasJugadores_1` FOREIGN KEY (`idPartida`) REFERENCES `Partidas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_PartidasJugadores_2` FOREIGN KEY (`idJugador`) REFERENCES `Jugadores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PartidasJugadores`
--

LOCK TABLES `PartidasJugadores` WRITE;
/*!40000 ALTER TABLE `PartidasJugadores` DISABLE KEYS */;
INSERT INTO `PartidasJugadores` VALUES
(2,1),
(29,1),
(46,2),
(49,2),
(50,2),
(2,3),
(2,4),
(2,5);
/*!40000 ALTER TABLE `PartidasJugadores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-09 20:50:28
