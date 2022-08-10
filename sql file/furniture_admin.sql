-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 03:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`) VALUES
(1, 'Bed'),
(2, 'Chair'),
(3, 'Cupboard'),
(4, 'Sofa'),
(5, 'Table');

-- --------------------------------------------------------

--
-- Table structure for table `furniture_product`
--

CREATE TABLE `furniture_product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `product_views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `furniture_product`
--

INSERT INTO `furniture_product` (`id`, `categories_id`, `name`, `image`, `description`, `quantity`, `price`, `product_views`) VALUES
(1, 1, 'Double Sized Bed (4x7x1)ft', 'beds4.jpg', 'Double size 4x6ft (mattress size)Made of salla wood Height of bed 10 inch', 2, 35000, 2),
(2, 1, 'Bed & P Form Mattress', 'beds2.jpg', 'Type : bed set\r\nMaterial : Masala,saaj and sallo wood & Ply Board\r\nColor : Dark Brown\r\nWarranty : 60 Months on wood Only\r\nSize Bed : 4Ft*6Ft\r\nSize P Foam : 4Ft*6Ft', 4, 25500, 7),
(3, 1, '2 copule Bed', 'beds3.jpg', 'Type: Bed Set\r\nColor: Dark brown', 2, 15000, 5),
(9, 1, 'Medium sized bed', 'beds3.jpg', 'Type: Bedset', 4, 25000, 74),
(10, 1, 'Double Sized Bed', 'beds5.jpg', 'Size: 4x6ft\r\nBlack Color', 2, 20000, 1),
(11, 2, 'Solid office Revolving Chair', 'chair1.jpg', 'Type: Office Chair\r\nMaterial: Plastic and Net\r\nColor: Black', 20, 5500, 2),
(12, 2, 'Office Chair', 'chair2.png', 'Color: Light Brown', 15, 9500, 0),
(13, 2, 'Black Chair', 'chair3.jpeg', 'Color: Black', 20, 3500, 2),
(14, 2, 'Revolving Chair with HeadSet', 'chair4.jpg', 'Steel Base\r\nComfortable, Flexible & Adjustable\r\nSupport For Neck\r\nNet Back Support\r\nFixed Arms', 15, 7000, 0),
(15, 2, 'Revolving Office Chair', 'chair5.jpg', 'Gray Color', 10, 8000, 6),
(16, 2, 'Revolving yellow Chair', 'chair6.jpg', 'Color: Yellow\r\nResolve Backpain', 13, 8000, 3),
(17, 2, 'Solid Executive Office Chair', 'chair8.jpg', 'Type: Office Chair\r\nMaterial: Plastic and Net\r\nMesh back with headrest\r\nAdjustable lumber support\r\nPP adjustable Arms with PU Pad\r\nChrome base\r\nDimension(L x B inch): 46x 20', 15, 20500, 399),
(18, 2, 'Revoloving Light Black Chair', 'chair7.jpg', 'Type: Office Chair\r\nMaterial: Plastic', 25, 3500, 13),
(19, 3, 'Ply Wood Wardrobe', 'cupboard.jpg', 'Color: Black\r\nSize: 4x6 ft', 4, 26000, 5),
(20, 3, 'Black Daraz', 'cupboard1jpg.jpg', 'Color: Black-red\r\nSize: 4x7 ft', 2, 30700, 5),
(21, 3, 'Wardrobe 4x6 ft', 'cupboard2.jpg', 'Color: Black-red\r\nSize: 4x6 ft', 2, 25000, 0),
(22, 4, 'Local Corner Sofa', 'sofa1.jpg', 'Free home delivery\r\nLuxury Cushionwith a comfortable seat\r\nHigh-quality material', 2, 41500, 61),
(23, 4, 'Muda Corner Sofa', 'sofa2.jpg', 'Free home delivery\r\nLuxury Cushionwith a comfortable seat\r\nHigh-quality material', 2, 30000, 6),
(24, 4, 'Comfortable Sofa for Guest', 'sofa3.jpg', 'Free home delivery\r\nLuxury Cushionwith a comfortable seat\r\nHigh-quality material', 3, 50000, 2),
(25, 4, 'Double Back Sofa', 'sofa5.jpeg', 'Comfortable Kusan\r\n5 seater sofa\r\nAttractive Handle\r\nUse high-Quality cloth\r\nLuxury Kusan with a comfortable seat', 4, 23000, 0),
(26, 5, 'Black Desk', 'desk1.jpg', 'Portable design, fold and set for use quickly & easily.', 5, 5000, 0),
(27, 5, 'Office Table', 'desk2.jpg', 'Wooden Office Study Table\r\nMaterial: Wood ,19mm ,10mmPlyboard Used & Maad Formica\r\nColor: Black', 3, 9000, 0),
(28, 5, 'Computer Table', 'desk3.jpg', 'Wooden Computer Desktop Table\r\nColor: Black', 5, 5000, 0),
(29, 5, 'Desktop Computer Table', 'desk4.jpg', 'Wooden Table\r\nMaterial: Wood ,15mmPlyboard \r\nColor: Black', 3, 4800, 0),
(30, 5, 'Office Table for study', 'desk5.jpg', 'Wooden Office Study Table\r\nMaterial: Wood \r\nColor: Black', 6, 10000, 0),
(31, 5, 'Laptop Stand Table', 'table7.jpg', 'Wooden Table\r\nMaterial: Wood', 4, 3500, 1),
(33, 5, '6 seat dining table', 'table2.jpg', 'Free home delivery ktm valley\r\nComfortable chair', 4, 40700, 5),
(34, 5, 'Dining Table with 6 chairs', 'table3.jpg', 'Free home delivery ktm valley\r\nComfortable chair', 4, 15000, 21),
(36, 5, '4 seated chair Dining Table', 'table5.jpg', 'Black color\r\nFree home delivery ktm valley\r\nComfortable chair', 2, 25000, 2),
(37, 5, 'Computer table Study', 'table6.jpg', 'Free home delivery', 2, 3000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `name`, `rating`, `review`, `pid`) VALUES
(1, 5, 'Aadarsha', 5, 'ramro xa product office ko lagi matrai.', 18),
(3, 5, 'Aadarsha', 5, 'best for work from home and gaming.', 17),
(4, 5, 'Aadarsha', 3, 'ali thikai lagyo malai.', 16),
(5, 6, 'Abhishek ', 5, 'manparyo.', 17),
(6, 6, 'Abhishek', 5, 'ekdum comfortable xa \r\njiu dhukdaina.', 15),
(7, 6, 'Abhishek', 3, 'office ko lagi ramro xa.', 13),
(8, 7, 'Sita Magar', 5, 'Chair gaming, work from home ko lagi \r\nthikxa.', 17),
(9, 7, 'Sita Magar', 5, 'Expensive product bhaye ni\r\nsit comfortable xa.', 15),
(10, 7, 'Sita', 4, 'comfortable sit with excellent price ma.', 11),
(11, 7, 'Sita', 4, 'Satisfied product.', 17),
(12, 7, 'Sita', 3, 'Very good products', 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `l_name`, `username`, `email`, `mobile`, `address`, `city`, `password`) VALUES
(5, 'Aadarsha', 'Shakya', 'aadarsha', 'aadarsha888@gmail.com', 9813801331, 'Dallu, Dhimeloha', 'Kathmandu', 'hello@123'),
(6, 'Abhishek ', 'Maharjan', 'abhishek', 'abhishek123@gmail.com', 9844829707, 'Swayambhu,Bhuikhel', 'Kathmandu', 'abhi@123'),
(7, 'Sita ', 'Magar', 'sita', 'sita234@gmail.com', 9841534258, 'MangalBazar', 'Lalitpur', 'sita@123');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `image` text NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`user_id`, `name`, `contact`, `address`, `city`, `email`, `image`, `product_name`, `total_amount`, `payment`) VALUES
(9, 'Abhishek Maharjan', 9844829707, 'Swayambhu,Bhuikhel', 'Kathmandu', 'abhishek123@gmail.com', 'cupboard1jpg.jpg', 'Black Daraz', 30700, 1),
(10, 'Sita Magar', 9841534258, 'MangalBazar', 'Lalitpur', 'sita234@gmail.com', 'beds2.jpg', 'Bed & P Form Mattress', 25500, 0),
(13, 'Aadarsha Shakya', 9813801331, 'Dallu', 'Kathmandu', 'aadarsha888@gmail.com', 'chair8.jpg', 'Solid Executive Office Chair', 20500, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `furniture_product`
--
ALTER TABLE `furniture_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `furniture_product`
--
ALTER TABLE `furniture_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
