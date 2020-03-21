-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2020 at 01:33 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.3.15-3+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Books'),
(4, 'Households'),
(5, 'Electronics'),
(6, 'Wooden'),
(12, 'Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_currency_code` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_currency_code`, `order_status`) VALUES
(19, 500, '3456789', 'usa', 'completed'),
(20, 500, '3456789', 'usa', 'completed'),
(21, 500, '3456789', 'usa', 'completed'),
(22, 500, '3456789', 'usa', 'completed'),
(23, 500, '3456789', 'usa', 'completed'),
(25, 500, '3456789', 'usa', 'completed'),
(26, 500, '3456789', 'usa', 'completed'),
(27, 500, '3456789', 'usa', 'completed'),
(28, 500, '3456789', 'usa', 'completed'),
(29, 500, '3456789', 'usa', 'completed'),
(30, 500, '3456789', 'usa', 'completed'),
(31, 500, '3456789', 'usa', 'completed'),
(32, 500, '3456789', 'usa', 'completed'),
(33, 500, '3456789', 'usa', 'completed'),
(34, 500, '3456789', 'usa', 'completed'),
(35, 500, '3456789', 'usa', 'completed'),
(36, 500, '3456789', 'usa', 'completed'),
(37, 500, '3456789', 'usa', 'completed'),
(38, 500, '3456789', 'usa', 'completed'),
(39, 500, '3456789', 'usa', 'completed'),
(40, 500, '3456789', 'usa', 'completed'),
(41, 500, '3456789', 'usa', 'completed'),
(42, 500, '3456789', 'usa', 'completed'),
(43, 500, '3456789', 'usa', 'completed'),
(44, 500, '3456789', 'usa', 'completed'),
(45, 500, '3456789', 'usa', 'completed'),
(46, 500, '3456789', 'usa', 'completed'),
(47, 500, '3456789', 'usa', 'completed'),
(48, 500, '3456789', 'usa', 'completed'),
(49, 500, '3456789', 'usa', 'completed'),
(50, 500, '3456789', 'usa', 'completed'),
(51, 500, '3456789', 'usa', 'completed'),
(52, 500, '3456789', 'usa', 'completed'),
(53, 500, '3456789', 'usa', 'completed'),
(54, 500, '3456789', 'usa', 'completed'),
(55, 500, '3456789', 'usa', 'completed'),
(56, 500, '3456789', 'usa', 'completed'),
(57, 500, '3456789', 'usa', 'completed'),
(58, 500, '3456789', 'usa', 'completed'),
(59, 500, '3456789', 'usa', 'completed'),
(60, 500, '3456789', 'usa', 'completed'),
(61, 500, '3456789', 'USD', 'Completed'),
(62, 500, '3456789', 'USD', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_cat_id` int(11) DEFAULT NULL,
  `product_des` text NOT NULL,
  `product_shortDes` text NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_old_price` float DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_brand` varchar(255) DEFAULT NULL,
  `product_tags` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_cat_id`, `product_des`, `product_shortDes`, `product_price`, `product_old_price`, `product_quantity`, `product_image`, `product_brand`, `product_tags`) VALUES
(3, 'New Product', 1, 'Quas interesset signiferumque usu at, ut debet soluta vel. Erant repudiandae cu vis, vim ut veniam audiam vituperatoribus. Quas interesset signiferumque usu at, ut debet soluta vel. Erant repudiandae cu vis, vim ut veniam audiam vituperatoribus. Quas interesset signiferumque usu at, ut debet soluta vel. Erant repudiandae cu vis, vim ut veniam audiam vituperatoribus.', 'Quas interesset signiferumque usu at, ut debet soluta vel. Erant repudiandae cu vis, vim ut veniam audiam vituperatoribus.', 100, 150, 0, 'LavaVtase.jpg', 'test', 'ecommernce'),
(4, 'Product 1', 1, 'Quas interesset signiferumque usu at, ut debet soluta vel. Erant repudiandae cu vis, vim ut veniam audiam vituperatoribus. Quas interesset signiferumque usu at, ut debet soluta vel. Erant repudiandae cu vis, vim ut veniam audiam vituperatoribus. Quas interesset signiferumque usu at, ut debet soluta vel. Erant repudiandae cu vis, vim ut veniam audiam vituperatoribus.', 'Quas interesset signiferumque usu at, ut debet soluta vel. Erant repudiandae cu vis, vim ut veniam audiam vituperatoribus.', 100, 200, 0, 'LavaVtase.jpg', 'test', 'ecommernce'),
(6, 'New Product', 1, 'Quas interesset signiferumque usu at, ut debet soluta vel. Erant repudiandae cu vis, vim ut veniam audiam vituperatoribus. Quas interesset signiferumque usu at, ut debet soluta vel. Erant repudiandae cu vis, vim ut veniam audiam vituperatoribus. Quas interesset signiferumque usu at, ut debet soluta vel. Erant repudiandae cu vis, vim ut veniam audiam vituperatoribus.', 'Product Short Description', 150, 200, 10, 'bander 1.jpg', 'test', 'ecommernce'),
(7, 'Cowboy Hat', 1, 'Product Short Description', 'Product Short Description', 120, 150, 1, 'IMG_0204.JPG', 'test', 'ecommernce'),
(8, 'Safety Helmet', 1, 'Product Description', 'Product Short Description', 1100, 1500, 15, 'IMG_0203.JPG', 'test', 'ecommernce');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `product_id`, `product_name`, `order_id`, `product_price`, `product_quantity`) VALUES
(1, 1, '', 0, 75.8, 1),
(2, 1, '', 0, 75.8, 1),
(4, 1, '', 0, 75.8, 5),
(5, 2, '', 0, 85.5, 4),
(6, 1, '', 42, 75.8, 1),
(7, 2, '', 42, 85.5, 1),
(8, 1, '', 55, 75.8, 1),
(10, 1, '', 56, 75.8, 1),
(11, 2, '', 56, 85.5, 1),
(12, 1, 'Nemo Enim Ipsam', 58, 75.8, 1),
(13, 2, 'Lorem ipsum dolor sit amet', 58, 85.5, 1),
(14, 1, 'Nemo Enim Ipsam', 59, 75.8, 2),
(15, 2, 'Lorem ipsum dolor sit amet', 60, 85.5, 2),
(16, 1, 'Nemo Enim Ipsam', 61, 75.8, 1),
(17, 2, 'Lorem ipsum dolor sit amet', 62, 85.5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_title`, `slider_image`) VALUES
(4, 'Slider 1', 'slider1.jpg'),
(5, 'Slider 2', 'slider2.jpg'),
(6, 'Slider 3', 'slider3.jpg'),
(7, 'Slider 4', '80558795_470884640296374_9032318091798773760_n.jpg'),
(8, 'Slider 5', '81785071_477780943138477_8237293076641480704_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`) VALUES
(1, 'admin', '123', 'Default', 'User', 'admin@admin.com', 'person.png'),
(4, 'abdullah', '123', 'Abdullah', 'Mazhar', 'abdullah@mazhar.com', 'person.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
