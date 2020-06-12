-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2018 at 02:22 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruitshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_number` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `customer_account` varchar(100) NOT NULL,
  `paid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_number`, `address`, `customer_account`, `paid`, `timestamp`) VALUES
(14, 'umair', '03137800039', 'kamalaya', '2228555358125', 0, '2018-01-08 09:05:41'),
(15, 'manzar', '03452255664', 'jhang', '252548522455', 0, '2018-01-08 09:06:37'),
(17, 'umair Rana', '03007563225', 'Islamabad', '332654282', 0, '2018-01-08 09:09:38'),
(18, 'usaman mehmood', '03034578796', 'faisalabad', '54487985632121', 0, '2018-01-08 09:55:51'),
(19, 'naveed ran', '32423424', 'gujaranwalla', '243032490-23940-', 0, '2018-01-11 16:24:20'),
(20, 'naveed ran', '32423424', 'gujaranwalla', '243032490-23940-', 0, '2018-01-11 16:26:59'),
(21, 'umar', '03035869789', 'Gujranwala', '5468985623564', 0, '2018-01-11 16:33:44'),
(22, 'umar', '03035869789', 'Gujranwala', '5468985623564', 0, '2018-01-11 16:38:33'),
(23, 'umer', '952908825', '9285903852', '8530925894', 2400, '2018-01-11 16:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `delivered`
--

CREATE TABLE `delivered` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_number` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `customer_account` varchar(200) NOT NULL,
  `postman` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivered`
--

INSERT INTO `delivered` (`id`, `customer_name`, `customer_number`, `address`, `customer_account`, `postman`, `datetime`) VALUES
(1, 'naveed', '03034766669', 'fasalabad', '655656985623', 'naveed', '2018-01-08 04:13:02'),
(2, 'hassam', '65532262', 'faisalabad', '875412245522', 'umar  saikhu', '2018-01-08 09:17:20'),
(3, 'hassam', '65532262', 'faisalabad', '875412245522', 'naveed', '2018-01-08 09:17:34'),
(4, 'hassam', '65532262', 'faisalabad', '875412245522', 'naveed', '2018-01-08 09:56:29'),
(5, 'umair', '03137800039', 'kamalaya', '2228555358125', 'naveed', '2018-01-08 10:05:08'),
(6, 'umair', '03137800039', 'kamalaya', '2228555358125', 'naveed', '2018-01-11 18:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `fruits`
--

CREATE TABLE `fruits` (
  `id` int(11) NOT NULL,
  `fruit_name` varchar(100) NOT NULL,
  `fruit_type` varchar(50) NOT NULL,
  `fruit_price` int(11) NOT NULL,
  `fruit_img` varchar(200) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`id`, `fruit_name`, `fruit_type`, `fruit_price`, `fruit_img`, `admin_name`, `timestamp`) VALUES
(1, 'Apple', 'Fresh Fruit', 200, 'diet3-54x64.png', 'naveed', '2018-01-06 13:29:01'),
(3, 'Banana', 'Fresh Fruit', 120, 'ad1-2.jpg', 'naveed', '2018-01-06 13:30:13'),
(4, 'Orange', 'Fresh Fruit', 130, 'fruit_02-250x250.jpg', 'naveed', '2018-01-06 13:37:18'),
(5, 'Almond', 'Dry Fruit', 458, 'AN115-Almonds-732x549-thumb.jpg', 'naveed', '2018-01-06 13:39:07'),
(6, 'Pista', 'Dry Fruit', 1100, 'AN115-Almonds-732x549-thumb.jpg', 'naveed', '2018-01-07 15:49:38'),
(7, 'strawbery', 'Fresh Fruit', 250, 'fruit_01-400x400.jpg', 'naveed', '2018-01-08 04:36:27'),
(8, 'wallnet', 'Dry Fruit', 1500, 'images (6).jpg', 'naveed', '2018-01-08 05:56:22'),
(9, 'pista', 'Dry Fruit', 5000, 'images (2).jpg', 'naveed', '2018-01-08 05:57:13'),
(10, 'Angeer', 'Dry Fruit', 1300, 'images (4).jpg', 'naveed', '2018-01-08 05:57:41'),
(11, 'kaju', 'Dry Fruit', 900, 'images (7).jpg', 'naveed', '2018-01-08 05:59:01'),
(12, 'kishmish', 'Dry Fruit', 600, 'images (3).jpg', 'naveed', '2018-01-08 05:59:21'),
(13, 'Date', 'Dry Fruit', 1500, 'images (5).jpg', 'naveed', '2018-01-08 05:59:58'),
(14, 'peanut', 'Dry Fruit', 200, 'download.jpg', 'naveed', '2018-01-08 06:02:33'),
(15, 'Watermelon', 'Fresh Fruit', 150, 'images (8).jpg', 'naveed', '2018-01-08 06:16:26'),
(16, 'Grapes', 'Fresh Fruit', 400, 'fruit_35-400x400.jpg', 'naveed', '2018-01-08 06:17:54'),
(17, 'Gauwa', 'Fresh Fruit', 100, 'fruit_11-250x250.jpg', 'naveed', '2018-01-08 06:19:12'),
(18, 'Nashpati', 'Fresh Fruit', 200, 'fruit_24-400x400.jpg', 'naveed', '2018-01-08 06:19:58'),
(19, 'Mango', 'Fresh Fruit', 300, 'download (2).jpg', 'naveed', '2018-01-08 06:23:38'),
(21, 'Chaini apple', 'Fresh Fruit', 785, 'fruit_10-250x250.jpg', 'naveed', '2018-01-11 17:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `img`, `timestamp`) VALUES
(1, 'naveed', '$2y$10$QjtCU50zJnURK8IFffst7e.SAIyA4c16gAZrIusXQtz9kXaeqrQLq', 'FB_IMG_1440930802437.jpg', '2018-01-06 12:40:44'),
(6, 'Umar', '$2y$10$dbMyVMrTELmGBurV.bgmOOcDoetZJJRnyvT9rhoTwQz2ov4VBQr7y', 'IMG_20171017_213458.jpg', '2018-01-08 09:12:58'),
(7, 'umar  saikhu', '$2y$10$jR0h5hJ0kTeLZOvAj8x9IuY5pw0wOnj7I.GnLxmW5ZRcdYbrwh/ia', 'B612_20170318_101028.jpg', '2018-01-08 09:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_request`
--

CREATE TABLE `user_request` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivered`
--
ALTER TABLE `delivered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_request`
--
ALTER TABLE `user_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `delivered`
--
ALTER TABLE `delivered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_request`
--
ALTER TABLE `user_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
