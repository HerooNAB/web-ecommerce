-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 07:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `pass`, `username`) VALUES
(21, 'admin', 'admin'),
(23, '123', 'binh');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CateID` int(11) NOT NULL,
  `CategoryName` varchar(150) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CateID`, `CategoryName`, `Description`) VALUES
(1, 'Điện thoại', 'ĐT'),
(2, 'Máy tính bảng', 'MTB'),
(3, 'Laptop', 'LT'),
(4, 'test', 'testDS');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `ProductID`, `Quantity`, `Name`) VALUES
(4, 3, 1, ''),
(5, 8, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `ShipName` varchar(150) NOT NULL,
  `ShipAddress` varchar(250) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderproduct`
--

INSERT INTO `orderproduct` (`OrderID`, `OrderDate`, `Phone`, `ShipName`, `ShipAddress`, `Status`) VALUES
(2, '2011-04-21 00:00:00', '133', 'hung', '1313', 1),
(3, '2011-04-21 00:00:00', '131313', 'hung', '13', 1),
(4, '2011-04-21 00:00:00', '131', 'hung', '13', 0),
(5, '2011-04-21 00:00:00', '123', 'hung', '1313', 0),
(6, '2011-04-21 00:00:00', '131313', 'hung', '1313', 0),
(7, '2011-04-21 00:00:00', '12', 'hung', '1313', 0),
(8, '2011-04-21 00:00:00', '131313', 'hung', '1313', 0),
(9, '2011-04-21 00:00:00', '131313', 'hung', '1313', 0),
(10, '2012-04-21 00:00:00', '131313', 'hung', '1313', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `CateID` int(11) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Picture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `CateID`, `Price`, `Quantity`, `Description`, `Picture`) VALUES
(22, 'Samsung Note 20 Utra', 3, 131, 2, '131', './uploads/20210412081820laptop-asus-gaming-rog-zephyrus-g14-ga401ii_5__1.jpg '),
(28, 'Galaxy S7', 1, 23, 21, '131', './uploads/20210412082649samsung-galaxy-a72-30.jpg '),
(29, 'iPhone 11', 1, 1, 2, 'iPhone 11', './uploads/20210412082656xiaomi-redmi-note-10_1.jpg '),
(30, 'Samsung GaLaxy S8', 1, 1, 2, 'Samsung GaLaxy S8', './uploads/20210412082712layer_20.jpg '),
(31, 'Samsung A51', 1, 1, 3131, 'Samsung A51', './uploads/20210412082705xiaomi-redmi-note-10_1.jpg '),
(32, 'Máy tính bảng A51', 3, 131, 2, '131', './uploads/20210412081809mbp-silver-select-202011_4.jpg '),
(33, 'Galaxy S10', 1, 23, 21, '131', './uploads/20210412082722iphone-12-pro-max_1__7.jpg '),
(34, 'iPhone 9', 1, 1, 2, 'iPhone 11', './uploads/20210412082829iphone-12-pro-max_1__7.jpg '),
(35, 'Samsung GaLaxy S6', 1, 1, 2, 'Samsung GaLaxy S8', './uploads/20210412082802iphone-12_2__3.jpg '),
(36, 'Samsung A59', 1, 1, 3131, 'Samsung A51', './uploads/20210412082750samsung-galaxy-a72-30.jpg '),
(37, 'Máy tính bảng Apple ', 3, 131, 2, '131', './uploads/20210412081833laptop_gaming_acer_nitro_5_an515-55-5923_nh.q7nsv.004__0004_layer_1.jpg '),
(38, 'Máy tính bảng A59', 3, 131, 2, '131', './uploads/20210412081935macbook-air-gold-select-201810_4.jpg '),
(39, 'Máy tính SamSun 7plus', 3, 131, 2, '131', './uploads/20210412082024mbp-silver-select-202011_4.jpg '),
(40, 'Máy tính bảng A13', 3, 131, 2, '131', './uploads/20210412081958laptop-lenovo-yoga-6-13are05_5__1.jpg '),
(41, 'Máy tính bảng Apple Air', 3, 131, 2, '131', './uploads/20210412082102macbook-air-gold-select-201810_4.jpg '),
(42, 'Máy tính bảng A71', 3, 131, 2, '131', './uploads/20210412081844laptop-lenovo-yoga-6-13are05_5__1.jpg '),
(43, 'Samsung Galaxy Tab S7 Plus', 2, 1, 2, 'Samsung Galaxy Tab S7 Plus', './uploads/20210412082350samsung-galaxy-tab-s7-plus-3.jpg'),
(44, 'Samsung Galaxy Tab S7', 2, 2, 3, 'Samsung Galaxy Tab S7', './uploads/20210412082422apple-ipad-pro-11-2020-wifi-128-gb.jpg'),
(45, 'iPad 10.2 2020 WiFi 32GB I', 2, 23, 32, 'iPad 10.2 2020 WiFi 32GB I', './uploads/20210412082902samsung-galaxy-tab-s7-plus-3.jpg '),
(46, 'Samsung Galaxy Tab A8 2019 (T295)', 2, 12, 2, 'Samsung Galaxy Tab A8 2019 (T295)', './uploads/20210412082529samsung-galaxy-tab-s7-1.jpg'),
(47, 'Samsung Galaxy Tab S6', 2, 1, 23, 'Samsung Galaxy Tab S6', './uploads/20210412082615ipad-2020-gray_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CateID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`ProductID`);

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CateID` (`CateID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CateID`) REFERENCES `category` (`CateID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
