-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 08:07 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE IF NOT EXISTS `buy` (
`purchase_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `pids` text NOT NULL,
  `total_amount` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `cid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`purchase_id`, `purchase_date`, `pids`, `total_amount`, `profit`, `cid`) VALUES
(1, '2012-11-02', '2,5,11', 6250, 850, 0),
(2, '2012-11-02', '2,5,11,8', 7250, 950, 0),
(3, '2012-11-02', '8,5,1', 46120, 5120, 0),
(4, '2012-11-02', '8,1', 2200, 300, 0),
(5, '2012-11-02', '1', 1200, 200, 0),
(6, '2012-11-02', '1,10,5', 123700, 12700, 0),
(7, '2012-11-02', '1,1', 12000, 2000, 0),
(8, '2012-11-02', '14', 1575, 175, 0),
(9, '2012-11-03', '14,13', 350, 38, 1),
(10, '2012-11-03', '13', 125, 13, 1),
(11, '2012-11-03', '18', 22, 6, 1),
(12, '2012-11-03', '13,19', 1275, 135, 0),
(13, '2012-11-03', '14,21', 2205, 35, 0),
(14, '2012-11-03', '41', 629, 90, 1),
(15, '2012-11-03', '39,21,25', 467, 114, 1),
(16, '2012-11-03', '19', 10, 2, 0),
(17, '2012-11-03', '17,25', 620, 100, 0),
(18, '2012-11-03', '23,16', 999, 209, 0),
(19, '2012-11-03', '26,16', 2300, 550, 1),
(20, '2012-11-03', '16,29', 33169, 2346, 1),
(21, '2012-11-03', '19', 50, 10, 0),
(22, '2012-11-03', '16', 355, 130, 0),
(23, '2012-11-10', '15,22', 520, 140, 0),
(24, '2012-11-10', '16', 128, 38, 0),
(25, '2012-11-10', '15', 420, 120, 3),
(26, '2012-11-10', '23', 200, 30, 3),
(27, '2012-11-12', '21', 180, 10, 0),
(28, '2012-11-12', '22,29', 32939, 2261, 3),
(29, '2012-11-14', '16,19', 684, 194, 3),
(30, '2013-02-11', '15,22', 604, 164, 0),
(31, '2013-03-01', '24', 100, 20, 2),
(32, '2013-04-13', '15', 42, 12, 0),
(33, '2013-04-13', '13', 375, -81, 0),
(34, '2013-04-22', '34', 2198, 444, 55),
(35, '2021-03-31', '51', 2000, -6200, 0),
(36, '2021-03-31', '13', 250, 22, 0),
(37, '2021-03-31', '51,52,47,35', 158648, -69990, 1),
(38, '2021-03-31', '52', 120350, -140650, 0),
(39, '2021-03-31', '25', 1350, 189, 1),
(40, '2021-03-31', '47', 10235000, -979000, 1),
(41, '2021-03-31', '51,52,39', 7948, -13852, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`cid` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `cjoin_date` date NOT NULL,
  `cmoney_spent` int(11) NOT NULL,
  `caddress` varchar(50) NOT NULL,
  `cmoney_spent_reset` int(5) NOT NULL,
  `cphone` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `first_name`, `last_name`, `cjoin_date`, `cmoney_spent`, `caddress`, `cmoney_spent_reset`, `cphone`) VALUES
(1, 'James', 'Doe', '2016-03-04', 10431585, '1995  Carriage Lane', 0, 145554780),
(2, 'Gregory', 'Lamont', '2017-06-01', 100, '1204  Cabell Avenue', 0, 974544520),
(3, 'Ian', 'McKenzie', '2013-07-11', 34243, '2346  Peck Court', 0, 124577780);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `manager_id` int(11) NOT NULL,
`dept_id` int(5) NOT NULL,
  `dept_name` varchar(40) NOT NULL,
  `manager_start_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`manager_id`, `dept_id`, `dept_name`, `manager_start_date`) VALUES
(1, 1, 'Books', '2013-03-09'),
(1, 2, 'Electronics', '2012-10-31'),
(1, 3, 'Clothes', '2012-10-31'),
(0, 4, 'Household', '2012-10-31'),
(1, 5, 'Furniture', '2012-10-31'),
(1, 6, 'Handicraft', '2012-11-03'),
(1, 7, 'Toys', '2012-11-12'),
(1, 8, 'Food', '2012-10-31'),
(19, 9, 'Demo Department', '2021-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
`id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `salary` int(8) NOT NULL,
  `phone_number` int(12) NOT NULL,
  `address` varchar(60) NOT NULL,
  `uid` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `dob` date NOT NULL,
  `end_date` date NOT NULL DEFAULT '0000-00-00',
  `perks` int(11) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`first_name`, `last_name`, `id`, `dept_id`, `salary`, `phone_number`, `address`, `uid`, `join_date`, `dob`, `end_date`, `perks`, `admin`) VALUES
('Owner', 'Own', 1, 0, 50000, 99999999, 'H.no12, Example Nagar', 78945, '2012-10-31', '1992-10-01', '0000-00-00', 0, 2),
('Hayward', 'Strm', 2, 1, 50000, 99994444, 'L-502', 11, '2012-10-31', '1992-12-11', '0000-00-00', 0, 1),
('Deborah', 'James', 11, 4, 25000, 44889922, 'House #39, Gandhi Nagar, Hyderabad', 22889, '2012-11-03', '1992-04-02', '0000-00-00', 0, 1),
('Harry', 'Denn', 19, 0, 35000, 984545441, 'Blecker St', 69, '2021-03-31', '1992-10-15', '0000-00-00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
`id` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `id`, `admin`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1, 2),
('pramodh', '1952a01898073d1e561b9b4f2e42cbd7', 2, 1),
('christine', '5f4dcc3b5aa765d61d8327deb882cf99', 4, 1),
('sam', '5f4dcc3b5aa765d61d8327deb882cf99', 7, 0),
('steeve', '5f4dcc3b5aa765d61d8327deb882cf99', 8, 1),
('bruno', '5f4dcc3b5aa765d61d8327deb882cf99', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_from`
--

CREATE TABLE IF NOT EXISTS `orders_from` (
  `status` tinyint(2) NOT NULL,
`order_id` int(11) NOT NULL,
  `department_id` int(5) NOT NULL,
  `pid` int(11) NOT NULL,
  `sid` int(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(11) NOT NULL,
  `cost_price` int(7) NOT NULL,
  `supplier_id` int(6) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `product_type` int(11) NOT NULL,
  `market_price` int(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cost_price`, `supplier_id`, `product_name`, `quantity`, `product_type`, `market_price`) VALUES
(13, 125, 5, 'Dexter', 398, 4, 114),
(16, 71, 15, 'Pride and Prejudice', 48, 4, 45),
(21, 20, 15, 'Five Point Someone', 79, 1, 17),
(23, 20, 15, 'Gulliver''s Travels', 20, 1, 17),
(25, 50, 5, 'Game of Thrones', 1, 1, 43),
(31, 450, 13, 'GuBurn Toaster TT390', 7, 2, 377),
(33, 399, 13, 'Kunchua Electric Iro', 30, 2, 279),
(34, 1099, 13, 'LG Rice Cooker  RC48', 8, 2, 877),
(35, 6500, 16, 'Nike Jacket JK3390R', 14, 3, 12000),
(37, 599, 16, 'Levis Jeans RF390F34', 4, 3, 430),
(39, 399, 16, 'Reebok Track RT101B3', 1, 3, 250),
(40, 659, 16, 'Levis Jeans SF30B34', 7, 3, 499),
(47, 115000, 13, 'Apple iphone X', 10, 2, 126000),
(48, 450, 5, 'Harry Potter', 100, 1, 500),
(51, 1000, 17, 'Long Hoodie', 40, 3, 4100),
(52, 4150, 17, 'DemoProduct', 29, 6, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `discount` int(3) NOT NULL,
  `valid_upto` date NOT NULL,
`promo_code` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`discount`, `valid_upto`, `promo_code`, `count`) VALUES
(25, '2021-01-14', 2, 1),
(10, '2022-04-01', 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `sdealer` varchar(20) NOT NULL,
  `semail` varchar(40) NOT NULL,
`sid` int(11) NOT NULL,
  `saddress` varchar(50) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `sphone` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sdealer`, `semail`, `sid`, `saddress`, `sname`, `sphone`) VALUES
('Gordon Food Service', 'gorderlf00ds@gmail.com', 5, 'Wyoming, MI', 'John Smith', 145557850),
('Siysco Corp', 'macvoy@sisyco.com', 11, 'Houston, TX', 'Jame Macvoy', 786969696),
('Keyheey Distributors', 'moorestep@fail.com', 13, 'Naperville, IL', 'Stephen Moore', 2147483647),
('Reynhert Services', 'clancy69@gmail.com', 15, 'Chicago, IL', 'Tommy Clancy', 1796969690),
('MC Factory Outlet', 'mcfact@gmail.com', 16, 'Rosemont, IL', 'Thomas Eddie', 258785452),
('Bowerr Suppliers', 'martin@supp.com', 17, 'Hope Street', 'Martin Bowerr', 2267);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `p_name` varchar(40) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
 ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`cid`), ADD UNIQUE KEY `cphone` (`cphone`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_from`
--
ALTER TABLE `orders_from`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
 ADD PRIMARY KEY (`promo_code`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`sid`), ADD UNIQUE KEY `sphone` (`sphone`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `dept_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders_from`
--
ALTER TABLE `orders_from`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
MODIFY `promo_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
