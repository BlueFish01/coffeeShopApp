-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 24, 2022 at 11:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_shop`
--
CREATE DATABASE IF NOT EXISTS `coffee_shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `coffee_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `drinkList`
--

CREATE TABLE `drinkList` (
  `drinkID` int NOT NULL,
  `orderID` int NOT NULL,
  `menuID` int NOT NULL,
  `drinkOption` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `sugar` varchar(20) NOT NULL,
  `qty` int NOT NULL,
  `comment` text,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `drinkList`
--

INSERT INTO `drinkList` (`drinkID`, `orderID`, `menuID`, `drinkOption`, `size`, `sugar`, `qty`, `comment`, `price`) VALUES
(7, 21, 1, 'Hot', 'small', 'noSugar', 1, '', '฿ 35'),
(8, 21, 5, 'Hot', 'small', 'noSugar', 1, '', '฿ 60'),
(9, 21, 5, 'Hot', 'small', 'noSugar', 2, '', '฿ 120'),
(10, 22, 1, 'Hot', 'small', 'noSugar', 1, '', '฿ 35'),
(11, 23, 1, 'Hot', 'small', 'noSugar', 3, '', '฿ 105');

-- --------------------------------------------------------

--
-- Table structure for table `drinkOrder`
--

CREATE TABLE `drinkOrder` (
  `orderID` int NOT NULL,
  `customerID` int NOT NULL,
  `amount` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `drinkOrder`
--

INSERT INTO `drinkOrder` (`orderID`, `customerID`, `amount`, `status`, `date`) VALUES
(21, 9, 215, 0, '2022-11-22 21:30:03'),
(22, 9, 35, 0, '2022-11-22 21:33:14'),
(23, 9, 105, 0, '2022-11-23 11:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID` int NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `Price` int NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `img_dir` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `Name`, `Description`, `Price`, `Status`, `img_dir`, `category`) VALUES
(1, 'Espresso', 'Two espresso shots', 35, 1, 'menu/espresso.jpg', 'Espresso'),
(2, 'Americano', 'Espresso and hot water', 40, 1, 'menu/americano.jpg', 'Espresso'),
(3, 'Cappuccino', 'Espresso with silky frothed milk, topped with a thick layer of creamy milk foam', 55, 1, 'menu/cappuccino.jpg', 'Espresso'),
(4, 'Latte', 'Coffee & steamed milk', 55, 1, 'menu/latte.jpg', 'Espresso'),
(5, 'Mocha', 'Espresso mixed with silky frothed milk and cocoa powder', 60, 1, 'menu/mocha.jpg', 'Espresso'),
(6, 'Thai Tea', 'Blend of fresh Thai tea & Milk', 45, 1, 'menu/thaitea.jpg', 'Tea'),
(7, 'Matcha Latte', 'Premium matcha & Milk with lightly sweetened taste', 60, 1, 'menu/matcha.jpg', 'Tea');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int NOT NULL,
  `USER_NAME` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `USER_FNAME` varchar(250) NOT NULL,
  `USER_PASS` varchar(250) NOT NULL,
  `USER_EMAIL` varchar(250) NOT NULL,
  `REGISTER_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_NAME`, `USER_FNAME`, `USER_PASS`, `USER_EMAIL`, `REGISTER_DATE`) VALUES
(8, 'jody', 'jody hhhh', '81dc9bdb52d04dc20036dbd8313ed055', 'T@gmail.com', '2022-10-17 00:06:58'),
(9, 'Tin', 'Tin Wongcharoo', '81dc9bdb52d04dc20036dbd8313ed055', 'tinn.wongcharoo@gmail.com', '2022-10-29 15:29:52'),
(10, 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@admin.co.th', '2022-11-22 15:19:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drinkList`
--
ALTER TABLE `drinkList`
  ADD PRIMARY KEY (`drinkID`),
  ADD KEY `orderID` (`orderID`,`menuID`),
  ADD KEY `menu_ID_fk` (`menuID`);

--
-- Indexes for table `drinkOrder`
--
ALTER TABLE `drinkOrder`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drinkList`
--
ALTER TABLE `drinkList`
  MODIFY `drinkID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `drinkOrder`
--
ALTER TABLE `drinkOrder`
  MODIFY `orderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drinkList`
--
ALTER TABLE `drinkList`
  ADD CONSTRAINT `menu_ID_fk` FOREIGN KEY (`menuID`) REFERENCES `menu` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_ID_fk` FOREIGN KEY (`orderID`) REFERENCES `drinkOrder` (`orderID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `drinkOrder`
--
ALTER TABLE `drinkOrder`
  ADD CONSTRAINT `user_ID_fk` FOREIGN KEY (`customerID`) REFERENCES `user` (`USER_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
