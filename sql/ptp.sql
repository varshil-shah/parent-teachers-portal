-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 08:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
--
  -- Database: `ptp`
  --
  -- --------------------------------------------------------
  --
  -- Table structure for table `email_send`
  --
  CREATE TABLE `email_send` (
    `id` int(255) NOT NULL,
    `uniqueId` int(255) NOT NULL,
    `title` varchar(500) NOT NULL,
    `message` varchar(2000) NOT NULL,
    `users` varchar(1500) NOT NULL,
    `date` varchar(255) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
  -- Dumping data for table `email_send`
  --
  -- --------------------------------------------------------
  --
  -- Table structure for table `notice`
  --
  CREATE TABLE `notice` (
    `nid` int(255) NOT NULL,
    `uniqueId` int(255) NOT NULL,
    `title` varchar(255) NOT NULL,
    `message` varchar(2000) NOT NULL,
    `date` varchar(255) NOT NULL,
    `pdfFile` varchar(255) NOT NULL,
    `pageName` varchar(255) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
  -- Dumping data for table `notice`
  --
  -- --------------------------------------------------------
  --
  -- Table structure for table `signup`
  --
  CREATE TABLE `signup` (
    `id` int(255) NOT NULL,
    `uniqueId` int(255) NOT NULL,
    `fullName` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `role` varchar(255) NOT NULL,
    `otp` int(255) NOT NULL,
    `status` varchar(255) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
  -- Dumping data for table `signup`
  --
  --
  -- Indexes for dumped tables
  --
  --
  -- Indexes for table `email_send`
  --
ALTER TABLE
  `email_send`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `notice`
  --
ALTER TABLE
  `notice`
ADD
  PRIMARY KEY (`nid`);
--
  -- Indexes for table `signup`
  --
ALTER TABLE
  `signup`
ADD
  PRIMARY KEY (`id`, `uniqueId`);
--
  -- AUTO_INCREMENT for dumped tables
  --
  --
  -- AUTO_INCREMENT for table `email_send`
  --
ALTER TABLE
  `email_send`
MODIFY
  `id` int(255) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 19;
--
  -- AUTO_INCREMENT for table `notice`
  --
ALTER TABLE
  `notice`
MODIFY
  `nid` int(255) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
  -- AUTO_INCREMENT for table `signup`
  --
ALTER TABLE
  `signup`
MODIFY
  `id` int(255) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
COMMIT;
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
