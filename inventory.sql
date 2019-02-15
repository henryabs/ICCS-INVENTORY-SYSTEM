-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 02:44 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset_report_tbl`
--

CREATE TABLE `asset_report_tbl` (
  `rpt_id` int(11) NOT NULL,
  `rpt_site` varchar(50) NOT NULL,
  `rpt_total` int(11) NOT NULL,
  `rpt_working` int(11) NOT NULL,
  `rpt_partial` int(11) NOT NULL,
  `rpt_defective` int(11) NOT NULL,
  `rpt_date` varchar(50) NOT NULL,
  `rpt_update_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_report_tbl`
--

INSERT INTO `asset_report_tbl` (`rpt_id`, `rpt_site`, `rpt_total`, `rpt_working`, `rpt_partial`, `rpt_defective`, `rpt_date`, `rpt_update_time`) VALUES
(1, 'Prestige 2005', 14, 13, 0, 1, '02-14-2019', '09:44:18 am'),
(2, 'Prestige 2006', 7, 7, 0, 0, '02-14-2019', '09:44:18 am'),
(3, 'Prestige 2007', 8, 7, 1, 0, '02-14-2019', '09:44:18 am'),
(4, 'Prestige 2204', 6, 4, 1, 1, '02-14-2019', '09:44:18 am'),
(5, 'Prestige 2206', 5, 4, 1, 0, '02-14-2019', '09:44:18 am'),
(6, 'Prestige 2207', 0, 0, 0, 0, '02-14-2019', '09:44:18 am'),
(7, 'Prestige 2404', 1, 1, 0, 0, '02-14-2019', '09:44:18 am'),
(8, 'Prestige 1110', 1, 1, 0, 0, '02-14-2019', '09:44:18 am'),
(9, 'Prestige 2205', 0, 0, 0, 0, '02-14-2019', '09:44:18 am');

-- --------------------------------------------------------

--
-- Table structure for table `asset_tbl`
--

CREATE TABLE `asset_tbl` (
  `asst_id` int(11) NOT NULL,
  `asst_item_code` varchar(20) NOT NULL,
  `asst_unit_code` varchar(20) NOT NULL,
  `asst_unit_number` int(11) NOT NULL,
  `asst_brand_name` varchar(30) NOT NULL,
  `asst_model_name` varchar(30) NOT NULL,
  `asst_sts_id` int(11) NOT NULL,
  `asst_stord_id` int(11) NOT NULL,
  `asst_spplr_id` int(11) NOT NULL,
  `asst_location` varchar(100) NOT NULL,
  `asst_created_at` varchar(20) NOT NULL,
  `asst_created_at_time` varchar(30) NOT NULL,
  `asst_created_by` varchar(30) NOT NULL,
  `asst_last_update` varchar(20) NOT NULL,
  `asst_last_update_time` varchar(30) NOT NULL,
  `asst_update_by` varchar(30) NOT NULL,
  `asst_note` text NOT NULL,
  `asst_code` varchar(5) NOT NULL,
  `asst_site_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_tbl`
--

INSERT INTO `asset_tbl` (`asst_id`, `asst_item_code`, `asst_unit_code`, `asst_unit_number`, `asst_brand_name`, `asst_model_name`, `asst_sts_id`, `asst_stord_id`, `asst_spplr_id`, `asst_location`, `asst_created_at`, `asst_created_at_time`, `asst_created_by`, `asst_last_update`, `asst_last_update_time`, `asst_update_by`, `asst_note`, `asst_code`, `asst_site_name`) VALUES
(1, 'iccs-kb-1', 'iccs-kb-', 1, 'a4tech', 'krs-83', 1, 2, 1, '', '08-09-2018', '11:33:51 am', 'Henry Abayan', '', '', '', '', '81150', 'Prestige 2005'),
(2, 'iccs-ms-1', 'iccs-ms-', 1, 'a4tech', 'op-720 ps2', 1, 2, 1, '', '08-09-2018', '11:33:55 am', 'Henry Abayan', '', '', '', '', '81652', 'Prestige 2005'),
(3, 'iccs-hs-1', 'iccs-hs-', 1, 'Plantronics', 'VOYAGER 5200 UC', 1, 2, 1, '', '08-09-2018', '11:33:59 am', 'Henry Abayan', '', '', '', '', '23737', 'Prestige 2005'),
(4, 'iccs-mt-1', 'iccs-mt-', 1, 'benq', 'PD3200U', 1, 2, 1, '', '08-09-2018', '11:34:05 am', 'Henry Abayan', '', '', '', '', '37674', 'Prestige 2005'),
(5, 'iccs-vc-1', 'iccs-vc-', 1, 'Lifepro', 'VC8000', 1, 1, 1, '', '08-09-2018', '11:34:33 am', 'Henry Abayan', '08-09-2018', '12:11:22 pm', '1', '', '15724', 'Prestige 2204'),
(6, 'iccs-su-1', 'iccs-su-', 1, 'intel', 'i3 4170', 1, 2, 1, '', '08-09-2018', '11:34:39 am', 'Henry Abayan', '', '', '', '', '10005', 'Prestige 2005'),
(7, 'iccs-su-2', 'iccs-su-', 2, 'intel', 'i3 4170', 1, 2, 1, '', '08-09-2018', '11:34:42 am', 'Henry Abayan', '', '', '', '', '23548', 'Prestige 2005'),
(8, 'iccs-su-3', 'iccs-su-', 3, 'intel', 'i3 4170', 1, 1, 1, '', '08-09-2018', '11:34:47 am', 'Henry Abayan', '', '', '', '', '65595', 'Prestige 2005'),
(9, 'iccs-su-4', 'iccs-su-', 4, 'intel', 'i3 4170', 1, 2, 1, '', '08-09-2018', '11:34:52 am', 'Henry Abayan', '', '', '', '', '21632', 'Prestige 2005'),
(10, 'iccs-pr-1', 'iccs-pr-', 1, 'Brother', 'DCP-L2540DW', 1, 2, 1, '', '08-09-2018', '11:34:57 am', 'Henry Abayan', '', '', '', '', '80309', 'Prestige 2005'),
(11, 'iccs-wc-1', 'iccs-wc-', 1, 'a4tech', 'pk-910h', 1, 2, 1, '', '08-09-2018', '11:35:01 am', 'Henry Abayan', '', '', '', '', '54540', 'Prestige 2005'),
(12, 'iccs-hs-2', 'iccs-hs-', 2, 'Plantronics', 'VOYAGER 5200 UC', 1, 2, 1, '', '08-09-2018', '11:35:14 am', 'Henry Abayan', '', '', '', '', '17075', 'Prestige 2204'),
(13, 'iccs-mt-2', 'iccs-mt-', 2, 'benq', 'PD3200U', 2, 1, 1, '', '08-09-2018', '11:35:18 am', 'Henry Abayan', '08-09-2018', '11:40:24 am', '27', '', '19342', 'Prestige 2007'),
(14, 'iccs-pr-2', 'iccs-pr-', 2, 'Brother', 'DCP-L2540DW', 1, 2, 1, '', '08-09-2018', '11:35:25 am', 'Henry Abayan', '', '', '', '', '79493', 'Prestige 2206'),
(15, 'iccs-wc-2', 'iccs-wc-', 2, 'a4tech', 'pk-910h', 1, 2, 1, '', '08-09-2018', '11:35:30 am', 'Henry Abayan', '', '', '', '', '47724', 'Prestige 2007'),
(17, 'iccs-mt-4', 'iccs-mt-', 4, 'benq', 'PD3200U', 2, 1, 1, 'Station 32', '08-09-2018', '11:36:03 am', 'Henry Abayan', '02-14-2019', '09:32:30 am', '1', 'cracked on upper left part', '35143', 'Prestige 2204'),
(18, 'iccs-su-5', 'iccs-su-', 5, 'intel', 'i3 4170', 2, 1, 1, '', '08-09-2018', '11:36:08 am', 'Henry Abayan', '08-09-2018', '11:38:41 am', '27', '', '92206', 'Prestige 2206'),
(19, 'iccs-pr-3', 'iccs-pr-', 3, 'Brother', 'DCP-L2540DW', 1, 2, 1, '', '08-09-2018', '11:36:12 am', 'Henry Abayan', '', '', '', '', '47089', 'Prestige 2007'),
(20, 'iccs-su-6', 'iccs-su-', 6, 'intel', 'i3 4170', 1, 2, 1, '', '08-09-2018', '11:36:18 am', 'Henry Abayan', '', '', '', '', '38968', 'Prestige 2007'),
(21, 'iccs-hs-3', 'iccs-hs-', 3, 'Plantronics', 'VOYAGER 5200 UC', 3, 1, 1, '', '08-09-2018', '11:36:28 am', 'Henry Abayan', '08-09-2018', '11:46:02 am', '27', 'broken pin', '26399', 'Prestige 2204'),
(22, 'iccs-mt-5', 'iccs-mt-', 5, 'benq', 'PD3200U', 1, 2, 1, '', '08-09-2018', '11:36:34 am', 'Henry Abayan', '', '', '', '', '43215', 'Prestige 2404'),
(23, 'iccs-mt-6', 'iccs-mt-', 6, 'hp', 'e190i', 1, 1, 1, '', '08-09-2018', '11:36:44 am', 'Henry Abayan', '', '', '', '', '79093', 'Prestige 2006'),
(24, 'iccs-su-7', 'iccs-su-', 7, 'intel', 'i3 4170', 1, 2, 1, '', '08-09-2018', '11:36:48 am', 'Henry Abayan', '', '', '', '', '17962', 'Prestige 2206'),
(25, 'iccs-kb-2', 'iccs-kb-', 2, 'a4tech', 'krs-83', 1, 2, 1, '', '08-09-2018', '11:41:49 am', 'Henry Abayan', '', '', '', '', '13770', 'Prestige 2206'),
(26, 'iccs-pr-4', 'iccs-pr-', 4, 'Brother', 'DCP-L2540DW', 1, 2, 1, '', '08-09-2018', '11:41:53 am', 'Henry Abayan', '', '', '', '', '68582', 'Prestige 2204'),
(27, 'iccs-kb-3', 'iccs-kb-', 3, 'a4tech', 'krs-83', 1, 2, 1, '', '08-10-2018', '12:02:53 pm', 'Henry Abayan', '', '', '', '', '11026', 'Prestige 2007'),
(28, 'iccs-hs-4', 'iccs-hs-', 4, 'Plantronics', 'VOYAGER 5200 UC', 1, 2, 1, '', '08-14-2018', '12:37:58 pm', 'Henry Abayan', '', '', '', '', '63836', 'Prestige 2006'),
(29, 'iccs-pr-5', 'iccs-pr-', 5, 'Brother', 'DCP-L2540DW', 1, 0, 2, '', '10-03-2018', '11:32:14 pm', 'Henry Abayan', '', '', '', '', '24310', 'Prestige 2204'),
(30, 'iccs-pr-6', 'iccs-pr-', 6, 'Brother', 'DCP-L2540DW', 1, 0, 4, '', '10-03-2018', '11:35:32 pm', 'Henry Abayan', '', '', '', '', '98494', 'Prestige 1110'),
(31, 'iccs-wc-3', 'iccs-wc-', 3, 'a4tech', 'pk-910h', 1, 0, 1, 's', '10-03-2018', '11:38:09 pm', 'Henry Abayan', '10-03-2018', '11:38:59 pm', '1', '', '99996', 'Prestige 2007'),
(32, 'iccs-hs-5', 'iccs-hs-', 5, 'Plantronics', 'VOYAGER 5200 UC', 1, 1, 1, '', '10-03-2018', '11:41:19 pm', 'Henry Abayan', '', '', '', '', '48171', 'Prestige 2006'),
(33, 'iccs-su-8', 'iccs-su-', 8, 'intel', 'i3 4170', 3, 1, 1, '', '10-03-2018', '11:42:15 pm', 'Henry Abayan', '10-04-2018', '12:07:06 am', '1', '', '72953', 'Prestige 2005'),
(34, 'iccs-mt-7', 'iccs-mt-', 7, 'benq', 'PD3200U', 1, 2, 1, '', '10-03-2018', '11:44:45 pm', 'Henry Abayan', '', '', '', '', '31768', 'Prestige 2006'),
(35, 'iccs-kb-4', 'iccs-kb-', 4, 'a4tech', 'krs-83', 1, 0, 1, '', '10-03-2018', '11:54:28 pm', 'Henry Abayan', '', '', '', '', '15767', 'Prestige 2007'),
(36, 'iccs-kb-5', 'iccs-kb-', 5, 'a4tech', 'krs-83', 1, 0, 1, '', '10-03-2018', '11:59:23 pm', 'Henry Abayan', '', '', '', '', '27963', 'Prestige 2005'),
(37, 'iccs-su-9', 'iccs-su-', 9, 'intel', 'i3 4170', 1, 2, 1, '', '10-03-2018', '11:59:46 pm', 'Henry Abayan', '', '', '', '', '86142', 'Prestige 2007'),
(38, 'iccs-kb-6', 'iccs-kb-', 6, 'a4tech', 'krs-83', 1, 2, 1, '', '10-04-2018', '12:03:20 am', 'Henry Abayan', '', '', '', '', '52248', 'Prestige 2006'),
(39, 'iccs-pr-7', 'iccs-pr-', 7, 'Brother', 'DCP-L2540DW', 1, 2, 1, '', '10-04-2018', '12:03:29 am', 'Henry Abayan', '', '', '', '', '79642', 'Prestige 2006'),
(40, 'iccs-kb-7', 'iccs-kb-', 7, 'a4tech', 'krs-83', 1, 2, 1, '', '10-04-2018', '12:05:36 am', 'Henry Abayan', '', '', '', '', '38566', 'Prestige 2005'),
(41, 'iccs-hs-6', 'iccs-hs-', 6, 'Plantronics', 'VOYAGER 5200 UC', 1, 2, 1, '', '10-04-2018', '12:19:23 am', 'Henry Abayan', '', '', '', '', '33960', 'Prestige 2006'),
(42, 'iccs-su-10', 'iccs-su-', 10, 'intel', 'i3 4170', 1, 2, 1, '', '10-04-2018', '12:20:25 am', 'Henry Abayan', '', '', '', '', '21717', 'Prestige 2206'),
(43, 'iccs-rt-1', 'iccs-rt-', 1, 'huawei', 'b315s-936', 1, 2, 2, '', '02-14-2019', '09:17:15 am', 'Henry Abayan', '', '', '', '', '55009', 'Prestige 2005');

-- --------------------------------------------------------

--
-- Table structure for table `brand_tbl`
--

CREATE TABLE `brand_tbl` (
  `brnd_id` int(11) NOT NULL,
  `brnd_name` varchar(30) NOT NULL,
  `unt_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_tbl`
--

INSERT INTO `brand_tbl` (`brnd_id`, `brnd_name`, `unt_id`, `usr_id`) VALUES
(1, 'a4tech', 1, 1),
(2, 'Plantronics', 3, 1),
(3, 'benq', 4, 1),
(4, 'intel', 6, 1),
(5, 'a4tech', 2, 1),
(6, 'a4tech', 3, 1),
(7, 'Lifepro', 5, 1),
(8, 'amd', 6, 1),
(9, 'hp', 4, 1),
(10, 'Brother', 7, 1),
(12, 'asus', 1, 1),
(13, 'a4tech', 8, 1),
(14, 'huawei', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chain_action`
--

CREATE TABLE `chain_action` (
  `id` int(11) NOT NULL,
  `action` varchar(30) NOT NULL,
  `color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chain_action`
--

INSERT INTO `chain_action` (`id`, `action`, `color`) VALUES
(1, 'CREATE', '#6FBF66'),
(2, 'EDIT', '#F6B64C'),
(3, 'TRANSFER', '#bc0909'),
(4, 'DELETE', '#F32A4A'),
(5, 'DEPLOYED', '#3547AD');

-- --------------------------------------------------------

--
-- Table structure for table `model_tbl`
--

CREATE TABLE `model_tbl` (
  `mdl_id` int(11) NOT NULL,
  `mdl_name` varchar(30) NOT NULL,
  `unt_id` int(11) NOT NULL,
  `brnd_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model_tbl`
--

INSERT INTO `model_tbl` (`mdl_id`, `mdl_name`, `unt_id`, `brnd_id`, `usr_id`) VALUES
(12, 'krs-83', 1, 1, 1),
(13, 'krs-85', 1, 1, 1),
(14, 'i3 4170', 6, 4, 1),
(15, 'VOYAGER 5200 UC', 3, 2, 1),
(16, 'VC8000 ', 5, 7, 1),
(17, 'a4-7120', 6, 8, 1),
(18, 'PD3200U', 4, 3, 1),
(19, 'hs-c7', 3, 1, 1),
(20, 'op-720 ps2', 2, 1, 1),
(21, 'g4560', 6, 4, 1),
(22, 'e190i', 4, 9, 1),
(23, 'DCP-L2540DW', 7, 10, 1),
(24, 'KLS-5U', 1, 1, 1),
(25, 'kbs-720', 1, 1, 1),
(26, 'as-kb000', 1, 12, 1),
(27, 'op-620d', 2, 1, 1),
(28, 'pk-910h', 8, 1, 1),
(29, 'b315s-936', 9, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_tbl`
--

CREATE TABLE `page_tbl` (
  `query` varchar(25) NOT NULL,
  `page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `path_tbl`
--

CREATE TABLE `path_tbl` (
  `pth_id` int(11) NOT NULL,
  `pth_link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `path_tbl`
--

INSERT INTO `path_tbl` (`pth_id`, `pth_link`) VALUES
(1, 'home'),
(2, 'report'),
(3, 'manageuser'),
(4, 'account'),
(5, 'signin'),
(6, 'signout'),
(7, 'theme'),
(8, 'test'),
(9, 'register'),
(10, 'unit'),
(11, 'addunit'),
(12, 'brand'),
(13, 'addbrand'),
(14, 'model'),
(15, 'addmodel'),
(16, 'supplier'),
(17, 'addsupplier'),
(18, 'addasset'),
(19, 'request'),
(20, 'thread'),
(21, 'notification'),
(22, 'reply'),
(23, 'qrcode'),
(24, 'item'),
(25, 'edit'),
(26, 'deploy'),
(27, 'session'),
(28, 'myrequest'),
(29, 'sendrequest'),
(30, 'allrequest'),
(31, 'logs'),
(32, 'repot'),
(33, 'try'),
(34, 'count'),
(35, 'site'),
(36, 'addsite'),
(37, 'transaction'),
(38, 'deployment'),
(39, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `reply_tbl`
--

CREATE TABLE `reply_tbl` (
  `rep_id` int(11) NOT NULL,
  `rep_body` text NOT NULL,
  `rep_created_at` varchar(30) NOT NULL,
  `rep_created_time` varchar(30) NOT NULL,
  `rep_author` varchar(30) NOT NULL,
  `rep_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_tbl`
--

INSERT INTO `reply_tbl` (`rep_id`, `rep_body`, `rep_created_at`, `rep_created_time`, `rep_author`, `rep_post`) VALUES
(1, 'this aknowledge', '08-07-2018', '06:37:15 am', 'Henry Abayan', 32),
(2, 'thanks', '08-07-2018', '06:38:17 am', 'Michael Dizon', 32),
(3, 'This is acknowledge', '08-09-2018', '07:23:29 am', 'Henry Abayan', 32),
(4, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment\"> Link </a>', '08-09-2018', '07:32:31 am', 'Henry Abayan', 31),
(5, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-hs-1\"> Link </a>', '08-09-2018', '08:45:39 am', 'Henry Abayan', 33),
(6, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-ms-1\"> Link </a>', '08-09-2018', '08:46:25 am', 'Henry Abayan', 35),
(7, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-hs-2&code=64737\"> Link </a>', '08-09-2018', '09:26:27 am', 'Henry Abayan', 33),
(8, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-hs-1&code=42992\"> Link </a>', '08-09-2018', '09:37:09 am', 'Henry Abayan', 34),
(9, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-kb-10&code=63216\"> Link </a>', '08-09-2018', '09:43:56 am', 'Henry Abayan', 36),
(10, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-kb-7&code=58274\"> Link </a>', '08-09-2018', '10:14:13 am', 'Henry Abayan', 37),
(11, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-su-5&code=30027\"> Link </a>', '08-09-2018', '11:38:20 am', 'Henry Abayan', 1),
(12, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-mt-2&code=13294\"> Link </a>', '08-09-2018', '11:39:44 am', 'Henry Abayan', 2),
(13, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-hs-3&code=23973\"> Link </a>', '08-09-2018', '11:44:30 am', 'Henry Abayan', 3),
(14, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-vc-1&code=85347\"> Link </a>', '08-09-2018', '12:10:18 pm', 'Henry Abayan', 4),
(15, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-su-3&code=12534\"> Link </a>', '10-03-2018', '11:28:06 pm', 'Henry Abayan', 1),
(16, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-su-8&code=96761\"> Link </a>', '10-03-2018', '11:43:03 pm', 'Henry Abayan', 1),
(17, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-mt-6&code=72441\"> Link </a>', '10-04-2018', '12:22:17 am', 'Henry Abayan', 5),
(18, 'This is acknowledge. Here is the link to edit the item...<a href=\"./?l=deployment&item=iccs-mt-4&code=70936\"> Link </a>', '02-14-2019', '09:25:59 am', 'Henry Abayan', 6);

-- --------------------------------------------------------

--
-- Table structure for table `report_export_tbl`
--

CREATE TABLE `report_export_tbl` (
  `id` int(11) NOT NULL,
  `site` varchar(30) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `shortage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_export_tbl`
--

INSERT INTO `report_export_tbl` (`id`, `site`, `unit`, `total`, `shortage`) VALUES
(1, 'Prestige 2005', 'keyboard', 3, 205),
(2, 'Prestige 2005', 'mouse', 1, 207),
(3, 'Prestige 2005', 'headset', 1, 207),
(4, 'Prestige 2005', 'monitor', 1, 207),
(5, 'Prestige 2005', 'vacuum cleaner', 0, 3),
(6, 'Prestige 2005', 'system unit', 5, 203),
(7, 'Prestige 2005', 'printer', 1, 0),
(8, 'Prestige 2005', 'webcam', 1, 1),
(9, 'Prestige 2006', 'keyboard', 1, 207),
(10, 'Prestige 2006', 'mouse', 0, 208),
(11, 'Prestige 2006', 'headset', 3, 205),
(12, 'Prestige 2006', 'monitor', 2, 206),
(13, 'Prestige 2006', 'vacuum cleaner', 0, 3),
(14, 'Prestige 2006', 'system unit', 0, 208),
(15, 'Prestige 2006', 'printer', 1, 0),
(16, 'Prestige 2006', 'webcam', 0, 2),
(17, 'Prestige 2007', 'keyboard', 2, 206),
(18, 'Prestige 2007', 'mouse', 0, 208),
(19, 'Prestige 2007', 'headset', 0, 208),
(20, 'Prestige 2007', 'monitor', 1, 207),
(21, 'Prestige 2007', 'vacuum cleaner', 0, 3),
(22, 'Prestige 2007', 'system unit', 2, 206),
(23, 'Prestige 2007', 'printer', 1, 0),
(24, 'Prestige 2007', 'webcam', 2, 0),
(25, 'Prestige 2204', 'keyboard', 0, 208),
(26, 'Prestige 2204', 'mouse', 0, 208),
(27, 'Prestige 2204', 'headset', 2, 206),
(28, 'Prestige 2204', 'monitor', 1, 207),
(29, 'Prestige 2204', 'vacuum cleaner', 1, 2),
(30, 'Prestige 2204', 'system unit', 0, 208),
(31, 'Prestige 2204', 'printer', 2, -1),
(32, 'Prestige 2204', 'webcam', 0, 2),
(33, 'Prestige 2206', 'keyboard', 1, 207),
(34, 'Prestige 2206', 'mouse', 0, 208),
(35, 'Prestige 2206', 'headset', 0, 208),
(36, 'Prestige 2206', 'monitor', 0, 208),
(37, 'Prestige 2206', 'vacuum cleaner', 0, 3),
(38, 'Prestige 2206', 'system unit', 3, 205),
(39, 'Prestige 2206', 'printer', 1, 0),
(40, 'Prestige 2206', 'webcam', 0, 2),
(41, 'Prestige 2207', 'keyboard', 0, 208),
(42, 'Prestige 2207', 'mouse', 0, 208),
(43, 'Prestige 2207', 'headset', 0, 208),
(44, 'Prestige 2207', 'monitor', 0, 208),
(45, 'Prestige 2207', 'vacuum cleaner', 0, 3),
(46, 'Prestige 2207', 'system unit', 0, 208),
(47, 'Prestige 2207', 'printer', 0, 1),
(48, 'Prestige 2207', 'webcam', 0, 2),
(49, 'Prestige 2404', 'keyboard', 0, 208),
(50, 'Prestige 2404', 'mouse', 0, 208),
(51, 'Prestige 2404', 'headset', 0, 208),
(52, 'Prestige 2404', 'monitor', 1, 207),
(53, 'Prestige 2404', 'vacuum cleaner', 0, 3),
(54, 'Prestige 2404', 'system unit', 0, 208),
(55, 'Prestige 2404', 'printer', 0, 1),
(56, 'Prestige 2404', 'webcam', 0, 2),
(57, 'Prestige 1110', 'keyboard', 0, 208),
(58, 'Prestige 1110', 'mouse', 0, 208),
(59, 'Prestige 1110', 'headset', 0, 208),
(60, 'Prestige 1110', 'monitor', 0, 208),
(61, 'Prestige 1110', 'vacuum cleaner', 0, 3),
(62, 'Prestige 1110', 'system unit', 0, 208),
(63, 'Prestige 1110', 'printer', 1, 0),
(64, 'Prestige 1110', 'webcam', 0, 2),
(65, 'Prestige 2205', 'keyboard', 0, 208),
(66, 'Prestige 2205', 'mouse', 0, 208),
(67, 'Prestige 2205', 'headset', 0, 208),
(68, 'Prestige 2205', 'monitor', 0, 208),
(69, 'Prestige 2205', 'vacuum cleaner', 0, 3),
(70, 'Prestige 2205', 'system unit', 0, 208),
(71, 'Prestige 2205', 'printer', 0, 1),
(72, 'Prestige 2205', 'webcam', 0, 2),
(73, 'Prestige 2005', 'router', 1, -1),
(74, 'Prestige 2006', 'router', 0, 0),
(75, 'Prestige 2007', 'router', 0, 0),
(76, 'Prestige 2204', 'router', 0, 0),
(77, 'Prestige 2206', 'router', 0, 0),
(78, 'Prestige 2207', 'router', 0, 0),
(79, 'Prestige 2404', 'router', 0, 0),
(80, 'Prestige 1110', 'router', 0, 0),
(81, 'Prestige 2205', 'router', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `report_tbl`
--

CREATE TABLE `report_tbl` (
  `id` int(11) NOT NULL,
  `label` varchar(30) NOT NULL,
  `y` int(11) NOT NULL,
  `site` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_tbl`
--

INSERT INTO `report_tbl` (`id`, `label`, `y`, `site`) VALUES
(1, 'keyboard', 7, 'All site'),
(2, 'mouse', 1, 'All site'),
(3, 'headset', 6, 'All site'),
(4, 'monitor', 6, 'All site'),
(5, 'vacuum cleaner', 1, 'All site'),
(6, 'system unit', 10, 'All site'),
(7, 'printer', 7, 'All site'),
(8, 'webcam', 3, 'All site'),
(9, 'router', 1, 'All site');

-- --------------------------------------------------------

--
-- Table structure for table `request_tbl`
--

CREATE TABLE `request_tbl` (
  `req_id` int(11) NOT NULL,
  `unit_code` varchar(50) NOT NULL,
  `req_title` varchar(100) NOT NULL,
  `req_description` text NOT NULL,
  `req_created_at` varchar(20) NOT NULL,
  `req_created_time` varchar(30) NOT NULL,
  `req_author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_tbl`
--

INSERT INTO `request_tbl` (`req_id`, `unit_code`, `req_title`, `req_description`, `req_created_at`, `req_created_time`, `req_author`) VALUES
(1, 'system unit', 'Maverick Barleta request system unit', 'new station for trainee', '08-09-2018', '11:37:58 am', 'Maverick Barleta'),
(2, 'monitor', 'Maverick Barleta request monitor', 'monitor for trainee', '08-09-2018', '11:39:32 am', 'Maverick Barleta'),
(3, 'headset', 'Maverick Barleta request headset', 'replacement for station 75', '08-09-2018', '11:44:01 am', 'Maverick Barleta'),
(4, 'vacuum cleaner', 'Maverick Barleta request vacuum cleaner', 'test', '08-09-2018', '12:09:52 pm', 'Maverick Barleta'),
(5, 'monitor', 'Henry Abayan request monitor', 'test monitor request', '10-04-2018', '12:22:03 am', 'Henry Abayan'),
(6, 'monitor', 'Alex Naval request monitor', 'Replacement to station 32 @ 2204', '02-14-2019', '09:24:31 am', 'Alex Naval');

-- --------------------------------------------------------

--
-- Table structure for table `site_tbl`
--

CREATE TABLE `site_tbl` (
  `site_id` int(11) NOT NULL,
  `site_name` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `total_station` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_tbl`
--

INSERT INTO `site_tbl` (`site_id`, `site_name`, `location`, `total_station`) VALUES
(2, 'Prestige 2005', '2005', 0),
(3, 'Prestige 2006', '2006', 0),
(4, 'Prestige 2007', '2007', 0),
(5, 'Prestige 2204', '2204', 0),
(6, 'Prestige 2206', '2206', 0),
(7, 'Prestige 2207', '2207', 0),
(8, 'Prestige 2404', '2404', 0),
(9, 'Prestige 1110', '1110', 0),
(10, 'Prestige 2205', '2205', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_tbl`
--

CREATE TABLE `status_tbl` (
  `sts_id` int(11) NOT NULL,
  `sts_mark` varchar(50) NOT NULL,
  `sts_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_tbl`
--

INSERT INTO `status_tbl` (`sts_id`, `sts_mark`, `sts_color`) VALUES
(1, 'working', 'success'),
(2, 'partial defect', 'warning'),
(3, 'defective', 'danger');

-- --------------------------------------------------------

--
-- Table structure for table `storage_tbl`
--

CREATE TABLE `storage_tbl` (
  `strg_id` int(11) NOT NULL,
  `stored` varchar(20) NOT NULL,
  `strg_mark` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage_tbl`
--

INSERT INTO `storage_tbl` (`strg_id`, `stored`, `strg_mark`) VALUES
(1, 'deployed', 'Deployed on floor'),
(2, 'pulled out', 'In storage');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_tbl`
--

CREATE TABLE `supplier_tbl` (
  `spplr_id` int(11) NOT NULL,
  `spplr_store` varchar(100) NOT NULL,
  `spplr_contact_num` varchar(11) NOT NULL,
  `spplr_email` varchar(30) NOT NULL,
  `spplr_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_tbl`
--

INSERT INTO `supplier_tbl` (`spplr_id`, `spplr_store`, `spplr_contact_num`, `spplr_email`, `spplr_address`) VALUES
(1, 'Easy Pc North Edsa', '0917898924', 'test@easypc.com', '35 North Ave, Project 6, Quezon City, 1105 Metro Manila'),
(2, 'Octagon Megamall', '6315476', 'octagon@test.com', 'Building B SM Mega mall'),
(4, 'Easypc Ortigas', '09392919471', 'ortigas@easypc.com', '2nd Floor LG Plaza Gold Bldg. #58 Ortigas Ave. Ext. Brgy. Sta. Lucia');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
(1, 'Henry'),
(2, 'Roselle'),
(3, 'Henry'),
(4, 'Jomar'),
(5, 'Rey');

-- --------------------------------------------------------

--
-- Table structure for table `total_per_site_tbl`
--

CREATE TABLE `total_per_site_tbl` (
  `id` int(11) NOT NULL,
  `site` varchar(30) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_per_site_tbl`
--

INSERT INTO `total_per_site_tbl` (`id`, `site`, `unit`, `total`) VALUES
(1, 'Prestige 1110', 'keyboard', 208),
(2, 'Prestige 1110', 'mouse', 208),
(3, 'Prestige 1110', 'headset', 208),
(4, 'Prestige 1110', 'monitor', 208),
(5, 'Prestige 1110', 'vacuum cleaner', 3),
(6, 'Prestige 1110', 'system unit', 208),
(7, 'Prestige 1110', 'printer', 1),
(8, 'Prestige 1110', 'webcam', 2),
(9, 'Prestige 2005', 'keyboard', 208),
(10, 'Prestige 2005', 'mouse', 208),
(11, 'Prestige 2005', 'headset', 208),
(12, 'Prestige 2005', 'monitor', 208),
(13, 'Prestige 2005', 'vacuum cleaner', 3),
(14, 'Prestige 2005', 'system unit', 208),
(15, 'Prestige 2005', 'printer', 1),
(16, 'Prestige 2005', 'webcam', 2),
(17, 'Prestige 2006', 'keyboard', 208),
(18, 'Prestige 2006', 'mouse', 208),
(19, 'Prestige 2006', 'headset', 208),
(20, 'Prestige 2006', 'monitor', 208),
(21, 'Prestige 2006', 'vacuum cleaner', 3),
(22, 'Prestige 2006', 'system unit', 208),
(23, 'Prestige 2006', 'printer', 1),
(24, 'Prestige 2006', 'webcam', 2),
(25, 'Prestige 2007', 'keyboard', 208),
(26, 'Prestige 2007', 'mouse', 208),
(27, 'Prestige 2007', 'headset', 208),
(28, 'Prestige 2007', 'monitor', 208),
(29, 'Prestige 2007', 'vacuum cleaner', 3),
(30, 'Prestige 2007', 'system unit', 208),
(31, 'Prestige 2007', 'printer', 1),
(32, 'Prestige 2007', 'webcam', 2),
(33, 'Prestige 2204', 'keyboard', 208),
(34, 'Prestige 2204', 'mouse', 208),
(35, 'Prestige 2204', 'headset', 208),
(36, 'Prestige 2204', 'monitor', 208),
(37, 'Prestige 2204', 'vacuum cleaner', 3),
(38, 'Prestige 2204', 'system unit', 208),
(39, 'Prestige 2204', 'printer', 1),
(40, 'Prestige 2204', 'webcam', 2),
(41, 'Prestige 2206', 'keyboard', 208),
(42, 'Prestige 2206', 'mouse', 208),
(43, 'Prestige 2206', 'headset', 208),
(44, 'Prestige 2206', 'monitor', 208),
(45, 'Prestige 2206', 'vacuum cleaner', 3),
(46, 'Prestige 2206', 'system unit', 208),
(47, 'Prestige 2206', 'printer', 1),
(48, 'Prestige 2206', 'webcam', 2),
(49, 'Prestige 2207', 'keyboard', 208),
(50, 'Prestige 2207', 'mouse', 208),
(51, 'Prestige 2207', 'headset', 208),
(52, 'Prestige 2207', 'monitor', 208),
(53, 'Prestige 2207', 'vacuum cleaner', 3),
(54, 'Prestige 2207', 'system unit', 208),
(55, 'Prestige 2207', 'printer', 1),
(56, 'Prestige 2207', 'webcam', 2),
(57, 'Prestige 2404', 'keyboard', 208),
(58, 'Prestige 2404', 'mouse', 208),
(59, 'Prestige 2404', 'headset', 208),
(60, 'Prestige 2404', 'monitor', 208),
(61, 'Prestige 2404', 'vacuum cleaner', 3),
(62, 'Prestige 2404', 'system unit', 208),
(63, 'Prestige 2404', 'printer', 1),
(64, 'Prestige 2404', 'webcam', 2),
(65, 'Prestige 2205', 'keyboard', 208),
(66, 'Prestige 2205', 'mouse', 208),
(67, 'Prestige 2205', 'headset', 208),
(68, 'Prestige 2205', 'monitor', 208),
(69, 'Prestige 2205', 'vacuum cleaner', 3),
(70, 'Prestige 2205', 'system unit', 208),
(71, 'Prestige 2205', 'printer', 1),
(72, 'Prestige 2205', 'webcam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `sts_id` int(11) NOT NULL,
  `stord_id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL,
  `date_modify` varchar(50) NOT NULL,
  `time_modify` varchar(50) NOT NULL,
  `modify_by` varchar(50) NOT NULL,
  `site_name` varchar(50) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `previous_block` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `item_code`, `action`, `brand_name`, `model_name`, `sts_id`, `stord_id`, `location`, `note`, `date_modify`, `time_modify`, `modify_by`, `site_name`, `hash`, `previous_block`) VALUES
(1, 'iccs-kb-1', 'CREATE', 'a4tech', 'krs-83', 1, 2, '', '', '08-09-2018', '11:33:51 am', 'Henry Abayan', 'Prestige 2005', '867d6965907c760c3c5dc467d9252cb59e2e8d49264759b59a262ace1ae718a1', 'Genesis Block'),
(2, 'iccs-ms-1', 'CREATE', 'a4tech', 'op-720 ps2', 1, 2, '', '', '08-09-2018', '11:33:55 am', 'Henry Abayan', 'Prestige 2005', '22866f32c47ca15fcd917908da452a9deba234cac1d25ac79283de6f1a0ff0f3', 'Genesis Block'),
(3, 'iccs-hs-1', 'CREATE', 'Plantronics', 'VOYAGER 5200 UC', 1, 2, '', '', '08-09-2018', '11:33:59 am', 'Henry Abayan', 'Prestige 2005', '0d6255e9909b382ae83b18ae6c701b94215286fe2392d6583ed8dd6ae58f782e', 'Genesis Block'),
(4, 'iccs-mt-1', 'CREATE', 'benq', 'PD3200U', 1, 2, '', '', '08-09-2018', '11:34:05 am', 'Henry Abayan', 'Prestige 2005', '0a948eb771a609a539c770ca284d018d6ad4abd0d6bc54fa45b1c538d4b27f99', 'Genesis Block'),
(5, 'iccs-vc-1', 'CREATE', 'Lifepro', 'VC8000', 1, 2, '', '', '08-09-2018', '11:34:33 am', 'Henry Abayan', 'Prestige 2005', 'd7d387fe3f9d18459c19c21ecca0426386fd61f9c43a91b7326809bd16799047', 'Genesis Block'),
(6, 'iccs-su-1', 'CREATE', 'intel', 'i3 4170', 1, 2, '', '', '08-09-2018', '11:34:39 am', 'Henry Abayan', 'Prestige 2005', '6da118a28e9b9d68d8ab39fee2ff0770ff9d20a576e9fe330aaf328e89a58363', 'Genesis Block'),
(7, 'iccs-su-2', 'CREATE', 'intel', 'i3 4170', 1, 2, '', '', '08-09-2018', '11:34:42 am', 'Henry Abayan', 'Prestige 2005', '88ae31d7fe066edf07a81673466f84885197e24524b42018d090b336370d83a2', 'Genesis Block'),
(8, 'iccs-su-3', 'CREATE', 'intel', 'i3 4170', 1, 2, '', '', '08-09-2018', '11:34:47 am', 'Henry Abayan', 'Prestige 2005', '53dff83cff00370e793d2f52a50238ecdd0ed77750bc6464fa407fefb2c96295', 'Genesis Block'),
(9, 'iccs-su-4', 'CREATE', 'intel', 'i3 4170', 1, 2, '', '', '08-09-2018', '11:34:52 am', 'Henry Abayan', 'Prestige 2005', 'f2c30e05eb14fdc54150c69e4544392a89a34a31043b690e140d83354b453571', 'Genesis Block'),
(10, 'iccs-pr-1', 'CREATE', 'Brother', 'DCP-L2540DW', 1, 2, '', '', '08-09-2018', '11:34:57 am', 'Henry Abayan', 'Prestige 2005', '8a7414db672a15a80d5bea125b615d7109b7591364b0a9f26000a52b60f7e6f7', 'Genesis Block'),
(11, 'iccs-wc-1', 'CREATE', 'a4tech', 'pk-910h', 1, 2, '', '', '08-09-2018', '11:35:01 am', 'Henry Abayan', 'Prestige 2005', '8935b61e384d4d6bc3223d6ead18644746815673f19c96bdd10f1444ac4a8b67', 'Genesis Block'),
(12, 'iccs-hs-2', 'CREATE', 'Plantronics', 'VOYAGER 5200 UC', 1, 2, '', '', '08-09-2018', '11:35:14 am', 'Henry Abayan', 'Prestige 2204', '5f571ea5c602ef15939c12edd726db3b850b3894a9363b67e679e2c7bdc95e38', 'Genesis Block'),
(13, 'iccs-mt-2', 'CREATE', 'benq', 'PD3200U', 1, 2, '', '', '08-09-2018', '11:35:18 am', 'Henry Abayan', 'Prestige 2007', '687256cf83e1831ce750d96f82770cea41d7d65795b2553f354905b3c7dff5c5', 'Genesis Block'),
(14, 'iccs-pr-2', 'CREATE', 'Brother', 'DCP-L2540DW', 1, 2, '', '', '08-09-2018', '11:35:25 am', 'Henry Abayan', 'Prestige 2206', '8483b59409ba2c9e776949aef532aafffc0bb4195b743ad734a19090215d7f50', 'Genesis Block'),
(15, 'iccs-wc-2', 'CREATE', 'a4tech', 'pk-910h', 1, 2, '', '', '08-09-2018', '11:35:30 am', 'Henry Abayan', 'Prestige 2007', '89130c38c83ed29f7dbd3985160c5dfb8e2b641a8ac36e3f2d946e972dceb4f2', 'Genesis Block'),
(16, 'iccs-mt-3', 'CREATE', 'benq', 'PD3200U', 1, 2, '', '', '08-09-2018', '11:35:59 am', 'Henry Abayan', 'Prestige 2204', '7b6b264725d6b36f1dc37771c6549448dcc77bcefea6b07f35d1c07dfcfd63a1', 'Genesis Block'),
(17, 'iccs-mt-4', 'CREATE', 'benq', 'PD3200U', 1, 2, '', '', '08-09-2018', '11:36:03 am', 'Henry Abayan', 'Prestige 2207', 'ff4401b33db6da1b949499a49970ecc8c632bbc31ba4334947aca0db36c5c5ce', 'Genesis Block'),
(18, 'iccs-su-5', 'CREATE', 'intel', 'i3 4170', 1, 2, '', '', '08-09-2018', '11:36:08 am', 'Henry Abayan', 'Prestige 2206', 'afd7cdab628aebefe2eafd6ce4ce1c37a9226107bc5cd8c705c300cc8720d08d', 'Genesis Block'),
(19, 'iccs-pr-3', 'CREATE', 'Brother', 'DCP-L2540DW', 1, 2, '', '', '08-09-2018', '11:36:12 am', 'Henry Abayan', 'Prestige 2007', '509d424de210468dc8e5a16446ef23fd053efd36790a433efc2f9acf8522bc2c', 'Genesis Block'),
(20, 'iccs-su-6', 'CREATE', 'intel', 'i3 4170', 1, 2, '', '', '08-09-2018', '11:36:18 am', 'Henry Abayan', 'Prestige 2007', 'b6cb60b2837964e2441c28a5803b989aa7cacd0a60c4d2378a17bdb94216ac67', 'Genesis Block'),
(21, 'iccs-hs-3', 'CREATE', 'Plantronics', 'VOYAGER 5200 UC', 1, 2, '', '', '08-09-2018', '11:36:28 am', 'Henry Abayan', 'Prestige 2204', '608c2e6b45a0d2e5c287e40d70e6edfcfce822e90115fa835c5a3baf6742ee1a', 'Genesis Block'),
(22, 'iccs-mt-5', 'CREATE', 'benq', 'PD3200U', 1, 2, '', '', '08-09-2018', '11:36:34 am', 'Henry Abayan', 'Prestige 2404', 'ddc7676aebd6b230683edb9c212aaa26293ea77802a4abfca81b12b2f880ae75', 'Genesis Block'),
(23, 'iccs-mt-6', 'CREATE', 'hp', 'e190i', 1, 2, '', '', '08-09-2018', '11:36:44 am', 'Henry Abayan', 'Prestige 2006', 'be202ceed16e50c884e564771375f7554c637d0cc81b9e89d8cf60a49a1ee5b9', 'Genesis Block'),
(24, 'iccs-su-7', 'CREATE', 'intel', 'i3 4170', 1, 2, '', '', '08-09-2018', '11:36:48 am', 'Henry Abayan', 'Prestige 2206', '84e3bb3452e644be5e3ec2ad89871b282d8bfbb9447d81367e3c898f82930758', 'Genesis Block'),
(25, 'iccs-su-5', 'DEPLOYED', 'intel', 'i3 4170', 1, 1, '', '', '08-09-2018', '11:38:29 am', 'Maverick Barleta', 'Prestige 2206', '3e9291646fa33d0d18065c71cd9eb597e5acb949fea5bb777a6376be81a34659', 'afd7cdab628aebefe2eafd6ce4ce1c37a9226107bc5cd8c705c300cc8720d08d'),
(26, 'iccs-su-5', 'EDIT', 'intel', 'i3 4170', 2, 1, '', '', '08-09-2018', '11:38:41 am', 'Maverick Barleta', 'Prestige 2206', '0eec77ac74f3c29eff015fb94c3e180afc3f77243506a48de7f720562a72e687', '3e9291646fa33d0d18065c71cd9eb597e5acb949fea5bb777a6376be81a34659'),
(27, 'iccs-mt-2', 'DEPLOYED', 'benq', 'PD3200U', 1, 1, '', '', '08-09-2018', '11:39:48 am', 'Maverick Barleta', 'Prestige 2007', '14913cfbb32f0187a3a4c9fbaab341e29eafc8e5fb82dc89e7dc88b34d361d03', '687256cf83e1831ce750d96f82770cea41d7d65795b2553f354905b3c7dff5c5'),
(28, 'iccs-mt-2', 'TRANSFER', 'benq', 'PD3200U', 1, 1, 'station 35', '', '08-09-2018', '11:40:12 am', 'Maverick Barleta', 'Prestige 2007', '2babdbf8fe216a4f1485caf18b4f7c699af4e3fa4b74a50739ac83caa48acacf', '14913cfbb32f0187a3a4c9fbaab341e29eafc8e5fb82dc89e7dc88b34d361d03'),
(29, 'iccs-mt-2', 'EDIT', 'benq', 'PD3200U', 2, 1, 'station 35', '', '08-09-2018', '11:40:24 am', 'Maverick Barleta', 'Prestige 2007', 'b88ab3b7e32a0bf160126e73e11383078431551433630ade2d3732f70dad807c', '2babdbf8fe216a4f1485caf18b4f7c699af4e3fa4b74a50739ac83caa48acacf'),
(30, 'iccs-mt-2', 'TRANSFER', 'benq', 'PD3200U', 2, 1, '', '', '08-09-2018', '11:40:24 am', 'Maverick Barleta', 'Prestige 2007', '223715c1e0f351fb9b2a09a8f17462795e4e443ef66b9999c799524fa12b9eec', 'b88ab3b7e32a0bf160126e73e11383078431551433630ade2d3732f70dad807c'),
(31, 'iccs-kb-2', 'CREATE', 'a4tech', 'krs-83', 1, 2, '', '', '08-09-2018', '11:41:49 am', 'Henry Abayan', 'Prestige 2206', '5b197be3596b25d77369c02316b8242d01456b19f0a5b4cf4bd5ff9ba493790b', 'Genesis Block'),
(32, 'iccs-pr-4', 'CREATE', 'Brother', 'DCP-L2540DW', 1, 2, '', '', '08-09-2018', '11:41:53 am', 'Henry Abayan', 'Prestige 2204', '777d8c6f05b6f2482190843bb5508bce824b9600de5a4c216d83c0f813a26428', 'Genesis Block'),
(33, 'iccs-hs-3', 'DEPLOYED', 'Plantronics', 'VOYAGER 5200 UC', 1, 1, '', '', '08-09-2018', '11:45:30 am', 'Henry Abayan', 'Prestige 2204', 'c2ea14e58f90a59c5fcb7905866be042a7f1e2301ab8cd67a6c10092b01ede53', '608c2e6b45a0d2e5c287e40d70e6edfcfce822e90115fa835c5a3baf6742ee1a'),
(34, 'iccs-hs-3', 'EDIT', 'Plantronics', 'VOYAGER 5200 UC', 1, 1, '', 'broken pin', '08-09-2018', '11:45:40 am', 'Maverick Barleta', 'Prestige 2204', '2f0d66c93100615dc5a780f1b9bc47a3944839fc37663359ddf0987c572c4557', 'c2ea14e58f90a59c5fcb7905866be042a7f1e2301ab8cd67a6c10092b01ede53'),
(35, 'iccs-hs-3', 'EDIT', 'Plantronics', 'VOYAGER 5200 UC', 2, 1, '', 'broken pin', '08-09-2018', '11:45:54 am', 'Maverick Barleta', 'Prestige 2204', 'a5d9de01b7d5d359ce9d9eb075be96a063fc8ba2332c00828bd88b5a4b5bd1f4', '2f0d66c93100615dc5a780f1b9bc47a3944839fc37663359ddf0987c572c4557'),
(36, 'iccs-hs-3', 'EDIT', 'Plantronics', 'VOYAGER 5200 UC', 3, 1, '', 'broken pin', '08-09-2018', '11:46:02 am', 'Maverick Barleta', 'Prestige 2204', '3eda6421fce771f89bbb87c0dad18e12fc09664e4e1be8c46e15a099fe63c8ee', 'a5d9de01b7d5d359ce9d9eb075be96a063fc8ba2332c00828bd88b5a4b5bd1f4'),
(37, 'iccs-vc-1', 'DEPLOYED', 'Lifepro', 'VC8000', 1, 1, '', '', '08-09-2018', '12:10:57 pm', 'Maverick Barleta', 'Prestige 2005', '5c54ce81e218df5a96c75eb3ff1e21d74977900d6bb3f79814cff6076016c95f', 'd7d387fe3f9d18459c19c21ecca0426386fd61f9c43a91b7326809bd16799047'),
(38, 'iccs-vc-1', 'EDIT', 'Lifepro', 'VC8000', 2, 1, '', '', '08-09-2018', '12:11:19 pm', 'Henry Abayan', 'Prestige 2005', 'b7baeb53afb0ac240cd25fc8a21a82037cac3c2b9d465e8f031f33ee52b74f04', '5c54ce81e218df5a96c75eb3ff1e21d74977900d6bb3f79814cff6076016c95f'),
(39, 'iccs-vc-1', 'EDIT', 'Lifepro', 'VC8000', 1, 1, '', '', '08-09-2018', '12:11:22 pm', 'Henry Abayan', 'Prestige 2005', 'ef3ddf24c0a4a3e183680ea15e281a5971b8edeb9ed3e73a768d396ca351f2c8', 'b7baeb53afb0ac240cd25fc8a21a82037cac3c2b9d465e8f031f33ee52b74f04'),
(40, 'iccs-vc-1', 'TRANSFER', 'Lifepro', 'VC8000', 1, 1, '', '', '08-09-2018', '12:11:22 pm', 'Henry Abayan', 'Prestige 2204', 'd3b476a3f5553fcfc713185dff0702784c655bf64d4b9851730c0d56ce50837c', 'ef3ddf24c0a4a3e183680ea15e281a5971b8edeb9ed3e73a768d396ca351f2c8'),
(41, 'iccs-kb-3', 'CREATE', 'a4tech', 'krs-83', 1, 2, '', '', '08-10-2018', '12:02:53 pm', 'Henry Abayan', 'Prestige 2007', 'fc70374318a538a20fb8d42a7642828161ffd076bb3f300fda763b8368037884', 'Genesis Block'),
(42, 'iccs-hs-4', 'CREATE', 'Plantronics', 'VOYAGER 5200 UC', 1, 2, '', '', '08-14-2018', '12:37:58 pm', 'Henry Abayan', 'Prestige 2006', '56c9bffd95bcedd4b75fd01e4160e9746a6fe6f320c27bb38edb0f37eb979456', 'Genesis Block'),
(43, 'iccs-mt-3', 'DELETE', 'deleted', 'deleted', 1, 2, 'deleted', 'deleted', '08-14-2018', '12:45:30 pm', 'Henry Abayan', 'Prestige 2204', '60367cf765241787e457f0ec75e7f30ecbc70126c495507dabb838ca9ecee3fe', '7b6b264725d6b36f1dc37771c6549448dcc77bcefea6b07f35d1c07dfcfd63a1'),
(44, '', 'EDIT', '', '', 1, 0, '', '', '10-03-2018', '11:38:53 pm', 'Henry Abayan', '', 'cf78d6d1c1cf814b45547227f31ee3789db98439c29fede601fa841429e3afdd', ''),
(45, '', 'TRANSFER', '', '', 0, 0, '', '', '10-03-2018', '11:38:53 pm', 'Henry Abayan', 'Prestige 2007', 'd909366b3dbd7efa77bc141cabc7cdc1d14e73e9252a79235f5f29856d1f64ef', ''),
(46, '', 'EDIT', '', '', 1, 0, '', '', '10-03-2018', '11:38:59 pm', 'Henry Abayan', '', 'd2deb0c4e957458ec1e396282c14e2679c8768e9ca5205d92228714bd67503e1', ''),
(47, '', 'TRANSFER', '', '', 0, 0, '', '', '10-03-2018', '11:38:59 pm', 'Henry Abayan', 'Prestige 2007', 'e85aa2ce37dd38f4bcf7811a2efeedff1a51388f2668c6b5b08efadcb5cc6808', ''),
(48, '', 'TRANSFER', '', '', 0, 0, 's', '', '10-03-2018', '11:38:59 pm', 'Henry Abayan', '', '2dda74de65f9fa29d0d2bf32853080207848befd6e7bce1d375955abea42a9f0', ''),
(49, '', 'DEPLOYED', '', '', 0, 1, '', '', '10-03-2018', '11:43:19 pm', 'Henry Abayan', '', '2fbac00d086d3aab5a2ff706d76d9fe86e34c422862d72d34d7522da2eb599ef', ''),
(50, 'iccs-kb-7', 'CREATE', 'a4tech', 'krs-83', 1, 2, '', '', '10-04-2018', '12:05:36 am', 'Henry Abayan', 'Prestige 2005', 'd64bd5e6da3d30fe219c066cb132304898d71b6afdd6dd1b00602c1354d5c41b', 'Genesis Block'),
(51, '', 'EDIT', '', '', 3, 0, '', '', '10-04-2018', '12:07:06 am', 'Henry Abayan', '', '4586a0a9d889f60d6ca8a2ddd92d6362b95d674c8e47372ac3ce679a012cd831', ''),
(52, '', 'TRANSFER', '', '', 0, 0, '', '', '10-04-2018', '12:07:06 am', 'Henry Abayan', 'Prestige 2005', '173179175d4d656249580c2d99dff9320c95b8cf575e0ad263f639aa20f930b4', ''),
(53, 'iccs-kb-8', 'CREATE', 'a4tech', 'krs-83', 1, 2, '', '', '10-04-2018', '12:18:02 am', 'Henry Abayan', 'Prestige 2006', '2a8a8553fe95ce108fa5620d461bbaef218ebff22628ae23f5e801f3f4a4e197', 'Genesis Block'),
(54, 'iccs-hs-6', 'CREATE', 'Plantronics', 'VOYAGER 5200 UC', 1, 2, '', '', '10-04-2018', '12:19:23 am', 'Henry Abayan', 'Prestige 2006', '07f7d1273d5f4775422849ff97c78e2fe1acc75914ec8551db114b42ad647a9c', 'Genesis Block'),
(55, 'iccs-su-10', 'CREATE', 'intel', 'i3 4170', 1, 2, '', '', '10-04-2018', '12:20:25 am', 'Henry Abayan', 'Prestige 2206', '36530a18bbef414b5788e4865012891483df7ef4f7a58240626369bbd798ce0a', 'Genesis Block'),
(56, 'iccs-mt-6', 'DEPLOYED', 'hp', 'e190i', 1, 1, '', '', '10-04-2018', '12:22:24 am', 'Henry Abayan', 'Prestige 2006', '36e012001c6402dd394fa3a56fb6df5d74d22c05e81b7306acbb15efd6cfdf46', 'be202ceed16e50c884e564771375f7554c637d0cc81b9e89d8cf60a49a1ee5b9');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_changes`
--

CREATE TABLE `transaction_changes` (
  `id` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `input` varchar(100) NOT NULL,
  `output` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_changes`
--

INSERT INTO `transaction_changes` (`id`, `hash`, `input`, `output`) VALUES
(1, '867d6965907c760c3c5dc467d9252cb59e2e8d49264759b59a262ace1ae718a1', '', 'iccs-kb-1'),
(2, '22866f32c47ca15fcd917908da452a9deba234cac1d25ac79283de6f1a0ff0f3', '', 'iccs-ms-1'),
(3, '0d6255e9909b382ae83b18ae6c701b94215286fe2392d6583ed8dd6ae58f782e', '', 'iccs-hs-1'),
(4, '0a948eb771a609a539c770ca284d018d6ad4abd0d6bc54fa45b1c538d4b27f99', '', 'iccs-mt-1'),
(5, 'd7d387fe3f9d18459c19c21ecca0426386fd61f9c43a91b7326809bd16799047', '', 'iccs-vc-1'),
(6, '6da118a28e9b9d68d8ab39fee2ff0770ff9d20a576e9fe330aaf328e89a58363', '', 'iccs-su-1'),
(7, '88ae31d7fe066edf07a81673466f84885197e24524b42018d090b336370d83a2', '', 'iccs-su-2'),
(8, '53dff83cff00370e793d2f52a50238ecdd0ed77750bc6464fa407fefb2c96295', '', 'iccs-su-3'),
(9, 'f2c30e05eb14fdc54150c69e4544392a89a34a31043b690e140d83354b453571', '', 'iccs-su-4'),
(10, '8a7414db672a15a80d5bea125b615d7109b7591364b0a9f26000a52b60f7e6f7', '', 'iccs-pr-1'),
(11, '8935b61e384d4d6bc3223d6ead18644746815673f19c96bdd10f1444ac4a8b67', '', 'iccs-wc-1'),
(12, '5f571ea5c602ef15939c12edd726db3b850b3894a9363b67e679e2c7bdc95e38', '', 'iccs-hs-2'),
(13, '687256cf83e1831ce750d96f82770cea41d7d65795b2553f354905b3c7dff5c5', '', 'iccs-mt-2'),
(14, '8483b59409ba2c9e776949aef532aafffc0bb4195b743ad734a19090215d7f50', '', 'iccs-pr-2'),
(15, '89130c38c83ed29f7dbd3985160c5dfb8e2b641a8ac36e3f2d946e972dceb4f2', '', 'iccs-wc-2'),
(16, '7b6b264725d6b36f1dc37771c6549448dcc77bcefea6b07f35d1c07dfcfd63a1', '', 'iccs-mt-3'),
(17, 'ff4401b33db6da1b949499a49970ecc8c632bbc31ba4334947aca0db36c5c5ce', '', 'iccs-mt-4'),
(18, 'afd7cdab628aebefe2eafd6ce4ce1c37a9226107bc5cd8c705c300cc8720d08d', '', 'iccs-su-5'),
(19, '509d424de210468dc8e5a16446ef23fd053efd36790a433efc2f9acf8522bc2c', '', 'iccs-pr-3'),
(20, 'b6cb60b2837964e2441c28a5803b989aa7cacd0a60c4d2378a17bdb94216ac67', '', 'iccs-su-6'),
(21, '608c2e6b45a0d2e5c287e40d70e6edfcfce822e90115fa835c5a3baf6742ee1a', '', 'iccs-hs-3'),
(22, 'ddc7676aebd6b230683edb9c212aaa26293ea77802a4abfca81b12b2f880ae75', '', 'iccs-mt-5'),
(23, 'be202ceed16e50c884e564771375f7554c637d0cc81b9e89d8cf60a49a1ee5b9', '', 'iccs-mt-6'),
(24, '84e3bb3452e644be5e3ec2ad89871b282d8bfbb9447d81367e3c898f82930758', '', 'iccs-su-7'),
(25, '3e9291646fa33d0d18065c71cd9eb597e5acb949fea5bb777a6376be81a34659', '', 'iccs-su-5'),
(26, '0eec77ac74f3c29eff015fb94c3e180afc3f77243506a48de7f720562a72e687', 'working', 'partial defect'),
(27, '14913cfbb32f0187a3a4c9fbaab341e29eafc8e5fb82dc89e7dc88b34d361d03', '', 'iccs-mt-2'),
(28, '2babdbf8fe216a4f1485caf18b4f7c699af4e3fa4b74a50739ac83caa48acacf', '', 'station 35'),
(29, 'b88ab3b7e32a0bf160126e73e11383078431551433630ade2d3732f70dad807c', 'working', 'partial defect'),
(30, '223715c1e0f351fb9b2a09a8f17462795e4e443ef66b9999c799524fa12b9eec', 'station 35', ''),
(31, '5b197be3596b25d77369c02316b8242d01456b19f0a5b4cf4bd5ff9ba493790b', '', 'iccs-kb-2'),
(32, '777d8c6f05b6f2482190843bb5508bce824b9600de5a4c216d83c0f813a26428', '', 'iccs-pr-4'),
(33, 'c2ea14e58f90a59c5fcb7905866be042a7f1e2301ab8cd67a6c10092b01ede53', '', 'iccs-hs-3'),
(34, '2f0d66c93100615dc5a780f1b9bc47a3944839fc37663359ddf0987c572c4557', '', 'broken pin'),
(35, 'a5d9de01b7d5d359ce9d9eb075be96a063fc8ba2332c00828bd88b5a4b5bd1f4', 'working', 'partial defect'),
(36, '3eda6421fce771f89bbb87c0dad18e12fc09664e4e1be8c46e15a099fe63c8ee', 'partial defect', 'defective'),
(37, '5c54ce81e218df5a96c75eb3ff1e21d74977900d6bb3f79814cff6076016c95f', '', 'iccs-vc-1'),
(38, 'b7baeb53afb0ac240cd25fc8a21a82037cac3c2b9d465e8f031f33ee52b74f04', 'working', 'partial defect'),
(39, 'ef3ddf24c0a4a3e183680ea15e281a5971b8edeb9ed3e73a768d396ca351f2c8', 'partial defect', 'working'),
(40, 'd3b476a3f5553fcfc713185dff0702784c655bf64d4b9851730c0d56ce50837c', 'Prestige 2005', 'Prestige 2204'),
(41, 'fc70374318a538a20fb8d42a7642828161ffd076bb3f300fda763b8368037884', '', 'iccs-kb-3'),
(42, '56c9bffd95bcedd4b75fd01e4160e9746a6fe6f320c27bb38edb0f37eb979456', '', 'iccs-hs-4'),
(43, '60367cf765241787e457f0ec75e7f30ecbc70126c495507dabb838ca9ecee3fe', '', 'iccs-mt-3'),
(44, 'cf78d6d1c1cf814b45547227f31ee3789db98439c29fede601fa841429e3afdd', '', 'working'),
(45, 'd909366b3dbd7efa77bc141cabc7cdc1d14e73e9252a79235f5f29856d1f64ef', '', 'Prestige 2007'),
(46, 'd2deb0c4e957458ec1e396282c14e2679c8768e9ca5205d92228714bd67503e1', '', 'working'),
(47, 'e85aa2ce37dd38f4bcf7811a2efeedff1a51388f2668c6b5b08efadcb5cc6808', '', 'Prestige 2007'),
(48, '2dda74de65f9fa29d0d2bf32853080207848befd6e7bce1d375955abea42a9f0', '', 's'),
(49, '2fbac00d086d3aab5a2ff706d76d9fe86e34c422862d72d34d7522da2eb599ef', '', ''),
(50, 'd64bd5e6da3d30fe219c066cb132304898d71b6afdd6dd1b00602c1354d5c41b', '', 'iccs-kb-7'),
(51, '4586a0a9d889f60d6ca8a2ddd92d6362b95d674c8e47372ac3ce679a012cd831', '', 'defective'),
(52, '173179175d4d656249580c2d99dff9320c95b8cf575e0ad263f639aa20f930b4', '', 'Prestige 2005'),
(53, '2a8a8553fe95ce108fa5620d461bbaef218ebff22628ae23f5e801f3f4a4e197', '', 'iccs-kb-8'),
(54, '07f7d1273d5f4775422849ff97c78e2fe1acc75914ec8551db114b42ad647a9c', '', 'iccs-hs-6'),
(55, '36530a18bbef414b5788e4865012891483df7ef4f7a58240626369bbd798ce0a', '', 'iccs-su-10'),
(56, '36e012001c6402dd394fa3a56fb6df5d74d22c05e81b7306acbb15efd6cfdf46', '', 'iccs-mt-6');

-- --------------------------------------------------------

--
-- Table structure for table `unit_tbl`
--

CREATE TABLE `unit_tbl` (
  `unt_id` int(11) NOT NULL,
  `unt_name` varchar(50) NOT NULL,
  `unt_code` varchar(30) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_tbl`
--

INSERT INTO `unit_tbl` (`unt_id`, `unt_name`, `unt_code`, `usr_id`) VALUES
(1, 'keyboard', 'iccs-kb-', 1),
(2, 'mouse', 'iccs-ms-', 1),
(3, 'headset', 'iccs-hs-', 1),
(4, 'monitor', 'iccs-mt-', 1),
(5, 'vacuum cleaner', 'iccs-vc-', 1),
(6, 'system unit', 'iccs-su-', 1),
(7, 'printer', 'iccs-pr-', 1),
(8, 'webcam', 'iccs-wc-', 1),
(9, 'router', 'iccs-rt-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `usr_id` int(11) NOT NULL,
  `usr_full_name` varchar(50) NOT NULL,
  `usr_email` varchar(50) NOT NULL,
  `usr_password` varchar(50) NOT NULL,
  `usrlvl_id` int(11) NOT NULL,
  `usr_last_seen` varchar(30) DEFAULT NULL,
  `usr_last_seen_time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`usr_id`, `usr_full_name`, `usr_email`, `usr_password`, `usrlvl_id`, `usr_last_seen`, `usr_last_seen_time`) VALUES
(1, 'Henry Abayan', 'henrya@iccsmail.com', '/lWQ9+uy1Q5TaoNy0wu0zg==', 4, '09-17-2018', '04:45:35 am'),
(23, 'Administrator', 'admin@testdomain.com', 'kIuYTSyAzNJcOM7zN0ppLA==', 4, '02-14-2019', '09:33:40 am'),
(24, 'Alex Naval', 'alexn@iccsmail.com', 'VMZ+3uF7VAuyNQl/Y00l5w==', 1, '02-14-2019', '09:14:59 am'),
(25, 'Krishna Mohan Bulusu', 'krishna.bulusu@iconceptcontactsolutions.com', '3wgqVIpjUu4eS+Oq8aKRDA==', 4, '08-17-2018', '04:37:52 pm'),
(26, 'Michael Dizon', 'micheld@iccsmail.com', 'UBGLqz5Jy0zxzMt1EnQC/Q==', 1, '08-07-2018', '06:36:17 am'),
(27, 'Maverick Barleta', 'mavs@iccsmail.com', 'BzKw3uaj32h4ZhKiwNPJ3Q==', 1, '08-09-2018', '09:45:23 am'),
(28, 'test', 'test@domain.com', 's2MizuyDKlReUh/GzWqAVQ==', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_level_tbl`
--

CREATE TABLE `user_level_tbl` (
  `usrlvl_id` int(11) NOT NULL,
  `usrlvl_mark` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level_tbl`
--

INSERT INTO `user_level_tbl` (`usrlvl_id`, `usrlvl_mark`) VALUES
(1, 'IT Support Associate'),
(2, 'IT Support'),
(3, 'Manager'),
(4, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset_report_tbl`
--
ALTER TABLE `asset_report_tbl`
  ADD PRIMARY KEY (`rpt_id`);

--
-- Indexes for table `asset_tbl`
--
ALTER TABLE `asset_tbl`
  ADD PRIMARY KEY (`asst_id`);

--
-- Indexes for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  ADD PRIMARY KEY (`brnd_id`);

--
-- Indexes for table `chain_action`
--
ALTER TABLE `chain_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_tbl`
--
ALTER TABLE `model_tbl`
  ADD PRIMARY KEY (`mdl_id`);

--
-- Indexes for table `path_tbl`
--
ALTER TABLE `path_tbl`
  ADD PRIMARY KEY (`pth_id`);

--
-- Indexes for table `reply_tbl`
--
ALTER TABLE `reply_tbl`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `report_export_tbl`
--
ALTER TABLE `report_export_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_tbl`
--
ALTER TABLE `report_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_tbl`
--
ALTER TABLE `request_tbl`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `site_tbl`
--
ALTER TABLE `site_tbl`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `status_tbl`
--
ALTER TABLE `status_tbl`
  ADD PRIMARY KEY (`sts_id`);

--
-- Indexes for table `storage_tbl`
--
ALTER TABLE `storage_tbl`
  ADD PRIMARY KEY (`strg_id`);

--
-- Indexes for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  ADD PRIMARY KEY (`spplr_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_per_site_tbl`
--
ALTER TABLE `total_per_site_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_changes`
--
ALTER TABLE `transaction_changes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_tbl`
--
ALTER TABLE `unit_tbl`
  ADD PRIMARY KEY (`unt_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `user_level_tbl`
--
ALTER TABLE `user_level_tbl`
  ADD PRIMARY KEY (`usrlvl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset_report_tbl`
--
ALTER TABLE `asset_report_tbl`
  MODIFY `rpt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `asset_tbl`
--
ALTER TABLE `asset_tbl`
  MODIFY `asst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  MODIFY `brnd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chain_action`
--
ALTER TABLE `chain_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `model_tbl`
--
ALTER TABLE `model_tbl`
  MODIFY `mdl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `path_tbl`
--
ALTER TABLE `path_tbl`
  MODIFY `pth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `reply_tbl`
--
ALTER TABLE `reply_tbl`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `report_export_tbl`
--
ALTER TABLE `report_export_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `report_tbl`
--
ALTER TABLE `report_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `request_tbl`
--
ALTER TABLE `request_tbl`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `site_tbl`
--
ALTER TABLE `site_tbl`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status_tbl`
--
ALTER TABLE `status_tbl`
  MODIFY `sts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `storage_tbl`
--
ALTER TABLE `storage_tbl`
  MODIFY `strg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  MODIFY `spplr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `total_per_site_tbl`
--
ALTER TABLE `total_per_site_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `transaction_changes`
--
ALTER TABLE `transaction_changes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `unit_tbl`
--
ALTER TABLE `unit_tbl`
  MODIFY `unt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_level_tbl`
--
ALTER TABLE `user_level_tbl`
  MODIFY `usrlvl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
