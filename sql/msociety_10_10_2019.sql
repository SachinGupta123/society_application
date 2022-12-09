-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2019 at 02:32 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_arrears`
--

DROP TABLE IF EXISTS `member_arrears`;
CREATE TABLE IF NOT EXISTS `member_arrears` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `old_arrears` double DEFAULT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `old_balance` double(10,2) DEFAULT NULL,
  `new_balance` double(10,2) NOT NULL,
  `dnt` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
