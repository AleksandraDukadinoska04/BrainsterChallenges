-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 21, 2024 at 10:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_registrations`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'example@gmail.com', '$2y$10$Xagln7ToNXsV/iNUMNx2OecQ2moH9jO0s4Us518pXVc.QiLO21pj6'),
(2, 'aleksandra@gmail.com', '$2y$10$sLtCVd5rsQSWdQYXYD9fSO0ntOhhr7tqyhNRX2gzOA1kFG804Af5G'),
(3, 'marija@gmail.com', '$2y$10$y7fUQa8/jcczVd8dBIVOl.H9aFLnwtkulxauOandKvK20hlpmWFmi'),
(4, 'stefan@gmail.com', '$2y$10$mwzWOwt9zJVT7U1CES6Wf.lRZFtCVPz87W8CbmRxN055wBfMjsGAG'),
(5, 'petar@gmail.com', '$2y$10$MygEvo7xzHZkfij9rYZMa.AADLSvDqHG1J2ON0QKNXZU3jUIWa7F6');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_types`
--

CREATE TABLE `fuel_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `fuel_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel_types`
--

INSERT INTO `fuel_types` (`id`, `fuel_type`) VALUES
(1, 'Gasoline'),
(2, 'Diesel'),
(3, 'Electric');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_model` int(10) UNSIGNED DEFAULT NULL,
  `vehicle_type` int(10) UNSIGNED DEFAULT NULL,
  `vehicle_chassis_number` varchar(255) DEFAULT NULL,
  `vehicle_production_year` year(4) DEFAULT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `fuel_type` int(10) UNSIGNED DEFAULT NULL,
  `registration_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `vehicle_model`, `vehicle_type`, `vehicle_chassis_number`, `vehicle_production_year`, `registration_number`, `fuel_type`, `registration_to`) VALUES
(2, 1, 3, 'sk928j', '2019', 'SK-3005-AU', 3, '2025-04-18'),
(6, 1, 2, 'dn577z', '2016', 'SK-3355-MK', 3, '2024-05-30'),
(7, 2, 4, 'sk928t', '2013', 'SK-3333-AU', 2, '2024-04-29'),
(17, 5, 2, 'su428j', '2003', 'SK-9476-AU', 1, '2025-04-24'),
(19, 2, 2, 'as862j', '2020', 'TE-9087-MK', 2, '2024-04-10'),
(23, 2, 5, 'ic946f', '2004', 'SK-7777-AU', 2, '2024-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_models`
--

CREATE TABLE `vehicle_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_model` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_models`
--

INSERT INTO `vehicle_models` (`id`, `vehicle_model`) VALUES
(1, 'Focus'),
(2, 'Opel Astra'),
(5, 'Ford Focus'),
(12, 'Opel');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `vehicle_type`) VALUES
(1, 'Sedan'),
(2, 'Coupe'),
(3, 'Hatchback'),
(4, 'Suv'),
(5, 'Minivan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_types`
--
ALTER TABLE `fuel_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_model_fk` (`vehicle_model`),
  ADD KEY `vehicle_type_fk` (`vehicle_type`),
  ADD KEY `fuel_type_fk` (`fuel_type`);

--
-- Indexes for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fuel_types`
--
ALTER TABLE `fuel_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `fuel_type_fk` FOREIGN KEY (`fuel_type`) REFERENCES `fuel_types` (`id`),
  ADD CONSTRAINT `vehicle_model_fk` FOREIGN KEY (`vehicle_model`) REFERENCES `vehicle_models` (`id`),
  ADD CONSTRAINT `vehicle_type_fk` FOREIGN KEY (`vehicle_type`) REFERENCES `vehicle_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
