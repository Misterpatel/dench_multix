/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.6.20-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: crazyhoo_bizsetu_web
-- ------------------------------------------------------
-- Server version	10.6.20-MariaDB

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
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `about_heading` tinytext NOT NULL,
  `about_content` longtext NOT NULL,
  `mt_about` tinytext NOT NULL,
  `mk_about` text NOT NULL,
  `md_about` text NOT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abouts`
--

LOCK TABLES `abouts` WRITE;
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
INSERT INTO `abouts` VALUES (1,'About Us','<p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nline-height:115%\">At Bizsetu Technology we seek to transform the way in which\r\nbusinesses operate with the use of our high reputable SaaS solutions. During an\r\nera where efficiency and scalability define the level of success it is\r\nproviding cloud based software designed to streamline operations, maximize\r\nproductivity and to drive growth of revenue. Our secure, login based platform\r\nenables businesses to automate processes, optimize workflows and make data\r\ndriven decisions with ease. By combining cutting impact technology with user\r\nfriendly solutions Bizsetu Technology empowers the enterprises to maintain\r\ncompetitive advantage in the highly competitive market. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nline-height:115%\">Proudly \"built in India for the world,\" our\r\nsolutions are designed to meet the global markets and businesses needs while\r\nproviding the degree of flexibility to support unique industrial challenges\r\nthat may arise. Whether looking to improve customer engagement, operational\r\nefficiency, or to scale the size of the business we provide the necessary tools\r\nneeded to succeed globally. With real time accessibility, robust security and\r\ncontinuous innovation our technology ensures that any size business can unlock\r\nthe power of digital transformation. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nline-height:115%\">Our Vision <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nline-height:115%\">To achieve a thorough transformation of business management\r\nthrough intelligent, cloud-based solutions that enhance efficiency, foster\r\ninnovation and ensure long term business success. We want to be the trusted and\r\nreliable technology company that is available globally to help businesses scale\r\nsmoothly in the digital age.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nline-height:115%\">Our Mission <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nline-height:115%\">Our mission is to develop cost-effective, high quality SaaS\r\nsolutions which will help businesses optimize operations and quickly increase\r\nprofitability and achieve sustainable growth. We place a strong emphasis on\r\ninnovation security and user experience one wishes to seek simplification of\r\nbusiness processes and develop technology that will have real world impact.</span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nline-height:115%\">Join us in building a smarter future - where businesses can\r\ngrow faster, be able to work smarter and are able to achieve more.</span></p>','Scalable SaaS Solutions for Business Growth | Bizsetu Tech','Distributor management system, Order management system, sales force automation software, Banquet Management software, marriage hall booking application, Lead management software, lead management process, crm lead management','Optimize workflows, automate processes, and drive growth with Bizsetu Technology’s secure, cloud-based SaaS solutions. Built for global success!',1,1,1,'1','2025-02-17 09:53:29','2025-02-17 09:53:29');
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_category_id` int(11) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `blog_content` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (2,NULL,'test blog',NULL,'<p>test blog</p>','blog t','blog k, blog k','blog d',1,1,1,'1','2025-02-14 09:28:37','2025-02-14 09:28:37');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contact_heading` tinytext NOT NULL,
  `contact_address` text NOT NULL,
  `contact_email` text NOT NULL,
  `contact_phone` text NOT NULL,
  `contact_map` text NOT NULL,
  `mt_contact` tinytext NOT NULL,
  `mk_contact` text NOT NULL,
  `md_contact` text NOT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Contact Us','Gaur city center','bizsetutech@gmail.com','9650848208','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3355.33857262146!2d77.404530510755!3d28.51005608953132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce944a95da8f3%3A0x9c47b1b4730d629!2sParamount%20Floraville!5e1!3m2!1sen!2sin!4v1738568650290!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>','Meta Title','Meta Keyword','Meta Description',1,1,1,'1','2025-02-07 06:54:04','2025-02-07 06:54:04');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extra_pages`
--

DROP TABLE IF EXISTS `extra_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extra_pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extra_pages`
--

LOCK TABLES `extra_pages` WRITE;
/*!40000 ALTER TABLE `extra_pages` DISABLE KEYS */;
INSERT INTO `extra_pages` VALUES (3,'About us',NULL,'<p>about</p>','about t','about k','about d',1,1,1,'2','2025-02-14 07:00:30','2025-02-14 07:00:30');
/*!40000 ALTER TABLE `extra_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frontend_contacts`
--

DROP TABLE IF EXISTS `frontend_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frontend_contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frontend_contacts`
--

LOCK TABLES `frontend_contacts` WRITE;
/*!40000 ALTER TABLE `frontend_contacts` DISABLE KEYS */;
INSERT INTO `frontend_contacts` VALUES (1,NULL,NULL,NULL,NULL,NULL,0,0,0,'1','2025-02-03 02:52:50','2025-02-03 02:52:50'),(2,NULL,NULL,NULL,NULL,NULL,0,0,0,'1','2025-02-03 02:53:30','2025-02-03 02:53:30'),(3,NULL,NULL,NULL,NULL,NULL,0,0,0,'1','2025-02-03 02:57:58','2025-02-03 02:57:58'),(4,NULL,NULL,NULL,NULL,NULL,0,0,0,'1','2025-02-03 02:57:59','2025-02-03 02:57:59'),(5,'Customer One','Ajnara daffodil, D0005, Paras Tierea, Sector 137, Noida, Kulesara, Uttar Pradesh 201305, India','08707702713','fdfddf','fdfdfd',0,0,0,'1','2025-02-03 03:03:16','2025-02-03 03:03:16'),(6,'Customer One','Ajnara daffodil, D0005, Paras Tierea, Sector 137, Noida, Kulesara, Uttar Pradesh 201305, India','08707702713','subject','message',0,0,0,'1','2025-02-04 19:28:21','2025-02-04 19:28:21');
/*!40000 ALTER TABLE `frontend_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `homes`
--

DROP TABLE IF EXISTS `homes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` tinytext DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `home_welcome_title` tinytext DEFAULT NULL,
  `home_welcome_subtitle` tinytext DEFAULT NULL,
  `home_welcome_text` longtext DEFAULT NULL,
  `home_welcome_video` text DEFAULT NULL,
  `home_welcome_pbar1_text` tinytext DEFAULT NULL,
  `home_welcome_pbar1_value` tinytext DEFAULT NULL,
  `home_welcome_pbar2_text` tinytext DEFAULT NULL,
  `home_welcome_pbar2_value` tinytext DEFAULT NULL,
  `home_welcome_pbar3_text` tinytext DEFAULT NULL,
  `home_welcome_pbar3_value` tinytext DEFAULT NULL,
  `home_welcome_pbar4_text` tinytext DEFAULT NULL,
  `home_welcome_pbar4_value` tinytext DEFAULT NULL,
  `home_welcome_pbar5_text` tinytext DEFAULT NULL,
  `home_welcome_pbar5_value` tinytext DEFAULT NULL,
  `home_welcome_status` tinytext DEFAULT NULL,
  `home_welcome_video_bg` tinytext DEFAULT NULL,
  `home_why_choose_title` tinytext DEFAULT NULL,
  `home_why_choose_subtitle` tinytext DEFAULT NULL,
  `home_why_choose_status` tinytext DEFAULT NULL,
  `home_feature_title` tinytext DEFAULT NULL,
  `home_feature_subtitle` tinytext DEFAULT NULL,
  `home_feature_status` tinytext DEFAULT NULL,
  `home_service_title` tinytext DEFAULT NULL,
  `home_service_subtitle` tinytext DEFAULT NULL,
  `home_service_status` tinytext DEFAULT NULL,
  `counter_1_title` tinytext DEFAULT NULL,
  `counter_1_value` tinytext DEFAULT NULL,
  `counter_1_icon` tinytext DEFAULT NULL,
  `counter_2_title` tinytext DEFAULT NULL,
  `counter_2_value` tinytext DEFAULT NULL,
  `counter_2_icon` tinytext DEFAULT NULL,
  `counter_3_title` tinytext DEFAULT NULL,
  `counter_3_value` tinytext DEFAULT NULL,
  `counter_3_icon` tinytext DEFAULT NULL,
  `counter_4_title` tinytext DEFAULT NULL,
  `counter_4_value` tinytext DEFAULT NULL,
  `counter_4_icon` tinytext DEFAULT NULL,
  `counter_photo` tinytext DEFAULT NULL,
  `counter_status` tinytext DEFAULT NULL,
  `home_portfolio_title` tinytext DEFAULT NULL,
  `home_portfolio_subtitle` tinytext DEFAULT NULL,
  `home_portfolio_status` tinytext DEFAULT NULL,
  `home_booking_form_title` tinytext DEFAULT NULL,
  `home_booking_faq_title` tinytext DEFAULT NULL,
  `home_booking_status` tinytext DEFAULT NULL,
  `home_booking_photo` tinytext DEFAULT NULL,
  `home_team_title` tinytext DEFAULT NULL,
  `home_team_subtitle` tinytext DEFAULT NULL,
  `home_team_status` tinytext DEFAULT NULL,
  `home_ptable_title` tinytext DEFAULT NULL,
  `home_ptable_subtitle` tinytext DEFAULT NULL,
  `home_ptable_status` tinytext DEFAULT NULL,
  `home_testimonial_title` tinytext DEFAULT NULL,
  `home_testimonial_subtitle` tinytext DEFAULT NULL,
  `home_testimonial_photo` tinytext DEFAULT NULL,
  `home_testimonial_status` tinytext DEFAULT NULL,
  `home_blog_title` tinytext DEFAULT NULL,
  `home_blog_subtitle` tinytext DEFAULT NULL,
  `home_blog_item` tinytext DEFAULT NULL,
  `home_blog_status` tinytext DEFAULT NULL,
  `home_cta_text` text DEFAULT NULL,
  `home_cta_button_text` tinytext DEFAULT NULL,
  `home_cta_button_url` tinytext DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homes`
--

LOCK TABLES `homes` WRITE;
/*!40000 ALTER TABLE `homes` DISABLE KEYS */;
INSERT INTO `homes` VALUES (1,'Smart & Scalable SaaS Solutions for Business Growth','Business Growth softwares, software for business growth, saas software for business','Boost productivity & streamline operations with BizSetu\'s cloud-based SaaS solutions. Automate tasks, gain insights & grow your business effortlessly!','Software as a service as per your business needs',NULL,'<p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;line-height:115%;\r\nfont-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;\r\nmso-bidi-theme-font:minor-latin;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">In today’s fast paced business landscape,\r\nstaying ahead of the curve requires efficient, smart and scalable solutions. Bizsetu\r\nTechnology offers you advanced SaaS software designed to facilitate efficient\r\noperations, increase productivity and to drive growth in the business. Our\r\ncloud based solutions are designed to allow the businesses to maintain\r\nprocesses in a full harmony, facilitate the automation of repetitive tasks and\r\ntherefore be able to gain valuable insights which will allow them to make\r\nreason data driven decisions. Whether it is the need to streamline the sales\r\nfunction, maximize distribution or enhance customer engagement our technology\r\nwill allow you to do more with less effort. With real time accessibility from\r\nanywhere you can focus on what is truly important namely expanding the business\r\ninstead of spending man hours on inefficient procedures. You can expect to say\r\ngoodbye to manual inefficiencies and a means of smarter working practices with\r\nfull real time access, robust multi-factor security and a user-friendly\r\ninterface that allows you to spend more time on what is crucial in business\r\nwhilst minimizing the amount of effort required. The difference is that our\r\nscalable software solutions adapt to your particular business, so that\r\nregardless of the size we shall ensure smooth operations and increased\r\nprofitability. Partner with us today to take your business to the next level\r\nenabling you to know how to create a business where there is limitless\r\nopportunities for growth and progression. Contact us now, to take the first\r\nstep on the route to acceleration of success!</span></p>','Video','Business Managementrt','95','Financial Managementtr','70','Project Managementrttr','88',NULL,NULL,NULL,NULL,'hide','storage/app/public/files/home/home_welcome_video_bg/home_welcome_video_bg_1738443783.png','fgfg','fggf','hide','fdfdfd','dffdfd','show','fdfd','fdfd','show','1','2','hg','1','2','hg','1','2','rr','43','43','vfg','storage/app/public/files/home/counter_photo/counter_photo_1738445918.png','Hide','gf','gf','show','ffd','fdfd','show','storage/app/public/files/home/home_booking_photo/home_booking_photo_1738446460.png','fd','fd','show','df','df','hide','dfttttt','dfttt','storage/app/public/files/home/home_testimonial_photo/home_testimonial_photo_1738447460.png','show','cv','vc','55','show',NULL,NULL,NULL,1,1,1,'1','2025-02-17 09:16:06','2025-02-17 09:16:06');
/*!40000 ALTER TABLE `homes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_histories`
--

DROP TABLE IF EXISTS `login_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `in_time` datetime NOT NULL DEFAULT current_timestamp(),
  `out_time` datetime DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_histories`
--

LOCK TABLES `login_histories` WRITE;
/*!40000 ALTER TABLE `login_histories` DISABLE KEYS */;
INSERT INTO `login_histories` VALUES (1,1,'2025-01-17 06:42:10','2025-02-15 10:58:28','127.0.0.1','','','','','2025-01-17 01:12:10','2025-02-15 10:58:28'),(2,1,'2025-01-17 07:53:46','2025-02-15 10:58:28','127.0.0.1','','','','','2025-01-17 02:23:46','2025-02-15 10:58:28'),(3,1,'2025-01-19 06:51:41','2025-02-15 10:58:28','127.0.0.1','','','','','2025-01-19 01:21:41','2025-02-15 10:58:28'),(4,1,'2025-01-20 05:59:52','2025-02-15 10:58:28','127.0.0.1','','','','','2025-01-20 00:29:52','2025-02-15 10:58:28'),(5,1,'2025-01-22 16:24:27','2025-02-15 10:58:28','127.0.0.1','','','','','2025-01-22 10:54:27','2025-02-15 10:58:28'),(6,1,'2025-01-27 15:04:24','2025-02-15 10:58:28','127.0.0.1','','','','','2025-01-27 09:34:24','2025-02-15 10:58:28'),(7,1,'2025-01-28 09:26:43','2025-02-15 10:58:28','127.0.0.1','','','','','2025-01-28 03:56:43','2025-02-15 10:58:28'),(8,1,'2025-01-29 21:47:13','2025-02-15 10:58:28','127.0.0.1','','','','','2025-01-29 16:17:13','2025-02-15 10:58:28'),(9,1,'2025-01-30 07:20:12','2025-02-15 10:58:28','127.0.0.1','','','','','2025-01-30 01:50:12','2025-02-15 10:58:28'),(10,1,'2025-01-31 10:13:19','2025-02-15 10:58:28','127.0.0.1','','','','','2025-01-31 04:43:19','2025-02-15 10:58:28'),(11,1,'2025-01-31 18:12:23','2025-02-15 10:58:28','127.0.0.1','','','','','2025-01-31 12:42:23','2025-02-15 10:58:28'),(12,1,'2025-02-01 11:22:28','2025-02-15 10:58:28','127.0.0.1','','','','','2025-02-01 05:52:28','2025-02-15 10:58:28'),(13,1,'2025-02-01 18:56:07','2025-02-15 10:58:28','127.0.0.1','','','','','2025-02-01 13:26:07','2025-02-15 10:58:28'),(14,1,'2025-02-02 18:42:40','2025-02-15 10:58:28','127.0.0.1','','','','','2025-02-02 13:12:40','2025-02-15 10:58:28'),(15,1,'2025-02-03 06:05:48','2025-02-15 10:58:28','127.0.0.1','','','','','2025-02-03 00:35:48','2025-02-15 10:58:28'),(16,1,'2025-02-03 07:07:09','2025-02-15 10:58:28','127.0.0.1','','','','','2025-02-03 01:37:09','2025-02-15 10:58:28'),(17,1,'2025-02-03 18:40:20','2025-02-15 10:58:28','127.0.0.1','','','','','2025-02-03 13:10:20','2025-02-15 10:58:28'),(18,1,'2025-02-04 06:10:00','2025-02-15 10:58:28','127.0.0.1','','','','','2025-02-04 00:40:00','2025-02-15 10:58:28'),(19,1,'2025-02-04 18:57:16','2025-02-15 10:58:28','59.91.209.218','','','','','2025-02-04 18:57:16','2025-02-15 10:58:28'),(20,1,'2025-02-04 19:02:04','2025-02-15 10:58:28','59.91.209.218','','','','','2025-02-04 19:02:04','2025-02-15 10:58:28'),(21,1,'2025-02-05 01:22:50','2025-02-15 10:58:28','122.161.69.93','','','','','2025-02-05 01:22:50','2025-02-15 10:58:28'),(22,1,'2025-02-05 02:04:02','2025-02-15 10:58:28','122.161.69.93','','','','','2025-02-05 02:04:02','2025-02-15 10:58:28'),(23,1,'2025-02-07 06:39:17','2025-02-15 10:58:28','59.94.229.182','','','','','2025-02-07 06:39:17','2025-02-15 10:58:28'),(24,1,'2025-02-07 06:45:43','2025-02-15 10:58:28','122.161.69.119','','','','','2025-02-07 06:45:43','2025-02-15 10:58:28'),(25,1,'2025-02-07 07:46:39','2025-02-15 10:58:28','59.94.229.182','','','','','2025-02-07 07:46:39','2025-02-15 10:58:28'),(26,1,'2025-02-07 11:31:22','2025-02-15 10:58:28','59.94.229.182','','','','','2025-02-07 11:31:22','2025-02-15 10:58:28'),(27,1,'2025-02-07 12:28:36','2025-02-15 10:58:28','122.161.69.119','','','','','2025-02-07 12:28:36','2025-02-15 10:58:28'),(28,1,'2025-02-09 02:51:09','2025-02-15 10:58:28','122.161.69.118','','','','','2025-02-09 02:51:09','2025-02-15 10:58:28'),(29,1,'2025-02-09 03:07:18','2025-02-15 10:58:28','122.161.69.118','','','','','2025-02-09 03:07:18','2025-02-15 10:58:28'),(30,1,'2025-02-10 14:19:36','2025-02-15 10:58:28','122.161.64.101','','','','','2025-02-10 14:19:36','2025-02-15 10:58:28'),(31,1,'2025-02-11 12:22:14','2025-02-15 10:58:28','122.161.51.221','','','','','2025-02-11 12:22:14','2025-02-15 10:58:28'),(32,1,'2025-02-11 12:22:14','2025-02-15 10:58:28','122.161.51.221','','','','','2025-02-11 12:22:14','2025-02-15 10:58:28'),(33,1,'2025-02-11 12:31:54','2025-02-15 10:58:28','122.161.52.93','','','','','2025-02-11 12:31:54','2025-02-15 10:58:28'),(34,1,'2025-02-11 12:45:23','2025-02-15 10:58:28','122.161.52.93','','','','','2025-02-11 12:45:23','2025-02-15 10:58:28'),(35,1,'2025-02-11 12:55:39','2025-02-15 10:58:28','122.161.52.93','','','','','2025-02-11 12:55:39','2025-02-15 10:58:28'),(36,1,'2025-02-13 07:56:42','2025-02-15 10:58:28','122.161.50.213','','','','','2025-02-13 07:56:42','2025-02-15 10:58:28'),(37,1,'2025-02-13 21:59:33','2025-02-15 10:58:28','122.161.50.213','','','','','2025-02-13 21:59:33','2025-02-15 10:58:28'),(38,1,'2025-02-13 22:01:38','2025-02-15 10:58:28','122.161.50.213','','','','','2025-02-13 22:01:38','2025-02-15 10:58:28'),(39,1,'2025-02-14 04:36:53','2025-02-15 10:58:28','122.161.50.150','','','','','2025-02-14 04:36:53','2025-02-15 10:58:28'),(40,1,'2025-02-14 06:47:15','2025-02-15 10:58:28','122.161.48.122','','','','','2025-02-14 06:47:15','2025-02-15 10:58:28'),(41,1,'2025-02-14 06:50:12','2025-02-15 10:58:28','122.161.50.150','','','','','2025-02-14 06:50:12','2025-02-15 10:58:28'),(42,1,'2025-02-14 06:59:09','2025-02-15 10:58:28','122.161.50.150','','','','','2025-02-14 06:59:09','2025-02-15 10:58:28'),(43,1,'2025-02-14 09:22:17','2025-02-15 10:58:28','122.161.50.150','','','','','2025-02-14 09:22:17','2025-02-15 10:58:28'),(44,1,'2025-02-15 05:22:11','2025-02-15 10:58:28','122.161.49.242','','','','','2025-02-15 05:22:11','2025-02-15 10:58:28'),(45,1,'2025-02-15 10:30:08','2025-02-15 10:58:28','122.161.49.242','','','','','2025-02-15 10:30:08','2025-02-15 10:58:28'),(46,1,'2025-02-15 10:30:46','2025-02-15 10:58:28','122.161.49.242','','','','','2025-02-15 10:30:46','2025-02-15 10:58:28'),(47,1,'2025-02-15 10:56:45','2025-02-15 10:58:28','122.161.49.242','','','','','2025-02-15 10:56:45','2025-02-15 10:58:28'),(48,1,'2025-02-15 11:14:36',NULL,'122.161.49.242','','','','','2025-02-15 11:14:36','2025-02-15 11:14:36'),(49,1,'2025-02-15 13:02:31',NULL,'122.161.49.242','','','','','2025-02-15 13:02:31','2025-02-15 13:02:31'),(50,1,'2025-02-17 07:49:14',NULL,'152.59.88.238','','','','','2025-02-17 07:49:14','2025-02-17 07:49:14'),(51,1,'2025-02-17 10:24:34',NULL,'122.161.64.116','','','','','2025-02-17 10:24:34','2025-02-17 10:24:34');
/*!40000 ALTER TABLE `login_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `order_by` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'1',0,'Dashboard','<i class=\"side-menu__icon fe fe-home\"></i>','dashboard','1',1,1,1,'1',NULL,NULL),(2,'1',0,'Settings','<i class=\"side-menu__icon fe fe-aperture\"></i>','setting','2',1,1,1,'1',NULL,NULL),(3,'1',0,'News','<i class=\"side-menu__icon fe fe-slack\"></i>','javascript:void(0)','3',1,1,1,'1',NULL,NULL),(4,'1',0,'Team Members','<i class=\"side-menu__icon fe fe-user\"></i>','team.member','4',1,1,1,'1',NULL,NULL),(5,'1',0,'Slider','<i class=\"side-menu__icon fe fe-image\"></i>','slider','5',1,1,1,'1',NULL,NULL),(6,'1',0,'Pages','<i class=\"side-menu__icon fe fe-file-text\"></i>','page.section','6',1,1,1,'1',NULL,NULL),(7,'1',0,'Testimonial','<i class=\"side-menu__icon fe fe-user-plus\"></i>','testimonial','7',1,1,1,'1',NULL,NULL),(8,'1',0,'Services','<i class=\"side-menu__icon fe fe-aperture\"></i>','service','8',1,1,1,'1',NULL,NULL),(9,'1',0,'Social Media Links','<i class=\"side-menu__icon fe fe-link\"></i>','socialmedia','9',1,1,1,'1',NULL,NULL),(10,'1',0,'Photo Gallery','<i class=\"side-menu__icon fe fe-camera\"></i>','photogallery','10',1,1,1,'1',NULL,NULL),(11,'1',0,'Pricing Table','<i class=\"side-menu__icon fa fa-cube\"></i>','pricing','11',1,1,1,'1',NULL,NULL),(12,'1',0,'Portfolio','<i class=\"side-menu__icon fe fe-file-text\"></i>','javascript:void(0)','12',1,1,1,'1',NULL,NULL),(13,'1',0,'Menus','<i class=\"side-menu__icon fe fe-list\"></i>','menus','13',1,1,1,'1',NULL,NULL),(14,'1',3,'Category','slide-item','category','1',1,1,1,'1',NULL,'2025-02-07 03:31:40'),(15,'1',3,'News','slide-item','news','2',1,1,1,'1',NULL,'2025-02-07 03:31:43'),(16,'1',3,'Comment','slide-item','#','3',1,1,1,'1',NULL,'2025-02-07 03:31:46'),(17,'1',12,'Portfolio Category','slide-item','portfolio.category','1',1,1,1,'1',NULL,'2025-02-07 03:36:54'),(18,'1',12,'Portfolio','slide-item','portfolio','2',1,1,1,'1',NULL,'2025-02-07 03:36:47');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_05_03_074410_create_login_histories_table',1),(5,'2025_01_17_065447_create_news_categories_table',2),(7,'2025_01_17_092503_create_news_table',3),(11,'2025_01_19_063603_create_team_members_table',4),(12,'2025_01_19_071328_create_sliders_table',4),(13,'2025_01_20_064508_create_testimonials_table',5),(14,'2025_01_20_064621_create_photo_galleries_table',5),(15,'2025_01_20_064656_create_pricings_table',5),(16,'2025_01_22_154840_create_portfolios_table',6),(17,'2025_01_22_155604_create_portfolio_categories_table',6),(18,'2025_01_27_160741_create_portfolio_photos_table',7),(19,'2025_01_28_093511_create_settings_table',8),(23,'2025_01_31_181439_create_homes_table',9),(24,'2025_01_31_181552_create_abouts_table',9),(25,'2025_01_31_182233_create_contacts_table',9),(26,'2025_02_02_184624_create_services_table',10),(27,'2025_02_03_075727_create_frontend_contacts_table',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'Bitsetu',1,1,1,'1','2025-02-07 09:01:02','2025-02-07 09:01:02');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) DEFAULT NULL,
  `news_content` longtext DEFAULT NULL,
  `news_content_short` varchar(255) DEFAULT NULL,
  `news_date` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Etiam dictum Nunc enim Sed massa tellus aliquam rhoncus venenatis.','Etiam dictum. Nunc enim. Sed massa tellus, aliquam rhoncus, venenatis quis, suscipit ac, libero. Praesent odio tellus, posuere sed, dictum sed, fermentum at, orci. Aenean arcu tortor, suscipit vitae, hendrerit condimentum, dapibus ac, nulla. Curabitur tempor. Donec dapibus placerat ipsum. Nulla facilisi. Aliquam ut leo quis nunc adipiscing faucibus. Mauris non quam ac eros rutrum fringilla. Quisque ut turpis. Nullam rhoncus feugiat quam.','Donec dapibus placerat ipsum. Nulla facilisi. Etiam dictum Nunc enim Sed massa tellus aliquam rhoncus venenatis.','2025-01-30','photo_1738612057.jpg','banner_1737110696.png',1,'On','Meta Title','Meta Keywords','Meta Description',NULL,1,1,'1','2025-01-17 05:10:03','2025-02-03 14:17:37'),(2,'Etiam dictum Nunc enim Sed massa tellus aliquam rhoncus venenatis.','Etiam dictum. Nunc enim. Sed massa tellus, aliquam rhoncus, venenatis quis, suscipit ac, libero. Praesent odio tellus, posuere sed, dictum sed, fermentum at, orci. Aenean arcu tortor, suscipit vitae, hendrerit condimentum, dapibus ac, nulla. Curabitur tempor. Donec dapibus placerat ipsum. Nulla facilisi. Aliquam ut leo quis nunc adipiscing faucibus. Mauris non quam ac eros rutrum fringilla. Quisque ut turpis. Nullam rhoncus feugiat quam.','Etiam dictum Nunc enim Sed massa tellus aliquam rhoncus venenatis.Etiam dictum Nunc enim Sed massa tellus aliquam rhoncus venenatis.','2025-02-22','photo_1738612097.jpg',NULL,1,'On',NULL,NULL,NULL,NULL,1,1,'1','2025-02-03 14:18:17','2025-02-03 14:18:17');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_banner` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_categories`
--

LOCK TABLES `news_categories` WRITE;
/*!40000 ALTER TABLE `news_categories` DISABLE KEYS */;
INSERT INTO `news_categories` VALUES (1,'Category 1','category_banner_1738695898.jpg','Meta Title','Meta KeywordsMeta KeywordsMeta Keywords','Meta DescriptionMeta Description\r\nMeta Description\r\nMeta Description\r\nMeta Description',1,1,1,'1','2025-01-17 04:35:16','2025-02-04 19:04:58');
/*!40000 ALTER TABLE `news_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_galleries`
--

DROP TABLE IF EXISTS `photo_galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_galleries`
--

LOCK TABLES `photo_galleries` WRITE;
/*!40000 ALTER TABLE `photo_galleries` DISABLE KEYS */;
INSERT INTO `photo_galleries` VALUES (1,'photo_1737363395.png',1,1,1,'2','2025-01-20 03:26:23','2025-01-20 03:26:35');
/*!40000 ALTER TABLE `photo_galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio_categories`
--

DROP TABLE IF EXISTS `portfolio_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio_categories`
--

LOCK TABLES `portfolio_categories` WRITE;
/*!40000 ALTER TABLE `portfolio_categories` DISABLE KEYS */;
INSERT INTO `portfolio_categories` VALUES (1,'ssss',1,1,1,'2',NULL,NULL),(2,'aaaadfdffd',1,1,1,'1',NULL,'2025-01-22 12:53:23'),(3,'fdfdfd',1,1,1,'0','2025-01-22 11:48:32','2025-01-22 12:50:50'),(4,'dddffdf',1,1,1,'1','2025-01-22 12:53:32','2025-01-22 12:55:11'),(5,'dfff',1,1,1,'0','2025-01-22 12:53:41','2025-01-22 12:55:55');
/*!40000 ALTER TABLE `portfolio_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio_photos`
--

DROP TABLE IF EXISTS `portfolio_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio_photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_id` int(11) NOT NULL,
  `other_photo` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio_photos`
--

LOCK TABLES `portfolio_photos` WRITE;
/*!40000 ALTER TABLE `portfolio_photos` DISABLE KEYS */;
INSERT INTO `portfolio_photos` VALUES (1,1,'other_photo_1738001530_6797cc7a00829.png',1,1,1,'2','2025-01-27 12:42:10','2025-01-27 12:42:10'),(2,1,'other_photo_1738001530_6797cc7a06f55.png',1,1,1,'2','2025-01-27 12:42:10','2025-01-27 12:42:10'),(3,1,'other_photo_1738001530_6797cc7a079db.png',1,1,1,'1','2025-01-27 12:42:10','2025-01-27 12:42:10'),(4,1,'other_photo_1738003634_6797d4b2aa464.png',1,1,1,'1','2025-01-27 13:17:14','2025-01-27 13:17:14'),(5,1,'other_photo_1738003634_6797d4b2b0be0.png',1,1,1,'1','2025-01-27 13:17:14','2025-01-27 13:17:14');
/*!40000 ALTER TABLE `portfolio_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `short_content` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_company` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `client_comment` text DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (1,'sdds','dsds','dsds','ds','vgg','2025-01-23','2025-01-30','https://chatgpt.com/c/67912c35-8920-800b-8187-ec7b1d52d5f2','3444','fddf','2','photo_1737568166.png','df','fd','fd',1,1,1,'1','2025-01-22 12:19:26','2025-01-27 13:17:14'),(2,'sdsddsdsd','bbbb','cccc','ddd','eee','2025-01-23','2025-01-31','https://chatgpt.com/c/67912c35-8920-800b-8187-ec7b1d52d5f2','4000','fddfdf','2','photo_1737568453.png','df','fd','fdfd',1,1,1,'2','2025-01-22 12:23:27','2025-01-22 12:24:22');
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pricings`
--

DROP TABLE IF EXISTS `pricings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pricings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `button_text` text DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pricings`
--

LOCK TABLES `pricings` WRITE;
/*!40000 ALTER TABLE `pricings` DISABLE KEYS */;
INSERT INTO `pricings` VALUES (1,'<i class=\"fa fa-camera\"></i>','khjhjdffdfdfdfdfd','800','bbfx','dffddf','dsdsds','sksfhfskjfshfkssfh',1,1,1,'2','2025-01-20 03:54:57','2025-01-20 03:55:57');
/*!40000 ALTER TABLE `pricings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_categories`
--

DROP TABLE IF EXISTS `service_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_categories`
--

LOCK TABLES `service_categories` WRITE;
/*!40000 ALTER TABLE `service_categories` DISABLE KEYS */;
INSERT INTO `service_categories` VALUES (2,'LMS',1,1,1,'2','2025-02-09 03:12:49','2025-02-09 03:12:49'),(3,'Our Services',1,1,1,'1','2025-02-11 12:48:50','2025-02-14 10:51:34');
/*!40000 ALTER TABLE `service_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_category_id` int(11) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `service_content` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,NULL,'Service Three','photo_1738526050.png',NULL,'ds','ds','ds',1,1,1,'2','2025-02-02 14:24:10','2025-02-02 14:24:10'),(2,3,'Banquet management System','photo_1739783824.webp','<p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:18.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Intuitive banquet management software<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Increase productivity, enhance customer\r\nsatisfaction, and optimize your banquet services.<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:18.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Streamline operations, elevate guest\r\nsatisfaction, and fuel business growth while effectively managing financial commitments.<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Event Scheduling<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Efficiently manage event bookings, including\r\ndate selection, room allocation, and scheduling of banquet facilities.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Menu Planning<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Create and customize menus for different\r\nevents, accommodating dietary restrictions and guest preferences.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Event Coordination<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Coordinate event details, such as floor plans,\r\ntable arrangements, decorations, audiovisual requirements, and special setups.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:18.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Boost your revenue potential by up to 25% with\r\nour&nbsp;banquet management software<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Resource and Inventory Management<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Oversee banquet resources such as equipment,\r\nlinens, tableware, and inventory tracking to ensure seamless planning and\r\noptimal allocation.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Contract and Billing Management<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Effortlessly create contracts, invoices, and\r\nproposals with automated pricing calculations and payment tracking, maximizing\r\nrevenue on every booking.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Guest Management<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Keep a detailed guest database with contact\r\ninformation, special requests, seating preferences, and past visits to deliver\r\na personalized experience.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Series Event booking<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">By managing series event bookings through\r\nbanquet software, venues can streamline operations, minimize administrative\r\nwork, enhance accuracy, and ensure a smooth experience for clients hosting\r\nmultiple events.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Banquet Chart<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">The banquet chart feature enables hotels to\r\nseamlessly manage bookings for multiple halls across different dates and time\r\nslots in a day. It provides the flexibility to merge or separate halls as\r\nneeded, ensuring optimal space utilization and the best scheduling options for\r\nevents.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Multiple events simultaneously<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Booking multiple halls for different dates and\r\ntime slots allows hotels to host a variety of events at the same time, such as\r\nconferences, weddings, or corporate meetings. By merging or separating halls,\r\nhotels can easily adjust to evolving event requirements, offering maximum\r\nflexibility to accommodate different group sizes and preferences.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">FnB and Non-FnB<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Our banquet management software efficiently\r\nhandles both food and beverage (FnB) and non-FnB items, ensuring a smooth and\r\nmemorable event experience for guests. This includes thorough planning,\r\ncoordination, and execution of food and beverage services, as well as\r\norganizing and providing non-FnB items to meet the unique needs and preferences\r\nof event organizers and attendees.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:18.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Easily create function prospects and simplify\r\ncommunication across multiple departments.<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Multiple type of booking<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Our software supports various types of banquet\r\nbooking, enquiry, Leads, Close leads, Lead follow up, and Payment follow up\r\nsuch as inquiries, ensuring smooth and efficient event management.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Managing multiple session<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Effectively manage session-based banquets with\r\nmultiple sessions each day, optimizing resource allocation to ensure successful\r\nevents.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span lang=\"EN-US\" style=\"font-size:16.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Staff Scheduling<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:Calibri;\r\nmso-bidi-theme-font:minor-latin\">Plan and assign staff to events, monitor their\r\navailability, and manage their roles and responsibilities.</span></p>','Best Banquet Management Software | Streamline Event Planning','Banquet Management software, marriage hall booking application, marriage hall booking app, online marriage hall booking, sales and marketing department in hotel, Banquet software, Banquet management software developer, Banquet software development agency','Simplify event planning with top banquet management software. Automate bookings, manage guests & boost efficiency for flawless events!',1,1,1,'1','2025-02-04 04:17:19','2025-02-17 09:17:04'),(3,3,'Distribution Management System','photo_1739788110.webp','<p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">New way of\r\norder-taking<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">From order to returns to invoicing\r\nwith Bizsetu Order Management<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">CTA<o:p></o:p></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Eliminate manual\r\nbottlenecks by order automation<o:p></o:p></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Pinpoint Order\r\nLocation<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Capture geolocation at the outlet and\r\nconfirm with digital signatures.<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Frictionless\r\nCustomer Data<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Ensure hygienic data with easy\r\ninterfaces for management.<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Effortless\r\nPromotions<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Manage schemes, returns, collaterals,\r\nand pops with ease.<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Real-Time\r\nInventory Visibility<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Track outlet stock levels at a glance.<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Boost Revenue\r\nRecognition<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Streamline collections and payments\r\nfor faster recognition.<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Smart Ordering<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Get AI-powered order suggestions based\r\non outlet sales and more.<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Automated\r\nReplenishment<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Monitor distributor stock and trigger\r\nautomatic reorders.<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Track every order\r\nmovement at the click of a button<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Capture every SKU with ease.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Browse by category and sub-category\r\nfor streamlined selection.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Apply dynamic discounts at the SKU\r\nlevel or overall.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Set percentage or value-based\r\ndiscounts, tailored to each SKU.<o:p></o:p></span></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Leverage intelligent order suggestions\r\nfor optimized inventory management.<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Leaders who trust\r\nretail intelligence<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Our customers are our litmus test.\r\nHear how retail technology is winning markets for them.<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Explore other\r\nretail intelligence solutions<o:p></o:p></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Attendance\r\nManagement<o:p></o:p></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Inventory\r\nManagement<o:p></o:p></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Order\r\nFulfillment<o:p></o:p></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Order Invoicing<o:p></o:p></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Sales / Beat\r\nAutomation<o:p></o:p></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Distributor\r\nManagement<o:p></o:p></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Smart\r\nMerchandising<o:p></o:p></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Asset Management<o:p></o:p></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Payment Tracking<o:p></o:p></span></b></p><p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%;\r\nmso-bidi-font-family:Calibri;mso-bidi-theme-font:minor-latin\">Want to know how\r\nretail intelligence works?<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin\">Talk to our experts and book a virtual\r\ndemo to see how Bizsetu empowers global supply chains.</span></p>','Optimize Distribution with the Best Distributor Management System','Distributor management system, distribution management software, Order management system, retail management software, sales order app, sales beat planning software, field force management software, fmcg distribution management','Optimize your supply chain with the best distributor management system. Automate inventory, track sales, and improve efficiency for seamless distribution.',1,1,1,'1','2025-02-04 04:24:28','2025-02-17 10:28:30'),(4,3,'Lead Management System','photo_1739788245.webp','<p class=\"MsoNormal\"><span style=\"font-size: 14pt;\">Our Happy\r\nCustomers Globally</span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%\">Join\r\nthousands of businesses who are getting big results from Bizsetu CRM.<br>\r\nSlide Review images <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%\">Most apps\r\nfor tracking leads and clients in one place are needlessly complex CRMs. <o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%\">That\'s why <a href=\"https://bizsetu.com/\" target=\"_blank\"><b>Bizsetu</b></a>\r\nstands out to me—its simplicity.<br>\r\n<br>\r\n</span><b><span style=\"font-size:18.0pt;line-height:115%\">Client Success Story</span></b><span style=\"font-size:14.0pt;line-height:115%\"><o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%\">Don\'t let\r\nyour leads slip away<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%\">Top 3 things\r\nyou should do to win customers<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Bring all\r\nleads in one place<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%\">Leads data\r\nfrom Websites, Facebook Ads,<br>\r\nExcel sheets Telephone leads, Field Sales, Tradeshows and 3rd party lead gen\r\nplatforms – bring them all to one place - Bizsetu CRM<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Rapid\r\nlead response<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%\">Connect with\r\nyour leads instantly using<br>\r\nautomated emails and texts/SMS. Engage using WhatsApp, phone calls, text &amp;\r\nemails–all from your favorite app– Bizsetu CRM<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Fail-safe\r\nfollow ups<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%\">No more\r\nmissed leads or missed follow ups.<br>\r\nDo regular, rigorous and recursive follow-ups<br>\r\nwith your leads and prospects using<br>\r\nBizsetu CRM and its reminder alarms.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%\">The one\r\nplace for&nbsp;all your leads<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%\">Effortlessly\r\nrespond &amp; convert leads from all sources with Bizsetu CRM<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Facebook,\r\nWhatsapp, Website, Excel, Instagram, Email Marketing<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%\">Your\r\nsecret weapon for sales success<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Businesses\r\nleverage below features to grow. You should as well.<br>\r\nDescribe all leads plate form<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%\">Reviews\r\n&amp; Ratings<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%\">Highly rated\r\nby hundreds of&nbsp;customers all over the world<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%\">&nbsp;</span></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%\">Improving\r\nsales doesn’t have to be expensive</span></b><b><span style=\"font-size:14.0pt;\r\nline-height:115%\"><br>\r\nSubscription Plans &amp; Pricing<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%\">Who are\r\nusing&nbsp;Bizsetu CRM?<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%\">Business\r\nSize<o:p></o:p></span></b></p>\r\n\r\n<ul style=\"margin-top:0in\" type=\"disc\">\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Start-ups<o:p></o:p></span></b></li>\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Small Office Home Office<o:p></o:p></span></b></li>\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Small Businesses<o:p></o:p></span></b></li>\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Mid Size<o:p></o:p></span></b></li>\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Enterprises &amp; MNCs<o:p></o:p></span></b></li>\r\n</ul>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%\">User\r\nRoles<o:p></o:p></span></b></p>\r\n\r\n<ul style=\"margin-top:0in\" type=\"disc\">\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Marketing<o:p></o:p></span></b></li>\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Sales Operations<o:p></o:p></span></b></li>\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Customer Support<o:p></o:p></span></b></li>\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Service<o:p></o:p></span></b></li>\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Management<o:p></o:p></span></b></li>\r\n</ul>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:16.0pt;line-height:115%\">Business\r\nneeds<o:p></o:p></span></b></p>\r\n\r\n<ul style=\"margin-top:0in\" type=\"disc\">\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">One Place For Leads<o:p></o:p></span></b></li>\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Rapid Lead Response<o:p></o:p></span></b></li>\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Timely Follow Ups<o:p></o:p></span></b></li>\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Selling Discipline<o:p></o:p></span></b></li>\r\n <li class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Better Sales Growth<o:p></o:p></span></b></li>\r\n</ul>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%\">Industries\r\nthat use Bizsetu CRM<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">Range of\r\nindustries use Bizsetu CRM to accelerate sales<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%\">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></b><b><span style=\"font-size:\r\n14.0pt;line-height:115%\">Real Estate and Construction<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fitness and Wellness<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Marketing Agencies &amp; Services<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Manufacturing Companies<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Education &amp; Training Institutes<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Events &amp; Tradeshows<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; E-commerce &amp; Retail<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Consultancy or Advisory Services<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Finance and Insurance<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Software &amp; IT<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Trading<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:14.0pt;line-height:115%\">•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Business Services<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%\">Resources\r\nthat you would love<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:14.0pt;line-height:115%\">Resources\r\nthat you would love<br>\r\nKnowledge Base</span><b><span style=\"font-size:18.0pt;line-height:115%\"><o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\"><b><span style=\"font-size:18.0pt;line-height:115%\">Need\r\nhelp? Assistance?<o:p></o:p></span></b></p>\r\n\r\n<span style=\"font-size:14.0pt;line-height:115%;font-family:&quot;Calibri&quot;,sans-serif;\r\nmso-ascii-theme-font:minor-latin;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;\r\nmso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Schedule a Demo<br>\r\nContact &amp; Support</span>','Powerful Lead Management Software | Simplify & Scale Sales','Bizsetu Lead management software, Lead Manager, crm for lead, Lead management software, lead management process, crm lead management,','Boost sales with top lead management software. Capture, track & convert leads efficiently with automation & CRM integration.',1,1,1,'1','2025-02-04 20:39:35','2025-02-17 10:30:45');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('0YDrzBk45zKhUFq1XMKI2pv6Pe2rXWINg6MRvdB5',NULL,'157.39.23.240','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWhkc3RrS2M4ZE9kTjZPU1h3eTRlZUNEZ25GcnJvNU1tbVNBVW5oYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vYml6c2V0dS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1739796159),('2y57dWIR1b6fjtmTYgFDNEbLOfhRkoiJyCwg100x',NULL,'88.210.11.43','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGtnYnllMWd3a1NYc3VpbHJ0a3YzUkVYWW1oQTVFUXM2M2VMQmhqNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYml6c2V0dS5jb20vYmxvZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1739791648),('36aLWtxMz8xh4BzG6VyFwoxMMhaiVnY8CkZnFlVt',NULL,'223.15.245.170','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNlJIMG15UkluTXRlZ2hRVWszb1NQMndYT1BFNlJ0bktBT3BWSE03SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly93d3cuYml6c2V0dS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1739792458),('CwnaORHRS8yYGHUYB6BkdneBPYnjy7qKPooFgmFh',1,'157.39.23.240','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUmVYSGZzMEViYXUxOG5kYlBzVGc0VzJrRzZubXpxa2tIcEE1VFFuZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vYml6c2V0dS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1739795674),('jpU6LXJoGmeVXUWLFAqWvCgAdYTMM0CVKKzAaOk5',NULL,'122.161.79.165','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiNzM1ZWpVVUk1YVhEQXVIcDJBd3N5NmdmbEdJUUU5SVoyT1VnYndLVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1739789950),('kLZ5XZti8rLcZnLEsT62h236XOJUQxrG7s5iZSGe',NULL,'122.161.79.165','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMk1wTmVDVXdqaURjYXJtYU05SDlWOWNMRmpRUnBEM1huNTRnUGVZViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vYml6c2V0dS5jb20vYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1739798135),('QVIsoOuhOZdvd8YooCbKsXCgbvvsQ2qmR4ENKOyS',NULL,'43.156.168.214','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNDJEYm80QXI1MG95Vms4Rk5TcG1zQ1ZlTzIyZ1RUZEx6VlBOYXQ2SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly9iaXpzZXR1LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1739791452),('sgSMBYSLfvaBUriyvEOIXH05ak345j9nasl8cfC6',NULL,'157.39.23.240','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjRBYlo5b1k4N1hXb2IzV3FwcHdhQzA5cHpPT3NBVWRCZGFBeEFDUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vYml6c2V0dS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1739796061),('t6tFwY7hU9znf6AQC2t3cUUFnBD9EBeCT3bdLnUX',NULL,'81.182.144.253','python-requests/2.28.2','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmFZd3hEZ1dzNzhrN3ZyUkRWd0k2cW16MmwzNkdyRVhIUHhvQWx6UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHA6Ly9iaXpzZXR1LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1739797823);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `logo` tinytext DEFAULT NULL,
  `favicon` tinytext DEFAULT NULL,
  `footer_col1_title` tinytext DEFAULT NULL,
  `footer_col2_title` tinytext DEFAULT NULL,
  `footer_col3_title` tinytext DEFAULT NULL,
  `footer_col4_title` tinytext DEFAULT NULL,
  `footer_copyright` text DEFAULT NULL,
  `footer_address` text DEFAULT NULL,
  `footer_email` text DEFAULT NULL,
  `footer_phone` text DEFAULT NULL,
  `footer_recent_news_item` tinytext DEFAULT NULL,
  `footer_recent_portfolio_item` tinytext DEFAULT NULL,
  `newsletter_text` text DEFAULT NULL,
  `cta_text` text DEFAULT NULL,
  `cta_button_text` tinytext DEFAULT NULL,
  `cta_button_url` tinytext DEFAULT NULL,
  `cta_background` tinytext DEFAULT NULL,
  `top_bar_email` tinytext DEFAULT NULL,
  `top_bar_phone` tinytext DEFAULT NULL,
  `send_email_from` tinytext DEFAULT NULL,
  `receive_email_to` tinytext DEFAULT NULL,
  `banner_about` tinytext DEFAULT NULL,
  `banner_faq` tinytext DEFAULT NULL,
  `banner_service` tinytext DEFAULT NULL,
  `banner_testimonial` tinytext DEFAULT NULL,
  `banner_news` tinytext DEFAULT NULL,
  `banner_event` tinytext DEFAULT NULL,
  `banner_contact` tinytext DEFAULT NULL,
  `banner_search` tinytext DEFAULT NULL,
  `banner_terms` tinytext DEFAULT NULL,
  `banner_privacy` tinytext DEFAULT NULL,
  `banner_team` tinytext DEFAULT NULL,
  `banner_portfolio` tinytext DEFAULT NULL,
  `banner_verify_subscriber` tinytext DEFAULT NULL,
  `banner_pricing` tinytext DEFAULT NULL,
  `banner_photo_gallery` tinytext DEFAULT NULL,
  `front_end_color` tinytext DEFAULT NULL,
  `sidebar_total_recent_post` tinytext DEFAULT NULL,
  `sidebar_total_upcoming_event` tinytext DEFAULT NULL,
  `sidebar_total_past_event` tinytext DEFAULT NULL,
  `sidebar_news_heading_category` tinytext DEFAULT NULL,
  `sidebar_news_heading_recent_post` tinytext DEFAULT NULL,
  `sidebar_event_heading_upcoming` tinytext DEFAULT NULL,
  `sidebar_event_heading_past` tinytext DEFAULT NULL,
  `sidebar_service_heading_service` tinytext DEFAULT NULL,
  `sidebar_service_heading_quick_contact` tinytext DEFAULT NULL,
  `sidebar_portfolio_heading_project_detail` tinytext DEFAULT NULL,
  `sidebar_portfolio_heading_quick_contact` tinytext DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'storage/app/public/files/setting/logo/logo_1739617031.png',NULL,'Latest Blog','Our Services','About Us','Contact Us','Copyright © 2024-2025 Bitsetu Technology | All rights reserved.','O-420, Gaur City Center, Gr. Noida(W), UP-201318','bizsetutech@gmail.com','9650848208','25','22',NULL,NULL,NULL,NULL,'storage/app/public/files/setting/cta-background/cta_background_1738911321.png','bizsetutech@gmail.com','9650848208',NULL,NULL,'storage/app/public/files/setting/banner/about/about_1738695786.jpeg',NULL,'storage/app/public/files/setting/banner/service/service_1738700066.jpeg','storage/app/public/files/setting/banner/testimonial/testimonial_1738695796.jpeg','storage/app/public/files/setting/banner/news/news_1738695821.jpeg','storage/app/public/files/setting/banner/event/event_1738695857.jpeg','storage/app/public/files/setting/banner/contact/contact_1738695812.jpeg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'#243d65',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,1,'1','2025-02-15 10:57:11','2025-02-15 10:57:11');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `button1_text` varchar(255) DEFAULT NULL,
  `button1_url` varchar(255) DEFAULT NULL,
  `button2_text` varchar(255) DEFAULT NULL,
  `button2_url` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (2,'photo_1739790250.png','Slider 3','Slider 3',NULL,NULL,NULL,NULL,'Right',1,1,1,'1','2025-01-19 02:06:22','2025-02-17 11:04:10'),(3,'photo_1739530742.png','Slider 2','Slider 2',NULL,NULL,NULL,NULL,'Left',1,1,1,'2','2025-02-04 01:29:20','2025-02-14 10:59:02'),(4,'photo_1739625916.png','Slider One','Slider One',NULL,NULL,NULL,NULL,'Right',1,1,1,'1','2025-02-04 01:29:37','2025-02-15 13:25:16'),(5,'photo_1739795662.png','slider 2',NULL,NULL,NULL,NULL,NULL,'Left',1,1,1,'1','2025-02-17 12:34:22','2025-02-17 12:34:22');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_media`
--

DROP TABLE IF EXISTS `social_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `google_plus` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tumblr` varchar(255) DEFAULT NULL,
  `flickr` varchar(255) DEFAULT NULL,
  `reddit` varchar(255) DEFAULT NULL,
  `snapchat` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `quora` varchar(255) DEFAULT NULL,
  `stumbleupon` varchar(255) DEFAULT NULL,
  `delicious` varchar(255) DEFAULT NULL,
  `digg` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_media`
--

LOCK TABLES `social_media` WRITE;
/*!40000 ALTER TABLE `social_media` DISABLE KEYS */;
INSERT INTO `social_media` VALUES (1,'https://www.facebook.com/',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'1','2025-02-08 14:01:21','2025-02-09 03:15:29');
/*!40000 ALTER TABLE `social_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `google_plus` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `flickr` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_members`
--

LOCK TABLES `team_members` WRITE;
/*!40000 ALTER TABLE `team_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Shailly','CEO','photo_1737357603.png','Comment Comment Comment Comment Comment Comment',1,1,1,'2','2025-01-20 01:48:56','2025-01-20 01:50:16');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_permissions`
--

DROP TABLE IF EXISTS `user_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `permission` int(11) NOT NULL,
  `organization` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permissions`
--

LOCK TABLES `user_permissions` WRITE;
/*!40000 ALTER TABLE `user_permissions` DISABLE KEYS */;
INSERT INTO `user_permissions` VALUES (5,2,1,NULL,1,NULL,1,1,'1','2025-02-07 05:54:08','2025-02-07 05:54:08'),(6,2,2,NULL,1,NULL,1,1,'1','2025-02-07 05:54:08','2025-02-07 05:54:08'),(7,2,3,NULL,1,NULL,1,1,'1','2025-02-07 05:54:08','2025-02-07 05:54:08'),(8,2,14,NULL,1,NULL,1,1,'1','2025-02-07 05:54:08','2025-02-07 05:54:08'),(9,2,4,NULL,1,NULL,1,1,'1','2025-02-07 05:54:08','2025-02-07 05:54:08'),(10,2,5,NULL,1,NULL,1,1,'1','2025-02-07 05:54:08','2025-02-07 05:54:08'),(11,2,9,NULL,1,NULL,1,1,'1','2025-02-07 05:54:08','2025-02-07 05:54:08'),(12,2,11,NULL,1,NULL,1,1,'1','2025-02-07 05:54:08','2025-02-07 05:54:08');
/*!40000 ALTER TABLE `user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `organization` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address_line_one` varchar(255) DEFAULT NULL,
  `address_line_two` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','One','admin1@gmail.com',NULL,'$2y$12$sJRKXqBveqDkxXCA1.WPkuB38omf8k4NtRgy4VKBNPFEAynElIJU.',1,'8707702713',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'1','2025-01-17 01:11:50','2025-01-17 01:11:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-17 13:15:45
