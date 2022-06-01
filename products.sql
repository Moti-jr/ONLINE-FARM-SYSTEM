-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 12:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `weight` decimal(10,0) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `previous_price` decimal(10,0) NOT NULL,
  `per_unit` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `search_term` varchar(50) DEFAULT NULL,
  `Rating` int(30) NOT NULL,
  `Date Added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `weight`, `unit`, `previous_price`, `per_unit`, `category`, `img`, `color`, `search_term`, `Rating`, `Date Added`) VALUES
(1, 'Cabbage', 'Fresh and Tasty, large in size', '1', 'Kilograms', '13', '10', 'Vegetable', 'cabbage.jpg', 'Green', 'Vegetable,Cabbage', 5, '2022-04-09 20:41:34'),
(2, 'Banana', 'Fresh and Tasty, large in size', '1', 'Kilograms', '15', '12', 'Vegetable', 'Banana.jpg', 'Yellow', 'Fruit,Banana', 4, '2022-04-04 14:37:32'),
(3, 'Apple', 'Fresh and Tasty, large in size', '1', 'Kilograms', '22', '20', 'Fruit', 'Apple.jpg', 'Green and ', 'Fruit, Apple', 5, '2022-04-04 14:37:36'),
(4, 'Carrot', 'Fresh and Tasty, large in size', '1', 'Kilograms', '16', '15', 'Tubers', 'Carrot.jpg', 'Red', 'Tubes, Carrot', 3, '2022-04-04 14:37:44'),
(5, 'Eggplant', 'Fresh and Tasty, large in size', '1', 'Kilograms', '16', '13', 'Fruit', 'Eggplant.jpg', 'Black', 'Fruit, Eggplant', 5, '2022-04-09 18:46:59'),
(6, 'Clari Fruit', 'Fresh and Tasty, large in size', '1', 'Kilograms', '16', '13', 'Fruit', 'Clari fruit.png', 'Purple', 'Fruit, Clari Fruit', 4, '2022-04-09 18:46:54'),
(7, 'Coronavirus Fruit', 'Fresh and Tasty, large in size', '1', 'Kilograms', '15', '13', 'Fruit', 'Coronavirus Fruit.jpg', 'Purple', 'Fruit, Coronavirus Fruit', 2, '2022-04-09 18:46:42'),
(8, 'Tomatoes', 'Fresh and Tasty, large in size', '1', 'Kilograms', '15', '13', 'Fruit', 'Tomatoes1.jpg', 'Red', 'Fruit/Vegetable, Tomato', 4, '2022-04-09 18:46:38'),
(9, 'Ovacoda', '100% organic', '1', 'Kilograms', '20', '15', 'Fruit', 'Ovacado.jpg', '', 'Fruit, Ovacado', 3, '2022-04-09 18:46:32'),
(10, 'Potatoes', 'From the best Kenyan Farms', '2', 'Kilograms', '90', '80', 'Tubers', 'Potatoes.jpg', '', 'Tubers,Potatoes', 5, '2022-04-04 14:38:18'),
(11, 'Cabbage', 'Best organic produce', '1', 'Kilograms', '30', '25', 'Vegetable', 'Cabbage.jpg', '', 'Vegetable,Cabbage', 0, '2022-04-09 18:46:21'),
(12, 'Pineapple', 'Fresh and Tasty, large in size', '1', 'Kilograms', '25', '20', 'Fruit', 'Pineapple.jpg', 'Red', 'Fruit, Pineapple', 0, '2022-04-07 19:50:16'),
(13, 'Barley', 'Dry,100% Organic', '2', 'Kilograms', '100', '90', 'Grains', 'Barley.jpg', 'Wheat', 'Grains,Cereals,Barley', 0, '2022-04-09 18:45:23'),
(14, 'Beans', 'Fresh, Dried', '2', 'Kilograms', '100', '80', 'Grains', 'Beans.jpg', 'Brown', 'Grains, Beans', 0, '2022-04-09 18:36:01'),
(15, 'Brocolli', 'Fresh and Tasty, large in size', '1', 'Kilograms', '100', '70', 'Vegetable', 'Broccolli.jpg', 'Green', 'Vegetable, Brocolli', 0, '2022-04-09 18:48:55'),
(16, 'Sauteed Green Beans', 'Fresh and Tasty, large in size', '1', 'Kilograms', '100', '70', 'Legumes', 'Sauteed Green Beans.jpg', 'Green', 'Legumes, Sauteed Green Beans', 0, '2022-04-09 18:49:56'),
(17, 'Sweet Corn Grains', 'Fresh and Tasty, large in size', '1', 'Kilograms', '100', '70', 'Grains,Cereals', 'Sweet Corn Grains.jpg', 'Ye', 'Grains, Sweet Corn Grains', 0, '2022-04-09 18:51:12'),
(18, 'Millet', 'Large in size', '2', 'Kilograms', '100', '85', 'Grains', 'Millet1.jpg', 'Brown', 'Grains, Cereals, Millet', 0, '2022-04-09 18:53:27'),
(19, 'Sweet Potatoes', 'Large in size, Amazingly sweet', '1', 'Kilograms', '120', '80', 'Tubers', 'Sweet Potatoes.jpg', 'Brown', 'Tubers, Sweet Potatoes', 0, '2022-04-09 18:55:04'),
(20, 'Orange', 'Tasty', '1', 'Kilograms', '22', '20', 'Fruit', 'Orange.jpg', 'Orange', 'Fruit,Orange', 0, '2022-04-12 08:21:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
