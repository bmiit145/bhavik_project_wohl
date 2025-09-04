-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 08:39 AM
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
-- Database: `wohl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE `tblcity` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`id`, `name`, `sid`) VALUES
(1, 'East Godavari', 1),
(2, 'West Godavari', 1),
(3, 'Chittoor', 1),
(4, 'Krishna', 1),
(5, 'Guntur', 1),
(6, 'Papum Pare', 2),
(7, 'East Kameng', 2),
(8, 'West Kameng', 2),
(9, 'Changlang', 2),
(10, 'Tirap', 2),
(11, 'Kamrup Metropolitan', 3),
(12, 'Kamrup Rural', 3),
(13, 'Nagaon', 3),
(14, 'Dibrugarh', 3),
(15, 'Sonitpur', 3),
(16, 'Patna', 4),
(17, 'Muzaffarpur', 4),
(18, 'Gaya', 4),
(19, 'Bhagalpur', 4),
(20, 'Nalanda', 4),
(21, 'Raipur', 5),
(22, 'Durg', 5),
(23, 'Bilaspur', 5),
(24, 'Surguja', 5),
(25, 'Korba', 5),
(26, 'North Goa', 6),
(27, 'South Goa', 6),
(28, 'Ahmedabad', 7),
(29, 'Surat', 7),
(30, 'Vadodara', 7),
(31, 'Rajkot', 7),
(32, 'Bhavnagar', 7),
(33, 'Faridabad', 8),
(34, 'Gurugram', 8),
(35, 'Rohtak', 8),
(36, 'Hisar', 8),
(37, 'Sonipat', 8),
(38, 'Kangra', 9),
(39, 'Shimla', 9),
(40, 'Mandi', 9),
(41, 'Solan', 9),
(42, 'Una', 9),
(43, 'Srinagar', 10),
(44, 'Jammu', 10),
(45, 'Baramulla', 10),
(46, 'Anantnag', 10),
(47, 'Pulwama', 10),
(48, 'Ranchi', 11),
(49, 'East Singhbhum', 11),
(50, 'Dhanbad', 11),
(51, 'Bokaro', 11),
(52, 'Hazaribagh', 11),
(53, 'Bangalore Urban', 12),
(54, 'Bangalore Rural', 12),
(55, 'Belgaum', 12),
(56, 'Mysore', 12),
(57, 'Tumkur', 12),
(58, 'Thiruvananthapuram', 13),
(59, 'Ernakulam', 13),
(60, 'Thrissur', 13),
(61, 'Kozhikode', 13),
(62, 'Kollam', 13),
(63, 'Indore', 14),
(64, 'Bhopal', 14),
(65, 'Jabalpur', 14),
(66, 'Gwalior', 14),
(67, 'Ujjain', 14),
(68, 'Mumbai City', 15),
(69, 'Mumbai Suburban', 15),
(70, 'Thane', 15),
(71, 'Pune', 15),
(72, 'Nagpur', 15),
(73, 'Imphal West', 16),
(74, 'Imphal East', 16),
(75, 'East Khasi Hills', 17),
(76, 'West Garo Hills', 17),
(77, 'Aizawl', 18),
(78, 'Dimapur', 19),
(79, 'Kohima', 19),
(80, 'Khordha', 20),
(81, 'Cuttack', 20),
(82, 'Ganjam', 20),
(83, 'Puri', 20),
(84, 'Balasore', 20),
(85, 'Ludhiyan', 21),
(86, 'Amritsar', 21),
(87, 'Jalandhar', 21),
(88, 'Patiala', 21),
(89, 'Bathinda', 21),
(90, 'Jaipur', 22),
(91, 'Jodhpur', 22),
(92, 'Kota', 22),
(94, 'Bikaner', 22),
(95, 'Ajmer', 22),
(96, 'East Sikkim', 23),
(97, 'Chennai', 24),
(98, 'Coimbatore', 24),
(99, 'Chengalpattu', 24),
(100, 'Thiruvallur', 24),
(101, 'Madurai', 24),
(102, 'Hyderabad', 25),
(103, 'Rangareddy', 25),
(104, 'Medchal-Malkajgiri', 25),
(105, 'Warangal Urban', 25),
(106, 'Karimnagar', 25),
(107, 'West Tripura', 26),
(108, 'Gomati', 26),
(109, 'South Tripura', 26),
(110, 'Unakoti', 26),
(111, 'North Tripura', 26),
(112, 'Lucknow', 27),
(113, 'Kanpur', 27),
(114, 'Ghaziabad', 27),
(115, 'Agra', 27),
(116, 'Varanasi', 27),
(117, 'Dehradun', 28),
(118, 'Haridwar', 28),
(119, 'Nainital', 28),
(120, 'Udham Singh Singh', 28),
(121, 'Pauri Garhwal', 28),
(122, 'Kolkata', 29),
(123, 'North 24 Parganas', 29),
(125, 'South 24 Parganas', 29),
(126, 'Howrah', 29),
(127, 'Hooghly', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tblstate`
--

CREATE TABLE `tblstate` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstate`
--

INSERT INTO `tblstate` (`id`, `name`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jammu & Kashmir'),
(11, 'Jharkhand'),
(12, 'Karnataka'),
(13, 'Kerala'),
(14, 'Madhya Pradesh'),
(15, 'Maharashtra'),
(16, 'Manipur'),
(17, 'Meghalaya'),
(18, 'Mizoram'),
(19, 'Nagaland'),
(20, 'Odisha'),
(21, 'Punjab'),
(22, 'Rajasthan'),
(23, 'Sikkim'),
(24, 'Tamil Nadu'),
(25, 'Telangana'),
(26, 'Tripura'),
(27, 'Uttar Pradesh'),
(28, 'Uttarakhand'),
(29, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `added_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `brand_name`, `added_on`) VALUES
(1, 'Nike', '2023-11-02'),
(2, 'Puma', '2023-11-02'),
(3, 'Adidas', '2023-11-02'),
(4, 'GUCCI', '2023-11-02'),
(5, 'Campus', '2023-11-02'),
(6, 'Bata', '2023-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `categoryid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `added_date` DATETIME NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`categoryid`, `cname`, `added_date`) VALUES
(1, 'Men', '2023-12-07'),
(2, 'Women', '2023-12-07'),
(3, 'kids', '2023-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `id` int(11) NOT NULL,
  `color_name` varchar(200) NOT NULL,
  `added_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`id`, `color_name`, `added_on`) VALUES
(1, 'Blue', '2023-11-03'),
(2, 'Red', '2023-11-03'),
(5, 'Purple', '2023-11-03'),
(6, 'White', '2023-11-03'),
(7, 'Black', '2023-11-03'),
(8, 'Brown', '2023-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `feedback`, `user_id`) VALUES
(1, 'Good Products Delivered ', 2),
(2, 'Product is good quality or condition ,\r\nYour Delivery service is good.', 3),
(3, 'gcffcdfgvfdcghgvf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `amount` int(20) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payer_email` varchar(40) DEFAULT NULL,
  `contact_no` bigint(20) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `payment_date` datetime DEFAULT current_timestamp(),
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `user_id`, `fname`, `lname`, `amount`, `transaction_id`, `order_id`, `payer_email`, `contact_no`, `address`, `payment_date`, `status`) VALUES
(1, 2, 'Ravi', 'Avaiya', 1800, 'pay_N9wg16EEpRhTHa', 247505649, 'raviavaiya03@gmail.com', 8799559020, 'B-78, shantiniketan society ,kamal park -2,varachha, surat city, surat', '2023-12-08 23:41:45', 'Payment_Do'),
(2, 3, 'parth', 'sangani', 3600, 'pay_NA7EFi6teuA5OR', 937741638, '21bmiit108@gmail.com', 9714408277, '25 gurukrupa row house laskana surat', '2023-12-09 10:01:07', 'Payment_Do'),
(3, 4, 'Mitul', 'patel', 4197, 'pay_NA81ny9xcSIjzF', 218683413, 'mitalpatel040199@gmail.com', 7567768881, 'B-78, shantiniketan society ,kamal park -2,varachha, surat city, surat', '2023-12-09 10:47:58', 'Payment_Do'),
(4, 2, 'Mitul', 'patel', 6600, 'pay_NACKisMKCsmpsI', 163875930, 'mitalpatel040199@gmail.com', 7567768881, 'B-78, shantiniketan society ,kamal park -2,varachha, surat city, surat', '2023-12-09 15:00:39', 'Payment_Do');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `model_no` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img1` varchar(600) DEFAULT NULL,
  `img2` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`img2`)),
  `img3` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`img3`)),
  `categoryid` int(11) NOT NULL,
  `subcategoryid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `added_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `name`, `description`, `model_no`, `price`, `quantity`, `img1`, `img2`, `img3`, `categoryid`, `subcategoryid`, `brandid`, `added_on`, `status`) VALUES
(2, 'Nike Air Max Neon', 'Lace up and feel the legacy. These AM90s will keep up with you on all your adventures thanks to a mix of GORE-TEX and mesh materials. Worn by presidents, revolutionized through collabs and celebrated ', 'NK02MG', 2250, 10, 'uploads/nw15.jpg', NULL, NULL, 2, 2, 1, '2023-12-07', 1),
(3, 'Lebron 11 Red', 'Lace up and feel the legacy. These AM90s will keep up with you on all your adventures thanks to a mix of GORE-TEX and mesh materials. Worn by presidents, revolutionized through collabs and celebrated ', 'LR02', 2200, 10, 'uploads/1.jpg', NULL, NULL, 1, 1, 3, '2023-12-08', 1),
(4, 'Men Textured Loafers', 'Step out in comfort with this pair of loafers that feature a textured surface and comfortable soles.', 'MTL01', 1200, 10, 'uploads/Loafer_M_2.jpg', NULL, NULL, 1, 8, 4, '2023-12-08', 1),
(5, 'Women Luxury Heel', 'Take your style to new heights with this pair of sandals. It features a mesh upper with a wide strap, and an ankle strap with buckle closure, a square toe, a padded footbed, and covered block heels.', 'LUXH01', 2500, 10, 'uploads/high_heels_1.jpg', NULL, NULL, 2, 7, 4, '2023-12-08', 1),
(6, 'Nike Flyknit Lunar Green Blue', 'Lace up and feel the legacy. These AM90s will keep up with you on all your adventures thanks to a mix of GORE-TEX and mesh materials. Worn by presidents, revolutionized through collabs and celebrated ', 'NKLG01', 999, 10, 'uploads/nike11.jpg', NULL, NULL, 3, 3, 4, '2023-12-09', 1),
(7, 'Adidas Chaussures', 'Lace up and feel the legacy. These AM90s will keep up with you on all your adventures thanks to a mix of GORE-TEX and mesh materials. Worn by presidents, revolutionized through collabs and celebrated ', 'AL01', 1200, 15, 'uploads/nike7.jpg', NULL, NULL, 3, 3, 3, '2023-12-09', 1),
(8, 'Reebok Blast', 'Lace up and feel the legacy. These AM90s will keep up with you on all your adventures thanks to a mix of GORE-TEX and mesh materials. Worn by presidents, revolutionized through collabs and celebrated ', 'RB01', 899, 10, 'uploads/18.jpg', NULL, NULL, 3, 3, 5, '2023-12-09', 1),
(9, 'Adidas Adizero F50', 'Lace up and feel the legacy. These AM90s will keep up with you on all your adventures thanks to a mix of GORE-TEX and mesh materials. Worn by presidents, revolutionized through collabs and celebrated ', 'AA01', 99, 10, 'uploads/6.jpg', NULL, NULL, 3, 3, 2, '2023-12-09', 1),
(10, 'GUCCI SLIPPER', 'Lace up and feel the legacy. These AM90s will keep up with you on all your adventures thanks to a mix of GORE-TEX and mesh materials. Worn by presidents, revolutionized through collabs and celebrated ', 'GUSLP01', 1599, 10, 'uploads/Slipper_2.jpg', NULL, NULL, 2, 9, 4, '2023-12-09', 1),
(11, 'Adidas Chaussures', 'Lace up and feel the legacy. These AM90s will keep up with you on all your adventures thanks to a mix of GORE-TEX and mesh materials. Worn by presidents, revolutionized through collabs and celebrated ', 'AC01', 2000, 10, 'uploads/9.jpg', NULL, NULL, 1, 1, 3, '2023-12-09', 1),
(12, 'Campus Bounce Titan', 'Lace up and feel the legacy. These AM90s will keep up with you on all your adventures thanks to a mix of GORE-TEX and mesh materials. Worn by presidents, revolutionized through collabs and celebrated ', 'CBT01', 1399, 10, 'uploads/10.jpg', NULL, NULL, 1, 1, 5, '2023-12-09', 1),
(13, 'Nike Hypervenom Neymar Jr.', 'Lace up and feel the legacy. These AM90s will keep up with you on all your adventures thanks to a mix of GORE-TEX and mesh materials. Worn by presidents, revolutionized through collabs and celebrated ', 'NKHN01', 699, 10, 'uploads/nw7.jpg', NULL, NULL, 2, 2, 1, '2023-12-09', 1),
(14, 'Adidas Chaussures A11', 'Lace up and feel the legacy. These AM90s will keep up with you on all your adventures thanks to a mix of GORE-TEX and mesh materials. Worn by presidents, revolutionized through collabs and celebrated ', 'AC02', 1499, 10, 'uploads/sports.jpg', NULL, NULL, 3, 3, 3, '2023-12-09', 1),
(15, 'Flyknit 360', 'Lace up and feel the legacy. These AM90s will keep up with you on all your adventures thanks to a mix of GORE-TEX and mesh materials. Worn by presidents, revolutionized through collabs and celebrated ', 'FY01', 2100, 10, 'uploads/flyknit.jpg', NULL, NULL, 3, 3, 5, '2023-12-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `added_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`id`, `size`, `added_on`) VALUES
(1, 6, '2023-11-03'),
(2, 7, '2023-11-03'),
(5, 10, '2023-11-03'),
(6, 11, '2023-11-03'),
(7, 12, '2023-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `productid`, `stock`) VALUES
(2, 2, 130),
(3, 3, 25),
(4, 4, 50),
(5, 5, 30),
(6, 6, 10),
(7, 7, 15),
(8, 8, 10),
(9, 9, 10),
(10, 10, 10),
(11, 7, 10),
(12, 12, 10),
(13, 13, 10),
(14, 14, 10),
(15, 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategoryid` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `added_date` DATETIME NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategoryid`, `sname`, `categoryid`, `added_date`) VALUES
(1, 'sports', 1, '2023-12-07'),
(2, 'sports', 2, '2023-12-07'),
(3, 'sports', 3, '2023-12-07'),
(5, 'Causals', 2, '2023-12-07'),
(6, 'Causals', 3, '2023-12-07'),
(7, 'heels', 2, '2023-12-07'),
(8, 'Loafers', 1, '2023-12-07'),
(9, 'Slippers', 2, '2023-12-07'),
(10, 'Sport', 0, '2023-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `contact_no` text NOT NULL,
  `gender` text NOT NULL,
  `city` int(11) NOT NULL,
  `registered_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `email`, `password`, `contact_no`, `gender`, `city`, `registered_date`, `role`) VALUES
(1, 'ADMIN', 'raviavaiya03@gmail.com', '$2y$10$qwrYGZcaWD5ZM82IKnKUauWX1nhYorDL7AQSMDsdT4427WDMjh/qG', '8799559020', 'male', 29, '2023-12-07', 0),
(2, 'Ravi Avaiya', '21bmiit007@gmail.com', '$2y$10$7PF3B4dy.oyoSVg/DY11PuStvnKwAc2y3iKpKXDIA/j1qxzIw5Lzm', '9825737303', 'male', 32, '2023-12-07', 1),
(3, 'sahil devani', '21bmiit108@gmail.com', '$2y$10$YirPI/yiKVJNh5NwzTzYYeb6g0o/s5gLUeEhveEQ/GYyWeFjS8eDi', '9714408277', 'male', 31, '2023-12-09', 1),
(4, 'parth sangani', 'parthsangani45@gmail.com', '$2y$10$07fEbydJGr6QUK5vvGkE5uD3tLxt/T4Fhyvj9xDu06CRog79621w2', '8401656116', 'male', 30, '2023-12-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cityName` (`name`),
  ADD KEY `stateFK` (`sid`);

--
-- Indexes for table `tblstate`
--
ALTER TABLE `tblstate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stateName` (`name`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color` (`color`),
  ADD KEY `size` (`size`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `model_no` (`model_no`),
  ADD KEY `category_id` (`categoryid`),
  ADD KEY `subcategoryid` (`subcategoryid`),
  ADD KEY `brandid` (`brandid`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`productid`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategoryid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`product_id`),
  ADD KEY `userid` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcity`
--
ALTER TABLE `tblcity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `tblstate`
--
ALTER TABLE `tblstate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`),
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`color`) REFERENCES `tbl_color` (`id`),
  ADD CONSTRAINT `tbl_cart_ibfk_3` FOREIGN KEY (`size`) REFERENCES `tbl_size` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD CONSTRAINT `tbl_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `brandid` FOREIGN KEY (`brandid`) REFERENCES `tbl_brand` (`id`),
  ADD CONSTRAINT `category_id` FOREIGN KEY (`categoryid`) REFERENCES `tbl_category` (`categoryid`),
  ADD CONSTRAINT `subcategoryid` FOREIGN KEY (`subcategoryid`) REFERENCES `tbl_subcategory` (`subcategoryid`);

--
-- Constraints for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `pid` FOREIGN KEY (`productid`) REFERENCES `tbl_products` (`product_id`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`city`) REFERENCES `tblcity` (`id`);

--
-- Constraints for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `productid` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
