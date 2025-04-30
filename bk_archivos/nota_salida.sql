-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2025 at 11:06 PM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u184609663_inventario`
--

-- --------------------------------------------------------

--
-- Table structure for table `nota_salida`
--

CREATE TABLE `nota_salida` (
  `id_nota_salida` int(11) NOT NULL,
  `cod_nota_salida` varchar(30) NOT NULL,
  `concepto_salida` varchar(100) NOT NULL,
  `detalle_nota_salida` text NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_nota_salida` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nota_salida`
--
ALTER TABLE `nota_salida`
  ADD PRIMARY KEY (`id_nota_salida`),
  ADD UNIQUE KEY `cod_nota_salida` (`cod_nota_salida`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nota_salida`
--
ALTER TABLE `nota_salida`
  MODIFY `id_nota_salida` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
