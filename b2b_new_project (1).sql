-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2024 at 02:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b2b_new_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyer_id` int(100) NOT NULL,
  `buyer_name` varchar(200) NOT NULL,
  `buyer_email` varchar(200) NOT NULL,
  `buyer_phone` int(19) NOT NULL,
  `enquiry_for` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyleads`
--

CREATE TABLE `buyleads` (
  `buyleads_id` int(100) NOT NULL,
  `buyer_name` varchar(200) NOT NULL,
  `queiry_for` varchar(255) NOT NULL,
  `number` varchar(200) NOT NULL,
  `accessed_at` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(100) NOT NULL,
  `buyer_email` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `buyer_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyleads`
--

INSERT INTO `buyleads` (`buyleads_id`, `buyer_name`, `queiry_for`, `number`, `accessed_at`, `user_id`, `buyer_email`, `date`, `buyer_location`) VALUES
(4, 'varun kumar', 'mango products', '3453453455', '2024-06-14', 0, 'varun@gmail.com', '2024-06-14', 'delhi'),
(5, 'shanu kumar', 'singing products', '45345345', '2024-06-14', 0, 'shanu@gmail.com', '2024-06-14', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(100) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_long_image` varchar(255) NOT NULL,
  `cat_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `cat_long_image`, `cat_slug`) VALUES
(10, 'Agriculture', 'extra_image/agriculture.jpg', 'extra_image/new.jpg', 'agri'),
(11, 'Apparel & Fashion ', 'extra_image/fashion-apparel.jpg', '', 'fasi'),
(12, 'Automobile ', 'extra_image/automobile.jpg', '', 'auto');

-- --------------------------------------------------------

--
-- Table structure for table `free-listing-product`
--

CREATE TABLE `free-listing-product` (
  `pro_id` int(100) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `sub_id` int(100) NOT NULL,
  `inner_cat_id` int(100) NOT NULL,
  `micro_id` int(100) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `free-listing-product`
--

INSERT INTO `free-listing-product` (`pro_id`, `product_name`, `img1`, `img2`, `img3`, `company_name`, `company_logo`, `product_description`, `cat_id`, `sub_id`, `inner_cat_id`, `micro_id`, `location`) VALUES
(14, '', 'logo/logo.jpg', '', '', '', '', '', 0, 0, 0, 0, ''),
(15, 'cap', 'logo/logo.jpg', '', '', 'web2export', '', 'this is cap', 5, 6, 8, 4, ''),
(16, 'bts bags', 'logo/download.jfif', '', '', 'web2export', '', 'this is party bags', 5, 6, 6, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `inner_cat`
--

CREATE TABLE `inner_cat` (
  `inner_cat_id` int(100) NOT NULL,
  `inner_cat_name` varchar(256) NOT NULL,
  `sub_id` int(100) NOT NULL,
  `inner_cat_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inner_cat`
--

INSERT INTO `inner_cat` (`inner_cat_id`, `inner_cat_name`, `sub_id`, `inner_cat_image`) VALUES
(11, 'Fruit Plants', 10, 'extra_image/303635-1-home.jpg'),
(12, 'Outdoor Plants', 10, 'extra_image/'),
(13, 'Natural Flowers', 10, 'extra_image/');

-- --------------------------------------------------------

--
-- Table structure for table `limit_buylead`
--

CREATE TABLE `limit_buylead` (
  `limit_id` int(100) NOT NULL,
  `user_id` int(200) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `buyleads_id` int(100) NOT NULL,
  `buyer_email` varchar(100) NOT NULL,
  `queiry_for` varchar(255) NOT NULL,
  `number` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `buyer_name` varchar(100) NOT NULL,
  `buyer_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `limit_buylead`
--

INSERT INTO `limit_buylead` (`limit_id`, `user_id`, `user_email`, `buyleads_id`, `buyer_email`, `queiry_for`, `number`, `date`, `buyer_name`, `buyer_location`) VALUES
(65, 53, 'ritika@gmail.com', 4, 'varun@gmail.com', 'mango products', 2147483647, '2024-06-15', 'varun kumar', ''),
(66, 53, 'ritika@gmail.com', 5, 'shanu@gmail.com', 'singing products', 45345345, '2024-06-15', 'shanu kumar', 'US'),
(67, 55, 'shyam@gmail.com', 4, 'varun@gmail.com', 'mango products', 2147483647, '2024-06-17', 'varun kumar', 'delhi');

-- --------------------------------------------------------

--
-- Table structure for table `micro`
--

CREATE TABLE `micro` (
  `micro_id` int(100) NOT NULL,
  `micro_name` varchar(255) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `sub_id` int(100) NOT NULL,
  `inner_cat_id` int(100) NOT NULL,
  `micro_cat_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `micro`
--

INSERT INTO `micro` (`micro_id`, `micro_name`, `cat_id`, `sub_id`, `inner_cat_id`, `micro_cat_image`) VALUES
(6, 'Mango Plants', 10, 10, 11, 'extra_image/303635-1-home.jpg'),
(7, 'Neem Tree', 10, 10, 12, 'extra_image/2.jpg'),
(8, 'Palm Trees', 10, 10, 12, 'extra_image/76806-1-home.jpg'),
(9, 'Banana Plants', 10, 10, 11, 'extra_image/banana.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `company_experience` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `number` int(20) NOT NULL,
  `business_type` varchar(255) NOT NULL,
  `moq` varchar(255) NOT NULL,
  `packaging_type` varchar(255) NOT NULL,
  `product_life` varchar(255) NOT NULL,
  `feature` varchar(255) NOT NULL,
  `company_description` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `cat_id` int(100) NOT NULL,
  `sub_id` int(100) NOT NULL,
  `micro_id` int(100) NOT NULL,
  `inner_cat_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_id` int(100) NOT NULL,
  `sub_cat_name` varchar(256) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `sub_cat_image` varchar(255) NOT NULL,
  `inner_cat_id` int(100) NOT NULL,
  `cat_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sub_id`, `sub_cat_name`, `cat_id`, `sub_cat_image`, `inner_cat_id`, `cat_slug`) VALUES
(10, 'Fresh Flowers and Plants', 10, 'extra_image/316170-1.jpg', 0, ''),
(11, 'Irrigation Equipment & Systems', 10, 'extra_image/368206-984.jpg', 0, ''),
(12, 'PET and Farming Animals', 10, 'extra_image/360389-523.jpeg', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_phone` varchar(19) NOT NULL,
  `company_name` varchar(256) NOT NULL,
  `plan` varchar(256) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `password` varchar(256) NOT NULL,
  `otp` int(100) NOT NULL,
  `expire` date NOT NULL DEFAULT current_timestamp(),
  `user_role` int(100) NOT NULL,
  `company_address` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `user_website` varchar(256) NOT NULL,
  `state` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `pincode` int(100) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_image` varchar(256) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `iec_code` varchar(100) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone`, `company_name`, `plan`, `date`, `password`, `otp`, `expire`, `user_role`, `company_address`, `image`, `user_website`, `state`, `city`, `pincode`, `product_name`, `product_image`, `gst`, `start_date`, `iec_code`, `type`) VALUES
(53, 'ritika', 'ritika@gmail.com', '453453453333', 'sithub.com', 'prime', '2024-06-01', '', 609753, '2024-08-01', 0, 'nawada', 'logo/logo.jpg', 'web2export.com', 'Andhra Pradesh', 'any city', 6456456, 'mango', '', 'ftyhfh', '2024-06-01', 'fghfghfhfh', 'exporter'),
(54, 'shanu', 'shanu@gmail.com', '24345', '', 'prime', '2024-06-12', '', 410105, '2024-06-12', 0, '', '', '', '', '', 0, '', '', '0', '2024-06-12', '', ''),
(55, 'shyam', 'shyam@gmail.com', '45345345', 'web2export', 'ultra-pro', '2024-06-13', '', 749414, '2024-06-13', 0, 'nawada', 'logo/e798c531-6da3-4d34-8390-1e17408ea69d.jfif', 'web2export.com', 'Andhra Pradesh', '', 110098, 'mango', '', '4534534dfgdfg', '2024-06-13', '53453453IEC', 'exporter'),
(58, ' shyam', 'shyam@gmail.com', '4353534534', '', '', '2024-06-17', '', 105078, '2024-06-17', 0, '', '', '', '', '', 0, '', '', '', '2024-06-17', '', ''),
(59, 'deep', 'deep123@gmail.com', '45345345', '', '', '2024-06-17', 'deep123@gmail.com', 104938, '2024-06-17', 0, '', '', '', '', '', 0, '', '', '', '2024-06-17', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `buyleads`
--
ALTER TABLE `buyleads`
  ADD PRIMARY KEY (`buyleads_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `free-listing-product`
--
ALTER TABLE `free-listing-product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `inner_cat`
--
ALTER TABLE `inner_cat`
  ADD PRIMARY KEY (`inner_cat_id`);

--
-- Indexes for table `limit_buylead`
--
ALTER TABLE `limit_buylead`
  ADD PRIMARY KEY (`limit_id`);

--
-- Indexes for table `micro`
--
ALTER TABLE `micro`
  ADD PRIMARY KEY (`micro_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyleads`
--
ALTER TABLE `buyleads`
  MODIFY `buyleads_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `free-listing-product`
--
ALTER TABLE `free-listing-product`
  MODIFY `pro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `inner_cat`
--
ALTER TABLE `inner_cat`
  MODIFY `inner_cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `limit_buylead`
--
ALTER TABLE `limit_buylead`
  MODIFY `limit_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `micro`
--
ALTER TABLE `micro`
  MODIFY `micro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
