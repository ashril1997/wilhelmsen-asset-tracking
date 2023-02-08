-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2023 at 04:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int NOT NULL,
  `SerialNumber` varchar(20) DEFAULT NULL,
  `PurchaseDate` date DEFAULT NULL,
  `VesselDesc` varchar(50) DEFAULT NULL,
  `Vessel` int NOT NULL,
  `DeviceName` varchar(50) DEFAULT NULL,
  `IPAdd` varchar(20) DEFAULT NULL,
  `Subnet` varchar(20) DEFAULT NULL,
  `Gateway` varchar(20) DEFAULT NULL,
  `Maker` varchar(30) DEFAULT NULL,
  `Model` varchar(50) DEFAULT NULL,
  `WEDate` date DEFAULT NULL,
  `State` int NOT NULL,
  `Category` int NOT NULL,
  `WinKey` varchar(30) DEFAULT NULL,
  `Processor` varchar(100) DEFAULT NULL,
  `Vendor` int DEFAULT NULL,
  `Price` int DEFAULT NULL,
  `DeliveryDetail` varchar(100) DEFAULT NULL,
  `DelPort` varchar(50) DEFAULT NULL,
  `DelETA` date DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DeliveryDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Location` varchar(50) DEFAULT NULL,
  `SystemProvider` varchar(50) DEFAULT NULL,
  `Connectivity` varchar(50) DEFAULT NULL,
  `SuppProv` varchar(50) DEFAULT NULL,
  `OS` varchar(50) DEFAULT NULL,
  `CPUSpeed` varchar(50) DEFAULT NULL,
  `RAM` varchar(50) DEFAULT NULL,
  `HardDisk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `SerialNumber`, `PurchaseDate`, `VesselDesc`, `Vessel`, `DeviceName`, `IPAdd`, `Subnet`, `Gateway`, `Maker`, `Model`, `WEDate`, `State`, `Category`, `WinKey`, `Processor`, `Vendor`, `Price`, `DeliveryDetail`, `DelPort`, `DelETA`, `CreationDate`, `DeliveryDate`, `Location`, `SystemProvider`, `Connectivity`, `SuppProv`, `OS`, `CPUSpeed`, `RAM`, `HardDisk`) VALUES
(2, 'C001', '2022-12-18', 'CPU for A-Deck', 1, 'S1 CPU', '192.158.1.38', '255.0.0.0', 'Default Gateway', 'ASUS', 'ASUS 01 CPU', '2027-12-18', 1, 1, '32049203920', 'Intel i7', 1, 4000, 'ENCIK MAZLAN', 'KL Port', '2023-01-26', '2022-12-18 00:54:16', '2022-12-18 00:54:16', 'A Deck', 'Owner IT', 'Crew LAN', 'Owner IT', 'Windows 7', '2.5GHZ', '8GB', '1TB'),
(3, 'C002', '2022-12-17', 'CPU for B-Deck', 2, 'SHIP 2 CPU', '192.454.123', '255.255.255.192', 'Default Gateway', 'ACER', 'ACER NITRO', '2027-12-18', 1, 1, '9829848', 'Intel i9', 1, 5666, 'ENCIK MAZLAN', 'KL Port', '2022-12-17', '2022-12-18 01:11:15', '2022-12-18 01:11:15', 'B Deck', 'Owner IT', 'Crew LAN', 'Owner IT', 'Windows 10', '2.6GHZ', '4GB', '500MB'),
(4, 'C003', '2017-12-18', 'CPU for C-Deck', 3, 'OLD CPU', '192.454.123', '255.255.255.192', 'Default Gateway', 'EON', 'ASUS ROG', '2022-12-18', 2, 1, '32049203920', 'Intel i5', 3, 3233, 'LINDA', 'AUS Port', '2017-12-20', '2022-12-18 01:15:47', '2022-12-18 01:15:47', 'C Deck', 'Vessel IT', 'OT LAN', 'Vessel IT', 'Windows 7', '2GHZ', '16GB', '1TB'),
(5, 'C004', '2016-12-18', 'CPU for C-Deck', 3, 'SHIP 3 CPU', '123.2.65.2', '255.1.1.0', 'Default Gateway', 'EON', 'ASUS ROG', '2022-12-18', 1, 1, '23423432', 'Intel i5', 3, 3233, 'LINDA', 'AUS Port', '2017-12-20', '2022-12-18 01:16:50', '2022-12-18 01:16:50', 'C Deck', 'Vessel IT', 'OT LAN', 'Vessel IT', 'Windows XP', '3.0GHZ', '8GB', '500MB'),
(6, 'K001', '2022-12-18', 'KABEL for BRIDGE', 2, NULL, NULL, NULL, NULL, 'SAMSUNG', '15CM LEADLESS', '2027-12-18', 1, 2, NULL, NULL, 3, 400, 'ENCIK MEOR', 'AUS Port', '2023-01-25', '2022-12-18 01:26:18', '2022-12-18 01:26:18', 'Bridge', 'Vessel IT', 'Crew LAN', 'Vessel IT', NULL, NULL, NULL, NULL),
(10, 'K003', '2022-12-18', 'KABEL for BRIDGE', 3, NULL, NULL, NULL, NULL, 'SAMSUNG', '15CM LEADLESS', '2027-12-18', 1, 2, NULL, NULL, 3, 400, 'ENCIK MEOR', 'AUS Port', '2022-12-20', '2022-12-18 03:00:32', '2022-12-18 03:00:32', 'Bridge', 'Vessel IT', 'Crew LAN', 'Vessel IT', NULL, NULL, NULL, NULL),
(15, 'C005', '2022-12-18', 'CPU for A-Deck', 1, 'S1 CPU', '192.158.1.38', '255.0.0.0', 'Default Gateway', 'ASUS', 'ASUS 01 CPU', '2027-12-18', 1, 1, '32049203920', 'Intel i7', 2, 4000, 'ENCIK MAZLAN', 'KL Port', '2023-01-02', '2023-01-23 03:04:18', '2023-01-23 03:04:18', 'A Deck', 'Owner IT', 'Crew LAN', 'Owner IT', 'Windows 7', '2.5GHZ', '8GB', '1TB');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_Id` int NOT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_Id`, `Category`, `CreationDate`, `UpdationDate`) VALUES
(1, 'CPU', '2022-10-06 15:05:51', NULL),
(2, 'Network Equipment', '2022-10-06 15:05:51', NULL),
(3, 'Hardware', '2022-12-16 23:51:38', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `expiredcpuinfo`
-- (See below for the actual view)
--
CREATE TABLE `expiredcpuinfo` (
`CPUSpeed` varchar(50)
,`DeviceName` varchar(50)
,`Gateway` varchar(20)
,`HardDisk` varchar(50)
,`IPAdd` varchar(20)
,`OS` varchar(50)
,`Processor` varchar(100)
,`RAM` varchar(50)
,`Subnet` varchar(20)
,`WinKey` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reportinginfo`
-- (See below for the actual view)
--
CREATE TABLE `reportinginfo` (
`Category` varchar(50)
,`Connectivity` varchar(50)
,`CPUSpeed` varchar(50)
,`day` int
,`DelETA` date
,`DeliveryDate` timestamp
,`DeliveryDetail` varchar(100)
,`DelPort` varchar(50)
,`DeviceName` varchar(50)
,`Gateway` varchar(20)
,`HardDisk` varchar(50)
,`id` int
,`IPAdd` varchar(20)
,`Location` varchar(50)
,`Maker` varchar(30)
,`Model` varchar(50)
,`month` int
,`OS` varchar(50)
,`Price` int
,`Processor` varchar(100)
,`RAM` varchar(50)
,`SerialNumber` varchar(20)
,`State` varchar(50)
,`Subnet` varchar(20)
,`SuppProv` varchar(50)
,`SystemProvider` varchar(50)
,`VendorName` varchar(50)
,`VesselDesc` varchar(50)
,`VesselName` varchar(50)
,`WEDate` date
,`WinKey` varchar(30)
,`year` int
);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `State_Id` int NOT NULL,
  `State` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`State_Id`, `State`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Pending Delivery', '2022-12-16 00:26:10', NULL),
(2, 'Delivered', '2022-10-05 16:00:00', '2022-10-10 11:43:46'),
(3, 'Storage', '1976-12-09 15:52:08', '2022-10-06 15:52:30'),
(4, 'IT Supplier ', '1976-12-15 16:00:00', '2022-10-06 15:52:42'),
(5, 'Write off', '2022-10-10 05:31:45', '2022-12-17 01:34:26'),
(6, 'Claim Warranty', '2022-10-10 11:36:55', '2022-12-17 01:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `position`) VALUES
(1, 'admin', 'IT-support.vessel@wilhelmsen.com', '$2y$10$t/5JBrJkC/61jNQdKI2mvOaL46MW9w9BIqxCvGdRW1VdZxbwv8Wq6', 'txrZS7mIbcddizxPFCf0MtMzDuAp4N92hQ7flm5G43Vq0qK9VQ7thtml1oUE', '2022-12-16 17:36:02', '2023-01-12 02:44:21', 'admin'),
(6, 'wilhelmsenS', 'wilhelmsenS63@gmail.com', '$2y$10$qnM2MrUjU0s2AEzhD/Qz8.j5UjXzQ5g67LFFErGj.H4g596dwrwgm', 'pyj5n8RWEOMz6RnOx3Q0jVmzLYpl7vKX9ElwIKGMgTTleyBBjniXpuLJOkow', '2023-01-22 06:21:42', '2023-01-22 06:21:42', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `Vendor_Id` int NOT NULL,
  `VendorName` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`Vendor_Id`, `VendorName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Fourways', '2022-12-16 23:51:07', NULL),
(2, 'AsiaOne', '2022-12-16 23:51:18', NULL),
(3, 'Infinity Gigabyte', '2022-12-17 16:41:32', NULL),
(4, 'Local Port', '2022-12-17 16:41:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vessel`
--

CREATE TABLE `vessel` (
  `Vessel_Id` int NOT NULL,
  `VesselName` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vessel`
--

INSERT INTO `vessel` (`Vessel_Id`, `VesselName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'S001', '2022-12-16 23:50:51', NULL),
(2, 'S002', '2022-12-17 16:34:53', NULL),
(3, 'S003', '2022-12-17 16:34:59', NULL),
(4, 'S004', '2022-12-17 16:35:03', NULL),
(5, 'S005', '2022-12-17 16:35:08', NULL),
(6, 'S006', '2022-12-17 16:35:55', NULL),
(7, 'S007', '2022-12-17 16:36:10', NULL),
(8, 'S008', '2022-12-17 16:36:14', NULL),
(9, 'S009', '2022-12-17 16:36:20', NULL),
(10, 'S010', '2022-12-17 16:36:28', NULL),
(11, 'S011', '2022-12-17 16:36:34', NULL),
(12, 'S012', '2022-12-17 16:36:40', NULL),
(13, 'S013', '2022-12-17 16:36:48', NULL),
(14, 'S014', '2022-12-17 16:36:54', NULL),
(15, 'S015', '2022-12-17 16:37:01', NULL);

-- --------------------------------------------------------

--
-- Structure for view `expiredcpuinfo`
--
DROP TABLE IF EXISTS `expiredcpuinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `expiredcpuinfo`  AS SELECT `assets`.`DeviceName` AS `DeviceName`, `assets`.`Processor` AS `Processor`, `assets`.`OS` AS `OS`, `assets`.`WinKey` AS `WinKey`, `assets`.`IPAdd` AS `IPAdd`, `assets`.`Subnet` AS `Subnet`, `assets`.`Gateway` AS `Gateway`, `assets`.`CPUSpeed` AS `CPUSpeed`, `assets`.`HardDisk` AS `HardDisk`, `assets`.`RAM` AS `RAM` FROM `assets` WHERE ((extract(year from curdate()) - extract(year from `assets`.`PurchaseDate`)) > 5)  ;

-- --------------------------------------------------------

--
-- Structure for view `reportinginfo`
--
DROP TABLE IF EXISTS `reportinginfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reportinginfo`  AS SELECT `assets`.`id` AS `id`, `assets`.`SerialNumber` AS `SerialNumber`, extract(year from `assets`.`PurchaseDate`) AS `year`, extract(month from `assets`.`PurchaseDate`) AS `month`, extract(day from `assets`.`PurchaseDate`) AS `day`, `vendor`.`VendorName` AS `VendorName`, `vessel`.`VesselName` AS `VesselName`, `assets`.`VesselDesc` AS `VesselDesc`, `category`.`Category` AS `Category`, `state`.`State` AS `State`, `assets`.`DeliveryDetail` AS `DeliveryDetail`, `assets`.`DelPort` AS `DelPort`, `assets`.`DelETA` AS `DelETA`, `assets`.`DeliveryDate` AS `DeliveryDate`, `assets`.`Location` AS `Location`, `assets`.`Maker` AS `Maker`, `assets`.`Model` AS `Model`, `assets`.`Price` AS `Price`, `assets`.`WEDate` AS `WEDate`, `assets`.`SystemProvider` AS `SystemProvider`, `assets`.`Connectivity` AS `Connectivity`, `assets`.`SuppProv` AS `SuppProv`, `assets`.`DeviceName` AS `DeviceName`, `assets`.`Processor` AS `Processor`, `assets`.`OS` AS `OS`, `assets`.`WinKey` AS `WinKey`, `assets`.`IPAdd` AS `IPAdd`, `assets`.`Subnet` AS `Subnet`, `assets`.`Gateway` AS `Gateway`, `assets`.`CPUSpeed` AS `CPUSpeed`, `assets`.`HardDisk` AS `HardDisk`, `assets`.`RAM` AS `RAM` FROM ((((`assets` join `category` on((`assets`.`Category` = `category`.`Category_Id`))) join `vessel` on((`assets`.`Vessel` = `vessel`.`Vessel_Id`))) join `state` on((`assets`.`State` = `state`.`State_Id`))) left join `vendor` on((`assets`.`Vendor` = `vendor`.`Vendor_Id`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SerialNumber` (`SerialNumber`),
  ADD KEY `vessel` (`Vessel`),
  ADD KEY `state` (`State`),
  ADD KEY `category` (`Category`),
  ADD KEY `Vendor` (`Vendor`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`State_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`Vendor_Id`);

--
-- Indexes for table `vessel`
--
ALTER TABLE `vessel`
  ADD PRIMARY KEY (`Vessel_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `State_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `Vendor_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vessel`
--
ALTER TABLE `vessel`
  MODIFY `Vessel_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_ibfk_2` FOREIGN KEY (`Vessel`) REFERENCES `vessel` (`Vessel_Id`),
  ADD CONSTRAINT `assets_ibfk_3` FOREIGN KEY (`Vendor`) REFERENCES `vendor` (`Vendor_Id`),
  ADD CONSTRAINT `category` FOREIGN KEY (`Category`) REFERENCES `category` (`Category_Id`),
  ADD CONSTRAINT `state` FOREIGN KEY (`State`) REFERENCES `state` (`State_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
