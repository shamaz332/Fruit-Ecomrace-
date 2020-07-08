-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2020 at 01:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
    `customer_amount` varchar(200) NOT NULL,
  `postman` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `img`, `timestamp`) VALUES
(1, 'hamza', 'hamza332', 'hamza.jpg', '2018-01-06 12:40:44'),
(6, 'shamaz', 'shamaz332', 'shamaz.png', '2018-01-08 09:12:58'),
(8, 'haris', '$2y$10$SP5cwHvOBEcdcBqn2L7gUefoGL0p42GeIait/itV61/aA96PJNaNu', 'haris.jpg', '2020-07-05 10:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_request`
--

CREATE TABLE `user_request` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `delivered`
--
ALTER TABLE `delivered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_request`
--
ALTER TABLE `user_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
