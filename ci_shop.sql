-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2018 at 02:37 PM
-- Server version: 5.5.58-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '', NULL, '2018-03-02 13:25:12', '0000-00-00 00:00:00'),
(2, 'Mobile', '', 1, '2018-03-02 13:48:50', '0000-00-00 00:00:00'),
(3, 'Kitchen', '', 0, '2018-03-05 04:18:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `delivery_address` tinytext NOT NULL,
  `pincode` int(10) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `delivery_address`, `pincode`, `total_amt`, `created_at`, `updated_at`) VALUES
(3, 1, 'Powai', 4000076, 686, '2018-03-04 18:58:51', '0000-00-00 00:00:00'),
(4, 1, 'Powai', 4000076, 686, '2018-03-04 18:59:12', '0000-00-00 00:00:00'),
(5, 1, 'Powai', 4000076, 686, '2018-03-04 19:04:32', '0000-00-00 00:00:00'),
(6, 1, 'Powai', 4000076, 343, '2018-03-05 04:07:35', '0000-00-00 00:00:00'),
(7, 1, 'Powai', 4000076, 1400, '2018-03-05 07:28:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id_in_order_product` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `qty`) VALUES
(1, 4, 17, 2),
(2, 5, 17, 2),
(3, 6, 17, 1),
(4, 7, 21, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` int(8) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `products_in_category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `created_at`, `updated_at`) VALUES
(17, 'Nokia Lumia 630', 'Windows 10', 343, 2, '2018-03-04 14:53:33', '0000-00-00 00:00:00'),
(21, 'Nokia 5233 Flip cover', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 350, 2, '2018-03-05 04:47:55', '0000-00-00 00:00:00'),
(23, 'Refrigerator Digital', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 15000, 1, '2018-03-05 05:03:25', '0000-00-00 00:00:00'),
(24, 'Nokia 6', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 15000, 2, '2018-03-05 05:10:16', '0000-00-00 00:00:00'),
(25, 'Asus zenfone', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 9000, 2, '2018-03-05 05:11:57', '0000-00-00 00:00:00'),
(26, 'Motorola G5', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 15000, 2, '2018-03-05 05:31:56', '0000-00-00 00:00:00'),
(27, 'Samsung j7', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 7000, 2, '2018-03-05 05:34:53', '0000-00-00 00:00:00'),
(28, 'Samsung s8', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 30000, 2, '2018-03-05 05:36:06', '0000-00-00 00:00:00'),
(29, 'Samsung galaxy s6', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 15000, 2, '2018-03-05 05:37:19', '0000-00-00 00:00:00'),
(30, 'Nokia lumia 520', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 5000, 2, '2018-03-05 05:38:51', '0000-00-00 00:00:00'),
(31, 'Sample edit9', 'pp', 8999, 1, '2018-03-05 09:02:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_images_on_products` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `path`, `product_id`, `created_at`, `updated_at`) VALUES
(13, 'uploads/images/432014122544AM_635_nokia_lumia_630.jpg', 17, '2018-03-04 14:53:33', '0000-00-00 00:00:00'),
(17, 'uploads/images/flip_cover.jpg', 21, '2018-03-05 04:47:13', '0000-00-00 00:00:00'),
(19, 'uploads/images/DP0120201603531401M.jpg', 23, '2018-03-05 05:03:25', '0000-00-00 00:00:00'),
(20, 'uploads/images/download.jpg', 24, '2018-03-05 05:10:16', '0000-00-00 00:00:00'),
(21, 'uploads/images/download_3.jpg', 24, '2018-03-05 05:10:16', '0000-00-00 00:00:00'),
(22, 'uploads/images/14637346020.jpg', 25, '2018-03-05 05:11:57', '0000-00-00 00:00:00'),
(23, 'uploads/images/download_4.jpg', 26, '2018-03-05 05:31:56', '0000-00-00 00:00:00'),
(24, 'uploads/images/in-galaxy-j7-j700f-sm-j700fzwdins-000000001-front-white.jpg', 27, '2018-03-05 05:34:53', '0000-00-00 00:00:00'),
(25, 'uploads/images/S8_Black_front.jpg', 28, '2018-03-05 05:36:06', '0000-00-00 00:00:00'),
(26, 'uploads/images/smg935-0hero-0930.jpg', 29, '2018-03-05 05:37:19', '0000-00-00 00:00:00'),
(27, 'uploads/images/WFtQHIvNRVMSUCIh.jpg', 30, '2018-03-05 05:38:51', '0000-00-00 00:00:00'),
(28, 'uploads/images/smg935-0hero-09301.jpg', 31, '2018-03-05 09:00:49', '0000-00-00 00:00:00'),
(29, 'uploads/images/S8_Black_front1.jpg', 31, '2018-03-05 09:06:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-03-04 17:07:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_role` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Chetan Shenoy', 'admin@admin.com', '3b8ebe34e784a3593693a37baaacb016', 1, '2018-03-04 17:10:45', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_id_in_order_product` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_in_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_on_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
