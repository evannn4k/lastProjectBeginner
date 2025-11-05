-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2025 at 07:27 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lastproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(3, 'evannihbos@gmail.com', 'ae74f72d212fb9871302a2459aeaf7b20bc2f792e4852be648a7d4e63967d9b1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Minuman'),
(2, 'Snack'),
(3, 'Buku & Alat Tulis'),
(4, 'Makanan'),
(5, 'Elektronik'),
(6, 'Pakaian'),
(7, 'Olahraga'),
(8, 'Aksesoris'),
(9, 'Otomotif'),
(14, 'Peralatan');

-- --------------------------------------------------------

--
-- Table structure for table `costumers`
--

CREATE TABLE `costumers` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `costumers`
--

INSERT INTO `costumers` (`id`, `name`, `email`, `gender`, `created_at`) VALUES
(1, 'Rizky', 'rizky0@outlook.com', 'Laki-laki', '2025-04-29 15:13:11'),
(2, 'Andy', 'andy123@yahoo.com', 'Laki-laki', '2025-07-03 15:13:11'),
(3, 'Maya', 'maya2@outlook.com', 'Perempuan', '2024-11-16 15:13:11'),
(4, 'Fajar', 'fajar3@example.com', 'Laki-laki', '2025-04-24 15:13:11'),
(5, 'Nisa', 'nisa4@yahoo.com', 'Perempuan', '2024-12-04 15:13:11'),
(7, 'Putri', 'putri6@yahoo.com', 'Perempuan', '2025-06-17 15:13:11'),
(8, 'Agus', 'agus7@gmail.com', 'Laki-laki', '2024-12-25 15:13:11'),
(9, 'Dewi', 'dewi8@outlook.com', 'Perempuan', '2025-07-09 15:13:11'),
(10, 'Budi', 'budi9@yahoo.com', 'Laki-laki', '2024-11-30 15:13:11'),
(11, 'Ayu', 'ayu10@example.com', 'Perempuan', '2025-08-05 15:13:11'),
(12, 'Bagus', 'bagus11@outlook.com', 'Laki-laki', '2025-03-15 15:13:11'),
(13, 'Indah', 'indah12@gmail.com', 'Perempuan', '2025-02-06 15:13:11'),
(14, 'Doni', 'doni13@example.com', 'Laki-laki', '2025-05-19 15:13:11'),
(15, 'Wulan', 'wulan14@yahoo.com', 'Perempuan', '2025-01-11 15:13:11'),
(16, 'Evan Nih Bos', 'evan16@gmail.com', 'Laki-laki', '2024-10-30 15:13:11'),
(17, 'Rina', 'rina16@example.com', 'Perempuan', '2025-03-27 15:13:11'),
(18, 'Hendra', 'hendra17@outlook.com', 'Laki-laki', '2025-06-08 15:13:11'),
(19, 'Lia', 'lia18@gmail.com', 'Perempuan', '2025-02-22 15:13:11'),
(20, 'Fajar', 'fajar19@yahoo.com', 'Laki-laki', '2024-09-10 15:13:11'),
(21, 'Maya', 'maya20@example.com', 'Perempuan', '2025-05-29 15:13:11'),
(22, 'Bagus', 'bagus21@gmail.com', 'Laki-laki', '2025-01-18 15:13:11'),
(23, 'Nisa', 'nisa22@outlook.com', 'Perempuan', '2024-12-27 15:13:11'),
(27, 'evan', 'evan@gmail.com', 'Laki-laki', '2025-08-23 06:06:59'),
(29, 'deni', 'deni@gmail.com', 'Laki-laki', '2025-08-30 10:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `admin_id` int NOT NULL,
  `costumer_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_payment` bigint NOT NULL,
  `total_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `admin_id`, `costumer_id`, `created_at`, `total_payment`, `total_product`) VALUES
(1, 1, 29, '2025-08-30 10:29:39', 57398000, 1),
(2, 1, 21, '2025-08-30 10:30:14', 49770000, 3),
(3, 1, 1, '2025-08-30 10:38:13', 2914000, 2),
(4, 1, 29, '2025-08-30 11:05:36', 1398000, 1),
(5, 3, 10, '2025-08-30 11:39:34', 512000, 1),
(6, 1, 10, '2025-09-02 15:02:26', 62553000, 3),
(7, 1, 21, '2025-10-14 11:23:43', 86097000, 1),
(8, 1, 16, '2025-10-14 11:24:57', 40000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `total_price` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `total_price`) VALUES
(1, 1, 4, 2, 57398000),
(2, 2, 1, 46, 184000),
(3, 2, 10, 8, 47192000),
(4, 2, 3, 6, 2394000),
(5, 3, 3, 2, 798000),
(6, 3, 6, 4, 2116000),
(7, 4, 9, 2, 1398000),
(8, 5, 2, 64, 512000),
(9, 6, 2, 32, 256000),
(10, 6, 8, 2, 56398000),
(11, 6, 10, 1, 5899000),
(12, 7, 4, 3, 86097000),
(13, 8, 1, 10, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `stock`, `image`) VALUES
(1, 'Indomie Goreng Spesial - Mie Goreng Sprecial - Mie Instant', 4, 4000, 38282, '1.jpeg'),
(2, 'Tarot Net Snack Potato Barbeque 32 g', 4, 8000, 1586, '2.webp'),
(3, 'Sepatu Running Putih', 7, 399000, 28, '3.jpeg'),
(4, 'Samsung Galaxy S25 Ultra 5G 12/256 12/512 12/1TB', 5, 28699000, 20, '4.webp'),
(5, 'Monitor PC Monitor 24 inch curved PC Gaming Monitor Desktop komputer 24 inch 75/165Hz', 5, 3499000, 49, '5.jpeg'),
(6, 'Xiaomi Smart Band 9 Active', 5, 529000, 8, '6.jpg'),
(7, 'Set Alat Pel Lantai STAINLESS Super Mop Dengan Ember Pencuci Putar360 - PINK PLASTIK', 14, 120000, 125, '7.jpeg'),
(8, 'Macbook', 5, 28199000, 27, '8.jpeg'),
(9, 'Alat pancing', 14, 699000, 24, '9.jpeg'),
(10, 'Samsung Galaxy A56 5G', 5, 5899000, 51, '10.jpeg'),
(11, 'Hoodie Cowok Putih', 6, 2499000, 63, '11.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_admin_id` (`admin_id`),
  ADD KEY `order_costumer_id` (`costumer_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id` (`order_id`),
  ADD KEY `order_product_product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `costumers`
--
ALTER TABLE `costumers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_costumer_id` FOREIGN KEY (`costumer_id`) REFERENCES `costumers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_product_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_product_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
