-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 02:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `ID` int(11) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ID`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `ID` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `added_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`ID`, `user`, `product`, `added_at`, `updated_at`) VALUES
(54, 29, 29, '10-21-2022 12:40pm', '10-21-2022 12:40pm'),
(55, 29, 29, '10-21-2022 12:41pm', '10-21-2022 12:41pm'),
(154, 30, 5, '10-27-2022 09:35pm', '10-27-2022 09:35pm'),
(166, 29, 14, '10-30-2022 02:05pm', '10-30-2022 02:05pm'),
(203, 2, 19, '11-20-2022 11:24am', '11-20-2022 11:24am'),
(205, 2, 13, '11-22-2022 01:37pm', '11-22-2022 01:37pm'),
(207, 3, 17, '11-22-2022 02:54pm', '11-22-2022 02:54pm'),
(219, 8, 15, '11-24-2022 04:23pm', '11-24-2022 04:23pm'),
(221, 7, 13, '11-25-2022 04:37pm', '11-25-2022 04:37pm'),
(222, 9, 16, '11-25-2022 07:23pm', '11-25-2022 07:23pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `ID` int(11) NOT NULL,
  `category` varchar(250) DEFAULT NULL,
  `created_at` varchar(250) DEFAULT NULL,
  `updated_at` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`ID`, `category`, `created_at`, `updated_at`) VALUES
(2, 'Chairs', '10-17-2022 08:30pm', '11-21-2022 06:24am'),
(3, 'Cabinets', '10-17-2022 08:30pm', '11-21-2022 06:24am'),
(5, 'Tables', '10-18-2022 05:26pm', '11-21-2022 06:25am'),
(6, 'Sala set', '10-20-2022 03:46pm', '11-21-2022 06:26am'),
(7, 'Bed', '10-31-2022 04:39pm', '11-23-2022 12:59am'),
(8, 'Dining table set', '11-21-2022 06:23am', '11-21-2022 06:23am');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loyalty_discount`
--

CREATE TABLE `tbl_loyalty_discount` (
  `ID` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `expired_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_loyalty_discount`
--

INSERT INTO `tbl_loyalty_discount` (`ID`, `user`, `code`, `quantity`, `percentage`, `created_at`, `updated_at`, `expired_at`) VALUES
(16, 21, '90off', 2, '90.00', '10-29-2022 01:13pm', '10-29-2022 01:13pm', '2022-11-01'),
(18, 29, '10off', 3, '10.00', '10-30-2022 02:06pm', '10-30-2022 02:06pm', '2022-10-31'),
(20, 33, '90off', 3, '90.00', '11-01-2022 04:42pm', '11-01-2022 04:42pm', '2022-11-30'),
(21, 37, '90off', 3, '90.00', '11-04-2022 02:26pm', '11-04-2022 02:26pm', '2022-11-30'),
(22, 2, 'VERF#245412', 1, '10.00', '11-22-2022 09:08pm', '11-22-2022 09:08pm', '2022-11-30'),
(24, 8, '14354', 0, '20.00', '11-24-2022 03:51pm', '11-24-2022 03:51pm', '2022-11-25'),
(25, 1, '60off', 86, '60.00', '12-02-2022 10:08am', '12-02-2022 10:08am', '2022-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `expired_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`ID`, `type`, `title`, `user`, `message`, `created_at`, `expired_at`) VALUES
(3, 'loyalty', 'Loyalty Coupon', '21', 'Hi Elon Musk, thanks for being such a loyal customer. As a thank you, we grant you 3 coupon code valid for 2022-11-01, just type \"90off\" to use discount.', '10-29-2022 01:13pm', '2022-11-01'),
(4, 'loyalty', 'Loyalty Coupon', '21', 'Hi Elon Musk, thanks for being such a loyal customer. As a thank you, we grant you 3 coupon code valid for 2022-11-05, just type \"10off\" to use discount.', '10-29-2022 01:31pm', '2022-11-01'),
(5, 'loyalty', 'Loyalty Coupon', '29', 'Hi Belat Image, thanks for being such a loyal customer. As a thank you, we grant you 3 coupon code valid for 2022-10-31, just type \"10off\" to use discount.', '10-30-2022 02:06pm', '2022-11-02'),
(6, 'loyalty', 'Loyalty Coupon', '17', 'Hi Dwayne Johnson, thanks for being such a loyal customer. As a thank you, we grant you 90 coupon code valid for 2022-10-08, just type \"90off\" to use discount.', '10-31-2022 05:09pm', '2022-11-03'),
(7, 'loyalty', 'Loyalty Coupon', '33', 'Hi Jeffry Dahmer, thanks for being such a loyal customer. As a thank you, we grant you 3 coupon code valid for 2022-11-30, just type \"90off\" to use discount.', '11-01-2022 04:42pm', '2022-11-04'),
(8, 'loyalty', 'Loyalty Coupon', '37', 'Hi Elon Musk, thanks for being such a loyal customer. As a thank you, we grant you 3 coupon code valid for 2022-11-30, just type \"90off\" to use discount.', '11-04-2022 02:26pm', '2022-11-07'),
(9, 'loyalty', 'Loyalty Coupon', '2', 'Hi MaryGrace Bernardez, thanks for being such a loyal customer. As a thank you, we grant you 1 coupon code valid for 2022-11-30, just type \"VERF#245412\" to use discount.', '11-22-2022 09:08pm', '2022-11-25'),
(10, 'loyalty', 'Loyalty Coupon', '8', 'Hi Juan Dela Cruz, thanks for being such a loyal customer. As a thank you, we grant you 1 coupon code valid for 2022-11-24, just type \"14354\" to use discount.', '11-24-2022 03:44pm', '2022-11-27'),
(11, 'loyalty', 'Loyalty Coupon', '8', 'Hi Juan Dela Cruz, thanks for being such a loyal customer. As a thank you, we grant you 2 coupon code valid for 2022-11-25, just type \"14354\" to use discount.', '11-24-2022 03:51pm', '2022-11-27'),
(12, 'loyalty', 'Loyalty Coupon', '1', 'Hi Elon Musk, thanks for being such a loyal customer. As a thank you, we grant you 3 coupon code valid for 2022-12-31, just type \"60off\" to use discount.', '12-02-2022 10:06am', '2022-12-05'),
(13, 'loyalty', 'Loyalty Coupon', '1', 'Hi Elon Musk, thanks for being such a loyal customer. As a thank you, we grant you 90 coupon code valid for 2022-12-31, just type \"60off\" to use discount.', '12-02-2022 10:08am', '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `ID` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `package` longtext NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `hnos` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ordered_at` varchar(255) NOT NULL,
  `gcash` longtext DEFAULT NULL,
  `mpin` longtext DEFAULT NULL,
  `appointment` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`ID`, `user`, `payment`, `package`, `firstname`, `lastname`, `email`, `number`, `city`, `zipcode`, `barangay`, `hnos`, `address`, `ordered_at`, `gcash`, `mpin`, `appointment`, `status`) VALUES
(1, 1, 'cod', '{\"data\":[{\"cartID\":\"230\",\"productID\":\"15\",\"productImg\":\"280110008_496202518901679_250248091502284571_n.jpg\",\"productName\":\"Wood cabinet\",\"productQuantity\":\"1\",\"productPrice\":\"4000.00\"}],\"subtotal\":\"4000.00\",\"couponID\":\"25\",\"coupon\":\"2400.00\",\"total\":\"1600.00\",\"overall\":\"1815.00\",\"shipping\":\"215.00\"}', 'Elon', 'Musk', 'elonmusk@gmail.com', '0989338293', 'ARAKAN', '8928', 'GREENFIELD', 'NA', 'Mars', '12-03-2022 06:29am', 'NA', 'NA', 'NA', 'New'),
(2, 1, 'cop', '{\"data\":[{\"cartID\":\"232\",\"productID\":\"13\",\"productImg\":\"313917665_903263707322162_8166005113966728982_n.jpg\",\"productName\":\"Rattan Reading chair\",\"productQuantity\":\"1\",\"productPrice\":\"2500.00\"},{\"cartID\":\"233\",\"productID\":\"35\",\"productImg\":\"281249184_305510251772634_8368851713226941835_n.jpg\",\"productName\":\"Wooden sofa\",\"productQuantity\":\"2\",\"productPrice\":\"4590.00\"}],\"subtotal\":\"11680.00\",\"couponID\":\"25\",\"coupon\":\"7008.00\",\"total\":\"4672.00\",\"overall\":\"4872.00\",\"shipping\":\"200.00\"}', 'Elon', 'Musk', 'elonmusk@gmail.com', '0989338293', 'NA', 'NA', 'NA', 'NA', 'NA', '12-03-2022 06:34am', 'NA', 'NA', '2023-01-04', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `ID` int(11) NOT NULL,
  `product` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`ID`, `product`, `brand`, `category`, `description`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(13, '313917665_903263707322162_8166005113966728982_n.jpg', 'Rattan Reading chair', '2', 'Put the Chair inside or outside. It will be perfect for both and you will be a trendsetter.', 26, '2500.00', '10-30-2022 09:08am', '11-21-2022 06:19am'),
(14, 'beatrice.jpg', 'Beatrice', '4', 'Excellent Quality', 84, '3400.00', '10-30-2022 09:09am', '10-30-2022 09:09am'),
(15, '280110008_496202518901679_250248091502284571_n.jpg', 'Wood cabinet', '3', 'Wood cabinets are known for durability, fine texture, and smooth uniform grain.', 71, '4000.00', '10-30-2022 09:10am', '11-23-2022 01:00am'),
(16, '280309797_696726838276230_2978888999204521285_n (1).jpg', 'Buffet sofa', '6', 'Wooden Sofa, If you have large family, indeed you use your living room a lot, so you need for solid', 8, '5600.00', '10-30-2022 09:10am', '11-23-2022 02:39am'),
(17, '315881747_1581448998963456_7234636050107663786_n.jpg', ' Piece table set', '8', 'High quality, perfect in a farmhouse kitchen or in contrast to super modern furniture.', 4, '12000.00', '10-30-2022 06:08pm', '11-24-2022 01:15pm'),
(19, '279927857_292289119787062_3635954129176825645_n.jpg', 'Daulton Chair ', '2', 'They may be made of wood, metal, or synthetic materials, and may be padded or upholstered in various colors and fabrics. Chairs vary in design.', 2, '2500.00', '10-31-2022 04:34pm', '11-21-2022 06:34am'),
(20, '279824921_531997365203498_4338666565811881746_n (1).jpg', 'Buffet sofa', '6', 'Wooden Sofa, If you have large family, indeed you use your living room a lot, so you need for solid', 5, '5200.00', '11-21-2022 06:36am', '11-23-2022 03:11am'),
(21, '281625698_323412323288105_7123512666744368309_n.jpg', 'Ratan long chair', '2', 'Put the Chair inside or outside. It will be perfect for both, and you will be a trendsetter.', 5, '2500.00', '11-21-2022 06:38am', '11-21-2022 06:38am'),
(22, '281081647_1268768936986246_4325647892563043111_n.jpg', 'Dining wood table', '5', 'It is perfect for hosting an informal gathering in your penthouse apartment.', 15, '14000.00', '11-21-2022 06:40am', '11-23-2022 03:15am'),
(23, '280784213_5884565928237031_5816398414702908941_n (1).jpg', 'Garrin Dining Chair', '2', 'A Classic dining chair with tufted backrest in fabric padded, constructed with solid mahogany wood.', 0, '3900.00', '11-21-2022 07:02am', '11-21-2022 07:02am'),
(24, '280749691_1175975873235808_9039874530997007164_n.jpg', 'Cabinet', '3', 'Use for storing and displaying items. ', 5, '5000.00', '11-22-2022 09:40pm', '11-22-2022 09:40pm'),
(25, '315978246_531713762176456_6948156221672001418_n.jpg', 'Single size bed', '7', 'Wooden, good quality', 5, '300.00', '11-23-2022 12:58am', '11-23-2022 01:21am'),
(26, '281148247_587710932463392_7993213476005460860_n.jpg', 'Circle shaped table', '5', 'It is one of our finest pieces of furniture which is a large antique dining table that can accommodate 6 people.', 25, '9000.00', '11-23-2022 01:24am', '11-23-2022 01:25am'),
(27, '281151281_1354912354987482_2140824167357328268_n.jpg', 'Conna ratan', '7', 'Features a leaf design that will light up your little one’s nursery', 20, '1900.00', '11-23-2022 02:01am', '11-24-2022 01:17pm'),
(28, '316041685_872836727045171_321204764224620488_n.jpg', 'Single bed', '7', 'Good for one, good quality', 5, '2500.00', '11-23-2022 02:08am', '11-23-2022 02:08am'),
(29, '280269019_485449873269372_1628271554660269316_n.jpg', 'Rectangular-shaped table', '5', 'Dining tables made of wood are beautiful and can last for generations with proper maintenance and care.', 50, '14000.00', '11-23-2022 02:25am', '11-23-2022 02:25am'),
(30, '280305828_397985762220825_7689747501170922160_n (1).jpg', 'Mapple Wood Cabinet', '3', 'Maple’s pronounced grain patterns make it a preferred wood for traditional styles of cabinets. It is also a good option for stock, custom-made, and semi-custom cabinets.', 15, '5000.00', '11-23-2022 02:47am', '11-23-2022 02:47am'),
(31, '280596757_312736824365064_598661004214965840_n.jpg', 'Dining wood table', '5', 'Dining tables made of wood are beautiful and can last for generations with proper maintenance and care.', 30, '7000.00', '11-23-2022 02:53am', '11-23-2022 02:53am'),
(32, '281253830_332878352311151_3864850107613740386_n (1).jpg', 'Display cabinet/divider', '3', 'Divider cabinet design with TV unit. No need to build an extra wall in the living room for your media console.', 13, '8700.00', '11-23-2022 03:01am', '11-23-2022 03:01am'),
(33, '281006777_315690474078844_6689079950726782370_n.jpg', 'Queen size bed', '7', 'The Queen size measures 54 x 74 inches. It’s also a great choice for slightly larger kids’ rooms if you have just one child and you want to make sure that he or she has a bit more sleeping surface to rely on. They are a very popular choice.', 6, '3500.00', '11-24-2022 01:20pm', '11-24-2022 01:20pm'),
(34, '281148247_587710932463392_7993213476005460860_n.jpg', 'Circle shaped table', '8', 'it is one of our finest pieces of furniture which is a large antique dining table that can accommodate 6 people.', 10, '9000.00', '11-24-2022 01:24pm', '11-24-2022 01:24pm'),
(35, '281249184_305510251772634_8368851713226941835_n.jpg', 'Wooden sofa', '6', 'Wooden Sofa Set is an indispensable part of stylish living space', 8, '4590.00', '11-24-2022 01:28pm', '11-24-2022 01:28pm'),
(36, '316041685_872836727045171_321204764224620488_n.jpg', 'Wooden Bed', '7', 'Made of wood', 7, '4500.00', '11-24-2022 03:41pm', '11-24-2022 03:41pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_sold`
--

CREATE TABLE `tbl_product_sold` (
  `ID` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `sold_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_sold`
--

INSERT INTO `tbl_product_sold` (`ID`, `product`, `sold`, `sold_at`) VALUES
(2, 12, 2, '10-30-2022 09:35am'),
(3, 13, 13, '12-03-2022 09:22am'),
(4, 14, 6, '11-01-2022 04:57pm'),
(5, 15, 6, '12-03-2022 09:09am'),
(6, 16, 2, '11-01-2022 04:57pm'),
(7, 17, 0, ''),
(8, 18, 0, ''),
(9, 19, 2, '11-03-2022 10:25am'),
(10, 20, 0, ''),
(11, 21, 0, ''),
(12, 22, 0, ''),
(13, 23, 0, ''),
(14, 24, 0, ''),
(15, 25, 0, ''),
(16, 26, 0, ''),
(17, 27, 0, ''),
(18, 28, 0, ''),
(19, 29, 0, ''),
(20, 30, 0, ''),
(21, 31, 0, ''),
(22, 32, 0, ''),
(23, 33, 0, ''),
(24, 34, 0, ''),
(25, 35, 8, '12-03-2022 09:22am'),
(26, 36, 1, '11-24-2022 04:07pm'),
(27, 37, 0, ''),
(28, 38, 0, ''),
(29, 39, 0, ''),
(30, 40, 0, ''),
(31, 41, 0, ''),
(32, 42, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `ID` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `star` varchar(255) NOT NULL,
  `recommendation` varchar(255) NOT NULL,
  `submitted_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`ID`, `order`, `user`, `product`, `star`, `recommendation`, `submitted_at`) VALUES
(3, 14, 21, 13, '70', 'Excellent Quality', '10-31-2022 08:35am'),
(4, 16, 21, 12, '40', 'Poor Quality', '10-31-2022 08:36am'),
(5, 15, 21, 14, '100', 'The best', '10-31-2022 08:36am'),
(6, 16, 21, 13, '50', 'Average Quality', '10-31-2022 08:36am'),
(7, 21, 33, 13, '100', 'Awesome piece of rubbish', '11-01-2022 04:51pm'),
(8, 21, 33, 14, '0', 'Gugu gaga hshshs', '11-01-2022 04:51pm'),
(9, 24, 37, 19, '100', 'Solido\r\n', '11-03-2022 10:26am'),
(10, 11, 8, 36, '100', '', '11-24-2022 04:13pm'),
(11, 11, 8, 36, '100', '', '11-24-2022 04:13pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `ID` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `shipping` decimal(10,2) NOT NULL,
  `gross` decimal(10,2) NOT NULL,
  `net` decimal(10,2) NOT NULL,
  `received_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`ID`, `order`, `shipping`, `gross`, `net`, `received_at`) VALUES
(6, 12, '50.00', '1325.00', '1225.00', '10-29-2022 08:15pm'),
(7, 13, '50.00', '3960.50', '3149.50', '10-29-2022 08:15pm'),
(8, 4, '50.00', '15000.00', '14900.00', '10-29-2022 08:16pm'),
(9, 5, '0.00', '17950.00', '17950.00', '10-29-2022 08:16pm'),
(10, 16, '50.00', '11550.00', '11450.00', '10-30-2022 09:35am'),
(11, 14, '50.00', '4550.00', '4450.00', '10-30-2022 09:37am'),
(12, 15, '50.00', '19430.00', '970.00', '10-30-2022 11:17am'),
(13, 18, '50.00', '5650.00', '5550.00', '10-30-2022 11:18am'),
(14, 17, '50.00', '3450.00', '3350.00', '10-30-2022 11:18am'),
(15, 21, '50.00', '12450.00', '12350.00', '11-01-2022 04:47pm'),
(16, 20, '50.00', '3450.00', '3350.00', '11-01-2022 04:57pm'),
(17, 22, '50.00', '5650.00', '5550.00', '11-01-2022 04:57pm'),
(18, 24, '0.00', '4500.00', '4500.00', '11-03-2022 10:25am'),
(19, 4, '50.00', '4550.00', '4450.00', '11-12-2022 10:53am'),
(20, 6, '0.00', '4500.00', '4500.00', '11-12-2022 11:02am'),
(21, 11, '50.00', '5450.00', '3550.00', '11-24-2022 04:07pm'),
(22, 1, '50.00', '6450.00', '1550.00', '12-03-2022 06:53am'),
(23, 2, '0.00', '18688.00', '4672.00', '12-03-2022 06:54am'),
(24, 2, '0.00', '18688.00', '4672.00', '12-03-2022 08:07am'),
(25, 1, '215.00', '6615.00', '1815.00', '12-03-2022 08:44am'),
(26, 1, '215.00', '6615.00', '1815.00', '12-03-2022 08:55am'),
(27, 1, '215.00', '6615.00', '1815.00', '12-03-2022 09:01am'),
(28, 1, '215.00', '6615.00', '1815.00', '12-03-2022 09:09am'),
(29, 2, '0.00', '18688.00', '4672.00', '12-03-2022 09:09am'),
(30, 2, '0.00', '18688.00', '4672.00', '12-03-2022 09:22am');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seasonal_discount`
--

CREATE TABLE `tbl_seasonal_discount` (
  `ID` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `expired_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seasonal_discount`
--

INSERT INTO `tbl_seasonal_discount` (`ID`, `product`, `percentage`, `created_at`, `updated_at`, `expired_at`) VALUES
(1, 6, '90.00', '10-26-2022 02:34pm', '10-26-2022 03:12pm', '2022-10-29'),
(3, 5, '15.00', '10-26-2022 02:49pm', '10-26-2022 05:28pm', '2022-10-02'),
(6, 19, '90.00', '10-31-2022 05:14pm', '10-31-2022 05:14pm', '2022-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(11) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birthdate` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `activate` varchar(255) DEFAULT 'yes',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `profile`, `email`, `firstname`, `lastname`, `gender`, `birthdate`, `password`, `activate`, `created_at`, `updated_at`) VALUES
(1, 'elon.jpg', 'elonmusk@gmail.com', 'elon', 'musk', 'Male', '2022-11-30', '9e887375eaba77dc7568e4048268520e', 'yes', '11-09-2022 07:50am', '11-09-2022 07:50am'),
(2, '277681908_122935580339916_566369365555513409_n.jpg', 'mgbernardez3@gmail.com', 'MaryGrace', 'Bernardez', 'Female', '2001-06-26', '827ccb0eea8a706c4c34a16891f84e7b', 'yes', '11-22-2022 01:36pm', '11-22-2022 01:36pm'),
(3, 'received_689193692488568.jpeg', 'kevinnebres20@gmail.com', 'Kevin', 'Nebres', 'Male', '1994-01-22', 'e10adc3949ba59abbe56e057f20f883e', 'yes', '11-22-2022 02:40pm', '11-22-2022 02:56pm'),
(4, '', 'anonymous@gmail.com', 'anonymous', 'philippines', 'Male', '2022-11-30', '294de3557d9d00b3d2d8a1e6aab028cf', 'yes', '11-22-2022 05:35pm', '11-22-2022 05:35pm'),
(5, '', 'conquerorhaki0905@gmail.com', 'Mikko', 'Amorio', 'Male', '2022-11-22', '827ccb0eea8a706c4c34a16891f84e7b', 'yes', '11-22-2022 10:01pm', '11-22-2022 10:01pm'),
(6, 'male-profile.jpg', 'jude@gmail.com', 'Jude <3 Cherryl', 'Jaudian <3 Aniñon', 'Male', '2001-02-08', '903ce9225fca3e988c2af215d4e544d3', 'yes', '11-22-2022 11:31pm', '11-22-2022 11:31pm'),
(7, '1600w-7DwA1p6wxuk.webp', 'sarmogenesq@gmail.com', 'Queennie', 'Sarmogenes', 'Female', '20001-01-20', '301bef2f1611a2d13fa97e65cf74c230', 'yes', '11-24-2022 01:11pm', '11-24-2022 01:11pm'),
(8, '', 'sarmogenesq@gmail.com', 'Juan', 'Dela Cruz', 'Male', '2001-03-02', '25d55ad283aa400af464c76d713c07ad', 'yes', '11-24-2022 03:36pm', '11-24-2022 03:36pm'),
(9, 'download.jpg', 'hanniballecter@gmail.com', 'hannibal', 'lecter', 'Male', '2022-11-30', '2be8b9b78addc5bab742fbf3b3d992df', 'yes', '11-25-2022 07:21pm', '11-25-2022 07:21pm'),
(17, '', 'judelfederigan1@gmail.com', 'Judel', 'Federigan', 'Male', '2022-11-30', 'd8e9f31eee5ff20e69e22e9081f5596e', 'yes', '11-27-2022 10:43pm', '11-27-2022 10:43pm'),
(18, '', 'judelfederigan11@gmail.com', 'Judel', 'Federigan', 'Male', '2022-11-30', 'd8e9f31eee5ff20e69e22e9081f5596e', 'yes', '11-27-2022 10:47pm', '11-27-2022 10:47pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_loyalty_discount`
--
ALTER TABLE `tbl_loyalty_discount`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_product_sold`
--
ALTER TABLE `tbl_product_sold`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_seasonal_discount`
--
ALTER TABLE `tbl_seasonal_discount`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_loyalty_discount`
--
ALTER TABLE `tbl_loyalty_discount`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_product_sold`
--
ALTER TABLE `tbl_product_sold`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_seasonal_discount`
--
ALTER TABLE `tbl_seasonal_discount`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
