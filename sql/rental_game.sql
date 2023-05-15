-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 05:38 AM
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
-- Table structure for table `rental_game`
--

CREATE TABLE `rental_game` (
  `game_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `staff_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rental_game`
--

INSERT INTO `rental_game` (`game_id`, `customer_id`, `staff_id`) VALUES
(23, 12345, 11111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rental_game`
--
ALTER TABLE `rental_game`
  ADD PRIMARY KEY (`game_id`,`customer_id`),
  ADD KEY `FK_GAME_EQUIPMENT_ID` (`customer_id`),
  ADD KEY `FK_GAME_ID` (`staff_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rental_game`
--
ALTER TABLE `rental_game`
  ADD CONSTRAINT `FK_GAME_EQUIPMENT_ID` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `FK_GAME_ID` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `rental_game_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
