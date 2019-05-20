-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2019 at 07:17 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `cover_image`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', NULL, NULL, '2018-12-09 19:11:36', '0000-00-00 00:00:00'),
(2, 'Mobile', 'mobile', 1, NULL, '2018-12-09 19:11:46', '0000-00-00 00:00:00'),
(3, 'Kitchen', 'kitchen', 0, NULL, '2018-12-09 19:11:59', '0000-00-00 00:00:00'),
(4, 'Clothing', 'clothing', 0, NULL, '2018-12-09 19:25:07', '2018-12-09 19:24:46'),
(5, 'Cars', '', 0, NULL, '2018-12-09 19:27:24', '2018-12-09 19:27:24'),
(8, 'vehicles', '', 0, '20-mountain-matte-painting-feliks_13661.jpg', '2018-12-09 19:37:09', '2018-12-09 19:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'ujju', '99878', 'cgawu@ll.com', 'awdaw', NULL, NULL),
(2, 'secureOps', '99878', 'chetanshenai9@gmail.com', 'kilil', NULL, NULL),
(4, 'secureOpsu', '99878', 'admin@admin.com', 'yjyjy', '2019-05-16 11:42:42', '2019-05-16 11:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_address` tinytext NOT NULL,
  `pincode` int(10) NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `delivery_address`, `pincode`, `order_status`, `total_amt`, `created_at`, `updated_at`) VALUES
(5, 1, 'Powai', 4000076, 1, 686, '2018-11-24 05:24:41', '0000-00-00 00:00:00'),
(8, 1, 'A102 - priya', 400076, 1, 1036, '2018-11-24 07:14:08', '2018-11-24 07:14:08'),
(9, 1, '1e2e2', 200, 1, 35000, '2019-04-14 04:15:27', '2019-04-14 04:15:27'),
(10, 1, '<script>alert()</script', 0, 1, 30000, '2019-04-14 04:19:15', '2019-04-14 04:19:15'),
(11, 1, 'Cccwdw', 200, 1, 30000, '2019-04-14 05:06:10', '2019-04-14 05:06:10'),
(12, 1, 'wd', 0, 1, 30000, '2019-04-14 05:36:14', '2019-04-14 05:36:14'),
(13, 1, 'oioopopop', 5656567, 1, 67626, '2019-04-14 08:37:55', '2019-04-14 08:37:55'),
(14, 1, 'Cccwdw', 200, 1, 116313, '2019-05-15 17:01:58', '2019-05-15 17:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `qty`) VALUES
(2, 5, 17, 2),
(5, 8, 21, 1),
(6, 8, 17, 2),
(7, 9, 42, 1),
(8, 10, 40, 1),
(9, 11, 40, 1),
(10, 12, 40, 1),
(11, 13, 41, 1),
(12, 13, 44, 2),
(13, 13, 46, 1),
(14, 14, 44, 1),
(15, 14, 42, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` int(8) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `cover_image` tinytext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `status`, `cover_image`, `created_at`, `updated_at`) VALUES
(24, 'Nokia 6', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 15000, 2, 0, NULL, '2018-03-05 05:10:16', '0000-00-00 00:00:00'),
(26, 'Motorola G5', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 15000, 2, 0, NULL, '2018-03-05 05:31:56', '0000-00-00 00:00:00'),
(27, 'Samsung j7', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 7000, 2, 0, NULL, '2018-03-05 05:34:53', '0000-00-00 00:00:00'),
(28, 'Samsung s8', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 30000, 2, 0, NULL, '2018-03-05 05:36:06', '0000-00-00 00:00:00'),
(29, 'Samsung galaxy s6', 'Nullam facilisis nibh ultrices neque bibendum auctor. Praesent eget diam sollicitudin, volutpat magna sed, dapibus sapien. Curabitur id velit vitae sapien vulputate eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam porttitor orci at tortor faucibus, cursus lobortis tellus vestibulum. Fusce in justo augue. Proin euismod felis ante. Donec eget est lobortis, ornare sem vitae, gravida nibh. Nulla aliquet, ligula ut pretium egestas, diam arcu consequat dui, at mollis leo odio ac enim. Aliquam ac magna ut lorem luctus consequat. Phasellus ligula metus, condimentum id semper imperdiet, pulvinar at orci. Vestibulum a diam vel magna posuere egestas nec at massa. Vivamus ac dignissim ex. Donec molestie, odio ut rutrum bibendum, risus metus dapibus ipsum, vitae pellentesque mauris libero vel risus. Cras dictum vel sem non lobortis.', 15000, 2, 0, NULL, '2018-03-05 05:37:19', '0000-00-00 00:00:00'),
(42, 'vehicles', 'WAddaw', 35000, 2, 1, 'french_alps_mountain_waterfall-wallpaper-1366x7681.jpg', '2019-01-29 15:40:28', '2019-01-29 15:40:28'),
(44, 'secureOps', 'dwadwaf', 11313, 4, 1, '2-beach-sea-photography_13661.jpg', '2019-04-14 06:44:00', '2019-04-14 06:44:01'),
(45, 'secureOps', 'awdaw', 211, 1, 1, 'laptop_smartphone_desk-wallpaper-1366x7684.jpg', '2019-04-14 08:24:14', '2019-04-14 08:24:14'),
(46, 'Redmi note 5', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 10000, 2, 1, 'images_21.jpg', '2019-04-14 08:36:53', '2019-04-14 08:36:53'),
(47, 'SBIGPUMA', 'awe2a', 11313, 1, 1, 'Redmi_Note_5_Pro_Blue_64_GB_4_GB_RAMB1.jpg', '2019-04-14 11:01:17', '2019-04-14 11:01:17'),
(48, 'SBIGPUMA', 'awdw', 11313, 2, 1, 'images3.jpg', '2019-04-14 11:02:36', '2019-04-14 11:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `path`, `product_id`, `created_at`, `updated_at`) VALUES
(20, 'uploads/images/download.jpg', 24, '2018-03-05 05:10:16', '0000-00-00 00:00:00'),
(21, 'uploads/images/download_3.jpg', 24, '2018-03-05 05:10:16', '0000-00-00 00:00:00'),
(23, 'uploads/images/download_4.jpg', 26, '2018-03-05 05:31:56', '0000-00-00 00:00:00'),
(24, 'uploads/images/in-galaxy-j7-j700f-sm-j700fzwdins-000000001-front-white.jpg', 27, '2018-03-05 05:34:53', '0000-00-00 00:00:00'),
(25, 'uploads/images/S8_Black_front.jpg', 28, '2018-03-05 05:36:06', '0000-00-00 00:00:00'),
(26, 'uploads/images/smg935-0hero-0930.jpg', 29, '2018-03-05 05:37:19', '0000-00-00 00:00:00'),
(31, 'laptop_smartphone_desk-wallpaper-1366x7682.jpg', 42, '2019-01-29 15:40:28', '0000-00-00 00:00:00'),
(33, '2-beach-sea-photography_1366.jpg', 44, '2019-04-14 06:44:01', '0000-00-00 00:00:00'),
(34, 'french_alps_mountain_waterfall-wallpaper-1366x7682.jpg', 45, '2019-04-14 07:56:16', '0000-00-00 00:00:00'),
(35, 'images/products/time_to_renew.JPG', 45, '2019-04-14 08:25:29', '0000-00-00 00:00:00'),
(36, 'images/products/french_alps_mountain_waterfall-wallpaper-1366x7683.jpg', 45, '2019-04-14 08:25:15', '0000-00-00 00:00:00'),
(38, 'images.jpg', 46, '2019-04-14 08:36:53', '0000-00-00 00:00:00'),
(39, 'images1.jpg', 47, '2019-04-14 11:01:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-03-04 17:07:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(200) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `link` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `title`, `sub_title`, `path`, `link`, `created_at`, `updated_at`) VALUES
(15, 'New Arrivals', 'Womens', 'master-slide-01_1920x570.jpg', '/product/1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Chetan Shenoy', 'admin@admin.com', '3b8ebe34e784a3593693a37baaacb016', 1, '2018-03-04 17:10:45', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id_in_order_product` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_in_category` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_on_products` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
