-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 02, 2019 at 09:00 PM
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
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE IF NOT EXISTS `activity_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `params` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `ifsc` varchar(255) DEFAULT NULL,
  `micr` varchar(255) DEFAULT NULL,
  `ac_no` bigint(20) DEFAULT NULL,
  `from_dt` date DEFAULT NULL,
  `exp_dt` date DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `society_id` int(11) DEFAULT NULL,
  `opening_balance` decimal(15,2) DEFAULT NULL,
  `current_balance` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `address`, `branch`, `ifsc`, `micr`, `ac_no`, `from_dt`, `exp_dt`, `phone`, `email`, `updated_at`, `society_id`, `opening_balance`, `current_balance`) VALUES
(1, 'Kotak Mahindra Bank', 'Vasai', 'Vasai', 'KOTB0000042', '', 1234567890987, NULL, NULL, 9876543209, 'info@kotak.com', '2019-10-01 09:19:27', 1, '8999.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_transactions`
--

DROP TABLE IF EXISTS `bank_transactions`;
CREATE TABLE IF NOT EXISTS `bank_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NULL DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL,
  `credit` decimal(20,2) DEFAULT NULL,
  `debit` decimal(20,2) DEFAULT NULL,
  `balance` decimal(20,2) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bank_id` int(11) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `is_cash` tinyint(1) DEFAULT '0',
  `is_arrears` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing_heads`
--

DROP TABLE IF EXISTS `billing_heads`;
CREATE TABLE IF NOT EXISTS `billing_heads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT '0',
  `society_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_unit_value` tinyint(1) DEFAULT '0',
  `flat_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_heads`
--

INSERT INTO `billing_heads` (`id`, `name`, `amount`, `society_id`, `updated_at`, `is_unit_value`, `flat_type_id`) VALUES
(1, 'Single Seater', 3000, 1, '2019-10-01 09:07:23', NULL, 1),
(2, 'Cabin', 18000, 1, '2019-10-01 09:07:54', NULL, 2),
(3, 'Cabin', 9000, 1, '2019-10-01 09:08:29', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

DROP TABLE IF EXISTS `bill_details`;
CREATE TABLE IF NOT EXISTS `bill_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) DEFAULT NULL,
  `bill_amount` decimal(15,2) DEFAULT NULL,
  `previous_member_balance` decimal(15,2) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `details` text,
  `member_id` int(11) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `bill_month` varchar(255) DEFAULT NULL,
  `paid` int(11) DEFAULT '0',
  `interest` decimal(15,2) DEFAULT NULL,
  `principal_arrears` decimal(15,2) DEFAULT NULL,
  `interest_arrears` decimal(15,2) DEFAULT '0.00',
  `total_due` decimal(15,2) DEFAULT '0.00',
  `late_payment_charges` decimal(15,2) DEFAULT '0.00',
  `bill_payment_date` date DEFAULT NULL,
  `bill_payment_id` int(11) DEFAULT NULL,
  `bill_no` int(11) DEFAULT NULL,
  `total_arrears` decimal(15,2) DEFAULT NULL,
  `total_interest_arrears` decimal(15,2) DEFAULT NULL,
  `bill_status` varchar(255) DEFAULT NULL,
  `bill_summary` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NULL DEFAULT NULL,
  `payee` varchar(255) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expense_category_id` int(11) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `service_provider_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

DROP TABLE IF EXISTS `expense_categories`;
CREATE TABLE IF NOT EXISTS `expense_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flat_sub_types`
--

DROP TABLE IF EXISTS `flat_sub_types`;
CREATE TABLE IF NOT EXISTS `flat_sub_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `flat_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flat_types`
--

DROP TABLE IF EXISTS `flat_types`;
CREATE TABLE IF NOT EXISTS `flat_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `society_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flat_types`
--

INSERT INTO `flat_types` (`id`, `name`, `created_at`, `updated_at`, `society_id`) VALUES
(1, 'Single Seater', '2019-10-01 09:02:38', '2019-10-01 09:02:38', 1),
(2, 'Cabin 1', '2019-10-01 09:02:53', '2019-10-01 09:02:53', 1),
(3, 'Cabin 2', '2019-10-01 09:03:08', '2019-10-01 09:03:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'committee_member', 'Committee Member'),
(3, 'operator', 'Operator'),
(4, 'sales', 'Sales'),
(5, 'channel_partner', 'Channel Partner'),
(6, 'company_owner', 'Company Owner'),
(7, 'employee', 'Employee'),
(8, 'members', 'Society Member'),
(9, 'utility_service_provider', 'Utility Service Provider'),
(10, 'utility_member', 'Utility Service Provider Member'),
(11, 'premise_manager', 'Premise Manager'),
(12, 'co_work_owner', 'Co-work Owner'),
(13, 'co_work_admin', 'Co-work Admin'),
(14, 'front_desk_manager', 'Front Desk Manager');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flat_no` varchar(255) DEFAULT NULL,
  `tenant` tinyint(1) DEFAULT '0',
  `phone` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `society_id` int(11) DEFAULT NULL,
  `member_balance` decimal(15,2) DEFAULT '0.00',
  `flat_area` int(11) DEFAULT NULL,
  `principal_arrears` decimal(15,2) DEFAULT '0.00',
  `two_wheelers` varchar(255) NOT NULL,
  `four_wheelers` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `interest_arrears` decimal(15,2) DEFAULT '0.00',
  `flat_type_id` int(11) DEFAULT NULL,
  `flat_sub_type_id` int(11) DEFAULT NULL,
  `wing` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `flat_no`, `tenant`, `phone`, `created_at`, `updated_at`, `society_id`, `member_balance`, `flat_area`, `principal_arrears`, `two_wheelers`, `four_wheelers`, `user_id`, `name`, `email_id`, `interest_arrears`, `flat_type_id`, `flat_sub_type_id`, `wing`) VALUES
(1, '1', NULL, 7666766861, '2019-10-01 09:20:54', '2019-10-01 09:20:54', 1, '0.00', 900, '0.00', '0', '0', 0, 'Dark Horse Media', 'ashish@paynetpayments.com', '0.00', 2, NULL, 'A'),
(2, '1', NULL, 7666766861, '2019-10-01 11:13:40', '2019-10-01 11:13:40', 1, '0.00', 900, '0.00', '0', '0', 0, 'Carnelian Payment Network', 'anis@paynet.co.in', '0.00', 2, NULL, 'A');

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
-- Table structure for table `member_plans`
--

DROP TABLE IF EXISTS `member_plans`;
CREATE TABLE IF NOT EXISTS `member_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20190805155142),
(20190805155142),
(20190805155142),
(20190805155142),
(20190805155142);

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
-- Table structure for table `parking_charges`
--

DROP TABLE IF EXISTS `parking_charges`;
CREATE TABLE IF NOT EXISTS `parking_charges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_two_wheeler` decimal(10,2) DEFAULT NULL,
  `tenant_two_wheeler` decimal(10,2) DEFAULT NULL,
  `member_four_wheeler` decimal(10,2) DEFAULT NULL,
  `tenant_four_wheeler` decimal(10,2) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_charges`
--

INSERT INTO `parking_charges` (`id`, `member_two_wheeler`, `tenant_two_wheeler`, `member_four_wheeler`, `tenant_four_wheeler`, `society_id`, `created_at`, `updated_at`) VALUES
(1, '0.00', '0.00', '0.00', '0.00', 1, '2019-10-01 09:09:18', '2019-10-01 09:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_date` varchar(255) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL,
  `credit` decimal(15,2) DEFAULT NULL,
  `debit` decimal(15,2) DEFAULT NULL,
  `balance` decimal(15,2) DEFAULT NULL,
  `paid_by` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `member_id` int(11) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `arrears` decimal(15,2) DEFAULT '0.00',
  `bill_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `cheque_no` bigint(20) DEFAULT NULL,
  `is_cash` tinyint(1) DEFAULT '0',
  `is_arrears` tinyint(1) DEFAULT '0',
  `is_credit_note` tinyint(1) DEFAULT '0',
  `is_debit_note` tinyint(1) DEFAULT '0',
  `is_reversal` tinyint(1) DEFAULT '0',
  `depositor_bank` varchar(255) DEFAULT NULL,
  `receipt_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Admin'),
(3, 'Operator'),
(4, 'Sales'),
(5, 'Channel Partner'),
(6, 'Company Owner'),
(7, 'Employee'),
(8, 'Society Member'),
(9, 'Utility Service Provider'),
(10, 'Utility Service Provider Member'),
(11, 'Premise Manager'),
(12, 'Co-work Owner'),
(13, 'Co-work Admin'),
(14, 'Front Desk Manager');

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

DROP TABLE IF EXISTS `service_providers`;
CREATE TABLE IF NOT EXISTS `service_providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `sp_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(255) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `societies`
--

DROP TABLE IF EXISTS `societies`;
CREATE TABLE IF NOT EXISTS `societies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `registration_no` varchar(255) DEFAULT NULL,
  `no_of_flats` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `opening_balance` bigint(20) DEFAULT NULL,
  `billing_head_id` int(11) DEFAULT NULL,
  `image_file_name` varchar(255) DEFAULT NULL,
  `image_content_type` varchar(255) DEFAULT NULL,
  `image_file_size` int(11) DEFAULT NULL,
  `image_updated_at` timestamp NULL DEFAULT NULL,
  `interest_type` varchar(255) DEFAULT NULL,
  `interest_span` varchar(255) DEFAULT NULL,
  `interest_rate` double DEFAULT NULL,
  `bill_day` int(11) DEFAULT NULL,
  `due_day` int(11) DEFAULT NULL,
  `auto_create_bill` tinyint(1) DEFAULT '0',
  `noc_charge` decimal(8,2) DEFAULT NULL,
  `noc_unit_value` tinyint(1) DEFAULT '0',
  `garden_charge` double DEFAULT '0',
  `garden_unit_value` tinyint(1) DEFAULT '0',
  `terrace_charge` double DEFAULT '0',
  `terrace_unit_value` tinyint(1) DEFAULT '0',
  `villa_charge` double DEFAULT '0',
  `villa_unit_value` tinyint(1) DEFAULT '0',
  `duplex_charge` double DEFAULT '0',
  `duplex_unit_value` tinyint(1) DEFAULT '0',
  `commercial_charge` double DEFAULT '0',
  `commercial_unit_value` tinyint(1) DEFAULT '0',
  `garage_charge` double DEFAULT '0',
  `warehouse_charge` double DEFAULT '0',
  `warehouse_unit_value` tinyint(1) DEFAULT '0',
  `garage_unit_value` tinyint(1) DEFAULT '0',
  `created_by_utility` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `societies`
--

INSERT INTO `societies` (`id`, `name`, `address`, `registration_no`, `no_of_flats`, `created_at`, `updated_at`, `opening_balance`, `billing_head_id`, `image_file_name`, `image_content_type`, `image_file_size`, `image_updated_at`, `interest_type`, `interest_span`, `interest_rate`, `bill_day`, `due_day`, `auto_create_bill`, `noc_charge`, `noc_unit_value`, `garden_charge`, `garden_unit_value`, `terrace_charge`, `terrace_unit_value`, `villa_charge`, `villa_unit_value`, `duplex_charge`, `duplex_unit_value`, `commercial_charge`, `commercial_unit_value`, `garage_charge`, `warehouse_charge`, `warehouse_unit_value`, `garage_unit_value`, `created_by_utility`) VALUES
(1, 'dFactory', 'dFactory, Unit 1, Kini Arcade,', '123456789', '20', '2019-10-01 09:02:03', '2019-10-01 09:02:03', 10000, NULL, '', NULL, NULL, NULL, 'Fixed Penalty', 'Monthly', 0, 1, 5, NULL, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `society_accesses`
--

DROP TABLE IF EXISTS `society_accesses`;
CREATE TABLE IF NOT EXISTS `society_accesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_accesses`
--

INSERT INTO `society_accesses` (`id`, `user_id`, `role_id`, `society_id`, `created_at`, `updated_at`) VALUES
(1, 0, 8, 1, '2019-10-01 09:20:54', '2019-10-01 09:20:54'),
(2, 0, 8, 1, '2019-10-01 11:13:40', '2019-10-01 11:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `society_enrollment_requests`
--

DROP TABLE IF EXISTS `society_enrollment_requests`;
CREATE TABLE IF NOT EXISTS `society_enrollment_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `society_name` varchar(255) DEFAULT NULL,
  `society_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `span` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `society_member_balance`
--

DROP TABLE IF EXISTS `society_member_balance`;
CREATE TABLE IF NOT EXISTS `society_member_balance` (
  `member_balance_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `old_balance` double(10,2) NOT NULL,
  `new_balance` double(10,2) NOT NULL,
  `dnt` datetime NOT NULL,
  PRIMARY KEY (`member_balance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `society_member_bill_payment_logs`
--

DROP TABLE IF EXISTS `society_member_bill_payment_logs`;
CREATE TABLE IF NOT EXISTS `society_member_bill_payment_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `type` enum('BILL','PAYMENT','DEBITNOTE','CREDITNOTE') NOT NULL,
  `dnt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `society_member_bill_payment_transaction_log`
--

DROP TABLE IF EXISTS `society_member_bill_payment_transaction_log`;
CREATE TABLE IF NOT EXISTS `society_member_bill_payment_transaction_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `narration` enum('BILLDUE','AMOUNTPAID','ARREARSPAID','INTERESTPAID','CREDITNOTE','DEBITNOTE') NOT NULL,
  `credit` double NOT NULL,
  `debit` double NOT NULL,
  `balance` double NOT NULL,
  `dnt` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `society_service_providers`
--

DROP TABLE IF EXISTS `society_service_providers`;
CREATE TABLE IF NOT EXISTS `society_service_providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `society_id` int(11) DEFAULT NULL,
  `service_provider_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `up_billing_heads`
--

DROP TABLE IF EXISTS `up_billing_heads`;
CREATE TABLE IF NOT EXISTS `up_billing_heads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_unit_value` tinyint(1) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `utility_service_provider_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `utility_plan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `up_bill_details`
--

DROP TABLE IF EXISTS `up_bill_details`;
CREATE TABLE IF NOT EXISTS `up_bill_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `bill_amount` double DEFAULT NULL,
  `service_charge` double DEFAULT NULL,
  `service_tax` double DEFAULT NULL,
  `total_due` double DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `utility_service_provider_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `bill_status` varchar(255) DEFAULT NULL,
  `total_arrears` double DEFAULT NULL,
  `previous_member_balance` double DEFAULT NULL,
  `bill_summary` varchar(255) DEFAULT NULL,
  `bill_no` int(11) DEFAULT NULL,
  `bill_month` date DEFAULT NULL,
  `previous_outstanding` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `up_payments`
--

DROP TABLE IF EXISTS `up_payments`;
CREATE TABLE IF NOT EXISTS `up_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_date` timestamp NULL DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL,
  `credit` decimal(15,2) DEFAULT NULL,
  `debit` decimal(15,2) DEFAULT NULL,
  `balance` decimal(15,2) DEFAULT NULL,
  `paid_by` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `utility_service_provider_id` int(11) DEFAULT NULL,
  `receipt_id` int(11) DEFAULT NULL,
  `cheque_no` int(11) DEFAULT NULL,
  `depositor_bank` varchar(255) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `is_cash` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$rvafO7pPZ0mR4fEiTWLfxubdvLj52nEnBUATDCGkVNmBkmkxHQM0e', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1569910455, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'ashish@paynetpayments.com', '$2y$10$6FNL2zKMvTamGj0RrU9.Neva5myuGx01wadQtWlvWHSMnvvJ/3QBy', 'ashish@paynetpayments.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1569921653, NULL, 1, 'Dark Horse Media', '', '', '07666766861'),
(3, '::1', 'anis@paynet.co.in', '$2y$10$z3scbmPE4.buEqsKzSDEuuTXsbXUdCI.dABvVIhc4DE0ocu7lHg0q', 'anis@paynet.co.in', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1569921724, NULL, 1, 'Carnelian Payment Network', '', '', '07666766861');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
