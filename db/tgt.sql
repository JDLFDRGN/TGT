-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 04:05 AM
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
(202, 1, 15, '11-12-2022 11:01am', '11-12-2022 11:01am');

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
(2, 'chairs', '10-17-2022 08:30pm', '10-18-2022 05:25pm'),
(3, 'cabinets', '10-17-2022 08:30pm', '10-18-2022 05:25pm'),
(5, 'tables', '10-18-2022 05:26pm', '10-18-2022 05:26pm'),
(6, 'desk', '10-20-2022 03:46pm', '10-20-2022 03:46pm'),
(7, 'bed', '10-31-2022 04:39pm', '10-31-2022 04:39pm');

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
(19, 17, '90off', 3, '90.00', '10-31-2022 05:09pm', '10-31-2022 05:09pm', '2022-10-08'),
(20, 33, '90off', 3, '90.00', '11-01-2022 04:42pm', '11-01-2022 04:42pm', '2022-11-30'),
(21, 37, '90off', 3, '90.00', '11-04-2022 02:26pm', '11-04-2022 02:26pm', '2022-11-30');

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
(8, 'loyalty', 'Loyalty Coupon', '37', 'Hi Elon Musk, thanks for being such a loyal customer. As a thank you, we grant you 3 coupon code valid for 2022-11-30, just type \"90off\" to use discount.', '11-04-2022 02:26pm', '2022-11-07');

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
(2, 1, 'cod', '{\"data\":[{\"cartID\":\"197\",\"productID\":\"16\",\"productImg\":\"toro.avif\",\"productName\":\"Toro\",\"productQuantity\":\"2\",\"productPrice\":\"5600.00\"}],\"subtotal\":\"11200.00\",\"coupon\":\"0.00\",\"total\":\"11200.00\"}', 'Elon', 'Musk', 'elonmusk@gmail.com', '9988398495', 'Taguig City', '0923', 'Western Bicutan', '267', 'Tenement', '11-12-2022 10:22am', 'NA', 'NA', 'NA', 'New'),
(3, 1, 'cop', '{\"data\":[{\"cartID\":\"198\",\"productID\":\"13\",\"productImg\":\"Barnes-Kiddie-Table-White.jpg\",\"productName\":\"Barnes Kiddie\",\"productQuantity\":\"1\",\"productPrice\":\"4500.00\"}],\"subtotal\":\"4500.00\",\"coupon\":\"0.00\",\"total\":\"4500.00\"}', 'Elon', 'Musk', 'elonmusk@gmail.com', '9988398495', 'NA', 'NA', 'NA', 'NA', 'NA', '11-12-2022 10:32am', 'NA', 'NA', '2022-11-26', 'In Transit'),
(4, 1, 'gcash', '{\"data\":[{\"cartID\":\"199\",\"productID\":\"15\",\"productImg\":\"EQ266-ARMCHAIR.jpg\",\"productName\":\"EQ266\",\"productQuantity\":\"1\",\"productPrice\":\"4500.00\"}],\"subtotal\":\"4500.00\",\"coupon\":\"0.00\",\"total\":\"4500.00\"}', 'Elon', 'Musk', 'elonmusk@gmail.com', '9988398495', 'Abucay', '0923', 'Tanyag', '278', 'Hehehe', '11-12-2022 10:34am', 'c4ca4238a0b923820dcc509a6f75849b', 'c4ca4238a0b923820dcc509a6f75849b', 'NA', 'Received'),
(5, 1, 'cod', '{\"data\":[{\"cartID\":\"200\",\"productID\":\"13\",\"productImg\":\"Barnes-Kiddie-Table-White.jpg\",\"productName\":\"Barnes Kiddie\",\"productQuantity\":\"1\",\"productPrice\":\"4500.00\"}],\"subtotal\":\"4500.00\",\"coupon\":\"0.00\",\"total\":\"4500.00\"}', 'Elon', 'Musk', 'elonmusk@gmail.com', '09988398495', 'Abra de Ilog', '0923', 'Orions Belt', '786', 'Mars', '11-12-2022 10:59am', 'NA', 'NA', 'NA', 'New'),
(6, 1, 'cop', '{\"data\":[{\"cartID\":\"201\",\"productID\":\"13\",\"productImg\":\"Barnes-Kiddie-Table-White.jpg\",\"productName\":\"Barnes Kiddie\",\"productQuantity\":\"1\",\"productPrice\":\"4500.00\"}],\"subtotal\":\"4500.00\",\"coupon\":\"0.00\",\"total\":\"4500.00\"}', 'Elon', 'Musk', 'elonmusk@gmail.com', '09988398495', 'NA', 'NA', 'NA', 'NA', 'NA', '11-12-2022 11:01am', 'NA', 'NA', '2022-11-30', 'Received');

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
(13, 'Barnes-Kiddie-Table-White.jpg', 'Barnes Kiddie', '5', 'Excellent Quality', 30, '4500.00', '10-30-2022 09:08am', '10-30-2022 09:08am'),
(14, 'beatrice.jpg', 'Beatrice', '4', 'Excellent Quality', 84, '3400.00', '10-30-2022 09:09am', '10-30-2022 09:09am'),
(15, 'EQ266-ARMCHAIR.jpg', 'EQ266', '2', 'Excellent Quality', 79, '4500.00', '10-30-2022 09:10am', '10-30-2022 09:10am'),
(16, 'toro.avif', 'Toro', '6', 'Excellent Quality', 77, '5600.00', '10-30-2022 09:10am', '10-30-2022 09:10am'),
(17, '', 'No Brand', '2', 'No Description', 19, '20.00', '10-30-2022 06:08pm', '10-30-2022 06:08pm'),
(19, '1408.jpg', '1408', '3', 'Excellent', 2, '2500.00', '10-31-2022 04:34pm', '10-31-2022 04:34pm');

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
(3, 13, 9, '11-12-2022 11:02am'),
(4, 14, 6, '11-01-2022 04:57pm'),
(5, 15, 1, '11-12-2022 10:53am'),
(6, 16, 2, '11-01-2022 04:57pm'),
(7, 17, 0, ''),
(8, 18, 0, ''),
(9, 19, 2, '11-03-2022 10:25am');

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
(9, 24, 37, 19, '100', 'Solido\r\n', '11-03-2022 10:26am');

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
(20, 6, '0.00', '4500.00', '4500.00', '11-12-2022 11:02am');

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
(1, 'elon.jpg', 'elonmusk@gmail.com', 'elon', 'musk', 'Male', '2022-11-30', '9e887375eaba77dc7568e4048268520e', 'yes', '11-09-2022 07:50am', '11-09-2022 07:50am');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_loyalty_discount`
--
ALTER TABLE `tbl_loyalty_discount`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_product_sold`
--
ALTER TABLE `tbl_product_sold`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_seasonal_discount`
--
ALTER TABLE `tbl_seasonal_discount`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
