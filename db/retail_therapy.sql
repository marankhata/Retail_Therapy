-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 09:34 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retail_therapy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CART_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `BOUGHTORNOT` int(11) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `SIZE` varchar(10) NOT NULL,
  `QUANTITY_BOUGHT` int(11) NOT NULL,
  `PAYMENT_CODE` varchar(100) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CART_ID`, `USER_ID`, `PRODUCT_ID`, `BOUGHTORNOT`, `DATE`, `SIZE`, `QUANTITY_BOUGHT`, `PAYMENT_CODE`, `STATUS`) VALUES
(61, 29, 23, 0, '2020-01-28 18:30:36', '', 0, '', 1),
(62, 29, 23, 0, '2020-01-28 18:30:38', '', 0, '', 0),
(63, 29, 23, 0, '2020-01-28 18:32:02', '', 0, '', 0),
(64, 29, 23, 0, '2020-01-28 18:32:04', '', 0, '', 0),
(65, 29, 23, 0, '2020-01-28 18:32:06', '', 0, '', 0),
(66, 29, 23, 0, '2020-01-28 18:32:08', '', 0, '', 0),
(67, 29, 23, 0, '2020-01-28 18:32:10', '', 0, '', 0),
(68, 29, 20, 0, '2020-01-28 18:32:17', '', 0, '', 0),
(69, 29, 20, 0, '2020-01-28 18:32:19', '', 0, '', 0),
(70, 29, 20, 0, '2020-01-28 18:32:21', '', 0, '', 2),
(71, 27, 22, 0, '2020-01-28 18:33:10', '', 0, '', 0),
(73, 27, 22, 0, '2020-01-28 18:33:15', '', 0, '', 0),
(75, 1, 22, 1, '2020-02-05 23:51:03', '', 1, '6343', 0),
(76, 1, 22, 1, '2020-02-05 23:51:37', '', 10, '6343', 0),
(77, 1, 22, 1, '2020-02-05 23:52:30', 'on', 126, '6343', 0),
(78, 1, 22, 0, '2020-02-05 23:54:40', 'on', 2, '', 0),
(79, 1, 22, 1, '2020-02-05 23:58:52', '', 5, '6343', 0),
(80, 1, 22, 0, '2020-02-05 23:59:37', '124', 4, '', 0),
(81, 1, 22, 1, '2020-02-06 00:01:08', '256', 55, '6343', 0),
(82, 1, 22, 1, '2020-02-06 00:13:58', '256', 2, '6343', 2),
(84, 1, 25, 0, '2020-03-01 21:21:07', '', 0, '', 0),
(85, 1, 25, 0, '2020-03-01 21:21:55', '44', 25, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_payment`
--

CREATE TABLE `cart_payment` (
  `PAYMENT_ID` int(11) NOT NULL,
  `PAYMENT_CODE` varchar(250) NOT NULL,
  `CART_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PAYMENT_METHOD` varchar(50) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `PHONE_NO` varchar(255) NOT NULL,
  `ACC_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `cart_payment`
--

INSERT INTO `cart_payment` (`PAYMENT_ID`, `PAYMENT_CODE`, `CART_ID`, `USER_ID`, `PAYMENT_METHOD`, `ADDRESS`, `PHONE_NO`, `ACC_NAME`) VALUES
(1, '', 3, 0, '', '', '', ''),
(2, '', 1, 0, '', '', '', ''),
(3, '4702', 0, 1, 'MPAMBA', 'hgf', '555', 'gghfg'),
(4, '3487', 0, 1, 'MO626', 'o', 'jk', 'j'),
(5, '3091', 0, 1, 'MO626', 'T', 'T', 'T'),
(6, '2720', 0, 1, 'MO626', 'O', '9', 'K'),
(7, '6343', 0, 1, 'MO626', 'K', '0', 'K');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CATEGORY` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CATEGORY_ID`, `CATEGORY`) VALUES
(4, 'TV'),
(5, 'Phones'),
(7, 'Laptops'),
(8, 'Cosmetics'),
(10, 'Unknown');

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE `label` (
  `LABEL_ID` int(11) NOT NULL,
  `LABEL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `label`
--

INSERT INTO `label` (`LABEL_ID`, `LABEL`) VALUES
(3, 'Samsung'),
(4, 'HP'),
(6, 'Apple'),
(7, 'Lenovo'),
(8, 'Hisense');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PRODUCT_ID` int(11) NOT NULL,
  `BRAND_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL,
  `LOCATION` varchar(50) NOT NULL,
  `AGE_RANGE` varchar(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PRICE` double NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `PHOTO` varchar(250) NOT NULL,
  `ENTRY_DATE` varchar(255) NOT NULL,
  `SIZES_AVAILABLE` varchar(100) NOT NULL,
  `DISCOUNT` double(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PRODUCT_ID`, `BRAND_ID`, `CATEGORY_ID`, `LOCATION`, `AGE_RANGE`, `NAME`, `PRICE`, `DESCRIPTION`, `QUANTITY`, `PHOTO`, `ENTRY_DATE`, `SIZES_AVAILABLE`, `DISCOUNT`) VALUES
(18, 7, 5, 'Blantyre', 'Blantyre', 'Lenovo tablet', 100000, 'Latest Lenovo Tablet', 25, 'uploads/product04.png', '2020-01-24 10:36:53', '', 0),
(20, 0, 5, 'Zomba', 'Blantyre', 'Xiaomi Redmi 5', 150000, 'Latest Xiaomi device', 40, 'uploads/b00d1a1f-63be-405a-8f4c-63d6d67b8b81.jpg', '2020-01-24 10:43:25', '', 0),
(22, 4, 7, 'Zomba', 'Blantyre', 'Hp Probook', 350000, 'HP laptop', 13, 'uploads/product03.png', '2020-01-24 10:48:12', '124,256', 0),
(23, 6, 5, 'Mzuzu', 'Blantyre', 'Ipad Air', 265000, 'IPAD', 30, 'uploads/IPad_Air_2_Wikipedia.png', '2020-01-24 10:49:15', '', 0),
(24, 3, 0, '', '', '', 0, '', 0, '', '', '', 0),
(25, 6, 8, 'Blantyre', 'Blantyre', 'gdfgfd', 444, 'jjj', 546, 'uploads/ftpdetailsnotshowing.PNG', '2020-03-01 18:35:34', '44,44', 44);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `REVIEW_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `REVIEW` varchar(250) NOT NULL,
  `REVIEW_DATE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`REVIEW_ID`, `USER_ID`, `PRODUCT_ID`, `REVIEW`, `REVIEW_DATE`) VALUES
(1, 1, 22, 'tony that guy', '33'),
(2, 1, 22, 'ksdjsdklnf dsfjsdnfjksdnfmösd', '33'),
(3, 0, 3, '', ''),
(4, 22, 0, 'gdfgdf', '2020-02-05 22:52:43'),
(5, 22, 0, 'that other guyyhh', '2020-02-05 22:54:18'),
(6, 1, 0, 'dsada', '2020-02-05 22:58:30'),
(7, 1, 22, 'wew', '2020-02-05 23:01:31'),
(8, 1, 22, 'olla', '2020-02-05 23:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(100) NOT NULL,
  `LAST_NAME` varchar(100) NOT NULL,
  `BIRTHDAY` varchar(100) NOT NULL,
  `CITY` varchar(50) NOT NULL,
  `CATEGORY` int(11) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE_NUMBER` varchar(20) NOT NULL,
  `PASSWORD` varchar(500) NOT NULL,
  `REGISTRATION_DATE` varchar(100) NOT NULL,
  `GENDER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `BIRTHDAY`, `CITY`, `CATEGORY`, `EMAIL`, `PHONE_NUMBER`, `PASSWORD`, `REGISTRATION_DATE`, `GENDER`) VALUES
(1, 'Admin', 'Retail', '2020-01-14', 'Blantyre', 1, 'admin@rt.com', '0885656565', '$2y$10$rJVgI7/4gLWyLFaDNafQfeaLkPK3qAmjF74Fje.IzuDDKva1kKTAK', '2020-01-20 16:37:36', 2),
(27, 'Maranatha', 'Nkhata', '1999-11-04', 'Blantyre', 1, 'marankhata1@gmail.com', '0999690332', '$2y$10$P4xvi7EP2M/85TtiF5VOSerot0Ain7G1NtIk1gnVI2BuKiwuPaxqG', '2020-01-24 08:46:48', 1),
(28, 'Taya', 'Gadama', '2000-02-20', 'Zomba', 1, 'tayagadama@gmail.com', '088864755', '$2y$10$XUPkXLH7dJJC8wjtrqeRsO3OZpQp4Prp3YFYpkg0KDY7.4js0vAVu', '2020-01-24 10:33:42', 2),
(29, 'Samantha', 'Mkandawire', '2000-01-02', 'Mzuzu', 1, 'sam@gmail.com', '0985648754', '$2y$10$FlRwUE4NDFpDaQYTS8vRD.n6fCRzud9jvJbG8WL3FOTdpjit7jeAW', '2020-01-27 08:08:22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_purchases`
--

CREATE TABLE `user_purchases` (
  `USER_PURCHASEID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `PURCHASE_DATE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CART_ID`);

--
-- Indexes for table `cart_payment`
--
ALTER TABLE `cart_payment`
  ADD PRIMARY KEY (`PAYMENT_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `label`
--
ALTER TABLE `label`
  ADD PRIMARY KEY (`LABEL_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`REVIEW_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `user_purchases`
--
ALTER TABLE `user_purchases`
  ADD PRIMARY KEY (`USER_PURCHASEID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CART_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `cart_payment`
--
ALTER TABLE `cart_payment`
  MODIFY `PAYMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `label`
--
ALTER TABLE `label`
  MODIFY `LABEL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `REVIEW_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_purchases`
--
ALTER TABLE `user_purchases`
  MODIFY `USER_PURCHASEID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
