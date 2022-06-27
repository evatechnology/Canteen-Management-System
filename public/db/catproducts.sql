-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 05:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `catproducts`
--

CREATE TABLE `catproducts` (
  `catproid` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `psstatus` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catproducts`
--

INSERT INTO `catproducts` (`catproid`, `category`, `brand`, `product`, `psstatus`, `created_at`, `updated_at`) VALUES
(1, 'Beverages', 'Pran', 'Pran Drinks Water 500 ml', 1, '2021-03-22 04:34:09', NULL),
(2, 'Culinary', 'Pran', 'Pran Honey', 1, '2021-03-22 04:34:09', NULL),
(3, 'Chocolate', 'Pran', 'Aamros Candy', 1, '2021-03-22 04:34:09', NULL),
(4, 'Biscuit and Bakery', 'Pran', 'All Time Bun', 1, '2021-03-22 04:34:09', NULL),
(5, 'Biscuit and Bakery', 'Pran', 'All Time Cartoon Cake', 1, '2021-03-22 04:34:09', NULL),
(6, 'Biscuit and Bakery', 'Pran', 'All Time Chessboard Cookies', 1, '2021-03-22 04:34:09', NULL),
(7, 'Biscuit and Bakery', 'Pran', 'All Time Chocolate Cookie', 1, '2021-03-22 04:34:09', NULL),
(8, 'Biscuit and Bakery', 'Pran', 'All Time Croissand', 1, '2021-03-22 04:34:09', NULL),
(9, 'Biscuit and Bakery', 'Pran', 'All Time Cup Cake', 1, '2021-03-22 04:34:09', NULL),
(10, 'Biscuit and Bakery', 'Pran', 'All Time Dry Cake', 1, '2021-03-22 04:34:09', NULL),
(11, 'Biscuit and Bakery', 'Pran', 'All Time Family Cake', 1, '2021-03-22 04:34:09', NULL),
(12, 'Biscuit and Bakery', 'Pran', 'All Time Family Cake Chocolate', 1, '2021-03-22 04:34:09', NULL),
(13, 'Biscuit and Bakery', 'Pran', 'All Time Family Cake Mixed Fruit', 1, '2021-03-22 04:34:09', NULL),
(14, 'Biscuit and Bakery', 'Pran', 'All Time Family Cake Plain Cake', 1, '2021-03-22 04:34:09', NULL),
(15, 'Biscuit and Bakery', 'Pran', 'All Time French Bun', 1, '2021-03-22 04:34:09', NULL),
(16, 'Biscuit and Bakery', 'Pran', 'All Time Honeycomb', 1, '2021-03-22 04:34:09', NULL),
(17, 'Biscuit and Bakery', 'Pran', 'All Time Jelly Bun', 1, '2021-03-22 04:34:09', NULL),
(18, 'Biscuit and Bakery', 'Pran', 'All Time Milk Bread', 1, '2021-03-22 04:34:09', NULL),
(19, 'Biscuit and Bakery', 'Pran', 'All Time Motichur Laddu', 1, '2021-03-22 04:34:09', NULL),
(20, 'Biscuit and Bakery', 'Pran', 'All Time Peanut Butter Biscuits', 1, '2021-03-22 04:34:09', NULL),
(21, 'Biscuit and Bakery', 'Pran', 'All Time Plain Cake', 1, '2021-03-22 04:34:09', NULL),
(22, 'Biscuit and Bakery', 'Pran', 'All Time Sandwich Bread', 1, '2021-03-22 04:34:09', NULL),
(23, 'Biscuit and Bakery', 'Pran', 'All Time Sandwich Cake', 1, '2021-03-22 04:34:09', NULL),
(24, 'Chocolate', 'Pran', 'Atom Gum', 1, '2021-03-22 04:34:09', NULL),
(25, 'Chocolate', 'Pran', 'Babylon', 1, '2021-03-22 04:34:09', NULL),
(26, 'Biscuit and Bakery', 'Pran', 'Bisk Club Fruit Fun', 1, '2021-03-22 04:34:09', NULL),
(27, 'Biscuit and Bakery', 'Pran', 'Bisk Club Lexus Biscuit', 1, '2021-03-22 04:34:09', NULL),
(28, 'Beverages', 'Pran', 'Braver', 1, '2021-03-22 04:34:09', NULL),
(29, 'Beverages', 'Pran', 'Cheer Up', 1, '2021-03-22 04:34:09', NULL),
(30, 'Chips & Crackers', 'Pran', 'Diamond Potato Crackers', 1, '2021-03-22 04:34:09', NULL),
(31, 'Beverages', 'Pran', 'Drinko', 1, '2021-03-22 04:34:09', NULL),
(32, 'Beverages', 'Pran', 'Fazlee Mango Fruit Drink 250 ml', 1, '2021-03-22 04:34:09', NULL),
(33, 'Biscuit and Bakery', 'Pran', 'Fit Crackers (Masala)', 1, '2021-03-22 04:34:09', NULL),
(34, 'Biscuit and Bakery', 'Pran', 'Fit Crackers- Milk Flavored', 1, '2021-03-22 04:34:09', NULL),
(35, 'Chocolate', 'Pran', 'Fruitfil', 1, '2021-03-22 04:34:09', NULL),
(36, 'Snacks', 'Pran', 'Jhal Muri', 1, '2021-03-22 04:34:09', NULL),
(37, 'Snacks', 'Pran', 'Hot Chanachur', 1, '2021-03-22 04:34:09', NULL),
(38, 'Snacks', 'Pran', 'Jhatpot Aloo Paratha', 1, '2021-03-22 04:34:09', NULL),
(39, 'Snacks', 'Pran', 'Jhatpot Aloo Puri', 1, '2021-03-22 04:34:09', NULL),
(40, 'Snacks', 'Pran', 'Jhatpot Beef Burger Patty', 1, '2021-03-22 04:34:09', NULL),
(41, 'Snacks', 'Pran', 'Jhatpot Chicken Sausage', 1, '2021-03-22 04:34:09', NULL),
(42, 'Chips & Crackers', 'Pran', 'Junior Potato Cracker', 1, '2021-03-22 04:34:09', NULL),
(43, 'Beverages', 'Pran', 'Latina Apple', 1, '2021-03-22 04:34:09', NULL),
(44, 'Snacks', 'Pran', 'Mango Bar', 1, '2021-03-22 04:34:09', NULL),
(45, 'Beverages', 'Pran', 'MaxxCola', 1, '2021-03-22 04:34:09', NULL),
(46, 'Chips & Crackers', 'Pran', 'Moja Potato Crackers', 1, '2021-03-22 04:34:09', NULL),
(47, 'Snacks', 'Pran', 'Mr Noodles', 1, '2021-03-22 04:34:09', NULL),
(48, 'Beverages', 'Pran', 'OSCAR', 1, '2021-03-22 04:34:09', NULL),
(49, 'Beverages', 'Pran', 'Power Drink', 1, '2021-03-22 04:34:09', NULL),
(50, 'Beverages', 'Pran', 'Pasteurized Milk', 1, '2021-03-22 04:34:09', NULL),
(51, 'Chocolate', 'Pran', 'Pluto Chocolate Gems', 1, '2021-03-22 04:34:09', NULL),
(52, 'Biscuit and Bakery', 'Pran', 'PRAN All Time Choco Toast', 1, '2021-03-22 04:34:09', NULL),
(53, 'Beverages', 'Pran', 'PRAN Chocolate Milk', 1, '2021-03-22 04:34:09', NULL),
(54, 'Beverages', 'Pran', 'PRAN Frooto', 1, '2021-03-22 04:34:09', NULL),
(55, 'Culinary', 'Pran', 'PRAN Hot Tomato Sauce', 1, '2021-03-22 04:34:09', NULL),
(56, 'Beverages', 'Pran', 'PRAN Joy Mango Drink', 1, '2021-03-22 04:34:09', NULL),
(57, 'Beverages', 'Pran', 'PRAN Junior Fruit Drink', 1, '2021-03-22 04:34:09', NULL),
(58, 'Beverages', 'Pran', 'PRAN Junior Mixed Fruit Drink', 1, '2021-03-22 04:34:09', NULL),
(59, 'Beverages', 'Pran', 'PRAN Mango Milk', 1, '2021-03-22 04:34:09', NULL),
(60, 'Biscuit and Bakery', 'Ispahani', 'Little Bite Pineapple Cream Biscuit', 1, '2021-03-22 04:34:09', NULL),
(61, 'Biscuit and Bakery', 'Ispahani', 'Little Bite Chocolate Cream Biscuit', 1, '2021-03-22 04:34:09', NULL),
(62, 'Biscuit and Bakery', 'Ispahani', 'Lexus Vegetable Crackers Biscuit', 1, '2021-03-22 04:34:09', NULL),
(63, 'Biscuit and Bakery', 'Ispahani', 'Bakery Fresh Sweet Toast', 1, '2021-03-22 04:34:09', NULL),
(64, 'Biscuit and Bakery', 'Ispahani', 'Premium Sweet Toast', 1, '2021-03-22 04:34:09', NULL),
(65, 'Biscuit and Bakery', 'Ispahani', 'Bakery Fresh Dry Cake', 1, '2021-03-22 04:34:09', NULL),
(66, 'Chips & Crackers', 'Ispahani', 'Potato Crackers Spicy Vegetable', 1, '2021-03-22 04:34:09', NULL),
(67, 'Chips & Crackers', 'Ispahani', 'Mighty Chips Italian Tomato', 1, '2021-03-22 04:34:09', NULL),
(68, 'Culinary', 'Ispahani', 'ISPI Orange Instant Powder Drink', 1, '2021-03-22 04:34:09', NULL),
(69, 'Chocolate', 'Nestle', 'Nestle Kit Kat Chocolate', 1, '2021-03-22 04:34:09', NULL),
(70, 'Chocolate', 'Amul', 'Amul Dark Chocolate', 1, '2021-03-22 04:34:09', NULL),
(71, 'Chocolate', 'Amul', 'Amul Milk Chocolate', 1, '2021-03-22 04:34:09', NULL),
(72, 'Chocolate', 'Cadbury', 'Cadbury Fudge Chocolate', 1, '2021-03-22 04:34:09', NULL),
(73, 'Chocolate', 'CBL', 'CBL Munchee Chocolate Fingers', 1, '2021-03-22 04:34:09', NULL),
(74, 'Chocolate', 'Snickers', 'Snickers', 1, '2021-03-22 04:34:09', NULL),
(75, 'Chocolate', 'Cadbury', 'Dairy Milk', 1, '2021-03-22 04:34:09', NULL),
(76, 'Biscuit and Bakery', 'Gold Mark', 'Chocolate Boom Biscuits', 1, '2021-03-22 04:34:09', NULL),
(77, 'Biscuit and Bakery', 'Olympic', 'Digestive Biscuits', 1, '2021-03-22 04:34:09', NULL),
(78, 'Biscuit and Bakery', 'Olympic', 'Olympic Dry Cake Biscuits', 1, '2021-03-22 04:34:09', NULL),
(79, 'Biscuit and Bakery', 'Danish', 'Danish Dry Cake Biscuits', 1, '2021-03-22 04:34:09', NULL),
(80, 'Biscuit and Bakery', 'Ifad', 'Ifad Dry Cake', 1, '2021-03-22 04:34:09', NULL),
(81, 'Beverages', 'Ifad', 'IFAD DRINKING WATER', 1, '2021-03-22 04:34:09', NULL),
(82, 'Chips & Crackers', 'Ifad', 'IFAD WAVY', 1, '2021-03-22 04:34:09', NULL),
(83, 'Chips & Crackers', 'Ifad', 'IFAD EGGY PILLOW CHIPS', 1, '2021-03-22 04:34:09', NULL),
(84, 'Biscuit and Bakery', 'Ifad', 'EGGY CUSTARD CAKE', 1, '2021-03-22 04:34:09', NULL),
(85, 'Biscuit and Bakery', 'Ifad', 'MUFFIN', 1, '2021-03-22 04:34:09', NULL),
(86, 'Snacks', 'Ifad', 'IFAD JHAL CHANACHUR', 1, '2021-03-22 04:34:09', NULL),
(87, 'Snacks', 'Ifad', 'IFAD CHANACHUR', 1, '2021-03-22 04:34:09', NULL),
(88, 'Beverages', 'MUM', 'Mum Drinks Water', 1, '2021-03-22 04:34:09', NULL),
(89, 'Beverages', 'Jibon', 'Jibon Drinks Water', 1, '2021-03-22 04:34:09', NULL),
(90, 'Beverages', 'Fresh', 'Fresh Drinks Water', 1, '2021-03-22 04:34:09', NULL),
(91, 'Beverages', 'Spa', 'Spa Drinks Water', 1, '2021-03-22 04:34:09', NULL),
(92, 'Ice Cream', 'Cocola', 'Cone', 1, '2021-03-22 04:34:09', NULL),
(93, 'Biscuit and Bakery', 'Cocola', 'Dry Cake', 1, '2021-03-22 04:34:09', NULL),
(94, 'Chips & Crackers', 'Cocola', 'Potato Chips', 1, '2021-03-22 04:34:09', NULL),
(95, 'Beverages', 'Cocola', 'Starfresh  Drinking Water', 1, '2021-03-22 04:34:09', NULL),
(96, 'Beverages', 'CocaCola', 'COCA-COLA', 1, '2021-03-22 04:34:09', NULL),
(97, 'Beverages', 'CocaCola', 'SPRITE', 1, '2021-03-22 04:34:09', NULL),
(98, 'Beverages', 'CocaCola', 'FANTA', 1, '2021-03-22 04:34:09', NULL),
(99, 'Beverages', 'CocaCola', 'Diet Coke', 1, '2021-03-22 04:34:09', NULL),
(100, 'Beverages', 'CocaCola', 'Coca-Cola Zero', 1, '2021-03-22 04:34:09', NULL),
(101, 'Beverages', 'CocaCola', 'Kinley', 1, '2021-03-22 04:34:09', NULL),
(102, 'Beverages', 'Pepsico', 'Pepsi', 1, '2021-03-22 04:34:09', NULL),
(103, 'Beverages', 'Pepsico', '7 Up', 1, '2021-03-22 04:34:09', NULL),
(104, 'Beverages', 'Pepsico', 'Dew', 1, '2021-03-22 04:34:09', NULL),
(105, 'Chips & Crackers', 'Pepsico', 'Doritos', 1, '2021-03-22 04:34:09', NULL),
(106, 'Beverages', 'Pepsico', 'Aquafina', 1, '2021-03-22 04:34:09', NULL),
(107, 'Breakfast', 'In house', 'Shingara / Chomucha', 1, '2021-03-22 04:34:09', NULL),
(108, 'Breakfast', 'In house', 'Porota', 1, '2021-03-22 04:34:09', NULL),
(109, 'Breakfast', 'In house', 'Vaji', 1, '2021-03-22 04:34:09', NULL),
(110, 'Breakfast', 'In house', 'Dim', 1, '2021-03-22 04:34:09', NULL),
(111, 'Breakfast', 'In house', 'Dal Vaji', 1, '2021-03-22 04:34:09', NULL),
(112, 'Breakfast', 'In house', 'Ruti', 1, '2021-03-22 04:34:09', NULL),
(113, 'Beverages', 'In house', 'Coffee', 1, '2021-03-22 04:34:09', NULL),
(114, 'Beverages', 'In house', 'Tea', 1, '2021-03-22 04:34:09', NULL),
(115, 'Snacks', 'In house', 'Nodules', 1, '2021-03-22 04:34:09', NULL),
(116, 'Snacks', 'In house', 'Pasta', 1, '2021-03-22 04:34:09', NULL),
(117, 'Snacks', 'In house', 'Vegetable Roll', 1, '2021-03-22 04:34:09', NULL),
(118, 'Snacks', 'In house', 'Chicken Roll', 1, '2021-03-22 04:34:09', NULL),
(119, 'Breakfast', 'In house', 'Khichiuri', 1, '2021-03-22 04:34:09', NULL),
(120, 'Launch', 'In house', 'Plain rice', 1, '2021-03-22 04:34:09', NULL),
(121, 'Launch', 'In house', 'Plain Polaue', 1, '2021-03-22 04:34:09', NULL),
(122, 'Launch', 'In house', 'Vegetable Polaue', 1, '2021-03-22 04:34:09', NULL),
(123, 'Launch', 'In house', 'Bharta', 1, '2021-03-22 04:34:09', NULL),
(124, 'Launch', 'In house', 'Beef', 1, '2021-03-22 04:34:09', NULL),
(125, 'Launch', 'In house', 'Mutton', 1, '2021-03-22 04:34:09', NULL),
(126, 'Launch', 'In house', 'Chicken', 1, '2021-03-22 04:34:09', NULL),
(127, 'Launch', 'In house', 'Fish', 1, '2021-03-22 04:34:09', NULL),
(128, 'Launch', 'In house', 'Khichuri', 1, '2021-03-22 04:34:09', NULL),
(129, 'Launch', 'In house', 'Teheri', 1, '2021-03-22 04:34:09', NULL),
(130, 'Fast Food', 'Burger', 'Chicken Burger', 1, '2021-03-22 04:34:09', NULL),
(131, 'Fast Food', 'Burger', 'Beef Burger', 1, '2021-03-22 04:34:09', NULL),
(132, 'Fast Food', 'Burger', 'Vegetable Burger', 1, '2021-03-22 04:34:09', NULL),
(133, 'Fast Food', 'Pizza', 'Beef Pizza', 1, '2021-03-22 04:34:09', NULL),
(134, 'Fast Food', 'Pizza', 'BBQ Pizza', 1, '2021-03-22 04:34:09', NULL),
(135, 'Fast Food', 'Pizza', 'Chicken Pizza', 1, '2021-03-22 04:34:09', NULL),
(136, 'Fast Food', 'Sandwitch', 'Chicken Sandwitch', 1, '2021-03-22 04:34:09', NULL),
(137, 'Fast Food', 'Sandwitch', 'Beef Sandwitch', 1, '2021-03-22 04:34:09', NULL),
(138, 'Fast Food', 'Sandwitch', 'Vegetable Sandwich', 1, '2021-03-22 04:34:09', NULL),
(139, 'Fast Food', 'HotDogs', 'HotDogs (Chicken)', 1, '2021-03-22 04:34:09', NULL),
(140, 'Fast Food', 'HotDogs', 'HotDogs (Beef)', 1, '2021-03-22 04:34:09', NULL),
(141, 'Ice Cream', 'Polar', 'Carnival (Vanilla) - Cone', 1, '2021-03-22 04:34:09', NULL),
(142, 'Ice Cream', 'Polar', 'Choco delight - Cone', 1, '2021-03-22 04:34:09', NULL),
(143, 'Ice Cream', 'Polar', 'Carnival Strawberry - Cone', 1, '2021-03-22 04:34:09', NULL),
(144, 'Ice Cream', 'Polar', 'Doi - Cup', 1, '2021-03-22 04:34:09', NULL),
(145, 'Ice Cream', 'Polar', 'Kheer - Cup', 1, '2021-03-22 04:34:09', NULL),
(146, 'Ice Cream', 'Polar', 'Strawberry Smile - Litre Container', 1, '2021-03-22 04:34:09', NULL),
(147, 'Ice Cream', 'Polar', 'Doi - Litre Container', 1, '2021-03-22 04:34:09', NULL),
(148, 'Ice Cream', 'Polar', 'Kheer - Litre Container', 1, '2021-03-22 04:34:09', NULL),
(149, 'Ice Cream', 'Polar', 'Vanilla - Litre Container', 1, '2021-03-22 04:34:09', NULL),
(150, 'Ice Cream', 'Polar', 'Chocolate - Litre Container', 1, '2021-03-22 04:34:09', NULL),
(151, 'Ice Cream', 'Polar', 'Strawberry - Litre Container', 1, '2021-03-22 04:34:09', NULL),
(152, 'Ice Cream', 'Polar', 'Robusto(Chocolate)', 1, '2021-03-22 04:34:09', NULL),
(153, 'Ice Cream', 'Polar', 'Robusto (Vanilla)', 1, '2021-03-22 04:34:09', NULL),
(154, 'Ice Cream', 'Polar', 'Crunchy', 1, '2021-03-22 04:34:09', NULL),
(155, 'Ice Cream', 'Polar', 'Rocks', 1, '2021-03-22 04:34:09', NULL),
(156, 'Ice Cream', 'Polar', 'Choco Bar (Vanilla Based Ice Cream)', 1, '2021-03-22 04:34:09', NULL),
(157, 'Ice Cream', 'Polar', 'Choco Bar (Chocolate Based Ice Cream)', 1, '2021-03-22 04:34:09', NULL),
(158, 'Ice Cream', 'Polar', 'Malai', 1, '2021-03-22 04:34:09', NULL),
(159, 'Ice Cream', 'Savoy', 'Shahi Kheer', 1, '2021-03-22 04:34:09', NULL),
(160, 'Ice Cream', 'Savoy', 'Shahi Kulfi', 1, '2021-03-22 04:34:09', NULL),
(161, 'Ice Cream', 'Savoy', 'Kheer Malai', 1, '2021-03-22 04:34:09', NULL),
(162, 'Ice Cream', 'Savoy', 'Doi', 1, '2021-03-22 04:34:09', NULL),
(163, 'Ice Cream', 'Savoy', 'Mawa Kulfi', 1, '2021-03-22 04:34:09', NULL),
(164, 'Ice Cream', 'Savoy', 'Choco Bar', 1, '2021-03-22 04:34:09', NULL),
(165, 'Ice Cream', 'Savoy', 'Mini Choco Bar', 1, '2021-03-22 04:34:09', NULL),
(166, 'Ice Cream', 'Savoy', 'Dudh Malai', 1, '2021-03-22 04:34:09', NULL),
(167, 'Ice Cream', 'Savoy', 'Kulfi', 1, '2021-03-22 04:34:09', NULL),
(168, 'Ice Cream', 'Savoy', 'Vanilla', 1, '2021-03-22 04:34:09', NULL),
(169, 'Ice Cream', 'Savoy', 'Chocolate', 1, '2021-03-22 04:34:09', NULL),
(170, 'Ice Cream', 'Savoy', 'Strawberry', 1, '2021-03-22 04:34:09', NULL),
(171, 'Chocolate', 'Savoy', 'Milk Chocolate', 1, '2021-03-22 04:34:09', NULL),
(172, 'Chocolate', 'Savoy', 'Daily Milk Chocolate', 1, '2021-03-22 04:34:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catproducts`
--
ALTER TABLE `catproducts`
  ADD PRIMARY KEY (`catproid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catproducts`
--
ALTER TABLE `catproducts`
  MODIFY `catproid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
