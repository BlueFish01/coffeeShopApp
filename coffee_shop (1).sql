-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 08, 2022 at 07:58 PM
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
(9, 'Tin', 'Tin Wongcharoo', '81dc9bdb52d04dc20036dbd8313ed055', 'tinn.wongcharoo@gmail.com', '2022-10-29 15:29:52');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
