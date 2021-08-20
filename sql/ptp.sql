-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 08:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_send`
--

INSERT INTO `email_send` (`id`, `uniqueId`, `title`, `message`, `users`, `date`) VALUES
(1, 1147335206, 'Summer Vacation for 40 days ', 'Nibh venenatis cras sed felis eget. Ullamcorper dignissim cras tincidunt lobortis. Sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec. Mi quis hendrerit dolor magna eget est lorem ipsum dolor. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula. Justo donec enim diam vulputate ut pharetra sit. Suspendisse potenti nullam ac tortor vitae purus faucibus. Elementum nibh tellus molestie nunc', 'fifovah896@5sword.com', '20 Aug, 2021'),
(18, 1147335206, 'College ends from 1st of november', 'Tincidunt augue interdum velit euismod. Amet nisl suscipit adipiscing bibendum. Sed lectus vestibulum mattis ullamcorper velit sed. Fames ac turpis egestas integer eget aliquet nibh praesent tristique.', 'fifovah896@5sword.com,daxilom157@bushdown.com', '21 Aug, 2021');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`nid`, `uniqueId`, `title`, `message`, `date`, `pdfFile`, `pageName`) VALUES
(1, 1147335206, 'College starts from 1st of september', 'Leo duis ut diam quam nulla porttitor massa id neque. At consectetur lorem donec massa sapien. Pellentesque sit amet porttitor eget dolor morbi non arcu risus. Nisl pretium fusce id velit ut. At in tellus integer feugiat. Ac tortor vitae purus faucibus ornare suspendisse sed nisi. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Vivamus at augue eget arcu dictum varius duis at consectetur.', '20 Aug, 2021', '1629481958daily-report-01-08-2021.pdf', 'announcements');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `uniqueId`, `fullName`, `email`, `password`, `role`, `otp`, `status`) VALUES
(1, 1147335206, 'Varshil Shah', 'varshil.as@somaiya.edu', '$2y$10$.9rvF5k6GSfN3a3PXQ6QS.BynmGJh9ZnY..c1LT8KYXPja1.QZVVe', 'teacher', 361984, 'active'),
(2, 294310025, 'Random Person', 'fifovah896@5sword.com', '$2y$10$4tfL3puljOF.nr7OShI2tO2t3EyocUDQqXYRGsMXxnzbkWNvn6Eom', 'parent', 842659, 'active'),
(3, 1055968346, 'Someone Else', 'daxilom157@bushdown.com', '$2y$10$TyMGieskT27tgv.JRN3gG.tN0fc3IoZsfvak4ZrFeNeC9.b4oHJSu', 'parent', 951830, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_send`
--
ALTER TABLE `email_send`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`,`uniqueId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_send`
--
ALTER TABLE `email_send`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `nid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
