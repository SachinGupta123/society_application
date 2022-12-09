-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 02, 2019 at 08:58 PM
-- Server version: 5.5.62
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msociety`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_entity_master`
--

DROP TABLE IF EXISTS `business_entity_master`;
CREATE TABLE IF NOT EXISTS `business_entity_master` (
  `business_id` int(11) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(255) DEFAULT NULL,
  `business_type` varchar(255) DEFAULT NULL,
  `business_address` text,
  `correpond_address` text,
  `business_phone` varchar(12) DEFAULT NULL,
  `business_email` varchar(100) DEFAULT NULL,
  `business_owner_name` varchar(255) DEFAULT NULL,
  `business_owner_designation` varchar(255) DEFAULT NULL,
  `business_owner_phone` varchar(12) DEFAULT NULL,
  `business_owner_email` varchar(100) DEFAULT NULL,
  `business_activity` varchar(100) DEFAULT NULL,
  `business_registration_number` varchar(50) DEFAULT NULL,
  `business_registration_date` date DEFAULT NULL,
  `business_on_boardind_date` datetime DEFAULT NULL,
  `no_of_employee` int(11) DEFAULT NULL,
  PRIMARY KEY (`business_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Dumping data for table `business_entity_master`
--

INSERT INTO `business_entity_master` (`business_id`, `business_name`, `business_type`, `business_address`, `correpond_address`, `business_phone`, `business_email`, `business_owner_name`, `business_owner_designation`, `business_owner_phone`, `business_owner_email`, `business_activity`, `business_registration_number`, `business_registration_date`, `business_on_boardind_date`, `no_of_employee`) VALUES
(1, 'Carnelian Payment Network', 'FinTech', 'Vasai West', 'Vasai West', '9870654321', 'info@paynet.co.in', 'Anis Warsi', 'CEO', '9988776655', 'anis@paynet.co.in', 'Financial Technology', 'REG1234CPN', '0000-00-00', '0000-00-00 00:00:00', 10),
(2, 'Dark Horse Media', 'Media House', 'Vasai', 'Vasai', '1234567890', 'info@darkhorsemedia.com', 'Dhawal Mahatre', 'Properitory', '9876543210', 'dhawal@darkhorsemedia.com', 'Marketking and Website', '1234567', '0000-00-00', '0000-00-00 00:00:00', 15);

-- --------------------------------------------------------

--
-- Table structure for table `business_premises_amenity_access`
--

DROP TABLE IF EXISTS `business_premises_amenity_access`;
CREATE TABLE IF NOT EXISTS `business_premises_amenity_access` (
  `bpaa_id` int(11) NOT NULL AUTO_INCREMENT,
  `papm_id` int(11) NOT NULL,
  `access_unit_quantity` text NOT NULL,
  `acess_start_dnt` datetime NOT NULL,
  `access_end_dnt` datetime NOT NULL,
  `access_cost` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `access_cost_toatal` double(10,2) NOT NULL,
  `dnt` datetime NOT NULL,
  `business_id` int(11) NOT NULL,
  PRIMARY KEY (`bpaa_id`),
  UNIQUE KEY `fk_papm_bpaa_1` (`papm_id`),
  UNIQUE KEY `fk_bem_bpaa_2` (`business_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `business_premises_unit`
--

DROP TABLE IF EXISTS `business_premises_unit`;
CREATE TABLE IF NOT EXISTS `business_premises_unit` (
  `bpud_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `pud_id` int(11) NOT NULL,
  `ppm_id` int(11) NOT NULL,
  `pup_value` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `period` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `billing_cycle` enum('Daily','Monthly','Quaterly','Yearly') NOT NULL,
  `billing_amount` double(10,2) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `period_unit` enum('Day','Week','Month','Year') NOT NULL,
  PRIMARY KEY (`bpud_id`),
  UNIQUE KEY `fk_bem_bpu_1` (`business_id`),
  UNIQUE KEY `fk_pud_bpu_2` (`pud_id`),
  UNIQUE KEY `fk_ppm_bpu_3` (`ppm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Dumping data for table `business_premises_unit`
--

INSERT INTO `business_premises_unit` (`bpud_id`, `business_id`, `pud_id`, `ppm_id`, `pup_value`, `discount`, `period`, `start_date`, `end_date`, `billing_cycle`, `billing_amount`, `tax_id`, `period_unit`) VALUES
(0, 2, 2, 8, 18000.00, 0.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Monthly', 18000.00, 1, 'Month');

-- --------------------------------------------------------

--
-- Table structure for table `cowork_access`
--

DROP TABLE IF EXISTS `cowork_access`;
CREATE TABLE IF NOT EXISTS `cowork_access` (
  `ca_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cowork_id` int(11) NOT NULL,
  `premises_id` int(11) NOT NULL,
  PRIMARY KEY (`ca_id`),
  UNIQUE KEY `fk_user_ca_1` (`user_id`),
  UNIQUE KEY `fk_cw_ca_2` (`cowork_id`),
  UNIQUE KEY `fk_pm_ca_3` (`premises_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `cowork_bill`
--

DROP TABLE IF EXISTS `cowork_bill`;
CREATE TABLE IF NOT EXISTS `cowork_bill` (
  `cb_id` int(11) NOT NULL AUTO_INCREMENT,
  `cb_no` varchar(50) NOT NULL,
  `cowork_id` int(11) NOT NULL,
  `premises_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `dnt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cb_due_date` datetime NOT NULL,
  `cb_amount` double(10,2) NOT NULL,
  `cb_date` datetime NOT NULL,
  PRIMARY KEY (`cb_id`),
  UNIQUE KEY `fk_cw_cb_1` (`cowork_id`),
  UNIQUE KEY `fk_pm_cb_2` (`premises_id`),
  UNIQUE KEY `fk_um_cb_3` (`unit_id`),
  UNIQUE KEY `fk_bem_cb_4` (`business_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `cowork_bill_unit_details`
--

DROP TABLE IF EXISTS `cowork_bill_unit_details`;
CREATE TABLE IF NOT EXISTS `cowork_bill_unit_details` (
  `cwbud_id` int(11) NOT NULL AUTO_INCREMENT,
  `cb_id` int(11) NOT NULL,
  `bpud_id` int(11) NOT NULL,
  `bpud_amount` double(10,2) NOT NULL,
  PRIMARY KEY (`cwbud_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `cowork_master`
--

DROP TABLE IF EXISTS `cowork_master`;
CREATE TABLE IF NOT EXISTS `cowork_master` (
  `cowork_id` int(11) NOT NULL AUTO_INCREMENT,
  `cowork_name` varchar(255) NOT NULL,
  `registered_address` text NOT NULL,
  `mobile_number` varchar(12) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `no_of_premises` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_email` varchar(100) NOT NULL,
  `on_boarding_dnt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cowork_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Dumping data for table `cowork_master`
--

INSERT INTO `cowork_master` (`cowork_id`, `cowork_name`, `registered_address`, `mobile_number`, `email_id`, `no_of_premises`, `owner_name`, `owner_email`, `on_boarding_dnt`) VALUES
(1, 'dFactory', 'dFactory, Unit 1, Kini Arcade,\r\nBehind Stella Petrol Pump, Vasai', '07666766861', 'ashish@paynetpayments.com', 2, 'Dhawal Mathre', 'dhawal@dfactory.com', '2019-09-30 11:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `member_arrears`
--

DROP TABLE IF EXISTS `member_arrears`;
CREATE TABLE IF NOT EXISTS `member_arrears` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `old_arrears` double NOT NULL,
  `new_arrears` double NOT NULL,
  `dnt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_interest`
--

DROP TABLE IF EXISTS `member_interest`;
CREATE TABLE IF NOT EXISTS `member_interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `old_interest` double NOT NULL,
  `new_interest` double NOT NULL,
  `dnt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification_master`
--

DROP TABLE IF EXISTS `notification_master`;
CREATE TABLE IF NOT EXISTS `notification_master` (
  `notification_id` int(11) NOT NULL,
  `notification_type` enum('info','message','ad','transaction','bill','request','approval') NOT NULL,
  `notification_message` text NOT NULL,
  `dnt` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`notification_id`),
  UNIQUE KEY `fk_u_nm_1` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `permises_master`
--

DROP TABLE IF EXISTS `permises_master`;
CREATE TABLE IF NOT EXISTS `permises_master` (
  `premises_id` int(11) NOT NULL AUTO_INCREMENT,
  `premises_name` varchar(255) NOT NULL,
  `premises_address` text NOT NULL,
  `no_of_units` bigint(20) NOT NULL,
  `on_boarding_dnt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cowork_id` int(11) NOT NULL,
  PRIMARY KEY (`premises_id`),
  UNIQUE KEY `fk_cw_pm_1` (`cowork_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Dumping data for table `permises_master`
--

INSERT INTO `permises_master` (`premises_id`, `premises_name`, `premises_address`, `no_of_units`, `on_boarding_dnt`, `cowork_id`) VALUES
(1, 'Kini Aracade', 'Kini Arcade, Behind Stella Petrol Pump, Vasai West', 20, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `premises_amenities_master`
--

DROP TABLE IF EXISTS `premises_amenities_master`;
CREATE TABLE IF NOT EXISTS `premises_amenities_master` (
  `pam_id` int(11) NOT NULL AUTO_INCREMENT,
  `permises_id` int(11) DEFAULT NULL,
  `amenity_name` text,
  `amenity_usage_unit` enum('quantity','hour') DEFAULT NULL,
  PRIMARY KEY (`pam_id`),
  UNIQUE KEY `fk_pm_pam_1` (`permises_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `premises_amenity_pricing_master`
--

DROP TABLE IF EXISTS `premises_amenity_pricing_master`;
CREATE TABLE IF NOT EXISTS `premises_amenity_pricing_master` (
  `papm_id` int(11) NOT NULL AUTO_INCREMENT,
  `pam_id` int(11) NOT NULL,
  `base_price` double(10,2) NOT NULL,
  PRIMARY KEY (`papm_id`),
  UNIQUE KEY `fk_pam_papm_1` (`pam_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table `premises_pricing_master`
--

DROP TABLE IF EXISTS `premises_pricing_master`;
CREATE TABLE IF NOT EXISTS `premises_pricing_master` (
  `ppm_id` int(11) NOT NULL AUTO_INCREMENT,
  `permises_id` int(11) NOT NULL,
  `unit_type_id` int(11) NOT NULL,
  `pricing_type` enum('Hourly','Daily','Monthly','Quaterly','Yearly') NOT NULL,
  `base_price` float(10,2) NOT NULL,
  PRIMARY KEY (`ppm_id`),
  KEY `fk_pm_ppm_1` (`permises_id`) USING BTREE,
  KEY `fk_utm_ppm_2` (`unit_type_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Dumping data for table `premises_pricing_master`
--

INSERT INTO `premises_pricing_master` (`ppm_id`, `permises_id`, `unit_type_id`, `pricing_type`, `base_price`) VALUES
(1, 1, 1, 'Daily', 500.00),
(2, 1, 1, 'Monthly', 10000.00),
(3, 1, 1, 'Quaterly', 35000.00),
(4, 1, 1, 'Yearly', 100000.00),
(5, 1, 4, 'Daily', 2000.00),
(6, 1, 4, 'Monthly', 50000.00),
(7, 1, 4, 'Quaterly', 150000.00),
(8, 1, 2, 'Monthly', 18000.00);

-- --------------------------------------------------------

--
-- Table structure for table `premises_unit_defination_master`
--

DROP TABLE IF EXISTS `premises_unit_defination_master`;
CREATE TABLE IF NOT EXISTS `premises_unit_defination_master` (
  `pud_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_type_id` int(11) NOT NULL,
  `premises_id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `unit_no` varchar(20) NOT NULL,
  `is_vacant` tinyint(1) NOT NULL,
  PRIMARY KEY (`pud_id`),
  KEY `fk_pm_pud_2` (`premises_id`) USING BTREE,
  KEY `fk_utm_pud_1` (`unit_type_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Dumping data for table `premises_unit_defination_master`
--

INSERT INTO `premises_unit_defination_master` (`pud_id`, `unit_type_id`, `premises_id`, `capacity`, `unit_no`, `is_vacant`) VALUES
(1, 2, 1, 6, '1', 1),
(2, 2, 1, 10, '2', 1),
(3, 1, 1, 1, '3', 1),
(4, 1, 1, 1, '4', 1),
(5, 1, 1, 1, '5', 1),
(6, 1, 1, 2, '6', 1),
(7, 1, 1, 2, '7', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tax_master`
--

DROP TABLE IF EXISTS `tax_master`;
CREATE TABLE IF NOT EXISTS `tax_master` (
  `tax_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_name` varchar(100) NOT NULL,
  `tax_value` double(10,2) NOT NULL,
  `cowork_id` int(11) NOT NULL,
  PRIMARY KEY (`tax_id`),
  UNIQUE KEY `fk_cm_tax_1` (`cowork_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Dumping data for table `tax_master`
--

INSERT INTO `tax_master` (`tax_id`, `tax_name`, `tax_value`, `cowork_id`) VALUES
(1, 'GST', 18.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_type_master`
--

DROP TABLE IF EXISTS `unit_type_master`;
CREATE TABLE IF NOT EXISTS `unit_type_master` (
  `unit_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_type_name` varchar(255) NOT NULL,
  `unit_capacity` int(11) NOT NULL,
  `premises_id` int(11) NOT NULL,
  PRIMARY KEY (`unit_type_id`),
  KEY `fk_pm_utm_1` (`premises_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Dumping data for table `unit_type_master`
--

INSERT INTO `unit_type_master` (`unit_type_id`, `unit_type_name`, `unit_capacity`, `premises_id`) VALUES
(1, 'Single Seater', 1, 1),
(2, 'Open Cabin', 5, 1),
(3, 'Closed Cabin', 6, 1),
(4, 'Cubical 1', 4, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
