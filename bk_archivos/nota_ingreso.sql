-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2025 at 05:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_inventario`
--

-- --------------------------------------------------------

--
-- Table structure for table `nota_ingreso`
--

CREATE TABLE `nota_ingreso` (
  `id_nota_ingreso` int(11) NOT NULL,
  `cod_nota_ingreso` varchar(30) NOT NULL,
  `concepto_ingreso` varchar(100) NOT NULL,
  `detalle_ingreso` text NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_nota_ingreso` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  ADD PRIMARY KEY (`id_nota_ingreso`),
  ADD UNIQUE KEY `cod_nota_ingreso` (`cod_nota_ingreso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  MODIFY `id_nota_ingreso` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
