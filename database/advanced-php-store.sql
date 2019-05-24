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
-- Table structure for table `Categories`
--

DROP TABLE IF EXISTS `Categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CategoryId` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categories`
--

LOCK TABLES `Categories` WRITE;
/*!40000 ALTER TABLE `Categories` DISABLE KEYS */;
INSERT INTO `Categories` VALUES (1,'Action'),(2,'Adventure'),(3,'Simulation'),(4,'MOBA'),(5,'Racing'),(6,'RPG'),(7,'MMO-RPG');
/*!40000 ALTER TABLE `Categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Images`
--

DROP TABLE IF EXISTS `Images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Images` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Image` blob NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ImageId` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Images`
--

LOCK TABLES `Images` WRITE;
/*!40000 ALTER TABLE `Images` DISABLE KEYS */;
/*!40000 ALTER TABLE `Images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductBasePrice`
--

DROP TABLE IF EXISTS `ProductBasePrice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductBasePrice` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ProductBasePriceId` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductBasePrice`
--

LOCK TABLES `ProductBasePrice` WRITE;
/*!40000 ALTER TABLE `ProductBasePrice` DISABLE KEYS */;
INSERT INTO `ProductBasePrice` VALUES (1,1,0.00),(2,2,50.00),(3,3,20.00);
/*!40000 ALTER TABLE `ProductBasePrice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductCategory`
--

DROP TABLE IF EXISTS `ProductCategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductCategory` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ProductCategoryId` (`ID`),
  KEY `ProductCategoryProductId` (`ProductId`),
  KEY `ProductCategoryCategoryId` (`CategoryId`),
  CONSTRAINT `ProductCategoryCategoryId` FOREIGN KEY (`CategoryId`) REFERENCES `Categories` (`ID`),
  CONSTRAINT `ProductCategoryProductId` FOREIGN KEY (`ProductId`) REFERENCES `Products` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductCategory`
--

LOCK TABLES `ProductCategory` WRITE;
/*!40000 ALTER TABLE `ProductCategory` DISABLE KEYS */;
/*!40000 ALTER TABLE `ProductCategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductImages`
--

DROP TABLE IF EXISTS `ProductImages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductImages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL,
  `ImageId` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ProductImageId` (`ID`),
  KEY `ProductImageProductId` (`ProductId`),
  KEY `ProductImageImageId` (`ImageId`),
  CONSTRAINT `ProductImageImageId` FOREIGN KEY (`ImageId`) REFERENCES `Images` (`ID`),
  CONSTRAINT `ProductImageProductId` FOREIGN KEY (`ProductId`) REFERENCES `Products` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductImages`
--

LOCK TABLES `ProductImages` WRITE;
/*!40000 ALTER TABLE `ProductImages` DISABLE KEYS */;
/*!40000 ALTER TABLE `ProductImages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProductPrice`
--

DROP TABLE IF EXISTS `ProductPrice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProductPrice` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductBasePriceId` int(11) NOT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date DEFAULT NULL,
  `Percentage` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ProductPriceId` (`ID`),
  KEY `ProductBasePriceProductPriceId` (`ProductBasePriceId`),
  CONSTRAINT `ProductBasePriceProductPriceId` FOREIGN KEY (`ProductBasePriceId`) REFERENCES `ProductBasePrice` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProductPrice`
--

LOCK TABLES `ProductPrice` WRITE;
/*!40000 ALTER TABLE `ProductPrice` DISABLE KEYS */;
/*!40000 ALTER TABLE `ProductPrice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `DeveloperName` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ProductsId` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Products`
--

LOCK TABLES `Products` WRITE;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` VALUES (1,'The Forest','Is a survival game with cannibals and you can build things.','forest'),(2,'Tomb Raider','You can raid tombs and stuff','tomb-raider-2015'),(5,'New game','brand new game','new-game');
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SimpleProducts`
--

DROP TABLE IF EXISTS `SimpleProducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SimpleProducts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  `Image` blob,
  `Category` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `SimpleProductsId` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SimpleProducts`
--

LOCK TABLES `SimpleProducts` WRITE;
/*!40000 ALTER TABLE `SimpleProducts` DISABLE KEYS */;
/*!40000 ALTER TABLE `SimpleProducts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-23 10:51:35
