-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2024 at 01:06 PM
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
-- Database: `commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$m4QjQ8SzcMH9paTCn3586OmfvdIILHeFaGOSx3DRfnygFxwZeyLEO');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Women\'s Fashion'),
(2, 'Men\'s Fashion'),
(3, 'Accessories'),
(4, 'Shop');

-- --------------------------------------------------------

--
-- Table structure for table `lga`
--

CREATE TABLE `lga` (
  `lga_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `lga_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` enum('pending','paid','failed') NOT NULL DEFAULT 'pending',
  `reference` varchar(100) NOT NULL,
  `debited_amount` int(11) NOT NULL DEFAULT 0,
  `paygate_response` text NOT NULL DEFAULT '\'\\\'pending\\\'\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_total_amount`, `order_date`, `order_status`, `reference`, `debited_amount`, `paygate_response`) VALUES
(1, 1, 45.00, '2024-09-24 15:28:56', 'pending', '17271917361077390310', 0, ''),
(2, 1, 155.00, '2024-09-24 16:38:19', 'paid', '1727195899491619998', 15500, 'Verification successful'),
(3, 1, 155.00, '2024-09-24 16:44:19', 'paid', '1727196259477062804', 15500, 'Verification successful'),
(4, 1, 500.00, '2024-10-12 17:07:38', 'paid', '1728752858753025541', 50000, 'Verification successful'),
(5, 1, 415.00, '2024-10-13 16:13:20', 'paid', '1728836000580205206', 41500, 'Verification successful'),
(6, 1, 139.00, '2024-10-16 00:18:02', 'paid', '1729037882491423408', 13900, 'Verification successful'),
(7, 1, 90.00, '2024-10-16 00:25:43', 'paid', '1729038343234459223', 9000, 'Verification successful'),
(8, 1, 259.00, '2024-10-16 09:28:19', 'paid', '172907089964458168', 25900, 'Verification successful'),
(9, 1, 139.00, '2024-10-16 10:16:09', 'paid', '17290737691530968962', 13900, 'Verification successful'),
(10, 1, 95.00, '2024-10-27 10:59:23', 'pending', '1730026763483064936', 0, 'pendig'),
(11, 1, 95.00, '2024-10-27 10:59:41', 'pending', '17300267811845529513', 0, 'pendig'),
(12, 1, 95.00, '2024-10-27 11:19:45', 'pending', '17300279851984410318', 0, 'pendig'),
(13, 1, 95.00, '2024-10-27 11:30:35', 'pending', '173002863570122062', 0, 'pendig'),
(14, 1, 180.00, '2024-10-28 09:20:27', 'pending', '1730107227750783149', 0, 'pendig'),
(15, 1, 180.00, '2024-10-28 09:21:20', 'pending', '173010728055596872', 0, 'pendig'),
(16, 1, 139.00, '2024-10-29 10:28:14', 'paid', '17301976941697251871', 13900, 'Verification successful'),
(17, 1, 166.00, '2024-10-29 10:51:46', 'failed', '17301991061838354501', 0, 'Transaction reference not found.'),
(18, 1, 199.00, '2024-10-29 10:52:42', 'failed', '17301991621491695616', 0, 'Transaction reference not found.'),
(19, 1, 166.00, '2024-10-29 10:54:13', 'paid', '1730199253711126975', 16600, 'Verification successful'),
(20, 1, 180.00, '2024-10-29 10:56:04', 'pending', '17301993642027593989', 0, 'pendig'),
(21, 1, 180.00, '2024-10-29 11:14:40', 'paid', '1730200480633126169', 18000, 'Verification successful');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `amount`) VALUES
(1, 1, 2, 1, 45.00),
(2, 2, 3, 1, 50.00),
(3, 2, 2, 1, 45.00),
(4, 2, 4, 1, 60.00),
(5, 3, 2, 1, 45.00),
(6, 3, 3, 1, 50.00),
(7, 3, 4, 1, 60.00),
(8, 4, 1, 1, 100.00),
(9, 4, 2, 1, 100.00),
(10, 4, 4, 1, 120.00),
(11, 4, 3, 2, 60.00),
(12, 4, 7, 1, 40.00),
(13, 4, 8, 1, 20.00),
(14, 5, 12, 3, 90.00),
(15, 5, 9, 1, 100.00),
(16, 5, 13, 1, 45.00),
(17, 6, 2, 1, 79.00),
(18, 6, 3, 1, 60.00),
(19, 7, 6, 1, 50.00),
(20, 7, 7, 1, 40.00),
(21, 8, 2, 1, 79.00),
(22, 8, 3, 1, 60.00),
(23, 8, 4, 1, 120.00),
(24, 9, 2, 1, 79.00),
(25, 9, 3, 1, 60.00),
(26, 10, 19, 1, 55.00),
(27, 10, 20, 1, 40.00),
(28, 11, 19, 1, 55.00),
(29, 11, 20, 1, 40.00),
(30, 12, 19, 1, 55.00),
(31, 12, 20, 1, 40.00),
(32, 13, 19, 1, 55.00),
(33, 13, 20, 1, 40.00),
(34, 14, 3, 1, 60.00),
(35, 14, 4, 1, 120.00),
(36, 15, 3, 1, 60.00),
(37, 15, 4, 1, 120.00),
(38, 16, 2, 1, 79.00),
(39, 16, 3, 1, 60.00),
(40, 17, 2, 1, 79.00),
(41, 17, 1, 1, 87.00),
(42, 18, 2, 1, 79.00),
(43, 18, 4, 1, 120.00),
(44, 19, 1, 1, 87.00),
(45, 19, 2, 1, 79.00),
(46, 20, 3, 1, 60.00),
(47, 20, 4, 1, 120.00),
(48, 21, 3, 1, 60.00),
(49, 21, 4, 1, 120.00);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `paymernt_date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(50) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_refno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_name` varchar(150) NOT NULL,
  `products_price` decimal(10,2) NOT NULL,
  `products_description` text NOT NULL,
  `products_image` varchar(100) NOT NULL,
  `products_categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `products_price`, `products_description`, `products_image`, `products_categoryid`) VALUES
(1, 'Nova Knit', 87.00, 'The Nova Knit brings a sleek, modern look with its breathable fabric and comfortable fit. Ideal for relaxed days or a casual outing, it offers just the right amount of warmth.', 'comm670bcc71cc49d.jpg', 1),
(2, 'Haven Hoodie', 79.00, 'The Haven Hoodie is your ultimate comfort piece. With its soft fabric and relaxed fit, it’s perfect for staying cozy at home or on the go, offering both style and warmth.', 'female2.jpg', 1),
(3, 'Comfort Cove', 60.00, 'The Comfort Cove is designed for those who prioritize coziness. With its soft material and relaxed fit, this top is perfect for lounging at home or running errands in style.', 'female3.jpg', 1),
(4, 'Retreat Top', 120.00, 'The Retreat Top is designed for relaxation and style. With a chic silhouette and soft texture, it’s perfect for lounging or casual wear while keeping you warm.\r\n\r\n', 'female4.jpg', 1),
(5, 'Cascade Top', 70.00, 'The Cascade Top offers effortless comfort with a contemporary vibe. Perfect for lounging or casual outings, it’s crafted from a lightweight yet warm material that keeps you comfortable all day long.', 'male1.jpg', 2),
(6, 'Classic Fit ', 50.00, 'These chinos offer a perfect blend of comfort and style, ideal for both casual and semi-formal occasions. Crafted from soft, durable fabric, they feature a classic fit that flatters all body types. Dress them up with a blazer or keep it relaxed with a t-shirt for a versatile look.', 'male2.jpg', 1),
(7, 'Avenelle Top', 40.00, 'Effortlessly chic, the Avenelle Top boasts a flattering fit and subtle details, perfect for layering or wearing on its own for a polished look.', 'male3.jpg', 2),
(8, 'Serianzo Shirt', 20.00, 'The Serianzo Shirt offers a sophisticated yet laid-back aesthetic. Its tailored cut and breathable fabric make it a versatile staple for any occasion.', 'male4.jpg', 2),
(9, 'Lueur Coat', 100.00, 'Stay effortlessly chic with the Lueur Coat. Designed for ultimate comfort and style, it’s perfect for layering during cool, breezy days.\r\n\r\n', 'comm670bd21a57162.jpg', 2),
(10, 'Fiamma Drape', 120.00, 'Elevate your casual look with the Escava Top. Designed for ultimate comfort, its clean lines and premium fabric ensure you\'ll feel as good as you look.', 'comm670bd4a9bb6f2.jpg', 2),
(11, 'Calma Crew', 50.00, 'The Calma Crew combines serene style with unparalleled comfort. Its minimalist design and soft fabric make it ideal for both lounging at home and casual outings.', 'comm670bd63419ded.jpg', 2),
(12, 'Boreale Coat', 90.00, 'The Boreale Coat brings an element of sophistication to your outerwear collection. Crafted for both warmth and style, it’s perfect for brisk days and chilly nights.', 'comm670bd660633cc.jpg', 2),
(13, 'Mirage Top', 45.00, 'The Mirage Top offers a blend of comfort and style. Made from soft, durable fabric, it provides a laid-back look that effortlessly transitions from day to night.', 'comm670be2f9641f9.jpg', 2),
(14, 'Vento Top', 30.00, 'The Vento Top combines sleek design with lightweight warmth. Its tailored fit and premium fabric make it a must-have for transitional weather.', 'comm670be31f56a15.jpg', 2),
(15, 'Aventura Layer', 40.00, 'The Aventura Layer is designed for those who love adventure. Its soft, warm material and stylish cut make it the perfect companion for outdoor excursions.', 'comm670be68b70f66.jpg', 2),
(16, 'Réve Top', 55.00, 'Discover dreamy comfort with the Réve Top. This chic and versatile piece is designed for relaxed wear, whether you\'re at home or out with friends.', 'comm670be599cf83e.jpg', 2),
(17, 'Vistarae Tee', 70.00, 'The Vistarae Tee blends casual ease with refined style. Its lightweight, airy fabric offers unmatched comfort for both daily wear and relaxed evenings.', 'comm670be75eb7cc2.jpg', 2),
(18, 'Amelie Top', 20.00, 'The Amelie Top is a nod to effortless elegance. Its lightweight fabric and flattering cut make it a perfect choice for casual days or nights out.', 'femaleitem6.jpg', 1),
(19, ' Sienna Veste', 55.00, 'The Sienna Veste combines a timeless silhouette with modern flair. Its structured fit and cozy fabric make it ideal for layering in cooler weather.', 'femaleitem7.jpg', 1),
(20, 'Freja Wrap ', 40.00, 'The Freja Wrap is all about versatility and comfort. Crafted from soft, flowing material, it drapes beautifully for a relaxed yet stylish look.', 'femaleitem8.jpg', 1),
(21, 'Livia Tunic', 25.00, 'The Livia Tunic offers a blend of casual charm and understated elegance. Its relaxed fit and simple design make it perfect for easy, everyday wear.', 'femaleitem9.jpg', 1),
(22, 'Isolde Top', 35.00, 'The Isolde Top combines modern simplicity with refined style. Its soft fabric and flattering fit make it the perfect choice for a polished, everyday look.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'femaleitem10.jpg', 1),
(24, 'Ember Fleece', 110.00, 'The Ember Fleece offers the perfect blend of comfort and style. Crafted from ultra-soft material, it’s designed to keep you warm while looking effortlessly chic on any casual outing.', 'comm670be97d29240.jpg', 1),
(25, 'Urban Shield', 95.00, 'The Urban Shield combines street-smart style with warmth. With its adjustable hood and comfortable fabric, it’s perfect for the modern lifestyle, whether you’re at home or on the move.', 'comm670bedcb810ca.jpg', 1),
(26, 'Serenidad Sweat', 65.00, ' The Serenidad Sweat combines tranquility and comfort. With its stylish design and soft fabric, it’s perfect for both relaxation and casual adventures.', 'comm670beedbdc15e.jpg', 1),
(27, 'Brume Cabas', 200.00, 'The Brume Cabas combines casual elegance with everyday practicality. Its roomy interior and timeless design make it the go-to bag for all your daily essentials, from work to weekend outings.', 'comm670bf506d1df0.jpg', 3),
(28, 'Serene Shopper', 100.00, 'The Serene Shopper offers a perfect balance between fashion and function. Its spacious interior and timeless design make it ideal for everything from shopping trips to weekend getaways.', 'comm670bf6453d45d.jpg', 3),
(29, 'Willow Carryall', 70.00, 'The Willow Carryall is designed for those who need extra space without sacrificing style. Its roomy interior and chic design make it the ideal companion for busy days on the go.', 'comm670bf67793abc.jpg', 3),
(30, 'Cascade Purse', 80.00, 'The Cascade Purse embodies refined simplicity. Its clean lines and polished finish make it an everyday essential, perfect for carrying your small essentials with ease.', 'comm670bf79560188.jpg', 3),
(31, 'Summit Cap', 30.00, 'The Summit Cap brings a sleek and minimalistic style to your everyday look. Its adjustable fit and breathable fabric make it the perfect accessory for outdoor adventures or casual wear.\r\n\r\n', 'comm670bff3e53522.jpg', 3),
(32, 'Skybound Cap', 25.00, 'The Skybound Cap brings a fresh and modern look to your wardrobe. Lightweight and breathable, it’s ideal for outdoor activities or casual days out, offering a perfect blend of comfort and style.', 'comm670bfd2c0eeed.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `review_content` longtext NOT NULL,
  `reviewed_by` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_reviewed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `statename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_datereg` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `email`, `password`, `user_datereg`) VALUES
(1, 'somto', 'anaz', 'somto@gmail.com', '$2y$10$m4QjQ8SzcMH9paTCn3586OmfvdIILHeFaGOSx3DRfnygFxwZeyLEO', '2024-09-24 15:42:16'),
(2, 'ade', 'dave', 'ade@gmail.com', '$2y$10$NHLiCfnOnU8V60odvS4B6e/y4VtZhKpQUR.hHBTkSt.S4dkbFjpqi', '2024-10-22 11:54:43'),
(3, 'bobby', 'dave', 'bobby@gmail.com', '$2y$10$IsbPvrs9w4ud0/vGdD/fw.ChjfzO9q3rOnTeNhQ.H1gHRI5PF2Ot.', '2024-10-28 10:18:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
