-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 03:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs157a_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `rental_equipment`
--

CREATE TABLE `rental_equipment` (
  `equipment_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `staff_id` int(5) NOT NULL,
  `rental_time_start` datetime NOT NULL,
  `rental_time_end` datetime NOT NULL,
  `rental_cost` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rental_equipment`
--

INSERT INTO `rental_equipment` (`equipment_id`, `customer_id`, `staff_id`, `rental_time_start`, `rental_time_end`, `rental_cost`) VALUES
(5123, 14, 11111, '2023-05-14 18:04:47', '2023-05-14 21:04:47', '36.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rental_equipment`
--
ALTER TABLE `rental_equipment`
  ADD PRIMARY KEY (`equipment_id`,`customer_id`),
  ADD KEY `FK_CUSTOMER_ID` (`customer_id`),
  ADD KEY `FK_STAFF_ID` (`staff_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rental_equipment`
--
ALTER TABLE `rental_equipment`
  ADD CONSTRAINT `FK_CUSTOMER_ID` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `FK_EQUIPMENT_ID` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`equipment_id`),
  ADD CONSTRAINT `FK_STAFF_ID` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
