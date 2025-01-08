-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2025 a las 21:16:38
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

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
  `desc_categoria` varchar(50) NOT NULL,
  `cod_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `desc_categoria`, `cod_categoria`) VALUES
(1, 'MEDIA PANTALON', 33),
(2, 'MEDIA SOPORTE', 34),
(3, 'PANTY HOSE', 35),
(4, 'COBERTOR', 31),
(5, 'SOCKET', 32),
(6, 'CALZA', 36),
(7, 'PANTY HOSE CON BRILLO', 37),
(8, 'MEDIA BUCANERA', 60),
(9, 'MEDIA P/ALTA', 61),
(10, 'MEDIA P/MEDIA', 62),
(11, 'MEDIA P/ BAJA', 63),
(12, 'MEDIA 3/4', 64),
(13, 'MEDIA TOBILLERA', 65),
(14, 'MEDIA CERO', 66),
(15, 'PANTYMEDIA', 67),
(16, 'CT MUJER', 41),
(17, 'CT HOMBRE', 42),
(18, 'CT NIÑO', 43),
(19, 'CT NIÑA', 44),
(20, 'TOP', 45),
(21, 'BASICOS', 70),
(22, 'BOXERS', 71),
(23, 'BOXERS KIDS', 72),
(24, 'BRIEF', 73),
(25, 'POLERA SLIM FIT', 74),
(26, 'Sudadera', 0),
(27, 'Sudadera', 0),
(28, 'Neoplas', 0),
(29, 'Sudadera EXP', NULL),
(30, 'Depresiiasion', NULL);

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
(11, 'JULIA CASTRILLO', '2348569018', 'MAX PAREDES P. ORTEGA - LA PAZ', 'BO', '', 'JULIA CASTRILLO', '27564702', '20.00'),
(12, 'JULIO WILFREDO ROCHA TICONA', '2455087', 'EL ALTO', 'BO', 'La Paz', 'JULIO WILFREDO ROCHA TICONA', '71919406', '20.00'),
(13, 'AGENCIA 6 DE AGOSTO / BIANCHI STORES', '280378026', 'AV. 6 DE AGOSTO / ROSENDO GUTIERREZ', 'BO', 'La Paz', 'AGENCIA 6 DE AGOSTO BIANCHI STORES', '2147878', '30.00'),
(14, 'DANIELA ORTIZ', '1', 'DEPARTAMENTO DE SUCRE', 'BO', 'Chuquisaca', 'DANIELA ORTIZ', '73477876', '15.00'),
(15, 'GONZALO CONTRERAS', '73570790', 'MAX PEREDES / P. ORTEGA', 'BO', 'La Paz', 'GONZALO CONTRERAS', '73570790', '20.00'),
(16, 'AGENCIA YANACOCHA BIANCHI STORES', '280378026', 'C. YANACOCHA ESQ. COMERCIO', 'BO', 'La Paz', 'AGENCIA YANACOCHA BIANCHI STORES', '73011650', '30.00'),
(17, 'WALDO R. MAMANI APAZA', '4965996', 'F. VILLA DOLORES', 'BO', 'La Paz', 'WALDO R. MAMANI APAZA', '73222467', '20.00'),
(18, 'CLIENTES VARIOS', '1', 'LA PAZ', 'BO', 'La Paz', 'CLIENTES VARIOS', '2833403', '0.00'),
(19, 'ELENA BALBINA ROJAS', '2465087', 'AV. BOLIVIA CALLE 10', 'BO', 'La Paz', 'ELENA BALBINA ROJAS', '78955922', '15.00'),
(20, 'BERTA MAMANI VARGAS', '2', 'VILLA DOLORES ', 'BO', 'La Paz', 'BERTA MAMANI VARGAS', '77743785', '15.00'),
(21, 'FLORENCIA LIMACHI VDA. DE HUIZA', '394165', 'C. R. VARGAS #2928  Z. 16 DE JULIO / EL ALTO ', 'BO', 'La Paz', 'FLORENCIA LIMACHI VDA. DE HUIZA', '71918620', '15.00'),
(22, 'ANTONIO TICONA', '67929920', 'POTOSI', 'BO', 'Potosi', 'ANTONIO TICONA', '67929920', '15.00'),
(23, 'IRINEO TONCONI', '74099805', 'MAX PAREDES / BUENOS AIRES', 'BO', 'La Paz', 'IRINEO TONCONI', '74099805', '20.00'),
(24, 'MARIA ISABEL LIMACHI ', '65575106', 'LA PAZ', 'BO', 'La Paz', 'MARIA ISABEL LIMACHI ', '65575106', '15.00'),
(25, 'CESAR HUARICONA ROJAS', '6016865', 'VILLA ALEMANIA', 'BO', 'La Paz', 'CESAR HUARICONA ROJAS', '69770222', '15.00'),
(26, 'EMILIANO CHAMBILLA CHAMBILLA', '6950661', 'ALTO LIMA / AV 8', 'BO', 'La Paz', 'EMILIANO CHAMBILLA CHAMBILLA', '77207787', '15.00'),
(27, 'AG. BUENOS AIRES BIANCHI STORES ', '73232948', 'AV. TUMUSLA / BUENOS AIRES ', 'BO', 'La Paz', 'AG. BUENOS AIRES BIANCHI STORES ', '73232948', '30.00'),
(28, 'SERGIO MENESES', '5194560', 'Departamento / Cochabamba', 'BO', 'Cochabamba', 'SERGIO MENESES', '71705070', '20.00'),
(29, 'RAFAEL AJHUACHO ', '76147654', 'COCHABAMBA', 'BO', 'Cochabamba', 'RAFAEL AJHUACHO ', '76147654', '17.00'),
(30, 'BASILIO ATAHUICHI', '67207753', 'ORURO', 'BO', 'Oruro', 'BASILIO ATHAHUICHI', '67207753', '15.00'),
(31, 'CLIENTES INTERNOS', '77727702', 'EL ALTO', 'BO', 'La Paz', 'CLIENTES INTERNOS', 'CLIENTES INTERNOS', '10.00'),
(32, 'ROCIO VELIZ', '76290605', 'AV. BOLIVIA  EL ALTO', 'BO', 'La Paz', 'ROCIO VELIZ', '76290605', '15.00'),
(33, 'JHENY JHOVANA RODRIGUEZ FLORES', '6681483', 'C/ TIMOTEO RAÑA DEL CHACO / TARIJA', 'BO', 'Tarija', 'JHENY JHOVANA RODRIGUEZ FLORES', '68685806', '15.00'),
(34, 'SERVICIO NACIONAL TEXTIL - SENATEX', '196654024', 'AV. JOSE MARIA PEREZ DE URDININEA 590 / VILLA FATIMA', 'BO', 'La Paz', 'SERVICIO NACIONAL TEXTIL - SENATEX', '2-219595', '0.00'),
(35, 'RUPERTO TANTANI', '60632002', 'LA PAZ', 'BO', 'La Paz', 'RUPERTO TANTANI', '60632002', '15.00'),
(36, 'ASCENCIA QUISPE', '63679549', 'ORURO', 'BO', 'Oruro', 'ASCENCIA QUISPE', '63679549', '15.00'),
(37, 'MARCELINA LIMACHI', '77379089', 'SANTA CRUZ', 'BO', 'Santa Cruz', 'MARCELINA LIMACHI', '77379089', '15.00'),
(38, 'RAUL IBARRA', '71705188', 'ORURO', 'BO', 'Oruro', 'RAUL IBARRA', '71705188', '15.00'),
(39, 'GILBERTO APARICIO ', '71709690', 'COCHABAMBA', 'BO', 'Cochabamba', 'GILBERTO APARICIO ', '71709690', '15.00'),
(40, 'VIVIANA ORTIZ', '73466393', 'SUCRE', 'BO', 'Ninguno', 'VIVIANA ORTIZ', '73466393', '15.00'),
(41, 'SERVICIOS COPABOL', '212534020', 'LA PAZ', 'BO', 'La Paz', 'SERVICIOS COPABOL', '78977739', '0.00'),
(42, 'AIDA VALERIANO', '73233442', 'CALLE 2 / AV. TIHUANACU', 'BO', 'La Paz', 'AIDA VALERIANO', '73233442', '15.00'),
(43, 'ZENON VILLCA', 'ZENON VILLCA', 'VILLAZON', 'BO', 'Potosi', 'ZENON VILLCA', 'ZENON VILLCA', '15.00'),
(44, 'FRANCISCA FLORES ', '2382121', 'AV. BUENOS AIRES', 'BO', 'La Paz', 'FRANCISCA FLORES', '2382121', '17.00'),
(45, 'VERONICA CALLLISAYA', '77237858', 'AV. CIVICA EL ALTO', 'BO', 'La Paz', 'VERONICA CALLLISAYA', '77237858', '15.00'),
(46, 'GONZALO GIRONDA', '79256801', 'TARIJA', 'BO', 'Tarija', 'GONZALO GIRONDA', 'GIRONDA', '15.00'),
(47, 'RUFINO HUANCA', '493023', 'ZONA RIO SECO VIVIENDAS', 'BO', 'La Paz', 'RUFINO HUANCA', '73001326', '15.00'),
(48, 'RAMIRO ROMERO ', '72251144', 'COCHABAMBA', 'BO', 'Cochabamba', 'RAMIRO ROMERO ', '72251144', '15.00'),
(49, 'CELIA VILLCA ', '71835476', 'POTOSI', 'BO', 'Potosi', 'CELIA VILLCA ', '71835476', '17.00'),
(50, 'SOFIA LORENA CONTRERAS CASTRILLO', '78853090', 'MAX PAREDES / BUENOS AIRES', 'BO', 'La Paz', 'SOFIA LORENA CONTRERAS CASTRILLO', 'SOFIA LORENA CONTRERAS CASTRILLO', '20.00'),
(51, 'BIANCHI STORES VENTAS ONLINE', '280378026', 'OFICINA BRS', 'BO', 'La Paz', 'BIANCHI STORES VENTAS ONLINE', '75844090', '30.00'),
(52, 'MERY MAMANI', '1241445', 'La Paz', 'BO', 'La Paz', 'MERY MAMANI', '74545455', '15.00'),
(53, 'MIRIAM HUASCO', '1', 'CEJA EL ALTO', 'BO', 'La Paz', 'MIRIAM HUASCO', '74663145', '15.00'),
(54, 'CONSUELO RIVEROS', '77727710', 'AV. BUENOS AIRES', 'BO', 'La Paz', 'CONSUELO RIVEROS', '77727710', '15.00'),
(55, 'REBECA MAMANI COPA ', '76545970', 'CAMINO A VIACHA / HOSPITAL COREA', 'BO', 'La Paz', 'REBECA MAMANI COPA ', '76545970', '15.00'),
(56, 'JUAN AJHUACHO ', '76139008', 'ORURO', 'BO', 'Oruro', 'JUAN AJHUACHO ', '76139008', '17.00'),
(57, 'JUAN AJHUACHO', '12345', 'CIUDAD DE ORURO', 'BO', 'La Paz', 'JUAN AJHUACHO', '2863462', '17.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `desc_color` varchar(50) NOT NULL,
  `img_color` varchar(50) NOT NULL,
  `cod_color` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id_color`, `desc_color`, `img_color`, `cod_color`) VALUES
(1, 'COGÑAC', '#ffffff', 1),
(2, 'TABACO', '#ffffff', 2),
(3, 'ALMENDRA', '#ffffff', 3),
(4, 'CALIPSO', '#ffffff', 4),
(5, 'ACACIA', '#ffffff', 5),
(6, 'TORCAZ', '#ffffff', 6),
(7, 'CENIZA', '#ffffff', 7),
(8, 'CARBON', '#ffffff', 8),
(9, 'HUMO', '#ffffff', 9),
(10, 'GRAFITO', '#ffffff', 10),
(11, 'HUESO', '#ffffff', 11),
(12, 'BLANCO', '#ffffff', 12),
(13, 'NEGRO', '#ffffff', 13),
(14, 'GUINDO', '#ffffff', 14),
(15, 'CAFÉ', '#ffffff', 15),
(16, 'AZUL MARINO', '#ffffff', 16),
(17, 'ROSADO', '#ffffff', 17),
(18, 'UVA', '#ffffff', 18),
(19, 'TURQUESA', '#ffffff', 19),
(20, 'ORQUIDEA', '#ffffff', 20),
(21, 'ROJO', '#ffffff', 21),
(22, 'FUCSIA', '#ffffff', 22),
(23, 'VERDE BANDERA', '#ffffff', 23),
(24, 'AMARILLO', '#ffffff', 24),
(25, 'CELESTE', '#ffffff', 25),
(26, 'AZUL', '#ffffff', 26),
(27, 'PLOMO', '#ffffff', 27),
(28, 'CHOCOLATE', '#ffffff', 28),
(29, 'TITANIUM', '#ffffff', 29),
(30, 'NAVY', '#ffffff', 30),
(31, 'MILITAR', '#ffffff', 31),
(32, 'INDIGO', '#ffffff', 32),
(33, 'AQUA', '#ffffff', 33),
(34, 'BLUE', '#ffffff', 34),
(35, 'MELANGE GREEN', '#ffffff', 35),
(36, 'MELANGE ARENA', '#ffffff', 36),
(37, 'MELANGE BLUE', '#ffffff', 37),
(38, 'MELANGE RED', '#ffffff', 38),
(39, 'PIEL', '#ffffff', 39),
(40, 'PERLA', '#ffffff', 40),
(41, 'MORADO', '#ffffff', 41),
(42, 'LILA', '#ffffff', 42),
(43, 'DISEÑO 1', '#ffffff', 43),
(44, 'DISEÑO 2', '#ffffff', 44),
(45, 'DISEÑO 3', '#ffffff', 45),
(46, 'DISEÑO 4', '#ffffff', 46),
(47, 'DISEÑO 5', '#ffffff', 47),
(48, 'DISEÑO 6', '#ffffff', 48),
(49, 'DISEÑO 7', '#ffffff', 49),
(50, 'DISEÑO 8', '#ffffff', 50),
(51, 'DISEÑO 9', '#ffffff', 51),
(52, 'DISEÑO 10', '#ffffff', 52),
(53, 'DISEÑO 11', '#ffffff', 53),
(54, 'DISEÑO 12', '#ffffff', 54),
(55, 'DISEÑO 13', '#ffffff', 55),
(56, 'DISEÑO 14', '#ffffff', 56),
(57, 'DISEÑO 15', '#ffffff', 57),
(58, 'PINK', '#ffffff', 58),
(59, 'NEO GREEN', '#ffffff', 59),
(60, 'NEO AQUA', '#ffffff', 60),
(61, 'AMERICAN RED', '#ffffff', 61),
(62, 'BORDEAUX', '#ffffff', 62),
(63, 'PALO DE ROSA', '#ffffff', 63),
(64, 'ESMERALDA', '#ffffff', 64),
(65, 'AZUL PASTEL', '#ffffff', 65),
(66, 'CREMA', '#ffffff', 66),
(67, 'NARANJA', '#ffffff', 67),
(68, 'NICKEL', '#ffffff', 68),
(69, 'CAQUI', '#ffffff', 69),
(70, 'MARENGO', '#ffffff', 70),
(71, 'AZUL ELECTRICO', '#ffffff', 71),
(72, 'NATURAL', '#ffffff', 72),
(73, 'IBIZA', '#ffffff', 73),
(74, 'VERDE OLIVO', '#ffffff', 74),
(75, 'PLOMO CLARO', '#ffffff', 87),
(76, 'VERDE BOTELLA', '#ffffff', 89),
(77, 'ESPECIAL', '', 95),
(78, 'INDEFINIDO', '#ffffff', 96),
(79, 'CELESTE', '#2012e2', 0),
(80, 'NEGRO', '#2012e2', 0),
(81, 'BEIGE', '#c4cd98', 0),
(82, 'VERDE', '#2012e2', 0),
(83, 'Marinero Black', '#2012e2', 0),
(84, 'URBAN', '#2012e2', 0),
(85, 'MARINERO BLUE', '#2012e2', 0),
(86, 'MAGENTI BLACK', '#2012e2', 0),
(87, 'BLACK', '#2012e2', 0),
(88, 'ROCKSTAR', '#2012e2', 0),
(89, 'CALEIDOSCOPIO', '#2012e2', 0),
(90, 'BLACK GOLD', '#2012e2', 0),
(91, 'ICE CREAM', '#2012e2', 0),
(92, 'Atun pescado', '#ff9900', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseno`
--

CREATE TABLE `diseno` (
  `id_diseno` int(11) NOT NULL,
  `desc_diseno` varchar(255) NOT NULL,
  `cod_diseno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diseno`
--

INSERT INTO `diseno` (`id_diseno`, `desc_diseno`, `cod_diseno`) VALUES
(1, 'CON PUNTERA', 1),
(2, 'SIN PUNTERA', 2),
(3, 'NUDA', 3),
(4, 'DEDOS LIBRES', 18),
(5, 'STANDARD', 50),
(6, 'ENTERO', 60),
(7, 'ESCOCES', 61),
(8, 'STRIPES', 62),
(9, 'MOTAS', 63),
(10, 'PAPA', 64),
(11, 'MAMA', 65),
(12, 'NAVIDEÑAS', 66),
(13, 'SUPER HEROES', 67),
(14, 'ENTERO + ICONO', 68),
(15, 'C/ALTO + M/LARGA', 20),
(16, 'C/CLASICO + M/ LARGA', 21),
(17, 'C/CLASICO + M/ CORTA', 22),
(18, 'C/V + M/ LARGA', 23),
(19, 'C/V + S/MANGA', 24),
(20, 'C/U + M/LARGA', 25),
(21, 'C/U + M/ CORTA', 26),
(22, 'C/U + S/MANGA', 27),
(23, 'C/ALTO + M/CORTA', 28),
(24, 'C/ALTO + S/ MANGA', 29),
(25, 'TOP', 30),
(26, 'C/V + M/ CORTA', 31),
(27, 'BALLET', 70),
(28, 'DANZA', 71),
(29, 'CAÑA ALTA', 72),
(30, 'CAÑA BAJA', 73),
(31, 'MANGA LARGA', 74),
(32, 'MANGA CORTA', 75);

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
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `desc_grupo` varchar(255) NOT NULL,
  `cod_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `desc_grupo`, `cod_grupo`) VALUES
(1, 'LUJO', 11),
(2, 'STRETCH', 12),
(3, 'LYCRA 20', 13),
(4, 'LYCRA 40', 14),
(5, 'LYCRA 70', 15),
(6, 'CAMISETA TERMICA', 16),
(7, 'CALCETERIA NIÑO', 17),
(8, 'CALCETERIA NIÑA', 18),
(9, 'CALCETERIA HOMBRE', 19),
(10, 'CALCETERIA DAMA', 20),
(11, 'BASICOS', 33),
(12, 'UNDERWEAR', 34),
(13, 'LUJO LYCRA', 0),
(14, 'TERMICOS', 0),
(15, 'STRETCH', 0);

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
(1, 1, 246, 'IE-10001'),
(2, 2, 76, 'ID-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `desc_marca` varchar(50) NOT NULL,
  `cod_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `desc_marca`, `cod_marca`) VALUES
(1, 'BIANCHI', 70),
(2, 'TRICOT', 71);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_devolucion`
--

CREATE TABLE `nota_devolucion` (
  `id_devolucion` int(11) NOT NULL,
  `nombre_personal` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `nro_comprobante_dev` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion_dev` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle_devolucion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_devolucion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nota_devolucion`
--

INSERT INTO `nota_devolucion` (`id_devolucion`, `nombre_personal`, `fecha_devolucion`, `nro_comprobante_dev`, `observacion_dev`, `detalle_devolucion`, `estado_devolucion`) VALUES
(1, 'ELISEO WIL', '2025-01-08', 'ID-1', '', '[{\"idProducto\":\"2\",\"descProducto\":\"Media Pantalon Lujo CP - Tabaco\",\"costoProducto\":45,\"cantProdDocena\":\"6\",\"cantProdUnidad\":\"4\"}]', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_empaque`
--

CREATE TABLE `nota_empaque` (
  `id_nota_empaque` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `fecha_empaque` date NOT NULL,
  `nro_comprobante_emp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion_empaque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle_empaque` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_docenas` int(11) NOT NULL,
  `total_unidades` int(11) NOT NULL,
  `estado_empaque` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nota_empaque`
--

INSERT INTO `nota_empaque` (`id_nota_empaque`, `id_personal`, `fecha_empaque`, `nro_comprobante_emp`, `observacion_empaque`, `detalle_empaque`, `total_docenas`, `total_unidades`, `estado_empaque`) VALUES
(1, 2, '2025-01-07', 'IE-10001', '', '[{\"idProducto\":\"1\",\"descProducto\":\"Media Pantalon Lujo CP - Cognac\",\"costoProducto\":30,\"cantProdDocena\":\"20\",\"cantProdUnidad\":\"6\"}]', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_ingreso`
--

CREATE TABLE `nota_ingreso` (
  `id_nota_ingreso` int(11) NOT NULL,
  `cod_nota_ingreso` varchar(30) NOT NULL,
  `concepto_ingreso` varchar(100) NOT NULL,
  `detalle_ingreso` text NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_nota_ingreso` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_ingreso_ajuste`
--

CREATE TABLE `nota_ingreso_ajuste` (
  `id_ingreso_ajuste` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `fecha_ingreso_ajuste` date NOT NULL,
  `nro_comprobante_ajuste` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion_ingreso_ajuste` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle_ingreso_ajuste` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_ingreso_ajuste` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_ingreso_prov`
--

CREATE TABLE `nota_ingreso_prov` (
  `id_ingreso_prov` int(11) NOT NULL,
  `nombre_personal` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingreso_prov` date NOT NULL,
  `nro_comprobante_prov` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion_ingreso_prov` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle_ingreso_prov` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_ingreso_prov` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_otros_ingresos`
--

CREATE TABLE `nota_otros_ingresos` (
  `id_otros_ingresos` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `fecha_otros_ingresos` date NOT NULL,
  `nro_comprobante_otros` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion_otros_ingresos` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle_otros_ingresos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_otros_ingresos` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'NATALY', 'ALANOCA', '', '15010840', '2000-10-22', 'AUX', '', '', 1),
(2, 'JUAN CARLOS', 'VARGAS', 'QUISPE', '8309618', '1983-10-22', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `cod_producto` varchar(50) NOT NULL,
  `nombre_producto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio_costo` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `imagen_producto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_diseno` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_medida` int(11) NOT NULL,
  `id_talla` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `cod_producto`, `nombre_producto`, `precio_costo`, `precio_venta`, `imagen_producto`, `id_grupo`, `id_diseno`, `id_categoria`, `id_medida`, `id_talla`, `id_color`, `id_marca`, `estado`) VALUES
(1, '7011330151013', 'Media Pantalon Lujo CP - Cognac', '30.00', '25.00', 'SS.jpg', 6, 4, 1, 2, 3, 7, 0, 1),
(2, '7011330151020', 'Media Pantalon Lujo CP - Tabaco', '35.00', '30.00', '', 5, 11, 10, 2, 8, 5, 0, 1),
(3, '7011330151037', 'Media Pantalon Lujo CP - Almendra', '90.00', '85.00', '', 14, 13, 15, 1, 14, 9, 0, 1),
(4, '7011330151044', 'Media Pantalon Lujo CP - Calipso', '55.00', '50.00', '', 8, 7, 10, 1, 15, 4, 0, 1),
(5, '7011330151051', 'Media Pantalon Lujo CP - Acacia', '28.00', '25.00', '', 13, 15, 17, 1, 12, 5, 0, 1),
(6, '7011330151068', 'Media Pantalon Lujo CP - Torcaz', '38.00', '30.00', '', 7, 4, 7, 2, 14, 14, 0, 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_empaque`
--

CREATE TABLE `registro_empaque` (
  `id_entrega` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_talla` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `docenas` int(20) NOT NULL,
  `unidades` int(20) NOT NULL,
  `id_encargado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1, 52, 'SV-1'),
(2, 1, 14, 'SV-2'),
(3, 2, 15, 'SV-2');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `stock_producto`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `stock_producto` (
`id_producto` int(11)
,`total_ingreso` decimal(32,0)
,`total_salida` decimal(32,0)
,`diferencia` decimal(33,0)
,`docenas` decimal(16,0)
,`unidades` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `id_talla` int(11) NOT NULL,
  `desc_talla` varchar(50) NOT NULL,
  `cod_talla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`id_talla`, `desc_talla`, `cod_talla`) VALUES
(1, 'UNICA', 51),
(2, '0 a 1', 52),
(3, '1 a 2', 53),
(4, '2 a 4', 54),
(5, '4 a 6', 55),
(6, '6 a 8', 56),
(7, '8 a 10', 57),
(8, '10 a 12', 58),
(9, '4 a 7', 59),
(10, '7 a 9', 60),
(11, '9 a 12', 61),
(12, 'XS', 62),
(13, 'S', 63),
(14, 'M', 64),
(15, 'L', 65),
(16, 'XL', 66),
(17, 'XXL', 67),
(18, 'L-XL', 73),
(19, '24 a 27', 74),
(20, '24 a 35', 75),
(21, 'VARIOS', 76),
(22, 'MAYOR', 77),
(23, 'XXS-L', 0);

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
(3, 'KL'),
(4, 'KILOGRAMOS'),
(5, 'GR');

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
(1, 'Administrador ADM', 'admin', '$2y$10$y5Oc7mG8p4MPuFPvUdOk/.Gkf6iD/3kNqtYm2Lw0fOxRiBrLItehS', 'Administrador', '2025-01-07 11:44:42', '2023-03-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `codigo_venta` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `detalle_venta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `neto` decimal(10,2) NOT NULL,
  `fecha_emision` date NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_venta` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `codigo_venta`, `id_cliente`, `detalle_venta`, `total`, `descuento`, `neto`, `fecha_emision`, `observacion`, `id_usuario`, `estado_venta`) VALUES
(1, 'SV-1', 11, '[{\"idProducto\":\"1\",\"descProducto\":\"Media Pantalon Lujo CP - Cognac\",\"costoProducto\":25,\"cantProdDocena\":\"4\",\"cantProdUnidad\":\"4\",\"descuentoCliente\":\"20.00\"}]', '108.33', '21.67', '86.66', '2025-01-08', '', 1, 1),
(2, 'SV-2', 13, '[{\"idProducto\":\"1\",\"descProducto\":\"Media Pantalon Lujo CP - Cognac\",\"costoProducto\":25,\"cantProdDocena\":\"1\",\"cantProdUnidad\":\"2\",\"descuentoCliente\":\"30.00\"},{\"idProducto\":\"2\",\"descProducto\":\"Media Pantalon Lujo CP - Tabaco\",\"costoProducto\":30,\"cantProdDocena\":\"1\",\"cantProdUnidad\":\"3\",\"descuentoCliente\":\"30.00\"}]', '66.67', '20.00', '46.67', '2025-01-08', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `stock_producto`
--
DROP TABLE IF EXISTS `stock_producto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stock_producto`  AS  select `ingreso`.`id_producto` AS `id_producto`,ifnull(`ingreso`.`total_ingreso`,0) AS `total_ingreso`,ifnull(`salida`.`total_salida`,0) AS `total_salida`,ifnull(`ingreso`.`total_ingreso`,0) - ifnull(`salida`.`total_salida`,0) AS `diferencia`,floor((ifnull(`ingreso`.`total_ingreso`,0) - ifnull(`salida`.`total_salida`,0)) / 12) AS `docenas`,(ifnull(`ingreso`.`total_ingreso`,0) - ifnull(`salida`.`total_salida`,0)) MOD 12 AS `unidades` from ((select `ingreso_stock`.`id_producto` AS `id_producto`,sum(`ingreso_stock`.`cantidad`) AS `total_ingreso` from `ingreso_stock` group by `ingreso_stock`.`id_producto`) `ingreso` left join (select `salida_stock`.`id_producto` AS `id_producto`,sum(`salida_stock`.`cantidad`) AS `total_salida` from `salida_stock` group by `salida_stock`.`id_producto`) `salida` on(`ingreso`.`id_producto` = `salida`.`id_producto`)) ;

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
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `nota_devolucion`
--
ALTER TABLE `nota_devolucion`
  ADD PRIMARY KEY (`id_devolucion`);

--
-- Indices de la tabla `nota_empaque`
--
ALTER TABLE `nota_empaque`
  ADD PRIMARY KEY (`id_nota_empaque`),
  ADD UNIQUE KEY `nro_comprobante_emp` (`nro_comprobante_emp`);

--
-- Indices de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  ADD PRIMARY KEY (`id_nota_ingreso`);

--
-- Indices de la tabla `nota_ingreso_ajuste`
--
ALTER TABLE `nota_ingreso_ajuste`
  ADD PRIMARY KEY (`id_ingreso_ajuste`);

--
-- Indices de la tabla `nota_ingreso_prov`
--
ALTER TABLE `nota_ingreso_prov`
  ADD PRIMARY KEY (`id_ingreso_prov`);

--
-- Indices de la tabla `nota_otros_ingresos`
--
ALTER TABLE `nota_otros_ingresos`
  ADD PRIMARY KEY (`id_otros_ingresos`);

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
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD UNIQUE KEY `codigo_venta` (`codigo_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `diseno`
--
ALTER TABLE `diseno`
  MODIFY `id_diseno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ingreso_stock`
--
ALTER TABLE `ingreso_stock`
  MODIFY `id_ingreso_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `nota_devolucion`
--
ALTER TABLE `nota_devolucion`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nota_empaque`
--
ALTER TABLE `nota_empaque`
  MODIFY `id_nota_empaque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nota_ingreso`
--
ALTER TABLE `nota_ingreso`
  MODIFY `id_nota_ingreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_ingreso_ajuste`
--
ALTER TABLE `nota_ingreso_ajuste`
  MODIFY `id_ingreso_ajuste` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_ingreso_prov`
--
ALTER TABLE `nota_ingreso_prov`
  MODIFY `id_ingreso_prov` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_otros_ingresos`
--
ALTER TABLE `nota_otros_ingresos`
  MODIFY `id_otros_ingresos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_salida`
--
ALTER TABLE `nota_salida`
  MODIFY `id_nota_salida` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_empaque`
--
ALTER TABLE `registro_empaque`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salida_stock`
--
ALTER TABLE `salida_stock`
  MODIFY `id_salida_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `id_talla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
