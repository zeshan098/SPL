-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 02:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `standpharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) NOT NULL,
  `product` varchar(100) DEFAULT NULL,
  `spb_amt` varchar(100) DEFAULT NULL,
  `current_biz` varchar(100) DEFAULT NULL,
  `proj_biz` varchar(100) DEFAULT NULL,
  `tot_proj` varchar(100) DEFAULT NULL,
  `cost_of_activity` varchar(100) DEFAULT NULL,
  `case_id` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `product`, `spb_amt`, `current_biz`, `proj_biz`, `tot_proj`, `cost_of_activity`, `case_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'VENALAX SR 75mg CAP.', '1', '2', '2', '4.00', '0.06', 1, '2019-04-27 15:54:55', NULL, '2019-04-27 15:54:55', NULL),
(2, 'VENALAX 37.5mg TAB.', '5', '5', '5', '10.00', '0.18', 1, '2019-04-27 15:54:55', NULL, '2019-04-27 15:54:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `code`, `name`) VALUES
(1, '1', 'TABLET'),
(2, '2', 'CAPSULE'),
(3, '3', 'SYRUP'),
(4, '4', 'SUSPENSION'),
(5, '5', 'INJECTION'),
(6, '6', 'INFUSION'),
(7, '7', 'DROPS'),
(8, '8', 'SACHET'),
(9, '9', 'LIQUID'),
(10, '10', 'TAB'),
(11, '11', 'ALI'),
(12, '12', '300MG'),
(13, '13', 'GEL'),
(14, '14', 'SPLASH SHEAT'),
(15, '15', 'CARTN'),
(16, '16', 'LABEL'),
(17, '17', 'COMMERCIAL CARTON'),
(18, '18', 'PHYSICIAN SAMPLE CARTON'),
(19, '19', 'PACK INSRAT'),
(20, '20', 'ALUMINIUM FOIL'),
(21, '21', 'SHEET'),
(22, '22', 'SMALL INNER'),
(23, '23', 'LARGE INNER'),
(24, '24', '20MG ALUMINIUM FOIL 135MM'),
(25, '25', 'INEER'),
(26, '26', 'CISEC'),
(27, '27', 'VILOC TAB 250MG'),
(28, '28', 'VILOC TAB 500'),
(29, '29', 'VILOC TAB 500MG'),
(30, '30', 'EMPTY SHELL # 0'),
(31, '31', 'BLUDOL TABLET 200MG'),
(32, '32', 'EMPTY SHELL # 3'),
(33, '33', 'TABLET300MG'),
(34, '34', '250MG'),
(35, '35', '125MG'),
(36, '36', 'VILOC'),
(37, '37', 'NET FOR PROTOXIL INFUSION'),
(38, '38', '100MG TABLET'),
(39, '39', 'IV 100ML COMMERCIAL CARTON'),
(40, '40', 'POUCH'),
(41, '41', 'LINCTUS'),
(42, '42', 'TABLET PHYSICIAN SAMPLE CATON'),
(43, '43', 'SUSPENSION 125MG'),
(44, '44', 'IV INFUSION 100ML'),
(45, '45', 'IV INFUSION 100ML PHYSICIAN SAMPLE CARTON'),
(46, '46', '3CC'),
(47, '47', 'AMPOULE'),
(48, '48', 'PLUG'),
(49, '49', 'WHITE CAP'),
(50, '50', 'WHITE'),
(51, '51', '4MG'),
(52, '52', '20MG'),
(53, '53', '30MG'),
(54, '54', '50MG'),
(55, '55', 'CAPSULE 50MG'),
(56, '56', '200MG'),
(57, '57', 'TABLET 0.5MG'),
(58, '58', '10MG'),
(59, '59', '(TRANSPRENT)'),
(60, '60', '50/850MG'),
(61, '61', '(MILKY WHITE)'),
(62, '62', '20CC'),
(63, '63', 'ALUMUINM FOIL 240MM'),
(64, '64', '(IMPORTED)'),
(65, '65', '300 MICRON'),
(66, '66', '1 LITTER');

-- --------------------------------------------------------

--
-- Table structure for table `dr_cases`
--

CREATE TABLE `dr_cases` (
  `id` bigint(20) NOT NULL,
  `team` varchar(100) DEFAULT NULL,
  `zone` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `station` varchar(100) DEFAULT NULL,
  `dr_name` varchar(100) DEFAULT NULL,
  `hospital_name` varchar(500) DEFAULT NULL,
  `pharmacy_name` varchar(500) DEFAULT NULL,
  `discount_details` varchar(1000) DEFAULT NULL,
  `dr_designation` varchar(500) DEFAULT NULL,
  `salutation` varchar(100) DEFAULT NULL,
  `salutation_specify` varchar(500) DEFAULT NULL,
  `ppb` varchar(100) DEFAULT NULL,
  `last_visit_date` datetime DEFAULT NULL,
  `case_type` varchar(100) DEFAULT NULL,
  `committed_biz` varchar(100) DEFAULT NULL,
  `actual_biz` varchar(100) DEFAULT NULL,
  `spb_amt` varchar(100) DEFAULT NULL,
  `committed_time` varchar(100) DEFAULT NULL,
  `actual_time` varchar(100) DEFAULT NULL,
  `coa` varchar(100) DEFAULT NULL COMMENT 'cost of activity',
  `success` varchar(100) DEFAULT NULL,
  `activity_name` varchar(1000) DEFAULT NULL COMMENT 'activity data',
  `ytd_spb_rate` varchar(100) DEFAULT NULL COMMENT 'activity data',
  `ytd_sale` varchar(100) DEFAULT NULL COMMENT 'activity data',
  `ytd_spb_c_y` varchar(100) DEFAULT NULL COMMENT 'activity data',
  `ytd_ratio` varchar(100) DEFAULT NULL COMMENT 'activity data',
  `duration_month` varchar(100) DEFAULT NULL COMMENT 'activity data',
  `t_coa` varchar(100) DEFAULT NULL COMMENT 'activity data (total cost of activity)',
  `spb_sum` varchar(100) DEFAULT NULL COMMENT 'activity_data',
  `current_biz_sum` varchar(100) DEFAULT NULL COMMENT 'activity_data',
  `proj_biz_sum` varchar(100) DEFAULT NULL COMMENT 'activity_data',
  `tot_proj_sum` varchar(100) DEFAULT NULL COMMENT 'activity_data',
  `is_completed` bit(1) DEFAULT b'0',
  `zm_remarks` text,
  `nsm_remarks` text,
  `pm_remarks` text,
  `fmccrsid` varchar(100) DEFAULT NULL,
  `is_approved_zm` bit(1) DEFAULT b'0',
  `is_rejected_zm` bit(1) DEFAULT b'0',
  `zm_last_visit_date` datetime DEFAULT NULL,
  `zmccrsid` varchar(100) DEFAULT NULL,
  `is_approved_nsm` bit(1) DEFAULT b'0',
  `is_rejected_nsm` bit(1) DEFAULT b'0',
  `nsm_last_visit_date` datetime DEFAULT NULL,
  `nsmccrsid` varchar(100) DEFAULT NULL,
  `is_approved_pm` bit(1) DEFAULT b'0',
  `approved_amount` varchar(1000) DEFAULT NULL,
  `is_rejected_pm` bit(1) DEFAULT b'0',
  `pm_last_visit_date` datetime DEFAULT NULL,
  `payment_person` varchar(100) DEFAULT NULL,
  `pmccrsid` varchar(100) DEFAULT NULL,
  `concerned_zm` varchar(1000) DEFAULT NULL,
  `concerned_nsm` varchar(1000) DEFAULT NULL,
  `concerned_pm` varchar(1000) DEFAULT NULL,
  `current_case_handler` enum('fm','zm','nsm','pm') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dr_cases`
--

INSERT INTO `dr_cases` (`id`, `team`, `zone`, `district`, `station`, `dr_name`, `hospital_name`, `pharmacy_name`, `discount_details`, `dr_designation`, `salutation`, `salutation_specify`, `ppb`, `last_visit_date`, `case_type`, `committed_biz`, `actual_biz`, `spb_amt`, `committed_time`, `actual_time`, `coa`, `success`, `activity_name`, `ytd_spb_rate`, `ytd_sale`, `ytd_spb_c_y`, `ytd_ratio`, `duration_month`, `t_coa`, `spb_sum`, `current_biz_sum`, `proj_biz_sum`, `tot_proj_sum`, `is_completed`, `zm_remarks`, `nsm_remarks`, `pm_remarks`, `fmccrsid`, `is_approved_zm`, `is_rejected_zm`, `zm_last_visit_date`, `zmccrsid`, `is_approved_nsm`, `is_rejected_nsm`, `nsm_last_visit_date`, `nsmccrsid`, `is_approved_pm`, `approved_amount`, `is_rejected_pm`, `pm_last_visit_date`, `payment_person`, `pmccrsid`, `concerned_zm`, `concerned_nsm`, `concerned_pm`, `current_case_handler`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'NEON', 'QTA', 'QTA', 'QTA', 'Adil', 'Adil Hospital', 'Zeshan', 'No', 'MBBS', 'MO', 'Yes', 'Purchaser', '2019-04-04 00:00:00', 'retention', '5', '2', '5', '1', '8', '250.00', '40.00', 'Sale', '5', '2', '2', '100.00', '2', '0.12', '6.00', '2530.00', '2530.00', '5060.00', b'0', NULL, NULL, NULL, '5400', b'0', b'0', '2019-04-29 16:47:37', NULL, b'0', b'0', NULL, NULL, b'0', NULL, b'0', NULL, NULL, NULL, '104', '92', '9992', 'zm', '2019-04-27 15:54:55', NULL, '2019-04-29 16:47:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `escalation_hierarchies`
--

CREATE TABLE `escalation_hierarchies` (
  `id` bigint(20) NOT NULL,
  `fmccrsid` varchar(100) DEFAULT NULL,
  `zmccrsid` varchar(100) DEFAULT NULL,
  `nsmccrsid` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escalation_hierarchies`
--

INSERT INTO `escalation_hierarchies` (`id`, `fmccrsid`, `zmccrsid`, `nsmccrsid`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '1000', '101', '94', NULL, NULL, NULL, NULL),
(2, '1200', '101', '94', NULL, NULL, NULL, NULL),
(3, '1300', '101', '94', NULL, NULL, NULL, NULL),
(4, '1400', '101', '94', NULL, NULL, NULL, NULL),
(5, '1500', '101', '94', NULL, NULL, NULL, NULL),
(6, '1600', '101', '94', NULL, NULL, NULL, NULL),
(7, '1700', '102', '94', NULL, NULL, NULL, NULL),
(8, '1800', '102,112,115,109,118', '92', NULL, NULL, NULL, NULL),
(9, '1900', '102,112,115,109,118', '93', NULL, NULL, NULL, NULL),
(10, '2000', '102', '94', NULL, NULL, NULL, NULL),
(11, '2100', '102', '94', NULL, NULL, NULL, NULL),
(12, '2200', '102', '94', NULL, NULL, NULL, NULL),
(13, '2300', '102', '94', NULL, NULL, NULL, NULL),
(14, '2400', '103', '94', NULL, NULL, NULL, NULL),
(15, '2500', '103', '94', NULL, NULL, NULL, NULL),
(16, '2600', '103', '94', NULL, NULL, NULL, NULL),
(17, '2700', '103', '94', NULL, NULL, NULL, NULL),
(18, '2800', '104', '94', NULL, NULL, NULL, NULL),
(19, '2900', '105', '91', NULL, NULL, NULL, NULL),
(20, '3000', '105', '91', NULL, NULL, NULL, NULL),
(21, '3100', '105', '91', NULL, NULL, NULL, NULL),
(22, '3200', '106', '91', NULL, NULL, NULL, NULL),
(23, '3300', '106', '91', NULL, NULL, NULL, NULL),
(24, '3400', '106', '91', NULL, NULL, NULL, NULL),
(25, '3500', '107', '91', NULL, NULL, NULL, NULL),
(26, '3600', '107', '91', NULL, NULL, NULL, NULL),
(27, '3800', '108', '92', NULL, NULL, NULL, NULL),
(28, '3900', '108', '92', NULL, NULL, NULL, NULL),
(29, '4000', '108', '92', NULL, NULL, NULL, NULL),
(30, '4100', '108', '92', NULL, NULL, NULL, NULL),
(31, '4200', '108', '92', NULL, NULL, NULL, NULL),
(32, '4300', '108', '92', NULL, NULL, NULL, NULL),
(33, '4400', '109', '92', NULL, NULL, NULL, NULL),
(34, '4600', '102,112,115,109,118', '92', NULL, NULL, NULL, NULL),
(35, '4700', '102,112,115,109,118', '92', NULL, NULL, NULL, NULL),
(36, '4800', '102,112,115,109,118', '92', NULL, NULL, NULL, NULL),
(37, '4900', '102,112,115,109,118', '92', NULL, NULL, NULL, NULL),
(38, '5000', '110', '92', NULL, NULL, NULL, NULL),
(39, '5100', '110', '92', NULL, NULL, NULL, NULL),
(40, '5200', '110', '92', NULL, NULL, NULL, NULL),
(41, '5300', '110', '92', NULL, NULL, NULL, NULL),
(42, '5400', '104', '92', NULL, NULL, NULL, NULL),
(43, '5500', '111', '92', NULL, NULL, NULL, NULL),
(44, '5600', '111', '92', NULL, NULL, NULL, NULL),
(45, '5700', '111', '92', NULL, NULL, NULL, NULL),
(46, '5800', '111', '92', NULL, NULL, NULL, NULL),
(47, '5900', '111', '92', NULL, NULL, NULL, NULL),
(48, '6000', '111', '92', NULL, NULL, NULL, NULL),
(49, '6100', '112', '92', NULL, NULL, NULL, NULL),
(50, '6300', '112', '92', NULL, NULL, NULL, NULL),
(51, '6400', '112', '92', NULL, NULL, NULL, NULL),
(52, '6500', '112', '92', NULL, NULL, NULL, NULL),
(53, '6600', '112', '92', NULL, NULL, NULL, NULL),
(54, '6700', '113', '92', NULL, NULL, NULL, NULL),
(55, '6800', '113', '92', NULL, NULL, NULL, NULL),
(56, '6900', '113', '92', NULL, NULL, NULL, NULL),
(57, '7000', '113', '92', NULL, NULL, NULL, NULL),
(58, '7100', '104', '92', NULL, NULL, NULL, NULL),
(59, '7200', '114', '93', NULL, NULL, NULL, NULL),
(60, '7300', '114', '93', NULL, NULL, NULL, NULL),
(61, '7400', '114', '93', NULL, NULL, NULL, NULL),
(62, '7500', '114', '93', NULL, NULL, NULL, NULL),
(63, '7600', '114', '93', NULL, NULL, NULL, NULL),
(64, '7700', '114', '93', NULL, NULL, NULL, NULL),
(65, '7800', '115', '93', NULL, NULL, NULL, NULL),
(66, '8000', '102,112,115,109,118', '93', NULL, NULL, NULL, NULL),
(67, '8100', '102,112,115,109,118', '93', NULL, NULL, NULL, NULL),
(68, '8200', '102,112,115,109,118', '93', NULL, NULL, NULL, NULL),
(69, '8300', '102,112,115,109,118', '93', NULL, NULL, NULL, NULL),
(70, '8400', '116', '93', NULL, NULL, NULL, NULL),
(71, '8500', '116', '93', NULL, NULL, NULL, NULL),
(72, '8600', '116', '93', NULL, NULL, NULL, NULL),
(73, '8700', '116', '93', NULL, NULL, NULL, NULL),
(74, '8800', '104', '93', NULL, NULL, NULL, NULL),
(75, '8900', '107', '91', NULL, NULL, NULL, NULL),
(76, '9000', '108', '92', NULL, NULL, NULL, NULL),
(77, '9100', '101', '94', NULL, NULL, NULL, NULL),
(78, '9200', '112,109', '92', NULL, NULL, NULL, NULL),
(79, '9300', '102,115', '94', NULL, NULL, NULL, NULL),
(80, '9400', '117', '95', NULL, NULL, NULL, NULL),
(81, '9500', '117', '95', NULL, NULL, NULL, NULL),
(82, '9600', '117', '95', NULL, NULL, NULL, NULL),
(83, '9700', '117', '95', NULL, NULL, NULL, NULL),
(84, '9900', '117', '95', NULL, NULL, NULL, NULL),
(85, '10000', '118', '95', NULL, NULL, NULL, NULL),
(86, '10200', '118', '95', NULL, NULL, NULL, NULL),
(87, '10300', '118', '95', NULL, NULL, NULL, NULL),
(88, '10400', '118', '95', NULL, NULL, NULL, NULL),
(89, '10500', '118', '95', NULL, NULL, NULL, NULL),
(90, '10600', '102,112,115,109,118', '92', NULL, NULL, NULL, NULL),
(91, '10700', '118', '95', NULL, NULL, NULL, NULL),
(92, '10800', '118', '95', NULL, NULL, NULL, NULL),
(93, '10900', '118', '95', NULL, NULL, NULL, NULL),
(94, '20000', '118', '95', NULL, NULL, NULL, NULL),
(95, '20300', '114', '93', NULL, NULL, NULL, NULL),
(96, '20400', '106,118', '91', NULL, NULL, NULL, NULL),
(97, '20500', '111', '92', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) NOT NULL,
  `item_code` varchar(100) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `description` text,
  `sale_price` varchar(100) DEFAULT NULL,
  `mrp` varchar(100) DEFAULT NULL,
  `finish_item_code` varchar(100) DEFAULT NULL,
  `date_con` datetime DEFAULT NULL,
  `user_name_con` varchar(100) DEFAULT NULL,
  `lock_yn` varchar(100) DEFAULT NULL,
  `brand_type_code` varchar(100) DEFAULT NULL,
  `shipper_qty` varchar(100) DEFAULT NULL,
  `reg_no` varchar(100) DEFAULT NULL,
  `moh` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_code`, `item_name`, `description`, `sale_price`, `mrp`, `finish_item_code`, `date_con`, `user_name_con`, `lock_yn`, `brand_type_code`, `shipper_qty`, `reg_no`, `moh`) VALUES
(1, 'FSP-A014', 'A-MAL 40/ 240 MG', 'A-MAL 40/ 240 MG', '115', '264', '', '2010-08-16 00:00:00', 'ADMINISTRATOR', '', '1', '50', '64629', 'N'),
(2, 'FSP-A016', 'A-MAL 80 MG /480 MG', 'A-MAL 80 MG /480 MG', '140', '327', '', '2013-05-03 00:00:00', 'ARSALAN.MASOOD', '', '1', '50', '74387', 'N'),
(3, 'FSP-A013', 'A-MAL INJ 80MG', 'A-MAL INJ 80MG', '33', '63.55', '', '2009-10-01 00:00:00', 'ADMINISTRATOR', '', '5', NULL, '49945', 'N'),
(4, 'FSP-A012', 'A-MAL TAB 20/120 MG', 'A-MAL TAB 20/120 MG', '140', '311.77', '', '2009-10-01 00:00:00', 'ADMINISTRATOR', '', '1', NULL, '57547', 'N'),
(5, 'GNC-A011', 'ALGICAL', 'ALGICAL', '195.5', '230', '', '2018-04-09 00:00:00', 'ADMINISTRATOR', '', NULL, '36', NULL, 'N'),
(6, 'FSP-A002', 'ARTICAM TAB 15mg', 'ARTICAM TAB 15mg', '117', '137.65', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '1', '200', '30834', 'N'),
(7, 'FSP-A001', 'ARTICAM TAB 7.5mg', 'ARTICAM TAB 7.5mg', '67', '78.82', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '1', '200', '30833', 'N'),
(8, 'FSP-A003', 'ARTIFLEX 200mg Cap.', 'ARTIFLEX 200mg Cap.', '200', '235.29', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '2', '100', '30832', 'N'),
(9, 'FSP-B009', 'BLUDOL DS SUSPENSION 90 ML', 'BLUDOL DS SUSPENSION 90 ML', '61.15', '71.95', '', '2015-03-19 00:00:00', 'ADMINISTRATOR', '', '4', '50', '74381', 'N'),
(10, 'FSP-B006', 'BLUDOL SUSPENSION 120ml', 'BLUDOL SUSPENSION 120ml', '51.76', '60.9', '', '2015-03-10 00:00:00', 'ADMINISTRATOR', '', '4', '50', '18659', 'N'),
(11, 'FSP-B003', 'BLUDOL TABLET 400mg', 'BLUDOL TABLET 400mg', '197.2', '232', '', '2016-06-01 00:00:00', 'ADMINISTRATOR', '', '1', '60', '13104', 'N'),
(12, 'FSG-B003', 'BROLITE TABLET 3MG', 'BROLITE TABLET 3MG', '140', '164.7', '', '0000-00-00 00:00:00', '', '', '1', '200', '19236', 'N'),
(13, 'FSP-B011', 'BRONKEEZ 4MG SACHET', 'BRONKEEZ 4MG SACHET', '208.25', '245', '', '2016-07-20 00:00:00', 'ADMINISTRATOR', '', '8', '50', '41977', ''),
(14, 'FSP-B005', 'BRONKEEZ TAB 10MG', 'BRONKEEZ TAB 10MG', '258.4', '304', '', '2017-04-28 00:00:00', 'ADMINISTRATOR', '', '1', '50', '37768', 'N'),
(15, 'FSP-B007', 'BRONKEEZ TAB 4MG', 'BRONKEEZ TAB 4MG', '142.8', '168', '', '2015-07-01 00:00:00', 'ADMINISTRATOR', '', '1', '50', '49955', 'N'),
(16, 'FSP-B004', 'BRONKEEZ TAB 5MG', 'BRONKEEZ TAB 5MG', '212.5', '250', '', '2015-07-01 00:00:00', 'ADMINISTRATOR', '', '1', '50', '37767', 'N'),
(17, 'FSP-C003', 'CEFGARD CAP. 250mg', 'CEFGARD CAP. 250mg', '233.75', '275', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '2', '120', '21342', 'N'),
(18, 'FSP-C004', 'CEFGARD CAP. 500mg', 'CEFGARD CAP. 500mg', '422.15', '496.65', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '2', '120', '21343', 'N'),
(19, 'FSP-C005', 'CEFGARD DROPS 50mg', 'CEFGARD DROPS 50mg', '84.15', '99', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '7', '80', '21210', 'N'),
(20, 'FSP-C007', 'CEFGARD FORTE SUSP. 250mg', 'CEFGARD FORTE SUSP. 250mg', '259.16', '304.9', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '4', '50', '19235', 'N'),
(21, 'FSP-C006', 'CEFGARD SUSP. 125mg', 'CEFGARD SUSP. 125mg', '168.13', '197.8', '', '2017-04-28 00:00:00', 'ADMINISTRATOR', '', '4', '50', '19234', 'N'),
(22, 'FSP-C016', 'CEFIDOX SUSPENSION', 'CEFIDOX SUSPENSION', '153', '180', '', '2017-04-28 00:00:00', 'ADMINISTRATOR', '', '4', '50', '49960', 'N'),
(23, 'FSP-C019', 'CEFIDOX TABLET 100MG', 'CEFIDOX TABLET 100MG', '249', '292.94', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '1', '100', '49957', 'N'),
(24, 'FSG-C004', 'CEFIX 200MG CAP', 'CEFIX 200MG CAP', '134.3', '158', '', '2016-06-15 00:00:00', 'ADMINISTRATOR', '', '2', '100', '37591', 'N'),
(25, 'FSG-C001', 'CEFIX 400MG  CAP', 'CEFIX 400MG  CAP', '285.6', '336', '', '2015-01-01 00:00:00', 'ADMINISTRATOR', '', '2', '100', '23516', 'N'),
(26, 'FSP-C015', 'CEFIX DS 30ML', 'CEFIX DS 30ML', '212.5', '250', '', '2015-03-04 00:00:00', 'ADMINISTRATOR', '', '4', '50', '40953', 'N'),
(27, 'FSG-C002', 'CEFIX SUSPENSION 30ml', 'CEFIX SUSPENSION 30ml', '136', '160', '', '2015-01-01 00:00:00', 'ADMINISTRATOR', '', '4', '50', '23517', 'N'),
(28, 'FSG-C003', 'CEFIX SUSPENSION 60ml', 'CEFIX SUSPENSION 60ml', '178', '209.41', '', '2015-01-01 00:00:00', 'ADMINISTRATOR', '', '4', '25', '23517', 'N'),
(29, 'FSP-C022', 'CISEC 40MG', 'CISEC 40MG', '230', '270.59', '', '2010-09-06 00:00:00', 'ADMINISTRATOR', '', '2', '100', '64618', 'N'),
(30, 'FSP-C011', 'CISEC CAPSULE 20MG', 'CISEC CAPSULE 20MG', '159', '187.06', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '2', '100', '18721', 'N'),
(31, 'FSP-C029', 'COLDREX SYRUP 120 ML', 'COLDREX SYRUP 120 ML', '59.44', '69.93', '', '2016-06-15 00:00:00', 'ADMINISTRATOR', '', '3', '50', '18655', 'N'),
(32, 'FSP-C018', 'COLDREX SYRUP 90ML', 'COLDREX SYRUP 90ML', '34.85', '41', '', '2015-03-10 00:00:00', 'ADMINISTRATOR', '', '3', '50', '18655', 'N'),
(33, 'FSP-C008', 'COLDREX TABLET', 'COLDREX TABLET', '169.96', '199.95', '', '2016-06-15 00:00:00', 'ADMINISTRATOR', '', '1', '60', '5983', 'N'),
(34, 'FSP-C010', 'COLDREX-E SYRUP 120ml', 'COLDREX-E SYRUP 120ml', '58.5', '68.8', '', '2015-03-10 00:00:00', 'ADMINISTRATOR', '', '3', '50', '25616', 'N'),
(35, 'GNC-C001', 'COMFY COLIC  DROPS 20ML', 'COMFY COLIC  DROPS 20ML', '54.4', '64', '', '0000-00-00 00:00:00', '', '', NULL, '92', NULL, 'N'),
(36, 'GNC-C002', 'COMFY COLIC  SYRUP 60ML', 'COMFY COLIC  SYRUP 60ML', '45.05', '53', '', '2010-07-28 00:00:00', 'Ashraf', '', NULL, '50', NULL, 'N'),
(37, 'GNC-C004', 'COMFY INSTA SYRUP', 'COMFY INSTA SYRUP', '180.2', '212', '', '2019-03-18 00:00:00', '', '', NULL, '50', '547.0015', 'N'),
(38, 'GNC-C003', 'COMFY SYRUP 90 ML', 'COMFY SYRUP 90 ML', '67.15', '79', '', '2016-06-16 00:00:00', 'Ashraf', '', NULL, NULL, NULL, 'N'),
(39, 'FSP-C001', 'CURITOL 200MG TABLET', 'CURITOL 200MG TABLET', '131', '154.12', '', '0000-00-00 00:00:00', '', '', '1', '200', '14291', 'N'),
(40, 'FSP-C002', 'CURITOL INFUSION 100ml', 'CURITOL INFUSION 100ml', '230', '270.6', '', '2016-06-01 00:00:00', 'ADMINISTRATOR', '', '6', '25', '20955', 'N'),
(41, 'FSP-C013', 'CURITOL TAB.400mg', 'CURITOL TAB.400mg', '127.5', '150', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '1', '200', '38212', 'N'),
(42, 'FSG-D010', 'D-TONE', 'D-TONE', '79', '92.9', '', '0000-00-00 00:00:00', '', '', '1', '200', '27643', 'N'),
(43, 'FSP-A006', 'DEACT INJ 1G', 'DEACT INJ 1G', '212.5', '250', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '5', '84', '49939', 'N'),
(44, 'FSP-A007', 'DEACT INJ 2G', 'DEACT INJ 2G', '297.5', '350', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '5', '84', '49940', 'N'),
(45, 'FSP-D005', 'DELIP TABLET 10mg', 'DELIP TABLET 10mg', '138', '162.35', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '1', '200', '28609', 'N'),
(46, 'FSP-D006', 'DELIP TABLET 20mg', 'DELIP TABLET 20mg', '229', '269.41', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '1', '200', '28610', 'N'),
(47, 'FSP-D007', 'DISTOL', 'DISTOL', '199', '234.11', '', '2011-02-09 00:00:00', 'ADMINISTRATOR', '', '1', '100', '64619', 'N'),
(48, 'FSP-E006', 'ELAXINE 15 MG TAB', 'ELAXINE 15 MG TAB', '330', '388.3', '', '2016-04-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '41964', 'N'),
(49, 'FSP-E007', 'ELAXINE 30 MG TAB', 'ELAXINE 30 MG TAB', '600', '705.9', '', '2016-04-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '41965', 'N'),
(50, 'FSP-E008', 'ESCILAM 10 MG TAB', 'ESCILAM 10 MG TAB', '140', '164.7', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '1', '200', '41960', 'N'),
(51, 'FSP-E009', 'ESCILAM 20MG TAB', 'ESCILAM 20MG TAB', '327', '384.7', '', '2015-07-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '49108', 'N'),
(52, 'FSP-E002', 'ESCORT 2mg Tab.', 'ESCORT 2mg Tab.', '41.65', '49', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '1', '100', '41962', 'Y'),
(53, 'FSP-E003', 'ESCORT 4mg Tab.', 'ESCORT 4mg Tab.', '75.65', '89', '', '0000-00-00 00:00:00', '', '', NULL, '100', '41963', 'Y'),
(54, 'FSP-F002', 'FAXIM TABLET 200MG', 'FAXIM TABLET 200MG', '141', '165.88', '', '2017-06-05 00:00:00', 'ADMINISTRATOR', '', '1', '100', '83855', 'N'),
(55, 'FSP-F003', 'FAXIM TABLET 550MG', 'FAXIM TABLET 550MG', '413', '485.88', '', '2017-06-05 00:00:00', 'ADMINISTRATOR', '', '1', '100', '83854', 'N'),
(56, 'FSP-F001', 'FENKIL TABLET', 'FENKIL TABLET', '299', '351.76', '', '2015-07-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '17190', 'N'),
(57, 'FSG-F003', 'FURITAX INJ. 1gm', 'FURITAX INJ. 1gm', '198', '233', '', '2015-06-04 00:00:00', 'ADMINISTRATOR', '', '5', '50', '22340', 'N'),
(58, 'FSG-F001', 'FURITAX INJ. 250 MG', 'FURITAX INJ. 250 MG', '76', '89.5', '', '2015-06-04 00:00:00', 'ADMINISTRATOR', '', '5', '50', '25452', 'N'),
(59, 'FSG-F002', 'FURITAX INJ. 500mg', 'FURITAX INJ. 500mg', '134', '157.64', '', '2015-06-04 00:00:00', 'ADMINISTRATOR', '', '5', '50', '25453', 'N'),
(60, 'FSP-G003', 'GABIUN CAP 100MG', 'GABIUN CAP 100MG', '238.85', '281', '', '2017-09-22 00:00:00', 'ADMINISTRATOR', '', '2', '100', '84077', 'N'),
(61, 'FSP-G001', 'GABIUN CAP 50 MG', 'GABIUN CAP 50 MG', '178', '209.41', '', '2017-09-22 00:00:00', 'ADMINISTRATOR', '', '2', '100', '84078', 'N'),
(62, 'FSP-G002', 'GABIUN CAP 75MG', 'GABIUN CAP 75MG', '212', '249.41', '', '2017-09-22 00:00:00', 'ADMINISTRATOR', '', '2', '100', '84082', 'N'),
(63, 'FSP-L016', 'LEVRA 250 MG', 'LEVRA 250 MG', '535.5', '630', '', '2013-05-07 00:00:00', 'ADMINISTRATOR', '', '1', NULL, '74384', 'N'),
(64, 'FSP-L040', 'LEVRA 500MG', 'LEVRA 500MG', '326', '383.52', '', '2016-06-01 00:00:00', 'ADMINISTRATOR', '', '1', NULL, '69272', 'N'),
(65, 'GNC-L001', 'LINCTUS 120 ML', 'LINCTUS 120 ML', '150', '176.4', '', '0000-00-00 00:00:00', '', '', '41', '50', NULL, 'N'),
(66, 'FSP-L009', 'LOMOGIN 100 MG TAB', 'LOMOGIN 100 MG TAB', '488', '574.11', '', '2016-06-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '41973', 'N'),
(67, 'FSP-L011', 'LOMOGIN 25MG TAB', 'LOMOGIN 25MG TAB', '254', '298.82', '', '2013-11-04 00:00:00', 'ADMINISTRATOR', '', '1', '200', '49107', 'N'),
(68, 'FSP-L008', 'LOMOGIN 50 MG TAB', 'LOMOGIN 50 MG TAB', '382.5', '450', '', '2013-11-04 00:00:00', 'ADMINISTRATOR', '', '1', '200', '41974', 'N'),
(69, 'FSP-L006', 'LOPROS 1mg Tab.', 'LOPROS 1mg Tab.', '108.8', '128', '', '2012-03-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '20283', 'N'),
(70, 'FSP-L007', 'LOPROS 2mg Tab.', 'LOPROS 2mg Tab.', '164.9', '194', '', '2012-03-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '20284', 'N'),
(71, 'FSP-L012', 'LOPROS 5MG', 'LOPROS 5MG', '393.55', '463', '', '2012-03-01 00:00:00', 'ADMINISTRATOR', '', '1', '100', '20285', 'N'),
(72, 'FSP-L003', 'LOREL SYRUP 60ml', 'LOREL SYRUP 60ml', '46.75', '55', '', '2015-03-02 00:00:00', 'ADMINISTRATOR', '', '3', '50', '20951', 'N'),
(73, 'FSP-L004', 'LOREL TABLET', 'LOREL TABLET', '68', '80', '', '2017-04-28 00:00:00', 'ADMINISTRATOR', '', '1', '200', '21349', 'N'),
(74, 'FSG-M004', 'MOTAAR DISPERSIBLE TAB', 'MOTAAR DISPERSIBLE TAB', '82', '96.5', '', '2015-03-02 00:00:00', 'ADMINISTRATOR', '', '1', '100', '23527', 'N'),
(75, 'FSG-M006', 'MOTAAR INJ. 3ML X 10', 'MOTAAR INJ. 3ML X 10', '89', '178', '', '2016-08-01 00:00:00', 'ADMINISTRATOR', '', '5', NULL, '20551', 'N'),
(76, 'FSG-M001', 'MOTAAR INJECTION 3ml X 5', 'MOTAAR INJECTION 3ml X 5', '29.5', '57.64', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '5', '72', '20551', 'N'),
(77, 'FSG-M003', 'MOTAAR SR TABLET 100mg', 'MOTAAR SR TABLET 100mg', '222', '261.17', '', '0000-00-00 00:00:00', '', '', '1', '200', '20950', 'N'),
(78, 'FSG-M002', 'MOTAAR TABLET 50mg', 'MOTAAR TABLET 50mg', '80', '94.2', '', '2016-04-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '19238', 'N'),
(79, 'FSP-N016', 'NEON 1gm Inj', 'NEON 1gm Inj', '234.6', '276', '', '2016-06-15 00:00:00', 'ADMINISTRATOR', '', '5', '84', '34030', 'N'),
(80, 'FSP-N026', 'NEON 250MG IV', 'NEON 250MG IV', '90.9', '107', '', '2017-04-25 00:00:00', 'ADMINISTRATOR', '', '5', '88', NULL, 'N'),
(81, 'FSP-N015', 'NEON 250mg Inj', 'NEON 250mg Inj', '90.9', '107', '', '2016-06-15 00:00:00', 'ADMINISTRATOR', '', '5', '88', '34029', 'N'),
(82, 'FSP-N019', 'NEON 500mg IM', 'NEON 500mg IM', '146.2', '172', '', '2016-06-15 00:00:00', 'ADMINISTRATOR', '', '5', '88', '49105', 'N'),
(83, 'FSP-N020', 'NEON 500mg IV', 'NEON 500mg IV', '146.2', '172', '', '2016-06-15 00:00:00', 'ADMINISTRATOR', '', '5', '88', '49106', 'N'),
(84, 'FSP-N011', 'NERVEX 100 MG TAB', 'NERVEX 100 MG TAB', '59', '69.41', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '1', '200', '41999', 'N'),
(85, 'FSP-N021', 'NERVEX 300 MG', 'NERVEX 300 MG', '149', '175.29', '', '2015-03-02 00:00:00', 'ADMINISTRATOR', '', '1', '200', '49954', 'N'),
(86, 'FSP-N012', 'NERVEX 400 MG TAB', 'NERVEX 400 MG TAB', '210', '247', '', '2016-06-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '42502', 'N'),
(87, 'FSP-N013', 'NERVEX 600 MG TAB', 'NERVEX 600 MG TAB', '204', '240', '', '2013-07-30 00:00:00', 'ADMINISTRATOR', '', '1', '100', '41971', 'N'),
(88, 'FSP-N001', 'NEUXAM TABLET 0.25mg', 'NEUXAM TABLET 0.25mg', '132', '155.29', '', '2016-06-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '17187', 'N'),
(89, 'FSP-N002', 'NEUXAM TABLET 0.5mg', 'NEUXAM TABLET 0.5mg', '179', '210.58', '', '2016-06-15 00:00:00', 'ADMINISTRATOR', '', '1', '200', '13105', 'N'),
(90, 'FSP-N003', 'NEUXAM TABLET 1.0mg', 'NEUXAM TABLET 1.0mg', '350', '411.76', '', '2012-01-05 00:00:00', 'ADMINISTRATOR', '', '1', '200', '14292', 'N'),
(91, 'FSP-N018', 'NIKAL INJ 500 µG', 'NIKAL INJ 500 µG', '297.5', '350', '', '2013-03-25 00:00:00', 'ADMINISTRATOR', '', '5', '56', '37708', 'N'),
(92, 'FSP-N017', 'NIKAL TABLET 500 µG', 'NIKAL TABLET 500 µG', '100.3', '118', '', '2013-03-25 00:00:00', 'ADMINISTRATOR', '', '1', '200', '41978', 'N'),
(93, 'FSA-N006', 'NIRVANOL TABLET 10mg', 'NIRVANOL TABLET 10mg', '146', '171.8', '', '2016-06-15 00:00:00', 'ADMINISTRATOR', '', '1', '200', '41976', 'N'),
(94, 'FSA-N005', 'NIRVANOL TABLET 5mg', 'NIRVANOL TABLET 5mg', '82', '96.5', '', '2016-06-15 00:00:00', 'ADMINISTRATOR', '', '1', '200', '41975', 'N'),
(95, 'FSG-D003', 'OMEPLUS 20MG CAP', 'OMEPLUS 20MG CAP', '136', '160', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '2', '100', '41693', 'N'),
(96, 'FSG-D004', 'OMEPLUS 40MG CAP', 'OMEPLUS 40MG CAP', '251', '295.29', '', '2011-12-30 00:00:00', 'ADMINISTRATOR', '', '2', '50', '41694', 'N'),
(97, 'FSP-O005', 'OPERAZOL 40 MG', 'OPERAZOL 40 MG', '157', '184.7', '', '2010-10-11 00:00:00', 'ADMINISTRATOR', '', '1', '200', '65678', 'N'),
(98, 'FSP-O006', 'OXEPIN CAPS', 'OXEPIN CAPS', '333.2', '392', '', '2017-09-22 00:00:00', 'ADMINISTRATOR', '', '2', '100', '84075', 'N'),
(99, 'FSP-P004', 'PARACET INFUSION 100ML', 'PARACET INFUSION 100ML', '92.65', '109', '', '2017-05-25 00:00:00', 'ADMINISTRATOR', '', '5', '25', '83853', 'N'),
(100, 'FSG-X001', 'PATIN TAB', 'PATIN TAB', '195', '229.41', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '1', '100', '49953', 'N'),
(101, 'GNC-P006', 'PEDIA 60ML SYRUP', 'PEDIA 60ML SYRUP', '45.05', '53', '', '2009-05-12 00:00:00', 'Ashraf', '', NULL, NULL, NULL, 'N'),
(102, 'GNC-P001', 'PEDIA COLIC DROPS 20ML', 'PEDIA COLIC DROPS 20ML', '54.4', '64', '', '2008-09-23 00:00:00', 'ADMINISTRATOR', '', NULL, '48', NULL, 'N'),
(103, 'GNC-P007', 'PEDIA SYRUP 90 ML', 'PEDIA SYRUP 90 ML', '67.15', '79', '', '2016-06-16 00:00:00', 'Ashraf', '', NULL, '50', NULL, 'N'),
(104, 'FSG-P001', 'PROTOXIL INFUSION 100ml', 'PROTOXIL INFUSION 100ml', '59', '93.9', '', '2013-04-02 00:00:00', 'ADMINISTRATOR', '', '6', '25', '21352', 'N'),
(105, 'FSP-R003', 'RANAX INJECTION 2ml', 'RANAX INJECTION 2ml', '89.25', '105', '', '2017-04-28 00:00:00', 'ADMINISTRATOR', '', '5', '100', '20550', 'N'),
(106, 'FSP-R001', 'RANAX TABLET 150mg', 'RANAX TABLET 150mg', '71.4', '84', '', '2017-04-28 00:00:00', 'ADMINISTRATOR', '', '1', '100', '14299', 'N'),
(107, 'FSP-R002', 'RANAX TABLET 300mg', 'RANAX TABLET 300mg', '108', '127.1', '', '2017-04-28 00:00:00', 'ADMINISTRATOR', '', '1', '100', '17189', 'N'),
(108, 'FSP-R004', 'RESQUE CAPSULE', 'RESQUE CAPSULE', '169.15', '199', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '2', '200', '20956', 'N'),
(109, 'FSP-R005', 'RESQUE SUSPENSION', 'RESQUE SUSPENSION', '148.75', '175', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '4', '50', '20957', 'N'),
(110, 'FSP-L041', 'RID-URIC 40MG TABLET', 'RID-URIC 40MG TABLET', '212.5', '250', '', '2017-07-07 00:00:00', 'ADMINISTRATOR', '', '1', '100', '84080', 'N'),
(111, 'FSP-L042', 'RID-URIC 80 MG TABLET', 'RID-URIC 80 MG TABLET', '425', '500', '', '2017-07-07 00:00:00', 'ADMINISTRATOR', '', '1', '100', '84076', 'N'),
(112, 'FSP-R008', 'RIOMED 125 MG SUSP.', 'RIOMED 125 MG SUSP.', '229.93', '270.5', '', '2011-11-30 00:00:00', 'ADMINISTRATOR', '', '4', '50', '30829', 'N'),
(113, 'FSP-R006', 'RIOMED 250 MG TAB.', 'RIOMED 250 MG TAB.', '175.95', '207', '', '2011-11-30 00:00:00', 'ADMINISTRATOR', '', '1', '200', '30827', 'N'),
(114, 'FSP-R007', 'RIOMED 500 MG TAB.', 'RIOMED 500 MG TAB.', '327', '384.7', '', '2011-11-30 00:00:00', 'ADMINISTRATOR', '', '1', '100', '30828', 'N'),
(115, 'FSP-S007', 'SAPRIDE TAB 25 MG', 'SAPRIDE TAB 25 MG', '146', '171.8', '', '2016-06-27 00:00:00', 'ADMINISTRATOR', '', '1', '200', '49949', 'N'),
(116, 'FSP-S008', 'SAPRIDE TAB 50 MG', 'SAPRIDE TAB 50 MG', '215', '252.94', '', '2016-06-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '49950', 'N'),
(117, 'GNC-S001', 'SEED', 'SEED', '250.75', '295', '', '2018-07-30 00:00:00', 'ADMINISTRATOR', '', NULL, '72', NULL, 'N'),
(118, 'FSP-S013', 'SPLASH', 'SPLASH', '103', '121.18', '', '2012-04-02 00:00:00', 'ADMINISTRATOR', '', '8', NULL, '64644', 'N'),
(119, 'FSP-S011', 'STANFLOX 250 MG TABS', 'STANFLOX 250 MG TABS', '119', '140', '', '2015-03-02 00:00:00', 'ADMINISTRATOR', '', '1', '100', '53676', 'N'),
(120, 'FSP-S012', 'STANFLOX 500 MG TABS', 'STANFLOX 500 MG TABS', '199', '234.12', '', '2015-03-02 00:00:00', 'ADMINISTRATOR', '', '1', '100', '53677', 'N'),
(121, 'FSP-S003', 'STANFLOX INFUSION 100ML', 'STANFLOX INFUSION 100ML', '208.93', '245.8', '', '2016-04-01 00:00:00', 'ADMINISTRATOR', '', '6', '25', '37590', 'N'),
(122, 'FSP-S002', 'STAXIN 400 MG TABS.', 'STAXIN 400 MG TABS.', '255', '300', '', '2016-06-15 00:00:00', 'ADMINISTRATOR', '', '1', '100', '38207', 'N'),
(123, 'FSP-S004', 'STAXIN IV INF 400mg', 'STAXIN IV INF 400mg', '299', '351.76', '', '2016-04-01 00:00:00', 'ADMINISTRATOR', '', '5', '12', '49059', 'N'),
(124, 'GNC-T001', 'TESTOFIN-F', 'TESTOFIN-F', '350', '411.76', '', '2015-10-16 00:00:00', 'ADMINISTRATOR', '', '1', '30', NULL, 'N'),
(125, 'GNC-T002', 'TESTOFIN-M', 'TESTOFIN-M', '442', '520', '', '2015-10-16 00:00:00', 'ADMINISTRATOR', '', '1', '30', NULL, 'N'),
(126, 'FSP-T004', 'TIZID INJ 1gm', 'TIZID INJ 1gm', '245.65', '289', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '5', '84', '24364', 'N'),
(127, 'FSP-T002', 'TIZID INJ 250mg', 'TIZID INJ 250mg', '98', '115.29', '', '2015-03-02 00:00:00', 'ADMINISTRATOR', '', '5', '88', '24362', 'N'),
(128, 'FSP-T003', 'TIZID INJ 500mg', 'TIZID INJ 500mg', '144.5', '170', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '5', '88', '24363', 'N'),
(129, 'FSP-T008', 'TRI-D INJECTION', 'TRI-D INJECTION', '67.15', '79', '', '2018-02-22 00:00:00', 'ADMINISTRATOR', '', '5', '100', '83856', 'N'),
(130, 'FSP-T006', 'TROMIT INJ 30MG/ML', 'TROMIT INJ 30MG/ML', '420', '494.1', '', '2016-06-01 00:00:00', 'ADMINISTRATOR', '', '5', '100', '49958', 'N'),
(131, 'FSG-V004', 'VENALAX 37.5mg TAB.', 'VENALAX 37.5mg TAB.', '332', '390.58', '', '2016-06-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '38206', 'N'),
(132, 'FSG-V005', 'VENALAX SR 75mg CAP.', 'VENALAX SR 75mg CAP.', '435', '511.76', '', '2016-06-01 00:00:00', 'ADMINISTRATOR', '', '1', '200', '40955', 'N'),
(133, 'FSP-V008', 'VETINIL 16 mg Tabs.', 'VETINIL 16 mg Tabs.', '276.25', '325', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '1', '200', '40957', 'N'),
(134, 'FSP-V007', 'VETINIL 8mg Tab.', 'VETINIL 8mg Tab.', '187', '220', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '1', '200', '40956', 'N'),
(135, 'FSP-V001', 'VEXNIL CAPSULE', 'VEXNIL CAPSULE', '100', '117.64', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '2', '200', '25451', 'N'),
(136, 'FSP-V002', 'VEXNIL INJECTION 2ml', 'VEXNIL INJECTION 2ml', '158.95', '187', '', '2011-02-09 00:00:00', 'SALE SHAHID', '', '5', '100', '22942', 'N'),
(137, 'FSP-V004', 'VEXNIL SR TAB', 'VEXNIL SR TAB', '182.75', '215', '', '2010-08-16 00:00:00', 'ADMINISTRATOR', '', '1', '200', '64741', 'N'),
(138, 'FSP-V011', 'VILIP 50 MG TAB', 'VILIP 50 MG TAB', '199.75', '235', '', '2018-11-05 00:00:00', 'ADMINISTRATOR', '', '1', '100', '83874', 'N'),
(139, 'FSP-V010', 'VILIP-M 50/1000 MG TAB', 'VILIP-M 50/1000 MG TAB', '297.5', '350', '', '2018-02-22 00:00:00', 'ADMINISTRATOR', '', '1', '100', '85862', 'N'),
(140, 'FSP-V009', 'VILIP-M 50/850 MG TAB', 'VILIP-M 50/850 MG TAB', '297.5', '350', '', '2018-02-22 00:00:00', 'ADMINISTRATOR', '', '1', '100', '85861', 'N'),
(141, 'FSG-V001', 'VILOC INFUSION 100ml', 'VILOC INFUSION 100ml', '136', '160', '', '2009-03-13 00:00:00', 'DIST USMAN', '', '6', '25', '20954', 'N'),
(142, 'FSG-V007', 'VILOC SUSPENSION 125 MG/ 5 ML', 'VILOC SUSPENSION 125 MG/ 5 ML', '81.38', '95.74', '', '0000-00-00 00:00:00', '', '', '36', '50', '74383', 'N'),
(143, 'FSG-V006', 'VILOC SUSPENSION 250 MG', 'VILOC SUSPENSION 250 MG', '139', '163.52', '', '2013-05-06 00:00:00', 'ADMINISTRATOR', '', '36', '50', '74382', 'N'),
(144, 'FSG-V002', 'VILOC TABLET 250MG', 'VILOC TABLET 250MG', '125', '147', '', '2009-05-13 00:00:00', 'DIST USMAN', '', '1', '100', '19232', 'N'),
(145, 'FSG-V003', 'VILOC TABLET 500mg', 'VILOC TABLET 500mg', '220', '259', '', '2009-05-13 00:00:00', 'DIST USMAN', '', '1', '100', '19233', 'N'),
(146, 'FSP-V003', 'VONDER CAPSULE', 'VONDER CAPSULE', '110', '129.5', '', '2016-04-01 00:00:00', 'ADMINISTRATOR', '', '2', '200', '18657', 'N'),
(147, 'FSG-Z001', 'ZOMACIN INJ. 100mg', 'ZOMACIN INJ. 100mg', '67', '78.82', '', '2015-03-02 00:00:00', 'ADMINISTRATOR', '', '5', '150', '23514', 'N'),
(148, 'FSG-Z002', 'ZOMACIN INJ. 250mg', 'ZOMACIN INJ. 250mg', '105', '123.52', '', '2015-03-02 00:00:00', 'ADMINISTRATOR', '', '5', '150', '23515', 'N'),
(149, 'FSG-Z003', 'ZOMACIN INJ. 500mg', 'ZOMACIN INJ. 500mg', '155', '182.35', '', '2015-03-02 00:00:00', 'ADMINISTRATOR', '', '5', '150', '22941', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `items_teams`
--

CREATE TABLE `items_teams` (
  `id` bigint(20) NOT NULL,
  `item_code` varchar(100) DEFAULT NULL,
  `team_id` varchar(100) DEFAULT NULL,
  `year_id` varchar(100) DEFAULT NULL,
  `lock_yn` varchar(100) DEFAULT NULL,
  `item_code_ps` varchar(100) DEFAULT NULL,
  `product_family` varchar(100) DEFAULT NULL,
  `maj_prd_share` varchar(100) DEFAULT NULL,
  `item_seq_no` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_teams`
--

INSERT INTO `items_teams` (`id`, `item_code`, `team_id`, `year_id`, `lock_yn`, `item_code_ps`, `product_family`, `maj_prd_share`, `item_seq_no`) VALUES
(1, 'GNC-P007', '1', '18', 'N', '', 'N', 'N', ''),
(2, 'FSP-V007', '1', '18', 'N', '', 'C', 'N', ''),
(3, 'FSP-V008', '1', '18', 'N', '', 'C', 'N', ''),
(4, 'FSP-E002', '1', '18', 'N', '', 'A', 'N', ''),
(5, 'FSP-E003', '1', '18', 'N', '', 'A', 'N', ''),
(6, 'FSP-A014', '1', '18', 'N', '', 'A', 'N', ''),
(7, 'FSP-C022', '1', '18', 'N', '', 'C', 'N', ''),
(8, 'FSP-D005', '1', '18', 'N', '', 'N', 'N', ''),
(9, 'FSP-D006', '1', '18', 'N', '', 'N', 'N', ''),
(10, 'FSP-O005', '1', '18', 'N', '', 'A', 'N', ''),
(11, 'GNC-P001', '1', '18', 'N', '', 'N', 'N', ''),
(12, 'GNC-P006', '1', '18', 'N', '', 'A', 'N', ''),
(13, 'FSP-T006', '1', '18', 'N', '', 'C', 'N', ''),
(14, 'FSP-N017', '1', '18', 'N', '', 'C', 'N', ''),
(15, 'FSP-N018', '1', '18', 'N', '', 'C', 'N', ''),
(16, 'FSP-F001', '1', '18', 'N', '', 'N', 'N', ''),
(17, 'FSP-N002', '1', '18', 'N', '', 'C', 'N', ''),
(18, 'FSP-R004', '1', '18', 'N', '', 'C', 'N', ''),
(19, 'FSP-R005', '1', '18', 'N', '', 'C', 'N', ''),
(20, 'FSP-C011', '1', '18', 'N', '', 'C', 'N', ''),
(21, 'FSP-A016', '1', '18', 'N', '', 'A', 'N', ''),
(22, 'FSP-F002', '1', '18', 'N', '', 'C', 'N', ''),
(23, 'FSP-F003', '1', '18', 'N', '', 'C', 'N', ''),
(24, 'FSP-V009', '1', '18', 'N', '', 'C', 'N', ''),
(25, 'FSP-V011', '1', '18', 'N', '', 'C', 'N', ''),
(26, 'FSP-V010', '1', '18', 'N', '', 'C', 'N', ''),
(27, 'FSP-D007', '16', '18', 'N', '', 'C', 'N', ''),
(28, 'FSG-D003', '16', '18', 'N', '', 'C', 'N', ''),
(29, 'FSG-D004', '16', '18', 'N', '', 'C', 'N', ''),
(30, 'FSP-S007', '16', '18', 'N', '', 'C', 'N', ''),
(31, 'FSP-S008', '16', '18', 'N', '', 'C', 'N', ''),
(32, 'FSP-S004', '16', '18', 'N', '', 'C', 'N', ''),
(33, 'FSP-S002', '16', '18', 'N', '', 'C', 'N', ''),
(34, 'FSP-V001', '16', '18', 'N', '', 'C', 'N', ''),
(35, 'FSP-V002', '16', '18', 'N', '', 'C', 'N', ''),
(36, 'FSP-V004', '16', '18', 'N', '', 'C', 'N', ''),
(37, 'FSP-B003', '16', '18', 'N', '', 'N', 'N', ''),
(38, 'FSP-T008', '16', '18', 'N', '', 'C', 'N', ''),
(39, 'FSP-R007', '16', '18', 'N', '', 'C', 'N', ''),
(40, 'FSP-R008', '16', '18', 'N', '', 'C', 'N', ''),
(41, 'FSP-R006', '16', '18', 'N', '', 'C', 'N', ''),
(42, 'FSP-B011', '16', '18', 'N', '', 'C', 'N', ''),
(43, 'GNC-C004', '16', '18', 'N', '', 'C', 'N', ''),
(44, 'FSP-C008', '2', '18', 'N', '', 'C', 'N', ''),
(45, 'FSP-C003', '2', '18', 'N', '', 'C', 'N', ''),
(46, 'FSP-C004', '2', '18', 'N', '', 'C', 'N', ''),
(47, 'FSP-T004', '2', '18', 'N', '', 'C', 'N', ''),
(48, 'FSG-P001', '2', '18', 'N', '', 'N', 'N', ''),
(49, 'FSP-B007', '2', '18', 'N', '', 'A', 'N', ''),
(50, 'FSP-S013', '2', '18', 'N', '', 'C', 'N', ''),
(51, 'FSP-C001', '2', '18', 'N', '', 'N', 'N', ''),
(52, 'FSP-C013', '2', '18', 'N', '', 'N', 'N', ''),
(53, 'FSP-C002', '2', '18', 'N', '', 'N', 'N', ''),
(54, 'FSP-B004', '2', '18', 'N', '', 'C', 'N', ''),
(55, 'FSP-N001', '2', '18', 'N', '', 'C', 'N', ''),
(56, 'FSP-A001', '2', '18', 'N', '', 'A', 'N', ''),
(57, 'FSP-A002', '2', '18', 'N', '', 'A', 'N', ''),
(58, 'FSP-B005', '2', '18', 'N', '', 'C', 'N', ''),
(59, 'FSP-C006', '2', '18', 'N', '', 'C', 'N', ''),
(60, 'FSP-C007', '2', '18', 'N', '', 'C', 'N', ''),
(61, 'FSP-C005', '2', '18', 'N', '', 'C', 'N', ''),
(62, 'FSP-L004', '2', '18', 'N', '', 'C', 'N', ''),
(63, 'FSP-L003', '2', '18', 'N', '', 'C', 'N', ''),
(64, 'FSP-R001', '2', '18', 'N', '', 'C', 'N', ''),
(65, 'FSP-R002', '2', '18', 'N', '', 'C', 'N', ''),
(66, 'FSP-R003', '2', '18', 'N', '', 'C', 'N', ''),
(67, 'FSP-T002', '2', '18', 'N', '', 'C', 'N', ''),
(68, 'FSP-T003', '2', '18', 'N', '', 'C', 'N', ''),
(69, 'FSP-P004', '2', '18', 'N', '', 'C', 'N', ''),
(70, 'FSP-C010', '3', '18', 'N', '', 'N', 'N', ''),
(71, 'FSP-C018', '3', '18', 'N', '', 'A', 'N', ''),
(72, 'FSG-M006', '3', '18', 'N', '', 'C', 'N', ''),
(73, 'FSG-V007', '3', '18', 'N', '', 'C', 'N', ''),
(74, 'FSG-V006', '3', '18', 'N', '', 'C', 'N', ''),
(75, 'FSG-M001', '3', '18', 'N', '', 'A', 'N', ''),
(76, 'FSP-A006', '3', '18', 'N', '', 'C', 'N', ''),
(77, 'FSP-A007', '3', '18', 'N', '', 'C', 'N', ''),
(78, 'FSP-C015', '3', '18', 'N', '', 'C', 'N', ''),
(79, 'FSG-D010', '3', '18', 'N', '', 'A', 'N', ''),
(80, 'FSG-C004', '3', '18', 'N', '', 'C', 'N', ''),
(81, 'FSG-C001', '3', '18', 'N', '', 'C', 'N', ''),
(82, 'FSG-C003', '3', '18', 'N', '', 'C', 'N', ''),
(83, 'FSG-C002', '3', '18', 'N', '', 'C', 'N', ''),
(84, 'FSG-F001', '3', '18', 'N', '', 'A', 'N', ''),
(85, 'FSG-F002', '3', '18', 'N', '', 'A', 'N', ''),
(86, 'FSG-F003', '3', '18', 'N', '', 'A', 'N', ''),
(87, 'FSG-M002', '3', '18', 'N', '', 'C', 'N', ''),
(88, 'FSG-M003', '3', '18', 'N', '', 'C', 'N', ''),
(89, 'FSG-M004', '3', '18', 'N', '', 'C', 'N', ''),
(90, 'FSG-V002', '3', '18', 'N', '', 'C', 'N', ''),
(91, 'FSG-V003', '3', '18', 'N', '', 'C', 'N', ''),
(92, 'FSG-V001', '3', '18', 'N', '', 'C', 'N', ''),
(93, 'FSP-C029', '3', '18', 'N', '', 'N', 'N', ''),
(94, 'GNC-T001', '3', '18', 'N', '', 'C', 'N', ''),
(95, 'GNC-T002', '3', '18', 'N', '', 'C', 'N', ''),
(96, 'GNC-A011', '3', '18', 'N', '', 'C', 'N', ''),
(97, 'FSP-L041', '3', '18', 'N', '', 'C', 'N', ''),
(98, 'FSP-L042', '3', '18', 'N', '', 'C', 'N', ''),
(99, 'FSG-V005', '4', '18', 'N', '', 'C', 'N', ''),
(100, 'FSG-V004', '4', '18', 'N', '', 'C', 'N', ''),
(101, 'FSG-Z001', '4', '18', 'N', '', 'N', 'N', ''),
(102, 'FSG-Z002', '4', '18', 'N', '', 'N', 'N', ''),
(103, 'FSG-Z003', '4', '18', 'N', '', 'N', 'N', ''),
(104, 'FSP-S003', '4', '18', 'N', '', 'N', 'N', ''),
(105, 'GNC-C001', '4', '18', 'N', '', 'C', 'N', ''),
(106, 'FSP-N015', '4', '18', 'N', '', 'C', 'N', ''),
(107, 'FSP-N016', '4', '18', 'N', '', 'C', 'N', ''),
(108, 'FSP-N020', '4', '18', 'N', '', 'C', 'N', ''),
(109, 'FSP-N019', '4', '18', 'N', '', 'C', 'N', ''),
(110, 'GNC-C002', '4', '18', 'N', '', 'A', 'N', ''),
(111, 'FSP-B009', '4', '18', 'N', '', 'N', 'N', ''),
(112, 'FSP-A013', '4', '18', 'N', '', 'A', 'N', ''),
(113, 'FSP-A012', '4', '18', 'N', '', 'A', 'N', ''),
(114, 'FSP-B006', '4', '18', 'N', '', 'N', 'N', ''),
(115, 'FSG-X001', '4', '18', 'N', '', 'A', 'N', ''),
(116, 'FSP-S011', '4', '18', 'N', '', 'N', 'N', ''),
(117, 'FSP-S012', '4', '18', 'N', '', 'N', 'N', ''),
(118, 'FSP-C016', '4', '18', 'N', '', 'C', 'N', ''),
(119, 'FSP-C019', '4', '18', 'N', '', 'C', 'N', ''),
(120, 'FSP-A003', '4', '18', 'N', '', 'A', 'N', ''),
(121, 'FSG-B003', '4', '18', 'N', '', 'C', 'N', ''),
(122, 'GNC-L001', '4', '18', 'N', '', 'C', 'N', ''),
(123, 'FSP-L012', '4', '18', 'N', '', 'A', 'N', ''),
(124, 'FSP-L006', '4', '18', 'N', '', 'A', 'N', ''),
(125, 'FSP-L007', '4', '18', 'N', '', 'A', 'N', ''),
(126, 'GNC-C003', '4', '18', 'N', '', 'C', 'N', ''),
(127, 'FSP-G001', '4', '18', 'N', '', 'C', 'N', ''),
(128, 'FSP-G002', '4', '18', 'N', '', 'C', 'N', ''),
(129, 'FSP-G003', '4', '18', 'N', '', 'C', 'N', ''),
(130, 'FSP-N026', '4', '18', 'N', '', 'C', 'N', ''),
(131, 'GNC-S001', '4', '18', 'N', '', 'C', 'N', ''),
(132, 'FSA-N005', '7', '18', 'N', '', 'C', 'N', ''),
(133, 'FSP-N003', '7', '18', 'N', '', 'C', 'N', ''),
(134, 'FSP-L008', '7', '18', 'N', '', 'C', 'N', ''),
(135, 'FSP-L009', '7', '18', 'N', '', 'C', 'N', ''),
(136, 'FSP-E006', '7', '18', 'N', '', 'C', 'N', ''),
(137, 'FSP-E007', '7', '18', 'N', '', 'C', 'N', ''),
(138, 'FSP-N011', '7', '18', 'N', '', 'C', 'N', ''),
(139, 'FSP-N012', '7', '18', 'N', '', 'C', 'N', ''),
(140, 'FSP-N013', '7', '18', 'N', '', 'A', 'N', ''),
(141, 'FSP-N021', '7', '18', 'N', '', 'C', 'N', ''),
(142, 'FSP-L016', '7', '18', 'N', '', 'C', 'N', ''),
(143, 'FSA-N006', '7', '18', 'N', '', 'C', 'N', ''),
(144, 'FSP-L040', '7', '18', 'N', '', 'C', 'N', ''),
(145, 'FSP-L011', '7', '18', 'N', '', 'C', 'N', ''),
(146, 'FSP-V003', '7', '18', 'N', '', 'C', 'N', ''),
(147, 'FSP-O006', '7', '18', 'N', '', 'C', 'N', ''),
(148, 'FSP-E008', '7', '18', 'N', '', 'C', 'N', ''),
(149, 'FSP-E009', '7', '18', 'N', '', 'C', 'N', '');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team` varchar(20) DEFAULT NULL,
  `team_code` varchar(100) DEFAULT NULL,
  `pm_emails` varchar(20) DEFAULT NULL,
  `team_alias` varchar(100) DEFAULT NULL,
  `is_active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team`, `team_code`, `pm_emails`, `team_alias`, `is_active`) VALUES
(1, 'NEUXAM', 'NXM', 'pmnxmspl@gmail.com', 'NXM', b'1'),
(2, 'RANAX', 'RNX', 'pmrnxspl@gmail.com', 'RNX', b'1'),
(3, 'MOTAAR', 'MTR', 'pmmtrspl@gmail.com', 'MOT', b'1'),
(4, 'NEON', 'NEON', 'pmneonspl@gmail.com', 'NE0', b'1'),
(7, 'PSYCHIATRY', 'PSY', 'pmpsyspl@gmail.com', 'PSY', b'1'),
(16, 'STAXIN', 'STN', 'pmstaxin@standpharm.', 'STN', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `role` enum('fm','zm','nsm','pm','admin') DEFAULT NULL,
  `ccrsid` varchar(100) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_approved` bit(1) DEFAULT b'0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `approved_by` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `role`, `ccrsid`, `password`, `remember_token`, `is_approved`, `is_active`, `is_deleted`, `approved_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Ibrahim Khan', 'ibrahimijkp@gmail.com', '+923164216411', 'admin', '000000', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'1', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(2, 'PM1', NULL, NULL, 'pm', '9991', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(3, 'PM2', NULL, NULL, 'pm', '9992', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'1', b'1', b'0', NULL, NULL, NULL, NULL, '2019-04-26 05:50:16'),
(4, 'PM3', NULL, NULL, 'pm', '9993', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(5, 'PM4', NULL, NULL, 'pm', '9994', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(6, 'PM5', NULL, NULL, 'pm', '9995', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(7, 'MEHMOOD AKHTAR', NULL, NULL, 'nsm', '94', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(8, 'MUHAMMAD AMIR HANIF', NULL, NULL, 'zm', '101', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(9, 'ZAHID FAZAL DIN', NULL, NULL, 'fm', '1000', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'1', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(10, 'NADEEM AKHTAR', NULL, NULL, 'fm', '1200', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(11, 'IRFAN MAJEED', NULL, NULL, 'fm', '9100', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(12, 'SYED ALI HASSAN GILLANI', NULL, NULL, 'fm', '1300', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(13, 'MUHAMMAD IBRAHIM DAR', NULL, NULL, 'fm', '1400', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(14, 'GHULAM SHABBIR', NULL, NULL, 'fm', '1500', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(15, 'NAZEEF AZHAR', NULL, NULL, 'fm', '1600', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(16, 'ARSHAD MEHMOOD', NULL, NULL, 'zm', '102', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(17, 'NAVEED ABDULLAH', NULL, NULL, 'fm', '1700', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(18, 'AMJAD ISLAM', NULL, NULL, 'fm', '2000', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(19, 'MUHAMMAD NAEEM', NULL, NULL, 'fm', '2100', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(20, 'IHSAN ALI KHAN', NULL, NULL, 'fm', '2200', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(21, 'MIAN MUTAHIR SHAH', NULL, NULL, 'fm', '2300', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(22, 'MUHAMMAD TAHIR', NULL, NULL, 'fm', '9300', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(23, 'MUHAMMAD TARIQ', NULL, NULL, 'zm', '103', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(24, 'M. ZEESHAN HASHMI', NULL, NULL, 'fm', '2400', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(25, 'MUHAMMAD JAMEEL', NULL, NULL, 'fm', '2500', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(26, 'ASIM HAIDER CHOHAN', NULL, NULL, 'fm', '2600', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(27, 'SYED ARSLAN ALI', NULL, NULL, 'fm', '2700', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(28, 'SADIQ HUSSAIN SHAH', NULL, NULL, 'fm', '2800', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(29, 'AMJAD HUSSAIN', NULL, NULL, 'nsm', '92', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'1', b'1', b'0', NULL, NULL, NULL, NULL, '2019-04-26 05:05:03'),
(30, 'MUHAMMAD NADEEM KHALID', NULL, NULL, 'zm', '111', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(31, 'NAVEED AHMED', NULL, NULL, 'fm', '5500', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(32, 'TANWEER ASLAM', NULL, NULL, 'fm', '5600', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(33, 'MUHAMMAD IMRAN', NULL, NULL, 'fm', '20500', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(34, 'SHEHZAD QAYYUM', NULL, NULL, 'fm', '5700', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(35, 'AHMAD SHERAZ AKRAM', NULL, NULL, 'fm', '5800', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(36, 'SAEED AHMAD ALVI', NULL, NULL, 'fm', '5900', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(37, 'SHAHID IQBAL', NULL, NULL, 'fm', '6000', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(38, 'MUJEEB UR REHMAN ABBASI', NULL, NULL, 'zm', '112', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(39, 'SYED ZAHOOR HUSSAIN SHAH', NULL, NULL, 'fm', '6100', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(40, 'M. TAHIR KARIM', NULL, NULL, 'fm', '6300', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(41, 'M. ANJUM RAFIQUE', NULL, NULL, 'fm', '6400', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(42, 'REHMAN ULLAH', NULL, NULL, 'fm', '6500', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(43, 'YASIR WAQAS', NULL, NULL, 'fm', '6600', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(44, 'MUHAMMAD ASAD ', NULL, NULL, 'fm', '9200', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(45, 'MUHAMMAD NADEEM', NULL, NULL, 'zm', '113', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(46, 'MEHBOOB ALI', NULL, NULL, 'fm', '6700', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(47, 'QAMAR MOBIN', NULL, NULL, 'fm', '6800', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(48, 'MUHAMMAD DANISH ANSARI', NULL, NULL, 'fm', '6900', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(49, 'TANVEER ALI', NULL, NULL, 'fm', '7000', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(50, 'MUHAMMAD FAROOQ', NULL, NULL, 'zm', '104', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'1', b'1', b'0', NULL, NULL, NULL, NULL, '2019-04-25 13:36:50'),
(51, 'WAQAR HUSSAIN', NULL, NULL, 'fm', '7100', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(52, 'NAUMAN AYYUB QURESHI', NULL, NULL, 'nsm', '93', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(53, 'ABID HAFEEZ', NULL, NULL, 'zm', '114', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(54, 'UMAIR JAVED', NULL, NULL, 'fm', '7200', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(55, 'MUHAMMAD KASHIF NASEER TOOR', NULL, NULL, 'fm', '7300', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(56, 'MUHAMMAD SHAFIQ', NULL, NULL, 'fm', '20300', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(57, 'MUHAMMAD TANVEER', NULL, NULL, 'fm', '7400', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(58, 'SHAKEEL AHMAD', NULL, NULL, 'fm', '7500', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(59, 'MUHAMMAD AZAM', NULL, NULL, 'fm', '7600', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(60, 'SHAMSHAD ALI', NULL, NULL, 'fm', '7700', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(61, 'WILLIAM MASIH', NULL, NULL, 'zm', '115', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(62, 'QAZI M. MEHBOOB AKHTAR', NULL, NULL, 'fm', '7800', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(63, 'WAZIR ZULFIQAR ALI', NULL, NULL, 'fm', '1900', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'1', b'1', b'0', NULL, NULL, NULL, NULL, '2019-04-25 11:27:04'),
(64, 'MUHAMMAD IMRAN', NULL, NULL, 'fm', '8000', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(65, 'MIAN MUHAMMAD AHMED', NULL, NULL, 'fm', '8100', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(66, 'AKBAR ZAMAN', NULL, NULL, 'fm', '8200', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(67, 'MUHAMMAD NAEEM', NULL, NULL, 'fm', '8300', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(68, 'SOHAIL MOHAMMAD', NULL, NULL, 'zm', '116', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(69, 'EHTISHAM KHALID', NULL, NULL, 'fm', '8400', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(70, 'MUHAMMAD WASEEM ANSARI', NULL, NULL, 'fm', '8500', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(71, 'MUBARAK', NULL, NULL, 'fm', '8600', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(72, NULL, NULL, NULL, 'fm', '8700', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(73, 'SAEED ASHRAF', NULL, NULL, 'fm', '8800', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(74, 'RAHAT MAJEED MALIK', NULL, NULL, 'zm', '108', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(75, 'MUHAMMAD AKRAM', NULL, NULL, 'fm', '3900', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(76, 'NOUMAN ASLAM', NULL, NULL, 'fm', '3800', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(77, 'REHAN IQBAL', NULL, NULL, 'fm', '9000', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(78, 'MUHAMMAD KHAN', NULL, NULL, 'fm', '4000', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(79, 'MUHAMMAD ILYAS', NULL, NULL, 'fm', '4100', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(80, 'MUHAMMAD MOHSIN GHANI', NULL, NULL, 'fm', '4300', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(81, 'MUHAMMAD UMAIR KHAN', NULL, NULL, 'fm', '4200', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(82, 'IRFAN AHMAD', NULL, NULL, 'zm', '109', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(83, 'RAO HAFEEZ AHMED', NULL, NULL, 'fm', '4400', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(84, 'IMTIAZ MALIK', NULL, NULL, 'fm', '1800', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(85, 'ZAHID BASHIR', NULL, NULL, 'fm', '4600', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(86, 'SYED KASHIF ALI ZAIDI', NULL, NULL, 'fm', '4700', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(87, 'ARIF ADNAN KHAN', NULL, NULL, 'fm', '4800', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(88, 'MUKHTIAR ALI', NULL, NULL, 'fm', '4900', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(89, 'JALIL AHMED', NULL, NULL, 'fm', '10600', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(90, 'ASLAM BANGALORI', NULL, NULL, 'zm', '110', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(91, 'MUNTHA ALI MANSOORI', NULL, NULL, 'fm', '5000', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(92, 'SYED DANISH MISBAH NAQVI', NULL, NULL, 'fm', '5100', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(93, 'SYED MUHAMMAD ADEEL UD DIN', NULL, NULL, 'fm', '5200', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(94, 'AGHA GULZAR AHMED', NULL, NULL, 'fm', '5300', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'1', b'1', b'0', NULL, NULL, NULL, NULL, '2019-04-26 16:03:59'),
(95, 'ABDUL QAHIR', NULL, NULL, 'fm', '5400', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'1', b'1', b'0', NULL, NULL, NULL, NULL, '2019-04-19 05:42:00'),
(96, 'FAROOQ AHMED', NULL, NULL, 'nsm', '91', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(97, 'FAHEEM AHMED', NULL, NULL, 'zm', '105', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(98, 'JAMIL AHMED', NULL, NULL, 'fm', '2900', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(99, 'GHULAM ALI ABBAS', NULL, NULL, 'fm', '3000', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(100, 'SYED ZULFIQAR SHAH', NULL, NULL, 'fm', '3100', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(101, 'FAISAL NADEEM ', NULL, NULL, 'zm', '106', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(102, 'RAJA DANYAL MANZOOR', NULL, NULL, 'fm', '3200', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(103, 'MUHAMMAD WASEEM', NULL, NULL, 'fm', '3300', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(104, 'MUHAMMAD WAQAS', NULL, NULL, 'fm', '3400', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(105, 'JAVED AHMED', NULL, NULL, 'fm', '20400', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(106, 'SAEED AHMED SHEIKH', NULL, NULL, 'zm', '107', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(107, 'MUHAMMAD AZHAR KHAN', NULL, NULL, 'fm', '3500', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(108, 'MUHAMMAD KASHIF', NULL, NULL, 'fm', '3600', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(109, 'ABDUL SAEED', NULL, NULL, 'fm', '8900', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'1', b'1', b'1', NULL, NULL, NULL, NULL, '2019-04-19 05:52:22'),
(110, 'SYED NADEEM HUSSAIN', NULL, NULL, 'nsm', '95', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(111, 'SAJID PERVAIZ', NULL, NULL, 'zm', '117', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(112, 'RANA IJAZ', NULL, NULL, 'fm', '9400', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(113, 'FARRUKH YOUSAF', NULL, NULL, 'fm', '9500', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(114, 'IMRAN ELAHI', NULL, NULL, 'fm', '9600', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(115, 'MUHAMMAD NADEEM', NULL, NULL, 'fm', '9700', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(116, 'MUHAMMAD WAJID', NULL, NULL, 'fm', '9900', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(117, 'RANA MUHAMMAD SAJID', NULL, NULL, 'zm', '118', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(118, 'SYED FAISAL HUSSAIN SHAH', NULL, NULL, 'fm', '10000', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(119, 'SULEMAN ALI', NULL, NULL, 'fm', '10200', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(120, 'NAZZAR SAFDAR', NULL, NULL, 'fm', '10300', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(121, 'SAFED ULLAH KHAN', NULL, NULL, 'fm', '10400', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(122, 'MUSTAFA KAMAL', NULL, NULL, 'fm', '10500', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(123, 'NAZAR HUSSAIN SHEIKH', NULL, NULL, 'zm', '119', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(124, 'AIJAZ AHMED', NULL, NULL, 'fm', '10700', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(125, 'SYED MUBEEN HUSSAIN', NULL, NULL, 'fm', '10800', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(126, 'SHAHBAZ QURESHI', NULL, NULL, 'fm', '10900', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL),
(127, 'MEHMOOD ILYAS SIDDIQUI', NULL, NULL, 'fm', '20000', '$2y$10$AIqOHab3H5ivRGkSbpHcjupdTawKvs3/ubfSZOmjD0M/LLgXT5Rui', NULL, b'0', b'1', b'0', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zone_station_details`
--

CREATE TABLE `zone_station_details` (
  `id` bigint(20) NOT NULL,
  `ccrsid` varchar(100) DEFAULT NULL,
  `team` varchar(500) DEFAULT NULL,
  `zone` varchar(500) DEFAULT NULL,
  `district` varchar(500) DEFAULT NULL,
  `station` varchar(500) DEFAULT NULL,
  `role` enum('fm','zm','nsm','pm','admin') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone_station_details`
--

INSERT INTO `zone_station_details` (`id`, `ccrsid`, `team`, `zone`, `district`, `station`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '1000', 'NXM', 'CNT', 'LHR-1', 'LHR-1,SKP', 'fm', NULL, NULL, NULL, NULL),
(2, '1200', 'NXM', 'CNT', 'LHR-2', 'LHR-2,KSR', 'fm', NULL, NULL, NULL, NULL),
(3, '1300', 'NXM', 'CNT', 'GRW', 'GRW,SKT,NRL', 'fm', NULL, NULL, NULL, NULL),
(4, '1400', 'NXM', 'CNT', 'JLM', 'JLM,GRT,AJK,MBD,KTL', 'fm', NULL, NULL, NULL, NULL),
(5, '1500', 'NXM', 'CNT', 'MUL', 'MUL,DGK,LYH', 'fm', NULL, NULL, NULL, NULL),
(6, '1600', 'NXM', 'CNT', 'BWP', 'BWP,BWN,RYK', 'fm', NULL, NULL, NULL, NULL),
(7, '1700', 'NXM', 'NOR', 'RWP', 'RWP,CHK,ABD,RWK', 'fm', NULL, NULL, NULL, NULL),
(8, '1800', 'NXM,RNX,MTR,NEON,STX', 'NOR', 'GLT', 'GLT', 'fm', NULL, NULL, NULL, NULL),
(9, '1900', 'NXM,RNX,MTR,NEON,STX', 'NOR', 'SKD', 'SKD', 'fm', NULL, NULL, NULL, NULL),
(10, '2000', 'NXM', 'NOR', 'FSD', 'FSD,JNG,TTS', 'fm', NULL, NULL, NULL, NULL),
(11, '2100', 'NXM', 'NOR', 'SGD', 'SGD,JRD,BHK,MNW', 'fm', NULL, NULL, NULL, NULL),
(12, '2200', 'NXM', 'NOR', 'BNU', 'BNU,DIK,KHT', 'fm', NULL, NULL, NULL, NULL),
(13, '2300', 'NXM', 'NOR', 'PWR', 'PWR,MDN', 'fm', NULL, NULL, NULL, NULL),
(14, '2400', 'NXM', 'SOU', 'KHI-1', 'KHI-1', 'fm', NULL, NULL, NULL, NULL),
(15, '2500', 'NXM', 'SOU', 'KHI-2', 'KHI-2', 'fm', NULL, NULL, NULL, NULL),
(16, '2600', 'NXM', 'SOU', 'HYD', 'HYD,MPK,NWB,THT,OMK', 'fm', NULL, NULL, NULL, NULL),
(17, '2700', 'NXM', 'SOU', 'SUK', 'SUK,LRK,JCB,DAD', 'fm', NULL, NULL, NULL, NULL),
(18, '2800', 'NXM,STX,PSY', 'QTA', 'QTA', 'QTA,KZD', 'fm', NULL, NULL, NULL, NULL),
(19, '2900', 'PSY', 'CNT', 'LHR', 'LHR,SWL', 'fm', NULL, NULL, NULL, NULL),
(20, '3000', 'PSY', 'CNT', 'GRW', 'GRW,SKT,GRT,JLM', 'fm', NULL, NULL, NULL, NULL),
(21, '3100', 'PSY', 'CNT', 'MUL', 'MUL,BWP', 'fm', NULL, NULL, NULL, NULL),
(22, '3200', 'PSY', 'NOR', 'RWP', 'RWP,ABD', 'fm', NULL, NULL, NULL, NULL),
(23, '3300', 'PSY', 'NOR', 'FSD', 'FSD,SGD', 'fm', NULL, NULL, NULL, NULL),
(24, '3400', 'PSY', 'NOR', 'PWR', 'PWR,BNU,DIK', 'fm', NULL, NULL, NULL, NULL),
(25, '3500', 'PSY', 'SOU', 'KHI', 'KHI', 'fm', NULL, NULL, NULL, NULL),
(26, '3600', 'PSY', 'SOU', 'HYD', 'HYD', 'fm', NULL, NULL, NULL, NULL),
(27, '3800', 'NEON', 'CNT', 'LHR-2', 'LHR-2,KSR', 'fm', NULL, NULL, NULL, NULL),
(28, '3900', 'NEON', 'CNT', 'LHR-1', 'LHR-1,SKP', 'fm', NULL, NULL, NULL, NULL),
(29, '4000', 'NEON', 'CNT', 'GRW', 'GRW,SKT,NRL', 'fm', NULL, NULL, NULL, NULL),
(30, '4100', 'NEON,STX', 'CNT', 'JLM', 'JLM,GRT,AJK,MBD,KTL', 'fm', NULL, NULL, NULL, NULL),
(31, '4200', 'NEON', 'CNT', 'BWP', 'BWP,BWN,RYK', 'fm', NULL, NULL, NULL, NULL),
(32, '4300', 'NEON', 'CNT', 'MUL', 'MUL,DGK,LYH', 'fm', NULL, NULL, NULL, NULL),
(33, '4400', 'NEON', 'NOR', 'RWP', 'RWP,CHK,ABD,RWK', 'fm', NULL, NULL, NULL, NULL),
(34, '4600', 'NEON', 'NOR', 'FSD', 'FSD,JNG,TTS', 'fm', NULL, NULL, NULL, NULL),
(35, '4700', 'NEON', 'NOR', 'SGD', 'SGD,JRD,BHK,MNW', 'fm', NULL, NULL, NULL, NULL),
(36, '4800', 'NEON', 'NOR', 'BNU', 'BNU,DIK,KHT', 'fm', NULL, NULL, NULL, NULL),
(37, '4900', 'NEON', 'NOR', 'PWR', 'PWR,MDN', 'fm', NULL, NULL, NULL, NULL),
(38, '5000', 'NEON', 'SOU', 'KHI-1', 'KHI-1', 'fm', NULL, NULL, NULL, NULL),
(39, '5100', 'NEON', 'SOU', 'KHI-2', 'KHI-2', 'fm', NULL, NULL, NULL, NULL),
(40, '5200', 'NEON', 'SOU', 'HYD', 'HYD,MPK,NWB,THT,OMK', 'fm', NULL, NULL, NULL, NULL),
(41, '5300', 'NEON', 'SOU', 'SUK', 'SUK,LRK,JCB,DAD', 'fm', NULL, NULL, NULL, NULL),
(42, '5400', 'NEON', 'QTA', 'QTA', 'QTA,KZD', 'fm', NULL, NULL, NULL, NULL),
(43, '5500', 'RNX', 'CNT', 'LHR-1', 'LHR-1,SKP', 'fm', NULL, NULL, NULL, NULL),
(44, '5600', 'RNX', 'CNT', 'LHR-2', 'LHR-2,KSR', 'fm', NULL, NULL, NULL, NULL),
(45, '5700', 'RNX', 'CNT', 'GRW', 'GRW,SKT,NRL', 'fm', NULL, NULL, NULL, NULL),
(46, '5800', 'RNX', 'CNT', 'JLM', 'JLM,GRT,AJK,MBD,KTL', 'fm', NULL, NULL, NULL, NULL),
(47, '5900', 'RNX', 'CNT', 'MUL', 'MUL,DGK,LYH', 'fm', NULL, NULL, NULL, NULL),
(48, '6000', 'RNX', 'CNT', 'BWP', 'BWP,BWN,RYK', 'fm', NULL, NULL, NULL, NULL),
(49, '6100', 'RNX', 'NOR', 'RWP', 'RWP,CHK,ABD,RWK', 'fm', NULL, NULL, NULL, NULL),
(50, '6300', 'RNX', 'NOR', 'FSD', 'FSD,JNG,TTS', 'fm', NULL, NULL, NULL, NULL),
(51, '6400', 'RNX', 'NOR', 'SGD', 'SGD,JRD,BHK,MNW', 'fm', NULL, NULL, NULL, NULL),
(52, '6500', 'RNX', 'NOR', 'BNU', 'BNU,DIK,KHT', 'fm', NULL, NULL, NULL, NULL),
(53, '6600', 'RNX', 'NOR', 'PWR', 'PWR,MDN', 'fm', NULL, NULL, NULL, NULL),
(54, '6700', 'RNX', 'SOU', 'KHI-1', 'KHI-1', 'fm', NULL, NULL, NULL, NULL),
(55, '6800', 'RNX', 'SOU', 'KHI-2', 'KHI-2', 'fm', NULL, NULL, NULL, NULL),
(56, '6900', 'RNX', 'SOU', 'HYD', 'HYD,MPK,NWB,THT,OMK', 'fm', NULL, NULL, NULL, NULL),
(57, '7000', 'RNX', 'SOU', 'SUK', 'SUK,LRK,JCB,DAD', 'fm', NULL, NULL, NULL, NULL),
(58, '7100', 'RNX', 'QTA', 'QTA', 'QTA,KZD', 'fm', NULL, NULL, NULL, NULL),
(59, '7200', 'MTR', 'CNT', 'LHR-1', 'LHR-1,SKP', 'fm', NULL, NULL, NULL, NULL),
(60, '7300', 'MTR', 'CNT', 'LHR-2', 'LHR-2,KSR', 'fm', NULL, NULL, NULL, NULL),
(61, '7400', 'MTR', 'CNT', 'GRW', 'GRW,SKT,NRL', 'fm', NULL, NULL, NULL, NULL),
(62, '7500', 'MTR', 'CNT', 'JLM', 'JLM,GRT,AJK,MBD,KTL', 'fm', NULL, NULL, NULL, NULL),
(63, '7600', 'MTR', 'CNT', 'MUL', 'MUL,DGK,LYH', 'fm', NULL, NULL, NULL, NULL),
(64, '7700', 'MTR', 'CNT', 'BWP', 'BWP,BWN,RYK', 'fm', NULL, NULL, NULL, NULL),
(65, '7800', 'MTR', 'NOR', 'RWP', 'RWP,CHK,ABD,RWK', 'fm', NULL, NULL, NULL, NULL),
(66, '8000', 'MTR', 'NOR', 'FSD', 'FSD,JNG,TTS', 'fm', NULL, NULL, NULL, NULL),
(67, '8100', 'MTR', 'NOR', 'SGD', 'SGD,JRD,BHK,MNW', 'fm', NULL, NULL, NULL, NULL),
(68, '8200', 'MTR', 'NOR', 'BNU', 'BNU,DIK,KHT', 'fm', NULL, NULL, NULL, NULL),
(69, '8300', 'MTR', 'NOR', 'PWR', 'PWR,MDN', 'fm', NULL, NULL, NULL, NULL),
(70, '8400', 'MTR', 'SOU', 'KHI-1', 'KHI-1', 'fm', NULL, NULL, NULL, NULL),
(71, '8500', 'MTR', 'SOU', 'KHI-2', 'KHI-2', 'fm', NULL, NULL, NULL, NULL),
(72, '8600', 'MTR', 'SOU', 'HYD', 'HYD,MPK,NWB,THT,OMK', 'fm', NULL, NULL, NULL, NULL),
(73, '8700', 'MTR', 'SOU', 'SUK', 'SUK,LRK,JCB,DAD', 'fm', NULL, NULL, NULL, NULL),
(74, '8800', 'MTR', 'QTA', 'QTA', 'QTA,KZD', 'fm', NULL, NULL, NULL, NULL),
(75, '8900', 'PSY', 'SOU', 'SUK', 'SUK,LRK,RYK', 'fm', NULL, NULL, NULL, NULL),
(76, '9000', 'NEON', 'CNT', 'SWL', 'SWL,OKA,VHR,BRW', 'fm', NULL, NULL, NULL, NULL),
(77, '9100', 'NXM', 'CNT', 'SWL', 'SWL,OKA,VHR,BRW', 'fm', NULL, NULL, NULL, NULL),
(78, '9200', 'RNX,NEON', 'NOR', 'SWT', 'SWT,TMG', 'fm', NULL, NULL, NULL, NULL),
(79, '9300', 'NXM,MTR', 'NOR', 'SWT', 'SWT,TMG', 'fm', NULL, NULL, NULL, NULL),
(80, '9400', 'STX', 'CNT', 'LHR-1', 'LHR-1,SKP', 'fm', NULL, NULL, NULL, NULL),
(81, '9500', 'STX', 'CNT', 'LHR-2', 'LHR-2,KSR', 'fm', NULL, NULL, NULL, NULL),
(82, '9600', 'STX', 'CNT', 'SWL', 'SWL,OKA,VHR,BWN', 'fm', NULL, NULL, NULL, NULL),
(83, '9700', 'STX', 'CNT', 'GRW', 'GRW,SKT,NRL', 'fm', NULL, NULL, NULL, NULL),
(84, '9900', 'STX', 'CNT', 'MUL', 'MUL,DGK,LYH,BWP', 'fm', NULL, NULL, NULL, NULL),
(85, '10000', 'STX', 'NOR', 'RWP', 'RWP,CHK,ABD,RWK', 'fm', NULL, NULL, NULL, NULL),
(86, '10200', 'STX', 'NOR', 'FSD', 'FSD,JNG', 'fm', NULL, NULL, NULL, NULL),
(87, '10300', 'STX', 'NOR', 'SGD', 'SGD,MNW', 'fm', NULL, NULL, NULL, NULL),
(88, '10400', 'STX', 'NOR', 'BNU', 'BNU,DIK,KHT', 'fm', NULL, NULL, NULL, NULL),
(89, '10500', 'STX', 'NOR', 'PWR', 'PWR,MDN', 'fm', NULL, NULL, NULL, NULL),
(90, '10600', 'NXM,RNX,MTR,NEON,STX', 'NOR', 'CHT', 'CHT', 'fm', NULL, NULL, NULL, NULL),
(91, '10700', 'STX', 'SOU', 'KHI-1', 'KHI-1', 'fm', NULL, NULL, NULL, NULL),
(92, '10800', 'STX', 'SOU', 'KHI-2', 'KHI-2,THT', 'fm', NULL, NULL, NULL, NULL),
(93, '10900', 'STX', 'SOU', 'HYD', 'HYD,MPK,NWB,DAD', 'fm', NULL, NULL, NULL, NULL),
(94, '20000', 'STX', 'SOU', 'SUK', 'SUK,LRK,JCB,RYK', 'fm', NULL, NULL, NULL, NULL),
(95, '20300', 'MTR', 'CNT', 'SWL', 'SWL,OKA,VHR,BRW', 'fm', NULL, NULL, NULL, NULL),
(96, '20400', 'PSY,STX', 'NOR', 'SWT', 'SWT,TMG', 'fm', NULL, NULL, NULL, NULL),
(97, '20500', 'RNX', 'CNT', 'SWL', 'SWL,OKA,VHR,BRW', 'fm', NULL, NULL, NULL, NULL),
(98, '102', 'NXM', 'NOR', 'RWP', NULL, 'zm', NULL, NULL, NULL, NULL),
(99, '112', 'RNX', 'NOR', 'RWP', NULL, 'zm', NULL, NULL, NULL, NULL),
(100, '115', 'MTR', 'NOR', 'RWP', NULL, 'zm', NULL, NULL, NULL, NULL),
(101, '109', 'NEON', 'NOR', 'RWP', NULL, 'zm', NULL, NULL, NULL, NULL),
(102, '118', 'STX', 'NOR', 'RWP', NULL, 'zm', NULL, NULL, NULL, NULL),
(103, '106', 'PSY', 'NOR', 'RWP', NULL, 'zm', NULL, NULL, NULL, NULL),
(104, '101', 'NXM', 'CNT', 'LHR', NULL, 'zm', NULL, NULL, NULL, NULL),
(105, '111', 'RNX', 'CNT', 'LHR', NULL, 'zm', NULL, NULL, NULL, NULL),
(106, '114', 'MTR', 'CNT', 'LHR', NULL, 'zm', NULL, NULL, NULL, NULL),
(107, '108', 'NEON', 'CNT', 'LHR', NULL, 'zm', NULL, NULL, NULL, NULL),
(108, '117', 'STX', 'CNT', 'LHR', NULL, 'zm', NULL, NULL, NULL, NULL),
(109, '105', 'PSY', 'CNT', 'LHR', NULL, 'zm', NULL, NULL, NULL, NULL),
(110, '103', 'NXM', 'SOU', 'KHI-1', NULL, 'zm', NULL, NULL, NULL, NULL),
(111, '113', 'RNX', 'SOU', 'KHI-1', NULL, 'zm', NULL, NULL, NULL, NULL),
(112, '116', 'MTR', 'SOU', 'KHI-1', NULL, 'zm', NULL, NULL, NULL, NULL),
(113, '110', 'NEON', 'SOU', 'KHI-1', NULL, 'zm', NULL, NULL, NULL, NULL),
(114, '107', 'PSY', 'SOU', 'KHI-1', NULL, 'zm', NULL, NULL, NULL, NULL),
(115, '119', 'STX', 'SOU', 'KHI-1', NULL, 'zm', NULL, NULL, NULL, NULL),
(116, '104', 'NXM,RNX,MTR,NEON,PSY,STX', 'QTA', NULL, NULL, 'zm', NULL, NULL, NULL, NULL),
(117, '94', 'NXM', NULL, NULL, NULL, 'nsm', NULL, NULL, NULL, NULL),
(118, '92', 'RNX,NEON', NULL, NULL, NULL, 'nsm', NULL, NULL, NULL, NULL),
(119, '93', 'MTR', NULL, NULL, NULL, 'nsm', NULL, NULL, NULL, NULL),
(120, '91', 'PSY', NULL, NULL, NULL, 'nsm', NULL, NULL, NULL, NULL),
(121, '95', 'STX', NULL, NULL, NULL, 'nsm', NULL, NULL, NULL, NULL),
(122, '9991', 'NXM', NULL, NULL, NULL, 'pm', NULL, NULL, NULL, NULL),
(123, '9992', 'RNX,NEON', NULL, NULL, NULL, 'pm', NULL, NULL, NULL, NULL),
(124, '9993', 'MTR', NULL, NULL, NULL, 'pm', NULL, NULL, NULL, NULL),
(125, '9994', 'PSY', NULL, NULL, NULL, 'pm', NULL, NULL, NULL, NULL),
(126, '9995', 'STX', NULL, NULL, NULL, 'pm', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dr_cases`
--
ALTER TABLE `dr_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escalation_hierarchies`
--
ALTER TABLE `escalation_hierarchies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_teams`
--
ALTER TABLE `items_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`ccrsid`);

--
-- Indexes for table `zone_station_details`
--
ALTER TABLE `zone_station_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `dr_cases`
--
ALTER TABLE `dr_cases`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `escalation_hierarchies`
--
ALTER TABLE `escalation_hierarchies`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `items_teams`
--
ALTER TABLE `items_teams`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `zone_station_details`
--
ALTER TABLE `zone_station_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
