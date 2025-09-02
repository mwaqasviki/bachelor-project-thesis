-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2022 at 09:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quick_meal`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(10) NOT NULL,
  `about_desc` text NOT NULL,
  `about_who` text NOT NULL,
  `about_intouch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_desc`, `about_who`, `about_intouch`) VALUES
(1, '\n\nQuick Meal has one primary objective - that is to upsell your food by presenting it in the best way possible. It\'s simplistic easy to use interface creates a fluid experience that keeps your guests engaged and ordering more!\n\n\n', '\r\n\r\nhello how r u\r\n\r\n\r\n\r\n', '\r\n\r\n\r\nRhone was the collective vision of a small group of weekday warriors. For years, we were frustrated by the lack of activewear designed for men and wanted something better. With that in mind, we set out to design premium apparel that is made for motion and engineered to endure.\r\n\r\nAdvanced materials and state of the art technology are combined with heritage craftsmanship to create a new standard in activewear. Every product tells a story of premium performance, reminding its wearer to push themselves physically without having to sacrifice comfort and style.\r\n\r\nBeyond our product offering, Rhone is founded on principles of progress and integrity. Just as we aim to become better as a company, we invite men everywhere to raise the bar and join us as we move Forever Forward.\r\n\r\n\r\n');

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
(2, 'Administrator', 'admin@mail.com', 'Password@123', 'user-profile-min.png', '7777775500', 'Morocco', 'Front-End Developer', ' Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical ');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `line_1` varchar(50) NOT NULL,
  `line_2` varchar(50) NOT NULL,
  `line_3` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `food_id`, `line_1`, `line_2`, `line_3`, `image`, `active`) VALUES
(1, 3, 'double Chees', 'burger', 'with cococola and fries', 'row-banner.png', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `sale` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `food_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `food_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`food_id`, `ip_add`, `qty`, `food_price`) VALUES
(8, '::1', 6, '1000'),
(7, '::1', 7, '82'),
(12, '::1', 1, '1500');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `featured` varchar(5) NOT NULL,
  `active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image`, `featured`, `active`) VALUES
(1, 'Pizza', 'Cat-Name-5449.png', 'no', 'yes'),
(2, 'Burger', 'Cat-Name-9510.png', 'no', 'yes'),
(3, 'Combo', 'Cat-Name-1681.png', 'no', 'yes'),
(6, 'Dinner', 'Cat-Name-2591.png', 'yes', 'yes'),
(7, 'Coffee', 'Cat-Name-4238.png', 'no', 'yes'),
(16, 'Chicken', 'Cat-Name-1189.png', 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

CREATE TABLE `chef` (
  `chef_id` int(10) NOT NULL,
  `chef_title` text NOT NULL,
  `chef_des` text NOT NULL,
  `chef_image` text NOT NULL,
  `featured` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`chef_id`, `chef_title`, `chef_des`, `chef_image`, `featured`) VALUES
(3, 'Hammad', 'hello iam waqas a profeesional cook\r\n\r\n', 'Chef-Name-4864.jpg', 'yes'),
(4, 'Summer Hicks', 'Nesciunt voluptatib\r\n', 'Chef-Name-223.jpg', 'yes'),
(5, 'Mohammad Waqas', 'Eos iste natus elit\r\n', 'Chef-Name-423.jpg', 'yes'),
(6, 'Kevin Maciass', 'Voluptatem Quas vel\r\n\r\n', 'Chef-Name-8257.jpg', 'yes'),
(7, 'Damon Hendricks', 'Ut aspernatur quia r\r\n', 'Chef-Name-4790.jpg', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(10) NOT NULL,
  `contact_email` text NOT NULL,
  `contact_heading` text NOT NULL,
  `contact_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `contact_email`, `contact_heading`, `contact_desc`) VALUES
(1, 'Quickmeal@mail.com', 'Contact To Us', 'If you have any questions, please feel free to contact us, our customer service center is working for you 24/7.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `customer_ip`) VALUES
(2, 'user', 'user@gmail.com', '123', '0092334566931', '::1'),
(3, 'Demo Customer', 'demo@customer.com', 'Password123', '700000000', '::1'),
(4, 'Thomas', 'thomas@demo.com', 'Password123', '777777777', '::1'),
(5, 'Fracis', 'test@customer.com', 'Password123', '780000000', '::1'),
(6, 'Sample Customer', 'customer@mail.com', 'Password123', '7800000000', '::1'),
(7, 'Dominic Burnett', 'savu@mailinator.com', 'Pa$$w0rd!', 'Recusandae Blanditi', '::1'),
(8, 'Burke Murphy', 'paco@mailinator.com', 'Pa$$w0rd!', '+1 (482) 564-4934', '::1'),
(9, 'Cain Chaney', 'vyjumuhumo@mailinator.com', 'Pa$$w0rd!', '+1 (124) 457-8829', '::1'),
(10, 'Alea House', 'dosyl@mailinator.com', 'Pa$$w0rd!', '+1 (131) 591-9172', '::1'),
(11, 'Melissa Sanford', 'dyzewehi@mailinator.com', 'Pa$$w0rd!', '+1 (236) 708-5483', '::1'),
(12, 'Wallace Haney', 'jenu@mailinator.com', 'Pa$$w0rd!', '+1 (492) 675-6601', '::1'),
(13, 'shan', 'shan@gmail.com', '123', '+1 (923) 451-7113', '::1'),
(14, 'waqas', 'burewah@mailinator.com', 'Pa$$w0rd!', '+1 (253) 141-1217', '::1'),
(15, 'hamad', 'hammad@gmail.com', '1234', '1234556', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `order_date`, `order_status`) VALUES
(70, 14, 16755, 609198951, 16, '2022-06-21 08:23:03', 'Complete'),
(71, 15, 2030, 1746510725, 1, '2022-06-22 04:58:54', 'Complete'),
(72, 15, 350, 629998930, 1, '2022-06-22 04:44:01', 'pending'),
(73, 15, 800, 373868577, 1, '2022-06-22 04:47:53', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `special` varchar(10) NOT NULL,
  `recommend` varchar(50) NOT NULL,
  `featured` varchar(5) NOT NULL,
  `active` varchar(5) NOT NULL,
  `cook_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image`, `category_id`, `special`, `recommend`, `featured`, `active`, `cook_id`) VALUES
(1, 'Zinger with Coke', 'Rem accusamus d\r\n\r\n\r\n\r\n\r\n', '781', 'Food-Name-471.png', 2, 'yes', 'no', 'no', 'yes', 3),
(3, 'Chicken Nuggets', 'Molestiae qui non qu\r\n\r\n\r\n', '747', 'Food-Name-3486.png', 16, 'yes', 'no', 'no', 'yes', 4),
(4, 'Large Special Zinger', 'Amet ullam quia ani\r\n\r\n\r\n\r\n\r\n', '295', 'Food-Name-9338.png', 2, 'no', 'no', 'no', 'yes', 3),
(7, 'Fires', 'Asperiores atque qui\r\n', '82', 'Food-Name-4157.png', 3, 'yes', 'yes', 'yes', 'yes', 4),
(8, 'Blizzard Dairy Queen', '\r\n\r\ndfdsffsdf', '1000', 'Food-Name-8407.png', 1, 'yes', 'yes', 'yes', 'yes', 6),
(9, 'Cold Coffee ', '\r\n\r\ndadwqe', '300', 'Food-Name-7088.png', 7, 'no', 'yes', 'yes', 'yes', 3),
(10, 'Hot Coffee', '\r\n\r\nsdad', '350', 'Food-Name-9170.png', 7, '', 'yes', 'yes', 'yes', 5),
(11, 'Family Dinner', '\r\n\r\ndasda', '2500', 'Food-Name-2511.jpg', 6, '', 'yes', 'yes', 'yes', 5),
(12, 'Small Famliy Dinner', '\r\nasda', '1500', 'Food-Name-9570.png', 6, '', 'yes', 'yes', 'yes', 7),
(13, 'Royel Crust Pizza', '\r\n\r\nasdasdw', '1030', 'Food-Name-8134.png', 1, '', 'yes', 'yes', 'yes', 4),
(14, 'Lassania Pizza', '\r\n\r\ndwdwe', '800', 'Food-Name-6504.png', 1, '', 'yes', 'yes', 'yes', 3),
(15, 'Burger Combo', '\r\n\r\nafjsdkfj', '500', 'Food-Name-3171.jpg', 3, 'yes', 'yes', 'yes', 'yes', 4),
(16, 'Tikka Pizza', '\r\n\r\nerwe', '600', 'Food-Name-9920.png', 1, 'yes', 'yes', 'yes', 'yes', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hot_deal`
--

CREATE TABLE `hot_deal` (
  `id` int(11) NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hot_deal`
--

INSERT INTO `hot_deal` (`id`, `food_id`, `title`, `description`, `image`) VALUES
(1, 1, 'Special Offer', 'upto 50% off', 'about-img.png'),
(2, 1, 'Special Offer', '10%', 'banner-2.png'),
(3, 1, 'Jambo Offer', '40% off', 'banner-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`) VALUES
(25, '609198951', '16000', 'EasyPaisa', '1243413'),
(26, '1746510725', '1233', 'Jazz Cash', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) NOT NULL,
  `food_id` text NOT NULL,
  `invoice_no` int(50) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL,
  `cook_status` varchar(100) NOT NULL,
  `table_no` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `food_id`, `invoice_no`, `qty`, `order_status`, `cook_status`, `table_no`, `order_date`) VALUES
(60, 14, '8', 609198951, 3, 'Complete', 'Cooked', 1, '2022-06-22 05:10:32'),
(61, 14, '13', 609198951, 3, 'Complete', 'Uncooked', 1, '2022-06-21 08:23:03'),
(62, 14, '4', 609198951, 7, 'Complete', 'Uncooked', 1, '2022-06-21 08:23:03'),
(63, 14, '12', 609198951, 2, 'Complete', 'Uncooked', 1, '2022-06-21 08:23:03'),
(64, 14, '10', 609198951, 16, 'Complete', 'Uncooked', 1, '2022-06-21 08:23:03'),
(65, 15, '8', 1746510725, 1, 'Complete', 'Uncooked', 9, '2022-06-22 04:58:54'),
(66, 15, '13', 1746510725, 1, 'Complete', 'Uncooked', 9, '2022-06-22 04:58:54'),
(67, 15, '10', 629998930, 1, 'pending', 'Uncooked', 6, '2022-06-22 04:44:01'),
(68, 15, '14', 373868577, 1, 'pending', 'Uncooked', 5, '2022-06-22 04:47:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`chef_id`);

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
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `chef`
--
ALTER TABLE `chef`
  MODIFY `chef_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_url` varchar(255) NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` float NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
