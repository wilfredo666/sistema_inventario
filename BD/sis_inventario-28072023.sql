-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2023 a las 05:38:34
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
(4, 'Calzas de Licra'),
(5, 'Jeans Licra'),
(6, 'Media pantalon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `razon_social_cliente`, `nit_ci_cliente`, `direccion_cliente`, `pais_cliente`, `ciudad_cliente`, `nombre_cliente`, `telefono_cliente`, `descuento`) VALUES
(1, 'IMPORTADORA JUANJO SRL', '45458741', 'Zona Pucarani, avenida Arica s/n, a tres cuadras del ingreso a Achocalla, diagonal al Molino y Fábrica de Fideos Aurora.', '', '', '', '78574586', '1.50'),
(6, 'AGENCIA KRONOS', '454587414', '234', 'AR', 'Ninguno', '', '45635465', '33.00'),
(7, 'IMPORTADORA LUCHO SA', '45458741', 'Zona Pucarani, avenida Arica s/n, Nro 1114.', 'BO', 'La Paz', 'LEONARDO AYALA TERRAZAS', '23434145', '20.00');

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
(1, 'Rojo', '#db1414'),
(2, 'Azul Oscuro', '#0000ff'),
(3, 'azulturquesa', '#9299ce');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseno`
--

CREATE TABLE `diseno` (
  `id_diseno` int(11) NOT NULL,
  `desc_diseno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diseno`
--

INSERT INTO `diseno` (`id_diseno`, `desc_diseno`) VALUES
(1, 'Vivos fluorecentess'),
(2, 'Juvenil'),
(3, 'Mangas Cortas');

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

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `codigo_factura`, `id_cliente`, `detalle_factura`, `total`, `descuento`, `neto`, `fecha_emision`, `id_usuario`, `estado_factura`) VALUES
(15, '10001', 1, '[{\"idProducto\":1,\"descProducto\":\"pantalones mujer\",\"cantProducto\":5,\"preUnitario\":120,\"preTotal\":600}]', '600.00', '1.50', '591.00', '2023-06-06 12:18:56', 1, 1),
(16, 'NV-2342', 6, '[{\"idProducto\":3,\"descProducto\":\"medias de varon\",\"cantProducto\":4,\"preUnitario\":60,\"preTotal\":240}]', '240.00', '33.00', '160.80', '2023-06-06 12:22:49', 1, 1),
(17, 'NV-123321', 1, '[{\"idProducto\":3,\"descProducto\":\"medias de varon\",\"cantProducto\":4,\"preUnitario\":60,\"preTotal\":240},{\"idProducto\":4,\"descProducto\":\"Calzas licras\",\"cantProducto\":5,\"preUnitario\":18,\"preTotal\":90}]', '330.00', '1.50', '325.05', '2023-06-06 12:24:56', 1, 1),
(18, 'NV-322', 6, '[{\"idProducto\":4,\"descProducto\":\"Calzas licras\",\"cantProducto\":3,\"preUnitario\":18,\"preTotal\":54}]', '54.00', '33.00', '36.18', '2023-06-06 12:25:45', 1, 1),
(19, 'NV-324', 6, '[{\"idProducto\":5,\"descProducto\":\"Poleras\",\"cantProducto\":3,\"preUnitario\":30,\"preTotal\":90}]', '90.00', '33.00', '60.30', '2023-06-06 12:26:16', 1, 1),
(20, 'NV-324', 1, '[{\"idProducto\":4,\"descProducto\":\"Calzas licras\",\"cantProducto\":3,\"preUnitario\":18,\"preTotal\":54}]', '54.00', '1.50', '53.19', '2023-06-06 12:26:36', 1, 1),
(21, 'NV-45', 6, '[{\"idProducto\":4,\"descProducto\":\"Calzas licras\",\"cantProducto\":3,\"preUnitario\":18,\"preTotal\":54}]', '54.00', '33.00', '36.18', '2023-06-06 12:26:55', 1, 1),
(22, 'NV-453', 6, '[{\"idProducto\":1,\"descProducto\":\"pantalones mujer\",\"cantProducto\":3,\"preUnitario\":120,\"preTotal\":360}]', '360.00', '33.00', '241.20', '2023-06-06 12:28:17', 1, 1),
(23, 'NV-422', 6, '[{\"idProducto\":1,\"descProducto\":\"pantalones mujer\",\"cantProducto\":3,\"preUnitario\":120,\"preTotal\":360}]', '360.00', '33.00', '360.00', '2023-06-06 12:28:34', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `desc_grupo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `desc_grupo`) VALUES
(1, 'Poliester'),
(2, 'Hilos'),
(3, 'Lana hilada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_stock`
--

CREATE TABLE `ingreso_stock` (
  `id_ingreso_stock` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cod_ingreso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingreso_stock`
--

INSERT INTO `ingreso_stock` (`id_ingreso_stock`, `id_producto`, `cantidad`, `cod_ingreso`) VALUES
(1, 1, 10, 'f-73'),
(2, 1, 1, 'NI-3');

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
  `id_usuario` int(11) NOT NULL,
  `estado_nota_ingreso` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nota_ingreso`
--

INSERT INTO `nota_ingreso` (`id_nota_ingreso`, `cod_nota_ingreso`, `concepto_ingreso`, `detalle_ingreso`, `fecha_ingreso`, `id_usuario`, `estado_nota_ingreso`) VALUES
(1, 'in-4125', 'Produccion', '500 pares de medias nylon', '2023-03-22 04:24:09', 1, 1),
(2, 'NI-02', 'compra', '[{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":1}]', '2023-04-12 22:53:12', 1, 1),
(3, 'NI-3', 'compra mercado', '[{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":1}]', '2023-04-12 23:00:11', 1, 1);

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
  `id_usuario` int(11) NOT NULL,
  `estado_nota_salida` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nota_salida`
--

INSERT INTO `nota_salida` (`id_nota_salida`, `cod_nota_salida`, `concepto_salida`, `detalle_nota_salida`, `fecha_salida`, `id_usuario`, `estado_nota_salida`) VALUES
(7, '02', 'regalo', '[{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":60}]', '2023-04-18 10:00:39', 1, 1),
(8, '03', 'desperdicio', '[{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":15},{\"idProducto\":\"3\",\"descProducto\":\"medias de varon\",\"cantProducto\":3}]', '2023-04-18 10:01:15', 1, 1),
(9, '04', 'fraccion', '[{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":2},{\"idProducto\":\"3\",\"descProducto\":\"medias de varon\",\"cantProducto\":3}]', '2023-04-18 10:06:33', 1, 1),
(10, '05', 'fraccion', '[{\"idProducto\":\"3\",\"descProducto\":\"medias de varon\",\"cantProducto\":20}]', '2023-04-18 10:08:20', 1, 1),
(11, 'NS-06', 'regalo', '[{\"idProducto\":\"3\",\"descProducto\":\"medias de varon\",\"cantProducto\":1},{\"idProducto\":\"1\",\"descProducto\":\"pantalones mujer\",\"cantProducto\":1}]', '2023-04-18 10:24:33', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `desc_permiso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
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
-- Estructura de tabla para la tabla `permiso_usuario`
--

CREATE TABLE `permiso_usuario` (
  `id_permiso_usuario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso_usuario`
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
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `nombre_personal` varchar(50) NOT NULL,
  `ap_pat_personal` varchar(50) NOT NULL,
  `ap_mat_personal` varchar(50) NOT NULL,
  `ci_personal` varchar(30) NOT NULL,
  `nacimiento_personal` date NOT NULL,
  `cargo_personal` varchar(80) NOT NULL,
  `direccion_personal` varchar(100) NOT NULL,
  `contactos_personal` varchar(50) NOT NULL,
  `estado_personal` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `nombre_personal`, `ap_pat_personal`, `ap_mat_personal`, `ci_personal`, `nacimiento_personal`, `cargo_personal`, `direccion_personal`, `contactos_personal`, `estado_personal`) VALUES
(1, 'Josafath', 'Perez', 'Cusicanqui', '756487445', '1988-07-18', 'Empacador', 'Zona Franz Tamayo, Calle Fuentes', '78558986', 0),
(2, 'Stanley', 'Chambi', 'Quiñajo', '56548444', '1988-12-25', 'Empaquetador', 'Av Los Montes, entre Av, Santa Fé', '73535654', 1);

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
  `id_grupo` int(11) NOT NULL,
  `id_diseno` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_medida` int(11) NOT NULL,
  `id_talla` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `cod_producto`, `nombre_producto`, `precio_costo`, `precio_venta`, `imagen_producto`, `id_grupo`, `id_diseno`, `id_categoria`, `id_medida`, `id_talla`, `id_color`, `estado`) VALUES
(1, 'cod-01', 'pantalones mujer', '100.00', '120.00', 'pantalones.jpg', 0, 0, 5, 1, 1, 2, 1),
(3, 'cod-02', 'medias de varon', '30.00', '60.00', '', 3, 3, 5, 1, 1, 2, 1),
(4, 'cod_0006', 'Calzas licras', '12.00', '18.00', '', 1, 2, 4, 1, 1, 3, 1),
(5, 'cod_0007', 'Poleras', '22.00', '30.00', 'C4223.jpg', 1, 1, 4, 2, 2, 2, 1),
(6, 'cod_0008', 'Medias Nylon ', '30.00', '70.00', 'vecteezy_half-length-suit-in-black-color_18246164_415.png', 2, 2, 1, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nit_proveedor`, `rs_proveedor`, `direccion_prov`, `telefono_prov`, `email_proveedor`, `url_proveedor`, `estado_proveedor`) VALUES
(1, '554664545', 'EMPRESA DE IMPRESIONES GRAFICAS GOL', 'Ingreso al Parque Industrial S/N, 4to Anillo, Paralelo a la Doble vía, Zona NorEste PI, UV 0PI, Manz', '78548874', 'gol@gmail.com', 'https://gol.com', 1),
(2, '55489465480', 'Empresa Midatons', 'Calle Caracol S/N, Zona Chillimarca, entrando a mano derecha a media cuadra de la Av. Ecológica', '2325345340', 'midaton@gmail.coms', 'https://midaton.coms', 1),
(4, '55489465480', 'Empresa Midatons SRL', 'Calle Caracol S/N, Zona Chillimarca, entrando a mano derecha a media cuadra de la Av. Ecológica', '2325345340', 'midaton@gmail.coms', 'https://midaton.coms', 1),
(5, '55489465480', 'Empresa Midatons SRL', 'Calle Caracol S/N, Zona Chillimarca, entrando a mano derecha a media cuadra de la Av. Ecológica', '2325345340', 'q@gmail.com', 'https://midaton.coms', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_empaque`
--

CREATE TABLE `registro_empaque` (
  `id_entrega` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_talla` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `docenas` varchar(20) NOT NULL,
  `unidades` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_empaque`
--

INSERT INTO `registro_empaque` (`id_entrega`, `id_producto`, `id_talla`, `id_color`, `docenas`, `unidades`) VALUES
(1, 1, 1, 2, '18', '8'),
(2, 5, 3, 1, '15', '4');

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

--
-- Volcado de datos para la tabla `salida_stock`
--

INSERT INTO `salida_stock` (`id_salida_stock`, `id_producto`, `cantidad`, `cod_salida`) VALUES
(1, 1, 4, 'NV-.003'),
(2, 1, 5, 'NV-004'),
(3, 1, 2, 'NS-'),
(4, 3, 3, 'NS-'),
(5, 3, 20, 'NS-05'),
(6, 1, 3, 'NV-005'),
(7, 3, 1, 'NS-06'),
(8, 1, 1, 'NS-06'),
(9, 3, 3, 'NV-3445'),
(10, 1, 2, 'NV-3445'),
(11, 1, 40, 'NV-434'),
(12, 1, 40, 'NV-434'),
(13, 3, 4, 'NV-556'),
(14, 3, 4, 'NV-2245'),
(15, 4, 3, 'NV-2245'),
(16, 4, 4, 'NV-10001'),
(17, 4, 4, 'NV-10001'),
(18, 4, 4, 'NV-10001'),
(19, 5, 4, 'NV-10001'),
(20, 1, 4, 'NV-10001'),
(21, 4, 5, '10001'),
(22, 1, 5, '10001'),
(23, 3, 4, 'NV-2342'),
(24, 3, 4, 'NV-123321'),
(25, 4, 5, 'NV-123321'),
(26, 4, 3, 'NV-322'),
(27, 5, 3, 'NV-324'),
(28, 4, 3, 'NV-324'),
(29, 4, 3, 'NV-45'),
(30, 1, 3, 'NV-453'),
(31, 1, 3, 'NV-422');

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
(2, 'S'),
(3, 'X');

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
(3, 'KL');

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
(1, 'Administrador ADM', 'admin', '$2y$10$y5Oc7mG8p4MPuFPvUdOk/.Gkf6iD/3kNqtYm2Lw0fOxRiBrLItehS', 'Administrador', '2023-07-28 21:41:40', '2023-03-02', 1),
(4, 'Eliseo', 'eliseo', '$2y$10$nftFdT4H9Bqhsd0oqU/PVeBoaintyW/d7eocua2v7PDM2FiX/Y8Me', 'Auxiliar', '0000-00-00 00:00:00', '2023-03-04', 0),
(5, 'Gary Hermen', 'gary123', '$2y$10$2jjMim3BV1mCTbZwemiNdeUsAZpN0f63n0/oKMUJzGWhrlpmOMb/u', 'Administrador', '0000-00-00 00:00:00', '2023-03-04', 0),
(6, 'marina Luna', 'marina', '$2y$10$mtRPQi4rJxoGSm/3Up2sbeCO7JQuDEjQfXt0JdISRx/RT7zEuITIq', 'Administrador', '2023-03-13 12:30:17', '2023-03-08', 1),
(9, 'Wilfredo', 'Wilfredo', '$2y$10$tUuGgA5zlnBQAlfjakPwdO4vQLaDIw.LVK9CU6hW7S5aqdEW49zpW', 'Administrador', '0000-00-00 00:00:00', '2023-07-20', 0);

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
-- Indices de la tabla `diseno`
--
ALTER TABLE `diseno`
  ADD PRIMARY KEY (`id_diseno`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  ADD PRIMARY KEY (`id_ingreso_stock`),
  ADD KEY `id_producto` (`id_producto`);

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
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD PRIMARY KEY (`id_permiso_usuario`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `registro_empaque`
--
ALTER TABLE `registro_empaque`
  ADD PRIMARY KEY (`id_entrega`);

--
-- Indices de la tabla `salida_stock`
--
ALTER TABLE `salida_stock`
  ADD PRIMARY KEY (`id_salida_stock`),
  ADD KEY `id_producto` (`id_producto`);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `diseno`
--
ALTER TABLE `diseno`
  MODIFY `id_diseno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  MODIFY `id_ingreso_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  MODIFY `id_nota_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nota_salida`
--
ALTER TABLE `nota_salida`
  MODIFY `id_nota_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  MODIFY `id_permiso_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro_empaque`
--
ALTER TABLE `registro_empaque`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `salida_stock`
--
ALTER TABLE `salida_stock`
  MODIFY `id_salida_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `id_talla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  ADD CONSTRAINT `ingreso_stock_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `salida_stock`
--
ALTER TABLE `salida_stock`
  ADD CONSTRAINT `salida_stock_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
