-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2025 at 05:39 PM
-- Server version: 8.0.43
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_producto`
--

CREATE TABLE `tm_producto` (
  `prod_id` int NOT NULL,
  `prod_nom` varchar(150) NOT NULL,
  `prod_desc` varchar(500) NOT NULL,
  `fech_crea` datetime NOT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tm_producto`
--

INSERT INTO `tm_producto` (`prod_id`, `prod_nom`, `prod_desc`, `fech_crea`, `fech_modi`, `fech_elim`, `estado`) VALUES
(1, 'Auriculares', 'Ninguna', '2025-08-08 14:56:26', NULL, NULL, 1),
(2, 'Mouse', 'Ninguna', '2025-08-08 14:57:09', NULL, NULL, 1),
(3, 'Teclado', 'Ninguna', '2025-08-08 14:57:49', NULL, '2025-08-13 09:11:07', 0),
(4, 'Lapices', 'Ninguna', '2025-08-13 14:56:30', NULL, '2025-08-13 16:52:59', 0),
(5, 'Enzo Monzón', 'Ninguna', '2025-08-13 15:08:54', NULL, '2025-08-13 15:11:41', 0),
(6, 'Alanna Monzón', 'Ninguna', '2025-08-13 15:11:27', NULL, '2025-08-13 15:11:36', 0),
(7, 'Maria patricia ', 'Ninguna', '2025-08-13 16:52:48', NULL, '2025-08-14 12:23:53', 0),
(8, 'Jorge Daniel', 'Ninguna', '2025-08-13 21:01:06', NULL, '2025-08-13 21:01:13', 0),
(9, 'celular ', 'Ninguna', '2025-08-13 21:02:08', NULL, NULL, 1),
(10, 'Alma', 'Ninguna', '2025-08-13 21:02:41', '2025-08-13 21:43:34', '2025-08-13 21:44:00', 0),
(11, '123', 'Ninguna', '2025-08-13 21:43:44', '2025-08-13 21:43:51', '2025-08-13 21:43:56', 0),
(12, 'Benja ', '123g', '2025-08-14 12:00:41', NULL, '2025-08-14 12:09:45', 0),
(13, 'free beer', '1233hello', '2025-08-14 12:02:49', NULL, '2025-08-14 12:23:40', 0),
(14, 'Maria Patrica', 'hello how are you1', '2025-08-14 12:04:29', NULL, '2025-08-14 12:23:48', 0),
(15, 'ROSSsss', 'Ok', '2025-08-14 12:28:43', '2025-08-14 12:31:26', '2025-08-14 12:31:31', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_producto`
--
ALTER TABLE `tm_producto`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_producto`
--
ALTER TABLE `tm_producto`
  MODIFY `prod_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
