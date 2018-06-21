-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2018 at 10:48 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(5, 'Admin Demo', 'demo@gmail.com', '123456', 'Riad.jpg', '33456693', 'Bangladesh', 'Developer', '  Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical  ');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` int(55) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `p_price`, `size`) VALUES
(3, '::1', 6, 1000, 'Small'),
(6, '::1', 12, 1500, 'Small');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Man', 'errgsdfg'),
(2, 'Woman', 'sdfgsg'),
(3, 'Kids', 'sfdgsdfg'),
(6, 'hfad', 'sfgsdgf');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(4, 7, 'Gold', '400', 'riadx ', 100, 15);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_confirm_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `customer_confirm_code`) VALUES
(1, 'Mahbubur Riad', 'demo@gmail.com', '123456', 'Bangladesh', 'Dhaka', '01711574805', 'Nikunja 2, Dhaka, Bangladesh', '28279338_1826096224114456_3886215294656287949_n.jpg', '127.0.0.1', ''),
(3, 'Mysha', 'mysha@gmail.com', '123456', 'Bangladesh', 'Dhaka', '34567890-', 'tfygiuhf adfasdf ', 'product-image (7).png', '::1', '145677'),
(4, 'Mahbubur Rahman', 'mahbubur.riad@outlook.com', '123456', 'Bangladesh', 'Dhaka', '234567890', 'jjj adfasdf', '2.jpg', '::1', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `due_amount` int(11) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 1, 4651, 995387318, 1, 'Small', '2018-06-09 18:44:02', 'Complete'),
(2, 1, 1073, 775260956, 1, 'Small', '2018-06-09 18:44:37', 'Complete'),
(3, 1, 8230, 1296941894, 2, 'Small', '2018-06-09 19:01:33', 'Complete'),
(4, 1, 4651, 1296941894, 3, 'Small', '2018-06-09 18:45:24', 'Complete'),
(5, 1, 5674, 57717093, 1, 'Small', '2018-06-12 11:14:49', 'Complete'),
(6, 1, 13854, 150998607, 3, 'Small', '2018-06-12 11:16:56', 'pending'),
(7, 4, 2095, 645138746, 1, 'Small', '2018-06-18 11:40:15', 'Complete'),
(8, 4, 2095, 655379613, 1, 'Small', '2018-06-18 11:43:51', 'pending'),
(9, 4, 4140, 655379613, 2, 'Small', '2018-06-18 11:43:51', 'pending'),
(10, 4, 459, 715909805, 1, 'Small', '2018-06-18 11:49:02', 'pending'),
(11, 4, 0, 1642421015, 3, 'Small', '2018-06-18 11:54:57', 'pending'),
(12, 4, 0, 1642421015, 1, 'Small', '2018-06-18 11:54:57', 'pending'),
(13, 4, 0, 1642421015, 3, 'Small', '2018-06-18 11:54:57', 'pending'),
(14, 4, 1559, 1396932563, 1, 'Small', '2018-06-18 11:57:50', 'pending'),
(15, 4, 2070, 1396932563, 1, 'Small', '2018-06-18 11:57:50', 'pending'),
(16, 4, 1252, 182811974, 3, 'Small', '2018-06-18 11:59:04', 'pending'),
(17, 4, 22520, 182811974, 4, 'Small', '2018-06-18 11:59:04', 'pending'),
(18, 1, 5163, 1311328606, 5, 'Small', '2018-06-18 18:45:43', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(2, 'Apex', 'no', '1.jpg'),
(3, 'Esktasy', 'no', '2.jpg'),
(4, 'Tanjim', 'no', '3.jpg'),
(5, 'Designer', 'no', '4.jpg'),
(6, 'Bata', 'yes', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` text NOT NULL,
  `code` int(11) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(1, 995387318, 4651, 'PayPal', 'demo@gmail.com', 555, '12/16/14'),
(2, 775260956, 1073, 'Bkash', 'demo@gmail.com', 55, '12/13/14'),
(3, 1296941894, 4651, 'Bkash', 'demo@gmail.com', 12, '12/14/16'),
(4, 1296941894, 4651, 'Bkash', 'demo@gmail.com', 1245, '12/16/14'),
(5, 1296941894, 8230, 'Visa/Master Card', 'demo@gmail.com', 22, '12/16/14'),
(6, 1296941894, 8230, 'Visa/Master Card', '125', 12, '12/11/14'),
(7, 1296941894, 8230, 'Bkash', '545', 51, '12/16/14'),
(9, 645138746, 2095, 'Dutch Bangla Mobile', '3456', 234, '14-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(11) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(1, 1, 995387318, '8', 1, 'Small', 'Complete'),
(2, 1, 775260956, '3', 1, 'Small', 'Complete'),
(3, 1, 1296941894, '5', 2, 'Small', 'Complete'),
(4, 1, 1296941894, '6', 3, 'Small', 'Complete'),
(5, 1, 57717093, '9', 1, 'Small', 'Complete'),
(7, 4, 645138746, '7', 1, 'Small', 'Complete'),
(8, 4, 655379613, '4', 1, 'Small', 'pending'),
(9, 4, 655379613, '7', 2, 'Small', 'pending'),
(10, 4, 715909805, '7', 1, 'Small', 'pending'),
(11, 4, 1642421015, '4', 3, 'Small', 'pending'),
(12, 4, 1642421015, '6', 1, 'Small', 'pending'),
(13, 4, 1642421015, '7', 3, 'Small', 'pending'),
(14, 4, 1396932563, '6', 1, 'Small', 'pending'),
(15, 4, 1396932563, '7', 1, 'Small', 'pending'),
(16, 4, 182811974, '7', 3, 'Small', 'pending'),
(17, 4, 182811974, '9', 4, 'Small', 'pending'),
(18, 1, 1311328606, '3', 5, 'Small', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `p_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`) VALUES
(3, 5, 3, '2018-06-08 08:43:02', 'Casio Fantastic Kids Watch', 'kids watch (1).jpg', 'kids watch (1).png', 'kids watch (2).jpg', 1000, '<p>Here is kids wafhtfxdbfjghcjghfgjfhogj fhgjhfjghdjfhjhgjfhgjhgjdhfjghjdrtgruighjjjjjj</p>', 'Casio'),
(4, 2, 2, '2018-06-08 17:09:16', 'skirt', 'product-image (6).png', 'product-image (8).jpg', 'product-image (9).jpg', 2000, '<p>100% soft cotton, summer wear, print, single colour&nbsp; size can be modified.</p>', 'Celabration'),
(5, 5, 1, '2018-06-08 17:14:54', 'Watch Titan formal wears for Gents', 'product-image (6).jpg', 'product-image (7).png', 'product-image (22).jpg', 4000, '<p>original ,waterproof and full guranted.</p>', 'Titan'),
(6, 7, 2, '2018-06-08 17:17:02', 'Original Cosmetic for Ladies', 'product-image (2).jxr', 'product-image (17).jpg', 'product-image (27).jpg', 1500, '<p>Guranteed original quality .</p>', 'cosmetic'),
(7, 3, 2, '2018-06-08 17:20:01', 'Palazo for Ladies', 'product-image (14).jpg', 'product-image (24).jpg', 'product-image (21).jpg', 2000, '<p>Silk, cotton summer wear.</p>', 'palazzo'),
(9, 4, 2, '2018-06-08 17:35:48', 'Gold plated Ring', '91JNpVHnrtL._UX395_.jpg', '71+Dnf3TiiL._UL1500_.jpg', 'product-img (14).jpg', 5500, '<p>100% Gold plated . Washable colour gurantee for lifetime.</p>', 'APON');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(11) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Apex', 'xxzvzxcv'),
(3, 'palazo', 'xcbxcvbxc'),
(5, 'Watch', 'vzxvzdcv'),
(6, 'Bag', 'dfgxf'),
(7, 'Makeup Kit', 'zxvzxcv'),
(11, 'Apex Mavric', 'zxcvzxcv');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'Slide Number 1', '1.jpg'),
(2, 'Slide Number 2', '2.png'),
(3, 'Slide Number 3', '3.jpg'),
(4, 'Slide Number 4', '4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
