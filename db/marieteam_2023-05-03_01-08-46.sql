-- MariaDB dump 10.19  Distrib 10.5.18-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: marieteam
-- ------------------------------------------------------
-- Server version	10.5.18-MariaDB-0+deb11u1

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
-- Table structure for table `acl_classes`
--

DROP TABLE IF EXISTS `acl_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_type` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_69DD750638A36066` (`class_type`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_classes`
--

LOCK TABLES `acl_classes` WRITE;
/*!40000 ALTER TABLE `acl_classes` DISABLE KEYS */;
INSERT INTO `acl_classes` VALUES (3,'App\\Entity\\Admin'),(1,'App\\Entity\\Bateau'),(6,'App\\Entity\\Categorie'),(4,'App\\Entity\\Client'),(2,'App\\Entity\\Liaison'),(5,'App\\Entity\\Traversee');
/*!40000 ALTER TABLE `acl_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_entries`
--

DROP TABLE IF EXISTS `acl_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL,
  `object_identity_id` int(10) unsigned DEFAULT NULL,
  `security_identity_id` int(10) unsigned NOT NULL,
  `field_name` varchar(50) DEFAULT NULL,
  `ace_order` smallint(5) unsigned NOT NULL,
  `mask` int(11) NOT NULL,
  `granting` tinyint(1) NOT NULL,
  `granting_strategy` varchar(30) NOT NULL,
  `audit_success` tinyint(1) NOT NULL,
  `audit_failure` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_46C8B806EA000B103D9AB4A64DEF17BCE4289BF4` (`class_id`,`object_identity_id`,`field_name`,`ace_order`),
  KEY `IDX_46C8B806EA000B103D9AB4A6DF9183C9` (`class_id`,`object_identity_id`,`security_identity_id`),
  KEY `IDX_46C8B806EA000B10` (`class_id`),
  KEY `IDX_46C8B8063D9AB4A6` (`object_identity_id`),
  KEY `IDX_46C8B806DF9183C9` (`security_identity_id`),
  CONSTRAINT `FK_46C8B8063D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_46C8B806DF9183C9` FOREIGN KEY (`security_identity_id`) REFERENCES `acl_security_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_46C8B806EA000B10` FOREIGN KEY (`class_id`) REFERENCES `acl_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_entries`
--

LOCK TABLES `acl_entries` WRITE;
/*!40000 ALTER TABLE `acl_entries` DISABLE KEYS */;
INSERT INTO `acl_entries` VALUES (1,1,NULL,1,NULL,0,64,1,'all',0,0),(2,1,NULL,2,NULL,1,32,1,'all',0,0),(3,1,NULL,3,NULL,2,16388,1,'all',0,0),(4,1,NULL,4,NULL,3,1,1,'all',0,0),(5,1,1,5,NULL,0,128,1,'all',0,0),(6,2,NULL,6,NULL,0,64,1,'all',0,0),(7,2,NULL,7,NULL,1,32,1,'all',0,0),(8,2,NULL,8,NULL,2,16388,1,'all',0,0),(9,2,NULL,9,NULL,3,1,1,'all',0,0),(10,2,2,5,NULL,0,128,1,'all',0,0),(11,2,3,5,NULL,0,128,1,'all',0,0),(12,2,4,5,NULL,0,128,1,'all',0,0),(13,2,5,5,NULL,0,128,1,'all',0,0),(14,2,6,5,NULL,0,128,1,'all',0,0),(15,2,7,5,NULL,0,128,1,'all',0,0),(16,2,8,5,NULL,0,128,1,'all',0,0),(18,3,NULL,10,NULL,0,64,1,'all',0,0),(19,3,NULL,11,NULL,1,32,1,'all',0,0),(20,3,NULL,12,NULL,2,16388,1,'all',0,0),(21,3,NULL,13,NULL,3,1,1,'all',0,0),(22,3,10,5,NULL,0,128,1,'all',0,0),(23,4,NULL,14,NULL,0,64,1,'all',0,0),(24,4,NULL,15,NULL,1,32,1,'all',0,0),(25,4,NULL,16,NULL,2,16388,1,'all',0,0),(26,4,NULL,17,NULL,3,1,1,'all',0,0),(27,4,11,5,NULL,0,128,1,'all',0,0),(28,4,12,5,NULL,0,128,1,'all',0,0),(29,4,13,5,NULL,0,128,1,'all',0,0),(30,4,14,5,NULL,0,128,1,'all',0,0),(31,4,15,5,NULL,0,128,1,'all',0,0),(32,4,16,5,NULL,0,128,1,'all',0,0),(33,4,17,5,NULL,0,128,1,'all',0,0),(34,1,18,5,NULL,0,128,1,'all',0,0),(35,1,19,5,NULL,0,128,1,'all',0,0),(36,1,20,5,NULL,0,128,1,'all',0,0),(37,5,NULL,18,NULL,0,64,1,'all',0,0),(38,5,NULL,19,NULL,1,32,1,'all',0,0),(39,5,NULL,20,NULL,2,16388,1,'all',0,0),(40,5,NULL,21,NULL,3,1,1,'all',0,0),(41,5,21,5,NULL,0,128,1,'all',0,0),(42,5,22,5,NULL,0,128,1,'all',0,0),(43,5,23,5,NULL,0,128,1,'all',0,0),(44,5,24,5,NULL,0,128,1,'all',0,0),(45,6,NULL,22,NULL,0,64,1,'all',0,0),(46,6,NULL,23,NULL,1,32,1,'all',0,0),(47,6,NULL,24,NULL,2,16388,1,'all',0,0),(48,6,NULL,25,NULL,3,1,1,'all',0,0),(49,6,25,5,NULL,0,128,1,'all',0,0),(51,6,27,5,NULL,0,128,1,'all',0,0),(52,6,28,5,NULL,0,128,1,'all',0,0),(53,4,29,26,NULL,0,128,1,'all',0,0);
/*!40000 ALTER TABLE `acl_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_object_identities`
--

DROP TABLE IF EXISTS `acl_object_identities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_object_identities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_object_identity_id` int(10) unsigned DEFAULT NULL,
  `class_id` int(10) unsigned NOT NULL,
  `object_identifier` varchar(100) NOT NULL,
  `entries_inheriting` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9407E5494B12AD6EA000B10` (`object_identifier`,`class_id`),
  KEY `IDX_9407E54977FA751A` (`parent_object_identity_id`),
  CONSTRAINT `FK_9407E54977FA751A` FOREIGN KEY (`parent_object_identity_id`) REFERENCES `acl_object_identities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_object_identities`
--

LOCK TABLES `acl_object_identities` WRITE;
/*!40000 ALTER TABLE `acl_object_identities` DISABLE KEYS */;
INSERT INTO `acl_object_identities` VALUES (1,NULL,1,'1',1),(2,NULL,2,'1',1),(3,NULL,2,'2',1),(4,NULL,2,'3',1),(5,NULL,2,'4',1),(6,NULL,2,'5',1),(7,NULL,2,'6',1),(8,NULL,2,'7',1),(10,NULL,3,'2',1),(11,NULL,4,'2',1),(12,NULL,4,'3',1),(13,NULL,4,'4',1),(14,NULL,4,'5',1),(15,NULL,4,'6',1),(16,NULL,4,'7',1),(17,NULL,4,'8',1),(18,NULL,1,'2',1),(19,NULL,1,'3',1),(20,NULL,1,'4',1),(21,NULL,5,'1',1),(22,NULL,5,'2',1),(23,NULL,5,'3',1),(24,NULL,5,'4',1),(25,NULL,6,'1',1),(27,NULL,6,'3',1),(28,NULL,6,'4',1),(29,NULL,4,'9',1);
/*!40000 ALTER TABLE `acl_object_identities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_object_identity_ancestors`
--

DROP TABLE IF EXISTS `acl_object_identity_ancestors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_object_identity_ancestors` (
  `object_identity_id` int(10) unsigned NOT NULL,
  `ancestor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`object_identity_id`,`ancestor_id`),
  KEY `IDX_825DE2993D9AB4A6` (`object_identity_id`),
  KEY `IDX_825DE299C671CEA1` (`ancestor_id`),
  CONSTRAINT `FK_825DE2993D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_825DE299C671CEA1` FOREIGN KEY (`ancestor_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_object_identity_ancestors`
--

LOCK TABLES `acl_object_identity_ancestors` WRITE;
/*!40000 ALTER TABLE `acl_object_identity_ancestors` DISABLE KEYS */;
INSERT INTO `acl_object_identity_ancestors` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(10,10),(11,11),(12,12),(13,13),(14,14),(15,15),(16,16),(17,17),(18,18),(19,19),(20,20),(21,21),(22,22),(23,23),(24,24),(25,25),(27,27),(28,28),(29,29);
/*!40000 ALTER TABLE `acl_object_identity_ancestors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_security_identities`
--

DROP TABLE IF EXISTS `acl_security_identities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_security_identities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identifier` varchar(200) NOT NULL,
  `username` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8835EE78772E836AF85E0677` (`identifier`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_security_identities`
--

LOCK TABLES `acl_security_identities` WRITE;
/*!40000 ALTER TABLE `acl_security_identities` DISABLE KEYS */;
INSERT INTO `acl_security_identities` VALUES (26,'App\\Entity\\Admin-admin',1),(5,'App\\Entity\\Admin-ryan',1),(1,'ROLE_ADMIN_BATEAU_ADMIN',0),(2,'ROLE_ADMIN_BATEAU_EDITOR',0),(4,'ROLE_ADMIN_BATEAU_GUEST',0),(3,'ROLE_ADMIN_BATEAU_STAFF',0),(22,'ROLE_ADMIN_CATEGORIE_ADMIN',0),(23,'ROLE_ADMIN_CATEGORIE_EDITOR',0),(25,'ROLE_ADMIN_CATEGORIE_GUEST',0),(24,'ROLE_ADMIN_CATEGORIE_STAFF',0),(14,'ROLE_ADMIN_CLIENT_ADMIN',0),(15,'ROLE_ADMIN_CLIENT_EDITOR',0),(17,'ROLE_ADMIN_CLIENT_GUEST',0),(16,'ROLE_ADMIN_CLIENT_STAFF',0),(6,'ROLE_ADMIN_LIAISON_ADMIN',0),(7,'ROLE_ADMIN_LIAISON_EDITOR',0),(9,'ROLE_ADMIN_LIAISON_GUEST',0),(8,'ROLE_ADMIN_LIAISON_STAFF',0),(18,'ROLE_ADMIN_TRAVERSEE_ADMIN',0),(19,'ROLE_ADMIN_TRAVERSEE_EDITOR',0),(21,'ROLE_ADMIN_TRAVERSEE_GUEST',0),(20,'ROLE_ADMIN_TRAVERSEE_STAFF',0),(10,'ROLE_SONATA_USER_ADMIN_USER_ADMIN',0),(11,'ROLE_SONATA_USER_ADMIN_USER_EDITOR',0),(13,'ROLE_SONATA_USER_ADMIN_USER_GUEST',0),(12,'ROLE_SONATA_USER_ADMIN_USER_STAFF',0);
/*!40000 ALTER TABLE `acl_security_identities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) NOT NULL,
  `username_canonical` varchar(180) NOT NULL,
  `email` varchar(180) NOT NULL,
  `email_canonical` varchar(180) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:array)',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_880E0D7692FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_880E0D76A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_880E0D76C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'ryan','ryan','ryan.marsy@laposte.net','ryan.marsy@laposte.net',1,NULL,'$2y$13$jz7aQoY4blsgEyeQRfoEZODSqVUG4/oSfd/NQ4hKcaXgwbUN8jlqW','2023-05-02 17:31:36',NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}','2023-05-02 02:44:05','2023-05-02 17:31:36'),(2,'bruno','bruno','bruno@bruno.fr','bruno@bruno.fr',1,NULL,'$2y$13$pRksFmqiRIRjqm9yIzY93.IHbjbQOKIeAA7x5CwBfY6eyrbl027Ye',NULL,NULL,NULL,'a:0:{}','2023-05-02 13:30:02','2023-05-02 13:30:02'),(3,'admin','admin','admin@admin.fr','admin@admin.fr',1,NULL,'$2y$13$OpG/PblEYK0yMTnkvQ60VOvbX3vhkzxQwygpzpkrrjYqLOAtlvDTa','2023-05-02 22:38:48',NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}','2023-05-02 22:36:50','2023-05-02 22:38:48');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bateau`
--

DROP TABLE IF EXISTS `bateau`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bateau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_bateau` varchar(50) NOT NULL,
  `longueur` double DEFAULT NULL,
  `largeur` double DEFAULT NULL,
  `vitesse` int(11) DEFAULT NULL,
  `capaciteMaximum` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle_bateau` (`libelle_bateau`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bateau`
--

LOCK TABLES `bateau` WRITE;
/*!40000 ALTER TABLE `bateau` DISABLE KEYS */;
INSERT INTO `bateau` VALUES (1,'Titanic',50,20,20,100),(2,'Kor\'Ant',38,20,26,100),(3,'Al-xi',28,15,20,50),(4,'Luce isle',90,30,15,200);
/*!40000 ALTER TABLE `bateau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle_categorie` (`libelle_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Passager(s)'),(3,'Véhicule inf 2m'),(4,'Véhicule sup 2m');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `code_postal` varchar(5) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'ryan@ryan.fr','Marsy','Ryan','119 Bld Marcel Wacheux','Barlin','62620','$2y$13$nn6mn.j7zwUPjrMlWC9nLOf1kbpT4wTqNAdEXHNdOogO5o86k.9D.'),(2,'bruno@bruno.fr','Lemaire','Bruno','11 Rue des Capucines','Barlin','62620','$2y$13$nn6mn.j7zwUPjrMlWC9nLOf1kbpT4wTqNAdEXHNdOogO5o86k.9D.'),(3,'your.email+faker89711@gmail.com','Harmon Bogan','Mac McKenzie','345 Anahi Turnpike','Lew Flatley','62620','$2y$13$nn6mn.j7zwUPjrMlWC9nLOf1kbpT4wTqNAdEXHNdOogO5o86k.9D.'),(4,'tyluhog@mailinator.com','Dolorem','occaecat','Repellendus Rem incidunt nobis cillum ut optio','Arras','62000','$2y$13$nn6mn.j7zwUPjrMlWC9nLOf1kbpT4wTqNAdEXHNdOogO5o86k.9D.'),(5,'tusafixig@mailinator.com','Maxime','Pariatu','Quibusdam est dolore totam excepturi','Barlin','52000','$2y$13$nn6mn.j7zwUPjrMlWC9nLOf1kbpT4wTqNAdEXHNdOogO5o86k.9D.'),(6,'dojoseja@mailinator.com','Nesciunt','Aut','Incidunt sed optio voluptas omnis id corrupti','Lille','59000','$2y$13$nn6mn.j7zwUPjrMlWC9nLOf1kbpT4wTqNAdEXHNdOogO5o86k.9D.'),(7,'kerixonit@mailinator.com','Mollitia sit dolor saepe sit sunt tempore','Vel laborum Sed occaecat modi mollit adipisci qui','Ratione veniam quisquam quas nesciunt odit exerc','Arras','62000','$2y$13$nn6mn.j7zwUPjrMlWC9nLOf1kbpT4wTqNAdEXHNdOogO5o86k.9D.'),(8,'podoje@mailinator.com','Asperiores','Culpa','Et quis dolorum iste id hic recusandae Eu cum sin','Lille','59000','$2y$13$nn6mn.j7zwUPjrMlWC9nLOf1kbpT4wTqNAdEXHNdOogO5o86k.9D.'),(9,'admin@admin.fr','Admin','Admin','Lycee Gaston Berger','Lille','59000','$2y$13$1XOkpWXBryCIM4tWFm14lOj8vTTW0C0PE6OI8TIhydJY46SjIs6Au');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disponibilite`
--

DROP TABLE IF EXISTS `disponibilite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disponibilite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placesDispo` int(11) NOT NULL,
  `id_traversee` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disponibilite`
--

LOCK TABLES `disponibilite` WRITE;
/*!40000 ALTER TABLE `disponibilite` DISABLE KEYS */;
/*!40000 ALTER TABLE `disponibilite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20230502020238','2023-05-02 02:02:44',1995),('DoctrineMigrations\\Version20230502023533','2023-05-02 02:35:37',117),('DoctrineMigrations\\Version20230502185723','2023-05-02 18:57:28',260),('DoctrineMigrations\\Version20230502191008','2023-05-02 19:10:12',272);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_equipement` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle_equipement` (`libelle_equipement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipement`
--

LOCK TABLES `equipement` WRITE;
/*!40000 ALTER TABLE `equipement` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liaison`
--

DROP TABLE IF EXISTS `liaison`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liaison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `distance` double NOT NULL,
  `port_depart` varchar(50) NOT NULL,
  `port_arrivee` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liaison`
--

LOCK TABLES `liaison` WRITE;
/*!40000 ALTER TABLE `liaison` DISABLE KEYS */;
INSERT INTO `liaison` VALUES (1,20,'Quiberon','Le Palais'),(2,9,'Le Palais','Quiberon'),(3,8,'Quiberon','Sauzon'),(4,9,'Sauzon','Quiberon'),(5,8,'Vannes','Le Palais'),(6,20,'Le Palais','Vannes'),(7,8,'Quiberon','Port St Gildas');
/*!40000 ALTER TABLE `liaison` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prix`
--

DROP TABLE IF EXISTS `prix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `traversee_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F7EFEA5EED2BB15B` (`traversee_id`),
  KEY `IDX_F7EFEA5EBCF5E72D` (`categorie_id`),
  CONSTRAINT `FK_F7EFEA5EBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  CONSTRAINT `FK_F7EFEA5EED2BB15B` FOREIGN KEY (`traversee_id`) REFERENCES `traversee` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prix`
--

LOCK TABLES `prix` WRITE;
/*!40000 ALTER TABLE `prix` DISABLE KEYS */;
/*!40000 ALTER TABLE `prix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `traversee_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42C8495519EB6921` (`client_id`),
  KEY `IDX_42C84955ED2BB15B` (`traversee_id`),
  CONSTRAINT `FK_42C8495519EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  CONSTRAINT `FK_42C84955ED2BB15B` FOREIGN KEY (`traversee_id`) REFERENCES `traversee` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (1,1,1),(2,1,1);
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_categorie`
--

DROP TABLE IF EXISTS `reservation_categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_533AB7ABB83297E7` (`reservation_id`),
  KEY `IDX_533AB7ABBCF5E72D` (`categorie_id`),
  CONSTRAINT `FK_533AB7ABB83297E7` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`),
  CONSTRAINT `FK_533AB7ABBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_categorie`
--

LOCK TABLES `reservation_categorie` WRITE;
/*!40000 ALTER TABLE `reservation_categorie` DISABLE KEYS */;
INSERT INTO `reservation_categorie` VALUES (1,1,1,3),(2,1,3,0),(3,1,4,0),(4,2,1,3),(5,2,3,0),(6,2,4,0);
/*!40000 ALTER TABLE `reservation_categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traversee`
--

DROP TABLE IF EXISTS `traversee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `traversee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `liaison_id` int(11) NOT NULL,
  `date_depart` datetime NOT NULL,
  `heure_depart` time NOT NULL,
  `bateau_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B688F501ED31185` (`liaison_id`),
  KEY `IDX_B688F501A9706509` (`bateau_id`),
  CONSTRAINT `FK_B688F501A9706509` FOREIGN KEY (`bateau_id`) REFERENCES `bateau` (`id`),
  CONSTRAINT `FK_B688F501ED31185` FOREIGN KEY (`liaison_id`) REFERENCES `liaison` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traversee`
--

LOCK TABLES `traversee` WRITE;
/*!40000 ALTER TABLE `traversee` DISABLE KEYS */;
INSERT INTO `traversee` VALUES (1,1,'2023-05-02 00:00:00','16:20:00',1),(2,2,'2023-05-02 00:00:00','20:10:00',1),(3,6,'2023-05-03 00:00:00','03:05:00',2),(4,5,'2023-05-05 00:00:00','03:05:00',4);
/*!40000 ALTER TABLE `traversee` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-03  1:09:03
