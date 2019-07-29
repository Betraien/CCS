-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 10:08 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccs`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_third_parties`
--

CREATE TABLE `client_third_parties` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `third_party_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_third_parties`
--

INSERT INTO `client_third_parties` (`id`, `client_id`, `platform_id`, `third_party_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 6, 1, 4, '2019-07-03 00:00:00', '2019-07-19 00:00:00', 0),
(2, 6, 1, 5, '2019-07-04 00:00:00', '2019-07-11 00:00:00', 0),
(3, 6, 1, 2, '2019-07-12 07:11:00', '2019-07-17 00:00:00', 0),
(4, 3, 1, 3, '2019-07-05 00:00:00', '2019-07-12 00:00:00', 0),
(5, 3, 2, 2, '2019-07-16 11:53:10', '2019-07-16 11:53:10', 0),
(6, 6, 3, 5, '2019-07-11 00:00:00', '2019-07-12 00:00:00', 0),
(7, 1, 2, 47, '2019-07-21 16:10:04', '2019-07-21 16:10:04', 0),
(8, 1, 5, 5, '2019-07-21 16:10:24', '2019-07-21 16:10:24', 0),
(9, 2, 1, 3, '2019-07-21 16:10:28', '2019-07-21 16:10:28', 0),
(10, 3, 0, 5, '2019-07-21 16:10:31', '2019-07-21 16:10:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `platform_third_parties`
--

CREATE TABLE `platform_third_parties` (
  `id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `third_party_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `platform_third_parties`
--

INSERT INTO `platform_third_parties` (`id`, `platform_id`, `third_party_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 1, 5, '2019-07-05 00:00:00', '2019-07-16 00:00:00', 0),
(2, 1, 2, '2019-07-04 00:00:00', '2019-07-11 00:00:00', 0),
(3, 2, 5, '2019-07-05 00:00:00', '2019-07-16 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_partnerships`
--

CREATE TABLE `request_partnerships` (
  `id` int(11) NOT NULL,
  `third_party_title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_partnerships`
--

INSERT INTO `request_partnerships` (`id`, `third_party_title`, `description`, `website`, `contact_person`, `contact_phone`, `contact_email`, `status_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Temraz is the best', 'This is how to be as temraz', 'https://temraz.zz.shabib.com/ojf', 'shabib aldosary', '+966599193936', 'shabib.aldosry@hotmail.com', 2, '2019-07-29 06:37:36', '2019-07-29 06:37:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Active', '2019-07-04 00:00:00', '2019-07-27 00:00:00', 0),
(2, 'pending', '2019-07-10 00:00:00', '2019-07-05 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `third_parties`
--

CREATE TABLE `third_parties` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `id_token` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `third_party_type_id` int(11) NOT NULL,
  `view_order` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `average_rating` float NOT NULL DEFAULT 0,
  `config` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `public` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `third_parties`
--

INSERT INTO `third_parties` (`id`, `title`, `id_token`, `description`, `logo`, `third_party_type_id`, `view_order`, `status_id`, `position`, `website`, `contact_person`, `contact_phone`, `contact_email`, `average_rating`, `config`, `public`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'TNTN\r\n', 'tnt', 'hello mr.shabib', 'wregwrgrg/wergoihrg.com', 1, 3, 1, 'xwef', 'Turnitin.com', 'jafri jafri', '+96595', 'ohrwiuhg@woehiug.com', 4.58, '{\"config\":{\r\n        \"Connection-standard\": \"Rest\",\r\n        \"type\": \"Post\",\r\n\"url\":\"https://classera.tii-sandbox.com/api/v1/submissions\",\r\n\r\n\"header\": {\r\n\"X-Turnitin-Integration-Name\": \"ccs\",\r\n\"X-Turnitin-Integration-Version\": \"v1beta\",\r\n\"Authorization\": \"Bearer 18853c5ef5804f88bc58d90a12a98577\",\r\n\"Content-Type\":\" application/json\"},\r\n\r\n\"body\":{\r\n\"owner\": \"classera\",\r\n\"title\": \"classera_submission\"}\r\n}\r\n}', 1, '2019-07-10 00:00:00', '2019-07-28 17:42:12', 0),
(2, 'Dropboxx', 'DB', 'hello mr.shabibb', 'wegwg/tyjtj', 1, 2, 1, 'Jeffri', 'www.dropbox.com', 'rtht erg', '+96658965223', 'ohrwiuhg@woehiug.com', 2.85, '{\r\n    \"config\": {\r\n        \"Auth\": \"OAuth\",\r\n        \"type\": \"Get\",\r\n        \"url\": \"https://www.dropbox.com/oauth2/authorize?client_id=jssbqykrnanwmd8&response_type=code&redirect_uri=http://localhost/GitHub/CCS/public/ThirdParty/token\",\r\n        \"header\": {},\r\n        \"body\": {}\r\n    }\r\n}', 1, '2019-07-19 10:00:17', '2019-07-25 13:58:01', 0),
(3, 'C8Science', 'g6ek95k5', 'C8Science combines computer & physical exercises to develop the cognitive skills necessary to learn in the classroom and improve math and reading achievement. Assigned by the Director of Student Personnel and Special Services for students who qualify', '', 1, 3, 1, 'Content Gateway', 'https://www.c8sciences.com/', 'Thamer Ahmed', '+96658965223', 'Thamer_Ahmed@gmail.com', 0, '[serialized (platforms, roles, redirect_url, token, etc.)]', 1, '2019-07-19 10:00:17', '2019-07-31 06:26:25', 0),
(4, 'DD@DD', 'wegweg', 'wegweg', 'images/Thanks.jpg', 1, 1, 1, '1', '1', '1', '1', '2', 0, '{\r\n\"url\":\"https://classera.tii-sandbox.com/api/v1/submissions\",\r\n\r\n\"header\":[\r\n\"X-Turnitin-Integration-Name: ccs\",\r\n\"X-Turnitin-Integration-Version: v1beta\",\r\n\"Authorization: Bearer 18853c5ef5804f88bc58d90a12a98577\",\r\n\"Content-Type: application/json\"],\r\n\r\n\"body\":{\r\n\"owner\": \"classera\",\r\n\"title\": \"classera_submission\"}\r\n\r\n}', 1, '2019-07-07 18:14:59', '2019-07-07 18:14:59', 0),
(5, 'Dropboxx', 'DB', 'hello mr.shabibb', 'wegwg/tyjtj', 1, 2, 1, 'Jeffri', 'www.dropbox.com', 'rtht erg', '+96658965223', 'ohrwiuhg@woehiug.com', 2.85, '{\r\n    \"config\": {\r\n        \"Connection-standard\": \"OAuth\",\r\n        \"type\": \"Get\",\r\n        \"url\": \"https://www.dropbox.com/oauth2/authorize?client_id=jssbqykrnanwmd8&response_type=code&redirect_uri=http://localhost/GitHub/CCS/public/ThirdParty/token\",\r\n        \"header\": {},\r\n        \"body\": {}\r\n    }\r\n}', 1, '0000-00-00 00:00:00', '2019-07-25 12:22:29', 0),
(47, 'sad 1', 'noob', 'it is decri', 'logoPath', 1, 3, 1, 'xxxx', 'rth', 'Jeff John', '+1 659 875 469', 'Jeff@jemmy.jeff', 0, '{\"config\":\"{\\\"config\\\":{\\\"url\\\":\\\"www.shabib.com\\\",\\\"header\\\":{\\\"Authorization\\\":\\\"0599193936\\\",\\\"content-type\\\":\\\"application\\\\\\/json\\\"}}}\"}', 0, '2019-07-21 08:38:53', '2019-07-21 08:38:53', 0),
(48, 'wefwegeg', 'sd', 'it is decri', 'logoPath', 1, 5, 1, 'wgweg', 'https://jeff.com', 'Jeff John', '+1 659 875 469', 'Jeff@jemmy.jeff', 0, '{\"config\":\"{\\\"config\\\":{\\\"url\\\":\\\"www.shabib.com\\\",\\\"header\\\":{\\\"Authorization\\\":\\\"0565826926\\\",\\\"content-type\\\":\\\"application\\\\\\/json\\\"}}}\"}', 1, '2019-07-21 10:05:59', '2019-07-21 10:05:59', 0),
(49, 'Gtyhtyjtyjtyjtyjty 1', 'noob', 'it is decri', 'logoPath', 1, 5, 1, 'xxxx', 'https://jeff.com', 'Jeff John', '+1 659 875 469', 'Jeff@jemmy.jeff', 0, '{\"config\":{\"url\":\"www.shabib.com\",\"header\":{\"Authorization\":\"0599193936\",\"content-type\":\"application\\/json\"}}}', 1, '2019-07-21 13:28:56', '2019-07-21 13:28:56', 0),
(50, 'wef 1', 'noob', 'it is decri', 'logoPath', 1, 5, 1, 'xxxx', 'https://jeff.com', 'Jeff John', '+1 659 875 469', 'Jeff@jemmy.jeff', 0, '{\"config\":{\"url\":\"www.shabib.com\",\"header\":{\"Authorization\":\"0599193936\",\"content-type\":\"application\\/json\"}}}', 1, '2019-07-21 13:29:07', '2019-07-21 13:29:07', 0),
(51, 'wefe 1', 'noob', 'it is decri', 'logoPath', 1, 5, 1, 'xxxx', 'https://jeff.com', 'Jeff John', '+1 659 875 469', 'Jeff@jemmy.jeff', 0, '{\"config\":{\"url\":\"www.shabib.com\",\"header\":{\"Authorization\":\"0599193936\",\"content-type\":\"application\\/json\"}}}', 1, '2019-07-21 13:29:42', '2019-07-21 13:29:42', 0),
(52, 'wqefe 1', 'noob', 'it is decri', 'logoPath', 1, 5, 1, 'xxxx', 'https://jeff.com', 'Jeff John', '+1 659 875 469', 'Jeff@jemmy.jeff', 0, '{\"config\":{\"url\":\"www.shabib.com\",\"header\":{\"Authorization\":\"0599193936\",\"content-type\":\"application\\/json\"}}}', 1, '2019-07-21 13:32:21', '2019-07-21 13:32:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `third_party_ratings`
--

CREATE TABLE `third_party_ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `third_party_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `comment` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `third_party_ratings`
--

INSERT INTO `third_party_ratings` (`id`, `user_id`, `platform_id`, `third_party_id`, `rating`, `comment`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 3, 1, 2, 5, 'Hello this is a comment', '2019-07-18 08:18:32', '2019-07-20 10:38:26', 0),
(14, 1, 2, 5, 2.85, 'classeraXv9', '2019-07-21 13:22:52', '2019-07-21 13:22:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `third_party_types`
--

CREATE TABLE `third_party_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `third_party_types`
--

INSERT INTO `third_party_types` (`id`, `type`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'xType', '2019-07-11 00:00:00', '2019-07-14 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usercps`
--

CREATE TABLE `usercps` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercps`
--

INSERT INTO `usercps` (`id`, `client_id`, `platform_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_third_parties`
--

CREATE TABLE `user_third_parties` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `third_party_id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `expire_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_third_parties`
--

INSERT INTO `user_third_parties` (`id`, `user_id`, `platform_id`, `client_id`, `third_party_id`, `token`, `status`, `expire_date`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 3, 2, 3, 5, '', 'Active', '2019-07-03 03:12:05', '2019-07-10 04:00:16', '2019-07-19 07:23:00', 0),
(2, 3, 2, 3, 2, 'vendor123647', 'Active', '2019-07-03 03:12:05', '2019-03-03 10:00:16', '2019-09-19 12:23:00', 0),
(3, 3, 2, 3, 3, 'vendor373783', 'xxxxx', '2019-07-03 03:12:05', '2019-03-03 10:00:16', '2019-09-19 12:23:00', 0),
(39, 2, 5, 3, 5, 'YQR3vaGQARAAAAAAAAAAMMvJjbulCSKWugpTHe0sg1s', 'Active', '2019-07-25 08:15:11', '2019-07-25 08:15:11', '2019-07-25 08:15:11', 0),
(43, 2, 8, 2, 5, 'YQR3vaGQARAAAAAAAAAAM0JcxgGuEKql8w5K3Epi1gQ', 'Active', '2019-07-25 08:52:50', '2019-07-25 08:52:50', '2019-07-25 08:52:50', 0),
(45, 2, 9, 2, 5, 'YQR3vaGQARAAAAAAAAAAM0JcxgGuEKql8w5K3Epi1gQ', 'Active', '2019-07-25 08:54:35', '2019-07-25 08:54:35', '2019-07-25 08:54:35', 0),
(46, 2, 6, 2, 5, 'YQR3vaGQARAAAAAAAAAAM0JcxgGuEKql8w5K3Epi1gQ', 'Active', '2019-07-25 09:00:36', '2019-07-25 09:00:36', '2019-07-25 09:00:36', 0),
(47, 23, 23, 412, 5, 'YQR3vaGQARAAAAAAAAAANNDLSB7mW2BuGPwxHS3Eno4', 'Active', '2019-07-25 09:19:43', '2019-07-25 09:19:43', '2019-07-25 09:19:43', 0),
(48, 2, 16, 4, 5, 'YQR3vaGQARAAAAAAAAAANVhrcZaWKrMiABIKlson50s', 'Active', '2019-07-25 09:21:49', '2019-07-25 09:21:49', '2019-07-25 09:21:49', 0),
(49, 232, 232, 232, 5, 'YQR3vaGQARAAAAAAAAAANr-wBJaqdtfu0dX5SkZQyP0', 'Active', '2019-07-25 09:26:58', '2019-07-25 09:26:58', '2019-07-25 09:26:58', 0),
(51, 232, 123, 123, 5, 'YQR3vaGQARAAAAAAAAAAOO8oRm_LMVVC0XvkvW1BXtE', 'Active', '2019-07-25 09:53:22', '2019-07-25 09:53:22', '2019-07-25 09:53:22', 0),
(52, 7, 7, 9, 5, 'YQR3vaGQARAAAAAAAAAAOXyVp3KdpPMasn70dBZX7vo', 'Active', '2019-07-25 10:06:00', '2019-07-25 10:06:00', '2019-07-25 10:06:00', 0),
(56, 1, 4, 1, 5, 'YQR3vaGQARAAAAAAAAAAPTxkqkoLwk6UDo2wLkI0Qb0', 'Active', '2019-07-25 10:11:49', '2019-07-25 10:11:49', '2019-07-25 10:11:49', 0),
(57, 123, 123, 123, 5, 'YQR3vaGQARAAAAAAAAAAPvzIKyUDR76l_RShAdH37YU', 'Active', '2019-07-29 07:29:47', '2019-07-29 07:29:47', '2019-07-29 07:29:47', 0),
(58, 2, 1, 3, 1, '33e7547c-a8b7-4ade-b422-332fda2df6ac', 'Active', '2019-07-29 07:51:28', '2019-07-29 07:51:28', '2019-07-29 07:51:28', 0),
(59, 123, 3454, 122, 5, 'YQR3vaGQARAAAAAAAAAAP9WQqrduZB9rm1ghuu0oW2Y', 'Active', '2019-07-29 07:52:08', '2019-07-29 07:52:08', '2019-07-29 07:52:08', 0),
(63, 324, 234, 234, 5, 'YQR3vaGQARAAAAAAAAAAQIIdfBbmhiICOe85fMbKRqw', 'Active', '2019-07-29 07:58:21', '2019-07-29 07:58:21', '2019-07-29 07:58:21', 0),
(65, 546, 345, 658, 5, 'YQR3vaGQARAAAAAAAAAAQVzrSA2KIhkG8qnBtma6kHY', 'Active', '2019-07-29 08:01:48', '2019-07-29 08:01:48', '2019-07-29 08:01:48', 0),
(66, 857, 999, 965, 5, 'YQR3vaGQARAAAAAAAAAAQk2p0AW0ezZpn0pezUeMAKo', 'Active', '2019-07-29 08:06:30', '2019-07-29 08:06:30', '2019-07-29 08:06:30', 0),
(67, 777, 777, 777, 1, 'dd32c5bf-603e-4981-bbe9-dd46d6f7d000', 'Active', '2019-07-29 08:06:50', '2019-07-29 08:06:50', '2019-07-29 08:06:50', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_third_parties`
--
ALTER TABLE `client_third_parties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_id_2` (`client_id`,`platform_id`,`third_party_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `third_party_id` (`third_party_id`),
  ADD KEY `i` (`platform_id`);

--
-- Indexes for table `platform_third_parties`
--
ALTER TABLE `platform_third_parties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `platform_id_2` (`platform_id`,`third_party_id`),
  ADD KEY `platform_id` (`platform_id`);

--
-- Indexes for table `request_partnerships`
--
ALTER TABLE `request_partnerships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `third_party_title` (`third_party_title`,`contact_email`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `third_parties`
--
ALTER TABLE `third_parties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`,`third_party_type_id`);

--
-- Indexes for table `third_party_ratings`
--
ALTER TABLE `third_party_ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`,`third_party_id`),
  ADD KEY `user_id` (`user_id`,`third_party_id`),
  ADD KEY `platform_id` (`platform_id`);

--
-- Indexes for table `third_party_types`
--
ALTER TABLE `third_party_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercps`
--
ALTER TABLE `usercps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_third_parties`
--
ALTER TABLE `user_third_parties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`,`platform_id`,`third_party_id`) USING BTREE,
  ADD KEY `client_id` (`client_id`,`platform_id`,`third_party_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_third_parties`
--
ALTER TABLE `client_third_parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `platform_third_parties`
--
ALTER TABLE `platform_third_parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request_partnerships`
--
ALTER TABLE `request_partnerships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `third_parties`
--
ALTER TABLE `third_parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `third_party_ratings`
--
ALTER TABLE `third_party_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `third_party_types`
--
ALTER TABLE `third_party_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usercps`
--
ALTER TABLE `usercps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_third_parties`
--
ALTER TABLE `user_third_parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
