-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2026 at 03:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `subtitle` varchar(300) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(300) DEFAULT './assets/images/Globe-Valve-1.png',
  `category` varchar(100) NOT NULL DEFAULT 'Gate / Globe Valves',
  `badge` varchar(50) DEFAULT NULL,
  `badge_color` varchar(100) DEFAULT 'bg-orange-600',
  `price_min` decimal(12,2) DEFAULT 0.00,
  `price_max` decimal(12,2) DEFAULT 0.00,
  `mrp` decimal(12,2) DEFAULT 0.00,
  `gst_percent` decimal(5,2) DEFAULT 18.00,
  `in_stock` tinyint(1) DEFAULT 1,
  `stock_label` varchar(50) DEFAULT 'In Stock',
  `ships_within` varchar(100) DEFAULT 'Ships within 24 hrs',
  `best_price` tinyint(1) DEFAULT 1,
  `min_order` int(11) DEFAULT 1,
  `min_order_unit` varchar(50) DEFAULT 'Piece',
  `delivery_days` varchar(50) DEFAULT '3–5 Days',
  `warranty` varchar(100) DEFAULT 'Mfr. Terms',
  `certification` varchar(100) DEFAULT 'ISO • IBR',
  `rating` decimal(3,1) DEFAULT 4.8,
  `orders_count` varchar(50) DEFAULT '1000+',
  `is_active` tinyint(1) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `subtitle`, `description`, `image`, `category`, `badge`, `badge_color`, `price_min`, `price_max`, `mrp`, `gst_percent`, `in_stock`, `stock_label`, `ships_within`, `best_price`, `min_order`, `min_order_unit`, `delivery_days`, `warranty`, `certification`, `rating`, `orders_count`, `is_active`, `sort_order`, `created_at`) VALUES
(1, 'Bronze IBR Certified Globe Steam Stop Valve', 'bronze-ibr-globe-steam-stop-valve', 'IBR Approved • High Temperature', 'IBR Certified steam stop valve for high-temperature applications in boiler systems. Manufactured from high-grade cast bronze / gunmetal alloy for maximum corrosion resistance.', './assets/images/Globe-Valve-1.png', 'Gate / Globe Valves', 'IBR', 'bg-orange-600', 1320.95, 19688.00, 1620.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '3–5 Days', 'Mfr. Terms', 'ISO • IBR', 4.8, '1000+', 1, 1, '2026-02-23 08:26:18'),
(2, 'Cast Iron IBR Certified Globe Steam Stop Valve', 'cast-iron-ibr-globe-steam-stop-valve', 'ASTM Grade • Flanged End', 'Heavy-duty cast iron globe valve with IBR certification for steam systems. ASTM grade material with flanged end connections for easy installation.', './assets/images/Globe-Valve-1.png', 'Gate / Globe Valves', 'IBR', 'bg-orange-600', 1892.00, 26975.00, 2214.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '3–5 Days', 'Mfr. Terms', 'ISO • IBR', 4.8, '1000+', 1, 2, '2026-02-23 08:26:18'),
(3, 'Cast Steel IBR Certified Gate Valve Class 150#', 'cast-steel-ibr-gate-valve-class-150', 'Class 150 • Bolted Bonnet', 'Cast steel gate valve with class 150 pressure rating and bolted bonnet design. Suitable for high-pressure industrial pipeline applications.', './assets/images/Gate-Valve-1.png', 'Gate / Globe Valves', 'QUALITY', 'bg-green-600', 4928.00, 76500.00, 5766.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '3–5 Days', 'Mfr. Terms', 'ISO • IBR', 4.8, '1000+', 1, 3, '2026-02-23 08:26:18'),
(4, 'Cast Steel IBR Certified Gate Valve Class 300#', 'cast-steel-ibr-gate-valve-class-300', 'Class 300 • High Pressure', 'High-pressure gate valve for critical industrial applications requiring class 300 rating. Designed for demanding process conditions.', './assets/images/Gate-Valve-1.png', 'Gate / Globe Valves', 'PREMIUM', 'bg-secondary', 13674.00, 215009.00, 15999.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '5–7 Days', 'Mfr. Terms', 'ISO • IBR', 4.9, '500+', 1, 4, '2026-02-23 08:26:18'),
(5, 'Cast Steel IBR Certified Globe Valve Class 150#', 'cast-steel-ibr-globe-valve-class-150', 'Class 150 • Steam Service', 'Globe valve for steam and high-temperature service with class 150 pressure rating. Bolted bonnet for easy maintenance.', './assets/images/Globe-Valve-1.png', 'Gate / Globe Valves', 'QUALITY', 'bg-green-600', 3825.00, 88378.00, 4476.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '3–5 Days', 'Mfr. Terms', 'ISO • IBR', 4.8, '1000+', 1, 5, '2026-02-23 08:26:18'),
(6, 'Cast Steel IBR Certified Globe Valve Class 300#', 'cast-steel-ibr-globe-valve-class-300', 'Class 300 • Bolted Bonnet', 'High-pressure globe valve with IBR certification and bolted bonnet. Engineered for critical steam and high pressure service.', './assets/images/Globe-Valve-1.png', 'Gate / Globe Valves', 'PREMIUM', 'bg-secondary', 7845.00, 152880.00, 9183.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '5–7 Days', 'Mfr. Terms', 'ISO • IBR', 4.9, '500+', 1, 6, '2026-02-23 08:26:18'),
(7, 'Forged Steel A-105 IBR Certified Gate Valve', 'forged-steel-a105-ibr-gate-valve', 'Forged A-105 • Socket Weld', 'Forged steel gate valve manufactured from A-105 grade material for high-pressure socket weld applications.', './assets/images/Gate-Valve-1.png', 'Gate / Globe Valves', 'QUALITY', 'bg-green-600', 2450.00, 18900.00, 2867.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '3–5 Days', 'Mfr. Terms', 'ISO • IBR', 4.7, '800+', 1, 7, '2026-02-23 08:26:18'),
(8, 'Forged Steel A-105 IBR Certified Globe Valve', 'forged-steel-a105-ibr-globe-valve', 'Forged A-105 • Threaded', 'Forged steel globe valve with threaded connections. A-105 grade material for superior strength and pressure resistance.', './assets/images/Globe-Valve-1.png', 'Gate / Globe Valves', 'QUALITY', 'bg-green-600', 2180.00, 16750.00, 2551.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '3–5 Days', 'Mfr. Terms', 'ISO • IBR', 4.7, '800+', 1, 8, '2026-02-23 08:26:18'),
(9, 'Forged Steel F-304 IBR Certified Check Valve', 'forged-steel-f304-ibr-check-valve', 'SS 304 • Swing Type', 'Stainless steel check valve with swing type design for preventing backflow in pipelines. F-304 grade for corrosive environments.', './assets/images/Ball-Valve.png', 'Ball / Check Valves', 'IBR', 'bg-orange-600', 3250.00, 24500.00, 3803.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '3–5 Days', 'Mfr. Terms', 'ISO • IBR', 4.8, '600+', 1, 9, '2026-02-23 08:26:18'),
(10, 'Forged Steel F-304 IBR Certified Gate Valve', 'forged-steel-f304-ibr-gate-valve', 'SS 304 • Flanged End', 'Stainless steel gate valve for corrosive environments with flanged end connections. IBR certified for steam applications.', './assets/images/Gate-Valve-1.png', 'Gate / Globe Valves', 'PREMIUM', 'bg-secondary', 3850.00, 29200.00, 4507.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '3–5 Days', 'Mfr. Terms', 'ISO • IBR', 4.8, '600+', 1, 10, '2026-02-23 08:26:18'),
(11, 'MS Pipes & Fittings', 'ms-pipes-fittings', 'Mild Steel • ERW, Seamless', 'High-quality mild steel pipes for industrial applications, available in ERW and seamless grades. ISI certified for quality assurance.', './assets/images/MS-pipes-Fittings.png', 'Pipes & Fittings', 'POPULAR', 'bg-blue-600', 850.00, 12500.00, 994.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '3–5 Days', 'Mfr. Terms', 'ISO Certified', 4.7, '2000+', 1, 11, '2026-02-23 08:26:18'),
(12, 'SS Pipes & Fittings', 'ss-pipes-fittings', 'SS304, SS316, SS321', 'Premium stainless steel pipes and fittings in SS304, SS316, SS321 grades. Suitable for corrosive and hygienic applications.', './assets/images/SS-Pipes-Fittings.png', 'Pipes & Fittings', 'PREMIUM', 'bg-secondary', 2450.00, 35800.00, 2867.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '3–5 Days', 'Mfr. Terms', 'ISO Certified', 4.8, '1500+', 1, 12, '2026-02-23 08:26:18'),
(13, 'GI Pipes & Fittings', 'gi-pipes-fittings', 'Galvanized Iron, ISI Certified', 'ISI certified galvanized iron pipes for plumbing and industrial use. Hot-dip galvanized for superior corrosion protection.', './assets/images/GI-pipes-Fittings.png', 'Pipes & Fittings', 'ISI MARK', 'bg-green-600', 1200.00, 18900.00, 1404.00, 18.00, 1, 'In Stock', 'Ships within 24 hrs', 1, 1, 'Piece', '3–5 Days', 'Mfr. Terms', 'ISI Certified', 4.7, '1800+', 1, 13, '2026-02-23 08:26:18'),
(14, 'SS-Pipes-Fittings #130', 'ss-pipes-fittings-130', 'IBR Approved • High Temperature', 'SS-Pipes-Fittings #130 is a premium-grade stainless steel piping component designed for high durability and reliable performance in demanding industrial environments. Manufactured using superior quality stainless steel, it ensures excellent corrosion resistance, structural strength, and long service life.\n\nThis product is ideal for applications that require leak-proof connections, smooth flow efficiency, and resistance to high pressure and temperature conditions. With precision engineering and quality finishing, SS-Pipes-Fittings #130 delivers consistent performance across various industrial sectors.', './assets/images/products/ss-pipes-fittings-130-1771848552.png', 'Pipes & Fittings', '', 'bg-orange-600', 1500.00, 2000.00, 3000.00, 20.00, 0, 'In Stock', 'Ships within 24 hrs', 1, 2, 'Piece', '5-7 Days', 'Mfr. Terms', 'ISO • IBR', 4.5, '100+ Orders', 1, 1, '2026-02-23 12:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_applications`
--

CREATE TABLE `product_applications` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `application` varchar(500) NOT NULL,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_applications`
--

INSERT INTO `product_applications` (`id`, `product_id`, `application`, `sort_order`) VALUES
(1, 1, 'Power generation and thermal plants', 1),
(2, 1, 'Boiler and steam systems', 2),
(3, 1, 'Oil & gas refineries', 3),
(4, 1, 'Chemical processing industries', 4),
(5, 1, 'Water treatment facilities', 5),
(6, 1, 'Manufacturing industries', 6),
(7, 2, 'Industrial steam pipelines', 1),
(8, 2, 'Process plants', 2),
(9, 2, 'Water treatment', 3),
(10, 2, 'Chemical plants', 4),
(11, 2, 'Power plants', 5),
(12, 2, 'HVAC systems', 6),
(13, 3, 'High pressure steam lines', 1),
(14, 3, 'Oil & gas pipelines', 2),
(15, 3, 'Petrochemical plants', 3),
(16, 3, 'Power generation', 4),
(17, 3, 'Water treatment', 5),
(18, 3, 'Industrial process piping', 6),
(19, 4, 'Critical high pressure applications', 1),
(20, 4, 'Petrochemical refineries', 2),
(21, 4, 'High pressure steam systems', 3),
(22, 4, 'Power generation plants', 4),
(23, 4, 'Chemical processing', 5),
(24, 4, 'Industrial process lines', 6),
(25, 5, 'Steam distribution systems', 1),
(26, 5, 'Power plants', 2),
(27, 5, 'Oil & gas processing', 3),
(28, 5, 'Chemical industry', 4),
(29, 5, 'Boiler feed lines', 5),
(30, 5, 'Process control', 6),
(31, 6, 'High pressure steam service', 1),
(32, 6, 'Critical process lines', 2),
(33, 6, 'Petrochemical plants', 3),
(34, 6, 'Power generation', 4),
(35, 6, 'Boiler systems', 5),
(36, 6, 'Process control applications', 6),
(37, 7, 'High pressure small bore lines', 1),
(38, 7, 'Instrumentation lines', 2),
(39, 7, 'Boiler accessories', 3),
(40, 7, 'Chemical plants', 4),
(41, 7, 'Oil & gas', 5),
(42, 7, 'Steam tracing lines', 6),
(43, 8, 'High pressure process lines', 1),
(44, 8, 'Steam tracing', 2),
(45, 8, 'Instrumentation', 3),
(46, 8, 'Chemical service', 4),
(47, 8, 'Oil & gas production', 5),
(48, 8, 'Utility systems', 6),
(49, 9, 'Pump discharge lines', 1),
(50, 9, 'Boiler feed water systems', 2),
(51, 9, 'Steam lines', 3),
(52, 9, 'Chemical process lines', 4),
(53, 9, 'Water supply systems', 5),
(54, 9, 'Industrial pipelines', 6),
(55, 10, 'Corrosive media pipelines', 1),
(56, 10, 'Chemical processing', 2),
(57, 10, 'Steam service', 3),
(58, 10, 'Food and beverage industry', 4),
(59, 10, 'Pharmaceutical plants', 5),
(60, 10, 'Marine applications', 6),
(61, 11, 'Industrial process piping', 1),
(62, 11, 'Structural applications', 2),
(63, 11, 'Water supply systems', 3),
(64, 11, 'Oil & gas transportation', 4),
(65, 11, 'Fire protection systems', 5),
(66, 11, 'HVAC systems', 6),
(67, 12, 'Chemical process piping', 1),
(68, 12, 'Food and beverage industry', 2),
(69, 12, 'Pharmaceutical plants', 3),
(70, 12, 'Dairy industry', 4),
(71, 12, 'Marine applications', 5),
(72, 12, 'High purity systems', 6),
(73, 13, 'Water supply and distribution', 1),
(74, 13, 'Plumbing systems', 2),
(75, 13, 'Fire protection systems', 3),
(76, 13, 'Agriculture irrigation', 4),
(77, 13, 'HVAC systems', 5),
(78, 13, 'General industrial use', 6);

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `feature` varchar(500) NOT NULL,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_features`
--

INSERT INTO `product_features` (`id`, `product_id`, `feature`, `sort_order`) VALUES
(1, 1, 'IBR certified for boiler applications', 1),
(2, 1, 'High pressure and temperature resistance', 2),
(3, 1, 'Precision-machined seat for zero leakage', 3),
(4, 1, 'Corrosion resistant bronze body', 4),
(5, 1, 'Rising stem for visual status indication', 5),
(6, 1, 'Easy installation and maintenance', 6),
(7, 2, 'IBR certified for steam systems', 1),
(8, 2, 'Heavy duty cast iron construction', 2),
(9, 2, 'Flanged end for secure pipeline connection', 3),
(10, 2, 'Corrosion resistant coating', 4),
(11, 2, 'Wedge gate design for tight shut-off', 5),
(12, 2, 'Low maintenance design', 6),
(13, 3, 'IBR certified – Class 150# pressure rating', 1),
(14, 3, 'Bolted bonnet for pressure containment', 2),
(15, 3, 'Full port design for unrestricted flow', 3),
(16, 3, 'ASTM WCB cast steel body', 4),
(17, 3, 'Rising stem position indicator', 5),
(18, 3, 'Suitable for steam, water, oil, gas', 6),
(19, 4, 'IBR certified – Class 300# high pressure', 1),
(20, 4, 'Premium cast steel WCB body', 2),
(21, 4, 'Designed for critical process conditions', 3),
(22, 4, 'Bolted bonnet for safety', 4),
(23, 4, 'Precision machined seats', 5),
(24, 4, 'Wide temperature range operation', 6),
(25, 5, 'IBR certified steam service valve', 1),
(26, 5, 'Globe design for precise flow control', 2),
(27, 5, 'Class 150# pressure rated', 3),
(28, 5, 'Cast steel WCB body', 4),
(29, 5, 'Parabolic disc for accurate throttling', 5),
(30, 5, 'Easy maintenance access', 6),
(31, 6, 'IBR certified – Class 300# service', 1),
(32, 6, 'Heavy duty construction', 2),
(33, 6, 'Bolted bonnet design', 3),
(34, 6, 'Precision throttling capability', 4),
(35, 6, 'High temp and pressure resistance', 5),
(36, 6, 'Suitable for critical steam systems', 6),
(37, 7, 'Forged A-105 superior strength', 1),
(38, 7, 'Socket weld connection for tight seal', 2),
(39, 7, 'Class 800# to 1500# rated', 3),
(40, 7, 'Compact forged body design', 4),
(41, 7, 'IBR certified for steam service', 5),
(42, 7, 'Low fugitive emissions', 6),
(43, 8, 'Forged A-105 high strength material', 1),
(44, 8, 'Threaded connections for easy installation', 2),
(45, 8, 'Class 800# to 1500# rated', 3),
(46, 8, 'Precision globe design for flow control', 4),
(47, 8, 'IBR certified', 5),
(48, 8, 'Compact design for tight spaces', 6),
(49, 9, 'SS304 for excellent corrosion resistance', 1),
(50, 9, 'Swing type prevents backflow', 2),
(51, 9, 'IBR certified for steam applications', 3),
(52, 9, 'Forged body for high integrity', 4),
(53, 9, 'Wide temperature operating range', 5),
(54, 9, 'Low pressure drop design', 6),
(55, 10, 'SS304 stainless steel construction', 1),
(56, 10, 'Corrosion resistant for aggressive media', 2),
(57, 10, 'Flanged end connection', 3),
(58, 10, 'IBR certified', 4),
(59, 10, 'Suitable for chemical and steam service', 5),
(60, 10, 'Long service life', 6),
(61, 11, 'ISI certified quality assurance', 1),
(62, 11, 'Available in ERW and seamless grades', 2),
(63, 11, 'Wide size range 15mm to 300mm NB', 3),
(64, 11, 'Suitable for high pressure applications', 4),
(65, 11, 'Galvanized option available', 5),
(66, 11, 'Custom lengths on request', 6),
(67, 12, 'Premium SS304/SS316/SS321 grades', 1),
(68, 12, 'Hygienic surface finish available', 2),
(69, 12, 'Seamless and welded construction', 3),
(70, 12, 'Corrosion resistant for aggressive media', 4),
(71, 12, 'Food and pharma grade available', 5),
(72, 12, 'Custom sizes available', 6),
(73, 13, 'ISI certified galvanized iron', 1),
(74, 13, 'Hot-dip galvanized coating', 2),
(75, 13, 'Superior corrosion protection', 3),
(76, 13, 'Suitable for water supply systems', 4),
(77, 13, 'Available in light, medium, heavy grades', 5),
(78, 13, 'Standard 6m lengths', 6);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_path` varchar(300) NOT NULL,
  `alt_text` varchar(300) DEFAULT NULL,
  `is_primary` tinyint(1) DEFAULT 0,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `alt_text`, `is_primary`, `sort_order`) VALUES
(1, 1, './assets/images/Globe-Valve-1.png', 'Bronze Globe Steam Stop Valve', 1, 1),
(2, 2, './assets/images/Globe-Valve-1.png', 'Cast Iron Globe Steam Stop Valve', 1, 1),
(3, 3, './assets/images/Gate-Valve-1.png', 'Cast Steel Gate Valve Class 150', 1, 1),
(4, 4, './assets/images/Gate-Valve-1.png', 'Cast Steel Gate Valve Class 300', 1, 1),
(5, 5, './assets/images/Globe-Valve-1.png', 'Cast Steel Globe Valve Class 150', 1, 1),
(6, 6, './assets/images/Globe-Valve-1.png', 'Cast Steel Globe Valve Class 300', 1, 1),
(7, 7, './assets/images/Gate-Valve-1.png', 'Forged Steel A105 Gate Valve', 1, 1),
(8, 8, './assets/images/Globe-Valve-1.png', 'Forged Steel A105 Globe Valve', 1, 1),
(9, 9, './assets/images/Ball-Valve.png', 'Forged Steel F304 Check Valve', 1, 1),
(10, 10, './assets/images/Gate-Valve-1.png', 'Forged Steel F304 Gate Valve', 1, 1),
(11, 11, './assets/images/MS-pipes-Fittings.png', 'MS Pipes and Fittings', 1, 1),
(12, 12, './assets/images/SS-Pipes-Fittings.png', 'SS Pipes and Fittings', 1, 1),
(13, 13, './assets/images/GI-pipes-Fittings.png', 'GI Pipes and Fittings', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_offers`
--

CREATE TABLE `product_offers` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `icon` varchar(20) DEFAULT '?',
  `offer_text` varchar(500) NOT NULL,
  `valid_note` varchar(200) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_offers`
--

INSERT INTO `product_offers` (`id`, `product_id`, `category`, `icon`, `offer_text`, `valid_note`, `is_active`, `sort_order`) VALUES
(1, NULL, 'Gate / Globe Valves', '🔩', 'Buy any IBR valve & get free gasket kit worth ₹200', 'Valid this week', 1, 1),
(2, NULL, 'Gate / Globe Valves', '📦', 'Order 5+ Globe Valves — get 6% bulk discount auto-applied', NULL, 1, 2),
(3, NULL, 'Gate / Globe Valves', '🚚', 'FREE delivery on Gate/Globe Valve orders above ₹5,000', NULL, 1, 3),
(4, NULL, 'Ball / Check Valves', '🔩', 'Buy 3+ Ball Valves — get 5% off on total order', NULL, 1, 1),
(5, NULL, 'Ball / Check Valves', '📦', 'SS304 Check Valve combo: save ₹350 on 2-piece set', NULL, 1, 2),
(6, NULL, 'Ball / Check Valves', '🚚', 'FREE delivery on orders above ₹4,000', NULL, 1, 3),
(7, NULL, 'Pipes & Fittings', '🔩', 'Buy MS + GI combo — get flat ₹400 off', NULL, 1, 1),
(8, NULL, 'Pipes & Fittings', '📦', 'SS Pipe bulk order (50m+): custom pricing available', NULL, 1, 2),
(9, NULL, 'Pipes & Fittings', '🚚', 'FREE delivery on pipe orders above ₹8,000', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `spec_key` varchar(200) NOT NULL,
  `spec_value` varchar(500) NOT NULL,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_specifications`
--

INSERT INTO `product_specifications` (`id`, `product_id`, `spec_key`, `spec_value`, `sort_order`) VALUES
(1, 1, 'Material', 'Cast Bronze / Gunmetal Alloy', 1),
(2, 1, 'Certification', 'IBR Approved • ISO 9001:2008', 2),
(3, 1, 'Connection Type', 'Flanged / Threaded', 3),
(4, 1, 'Pressure Rating', 'PN 16 to PN 25', 4),
(5, 1, 'Size Range', '15mm to 100mm', 5),
(6, 1, 'Temp. Range', '-20°C to 220°C', 6),
(7, 2, 'Material', 'Cast Iron / ASTM A126', 1),
(8, 2, 'Certification', 'IBR Approved • ISO 9001:2008', 2),
(9, 2, 'Connection Type', 'Flanged End', 3),
(10, 2, 'Pressure Rating', 'Class 125 / 250', 4),
(11, 2, 'Size Range', '50mm to 300mm', 5),
(12, 2, 'Temp. Range', '-20°C to 230°C', 6),
(13, 3, 'Material', 'Cast Steel / WCB', 1),
(14, 3, 'Certification', 'IBR Approved • ISO 9001:2008', 2),
(15, 3, 'Connection Type', 'Flanged / Bolted Bonnet', 3),
(16, 3, 'Pressure Rating', 'Class 150#', 4),
(17, 3, 'Size Range', '25mm to 600mm', 5),
(18, 3, 'Temp. Range', '-29°C to 425°C', 6),
(19, 4, 'Material', 'Cast Steel / WCB', 1),
(20, 4, 'Certification', 'IBR Approved • ISO 9001:2008', 2),
(21, 4, 'Connection Type', 'Flanged / Bolted Bonnet', 3),
(22, 4, 'Pressure Rating', 'Class 300#', 4),
(23, 4, 'Size Range', '25mm to 600mm', 5),
(24, 4, 'Temp. Range', '-29°C to 425°C', 6),
(25, 5, 'Material', 'Cast Steel / WCB', 1),
(26, 5, 'Certification', 'IBR Approved • ISO 9001:2008', 2),
(27, 5, 'Connection Type', 'Flanged / Bolted Bonnet', 3),
(28, 5, 'Pressure Rating', 'Class 150#', 4),
(29, 5, 'Size Range', '25mm to 300mm', 5),
(30, 5, 'Temp. Range', '-29°C to 425°C', 6),
(31, 6, 'Material', 'Cast Steel / WCB', 1),
(32, 6, 'Certification', 'IBR Approved • ISO 9001:2008', 2),
(33, 6, 'Connection Type', 'Flanged / Bolted Bonnet', 3),
(34, 6, 'Pressure Rating', 'Class 300#', 4),
(35, 6, 'Size Range', '25mm to 300mm', 5),
(36, 6, 'Temp. Range', '-29°C to 425°C', 6),
(37, 7, 'Material', 'Forged Steel A-105', 1),
(38, 7, 'Certification', 'IBR Approved • ISO 9001:2008', 2),
(39, 7, 'Connection Type', 'Socket Weld / Screwed', 3),
(40, 7, 'Pressure Rating', 'Class 800# / 1500#', 4),
(41, 7, 'Size Range', '8mm to 50mm', 5),
(42, 7, 'Temp. Range', '-29°C to 425°C', 6),
(43, 8, 'Material', 'Forged Steel A-105', 1),
(44, 8, 'Certification', 'IBR Approved • ISO 9001:2008', 2),
(45, 8, 'Connection Type', 'Threaded / Socket Weld', 3),
(46, 8, 'Pressure Rating', 'Class 800# / 1500#', 4),
(47, 8, 'Size Range', '8mm to 50mm', 5),
(48, 8, 'Temp. Range', '-29°C to 425°C', 6),
(49, 9, 'Material', 'Forged SS 304 (F-304)', 1),
(50, 9, 'Certification', 'IBR Approved • ISO 9001:2008', 2),
(51, 9, 'Type', 'Swing / Piston Check', 3),
(52, 9, 'Pressure Rating', 'Class 800# / 1500#', 4),
(53, 9, 'Size Range', '8mm to 50mm', 5),
(54, 9, 'Temp. Range', '-196°C to 450°C', 6),
(55, 10, 'Material', 'Forged SS 304 (F-304)', 1),
(56, 10, 'Certification', 'IBR Approved • ISO 9001:2008', 2),
(57, 10, 'Connection Type', 'Flanged End', 3),
(58, 10, 'Pressure Rating', 'Class 150# to 300#', 4),
(59, 10, 'Size Range', '15mm to 200mm', 5),
(60, 10, 'Temp. Range', '-196°C to 450°C', 6),
(61, 11, 'Material', 'Mild Steel (MS)', 1),
(62, 11, 'Standard', 'IS 1239 / IS 3589 / ASTM A106', 2),
(63, 11, 'Type', 'ERW / Seamless / Welded', 3),
(64, 11, 'Schedule', 'SCH 40 / SCH 80 / XS', 4),
(65, 11, 'Size Range', '15mm to 300mm NB', 5),
(66, 11, 'Length', '6m / 12m or custom', 6),
(67, 12, 'Material', 'SS304 / SS316 / SS321', 1),
(68, 12, 'Standard', 'ASTM A312 / IS 6913', 2),
(69, 12, 'Type', 'Seamless / Welded', 3),
(70, 12, 'Schedule', 'SCH 10S / SCH 40S / SCH 80S', 4),
(71, 12, 'Size Range', '15mm to 300mm NB', 5),
(72, 12, 'Length', '6m / 12m or custom', 6),
(73, 13, 'Material', 'Galvanized Iron (GI)', 1),
(74, 13, 'Standard', 'IS 1239 / ISI Certified', 2),
(75, 13, 'Type', 'Hot Dip Galvanized', 3),
(76, 13, 'Grade', 'Light / Medium / Heavy', 4),
(77, 13, 'Size Range', '15mm to 150mm NB', 5),
(78, 13, 'Length', '6m standard', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `product_applications`
--
ALTER TABLE `product_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_product` (`product_id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_product` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_product` (`product_id`);

--
-- Indexes for table `product_offers`
--
ALTER TABLE `product_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_product` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_applications`
--
ALTER TABLE `product_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_offers`
--
ALTER TABLE `product_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
