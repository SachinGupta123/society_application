-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2019 at 10:31 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `address`, `branch`, `ifsc`, `micr`, `ac_no`, `from_dt`, `exp_dt`, `phone`, `email`, `created_at`, `updated_at`, `society_id`, `opening_balance`, `current_balance`) VALUES
(1, 'HDFC Bank', 'Vasai West', 'Vasai', 'HDFCBN00001', 'qqq', 5352325135326, NULL, NULL, 3333333333, 'hadc@gmail.com', '2019-08-23 09:39:17', '2019-08-23 09:39:17', 1, '100000.00', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_transactions`
--

INSERT INTO `bank_transactions` (`id`, `date`, `narration`, `credit`, `debit`, `balance`, `created_at`, `updated_at`, `bank_id`, `society_id`, `expense_id`, `is_cash`, `is_arrears`) VALUES
(2, '0000-00-00 00:00:00', 'cash transaction', '200.00', NULL, '200.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 1, 0),
(16, '2019-08-25 18:30:00', 'Committee Member', NULL, '10.00', '190.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 1, 0),
(15, '2019-07-17 18:30:00', 'cash transaction', '200.00', NULL, '200.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(14, '2019-07-17 18:30:00', 'cash transaction', '200.00', NULL, '200.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(13, '2019-07-17 18:30:00', 'cash transaction', '200.00', NULL, '200.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(12, '2019-07-17 18:30:00', 'cash transaction', '200.00', NULL, '200.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(11, '2019-07-17 18:30:00', 'cash transaction', '200.00', NULL, '200.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(17, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '10.00', NULL, '100010.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(18, '2019-08-25 18:30:00', 'Committee Member', NULL, '10.00', '180.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(19, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '10.00', NULL, '100020.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(20, '2019-08-25 18:30:00', 'Committee Member', NULL, '10.00', '170.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(21, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '10.00', NULL, '100030.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(22, '2019-08-25 18:30:00', 'Committee Member', NULL, '10.00', '160.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(23, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '10.00', NULL, '100040.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(24, '2019-08-25 18:30:00', 'Committee Member', NULL, '0.00', '160.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(25, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '0.00', NULL, '100040.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(26, '2019-08-25 18:30:00', 'Committee Member', NULL, '0.00', '160.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(27, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '0.00', NULL, '100040.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(28, '2019-08-25 18:30:00', 'Committee Member', NULL, '0.00', '160.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(29, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '0.00', NULL, '100040.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(30, '2019-08-25 18:30:00', 'Committee Member', NULL, '10.00', '150.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(31, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '10.00', NULL, '100050.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(32, '2019-08-25 18:30:00', 'Committee Member', NULL, '10.00', '140.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(33, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '10.00', NULL, '100060.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(34, '2019-08-25 18:30:00', 'Committee Member', NULL, '10.00', '130.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(35, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '10.00', NULL, '100070.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(36, '2019-08-25 18:30:00', 'Committee Member', NULL, '10.00', '120.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(37, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '10.00', NULL, '100080.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(38, '2019-08-25 18:30:00', 'Committee Member', NULL, '10.00', '110.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(39, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '10.00', NULL, '100090.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(40, '2019-08-25 18:30:00', 'Committee Member', NULL, '10.00', '100.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(41, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '10.00', NULL, '100100.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(42, '2019-08-25 18:30:00', 'Committee Member', NULL, '10.00', '90.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(43, '2019-08-25 18:30:00', 'Transfer from Cash in Hand', '10.00', NULL, '100110.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(44, '2019-08-30 18:30:00', 'cash transaction', '100.00', NULL, '100.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(45, '2019-08-30 18:30:00', 'cash transaction', '125.00', NULL, '125.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(46, '2019-08-30 18:30:00', 'cheque transaction', '10.00', NULL, '10.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(47, '2019-08-30 18:30:00', 'cheque transaction', '10.00', NULL, '10.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(48, '2019-08-30 18:30:00', 'cheque transaction', '10.00', NULL, '10.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(49, '2019-08-30 18:30:00', 'cheque transaction', '10.00', NULL, '10.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(50, '2019-08-30 18:30:00', 'cash transaction', '52.00', NULL, '52.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(51, '2019-08-30 18:30:00', 'cash transaction', '44.00', NULL, '44.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(52, '2019-09-01 18:30:00', 'cash transaction', '500.00', NULL, '500.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(53, '2019-09-01 18:30:00', NULL, '200.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(54, '2019-09-01 18:30:00', NULL, '200.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(55, '2019-09-01 18:30:00', NULL, '200.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(56, '2019-09-01 18:30:00', NULL, '234.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(57, '2019-09-01 18:30:00', NULL, '234.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(58, '2019-09-01 18:30:00', NULL, '234.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(59, '2019-09-01 18:30:00', NULL, '234.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(60, '2019-09-01 18:30:00', NULL, '232.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(61, '2019-09-01 18:30:00', NULL, '234.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(62, '2019-09-01 18:30:00', NULL, '234.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(63, '2019-09-01 18:30:00', NULL, '222.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(64, '2019-09-01 18:30:00', NULL, '111.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(65, '2019-09-01 18:30:00', NULL, '99.00', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(66, '2019-09-01 18:30:00', 'cheque transaction', '98.00', NULL, '98.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(67, '2019-09-02 18:30:00', 'cheque transaction', '555.00', NULL, '555.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0),
(68, '2019-09-02 18:30:00', 'cheque transaction', '61.00', NULL, '61.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, NULL, 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_heads`
--

INSERT INTO `billing_heads` (`id`, `name`, `amount`, `society_id`, `created_at`, `updated_at`, `is_unit_value`, `flat_type_id`) VALUES
(1, 'Property Tax', 450, 1, '2019-09-04 17:50:48', '2019-08-21 06:06:49', NULL, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=196 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `payment_id`, `bill_amount`, `previous_member_balance`, `created_at`, `updated_at`, `details`, `member_id`, `society_id`, `bill_date`, `due_date`, `bill_month`, `paid`, `interest`, `principal_arrears`, `interest_arrears`, `total_due`, `late_payment_charges`, `bill_payment_date`, `bill_payment_id`, `bill_no`, `total_arrears`, `total_interest_arrears`, `bill_status`, `bill_summary`) VALUES
(194, NULL, '450.00', '-192.00', '2019-09-04 17:54:40', '0000-00-00 00:00:00', 'a:3:{s:12:"Property Tax";d:450;s:14:"Parking Charge";d:1200;s:10:"Noc Charge";d:5.6699999999999999289457264239899814128875732421875;}', 10, 1, '2019-09-04', '2019-09-24', NULL, 0, '0.00', '192.00', '0.00', '642.00', '0.00', NULL, NULL, 1, '192.00', '0.00', 'Unpaid', 'This is new bill'),
(195, NULL, '450.00', '-192.00', '2019-09-04 17:56:25', '0000-00-00 00:00:00', 'a:3:{s:12:"Property Tax";d:450;s:14:"Parking Charge";d:1200;s:10:"Noc Charge";d:5.6699999999999999289457264239899814128875732421875;}', 10, 1, '2019-09-04', '2019-09-24', '2019-09-01', 0, '0.00', '192.00', '0.00', '642.00', '0.00', NULL, NULL, 1, '192.00', '0.00', 'Unpaid', 'This is new bill');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, 'ALSDJal', '2019-08-21 06:20:15', '2019-08-21 06:20:15');

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
(1, '1 BHK', '2019-08-20 13:07:23', '2019-08-20 13:07:23', 1),
(2, '2 BHK', '2019-08-20 13:07:40', '2019-08-20 13:07:40', 1),
(3, '2 BHK Terrace', '2019-08-20 13:07:53', '2019-08-20 13:07:53', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `flat_no`, `tenant`, `phone`, `created_at`, `updated_at`, `society_id`, `member_balance`, `flat_area`, `principal_arrears`, `two_wheelers`, `four_wheelers`, `user_id`, `name`, `email_id`, `interest_arrears`, `flat_type_id`, `flat_sub_type_id`, `wing`) VALUES
(10, '8', 1, 56745623466, '2019-09-04 09:24:30', '2019-08-20 12:28:47', 1, '-192.00', 567, '0.00', '8', '1', 38, 'aaa', 'aa@nn.com', '0.00', 2, NULL, 'f');

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
(1, '50.00', '100.00', '200.00', '400.00', 1, '2019-08-23 09:39:57', '2019-08-23 09:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
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
) ENGINE=MyISAM AUTO_INCREMENT=602 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_date`, `due_date`, `narration`, `credit`, `debit`, `balance`, `paid_by`, `details`, `status`, `created_at`, `updated_at`, `member_id`, `society_id`, `arrears`, `bill_id`, `bank_id`, `cheque_no`, `is_cash`, `is_arrears`, `is_credit_note`, `is_debit_note`, `is_reversal`, `depositor_bank`, `receipt_id`) VALUES
(1, '2019-07-17 18:30:00', '2019-08-24', 'bank transfer', '300.00', '500.00', '200.00', 'neft', 'sdgdxgfxgfx', 'unpaid', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', 1, 1, 465447647, 0, 1, 0, 0, 0, 'fgdhgfdfg', 1),
(600, '2019-09-03 21:20:00', NULL, 'zxwsxsswd', '111.00', NULL, '111.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(601, '2019-09-04 06:30:00', NULL, 'lkjhgfds', NULL, '125.00', '0.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 1, 0, 0, NULL, NULL),
(599, '2019-09-02 18:30:00', NULL, 'abc nop', '119.00', NULL, '119.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(598, '0000-00-00 00:00:00', NULL, 'acb nmo', '118.00', NULL, '118.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(597, '2019-09-02 18:30:00', NULL, 'abc lmn', '117.00', NULL, '117.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(596, '2019-09-02 18:30:00', NULL, 'abc klm', '116.00', NULL, '116.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(595, '2019-09-02 18:30:00', NULL, 'acb jkl', '115.00', NULL, '115.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(594, '2019-09-02 18:30:00', NULL, 'abc hij', NULL, '115.00', '0.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 1, 0, 0, NULL, NULL),
(593, '2019-09-02 18:30:00', NULL, 'abc ghi', '113.00', NULL, '113.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(592, '2019-09-01 18:30:00', NULL, 'abc fgh', '112.00', NULL, '112.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(591, '2019-09-01 18:30:00', NULL, 'abc def', '11.00', NULL, '11.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(589, '2019-09-02 18:30:00', NULL, 'Payment Recieved', NULL, '555.00', '0.00', 'cheque', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 1, 998877, 0, 0, 0, 0, 0, 'hdfc', 26),
(590, '2019-09-02 18:30:00', NULL, 'Payment Recieved', NULL, '61.00', '0.00', 'cheque', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 1, 223344, 0, 0, 0, 0, 0, '', 27),
(587, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '99.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 4444444, 0, 0, 0, 0, 0, '', 24),
(588, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '98.00', '0.00', 'cheque', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 1, 1, 0, 0, 0, 0, 0, 'asasas', 25),
(585, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '222.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', 22),
(586, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '111.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 234543, 0, 0, 0, 0, 0, '', 23),
(584, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '234.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', 21),
(583, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '234.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', 20),
(582, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '232.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', 19),
(581, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '234.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', 18),
(580, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '234.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', 17),
(579, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '234.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', 16),
(578, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '234.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', 15),
(577, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '200.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', 14),
(576, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '200.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', 13),
(575, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '200.00', '0.00', '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', 12),
(574, '2019-09-01 18:30:00', NULL, 'Payment Recieved', NULL, '500.00', '0.00', 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 0, 0, NULL, 11),
(573, '2019-09-01 18:30:00', NULL, 'sadasda', NULL, '20.00', '-20.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 1, 0, 0, NULL, NULL),
(572, '2019-09-01 18:30:00', NULL, '', NULL, '500.00', '-500.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 1, 0, 0, NULL, NULL),
(571, '2019-08-26 18:30:00', NULL, 'asdfg', '10.00', NULL, '10.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(570, '2019-08-30 18:30:00', NULL, 'Payment Recieved', '600.00', '44.00', '600.00', 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', 2, NULL, NULL, 1, 0, 0, 0, 0, NULL, 10),
(569, '2019-08-30 18:30:00', NULL, 'Payment Recieved', NULL, '52.00', '0.00', 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 0, 0, NULL, 9),
(568, '2019-08-30 18:30:00', NULL, 'Payment Recieved', NULL, '10.00', '0.00', 'cheque', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 1, 12121212, 0, 0, 0, 0, 0, 'asdassascacac', 8),
(567, '2019-08-30 18:30:00', NULL, 'Payment Recieved', NULL, '10.00', '0.00', 'cheque', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 1, 12121212, 0, 0, 0, 0, 0, 'asdassascacac', 7),
(566, '2019-08-30 18:30:00', NULL, 'Payment Recieved', NULL, '10.00', '0.00', 'cheque', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 1, 12121212, 0, 0, 0, 0, 0, 'asdassascacac', 6),
(564, '2019-08-30 18:30:00', NULL, NULL, NULL, '10.00', NULL, 'cheque', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 1, 12121212, 0, 0, 0, 0, 0, 'asdassascacac', NULL),
(565, '2019-08-30 18:30:00', NULL, 'Payment Recieved', NULL, '10.00', '0.00', 'cheque', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 1, 12121212, 0, 0, 0, 0, 0, 'asdassascacac', 5),
(563, '2019-08-30 18:30:00', NULL, NULL, NULL, '10.00', NULL, 'cheque', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 1, 12121212, 0, 0, 0, 0, 0, 'asdassascacac', NULL),
(561, '2019-08-30 18:30:00', NULL, NULL, NULL, '125.00', NULL, 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', NULL),
(562, '2019-08-30 18:30:00', NULL, 'Payment Recieved', NULL, '125.00', '0.00', 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 0, 0, NULL, 4),
(559, '2019-08-30 18:30:00', NULL, NULL, NULL, '100.00', NULL, 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', NULL),
(560, '2019-08-30 18:30:00', NULL, 'Payment Recieved', NULL, '100.00', '0.00', 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 0, 0, NULL, 3),
(558, '2019-08-30 18:30:00', NULL, NULL, NULL, '100.00', NULL, 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', NULL),
(557, '2019-08-30 18:30:00', NULL, NULL, NULL, NULL, NULL, 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', NULL),
(556, '2019-08-30 18:30:00', NULL, NULL, NULL, '10.00', NULL, 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', NULL),
(555, '2019-08-30 18:30:00', NULL, NULL, NULL, '10.00', NULL, 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', NULL),
(554, '2019-08-30 18:30:00', NULL, NULL, NULL, '10.00', NULL, 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', NULL),
(553, '2019-08-30 18:30:00', NULL, NULL, NULL, '10.00', NULL, 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, 0, 0, 0, 0, 0, 0, 0, '', NULL),
(551, '2019-08-25 18:30:00', NULL, 'Sales', '10.00', NULL, '10.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(552, '2019-08-25 18:30:00', NULL, 'Sales', '10.00', NULL, '10.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(550, '2019-08-25 18:30:00', NULL, 'Sales', '10.00', NULL, '10.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(549, '2019-08-25 18:30:00', NULL, 'Sales', '10.00', NULL, '10.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(539, '2019-07-17 18:30:00', NULL, 'Payment Recieved', NULL, '200.00', '0.00', 'cash', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 0, 0, NULL, 2),
(548, '2019-08-25 18:30:00', NULL, 'Sales', '10.00', NULL, '10.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(547, '2019-08-25 18:30:00', NULL, 'Sales', '10.00', NULL, '10.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(546, '2019-08-25 18:30:00', NULL, 'Sales', '10.00', NULL, '10.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(545, '2019-08-25 18:30:00', NULL, 'Sales', '10.00', NULL, '10.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(544, '2019-08-25 18:30:00', NULL, 'Sales', '10.00', NULL, '10.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(543, '2019-08-25 18:30:00', NULL, 'Sales', '10.00', NULL, '10.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 1, 0, 0, 1, 0, NULL, NULL),
(542, '2019-07-17 18:30:00', NULL, 'Bill Paid', NULL, '200.00', '0.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 2),
(541, '2019-07-17 18:30:00', NULL, 'Arrears Paid', NULL, '0.00', '-2400.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 2),
(540, '2019-07-17 18:30:00', NULL, 'Interest Paid', NULL, '0.00', '-2400.00', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 10, 1, '0.00', NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_providers`
--

INSERT INTO `service_providers` (`id`, `name`, `address`, `contact_no`, `sp_type`, `created_at`, `updated_at`, `email`, `society_id`) VALUES
(1, 'PWDi', 'Vasai Westi', '32421532523', 'Electricity Supply', '2019-08-26 09:36:38', '2019-08-26 09:36:38', 'ABC@ABC.COM', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `societies`
--

INSERT INTO `societies` (`id`, `name`, `address`, `registration_no`, `no_of_flats`, `created_at`, `updated_at`, `opening_balance`, `billing_head_id`, `image_file_name`, `image_content_type`, `image_file_size`, `image_updated_at`, `interest_type`, `interest_span`, `interest_rate`, `bill_day`, `due_day`, `auto_create_bill`, `noc_charge`, `noc_unit_value`, `garden_charge`, `garden_unit_value`, `terrace_charge`, `terrace_unit_value`, `villa_charge`, `villa_unit_value`, `duplex_charge`, `duplex_unit_value`, `commercial_charge`, `commercial_unit_value`, `garage_charge`, `warehouse_charge`, `warehouse_unit_value`, `garage_unit_value`, `created_by_utility`) VALUES
(1, 'Test ', 'Some where here.', 'TNA/123/ABC/0987', '242', '2019-08-21 12:46:40', '2019-08-21 12:46:40', 100000, NULL, '', NULL, NULL, NULL, 'Fixed Penalty', 'Half Yearly', 6, 6, 9, 1, '0.01', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'asdA', 'Baju Wali Gali1', 'TerekoPata1', NULL, '2019-08-21 10:18:59', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_accesses`
--

INSERT INTO `society_accesses` (`id`, `user_id`, `role_id`, `society_id`, `created_at`, `updated_at`) VALUES
(1, 34, 8, 1, '2019-08-20 12:05:44', '2019-08-20 12:05:44'),
(2, 35, 8, 1, '2019-08-20 12:05:44', '2019-08-20 12:05:44'),
(3, 36, 8, 1, '2019-08-20 12:05:44', '2019-08-20 12:05:44'),
(4, 37, 8, 1, '2019-08-20 12:05:45', '2019-08-20 12:05:45'),
(5, 38, 8, 1, '2019-08-20 12:05:45', '2019-08-20 12:05:45'),
(6, 0, 8, 1, '2019-08-20 12:06:27', '2019-08-20 12:06:27'),
(7, 0, 8, 1, '2019-08-20 12:06:27', '2019-08-20 12:06:27'),
(8, 0, 8, 1, '2019-08-20 12:06:27', '2019-08-20 12:06:27'),
(9, 0, 8, 1, '2019-08-20 12:06:27', '2019-08-20 12:06:27'),
(10, 0, 8, 1, '2019-08-20 12:06:27', '2019-08-20 12:06:27'),
(11, 41, 10, 2, '2019-08-21 10:19:00', '2019-08-21 10:19:00'),
(12, 43, 8, 1, '2019-08-21 14:11:23', '2019-08-21 14:11:23'),
(13, 0, 8, 1, '2019-08-21 14:16:44', '2019-08-21 14:16:44'),
(14, 0, 8, 1, '2019-08-22 04:49:05', '2019-08-22 04:49:05');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `up_billing_heads`
--

INSERT INTO `up_billing_heads` (`id`, `name`, `is_unit_value`, `amount`, `utility_service_provider_id`, `created_at`, `updated_at`, `utility_plan_id`) VALUES
(1, 'aasa', NULL, 777, 1, '2019-08-21 06:25:25', '2019-08-21 06:25:25', 1),
(8, 'bbbb', NULL, 21, 1, '2019-08-21 13:35:41', '2019-08-21 13:35:41', 7),
(10, 'aasasdasdad', NULL, 777, 1, '2019-08-21 13:36:16', '2019-08-21 13:36:16', 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$rvafO7pPZ0mR4fEiTWLfxubdvLj52nEnBUATDCGkVNmBkmkxHQM0e', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1567658732, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(35, '::1', 'rrr@ooo.com', '$2y$10$Xm7WgQwi8Qfz9kyjWAgmJuRR/lc4qe/dM7lE14FwLSpr.7tGIGQJa', 'rrr@ooo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1566302744, 1567514451, 1, 'rrr', 'ooo', '', '2222222222'),
(36, '::1', 'll@mm.com', '$2y$10$ec7kVYp55L3sCKNEdluAb.03PUNYTBPLcZcPb9hw3xzPlHV5xhATa', 'll@mm.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1566302744, NULL, 1, 'Nitin', 'Goel', 'Admax', '1234567890'),
(37, '::1', 'nn@jj.com', '$2y$10$kap.rU8SeN5F7jlN/N9Cj.U68xaA1qYg6cKh232kGi.jnYsVsJDfy', 'nn@jj.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1566302744, 1567514994, 1, 'nnn', 'jj', '', '6433446665'),
(40, '::1', 'basket@wala.com', '$2y$10$3VmwUmhFvxpj/uRT8JCbPey3MA6K1nBTjqF3Dm.BY0tTIHJmivx8y', 'basket@wala.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1566307654, 1567510531, 1, 'basket wala', 'Electricity', 'Electricity', '1231223423242'),
(41, '::1', 'a@b.com', '$2y$10$9MZJiQpp4l7oStfFgoVtTeh3ARCcE9a5qcATzh5/KI4g1BBNFBVJe', 'a@b.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1566382740, NULL, 1, 'asdas', '', '', '1231234234');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(37, 1, 1),
(38, 1, 8),
(48, 35, 3),
(49, 35, 8),
(45, 36, 5),
(46, 36, 6),
(47, 36, 8),
(51, 37, 8),
(50, 40, 9),
(35, 41, 10);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_plans`
--

INSERT INTO `utility_plans` (`id`, `plan_name`, `amount`, `utility_service_provider_id`, `created_at`, `updated_at`) VALUES
(9, 'dasddad', NULL, 1, '2019-08-21 13:35:55', '2019-08-21 13:35:55'),
(6, 'lkk;k', NULL, 2, '2019-08-21 13:11:25', '2019-08-21 13:11:25'),
(7, 'dasddad', NULL, 1, '2019-08-21 13:11:39', '2019-08-21 13:11:39');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_service_providers`
--

INSERT INTO `utility_service_providers` (`id`, `business_name`, `address`, `license_no`, `owner_name`, `email_id`, `service_tax_unit`, `provider_type`, `phone_no`, `created_at`, `updated_at`) VALUES
(1, 'Electricity', 'Mumbai', 'SXSX', 'basket wala', 'basket@wala.com', 18, 'abc', 1231223423242, '2019-08-20 13:27:34', '0000-00-00 00:00:00'),
(2, 'asda', 'Mumbai', '3443a3244', 'ddfgdgdDFSF', 'internet@wala.com', 345, 'abc', 1212121212, '2019-08-21 13:11:07', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_service_provider_members`
--

INSERT INTO `utility_service_provider_members` (`id`, `utility_service_provider_id`, `member_id`, `created_at`, `updated_at`, `utility_plan_id`, `member_balance`, `initial_outstanding`) VALUES
(1, 1, 11, '2019-08-21 10:19:00', '0000-00-00 00:00:00', 0, NULL, 500);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bank_transactions`
--
ALTER TABLE `bank_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `billing_heads`
--
ALTER TABLE `billing_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=196;
--
-- AUTO_INCREMENT for table `cowork_master`
--
ALTER TABLE `cowork_master`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `parking_charges`
--
ALTER TABLE `parking_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=602;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `societies`
--
ALTER TABLE `societies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `society_accesses`
--
ALTER TABLE `society_accesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `up_billing_heads`
--
ALTER TABLE `up_billing_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `up_payments`
--
ALTER TABLE `up_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `utility_plans`
--
ALTER TABLE `utility_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `utility_service_providers`
--
ALTER TABLE `utility_service_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `utility_service_provider_members`
--
ALTER TABLE `utility_service_provider_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
