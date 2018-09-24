-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2018 at 11:10 AM
-- Server version: 5.6.33
-- PHP Version: 5.5.9-1ubuntu4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mepco_industry_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(20) NOT NULL,
  `data` varchar(1000) NOT NULL,
  `ip_address` varchar(1000) NOT NULL,
  `timestamp` varchar(1000) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2420 ;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`aid`, `id`, `data`, `ip_address`, `timestamp`) VALUES
(2413, 2147483647, '__ci_last_regenerate|i:1533118421;', '127.0.0.1', '1533118421'),
(2414, 2147483647, '', '127.0.0.1', '1533118425'),
(2415, 2147483647, 'sessionUserLoggedIn|b:1;sessionUserData|a:2:{s:7:"user_id";s:1:"5";s:8:"loggedIn";b:1;}userLoggedIn|b:1;userData|a:2:{s:7:"user_id";s:1:"5";s:8:"loggedIn";b:1;}', '127.0.0.1', '1533118430'),
(2416, 2147483647, '__ci_last_regenerate|i:1533118431;', '127.0.0.1', '1533118431'),
(2419, 3, '__ci_last_regenerate|i:1533129781;sessionUserLoggedIn|b:1;sessionUserData|a:2:{s:7:"user_id";s:1:"5";s:8:"loggedIn";b:1;}userLoggedIn|b:1;userData|a:2:{s:7:"user_id";s:1:"5";s:8:"loggedIn";b:1;}', '127.0.0.1', '1533131722');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE IF NOT EXISTS `tbl_application` (
  `tran_id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` int(3) NOT NULL,
  `trans_title` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `quick_view_details` text NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `file_url` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`tran_id`),
  KEY `fk_product_application_category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_application`
--

INSERT INTO `tbl_application` (`tran_id`, `priority`, `trans_title`, `category_id`, `details`, `quick_view_details`, `image_path`, `file_url`, `status`) VALUES
(2, 1, 'Aluminium Powder3', 4, '<p style="text-align: justify;">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p style="text-align: justify;">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', '', 1),
(3, 4, 'Aluminium Powder  2', 4, '<p style="text-align: justify;">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p style="text-align: justify;">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', '', 1),
(4, 3, 'Aluminium Powder  1', 4, '<p style="text-align: justify;">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p style="text-align: justify;">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '62da7-43f9f-aluminium-2.jpg', '464ae-hall-ticket_khadar.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_career`
--

CREATE TABLE IF NOT EXISTS `tbl_career` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(150) NOT NULL,
  `job_qualification` varchar(50) NOT NULL,
  `job_experience` int(2) NOT NULL,
  `job_description` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_career`
--

INSERT INTO `tbl_career` (`job_id`, `job_title`, `job_qualification`, `job_experience`, `job_description`, `status`, `created_at`) VALUES
(1, 'Senior Technician', 'BE', 4, '<p>\r\n	Welcome Immediate Joiner!</p>\r\n', 1, '2018-07-23 19:21:22'),
(2, 'Project Manager ', 'MBA', 2, '<p>\r\n	Welcome Immediate Joiner!</p>\r\n', 1, '2018-07-30 18:15:19'),
(3, 'Project Head ', 'MBA', 2, ' Welcome Immediate Joiner! ', 1, '2018-07-30 18:15:19'),
(4, 'Senior Superior', 'BE', 4, '<p>\r\n	Welcome Immediate Joiner!</p>\r\n', 1, '2018-07-23 19:21:22'),
(5, 'Technician', 'BE', 4, '<p>\r\n	Welcome Immediate Joiner!</p>\r\n', 1, '2018-07-23 19:21:22'),
(6, 'Fresher', 'BE', 4, '<p>\r\n	Welcome Immediate Joiner!</p>\r\n', 1, '2018-07-23 19:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_master`
--

CREATE TABLE IF NOT EXISTS `tbl_category_master` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` int(3) NOT NULL,
  `category_type` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `category_image` varchar(150) NOT NULL,
  `category_description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_category_master`
--

INSERT INTO `tbl_category_master` (`category_id`, `priority`, `category_type`, `category_name`, `category_image`, `category_description`, `status`, `created`) VALUES
(2, 1, 2, 'Aluminium', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(3, 2, 2, 'Bismuth', '41be8-bismuth.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(4, 2, 1, 'Aerated Light Weight Concrete Plasters', '14f63-aerated-light-weight-concrete-plasters.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(5, 3, 1, 'Aerosols DIY', '93f55-aerosols-diy.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(6, 3, 2, 'Calcium Silicide', '75146-calcium-silicide.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(7, 4, 2, 'Cobalt', '839a0-cobalt.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(8, 5, 2, 'Copper', '699d6-copper.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(9, 6, 2, 'Gold Bronze', '20dd3-gold-bronze.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(10, 7, 2, 'Magnesium', '8cc5c-magnesium.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(11, 8, 2, 'Phosphorus', '2a24a-phosphorus.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(12, 9, 2, 'Silicon', 'd0b65-silicon.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(13, 3, 1, 'Aerosols DIY', '93f55-aerosols-diy.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(14, 2, 1, 'Aerated Light Weight Concrete Plasters', '14f63-aerated-light-weight-concrete-plasters.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(15, 3, 1, 'Aerosols DIY', '93f55-aerosols-diy.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(16, 2, 1, 'Aerated Light Weight Concrete Plasters', '14f63-aerated-light-weight-concrete-plasters.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(17, 3, 1, 'Aerosols DIY', '93f55-aerosols-diy.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(18, 2, 1, 'Aerated Light Weight Concrete Plasters', '14f63-aerated-light-weight-concrete-plasters.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(19, 3, 1, 'Aerosols DIY', '93f55-aerosols-diy.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(20, 2, 1, 'Aerated Light Weight Concrete Plasters', '14f63-aerated-light-weight-concrete-plasters.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(21, 3, 1, 'Aerosols DIY', '93f55-aerosols-diy.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(22, 2, 1, 'Aerated Light Weight Concrete Plasters', '14f63-aerated-light-weight-concrete-plasters.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(23, 3, 1, 'Aerosols DIY', '93f55-aerosols-diy.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(24, 2, 1, 'Aerated Light Weight Concrete Plasters', '14f63-aerated-light-weight-concrete-plasters.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00'),
(25, 3, 1, 'Aerosols DIY', '93f55-aerosols-diy.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_type`
--

CREATE TABLE IF NOT EXISTS `tbl_category_type` (
  `category_type_id` int(20) NOT NULL AUTO_INCREMENT,
  `category_type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_category_type`
--

INSERT INTO `tbl_category_type` (`category_type_id`, `category_type_name`) VALUES
(1, 'Application'),
(2, 'Product');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE IF NOT EXISTS `tbl_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_question` text NOT NULL,
  `faq_answer` text NOT NULL,
  `priority` int(3) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `faq_question`, `faq_answer`, `priority`, `status`) VALUES
(1, 'First Question?', 'First Answer!', 1, 0),
(2, 'New 1', 'New 1', 3, 1),
(18, 'test', 'test', 2, 0),
(19, 'tddd', 'dddd', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_type` int(11) NOT NULL,
  `gallery_category` varchar(50) NOT NULL,
  `image_url` varchar(250) NOT NULL,
  `video_url` varchar(250) NOT NULL,
  `gallery_description` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_type`, `gallery_category`, `image_url`, `video_url`, `gallery_description`, `status`) VALUES
(1, 1, 'Coating Show Snaps', '', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1),
(2, 1, 'Mepco Schlenk Engineering College', '', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1),
(3, 1, 'Mepco Schlenk Primary School', '', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1),
(5, 1, 'Matric.Schools', '', '', 'Matric.School', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_image`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery_image` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(20) NOT NULL,
  `img_url` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_gallery_image`
--

INSERT INTO `tbl_gallery_image` (`img_id`, `gallery_id`, `img_url`, `created_at`) VALUES
(5, 1, 'Coating-Show-Snaps-718802538.jpg', '2018-07-24 16:16:45'),
(6, 1, 'Coating-Show-Snaps-879973439.jpg', '2018-07-24 16:16:45'),
(7, 1, 'Coating-Show-Snaps-578315168.jpg', '2018-07-24 16:16:45'),
(8, 5, 'MatricSchool--565852952.jpg', '2018-08-01 15:46:17'),
(9, 5, 'MatricSchool--997235008.jpg', '2018-08-01 15:46:17'),
(10, 5, 'MatricSchool--1161501712.jpg', '2018-08-01 15:46:17'),
(11, 5, 'MatricSchool--368801058.jpg', '2018-08-01 15:46:17'),
(12, 5, 'MatricSchool--1082226175.jpg', '2018-08-01 15:46:17'),
(13, 5, 'MatricSchool--252335119.jpg', '2018-08-01 15:46:17'),
(15, 5, 'MatricSchool--666455341.jpg', '2018-08-01 15:46:17'),
(16, 5, 'MatricSchools-333734873.jpg', '2018-08-01 15:52:43'),
(17, 2, 'Mepco-Schlenk-Engineering-College-1291287885.jpg', '2018-08-01 18:53:27'),
(18, 2, 'Mepco-Schlenk-Engineering-College-438766889.jpg', '2018-08-01 18:53:27'),
(19, 2, 'Mepco-Schlenk-Engineering-College-1168138368.jpg', '2018-08-01 18:53:27'),
(20, 2, 'Mepco-Schlenk-Engineering-College-409340708.jpg', '2018-08-01 18:53:27'),
(21, 2, 'Mepco-Schlenk-Engineering-College-1200526702.jpg', '2018-08-01 18:53:27'),
(22, 2, 'Mepco-Schlenk-Engineering-College-870864143.jpg', '2018-08-01 18:53:27'),
(23, 2, 'Mepco-Schlenk-Engineering-College-9277184.jpg', '2018-08-01 18:53:27'),
(24, 2, 'Mepco-Schlenk-Engineering-College-347404700.jpg', '2018-08-01 18:53:27'),
(25, 2, 'Mepco-Schlenk-Engineering-College-480640405.jpg', '2018-08-01 18:53:27'),
(26, 2, 'Mepco-Schlenk-Engineering-College-323945637.jpg', '2018-08-01 18:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`user_id`, `user_name`, `password`) VALUES
(1, 'mepco2', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'mepco', 'e6e061838856bf47e1de730719fb2609'),
(6, 'mepco3', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(100) NOT NULL,
  `news_description` text NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_description`, `from_date`, `to_date`, `created_at`, `status`) VALUES
(1, 'First News', 'Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news Welcome First news.', '2018-07-01 00:00:00', '2018-07-31 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `tran_id` int(11) NOT NULL AUTO_INCREMENT,
  `priority` int(3) NOT NULL,
  `trans_title` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `quick_view_details` text NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `file_url` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`tran_id`),
  KEY `fk_product_application_category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`tran_id`, `priority`, `trans_title`, `category_id`, `details`, `quick_view_details`, `image_path`, `file_url`, `status`) VALUES
(2, 1, 'Aluminium powder for pesticides', 2, '<p style="text-align: justify;">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p style="text-align: justify;">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'a59de-43f9f-aluminium-2.jpg', '02813-hall-ticket_khadar.pdf', 1),
(3, 2, 'Aluminium powder for light weight concrete', 2, '<p>\r\n	asdfasdfasdfasdf</p>\r\n', '<p>\r\n	sadfasdf</p>\r\n', '745bf-43f9f-aluminium-2.jpg', 'd9a34-hall-ticket.pdf', 1),
(4, 3, 'Aluminium alloy powder', 2, '<p>\r\n	a sdfasdf asdf sdf</p>\r\n', '<p>\r\n	asdfasdf asdf asdf</p>\r\n', '63a88-aluminium-4.jpg', '', 1),
(7, 4, 'Aluminium powders for Firework Products 7', 2, '<p>\r\n	tesssst</p>\r\n', '<p>\r\n	test</p>\r\n', '43f9f-aluminium-2.jpg', '', 1),
(8, 5, 'Aluminium powders for Firework Products 8', 2, '<p>\r\n	tesssst</p>\r\n', '<p>\r\n	test</p>\r\n', '43f9f-aluminium-2.jpg', '', 1),
(9, 6, 'Aluminium powders for Firework Products 9', 2, '<p>\r\n	tesssst</p>\r\n', '<p>\r\n	test</p>\r\n', '43f9f-aluminium-2.jpg', '', 1),
(10, 7, 'Aluminium powders for Firework Products 10', 2, '<p>\r\n	tesssst</p>\r\n', '<p>\r\n	test</p>\r\n', '43f9f-aluminium-2.jpg', '', 1),
(11, 8, 'Aluminium powders for Firework Products 11', 2, '<p>\r\n	tesssst</p>\r\n', '<p>\r\n	test</p>\r\n', '43f9f-aluminium-2.jpg', '', 1),
(12, 9, 'Aluminium powders for Firework Products 12', 2, '<p>\r\n	tesssst</p>\r\n', '<p>\r\n	test</p>\r\n', '43f9f-aluminium-2.jpg', '', 1),
(13, 10, 'Aluminium powders for Firework Products 13', 2, '<p>\r\n	tesssst</p>\r\n', '<p>\r\n	test</p>\r\n', '43f9f-aluminium-2.jpg', '', 1),
(14, 11, 'Aluminium powders for Firework Products 14', 2, '<p>\r\n	tesssst</p>\r\n', '<p>\r\n	test</p>\r\n', '43f9f-aluminium-2.jpg', '', 1),
(15, 12, 'Aluminium powders for Firework Products 15', 2, '<p>\r\n	tesssst</p>\r\n', '<p>\r\n	test</p>\r\n', '43f9f-aluminium-2.jpg', '', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD CONSTRAINT `tbl_application_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_master` (`category_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_master` (`category_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
