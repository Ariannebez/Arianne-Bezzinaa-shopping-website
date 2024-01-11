-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 11, 2024 at 02:14 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `street` longtext NOT NULL,
  `city` varchar(200) NOT NULL,
  `zipCode` varchar(200) NOT NULL,
  `region` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `userid` int(11) NOT NULL,
  `def` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `street`, `city`, `zipCode`, `region`, `mobile`, `userid`, `def`) VALUES
(35, 'triq alla', 'alla', 'AL1013', 'Got', '9999999', 24, 1),
(37, 'triq galea', 'Xara', 'xr1013', 'gozo', '99882211', 26, 1),
(38, 'vestru', 'Xara', 'XR120', 'Gozo', '232424', 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `image` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`) VALUES
(1, 'Jewellery', 'Explore our exclusive collection of handmade jewelry, where artistry meets individuality. Each piece tells a story, making your choice truly special.', 'img/jewellery.avif'),
(2, 'Bags', 'Discover our exclusive line of handmade bags, where craftsmanship meets individuality. Each piece tells a unique story, ensuring a distinctive accessory.', 'img/bags.jpg'),
(3, 'Ceramics', 'Discover unique handmade ceramics, each piece telling a story. Elevate your space with exquisite craftsmanship and individuality in every creation.', 'img/ceramics.webp');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `createddate` datetime NOT NULL,
  `updateddate` datetime NOT NULL,
  `addressid` int(11) NOT NULL,
  `statusid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id` int(11) NOT NULL,
  `status` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `status`) VALUES
(1, 'Created');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `ordersid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `productid`, `ordersid`, `qty`) VALUES
(1, 1, 2, 4),
(2, 3, 2, 1),
(3, 1, 3, 1),
(4, 2, 4, 2),
(5, 1, 5, 2),
(6, 2, 6, 1),
(7, 2, 7, 1),
(8, 6, 7, 1),
(9, 1, 8, 1),
(10, 16, 8, 1),
(11, 2, 9, 1),
(12, 1, 10, 1),
(13, 2, 11, 1),
(14, 16, 11, 2),
(15, 2, 12, 1),
(16, 16, 12, 1),
(17, 16, 13, 1),
(18, 3, 13, 1),
(19, 16, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `price` float NOT NULL,
  `stockQty` int(11) NOT NULL,
  `img` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `title`, `description`, `categoryid`, `price`, `stockQty`, `img`) VALUES
(1, 'Jewellery Set', 'Set of 3pcs', 'The set has a Golden ring earrings, a gold chunky bracelet and decor chain necklace.', 1, 25, 1, 'img/product/jewellerySet.avif'),
(2, 'Heart Ring', 'Gold plated', 'The inside diameter: 17.2mm, Width: 6mm\r\nand Opening: 4mm.', 1, 20, 2, 'img/product/heartring.webp'),
(3, 'Silver Heart Ring', 'Handmade Silver Hear Ring', 'A delightful little handmade sterling silver ring with an enchanting heart representing the greatest thing of all ‘love’.', 1, 25, 9, 'img/product/sliverheartring.jpeg'),
(4, 'Silver Leaf Earrings', 'Handmade Silver Leaf Earrings', 'Sweet hand cast leaves are paired with elegant French-style ear wires, all in sterling silver. Easy to wear everyday, very lightweight. Handmade ', 1, 30, 10, 'img/product/leafEarrings.webp'),
(5, 'Silver Anklet', 'Double Chain Silver Anklet', 'Charming Layered Anklet with Unique Dainty Silver Chain, Summer Jewelry for Women', 1, 35, 12, 'img/product/sliverAnklet.avif'),
(6, 'Crystal earrings', 'Handmade Crystal earrings ', 'Handmade, Stainless Steel Pin, Czech Crystals, Rondelle Beads, Miyuki Beads, Nickel Free', 1, 30, 4, 'img/product/HandmadeCrystalearrings .jpeg'),
(15, 'Tote Bag', 'Handmade Tote Bag', 'This tote bag is reusable, lightweight go-everywhere bag keeps you ready to shop responsibly. One-sided design, digitally printed. Hand wash in cold water.', 2, 10, 5, 'img/product/bag1.jpeg'),
(16, 'Bags', 'Handmade Bags from Recycled Leather', 'This bag is Reusable, lightweight go-everywhere. Water resistance and Hand wash in cold water.', 2, 30, 4, 'img/product/bag2.jpeg'),
(17, 'Shoulder Bag', 'Handmade Shoulder Bag', 'Lightweight go-everywhere, Water resistance and Hand wash in cold water.', 2, 25, 20, 'img/product/bag3.jpeg'),
(42, 'testing', 'wsdwsf', 'sfcvd', 3, 222, 12, 'img/product/bag1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `StatusId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`StatusId`, `name`) VALUES
(1, 'client'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `joined` date NOT NULL,
  `mobile` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `firstName`, `lastName`, `role`, `joined`, `mobile`) VALUES
(24, 'da0cee525ea095cebd642feb98c0fe5678fb7db3', 'amy@hotmail.com', 'Amy', 'Vella', 2, '2024-01-10', '999999999'),
(26, '4a2ef43ca952d2a376688ce73d4e56722260f6f5', 'marija@hotmail.com', 'Marija', 'Galea', 1, '2024-01-10', '99882211'),
(27, 'f06f7f776f5352ed81e38f657c5c8f5254d96016', 'marvic@hotmail.com', 'Mar', 'Bezzina', 1, '2024-01-11', '232424');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user`, `product`) VALUES
(34, 27, 1),
(35, 27, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_user_id` (`userid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addressfk` (`addressid`),
  ADD KEY `userfk` (`userid`),
  ADD KEY `statusfk` (`statusid`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`categoryid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statusId` (`role`),
  ADD KEY `statusId_2` (`role`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `product` (`product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_user_id` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `addressfk` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `statusfk` FOREIGN KEY (`statusid`) REFERENCES `orderstatus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userfk` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `status_id` FOREIGN KEY (`role`) REFERENCES `role` (`StatusId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
