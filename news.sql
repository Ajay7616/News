-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 25, 2024 at 05:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `user_id`, `title`, `content`, `img`, `timestamp`) VALUES
(4, 19, 'FPIs inject Rs 11,366 cr in debt market in Aug, inflow surpasses Rs 1 trn', 'Foreign investors infused Rs 11,366 crore in the Indian debt market so far this month, pushing the net inflow tally in the debt segment to over the Rs 1-lakh-crore mark.\r\nForeign investors\' strong buying interest in the Indian debt market can be attribute', '/img/content_img/images.jpg', '2024-08-25 10:42:04'),
(5, 19, 'Economists predict diverging growth rates for India’s June quarter, range from 6% to 7%', 'MUMBAI: Ahead of the official release of June quarter growth numbers next week, economists have offered differing forecasts, with rating agency Icra pegging the lowest at 6% and German brokerage Duestche Bank at the highest at 7% and Goldman Sachs seeing ', '/img/content_img/istockphoto-623301456-612x612.jpg', '2024-08-25 10:45:32'),
(6, 19, 'India\'s Space Sector Adds $60 Billion To GDP, 4.7 Million Jobs In 10 Years: Report', 'New Delhi: The Indian space sector has in the last 10 years contributed $60 billion to GDP, as well as generated 4.7 million jobs in the country, according to a report.\r\nIt showed that in the last years, the country invested nearly $13 billion in the spac', '/img/content_img/isro-36-satellite-launch-1666453849.jpg', '2024-08-25 10:46:58'),
(7, 19, 'Unemployment, slow growth and more: The risks from RBI\'s \'high\' real interest rates', 'The minutes of the last Monetary Policy Committee (MPC) meeting held on August 8 indicate that at least two external members of the MPC disagreed with the majority view and the Reserve Bank of India (RBI) view. Dr Jayanth R Varma, a professor at the India', '/img/content_img/rbi-1716778280.jpg', '2024-08-25 10:48:08'),
(8, 19, 'Pooran Shocks Samson\'s IPL Teammate With 4 Consecutive Sixes In WI vs SA 1st T20I', 'Experienced West Indies batter Nicholas Pooran oozed his class with the bat, as he slammed a match-winning knock in the first T20I against South Africa at Brian Lara Stadium in Tarouba, Trinidad. \r\n\r\nChasing a challenging target of 175 runs, West Indies h', '/img/content_img/382538.jpg', '2024-08-25 10:50:19'),
(10, 19, 'Virat Kohli Pays A Rich Tribute To Shikhar Dhawan On X', 'On August 24, 2024, when Shikhar Dhawan announced his retirement from all forms of cricket, the cricketing world paused to reflect on his illustrious career. Among the many tributes that poured in, Virat Kohli stood out, not just for its eloquence but for', '/img/content_img/download.jpg', '2024-08-25 10:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(12) NOT NULL DEFAULT 'user',
  `img` varchar(550) NOT NULL,
  `last_login_time` timestamp NULL DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email_address`, `password`, `role`, `img`, `last_login_time`, `created_time`) VALUES
(19, 'ajay', 'u.ajaykumar7616@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user', '/img/profile_img/profile_imgprofile.jpeg', NULL, '2024-08-24 14:51:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
