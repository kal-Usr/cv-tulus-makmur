-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 01:57 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tls`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `slug`, `title`) VALUES
(16, 'kayu-lapis', 'kayu lapis'),
(17, 'lem-triplek', 'lem triplek'),
(18, 'cat-triplek', 'cat triplek'),
(19, 'example', 'example'),
(20, 'example-category', 'example-category'),
(21, 'kategori', 'kategori');

-- --------------------------------------------------------

--
-- Table structure for table `kaskeluar`
--

CREATE TABLE `kaskeluar` (
  `idkaskeluar` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `uangkeluar` int(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kaskeluar`
--

INSERT INTO `kaskeluar` (`idkaskeluar`, `keterangan`, `uangkeluar`, `tanggal`) VALUES
(1, 'dd', 2423, '2024-05-16'),
(2, 'ss', 2423, '2024-05-16'),
(3, 'zxcxcxcx', 2423, '2024-05-16'),
(4, 'sd', 21, '2024-06-05'),
(7, 'rw', 213, '2024-06-05'),
(8, 'transportasi', 1000000, '2024-05-20'),
(9, 'stok barang', 50000000, '2024-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `kasmasuk`
--

CREATE TABLE `kasmasuk` (
  `idkasmasuk` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `uangmasuk` int(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kasmasuk`
--

INSERT INTO `kasmasuk` (`idkasmasuk`, `keterangan`, `uangmasuk`, `tanggal`) VALUES
(4, 'kk', 20000, '2024-05-15'),
(5, 'koko', 2312, '2024-05-15'),
(8, '21xzxz12', 2312, '2024-05-15'),
(10, 'koko', 500000, '2024-05-01'),
(12, 'Pembeli', 35000000, '2024-05-24'),
(13, 'Customer', 2500000, '2024-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` enum('waiting','paid','delivered','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `date`, `invoice`, `total`, `name`, `address`, `phone`, `status`) VALUES
(27, 21, '2024-05-24', '2120240524192933', 30749982, 'Muhammad Hana Haikal', 'Jl.manggarai kelurahan bengkulu rt 03 rw 04 kab. bengkulu', '08976645232', 'paid'),
(30, 13, '2024-06-02', '1320240602102613', 50000000, '213', 'ds', '213', 'paid'),
(33, 13, '2024-06-04', '1320240604063434', 80000000, 'ewr', 'wr', '132', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `orders_confirm`
--

CREATE TABLE `orders_confirm` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_confirm`
--

INSERT INTO `orders_confirm` (`id`, `id_orders`, `account_name`, `account_number`, `nominal`, `note`, `image`) VALUES
(12, 27, 'Muhammad Hana Haikal', '0477864523', 30749982, 'Pembayaran Selesai', '2120240524192933-20240524193212.png'),
(13, 30, '213', '213', 321, '-123', '1320240602102613-20240602102717.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `id_orders`, `id_product`, `qty`, `subtotal`) VALUES
(37, 26, 33, 1, 249994),
(38, 27, 33, 3, 749982),
(39, 27, 31, 1, 30000000),
(40, 28, 32, 1, 50000000),
(41, 28, 33, 1, 249994),
(42, 29, 31, 1, 30000000),
(43, 30, 32, 1, 50000000),
(44, 31, 31, 1, 30000000),
(45, 32, 31, 40, 1200000000),
(46, 33, 32, 1, 50000000),
(47, 33, 31, 1, 30000000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `idpenjualan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `detail` text NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`idpenjualan`, `nama`, `tanggal`, `detail`, `total`) VALUES
(11, 'gogo3', '2024-05-10', 'Pembelian Cet Kayu\r\nlapis', 100000),
(14, 'gogo', '2024-05-10', 'Pembelian Cet Kayu\r\nlapis', 100000),
(15, 'Miuhammad Hana Haikal', '2024-05-01', 'gsdafsa', 54352235),
(16, 'pp', '2024-05-17', 'kflkadfas', 0),
(18, 'rwe', '0213-02-13', '213', 231),
(19, '213', '0003-02-13', '12', 1),
(20, 'dsf', '0321-02-13', '213', 132);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_category`, `slug`, `title`, `description`, `price`, `is_available`, `image`, `stock`) VALUES
(31, 16, 'plywood-lokal', 'plywood lokal', ' Dibuat oleh warga indonesia', 30000000, 1, 'kayu-lapis-20240524153928.png', 48),
(32, 16, 'plywood-import', 'plywood import', 'dibuat oleh warga australia', 50000000, 1, 'plywood-import-20240524154033.jpg', NULL),
(33, 17, 'lem-kayu-lapis', 'lem kayu lapis', 'lem lokal', 249994, 1, 'lem-kayu-lapis-20240524154957.png', NULL),
(34, 17, 'lem-plywood', 'lem plywood', 'lem import', 35000, 1, 'lem-plywood-20240524155026.jpg', NULL),
(35, 16, 'white-plywood', 'White Plywood', 'Triplek lokal', 100000, 1, 'white-plywood-20240525143922.png', NULL),
(36, 16, 'brown-plywood', 'brown-plywood', 'Triplek import', 250000, 1, 'brown-plywood-20240525144015.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member','pemilik') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `is_active`, `image`) VALUES
(13, 'admin', 'admin@gmail.com', '$2y$10$tvFrwYY1JZIhgLU3dUtvNez9QCpsQT0WduVo52xJmxSRXZndezPay', 'admin', 1, 'admin-20240526125830.jpg'),
(21, 'Pelanggan', 'pelanggan@gmail.com', '$2y$10$8FG70DOE/5O.L/ZOnsETJ.tY1CWtchdNyj01w6BfkvkR6luoihOO6', 'member', 1, 'pelanggan-20240526125655.jpg'),
(23, 'customer', 'customer@gmail.com', '$2y$10$tlQJ/ceW/rEapI.SPYp7XeQr/.q2R47LHlE8z6n1dNi5jmMSGcnmG', 'member', 1, 'customer-20240526125733.jpg'),
(24, 'pemilik', 'pemilik@gmail.com', '$2y$10$tvFrwYY1JZIhgLU3dUtvNez9QCpsQT0WduVo52xJmxSRXZndezPay', 'pemilik', 1, 'pemilik-20240523205431.jpg'),
(25, 'Pembeli', 'pembeli@gmail.com', '$2y$10$tuBHGLjBZOjlYO.fTBUsPuYyi7l1tLpTIB9A2jYxKCov/xeeZVQXK', 'member', 1, 'pembeli-20240526125747.jpg'),
(26, 'Buying', 'buying@gmail.com', '$2y$10$Kw3qr9Zks3qIMbw7whNnI.8knpHTa91SjzmDK0h44V5VxIlH41SN6', 'member', 0, 'buying-20240526125813.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kaskeluar`
--
ALTER TABLE `kaskeluar`
  ADD PRIMARY KEY (`idkaskeluar`);

--
-- Indexes for table `kasmasuk`
--
ALTER TABLE `kasmasuk`
  ADD PRIMARY KEY (`idkasmasuk`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_confirm`
--
ALTER TABLE `orders_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idpenjualan`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kaskeluar`
--
ALTER TABLE `kaskeluar`
  MODIFY `idkaskeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kasmasuk`
--
ALTER TABLE `kasmasuk`
  MODIFY `idkasmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders_confirm`
--
ALTER TABLE `orders_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `idpenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
