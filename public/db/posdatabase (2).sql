-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 12:36 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memid` int(11) UNSIGNED NOT NULL,
  `memberidno` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberrank` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membername` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberphone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memid`, `memberidno`, `memberrank`, `membername`, `memberphone`, `created_at`, `updated_at`) VALUES
(1, 'BA-43458', 'Gen', 'Milton Chowdhury', '01737539213', '2021-03-17 16:37:01', NULL),
(2, 'BSS-4205', 'Capt', 'Hamidur Rahman', '12345678890', '2021-03-17 16:52:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_01_10_165823_create_roles_table', 3),
(9, '2021_01_10_170455_create_singledatas_table', 4),
(10, '2021_03_03_055030_create_members_table', 5),
(12, '2021_03_03_070955_create_suppliers_table', 6),
(13, '2021_03_04_042633_create_productstores_table', 7),
(14, '2021_03_04_085950_create_prostoreinfos_table', 8),
(15, '2021_03_04_133917_create_supporttables_table', 9),
(16, '2021_03_06_045924_create_posaccounts_table', 10),
(17, '2021_03_10_042531_create_saleproboxs_table', 11),
(18, '2021_03_10_043748_create_saleproinvoices_table', 12),
(19, '2021_03_14_042034_create_catproducts_table', 13),
(20, '2021_03_17_064808_create_excelmembers_table', 14),
(21, '2021_03_23_113649_create_ranks_table', 15),
(22, '2021_03_23_114039_create_pronewoldlists_table', 16),
(23, '2021_03_23_153644_create_proactivities_table', 17),
(24, '2021_03_25_112744_create_saleactivities_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(11) NOT NULL,
  `month` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month`, `created_at`) VALUES
(1, 'January', '2021-03-15 10:24:52'),
(2, 'February', '2021-03-15 10:24:52'),
(3, 'March', '2021-03-15 10:24:52'),
(4, 'April', '2021-03-15 10:24:52'),
(5, 'May', '2021-03-15 10:24:52'),
(6, 'June', '2021-03-15 10:24:52'),
(7, 'July', '2021-03-15 10:24:52'),
(8, 'August', '2021-03-15 10:24:52'),
(9, 'September', '2021-03-15 10:24:52'),
(10, 'October', '2021-03-15 10:24:52'),
(11, 'November', '2021-03-15 10:24:52'),
(12, 'December', '2021-03-15 10:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posaccounts`
--

CREATE TABLE `posaccounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `received` bigint(20) NOT NULL DEFAULT 0,
  `payment` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posaccounts`
--

INSERT INTO `posaccounts` (`id`, `received`, `payment`, `created_at`, `updated_at`) VALUES
(1, 210, 5000, '2021-03-06 06:14:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proactivities`
--

CREATE TABLE `proactivities` (
  `proactid` int(10) UNSIGNED NOT NULL,
  `proinfoid` int(11) NOT NULL,
  `prolistid` int(11) NOT NULL,
  `proname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prosize` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procate` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prostatus` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodataone` int(11) NOT NULL,
  `prodatatwo` int(11) DEFAULT NULL,
  `prodatathree` int(11) DEFAULT NULL,
  `proremarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proacttime` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proactdate` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proactby` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proactivities`
--

INSERT INTO `proactivities` (`proactid`, `proinfoid`, `prolistid`, `proname`, `prosize`, `procate`, `prostatus`, `prodataone`, `prodatatwo`, `prodatathree`, `proremarks`, `proacttime`, `proactdate`, `proactby`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Aquafina', 'Medium', 'Beverages', 'Increase', 15, 20, NULL, 'Update sale price.', '10:51 PM', '2021-03-23', 1, '2021-03-23 16:51:41', NULL),
(2, 1, 3, 'Aquafina', 'Small', 'Beverages', 'Waste', 50, 5, 45, 'Update sale price.', '11:12 PM', '2021-03-23', 1, '2021-03-23 17:12:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productstores`
--

CREATE TABLE `productstores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prostoreid` int(11) NOT NULL,
  `suppid` int(11) NOT NULL,
  `catname` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `protype` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filebarcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productid` int(11) NOT NULL,
  `prosize` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qunatity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `proentime` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proendate` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proenmonth` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proaddby` tinyint(1) NOT NULL,
  `prostatus` tinyint(1) NOT NULL,
  `proentry` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productstores`
--

INSERT INTO `productstores` (`id`, `prostoreid`, `suppid`, `catname`, `protype`, `barcode`, `filebarcode`, `productid`, `prosize`, `qunatity`, `price`, `sale`, `subtotal`, `proentime`, `proendate`, `proenmonth`, `proaddby`, `prostatus`, `proentry`, `created_at`, `update_at`) VALUES
(2, 1, 2, 'Beverages', 'manual', '21322001', '21322001.jpg', 106, 'Medium', 17, 12, 20, 240, '7:28 PM', '2021-03-23', 'March-2021', 1, 1, 1, '2021-03-23 13:28:38', '2021-03-23 13:28:38'),
(3, 1, 2, 'Beverages', 'manual', '21322002', '21322002.jpg', 106, 'Small', 10, 8, 10, 160, '7:28 PM', '2021-03-23', 'March-2021', 1, 1, 1, '2021-03-23 13:28:59', '2021-03-23 13:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `pronewoldlists`
--

CREATE TABLE `pronewoldlists` (
  `proinfoid` int(10) UNSIGNED NOT NULL,
  `prolist` int(11) NOT NULL,
  `proaclist` int(11) NOT NULL,
  `oldsupid` int(11) NOT NULL,
  `oldproname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oldprocatename` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oldprice` int(11) NOT NULL,
  `oldtotalqty` int(11) NOT NULL,
  `oldnettotal` int(11) NOT NULL,
  `oldpaidamount` int(11) NOT NULL,
  `olddueamount` int(11) NOT NULL,
  `newsupid` int(11) DEFAULT NULL,
  `newquantity` int(11) NOT NULL,
  `newbuyprice` int(11) NOT NULL,
  `newnettotal` int(11) NOT NULL,
  `newpaidamount` int(11) NOT NULL,
  `newdueamount` int(11) NOT NULL,
  `newpaymethod` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newacnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newuptime` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newupdate` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newupmonth` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newupby` int(11) NOT NULL,
  `upstatus` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pronewoldlists`
--

INSERT INTO `pronewoldlists` (`proinfoid`, `prolist`, `proaclist`, `oldsupid`, `oldproname`, `oldprocatename`, `oldprice`, `oldtotalqty`, `oldnettotal`, `oldpaidamount`, `olddueamount`, `newsupid`, `newquantity`, `newbuyprice`, `newnettotal`, `newpaidamount`, `newdueamount`, `newpaymethod`, `newacnumber`, `newuptime`, `newupdate`, `newupmonth`, `newupby`, `upstatus`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, 'Aquafina', 'Beverages', 0, 40, 1520, 850, 670, 4, 10, 8, 80, 80, 0, 'cash', NULL, '7:32 PM', '23-03-2021', 'March-2021', 1, 'add', '2021-03-23 13:32:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prostoreinfos`
--

CREATE TABLE `prostoreinfos` (
  `proinfoid` int(10) UNSIGNED NOT NULL,
  `proindate` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` int(11) NOT NULL,
  `category` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalqty` int(11) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `extracost` int(11) DEFAULT NULL,
  `prodiscount` int(11) NOT NULL,
  `nettotal` int(11) NOT NULL,
  `paidamount` int(11) NOT NULL,
  `dueamount` int(11) NOT NULL DEFAULT 1,
  `paymethod` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prointime` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proinmonth` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proinby` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prostoreinfos`
--

INSERT INTO `prostoreinfos` (`proinfoid`, `proindate`, `supplier`, `category`, `totalqty`, `totalamount`, `extracost`, `prodiscount`, `nettotal`, `paidamount`, `dueamount`, `paymethod`, `acnumber`, `prointime`, `proinmonth`, `proinby`, `created_at`, `updated_at`) VALUES
(1, '2021-03-23', 2, 'Beverages', 45, 1800, NULL, 200, 1600, 930, 670, 'cash', NULL, '7:29 PM', 'March-2021', 'Administration', '2021-03-23 13:29:17', '2021-03-23 17:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` int(11) NOT NULL,
  `rankname` varchar(100) NOT NULL,
  `shortname` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `rankname`, `shortname`, `created_at`) VALUES
(1, 'General', 'Gen', '2021-03-17 09:30:34'),
(2, 'Lieutenant General', 'Lt Gen', '2021-03-17 09:30:34'),
(3, 'Major General', 'Maj Gen', '2021-03-17 09:30:34'),
(4, 'Brigadier General', 'Brig Gen', '2021-03-17 09:30:34'),
(5, 'Colonel', 'Col', '2021-03-17 09:30:34'),
(6, 'Lieutenant Colonel', 'Lt Col', '2021-03-17 09:30:34'),
(7, 'Major', 'Maj', '2021-03-17 09:30:34'),
(8, 'Captain', 'Capt', '2021-03-17 09:30:34'),
(9, 'Lieutenant', 'Lt', '2021-03-17 09:30:34'),
(10, 'Second Lieutenant', '2Lt', '2021-03-17 09:30:34'),
(11, 'Honorary Captain', 'H Capt', '2021-03-17 09:30:34'),
(12, 'Honorary Lieutenant', 'H Lt', '2021-03-17 09:30:34'),
(13, 'Master Warrant Officer', 'MWO', '2021-03-17 09:30:34'),
(14, 'Senior Warrant Officer', 'SWO', '2021-03-17 09:30:34'),
(15, 'Warrant Officer', 'WO', '2021-03-17 09:30:34'),
(16, 'Sergeant', 'Sgt', '2021-03-17 09:30:34'),
(17, 'Corporal', 'Cpl', '2021-03-17 09:30:34'),
(18, 'Lance Corporal', 'L Cpl', '2021-03-17 09:30:34'),
(19, 'Sainik', 'Snk', '2021-03-17 15:09:17'),
(20, 'N/A', 'N/A', '2021-03-17 15:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(10) UNSIGNED NOT NULL,
  `rolename` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `rolename`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-01-10 17:03:21', NULL),
(2, 'Accountent', '2021-01-10 17:03:21', NULL),
(4, 'Cashier', '2021-03-03 05:14:11', NULL),
(5, 'Store Keeper ', '2021-03-03 05:14:40', NULL),
(6, 'Sales Man', '2021-03-08 10:27:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saleactivities`
--

CREATE TABLE `saleactivities` (
  `saleactid` int(10) UNSIGNED NOT NULL,
  `proname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prosize` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalqty` int(11) NOT NULL,
  `returnqty` int(11) NOT NULL,
  `restqty` int(11) NOT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rettime` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retdate` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retfrom` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `returnby` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saleactivities`
--

INSERT INTO `saleactivities` (`saleactid`, `proname`, `prosize`, `totalqty`, `returnqty`, `restqty`, `remarks`, `rettime`, `retdate`, `retfrom`, `returnby`, `created_at`, `updated_at`) VALUES
(1, 'Aquafina', 'Medium', 5, 2, 3, 'Return Sale Products.', '5:35 PM', '2021-03-25', 'BA-43458', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saleproboxs`
--

CREATE TABLE `saleproboxs` (
  `saleboxid` bigint(20) UNSIGNED NOT NULL,
  `saleinvid` int(11) NOT NULL,
  `saleproid` int(11) NOT NULL,
  `saleproname` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saleprosize` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saleprice` int(11) NOT NULL,
  `salequantity` int(11) NOT NULL,
  `salesubtotal` int(11) NOT NULL,
  `saletime` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saledate` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salemonth` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saleby` tinyint(4) NOT NULL,
  `salestatus` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saleproboxs`
--

INSERT INTO `saleproboxs` (`saleboxid`, `saleinvid`, `saleproid`, `saleproname`, `saleprosize`, `saleprice`, `salequantity`, `salesubtotal`, `saletime`, `saledate`, `salemonth`, `member`, `saleby`, `salestatus`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Aquafina', 'Small', 10, 15, 150, '7:49 AM', '2021-03-25', 'March-2021', 'BSS-4205', 2, 1, '2021-03-24 01:49:01', NULL),
(2, 2, 2, 'Aquafina', 'Medium', 20, 3, 60, '7:59 AM', '2021-03-25', 'March-2021', 'BA-43458', 2, 1, '2021-03-24 01:59:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saleproinvoices`
--

CREATE TABLE `saleproinvoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `saleinvoice` int(11) NOT NULL,
  `tosaleqty` int(11) NOT NULL,
  `gtotal` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `nettotal` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `dueamount` int(11) NOT NULL,
  `inwords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memberidno` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entryby` int(11) NOT NULL,
  `entrytime` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invodate` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invomonth` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saleproinvoices`
--

INSERT INTO `saleproinvoices` (`id`, `saleinvoice`, `tosaleqty`, `gtotal`, `discount`, `nettotal`, `payment`, `dueamount`, `inwords`, `memberidno`, `entryby`, `entrytime`, `invodate`, `invomonth`, `created_at`, `updated_at`) VALUES
(1, 2432110, 15, 150, 0, 150, 150, 0, 'Two Hundred', 'BSS-4205', 2, '7:49 AM', '2021-03-25', 'March-2021', '2021-03-24 01:49:01', NULL),
(2, 2432142, 3, 60, 0, 60, 60, 0, 'One Hundred', 'BA-43458', 2, '7:59 AM', '2021-03-25', 'March-2021', '2021-03-24 01:59:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `singledatas`
--

CREATE TABLE `singledatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `singledata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extradata` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `singledatas`
--

INSERT INTO `singledatas` (`id`, `singledata`, `status`, `extradata`, `created_at`, `updated_at`) VALUES
(16, 'Administration', 'designation', NULL, '2021-03-13 05:26:13', NULL),
(17, 'HR Manager', 'designation', NULL, '2021-03-13 05:26:13', NULL),
(18, 'Accountant', 'designation', NULL, '2021-03-13 05:26:13', NULL),
(19, 'Sales Man', 'designation', NULL, '2021-03-13 05:26:13', NULL),
(20, 'Cashier', 'designation', NULL, '2021-03-13 05:26:13', NULL),
(22, 'Supplier Bill', 'expense', NULL, '2021-03-17 19:42:12', NULL),
(23, 'Office Rent', 'expense', NULL, '2021-03-17 19:42:12', NULL),
(24, 'Employee Salalry', 'expense', NULL, '2021-03-17 19:42:12', NULL),
(25, 'TA/DA', 'expense', NULL, '2021-03-17 19:42:12', NULL),
(26, 'Special Cost', 'expense', NULL, '2021-03-17 19:43:14', NULL),
(27, 'Milton', 'expenseby', NULL, '2021-03-17 20:00:51', NULL),
(28, 'Hassan', 'expenseby', NULL, '2021-03-17 20:00:51', NULL),
(29, 'Kamrul', 'expenseby', NULL, '2021-03-17 20:00:51', NULL),
(30, 'Sojib', 'expenseby', NULL, '2021-03-17 20:00:51', NULL),
(35, 'Beverages', 'category', NULL, '2021-03-22 05:58:38', NULL),
(37, 'Biscuit and Bakery', 'category', NULL, '2021-03-22 05:58:38', NULL),
(39, 'Breakfast', 'category', NULL, '2021-03-22 05:58:38', NULL),
(41, 'Chips & Crackers', 'category', NULL, '2021-03-22 05:58:38', NULL),
(43, 'Chocolate', 'category', NULL, '2021-03-22 05:58:38', NULL),
(45, 'Culinary', 'category', NULL, '2021-03-22 05:58:38', NULL),
(47, 'Fast Food', 'category', NULL, '2021-03-22 05:58:38', NULL),
(49, 'Ice Cream', 'category', NULL, '2021-03-22 05:58:38', NULL),
(51, 'Launch', 'category', NULL, '2021-03-22 05:58:38', NULL),
(53, 'Snacks', 'category', NULL, '2021-03-22 05:58:38', NULL),
(54, 'Amul', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(55, 'Burger', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(56, 'Cadbury', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(57, 'CBL', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(58, 'CocaCola', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(59, 'Cocola', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(60, 'Danish', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(61, 'Fresh', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(62, 'Gold Mark', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(63, 'HotDogs', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(64, 'Ifad', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(65, 'In house', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(66, 'Ispahani', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(67, 'Jibon', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(68, 'MUM', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(69, 'Nestle', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(70, 'Olympic', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(71, 'Pepsico', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(72, 'Pizza', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(73, 'Polar', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(74, 'Pran', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(75, 'Sandwitch', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(76, 'Savoy', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(77, 'Snickers', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(78, 'Spa', 'brand', NULL, '2021-03-22 06:05:16', NULL),
(79, 'Small', 'size', NULL, '2021-03-23 09:52:07', NULL),
(80, 'Medium', 'size', NULL, '2021-03-23 09:52:07', NULL),
(81, 'Big', 'size', NULL, '2021-03-23 09:52:07', NULL),
(82, 'Large', 'size', NULL, '2021-03-23 09:52:07', NULL),
(83, 'N/A', 'size', NULL, '2021-03-23 10:42:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supid` int(10) UNSIGNED NOT NULL,
  `suppname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suppmobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suppemail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suppaddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supstatus` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supid`, `suppname`, `suppmobile`, `suppemail`, `suppaddress`, `supstatus`, `created_at`) VALUES
(2, 'Kamal', '1234567890', 'm@gmail.com', '318/3, Dhaka-1215', 1, '2021-03-03 08:20:49'),
(4, 'Hamidul', '0123456789', 'hm@gmail.com', '318/3, Dhaka-1215', 1, '2021-03-12 00:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `supporttables`
--

CREATE TABLE `supporttables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `todate` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inputdata` tinyint(4) NOT NULL,
  `qunatity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `entryby` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `contact` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dispassword` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `passChange` tinyint(4) DEFAULT NULL,
  `mailStatus` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `contact`, `password`, `dispassword`, `username`, `role`, `photo`, `isActive`, `isDelete`, `passChange`, `mailStatus`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administration', 'abc@gmail.com', NULL, '0123456789', '$2y$10$jC2SFjD47spx5zka.9naOepoYr0g.XUoq2pf8IpKAPwR2ZKaf3NCm', 'admin', 'admin', 1, '/public/users/10031855b77269e6.png', 1, 0, 0, NULL, NULL, '2021-01-09 23:02:09', '2021-03-10 03:19:44'),
(2, 'Kamrul ', 'kk@gmail.com', NULL, '1234567890', '$2y$10$AcU3aGlXCR5s1HErjP6o5exEdFnadQooB7/wovHkZPe2L7C3GIeca', '123', 'demo', 6, '/public/users/13010978ca65dd1e.jpg', 1, 0, NULL, NULL, NULL, NULL, '2021-03-02 23:17:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catproducts`
--
ALTER TABLE `catproducts`
  ADD PRIMARY KEY (`catproid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posaccounts`
--
ALTER TABLE `posaccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proactivities`
--
ALTER TABLE `proactivities`
  ADD PRIMARY KEY (`proactid`);

--
-- Indexes for table `productstores`
--
ALTER TABLE `productstores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pronewoldlists`
--
ALTER TABLE `pronewoldlists`
  ADD PRIMARY KEY (`proinfoid`);

--
-- Indexes for table `prostoreinfos`
--
ALTER TABLE `prostoreinfos`
  ADD PRIMARY KEY (`proinfoid`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `saleactivities`
--
ALTER TABLE `saleactivities`
  ADD PRIMARY KEY (`saleactid`);

--
-- Indexes for table `saleproboxs`
--
ALTER TABLE `saleproboxs`
  ADD PRIMARY KEY (`saleboxid`);

--
-- Indexes for table `saleproinvoices`
--
ALTER TABLE `saleproinvoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singledatas`
--
ALTER TABLE `singledatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supid`);

--
-- Indexes for table `supporttables`
--
ALTER TABLE `supporttables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catproducts`
--
ALTER TABLE `catproducts`
  MODIFY `catproid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posaccounts`
--
ALTER TABLE `posaccounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proactivities`
--
ALTER TABLE `proactivities`
  MODIFY `proactid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productstores`
--
ALTER TABLE `productstores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pronewoldlists`
--
ALTER TABLE `pronewoldlists`
  MODIFY `proinfoid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prostoreinfos`
--
ALTER TABLE `prostoreinfos`
  MODIFY `proinfoid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `saleactivities`
--
ALTER TABLE `saleactivities`
  MODIFY `saleactid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saleproboxs`
--
ALTER TABLE `saleproboxs`
  MODIFY `saleboxid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saleproinvoices`
--
ALTER TABLE `saleproinvoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `singledatas`
--
ALTER TABLE `singledatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supporttables`
--
ALTER TABLE `supporttables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
