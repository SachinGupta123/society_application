-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 03:26 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE IF NOT EXISTS `activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `params` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) NOT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `society_id` int(11) DEFAULT NULL,
  `opening_balance` decimal(15,2) DEFAULT NULL,
  `current_balance` decimal(15,2) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `address`, `branch`, `ifsc`, `micr`, `ac_no`, `from_dt`, `exp_dt`, `phone`, `email`, `created_at`, `updated_at`, `society_id`, `opening_balance`, `current_balance`) VALUES
(1, 'HDFC Bank', 'vasai west', 'vasai manikpur', 'HDFCBN00001', '', 123456789012, NULL, NULL, 9765432109, 'hdfc@gmail.com', '2019-09-11 07:03:17', '2019-09-11 07:03:17', 1, '5000.00', NULL),
(2, 'IDBI Limited', 'vasai west', 'vasai bhabola', 'HDFCBN00002', '', 123456789013, NULL, NULL, 9889076556, 'idbi@gmail.com', '2019-09-11 07:04:42', '2019-09-11 07:04:42', 1, '10000.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_transactions`
--

CREATE TABLE IF NOT EXISTS `bank_transactions` (
  `id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL,
  `credit` decimal(20,2) DEFAULT NULL,
  `debit` decimal(20,2) DEFAULT NULL,
  `balance` decimal(20,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bank_id` int(11) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `is_cash` tinyint(1) DEFAULT '0',
  `is_arrears` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_transactions`
--

INSERT INTO `bank_transactions` (`id`, `date`, `narration`, `credit`, `debit`, `balance`, `created_at`, `updated_at`, `bank_id`, `society_id`, `expense_id`, `is_cash`, `is_arrears`) VALUES
(1, '2019-09-11 06:30:00', 'cash transaction', '780.00', NULL, '780.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(2, '2019-09-10 18:30:00', 'cash transaction', '800.00', NULL, '800.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(3, '2019-09-10 18:30:00', 'cash transaction', '780.00', NULL, '780.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(4, '2019-09-11 18:30:00', 'cash transaction', '70.00', NULL, '70.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(5, '2019-09-11 18:30:00', 'cheque transaction', '915.00', NULL, '915.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 1, NULL, 0, 0),
(6, '2019-09-11 21:34:00', 'cash transaction', '6.00', NULL, '6.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(7, '2019-09-11 22:25:00', 'cash transaction', '1.00', NULL, '1.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(8, '2019-09-11 22:35:00', 'cheque transaction', '660.00', NULL, '660.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 1, NULL, 0, 0),
(9, '0000-00-00 00:00:00', 'cash transaction', '200.00', NULL, '200.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(10, '0000-00-00 00:00:00', 'cash transaction', '200.00', NULL, '200.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(11, '2012-09-18 23:44:00', 'cash transaction', '105.00', NULL, '105.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(12, '2019-09-11 23:34:00', 'neft transaction', '500.00', NULL, '500.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(13, '2019-09-13 06:36:00', 'cheque transaction', '650.00', NULL, '650.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 1, NULL, 0, 0),
(14, '2019-09-12 21:16:00', 'neft transaction', '750.00', NULL, '750.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(15, '2019-09-12 21:23:00', 'cash transaction', '25.00', NULL, '25.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(16, '2019-09-12 21:23:00', 'cash transaction', '25.00', NULL, '25.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(17, '2019-09-12 21:23:00', 'cash transaction', '25.00', NULL, '25.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(18, '2019-09-12 21:36:00', 'cash transaction', '915.00', NULL, '915.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(19, '2019-09-14 06:30:00', 'cash transaction', '900.00', NULL, '900.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(20, '2019-09-12 23:43:00', 'cash transaction', '1150.00', NULL, '1150.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(21, '2019-09-13 00:11:00', 'cash transaction', '800.00', NULL, '800.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(22, '2019-09-13 01:11:00', 'cash transaction', '1000.00', NULL, '1000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(23, '2019-09-14 05:02:00', 'cash transaction', '100.00', NULL, '100.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(24, '2019-09-14 05:25:00', 'cash transaction', '1200.00', NULL, '1200.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(25, '2019-09-14 06:43:00', 'cash transaction', '850.00', NULL, '850.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(26, '2019-09-14 07:19:00', 'cash transaction', '1000.00', NULL, '1000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(27, '2019-09-14 07:23:00', 'cash transaction', '110.00', NULL, '110.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(28, '2019-09-13 19:32:00', 'cash transaction', '1200.00', NULL, '1200.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(29, '2019-09-13 19:33:00', 'cash transaction', '138.75', NULL, '138.75', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(30, '2019-09-13 19:36:00', 'cash transaction', '1085.00', NULL, '1085.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `billing_heads`
--

CREATE TABLE IF NOT EXISTS `billing_heads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT '0',
  `society_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_unit_value` tinyint(1) DEFAULT '0',
  `flat_type_id` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_heads`
--

INSERT INTO `billing_heads` (`id`, `name`, `amount`, `society_id`, `created_at`, `updated_at`, `is_unit_value`, `flat_type_id`) VALUES
(1, 'Property Tax', 50, 1, '2019-09-11 06:38:55', '2019-09-11 06:38:55', NULL, 1),
(2, 'Maintenance Charges', 1.5, 1, '2019-09-11 06:39:14', '2019-09-11 06:39:14', 1, 1),
(3, 'Sinking Funds', 30, 1, '2019-09-11 06:39:30', '2019-09-11 06:39:30', NULL, 1),
(4, 'Security Charges', 25, 1, '2019-09-11 06:39:45', '2019-09-11 06:39:45', NULL, 1),
(5, 'Property Tax', 70, 1, '2019-09-11 06:41:14', '2019-09-11 06:41:14', NULL, 2),
(6, 'Maintenance Charges', 1.5, 1, '2019-09-11 06:41:31', '2019-09-11 06:41:31', 1, 2),
(7, 'Sinking Funds', 30, 1, '2019-09-11 06:41:46', '2019-09-11 06:41:46', NULL, 2),
(8, 'Security Charges', 25, 1, '2019-09-11 06:42:06', '2019-09-11 06:42:06', NULL, 2),
(9, 'Property Tax', 80, 1, '2019-09-11 06:42:33', '2019-09-11 06:42:33', NULL, 3),
(10, 'Maintenance Charges', 1.5, 1, '2019-09-11 06:42:44', '2019-09-11 06:42:44', 1, 3),
(11, 'Sinking Funds', 30, 1, '2019-09-11 06:42:55', '2019-09-11 06:42:55', NULL, 3),
(12, 'Security Charges', 25, 1, '2019-09-11 06:43:08', '2019-09-11 06:43:08', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE IF NOT EXISTS `bill_details` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `bill_amount` decimal(15,2) DEFAULT NULL,
  `previous_member_balance` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
  `bill_summary` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `payment_id`, `bill_amount`, `previous_member_balance`, `created_at`, `updated_at`, `details`, `member_id`, `society_id`, `bill_date`, `due_date`, `bill_month`, `paid`, `interest`, `principal_arrears`, `interest_arrears`, `total_due`, `late_payment_charges`, `bill_payment_date`, `bill_payment_id`, `bill_no`, `total_arrears`, `total_interest_arrears`, `bill_status`, `bill_summary`) VALUES
(1, NULL, '650.00', '0.00', '2019-09-14 06:27:30', '0000-00-00 00:00:00', 'a:6:{s:16:"Security Charges";d:25;s:13:"Sinking Funds";d:30;s:19:"Maintenance Charges";d:525;s:12:"Property Tax";d:70;s:14:"Parking Charge";d:320;s:10:"Noc Charge";d:500;}', 12, 1, '2019-09-01', '2019-09-20', '2019-09-01', 0, '0.00', '0.00', '0.00', '650.00', '0.00', NULL, NULL, 1, '0.00', '0.00', 'Unpaid', 'this test bill'),
(2, 28, '885.00', '-200.00', '2019-09-14 07:36:10', '0000-00-00 00:00:00', 'a:6:{s:16:"Security Charges";d:25;s:13:"Sinking Funds";d:30;s:19:"Maintenance Charges";d:780;s:12:"Property Tax";d:50;s:14:"Parking Charge";d:60;s:10:"Noc Charge";d:500;}', 11, 1, '2019-09-01', '2019-09-20', '2019-09-01', 0, '0.00', '0.00', '200.00', '1085.00', '0.00', '2019-09-14', NULL, 2, '-200.00', '0.00', 'Paid', 'this test bill'),
(3, 25, '885.00', '-450.00', '2019-09-14 07:33:07', '0000-00-00 00:00:00', 'a:6:{s:16:"Security Charges";d:25;s:13:"Sinking Funds";d:30;s:19:"Maintenance Charges";d:780;s:12:"Property Tax";d:50;s:14:"Parking Charge";d:70;s:10:"Noc Charge";d:500;}', 10, 1, '2019-09-01', '2019-09-20', '2019-09-01', 0, '3.75', '450.00', '0.00', '1338.75', '0.00', '2019-09-14', NULL, 3, '0.00', '0.00', 'Paid', 'this test bill'),
(4, 12, '800.00', '-100.00', '2019-09-14 06:43:07', '0000-00-00 00:00:00', 'a:6:{s:16:"Security Charges";d:25;s:13:"Sinking Funds";d:30;s:19:"Maintenance Charges";d:675;s:12:"Property Tax";d:70;s:14:"Parking Charge";d:170;s:10:"Noc Charge";d:500;}', 9, 1, '2019-09-01', '2019-09-20', '2019-09-01', 0, '0.00', '0.00', '100.00', '900.00', '0.00', '2019-09-14', NULL, 4, '-50.00', '0.00', 'Paid', 'this test bill'),
(5, 18, '810.00', '-300.00', '2019-09-14 07:23:39', '0000-00-00 00:00:00', 'a:6:{s:16:"Security Charges";d:25;s:13:"Sinking Funds";d:30;s:19:"Maintenance Charges";d:675;s:12:"Property Tax";d:80;s:14:"Parking Charge";d:50;s:10:"Noc Charge";d:500;}', 8, 1, '2019-09-01', '2019-09-20', '2019-09-01', 0, '2.50', '300.00', '0.00', '1112.50', '0.00', '2019-09-14', NULL, 5, '0.00', '0.00', 'Partially Paid', 'this test bill'),
(6, NULL, '810.00', '0.00', '2019-09-14 06:27:30', '0000-00-00 00:00:00', 'a:6:{s:16:"Security Charges";d:25;s:13:"Sinking Funds";d:30;s:19:"Maintenance Charges";d:675;s:12:"Property Tax";d:80;s:14:"Parking Charge";d:60;s:10:"Noc Charge";d:500;}', 7, 1, '2019-09-01', '2019-09-20', '2019-09-01', 0, '0.00', '0.00', '0.00', '810.00', '0.00', NULL, NULL, 6, '0.00', '0.00', 'Unpaid', 'this test bill');

-- --------------------------------------------------------

--
-- Table structure for table `cowork_master`
--

CREATE TABLE IF NOT EXISTS `cowork_master` (
  `id` mediumint(8) unsigned NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `payee` varchar(255) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expense_category_id` int(11) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `service_provider_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `payee`, `amount`, `description`, `created_at`, `updated_at`, `expense_category_id`, `society_id`, `service_provider_id`, `bank_id`) VALUES
(1, '2019-09-13 19:44:00', 'Dosti Chs Ltd', '200.00', 'hrrjgkgkhdgdch hfyt yf ty .', '2019-09-14 07:41:09', '2019-09-14 07:41:09', 1, 1, 3, 2),
(2, '2019-09-13 20:02:00', '3', '10.00', 'drdfg', '2019-09-14 08:02:52', '2019-09-14 08:02:52', 1, 1, 3, 1),
(3, '2019-09-13 20:05:00', '2', '2.00', 'kjk', '2019-09-14 08:04:41', '2019-09-14 08:04:41', 1, 1, 2, 2),
(4, '2019-09-13 20:06:00', '1', '1.00', 'ssdxcf', '2019-09-14 08:06:53', '2019-09-14 08:06:53', 1, 1, 1, 2),
(5, '2019-09-13 20:13:00', 'Electric', '1.00', 'asdf', '2019-09-14 08:15:11', '2019-09-14 08:15:11', 1, 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE IF NOT EXISTS `expense_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'abc', '2019-09-14 07:39:44', '2019-09-14 07:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `flat_sub_types`
--

CREATE TABLE IF NOT EXISTS `flat_sub_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `flat_type_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flat_types`
--

CREATE TABLE IF NOT EXISTS `flat_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `society_id` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flat_types`
--

INSERT INTO `flat_types` (`id`, `name`, `created_at`, `updated_at`, `society_id`) VALUES
(1, '1 BHK', '2019-09-11 06:38:08', '2019-09-11 06:38:08', 1),
(2, '2 BHK', '2019-09-11 06:38:16', '2019-09-11 06:38:16', 1),
(3, '2 BHK Terrace', '2019-09-11 06:38:32', '2019-09-11 06:38:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(100) NOT NULL
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

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL,
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
  `wing` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `flat_no`, `tenant`, `phone`, `created_at`, `updated_at`, `society_id`, `member_balance`, `flat_area`, `principal_arrears`, `two_wheelers`, `four_wheelers`, `user_id`, `name`, `email_id`, `interest_arrears`, `flat_type_id`, `flat_sub_type_id`, `wing`) VALUES
(11, '401', 1, 56745623466, '2019-09-14 07:36:10', '0000-00-00 00:00:00', 1, '0.00', 520, '0.00', '1', '0', 12, 'Zaid', 'zaid@gmail.com', '200.00', 1, NULL, 'B'),
(10, '104', 0, 6433446665, '2019-09-14 07:33:07', '0000-00-00 00:00:00', 1, '0.00', 520, '450.00', '0', '1', 11, 'Anis', 'anis@gmail.com', '0.00', 1, NULL, 'C'),
(9, '103', 0, 3232434211, '2019-09-14 06:43:07', '0000-00-00 00:00:00', 1, '-50.00', 450, '0.00', '2', '1', 10, 'Ashish', 'ashish@gmail.com', '100.00', 2, NULL, 'A'),
(8, '103', 0, 2222222222, '2019-09-14 07:24:44', '0000-00-00 00:00:00', 1, '0.00', 450, '300.00', '1', '0', 9, 'Gopal', 'gopal@gmail.com', '0.00', 3, NULL, 'B'),
(7, '102', 1, 1111111111, '2019-09-14 06:27:30', '0000-00-00 00:00:00', 1, '-810.00', 450, '0.00', '1', '0', 8, 'Jignesh', 'jignesh@gmail.com', '0.00', 3, NULL, 'A'),
(12, '302', 1, 56745623466, '2019-09-14 06:27:30', '0000-00-00 00:00:00', 1, '-650.00', 350, '0.00', '2', '2', 13, 'Dhaval', 'dhaval@gmail.com', '0.00', 2, NULL, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `member_arrears`
--

CREATE TABLE IF NOT EXISTS `member_arrears` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `old_arrears` double NOT NULL,
  `new_arrears` double NOT NULL,
  `dnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_interest`
--

CREATE TABLE IF NOT EXISTS `member_interest` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `old_interest` double NOT NULL,
  `new_interest` double NOT NULL,
  `dnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_plans`
--

CREATE TABLE IF NOT EXISTS `member_plans` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20190805155142);

-- --------------------------------------------------------

--
-- Table structure for table `parking_charges`
--

CREATE TABLE IF NOT EXISTS `parking_charges` (
  `id` int(11) NOT NULL,
  `member_two_wheeler` decimal(10,2) DEFAULT NULL,
  `tenant_two_wheeler` decimal(10,2) DEFAULT NULL,
  `member_four_wheeler` decimal(10,2) DEFAULT NULL,
  `tenant_four_wheeler` decimal(10,2) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_charges`
--

INSERT INTO `parking_charges` (`id`, `member_two_wheeler`, `tenant_two_wheeler`, `member_four_wheeler`, `tenant_four_wheeler`, `society_id`, `created_at`, `updated_at`) VALUES
(1, '50.00', '60.00', '70.00', '100.00', 1, '2019-09-11 06:47:52', '2019-09-11 06:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
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
  `receipt_id` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_date`, `due_date`, `narration`, `credit`, `debit`, `balance`, `paid_by`, `details`, `status`, `created_at`, `updated_at`, `member_id`, `society_id`, `arrears`, `bill_id`, `bank_id`, `cheque_no`, `is_cash`, `is_arrears`, `is_credit_note`, `is_debit_note`, `is_reversal`, `depositor_bank`, `receipt_id`) VALUES
(1, NULL, NULL, 'Arrears Transfer', '300.00', NULL, '300.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL),
(2, NULL, NULL, 'Arrears Transfer', '450.00', NULL, '450.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL),
(3, NULL, '2019-09-20', '_Bill', '650.00', NULL, '650.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 1, '0.00', 1, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL),
(4, NULL, '2019-09-20', '_Bill', '1085.00', NULL, '885.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 11, 1, '0.00', 2, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL),
(5, NULL, '2019-09-20', '_Bill', '1338.75', NULL, '1788.75', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', 3, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL),
(6, NULL, '2019-09-20', '_Bill', '900.00', NULL, '800.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 1, '0.00', 4, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL),
(7, NULL, '2019-09-20', '_Bill', '1112.50', NULL, '1412.50', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 1, '0.00', 5, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL),
(8, NULL, '2019-09-20', '_Bill', '810.00', NULL, '810.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 1, '0.00', 6, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL),
(9, '2019-09-14 12:13', NULL, 'Payment Recieved', NULL, '850.00', '50.00', 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 0, 0, NULL, 1),
(10, '2019-09-14 12:13', NULL, 'Interest Paid', NULL, '100.00', '800.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 1),
(11, '2019-09-14 12:13', NULL, 'Arrears Paid', NULL, '0.00', '800.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 1),
(12, '2019-09-14 12:13', NULL, 'Bill Paid', NULL, '750.00', '0.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 1),
(13, '2019-09-14 12:49', NULL, 'Interest Paid', NULL, '2.50', '1110.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 2),
(14, '2019-09-14 12:49', NULL, 'Arrears Paid', NULL, '300.00', '810.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 2),
(15, '2019-09-14 12:49', NULL, 'Amount Recieved', NULL, '700.00', '110.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 2),
(16, '2019-09-14 12:53', NULL, 'Interest Paid', NULL, '0.00', '112.50', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 3),
(17, '2019-09-14 12:53', NULL, 'Arrears Paid', NULL, '0.00', '112.50', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 3),
(18, '2019-09-14 12:53', NULL, 'Amount Recieved', NULL, '110.00', '2.50', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 3),
(19, '2019-09-14 12:54:00', NULL, 'dfss', NULL, '2.50', '110.00', 'Credit Note', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 1, '0.00', NULL, NULL, NULL, 1, 0, 1, 0, 0, NULL, 1),
(20, '2019-09-14 01:02', NULL, 'Interest Paid', NULL, '3.75', '1335.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 4),
(21, '2019-09-14 01:02', NULL, 'Arrears Paid', NULL, '450.00', '885.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 4),
(22, '2019-09-14 01:02', NULL, 'Amount Recieved', NULL, '750.00', '135.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 4),
(23, '2019-09-14 01:03', NULL, 'Interest Paid', NULL, '0.00', '138.75', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 5),
(24, '2019-09-14 01:03', NULL, 'Arrears Paid', NULL, '0.00', '138.75', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 5),
(25, '2019-09-14 01:03', NULL, 'Bill Paid', NULL, '138.75', '0.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 5),
(26, '2019-09-14 01:06', NULL, 'Interest Paid', NULL, '200.00', '885.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 11, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 6),
(27, '2019-09-14 01:06', NULL, 'Arrears Paid', NULL, '0.00', '885.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 11, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 6),
(28, '2019-09-14 01:06', NULL, 'Bill Paid', NULL, '885.00', '0.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 11, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `service_providers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `sp_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(255) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_providers`
--

INSERT INTO `service_providers` (`id`, `name`, `address`, `contact_no`, `sp_type`, `created_at`, `updated_at`, `email`, `society_id`) VALUES
(1, 'Cable wala', 'Vasai', '07666766861', 'Others', '2019-09-11 06:48:48', '2019-09-11 06:48:48', 'cable@wala.com', 1),
(2, 'Electric', 'Vasai', '9812342111', 'Electricity Supply', '2019-09-11 06:49:45', '2019-09-11 06:49:45', 'electric@wala.com', 1),
(3, 'PWD', 'Vasai', '9900776655', 'Water Supply', '2019-09-11 06:50:20', '2019-09-11 06:50:20', 'pwd@wala.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `societies`
--

CREATE TABLE IF NOT EXISTS `societies` (
  `id` int(11) NOT NULL,
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
  `created_by_utility` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `societies`
--

INSERT INTO `societies` (`id`, `name`, `address`, `registration_no`, `no_of_flats`, `created_at`, `updated_at`, `opening_balance`, `billing_head_id`, `image_file_name`, `image_content_type`, `image_file_size`, `image_updated_at`, `interest_type`, `interest_span`, `interest_rate`, `bill_day`, `due_day`, `auto_create_bill`, `noc_charge`, `noc_unit_value`, `garden_charge`, `garden_unit_value`, `terrace_charge`, `terrace_unit_value`, `villa_charge`, `villa_unit_value`, `duplex_charge`, `duplex_unit_value`, `commercial_charge`, `commercial_unit_value`, `garage_charge`, `warehouse_charge`, `warehouse_unit_value`, `garage_unit_value`, `created_by_utility`) VALUES
(1, 'Dosti Chs Ltd', 'Vasai west', 'TNA/123/ABC/0987', '50', '2019-09-11 06:28:24', '2019-09-11 06:28:24', 50000, NULL, '', NULL, NULL, NULL, 'Simple Interest', 'Monthly', 10, 5, 20, NULL, '500.00', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `society_accesses`
--

CREATE TABLE IF NOT EXISTS `society_accesses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_accesses`
--

INSERT INTO `society_accesses` (`id`, `user_id`, `role_id`, `society_id`, `created_at`, `updated_at`) VALUES
(1, 0, 8, 1, '2019-09-11 06:37:20', '2019-09-11 06:37:20'),
(2, 0, 8, 1, '2019-09-11 06:37:21', '2019-09-11 06:37:21'),
(3, 0, 8, 1, '2019-09-11 06:37:22', '2019-09-11 06:37:22'),
(4, 0, 8, 1, '2019-09-11 06:37:23', '2019-09-11 06:37:23'),
(5, 0, 8, 1, '2019-09-11 06:37:24', '2019-09-11 06:37:24'),
(6, 0, 8, 1, '2019-09-11 06:37:25', '2019-09-11 06:37:25'),
(7, 0, 8, 1, '2019-09-12 12:05:22', '2019-09-12 12:05:22'),
(8, 0, 8, 1, '2019-09-12 12:05:22', '2019-09-12 12:05:22'),
(9, 0, 8, 1, '2019-09-12 12:05:22', '2019-09-12 12:05:22'),
(10, 0, 8, 1, '2019-09-12 12:05:22', '2019-09-12 12:05:22'),
(11, 0, 8, 1, '2019-09-12 12:05:22', '2019-09-12 12:05:22'),
(12, 0, 8, 1, '2019-09-12 12:05:22', '2019-09-12 12:05:22'),
(13, 0, 8, 1, '2019-09-13 11:20:30', '2019-09-13 11:20:30'),
(14, 0, 8, 1, '2019-09-13 11:20:30', '2019-09-13 11:20:30'),
(15, 0, 8, 1, '2019-09-13 11:20:30', '2019-09-13 11:20:30'),
(16, 0, 8, 1, '2019-09-13 11:20:31', '2019-09-13 11:20:31'),
(17, 0, 8, 1, '2019-09-13 11:20:31', '2019-09-13 11:20:31'),
(18, 0, 8, 1, '2019-09-13 11:20:31', '2019-09-13 11:20:31'),
(19, 0, 8, 1, '2019-09-14 06:25:01', '2019-09-14 06:25:01'),
(20, 0, 8, 1, '2019-09-14 06:25:01', '2019-09-14 06:25:01'),
(21, 0, 8, 1, '2019-09-14 06:25:02', '2019-09-14 06:25:02'),
(22, 0, 8, 1, '2019-09-14 06:25:02', '2019-09-14 06:25:02'),
(23, 0, 8, 1, '2019-09-14 06:25:02', '2019-09-14 06:25:02'),
(24, 0, 8, 1, '2019-09-14 06:25:03', '2019-09-14 06:25:03'),
(25, 0, 8, 1, '2019-09-14 06:26:40', '2019-09-14 06:26:40'),
(26, 0, 8, 1, '2019-09-14 06:26:40', '2019-09-14 06:26:40'),
(27, 0, 8, 1, '2019-09-14 06:26:40', '2019-09-14 06:26:40'),
(28, 0, 8, 1, '2019-09-14 06:26:41', '2019-09-14 06:26:41'),
(29, 0, 8, 1, '2019-09-14 06:26:41', '2019-09-14 06:26:41'),
(30, 0, 8, 1, '2019-09-14 06:26:41', '2019-09-14 06:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `society_enrollment_requests`
--

CREATE TABLE IF NOT EXISTS `society_enrollment_requests` (
  `id` int(11) NOT NULL,
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
  `span` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `society_member_balance`
--

CREATE TABLE IF NOT EXISTS `society_member_balance` (
  `member_balance_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `old_balance` double(10,2) NOT NULL,
  `new_balance` double(10,2) NOT NULL,
  `dnt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `society_member_bill_payment_logs`
--

CREATE TABLE IF NOT EXISTS `society_member_bill_payment_logs` (
  `id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `type` enum('BILL','PAYMENT','DEBITNOTE','CREDITNOTE') NOT NULL,
  `dnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `society_member_bill_payment_transaction_log`
--

CREATE TABLE IF NOT EXISTS `society_member_bill_payment_transaction_log` (
  `id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `narration` enum('BILLDUE','AMOUNTPAID','ARREARSPAID','INTERESTPAID','CREDITNOTE','DEBITNOTE') NOT NULL,
  `credit` double NOT NULL,
  `debit` double NOT NULL,
  `balance` double NOT NULL,
  `dnt` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `society_service_providers`
--

CREATE TABLE IF NOT EXISTS `society_service_providers` (
  `id` int(11) NOT NULL,
  `society_id` int(11) DEFAULT NULL,
  `service_provider_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `up_billing_heads`
--

CREATE TABLE IF NOT EXISTS `up_billing_heads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_unit_value` tinyint(1) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `utility_service_provider_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `utility_plan_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `up_bill_details`
--

CREATE TABLE IF NOT EXISTS `up_bill_details` (
  `id` int(11) NOT NULL,
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
  `previous_outstanding` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `up_payments`
--

CREATE TABLE IF NOT EXISTS `up_payments` (
  `id` int(11) NOT NULL,
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
  `is_cash` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$rvafO7pPZ0mR4fEiTWLfxubdvLj52nEnBUATDCGkVNmBkmkxHQM0e', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1568437206, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(8, '::1', 'jignesh@gmail.com', '$2y$10$n31NTx.lGyQIBvE1xf9BeejKzXVDE.egBx9ZxKdC7uEwa.xENWl4u', 'jignesh@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568442400, NULL, 1, 'Jignesh', '', '', '1111111111'),
(9, '::1', 'gopal@gmail.com', '$2y$10$KEjQagKAxgssT.r.vmYtu.yS6LzmIu8k2BZ38z7zvHfejnF0yZxN.', 'gopal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568442400, NULL, 1, 'Gopal', '', '', '2222222222'),
(10, '::1', 'ashish@gmail.com', '$2y$10$3R3SmCanWpDjI6fretR5e.CWcnP5faDLROJsBEgV2oqliWFBQ5lfS', 'ashish@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568442400, NULL, 1, 'Ashish', '', '', '3232434211'),
(11, '::1', 'anis@gmail.com', '$2y$10$TIP7t0ZfLJ2VItwfUTfIjumKh54Q/QB6/2jXH0EjQLfAAcSG/NwZ6', 'anis@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568442401, NULL, 1, 'Anis', '', '', '6433446665'),
(12, '::1', 'zaid@gmail.com', '$2y$10$tYR.Swv2hak6dZMOBCbJxOmLEh7wHTAmoH9TH6sOrYR1Rj./lIx8O', 'zaid@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568442401, NULL, 1, 'Zaid', '', '', '56745623466'),
(13, '::1', 'dhaval@gmail.com', '$2y$10$.I1jdow2bEerVtFto0yldO/83GGGXbBisaf1bgONAFSwDm4jZxJ7S', 'dhaval@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568442401, NULL, 1, 'Dhaval', '', '', '56745623466');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 8),
(21, 8, 8),
(22, 9, 8),
(23, 10, 8),
(24, 11, 8),
(25, 12, 8),
(26, 13, 8);

-- --------------------------------------------------------

--
-- Table structure for table `utility_bills`
--

CREATE TABLE IF NOT EXISTS `utility_bills` (
  `id` int(11) NOT NULL,
  `bill_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `bill_amount` double DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `service_charges` double DEFAULT NULL,
  `service_tax` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utility_plans`
--

CREATE TABLE IF NOT EXISTS `utility_plans` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `utility_service_provider_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utility_service_providers`
--

CREATE TABLE IF NOT EXISTS `utility_service_providers` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `license_no` varchar(255) DEFAULT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `service_tax_unit` double DEFAULT NULL,
  `provider_type` varchar(255) DEFAULT NULL,
  `phone_no` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utility_service_provider_members`
--

CREATE TABLE IF NOT EXISTS `utility_service_provider_members` (
  `id` int(11) NOT NULL,
  `utility_service_provider_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `utility_plan_id` int(11) NOT NULL,
  `member_balance` double DEFAULT NULL,
  `initial_outstanding` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_transactions`
--
ALTER TABLE `bank_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_heads`
--
ALTER TABLE `billing_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cowork_master`
--
ALTER TABLE `cowork_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flat_sub_types`
--
ALTER TABLE `flat_sub_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flat_types`
--
ALTER TABLE `flat_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_arrears`
--
ALTER TABLE `member_arrears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_interest`
--
ALTER TABLE `member_interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_plans`
--
ALTER TABLE `member_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_charges`
--
ALTER TABLE `parking_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `societies`
--
ALTER TABLE `societies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `society_accesses`
--
ALTER TABLE `society_accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `society_enrollment_requests`
--
ALTER TABLE `society_enrollment_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `society_member_balance`
--
ALTER TABLE `society_member_balance`
  ADD PRIMARY KEY (`member_balance_id`);

--
-- Indexes for table `society_member_bill_payment_logs`
--
ALTER TABLE `society_member_bill_payment_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `society_member_bill_payment_transaction_log`
--
ALTER TABLE `society_member_bill_payment_transaction_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `up_billing_heads`
--
ALTER TABLE `up_billing_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `up_payments`
--
ALTER TABLE `up_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `utility_plans`
--
ALTER TABLE `utility_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility_service_providers`
--
ALTER TABLE `utility_service_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility_service_provider_members`
--
ALTER TABLE `utility_service_provider_members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bank_transactions`
--
ALTER TABLE `bank_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `billing_heads`
--
ALTER TABLE `billing_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cowork_master`
--
ALTER TABLE `cowork_master`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `flat_types`
--
ALTER TABLE `flat_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `member_arrears`
--
ALTER TABLE `member_arrears`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member_interest`
--
ALTER TABLE `member_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parking_charges`
--
ALTER TABLE `parking_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `societies`
--
ALTER TABLE `societies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `society_accesses`
--
ALTER TABLE `society_accesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `society_member_balance`
--
ALTER TABLE `society_member_balance`
  MODIFY `member_balance_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `society_member_bill_payment_logs`
--
ALTER TABLE `society_member_bill_payment_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `society_member_bill_payment_transaction_log`
--
ALTER TABLE `society_member_bill_payment_transaction_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `up_billing_heads`
--
ALTER TABLE `up_billing_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `up_payments`
--
ALTER TABLE `up_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `utility_plans`
--
ALTER TABLE `utility_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utility_service_providers`
--
ALTER TABLE `utility_service_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utility_service_provider_members`
--
ALTER TABLE `utility_service_provider_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
