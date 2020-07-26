-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 05:22 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `templete` int(11) NOT NULL,
  `content` text NOT NULL,
  `photo` text NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` date NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `userid`, `templete`, `content`, `photo`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 13, 1, 'Templete 11', '1,2,4', '2020-07-01', 9, '2020-07-19', 13);

-- --------------------------------------------------------

--
-- Table structure for table `contactinfo`
--

CREATE TABLE `contactinfo` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_registration_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `office_phone` varchar(255) NOT NULL,
  `office_fax` varchar(255) NOT NULL,
  `person_in_charge_name` varchar(255) NOT NULL,
  `person_in_charge_email` varchar(255) NOT NULL,
  `person_in_charge_phone` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactinfo`
--

INSERT INTO `contactinfo` (`id`, `userid`, `company_name`, `company_registration_no`, `address`, `office_phone`, `office_fax`, `person_in_charge_name`, `person_in_charge_email`, `person_in_charge_phone`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 10, 'qwdx', 'qwd', 'wqe', '', 'qwd', 'd', 'qd', 'q', '2020-07-01', 9, '2020-07-01', 9);

-- --------------------------------------------------------

--
-- Table structure for table `domainemail`
--

CREATE TABLE `domainemail` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `domain_server_name` varchar(255) NOT NULL,
  `email1` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `email3` varchar(255) NOT NULL,
  `email4` varchar(255) NOT NULL,
  `email5` varchar(255) NOT NULL,
  `email6` varchar(255) NOT NULL,
  `email7` varchar(255) NOT NULL,
  `email8` varchar(255) NOT NULL,
  `email9` varchar(255) NOT NULL,
  `email10` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domainemail`
--

INSERT INTO `domainemail` (`id`, `userid`, `domain_name`, `domain_server_name`, `email1`, `email2`, `email3`, `email4`, `email5`, `email6`, `email7`, `email8`, `email9`, `email10`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 10, 'www.domain.com', 'www.servername.com', 'email1@gmail.com', 'email2@gmail.com', '', '', '', '', '', '', '', '', '2020-07-01', 9, '2020-07-01', 9);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `userid`, `logo`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, 10, '1593582138543459283.png', '2020-07-01', 9, '2020-07-01', 9),
(3, 13, '1595124223527807402.png', '2020-07-16', 13, '2020-07-19', 13);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `manual_payment` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account_name` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `billpiz` int(11) DEFAULT NULL,
  `billpiz_email` varchar(255) DEFAULT NULL,
  `billpiz_password` varchar(1024) DEFAULT NULL,
  `paypal` int(11) DEFAULT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `paypal_password` varchar(1024) DEFAULT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `userid`, `manual_payment`, `bank_name`, `bank_account_name`, `bank_account_number`, `billpiz`, `billpiz_email`, `billpiz_password`, `paypal`, `paypal_email`, `paypal_password`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 13, 0, '', '', '', 0, '', '', 0, '', '', '2020-07-01', 9, '2020-07-16', 13);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `logo` int(11) NOT NULL,
  `about_us` int(11) NOT NULL,
  `shipping` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `contactinfo` int(11) NOT NULL,
  `socialmedia` int(11) NOT NULL,
  `domainemail` int(11) NOT NULL,
  `websitedesign` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `userid`, `logo`, `about_us`, `shipping`, `payment`, `contactinfo`, `socialmedia`, `domainemail`, `websitedesign`) VALUES
(1, 8, 1, 0, 0, 1, 0, 0, 0, 0),
(2, 9, 1, 1, 1, 0, 0, 0, 0, 0),
(3, 11, 0, 1, 1, 1, 0, 0, 1, 0),
(4, 12, 1, 0, 0, 0, 0, 0, 0, 0),
(6, 10, 1, 0, 1, 0, 1, 1, 1, 1),
(8, 13, 0, 1, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `shipping_rate_type` int(11) NOT NULL,
  `base_cost_pms` float NOT NULL,
  `weight_rate_charge_pms` float NOT NULL,
  `base_cost_ssl` float NOT NULL,
  `weight_rate_charge_ssl` float NOT NULL,
  `remarks` text NOT NULL,
  `shipping_charge_pms` float NOT NULL,
  `shipping_charge_ssl` float NOT NULL,
  `price_bellow_one` float NOT NULL,
  `price_after_one` float NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `userid`, `shipping_rate_type`, `base_cost_pms`, `weight_rate_charge_pms`, `base_cost_ssl`, `weight_rate_charge_ssl`, `remarks`, `shipping_charge_pms`, `shipping_charge_ssl`, `price_bellow_one`, `price_after_one`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 10, 0, 0, 0, 0, 0, '', 12, 2.2, 11, 1.1, '2020-07-01', 9, '2020-07-01', 9),
(2, 13, 1, 25, 6, 35, 11, ' test ', 0, 0, 0, 0, '2020-07-17', 13, '2020-07-20', 13);

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `facebook` text NOT NULL,
  `youtube` text NOT NULL,
  `instagram` text NOT NULL,
  `whatsapp` text NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `userid`, `facebook`, `youtube`, `instagram`, `whatsapp`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 10, 'facebook.com', 'youtube.com', '', 'webwhatsapp.com', '2020-07-01', 9, '2020-07-01', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `admin` int(11) DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `cpanel_username` varchar(255) NOT NULL,
  `cpanel_password` varchar(255) NOT NULL,
  `wordpress_username` varchar(255) NOT NULL,
  `wordpress_password` varchar(255) NOT NULL,
  `account` text NOT NULL,
  `website_setup_date` date NOT NULL,
  `training_date` date NOT NULL,
  `revision_1` int(11) NOT NULL,
  `revision_2` int(11) NOT NULL,
  `website_buy_off_date` date NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `email`, `password`, `status`, `user_type`, `admin`, `package`, `cpanel_username`, `cpanel_password`, `wordpress_username`, `wordpress_password`, `account`, `website_setup_date`, `training_date`, `revision_1`, `revision_2`, `website_buy_off_date`, `created`, `modified`, `active`) VALUES
(1, 'admin', 'admin', '', 'admin@gmail.com', 'demo', 1, 'admin', 0, 0, '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, '0000-00-00', '2020-06-29', '2020-07-03', 1),
(10, 'bb ab', 'bb', 'ab', 'aa@gmail.com', 'aa', 1, 'customer', 0, 1, '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, '0000-00-00', '2020-06-29', '2020-07-03', 0),
(13, 'customer test', 'customer', 'test', 'test@gmail.com', 'test', 1, 'customer', 0, 1, '', '', '', '', '', '2020-07-25', '0000-00-00', 1, 1, '0000-00-00', '2020-07-01', '2020-07-03', 1),
(14, 'Saddam Hussain', 'Saddam', 'Hussain', 'saddam@gmail.com', 'saddam', 1, 'admin', NULL, 2, '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, '0000-00-00', '2020-07-02', '2020-07-03', 1),
(15, 'test2 t', 'test2', 't', 'test2@gmail.com', 'test2', 1, 'customer', NULL, 2, 'cpanelu', 'cpanelp', 'wordpressu', 'wordpressp', 'test222u', '2020-07-18', '2020-07-19', 1, 0, '2020-07-21', '2020-07-17', '2020-07-17', 1),
(16, 'sad sad', 'sad', 'sad', 'sad@gmail.com', 'sad', 1, 'customer', NULL, 0, 'admin@gmail.com', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, '0000-00-00', '2020-07-19', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `websitedesign`
--

CREATE TABLE `websitedesign` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `templete` int(11) NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `websitedesign`
--

INSERT INTO `websitedesign` (`id`, `userid`, `templete`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 10, 4, '2020-07-02', 9, '2020-07-02', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactinfo`
--
ALTER TABLE `contactinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domainemail`
--
ALTER TABLE `domainemail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websitedesign`
--
ALTER TABLE `websitedesign`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactinfo`
--
ALTER TABLE `contactinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `domainemail`
--
ALTER TABLE `domainemail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `websitedesign`
--
ALTER TABLE `websitedesign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
