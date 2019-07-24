-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2019 at 10:25 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

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
(5, 3, 2, 2, '2019-07-16 11:53:10', '2019-07-16 11:53:10', 1),
(6, 6, 3, 5, '2019-07-11 00:00:00', '2019-07-12 00:00:00', 0),
(7, 6, 4, 1, '2019-07-21 16:10:04', '2019-07-21 16:10:04', 0),
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
  `third_party_status_id` int(11) NOT NULL,
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

INSERT INTO `third_parties` (`id`, `title`, `id_token`, `description`, `logo`, `third_party_type_id`, `view_order`, `third_party_status_id`, `position`, `website`, `contact_person`, `contact_phone`, `contact_email`, `average_rating`, `config`, `public`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'xxxrgerthx', 'TNT', 'This is a plagiarism nyfgthnoijmi', 'wregwrgrg/wergoihrg.com', 1, 3, 1, 'xwef', 'Turnitin.com', 'jafri jafri', '+96595', 'ohrwiuhg@woehiug.com', 0, '{\"config\":{\r\n\"url\":\"https://classera.tii-sandbox.com/api/v1/submissions\",\r\n\r\n\"header\": {\r\n\"X-Turnitin-Integration-Name\": \"ccs\",\r\n\"X-Turnitin-Integration-Version\": \"v1beta\",\r\n\"Authorization\": \"Bearer 18853c5ef5804f88bc58d90a12a98577\",\r\n\"Content-Type\":\" application/json\"},\r\n\r\n\"body\":{\r\n\"owner\": \"classera\",\r\n\"title\": \"classera_submission\"}\r\n}\r\n}', 1, '2019-07-10 00:00:00', '2019-07-26 00:00:00', 0),
(2, 'BrainPop', 'er345fy36', 'BrainPop Engages students through animated movies, learning games, interactive quizzes, primary source activities, concept mapping, and more.', 'images/SWE Program-Prerequisite.png', 1, 2, 1, 'Content Gateway', 'https://www.brainpop.com/ ', 'Saud Khaled', '+9665897635', 'Saud_Khaled@gmail.com', 0, '{\r\n    \"config\": {\r\n        \"Auth\": \"RESTapi\",\r\n        \"type\": \"post\",\r\n        \"url\": \"https://classera.tii-sandbox.com/api/v1/submissions\",\r\n        \"header\": {\r\n            \"X-Turnitin-Integration-Name\": \"ccs\",\r\n            \"X-Turnitin-Integration-Version\": \"v1beta\",\r\n            \"Authorization\": \"Bearer 18853c5ef5804f88bc58d90a12a98577\",\r\n            \"Content-Type\": \" application/json\"\r\n        },\r\n        \"body\": {\r\n            \"owner\": \"classera\",\r\n            \"title\": \"classera_submission\"\r\n        }\r\n    }\r\n}', 1, '2019-07-19 10:00:17', '2019-07-31 06:26:25', 0),
(3, 'C8Science', 'g6ek95k5', 'C8Science combines computer & physical exercises to develop the cognitive skills necessary to learn in the classroom and improve math and reading achievement. Assigned by the Director of Student Personnel and Special Services for students who qualify', '', 1, 3, 1, 'Content Gateway', 'https://www.c8sciences.com/', 'Thamer Ahmed', '+96658965223', 'Thamer_Ahmed@gmail.com', 0, '[serialized (platforms, roles, redirect_url, token, etc.)]', 1, '2019-07-19 10:00:17', '2019-07-31 06:26:25', 0),
(4, 'DD@DD', 'wegweg', 'wegweg', 'images/Thanks.jpg', 1, 1, 1, '1', '1', '1', '1', '2', 0, '{\r\n\"url\":\"https://classera.tii-sandbox.com/api/v1/submissions\",\r\n\r\n\"header\":[\r\n\"X-Turnitin-Integration-Name: ccs\",\r\n\"X-Turnitin-Integration-Version: v1beta\",\r\n\"Authorization: Bearer 18853c5ef5804f88bc58d90a12a98577\",\r\n\"Content-Type: application/json\"],\r\n\r\n\"body\":{\r\n\"owner\": \"classera\",\r\n\"title\": \"classera_submission\"}\r\n\r\n}', 1, '2019-07-07 18:14:59', '2019-07-07 18:14:59', 0),
(5, 'Dropbox', 'DB', 'asd', 'wegwg/tyjtj', 1, 2, 1, 'Content Gateway', 'www.dropbox.com', 'rtht erg', '+96658965223', 'ohrwiuhg@woehiug.com', 2.85, '{\r\n    \"config\": {\r\n        \"Auth\": \"OAuth\",\r\n        \"type\": \"Get\",\r\n        \"url\": \"https://www.dropbox.com/oauth2/authorize?client_id=jssbqykrnanwmd8&response_type=code&redirect_uri=http://localhost/laravel/Blog/public/ThirdParty/token\",\r\n        \"header\": {},\r\n        \"body\": {}\r\n    }\r\n}', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(47, 'sad 1', 'noob', 'it is decri', 'logoPath', 1, 3, 1, 'xxxx', 'https://jeff.com', 'Jeff John', '+1 659 875 469', 'Jeff@jemmy.jeff', 0, '{\"config\":\"{\\\"config\\\":{\\\"url\\\":\\\"www.shabib.com\\\",\\\"header\\\":{\\\"Authorization\\\":\\\"0599193936\\\",\\\"content-type\\\":\\\"application\\\\\\/json\\\"}}}\"}', 1, '2019-07-21 08:38:53', '2019-07-21 08:38:53', 1),
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
-- Table structure for table `third_party_statuses`
--

CREATE TABLE `third_party_statuses` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `third_party_statuses`
--

INSERT INTO `third_party_statuses` (`id`, `status`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Active', '2019-07-04 00:00:00', '2019-07-27 00:00:00', 0);

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
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, 3, 2, 2, 5, '', 'Active', '2019-07-03 03:12:05', '2019-07-10 04:00:16', '2019-07-19 07:23:00', 0),
(2, 3, 1, 2, 2, 'vendor123647', 'Active', '2019-07-03 03:12:05', '2019-03-03 10:00:16', '2019-09-19 12:23:00', 0),
(3, 2, 1, 3, 5, 'vendor373783', 'xxxxx', '2019-07-03 03:12:05', '2019-03-03 10:00:16', '2019-09-19 12:23:00', 0),
(4, 10, 8, 2, 19, '690d80c5-6a8b-41b5-80e1-baf42624a2fc', 'Active', '2019-07-14 09:28:33', '2019-07-14 09:28:33', '2019-07-14 09:28:33', 0),
(5, 3, 8, 3, 4, '9b5335ce-fa27-4faa-b43d-14d9a97ef5e5', 'Active', '2019-07-14 09:30:22', '2019-07-14 09:30:22', '2019-07-14 09:30:22', 0),
(24, 0, 0, 0, 2, 'e789b52d-963a-472d-9020-4017cc2bd90f', 'Active', '2019-07-21 07:49:30', '2019-07-21 07:49:30', '2019-07-21 07:49:30', 0),
(25, 0, 1, 0, 5, 'YQR3vaGQARAAAAAAAAAAIEfT0kMkoJ4HYELWIyDkYIs', 'Active', '2019-07-21 08:22:46', '2019-07-21 08:22:46', '2019-07-21 08:22:46', 0),
(26, 0, 1, 0, 4, 'YQR3vaGQARAAAAAAAAAAIfnRPF8M04v6J1PQ99533Ew', 'Active', '2019-07-21 08:23:25', '2019-07-21 08:23:25', '2019-07-21 08:23:25', 0),
(27, 5, 5, 5, 2, 'c3170340-00aa-48cc-bfe5-1e0c76925ff7', 'Active', '2019-07-21 08:27:46', '2019-07-21 08:27:46', '2019-07-21 08:27:46', 0),
(28, 2, 2, 3, 5, 'YQR3vaGQARAAAAAAAAAAIlLlubvI9oLK3ullmBUjv-Q', 'Active', '2019-07-21 09:26:14', '2019-07-21 09:26:14', '2019-07-21 09:26:14', 1),
(29, 7, 2, 9, 2, '6f166696-5710-48d8-91bd-a8345d5aea25', 'Active', '2019-07-21 10:29:50', '2019-07-21 10:29:50', '2019-07-21 10:29:50', 0),
(30, 5, 7, 6, 5, 'YQR3vaGQARAAAAAAAAAAIydg3lrkLlfbiP2sxRVM6Ow', 'Active', '2019-07-21 10:31:24', '2019-07-21 10:31:24', '2019-07-21 10:31:24', 0),
(31, 45, 78, 65, 5, 'YQR3vaGQARAAAAAAAAAAJMHRgA_H3UzGL5of-7WVyS0', 'Active', '2019-07-21 10:32:19', '2019-07-21 10:32:19', '2019-07-21 10:32:19', 0),
(32, 99, 99, 99, 2, '581815b3-f56f-4950-ae4f-5a02b90f7fc7', 'Active', '2019-07-21 10:32:54', '2019-07-21 10:32:54', '2019-07-21 10:32:54', 0);

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
-- Indexes for table `third_party_statuses`
--
ALTER TABLE `third_party_statuses`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `third_party_statuses`
--
ALTER TABLE `third_party_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
