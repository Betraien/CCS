-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2019 at 09:13 AM
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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('x@x.com', '$2y$10$RSnupzifBxuNpGoQGaPyFePQUFq8Z1U9SZMizDK4g2XmLclq8pGhW', '2019-08-01 10:55:14');

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
(1, 1, 6, '2019-07-05 00:00:00', '2019-07-16 00:00:00', 0),
(2, 1, 2, '2019-07-04 00:00:00', '2019-07-11 00:00:00', 0),
(3, 1, 3, '2019-07-05 00:00:00', '2019-07-16 00:00:00', 0);

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
  `table_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `table_name`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'Active', 'third_parties', '2019-07-04 00:00:00', '2019-07-27 00:00:00', 0),
(2, 'pending', 'user_third_parties', '2019-07-10 00:00:00', '2019-07-05 00:00:00', 0),
(3, 'agreement', 'third_parties', '2019-08-16 00:00:00', '2019-08-07 12:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `third_parties`
--

CREATE TABLE `third_parties` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `id_token` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `logo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `third_party_type_id` int(11) NOT NULL,
  `view_order` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `position` varchar(100) DEFAULT NULL,
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
(1, 'updateTest', 'tnt', 'wreg', 'images/بلا.jpg', 2, 34, 2, 'xwef', 'jafri', 'jafri', '+96595', 'ohrwiuhg@woehiug.com', 4.58, 'gjmg,wefweg', 1, '2019-07-10 00:00:00', '2019-08-06 14:47:00', 0),
(2, 'Dropboxx', 'DB', 'hello', 'images/1.jpg', 2, 2, 1, 'Jeffri', 'rtht', 'rtht', '+96658965223', 'ohrwiuhg@woehiug.com', 2.85, 'trwgrwg', 1, '2019-07-19 10:00:17', '2019-08-06 19:01:02', 0),
(3, 'C8Science', 'g6ek95k5', 'C8Science combines computer & physical exercises to develop the cognitive skills necessary to learn in the classroom and improve math and reading achievement. Assigned by the Director of Student Personnel and Special Services for students who qualify', '', 1, 3, 1, 'Content Gateway', 'https://www.c8sciences.com/', 'Thamer Ahmed', '+96658965223', 'Thamer_Ahmed@gmail.com', 0, '{\r\n    \"config\": {\r\n        \"Requests\": {\r\n            \"1\": {\r\n                \"Authentication-type\": \"Rest\",\r\n                \"type\": \"Post\",\r\n                \"url\": \"https://classera.tii-sandbox.com/api/v1/submissions\",\r\n                \"header\": {\r\n                    \"X-Turnitin-Integration-Name\": \"ccs\",\r\n                    \"X-Turnitin-Integration-Version\": \"v1beta\",\r\n                    \"Authorization\": \"Bearer 18853c5ef5804f88bc58d90a12a98577\",\r\n                    \"Content-Type\": \" application/json\"\r\n                },\r\n                \"body\": {\r\n                    \"owner\": \"classera\",\r\n                    \"title\": \"classera_submission\"\r\n                }\r\n            }\r\n        }\r\n    }\r\n}', 1, '2019-07-19 10:00:17', '2019-08-06 19:01:07', 0),
(4, 'DD@DD', 'wegweg', 'wegweg', 'images/Thanks.jpg', 1, 1, 1, '1', '1', '1', '1', '2', 0, '{\r\n    \"config\": {\r\n        \"Requests\": {\r\n            \"1\": {\r\n                \"Authentication-type\": \"Rest\",\r\n                \"type\": \"post\",\r\n                \"url\": \"https://turnitin.training.classera.com/users/add\",\r\n                \"header\": {},\r\n                \"body\": {\r\n\"api_key\": \"kghNdf0VnwL90ylT3zpy4vryVZoWDA9foLm16gUG76KCGyjwUgrAiqZZRF2iRiWoE9JZAsoVztEix5pnFsHaKiWOdUteiz8GLRAI\"\r\n}\r\n            }\r\n        }\r\n    }\r\n}', 1, '2019-07-07 18:14:59', '2019-08-06 19:01:12', 0),
(5, 'DropTheX', '2e', 'hello', 'images/background.png', 1, 6, 1, 'Jeffri', 'rtht', 'rtht', '+96658965223', 'ohrwiuhg@woehiug.com', 2.85, '{\r\n    \"config\": {\r\n        \"Requests\": {\r\n            \"1\": {\r\n                \"Authentication-type\": \"Oauth\",\r\n                \"type\": \"Get\",\r\n                \"url\": \"https://www.dropbox.com/oauth2/authorize?client_id=jssbqykrnanwmd8&response_type=code&redirect_uri=http://localhost/GitHub/CCS/public/ThirdParty/token\",\r\n                \"header\": {},\r\n                \"body\": {}\r\n            }\r\n        }\r\n    }\r\n}', 1, '0000-00-00 00:00:00', '2019-08-06 14:45:20', 0),
(6, '123', 'wef', '123', 'images/بلا.jpg', 2, 123, 1, '123', '123', '123', '123', '23', 0, '{\"config\":\"123weg\"}', 1, '2019-08-05 17:29:38', '2019-08-06 19:10:30', 0),
(84, '123', '123fwegwef', '123', NULL, 1, 123, 1, '123', '123', '123', '123', '23', 0, 'thrthrthrt', 1, '2019-08-05 17:34:50', '2019-08-06 18:59:09', 0),
(85, 'shabib', 'skpogij', 'sahbiasb', 'images/background.png', 1, 6, 1, 'reg', 'uhgrhg', 'fegfih', '54', 'roguh', 0, '{\"config\":\"etheth\"}', 1, '2019-08-06 05:54:19', '2019-08-06 18:59:41', 0),
(86, 'rth', 'rerherh', 'rtjrt', NULL, 3, 1, 2, 'jrtj', 'rheherhe', 'erherb', 'erherh', 'erhdfh', 0, '{\"config\":\"erherh\"}', 1, '2019-08-06 08:17:11', '2019-08-06 19:10:35', 0),
(88, 'rth', 'rerherherherh', 'rtjrter', NULL, 3, 1, 2, 'jrtj', 'rheherhe', 'erherb', 'erherh', 'erhdfh', 0, '{\"config\":\"erherh\"}', 1, '2019-08-06 08:18:06', '2019-08-06 19:00:52', 0),
(89, 'rwgerh', 'erherherh', 'erh', 'images/بلا.jpg', 2, 2, 2, 'erhe', 'erherh', 'rherherh', 'erh', 'erherh', 0, '{\"config\":\"erherhrweth\"}', 1, '2019-08-06 08:35:17', '2019-08-06 08:35:17', 0);

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
(1, 'xType', '2019-07-11 00:00:00', '2019-07-14 00:00:00', 0),
(2, 'JeffType', '2019-08-08 00:00:00', '2019-08-10 00:00:00', 0),
(3, 'dsdfdg', '2019-08-08 00:00:00', '2019-08-10 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'app1test', 'x@x.com', NULL, '$2y$10$JvhmUIZtQHBG57tlPJMq2uLJP6vmLraLXLlBldK3P7I8sae7fsNTa', NULL, '2019-08-01 05:10:54', '2019-08-01 05:10:54'),
(7, 'app1test', 'a@a.com', NULL, '$2y$10$/cG75G3vTBreiaDEUHvSuu.pqJyOkagtdLvYx7nreN4tV.yBiCv5.', NULL, '2019-08-01 10:56:49', '2019-08-01 10:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `users_x`
--

CREATE TABLE `users_x` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_x`
--

INSERT INTO `users_x` (`id`, `name`, `password`, `email`, `token`, `expiry_date`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '', '2019-07-29 10:44:50', NULL, '2019-07-29 08:44:50', 0),
(10, 'jeff', '$2y$10$nCwZc.M2Eih252QBEcA2J.5.ff1HxW5lIbKzwmKU8OXpRjH8xGjaO', 'admin3@admin.com', NULL, NULL, '2019-07-30 05:46:39', '2019-07-30 05:46:39', 0);

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
  `status_id` int(11) NOT NULL,
  `expire_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_third_parties`
--

INSERT INTO `user_third_parties` (`id`, `user_id`, `platform_id`, `client_id`, `third_party_id`, `token`, `status_id`, `expire_date`, `created_at`, `updated_at`, `deleted`) VALUES
(68, 5, 46, 6, 5, 'YQR3vaGQARAAAAAAAAAAQ_pov6sM2ZkP0LITXw_0kjE', 1, '2019-08-01 08:46:31', '2019-08-01 08:46:31', '2019-08-01 08:46:31', 0),
(69, 1, 1, 1, 5, 'a436035c-2990-499e-bcfc-92b1758f23f2', 1, '2019-08-01 08:48:11', '2019-08-01 08:48:11', '2019-08-01 08:48:11', 0),
(70, 1, 12, 3, 5, 'YQR3vaGQARAAAAAAAAAARKcV2YnwTNWU-PHjjBtkAis', 1, '2019-08-01 08:48:54', '2019-08-01 08:48:54', '2019-08-01 08:48:54', 0),
(71, 1, 12, 1, 1, 'a0251bc8-830e-4d52-9319-96b8cb453680', 1, '2019-08-01 08:49:09', '2019-08-01 08:49:09', '2019-08-01 08:49:09', 0),
(72, 1, 1, 1, 3, '3737e5e0-7414-462a-8188-745e263e850b', 1, '2019-08-05 06:35:30', '2019-08-05 06:35:30', '2019-08-05 06:35:30', 0),
(73, 1, 2, 3, 5, 'YQR3vaGQARAAAAAAAAAARWrT4n7njxpIRuEw24TcpfA', 1, '2019-08-05 12:22:04', '2019-08-05 12:22:04', '2019-08-05 12:22:04', 0),
(74, 1, 2, 3, 3, '627e725f-4fe0-4daa-ac34-15b5ccabc0d0', 1, '2019-08-05 12:35:50', '2019-08-05 12:35:50', '2019-08-05 12:35:50', 0),
(75, 1, 2, 234, 4, '5d49b06c-c898-4586-8401-05a70a020804', 1, '2019-08-06 16:53:01', '2019-08-06 16:53:01', '2019-08-06 16:53:01', 0),
(76, 5, 5, 5, 4, '5d4a7964-8fd4-4b04-b4c8-05a70a020804', 1, '2019-08-07 07:10:30', '2019-08-07 07:10:30', '2019-08-07 07:10:30', 0);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_name` (`table_name`);

--
-- Indexes for table `third_parties`
--
ALTER TABLE `third_parties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_token` (`id_token`),
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_x`
--
ALTER TABLE `users_x`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `third_parties`
--
ALTER TABLE `third_parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `third_party_ratings`
--
ALTER TABLE `third_party_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `third_party_types`
--
ALTER TABLE `third_party_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_x`
--
ALTER TABLE `users_x`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_third_parties`
--
ALTER TABLE `user_third_parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
