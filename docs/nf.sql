-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2016 at 01:10 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nf.dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `nf_category`
--

DROP TABLE IF EXISTS `nf_category`;
CREATE TABLE IF NOT EXISTS `nf_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_removed_from_list` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nf_category`
--

INSERT INTO `nf_category` (`id`, `is_removed_from_list`) VALUES
(52, 0),
(46, 0),
(51, 0),
(53, 0),
(54, 0),
(55, 0),
(56, 0),
(57, 0),
(58, 0),
(59, 0),
(60, 0),
(61, 0),
(62, 0),
(63, 0),
(64, 0),
(65, 0),
(66, 0),
(67, 0),
(68, 0),
(69, 0),
(70, 0),
(72, 0),
(73, 0),
(74, 0),
(75, 0),
(76, 0),
(77, 0),
(78, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nf_category_data`
--

DROP TABLE IF EXISTS `nf_category_data`;
CREATE TABLE IF NOT EXISTS `nf_category_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `language` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `last_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `who_last_update` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_id` (`category_id`,`language`),
  UNIQUE KEY `language` (`language`,`category`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nf_category_data`
--

INSERT INTO `nf_category_data` (`id`, `category_id`, `language`, `category`, `description`, `last_updated_date`, `who_last_update`) VALUES
(54, 46, 'en', 'ww', '', '2016-06-14 03:20:49', 718825),
(55, 51, 'en', 'ee', '', '2016-06-14 03:33:39', 718825),
(56, 52, 'en', 'rr', '', '2016-06-14 03:34:06', 718825),
(57, 53, 'en', 'dd', '0', '2016-06-14 03:37:55', 718825),
(58, 54, 'en', '77', '0', '2016-06-14 03:38:11', 718825),
(59, 55, 'ru', 'wer', '', '2016-06-14 03:40:22', 718825),
(60, 56, 'hy', 'ww', 'sadfsdf', '2016-06-16 06:18:40', 718825),
(61, 53, 'ru', 'kk', '', '2016-06-14 05:10:08', 718825),
(62, 56, 'en', 'hgfkhfkjhhkghjgkjgjjjl kjhkhkgh jhgkjgkjgjhgjk jjhjgljjgljgk', '', '2016-06-14 05:12:38', 718825),
(63, 57, 'en', 'zz', '', '2016-06-15 02:02:42', 718825),
(64, 56, 'ru', 'dd', 'sdfasfasdfas', '2016-06-17 05:12:37', 718825),
(65, 57, 'ru', 'vnv', 'hjgkjgghj', '2016-06-16 06:11:16', 718825),
(66, 58, 'en', 'xx', '', '2016-06-15 05:07:38', 718825),
(67, 59, 'en', 'eee', '', '2016-06-16 03:26:11', 718825),
(68, 60, 'en', 'l', '', '2016-06-16 03:31:33', 718825),
(69, 61, 'en', 'w', '', '2016-06-16 05:25:32', 718825),
(70, 62, 'en', 'sfhfhfghfgjhfjhfgdjhdfjh', '', '2016-06-16 05:26:58', 718825),
(71, 63, 'ru', 'eedsfS', 'DDDDDD', '2016-06-16 05:50:35', 718825),
(72, 64, 'ru', 'ee', '', '2016-06-16 05:56:13', 718825),
(73, 65, 'en', 'e', '', '2016-06-16 06:01:45', 718825),
(74, 66, 'ru', 'test', 'gggg', '2016-06-17 05:07:43', 718825),
(75, 67, 'hy', 'eeff', '', '2016-06-17 04:34:49', 718825),
(76, 67, 'ru', 'eeefcs', '', '2016-06-20 07:07:12', 718825),
(77, 68, 'en', 'eesfdhs', '', '2016-06-18 16:16:03', 718825),
(78, 69, 'en', 'qq', '', '2016-06-19 00:24:32', 718825),
(79, 70, 'en', '111', '', '2016-06-19 01:23:39', 718825),
(80, 72, 'en', 'test', 'test', '2016-06-19 18:48:25', 718825),
(81, 72, 'ru', 'qqdd', 'DasZDc', '2016-06-26 00:59:11', 718825),
(82, 70, 'ru', 'ww', '', '2016-06-19 23:57:27', 718825),
(83, 69, 'ru', 'yyooe', '', '2016-06-20 02:02:18', 718825),
(84, 68, 'ru', 'kowwee', '', '2016-06-20 07:12:46', 718825),
(85, 73, 'en', 'wwwzd', 's', '2016-07-09 02:42:47', 718825),
(89, 74, 'en', 'hkhlk', '', '2016-07-09 02:42:55', 718825),
(88, 65, 'hy', 'ee', '', '2016-07-04 21:43:26', 718825),
(86, 73, 'ru', 'fff', 'cbcmbn', '2016-06-26 01:44:45', 718825),
(87, 73, 'hy', 'dfghd', '', '2016-06-26 01:45:01', 718825),
(90, 75, 'en', 'jj', '', '2016-07-18 01:32:04', 718825),
(91, 74, 'ru', 'kjlhl', '', '2016-07-18 01:35:55', 718825),
(92, 76, 'en', 'jjdd', '', '2016-07-18 06:17:54', 718825),
(93, 76, 'ru', 'fffSFs', '', '2016-07-18 06:18:03', 718825),
(94, 77, 'en', 'thryeryery', '', '2016-07-20 02:25:17', 718825),
(95, 78, 'en', 'dfgjdjdfgjdfjd', '', '2016-09-11 05:26:00', 718825);

-- --------------------------------------------------------

--
-- Table structure for table `nf_rec_pass`
--

DROP TABLE IF EXISTS `nf_rec_pass`;
CREATE TABLE IF NOT EXISTS `nf_rec_pass` (
  `rec_pass_id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(250) CHARACTER SET utf8 NOT NULL,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`rec_pass_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `nf_rec_pass`
--

INSERT INTO `nf_rec_pass` (`rec_pass_id`, `token`, `date`, `user_id`) VALUES
(1, '1b3f2c197eba4816b31075e4b5f5aecd5ca446cdfa9b32f790ac582f24c9bd102c87df3fe442bc7f0583e5a343ce02b9adfb0bd53eef0d2d22f195f69a50a0e5', '2016-03-28 01:21:58', 718825);

-- --------------------------------------------------------

--
-- Table structure for table `nf_stories`
--

DROP TABLE IF EXISTS `nf_stories`;
CREATE TABLE IF NOT EXISTS `nf_stories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notes` text NOT NULL,
  `category` int(11) NOT NULL DEFAULT '0',
  `tags` text NOT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `who_last_update` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nf_stories_data`
--

DROP TABLE IF EXISTS `nf_stories_data`;
CREATE TABLE IF NOT EXISTS `nf_stories_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `who_create` int(11) NOT NULL,
  `who_last_update` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `story` text NOT NULL,
  `is_published` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `is_shared` tinyint(4) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `last_published_date` timestamp NULL DEFAULT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `story_id` (`story_id`,`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nf_tags`
--

DROP TABLE IF EXISTS `nf_tags`;
CREATE TABLE IF NOT EXISTS `nf_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `who_create` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nf_tags_data`
--

DROP TABLE IF EXISTS `nf_tags_data`;
CREATE TABLE IF NOT EXISTS `nf_tags_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `story_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `who_create` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nf_users`
--

DROP TABLE IF EXISTS `nf_users`;
CREATE TABLE IF NOT EXISTS `nf_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` char(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `nf_group` int(3) NOT NULL DEFAULT '0',
  `lang` varchar(10) NOT NULL,
  `register_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_email_confirmed` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=718826 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nf_users`
--

INSERT INTO `nf_users` (`user_id`, `username`, `email`, `password`, `first_name`, `last_name`, `phone`, `nf_group`, `lang`, `register_date`, `is_email_confirmed`, `is_active`) VALUES
(718825, 'me', 'markareno@gmail.com', '37bba34a822b3236c777faf47b4208a5', 'Kevin', 'M', '7969786986', 1, '', '2016-01-01 05:45:38', '2016-01-01 05:46:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nf_users_groups`
--

DROP TABLE IF EXISTS `nf_users_groups`;
CREATE TABLE IF NOT EXISTS `nf_users_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `group_name` (`group_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `nf_users_groups`
--

INSERT INTO `nf_users_groups` (`group_id`, `group_name`) VALUES
(1, 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `nf_users_groups_roles`
--

DROP TABLE IF EXISTS `nf_users_groups_roles`;
CREATE TABLE IF NOT EXISTS `nf_users_groups_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `nf_users_groups_roles`
--

INSERT INTO `nf_users_groups_roles` (`id`, `group_id`, `role_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `nf_users_roles`
--

DROP TABLE IF EXISTS `nf_users_roles`;
CREATE TABLE IF NOT EXISTS `nf_users_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_description` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `nf_users_roles`
--

INSERT INTO `nf_users_roles` (`role_id`, `role_description`) VALUES
(1, 'manage categories'),
(2, 'manage users'),
(3, 'manage group roles'),
(4, 'manage translations');

-- --------------------------------------------------------

--
-- Table structure for table `nf_users_tokens`
--

DROP TABLE IF EXISTS `nf_users_tokens`;
CREATE TABLE IF NOT EXISTS `nf_users_tokens` (
  `users_token` char(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `last_activity` datetime NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `browser` varchar(100) NOT NULL,
  PRIMARY KEY (`users_token`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nf_users_tokens`
--

INSERT INTO `nf_users_tokens` (`users_token`, `user_id`, `start_time`, `end_time`, `last_activity`, `ip_address`, `browser`) VALUES
('0286c21cd595649cd5ccc904385aee52b54d4e3a67cbb0154e59c7b5d1bbcf90cfb37817bf18d19c08e49663acf73c8e5d326ab7f7ba5e04828c4b863fbe2925', 718825, '2016-04-09 23:11:01', '2016-04-09 23:39:09', '2016-04-09 23:19:09', '', 'Google Chrome,49.0.2623.110,windows'),
('0469eb9454252b57ebecbcf9bebb4132f35ad5ea0a4ac838bbb48c05af854dc44e87aad47aa034ed873410c40967cc5397e9393b7d7333b1d2738a8709a512b9', 718825, '2016-05-31 07:04:26', '2016-05-31 08:54:35', '2016-05-31 08:34:35', '', 'Google Chrome,50.0.2661.102,windows'),
('050d1580c10c3ba01be8d8633eef8e58807519370b23c434c6d07d4c9aeb5f0ba1d91935e918b3f1707343eaf846bb9ccc0187afaad418df03de085c4ddf7e5d', 718825, '2016-06-13 02:36:11', '2016-06-13 05:23:52', '2016-06-13 04:43:52', '', 'Google Chrome,51.0.2704.84,windows'),
('0557249ee305c1cdf1c9b03448cb69ee9fc60a3f09f1a81c82414370821d1e5a8beef6dcb9345dbe75e0da4e01ca80782b46982241bf04042358ce2adb758f02', 718825, '2016-10-17 03:12:36', '2016-10-17 03:52:36', '2016-10-17 03:12:36', '127.0.0.1', 'Google Chrome,53.0.2785.143,windows'),
('06e2ba43ae22da432b11928bc1a92ae83cf0eb6d679c658e074f478a88ab60b837224e7af76fc079811c8637862293c09dd8c492cc537c975370ba849c4dc0ff', 718825, '2016-10-17 03:13:19', '2016-10-17 03:53:19', '2016-10-17 03:13:19', '127.0.0.1', 'Google Chrome,53.0.2785.143,windows'),
('08b4f6488c125df035e400f17fd18b0d9384a2fa395a744df5654db13842d12917ccbf8a9d5c34e1566f0aee61110f3521cc2493bf7e611a7b77ce54a6f1c01c', 718825, '2016-06-06 08:11:28', '2016-06-06 08:52:06', '2016-06-06 08:32:06', '', 'Google Chrome,50.0.2661.102,windows'),
('0c37eb3717e6243ff3fe5038de50e5ec0c81f1604fed083c5e52395400ef2619c5bffc0f008840f16f765498e1b4b9a69dd78c393a72082ee7fc7a0c4f161284', 718825, '2016-07-09 21:24:43', '2016-07-10 00:08:29', '2016-07-09 23:28:29', '', 'Google Chrome,51.0.2704.103,windows'),
('0d1b394bf8c544149e6f80d59379f7bc54b02e21e77b9fd86bdab43105046fd3a473ec69548ebf12c1d557201b3cd73aa7a318a0efb1cd24430cdf3e09281c55', 718825, '2016-06-05 07:45:16', '2016-06-05 08:05:22', '2016-06-05 07:45:22', '', 'Google Chrome,50.0.2661.102,windows'),
('10b27d84fbdd05df673a52481c62336a62c3a5e1a00a91025d5d4dc7eb3bbafeba71d62a9ade3192960afb7a1857c23e077b3aa42bf169e00b5ae18a31f69f9d', 718825, '2016-07-17 23:24:21', '2016-07-18 01:11:49', '2016-07-18 00:31:49', '', 'Google Chrome,51.0.2704.103,windows'),
('10b63ddda52856ae4530cca8ea515496ce34aec65be95cd1fa12d66f2425b4b175ef8df685813ddfb11691a80c30d7f2efd9aaa8a864676ddfc86ad02d5cae1d', 718825, '2016-05-01 05:39:18', '2016-05-01 05:59:18', '2016-05-01 05:39:18', '', 'Google Chrome,49.0.2623.112,windows'),
('11fc40a84fc63e83732861d0978ca8e0ad868d4012a977fe7a8b14234e1c52250fe4dec5659fe1cb089ebdae67943ef3caee8ba3a6f4556c23544c9928b1dd15', 718825, '2016-06-13 05:31:24', '2016-06-13 06:25:08', '2016-06-13 05:45:08', '', 'Google Chrome,51.0.2704.84,windows'),
('2016628b3bcd94c96d26fbd916e27cf5d519f0e813a7d8d81fbee5da38f8fa9bc962bae664669d6501d7ceab1aad66cdc50b10ac83438192b7ad392a3b0b8904', 718825, '2016-09-04 20:48:26', '2016-09-05 00:56:09', '2016-09-05 00:16:09', '', 'Google Chrome,52.0.2743.116,windows'),
('211b1470f52c5da508ac07bfb3d58a5ad38d72e6fca84b2b60b46de5f20b869531241dc0d357bc72c8bb92f027e8aca2a2c06813463c201e7fd64a0024e6bcc6', 718825, '2016-06-26 05:44:28', '2016-06-26 06:25:01', '2016-06-26 05:45:01', '', 'Google Chrome,51.0.2704.103,windows'),
('2120c8478f43b8d468bd5606e9e68fc3fa0dc18f98c666afbac084e682237e47623bc17b7e3a40861fb96747806695d8895903a662ce021ce24da64484c9fa8a', 718825, '2016-05-22 22:07:12', '2016-05-22 22:27:30', '2016-05-22 22:07:30', '', 'Google Chrome,50.0.2661.102,windows'),
('214f1ee175a48a38afef9ae1f0ddd61be08e4cc3beda276282f271cca8b593ca31ae5e7c3dabe38397a5051a55cae701eb513d86ab6e9a130ee7d00da687b9ed', 718825, '2016-06-05 20:49:05', '2016-06-05 21:47:09', '2016-06-05 21:27:09', '', 'Google Chrome,50.0.2661.102,windows'),
('235d93f37ddb09c71d930a8090926755587caa5d10c713ae97f0c65ff0f8591ba9a6aa9b912f6fd89cc154e09ad9e421cf059659199b7b426f2e75e9f86b0523', 718825, '2016-05-01 08:00:24', '2016-05-01 08:20:24', '2016-05-01 08:00:24', '', 'Google Chrome,49.0.2623.112,windows'),
('253ea6de1198e85bb3faf0c0df8d97e239cbf5d81f2ad1f40fd784824face8984978cba9496a3237cfa2d55ac06ddc700dfaca19f5e24219885a8e3afbab3a14', 718825, '2016-05-09 07:13:07', '2016-05-09 07:54:53', '2016-05-09 07:34:53', '', 'Google Chrome,50.0.2661.94,windows'),
('25c2d0c0993641657e90361acc1a3e6543e7a371516f2f07505c82146ced0a8c764766279b79a5a47d46d8d25f8df1ef87cc272c9cc10f7efe2172497b1c8e2d', 718825, '2016-06-13 11:50:47', '2016-06-13 12:45:43', '2016-06-13 12:05:43', '', 'Apple Safari,9.0,mac'),
('26f36e71f350421108a0a9959eaa78215a89f4f24ecc3e78cbff25a00203bda5afeacf528e3ebfc882df95f1276f868d00e200975b4e6a038081b471c9985d6e', 718825, '2016-05-31 06:02:59', '2016-05-31 06:32:38', '2016-05-31 06:12:38', '', 'Google Chrome,50.0.2661.102,windows'),
('28d398c2caafee794fdb7c6361a55e9a422bb7081eb75f517c91259abc486dab85b35fc007ea92e09fe2e66f62c7b72ea14c7467496a805ba814c203e37ca086', 718825, '2016-06-13 07:47:18', '2016-06-13 08:37:15', '2016-06-13 07:57:15', '', 'Google Chrome,51.0.2704.84,windows'),
('2ae2d4e14fa21ced0bff8e18196027ac193af434316c002294f460f6fc072251d3c1ca932e31e5ad5bf7fadf24f751a4f516fc52fa7371245ec9cf0bc1b84077', 718825, '2016-10-17 03:27:17', '2016-10-17 04:07:16', '2016-10-17 03:27:17', '127.0.0.1', 'Google Chrome,53.0.2785.143,windows'),
('2beebc5ecdab99034ca23086f9c796895b93f948197f4f72574e8c711bd38e991f0c1d348be369649b84c268d05e4a170aec1c37f16498429d8f053b3a9a3bd6', 718825, '2016-09-06 17:48:32', '2016-09-06 18:53:18', '2016-09-06 18:13:18', '', 'Google Chrome,52.0.2743.116,windows'),
('2d1a7c49626b62e88a28d16d463a3d9070c3d665cdad10e1b3b6c0c0ab468d016e2c5dde25e385fca1fd568cc4190233e905b53d06ba329a6b4553388554e017', 718825, '2016-06-18 10:30:49', '2016-06-18 11:18:38', '2016-06-18 10:38:38', '', 'Google Chrome,51.0.2704.84,windows'),
('2f39631f69a156b4e763f600ee8eacf9c18237a5cbb254ced4231e53f445f41f329691effc6dbe4f8d07ec5dbb67599abeae8d65d191379b13dee1f55d934a6b', 718825, '2016-09-05 10:23:19', '2016-09-05 12:11:12', '2016-09-05 11:31:12', '', 'Google Chrome,52.0.2743.116,windows'),
('2fd6a00a12c68d70a0c38491f0ec2086a935f0adcee294f2e9713646e7b9e8d1c690f6bdb7c635242037c08f563ed92264bd53641c231134c59eb084418f56ec', 718825, '2016-04-09 07:58:49', '2016-04-09 08:36:14', '2016-04-09 08:16:14', '', 'Google Chrome,49.0.2623.110,windows'),
('2fd9a1283d258ab4e7b28d2a30b8c438f96443609f9848356a06e3e1d4950b8206b15d0de49ad3194ae4a3e035c8e0587970fc81bcb5c779b214d58aec023d99', 718825, '2016-10-17 03:40:08', '2016-10-17 04:20:08', '2016-10-17 03:40:08', '127.0.0.1', 'Google Chrome,53.0.2785.143,windows'),
('347c934581a950086c2eb7eb439d9fa5870bba0cabc96bd8e69a1bee1ddcb359758d12c15eba82a0f52325f4552b908bfba21380e57832b865367d62e9ecd226', 718825, '2016-09-05 03:08:34', '2016-09-05 05:27:45', '2016-09-05 04:47:45', '', 'Google Chrome,52.0.2743.116,windows'),
('34ada0389ad1c7f92181db372ff1ba4d3278907e3d29f7532de393b6b465c7ed77aef370aeb6bbe3f458ccdf3a8079a19a2b5d40337907e0fc8b8d7f0a51113d', 718825, '2016-09-04 05:14:03', '2016-09-04 06:53:37', '2016-09-04 06:13:37', '', 'Google Chrome,52.0.2743.116,windows'),
('35033d1b9c2061aa6deaa0284ce04c68797c4b8a8ba231041add64074f2c52ea0263148c83e10a1265b8b59c6e88398aa780349b49dc4d6b271c83fbac7f4672', 718825, '2016-04-30 09:18:50', '2016-04-30 09:56:38', '2016-04-30 09:36:38', '', 'Google Chrome,49.0.2623.112,windows'),
('384ecbe9a13f10e1de177b28ee0ced6e21ec6358c91c2880f58ab4ce0796322ad70e7de3805585ee5c1b21f0e441624a8af7f45a804a5e1e899026b5575ebc07', 718825, '2016-06-16 09:22:26', '2016-06-16 10:58:43', '2016-06-16 10:18:43', '', 'Google Chrome,51.0.2704.84,windows'),
('3a835d5d85ba826117b54080fb63803aabc8d7724e7837d0394b8e5a5374c1f4bf83e31951e23a22bd6f239bdb89c84adf89eaf97020a5c7fd083b7ecba26bd0', 718825, '2016-06-05 08:08:19', '2016-06-05 09:47:55', '2016-06-05 09:27:55', '', 'Google Chrome,50.0.2661.102,windows'),
('3e1c386698897be2635dd5d6a8cc75ded7b41fbb8f6ff6366557d06bc3d6ff63c62c43b3c9db4973fab4caffff7bd641e3203b373268fe1753d7455907c7f548', 718825, '2016-09-04 07:07:48', '2016-09-04 11:47:52', '2016-09-04 11:07:52', '', 'Google Chrome,52.0.2743.116,windows'),
('46264cfe671113983e700534eea0e7613afc382d74529bc035bba98bd6b49dd8302bb60ff5d7bcf2980fbcbc6ccaeb91b4d4b295239eea8337ed173414b0edee', 718825, '2016-05-01 07:03:43', '2016-05-01 07:31:02', '2016-05-01 07:11:02', '', 'Google Chrome,49.0.2623.112,windows'),
('4aa9ec2c9877651d5fe9d1645b415362fb6bb6661afd7a63c7fd82a3bac41cbb3acc17163e9815f8b00cacde1204c7dffc9701bab4c360ca709e6f68c09f3ded', 718825, '2016-06-15 09:01:06', '2016-06-15 09:47:38', '2016-06-15 09:07:38', '', 'Google Chrome,51.0.2704.84,windows'),
('4c92ad97d4b82e1f6610f31955e70fe19b6251d99ff438ffd3de49b492d38f5487c82b0e2e0a53eb52e835f6020c7a483545d6e7cdf2de1fe217c80f90c532ce', 718825, '2016-06-06 10:06:57', '2016-06-06 10:28:53', '2016-06-06 10:08:53', '', 'Google Chrome,50.0.2661.102,windows'),
('4d07b6ffeb299d8b737e4247cb97af37d60781215ad66421517d48514d80f0ebe359bc91fffe2b1e70288c99b715f640ade77b5feaceab437bca6abd404d7bc4', 718825, '2016-07-20 09:17:00', '2016-07-20 10:04:54', '2016-07-20 09:24:54', '', 'Google Chrome,51.0.2704.103,windows'),
('4d81d1514de77e64f52b31cc753efe0542ae9976a1ba57e42efe365ece6ef96d9ec1e8497f8872e69c70bca218256efedb9b1e51ef620ac115beb8458b9b118e', 718825, '2016-10-17 03:21:09', '2016-10-17 04:01:09', '2016-10-17 03:21:09', '127.0.0.1', 'Google Chrome,53.0.2785.143,windows'),
('517d23c22f4eaf0eb50b38e050e4d7421a21ec4903def8e71929a0e05d474d857f90fe25002f9b5abfa2bc5b2d15ca1420d82b7fe9b4845199486fa9d0cc44f1', 718825, '2016-06-05 04:05:40', '2016-06-05 04:27:12', '2016-06-05 04:07:12', '', 'Google Chrome,50.0.2661.102,windows'),
('5307e7ff86b631101adcaa59d370414906845c4708fecfb1dd8e29d16e9fd9733ebdfb04275b38d57424447639c862776b78fc54d5adcb53dcb66a5bcb7cdbcb', 718825, '2016-06-20 10:57:43', '2016-06-20 11:59:20', '2016-06-20 11:19:20', '', 'Google Chrome,51.0.2704.103,windows'),
('53ac4bd07bf0e41c848de35259b59f83bb66040b33538773943dfecd2fe6f13897d33d79717736050a059d384f7984c4e3c7a2576eae9fa11c496757a4386d2b', 718825, '2016-10-17 05:05:07', '2016-10-17 05:48:36', '2016-10-17 05:08:36', '127.0.0.1', 'Google Chrome,53.0.2785.143,windows'),
('56da6369ae520b7f49f70a0fad2e0ebb5a3a81f2f5d96d220537ca7c85abe42dff39814d76cff967243bc4abe1a598ac049971da6a487cc4304972b94c739d39', 718825, '2016-06-16 07:10:15', '2016-06-16 08:18:39', '2016-06-16 07:38:39', '', 'Google Chrome,51.0.2704.84,windows'),
('576316c2644131315fef22133a43cea9aa67073a04f7f60fc99a6c16f4e2d76cbca8eaed57e6d0d664656300340e83b4630c097c9e47b6c865820235a69d308b', 718825, '2016-06-05 06:54:39', '2016-06-05 07:28:36', '2016-06-05 07:08:36', '', 'Google Chrome,50.0.2661.102,windows'),
('57683425493050f84aa2aad9af4e25ab918024bf947e4a9a91c07fb289a896dfad80f8ecd7526c55b0539176ced83f1e410bd5f82b103850b56228543c954050', 718825, '2016-09-06 08:03:30', '2016-09-06 09:01:33', '2016-09-06 08:21:33', '', 'Google Chrome,52.0.2743.116,windows'),
('592832f0df4c8754e7910ae983739bcd0aa6a27c69f8eb105de54c0b6c393a377198f74befc5ce9909e44951ca547d81699f5ea4dec366792b4680a101faa297', 718825, '2016-06-15 10:40:07', '2016-06-15 11:20:31', '2016-06-15 10:40:31', '', 'Google Chrome,51.0.2704.84,windows'),
('5e21ed89e5be21a09030068cb75fa34672073246110d4aceac37daf71959dee6ecaa3259a8691ac6c0f5891227d5be6320a59cac41e8aeea216c23e1317b08a0', 718825, '2016-06-21 09:15:06', '2016-06-21 09:55:13', '2016-06-21 09:15:13', '', 'Google Chrome,51.0.2704.103,windows'),
('5e359a4a1af2bb2912dca8e1d1222f53adb942706d7f041cb9a71fa0b3540113ad9aec2527e7fa5dea5c21c82c5bb86dcb1e3d4726c140ab138d11952c19ac9e', 718825, '2016-06-05 06:06:06', '2016-06-05 06:46:06', '2016-06-05 06:26:06', '', 'Google Chrome,50.0.2661.102,windows'),
('61b46e40d93ea004fc7db9f5c8df93066c5488032477d6659c1386fbafd35f14143aa7d2be9dba3a043c620f60f5132328bd347ddfaf58c70955a8f210f4f40d', 718825, '2016-06-19 05:23:28', '2016-06-19 06:03:39', '2016-06-19 05:23:39', '', 'Google Chrome,51.0.2704.103,windows'),
('6bcea13c6327cdf0064b9399299c1368c11e5d497d506b6a9c7b30abe207b0738e5b3d56d0103582764887d2624c4b06a7d7c815b38c342603dc0e204aa9e12a', 718825, '2016-06-14 09:00:34', '2016-06-14 09:51:38', '2016-06-14 09:11:38', '', 'Google Chrome,51.0.2704.84,windows'),
('6d62ab304ba55163b85d721cc01236dc7a332f47bd8b27de0f25a1c33a018d2ce57aa776f3fdbe94461f1d005cac425cd790fbbb55b5b4855cc2e02218e88e63', 718825, '2016-03-29 09:03:23', '2016-03-29 09:23:52', '2016-03-29 09:03:52', '', 'Google Chrome,49.0.2623.108,windows'),
('72102b199d496f6dd4ff3b5e9d86e72a6b4e8a6374b1895ef0c25d748987379a54a341001e640feccb0e1b0f485077c8e5801a46b0b706f2a038943ec296e46f', 718825, '2016-06-05 22:01:28', '2016-06-05 22:21:32', '2016-06-05 22:01:32', '', 'Google Chrome,50.0.2661.102,windows'),
('7566b627f494ca5643b937a9e4ee2e3aab958b3bc46f58760093c2dbc03a5a51b2f1a5ae2533622d935d8d7798f1288d4e9768a701d6e972cba7b207c6db50e0', 718825, '2016-05-01 08:00:24', '2016-05-01 08:20:40', '2016-05-01 08:00:40', '', 'Google Chrome,49.0.2623.112,windows'),
('794ef937d8294b65ab36d45c632b31e5ade605f7645bb63e8627a278f637cdbef66468c16ee6fd10d8c9779dd13ad33e415ff4bf8d664c1d0d8994a68b67e42c', 718825, '2016-04-24 10:49:05', '2016-04-24 11:09:05', '2016-04-24 10:49:05', '', 'Google Chrome,49.0.2623.112,windows'),
('7b99ec9e931849fca3561ef63ace6cee128caee5a4825edc5e7a2e78f8dfada13e8bdd03b55e4f713c8632c8d85d9a37fb23ea389af3692dd9ee4e55e24ab0c7', 718825, '2016-05-14 22:30:18', '2016-05-14 22:50:28', '2016-05-14 22:30:28', '', 'Google Chrome,50.0.2661.102,windows'),
('7ee56a0f08664a8622931f6d2b7d57bf3bc8562ae727075a709b020fb0d0b511eff6e6836b4924c5a08a3be6ebaca19c3833ad1f5956dd086a7ba24fbd76d8b7', 718825, '2016-10-17 03:32:02', '2016-10-17 04:19:09', '2016-10-17 03:39:09', '127.0.0.1', 'Google Chrome,53.0.2785.143,windows'),
('80b9af262d2d4a05acdfa6aef0efaaea653c933af79d6d2a155b0be9a06c0889828ec2f4dc005aca1f834e3cf484a2d130832ef0a689af1d3fa0f8f343692f08', 718825, '2016-06-19 03:48:37', '2016-06-19 05:04:35', '2016-06-19 04:24:35', '', 'Google Chrome,51.0.2704.103,windows'),
('84a40eb664d517b40aba95d25cb819130f03b893bac1941a54baf6ff557511ca277583fdbdfe431b2d3aeaf38988e980074b0081e90a97b7502d096ef3593d30', 718825, '2016-04-10 06:36:11', '2016-04-10 06:56:35', '2016-04-10 06:36:35', '', 'Google Chrome,49.0.2623.110,windows'),
('87689833dfb68897ce58d25a4a1eaece1ba9d895f12e1f34b85eeead8a7919d849b5e47932c8d5809f1fc405c5cbb5e244dc81ff10434990e506ce81573dde86', 718825, '2016-07-09 18:47:36', '2016-07-09 19:47:48', '2016-07-09 19:07:48', '', 'Google Chrome,51.0.2704.103,windows'),
('8a600a5200e63f0c366af770ee492cfc09cd163d6220463118db197efa6fd5dac8bd498aff0d04229a531d828902b0baa84314d39f5390edaef375a34ddc96fa', 718825, '2016-06-17 07:10:58', '2016-06-17 07:51:16', '2016-06-17 07:11:16', '', 'Google Chrome,51.0.2704.84,windows'),
('8ae2647f8a91101a7cab507ee6fac50d1b5815d45e8c86816b3f77447e9051f324a6a9bc5ffa7b159cc077ce2d7e9b10aa878738e69bc9c681a31da4aaa0fb17', 718825, '2016-06-25 21:44:43', '2016-06-25 23:34:23', '2016-06-25 22:54:23', '', 'Google Chrome,51.0.2704.103,windows'),
('8d5ff36a6230517388f981bc7187090c6b4da4bd7803e714277a9cdccdf11fb458f9ee509f3f8bdaba621f63e8b8c463556f6eacc4546916442e969cb5c46450', 718825, '2016-06-14 06:58:02', '2016-06-14 07:57:53', '2016-06-14 07:17:53', '', 'Google Chrome,51.0.2704.84,windows'),
('8f1bbcaf7656062fd3cfd6037f52aca4adfeb2615f74195706b9792672be200e53e0ddd9690ac14f105bcc20564fb6dbaf3b22e61cfc401442208021dd01ceae', 718825, '2016-06-05 02:42:10', '2016-06-05 03:03:17', '2016-06-05 02:43:17', '', 'Google Chrome,50.0.2661.102,windows'),
('8fa8726681734f22c1b2943e556d991b4faee6e65496461a558654399471b97aa5ea71a88434766da4defe2d63494ab1ad4f26880ccb38d67b731aaeb55111db', 718825, '2016-06-13 12:06:34', '2016-06-13 12:48:45', '2016-06-13 12:08:45', '', 'Google Chrome,48.0.2564.23,linux'),
('959cf6816ab0279ce3cff10a570f7a136d0ffb7795c021326bf1fc2b688fe67fefc0bcc4adca6cdd77ed96814a85544de01ebefa70344b1f4fd1a520bcb6dda0', 718825, '2016-06-19 00:15:12', '2016-06-19 00:55:12', '2016-06-19 00:15:12', '', 'Google Chrome,51.0.2704.103,windows'),
('9c7c7b4a7cf60ccb14618093210666e173961caad3dc33dc0185672c20a6df2aac4b295d7f8ea7446afb5ab2acde989c31a25bf703e95c866c2f7f2b6a8769e6', 718825, '2016-04-24 01:18:17', '2016-04-24 01:38:17', '2016-04-24 01:18:17', '', 'Google Chrome,49.0.2623.112,windows'),
('9c8c2f837b786d812f426e7e60a81b1c6e7bad4724bd5365fabf03ae136a82ac827e426440ebec3b37286d70bfde2bee978c36848708d59506ef0d34304b051d', 718825, '2016-06-06 09:42:15', '2016-06-06 10:04:01', '2016-06-06 09:44:01', '', 'Google Chrome,50.0.2661.102,windows'),
('9d0c2ec3074fc5ab5b0dde37b7b6200e3279d09b43ce2bbbd532a7fbb1071546c1f59025aa5d44131b6b625f15cb489f9966ddf95454e9ff7d6fe38d2894fc0b', 718825, '2016-04-09 21:43:16', '2016-04-09 22:15:44', '2016-04-09 21:55:44', '', 'Google Chrome,49.0.2623.110,windows'),
('9e5595cadd294ede45fcc16dc4de7085f3c6346d862a5be1c41b440b2d6fa1613ecc83283a9fa283fd3c6d2004dd5db1f74944ed3cffa179e4bef0bac5f819f0', 718825, '2016-06-20 03:57:16', '2016-06-20 06:42:22', '2016-06-20 06:02:22', '', 'Google Chrome,51.0.2704.103,windows'),
('9f87d6c87aa40b9f2e2814ca0798a10b0d27d6dd02c5e907ce4b35fab86f6b5201a120f220b4cb66da3b517c2b43a368a4c0fcb7b4549ff2e8ee6b4739301d28', 718825, '2016-04-30 21:24:36', '2016-04-30 21:51:30', '2016-04-30 21:31:30', '', 'Google Chrome,49.0.2623.112,windows'),
('9fb2be95835dc4b0e1ad8d3eade5e3d883b953758b2cacce93c47df99c1c656d00b72f346b849b36e3c10504d9a2c6dde835234791759590b7ea374c4304fe23', 718825, '2016-03-31 06:27:46', '2016-03-31 06:47:47', '2016-03-31 06:27:47', '', 'Google Chrome,49.0.2623.108,windows'),
('9ffed76bdec391b26505ba79c68d80e2597b4e7603c76743087854d647b7fbd6cdd1654e722e9e46c83637e40fc3a0ad0e121715ae4d98294f04bc55a4aa4d5c', 718825, '2016-06-13 10:27:40', '2016-06-13 12:27:39', '2016-06-13 11:47:39', '', 'Google Chrome,51.0.2704.84,windows'),
('a370859e853f8dde70f88ca0b9912f01c1c345c6cc953fbee3903724962e13e29dc63cf6914d61fc21b801b4745e956eec76fbf58933bf206bb1da36ee74fbd7', 718825, '2016-06-19 22:44:00', '2016-06-19 23:29:35', '2016-06-19 22:49:35', '', 'Google Chrome,51.0.2704.103,windows'),
('a85fddf2cfea0909e0bc67fa9e9872c45fce406409496344f552f0f652e67d0f8ab510f624574ecc2013597a6db2375bdd30e278d4cea8ec13bcef4c857a9a91', 718825, '2016-07-20 06:24:46', '2016-07-20 07:14:20', '2016-07-20 06:34:20', '', 'Google Chrome,51.0.2704.103,windows'),
('a9a9b4e3fc1b734cb2a19366288ef55566083f751dac79fe2163920682bbea5f98b273d406f73f084c211df1f284499fd0607e697da99cbc299d542a43590848', 718825, '2016-04-30 11:07:10', '2016-04-30 11:27:10', '2016-04-30 11:07:10', '', 'Google Chrome,49.0.2623.112,windows'),
('aa8738aa8c573cd19e1bd21f66297e9bbda0fda582022e6e02a4227ab8d293c084626e5b4dceb86faba1cacc8952bc8923a741cd968ba05378a13b58ecbfb30a', 718825, '2016-07-05 01:14:04', '2016-07-05 02:23:30', '2016-07-05 01:43:30', '', 'Google Chrome,51.0.2704.103,windows'),
('ad3a3568fdcc1e03a9bba0389eb5277984a1d119fb276eb784dfb87ebfc61cc7bc5522ab1cd35ae8718cb1c95215f6d57c2da6c437c764598c1a94a1e224f972', 718825, '2016-05-01 05:48:22', '2016-05-01 06:22:29', '2016-05-01 06:02:29', '', 'Google Chrome,49.0.2623.112,windows'),
('ae141646a219f7370075c033f49c4d8e74cceba94859ff06f953e44ca501f398ed909e442c2f18b60571cb0e3b0d7512d65dd995a0fc0ca0baef8eee05841510', 718825, '2016-05-01 05:03:24', '2016-05-01 05:29:09', '2016-05-01 05:09:09', '', 'Google Chrome,49.0.2623.112,windows'),
('aee6280b5c50b6bcca99e4ba071d0975a6fa6b69bb1a7a24537fa4eec52ca3f5ae623c88f2760d0dc76df72fe3e0c67c41f6c3dfbd8f8e4e9e491dc2bffce971', 718825, '2016-04-09 20:40:53', '2016-04-09 21:02:34', '2016-04-09 20:42:34', '', 'Google Chrome,49.0.2623.110,windows'),
('afd794534f3967f2af4be080f2b8f9171d4f11ac333ed73c5e3b446fb4e0bab90134e64efadf7fedd3b27bf15a2043e296c0e9b5e3130a96a750f10ece2a8c96', 718825, '2016-10-17 03:19:06', '2016-10-17 03:59:06', '2016-10-17 03:19:06', '127.0.0.1', 'Google Chrome,53.0.2785.143,windows'),
('b065cc62c5bccd0d1948dffde11247e36b359ab62f18722d8b5813f7410c0554c9695a8db3b9df5097da738d0d37816b0f7e1f920a3dca45af5b379fb4080c6c', 718825, '2016-09-03 23:20:08', '2016-09-04 01:33:04', '2016-09-04 00:53:04', '', 'Google Chrome,52.0.2743.116,windows'),
('b214f03925a26d76126d4d60c28acbd99813628f3bf0c71b2584b738fcdcd02e54d53272878bbfee57403de8fa3fc0afa0cef873800699eec68ece2157b6560b', 718825, '2016-06-17 08:25:26', '2016-06-17 09:52:58', '2016-06-17 09:12:58', '', 'Google Chrome,51.0.2704.84,windows'),
('b2ea81e712b128d363b1cb8bd23113e870573d0bef6d22677ae169127198b993d3f2e2bafd61f646d19d55e75b945d6d46f4fe9b14044bf7adfa93dd2d004b92', 718825, '2016-07-16 09:56:25', '2016-07-16 10:40:28', '2016-07-16 10:00:28', '', 'Google Chrome,51.0.2704.103,windows'),
('b34d0ff30a969d3cf00896ad2c321dc1fb84289db328b731b0f865d469a66417ed500e02233f4ddeee1bdf8d74e071e0a55f43114703c1786e4f920068628c39', 718825, '2016-04-30 20:41:38', '2016-04-30 21:12:17', '2016-04-30 20:52:17', '', 'Google Chrome,49.0.2623.112,windows'),
('b598e521262b46bf90ea4eded1d35a7f8921ccf92adbb464a4ab5a4f92707698f814caaa7af0ceadfec6e797ad69c989c3b362318b07ac75758bd2a629a65022', 718825, '2016-04-11 02:19:26', '2016-04-11 02:39:26', '2016-04-11 02:19:26', '', 'Google Chrome,49.0.2623.110,windows'),
('b62c86c75225d20aabfc4b495b65533897786bd77e5e591dc53e7eeb619c6fca5102af30406084747e56edafad3b498a394de343cd84a68037fd639b77deaf2f', 718825, '2016-06-14 05:36:09', '2016-06-14 06:20:29', '2016-06-14 05:40:29', '', 'Google Chrome,51.0.2704.84,windows'),
('be0b481906d5e0ffcb2c17effb40318749ce28500791c06d279db85bfa950170fdd65ef211913dac05e20b6fb91bba41c51a8f62552858d520c7f3d15e2c34a5', 718825, '2016-06-14 07:18:28', '2016-06-14 08:20:39', '2016-06-14 07:40:39', '', 'Google Chrome,51.0.2704.84,windows'),
('c011f6772944e381c64bace92aeecd33dcbc1d2a4b991b7043dc4fb2c26442348325ebb5f250a7bdd5821d8e2eb718d6df44929528158fb2b4b0076201cb6c92', 718825, '2016-05-01 02:34:10', '2016-05-01 03:13:16', '2016-05-01 02:53:16', '', 'Google Chrome,49.0.2623.112,windows'),
('c0657a57fe4f7de3894b88c594693f5446f58c8b684c3976e5b6f4256fd976668efd227b5035cc751b4ccd7f1a4c7fb71d84315c89ae96ca7eabc98dcedebb8b', 718825, '2016-06-14 07:18:16', '2016-06-14 07:58:16', '2016-06-14 07:18:16', '', 'Apple Safari,9.0,mac'),
('c1eadb6885288fb1e8c5942c5576fa87da8f802696b01af7a92e5df8d6570946f201e255d5e06649079f489e63b917f935c08b4ea035f1258ef27e06161b6739', 718825, '2016-06-26 04:32:46', '2016-06-26 05:39:14', '2016-06-26 04:59:14', '', 'Google Chrome,51.0.2704.103,windows'),
('c3dda8229332711f902c4ddab6cd841cee408205c5f9b173d916cc1e659afe8e345cd0b265b4f5c4b87c7acabf6d749381a996079f6a5a7e3d4d6462fc26d1ef', 718825, '2016-07-09 06:42:36', '2016-07-09 07:22:55', '2016-07-09 06:42:55', '', 'Google Chrome,51.0.2704.103,windows'),
('c66c902a0ab8b7a0cf7aaf0acea0ddb9011cfcc0e72c4c30a4062558d62626e838528737c0277fa44496b2c6f3a28a7915a9a11cf7584d7561933b0351c683d7', 718825, '2016-05-31 00:23:23', '2016-05-31 00:58:18', '2016-05-31 00:38:18', '', 'Google Chrome,50.0.2661.102,windows'),
('cb0fba7622efac17a616345fcb71039836de82e11f464f2c99edcabd4aff007a07bb33e1572b490c6d897fbd68bc4bc6495675cb11b09b6a55e749874ba4d687', 718825, '2016-05-01 06:03:18', '2016-05-01 06:23:18', '2016-05-01 06:03:18', '', 'Google Chrome,48.0.2564.23,linux'),
('cb506996e9f51275866edb4a57eb24c0ce71133cfec4216d648bbaa77daa5e9b87a8d26e064beb5624d9b2ad26a39f935f6b226f10a93d493d116f6fdd36fb71', 718825, '2016-05-01 05:45:00', '2016-05-01 06:05:00', '2016-05-01 05:45:00', '', 'Google Chrome,49.0.2623.112,windows'),
('cbce788ce64d50a28e9bf5909bf8db3aad81c5e4b9a4b198c26db32446791855c04f6cc68f18316477b2c9539f6716f9d0f6a5a4fcc99780c9f74a585369cd7d', 718825, '2016-06-06 06:06:05', '2016-06-06 07:03:14', '2016-06-06 06:43:14', '', 'Google Chrome,50.0.2661.102,windows'),
('cd9460dfde45213ce1ce33ce8940764875c4756c9061114c534e853724c1b507c48d94c16e43f18fd729c3306ef5698107c8dcf5c33cc2d070b7dd0bf6649a71', 718825, '2016-06-15 05:59:24', '2016-06-15 07:59:42', '2016-06-15 07:19:42', '', 'Google Chrome,51.0.2704.84,windows'),
('ce36782595221df491b96a4331a9a05f9038ea824e806cf1ff081fedc6e86030fe83bfe1e7ef4041c1208de2ccda3fdf97d5fe0cf4c0a75114444f6021cf1eb7', 718825, '2016-06-07 05:01:49', '2016-06-07 05:24:09', '2016-06-07 05:04:09', '', 'Google Chrome,50.0.2661.102,windows'),
('d032b362a683db78d410ecece922e8cd5d74e93b8a3db67fad1f655006260e73f79cc7d1e253923d93e2e4179275fb93a422f0db9d074d26e5c8cecc946df95c', 718825, '2016-10-17 03:41:30', '2016-10-17 04:22:10', '2016-10-17 03:42:10', '127.0.0.1', 'Google Chrome,53.0.2785.143,windows'),
('d1ecc9b057b0b5ceab5bfdb1941cff3d390ce7047ce0d17e6a6454f3168bfdf41c043e034d57617a53c663621cd0f7e2c5a649d929263366a3789208999cedaa', 718825, '2016-06-14 09:12:20', '2016-06-14 09:52:38', '2016-06-14 09:12:38', '', 'Apple Safari,9.0,mac'),
('d3de695d5c0e1bdd2ca9444ddb672e9577881fc57b103796c30cfea1d4c0be7ebe3c49ccdf2cc00524f95fb15933080c084d83d640253f140cd3361b6c9fcb19', 718825, '2016-06-18 20:15:30', '2016-06-18 21:07:01', '2016-06-18 20:27:01', '', 'Google Chrome,51.0.2704.103,windows'),
('d50f2eb36460f1dd13eced567a06de11c2901b03c47b01642af3250655ebbb60e65c68c44fddb1b6601ed5d1ce10b2a308b16b66e5326453e289b97ffd497866', 718825, '2016-05-09 02:41:39', '2016-05-09 03:08:33', '2016-05-09 02:48:33', '', 'Google Chrome,50.0.2661.94,windows'),
('d7995e2042cb869d40f66289e70b9c741710094f8efff5f3bfe4134b0a25824254227933ad699ba17ea179f76798b17166b0e06a2e6b664d8f8d2b7a6cd34707', 718825, '2016-06-12 23:20:32', '2016-06-13 00:22:44', '2016-06-12 23:42:44', '', 'Google Chrome,51.0.2704.84,windows'),
('d853532683229ab4cdcd8ff1b8fbed9da5482c3d496c4771d9fe67d55bad6e2a36562e93e0a9a2b688716c9780f207290e11b95eb8d03a3973bcdea496d7ec50', 718825, '2016-06-13 00:57:18', '2016-06-13 02:19:03', '2016-06-13 01:39:03', '', 'Google Chrome,51.0.2704.84,windows'),
('da28e5fbbc48a16252492b08e36c570c5383189fde6b872d2c1dc0ef978bd1c771d071399517250eb317b0a202667cdda0c9b8eb65427c785d1f8ebbc9a5eb83', 718825, '2016-04-11 05:07:00', '2016-04-11 05:33:52', '2016-04-11 05:13:52', '', 'Google Chrome,49.0.2623.110,windows'),
('db8649ef9ea592be12d65a03bd5069747cf8c46eaed8e5e8837fe03fe403d38613e41e0461b600aa1b9d00a59d37f2eb4fb24eab6aff3ff21fcf7c7f78e5918e', 718825, '2016-05-09 03:49:52', '2016-05-09 04:51:38', '2016-05-09 04:31:38', '', 'Google Chrome,50.0.2661.94,windows'),
('ed033a28f507c05473f06bd339df30384b6c528f4d468e8a0e5c2b67365812e7d2bb61eb7e5966e6e802c5f24fc8757f64fa863bd3e6ae22cf0cfbd7221673e1', 718825, '2016-10-17 03:29:07', '2016-10-17 04:09:07', '2016-10-17 03:29:07', '127.0.0.1', 'Google Chrome,53.0.2785.143,windows'),
('f1f89215c8d303674fd33f9c56e140e0b4ce07c418ecd7a6326ee0162d205d914b9509d0e63582458b9c21ec783d9b4d126244cf3fa1defb0931e627eb7040c5', 718825, '2016-06-06 12:10:22', '2016-06-06 13:41:27', '2016-06-06 13:21:27', '', 'Google Chrome,50.0.2661.102,windows'),
('f69c8fd20ebe6fd518ff20ba159306b301e6576311abdd8a932d9139278125d4b841fb0717c01f3e7ac868ebe552089a1b8e27690c37660f07a864fb7590dba3', 718825, '2016-09-05 07:45:08', '2016-09-05 08:41:47', '2016-09-05 08:01:47', '', 'Google Chrome,52.0.2743.116,windows'),
('f8810ea7a2245162b0000a42ea998387a459056f59d11a8efb2e5a11e9b8c205c344e2b00b3e718d1ab98b57c4ae19aa8881e7cad49a7a27592c5c2fd3f0f347', 718825, '2016-05-08 05:52:45', '2016-05-08 06:13:08', '2016-05-08 05:53:08', '', 'Google Chrome,50.0.2661.94,windows'),
('fb34dbbea4c367247b2f2aff970370adfe10df99038cef9758dbfe220eb0a8f728b149f7d0d21f2782d093510b811d1b24ffb01daa40aa4cb99b435d40b4e1d0', 718825, '2016-10-17 03:16:03', '2016-10-17 03:56:03', '2016-10-17 03:16:03', '127.0.0.1', 'Google Chrome,53.0.2785.143,windows'),
('fbd05076ee5c3105f53691c58623f61b090d889d788136b71b010a068af593c9a1e8951d976b2a71665297840ae5ed2d9eddb830805956f7456ec26548332c7c', 718825, '2016-06-12 21:10:06', '2016-06-12 23:20:11', '2016-06-12 22:40:11', '', 'Google Chrome,51.0.2704.84,windows'),
('fc673438940b66851e1f92105fa8be8f6858f27aeeaed12876af4d565e4027267b73387a7ccf3102d2e2384191f1727133a18b6c07dc90b2b663e4303845a3d0', 718825, '2016-06-05 04:51:52', '2016-06-05 05:15:41', '2016-06-05 04:55:42', '', 'Google Chrome,50.0.2661.102,windows');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
