/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.20-11.8.9-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u927333385_cgmpv2Db
-- ------------------------------------------------------
-- Server version	11.8.9-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `announcements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'info',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `starts_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text_styles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`text_styles`)),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
INSERT INTO `announcements` VALUES
(1,'If you have respiratory symptoms such as cough, cold or flu, please wear a face mask while in the practice. Masks are available at reception.','info',1,NULL,NULL,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(2,'Diabetes affects around 1.3 million Australians. Ask your GP about a diabetes risk check at your next visit.','info',1,NULL,NULL,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL);
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,'Clinic Updates','clinic-updates','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(2,'Health Advice','health-advice','2026-09-03 11:40:48','2026-09-03 11:40:48');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `qualifications` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `years_experience` varchar(255) DEFAULT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `availability_days` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`availability_days`)),
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text_styles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`text_styles`)),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES
(1,'Dr Homayera Noor','Practice Principal','MBBS, DCH, FRACGP','doctors/IKfyvvQEZEa6XobNnpGi.jpg','Dr Homayera Noor is the Practice Principal at Cringila General Medical Practice, providing comprehensive general practice care to patients of all ages.','12+ yrs','English, Bengali','[\"mon\",\"wed\",\"thu\"]',1,1,'2026-09-03 11:40:48','2026-09-12 21:01:05','[]'),
(2,'Dr Muhammad Iqbal','General Practitioner','MBBS, Dip. Occup. Health & Safety (UOW), NSW Medical Acupuncture Course','doctors/n8J50upZdkQsLsQZkxU6.jpg','Dr Muhammad Iqbal is a General Practitioner at Cringila General Medical Practice with additional qualifications in occupational health and medical acupuncture.','15+ yrs','English, Urdu','[]',2,1,'2026-09-03 11:40:48','2026-09-12 20:54:40','[]'),
(3,'Dr Hamze Hamze','General Practitioner','',NULL,'Dr Hamze Hamze is a General Practitioner at Cringila General Medical Practice.','8+ yrs','English, Arabic',NULL,3,1,'2026-09-11 11:13:02','2026-09-12 18:00:48',NULL),
(4,'Dr Hasina Muttaqi','General Practitioner','',NULL,'Dr Hasina Muttaqi is a General Practitioner at Cringila General Medical Practice.','10+ yrs','English, Bengali, Hindi',NULL,4,1,'2026-09-11 11:13:02','2026-09-12 18:00:48',NULL);
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text_styles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`text_styles`)),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES
(1,'Do you offer bulk billing?','Billing varies by consultation type. Please ask our reception team about bulk billing and Medicare rebates when you book your appointment.',1,1,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(2,'How do I book an appointment?','Book online using the \"Book Appointment\" button, which links to our HealthEngine booking page, or call the practice directly. Walk-ins are also welcome.',2,1,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(3,'What should I bring to my first appointment?','Please bring your Medicare card, photo ID, a list of current medications, and any relevant referrals or test results.',3,1,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(4,'Do you speak languages other than English?','Please contact reception to check current language support and interpreter availability for your appointment.',4,1,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(5,'What happens if I need care after hours?','For non-emergency care outside our opening hours, you can contact the National Home Doctor Service on 13 SICK (13 74 25) or visit your nearest urgent care clinic. For a medical emergency, always call 000.',5,1,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(6,'Can I get a referral to a specialist?','Yes. Book a standard consultation with one of our GPs, who can assess your needs and provide a referral to a specialist if clinically appropriate.',6,1,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL);
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2026_09_01_215332_add_role_to_users_table',1),
(5,'2026_09_01_215332_create_categories_table',1),
(6,'2026_09_01_215333_create_tags_table',1),
(7,'2026_09_01_215334_create_posts_table',1),
(8,'2026_09_01_215334_z_create_post_tag_table',1),
(9,'2026_09_01_215335_create_services_table',1),
(10,'2026_09_01_215336_create_doctors_table',1),
(11,'2026_09_01_215336_create_testimonials_table',1),
(12,'2026_09_01_215337_create_announcements_table',1),
(13,'2026_09_01_215338_create_faqs_table',1),
(14,'2026_09_01_215338_create_pages_table',1),
(15,'2026_09_01_215339_create_sections_table',1),
(16,'2026_09_01_215340_create_contact_messages_table',1),
(17,'2026_09_01_215340_create_settings_table',1),
(18,'2026_09_01_215341_create_media_table',1),
(19,'2026_09_02_174645_add_experience_fields_to_doctors_table',1),
(20,'2026_09_11_181012_add_text_styles_columns',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text_styles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`text_styles`)),
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES
(1,'Fees & Information','fees-info','<p>We believe healthcare should be accessible and easy to understand. Please speak with our reception team about billing, Medicare rebates, and any out-of-pocket costs before your appointment.</p>',NULL,NULL,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(2,'Privacy Policy','privacy-policy','<p>Cringila General Medical Practice is committed to protecting your privacy in accordance with the Australian Privacy Principles. This page will be updated with our full privacy policy.</p>',NULL,NULL,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(3,'Terms of Use','terms','<p>This page will be updated with the full terms of use for this website.</p>',NULL,NULL,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_tag` (
  `post_id` bigint(20) unsigned NOT NULL,
  `tag_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`),
  KEY `post_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` bigint(20) unsigned DEFAULT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `body` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `featured_image_alt` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text_styles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`text_styles`)),
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_author_id_foreign` (`author_id`),
  KEY `posts_category_id_foreign` (`category_id`),
  CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES
(1,1,1,'Respiratory Symptoms? Please Wear a Mask When Visiting','respiratory-symptoms-mask-notice','To keep vulnerable patients safe, we kindly ask anyone with cough, cold or flu symptoms to wear a face mask while in the practice.','<div>If you are experiencing acute respiratory symptoms such as a cough, cold or flu, please wear a face mask while in the practice. Masks are available at reception.</div><div>This helps protect our vulnerable patients, including young children, elderly patients, and those with chronic health conditions.</div>','posts/GzfVjpku7jMqg9l33XH7.jpg','Doctor wearing a face mask and stethoscope','published','2026-08-25 15:44:00','Respiratory Symptoms? Please Wear a Mask When Visiting | Cringila General Medical Practice',NULL,'2026-09-03 11:40:48','2026-09-12 08:40:30','[]'),
(2,1,2,'Diabetes Awareness: Know Your Risk','diabetes-awareness-know-your-risk','Around 1.3 million Australians live with diabetes and many more don\'t know they\'re at risk. Here\'s what to watch for and when to get checked.','<p>Diabetes is one of the most common chronic conditions in Australia. Early diagnosis and management can significantly reduce the risk of complications.</p><p>Speak to your GP about a diabetes risk assessment, especially if you have a family history, are overweight, or are over 40.</p>','images/blog/blog-diabetes-awareness.jpg','Healthcare worker holding a blood glucose meter','published','2026-08-16 15:44:09',NULL,NULL,'2026-09-03 11:40:48','2026-09-03 15:44:09',NULL),
(3,1,1,'Same-Day Appointments & Walk-Ins: How Our Clinic Works','same-day-appointments-and-walk-ins','Open five days a week with same-day appointments and walk-ins welcome — here\'s how to be seen quickly at CGMP.','<div>Cringila General Medical Practice is open five days a week. We offer same-day appointments subject to availability, and walk-ins are always welcome.</div><div>For the fastest service, we recommend booking online via HealthEngine or calling ahead.</div>','posts/Iw2TcVicQVE0kaFI7a1B.jpg','Modern medical clinic reception area','published','2026-08-07 15:44:00','Same-Day Appointments & Walk-Ins: How Our Clinic Works | Cringila General Medical Practice',NULL,'2026-09-03 11:40:48','2026-09-12 08:41:03','[]'),
(4,1,1,'Now Booking Online via HealthEngine','now-booking-online-via-healthengine','You can now book your appointment with us anytime, day or night, through HealthEngine — no phone call required.','<div>We\'re making it easier than ever to see your GP. Appointments can now be booked online through HealthEngine directly from our website, any time of day.</div><div>Prefer to speak to someone? Reception is still happy to book over the phone during opening hours.</div>','posts/VkvZi4L9wYW5DomwUNOr.jpg','Healthcare professional using a smartphone and tablet','published','2026-08-30 15:44:00','Now Booking Online via HealthEngine | Cringila General Medical Practice',NULL,'2026-09-03 15:44:09','2026-09-12 08:39:32','[]'),
(5,1,2,'Flu Vaccination Season: What You Need to Know','flu-vaccination-season','Flu season is approaching — here\'s who should get vaccinated, when, and how to book your shot at CGMP.','<div>Annual flu vaccination is recommended for everyone aged six months and older, and is especially important for young children, pregnant women, people aged 65 and over, and those with chronic health conditions.</div><div>Book an appointment with your GP to get vaccinated before flu season peaks.</div>','posts/uCItbUhGnlZIEiMHK4ps.jpg','Doctor administering a vaccination','published','2026-09-01 15:44:00','Flu Vaccination Season: What You Need to Know | Cringila General Medical Practice',NULL,'2026-09-03 15:44:09','2026-09-12 21:08:26','[]');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sections_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES
(1,'hero','{\"heading\":\"Healthcare for Every Generation\",\"subheading\":\"Trusted, compassionate general practice in the heart of Cringila. Expert care for every member of your family \\u2014 from routine check-ups to complex health needs.\",\"badge_text\":\"Cringila General Medical Practice\",\"primary_button_text\":\"Book Appointment\",\"primary_button_link\":\"\\/book-appointment\",\"secondary_button_text\":\"View All Services\",\"secondary_button_link\":\"\\/services\",\"image\":\"sections\\/s3dbeXYNiOBDgZiMjfBC.jpg\",\"styles\":[]}','2026-09-03 11:40:48','2026-09-12 20:49:02'),
(2,'about','{\"heading\":\"Caring for Cringila Since 2026\",\"subheading\":\"We are a passionate team of GPs dedicated to providing exceptional healthcare to our community.\",\"body\":\"<div>Our experienced team offers comprehensive general practice care for individuals and families at every stage of life. We are open five days a week, with same-day appointments available and walk-ins welcome.<\\/div><div>Our GPs specialise in mental health, men\'s and women\'s health, and chronic disease management.<\\/div>\",\"points\":[\"Open five days a week\",\"Same-day appointments available\",\"Walk-ins welcome\"],\"stats\":[{\"value\":2,\"suffix\":\"\",\"label\":\"GPs\"},{\"value\":5,\"suffix\":\"\",\"label\":\"Days a week\"}],\"image\":\"sections\\/JpZKxPjmdTAipD12zcsX.jpg\",\"styles\":[]}','2026-09-03 11:40:48','2026-09-12 08:06:10'),
(3,'booking_strip','{\"heading\":\"Ready to see a doctor?\",\"text\":\"Book online in minutes with HealthEngine, call the practice, or simply walk in.\",\"button_text\":\"Book online with HealthEngine\"}','2026-09-03 11:40:48','2026-09-03 11:40:48');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text_styles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`text_styles`)),
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES
(1,'General Practice','general-practice','stethoscope',NULL,'Complete healthcare for all ages, from check-ups to acute care, with same-day appointments available.','Our GPs provide comprehensive care for every stage of life — routine check-ups, acute illness, vaccinations and referrals. Same-day appointments are available and walk-ins are welcome.',1,1,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(2,'Mental Health Care','mental-health-care','brain',NULL,'Supportive GP mental health care, mental health care plans and referrals to allied psychological services.','We provide compassionate mental health support, including Mental Health Care Plans and referrals to psychologists and allied health professionals.',2,1,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(3,'Men\'s Health','mens-health','user-round',NULL,'Health checks, preventive screening and management of conditions affecting men at every age.','Confidential, judgement-free care covering preventive health checks, chronic condition management, and men\'s health screening.',3,1,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(4,'Women\'s Health','womens-health','heart-pulse',NULL,'Cervical screening, contraception, antenatal shared care, menopause support and more.','Comprehensive women\'s health services including cervical screening, contraception advice, antenatal shared care, and menopause management.',4,1,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(5,'Chronic Disease Management','chronic-disease-management','activity',NULL,'GP Management Plans and Team Care Arrangements for diabetes, asthma, heart disease and other ongoing conditions.','We help patients manage chronic conditions with structured GP Management Plans, Team Care Arrangements, and regular reviews.',5,1,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL),
(6,'Diabetes Care','diabetes-care','activity',NULL,'Diagnosis, monitoring, medication reviews and lifestyle support for type 1 and type 2 diabetes.','Ongoing diabetes care including diagnosis, blood glucose monitoring, medication reviews, and lifestyle and dietary support.',6,1,'2026-09-03 11:40:48','2026-09-03 11:40:48',NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
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

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES
('1Kd1azSY56eOMjUrT6HN1fXOX4hAZV9rPjo8QE1C',NULL,'147.182.230.196','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoianpoOEpBR3NxbmJVZnlOR2lodmpGcnRqRUxER1lvb2dCWnhmbkxPYyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjM6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9zZXJ2aWNlcy9jaHJvbmljLWRpc2Vhc2UtbWFuYWdlbWVudCI7czo1OiJyb3V0ZSI7czoxMzoic2VydmljZXMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1789560049),
('2dtVRwaMFXxu8t4iFaibnTOOACI6fQMoGkTcL0dl',NULL,'137.184.237.234','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUlpUazdkajhFa1F6aXR5cXc4U2xnTEJ6ZnBvc1FIdGJRcFZOYmRUSiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9kb2N0b3JzIjtzOjU6InJvdXRlIjtzOjc6ImRvY3RvcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1789559286),
('3CN4AIxd1Fcb1eVZsksMK7VkgXgosZuqdeELohfx',1,'103.159.72.99','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36 Edg/153.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZEUxVE1pOHBLenp5VlNHVVRrODcwQVlMUjNyV0xwYnhxc05LblRxWiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9jZ21wdjIudW5pcGV4ZWwub3JnL2NvbnRhY3QiO3M6NToicm91dGUiO3M6NzoiY29udGFjdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1789495487),
('62ThD4wbYItT0FOB9wjjzkW2uGNEWmsrnpo8vlh5',1,'103.159.72.79','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36 Edg/153.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0RRZGhpWVlJYnd0UnJyZzNiMGx0SnZST3A1aGtBZVNRUHhKMnNiSCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZyI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1789624511),
('6pnBOKhcx6sTq7ERMmB7Fz4Xa3TjVqyqezwa1ktC',NULL,'143.198.237.74','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoid2UzWDJsTEw3VEMxUTdrREJpNXp6ME5nOFBzOGdiWGxlSVluS1RXMiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9wcml2YWN5LXBvbGljeSI7czo1OiJyb3V0ZSI7czoxMzoicGFnZXMucHJpdmFjeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1789559172),
('7UF1eBIH3nTkLKfp9dzcAUkoHv1TyKs7ZedH1HeD',NULL,'147.182.200.2','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2NudXVmVVY2NjRnNE95WGs1aFR3RDBZQ0lGSTkxTEVDeVNFd2Y0VSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9zZXJ2aWNlcyI7czo1OiJyb3V0ZSI7czoxNDoic2VydmljZXMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1789559631),
('bDK3b4FesD72HiOwseTtYZaldIhSkwoRjKosKVV5',NULL,'64.23.202.241','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTllWUm1LQzQwOEdiVzEzRUhjMlVNcm9uSHlVQnRGR2xSM2dIcWJkMiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9zZXJ2aWNlcy93b21lbnMtaGVhbHRoIjtzOjU6InJvdXRlIjtzOjEzOiJzZXJ2aWNlcy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1789564270),
('gLxld9hwlo9OXcBl4z7b2gewrM4RkhMhUWIXJCmX',NULL,'143.110.150.162','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidTh3Z2p0UnFJQ2JPcFoxMmNmWGNDS3Fmb0FtemJMM2lROEN5OFg1YiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZyI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1789544520),
('gnZlp50qxEd5gcHgACCzNXaUHBC42BOa5swXoU9D',NULL,'164.92.65.128','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVpYN3lDU3FYNHJRN2NBMkt0WmtRb0h3WmkzSEZrTUhCYXYyYXk0cyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9zZXJ2aWNlcy9nZW5lcmFsLXByYWN0aWNlIjtzOjU6InJvdXRlIjtzOjEzOiJzZXJ2aWNlcy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1789559151),
('gVeuikCoA4oS4HbYbTelce0ATmYgpjMZdsk65xWY',NULL,'103.159.72.72','NetworkingExtension/8623.2.7.10.4 Network/5569.82.5 iOS/26.3','YTozOntzOjY6Il90b2tlbiI7czo0MDoidFZ6YXZqNVFZa0Z0dGV5a2V3QTc5OUFHWFp0VXlDMjIyM0xvUmFhcyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9hcHBsZS10b3VjaC1pY29uLnBuZyI7czo1OiJyb3V0ZSI7czoxMDoicGFnZXMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1789543348),
('gxwLhS1xdomkHXdGLM4KFPQPJX8z295e9YmtdXh5',NULL,'103.159.72.72','NetworkingExtension/8623.2.7.10.4 Network/5569.82.5 iOS/26.3','YTozOntzOjY6Il90b2tlbiI7czo0MDoidDBrV0RTS2dsb3NEVUNQTk9QS2k2Y3JadVVVZHFlRXJuZnZrS2Y1RSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjA6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9hcHBsZS10b3VjaC1pY29uLXByZWNvbXBvc2VkLnBuZyI7czo1OiJyb3V0ZSI7czoxMDoicGFnZXMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1789543375),
('kANdsSN7veGeUwVMgA2kfMrf0RDMBGx9WtKbQRLj',NULL,'137.184.113.82','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieWhwNW94cjRIa3dPOVVoeWlxbUduQzhhQUxLSzdtbWYxRVFDalJ1YSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9zZXJ2aWNlcy9tZW5zLWhlYWx0aCI7czo1OiJyb3V0ZSI7czoxMzoic2VydmljZXMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1789563369),
('L8VEUH9fYwqat2cN3SX3WCAX6Tv9n7G0y2IVjlOb',NULL,'165.232.150.51','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0t5eXN1dnI3U2NhdU5hTE9YcGk1d0lJa3JKZ2JydzUyVlVZSklUMiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9ibG9nIjtzOjU6InJvdXRlIjtzOjEwOiJibG9nLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1789564000),
('mm8MOdhiiCMUC5mmBxrN14rW6Ej7O05Sc7bRjnTE',NULL,'143.198.52.111','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGtCa1UzaUVMejAyNUFERnFJN1hYODluRDRINWxoTE1BY20zQ09zRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy90ZXJtcyI7czo1OiJyb3V0ZSI7czoxMToicGFnZXMudGVybXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1789562144),
('nKKwtEtseHFtPc8I2jw5I3mC4vuzqrDH302lad5y',NULL,'146.190.61.63','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2oxTmN5RXBIQ3FHZTA5OVBFU2REbExaQlc0ZTNsRFVGQ0doQ2NVdCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9zZXJ2aWNlcy9kaWFiZXRlcy1jYXJlIjtzOjU6InJvdXRlIjtzOjEzOiJzZXJ2aWNlcy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1789560196),
('NRl2hwudTwbR3JEUc4vtBVo0EVUZRs3YZ6vlT1QZ',NULL,'103.159.72.72','NetworkingExtension/8623.2.7.10.4 Network/5569.82.5 iOS/26.3','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWhQazM5MFpGRkY2V1l0MmVPMGZVdU1LQmJxaWJVd2dzZVhTUHE4YyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjA6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9hcHBsZS10b3VjaC1pY29uLXByZWNvbXBvc2VkLnBuZyI7czo1OiJyb3V0ZSI7czoxMDoicGFnZXMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1789543385),
('O2nFEpZlcHbfnvFtmRoQ9sHpapvkB8O7ZesvCl3v',NULL,'64.23.138.200','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiakZLeTRhQVIzZGNVSlJyMTVuUElhSm1BaVdCWTJMcDR6UVZROWVMWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZyI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1789561897),
('OdJUJzaOCNKUbGEJN3I0lQFEKkDpkxeSg92dpF5q',NULL,'103.159.72.72','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/601.2.4 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.4 facebookexternalhit/1.1 Facebot Twitterbot/1.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDl5clB3S1dLRDBhU2dnYU9XMlBQWGU2ejhyUEM3T0E1UGNzVVIzZyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZyI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1789543385),
('PhsfKcwTGwUM2iKtVdlrmNgBTwjbysQNF83KOt9H',NULL,'64.23.148.246','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidjJiTHNDb3U3MEttU2NOb0pZWEg5RkpIWHhkWHhMZDFkMXFQUGRBUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9mYXEiO3M6NToicm91dGUiO3M6MzoiZmFxIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1789563857),
('RkTkAGVAm1gQKrfwKBxnGNc3V5mVpMEtlDKnBTN0',NULL,'137.184.125.7','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUtGN3ZQRXRrc29Ya1k4WFVUcVEwdEdVMm5sMXN3d0ExaVB4RVpJWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9zZXJ2aWNlcy9tZW50YWwtaGVhbHRoLWNhcmUiO3M6NToicm91dGUiO3M6MTM6InNlcnZpY2VzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1789561414),
('uEg1Y8Ix3m4G8K3OYYFkIAnFLC1XACPpEaqHfhXZ',NULL,'146.190.128.187','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTFrUjJReDRoTWZSRkNoS1VjWWY0UzFrRmRLaHBweFc4WUlFemE1MCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9jb250YWN0IjtzOjU6InJvdXRlIjtzOjc6ImNvbnRhY3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1789562314),
('Xo7aaU0bI0kJcvxD2CXhNJNy5ikzNZaivOYaKt0H',NULL,'144.126.218.188','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNkpjV1owUTBkTFRhbkFTMGxKVkNWV3FNUU9NWEhWdHhhaGFGNEdZbSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9lbWVyZ2VuY3kiO3M6NToicm91dGUiO3M6OToiZW1lcmdlbmN5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1789561991),
('XP6vDgwxZCFxJRdQ2EQJDA2GWK723lMMZVFVgBvb',NULL,'64.23.147.162','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoibnJlS0hOZG1CSlBLZXgxS0d4QmJ0V2FUNGdwMXhkOHJuTlJRM2wxdiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZy9hYm91dCI7czo1OiJyb3V0ZSI7czo1OiJhYm91dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1789559439),
('YtNAn4dhcGHvKIBNt3V8kPNBZ1SQQlCb0JWXOO7C',NULL,'24.144.80.124','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Edge/120.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFJYMGp4ZGJZZURXbWI1OTlpbzkzRndROVBMMUtmZVJLb1VtMmdDTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZyI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1789525425),
('ZW2ThbNfUL41TQFFwjFGkHfnNXoASwuHQwVknEyC',NULL,'2a02:4780:a:c0de::2','Go-http-client/2.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoibFVQVzVvMVNMenkyRUd3VGtOd1NQdVcycXpxME1KWlJQUFRva0tQNCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vY2dtcHYyLnVuaXBleGVsLm9yZyI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1789526534);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES
(1,'clinic_name','Cringila General Medical Practice','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(2,'tagline','Healthcare for Every Generation','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(3,'address_line1','23 Lake Avenue','2026-09-03 11:40:48','2026-09-11 11:13:02'),
(4,'address_suburb','Cringila NSW 2502','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(5,'phone','(02) 0000 0000','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(6,'contact_email','reception@cgmp.com.au','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(7,'fax','','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(8,'opening_hours','Monday - Friday: 9:00am - 5:00pm\nSaturday: Closed\nSunday & public holidays: Closed','2026-09-03 11:40:48','2026-09-11 11:13:02'),
(9,'emergency_note','In a medical emergency, call 000 immediately.','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(10,'healthengine_url','https://healthengine.com.au/medical-centre/nsw/cringila/cringila-general-medical-practice/s98588','2026-09-03 11:40:48','2026-09-11 11:13:02'),
(11,'facebook_url','','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(12,'instagram_url','','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(13,'google_map_embed','','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(14,'footer_text','Cringila General Medical Practice provides comprehensive primary care to individuals and families in Cringila and the surrounding Illawarra communities.','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(15,'copyright_text','','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(16,'analytics_code','','2026-09-03 11:40:48','2026-09-03 11:40:48'),
(17,'healthengine_id','98588','2026-09-11 11:30:48','2026-09-11 11:30:48');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `context` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `rating` tinyint(3) unsigned NOT NULL DEFAULT 5,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text_styles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`text_styles`)),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'CGMP Admin','admin@cgmp.au','admin',NULL,'$2y$12$yyRXtc/oG8ueoIRL5R0A0.op.Tlm6hGZZGzvH82SUALv4i09oxE52','LfQBHk4wUU79pIiHCrEhvQY5SjwzdODHnJ5s6APGOIKKOo4mUkxYPxSsV3E2','2026-09-03 11:40:48','2026-09-17 06:17:58');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-09-17  6:26:22
