-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2023 a las 14:55:59
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `desc_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `desc_categoria`) VALUES
(1, 'Calzetines'),
(2, 'Mallas'),
(3, 'Medias nylon'),
(4, 'Calzas de Licra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `razon_social_cliente` varchar(100) NOT NULL,
  `nit_ci_cliente` varchar(50) NOT NULL,
  `direccion_cliente` varchar(200) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `telefono_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `razon_social_cliente`, `nit_ci_cliente`, `direccion_cliente`, `nombre_cliente`, `telefono_cliente`) VALUES
(1, 'IMPORTADORA JUANJO SRL', '45458741', 'Zona Pucarani, avenida Arica s/n, a tres cuadras del ingreso a Achocalla, diagonal al Molino y Fábrica de Fideos Aurora.', 'Juan Pepe Mortaless', '78574586'),
(2, 'Importadora SanJo S.A.', '74558544', 'Av. Julio Cesar Valdez y Autop. Héroes de la Guerra del Chaco', 'LEONARDO AYALA TERRAZAS', '7856456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `desc_color` varchar(50) NOT NULL,
  `img_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id_color`, `desc_color`, `img_color`) VALUES
(1, 'Rojo', ''),
(2, 'Azul Oscuros', '#093895'),
(4, 'Naranja', '#ff9900');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_stock`
--

CREATE TABLE `ingreso_stock` (
  `id_ingreso_stock` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cod_salida` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_ingreso`
--

CREATE TABLE `nota_ingreso` (
  `id_nota_ingreso` int(11) NOT NULL,
  `cod_nota_ingreso` varchar(30) NOT NULL,
  `concepto_ingreso` varchar(100) NOT NULL,
  `detalle_ingreso` text NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `estado_nota_ingreso` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_salida`
--

CREATE TABLE `nota_salida` (
  `id_nota_salida` int(11) NOT NULL,
  `cod_nota_salida` varchar(30) NOT NULL,
  `concepto_salida` varchar(100) NOT NULL,
  `detalle_nota_salida` text NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `estado_nota_salida` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `cod_producto` varchar(50) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `precio_costo` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `imagen_producto` varchar(100) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_medida` int(11) NOT NULL,
  `id_talla` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `cod_producto`, `nombre_producto`, `precio_costo`, `precio_venta`, `imagen_producto`, `id_categoria`, `id_medida`, `id_talla`, `id_color`, `estado`) VALUES
(1, 'pr-0001', 'Calcetines cortos', '3.00', '4.00', '', 1, 1, 1, 3, 1),
(2, 'pr-0002', 'Poleras Licras', '33.00', '38.00', 'poleras.jpg', 2, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_stock`
--

CREATE TABLE `salida_stock` (
  `id_salida_stock` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cod_salida` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `id_talla` int(11) NOT NULL,
  `desc_talla` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`id_talla`, `desc_talla`) VALUES
(1, 'L'),
(2, 'XS'),
(3, 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id_medida` int(11) NOT NULL,
  `desc_medida` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`id_medida`, `desc_medida`) VALUES
(1, 'Unidad'),
(2, 'Docena'),
(6, 'Centenas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `login_usuario`, `password`, `perfil`, `ultimo_login`, `fecha_registro`, `estado`) VALUES
(1, 'Administrador ADM', 'admin', '$2y$10$y5Oc7mG8p4MPuFPvUdOk/.Gkf6iD/3kNqtYm2Lw0fOxRiBrLItehS', 'Administrador', '2023-03-07 17:36:53', '2023-03-02', 1),
(2, 'Wilfredo', 'wil', 'wil', 'administrador', '2023-03-02 19:09:09', '2023-03-02', 1),
(3, 'Gary', 'Hermen', '$2y$10$peDQgRYsK1pw6ACZmLq5BeRAv37PknAPgte5P18YacNCVOsFrgXCm', 'Administrador', '0000-00-00 00:00:00', '2023-03-04', 0),
(4, 'Eliseo', 'eliseo', '$2y$10$nftFdT4H9Bqhsd0oqU/PVeBoaintyW/d7eocua2v7PDM2FiX/Y8Me', 'Auxiliar', '0000-00-00 00:00:00', '2023-03-04', 0),
(5, 'Gary Hermen', 'gary123', '$2y$10$2jjMim3BV1mCTbZwemiNdeUsAZpN0f63n0/oKMUJzGWhrlpmOMb/u', 'Administrador', '0000-00-00 00:00:00', '2023-03-04', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  ADD PRIMARY KEY (`id_ingreso_stock`);

--
-- Indices de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  ADD PRIMARY KEY (`id_nota_ingreso`);

--
-- Indices de la tabla `nota_salida`
--
ALTER TABLE `nota_salida`
  ADD PRIMARY KEY (`id_nota_salida`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `salida_stock`
--
ALTER TABLE `salida_stock`
  ADD PRIMARY KEY (`id_salida_stock`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`id_talla`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id_medida`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  MODIFY `id_ingreso_stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  MODIFY `id_nota_ingreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_salida`
--
ALTER TABLE `nota_salida`
  MODIFY `id_nota_salida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salida_stock`
--
ALTER TABLE `salida_stock`
  MODIFY `id_salida_stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `id_talla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
