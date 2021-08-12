-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2021 at 02:11 PM
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
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `nid` int(255) NOT NULL,
  `uniqueId` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `pdfFile` varchar(255) NOT NULL,
  `pageName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`nid`, `uniqueId`, `title`, `message`, `teacher`, `date`, `pdfFile`, `pageName`) VALUES
(5, 771614373, 'College starts from 1st of september', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Varun Shah', '5 Aug, 2021', '1628161209Chatapp Database.pdf', 'announcements'),
(7, 771614373, 'Sports starts from 10th October', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Varun Shah', '7 Aug, 2021', '1628334399otp-verification.pdf', 'notices'),
(9, 771614373, 'Summer Vacation for 20 days ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Varun Shah', '7 Aug, 2021', '1628346222Chatapp Database.pdf', 'announcements'),
(13, 737538041, 'Summer Vacation for 40 days ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Surya Sharma', '11 Aug, 2021', '1628673101daily-report-02-08-2021.pdf', 'announcements'),
(14, 673683744, 'Summer Vacation for 30 days ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Varshil Shah', '11 Aug, 2021', '1628680326daily-report-04-08-2021.pdf', 'announcements');

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
(1, 771614373, 'Varun Shah', 'varun.shah@somaiya.edu', '$2y$10$ovfQDz5EjjfFcotn9u0geu5P6mOd55kgf.6TViA/5rRk77JRRQee6', 'teacher', 656389, 'active'),
(2, 1625344615, 'Rohan Shah', 'rohan.as@somaiya.edu', '$2y$10$gLMTOMxPjXsAJRtsMduU.e9sPhN.zol.DViI6l0DIGXPBMV5q8s6S', 'parent', 857664, 'active'),
(3, 912841954, 'Karan Varma', 'karan.varma@somaiya.edu', '$2y$10$Q.KOX.UT2B2kamQNvTGL8.4Ej.TURfyILCGAXI5Kq.TZqhw/IVW6u', 'parent', 268442, 'active'),
(4, 737538041, 'Surya Sharma', 'surya.as@somaiya.edu', '$2y$10$bYI/elI1Qm6QzCpXVYBik.1tocKNbw80uASE52MHxuVDt.hD.uJL.', 'teacher', 993573, 'active'),
(7, 673683744, 'Varshil Shah', 'varshil.as@somaiya.edu', '$2y$10$C6FLJA3GPtvR.hRNHHNPr./38pVho.ZZn6UeQE1kZOHjz/0vK9lK.', 'teacher', 238655, 'active'),
(8, 897067994, 'Nishith Savla', 'nishith.savla@somaiya.edu', '$2y$10$pQ.QN4tz.X0zZcOvCZ63hupIHhKAcpvWKZ3k7AXH2ih8q6zwhm0Dq', 'parent', 270015, 'active');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `nid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
