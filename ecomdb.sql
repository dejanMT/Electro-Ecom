-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 07:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dejan_camilleri_swd42c_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_tbl`
--

CREATE TABLE `brand_tbl` (
  `brandId` int(11) NOT NULL,
  `brandPicture` varchar(255) NOT NULL,
  `brandName` varchar(55) NOT NULL,
  `brandDescription` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand_tbl`
--

INSERT INTO `brand_tbl` (`brandId`, `brandPicture`, `brandName`, `brandDescription`) VALUES
(20, 'resources/Uploads/Brands/SamsungLogo.png', 'Samsung', 'Samsung, South Korean company that is one of the world\'s largest producers of electronic devices. Samsung specializes in the production of a wide variety of consumer and industry electronics, includin'),
(21, 'resources/Uploads/Brands/AppleLogo.png', 'Apple', 'Apple Inc (Apple) designs, manufactures, and markets smartphones, tablets, personal computers (PCs), portable and wearable devices. The company also offers software and related services, accessories, '),
(22, 'resources/Uploads/Brands/XiaomiLogo.png', 'Xiaomi', 'Xiaomi is a consumer electronics and smart manufacturing company with smartphones and smart hardware connected by an IoT platform at its core.');

-- --------------------------------------------------------

--
-- Table structure for table `item_tbl`
--

CREATE TABLE `item_tbl` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(55) NOT NULL,
  `itemDescription` varchar(255) NOT NULL,
  `itemPrice` decimal(10,2) NOT NULL,
  `itemQuantity` int(5) NOT NULL,
  `itemPicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_tbl`
--

INSERT INTO `item_tbl` (`itemId`, `itemName`, `itemDescription`, `itemPrice`, `itemQuantity`, `itemPicture`) VALUES
(1, '4K Sony Camera', 'Alpha 7 III - Full-frame Mirrorless Interchangeable Lens Camera\r\n\r\nHybrid 24.2MP up to 10FPS, 6k oversmpled for 4K 30p, 5-axis stabilization', '400.00', 100, 'resources/Uploads/Products/04.jpg'),
(2, 'Alexa Home Assistant ', 'Amazon Alexa, also known simply as Alexa, is a virtual assistant technology largely based on a Polish speech synthesiser named Ivona, bought by Amazon in 2013. It was first used in the Amazon Echo smart speaker and the Echo Dot, Echo Studio, and Amazon Ta', '150.00', 4, 'resources/Uploads/Products/02.jpg'),
(3, 'Galaxy Watch-4 Classic', 'Make the most of every workout with Auto Workout Tracking. Stay motivated by connecting to live coaching sessions via your smartphone or to dynamic Group Challenges with your friends.', '299.99', 24, 'resources/Uploads/Products/09.jpg'),
(4, 'MAC pro', 'The MacBook is Apple\'s third laptop computer family, introduced in 2006. Prior laptops were the PowerBook and iBook. In 2015, new MacBooks featured Apple\'s Retina Display and higher resolutions, as well as the Force Touch trackpad that senses different pr', '599.99', 97, 'resources/Uploads/Products/11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `orderPrice` decimal(10,2) NOT NULL,
  `orderQuantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`orderId`, `userId`, `itemId`, `orderPrice`, `orderQuantity`) VALUES
(156, 10, 4, '599.99', 1),
(157, 10, 4, '599.99', 1),
(158, 10, 4, '599.99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `userId` int(11) NOT NULL,
  `userName` varchar(55) NOT NULL,
  `userSurname` varchar(55) NOT NULL,
  `userEmail` varchar(55) NOT NULL,
  `userNumber` varchar(55) NOT NULL,
  `userPicture` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`userId`, `userName`, `userSurname`, `userEmail`, `userNumber`, `userPicture`, `password`) VALUES
(10, 'Dejan', 'Camilleri', 'dejan2mt@gmail.com', '12345678', 'resources/Uploads/Profile/unnamed.jpg', '$2y$12$fX/lmyzfYfQR2B6S/poMMuoGeBKL8JydjrQZTESOwbMBX4wHkqcG6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `item_tbl`
--
ALTER TABLE `item_tbl`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `itemId` (`itemId`),
  ADD KEY `userId_2` (`userId`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `item_tbl`
--
ALTER TABLE `item_tbl`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `order_tbl_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `item_tbl` (`itemId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
