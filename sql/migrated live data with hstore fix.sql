-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 02, 2019 at 07:26 AM
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
-- Database: `manage_mod`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE IF NOT EXISTS `activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `params` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `browser`, `ip_address`, `controller`, `action`, `params`, `note`, `created_at`, `updated_at`, `user_name`) VALUES
(27, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '10.34.116.38', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"CEqBU5h0W1fEV4ZhZHB/8V3o65vYI5Xoaj06saVztkeuer6z6tF5PKVKweBvMdNEyGBbpd2UIYotfYUYLfWBLA==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"1\"} permitted: false>', 'Housing Society  - Society Deleted', '2019-07-25 05:37:54', '2019-07-25 05:37:54', 'admin@gmail.com'),
(73, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', '10.79.40.49', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"r5I5U1P6pbr9z/og7jjsMhhin0/pNncEQY9Fbiqe6Pn8gu7YsMlrlIOtuEfOoio29CkwsBj28rAZvoynycPFew==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"2\"} permitted: false>', 'Housing Society  - Society Deleted', '2019-07-30 02:32:30', '2019-07-30 02:32:30', 'admin@gmail.com'),
(107, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '10.83.35.31', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"mCb9PEDFKreMNRggw5uIfaB0leYFKjwo1/mb3MhRknUt8h+4uzyqQJlpwQHjCjNkOH2CWeRN1JhdAHg+mlHcwQ==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"3\"} permitted: false>', 'Shine Tower - Society Deleted', '2019-07-30 04:33:29', '2019-07-30 04:33:29', 'admin@gmail.com'),
(139, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '10.12.254.40', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"F2EZ1NaGTjaF8x5m1K7+/l5bFK/NVNXy7WRcsDR1en1pPhXGseC4HZ4zTHMNL1m8VXmrebp3rt0fcu3x8GDYwA==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"5\"} permitted: false>', 'Rain tower  - Society Deleted', '2019-07-30 06:49:51', '2019-07-30 06:49:51', 'admin@gmail.com'),
(167, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '10.12.53.140', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"F6B7YaIvqtIttIb45Ef24A8E3E+XmSEOYW5gcDxCwICfHYLMkDZEE6mde/Xo7dIM9kxRlmabW8eMPd4vfq3Ivw==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"6\"} permitted: false>', 'Fire society  - Society Deleted', '2019-07-30 08:35:50', '2019-07-30 08:35:50', 'admin@gmail.com'),
(216, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '10.79.40.49', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"zukl8AW/T/jdKpbLGeQ/Tz/3R6sKwYNevc8eus1CvN/CtkH7yRreAFMJkGBUQacAwQ7cEt0e9CoxokwHqVt/IQ==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"10\"} permitted: false>', 'Cool society  - Society Deleted', '2019-08-02 02:32:27', '2019-08-02 02:32:27', 'admin@gmail.com'),
(217, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '10.15.185.25', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"l5hNY6ynlJMODmnnETti7J5pB0AF6NqCG1Qb+SjQyyebxyloYAIFa4Atb0xcnvqjYJCc+dI3rfaXOUlETMkI2Q==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"8\"} permitted: false>', 'snow society  - Society Deleted', '2019-08-02 02:34:41', '2019-08-02 02:34:41', 'admin@gmail.com'),
(218, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '10.9.114.248', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"XG33WR1oMDHSrQnV7S8UvIdOUKfNDFAfOMRRUrDHAc5BW+cixkBusmiELNDyFXl5xW4iPfvJmZ5JEZR11dMeIQ==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"9\"} permitted: false>', 'Fire society  - Society Deleted', '2019-08-02 02:39:19', '2019-08-02 02:39:19', 'admin@gmail.com'),
(265, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '10.39.143.244', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"iqxr2DD9vhe9vw+vS2Qhha/OoCny0cVq0BrKCOahVj6vdtBAycqi21Ply+fbKrCvDdQEZqoSMaSZ0mbixyW6cQ==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"13\"} permitted: false>', 'Soon society  - Society Deleted', '2019-08-19 06:01:51', '2019-08-19 06:01:51', 'admin@gmail.com'),
(277, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '10.15.246.123', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"ct6mgsbaLTy/+CiYpvG/x48sWTw2/mWBlLWQEDiuqlVmgJkpH0MX964OwOzsZsx/4MqjMDAMVabEy6UFwaYbzw==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"12\"} permitted: false>', 'Simple society  - Society Deleted', '2019-08-21 03:59:21', '2019-08-21 03:59:21', 'admin@gmail.com'),
(278, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '10.38.120.3', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"9beompwWhbKDNGxE/mpW8web4bTt8fJwhCkO4ZurbvLihoOMcpXXB292lGX8EMRlYKq6+6sRNF9h+IrIusgU4w==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"14\"} permitted: false>', 'Soon society  - Society Deleted', '2019-08-24 02:03:09', '2019-08-24 02:03:09', 'admin@gmail.com'),
(289, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '10.13.177.101', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"vrAlck9v/yIJa7Ot2pQHUAfPxeudnYIuR/0aHuSkpd4flARrxazUrwOy7uCU6jbSO2JSjopFyW8VCDMeFfL5QA==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"15\"} permitted: false>', 'Hook Society  - Society Deleted', '2019-08-27 08:09:57', '2019-08-27 08:09:57', 'admin@gmail.com'),
(334, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '10.105.36.221', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"VtfTVrIS7+/yU4/aC4nuMJw4xxKdAgwujwcbE3xWvT3tmJnDhbGHD+9H72JaewXu3kcfIAvx8TXO2kwtTwxbHg==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"17\"} permitted: false>', 'Delete Society  - Society Deleted', '2019-09-03 02:36:14', '2019-09-03 02:36:14', 'admin@gmail.com'),
(338, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '10.11.161.2', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"+P0YRx4EMN24v6gk4myhUFYc+yzNIT1/d27AfcFFxD9X4drOkqRb4r+z4ZYR2Axt58KJII++/FxLVYE9E37ITw==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"18\"} permitted: false>', 'Test Mid Year - Society Deleted', '2019-09-05 07:49:33', '2019-09-05 07:49:33', 'admin@gmail.com'),
(341, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '10.9.114.248', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"sCs3HO5fDx6aYqK/5LSf6rwjjyVNlHv7RZSQEm9FFPiGqkO1r5xFC/6mxMDNJri3MoRmjPSDn/7QtkBLoor1Kw==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"19\"} permitted: false>', 'Cool Down  - Society Deleted', '2019-09-11 04:50:21', '2019-09-11 04:50:21', 'admin@gmail.com'),
(353, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '10.32.165.53', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"4eA6077BmZkBh54xo2nhda9tiih+V7jgnYgXU7YgAWx0SmuQxxhngPVNiXXBv0HVue+EFCGxfcfN8lEcT9ipwQ==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"20\"} permitted: false>', 'Cool Down  - Society Deleted', '2019-09-12 01:35:41', '2019-09-12 01:35:41', 'admin@gmail.com'),
(377, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '10.15.102.245', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"j0EIBhBT+Qmj4xDXqYatyJtk1Q3I9866xV8g910VaMIa61lFaYoHEFcpB5PLUA1ojebbMZcRC52VJWa4pO3Abw==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"21\"} permitted: false>', 'Test Society  - Society Deleted', '2019-09-12 02:26:24', '2019-09-12 02:26:24', 'admin@gmail.com'),
(379, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '10.11.238.43', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"72Y+iPmsGOAdrotT7rnCtI49bQupWH1exFgPqDxse8p6zG/LgHXm+elknBeMb2IUmL9jN/a+uHmUIknnxZTTZw==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"22\"} permitted: false>', 'Test Society  - Society Deleted', '2019-09-12 02:38:24', '2019-09-12 02:38:24', 'admin@gmail.com'),
(396, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '10.39.200.130', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"+WTONtnWf/fWawqCfEuH7bcUfeghADaLdqdFjMJKTJZszp91oA+B7iKhHcYenSdNoZZz1H7m86wm3QPDO7LkOw==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"23\"} permitted: false>', 'Test Society  - Society Deleted', '2019-09-12 03:43:12', '2019-09-12 03:43:12', 'admin@gmail.com'),
(409, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '10.38.231.42', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"xPFMuTN5wBobsVpTSlH/ihKTLsFz/UxDGwsIBtVmGipRWx36SqA+A+97TRcoh18qBBEg/SwbiWRLcU5JLJ6yhw==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"24\"} permitted: false>', 'Test Society  - Society Deleted', '2019-09-12 03:59:05', '2019-09-12 03:59:05', 'admin@gmail.com'),
(422, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '10.11.72.189', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"jVurEskM07icnJ2TuTEroQMX0yIrfnYbuWsMi4jXAKg7YnbvoxfqmScezLXsdfnHNOSPw7nUSapZPpB/NhXWIA==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"26\"} permitted: false>', 'Sample Society  - Society Deleted', '2019-09-14 03:24:40', '2019-09-14 03:24:40', 'admin@gmail.com'),
(430, '1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '10.11.72.189', 'societies', 'destroy', '<ActionController::Parameters {\"_method\"=>\"delete\", \"authenticity_token\"=>\"LKR8+KzpilXKIZf/MSXMUILGhLaOrDUlUTssWdKn7MUWLxJVVjmqAs+K5tEWwtpS2HYat3Atv7/8n7ju+X++yA==\", \"controller\"=>\"societies\", \"action\"=>\"destroy\", \"id\"=>\"27\"} permitted: false>', 'Restart Society  - Society Deleted', '2019-09-21 06:31:31', '2019-09-21 06:31:31', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ar_internal_metadata`
--

DROP TABLE IF EXISTS `ar_internal_metadata`;
CREATE TABLE IF NOT EXISTS `ar_internal_metadata` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ar_internal_metadata`
--

INSERT INTO `ar_internal_metadata` (`key`, `value`, `created_at`, `updated_at`) VALUES
('environment', 'production', '2019-07-24 07:52:50', '2019-07-24 07:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
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
  `current_balance` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `address`, `branch`, `ifsc`, `micr`, `ac_no`, `from_dt`, `exp_dt`, `phone`, `email`, `created_at`, `updated_at`, `society_id`, `opening_balance`, `current_balance`) VALUES
(4, 'Kotak Mahindra Bank Ltd', 'MARY GREG,GROUND FLOOR,MAIN TOURCH ROAD,MANIKPUR,VASAI - WEST', 'VASAI - MANIKPUR', 'KKBK0000659', '', 5612985097, NULL, NULL, NULL, '', '2019-07-30 04:32:42', '2019-07-30 04:32:42', 4, '0.00', NULL),
(7, 'Kotak Mahindra Bank Ltd', 'MARY GREG,GROUND FLOOR,MAIN TOURCH ROAD,MANIKPUR,VASAI - WEST', 'VASAI - MANIKPUR', 'KKBK0000659', '', 5612985097, NULL, NULL, NULL, '', '2019-07-30 08:14:24', '2019-07-30 08:14:24', 7, '0.00', NULL),
(11, 'HDFC Bank Ltd', 'Vasai', 'Vasai', 'HDFC000926', '', 1251250, NULL, NULL, 2288888888, 'hdfc@gmail.com', '2019-08-06 06:02:23', '2019-08-26 01:34:24', 11, '29216.00', NULL),
(16, 'TMDC', 'Kalyan', 'Kalyan', 'NA', '', 0, NULL, NULL, NULL, '', '2019-08-29 23:44:57', '2019-08-30 00:33:08', 16, '1170.00', NULL),
(18, 'State Bank Of India', 'Belapur CBD', 'Belapur CBD', 'SBIN0013551', '', 20073225261, NULL, NULL, NULL, '', '2019-09-09 00:43:27', '2019-09-09 00:43:27', 16, '0.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_transactions`
--

DROP TABLE IF EXISTS `bank_transactions`;
CREATE TABLE IF NOT EXISTS `bank_transactions` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `narration` varchar(255) DEFAULT NULL,
  `credit` decimal(20,2) DEFAULT NULL,
  `debit` decimal(20,2) DEFAULT NULL,
  `balance` decimal(20,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bank_id` int(11) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `expense_id` int(11) DEFAULT NULL,
  `is_cash` varchar(5) DEFAULT NULL,
  `is_arrears` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_transactions`
--

INSERT INTO `bank_transactions` (`id`, `date`, `narration`, `credit`, `debit`, `balance`, `created_at`, `updated_at`, `bank_id`, `society_id`, `expense_id`, `is_cash`, `is_arrears`) VALUES
(1, '2019-10-01 19:20:46', 'cash opening balance transfer', '0.00', NULL, '0.00', '2019-07-25 02:02:33', '2019-07-25 02:02:33', NULL, 1, NULL, 't', 'f'),
(2, '2019-10-01 19:20:46', 'bank opening balance transfer', '25500.00', NULL, '25500.00', '2019-07-25 02:31:34', '2019-07-25 02:31:34', 1, 1, NULL, 'f', 'f'),
(3, '2019-10-01 19:20:46', 'cash opening balance transfer', '450.00', NULL, '450.00', '2019-07-25 05:39:21', '2019-07-25 05:39:21', NULL, 2, NULL, 't', 'f'),
(4, '2019-10-01 19:20:46', 'bank opening balance transfer', '7450.00', NULL, '7450.00', '2019-07-25 06:19:44', '2019-07-25 06:19:44', 2, 2, NULL, 'f', 'f'),
(5, '2019-07-09 13:00:00', 'cheque transaction', '2375.00', NULL, '9825.00', '2019-07-25 07:47:25', '2019-07-25 07:47:25', 2, 2, NULL, 'f', 'f'),
(6, '2019-07-10 13:00:00', 'cheque transaction', '2537.50', NULL, '12362.50', '2019-07-25 07:47:25', '2019-07-25 07:47:25', 2, 2, NULL, 'f', 'f'),
(7, '2019-07-10 13:00:00', 'cheque transaction', '2587.50', NULL, '14950.00', '2019-07-25 07:47:26', '2019-07-25 07:47:26', 2, 2, NULL, 'f', 'f'),
(8, '2019-07-10 13:00:00', 'cheque transaction', '2375.00', NULL, '17325.00', '2019-07-25 07:47:26', '2019-07-25 07:47:26', 2, 2, NULL, 'f', 'f'),
(9, '2019-07-10 13:00:00', 'cheque transaction', '2375.00', NULL, '19700.00', '2019-07-25 07:47:26', '2019-07-25 07:47:26', 2, 2, NULL, 'f', 'f'),
(10, '2019-07-10 13:00:00', 'cheque transaction', '2975.00', NULL, '22675.00', '2019-07-25 07:47:26', '2019-07-25 07:47:26', 2, 2, NULL, 'f', 'f'),
(11, '2019-07-13 13:00:00', 'cheque transaction', '3012.50', NULL, '25687.50', '2019-07-25 07:47:27', '2019-07-25 07:47:27', 2, 2, NULL, 'f', 'f'),
(12, '2019-07-13 13:00:00', 'cheque transaction', '2637.50', NULL, '28325.00', '2019-07-25 07:47:27', '2019-07-25 07:47:27', 2, 2, NULL, 'f', 'f'),
(13, '2019-07-13 13:00:00', 'cheque transaction', '2825.00', NULL, '31150.00', '2019-07-25 07:47:27', '2019-07-25 07:47:27', 2, 2, NULL, 'f', 'f'),
(14, '2019-07-13 13:00:00', 'cheque transaction', '2375.00', NULL, '33525.00', '2019-07-25 07:47:27', '2019-07-25 07:47:27', 2, 2, NULL, 'f', 'f'),
(15, '2019-07-13 13:00:00', 'cheque transaction', '2375.00', NULL, '35900.00', '2019-07-25 07:47:27', '2019-07-25 07:47:27', 2, 2, NULL, 'f', 'f'),
(16, '2019-07-19 13:00:00', 'cheque transaction', '3087.50', NULL, '38987.50', '2019-07-25 07:47:28', '2019-07-25 07:47:28', 2, 2, NULL, 'f', 'f'),
(17, '2019-07-19 13:00:00', 'cheque transaction', '2587.50', NULL, '41575.00', '2019-07-25 07:47:28', '2019-07-25 07:47:28', 2, 2, NULL, 'f', 'f'),
(18, '2019-07-19 13:00:00', 'cheque transaction', '3700.00', NULL, '45275.00', '2019-07-25 07:47:28', '2019-07-25 07:47:28', 2, 2, NULL, 'f', 'f'),
(19, '2019-07-19 13:00:00', 'cheque transaction', '3087.50', NULL, '48362.50', '2019-07-25 07:47:28', '2019-07-25 07:47:28', 2, 2, NULL, 'f', 'f'),
(20, '2019-07-19 13:00:00', 'cheque transaction', '2587.50', NULL, '50950.00', '2019-07-25 07:47:28', '2019-07-25 07:47:28', 2, 2, NULL, 'f', 'f'),
(21, '2019-07-24 13:00:00', 'cheque transaction', '2425.00', NULL, '53375.00', '2019-07-25 07:47:28', '2019-07-25 07:47:28', 2, 2, NULL, 'f', 'f'),
(22, '2019-07-24 13:00:00', 'cheque transaction', '7000.00', NULL, '60375.00', '2019-07-25 07:47:28', '2019-07-25 07:47:28', 2, 2, NULL, 'f', 'f'),
(23, '2019-07-24 13:00:00', 'Decoration Charges', NULL, '4000.00', '56375.00', '2019-07-25 08:03:53', '2019-07-25 08:03:53', 2, 2, NULL, 'f', 'f'),
(24, '2019-07-24 13:00:00', 'Printing', NULL, '150.00', '56225.00', '2019-07-25 08:04:20', '2019-07-25 08:04:20', 2, 2, NULL, 'f', 'f'),
(25, '2019-07-24 13:00:00', 'Salaries', NULL, '6000.00', '50225.00', '2019-07-25 08:05:06', '2019-07-25 08:05:06', 2, 2, NULL, 'f', 'f'),
(26, '2019-07-25 13:00:00', 'cash expense', NULL, '75.00', '375.00', '2019-07-26 06:43:13', '2019-07-26 06:43:13', NULL, 2, NULL, 't', 'f'),
(27, '2019-07-25 13:00:00', 'General Expns', NULL, '3500.00', '46725.00', '2019-07-26 06:44:44', '2019-07-26 06:44:44', 2, 2, NULL, 'f', 'f'),
(28, '2019-10-01 19:20:48', 'cash opening balance transfer', '1000.00', NULL, '1000.00', '2019-07-30 00:35:56', '2019-07-30 00:35:56', NULL, 3, NULL, 't', 'f'),
(29, '2019-10-01 19:20:48', 'bank opening balance transfer', '500.00', NULL, '500.00', '2019-07-30 02:00:52', '2019-07-30 02:00:52', 3, 3, NULL, 'f', 'f'),
(30, '2019-10-01 19:20:48', 'cash opening balance transfer', '0.00', NULL, '0.00', '2019-07-30 04:26:44', '2019-07-30 04:26:44', NULL, 4, NULL, 't', 'f'),
(31, '2019-10-01 19:20:48', 'bank opening balance transfer', '0.00', NULL, '0.00', '2019-07-30 04:32:42', '2019-07-30 04:32:42', 4, 4, NULL, 'f', 'f'),
(32, '2019-10-01 19:20:48', 'cash opening balance transfer', '500.00', NULL, '500.00', '2019-07-30 04:40:25', '2019-07-30 04:40:25', NULL, 5, NULL, 't', 'f'),
(33, '2019-10-01 19:20:48', 'bank opening balance transfer', '0.00', NULL, '0.00', '2019-07-30 04:51:57', '2019-07-30 04:51:57', 5, 5, NULL, 'f', 'f'),
(34, '2019-10-01 19:20:48', 'cash opening balance transfer', '1000.00', NULL, '1000.00', '2019-07-30 07:10:43', '2019-07-30 07:10:43', NULL, 6, NULL, 't', 'f'),
(35, '2019-10-01 19:20:48', 'bank opening balance transfer', '0.00', NULL, '0.00', '2019-07-30 08:07:51', '2019-07-30 08:07:51', 6, 6, NULL, 'f', 'f'),
(36, '2019-10-01 19:20:48', 'cash opening balance transfer', '0.00', NULL, '0.00', '2019-07-30 08:08:39', '2019-07-30 08:08:39', NULL, 7, NULL, 't', 'f'),
(37, '2019-10-01 19:20:48', 'bank opening balance transfer', '0.00', NULL, '0.00', '2019-07-30 08:14:24', '2019-07-30 08:14:24', 7, 7, NULL, 'f', 'f'),
(38, '2019-10-01 19:20:48', 'cash opening balance transfer', '1000.00', NULL, '1000.00', '2019-07-30 08:43:20', '2019-07-30 08:43:20', NULL, 8, NULL, 't', 'f'),
(39, '2019-10-01 19:20:49', 'bank opening balance transfer', '500.00', NULL, '500.00', '2019-07-31 00:00:49', '2019-07-31 00:00:49', 8, 8, NULL, 'f', 'f'),
(40, '2019-10-01 19:20:49', 'cash opening balance transfer', '1000.00', NULL, '1000.00', '2019-08-01 02:36:55', '2019-08-01 02:36:55', NULL, 9, NULL, 't', 'f'),
(41, '2019-07-31 13:00:00', 'cash transaction', '3500.00', NULL, '3500.00', '2019-08-01 03:30:02', '2019-08-01 03:30:02', NULL, 4, NULL, 't', 'f'),
(42, '2019-07-31 13:00:00', 'cheque transaction', '22000.00', NULL, '22000.00', '2019-08-01 04:42:17', '2019-08-01 04:42:17', 4, 4, NULL, 'f', 'f'),
(43, '2019-07-31 13:00:00', 'neft transaction', '450.00', NULL, '22450.00', '2019-08-01 05:07:10', '2019-08-01 05:07:10', 4, 4, NULL, 'f', 'f'),
(44, '2019-10-01 19:20:49', 'bank opening balance transfer', '1500.00', NULL, '1500.00', '2019-08-01 05:51:07', '2019-08-01 05:51:07', 9, 9, NULL, 'f', 'f'),
(45, '2019-10-01 19:20:49', 'cash opening balance transfer', '3000.00', NULL, '3000.00', '2019-08-01 05:57:43', '2019-08-01 05:57:43', NULL, 10, NULL, 't', 'f'),
(46, '2019-10-01 19:20:49', 'bank opening balance transfer', '4000.00', NULL, '4000.00', '2019-08-01 06:17:46', '2019-08-01 06:17:46', 10, 10, NULL, 'f', 'f'),
(47, '2019-01-07 13:00:00', 'cheque transaction', '2825.00', NULL, '6825.00', '2019-08-01 06:43:28', '2019-08-01 06:43:28', 10, 10, NULL, 'f', 'f'),
(48, '2019-02-07 13:00:00', 'cheque transaction', '4450.00', NULL, '5950.00', '2019-08-01 06:45:29', '2019-08-01 06:45:29', 9, 9, NULL, 'f', 'f'),
(49, '2019-06-07 13:00:00', 'cheque transaction', '2340.00', NULL, '2840.00', '2019-08-01 06:47:40', '2019-08-01 06:47:40', 8, 8, NULL, 'f', 'f'),
(50, '2019-01-07 13:00:00', 'cheque transaction', '5000.00', NULL, '11825.00', '2019-08-02 02:10:10', '2019-08-02 02:10:10', 10, 10, NULL, 'f', 'f'),
(51, '2019-07-07 13:00:00', 'cash transaction', '285.00', NULL, '3285.00', '2019-08-02 02:16:16', '2019-08-02 02:16:16', NULL, 10, NULL, 't', 'f'),
(52, '2019-11-07 13:00:00', 'cheque transaction', '1540.00', NULL, '13365.00', '2019-08-02 02:20:35', '2019-08-02 02:20:35', 10, 10, NULL, 'f', 'f'),
(53, '2019-03-07 13:00:00', 'cash transaction', '12000.00', NULL, '15500.00', '2019-08-03 02:07:18', '2019-08-03 02:07:18', NULL, 4, NULL, 't', 'f'),
(54, '2019-08-02 13:00:00', 'cash transaction', '1640.00', NULL, '17140.00', '2019-08-03 02:07:49', '2019-08-03 02:07:49', NULL, 4, NULL, 't', 'f'),
(55, '2019-05-07 13:00:00', 'cheque transaction', '2046.00', NULL, '24496.00', '2019-08-06 05:23:08', '2019-08-06 05:23:08', 4, 4, NULL, 'f', 'f'),
(56, '2019-05-07 13:00:00', 'cheque transaction', '18414.00', NULL, '42910.00', '2019-08-06 05:24:57', '2019-08-06 05:24:57', 4, 4, NULL, 'f', 'f'),
(57, '2019-05-07 13:00:00', 'neft transaction', '40000.00', NULL, '82910.00', '2019-08-06 05:25:53', '2019-08-06 05:25:53', 4, 4, NULL, 'f', 'f'),
(58, '2019-05-07 13:00:00', 'neft transaction', '22385.00', NULL, '105295.00', '2019-08-06 05:26:42', '2019-08-06 05:26:42', 4, 4, NULL, 'f', 'f'),
(59, '2019-05-07 13:00:00', 'cheque transaction', '22500.00', NULL, '127795.00', '2019-08-06 05:27:17', '2019-08-06 05:27:17', 4, 4, NULL, 'f', 'f'),
(60, '2019-03-07 13:00:00', 'neft transaction', '5000.00', NULL, '132795.00', '2019-08-06 05:28:19', '2019-08-06 05:28:19', 4, 4, NULL, 'f', 'f'),
(61, '2019-03-07 13:00:00', 'neft transaction', '5000.00', NULL, '137795.00', '2019-08-06 05:28:55', '2019-08-06 05:28:55', 4, 4, NULL, 'f', 'f'),
(62, '2019-10-01 19:20:50', 'cash opening balance transfer', '150.00', NULL, '150.00', '2019-08-06 05:59:45', '2019-08-06 05:59:45', NULL, 11, NULL, 't', 'f'),
(63, '2019-10-01 19:20:51', 'bank opening balance transfer', '7500.00', NULL, '7500.00', '2019-08-06 06:02:23', '2019-08-06 06:02:23', 11, 11, NULL, 'f', 'f'),
(64, '2019-08-03 13:00:00', 'July 2019 Bill Paid', NULL, '3400.00', '4100.00', '2019-08-06 06:15:16', '2019-08-06 06:15:16', 11, 11, NULL, 'f', 'f'),
(65, '2019-08-04 13:00:00', 'Printing', NULL, '430.00', '3670.00', '2019-08-06 06:15:46', '2019-08-06 06:15:46', 11, 11, NULL, 'f', 'f'),
(66, '2019-08-04 13:00:00', 'Security Expenses', NULL, '3000.00', '670.00', '2019-08-06 06:16:32', '2019-08-06 06:16:32', 11, 11, NULL, 'f', 'f'),
(67, '2019-07-09 13:00:00', 'cheque transaction', '1200.00', NULL, '1870.00', '2019-08-06 06:25:03', '2019-08-06 06:25:03', 11, 11, NULL, 'f', 'f'),
(68, '2019-07-10 13:00:00', 'cheque transaction', '1487.50', NULL, '3357.50', '2019-08-06 06:25:03', '2019-08-06 06:25:03', 11, 11, NULL, 'f', 'f'),
(69, '2019-07-10 13:00:00', 'cheque transaction', '1537.50', NULL, '4895.00', '2019-08-06 06:25:03', '2019-08-06 06:25:03', 11, 11, NULL, 'f', 'f'),
(70, '2019-07-10 13:00:00', 'cheque transaction', '1200.00', NULL, '6095.00', '2019-08-06 06:25:04', '2019-08-06 06:25:04', 11, 11, NULL, 'f', 'f'),
(71, '2019-07-10 13:00:00', 'cheque transaction', '1200.00', NULL, '7295.00', '2019-08-06 06:25:04', '2019-08-06 06:25:04', 11, 11, NULL, 'f', 'f'),
(72, '2019-07-10 13:00:00', 'cheque transaction', '1800.00', NULL, '9095.00', '2019-08-06 06:25:04', '2019-08-06 06:25:04', 11, 11, NULL, 'f', 'f'),
(73, '2019-07-13 13:00:00', 'cheque transaction', '1962.50', NULL, '11057.50', '2019-08-06 06:25:04', '2019-08-06 06:25:04', 11, 11, NULL, 'f', 'f'),
(74, '2019-07-13 13:00:00', 'cheque transaction', '1587.50', NULL, '12645.00', '2019-08-06 06:25:04', '2019-08-06 06:25:04', 11, 11, NULL, 'f', 'f'),
(75, '2019-07-13 13:00:00', 'cheque transaction', '1650.00', NULL, '14295.00', '2019-08-06 06:25:04', '2019-08-06 06:25:04', 11, 11, NULL, 'f', 'f'),
(76, '2019-07-13 13:00:00', 'cheque transaction', '1200.00', NULL, '15495.00', '2019-08-06 06:25:04', '2019-08-06 06:25:04', 11, 11, NULL, 'f', 'f'),
(77, '2019-07-13 13:00:00', 'cheque transaction', '1200.00', NULL, '16695.00', '2019-08-06 06:25:04', '2019-08-06 06:25:04', 11, 11, NULL, 'f', 'f'),
(78, '2019-07-19 13:00:00', 'cheque transaction', '2037.50', NULL, '18732.50', '2019-08-06 06:25:04', '2019-08-06 06:25:04', 11, 11, NULL, 'f', 'f'),
(79, '2019-07-19 13:00:00', 'cheque transaction', '1537.50', NULL, '20270.00', '2019-08-06 06:25:05', '2019-08-06 06:25:05', 11, 11, NULL, 'f', 'f'),
(80, '2019-07-19 13:00:00', 'cheque transaction', '3700.00', NULL, '23970.00', '2019-08-06 06:25:05', '2019-08-06 06:25:05', 11, 11, NULL, 'f', 'f'),
(81, '2019-07-19 13:00:00', 'cheque transaction', '2037.50', NULL, '26007.50', '2019-08-06 06:25:05', '2019-08-06 06:25:05', 11, 11, NULL, 'f', 'f'),
(82, '2019-07-19 13:00:00', 'cheque transaction', '1537.50', NULL, '27545.00', '2019-08-06 06:25:05', '2019-08-06 06:25:05', 11, 11, NULL, 'f', 'f'),
(83, '2019-07-24 13:00:00', 'cheque transaction', '1250.00', NULL, '28795.00', '2019-08-06 06:25:05', '2019-08-06 06:25:05', 11, 11, NULL, 'f', 'f'),
(84, '2019-07-24 13:00:00', 'cheque transaction', '7000.00', NULL, '35795.00', '2019-08-06 06:25:05', '2019-08-06 06:25:05', 11, 11, NULL, 'f', 'f'),
(85, '2019-08-08 13:00:00', 'cheque transaction', '20650.00', NULL, '158445.00', '2019-08-12 21:56:45', '2019-08-12 21:56:45', 4, 4, NULL, 'f', 'f'),
(86, '2019-08-04 13:00:00', 'neft transaction', '580.00', NULL, '159025.00', '2019-08-12 21:57:57', '2019-08-12 21:57:57', 4, 4, NULL, 'f', 'f'),
(87, '2019-08-13 13:00:00', 'neft transaction', '9000.00', NULL, '168025.00', '2019-08-16 06:25:59', '2019-08-16 06:25:59', 4, 4, NULL, 'f', 'f'),
(88, '2019-08-15 13:00:00', 'neft transaction', '5000.00', NULL, '173025.00', '2019-08-16 23:34:14', '2019-08-16 23:34:14', 4, 4, NULL, 'f', 'f'),
(89, '2019-10-01 19:20:52', 'cash opening balance transfer', '1000.00', NULL, '1000.00', '2019-08-17 04:34:20', '2019-08-17 04:34:20', NULL, 12, NULL, 't', 'f'),
(90, '2019-10-01 19:20:52', 'bank opening balance transfer', '1000.00', NULL, '1000.00', '2019-08-17 04:48:37', '2019-08-17 04:48:37', 12, 12, NULL, 'f', 'f'),
(91, '2019-05-07 13:00:00', 'cheque transaction', '4000.00', NULL, '5000.00', '2019-08-19 05:07:47', '2019-08-19 05:07:47', 12, 12, NULL, 'f', 'f'),
(92, '2018-05-08 13:00:00', 'cheque transaction', '261.00', NULL, '5261.00', '2019-08-19 05:09:14', '2019-08-19 05:09:14', 12, 12, NULL, 'f', 'f'),
(93, '2019-08-04 13:00:00', 'cheque transaction', '4697.00', NULL, '9958.00', '2019-08-19 05:10:21', '2019-08-19 05:10:21', 12, 12, NULL, 'f', 'f'),
(94, '2019-10-01 19:20:53', 'cash opening balance transfer', '1000.00', NULL, '1000.00', '2019-08-19 05:14:46', '2019-08-19 05:14:46', NULL, 13, NULL, 't', 'f'),
(95, '2019-10-01 19:20:53', 'bank opening balance transfer', '1000.00', NULL, '1000.00', '2019-08-19 05:18:10', '2019-08-19 05:18:10', 13, 13, NULL, 'f', 'f'),
(96, '2019-10-01 19:20:53', 'cash opening balance transfer', '1000.00', NULL, '1000.00', '2019-08-19 06:15:17', '2019-08-19 06:15:17', NULL, 14, NULL, 't', 'f'),
(97, '2019-10-01 19:20:53', 'bank opening balance transfer', '1000.00', NULL, '1000.00', '2019-08-19 06:32:39', '2019-08-19 06:32:39', 14, 14, NULL, 'f', 'f'),
(98, '2019-07-31 13:00:00', 'cheque transaction', '3908.00', NULL, '4908.00', '2019-08-19 06:37:27', '2019-08-19 06:37:27', 14, 14, NULL, 'f', 'f'),
(99, '2019-08-09 13:00:00', 'cheque transaction', '2770.00', NULL, '7678.00', '2019-08-19 23:47:26', '2019-08-19 23:47:26', 14, 14, NULL, 'f', 'f'),
(100, '2019-08-10 13:00:00', 'cheque transaction', '4150.00', NULL, '11828.00', '2019-08-19 23:47:26', '2019-08-19 23:47:26', 14, 14, NULL, 'f', 'f'),
(101, '2019-08-21 13:00:00', 'cheque transaction', '1249.00', NULL, '37044.00', '2019-08-22 06:00:59', '2019-08-22 06:00:59', 11, 11, NULL, 'f', 'f'),
(102, '2019-10-01 19:20:53', 'cash opening balance transfer', '1000.00', NULL, '1000.00', '2019-08-24 03:03:50', '2019-08-24 03:03:50', NULL, 15, NULL, 't', 'f'),
(103, '2019-10-01 19:20:53', 'bank opening balance transfer', '2000.00', NULL, '2000.00', '2019-08-24 03:48:08', '2019-08-24 03:48:08', 15, 15, NULL, 'f', 'f'),
(104, '2019-07-31 13:00:00', 'cheque transaction', '6143.00', NULL, '8143.00', '2019-08-24 04:02:45', '2019-08-24 04:02:45', 15, 15, NULL, 'f', 'f'),
(105, '2019-08-25 13:00:00', 'cash transaction', '3222.00', NULL, '3372.00', '2019-08-26 01:30:28', '2019-08-26 01:30:28', NULL, 11, NULL, 't', 'f'),
(106, '2019-08-25 13:00:00', 'cash expense', NULL, '200.00', '3172.00', '2019-08-26 01:32:06', '2019-08-26 01:32:06', NULL, 11, NULL, 't', 'f'),
(107, '2019-08-25 13:00:00', 'Transfer to Bank as per Bye Laws', NULL, '2172.00', '1000.00', '2019-08-26 01:33:09', '2019-08-26 01:33:09', NULL, 11, NULL, 't', 'f'),
(108, '2019-08-25 13:00:00', 'transfer from cash in hand', '2172.00', NULL, '39216.00', '2019-08-26 01:33:09', '2019-08-26 01:33:09', 11, 11, NULL, 'f', 'f'),
(109, '2019-08-26 13:00:00', 'Petty Cash for Society Function', NULL, '10000.00', '29216.00', '2019-08-26 01:34:23', '2019-08-26 01:34:23', 11, 11, NULL, 'f', 'f'),
(110, '2019-08-26 13:00:00', 'Petty Cash for Society Function', NULL, '10000.00', '11000.00', '2019-08-26 01:34:24', '2019-08-26 01:34:24', NULL, 11, NULL, 't', 'f'),
(111, '2019-10-01 19:20:54', 'cash opening balance transfer', '0.00', NULL, '0.00', '2019-08-29 23:24:57', '2019-08-29 23:24:57', NULL, 16, NULL, 't', 'f'),
(112, '2019-10-01 19:20:54', 'bank opening balance transfer', '0.00', NULL, '0.00', '2019-08-29 23:44:57', '2019-08-29 23:44:57', 16, 16, NULL, 'f', 'f'),
(113, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '350.00', '2019-08-30 00:01:27', '2019-08-30 00:01:27', NULL, 16, NULL, 't', 'f'),
(114, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '700.00', '2019-08-30 00:01:27', '2019-08-30 00:01:27', NULL, 16, NULL, 't', 'f'),
(115, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '1050.00', '2019-08-30 00:01:27', '2019-08-30 00:01:27', NULL, 16, NULL, 't', 'f'),
(116, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '1400.00', '2019-08-30 00:01:27', '2019-08-30 00:01:27', NULL, 16, NULL, 't', 'f'),
(117, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '1750.00', '2019-08-30 00:01:27', '2019-08-30 00:01:27', NULL, 16, NULL, 't', 'f'),
(118, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '2100.00', '2019-08-30 00:01:27', '2019-08-30 00:01:27', NULL, 16, NULL, 't', 'f'),
(119, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '2450.00', '2019-08-30 00:01:27', '2019-08-30 00:01:27', NULL, 16, NULL, 't', 'f'),
(120, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '2800.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(121, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '3150.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(122, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '3500.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(123, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '3850.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(124, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '4200.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(125, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '4550.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(126, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '4900.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(127, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '5250.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(128, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '5600.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(129, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '5950.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(130, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '6300.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(131, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '6650.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(132, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '7000.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(133, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '7350.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(134, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '7700.00', '2019-08-30 00:01:28', '2019-08-30 00:01:28', NULL, 16, NULL, 't', 'f'),
(135, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '8050.00', '2019-08-30 00:01:29', '2019-08-30 00:01:29', NULL, 16, NULL, 't', 'f'),
(136, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '8400.00', '2019-08-30 00:01:29', '2019-08-30 00:01:29', NULL, 16, NULL, 't', 'f'),
(137, '2019-02-09 13:00:00', 'Cash Deposit', NULL, '7950.00', '450.00', '2019-08-30 00:11:00', '2019-08-30 00:11:00', NULL, 16, NULL, 't', 'f'),
(138, '2019-02-09 13:00:00', 'transfer from cash in hand', '7950.00', NULL, '7950.00', '2019-08-30 00:11:00', '2019-08-30 00:11:00', 16, 16, NULL, 'f', 'f'),
(139, '2019-02-09 13:00:00', 'Electricity Bill Paid', NULL, '3150.00', '4800.00', '2019-08-30 00:11:57', '2019-08-30 00:11:57', 16, 16, NULL, 'f', 'f'),
(140, '2019-02-09 13:00:00', 'Housekeeping Expenses', NULL, '2400.00', '2400.00', '2019-08-30 00:20:29', '2019-08-30 00:20:29', 16, 16, NULL, 'f', 'f'),
(141, '2019-02-09 13:00:00', 'Water Expenses', NULL, '2400.00', '0.00', '2019-08-30 00:21:06', '2019-08-30 00:21:06', 16, 16, NULL, 'f', 'f'),
(142, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '800.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(143, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '1150.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(144, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '1500.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(145, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '1850.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(146, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '2200.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(147, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '2550.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(148, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '2900.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(149, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '3250.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(150, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '3600.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(151, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '3950.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(152, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '4300.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(153, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '4650.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(154, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '5000.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(155, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '5350.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(156, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '5700.00', '2019-08-30 00:27:17', '2019-08-30 00:27:17', NULL, 16, NULL, 't', 'f'),
(157, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '6050.00', '2019-08-30 00:27:18', '2019-08-30 00:27:18', NULL, 16, NULL, 't', 'f'),
(158, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '6400.00', '2019-08-30 00:27:18', '2019-08-30 00:27:18', NULL, 16, NULL, 't', 'f'),
(159, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '6750.00', '2019-08-30 00:27:18', '2019-08-30 00:27:18', NULL, 16, NULL, 't', 'f'),
(160, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '7100.00', '2019-08-30 00:27:18', '2019-08-30 00:27:18', NULL, 16, NULL, 't', 'f'),
(161, '2019-02-09 13:00:00', 'cash transaction', '350.00', NULL, '7450.00', '2019-08-30 00:27:18', '2019-08-30 00:27:18', NULL, 16, NULL, 't', 'f'),
(162, '2019-03-04 13:00:00', 'Deposit', NULL, '7450.00', '0.00', '2019-08-30 00:31:13', '2019-08-30 00:31:13', NULL, 16, NULL, 't', 'f'),
(163, '2019-03-04 13:00:00', 'transfer from cash in hand', '7450.00', NULL, '7450.00', '2019-08-30 00:31:13', '2019-08-30 00:31:13', 16, 16, NULL, 'f', 'f'),
(164, '2019-03-09 13:00:00', 'Electricity Bill Paid', NULL, '3880.00', '3570.00', '2019-08-30 00:32:15', '2019-08-30 00:32:15', 16, 16, NULL, 'f', 'f'),
(165, '2019-03-09 13:00:00', 'Housekeeping Expenses', NULL, '2400.00', '1170.00', '2019-08-30 00:33:08', '2019-08-30 00:33:08', 16, 16, NULL, 'f', 'f'),
(166, '2019-10-01 19:20:56', 'cash opening balance transfer', '1500.00', NULL, '1500.00', '2019-09-03 01:08:17', '2019-09-03 01:08:17', NULL, 17, NULL, 't', 'f'),
(167, '2019-10-01 19:20:56', 'bank opening balance transfer', '500.00', NULL, '500.00', '2019-09-03 02:08:17', '2019-09-03 02:08:17', 17, 17, NULL, 'f', 'f'),
(168, '2019-08-04 13:00:00', 'cheque transaction', '4236.00', NULL, '4736.00', '2019-09-03 02:24:19', '2019-09-03 02:24:19', 17, 17, NULL, 'f', 'f'),
(169, '2019-08-04 13:00:00', 'cheque transaction', '4096.00', NULL, '8832.00', '2019-09-03 02:26:17', '2019-09-03 02:26:17', 17, 17, NULL, 'f', 'f'),
(170, '2019-10-01 19:20:56', 'cash opening balance transfer', '130000.00', NULL, '130000.00', '2019-09-05 06:44:19', '2019-09-05 06:44:19', NULL, 18, NULL, 't', 'f'),
(171, '2019-10-01 19:20:56', 'bank opening balance transfer', '0.00', NULL, '0.00', '2019-09-09 00:43:27', '2019-09-09 00:43:27', 18, 16, NULL, 'f', 'f'),
(172, '2019-10-01 19:20:56', 'cash opening balance transfer', '0.00', NULL, '0.00', '2019-09-11 04:49:31', '2019-09-11 04:49:31', NULL, 19, NULL, 't', 'f'),
(173, '2019-10-01 19:20:56', 'cash opening balance transfer', '1000.00', NULL, '1000.00', '2019-09-11 04:50:38', '2019-09-11 04:50:38', NULL, 20, NULL, 't', 'f'),
(174, '2019-10-01 19:20:56', 'bank opening balance transfer', '1000.00', NULL, '1000.00', '2019-09-11 05:05:07', '2019-09-11 05:05:07', 19, 20, NULL, 'f', 'f'),
(175, '2019-08-31 13:00:00', 'cheque transaction', '3600.00', NULL, '4600.00', '2019-09-11 05:31:09', '2019-09-11 05:31:09', 19, 20, NULL, 'f', 'f'),
(176, '2019-08-31 13:00:00', 'cheque transaction', '5734.00', NULL, '10334.00', '2019-09-11 05:32:21', '2019-09-11 05:32:21', 19, 20, NULL, 'f', 'f'),
(177, '2019-10-01 19:20:57', 'cash opening balance transfer', '100.00', NULL, '100.00', '2019-09-12 01:44:30', '2019-09-12 01:44:30', NULL, 21, NULL, 't', 'f'),
(178, '2019-10-01 19:20:57', 'bank opening balance transfer', '0.00', NULL, '0.00', '2019-09-12 01:56:40', '2019-09-12 01:56:40', 20, 21, NULL, 'f', 'f'),
(179, '2019-10-01 19:20:57', 'cash opening balance transfer', '0.00', NULL, '0.00', '2019-09-12 02:37:53', '2019-09-12 02:37:53', NULL, 22, NULL, 't', 'f'),
(180, '2019-10-01 19:20:57', 'cash opening balance transfer', '0.00', NULL, '0.00', '2019-09-12 02:39:30', '2019-09-12 02:39:30', NULL, 23, NULL, 't', 'f'),
(181, '2019-10-01 19:20:57', 'bank opening balance transfer', '0.00', NULL, '0.00', '2019-09-12 02:50:15', '2019-09-12 02:50:15', 21, 23, NULL, 'f', 'f'),
(182, '2019-10-01 19:20:57', 'cash opening balance transfer', '0.00', NULL, '0.00', '2019-09-12 03:44:00', '2019-09-12 03:44:00', NULL, 24, NULL, 't', 'f'),
(183, '2019-10-01 19:20:57', 'bank opening balance transfer', '0.00', NULL, '0.00', '2019-09-12 03:53:05', '2019-09-12 03:53:05', 22, 24, NULL, 'f', 'f'),
(184, '2019-10-01 19:20:57', 'cash opening balance transfer', '10000.00', NULL, '10000.00', '2019-09-12 04:00:27', '2019-09-12 04:00:27', NULL, 25, NULL, 't', 'f'),
(185, '2019-10-01 19:20:57', 'cash opening balance transfer', '0.00', NULL, '0.00', '2019-09-14 01:35:15', '2019-09-14 01:35:15', NULL, 26, NULL, 't', 'f'),
(186, '2019-10-01 19:20:57', 'bank opening balance transfer', '0.00', NULL, '0.00', '2019-09-14 02:10:57', '2019-09-14 02:10:57', 23, 26, NULL, 'f', 'f'),
(187, '2019-09-30 13:00:00', 'cheque transaction', '1100.00', NULL, '1100.00', '2019-09-14 02:47:34', '2019-09-14 02:47:34', 23, 26, NULL, 'f', 'f'),
(188, '2019-10-05 13:00:00', 'cheque transaction', '5423.00', NULL, '6523.00', '2019-09-14 02:48:57', '2019-09-14 02:48:57', 23, 26, NULL, 'f', 'f'),
(189, '2019-11-04 13:00:00', 'cheque transaction', '2118.00', NULL, '8641.00', '2019-09-14 03:21:37', '2019-09-14 03:21:37', 23, 26, NULL, 'f', 'f'),
(190, '2019-10-01 19:20:57', 'cash opening balance transfer', '0.00', NULL, '0.00', '2019-09-21 06:12:11', '2019-09-21 06:12:11', NULL, 27, NULL, 't', 'f'),
(191, '2019-10-01 19:20:57', 'bank opening balance transfer', '1000.00', NULL, '1000.00', '2019-09-21 06:29:47', '2019-09-21 06:29:47', 24, 27, NULL, 'f', 'f'),
(192, '2019-09-17 13:00:00', 'neft transaction', '19950.00', NULL, '192975.00', '2019-10-01 11:39:28', '2019-10-01 11:39:28', 4, 4, NULL, 'f', 'f'),
(193, '2019-09-02 13:00:00', 'cheque transaction', '22000.00', NULL, '214975.00', '2019-10-01 11:40:46', '2019-10-01 11:40:46', 4, 4, NULL, 'f', 'f'),
(194, '2019-09-02 13:00:00', 'cash transaction', '12160.00', NULL, '29300.00', '2019-10-01 11:41:27', '2019-10-01 11:41:27', NULL, 4, NULL, 't', 'f'),
(195, '2019-09-02 13:00:00', 'cash transaction', '22500.00', NULL, '51800.00', '2019-10-01 11:42:09', '2019-10-01 11:42:09', NULL, 4, NULL, 't', 'f'),
(196, '2019-09-04 13:00:00', 'neft transaction', '22040.00', NULL, '237015.00', '2019-10-01 11:42:33', '2019-10-01 11:42:33', 4, 4, NULL, 'f', 'f'),
(197, '2019-09-03 13:00:00', 'cheque transaction', '20090.00', NULL, '257105.00', '2019-10-01 11:42:59', '2019-10-01 11:42:59', 4, 4, NULL, 'f', 'f'),
(198, '2019-09-13 13:00:00', 'neft transaction', '9000.00', NULL, '266105.00', '2019-10-01 11:43:21', '2019-10-01 11:43:21', 4, 4, NULL, 'f', 'f'),
(199, '2019-09-13 13:00:00', 'neft transaction', '5000.00', NULL, '271105.00', '2019-10-01 11:43:46', '2019-10-01 11:43:46', 4, 4, NULL, 'f', 'f'),
(200, '2019-09-10 13:00:00', 'neft transaction', '5000.00', NULL, '276105.00', '2019-10-01 11:44:10', '2019-10-01 11:44:10', 4, 4, NULL, 'f', 'f'),
(201, '2019-09-10 13:00:00', 'neft transaction', '5000.00', NULL, '281105.00', '2019-10-01 11:44:40', '2019-10-01 11:44:40', 4, 4, NULL, 'f', 'f'),
(202, '2019-09-15 13:00:00', 'cash transaction', '3650.00', NULL, '55450.00', '2019-10-01 11:45:05', '2019-10-01 11:45:05', NULL, 4, NULL, 't', 'f'),
(203, '2019-09-02 13:00:00', 'cash transaction', '5000.00', NULL, '60450.00', '2019-10-01 11:45:36', '2019-10-01 11:45:36', NULL, 4, NULL, 't', 'f'),
(204, '2019-09-02 13:00:00', 'neft transaction', '40000.00', NULL, '321105.00', '2019-10-01 12:00:44', '2019-10-01 12:00:44', 4, 4, NULL, 'f', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `billing_heads`
--

DROP TABLE IF EXISTS `billing_heads`;
CREATE TABLE IF NOT EXISTS `billing_heads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_unit_value` varchar(5) DEFAULT NULL,
  `flat_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_heads`
--

INSERT INTO `billing_heads` (`id`, `name`, `amount`, `society_id`, `created_at`, `updated_at`, `is_unit_value`, `flat_type_id`) VALUES
(1, 'Water Charges', 1.5, 1, '2019-07-25 03:33:55', '2019-07-25 03:33:55', 't', 1),
(2, 'Service Charges', 250, 1, '2019-07-25 03:34:21', '2019-07-25 03:34:21', 'f', 1),
(3, 'Property Tax', 5, 1, '2019-07-25 03:35:20', '2019-07-25 03:35:20', 't', 1),
(4, 'Festival Charges', 100, 1, '2019-07-25 03:36:08', '2019-07-25 03:36:08', 'f', 1),
(5, 'Water Charges', 1.5, 1, '2019-07-25 03:39:11', '2019-07-25 03:39:11', 't', 2),
(6, 'Service Charges', 250, 1, '2019-07-25 03:39:46', '2019-07-25 03:39:46', 'f', 2),
(7, 'Property Tax', 5, 1, '2019-07-25 03:39:57', '2019-07-25 03:39:57', 't', 2),
(8, 'Festival Charges', 150, 1, '2019-07-25 03:40:16', '2019-07-25 03:40:16', 'f', 2),
(9, 'Water Charges', 1.5, 2, '2019-07-25 06:12:42', '2019-07-25 06:12:43', 't', 3),
(10, 'Service Charges', 250, 2, '2019-07-25 06:12:59', '2019-07-25 06:12:59', 'f', 3),
(11, 'Property Tax', 3, 2, '2019-07-25 06:13:25', '2019-07-25 06:13:25', 't', 3),
(12, 'Festival Charges', 100, 2, '2019-07-25 06:13:57', '2019-07-25 06:13:57', 'f', 3),
(13, 'Water Charges', 1.5, 2, '2019-07-25 06:14:23', '2019-07-25 06:14:23', 't', 4),
(14, 'Service Charges', 250, 2, '2019-07-25 06:14:37', '2019-07-25 06:14:37', 'f', 4),
(15, 'Property Tax', 3, 2, '2019-07-25 06:14:46', '2019-07-25 06:14:46', 't', 4),
(16, 'Festival Charges', 150, 2, '2019-07-25 06:14:55', '2019-07-25 06:14:55', 'f', 4),
(17, 'Water Charges', 100, 2, '2019-07-27 01:20:25', '2019-07-27 01:20:25', 'f', 5),
(18, 'Festival Charges', 900, 2, '2019-07-27 01:20:42', '2019-07-27 01:20:42', 'f', 5),
(19, 'Property Tax', 5, 2, '2019-07-27 01:21:01', '2019-07-27 01:21:01', 't', 5),
(20, 'Water charges ', 1.12, 3, '2019-07-30 01:38:50', '2019-07-30 03:03:10', 't', 6),
(21, 'Services charges ', 2, 3, '2019-07-30 01:39:46', '2019-07-30 03:46:25', 't', 6),
(22, 'Property tax ', 2, 3, '2019-07-30 01:42:15', '2019-07-30 03:22:20', 't', 6),
(23, 'Festival charges', 1, 3, '2019-07-30 01:43:14', '2019-07-30 03:26:48', 't', 6),
(24, 'Services charges ', 200, 3, '2019-07-30 03:47:03', '2019-07-30 03:47:03', 'f', 6),
(25, 'Private Office Rent', 18000, 4, '2019-07-30 04:56:30', '2019-08-21 03:58:00', 'f', 7),
(26, 'Monthly Cabin', 50000, 4, '2019-07-30 04:57:55', '2019-10-01 12:20:32', 'f', 8),
(27, 'Monthly Cabin', 40000, 4, '2019-07-30 04:58:47', '2019-07-30 04:58:47', 'f', 9),
(28, 'Monthly Cabin', 22000, 4, '2019-07-30 04:59:34', '2019-07-30 04:59:34', 'f', 10),
(29, 'Monthly Cabin', 22000, 4, '2019-07-30 05:00:07', '2019-07-31 03:01:22', 'f', 11),
(30, 'Monthly Cabin', 20000, 4, '2019-07-30 05:00:57', '2019-07-30 05:00:57', 'f', 12),
(31, 'Monthly Cabin', 9000, 4, '2019-07-30 05:01:33', '2019-07-30 05:01:33', 'f', 13),
(32, 'Single Seater', 5000, 4, '2019-07-30 05:03:47', '2019-07-30 05:03:47', 'f', 14),
(33, 'water charges ', 1.5, 5, '2019-07-30 06:19:21', '2019-07-30 06:19:56', 't', 15),
(34, 'Property tax ', 3, 5, '2019-07-30 06:21:31', '2019-07-30 06:21:31', 't', 15),
(35, 'service charges ', 300, 5, '2019-07-30 06:21:59', '2019-07-30 06:21:59', 'f', 15),
(36, 'festival charges ', 400, 5, '2019-07-30 06:22:33', '2019-07-30 06:22:33', 'f', 15),
(37, 'Rent', 0, 4, '2019-07-30 07:18:39', '2019-07-30 07:18:39', 'f', 16),
(38, 'water charges ', 1.5, 6, '2019-07-30 07:43:49', '2019-07-30 07:43:49', 't', 17),
(39, 'service charges ', 300, 6, '2019-07-30 07:46:11', '2019-07-30 07:46:51', 'f', 17),
(40, 'Property tax ', 3, 6, '2019-07-30 07:47:16', '2019-07-30 07:47:34', 't', 17),
(41, 'festival charges ', 400, 6, '2019-07-30 07:48:00', '2019-07-30 07:48:00', 'f', 17),
(42, 'Monthly Cabin', 15000, 7, '2019-07-30 08:12:30', '2019-07-30 08:12:30', 'f', 18),
(43, 'service charges ', 300, 8, '2019-07-30 08:50:27', '2019-07-30 08:50:27', 'f', 19),
(44, 'water charges ', 1.5, 8, '2019-07-30 08:51:03', '2019-07-30 08:51:03', 't', 19),
(45, 'Property tax ', 1.5, 8, '2019-07-30 08:52:58', '2019-07-30 08:52:58', 't', 19),
(46, 'festival charges ', 300, 8, '2019-07-30 08:53:12', '2019-07-30 08:53:12', 'f', 19),
(47, 'Single Seater - Part Time', 3500, 4, '2019-08-01 03:22:16', '2019-08-01 03:22:16', 'f', 20),
(48, 'service charges ', 400, 9, '2019-08-01 05:46:18', '2019-08-01 05:46:18', 'f', 21),
(49, 'festival charges ', 500, 9, '2019-08-01 05:46:38', '2019-08-01 05:46:38', 'f', 21),
(50, 'Property tax ', 3, 9, '2019-08-01 05:46:53', '2019-08-01 05:47:08', 't', 21),
(51, 'water charges ', 1.6, 9, '2019-08-01 05:47:25', '2019-08-01 05:47:36', 't', 21),
(52, 'service charges ', 500, 10, '2019-08-01 06:13:04', '2019-08-01 06:13:04', 'f', 22),
(53, 'festival charges ', 300, 10, '2019-08-01 06:13:17', '2019-08-01 06:13:17', 'f', 22),
(54, 'water charges ', 1.5, 10, '2019-08-01 06:13:30', '2019-08-01 06:13:30', 't', 22),
(55, 'Property tax ', 3, 10, '2019-08-01 06:13:46', '2019-08-01 06:13:46', 't', 22),
(56, 'Service Charges', 200, 11, '2019-08-06 06:06:33', '2019-08-06 06:06:33', 'f', 23),
(57, 'Festival Charges', 100, 11, '2019-08-06 06:07:14', '2019-08-06 06:07:14', 'f', 23),
(58, 'Water Charges', 1, 11, '2019-08-06 06:07:43', '2019-08-06 06:07:43', 't', 23),
(59, 'Property Tax', 1, 11, '2019-08-06 06:08:35', '2019-08-06 06:08:36', 't', 23),
(60, 'Service Charges', 200, 11, '2019-08-06 06:10:23', '2019-08-06 06:10:23', 'f', 24),
(61, 'Water Charges', 1.5, 11, '2019-08-06 06:10:35', '2019-08-06 06:10:35', 't', 24),
(62, 'Festival Charges', 100, 11, '2019-08-06 06:10:49', '2019-08-06 06:10:49', 'f', 24),
(63, 'Property Tax', 1, 11, '2019-08-06 06:11:00', '2019-08-06 06:11:00', 't', 24),
(64, 'water charges ', 1, 12, '2019-08-17 04:59:44', '2019-08-17 04:59:59', 't', 25),
(65, 'service charges ', 300, 12, '2019-08-17 05:00:22', '2019-08-17 05:00:22', 'f', 25),
(66, 'Property tax ', 2, 12, '2019-08-17 05:00:42', '2019-08-17 05:00:42', 't', 25),
(67, 'festival charges ', 300, 12, '2019-08-17 05:00:51', '2019-08-17 05:01:03', 'f', 25),
(68, 'water charges ', 1.5, 13, '2019-08-19 05:38:32', '2019-08-19 05:38:32', 't', 26),
(69, 'Property tax ', 2, 13, '2019-08-19 05:38:45', '2019-08-19 05:38:45', 't', 26),
(70, 'service charges ', 500, 13, '2019-08-19 05:39:01', '2019-08-19 05:39:01', 'f', 26),
(71, 'festival charges ', 1000, 13, '2019-08-19 05:39:18', '2019-08-19 05:39:18', 'f', 26),
(72, 'Property tax ', 3.5, 14, '2019-08-19 06:28:04', '2019-08-19 06:28:04', 't', 27),
(73, 'water charges ', 1.1, 14, '2019-08-19 06:28:26', '2019-08-19 06:28:26', 't', 27),
(74, 'festival charges ', 300, 14, '2019-08-19 06:28:46', '2019-08-19 06:28:46', 'f', 27),
(75, 'service charges ', 400, 14, '2019-08-19 06:29:00', '2019-08-19 06:29:00', 'f', 27),
(76, 'service charges ', 500, 15, '2019-08-24 03:56:44', '2019-08-24 03:56:44', 'f', 28),
(77, 'water charges ', 2, 15, '2019-08-24 03:56:58', '2019-08-24 03:56:58', 't', 28),
(78, 'Property tax ', 3.5, 15, '2019-08-24 03:57:11', '2019-08-24 03:57:11', 't', 28),
(79, 'festival charges ', 500, 15, '2019-08-24 03:57:28', '2019-08-24 03:57:28', 'f', 28),
(80, 'Single Seater', 3000, 4, '2019-08-28 01:03:18', '2019-08-28 01:03:18', 'f', 29),
(81, 'Maintenance Charges', 350, 16, '2019-08-29 23:41:04', '2019-08-29 23:41:04', 'f', 30),
(82, 'Vacant', 0, 16, '2019-08-29 23:41:31', '2019-08-29 23:41:31', 'f', 31),
(83, 'Water charges ', 3, 17, '2019-09-03 01:59:11', '2019-09-03 01:59:11', 't', 32),
(84, 'Property Tax ', 1.5, 17, '2019-09-03 01:59:35', '2019-09-03 02:00:07', 't', 32),
(85, 'Festival Charge ', 500, 17, '2019-09-03 02:01:33', '2019-09-03 02:01:33', 'f', 32),
(86, 'Service Charge ', 500, 17, '2019-09-03 02:04:58', '2019-09-03 02:04:58', 'f', 32),
(87, 'Water charges ', 1.5, 20, '2019-09-11 05:26:15', '2019-09-11 05:26:15', 't', 34),
(88, 'Property Tax ', 2.5, 20, '2019-09-11 05:26:30', '2019-09-11 05:26:30', 't', 34),
(89, 'Festival Charge ', 200, 20, '2019-09-11 05:26:51', '2019-09-11 05:26:51', 'f', 34),
(90, 'Service Charge ', 300, 20, '2019-09-11 05:27:14', '2019-09-11 05:27:14', 'f', 34),
(91, 'Service Charge ', 300, 21, '2019-09-12 01:53:49', '2019-09-12 01:54:58', 'f', 35),
(92, 'Water charges ', 200, 21, '2019-09-12 02:01:09', '2019-09-12 02:01:09', 'f', 36),
(93, 'Property Tax ', 200, 21, '2019-09-12 02:01:30', '2019-09-12 02:01:30', 'f', 37),
(94, 'Water Charges', 100, 21, '2019-09-12 02:13:11', '2019-09-12 02:13:11', 'f', 39),
(95, 'Service Charges', 350, 21, '2019-09-12 02:13:25', '2019-09-12 02:13:25', 'f', 39),
(96, 'Property Tax', 200, 21, '2019-09-12 02:13:59', '2019-09-12 02:13:59', 'f', 39),
(97, 'Water Charges', 200, 21, '2019-09-12 02:14:41', '2019-09-12 02:14:41', 'f', 40),
(98, 'Service Charges', 350, 21, '2019-09-12 02:14:56', '2019-09-12 02:14:56', 'f', 40),
(99, 'Property Tax', 250, 21, '2019-09-12 02:15:09', '2019-09-12 02:15:09', 'f', 40),
(100, 'Water charges ', 200, 23, '2019-09-12 02:51:58', '2019-09-12 02:51:58', 'f', 41),
(101, 'Service Charge ', 350, 23, '2019-09-12 02:52:21', '2019-09-12 02:52:21', 'f', 41),
(102, 'Property Tax ', 250, 23, '2019-09-12 02:52:39', '2019-09-12 02:52:39', 'f', 41),
(103, 'Water charges ', 250, 23, '2019-09-12 02:57:52', '2019-09-12 02:57:52', 'f', 42),
(104, 'Service Charge ', 350, 23, '2019-09-12 02:58:07', '2019-09-12 02:58:07', 'f', 42),
(105, 'Property Tax ', 200, 23, '2019-09-12 02:58:19', '2019-09-12 02:58:19', 'f', 42),
(106, 'Water charges ', 200, 24, '2019-09-12 03:53:53', '2019-09-12 03:53:53', 'f', 44),
(107, 'Service Charge ', 350, 24, '2019-09-12 03:54:09', '2019-09-12 03:54:09', 'f', 44),
(108, 'Property Tax ', 250, 24, '2019-09-12 03:54:25', '2019-09-12 03:54:25', 'f', 44),
(109, 'Water charges ', 250, 24, '2019-09-12 03:54:57', '2019-09-12 03:54:57', 'f', 43),
(110, 'Service Charge ', 350, 24, '2019-09-12 03:55:18', '2019-09-12 03:55:18', 'f', 43),
(111, 'Property Tax ', 200, 24, '2019-09-12 03:55:32', '2019-09-12 03:55:32', 'f', 43),
(112, 'Water charges ', 300, 26, '2019-09-14 01:57:07', '2019-09-14 01:57:07', 'f', 46),
(113, 'Property Tax ', 300, 26, '2019-09-14 01:57:19', '2019-09-14 01:57:19', 'f', 46),
(114, 'Service Charge ', 300, 26, '2019-09-14 01:57:31', '2019-09-14 01:57:31', 'f', 46),
(115, 'Festival Charge ', 100, 26, '2019-09-14 01:57:46', '2019-09-14 01:57:46', 'f', 46),
(116, 'Water charges ', 200, 27, '2019-09-21 06:31:05', '2019-09-21 06:31:05', 't', 47),
(117, 'Single Seater', 7000, 4, '2019-10-01 12:37:01', '2019-10-01 12:37:01', 'f', 49),
(118, 'Single Seater - Night Shift Part Time', 3000, 4, '2019-10-01 12:38:22', '2019-10-01 12:38:22', 'f', 50),
(119, 'Two Single Seater', 10000, 4, '2019-10-01 12:39:36', '2019-10-01 12:39:36', 'f', 51),
(120, 'Ten Single Seater', 65000, 4, '2019-10-01 12:40:48', '2019-10-01 12:40:48', 'f', 52);

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

DROP TABLE IF EXISTS `bill_details`;
CREATE TABLE IF NOT EXISTS `bill_details` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `bill_amount` decimal(15,2) DEFAULT NULL,
  `previous_member_balance` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `details` varchar(250) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `bill_month` date DEFAULT NULL,
  `paid` int(11) DEFAULT NULL,
  `interest` decimal(15,2) DEFAULT NULL,
  `principal_arrears` decimal(15,2) DEFAULT NULL,
  `interest_arrears` decimal(15,2) DEFAULT NULL,
  `total_due` decimal(15,2) DEFAULT NULL,
  `late_payment_charges` decimal(15,2) DEFAULT NULL,
  `bill_payment_date` date DEFAULT NULL,
  `bill_payment_id` int(11) DEFAULT NULL,
  `bill_no` int(11) DEFAULT NULL,
  `total_arrears` decimal(15,2) DEFAULT NULL,
  `total_interest_arrears` decimal(15,2) DEFAULT NULL,
  `bill_status` varchar(255) DEFAULT NULL,
  `bill_summary` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `payment_id`, `bill_amount`, `previous_member_balance`, `created_at`, `updated_at`, `details`, `member_id`, `society_id`, `bill_date`, `due_date`, `bill_month`, `paid`, `interest`, `principal_arrears`, `interest_arrears`, `total_due`, `late_payment_charges`, `bill_payment_date`, `bill_payment_id`, `bill_no`, `total_arrears`, `total_interest_arrears`, `bill_status`, `bill_summary`) VALUES
(1, NULL, '5525.00', '0.00', '2019-10-02 04:50:13', '2019-07-25 03:49:22', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 1, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 1, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(2, NULL, '5862.50', '0.00', '2019-10-02 04:50:13', '2019-07-25 03:49:22', 'a:5:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 2, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5862.50', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(3, NULL, '5937.50', '0.00', '2019-10-02 04:50:13', '2019-07-25 03:49:22', 'a:6:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 3, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5937.50', '0.00', NULL, NULL, 3, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(4, NULL, '5525.00', '0.00', '2019-10-02 04:50:13', '2019-07-25 03:49:22', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 4, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(5, NULL, '5525.00', '0.00', '2019-10-02 04:50:13', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 5, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 5, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(6, NULL, '5675.00', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 6, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5675.00', '0.00', NULL, NULL, 6, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(7, NULL, '5862.50', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 7, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5862.50', '0.00', NULL, NULL, 7, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(8, NULL, '6012.50', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 8, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '6012.50', '0.00', NULL, NULL, 8, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(9, NULL, '5525.00', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 9, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 9, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(10, NULL, '5525.00', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 10, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 10, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(11, NULL, '5525.00', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 11, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 11, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(12, NULL, '5862.50', '-1800.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 12, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '26.25', '1500.00', '300.00', '7688.75', '0.00', NULL, NULL, 12, '1500.00', '326.25', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(13, NULL, '6012.50', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 13, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '6012.50', '0.00', NULL, NULL, 13, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(14, NULL, '5525.00', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 14, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 14, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(15, NULL, '5600.00', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 15, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5600.00', '0.00', NULL, NULL, 15, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(16, NULL, '5600.00', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 16, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5600.00', '0.00', NULL, NULL, 16, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(17, NULL, '5937.50', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 17, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5937.50', '0.00', NULL, NULL, 17, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(18, NULL, '5937.50', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 18, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5937.50', '0.00', NULL, NULL, 18, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(19, NULL, '5525.00', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 19, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 19, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(20, NULL, '5525.00', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 20, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 20, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(21, NULL, '5525.00', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 21, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 21, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(22, NULL, '6162.50', '0.00', '2019-10-02 04:50:14', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:5:\"300.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 22, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '6162.50', '0.00', NULL, NULL, 22, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(23, NULL, '5862.50', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 23, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5862.50', '0.00', NULL, NULL, 23, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(24, NULL, '5525.00', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 24, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 24, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(25, NULL, '5750.00', '-850.00', '2019-10-02 04:50:15', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"225.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 25, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '12.25', '700.00', '150.00', '6612.25', '0.00', NULL, NULL, 25, '700.00', '162.25', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(26, NULL, '5525.00', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 26, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 26, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(27, NULL, '5937.50', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 27, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5937.50', '0.00', NULL, NULL, 27, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(28, NULL, '5937.50', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 28, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5937.50', '0.00', NULL, NULL, 28, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(29, NULL, '5750.00', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"225.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 29, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5750.00', '0.00', NULL, NULL, 29, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(30, NULL, '5675.00', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 30, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5675.00', '0.00', NULL, NULL, 30, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(31, NULL, '5525.00', '-3700.00', '2019-10-02 04:50:15', '2019-07-25 03:49:23', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 31, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '49.00', '2800.00', '900.00', '9274.00', '0.00', NULL, NULL, 31, '2800.00', '949.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(32, NULL, '5937.50', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 32, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5937.50', '0.00', NULL, NULL, 32, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(33, NULL, '5937.50', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:23', 'a:6:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 33, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5937.50', '0.00', NULL, NULL, 33, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(34, NULL, '5600.00', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:24', 'a:6:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 34, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5600.00', '0.00', NULL, NULL, 34, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(35, NULL, '5525.00', '-8900.00', '2019-10-02 04:50:15', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 35, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '122.50', '7000.00', '1900.00', '14547.50', '0.00', NULL, NULL, 35, '7000.00', '2022.50', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(36, NULL, '5525.00', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 36, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 36, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(37, NULL, '5862.50', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 37, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5862.50', '0.00', NULL, NULL, 37, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(38, NULL, '5862.50', '0.00', '2019-10-02 04:50:15', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 38, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5862.50', '0.00', NULL, NULL, 38, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(39, NULL, '5525.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 39, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 39, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(40, NULL, '5525.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 40, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 40, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(41, NULL, '5525.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 41, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 41, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(42, NULL, '5862.50', '0.00', '2019-10-02 04:50:16', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 42, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5862.50', '0.00', NULL, NULL, 42, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(43, NULL, '5862.50', '0.00', '2019-10-02 04:50:16', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 43, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5862.50', '0.00', NULL, NULL, 43, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(44, NULL, '5525.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 44, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 44, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(45, NULL, '5525.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 45, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 45, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(46, NULL, '5525.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 46, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 46, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(47, NULL, '5862.50', '0.00', '2019-10-02 04:50:16', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 47, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5862.50', '0.00', NULL, NULL, 47, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(48, NULL, '5937.50', '0.00', '2019-10-02 04:50:16', '2019-07-25 03:49:24', 'a:6:{s:10:\"NOC Charge\";s:6:\"2375.0\";s:12:\"Property Tax\";s:6:\"2375.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 48, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5937.50', '0.00', NULL, NULL, 48, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(49, NULL, '5525.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 03:49:24', 'a:5:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 49, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5525.00', '0.00', NULL, NULL, 49, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(50, NULL, '5675.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 03:49:24', 'a:6:{s:10:\"NOC Charge\";s:6:\"2250.0\";s:12:\"Property Tax\";s:6:\"2250.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 50, 1, '2019-07-01', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '5675.00', '0.00', NULL, NULL, 50, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) Contact Gopal for any query'),
(51, NULL, '2825.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 06:35:26', 'a:5:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 51, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2825.00', '0.00', NULL, NULL, 1, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(52, NULL, '3012.50', '0.00', '2019-10-02 04:50:16', '2019-07-25 06:35:26', 'a:5:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 52, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '3012.50', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(53, NULL, '3087.50', '0.00', '2019-10-02 04:50:16', '2019-07-25 06:35:26', 'a:6:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 53, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '3087.50', '0.00', NULL, NULL, 3, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(54, NULL, '2825.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 06:35:26', 'a:5:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 54, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2825.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(55, NULL, '2825.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 06:35:26', 'a:5:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 55, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2825.00', '0.00', NULL, NULL, 5, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(56, NULL, '2975.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 06:35:26', 'a:6:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 56, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2975.00', '0.00', NULL, NULL, 6, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(57, NULL, '3012.50', '0.00', '2019-10-02 04:50:16', '2019-07-25 06:35:26', 'a:5:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 57, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '3012.50', '0.00', NULL, NULL, 7, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(58, NULL, '3162.50', '0.00', '2019-10-02 04:50:16', '2019-07-25 06:35:26', 'a:6:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 58, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '3162.50', '0.00', NULL, NULL, 8, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(59, NULL, '2825.00', '0.00', '2019-10-02 04:50:16', '2019-07-25 06:35:26', 'a:5:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 59, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2825.00', '0.00', NULL, NULL, 9, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(60, NULL, '2825.00', '0.00', '2019-10-02 04:50:17', '2019-07-25 06:35:26', 'a:5:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 60, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2825.00', '0.00', NULL, NULL, 10, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(61, NULL, '2825.00', '0.00', '2019-10-02 04:50:17', '2019-07-25 06:35:26', 'a:5:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 61, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2825.00', '0.00', NULL, NULL, 11, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(62, NULL, '3087.50', '0.00', '2019-10-02 04:50:17', '2019-07-25 06:35:26', 'a:6:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 62, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '3087.50', '0.00', NULL, NULL, 12, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(63, NULL, '3087.50', '0.00', '2019-10-02 04:50:17', '2019-07-25 06:35:26', 'a:6:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 63, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '3087.50', '0.00', NULL, NULL, 13, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(64, NULL, '3050.00', '0.00', '2019-10-02 04:50:17', '2019-07-25 06:35:26', 'a:6:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"225.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 64, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '3050.00', '0.00', NULL, NULL, 14, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(65, NULL, '2975.00', '0.00', '2019-10-02 04:50:17', '2019-07-25 06:35:26', 'a:6:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 65, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2975.00', '0.00', NULL, NULL, 15, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(66, NULL, '2825.00', '-3700.00', '2019-10-02 04:50:17', '2019-07-25 06:35:26', 'a:5:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 66, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '49.00', '2800.00', '900.00', '6574.00', '0.00', NULL, NULL, 16, '2800.00', '949.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(67, NULL, '3087.50', '0.00', '2019-10-02 04:50:17', '2019-07-25 06:35:26', 'a:6:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 67, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '3087.50', '0.00', NULL, NULL, 17, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(68, NULL, '3087.50', '0.00', '2019-10-02 04:50:17', '2019-07-25 06:35:27', 'a:6:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 68, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '3087.50', '0.00', NULL, NULL, 18, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(69, NULL, '2900.00', '0.00', '2019-10-02 04:50:17', '2019-07-25 06:35:27', 'a:6:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 69, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2900.00', '0.00', NULL, NULL, 19, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(70, NULL, '2825.00', '-8900.00', '2019-10-02 04:50:17', '2019-07-25 06:35:27', 'a:5:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 70, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '122.50', '7000.00', '1900.00', '11847.50', '0.00', NULL, NULL, 20, '7000.00', '2022.50', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\nb) In case of any query please call Gopal.'),
(71, NULL, '2375.00', '0.00', '2019-10-02 04:50:17', '2019-07-25 08:08:21', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 71, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2375.00', '0.00', '2019-07-10', NULL, 1, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(72, NULL, '2537.50', '0.00', '2019-10-02 04:50:17', '2019-07-25 07:47:25', 'a:4:{s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 72, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2537.50', '0.00', '2019-07-11', NULL, 2, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(73, NULL, '2587.50', '0.00', '2019-10-02 04:50:17', '2019-07-25 07:47:26', 'a:5:{s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"50.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 73, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2587.50', '0.00', '2019-07-11', NULL, 3, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(74, NULL, '2375.00', '0.00', '2019-10-02 04:50:17', '2019-07-25 07:47:26', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 74, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2375.00', '0.00', '2019-07-11', NULL, 4, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(75, NULL, '2375.00', '0.00', '2019-10-02 04:50:17', '2019-07-25 07:47:26', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 75, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2375.00', '0.00', '2019-07-11', NULL, 5, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(76, NULL, '2975.00', '0.00', '2019-10-02 04:50:17', '2019-07-25 07:47:26', 'a:6:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 76, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2975.00', '0.00', '2019-07-11', NULL, 6, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(77, NULL, '3012.50', '0.00', '2019-10-02 04:50:18', '2019-07-25 07:47:27', 'a:5:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 77, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '3012.50', '0.00', '2019-07-14', NULL, 7, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(78, NULL, '2637.50', '0.00', '2019-10-02 04:50:18', '2019-07-25 07:47:27', 'a:5:{s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:5:\"100.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 78, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2637.50', '0.00', '2019-07-14', NULL, 8, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(79, NULL, '2825.00', '0.00', '2019-10-02 04:50:18', '2019-07-25 07:47:27', 'a:5:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 79, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2825.00', '0.00', '2019-07-14', NULL, 9, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(80, NULL, '2375.00', '0.00', '2019-10-02 04:50:18', '2019-07-25 07:47:27', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 80, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2375.00', '0.00', '2019-07-14', NULL, 10, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(81, NULL, '2375.00', '0.00', '2019-10-02 04:50:18', '2019-07-25 07:47:27', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 81, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2375.00', '0.00', '2019-07-14', NULL, 11, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(82, NULL, '3087.50', '0.00', '2019-10-02 04:50:18', '2019-07-25 07:47:27', 'a:6:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 82, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '3087.50', '0.00', '2019-07-20', NULL, 12, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(83, NULL, '2587.50', '0.00', '2019-10-02 04:50:18', '2019-07-25 07:47:28', 'a:5:{s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"50.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 83, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2587.50', '0.00', '2019-07-20', NULL, 13, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(84, NULL, '2525.00', '0.00', '2019-10-02 04:50:18', '2019-07-25 06:43:39', 'a:5:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 84, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2525.00', '0.00', NULL, NULL, 14, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(85, NULL, '2475.00', '0.00', '2019-10-02 04:50:18', '2019-07-25 06:43:39', 'a:5:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"100.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 85, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2475.00', '0.00', NULL, NULL, 15, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(86, NULL, '2375.00', '-3700.00', '2019-10-02 04:50:18', '2019-07-25 07:47:28', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 86, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '49.00', '2800.00', '900.00', '6124.00', '0.00', '2019-07-20', NULL, 16, '2424.00', '0.00', 'Partially Paid', 'a) Bill paid after due date attracts delay charges.'),
(87, NULL, '3087.50', '0.00', '2019-10-02 04:50:18', '2019-07-25 07:47:28', 'a:6:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 87, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '3087.50', '0.00', '2019-07-20', NULL, 17, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(88, NULL, '2587.50', '0.00', '2019-10-02 04:50:18', '2019-07-25 07:47:28', 'a:5:{s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"50.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 88, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2587.50', '0.00', '2019-07-20', NULL, 18, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(89, NULL, '2425.00', '0.00', '2019-10-02 04:50:19', '2019-07-25 07:47:28', 'a:5:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:4:\"50.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 89, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '0.00', '0.00', '0.00', '2425.00', '0.00', '2019-07-25', NULL, 19, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(90, NULL, '2375.00', '-8900.00', '2019-10-02 04:50:19', '2019-07-25 07:47:28', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 90, 2, '2019-07-05', '2019-07-20', '2019-07-01', 0, '122.50', '7000.00', '1900.00', '11397.50', '0.00', '2019-07-25', NULL, 20, '4397.50', '0.00', 'Partially Paid', 'a) Bill paid after due date attracts delay charges.'),
(91, NULL, '2375.00', '0.00', '2019-10-02 04:50:19', '2019-07-25 08:19:28', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 71, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2375.00', '0.00', NULL, NULL, 21, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(92, NULL, '2537.50', '0.00', '2019-10-02 04:50:19', '2019-07-25 08:19:28', 'a:4:{s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 72, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2537.50', '0.00', NULL, NULL, 22, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(93, NULL, '2587.50', '0.00', '2019-10-02 04:50:19', '2019-07-25 08:19:28', 'a:5:{s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"50.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 73, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2587.50', '0.00', NULL, NULL, 23, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(94, NULL, '2375.00', '0.00', '2019-10-02 04:50:19', '2019-07-25 08:19:28', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 74, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2375.00', '0.00', NULL, NULL, 24, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(95, NULL, '2375.00', '0.00', '2019-10-02 04:50:19', '2019-07-25 08:19:28', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 75, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2375.00', '0.00', NULL, NULL, 25, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(96, NULL, '2975.00', '0.00', '2019-10-02 04:50:19', '2019-07-25 08:19:28', 'a:6:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 76, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2975.00', '0.00', NULL, NULL, 26, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(97, NULL, '3012.50', '0.00', '2019-10-02 04:50:19', '2019-07-25 08:19:28', 'a:5:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 77, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '3012.50', '0.00', NULL, NULL, 27, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(98, NULL, '2637.50', '0.00', '2019-10-02 04:50:19', '2019-07-25 08:19:28', 'a:5:{s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:5:\"100.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 78, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2637.50', '0.00', NULL, NULL, 28, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.');
INSERT INTO `bill_details` (`id`, `payment_id`, `bill_amount`, `previous_member_balance`, `created_at`, `updated_at`, `details`, `member_id`, `society_id`, `bill_date`, `due_date`, `bill_month`, `paid`, `interest`, `principal_arrears`, `interest_arrears`, `total_due`, `late_payment_charges`, `bill_payment_date`, `bill_payment_id`, `bill_no`, `total_arrears`, `total_interest_arrears`, `bill_status`, `bill_summary`) VALUES
(99, NULL, '2825.00', '0.00', '2019-10-02 04:50:19', '2019-07-25 08:19:28', 'a:5:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 79, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2825.00', '0.00', NULL, NULL, 29, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(100, NULL, '2375.00', '0.00', '2019-10-02 04:50:19', '2019-07-25 08:19:28', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 80, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2375.00', '0.00', NULL, NULL, 30, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(101, NULL, '2375.00', '0.00', '2019-10-02 04:50:20', '2019-07-25 08:19:28', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 81, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2375.00', '0.00', NULL, NULL, 31, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(102, NULL, '3087.50', '0.00', '2019-10-02 04:50:20', '2019-07-25 08:19:29', 'a:6:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 82, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '3087.50', '0.00', NULL, NULL, 32, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(103, NULL, '2587.50', '0.00', '2019-10-02 04:50:20', '2019-07-25 08:19:29', 'a:5:{s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"50.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 83, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2587.50', '0.00', NULL, NULL, 33, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(104, NULL, '2525.00', '-2525.00', '2019-10-02 04:50:20', '2019-07-25 08:19:29', 'a:5:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 84, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '44.19', '2525.00', '0.00', '5094.19', '0.00', NULL, NULL, 34, '2525.00', '44.19', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(105, NULL, '2475.00', '-2475.00', '2019-10-02 04:50:20', '2019-07-25 08:19:29', 'a:5:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"100.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 85, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '43.31', '2475.00', '0.00', '4993.31', '0.00', NULL, NULL, 35, '2475.00', '43.31', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(106, NULL, '2375.00', '-2424.00', '2019-10-02 04:50:20', '2019-07-25 08:19:29', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 86, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '42.42', '2424.00', '0.00', '4841.42', '0.00', NULL, NULL, 36, '2424.00', '42.42', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(107, NULL, '3087.50', '0.00', '2019-10-02 04:50:20', '2019-07-25 08:19:29', 'a:6:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 87, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '3087.50', '0.00', NULL, NULL, 37, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(108, NULL, '2587.50', '0.00', '2019-10-02 04:50:20', '2019-07-25 08:19:29', 'a:5:{s:12:\"Property Tax\";s:6:\"1425.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"50.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"150.0\";}', 88, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2587.50', '0.00', NULL, NULL, 38, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(109, NULL, '2425.00', '0.00', '2019-10-02 04:50:20', '2019-07-25 08:19:29', 'a:5:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:14:\"Parking Charge\";s:4:\"50.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 89, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2467.44', '0.00', NULL, NULL, 39, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(110, NULL, '2375.00', '-4397.50', '2019-10-02 04:50:20', '2019-07-25 08:19:29', 'a:4:{s:12:\"Property Tax\";s:6:\"1350.0\";s:13:\"Water Charges\";s:5:\"675.0\";s:15:\"Service Charges\";s:5:\"250.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 90, 2, '2019-08-05', '2019-08-20', '2019-08-01', 0, '76.96', '4397.50', '0.00', '7048.92', '0.00', NULL, NULL, 40, '4397.50', '76.96', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(144, NULL, '2725.00', '-1.00', '2019-10-02 04:50:20', '2019-07-30 06:30:05', 'a:4:{s:13:\"Property tax \";s:6:\"1350.0\";s:14:\"water charges \";s:5:\"675.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"400.0\";}', 115, 5, '2019-01-06', '2019-05-06', '2019-01-01', 0, '0.00', '0.00', '1.00', '2726.00', '0.00', NULL, NULL, 1, '0.00', '1.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(145, NULL, '3065.00', '0.00', '2019-10-02 04:50:20', '2019-07-30 06:30:06', 'a:6:{s:10:\"NOC Charge\";s:5:\"100.0\";s:13:\"Property tax \";s:6:\"1350.0\";s:14:\"Parking Charge\";s:5:\"240.0\";s:14:\"water charges \";s:5:\"675.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"400.0\";}', 116, 5, '2019-01-06', '2019-05-06', '2019-01-01', 0, '0.00', '0.00', '0.00', '3065.00', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(146, NULL, '4125.00', '-2.00', '2019-10-02 04:50:20', '2019-07-30 06:30:06', 'a:5:{s:13:\"Property tax \";s:6:\"2250.0\";s:14:\"Parking Charge\";s:4:\"50.0\";s:14:\"water charges \";s:6:\"1125.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"400.0\";}', 117, 5, '2019-01-06', '2019-05-06', '2019-01-01', 0, '0.00', '2.00', '0.00', '4127.00', '0.00', NULL, NULL, 3, '2.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(147, NULL, '4075.00', '0.00', '2019-10-02 04:50:20', '2019-07-30 06:30:06', 'a:4:{s:13:\"Property tax \";s:6:\"2250.0\";s:14:\"water charges \";s:6:\"1125.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"400.0\";}', 118, 5, '2019-01-06', '2019-05-06', '2019-01-01', 0, '0.00', '0.00', '0.00', '4075.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(161, NULL, '15000.00', '0.00', '2019-10-02 04:50:20', '2019-07-30 08:14:58', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"15000.0\";}', 130, 7, '2019-05-01', '2019-08-05', '2019-05-01', 0, '0.00', '0.00', '0.00', '15000.00', '0.00', NULL, NULL, 1, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(162, NULL, '15000.00', '0.00', '2019-10-02 04:50:20', '2019-07-30 08:14:58', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"15000.0\";}', 131, 7, '2019-05-01', '2019-08-05', '2019-05-01', 0, '0.00', '0.00', '0.00', '15000.00', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(163, NULL, '15000.00', '0.00', '2019-10-02 04:50:20', '2019-07-30 08:14:58', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"15000.0\";}', 132, 7, '2019-05-01', '2019-08-05', '2019-05-01', 0, '0.00', '0.00', '0.00', '15000.00', '0.00', NULL, NULL, 3, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(164, NULL, '15000.00', '0.00', '2019-10-02 04:50:20', '2019-07-30 08:14:58', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"15000.0\";}', 133, 7, '2019-05-01', '2019-08-05', '2019-05-01', 0, '0.00', '0.00', '0.00', '15000.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(165, NULL, '15000.00', '0.00', '2019-10-02 04:50:20', '2019-07-30 08:14:58', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"15000.0\";}', 134, 7, '2019-05-01', '2019-08-05', '2019-05-01', 0, '0.00', '0.00', '0.00', '15000.00', '0.00', NULL, NULL, 5, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(166, NULL, '3065.00', '-1050.00', '2019-10-02 04:50:20', '2019-07-30 08:31:34', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"1350.0\";s:14:\"Parking Charge\";s:5:\"140.0\";s:14:\"water charges \";s:5:\"675.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"400.0\";}', 135, 6, '2019-01-06', '2019-05-06', '2019-01-01', 0, '17.50', '1000.00', '50.00', '4132.50', '0.00', NULL, NULL, 1, '1000.00', '67.50', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(167, NULL, '4515.00', '0.00', '2019-10-02 04:50:21', '2019-07-30 08:31:34', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"2250.0\";s:14:\"Parking Charge\";s:5:\"240.0\";s:14:\"water charges \";s:6:\"1125.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"400.0\";}', 136, 6, '2019-01-06', '2019-05-06', '2019-01-01', 0, '0.00', '0.00', '0.00', '4515.00', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(168, NULL, '2995.00', '-1050.00', '2019-10-02 04:50:21', '2019-07-30 08:31:34', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"1350.0\";s:14:\"Parking Charge\";s:4:\"70.0\";s:14:\"water charges \";s:5:\"675.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"400.0\";}', 137, 6, '2019-01-06', '2019-05-06', '2019-01-01', 0, '17.50', '1000.00', '50.00', '4062.50', '0.00', NULL, NULL, 3, '1000.00', '67.50', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(169, NULL, '4275.00', '0.00', '2019-10-02 04:50:21', '2019-07-30 08:31:34', 'a:5:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"2250.0\";s:14:\"water charges \";s:6:\"1125.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"400.0\";}', 138, 6, '2019-01-06', '2019-05-06', '2019-01-01', 0, '0.00', '0.00', '0.00', '4275.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(170, NULL, '2925.00', '0.00', '2019-10-02 04:50:21', '2019-07-30 08:31:34', 'a:5:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"1350.0\";s:14:\"water charges \";s:5:\"675.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"400.0\";}', 139, 6, '2019-01-06', '2019-05-06', '2019-01-01', 0, '0.00', '0.00', '0.00', '2925.00', '0.00', NULL, NULL, 5, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(190, NULL, '0.00', '0.00', '2019-10-02 04:50:21', '2019-08-01 03:26:21', 'a:1:{s:4:\"Rent\";s:3:\"0.0\";}', 119, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, 1, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(191, NULL, '18000.00', '-14.00', '2019-10-02 04:50:21', '2019-08-06 05:24:57', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"18000.0\";}', 102, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '14.00', '0.00', '18014.00', '0.00', NULL, NULL, 2, '14.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(192, NULL, '22000.00', '0.00', '2019-10-02 04:50:21', '2019-08-01 05:07:10', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"22000.0\";}', 103, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '22000.00', '0.00', NULL, NULL, 3, '0.00', '0.00', 'Partially Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(193, NULL, '12000.00', '0.00', '2019-10-02 04:50:21', '2019-08-03 02:07:49', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"12000.0\";}', 104, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '12000.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Partially Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(194, NULL, '40000.00', '0.00', '2019-10-02 04:50:21', '2019-08-12 21:57:57', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"40000.0\";}', 105, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '40000.00', '0.00', NULL, NULL, 5, '0.00', '0.00', 'Partially Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(195, NULL, '22000.00', '0.00', '2019-10-02 04:50:21', '2019-08-06 05:27:17', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"22000.0\";}', 106, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '22000.00', '0.00', NULL, NULL, 6, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(196, NULL, '22000.00', '0.00', '2019-10-02 04:50:21', '2019-08-06 05:26:42', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"22000.0\";}', 107, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '22000.00', '0.00', NULL, NULL, 7, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(197, NULL, '20000.00', '0.00', '2019-10-02 04:50:21', '2019-08-12 21:56:45', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"20000.0\";}', 108, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '20000.00', '0.00', NULL, NULL, 8, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(198, NULL, '9000.00', '0.00', '2019-10-02 04:50:21', '2019-08-16 06:25:59', 'a:1:{s:13:\"Monthly Cabin\";s:6:\"9000.0\";}', 109, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '9000.00', '0.00', NULL, NULL, 9, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(199, NULL, '20000.00', '0.00', '2019-10-02 04:50:21', '2019-08-01 03:26:22', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"20000.0\";}', 110, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '20000.00', '0.00', NULL, NULL, 10, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(200, NULL, '5000.00', '0.00', '2019-10-02 04:50:21', '2019-08-01 03:26:22', 'a:1:{s:13:\"Single Seater\";s:6:\"5000.0\";}', 111, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '5000.00', '0.00', NULL, NULL, 11, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(201, NULL, '5000.00', '0.00', '2019-10-02 04:50:21', '2019-08-16 23:34:14', 'a:1:{s:13:\"Single Seater\";s:6:\"5000.0\";}', 112, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '5000.00', '0.00', NULL, NULL, 12, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(202, NULL, '5000.00', '0.00', '2019-10-02 04:50:21', '2019-08-06 05:28:19', 'a:1:{s:13:\"Single Seater\";s:6:\"5000.0\";}', 113, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '5000.00', '0.00', NULL, NULL, 13, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(203, NULL, '5000.00', '0.00', '2019-10-02 04:50:21', '2019-08-06 05:28:55', 'a:1:{s:13:\"Single Seater\";s:6:\"5000.0\";}', 114, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '5000.00', '0.00', NULL, NULL, 14, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(204, NULL, '3500.00', '0.00', '2019-10-02 04:50:21', '2019-08-01 03:30:02', 'a:1:{s:25:\"Single Seater - Part Time\";s:6:\"3500.0\";}', 145, 4, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '3500.00', '0.00', NULL, NULL, 15, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to enter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(215, NULL, '2825.00', '0.00', '2019-10-02 04:50:21', '2019-08-01 06:43:28', 'a:4:{s:13:\"Property tax \";s:6:\"1350.0\";s:14:\"water charges \";s:5:\"675.0\";s:16:\"service charges \";s:5:\"500.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 151, 10, '2019-08-01', '2019-08-10', '2019-08-01', 0, '0.00', '0.00', '0.00', '2825.00', '0.00', NULL, NULL, 1, '0.00', '0.00', 'Paid', 'a)Bill paid after due date attracts delay charges.'),
(216, NULL, '5175.00', '0.00', '2019-10-02 04:50:21', '2019-08-02 02:10:10', 'a:5:{s:10:\"NOC Charge\";s:6:\"1000.0\";s:13:\"Property tax \";s:6:\"2250.0\";s:14:\"water charges \";s:6:\"1125.0\";s:16:\"service charges \";s:5:\"500.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 152, 10, '2019-08-01', '2019-08-10', '2019-08-01', 0, '0.00', '0.00', '0.00', '5175.00', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Partially Paid', 'a)Bill paid after due date attracts delay charges.'),
(217, NULL, '2825.00', '0.00', '2019-10-02 04:50:22', '2019-08-02 02:16:16', 'a:4:{s:13:\"Property tax \";s:6:\"1350.0\";s:14:\"water charges \";s:5:\"675.0\";s:16:\"service charges \";s:5:\"500.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 153, 10, '2019-08-01', '2019-08-10', '2019-08-01', 0, '0.00', '0.00', '0.00', '2825.00', '0.00', NULL, NULL, 3, '0.00', '0.00', 'Partially Paid', 'a)Bill paid after due date attracts delay charges.'),
(218, NULL, '4175.00', '0.00', '2019-10-02 04:50:22', '2019-08-01 06:37:42', 'a:4:{s:13:\"Property tax \";s:6:\"2250.0\";s:14:\"water charges \";s:6:\"1125.0\";s:16:\"service charges \";s:5:\"500.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 154, 10, '2019-08-01', '2019-08-10', '2019-08-01', 0, '0.00', '0.00', '0.00', '4175.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(219, NULL, '3575.00', '0.00', '2019-10-02 04:50:22', '2019-08-01 06:37:42', 'a:5:{s:13:\"Property tax \";s:6:\"1350.0\";s:14:\"Parking Charge\";s:5:\"750.0\";s:14:\"water charges \";s:5:\"675.0\";s:16:\"service charges \";s:5:\"500.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 155, 10, '2019-08-01', '2019-08-10', '2019-08-01', 0, '0.00', '0.00', '0.00', '3575.00', '0.00', NULL, NULL, 5, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(220, NULL, '1200.00', '1200.00', '2019-10-02 04:50:22', '2019-08-27 03:21:44', 'a:4:{s:12:\"Property Tax\";s:5:\"450.0\";s:13:\"Water Charges\";s:5:\"450.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 156, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '0.00', '0.00', '2019-07-10', NULL, 1, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(221, NULL, '1487.50', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:03', 'a:4:{s:12:\"Property Tax\";s:5:\"475.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 157, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1487.50', '0.00', '2019-07-11', NULL, 2, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(222, NULL, '1537.50', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:03', 'a:5:{s:12:\"Property Tax\";s:5:\"475.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"50.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 158, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1537.50', '0.00', '2019-07-11', NULL, 3, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(223, NULL, '1200.00', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:04', 'a:4:{s:12:\"Property Tax\";s:5:\"450.0\";s:13:\"Water Charges\";s:5:\"450.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 159, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1200.00', '0.00', '2019-07-11', NULL, 4, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(224, NULL, '1200.00', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:04', 'a:4:{s:12:\"Property Tax\";s:5:\"450.0\";s:13:\"Water Charges\";s:5:\"450.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 160, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1200.00', '0.00', '2019-07-11', NULL, 5, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(225, NULL, '1800.00', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:04', 'a:6:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:5:\"450.0\";s:13:\"Water Charges\";s:5:\"450.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 161, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1800.00', '0.00', '2019-07-11', NULL, 6, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(226, NULL, '1962.50', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:04', 'a:5:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:5:\"475.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 162, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1962.50', '0.00', '2019-07-14', NULL, 7, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(227, NULL, '1587.50', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:04', 'a:5:{s:12:\"Property Tax\";s:5:\"475.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:5:\"100.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 163, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1587.50', '0.00', '2019-07-14', NULL, 8, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(228, NULL, '1650.00', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:04', 'a:5:{s:10:\"NOC Charge\";s:5:\"450.0\";s:12:\"Property Tax\";s:5:\"450.0\";s:13:\"Water Charges\";s:5:\"450.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 164, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1650.00', '0.00', '2019-07-14', NULL, 9, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(229, NULL, '1200.00', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:04', 'a:4:{s:12:\"Property Tax\";s:5:\"450.0\";s:13:\"Water Charges\";s:5:\"450.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 165, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1200.00', '0.00', '2019-07-14', NULL, 10, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(230, NULL, '1200.00', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:04', 'a:4:{s:12:\"Property Tax\";s:5:\"450.0\";s:13:\"Water Charges\";s:5:\"450.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 166, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1200.00', '0.00', '2019-07-14', NULL, 11, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(231, NULL, '2037.50', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:04', 'a:6:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:5:\"475.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 167, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2037.50', '0.00', '2019-07-20', NULL, 12, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(232, NULL, '1537.50', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:05', 'a:5:{s:12:\"Property Tax\";s:5:\"475.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"50.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 168, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1537.50', '0.00', '2019-07-20', NULL, 13, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(233, NULL, '1350.00', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:13:49', 'a:5:{s:12:\"Property Tax\";s:5:\"450.0\";s:13:\"Water Charges\";s:5:\"450.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 169, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1350.00', '0.00', NULL, NULL, 14, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(234, NULL, '1300.00', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:13:50', 'a:5:{s:12:\"Property Tax\";s:5:\"450.0\";s:13:\"Water Charges\";s:5:\"450.0\";s:14:\"Parking Charge\";s:5:\"100.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 170, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1300.00', '0.00', NULL, NULL, 15, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(235, NULL, '1200.00', '-3700.00', '2019-10-02 04:50:22', '2019-08-22 06:00:59', 'a:4:{s:12:\"Property Tax\";s:5:\"450.0\";s:13:\"Water Charges\";s:5:\"450.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 171, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '49.00', '2800.00', '900.00', '4949.00', '0.00', '2019-07-20', NULL, 16, '1249.00', '-49.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(236, NULL, '2037.50', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:05', 'a:6:{s:10:\"NOC Charge\";s:5:\"475.0\";s:12:\"Property Tax\";s:5:\"475.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"75.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 172, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '2037.50', '0.00', '2019-07-20', NULL, 17, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(237, NULL, '1537.50', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:05', 'a:5:{s:12:\"Property Tax\";s:5:\"475.0\";s:13:\"Water Charges\";s:5:\"712.5\";s:14:\"Parking Charge\";s:4:\"50.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 173, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1537.50', '0.00', '2019-07-20', NULL, 18, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(238, NULL, '1250.00', '0.00', '2019-10-02 04:50:22', '2019-08-06 06:25:05', 'a:5:{s:12:\"Property Tax\";s:5:\"450.0\";s:13:\"Water Charges\";s:5:\"450.0\";s:14:\"Parking Charge\";s:4:\"50.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 174, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '0.00', '0.00', '0.00', '1250.00', '0.00', '2019-07-25', NULL, 19, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(239, NULL, '1200.00', '-8900.00', '2019-10-02 04:50:22', '2019-08-26 01:30:28', 'a:4:{s:12:\"Property Tax\";s:5:\"450.0\";s:13:\"Water Charges\";s:5:\"450.0\";s:15:\"Service Charges\";s:5:\"200.0\";s:16:\"Festival Charges\";s:5:\"100.0\";}', 175, 11, '2019-08-01', '2019-08-20', '2019-08-01', 0, '122.50', '7000.00', '1900.00', '10222.50', '0.00', '2019-07-25', NULL, 20, '3222.50', '-122.50', 'Paid', 'a) Bill paid after due date attracts delay charges.\r\n\r\nb) In case of any query, please contact 02288888888'),
(240, NULL, '620.00', '-1050.00', '2019-10-02 04:50:23', '2019-08-17 04:52:48', 'a:2:{s:10:\"NOC Charge\";s:5:\"500.0\";s:14:\"Parking Charge\";s:5:\"120.0\";}', 176, 12, '2019-08-01', '2019-08-05', '2019-08-01', 0, '8.33', '1000.00', '50.00', '1678.33', '0.00', NULL, NULL, 1, '1000.00', '58.33', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(241, NULL, '620.00', '0.00', '2019-10-02 04:50:23', '2019-08-17 04:52:48', 'a:2:{s:10:\"NOC Charge\";s:5:\"500.0\";s:14:\"Parking Charge\";s:5:\"120.0\";}', 177, 12, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '620.00', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(242, NULL, '800.00', '-1050.00', '2019-10-02 04:50:23', '2019-08-17 04:52:48', 'a:2:{s:10:\"NOC Charge\";s:5:\"500.0\";s:14:\"Parking Charge\";s:5:\"300.0\";}', 178, 12, '2019-08-01', '2019-08-05', '2019-08-01', 0, '8.33', '1000.00', '50.00', '1858.33', '0.00', NULL, NULL, 3, '1000.00', '58.33', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(243, NULL, '920.00', '0.00', '2019-10-02 04:50:23', '2019-08-17 04:52:48', 'a:2:{s:10:\"NOC Charge\";s:5:\"500.0\";s:14:\"Parking Charge\";s:5:\"420.0\";}', 179, 12, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '920.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(244, NULL, '2570.00', '-1678.33', '2019-10-02 04:50:23', '2019-08-19 05:09:14', 'a:6:{s:10:\"NOC Charge\";s:5:\"500.0\";s:13:\"Property tax \";s:5:\"900.0\";s:14:\"Parking Charge\";s:5:\"120.0\";s:14:\"water charges \";s:5:\"450.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 176, 12, '2019-09-01', '2019-09-05', '2019-09-01', 0, '13.50', '1620.00', '58.33', '4261.83', '0.00', NULL, NULL, 5, '1620.00', '44.83', 'Partially Paid', 'a)Bill paid after due date attracts delay charges.'),
(245, NULL, '3470.00', '-620.00', '2019-10-02 04:50:23', '2019-08-17 05:10:42', 'a:6:{s:10:\"NOC Charge\";s:5:\"500.0\";s:13:\"Property tax \";s:6:\"1500.0\";s:14:\"Parking Charge\";s:5:\"120.0\";s:14:\"water charges \";s:5:\"750.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 177, 12, '2019-09-01', '2019-09-05', '2019-09-01', 0, '5.17', '620.00', '0.00', '4095.17', '0.00', NULL, NULL, 6, '620.00', '5.17', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(246, NULL, '2750.00', '-1858.33', '2019-10-02 04:50:23', '2019-08-17 05:10:42', 'a:6:{s:10:\"NOC Charge\";s:5:\"500.0\";s:13:\"Property tax \";s:5:\"900.0\";s:14:\"Parking Charge\";s:5:\"300.0\";s:14:\"water charges \";s:5:\"450.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 178, 12, '2019-09-01', '2019-09-05', '2019-09-01', 0, '15.00', '1800.00', '58.33', '4623.33', '0.00', NULL, NULL, 7, '1800.00', '73.33', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(247, NULL, '3770.00', '-920.00', '2019-10-02 04:50:23', '2019-08-19 05:10:21', 'a:6:{s:10:\"NOC Charge\";s:5:\"500.0\";s:13:\"Property tax \";s:6:\"1500.0\";s:14:\"Parking Charge\";s:5:\"420.0\";s:14:\"water charges \";s:5:\"750.0\";s:16:\"service charges \";s:5:\"300.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 179, 12, '2019-09-01', '2019-09-05', '2019-09-01', 0, '7.67', '920.00', '0.00', '4697.67', '0.00', NULL, NULL, 8, '920.00', '0.00', 'Paid', 'a)Bill paid after due date attracts delay charges.'),
(248, NULL, '2850.00', '-1050.00', '2019-10-02 04:50:23', '2019-08-19 06:37:27', 'a:5:{s:13:\"Property tax \";s:6:\"1575.0\";s:14:\"Parking Charge\";s:4:\"80.0\";s:14:\"water charges \";s:5:\"495.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 201, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '8.33', '1000.00', '50.00', '3908.33', '0.00', NULL, NULL, 1, '1000.00', '50.00', 'Paid', 'a)Bill paid after due date attracts delay charges.'),
(249, NULL, '4310.00', '0.00', '2019-10-02 04:50:23', '2019-08-19 06:33:34', 'a:5:{s:13:\"Property tax \";s:6:\"2625.0\";s:14:\"Parking Charge\";s:5:\"160.0\";s:14:\"water charges \";s:5:\"825.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 202, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '4310.00', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(250, NULL, '2770.00', '0.00', '2019-10-02 04:50:23', '2019-08-19 23:47:26', 'a:4:{s:13:\"Property tax \";s:6:\"1575.0\";s:14:\"water charges \";s:5:\"495.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 203, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '2770.00', '0.00', '2019-08-10', NULL, 3, '0.00', '0.00', 'Paid', 'a)Bill paid after due date attracts delay charges.'),
(251, NULL, '4150.00', '0.00', '2019-10-02 04:50:23', '2019-08-19 23:47:26', 'a:4:{s:13:\"Property tax \";s:6:\"2625.0\";s:14:\"water charges \";s:5:\"825.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 204, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '4150.00', '0.00', '2019-08-11', NULL, 4, '0.00', '0.00', 'Paid', 'a)Bill paid after due date attracts delay charges.'),
(252, NULL, '2770.00', '-1050.00', '2019-10-02 04:50:23', '2019-08-19 06:33:34', 'a:4:{s:13:\"Property tax \";s:6:\"1575.0\";s:14:\"water charges \";s:5:\"495.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 205, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '8.33', '1000.00', '50.00', '3828.33', '0.00', NULL, NULL, 5, '1000.00', '58.33', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(253, NULL, '4150.00', '-1050.00', '2019-10-02 04:50:23', '2019-08-19 06:33:35', 'a:4:{s:13:\"Property tax \";s:6:\"2625.0\";s:14:\"water charges \";s:5:\"825.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 206, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '8.33', '1000.00', '50.00', '5208.33', '0.00', NULL, NULL, 6, '1000.00', '58.33', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(254, NULL, '2770.00', '0.00', '2019-10-02 04:50:23', '2019-08-19 06:33:35', 'a:4:{s:13:\"Property tax \";s:6:\"1575.0\";s:14:\"water charges \";s:5:\"495.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 207, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '2770.00', '0.00', NULL, NULL, 7, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(255, NULL, '4510.00', '0.00', '2019-10-02 04:50:23', '2019-08-19 06:33:35', 'a:5:{s:13:\"Property tax \";s:6:\"2625.0\";s:14:\"Parking Charge\";s:5:\"360.0\";s:14:\"water charges \";s:5:\"825.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 208, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '4510.00', '0.00', NULL, NULL, 8, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(256, NULL, '3050.00', '0.00', '2019-10-02 04:50:23', '2019-08-19 06:33:35', 'a:5:{s:13:\"Property tax \";s:6:\"1575.0\";s:14:\"Parking Charge\";s:5:\"280.0\";s:14:\"water charges \";s:5:\"495.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 209, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '3050.00', '0.00', NULL, NULL, 9, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(257, NULL, '4510.00', '0.00', '2019-10-02 04:50:23', '2019-08-19 06:33:35', 'a:5:{s:13:\"Property tax \";s:6:\"2625.0\";s:14:\"Parking Charge\";s:5:\"360.0\";s:14:\"water charges \";s:5:\"825.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 210, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '4510.00', '0.00', NULL, NULL, 10, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(258, NULL, '3390.00', '0.00', '2019-10-02 04:50:23', '2019-08-19 06:33:36', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"1575.0\";s:14:\"Parking Charge\";s:5:\"420.0\";s:14:\"water charges \";s:5:\"495.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 211, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '3390.00', '0.00', NULL, NULL, 11, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(259, NULL, '4890.00', '0.00', '2019-10-02 04:50:23', '2019-08-19 06:33:36', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"2625.0\";s:14:\"Parking Charge\";s:5:\"540.0\";s:14:\"water charges \";s:5:\"825.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 212, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '4890.00', '0.00', NULL, NULL, 12, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(260, NULL, '3270.00', '0.00', '2019-10-02 04:50:23', '2019-08-19 06:33:36', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"1575.0\";s:14:\"Parking Charge\";s:5:\"300.0\";s:14:\"water charges \";s:5:\"495.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 213, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '3270.00', '0.00', NULL, NULL, 13, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(261, NULL, '4500.00', '0.00', '2019-10-02 04:50:24', '2019-08-19 06:33:36', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"2625.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:14:\"water charges \";s:5:\"825.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 214, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '4500.00', '0.00', NULL, NULL, 14, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(262, NULL, '3120.00', '0.00', '2019-10-02 04:50:24', '2019-08-19 06:33:36', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"1575.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:14:\"water charges \";s:5:\"495.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 215, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '3120.00', '0.00', NULL, NULL, 15, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(263, NULL, '4500.00', '0.00', '2019-10-02 04:50:24', '2019-08-19 06:33:37', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"2625.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:14:\"water charges \";s:5:\"825.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 216, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '4500.00', '0.00', NULL, NULL, 16, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(264, NULL, '3120.00', '0.00', '2019-10-02 04:50:24', '2019-08-19 06:33:37', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"1575.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:14:\"water charges \";s:5:\"495.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 217, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '3120.00', '0.00', NULL, NULL, 17, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(265, NULL, '4620.00', '0.00', '2019-10-02 04:50:24', '2019-08-19 06:33:37', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"2625.0\";s:14:\"Parking Charge\";s:5:\"270.0\";s:14:\"water charges \";s:5:\"825.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 218, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '4620.00', '0.00', NULL, NULL, 18, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(266, NULL, '3120.00', '-525.00', '2019-10-02 04:50:24', '2019-08-19 06:33:37', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"1575.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:14:\"water charges \";s:5:\"495.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 219, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '4.17', '500.00', '25.00', '3649.17', '0.00', NULL, NULL, 19, '500.00', '29.17', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(267, NULL, '4500.00', '0.00', '2019-10-02 04:50:24', '2019-08-19 06:33:38', 'a:6:{s:10:\"NOC Charge\";s:5:\"200.0\";s:13:\"Property tax \";s:6:\"2625.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:14:\"water charges \";s:5:\"825.0\";s:16:\"service charges \";s:5:\"400.0\";s:17:\"festival charges \";s:5:\"300.0\";}', 220, 14, '2019-08-01', '2019-08-05', '2019-08-01', 0, '0.00', '0.00', '0.00', '4500.00', '0.00', NULL, NULL, 20, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(270, NULL, '3935.00', '-2200.00', '2019-10-02 04:50:24', '2019-08-24 04:02:45', 'a:5:{s:13:\"Property tax \";s:6:\"1575.0\";s:14:\"Parking Charge\";s:5:\"460.0\";s:14:\"water charges \";s:5:\"900.0\";s:16:\"service charges \";s:5:\"500.0\";s:17:\"festival charges \";s:5:\"500.0\";}', 221, 15, '2019-08-01', '2019-08-05', '2019-08-01', 0, '8.33', '1000.00', '1200.00', '6143.33', '0.00', NULL, NULL, 1, '1000.00', '1200.00', 'Paid', 'a)Bill paid after due date attracts delay charges.'),
(271, NULL, '6965.00', '-3100.00', '2019-10-02 04:50:24', '2019-08-24 03:59:38', 'a:6:{s:10:\"NOC Charge\";s:6:\"1000.0\";s:13:\"Property tax \";s:6:\"2625.0\";s:14:\"Parking Charge\";s:5:\"840.0\";s:14:\"water charges \";s:6:\"1500.0\";s:16:\"service charges \";s:5:\"500.0\";s:17:\"festival charges \";s:5:\"500.0\";}', 222, 15, '2019-08-01', '2019-08-05', '2019-08-01', 0, '12.50', '1500.00', '1600.00', '10077.50', '0.00', NULL, NULL, 2, '1500.00', '1612.50', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(272, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:13', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 224, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 1, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(273, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:13', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 225, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(274, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:13', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 226, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 3, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(275, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:13', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 227, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(276, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:13', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 228, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 5, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(277, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:13', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 229, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 6, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(278, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:13', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 230, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 7, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(279, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:13', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 231, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 8, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(280, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:13', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 232, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 9, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(281, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:13', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 233, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 10, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(282, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 234, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 11, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(283, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 235, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 12, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(284, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 236, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 13, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(285, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 237, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 14, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(286, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 238, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 15, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.');
INSERT INTO `bill_details` (`id`, `payment_id`, `bill_amount`, `previous_member_balance`, `created_at`, `updated_at`, `details`, `member_id`, `society_id`, `bill_date`, `due_date`, `bill_month`, `paid`, `interest`, `principal_arrears`, `interest_arrears`, `total_due`, `late_payment_charges`, `bill_payment_date`, `bill_payment_id`, `bill_no`, `total_arrears`, `total_interest_arrears`, `bill_status`, `bill_summary`) VALUES
(287, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 239, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 16, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(288, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 240, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 17, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(289, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 241, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 18, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(290, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 242, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 19, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(291, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 243, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 20, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(292, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 244, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 21, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(293, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 245, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 22, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(294, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 246, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 23, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(295, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 247, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 24, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(296, NULL, '350.00', '0.00', '2019-10-02 04:50:25', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 248, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 25, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(297, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 249, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 26, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(298, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 250, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 27, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(299, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 251, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 28, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(300, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 252, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 29, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(301, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-29 23:46:14', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 253, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 30, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(302, NULL, '0.00', '0.00', '2019-10-02 04:50:26', '2019-08-29 23:46:14', 'a:1:{s:6:\"Vacant\";s:3:\"0.0\";}', 254, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, 31, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(303, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-30 00:01:27', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 286, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 1, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(304, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-30 00:01:27', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 287, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 2, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(305, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-30 00:01:27', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 288, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 3, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(306, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-30 00:01:27', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 289, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 4, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(307, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-30 00:01:27', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 290, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 5, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(308, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-29 23:58:47', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 291, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 6, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(309, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-30 00:01:27', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 292, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 7, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(310, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-29 23:58:47', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 293, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 8, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(311, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-30 00:01:27', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 294, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 9, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(312, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-29 23:58:47', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 295, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 10, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(313, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-30 00:01:27', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 296, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 11, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(314, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 297, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 12, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(315, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-29 23:58:47', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 298, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 13, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(316, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-29 23:58:47', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 299, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 14, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(317, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-29 23:58:47', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 300, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 15, '0.00', '0.00', 'Unpaid', 'a) Please make the payment on or before due date.'),
(318, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 301, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 16, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(319, NULL, '350.00', '0.00', '2019-10-02 04:50:26', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 302, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 17, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(320, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 303, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 18, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(321, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 304, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 19, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(322, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 305, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 20, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(323, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 306, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 21, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(324, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 307, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 22, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(325, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 308, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 23, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(326, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 309, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 24, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(327, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 310, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 25, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(328, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 311, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 26, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(329, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 312, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 27, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(330, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:28', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 313, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 28, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(331, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:29', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 314, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 29, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(332, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:01:29', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 315, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 30, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(333, NULL, '0.00', '0.00', '2019-10-02 04:50:27', '2019-08-29 23:58:48', 'a:1:{s:6:\"Vacant\";s:3:\"0.0\";}', 316, 16, '2019-01-30', '2019-02-10', '2019-01-01', 0, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, 31, '0.00', '0.00', 'Paid', 'a) Please make the payment on or before due date.'),
(334, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 286, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 32, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(335, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 287, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 33, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(336, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:23:57', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 288, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 34, '0.00', '0.00', 'Unpaid', 'a) Please make payment on or before due date.'),
(337, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 289, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 35, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(338, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:23:57', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 290, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 36, '0.00', '0.00', 'Unpaid', 'a) Please make payment on or before due date.'),
(339, NULL, '350.00', '-350.00', '2019-10-02 04:50:27', '2019-08-30 00:23:57', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 291, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '350.00', '0.00', '700.00', '0.00', NULL, NULL, 37, '350.00', '0.00', 'Unpaid', 'a) Please make payment on or before due date.'),
(340, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 292, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 38, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(341, NULL, '350.00', '-350.00', '2019-10-02 04:50:27', '2019-08-30 00:23:57', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 293, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '350.00', '0.00', '700.00', '0.00', NULL, NULL, 39, '350.00', '0.00', 'Unpaid', 'a) Please make payment on or before due date.'),
(342, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 294, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 40, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(343, NULL, '350.00', '-350.00', '2019-10-02 04:50:27', '2019-08-30 00:23:57', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 295, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '350.00', '0.00', '700.00', '0.00', NULL, NULL, 41, '350.00', '0.00', 'Unpaid', 'a) Please make payment on or before due date.'),
(344, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:23:57', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 296, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 42, '0.00', '0.00', 'Unpaid', 'a) Please make payment on or before due date.'),
(345, NULL, '350.00', '0.00', '2019-10-02 04:50:27', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 297, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 43, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(346, NULL, '350.00', '-350.00', '2019-10-02 04:50:27', '2019-08-30 00:23:57', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 298, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '350.00', '0.00', '700.00', '0.00', NULL, NULL, 44, '350.00', '0.00', 'Unpaid', 'a) Please make payment on or before due date.'),
(347, NULL, '350.00', '-350.00', '2019-10-02 04:50:28', '2019-08-30 00:23:57', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 299, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '350.00', '0.00', '700.00', '0.00', NULL, NULL, 45, '350.00', '0.00', 'Unpaid', 'a) Please make payment on or before due date.'),
(348, NULL, '350.00', '-350.00', '2019-10-02 04:50:28', '2019-08-30 00:23:57', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 300, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '350.00', '0.00', '700.00', '0.00', NULL, NULL, 46, '350.00', '0.00', 'Unpaid', 'a) Please make payment on or before due date.'),
(349, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 301, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 47, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(350, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 302, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 48, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(351, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:23:57', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 303, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', NULL, NULL, 49, '0.00', '0.00', 'Unpaid', 'a) Please make payment on or before due date.'),
(352, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 304, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 50, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(353, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 305, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 51, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(354, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 306, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 52, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(355, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 307, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 53, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(356, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 308, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 54, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(357, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 309, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 55, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(358, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:17', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 310, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 56, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(359, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:18', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 311, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 57, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(360, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:18', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 312, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 58, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(361, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:18', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 313, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 59, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(362, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:18', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 314, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 60, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(363, NULL, '350.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:27:18', 'a:1:{s:19:\"Maintenance Charges\";s:5:\"350.0\";}', 315, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '350.00', '0.00', '2019-02-10', NULL, 61, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(364, NULL, '0.00', '0.00', '2019-10-02 04:50:28', '2019-08-30 00:23:58', 'a:1:{s:6:\"Vacant\";s:3:\"0.0\";}', 316, 16, '2019-02-28', '2019-03-10', '2019-02-01', 0, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, 62, '0.00', '0.00', 'Paid', 'a) Please make payment on or before due date.'),
(365, NULL, '0.00', '0.00', '2019-10-02 04:50:28', '2019-08-31 04:34:04', 'a:1:{s:4:\"Rent\";s:3:\"0.0\";}', 119, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, 16, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(366, NULL, '18000.00', '0.00', '2019-10-02 04:50:28', '2019-10-01 11:39:28', 'a:1:{s:19:\"Private Office Rent\";s:7:\"18000.0\";}', 102, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '18000.00', '0.00', NULL, NULL, 17, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(367, NULL, '22000.00', '0.00', '2019-10-02 04:50:28', '2019-10-01 11:40:46', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"22000.0\";}', 103, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '22000.00', '0.00', NULL, NULL, 18, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(368, NULL, '12000.00', '0.00', '2019-10-02 04:50:28', '2019-10-01 11:41:27', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"12000.0\";}', 104, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '12000.00', '0.00', NULL, NULL, 19, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(369, NULL, '40000.00', '0.00', '2019-10-02 04:50:28', '2019-10-01 12:00:44', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"40000.0\";}', 105, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '40000.00', '0.00', NULL, NULL, 20, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(370, NULL, '22000.00', '0.00', '2019-10-02 04:50:28', '2019-10-01 11:42:09', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"22000.0\";}', 106, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '22000.00', '0.00', NULL, NULL, 21, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(371, NULL, '22000.00', '0.00', '2019-10-02 04:50:28', '2019-10-01 11:42:33', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"22000.0\";}', 107, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '22000.00', '0.00', NULL, NULL, 22, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(372, NULL, '20000.00', '-40.00', '2019-10-02 04:50:29', '2019-10-01 11:42:58', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"20000.0\";}', 108, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '40.00', '0.00', '20040.00', '0.00', NULL, NULL, 23, '40.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(373, NULL, '9000.00', '0.00', '2019-10-02 04:50:29', '2019-10-01 11:43:21', 'a:1:{s:13:\"Monthly Cabin\";s:6:\"9000.0\";}', 109, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '9000.00', '0.00', NULL, NULL, 24, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(374, NULL, '20000.00', '-20900.00', '2019-10-02 04:50:29', '2019-08-31 04:34:04', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"20000.0\";}', 110, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '20900.00', '0.00', '40900.00', '0.00', NULL, NULL, 25, '20900.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(375, NULL, '5000.00', '-5000.00', '2019-10-02 04:50:29', '2019-08-31 04:34:04', 'a:1:{s:13:\"Single Seater\";s:6:\"5000.0\";}', 111, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '5000.00', '0.00', '10000.00', '0.00', NULL, NULL, 26, '5000.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(376, NULL, '5000.00', '0.00', '2019-10-02 04:50:29', '2019-10-01 11:43:46', 'a:1:{s:13:\"Single Seater\";s:6:\"5000.0\";}', 112, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '5000.00', '0.00', NULL, NULL, 27, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(377, NULL, '5000.00', '0.00', '2019-10-02 04:50:29', '2019-10-01 11:44:10', 'a:1:{s:13:\"Single Seater\";s:6:\"5000.0\";}', 113, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '5000.00', '0.00', NULL, NULL, 28, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(378, NULL, '5000.00', '0.00', '2019-10-02 04:50:29', '2019-10-01 11:44:40', 'a:1:{s:13:\"Single Seater\";s:6:\"5000.0\";}', 114, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '5000.00', '0.00', NULL, NULL, 29, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(379, NULL, '3500.00', '0.00', '2019-10-02 04:50:29', '2019-10-01 11:45:05', 'a:1:{s:25:\"Single Seater - Part Time\";s:6:\"3500.0\";}', 145, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '3500.00', '0.00', NULL, NULL, 30, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(380, NULL, '3000.00', '0.00', '2019-10-02 04:50:29', '2019-10-01 11:45:36', 'a:1:{s:13:\"Single Seater\";s:6:\"3000.0\";}', 223, 4, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '3000.00', '0.00', NULL, NULL, 31, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(381, NULL, '3205.00', '-1050.00', '2019-10-02 04:50:29', '2019-09-03 02:24:19', 'a:5:{s:13:\"Property Tax \";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"180.0\";s:14:\"Water charges \";s:6:\"1350.0\";s:15:\"Service Charge \";s:5:\"500.0\";s:16:\"Festival Charge \";s:5:\"500.0\";}', 329, 17, '2019-08-01', '2019-08-05', '2019-08-01', 0, '-18.37', '1000.00', '50.00', '4236.63', '0.00', NULL, NULL, 1, '1000.00', '50.00', 'Paid', 'a)Bill paid after due date attracts delay charges.'),
(382, NULL, '5575.00', '-525.00', '2019-10-02 04:50:29', '2019-09-03 02:19:22', 'a:6:{s:10:\"NOC Charge\";s:6:\"1000.0\";s:13:\"Property Tax \";s:6:\"1125.0\";s:14:\"Parking Charge\";s:5:\"200.0\";s:14:\"Water charges \";s:6:\"2250.0\";s:15:\"Service Charge \";s:5:\"500.0\";s:16:\"Festival Charge \";s:5:\"500.0\";}', 330, 17, '2019-08-01', '2019-08-05', '2019-08-01', 0, '-9.19', '500.00', '25.00', '6090.81', '0.00', NULL, NULL, 2, '500.00', '15.81', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(383, NULL, '3265.00', '-1050.00', '2019-10-02 04:50:29', '2019-09-03 02:26:17', 'a:5:{s:13:\"Property Tax \";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"240.0\";s:14:\"Water charges \";s:6:\"1350.0\";s:15:\"Service Charge \";s:5:\"500.0\";s:16:\"Festival Charge \";s:5:\"500.0\";}', 331, 17, '2019-08-01', '2019-08-05', '2019-08-01', 0, '-18.37', '1000.00', '50.00', '4296.63', '0.00', NULL, NULL, 3, '1000.00', '50.00', 'Paid', 'a)Bill paid after due date attracts delay charges.'),
(384, NULL, '4265.00', '-525.00', '2019-10-02 04:50:29', '2019-09-03 02:19:22', 'a:6:{s:10:\"NOC Charge\";s:6:\"1000.0\";s:13:\"Property Tax \";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"240.0\";s:14:\"Water charges \";s:6:\"1350.0\";s:15:\"Service Charge \";s:5:\"500.0\";s:16:\"Festival Charge \";s:5:\"500.0\";}', 332, 17, '2019-08-01', '2019-08-05', '2019-08-01', 0, '-9.19', '500.00', '25.00', '4780.81', '0.00', NULL, NULL, 4, '500.00', '15.81', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(385, NULL, '4675.00', '-1050.00', '2019-10-02 04:50:29', '2019-09-03 02:19:22', 'a:5:{s:13:\"Property Tax \";s:6:\"1125.0\";s:14:\"Parking Charge\";s:5:\"300.0\";s:14:\"Water charges \";s:6:\"2250.0\";s:15:\"Service Charge \";s:5:\"500.0\";s:16:\"Festival Charge \";s:5:\"500.0\";}', 333, 17, '2019-08-01', '2019-08-05', '2019-08-01', 0, '-18.37', '1000.00', '50.00', '5706.63', '0.00', NULL, NULL, 5, '1000.00', '31.63', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(386, NULL, '6725.00', '-30500.00', '2019-10-02 04:50:29', '2019-09-03 02:19:22', 'a:5:{s:10:\"NOC Charge\";s:6:\"1000.0\";s:13:\"Property Tax \";s:6:\"1575.0\";s:14:\"Water charges \";s:6:\"3150.0\";s:15:\"Service Charge \";s:5:\"500.0\";s:16:\"Festival Charge \";s:5:\"500.0\";}', 334, 17, '2019-08-01', '2019-08-05', '2019-08-01', 0, '-533.75', '30000.00', '500.00', '36691.25', '0.00', NULL, NULL, 6, '30000.00', '-33.75', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(387, NULL, '3205.00', '-0.63', '2019-10-02 04:50:29', '2019-09-03 02:28:30', 'a:5:{s:13:\"Property Tax \";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"180.0\";s:14:\"Water charges \";s:6:\"1350.0\";s:15:\"Service Charge \";s:5:\"500.0\";s:16:\"Festival Charge \";s:5:\"500.0\";}', 329, 17, '2019-09-01', '2019-09-04', '2019-09-01', 0, '-0.01', '-49.37', '50.00', '3205.62', '0.00', NULL, NULL, 7, '-49.37', '49.99', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(388, NULL, '5575.00', '-6090.81', '2019-10-02 04:50:29', '2019-09-03 02:28:30', 'a:6:{s:10:\"NOC Charge\";s:6:\"1000.0\";s:13:\"Property Tax \";s:6:\"1125.0\";s:14:\"Parking Charge\";s:5:\"200.0\";s:14:\"Water charges \";s:6:\"2250.0\";s:15:\"Service Charge \";s:5:\"500.0\";s:16:\"Festival Charge \";s:5:\"500.0\";}', 330, 17, '2019-09-01', '2019-09-04', '2019-09-01', 0, '-106.59', '6075.00', '15.81', '11559.22', '0.00', NULL, NULL, 8, '6075.00', '-90.78', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(389, NULL, '3265.00', '-200.63', '2019-10-02 04:50:29', '2019-09-03 02:28:30', 'a:5:{s:13:\"Property Tax \";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"240.0\";s:14:\"Water charges \";s:6:\"1350.0\";s:15:\"Service Charge \";s:5:\"500.0\";s:16:\"Festival Charge \";s:5:\"500.0\";}', 331, 17, '2019-09-01', '2019-09-04', '2019-09-01', 0, '-3.51', '150.63', '50.00', '3462.12', '0.00', NULL, NULL, 9, '150.63', '46.49', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(390, NULL, '4265.00', '-4780.81', '2019-10-02 04:50:29', '2019-09-03 02:28:30', 'a:6:{s:10:\"NOC Charge\";s:6:\"1000.0\";s:13:\"Property Tax \";s:5:\"675.0\";s:14:\"Parking Charge\";s:5:\"240.0\";s:14:\"Water charges \";s:6:\"1350.0\";s:15:\"Service Charge \";s:5:\"500.0\";s:16:\"Festival Charge \";s:5:\"500.0\";}', 332, 17, '2019-09-01', '2019-09-04', '2019-09-01', 0, '-83.66', '4765.00', '15.81', '8962.15', '0.00', NULL, NULL, 10, '4765.00', '-67.85', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(391, NULL, '4675.00', '-5706.63', '2019-10-02 04:50:30', '2019-09-03 02:28:30', 'a:5:{s:13:\"Property Tax \";s:6:\"1125.0\";s:14:\"Parking Charge\";s:5:\"300.0\";s:14:\"Water charges \";s:6:\"2250.0\";s:15:\"Service Charge \";s:5:\"500.0\";s:16:\"Festival Charge \";s:5:\"500.0\";}', 333, 17, '2019-09-01', '2019-09-04', '2019-09-01', 0, '-99.87', '5675.00', '31.63', '10281.76', '0.00', NULL, NULL, 11, '5675.00', '-68.24', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(392, NULL, '6725.00', '-36691.25', '2019-10-02 04:50:30', '2019-09-03 02:28:30', 'a:5:{s:10:\"NOC Charge\";s:6:\"1000.0\";s:13:\"Property Tax \";s:6:\"1575.0\";s:14:\"Water charges \";s:6:\"3150.0\";s:15:\"Service Charge \";s:5:\"500.0\";s:16:\"Festival Charge \";s:5:\"500.0\";}', 334, 17, '2019-09-01', '2019-09-04', '2019-09-01', 0, '-642.10', '36725.00', '-33.75', '42774.15', '0.00', NULL, NULL, 12, '36725.00', '-675.85', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(395, NULL, '3600.00', '2100.00', '2019-10-02 04:50:30', '2019-09-11 05:48:42', 'a:6:{s:10:\"NOC Charge\";s:6:\"1000.0\";s:13:\"Property Tax \";s:6:\"1125.0\";s:14:\"Parking Charge\";s:5:\"300.0\";s:14:\"Water charges \";s:5:\"675.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"200.0\";}', 336, 20, '2019-09-01', '2019-09-05', '2019-09-01', 0, '0.00', '0.00', '0.00', '1500.00', '0.00', NULL, NULL, 1, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(396, NULL, '3720.00', '-2050.00', '2019-10-02 04:50:30', '2019-09-11 05:32:21', 'a:5:{s:13:\"Property Tax \";s:6:\"1875.0\";s:14:\"Parking Charge\";s:5:\"220.0\";s:14:\"Water charges \";s:6:\"1125.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"200.0\";}', 337, 20, '2019-09-01', '2019-09-05', '2019-09-01', 0, '-35.87', '1500.00', '550.00', '5734.13', '0.00', NULL, NULL, 2, '1500.00', '550.00', 'Paid', 'a)Bill paid after due date attracts delay charges.'),
(397, NULL, '3600.00', '-1500.00', '2019-10-02 04:50:30', '2019-09-11 05:48:42', 'a:6:{s:10:\"NOC Charge\";s:6:\"1000.0\";s:13:\"Property Tax \";s:6:\"1125.0\";s:14:\"Parking Charge\";s:5:\"300.0\";s:14:\"Water charges \";s:5:\"675.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"200.0\";}', 336, 20, '2019-10-01', '2019-10-05', '2019-10-01', 0, '-26.25', '1500.00', '0.00', '5073.75', '0.00', NULL, NULL, 3, '1500.00', '-26.25', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(398, NULL, '3720.00', '-0.13', '2019-10-02 04:50:30', '2019-09-11 05:32:49', 'a:5:{s:13:\"Property Tax \";s:6:\"1875.0\";s:14:\"Parking Charge\";s:5:\"220.0\";s:14:\"Water charges \";s:6:\"1125.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"200.0\";}', 337, 20, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '-549.87', '550.00', '3720.13', '0.00', NULL, NULL, 4, '-549.87', '550.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(399, NULL, '800.00', '0.00', '2019-10-02 04:50:30', '2019-09-12 02:19:11', 'a:3:{s:12:\"Property Tax\";s:5:\"250.0\";s:13:\"Water Charges\";s:5:\"200.0\";s:15:\"Service Charges\";s:5:\"350.0\";}', 348, 21, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 1, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(400, NULL, '650.00', '0.00', '2019-10-02 04:50:30', '2019-09-12 02:19:11', 'a:3:{s:12:\"Property Tax\";s:5:\"200.0\";s:13:\"Water Charges\";s:5:\"100.0\";s:15:\"Service Charges\";s:5:\"350.0\";}', 349, 21, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '650.00', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(401, NULL, '800.00', '0.00', '2019-10-02 04:50:30', '2019-09-12 02:19:11', 'a:3:{s:12:\"Property Tax\";s:5:\"250.0\";s:13:\"Water Charges\";s:5:\"200.0\";s:15:\"Service Charges\";s:5:\"350.0\";}', 350, 21, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 3, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(402, NULL, '800.00', '0.00', '2019-10-02 04:50:30', '2019-09-12 02:19:11', 'a:3:{s:12:\"Property Tax\";s:5:\"250.0\";s:13:\"Water Charges\";s:5:\"200.0\";s:15:\"Service Charges\";s:5:\"350.0\";}', 351, 21, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(403, NULL, '650.00', '0.00', '2019-10-02 04:50:30', '2019-09-12 02:19:11', 'a:3:{s:12:\"Property Tax\";s:5:\"200.0\";s:13:\"Water Charges\";s:5:\"100.0\";s:15:\"Service Charges\";s:5:\"350.0\";}', 352, 21, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '650.00', '0.00', NULL, NULL, 5, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(404, NULL, '800.00', '0.00', '2019-10-02 04:50:30', '2019-09-12 02:19:11', 'a:3:{s:12:\"Property Tax\";s:5:\"250.0\";s:13:\"Water Charges\";s:5:\"200.0\";s:15:\"Service Charges\";s:5:\"350.0\";}', 353, 21, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 6, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(405, NULL, '650.00', '0.00', '2019-10-02 04:50:30', '2019-09-12 02:19:11', 'a:3:{s:12:\"Property Tax\";s:5:\"200.0\";s:13:\"Water Charges\";s:5:\"100.0\";s:15:\"Service Charges\";s:5:\"350.0\";}', 354, 21, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '650.00', '0.00', NULL, NULL, 7, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(406, NULL, '800.00', '0.00', '2019-10-02 04:50:30', '2019-09-12 02:19:11', 'a:3:{s:12:\"Property Tax\";s:5:\"250.0\";s:13:\"Water Charges\";s:5:\"200.0\";s:15:\"Service Charges\";s:5:\"350.0\";}', 355, 21, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 8, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(407, NULL, '800.00', '0.00', '2019-10-02 04:50:30', '2019-09-12 02:19:11', 'a:3:{s:12:\"Property Tax\";s:5:\"250.0\";s:13:\"Water Charges\";s:5:\"200.0\";s:15:\"Service Charges\";s:5:\"350.0\";}', 356, 21, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 9, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(408, NULL, '650.00', '0.00', '2019-10-02 04:50:30', '2019-09-12 02:19:11', 'a:3:{s:12:\"Property Tax\";s:5:\"200.0\";s:13:\"Water Charges\";s:5:\"100.0\";s:15:\"Service Charges\";s:5:\"350.0\";}', 357, 21, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '650.00', '0.00', NULL, NULL, 10, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(409, NULL, '800.00', '0.00', '2019-10-02 04:50:31', '2019-09-12 03:01:44', 'a:3:{s:13:\"Property Tax \";s:5:\"250.0\";s:14:\"Water charges \";s:5:\"200.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 358, 23, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 1, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(410, NULL, '800.00', '0.00', '2019-10-02 04:50:31', '2019-09-12 03:01:44', 'a:3:{s:13:\"Property Tax \";s:5:\"200.0\";s:14:\"Water charges \";s:5:\"250.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 359, 23, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(411, NULL, '800.00', '0.00', '2019-10-02 04:50:31', '2019-09-12 03:01:44', 'a:3:{s:13:\"Property Tax \";s:5:\"250.0\";s:14:\"Water charges \";s:5:\"200.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 360, 23, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 3, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(412, NULL, '800.00', '0.00', '2019-10-02 04:50:31', '2019-09-12 03:01:44', 'a:3:{s:13:\"Property Tax \";s:5:\"200.0\";s:14:\"Water charges \";s:5:\"250.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 361, 23, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(413, NULL, '800.00', '0.00', '2019-10-02 04:50:31', '2019-09-12 03:01:44', 'a:3:{s:13:\"Property Tax \";s:5:\"250.0\";s:14:\"Water charges \";s:5:\"200.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 362, 23, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 5, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(414, NULL, '800.00', '0.00', '2019-10-02 04:50:31', '2019-09-12 03:01:44', 'a:3:{s:13:\"Property Tax \";s:5:\"250.0\";s:14:\"Water charges \";s:5:\"200.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 363, 23, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 6, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(415, NULL, '800.00', '0.00', '2019-10-02 04:50:31', '2019-09-12 03:01:44', 'a:3:{s:13:\"Property Tax \";s:5:\"200.0\";s:14:\"Water charges \";s:5:\"250.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 364, 23, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 7, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(416, NULL, '800.00', '0.00', '2019-10-02 04:50:31', '2019-09-12 03:01:44', 'a:3:{s:13:\"Property Tax \";s:5:\"250.0\";s:14:\"Water charges \";s:5:\"200.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 365, 23, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 8, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(417, NULL, '800.00', '0.00', '2019-10-02 04:50:31', '2019-09-12 03:01:44', 'a:3:{s:13:\"Property Tax \";s:5:\"200.0\";s:14:\"Water charges \";s:5:\"250.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 366, 23, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 9, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(418, NULL, '800.00', '0.00', '2019-10-02 04:50:31', '2019-09-12 03:01:44', 'a:3:{s:13:\"Property Tax \";s:5:\"250.0\";s:14:\"Water charges \";s:5:\"200.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 367, 23, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 10, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(419, NULL, '800.00', '0.00', '2019-10-02 04:50:32', '2019-09-12 03:57:18', 'a:3:{s:13:\"Property Tax \";s:5:\"250.0\";s:14:\"Water charges \";s:5:\"200.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 368, 24, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 1, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(420, NULL, '800.00', '0.00', '2019-10-02 04:50:32', '2019-09-12 03:57:18', 'a:3:{s:13:\"Property Tax \";s:5:\"200.0\";s:14:\"Water charges \";s:5:\"250.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 369, 24, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(421, NULL, '800.00', '0.00', '2019-10-02 04:50:32', '2019-09-12 03:57:18', 'a:3:{s:13:\"Property Tax \";s:5:\"250.0\";s:14:\"Water charges \";s:5:\"200.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 370, 24, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 3, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(422, NULL, '800.00', '0.00', '2019-10-02 04:50:32', '2019-09-12 03:57:18', 'a:3:{s:13:\"Property Tax \";s:5:\"200.0\";s:14:\"Water charges \";s:5:\"250.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 371, 24, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(423, NULL, '800.00', '0.00', '2019-10-02 04:50:32', '2019-09-12 03:57:18', 'a:3:{s:13:\"Property Tax \";s:5:\"250.0\";s:14:\"Water charges \";s:5:\"200.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 372, 24, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 5, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.');
INSERT INTO `bill_details` (`id`, `payment_id`, `bill_amount`, `previous_member_balance`, `created_at`, `updated_at`, `details`, `member_id`, `society_id`, `bill_date`, `due_date`, `bill_month`, `paid`, `interest`, `principal_arrears`, `interest_arrears`, `total_due`, `late_payment_charges`, `bill_payment_date`, `bill_payment_id`, `bill_no`, `total_arrears`, `total_interest_arrears`, `bill_status`, `bill_summary`) VALUES
(424, NULL, '800.00', '0.00', '2019-10-02 04:50:32', '2019-09-12 03:57:18', 'a:3:{s:13:\"Property Tax \";s:5:\"250.0\";s:14:\"Water charges \";s:5:\"200.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 373, 24, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 6, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(425, NULL, '800.00', '0.00', '2019-10-02 04:50:32', '2019-09-12 03:57:18', 'a:3:{s:13:\"Property Tax \";s:5:\"200.0\";s:14:\"Water charges \";s:5:\"250.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 374, 24, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 7, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(426, NULL, '800.00', '0.00', '2019-10-02 04:50:32', '2019-09-12 03:57:18', 'a:3:{s:13:\"Property Tax \";s:5:\"250.0\";s:14:\"Water charges \";s:5:\"200.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 375, 24, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 8, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(427, NULL, '800.00', '0.00', '2019-10-02 04:50:32', '2019-09-12 03:57:18', 'a:3:{s:13:\"Property Tax \";s:5:\"200.0\";s:14:\"Water charges \";s:5:\"250.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 376, 24, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 9, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(428, NULL, '800.00', '0.00', '2019-10-02 04:50:32', '2019-09-12 03:57:18', 'a:3:{s:13:\"Property Tax \";s:5:\"250.0\";s:14:\"Water charges \";s:5:\"200.0\";s:15:\"Service Charge \";s:5:\"350.0\";}', 377, 24, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '800.00', '0.00', NULL, NULL, 10, '0.00', '0.00', 'Unpaid', 'a)Bill paid after due date attracts delay charges.'),
(429, NULL, '1050.00', '0.00', '2019-10-02 04:50:32', '2019-09-14 02:25:52', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:4:\"50.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 388, 26, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '1050.00', '0.00', NULL, NULL, 1, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(430, NULL, '1100.00', '0.00', '2019-10-02 04:50:32', '2019-09-14 02:47:34', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:5:\"100.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 389, 26, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '1100.00', '0.00', NULL, NULL, 2, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(431, NULL, '1050.00', '0.00', '2019-10-02 04:50:32', '2019-09-14 02:25:52', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:4:\"50.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 390, 26, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '1050.00', '0.00', NULL, NULL, 3, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(432, NULL, '1000.00', '0.00', '2019-10-02 04:50:32', '2019-09-14 02:50:19', 'a:4:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 391, 26, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '1000.00', '0.00', NULL, NULL, 4, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(433, NULL, '1150.00', '0.00', '2019-10-02 04:50:32', '2019-09-14 02:25:52', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 392, 26, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '1150.00', '0.00', NULL, NULL, 5, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(434, NULL, '1000.00', '0.00', '2019-10-02 04:50:32', '2019-09-14 02:25:52', 'a:4:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 393, 26, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '1000.00', '0.00', NULL, NULL, 6, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(435, NULL, '1150.00', '0.00', '2019-10-02 04:50:32', '2019-09-14 02:25:52', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 394, 26, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '1150.00', '0.00', NULL, NULL, 7, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(436, NULL, '1050.00', '0.00', '2019-10-02 04:50:32', '2019-09-14 02:25:52', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:4:\"50.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 395, 26, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '1050.00', '0.00', NULL, NULL, 8, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(437, NULL, '1000.00', '0.00', '2019-10-02 04:50:33', '2019-09-14 02:25:52', 'a:4:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 396, 26, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '1000.00', '0.00', NULL, NULL, 9, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(438, NULL, '1100.00', '0.00', '2019-10-02 04:50:33', '2019-09-14 02:25:52', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:5:\"100.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 397, 26, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '1100.00', '0.00', NULL, NULL, 10, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(439, NULL, '1050.00', '-1050.00', '2019-10-02 04:50:33', '2019-09-14 03:21:37', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:4:\"50.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 388, 26, '2019-11-01', '2019-11-05', '2019-11-01', 0, '18.37', '1050.00', '0.00', '2118.37', '0.00', NULL, NULL, 11, '1050.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(440, NULL, '1100.00', '0.00', '2019-10-02 04:50:33', '2019-09-14 03:05:43', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:5:\"100.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 389, 26, '2019-11-01', '2019-11-05', '2019-11-01', 0, '0.00', '0.00', '0.00', '1100.00', '0.00', NULL, NULL, 12, '0.00', '0.00', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(441, NULL, '1050.00', '-1050.00', '2019-10-02 04:50:33', '2019-09-14 03:05:43', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:4:\"50.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 390, 26, '2019-11-01', '2019-11-05', '2019-11-01', 0, '18.37', '1050.00', '0.00', '2118.37', '0.00', NULL, NULL, 13, '1050.00', '18.37', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(442, NULL, '1000.00', '4423.00', '2019-10-02 04:50:33', '2019-09-14 03:05:43', 'a:4:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 391, 26, '2019-11-01', '2019-11-05', '2019-11-01', 0, '0.00', '0.00', '0.00', '-3405.50', '0.00', NULL, NULL, 14, '0.00', '0.00', 'Paid', 'a) Bill paid after due date attracts delay charges.'),
(443, NULL, '1150.00', '-1150.00', '2019-10-02 04:50:33', '2019-09-14 03:05:43', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 392, 26, '2019-11-01', '2019-11-05', '2019-11-01', 0, '20.12', '1150.00', '0.00', '2320.12', '0.00', NULL, NULL, 15, '1150.00', '20.12', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(444, NULL, '1000.00', '-1000.00', '2019-10-02 04:50:33', '2019-09-14 03:05:43', 'a:4:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 393, 26, '2019-11-01', '2019-11-05', '2019-11-01', 0, '17.50', '1000.00', '0.00', '2017.50', '0.00', NULL, NULL, 16, '1000.00', '17.50', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(445, NULL, '1150.00', '-1150.00', '2019-10-02 04:50:33', '2019-09-14 03:05:43', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:5:\"150.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 394, 26, '2019-11-01', '2019-11-05', '2019-11-01', 0, '20.12', '1150.00', '0.00', '2320.12', '0.00', NULL, NULL, 17, '1150.00', '20.12', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(446, NULL, '1050.00', '-1050.00', '2019-10-02 04:50:33', '2019-09-14 03:05:43', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:4:\"50.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 395, 26, '2019-11-01', '2019-11-05', '2019-11-01', 0, '18.37', '1050.00', '0.00', '2118.37', '0.00', NULL, NULL, 18, '1050.00', '18.37', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(447, NULL, '1000.00', '-1000.00', '2019-10-02 04:50:33', '2019-09-14 03:05:43', 'a:4:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 396, 26, '2019-11-01', '2019-11-05', '2019-11-01', 0, '17.50', '1000.00', '0.00', '2017.50', '0.00', NULL, NULL, 19, '1000.00', '17.50', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(448, NULL, '1100.00', '-1100.00', '2019-10-02 04:50:33', '2019-09-14 03:05:43', 'a:5:{s:13:\"Property Tax \";s:5:\"300.0\";s:14:\"Parking Charge\";s:5:\"100.0\";s:14:\"Water charges \";s:5:\"300.0\";s:15:\"Service Charge \";s:5:\"300.0\";s:16:\"Festival Charge \";s:5:\"100.0\";}', 397, 26, '2019-11-01', '2019-11-05', '2019-11-01', 0, '19.25', '1100.00', '0.00', '2219.25', '0.00', NULL, NULL, 20, '1100.00', '19.25', 'Unpaid', 'a) Bill paid after due date attracts delay charges.'),
(449, NULL, '0.00', '0.00', '2019-10-02 04:50:33', '2019-10-01 12:22:42', 'a:1:{s:4:\"Rent\";s:3:\"0.0\";}', 119, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, 32, '0.00', '0.00', 'Paid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(450, NULL, '18000.00', '-4625.00', '2019-10-02 04:50:33', '2019-10-01 12:22:42', 'a:1:{s:19:\"Private Office Rent\";s:7:\"18000.0\";}', 102, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '4625.00', '0.00', '22625.00', '0.00', NULL, NULL, 33, '4625.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(451, NULL, '22000.00', '0.00', '2019-10-02 04:50:33', '2019-10-01 12:22:42', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"22000.0\";}', 103, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '22000.00', '0.00', NULL, NULL, 34, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(452, NULL, '50000.00', '0.00', '2019-10-02 04:50:33', '2019-10-01 12:22:42', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"50000.0\";}', 104, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '50000.00', '0.00', NULL, NULL, 35, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(453, NULL, '22000.00', '0.00', '2019-10-02 04:50:33', '2019-10-01 12:22:42', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"22000.0\";}', 106, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '22000.00', '0.00', NULL, NULL, 36, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(454, NULL, '22000.00', '0.00', '2019-10-02 04:50:34', '2019-10-01 12:22:42', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"22000.0\";}', 107, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '22000.00', '0.00', NULL, NULL, 37, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(455, NULL, '20000.00', '0.00', '2019-10-02 04:50:34', '2019-10-01 12:22:42', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"20000.0\";}', 108, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '20000.00', '0.00', NULL, NULL, 38, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(456, NULL, '9000.00', '0.00', '2019-10-02 04:50:34', '2019-10-01 12:22:42', 'a:1:{s:13:\"Monthly Cabin\";s:6:\"9000.0\";}', 109, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '9000.00', '0.00', NULL, NULL, 39, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(457, NULL, '20000.00', '-40900.00', '2019-10-02 04:50:34', '2019-10-01 12:22:42', 'a:1:{s:13:\"Monthly Cabin\";s:7:\"20000.0\";}', 110, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '40900.00', '0.00', '60900.00', '0.00', NULL, NULL, 40, '40900.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(458, NULL, '5000.00', '0.00', '2019-10-02 04:50:34', '2019-10-01 12:22:42', 'a:1:{s:13:\"Single Seater\";s:6:\"5000.0\";}', 112, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '5000.00', '0.00', NULL, NULL, 41, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(459, NULL, '5000.00', '0.00', '2019-10-02 04:50:34', '2019-10-01 12:22:42', 'a:1:{s:13:\"Single Seater\";s:6:\"5000.0\";}', 113, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '5000.00', '0.00', NULL, NULL, 42, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(460, NULL, '5000.00', '0.00', '2019-10-02 04:50:34', '2019-10-01 12:22:42', 'a:1:{s:13:\"Single Seater\";s:6:\"5000.0\";}', 114, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '5000.00', '0.00', NULL, NULL, 43, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(461, NULL, '3500.00', '0.00', '2019-10-02 04:50:34', '2019-10-01 12:22:42', 'a:1:{s:25:\"Single Seater - Part Time\";s:6:\"3500.0\";}', 145, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '3500.00', '0.00', NULL, NULL, 44, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.'),
(462, NULL, '3000.00', '2000.00', '2019-10-02 04:50:34', '2019-10-01 12:22:42', 'a:1:{s:13:\"Single Seater\";s:6:\"3000.0\";}', 223, 4, '2019-10-01', '2019-10-05', '2019-10-01', 0, '0.00', '0.00', '0.00', '1000.00', '0.00', NULL, NULL, 45, '0.00', '0.00', 'Unpaid', 'a) If Bill is not paid on or before due date, users will be restricted to\r\n\r\nenter office premises.\r\n\r\nb) In case of any query, please contact front desk.');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `payee`, `amount`, `description`, `created_at`, `updated_at`, `expense_category_id`, `society_id`, `service_provider_id`, `bank_id`) VALUES
(1, '2019-07-24 13:00:00', 'Anis', '4000.00', 'Decoration Charges', '2019-07-25 08:03:52', '2019-07-25 08:03:52', 4, 2, 4, 2),
(2, '2019-07-24 13:00:00', 'Gopal Jha', '150.00', 'Printing', '2019-07-25 08:04:20', '2019-07-25 08:04:20', 3, 2, 6, 2),
(3, '2019-07-24 13:00:00', 'Zaid', '6000.00', 'Salaries', '2019-07-25 08:05:06', '2019-07-25 08:05:06', 2, 2, 5, 2),
(4, '2019-07-25 13:00:00', 'Gopal Jha', '75.00', 'Printing', '2019-07-26 06:43:13', '2019-07-26 06:43:13', 3, 2, 6, NULL),
(5, '2019-07-25 13:00:00', 'Zaid', '3500.00', 'General Expns', '2019-07-26 06:44:44', '2019-07-26 06:44:44', 4, 2, 5, 2),
(6, '2019-08-03 13:00:00', 'Electricity Bill - MSEB', '3400.00', 'July 2019 Bill Paid', '2019-08-06 06:15:16', '2019-08-06 06:15:16', 7, 11, 12, 11),
(7, '2019-08-04 13:00:00', 'ABC Co', '430.00', 'Printing', '2019-08-06 06:15:46', '2019-08-06 06:15:46', 3, 11, 14, 11),
(8, '2019-08-04 13:00:00', 'XYZ Company', '3000.00', 'Security Expenses', '2019-08-06 06:16:32', '2019-08-06 06:16:32', 2, 11, 13, 11),
(9, '2019-08-25 13:00:00', 'ABC Co', '200.00', 'Paid for Sanitary Supplies', '2019-08-26 01:32:06', '2019-08-26 01:32:06', 3, 11, 14, NULL),
(10, '2019-02-09 13:00:00', 'Electricity Bill', '3150.00', 'Electricity Bill Paid', '2019-08-30 00:11:57', '2019-08-30 00:11:57', 8, 16, 15, 16),
(11, '2019-02-09 13:00:00', 'House Keeper', '2400.00', 'Housekeeping Expenses', '2019-08-30 00:20:29', '2019-08-30 00:20:29', 2, 16, 16, 16),
(12, '2019-02-09 13:00:00', 'Water Service', '2400.00', 'Water Expenses', '2019-08-30 00:21:06', '2019-08-30 00:21:06', 2, 16, 17, 16),
(13, '2019-03-09 13:00:00', 'Electricity Bill', '3880.00', 'Electricity Bill Paid', '2019-08-30 00:32:15', '2019-08-30 00:32:15', 8, 16, 15, 16),
(14, '2019-03-09 13:00:00', 'House Keeper', '2400.00', 'Housekeeping Expenses', '2019-08-30 00:33:08', '2019-08-30 00:33:08', 2, 16, 16, 16);

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

DROP TABLE IF EXISTS `expense_categories`;
CREATE TABLE IF NOT EXISTS `expense_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bank Charges', '2019-07-25 03:29:55', '2019-07-25 03:29:55'),
(2, 'Salaries and Allowances of Staff', '2019-07-25 03:30:15', '2019-07-25 03:30:15'),
(3, 'Printing and Stationery', '2019-07-25 03:31:05', '2019-07-25 03:31:05'),
(4, 'General expenses', '2019-07-25 03:31:21', '2019-07-25 03:31:21'),
(5, 'Audit fees', '2019-07-25 03:31:36', '2019-07-25 03:31:36'),
(6, 'Travelling expenses of staff', '2019-07-25 03:31:55', '2019-07-25 03:31:55'),
(7, 'Office & Administrative Expenses', '2019-07-25 03:32:18', '2019-07-25 03:32:18'),
(8, 'Electricity Expenses', '2019-08-30 00:08:03', '2019-08-30 00:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `flat_sub_types`
--

DROP TABLE IF EXISTS `flat_sub_types`;
CREATE TABLE IF NOT EXISTS `flat_sub_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `flat_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flat_types`
--

DROP TABLE IF EXISTS `flat_types`;
CREATE TABLE IF NOT EXISTS `flat_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `society_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flat_types`
--

INSERT INTO `flat_types` (`id`, `name`, `created_at`, `updated_at`, `society_id`) VALUES
(1, 'One BHK', '2019-07-25 02:22:53', '2019-07-25 02:22:53', 1),
(2, 'Two BHK', '2019-07-25 03:36:41', '2019-07-25 03:36:41', 1),
(3, 'One BHK', '2019-07-25 06:12:17', '2019-07-25 06:12:17', 2),
(4, 'Two BHK', '2019-07-25 06:14:09', '2019-07-25 06:14:09', 2),
(5, 'Three BHK', '2019-07-27 01:19:58', '2019-07-27 01:19:58', 2),
(6, 'maintenance', '2019-07-30 01:35:57', '2019-07-30 03:21:54', 3),
(7, 'Paynet', '2019-07-30 04:56:10', '2019-07-30 04:56:10', 4),
(8, 'Chrisel', '2019-07-30 04:57:42', '2019-07-31 03:01:41', 4),
(9, 'Konjoin', '2019-07-30 04:58:34', '2019-07-30 04:58:34', 4),
(10, 'Jesai Unbox & AZ Consulting', '2019-07-30 04:59:15', '2019-07-31 03:02:34', 4),
(11, 'Unbox', '2019-07-30 04:59:52', '2019-07-30 04:59:52', 4),
(12, 'Mapel & Dark Horse', '2019-07-30 05:00:36', '2019-07-30 05:00:36', 4),
(13, 'RBS', '2019-07-30 05:01:19', '2019-07-30 05:01:19', 4),
(14, 'Single Seater', '2019-07-30 05:02:20', '2019-07-30 05:02:20', 4),
(15, 'Maintenance charges ', '2019-07-30 05:44:39', '2019-07-30 05:44:39', 5),
(16, 'No Rent', '2019-07-30 07:18:16', '2019-07-30 07:18:16', 4),
(17, 'Maintenance charges ', '2019-07-30 07:39:11', '2019-07-30 07:39:11', 6),
(18, 'Paynet', '2019-07-30 08:12:13', '2019-07-30 08:12:13', 7),
(19, 'Maintenance charges ', '2019-07-30 08:48:19', '2019-07-30 08:48:19', 8),
(20, 'CSD', '2019-08-01 03:21:46', '2019-08-01 03:21:46', 4),
(21, 'Maintenance charges ', '2019-08-01 05:43:43', '2019-08-01 05:43:43', 9),
(22, 'Maintenance charges ', '2019-08-01 06:12:47', '2019-08-01 06:12:47', 10),
(23, 'One BHK', '2019-08-06 06:05:59', '2019-08-06 06:05:59', 11),
(24, 'Two BHK', '2019-08-06 06:09:45', '2019-08-06 06:09:45', 11),
(25, 'Maintenance charges ', '2019-08-17 04:50:39', '2019-08-17 04:50:39', 12),
(26, 'Maintenance charges ', '2019-08-19 05:38:13', '2019-08-19 05:38:13', 13),
(27, 'Maintenance charges ', '2019-08-19 06:27:32', '2019-08-19 06:27:32', 14),
(28, 'Maintenance charges ', '2019-08-24 03:36:59', '2019-08-24 03:36:59', 15),
(29, 'Solar', '2019-08-28 01:02:49', '2019-08-28 01:02:49', 4),
(30, 'Occupied', '2019-08-29 23:40:40', '2019-08-29 23:40:40', 16),
(31, 'Vacant', '2019-08-29 23:41:18', '2019-08-29 23:41:18', 16),
(32, 'Maintenance Charges ', '2019-09-03 01:58:20', '2019-09-03 01:58:20', 17),
(33, 'One BHK', '2019-09-05 06:45:02', '2019-09-05 06:45:02', 18),
(34, 'Maintenance Charges ', '2019-09-11 05:06:06', '2019-09-11 05:06:06', 20),
(35, 'Maintenance Charges ', '2019-09-12 01:53:29', '2019-09-12 01:53:29', 21),
(36, 'Water Charges ', '2019-09-12 01:58:09', '2019-09-12 01:58:09', 21),
(37, 'Property Charges', '2019-09-12 01:58:36', '2019-09-12 01:58:36', 21),
(38, 'Parking Charges ', '2019-09-12 02:03:02', '2019-09-12 02:03:02', 21),
(39, '1 BHK', '2019-09-12 02:12:22', '2019-09-12 02:12:22', 21),
(40, '2 BHK', '2019-09-12 02:14:20', '2019-09-12 02:14:20', 21),
(41, '2 BHK ', '2019-09-12 02:51:12', '2019-09-12 02:58:52', 23),
(42, '1 BHK ', '2019-09-12 02:51:29', '2019-09-12 02:57:22', 23),
(43, '1 BHK ', '2019-09-12 03:53:20', '2019-09-12 03:53:20', 24),
(44, '2 BHK ', '2019-09-12 03:53:28', '2019-09-12 03:53:28', 24),
(45, 'test', '2019-09-12 05:10:18', '2019-09-12 05:10:18', 11),
(46, 'Maintenance Charges ', '2019-09-14 01:56:49', '2019-09-14 01:56:49', 26),
(47, '1 BHK ', '2019-09-21 06:30:20', '2019-09-21 06:30:20', 27),
(48, '2 BHK ', '2019-09-21 06:30:29', '2019-09-21 06:30:29', 27),
(49, '4 MTG ', '2019-10-01 12:36:33', '2019-10-01 12:36:33', 4),
(50, '10 Solarmarq', '2019-10-01 12:37:42', '2019-10-01 12:37:42', 4),
(51, '15 Sharda', '2019-10-01 12:38:45', '2019-10-01 12:38:45', 4),
(52, '16 Techorbit', '2019-10-01 12:40:08', '2019-10-01 12:40:08', 4);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL,
  `flat_no` int(11) DEFAULT NULL,
  `tenant` varchar(5) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `society_id` int(11) DEFAULT NULL,
  `member_balance` decimal(15,2) DEFAULT NULL,
  `flat_area` int(11) DEFAULT NULL,
  `principal_arrears` decimal(15,2) DEFAULT NULL,
  `two_wheelers` int(11) DEFAULT NULL,
  `four_wheelers` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `interest_arrears` decimal(15,2) DEFAULT NULL,
  `flat_type_id` int(11) DEFAULT NULL,
  `flat_sub_type_id` int(11) DEFAULT NULL,
  `wing` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `flat_no`, `tenant`, `phone`, `created_at`, `updated_at`, `society_id`, `member_balance`, `flat_area`, `principal_arrears`, `two_wheelers`, `four_wheelers`, `user_id`, `name`, `email_id`, `interest_arrears`, `flat_type_id`, `flat_sub_type_id`, `wing`) VALUES
(91, 1, 'f', 1234567890, '2019-07-25 23:53:54', '2019-07-25 23:53:54', NULL, '0.00', NULL, '0.00', 0, 0, NULL, 'Carnelian Payment Network', 'anis@paynet.com', '0.00', NULL, NULL, 'A'),
(102, 1, 'f', 7768024707, '2019-07-30 04:54:24', '2019-10-01 12:22:42', 4, '-22625.00', 0, '0.00', 0, 0, 107, 'Carnelian Payment Networks (I) Pvt ltd', 'anis@paynet.co.in', '0.00', 7, NULL, 'Kini Arcade'),
(103, 2, 'f', 9321192487, '2019-07-30 04:54:24', '2019-10-01 12:22:42', 4, '-22000.00', 0, '0.00', 0, 0, 108, 'Jesai Shipping Lines', 'chart@jesaishipping.com', '0.00', 10, NULL, 'Kini Arcade'),
(104, 3, 'f', 8806828954, '2019-07-30 04:54:24', '2019-10-01 12:22:42', 4, '-50000.00', 0, '0.00', 0, 0, 109, 'Chrisel Technolab Pvt Ltd', 'willbun@chrisel.net', '0.00', 8, NULL, 'Kini Arcade'),
(106, 5, 'f', 9923085125, '2019-07-30 04:54:24', '2019-10-01 12:22:42', 4, '-22000.00', 0, '0.00', 0, 0, 111, 'A/Z Consultancy Services', 'atozservices5253@gmail.com', '0.00', 10, NULL, 'Kini Arcade'),
(107, 6, 'f', 8898034045, '2019-07-30 04:54:25', '2019-10-01 12:22:42', 4, '-22000.00', 0, '0.00', 0, 0, 112, 'Unbox Innovations', 'paras.botadra@unboxinnovations.com', '0.00', 10, NULL, 'Kini Arcade'),
(108, 7, 'f', 9370686320, '2019-07-30 04:54:25', '2019-10-01 12:22:42', 4, '-20000.00', 0, '0.00', 0, 0, 113, 'Mapel Moulds And Dies India Pvt Ltd', 'vijendrapawar@mapelmoulds.co.in', '0.00', 12, NULL, 'Kini Arcade'),
(109, 8, 'f', 8446304916, '2019-07-30 04:54:25', '2019-10-01 12:22:42', 4, '-9000.00', 0, '0.00', 0, 0, 114, 'Ravi Bhushan Singh', 'rbsactive@gmail.com', '0.00', 13, NULL, 'Kini Arcade'),
(110, 9, 'f', 9823211222, '2019-07-30 04:54:25', '2019-10-01 12:22:42', 4, '-60900.00', 0, '0.00', 0, 0, 115, 'Dark Horse Media', 'dhawal@darkhorsemedia.co', '0.00', 12, NULL, 'Kini Arcade'),
(112, 11, 'f', 9850356938, '2019-07-30 04:54:26', '2019-10-01 12:22:42', 4, '-5000.00', 0, '0.00', 0, 0, 117, 'M/S Questbulk Maritime', 'krunal_888@hotmail.com', '0.00', 14, NULL, 'Kini Arcade'),
(113, 12, 'f', 9742701537, '2019-07-30 04:54:26', '2019-10-01 12:22:42', 4, '-5000.00', 0, '0.00', 0, 0, 118, 'Arris India Pvt Ltd', 'shilpa.acharya86@gmail.com', '0.00', 14, NULL, 'Kini Arcade'),
(114, 13, 'f', 9987589853, '2019-07-30 04:54:26', '2019-10-01 12:22:42', 4, '-5000.00', 0, '0.00', 0, 0, 119, 'Nitesh Yadav', 'nyadav@itek.com', '0.00', 14, NULL, 'Kini Arcade'),
(119, 0, 'f', 9881811222, '2019-07-30 07:17:56', '2019-07-30 07:18:57', 4, '0.00', 0, '0.00', 0, 0, 125, 'Management', 'mgmt@dfactory.com', '0.00', 16, NULL, 'Kini Arcade'),
(130, 101, 'f', 9867884422, '2019-07-30 08:11:46', '2019-07-30 08:14:58', 7, '-15000.00', 0, '0.00', 0, 0, 137, 'Mr. Shambhudas Ratnadas', 'JainMandir101@gmail.com', '0.00', 18, NULL, 'Jain Mandir'),
(131, 102, 'f', 9867884422, '2019-07-30 08:11:46', '2019-07-30 08:14:58', 7, '-15000.00', 0, '0.00', 0, 0, 138, 'Mr. S. N. Belal', 'JainMandir102@gmail.com', '0.00', 18, NULL, 'Jain Mandir'),
(132, 103, 'f', 9867884422, '2019-07-30 08:11:47', '2019-07-30 08:14:58', 7, '-15000.00', 0, '0.00', 0, 0, 139, 'Mr. Shrikant Markandey Pathak', 'JainMandir103@gmail.com', '0.00', 18, NULL, 'Jain Mandir'),
(133, 104, 'f', 9867884422, '2019-07-30 08:11:47', '2019-07-30 08:14:58', 7, '-15000.00', 0, '0.00', 0, 0, 140, 'Mr. Kallu G. Chaurasia', 'JainMandir104@gmail.com', '0.00', 18, NULL, 'Jain Mandir'),
(134, 105, 'f', 9867884422, '2019-07-30 08:11:47', '2019-07-30 08:14:58', 7, '-15000.00', 0, '0.00', 0, 0, 141, 'Mrs. Kashmitra D Parikh', 'JainMandir105@gmail.com', '0.00', 18, NULL, 'Jain Mandir'),
(145, 14, 'f', 9892797891, '2019-08-01 03:23:59', '2019-10-01 12:22:42', 4, '-3500.00', 0, '0.00', 0, 0, 153, 'Devanshi Sharma & Associates', 'csdevanshisharma@gmail.com', '0.00', 20, NULL, 'Kini Arcade'),
(156, 101, 'f', 9867884422, '2019-08-06 06:00:47', '2019-09-12 23:27:56', 11, '50.00', 450, '0.00', 0, 0, 165, 'Mr. Shambhudas Ratnadas', 'A101@gmail.com', '0.00', 23, NULL, 'A'),
(157, 102, 'f', 9867884422, '2019-08-06 06:00:48', '2019-08-06 06:25:03', 11, '0.00', 475, '0.00', 0, 0, 166, 'Mr. S. N. Belal', 'A102@gmail.com', '0.00', 24, NULL, 'A'),
(158, 103, 'f', 7666766861, '2019-08-06 06:00:48', '2019-08-28 07:47:03', 11, '0.00', 475, '0.00', 1, 0, 167, 'Mr. Shrikant Markandey Pathak', 'ashish@paynetpaymetns.com', '0.00', 24, NULL, 'A'),
(159, 104, 'f', 9867884422, '2019-08-06 06:00:48', '2019-08-28 07:24:53', 11, '0.00', 450, '0.00', 0, 0, 168, 'Mr. Kallu G. Chaurasia', 'jigs.adhyaru@gmail.com', '0.00', 23, NULL, 'A'),
(160, 105, 'f', 9819343589, '2019-08-06 06:00:48', '2019-08-28 07:47:54', 11, '0.00', 450, '0.00', 0, 0, 169, 'Mrs. Kashmitra D Parikh', 'zaid@paynetpayments.com', '0.00', 23, NULL, 'A'),
(161, 201, 't', 9867884422, '2019-08-06 06:00:49', '2019-08-06 06:25:04', 11, '0.00', 450, '0.00', 0, 1, 170, 'Mr. Suresh K. Nadiyana', 'A201@gmail.com', '0.00', 23, NULL, 'A'),
(162, 202, 't', 9867884422, '2019-08-06 06:00:49', '2019-08-31 01:33:33', 11, '0.00', 475, '0.00', 0, 0, 171, 'Mrs. Priya J Lobo', 'A201@gmail.com', '0.00', 24, NULL, 'A'),
(163, 203, 'f', 9867884422, '2019-08-06 06:00:49', '2019-08-06 06:25:04', 11, '0.00', 475, '0.00', 0, 1, 172, 'Mrs. Agnes Dsouza', 'A203@gmail.com', '0.00', 24, NULL, 'A'),
(164, 204, 't', 9867884422, '2019-08-06 06:00:49', '2019-08-06 06:25:04', 11, '0.00', 450, '0.00', 0, 0, 173, 'Mrs. Alka R. Raut', 'A204@gmail.com', '0.00', 23, NULL, 'A'),
(165, 205, 'f', 9867884422, '2019-08-06 06:00:50', '2019-08-06 06:25:04', 11, '0.00', 450, '0.00', 0, 0, 174, 'Mrs. Alka R. Raut', 'A205@gmail.com', '0.00', 23, NULL, 'A'),
(166, 101, 'f', 9867412542, '2019-08-06 06:00:50', '2019-08-06 06:25:04', 11, '0.00', 450, '0.00', 0, 0, 175, 'Mrs. Beena S. Nagpal & Jyoti Santosh Pathak', 'B101@gmail.com', '0.00', 23, NULL, 'B'),
(167, 102, 't', 9867412542, '2019-08-06 06:00:50', '2019-08-06 06:25:04', 11, '0.00', 475, '0.00', 1, 0, 176, 'Mrs. Payal J Bhanusali', 'B102@gmail.com', '0.00', 24, NULL, 'B'),
(168, 103, 'f', 9867412542, '2019-08-06 06:00:50', '2019-08-06 06:25:05', 11, '0.00', 475, '0.00', 1, 0, 177, 'Mr. Mavaram T. Patel & Mr. Khemraj Dalla', 'B103@gmail.com', '0.00', 24, NULL, 'B'),
(169, 104, 'f', 9867412542, '2019-08-06 06:00:50', '2019-08-06 06:13:49', 11, '-1350.00', 450, '0.00', 1, 1, 178, 'Mrs. Vaishali A. Hingu', 'B104@gmail.com', '0.00', 23, NULL, 'B'),
(170, 105, 'f', 9867412542, '2019-08-06 06:00:51', '2019-08-06 06:13:50', 11, '-1300.00', 450, '0.00', 0, 1, 179, 'Mrs. Beena M. Lakdawala', 'B105@gmail.com', '0.00', 23, NULL, 'B'),
(171, 201, 'f', 9867412542, '2019-08-06 06:00:51', '2019-08-22 06:00:59', 11, '0.00', 450, '2800.00', 0, 0, 180, 'Mr. Dineshchandra R Shah', 'B201@gmail.com', '900.00', 23, NULL, 'B'),
(172, 202, 't', 9867412542, '2019-08-06 06:00:51', '2019-08-06 06:25:05', 11, '0.00', 475, '0.00', 1, 0, 181, 'Mr. Palji P Waghela & Mrs. Pramila P Waghela', 'B202@gmail.com', '0.00', 24, NULL, 'B'),
(173, 203, 'f', 9867412542, '2019-08-06 06:00:51', '2019-08-06 06:25:05', 11, '0.00', 475, '0.00', 1, 0, 182, 'Mrs. Rajbala G. Daga', 'B203@gmail.com', '0.00', 24, NULL, 'B'),
(174, 204, 'f', 9867412542, '2019-08-06 06:00:51', '2019-08-06 06:25:05', 11, '0.00', 450, '0.00', 1, 0, 183, 'Mr. Harish G. Dave', 'B204@gmail.com', '0.00', 23, NULL, 'B'),
(175, 205, 'f', 9867412542, '2019-08-06 06:00:52', '2019-08-26 01:30:28', 11, '-0.50', 450, '7000.00', 0, 0, 184, 'Mrs. Pushpaben V. Shah', 'B205@gmail.com', '1900.00', 23, NULL, 'B'),
(223, 15, 'f', 9167546188, '2019-08-28 00:57:13', '2019-10-01 12:22:42', 4, '-1000.00', 0, '0.00', 0, 0, 233, 'Solar Marq Engineering LLP', 'rajiv.kint@gmail.com', '0.00', 29, NULL, 'Kini Arcade'),
(286, 1, 'f', 9082531945, '2019-08-29 23:56:08', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 296, 'HANUMAN DHONE', 'ekvira1@gmail.com', '0.00', 30, NULL, NULL),
(287, 3, 'f', 9594641904, '2019-08-29 23:56:08', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 297, 'MAYUR', 'ekvira3@gmail.com', '0.00', 30, NULL, NULL),
(288, 4, 'f', 9172625032, '2019-08-29 23:56:08', '2019-08-30 00:23:57', 16, '-350.00', 0, '0.00', 0, 0, 298, 'RAJESH AWAD', 'ekvira4@gmail.com', '0.00', 30, NULL, NULL),
(289, 5, 'f', 9082531945, '2019-08-29 23:56:09', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 299, 'HANUMAN DHONE', 'ekvira5@gmail.com', '0.00', 30, NULL, NULL),
(290, 6, 'f', 7620215266, '2019-08-29 23:56:09', '2019-08-30 00:23:57', 16, '-350.00', 0, '0.00', 0, 0, 300, 'SANTOSH', 'ekvira6@gmail.com', '0.00', 30, NULL, NULL),
(291, 7, 'f', 9326446896, '2019-08-29 23:56:09', '2019-08-30 00:23:57', 16, '-700.00', 0, '0.00', 0, 0, 301, 'PATEKAR', 'ekvira7@gmail.com', '0.00', 30, NULL, NULL),
(292, 8, 'f', 9082531945, '2019-08-29 23:56:09', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 302, 'HANUMAN DHONE', 'ekvira8@gmail.com', '0.00', 30, NULL, NULL),
(293, 101, 'f', 9702527472, '2019-08-29 23:56:09', '2019-08-30 00:23:57', 16, '-700.00', 0, '0.00', 0, 0, 303, 'PAWAR', 'ekvira101@gmail.com', '0.00', 30, NULL, NULL),
(294, 102, 'f', 9076643817, '2019-08-29 23:56:09', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 304, 'SATISH PAWSHE', 'ekvira102@gmail.com', '0.00', 30, NULL, NULL),
(295, 103, 'f', 810343748, '2019-08-29 23:56:10', '2019-08-30 00:23:57', 16, '-700.00', 0, '0.00', 0, 0, 305, 'UMAG', 'ekvira103@gmail.com', '0.00', 30, NULL, NULL),
(296, 104, 'f', 9702527472, '2019-08-29 23:56:10', '2019-08-30 00:23:57', 16, '-350.00', 0, '0.00', 0, 0, 306, 'ABC', 'ekvira104@gmail.com', '0.00', 30, NULL, NULL),
(297, 105, 'f', 9967421126, '2019-08-29 23:56:10', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 307, 'AVINASH MORE ', 'ekvira105@gmail.com', '0.00', 30, NULL, NULL),
(298, 106, 'f', 9594537052, '2019-08-29 23:56:10', '2019-08-30 00:23:57', 16, '-700.00', 0, '0.00', 0, 0, 308, 'MARUTI KURADE', 'ekvira106@gmail.com', '0.00', 30, NULL, NULL),
(299, 107, 'f', 8082134535, '2019-08-29 23:56:10', '2019-08-30 00:23:57', 16, '-700.00', 0, '0.00', 0, 0, 309, 'AVINASH ', 'ekvira107@gmail.com', '0.00', 30, NULL, NULL),
(300, 108, 'f', 9820455440, '2019-08-29 23:56:10', '2019-08-30 00:23:57', 16, '-700.00', 0, '0.00', 0, 0, 310, 'SANTOSH KULE', 'ekvira108@gmail.com', '0.00', 30, NULL, NULL),
(301, 201, 'f', 9082531945, '2019-08-29 23:56:11', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 311, 'HANUMAN DHONE', 'ekvira201@gmail.com', '0.00', 30, NULL, NULL),
(302, 202, 'f', 9082531945, '2019-08-29 23:56:11', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 312, 'HANUMAN DHONE', 'ekvira202@gmail.com', '0.00', 30, NULL, NULL),
(303, 203, 'f', 9594226961, '2019-08-29 23:56:11', '2019-08-30 00:23:57', 16, '-350.00', 0, '0.00', 0, 0, 313, 'BALKRUSHNA PATIL', 'ekvira203@gmail.com', '0.00', 30, NULL, NULL),
(304, 204, 'f', 9082531945, '2019-08-29 23:56:11', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 314, 'HANUMAN DHONE', 'ekvira204@gmail.com', '0.00', 30, NULL, NULL),
(305, 205, 'f', 9082531945, '2019-08-29 23:56:11', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 315, 'HANUMAN DHONE', 'ekvira205@gmail.com', '0.00', 30, NULL, NULL),
(306, 206, 'f', 9082531945, '2019-08-29 23:56:11', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 316, 'HANUMAN DHONE', 'ekvira206@gmail.com', '0.00', 30, NULL, NULL),
(307, 207, 'f', 9082531945, '2019-08-29 23:56:12', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 317, 'HANUMAN DHONE', 'ekvira207@gmail.com', '0.00', 30, NULL, NULL),
(308, 208, 'f', 9082531945, '2019-08-29 23:56:12', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 318, 'HANUMAN DHONE', 'ekvira208@gmail.com', '0.00', 30, NULL, NULL),
(309, 301, 'f', 9082531945, '2019-08-29 23:56:12', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 319, 'HANUMAN DHONE', 'ekvira301@gmail.com', '0.00', 30, NULL, NULL),
(310, 302, 'f', 7738257036, '2019-08-29 23:56:12', '2019-08-30 00:27:17', 16, '0.00', 0, '0.00', 0, 0, 320, 'THOBARE', 'ekvira302@gmail.com', '0.00', 30, NULL, NULL),
(311, 303, 'f', 8898115767, '2019-08-29 23:56:12', '2019-08-30 00:27:18', 16, '0.00', 0, '0.00', 0, 0, 321, 'MAYUR SHIRWARDKAR', 'ekvira303@gmail.com', '0.00', 30, NULL, NULL),
(312, 304, 'f', 9702527472, '2019-08-29 23:56:12', '2019-08-30 00:27:18', 16, '0.00', 0, '0.00', 0, 0, 322, 'DINESH SHIRGAONKAR', 'ekvira304@gmail.com', '0.00', 30, NULL, NULL),
(313, 305, 'f', 9082531945, '2019-08-29 23:56:13', '2019-08-30 00:27:18', 16, '0.00', 0, '0.00', 0, 0, 323, 'HANUMAN DHONE', 'ekvira305@gmail.com', '0.00', 30, NULL, NULL),
(314, 306, 'f', 9082531945, '2019-08-29 23:56:13', '2019-08-30 00:27:18', 16, '0.00', 0, '0.00', 0, 0, 324, 'HANUMAN DHONE', 'ekvira306@gmail.com', '0.00', 30, NULL, NULL),
(315, 307, 'f', 9082531945, '2019-08-29 23:56:13', '2019-08-30 00:27:18', 16, '0.00', 0, '0.00', 0, 0, 325, 'HANUMAN DHONE', 'ekvira307@gmail.com', '0.00', 30, NULL, NULL),
(316, 308, 'f', 9702527472, '2019-08-29 23:56:13', '2019-08-29 23:57:17', 16, '0.00', 0, '0.00', 0, 0, 326, 'RADNESH PAVSHE', 'ekvira308@gmail.com', '0.00', 31, NULL, NULL),
(378, 101, NULL, 7845120963, '2019-09-12 04:01:11', '2019-09-12 04:01:11', 25, '0.00', 750, '0.00', 1, 0, 389, 'Test 0', 'a101@gmail.com', '0.00', NULL, NULL, 'A'),
(379, 102, NULL, 7845120964, '2019-09-12 04:01:11', '2019-09-12 04:01:11', 25, '0.00', 450, '0.00', 0, 1, 390, 'Test1', 'a102@gmail.com', '0.00', NULL, NULL, 'A'),
(380, 103, NULL, 7845120965, '2019-09-12 04:01:11', '2019-09-12 04:01:12', 25, '0.00', 750, '0.00', 0, 0, 391, 'Test 2', 'a103@gmail.com', '0.00', NULL, NULL, 'A'),
(381, 104, NULL, 7845120966, '2019-09-12 04:01:12', '2019-09-12 04:01:12', 25, '0.00', 450, '0.00', 0, 0, 392, 'Test 3', 'a104@gmail.com', '0.00', NULL, NULL, 'A'),
(382, 105, NULL, 7845120967, '2019-09-12 04:01:12', '2019-09-12 04:01:12', 25, '0.00', 750, '0.00', 0, 0, 393, 'Test 4', 'a105@gmail.com', '0.00', NULL, NULL, 'A'),
(383, 201, NULL, 7845120968, '2019-09-12 04:01:12', '2019-09-12 04:01:12', 25, '0.00', 750, '0.00', 1, 0, 394, 'Test 5', 'a201@gmail.com', '0.00', NULL, NULL, 'A'),
(384, 202, NULL, 7845120969, '2019-09-12 04:01:12', '2019-09-12 04:01:12', 25, '0.00', 450, '0.00', 0, 2, 395, 'Test 6', 'a202@gmail.com', '0.00', NULL, NULL, 'A'),
(385, 203, NULL, 7845120970, '2019-09-12 04:01:12', '2019-09-12 04:01:12', 25, '0.00', 750, '0.00', 1, 0, 396, 'Test 7', 'a203@gmail.com', '0.00', NULL, NULL, 'A'),
(386, 204, NULL, 7845120971, '2019-09-12 04:01:12', '2019-09-12 04:01:13', 25, '0.00', 450, '0.00', 0, 1, 397, 'Test 8', 'a204@gmail.com', '0.00', NULL, NULL, 'A'),
(387, 205, NULL, 7845120972, '2019-09-12 04:01:13', '2019-09-12 04:01:13', 25, '0.00', 750, '0.00', 0, 0, 398, 'Test 9', 'a205@gmail.com', '0.00', NULL, NULL, 'A'),
(388, 4, 'f', 9765752786, '2019-10-01 12:25:15', '2019-10-01 13:06:02', 4, '0.00', 0, '0.00', 0, 0, 399, 'MTG Travel Pvt Ltd', 'm.soni@mtgglobaltravelservices.com', '0.00', 49, NULL, 'Kini Arcade'),
(389, 10, 'f', 9167546188, '2019-10-01 12:26:53', '2019-10-01 13:06:02', 4, '0.00', 0, '0.00', 0, 0, 400, 'Solarmarq Engineering LLP', 'rajiv.knit09@gmail.com', '0.00', 50, NULL, 'Kini Arcade'),
(390, 15, 'f', 7218088901, '2019-10-01 12:31:52', '2019-10-01 13:06:02', 4, '0.00', 0, '0.00', 0, 0, 401, 'Sharda Enterprise', 'prakashrawal.2008@rediffmail.com', '0.00', 51, NULL, 'Kini Arcade'),
(391, 16, 'f', 9503096512, '2019-10-01 12:32:33', '2019-10-01 13:06:02', 4, '0.00', 0, '0.00', 0, 0, 402, 'Techorbit Soft Systems Pvt LTD', 'valentin@techorbit.com', '0.00', 52, NULL, 'Kini Arcade'),
(392, 17, 'f', 9867884422, '2019-10-01 12:50:40', '2019-10-01 13:06:02', 4, '0.00', 0, '0.00', 0, 0, 403, 'Test ID', 'jignesh@paynetpayments.com', '0.00', 52, NULL, 'Kini Arcade'),
(393, 20, 'f', 7768024707, '2019-10-01 13:02:14', '2019-10-01 13:06:02', 4, '0.00', 0, '0.00', 0, 0, 404, 'Test2', 'test@test.com', '0.00', 16, NULL, 'Kini Arcade');

-- --------------------------------------------------------

--
-- Table structure for table `member_plans`
--

DROP TABLE IF EXISTS `member_plans`;
CREATE TABLE IF NOT EXISTS `member_plans` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parking_charges`
--

DROP TABLE IF EXISTS `parking_charges`;
CREATE TABLE IF NOT EXISTS `parking_charges` (
  `id` int(11) NOT NULL,
  `member_two_wheeler` decimal(10,2) DEFAULT NULL,
  `tenant_two_wheeler` decimal(10,2) DEFAULT NULL,
  `member_four_wheeler` decimal(10,2) DEFAULT NULL,
  `tenant_four_wheeler` decimal(10,2) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_charges`
--

INSERT INTO `parking_charges` (`id`, `member_two_wheeler`, `tenant_two_wheeler`, `member_four_wheeler`, `tenant_four_wheeler`, `society_id`, `created_at`, `updated_at`) VALUES
(9, '50.00', '75.00', '100.00', '150.00', 11, '2019-08-06 06:01:24', '2019-08-06 06:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
  `arrears` decimal(15,2) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `cheque_no` bigint(20) DEFAULT NULL,
  `is_cash` varchar(5) DEFAULT NULL,
  `is_arrears` varchar(5) DEFAULT NULL,
  `is_credit_note` varchar(5) DEFAULT NULL,
  `is_debit_note` varchar(5) DEFAULT NULL,
  `is_reversal` varchar(5) DEFAULT NULL,
  `depositor_bank` varchar(255) DEFAULT NULL,
  `receipt_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_date`, `due_date`, `narration`, `credit`, `debit`, `balance`, `paid_by`, `details`, `status`, `created_at`, `updated_at`, `member_id`, `society_id`, `arrears`, `bill_id`, `bank_id`, `cheque_no`, `is_cash`, `is_arrears`, `is_credit_note`, `is_debit_note`, `is_reversal`, `depositor_bank`, `receipt_id`) VALUES
(244, '2019-10-01 19:21:38', '2019-08-05', 'May Bill', '15000.00', NULL, '15000.00', NULL, NULL, NULL, '2019-07-30 08:14:58', '2019-07-30 08:14:58', 130, 7, '0.00', 161, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(245, '2019-10-01 19:21:38', '2019-08-05', 'May Bill', '15000.00', NULL, '15000.00', NULL, NULL, NULL, '2019-07-30 08:14:58', '2019-07-30 08:14:58', 131, 7, '0.00', 162, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(246, '2019-10-01 19:21:38', '2019-08-05', 'May Bill', '15000.00', NULL, '15000.00', NULL, NULL, NULL, '2019-07-30 08:14:58', '2019-07-30 08:14:58', 132, 7, '0.00', 163, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(247, '2019-10-01 19:21:38', '2019-08-05', 'May Bill', '15000.00', NULL, '15000.00', NULL, NULL, NULL, '2019-07-30 08:14:58', '2019-07-30 08:14:58', 133, 7, '0.00', 164, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(248, '2019-10-01 19:21:38', '2019-08-05', 'May Bill', '15000.00', NULL, '15000.00', NULL, NULL, NULL, '2019-07-30 08:14:58', '2019-07-30 08:14:58', 134, 7, '0.00', 165, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(277, '2019-10-01 19:21:39', '2019-08-05', 'August Bill', '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-08-01 03:26:21', '2019-08-01 03:26:21', 119, 4, '0.00', 190, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(278, '2019-10-01 19:21:40', '2019-08-05', 'August Bill', '18014.00', NULL, '18014.00', NULL, NULL, NULL, '2019-08-01 03:26:21', '2019-08-06 05:23:30', 102, 4, '0.00', 191, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(279, '2019-10-01 19:21:39', '2019-08-05', 'August Bill', '22000.00', NULL, '22000.00', NULL, NULL, NULL, '2019-08-01 03:26:21', '2019-08-01 03:26:21', 103, 4, '0.00', 192, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(280, '2019-10-01 19:21:39', '2019-08-05', 'August Bill', '12000.00', NULL, '12000.00', NULL, NULL, NULL, '2019-08-01 03:26:21', '2019-08-01 03:26:21', 104, 4, '0.00', 193, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(282, '2019-10-01 19:21:39', '2019-08-05', 'August Bill', '22000.00', NULL, '22000.00', NULL, NULL, NULL, '2019-08-01 03:26:22', '2019-08-01 03:26:22', 106, 4, '0.00', 195, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(283, '2019-10-01 19:21:39', '2019-08-05', 'August Bill', '22000.00', NULL, '22000.00', NULL, NULL, NULL, '2019-08-01 03:26:22', '2019-08-01 03:26:22', 107, 4, '0.00', 196, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(284, '2019-10-01 19:21:39', '2019-08-05', 'August Bill', '20000.00', NULL, '20000.00', NULL, NULL, NULL, '2019-08-01 03:26:22', '2019-08-01 03:26:22', 108, 4, '0.00', 197, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(285, '2019-10-01 19:21:39', '2019-08-05', 'August Bill', '9000.00', NULL, '9000.00', NULL, NULL, NULL, '2019-08-01 03:26:22', '2019-08-01 03:26:22', 109, 4, '0.00', 198, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(286, '2019-10-01 19:21:39', '2019-08-05', 'August Bill', '20000.00', NULL, '20000.00', NULL, NULL, NULL, '2019-08-01 03:26:22', '2019-08-01 03:26:22', 110, 4, '0.00', 199, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(288, '2019-10-01 19:21:39', '2019-08-05', 'August Bill', '5000.00', NULL, '5000.00', NULL, NULL, NULL, '2019-08-01 03:26:22', '2019-08-01 03:26:22', 112, 4, '0.00', 201, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(289, '2019-10-01 19:21:39', '2019-08-05', 'August Bill', '5000.00', NULL, '5000.00', NULL, NULL, NULL, '2019-08-01 03:26:22', '2019-08-01 03:26:22', 113, 4, '0.00', 202, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(290, '2019-10-01 19:21:39', '2019-08-05', 'August Bill', '5000.00', NULL, '5000.00', NULL, NULL, NULL, '2019-08-01 03:26:22', '2019-08-01 03:26:22', 114, 4, '0.00', 203, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(291, '2019-10-01 19:21:39', '2019-08-05', 'August Bill', '3500.00', NULL, '3500.00', NULL, NULL, NULL, '2019-08-01 03:26:22', '2019-08-01 03:26:22', 145, 4, '0.00', 204, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(292, '2019-07-31 13:00:00', NULL, 'Payment Received', NULL, '3500.00', '0.00', 'cash', NULL, NULL, '2019-08-01 03:30:02', '2019-08-01 03:30:02', 145, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 1),
(295, '2019-07-31 13:00:00', NULL, 'Tea & Unlimited Coffee', '2060.00', NULL, '2060.00', NULL, NULL, NULL, '2019-08-01 04:38:57', '2019-08-06 05:23:30', 102, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(296, '2019-07-31 13:00:00', NULL, 'Tea & Unlimited Coffee', '450.00', NULL, '22450.00', NULL, NULL, NULL, '2019-08-01 04:41:04', '2019-08-01 04:41:04', 103, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(297, '2019-07-31 13:00:00', NULL, 'Payment Received', NULL, '22000.00', '450.00', 'cheque', NULL, NULL, '2019-08-01 04:42:16', '2019-08-01 04:42:16', 103, 4, '0.00', NULL, 4, 1, 'f', 'f', 'f', 'f', 'f', 'NA', 2),
(298, '2019-07-31 13:00:00', NULL, 'Tea & Coffee', '650.00', NULL, '20650.00', NULL, NULL, NULL, '2019-08-01 04:43:33', '2019-08-01 04:43:33', 108, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(299, '2019-07-31 13:00:00', NULL, 'Tea & Coffee (Client)', '380.00', NULL, '22380.00', NULL, NULL, NULL, '2019-08-01 04:44:37', '2019-08-01 04:44:37', 107, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(300, '2019-07-31 13:00:00', NULL, 'Tea & Coffee', '1640.00', NULL, '13640.00', NULL, NULL, NULL, '2019-08-01 04:45:17', '2019-08-01 04:45:17', 104, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(301, '2019-07-31 13:00:00', NULL, 'Unlimited coffee', '500.00', NULL, '22500.00', NULL, NULL, NULL, '2019-08-01 04:46:10', '2019-08-01 04:46:10', 106, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(302, '2019-07-31 13:00:00', NULL, 'Tea & Coffee (Client)', '900.00', NULL, '20900.00', NULL, NULL, NULL, '2019-08-01 04:46:51', '2019-08-01 04:46:51', 110, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(304, '2019-07-31 13:00:00', NULL, 'Payment Received', NULL, '450.00', '0.00', 'neft', NULL, NULL, '2019-08-01 05:07:10', '2019-08-01 05:07:10', 103, 4, '0.00', NULL, 4, 1, 'f', 'f', 'f', 'f', 'f', 'GPAY', 3),
(326, '2019-08-04 13:00:00', NULL, 'Print outs for the month of July (B&W 68 / Color 6)', '400.00', NULL, '18414.00', NULL, NULL, NULL, '2019-08-02 07:38:22', '2019-08-06 05:23:30', 102, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(327, '2019-05-07 13:00:00', NULL, 'Print outs for the month of July (Color 4)', '40.00', NULL, '20690.00', NULL, NULL, NULL, '2019-08-02 07:39:01', '2019-08-02 07:39:01', 108, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(328, '2019-05-07 13:00:00', NULL, 'Print outs for the month of July (B&W 1)', '5.00', NULL, '22385.00', NULL, NULL, NULL, '2019-08-02 07:39:30', '2019-08-02 07:39:30', 107, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(329, '2019-03-07 13:00:00', NULL, 'Payment Received', NULL, '12000.00', '1640.00', 'cash', NULL, NULL, '2019-08-03 02:07:18', '2019-08-03 02:07:18', 104, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 4),
(330, '2019-08-02 13:00:00', NULL, 'Payment Received', NULL, '1640.00', '0.00', 'cash', NULL, NULL, '2019-08-03 02:07:49', '2019-08-03 02:07:49', 104, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 5),
(331, '2019-05-07 13:00:00', NULL, 'Payment Received', NULL, '2046.00', '0.00', 'cheque', NULL, NULL, '2019-08-06 05:23:08', '2019-08-06 05:23:30', 102, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'IDBI', 6),
(332, '2019-05-07 13:00:00', NULL, 'Payment Received', NULL, '18414.00', '0.00', 'cheque', NULL, NULL, '2019-08-06 05:24:57', '2019-08-06 05:24:57', 102, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'IDBI', 7),
(334, '2019-05-07 13:00:00', NULL, 'Payment Received', NULL, '22385.00', '0.00', 'neft', NULL, NULL, '2019-08-06 05:26:42', '2019-08-06 05:26:42', 107, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'NA', 9),
(335, '2019-05-07 13:00:00', NULL, 'Payment Received', NULL, '22500.00', '0.00', 'cheque', NULL, NULL, '2019-08-06 05:27:17', '2019-08-06 05:27:17', 106, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'NA', 10),
(336, '2019-03-07 13:00:00', NULL, 'Payment Received', NULL, '5000.00', '0.00', 'neft', NULL, NULL, '2019-08-06 05:28:19', '2019-08-06 05:28:19', 113, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'NA', 11),
(337, '2019-03-07 13:00:00', NULL, 'Payment Received', NULL, '5000.00', '0.00', 'neft', NULL, NULL, '2019-08-06 05:28:55', '2019-08-06 05:28:55', 114, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'NA', 12),
(338, '2019-10-01 19:21:40', NULL, 'Arrears Transfer', '3700.00', NULL, '3700.00', NULL, NULL, NULL, '2019-08-06 06:00:51', '2019-08-06 06:00:51', 171, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(339, '2019-10-01 19:21:40', NULL, 'Arrears Transfer', '8900.00', NULL, '8900.00', NULL, NULL, NULL, '2019-08-06 06:00:52', '2019-08-06 06:00:52', 175, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(340, '2019-10-01 19:21:42', '2019-08-20', 'August Bill', '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-27 03:21:44', 156, 11, '0.00', 220, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(341, '2019-10-01 19:21:40', '2019-08-20', 'August Bill', '1487.50', NULL, '1487.50', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 157, 11, '0.00', 221, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(342, '2019-10-01 19:21:40', '2019-08-20', 'August Bill', '1537.50', NULL, '1537.50', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 158, 11, '0.00', 222, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(343, '2019-10-01 19:21:40', '2019-08-20', 'August Bill', '1200.00', NULL, '1200.00', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 159, 11, '0.00', 223, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(344, '2019-10-01 19:21:40', '2019-08-20', 'August Bill', '1200.00', NULL, '1200.00', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 160, 11, '0.00', 224, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(345, '2019-10-01 19:21:40', '2019-08-20', 'August Bill', '1800.00', NULL, '1800.00', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 161, 11, '0.00', 225, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(346, '2019-10-01 19:21:40', '2019-08-20', 'August Bill', '1962.50', NULL, '1962.50', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 162, 11, '0.00', 226, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(347, '2019-10-01 19:21:40', '2019-08-20', 'August Bill', '1587.50', NULL, '1587.50', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 163, 11, '0.00', 227, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(348, '2019-10-01 19:21:40', '2019-08-20', 'August Bill', '1650.00', NULL, '1650.00', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 164, 11, '0.00', 228, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(349, '2019-10-01 19:21:40', '2019-08-20', 'August Bill', '1200.00', NULL, '1200.00', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 165, 11, '0.00', 229, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(350, '2019-10-01 19:21:40', '2019-08-20', 'August Bill', '1200.00', NULL, '1200.00', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 166, 11, '0.00', 230, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(351, '2019-10-01 19:21:40', '2019-08-20', 'August Bill', '2037.50', NULL, '2037.50', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 167, 11, '0.00', 231, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(352, '2019-10-01 19:21:41', '2019-08-20', 'August Bill', '1537.50', NULL, '1537.50', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 168, 11, '0.00', 232, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(353, '2019-10-01 19:21:41', '2019-08-20', 'August Bill', '1350.00', NULL, '1350.00', NULL, NULL, NULL, '2019-08-06 06:13:49', '2019-08-06 06:13:49', 169, 11, '0.00', 233, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(354, '2019-10-01 19:21:41', '2019-08-20', 'August Bill', '1300.00', NULL, '1300.00', NULL, NULL, NULL, '2019-08-06 06:13:50', '2019-08-06 06:13:50', 170, 11, '0.00', 234, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(355, '2019-10-01 19:21:41', '2019-08-20', 'August Bill', '4949.00', NULL, '1249.00', NULL, NULL, NULL, '2019-08-06 06:13:50', '2019-08-06 06:13:50', 171, 11, '0.00', 235, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(356, '2019-10-01 19:21:41', '2019-08-20', 'August Bill', '2037.50', NULL, '2037.50', NULL, NULL, NULL, '2019-08-06 06:13:50', '2019-08-06 06:13:50', 172, 11, '0.00', 236, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(357, '2019-10-01 19:21:41', '2019-08-20', 'August Bill', '1537.50', NULL, '1537.50', NULL, NULL, NULL, '2019-08-06 06:13:50', '2019-08-06 06:13:50', 173, 11, '0.00', 237, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(358, '2019-10-01 19:21:41', '2019-08-20', 'August Bill', '1250.00', NULL, '1250.00', NULL, NULL, NULL, '2019-08-06 06:13:50', '2019-08-06 06:13:50', 174, 11, '0.00', 238, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(359, '2019-10-01 19:21:41', '2019-08-20', 'August Bill', '10222.50', NULL, '1322.50', NULL, NULL, NULL, '2019-08-06 06:13:50', '2019-08-06 06:13:50', 175, 11, '0.00', 239, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(360, '2019-07-09 13:00:00', NULL, 'Payment Received', NULL, '1200.00', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 156, 11, '0.00', NULL, 11, 451789, 'f', 'f', 'f', 'f', 'f', 'ICICI', 1),
(361, '2019-10-01 19:21:36', NULL, 'Interest Paid', NULL, '0.00', '1200.00', NULL, NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 156, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(362, '2019-10-01 19:21:36', NULL, 'Arrears Paid', NULL, '0.00', '1200.00', NULL, NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 156, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(363, '2019-10-01 19:21:36', NULL, 'Bill Paid', NULL, '1200.00', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 156, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(364, '2019-07-10 13:00:00', NULL, 'Payment Received', NULL, '1487.50', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 157, 11, '0.00', NULL, 11, 145784, 'f', 'f', 'f', 'f', 'f', 'SBI', 2),
(365, '2019-10-01 19:21:36', NULL, 'Interest Paid', NULL, '0.00', '1487.50', NULL, NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 157, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(366, '2019-10-01 19:21:36', NULL, 'Arrears Paid', NULL, '0.00', '1487.50', NULL, NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 157, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(367, '2019-10-01 19:21:36', NULL, 'Bill Paid', NULL, '1487.50', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 157, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(368, '2019-07-10 13:00:00', NULL, 'Payment Received', NULL, '1537.50', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 158, 11, '0.00', NULL, 11, 145475, 'f', 'f', 'f', 'f', 'f', 'Kotak', 3),
(369, '2019-10-01 19:21:37', NULL, 'Interest Paid', NULL, '0.00', '1537.50', NULL, NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 158, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(370, '2019-10-01 19:21:37', NULL, 'Arrears Paid', NULL, '0.00', '1537.50', NULL, NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 158, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(371, '2019-10-01 19:21:37', NULL, 'Bill Paid', NULL, '1537.50', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 158, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(372, '2019-07-10 13:00:00', NULL, 'Payment Received', NULL, '1200.00', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 159, 11, '0.00', NULL, 11, 451789, 'f', 'f', 'f', 'f', 'f', 'SBI', 4),
(373, '2019-10-01 19:21:37', NULL, 'Interest Paid', NULL, '0.00', '1200.00', NULL, NULL, NULL, '2019-08-06 06:25:03', '2019-08-06 06:25:03', 159, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(374, '2019-10-01 19:21:37', NULL, 'Arrears Paid', NULL, '0.00', '1200.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 159, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(375, '2019-10-01 19:21:37', NULL, 'Bill Paid', NULL, '1200.00', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 159, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(376, '2019-07-10 13:00:00', NULL, 'Payment Received', NULL, '1200.00', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 160, 11, '0.00', NULL, 11, 145784, 'f', 'f', 'f', 'f', 'f', 'SBI', 5),
(377, '2019-10-01 19:21:37', NULL, 'Interest Paid', NULL, '0.00', '1200.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 160, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(378, '2019-10-01 19:21:37', NULL, 'Arrears Paid', NULL, '0.00', '1200.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 160, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(379, '2019-10-01 19:21:37', NULL, 'Bill Paid', NULL, '1200.00', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 160, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(380, '2019-07-10 13:00:00', NULL, 'Payment Received', NULL, '1800.00', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 161, 11, '0.00', NULL, 11, 145475, 'f', 'f', 'f', 'f', 'f', 'SBI', 6),
(381, '2019-10-01 19:21:37', NULL, 'Interest Paid', NULL, '0.00', '1800.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 161, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(382, '2019-10-01 19:21:37', NULL, 'Arrears Paid', NULL, '0.00', '1800.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 161, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(383, '2019-10-01 19:21:37', NULL, 'Bill Paid', NULL, '1800.00', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 161, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(384, '2019-07-13 13:00:00', NULL, 'Payment Received', NULL, '1962.50', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 162, 11, '0.00', NULL, 11, 145475, 'f', 'f', 'f', 'f', 'f', 'SBI', 7),
(385, '2019-10-01 19:21:37', NULL, 'Interest Paid', NULL, '0.00', '1962.50', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 162, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(386, '2019-10-01 19:21:37', NULL, 'Arrears Paid', NULL, '0.00', '1962.50', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 162, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(387, '2019-10-01 19:21:38', NULL, 'Bill Paid', NULL, '1962.50', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 162, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(388, '2019-07-13 13:00:00', NULL, 'Payment Received', NULL, '1587.50', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 163, 11, '0.00', NULL, 11, 154482, 'f', 'f', 'f', 'f', 'f', 'ICICI', 8),
(389, '2019-10-01 19:21:38', NULL, 'Interest Paid', NULL, '0.00', '1587.50', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 163, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(390, '2019-10-01 19:21:38', NULL, 'Arrears Paid', NULL, '0.00', '1587.50', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 163, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(391, '2019-10-01 19:21:38', NULL, 'Bill Paid', NULL, '1587.50', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 163, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(392, '2019-07-13 13:00:00', NULL, 'Payment Received', NULL, '1650.00', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 164, 11, '0.00', NULL, 11, 154482, 'f', 'f', 'f', 'f', 'f', 'ICICI', 9),
(393, '2019-10-01 19:21:38', NULL, 'Interest Paid', NULL, '0.00', '1650.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 164, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(394, '2019-10-01 19:21:38', NULL, 'Arrears Paid', NULL, '0.00', '1650.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 164, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(395, '2019-10-01 19:21:38', NULL, 'Bill Paid', NULL, '1650.00', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 164, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(396, '2019-07-13 13:00:00', NULL, 'Payment Received', NULL, '1200.00', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 165, 11, '0.00', NULL, 11, 154482, 'f', 'f', 'f', 'f', 'f', 'Kotak', 10),
(397, '2019-10-01 19:21:38', NULL, 'Interest Paid', NULL, '0.00', '1200.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 165, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(398, '2019-10-01 19:21:38', NULL, 'Arrears Paid', NULL, '0.00', '1200.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 165, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(399, '2019-10-01 19:21:38', NULL, 'Bill Paid', NULL, '1200.00', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 165, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(400, '2019-07-13 13:00:00', NULL, 'Payment Received', NULL, '1200.00', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 166, 11, '0.00', NULL, 11, 154482, 'f', 'f', 'f', 'f', 'f', 'Kotak', 11),
(401, '2019-10-01 19:21:38', NULL, 'Interest Paid', NULL, '0.00', '1200.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 166, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(402, '2019-10-01 19:21:38', NULL, 'Arrears Paid', NULL, '0.00', '1200.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 166, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(403, '2019-10-01 19:21:38', NULL, 'Bill Paid', NULL, '1200.00', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 166, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(404, '2019-07-19 13:00:00', NULL, 'Payment Received', NULL, '2037.50', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 167, 11, '0.00', NULL, 11, 154482, 'f', 'f', 'f', 'f', 'f', 'Kotak', 12),
(405, '2019-10-01 19:21:38', NULL, 'Interest Paid', NULL, '0.00', '2037.50', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 167, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(406, '2019-10-01 19:21:38', NULL, 'Arrears Paid', NULL, '0.00', '2037.50', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 167, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(407, '2019-10-01 19:21:39', NULL, 'Bill Paid', NULL, '2037.50', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 167, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(408, '2019-07-19 13:00:00', NULL, 'Payment Received', NULL, '1537.50', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 168, 11, '0.00', NULL, 11, 154482, 'f', 'f', 'f', 'f', 'f', 'SBI', 13),
(409, '2019-10-01 19:21:39', NULL, 'Interest Paid', NULL, '0.00', '1537.50', NULL, NULL, NULL, '2019-08-06 06:25:04', '2019-08-06 06:25:04', 168, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(410, '2019-10-01 19:21:39', NULL, 'Arrears Paid', NULL, '0.00', '1537.50', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 168, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(411, '2019-10-01 19:21:39', NULL, 'Bill Paid', NULL, '1537.50', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 168, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(412, '2019-07-19 13:00:00', NULL, 'Payment Received', NULL, '3700.00', '1249.00', 'cheque', NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 171, 11, '0.00', NULL, 11, 154482, 'f', 'f', 'f', 'f', 'f', 'SBI', 14),
(413, '2019-10-01 19:21:39', NULL, 'Interest Paid', NULL, '949.00', '4000.00', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 171, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(414, '2019-10-01 19:21:39', NULL, 'Amount Recieved', NULL, '2751.00', '1249.00', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 171, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(415, '2019-07-19 13:00:00', NULL, 'Payment Received', NULL, '2037.50', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 172, 11, '0.00', NULL, 11, 154482, 'f', 'f', 'f', 'f', 'f', 'SBI', 15),
(416, '2019-10-01 19:21:41', NULL, 'Interest Paid', NULL, '0.00', '2037.50', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 172, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(417, '2019-10-01 19:21:41', NULL, 'Arrears Paid', NULL, '0.00', '2037.50', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 172, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(418, '2019-10-01 19:21:41', NULL, 'Bill Paid', NULL, '2037.50', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 172, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(419, '2019-07-19 13:00:00', NULL, 'Payment Received', NULL, '1537.50', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 173, 11, '0.00', NULL, 11, 154482, 'f', 'f', 'f', 'f', 'f', 'SBI', 16),
(420, '2019-10-01 19:21:41', NULL, 'Interest Paid', NULL, '0.00', '1537.50', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 173, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(421, '2019-10-01 19:21:41', NULL, 'Arrears Paid', NULL, '0.00', '1537.50', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 173, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(422, '2019-10-01 19:21:41', NULL, 'Bill Paid', NULL, '1537.50', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 173, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(423, '2019-07-24 13:00:00', NULL, 'Payment Received', NULL, '1250.00', '0.00', 'cheque', NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 174, 11, '0.00', NULL, 11, 154482, 'f', 'f', 'f', 'f', 'f', 'SBI', 17),
(424, '2019-10-01 19:21:41', NULL, 'Interest Paid', NULL, '0.00', '1250.00', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 174, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(425, '2019-10-01 19:21:41', NULL, 'Arrears Paid', NULL, '0.00', '1250.00', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 174, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(426, '2019-10-01 19:21:41', NULL, 'Bill Paid', NULL, '1250.00', '0.00', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 174, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(427, '2019-07-24 13:00:00', NULL, 'Payment Received', NULL, '7000.00', '3222.50', 'cheque', NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 175, 11, '0.00', NULL, 11, 154482, 'f', 'f', 'f', 'f', 'f', 'SBI', 18),
(428, '2019-10-01 19:21:42', NULL, 'Interest Paid', NULL, '2022.00', '8200.50', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 175, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(429, '2019-10-01 19:21:42', NULL, 'Amount Recieved', NULL, '4978.00', '3222.50', NULL, NULL, NULL, '2019-08-06 06:25:05', '2019-08-06 06:25:05', 175, 11, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(430, '2019-08-08 13:00:00', NULL, 'Payment Received', NULL, '20650.00', '40.00', 'cheque', NULL, NULL, '2019-08-12 21:56:45', '2019-08-12 21:56:45', 108, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'Kotak Bank', 13),
(432, '2019-08-13 13:00:00', NULL, 'Payment Received', NULL, '9000.00', '0.00', 'neft', NULL, NULL, '2019-08-16 06:25:59', '2019-08-16 06:25:59', 109, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'NEFT', 15),
(433, '2019-08-15 13:00:00', NULL, 'Payment Received', NULL, '5000.00', '0.00', 'neft', NULL, NULL, '2019-08-16 23:34:14', '2019-08-16 23:34:14', 112, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'NEFT', 16),
(489, '2019-08-21 13:00:00', NULL, 'Payment Received', NULL, '1249.00', '0.00', 'cheque', NULL, NULL, '2019-08-22 06:00:59', '2019-08-22 06:00:59', 171, 11, '0.00', NULL, 11, 123456, 'f', 'f', 'f', 'f', 'f', 'SBI', 19),
(497, '2019-08-25 13:00:00', NULL, 'Payment Received', NULL, '3222.00', '0.50', 'cash', NULL, NULL, '2019-08-26 01:30:28', '2019-08-26 01:30:28', 175, 11, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 20),
(529, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 286, 16, '0.00', 303, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(530, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 287, 16, '0.00', 304, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(531, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 288, 16, '0.00', 305, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(532, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 289, 16, '0.00', 306, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(533, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 290, 16, '0.00', 307, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(534, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 291, 16, '0.00', 308, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(535, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 292, 16, '0.00', 309, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(536, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 293, 16, '0.00', 310, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(537, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 294, 16, '0.00', 311, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(538, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 295, 16, '0.00', 312, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(539, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 296, 16, '0.00', 313, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(540, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 297, 16, '0.00', 314, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(541, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 298, 16, '0.00', 315, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(542, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 299, 16, '0.00', 316, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(543, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 300, 16, '0.00', 317, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(544, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 301, 16, '0.00', 318, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(545, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 302, 16, '0.00', 319, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(546, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 303, 16, '0.00', 320, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(547, '2019-10-01 19:21:42', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 304, 16, '0.00', 321, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(548, '2019-10-01 19:21:43', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 305, 16, '0.00', 322, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(549, '2019-10-01 19:21:43', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 306, 16, '0.00', 323, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(550, '2019-10-01 19:21:43', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 307, 16, '0.00', 324, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(551, '2019-10-01 19:21:43', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 308, 16, '0.00', 325, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(552, '2019-10-01 19:21:43', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:47', '2019-08-29 23:58:47', 309, 16, '0.00', 326, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(553, '2019-10-01 19:21:43', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:48', '2019-08-29 23:58:48', 310, 16, '0.00', 327, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(554, '2019-10-01 19:21:43', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:48', '2019-08-29 23:58:48', 311, 16, '0.00', 328, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(555, '2019-10-01 19:21:43', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:48', '2019-08-29 23:58:48', 312, 16, '0.00', 329, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(556, '2019-10-01 19:21:43', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:48', '2019-08-29 23:58:48', 313, 16, '0.00', 330, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(557, '2019-10-01 19:21:43', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:48', '2019-08-29 23:58:48', 314, 16, '0.00', 331, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(558, '2019-10-01 19:21:43', '2019-02-10', 'January Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-29 23:58:48', '2019-08-29 23:58:48', 315, 16, '0.00', 332, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(559, '2019-10-01 19:21:43', '2019-02-10', 'January Bill', '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-08-29 23:58:48', '2019-08-29 23:58:48', 316, 16, '0.00', 333, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(560, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 286, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 1),
(561, '2019-10-01 19:21:44', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 286, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(562, '2019-10-01 19:21:44', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 286, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(563, '2019-10-01 19:21:44', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 286, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(564, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 287, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 2),
(565, '2019-10-01 19:21:44', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 287, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(566, '2019-10-01 19:21:44', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 287, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(567, '2019-10-01 19:21:44', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 287, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(568, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 288, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 3),
(569, '2019-10-01 19:21:44', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 288, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(570, '2019-10-01 19:21:44', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 288, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(571, '2019-10-01 19:21:44', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 288, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(572, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 289, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 4),
(573, '2019-10-01 19:21:44', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 289, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(574, '2019-10-01 19:21:44', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 289, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(575, '2019-10-01 19:21:45', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 289, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(576, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 290, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 5),
(577, '2019-10-01 19:21:45', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 290, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(578, '2019-10-01 19:21:45', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 290, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(579, '2019-10-01 19:21:46', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 290, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(580, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 292, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 6),
(581, '2019-10-01 19:21:46', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 292, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(582, '2019-10-01 19:21:46', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 292, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(583, '2019-10-01 19:21:46', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 292, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(584, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 294, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 7),
(585, '2019-10-01 19:21:46', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 294, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(586, '2019-10-01 19:21:46', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 294, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(587, '2019-10-01 19:21:46', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 294, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(588, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 296, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 8),
(589, '2019-10-01 19:21:47', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 296, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(590, '2019-10-01 19:21:47', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 296, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(591, '2019-10-01 19:21:47', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:27', '2019-08-30 00:01:27', 296, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(592, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 297, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 9),
(593, '2019-10-01 19:21:47', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 297, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(594, '2019-10-01 19:21:47', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 297, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(595, '2019-10-01 19:21:47', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 297, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(596, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 301, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 10),
(597, '2019-10-01 19:21:47', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 301, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(598, '2019-10-01 19:21:47', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 301, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(599, '2019-10-01 19:21:47', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 301, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(600, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 302, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 11),
(601, '2019-10-01 19:21:47', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 302, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(602, '2019-10-01 19:21:47', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 302, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(603, '2019-10-01 19:21:47', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 302, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(604, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 303, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 12),
(605, '2019-10-01 19:21:47', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 303, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(606, '2019-10-01 19:21:47', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 303, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(607, '2019-10-01 19:21:47', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 303, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(608, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 304, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 13),
(609, '2019-10-01 19:21:47', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 304, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(610, '2019-10-01 19:21:48', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 304, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(611, '2019-10-01 19:21:48', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 304, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(612, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 305, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 14),
(613, '2019-10-01 19:21:48', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 305, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(614, '2019-10-01 19:21:48', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 305, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(615, '2019-10-01 19:21:48', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 305, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(616, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 306, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 15),
(617, '2019-10-01 19:21:48', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 306, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(618, '2019-10-01 19:21:48', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 306, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(619, '2019-10-01 19:21:48', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 306, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(620, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 307, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 16),
(621, '2019-10-01 19:21:48', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 307, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(622, '2019-10-01 19:21:48', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 307, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(623, '2019-10-01 19:21:48', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 307, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL);
INSERT INTO `payments` (`id`, `payment_date`, `due_date`, `narration`, `credit`, `debit`, `balance`, `paid_by`, `details`, `status`, `created_at`, `updated_at`, `member_id`, `society_id`, `arrears`, `bill_id`, `bank_id`, `cheque_no`, `is_cash`, `is_arrears`, `is_credit_note`, `is_debit_note`, `is_reversal`, `depositor_bank`, `receipt_id`) VALUES
(624, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 308, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 17),
(625, '2019-10-01 19:21:48', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 308, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(626, '2019-10-01 19:21:48', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 308, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(627, '2019-10-01 19:21:48', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 308, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(628, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 309, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 18),
(629, '2019-10-01 19:21:49', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 309, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(630, '2019-10-01 19:21:49', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 309, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(631, '2019-10-01 19:21:49', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 309, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(632, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 310, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 19),
(633, '2019-10-01 19:21:49', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 310, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(634, '2019-10-01 19:21:50', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 310, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(635, '2019-10-01 19:21:50', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 310, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(636, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 311, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 20),
(637, '2019-10-01 19:21:50', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 311, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(638, '2019-10-01 19:21:51', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 311, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(639, '2019-10-01 19:21:51', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 311, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(640, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 312, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 21),
(641, '2019-10-01 19:21:51', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 312, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(642, '2019-10-01 19:21:52', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 312, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(643, '2019-10-01 19:21:52', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 312, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(644, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 313, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 22),
(645, '2019-10-01 19:21:52', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 313, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(646, '2019-10-01 19:21:52', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 313, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(647, '2019-10-01 19:21:52', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 313, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(648, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 314, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 23),
(649, '2019-10-01 19:21:53', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:28', '2019-08-30 00:01:28', 314, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(650, '2019-10-01 19:21:53', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:29', '2019-08-30 00:01:29', 314, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(651, '2019-10-01 19:21:53', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:29', '2019-08-30 00:01:29', 314, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(652, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:01:29', '2019-08-30 00:01:29', 315, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 24),
(653, '2019-10-01 19:21:53', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:29', '2019-08-30 00:01:29', 315, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(654, '2019-10-01 19:21:53', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:01:29', '2019-08-30 00:01:29', 315, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(655, '2019-10-01 19:21:53', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:01:29', '2019-08-30 00:01:29', 315, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(656, '2019-10-01 19:21:54', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 286, 16, '0.00', 334, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(657, '2019-10-01 19:21:54', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 287, 16, '0.00', 335, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(658, '2019-10-01 19:21:55', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 288, 16, '0.00', 336, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(659, '2019-10-01 19:21:55', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 289, 16, '0.00', 337, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(660, '2019-10-01 19:21:55', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 290, 16, '0.00', 338, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(661, '2019-10-01 19:21:55', '2019-03-10', 'February Bill', '700.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 291, 16, '0.00', 339, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(662, '2019-10-01 19:21:55', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 292, 16, '0.00', 340, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(663, '2019-10-01 19:21:55', '2019-03-10', 'February Bill', '700.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 293, 16, '0.00', 341, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(664, '2019-10-01 19:21:56', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 294, 16, '0.00', 342, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(665, '2019-10-01 19:21:56', '2019-03-10', 'February Bill', '700.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 295, 16, '0.00', 343, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(666, '2019-10-01 19:21:56', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 296, 16, '0.00', 344, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(667, '2019-10-01 19:21:56', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 297, 16, '0.00', 345, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(668, '2019-10-01 19:21:56', '2019-03-10', 'February Bill', '700.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 298, 16, '0.00', 346, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(669, '2019-10-01 19:21:56', '2019-03-10', 'February Bill', '700.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 299, 16, '0.00', 347, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(670, '2019-10-01 19:21:57', '2019-03-10', 'February Bill', '700.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 300, 16, '0.00', 348, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(671, '2019-10-01 19:21:57', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 301, 16, '0.00', 349, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(672, '2019-10-01 19:21:57', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 302, 16, '0.00', 350, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(673, '2019-10-01 19:21:57', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 303, 16, '0.00', 351, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(674, '2019-10-01 19:21:57', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:57', '2019-08-30 00:23:57', 304, 16, '0.00', 352, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(675, '2019-10-01 19:21:57', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:58', '2019-08-30 00:23:58', 305, 16, '0.00', 353, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(676, '2019-10-01 19:21:57', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:58', '2019-08-30 00:23:58', 306, 16, '0.00', 354, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(677, '2019-10-01 19:21:58', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:58', '2019-08-30 00:23:58', 307, 16, '0.00', 355, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(678, '2019-10-01 19:21:58', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:58', '2019-08-30 00:23:58', 308, 16, '0.00', 356, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(679, '2019-10-01 19:21:58', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:58', '2019-08-30 00:23:58', 309, 16, '0.00', 357, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(680, '2019-10-01 19:21:58', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:58', '2019-08-30 00:23:58', 310, 16, '0.00', 358, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(681, '2019-10-01 19:21:58', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:58', '2019-08-30 00:23:58', 311, 16, '0.00', 359, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(682, '2019-10-01 19:21:58', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:58', '2019-08-30 00:23:58', 312, 16, '0.00', 360, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(683, '2019-10-01 19:21:58', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:58', '2019-08-30 00:23:58', 313, 16, '0.00', 361, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(684, '2019-10-01 19:21:58', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:58', '2019-08-30 00:23:58', 314, 16, '0.00', 362, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(685, '2019-10-01 19:21:58', '2019-03-10', 'February Bill', '350.00', NULL, '350.00', NULL, NULL, NULL, '2019-08-30 00:23:58', '2019-08-30 00:23:58', 315, 16, '0.00', 363, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(686, '2019-10-01 19:21:58', '2019-03-10', 'February Bill', '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-08-30 00:23:58', '2019-08-30 00:23:58', 316, 16, '0.00', 364, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(687, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 286, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 25),
(688, '2019-10-01 19:21:58', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 286, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(689, '2019-10-01 19:21:58', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 286, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(690, '2019-10-01 19:21:58', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 286, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(691, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 287, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 26),
(692, '2019-10-01 19:21:58', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 287, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(693, '2019-10-01 19:21:58', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 287, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(694, '2019-10-01 19:21:58', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 287, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(695, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 289, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 27),
(696, '2019-10-01 19:21:59', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 289, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(697, '2019-10-01 19:21:59', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 289, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(698, '2019-10-01 19:21:59', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 289, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(699, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 292, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 28),
(700, '2019-10-01 19:21:59', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 292, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(701, '2019-10-01 19:21:59', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 292, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(702, '2019-10-01 19:21:59', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 292, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(703, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 294, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 29),
(704, '2019-10-01 19:21:59', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 294, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(705, '2019-10-01 19:21:59', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 294, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(706, '2019-10-01 19:21:59', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 294, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(707, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 297, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 30),
(708, '2019-10-01 19:21:59', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 297, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(709, '2019-10-01 19:21:59', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 297, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(710, '2019-10-01 19:21:59', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 297, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(711, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 301, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 31),
(712, '2019-10-01 19:21:59', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 301, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(713, '2019-10-01 19:21:59', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 301, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(714, '2019-10-01 19:21:59', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 301, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(715, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 302, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 32),
(716, '2019-10-01 19:21:59', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 302, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(717, '2019-10-01 19:21:59', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 302, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(718, '2019-10-01 19:21:59', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 302, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(719, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 304, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 33),
(720, '2019-10-01 19:22:00', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 304, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(721, '2019-10-01 19:22:00', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 304, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(722, '2019-10-01 19:22:00', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 304, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(723, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 305, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 34),
(724, '2019-10-01 19:22:00', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 305, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(725, '2019-10-01 19:22:00', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 305, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(726, '2019-10-01 19:22:00', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 305, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(727, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 306, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 35),
(728, '2019-10-01 19:22:00', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 306, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(729, '2019-10-01 19:22:00', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 306, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(730, '2019-10-01 19:22:00', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 306, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(731, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 307, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 36),
(732, '2019-10-01 19:22:00', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 307, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(733, '2019-10-01 19:22:00', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 307, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(734, '2019-10-01 19:22:00', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 307, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(735, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 308, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 37),
(736, '2019-10-01 19:22:00', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 308, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(737, '2019-10-01 19:22:00', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 308, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(738, '2019-10-01 19:22:00', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 308, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(739, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 309, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 38),
(740, '2019-10-01 19:22:00', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 309, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(741, '2019-10-01 19:22:00', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 309, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(742, '2019-10-01 19:22:00', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 309, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(743, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 310, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 39),
(744, '2019-10-01 19:22:01', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 310, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(745, '2019-10-01 19:22:01', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 310, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(746, '2019-10-01 19:22:01', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:17', '2019-08-30 00:27:17', 310, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(747, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 311, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 40),
(748, '2019-10-01 19:22:01', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 311, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(749, '2019-10-01 19:22:01', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 311, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(750, '2019-10-01 19:22:01', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 311, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(751, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 312, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 41),
(752, '2019-10-01 19:22:01', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 312, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(753, '2019-10-01 19:22:01', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 312, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(754, '2019-10-01 19:22:01', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 312, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(755, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 313, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 42),
(756, '2019-10-01 19:22:01', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 313, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(757, '2019-10-01 19:22:01', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 313, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(758, '2019-10-01 19:22:01', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 313, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(759, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 314, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 43),
(760, '2019-10-01 19:22:01', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 314, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(761, '2019-10-01 19:22:01', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 314, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(762, '2019-10-01 19:22:01', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 314, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(763, '2019-02-09 13:00:00', NULL, 'Payment Received', NULL, '350.00', '0.00', 'cash', NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 315, 16, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 44),
(764, '2019-10-01 19:22:01', NULL, 'Interest Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 315, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(765, '2019-10-01 19:22:01', NULL, 'Arrears Paid', NULL, '0.00', '350.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 315, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(766, '2019-10-01 19:22:02', NULL, 'Bill Paid', NULL, '350.00', '0.00', NULL, NULL, NULL, '2019-08-30 00:27:18', '2019-08-30 00:27:18', 315, 16, '0.00', NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(767, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 119, 4, '0.00', 365, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(768, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '18000.00', NULL, '18000.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 102, 4, '0.00', 366, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(769, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '22000.00', NULL, '22000.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 103, 4, '0.00', 367, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(770, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '12000.00', NULL, '12000.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 104, 4, '0.00', 368, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(772, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '22000.00', NULL, '22000.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 106, 4, '0.00', 370, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(773, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '22000.00', NULL, '22000.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 107, 4, '0.00', 371, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(774, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '20040.00', NULL, '20080.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 108, 4, '0.00', 372, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(775, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '9000.00', NULL, '9000.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 109, 4, '0.00', 373, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(776, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '40900.00', NULL, '20000.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 110, 4, '0.00', 374, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(778, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '5000.00', NULL, '5000.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 112, 4, '0.00', 376, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(779, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '5000.00', NULL, '5000.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 113, 4, '0.00', 377, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(780, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '5000.00', NULL, '5000.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 114, 4, '0.00', 378, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(781, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '3500.00', NULL, '3500.00', NULL, NULL, NULL, '2019-08-31 04:34:04', '2019-08-31 04:34:04', 145, 4, '0.00', 379, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(782, '2019-10-01 19:22:02', '2019-09-05', 'September Bill', '3000.00', NULL, '3000.00', NULL, NULL, NULL, '2019-08-31 04:34:05', '2019-08-31 04:34:05', 223, 4, '0.00', 380, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(783, '2019-08-31 13:00:00', NULL, 'Print outs for the month of August (B/W 18)', '90.00', NULL, '18090.00', NULL, NULL, NULL, '2019-08-31 04:43:12', '2019-08-31 04:43:12', 102, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(784, '2019-08-31 13:00:00', NULL, 'Snacks', '360.00', NULL, '18450.00', NULL, NULL, NULL, '2019-08-31 04:44:15', '2019-08-31 04:44:15', 102, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(785, '2019-08-31 13:00:00', NULL, 'Snacks', '50.00', NULL, '20130.00', NULL, NULL, NULL, '2019-08-31 04:44:59', '2019-08-31 04:44:59', 108, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(786, '2019-08-31 13:00:00', NULL, 'Print outs for the month of August (B/W 30)', '150.00', NULL, '3650.00', NULL, NULL, NULL, '2019-08-31 04:45:46', '2019-08-31 04:45:46', 145, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(787, '2019-08-31 13:00:00', NULL, 'Snacks', '160.00', NULL, '12160.00', NULL, NULL, NULL, '2019-08-31 04:46:49', '2019-08-31 04:46:49', 104, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(788, '2019-08-31 13:00:00', NULL, 'Unlimited Coffee (3 pax)', '1500.00', NULL, '19950.00', NULL, NULL, NULL, '2019-08-31 04:48:03', '2019-08-31 04:48:03', 102, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(789, '2019-08-31 13:00:00', NULL, 'Unlimited Coffee', '500.00', NULL, '22500.00', NULL, NULL, NULL, '2019-08-31 04:48:36', '2019-08-31 04:48:36', 106, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(862, '2019-09-01 13:00:00', NULL, 'Test Transfer', NULL, '50.00', '0.00', NULL, NULL, NULL, '2019-09-12 23:27:56', '2019-09-12 23:27:56', 156, 11, '0.00', NULL, NULL, NULL, 't', 'f', 't', 'f', 'f', NULL, NULL),
(886, '2019-09-29 13:00:00', NULL, 'Print outs for the month of September (B&W 14 / Color 1)', '80.00', NULL, '20030.00', NULL, NULL, NULL, '2019-09-30 06:09:19', '2019-09-30 06:09:19', 102, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(887, '2019-09-29 13:00:00', NULL, 'Unlimited Coffee (3 pax)', '1500.00', NULL, '21530.00', NULL, NULL, NULL, '2019-09-30 06:10:01', '2019-09-30 06:10:01', 102, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(888, '2019-09-30 13:00:00', NULL, 'Snacks', '45.00', NULL, '21575.00', NULL, NULL, NULL, '2019-09-30 06:12:26', '2019-09-30 06:12:26', 102, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(889, '2019-09-29 13:00:00', NULL, 'Biryani', '3000.00', NULL, '24575.00', NULL, NULL, NULL, '2019-09-30 06:13:28', '2019-09-30 06:13:28', 102, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(890, '2019-09-30 13:00:00', NULL, 'Print outs for the month of September (B&W 8)', '40.00', NULL, '22040.00', NULL, NULL, NULL, '2019-09-30 06:15:45', '2019-09-30 06:15:45', 107, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 't', 'f', NULL, NULL),
(891, '2019-09-17 13:00:00', NULL, 'Payment Received', NULL, '19950.00', '4625.00', 'neft', NULL, NULL, '2019-10-01 11:39:28', '2019-10-01 11:39:28', 102, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'icici', 17),
(892, '2019-09-02 13:00:00', NULL, 'Payment Received', NULL, '22000.00', '0.00', 'cheque', NULL, NULL, '2019-10-01 11:40:46', '2019-10-01 11:40:46', 103, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'Kotak Bank', 18),
(893, '2019-09-02 13:00:00', NULL, 'Payment Received', NULL, '12160.00', '0.00', 'cash', NULL, NULL, '2019-10-01 11:41:27', '2019-10-01 11:41:27', 104, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 19),
(894, '2019-09-02 13:00:00', NULL, 'Payment Received', NULL, '22500.00', '0.00', 'cash', NULL, NULL, '2019-10-01 11:42:09', '2019-10-01 11:42:09', 106, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 20),
(895, '2019-09-04 13:00:00', NULL, 'Payment Received', NULL, '22040.00', '0.00', 'neft', NULL, NULL, '2019-10-01 11:42:33', '2019-10-01 11:42:33', 107, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'NA', 21),
(896, '2019-09-03 13:00:00', NULL, 'Payment Received', NULL, '20090.00', '0.00', 'cheque', NULL, NULL, '2019-10-01 11:42:58', '2019-10-01 11:42:58', 108, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'Kotak Bank', 22),
(897, '2019-09-13 13:00:00', NULL, 'Payment Received', NULL, '9000.00', '0.00', 'neft', NULL, NULL, '2019-10-01 11:43:21', '2019-10-01 11:43:21', 109, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'NA', 23),
(898, '2019-09-13 13:00:00', NULL, 'Payment Received', NULL, '5000.00', '0.00', 'neft', NULL, NULL, '2019-10-01 11:43:46', '2019-10-01 11:43:46', 112, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'NA', 24),
(899, '2019-09-10 13:00:00', NULL, 'Payment Received', NULL, '5000.00', '0.00', 'neft', NULL, NULL, '2019-10-01 11:44:10', '2019-10-01 11:44:10', 113, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'NA', 25),
(900, '2019-09-10 13:00:00', NULL, 'Payment Received', NULL, '5000.00', '0.00', 'neft', NULL, NULL, '2019-10-01 11:44:40', '2019-10-01 11:44:40', 114, 4, '0.00', NULL, 4, 0, 'f', 'f', 'f', 'f', 'f', 'NA', 26),
(901, '2019-09-15 13:00:00', NULL, 'Payment Received', NULL, '3650.00', '0.00', 'cash', NULL, NULL, '2019-10-01 11:45:05', '2019-10-01 11:45:05', 145, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 27),
(902, '2019-09-02 13:00:00', NULL, 'Payment Received', NULL, '5000.00', '0.00', 'cash', NULL, NULL, '2019-10-01 11:45:36', '2019-10-01 11:45:36', 223, 4, '0.00', NULL, NULL, NULL, 't', 'f', 'f', 'f', 'f', NULL, 28),
(905, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '0.00', NULL, '0.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 119, 4, '0.00', 449, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(906, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '22625.00', NULL, '27250.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 102, 4, '0.00', 450, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(907, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '22000.00', NULL, '22000.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 103, 4, '0.00', 451, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(908, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '50000.00', NULL, '50000.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 104, 4, '0.00', 452, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(909, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '22000.00', NULL, '22000.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 106, 4, '0.00', 453, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(910, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '22000.00', NULL, '22000.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 107, 4, '0.00', 454, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(911, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '20000.00', NULL, '20000.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 108, 4, '0.00', 455, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(912, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '9000.00', NULL, '9000.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 109, 4, '0.00', 456, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(913, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '60900.00', NULL, '20000.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 110, 4, '0.00', 457, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(914, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '5000.00', NULL, '5000.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 112, 4, '0.00', 458, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(915, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '5000.00', NULL, '5000.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 113, 4, '0.00', 459, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(916, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '5000.00', NULL, '5000.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 114, 4, '0.00', 460, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(917, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '3500.00', NULL, '3500.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 145, 4, '0.00', 461, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL),
(918, '2019-10-01 19:22:04', '2019-10-05', 'October Bill', '1000.00', NULL, '1000.00', NULL, NULL, NULL, '2019-10-01 12:22:42', '2019-10-01 12:22:42', 223, 4, '0.00', 462, NULL, NULL, 'f', 'f', 'f', 'f', 'f', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Operator'),
(3, 'Manager'),
(4, 'Committee Member'),
(5, 'Member'),
(6, 'Channel Partner'),
(7, 'Sales'),
(8, 'Utility Service Provider');

-- --------------------------------------------------------

--
-- Table structure for table `schema_migrations`
--

DROP TABLE IF EXISTS `schema_migrations`;
CREATE TABLE IF NOT EXISTS `schema_migrations` (
  `version` varchar(255) NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schema_migrations`
--

INSERT INTO `schema_migrations` (`version`) VALUES
('20160907090711'),
('20160908095033'),
('20160909082359'),
('20160914054037'),
('20160916061056'),
('20160916072333'),
('20160916073526'),
('20160916073707'),
('20160916073801'),
('20160916085647'),
('20160916091040'),
('20160916091420'),
('20160916091646'),
('20160916091647'),
('20160916093157'),
('20160916094823'),
('20160916101339'),
('20160916101726'),
('20160916103417'),
('20160920060130'),
('20160921100502'),
('20160922054601'),
('20160923071545'),
('20160927111119'),
('20160928054520'),
('20161014083009'),
('20161017105000'),
('20161019031753'),
('20161019031911'),
('20161021094354'),
('20161021103300'),
('20161024112850'),
('20161025034631'),
('20161025040043'),
('20161025095427'),
('20161025104454'),
('20161026112627'),
('20161027060404'),
('20161027060655'),
('20161027061355'),
('20161102062559'),
('20161102082846'),
('20161109094134'),
('20161110084807'),
('20161111095843'),
('20161111111349'),
('20161111111434'),
('20161111111648'),
('20161111111818'),
('20161112053044'),
('20161112114329'),
('20161112121101'),
('20161116083405'),
('20161116094828'),
('20161116122421'),
('20161116122625'),
('20161117105218'),
('20161117105431'),
('20161117113247'),
('20161118080323'),
('20161118080647'),
('20161118081404'),
('20161123095022'),
('20161124093305'),
('20161125103524'),
('20161126044630'),
('20161126072800'),
('20161128060923'),
('20161128094605'),
('20161209093405'),
('20161214114205'),
('20161226054646'),
('20161229064221'),
('20161229071038'),
('20161229103407'),
('20161229103656'),
('20161229114139'),
('20161229114808'),
('20161229120034'),
('20161229125355'),
('20161229131523'),
('20161230110114'),
('20170106104559'),
('20170106110829'),
('20170107053002'),
('20170107074635'),
('20170117071043'),
('20170119074939'),
('20170129154957'),
('20170301053138'),
('20170307101238'),
('20170318093953'),
('20170324064419'),
('20170404085707'),
('20170404090426'),
('20170405104830'),
('20170407060105'),
('20170410102702'),
('20170410103318'),
('20170410105537'),
('20170410110201'),
('20170410110407'),
('20170410122546'),
('20170413072528'),
('20170413084914'),
('20170414122153'),
('20170415082100'),
('20170420054853'),
('20170420054933'),
('20170424051032'),
('20170424052928'),
('20170428054035'),
('20170428072849'),
('20170505091714'),
('20170506073141'),
('20170510110622'),
('20170523060938'),
('20170523071849'),
('20170530062614'),
('20170530070759'),
('20170530074821'),
('20170531062617'),
('20170606062057'),
('20170606082213'),
('20170607112702'),
('20170614093158'),
('20170614133652'),
('20170628095138'),
('20170628100117'),
('20170628100306'),
('20170628100527'),
('20170628100820'),
('20170628101115'),
('20170629050708'),
('20170629050733'),
('20170629050747'),
('20170629110154'),
('20170629110456'),
('20170630095903'),
('20170630101026'),
('20170704053244'),
('20170704054538'),
('20170704084734'),
('20170704210342'),
('20170707084751'),
('20170707085919'),
('20170707090902');

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

DROP TABLE IF EXISTS `service_providers`;
CREATE TABLE IF NOT EXISTS `service_providers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `sp_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `email` varchar(255) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_providers`
--

INSERT INTO `service_providers` (`id`, `name`, `address`, `contact_no`, `sp_type`, `created_at`, `updated_at`, `email`, `society_id`) VALUES
(8, 'Milk Man - Gargis', 'Vasai', '', 'Others', '2019-08-01 04:52:13', '2019-08-01 04:52:13', '', 4),
(9, 'Water - Vartak', 'Vasai', '7887870879', 'Water Supply', '2019-08-01 04:53:18', '2019-08-01 04:53:18', '', 4),
(10, 'Electricity Bill - MSEB', 'Vasai', '', 'Electricity Supply', '2019-08-01 04:54:00', '2019-08-01 04:54:00', '', 4),
(11, 'Vasai Internet', 'Vasai', '02506631133', 'Others', '2019-08-01 04:55:11', '2019-08-01 04:55:11', '', 4),
(12, 'Electricity Bill - MSEB', 'Vasai', '1234567890', 'Electricity Supply', '2019-08-06 06:03:15', '2019-08-06 06:03:15', 'test@123.com', 11),
(13, 'XYZ Company', 'Vasai', '0987654321', 'Security', '2019-08-06 06:04:27', '2019-08-06 06:04:27', 'test@234.com', 11),
(14, 'ABC Co', 'Vasai', '4445554444', 'Printing & stationary', '2019-08-06 06:05:33', '2019-08-06 06:05:33', 'test@345.com', 11),
(15, 'Electricity Bill', 'Kalyan', '', 'Electricity Supply', '2019-08-30 00:04:19', '2019-08-30 00:04:19', '', 16),
(16, 'House Keeper', 'Kalyan', '', 'Sweeper', '2019-08-30 00:04:59', '2019-08-30 00:04:59', '', 16),
(17, 'Water Service', 'Kalyan', '', 'Water Supply', '2019-08-30 00:05:29', '2019-08-30 00:05:29', '', 16);

-- --------------------------------------------------------

--
-- Table structure for table `societies`
--

DROP TABLE IF EXISTS `societies`;
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
  `image_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `interest_type` varchar(255) DEFAULT NULL,
  `interest_span` varchar(255) DEFAULT NULL,
  `interest_rate` double DEFAULT NULL,
  `bill_day` int(11) DEFAULT NULL,
  `due_day` int(11) DEFAULT NULL,
  `auto_create_bill` varchar(5) DEFAULT NULL,
  `noc_charge` decimal(8,2) DEFAULT NULL,
  `noc_unit_value` varchar(5) DEFAULT NULL,
  `garden_charge` double DEFAULT NULL,
  `garden_unit_value` varchar(5) DEFAULT NULL,
  `terrace_charge` double DEFAULT NULL,
  `terrace_unit_value` varchar(5) DEFAULT NULL,
  `villa_charge` double DEFAULT NULL,
  `villa_unit_value` varchar(5) DEFAULT NULL,
  `duplex_charge` double DEFAULT NULL,
  `duplex_unit_value` varchar(5) DEFAULT NULL,
  `commercial_charge` double DEFAULT NULL,
  `commercial_unit_value` varchar(5) DEFAULT NULL,
  `garage_charge` double DEFAULT NULL,
  `warehouse_charge` double DEFAULT NULL,
  `warehouse_unit_value` varchar(5) DEFAULT NULL,
  `garage_unit_value` varchar(5) DEFAULT NULL,
  `created_by_utility` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `societies`
--

INSERT INTO `societies` (`id`, `name`, `address`, `registration_no`, `no_of_flats`, `created_at`, `updated_at`, `opening_balance`, `billing_head_id`, `image_file_name`, `image_content_type`, `image_file_size`, `image_updated_at`, `interest_type`, `interest_span`, `interest_rate`, `bill_day`, `due_day`, `auto_create_bill`, `noc_charge`, `noc_unit_value`, `garden_charge`, `garden_unit_value`, `terrace_charge`, `terrace_unit_value`, `villa_charge`, `villa_unit_value`, `duplex_charge`, `duplex_unit_value`, `commercial_charge`, `commercial_unit_value`, `garage_charge`, `warehouse_charge`, `warehouse_unit_value`, `garage_unit_value`, `created_by_utility`) VALUES
(4, 'D Factory', 'Unit 1, KINI Arcade, Beside Stella Petrol Pump, Vasai West, Palghar – 401 202', 'M # +91 77418 11222 , Email - admin@dfactory.org', '20', '2019-07-30 04:26:44', '2019-10-01 13:00:33', 0, NULL, 'D_Factory.jpg', 'image/jpeg', 39751, '2019-07-30 06:36:36', 'Fixed Penalty', 'Monthly', 0, 1, 5, 'f', '0.00', 'f', 0, 'f', 0, 'f', 0, 'f', 0, 'f', 0, 'f', 0, 0, 'f', 'f', 'f'),
(7, 'D Factory - Jain Mandir', 'Vasai', '123456789', '5', '2019-07-30 08:08:39', '2019-07-30 08:08:39', 0, NULL, 'D_Factory.jpg', 'image/jpeg', 39751, '2019-07-30 08:08:39', '', '', NULL, 1, 5, 'f', '0.00', 'f', 0, 'f', 0, 'f', 0, 'f', 0, 'f', 0, 'f', 0, 0, 'f', 'f', 'f'),
(11, 'Housing Society ', 'Vasai', 'TNA/1234/J/4321', '25', '2019-08-06 05:59:45', '2019-09-14 05:06:57', 150, NULL, NULL, NULL, NULL, '2019-10-01 19:22:19', 'Simple', 'Monthly', 14, 1, 15, 't', NULL, 't', 0, 'f', 0, 'f', 0, 'f', 0, 'f', 0, 'f', 0, 0, 'f', 'f', 'f'),
(16, 'Ekvira Apartment', 'Gaodevi Road, Nandivili, Kalyan East, 421306', 'NA', '31', '2019-08-29 23:24:57', '2019-08-29 23:33:05', 0, NULL, NULL, NULL, NULL, '2019-10-01 19:22:19', 'Fixed Penalty', 'Monthly', 0, 30, 10, 'f', '0.00', 'f', 0, 'f', 0, 'f', 0, 'f', 0, 'f', 0, 'f', 0, 0, 'f', 'f', 'f'),
(25, 'Test Society ', 'Test Address ', '1234567890-123', '10', '2019-09-12 04:00:27', '2019-09-12 04:00:27', 10000, NULL, NULL, NULL, NULL, '2019-10-01 19:22:19', 'Simple', 'Monthly', 21, 1, 15, 'f', '0.00', 'f', 0, 'f', 0, 'f', 0, 'f', 0, 'f', 0, 'f', 0, 0, 'f', 'f', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `society_accesses`
--

DROP TABLE IF EXISTS `society_accesses`;
CREATE TABLE IF NOT EXISTS `society_accesses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_accesses`
--

INSERT INTO `society_accesses` (`id`, `user_id`, `role_id`, `society_id`, `created_at`, `updated_at`) VALUES
(1, 95, 6, 2, '2019-07-27 02:17:47', '2019-07-27 02:17:47'),
(2, 95, 6, 2, '2019-07-27 02:17:52', '2019-07-27 02:17:52'),
(3, 106, 3, 3, '2019-07-30 04:22:07', '2019-07-30 04:22:07'),
(4, 106, 3, 3, '2019-07-30 04:28:48', '2019-07-30 04:28:48'),
(5, 120, 4, 4, '2019-07-30 05:05:24', '2019-07-30 05:05:24'),
(6, 120, 4, 4, '2019-07-30 05:45:21', '2019-07-30 05:45:21'),
(7, 136, 6, 4, '2019-07-30 08:02:38', '2019-07-30 08:02:38'),
(8, 136, 6, 4, '2019-07-30 08:15:09', '2019-07-30 08:15:09'),
(9, 136, 6, 7, '2019-07-30 08:15:09', '2019-07-30 08:15:09'),
(10, 95, 6, 4, '2019-08-01 04:59:09', '2019-08-01 04:59:09'),
(11, 136, 4, 4, '2019-08-06 05:05:04', '2019-08-06 05:05:04'),
(12, 136, 4, 4, '2019-08-06 05:05:14', '2019-08-06 05:05:14'),
(13, 164, 4, 4, '2019-08-06 05:13:07', '2019-08-06 05:13:07'),
(14, 185, 2, 11, '2019-08-06 06:29:36', '2019-08-06 06:29:36'),
(15, 185, 2, 11, '2019-08-06 06:29:43', '2019-08-06 06:29:43'),
(16, 327, 2, 16, '2019-08-30 01:48:59', '2019-08-30 01:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `society_enrollment_requests`
--

DROP TABLE IF EXISTS `society_enrollment_requests`;
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
  `span` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_enrollment_requests`
--

INSERT INTO `society_enrollment_requests` (`id`, `name`, `email`, `phone`, `role`, `society_name`, `society_address`, `city`, `state`, `country`, `pincode`, `reference`, `created_at`, `updated_at`, `span`) VALUES
(1, 'Ashish', 'ashish@paynet.com', 1234567890, 'Freelancer', 'Not Applicable', 'Not Applicable', 'Vasai', 'Maharashtra', 'India', '401201', 'Reference', '2019-07-31 02:44:09', '2019-07-31 02:44:09', '0-3 Months'),
(2, 'Dinesh Shirgaonkar', 'd.shirgaonkar@yahoo.com', 9702527472, 't', 'Ekvira apartment', 'Nandivali Rd', 'Kalyan', 'Maharashtra', 'India', '421306', 'Reference', '2019-08-29 11:30:12', '2019-08-29 11:30:12', '0-3 Months'),
(3, 'Sushmita Dhone', 'sushmitadhone6182@gmail.com', 9082531945, 't', 'Ekveera apartment', 'Nandivli , gavdevi atlas rod, kalyan east', 'Kalyan', 'Maharashtra', 'India', '421306', NULL, '2019-08-30 05:37:03', '2019-08-30 05:37:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `society_service_providers`
--

DROP TABLE IF EXISTS `society_service_providers`;
CREATE TABLE IF NOT EXISTS `society_service_providers` (
  `id` int(11) NOT NULL,
  `society_id` int(11) DEFAULT NULL,
  `service_provider_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `service_provider_id` (`service_provider_id`),
  KEY `society_id` (`society_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `up_billing_heads`
--

DROP TABLE IF EXISTS `up_billing_heads`;
CREATE TABLE IF NOT EXISTS `up_billing_heads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_unit_value` varchar(5) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `utility_service_provider_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `utility_plan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `up_billing_heads`
--

INSERT INTO `up_billing_heads` (`id`, `name`, `is_unit_value`, `amount`, `utility_service_provider_id`, `created_at`, `updated_at`, `utility_plan_id`) VALUES
(1, 'Rent', NULL, 5000, 1, '2019-07-25 23:54:26', '2019-07-25 23:54:26', 1),
(2, 'Rent', NULL, 500, 1, '2019-07-25 23:55:04', '2019-07-25 23:55:04', 2),
(3, 'Rent', NULL, 18000, 1, '2019-07-25 23:55:32', '2019-07-25 23:55:32', 3),
(4, '50 Mbps', NULL, 500, 1, '2019-08-08 05:59:42', '2019-08-08 05:59:42', 4);

-- --------------------------------------------------------

--
-- Table structure for table `up_bill_details`
--

DROP TABLE IF EXISTS `up_bill_details`;
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
  `previous_outstanding` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `up_bill_details`
--

INSERT INTO `up_bill_details` (`id`, `bill_date`, `due_date`, `bill_amount`, `service_charge`, `service_tax`, `total_due`, `member_id`, `utility_service_provider_id`, `payment_id`, `bill_status`, `total_arrears`, `previous_member_balance`, `bill_summary`, `bill_no`, `bill_month`, `previous_outstanding`) VALUES
(1, '2019-07-01', '2019-07-10', 18000, NULL, NULL, NULL, 91, 1, NULL, 'Unpaid', 18000, 0, NULL, 1, '2019-07-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `up_payments`
--

DROP TABLE IF EXISTS `up_payments`;
CREATE TABLE IF NOT EXISTS `up_payments` (
  `id` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
  `is_cash` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `up_payments`
--

INSERT INTO `up_payments` (`id`, `payment_date`, `due_date`, `narration`, `credit`, `debit`, `balance`, `paid_by`, `details`, `status`, `member_id`, `utility_service_provider_id`, `receipt_id`, `cheque_no`, `depositor_bank`, `bank_id`, `bill_id`, `is_cash`) VALUES
(1, '2019-10-01 19:22:22', '2019-07-10', 'July Bill', '18000.00', NULL, NULL, NULL, NULL, NULL, 91, 1, NULL, NULL, NULL, NULL, NULL, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `encrypted_password` varchar(255) NOT NULL,
  `reset_password_token` varchar(255) DEFAULT NULL,
  `reset_password_sent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sign_in_count` int(11) NOT NULL,
  `current_sign_in_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_sign_in_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `current_sign_in_ip` varchar(100) DEFAULT NULL,
  `last_sign_in_ip` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `role_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `society_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `encrypted_password`, `reset_password_token`, `reset_password_sent_at`, `remember_created_at`, `sign_in_count`, `current_sign_in_at`, `last_sign_in_at`, `current_sign_in_ip`, `last_sign_in_ip`, `created_at`, `updated_at`, `role_id`, `member_id`, `username`, `society_id`) VALUES
(1, '$2a$11$qytK9BctiSz.hfmotm2tde1KQW0ts03drfq9efF9BnAA9.kzcICvu', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 128, '2019-09-27 03:13:42', '2019-09-25 06:27:47', '103.17.105.194', '103.17.105.194', '2019-07-24 07:53:02', '2019-09-27 03:13:42', 1, 0, 'admin@gmail.com', 0),
(92, '$2a$11$0hTTTKEjvyTNO6IV8AC5zuHZBBGms1GzSOrGwAPkwnL4pF2yqHKA6', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-07-25 23:51:42', '2019-07-25 23:51:42', 8, 0, 'abc@ccd.com', 1),
(93, '$2a$11$CBTFS2ZYabnxZHR8y//eQeilUNhymv63KiooTcB/G6Ds365YDMP7a', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-07-25 23:53:54', '2019-07-25 23:53:54', 5, 91, 'anis@paynet.com', NULL),
(94, '$2a$11$hn218l6lQJeCPSnLT.0VF.PBk679H9g3XCIZeOr0YI7JpXu1Jd8Xe', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 6, '2019-07-31 03:11:35', '2019-07-31 03:11:26', '103.17.105.194', '103.17.105.194', '2019-07-27 01:33:35', '2019-07-31 03:11:35', 4, NULL, 'ops@paynet.co.in', 0),
(95, '$2a$11$lcSOnrNdsXdr9JMQ4FbHT.lR3YWDNvkngMUOkGj6IRhviLeis7Q3a', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 18, '2019-10-01 11:48:37', '2019-10-01 11:37:23', '103.17.105.194', '103.17.105.194', '2019-07-27 02:14:47', '2019-10-01 11:48:37', 6, NULL, 'partner@gmail.com', 0),
(107, '$2a$11$GpQb6wLIYgz/Gbl31cInj.Y5bbtEcdOQAxCcIinTTtSsChJ3ilN2O', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 26, '2019-10-01 11:38:06', '2019-10-01 11:37:32', '103.17.105.194', '103.17.105.194', '2019-07-30 04:54:24', '2019-10-01 11:38:06', 5, 102, 'anis@paynet.co.in', 4),
(108, '$2a$11$bTc07UEHly89ctPXpp4hLuAaZJTD2.zkjDVm2yDAugGmjKD.xI8wm', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-07-30 04:54:24', '2019-08-01 03:19:17', 5, 103, 'chart@jesaishipping.com', 4),
(109, '$2a$11$23znVQ8Bl4ydPzc2r0/nL.B0Ps/jqw3LhwhpLySjcetgAEpz.8cB2', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 3, '2019-07-31 23:44:31', '2019-07-31 07:13:47', '103.17.105.194', '103.17.105.194', '2019-07-30 04:54:24', '2019-07-31 23:44:31', 5, 104, 'willbun@chrisel.net', 4),
(111, '$2a$11$gEaASHq//odL5rJ5CblHbe4BoMzco82ypiR/3VWd3WIOsj9YUo60S', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-07-30 04:54:25', '2019-07-30 04:54:25', 5, 106, 'atozservices5253@gmail.com', 4),
(112, '$2a$11$qjHqxp4kFz9k/72oCszZyehGikmMBhueV1NOX/lwvw5vOWZep0gzO', NULL, '2019-10-01 19:22:22', '2019-10-01 19:22:22', 2, '2019-08-28 08:41:06', '2019-08-05 02:08:32', '157.33.233.86', '103.17.105.194', '2019-07-30 04:54:25', '2019-08-28 08:41:06', 5, 107, 'paras.botadra@unboxinnovations.com', 4),
(113, '$2a$11$UlgYbcbX.bil7pDGYhymd.y8vAkjN/WUqz/TyWDvVE8L2TDFdRv.y', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-07-30 04:54:25', '2019-07-30 04:54:25', 5, 108, 'vijendrapawar@mapelmoulds.co.in', 4),
(114, '$2a$11$NQlT5c.Z6cvrw1WTjhYBQuex4.U27/.Ygd71KLEYXHC7LA6QE9ufu', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-07-30 04:54:25', '2019-07-30 04:54:25', 5, 109, 'rbsactive@gmail.com', 4),
(115, '$2a$11$PnFK/0SyNUhWcMsy0V/ucegaOI3f7OObUYZpLN5zntIJGi5pkfmRC', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 6, '2019-08-01 04:24:45', '2019-07-31 23:52:30', '106.78.163.8', '103.17.105.194', '2019-07-30 04:54:25', '2019-08-01 04:24:45', 5, 110, 'dhawal@darkhorsemedia.co', 4),
(117, '$2a$11$LttDwTGcKIyUpjty.tX3jeY.xBFuMP2da2dKW/3yuPYMWkdcj/b1i', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-07-30 04:54:26', '2019-07-30 04:54:26', 5, 112, 'krunal_888@hotmail.com', 4),
(118, '$2a$11$4Y6PGNlhNeF5z0exgF6Une8vxhDq9tsYwXrd..MVB0nmuhHNJUQ1e', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-07-30 04:54:26', '2019-07-30 04:54:26', 5, 113, 'shilpa.acharya86@gmail.com', 4),
(119, '$2a$11$mITQmFqCKctTS8PS9RaoAe.4miz3sKBhe1W9AoLpfEbWz525Vu99W', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 6, '2019-08-31 11:19:28', '2019-08-31 11:19:04', '27.0.51.247', '27.0.51.247', '2019-07-30 04:54:26', '2019-08-31 11:19:28', 5, 114, 'nyadav@itek.com', 4),
(125, '$2a$11$eNKk9jgtCojNk1jOAJ8BsuXAAHqsgU5gh4WM7gDQ43FZiImcHGGVi', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 11, '2019-08-06 05:36:17', '2019-08-05 03:54:19', '103.17.105.194', '103.17.105.194', '2019-07-30 07:17:56', '2019-08-06 05:36:17', 4, 119, 'mgmt@dfactory.com', 4),
(137, '$2a$11$4yYSADmvGRRqRkBHylg81.p1pH16.k0ZreNen1JdLcyMdoxeELPLS', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-07-30 08:11:46', '2019-07-30 08:11:46', 5, 130, 'jainmandir101@gmail.com', 7),
(138, '$2a$11$qdDn4OR8MSKXJ7hAnoi6F.Wjr0HuwGTlPGg/dzNwmyLy3VZtl2H7u', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-07-30 08:11:47', '2019-07-30 08:11:47', 5, 131, 'jainmandir102@gmail.com', 7),
(139, '$2a$11$qQWdBjlmYKu46dIrkuoBRe0aNKdLDn/NLV4AVxe.7Pzs6g9qkUbOS', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-07-30 08:11:47', '2019-07-30 08:11:47', 5, 132, 'jainmandir103@gmail.com', 7),
(140, '$2a$11$WeBDZaT/USwum4V5pmVZiukvpvEWjXDfIEiiQ/s2LtId/unAqjGX2', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-07-30 08:11:47', '2019-07-30 08:11:47', 5, 133, 'jainmandir104@gmail.com', 7),
(141, '$2a$11$N8nIHfpZWNCkPKxbMsZbmOSz6J0DIE5G/OOCih82XshxKQ05upj5K', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-07-30 08:11:48', '2019-07-30 08:11:48', 5, 134, 'jainmandir105@gmail.com', 7),
(152, '$2a$11$BdZerZUGm6HJ7.ksewhL3eQwHKyzjJacSkmDx1yxWOcJmKSJKdgRO', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-08-01 00:48:15', '2019-08-01 00:48:15', 2, NULL, 'info@dfactory.org', 0),
(153, '$2a$11$/a2/ihPYvYr2KRnjQTgBuukEaCpK1fTE1qHdi0ZQtIlEAtREsVtwy', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 2, '2019-08-01 03:28:34', '2019-08-01 03:27:47', '49.35.122.55', '49.35.122.55', '2019-08-01 03:23:59', '2019-08-01 03:28:34', 5, 145, 'csdevanshisharma@gmail.com', 4),
(164, '$2a$11$9CfuO9TgwUZ.XTS5qDX5t.PgWYEd39Axv14ZK4w6tEqJ1kyqc9poW', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 8, '2019-08-17 04:59:10', '2019-08-06 06:57:24', '103.17.105.194', '103.17.105.194', '2019-08-06 05:11:13', '2019-08-17 04:59:10', 3, NULL, 'dhawal@dfactory.org', 0),
(165, '$2a$11$PwgfElT3iM5QSAVxsWnnD.3c0enFztnS1p2rnJQmwFMD1shQ6iTwK', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 55, '2019-09-28 04:52:16', '2019-09-28 01:51:07', '106.209.163.102', '106.209.235.156', '2019-08-06 06:00:48', '2019-09-28 04:52:16', 4, 156, 'a101@gmail.com', 11),
(166, '$2a$11$EaUO/5KstQlOhTjjw4UUU.SUg1MrBYUkYKXwBKcPSZeyXFgAUHRFe', NULL, '2019-10-01 19:22:22', '2019-10-01 19:22:22', 3, '2019-08-16 03:56:40', '2019-08-16 03:54:07', '103.17.105.194', '103.17.105.194', '2019-08-06 06:00:48', '2019-08-16 03:56:40', 5, 157, 'a102@gmail.com', 11),
(167, '$2a$11$frLjkondZ4WhTYS5Nvm1duNMfydZe2cNy2DTOE1fhbJhYKZj3wBji', NULL, '2019-10-01 19:22:22', '2019-10-01 19:22:22', 1, '2019-08-06 06:27:52', '2019-08-06 06:27:52', '103.17.105.194', '103.17.105.194', '2019-08-06 06:00:48', '2019-08-28 07:47:03', 5, 158, 'ashish@paynetpaymetns.com', 11),
(168, '$2a$11$/JTF.GyIflMx6/TXOv0Wmut.qZfnvp7RlFgGQKKsjCw9xL..lK7yi', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 1, '2019-09-25 07:06:37', '2019-09-25 07:06:37', '103.17.105.194', '103.17.105.194', '2019-08-06 06:00:48', '2019-09-25 07:06:37', 4, 159, 'jigs.adhyaru@gmail.com', 11),
(169, '$2a$11$g0Kvj686.Z3aDCkj1S3vpuQaOVYKVxPx4ME3TS2h3i8kQ0Bi8z9.2', NULL, '2019-10-01 19:22:22', '2019-10-01 19:22:22', 3, '2019-08-16 04:03:45', '2019-08-16 04:03:09', '103.17.105.194', '103.17.105.194', '2019-08-06 06:00:48', '2019-08-28 07:47:55', 5, 160, 'zaid@paynetpayments.com', 11),
(170, '$2a$11$qpBNUAk6.ib2YCky3QvZluY5tbqWnspUA0kWnSUB4kwEodJIsBSQS', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 7, '2019-08-31 01:43:34', '2019-08-31 01:42:00', '157.33.104.186', '157.33.104.186', '2019-08-06 06:00:49', '2019-08-31 01:43:34', 5, 161, 'a201@gmail.com', 11),
(171, '$2a$11$TIB91VsEvZqNb0UmTgmvoO9zahnc/gaM.1trPOf75H46zbbo2wlAe', NULL, '2019-10-01 19:22:22', '2019-10-01 19:22:22', 0, '2019-10-01 19:22:22', '2019-10-01 19:22:22', NULL, NULL, '2019-08-06 06:00:49', '2019-08-31 01:33:33', 5, 162, 'A201@gmail.com', 11),
(172, '$2a$11$4OGpbOemNhWdTXefVv1L0.eu6wLgBd8us2joOmuDaX1ThB0STDsAC', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-08-06 06:00:49', '2019-08-06 06:00:49', 5, 163, 'a203@gmail.com', 11),
(173, '$2a$11$j6a56yuiS1wxO8886fl3LuDzMJbrj3nfZoit2XEzHkkeCv8538hUG', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-08-06 06:00:50', '2019-08-06 06:00:50', 5, 164, 'a204@gmail.com', 11),
(174, '$2a$11$FisuiZB12GVY89WdZ67NOey6wNkiXO7bro3vpb2eT95UNY54iv7mO', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-08-06 06:00:50', '2019-08-06 06:00:50', 5, 165, 'a205@gmail.com', 11),
(175, '$2a$11$DtnpvCHeZmFSBS30pC3dDe7vkrrfKfAgTM0bIHC/o26se9xy6lrc6', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-08-06 06:00:50', '2019-08-06 06:00:50', 5, 166, 'b101@gmail.com', 11),
(176, '$2a$11$dpxoyPkRITat6YyCJmN9NuAugsIrZEbhd3P5Y0MIq3yOrgMrnPdx.', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-08-06 06:00:50', '2019-08-06 06:00:50', 5, 167, 'b102@gmail.com', 11),
(177, '$2a$11$aoqIWdlXoxiu1szTefdZ8ePDjBM7nGwK1ssgl5Q56uod.C2MTc0Ia', NULL, '2019-10-01 19:22:23', '2019-10-01 19:22:23', 0, '2019-10-01 19:22:23', '2019-10-01 19:22:23', NULL, NULL, '2019-08-06 06:00:50', '2019-08-06 06:00:50', 5, 168, 'b103@gmail.com', 11),
(178, '$2a$11$7icV07kBlMtQIFrpdOdQI.azTo2S2hskqYCUsMlzByGOOHeTBqQWq', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 3, '2019-09-25 07:34:58', '2019-09-25 07:34:32', '103.17.105.194', '103.17.105.194', '2019-08-06 06:00:51', '2019-09-25 07:34:58', 5, 169, 'b104@gmail.com', 11),
(179, '$2a$11$MFkylamNMzKNrbispUpJKuE/h4l9ISWMwB.dD9jAy2KUrB37rY.0O', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-08-06 06:00:51', '2019-08-06 06:00:51', 5, 170, 'b105@gmail.com', 11),
(180, '$2a$11$oP3.bRkbpXghkIUG9LpcLugaLuDoeHYMEs524Pu0XNGUi.x86WnFm', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-08-06 06:00:51', '2019-08-06 06:00:51', 5, 171, 'b201@gmail.com', 11),
(181, '$2a$11$njI96NAWQGPOSvLXziDRIe2p8y/VcNgEerWy7B9lD9kFjjDf/jJXm', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-08-06 06:00:51', '2019-08-06 06:00:51', 5, 172, 'b202@gmail.com', 11),
(182, '$2a$11$UAnKsY0aayaXOXrHg2Gxyebxd4WAiOa7U55l3byCH0AHOMOh6JMRq', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-08-06 06:00:51', '2019-08-06 06:00:51', 5, 173, 'b203@gmail.com', 11),
(183, '$2a$11$1c2OKWhFWOW2GLmRC8T22eaaeU5tigoFKHe/5m3o0NO0JFTT11yFa', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-08-06 06:00:52', '2019-08-06 06:00:52', 5, 174, 'b204@gmail.com', 11),
(184, '$2a$11$iWTw63tnZbhErJfT1uWbIuI70JmN5DxtQh8Nm6T6wNPFB.iFazWt6', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-08-06 06:00:52', '2019-08-06 06:00:52', 5, 175, 'b205@gmail.com', 11),
(185, '$2a$11$CdDndVqYWoGkvsJmSNaMYekAkaSI9dNkuO6y5OK/iohkJO124H84y', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 14, '2019-09-26 12:15:06', '2019-09-23 07:13:03', '182.237.179.118', '110.224.33.188', '2019-08-06 06:29:27', '2019-09-26 12:15:06', 2, NULL, 'test@gmail.com', 0),
(233, '$2a$11$59zAIsr2bXuJ6j2kU45bTuA8DVe6k/CPtQ7aAVvwX63IuadW7KgY2', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-28 00:57:13', '2019-08-28 00:57:13', 5, 223, 'rajiv.kint@gmail.com', 4),
(296, '$2a$11$98g3e2KB7WIQZvqYQPVDx.vag0Y0J..dXlT7Aa1yCM/CZMMe/46O.', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:08', '2019-08-29 23:56:08', 5, 286, 'ekvira1@gmail.com', 16),
(297, '$2a$11$0y00/lbwqGSwcLZzXvcPaufatVrDrx4WaqEyDYcLgqcv3dkZvLVEe', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:08', '2019-08-29 23:56:08', 5, 287, 'ekvira3@gmail.com', 16),
(298, '$2a$11$098d0R9ch2.HKd29b4ciHemTr89N5Wq2RxKqx4BjsglyLa9BdBCQa', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:09', '2019-08-29 23:56:09', 5, 288, 'ekvira4@gmail.com', 16),
(299, '$2a$11$RzBWVzrH81qJEBevNOtiCublFoG/N/vnEm4trpSk1dH1Or0MYxJI2', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:09', '2019-08-29 23:56:09', 5, 289, 'ekvira5@gmail.com', 16),
(300, '$2a$11$rsi5j/CTQn760Px5jehfzOs8nww3WvJvnboeGT.uAwNWHiZZzvOYe', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:09', '2019-08-29 23:56:09', 5, 290, 'ekvira6@gmail.com', 16),
(301, '$2a$11$6VeKZlxDLfIaqHrwhviRCOIrnOcYyTGLVp3LoBxa5rjakloy.f8qm', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:09', '2019-08-29 23:56:09', 5, 291, 'ekvira7@gmail.com', 16),
(302, '$2a$11$o947umFjaJNUg7BP6YkGeejKNll7IDyg2CFd/4517RLjYOv0asugO', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:09', '2019-08-29 23:56:09', 5, 292, 'ekvira8@gmail.com', 16),
(303, '$2a$11$BNCnnJnGO00XG1og5pwIVO1DUYArRLYbi2q7vz3lJQYi6Qyf6jFa6', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 1, '2019-09-03 07:38:07', '2019-09-03 07:38:07', '27.97.82.170', '27.97.82.170', '2019-08-29 23:56:09', '2019-09-03 07:38:07', 5, 293, 'ekvira101@gmail.com', 16),
(304, '$2a$11$mJAdXNm/9FFSM9cvB6.b0ukYmAx0/NAkL89hNdzyZCccJxqa5oaMO', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 3, '2019-09-02 07:04:44', '2019-09-02 01:42:48', '27.97.86.20', '27.97.86.69', '2019-08-29 23:56:10', '2019-09-02 07:04:44', 5, 294, 'ekvira102@gmail.com', 16),
(305, '$2a$11$WuqgvhhwiMKZtPXASUunN.pcvdabnPNhGMXAOA1CKcsJZpRTSHqCG', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:10', '2019-08-29 23:56:10', 5, 295, 'ekvira103@gmail.com', 16),
(306, '$2a$11$TOZWe84v5zA8DUjWGiAYMuTSdgcaIhC1RaZSPyY/jIPLJmyRPiob2', NULL, '2019-10-01 19:22:28', '2019-10-01 19:22:28', 1, '2019-09-04 02:02:35', '2019-09-04 02:02:35', '27.97.84.63', '27.97.84.63', '2019-08-29 23:56:10', '2019-09-04 02:02:35', 5, 296, 'ekvira104@gmail.com', 16),
(307, '$2a$11$8Yf15ybuKC7Qv/WjzF1UkO2QkhNwESRq8/wB53.9Nl4BMq2vfH87e', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:10', '2019-08-29 23:56:10', 5, 297, 'ekvira105@gmail.com', 16),
(308, '$2a$11$hTqHPpAas6fLRQaOK0U/kOoyHYRZgAXExGo/BHPu0cMvQQ4Cl2qa6', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:10', '2019-08-29 23:56:10', 5, 298, 'ekvira106@gmail.com', 16),
(309, '$2a$11$DratUabKvuwzoMn5DVZlJujGC1v0.iFWGaMQKw3Uhizku2XsU7wiS', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:10', '2019-08-29 23:56:10', 5, 299, 'ekvira107@gmail.com', 16),
(310, '$2a$11$Sv0gDX/MoJvIrncoH1tOg.aq1opNQ/OvuRcwIApsoEO6oNPw.JDI2', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:11', '2019-08-29 23:56:11', 5, 300, 'ekvira108@gmail.com', 16),
(311, '$2a$11$s9NMmPj8bweBmclpFBAOUuRVoLNUJBHhT9/XxDu2.YT18R43SBI3W', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-08-29 23:56:11', '2019-08-29 23:56:11', 5, 301, 'ekvira201@gmail.com', 16),
(312, '$2a$11$oKixShbk2HV8azJkVOa2T.bbzKopJDClSWjW0Kfs.C/B1g/SYjnAe', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 0, '2019-10-01 19:22:27', '2019-10-01 19:22:27', NULL, NULL, '2019-08-29 23:56:11', '2019-08-29 23:56:11', 5, 302, 'ekvira202@gmail.com', 16),
(313, '$2a$11$FygaoZDA.gGwtJd8aoWy.OfZimYaFnyroOXrm8WjYoYVx/RMxE8qq', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 0, '2019-10-01 19:22:27', '2019-10-01 19:22:27', NULL, NULL, '2019-08-29 23:56:11', '2019-08-29 23:56:11', 5, 303, 'ekvira203@gmail.com', 16),
(314, '$2a$11$KMmDteUwxXUffg.OWd36Req4Ra9y3mT8UoR96uxKQJ9Gz4tftOr2O', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 0, '2019-10-01 19:22:27', '2019-10-01 19:22:27', NULL, NULL, '2019-08-29 23:56:11', '2019-08-29 23:56:11', 5, 304, 'ekvira204@gmail.com', 16),
(315, '$2a$11$ZlQVIumtHshJbzfcoMpK7.xBVcbW2MhlgxtptqU03slUviqqF0dM2', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 0, '2019-10-01 19:22:27', '2019-10-01 19:22:27', NULL, NULL, '2019-08-29 23:56:11', '2019-08-29 23:56:11', 5, 305, 'ekvira205@gmail.com', 16),
(316, '$2a$11$bAjj/RBVKtDDSNmQPKFTlOQtDtmDbbdJJ9iGxPoz3OmaKdJKGbaQW', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 0, '2019-10-01 19:22:27', '2019-10-01 19:22:27', NULL, NULL, '2019-08-29 23:56:12', '2019-08-29 23:56:12', 5, 306, 'ekvira206@gmail.com', 16),
(317, '$2a$11$jIPD8OEwqZ5QcGz1LdsSROzzSEqWbkFuST10WgiR/9V7g9hgAl9l6', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 0, '2019-10-01 19:22:27', '2019-10-01 19:22:27', NULL, NULL, '2019-08-29 23:56:12', '2019-08-29 23:56:12', 5, 307, 'ekvira207@gmail.com', 16),
(318, '$2a$11$0eW5XvB6zMVLZjZJ1uX9GuWrXK1beTbsuGWagKapBGwmhc.iFHZXK', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 0, '2019-10-01 19:22:27', '2019-10-01 19:22:27', NULL, NULL, '2019-08-29 23:56:12', '2019-08-29 23:56:12', 5, 308, 'ekvira208@gmail.com', 16),
(319, '$2a$11$iUqPGmxcw9zxbKtaHye6XOKLSbPS2z45D7oHqgg5SCcZ9ERSzt5Bm', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 0, '2019-10-01 19:22:27', '2019-10-01 19:22:27', NULL, NULL, '2019-08-29 23:56:12', '2019-08-29 23:56:12', 5, 309, 'ekvira301@gmail.com', 16),
(320, '$2a$11$FqJdUl8LwbNlu0T97/s1b.Bena9MEX/oan3olCSu2z2HI1UbKnbWW', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 1, '2019-08-30 11:08:31', '2019-08-30 11:08:31', '27.97.86.242', '27.97.86.242', '2019-08-29 23:56:12', '2019-08-30 11:08:31', 5, 310, 'ekvira302@gmail.com', 16),
(321, '$2a$11$wUKnd0PZ/xDGwebtKvQF6uVG/zL1itYSDxKvvX6z1fhme6lg4z36G', NULL, '2019-10-01 19:22:28', '2019-10-01 19:22:28', 1, '2019-08-30 11:05:51', '2019-08-30 11:05:51', '27.97.85.59', '27.97.85.59', '2019-08-29 23:56:12', '2019-08-30 11:05:51', 5, 311, 'ekvira303@gmail.com', 16),
(322, '$2a$11$FvHcM0UKMr8AC20kYxSwtuT6QfAcQVe4bS2k6aKDfWyGDAuxfbW3q', NULL, '2019-10-01 19:22:28', '2019-10-01 19:22:28', 54, '2019-09-29 06:10:32', '2019-09-29 06:10:32', '112.79.66.25', '112.79.66.25', '2019-08-29 23:56:13', '2019-09-29 06:10:32', 4, 312, 'ekvira304@gmail.com', 16),
(323, '$2a$11$Q/Vp3SZpqtAw0.5f.gzZountEOV74uJoxjo0hVNDUrAqYgQ9tyKE.', NULL, '2019-10-01 19:22:28', '2019-10-01 19:22:28', 1, '2019-09-04 02:01:37', '2019-09-04 02:01:37', '27.97.83.1', '27.97.83.1', '2019-08-29 23:56:13', '2019-09-04 02:01:37', 5, 313, 'ekvira305@gmail.com', 16),
(324, '$2a$11$abtcxBXsrS1hDRB2z6SZNe1AA0Whvt4jEm8Tj9yVu9vYjDXK5METC', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 0, '2019-10-01 19:22:27', '2019-10-01 19:22:27', NULL, NULL, '2019-08-29 23:56:13', '2019-08-29 23:56:13', 5, 314, 'ekvira306@gmail.com', 16),
(325, '$2a$11$1roWzCsbH3J6QWif0wf0/Odpy0dBBAgKYfzx1m3.HxnWHYC0plQW2', NULL, '2019-10-01 19:22:27', '2019-10-01 19:22:27', 0, '2019-10-01 19:22:27', '2019-10-01 19:22:27', NULL, NULL, '2019-08-29 23:56:13', '2019-08-29 23:56:13', 5, 315, 'ekvira307@gmail.com', 16),
(326, '$2a$11$e8RRa3X4A9Sx3xOLDhE.IO6NcRA2omeFY8I7k/UtCslpatJrVyasi', NULL, '2019-10-01 19:22:28', '2019-10-01 19:22:28', 4, '2019-08-30 01:43:10', '2019-08-30 01:41:03', '103.17.105.194', '103.17.105.194', '2019-08-29 23:56:13', '2019-08-30 04:30:40', 4, 316, 'ekvira308@gmail.com', 16),
(327, '$2a$11$xNZQv04gtMYNt5tsTXjoMO4JSkH1z3daiff37Y6AGrFdjZifTMDHW', NULL, '2019-10-01 19:22:22', '2019-10-01 19:22:22', 1, '2019-08-30 01:49:26', '2019-08-30 01:49:26', '103.17.105.194', '103.17.105.194', '2019-08-30 01:48:47', '2019-08-30 01:49:26', 2, NULL, 'ekviradinesh@gmail.com', 0),
(389, '$2a$11$FZJ.xKs.IhbmQhNZlatVr.FcFlM9pLK6/2RDT3zH9yHtWeQQDMwaS', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-09-12 04:01:11', '2019-09-12 04:01:11', 5, 378, 'a101@gmail.com', 25),
(390, '$2a$11$3aSKGdWmuLYPuBPhMlsa/uBvAkQ4BdBbt0PejSZ23V8ge9PLHL62O', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-09-12 04:01:11', '2019-09-12 04:01:11', 5, 379, 'a102@gmail.com', 25),
(391, '$2a$11$4EK1UWb0wNo8KueIlcc0texiPlSIzLxgjoZbagkvU5GDlQwVHmmW2', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-09-12 04:01:12', '2019-09-12 04:01:12', 5, 380, 'a103@gmail.com', 25),
(392, '$2a$11$SlDW/xYJpq8ZbMrzHCn4qO9ojkld0Jzt4MXPHZI4MO1HiX98w/DjG', NULL, '2019-10-01 19:22:24', '2019-10-01 19:22:24', 0, '2019-10-01 19:22:24', '2019-10-01 19:22:24', NULL, NULL, '2019-09-12 04:01:12', '2019-09-12 04:01:12', 5, 381, 'a104@gmail.com', 25),
(393, '$2a$11$D7ERcOcBw3iGfg/6Zy8QIeGOtXsk15LqzbCNedw5oSdxDzR.yX9a2', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 0, '2019-10-01 19:22:25', '2019-10-01 19:22:25', NULL, NULL, '2019-09-12 04:01:12', '2019-09-12 04:01:12', 5, 382, 'a105@gmail.com', 25),
(394, '$2a$11$Pe9JO60rVyJjJVMBPspThuIchV396fDbUwomP3hfK3sZRNIjwiXwC', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 0, '2019-10-01 19:22:25', '2019-10-01 19:22:25', NULL, NULL, '2019-09-12 04:01:12', '2019-09-12 04:01:12', 5, 383, 'a201@gmail.com', 25),
(395, '$2a$11$2CbVlX9jybn4am0IusuvO.CdMxUsnDc.5kfz0rsyirec9qJv4iBX.', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 0, '2019-10-01 19:22:25', '2019-10-01 19:22:25', NULL, NULL, '2019-09-12 04:01:12', '2019-09-12 04:01:12', 5, 384, 'a202@gmail.com', 25),
(396, '$2a$11$VYrr8v4Ag5c6wyNP6al5f.ojoVEp0byelBw0Kxhn3Ccj/hy8ltAPS', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 0, '2019-10-01 19:22:25', '2019-10-01 19:22:25', NULL, NULL, '2019-09-12 04:01:12', '2019-09-12 04:01:12', 5, 385, 'a203@gmail.com', 25),
(397, '$2a$11$lNafS9Uu8PaGXuuVOoRE8e8VqVEOFYu1PSPpl.nW40cEo6J.eLJwe', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 0, '2019-10-01 19:22:25', '2019-10-01 19:22:25', NULL, NULL, '2019-09-12 04:01:13', '2019-09-12 04:01:13', 5, 386, 'a204@gmail.com', 25),
(398, '$2a$11$BOLkgo72fbZ.vIvXgGMguuxpjdLYSLnQDfq8.QxCF/aNscxE29jZq', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 0, '2019-10-01 19:22:25', '2019-10-01 19:22:25', NULL, NULL, '2019-09-12 04:01:13', '2019-09-12 04:01:13', 5, 387, 'a205@gmail.com', 25),
(399, '$2a$11$48F1s17qVYiCAOfu56Q8Iuy.j7QXdnYzPRU2RWPwRq8OEFLhWxf3S', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 0, '2019-10-01 19:22:25', '2019-10-01 19:22:25', NULL, NULL, '2019-10-01 12:25:15', '2019-10-01 12:25:15', 5, 388, 'm.soni@mtgglobaltravelservices.com', 4),
(400, '$2a$11$2BYiPfcYOm67UeGOi4UXtu9.5WX82X2s.1Jx.sjLr7WyO5OPfisiu', NULL, '2019-10-01 19:22:28', '2019-10-01 19:22:28', 0, '2019-10-01 19:22:28', '2019-10-01 19:22:28', NULL, NULL, '2019-10-01 12:26:53', '2019-10-01 12:26:53', 5, 389, 'rajiv.knit09@gmail.com', 4),
(401, '$2a$11$YfE/6jb/dE9bq3H0Uc7hPeX2rZ3wtSCLUIqWiVbuPs2jKy7.XZH.G', NULL, '2019-10-01 19:22:25', '2019-10-01 19:22:25', 0, '2019-10-01 19:22:25', '2019-10-01 19:22:25', NULL, NULL, '2019-10-01 12:31:52', '2019-10-01 12:31:52', 5, 390, 'prakashrawal.2008@rediffmail.com', 4),
(402, '$2a$11$Q7KIUBRBWDSR5uxjNq3izuUITwKu4Kp1/S66p3/8.CYTxRi500F8S', NULL, '2019-10-01 19:22:26', '2019-10-01 19:22:26', 0, '2019-10-01 19:22:26', '2019-10-01 19:22:26', NULL, NULL, '2019-10-01 12:32:33', '2019-10-01 12:32:33', 5, 391, 'valentin@techorbit.com', 4),
(403, '$2a$11$d0512h7EJXzmahuimLw1bOcokrZQErRPuQCtoWL2sIZ3Glj/Q2IVm', NULL, '2019-10-01 19:22:28', '2019-10-01 19:22:28', 0, '2019-10-01 19:22:28', '2019-10-01 19:22:28', NULL, NULL, '2019-10-01 12:50:40', '2019-10-01 12:50:40', 5, 392, 'jignesh@paynetpayments.com', 4),
(404, '$2a$11$Nbp5OOPXc84/37H66QoJUuLNIAqzY8y3mZ28NfdQ.WdRGSQGceqYe', NULL, '2019-10-01 19:22:28', '2019-10-01 19:22:28', 0, '2019-10-01 19:22:28', '2019-10-01 19:22:28', NULL, NULL, '2019-10-01 13:02:14', '2019-10-01 13:02:14', 5, 393, 'test@test.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `utility_bills`
--

DROP TABLE IF EXISTS `utility_bills`;
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utility_plans`
--

DROP TABLE IF EXISTS `utility_plans`;
CREATE TABLE IF NOT EXISTS `utility_plans` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `utility_service_provider_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_plans`
--

INSERT INTO `utility_plans` (`id`, `plan_name`, `amount`, `utility_service_provider_id`, `created_at`, `updated_at`) VALUES
(1, 'Single Seater', NULL, 1, '2019-07-25 23:54:16', '2019-07-25 23:54:16'),
(2, 'One Day Seater', NULL, 1, '2019-07-25 23:54:51', '2019-07-25 23:54:51'),
(3, 'Private Cabin', NULL, 1, '2019-07-25 23:55:23', '2019-07-25 23:55:23'),
(4, 'Monthly Plan', NULL, 1, '2019-08-08 05:59:12', '2019-08-08 05:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `utility_service_providers`
--

DROP TABLE IF EXISTS `utility_service_providers`;
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_service_providers`
--

INSERT INTO `utility_service_providers` (`id`, `business_name`, `address`, `license_no`, `owner_name`, `email_id`, `service_tax_unit`, `provider_type`, `phone_no`, `created_at`, `updated_at`) VALUES
(1, 'VCPL', 'Kini Arcade', '', '', 'abc@ccd.com', 18, 'Internet Service Provider', 1234567890, '2019-07-25 23:51:42', '2019-07-25 23:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `utility_service_provider_members`
--

DROP TABLE IF EXISTS `utility_service_provider_members`;
CREATE TABLE IF NOT EXISTS `utility_service_provider_members` (
  `id` int(11) NOT NULL,
  `utility_service_provider_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `utility_plan_id` int(11) DEFAULT NULL,
  `member_balance` double DEFAULT NULL,
  `initial_outstanding` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utility_service_provider_members`
--

INSERT INTO `utility_service_provider_members` (`id`, `utility_service_provider_id`, `member_id`, `created_at`, `updated_at`, `utility_plan_id`, `member_balance`, `initial_outstanding`) VALUES
(1, 1, 91, '2019-07-25 23:53:54', '2019-07-25 23:58:42', 3, -18000, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `society_service_providers`
--
ALTER TABLE `society_service_providers`
  ADD CONSTRAINT `society_service_providers_ibfk_2` FOREIGN KEY (`society_id`) REFERENCES `societies` (`id`),
  ADD CONSTRAINT `society_service_providers_ibfk_1` FOREIGN KEY (`service_provider_id`) REFERENCES `service_providers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
