-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 04:03 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password`) VALUES
(1, 'admin', '$2y$10$IJvPXdNSvT71JncZA7OxZe10QDqz9cSRTx3sqNKDblbx6VwgJZpPe');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `birthday_month` varchar(10) NOT NULL,
  `birthday_year` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `birthday`, `birthday_month`, `birthday_year`) VALUES
(11, 'Ryan', 'Hertanto', 'ryanherrtanto@gmail.com', '$2y$10$gxFtqjDYYVIOudO2/b81x.1vS9N2lsoOieH2chtZo0kBesxZ4bDK6', '12343', '12', 'January', '2112'),
(12, 'Ryan', 'Hertanto', 'ryan.hertanto@student.umn.ac.id', '$2y$10$HNE2pgdNYrcFO7Pg4vvaIOWunvx0/MkPWCayEfIDnrEmZot9dzmD.', '123456789', '12', 'January', '2112'),
(13, 'Matthew', 'Marcellino', 'matthew.marcellino@yahoo.co.id', '$2y$10$vaaSq4OUu4j16yxMauwShesU.J6yUp485DXT4Ps8LP8aTTjbrmrVm', '0857949331', '1', 'January', '2000'),
(15, 'Shiba', 'Inu', 'admin@gmail.com', '$2y$10$8gTvfu.DYkbQ4VBDQllGCO50evA1wqBvw/RNhrOkFVaTRgMhSBqo.', '0818181818', '2', 'January', '2020'),
(16, 'Bryan', 'Kenneth', 'bryan@gmail.com', '$2y$10$SYy3ITyuvmOAIrahBjwFxeTcrrp1ZoOwt.e/mJIkXkwHG0IQ1uWh2', '065419', '23', 'January', '2222');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'appetizer'),
(2, 'main course'),
(3, 'sushi'),
(4, 'dessert'),
(5, 'drinks');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(10) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `image` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kategori`, `nama_menu`, `harga_menu`, `deskripsi`, `image`) VALUES
(1, 1, 'Miso Soup', 15000, 'Japanese soup made of dashi, miso, tofu, and seaweed', 'mSoup.jpg'),
(2, 1, 'Steam Tofu', 25000, 'Steamed tofu with \"Shiba Inu\" special sauce', 'steamTofu.jpg'),
(3, 1, 'Gyoza', 50000, 'Japanese dumpling made of minced meat and vegetables. Served 7pcs/portion.', 'gyoza.jpg'),
(4, 1, 'Takoyaki', 30000, 'Dough ball with squid, cheese, and smoked beef filling.', 'takoyaki.jpg'),
(5, 1, 'Kaarage', 35000, 'Japanese deep fried crispy chicken.', 'karage.jpg'),
(6, 1, 'Tempura', 25000, 'Deep fried shrimp coated with special flour.', 'tempuraa.jpg'),
(7, 3, 'Salmon Nigiri Sushi', 45000, 'Classic Nigiri Sushi with Fukushima fresh salmon.', 'sushiA.jpg'),
(8, 3, 'Sushi Set', 75000, 'Mixed variation of chef picked sushi.', 'sushiSet.jpg'),
(9, 3, 'Sushi Balado', 35000, 'Indonesian style of sushi, served with chili.', 'sushiB.jpg'),
(10, 3, 'Vegetarian Sushi', 50000, 'Vegetarian sushi for healthy life', 'sushiC.jpg'),
(11, 3, 'Family Sushi Set', 150000, 'Sushi set for family of 4 person.', 'sushiD.jpg'),
(12, 3, 'Sashimi Boat', 80000, 'Sashimi served with boat plate so you can take an aesthetic picture!', 'sushiE.jpg'),
(13, 4, 'Sanshoku Dango', 25000, 'Three-colored sweet and chewy dango.', 'dessertA.jpg'),
(14, 4, 'Dorayaki', 15000, 'Japanese traditional cake with chocolate filling', 'dessertB.jpg'),
(15, 4, 'Matcha Ice Cream', 35000, 'Matcha ice cream served with fresh fruits', 'dessertC.jpg'),
(16, 4, 'Strawberry Mochi', 30000, 'Japanese mochi with fresh strawberry inside.', 'dessertD.jpg'),
(17, 4, 'Sakura Mochi', 35000, 'Japanese mochi with sakura extract inside.', 'dessertE.jpg'),
(18, 4, 'Taro Tiramisu Cake', 35000, 'Delicious sweet cake made of taro.', 'dessertF.jpg'),
(25, 5, 'Refreshing sake', 45000, 'Japanese sake with lemon and ice.', 'drinkA.jpg'),
(26, 5, 'Ocha', 50000, 'Japanese traditional tea.', 'drinkB.jpg'),
(27, 5, 'Matcha Latte', 35000, 'A sweet latte mixed with matcha.', 'drinkC.jpg'),
(28, 5, 'Japanese Melon Soda', 30000, 'Special melon soda with ice cream on top.', 'drinkD.jpg'),
(29, 5, 'Exotic Japanese', 30000, 'Exotic sparkling water with syrup.', 'drinkE.jpg'),
(30, 5, 'Iced Thai Tea', 30000, 'Sweet milk tea from Thai.', 'drinkF.jpg'),
(31, 2, 'Yakiniku Donburi', 45000, 'A beef yakiniku ricebowl.', 'mainA.jpg'),
(32, 2, 'Chicken Katsu Curry Rice', 45000, 'Deep fried fillet chicken with japanese curry and rice.', 'mainB.jpg'),
(33, 2, 'Omurice', 35000, 'Yakimeshi wrapped with omlete.', 'mainC.jpg'),
(34, 2, 'Chicken Katsu Udon', 45000, 'Tasty udon served with Chicken Katsu.', 'mainD.jpg'),
(35, 2, 'Teriyaki Donburi', 55000, 'Japanese rice bowl served with beef teriyaki', 'mainE.jpg'),
(36, 2, 'Pork Miso Ramen', 45000, 'Japanese miso ramen served with pork belly. Non-halal.', 'mainF.jpg'),
(44, 1, 'Chawan Mushi', 25000, 'A japanese steamed egg mixed with dashi served in a tea cup.', 'chawan_mushi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `nama_menu`, `harga_menu`, `qty`, `total_bayar`) VALUES
(1, 'Tempura', 25000, 2, 50000),
(2, 'Steam Tofu', 25000, 3, 75000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
