-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2023 at 10:07 PM
-- Server version: 10.5.19-MariaDB-cll-lve
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
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `desc_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `desc_categoria`) VALUES
(1, 'Media Pantalon'),
(2, 'Media Soporte'),
(3, 'Pantyhose'),
(4, 'CT Hombre'),
(5, 'Calcetines'),
(6, 'Bucaneras');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `razon_social_cliente` varchar(100) NOT NULL,
  `nit_ci_cliente` varchar(50) NOT NULL,
  `direccion_cliente` varchar(200) NOT NULL,
  `pais_cliente` varchar(150) NOT NULL,
  `ciudad_cliente` varchar(150) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `telefono_cliente` varchar(50) NOT NULL,
  `descuento` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `razon_social_cliente`, `nit_ci_cliente`, `direccion_cliente`, `pais_cliente`, `ciudad_cliente`, `nombre_cliente`, `telefono_cliente`, `descuento`) VALUES
(1, 'IMPORTADORA JUANJO SRL', '45458741', 'Zona Pucarani, avenida Arica s/n, a tres cuadras del ingreso a Achocalla, diagonal al Molino y Fábrica de Fideos Aurora.', '', '', '', '78574586', '1.50'),
(5, 'IMPORTADORA LUCHO SA', '4522544', 'Zona Pucarani, avenida Arica s/n, Nro 1114.', 'BO', 'Cochabamba', 'Lucho Garcia Espinoza', '2125412', '10.00'),
(6, 'AGENCIA KRONOS', '45458741', '234', 'AR', 'Ninguno', '', '45635465', '33.00');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `desc_color` varchar(50) NOT NULL,
  `img_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id_color`, `desc_color`, `img_color`) VALUES
(1, 'Rojo', '#db1414'),
(2, 'Azul Oscuro', '#0000ff'),
(3, 'azulturquesa', '#9299ce');

-- --------------------------------------------------------

--
-- Table structure for table `diseno`
--

CREATE TABLE `diseno` (
  `id_diseno` int(11) NOT NULL,
  `desc_diseno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diseno`
--

INSERT INTO `diseno` (`id_diseno`, `desc_diseno`) VALUES
(1, 'Con Puntera'),
(2, 'Nuda'),
(3, 'CV, S/M');

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `codigo_factura` varchar(30) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `detalle_factura` text NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `neto` decimal(10,2) NOT NULL,
  `fecha_emision` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_factura` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`id_factura`, `codigo_factura`, `id_cliente`, `detalle_factura`, `total`, `descuento`, `neto`, `fecha_emision`, `id_usuario`, `estado_factura`) VALUES
(1, '3234', 1, '[{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":2,\"preUnitario\":120,\"preTotal\":240},{\"idProducto\":\"2\",\"descProducto\":\"medias de varon\",\"cantProducto\":3,\"preUnitario\":90,\"preTotal\":270}]', '510.00', '0.00', '510.00', '2022-03-16 22:41:10', 1, 1),
(2, '003', 1, '[{\"idProducto\":1,\"descProducto\":\"pantalones mujer\",\"cantProducto\":4,\"preUnitario\":120,\"preTotal\":480}]', '480.00', '1.50', '480.00', '2023-04-12 15:34:40', 1, 1),
(3, '004', 1, '[{\"idProducto\":1,\"descProducto\":\"pantalones mujer\",\"cantProducto\":5,\"preUnitario\":120,\"preTotal\":600}]', '600.00', '1.50', '598.50', '2023-04-12 15:44:30', 1, 1),
(4, 'NV-005', 1, '[{\"idProducto\":1,\"descProducto\":\"pantalones mujer\",\"cantProducto\":3,\"preUnitario\":120,\"preTotal\":360}]', '360.00', '1.50', '354.60', '2023-04-18 10:21:54', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `desc_grupo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `desc_grupo`) VALUES
(1, 'Lujo'),
(2, 'Stretch'),
(3, 'Lycra'),
(4, 'Camiseta Térmica PA'),
(5, 'Calceteria'),
(6, 'Men´s Underwear'),
(7, 'Poleras');

-- --------------------------------------------------------

--
-- Table structure for table `ingreso_stock`
--

CREATE TABLE `ingreso_stock` (
  `id_ingreso_stock` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cod_ingreso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingreso_stock`
--

INSERT INTO `ingreso_stock` (`id_ingreso_stock`, `id_producto`, `cantidad`, `cod_ingreso`) VALUES
(1, 1, 10, 'f-73'),
(2, 1, 1, 'NI-3');

-- --------------------------------------------------------

--
-- Table structure for table `nota_ingreso`
--

CREATE TABLE `nota_ingreso` (
  `id_nota_ingreso` int(11) NOT NULL,
  `cod_nota_ingreso` varchar(30) NOT NULL,
  `concepto_ingreso` varchar(100) NOT NULL,
  `detalle_ingreso` text NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_nota_ingreso` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota_ingreso`
--

INSERT INTO `nota_ingreso` (`id_nota_ingreso`, `cod_nota_ingreso`, `concepto_ingreso`, `detalle_ingreso`, `fecha_ingreso`, `id_usuario`, `estado_nota_ingreso`) VALUES
(1, 'in-4125', 'Produccion', '500 pares de medias nylon', '2023-03-22 04:24:09', 1, 1),
(2, 'NI-02', 'compra', '[{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":1}]', '2023-04-12 22:53:12', 1, 1),
(3, 'NI-3', 'compra mercado', '[{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":1}]', '2023-04-12 23:00:11', 1, 1);

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
-- Dumping data for table `nota_salida`
--

INSERT INTO `nota_salida` (`id_nota_salida`, `cod_nota_salida`, `concepto_salida`, `detalle_nota_salida`, `fecha_salida`, `id_usuario`, `estado_nota_salida`) VALUES
(7, '02', 'regalo', '[{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":60}]', '2023-04-18 10:00:39', 1, 1),
(8, '03', 'desperdicio', '[{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":15},{\"idProducto\":\"3\",\"descProducto\":\"medias de varon\",\"cantProducto\":3}]', '2023-04-18 10:01:15', 1, 1),
(9, '04', 'fraccion', '[{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":2},{\"idProducto\":\"3\",\"descProducto\":\"medias de varon\",\"cantProducto\":3}]', '2023-04-18 10:06:33', 1, 1),
(10, '05', 'fraccion', '[{\"idProducto\":\"3\",\"descProducto\":\"medias de varon\",\"cantProducto\":20}]', '2023-04-18 10:08:20', 1, 1),
(11, 'NS-06', 'regalo', '[{\"idProducto\":\"3\",\"descProducto\":\"medias de varon\",\"cantProducto\":1},{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":1}]', '2023-04-18 10:24:33', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `desc_permiso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `desc_permiso`) VALUES
(1, 'Usuario'),
(2, 'Cliente'),
(3, 'Producto'),
(4, 'Nota de venta'),
(5, 'Nota de salida'),
(6, 'Nota de ingreso'),
(7, 'Otro ingreso');

-- --------------------------------------------------------

--
-- Table structure for table `permiso_usuario`
--

CREATE TABLE `permiso_usuario` (
  `id_permiso_usuario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permiso_usuario`
--

INSERT INTO `permiso_usuario` (`id_permiso_usuario`, `id_usuario`, `id_permiso`) VALUES
(1, 1, 1),
(4, 1, 3),
(8, 1, 4),
(9, 1, 5),
(10, 1, 2),
(11, 4, 1),
(12, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `cod_producto` varchar(50) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `precio_costo` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `imagen_producto` varchar(100) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_diseno` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_medida` int(11) NOT NULL,
  `id_talla` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id_producto`, `cod_producto`, `nombre_producto`, `precio_costo`, `precio_venta`, `imagen_producto`, `id_grupo`, `id_diseno`, `id_categoria`, `id_medida`, `id_talla`, `id_color`, `estado`) VALUES
(1, 'cod-01', 'pantalones mujer', '100.00', '120.00', 'pantalones.jpg', 0, 0, 5, 1, 1, 2, 1),
(3, 'cod-02', 'medias de varon', '30.00', '60.00', '', 3, 3, 5, 1, 1, 2, 1),
(4, 'cod_0006', 'Calzas licras', '12.00', '18.00', '', 1, 2, 4, 1, 1, 3, 1),
(5, 'cod_0007', 'Poleras', '22.00', '30.00', 'C4223.jpg', 1, 1, 4, 2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nit_proveedor` varchar(50) NOT NULL,
  `rs_proveedor` varchar(100) NOT NULL,
  `direccion_prov` varchar(100) NOT NULL,
  `telefono_prov` varchar(50) NOT NULL,
  `email_proveedor` varchar(30) NOT NULL,
  `url_proveedor` varchar(50) NOT NULL,
  `estado_proveedor` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nit_proveedor`, `rs_proveedor`, `direccion_prov`, `telefono_prov`, `email_proveedor`, `url_proveedor`, `estado_proveedor`) VALUES
(1, '554664545', 'EMPRESA DE IMPRESIONES GRAFICAS GOL', 'Ingreso al Parque Industrial S/N, 4to Anillo, Paralelo a la Doble vía, Zona NorEste PI, UV 0PI, Manz', '78548874', 'gol@gmail.com', 'https://gol.com', 1),
(2, '55489465480', 'Empresa Midatons', 'Calle Caracol S/N, Zona Chillimarca, entrando a mano derecha a media cuadra de la Av. Ecológica', '2325345340', 'midaton@gmail.coms', 'https://midaton.coms', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salida_stock`
--

CREATE TABLE `salida_stock` (
  `id_salida_stock` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cod_salida` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salida_stock`
--

INSERT INTO `salida_stock` (`id_salida_stock`, `id_producto`, `cantidad`, `cod_salida`) VALUES
(1, 1, 4, 'NV-.003'),
(2, 1, 5, 'NV-004'),
(3, 1, 2, 'NS-'),
(4, 3, 3, 'NS-'),
(5, 3, 20, 'NS-05'),
(6, 1, 3, 'NV-005'),
(7, 3, 1, 'NS-06'),
(8, 1, 1, 'NS-06');

-- --------------------------------------------------------

--
-- Table structure for table `talla`
--

CREATE TABLE `talla` (
  `id_talla` int(11) NOT NULL,
  `desc_talla` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `talla`
--

INSERT INTO `talla` (`id_talla`, `desc_talla`) VALUES
(1, 'L'),
(2, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id_medida` int(11) NOT NULL,
  `desc_medida` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unidad_medida`
--

INSERT INTO `unidad_medida` (`id_medida`, `desc_medida`) VALUES
(1, 'Unidad'),
(2, 'Docena'),
(3, 'KL');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `login_usuario` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `perfil` varchar(30) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `login_usuario`, `password`, `perfil`, `ultimo_login`, `fecha_registro`, `estado`) VALUES
(1, 'Administrador ADM', 'admin', '$2y$10$y5Oc7mG8p4MPuFPvUdOk/.Gkf6iD/3kNqtYm2Lw0fOxRiBrLItehS', 'Administrador', '2023-07-18 22:07:33', '2023-03-02', 1),
(4, 'Eliseo', 'eliseo', '$2y$10$nftFdT4H9Bqhsd0oqU/PVeBoaintyW/d7eocua2v7PDM2FiX/Y8Me', 'Auxiliar', '0000-00-00 00:00:00', '2023-03-04', 1),
(5, 'Gary Hermen', 'gary123', '$2y$10$2jjMim3BV1mCTbZwemiNdeUsAZpN0f63n0/oKMUJzGWhrlpmOMb/u', 'Administrador', '0000-00-00 00:00:00', '2023-03-04', 0),
(6, 'marina Luna', 'marina', '$2y$10$mtRPQi4rJxoGSm/3Up2sbeCO7JQuDEjQfXt0JdISRx/RT7zEuITIq', 'Administrador', '2023-03-13 12:30:17', '2023-03-08', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `diseno`
--
ALTER TABLE `diseno`
  ADD PRIMARY KEY (`id_diseno`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indexes for table `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  ADD PRIMARY KEY (`id_ingreso_stock`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  ADD PRIMARY KEY (`id_nota_ingreso`);

--
-- Indexes for table `nota_salida`
--
ALTER TABLE `nota_salida`
  ADD PRIMARY KEY (`id_nota_salida`);

--
-- Indexes for table `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indexes for table `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD PRIMARY KEY (`id_permiso_usuario`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indexes for table `salida_stock`
--
ALTER TABLE `salida_stock`
  ADD PRIMARY KEY (`id_salida_stock`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`id_talla`);

--
-- Indexes for table `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id_medida`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diseno`
--
ALTER TABLE `diseno`
  MODIFY `id_diseno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  MODIFY `id_ingreso_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  MODIFY `id_nota_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nota_salida`
--
ALTER TABLE `nota_salida`
  MODIFY `id_nota_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  MODIFY `id_permiso_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salida_stock`
--
ALTER TABLE `salida_stock`
  MODIFY `id_salida_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `talla`
--
ALTER TABLE `talla`
  MODIFY `id_talla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Constraints for table `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  ADD CONSTRAINT `ingreso_stock_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Constraints for table `salida_stock`
--
ALTER TABLE `salida_stock`
  ADD CONSTRAINT `salida_stock_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
