CREATE DATABASE  IF NOT EXISTS `venue_database`; 
USE `venue_database`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: venue_database`
-- ------------------------------------------------------
-- Server version	8.0.30



--
-- Table structure for table `adminusers`
--

DROP TABLE IF EXISTS `adminusers`;

CREATE TABLE `adminusers` (
  `username` varchar(255) NOT NULL,
  `pword` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
Insert into adminusers values ("admin", "$2y$10$tBkwRQ3X37aQMR5.tXmk9eRCEAr3.487her5mt2S1k6Cd9ke1VooC");
--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `ID` int NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` varchar(65535),
	`post_link` varchar(255),
	`post_img` varchar(255),
	`post_subtitle` varchar(255),
	`feature_img` BOOL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `ID` int NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_content` varchar(65535),
	`event_link` varchar(255),
	`event_img` varchar(255),
	`event_subtitle` varchar(255),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Table structure for table `archived_events`
--

DROP TABLE IF EXISTS `archived_events`;

CREATE TABLE `events` (
  `ID` int NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_content` varchar(65535),
	`event_link` varchar(255),
	`event_img` varchar(255),
	`event_subtitle` varchar(255),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `ID` int NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_content` varchar(65535),
	`news_date` varchar(255),
	`news_img` varchar(255),
	`news_link` varchar(255),
	`news_link_text` varchar(255),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;

CREATE TABLE `news` (
  `ID` int NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_content` varchar(65535),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;

CREATE TABLE `news` (
  `ID` int NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_content` varchar(65535),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




