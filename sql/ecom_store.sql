-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-25 07:46:19
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `ecom_store`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `customer_image`) VALUES
(5, 'Test Without Buying', 'NoBuy@gmail.uk', 'koiwakskskd', '83728190', 'h-man.jpg'),
(13, 'karsh', 'karsh@gmail.com', '123456789', '87645312', 'business-man-cartoon-character-vector.jpg'),
(14, 'ken', 'ken@gmail.com', '987654321', '67945831', 'images.jfif'),
(15, 'Mary', 'mary@gmail.com', 'qweqweqwe', '24675487', 'png-transparent-woman-cartoon-businessperson-drawing-woman-people-public-relations-business-thumbnail.png'),
(16, 'Alex', 'alex@gmail.com', 'a1a1a1a1', '87649573', 'business-man-cartoon-character-vector.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_title` text NOT NULL,
  `product_img` text NOT NULL,
  `product_qty` int(10) NOT NULL,
  `product_price` float NOT NULL,
  `product_desc` text NOT NULL,
  `product_expirydate` date DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`product_id`, `customer_id`, `product_title`, `product_img`, `product_qty`, `product_price`, `product_desc`, `product_expirydate`, `date`) VALUES
(4, 13, 'Man Geox Winter Jacket', 'Man-Geox-Winter-jacket-1.jpg', 87, 688, 'A jecket for you winter. Keeping you warm and make you comfortable', NULL, NULL),
(6, 5, 'Woman Waxed Cotton Coat', 'waxed-cotton-coat-woman-1.jpg', 65, 799, 'Fashion coat made by Cotton, warm and comfortable', NULL, NULL),
(8, 5, 'Adidas Suarez Slop On', 'Man-Adidas-Suarez-Slop-On-1.jpg', 50, 399, 'Your best chooice on shoe, fashion and low price', NULL, NULL),
(15, 14, 'Merlin Engineer Jacket', 'Merlin-Enginner-Jacket.jpg', 1, 333, 'Make you look smarter. 99% of buyer  review that buying this product is their best choice in life.', '2018-12-20', NULL),
(16, 14, 'Mobile Power Jacket', 'Mobile-Power-Jacket.jpg', 2, 444, 'Come buy this jacket because this is good.', NULL, NULL),
(56, 15, 'MX Keys Mini Keyboard', '47559-keys-mini.png', 100, 500, 'MX Keys Mini stays powered up to 10 days on a full charge – or up to 5 months with backlighting turned off3Battery life may vary based on user and computing conditions. Use the USB-C charging cable to top up the power.', NULL, '2022-04-24'),
(57, 15, 'Estee Lauder Advanced Night Repair', '25546-Estee-Lauder-Advanced-Night-Repair.png', 346, 899, 'Through the pioneering genetic information coordination technology, it triggers a new rapid repair and youthful regeneration power, so that the skin can achieve the effect of radiance, tenderness and elasticity.', '2024-10-29', '2022-04-24'),
(58, 16, 'Cheonyuldan Ultimate Rejuvenating Balancer ', '122805-Ultimate-Rejuvenating-Balancer-150ml-1.jpg', 98, 540, 'It is a concentrated toner that contains precious and sudan ingredients, rich in moisture', '2024-01-24', '2022-04-24'),
(59, 16, 'Sony Vlog Camera ZV-1', '639546-camera.png', 10, 2500, 'I have buy a new camera, so this one is being sold', NULL, '2022-04-24'),
(60, 16, 'Sony RX10 IV', '319322-RX10.png', 39, 12999, 'Best camera forever, just need $12999, first come first serve', NULL, '2022-04-25'),
(61, 5, 'Electrolux PerfectCare 700', '414195-PerfectCare-700.png', 100, 4999, 'On sale. Weight is 8 kg and 1400 spin per min.', NULL, '2022-04-25'),
(62, 13, ' Samsung Galaxy A22 5G Phone', '762399-a22.png', 99, 1799, '6+128GB ram, cpu is using MediaTek MT6833 Dimensity 700 5G, allow NFC function ', NULL, '2022-04-25'),
(63, 13, ' Dyson Supersonic HD08', '658669-primary-iron-fuchsia.png', 599, 3199, '5 styling accessories, including the new anti-frizz nozzle, smart heat control, use the Dyson V9 digital motor', NULL, '2022-04-25'),
(64, 5, 'Xiaomi 2Pro', '485907-v2-1b1b339bae6071149bd535b16efc9ed5_720w.jpg', 123, 2000, '10,000 vibrations per minute and high-speed mopping for exceptional cleaning\r\nClassic design, fully upgraded', NULL, '2022-04-25'),
(65, 15, 'Decole Concombre Beer Cat ', '223174-beer-cat.png', 20, 29, 'beer-cat', NULL, '2022-04-25'),
(66, 14, 'organic soybeans', '565741-af45878bc11b7e28a309f7748346f0d1.png', 50, 160, 'La Manna - organic soybeans, health and delicious, helping you lose weight. 400g/package', '2023-06-13', '2022-04-25'),
(67, 14, 'Revisan ham', '114049-c765fd70b525f49bf55877c8d8d59e8f.png', 180, 299, '100g / package, Spain Iberian black pig sausage sliced (acorn fed) vacuum packed', '2022-06-21', '2022-04-25'),
(68, 5, 'BIO Beetroot Horseradish Sauce', '168799-7046895ed08803de385e9a38ff0bf771.png', 100, 99, '235g / can, organic and delicious', '2023-11-25', '2022-04-25'),
(69, 5, 'Nutella  Hazelnut Cocoa Spread', '398670-01588c161eccbd63dfe249fb4cf5bc2e.jpg', 197, 30, 'Delicious Cocoa Spread, you children must like it', '2023-08-24', '2022-04-25'),
(70, 5, 'Diablo (non-sugar) 80% dark chocolate', '918621-1afe4a50dbc7d0269b02aec9daeb695c.png', 548, 24.5, '75g / package, low weight of sugar make you healthier, but also with same delicious', '2023-10-16', '2022-04-25');

-- --------------------------------------------------------

--
-- 資料表結構 `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'Slide number 1', 'slide-1.jpg'),
(2, 'Slide number 2', 'slide-2.jpg'),
(3, 'Slide number 3', 'slide-3.jpg'),
(4, 'Slide number 4', 'slide-4.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `trade_record`
--

CREATE TABLE `trade_record` (
  `record_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `buyer_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_qty` int(10) NOT NULL,
  `product_price` float NOT NULL,
  `record_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `trade_record`
--

INSERT INTO `trade_record` (`record_id`, `p_id`, `seller_id`, `buyer_id`, `product_name`, `product_img`, `product_qty`, `product_price`, `record_date`) VALUES
(1, 16, 10, 8, 'Mobile Power Jacket', 'Mobile-Power-Jacket.jpg', 1, 99, '2022-04-24'),
(2, 16, 10, 8, 'Mobile Power Jacket', 'Mobile-Power-Jacket.jpg', 1, 99, '2022-04-24'),
(3, 58, 16, 13, 'Cheonyuldan Ultimate Rejuvenating Balancer ', '122805-Ultimate-Rejuvenating-Balancer-150ml-1.jpg', 1, 540, '2022-04-25'),
(4, 69, 5, 13, 'Nutella  Hazelnut Cocoa Spread', '398670-01588c161eccbd63dfe249fb4cf5bc2e.jpg', 1, 30, '2022-04-25'),
(5, 58, 16, 13, 'Cheonyuldan Ultimate Rejuvenating Balancer ', '122805-Ultimate-Rejuvenating-Balancer-150ml-1.jpg', 1, 540, '2022-04-25'),
(6, 69, 5, 13, 'Nutella  Hazelnut Cocoa Spread', '398670-01588c161eccbd63dfe249fb4cf5bc2e.jpg', 1, 30, '2022-04-25');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`,`customer_id`);

--
-- 資料表索引 `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`,`customer_id`);

--
-- 資料表索引 `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- 資料表索引 `trade_record`
--
ALTER TABLE `trade_record`
  ADD PRIMARY KEY (`record_id`,`p_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `trade_record`
--
ALTER TABLE `trade_record`
  MODIFY `record_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
