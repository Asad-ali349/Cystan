-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 02:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cystan`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `activity_type_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `from_time` time NOT NULL,
  `duration` int(11) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `company_id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `managed_by` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `name`, `activity_type_id`, `from_date`, `from_time`, `duration`, `notes`, `company_id`, `people_id`, `deal_id`, `status`, `managed_by`, `added_by`, `roll`, `created_at`, `updated_at`) VALUES
(6, 'comp act', 6, '2021-09-05', '22:13:00', 84, 'lkdsc', 0, 0, 5, 0, 0, 0, 0, '2021-09-05 13:08:19', '2021-09-05 13:08:19'),
(7, 'ind act', 17, '2021-09-05', '23:08:00', 10, 'wdiojc', 0, 0, 6, 0, 0, 0, 0, '2021-09-05 13:08:59', '2021-09-05 13:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `contact`, `address`, `city`, `state`, `zip`, `country`, `token`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'asad', 'asad@gmail.com', '100', '123456789', 'street', 'city', 'state', 52250, 'country', '123456789', 'abc', '2021-08-24 13:15:48', '2021-08-24 13:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `bureau`
--

CREATE TABLE `bureau` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `po_box` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bureau`
--

INSERT INTO `bureau` (`id`, `title`, `po_box`, `address`, `website`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Experian', 'PO Box 9701', 'Allen, TX 75031', 'www.experian.com', '888-397-3742', '2021-10-10 13:16:14', '2021-10-10 13:16:14'),
(2, 'Equifax Credit Information Services, Inc.', 'PO Box 740241', 'Atlanta, GA 30374-0256', 'www.equifax.com', '800-685-1111', '2021-10-10 13:17:11', '2021-10-31 12:27:11'),
(3, 'TransUnion Consumer Services', 'PO Box 2000', 'Chester, PA 19022', 'www.transunion.com', '800-888-4213', '2021-10-10 13:17:54', '2021-10-10 13:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Company', '2021-04-17 18:46:15', '2021-04-17 18:46:15'),
(2, 'People', '2021-04-17 18:46:15', '2021-04-17 18:46:15'),
(3, 'Deals', '2021-04-17 18:46:15', '2021-04-17 18:46:15'),
(4, 'Activity', '2021-04-17 18:46:15', '2021-04-17 18:46:15'),
(5, 'Document', '2021-05-11 12:48:33', '2021-05-11 12:48:33'),
(6, 'Services Type', '2021-09-02 16:28:57', '2021-09-02 16:28:57'),
(7, 'Business Type', '2021-10-26 17:07:41', '2021-10-26 17:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `pin_color_id` int(11) DEFAULT NULL,
  `total_employees` int(11) DEFAULT NULL,
  `parent_company_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `review_avg` varchar(255) DEFAULT NULL,
  `review_count` int(11) DEFAULT NULL,
  `credit_score` varchar(255) DEFAULT NULL,
  `anual_revenue` decimal(10,2) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `naics_id` int(11) NOT NULL,
  `is_company` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customer_id` varchar(255) NOT NULL,
  `loan_number` varchar(255) NOT NULL,
  `ein` varchar(255) NOT NULL,
  `ssn` varchar(255) NOT NULL,
  `managed_by` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `manage_role` int(11) NOT NULL,
  `owned_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `website`, `pin_color_id`, `total_employees`, `parent_company_id`, `group_id`, `contact`, `email`, `street`, `city`, `state`, `zip`, `country`, `review_avg`, `review_count`, `credit_score`, `anual_revenue`, `latitude`, `longitude`, `status`, `naics_id`, `is_company`, `created_at`, `updated_at`, `customer_id`, `loan_number`, `ein`, `ssn`, `managed_by`, `added_by`, `roll`, `manage_role`, `owned_by`) VALUES
(1, 'comp 1', 'https://mezangrp.com/', NULL, 4, 0, 1, '12345678', 'comp1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '7876786', 454545, '12322132', '45.00', '48.99508602632882', '11.019286718750028', 1, 3, 1, '2021-09-22 16:36:46', '2021-11-02 04:57:20', '4545', '444', '89778', '', 1, 0, 0, 2, 1),
(2, 'com 2', 'https://url.com/', NULL, 9, 1, 60, '12345678', 'comp2@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '12', 454545, '12', '12.00', '52.147394238132726', '-9.459228906249992', 1, 7, 1, '2021-09-22 16:38:22', '2021-11-02 04:57:20', '87545', '86', '686', '', 1, 0, 0, 2, 1),
(3, 'comp3', 'https://url.com/', NULL, 7, 0, 14, '12345678', 'comp3@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '56.10919251058496', '9.920653906250028', 1, 25, 1, '2021-09-22 16:39:22', '2021-11-02 04:49:14', '100', '333', '89778', '', 1, 0, 0, 1, 2),
(4, 'comp 4', 'https://url.com/', NULL, 15, 0, 1, '12345678', 'comp4@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '46.695137760717586', '18.753661718750028', 1, 59, 1, '2021-09-22 16:40:18', '2021-11-02 04:49:14', '222', '44', '89778', '', 1, 0, 0, 1, 2),
(5, 'comp 5', 'https://mezangrp.com/', NULL, 66, 0, 14, '12345678', 'comp5@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '55.416932932389905', '3.2409664062500276', 1, 3, 1, '2021-09-22 16:41:03', '2021-09-22 16:41:03', '100', '111', '4545', '', 0, 0, 0, 0, 0),
(6, 'comp 6', 'https://nokia.com/', NULL, 4, 0, 1, '12345678', 'comp6@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '47.53250135483116', '11.810302343750028', 1, 3, 1, '2021-09-23 11:14:57', '2021-09-23 11:14:57', '222', '44', '4545', '', 0, 0, 0, 0, 0),
(7, 'comp 7', 'https://nokia.com/', NULL, 4, 0, 1, '12345678', 'comp6@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '47.53250135483116', '11.810302343750028', 1, 3, 1, '2021-09-23 11:17:01', '2021-09-30 11:20:46', '222', '44', '4545', '', 0, 0, 0, 0, 5),
(9, 'client com update', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 4, 0, 1, '12345678', 'clientcomp@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '54.92968479941073', '23.327025231504468', 0, 2, 1, '2021-10-12 12:54:43', '2021-11-02 04:57:20', '546545', '', '788798', '', 1, 1, 1, 2, 1),
(10, 'ind2 comp', 'https://url.com/', NULL, 0, 1, 1, '12345678', 'ind2comp@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.47337600981179', '-3.9660648437499924', 1, 3, 1, '2021-10-16 12:28:46', '2021-11-02 04:49:14', '4454', '68786746', '98798465', '', 1, 1, 2, 1, 2),
(11, 'ad comp', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 85, 1, 14, '12345678', 'adcomp@gmail.com', 'jhku', 'jkhygjh', 'lkjlk', 3845, 'kjhiu', '', 0, '', '0.00', '52.73670696075128', '10.711669531250028', 1, 3, 1, '2021-10-20 11:02:52', '2021-10-20 11:02:52', '85', '85', '65456', '', 0, 0, 0, 0, 0),
(12, 'ind1 comp', 'https://url.com/', NULL, 41, 0, 0, '12345678', 'compind1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.60748940733303', '7.196044531250028', 0, 0, 1, '2021-10-20 11:56:27', '2021-11-02 04:57:20', '', '', '', '', 1, 1, 1, 2, 1),
(13, 'ind6 comp update', '', NULL, 0, 0, 0, '12345678', 'compind6@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '47.37231412134057', '6.009521093750028', 0, 0, 1, '2021-10-20 13:42:49', '2021-10-20 13:44:02', '787', '78', '78', '', 0, 0, 0, 0, 25),
(14, 'ind2 comp', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 45, 1, 1, '12345678', 'ind2comp@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.44423330903996', '-3.2629398437499924', 1, 2, 1, '2021-10-21 13:09:54', '2021-11-02 04:49:14', '15', '44', '', '', 1, 4, 1, 1, 2),
(15, 'ind2 comp', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 45, 1, 1, '12345678', 'ind2comp@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.44423330903996', '-3.2629398437499924', 1, 2, 1, '2021-10-21 13:11:20', '2021-11-02 04:49:14', '15', '44', '', '', 1, 4, 1, 1, 2),
(16, 'ind2 comp', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 45, 1, 1, '12345678', 'ind2comp@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.44423330903996', '-3.2629398437499924', 1, 2, 1, '2021-10-21 13:13:21', '2021-11-02 04:49:14', '15', '44', '', '', 1, 4, 1, 1, 2),
(17, 'ind2 comp', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 45, 1, 1, '12345678', 'ind2comp@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.44423330903996', '-3.2629398437499924', 1, 2, 1, '2021-10-21 13:13:57', '2021-11-02 04:49:14', '15', '44', '', '', 1, 4, 1, 1, 2),
(18, 'ind2 comp', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 45, 1, 1, '12345678', 'ind2comp@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.44423330903996', '-3.2629398437499924', 1, 2, 1, '2021-10-21 13:14:46', '2021-11-02 04:49:14', '15', '44', '', '', 1, 4, 1, 1, 2),
(19, 'ind2 comp', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 45, 1, 1, '12345678', 'ind2comp@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.44423330903996', '-3.2629398437499924', 1, 2, 1, '2021-10-21 13:16:33', '2021-11-02 04:49:14', '15', '44', '', '', 1, 4, 1, 1, 2),
(20, 'ind2 comp', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 45, 1, 1, '12345678', 'ind2comp@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.44423330903996', '-3.2629398437499924', 1, 2, 1, '2021-10-21 13:17:49', '2021-11-02 04:49:14', '15', '44', '', '', 1, 4, 1, 1, 2),
(21, 'ind2 comp', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 45, 1, 1, '12345678', 'ind2comp@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.44423330903996', '-3.2629398437499924', 1, 2, 1, '2021-10-21 13:18:35', '2021-11-02 04:49:14', '15', '44', '', '', 1, 4, 1, 1, 2),
(22, 'ind2 comp', 'https://www.google.com/search?q=volatile+memory&amp;rlz=1C1GCEB_enPK941PK941&amp;oq=volatile+&amp;aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&amp;sourceid=chrome&amp;ie=UTF-8', NULL, 45, 1, 1, '12345678', 'ind2comp@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.44423330903996', '-3.2629398437499924', 1, 2, 1, '2021-10-21 13:19:39', '2021-11-02 04:49:14', '15', '44', '', '', 1, 4, 1, 1, 2),
(23, 'test comp ind2', 'https://url.com/', NULL, 8, 3, 60, '12345678', 'testindcomp2@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '445', 44, '43', '83.00', '51.931141217931085', '14.534911718750028', 1, 3, 1, '2021-10-21 13:22:40', '2021-11-02 04:49:14', '33', '222', '78', '', 1, 4, 1, 1, 2),
(24, 'test comp ind2', 'https://url.com/', NULL, 8, 3, 60, '12345678', 'testindcomp2@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '445', 44, '43', '83.00', '51.931141217931085', '14.534911718750028', 1, 3, 1, '2021-10-21 13:26:43', '2021-11-02 04:49:14', '33', '222', '78', '', 1, 4, 1, 1, 2),
(25, 'ind1 comp', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 88, 0, 1, '12345678', 'compind1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.181195857321434', '11.063232031250028', 1, 3, 1, '2021-10-21 13:41:44', '2021-11-02 04:49:14', '3546', '614', '35465', '', 1, 4, 1, 1, 2),
(26, 'ind1 comp', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 648689, 0, 1, '12345678', 'compind1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.82178415603025', '7.591552343750028', 1, 2, 1, '2021-10-21 13:43:19', '2021-11-02 04:49:14', '', '', '', '', 1, 4, 1, 1, 2),
(27, 'ind1 comp', 'https://www.google.com/search?q=volatile+memory&rlz=1C1GCEB_enPK941PK941&oq=volatile+&aqs=chrome.1.69i57j0i67i433j0i67l2j0i67i433j0i67j0l4.3600j0j7&sourceid=chrome&ie=UTF-8', NULL, 648689, 0, 1, '12345678', 'compind1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '48.82178415603025', '7.591552343750028', 1, 2, 1, '2021-10-21 13:43:53', '2021-11-02 04:49:14', '', '', '', '', 1, 4, 1, 1, 2),
(28, 'ind6 comp', 'https://nokia.com/', NULL, 45, 0, 0, '12345678', 'compind6@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '46.695137760717586', '3.4167476562500276', 0, 4, 1, '2021-10-21 13:44:25', '2021-11-02 04:49:14', '', '', '', '', 1, 4, 1, 1, 2),
(29, 'ind6 comp', 'https://samsung.com/', NULL, 78, 2, 60, '12345678', 'compind6@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '51.276091518656315', '9.129638281250028', 0, 2, 1, '2021-10-21 13:46:22', '2021-10-30 07:32:42', '15', '8998', '89778', '', 0, 0, 0, 0, 0),
(30, 'ind1 comp', 'https://url.com/', NULL, 45, 1, 1, '12345678', 'compind1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '', '', 1, 2, 1, '2021-10-21 14:11:25', '2021-10-31 12:37:47', '', '', '', '', 1, 0, 0, 1, 16),
(31, 'ind1 comp', 'https://url.com/', NULL, 45, 1, 1, '12345678', 'compind1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '', '', 1, 2, 1, '2021-10-21 14:12:36', '2021-10-21 14:12:36', '', '', '', '', 0, 0, 0, 0, 0),
(32, 'ind1 comp', 'https://url.com/', NULL, 12, 1, 0, '12345678', 'compind1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '', '', 1, 2, 1, '2021-10-21 14:13:13', '2021-10-21 14:13:13', '', '', '', '', 0, 0, 0, 0, 0),
(33, 'ind1 comp', 'https://url.com/', NULL, 54, 1, 0, '12345678', 'empind@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '', '', 1, 2, 1, '2021-10-21 14:17:54', '2021-10-21 14:17:54', '', '', '', '', 0, 0, 0, 0, 0),
(34, 'ind1 comp', 'https://url.com/', NULL, 78, 1, 1, '12345678', 'asadking0366@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '', '', 1, 2, 1, '2021-10-21 14:36:33', '2021-10-21 14:36:33', '', '', '', '', 0, 0, 0, 0, 0),
(35, 'ind6 comp', 'https://url.com/', NULL, 0, 0, 0, '12345678', 'compind6@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '', '', 0, 20, 1, '2021-10-21 14:37:14', '2021-10-30 07:32:58', '', '', '', '', 0, 0, 0, 0, 0),
(36, 'ind1 comp', 'https://url.com/', NULL, 78, 0, 0, '12345678', 'compind1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '', '', 1, 18, 1, '2021-10-21 14:38:06', '2021-10-21 14:38:06', '', '', '', '', 0, 0, 0, 0, 0),
(37, 'ind1 comp', 'https://url.com/', NULL, 78, 0, 0, '12345678', 'compind1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '', '', 1, 17, 1, '2021-10-21 14:38:52', '2021-10-21 14:38:52', '', '', '', '', 0, 0, 0, 0, 0),
(38, 'ind1 comp', '', NULL, 0, 0, 0, '12345678', 'compind1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '', '', 1, 2, 1, '2021-10-21 14:40:06', '2021-10-21 14:40:06', '', '', '', '', 0, 0, 0, 0, 0),
(39, 'ind1 comp', '', NULL, 0, 0, 0, '12345678', 'compind1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '', '', 1, 2, 1, '2021-10-21 14:41:10', '2021-10-21 14:41:10', '', '', '', '', 0, 0, 0, 0, 0),
(40, 'ind1 comp', 'https://url.com/', NULL, 7, 0, 0, '12345678', 'compind1@gmail.com', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', '', 0, '', '0.00', '', '', 1, 2, 1, '2021-10-21 14:44:04', '2021-10-30 07:36:23', '', '', '', '', 0, 0, 0, 0, 28);

-- --------------------------------------------------------

--
-- Table structure for table `company_docs`
--

CREATE TABLE `company_docs` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `document` varchar(255) NOT NULL,
  `upload_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_company` tinyint(4) NOT NULL DEFAULT 0,
  `seen` tinyint(4) NOT NULL DEFAULT 0,
  `added_by` varchar(200) NOT NULL,
  `added_role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_docs`
--

INSERT INTO `company_docs` (`id`, `company_id`, `name`, `type`, `document`, `upload_date`, `created_at`, `updated_at`, `is_company`, `seen`, `added_by`, `added_role`) VALUES
(2, 2, 'images (1).png', 38, '614c6ef4c6b792021-09-23-14-11-32images (1).png', '0000-00-00', '2021-09-23 12:11:32', '2021-09-23 12:11:40', 1, 0, '1', '0'),
(4, 1, 'images.png', 45, '614c72505747f2021-09-23-14-25-52images.png', '0000-00-00', '2021-09-23 12:25:52', '2021-09-23 12:25:58', 0, 0, '1', '0'),
(7, 4, 'Restro (2).png', 42, '614ca9047aba82021-09-23-18-19-16Restro (2).png', '0000-00-00', '2021-09-23 16:19:16', '2021-09-23 16:19:26', 1, 0, '', ''),
(8, 4, 'Restro (1).png', 40, '614cab800821c2021-09-23-18-29-52Restro (1).png', '0000-00-00', '2021-09-23 16:29:52', '2021-09-23 16:34:26', 1, 0, '1', '2'),
(9, 4, 'images (2).png', 43, '614cabd61b27c2021-09-23-18-31-18images (2).png', '0000-00-00', '2021-09-23 16:31:18', '2021-09-23 16:34:29', 1, 0, '1', '0'),
(10, 4, 'images (6).jpg', 41, '614cad59d95432021-09-23-18-37-45images (6).jpg', '0000-00-00', '2021-09-23 16:37:45', '2021-09-23 16:37:52', 1, 0, '1', '1'),
(13, 7, 'Screenshot (39).png', 0, '61559dc6d5f582021-09-30-13-21-42Screenshot (39).png', '0000-00-00', '2021-09-30 11:21:42', '2021-09-30 11:21:42', 1, 0, '1', '0'),
(15, 9, 'main-qimg-520a7ccc637a39f664556ad5d7e090c4.png', 44, '61658ddde65bb2021-10-12-15-30-05main-qimg-520a7ccc637a39f664556ad5d7e090c4.png', '0000-00-00', '2021-10-12 13:30:05', '2021-10-12 13:33:21', 1, 0, '1', '3'),
(16, 1, 'cystan.sql', 43, '61659021264ba2021-10-12-15-39-45cystan.sql', '0000-00-00', '2021-10-12 13:39:45', '2021-10-12 13:39:52', 1, 0, '1', '3'),
(18, 2, 'cystan.sql', 40, '616ac539d698b2021-10-16-14-27-37cystan.sql', '0000-00-00', '2021-10-16 12:27:37', '2021-10-16 12:27:45', 0, 0, '2', '3'),
(19, 2, 'wallpaperflare-cropped.jpg', 40, '6170036d75bbc2021-10-20-13-54-21wallpaperflare-cropped.jpg', '0000-00-00', '2021-10-20 11:54:21', '2021-10-20 11:54:28', 1, 0, '1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE `deal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `funnel_id` int(11) NOT NULL,
  `score` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `deal_stage_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `managed_by` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal`
--

INSERT INTO `deal` (`id`, `name`, `company_id`, `funnel_id`, `score`, `amount`, `person_id`, `deal_stage_id`, `group_id`, `closing_date`, `managed_by`, `added_by`, `roll`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(5, 'deal comp', 3, 1, '84', '184.00', 0, 1, 5, '2021-09-13', 0, 0, 0, '52.28328169216427', '7.481689062500028', '2021-09-05 13:04:10', '2021-09-05 13:04:10'),
(6, 'ind deal', 0, 1, '86', '84.00', 20, 3, 16, '2021-09-30', 0, 0, 0, '52.0946946040225', '-9.261474999999992', '2021-09-05 13:05:22', '2021-09-05 13:05:22'),
(7, 'deal comp 2', 6, 1, '8489', '541.00', NULL, 3, 16, '2021-09-28', 0, 0, 0, '48.035855242875535', '15.128173437500028', '2021-09-05 15:21:39', '2021-09-05 15:21:39'),
(8, 'deal ind 2', 19, 1, '8', '2166.00', 19, 3, 16, '2021-09-29', 0, 0, 0, '55.54261856679907', '-4.735107812499992', '2021-09-05 15:22:48', '2021-09-05 15:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `deal_stage`
--

CREATE TABLE `deal_stage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal_stage`
--

INSERT INTO `deal_stage` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Negotiations', '2021-06-17 13:35:54', '2021-06-17 13:35:54'),
(3, 'initiated', '2021-06-17 19:46:30', '2021-06-17 19:46:30'),
(4, 'd stage', '2021-09-04 10:32:15', '2021-09-04 10:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `alt_contact` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `supervisor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`, `contact`, `alt_contact`, `street`, `city`, `state`, `zip`, `country`, `status`, `supervisor_id`, `created_at`, `updated_at`) VALUES
(1, 'zubair', 'zubair@gmail.com', '100', '123466789', '123456789', 'street', 'city', 'state', 52250, 'country', 1, 1, '2021-08-24 13:18:35', '2021-08-24 13:18:35'),
(2, 'a', 'asad12@gmail.com', '100', '12345678', '', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', 1, 3, '2021-09-16 13:19:26', '2021-09-16 13:19:26'),
(3, 'emo', 'emo@gmail.com', '100', '1215485', '4749745412', 'adress', 'dwd', 'state', 457, 'dwd', 1, 4, '2021-09-18 13:24:11', '2021-09-18 13:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `funel`
--

CREATE TABLE `funel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funel`
--

INSERT INTO `funel` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'business funnel', '2021-06-17 13:22:06', '2021-06-17 13:22:06'),
(3, 'Accounts Funnel', '2021-06-17 19:45:19', '2021-06-17 19:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `grouping`
--

CREATE TABLE `grouping` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `pin_color_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grouping`
--

INSERT INTO `grouping` (`id`, `name`, `pin_color_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Private Companyr', 6, 1, '2021-06-17 12:11:28', '2021-06-17 12:11:28'),
(2, 'Business', 2, 2, '2021-06-17 13:10:38', '2021-06-17 13:10:38'),
(5, 'business deal', 2, 3, '2021-06-17 13:29:22', '2021-06-17 13:29:22'),
(6, 'Call Meeting', 4, 4, '2021-06-17 13:33:35', '2021-06-17 13:33:35'),
(7, 'Tax documents', 0, 5, '2021-06-17 14:01:48', '2021-06-17 14:01:48'),
(14, 'Government company', 2, 1, '2021-06-17 19:34:57', '2021-06-17 19:34:57'),
(15, 'Salesman2', 5, 2, '2021-06-17 19:38:38', '2021-06-17 19:38:38'),
(16, 'Realestate Deal', 6, 3, '2021-06-17 19:39:49', '2021-06-17 19:39:49'),
(17, 'Visit', 6, 4, '2021-06-17 19:41:16', '2021-06-17 19:41:16'),
(18, 'Invoices Document', 0, 5, '2021-06-17 19:42:23', '2021-06-17 19:42:23'),
(19, 'PPP Application - Unsign', 0, 5, '2021-06-19 20:08:32', '2021-06-19 20:08:32'),
(20, 'Voided Check	', 2, 5, '2021-06-19 20:12:30', '2021-06-19 20:12:30'),
(21, 'IRS Form 941', 2, 5, '2021-06-19 20:13:08', '2021-06-19 20:13:08'),
(22, 'IRS Form 1120', 2, 5, '2021-06-19 20:13:16', '2021-06-19 20:13:16'),
(32, ' Credit Report', 2, 5, '2021-06-20 22:24:04', '2021-06-20 22:24:04'),
(33, 'PPP Application - Signed	', 2, 5, '2021-06-27 03:21:15', '2021-06-27 03:21:15'),
(34, 'PPP Lendio Validation	', 2, 5, '2021-06-27 03:50:02', '2021-06-27 03:50:02'),
(35, 'IRS Form 1040 Schedule C	', 2, 5, '2021-06-27 03:50:20', '2021-06-27 03:50:20'),
(36, 'Application Signed', 2, 5, '2021-06-28 19:55:23', '2021-06-28 19:55:23'),
(37, 'Payroll Processor Report	  ', 2, 5, '2021-06-28 20:05:05', '2021-06-28 20:05:05'),
(38, ' IRS Form 1120', 2, 5, '2021-06-28 20:21:00', '2021-06-28 20:21:00'),
(40, 'PPP Second Application - Signed	  ', 2, 5, '2021-06-28 22:27:16', '2021-06-28 22:27:16'),
(41, 'Ownership Verification	  ', 2, 5, '2021-06-28 23:02:52', '2021-06-28 23:02:52'),
(42, 'MTD Transactions	', 2, 5, '2021-06-28 23:03:27', '2021-06-28 23:03:27'),
(43, 'IRS Form 1099-MISC	', 2, 5, '2021-06-29 13:49:05', '2021-06-29 13:49:05'),
(44, ' Signed Contract	', 2, 5, '2021-06-29 13:50:02', '2021-06-29 13:50:02'),
(45, 'IRS Form 944', 2, 5, '2021-07-01 02:33:35', '2021-07-01 02:33:35'),
(46, 'Passport', 2, 5, '2021-07-07 19:39:38', '2021-07-07 19:39:38'),
(47, 'Social Security Card ', 2, 5, '2021-07-07 20:11:00', '2021-07-07 20:11:00'),
(48, 'Customer Invoice	', 2, 5, '2021-07-07 20:54:28', '2021-07-07 20:54:28'),
(49, 'Fee Disclosure and Compensation Agreement', 2, 5, '2021-08-14 18:36:43', '2021-08-14 18:36:43'),
(50, 'Tax Transcript', 2, 5, '2021-08-14 18:38:27', '2021-08-14 18:38:27'),
(51, 'IRS Form 940', 2, 5, '2021-08-14 18:43:08', '2021-08-14 18:43:08'),
(52, 'ID (Photo Held)', 2, 5, '2021-08-14 18:45:09', '2021-08-14 18:45:09'),
(53, 'IRS Form 1065', 2, 5, '2021-08-14 18:49:34', '2021-08-14 18:49:34'),
(54, 'Profit & Loss ', 2, 5, '2021-08-14 18:50:09', '2021-08-14 18:50:09'),
(55, 'test', 4, 3, '2021-08-23 10:57:06', '2021-08-23 10:57:06'),
(59, 'pdf', 5, 3, '2021-09-04 10:31:56', '2021-09-04 10:31:56'),
(60, 'dwa', 5, 1, '2021-09-11 15:24:07', '2021-09-11 15:24:07'),
(61, 'wiz3', 6, 1, '2021-09-18 13:09:07', '2021-09-18 13:09:07'),
(62, 'wiz2', 7, 1, '2021-09-18 13:09:07', '2021-09-18 13:09:07'),
(63, 'wiz', 4, 1, '2021-09-18 13:09:32', '2021-09-18 13:09:32'),
(64, 'wiz9', 2, 1, '2021-09-18 13:09:55', '2021-09-18 13:09:55'),
(67, 'letter', 0, 6, '2021-10-12 13:53:47', '2021-10-12 13:53:47'),
(70, 'b typedswda', 0, 7, '2021-10-26 17:15:51', '2021-10-26 17:15:51'),
(71, 'c type', 0, 7, '2021-10-31 11:01:11', '2021-10-31 11:01:11'),
(73, 'dasdasd', 0, 6, '2021-10-31 12:26:38', '2021-10-31 12:26:38'),
(74, 'dwadawd', 0, 6, '2021-10-31 12:35:17', '2021-10-31 12:35:17'),
(77, 'dawdaw', 0, 6, '2021-10-31 12:40:50', '2021-10-31 12:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `individual`
--

CREATE TABLE `individual` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `group_id` int(11) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `loan_number` varchar(255) NOT NULL,
  `ssn` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `credit_score` varchar(255) NOT NULL,
  `lattitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `signature` varchar(5000) NOT NULL,
  `manage_by` varchar(255) NOT NULL DEFAULT '0',
  `manage_role` varchar(255) NOT NULL DEFAULT '0',
  `role` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `token` varchar(255) NOT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individual`
--

INSERT INTO `individual` (`id`, `name`, `email`, `password`, `phone`, `dob`, `group_id`, `id_number`, `loan_number`, `ssn`, `street`, `city`, `state`, `zip`, `country`, `credit_score`, `lattitude`, `longitude`, `signature`, `manage_by`, `manage_role`, `role`, `added_by`, `status`, `token`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 'ind 1', 'ind1@gmail.com', '123', '12345678', '', 2, '111', '11', '10', 'asasaaaaaaaaaa', 'city', 'pun', '52250', 'Pakistan', '98', '51.43603203257098', '19.193114843750028', 'data:image/png;base64,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', '1', '2', '0', '0', 1, '225392', 1, '2021-09-22 16:41:55', '2021-11-02 04:57:20'),
(2, 'ind 2', 'ind2@gmail.com', '100', '12345678', '', 15, '100', '8998', '12', 'asasaaaaaaaaaa', 'city', 'pun', '52250', 'Pakistan', '63', '51.92648367346616', '-9.503174218749992', 'data:image/png;base64,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', '1', '1', '0', '0', 1, '121212', 1, '2021-09-22 16:42:26', '2021-11-02 04:49:14'),
(3, 'ind 3', 'ind3@gmail.com', '100', '12345678', '1996-06-19', 2, '33', '111', '8526', 'asasaaaaaaaaaa', 'city', 'pun', '52250', 'Pakistan', '12322132', '53.418535135909295', '19.852294531250028', 'data:image/png;base64,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', '1', '1', '0', '0', 1, '875380', 1, '2021-09-22 16:42:57', '2021-11-05 11:47:50'),
(4, 'ind 4', 'ind4@gmail.com', '', '12345678', '', 15, '100', '333', '111', 'asasaaaaaaaaaa', 'city', 'pun', '52250', 'Pakistan', '99', '46.357353767411595', '0.25268515625002763', 'data:image/png;base64,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', '4', '1', '0', '0', 1, '', 0, '2021-09-22 16:43:23', '2021-10-18 07:33:09'),
(5, 'comp 7', 'comp6@gmail.com', 'tv2rpmho', '', '', 0, '', '', '111', '', '', '', '', '', '', '', '', 'data:image/png;base64,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', '4', '1', '', '', 1, '', 0, '2021-09-30 11:20:46', '2021-10-18 07:33:09'),
(12, 'umer', 'umer@gmail.com', '100', '', '', 0, '', '', '111', '', '', '', '', '', '', '', '', '', '4', '1', '', '', 1, '', 0, '2021-10-17 12:18:31', '2021-10-18 08:09:59'),
(13, 'saad', 'saad@gmail.com', '1000', '', '', 0, '', '', '111', '', '', '', '', '', '', '', '', 'data:image/png;base64,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', '4', '1', '', '', 1, '', 0, '2021-10-18 07:31:20', '2021-10-18 07:33:09'),
(14, 'ali', 'ali@gmail.com', '100', '', '', 0, '', '', '4', '', '', '', '', '', '', '', '', 'data:image/png;base64,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', '4', '1', '', '', 1, '', 0, '2021-10-18 08:02:07', '2021-10-18 08:02:30'),
(16, 'hamad', 'hamad@gmail.com', '1000', '', '', 0, '', '', '10', '', '', '', '', '', '', '', '', 'data:image/png;base64,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', '1', '1', '', '', 1, '', 1, '2021-10-18 08:40:56', '2021-10-31 12:37:47'),
(24, 'ind6', 'ind6@gmail.com', '100', '', '', 0, '', '', '78', '', '', '', '', '', '', '', '', 'data:image/png;base64,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', '3', '1', '', '', 1, '', 1, '2021-10-20 13:01:00', '2021-10-20 13:08:23'),
(25, 'asa', 'ind7@gmail.com', '100', '', '', 0, '', '', 'sasas', '', '', '', '', '', '', '', '', 'data:image/png;base64,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', '0', '0', '', '', 1, '', 1, '2021-10-20 13:40:58', '2021-10-23 18:18:30');
INSERT INTO `individual` (`id`, `name`, `email`, `password`, `phone`, `dob`, `group_id`, `id_number`, `loan_number`, `ssn`, `street`, `city`, `state`, `zip`, `country`, `credit_score`, `lattitude`, `longitude`, `signature`, `manage_by`, `manage_role`, `role`, `added_by`, `status`, `token`, `is_verified`, `created_at`, `updated_at`) VALUES
(26, 'ind 10', 'ind10@gmail.com', '100', '', '', 0, '', '', '4545', '', '', '', '', '', '', '', '', 'data:image/png;base64,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', '1', '1', '', '', 1, '485024', 1, '2021-10-21 11:24:29', '2021-10-21 11:24:59'),
(27, 'ahmad', 'ahmad17@gmail.com', '111', '', '1999-08-18', 0, '', '', '1111', '', '', '', '', '', '', '', '', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACgCAYAAAC2eFFiAAAAAXNSR0IArs4c6QAAEKdJREFUeF7tnc1uHLsRRvVjS0EWQfY2riW/SF49TyIJBvwAWeV67Jm5oOMGOjR/qshiD2v6aGMDwyaLp4pfF9ls9u0NfxCAAAScELh1YidmQgACELhBsAgCCEDADQEEy42rMBQCEECwiAEIQMANAQTLjaswFAIQQLCIAQhAwA0BBMuNqzAUAhBAsIgBCEDADQEEy42rMBQCEECwiAEIQMANAQTLjaswFAIQQLCIAQhAwA0BBMuNqzAUAhBAsIgBCEDADQEEy42rMBQCEECwiAEIQMANAQTLjaswFAIQQLCIAQhAwA0BBMuNqzAUAhBAsIgBCEDADQEEy42rMBQCEECwiAEIQMANAQTLjaswFAIQQLCIAQhAwA0BBMuNqzAUAhBAsIgBCEDADQEEy42rMBQCEECwiAEIQMANAQTLjaswFAIQQLCIAQhAwA0BBMuNqzAUAhBAsIgBCEDADQEEy42rMBQCEECwiAEIQMANAQTLjaswFAIQQLCIAQhAwA0BBMuNqzAUAhBAsIgBCEDADQEEy42rMBQCEECwiAEIQMCMwNPT03Fd2dvb271Z5Tc3NwiWJU3qgsDOCXz+/Pm8RvDy8mKqMaaV7dxXdB8CuyeAYO0+BAAAAT8EECw/vsJSCOyeAIK1+xAAAAR8EHh+fj7d3t7+3zITa1g+fIeVENgdAQRrEpd/+PDhz/fv378P5lg/pp2ki5gBgW4CCFY3wvYK/vjjjx/v3r37bQ+JdYrbbiFXQmAuAs/Pz+doRnhjPV7Y1hD5PGRTj4+Pj7lQOJ1OJzKtuQYK1sxBAMHa2A+plDZngsWdY/Su4I3x0dzOCcRPCAMOi3GyxrrrDCsIRniqET/ZkMSdhSNGPwKW9IMyELAigGBZkVzVk1ubyjV1Pp/Pr6+vdyPEZUSdA5BRJQREBBAsESZ5oTDlC6UlGdUiVEvtI8RlRJ1yGpSEgC0BBMuQZwpmqvogVMfj8fTly5d3699HiMuIOg2RURUEVAQQLBWufOGaWOVEqiRYcQbWYiqC1UKNa2YlgGB1eqb01E8rOLEztNenuoJgdTqYy6cigGB1uKMkVmEvlXbHOoLV4Qwu3QUBBKvRzaUpYItYBTPiTXHn8/nm9fW1a1sIGVajg7lsSgIIVoNbcplVr8AgWA3O+HVJvEE2VZM24223hitHEUCwlGRzYtWaVa2bH/Fi514yrNpDj8A5rAmG7SYWa4PKsKG4EQEESwEy9w6ghVj9mhKan/Vz7YKl3aS7uNviLQJF6FDUiACCpQCZyoCsxCqYkRp8vQPrWgWr9gK5xK0/fvw4xnvhJNdR5nIEECwF+8RTvO5F8bh5a4Gxrk+Ba1jRsF51d3d3Z9FA7w3BwgbqkBNAsISsMtnV89vb25uwClGx2CG9WcC1CVbttIvS+lTq2l6+IqdSyIwAgiVEucU5PMEU671YXgUrdSxOaRooXUjfIuCFIUWxBgJb+K9rH1FDn4ZcYi0kOSOt2/EqWDm7U9NBzbQul6Fp6hgSYFQqIoBgCTClFsNHTSWs92Jdm2AFdy2iI82qYhensuVQBtESDIYLF0GwBA7YYrF9McN6L9Y1ClZgFW4irU/4cov22psQp7kKBo9xEQSrAjSVXbXe2SW+Q7D+R2m00MaiFXwa/mq74dciFT+pJEOTRHhfGQSrwm8LQLEJloPVsq6+UNNdvYXdmvWwcCM5HA4HPh6i86N16S3Go9tF962zq8W5loPVsi7r4CvVt5XdknZSg6RkO5nWuEhBsApst4CTal4yiKQhYVmXtE2LclvZXWtHK1Ys3lt4P1/HFmPSbYZlvcVA6sraIJLWM2otKEylams9GhtHi3ZrJld7T3HJpCz91cvt2q9HsDIetl781gSS5QCwqmvZtBnenQyLzaOnPVZ217jn2smJVerdUa2tkqNwanaH30+n07n1Samk/hnLIFgZr2wBJhcQ2gHQmkFIAzIl3stRLd++ffv29evXv0nrkpazZNDCJ+X/3IvuUlsDx9Tn3KRMauUk3w2o1TH771uMS5dTwktNB62ncdLBFAdqbTq0lB+1xSO2e0th1D5skTCuvQM5QiiuUcAQLGGGpd1U2BOAkgEgrV9bV8vAGjE93OqGkWon9U3JUh9rjC1Pl5D6ffQNRWuHVXkEK0HykutXl8qwWoRqQTci+9kiMFOsUwOrlkWWBMvi3K6ewT7iZtJjT++1W9zI3E0JtxosM6xhSYVqPb3YImhSWckWwriszQXfhP+Hf8O6U8s6WLgmt/5Xq1M6sIMgPjw8POQ+Nn7tgjVi5uNesGp3WGlwScvVphjSemrZmkSsUn3fStC3EMZUX1bTKdEBjdonjaNFJIj9Mq21EkZNzI0sazk2cna6F6y1ils9ki45NX5HLTydqgVBbl9UzsGlgRraKt25NK+01OzWZC6hrPVgL3GQtqVhPCJL7GHs7VoEK/JYbf2qNtAvFQC5wZVycOkJoDTFjuu1PNt+YZh6Qdk6YxglWNonjZeKG2/tIliRx2rTnWsQrNDlWAy0grPFdK02pbUYbDl/ajKh1CCqxZGF7V7qKM1KtG9MIFgVwYrXcK5FsNaipRWrlJD0fkQ2N/hGB2jOnxomEsHaeh10JjErjZlwYwgPDSRH+2xxAwttuFrDiuHGU6RrEqyeoK5NnXvqXl97KcGSrl9lxPvnB1vX/dDUZ8XukvUsU+L1U9eaPZIP3Y6OB1eCNeK7gDUnpX63dIplXWtbPQvW+uXt3A1IIzCJ6fFNpFfmDwta4mp9TdgOMeKVqqUNqxv7OtPdKubcZFizrDtYioxlXXHAx4fZadZ9pAPO0v71IXy5kxYWu3oEK+7bjNPBNVfpgxapz6SvdYX6lpfppXXH5TR+krbhRrBiBb9UoFkOUsu6YodvsfBuZX9cz7JVJPVBVq3w1rIJa0GQDrxUuWUBfN1v6zjX3vhr/Er93bVgWQ2OnoCyXlgc2SdtYLZwsbBfOyA0C+4pf22RBbSwzNm6rB1ZDP6e7Rzh2vv7+/t4Oo1gZQhYDI7WQFpfZ2mHZV1x37Z4fabH/pb3+LRidQ2CtfjVItOyuolJ3sIIdluIbBzXbqaEPYPDQqhyC5Y9Thndp9HTwlb7pQFvkQ2VMrgWAbSMpXVdNSYWW1NGLKtYbHTWMEWwNLSMP3HVOuClJlvdUXPtae3XZlU9N4PcDWbdF4v6pb4olZNy6c2ytP6S9K0ktCNuCC4Ea5YtDZ7WsIKto98r1AyA2rlTQTw09UkGU21KOItglU6NjfvZI1oj+Oa+1L3Ybc3YhWCNzhSkwe9NsFL29gR8zEk6AEp34bU9uaeFoV3tayK1DGvE3V8TR+uyifcyf55EsRxPoz200CojlvSnNOW2Fqtgz/SC9fT09OPu7u5+Dc9y0Emcsi4jHaSSei3rkgapxVpITgzWAVoabMv1mjcVWoM/N6Ba65P4VVumFAelDEbbhxHxhmBF3p4pu/KYYY3cgZwaALXF49JUYUTwexes3NS+ZcqFYGlvJcryz8/P/769vf3XLNmVR8Eatf5XW5PKuTqXHdd2YGuzidqUsLU+ZQhXi0v9U+It7Yu1YI3yWQna1FPC0YvG1WhKFLB0umVdpb6MaKeUDaVsqX0lplafdFDGbc+eYWm2nvSKlnUcjPKZW8EaOZ1pESuPGZalzYs/tG/5Hw6HQ+ll3lrghz5co2C17DzvES1LwZJsxWj1mVvBmm39ynLwW9c1KsNqFalgT+kE0tKifHgwYHWiwswZVmt8l0Sr9K6lpWBJ1ip3L1iXfDqYWxPpcYplAI0SrFr2s3y9piZQi32SQLfccjCjYOUYaOK7JFq9X8GWzD5qcdGTFV9NhqVxqAR6SxlLkbGsy1qwSin/chKl9Ax3yRaHJauyFKtUFrvmpD35oSVe4msKYiX6CtC6vpJoSb6o1HqzTU1lU0fRtNbvUrA+ffr05/39/WNk/NvLy8uzReC01mEpMpZ1tfYnd10pE5IGYu0p0rrtUTejWiYwql2pUC3leoRauh3EKt5yU1mr+l0K1owL7luuO1kLkLa+1vWV0I5k2rfYEwSjtiivtX1dviZYsWiup7itu+vXddZYWG3klYiWhaCUPj5rUX/N19Nua9A87q110vL3LZxiaW9LXbmUvzaAZ8ioav3VClh4LaYlC5M8RevJqlL9zIljaCf0I37FR9uvXJ9yJ8SOmHJPKVipufksJ0PuQbBSr4OUpoGSNaowwEI2cTwej1++fHlXE5aRv9eynlzbYYCvM7BcuZQ4RJmcer1KyqNlQ6+0X6kTYNeiu0WSMaVg9UxHpI5tLbcHwdIEnmTwa+/krb7RXPfrBM271IvFmnq0Zbe48S6ildovp9lDV+tbPJ1NjdvSl9FrGXuqfReCNVPAX7tgpQQoldpLpn8z+a00+BbxCmVGCdgWQhX3cRGu9RO81B63mjDlfo+zbm12J314s25/OsGadbG91anerqtlt5LpnxehqvlGIsqF6ePPza+zsFj8GkSis18/v+uYm0ampo05Rkv2pcm0phOs2oCpBRm/9xEoHaNbm/6Fu/fhcPg28pt6696FgXd3dzc8hpesS5N9LQvdkjWvVo/l7NHY2dq25XWaTGu4s7UdiweF9ZMUrT17Kx/fMHJPmGIu0oXbFp4tgtHSDtdchoBrwbr2NaLLhIS8Vc1jf3mtlITA7wQ0QrVcPV2GhWBdNrQRrMvy31PrCNaevG3Y155FWEMzqEpJIKwZZv6yP0jf/1SasllxMqzNUM/VkORp3ywWrwbmz4EY1ss0T5Zm6Qd29BNAsPoZuqqh9qQv7swsj+VdQcbYYQQQrGFo56lYK1JLFuN9+jCPB7DEigCCZUVysnq0u44XkRp5csJkiDDHIQEEy6HTcia3itTxeDxd+oXkK3IDXRlIAMEaCHeLqltEKtjFht', '1', '2', '', '', 1, '908532', 1, '2021-10-23 18:21:33', '2021-10-31 12:38:19'),
(28, 'ind1 comp', 'compind1@gmail.com', '5l9e8t8t', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '', '', 1, '', 0, '2021-10-30 07:36:23', '2021-10-30 07:36:23'),
(29, 'abc', 'abc@gmail.com', '123', '', '2021-11-04', 0, '', '', '5289', '', '', '', '', '', '', '', '', 'data:image/png;base64,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', '0', '0', '', '', 1, '236740', 1, '2021-11-03 12:29:49', '2021-11-03 12:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `letter_1`
--

CREATE TABLE `letter_1` (
  `id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `req_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `residence` varchar(500) NOT NULL,
  `former_name` varchar(200) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `note` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `letter_2`
--

CREATE TABLE `letter_2` (
  `id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `req_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `note` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `letter_3`
--

CREATE TABLE `letter_3` (
  `id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `req_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `note` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `letter_3`
--

INSERT INTO `letter_3` (`id`, `datee`, `req_id`, `b_id`, `note`) VALUES
(3, '2021-11-06', 38, 2, '&lt;p&gt;note&lt;/p&gt;'),
(4, '2021-11-11', 38, 1, '&lt;p&gt;i &amp;nbsp;am noteedited&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `letter_4`
--

CREATE TABLE `letter_4` (
  `id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `req_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `note` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `letter_5`
--

CREATE TABLE `letter_5` (
  `id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `req_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `fdate` date NOT NULL,
  `note` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `letter_6`
--

CREATE TABLE `letter_6` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `note` varchar(5000) NOT NULL,
  `datee` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `letter_6`
--

INSERT INTO `letter_6` (`id`, `b_id`, `req_id`, `note`, `datee`) VALUES
(1, 1, 48, '&lt;p&gt;i am additional&lt;/p&gt;', '2021-11-07'),
(2, 1, 48, '&lt;p&gt;i am additional note&lt;/p&gt;', '2021-11-07'),
(3, 1, 48, '&lt;p&gt;i am additional note&lt;/p&gt;', '2021-11-07'),
(4, 1, 48, '&lt;p&gt;i am additional note&lt;/p&gt;', '2021-11-07'),
(5, 1, 48, '&lt;p&gt;;lk;lk;k;l&lt;/p&gt;', '2021-11-16'),
(6, 1, 50, '&lt;p&gt;adads&lt;/p&gt;', '2021-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `letter_7`
--

CREATE TABLE `letter_7` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `req_id` int(11) NOT NULL,
  `additional` varchar(5000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `letter_8`
--

CREATE TABLE `letter_8` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `letter_8`
--

INSERT INTO `letter_8` (`id`, `b_id`, `req_id`, `datee`, `note`) VALUES
(1, 2, 41, '2021-11-10', '&lt;p&gt;i am a additional no&lt;/p&gt;'),
(2, 1, 41, '2021-11-12', '&lt;p&gt;15611321&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `letter_9`
--

CREATE TABLE `letter_9` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `note` varchar(5000) NOT NULL,
  `consumer_statement` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `letter_10`
--

CREATE TABLE `letter_10` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `note` varchar(5000) NOT NULL,
  `consumer_statement` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `letter_11`
--

CREATE TABLE `letter_11` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `note` varchar(5000) NOT NULL,
  `consumer_statement` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `letter_11`
--

INSERT INTO `letter_11` (`id`, `b_id`, `req_id`, `datee`, `note`, `consumer_statement`) VALUES
(1, 1, 47, '2021-11-05', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt; is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&apos;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. edited&lt;/p&gt;', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt; is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&apos;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of I m edited&amp;nbsp;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `letter_12`
--

CREATE TABLE `letter_12` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `letter_13`
--

CREATE TABLE `letter_13` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `letter_13`
--

INSERT INTO `letter_13` (`id`, `b_id`, `req_id`, `datee`, `note`) VALUES
(1, 1, 43, '2021-11-06', '&lt;p&gt;i am additional note edited&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `letter_14`
--

CREATE TABLE `letter_14` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `datee` date NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `letter_14`
--

INSERT INTO `letter_14` (`id`, `b_id`, `req_id`, `datee`, `note`) VALUES
(1, 1, 44, '2021-11-06', '&lt;p&gt;I am additional note edited&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `letter_four_items`
--

CREATE TABLE `letter_four_items` (
  `id` int(11) NOT NULL,
  `letter_id` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `reason_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `letter_seven_creditors`
--

CREATE TABLE `letter_seven_creditors` (
  `id` int(11) NOT NULL,
  `letter_id` int(11) NOT NULL,
  `creditors_id` int(11) NOT NULL,
  `datee` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `letter_six_creditors`
--

CREATE TABLE `letter_six_creditors` (
  `id` int(11) NOT NULL,
  `letter_id` int(11) NOT NULL,
  `creditor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `letter_six_creditors`
--

INSERT INTO `letter_six_creditors` (`id`, `letter_id`, `creditor_id`) VALUES
(3, 1, 1),
(4, 1, 1),
(5, 5, 1),
(6, 5, 2),
(7, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `letter_three_items`
--

CREATE TABLE `letter_three_items` (
  `id` int(11) NOT NULL,
  `letter_id` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `reason_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `letter_three_items`
--

INSERT INTO `letter_three_items` (`id`, `letter_id`, `item`, `reason_id`) VALUES
(8, 3, '405', 3),
(9, 3, '408', 2),
(10, 3, '52', 3),
(12, 4, '103', 2);

-- --------------------------------------------------------

--
-- Table structure for table `naics`
--

CREATE TABLE `naics` (
  `id` int(11) NOT NULL,
  `naics_code` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `sic_code` text COLLATE utf8_unicode_ci NOT NULL,
  `ins` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `naics`
--

INSERT INTO `naics` (`id`, `naics_code`, `description`, `sic_code`, `ins`) VALUES
(2, '111110', 'Soybean Farming', '116', 'Soybeans'),
(3, '111120', 'Oilseed (except Soybean) Farming', '119', 'Cash Grains, Nec'),
(4, '111130', 'Dry Pea and Bean Farming', '119', 'Cash Grains, Nec'),
(5, '111140', 'Wheat Farming', '111', 'wheat'),
(6, '111150', 'Corn Farming', '115', 'Corn'),
(7, '111150', 'Corn Farming', '119', 'Cash Grains, Nec'),
(8, '111160', 'Rice Farming', '112', 'Rice'),
(9, '111191', 'Oilseed and Grain Combination Farming', '119', 'Cash Grains, Nec'),
(10, '111199', 'All Other Grain Farming', '119', 'Cash Grains, Nec'),
(11, '111199', 'All Other Grain Farming', '139', 'Field Crops, Except Cash Grain'),
(12, '111211', 'Potato Farming', '134', 'Irish Potatoes'),
(13, '111211', 'Potato Farming', '139', 'Field Crops, Except Cash Grain'),
(14, '111211', 'Potato Farming', '161', 'Vegetables and Melons'),
(15, '111219', 'Other Vegetable (except Potato) and Melon\nFarming', '139', 'Field Crops, Except Cash Grain'),
(16, '111219', 'Other Vegetable (except Potato) and Melon\nFarming', '161', 'Vegetables and Melons'),
(17, '111310', 'Orange Groves', '174', 'Citrus Fruits'),
(18, '111320', 'Citrus (except Orange) Groves', '174', 'Citrus Fruits'),
(19, '111331', 'Apple Orchards', '175', 'Deciduous Tree Fruits'),
(20, '111332', 'Grape Vineyards', '172', 'Grapes'),
(21, '111333', 'Strawberry Farming', '171', 'Berry Crops'),
(22, '111334', 'Berry (except Strawberry) Farming', '171', 'Berry Crops'),
(23, '111335', 'Tree Nut Farming', '173', 'Tree Nuts'),
(24, '111336', 'Fruit and Tree Nut Combination Farming', '179', 'Fruits and Tree Nuts, Nec'),
(25, '111339', 'Other Noncitrus Fruit Farming', '175', 'Deciduous Tree Fruits'),
(26, '111339', 'Other Noncitrus Fruit Farming', '179', 'Fruits and Tree Nuts, Nec'),
(27, '111411', 'Mushroom Production', '182', 'Food Crops Grown Under Cover'),
(28, '111419', 'Other Food Crops Grown Under Cover', '182', 'Food Crops Grown Under Cover'),
(29, '111421', 'Nursery and Tree Production', '181', 'Ornamental Nursery Products'),
(30, '111421', 'Nursery and Tree Production', '811', 'Timber Tracts'),
(31, '111422', 'Floriculture Production', '181', 'Ornamental Nursery Products'),
(32, '111910', 'Tobacco Farming', '132', 'Tobacco'),
(33, '111920', 'Cotton Farming', '131', 'Cotton'),
(34, '111930', 'Sugarcane Farming', '133', 'Sugarcane and Sugar Beets'),
(35, '111940', 'Hay Farming', '139', 'Field Crops, Except Cash Grain'),
(36, '111991', 'Sugar Beet Farming', '133', 'Sugarcane and Sugar Beets'),
(37, '111992', 'Peanut Farming', '139', 'Field Crops, Except Cash Grain'),
(38, '111998', 'All Other Miscellaneous Crop Farming', '139', 'Field Crops, Except Cash Grain'),
(39, '111998', 'All Other Miscellaneous Crop Farming', '191', 'General Farms, Primarily Crop'),
(40, '111998', 'All Other Miscellaneous Crop Farming', '831', 'Forest Products'),
(41, '111998', 'All Other Miscellaneous Crop Farming', '919', 'Miscellaneous Marine Products'),
(42, '111998', 'All Other Miscellaneous Crop Farming', '2099', 'Food Preparations, Nec'),
(43, '112111', 'Beef Cattle Ranching and Farming', '212', 'Beef Cattle, Except Feedlots'),
(44, '112111', 'Beef Cattle Ranching and Farming', '241', 'Dairy Farms'),
(45, '112112', 'Cattle Feedlots', '211', 'Beef Cattle Feedlots'),
(46, '112120', 'Dairy Cattle and Milk Production', '241', 'Dairy Farms'),
(47, '112130', 'Dual-Purpose Cattle Ranching and Farming', 'Aux', ''),
(48, '112210', 'Hog and Pig Farming', '213', 'Hogs'),
(49, '112310', 'Chicken Egg Production', '252', 'Chicken Eggs'),
(50, '112320', 'Broilers and Other Meat Type Chicken\nProduction', '251', 'Broiler, Fryer, and Roaster Chickens'),
(51, '112330', 'Turkey Production', '253', 'Turkeys and Turkey Eggs'),
(52, '112340', 'Poultry Hatcheries', '254', 'Poultry Hatcheries'),
(53, '112390', 'Other Poultry Production', '259', 'Poultry and Eggs, Nec'),
(54, '112410', 'Sheep Farming', '214', 'Sheep and Goats'),
(55, '112420', 'Goat Farming', '214', 'Sheep and Goats'),
(56, '112511', 'Finfish Farming and Fish Hatcheries', '273', 'Animal Aquaculture'),
(57, '112511', 'Finfish Farming and Fish Hatcheries', '921', 'Fish Hatcheries and Preserves'),
(58, '112512', 'Shellfish Farming', '273', 'Animal Aquaculture'),
(59, '112512', 'Shellfish Farming', '919', 'Miscellaneous Marine Products'),
(60, '112512', 'Shellfish Farming', '921', 'Fish Hatcheries and Preserves'),
(61, '112519', 'Other Aquaculture', '139', 'Field Crops, Except Cash Grain'),
(62, '112519', 'Other Aquaculture', '191', 'General Farms, Primarily Crop'),
(63, '112519', 'Other Aquaculture', '273', 'Animal Aquaculture'),
(64, '112519', 'Other Aquaculture', '279', 'Animal Specialties, Nec'),
(65, '112519', 'Other Aquaculture', '831', 'Forest Products'),
(66, '112519', 'Other Aquaculture', '919', 'Miscellaneous Marine Products'),
(67, '112519', 'Other Aquaculture', '2099', 'Food Preparations, Nec'),
(68, '112910', 'Apiculture', '279', 'Animal Specialties, Nec'),
(69, '112920', 'Horses and Other Equine Production', '272', 'Horses and Other Equines'),
(70, '112930', 'Fur-Bearing Animal and Rabbit Production', '271', 'Fur-bearing Animals and Rabbits'),
(71, '112990', 'All Other Animal Production', '219', 'General Livestock, Nec'),
(72, '112990', 'All Other Animal Production', '279', 'Animal Specialties, Nec'),
(73, '112990', 'All Other Animal Production', '291', 'General Farms, Primarily animals'),
(74, '113110', 'Timber Tract Operations', '811', 'Timber Tracts'),
(75, '113210', 'Forest Nurseries and Gathering of Forest\nProducts', '831', 'Forest Products'),
(76, '113310', 'Logging', '2411', 'Logging'),
(77, '114111', 'Finfish Fishing', '912', 'Finfish'),
(78, '114112', 'Shellfish Fishing', '913', 'Shellfish'),
(79, '114112', 'Shellfish Fishing', '919', 'Miscellaneous Marine Products'),
(80, '114119', 'Other Marine Fishing', '919', 'Miscellaneous Marine Products'),
(81, '114210', 'Hunting and Trapping', '971', 'Hunting, Trapping, Game Propagation'),
(82, '115111', 'Cotton Ginning', '724', 'Cotton Ginning'),
(83, '115112', 'Soil Preparation, Planting, and Cultivating', '711', 'Soil Preparation Services'),
(84, '115112', 'Soil Preparation, Planting, and Cultivating', '721', 'Crop Planting and Protection'),
(85, '115113', 'Crop Harvesting, Primarily by Machine', '722', 'Crop Harvesting'),
(86, '115114', 'Postharvest Crop Activities (except Cotton\nGinning)', '723', 'Crop Preparation Services For Market'),
(87, '115115', 'Farm Labor Contractors and Crew Leaders', '761', 'Farm Labor Contractors'),
(88, '115116', 'Farm Management Services', '762', 'Farm Management Services'),
(89, '115210', 'Support Activities for Animal Production', '751', 'Livestock Services, Except Veterinary'),
(90, '115210', 'Support Activities for Animal Production', '752', 'Animal Specialty Services'),
(91, '115210', 'Support Activities for Animal Production', '7699', 'Repair Services, Nec'),
(92, '115310', 'Support Activities for Forestry', '851', 'Forestry Services'),
(93, '211120', 'Crude Petroleum Extraction', '1311', 'Crude Petroleum and Natural Gas'),
(94, '211130', 'Natural Gas Extraction', '1321', 'Natural Gas Liquids'),
(95, '211130', 'Natural Gas Extraction', '2819', 'Industrial Inorganic Chemicals, Nec'),
(96, '212111', 'Bituminous Coal and Lignite Surface Mining', '1221', 'Bituminous Coal and Lignite-surface\nMining'),
(97, '212112', 'Bituminous Coal Underground Mining', '1222', 'Bituminous Coal-underground Mining'),
(98, '212113', 'Anthracite Mining', '1231', 'Anthracite Mining'),
(99, '212210', 'Iron Ore Mining', '1011', 'Iron Ores'),
(100, '212221', 'Gold Ore Mining', '1041', 'Gold Ores'),
(101, '212222', 'Silver Ore Mining', '1044', 'Silver Ores'),
(102, '212230', 'Copper, Nickel, Lead, and Zinc Mining', '1021', 'Copper Ores'),
(103, '212230', 'Copper, Nickel, Lead, and Zinc Mining', '1031', 'Lead and Zinc Ores'),
(104, '212230', 'Copper, Nickel, Lead, and Zinc Mining', '1061', 'Ferroalloy Ores, Except Vanadium'),
(105, '212291', 'Uranium-Radium-Vanadium Ore Mining', '1094', 'Uranium-radium-vanadium Ores'),
(106, '212299', 'All Other Metal Ore Mining', '1061', 'Ferroalloy Ores, Except Vanadium'),
(107, '212299', 'All Other Metal Ore Mining', '1099', 'Metal Ores, Nec'),
(108, '212311', 'Dimension Stone Mining and Quarrying', '1411', 'Dimension Stone'),
(109, '212312', 'Crushed and Broken Limestone Mining and\nQuarrying', '1422', 'Crushed and Broken Limestone'),
(110, '212313', 'Crushed and Broken Granite Mining and\nQuarrying', '1423', 'Crushed and Broken Granite'),
(111, '212319', 'Other Crushed and Broken Stone Mining\nand Quarrying', '1429', 'Crushed and Broken Stone, Nec'),
(112, '212319', 'Other Crushed and Broken Stone Mining\nand Quarrying', '1499', 'Miscellaneous Nonmetallic Mining'),
(113, '212321', 'Construction Sand and Gravel Mining', '1442', 'Construction Sand and Gravel'),
(114, '212322', 'Industrial Sand Mining', '1446', 'Industrial Sand'),
(115, '212324', 'Kaolin and Ball Clay Mining', '1455', 'Kaolin and Ball Clay'),
(116, '212324', 'Kaolin and Ball Clay Mining', '3295', 'Minerals, Ground or Treated'),
(117, '212325', 'Clay and Ceramic and Refractory Minerals\nMining', '1459', 'Clay and Related Minerals, Nec'),
(118, '212325', 'Clay and Ceramic and Refractory Minerals\nMining', '3295', 'Minerals, Ground or Treated'),
(119, '212391', 'Potash, Soda, and Borate Mineral Mining', '1474', 'Potash, Soda, and Borate Minerals'),
(120, '212392', 'Phosphate Rock Mining', '1475', 'Phosphate Rock'),
(121, '212393', 'Other Chemical and Fertilizer Mineral\nMining', '1479', 'Chemical and Fertilizer Mining'),
(122, '212393', 'Other Chemical and Fertilizer Mineral\nMining', '3295', 'Minerals, Ground or Treated'),
(123, '212399', 'All Other Nonmetallic Mineral Mining', '1499', 'Miscellaneous Nonmetallic Mining'),
(124, '212399', 'All Other Nonmetallic Mineral Mining', '3295', 'Minerals, Ground or Treated'),
(125, '213111', 'Drilling Oil and Gas Wells', '1381', 'Drilling Oil and Gas Wells'),
(126, '213112', 'Support Activities for Oil and Gas\nOperations', '1382', 'Oil and Gas Exploration Services'),
(127, '213112', 'Support Activities for Oil and Gas\nOperations', '1389', 'Oil and Gas Field Services, Nec'),
(128, '213113', 'Support Activities for Coal Mining', '1241', 'Coal Mining Services'),
(129, '213114', 'Support Activities for Metal Mining', '1081', 'Metal Mining Services'),
(130, '213115', 'Support Activities for Nonmetallic Minerals\n(except Fuels) Mining', '1481', 'Nonmetallic Mineral Services'),
(131, '221111', 'Hydroelectric Power Generation', '4911', 'Electric Services'),
(132, '221111', 'Hydroelectric Power Generation', '4931', 'Electric and Other Services Combined'),
(133, '221111', 'Hydroelectric Power Generation', '4939', 'Combination Utilities, Nec'),
(134, '221112', 'Fossil Fuel Electric Power Generation', '4911', 'Electric Services'),
(135, '221112', 'Fossil Fuel Electric Power Generation', '4931', 'Electric and Other Services Combined'),
(136, '221112', 'Fossil Fuel Electric Power Generation', '4939', 'Combination Utilities, Nec'),
(137, '221113', 'Nuclear Electric Power Generation', '4911', 'Electric Services'),
(138, '221113', 'Nuclear Electric Power Generation', '4931', 'Electric and Other Services Combined'),
(139, '221113', 'Nuclear Electric Power Generation', '4939', 'Combination Utilities, Nec'),
(140, '221114', 'Solar Electric Power Generation', '4911', 'Electric Services'),
(141, '221114', 'Solar Electric Power Generation', '4931', 'Electric and Other Services Combined'),
(142, '221114', 'Solar Electric Power Generation', '4939', 'Combination Utilities, Nec'),
(143, '221115', 'Wind Electric Power Generation', '4911', 'Electric Services'),
(144, '221115', 'Wind Electric Power Generation', '4931', 'Electric and Other Services Combined'),
(145, '221115', 'Wind Electric Power Generation', '4939', 'Combination Utilities, Nec'),
(146, '221116', 'Geothermal Electric Power Generation', '4911', 'Electric Services'),
(147, '221116', 'Geothermal Electric Power Generation', '4931', 'Electric and Other Services Combined'),
(148, '221116', 'Geothermal Electric Power Generation', '4939', 'Combination Utilities, Nec'),
(149, '221117', 'Biomass Electric Power Generation', '4911', 'Electric Services'),
(150, '221117', 'Biomass Electric Power Generation', '4931', 'Electric and Other Services Combined'),
(151, '221117', 'Biomass Electric Power Generation', '4939', 'Combination Utilities, Nec'),
(152, '221118', 'Other Electric Power Generation', '4911', 'Electric Services'),
(153, '221118', 'Other Electric Power Generation', '4931', 'Electric and Other Services Combined'),
(154, '221118', 'Other Electric Power Generation', '4939', 'Combination Utilities, Nec'),
(155, '221121', 'Electric Bulk Power Transmission and\nControl', '4911', 'Electric Services'),
(156, '221121', 'Electric Bulk Power Transmission and\nControl', '4931', 'Electric and Other Services Combined'),
(157, '221121', 'Electric Bulk Power Transmission and\nControl', '4939', 'Combination Utilities, Nec'),
(158, '221122', 'Electric Power Distribution', '4911', 'Electric Services'),
(159, '221122', 'Electric Power Distribution', '4931', 'Electric and Other Services Combined'),
(160, '221122', 'Electric Power Distribution', '4939', 'Combination Utilities, Nec'),
(161, '221210', 'Natural Gas Distribution', '4923', 'Gas Transmission and Distribution'),
(162, '221210', 'Natural Gas Distribution', '4924', 'Natural Gas Distribution'),
(163, '221210', 'Natural Gas Distribution', '4925', 'Gas Production and/or Distribution'),
(164, '221210', 'Natural Gas Distribution', '4931', 'Electric and Other Services Combined'),
(165, '221210', 'Natural Gas Distribution', '4932', 'Gas and Other Services Combined'),
(166, '221210', 'Natural Gas Distribution', '4939', 'Combination Utilities, Nec'),
(167, '221310', 'Water Supply and Irrigation Systems', '4941', 'Water Supply'),
(168, '221310', 'Water Supply and Irrigation Systems', '4971', 'Irrigation Systems'),
(169, '221320', 'Sewage Treatment Facilities', '4952', 'Sewerage Systems'),
(170, '221330', 'Steam and Air-Conditioning Supply', '4961', 'Steam and Air-conditioning Supply'),
(171, '236115', 'New Single-Family Housing Construction\n(except For-Sale Builders)', '1521', 'Single-family Housing Construction'),
(172, '236115', 'New Single-Family Housing Construction\n(except For-Sale Builders)', '8741', 'Management Services'),
(173, '236116', 'New Multifamily Housing Construction\n(except For-Sale Builders)', '1522', 'Residential Construction, Nec'),
(174, '236116', 'New Multifamily Housing Construction\n(except For-Sale Builders)', '8741', 'Management Services'),
(175, '236117', 'New Housing For-Sale Builders', '1531', 'Operative Builders'),
(176, '236118', 'Residential Remodelers', '1521', 'Single-family Housing Construction'),
(177, '236118', 'Residential Remodelers', '1522', 'Residential Construction, Nec'),
(178, '236118', 'Residential Remodelers', '1531', 'Operative Builders'),
(179, '236118', 'Residential Remodelers', '8741', 'Management Services'),
(180, '236210', 'Industrial Building Construction', '1531', 'Operative Builders'),
(181, '236210', 'Industrial Building Construction', '1541', 'Industrial Buildings and Warehouses'),
(182, '236210', 'Industrial Building Construction', '1629', 'Heavy Construction, Nec'),
(183, '236210', 'Industrial Building Construction', '8741', 'Management Services'),
(184, '236220', 'Commercial and Institutional Building\nConstruction', '1522', 'Residential Construction, Nec'),
(185, '236220', 'Commercial and Institutional Building\nConstruction', '1531', 'Operative Builders'),
(186, '236220', 'Commercial and Institutional Building\nConstruction', '1541', 'Industrial Buildings and Warehouses'),
(187, '236220', 'Commercial and Institutional Building\nConstruction', '1542', 'Nonresidential Construction, Nec'),
(188, '236220', 'Commercial and Institutional Building\nConstruction', '1799', 'Special Trade Contractors, Nec'),
(189, '236220', 'Commercial and Institutional Building\nConstruction', '8741', 'Management Services'),
(190, '237110', 'Water and Sewer Line and Related\nStructures Construction', '1623', 'Water, Sewer, and Utility Lines'),
(191, '237110', 'Water and Sewer Line and Related\nStructures Construction', '1629', 'Heavy Construction, Nec'),
(192, '237110', 'Water and Sewer Line and Related\nStructures Construction', '1781', 'Water Well Drilling'),
(193, '237110', 'Water and Sewer Line and Related\nStructures Construction', '8741', 'Management Services'),
(194, '237120', 'Oil and Gas Pipeline and Related\nStructures Construction', '1389', 'Oil and Gas Field Services, Nec'),
(195, '237120', 'Oil and Gas Pipeline and Related\nStructures Construction', '1623', 'Water, Sewer, and Utility Lines'),
(196, '237120', 'Oil and Gas Pipeline and Related\nStructures Construction', '1629', 'Heavy Construction, Nec'),
(197, '237120', 'Oil and Gas Pipeline and Related\nStructures Construction', '8741', 'Management Services'),
(198, '237130', 'Power and Communication Line and\nRelated Structures Construction', '1623', 'Water, Sewer, and Utility Lines'),
(199, '237130', 'Power and Communication Line and\nRelated Structures Construction', '1629', 'Heavy Construction, Nec'),
(200, '237130', 'Power and Communication Line and\nRelated Structures Construction', '8741', 'Management Services'),
(201, '237210', 'Land Subdivision', '6552', 'Subdividers and Developers, Nec'),
(202, '237310', 'Highway, Street, and Bridge Construction', '1611', 'Highway and Street Construction'),
(203, '237310', 'Highway, Street, and Bridge Construction', '1622', 'Bridge, Tunnel, and Elevated Highway'),
(204, '237310', 'Highway, Street, and Bridge Construction', '1721', 'Painting and Paper Hanging'),
(205, '237310', 'Highway, Street, and Bridge Construction', '8741', 'Management Services'),
(206, '237990', 'Other Heavy and Civil Engineering\nConstruction', '1622', 'Bridge, Tunnel, and Elevated Highway'),
(207, '237990', 'Other Heavy and Civil Engineering\nConstruction', '1629', 'Heavy Construction, Nec'),
(208, '237990', 'Other Heavy and Civil Engineering\nConstruction', '1799', 'Special Trade Contractors, Nec'),
(209, '237990', 'Other Heavy and Civil Engineering\nConstruction', '8741', 'Management Services'),
(210, '238110', 'Poured Concrete Foundation and Structure\nContractors', '1771', 'Concrete Work'),
(211, '238120', 'Structural Steel and Precast Concrete\nContractors', '1791', 'Structural Steel Erection'),
(212, '238130', 'Framing Contractors', '1751', 'Carpentry Work'),
(213, '238140', 'Masonry Contractors', '1741', 'Masonry and Other Stonework'),
(214, '238140', 'Masonry Contractors', '1771', 'Concrete Work'),
(215, '238150', 'Glass and Glazing Contractors', '1793', 'Glass and Glazing Work'),
(216, '238150', 'Glass and Glazing Contractors', '1799', 'Special Trade Contractors, Nec'),
(217, '238160', 'Roofing Contractors', '1761', 'Roofing, Siding, and Sheetmetal Work'),
(218, '238170', 'Siding Contractors', '1761', 'Roofing, Siding, and Sheetmetal Work'),
(219, '238190', 'Other Foundation, Structure, and Building\nExterior Contractors', '1791', 'Structural Steel Erection'),
(220, '238190', 'Other Foundation, Structure, and Building\nExterior Contractors', '1799', 'Special Trade Contractors, Nec'),
(221, '238210', 'Electrical Contractors and Other Wiring\nInstallation Contractors', '1711', 'Plumbing, Heating, Air-conditioning'),
(222, '238210', 'Electrical Contractors and Other Wiring\nInstallation Contractors', '1731', 'Electrical Work'),
(223, '238220', 'Plumbing, Heating, and Air-Conditioning\nContractors', '1711', 'Plumbing, Heating, Air-conditioning'),
(224, '238220', 'Plumbing, Heating, and Air-Conditioning\nContractors', '1791', 'Structural Steel Erection'),
(225, '238220', 'Plumbing, Heating, and Air-Conditioning\nContractors', '1796', 'Installing Building Equipment'),
(226, '238220', 'Plumbing, Heating, and Air-Conditioning\nContractors', '7699', 'Repair Services, Nec'),
(227, '238290', 'Other Building Equipment Contractors', '1796', 'Installing Building Equipment'),
(228, '238290', 'Other Building Equipment Contractors', '1799', 'Special Trade Contractors, Nec'),
(229, '238290', 'Other Building Equipment Contractors', '7622', 'Radio and Television Repair'),
(230, '238310', 'Drywall and Insulation Contractors', '1742', 'Plastering, Drywall, and Insulation'),
(231, '238310', 'Drywall and Insulation Contractors', '1743', 'Terrazzo, Tile, Marble, Mosaic Work'),
(232, '238310', 'Drywall and Insulation Contractors', '1752', 'Floor Laying and Floor Work, Nec'),
(233, '238310', 'Drywall and Insulation Contractors', '1791', 'Structural Steel Erection'),
(234, '238310', 'Drywall and Insulation Contractors', '1799', 'Special Trade Contractors, Nec'),
(235, '238320', 'Painting and Wall Covering Contractors', '1721', 'Painting and Paper Hanging'),
(236, '238320', 'Painting and Wall Covering Contractors', '1799', 'Special Trade Contractors, Nec'),
(237, '238330', 'Flooring Contractors', '1752', 'Floor Laying and Floor Work, Nec'),
(238, '238340', 'Tile and Terrazzo Contractors', '1743', 'Terrazzo, Tile, Marble, Mosaic Work'),
(239, '238350', 'Finish Carpentry Contractors', '1751', 'Carpentry Work'),
(240, '238350', 'Finish Carpentry Contractors', '1799', 'Special Trade Contractors, Nec'),
(241, '238390', 'Other Building Finishing Contractors', '1761', 'Roofing, Siding, and Sheetmetal Work'),
(242, '238390', 'Other Building Finishing Contractors', '1799', 'Special Trade Contractors, Nec'),
(243, '238910', 'Site Preparation Contractors', '1081', 'Metal Mining Services'),
(244, '238910', 'Site Preparation Contractors', '1241', 'Coal Mining Services'),
(245, '238910', 'Site Preparation Contractors', '1389', 'Oil and Gas Field Services, Nec'),
(246, '238910', 'Site Preparation Contractors', '1481', 'Nonmetallic Mineral Services'),
(247, '238910', 'Site Preparation Contractors', '1629', 'Heavy Construction, Nec'),
(248, '238910', 'Site Preparation Contractors', '1711', 'Plumbing, Heating, Air-conditioning'),
(249, '238910', 'Site Preparation Contractors', '1794', 'Excavation Work'),
(250, '238910', 'Site Preparation Contractors', '1795', 'Wrecking and Demolition Work'),
(251, '238910', 'Site Preparation Contractors', '1799', 'Special Trade Contractors, Nec'),
(252, '238910', 'Site Preparation Contractors', '7353', 'Heavy Construction Equipment Rental'),
(253, '238990', 'All Other Specialty Trade Contractors', '1771', 'Concrete Work'),
(254, '238990', 'All Other Specialty Trade Contractors', '1799', 'Special Trade Contractors, Nec'),
(255, '238990', 'All Other Specialty Trade Contractors', '7353', 'Heavy Construction Equipment Rental'),
(256, '311111', 'Dog and Cat Food Manufacturing', '2047', 'Dog and Cat Food'),
(257, '311119', 'Other Animal Food Manufacturing', '723', 'Crop Preparation Services For Market'),
(258, '311119', 'Other Animal Food Manufacturing', '2048', 'Prepared Feeds, Nec'),
(259, '311211', 'Flour Milling', '2034', 'Dehydrated Fruits, Vegetables, Soups'),
(260, '311211', 'Flour Milling', '2041', 'Flour and Other Grain Mill Products'),
(261, '311212', 'Rice Milling', '2044', 'Rice Milling'),
(262, '311212', 'Rice Milling', '2099', 'Food Preparations, Nec'),
(263, '311213', 'Malt Manufacturing', '2083', 'Malt'),
(264, '311221', 'Wet Corn Milling', '2046', 'Wet Corn Milling'),
(265, '311224', 'Soybean and Other Oilseed Processing', '2074', 'Cottonseed Oil Mills'),
(266, '311224', 'Soybean and Other Oilseed Processing', '2075', 'Soybean Oil Mills'),
(267, '311224', 'Soybean and Other Oilseed Processing', '2076', 'Vegetable Oil Mills, Nec'),
(268, '311224', 'Soybean and Other Oilseed Processing', '2079', 'Edible Fats and Oils'),
(269, '311224', 'Soybean and Other Oilseed Processing', '2079', 'Edible Fats and Oils'),
(270, '311225', 'Fats and Oils Refining and Blending', '2046', 'Wet Corn Milling'),
(271, '311225', 'Fats and Oils Refining and Blending', '2074', 'Cottonseed Oil Mills'),
(272, '311225', 'Fats and Oils Refining and Blending', '2075', 'Soybean Oil Mills'),
(273, '311225', 'Fats and Oils Refining and Blending', '2076', 'Vegetable Oil Mills, Nec'),
(274, '311225', 'Fats and Oils Refining and Blending', '2079', 'Edible Fats and Oils'),
(275, '311230', 'Breakfast Cereal Manufacturing', '2043', 'Cereal Breakfast Foods'),
(276, '311313', 'Beet Sugar Manufacturing', '2063', 'Beet Sugar'),
(277, '311314', 'Cane Sugar Manufacturing', '2061', 'Raw Cane Sugar'),
(278, '311314', 'Cane Sugar Manufacturing', '2062', 'Cane Sugar Refining'),
(279, '311340', 'Nonchocolate Confectionery Manufacturing', '2064', 'Candy and Other Confectionery Products'),
(280, '311340', 'Nonchocolate Confectionery Manufacturing', '2067', 'Chewing Gum'),
(281, '311340', 'Nonchocolate Confectionery Manufacturing', '2099', 'Food Preparations, Nec'),
(282, '311340', 'Nonchocolate Confectionery Manufacturing', '5441', 'Candy, Nut, and Confectionery Stores'),
(283, '311351', 'Chocolate and Confectionery\nManufacturing from Cacao Beans', '2066', 'Chocolate and Cocoa Products'),
(284, '311352', 'Confectionery Manufacturing from\nPurchased Chocolate', '2064', 'Candy and Other Confectionery Products'),
(285, '311352', 'Confectionery Manufacturing from\nPurchased Chocolate', '2066', 'Chocolate and Cocoa Products'),
(286, '311352', 'Confectionery Manufacturing from\nPurchased Chocolate', '5441', 'Candy, Nut, and Confectionery Stores'),
(287, '311411', 'Frozen Fruit, Juice, and Vegetable\nManufacturing', '2037', 'Frozen Fruits and Vegetables'),
(288, '311412', 'Frozen Specialty Food Manufacturing', '2038', 'Frozen Specialties, Nec'),
(289, '311421', 'Fruit and Vegetable Canning', '2033', 'Canned Fruits and Specialties'),
(290, '311421', 'Fruit and Vegetable Canning', '2035', 'Pickles, Sauces, and Salad Dressings'),
(291, '311422', 'Specialty Canning', '2032', 'Canned Specialties'),
(292, '311423', 'Dried and Dehydrated Food Manufacturing', '2034', 'Dehydrated Fruits, Vegetables, Soups'),
(293, '311423', 'Dried and Dehydrated Food Manufacturing', '2099', 'Food Preparations, Nec'),
(294, '311511', 'Fluid Milk Manufacturing', '2023', 'Dry, Condensed, Evaporated Products'),
(295, '311511', 'Fluid Milk Manufacturing', '2026', 'Fluid Milk'),
(296, '311512', 'Creamery Butter Manufacturing', '2021', 'Creamery Butter'),
(297, '311513', 'Cheese Manufacturing', '2022', 'Cheese; Natural and Processed'),
(298, '311514', 'Dry, Condensed, and Evaporated Dairy\nProduct Manufacturing', '2023', 'Dry, Condensed, Evaporated Products'),
(299, '311514', 'Dry, Condensed, and Evaporated Dairy\nProduct Manufacturing', '2026', 'Fluid Milk'),
(300, '311520', 'Ice Cream and Frozen Dessert\nManufacturing', '2024', 'Ice Cream and Frozen Desserts'),
(301, '311611', 'Animal (except Poultry) Slaughtering', '751', 'Livestock Services, Except Veterinary'),
(302, '311611', 'Animal (except Poultry) Slaughtering', '2011', 'Meat Packing Plants'),
(303, '311611', 'Animal (except Poultry) Slaughtering', '2048', 'Prepared Feeds, Nec'),
(304, '311612', 'Meat Processed from Carcasses', '2013', 'Sausages and Other Prepared Meats'),
(305, '311612', 'Meat Processed from Carcasses', '5147', 'Meats and Meat Products'),
(306, '311613', 'Rendering and Meat Byproduct Processing', '2013', 'Sausages and Other Prepared Meats'),
(307, '311613', 'Rendering and Meat Byproduct Processing', '2077', 'Animal and Marine Fats and Oils'),
(308, '311615', 'Poultry Processing', '2015', 'Poultry Slaughtering and Processing'),
(309, '311710', 'Seafood Product Preparation and\nPackaging', '2077', 'Animal and Marine Fats and Oils'),
(310, '311710', 'Seafood Product Preparation and\nPackaging', '2077', 'Animal and Marine Fats and Oils'),
(311, '311710', 'Seafood Product Preparation and\nPackaging', '2091', 'Canned and Cured Fish and Seafoods'),
(312, '311710', 'Seafood Product Preparation and\nPackaging', '2092', 'Fresh or Frozen Packaged Fish'),
(313, '311811', 'Retail Bakeries', '5461', 'Retail Bakeries'),
(314, '311812', 'Commercial Bakeries', '2051', 'Bread, Cake, and Related Products'),
(315, '311812', 'Commercial Bakeries', '2052', 'Cookies and Crackers'),
(316, '311813', 'Frozen Cakes, Pies, and Other Pastries\nManufacturing', '2053', 'Frozen Bakery Products, Except Bread'),
(317, '311821', 'Cookie and Cracker Manufacturing', '2052', 'Cookies and Crackers'),
(318, '311824', 'Dry Pasta, Dough, and Flour Mixes\nManufacturing from Purchased Flour', '2045', 'Prepared Flour Mixes and Doughs'),
(319, '311824', 'Dry Pasta, Dough, and Flour Mixes\nManufacturing from Purchased Flour', '2098', 'Macaroni and Spaghetti'),
(320, '311824', 'Dry Pasta, Dough, and Flour Mixes\nManufacturing from Purchased Flour', '2099', 'Food Preparations, Nec'),
(321, '311830', 'Tortilla Manufacturing', '2099', 'Food Preparations, Nec'),
(322, '311911', 'Roasted Nuts and Peanut Butter\nManufacturing', '2068', 'Salted and Roasted Nuts and Seeds'),
(323, '311911', 'Roasted Nuts and Peanut Butter\nManufacturing', '2099', 'Food Preparations, Nec'),
(324, '311919', 'Other Snack Food Manufacturing', '2052', 'Cookies and Crackers'),
(325, '311919', 'Other Snack Food Manufacturing', '2096', 'Potato Chips and Similar Snacks'),
(326, '311920', 'Coffee and Tea Manufacturing', '2043', 'Cereal Breakfast Foods'),
(327, '311920', 'Coffee and Tea Manufacturing', '2087', 'Flavoring Extracts and Syrups, Nec'),
(328, '311920', 'Coffee and Tea Manufacturing', '2095', 'Roasted Coffee'),
(329, '311920', 'Coffee and Tea Manufacturing', '2099', 'Food Preparations, Nec'),
(330, '311930', 'Flavoring Syrup and Concentrate\nManufacturing', '2087', 'Flavoring Extracts and Syrups, Nec'),
(331, '311941', 'Mayonnaise, Dressing, and Other Prepared\nSauce Manufacturing', '2035', 'Pickles, Sauces, and Salad Dressings'),
(332, '311941', 'Mayonnaise, Dressing, and Other Prepared\nSauce Manufacturing', '2099', 'Food Preparations, Nec'),
(333, '311942', 'Spice and Extract Manufacturing', '2082', 'Malt Beverages'),
(334, '311942', 'Spice and Extract Manufacturing', '2087', 'Flavoring Extracts and Syrups, Nec'),
(335, '311942', 'Spice and Extract Manufacturing', '2099', 'Food Preparations, Nec'),
(336, '311942', 'Spice and Extract Manufacturing', '2899', 'Chemical Preparations, Nec'),
(337, '311991', 'Perishable Prepared Food Manufacturing', '2099', 'Food Preparations, Nec'),
(338, '311999', 'All Other Miscellaneous Food\nManufacturing', '2015', 'Poultry Slaughtering and Processing'),
(339, '311999', 'All Other Miscellaneous Food\nManufacturing', '2032', 'Canned Specialties'),
(340, '311999', 'All Other Miscellaneous Food\nManufacturing', '2034', 'Dehydrated Fruits, Vegetables, Soups'),
(341, '311999', 'All Other Miscellaneous Food\nManufacturing', '2087', 'Flavoring Extracts and Syrups, Nec'),
(342, '311999', 'All Other Miscellaneous Food\nManufacturing', '2099', 'Food Preparations, Nec'),
(343, '312111', 'Soft Drink Manufacturing', '2086', 'Bottled and Canned Soft Drinks'),
(344, '312112', 'Bottled Water Manufacturing', '2086', 'Bottled and Canned Soft Drinks'),
(345, '312112', 'Bottled Water Manufacturing', '5149', 'Groceries and Related Products, Nec'),
(346, '312113', 'Ice Manufacturing', '2097', 'Manufactured Ice'),
(347, '312120', 'Breweries', '2082', 'Malt Beverages'),
(348, '312130', 'Wineries', '2084', 'Wines, Brandy, and Brandy Spirits'),
(349, '312130', 'Wineries', '2085', 'Distilled and Blended Liquors'),
(350, '312140', 'Distilleries', '2085', 'Distilled and Blended Liquors'),
(351, '312230', 'Tobacco Manufacturing', '2111', 'Cigarettes'),
(352, '312230', 'Tobacco Manufacturing', '2121', 'Cigars'),
(353, '312230', 'Tobacco Manufacturing', '2131', 'Chewing and Smoking Tobacco'),
(354, '312230', 'Tobacco Manufacturing', '2141', 'Tobacco Stemming and Redrying'),
(355, '312230', 'Tobacco Manufacturing', '2141', 'Tobacco Stemming and Redrying'),
(356, '312230', 'Tobacco Manufacturing', '7389', 'Business Services, Nec'),
(357, '313110', 'Fiber, Yarn, and Thread Mills', '2281', 'Yarn Spinning Mills'),
(358, '313110', 'Fiber, Yarn, and Thread Mills', '2282', 'Throwing and Winding Mills'),
(359, '313110', 'Fiber, Yarn, and Thread Mills', '2284', 'Thread Mills'),
(360, '313110', 'Fiber, Yarn, and Thread Mills', '2298', 'Cordage and Twine'),
(361, '313110', 'Fiber, Yarn, and Thread Mills', '2299', 'Textile Goods, Nec'),
(362, '313110', 'Fiber, Yarn, and Thread Mills', '2299', 'Textile Goods, Nec'),
(363, '313110', 'Fiber, Yarn, and Thread Mills', '2299', 'Textile Goods, Nec'),
(364, '313210', 'Broadwoven Fabric Mills', '2211', 'Broadwoven Fabric Mills, Cotton'),
(365, '313210', 'Broadwoven Fabric Mills', '2221', 'Broadwoven Fabric Mills, Manmade'),
(366, '313210', 'Broadwoven Fabric Mills', '2231', 'Broadwoven Fabric Mills, Wool'),
(367, '313210', 'Broadwoven Fabric Mills', '2299', 'Textile Goods, Nec'),
(368, '313220', 'Narrow Fabric Mills and Schiffli Machine\nEmbroidery', '2241', 'Narrow Fabric Mills'),
(369, '313220', 'Narrow Fabric Mills and Schiffli Machine\nEmbroidery', '2299', 'Textile Goods, Nec'),
(370, '313220', 'Narrow Fabric Mills and Schiffli Machine\nEmbroidery', '2397', 'Schiffli Machine Embroideries'),
(371, '313230', 'Nonwoven Fabric Mills', '2297', 'Nonwoven Fabrics'),
(372, '313230', 'Nonwoven Fabric Mills', '2299', 'Textile Goods, Nec'),
(373, '313240', 'Knit Fabric Mills', '2257', 'Weft Knit Fabric Mills'),
(374, '313240', 'Knit Fabric Mills', '2258', 'Lace and Warp Knit Fabric Mills'),
(375, '313240', 'Knit Fabric Mills', '2259', 'Knitting Mills, Nec'),
(376, '313240', 'Knit Fabric Mills', '2259', 'Knitting Mills, Nec'),
(377, '313310', 'Textile and Fabric Finishing Mills', '2231', 'Broadwoven Fabric Mills, Wool'),
(378, '313310', 'Textile and Fabric Finishing Mills', '2231', 'Broadwoven Fabric Mills, Wool'),
(379, '313310', 'Textile and Fabric Finishing Mills', '2251', 'Women\'s Hosiery, Except Socks'),
(380, '313310', 'Textile and Fabric Finishing Mills', '2252', 'Hosiery, Nec'),
(381, '313310', 'Textile and Fabric Finishing Mills', '2253', 'Knit Outerwear Mills'),
(382, '313310', 'Textile and Fabric Finishing Mills', '2254', 'Knit Underwear Mills'),
(383, '313310', 'Textile and Fabric Finishing Mills', '2257', 'Weft Knit Fabric Mills'),
(384, '313310', 'Textile and Fabric Finishing Mills', '2258', 'Lace and Warp Knit Fabric Mills'),
(385, '313310', 'Textile and Fabric Finishing Mills', '2259', 'Knitting Mills, Nec'),
(386, '313310', 'Textile and Fabric Finishing Mills', '2261', 'Finishing Plants, Cotton'),
(387, '313310', 'Textile and Fabric Finishing Mills', '2262', 'Finishing Plants, Manmade'),
(388, '313310', 'Textile and Fabric Finishing Mills', '2269', 'Finishing Plants, Nec'),
(389, '313310', 'Textile and Fabric Finishing Mills', '2269', 'Finishing Plants, Nec'),
(390, '313310', 'Textile and Fabric Finishing Mills', '2284', 'Thread Mills'),
(391, '313310', 'Textile and Fabric Finishing Mills', '2299', 'Textile Goods, Nec'),
(392, '313310', 'Textile and Fabric Finishing Mills', '5131', 'Piece Goods and Notions'),
(393, '313310', 'Textile and Fabric Finishing Mills', '5131', 'Piece Goods and Notions'),
(394, '313310', 'Textile and Fabric Finishing Mills', '7389', 'Business Services, Nec'),
(395, '313320', 'Fabric Coating Mills', '2295', 'Coated Fabrics, Not Rubberized'),
(396, '313320', 'Fabric Coating Mills', '3069', 'Fabricated Rubber Products, Nec'),
(397, '314110', 'Carpet and Rug Mills', '2273', 'Carpets and Rugs'),
(398, '314120', 'Curtain and Linen Mills', '2391', 'Curtains and Draperies'),
(399, '314120', 'Curtain and Linen Mills', '2392', 'Household Furnishings, Nec'),
(400, '314120', 'Curtain and Linen Mills', '5714', 'Drapery and Upholstery Stores'),
(401, '314120', 'Curtain and Linen Mills', '5714', 'Drapery and Upholstery Stores'),
(402, '314910', 'Textile Bag and Canvas Mills', '2392', 'Household Furnishings, Nec'),
(403, '314910', 'Textile Bag and Canvas Mills', '2393', 'Textile Bags'),
(404, '314910', 'Textile Bag and Canvas Mills', '2394', 'Canvas and Related Products'),
(405, '314910', 'Textile Bag and Canvas Mills', '3069', 'Fabricated Rubber Products, Nec'),
(406, '314994', 'Rope, Cordage, Twine, Tire Cord, and Tire\nFabric Mills', '2296', 'Tire Cord and Fabrics'),
(407, '314994', 'Rope, Cordage, Twine, Tire Cord, and Tire\nFabric Mills', '2298', 'Cordage and Twine'),
(408, '314999', 'All Other Miscellaneous Textile Product\nMills', '2299', 'Textile Goods, Nec'),
(409, '314999', 'All Other Miscellaneous Textile Product\nMills', '2311', 'Men\'s and Boy\'s Suits and Coats'),
(410, '314999', 'All Other Miscellaneous Textile Product\nMills', '2321', 'Men\'s and Boy\'s Furnishings'),
(411, '314999', 'All Other Miscellaneous Textile Product\nMills', '2322', 'Men\'s and Boy\'s Underwear and Nightwear'),
(412, '314999', 'All Other Miscellaneous Textile Product\nMills', '2323', 'Men\'s and Boy\'s Neckwear'),
(413, '314999', 'All Other Miscellaneous Textile Product\nMills', '2325', 'Men\'s and Boy\'s Trousers and Slacks'),
(414, '314999', 'All Other Miscellaneous Textile Product\nMills', '2326', 'Men\'s and Boy\'s Work Clothing'),
(415, '314999', 'All Other Miscellaneous Textile Product\nMills', '2329', 'Men\'s and Boy\'s Clothing, Nec'),
(416, '314999', 'All Other Miscellaneous Textile Product\nMills', '2331', 'Women\'s and Misses\' Blouses and Shirts'),
(417, '314999', 'All Other Miscellaneous Textile Product\nMills', '2335', 'Women\'s, Junior\'s, and Misses\' Dresses'),
(418, '314999', 'All Other Miscellaneous Textile Product\nMills', '2337', 'Women\'s and Misses\' Suits and Coats'),
(419, '314999', 'All Other Miscellaneous Textile Product\nMills', '2339', 'Women\'s and Misses\' Outerwear, Nec'),
(420, '314999', 'All Other Miscellaneous Textile Product\nMills', '2341', 'Women\'s and Children\'s Underwear'),
(421, '314999', 'All Other Miscellaneous Textile Product\nMills', '2341', 'Women\'s and Children\'s Underwear'),
(422, '314999', 'All Other Miscellaneous Textile Product\nMills', '2342', 'Bras, Girdles, and Allied Garments'),
(423, '314999', 'All Other Miscellaneous Textile Product\nMills', '2353', 'Hats, Caps, and Millinery'),
(424, '314999', 'All Other Miscellaneous Textile Product\nMills', '2353', 'Hats, Caps, and Millinery'),
(425, '314999', 'All Other Miscellaneous Textile Product\nMills', '2361', 'Girl\'s and Children\'s Dresses, Blouses'),
(426, '314999', 'All Other Miscellaneous Textile Product\nMills', '2361', 'Girl\'s and Children\'s Dresses, Blouses'),
(427, '314999', 'All Other Miscellaneous Textile Product\nMills', '2369', 'Girl\'s and Children\'s Outerwear, Nec'),
(428, '314999', 'All Other Miscellaneous Textile Product\nMills', '2369', 'Girl\'s and Children\'s Outerwear, Nec'),
(429, '314999', 'All Other Miscellaneous Textile Product\nMills', '2371', 'Fur Goods'),
(430, '314999', 'All Other Miscellaneous Textile Product\nMills', '2371', 'Fur Goods'),
(431, '314999', 'All Other Miscellaneous Textile Product\nMills', '2381', 'Fabric Dress and Work Gloves'),
(432, '314999', 'All Other Miscellaneous Textile Product\nMills', '2381', 'Fabric Dress and Work Gloves'),
(433, '314999', 'All Other Miscellaneous Textile Product\nMills', '2384', 'Robes and Dressing Gowns'),
(434, '314999', 'All Other Miscellaneous Textile Product\nMills', '2384', 'Robes and Dressing Gowns'),
(435, '314999', 'All Other Miscellaneous Textile Product\nMills', '2385', 'Waterproof Outerwear'),
(436, '314999', 'All Other Miscellaneous Textile Product\nMills', '2385', 'Waterproof Outerwear'),
(437, '314999', 'All Other Miscellaneous Textile Product\nMills', '2386', 'Leather and Sheep-lined Clothing'),
(438, '314999', 'All Other Miscellaneous Textile Product\nMills', '2386', 'Leather and Sheep-lined Clothing'),
(439, '314999', 'All Other Miscellaneous Textile Product\nMills', '2387', 'Apparel Belts'),
(440, '314999', 'All Other Miscellaneous Textile Product\nMills', '2387', 'Apparel Belts'),
(441, '314999', 'All Other Miscellaneous Textile Product\nMills', '2389', 'Apparel and Accessories, Nec'),
(442, '314999', 'All Other Miscellaneous Textile Product\nMills', '2389', 'Apparel and Accessories, Nec'),
(443, '314999', 'All Other Miscellaneous Textile Product\nMills', '2392', 'Household Furnishings, Nec'),
(444, '314999', 'All Other Miscellaneous Textile Product\nMills', '2395', 'Pleating and Stitching'),
(445, '314999', 'All Other Miscellaneous Textile Product\nMills', '2395', 'Pleating and Stitching'),
(446, '314999', 'All Other Miscellaneous Textile Product\nMills', '2395', 'Pleating and Stitching'),
(447, '314999', 'All Other Miscellaneous Textile Product\nMills', '2396', 'Automotive and Apparel Trimmings'),
(448, '314999', 'All Other Miscellaneous Textile Product\nMills', '2396', 'Automotive and Apparel Trimmings'),
(449, '314999', 'All Other Miscellaneous Textile Product\nMills', '2396', 'Automotive and Apparel Trimmings'),
(450, '314999', 'All Other Miscellaneous Textile Product\nMills', '2399', 'Fabricated Textile Products, Nec'),
(451, '314999', 'All Other Miscellaneous Textile Product\nMills', '2399', 'Fabricated Textile Products, Nec'),
(452, '314999', 'All Other Miscellaneous Textile Product\nMills', '2399', 'Fabricated Textile Products, Nec'),
(453, '314999', 'All Other Miscellaneous Textile Product\nMills', '3151', 'Leather Gloves and Mittens'),
(454, '314999', 'All Other Miscellaneous Textile Product\nMills', '3151', 'Leather Gloves and Mittens'),
(455, '314999', 'All Other Miscellaneous Textile Product\nMills', '3569', 'General Industrial Machinery,'),
(456, '314999', 'All Other Miscellaneous Textile Product\nMills', '7389', 'Business Services, Nec'),
(457, '315110', 'Hosiery and Sock Mills', '2251', 'Women\'s Hosiery, Except Socks'),
(458, '315110', 'Hosiery and Sock Mills', '2252', 'Hosiery, Nec'),
(459, '315110', 'Hosiery and Sock Mills', '2252', 'Hosiery, Nec'),
(460, '315190', 'Other Apparel Knitting Mills', '2253', 'Knit Outerwear Mills'),
(461, '315190', 'Other Apparel Knitting Mills', '2253', 'Knit Outerwear Mills'),
(462, '315190', 'Other Apparel Knitting Mills', '2254', 'Knit Underwear Mills'),
(463, '315190', 'Other Apparel Knitting Mills', '2259', 'Knitting Mills, Nec'),
(464, '315190', 'Other Apparel Knitting Mills', '2259', 'Knitting Mills, Nec'),
(465, '315210', 'Cut and Sew Apparel Contractors', '2311', 'Men\'s and Boy\'s Suits and Coats'),
(466, '315210', 'Cut and Sew Apparel Contractors', '2321', 'Men\'s and Boy\'s Furnishings'),
(467, '315210', 'Cut and Sew Apparel Contractors', '2322', 'Men\'s and Boy\'s Underwear and Nightwear'),
(468, '315210', 'Cut and Sew Apparel Contractors', '2323', 'Men\'s and Boy\'s Neckwear'),
(469, '315210', 'Cut and Sew Apparel Contractors', '2325', 'Men\'s and Boy\'s Trousers and Slacks'),
(470, '315210', 'Cut and Sew Apparel Contractors', '2326', 'Men\'s and Boy\'s Work Clothing'),
(471, '315210', 'Cut and Sew Apparel Contractors', '2329', 'Men\'s and Boy\'s Clothing, Nec'),
(472, '315210', 'Cut and Sew Apparel Contractors', '2331', 'Women\'s and Misses\' Blouses and Shirts'),
(473, '315210', 'Cut and Sew Apparel Contractors', '2335', 'Women\'s, Junior\'s, and Misses\' Dresses'),
(474, '315210', 'Cut and Sew Apparel Contractors', '2337', 'Women\'s and Misses\' Suits and Coats'),
(475, '315210', 'Cut and Sew Apparel Contractors', '2339', 'Women\'s and Misses\' Outerwear, Nec'),
(476, '315210', 'Cut and Sew Apparel Contractors', '2341', 'Women\'s and Children\'s Underwear'),
(477, '315210', 'Cut and Sew Apparel Contractors', '2341', 'Women\'s and Children\'s Underwear'),
(478, '315210', 'Cut and Sew Apparel Contractors', '2342', 'Bras, Girdles, and Allied Garments'),
(479, '315210', 'Cut and Sew Apparel Contractors', '2353', 'Hats, Caps, and Millinery'),
(480, '315210', 'Cut and Sew Apparel Contractors', '2353', 'Hats, Caps, and Millinery'),
(481, '315210', 'Cut and Sew Apparel Contractors', '2361', 'Girl\'s and Children\'s Dresses, Blouses'),
(482, '315210', 'Cut and Sew Apparel Contractors', '2361', 'Girl\'s and Children\'s Dresses, Blouses'),
(483, '315210', 'Cut and Sew Apparel Contractors', '2369', 'Girl\'s and Children\'s Outerwear, Nec'),
(484, '315210', 'Cut and Sew Apparel Contractors', '2369', 'Girl\'s and Children\'s Outerwear, Nec'),
(485, '315210', 'Cut and Sew Apparel Contractors', '2371', 'Fur Goods'),
(486, '315210', 'Cut and Sew Apparel Contractors', '2371', 'Fur Goods'),
(487, '315210', 'Cut and Sew Apparel Contractors', '2381', 'Fabric Dress and Work Gloves'),
(488, '315210', 'Cut and Sew Apparel Contractors', '2381', 'Fabric Dress and Work Gloves'),
(489, '315210', 'Cut and Sew Apparel Contractors', '2384', 'Robes and Dressing Gowns'),
(490, '315210', 'Cut and Sew Apparel Contractors', '2384', 'Robes and Dressing Gowns'),
(491, '315210', 'Cut and Sew Apparel Contractors', '2385', 'Waterproof Outerwear'),
(492, '315210', 'Cut and Sew Apparel Contractors', '2385', 'Waterproof Outerwear'),
(493, '315210', 'Cut and Sew Apparel Contractors', '2386', 'Leather and Sheep-lined Clothing'),
(494, '315210', 'Cut and Sew Apparel Contractors', '2386', 'Leather and Sheep-lined Clothing'),
(495, '315210', 'Cut and Sew Apparel Contractors', '2387', 'Apparel Belts'),
(496, '315210', 'Cut and Sew Apparel Contractors', '2387', 'Apparel Belts'),
(497, '315210', 'Cut and Sew Apparel Contractors', '2389', 'Apparel and Accessories, Nec'),
(498, '315210', 'Cut and Sew Apparel Contractors', '2389', 'Apparel and Accessories, Nec'),
(499, '315210', 'Cut and Sew Apparel Contractors', '2395', 'Pleating and Stitching'),
(500, '315210', 'Cut and Sew Apparel Contractors', '2395', 'Pleating and Stitching'),
(501, '315210', 'Cut and Sew Apparel Contractors', '2396', 'Automotive and Apparel Trimmings'),
(502, '315210', 'Cut and Sew Apparel Contractors', '2396', 'Automotive and Apparel Trimmings'),
(503, '315210', 'Cut and Sew Apparel Contractors', '2399', 'Fabricated Textile Products, Nec'),
(504, '315210', 'Cut and Sew Apparel Contractors', '2399', 'Fabricated Textile Products, Nec'),
(505, '315210', 'Cut and Sew Apparel Contractors', '3151', 'Leather Gloves and Mittens'),
(506, '315210', 'Cut and Sew Apparel Contractors', '3151', 'Leather Gloves and Mittens'),
(507, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2311', 'Men\'s and Boy\'s Suits and Coats'),
(508, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2321', 'Men\'s and Boy\'s Furnishings'),
(509, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2322', 'Men\'s and Boy\'s Underwear and Nightwear'),
(510, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2325', 'Men\'s and Boy\'s Trousers and Slacks'),
(511, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2326', 'Men\'s and Boy\'s Work Clothing'),
(512, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2329', 'Men\'s and Boy\'s Clothing, Nec'),
(513, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2341', 'Women\'s and Children\'s Underwear'),
(514, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2361', 'Girl\'s and Children\'s Dresses, Blouses'),
(515, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2369', 'Girl\'s and Children\'s Outerwear, Nec'),
(516, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2369', 'Girl\'s and Children\'s Outerwear, Nec'),
(517, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2369', 'Girl\'s and Children\'s Outerwear, Nec'),
(518, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2369', 'Girl\'s and Children\'s Outerwear, Nec'),
(519, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2384', 'Robes and Dressing Gowns'),
(520, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2385', 'Waterproof Outerwear'),
(521, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '2385', 'Waterproof Outerwear'),
(522, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '5699', 'Miscellaneous Apparel and Accessories'),
(523, '315220', 'Men’s and Boys’ Cut and Sew Apparel\nManufacturing', '5699', 'Miscellaneous Apparel and Accessories'),
(524, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2331', 'Women\'s and Misses\' Blouses and Shirts'),
(525, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2335', 'Women\'s, Junior\'s, and Misses\' Dresses'),
(526, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2337', 'Women\'s and Misses\' Suits and Coats'),
(527, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2339', 'Women\'s and Misses\' Outerwear, Nec'),
(528, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2341', 'Women\'s and Children\'s Underwear'),
(529, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2341', 'Women\'s and Children\'s Underwear'),
(530, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2342', 'Bras, Girdles, and Allied Garments'),
(531, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2361', 'Girl\'s and Children\'s Dresses, Blouses'),
(532, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2361', 'Girl\'s and Children\'s Dresses, Blouses'),
(533, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2361', 'Girl\'s and Children\'s Dresses, Blouses'),
(534, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2369', 'Girl\'s and Children\'s Outerwear, Nec'),
(535, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2369', 'Girl\'s and Children\'s Outerwear, Nec'),
(536, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2369', 'Girl\'s and Children\'s Outerwear, Nec'),
(537, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2369', 'Girl\'s and Children\'s Outerwear, Nec'),
(538, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2384', 'Robes and Dressing Gowns'),
(539, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2385', 'Waterproof Outerwear'),
(540, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2385', 'Waterproof Outerwear'),
(541, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2385', 'Waterproof Outerwear'),
(542, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '2389', 'Apparel and Accessories, Nec'),
(543, '315240', 'Women’s, Girls’, and Infants’ Cut and Sew\nApparel Manufacturing', '5699', 'Miscellaneous Apparel and Accessories'),
(544, '315280', 'Other Cut and Sew Apparel Manufacturing', '2329', 'Men\'s and Boy\'s Clothing, Nec'),
(545, '315280', 'Other Cut and Sew Apparel Manufacturing', '2339', 'Women\'s and Misses\' Outerwear, Nec'),
(546, '315280', 'Other Cut and Sew Apparel Manufacturing', '2371', 'Fur Goods'),
(547, '315280', 'Other Cut and Sew Apparel Manufacturing', '2385', 'Waterproof Outerwear');
INSERT INTO `naics` (`id`, `naics_code`, `description`, `sic_code`, `ins`) VALUES
(548, '315280', 'Other Cut and Sew Apparel Manufacturing', '2386', 'Leather and Sheep-lined Clothing'),
(549, '315280', 'Other Cut and Sew Apparel Manufacturing', '2389', 'Apparel and Accessories, Nec'),
(550, '315280', 'Other Cut and Sew Apparel Manufacturing', '3069', 'Fabricated Rubber Products, Nec'),
(551, '315990', 'Apparel Accessories and Other Apparel\nManufacturing', '2323', 'Men\'s and Boy\'s Neckwear'),
(552, '315990', 'Apparel Accessories and Other Apparel\nManufacturing', '2339', 'Women\'s and Misses\' Outerwear, Nec'),
(553, '315990', 'Apparel Accessories and Other Apparel\nManufacturing', '2353', 'Hats, Caps, and Millinery'),
(554, '315990', 'Apparel Accessories and Other Apparel\nManufacturing', '2381', 'Fabric Dress and Work Gloves'),
(555, '315990', 'Apparel Accessories and Other Apparel\nManufacturing', '2385', 'Waterproof Outerwear'),
(556, '315990', 'Apparel Accessories and Other Apparel\nManufacturing', '2387', 'Apparel Belts'),
(557, '315990', 'Apparel Accessories and Other Apparel\nManufacturing', '2389', 'Apparel and Accessories, Nec'),
(558, '315990', 'Apparel Accessories and Other Apparel\nManufacturing', '2396', 'Automotive and Apparel Trimmings'),
(559, '315990', 'Apparel Accessories and Other Apparel\nManufacturing', '2399', 'Fabricated Textile Products, Nec'),
(560, '315990', 'Apparel Accessories and Other Apparel\nManufacturing', '3069', 'Fabricated Rubber Products, Nec'),
(561, '315990', 'Apparel Accessories and Other Apparel\nManufacturing', '3151', 'Leather Gloves and Mittens'),
(562, '316110', 'Leather and Hide Tanning and Finishing', '3111', 'Leather Tanning and Finishing'),
(563, '316110', 'Leather and Hide Tanning and Finishing', '3999', 'Manufacturing Industries, Nec'),
(564, '316210', 'Footwear Manufacturing', '3021', 'Rubber and Plastics Footwear'),
(565, '316210', 'Footwear Manufacturing', '3142', 'House Slippers'),
(566, '316210', 'Footwear Manufacturing', '3143', 'Men\'s Footwear, Except athletic'),
(567, '316210', 'Footwear Manufacturing', '3144', 'Women\'s Footwear, Except athletic'),
(568, '316210', 'Footwear Manufacturing', '3149', 'Footwear, Except Rubber, Nec'),
(569, '316992', 'Women\'s Handbag and Purse\nManufacturing', '3171', 'Women\'s Handbags and Purses'),
(570, '316998', 'All Other Leather Good and Allied Product\nManufacturing', '3131', 'Footwear Cut Stock'),
(571, '316998', 'All Other Leather Good and Allied Product\nManufacturing', '3161', 'Luggage'),
(572, '316998', 'All Other Leather Good and Allied Product\nManufacturing', '3172', 'Personal Leather Goods, Nec'),
(573, '316998', 'All Other Leather Good and Allied Product\nManufacturing', '3199', 'Leather Goods, Nec'),
(574, '321113', 'Sawmills', '2421', 'Sawmills and Planing Mills, General'),
(575, '321113', 'Sawmills', '2426', 'Hardwood Dimension and Flooring Mills'),
(576, '321113', 'Sawmills', '2429', 'Special Product Sawmills, Nec'),
(577, '321114', 'Wood Preservation', '2491', 'Wood Preserving'),
(578, '321211', 'Hardwood Veneer and Plywood\nManufacturing', '2435', 'Hardwood Veneer and Plywood'),
(579, '321212', 'Softwood Veneer and Plywood\nManufacturing', '2436', 'Softwood Veneer and Plywood'),
(580, '321213', 'Engineered Wood Member (except Truss)\nManufacturing', '2439', 'Structural Wood Members, Nec'),
(581, '321214', 'Truss Manufacturing', '2439', 'Structural Wood Members, Nec'),
(582, '321219', 'Reconstituted Wood Product Manufacturing', '2493', 'Reconstituted Wood Products'),
(583, '321911', 'Wood Window and Door Manufacturing', '2431', 'Millwork'),
(584, '321912', 'Cut Stock, Resawing Lumber, and Planing', '2421', 'Sawmills and Planing Mills, General'),
(585, '321912', 'Cut Stock, Resawing Lumber, and Planing', '2426', 'Hardwood Dimension and Flooring Mills'),
(586, '321918', 'Other Millwork (including Flooring)', '2421', 'Sawmills and Planing Mills, General'),
(587, '321918', 'Other Millwork (including Flooring)', '2426', 'Hardwood Dimension and Flooring Mills'),
(588, '321918', 'Other Millwork (including Flooring)', '2431', 'Millwork'),
(589, '321920', 'Wood Container and Pallet Manufacturing', '2421', 'Sawmills and Planing Mills, General'),
(590, '321920', 'Wood Container and Pallet Manufacturing', '2429', 'Special Product Sawmills, Nec'),
(591, '321920', 'Wood Container and Pallet Manufacturing', '2441', 'Nailed Wood Boxes and Shook'),
(592, '321920', 'Wood Container and Pallet Manufacturing', '2448', 'Wood Pallets and Skids'),
(593, '321920', 'Wood Container and Pallet Manufacturing', '2449', 'Wood Containers, Nec'),
(594, '321920', 'Wood Container and Pallet Manufacturing', '2499', 'Wood Products, Nec'),
(595, '321991', 'Manufactured Home (Mobile Home)\nManufacturing', '2451', 'Mobile Homes'),
(596, '321992', 'Prefabricated Wood Building Manufacturing', '2452', 'Prefabricated Wood Buildings'),
(597, '321999', 'All Other Miscellaneous Wood Product\nManufacturing', '2421', 'Sawmills and Planing Mills, General'),
(598, '321999', 'All Other Miscellaneous Wood Product\nManufacturing', '2429', 'Special Product Sawmills, Nec'),
(599, '321999', 'All Other Miscellaneous Wood Product\nManufacturing', '2499', 'Wood Products, Nec'),
(600, '321999', 'All Other Miscellaneous Wood Product\nManufacturing', '2517', 'Wood Television and Radio Cabinets'),
(601, '321999', 'All Other Miscellaneous Wood Product\nManufacturing', '3131', 'Footwear Cut Stock'),
(602, '321999', 'All Other Miscellaneous Wood Product\nManufacturing', '3999', 'Manufacturing Industries, Nec'),
(603, '322110', 'Pulp Mills', '2611', 'Pulp Mills'),
(604, '322121', 'Paper (except Newsprint) Mills', '2611', 'Pulp Mills'),
(605, '322121', 'Paper (except Newsprint) Mills', '2621', 'Paper Mills'),
(606, '322122', 'Newsprint Mills', '2611', 'Pulp Mills'),
(607, '322122', 'Newsprint Mills', '2621', 'Paper Mills'),
(608, '322130', 'Paperboard Mills', '2611', 'Pulp Mills'),
(609, '322130', 'Paperboard Mills', '2631', 'Paperboard Mills'),
(610, '322211', 'Corrugated and Solid Fiber Box\nManufacturing', '2653', 'Corrugated and Solid Fiber Boxes'),
(611, '322211', 'Corrugated and Solid Fiber Box\nManufacturing', '2679', 'Converted Paper Products, Nec'),
(612, '322212', 'Folding Paperboard Box Manufacturing', '2657', 'Folding Paperboard Boxes'),
(613, '322219', 'Other Paperboard Container Manufacturing', '2652', 'Setup Paperboard Boxes'),
(614, '322219', 'Other Paperboard Container Manufacturing', '2655', 'Fiber Cans, Drums, and Similar Products'),
(615, '322219', 'Other Paperboard Container Manufacturing', '2656', 'Sanitary Food Containers'),
(616, '322220', 'Paper Bag and Coated and Treated Paper\nManufacturing', '2671', 'Paper; Coated and Laminated Packaging'),
(617, '322220', 'Paper Bag and Coated and Treated Paper\nManufacturing', '2672', 'Paper; Coated and Laminated, Nec'),
(618, '322220', 'Paper Bag and Coated and Treated Paper\nManufacturing', '2673', 'Bags: Plastic, Laminated, and Coated'),
(619, '322220', 'Paper Bag and Coated and Treated Paper\nManufacturing', '2674', 'Bags: Uncoated Paper and Multiwall'),
(620, '322220', 'Paper Bag and Coated and Treated Paper\nManufacturing', '2675', 'Die-cut Paper and Board'),
(621, '322220', 'Paper Bag and Coated and Treated Paper\nManufacturing', '2679', 'Converted Paper Products, Nec'),
(622, '322220', 'Paper Bag and Coated and Treated Paper\nManufacturing', '3497', 'Metal Foil and Leaf'),
(623, '322230', 'Stationery Product Manufacturing', '2675', 'Die-cut Paper and Board'),
(624, '322230', 'Stationery Product Manufacturing', '2677', 'Envelopes'),
(625, '322230', 'Stationery Product Manufacturing', '2678', 'Stationery Products'),
(626, '322230', 'Stationery Product Manufacturing', '2679', 'Converted Paper Products, Nec'),
(627, '322291', 'Sanitary Paper Product Manufacturing', '2676', 'Sanitary Paper Products'),
(628, '322291', 'Sanitary Paper Product Manufacturing', '3842', 'Surgical Appliances and Supplies'),
(629, '322299', 'All Other Converted Paper Product\nManufacturing', '2675', 'Die-cut Paper and Board'),
(630, '322299', 'All Other Converted Paper Product\nManufacturing', '2679', 'Converted Paper Products, Nec'),
(631, '323111', 'Commercial Printing (except Screen and\nBooks)', '2752', 'Commercial Printing, Lithographic'),
(632, '323111', 'Commercial Printing (except Screen and\nBooks)', '2752', 'Commercial Printing, Lithographic'),
(633, '323111', 'Commercial Printing (except Screen and\nBooks)', '2754', 'Commercial Printing, Gravure'),
(634, '323111', 'Commercial Printing (except Screen and\nBooks)', '2759', 'Commercial Printing, Nec'),
(635, '323111', 'Commercial Printing (except Screen and\nBooks)', '2759', 'Commercial Printing, Nec'),
(636, '323111', 'Commercial Printing (except Screen and\nBooks)', '2759', 'Commercial Printing, Nec'),
(637, '323111', 'Commercial Printing (except Screen and\nBooks)', '2759', 'Commercial Printing, Nec'),
(638, '323111', 'Commercial Printing (except Screen and\nBooks)', '2761', 'Manifold Business Forms'),
(639, '323111', 'Commercial Printing (except Screen and\nBooks)', '2771', 'Greeting Cards'),
(640, '323111', 'Commercial Printing (except Screen and\nBooks)', '2771', 'Greeting Cards'),
(641, '323111', 'Commercial Printing (except Screen and\nBooks)', '2771', 'Greeting Cards'),
(642, '323111', 'Commercial Printing (except Screen and\nBooks)', '2771', 'Greeting Cards'),
(643, '323111', 'Commercial Printing (except Screen and\nBooks)', '2782', 'Blankbooks and Looseleaf Binders'),
(644, '323111', 'Commercial Printing (except Screen and\nBooks)', '2782', 'Blankbooks and Looseleaf Binders'),
(645, '323111', 'Commercial Printing (except Screen and\nBooks)', '7334', 'Photocopying and Duplicating Services'),
(646, '323113', 'Commercial Screen Printing', '2396', 'Automotive and Apparel Trimmings'),
(647, '323113', 'Commercial Screen Printing', '2759', 'Commercial Printing, Nec'),
(648, '323113', 'Commercial Screen Printing', '2771', 'Greeting Cards'),
(649, '323113', 'Commercial Screen Printing', '3993', 'Signs and Advertising Specialties'),
(650, '323117', 'Books Printing', '2732', 'Book Printing'),
(651, '323120', 'Support Activities for Printing', '2789', 'Bookbinding and Related Work'),
(652, '323120', 'Support Activities for Printing', '2791', 'Typesetting'),
(653, '323120', 'Support Activities for Printing', '2796', 'Platemaking Services'),
(654, '324110', 'Petroleum Refineries', '2911', 'Petroleum Refining'),
(655, '324121', 'Asphalt Paving Mixture and Block\nManufacturing', '2951', 'Asphalt Paving Mixtures and Blocks'),
(656, '324122', 'Asphalt Shingle and Coating Materials\nManufacturing', '2952', 'Asphalt Felts and Coatings'),
(657, '324191', 'Petroleum Lubricating Oil and Grease\nManufacturing', '2992', 'Lubricating Oils and Greases'),
(658, '324199', 'All Other Petroleum and Coal Products\nManufacturing', '2999', 'Petroleum and Coal Products, Nec'),
(659, '324199', 'All Other Petroleum and Coal Products\nManufacturing', '3312', 'Blast Furnaces and Steel Mills'),
(660, '325110', 'Petrochemical Manufacturing', '2865', 'Cyclic Crudes and Intermediates'),
(661, '325110', 'Petrochemical Manufacturing', '2869', 'Industrial Organic Chemicals, Nec'),
(662, '325120', 'Industrial Gas Manufacturing', '2813', 'Industrial Gases'),
(663, '325120', 'Industrial Gas Manufacturing', '2869', 'Industrial Organic Chemicals, Nec'),
(664, '325130', 'Synthetic Dye and Pigment Manufacturing', '2816', 'Inorganic Pigments'),
(665, '325130', 'Synthetic Dye and Pigment Manufacturing', '2819', 'Industrial Inorganic Chemicals, Nec'),
(666, '325130', 'Synthetic Dye and Pigment Manufacturing', '2865', 'Cyclic Crudes and Intermediates'),
(667, '325180', 'Other Basic Inorganic Chemical\nManufacturing', '2812', 'Alkalies and Chlorine'),
(668, '325180', 'Other Basic Inorganic Chemical\nManufacturing', '2816', 'Inorganic Pigments'),
(669, '325180', 'Other Basic Inorganic Chemical\nManufacturing', '2819', 'Industrial Inorganic Chemicals, Nec'),
(670, '325180', 'Other Basic Inorganic Chemical\nManufacturing', '2869', 'Industrial Organic Chemicals, Nec'),
(671, '325180', 'Other Basic Inorganic Chemical\nManufacturing', '2895', 'Carbon Black'),
(672, '325193', 'Ethyl Alcohol Manufacturing', '2869', 'Industrial Organic Chemicals, Nec'),
(673, '325194', 'Cyclic Crude, Intermediate, and Gum and\nWood Chemical Manufacturing', '2861', 'Gum and Wood Chemicals'),
(674, '325194', 'Cyclic Crude, Intermediate, and Gum and\nWood Chemical Manufacturing', '2865', 'Cyclic Crudes and Intermediates'),
(675, '325194', 'Cyclic Crude, Intermediate, and Gum and\nWood Chemical Manufacturing', '2869', 'Industrial Organic Chemicals, Nec'),
(676, '325199', 'All Other Basic Organic Chemical\nManufacturing', '2869', 'Industrial Organic Chemicals, Nec'),
(677, '325199', 'All Other Basic Organic Chemical\nManufacturing', '2899', 'Chemical Preparations, Nec'),
(678, '325211', 'Plastics Material and Resin Manufacturing', '2821', 'Plastics Materials and Resins'),
(679, '325212', 'Synthetic Rubber Manufacturing', '2822', 'Synthetic Rubber'),
(680, '325220', 'Artificial and Synthetic Fibers and\nFilaments Manufacturing', '2823', 'Cellulosic Manmade Fibers'),
(681, '325220', 'Artificial and Synthetic Fibers and\nFilaments Manufacturing', '2824', 'Organic Fibers, Noncellulosic'),
(682, '325311', 'Nitrogenous Fertilizer Manufacturing', '2873', 'Nitrogenous Fertilizers'),
(683, '325312', 'Phosphatic Fertilizer Manufacturing', '2874', 'Phosphatic Fertilizers'),
(684, '325314', 'Fertilizer (Mixing Only) Manufacturing', '2875', 'Fertilizers, Mixing Only'),
(685, '325320', 'Pesticide and Other Agricultural Chemical\nManufacturing', '2879', 'Agricultural Chemicals, Nec'),
(686, '325411', 'Medicinal and Botanical Manufacturing', '2833', 'Medicinals and Botanicals'),
(687, '325412', 'Pharmaceutical Preparation Manufacturing', '2834', 'Pharmaceutical Preparations'),
(688, '325412', 'Pharmaceutical Preparation Manufacturing', '2835', 'Diagnostic Substances'),
(689, '325413', 'In-Vitro Diagnostic Substance\nManufacturing', '2835', 'Diagnostic Substances'),
(690, '325414', 'Biological Product (except Diagnostic)\nManufacturing', '2836', 'Biological Products, Except Diagnostic'),
(691, '325510', 'Paint and Coating Manufacturing', '2851', 'Paints and Allied Products'),
(692, '325510', 'Paint and Coating Manufacturing', '2899', 'Chemical Preparations, Nec'),
(693, '325520', 'Adhesive Manufacturing', '2891', 'Adhesives and Sealants'),
(694, '325611', 'Soap and Other Detergent Manufacturing', '2841', 'Soap and Other Detergents'),
(695, '325611', 'Soap and Other Detergent Manufacturing', '2844', 'Toilet Preparations'),
(696, '325612', 'Polish and Other Sanitation Good\nManufacturing', '2842', 'Polishes and Sanitation Goods'),
(697, '325613', 'Surface Active Agent Manufacturing', '2843', 'Surface Active Agents'),
(698, '325620', 'Toilet Preparation Manufacturing', '2844', 'Toilet Preparations'),
(699, '325910', 'Printing Ink Manufacturing', '2893', 'Printing Ink'),
(700, '325920', 'Explosives Manufacturing', '2892', 'Explosives'),
(701, '325991', 'Custom Compounding of Purchased\nResins', '3087', 'Custom Compound Purchased Resins'),
(702, '325992', 'Photographic Film, Paper, Plate, and\nChemical Manufacturing', '3861', 'Photographic Equipment and Supplies'),
(703, '325998', 'All Other Miscellaneous Chemical Product\nand Preparation Manufacturing', '2819', 'Industrial Inorganic Chemicals, Nec'),
(704, '325998', 'All Other Miscellaneous Chemical Product\nand Preparation Manufacturing', '2869', 'Industrial Organic Chemicals, Nec'),
(705, '325998', 'All Other Miscellaneous Chemical Product\nand Preparation Manufacturing', '2899', 'Chemical Preparations, Nec'),
(706, '325998', 'All Other Miscellaneous Chemical Product\nand Preparation Manufacturing', '3952', 'Lead Pencils and Art Goods'),
(707, '325998', 'All Other Miscellaneous Chemical Product\nand Preparation Manufacturing', '3999', 'Manufacturing Industries, Nec'),
(708, '325998', 'All Other Miscellaneous Chemical Product\nand Preparation Manufacturing', '7389', 'Business Services, Nec'),
(709, '326111', 'Plastics Bag and Pouch Manufacturing', '2673', 'Bags: Plastic, Laminated, and Coated'),
(710, '326112', 'Plastics Packaging Film and Sheet\n(including Laminated) Manufacturing', '2671', 'Paper; Coated and Laminated Packaging'),
(711, '326113', 'Unlaminated Plastics Film and Sheet\n(except Packaging) Manufacturing', '3081', 'Unsupported Plastics Film and Sheet'),
(712, '326121', 'Unlaminated Plastics Profile Shape\nManufacturing', '3082', 'Unsupported Plastics Profile Shapes'),
(713, '326121', 'Unlaminated Plastics Profile Shape\nManufacturing', '3089', 'Plastics Products, Nec'),
(714, '326122', 'Plastics Pipe and Pipe Fitting\nManufacturing', '3084', 'Plastics Pipe'),
(715, '326122', 'Plastics Pipe and Pipe Fitting\nManufacturing', '3089', 'Plastics Products, Nec'),
(716, '326130', 'Laminated Plastics Plate, Sheet (except\nPackaging), and Shape Manufacturing', '3083', 'Laminated Plastics Plate and Sheet'),
(717, '326140', 'Polystyrene Foam Product Manufacturing', '3086', 'Plastics Foam Products'),
(718, '326150', 'Urethane and Other Foam Product (except\nPolystyrene) Manufacturing', '3086', 'Plastics Foam Products'),
(719, '326160', 'Plastics Bottle Manufacturing', '3085', 'Plastics Bottles'),
(720, '326191', 'Plastics Plumbing Fixture Manufacturing', '3088', 'Plastics Plumbing Fixtures'),
(721, '326199', 'All Other Plastics Product Manufacturing', '3069', 'Fabricated Rubber Products, Nec'),
(722, '326199', 'All Other Plastics Product Manufacturing', '3089', 'Plastics Products, Nec'),
(723, '326199', 'All Other Plastics Product Manufacturing', '3996', 'Hard Surface Floor Coverings, Nec'),
(724, '326199', 'All Other Plastics Product Manufacturing', '3999', 'Manufacturing Industries, Nec'),
(725, '326211', 'Tire Manufacturing (except Retreading)', '3011', 'Tires and Inner Tubes'),
(726, '326212', 'Tire Retreading', '7534', 'Tire Retreading and Repair Shops'),
(727, '326220', 'Rubber and Plastics Hoses and Belting\nManufacturing', '3052', 'Rubber and Plastics Hose and Beltings'),
(728, '326291', 'Rubber Product Manufacturing for\nMechanical Use', '3061', 'Mechanical Rubber Goods'),
(729, '326299', 'All Other Rubber Product Manufacturing', '3061', 'Mechanical Rubber Goods'),
(730, '326299', 'All Other Rubber Product Manufacturing', '3069', 'Fabricated Rubber Products, Nec'),
(731, '327110', 'Pottery, Ceramics, and Plumbing Fixture\nManufacturing', '3261', 'Vitreous Plumbing Fixtures'),
(732, '327110', 'Pottery, Ceramics, and Plumbing Fixture\nManufacturing', '3262', 'Vitreous China Table and Kitchenware'),
(733, '327110', 'Pottery, Ceramics, and Plumbing Fixture\nManufacturing', '3263', 'Semivitreous Table and Kitchenware'),
(734, '327110', 'Pottery, Ceramics, and Plumbing Fixture\nManufacturing', '3264', 'Porcelain Electrical Supplies'),
(735, '327110', 'Pottery, Ceramics, and Plumbing Fixture\nManufacturing', '3269', 'Pottery Products, Nec'),
(736, '327110', 'Pottery, Ceramics, and Plumbing Fixture\nManufacturing', '3299', 'Nonmetallic Mineral Products,'),
(737, '327110', 'Pottery, Ceramics, and Plumbing Fixture\nManufacturing', '5719', 'Miscellaneous Homefurnishings'),
(738, '327120', 'Clay Building Material and Refractories\nManufacturing', '3251', 'Brick and Structural Clay Tile'),
(739, '327120', 'Clay Building Material and Refractories\nManufacturing', '3253', 'Ceramic Wall and Floor Tile'),
(740, '327120', 'Clay Building Material and Refractories\nManufacturing', '3255', 'Clay Refractories'),
(741, '327120', 'Clay Building Material and Refractories\nManufacturing', '3259', 'Structural Clay Products, Nec'),
(742, '327120', 'Clay Building Material and Refractories\nManufacturing', '3297', 'Nonclay Refractories'),
(743, '327211', 'Flat Glass Manufacturing', '3211', 'Flat Glass'),
(744, '327212', 'Other Pressed and Blown Glass and\nGlassware Manufacturing', '3229', 'Pressed and Blown Glass, Nec'),
(745, '327213', 'Glass Container Manufacturing', '3221', 'Glass Containers'),
(746, '327215', 'Glass Product Manufacturing Made of\nPurchased Glass', '3231', 'Products of Purchased Glass'),
(747, '327310', 'Cement Manufacturing', '3241', 'Cement, Hydraulic'),
(748, '327320', 'Ready-Mix Concrete Manufacturing', '3273', 'Ready-mixed Concrete'),
(749, '327331', 'Concrete Block and Brick Manufacturing', '3251', 'Brick and Structural Clay Tile'),
(750, '327331', 'Concrete Block and Brick Manufacturing', '3271', 'Concrete Block and Brick'),
(751, '327332', 'Concrete Pipe Manufacturing', '3272', 'Concrete Products, Nec'),
(752, '327390', 'Other Concrete Product Manufacturing', '3272', 'Concrete Products, Nec'),
(753, '327410', 'Lime Manufacturing', '3274', 'Lime'),
(754, '327420', 'Gypsum Product Manufacturing', '3275', 'Gypsum Products'),
(755, '327420', 'Gypsum Product Manufacturing', '3299', 'Nonmetallic Mineral Products,'),
(756, '327910', 'Abrasive Product Manufacturing', '3291', 'Abrasive Products'),
(757, '327991', 'Cut Stone and Stone Product\nManufacturing', '3281', 'Cut Stone and Stone Products'),
(758, '327992', 'Ground or Treated Mineral and Earth\nManufacturing', '3295', 'Minerals, Ground or Treated'),
(759, '327993', 'Mineral Wool Manufacturing', '3296', 'Mineral Wool'),
(760, '327999', 'All Other Miscellaneous Nonmetallic\nMineral Product Manufacturing', '3272', 'Concrete Products, Nec'),
(761, '327999', 'All Other Miscellaneous Nonmetallic\nMineral Product Manufacturing', '3292', 'Asbestos Products'),
(762, '327999', 'All Other Miscellaneous Nonmetallic\nMineral Product Manufacturing', '3299', 'Nonmetallic Mineral Products,'),
(763, '331110', 'Iron and Steel Mills and Ferroalloy\nManufacturing', '3312', 'Blast Furnaces and Steel Mills'),
(764, '331110', 'Iron and Steel Mills and Ferroalloy\nManufacturing', '3313', 'Electrometallurgical Products'),
(765, '331110', 'Iron and Steel Mills and Ferroalloy\nManufacturing', '3399', 'Primary Metal Products'),
(766, '331210', 'Iron and Steel Pipe and Tube\nManufacturing from Purchased Steel', '3317', 'Steel Pipe and Tubes'),
(767, '331221', 'Rolled Steel Shape Manufacturing', '3312', 'Blast Furnaces and Steel Mills'),
(768, '331221', 'Rolled Steel Shape Manufacturing', '3316', 'Cold Finishing of Steel Shapes'),
(769, '331221', 'Rolled Steel Shape Manufacturing', '3399', 'Primary Metal Products'),
(770, '331222', 'Steel Wire Drawing', '3315', 'Steel Wire and Related Products'),
(771, '331313', 'Alumina Refining and Primary Aluminum\nProduction', '2819', 'Industrial Inorganic Chemicals, Nec'),
(772, '331313', 'Alumina Refining and Primary Aluminum\nProduction', '3334', 'Primary Aluminum'),
(773, '331314', 'Secondary Smelting and Alloying of\nAluminum', '3341', 'Secondary Nonferrous Metals'),
(774, '331314', 'Secondary Smelting and Alloying of\nAluminum', '3399', 'Primary Metal Products'),
(775, '331315', 'Aluminum Sheet, Plate, and Foil\nManufacturing', '3353', 'Aluminum Sheet, Plate, and Foil'),
(776, '331318', 'Other Aluminum Rolling, Drawing, and\nExtruding', '3354', 'Aluminum Extruded Products'),
(777, '331318', 'Other Aluminum Rolling, Drawing, and\nExtruding', '3355', 'Aluminum Rolling and Drawing, Nec'),
(778, '331318', 'Other Aluminum Rolling, Drawing, and\nExtruding', '3357', 'Nonferrous Wiredrawing and Insulating'),
(779, '331410', 'Nonferrous Metal (except Aluminum)\nSmelting and Refining', '3331', 'Primary Copper'),
(780, '331410', 'Nonferrous Metal (except Aluminum)\nSmelting and Refining', '3339', 'Primary Nonferrous Metals, Nec'),
(781, '331420', 'Copper Rolling, Drawing, Extruding, and\nAlloying', '3341', 'Secondary Nonferrous Metals'),
(782, '331420', 'Copper Rolling, Drawing, Extruding, and\nAlloying', '3351', 'Copper Rolling and Drawing'),
(783, '331420', 'Copper Rolling, Drawing, Extruding, and\nAlloying', '3357', 'Nonferrous Wiredrawing and Insulating'),
(784, '331420', 'Copper Rolling, Drawing, Extruding, and\nAlloying', '3399', 'Primary Metal Products'),
(785, '331491', 'Nonferrous Metal (except Copper and\nAluminum) Rolling, Drawing, and Extruding', '3356', 'Nonferrous Rolling and Drawing, Nec'),
(786, '331491', 'Nonferrous Metal (except Copper and\nAluminum) Rolling, Drawing, and Extruding', '3357', 'Nonferrous Wiredrawing and Insulating'),
(787, '331492', 'Secondary Smelting, Refining, and Alloying of Nonferrous Metal (except Copper and\nAluminum)', '3341', 'Secondary Nonferrous Metals'),
(788, '331492', 'Secondary Smelting, Refining, and Alloying of Nonferrous Metal (except Copper and\nAluminum)', '3399', 'Primary Metal Products'),
(789, '331511', 'Iron Foundries', '3321', 'Gray and Ductile Iron Foundries'),
(790, '331511', 'Iron Foundries', '3322', 'Malleable Iron Foundries'),
(791, '331512', 'Steel Investment Foundries', '3324', 'Steel Investment Foundries'),
(792, '331513', 'Steel Foundries (except Investment)', '3325', 'Steel Foundries, Nec'),
(793, '331523', 'Nonferrous Metal Die-Casting Foundries', '3363', 'Aluminum Die-castings'),
(794, '331523', 'Nonferrous Metal Die-Casting Foundries', '3364', 'Nonferrous Die-castings Except Aluminum'),
(795, '331524', 'Aluminum Foundries (except Die-Casting)', '3365', 'Aluminum Foundries'),
(796, '331529', 'Other Nonferrous Metal Foundries (except\nDie-Casting)', '3366', 'Copper Foundries'),
(797, '331529', 'Other Nonferrous Metal Foundries (except\nDie-Casting)', '3369', 'Nonferrous Foundries, Nec'),
(798, '332111', 'Iron and Steel Forging', '3462', 'Iron and Steel Forgings'),
(799, '332112', 'Nonferrous Forging', '3463', 'Nonferrous Forgings'),
(800, '332114', 'Custom Roll Forming', '3449', 'Miscellaneous Metalwork'),
(801, '332117', 'Powder Metallurgy Part Manufacturing', '3499', 'Fabricated Metal Products, Nec'),
(802, '332119', 'Metal Crown, Closure, and Other Metal\nStamping (except Automotive)', '3466', 'Crowns and Closures'),
(803, '332119', 'Metal Crown, Closure, and Other Metal\nStamping (except Automotive)', '3469', 'Metal Stampings, Nec'),
(804, '332215', 'Metal Kitchen Cookware, Utensil, Cutlery, and Flatware (except Precious)\nManufacturing', '3421', 'Cutlery'),
(805, '332215', 'Metal Kitchen Cookware, Utensil, Cutlery, and Flatware (except Precious)\nManufacturing', '3469', 'Metal Stampings, Nec'),
(806, '332215', 'Metal Kitchen Cookware, Utensil, Cutlery, and Flatware (except Precious)\nManufacturing', '3496', 'Miscellaneous Fabricated Wire Products'),
(807, '332215', 'Metal Kitchen Cookware, Utensil, Cutlery, and Flatware (except Precious)\nManufacturing', '3914', 'Silverware and Plated Ware'),
(808, '332215', 'Metal Kitchen Cookware, Utensil, Cutlery, and Flatware (except Precious)\nManufacturing', '3999', 'Manufacturing Industries, Nec'),
(809, '332216', 'Saw Blade and Handtool Manufacturing', '3421', 'Cutlery'),
(810, '332216', 'Saw Blade and Handtool Manufacturing', '3423', 'Hand and Edge Tools, Nec'),
(811, '332216', 'Saw Blade and Handtool Manufacturing', '3425', 'Saw Blades and Handsaws'),
(812, '332216', 'Saw Blade and Handtool Manufacturing', '3523', 'Farm Machinery and Equipment'),
(813, '332216', 'Saw Blade and Handtool Manufacturing', '3524', 'Lawn and Garden Equipment'),
(814, '332216', 'Saw Blade and Handtool Manufacturing', '3545', 'Machine Tool Accessories'),
(815, '332216', 'Saw Blade and Handtool Manufacturing', '3644', 'Noncurrent-carrying Wiring Devices'),
(816, '332216', 'Saw Blade and Handtool Manufacturing', '3999', 'Manufacturing Industries, Nec'),
(817, '332311', 'Prefabricated Metal Building and\nComponent Manufacturing', '3448', 'Prefabricated Metal Buildings'),
(818, '332312', 'Fabricated Structural Metal Manufacturing', '3441', 'Fabricated Structural Metal'),
(819, '332312', 'Fabricated Structural Metal Manufacturing', '3449', 'Miscellaneous Metalwork'),
(820, '332313', 'Plate Work Manufacturing', '3443', 'Fabricated Plate Work (boiler Shop)'),
(821, '332321', 'Metal Window and Door Manufacturing', '3442', 'Metal Doors, Sash, and Trim'),
(822, '332321', 'Metal Window and Door Manufacturing', '3444', 'Sheet Metalwork'),
(823, '332322', 'Sheet Metal Work Manufacturing', '3444', 'Sheet Metalwork'),
(824, '332323', 'Ornamental and Architectural Metal Work\nManufacturing', '3446', 'Architectural Metalwork'),
(825, '332323', 'Ornamental and Architectural Metal Work\nManufacturing', '3449', 'Miscellaneous Metalwork'),
(826, '332323', 'Ornamental and Architectural Metal Work\nManufacturing', '3523', 'Farm Machinery and Equipment'),
(827, '332410', 'Power Boiler and Heat Exchanger\nManufacturing', '3443', 'Fabricated Plate Work (boiler Shop)'),
(828, '332410', 'Power Boiler and Heat Exchanger\nManufacturing', '3559', 'Special Industry Machinery, Nec'),
(829, '332420', 'Metal Tank (Heavy Gauge) Manufacturing', '3443', 'Fabricated Plate Work (boiler Shop)'),
(830, '332431', 'Metal Can Manufacturing', '3411', 'Metal Cans'),
(831, '332439', 'Other Metal Container Manufacturing', '3412', 'Metal Barrels, Drums, and Pails'),
(832, '332439', 'Other Metal Container Manufacturing', '3429', 'Hardware, Nec'),
(833, '332439', 'Other Metal Container Manufacturing', '3444', 'Sheet Metalwork'),
(834, '332439', 'Other Metal Container Manufacturing', '3469', 'Metal Stampings, Nec'),
(835, '332439', 'Other Metal Container Manufacturing', '3499', 'Fabricated Metal Products, Nec'),
(836, '332439', 'Other Metal Container Manufacturing', '3537', 'Industrial Trucks and Tractors'),
(837, '332510', 'Hardware Manufacturing', '3429', 'Hardware, Nec'),
(838, '332510', 'Hardware Manufacturing', '3499', 'Fabricated Metal Products, Nec'),
(839, '332613', 'Spring Manufacturing', '3493', 'Steel Springs, Except Wire'),
(840, '332613', 'Spring Manufacturing', '3495', 'Wire Springs'),
(841, '332618', 'Other Fabricated Wire Product\nManufacturing', '3315', 'Steel Wire and Related Products'),
(842, '332618', 'Other Fabricated Wire Product\nManufacturing', '3399', 'Primary Metal Products'),
(843, '332618', 'Other Fabricated Wire Product\nManufacturing', '3496', 'Miscellaneous Fabricated Wire Products'),
(844, '332710', 'Machine Shops', '3599', 'Industrial Machinery, Nec'),
(845, '332721', 'Precision Turned Product Manufacturing', '3451', 'Screw Machine Products'),
(846, '332722', 'Bolt, Nut, Screw, Rivet, and Washer\nManufacturing', '3429', 'Hardware, Nec'),
(847, '332722', 'Bolt, Nut, Screw, Rivet, and Washer\nManufacturing', '3452', 'Bolts, Nuts, Rivets, and Washers'),
(848, '332811', 'Metal Heat Treating', '3398', 'Metal Heat Treating'),
(849, '332812', 'Metal Coating, Engraving (except Jewelry\nand Silverware), and Allied Services to Manufacturers', '3479', 'Metal Coating and Allied Services'),
(850, '332812', 'Metal Coating, Engraving (except Jewelry and Silverware), and Allied Services to\nManufacturers', '3999', 'Manufacturing Industries, Nec'),
(851, '332813', 'Electroplating, Plating, Polishing,\nAnodizing, and Coloring', '3399', 'Primary Metal Products'),
(852, '332813', 'Electroplating, Plating, Polishing,\nAnodizing, and Coloring', '3471', 'Plating and Polishing'),
(853, '332813', 'Electroplating, Plating, Polishing,\nAnodizing, and Coloring', '3599', 'Industrial Machinery, Nec'),
(854, '332911', 'Industrial Valve Manufacturing', '3491', 'Industrial Valves'),
(855, '332912', 'Fluid Power Valve and Hose Fitting\nManufacturing', '3492', 'Fluid Power Valves and Hose Fittings'),
(856, '332912', 'Fluid Power Valve and Hose Fitting\nManufacturing', '3728', 'Aircraft Parts and Equipment, Nec'),
(857, '332913', 'Plumbing Fixture Fitting and Trim\nManufacturing', '3432', 'Plumbing Fixture Fittings and Trim'),
(858, '332919', 'Other Metal Valve and Pipe Fitting\nManufacturing', '3429', 'Hardware, Nec'),
(859, '332919', 'Other Metal Valve and Pipe Fitting\nManufacturing', '3432', 'Plumbing Fixture Fittings and Trim'),
(860, '332919', 'Other Metal Valve and Pipe Fitting\nManufacturing', '3494', 'Valves and Pipe Fittings, Nec'),
(861, '332919', 'Other Metal Valve and Pipe Fitting\nManufacturing', '3499', 'Fabricated Metal Products, Nec'),
(862, '332991', 'Ball and Roller Bearing Manufacturing', '3562', 'Ball and Roller Bearings'),
(863, '332992', 'Small Arms Ammunition Manufacturing', '3482', 'Small Arms Ammunition'),
(864, '332993', 'Ammunition (except Small Arms)\nManufacturing', '3483', 'Ammunition, Except For Small Arms, Nec'),
(865, '332994', 'Small Arms, Ordnance, and Ordnance\nAccessories Manufacturing', '3484', 'Small Arms'),
(866, '332994', 'Small Arms, Ordnance, and Ordnance\nAccessories Manufacturing', '3489', 'Ordnance and Accessories, Nec'),
(867, '332994', 'Small Arms, Ordnance, and Ordnance\nAccessories Manufacturing', '3841', 'Surgical and Medical Instruments'),
(868, '332996', 'Fabricated Pipe and Pipe Fitting\nManufacturing', '3498', 'Fabricated Pipe and Fittings'),
(869, '332999', 'All Other Miscellaneous Fabricated Metal\nProduct Manufacturing', '3291', 'Abrasive Products'),
(870, '332999', 'All Other Miscellaneous Fabricated Metal\nProduct Manufacturing', '3429', 'Hardware, Nec'),
(871, '332999', 'All Other Miscellaneous Fabricated Metal\nProduct Manufacturing', '3431', 'Metal Sanitary Ware'),
(872, '332999', 'All Other Miscellaneous Fabricated Metal\nProduct Manufacturing', '3432', 'Plumbing Fixture Fittings and Trim'),
(873, '332999', 'All Other Miscellaneous Fabricated Metal\nProduct Manufacturing', '3494', 'Valves and Pipe Fittings, Nec'),
(874, '332999', 'All Other Miscellaneous Fabricated Metal\nProduct Manufacturing', '3497', 'Metal Foil and Leaf'),
(875, '332999', 'All Other Miscellaneous Fabricated Metal\nProduct Manufacturing', '3499', 'Fabricated Metal Products, Nec'),
(876, '332999', 'All Other Miscellaneous Fabricated Metal\nProduct Manufacturing', '3537', 'Industrial Trucks and Tractors'),
(877, '332999', 'All Other Miscellaneous Fabricated Metal\nProduct Manufacturing', '3543', 'Industrial Patterns'),
(878, '332999', 'All Other Miscellaneous Fabricated Metal\nProduct Manufacturing', '3599', 'Industrial Machinery, Nec'),
(879, '332999', 'All Other Miscellaneous Fabricated Metal\nProduct Manufacturing', '3914', 'Silverware and Plated Ware'),
(880, '332999', 'All Other Miscellaneous Fabricated Metal\nProduct Manufacturing', '3999', 'Manufacturing Industries, Nec'),
(881, '333111', 'Farm Machinery and Equipment\nManufacturing', '3523', 'Farm Machinery and Equipment'),
(882, '333111', 'Farm Machinery and Equipment\nManufacturing', '3559', 'Special Industry Machinery, Nec'),
(883, '333112', 'Lawn and Garden Tractor and Home Lawn\nand Garden Equipment Manufacturing', '3524', 'Lawn and Garden Equipment'),
(884, '333120', 'Construction Machinery Manufacturing', '3531', 'Construction Machinery'),
(885, '333131', 'Mining Machinery and Equipment\nManufacturing', '3532', 'Mining Machinery'),
(886, '333132', 'Oil and Gas Field Machinery and\nEquipment Manufacturing', '3533', 'Oil and Gas Field Machinery'),
(887, '333241', 'Food Product Machinery Manufacturing', '3556', 'Food Products Machinery'),
(888, '333242', 'Semiconductor Machinery Manufacturing', '3559', 'Special Industry Machinery, Nec'),
(889, '333243', 'Sawmill, Woodworking, and Paper\nMachinery Manufacturing', '3553', 'Woodworking Machinery'),
(890, '333243', 'Sawmill, Woodworking, and Paper\nMachinery Manufacturing', '3554', 'Paper Industries Machinery'),
(891, '333244', 'Printing Machinery and Equipment\nManufacturing', '3555', 'Printing Trades Machinery'),
(892, '333249', 'Other Industrial Machinery Manufacturing', '2599', 'Furniture and Fixtures, Nec'),
(893, '333249', 'Other Industrial Machinery Manufacturing', '3552', 'Textile Machinery'),
(894, '333249', 'Other Industrial Machinery Manufacturing', '3559', 'Special Industry Machinery, Nec'),
(895, '333249', 'Other Industrial Machinery Manufacturing', '3559', 'Special Industry Machinery, Nec'),
(896, '333249', 'Other Industrial Machinery Manufacturing', '3639', 'Household Appliances, Nec'),
(897, '333249', 'Other Industrial Machinery Manufacturing', '3821', 'Laboratory Apparatus and Furniture'),
(898, '333249', 'Other Industrial Machinery Manufacturing', '3841', 'Surgical and Medical Instruments'),
(899, '333314', 'Optical Instrument and Lens Manufacturing', '3827', 'Optical Instruments and Lenses'),
(900, '333316', 'Photographic and Photocopying Equipment\nManufacturing', '3577', 'Computer Peripheral Equipment, Nec'),
(901, '333316', 'Photographic and Photocopying Equipment\nManufacturing', '3578', 'Calculating and Accounting Equipment'),
(902, '333316', 'Photographic and Photocopying Equipment\nManufacturing', '3861', 'Photographic Equipment and Supplies'),
(903, '333318', 'Other Commercial and Service Industry\nMachinery Manufacturing', '3559', 'Special Industry Machinery, Nec'),
(904, '333318', 'Other Commercial and Service Industry\nMachinery Manufacturing', '3578', 'Calculating and Accounting Equipment'),
(905, '333318', 'Other Commercial and Service Industry\nMachinery Manufacturing', '3578', 'Calculating and Accounting Equipment'),
(906, '333318', 'Other Commercial and Service Industry\nMachinery Manufacturing', '3579', 'Office Machines, Nec'),
(907, '333318', 'Other Commercial and Service Industry\nMachinery Manufacturing', '3581', 'Automatic Vending Machines'),
(908, '333318', 'Other Commercial and Service Industry\nMachinery Manufacturing', '3582', 'Commercial Laundry Equipment'),
(909, '333318', 'Other Commercial and Service Industry\nMachinery Manufacturing', '3589', 'Service Industry Machinery, Nec'),
(910, '333318', 'Other Commercial and Service Industry\nMachinery Manufacturing', '3599', 'Industrial Machinery, Nec'),
(911, '333318', 'Other Commercial and Service Industry\nMachinery Manufacturing', '3699', 'Electrical Equipment and Supplies, Nec'),
(912, '333318', 'Other Commercial and Service Industry\nMachinery Manufacturing', '3999', 'Manufacturing Industries, Nec'),
(913, '333413', 'Industrial and Commercial Fan and Blower\nand Air Purification Equipment Manufacturing', '3564', 'Blowers and Fans'),
(914, '333413', 'Industrial and Commercial Fan and Blower\nand Air Purification Equipment Manufacturing', '3564', 'Blowers and Fans'),
(915, '333414', 'Heating Equipment (except Warm Air\nFurnaces) Manufacturing', '3433', 'Heating Equipment, Except Electric'),
(916, '333414', 'Heating Equipment (except Warm Air\nFurnaces) Manufacturing', '3569', 'General Industrial Machinery,'),
(917, '333414', 'Heating Equipment (except Warm Air\nFurnaces) Manufacturing', '3634', 'Electric Housewares and Fans'),
(918, '333415', 'Air-Conditioning and Warm Air Heating\nEquipment and Commercial and Industrial Refrigeration Equipment Manufacturing', '2499', 'Wood Products, Nec'),
(919, '333415', 'Air-Conditioning and Warm Air Heating Equipment and Commercial and Industrial\nRefrigeration Equipment Manufacturing', '2599', 'Furniture and Fixtures, Nec'),
(920, '333415', 'Air-Conditioning and Warm Air Heating Equipment and Commercial and Industrial\nRefrigeration Equipment Manufacturing', '3443', 'Fabricated Plate Work (boiler Shop)'),
(921, '333415', 'Air-Conditioning and Warm Air Heating Equipment and Commercial and Industrial\nRefrigeration Equipment Manufacturing', '3444', 'Sheet Metalwork'),
(922, '333415', 'Air-Conditioning and Warm Air Heating Equipment and Commercial and Industrial\nRefrigeration Equipment Manufacturing', '3585', 'Refrigeration and Heating Equipment'),
(923, '333415', 'Air-Conditioning and Warm Air Heating Equipment and Commercial and Industrial\nRefrigeration Equipment Manufacturing', '3821', 'Laboratory Apparatus and Furniture'),
(924, '333415', 'Air-Conditioning and Warm Air Heating Equipment and Commercial and Industrial\nRefrigeration Equipment Manufacturing', '3841', 'Surgical and Medical Instruments'),
(925, '333511', 'Industrial Mold Manufacturing', '3544', 'Special Dies, Tools, Jigs, and Fixtures'),
(926, '333514', 'Special Die and Tool, Die Set, Jig, and\nFixture Manufacturing', '3544', 'Special Dies, Tools, Jigs, and Fixtures'),
(927, '333515', 'Cutting Tool and Machine Tool Accessory\nManufacturing', '3545', 'Machine Tool Accessories'),
(928, '333517', 'Machine Tool Manufacturing', '3541', 'Machine Tools, Metal Cutting Type'),
(929, '333517', 'Machine Tool Manufacturing', '3542', 'Machine Tools, Metal Forming Type'),
(930, '333519', 'Rolling Mill and Other Metalworking\nMachinery Manufacturing', '3547', 'Rolling Mill Machinery'),
(931, '333519', 'Rolling Mill and Other Metalworking\nMachinery Manufacturing', '3549', 'Metalworking Machinery, Nec'),
(932, '333611', 'Turbine and Turbine Generator Set Units\nManufacturing', '3511', 'Turbines and Turbine Generator Sets'),
(933, '333612', 'Speed Changer, Industrial High-Speed\nDrive, and Gear Manufacturing', '3566', 'Speed Changers, Drives, and Gears'),
(934, '333613', 'Mechanical Power Transmission\nEquipment Manufacturing', '3568', 'Power Transmission Equipment, Nec'),
(935, '333618', 'Other Engine Equipment Manufacturing', '3519', 'Internal Combustion Engines, Nec'),
(936, '333618', 'Other Engine Equipment Manufacturing', '3699', 'Electrical Equipment and Supplies, Nec'),
(937, '333912', 'Air and Gas Compressor Manufacturing', '3563', 'Air and Gas Compressors'),
(938, '333914', 'Measuring, Dispensing, and Other Pumping\nEquipment Manufacturing', '3561', 'Pumps and Pumping Equipment'),
(939, '333914', 'Measuring, Dispensing, and Other Pumping\nEquipment Manufacturing', '3586', 'Measuring and Dispensing Pumps'),
(940, '333914', 'Measuring, Dispensing, and Other Pumping\nEquipment Manufacturing', '3743', 'Railroad Equipment'),
(941, '333921', 'Elevator and Moving Stairway\nManufacturing', '3534', 'Elevators and Moving Stairways'),
(942, '333922', 'Conveyor and Conveying Equipment\nManufacturing', '3523', 'Farm Machinery and Equipment'),
(943, '333922', 'Conveyor and Conveying Equipment\nManufacturing', '3535', 'Conveyors and Conveying Equipment'),
(944, '333923', 'Overhead Traveling Crane, Hoist, and\nMonorail System Manufacturing', '3429', 'Hardware, Nec'),
(945, '333923', 'Overhead Traveling Crane, Hoist, and\nMonorail System Manufacturing', '3531', 'Construction Machinery'),
(946, '333923', 'Overhead Traveling Crane, Hoist, and\nMonorail System Manufacturing', '3536', 'Hoists, Cranes, and Monorails'),
(947, '333924', 'Industrial Truck, Tractor, Trailer, and\nStacker Machinery Manufacturing', '3496', 'Miscellaneous Fabricated Wire Products'),
(948, '333924', 'Industrial Truck, Tractor, Trailer, and\nStacker Machinery Manufacturing', '3537', 'Industrial Trucks and Tractors'),
(949, '333924', 'Industrial Truck, Tractor, Trailer, and\nStacker Machinery Manufacturing', '3799', 'Transportation Equipment, Nec'),
(950, '333991', 'Power-Driven Handtool Manufacturing', '3546', 'Power-driven Handtools'),
(951, '333992', 'Welding and Soldering Equipment\nManufacturing', '3548', 'Welding Apparatus'),
(952, '333992', 'Welding and Soldering Equipment\nManufacturing', '3699', 'Electrical Equipment and Supplies, Nec'),
(953, '333993', 'Packaging Machinery Manufacturing', '3565', 'Packaging Machinery'),
(954, '333994', 'Industrial Process Furnace and Oven\nManufacturing', '2599', 'Furniture and Fixtures, Nec'),
(955, '333994', 'Industrial Process Furnace and Oven\nManufacturing', '3567', 'Industrial Furnaces and Ovens'),
(956, '333994', 'Industrial Process Furnace and Oven\nManufacturing', '3821', 'Laboratory Apparatus and Furniture'),
(957, '333994', 'Industrial Process Furnace and Oven\nManufacturing', '3841', 'Surgical and Medical Instruments'),
(958, '333995', 'Fluid Power Cylinder and Actuator\nManufacturing', '3593', 'Fluid Power Cylinders and Actuators'),
(959, '333996', 'Fluid Power Pump and Motor\nManufacturing', '3594', 'Fluid Power Pumps and Motors'),
(960, '333997', 'Scale and Balance Manufacturing', '2599', 'Furniture and Fixtures, Nec'),
(961, '333997', 'Scale and Balance Manufacturing', '3596', 'Scales and Balances, Except Laboratory'),
(962, '333997', 'Scale and Balance Manufacturing', '3821', 'Laboratory Apparatus and Furniture'),
(963, '333997', 'Scale and Balance Manufacturing', '3841', 'Surgical and Medical Instruments'),
(964, '333999', 'All Other Miscellaneous General Purpose\nMachinery Manufacturing', '2599', 'Furniture and Fixtures, Nec'),
(965, '333999', 'All Other Miscellaneous General Purpose\nMachinery Manufacturing', '3569', 'General Industrial Machinery,'),
(966, '333999', 'All Other Miscellaneous General Purpose\nMachinery Manufacturing', '3599', 'Industrial Machinery, Nec'),
(967, '333999', 'All Other Miscellaneous General Purpose\nMachinery Manufacturing', '3821', 'Laboratory Apparatus and Furniture'),
(968, '333999', 'All Other Miscellaneous General Purpose\nMachinery Manufacturing', '3841', 'Surgical and Medical Instruments'),
(969, '334111', 'Electronic Computer Manufacturing', '3571', 'Electronic Computers'),
(970, '334112', 'Computer Storage Device Manufacturing', '3572', 'Computer Storage Devices'),
(971, '334118', 'Computer Terminal and Other Computer\nPeripheral Equipment Manufacturing', '3575', 'Computer Terminals'),
(972, '334118', 'Computer Terminal and Other Computer\nPeripheral Equipment Manufacturing', '3577', 'Computer Peripheral Equipment, Nec'),
(973, '334118', 'Computer Terminal and Other Computer\nPeripheral Equipment Manufacturing', '3578', 'Calculating and Accounting Equipment'),
(974, '334210', 'Telephone Apparatus Manufacturing', '3661', 'Telephone and Telegraph Apparatus'),
(975, '334220', 'Radio and Television Broadcasting and Wireless Communications Equipment\nManufacturing', '3663', 'Radio and T.v. Communications Equipment'),
(976, '334220', 'Radio and Television Broadcasting and Wireless Communications Equipment\nManufacturing', '3679', 'Electronic Components, Nec'),
(977, '334290', 'Other Communications Equipment\nManufacturing', '3669', 'Communications Equipment, Nec'),
(978, '334310', 'Audio and Video Equipment Manufacturing', '3651', 'Household Audio and Video Equipment'),
(979, '334310', 'Audio and Video Equipment Manufacturing', '3679', 'Electronic Components, Nec'),
(980, '334412', 'Bare Printed Circuit Board Manufacturing', '3672', 'Printed Circuit Boards'),
(981, '334413', 'Semiconductor and Related Device\nManufacturing', '3674', 'Semiconductors and Related Devices'),
(982, '334416', 'Capacitor, Resistor, Coil, Transformer, and\nOther Inductor Manufacturing', '3675', 'Electronic Capacitors'),
(983, '334416', 'Capacitor, Resistor, Coil, Transformer, and\nOther Inductor Manufacturing', '3676', 'Electronic Resistors'),
(984, '334416', 'Capacitor, Resistor, Coil, Transformer, and\nOther Inductor Manufacturing', '3677', 'Electronic Coils and Transformers'),
(985, '334417', 'Electronic Connector Manufacturing', '3678', 'Electronic Connectors'),
(986, '334418', 'Printed Circuit Assembly (Electronic\nAssembly) Manufacturing', '3577', 'Computer Peripheral Equipment, Nec'),
(987, '334418', 'Printed Circuit Assembly (Electronic\nAssembly) Manufacturing', '3661', 'Telephone and Telegraph Apparatus'),
(988, '334418', 'Printed Circuit Assembly (Electronic\nAssembly) Manufacturing', '3679', 'Electronic Components, Nec'),
(989, '334419', 'Other Electronic Component Manufacturing', '3671', 'Electron Tubes'),
(990, '334419', 'Other Electronic Component Manufacturing', '3679', 'Electronic Components, Nec'),
(991, '334510', 'Electromedical and Electrotherapeutic\nApparatus Manufacturing', '3842', 'Surgical Appliances and Supplies'),
(992, '334510', 'Electromedical and Electrotherapeutic\nApparatus Manufacturing', '3845', 'Electromedical Equipment'),
(993, '334511', 'Search, Detection, Navigation, Guidance,\nAeronautical, and Nautical System and Instrument Manufacturing', '3812', 'Search and Navigation Equipment'),
(994, '334512', 'Automatic Environmental Control\nManufacturing for Residential, Commercial, and Appliance Use', '3822', 'Environmental Controls'),
(995, '334513', 'Instruments and Related Products Manufacturing for Measuring, Displaying, and Controlling Industrial Process Variables', '3823', 'Process Control Instruments'),
(996, '334514', 'Totalizing Fluid Meter and Counting Device\nManufacturing', '3824', 'Fluid Meters and Counting Devices'),
(997, '334514', 'Totalizing Fluid Meter and Counting Device\nManufacturing', '3825', 'Instruments To Measure Electricity'),
(998, '334514', 'Totalizing Fluid Meter and Counting Device\nManufacturing', '3829', 'Measuring and Controlling Devices, Nec'),
(999, '334515', 'Instrument Manufacturing for Measuring and Testing Electricity and Electrical\nSignals', '3663', 'Radio and T.v. Communications Equipment'),
(1000, '334515', 'Instrument Manufacturing for Measuring and Testing Electricity and Electrical\nSignals', '3679', 'Electronic Components, Nec'),
(1001, '334515', 'Instrument Manufacturing for Measuring\nand Testing Electricity and Electrical Signals', '3825', 'Instruments To Measure Electricity'),
(1002, '334516', 'Analytical Laboratory Instrument\nManufacturing', '3826', 'Analytical Instruments'),
(1003, '334517', 'Irradiation Apparatus Manufacturing', '3844', 'X-ray Apparatus and Tubes'),
(1004, '334517', 'Irradiation Apparatus Manufacturing', '3845', 'Electromedical Equipment'),
(1005, '334519', 'Other Measuring and Controlling Device\nManufacturing', '3429', 'Hardware, Nec'),
(1006, '334519', 'Other Measuring and Controlling Device\nManufacturing', '3495', 'Wire Springs'),
(1007, '334519', 'Other Measuring and Controlling Device\nManufacturing', '3579', 'Office Machines, Nec'),
(1008, '334519', 'Other Measuring and Controlling Device\nManufacturing', '3599', 'Industrial Machinery, Nec'),
(1009, '334519', 'Other Measuring and Controlling Device\nManufacturing', '3829', 'Measuring and Controlling Devices, Nec'),
(1010, '334519', 'Other Measuring and Controlling Device\nManufacturing', '3829', 'Measuring and Controlling Devices, Nec'),
(1011, '334519', 'Other Measuring and Controlling Device\nManufacturing', '3873', 'Watches, Clocks, Watchcases, and Parts'),
(1012, '334519', 'Other Measuring and Controlling Device\nManufacturing', '3915', 'Jewelers\' Materials and Lapidary Work'),
(1013, '334613', 'Blank Magnetic and Optical Recording\nMedia Manufacturing', '3577', 'Computer Peripheral Equipment, Nec'),
(1014, '334613', 'Blank Magnetic and Optical Recording\nMedia Manufacturing', '3695', 'Magnetic and Optical Recording Media'),
(1015, '334614', 'Software and Other Prerecorded Compact\nDisc, Tape, and Record Reproducing', '3652', 'Prerecorded Records and Tapes'),
(1016, '334614', 'Software and Other Prerecorded Compact\nDisc, Tape, and Record Reproducing', '7372', 'Prepackaged Software'),
(1017, '334614', 'Software and Other Prerecorded Compact\nDisc, Tape, and Record Reproducing', '7819', 'Services Allied To Motion Pictures'),
(1018, '335110', 'Electric Lamp Bulb and Part Manufacturing', '3641', 'Electric Lamps'),
(1019, '335121', 'Residential Electric Lighting Fixture\nManufacturing', '3645', 'Residential Lighting Fixtures'),
(1020, '335121', 'Residential Electric Lighting Fixture\nManufacturing', '3999', 'Manufacturing Industries, Nec');
INSERT INTO `naics` (`id`, `naics_code`, `description`, `sic_code`, `ins`) VALUES
(1021, '335122', 'Commercial, Industrial, and Institutional\nElectric Lighting Fixture Manufacturing', '3646', 'Commercial Lighting Fixtures'),
(1022, '335129', 'Other Lighting Equipment Manufacturing', '3648', 'Lighting Equipment, Nec'),
(1023, '335129', 'Other Lighting Equipment Manufacturing', '3699', 'Electrical Equipment and Supplies, Nec'),
(1024, '335210', 'Small Electrical Appliance Manufacturing', '3634', 'Electric Housewares and Fans'),
(1025, '335210', 'Small Electrical Appliance Manufacturing', '3635', 'Household Vacuum Cleaners'),
(1026, '335210', 'Small Electrical Appliance Manufacturing', '3639', 'Household Appliances, Nec'),
(1027, '335210', 'Small Electrical Appliance Manufacturing', '3999', 'Manufacturing Industries, Nec'),
(1028, '335220', 'Major Household Appliance Manufacturing', '3631', 'Household Cooking Equipment'),
(1029, '335220', 'Major Household Appliance Manufacturing', '3632', 'Household Refrigerators and Freezers'),
(1030, '335220', 'Major Household Appliance Manufacturing', '3633', 'Household Laundry Equipment'),
(1031, '335220', 'Major Household Appliance Manufacturing', '3639', 'Household Appliances, Nec'),
(1032, '335311', 'Power, Distribution, and Specialty\nTransformer Manufacturing', '3548', 'Welding Apparatus'),
(1033, '335311', 'Power, Distribution, and Specialty\nTransformer Manufacturing', '3612', 'Power, Distribution and Specialty\nTransformers'),
(1034, '335312', 'Motor and Generator Manufacturing', '3621', 'Motors and Generators'),
(1035, '335312', 'Motor and Generator Manufacturing', '7694', 'Armature Rewinding Shops'),
(1036, '335313', 'Switchgear and Switchboard Apparatus\nManufacturing', '3613', 'Switchgear and Switchboard Apparatus'),
(1037, '335314', 'Relay and Industrial Control Manufacturing', '3625', 'Relays and Industrial Controls'),
(1038, '335911', 'Storage Battery Manufacturing', '3691', 'Storage Batteries'),
(1039, '335912', 'Primary Battery Manufacturing', '3692', 'Primary Batteries, Dry and Wet'),
(1040, '335921', 'Fiber Optic Cable Manufacturing', '3357', 'Nonferrous Wiredrawing and Insulating'),
(1041, '335929', 'Other Communication and Energy Wire\nManufacturing', '3357', 'Nonferrous Wiredrawing and Insulating'),
(1042, '335931', 'Current-Carrying Wiring Device\nManufacturing', '3643', 'Current-carrying Wiring Devices'),
(1043, '335932', 'Noncurrent-Carrying Wiring Device\nManufacturing', '3644', 'Noncurrent-carrying Wiring Devices'),
(1044, '335991', 'Carbon and Graphite Product\nManufacturing', '3624', 'Carbon and Graphite Products'),
(1045, '335999', 'All Other Miscellaneous Electrical\nEquipment and Component Manufacturing', '3629', 'Electrical Industrial Apparatus'),
(1046, '335999', 'All Other Miscellaneous Electrical\nEquipment and Component Manufacturing', '3699', 'Electrical Equipment and Supplies, Nec'),
(1047, '336111', 'Automobile Manufacturing', '3711', 'Motor Vehicles and Car Bodies'),
(1048, '336112', 'Light Truck and Utility Vehicle\nManufacturing', '3711', 'Motor Vehicles and Car Bodies'),
(1049, '336120', 'Heavy Duty Truck Manufacturing', '3711', 'Motor Vehicles and Car Bodies'),
(1050, '336211', 'Motor Vehicle Body Manufacturing', '3711', 'Motor Vehicles and Car Bodies'),
(1051, '336211', 'Motor Vehicle Body Manufacturing', '3713', 'Truck and Bus Bodies'),
(1052, '336211', 'Motor Vehicle Body Manufacturing', '3714', 'Motor Vehicle Parts and Accessories'),
(1053, '336212', 'Truck Trailer Manufacturing', '3715', 'Truck Trailers'),
(1054, '336213', 'Motor Home Manufacturing', '3716', 'Motor Homes'),
(1055, '336214', 'Travel Trailer and Camper Manufacturing', '3792', 'Travel Trailers and Campers'),
(1056, '336214', 'Travel Trailer and Camper Manufacturing', '3799', 'Transportation Equipment, Nec'),
(1057, '336310', 'Motor Vehicle Gasoline Engine and Engine\nParts Manufacturing', '3592', 'Carburetors, Pistons, Rings, Valves'),
(1058, '336310', 'Motor Vehicle Gasoline Engine and Engine\nParts Manufacturing', '3714', 'Motor Vehicle Parts and Accessories'),
(1059, '336320', 'Motor Vehicle Electrical and Electronic\nEquipment Manufacturing', '3647', 'Vehicular Lighting Equipment'),
(1060, '336320', 'Motor Vehicle Electrical and Electronic\nEquipment Manufacturing', '3694', 'Engine Electrical Equipment'),
(1061, '336320', 'Motor Vehicle Electrical and Electronic\nEquipment Manufacturing', '3714', 'Motor Vehicle Parts and Accessories'),
(1062, '336330', 'Motor Vehicle Steering and Suspension Components (except Spring) Manufacturing', '3714', 'Motor Vehicle Parts and Accessories'),
(1063, '336340', 'Motor Vehicle Brake System Manufacturing', '3292', 'Asbestos Products'),
(1064, '336340', 'Motor Vehicle Brake System Manufacturing', '3714', 'Motor Vehicle Parts and Accessories'),
(1065, '336350', 'Motor Vehicle Transmission and Power\nTrain Parts Manufacturing', '3292', 'Asbestos Products'),
(1066, '336350', 'Motor Vehicle Transmission and Power\nTrain Parts Manufacturing', '3714', 'Motor Vehicle Parts and Accessories'),
(1067, '336360', 'Motor Vehicle Seating and Interior Trim\nManufacturing', '2396', 'Automotive and Apparel Trimmings'),
(1068, '336360', 'Motor Vehicle Seating and Interior Trim\nManufacturing', '2399', 'Fabricated Textile Products, Nec'),
(1069, '336360', 'Motor Vehicle Seating and Interior Trim\nManufacturing', '2531', 'Public Building and Related Furniture'),
(1070, '336360', 'Motor Vehicle Seating and Interior Trim\nManufacturing', '3499', 'Fabricated Metal Products, Nec'),
(1071, '336370', 'Motor Vehicle Metal Stamping', '3465', 'Automotive Stampings'),
(1072, '336390', 'Other Motor Vehicle Parts Manufacturing', '3429', 'Hardware, Nec'),
(1073, '336390', 'Other Motor Vehicle Parts Manufacturing', '3519', 'Internal Combustion Engines, Nec'),
(1074, '336390', 'Other Motor Vehicle Parts Manufacturing', '3585', 'Refrigeration and Heating Equipment'),
(1075, '336390', 'Other Motor Vehicle Parts Manufacturing', '3599', 'Industrial Machinery, Nec'),
(1076, '336390', 'Other Motor Vehicle Parts Manufacturing', '3714', 'Motor Vehicle Parts and Accessories'),
(1077, '336390', 'Other Motor Vehicle Parts Manufacturing', '3799', 'Transportation Equipment, Nec'),
(1078, '336411', 'Aircraft Manufacturing', '3721', 'Aircraft'),
(1079, '336411', 'Aircraft Manufacturing', '3728', 'Aircraft Parts and Equipment, Nec'),
(1080, '336412', 'Aircraft Engine and Engine Parts\nManufacturing', '3724', 'Aircraft Engines and Engine Parts'),
(1081, '336413', 'Other Aircraft Parts and Auxiliary\nEquipment Manufacturing', '3728', 'Aircraft Parts and Equipment, Nec'),
(1082, '336414', 'Guided Missile and Space Vehicle\nManufacturing', '3761', 'Guided Missiles and Space Vehicles'),
(1083, '336415', 'Guided Missile and Space Vehicle Propulsion Unit and Propulsion Unit Parts\nManufacturing', '3764', 'Space Propulsion Units and Parts'),
(1084, '336419', 'Other Guided Missile and Space Vehicle\nParts and Auxiliary Equipment Manufacturing', '3769', 'Space Vehicle Equipment, Nec'),
(1085, '336510', 'Railroad Rolling Stock Manufacturing', '3531', 'Construction Machinery'),
(1086, '336510', 'Railroad Rolling Stock Manufacturing', '3743', 'Railroad Equipment'),
(1087, '336611', 'Ship Building and Repairing', '3731', 'Shipbuilding and Repairing'),
(1088, '336612', 'Boat Building', '3069', 'Fabricated Rubber Products, Nec'),
(1089, '336612', 'Boat Building', '3089', 'Plastics Products, Nec'),
(1090, '336612', 'Boat Building', '3732', 'Boatbuilding and Repairing'),
(1091, '336612', 'Boat Building', '3999', 'Manufacturing Industries, Nec'),
(1092, '336991', 'Motorcycle, Bicycle, and Parts\nManufacturing', '3751', 'Motorcycles, Bicycles, and Parts'),
(1093, '336991', 'Motorcycle, Bicycle, and Parts\nManufacturing', '3944', 'Games, Toys, and Children\'s Vehicles'),
(1094, '336992', 'Military Armored Vehicle, Tank, and Tank\nComponent Manufacturing', '3711', 'Motor Vehicles and Car Bodies'),
(1095, '336992', 'Military Armored Vehicle, Tank, and Tank\nComponent Manufacturing', '3795', 'Tanks and Tank Components'),
(1096, '336999', 'All Other Transportation Equipment\nManufacturing', '3799', 'Transportation Equipment, Nec'),
(1097, '337110', 'Wood Kitchen Cabinet and Countertop\nManufacturing', '2434', 'Wood Kitchen Cabinets'),
(1098, '337110', 'Wood Kitchen Cabinet and Countertop\nManufacturing', '2541', 'Wood Partitions and Fixtures'),
(1099, '337110', 'Wood Kitchen Cabinet and Countertop\nManufacturing', '5712', 'Furniture Stores'),
(1100, '337121', 'Upholstered Household Furniture\nManufacturing', '2512', 'Upholstered Household Furniture'),
(1101, '337121', 'Upholstered Household Furniture\nManufacturing', '2514', 'Metal Household Furniture'),
(1102, '337121', 'Upholstered Household Furniture\nManufacturing', '2515', 'Mattresses and Bedsprings'),
(1103, '337121', 'Upholstered Household Furniture\nManufacturing', '5712', 'Furniture Stores'),
(1104, '337122', 'Nonupholstered Wood Household Furniture\nManufacturing', '2511', 'Wood Household Furniture'),
(1105, '337122', 'Nonupholstered Wood Household Furniture\nManufacturing', '5712', 'Furniture Stores'),
(1106, '337124', 'Metal Household Furniture Manufacturing', '2514', 'Metal Household Furniture'),
(1107, '337125', 'Household Furniture (except Wood and\nMetal) Manufacturing', '2499', 'Wood Products, Nec'),
(1108, '337125', 'Household Furniture (except Wood and\nMetal) Manufacturing', '2519', 'Household Furniture, Nec'),
(1109, '337127', 'Institutional Furniture Manufacturing', '2531', 'Public Building and Related Furniture'),
(1110, '337127', 'Institutional Furniture Manufacturing', '2541', 'Wood Partitions and Fixtures'),
(1111, '337127', 'Institutional Furniture Manufacturing', '2542', 'Partitions and Fixtures, Except Wood'),
(1112, '337127', 'Institutional Furniture Manufacturing', '2599', 'Furniture and Fixtures, Nec'),
(1113, '337127', 'Institutional Furniture Manufacturing', '2599', 'Furniture and Fixtures, Nec'),
(1114, '337127', 'Institutional Furniture Manufacturing', '3821', 'Laboratory Apparatus and Furniture'),
(1115, '337127', 'Institutional Furniture Manufacturing', '3841', 'Surgical and Medical Instruments'),
(1116, '337127', 'Institutional Furniture Manufacturing', '3952', 'Lead Pencils and Art Goods'),
(1117, '337127', 'Institutional Furniture Manufacturing', '3999', 'Manufacturing Industries, Nec'),
(1118, '337211', 'Wood Office Furniture Manufacturing', '2521', 'Wood Office Furniture'),
(1119, '337212', 'Custom Architectural Woodwork and\nMillwork Manufacturing', '2541', 'Wood Partitions and Fixtures'),
(1120, '337214', 'Office Furniture (except Wood)\nManufacturing', '2522', 'Office Furniture, Except Wood'),
(1121, '337215', 'Showcase, Partition, Shelving, and Locker\nManufacturing', '2426', 'Hardwood Dimension and Flooring Mills'),
(1122, '337215', 'Showcase, Partition, Shelving, and Locker\nManufacturing', '2511', 'Wood Household Furniture'),
(1123, '337215', 'Showcase, Partition, Shelving, and Locker\nManufacturing', '2514', 'Metal Household Furniture'),
(1124, '337215', 'Showcase, Partition, Shelving, and Locker\nManufacturing', '2541', 'Wood Partitions and Fixtures'),
(1125, '337215', 'Showcase, Partition, Shelving, and Locker\nManufacturing', '2542', 'Partitions and Fixtures, Except Wood'),
(1126, '337215', 'Showcase, Partition, Shelving, and Locker\nManufacturing', '3089', 'Plastics Products, Nec'),
(1127, '337215', 'Showcase, Partition, Shelving, and Locker\nManufacturing', '3429', 'Hardware, Nec'),
(1128, '337215', 'Showcase, Partition, Shelving, and Locker\nManufacturing', '3499', 'Fabricated Metal Products, Nec'),
(1129, '337910', 'Mattress Manufacturing', '2515', 'Mattresses and Bedsprings'),
(1130, '337920', 'Blind and Shade Manufacturing', '2591', 'Drapery Hardware and Blinds and Shades'),
(1131, '339112', 'Surgical and Medical Instrument\nManufacturing', '3829', 'Measuring and Controlling Devices, Nec'),
(1132, '339112', 'Surgical and Medical Instrument\nManufacturing', '3841', 'Surgical and Medical Instruments'),
(1133, '339113', 'Surgical Appliance and Supplies\nManufacturing', '2499', 'Wood Products, Nec'),
(1134, '339113', 'Surgical Appliance and Supplies\nManufacturing', '2599', 'Furniture and Fixtures, Nec'),
(1135, '339113', 'Surgical Appliance and Supplies\nManufacturing', '3069', 'Fabricated Rubber Products, Nec'),
(1136, '339113', 'Surgical Appliance and Supplies\nManufacturing', '3089', 'Plastics Products, Nec'),
(1137, '339113', 'Surgical Appliance and Supplies\nManufacturing', '3821', 'Laboratory Apparatus and Furniture'),
(1138, '339113', 'Surgical Appliance and Supplies\nManufacturing', '3841', 'Surgical and Medical Instruments'),
(1139, '339113', 'Surgical Appliance and Supplies\nManufacturing', '3842', 'Surgical Appliances and Supplies'),
(1140, '339113', 'Surgical Appliance and Supplies\nManufacturing', '3851', 'Ophthalmic Goods'),
(1141, '339113', 'Surgical Appliance and Supplies\nManufacturing', '5999', 'Miscellaneous Retail Stores, Nec'),
(1142, '339114', 'Dental Equipment and Supplies\nManufacturing', '3843', 'Dental Equipment and Supplies'),
(1143, '339115', 'Ophthalmic Goods Manufacturing', '3851', 'Ophthalmic Goods'),
(1144, '339115', 'Ophthalmic Goods Manufacturing', '5995', 'Optical Goods Stores'),
(1145, '339116', 'Dental Laboratories', '8072', 'Dental Laboratories'),
(1146, '339910', 'Jewelry and Silverware Manufacturing', '3172', 'Personal Leather Goods, Nec'),
(1147, '339910', 'Jewelry and Silverware Manufacturing', '3479', 'Metal Coating and Allied Services'),
(1148, '339910', 'Jewelry and Silverware Manufacturing', '3479', 'Metal Coating and Allied Services'),
(1149, '339910', 'Jewelry and Silverware Manufacturing', '3479', 'Metal Coating and Allied Services'),
(1150, '339910', 'Jewelry and Silverware Manufacturing', '3911', 'Jewelry, Precious Metal'),
(1151, '339910', 'Jewelry and Silverware Manufacturing', '3914', 'Silverware and Plated Ware'),
(1152, '339910', 'Jewelry and Silverware Manufacturing', '3915', 'Jewelers\' Materials and Lapidary Work'),
(1153, '339910', 'Jewelry and Silverware Manufacturing', '3961', 'Costume Jewelry'),
(1154, '339920', 'Sporting and Athletic Goods Manufacturing', '3069', 'Fabricated Rubber Products, Nec'),
(1155, '339920', 'Sporting and Athletic Goods Manufacturing', '3949', 'Sporting and athletic Goods, Nec'),
(1156, '339930', 'Doll, Toy, and Game Manufacturing', '3069', 'Fabricated Rubber Products, Nec'),
(1157, '339930', 'Doll, Toy, and Game Manufacturing', '3942', 'Dolls and Stuffed Toys'),
(1158, '339930', 'Doll, Toy, and Game Manufacturing', '3944', 'Games, Toys, and Children\'s Vehicles'),
(1159, '339930', 'Doll, Toy, and Game Manufacturing', '3999', 'Manufacturing Industries, Nec'),
(1160, '339940', 'Office Supplies (except Paper)\nManufacturing', '2531', 'Public Building and Related Furniture'),
(1161, '339940', 'Office Supplies (except Paper)\nManufacturing', '3579', 'Office Machines, Nec'),
(1162, '339940', 'Office Supplies (except Paper)\nManufacturing', '3951', 'Pens and Mechanical Pencils'),
(1163, '339940', 'Office Supplies (except Paper)\nManufacturing', '3952', 'Lead Pencils and Art Goods'),
(1164, '339940', 'Office Supplies (except Paper)\nManufacturing', '3953', 'Marking Devices'),
(1165, '339940', 'Office Supplies (except Paper)\nManufacturing', '3955', 'Carbon Paper and Inked Ribbons'),
(1166, '339950', 'Sign Manufacturing', '3993', 'Signs and Advertising Specialties'),
(1167, '339991', 'Gasket, Packing, and Sealing Device\nManufacturing', '3053', 'Gaskets; Packing and Sealing Devices'),
(1168, '339992', 'Musical Instrument Manufacturing', '3931', 'Musical Instruments'),
(1169, '339993', 'Fastener, Button, Needle, and Pin\nManufacturing', '3131', 'Footwear Cut Stock'),
(1170, '339993', 'Fastener, Button, Needle, and Pin\nManufacturing', '3961', 'Costume Jewelry'),
(1171, '339993', 'Fastener, Button, Needle, and Pin\nManufacturing', '3965', 'Fasteners, Buttons, Needles, and Pins'),
(1172, '339994', 'Broom, Brush, and Mop Manufacturing', '2392', 'Household Furnishings, Nec'),
(1173, '339994', 'Broom, Brush, and Mop Manufacturing', '3991', 'Brooms and Brushes'),
(1174, '339995', 'Burial Casket Manufacturing', '3995', 'Burial Caskets'),
(1175, '339999', 'All Other Miscellaneous Manufacturing', '2499', 'Wood Products, Nec'),
(1176, '339999', 'All Other Miscellaneous Manufacturing', '3634', 'Electric Housewares and Fans'),
(1177, '339999', 'All Other Miscellaneous Manufacturing', '3842', 'Surgical Appliances and Supplies'),
(1178, '339999', 'All Other Miscellaneous Manufacturing', '3999', 'Manufacturing Industries, Nec'),
(1179, '423110', 'Automobile and Other Motor Vehicle\nMerchant Wholesalers', '5012', 'Automobiles and Other Motor Vehicles'),
(1180, '423120', 'Motor Vehicle Supplies and New Parts\nMerchant Wholesalers', '5013', 'Motor Vehicle Supplies and New Parts'),
(1181, '423130', 'Tire and Tube Merchant Wholesalers', '5014', 'Tires and Tubes'),
(1182, '423140', 'Motor Vehicle Parts (Used) Merchant\nWholesalers', '5015', 'Motor Vehicle Parts, Used'),
(1183, '423210', 'Furniture Merchant Wholesalers', '5021', 'Furniture'),
(1184, '423220', 'Home Furnishing Merchant Wholesalers', '5023', 'Homefurnishings'),
(1185, '423310', 'Lumber, Plywood, Millwork, and Wood\nPanel Merchant Wholesalers', '5031', 'Lumber, Plywood, and Millwork'),
(1186, '423310', 'Lumber, Plywood, Millwork, and Wood\nPanel Merchant Wholesalers', '5039', 'Construction Materials, Nec'),
(1187, '423320', 'Brick, Stone, and Related Construction\nMaterial Merchant Wholesalers', '5032', 'Brick, Stone, and Related Material'),
(1188, '423330', 'Roofing, Siding, and Insulation Material\nMerchant Wholesalers', '5033', 'Roofing, Siding, and Insulation'),
(1189, '423390', 'Other Construction Material Merchant\nWholesalers', '5039', 'Construction Materials, Nec'),
(1190, '423410', 'Photographic Equipment and Supplies\nMerchant Wholesalers', '5043', 'Photographic Equipment and Supplies'),
(1191, '423420', 'Office Equipment Merchant Wholesalers', '5044', 'Office Equipment'),
(1192, '423430', 'Computer and Computer Peripheral\nEquipment and Software Merchant Wholesalers', '5045', 'Computers, Peripherals, and Software'),
(1193, '423440', 'Other Commercial Equipment Merchant\nWholesalers', '5046', 'Commercial Equipment, Nec'),
(1194, '423450', 'Medical, Dental, and Hospital Equipment\nand Supplies Merchant Wholesalers', '5047', 'Medical and Hospital Equipment'),
(1195, '423460', 'Ophthalmic Goods Merchant Wholesalers', '5048', 'Ophthalmic Goods'),
(1196, '423490', 'Other Professional Equipment and Supplies\nMerchant Wholesalers', '5049', 'Professional Equipment, Nec'),
(1197, '423510', 'Metal Service Centers and Other Metal\nMerchant Wholesalers', '5051', 'Metals Service Centers and Offices'),
(1198, '423520', 'Coal and Other Mineral and Ore Merchant\nWholesalers', '5052', 'Coal and Other Minerals and Ores'),
(1199, '423610', 'Electrical Apparatus and Equipment, Wiring Supplies, and Related Equipment Merchant\nWholesalers', '5063', 'Electrical Apparatus and Equipment'),
(1200, '423620', 'Household Appliances, Electric Housewares, and Consumer Electronics\nMerchant Wholesalers', '5064', 'Electrical Appliances, Television and Radio'),
(1201, '423620', 'Household Appliances, Electric Housewares, and Consumer Electronics\nMerchant Wholesalers', '5074', 'Plumbing and Hydronic Heating Supplies'),
(1202, '423690', 'Other Electronic Parts and Equipment\nMerchant Wholesalers', '5065', 'Electronic Parts and Equipment, Nec'),
(1203, '423710', 'Hardware Merchant Wholesalers', '5072', 'Hardware'),
(1204, '423720', 'Plumbing and Heating Equipment and\nSupplies (Hydronics) Merchant Wholesalers', '5064', 'Electrical Appliances, Television and Radio'),
(1205, '423720', 'Plumbing and Heating Equipment and Supplies (Hydronics) Merchant\nWholesalers', '5074', 'Plumbing and Hydronic Heating Supplies'),
(1206, '423730', 'Warm Air Heating and Air-Conditioning Equipment and Supplies Merchant\nWholesalers', '5075', 'Warm Air Heating and Air Conditioning'),
(1207, '423740', 'Refrigeration Equipment and Supplies\nMerchant Wholesalers', '5078', 'Refrigeration Equipment and Supplies'),
(1208, '423810', 'Construction and Mining (except Oil Well) Machinery and Equipment Merchant\nWholesalers', '5082', 'Construction and Mining Machinery'),
(1209, '423820', 'Farm and Garden Machinery and\nEquipment Merchant Wholesalers', '5083', 'Farm and Garden Machinery'),
(1210, '423830', 'Industrial Machinery and Equipment\nMerchant Wholesalers', '5084', 'Industrial Machinery and Equipment'),
(1211, '423830', 'Industrial Machinery and Equipment\nMerchant Wholesalers', '5085', 'Industrial Supplies'),
(1212, '423840', 'Industrial Supplies Merchant Wholesalers', '5085', 'Industrial Supplies'),
(1213, '423850', 'Service Establishment Equipment and\nSupplies Merchant Wholesalers', '5087', 'Service Establishment Equipment'),
(1214, '423860', 'Transportation Equipment and Supplies (except Motor Vehicle) Merchant\nWholesalers', '5088', 'Transportation Equipment and Supplies'),
(1215, '423910', 'Sporting and Recreational Goods and\nSupplies Merchant Wholesalers', '5091', 'Sporting and Recreation Goods'),
(1216, '423910', 'Sporting and Recreational Goods and\nSupplies Merchant Wholesalers', '5136', 'Men\'s and Boy\'s Clothing'),
(1217, '423910', 'Sporting and Recreational Goods and\nSupplies Merchant Wholesalers', '5137', 'Women\'s and Children\'s Clothing'),
(1218, '423920', 'Toy and Hobby Goods and Supplies\nMerchant Wholesalers', '5092', 'Toys and Hobby Goods and Supplies'),
(1219, '423930', 'Recyclable Material Merchant Wholesalers', '5093', 'Scrap and Waste Materials'),
(1220, '423940', 'Jewelry, Watch, Precious Stone, and\nPrecious Metal Merchant Wholesalers', '5094', 'Jewelry and Precious Stones'),
(1221, '423990', 'Other Miscellaneous Durable Goods\nMerchant Wholesalers', '5099', 'Durable Goods, Nec'),
(1222, '423990', 'Other Miscellaneous Durable Goods\nMerchant Wholesalers', '7822', 'Motion Picture and Tape Distribution'),
(1223, '424110', 'Printing and Writing Paper Merchant\nWholesalers', '5111', 'Printing and Writing Paper'),
(1224, '424120', 'Stationery and Office Supplies Merchant\nWholesalers', '5112', 'Stationery and Office Supplies'),
(1225, '424130', 'Industrial and Personal Service Paper\nMerchant Wholesalers', '5113', 'Industrial and Personal Service Paper'),
(1226, '424210', 'Drugs and Druggists\' Sundries Merchant\nWholesalers', '5122', 'Drugs, Proprietaries, and Sundries'),
(1227, '424310', 'Piece Goods, Notions, and Other Dry\nGoods Merchant Wholesalers', '5131', 'Piece Goods and Notions'),
(1228, '424310', 'Piece Goods, Notions, and Other Dry\nGoods Merchant Wholesalers', '5199', 'Nondurable Goods, Nec'),
(1229, '424320', 'Men\'s and Boys\' Clothing and Furnishings\nMerchant Wholesalers', '5136', 'Men\'s and Boy\'s Clothing'),
(1230, '424330', 'Women\'s, Children\'s, and Infants\' Clothing\nand Accessories Merchant Wholesalers', '5137', 'Women\'s and Children\'s Clothing'),
(1231, '424340', 'Footwear Merchant Wholesalers', '5139', 'Footwear'),
(1232, '424340', 'Footwear Merchant Wholesalers', '5199', 'Nondurable Goods, Nec'),
(1233, '424410', 'General Line Grocery Merchant\nWholesalers', '5141', 'Groceries, General Line'),
(1234, '424420', 'Packaged Frozen Food Merchant\nWholesalers', '5142', 'Packaged Frozen Goods'),
(1235, '424430', 'Dairy Product (except Dried or Canned)\nMerchant Wholesalers', '5143', 'Dairy Products, Except Dried or Canned'),
(1236, '424440', 'Poultry and Poultry Product Merchant\nWholesalers', '5144', 'Poultry and Poultry Products'),
(1237, '424450', 'Confectionery Merchant Wholesalers', '5145', 'Confectionery'),
(1238, '424460', 'Fish and Seafood Merchant Wholesalers', '5146', 'Fish and Seafoods'),
(1239, '424470', 'Meat and Meat Product Merchant\nWholesalers', '5147', 'Meats and Meat Products'),
(1240, '424480', 'Fresh Fruit and Vegetable Merchant\nWholesalers', '5148', 'Fresh Fruits and Vegetables'),
(1241, '424490', 'Other Grocery and Related Products\nMerchant Wholesalers', '5149', 'Groceries and Related Products, Nec'),
(1242, '424510', 'Grain and Field Bean Merchant\nWholesalers', '5153', 'Grain and Field Beans'),
(1243, '424520', 'Livestock Merchant Wholesalers', '5154', 'Livestock'),
(1244, '424590', 'Other Farm Product Raw Material Merchant\nWholesalers', '5159', 'Farm-product Raw Materials, Nec'),
(1245, '424610', 'Plastics Materials and Basic Forms and\nShapes Merchant Wholesalers', '5162', 'Plastics Materials and Basic Shapes'),
(1246, '424610', 'Plastics Materials and Basic Forms and\nShapes Merchant Wholesalers', '5199', 'Nondurable Goods, Nec'),
(1247, '424690', 'Other Chemical and Allied Products\nMerchant Wholesalers', '5169', 'Chemicals and Allied Products, Nec'),
(1248, '424710', 'Petroleum Bulk Stations and Terminals', '5171', 'Petroleum Bulk Stations and Terminals'),
(1249, '424720', 'Petroleum and Petroleum Products\nMerchant Wholesalers (except Bulk Stations and Terminals)', '5172', 'Petroleum Products, Nec'),
(1250, '424810', 'Beer and Ale Merchant Wholesalers', '5181', 'Beer and Ale'),
(1251, '424820', 'Wine and Distilled Alcoholic Beverage\nMerchant Wholesalers', '5182', 'Wine and Distilled Beverages'),
(1252, '424910', 'Farm Supplies Merchant Wholesalers', '5191', 'Farm Supplies'),
(1253, '424920', 'Book, Periodical, and Newspaper Merchant\nWholesalers', '5192', 'Books, Periodicals, and Newspapers'),
(1254, '424930', 'Flower, Nursery Stock, and Florists\'\nSupplies Merchant Wholesalers', '5193', 'Flowers and Florists Supplies'),
(1255, '424940', 'Tobacco and Tobacco Product Merchant\nWholesalers', '5194', 'Tobacco and Tobacco Products'),
(1256, '424950', 'Paint, Varnish, and Supplies Merchant\nWholesalers', '5198', 'Paints, Varnishes, and Supplies'),
(1257, '424990', 'Other Miscellaneous Nondurable Goods\nMerchant Wholesalers', '5199', 'Nondurable Goods, Nec'),
(1258, '425110', 'Business to Business Electronic Markets', '5012', 'Automobiles and Other Motor Vehicles'),
(1259, '425110', 'Business to Business Electronic Markets', '5013', 'Motor Vehicle Supplies and New Parts'),
(1260, '425110', 'Business to Business Electronic Markets', '5014', 'Tires and Tubes'),
(1261, '425110', 'Business to Business Electronic Markets', '5015', 'Motor Vehicle Parts, Used'),
(1262, '425110', 'Business to Business Electronic Markets', '5021', 'Furniture'),
(1263, '425110', 'Business to Business Electronic Markets', '5023', 'Homefurnishings'),
(1264, '425110', 'Business to Business Electronic Markets', '5031', 'Lumber, Plywood, and Millwork'),
(1265, '425110', 'Business to Business Electronic Markets', '5032', 'Brick, Stone, and Related Material'),
(1266, '425110', 'Business to Business Electronic Markets', '5033', 'Roofing, Siding, and Insulation'),
(1267, '425110', 'Business to Business Electronic Markets', '5039', 'Construction Materials, Nec'),
(1268, '425110', 'Business to Business Electronic Markets', '5043', 'Photographic Equipment and Supplies'),
(1269, '425110', 'Business to Business Electronic Markets', '5044', 'Office Equipment'),
(1270, '425110', 'Business to Business Electronic Markets', '5045', 'Computers, Peripherals, and Software'),
(1271, '425110', 'Business to Business Electronic Markets', '5046', 'Commercial Equipment, Nec'),
(1272, '425110', 'Business to Business Electronic Markets', '5047', 'Medical and Hospital Equipment'),
(1273, '425110', 'Business to Business Electronic Markets', '5048', 'Ophthalmic Goods'),
(1274, '425110', 'Business to Business Electronic Markets', '5049', 'Professional Equipment, Nec'),
(1275, '425110', 'Business to Business Electronic Markets', '5051', 'Metals Service Centers and Offices'),
(1276, '425110', 'Business to Business Electronic Markets', '5052', 'Coal and Other Minerals and Ores'),
(1277, '425110', 'Business to Business Electronic Markets', '5063', 'Electrical Apparatus and Equipment'),
(1278, '425110', 'Business to Business Electronic Markets', '5064', 'Electrical Appliances, Television and Radio'),
(1279, '425110', 'Business to Business Electronic Markets', '5065', 'Electronic Parts and Equipment, Nec'),
(1280, '425110', 'Business to Business Electronic Markets', '5072', 'Hardware'),
(1281, '425110', 'Business to Business Electronic Markets', '5074', 'Plumbing and Hydronic Heating Supplies'),
(1282, '425110', 'Business to Business Electronic Markets', '5075', 'Warm Air Heating and Air Conditioning'),
(1283, '425110', 'Business to Business Electronic Markets', '5078', 'Refrigeration Equipment and Supplies'),
(1284, '425110', 'Business to Business Electronic Markets', '5082', 'Construction and Mining Machinery'),
(1285, '425110', 'Business to Business Electronic Markets', '5083', 'Farm and Garden Machinery'),
(1286, '425110', 'Business to Business Electronic Markets', '5084', 'Industrial Machinery and Equipment'),
(1287, '425110', 'Business to Business Electronic Markets', '5085', 'Industrial Supplies'),
(1288, '425110', 'Business to Business Electronic Markets', '5087', 'Service Establishment Equipment'),
(1289, '425110', 'Business to Business Electronic Markets', '5088', 'Transportation Equipment and Supplies'),
(1290, '425110', 'Business to Business Electronic Markets', '5091', 'Sporting and Recreation Goods'),
(1291, '425110', 'Business to Business Electronic Markets', '5092', 'Toys and Hobby Goods and Supplies'),
(1292, '425110', 'Business to Business Electronic Markets', '5093', 'Scrap and Waste Materials'),
(1293, '425110', 'Business to Business Electronic Markets', '5094', 'Jewelry and Precious Stones'),
(1294, '425110', 'Business to Business Electronic Markets', '5099', 'Durable Goods, Nec'),
(1295, '425110', 'Business to Business Electronic Markets', '5111', 'Printing and Writing Paper'),
(1296, '425110', 'Business to Business Electronic Markets', '5112', 'Stationery and Office Supplies'),
(1297, '425110', 'Business to Business Electronic Markets', '5113', 'Industrial and Personal Service Paper'),
(1298, '425110', 'Business to Business Electronic Markets', '5122', 'Drugs, Proprietaries, and Sundries'),
(1299, '425110', 'Business to Business Electronic Markets', '5131', 'Piece Goods and Notions'),
(1300, '425110', 'Business to Business Electronic Markets', '5136', 'Men\'s and Boy\'s Clothing'),
(1301, '425110', 'Business to Business Electronic Markets', '5137', 'Women\'s and Children\'s Clothing'),
(1302, '425110', 'Business to Business Electronic Markets', '5139', 'Footwear'),
(1303, '425110', 'Business to Business Electronic Markets', '5141', 'Groceries, General Line'),
(1304, '425110', 'Business to Business Electronic Markets', '5142', 'Packaged Frozen Goods'),
(1305, '425110', 'Business to Business Electronic Markets', '5143', 'Dairy Products, Except Dried or Canned'),
(1306, '425110', 'Business to Business Electronic Markets', '5144', 'Poultry and Poultry Products'),
(1307, '425110', 'Business to Business Electronic Markets', '5145', 'Confectionery'),
(1308, '425110', 'Business to Business Electronic Markets', '5146', 'Fish and Seafoods'),
(1309, '425110', 'Business to Business Electronic Markets', '5147', 'Meats and Meat Products'),
(1310, '425110', 'Business to Business Electronic Markets', '5148', 'Fresh Fruits and Vegetables'),
(1311, '425110', 'Business to Business Electronic Markets', '5149', 'Groceries and Related Products, Nec'),
(1312, '425110', 'Business to Business Electronic Markets', '5153', 'Grain and Field Beans'),
(1313, '425110', 'Business to Business Electronic Markets', '5154', 'Livestock'),
(1314, '425110', 'Business to Business Electronic Markets', '5159', 'Farm-product Raw Materials, Nec'),
(1315, '425110', 'Business to Business Electronic Markets', '5162', 'Plastics Materials and Basic Shapes'),
(1316, '425110', 'Business to Business Electronic Markets', '5169', 'Chemicals and Allied Products, Nec'),
(1317, '425110', 'Business to Business Electronic Markets', '5172', 'Petroleum Products, Nec'),
(1318, '425110', 'Business to Business Electronic Markets', '5181', 'Beer and Ale'),
(1319, '425110', 'Business to Business Electronic Markets', '5182', 'Wine and Distilled Beverages'),
(1320, '425110', 'Business to Business Electronic Markets', '5191', 'Farm Supplies'),
(1321, '425110', 'Business to Business Electronic Markets', '5192', 'Books, Periodicals, and Newspapers'),
(1322, '425110', 'Business to Business Electronic Markets', '5193', 'Flowers and Florists Supplies'),
(1323, '425110', 'Business to Business Electronic Markets', '5194', 'Tobacco and Tobacco Products'),
(1324, '425110', 'Business to Business Electronic Markets', '5198', 'Paints, Varnishes, and Supplies'),
(1325, '425110', 'Business to Business Electronic Markets', '5199', 'Nondurable Goods, Nec'),
(1326, '425120', 'Wholesale Trade Agents and Brokers', '5012', 'Automobiles and Other Motor Vehicles'),
(1327, '425120', 'Wholesale Trade Agents and Brokers', '5013', 'Motor Vehicle Supplies and New Parts'),
(1328, '425120', 'Wholesale Trade Agents and Brokers', '5014', 'Tires and Tubes'),
(1329, '425120', 'Wholesale Trade Agents and Brokers', '5015', 'Motor Vehicle Parts, Used'),
(1330, '425120', 'Wholesale Trade Agents and Brokers', '5021', 'Furniture'),
(1331, '425120', 'Wholesale Trade Agents and Brokers', '5023', 'Homefurnishings'),
(1332, '425120', 'Wholesale Trade Agents and Brokers', '5031', 'Lumber, Plywood, and Millwork'),
(1333, '425120', 'Wholesale Trade Agents and Brokers', '5032', 'Brick, Stone, and Related Material'),
(1334, '425120', 'Wholesale Trade Agents and Brokers', '5033', 'Roofing, Siding, and Insulation'),
(1335, '425120', 'Wholesale Trade Agents and Brokers', '5039', 'Construction Materials, Nec'),
(1336, '425120', 'Wholesale Trade Agents and Brokers', '5043', 'Photographic Equipment and Supplies'),
(1337, '425120', 'Wholesale Trade Agents and Brokers', '5044', 'Office Equipment'),
(1338, '425120', 'Wholesale Trade Agents and Brokers', '5045', 'Computers, Peripherals, and Software'),
(1339, '425120', 'Wholesale Trade Agents and Brokers', '5046', 'Commercial Equipment, Nec'),
(1340, '425120', 'Wholesale Trade Agents and Brokers', '5047', 'Medical and Hospital Equipment'),
(1341, '425120', 'Wholesale Trade Agents and Brokers', '5048', 'Ophthalmic Goods'),
(1342, '425120', 'Wholesale Trade Agents and Brokers', '5049', 'Professional Equipment, Nec'),
(1343, '425120', 'Wholesale Trade Agents and Brokers', '5051', 'Metals Service Centers and Offices'),
(1344, '425120', 'Wholesale Trade Agents and Brokers', '5052', 'Coal and Other Minerals and Ores'),
(1345, '425120', 'Wholesale Trade Agents and Brokers', '5063', 'Electrical Apparatus and Equipment'),
(1346, '425120', 'Wholesale Trade Agents and Brokers', '5064', 'Electrical Appliances, Television and Radio'),
(1347, '425120', 'Wholesale Trade Agents and Brokers', '5065', 'Electronic Parts and Equipment, Nec'),
(1348, '425120', 'Wholesale Trade Agents and Brokers', '5072', 'Hardware'),
(1349, '425120', 'Wholesale Trade Agents and Brokers', '5074', 'Plumbing and Hydronic Heating Supplies'),
(1350, '425120', 'Wholesale Trade Agents and Brokers', '5075', 'Warm Air Heating and Air Conditioning'),
(1351, '425120', 'Wholesale Trade Agents and Brokers', '5078', 'Refrigeration Equipment and Supplies'),
(1352, '425120', 'Wholesale Trade Agents and Brokers', '5082', 'Construction and Mining Machinery'),
(1353, '425120', 'Wholesale Trade Agents and Brokers', '5083', 'Farm and Garden Machinery'),
(1354, '425120', 'Wholesale Trade Agents and Brokers', '5084', 'Industrial Machinery and Equipment'),
(1355, '425120', 'Wholesale Trade Agents and Brokers', '5085', 'Industrial Supplies'),
(1356, '425120', 'Wholesale Trade Agents and Brokers', '5087', 'Service Establishment Equipment'),
(1357, '425120', 'Wholesale Trade Agents and Brokers', '5088', 'Transportation Equipment and Supplies'),
(1358, '425120', 'Wholesale Trade Agents and Brokers', '5091', 'Sporting and Recreation Goods'),
(1359, '425120', 'Wholesale Trade Agents and Brokers', '5092', 'Toys and Hobby Goods and Supplies'),
(1360, '425120', 'Wholesale Trade Agents and Brokers', '5093', 'Scrap and Waste Materials'),
(1361, '425120', 'Wholesale Trade Agents and Brokers', '5094', 'Jewelry and Precious Stones'),
(1362, '425120', 'Wholesale Trade Agents and Brokers', '5099', 'Durable Goods, Nec'),
(1363, '425120', 'Wholesale Trade Agents and Brokers', '5111', 'Printing and Writing Paper'),
(1364, '425120', 'Wholesale Trade Agents and Brokers', '5112', 'Stationery and Office Supplies'),
(1365, '425120', 'Wholesale Trade Agents and Brokers', '5113', 'Industrial and Personal Service Paper'),
(1366, '425120', 'Wholesale Trade Agents and Brokers', '5122', 'Drugs, Proprietaries, and Sundries'),
(1367, '425120', 'Wholesale Trade Agents and Brokers', '5131', 'Piece Goods and Notions'),
(1368, '425120', 'Wholesale Trade Agents and Brokers', '5136', 'Men\'s and Boy\'s Clothing'),
(1369, '425120', 'Wholesale Trade Agents and Brokers', '5137', 'Women\'s and Children\'s Clothing'),
(1370, '425120', 'Wholesale Trade Agents and Brokers', '5139', 'Footwear'),
(1371, '425120', 'Wholesale Trade Agents and Brokers', '5141', 'Groceries, General Line'),
(1372, '425120', 'Wholesale Trade Agents and Brokers', '5142', 'Packaged Frozen Goods'),
(1373, '425120', 'Wholesale Trade Agents and Brokers', '5143', 'Dairy Products, Except Dried or Canned'),
(1374, '425120', 'Wholesale Trade Agents and Brokers', '5144', 'Poultry and Poultry Products'),
(1375, '425120', 'Wholesale Trade Agents and Brokers', '5145', 'Confectionery'),
(1376, '425120', 'Wholesale Trade Agents and Brokers', '5146', 'Fish and Seafoods'),
(1377, '425120', 'Wholesale Trade Agents and Brokers', '5147', 'Meats and Meat Products'),
(1378, '425120', 'Wholesale Trade Agents and Brokers', '5148', 'Fresh Fruits and Vegetables'),
(1379, '425120', 'Wholesale Trade Agents and Brokers', '5149', 'Groceries and Related Products, Nec'),
(1380, '425120', 'Wholesale Trade Agents and Brokers', '5153', 'Grain and Field Beans'),
(1381, '425120', 'Wholesale Trade Agents and Brokers', '5154', 'Livestock'),
(1382, '425120', 'Wholesale Trade Agents and Brokers', '5159', 'Farm-product Raw Materials, Nec'),
(1383, '425120', 'Wholesale Trade Agents and Brokers', '5162', 'Plastics Materials and Basic Shapes'),
(1384, '425120', 'Wholesale Trade Agents and Brokers', '5169', 'Chemicals and Allied Products, Nec'),
(1385, '425120', 'Wholesale Trade Agents and Brokers', '5172', 'Petroleum Products, Nec'),
(1386, '425120', 'Wholesale Trade Agents and Brokers', '5181', 'Beer and Ale'),
(1387, '425120', 'Wholesale Trade Agents and Brokers', '5182', 'Wine and Distilled Beverages'),
(1388, '425120', 'Wholesale Trade Agents and Brokers', '5191', 'Farm Supplies'),
(1389, '425120', 'Wholesale Trade Agents and Brokers', '5192', 'Books, Periodicals, and Newspapers'),
(1390, '425120', 'Wholesale Trade Agents and Brokers', '5193', 'Flowers and Florists Supplies'),
(1391, '425120', 'Wholesale Trade Agents and Brokers', '5194', 'Tobacco and Tobacco Products'),
(1392, '425120', 'Wholesale Trade Agents and Brokers', '5198', 'Paints, Varnishes, and Supplies'),
(1393, '425120', 'Wholesale Trade Agents and Brokers', '5199', 'Nondurable Goods, Nec'),
(1394, '425120', 'Wholesale Trade Agents and Brokers', '7389', 'Business Services, Nec'),
(1395, '441110', 'New Car Dealers', '5511', 'New and Used Car Dealers'),
(1396, '441120', 'Used Car Dealers', '5521', 'Used Car Dealers'),
(1397, '441210', 'Recreational Vehicle Dealers', '5561', 'Recreational Vehicle Dealers'),
(1398, '441222', 'Boat Dealers', '5551', 'Boat Dealers'),
(1399, '441228', 'Motorcycle, ATV, and All Other Motor\nVehicle Dealers', '5571', 'Motorcycle Dealers'),
(1400, '441228', 'Motorcycle, ATV, and All Other Motor\nVehicle Dealers', '5599', 'Automotive Dealers, Nec'),
(1401, '441310', 'Automotive Parts and Accessories Stores', '5013', 'Motor Vehicle Supplies and New Parts'),
(1402, '441310', 'Automotive Parts and Accessories Stores', '5015', 'Motor Vehicle Parts, Used'),
(1403, '441310', 'Automotive Parts and Accessories Stores', '5531', 'Auto and Home Supply Stores'),
(1404, '441310', 'Automotive Parts and Accessories Stores', '5731', 'Radio, Television, and Electronic Stores'),
(1405, '441320', 'Tire Dealers', '5014', 'Tires and Tubes'),
(1406, '441320', 'Tire Dealers', '5531', 'Auto and Home Supply Stores'),
(1407, '442110', 'Furniture Stores', '5021', 'Furniture'),
(1408, '442110', 'Furniture Stores', '5712', 'Furniture Stores'),
(1409, '442210', 'Floor Covering Stores', '5023', 'Homefurnishings'),
(1410, '442210', 'Floor Covering Stores', '5713', 'Floor Covering Stores'),
(1411, '442291', 'Window Treatment Stores', '5714', 'Drapery and Upholstery Stores'),
(1412, '442291', 'Window Treatment Stores', '5719', 'Miscellaneous Homefurnishings'),
(1413, '442299', 'All Other Home Furnishings Stores', '5719', 'Miscellaneous Homefurnishings'),
(1414, '442299', 'All Other Home Furnishings Stores', '7699', 'Repair Services, Nec'),
(1415, '443141', 'Household Appliance Stores', '5064', 'Electrical Appliances, Television and Radio'),
(1416, '443141', 'Household Appliance Stores', '5722', 'Household Appliance Stores'),
(1417, '443141', 'Household Appliance Stores', '7623', 'Refrigeration Service and Repair'),
(1418, '443141', 'Household Appliance Stores', '7629', 'Electrical Repair Shops'),
(1419, '443142', 'Electronics Stores', '5045', 'Computers, Peripherals, and Software'),
(1420, '443142', 'Electronics Stores', '5064', 'Electrical Appliances, Television and Radio'),
(1421, '443142', 'Electronics Stores', '5065', 'Electronic Parts and Equipment, Nec'),
(1422, '443142', 'Electronics Stores', '5065', 'Electronic Parts and Equipment, Nec'),
(1423, '443142', 'Electronics Stores', '5099', 'Durable Goods, Nec'),
(1424, '443142', 'Electronics Stores', '5731', 'Radio, Television, and Electronic Stores'),
(1425, '443142', 'Electronics Stores', '5734', 'Computer and Software Stores'),
(1426, '443142', 'Electronics Stores', '5735', 'Record and Prerecorded Tape Stores'),
(1427, '443142', 'Electronics Stores', '5946', 'Camera and Photographic Supply Stores'),
(1428, '443142', 'Electronics Stores', '5999', 'Miscellaneous Retail Stores, Nec'),
(1429, '443142', 'Electronics Stores', '7378', 'Computer Maintenance and Repair'),
(1430, '443142', 'Electronics Stores', '7622', 'Radio and Television Repair'),
(1431, '444110', 'Home Centers', '5031', 'Lumber, Plywood, and Millwork'),
(1432, '444110', 'Home Centers', '5211', 'Lumber and Other Building Materials'),
(1433, '444120', 'Paint and Wallpaper Stores', '5231', 'Paint, Glass, and Wallpaper Stores'),
(1434, '444130', 'Hardware Stores', '5072', 'Hardware'),
(1435, '444130', 'Hardware Stores', '5251', 'Hardware Stores'),
(1436, '444130', 'Hardware Stores', '7699', 'Repair Services, Nec'),
(1437, '444190', 'Other Building Material Dealers', '5032', 'Brick, Stone, and Related Material'),
(1438, '444190', 'Other Building Material Dealers', '5033', 'Roofing, Siding, and Insulation'),
(1439, '444190', 'Other Building Material Dealers', '5039', 'Construction Materials, Nec'),
(1440, '444190', 'Other Building Material Dealers', '5063', 'Electrical Apparatus and Equipment'),
(1441, '444190', 'Other Building Material Dealers', '5064', 'Electrical Appliances, Television and Radio'),
(1442, '444190', 'Other Building Material Dealers', '5074', 'Plumbing and Hydronic Heating Supplies'),
(1443, '444190', 'Other Building Material Dealers', '5099', 'Durable Goods, Nec'),
(1444, '444190', 'Other Building Material Dealers', '5211', 'Lumber and Other Building Materials'),
(1445, '444190', 'Other Building Material Dealers', '5231', 'Paint, Glass, and Wallpaper Stores'),
(1446, '444210', 'Outdoor Power Equipment Stores', '5083', 'Farm and Garden Machinery'),
(1447, '444210', 'Outdoor Power Equipment Stores', '5261', 'Retail Nurseries and Garden Stores'),
(1448, '444210', 'Outdoor Power Equipment Stores', '7699', 'Repair Services, Nec'),
(1449, '444220', 'Nursery, Garden Center, and Farm Supply\nStores', '5153', 'Grain and Field Beans'),
(1450, '444220', 'Nursery, Garden Center, and Farm Supply\nStores', '5159', 'Farm-product Raw Materials, Nec'),
(1451, '444220', 'Nursery, Garden Center, and Farm Supply\nStores', '5191', 'Farm Supplies'),
(1452, '444220', 'Nursery, Garden Center, and Farm Supply\nStores', '5193', 'Flowers and Florists Supplies'),
(1453, '444220', 'Nursery, Garden Center, and Farm Supply\nStores', '5261', 'Retail Nurseries and Garden Stores'),
(1454, '445110', 'Supermarkets and Other Grocery (except\nConvenience) Stores', '5141', 'Groceries, General Line'),
(1455, '445110', 'Supermarkets and Other Grocery (except\nConvenience) Stores', '5411', 'Grocery Stores'),
(1456, '445120', 'Convenience Stores', '5411', 'Grocery Stores'),
(1457, '445210', 'Meat Markets', '5144', 'Poultry and Poultry Products'),
(1458, '445210', 'Meat Markets', '5147', 'Meats and Meat Products'),
(1459, '445210', 'Meat Markets', '5421', 'Meat and Fish Markets'),
(1460, '445210', 'Meat Markets', '5499', 'Miscellaneous Food Stores'),
(1461, '445220', 'Fish and Seafood Markets', '5146', 'Fish and Seafoods'),
(1462, '445220', 'Fish and Seafood Markets', '5421', 'Meat and Fish Markets'),
(1463, '445230', 'Fruit and Vegetable Markets', '5148', 'Fresh Fruits and Vegetables'),
(1464, '445230', 'Fruit and Vegetable Markets', '5431', 'Fruit and Vegetable Markets'),
(1465, '445291', 'Baked Goods Stores', '5461', 'Retail Bakeries'),
(1466, '445292', 'Confectionery and Nut Stores', '5145', 'Confectionery'),
(1467, '445292', 'Confectionery and Nut Stores', '5441', 'Candy, Nut, and Confectionery Stores'),
(1468, '445299', 'All Other Specialty Food Stores', '5143', 'Dairy Products, Except Dried or Canned'),
(1469, '445299', 'All Other Specialty Food Stores', '5149', 'Groceries and Related Products, Nec'),
(1470, '445299', 'All Other Specialty Food Stores', '5451', 'Dairy Products Stores'),
(1471, '445299', 'All Other Specialty Food Stores', '5499', 'Miscellaneous Food Stores'),
(1472, '445310', 'Beer, Wine, and Liquor Stores', '5181', 'Beer and Ale'),
(1473, '445310', 'Beer, Wine, and Liquor Stores', '5182', 'Wine and Distilled Beverages'),
(1474, '445310', 'Beer, Wine, and Liquor Stores', '5921', 'Liquor Stores'),
(1475, '446110', 'Pharmacies and Drug Stores', '5122', 'Drugs, Proprietaries, and Sundries'),
(1476, '446110', 'Pharmacies and Drug Stores', '5912', 'Drug Stores and Proprietary Stores'),
(1477, '446120', 'Cosmetics, Beauty Supplies, and Perfume\nStores', '5087', 'Service Establishment Equipment'),
(1478, '446120', 'Cosmetics, Beauty Supplies, and Perfume\nStores', '5122', 'Drugs, Proprietaries, and Sundries'),
(1479, '446120', 'Cosmetics, Beauty Supplies, and Perfume\nStores', '5999', 'Miscellaneous Retail Stores, Nec'),
(1480, '446130', 'Optical Goods Stores', '5995', 'Optical Goods Stores'),
(1481, '446191', 'Food (Health) Supplement Stores', '5122', 'Drugs, Proprietaries, and Sundries'),
(1482, '446191', 'Food (Health) Supplement Stores', '5499', 'Miscellaneous Food Stores'),
(1483, '446199', 'All Other Health and Personal Care Stores', '5047', 'Medical and Hospital Equipment'),
(1484, '446199', 'All Other Health and Personal Care Stores', '5999', 'Miscellaneous Retail Stores, Nec'),
(1485, '447110', 'Gasoline Stations with Convenience Stores', '5411', 'Grocery Stores'),
(1486, '447110', 'Gasoline Stations with Convenience Stores', '5541', 'Gasoline Service Stations'),
(1487, '447190', 'Other Gasoline Stations', '5541', 'Gasoline Service Stations'),
(1488, '448110', 'Men\'s Clothing Stores', '5136', 'Men\'s and Boy\'s Clothing'),
(1489, '448110', 'Men\'s Clothing Stores', '5611', 'Men\'s and Boys\' Clothing Stores'),
(1490, '448120', 'Women\'s Clothing Stores', '5137', 'Women\'s and Children\'s Clothing'),
(1491, '448120', 'Women\'s Clothing Stores', '5621', 'Women\'s Clothing Stores'),
(1492, '448130', 'Children\'s and Infants\' Clothing Stores', '5137', 'Women\'s and Children\'s Clothing'),
(1493, '448130', 'Children\'s and Infants\' Clothing Stores', '5641', 'Children\'s and Infants\' Wear Stores'),
(1494, '448140', 'Family Clothing Stores', '5651', 'Family Clothing Stores'),
(1495, '448150', 'Clothing Accessories Stores', '5611', 'Men\'s and Boys\' Clothing Stores'),
(1496, '448150', 'Clothing Accessories Stores', '5632', 'Women\'s Accessory and Specialty Stores'),
(1497, '448150', 'Clothing Accessories Stores', '5699', 'Miscellaneous Apparel and Accessories'),
(1498, '448190', 'Other Clothing Stores', '5136', 'Men\'s and Boy\'s Clothing'),
(1499, '448190', 'Other Clothing Stores', '5137', 'Women\'s and Children\'s Clothing'),
(1500, '448190', 'Other Clothing Stores', '5621', 'Women\'s Clothing Stores'),
(1501, '448190', 'Other Clothing Stores', '5632', 'Women\'s Accessory and Specialty Stores'),
(1502, '448190', 'Other Clothing Stores', '5699', 'Miscellaneous Apparel and Accessories'),
(1503, '448210', 'Shoe Stores', '5139', 'Footwear'),
(1504, '448210', 'Shoe Stores', '5661', 'Shoe Stores'),
(1505, '448310', 'Jewelry Stores', '5094', 'Jewelry and Precious Stones'),
(1506, '448310', 'Jewelry Stores', '5944', 'Jewelry Stores'),
(1507, '448310', 'Jewelry Stores', '7631', 'Watch, Clock, and Jewelry Repair'),
(1508, '448320', 'Luggage and Leather Goods Stores', '5948', 'Luggage and Leather Goods Stores'),
(1509, '451110', 'Sporting Goods Stores', '5091', 'Sporting and Recreation Goods'),
(1510, '451110', 'Sporting Goods Stores', '5099', 'Durable Goods, Nec'),
(1511, '451110', 'Sporting Goods Stores', '5941', 'Sporting Goods and Bicycle Shops'),
(1512, '451110', 'Sporting Goods Stores', '7699', 'Repair Services, Nec'),
(1513, '451120', 'Hobby, Toy, and Game Stores', '5092', 'Toys and Hobby Goods and Supplies'),
(1514, '451120', 'Hobby, Toy, and Game Stores', '5099', 'Durable Goods, Nec'),
(1515, '451120', 'Hobby, Toy, and Game Stores', '5945', 'Hobby, Toy, and Game Shops'),
(1516, '451130', 'Sewing, Needlework, and Piece Goods\nStores', '5131', 'Piece Goods and Notions'),
(1517, '451130', 'Sewing, Needlework, and Piece Goods\nStores', '5714', 'Drapery and Upholstery Stores'),
(1518, '451130', 'Sewing, Needlework, and Piece Goods\nStores', '5949', 'Sewing, Needlework, and Piece Goods'),
(1519, '451140', 'Musical Instrument and Supplies Stores', '5736', 'Musical Instrument Stores'),
(1520, '451211', 'Book Stores', '5192', 'Books, Periodicals, and Newspapers'),
(1521, '451211', 'Book Stores', '5942', 'Book Stores'),
(1522, '451212', 'News Dealers and Newsstands', '5994', 'News Dealers and Newsstands'),
(1523, '452210', 'Department Stores', '5311', 'Department Stores'),
(1524, '452210', 'Department Stores', '5399', 'Miscellaneous General Merchandise'),
(1525, '452210', 'Department Stores', '5411', 'Grocery Stores'),
(1526, '452311', 'Warehouse Clubs and Supercenters', '5311', 'Department Stores'),
(1527, '452311', 'Warehouse Clubs and Supercenters', '5399', 'Miscellaneous General Merchandise'),
(1528, '452311', 'Warehouse Clubs and Supercenters', '5411', 'Grocery Stores');
INSERT INTO `naics` (`id`, `naics_code`, `description`, `sic_code`, `ins`) VALUES
(1529, '452319', 'All Other General Merchandise Stores', '5331', 'Variety Stores'),
(1530, '452319', 'All Other General Merchandise Stores', '5399', 'Miscellaneous General Merchandise'),
(1531, '452319', 'All Other General Merchandise Stores', '5531', 'Auto and Home Supply Stores'),
(1532, '453110', 'Florists', '5992', 'Florists'),
(1533, '453210', 'Office Supplies and Stationery Stores', '5044', 'Office Equipment'),
(1534, '453210', 'Office Supplies and Stationery Stores', '5049', 'Professional Equipment, Nec'),
(1535, '453210', 'Office Supplies and Stationery Stores', '5111', 'Printing and Writing Paper'),
(1536, '453210', 'Office Supplies and Stationery Stores', '5112', 'Stationery and Office Supplies'),
(1537, '453210', 'Office Supplies and Stationery Stores', '5943', 'Stationery Stores'),
(1538, '453220', 'Gift, Novelty, and Souvenir Stores', '5199', 'Nondurable Goods, Nec'),
(1539, '453220', 'Gift, Novelty, and Souvenir Stores', '5947', 'Gift, Novelty, and Souvenir Shop'),
(1540, '453310', 'Used Merchandise Stores', '5932', 'Used Merchandise Stores'),
(1541, '453910', 'Pet and Pet Supplies Stores', '5149', 'Groceries and Related Products, Nec'),
(1542, '453910', 'Pet and Pet Supplies Stores', '5199', 'Nondurable Goods, Nec'),
(1543, '453910', 'Pet and Pet Supplies Stores', '5999', 'Miscellaneous Retail Stores, Nec'),
(1544, '453920', 'Art Dealers', '5999', 'Miscellaneous Retail Stores, Nec'),
(1545, '453930', 'Manufactured (Mobile) Home Dealers', '5271', 'Mobile Home Dealers'),
(1546, '453991', 'Tobacco Stores', '5194', 'Tobacco and Tobacco Products'),
(1547, '453991', 'Tobacco Stores', '5199', 'Nondurable Goods, Nec'),
(1548, '453991', 'Tobacco Stores', '5993', 'Tobacco Stores and Stands'),
(1549, '453998', 'All Other Miscellaneous Store Retailers\n(except Tobacco Stores)', '5085', 'Industrial Supplies'),
(1550, '453998', 'All Other Miscellaneous Store Retailers\n(except Tobacco Stores)', '5113', 'Industrial and Personal Service Paper'),
(1551, '453998', 'All Other Miscellaneous Store Retailers\n(except Tobacco Stores)', '5162', 'Plastics Materials and Basic Shapes'),
(1552, '453998', 'All Other Miscellaneous Store Retailers\n(except Tobacco Stores)', '5999', 'Miscellaneous Retail Stores, Nec'),
(1553, '454110', 'Electronic Shopping and Mail-Order\nHouses', '5961', 'Catalog and Mail-order Houses'),
(1554, '454210', 'Vending Machine Operators', '5962', 'Merchandising Machine Operators'),
(1555, '454310', 'Fuel Dealers', '5171', 'Petroleum Bulk Stations and Terminals'),
(1556, '454310', 'Fuel Dealers', '5171', 'Petroleum Bulk Stations and Terminals'),
(1557, '454310', 'Fuel Dealers', '5983', 'Fuel Oil Dealers'),
(1558, '454310', 'Fuel Dealers', '5984', 'Liquefied Petroleum Gas Dealers'),
(1559, '454310', 'Fuel Dealers', '5989', 'Fuel Dealers, Nec'),
(1560, '454390', 'Other Direct Selling Establishments', '5142', 'Packaged Frozen Goods'),
(1561, '454390', 'Other Direct Selling Establishments', '5411', 'Grocery Stores'),
(1562, '454390', 'Other Direct Selling Establishments', '5421', 'Meat and Fish Markets'),
(1563, '454390', 'Other Direct Selling Establishments', '5431', 'Fruit and Vegetable Markets'),
(1564, '454390', 'Other Direct Selling Establishments', '5963', 'Direct Selling Establishments'),
(1565, '481111', 'Scheduled Passenger Air Transportation', '4512', 'Air Transportation, Scheduled'),
(1566, '481112', 'Scheduled Freight Air Transportation', '4512', 'Air Transportation, Scheduled'),
(1567, '481211', 'Nonscheduled Chartered Passenger Air\nTransportation', '4522', 'Air Transportation, Nonscheduled'),
(1568, '481212', 'Nonscheduled Chartered Freight Air\nTransportation', '4522', 'Air Transportation, Nonscheduled'),
(1569, '481219', 'Other Nonscheduled Air Transportation', '4522', 'Air Transportation, Nonscheduled'),
(1570, '481219', 'Other Nonscheduled Air Transportation', '7319', 'Advertising, Nec'),
(1571, '481219', 'Other Nonscheduled Air Transportation', '7335', 'Commercial Photography'),
(1572, '481219', 'Other Nonscheduled Air Transportation', '7997', 'Membership Sports and Recreation Clubs'),
(1573, '482111', 'Line-Haul Railroads', '4011', 'Railroads, Line-haul Operating'),
(1574, '482112', 'Short Line Railroads', '4013', 'Switching and Terminal Services'),
(1575, '483111', 'Deep Sea Freight Transportation', '4412', 'Deep Sea Foreign Transportation of\nFreight'),
(1576, '483112', 'Deep Sea Passenger Transportation', '4481', 'Deep Sea Passenger Transportation,\nExcept Ferry'),
(1577, '483113', 'Coastal and Great Lakes Freight\nTransportation', '4424', 'Deep Sea Domestic Transportation of\nFreight'),
(1578, '483113', 'Coastal and Great Lakes Freight\nTransportation', '4432', 'Freight Transportation On The Great\nLakes'),
(1579, '483114', 'Coastal and Great Lakes Passenger\nTransportation', '4481', 'Deep Sea Passenger Transportation,\nExcept Ferry'),
(1580, '483114', 'Coastal and Great Lakes Passenger\nTransportation', '4482', 'Ferries'),
(1581, '483211', 'Inland Water Freight Transportation', '4449', 'Water Transportation of Freight'),
(1582, '483211', 'Inland Water Freight Transportation', '4499', 'Water Transportation Services, Nec'),
(1583, '483212', 'Inland Water Passenger Transportation', '4482', 'Ferries'),
(1584, '483212', 'Inland Water Passenger Transportation', '4489', 'Water Passenger Transportation'),
(1585, '484110', 'General Freight Trucking, Local', '4212', 'Local Trucking, Without Storage'),
(1586, '484110', 'General Freight Trucking, Local', '4214', 'Local Trucking With Storage'),
(1587, '484121', 'General Freight Trucking, Long-Distance,\nTruckload', '4213', 'Trucking, Except Local'),
(1588, '484122', 'General Freight Trucking, Long-Distance,\nLess Than Truckload', '4213', 'Trucking, Except Local'),
(1589, '484210', 'Used Household and Office Goods Moving', '4212', 'Local Trucking, Without Storage'),
(1590, '484210', 'Used Household and Office Goods Moving', '4213', 'Trucking, Except Local'),
(1591, '484210', 'Used Household and Office Goods Moving', '4214', 'Local Trucking With Storage'),
(1592, '484220', 'Specialized Freight (except Used Goods)\nTrucking, Local', '4212', 'Local Trucking, Without Storage'),
(1593, '484220', 'Specialized Freight (except Used Goods)\nTrucking, Local', '4214', 'Local Trucking With Storage'),
(1594, '484230', 'Specialized Freight (except Used Goods)\nTrucking, Long-Distance', '4213', 'Trucking, Except Local'),
(1595, '485111', 'Mixed Mode Transit Systems', '4111', 'Local and Suburban Transit'),
(1596, '485112', 'Commuter Rail Systems', '4111', 'Local and Suburban Transit'),
(1597, '485113', 'Bus and Other Motor Vehicle Transit\nSystems', '4111', 'Local and Suburban Transit'),
(1598, '485119', 'Other Urban Transit Systems', '4111', 'Local and Suburban Transit'),
(1599, '485210', 'Interurban and Rural Bus Transportation', '4131', 'Intercity and Rural Bus Transportation'),
(1600, '485310', 'Taxi Service', '4121', 'Taxicabs'),
(1601, '485310', 'Taxi Service', '4899', 'Communication Services, Nec'),
(1602, '485320', 'Limousine Service', '4119', 'Local Passenger Transportation, Nec'),
(1603, '485410', 'School and Employee Bus Transportation', '4119', 'Local Passenger Transportation, Nec'),
(1604, '485410', 'School and Employee Bus Transportation', '4151', 'School Buses'),
(1605, '485510', 'Charter Bus Industry', '4141', 'Local Bus Charter Service'),
(1606, '485510', 'Charter Bus Industry', '4142', 'Bus Charter Service, Except Local'),
(1607, '485991', 'Special Needs Transportation', '4119', 'Local Passenger Transportation, Nec'),
(1608, '485999', 'All Other Transit and Ground Passenger\nTransportation', '4111', 'Local and Suburban Transit'),
(1609, '485999', 'All Other Transit and Ground Passenger\nTransportation', '4119', 'Local Passenger Transportation, Nec'),
(1610, '486110', 'Pipeline Transportation of Crude Oil', '4612', 'Crude Petroleum Pipelines'),
(1611, '486210', 'Pipeline Transportation of Natural Gas', '4922', 'Natural Gas Transmission'),
(1612, '486210', 'Pipeline Transportation of Natural Gas', '4923', 'Gas Transmission and Distribution'),
(1613, '486910', 'Pipeline Transportation of Refined\nPetroleum Products', '4613', 'Refined Petroleum Pipelines'),
(1614, '486990', 'All Other Pipeline Transportation', '4619', 'Pipelines, Nec'),
(1615, '487110', 'Scenic and Sightseeing Transportation,\nLand', '4119', 'Local Passenger Transportation, Nec'),
(1616, '487110', 'Scenic and Sightseeing Transportation,\nLand', '4789', 'Transportation Services, Nec'),
(1617, '487110', 'Scenic and Sightseeing Transportation,\nLand', '7999', 'Amusement and Recreation, Nec'),
(1618, '487210', 'Scenic and Sightseeing Transportation,\nWater', '4489', 'Water Passenger Transportation'),
(1619, '487210', 'Scenic and Sightseeing Transportation,\nWater', '7999', 'Amusement and Recreation, Nec'),
(1620, '487990', 'Scenic and Sightseeing Transportation,\nOther', '4522', 'Air Transportation, Nonscheduled'),
(1621, '487990', 'Scenic and Sightseeing Transportation,\nOther', '7999', 'Amusement and Recreation, Nec'),
(1622, '488111', 'Air Traffic Control', '4581', 'Airports, Flying Fields, and Services'),
(1623, '488111', 'Air Traffic Control', '9621', 'Regulation, Administration of\nTransportation'),
(1624, '488119', 'Other Airport Operations', '4581', 'Airports, Flying Fields, and Services'),
(1625, '488119', 'Other Airport Operations', '4959', 'Sanitary Services, Nec'),
(1626, '488119', 'Other Airport Operations', '7997', 'Membership Sports and Recreation Clubs'),
(1627, '488190', 'Other Support Activities for Air\nTransportation', '4581', 'Airports, Flying Fields, and Services'),
(1628, '488210', 'Support Activities for Rail Transportation', '4013', 'Switching and Terminal Services'),
(1629, '488210', 'Support Activities for Rail Transportation', '4741', 'Rental of Railroad Cars'),
(1630, '488210', 'Support Activities for Rail Transportation', '4789', 'Transportation Services, Nec'),
(1631, '488310', 'Port and Harbor Operations', '4491', 'Marine Cargo Handling'),
(1632, '488310', 'Port and Harbor Operations', '4499', 'Water Transportation Services, Nec'),
(1633, '488320', 'Marine Cargo Handling', '4491', 'Marine Cargo Handling'),
(1634, '488330', 'Navigational Services to Shipping', '4492', 'Towing and Tugboat Service'),
(1635, '488330', 'Navigational Services to Shipping', '4499', 'Water Transportation Services, Nec'),
(1636, '488390', 'Other Support Activities for Water\nTransportation', '3731', 'Shipbuilding and Repairing'),
(1637, '488390', 'Other Support Activities for Water\nTransportation', '4499', 'Water Transportation Services, Nec'),
(1638, '488390', 'Other Support Activities for Water\nTransportation', '4785', 'Inspection and Fixed Facilities'),
(1639, '488390', 'Other Support Activities for Water\nTransportation', '7699', 'Repair Services, Nec'),
(1640, '488410', 'Motor Vehicle Towing', '7549', 'Automotive Services, Nec'),
(1641, '488490', 'Other Support Activities for Road\nTransportation', '4173', 'Bus Terminal and Service Facilities'),
(1642, '488490', 'Other Support Activities for Road\nTransportation', '4231', 'Trucking Terminal Facilities'),
(1643, '488490', 'Other Support Activities for Road\nTransportation', '4785', 'Inspection and Fixed Facilities'),
(1644, '488490', 'Other Support Activities for Road\nTransportation', '4959', 'Sanitary Services, Nec'),
(1645, '488490', 'Other Support Activities for Road\nTransportation', '7389', 'Business Services, Nec'),
(1646, '488510', 'Freight Transportation Arrangement', '4731', 'Freight Transportation Arrangement'),
(1647, '488991', 'Packing and Crating', '4783', 'Packing and Crating'),
(1648, '488999', 'All Other Support Activities for\nTransportation', '4729', 'Passenger Transportation Arrangement'),
(1649, '488999', 'All Other Support Activities for\nTransportation', '4789', 'Transportation Services, Nec'),
(1650, '491110', 'Postal Service', '4311', 'U.S. Postal Service'),
(1651, '491110', 'Postal Service', '7389', 'Business Services, Nec'),
(1652, '492110', 'Couriers and Express Delivery Services', '4215', 'Courier Services, Except By Air'),
(1653, '492110', 'Couriers and Express Delivery Services', '4513', 'Air Courier Services'),
(1654, '492210', 'Local Messengers and Local Delivery', '4215', 'Courier Services, Except By Air'),
(1655, '493110', 'General Warehousing and Storage', '4225', 'General Warehousing and Storage'),
(1656, '493110', 'General Warehousing and Storage', '4226', 'Special Warehousing and Storage, Nec'),
(1657, '493120', 'Refrigerated Warehousing and Storage', '4222', 'Refrigerated Warehousing and Storage'),
(1658, '493120', 'Refrigerated Warehousing and Storage', '4226', 'Special Warehousing and Storage, Nec'),
(1659, '493130', 'Farm Product Warehousing and Storage', '4221', 'Farm Product Warehousing and Storage'),
(1660, '493190', 'Other Warehousing and Storage', '4226', 'Special Warehousing and Storage, Nec'),
(1661, '511110', 'Newspaper Publishers', '2711', 'Newspapers'),
(1662, '511120', 'Periodical Publishers', '2721', 'Periodicals'),
(1663, '511120', 'Periodical Publishers', '2741', 'Miscellaneous Publishing'),
(1664, '511130', 'Book Publishers', '2731', 'Book Publishing'),
(1665, '511130', 'Book Publishers', '2741', 'Miscellaneous Publishing'),
(1666, '511140', 'Directory and Mailing List Publishers', '2741', 'Miscellaneous Publishing'),
(1667, '511140', 'Directory and Mailing List Publishers', '7331', 'Direct Mail Advertising Services'),
(1668, '511191', 'Greeting Card Publishers', '2771', 'Greeting Cards'),
(1669, '511199', 'All Other Publishers', '2741', 'Miscellaneous Publishing'),
(1670, '511210', 'Software Publishers', '7372', 'Prepackaged Software'),
(1671, '512110', 'Motion Picture and Video Production', '7812', 'Motion Picture and Video Production'),
(1672, '512120', 'Motion Picture and Video Distribution', '7822', 'Motion Picture and Tape Distribution'),
(1673, '512120', 'Motion Picture and Video Distribution', '7829', 'Motion Picture Distribution Services'),
(1674, '512131', 'Motion Picture Theaters (except Drive-Ins)', '7832', 'Motion Picture Theaters, Except Drive-in'),
(1675, '512132', 'Drive-In Motion Picture Theaters', '7833', 'Drive-in Motion Picture Theaters'),
(1676, '512191', 'Teleproduction and Other Postproduction\nServices', '7819', 'Services Allied To Motion Pictures'),
(1677, '512199', 'Other Motion Picture and Video Industries', '7819', 'Services Allied To Motion Pictures'),
(1678, '512199', 'Other Motion Picture and Video Industries', '7829', 'Motion Picture Distribution Services'),
(1679, '512230', 'Music Publishers', '2731', 'Book Publishing'),
(1680, '512230', 'Music Publishers', '2741', 'Miscellaneous Publishing'),
(1681, '512230', 'Music Publishers', '8999', 'Services, Nec'),
(1682, '512240', 'Sound Recording Studios', '7389', 'Business Services, Nec'),
(1683, '512250', 'Record Production and Distribution', '3652', 'Prerecorded Records and Tapes'),
(1684, '512250', 'Record Production and Distribution', '8999', 'Services, Nec'),
(1685, '512290', 'Other Sound Recording Industries', '7389', 'Business Services, Nec'),
(1686, '512290', 'Other Sound Recording Industries', '7922', 'Theatrical Producers and Services'),
(1687, '515111', 'Radio Networks', '4832', 'Radio Broadcasting Stations'),
(1688, '515112', 'Radio Stations', '4832', 'Radio Broadcasting Stations'),
(1689, '515120', 'Television Broadcasting', '4833', 'Television Broadcasting Stations'),
(1690, '515210', 'Cable and Other Subscription Programming', '4841', 'Cable and Other Pay Television Services'),
(1691, '517311', 'Wired Telecommunications Carriers', '4813', 'Telephone Communication, Except Radio'),
(1692, '517311', 'Wired Telecommunications Carriers', '4822', 'Telegraph and Other Communications'),
(1693, '517311', 'Wired Telecommunications Carriers', '4841', 'Cable and Other Pay Television Services'),
(1694, '517311', 'Wired Telecommunications Carriers', '7375', 'Information Retrieval Services'),
(1695, '517312', 'Wireless Telecommunications Carriers\n(except Satellite)', '4812', 'Radiotelephone Communication'),
(1696, '517312', 'Wireless Telecommunications Carriers\n(except Satellite)', '4899', 'Communication Services, Nec'),
(1697, '517410', 'Satellite Telecommunications', '4899', 'Communication Services, Nec'),
(1698, '517911', 'Telecommunications Resellers', '4812', 'Radiotelephone Communication'),
(1699, '517911', 'Telecommunications Resellers', '4813', 'Telephone Communication, Except Radio'),
(1700, '517919', 'All Other Telecommunications', '4899', 'Communication Services, Nec'),
(1701, '517919', 'All Other Telecommunications', '7375', 'Information Retrieval Services'),
(1702, '518210', 'Data Processing, Hosting, and Related\nServices', '7374', 'Data Processing and Preparation'),
(1703, '518210', 'Data Processing, Hosting, and Related\nServices', '7379', 'Computer Related Services, Nec'),
(1704, '518210', 'Data Processing, Hosting, and Related\nServices', '7389', 'Business Services, Nec'),
(1705, '519110', 'News Syndicates', '7383', 'News Syndicates'),
(1706, '519120', 'Libraries and Archives', '7829', 'Motion Picture Distribution Services'),
(1707, '519120', 'Libraries and Archives', '8231', 'Libraries'),
(1708, '519130', 'Internet Publishing and Broadcasting and\nWeb Search Portals', '2711', 'Newspapers'),
(1709, '519130', 'Internet Publishing and Broadcasting and\nWeb Search Portals', '2721', 'Periodicals'),
(1710, '519130', 'Internet Publishing and Broadcasting and\nWeb Search Portals', '2731', 'Book Publishing'),
(1711, '519130', 'Internet Publishing and Broadcasting and\nWeb Search Portals', '2741', 'Miscellaneous Publishing'),
(1712, '519130', 'Internet Publishing and Broadcasting and\nWeb Search Portals', '2771', 'Greeting Cards'),
(1713, '519130', 'Internet Publishing and Broadcasting and\nWeb Search Portals', '8999', 'Services, Nec'),
(1714, '519130', 'Internet Publishing and Broadcasting and\nWeb Search Portals', '8999', 'Services, Nec'),
(1715, '519190', 'All Other Information Services', '7389', 'Business Services, Nec'),
(1716, '521110', 'Monetary Authorities-Central Bank', '6011', 'Federal Reserve Banks'),
(1717, '522110', 'Commercial Banking', '6021', 'National Commercial Banks'),
(1718, '522110', 'Commercial Banking', '6022', 'State Commercial Banks'),
(1719, '522110', 'Commercial Banking', '6029', 'Commercial Banks, Nec'),
(1720, '522110', 'Commercial Banking', '6081', 'Foreign Bank and Branches and Agencies'),
(1721, '522120', 'Savings Institutions', '6035', 'Federal Savings Institutions'),
(1722, '522120', 'Savings Institutions', '6036', 'Savings Institutions, Except Federal'),
(1723, '522130', 'Credit Unions', '6061', 'Federal Credit Unions'),
(1724, '522130', 'Credit Unions', '6062', 'State Credit Unions'),
(1725, '522190', 'Other Depository Credit Intermediation', '6022', 'State Commercial Banks'),
(1726, '522210', 'Credit Card Issuing', '6021', 'National Commercial Banks'),
(1727, '522210', 'Credit Card Issuing', '6022', 'State Commercial Banks'),
(1728, '522210', 'Credit Card Issuing', '6141', 'Personal Credit Institutions'),
(1729, '522210', 'Credit Card Issuing', '6153', 'Short-term Business Credit'),
(1730, '522220', 'Sales Financing', '6141', 'Personal Credit Institutions'),
(1731, '522220', 'Sales Financing', '6153', 'Short-term Business Credit'),
(1732, '522220', 'Sales Financing', '6159', 'Miscellaneous Business Credit'),
(1733, '522291', 'Consumer Lending', '6141', 'Personal Credit Institutions'),
(1734, '522292', 'Real Estate Credit', '6111', 'Federal and Federally Sponsored Credit'),
(1735, '522292', 'Real Estate Credit', '6159', 'Miscellaneous Business Credit'),
(1736, '522292', 'Real Estate Credit', '6162', 'Mortgage Bankers and Correspondents'),
(1737, '522293', 'International Trade Financing', '6081', 'Foreign Bank and Branches and Agencies'),
(1738, '522293', 'International Trade Financing', '6082', 'Foreign Trade and International Banks'),
(1739, '522293', 'International Trade Financing', '6111', 'Federal and Federally Sponsored Credit'),
(1740, '522293', 'International Trade Financing', '6159', 'Miscellaneous Business Credit'),
(1741, '522294', 'Secondary Market Financing', '6111', 'Federal and Federally Sponsored Credit'),
(1742, '522294', 'Secondary Market Financing', '6159', 'Miscellaneous Business Credit'),
(1743, '522298', 'All Other Nondepository Credit\nIntermediation', '5932', 'Used Merchandise Stores'),
(1744, '522298', 'All Other Nondepository Credit\nIntermediation', '6019', 'Central Reserve Depository, Nec'),
(1745, '522298', 'All Other Nondepository Credit\nIntermediation', '6081', 'Foreign Bank and Branches and Agencies'),
(1746, '522298', 'All Other Nondepository Credit\nIntermediation', '6082', 'Foreign Trade and International Banks'),
(1747, '522298', 'All Other Nondepository Credit\nIntermediation', '6111', 'Federal and Federally Sponsored Credit'),
(1748, '522298', 'All Other Nondepository Credit\nIntermediation', '6141', 'Personal Credit Institutions'),
(1749, '522298', 'All Other Nondepository Credit\nIntermediation', '6153', 'Short-term Business Credit'),
(1750, '522298', 'All Other Nondepository Credit\nIntermediation', '6159', 'Miscellaneous Business Credit'),
(1751, '522310', 'Mortgage and Nonmortgage Loan Brokers', '6163', 'Loan Brokers'),
(1752, '522320', 'Financial Transactions Processing,\nReserve, and Clearinghouse Activities', '6099', 'Functions Related To Depository Banking'),
(1753, '522320', 'Financial Transactions Processing,\nReserve, and Clearinghouse Activities', '6153', 'Short-term Business Credit'),
(1754, '522320', 'Financial Transactions Processing,\nReserve, and Clearinghouse Activities', '7389', 'Business Services, Nec'),
(1755, '522390', 'Other Activities Related to Credit\nIntermediation', '6099', 'Functions Related To Depository Banking'),
(1756, '522390', 'Other Activities Related to Credit\nIntermediation', '6162', 'Mortgage Bankers and Correspondents'),
(1757, '523110', 'Investment Banking and Securities Dealing', '6211', 'Security Brokers and Dealers'),
(1758, '523120', 'Securities Brokerage', '6211', 'Security Brokers and Dealers'),
(1759, '523130', 'Commodity Contracts Dealing', '6099', 'Functions Related To Depository Banking'),
(1760, '523130', 'Commodity Contracts Dealing', '6221', 'Commodity Contracts Brokers, Dealers'),
(1761, '523130', 'Commodity Contracts Dealing', '6799', 'Investors, Nec'),
(1762, '523140', 'Commodity Contracts Brokerage', '6221', 'Commodity Contracts Brokers, Dealers'),
(1763, '523210', 'Securities and Commodity Exchanges', '6231', 'Security and Commodity Exchanges'),
(1764, '523910', 'Miscellaneous Intermediation', '6153', 'Short-term Business Credit'),
(1765, '523910', 'Miscellaneous Intermediation', '6211', 'Security Brokers and Dealers'),
(1766, '523910', 'Miscellaneous Intermediation', '6792', 'Oil Royalty Traders'),
(1767, '523910', 'Miscellaneous Intermediation', '6799', 'Investors, Nec'),
(1768, '523920', 'Portfolio Management', '6282', 'Investment Advice'),
(1769, '523920', 'Portfolio Management', '6371', 'Pension, Health, and Welfare Funds'),
(1770, '523920', 'Portfolio Management', '6733', 'Trusts, Nec'),
(1771, '523920', 'Portfolio Management', '6799', 'Investors, Nec'),
(1772, '523930', 'Investment Advice', '6282', 'Investment Advice'),
(1773, '523991', 'Trust, Fiduciary, and Custody Activities', '6091', 'Nondeposit Trust Facilities'),
(1774, '523991', 'Trust, Fiduciary, and Custody Activities', '6099', 'Functions Related To Depository Banking'),
(1775, '523991', 'Trust, Fiduciary, and Custody Activities', '6289', 'Security and Commodity Service'),
(1776, '523991', 'Trust, Fiduciary, and Custody Activities', '6733', 'Trusts, Nec'),
(1777, '523999', 'Miscellaneous Financial Investment\nActivities', '6211', 'Security Brokers and Dealers'),
(1778, '523999', 'Miscellaneous Financial Investment\nActivities', '6289', 'Security and Commodity Service'),
(1779, '524113', 'Direct Life Insurance Carriers', '6311', 'Life Insurance'),
(1780, '524113', 'Direct Life Insurance Carriers', '6321', 'Accident and Health Insurance'),
(1781, '524114', 'Direct Health and Medical Insurance\nCarriers', '6321', 'Accident and Health Insurance'),
(1782, '524114', 'Direct Health and Medical Insurance\nCarriers', '6324', 'Hospital and Medical Service Plans'),
(1783, '524126', 'Direct Property and Casualty Insurance\nCarriers', '6331', 'Fire, Marine, and Casualty Insurance'),
(1784, '524126', 'Direct Property and Casualty Insurance\nCarriers', '6351', 'Surety Insurance'),
(1785, '524127', 'Direct Title Insurance Carriers', '6361', 'Title Insurance'),
(1786, '524128', 'Other Direct Insurance (except Life, Health,\nand Medical) Carriers', '6311', 'Life Insurance'),
(1787, '524128', 'Other Direct Insurance (except Life, Health,\nand Medical) Carriers', '6331', 'Fire, Marine, and Casualty Insurance'),
(1788, '524128', 'Other Direct Insurance (except Life, Health,\nand Medical) Carriers', '6351', 'Surety Insurance'),
(1789, '524128', 'Other Direct Insurance (except Life, Health,\nand Medical) Carriers', '6399', 'Insurance Carriers, Nec'),
(1790, '524130', 'Reinsurance Carriers', '6311', 'Life Insurance'),
(1791, '524130', 'Reinsurance Carriers', '6321', 'Accident and Health Insurance'),
(1792, '524130', 'Reinsurance Carriers', '6324', 'Hospital and Medical Service Plans'),
(1793, '524130', 'Reinsurance Carriers', '6331', 'Fire, Marine, and Casualty Insurance'),
(1794, '524130', 'Reinsurance Carriers', '6351', 'Surety Insurance'),
(1795, '524130', 'Reinsurance Carriers', '6361', 'Title Insurance'),
(1796, '524210', 'Insurance Agencies and Brokerages', '6411', 'Insurance Agents, Brokers, and Service'),
(1797, '524291', 'Claims Adjusting', '6411', 'Insurance Agents, Brokers, and Service'),
(1798, '524292', 'Third Party Administration of Insurance and\nPension Funds', '6371', 'Pension, Health, and Welfare Funds'),
(1799, '524292', 'Third Party Administration of Insurance and\nPension Funds', '6411', 'Insurance Agents, Brokers, and Service'),
(1800, '524298', 'All Other Insurance Related Activities', '6411', 'Insurance Agents, Brokers, and Service'),
(1801, '525110', 'Pension Funds', '6371', 'Pension, Health, and Welfare Funds'),
(1802, '525120', 'Health and Welfare Funds', '6371', 'Pension, Health, and Welfare Funds'),
(1803, '525190', 'Other Insurance Funds', '6321', 'Accident and Health Insurance'),
(1804, '525190', 'Other Insurance Funds', '6324', 'Hospital and Medical Service Plans'),
(1805, '525190', 'Other Insurance Funds', '6331', 'Fire, Marine, and Casualty Insurance'),
(1806, '525190', 'Other Insurance Funds', '6733', 'Trusts, Nec'),
(1807, '525910', 'Open-End Investment Funds', '6722', 'Management Investment, Open-ended'),
(1808, '525920', 'Trusts, Estates, and Agency Accounts', '6733', 'Trusts, Nec'),
(1809, '525990', 'Other Financial Vehicles', '6371', 'Pension, Health, and Welfare Funds'),
(1810, '525990', 'Other Financial Vehicles', '6726', 'Investment Offices, Nec'),
(1811, '525990', 'Other Financial Vehicles', '6798', 'Real Estate Investment Trusts'),
(1812, '531110', 'Lessors of Residential Buildings and\nDwellings', '6513', 'Apartment Building Operators'),
(1813, '531110', 'Lessors of Residential Buildings and\nDwellings', '6514', 'Dwelling Operators, Except Apartments'),
(1814, '531110', 'Lessors of Residential Buildings and\nDwellings', '6531', 'Real Estate Agents and Managers'),
(1815, '531110', 'Lessors of Residential Buildings and\nDwellings', '6798', 'Real Estate Investment Trusts'),
(1816, '531120', 'Lessors of Nonresidential Buildings (except\nMiniwarehouses)', '6512', 'Nonresidential Building Operators'),
(1817, '531120', 'Lessors of Nonresidential Buildings (except\nMiniwarehouses)', '6798', 'Real Estate Investment Trusts'),
(1818, '531130', 'Lessors of Miniwarehouses and Self-\nStorage Units', '4225', 'General Warehousing and Storage'),
(1819, '531130', 'Lessors of Miniwarehouses and Self-\nStorage Units', '6798', 'Real Estate Investment Trusts'),
(1820, '531190', 'Lessors of Other Real Estate Property', '6515', 'Mobile Home Site Operators'),
(1821, '531190', 'Lessors of Other Real Estate Property', '6517', 'Railroad Property Lessors'),
(1822, '531190', 'Lessors of Other Real Estate Property', '6519', 'Real Property Lessors, Nec'),
(1823, '531190', 'Lessors of Other Real Estate Property', '6798', 'Real Estate Investment Trusts'),
(1824, '531210', 'Offices of Real Estate Agents and Brokers', '6531', 'Real Estate Agents and Managers'),
(1825, '531311', 'Residential Property Managers', '6531', 'Real Estate Agents and Managers'),
(1826, '531312', 'Nonresidential Property Managers', '6531', 'Real Estate Agents and Managers'),
(1827, '531320', 'Offices of Real Estate Appraisers', '6531', 'Real Estate Agents and Managers'),
(1828, '531390', 'Other Activities Related to Real Estate', '6531', 'Real Estate Agents and Managers'),
(1829, '532111', 'Passenger Car Rental', '7514', 'Passenger Car Rental'),
(1830, '532112', 'Passenger Car Leasing', '7515', 'Passenger Car Leasing'),
(1831, '532120', 'Truck, Utility Trailer, and RV (Recreational\nVehicle) Rental and Leasing', '7513', 'Truck Rental and Leasing, Without Drivers'),
(1832, '532120', 'Truck, Utility Trailer, and RV (Recreational\nVehicle) Rental and Leasing', '7519', 'Utility Trailer Rental'),
(1833, '532210', 'Consumer Electronics and Appliances\nRental', '7359', 'Equipment Rental and Leasing, Nec'),
(1834, '532281', 'Formal Wear and Costume Rental', '7299', 'Miscellaneous Personal Services'),
(1835, '532281', 'Formal Wear and Costume Rental', '7819', 'Services Allied To Motion Pictures'),
(1836, '532282', 'Video Tape and Disc Rental', '7841', 'Video Tape Rental'),
(1837, '532283', 'Home Health Equipment Rental', '7352', 'Medical Equipment Rental'),
(1838, '532284', 'Recreational Goods Rental', '7999', 'Amusement and Recreation, Nec'),
(1839, '532289', 'All Other Consumer Goods Rental', '7359', 'Equipment Rental and Leasing, Nec'),
(1840, '532310', 'General Rental Centers', '7359', 'Equipment Rental and Leasing, Nec'),
(1841, '532411', 'Commercial Air, Rail, and Water Transportation Equipment Rental and\nLeasing', '4499', 'Water Transportation Services, Nec'),
(1842, '532411', 'Commercial Air, Rail, and Water Transportation Equipment Rental and\nLeasing', '4741', 'Rental of Railroad Cars'),
(1843, '532411', 'Commercial Air, Rail, and Water\nTransportation Equipment Rental and Leasing', '7359', 'Equipment Rental and Leasing, Nec'),
(1844, '532412', 'Construction, Mining, and Forestry Machinery and Equipment Rental and\nLeasing', '7353', 'Heavy Construction Equipment Rental'),
(1845, '532412', 'Construction, Mining, and Forestry\nMachinery and Equipment Rental and Leasing', '7359', 'Equipment Rental and Leasing, Nec'),
(1846, '532420', 'Office Machinery and Equipment Rental\nand Leasing', '7359', 'Equipment Rental and Leasing, Nec'),
(1847, '532420', 'Office Machinery and Equipment Rental\nand Leasing', '7377', 'Computer Rental and Leasing'),
(1848, '532490', 'Other Commercial and Industrial Machinery and Equipment Rental and Leasing', '7352', 'Medical Equipment Rental'),
(1849, '532490', 'Other Commercial and Industrial Machinery and Equipment Rental and Leasing', '7359', 'Equipment Rental and Leasing, Nec'),
(1850, '532490', 'Other Commercial and Industrial Machinery and Equipment Rental and Leasing', '7819', 'Services Allied To Motion Pictures'),
(1851, '532490', 'Other Commercial and Industrial Machinery and Equipment Rental and Leasing', '7922', 'Theatrical Producers and Services'),
(1852, '533110', 'Lessors of Nonfinancial Intangible Assets\n(except Copyrighted Works)', '6792', 'Oil Royalty Traders'),
(1853, '533110', 'Lessors of Nonfinancial Intangible Assets\n(except Copyrighted Works)', '6794', 'Patent Owners and Lessors'),
(1854, '541110', 'Offices of Lawyers', '8111', 'Legal Services'),
(1855, '541120', 'Offices of Notaries', 'Aux', ''),
(1856, '541191', 'Title Abstract and Settlement Offices', '6541', 'Title abstract Offices'),
(1857, '541199', 'All Other Legal Services', '7389', 'Business Services, Nec'),
(1858, '541211', 'Offices of Certified Public Accountants', '8721', 'Accounting, Auditing, and Bookkeeping'),
(1859, '541213', 'Tax Preparation Services', '7291', 'Tax Return Preparation Services'),
(1860, '541214', 'Payroll Services', '7819', 'Services Allied To Motion Pictures'),
(1861, '541214', 'Payroll Services', '8721', 'Accounting, Auditing, and Bookkeeping'),
(1862, '541219', 'Other Accounting Services', '8721', 'Accounting, Auditing, and Bookkeeping'),
(1863, '541310', 'Architectural Services', '8712', 'Architectural Services'),
(1864, '541320', 'Landscape Architectural Services', '781', 'Landscape Counseling and Planning'),
(1865, '541320', 'Landscape Architectural Services', '8748', 'Business Consulting, Nec'),
(1866, '541330', 'Engineering Services', '8711', 'Engineering Services'),
(1867, '541330', 'Engineering Services', '8748', 'Business Consulting, Nec'),
(1868, '541340', 'Drafting Services', '7389', 'Business Services, Nec'),
(1869, '541350', 'Building Inspection Services', '7389', 'Business Services, Nec'),
(1870, '541360', 'Geophysical Surveying and Mapping\nServices', '1081', 'Metal Mining Services'),
(1871, '541360', 'Geophysical Surveying and Mapping\nServices', '1382', 'Oil and Gas Exploration Services'),
(1872, '541360', 'Geophysical Surveying and Mapping\nServices', '1481', 'Nonmetallic Mineral Services'),
(1873, '541360', 'Geophysical Surveying and Mapping\nServices', '8713', 'Surveying Services'),
(1874, '541370', 'Surveying and Mapping (except\nGeophysical) Services', '7389', 'Business Services, Nec'),
(1875, '541370', 'Surveying and Mapping (except\nGeophysical) Services', '8713', 'Surveying Services'),
(1876, '541380', 'Testing Laboratories', '8734', 'Testing Laboratories'),
(1877, '541410', 'Interior Design Services', '7389', 'Business Services, Nec'),
(1878, '541420', 'Industrial Design Services', '7389', 'Business Services, Nec'),
(1879, '541430', 'Graphic Design Services', '7336', 'Commercial Art and Graphic Design'),
(1880, '541430', 'Graphic Design Services', '8099', 'Health and Allied Services, Nec'),
(1881, '541490', 'Other Specialized Design Services', '7389', 'Business Services, Nec'),
(1882, '541511', 'Custom Computer Programming Services', '7371', 'Custom Computer Programming Services'),
(1883, '541512', 'Computer Systems Design Services', '7373', 'Computer Integrated Systems Design'),
(1884, '541512', 'Computer Systems Design Services', '7379', 'Computer Related Services, Nec'),
(1885, '541513', 'Computer Facilities Management Services', '7376', 'Computer Facilities Management'),
(1886, '541519', 'Other Computer Related Services', '7379', 'Computer Related Services, Nec'),
(1887, '541611', 'Administrative Management and General\nManagement Consulting Services', '8742', 'Management Consulting Services'),
(1888, '541612', 'Human Resources Consulting Services', '7361', 'Employment Agencies'),
(1889, '541612', 'Human Resources Consulting Services', '8742', 'Management Consulting Services'),
(1890, '541612', 'Human Resources Consulting Services', '8999', 'Services, Nec'),
(1891, '541613', 'Marketing Consulting Services', '8742', 'Management Consulting Services'),
(1892, '541614', 'Process, Physical Distribution, and\nLogistics Consulting Services', '4731', 'Freight Transportation Arrangement'),
(1893, '541614', 'Process, Physical Distribution, and\nLogistics Consulting Services', '8742', 'Management Consulting Services'),
(1894, '541618', 'Other Management Consulting Services', '8748', 'Business Consulting, Nec'),
(1895, '541620', 'Environmental Consulting Services', '8999', 'Services, Nec'),
(1896, '541690', 'Other Scientific and Technical Consulting\nServices', '781', 'Landscape Counseling and Planning'),
(1897, '541690', 'Other Scientific and Technical Consulting\nServices', '7819', 'Services Allied To Motion Pictures'),
(1898, '541690', 'Other Scientific and Technical Consulting\nServices', '8748', 'Business Consulting, Nec'),
(1899, '541690', 'Other Scientific and Technical Consulting\nServices', '8999', 'Services, Nec'),
(1900, '541713', 'Research and Development in\nNanotechnology', '3721', 'Aircraft (research and development not\nproducing prototypes)'),
(1901, '541713', 'Research and Development in Nanotechnology', '3724', 'Aircraft Engines and Engine Parts (research and development not producing\nprototypes)'),
(1902, '541713', 'Research and Development in Nanotechnology', '3728', 'Aircraft Parts and Auxiliary Equipment,\nNEC (research and development not producing prototypes)'),
(1903, '541713', 'Research and Development in Nanotechnology', '3761', 'Guided Missiles and Space Vehicles (research and development not producing\nprototypes)'),
(1904, '541713', 'Research and Development in Nanotechnology', '3764', 'Space Propulsion Units and Parts\n(research and development not producing prototypes)'),
(1905, '541713', 'Research and Development in Nanotechnology', '3769', 'Space Vehicle Equipment, Nec (research and development not producing\nprototypes)'),
(1906, '541713', 'Research and Development in\nBiotechnology (except Nanobiotechnology)', '8731', 'Commercial Physical Research'),
(1907, '541713', 'Research and Development in\nBiotechnology (except Nanobiotechnology)', '8733', 'Noncommercial Research Organizations'),
(1908, '541714', 'Research and Development in\nBiotechnology (except Nanobiotechnology)', '8731', 'Commercial Physical Research'),
(1909, '541714', 'Research and Development in\nBiotechnology (except Nanobiotechnology)', '8733', 'Noncommercial Research Organizations'),
(1910, '541715', 'Research and Development in the Physical, Engineering, and Life Sciences (except Nanotechnology and Biotechnology)', '8731', 'Commercial Physical Research'),
(1911, '541715', 'Research and Development in the Physical, Engineering, and Life Sciences (except Nanotechnology and Biotechnology)', '8733', 'Noncommercial Research Organizations'),
(1912, '541720', 'Research and Development in the Social\nSciences and Humanities', '8732', 'Commercial Nonphysical Research'),
(1913, '541720', 'Research and Development in the Social\nSciences and Humanities', '8733', 'Noncommercial Research Organizations'),
(1914, '541810', 'Advertising Agencies', '7311', 'Advertising Agencies'),
(1915, '541820', 'Public Relations Agencies', '8743', 'Public Relations Services'),
(1916, '541830', 'Media Buying Agencies', '7319', 'Advertising, Nec'),
(1917, '541840', 'Media Representatives', '7313', 'Radio, Television, Publisher\nRepresentatives'),
(1918, '541850', 'Outdoor Advertising', '7312', 'Outdoor Advertising Services'),
(1919, '541850', 'Outdoor Advertising', '7319', 'Advertising, Nec'),
(1920, '541860', 'Direct Mail Advertising', '7331', 'Direct Mail Advertising Services'),
(1921, '541870', 'Advertising Material Distribution Services', '7319', 'Advertising, Nec'),
(1922, '541870', 'Advertising Material Distribution Services', '7389', 'Business Services, Nec'),
(1923, '541890', 'Other Services Related to Advertising', '5199', 'Nondurable Goods, Nec'),
(1924, '541890', 'Other Services Related to Advertising', '7319', 'Advertising, Nec'),
(1925, '541890', 'Other Services Related to Advertising', '7389', 'Business Services, Nec'),
(1926, '541910', 'Marketing Research and Public Opinion\nPolling', '8732', 'Commercial Nonphysical Research'),
(1927, '541921', 'Photography Studios, Portrait', '7221', 'Photographic Studios, Portrait'),
(1928, '541922', 'Commercial Photography', '7335', 'Commercial Photography'),
(1929, '541922', 'Commercial Photography', '8099', 'Health and Allied Services, Nec'),
(1930, '541930', 'Translation and Interpretation Services', '7389', 'Business Services, Nec'),
(1931, '541940', 'Veterinary Services', '741', 'Veterinary Services For Livestock'),
(1932, '541940', 'Veterinary Services', '742', 'Veterinary Services, Specialties'),
(1933, '541940', 'Veterinary Services', '8734', 'Testing Laboratories'),
(1934, '541990', 'All Other Professional, Scientific, and\nTechnical Services', '4499', 'Water Transportation Services, Nec'),
(1935, '541990', 'All Other Professional, Scientific, and\nTechnical Services', '7299', 'Miscellaneous Personal Services'),
(1936, '541990', 'All Other Professional, Scientific, and\nTechnical Services', '7389', 'Business Services, Nec'),
(1937, '541990', 'All Other Professional, Scientific, and\nTechnical Services', '8999', 'Services, Nec'),
(1938, '551111', 'Offices of Bank Holding Companies', '6712', 'Bank Holding Companies'),
(1939, '551112', 'Offices of Other Holding Companies', '6719', 'Holding Companies, Nec'),
(1940, '551114', 'Corporate, Subsidiary, and Regional\nManaging Offices', 'Aux', ''),
(1941, '561110', 'Office Administrative Services', '8741', 'Management Services'),
(1942, '561210', 'Facilities Support Services', '8744', 'Facilities Support Services'),
(1943, '561311', 'Employment Placement Agencies', '7299', 'Miscellaneous Personal Services'),
(1944, '561311', 'Employment Placement Agencies', '7361', 'Employment Agencies'),
(1945, '561311', 'Employment Placement Agencies', '7819', 'Services Allied To Motion Pictures'),
(1946, '561311', 'Employment Placement Agencies', '7922', 'Theatrical Producers and Services'),
(1947, '561312', 'Executive Search Services', '7361', 'Employment Agencies'),
(1948, '561312', 'Executive Search Services', '8742', 'Management Consulting Services'),
(1949, '561312', 'Executive Search Services', '8999', 'Services, Nec'),
(1950, '561320', 'Temporary Help Services', '7363', 'Help Supply Services'),
(1951, '561330', 'Professional Employer Organizations', '7363', 'Help Supply Services'),
(1952, '561410', 'Document Preparation Services', '7338', 'Secretarial and Court Reporting'),
(1953, '561410', 'Document Preparation Services', '7389', 'Business Services, Nec'),
(1954, '561421', 'Telephone Answering Services', '7389', 'Business Services, Nec'),
(1955, '561422', 'Telemarketing Bureaus and Other Contact\nCenters', '7389', 'Business Services, Nec'),
(1956, '561431', 'Private Mail Centers', '7389', 'Business Services, Nec'),
(1957, '561439', 'Other Business Service Centers (including\nCopy Shops)', '7334', 'Photocopying and Duplicating Services'),
(1958, '561439', 'Other Business Service Centers (including\nCopy Shops)', '7389', 'Business Services, Nec'),
(1959, '561440', 'Collection Agencies', '7322', 'Adjustment and Collection Services'),
(1960, '561440', 'Collection Agencies', '7389', 'Business Services, Nec'),
(1961, '561450', 'Credit Bureaus', '7323', 'Credit Reporting Services'),
(1962, '561491', 'Repossession Services', '7389', 'Business Services, Nec'),
(1963, '561492', 'Court Reporting and Stenotype Services', '7338', 'Secretarial and Court Reporting'),
(1964, '561499', 'All Other Business Support Services', '7389', 'Business Services, Nec'),
(1965, '561510', 'Travel Agencies', '4724', 'Travel Agencies'),
(1966, '561520', 'Tour Operators', '4725', 'Tour Operators'),
(1967, '561591', 'Convention and Visitors Bureaus', '7389', 'Business Services, Nec'),
(1968, '561599', 'All Other Travel Arrangement and\nReservation Services', '4729', 'Passenger Transportation Arrangement'),
(1969, '561599', 'All Other Travel Arrangement and\nReservation Services', '7389', 'Business Services, Nec'),
(1970, '561599', 'All Other Travel Arrangement and\nReservation Services', '7922', 'Theatrical Producers and Services'),
(1971, '561599', 'All Other Travel Arrangement and\nReservation Services', '7999', 'Amusement and Recreation, Nec'),
(1972, '561599', 'All Other Travel Arrangement and\nReservation Services', '8699', 'Membership Organizations, Nec'),
(1973, '561611', 'Investigation Services', '7381', 'Detective and Armored Car Services'),
(1974, '561612', 'Security Guards and Patrol Services', '7381', 'Detective and Armored Car Services'),
(1975, '561613', 'Armored Car Services', '7381', 'Detective and Armored Car Services'),
(1976, '561621', 'Security Systems Services (except\nLocksmiths)', '7382', 'Security Systems Services'),
(1977, '561622', 'Locksmiths', '7699', 'Repair Services, Nec'),
(1978, '561710', 'Exterminating and Pest Control Services', '4959', 'Sanitary Services, Nec'),
(1979, '561710', 'Exterminating and Pest Control Services', '7342', 'Disinfecting and Pest Control Services'),
(1980, '561720', 'Janitorial Services', '4581', 'Airports, Flying Fields, and Services'),
(1981, '561720', 'Janitorial Services', '7342', 'Disinfecting and Pest Control Services'),
(1982, '561720', 'Janitorial Services', '7349', 'Building Maintenance Services, Nec'),
(1983, '561730', 'Landscaping Services', '782', 'Lawn and Garden Services'),
(1984, '561730', 'Landscaping Services', '783', 'Ornamental Shrub and Tree Services'),
(1985, '561740', 'Carpet and Upholstery Cleaning Services', '7217', 'Carpet and Upholstery Cleaning'),
(1986, '561790', 'Other Services to Buildings and Dwellings', '1799', 'Special Trade Contractors, Nec'),
(1987, '561790', 'Other Services to Buildings and Dwellings', '4959', 'Sanitary Services, Nec'),
(1988, '561790', 'Other Services to Buildings and Dwellings', '7349', 'Building Maintenance Services, Nec'),
(1989, '561790', 'Other Services to Buildings and Dwellings', '7389', 'Business Services, Nec'),
(1990, '561790', 'Other Services to Buildings and Dwellings', '7699', 'Repair Services, Nec'),
(1991, '561910', 'Packaging and Labeling Services', '7389', 'Business Services, Nec'),
(1992, '561920', 'Convention and Trade Show Organizers', '7389', 'Business Services, Nec'),
(1993, '561990', 'All Other Support Services', '7299', 'Miscellaneous Personal Services'),
(1994, '561990', 'All Other Support Services', '7389', 'Business Services, Nec'),
(1995, '562111', 'Solid Waste Collection', '4212', 'Local Trucking, Without Storage'),
(1996, '562112', 'Hazardous Waste Collection', '4212', 'Local Trucking, Without Storage'),
(1997, '562119', 'Other Waste Collection', '4212', 'Local Trucking, Without Storage'),
(1998, '562211', 'Hazardous Waste Treatment and Disposal', '4953', 'Refuse Systems'),
(1999, '562212', 'Solid Waste Landfill', '4953', 'Refuse Systems'),
(2000, '562213', 'Solid Waste Combustors and Incinerators', '4953', 'Refuse Systems'),
(2001, '562219', 'Other Nonhazardous Waste Treatment and\nDisposal', '4953', 'Refuse Systems'),
(2002, '562910', 'Remediation Services', '1799', 'Special Trade Contractors, Nec'),
(2003, '562910', 'Remediation Services', '4959', 'Sanitary Services, Nec'),
(2004, '562920', 'Materials Recovery Facilities', '4953', 'Refuse Systems'),
(2005, '562991', 'Septic Tank and Related Services', '7359', 'Equipment Rental and Leasing, Nec'),
(2006, '562991', 'Septic Tank and Related Services', '7699', 'Repair Services, Nec'),
(2007, '562998', 'All Other Miscellaneous Waste\nManagement Services', '4959', 'Sanitary Services, Nec'),
(2008, '562998', 'All Other Miscellaneous Waste\nManagement Services', '7699', 'Repair Services, Nec'),
(2009, '611110', 'Elementary and Secondary Schools', '8211', 'Elementary and Secondary Schools'),
(2010, '611210', 'Junior Colleges', '8222', 'Junior Colleges'),
(2011, '611310', 'Colleges, Universities, and Professional\nSchools', '8221', 'Colleges and Universities'),
(2012, '611410', 'Business and Secretarial Schools', '8244', 'Business and Secretarial Schools'),
(2013, '611420', 'Computer Training', '8243', 'Data Processing Schools'),
(2014, '611430', 'Professional and Management\nDevelopment Training', '8299', 'Schools and Educational Services'),
(2015, '611511', 'Cosmetology and Barber Schools', '7231', 'Beauty Shops'),
(2016, '611511', 'Cosmetology and Barber Schools', '7241', 'Barber Shops'),
(2017, '611512', 'Flight Training', '8249', 'Vocational Schools, Nec'),
(2018, '611512', 'Flight Training', '8299', 'Schools and Educational Services'),
(2019, '611513', 'Apprenticeship Training', '8249', 'Vocational Schools, Nec'),
(2020, '611519', 'Other Technical and Trade Schools', '8243', 'Data Processing Schools'),
(2021, '611519', 'Other Technical and Trade Schools', '8249', 'Vocational Schools, Nec'),
(2022, '611519', 'Other Technical and Trade Schools', '8299', 'Schools and Educational Services'),
(2023, '611610', 'Fine Arts Schools', '7911', 'Dance Studios, Schools, and Halls'),
(2024, '611610', 'Fine Arts Schools', '8299', 'Schools and Educational Services'),
(2025, '611620', 'Sports and Recreation Instruction', '7999', 'Amusement and Recreation, Nec'),
(2026, '611620', 'Sports and Recreation Instruction', '8299', 'Schools and Educational Services'),
(2027, '611630', 'Language Schools', '8299', 'Schools and Educational Services'),
(2028, '611691', 'Exam Preparation and Tutoring', '8299', 'Schools and Educational Services'),
(2029, '611692', 'Automobile Driving Schools', '8299', 'Schools and Educational Services'),
(2030, '611699', 'All Other Miscellaneous Schools and\nInstruction', '7999', 'Amusement and Recreation, Nec'),
(2031, '611699', 'All Other Miscellaneous Schools and\nInstruction', '8299', 'Schools and Educational Services'),
(2032, '611710', 'Educational Support Services', '8299', 'Schools and Educational Services'),
(2033, '611710', 'Educational Support Services', '8748', 'Business Consulting, Nec'),
(2034, '621111', 'Offices of Physicians (except Mental Health\nSpecialists)', '8011', 'Offices and Clinics of Medical Doctors'),
(2035, '621111', 'Offices of Physicians (except Mental Health\nSpecialists)', '8031', 'Offices and Clinics of Osteopathic\nPhysicians'),
(2036, '621112', 'Offices of Physicians, Mental Health\nSpecialists', '8011', 'Offices and Clinics of Medical Doctors'),
(2037, '621112', 'Offices of Physicians, Mental Health\nSpecialists', '8031', 'Offices and Clinics of Osteopathic\nPhysicians'),
(2038, '621210', 'Offices of Dentists', '8021', 'Offices and Clinics of Dentists'),
(2039, '621310', 'Offices of Chiropractors', '8041', 'Offices and Clinics of Chiropractors'),
(2040, '621320', 'Offices of Optometrists', '8042', 'Offices and Clinics of Optometrists'),
(2041, '621330', 'Offices of Mental Health Practitioners\n(except Physicians)', '8049', 'Offices of Health Practitioner'),
(2042, '621340', 'Offices of Physical, Occupational and\nSpeech Therapists, and Audiologists', '8049', 'Offices of Health Practitioner'),
(2043, '621391', 'Offices of Podiatrists', '8043', 'Offices and Clinics of Podiatrists'),
(2044, '621399', 'Offices of All Other Miscellaneous Health\nPractitioners', '8049', 'Offices of Health Practitioner'),
(2045, '621399', 'Offices of All Other Miscellaneous Health\nPractitioners', '8093', 'Specialty Outpatient Clinics, Nec'),
(2046, '621410', 'Family Planning Centers', '8093', 'Specialty Outpatient Clinics, Nec'),
(2047, '621410', 'Family Planning Centers', '8099', 'Health and Allied Services, Nec'),
(2048, '621420', 'Outpatient Mental Health and Substance\nAbuse Centers', '8093', 'Specialty Outpatient Clinics, Nec'),
(2049, '621491', 'HMO Medical Centers', '8011', 'Offices and Clinics of Medical Doctors');
INSERT INTO `naics` (`id`, `naics_code`, `description`, `sic_code`, `ins`) VALUES
(2050, '621492', 'Kidney Dialysis Centers', '8092', 'Kidney Dialysis Centers'),
(2051, '621493', 'Freestanding Ambulatory Surgical and\nEmergency Centers', '8011', 'Offices and Clinics of Medical Doctors'),
(2052, '621498', 'All Other Outpatient Care Centers', '8093', 'Specialty Outpatient Clinics, Nec'),
(2053, '621511', 'Medical Laboratories', '8071', 'Medical Laboratories'),
(2054, '621512', 'Diagnostic Imaging Centers', '8071', 'Medical Laboratories'),
(2055, '621610', 'Home Health Care Services', '8082', 'Home Health Care Services'),
(2056, '621910', 'Ambulance Services', '4119', 'Local Passenger Transportation, Nec'),
(2057, '621910', 'Ambulance Services', '4522', 'Air Transportation, Nonscheduled'),
(2058, '621991', 'Blood and Organ Banks', '8099', 'Health and Allied Services, Nec'),
(2059, '621999', 'All Other Miscellaneous Ambulatory Health\nCare Services', '8099', 'Health and Allied Services, Nec'),
(2060, '622110', 'General Medical and Surgical Hospitals', '8062', 'General Medical and Surgical Hospitals'),
(2061, '622110', 'General Medical and Surgical Hospitals', '8069', 'Specialty Hospitals, Except Psychiatric'),
(2062, '622210', 'Psychiatric and Substance Abuse Hospitals', '8063', 'Psychiatric Hospitals'),
(2063, '622210', 'Psychiatric and Substance Abuse Hospitals', '8069', 'Specialty Hospitals, Except Psychiatric'),
(2064, '622310', 'Specialty (except Psychiatric and\nSubstance Abuse) Hospitals', '8069', 'Specialty Hospitals, Except Psychiatric'),
(2065, '623110', 'Nursing Care Facilities (Skilled Nursing\nFacilities)', '8051', 'Skilled Nursing Care Facilities'),
(2066, '623110', 'Nursing Care Facilities (Skilled Nursing\nFacilities)', '8052', 'Intermediate Care Facilities'),
(2067, '623110', 'Nursing Care Facilities (Skilled Nursing\nFacilities)', '8059', 'Nursing and Personal Care, Nec'),
(2068, '623210', 'Residential Intellectual and Developmental\nDisability Facilities', '8051', 'Skilled Nursing Care Facilities'),
(2069, '623210', 'Residential Intellectual and Developmental\nDisability Facilities', '8052', 'Intermediate Care Facilities'),
(2070, '623210', 'Residential Intellectual and Developmental\nDisability Facilities', '8059', 'Nursing and Personal Care, Nec'),
(2071, '623210', 'Residential Intellectual and Developmental\nDisability Facilities', '8361', 'Residential Care'),
(2072, '623220', 'Residential Mental Health and Substance\nAbuse Facilities', '8361', 'Residential Care'),
(2073, '623311', 'Continuing Care Retirement Communities', '8051', 'Skilled Nursing Care Facilities'),
(2074, '623311', 'Continuing Care Retirement Communities', '8052', 'Intermediate Care Facilities'),
(2075, '623311', 'Continuing Care Retirement Communities', '8059', 'Nursing and Personal Care, Nec'),
(2076, '623312', 'Assisted Living Facilities for the Elderly', '8361', 'Residential Care'),
(2077, '623990', 'Other Residential Care Facilities', '8361', 'Residential Care'),
(2078, '624110', 'Child and Youth Services', '8322', 'Individual and Family Services'),
(2079, '624120', 'Services for the Elderly and Persons with\nDisabilities', '8322', 'Individual and Family Services'),
(2080, '624190', 'Other Individual and Family Services', '8322', 'Individual and Family Services'),
(2081, '624210', 'Community Food Services', '8322', 'Individual and Family Services'),
(2082, '624221', 'Temporary Shelters', '8322', 'Individual and Family Services'),
(2083, '624229', 'Other Community Housing Services', '8322', 'Individual and Family Services'),
(2084, '624230', 'Emergency and Other Relief Services', '8322', 'Individual and Family Services'),
(2085, '624310', 'Vocational Rehabilitation Services', '8331', 'Job Training and Related Services'),
(2086, '624410', 'Child Day Care Services', '8351', 'Child Day Care Services'),
(2087, '711110', 'Theater Companies and Dinner Theaters', '5812', 'Eating Places'),
(2088, '711110', 'Theater Companies and Dinner Theaters', '7922', 'Theatrical Producers and Services'),
(2089, '711120', 'Dance Companies', '7922', 'Theatrical Producers and Services'),
(2090, '711130', 'Musical Groups and Artists', '7929', 'Entertainers and Entertainment Groups'),
(2091, '711190', 'Other Performing Arts Companies', '7929', 'Entertainers and Entertainment Groups'),
(2092, '711190', 'Other Performing Arts Companies', '7999', 'Amusement and Recreation, Nec'),
(2093, '711211', 'Sports Teams and Clubs', '7941', 'Sports Clubs, Managers, and Promoters'),
(2094, '711212', 'Racetracks', '7948', 'Racing, Including Track Operation'),
(2095, '711219', 'Other Spectator Sports', '7948', 'Racing, Including Track Operation'),
(2096, '711219', 'Other Spectator Sports', '7999', 'Amusement and Recreation, Nec'),
(2097, '711310', 'Promoters of Performing Arts, Sports, and\nSimilar Events with Facilities', '6512', 'Nonresidential Building Operators'),
(2098, '711310', 'Promoters of Performing Arts, Sports, and\nSimilar Events with Facilities', '7389', 'Business Services, Nec'),
(2099, '711310', 'Promoters of Performing Arts, Sports, and\nSimilar Events with Facilities', '7922', 'Theatrical Producers and Services'),
(2100, '711310', 'Promoters of Performing Arts, Sports, and\nSimilar Events with Facilities', '7941', 'Sports Clubs, Managers, and Promoters'),
(2101, '711310', 'Promoters of Performing Arts, Sports, and\nSimilar Events with Facilities', '7999', 'Amusement and Recreation, Nec'),
(2102, '711320', 'Promoters of Performing Arts, Sports, and\nSimilar Events without Facilities', '7389', 'Business Services, Nec'),
(2103, '711320', 'Promoters of Performing Arts, Sports, and\nSimilar Events without Facilities', '7922', 'Theatrical Producers and Services'),
(2104, '711320', 'Promoters of Performing Arts, Sports, and\nSimilar Events without Facilities', '7941', 'Sports Clubs, Managers, and Promoters'),
(2105, '711320', 'Promoters of Performing Arts, Sports, and\nSimilar Events without Facilities', '7999', 'Amusement and Recreation, Nec'),
(2106, '711410', 'Agents and Managers for Artists, Athletes,\nEntertainers, and Other Public Figures', '7389', 'Business Services, Nec'),
(2107, '711410', 'Agents and Managers for Artists, Athletes,\nEntertainers, and Other Public Figures', '7922', 'Theatrical Producers and Services'),
(2108, '711410', 'Agents and Managers for Artists, Athletes,\nEntertainers, and Other Public Figures', '7941', 'Sports Clubs, Managers, and Promoters'),
(2109, '711510', 'Independent Artists, Writers, and\nPerformers', '7383', 'News Syndicates'),
(2110, '711510', 'Independent Artists, Writers, and\nPerformers', '7699', 'Repair Services, Nec'),
(2111, '711510', 'Independent Artists, Writers, and\nPerformers', '7819', 'Services Allied To Motion Pictures'),
(2112, '711510', 'Independent Artists, Writers, and\nPerformers', '7922', 'Theatrical Producers and Services'),
(2113, '711510', 'Independent Artists, Writers, and\nPerformers', '7929', 'Entertainers and Entertainment Groups'),
(2114, '711510', 'Independent Artists, Writers, and\nPerformers', '8999', 'Services, Nec'),
(2115, '712110', 'Museums', '8412', 'Museums and Art Galleries'),
(2116, '712120', 'Historical Sites', '8412', 'Museums and Art Galleries'),
(2117, '712130', 'Zoos and Botanical Gardens', '8422', 'Botanical and Zoological Gardens'),
(2118, '712190', 'Nature Parks and Other Similar Institutions', '7999', 'Amusement and Recreation, Nec'),
(2119, '712190', 'Nature Parks and Other Similar Institutions', '8422', 'Botanical and Zoological Gardens'),
(2120, '713110', 'Amusement and Theme Parks', '7996', 'Amusement Parks'),
(2121, '713120', 'Amusement Arcades', '7993', 'Coin-operated Amusement Devices'),
(2122, '713210', 'Casinos (except Casino Hotels)', '7999', 'Amusement and Recreation, Nec'),
(2123, '713290', 'Other Gambling Industries', '7993', 'Coin-operated Amusement Devices'),
(2124, '713290', 'Other Gambling Industries', '7999', 'Amusement and Recreation, Nec'),
(2125, '713910', 'Golf Courses and Country Clubs', '7992', 'Public Golf Courses'),
(2126, '713910', 'Golf Courses and Country Clubs', '7997', 'Membership Sports and Recreation Clubs'),
(2127, '713920', 'Skiing Facilities', '7999', 'Amusement and Recreation, Nec'),
(2128, '713930', 'Marinas', '4493', 'Marinas'),
(2129, '713940', 'Fitness and Recreational Sports Centers', '7991', 'Physical Fitness Facilities'),
(2130, '713940', 'Fitness and Recreational Sports Centers', '7997', 'Membership Sports and Recreation Clubs'),
(2131, '713940', 'Fitness and Recreational Sports Centers', '7999', 'Amusement and Recreation, Nec'),
(2132, '713950', 'Bowling Centers', '7933', 'Bowling Centers'),
(2133, '713990', 'All Other Amusement and Recreation\nIndustries', '7911', 'Dance Studios, Schools, and Halls'),
(2134, '713990', 'All Other Amusement and Recreation\nIndustries', '7993', 'Coin-operated Amusement Devices'),
(2135, '713990', 'All Other Amusement and Recreation\nIndustries', '7997', 'Membership Sports and Recreation Clubs'),
(2136, '713990', 'All Other Amusement and Recreation\nIndustries', '7999', 'Amusement and Recreation, Nec'),
(2137, '721110', 'Hotels (except Casino Hotels) and Motels', '7011', 'Hotels and Motels'),
(2138, '721110', 'Hotels (except Casino Hotels) and Motels', '7041', 'Membership-basis Organization Hotels'),
(2139, '721120', 'Casino Hotels', '7011', 'Hotels and Motels'),
(2140, '721191', 'Bed-and-Breakfast Inns', '7011', 'Hotels and Motels'),
(2141, '721199', 'All Other Traveler Accommodation', '7011', 'Hotels and Motels'),
(2142, '721211', 'RV (Recreational Vehicle) Parks and\nCampgrounds', '7033', 'Trailer Parks and Campsites'),
(2143, '721214', 'Recreational and Vacation Camps (except\nCampgrounds)', '7032', 'Sporting and Recreational Camps'),
(2144, '721310', 'Rooming and Boarding Houses', '7021', 'Rooming and Boarding Houses'),
(2145, '721310', 'Rooming and Boarding Houses', '7041', 'Membership-basis Organization Hotels'),
(2146, '722310', 'Food Service Contractors', '4789', 'Transportation Services, Nec'),
(2147, '722310', 'Food Service Contractors', '5812', 'Eating Places'),
(2148, '722320', 'Caterers', '5812', 'Eating Places'),
(2149, '722330', 'Mobile Food Services', '5963', 'Direct Selling Establishments'),
(2150, '722410', 'Drinking Places (Alcoholic Beverages)', '5813', 'Drinking Places'),
(2151, '722511', 'Full-Service Restaurants', '5812', 'Eating Places'),
(2152, '722513', 'Limited-Service Restaurants', '5812', 'Eating Places'),
(2153, '722514', 'Cafeterias, Grill Buffets, and Buffets', '5812', 'Eating Places'),
(2154, '722515', 'Snack and Nonalcoholic Beverage Bars', '5461', 'Retail Bakeries'),
(2155, '722515', 'Snack and Nonalcoholic Beverage Bars', '5812', 'Eating Places'),
(2156, '811111', 'General Automotive Repair', '7538', 'General Automotive Repair Shops'),
(2157, '811112', 'Automotive Exhaust System Repair', '7533', 'Auto Exhaust System Repair Shops'),
(2158, '811113', 'Automotive Transmission Repair', '7537', 'Automotive Transmission Repair Shops'),
(2159, '811118', 'Other Automotive Mechanical and Electrical\nRepair and Maintenance', '7539', 'Automotive Repair Shops, Nec'),
(2160, '811121', 'Automotive Body, Paint, and Interior Repair\nand Maintenance', '7532', 'Top and Body Repair and Paint Shops'),
(2161, '811122', 'Automotive Glass Replacement Shops', '7536', 'Automotive Glass Replacement Shops'),
(2162, '811122', 'Automotive Glass Replacement Shops', '7549', 'Automotive Services, Nec'),
(2163, '811191', 'Automotive Oil Change and Lubrication\nShops', '7549', 'Automotive Services, Nec'),
(2164, '811192', 'Car Washes', '7542', 'Carwashes'),
(2165, '811198', 'All Other Automotive Repair and\nMaintenance', '7534', 'Tire Retreading and Repair Shops'),
(2166, '811198', 'All Other Automotive Repair and\nMaintenance', '7539', 'Automotive Repair Shops, Nec'),
(2167, '811198', 'All Other Automotive Repair and\nMaintenance', '7549', 'Automotive Services, Nec'),
(2168, '811211', 'Consumer Electronics Repair and\nMaintenance', '7622', 'Radio and Television Repair'),
(2169, '811211', 'Consumer Electronics Repair and\nMaintenance', '7629', 'Electrical Repair Shops'),
(2170, '811211', 'Consumer Electronics Repair and\nMaintenance', '7699', 'Repair Services, Nec'),
(2171, '811212', 'Computer and Office Machine Repair and\nMaintenance', '7378', 'Computer Maintenance and Repair'),
(2172, '811212', 'Computer and Office Machine Repair and\nMaintenance', '7629', 'Electrical Repair Shops'),
(2173, '811212', 'Computer and Office Machine Repair and\nMaintenance', '7699', 'Repair Services, Nec'),
(2174, '811213', 'Communication Equipment Repair and\nMaintenance', '7622', 'Radio and Television Repair'),
(2175, '811213', 'Communication Equipment Repair and\nMaintenance', '7629', 'Electrical Repair Shops'),
(2176, '811219', 'Other Electronic and Precision Equipment\nRepair and Maintenance', '7629', 'Electrical Repair Shops'),
(2177, '811219', 'Other Electronic and Precision Equipment\nRepair and Maintenance', '7699', 'Repair Services, Nec'),
(2178, '811310', 'Commercial and Industrial Machinery and Equipment (except Automotive and\nElectronic) Repair and Maintenance', '7623', 'Refrigeration Service and Repair'),
(2179, '811310', 'Commercial and Industrial Machinery and\nEquipment (except Automotive and Electronic) Repair and Maintenance', '7692', 'Welding Repair'),
(2180, '811310', 'Commercial and Industrial Machinery and Equipment (except Automotive and\nElectronic) Repair and Maintenance', '7694', 'Armature Rewinding Shops'),
(2181, '811310', 'Commercial and Industrial Machinery and Equipment (except Automotive and\nElectronic) Repair and Maintenance', '7699', 'Repair Services, Nec'),
(2182, '811411', 'Home and Garden Equipment Repair and\nMaintenance', '7699', 'Repair Services, Nec'),
(2183, '811412', 'Appliance Repair and Maintenance', '7623', 'Refrigeration Service and Repair'),
(2184, '811412', 'Appliance Repair and Maintenance', '7629', 'Electrical Repair Shops'),
(2185, '811412', 'Appliance Repair and Maintenance', '7699', 'Repair Services, Nec'),
(2186, '811420', 'Reupholstery and Furniture Repair', '4581', 'Airports, Flying Fields, and Services'),
(2187, '811420', 'Reupholstery and Furniture Repair', '7641', 'Reupholstery and Furniture Repair'),
(2188, '811430', 'Footwear and Leather Goods Repair', '7251', 'Shoe Repair and Shoeshine Parlors'),
(2189, '811430', 'Footwear and Leather Goods Repair', '7699', 'Repair Services, Nec'),
(2190, '811490', 'Other Personal and Household Goods\nRepair and Maintenance', '3732', 'Boatbuilding and Repairing'),
(2191, '811490', 'Other Personal and Household Goods\nRepair and Maintenance', '7219', 'Laundry and Garment Services, Nec'),
(2192, '811490', 'Other Personal and Household Goods\nRepair and Maintenance', '7631', 'Watch, Clock, and Jewelry Repair'),
(2193, '811490', 'Other Personal and Household Goods\nRepair and Maintenance', '7699', 'Repair Services, Nec'),
(2194, '812111', 'Barber Shops', '7241', 'Barber Shops'),
(2195, '812112', 'Beauty Salons', '7231', 'Beauty Shops'),
(2196, '812113', 'Nail Salons', '7231', 'Beauty Shops'),
(2197, '812191', 'Diet and Weight Reducing Centers', '7299', 'Miscellaneous Personal Services'),
(2198, '812199', 'Other Personal Care Services', '7299', 'Miscellaneous Personal Services'),
(2199, '812210', 'Funeral Homes and Funeral Services', '7261', 'Funeral Service and Crematories'),
(2200, '812220', 'Cemeteries and Crematories', '6531', 'Real Estate Agents and Managers'),
(2201, '812220', 'Cemeteries and Crematories', '6553', 'Cemetery Subdividers and Developers'),
(2202, '812220', 'Cemeteries and Crematories', '7261', 'Funeral Service and Crematories'),
(2203, '812310', 'Coin-Operated Laundries and Drycleaners', '7215', 'Coin-operated Laundries and Cleaning'),
(2204, '812320', 'Drycleaning and Laundry Services (except\nCoin-Operated)', '7211', 'Power Laundries, Family and Commercial'),
(2205, '812320', 'Drycleaning and Laundry Services (except\nCoin-Operated)', '7212', 'Garment Pressing and Cleaners\' Agents'),
(2206, '812320', 'Drycleaning and Laundry Services (except\nCoin-Operated)', '7216', 'Drycleaning Plants, Except Rugs'),
(2207, '812320', 'Drycleaning and Laundry Services (except\nCoin-Operated)', '7219', 'Laundry and Garment Services, Nec'),
(2208, '812320', 'Drycleaning and Laundry Services (except\nCoin-Operated)', '7251', 'Shoe Repair and Shoeshine Parlors'),
(2209, '812320', 'Drycleaning and Laundry Services (except\nCoin-Operated)', '7389', 'Business Services, Nec'),
(2210, '812331', 'Linen Supply', '7213', 'Linen Supply'),
(2211, '812331', 'Linen Supply', '7219', 'Laundry and Garment Services, Nec'),
(2212, '812332', 'Industrial Launderers', '7218', 'Industrial Launderers'),
(2213, '812910', 'Pet Care (except Veterinary) Services', '752', 'Animal Specialty Services'),
(2214, '812921', 'Photofinishing Laboratories (except One-\nHour)', '7384', 'Photofinish Laboratories'),
(2215, '812922', 'One-Hour Photofinishing', '7384', 'Photofinish Laboratories'),
(2216, '812930', 'Parking Lots and Garages', '7299', 'Miscellaneous Personal Services'),
(2217, '812930', 'Parking Lots and Garages', '7521', 'Automobile Parking'),
(2218, '812990', 'All Other Personal Services', '4899', 'Communication Services, Nec'),
(2219, '812990', 'All Other Personal Services', '7251', 'Shoe Repair and Shoeshine Parlors'),
(2220, '812990', 'All Other Personal Services', '7299', 'Miscellaneous Personal Services'),
(2221, '812990', 'All Other Personal Services', '7389', 'Business Services, Nec'),
(2222, '812990', 'All Other Personal Services', '7999', 'Amusement and Recreation, Nec'),
(2223, '813110', 'Religious Organizations', '8661', 'Religious Organizations'),
(2224, '813211', 'Grantmaking Foundations', '6732', 'Trusts: Educational, Religious, Etc.'),
(2225, '813212', 'Voluntary Health Organizations', '8399', 'Social Services, Nec'),
(2226, '813219', 'Other Grantmaking and Giving Services', '8399', 'Social Services, Nec'),
(2227, '813311', 'Human Rights Organizations', '8399', 'Social Services, Nec'),
(2228, '813312', 'Environment, Conservation and Wildlife\nOrganizations', '8399', 'Social Services, Nec'),
(2229, '813312', 'Environment, Conservation and Wildlife\nOrganizations', '8699', 'Membership Organizations, Nec'),
(2230, '813319', 'Other Social Advocacy Organizations', '8399', 'Social Services, Nec'),
(2231, '813319', 'Other Social Advocacy Organizations', '8641', 'Civic and Social Associations'),
(2232, '813410', 'Civic and Social Organizations', '8641', 'Civic and Social Associations'),
(2233, '813410', 'Civic and Social Organizations', '8699', 'Membership Organizations, Nec'),
(2234, '813910', 'Business Associations', '8611', 'Business Associations'),
(2235, '813910', 'Business Associations', '8699', 'Membership Organizations, Nec'),
(2236, '813920', 'Professional Organizations', '8621', 'Professional Organizations'),
(2237, '813930', 'Labor Unions and Similar Labor\nOrganizations', '8631', 'Labor Organizations'),
(2238, '813940', 'Political Organizations', '8651', 'Political Organizations'),
(2239, '813990', 'Other Similar Organizations (except Business, Professional, Labor, and Political\nOrganizations)', '6531', 'Real Estate Agents and Managers'),
(2240, '813990', 'Other Similar Organizations (except Business, Professional, Labor, and Political\nOrganizations)', '8641', 'Civic and Social Associations'),
(2241, '813990', 'Other Similar Organizations (except Business, Professional, Labor, and Political\nOrganizations)', '8699', 'Membership Organizations, Nec'),
(2242, '814110', 'Private Households', '8811', ''),
(2243, '921110', 'Executive Offices', '9111', 'Executive Offices'),
(2244, '921120', 'Legislative Bodies', '9121', 'Legislative Bodies'),
(2245, '921130', 'Public Finance Activities', '9311', 'Finance, Taxation, and Monetary Policy'),
(2246, '921140', 'Executive and Legislative Offices,\nCombined', '9131', 'Executive and Legislative Combined'),
(2247, '921150', 'American Indian and Alaska Native Tribal\nGovernments', '8641', 'Civic and Social Associations'),
(2248, '921190', 'Other General Government Support', '9199', 'General Government, Nec'),
(2249, '922110', 'Courts', '9211', 'Courts'),
(2250, '922120', 'Police Protection', '9221', 'Police Protection'),
(2251, '922130', 'Legal Counsel and Prosecution', '9222', 'Legal Counsel and Prosecution'),
(2252, '922140', 'Correctional Institutions', '9223', 'Correctional Institutions'),
(2253, '922150', 'Parole Offices and Probation Offices', '8322', 'Individual and Family Services'),
(2254, '922160', 'Fire Protection', '9224', 'Fire Protection'),
(2255, '922190', 'Other Justice, Public Order, and Safety\nActivities', '9229', 'Public Order and Safety, Nec'),
(2256, '923110', 'Administration of Education Programs', '9411', 'Administration of Educational Programs'),
(2257, '923120', 'Administration of Public Health Programs', '9431', 'Administration of Public Health Programs'),
(2258, '923130', 'Administration of Human Resource\nPrograms (except Education, Public Health, and Veterans\' Affairs Programs)', '9441', 'Administration of Social and Manpower Programs'),
(2259, '923140', 'Administration of Veterans\' Affairs', '9451', 'Administration of Veterans\' Affairs'),
(2260, '924110', 'Administration of Air and Water Resource\nand Solid Waste Management Programs', '9511', 'Air, Water, and Solid Waste Management'),
(2261, '924120', 'Administration of Conservation Programs', '9512', 'Land, Mineral, and Wildlife Conservation'),
(2262, '925110', 'Administration of Housing Programs', '9531', 'Housing Programs'),
(2263, '925120', 'Administration of Urban Planning and\nCommunity and Rural Development', '9532', 'Urban and Community Development'),
(2264, '926110', 'Administration of General Economic\nPrograms', '9611', 'Administration of General Economic\nPrograms'),
(2265, '926120', 'Regulation and Administration of\nTransportation Programs', '9621', 'Regulation, Administration of\nTransportation'),
(2266, '926130', 'Regulation and Administration of Communications, Electric, Gas, and Other\nUtilities', '9631', 'Regulation, Administration of Utilities'),
(2267, '926140', 'Regulation of Agricultural Marketing and\nCommodities', '9641', 'Regulation of Agricultural Marketing'),
(2268, '926150', 'Regulation, Licensing, and Inspection of\nMiscellaneous Commercial Sectors', '9651', 'Regulation, Miscellaneous Commercial\nSectors'),
(2269, '927110', 'Space Research and Technology', '9661', 'Space Research and Technology'),
(2270, '928110', 'National Security', '9711', 'National Security'),
(2271, '928120', 'International Affairs', '9721', 'International Affairs');

-- --------------------------------------------------------

--
-- Table structure for table `pin_color`
--

CREATE TABLE `pin_color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `created _at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pin_color`
--

INSERT INTO `pin_color` (`id`, `name`, `color_code`, `created _at`, `updated_at`) VALUES
(2, 'Red', '#ff0000', '2021-04-17 19:24:37', '2021-04-17 19:24:37'),
(4, 'Green', '#009900', '2021-05-11 17:36:14', '2021-05-11 17:36:14'),
(5, 'Purple', '#990099', '2021-05-11 17:37:06', '2021-05-11 17:37:06'),
(6, 'Yellow', '#ffff00', '2021-05-11 17:37:06', '2021-05-11 17:37:06'),
(7, 'Blue', '#0000FF', '2021-05-12 12:24:25', '2021-05-12 12:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `reason_of_letter`
--

CREATE TABLE `reason_of_letter` (
  `id` int(11) NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reason_of_letter`
--

INSERT INTO `reason_of_letter` (`id`, `reason`) VALUES
(1, 'this is reason'),
(2, 'this is reason'),
(3, 'i am udpated reason');

-- --------------------------------------------------------

--
-- Table structure for table `req_change_supervsior`
--

CREATE TABLE `req_change_supervsior` (
  `id` int(11) NOT NULL,
  `ind_id` int(11) NOT NULL,
  `reason` varchar(5000) NOT NULL,
  `recommended_sup_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `req_change_supervsior`
--

INSERT INTO `req_change_supervsior` (`id`, `ind_id`, `reason`, `recommended_sup_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 27, 'i want to change my supervisor', 0, 1, '2021-10-23 19:27:37', '2021-10-24 13:45:02'),
(7, 2, 'dkjhsdkj', 3, 1, '2021-10-26 16:40:48', '2021-10-26 17:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `service_type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `service_type`, `created_at`, `updated_at`) VALUES
(1, 'Request for Credit Report', '', 67, '2021-10-12 13:56:03', '2021-10-12 13:56:03'),
(2, 'Request for Free Credit Report', '', 67, '2021-10-12 13:57:03', '2021-10-12 13:57:03'),
(3, 'Deletions to Credit Report', '', 67, '2021-10-12 14:00:36', '2021-10-27 13:56:54'),
(4, 'Corrections to Credit Report', '', 67, '2021-10-12 14:00:50', '2021-10-27 13:56:59'),
(5, 'Failure to Respond to Deletion/Correction Letter', '', 67, '2021-10-12 14:01:16', '2021-10-27 13:57:06'),
(6, 'Additions to Credit Report', '', 67, '2021-10-12 14:01:32', '2021-10-27 13:57:10'),
(7, 'Unauthorized Inquiry', '', 67, '2021-10-12 14:01:47', '2021-10-27 13:57:14'),
(8, 'Frivolous-Letter Rejection', '', 67, '2021-10-12 14:02:04', '2021-10-27 13:57:17'),
(9, 'Consumer Statement for Disputed Items Following Investigation', '', 67, '2021-10-12 14:02:20', '2021-10-27 13:57:23'),
(10, 'Consumer Statement for Disputed Items', '', 67, '2021-10-12 14:02:35', '2021-10-27 13:57:27'),
(11, 'Consumer Statement to Make Credit File Complete', '', 67, '2021-10-12 14:02:56', '2021-10-27 13:57:35'),
(12, 'Bankruptcy Accounts Not Identified ', '', 67, '2021-10-12 14:03:21', '2021-10-27 13:57:39'),
(13, 'Request to Update for Completeness of Account History', '', 67, '2021-10-12 14:03:38', '2021-10-27 13:57:46'),
(14, 'Mailing-List Restrictions', '', 67, '2021-10-12 14:03:59', '2021-10-27 13:57:51'),
(15, 'Repayment Agreement for Account', '', 67, '2021-10-12 14:04:12', '2021-10-27 13:57:59'),
(16, 'Terms Agreement', '', 67, '2021-10-12 14:05:28', '2021-10-27 13:58:03'),
(17, 'Debt Validation Letter', '', 67, '2021-10-12 14:05:36', '2021-10-27 13:58:07'),
(18, 'Credit Freeze Letter', '', 67, '2021-10-12 14:05:46', '2021-10-27 13:58:12'),
(19, 'Predatory Lending Complaint', '', 67, '2021-10-12 14:05:55', '2021-10-27 13:58:16'),
(20, 'Credit Complaint Letter', '', 67, '2021-10-12 14:06:18', '2021-10-27 13:58:20'),
(21, 'Unauthorized Credit Inquiry', '', 67, '2021-10-12 14:06:38', '2021-10-27 13:59:27'),
(22, 'Proposal to Settle Account', '', 67, '2021-10-12 14:06:53', '2021-10-27 13:59:39'),
(23, 'Request for Ceasing Phone Calls', '', 67, '2021-10-12 14:07:06', '2021-10-27 13:59:45'),
(24, 'Reduced-Payment Request for Account', '', 67, '2021-10-12 14:07:30', '2021-10-27 13:59:49'),
(66, 'i am service', 'i AM a service', 67, '2021-11-03 11:10:32', '2021-11-03 11:11:55'),
(67, 'sdssdsd', 'sdsdsd', 67, '2021-11-03 11:17:44', '2021-11-03 11:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `individual_id` int(11) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `next_paydate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `service_id`, `individual_id`, `description`, `price`, `next_paydate`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(38, 3, 2, 'Deletions to Credit Report', '200.00', '2021-11-14 12:32:01', 0, 0, '2021-11-01 08:25:07', '2021-11-14 12:32:01'),
(41, 8, 3, 'Frivolous-Letter Rejection', '0.00', '2021-11-14 12:31:48', 2, 0, '2021-11-05 11:49:21', '2021-11-14 12:31:48'),
(43, 13, 3, 'Request to Update for Completeness of Account History', '582.00', '2021-11-10 12:10:50', 1, 0, '2021-11-05 12:37:26', '2021-11-10 12:10:50'),
(44, 14, 3, 'Mailing-List Restrictions', '0.00', '2021-11-14 12:25:43', 2, 0, '2021-11-05 12:41:42', '2021-11-14 12:25:43'),
(47, 11, 3, 'oiknji', '0.00', '2021-11-14 12:25:46', 2, 0, '2021-11-05 12:43:13', '2021-11-14 12:25:46'),
(48, 6, 2, 'Additions to Credit Report', '50.00', '2021-11-14 12:25:23', 3, 0, '2021-11-06 20:02:32', '2021-11-14 12:25:23'),
(50, 6, 1, 's;ljkd;lkfd', '50.00', '2021-11-14 11:06:53', 1, 0, '2021-11-13 08:50:40', '2021-11-14 11:06:53'),
(51, 8, 1, 'jhkhj', '0.00', '2021-11-14 13:04:19', 0, 0, '2021-11-14 13:04:19', '2021-11-14 13:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `service_request_docs`
--

CREATE TABLE `service_request_docs` (
  `id` int(11) NOT NULL,
  `service_request_id` int(11) NOT NULL,
  `document` varchar(1000) NOT NULL,
  `type` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_request_docs`
--

INSERT INTO `service_request_docs` (`id`, `service_request_id`, `document`, `type`, `added_by`, `added_role`, `created_at`, `updated_at`) VALUES
(56, 38, '617fa46376d422021-11-01-09-25-071.PNG', '', '2', '3', '2021-11-01 08:25:07', '2021-11-01 08:25:07'),
(59, 41, '61851a4163b1d2021-11-05-12-49-212.png', '44', '3', '3', '2021-11-05 11:49:21', '2021-11-05 11:49:28'),
(61, 43, '61852586cbf432021-11-05-13-37-265.png', '41', '3', '3', '2021-11-05 12:37:26', '2021-11-05 12:37:36'),
(62, 44, '61852686d7d482021-11-05-13-41-42screencapture-localhost-cystan-admin-view-services-php-2021-10-30-12_31_01.png', '', '3', '3', '2021-11-05 12:41:42', '2021-11-05 12:41:42'),
(65, 47, '618526e1713e22021-11-05-13-43-135.png', '', '3', '3', '2021-11-05 12:43:13', '2021-11-05 12:43:13'),
(68, 50, '618f7c605042f2021-11-13-09-50-40pywhatkit.png', '', '1', '3', '2021-11-13 08:50:40', '2021-11-13 08:50:40'),
(69, 51, '619109541c4a52021-11-14-14-04-20pywhatkit.png', '', '1', '3', '2021-11-14 13:04:20', '2021-11-14 13:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `alt_contact` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `name`, `email`, `password`, `contact`, `alt_contact`, `street`, `city`, `state`, `zip`, `country`, `status`, `created_at`, `updated_at`) VALUES
(1, 'addddd', 'asad@gmail.com', '100', '1234', '1234', 'str', 'city', 'state', 52250, 'country', 1, '2021-08-24 13:17:21', '2021-09-23 12:03:25'),
(2, 'Ahmad', 'ahmad@gmail.com', '100', '2015493545', '4749745412', 'st#2', 'islamabad', 'punjab', 254136, 'pakistan', 0, '2021-09-09 09:15:15', '2021-09-18 13:25:41'),
(3, 'a254', 'asadking0366@gmail.com', '154', '12345678', '', 'asasaaaaaaaaaa', 'city', 'pun', 52250, 'Pakistan', 1, '2021-09-16 12:27:23', '2021-09-16 12:49:56'),
(4, 'salman', 'salman@gmail.com', '100', '78781451212', '789451212', 'ytg', 'iuotycv', 'iuoyf', 45132, 'ydsss', 1, '2021-09-18 13:23:16', '2021-09-18 13:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `transaction_id` varchar(500) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `req_id`, `transaction_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 48, 'ch_3JtVMCF40gdBNDIa0qASvLx7', '10200.00', '2021-11-08 10:45:47', '2021-11-09 19:08:37'),
(2, 38, 'sldkjsfdlkjdkfsmcv2s45d352v4fsdv', '3600.00', '2021-10-27 18:38:24', '2021-11-09 18:39:00'),
(3, 44, 'slkdfjsljvsdvd43v54sdfvmslfjvsf2v4', '500000.00', '2021-02-02 18:58:30', '2021-11-10 10:15:01'),
(4, 38, 'kjckldjo2349504392fkedfn4eowfdsfds', '5500.00', '2021-08-10 18:59:08', '2021-11-09 19:00:38'),
(5, 38, 'ch_3JuXRgF40gdBNDIa0uwI44if', '20000.00', '2021-11-11 07:11:43', '2021-11-11 07:11:43'),
(6, 50, 'ch_3JvIEUF40gdBNDIa087GUXQ8', '5000.00', '2021-11-13 09:09:11', '2021-11-13 09:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `business_type` int(11) NOT NULL,
  `address` varchar(2555) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `title`, `business_type`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'vendors', 70, 'address', '966453465', '2021-10-10 12:31:02', '2021-10-31 10:42:28'),
(2, 'test vendor', 71, 'test-address', '4445454', '2021-10-10 13:35:13', '2021-11-03 11:14:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_ibfk_3` (`deal_id`),
  ADD KEY `activity_ibfk_5` (`activity_type_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bureau`
--
ALTER TABLE `bureau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_docs`
--
ALTER TABLE `company_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal_stage`
--
ALTER TABLE `deal_stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `funel`
--
ALTER TABLE `funel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grouping`
--
ALTER TABLE `grouping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual`
--
ALTER TABLE `individual`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `letter_1`
--
ALTER TABLE `letter_1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_id` (`req_id`);

--
-- Indexes for table `letter_2`
--
ALTER TABLE `letter_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_id` (`req_id`);

--
-- Indexes for table `letter_3`
--
ALTER TABLE `letter_3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_id` (`req_id`);

--
-- Indexes for table `letter_4`
--
ALTER TABLE `letter_4`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_id` (`req_id`);

--
-- Indexes for table `letter_5`
--
ALTER TABLE `letter_5`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_id` (`req_id`);

--
-- Indexes for table `letter_6`
--
ALTER TABLE `letter_6`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `letter_6_ibfk_2` (`req_id`);

--
-- Indexes for table `letter_7`
--
ALTER TABLE `letter_7`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to` (`b_id`),
  ADD KEY `req_id` (`req_id`);

--
-- Indexes for table `letter_8`
--
ALTER TABLE `letter_8`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `letter_8_ibfk_2` (`req_id`);

--
-- Indexes for table `letter_9`
--
ALTER TABLE `letter_9`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `letter_9_ibfk_2` (`req_id`);

--
-- Indexes for table `letter_10`
--
ALTER TABLE `letter_10`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `letter_10_ibfk_2` (`req_id`);

--
-- Indexes for table `letter_11`
--
ALTER TABLE `letter_11`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `letter_11_ibfk_2` (`req_id`);

--
-- Indexes for table `letter_12`
--
ALTER TABLE `letter_12`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `letter_12_ibfk_2` (`req_id`);

--
-- Indexes for table `letter_13`
--
ALTER TABLE `letter_13`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `letter_13_ibfk_2` (`req_id`);

--
-- Indexes for table `letter_14`
--
ALTER TABLE `letter_14`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `letter_14_ibfk_2` (`req_id`);

--
-- Indexes for table `letter_four_items`
--
ALTER TABLE `letter_four_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `letter_id` (`letter_id`);

--
-- Indexes for table `letter_seven_creditors`
--
ALTER TABLE `letter_seven_creditors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creditors_id` (`creditors_id`),
  ADD KEY `letter_seven_creditors_ibfk_1` (`letter_id`);

--
-- Indexes for table `letter_six_creditors`
--
ALTER TABLE `letter_six_creditors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creditor_id` (`creditor_id`),
  ADD KEY `letter_six_creditors_ibfk_2` (`letter_id`);

--
-- Indexes for table `letter_three_items`
--
ALTER TABLE `letter_three_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `letter_id` (`letter_id`);

--
-- Indexes for table `naics`
--
ALTER TABLE `naics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin_color`
--
ALTER TABLE `pin_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reason_of_letter`
--
ALTER TABLE `reason_of_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `req_change_supervsior`
--
ALTER TABLE `req_change_supervsior`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_type` (`service_type`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `individual_id` (`individual_id`);

--
-- Indexes for table `service_request_docs`
--
ALTER TABLE `service_request_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_request_id` (`service_request_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_id` (`req_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_type` (`business_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bureau`
--
ALTER TABLE `bureau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `company_docs`
--
ALTER TABLE `company_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `deal_stage`
--
ALTER TABLE `deal_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `funel`
--
ALTER TABLE `funel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grouping`
--
ALTER TABLE `grouping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `individual`
--
ALTER TABLE `individual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `letter_1`
--
ALTER TABLE `letter_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `letter_2`
--
ALTER TABLE `letter_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `letter_3`
--
ALTER TABLE `letter_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `letter_4`
--
ALTER TABLE `letter_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `letter_5`
--
ALTER TABLE `letter_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `letter_6`
--
ALTER TABLE `letter_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `letter_7`
--
ALTER TABLE `letter_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `letter_8`
--
ALTER TABLE `letter_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `letter_9`
--
ALTER TABLE `letter_9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `letter_10`
--
ALTER TABLE `letter_10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `letter_11`
--
ALTER TABLE `letter_11`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `letter_12`
--
ALTER TABLE `letter_12`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `letter_13`
--
ALTER TABLE `letter_13`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `letter_14`
--
ALTER TABLE `letter_14`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `letter_four_items`
--
ALTER TABLE `letter_four_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `letter_seven_creditors`
--
ALTER TABLE `letter_seven_creditors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `letter_six_creditors`
--
ALTER TABLE `letter_six_creditors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `letter_three_items`
--
ALTER TABLE `letter_three_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `naics`
--
ALTER TABLE `naics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2272;

--
-- AUTO_INCREMENT for table `pin_color`
--
ALTER TABLE `pin_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reason_of_letter`
--
ALTER TABLE `reason_of_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `req_change_supervsior`
--
ALTER TABLE `req_change_supervsior`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `service_request_docs`
--
ALTER TABLE `service_request_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_3` FOREIGN KEY (`deal_id`) REFERENCES `deal` (`id`),
  ADD CONSTRAINT `activity_ibfk_5` FOREIGN KEY (`activity_type_id`) REFERENCES `grouping` (`id`);

--
-- Constraints for table `letter_1`
--
ALTER TABLE `letter_1`
  ADD CONSTRAINT `letter_1_ibfk_1` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_2`
--
ALTER TABLE `letter_2`
  ADD CONSTRAINT `letter_2_ibfk_1` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_3`
--
ALTER TABLE `letter_3`
  ADD CONSTRAINT `letter_3_ibfk_1` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_4`
--
ALTER TABLE `letter_4`
  ADD CONSTRAINT `letter_4_ibfk_1` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_5`
--
ALTER TABLE `letter_5`
  ADD CONSTRAINT `letter_5_ibfk_1` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_6`
--
ALTER TABLE `letter_6`
  ADD CONSTRAINT `letter_6_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bureau` (`id`),
  ADD CONSTRAINT `letter_6_ibfk_2` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_7`
--
ALTER TABLE `letter_7`
  ADD CONSTRAINT `letter_7_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `bureau` (`id`),
  ADD CONSTRAINT `letter_7_ibfk_3` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_8`
--
ALTER TABLE `letter_8`
  ADD CONSTRAINT `letter_8_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bureau` (`id`),
  ADD CONSTRAINT `letter_8_ibfk_2` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_9`
--
ALTER TABLE `letter_9`
  ADD CONSTRAINT `letter_9_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bureau` (`id`),
  ADD CONSTRAINT `letter_9_ibfk_2` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_10`
--
ALTER TABLE `letter_10`
  ADD CONSTRAINT `letter_10_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bureau` (`id`),
  ADD CONSTRAINT `letter_10_ibfk_2` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_11`
--
ALTER TABLE `letter_11`
  ADD CONSTRAINT `letter_11_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bureau` (`id`),
  ADD CONSTRAINT `letter_11_ibfk_2` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_12`
--
ALTER TABLE `letter_12`
  ADD CONSTRAINT `letter_12_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bureau` (`id`),
  ADD CONSTRAINT `letter_12_ibfk_2` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_13`
--
ALTER TABLE `letter_13`
  ADD CONSTRAINT `letter_13_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bureau` (`id`),
  ADD CONSTRAINT `letter_13_ibfk_2` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_14`
--
ALTER TABLE `letter_14`
  ADD CONSTRAINT `letter_14_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bureau` (`id`),
  ADD CONSTRAINT `letter_14_ibfk_2` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_four_items`
--
ALTER TABLE `letter_four_items`
  ADD CONSTRAINT `letter_four_items_ibfk_1` FOREIGN KEY (`letter_id`) REFERENCES `letter_4` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_seven_creditors`
--
ALTER TABLE `letter_seven_creditors`
  ADD CONSTRAINT `letter_seven_creditors_ibfk_1` FOREIGN KEY (`letter_id`) REFERENCES `letter_7` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `letter_seven_creditors_ibfk_2` FOREIGN KEY (`creditors_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `letter_six_creditors`
--
ALTER TABLE `letter_six_creditors`
  ADD CONSTRAINT `letter_six_creditors_ibfk_1` FOREIGN KEY (`creditor_id`) REFERENCES `vendors` (`id`),
  ADD CONSTRAINT `letter_six_creditors_ibfk_2` FOREIGN KEY (`letter_id`) REFERENCES `letter_6` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `letter_three_items`
--
ALTER TABLE `letter_three_items`
  ADD CONSTRAINT `letter_three_items_ibfk_1` FOREIGN KEY (`letter_id`) REFERENCES `letter_3` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`service_type`) REFERENCES `grouping` (`id`);

--
-- Constraints for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD CONSTRAINT `service_requests_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `service_requests_ibfk_2` FOREIGN KEY (`individual_id`) REFERENCES `individual` (`id`);

--
-- Constraints for table `service_request_docs`
--
ALTER TABLE `service_request_docs`
  ADD CONSTRAINT `service_request_docs_ibfk_1` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`req_id`) REFERENCES `service_requests` (`id`);

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_ibfk_1` FOREIGN KEY (`business_type`) REFERENCES `grouping` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
