-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 07:11 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ispecs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'Mohsin', 'admin'),
(2, 'Junaid', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `ip_add` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(63, 53, 4500, 2142008032, 2, '2020-02-16 18:52:41', 'pending'),
(64, 53, 10100, 2142008032, 2, '2020-02-16 18:52:41', 'pending'),
(65, 54, 6200, 1476117668, 1, '2020-02-16 18:54:12', 'pending'),
(66, 55, 7100, 1383707929, 1, '2020-02-16 18:55:29', 'pending'),
(67, 53, 6500, 1729597181, 1, '2020-02-17 06:52:24', 'pending'),
(68, 53, 6500, 2011182547, 1, '2020-02-18 07:05:50', 'pending'),
(69, 54, 6400, 196803369, 2, '2020-02-18 07:11:05', 'pending'),
(70, 54, 12900, 196803369, 2, '2020-02-18 07:11:05', 'pending'),
(71, 56, 6500, 1125407722, 1, '2020-02-18 07:21:30', 'pending'),
(72, 53, 7600, 334324207, 1, '2020-02-18 08:28:23', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(102, 53, 2142008032, 48, 1, 'pending'),
(103, 53, 2142008032, 49, 1, 'pending'),
(104, 54, 1476117668, 44, 1, 'pending'),
(105, 55, 1383707929, 41, 1, 'pending'),
(106, 53, 1729597181, 45, 1, 'pending'),
(107, 53, 2011182547, 45, 1, 'pending'),
(108, 54, 196803369, 46, 1, 'pending'),
(109, 54, 196803369, 45, 1, 'pending'),
(111, 53, 334324207, 53, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_sku` varchar(100) NOT NULL,
  `product_brand` varchar(60) NOT NULL,
  `product_img` text NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_sku`, `product_brand`, `product_img`, `product_price`) VALUES
(41, 'Armani Clubmaster Blue', 'rayban_clubmaster_noir_bleuGris', 'Armani', 'rayban_clubmaster_noir_bleuGris.jpg', 7100),
(42, 'Rayban Justin Gris ', 'rayban_justin_gris_argentDegrade', 'Rayban', 'rayban_justin_gris_argentDegrade.jpg', 5800),
(43, 'Rayban Aviator Gun Vert', 'rayban_aviator_gun_vert', 'Rayban', 'rayban_aviator_gun_vert.jpg', 5000),
(44, 'Rayban Aviator Vert Flash', 'rayban_aviator_or_vertFlash', 'Rayban', 'rayban_aviator_or_vertFlash.jpg', 6200),
(45, 'Rayban Vert Classic', 'rayban_cockpit_or_vert_classique', 'Rayban', 'rayban_cockpit_or_vert_classique.jpg', 6500),
(46, 'Rayban Noir Marron Degrade', 'rayban_boyfriend_noir_marron_degrade', 'Rayban', 'rayban_boyfriend_noir_marron_degrade.jpg', 6400),
(47, 'Rayban Havane Marron Clair', 'rayban_boyfriend_havane_marron_clair_degrade', 'Rayban', 'rayban_boyfriend_havane_marron_clair_degrade.jpg', 5700),
(48, 'Rayban Justin RougeMirror', 'rayban_justin_noir_rougeMirroir', 'Rayban', 'rayban_justin_noir_rougeMirroir.jpg', 4500),
(49, 'Polaroid 6003 Blue Grey', 'polaroid_6003_blue_grey', 'Gucci', 'polaroid_6003_blue_grey.jpg', 5600),
(50, 'Prada Black Gold', 'prada_black_gold', 'Prada', 'prada_black_gold.jpg', 5100),
(53, 'Gucci Cubround', 'rayban_clubround_havaneNoir_vertClassique_g15', 'Gucci', 'rayban_clubround_havaneNoir_vertClassique_g15.jpg', 7600),
(56, 'Prada 113s Gold Green', 'carrera_113S_gold_green', 'Prada', 'carrera_113S_gold_green.jpg', 6500);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `c_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `firstname`, `lastname`, `email`, `password`, `cpassword`, `mobile`, `address`, `country`, `city`, `c_ip`) VALUES
(53, 'Mohsin', 'Ali', 'mohsin31002@gmail.com', 'Mohsin12345.', 'Mohsin12345.', '03017180570', 'Mazhar fareed colony', 'Pakistan', 'Sadiqabad', 0),
(54, 'Junaid', 'Abbas', 'junaidabbas546@gmail.com', 'Junaid12345.', 'Junaid12345.', '03078715546', 'Mahalla Ghafoorabad', 'Pakistan', 'Sadiqabad', 0),
(55, 'Zubair', 'Arshad', 'zubair@gmail.com', 'Zubair12345.', 'Zubair12345.', '03043940750', 'chak 24', 'Pakistan', 'Sadiqabad', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

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
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
