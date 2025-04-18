-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 11:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dryfruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(2, 'balaj', 'abc', '$2y$10$YxNRDDDXw6ImCKPSMRHI4.2p6gii6PZPyCpggYq0KWd0XnY9W7tF2');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_keywords`, `product_image`, `product_price`, `date`, `status`) VALUES
(1, 'Almonds', 'badam almonds almond badaam gilgit_fruits healthy', 'Almonds.jpg', '1500 Rs', '2023-05-17 13:03:03', 0),
(2, 'Dried Apricot', 'khubani dry_khubani apricot dry_fruit gilgit chilgoza ', 'Apricot_img.jpg', '2500 Rs', '2023-05-17 13:04:56', 0),
(3, 'Dried Figs', 'figs dry_figs shilajeet honey kingdom store', 'Dried_figs.jpg', '2300 Rs', '2023-05-17 13:23:45', 0),
(5, 'Walnuts', 'walnuts akhrot pure_honey dried_grapes', 'walnuts_img.jpg', '3000 Rs', '2023-05-17 14:13:57', 0),
(6, 'Pine Nuts', 'chilgoza nuts pista', 'chilgoza.jpg', '6000 Rs', '2023-05-17 14:15:30', 0),
(7, 'Black Mulberry', 'Toot_sia mulberry dry_fruit white_mulberry', 'black mulberry.jpg', '2500 Rs', '2023-05-17 14:19:13', 0),
(8, 'White Mulberry ', 'toot white_mulberry black_mulberry pista nuts ', 'white mulberry.jpg', '3000 Rs', '2023-05-17 14:20:54', 0),
(9, 'GB Chocolate', 'kilao desi_choclate nuts_caramel ', 'kilao.jpg', '6500 Rs', '2023-05-17 14:22:29', 0),
(10, 'Shilajeet', 'salajeet honey pista toot', 'silajeet.jpg', '3400 Rs', '2023-05-17 14:29:56', 0),
(11, 'Dried Grapes', 'kishmish toot toot_sia almonds', 'kishmish.jpg', '2500 Rs', '2023-05-17 14:32:56', 0),
(12, 'Pistachio', 'pista honey chilgoza ', 'Pista.jpg', '6000 Rs', '2023-05-17 14:34:17', 0),
(13, 'Gilgit Pure Honey', 'honey salajeet pista ', 'honey.jpg', '1500 Rs', '2023-05-17 14:35:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'asif', 'asif123@gmail.com', '$2y$10$0wjvhvXdv7Pj0LG96M94peeEq/9nS6pa2E/SoC2/FrFaRUMOWx5g.', '::1', 'bahawalpur', '99999'),
(2, 'balaj', 'balajhussain1122@gmail.com', '$2y$10$YFDu8IMskYtupeOo8UtqvOt6iKrsncoA/E/SXqpoUZdvp4tgOyIha', '::1', 'bahawalpur', '03465407068'),
(3, 'asima', 'asima@gmail.com', '$2y$10$N1Lh16xoesO7ygb4T2BScex04USEZNW3004L6j2X.dgL5ntNMNIUi', '::1', 'bwp', '123456789'),
(4, 'hussain', 'hussain@gmial.com', '$2y$10$EqZ7RVRDE6wZmsAZ44uKBOe5DpIJp7h93N6w0GDOVS81sNk2cclCy', '::1', 'baseen', '03554531039'),
(5, 'abbas', 'abc@gmail.com', '$2y$10$xWUZs7o7xKXp2dF/1ZN79ei0bD6tB6YbU.MP3cr0k93Ywgtc9D8i.', '::1', 'ABC', '12345'),
(6, 'waseem', 'waseem', '$2y$10$ao8ISItbNhL2hJx.3pMg8e9X05ClesANIh1Q7URweShnvPR2P7UQi', '::1', 'bwp', '1234556'),
(7, 'faizan', 'faizan@gmail.com', '$2y$10$1CTlq8SKcXyYA9q4aTe/5O/aJVws0SrxugsjfW3PDGcN4/NYPbIw6', '::1', 'gilgit', '03169305881'),
(8, 'sabbeh', 'sabbeh', '$2y$10$A.tjbangzEdy822P.QooxONL/q.8dMVaNRCCfECIOkm1fS8cRelEu', '::1', 'aa', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
