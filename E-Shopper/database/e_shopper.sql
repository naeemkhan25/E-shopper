-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2018 at 08:55 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_shopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` text COLLATE utf32_unicode_ci NOT NULL,
  `email_address` varchar(40) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `email_address`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `status`) VALUES
(4, 'Computer', 'Dell Computer					', 1),
(5, 'Water', 'Mum waterr												', 1),
(6, 'Fan', 'Japan Fan', 1),
(7, 'Sports', 'I like it most.', 1),
(8, 'clothos', 'Black color clothos', 1),
(9, 'Mobile', 'this is very needed for us', 1),
(10, 'Electrical Things', 'it\"s good', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `password`, `customer_district`, `customer_address`) VALUES
(1, 'Naeem', '01999999', 'naeem@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Pabna', 'Address'),
(2, 'amilnul', '01823333333', 'ami@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'feni', 'dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturer`
--

CREATE TABLE `tbl_manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_name` text COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer_description` text COLLATE utf8_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_manufacturer`
--

INSERT INTO `tbl_manufacturer` (`manufacturer_id`, `manufacturer_name`, `manufacturer_description`, `publication_status`) VALUES
(1, 'Oppo', 'Made in India																									', 1),
(2, 'Samsung', 'i use this phone', 1),
(3, 'Easy T_Shirt', 'I bought this t_shirt', 1),
(4, 'Rebook', '  i like this bat', 1),
(5, 'National Fan', 'it has popularity in Bangladesh.', 1),
(6, 'SS bat', 'Babu like this bat.', 1),
(7, 'Boom Boom bats', 'Pakistani BAt', 1),
(8, 'Kinle', 'this is good', 1),
(9, 'Laptop', 'this is a good laptop', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` float(10,2) NOT NULL,
  `order_status` varchar(15) NOT NULL DEFAULT 'pending',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_quantity` int(7) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` varchar(16) NOT NULL,
  `payment_status` varchar(30) NOT NULL DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `product_sku` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `manufacturer_id`, `product_price`, `stock_quantity`, `product_sku`, `product_short_description`, `product_long_description`, `product_image`, `product_status`) VALUES
(1, 'Bat', 7, 6, '2000.00', 10, 'pieces', 'This Bat is needed for me for playing cricket', 'For playing cricket', 'photos/ssbats.jpg', 1),
(2, 'Bat', 7, 7, '1500.00', 5, 'pieces', 'I like it because of Shahid Afridi use this bat', 'playing', 'photos/boom_bats.jpg', 1),
(3, 'Kinle water', 5, 8, '20.00', 10, 'pieces', 'this product is good.this product is good.this product is good.this product is good.', 'this product is good.this product is good.', 'photos/download.jpg', 1),
(4, 'Acer', 4, 9, '47000.00', 5, 'pieces', 'Black and red mix color', 'Black and red mix color.Black and red mix colorBlack and red mix color\r\n', 'photos/acer.jpg', 1),
(5, 'Fan', 6, 5, '2500.00', 5, 'pieces', 'this fan has a big popularity in Bangladesh.', 'this fan has a big popularity in Bangladesh.this fan has a big popularity in Bangladesh.', 'photos/electric_fans..jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(11) NOT NULL,
  `customer_name` varchar(256) NOT NULL,
  `customer_phone` varchar(30) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_district` varchar(30) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_district`, `customer_address`) VALUES
(1, 'Naeem', '01999999', 'naeem@gmail.com', 'Pabna', 'Address'),
(2, 'amilnul', '01823333333', 'ami@gmail.com', 'feni', 'dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_cart`
--

CREATE TABLE `tbl_temp_cart` (
  `cart_id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_temp_cart`
--

INSERT INTO `tbl_temp_cart` (`cart_id`, `session_id`, `product_id`, `product_name`, `product_price`, `product_image`, `quantity`) VALUES
(1, 'gp01q1vpefeibjac65oq52tqld', 3, 'Kinle water', 20, 'photos/download.jpg', 2),
(4, 'dajpas7p8fqneg9gllfv0dokts', 3, 'Kinle water', 20, 'photos/download.jpg', 3),
(5, 'dajpas7p8fqneg9gllfv0dokts', 5, 'Fan', 2500, 'photos/electric_fans..jpg', 1),
(6, 'dajpas7p8fqneg9gllfv0dokts', 1, 'Bat', 2000, 'photos/ssbats.jpg', 1),
(7, 'sjsdhrv13k5b6psbm1vktp23s4', 4, 'Acer', 47000, 'photos/acer.jpg', 1),
(8, 'sjsdhrv13k5b6psbm1vktp23s4', 5, 'Fan', 2500, 'photos/electric_fans..jpg', 5),
(9, 'sjsdhrv13k5b6psbm1vktp23s4', 1, 'Bat', 2000, 'photos/ssbats.jpg', 5),
(11, '425g9emkv267krtekho05r331s', 3, 'Kinle water', 20, 'photos/download.jpg', 1),
(12, '7r4pqbsmndr2vjjgfaleurs6pb', 3, 'Kinle water', 20, 'photos/download.jpg', 1),
(13, 'qnkim7njr3b6msh9thkpmpo54s', 3, 'Kinle water', 20, 'photos/download.jpg', 1),
(14, 'qhkaim4h5mop1555n963pepb05', 1, 'Bat', 2000, 'photos/ssbats.jpg', 1),
(15, 'qhkaim4h5mop1555n963pepb05', 2, 'Bat', 1500, 'photos/boom_bats.jpg', 1),
(16, 'qhkaim4h5mop1555n963pepb05', 4, 'Acer', 47000, 'photos/acer.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_temp_cart`
--
ALTER TABLE `tbl_temp_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_temp_cart`
--
ALTER TABLE `tbl_temp_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
