-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2020 at 04:03 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `az_db_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

DROP TABLE IF EXISTS `buy`;
CREATE TABLE IF NOT EXISTS `buy` (
  `buy_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `buy_date` date NOT NULL,
  PRIMARY KEY (`buy_id`),
  KEY `supplier_buy_fk` (`supplier_id`),
  KEY `employee_buy_fk` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`buy_id`, `supplier_id`, `employee_id`, `buy_date`) VALUES
(1, 1, NULL, '2018-04-16'),
(2, 1, NULL, '2018-04-16'),
(3, 4, NULL, '2018-04-12'),
(4, 7, NULL, '2018-04-20'),
(5, 8, NULL, '0000-00-00'),
(6, 5, 4, '2018-04-30'),
(7, 1, NULL, '2018-05-21'),
(8, 9, NULL, '2018-05-01'),
(9, 5, 4, '2018-05-01'),
(10, 5, 4, '2018-05-21'),
(11, 1, 4, '0000-00-00'),
(12, 10, 8, '2018-05-02'),
(13, 1, 4, '0000-00-00'),
(14, 1, 4, '2018-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `buy_detail`
--

DROP TABLE IF EXISTS `buy_detail`;
CREATE TABLE IF NOT EXISTS `buy_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `buy_id` int(11) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text,
  `quantity` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `manufacture_date` date NOT NULL,
  `expire_date` date DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `category_buy_fk` (`category_id`),
  KEY `buy_buydetail_fk` (`buy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buy_detail`
--

INSERT INTO `buy_detail` (`detail_id`, `buy_id`, `product_name`, `category_id`, `description`, `quantity`, `unitprice`, `totalprice`, `manufacture_date`, `expire_date`) VALUES
(1, 2, 'Xbox 360 4 player', 1, 'RAM:60 \r\nHard Disk: 250\r\nResolution: Full HD', 120, 35000, 4200000, '2017-04-17', '0000-00-00'),
(2, 2, 'Loptop inspiron 2020', 1, 'RAM: 4GB\r\nHard Disk: 1000GB', 80, 25000, 2000000, '2018-04-13', '0000-00-00'),
(3, 4, 'Play satations', 4, 'RAM: something about RAM\r\nCPU: Something about CPU\r\nGraphic: Something about Graphic\r\nQuality: Full Screen, and Full HD', 200, 40000, 8000000, '2018-04-02', '0000-00-00'),
(4, 4, 'Switch', 2, 'Something about Switch and its quality ', 100, 10000, 1000000, '2018-04-09', '0000-00-00'),
(5, 5, 'Pants', 2, 'Color: Black\r\n12 boxjfjdkhfghjhd\r\nkfjdkj', 5, 1200, 6000, '2017-03-17', '0000-00-00'),
(6, 6, 'Hard Disk', 2, 'some info about hard desk and its detail', 167, 4000, 668000, '2018-02-01', '0000-00-00'),
(7, 8, 'Loptop inspiron 4030', 1, 'Ram:soemthing about ram\r\nHD: something about HD\r\nfjdjhfjdhfjd', 98, 35000, 3430000, '2018-04-02', '0000-00-00'),
(8, 9, 'HP disk jet', 1, 'Ù…ÙˆØ¯Ù„:desk jet 21 30\r\nØ¨Ø±Ù†Ø¯: hp\r\nØ±Ù†Ú¯: Ø³ÙÛŒØ¯\r\nÙˆØ²Ù†: 8 Ú©ÛŒÙ„Ùˆ Ú¯Ø±Ø§Ù…\r\nØ­Ø¬Ù…: 16*11*5\r\nØ³Ø±Ø¹Øª Ù¾Ø±Ù†Øª: 7 ÙˆØ±Ù‚ Ø¯Ø± ÛŒÚ© Ø¯Ù‚ÛŒÙ‚Ù‡\r\nÚ©Ø§Ø± Ú©Ø±Ø¯: Ù¾Ø±Ù†Øª ØŒ Ú©Ø§Ù¾ÛŒ Ùˆ Ø§Ø³Ú©Ù†\r\nÙ‚Ø§Ø¨Ù„ÛŒØª ÙˆÛŒÙ†Ø¯ÙˆØ²: Ø¨Ù‡ Ù‡Ù…Ù‡\r\nØ³Ø§Ø®Øª: Ú†ÛŒÙ†', 1, 2590, 2590, '2018-04-09', '0000-00-00'),
(9, 12, 'Ù¾Ù„ÛŒ Ø§Ø³ØªÛŒØ³Ù†', 4, 'Ø±Ù…: 8 Ø¬ÛŒ Ø¨ÛŒ\r\nÙ‡Ø§Ø±Ø¯ Ø¯ÛŒØ³Ú©: 500 Ø¬ÛŒ Ø¨ÛŒ\r\nØªØ¹Ø¯Ø§Ø¯ Ø¨Ø§Ø²ÛŒ Ú¯Ø±: Ù‡Ù…Ø²Ù…Ø§Ù† 4 Ø¨Ø§Ø²ÛŒ Ú©Ù†', 20, 40000, 800000, '2018-04-03', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(64) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2, 'Ù…Ø­ØµÙˆÙ„ Ù†ÙˆØ¹ Ø³ÙˆÙ…'),
(1, 'Ù…Ø­ØµÙˆÙ„ Ø¢ØªØ´Ø²Ø§'),
(4, 'Ù…Ø­ØµÙˆÙ„ Ø¯Ø³ØªÙ‡ Ø¯ÙˆÙ…'),
(5, 'Ù…Ø­ØµÙˆÙ„Ø§Øª Ø¯Ø³ØªÙ‡ Ø§ÙˆÙ„');

-- --------------------------------------------------------

--
-- Table structure for table `company_order`
--

DROP TABLE IF EXISTS `company_order`;
CREATE TABLE IF NOT EXISTS `company_order` (
  `company_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `certify_no` varchar(64) DEFAULT NULL,
  `con_person` varchar(64) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `orders` text,
  `address` varchar(128) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`company_order_id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `certify_no` (`certify_no`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_order`
--

INSERT INTO `company_order` (`company_order_id`, `name`, `certify_no`, `con_person`, `phone`, `email`, `orders`, `address`, `reg_date`) VALUES
(1, 'Toshiba', 'davidson', 'E2345', '0217838888', 'toshiba@info.com', 'Loptop inspiron 21 31', 'Japan, Tokeyo', '2018-04-18'),
(3, 'Blue Ray', '07838432822', 'David Son', '07896665', 'david@gmail.com', 'Tablet', 'French, Paris		', '2018-04-24'),
(4, 'HP', 'E123445555', 'sami', '0788666655', 'h@yahoo.com', 'computer', 'german		', '2018-04-29'),
(5, 'SKYnet', 'E23556555', 'James', '097655444343', 'sky@hotmail.com', 'playstation', 'America		', '2018-04-29'),
(6, 'Ø¢Ø±ÛŒØ§ Ø²ÙˆÙ†', '3455', 'Ø§Ø­Ù…Ø¯', '0787654', 'aryazon@info.com', 'Ù¾Ù„ÛŒ Ø§Ø³ØªÛŒØ´Ù†', 'Ú©Ø§Ø¨Ù„ Ø´Ù‡Ø± Ù†Ùˆ		', '2018-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `cus_company`
--

DROP TABLE IF EXISTS `cus_company`;
CREATE TABLE IF NOT EXISTS `cus_company` (
  `cus_company_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `certify_no` varchar(64) DEFAULT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`cus_company_id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `certify_no` (`certify_no`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_company`
--

INSERT INTO `cus_company` (`cus_company_id`, `name`, `certify_no`, `phone`, `email`, `address`, `reg_date`) VALUES
(1, 'Alibab', 'e12333', '6476222', 'alibab@yahoo.com', 'China, Pekeng', '2018-04-05'),
(2, 'Samsung', '', '0318484888', 'samung@gmail.com', 'kOREA', '2018-04-17'),
(3, 'SKY net', 'E457839', '489389839', 'sky@info.com', 'Canada, Atawa', '2018-04-22'),
(4, 'Blue Ray', '4839382', '47384383', 'blue@yahoo.com', 'Canada, Atawa', '2018-04-22'),
(6, 'ÙØ§ÛŒÙ†ÛŒØ³Øª', 'f1232', '077222', 'finest@info.com', 'Ú©Ø§Ø¨Ù„ØŒ Ù¾Ù„ Ø³Ø±Ø®', '2018-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `cus_person`
--

DROP TABLE IF EXISTS `cus_person`;
CREATE TABLE IF NOT EXISTS `cus_person` (
  `cus_person_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_firstname` varchar(64) NOT NULL,
  `cus_lastname` varchar(64) DEFAULT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`cus_person_id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_person`
--

INSERT INTO `cus_person` (`cus_person_id`, `cus_firstname`, `cus_lastname`, `phone`, `email`, `address`, `reg_date`) VALUES
(1, 'solaiman', 'karimi', '07553525', 'karimi@gmail.com', 'kabul', '0000-00-00'),
(2, 'Baran', 'Ali Poor', '09853626526', 'Baran@outlook.com', 'Iran, Tehran		', '2018-04-18'),
(4, 'Ahmad Solaiman', 'Karimi', '0789056234', 'something@yahoo.com', 'ciname pamer 4th house, 3th floor', '0000-00-00'),
(6, 'David', '', '043222112', 'david@outlook.com', '			Mississippi		', '2018-04-23'),
(7, 'Ù…ØµØ·ÙÛŒ', 'Ø²Ù…Ø§Ù†ÛŒ', '078654455', 'm2018@outlook.com', 'Ú©Ø§Ø¨Ù„ØŒ Ø¨Ø±Ú†ÛŒ', '0000-00-00'),
(8, 'ali', 'zamani', '087654', 'ali@hotmail.com', 'Kabul', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `identity_no` int(11) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `position` varchar(64) NOT NULL,
  `education` varchar(64) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `address` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `hire_date` date NOT NULL,
  `dob` int(11) NOT NULL,
  `marital_status` tinyint(1) NOT NULL,
  `salary` int(11) NOT NULL,
  `shift` varchar(32) NOT NULL,
  `contract` varchar(255) NOT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `identity_no` (`identity_no`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `identity_no`, `firstname`, `lastname`, `position`, `education`, `phone`, `email`, `address`, `image`, `gender`, `hire_date`, `dob`, `marital_status`, `salary`, `shift`, `contract`) VALUES
(4, 4545555, 'Maryam', 'Raha', 'Human Resource Officer', 'Ù„ÛŒØ³Ø§Ù†Ø³', '07867655', 'm@hootmail.com', 'kabul', 'images/employee/1524825431a (4).jpg', 1, '2018-04-18', 1994, 0, 25000, 'Ù‚Ø¨Ù„ Ø§Ø² Ø¸Ù‡Ø±', 'three months'),
(5, 48393989, 'Amin', 'arfei', 'student', 'Ù„ÛŒØ³Ø§Ù†Ø³', '08876754', 'amin@yahoo.com', 'kabul', 'images/employee/152493698115193637_1029418517186486_3111683813709050571_n.jpg', 0, '0000-00-00', 1995, 0, 30000, 'Ù‚Ø¨Ù„ Ø§Ø² Ø¸Ù‡Ø±', 'two years'),
(6, 483982, 'Obaid', 'Ahmadi', 'Marketer', 'Ù„ÛŒØ³Ø§Ù†Ø³', '076765622', 'obaid@info.com', 'kabul, 4th district', 'images/employee/1525085148aa (2).jpg', 0, '2018-04-30', 1991, 0, 35000, 'ØªÙ…Ø§Ù… ÙˆÙ‚Øª', 'one years'),
(7, 42933, 'Hossain', 'mohebbi', 'Photography', 'Ù„ÛŒØ³Ø§Ù†Ø³', '09877665', 's@yahoo.com', 'kabul', 'images/employee/1525165135a (5).jpg', 0, '2018-05-02', 1995, 0, 30000, 'ØªÙ…Ø§Ù… ÙˆÙ‚Øª', 'three years'),
(8, 1232, 'Baran', 'Rozbeh', 'Singer', 'Ù…Ø§Ø³ØªØ±', '07876754', 'baran@hotmail.com', 'kabul', 'images/employee/152516969070760771f0e5cb196e1359ced42d590f.jpg', 1, '2018-05-08', 1994, 0, 45000, 'Ø¨Ø¹Ø¯ Ø§Ø² Ø¸Ù‡Ø±', '2018 - 2019'),
(9, 887, 'Mushataq', 'arefi', 'finance', 'Ù…Ø§Ø³ØªØ±', '012344233', 'arefi@gmail.com', 'kabul', 'images/employee/1525171039a (11).jpg', 0, '2018-05-01', 1994, 0, 45000, 'ØªÙ…Ø§Ù… ÙˆÙ‚Øª', 'four months'),
(10, 98322, 'Hamid', 'Bakhtyari', 'RE', 'Ù„ÛŒØ³Ø§Ù†Ø³', '067653622222', 'h@gmail.com', 'kabul', 'images/employee/152517297070760771f0e5cb196e1359ced42d590f.jpg', 0, '2018-05-01', 1997, 0, 35000, 'ØªÙ…Ø§Ù… ÙˆÙ‚Øª', 'a months'),
(11, 876543, 'Ù†ÛŒØ´Ø§', 'Ø²Ù…Ø§Ù†ÛŒ', 'ØªØ­Ù„ÛŒÙ„ Ú¯Ø± Ø³ÛŒØ³ØªÛŒÙ… Ù‡Ø§ÛŒ Ø¹Ø§Ù…Ù„', 'Ø¯ÙˆÚ©ØªÙˆØ±', '0787654', 'nisha@hotmail.com', 'Ú©Ø§Ø¨Ù„ Ù¾Ù„ Ø³Ø±Ø®', 'images/employee/1525247185a (5).jpg', 1, '0000-00-00', 1992, 0, 120000, 'Ù‚Ø¨Ù„ Ø§Ø² Ø¸Ù‡Ø±', 'Ù…Ø¯Øª Ù‚Ø±Ø§Ø±Ø¯Ø§Ø¯ ÛŒÚ© Ø³Ø§Ù„'),
(12, 22020, 'Mohammad', 'Ahmadi', 'driver', 'Ú©Ø§Ø±Ù…Ù†Ø¯ Ø¹Ø§Ø¯ÛŒ', '098989', 'm@yahoo.com', 'Kabuld', 'images/employee/1589644446Brett Jordan_Sunglasses_Zk1l.jpg', 0, '2020-05-16', 1992, 0, 12000, 'Ù‚Ø¨Ù„ Ø§Ø² Ø¸Ù‡Ø±', '1');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
CREATE TABLE IF NOT EXISTS `expense` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `currency` char(16) NOT NULL,
  `pay_date` date NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `receiver` varchar(64) NOT NULL,
  PRIMARY KEY (`expense_id`),
  KEY `employee_expense_fk` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `title`, `amount`, `currency`, `pay_date`, `employee_id`, `receiver`) VALUES
(5, 'salary', 5000, 'Ø§Ù', '2018-04-22', NULL, 'Mahdi'),
(6, 'Buy computer', 35000, '$', '2018-04-23', NULL, 'Mahdi'),
(7, 'tax', 3000, 'Ø§ÙØºØ§Ù†ÛŒ', '2018-04-30', 4, 'Amin'),
(9, 'bread', 120, 'Ø§ÙØºØ§Ù†ÛŒ', '2018-05-02', 4, 'Mahdi');

-- --------------------------------------------------------

--
-- Table structure for table `person_order`
--

DROP TABLE IF EXISTS `person_order`;
CREATE TABLE IF NOT EXISTS `person_order` (
  `person_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) DEFAULT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `orders` text,
  `address` varchar(255) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`person_order_id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person_order`
--

INSERT INTO `person_order` (`person_order_id`, `firstname`, `lastname`, `phone`, `email`, `orders`, `address`, `reg_date`) VALUES
(6, 'Maryam', 'Yasa', '1212078322', 'my@gmail.com', '									Xbox 360 6 players HD						', '									Afghanistan, Herat,Airport avenu, 3th lane, fourth house						', '2018-04-22'),
(7, 'Ù…ØµØ·ÙÛŒ', 'Ø²Ù…Ø§Ù†ÛŒ', '088765', 'm2019@hotmail.com', 'Ø¯Ùˆ Ø¬Ù„Ø¯ Ú©ØªØ§Ø¨ Ù‡Ú©ÛŒÙ†Ú¯', 'Ú©Ø§Ø¨Ù„ØŒ Ø¨Ø±Ú†ÛŒ', '2018-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(64) NOT NULL,
  `qr_code` varchar(128) DEFAULT NULL,
  `barcode` bigint(20) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `store_date` date NOT NULL,
  `location` varchar(128) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_product_fk` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `qr_code`, `barcode`, `category_id`, `unitprice`, `quantity`, `image`, `store_date`, `location`) VALUES
(2, 'Loptop inspiron 2020', 'images/qrcode/1525086480a (4).jpg', 0, 1, 36000, 3, 'images/product/1525086480a (4).jpg', '2018-04-17', 'Ú¯Ø¯Ø§Ù… Ù…ÙˆØ±Ø¯ Ù†Ø¸Ø± Ø§Ù†ØªØ®Ø§Ø¨ Ú©Ù†ÛŒØ¯'),
(3, 'Play satations', 'images/qrcode/152497958015170933_1294668497263670_820515641588860368_n.jpg', 0, 4, 43000, 150, 'images/product/152497958015170933_1294668497263670_820515641588860368_n.jpg', '2018-04-21', 'Ú¯Ø¯Ø§Ù… Ù…ÙˆØ±Ø¯ Ù†Ø¸Ø± Ø§Ù†ØªØ®Ø§Ø¨ Ú©Ù†ÛŒØ¯'),
(4, 'Ù¾Ù„ÛŒ Ø§Ø³ØªÛŒØ³Ù†', 'images/qrcode/1525243740a (8).jpg', 987832, 4, 43000, 8, 'images/product/1525243740a (8).jpg', '2018-05-07', 'Ú¯Ø¯Ø§Ù… Ø¯ÙˆÙ…');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `cus_person_id` int(11) DEFAULT NULL,
  `cus_company_id` int(11) DEFAULT NULL,
  `sale_date` date NOT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `employee_sales_fk` (`employee_id`),
  KEY `cus_person_sales_fk` (`cus_person_id`),
  KEY `cus_company_sales_fk` (`cus_company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `employee_id`, `cus_person_id`, `cus_company_id`, `sale_date`) VALUES
(1, NULL, 2, NULL, '2018-04-17'),
(2, 4, 2, NULL, '2018-04-29'),
(3, 5, NULL, 4, '2018-04-29'),
(4, 5, 6, NULL, '2018-04-30'),
(5, 4, 1, NULL, '2018-05-01'),
(6, 9, 6, NULL, '2018-05-02'),
(7, 9, NULL, 1, '2018-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

DROP TABLE IF EXISTS `sales_detail`;
CREATE TABLE IF NOT EXISTS `sales_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `totalamount` float NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `product_salesdetail_fk` (`product_id`),
  KEY `sales_detail_fk` (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_detail`
--

INSERT INTO `sales_detail` (`detail_id`, `sales_id`, `product_id`, `quantity`, `unitprice`, `totalprice`, `discount`, `totalamount`) VALUES
(1, 2, 3, 13, 43000, 559000, 0, 559000),
(2, 3, 3, 23, 43000, 989000, 7, 919770),
(3, 4, 2, 1, 36000, 36000, 0, 36000),
(4, 5, 2, 5, 36000, 180000, 0, 180000),
(5, 6, 4, 17, 43000, 731000, 6, 687140),
(6, 7, 2, 1, 36000, 36000, 0, 36000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sales_report`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `sales_report`;
CREATE TABLE IF NOT EXISTS `sales_report` (
`sales_id` int(11)
,`employee_id` int(11)
,`cus_person_id` int(11)
,`cus_company_id` int(11)
,`sale_date` date
,`company_name` varchar(64)
,`customer_name` varchar(129)
,`employee_name` varchar(129)
);

-- --------------------------------------------------------

--
-- Table structure for table `sales_return`
--

DROP TABLE IF EXISTS `sales_return`;
CREATE TABLE IF NOT EXISTS `sales_return` (
  `return_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  PRIMARY KEY (`return_id`),
  KEY `product_sales_return_fk` (`product_id`),
  KEY `sales_salesreturn_fk` (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_return`
--

INSERT INTO `sales_return` (`return_id`, `sales_id`, `product_id`, `return_date`, `reason`, `quantity`, `unitprice`, `totalprice`) VALUES
(1, 2, 3, '2018-04-29', 'broken', 3, 43000, 129000),
(2, 3, 3, '2018-04-29', 'something is broken', 3, 43000, 129000),
(3, 6, 4, '2018-05-02', 'Ù‡Ø§Ø¯ÛŒØ³Ú© Ù…Ø´Ú©Ù„ Ø¯Ø§Ø´Øª', 5, 43000, 215000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `supplier_type` tinyint(1) NOT NULL,
  `location` varchar(128) NOT NULL,
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `email`, `supplier_type`, `location`) VALUES
(1, 'Amazon', '04138728', 'amazon@info.com', 1, 'Amazon'),
(4, 'Samsung', '0124344', 'samsung@gmail.com', 0, 'Samsung'),
(5, 'Toshiba', '0315555233', 'tshb@gmail.com', 1, 'Toshiba'),
(7, 'BlueSky', '3134848', 'sky@hotmail.com', 1, 'BlueSky'),
(8, 'Micro Soft', '07866555445', 'miro@info.com', 1, 'israeel'),
(9, 'Ù…ÛŒØ±Ø²Ø§ Ù‡Ù†Ø¯ÛŒ', '087365222', 'mirza@gmail.com', 0, 'Ú©Ø§Ø¨Ù„ØŒ Ø§ÙØºØ§Ù†Ø³ØªØ§Ù†'),
(10, 'Ø¢Ø±ÛŒØ§ Ø²ÙˆÙ†', '0876544', 'aryazon@info.com', 0, 'Ø¢Ø±ÛŒØ§ Ø²ÙˆÙ†');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `employee_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` enum('admin','HR','finance','inventory') NOT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`employee_id`, `username`, `password`, `level`) VALUES
(4, 'finance', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'finance'),
(5, 'inventory', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'inventory'),
(8, 'hr', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'HR'),
(9, 'admin', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'admin');

-- --------------------------------------------------------

--
-- Structure for view `sales_report`
--
DROP TABLE IF EXISTS `sales_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sales_report`  AS  select `sales`.`sales_id` AS `sales_id`,`sales`.`employee_id` AS `employee_id`,`sales`.`cus_person_id` AS `cus_person_id`,`sales`.`cus_company_id` AS `cus_company_id`,`sales`.`sale_date` AS `sale_date`,`cus_company`.`name` AS `company_name`,concat(`cus_person`.`cus_firstname`,' ',`cus_person`.`cus_lastname`) AS `customer_name`,concat(`employee`.`firstname`,' ',`employee`.`lastname`) AS `employee_name` from (((`sales` join `employee` on((`employee`.`employee_id` = `sales`.`employee_id`))) left join `cus_company` on((`cus_company`.`cus_company_id` = `sales`.`cus_company_id`))) left join `cus_person` on((`cus_person`.`cus_person_id` = `sales`.`cus_person_id`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `employee_buy_fk` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_buy_fk` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `buy_detail`
--
ALTER TABLE `buy_detail`
  ADD CONSTRAINT `buy_buydetail_fk` FOREIGN KEY (`buy_id`) REFERENCES `buy` (`buy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_buy_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `employee_expense_fk` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_product_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `cus_company_sales_fk` FOREIGN KEY (`cus_company_id`) REFERENCES `cus_company` (`cus_company_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cus_person_sales_fk` FOREIGN KEY (`cus_person_id`) REFERENCES `cus_person` (`cus_person_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_sales_fk` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD CONSTRAINT `product_salesdetail_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_detail_fk` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD CONSTRAINT `product_sales_return_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_salesreturn_fk` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `employee_users_fk` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
