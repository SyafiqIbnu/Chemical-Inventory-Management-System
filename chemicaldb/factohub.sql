/*
SQLyog Community v12.3.3 (64 bit)
MySQL - 8.0.18 : Database - factohub
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `factohub`;

/*Table structure for table `account_application_statuses` */

DROP TABLE IF EXISTS `account_application_statuses`;

CREATE TABLE `account_application_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `name` varchar(255) DEFAULT NULL COMMENT 'Nama Status Permohonan Akaun',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `created_by` varchar(255) DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `updated_by` varchar(255) DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Status Permohonan Akaun';

/*Data for the table `account_application_statuses` */

insert  into `account_application_statuses`(`id`,`name`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 

(1,'Pending',NULL,NULL,NULL,NULL),

(2,'Approved',NULL,NULL,NULL,NULL),

(3,'Rejected',NULL,NULL,NULL,NULL);

/*Table structure for table `account_applications` */

DROP TABLE IF EXISTS `account_applications`;

CREATE TABLE `account_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `name` varchar(255) DEFAULT NULL COMMENT 'Nama Pemohon',
  `account_type_id` int(11) NOT NULL DEFAULT '1' COMMENT 'Jenis Akaun',
  `registration_no` varchar(45) DEFAULT NULL COMMENT 'Company Registration No',
  `phone_no` varchar(12) DEFAULT NULL COMMENT 'No Telefon',
  `mobile_no` varchar(12) DEFAULT NULL COMMENT 'No Telefon Bimbit',
  `fax_no` varchar(12) DEFAULT NULL COMMENT 'No fax',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email',
  `subsidy_no` varchar(80) DEFAULT NULL COMMENT 'No Subsidi',
  `address1` varchar(255) DEFAULT NULL COMMENT 'Alamat 1',
  `address2` varchar(255) DEFAULT NULL COMMENT 'Alamat 2',
  `postcode` varchar(5) DEFAULT NULL COMMENT 'Poskod',
  `city_id` int(11) DEFAULT NULL COMMENT 'Bandar',
  `state_id` int(11) DEFAULT NULL COMMENT 'Negeri',
  `activity` varchar(255) DEFAULT NULL COMMENT 'Aktiviti',
  `remark` varchar(255) DEFAULT NULL COMMENT 'kenyataan',
  `branch_id` int(11) DEFAULT NULL COMMENT 'Cawangan',
  `block_flag` int(11) DEFAULT '0' COMMENT 'Status Sekatan',
  `fc_quota_basic` int(11) DEFAULT NULL COMMENT 'Kuota Asas Fleetcard',
  `fc_quota_additional` int(11) DEFAULT NULL COMMENT 'Kuota Tambahan Fleetcard',
  `notes` text COMMENT 'Nota',
  `account_application_status_id` int(11) DEFAULT NULL COMMENT 'Status Permohonan',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `created_by` varchar(255) DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `updated_by` varchar(255) DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`),
  KEY `account_types` (`account_type_id`),
  KEY `account_application_status` (`account_application_status_id`),
  KEY `account_applications_to_branches_fk` (`branch_id`),
  KEY `account_applications_to_cities_fk` (`city_id`),
  KEY `account_applications_to_states_fk` (`state_id`),
  CONSTRAINT `account_applications_to_account_application_status_fk` FOREIGN KEY (`account_application_status_id`) REFERENCES `account_application_statuses` (`id`),
  CONSTRAINT `account_applications_to_account_types_fk` FOREIGN KEY (`account_type_id`) REFERENCES `account_types` (`id`),
  CONSTRAINT `account_applications_to_branches_fk` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `account_applications_to_cities_fk` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  CONSTRAINT `account_applications_to_states_fk` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Permohonan Akaun';

/*Data for the table `account_applications` */

/*Table structure for table `account_contacts` */

DROP TABLE IF EXISTS `account_contacts`;

CREATE TABLE `account_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `account_holder_id` int(11) NOT NULL COMMENT 'Id Akauan Pengguna',
  `name` varchar(255) NOT NULL COMMENT 'Nama',
  `mykad` varchar(255) NOT NULL COMMENT 'MyKad',
  `phone` varchar(255) NOT NULL COMMENT 'Telefon',
  `email` varchar(255) NOT NULL COMMENT 'Email',
  `active` int(11) NOT NULL DEFAULT '1' COMMENT 'Status Aktif',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `created_by` varchar(255) DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `updated_by` varchar(255) DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`),
  KEY `account_contacts_to_account_holders_fk` (`account_holder_id`),
  KEY `account_contacts_to_reg_actives_fk` (`active`),
  CONSTRAINT `account_contacts_to_account_holders_fk` FOREIGN KEY (`account_holder_id`) REFERENCES `account_holders` (`id`),
  CONSTRAINT `account_contacts_to_reg_actives_fk` FOREIGN KEY (`active`) REFERENCES `reg_actives` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Pegawai Dihubungi Akaun';

/*Data for the table `account_contacts` */

/*Table structure for table `account_holders` */

DROP TABLE IF EXISTS `account_holders`;

CREATE TABLE `account_holders` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Nama Syarikat / Individu',
  `company_name` varbinary(255) DEFAULT NULL,
  `is_company` int(11) NOT NULL DEFAULT '1',
  `account_type_id` int(11) NOT NULL DEFAULT '1' COMMENT 'Jenis Akaun',
  `registration_no` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'No Pendaftaran Syarikat',
  `pbt_no` varchar(45) DEFAULT NULL,
  `icno` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_no` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'No Telefon',
  `mobile_no` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'No Telefon Bimbit',
  `fax_no` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'No Fax',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Email',
  `subsidy_no` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'No Subsidi',
  `address1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Alamat 1',
  `address2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Alamat 2',
  `postcode` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Poskod',
  `city_id` int(11) DEFAULT NULL COMMENT 'Id Bandar',
  `state_id` int(11) DEFAULT NULL COMMENT 'Id Negeri',
  `active` int(11) NOT NULL DEFAULT '0' COMMENT 'Status active',
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Kenyataan',
  `block_flag` int(11) DEFAULT '0' COMMENT 'Bendera Sekatan',
  `isPbt` int(1) DEFAULT '0',
  `fc_quota_basic` int(11) DEFAULT NULL COMMENT 'Kuota Asas Fleetcard',
  `fc_quota_additional` int(11) DEFAULT NULL COMMENT 'Kuota Tambahan Fleetcard',
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT 'Nota',
  `isVerify` int(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `created_by` varchar(255) DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `updated_by` varchar(255) DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Pemegang Akaun';

/*Data for the table `account_holders` */

/*Table structure for table `account_holders_share_holders` */

DROP TABLE IF EXISTS `account_holders_share_holders`;

CREATE TABLE `account_holders_share_holders` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `account_holder_id` int(11) DEFAULT NULL COMMENT 'Id Syarikat',
  `volume` float DEFAULT NULL COMMENT 'Jumlah Pegangan Saham',
  `name` varchar(255) DEFAULT NULL COMMENT 'Nama Pemegang Saham',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `created_by` varchar(255) DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `updated_by` varchar(255) DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`),
  KEY `account_holders_share_holders_to_account_holders_fk` (`account_holder_id`),
  CONSTRAINT `account_holders_share_holders_to_account_holders_fk` FOREIGN KEY (`account_holder_id`) REFERENCES `account_holders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Pemegang saham pemegang akaun';

/*Data for the table `account_holders_share_holders` */

/*Table structure for table `account_types` */

DROP TABLE IF EXISTS `account_types`;

CREATE TABLE `account_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `name` varchar(255) DEFAULT NULL COMMENT 'Nama Jenis Akauan',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `created_by` varchar(255) DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `updated_by` varchar(255) DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Jenis Akaun';

/*Data for the table `account_types` */

insert  into `account_types`(`id`,`name`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 

(1,'COMPANY',NULL,NULL,NULL,NULL),

(2,'INDIVIDUAL',NULL,NULL,NULL,NULL);

/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tajuk',
  `content` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Kandungan',
  `active` int(11) NOT NULL DEFAULT '1' COMMENT 'Status Aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Tarikh Cipta',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Pengumuman';

/*Data for the table `announcements` */

insert  into `announcements`(`id`,`title`,`content`,`active`,`created_at`,`updated_at`,`created_by`,`updated_by`) values 

(1,'Welcome to CARGO OPTIMIZER SYSTEM!','Cargo bookings made easier.',1,'2021-06-27 09:02:29','2020-03-19 18:58:03','1','1');

/*Table structure for table `applications` */

DROP TABLE IF EXISTS `applications`;

CREATE TABLE `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `applications` */

insert  into `applications`(`id`,`name`,`code`,`icon`,`key`,`target_url`,`active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 

(1,'E-LEARNING','moodle','images/online-learning.png','HBvGB5LC?kN`]n@BL%bd?Kb9$]f+Nd`v','http://myopensoft.ddns.net/moodle/sso_public.php',1,NULL,NULL,'2020-03-18 14:51:52','1'),

(2,'KELUARGA BAHAGIA','kb','images/kb.png','HBvGB5LC?kN`]n@BL%bd?Kb9$]f+Nd`v','http://myopensoft.ddns.net:8061/keluargabahagia/sso_public.php',1,NULL,NULL,'2020-03-18 14:51:34','1'),

(7,'MAMOGRAM','mamogram','images/mamogram.jpg','HBvGB5LC?kN`]n@BL%bd?Kb9$]f+Nd`v','http://localhost/mokatsv1',1,'2020-03-18 14:40:48','1','2020-03-20 01:23:16','1'),

(8,'FAMILY HUB','familyhub','images/family_hub.png','#','#',1,'2020-03-18 14:51:02','1','2020-03-18 14:51:02',NULL),

(9,'VAKSINASI HPV','hpv','images/hpv.png','#','#',1,'2020-03-18 14:53:26','1','2020-03-19 18:29:57','2');

/*Table structure for table `booking_applications` */

DROP TABLE IF EXISTS `booking_applications`;

CREATE TABLE `booking_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `account_holder_id` int(11) DEFAULT NULL,
  `origin` varchar(254) DEFAULT NULL,
  `destination` varchar(254) DEFAULT NULL,
  `distance` decimal(7,2) DEFAULT NULL,
  `durationHrs` decimal(7,2) DEFAULT NULL,
  `durationMins` decimal(7,2) DEFAULT NULL,
  `quantity` int(7) DEFAULT NULL,
  `numVehicles` text,
  `costEachVehicles` text,
  `overallCostByType` decimal(7,2) DEFAULT NULL,
  `overallCost` decimal(7,2) DEFAULT NULL,
  `isConfirmed` int(1) DEFAULT '0',
  `confirmed_at` datetime DEFAULT NULL,
  `confirmed_id` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `booking_applications` */

insert  into `booking_applications`(`id`,`user_id`,`account_holder_id`,`origin`,`destination`,`distance`,`durationHrs`,`durationMins`,`quantity`,`numVehicles`,`costEachVehicles`,`overallCostByType`,`overallCost`,`isConfirmed`,`confirmed_at`,`confirmed_id`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 

(1,45,NULL,'port klang','johor port',300.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'2021-08-21 22:49:03',45,'2021-08-21 22:49:03',NULL),

(2,45,NULL,'johor port','gombak',450.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'2021-08-22 09:19:17',45,'2021-08-22 09:19:17',NULL),

(3,45,NULL,'A','B',100.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-11-06 21:54:00',NULL,'2021-08-22 10:11:22',45,'2021-11-06 21:54:00',NULL),

(4,45,NULL,'A','B',300.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'2021-09-05 10:11:57',45,'2021-09-05 10:11:57',NULL),

(5,45,NULL,'ABC','XYZ',300.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'2021-10-24 10:20:23',45,'2021-10-24 10:20:23',NULL);

/*Table structure for table `booking_cargos` */

DROP TABLE IF EXISTS `booking_cargos`;

CREATE TABLE `booking_cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_application_id` int(11) DEFAULT NULL,
  `cargo_type` int(2) DEFAULT NULL,
  `weight` decimal(7,2) DEFAULT NULL,
  `length` decimal(7,2) DEFAULT NULL,
  `width` decimal(7,2) DEFAULT NULL,
  `height` decimal(7,2) DEFAULT NULL,
  `radius` decimal(7,2) DEFAULT NULL,
  `diameter` decimal(7,2) DEFAULT NULL,
  `unit` int(7) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `booking_cargos` */

insert  into `booking_cargos`(`id`,`booking_application_id`,`cargo_type`,`weight`,`length`,`width`,`height`,`radius`,`diameter`,`unit`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 

(1,1,1,500.00,100.00,100.00,100.00,100.00,100.00,3,'2021-08-22 00:33:37',45,'2021-08-22 00:33:37',NULL),

(2,1,1,500.00,100.00,100.00,100.00,100.00,150.00,5,'2021-08-22 00:37:45',45,'2021-08-22 00:37:45',NULL),

(3,1,1,500.00,100.00,100.00,100.00,100.00,200.00,5,'2021-08-22 00:39:56',45,'2021-08-22 00:39:56',NULL),

(4,2,1,500.00,100.00,100.00,100.00,100.00,100.00,5,'2021-08-22 09:19:35',45,'2021-08-22 09:19:35',NULL),

(5,3,1,500.00,100.00,100.00,100.00,100.00,100.00,5,'2021-08-22 10:12:13',45,'2021-08-22 10:12:13',NULL),

(6,3,1,500.00,100.00,100.00,100.00,100.00,100.00,5,'2021-08-22 10:21:29',45,'2021-08-22 10:21:29',NULL),

(7,3,1,45.00,100.00,100.00,200.00,NULL,NULL,3,'2021-09-18 22:56:22',45,'2021-09-18 22:56:22',NULL),

(8,3,2,45.00,NULL,NULL,200.00,300.00,300.00,3,'2021-09-18 22:59:41',45,'2021-09-18 22:59:41',NULL),

(9,3,2,100.00,NULL,NULL,100.00,150.00,300.00,5,'2021-09-19 10:17:19',45,'2021-09-19 10:17:19',NULL),

(10,5,1,45.00,100.00,100.00,200.00,NULL,NULL,3,'2021-10-24 10:20:35',45,'2021-10-24 10:20:35',NULL),

(11,5,1,3.00,100.00,100.00,200.00,NULL,NULL,5,'2021-10-24 10:26:13',45,'2021-10-24 10:26:13',NULL),

(12,4,1,45.00,100.00,100.00,200.00,NULL,NULL,3,'2021-11-07 10:02:53',45,'2021-11-07 10:02:53',NULL);

/*Table structure for table `booking_vehicles` */

DROP TABLE IF EXISTS `booking_vehicles`;

CREATE TABLE `booking_vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `booking_application_id` int(11) DEFAULT NULL,
  `vehicle_type_id` int(3) DEFAULT NULL,
  `quantity` int(5) DEFAULT '0',
  `cost` decimal(7,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `booking_vehicles` */

insert  into `booking_vehicles`(`id`,`booking_id`,`booking_application_id`,`vehicle_type_id`,`quantity`,`cost`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 

(1,NULL,3,1,0,0.00,'2021-11-06 20:56:51',NULL,'2021-11-06 20:56:51',NULL),

(2,NULL,3,2,0,0.00,'2021-11-06 20:56:51',NULL,'2021-11-06 20:56:51',NULL),

(3,NULL,3,3,0,0.00,'2021-11-06 20:56:51',NULL,'2021-11-06 20:56:51',NULL),

(4,NULL,3,4,0,0.00,'2021-11-06 20:56:51',NULL,'2021-11-06 20:56:51',NULL),

(5,NULL,3,5,0,0.00,'2021-11-06 20:56:51',NULL,'2021-11-06 20:56:51',NULL),

(6,NULL,3,6,0,0.00,'2021-11-06 20:56:51',NULL,'2021-11-06 20:56:51',NULL);

/*Table structure for table `bookings` */

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `booking_application_id` int(11) DEFAULT NULL,
  `vehicle_type_id` int(3) DEFAULT NULL,
  `numVehicles` int(5) DEFAULT NULL,
  `costRateVehicles` decimal(7,2) DEFAULT NULL,
  `overallCostByType` decimal(7,2) DEFAULT NULL,
  `overallCost` decimal(7,2) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `bookings` */

insert  into `bookings`(`id`,`user_id`,`booking_application_id`,`vehicle_type_id`,`numVehicles`,`costRateVehicles`,`overallCostByType`,`overallCost`,`delivery_date`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 

(1,45,3,2,0,0.00,NULL,NULL,'2022-01-20','2021-11-06 21:50:09',NULL,'2021-11-27 23:17:29',45);

/*Table structure for table `cargo_settings` */

DROP TABLE IF EXISTS `cargo_settings`;

CREATE TABLE `cargo_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `cargo_settings` */

/*Table structure for table `cargo_types` */

DROP TABLE IF EXISTS `cargo_types`;

CREATE TABLE `cargo_types` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `cargo_types` */

insert  into `cargo_types`(`id`,`name`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 

(1,'Box/Cube',NULL,NULL,NULL,NULL),

(2,'Cylinder',NULL,NULL,NULL,NULL);

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `name` varchar(255) DEFAULT NULL COMMENT 'Nama Bandar',
  `state_id` int(11) DEFAULT NULL COMMENT 'Id Negeri',
  `isactive` int(11) NOT NULL DEFAULT '1' COMMENT 'Status Aktif',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `created_by` varchar(255) DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `updated_by` varchar(255) DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`),
  KEY `cities_to_states_fk` (`state_id`),
  KEY `cities_to_reg_actives_fk` (`isactive`),
  CONSTRAINT `cities_to_reg_actives_fk` FOREIGN KEY (`isactive`) REFERENCES `reg_actives` (`id`),
  CONSTRAINT `cities_to_states_fk` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Bandar';

/*Data for the table `cities` */

/*Table structure for table `districts` */

DROP TABLE IF EXISTS `districts`;

CREATE TABLE `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `code` varchar(30) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'Nama Daerah',
  `state_id` int(11) DEFAULT NULL COMMENT 'Id Negeri',
  `isactive` int(11) NOT NULL DEFAULT '1' COMMENT 'Status Aktif',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `created_by` varchar(255) DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `updated_by` varchar(255) DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`),
  KEY `districts_to_states_fk` (`state_id`),
  KEY `districts_to_reg_actives_fk` (`isactive`),
  CONSTRAINT `districts_to_states_fk` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=553 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Daerah';

/*Data for the table `districts` */

insert  into `districts`(`id`,`code`,`name`,`state_id`,`isactive`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 

(1,'1015','TANJUNG MALIM',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(2,'1027','IPOH',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(3,'1038','BOTA',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(4,'1040','TANJUNG PIANDANG',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(5,'1047','TELUK INTAN',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(6,'1063','SLIM RIVER',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(7,'1071','GERIK',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(8,'1075','LENGGONG',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(9,'1076','PANTAI REMIS',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(10,'1078','BAGAN SERAI',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(11,'1101','TRONOH',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(12,'1142','BATU GAJAH',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(13,'1151','SEMANGGOL',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(14,'1165','MALIM NAWAR',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(15,'1166','SRI MANJONG ',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(16,'1180','KAMPAR',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(17,'1189','PARIT BUNTAR',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(18,'1202','KUALA KANGSAR',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(19,'1205','BATU KURAU',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(20,'1225','JELAPANG',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(21,'1240','KAMPUNG GAJAH',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(22,'1245','TAPAH',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(23,'1247','CHANGKAT JERING',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(24,'1252','TAIPING',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(25,'1259','ULU KINTA',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(26,'1267','PENGKALAN HULU',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(27,'1270','SUNGKAI PERAK ',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(28,'1280','BAGAN DATOK',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(29,'1290','PADANG RENGAS',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(30,'1301','CHEMOR',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(31,'1308','SUNGAI SIPUT ',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(32,'1320','SIMPANG PULAI',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(33,'1322','SETIAWAN',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(34,'1336','SUNGAI SUMUN',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(35,'1342','KUALA KURAU',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(36,'1365','SIMPANG EMPAT',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(37,'1368','BRUAS',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(38,'1381','SELEKOH',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(39,'1391','LUMUT',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(40,'1397','TEMOH',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(41,'1401','RANTAU PANJANG',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(42,'1406','BEDONG',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(43,'1423','KANGAR',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(44,'1429','AYER TAWAR',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(45,'1431','MENGLEMBU',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(46,'1435','KAMUNTING',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(47,'1452','HUTAN MELINTANG',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(48,'1473','BIDOR',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(49,'1475','KAMPUNG KEPAYANG',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(50,'1487','SUNGKAI',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(51,'1489','LAHAT',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(52,'1520','PANGKOR',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(53,'1542','MANJUNG',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(54,'1544','MANJOI',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(55,'1612','PARIT',1,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(56,'2','KAJANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(57,'5','BANDAR BARU BANGI',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(58,'6','SERI KEMBANGAN',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(59,'7','KUALA LUMPUR',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(60,'88','HULU LANGAT',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(61,'90','BERANANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(62,'93','KAPAR',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(63,'97','PETALING JAYA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(64,'121','BANTING',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(65,'1004','SHAH ALAM ',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(66,'1011','SELAYANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(67,'1018','GOMBAK',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(68,'1031','AMPANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(69,'1046','KLANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(70,'1050','SUBANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(71,'1051','SUNGAI BULOH',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(72,'1067','KEPONG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(73,'1074','CHERAS',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(74,'1080','BANGI',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(75,'1087','BATU CAVES',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(76,'1090','SUBANG JAYA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(77,'1103','SUNGAI BESAR',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(78,'1106','BATANG BERJUNTAI',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(79,'1110','BUKIT ROTAN',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(80,'1127','KERLING',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(81,'1138','KUALA KUBU BHARU',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(82,'1143','HULU KELANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(83,'1154','SEPANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(84,'1161','SEMENYIH',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(85,'1168','PUCHONG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(86,'1171','RAWANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(87,'1177','KELANA JAYA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(88,'1178','SEKINCHAN',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(89,'1198','SENTUL',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(90,'1200','TANJUNG MALIM',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(91,'1217','PELABUHAN KLANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(92,'1231','SRI DAMANSARA ',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(93,'1241','DENGKIL',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(94,'1265','DAMANSARA HEIGHTS',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(95,'1276','PUNCAK ALAM',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(96,'1289','SERENDAH',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(97,'1296','JERAM',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(98,'1297','UPM',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(99,'1312','PUTRA PERMAI',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(100,'1334','SG. PELEK',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(101,'1340','BALAKONG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(102,'1341','ULU SELANGOR ',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(103,'1343','SIMUNJAN',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(104,'1344','BANDAR DAMANSARA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(105,'1347','KOTA DAMANSARA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(106,'1351','KLUANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(107,'1352','AMPANG JAYA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(108,'1356','TELUK PANGLIMA GARANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(109,'1390','SABAK BERNAM',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(110,'1404','TUN RAZAK',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(111,'1405','SETAPAK',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(112,'1407','KUALA LANGAT',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(113,'1410','BUKIT DAMANSARA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(114,'1411','KUALA SELANGOR',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(115,'1413','BATANG KALI',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(116,'1426','KLIA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(117,'1427','PRIMA DAMANSARA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(118,'1432','HULU SELANGOR',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(119,'1437','SIBERJAYA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(120,'1445','SALAK TINGGI',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(121,'1455','DAMANSARA UTAMA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(122,'1464','ULU KLANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(123,'1470','GOMBAK UTARA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(124,'1494','PULAU INDAH',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(125,'1505','PETALING',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(126,'1509',' CYBERJAYA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(127,'1516','UEP SUBANG JAYA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(128,'1517','TAMAN KERAMAT',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(129,'1518','KALUMPANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(130,'1523','TANJUNG SEPAT',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(131,'1524','TAIPAN TRIANGLE',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(132,'1525','KUANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(133,'1526','BANDAR SRI DAMANSARA',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(134,'1543','SRI GOMBAK',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(135,'1569','Damansara Perdana',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(136,'1602','SERDANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(137,'1607','SG.BULOH',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(138,'1608','TANJONG KARANG',2,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(139,'28','KUANTAN',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(140,'123','BENTONG',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(141,'1019','TEMERLOH',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(142,'1034','JERANTUT',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(143,'1059','SUNGAI LEMBING',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(144,'1066','KUALA LIPIS',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(145,'1084','JENGKA',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(146,'1105','ROMPIN',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(147,'1109','DONG RAUB',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(148,'1136','CHINI',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(149,'1153','RAUB',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(150,'1157','BERA',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(151,'1158','TRIANG',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(152,'1176','MENTAKAB',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(153,'1227','GENTING HIGLAND',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(154,'1237','MUADZAM SHAH',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(155,'1305','BESERAH',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(156,'1353','MARAN',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(157,'1380','CAMERON HIGHLANDS',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(158,'1387','PEKAN',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(159,'1396','CHEMOR',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(160,'1538','BUKIT FRASER',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(161,'1548','KERATONG',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(162,'1609','BANDAR JENGKA',3,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(163,'1','JELI',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(164,'117','KOTA BHARU',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(165,'1025','BACHOK',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(166,'1028','PASIR MAS',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(167,'1045','KUBANG KERIAN',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(168,'1048','SELISING',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(169,'1083','PULAI CHONDONG',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(170,'1091','KUALA KRAI',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(171,'1092','PALEKBANG',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(172,'1093','CHERANG RUKU',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(173,'1096','GUA MUSANG',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(174,'1135','TUMPAT',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(175,'1155','DABONG',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(176,'1159','PENGKALAN CHEPA',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(177,'1213','TANAH MERAH',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(178,'1274','MACHANG',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(179,'1315','WAKAF BHARU',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(180,'1318','KUALA BALAH',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(181,'1319','WAKAF CHE YEH',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(182,'1333','BANGGOL',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(183,'1372','RANTAU PANJANG',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(184,'1384','MELOR',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(185,'1408','PASIR PUTEH',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(186,'1433','TEMANGAN',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(187,'1613','KETEREH',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(188,'1614','PERINGAT',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(189,'1615','TOK BALI',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(190,'1616','CIKU',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(191,'1617','KOK LANAS',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(192,'1618','PASIR TUMBOH',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(193,'1619','PANGKALAN KUBOR',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(194,'1620','MERANTI',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(195,'1621','AYER LANAS',4,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(196,'1023','BATU PAHAT',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(197,'1026','SKUDAI',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(198,'1043','MUAR',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(199,'1053','SENAI',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(200,'1055','SEGAMAT',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(201,'1140','KOTA TINGGI',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(202,'1185','LARKIN',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(203,'1190','KULAI',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(204,'1192','PARIT',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(205,'1208','PEKAN NENAS',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(206,'1209','PONTIAN',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(207,'1211','KLUANG',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(208,'1224','MELAYU MAJIDEE',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(209,'1284','SIMPANG RENGGAM',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(210,'1316','MASAI',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(211,'1330','PASIR GUDANG',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(212,'1331','BANDAR PENAWAR',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(213,'1339','TANGKAK',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(214,'1361','AIR ITAM',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(215,'1369','LABIS',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(216,'1373','MERSING',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(217,'1382','ENDAU',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(218,'1400','TELIPOT',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(219,'1459','TAMPOI',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(220,'1499','ULU TIRAM',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(221,'1570','BANDAR BARU UDA',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(222,'1571','PENGERANG',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(223,'1594','JOHOR BAHRU',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(224,'1611','YONG PENG',5,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(225,'17','SINTOK',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(226,'18','BANDAR BAHARU',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(227,'1001','JITRA',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(228,'1009','KODIANG',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(229,'1036','SUNGAI PETANI',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(230,'1060','SIK',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(231,'1069','BALING',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(232,'1070','KULIM',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(233,'1072','PADANG BESAR',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(234,'1094','MERBOK',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(235,'1104','KUALA NERANG',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(236,'1114','KUPANG',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(237,'1139','PENDANG',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(238,'1146','GURUN',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(239,'1214','KUALA KETIL',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(240,'1220','KARANGAN',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(241,'1235','KUPANG BALING',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(242,'1246','BEDONG',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(243,'1254','KUAH',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(244,'1282','POKOK SENA',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(245,'1285','PADANG SERAI',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(246,'1328','KUALA MUDA',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(247,'1355','KEPALA BATAS',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(248,'1364','LANGKAWI',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(249,'1375','GUAR GHEMPEDAK',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(250,'1378','LUNAS',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(251,'1398','KUBANG PASU',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(252,'1415','KUALA KEDAH',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(253,'1419','ALOR SETAR',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(254,'1430','LANGGAR',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(255,'1460','AYER HITAM',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(256,'1484','KUBANG KERIAN',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(257,'1492','REDANG',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(258,'1546','YAN',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(259,'1587','CHANGLUN',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(260,'1622','SERDANG',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(261,'1623','MAHANG',6,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(262,'1416','WILAYAH PERSEKUTUAN LABUAN',7,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(263,'32','AIR KEROH',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(264,'1021','ALOR GAJAH',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(265,'1029','BACHANG',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(266,'1039','JASIN',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(267,'1044','MERLIMAU',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(268,'1073','DURIAN TUNGGAL',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(269,'1141','MASJID TANAH',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(270,'1152','KUALA SUNGAI BARU',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(271,'1160','LORONG PANDAN',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(272,'1167','BUKIT BARU',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(273,'1183','TAMAN DESA BARU',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(274,'1184','SEMABOK',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(275,'1193','PERNU',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(276,'1194','TANJUNG KLING',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(277,'1218','AIR MOLEK',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(278,'1226','KLEBANG KECIL',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(279,'1249','BUKIT BERUANG',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(280,'1262','BUKIT PIATU',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(281,'1268','T. PERINGGIT JAYA',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(282,'1277','BUKIT SEBUKOR',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(283,'1291','SUNGAI UDANG',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(284,'1300','MELAKA ',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(285,'1307','BATU BERENDAM',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(286,'1309','BANDAR HILIR',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(287,'1326','BATANG TIGA',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(288,'1329','SERI DUYONG',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(289,'1335','SUNGAI BARU',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(290,'1337','KLEBANG BESAR',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(291,'1345','BEMBAN',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(292,'1374','BUKIT RAMBAT',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(293,'1377','DURIAN DAUN',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(294,'1386','UMBAI',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(295,'1388','SERINDIT',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(296,'1392','BUKIT SERINDIT',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(297,'1403','BUKIT RAMBAI',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(298,'1409','SELANDAR',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(299,'1414','MELRLIMAU',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(300,'1417','SUNGAI RAMBAI',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(301,'1421','BUKIT KATIL',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(302,'1441','PADANG TEMU',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(303,'1446',' OFF JALAN MERDEKA',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(304,'1451','JALAN MERDEKA',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(305,'1458','TENGKERA',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(306,'1462','PERINGGIT',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(307,'1465','KUBU',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(308,'1481','ALAI',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(309,'1482','BUKIT PALAH',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(310,'1490','ASAHAN',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(311,'1501','JALAN BENDAHARA',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(312,'1507','TAMPIN',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(313,'1510','KANDANG',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(314,'1519','MELAKA TENGAH',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(315,'1539','TANJUNG BIDARA',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(316,'1564','TAMAN PERINGGIT JAYA',8,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(317,'1030','SEREMBAN ',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(318,'1041','JOHOL',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(319,'1061','JELEBU',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(320,'1064','BATU KIKIR',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(321,'1068','PORT DICKSON',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(322,'1081','BANDAR BARU NILAI',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(323,'1098','MANTIN',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(324,'1148','KUALA KLAWANG',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(325,'1156','KUALA PILAH',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(326,'1172','SERI JEMPOL',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(327,'1188','NILAI',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(328,'1204','KOTA',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(329,'1207','PEDAS',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(330,'1221','RANTAU',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(331,'1233','REMBAU',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(332,'1236','KUALA ROMPIN',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(333,'1253','LINGGI',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(334,'1264','LENGGENG',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(335,'1269','TANJUNG IPOH',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(336,'1278','LABU',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(337,'1306','PAROI',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(338,'1311','SENAWANG',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(339,'1317','GEMAS',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(340,'1332','BAHAU',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(341,'1363','TAMPIN',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(342,'1389','ULU GADONG',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(343,'1393','MAMBAU',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(344,'1412','TERACHI',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(345,'1457','GEMENCHEH',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(346,'1488','ROMPIN',9,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(347,'1032','SEBERANG PERAI',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(348,'1035','GELUGOR',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(349,'1049','MINDEN',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(350,'1077','BAYAN LEPAS',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(351,'1079','BALIK PULAU',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(352,'1099','BUTTERWORTH',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(353,'1108','SUNGAI NIBONG',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(354,'1164','BUKIT MERTAJAM',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(355,'1169','PULAU PINANG',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(356,'1186','USM',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(357,'1196','BAYAN BARU',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(358,'1232','KEPALA BATAS',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(359,'1256','TELUK BAHANG',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(360,'1281','PRAI',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(361,'1283','AIR ITAM',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(362,'1293','PERMATANG PAUH',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(363,'1295','NIBONG TEBAL',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(364,'1304','MACANG BUBUK',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(365,'1327','SIMPANG AMPAT',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(366,'1346','TANJUNG BUNGA',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(367,'1354','KOMTAR',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(368,'1358','BUKIT COMBE',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(369,'1370','TANJUNG TOKONG',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(370,'1420','JELUTONG',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(371,'1468','BUKIT JAMBUL',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(372,'1469','JALAN BURMAH',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(373,'1477','GEORGETOWN',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(374,'1485','SUNGAI GELUGOR',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(375,'1497','BATU FERRINGHI',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(376,'1503','PENANG',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(377,'1522','BAGAN SERAI',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(378,'1575','sabarangan',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(379,'1596','Pulau Pinang',10,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(380,'1020','MIRI',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(381,'1042','KUCHING',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(382,'1056','KOTA SAMARAHAN',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(383,'1057','SRI AMAN',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(384,'1116','TEBAKANG',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(385,'1117','SERIAN',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(386,'1118','LUNDU',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(387,'1119','LAWAS',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(388,'1129','TEBEDU SERIAN',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(389,'1133','SIBU',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(390,'1134','SARATOK',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(391,'1137','BINTANGOR',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(392,'1150','MUKAH',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(393,'1222','BINTULU',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(394,'1234','LIMBANG',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(395,'1258','BELAGA',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(396,'1263','ASAJAYA',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(397,'1279','BARAM',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(398,'1286','BALINGIAN',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(399,'1288','ROBAN',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(400,'1302','BETONG',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(401,'1313','SARIKEI',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(402,'1314','TEBEDU',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(403,'1323','SARIBAS',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(404,'1325','LUBOK ANTU',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(405,'1367','SIMUNJAN',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(406,'1376','JULAU',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(407,'1394','DALAT',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(408,'1476','KAPIT',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(409,'1511','PENDING',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(410,'1535','BEKENU',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(411,'1547','KABONG',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(412,'1553','BAU',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(413,'1563','SUBIS',11,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(414,'22','PADANG BESAR',12,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(415,'23','ARAU',12,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(416,'91','CUPIN',12,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(417,'1210','KUALA PERLIS',12,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(418,'1298','BESERI',12,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(419,'1350','KUALA SANGLANG',12,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(420,'1402','INDERA KAYANGAN',12,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(421,'1453','INDRA',12,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(422,'1474','KANGAR ',12,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(423,'1514','CHUPING',12,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(424,'118','KOTA KINABALU ',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(425,'1012','RANAU',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(426,'1013','TAWAU',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(427,'1033','BEAUFORT',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(428,'1052','SIPITANG',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(429,'1062','KUDAT',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(430,'1111','BINTULU',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(431,'1113','KOTA MARUDU',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(432,'1115','PAPAR',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(433,'1120','TUARAN',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(434,'1122','TENOM',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(435,'1124','PENAMPANG',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(436,'1125','KOTA BELUD',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(437,'1126','LAHAD DATU',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(438,'1128','KUALA PENYU',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(439,'1130','TAMBUNAN',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(440,'1131','SANDAKAN',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(441,'1132','MEMBAKUT',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(442,'1182','TAMPARULI',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(443,'1197','KENINGAU',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(444,'1199','TELUPID',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(445,'1243','SEMPORNA',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(446,'1248','BONGAWAN',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(447,'1255','TANJUNG ARU ',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(448,'1257','KUNAK',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(449,'1425','KOTA SAMARAHAN',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(450,'1440','NABAWAH',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(451,'1486','LIKAS',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(452,'1521','NABAWAN',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(453,'1555','BAU',13,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(454,'1037','KUALA TERENGGANU',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(455,'1082','JERTEH',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(456,'1085','KUALA BERANG',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(457,'1088','BESUT',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(458,'1089','KEMAMAN',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(459,'1097','DUNGUN',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(460,'1102','MARANG',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(461,'1163','SETIU',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(462,'1187','CHENDERING',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(463,'1242','BUKIT TUNGGAL',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(464,'1250','BATU RAKIT',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(465,'1275','KUALA BESUT',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(466,'1357','AJIL',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(467,'1479','HULU TRENGGGANU',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(468,'1504','GONG BADAK',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(469,'1513','PAKA',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(470,'1597','CHUKAI',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(471,'1610','KERTEH',14,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(472,'19','CHERAS',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(473,'1016','AMPANG',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(474,'1017','KUALA LUMPUR',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(475,'1054','SUNGAI BESI',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(476,'1058','TAMAN KERAMAT',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(477,'1065','LEMBAH PANTAI',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(478,'1100','PUTRAJAYA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(479,'1112','SETAPAK',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(480,'1147','GOMBAK',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(481,'1149','BUKIT MALURI',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(482,'1162','KEPONG',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(483,'1170','DAMANSARA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(484,'1173','WANGSA MAJU',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(485,'1174','TAMAN MELAWATI',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(486,'1175','TAMAN MALURI',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(487,'1179','TAMAN TUN DR.ISMAIL',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(488,'1181','TAMAN MIHARJA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(489,'1191','SENTUL',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(490,'1206','TASEK SELATAN',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(491,'1219','KAMPUNG BARU',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(492,'1223','TAMAN DESA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(493,'1228','PANDAN INDAH',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(494,'1229','JINJANG UTARA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(495,'1230','TAMAN IBUKOTA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(496,'1239','WANGSA MELAWATI',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(497,'1244','PANTAI DALAM',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(498,'1251','HULU KELANG',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(499,'1260','DESA PANDAN',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(500,'1261','PANDAN JAYA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(501,'1266','JALAN IPOH',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(502,'1271','SRI PETALING',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(503,'1272','SEGAMBUT',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(504,'1273','KAMPUNG PANDAN',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(505,'1292','BANGSAR',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(506,'1294','PANDAN DALAM',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(507,'1321','TAMAN SETAPAK INDAH',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(508,'1324','DESA SETAPAK',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(509,'1338','KERINCHI',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(510,'1348','TUN RAZAK',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(511,'1359','KUNCHAI LAMA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(512,'1360','SETIAWANGSA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(513,'1362','PANDAN PERDANA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(514,'1371','JALAN TUN RAZAK',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(515,'1385','DAMANSARA HEIGHTS',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(516,'1395','DATUK KERAMAT ',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(517,'1422','SG. BESI',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(518,'1424','PANDAN SAFARI LAGOON',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(519,'1428','MEDAN SRI KERAMAT',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(520,'1434','MONT KIARA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(521,'1438','UNIVERSITI MALAYA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(522,'1439','TAMAN MIDAH',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(523,'1444','KERAMAT WANGSA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(524,'1447','SRI DAMANSARA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(525,'1449','TAMAN SRI RAMPAI',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(526,'1450','DESA PETALING',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(527,'1454','BANDAR SRI PERMAISURI',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(528,'1456','JALAN PUCHONG',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(529,'1461','BANDAR BARU SENTUL',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(530,'1463','PETALING JAYA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(531,'1466','SUBANG JAYA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(532,'1471','BATU CAVES',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(533,'1472','BANDAR TASIK SELATAN',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(534,'1495','TAMAN SALAK SELATAN',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(535,'1496','TAMAN SETIAWANGSA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(536,'1500','BUKIT JALIL',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(537,'1502','BANDAR SRI DAMANSARA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(538,'1506','JALAN RAJA CHULAN',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(539,'1512','JALAN SULTAN ISMAIL',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(540,'1515','JALAN AMPANG',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(541,'1527','TAMAN PERMATA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(542,'1528','BUKIT DAMANSARA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(543,'1529','BRICKFIELDS',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(544,'1530','BUKIT BINTANG',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(545,'1531','CHOW KIT',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(546,'1536','BUKIT KIARA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(547,'1537','LEMBAH KERAMAT',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(548,'1540','PUDU',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(549,'1541','BANDAR TUN RAZAK',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(550,'1574','SA',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(551,'1604','SERDANG',15,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09',''),

(552,'1010','PUTRAJAYA',16,1,'2020-11-02 13:27:09','','2020-11-02 13:27:09','');

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `model_id` varchar(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 

(2,'App\\User','2'),

(5,'App\\User','7'),

(6,'App\\User','7'),

(3,'App\\User','7'),

(3,'App\\User','8'),

(7,'App\\User','9'),

(7,'App\\User','10'),

(5,'App\\User','15'),

(7,'App\\User','18'),

(7,'App\\User','22'),

(7,'App\\User','23'),

(7,'App\\User','24'),

(7,'App\\User','25'),

(7,'App\\User','26'),

(7,'App\\User','28'),

(5,'App\\User','30'),

(7,'App\\User','31'),

(7,'App\\User','32'),

(7,'App\\User','33'),

(7,'App\\User','34'),

(7,'App\\User','35'),

(5,'App\\User','37'),

(7,'App\\User','38'),

(7,'App\\User','39'),

(5,'App\\User','40'),

(5,'App\\User','41'),

(5,'App\\User','42'),

(2,'App\\User','37'),

(5,'App\\User','43'),

(2,'App\\User','27'),

(6,'App\\User','27'),

(4,'App\\User','45'),

(3,'App\\User','44'),

(7,'App\\User','46'),

(4,'App\\User','47'),

(4,'App\\User','48'),

(4,'App\\User','49'),

(6,'App\\User','50'),

(7,'App\\User','51'),

(7,'App\\User','52'),

(2,'App\\User','1'),

(1,'App\\User','1'),

(3,'App\\User','45'),

(3,'App\\User','46');

/*Table structure for table `permission_groups` */

DROP TABLE IF EXISTS `permission_groups`;

CREATE TABLE `permission_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nama Kumpulan Kebenaran',
  `prefix` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Prefik',
  `active` int(11) DEFAULT '1' COMMENT 'Status Aktif',
  `is_view` int(11) DEFAULT '1' COMMENT 'Status Lihat',
  `is_create` int(11) DEFAULT '1' COMMENT 'Status Cipta',
  `is_edit` int(11) DEFAULT '1' COMMENT 'Status Pinda',
  `is_delete` int(11) DEFAULT '1' COMMENT 'Status Padam',
  `rank` int(11) DEFAULT '99' COMMENT 'Peringkat',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Kumpulan Kebenaran';

/*Data for the table `permission_groups` */

insert  into `permission_groups`(`id`,`name`,`prefix`,`active`,`is_view`,`is_create`,`is_edit`,`is_delete`,`rank`,`created_at`,`updated_at`,`created_by`,`updated_by`) values 

(1,'Application','application',0,1,1,1,1,4,'2020-03-10 08:01:41','2020-03-10 08:01:41',NULL,NULL),

(2,'Peranan','role',1,1,1,1,1,3,'2020-03-10 12:19:03','2020-03-10 12:19:03',NULL,NULL),

(3,'Pengumuman','announcement',1,1,1,1,1,5,'2020-03-10 12:43:55','2020-03-10 12:43:55',NULL,NULL),

(4,'Pengguna Sistem','user',1,1,1,1,1,2,'2020-03-10 12:54:38','2020-03-10 12:54:38',NULL,NULL),

(48,'District','district',1,1,1,1,1,99,'2020-07-23 08:09:38','2020-07-23 08:09:38',NULL,NULL),

(55,'Branch','branch',1,1,1,1,1,99,NULL,NULL,NULL,NULL),

(56,'State','state',1,1,1,1,1,99,NULL,NULL,NULL,NULL),

(64,'Booking_application','booking_application',1,1,1,1,1,99,'2021-03-27 23:33:53','2021-03-27 23:33:53',NULL,NULL),

(65,'Booking','booking',1,1,1,1,1,99,'2021-03-28 09:46:09','2021-03-28 09:46:09',NULL,NULL),

(66,'Vehicle_type','vehicle_type',1,1,1,1,1,99,'2021-03-28 10:35:54','2021-03-28 10:35:54',NULL,NULL),

(67,'Booking_vehicle','booking_vehicle',1,1,1,1,1,99,'2021-03-28 10:41:22','2021-03-28 10:41:22',NULL,NULL),

(68,'Booking_cargo','booking_cargo',1,1,1,1,1,99,'2021-08-21 22:35:07','2021-08-21 22:35:07',NULL,NULL),

(69,'Cargo_type','cargo_type',1,1,1,1,1,99,'2021-09-18 22:29:38','2021-09-18 22:29:38',NULL,NULL);

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Kebenaran';

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 

(1,'application_create','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(2,'application_edit','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(3,'application_view','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(4,'application_delete','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(5,'role_create','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(6,'role_edit','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(7,'role_view','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(8,'role_delete','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(9,'announcement_create','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(10,'announcement_edit','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(11,'announcement_view','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(12,'announcement_delete','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(13,'user_create','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(14,'user_edit','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(15,'user_view','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(16,'user_delete','web','2020-03-19 06:23:48','2020-03-19 06:23:48'),

(25,'zone_create','web','2020-03-28 19:24:58','2020-03-28 19:24:58'),

(26,'zone_edit','web','2020-03-28 19:24:58','2020-03-28 19:24:58'),

(27,'zone_view','web','2020-03-28 19:24:58','2020-03-28 19:24:58'),

(28,'zone_delete','web','2020-03-28 19:24:58','2020-03-28 19:24:58'),

(149,'user_group_create','web','2020-04-17 18:54:55','2020-04-17 18:54:55'),

(150,'user_group_edit','web','2020-04-17 18:54:55','2020-04-17 18:54:55'),

(151,'user_group_view','web','2020-04-17 18:54:55','2020-04-17 18:54:55'),

(152,'user_group_delete','web','2020-04-17 18:54:55','2020-04-17 18:54:55'),

(175,'district_create','web','2020-07-23 08:09:38','2020-07-23 08:09:38'),

(176,'district_edit','web','2020-07-23 08:09:38','2020-07-23 08:09:38'),

(177,'district_view','web','2020-07-23 08:09:38','2020-07-23 08:09:38'),

(178,'district_delete','web','2020-07-23 08:09:38','2020-07-23 08:09:38'),

(199,'branch_create','web',NULL,NULL),

(200,'branch_edit','web',NULL,NULL),

(201,'branch_view','web',NULL,NULL),

(202,'branch_delete','web',NULL,NULL),

(203,'state_create','web',NULL,NULL),

(204,'state_edit','web',NULL,NULL),

(205,'state_view','web',NULL,NULL),

(206,'state_delete','web',NULL,NULL),

(211,'module_create','web','2021-03-25 20:15:33','2021-03-25 20:15:33'),

(212,'module_edit','web','2021-03-25 20:15:33','2021-03-25 20:15:33'),

(213,'module_view','web','2021-03-25 20:15:33','2021-03-25 20:15:33'),

(214,'module_delete','web','2021-03-25 20:15:33','2021-03-25 20:15:33'),

(235,'booking_application_create','web','2021-03-27 23:33:53','2021-03-27 23:33:53'),

(236,'booking_application_edit','web','2021-03-27 23:33:53','2021-03-27 23:33:53'),

(237,'booking_application_view','web','2021-03-27 23:33:53','2021-03-27 23:33:53'),

(238,'booking_application_delete','web','2021-03-27 23:33:53','2021-03-27 23:33:53'),

(239,'booking_create','web','2021-03-28 09:46:09','2021-03-28 09:46:09'),

(240,'booking_edit','web','2021-03-28 09:46:09','2021-03-28 09:46:09'),

(241,'booking_view','web','2021-03-28 09:46:09','2021-03-28 09:46:09'),

(242,'booking_delete','web','2021-03-28 09:46:09','2021-03-28 09:46:09'),

(243,'vehicle_type_create','web','2021-03-28 10:35:54','2021-03-28 10:35:54'),

(244,'vehicle_type_edit','web','2021-03-28 10:35:54','2021-03-28 10:35:54'),

(245,'vehicle_type_view','web','2021-03-28 10:35:54','2021-03-28 10:35:54'),

(246,'vehicle_type_delete','web','2021-03-28 10:35:54','2021-03-28 10:35:54'),

(247,'booking_vehicle_create','web','2021-03-28 10:41:22','2021-03-28 10:41:22'),

(248,'booking_vehicle_edit','web','2021-03-28 10:41:22','2021-03-28 10:41:22'),

(249,'booking_vehicle_view','web','2021-03-28 10:41:22','2021-03-28 10:41:22'),

(250,'booking_vehicle_delete','web','2021-03-28 10:41:22','2021-03-28 10:41:22'),

(251,'booking_cargo_create','web','2021-08-21 22:35:06','2021-08-21 22:35:06'),

(252,'booking_cargo_edit','web','2021-08-21 22:35:06','2021-08-21 22:35:06'),

(253,'booking_cargo_view','web','2021-08-21 22:35:06','2021-08-21 22:35:06'),

(254,'booking_cargo_delete','web','2021-08-21 22:35:07','2021-08-21 22:35:07'),

(255,'cargo_type_create','web','2021-09-18 22:29:38','2021-09-18 22:29:38'),

(256,'cargo_type_edit','web','2021-09-18 22:29:38','2021-09-18 22:29:38'),

(257,'cargo_type_view','web','2021-09-18 22:29:38','2021-09-18 22:29:38'),

(258,'cargo_type_delete','web','2021-09-18 22:29:38','2021-09-18 22:29:38');

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL COMMENT 'Id Kebenaran',
  `role_id` int(10) unsigned NOT NULL COMMENT 'Id Peranaan',
  PRIMARY KEY (`permission_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Kebenaran Peranan ';

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values 

(5,1),

(6,1),

(7,1),

(8,1),

(9,1),

(9,2),

(10,1),

(10,2),

(11,1),

(11,2),

(11,6),

(12,1),

(12,2),

(13,1),

(14,1),

(15,1),

(16,1),

(45,1),

(46,1),

(47,1),

(48,1),

(57,6),

(58,6),

(59,6),

(60,6),

(65,6),

(66,6),

(67,6),

(68,6),

(73,6),

(74,6),

(75,6),

(77,6),

(78,6),

(79,6),

(80,6),

(81,6),

(82,6),

(83,6),

(84,6),

(89,6),

(90,6),

(91,6),

(92,6),

(93,6),

(94,6),

(95,6),

(96,6),

(97,6),

(98,6),

(99,6),

(100,6),

(101,6),

(102,6),

(103,6),

(104,6),

(113,6),

(114,6),

(115,6),

(116,6),

(117,6),

(118,6),

(119,6),

(120,6),

(121,5),

(121,6),

(122,5),

(122,6),

(123,5),

(123,6),

(124,5),

(124,6),

(125,6),

(126,6),

(127,6),

(128,6),

(133,5),

(134,5),

(135,5),

(136,5),

(137,5),

(137,6),

(138,5),

(138,6),

(139,5),

(139,6),

(140,5),

(140,6),

(145,6),

(146,6),

(147,6),

(148,6),

(165,6),

(167,1),

(168,1),

(169,1),

(170,1),

(171,1),

(172,1),

(173,1),

(174,1),

(175,1),

(176,1),

(177,1),

(178,1),

(179,1),

(180,1),

(181,1),

(182,1),

(183,1),

(184,1),

(185,1),

(186,1),

(187,1),

(188,1),

(189,1),

(190,1),

(191,1),

(192,1),

(193,1),

(194,1),

(195,1),

(196,1),

(197,1),

(198,1),

(199,1),

(199,2),

(200,1),

(200,2),

(201,1),

(201,2),

(202,1),

(202,2),

(203,1),

(204,1),

(205,1),

(206,1),

(235,1),

(235,3),

(236,1),

(236,3),

(237,1),

(237,3),

(238,1),

(238,3),

(239,1),

(239,3),

(240,1),

(240,3),

(241,1),

(241,3),

(242,1),

(242,3),

(243,1),

(244,1),

(245,1),

(246,1),

(247,1),

(248,1),

(249,1),

(250,1),

(251,1),

(252,1),

(253,1),

(254,1),

(255,1),

(256,1),

(257,1),

(258,1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nama Peranan',
  `guard_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nama Pengawal',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dicipta Oleh',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Peranan';

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`,`updated_by`,`created_by`) values 

(1,'System Admin','web',NULL,'2020-03-10 18:56:28','1',NULL),

(2,'Company','web',NULL,'2020-03-19 06:11:43','1',NULL),

(3,'Account Holder','web','2020-03-19 08:43:34','2020-05-04 15:44:19','1','1');

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Id Sesi',
  `user_id` bigint(20) unsigned DEFAULT NULL COMMENT 'Id Pengguna',
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Alamat IP',
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'Nama agent pelayar',
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'muatan',
  `last_activity` int(11) NOT NULL COMMENT 'Id Aktiviti Sebelum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Sesi Login';

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 

('5ZvdvyujDtVBeq07hcIaPSsySO0vVBsZaBRy6i06',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnBOQkJVTTVDRW5veGVRNjJzZXdrYXVjN24yYjNzOU1pVkFxZTZ3aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvZmFjdG8taHViL21hbmlmZXN0Lmpzb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1651017841),

('0iaY74dPGpvXi3aln0kBCsNRDgFRIBlpja3m0jRv',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiamtBUjFyNVo2SnRMTXFCSDB6Y1VJRVpWQkNMRHlDUGE2bXE0Vk4zViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvZmFjdG8taHViL21hbmlmZXN0Lmpzb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1651018346),

('wLzF43mcALny0Qj986NeeHMiYKStk6sCGVFFgfbj',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNDFIQ1dWRmNYQlVlMU5UVkJqYmFBSjg5cWR6RkxqZmhWWFdUMWpTOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vbG9jYWxob3N0L2Jpem1pbGxhdjIvbG9naW4iO319',1651027577),

('ioYk9frvtPv5ZJIwSQa23JtEXfm94jFIOGj7Ve4x',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1ZOMVVZd29Fb0ZRY3RpMDYwV1Azb2pNY2hJMHdYa2pHUVJSTkdGMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651026709),

('J5ObKKwqqgf9zPAmMXlFfHO1R0TfGFC8PuduBIXa',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnBVT3pLMFREVmZYTkxybEtnb0diN1JhSlFpNmNwcVVTdzBNZE9xUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651026822),

('duzwZs6ZVGU8298bUIFvfeKyqXOAlvIXx1gq5zV0',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2tCZTBCeXRYaWpXZjJha0FOem8zREJZVkVWb1ZTSWF2U0E0Wm9yeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651026838),

('C5AK1mSAzQcsg7sns7wRAIJ51HlWj5xn4lKNP4bW',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGJVeEVtUFI0TzMwQXh0cEIwbDhFU1Z5cExlVklva1RtbUZIMW54ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651026925),

('U9mcHrr2oUds0Say8ZA0FOPIwJQaisPsirLRw3HZ',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieFUwYkV6NVg0SkZvQmVNM29tR3BDQ1pLYkpGa0JtaGZNdFF2OGZScyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651026949),

('FpiMaYgLHglLd4NnmRpolVUrU5lKc4p7QR10Ua1g',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUU9zQ1R6Z3VuWE5MQ2Y0NUR4ejhzSTI3ejRSNXZnTkFsQUNDQnRkNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651026987),

('ysRItVjBrZyVmPocVu1oXMSLQE9lMrMl2KKiHJkm',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVR5dUlWUjZ6bTdQNVFOMGV3MXFRUTVtRDVqRk1NMWFWSmZMMEFtNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651026990),

('Nigh66h74Mpmam2l1wQM8GNp3avUQYo4ZSnGIVwF',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0JUc3U1akloWmdZTUp6QkhVRlpnczVhQzZEdGF5UmJWV1pqcDZUaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651027015),

('HlsOy6Ilv28TEOGpE9Bv0lgmgd4W8OLIiqWfKc9o',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTno0eEtkMkVBQWw5SlY5c2lYTHpyUXdLQktZelFhemg5UmE1a0wzbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651027022),

('gSLOnngV3oGhbTj0CT8idVmhtEh50sYckHd5QRRy',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUTBkYnM0c2R5ODNEVXFuQUhRN3pTSjk2dE12YzdEcENERHdjanJjRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651027120),

('ahxjpDjqatdkdHYp5JZpPta243wZcPmTDyRgzprl',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoid1hUVUF0aHN3VFBDdlVuUnBkVDhGRGNiM3ZENEc1bm85V29CTGNyQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651027173),

('VxqbHlf7C627Xcr0PUtEYLkIWihMxTKCzONL9eny',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoic2E2Q3BPb2RPWERJbFZGVmk4UGxuVzdKZ285VE1tY3pJekxlTE1pZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651027177),

('rm1i7aL6Ll5pxapCbk1jsAu7Ghyr64rDwTXkqy4o',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiS0xTUHF4bXFTZDg3Ulc4Q1l0TmIxb3ZITEJCWDNrRVN4RjVRak5RaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651027363),

('4MB8uJeHDoUlUpYupzYMIH6xBktscQKrrZX2k0pc',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieGRGeFVLVTh3eUdTOU1mcVdKNGQyM3hFY2hVWFo5WTFzTFJmRHduZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651027372),

('E5aTNe01UxJCzCV3zVcwbv1HS66ENxUK4On8iCsj',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoibnMwcXJab2pPbUV2M082anVONXVoTVF4aUR6eU1lemJpdHpVR2gyNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651027474),

('T9HfUxDOHAHhvvd1IoLmmDz5kIijLeiRQQbNAsQT',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidGprdHlJemZnMWUyZW54SXM3T1dzWXhkcFA5VVR2cnBFOHY0dDlGNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651027475),

('NIEEKRu1Q425iCXkN6L6XfKoDzLZvphD5tY8Oig2',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOEo4R1FVVUVvS2JEaUdCM1diV0ZuWVZqc1ZxSzFRUFNPamhZTTlrdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651027479),

('2rXMEDVYJXavIsluK0oi1Pite4qTNMgw5b6lI7Ew',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0pXT2JjVTRvYWYxUmp4OGZXaFRRMTFqODVFd2xIdG00VTlFSVZmVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvYml6bWlsbGF2Mi9tYW5pZmVzdC5qc29uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1651027577),

('GO2G6guRXHIR2TwWTQ6Ql19HbplpBjRwaad7Rps2',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoic05Lc1VTTkZKaFdreEF6MGZsZXcya0JEaGhXVWoyS2xWelpiMnE3ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvZmFjdG8taHViL21hbmlmZXN0Lmpzb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1661846623),

('rmMwE7bv1GudqOJ998ztLNCJR4WXYFbEZC1Pns6M',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGNCVWEwb2wwbXI2WWVtSXZZRldUZXd6Z1hqSTNwdXlObjJlR1ZvayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvZmFjdG8taHViL21hbmlmZXN0Lmpzb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1661846726),

('gAOjggorz0AGJVDx4fTBRYEMbGx7Tjbx4tPCMCJS',45,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaHRMMVJORlJVSXpGcjFya3A5ZHV5aUF5UVN1WWRaWnRJRzVLYWNhSCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdC9mYWN0by1odWIiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1MzoiaHR0cDovL2xvY2FsaG9zdC9mYWN0by1odWIvYm9va2luZ19hcHBsaWNhdGlvbi9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0NTt9',1661851960),

('kuBYRKxgFLcMN3OcQhdlWe89HHnpCSdYYX2wZCio',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWk9kSjhRSTQzdzBJZVViMTMyb0s4RUZjdG9qcjY3YlVZOXNvRzlzVCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdC9mYWN0by1odWIiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovL2xvY2FsaG9zdC9mYWN0by1odWIvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1664251284),

('7wMVszFO7LMjeZvzqlcd1fQpOa4TveZV3aTzMJlS',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3kzS2hBWXB1ZlNYUnJXTU10V3c3UWVmMmEwQU8xU2htSjhDaGkxbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvZmFjdG8taHViL21hbmlmZXN0Lmpzb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1664251285),

('HqTy9V4yh5a2Ol1ZQ12Qm9CqBbTnxf0DjxdSdD6s',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0lhMngxT1VTZGViYkllVjFuYnRQSjdRMDQzZ0FqU1NkaUlaV2lZaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvZmFjdG8taHViL21hbmlmZXN0Lmpzb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1665043428),

('EJiL1mQonUTIcjyMpJEwvZG2HacgFWMteUW5A97y',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2p2QUsxRXRvcEowUHlGRkxIOU4ycWVPT2R5aEJPRVlPTWwweVZwYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvZmFjdG8taHViL21hbmlmZXN0Lmpzb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1665043443),

('iOQWUzlPzChYHooiuvc3k3gUMyOZbhxzzxf0K2Rq',45,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVmE0bTQyS1lPSVFMVXhncmRlcExPZzJqZ0lIeThMeWNzaEhMdnltUyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdC9mYWN0by1odWIiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NjoiaHR0cDovL2xvY2FsaG9zdC9mYWN0by1odWIvYm9va2luZ19hcHBsaWNhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ1O30=',1665050207),

('GfWYin0zPgaIdujxhfr0hEVLzXvUIbKzoA0UK2IB',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0Q1MDBLejFXZVV1SG9CeFJCNmI0bGZhT0hZSXRUa1VxNTh0bHpEbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvZmFjdG8taHViL21hbmlmZXN0Lmpzb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1665043461),

('arMeYayO0pHlTro5poO3yfoBIa19CnhvN6DRXJQT',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZmNGaDFwTDh1cEcwT1pRb3J3eGNuRUExOHdGbU9JWVdYMFFneTF3QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvZmFjdG8taHViL21hbmlmZXN0Lmpzb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1665043464);

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'Nama Negeri',
  `shortname` varchar(10) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `created_by` varchar(255) DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `updated_by` varchar(255) DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Negeri';

/*Data for the table `states` */

insert  into `states`(`id`,`code`,`name`,`shortname`,`city`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 

(1,'A','Perak','PRK','IPOH','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(2,'B','Selangor','SGR','SHAH ALAM','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(3,'C','Pahang','PHG','KUANTAN','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(4,'D','Kelantan','KTN','KOTA BHARU','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(5,'J','Johor','JHR','JOHOR BAHRU','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(6,'K','Kedah','KDH','ALOR SETAR','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(7,'L','Wilayah Persekutuan Labuan','LBN','LABUAN','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(8,'M','Melaka','MLK','MELAKA','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(9,'N','Negeri Sembilan','NSN','SEREMBAN','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(10,'P','Pulau Pinang','PNG','GEORGETOWN','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(11,'Q','Sarawak','SWK','KUCHING','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(12,'R','Perlis','PLS','KANGAR','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(13,'S','Sabah','SBH','KOTA KINABALU','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(14,'T','Terengganu','TRG','KUALA TERENGGANU','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(15,'W','Wilayah Persekutuan Kuala Lumpur','KUL','KUALA LUMPUR','2020-11-02 11:41:24','','2020-11-02 11:41:24',''),

(16,'X','Wilayah Persekutuan Putrajaya','WPP','PUTRAJAYA','2020-11-02 11:41:24','','2020-11-02 11:41:24','');

/*Table structure for table `trails` */

DROP TABLE IF EXISTS `trails`;

CREATE TABLE `trails` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `model_type` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Jenis Model',
  `type` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Jenis Operasi',
  `model_id` varchar(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Id Model',
  `details` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT 'Maklumat Terperinci',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Jejak Audit';

/*Data for the table `trails` */

insert  into `trails`(`id`,`model_type`,`type`,`model_id`,`details`,`created_at`,`created_by`,`updated_at`) values 

(73,'roles','update','3','','2021-03-27 23:43:26','1','2021-03-27 23:43:26'),

(74,'booking_applications','create',NULL,'origin=>A\ndestination=>B\ndistance=>300\ncreated_by=>45\nupdated_at=>2021-03-28 01:29:50\ncreated_at=>2021-03-28 01:29:50\n','2021-03-28 01:29:50','45','2021-03-28 01:29:50'),

(75,'booking_applications','create',NULL,'origin=>A\ndestination=>B\ndistance=>300\ncreated_by=>45\nuser_id=>45\nupdated_at=>2021-03-28 01:30:46\ncreated_at=>2021-03-28 01:30:46\n','2021-03-28 01:30:46','45','2021-03-28 01:30:46'),

(76,'booking_applications','create',NULL,'origin=>A\ndestination=>B\ndistance=>0\ncreated_by=>45\nuser_id=>45\ndurationHrs=>0\ndurationMins=>0\nquantity=>0\nweight=>0\nlength=>0\nwidth=>0\nheight=>0\narea=>0\nvolume=>0\nnumVehicles=>0\ncostRateVehicles=>0\noverallCostByType=>0\noverallCost=>0\nupdated_at=>2021-03-28 01:33:50\ncreated_at=>2021-03-28 01:33:50\n','2021-03-28 01:33:50','45','2021-03-28 01:33:50'),

(77,'booking_applications','create',NULL,'origin=>A\ndestination=>B\ndistance=>0\ncreated_by=>45\nuser_id=>45\ndurationHrs=>0\ndurationMins=>0\nquantity=>0\nweight=>0\nlength=>0\nwidth=>0\nheight=>0\narea=>0\nvolume=>0\nnumVehicles=>0\ncostRateVehicles=>0\noverallCostByType=>0\noverallCost=>0\nupdated_at=>2021-03-28 01:34:42\ncreated_at=>2021-03-28 01:34:42\n','2021-03-28 01:34:42','45','2021-03-28 01:34:42'),

(78,'booking_applications','create',NULL,'origin=>A\ndestination=>B\ndistance=>0\ncreated_by=>45\nuser_id=>45\ndurationHrs=>0\ndurationMins=>0\nquantity=>0\nweight=>0\nlength=>0\nwidth=>0\nheight=>0\narea=>0\nvolume=>0\nnumVehicles=>0\ncostRateVehicles=>0\noverallCostByType=>0\noverallCost=>0\nupdated_at=>2021-03-28 01:35:38\ncreated_at=>2021-03-28 01:35:38\n','2021-03-28 01:35:38','45','2021-03-28 01:35:38'),

(79,'booking_applications','create',NULL,'origin=>A\ndestination=>B\ndistance=>0\ncreated_by=>45\nuser_id=>45\ndurationHrs=>0\ndurationMins=>0\nquantity=>0\nweight=>0\nlength=>0\nwidth=>0\nheight=>0\narea=>0\nvolume=>0\nnumVehicles=>0\ncostRateVehicles=>0\noverallCostByType=>0\noverallCost=>0\nupdated_at=>2021-03-28 01:39:49\ncreated_at=>2021-03-28 01:39:49\n','2021-03-28 01:39:49','45','2021-03-28 01:39:49'),

(80,'booking_applications','create',NULL,'origin=>A\ndestination=>B\ndistance=>0\ncreated_by=>45\nuser_id=>45\ndurationHrs=>0\ndurationMins=>0\nquantity=>0\nweight=>0\nlength=>0\nwidth=>0\nheight=>0\narea=>0\nvolume=>0\nnumVehicles=>0\ncostRateVehicles=>0\noverallCostByType=>0\noverallCost=>0\nupdated_at=>2021-03-28 01:41:56\ncreated_at=>2021-03-28 01:41:56\n','2021-03-28 01:41:56','45','2021-03-28 01:41:56'),

(81,'booking_applications','create',NULL,'origin=>A\ndestination=>B\ndistance=>0\ncreated_by=>45\nuser_id=>45\ndurationHrs=>0\ndurationMins=>0\nquantity=>0\nweight=>0\nlength=>0\nwidth=>0\nheight=>0\narea=>0\nvolume=>0\nnumVehicles=>0\ncostRateVehicles=>0\noverallCostByType=>0\noverallCost=>0\nupdated_at=>2021-03-28 01:43:48\ncreated_at=>2021-03-28 01:43:48\n','2021-03-28 01:43:48','45','2021-03-28 01:43:48'),

(82,'booking_applications','create','1','origin=>A\ndestination=>B\ndistance=>0\ncreated_by=>45\nuser_id=>45\ndurationHrs=>0\ndurationMins=>0\nquantity=>0\nweight=>0\nlength=>0\nwidth=>0\nheight=>0\narea=>0\nvolume=>0\nnumVehicles=>0\ncostRateVehicles=>0\noverallCostByType=>0\noverallCost=>0\nupdated_at=>2021-03-28 09:38:02\ncreated_at=>2021-03-28 09:38:02\nid=>1\n','2021-03-28 09:38:02','45','2021-03-28 09:38:02'),

(83,'roles','update','3','','2021-03-28 10:04:27','1','2021-03-28 10:04:27'),

(84,'vehicle_types','create',NULL,'name=>TYPE C\ncreated_by=>1\nupdated_at=>2021-03-28 10:39:27\ncreated_at=>2021-03-28 10:39:27\n','2021-03-28 10:39:27','1','2021-03-28 10:39:27'),

(85,'booking_vehicles','create',NULL,'booking_id=>1\nvehicle_type_id=>2\ncost=>11\ncreated_by=>45\nupdated_at=>2021-03-28 11:07:20\ncreated_at=>2021-03-28 11:07:20\n','2021-03-28 11:07:20','45','2021-03-28 11:07:20'),

(86,'booking_vehicles','create','2','booking_id=>1\nvehicle_type_id=>3\ncost=>33\ncreated_by=>45\nupdated_at=>2021-03-28 11:43:20\ncreated_at=>2021-03-28 11:43:20\nid=>2\n','2021-03-28 11:43:20','45','2021-03-28 11:43:20'),

(87,'booking_applications','create','2','origin=>A\ndestination=>B\ndistance=>0\ncreated_by=>46\nuser_id=>46\ndurationHrs=>0\ndurationMins=>0\nquantity=>0\nweight=>0\nlength=>0\nwidth=>0\nheight=>0\narea=>0\nvolume=>0\nnumVehicles=>0\ncostRateVehicles=>0\noverallCostByType=>0\noverallCost=>0\nupdated_at=>2021-03-28 14:44:05\ncreated_at=>2021-03-28 14:44:05\nid=>2\n','2021-03-28 14:44:05','46','2021-03-28 14:44:05'),

(88,'booking_vehicles','create','3','booking_id=>2\nvehicle_type_id=>2\ncost=>34\ncreated_by=>46\nupdated_at=>2021-03-28 14:48:14\ncreated_at=>2021-03-28 14:48:14\nid=>3\n','2021-03-28 14:48:14','46','2021-03-28 14:48:14'),

(89,'booking_applications','create','1','origin=>port klang\ndestination=>johor port\ndistance=>300\ncreated_by=>45\nuser_id=>45\nupdated_at=>2021-08-21 22:49:03\ncreated_at=>2021-08-21 22:49:03\nid=>1\n','2021-08-21 22:49:03','45','2021-08-21 22:49:03'),

(90,'booking_cargos','create',NULL,'booking_application_id=>1\nweight=>500\nlength=>100\nwidth=>100\nheight=>100\nradius=>100\ndiameter=>100\nunit=>3\ncreated_by=>45\nupdated_at=>2021-08-22 00:33:37\ncreated_at=>2021-08-22 00:33:37\n','2021-08-22 00:33:37','45','2021-08-22 00:33:37'),

(91,'booking_cargos','create',NULL,'booking_application_id=>1\nweight=>500\nlength=>100\nwidth=>100\nheight=>100\nradius=>100\ndiameter=>150\nunit=>5\ncreated_by=>45\nupdated_at=>2021-08-22 00:37:45\ncreated_at=>2021-08-22 00:37:45\n','2021-08-22 00:37:45','45','2021-08-22 00:37:45'),

(92,'booking_cargos','create',NULL,'booking_application_id=>1\nweight=>500\nlength=>100\nwidth=>100\nheight=>100\nradius=>100\ndiameter=>200\nunit=>5\ncreated_by=>45\nupdated_at=>2021-08-22 00:39:56\ncreated_at=>2021-08-22 00:39:56\n','2021-08-22 00:39:56','45','2021-08-22 00:39:56'),

(93,'booking_applications','create','2','origin=>johor port\ndestination=>gombak\ndistance=>450\ncreated_by=>45\nuser_id=>45\nupdated_at=>2021-08-22 09:19:17\ncreated_at=>2021-08-22 09:19:17\nid=>2\n','2021-08-22 09:19:17','45','2021-08-22 09:19:17'),

(94,'booking_cargos','create',NULL,'booking_application_id=>2\nweight=>500\nlength=>100\nwidth=>100\nheight=>100\nradius=>100\ndiameter=>100\nunit=>5\ncreated_by=>45\nupdated_at=>2021-08-22 09:19:35\ncreated_at=>2021-08-22 09:19:35\n','2021-08-22 09:19:35','45','2021-08-22 09:19:35'),

(95,'booking_applications','create','3','origin=>A\ndestination=>B\ndistance=>100\ncreated_by=>45\nuser_id=>45\nupdated_at=>2021-08-22 10:11:22\ncreated_at=>2021-08-22 10:11:22\nid=>3\n','2021-08-22 10:11:22','45','2021-08-22 10:11:22'),

(96,'booking_cargos','create',NULL,'booking_application_id=>3\nweight=>500\nlength=>100\nwidth=>100\nheight=>100\nradius=>100\ndiameter=>100\nunit=>5\ncreated_by=>45\nupdated_at=>2021-08-22 10:12:13\ncreated_at=>2021-08-22 10:12:13\n','2021-08-22 10:12:13','45','2021-08-22 10:12:13'),

(97,'booking_cargos','create',NULL,'booking_application_id=>3\nweight=>500\nlength=>100\nwidth=>100\nheight=>100\nradius=>100\ndiameter=>100\nunit=>5\ncreated_by=>45\nupdated_at=>2021-08-22 10:21:29\ncreated_at=>2021-08-22 10:21:29\n','2021-08-22 10:21:29','45','2021-08-22 10:21:29'),

(98,'booking_applications','create','4','origin=>A\ndestination=>B\ndistance=>300\ncreated_by=>45\nuser_id=>45\nupdated_at=>2021-09-05 10:11:57\ncreated_at=>2021-09-05 10:11:57\nid=>4\n','2021-09-05 10:11:57','45','2021-09-05 10:11:57'),

(99,'booking_cargos','create',NULL,'booking_application_id=>3\nweight=>45\nheight=>200\ncargo_type=>1\nwidth=>100\nlength=>100\nunit=>3\ncreated_by=>45\nupdated_at=>2021-09-18 22:56:22\ncreated_at=>2021-09-18 22:56:22\n','2021-09-18 22:56:22','45','2021-09-18 22:56:22'),

(100,'booking_cargos','create',NULL,'booking_application_id=>3\nweight=>45\nheight=>200\ncargo_type=>2\nradius=>300\ndiameter=>300\nunit=>3\ncreated_by=>45\nupdated_at=>2021-09-18 22:59:41\ncreated_at=>2021-09-18 22:59:41\n','2021-09-18 22:59:41','45','2021-09-18 22:59:41'),

(101,'booking_cargos','create',NULL,'booking_application_id=>3\nweight=>100\nheight=>100\ncargo_type=>2\ndiameter=>300\nradius=>150\nunit=>5\ncreated_by=>45\nupdated_at=>2021-09-19 10:17:19\ncreated_at=>2021-09-19 10:17:19\n','2021-09-19 10:17:19','45','2021-09-19 10:17:19'),

(102,'booking_applications','create','5','origin=>ABC\ndestination=>XYZ\ndistance=>300\ncreated_by=>45\nuser_id=>45\nupdated_at=>2021-10-24 10:20:23\ncreated_at=>2021-10-24 10:20:23\nid=>5\n','2021-10-24 10:20:23','45','2021-10-24 10:20:23'),

(103,'booking_cargos','create',NULL,'booking_application_id=>5\nweight=>45\nheight=>200\nwidth=>100\nlength=>100\nunit=>3\ncreated_by=>45\nupdated_at=>2021-10-24 10:20:35\ncreated_at=>2021-10-24 10:20:35\n','2021-10-24 10:20:35','45','2021-10-24 10:20:35'),

(104,'booking_cargos','create',NULL,'booking_application_id=>5\nweight=>3\nheight=>200\ncargo_type=>1\nwidth=>100\nlength=>100\nunit=>5\ncreated_by=>45\nupdated_at=>2021-10-24 10:26:13\ncreated_at=>2021-10-24 10:26:13\n','2021-10-24 10:26:13','45','2021-10-24 10:26:13'),

(105,'bookings','update','1','delivery_date=>=>2021-12-07\nupdated_by=>=>45\nvehicle_type_id=>2=>Lori 1 tan\n','2021-11-06 22:01:59','1','2021-11-06 22:01:59'),

(106,'bookings','update','1','delivery_date=>=>2021-12-11\nupdated_by=>=>45\n','2021-11-06 22:02:41','1','2021-11-06 22:02:41'),

(107,'bookings','update','1','delivery_date=>2021-12-11=>2022-01-08\n','2021-11-06 22:11:41','1','2021-11-06 22:11:41'),

(108,'booking_cargos','create',NULL,'booking_application_id=>4\nweight=>45\nheight=>200\ncargo_type=>1\nwidth=>100\nlength=>100\nunit=>3\ncreated_by=>45\nupdated_at=>2021-11-07 10:02:53\ncreated_at=>2021-11-07 10:02:53\n','2021-11-07 10:02:53','45','2021-11-07 10:02:53'),

(109,'bookings','update','1','delivery_date=>2022-01-08=>2022-01-20\n','2021-11-27 23:17:29','1','2021-11-27 23:17:29');

/*Table structure for table `user_groups` */

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nama Kumpulan Pengguna',
  `active` int(11) DEFAULT '1' COMMENT 'Status Aktif',
  `roles` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Peranan',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Kumpulan Pengguna';

/*Data for the table `user_groups` */

insert  into `user_groups`(`id`,`name`,`active`,`roles`,`created_at`,`updated_at`,`created_by`,`updated_by`) values 

(1,'User',1,'4','2020-04-17 18:53:19','2020-04-17 20:30:38',NULL,'1'),

(2,'System Admin',1,NULL,'2020-04-17 18:53:27',NULL,NULL,NULL),

(3,'Company',1,NULL,'2020-04-17 18:53:38',NULL,NULL,NULL);

/*Table structure for table `user_types` */

DROP TABLE IF EXISTS `user_types`;

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kekunci Primer',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Nama Jenis Pengguna',
  `show_in_list` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Cipta',
  `created_by` varchar(255) DEFAULT NULL COMMENT 'Dicipta Oleh',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Tarikh Kemaskini',
  `updated_by` varchar(255) DEFAULT NULL COMMENT 'Dikemaskini Oleh',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Jenis Pengguna';

/*Data for the table `user_types` */

insert  into `user_types`(`id`,`name`,`show_in_list`,`active`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 

(1,'FACTOHUB ADMIN',1,1,NULL,NULL,NULL,NULL),

(2,'ACCOUNT HOLDER',1,1,NULL,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cpy_reg_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `uid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mykad` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `passwordmd5` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` int(11) DEFAULT '0',
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_group_id` int(11) DEFAULT '1',
  `password_change_at` timestamp NULL DEFAULT NULL,
  `user_type_id` int(11) DEFAULT '1',
  `branch_id` int(11) DEFAULT '0',
  `account_holder_id` int(11) DEFAULT NULL,
  `agency_id` int(11) DEFAULT NULL,
  `oilco_id` int(11) DEFAULT NULL,
  `google2fa_secret` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `use2fa` int(11) DEFAULT '0',
  `xsessionid` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `xexpires` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`cpy_reg_no`,`uid`,`email`,`mykad`,`phone`,`verified`,`email_verified_at`,`password`,`remember_token`,`active`,`created_at`,`updated_at`,`passwordmd5`,`is_admin`,`created_by`,`updated_by`,`user_group_id`,`password_change_at`,`user_type_id`,`branch_id`,`account_holder_id`,`agency_id`,`oilco_id`,`google2fa_secret`,`use2fa`,`xsessionid`,`xexpires`) values 

(1,'MOHAMAD FAIROL ZAMZURI BIN CHE SAYUTI',NULL,'fairol','mfz_peyo@yahoo.com','800806035591','0129643646',1,NULL,'$2y$10$ODpw6CCBigDfIyaSfzhxe.zeQKtRhAHwmcKJh0DrmDE1.FX00iKu.','s34yRj1ZJSuCzFm3N4Ibj7Qs30pBOhr95Xh5UO6cp2JRaYk8ymdENYjfgm9Z',1,'2020-02-24 19:14:45','2020-11-16 11:25:10','5f4dcc3b5aa765d61d8327deb882cf99',1,NULL,'MOHAMAD FAIROL ZAMZURI BIN CHE SAYUTI',1,NULL,1,12,4293,1,5,'TTBCLOJFVEMYCOUP',0,NULL,NULL),

(45,'sue',NULL,NULL,'sohailah.safie@yahoo.com',NULL,'0173195605',1,NULL,'$2y$10$uMPUGP9XAWc/BuIr6p4Q0OKCUTntSxuMpAgV0f3VRoqrNMYF0zd8W',NULL,1,'2021-03-27 21:38:42','2022-04-27 08:12:35',NULL,0,NULL,NULL,1,NULL,2,0,NULL,NULL,NULL,NULL,0,'ZrPUXNlaMmESwMSYRbJ9tlXig_ztEtpYMoRqmPNox9Wfv4_gHxI2I4rVOL0iQY0tfdocxzEdNS9lXsC_ryvGvA','Fri, 22-Apr-2022 12:31:16 UTC'),

(46,'customer A',NULL,NULL,'sohailah.s@gmail.com',NULL,'0173195605',1,NULL,'$2y$10$JpsQ8ir8C2fe42GwLzqmgeTfHuFdjvY4NzzaqQ8Dkml7A7scCHjMO',NULL,1,'2021-03-28 14:40:01','2021-03-28 14:40:01',NULL,0,NULL,NULL,1,NULL,2,0,NULL,NULL,NULL,NULL,0,NULL,NULL);

/*Table structure for table `vehicle_types` */

DROP TABLE IF EXISTS `vehicle_types`;

CREATE TABLE `vehicle_types` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `vehicle_types` */

insert  into `vehicle_types`(`id`,`name`,`created_at`,`created_by`,`updated_at`,`updated_by`) values 

(1,'Van',NULL,NULL,NULL,NULL),

(2,'Lori 1 tan',NULL,NULL,NULL,NULL),

(3,'Lori 3 tan','2021-03-28 10:39:27',1,'2021-03-28 10:39:27',NULL),

(4,'Lori 5 tan',NULL,NULL,NULL,NULL),

(5,'Lori 10 tan',NULL,NULL,NULL,NULL),

(6,'Lori 20 tan',NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
