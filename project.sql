-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 09, 2024 at 08:23 PM
-- Server version: 8.0.35
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int NOT NULL,
  `pid` int NOT NULL,
  `cqty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pid`, `cqty`) VALUES
(20, 41, 1),
(21, 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int NOT NULL,
  `pname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `qtyavail` int NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `category`, `description`, `price`, `qtyavail`, `img`, `brand`) VALUES
(27, 'Shelf 3', 'Shelf', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 250, 10, 's3.jpg', 'DIY'),
(30, 'Box 3', 'Box', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 370, 15, 'b3.jpg', 'DIY'),
(31, 'Closet 3', 'Closet', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 130, 19, 'cub3.jpg', 'DIY'),
(32, 'Chair 2', 'Chair', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 230, 12, 'c2.jpg', 'DIY'),
(33, 'Shelf 2', 'Shelf', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 350, 7, 's2.jpg', 'DIY'),
(34, 'Table 3', 'Table', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 160, 5, 't3.jpg', 'DIY'),
(35, 'Bed', 'Bed', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 575, 3, 'bed.jpg', 'DIY'),
(36, 'Table 2', 'Table', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 550, 12, 't2.jpg', 'DIY'),
(37, 'Chair 1', 'Chair', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 380, 3, 'c1.jpg', 'DIY'),
(38, 'Box 2', 'Box', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 270, 6, 'b2.jpg', 'DIY'),
(39, 'Shelf 1', 'Shelf', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 470, 15, 's1.jpg', 'DIY'),
(40, 'Closet 2', 'Closet', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 140, 5, 'cub2.jpg', 'DIY'),
(41, 'Box 1', 'Box', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 160, 8, 'b1.jpg', 'DIY'),
(42, 'Closet 1', 'Closet', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 140, 8, 'cub1.jpg', 'DIY'),
(43, 'Table 1', 'Table', 'Lorem ipsum dolor sit amet. Ab maiores dolorem eum galisum obcaecati aut temporibus itaque ut galisum molestiae nam similique similique aut alias omnis.', 370, 4, 't1.jpg', 'DIY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
