-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 03:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-travel-prachin`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_table`
--

CREATE TABLE `article_table` (
  `id_article` int(10) NOT NULL,
  `id_type_travel` int(10) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `pic_topic` varbinary(255) NOT NULL,
  `detail` longtext NOT NULL,
  `view_count` int(100) NOT NULL,
  `data_create` date NOT NULL DEFAULT current_timestamp(),
  `data_edit` date NOT NULL DEFAULT current_timestamp(),
  `status` int(10) NOT NULL,
  `google_link` text NOT NULL,
  `location` text NOT NULL,
  `location_price` text NOT NULL,
  `face_book_name` text NOT NULL,
  `facebook_link` text NOT NULL,
  `time_open` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_table`
--

CREATE TABLE `news_table` (
  `id_news` int(11) NOT NULL,
  `topic_news` varchar(255) NOT NULL,
  `pic_topic` varbinary(255) NOT NULL,
  `detail` longtext NOT NULL,
  `view_count` int(100) NOT NULL,
  `data_create` date NOT NULL DEFAULT current_timestamp(),
  `data_edit` date NOT NULL DEFAULT current_timestamp(),
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_travel_table`
--

CREATE TABLE `type_travel_table` (
  `id_type_travel` int(10) NOT NULL,
  `name_travel` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id_user` int(10) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `lastname_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` longtext NOT NULL,
  `status_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_table`
--
ALTER TABLE `article_table`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `news_table`
--
ALTER TABLE `news_table`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `type_travel_table`
--
ALTER TABLE `type_travel_table`
  ADD PRIMARY KEY (`id_type_travel`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_table`
--
ALTER TABLE `article_table`
  MODIFY `id_article` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_table`
--
ALTER TABLE `news_table`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_travel_table`
--
ALTER TABLE `type_travel_table`
  MODIFY `id_type_travel` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
