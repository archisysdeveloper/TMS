-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: 34.93.202.237    Database: lockesleys_pms
-- ------------------------------------------------------
-- Server version	8.0.19-0ubuntu0.19.10.3

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
-- Table structure for table `propel_migration`
--

DROP TABLE IF EXISTS `propel_migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propel_migration` (
  `version` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propel_migration`
--

LOCK TABLES `propel_migration` WRITE;
/*!40000 ALTER TABLE `propel_migration` DISABLE KEYS */;
/*!40000 ALTER TABLE `propel_migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_account_level`
--

DROP TABLE IF EXISTS `ws_account_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_account_level` (
  `level_id` int NOT NULL AUTO_INCREMENT,
  `level_group_id` int NOT NULL,
  `account_id` int NOT NULL,
  PRIMARY KEY (`level_id`),
  KEY `level_group_id` (`level_group_id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `ws_account_level_ibfk_1` FOREIGN KEY (`level_group_id`) REFERENCES `ws_account_level_group` (`level_group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ws_account_level_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `ws_accounts` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_account_level`
--

LOCK TABLES `ws_account_level` WRITE;
/*!40000 ALTER TABLE `ws_account_level` DISABLE KEYS */;
INSERT INTO `ws_account_level` VALUES (1,1,1),(72,4,72);
/*!40000 ALTER TABLE `ws_account_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_account_level_group`
--

DROP TABLE IF EXISTS `ws_account_level_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_account_level_group` (
  `level_group_id` int NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) DEFAULT NULL,
  `level_description` text,
  `level_priority` int NOT NULL DEFAULT '1' COMMENT 'lower is more higher priority',
  PRIMARY KEY (`level_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_account_level_group`
--

LOCK TABLES `ws_account_level_group` WRITE;
/*!40000 ALTER TABLE `ws_account_level_group` DISABLE KEYS */;
INSERT INTO `ws_account_level_group` VALUES (1,'Super administrator','best for site owner.',1),(2,'Administrator',NULL,2),(3,'Member','Just member.',999),(4,'Team','Archisys Team',3),(5,'Sales','Sales',4),(6,'FinStock','FinStock',5),(7,'HR','HR',6),(8,'Client','Client Access',7),(9,'Approver','Approver',3),(10,'Director','CG',8);
/*!40000 ALTER TABLE `ws_account_level_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_account_level_permission`
--

DROP TABLE IF EXISTS `ws_account_level_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_account_level_permission` (
  `permission_id` int NOT NULL AUTO_INCREMENT,
  `permission_page` varchar(255) NOT NULL,
  `params` text,
  PRIMARY KEY (`permission_id`),
  UNIQUE KEY `permission_page` (`permission_page`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_account_level_permission`
--

LOCK TABLES `ws_account_level_permission` WRITE;
/*!40000 ALTER TABLE `ws_account_level_permission` DISABLE KEYS */;
INSERT INTO `ws_account_level_permission` VALUES (1,'admin_global_config','a:8:{i:1;a:1:{s:20:\"admin_website_config\";s:1:\"1\";}i:2;a:1:{s:20:\"admin_website_config\";s:1:\"1\";}i:4;a:1:{s:20:\"admin_website_config\";s:1:\"0\";}i:5;a:1:{s:20:\"admin_website_config\";s:1:\"0\";}i:6;a:1:{s:20:\"admin_website_config\";s:1:\"0\";}i:7;a:1:{s:20:\"admin_website_config\";s:1:\"0\";}i:8;a:1:{s:20:\"admin_website_config\";s:1:\"0\";}i:3;a:1:{s:20:\"admin_website_config\";s:1:\"0\";}}'),(2,'account_account','a:8:{i:1;a:5:{s:14:\"account_manage\";s:1:\"0\";s:11:\"account_add\";s:1:\"0\";s:12:\"account_edit\";s:1:\"0\";s:14:\"account_delete\";s:1:\"0\";s:19:\"account_view_logins\";s:1:\"0\";}i:2;a:5:{s:14:\"account_manage\";s:1:\"0\";s:11:\"account_add\";s:1:\"0\";s:12:\"account_edit\";s:1:\"0\";s:14:\"account_delete\";s:1:\"0\";s:19:\"account_view_logins\";s:1:\"0\";}i:4;a:5:{s:14:\"account_manage\";s:1:\"0\";s:11:\"account_add\";s:1:\"0\";s:12:\"account_edit\";s:1:\"0\";s:14:\"account_delete\";s:1:\"0\";s:19:\"account_view_logins\";s:1:\"0\";}i:5;a:5:{s:14:\"account_manage\";s:1:\"0\";s:11:\"account_add\";s:1:\"0\";s:12:\"account_edit\";s:1:\"0\";s:14:\"account_delete\";s:1:\"0\";s:19:\"account_view_logins\";s:1:\"0\";}i:6;a:5:{s:14:\"account_manage\";s:1:\"0\";s:11:\"account_add\";s:1:\"0\";s:12:\"account_edit\";s:1:\"0\";s:14:\"account_delete\";s:1:\"0\";s:19:\"account_view_logins\";s:1:\"0\";}i:7;a:5:{s:14:\"account_manage\";s:1:\"0\";s:11:\"account_add\";s:1:\"0\";s:12:\"account_edit\";s:1:\"0\";s:14:\"account_delete\";s:1:\"0\";s:19:\"account_view_logins\";s:1:\"0\";}i:8;a:5:{s:14:\"account_manage\";s:1:\"0\";s:11:\"account_add\";s:1:\"0\";s:12:\"account_edit\";s:1:\"0\";s:14:\"account_delete\";s:1:\"0\";s:19:\"account_view_logins\";s:1:\"0\";}i:3;a:5:{s:14:\"account_manage\";s:1:\"0\";s:11:\"account_add\";s:1:\"0\";s:12:\"account_edit\";s:1:\"0\";s:14:\"account_delete\";s:1:\"0\";s:19:\"account_view_logins\";s:1:\"0\";}}'),(3,'account_admin_login','a:9:{i:1;a:1:{s:19:\"account_admin_login\";s:1:\"1\";}i:2;a:1:{s:19:\"account_admin_login\";s:1:\"1\";}i:3;a:1:{s:19:\"account_admin_login\";s:1:\"1\";}i:4;a:1:{s:19:\"account_admin_login\";s:1:\"1\";}i:5;a:1:{s:19:\"account_admin_login\";s:1:\"1\";}i:6;a:1:{s:19:\"account_admin_login\";s:1:\"1\";}i:7;a:1:{s:19:\"account_admin_login\";s:1:\"1\";}i:8;a:1:{s:19:\"account_admin_login\";s:1:\"1\";}i:9;a:1:{s:19:\"account_admin_login\";s:1:\"1\";}}'),(4,'account_permissions','a:8:{i:1;a:1:{s:25:\"account_manage_permission\";s:1:\"0\";}i:2;a:1:{s:25:\"account_manage_permission\";s:1:\"0\";}i:4;a:1:{s:25:\"account_manage_permission\";s:1:\"0\";}i:5;a:1:{s:25:\"account_manage_permission\";s:1:\"0\";}i:6;a:1:{s:25:\"account_manage_permission\";s:1:\"0\";}i:7;a:1:{s:25:\"account_manage_permission\";s:1:\"0\";}i:8;a:1:{s:25:\"account_manage_permission\";s:1:\"0\";}i:3;a:1:{s:25:\"account_manage_permission\";s:1:\"0\";}}'),(5,'account_level','a:10:{i:1;a:4:{s:20:\"account_manage_level\";s:1:\"0\";s:17:\"account_add_level\";s:1:\"0\";s:18:\"account_edit_level\";s:1:\"0\";s:20:\"account_delete_level\";s:1:\"0\";}i:2;a:4:{s:20:\"account_manage_level\";s:1:\"0\";s:17:\"account_add_level\";s:1:\"0\";s:18:\"account_edit_level\";s:1:\"0\";s:20:\"account_delete_level\";s:1:\"0\";}i:4;a:4:{s:20:\"account_manage_level\";s:1:\"0\";s:17:\"account_add_level\";s:1:\"0\";s:18:\"account_edit_level\";s:1:\"0\";s:20:\"account_delete_level\";s:1:\"0\";}i:9;a:4:{s:20:\"account_manage_level\";s:1:\"0\";s:17:\"account_add_level\";s:1:\"0\";s:18:\"account_edit_level\";s:1:\"0\";s:20:\"account_delete_level\";s:1:\"0\";}i:5;a:4:{s:20:\"account_manage_level\";s:1:\"0\";s:17:\"account_add_level\";s:1:\"0\";s:18:\"account_edit_level\";s:1:\"0\";s:20:\"account_delete_level\";s:1:\"0\";}i:6;a:4:{s:20:\"account_manage_level\";s:1:\"0\";s:17:\"account_add_level\";s:1:\"0\";s:18:\"account_edit_level\";s:1:\"0\";s:20:\"account_delete_level\";s:1:\"0\";}i:7;a:4:{s:20:\"account_manage_level\";s:1:\"0\";s:17:\"account_add_level\";s:1:\"0\";s:18:\"account_edit_level\";s:1:\"0\";s:20:\"account_delete_level\";s:1:\"0\";}i:8;a:4:{s:20:\"account_manage_level\";s:1:\"0\";s:17:\"account_add_level\";s:1:\"0\";s:18:\"account_edit_level\";s:1:\"0\";s:20:\"account_delete_level\";s:1:\"0\";}i:10;a:4:{s:20:\"account_manage_level\";s:1:\"0\";s:17:\"account_add_level\";s:1:\"0\";s:18:\"account_edit_level\";s:1:\"0\";s:20:\"account_delete_level\";s:1:\"0\";}i:3;a:4:{s:20:\"account_manage_level\";s:1:\"0\";s:17:\"account_add_level\";s:1:\"0\";s:18:\"account_edit_level\";s:1:\"0\";s:20:\"account_delete_level\";s:1:\"0\";}}'),(6,'hr','a:9:{i:1;a:3:{s:5:\"admin\";s:1:\"1\";s:5:\"daily\";s:1:\"1\";s:8:\"approver\";s:1:\"1\";}i:2;a:3:{s:5:\"admin\";s:1:\"1\";s:5:\"daily\";s:1:\"1\";s:8:\"approver\";s:1:\"1\";}i:3;a:3:{s:5:\"admin\";s:1:\"0\";s:5:\"daily\";s:1:\"1\";s:8:\"approver\";s:1:\"0\";}i:4;a:3:{s:5:\"admin\";s:1:\"0\";s:5:\"daily\";s:1:\"1\";s:8:\"approver\";s:1:\"0\";}i:5;a:3:{s:5:\"admin\";s:1:\"0\";s:5:\"daily\";s:1:\"1\";s:8:\"approver\";s:1:\"0\";}i:6;a:3:{s:5:\"admin\";s:1:\"0\";s:5:\"daily\";s:1:\"1\";s:8:\"approver\";s:1:\"0\";}i:7;a:3:{s:5:\"admin\";s:1:\"1\";s:5:\"daily\";s:1:\"1\";s:8:\"approver\";s:1:\"1\";}i:8;a:3:{s:5:\"admin\";s:1:\"0\";s:5:\"daily\";s:1:\"0\";s:8:\"approver\";s:1:\"0\";}i:9;a:3:{s:5:\"admin\";s:1:\"0\";s:5:\"daily\";s:1:\"0\";s:8:\"approver\";s:1:\"1\";}}'),(7,'finance','a:8:{i:1;a:2:{s:6:\"enable\";s:1:\"1\";s:7:\"billing\";s:1:\"1\";}i:2;a:2:{s:6:\"enable\";s:1:\"1\";s:7:\"billing\";s:1:\"1\";}i:4;a:2:{s:6:\"enable\";s:1:\"0\";s:7:\"billing\";s:1:\"0\";}i:5;a:2:{s:6:\"enable\";s:1:\"1\";s:7:\"billing\";s:1:\"1\";}i:6;a:2:{s:6:\"enable\";s:1:\"0\";s:7:\"billing\";s:1:\"0\";}i:7;a:2:{s:6:\"enable\";s:1:\"1\";s:7:\"billing\";s:1:\"1\";}i:8;a:2:{s:6:\"enable\";s:1:\"0\";s:7:\"billing\";s:1:\"0\";}i:3;a:2:{s:6:\"enable\";s:1:\"0\";s:7:\"billing\";s:1:\"0\";}}'),(8,'projects','a:9:{i:1;a:2:{s:6:\"enable\";s:1:\"1\";s:6:\"client\";s:1:\"0\";}i:2;a:2:{s:6:\"enable\";s:1:\"1\";s:6:\"client\";s:1:\"0\";}i:3;a:2:{s:6:\"enable\";s:1:\"1\";s:6:\"client\";s:1:\"0\";}i:4;a:2:{s:6:\"enable\";s:1:\"1\";s:6:\"client\";s:1:\"0\";}i:5;a:2:{s:6:\"enable\";s:1:\"1\";s:6:\"client\";s:1:\"0\";}i:6;a:2:{s:6:\"enable\";s:1:\"0\";s:6:\"client\";s:1:\"0\";}i:7;a:2:{s:6:\"enable\";s:1:\"0\";s:6:\"client\";s:1:\"0\";}i:8;a:2:{s:6:\"enable\";s:1:\"0\";s:6:\"client\";s:1:\"1\";}i:9;a:2:{s:6:\"enable\";s:1:\"1\";s:6:\"client\";s:1:\"0\";}}');
/*!40000 ALTER TABLE `ws_account_level_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_account_logins`
--

DROP TABLE IF EXISTS `ws_account_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_account_logins` (
  `account_login_id` int NOT NULL AUTO_INCREMENT,
  `account_id` int DEFAULT NULL,
  `login_ua` varchar(255) DEFAULT NULL,
  `login_os` varchar(255) DEFAULT NULL,
  `login_browser` varchar(255) DEFAULT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `login_attempt` int NOT NULL DEFAULT '0' COMMENT '0=fail, 1=success',
  `login_attempt_text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`account_login_id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `ws_account_logins_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `ws_accounts` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_account_logins`
--

LOCK TABLES `ws_account_logins` WRITE;
/*!40000 ALTER TABLE `ws_account_logins` DISABLE KEYS */;
INSERT INTO `ws_account_logins` VALUES (1,1,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36','Windows','Chrome 79.0.3945.130','124.123.122.21','2020-01-18 10:52:05',1,'success'),(2,1,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36','Windows','Chrome 79.0.3945.117','124.123.122.21','2020-01-18 10:52:37',1,'success'),(3,1,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36','Windows','Chrome 79.0.3945.117','124.123.122.21','2020-01-21 06:14:24',1,'success'),(4,1,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36','Windows','Chrome 79.0.3945.117','124.123.122.21','2020-01-21 06:36:23',1,'success'),(5,1,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36','Windows','Chrome 79.0.3945.117','124.123.122.21','2020-01-21 06:38:13',1,'success'),(6,1,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36','Windows','Chrome 79.0.3945.117','124.123.122.21','2020-01-21 06:50:26',1,'success'),(7,1,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_2) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.4 Safari/605.1.15','Apple','Safari 13.0.4','51.52.193.245','2020-01-21 08:04:32',0,'wrong username or password'),(8,1,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_2) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.4 Safari/605.1.15','Apple','Safari 13.0.4','51.52.193.245','2020-01-21 08:04:51',1,'success'),(9,1,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_2) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.4 Safari/605.1.15','Apple','Safari 13.0.4','51.52.193.245','2020-01-21 08:06:52',1,'success'),(10,1,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_2) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.4 Safari/605.1.15','Apple','Safari 13.0.4','51.52.193.245','2020-01-23 03:50:36',1,'success');
/*!40000 ALTER TABLE `ws_account_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_accounts`
--

DROP TABLE IF EXISTS `ws_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_accounts` (
  `account_id` int NOT NULL AUTO_INCREMENT,
  `account_username` varchar(255) DEFAULT NULL,
  `account_email` varchar(255) DEFAULT NULL,
  `account_password` varchar(255) DEFAULT NULL,
  `account_fullname` varchar(255) DEFAULT NULL,
  `account_birthdate` date DEFAULT NULL,
  `account_avatar` varchar(255) DEFAULT NULL,
  `account_signature` text,
  `account_create` datetime DEFAULT NULL,
  `account_last_login` datetime DEFAULT NULL,
  `account_online_code` varchar(255) DEFAULT NULL COMMENT 'store session code for check dubplicate log in if enabled.',
  `account_status` int NOT NULL DEFAULT '0' COMMENT '0=disable, 1=enable',
  `account_status_text` varchar(255) DEFAULT NULL,
  `account_new_email` varchar(255) DEFAULT NULL,
  `account_new_password` varchar(255) DEFAULT NULL,
  `account_confirm_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_accounts`
--

LOCK TABLES `ws_accounts` WRITE;
/*!40000 ALTER TABLE `ws_accounts` DISABLE KEYS */;
INSERT INTO `ws_accounts` VALUES (1,'admin','chintan@archisys.in','5b1a80c6f8f064090c15e9f945728d207fcaa234',NULL,'1985-02-24',NULL,NULL,'2011-04-20 19:20:04','2020-01-23 15:50:36','03a4b79b29989f555083cbe24a0a6291',1,NULL,NULL,'NULL','NULL'),(72,'EngineerXYZ','test@lockesleys.in','9115a8f2704ad36fa08b8c7c42cae46006a6b2f3','EngineerXYZ',NULL,NULL,'','2020-01-21 06:41:59',NULL,NULL,1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ws_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_adlbreak`
--

DROP TABLE IF EXISTS `ws_adlbreak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_adlbreak` (
  `adl_id` int NOT NULL AUTO_INCREMENT,
  `inout_id` int DEFAULT NULL,
  `mins` int DEFAULT NULL,
  `reason` text,
  `account_id` int DEFAULT NULL,
  PRIMARY KEY (`adl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_adlbreak`
--

LOCK TABLES `ws_adlbreak` WRITE;
/*!40000 ALTER TABLE `ws_adlbreak` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_adlbreak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_check_list`
--

DROP TABLE IF EXISTS `ws_check_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_check_list` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `mid` int NOT NULL,
  `description` text NOT NULL,
  `priority` varchar(50) NOT NULL,
  `state` text NOT NULL,
  `cr_date` date NOT NULL,
  `cr_user` int NOT NULL,
  `ch_cls_user` int NOT NULL,
  `status` text NOT NULL,
  `cls_date` date DEFAULT NULL,
  `man_on` int DEFAULT NULL,
  `chk_clnt` int DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_check_list`
--

LOCK TABLES `ws_check_list` WRITE;
/*!40000 ALTER TABLE `ws_check_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_check_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_clients`
--

DROP TABLE IF EXISTS `ws_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_clients` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `client_name` varchar(250) DEFAULT NULL,
  `client_company` varchar(250) DEFAULT NULL,
  `client_address` varchar(500) DEFAULT NULL,
  `client_country` varchar(250) DEFAULT NULL,
  `client_email` varchar(250) DEFAULT NULL,
  `client_skype` varchar(250) DEFAULT NULL,
  `client_im` varchar(250) DEFAULT NULL,
  `client_number` varchar(250) DEFAULT NULL,
  `client_ref` varchar(250) DEFAULT NULL,
  `client_notes` text,
  `linked_account` int NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_clients`
--

LOCK TABLES `ws_clients` WRITE;
/*!40000 ALTER TABLE `ws_clients` DISABLE KEYS */;
INSERT INTO `ws_clients` VALUES (2,'TestClient','TestClientCompany',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `ws_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_config`
--

DROP TABLE IF EXISTS `ws_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_config` (
  `config_name` varchar(255) DEFAULT NULL,
  `config_value` varchar(255) DEFAULT NULL,
  `config_core` int DEFAULT '0' COMMENT '0=no, 1=yes. if config core then please do not delete from db.',
  `config_description` text,
  KEY `config_name` (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_config`
--

LOCK TABLES `ws_config` WRITE;
/*!40000 ALTER TABLE `ws_config` DISABLE KEYS */;
INSERT INTO `ws_config` VALUES ('site_name','apes',1,'website name'),('page_title_separator',' | ',1,'page title separator. eg. site name | page'),('duplicate_login','on',1,'allow log in more than 1 place, session? set to on/off to allow/disallow.'),('allow_avatar','1',1,'set to 1 if use avatar or set to 0 if not use it.'),('avatar_size','200',1,'set file size in Kilobyte.'),('avatar_allowed_types','gif|jpg|png',1,'avatar allowe file types (see reference from codeigniter)\r\neg. gif|jpg|png'),('allowed_ip','121.246.86.37',0,NULL);
/*!40000 ALTER TABLE `ws_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_currency`
--

DROP TABLE IF EXISTS `ws_currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_currency` (
  `curr_id` int NOT NULL AUTO_INCREMENT,
  `curr_name` varchar(250) DEFAULT NULL,
  `curr_symbol` varchar(10) DEFAULT NULL,
  `curr_rate` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`curr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_currency`
--

LOCK TABLES `ws_currency` WRITE;
/*!40000 ALTER TABLE `ws_currency` DISABLE KEYS */;
INSERT INTO `ws_currency` VALUES (1,'Indian Rupees','INR',1.00),(2,'Dollars','$',50.00);
/*!40000 ALTER TABLE `ws_currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_inout`
--

DROP TABLE IF EXISTS `ws_inout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_inout` (
  `inout_id` int NOT NULL AUTO_INCREMENT,
  `account_id` int DEFAULT NULL,
  `inout_date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `in_ip` varchar(150) DEFAULT NULL,
  `out_ip` varchar(150) DEFAULT NULL,
  `internal_note` text,
  `total_hr` int DEFAULT NULL,
  `pay` decimal(18,0) NOT NULL DEFAULT '0',
  `approve_id` int DEFAULT NULL,
  `approve_date` date DEFAULT NULL,
  PRIMARY KEY (`inout_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_inout`
--

LOCK TABLES `ws_inout` WRITE;
/*!40000 ALTER TABLE `ws_inout` DISABLE KEYS */;
INSERT INTO `ws_inout` VALUES (1,1,'2020-01-23','21:22:39',NULL,'51.52.193.245',NULL,NULL,NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `ws_inout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_invoices`
--

DROP TABLE IF EXISTS `ws_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_invoices` (
  `inv_id` int NOT NULL AUTO_INCREMENT,
  `inv_client` int DEFAULT NULL,
  `inv_subject` varchar(250) DEFAULT NULL,
  `inv_description` text,
  `inv_total` decimal(18,2) DEFAULT NULL,
  `inv_date` date DEFAULT NULL,
  `inv_last_reminder` date DEFAULT NULL,
  `inv_project` int DEFAULT NULL,
  `inv_status` int DEFAULT '1',
  `inv_type` int DEFAULT NULL,
  `inv_currency` int DEFAULT NULL,
  `receipt_amount` decimal(18,0) DEFAULT '0',
  PRIMARY KEY (`inv_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_invoices`
--

LOCK TABLES `ws_invoices` WRITE;
/*!40000 ALTER TABLE `ws_invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_leave`
--

DROP TABLE IF EXISTS `ws_leave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_leave` (
  `leave_id` int NOT NULL AUTO_INCREMENT,
  `account_id` int DEFAULT NULL,
  `leave_type` int DEFAULT NULL,
  `leave_reason` text,
  `leave_status` int DEFAULT NULL,
  `leave_date` date DEFAULT NULL,
  `leave_reqdate` datetime DEFAULT NULL,
  `leave_duration` int DEFAULT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_leave`
--

LOCK TABLES `ws_leave` WRITE;
/*!40000 ALTER TABLE `ws_leave` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_leave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_milestones`
--

DROP TABLE IF EXISTS `ws_milestones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_milestones` (
  `milestone_name` varchar(250) DEFAULT NULL,
  `milestone_project` int DEFAULT NULL,
  `milestone_type` int DEFAULT NULL,
  `milestone_desc` text,
  `milestone_rate` decimal(18,2) DEFAULT NULL,
  `milestone_status` int DEFAULT NULL,
  `milestone_days` int DEFAULT NULL,
  `milestone_stdate` date NOT NULL,
  `milestone_enddate` date DEFAULT NULL,
  `milestone_clsdate` date DEFAULT NULL,
  `milestone_jira_managed` tinyint NOT NULL DEFAULT '1',
  `mid` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_milestones`
--

LOCK TABLES `ws_milestones` WRITE;
/*!40000 ALTER TABLE `ws_milestones` DISABLE KEYS */;
INSERT INTO `ws_milestones` VALUES ('Meetings',1,6,NULL,NULL,3,NULL,'2020-01-21',NULL,NULL,0,1);
/*!40000 ALTER TABLE `ws_milestones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_milestones_team`
--

DROP TABLE IF EXISTS `ws_milestones_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_milestones_team` (
  `account_id` int DEFAULT NULL,
  `mid` int DEFAULT NULL,
  `priority` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_milestones_team`
--

LOCK TABLES `ws_milestones_team` WRITE;
/*!40000 ALTER TABLE `ws_milestones_team` DISABLE KEYS */;
INSERT INTO `ws_milestones_team` VALUES (1,1,0);
/*!40000 ALTER TABLE `ws_milestones_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_project_cat`
--

DROP TABLE IF EXISTS `ws_project_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_project_cat` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_project_cat`
--

LOCK TABLES `ws_project_cat` WRITE;
/*!40000 ALTER TABLE `ws_project_cat` DISABLE KEYS */;
INSERT INTO `ws_project_cat` VALUES (1,'Web App'),(2,'Game'),(3,'Mobile App');
/*!40000 ALTER TABLE `ws_project_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_projects`
--

DROP TABLE IF EXISTS `ws_projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_projects` (
  `project_id` int NOT NULL AUTO_INCREMENT,
  `project_name` varchar(250) DEFAULT NULL,
  `project_client` int DEFAULT NULL,
  `project_cat` int DEFAULT NULL,
  `project_desc` text,
  `project_cost` decimal(18,2) DEFAULT NULL,
  `project_advance` decimal(18,2) DEFAULT NULL,
  `project_sale` int DEFAULT NULL,
  `project_date` date DEFAULT NULL,
  `project_weeks` int DEFAULT NULL,
  `project_files` varchar(500) DEFAULT NULL,
  `project_status` int DEFAULT NULL,
  `project_manager` int DEFAULT NULL,
  `project_notes` text,
  `project_close_date` date DEFAULT NULL,
  `project_jira_key` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_projects`
--

LOCK TABLES `ws_projects` WRITE;
/*!40000 ALTER TABLE `ws_projects` DISABLE KEYS */;
INSERT INTO `ws_projects` VALUES (1,'TestProject',2,1,NULL,NULL,NULL,NULL,'2020-01-21',NULL,NULL,3,1,NULL,NULL,'TP100');
/*!40000 ALTER TABLE `ws_projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_proposal`
--

DROP TABLE IF EXISTS `ws_proposal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_proposal` (
  `pro_id` int NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(250) DEFAULT NULL,
  `pro_client` varchar(250) DEFAULT NULL,
  `pro_rate` decimal(18,2) DEFAULT NULL,
  `pro_desc` text,
  `pro_estimate` decimal(18,2) DEFAULT NULL,
  `pro_deadline` date DEFAULT NULL,
  `pro_fullCompnay` varchar(250) DEFAULT NULL,
  `pro_deadline_content` date DEFAULT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_proposal`
--

LOCK TABLES `ws_proposal` WRITE;
/*!40000 ALTER TABLE `ws_proposal` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_proposal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_receipt`
--

DROP TABLE IF EXISTS `ws_receipt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_receipt` (
  `rec_id` int NOT NULL AUTO_INCREMENT,
  `inv_id` int DEFAULT NULL,
  `rec_amount` decimal(18,2) DEFAULT NULL,
  `rec_desc` varchar(250) DEFAULT NULL,
  `rec_refno` varchar(250) DEFAULT NULL,
  `rec_date` date DEFAULT NULL,
  `rec_narration` varchar(250) DEFAULT NULL,
  `rec_reftxn` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`rec_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_receipt`
--

LOCK TABLES `ws_receipt` WRITE;
/*!40000 ALTER TABLE `ws_receipt` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_receipt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_staticdata`
--

DROP TABLE IF EXISTS `ws_staticdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_staticdata` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gid` int DEFAULT NULL,
  `val` varchar(250) DEFAULT NULL,
  `sid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_staticdata`
--

LOCK TABLES `ws_staticdata` WRITE;
/*!40000 ALTER TABLE `ws_staticdata` DISABLE KEYS */;
INSERT INTO `ws_staticdata` VALUES (1,1,'Medical',1),(2,1,'Personal',2),(3,2,'Open',NULL),(4,2,'Close',NULL),(5,3,'Fixed Price - POP',NULL),(6,3,'Hourly',NULL),(7,3,'Free Support',NULL),(8,3,'Paid Support',NULL),(9,4,'Advance',NULL),(10,4,'Bill / Invoice',NULL);
/*!40000 ALTER TABLE `ws_staticdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_team`
--

DROP TABLE IF EXISTS `ws_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_team` (
  `account_id` int NOT NULL,
  `team_hours` int DEFAULT NULL,
  `rate` decimal(18,2) DEFAULT NULL,
  `paid_leaves` int DEFAULT NULL,
  `unpaid_leaves` int DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `team_name` varchar(250) DEFAULT NULL,
  `default_break` int DEFAULT NULL,
  `day_weight` float DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `lockout_time` time DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `jira_username` varchar(50) DEFAULT NULL,
  `team_group` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_team`
--

LOCK TABLES `ws_team` WRITE;
/*!40000 ALTER TABLE `ws_team` DISABLE KEYS */;
INSERT INTO `ws_team` VALUES (1,180,200.00,NULL,NULL,'2020-01-01','EngineerABC',30,9,'10:00:00',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ws_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_timesheet`
--

DROP TABLE IF EXISTS `ws_timesheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_timesheet` (
  `tsid` int NOT NULL AUTO_INCREMENT,
  `inout_id` int DEFAULT NULL,
  `account_id` int DEFAULT NULL,
  `milestone_id` int DEFAULT NULL,
  `hrs` decimal(18,1) DEFAULT NULL,
  `note` text,
  `approxTime` varchar(150) DEFAULT NULL,
  `jira_worklog_id` int DEFAULT NULL,
  `jira_ticket_id` varchar(15) DEFAULT NULL,
  `jira_estimated` int NOT NULL DEFAULT '0',
  `jira_spent` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`tsid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_timesheet`
--

LOCK TABLES `ws_timesheet` WRITE;
/*!40000 ALTER TABLE `ws_timesheet` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_timesheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ws_trending`
--

DROP TABLE IF EXISTS `ws_trending`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ws_trending` (
  `trend_id` int NOT NULL AUTO_INCREMENT,
  `project_id` int DEFAULT NULL,
  `description` text,
  `keyword` varchar(250) DEFAULT NULL,
  `dt` date DEFAULT NULL,
  PRIMARY KEY (`trend_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ws_trending`
--

LOCK TABLES `ws_trending` WRITE;
/*!40000 ALTER TABLE `ws_trending` DISABLE KEYS */;
/*!40000 ALTER TABLE `ws_trending` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'lockesleys_pms'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-20 17:45:18
