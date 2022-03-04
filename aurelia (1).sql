-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2021 a las 23:38:03
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aurelia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `backup`
--

CREATE TABLE `backup` (
  `id` int(11) NOT NULL,
  `tabla` text NOT NULL,
  `tipo` text NOT NULL,
  `datos_viejos` text DEFAULT NULL,
  `datos_nuevos` text DEFAULT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `backup`
--

INSERT INTO `backup` (`id`, `tabla`, `tipo`, `datos_viejos`, `datos_nuevos`, `fechacreacion`, `usuario`) VALUES
(4, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"051313\",\"nombre\":\"LEGGIN BLACK T 26\",\"descripcion\":\"T 26 GRIS\",\"stock\":\"1\",\"precio_compra\":\"0\",\"precio_venta\":\"500\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-08-17 17:53:51\"}', '{\"id_categoria\":\"1\",\"codigo\":\"051313\",\"nombre\":\"LEGGIN BLACK T 26\",\"descripcion\":\"T 26 GRIS\",\"stock\":\"2\",\"precio_compra\":false,\"precio_venta\":\"500\"}', '2021-10-20 00:20:33', 'Administrador'),
(5, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"051313\",\"nombre\":\"LEGGIN BLACK T 26\",\"descripcion\":\"T 26 GRIS\",\"stock\":\"2\",\"precio_compra\":\"0\",\"precio_venta\":\"500\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-19 21:20:33\"}', '{\"id_categoria\":\"1\",\"codigo\":\"051313\",\"nombre\":\"LEGGIN BLACK T 26\",\"descripcion\":\"T 26 GRIS\",\"stock\":\"4\",\"precio_compra\":false,\"precio_venta\":\"500\"}', '2021-10-20 00:21:08', 'Administrador'),
(8, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"051313\",\"nombre\":\"LEGGIN BLACK T 26\",\"descripcion\":\"T 26 GRIS\",\"stock\":\"4\",\"precio_compra\":\"0\",\"precio_venta\":\"500\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-19 21:21:08\"}', '{\"id_categoria\":\"1\",\"codigo\":\"051313\",\"nombre\":\"LEGGIN BLACK T 26\",\"descripcion\":\"T 26 GRIS\",\"stock\":\"4\",\"precio_compra\":false,\"precio_venta\":\"700\"}', '2021-10-21 14:20:33', 'Administrador'),
(9, 'productos', 'ELIMINAR', '{\"id_categoria\":\"1\",\"codigo\":\"051313\",\"nombre\":\"LEGGIN BLACK T 26\",\"descripcion\":\"T 26 GRIS\",\"stock\":\"4\",\"precio_compra\":\"0\",\"precio_venta\":\"700\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-21 11:20:33\"}', '{\"id\":\"7\"}', '2021-10-21 14:21:34', 'Administrador'),
(10, 'ventas', 'ELIMINAR', '{\"id\":\"58\",\"fecha\":\"2021-10-20\",\"codigo\":\"0001-00000159\",\"id_cliente\":\"1\",\"id_vendedor\":\"65\",\"productos\":\"[{\\\"id\\\":\\\"342\\\",\\\"descripcion\\\":\\\"ZAPHIR CARTERA BORDO TACHAS DORADAS\\\",\\\"codigo\\\":\\\"YG4256\\\",\\\"cantidad\\\":\\\"1\\\",\\\"precio\\\":\\\"4200.00\\\",\\\"descuento\\\":\\\"0.00\\\",\\\"total\\\":\\\"4200.00\\\"}]\",\"impuesto\":\"0\",\"total\":\"4200\",\"adeuda\":\"0\",\"metodo_pago\":\"[{\\\"id\\\":\\\"1\\\",\\\"fecha\\\":\\\"20-10-2021\\\",\\\"tipo\\\":\\\"EFECTIVO\\\",\\\"importe\\\":\\\"4200\\\",\\\"referencia\\\":\\\"EFECTIVO\\\"}]\",\"fechapago\":\"0000-00-00\",\"referenciapago\":\"\",\"observaciones\":\"\"}', '{\"id\":\"58\"}', '2021-10-21 14:22:04', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `efectivo` text NOT NULL,
  `tarjeta` text NOT NULL,
  `cheque` text NOT NULL,
  `transferencia` text NOT NULL,
  `cuenta_corriente` text NOT NULL,
  `vale` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id`, `fecha`, `efectivo`, `tarjeta`, `cheque`, `transferencia`, `cuenta_corriente`, `vale`) VALUES
(1, '2021-08-14', '0', '0', '0', '0', '0', '0'),
(2, '2021-08-17', '4680', '0', '0', '0', '0', '0'),
(3, '2021-08-18', '0', '0', '0', '0', '0', '0'),
(4, '2021-08-19', '0', '0', '0', '0', '0', '0'),
(5, '2021-08-20', '7900', '23100', '0', '0', '0', '0'),
(6, '2021-08-21', '1500', '0', '0', '0', '0', '0'),
(7, '2021-08-23', '2200', '1500', '0', '0', '0', '0'),
(8, '2021-08-24', '200', '2000', '0', '0', '0', '0'),
(9, '2021-08-25', '0', '9300', '0', '0', '0', '0'),
(10, '2021-08-26', '4150', '4700', '0', '0', '0', '0'),
(11, '2021-08-27', '0', '0', '0', '0', '0', '0'),
(12, '2021-08-28', '2400', '2400', '0', '0', '0', '0'),
(13, '2021-08-30', '500', '0', '0', '0', '0', '0'),
(14, '2021-08-31', '4200', '0', '0', '0', '0', '0'),
(15, '2021-09-01', '4100', '860', '0', '0', '0', '0'),
(16, '2021-09-02', '0', '6600', '0', '0', '0', '0'),
(17, '2021-09-03', '3500', '14700', '0', '0', '0', '0'),
(18, '2021-09-04', '2100', '1650', '0', '0', '0', '0'),
(19, '2021-09-06', '1000', '2850', '0', '0', '0', '0'),
(20, '2021-09-07', '4700', '1500', '0', '0', '2200', '0'),
(21, '2021-09-08', '1600', '7900', '0', '0', '0', '0'),
(22, '2021-09-15', '0', '0', '0', '0', '0', '0'),
(23, '2021-09-30', '0', '0', '0', '0', '0', '0'),
(24, '2021-10-04', '0', '0', '0', '0', '0', '0'),
(25, '2021-10-14', '0', '0', '0', '0', '0', '0'),
(26, '2021-10-18', '0', '0', '0', '0', '0', '0'),
(27, '2021-10-19', '0', '0', '0', '0', '0', '0'),
(28, '2021-10-20', '0', '0', '0', '0', '0', '0'),
(29, '2021-10-21', '0', '0', '0', '0', '0', '0'),
(30, '2021-10-22', '4200', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `prefijo` text DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `movimiento` text NOT NULL,
  `obs` text NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `obsdel` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `prefijo`, `numero`, `movimiento`, `obs`, `activo`, `obsdel`, `fecha`) VALUES
(1, 'INDUMENTARIA', 'INDU', 100, 'SI', '', 1, '', '2021-09-01 20:50:51'),
(2, 'ZAPATILLAS', '.', 21, 'SI', '', 1, '', '2021-08-20 22:51:09'),
(3, 'ACCESORIOS', '.', 52, 'SI', '', 1, '', '2021-10-19 22:59:31'),
(4, 'MARROQUINERIA', '.', 392, 'SI', '', 1, '', '2021-09-06 22:58:59'),
(5, 'BOTITAS', '.', 2, 'SI', '', 1, '', '2021-08-20 22:57:58'),
(6, 'OJOTAS', '.', 11, 'SI', '', 1, '', '2021-08-20 21:48:12'),
(7, 'CHATITAS', '.', 12, 'SI', '', 1, '', '2021-08-20 22:54:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL,
  `dni` int(30) NOT NULL,
  `cuit` varchar(30) NOT NULL,
  `idivacliente` int(11) NOT NULL,
  `email` text NOT NULL,
  `idtipocliente` int(11) NOT NULL DEFAULT 1,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `obs` text NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `obsdel` text NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `direccion`, `telefono`, `dni`, `cuit`, `idivacliente`, `email`, `idtipocliente`, `compras`, `ultima_compra`, `obs`, `activo`, `obsdel`, `fechacreacion`) VALUES
(1, 'MORE', '.', '(370) 426-3773', 40804417, '20', 2, 'EMAIL@EMAIL.COM', 1, 10, '2021-10-20 08:05:35', '.', 1, '', '2021-10-21 14:22:04'),
(2, 'MELIZA MEZA', 'BARRIO LA COLINIA', '(370) 400-2343', 39317401, '00-00000000-0', 2, 'EMAIL@EMAIL.COM', 1, 0, '0000-00-00 00:00:00', '.', 1, '', '2021-09-08 13:50:11'),
(3, 'CARMEN SOSA', '.', '(000) 000-0000', 0, '00-00000000-0', 2, 'SS@GMAIL.COM', 1, 1, '2021-10-22 18:35:30', '', 1, '', '2021-10-22 21:35:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicioniva`
--

CREATE TABLE `condicioniva` (
  `idcondicioniva` int(11) NOT NULL,
  `nombre` varchar(4) NOT NULL,
  `obs` text NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `obsdel` text NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `condicioniva`
--

INSERT INTO `condicioniva` (`idcondicioniva`, `nombre`, `obs`, `activo`, `obsdel`, `fechacreacion`) VALUES
(1, 'RI', 'RESPONSABLE INSCRIPTO', 1, '', '2017-11-16 14:18:26'),
(2, 'CF', 'CONSUMIDOR FINAL', 1, '', '2017-11-16 14:19:27'),
(3, 'M', 'MONOTRIBUTISTA', 1, '', '2017-11-16 14:19:27'),
(4, 'EX', 'IVA EXENTO', 1, '', '2017-11-16 14:19:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datostitular`
--

CREATE TABLE `datostitular` (
  `iddatostitular` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `nick` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL,
  `web` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datostitular`
--

INSERT INTO `datostitular` (`iddatostitular`, `nombre`, `nick`, `direccion`, `telefono`, `web`) VALUES
(1, 'Bgtoner', 'BGTONER', 'Parque Urbano 1 mz 82 c2', '3704299434', 'www.bgtoner.com.ar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_productos`
--

CREATE TABLE `descripcion_productos` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `activo` int(11) DEFAULT 1,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `descripcion_productos`
--

INSERT INTO `descripcion_productos` (`id`, `nombre`, `activo`, `fechacreacion`) VALUES
(1, 'TALLE UNICO', 1, '2021-07-31 12:41:25'),
(2, 'TALLE S Y M', 1, '2021-07-31 12:41:25'),
(3, 'TALLE S Y XL', 1, '2021-07-31 12:41:25'),
(4, 'TALLE S NEGRO', 1, '2021-07-31 12:41:25'),
(5, 'TALLE XL', 1, '2021-07-31 12:41:25'),
(6, 'TALLE S', 1, '2021-07-31 12:41:25'),
(7, 'TALLE M', 1, '2021-07-31 12:41:25'),
(8, 'TALLE L', 1, '2021-07-31 12:41:25'),
(9, 'TALLE 40', 1, '2021-07-31 12:41:25'),
(10, 'TALLE 39', 1, '2021-07-31 12:41:25'),
(11, 'TALLE 38', 1, '2021-07-31 12:41:25'),
(12, 'TALLE 37', 1, '2021-07-31 12:41:25'),
(13, 'TALLE 36', 1, '2021-07-31 12:41:25'),
(14, 'TALLE 35', 1, '2021-07-31 12:41:25'),
(15, 'TALLE 34', 1, '2021-07-31 12:41:25'),
(16, 'TALLE 32', 1, '2021-07-31 12:41:25'),
(17, 'TALLE 30', 1, '2021-07-31 12:41:25'),
(18, 'TALLE 3', 1, '2021-07-31 12:41:25'),
(19, 'TALLE 28', 1, '2021-07-31 12:41:25'),
(20, 'TALLE 26', 1, '2021-07-31 12:41:25'),
(21, 'TALLE 24', 1, '2021-07-31 12:41:25'),
(22, 'TALLE 2', 1, '2021-07-31 12:41:25'),
(23, 'TALLE 2 y 3', 1, '2021-07-31 12:41:25'),
(24, 'TALLE 1', 1, '2021-07-31 12:41:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `empresa` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL,
  `email` text NOT NULL,
  `cuit` text NOT NULL,
  `web` text NOT NULL,
  `detalle1` text NOT NULL,
  `detalle2` text NOT NULL,
  `fotorecibo` text NOT NULL,
  `backend` text NOT NULL,
  `iconochicoblanco` text NOT NULL,
  `iconochiconegro` text NOT NULL,
  `logoblancobloque` text NOT NULL,
  `logonegrobloque` text NOT NULL,
  `logoblancolineal` text NOT NULL,
  `logonegrolineal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `empresa`, `direccion`, `telefono`, `email`, `cuit`, `web`, `detalle1`, `detalle2`, `fotorecibo`, `backend`, `iconochicoblanco`, `iconochiconegro`, `logoblancobloque`, `logonegrobloque`, `logoblancolineal`, `logonegrolineal`) VALUES
(1, 'AURELIA', 'MORENO 1002- FORMOSA', '', '', '', '', 'A1', 'DEJO CONSTANCIA DE QUE EL /LOS EQUIPOS SON DE MI PROPIEDAD, AUTORIZANDO A USTEDES EL PODER REALIZAR LAS PRUEBAS NECESARIAS PARA SU REPARACION.', 'vistas/img/empresa/logoimpreso.jpg', 'vistas/img/plantilla/back.png', 'vistas/img/plantilla/icono-blanco.png', 'vistas/img/plantilla/icono-negro.png', 'vistas/img/plantilla/logo-blanco-bloque.png', 'vistas/img/plantilla/logo-negro-bloque.png', 'vistas/img/plantilla/logo-blanco-lineal.png', 'vistas/img/plantilla/logo-negro-lineal.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacion_precios`
--

CREATE TABLE `modificacion_precios` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `accion` text NOT NULL,
  `porcentaje` text NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nrocomprobante`
--

CREATE TABLE `nrocomprobante` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nrocomprobante`
--

INSERT INTO `nrocomprobante` (`id`, `nombre`, `numero`) VALUES
(1, 'REGISTRO', 1000),
(2, 'FC', 161);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` text NOT NULL,
  `referencia` text NOT NULL,
  `importe` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `idventa`, `fecha`, `tipo`, `referencia`, `importe`) VALUES
(1, 1, '2021-08-17', 'EFECTIVO', 'EFECTIVO', 4680),
(2, 2, '2021-08-20', 'EFECTIVO', 'EFECTIVO', 600),
(3, 2, '2021-08-20', 'EFECTIVO', 'EFECTIVO', 0),
(4, 3, '2021-08-20', 'EFECTIVO', 'EFECTIVO', 300),
(5, 4, '2021-08-20', 'EFECTIVO', 'EFECTIVO', 800),
(6, 5, '2021-08-20', 'TARJETA', 'TARJETA', 12000),
(7, 6, '2021-08-20', 'TARJETA', 'TARJETA', 2100),
(8, 7, '2021-08-20', 'TARJETA', 'TARJETA', 2100),
(9, 8, '2021-08-20', 'EFECTIVO', 'EFECTIVO', 2300),
(10, 9, '2021-08-20', 'EFECTIVO', 'EFECTIVO', 900),
(11, 10, '2021-08-20', 'EFECTIVO', 'EFECTIVO', 300),
(12, 11, '2021-08-20', 'TARJETA', 'TARJETA', 4800),
(13, 12, '2021-08-20', 'TARJETA', 'TARJETA', 2100),
(14, 13, '2021-08-20', 'EFECTIVO', 'EFECTIVO', 2700),
(15, 14, '2021-08-21', 'EFECTIVO', 'EFECTIVO', 1500),
(16, 15, '2021-08-23', 'EFECTIVO', 'EFECTIVO', 1300),
(17, 16, '2021-08-23', 'EFECTIVO', 'EFECTIVO', 900),
(18, 17, '2021-08-23', 'TARJETA', 'TARJETA', 1500),
(19, 18, '2021-08-24', 'TARJETA', 'TARJETA', 2000),
(20, 19, '2021-08-24', 'EFECTIVO', 'EFECTIVO', 200),
(21, 20, '2021-08-25', 'TARJETA', 'TARJETA', 1500),
(22, 21, '2021-08-25', 'TARJETA', 'TARJETA', 7800),
(23, 22, '2021-08-26', 'EFECTIVO', 'EFECTIVO', 2200),
(24, 23, '2021-08-26', 'TARJETA', 'TARJETA', 4700),
(25, 24, '2021-08-26', 'EFECTIVO', 'EFECTIVO', 1950),
(26, 25, '2021-08-28', 'EFECTIVO', 'EFECTIVO', 2400),
(27, 26, '2021-08-28', 'TARJETA', 'TARJETA', 2400),
(28, 27, '2021-08-30', 'EFECTIVO', 'EFECTIVO', 500),
(29, 28, '2021-08-31', 'EFECTIVO', 'EFECTIVO', 1300),
(30, 29, '2021-08-31', 'EFECTIVO', 'EFECTIVO', 2900),
(31, 30, '2021-09-01', 'TARJETA', 'TARJETA', 860),
(32, 31, '2021-09-01', 'EFECTIVO', 'EFECTIVO', 1000),
(33, 32, '2021-09-01', 'EFECTIVO', 'EFECTIVO', 3100),
(34, 33, '2021-09-02', 'TARJETA', 'TARJETA', 5400),
(35, 34, '2021-09-02', 'TARJETA', 'TARJETA', 1200),
(36, 35, '2021-09-03', 'TARJETA', 'TARJETA', 10100),
(37, 36, '2021-09-03', 'EFECTIVO', 'EFECTIVO', 900),
(38, 37, '2021-09-03', 'TARJETA', 'TARJETA', 4600),
(39, 38, '2021-09-03', 'EFECTIVO', 'EFECTIVO', 2600),
(40, 39, '2021-09-04', 'TARJETA', 'TARJETA', 1650),
(41, 40, '2021-09-04', 'EFECTIVO', 'EFECTIVO', 2100),
(42, 41, '2021-09-06', 'TARJETA', 'TARJETA', 600),
(43, 42, '2021-09-06', 'TARJETA', 'TARJETA', 1550),
(44, 43, '2021-09-06', 'EFECTIVO', 'EFECTIVO', 1000),
(45, 44, '2021-09-06', 'TARJETA', 'TARJETA', 700),
(46, 45, '2021-09-07', 'TARJETA', 'TARJETA', 1500),
(47, 46, '2021-09-07', 'EFECTIVO', 'EFECTIVO', 900),
(48, 47, '2021-09-07', 'EFECTIVO', 'EFECTIVO', 3800),
(49, 48, '2021-09-07', 'CTA.CORRIENTE', 'CTA.CORRIENTE', 2200),
(50, 49, '2021-09-08', 'TARJETA', 'TARJETA', 2900),
(51, 50, '2021-09-08', 'EFECTIVO', 'EFECTIVO', 1600),
(52, 51, '2021-09-08', 'TARJETA', 'TARJETA', 2100),
(53, 51, '2021-09-08', 'TARJETA', 'TARJETA', 0),
(54, 52, '2021-09-08', 'TARJETA', 'TARJETA', 1300),
(55, 53, '2021-09-08', 'TARJETA', 'TARJETA', 1600),
(61, 59, '2021-10-22', 'EFECTIVO', 'EFECTIVO', 4200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `valor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`id`, `nombre`, `valor`) VALUES
(1, 'PRECIO-COSTO', 'disabled'),
(2, 'JSON', 'SI'),
(3, 'RUTA', 'C:\\Users\\usuario\\Documents\\bd-respaldo'),
(4, 'BD', 'aurelia'),
(5, 'TICKET-FACTURA', 'FACTURA'),
(6, 'PRESUPUESTO', 'FALSE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id`, `nombre`, `valor`) VALUES
(1, 'porcentaje', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `productos` text NOT NULL,
  `total` double NOT NULL,
  `idcliente` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `presupuesto`
--

INSERT INTO `presupuesto` (`id`, `fecha`, `productos`, `total`, `idcliente`, `nombre`) VALUES
(1, '2021-08-06', '[{\"id\":\"1\",\"descripcion\":\"CACEROLA\",\"codigo\":\"190568\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"},{\"id\":\"1\",\"descripcion\":\"CACEROLA\",\"codigo\":\"190568\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 3000, 1, 'CONSUMIDOR FINAL'),
(2, '2021-08-06', '[{\"id\":\"1\",\"descripcion\":\"CACEROLA\",\"codigo\":\"190568\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 1500, 1, 'CONSUMIDOR FINAL'),
(3, '2021-08-06', '[{\"id\":\"1\",\"descripcion\":\"CACEROLA\",\"codigo\":\"190568\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 1500, 1, 'CONSUMIDOR FINAL'),
(4, '2021-08-06', '[{\"id\":\"1\",\"descripcion\":\"CACEROLA\",\"codigo\":\"190568\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"},{\"id\":\"1\",\"descripcion\":\"CACEROLA\",\"codigo\":\"190568\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 3000, 1, 'CONSUMIDOR FINAL'),
(5, '2021-08-06', '[{\"id\":\"1\",\"descripcion\":\"CACEROLA\",\"codigo\":\"190568\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 1500, 1, 'CONSUMIDOR FINAL'),
(6, '2021-08-08', '[{\"id\":\"1\",\"descripcion\":\"CACEROLA\",\"codigo\":\"190568\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 1500, 7, 'ABALLAY AZUCENA ARMINDA'),
(7, '2021-08-08', '[{\"id\":\"1\",\"descripcion\":\"CACEROLA\",\"codigo\":\"190568\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 1500, 1, 'CONSUMIDOR FINAL'),
(8, '2021-08-08', '[{\"id\":\"1\",\"descripcion\":\"CACEROLA\",\"codigo\":\"190568\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 1500, 20, 'AGOSTINA VILLASANTI'),
(9, '2021-08-08', '[{\"id\":\"1\",\"descripcion\":\"CACEROLA\",\"codigo\":\"190568\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 1500, 1, 'CONSUMIDOR FINAL'),
(10, '2021-08-08', '[{\"id\":\"1\",\"descripcion\":\"CACEROLA\",\"codigo\":\"190568\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 1500, 1, 'CONSUMIDOR FINAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `codigo` text NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `proveedor` int(100) NOT NULL,
  `cantminima` float NOT NULL,
  `stock` float NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `obs` text NOT NULL,
  `iva` float NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `obsdel` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `codigo`, `id_categoria`, `proveedor`, `cantminima`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `obs`, `iva`, `activo`, `obsdel`, `fecha`) VALUES
(8, 'SIMONE PANTALON CHUPIN T 22', 'TALLE 22', 'pmu01po139', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-17 20:55:24'),
(9, 'BERLIN WAVVE BLACK REPO T 22', 'TALLE 22', '298401040', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-17 20:57:00'),
(10, 'CLIP 3D II SWEET T 24', 'TALLE 24', '270001004', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-17 20:58:17'),
(11, 'GRACE WHITE PANTALON OXFOR TALLE 24', 'TALLE 24 BLANCO', 'INDU11', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-17 21:00:11'),
(12, 'LEGGIN LONDON SWEET T 26', 'TALLE 26', '061664', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-17 21:01:27'),
(13, 'STAR LAB JEANS TALLE 30', 'TALLE 30', '05051313', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-17 21:02:45'),
(14, 'PANTALON LASTIZADO SWEET T 28', 'TALLE 28', 'sweet', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-17 21:04:55'),
(15, 'LOLI ECO SPINNIG T 24', 'TALLE 24', '060434cc', 1, 0, 0, 3, 0, 500, 0, '', 0, 1, '', '2021-08-17 21:19:24'),
(16, 'LOLI ECO SPINNIG T 26', 'TALLE 26', '060434cc', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-17 21:21:02'),
(17, 'CINDY CALZA BRILLOSA T 2', 'TALLE 2', '262023032', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-17 21:27:47'),
(18, 'CINDY CALZA BRILLOSA T 3', 'TALLE 3', '262023032', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-17 21:28:38'),
(20, 'BELFFAST PANTALON AL TOBILLO T 2', 'TALLE 2', '330001032', 1, 0, 0, 2, 0, 900, 0, '', 0, 1, '', '2021-08-23 22:01:01'),
(21, 'PELS SHORT TENDENCIA T 1', 'TALLE 1', '320012001', 1, 0, 0, 1, 0, 1400, 0, '', 0, 1, '', '2021-08-17 21:35:04'),
(22, 'PELS SHORT TENDENCIA T 2', 'TALLE 2', '320012001', 1, 0, 0, 1, 0, 1400, 0, '', 0, 1, '', '2021-08-17 21:36:38'),
(23, 'WHOPPY MINI TRAMADO COMBINADO T 1', 'TALLE 1', '270002005', 1, 0, 0, 1, 0, 200, 0, '', 0, 1, '', '2021-08-17 21:38:42'),
(24, 'WHOPPY MINI TRAMADO COMBINADO T 2', 'TALLE 2', '270002005', 1, 0, 0, 1, 0, 200, 0, '', 0, 1, '', '2021-08-17 21:39:27'),
(25, 'WHOPPY MINI TRAMADO COMBINADO T3', 'TALLE 3', '270002005', 1, 0, 0, 1, 0, 200, 0, '', 0, 1, '', '2021-08-17 21:40:06'),
(26, 'PANTALON NASH T24', 'TALLE24', '0613133', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-17 21:41:28'),
(27, 'JEANS RIGIDO SWEET T 26', 'TALLE 26 OSCURO', 'SWEET', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-17 21:42:33'),
(28, 'PELS MATALIC SHORT T2', 'TALLE 2 PLATEADO', '330012038', 1, 0, 0, 1, 0, 1700, 0, '', 0, 1, '', '2021-08-17 21:44:09'),
(29, 'MILLIE SHORT ELASTICO T2 R', 'TALLE 2 ROJO', '310012002', 1, 0, 0, 1, 0, 300, 0, '', 0, 1, '', '2021-08-17 21:47:32'),
(30, 'MILLIE SHORT ELASTICO T2 A', 'TALLE 2 AZUL', '310012002', 1, 0, 0, 1, 0, 300, 0, '', 0, 1, '', '2021-08-17 21:48:21'),
(31, 'HALF SHORT TIRO ALTO T1', 'TALLE 1', 'PMU12P00368', 1, 0, 0, 2, 0, 1850, 0, '', 0, 1, '', '2021-08-17 21:50:11'),
(32, 'TERESITA POLLERA T 1', 'TALLE 1', '33B602007', 1, 0, 0, 1, 0, 300, 2, '', 0, 1, '', '2021-08-20 15:32:40'),
(33, 'TERESITA POLLERA T2', 'TALLE 2', '33B602007', 1, 0, 0, 1, 0, 300, 1, '', 0, 1, '', '2021-09-01 22:09:42'),
(34, 'TERESITA POLLERA T3', 'TALLE 3', '33B602007', 1, 0, 0, 0, 0, 300, 1, '', 0, 1, '', '2021-09-01 22:09:42'),
(35, 'DOUBLE FALDA DEMIN COMBINADA T 2', 'TALLE 2', 'PMU02P01113', 1, 0, 0, 0, 0, 500, 1, '', 0, 1, '', '2021-09-01 20:51:52'),
(36, 'MORIZON FALDA CON PICOS T U', 'TALLE UNICO', '270009005', 1, 0, 0, 1, 0, 300, 0, '', 0, 1, '', '2021-08-17 22:03:49'),
(37, 'DIAMANTE POLLERA TENDENCIA T 1', 'TALLE 1', '260002013', 1, 0, 0, 1, 0, 200, 0, '', 0, 1, '', '2021-08-17 22:05:04'),
(38, 'LADIES FALDA CON VOLADOS T 1', 'TALLE 1', '330002005', 1, 0, 0, 2, 0, 200, 0, '', 0, 1, '', '2021-08-17 22:06:19'),
(39, 'LADIES FALDA CON VOLADOS T 2', 'TALLE 2', '330002005', 1, 0, 0, 2, 0, 200, 0, '', 0, 1, '', '2021-08-17 22:06:52'),
(40, 'LADIES FALDA CON VOLADOS T 3', 'TALLE 3', '330002005', 1, 0, 0, 2, 0, 200, 0, '', 0, 1, '', '2021-08-17 22:07:32'),
(41, 'VESTIDO SACILE T U', 'TALLE UNICO', '010831', 1, 0, 0, 2, 0, 1800, 0, '', 0, 1, '', '2021-08-17 22:08:53'),
(42, 'COLMENA VESTIDO T 1', 'TALLE 1', '330014042', 1, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-08-17 22:10:10'),
(43, 'CONNIE MONO CORTO T 1', 'TALLE 1', 'pmu35p01124', 1, 0, 0, 2, 0, 300, 0, '', 0, 1, '', '2021-08-17 22:11:29'),
(45, 'CONNIE MONO CORTO T 2', 'TALLE 2', 'pmu35p01124', 1, 0, 0, 2, 0, 300, 0, '', 0, 1, '', '2021-08-17 22:14:02'),
(46, 'LOLA REMERA MANGAS LARGAS T2', 'TALLE 2 ROJA', 'PMUP00057', 1, 0, 0, 1, 0, 1260, 0, '', 0, 1, '', '2021-08-17 22:15:43'),
(47, 'CELINE DOS REMERA SIN HOMBROS T1', 'TALLE1', '310009014', 1, 0, 0, 1, 0, 600, 0, '', 0, 1, '', '2021-08-17 22:17:30'),
(48, 'CELINE DOS REMERA SIN HOMBROS T2', 'TALLE 2', '310009014', 1, 0, 0, 1, 0, 600, 0, '', 0, 1, '', '2021-08-17 22:18:27'),
(49, 'MINDY VESTIDO NOCHE CORTO T 0', 'TALLE 0', 'PMU14P00348', 1, 0, 0, 2, 0, 1690, 0, '', 0, 1, '', '2021-08-17 22:20:05'),
(50, 'MINDY VESTIDO NOCHE CORTO T 1', 'TALLE 1', 'PMU14P00348', 1, 0, 0, 1, 0, 1690, 0, '', 0, 1, '', '2021-08-17 22:20:34'),
(51, 'DUBLIN REMERA TOP NOCHE T 1', 'TALLE1', 'PMU0901099', 1, 0, 0, 1, 0, 300, 0, '', 0, 1, '', '2021-08-17 22:23:13'),
(52, 'DUBLIN REMERA TOP NOCHE T 2', 'TALLE 2', 'PMU0901099', 1, 0, 0, 1, 0, 300, 0, '', 0, 1, '', '2021-08-17 22:23:46'),
(53, 'DUBLIN REMERA TOP NOCHE T 3', 'TALLE 3', 'PMU0901099', 1, 0, 0, 0, 0, 300, 1, '', 0, 1, '', '2021-09-01 22:09:42'),
(54, 'ALTAMIRA REMERA TOP VOLADO T2', 'TALLE 2', 'PMU09P00694', 1, 0, 0, 0, 0, 300, 1, '', 0, 1, '', '2021-08-20 21:03:47'),
(55, 'DONT REMERA TOP NOCHE T1', 'TALLE 1', 'PMU09P01092', 1, 0, 0, 1, 0, 300, 0, '', 0, 1, '', '2021-08-17 22:29:01'),
(56, 'DONT REMERA TOP NOCHE T 2', 'TALLE 2', 'PMU09P01092', 1, 0, 0, 3, 0, 300, 0, '', 0, 1, '', '2021-08-17 22:29:37'),
(57, 'AZULINA MUSCULOSA CON ENCAJE T1', 'TALLE 1', '330009133', 1, 0, 0, 2, 0, 300, 0, '', 0, 1, '', '2021-08-17 22:30:55'),
(58, 'AZULINA MUSCULOSA CON ENCAJE T3', 'TALLE 3', '330009133', 1, 0, 0, 2, 0, 300, 0, '', 0, 1, '', '2021-08-17 22:31:45'),
(59, 'VALENTINO REMERA MANGAS LARGAS T1', 'TALLE 1 NEGRO', 'PMU09P05000', 1, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-17 22:35:23'),
(60, 'BELL REMERA CAMPAN T2', 'TALLE 2', '30B609144', 1, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-17 22:36:41'),
(61, 'JAQUIES REMERA T1', 'TALLE 1', '327809150', 1, 0, 0, 3, 0, 1600, 0, '', 0, 1, '', '2021-08-17 22:38:23'),
(62, 'JAQUIES REMERA T 2', 'TALLE 2', '327809150', 1, 0, 0, 3, 0, 1600, 0, '', 0, 1, '', '2021-08-17 22:38:55'),
(63, 'JAQUIES REMERA T3', 'TALLE 3', '327809150', 1, 0, 0, 1, 0, 1600, 1, '', 0, 1, '', '2021-09-08 13:51:36'),
(64, 'EUGENIA VESTIDO NOCHE CORTO T2', 'TALLE2', '310014066', 1, 0, 0, 1, 0, 1799, 0, '', 0, 1, '', '2021-08-17 22:42:29'),
(65, 'BELTRAME POLLERA SEMI LARGA T1', 'TALLE 1', '290002022', 1, 0, 0, 1, 0, 950, 0, '', 0, 1, '', '2021-08-17 22:44:02'),
(66, 'MATT POLLERA GAZA T1', 'TALLE1', '330002010', 1, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-17 22:45:11'),
(67, 'MIGUI VESTIDO CORTO T1', 'TALLE 1', '310014048', 1, 0, 0, 1, 0, 1650, 0, '', 0, 1, '', '2021-08-17 22:46:16'),
(68, 'GALAXIA MUSCULOSA T2', 'TALLE 2', '330009155', 1, 0, 0, 1, 0, 200, 0, '', 0, 1, '', '2021-08-17 22:47:59'),
(69, 'REMERA FUNCH TM', 'TALLE M', '082267', 1, 0, 0, 1, 0, 300, 0, '', 0, 1, '', '2021-08-17 22:50:16'),
(70, 'CLEO MUSCULOSA DIA T2', 'TALLE 2', 'PMU28P01342A', 1, 0, 0, 1, 0, 200, 0, '', 0, 1, '', '2021-08-17 22:52:50'),
(71, 'CLAUS MUSCULOSA TOP ESTAMPADO T1', 'TALLE 1', '330009040', 1, 0, 0, 3, 0, 200, 0, '', 0, 1, '', '2021-08-17 22:53:49'),
(72, 'CLAUS MUSCULOSA TOP ESTAMPADO T2', 'TALLE 2', '330009040', 1, 0, 0, 1, 0, 200, 0, '', 0, 1, '', '2021-08-17 22:54:48'),
(73, 'LEXI MUSCULOSA PARA ATAR T3', 'TALLE 3', '290009043', 1, 0, 0, 2, 0, 200, 0, '', 0, 1, '', '2021-08-17 22:55:49'),
(74, 'DANDY MUSCULOSA T2', 'TALLE 2', '315809061', 1, 0, 0, 1, 0, 200, 0, '', 0, 1, '', '2021-08-17 22:56:42'),
(75, 'JUDE TOP SUEDE T2', 'TALLE 2', '290009105', 1, 0, 0, 1, 0, 250, 0, '', 0, 1, '', '2021-08-17 22:57:26'),
(76, 'FAINTINI CAMISA ESCOCESA T2', 'TALLE 1', '305823014', 1, 0, 0, 0, 0, 900, 1, '', 0, 1, '', '2021-08-20 20:47:58'),
(77, 'PIERRE POLERA ML CUELLO ALTO T2', 'TALLE 2', '320009054', 1, 0, 0, 1, 0, 950, 0, '', 0, 1, '', '2021-08-17 22:59:36'),
(78, 'SOLCITO REMERON T3', 'TALLE 3', '310009083', 1, 0, 0, 1, 0, 600, 0, '', 0, 1, '', '2021-08-17 23:00:22'),
(79, 'DUNET VESTIDO NOCHE NUDE T1', 'TALLE 1', '330014051', 1, 0, 0, 1, 0, 450, 0, '', 0, 1, '', '2021-08-17 23:01:11'),
(80, 'DENIMA VESTIDO T1', 'TALLE 1 NEGRO', '320014024', 1, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-18 13:26:04'),
(81, 'ROSIES CAMISA ML CON BORDADO T2', 'TALLE 2', '330003003', 1, 0, 0, 2, 0, 900, 0, '', 0, 1, '', '2021-08-17 23:03:10'),
(82, 'REMERA KRITI TM', 'TALLE M', '083782A', 1, 0, 0, 1, 0, 900, 0, '', 0, 1, '', '2021-08-17 23:04:18'),
(83, 'VESTIDO TUVO MANGAS CORTAS PURMAR T 1', 'TALLE  1', '4027', 1, 0, 0, 1, 0, 300, 0, '', 0, 1, '', '2021-08-18 13:33:40'),
(84, 'SALIMA MONO PRENDA LARGA T 1', 'TALLE 1', '290016023', 1, 0, 0, 1, 0, 900, 0, '', 0, 1, '', '2021-08-18 13:35:01'),
(85, 'SALIMA MONO PRENDA LARGA T 2', 'TALLE 2', '290016023', 1, 0, 0, 1, 0, 900, 0, '', 0, 1, '', '2021-08-18 13:35:38'),
(86, 'SELVATIC MONO PRENDA T1', 'TALLE1', '290016028', 1, 0, 0, 1, 0, 1900, 0, '', 0, 1, '', '2021-08-18 13:37:25'),
(87, 'HAPPY MUSCULOSA DE GAZA T3', 'TALLE 3', 'INDU87', 1, 0, 0, 1, 0, 300, 0, '', 0, 1, '', '2021-08-18 13:38:33'),
(88, 'TOP ROMEA T S', 'TALLE S', '121920AA', 1, 0, 0, 1, 0, 790, 0, '', 0, 1, '', '2021-08-18 13:40:19'),
(89, 'POLLERITA SWEET NEGRO/BORDO TS', 'TALLE S', '.', 1, 0, 0, 1, 0, 300, 0, '', 0, 1, '', '2021-08-18 13:44:02'),
(90, 'POLLERITA SWEET NEGRO/BORDO TM', 'TALLE M', '.', 1, 0, 0, 1, 0, 300, 0, '', 0, 1, '', '2021-08-18 13:44:28'),
(91, 'LOLY ROCKY BROOKEN T 32', 'TALLE 32', '061589CC', 1, 0, 0, 0, 0, 500, 1, '', 0, 1, '', '2021-08-20 15:32:40'),
(92, 'NICKY GRACE PIGMENTO T 24', 'TALLE 24', '061635CC', 1, 0, 0, 2, 0, 500, 0, '', 0, 1, '', '2021-08-18 13:47:04'),
(93, 'LOLI HIGH ADELE T 26', 'TALLE 26', '061536', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-18 13:49:41'),
(94, 'LOLI ANIMAL T24', 'TALLE 24', '061313', 1, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-18 13:50:56'),
(95, 'BLUSAS HIDE T S', 'TALLE S', '210379AA', 1, 0, 0, 1, 0, 1500, 0, '', 0, 1, '', '2021-08-18 13:52:04'),
(96, 'BLUSA IDAPOR T S', 'TALLE S', '210342', 1, 0, 0, 0, 0, 1200, 1, '', 0, 1, '', '2021-09-01 22:09:42'),
(97, 'BLUSA JALES T M', 'TALLE M', '210243AA', 1, 0, 0, 0, 0, 1000, 2, '', 0, 1, '', '2021-09-01 22:09:42'),
(98, 'BLUSA SEARA T M', 'TALLE M', '210325AA', 1, 0, 0, 0, 0, 1200, 1, '', 0, 1, '', '2021-08-26 14:41:13'),
(99, 'COLLAR TRIANGULO', '.', '3000', 3, 0, 0, 1, 0, 600, 0, '', 0, 1, '', '2021-08-18 14:31:49'),
(100, 'COLLAR PERLA', '.', '615', 3, 0, 0, 1, 0, 540, 0, '', 0, 1, '', '2021-08-18 14:32:23'),
(101, 'COLLAR CIRCULAR', '.', '10010', 3, 0, 0, 1, 0, 699, 0, '', 0, 1, '', '2021-08-18 14:33:27'),
(102, 'COLLAR CANASTA', '.', '1010', 3, 0, 0, 1, 0, 800, 0, '', 0, 1, '', '2021-08-18 14:34:03'),
(103, 'HEBILLA MOñITO ROJO', '.', 'IP25519', 3, 0, 0, 1, 0, 120, 0, '', 0, 1, '', '2021-08-18 14:37:18'),
(104, 'HEBILLA MOñITO ROSA', '.', 'VB29593', 3, 0, 0, 1, 0, 100, 0, '', 0, 1, '', '2021-08-18 14:38:05'),
(105, 'PAZ COLLAR PARA CABEZA', '.', '299211003AAA', 3, 0, 0, 1, 0, 190, 0, '', 0, 1, '', '2021-08-18 14:39:00'),
(106, 'COLLAR PERLITAS DE COLORES', '.', '.8', 3, 0, 0, 3, 0, 310, 0, '', 0, 1, '', '2021-08-18 14:40:27'),
(107, 'DAY BACK SIN COLOR', '.', '295510053', 3, 0, 0, 1, 0, 140, 0, '', 0, 1, '', '2021-08-18 14:41:16'),
(108, 'TRINA TATOO BLANCO', '.', '3100110010', 3, 0, 0, 1, 0, 290, 0, '', 0, 1, '', '2021-08-18 14:42:22'),
(109, 'FUNNY PINS X4', '.', '301210013', 3, 0, 0, 1, 0, 150, 0, '', 0, 1, '', '2021-08-18 14:43:16'),
(110, 'VINCHA NEGRA', '.', 'vincha', 3, 0, 0, 1, 0, 200, 0, '', 0, 1, '', '2021-08-18 14:44:48'),
(111, 'PEACE PACK CON DIJE', '.', '29551005316', 3, 0, 0, 1, 0, 220, 0, '', 0, 1, '', '2021-08-18 14:46:01'),
(112, 'SHOPIE BLACK COLLAR', '.', '304610001', 3, 0, 0, 1, 0, 260, 0, '', 0, 1, '', '2021-08-18 14:47:22'),
(113, 'ANILLOS MUAA', '.', 'anillos', 3, 0, 0, 2, 0, 120, 0, '', 0, 1, '', '2021-08-18 14:48:10'),
(114, 'SUMMER AROS ACRILICOS CON FORMA', '.', '299211002', 3, 0, 0, 1, 0, 120, 0, '', 0, 1, '', '2021-08-18 14:49:11'),
(115, 'MARRA KECH AROS', '.', '267610012', 3, 0, 0, 1, 0, 199, 0, '', 0, 1, '', '2021-08-18 14:51:28'),
(116, 'AROS COLGANTES SWEET', '.', '1016', 3, 0, 0, 1, 0, 400, 0, '', 0, 1, '', '2021-08-18 14:52:53'),
(117, 'AROS COLGANTES PLATADOS', '.', '10161', 3, 0, 0, 1, 0, 520, 0, '', 0, 1, '', '2021-08-18 14:53:26'),
(118, 'AROS ARGOLLAS', '.', '10162', 3, 0, 0, 1, 0, 520, 0, '', 0, 1, '', '2021-08-18 14:54:14'),
(119, 'ARGOLLAS DORADAS', '.', '385', 3, 0, 0, 3, 0, 500, 0, '', 0, 1, '', '2021-08-18 14:55:21'),
(120, 'PUCERA/TOBILLERA', '.', '614', 3, 0, 0, 1, 0, 400, 0, '', 0, 1, '', '2021-08-18 14:56:25'),
(121, 'PULSERA DORADA CON PERLITAS', '.', 'mg229669', 3, 0, 0, 1, 0, 400, 0, '', 0, 1, '', '2021-08-18 14:57:15'),
(122, 'PULSERAS CON DIJES', '.', '799021', 3, 0, 0, 2, 0, 500, 0, '', 0, 1, '', '2021-08-18 14:58:41'),
(123, 'PULSERA NEGRA CON DIJE', '.', '307504', 3, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-18 20:49:14'),
(124, 'PULSERA CON DIJE AZUL', '.', '258974', 3, 0, 0, 2, 0, 450, 0, '', 0, 1, '', '2021-08-18 20:50:43'),
(125, 'HOLDERS CADENA', '.', '2101', 3, 0, 0, 2, 0, 600, 1, '', 0, 1, '', '2021-09-06 20:54:16'),
(126, 'HOLDERS TRENSADO', '.', '2105', 3, 0, 0, 2, 0, 600, 1, '', 0, 1, '', '2021-08-25 13:59:14'),
(127, 'ALICATE BUO VERDE', 'VERDE BUO', 'RQ102466', 3, 0, 0, 1, 0, 350, 0, '', 0, 1, '', '2021-08-18 20:54:49'),
(128, 'SET CORTA UÑAS TORRE', 'DIBUJO TORRE', 'MOON ACCESORIOS', 3, 0, 0, 1, 0, 700, 0, '', 0, 1, '', '2021-08-18 20:56:01'),
(129, 'SET BUO LILA', 'SET CON ESPEJITO', 'SETCORTAUÑAS', 3, 0, 0, 1, 0, 700, 0, '', 0, 1, '', '2021-08-18 20:57:43'),
(130, 'ESPEJITO ESTAMPADO', '.', 'RQ102491', 3, 0, 0, 1, 0, 400, 0, '', 0, 1, '', '2021-08-18 21:00:49'),
(131, 'ESPEJITO SANDIA', '.', 'RQ102494', 3, 0, 0, 1, 0, 400, 0, '', 0, 1, '', '2021-08-18 21:01:34'),
(132, 'MONERERITO MARRON', '.', 'MONE', 3, 0, 0, 1, 0, 100, 0, '', 0, 1, '', '2021-08-18 21:02:40'),
(133, 'LLAVERO POMPOM DE COLORES', '.', '8286', 3, 0, 0, 1, 0, 600, 0, '', 0, 1, '', '2021-08-18 21:03:19'),
(134, 'MONEDERITO OSITO', '.', '8216', 3, 0, 0, 1, 0, 250, 0, '', 0, 1, '', '2021-08-18 21:03:58'),
(135, 'LLAVERO PERRITO', '.', '8289', 3, 0, 0, 1, 0, 600, 0, '', 0, 1, '', '2021-08-18 21:04:28'),
(136, 'LLAVERO ELEFANTE', '.', 'LLAVERO E', 3, 0, 0, 1, 0, 700, 0, '', 0, 1, '', '2021-08-18 21:05:04'),
(137, 'LLAVERO FLOR', 'BLANCO', '1917', 3, 0, 0, 1, 0, 400, 0, '', 0, 1, '', '2021-08-18 21:05:37'),
(138, 'LLAVERO UNICORNIO', '.', '8281', 3, 0, 0, 1, 0, 600, 0, '', 0, 1, '', '2021-08-18 21:06:22'),
(139, 'CARPETA GRANDE OJITOS', '.', 'muaa', 3, 0, 0, 2, 0, 300, 0, '', 0, 1, '', '2021-08-18 21:12:42'),
(140, 'CARPETA GRANDE CIERRE', 'ESTAMPADO', 'art 01315526', 3, 0, 0, 5, 0, 500, 0, '', 0, 1, '', '2021-08-18 21:14:21'),
(141, 'CARPETA CHICHA CON CIERRE', 'ROSA', 'art01315591', 3, 0, 0, 1, 0, 700, 0, '', 0, 1, '', '2021-08-18 21:15:33'),
(142, 'CARPETA PARA DIBUJO', 'MUAA', 'carp', 3, 0, 0, 5, 0, 299, 0, '', 0, 1, '', '2021-08-18 21:17:12'),
(143, 'CUADERNO ANILLOS', 'MUAA', 'cuad', 3, 0, 0, 3, 0, 499, 0, '', 0, 1, '', '2021-08-18 21:18:41'),
(144, 'SEPARADORES', 'UNICORNIOS', 'sep', 3, 0, 0, 14, 0, 200, 0, '', 0, 1, '', '2021-08-18 21:22:14'),
(145, 'CARTUCHERA EVERLAST LILA', 'LILA', '11244', 3, 0, 0, 0, 0, 700, 1, '', 0, 1, '', '2021-09-06 23:02:21'),
(146, 'CARTUCHERA EVERLAST FUCSIA', 'FUCSIA', '11245', 3, 0, 0, 1, 0, 1100, 1, '', 0, 1, '', '2021-08-25 14:53:06'),
(147, 'CARTUCHERA TRANDY REDONDA', 'REDONDA', '11239', 3, 0, 0, 2, 0, 750, 0, '', 0, 1, '', '2021-08-18 21:25:28'),
(148, 'CARTUCHERA CUADRADA MUAA', 'MUAA', 'UA200', 3, 0, 0, 1, 0, 499, 0, '', 0, 1, '', '2021-08-18 21:26:31'),
(149, 'BOLSO NATIVA DORADO', '.', '773715', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-18 21:39:11'),
(150, 'CARTERA NATIVA CELESTE CON TACHAS', '.', '15341', 4, 0, 0, 1, 0, 2400, 0, '', 0, 1, '', '2021-08-18 21:40:11'),
(151, 'CARTERA PLATEADA', '.', '190935', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-18 21:42:00'),
(152, 'CARTERA GAMUZADA MARRON', '.', '76875.6', 4, 0, 0, 0, 0, 1900, 1, '', 0, 1, '', '2021-08-25 14:53:06'),
(153, 'CARTERA NATIVA NEGRA', '.', '1763', 4, 0, 0, 1, 0, 2900, 0, '', 0, 1, '', '2021-08-18 21:43:32'),
(154, 'BANDOLERA NATIVA', 'CRUDO/ROJO', '8035', 4, 0, 0, 2, 0, 2900, 0, '', 0, 1, '', '2021-08-18 21:44:38'),
(155, 'MORRAL CRUDO TACHAS', '.', '39313', 4, 0, 0, 1, 0, 2250, 0, '', 0, 1, '', '2021-08-18 21:45:32'),
(156, 'BANDOLERA NATIVA MARRON', 'MARRON', '9005', 4, 0, 0, 1, 0, 2200, 0, '', 0, 1, '', '2021-08-18 21:46:25'),
(157, 'MORRAL CUPLIN', 'AZUL/GRIS', '532', 4, 0, 0, 1, 0, 900, 1, '', 0, 1, '', '2021-09-03 22:16:46'),
(158, 'MORRAL ROJO NATIVA', '.', '605', 4, 0, 0, 1, 0, 900, 0, '', 0, 1, '', '2021-08-18 21:47:44'),
(159, 'MORRAL ROSA NATIVA', '.', '451', 4, 0, 0, 1, 0, 1000, 0, '', 0, 1, '', '2021-08-18 21:48:17'),
(160, 'MORRAL NEGRO NATIVA', '.', '452', 4, 0, 0, 1, 0, 700, 0, '', 0, 1, '', '2021-08-18 21:48:49'),
(161, 'PORTA MATE COLORES', 'OFERTA', '4000.1', 4, 0, 0, 1, 0, 790, 0, '', 0, 1, '', '2021-08-18 21:49:26'),
(162, 'KIT MATERO CIRCULARES', '.', '4005', 4, 0, 0, 2, 0, 5500, 0, '', 0, 1, '', '2021-08-18 21:50:13'),
(163, 'KIT MATERO RECTANGULARES', '.', '4008', 4, 0, 0, 3, 0, 5500, 0, '', 0, 1, '', '2021-08-18 21:51:01'),
(164, 'CARTERA TRENDY PLATA', '.', '20110', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-18 21:51:54'),
(165, 'CARTERA NATIVA DORADA', '.', '25760', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-18 21:52:28'),
(166, 'BANDOLERA NATIVA BLANCA', '.', '10943', 4, 0, 0, 1, 0, 2100, 0, '', 0, 1, '', '2021-08-18 21:53:10'),
(167, 'PORTACOSMETICO ESTAMPADO TRENDY', '.', '9899', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-18 21:54:02'),
(168, 'CARTERA COMBINADA TACHAS COLORES', '.', '19094', 4, 0, 0, 1, 0, 3000, 0, '', 0, 1, '', '2021-08-18 21:54:41'),
(169, 'MORRAL BOSSI', '.', '8679', 4, 0, 0, 1, 0, 1900, 0, '', 0, 1, '', '2021-08-18 21:55:15'),
(170, 'CARTERA DE MANO HOMBRE NEGRO', 'EL PALACIO', '49/1', 4, 0, 0, 1, 0, 1500, 0, '', 0, 1, '', '2021-08-18 21:56:10'),
(171, 'CARTERA DE MANO HOMBRE CHICO', 'EL PALACIO', '541', 4, 0, 0, 1, 0, 1900, 0, '', 0, 1, '', '2021-08-26 12:37:48'),
(172, 'MORRAL PEITON', '.', '8068', 4, 0, 0, 2, 0, 2100, 0, '', 0, 1, '', '2021-08-18 21:58:04'),
(173, 'MORRAL CON TACHAS ROSA', 'NATIVA', '786535', 4, 0, 0, 1, 0, 1490, 0, '', 0, 1, '', '2021-08-18 21:58:44'),
(174, 'MOCHILITA MOUNSTRO', ',', '8254', 4, 0, 0, 3, 0, 1200, 0, '', 0, 1, '', '2021-08-18 21:59:24'),
(175, 'MOCHILITA NATIVA', '.', '9233.4', 4, 0, 0, 1, 0, 2100, 0, '', 0, 1, '', '2021-08-18 22:00:32'),
(176, 'BANDOLERA NATIVA MARRON CON TACHAS', '.', '39317', 4, 0, 0, 1, 0, 1490, 0, '', 0, 1, '', '2021-08-18 22:01:18'),
(177, 'MOCHILA AZUL METALIZADA', '.', '0369.9', 4, 0, 0, 1, 0, 2100, 0, '', 0, 1, '', '2021-08-18 22:02:03'),
(178, 'MOCHILITA MARRON CON TACHITAS', '.', '2014', 4, 0, 0, 0, 0, 2100, 1, '', 0, 1, '', '2021-09-08 13:54:03'),
(179, 'CARTERA NATIVA VISóN TRENZADA', '.', '8205', 4, 0, 0, 1, 0, 2800, 0, '', 0, 1, '', '2021-08-18 22:03:43'),
(180, 'SOBRE NATIVA', 'HUESO/MARRON', '1200.2', 4, 0, 0, 2, 0, 600, 0, '', 0, 1, '', '2021-08-18 22:04:40'),
(181, 'CARTERA DE MANO NEGRA', 'EL PALACIO', '54', 4, 0, 0, 0, 0, 3200, 1, '', 0, 1, '', '2021-09-02 21:12:15'),
(182, 'CARTERA DE MANO NEGRO', 'EL PALACIO', '52', 4, 0, 0, 1, 0, 3200, 0, '', 0, 1, '', '2021-08-18 22:07:05'),
(183, 'BOLSO CARTERA TACHAS NATIVA', '.', '15912', 4, 0, 0, 1, 0, 3600, 0, '', 0, 1, '', '2021-08-18 22:07:46'),
(184, 'CARTERA BOLSO TRENDY CORAZONES', '.', '20352', 4, 0, 0, 1, 0, 4300, 0, '', 0, 1, '', '2021-08-18 22:08:31'),
(185, 'MORRAL BOSSI NEGRO', '.', '8244', 4, 0, 0, 1, 0, 1900, 0, '', 0, 1, '', '2021-08-18 22:09:12'),
(186, 'MORRAL PEITON', '.', '8065', 4, 0, 0, 1, 0, 2100, 0, '', 0, 1, '', '2021-08-18 22:09:53'),
(187, 'MORRAL PEITON', '.', '8066', 4, 0, 0, 2, 0, 2100, 0, '', 0, 1, '', '2021-08-18 22:10:33'),
(188, 'MORRAL BEIGE BRILLITO CON GRIS', '.', '360', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-18 22:12:12'),
(189, 'MORRAL ECO CUERO MARRON', '.', '68.1', 4, 0, 0, 1, 0, 2700, 0, '', 0, 1, '', '2021-08-18 22:13:55'),
(190, 'MORRAL ECO CUERO MARRON', '.', '69.1', 4, 0, 0, 1, 0, 2700, 0, '', 0, 1, '', '2021-08-18 22:14:39'),
(191, 'CARTERA BOLSITO', 'AQUA/MARRON/VERDE OSCURO', '600045', 4, 0, 0, 3, 0, 2400, 0, '', 0, 1, '', '2021-08-18 22:16:19'),
(192, 'BOLSITO FLOREADO', '.', '4055', 4, 0, 0, 1, 0, 2200, 0, '', 0, 1, '', '2021-08-18 22:17:14'),
(193, 'BOLSITO NATIVA DORADO', '.', '1009.4', 4, 0, 0, 1, 0, 2700, 0, '', 0, 1, '', '2021-08-18 22:17:44'),
(194, 'BOLSITO LOVE YOU NATIVA', '.', '8002.6', 4, 0, 0, 0, 0, 1550, 1, '', 0, 1, '', '2021-09-06 22:50:13'),
(195, 'PORTACOSMETICO TRANSPARENTE', 'CON LLAVES', '10560', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-18 22:20:54'),
(196, 'PORTACOSMETICO VERDE', '.', '10916', 4, 0, 0, 1, 0, 3900, 0, '', 0, 1, '', '2021-08-18 22:21:44'),
(197, 'PORTACOSMETICO 3PIEZAS', 'NEGRO', '8620', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-18 22:22:20'),
(198, 'CUADRITOS', '.', '10402', 4, 0, 0, 3, 0, 950, 0, '', 0, 1, '', '2021-08-18 22:23:23'),
(199, 'VASO HELADO AZUL', '.', '10975', 4, 0, 0, 1, 0, 1300, 0, '', 0, 1, '', '2021-08-18 22:26:25'),
(200, 'VASO UNICORNIO', '.', '10982', 4, 0, 0, 0, 0, 1300, 1, '', 0, 1, '', '2021-09-02 21:12:15'),
(201, 'VASO FRUTA', '.', '10979', 4, 0, 0, 4, 0, 1100, 0, '', 0, 1, '', '2021-08-18 22:27:53'),
(202, 'MALETIN AZUL', '.', '172/45', 4, 0, 0, 1, 0, 4800, 0, '', 0, 1, '', '2021-08-18 22:30:03'),
(203, 'MOCHILA NATIVA TACHA REDONDA EN MEDIO', '.', '2943', 4, 0, 0, 3, 0, 5500, 0, '', 0, 1, '', '2021-08-18 22:31:05'),
(204, 'BANDOLERA CARTERA NATIVA VARIOS CIERRES', '.', '154975', 4, 0, 0, 2, 0, 3200, 0, '', 0, 1, '', '2021-08-18 22:32:23'),
(205, 'FUTURE MOCHILA DE SINTETICO (MUAA)', '.', 'OMU10P00479A', 4, 0, 0, 1, 0, 2300, 0, '', 0, 1, '', '2021-08-18 22:33:20'),
(206, 'CARTERA NATIVA BLANDA', '.', '18565', 4, 0, 0, 1, 0, 1990, 0, '', 0, 1, '', '2021-08-18 22:34:07'),
(207, 'CUELLITO ALMOHADA GRUESO', '.', '10841', 4, 0, 0, 2, 0, 2500, 0, '', 0, 1, '', '2021-08-18 22:35:02'),
(208, 'CUELLITO ALMOHADA', '.', '10044', 4, 0, 0, 3, 0, 1500, 0, '', 0, 1, '', '2021-08-18 22:35:52'),
(209, 'LONCHERAS', '.', '8636', 4, 0, 0, 3, 0, 2400, 0, '', 0, 1, '', '2021-08-18 22:36:32'),
(210, 'PORTA COSMETCOS TRENDY', '.', '8579', 4, 0, 0, 3, 0, 990, 0, '', 0, 1, '', '2021-08-18 22:37:32'),
(211, 'PORTA COSMETICOS TRENDY', '.', '8612', 4, 0, 0, 2, 0, 900, 0, '', 0, 1, '', '2021-08-18 22:38:36'),
(212, 'PORTA COSMETICOS TRENDY', '.', '8580', 4, 0, 0, 3, 0, 900, 0, '', 0, 1, '', '2021-08-18 22:39:25'),
(213, 'NECESER ESTAMPADO NATIVA', '.', '2455·9', 4, 0, 0, 4, 0, 900, 0, '', 0, 1, '', '2021-08-18 22:40:32'),
(214, 'CARTERA CUERO ROSA', '.', 'K39', 4, 0, 0, 1, 0, 4700, 0, '', 0, 1, '', '2021-08-18 22:41:07'),
(215, 'BANDOLERA ROSA NATIVA TACHAS', '.', '152072', 4, 0, 0, 1, 0, 2200, 0, '', 0, 1, '', '2021-08-18 22:41:53'),
(216, 'MOCHILITA CHAROL CRAQUELADA BORDO', '.', '9233·9', 4, 0, 0, 0, 0, 2100, 1, '', 0, 1, '', '2021-09-03 22:20:01'),
(217, 'CARTERA REPTIL', '.', '15913·9', 4, 0, 0, 1, 0, 1500, 0, '', 0, 1, '', '2021-08-18 22:44:05'),
(218, 'BANDOLERA AQUA', '.', 'BANAQUA', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-18 22:45:57'),
(219, 'MALETIN NEGRO', '.', '172/18', 4, 0, 0, 1, 0, 4500, 0, '', 0, 1, '', '2021-08-18 22:46:32'),
(220, 'MALETIN TRAVEL TECH', '.', '19606', 4, 0, 0, 5, 0, 3900, 0, '', 0, 1, '', '2021-08-18 22:47:30'),
(221, 'MOCHILITA FLECOS GAMUZA VERDE MILITAR', '.', '17290·3', 4, 0, 0, 0, 0, 1650, 1, '', 0, 1, '', '2021-09-04 15:25:00'),
(222, 'MOCHILITA MARRON NATIVA', '.', '18420', 4, 0, 0, 0, 0, 1950, 1, '', 0, 1, '', '2021-08-26 21:29:07'),
(223, 'MOCHILA METALIZADA', '.', '2942·4', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-08-18 22:49:45'),
(224, 'MOCHILITA MARRON NATIVA', '.', '951', 4, 0, 0, 0, 0, 2100, 1, '', 0, 1, '', '2021-08-20 20:33:23'),
(225, 'CARTERA ROJA XL', '.', 'XVBB52-50011', 4, 0, 0, 1, 0, 4200, 0, '', 0, 1, '', '2021-08-18 22:51:46'),
(226, 'CARTERA PLAYA INA MURAKAMI', '.', '8355', 4, 0, 0, 1, 0, 2100, 0, '', 0, 1, '', '2021-08-18 22:52:35'),
(227, 'MOCHILA AVENTURE (AZUL)', '.', 'COS-9008', 4, 0, 0, 2, 0, 2500, 0, '', 0, 1, '', '2021-08-18 22:53:28'),
(228, 'MOCHILA AVENTURE (GRIS)', '.', 'COS-9001', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-18 22:54:21'),
(229, 'BOLSO NATIVA NEGRO', '.', '11007·4', 4, 0, 0, 1, 0, 2900, 0, '', 0, 1, '', '2021-08-18 22:54:58'),
(230, 'BOLSO NATIVA PLATEADO', '.', '41010·4', 4, 0, 0, 2, 0, 2900, 0, '', 0, 1, '', '2021-08-18 22:55:38'),
(231, 'BOLSO NATIVA NEGRO', '.', '1106·4', 4, 0, 0, 1, 0, 2900, 0, '', 0, 1, '', '2021-08-18 22:56:19'),
(232, 'BOLSO GRANDE PLAYERO (PERRITO)', '.', '8000', 4, 0, 0, 2, 0, 3500, 0, '', 0, 1, '', '2021-08-18 22:57:06'),
(233, 'BOLSO PLAYERO A RAYAS', '.', '26029', 4, 0, 0, 2, 0, 2800, 0, '', 0, 1, '', '2021-08-18 22:58:08'),
(234, 'BOLSO ESTAMPADO', '.', '4135', 4, 0, 0, 0, 0, 2000, 1, '', 0, 1, '', '2021-08-24 20:20:44'),
(235, 'BOLSO GRANDE TELA ESTAMPADO', '.', '11061', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-08-18 22:59:52'),
(236, 'BOLSO PLAYERO', '.', '26387', 4, 0, 0, 1, 0, 2300, 0, '', 0, 1, '', '2021-08-18 23:00:34'),
(237, 'BOLSO MATERNAL', 'AZUL ROSA/ ROJO NEGRO/ AZUL', '7797', 4, 0, 0, 3, 0, 3990, 0, '', 0, 1, '', '2021-08-18 23:03:22'),
(238, 'BOLSO MATERNAL BABY MOÑITO', '.', '7357', 4, 0, 0, 2, 0, 3990, 0, '', 0, 1, '', '2021-08-18 23:04:19'),
(239, 'BOLSO MATERNAL PERRITO', '.', '7800', 4, 0, 0, 2, 0, 3990, 0, '', 0, 1, '', '2021-08-18 23:05:15'),
(240, 'BOLSO MATERNAL ESTRELLITAS', '.', '7796', 4, 0, 0, 2, 0, 3990, 0, '', 0, 1, '', '2021-08-18 23:05:59'),
(241, 'BOLSO MATERNAL', 'ROSA/ CELESTE', '7793', 4, 0, 0, 2, 0, 3990, 0, '', 0, 1, '', '2021-08-18 23:06:49'),
(242, 'MOCHILA NATIVA', 'OJITOS/ ESTAMPADO', '50025', 4, 0, 0, 2, 0, 1800, 0, '', 0, 1, '', '2021-08-18 23:07:31'),
(243, 'MOCHILA NATIVA TRIANGULAR', 'ESTAMPADO/ MICKEY', '6065', 4, 0, 0, 2, 0, 1800, 0, '', 0, 1, '', '2021-08-18 23:09:13'),
(244, 'MOCHILA RIVER', '.', 'MOCHIRIVER', 4, 0, 0, 1, 0, 1900, 0, '', 0, 1, '', '2021-08-18 23:10:08'),
(245, 'MOCHILA EVERLAST ROJO', '.', '26411', 4, 0, 0, 2, 0, 2900, 0, '', 0, 1, '', '2021-08-18 23:11:09'),
(246, 'BOTINERO EVERLAST', '.', '9845', 4, 0, 0, 1, 0, 1900, 0, '', 0, 1, '', '2021-08-18 23:11:43'),
(247, 'BOTINERO EVERLAST', '.', '9848', 4, 0, 0, 2, 0, 1900, 0, '', 0, 1, '', '2021-08-18 23:12:11'),
(248, 'MOCHILA CAMUFLADA NATIVA', '.', '755.7', 4, 0, 0, 1, 0, 2300, 0, '', 0, 1, '', '2021-08-19 12:16:57'),
(249, 'MOCHILA NATIVA', 'AZUL/AMARILLO/NEGRO', '2939', 4, 0, 0, 3, 0, 1800, 0, '', 0, 1, '', '2021-08-19 12:19:15'),
(250, 'MOCHILA NATIVA RUFLES ESTAMPADO', '.', '34745', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-08-19 12:20:45'),
(251, 'MOCHILA NATIVA ROJA AUTOS', '.', '4155', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-08-19 12:22:38'),
(252, 'MOCHILA TRENDY PERRITO', '.', '8001', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-19 12:23:43'),
(253, 'BOLSO NATIVA MARRON', '.', '407.4', 4, 0, 0, 0, 0, 2900, 1, '', 0, 1, '', '2021-08-31 22:15:22'),
(254, 'MOCHILA NATIVA CRUZADA', '.', '40155', 4, 0, 0, 2, 0, 1300, 0, '', 0, 1, '', '2021-08-19 12:25:13'),
(255, 'MOCHILA NATIVA', 'ROJO/ROSAFLUMAS', '47795', 4, 0, 0, 2, 0, 1200, 0, '', 0, 1, '', '2021-08-19 12:26:58'),
(256, 'BOLSO NATIVA ROJO', '.', '754.4', 4, 0, 0, 1, 0, 2900, 0, '', 0, 1, '', '2021-08-19 12:27:48'),
(257, 'MOCHILA VALIJITA ESCARABAJO ROJO', '.', 'WF709', 4, 0, 0, 1, 0, 4999, 0, '', 0, 1, '', '2021-08-19 12:28:47'),
(258, 'MOCHILA VALIJA DINOSAURIO', '.', 'DI031', 4, 0, 0, 1, 0, 4999, 0, '', 0, 1, '', '2021-08-19 12:29:46'),
(259, 'MOCHILA INDEPENDIENTE RUEDITAS', '.', 'IN012', 4, 0, 0, 1, 0, 5900, 0, '', 0, 1, '', '2021-08-19 12:30:51'),
(260, 'MOCHILA BOCA', '.', 'B0108', 4, 0, 0, 2, 0, 5500, 0, '', 0, 1, '', '2021-08-19 12:31:57'),
(261, 'MOCHILA RIVER CON RUEDITAS', '.', 'RI253', 4, 0, 0, 1, 0, 4500, 0, '', 0, 1, '', '2021-08-19 12:32:42'),
(262, 'MOCHILA MINIE CON RUEDITAS', '.', 'KM124', 4, 0, 0, 1, 0, 3200, 0, '', 0, 1, '', '2021-08-19 12:34:37'),
(263, 'MOCHILA PEPA', '.', 'MOCH PEPA', 4, 0, 0, 1, 0, 2600, 0, '', 0, 1, '', '2021-08-27 13:16:46'),
(264, 'MOCHILA CON RUEDITAS YOO HOO', '.', '.116', 4, 0, 0, 1, 0, 3800, 0, '', 0, 1, '', '2021-08-19 12:48:03'),
(265, 'MOCHILITA CON RUEDITAS CELESTE', 'YOO HOO', 'YH008', 4, 0, 0, 2, 0, 3800, 0, '', 0, 1, '', '2021-08-19 12:49:34'),
(266, 'MOCHILA CON RUEDITAS SOFIA Y HELENA', '.', 'SI628', 4, 0, 0, 1, 0, 3800, 0, '', 0, 1, '', '2021-08-19 12:50:47'),
(267, 'MOCHILA MICKEY MOUSE CON RUEDITAS', '.', 'KM032', 4, 0, 0, 2, 0, 3800, 0, '', 0, 1, '', '2021-08-19 12:51:36'),
(268, 'MOCHILITA MICHEY GAMUZITA', '.', 'KM112', 4, 0, 0, 1, 0, 3800, 0, '', 0, 1, '', '2021-08-19 12:52:15'),
(269, 'MOCHIA C/RUEDAS OSITO CARIÑOSO', '.', 'OS002', 4, 0, 0, 1, 0, 3800, 0, '', 0, 1, '', '2021-08-19 12:53:17'),
(270, 'MOCHILA CON RUEDITAS MINNIE', '.', 'KM017', 4, 0, 0, 1, 0, 3800, 0, '', 0, 1, '', '2021-08-19 12:53:55'),
(271, 'MOCHILITA DINOSAURIO', '.', 'CK573', 4, 0, 0, 2, 0, 2900, 0, '', 0, 1, '', '2021-08-19 12:54:53'),
(272, 'MOCHILA RIVER CHIQUITA', '.', 'RI154', 4, 0, 0, 2, 0, 2900, 0, '', 0, 1, '', '2021-08-19 12:56:05'),
(273, 'MOCHILA LENTEJUELAS', '.', '2938.1', 4, 0, 0, 3, 0, 2400, 1, '', 0, 1, '', '2021-08-28 14:27:07'),
(274, 'MOCHILA MEDIANA LENTEJUELAS', '.', '19077.1', 4, 0, 0, 0, 0, 2400, 1, '', 0, 1, '', '2021-08-28 20:23:19'),
(275, 'MOCHILITA COLORES', '.', '9234.4', 4, 0, 0, 5, 0, 2500, 1, '', 0, 1, '', '2021-09-03 22:20:01'),
(276, 'CARTERA TRENDY NEGRA', 'BRILLOSA TIPO CHAROL', '20367', 4, 0, 0, 1, 0, 3400, 0, '', 0, 1, '', '2021-08-19 13:00:47'),
(277, 'CARTERA VIA FINA MARRON', '.', '28103', 4, 0, 0, 1, 0, 4500, 0, '', 0, 1, '', '2021-08-19 13:01:24'),
(278, 'CARTERA BANDOLERA OJALES', 'NATIVA COLOR MANTECA', '61766', 4, 0, 0, 1, 0, 3900, 0, '', 0, 1, '', '2021-08-19 13:02:11'),
(279, 'BOLSITO GAMUZA BORDO', '.', '15497.6', 4, 0, 0, 1, 0, 1650, 0, '', 0, 1, '', '2021-08-19 13:03:04'),
(280, 'BOLSITO GAMUZA FUCSIA', '.', '9414.6', 4, 0, 0, 1, 0, 1450, 0, '', 0, 1, '', '2021-08-19 13:03:43'),
(281, 'BOLSITO GAMUZA MOSTAZA', '.', '368.6', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-19 13:04:23'),
(282, 'BOSITO GAMUZA MOSTAZA', '.', '15306.6', 4, 0, 0, 0, 0, 1600, 1, '', 0, 1, '', '2021-09-08 13:56:44'),
(283, 'MOCHILA NATIVA ESTAMPADAS', 'CARITAS/FLORSITAS', '53335', 4, 0, 0, 2, 0, 2500, 0, '', 0, 1, '', '2021-08-19 13:06:26'),
(284, 'MOCHILITA TRENDY ESTRELLAS', '.', '8103', 4, 0, 0, 1, 0, 3100, 0, '', 0, 1, '', '2021-08-19 13:07:08'),
(285, 'MOCHILA LILA UNICORNIO NATIVA', '.', '50015', 4, 0, 0, 2, 0, 2500, 0, '', 0, 1, '', '2021-08-19 13:08:42'),
(286, 'BOLSO DE VIAJE PEITON', '.', '8772', 4, 0, 0, 2, 0, 2200, 0, '', 0, 1, '', '2021-08-19 13:09:29'),
(287, 'MOCHILA NATIVA', '.', '523225', 4, 0, 0, 2, 0, 1890, 0, '', 0, 1, '', '2021-08-19 13:10:34'),
(288, 'MOCHILA TRENDY ROSA', '.', '8208', 4, 0, 0, 1, 0, 2100, 0, '', 0, 1, '', '2021-08-19 13:11:17'),
(289, 'MOCHILA MUAA', '.', '32S010010', 4, 0, 0, 3, 0, 2300, 1, '', 0, 1, '', '2021-08-25 14:17:59'),
(290, 'CARTERA LIMA GRIS', '.', 'H212', 4, 0, 0, 0, 0, 3900, 1, '', 0, 1, '', '2021-09-03 22:16:08'),
(291, 'MOCHILA NEGRA LIMA', '.', 'H269', 4, 0, 0, 1, 0, 5800, 0, '', 0, 1, '', '2021-08-19 13:13:44'),
(292, 'CARTERA VERDE AQUA', '.', '18835', 4, 0, 0, 1, 0, 1500, 0, '', 0, 1, '', '2021-08-19 13:14:29'),
(293, 'PORTA PAPELES', '.', 'ART08', 4, 0, 0, 0, 0, 1500, 1, '', 0, 1, '', '2021-09-07 22:52:31'),
(294, 'NECESER PIERRE CARDIN MARRON', '.', '10163', 4, 0, 0, 1, 0, 1700, 0, '', 0, 1, '', '2021-08-19 13:28:33'),
(295, 'NECESER PIERRE CARDIN NEGRO', '.', '10161', 4, 0, 0, 1, 0, 1000, 0, '', 0, 1, '', '2021-08-19 13:29:27'),
(296, 'BOLSO PLAYERO A RAYAS CON ALMOHADITA', '.', '26698', 4, 0, 0, 3, 0, 3500, 0, '', 0, 1, '', '2021-08-19 13:30:39'),
(297, 'BOLCITO TRENDY BRILLOSO', 'NEGRO/ MARRON/ PLATA', '19709', 4, 0, 0, 3, 0, 2700, 0, '', 0, 1, '', '2021-08-19 13:32:34'),
(298, 'MOCHILA TONASOLADA CHAROL PLATEADA', '.', '2942·4', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-19 13:33:37'),
(299, 'CARTERITA NATIVA HEBILLA', 'ROJO/ MARRON', '68225', 4, 0, 0, 2, 0, 2990, 0, '', 0, 1, '', '2021-08-19 13:34:29'),
(300, 'BANDOLERA NATIVA NEGRA HEBILLA', '.', '600046', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-08-19 13:35:20'),
(301, 'MOCHILITA NATIVA MARRON TACHAS', '.', '2936·2', 4, 0, 0, 1, 0, 2000, 0, '', 0, 1, '', '2021-08-19 13:36:58'),
(302, 'BANDOLERITA LIMA', 'SUELA', 'F037', 4, 0, 0, 1, 0, 3400, 0, '', 0, 1, '', '2021-08-19 13:37:59'),
(303, 'MOCHILA TRIANGULAR ESTRELLITAS, COLORES', '.', '1801·4', 4, 0, 0, 1, 0, 2600, 1, '', 0, 1, '', '2021-09-03 22:22:30'),
(304, 'CARTERITA REDONDA CELESTE CON TACHAS', '.', '1265', 4, 0, 0, 0, 0, 900, 1, '', 0, 1, '', '2021-09-07 22:53:08'),
(305, 'CUELLITO ALMOHADA', '.', '10101', 4, 0, 0, 1, 0, 1500, 0, '', 0, 1, '', '2021-08-19 13:40:38'),
(306, 'MOCHILA MATERNAL NEGRA TRENDY', '.', '20770', 4, 0, 0, 1, 0, 7000, 0, '', 0, 1, '', '2021-08-19 13:41:19'),
(307, 'BOLSO PLAYERO', 'DORADO/ CELESTE', '26692', 4, 0, 0, 2, 0, 2600, 0, '', 0, 1, '', '2021-08-19 13:42:05'),
(308, 'MOCHILITA NATIVA BORDO', '.', '2631', 4, 0, 0, 1, 0, 2000, 0, '', 0, 1, '', '2021-08-19 13:43:09'),
(309, 'MOCHILITA NATIVA MANTECA CON TACHITAS', '.', '9234', 4, 0, 0, 0, 0, 2100, 1, '', 0, 1, '', '2021-08-20 15:34:10'),
(310, 'MOCHILA CHAROL MEDIANA, COLORES', '.', '4384·4', 4, 0, 0, 2, 0, 2400, 0, '', 0, 1, '', '2021-08-19 13:44:43'),
(311, 'MOCHILA NATIVA NEGRA OJALES', '.', '2940', 4, 0, 0, 0, 0, 2700, 1, '', 0, 1, '', '2021-08-20 22:31:19'),
(312, 'MOCHILA MATERNAL', '.', '19321', 4, 0, 0, 2, 0, 3700, 0, '', 0, 1, '', '2021-08-19 13:50:04'),
(313, 'MOCHILA ALPINA DISCOVERY', '.', '19943', 4, 0, 0, 2, 0, 8900, 0, '', 0, 1, '', '2021-08-19 13:50:57'),
(314, 'BANDOLERITA BLANCA NATIVA', '.', '365', 4, 0, 0, 1, 0, 1990, 0, '', 0, 1, '', '2021-08-19 13:51:40'),
(315, 'BANDOLERA NEGRA INA MURAKAMI', '.', '11504', 4, 0, 0, 1, 0, 3100, 0, '', 0, 1, '', '2021-08-19 13:52:29'),
(316, 'CARTERA AMPLIA SENCILLLA NATIVA', 'MANTECA/ NEGRO', '18475', 4, 0, 0, 2, 0, 2990, 0, '', 0, 1, '', '2021-08-19 13:53:17'),
(317, 'CARTERA VIA FINA', '.', '63987', 4, 0, 0, 1, 0, 3800, 0, '', 0, 1, '', '2021-08-19 13:53:59'),
(318, 'CARTERA PIERRE CARDIN', 'BEIGE/ TACHAS', '20007', 4, 0, 0, 1, 0, 4000, 0, '', 0, 1, '', '2021-08-19 13:55:06'),
(319, 'CARTERA ZAPHIR BLANCA', '.', 'YG4275', 4, 0, 0, 1, 0, 4900, 0, '', 0, 1, '', '2021-08-19 13:55:47'),
(320, 'CARTERA TRENDY', 'ROSA/ NEGRO', '20530', 4, 0, 0, 2, 0, 5500, 0, '', 0, 1, '', '2021-08-19 13:56:29'),
(321, 'CARTERA LIMA', 'ROSA/ NEGRO', 'M339', 4, 0, 0, 1, 0, 6200, 1, '', 0, 1, '', '2021-09-03 22:16:08'),
(322, 'CARTERA TRENDY DETALLE BLANCO', '.', '19773', 4, 0, 0, 1, 0, 3200, 0, '', 0, 1, '', '2021-08-19 13:58:42'),
(323, 'CARTERA VIA FINA COLOR PIEL OSCURA', '.', '24839', 4, 0, 0, 1, 0, 4500, 0, '', 0, 1, '', '2021-08-19 13:59:35'),
(324, 'VALIJA CHICA FLOREADA', '.', '26066', 4, 0, 0, 1, 0, 8990, 0, '', 0, 1, '', '2021-08-19 14:00:32'),
(325, 'VALIJA  AZUL CHICA DISCOVERY', '.', '26468', 4, 0, 0, 1, 0, 8000, 0, '', 0, 1, '', '2021-08-19 14:01:13'),
(326, 'VALIJA FUCSIA CHICA', '.', '26257', 4, 0, 0, 1, 0, 8000, 0, '', 0, 1, '', '2021-08-19 14:01:48'),
(327, 'VALIJA AZUL OSCURA', '.', '26261', 4, 0, 0, 1, 0, 7500, 0, '', 0, 1, '', '2021-08-19 14:02:31'),
(328, 'VALIJA NEGRA DETALLE ROJO DISCOVERY', '.', '26465', 4, 0, 0, 1, 0, 8000, 0, '', 0, 1, '', '2021-08-19 14:04:46'),
(329, 'VALIJA MEDIANA AZUL OSCURA', '.', '26261', 4, 0, 0, 1, 0, 9900, 0, '', 0, 1, '', '2021-08-19 14:05:50'),
(330, 'VALIJA GRANDE AZUL OSCURA', '.', '26261', 4, 0, 0, 1, 0, 12000, 0, '', 0, 1, '', '2021-08-19 14:06:42'),
(331, 'VALIJA FUCSIA GRANDE', '.', '26257', 4, 0, 0, 1, 0, 12000, 0, '', 0, 1, '', '2021-08-19 14:07:16'),
(332, 'VALIJA EXIT NEGRA MEDIANA', '.', '.184', 4, 0, 0, 1, 0, 9900, 0, '', 0, 1, '', '2021-08-19 14:08:45'),
(333, 'VALIJA EJECUTIVA', '.', '26370', 4, 0, 0, 1, 0, 12000, 1, '', 0, 1, '', '2021-08-20 15:33:20'),
(334, 'VALIJA EJECUTIVA', '.', '26378', 4, 0, 0, 1, 0, 12000, 0, '', 0, 1, '', '2021-08-19 14:10:48'),
(335, 'MOCHILA VALIJA GRIS', '.', '26374', 4, 0, 0, 1, 0, 9300, 0, '', 0, 1, '', '2021-08-19 14:11:38'),
(336, 'MOCHILA MEDIANA LENTEJUELAS', '.', '2939·1', 4, 0, 0, 1, 0, 2600, 0, '', 0, 1, '', '2021-08-19 14:12:20'),
(337, 'MOCHILA ERACO VERDE OSCURO', '.', '2630·9', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-19 14:13:19'),
(338, 'MOCHILA CHAROL NEGRA', '.', '1999·4', 4, 0, 0, 2, 0, 2800, 0, '', 0, 1, '', '2021-08-19 14:19:51'),
(339, 'MOCHILA NATIVA PLUMAS ESTAMPADA', '.', '5300', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-08-19 14:20:32'),
(340, 'MOCHILA CAMUFLADA ROSA CON VERDE', '.', '5001·7', 4, 0, 0, 1, 0, 1990, 0, '', 0, 1, '', '2021-08-19 14:25:28'),
(341, 'BOLSITO GAMUZA LOVE', '.', '590·6', 4, 0, 0, 1, 0, 1350, 0, '', 0, 1, '', '2021-08-19 14:26:35'),
(342, 'ZAPHIR CARTERA BORDO TACHAS DORADAS', '.', 'YG4256', 4, 0, 0, 1, 0, 4200, 1, '', 0, 1, '', '2021-10-22 21:35:30'),
(343, 'MOCHILA TRENDY MATERNAL ROSA', '.', '20769', 4, 0, 0, 1, 0, 7000, 0, '', 0, 1, '', '2021-08-19 14:31:13'),
(344, 'BOLSO DE VIAJE SUPERBANG', '.', 'TN24469/25', 4, 0, 0, 3, 0, 2200, 0, '', 0, 1, '', '2021-08-19 14:32:15'),
(345, 'CARTERA ZAPHIR MANTECA', '.', 'SA2116', 4, 0, 0, 1, 0, 4650, 0, '', 0, 1, '', '2021-08-19 14:33:03'),
(346, 'BOLSO CON DETALLE CHAROL Y PONPON', '.', '26703', 4, 0, 0, 2, 0, 2990, 0, '', 0, 1, '', '2021-08-19 14:34:06'),
(347, 'BOLSO PLAYERO GIRLS CHIC A RAYAS', '.', '26694', 4, 0, 0, 1, 0, 1999, 0, '', 0, 1, '', '2021-08-19 14:35:03'),
(348, 'CARTERA CON OJALES MARRON NATIVA', '.', '18474', 4, 0, 0, 1, 0, 3800, 0, '', 0, 1, '', '2021-08-19 14:35:50'),
(349, 'MOCHILA TRENDY CORAZONES', '.', '9976', 4, 0, 0, 1, 0, 3100, 0, '', 0, 1, '', '2021-08-19 14:36:30'),
(350, 'MOCHILA TRENDY MARIPOSA BRILLOSA EN EL MEDIO', '.', '9989', 4, 0, 0, 1, 0, 3100, 0, '', 0, 1, '', '2021-08-19 14:37:26'),
(351, 'BOLSO NATIVA NEGRO', '.', '79767·4', 4, 0, 0, 0, 0, 2900, 1, '', 0, 1, '', '2021-09-08 13:44:40'),
(352, 'CARTERA MARRON TRENDY', '.', '20531', 4, 0, 0, 1, 0, 5500, 0, '', 0, 1, '', '2021-08-19 14:38:42'),
(353, 'CARTERA PIERRE CARDIN NEGRA CON FRANJAS ROJAS', '.', '20408', 4, 0, 0, 1, 0, 4700, 0, '', 0, 1, '', '2021-08-19 14:39:46'),
(354, 'CARTERA VIA FINA CADENITA', '.', '28089', 4, 0, 0, 1, 0, 4500, 0, '', 0, 1, '', '2021-08-19 14:40:17'),
(355, 'CARTERA VIA FINA TREBOL TACHAS', '.', '24838', 4, 0, 0, 1, 0, 4500, 0, '', 0, 1, '', '2021-08-19 15:01:06'),
(356, 'MOCHILA BORDO LIMA', '.', 'LA01', 4, 0, 0, 1, 0, 5800, 0, '', 0, 1, '', '2021-08-19 15:01:34'),
(357, 'MOCHILA DOBLE CIERRE NATIVA NEGRO', '.', '29320', 4, 0, 0, 0, 0, 4700, 1, '', 0, 1, '', '2021-08-26 21:12:51'),
(358, 'MOCHILA LIMA PLATEADA/ SUELA', '.', 'M266', 4, 0, 0, 2, 0, 5800, 0, '', 0, 1, '', '2021-08-19 15:03:20'),
(359, 'ALMOHADA CUELLITO', '.', '10150', 4, 0, 0, 2, 0, 1500, 0, '', 0, 1, '', '2021-08-19 15:03:58'),
(360, 'ALMOHADA CUELLITO', '.', '10151', 4, 0, 0, 1, 0, 1500, 0, '', 0, 1, '', '2021-08-19 15:04:29'),
(361, 'MOCHILA EVERLAST AZUL PLUMAS', '.', '26097', 4, 0, 0, 1, 0, 2900, 0, '', 0, 1, '', '2021-08-19 15:05:07'),
(362, 'MOCHILA EVERLAST COMBINADAS', 'RECTANGULAR', '20468', 4, 0, 0, 1, 0, 4900, 0, '', 0, 1, '', '2021-08-19 15:06:12'),
(363, 'MOCHILA EVERLAST VERDE', '.', '20488', 4, 0, 0, 1, 0, 3500, 0, '', 0, 1, '', '2021-08-19 15:07:02'),
(364, 'MOCHILA MATERNAL TRENDY AZUL', '.', '19320', 4, 0, 0, 2, 0, 3700, 0, '', 0, 1, '', '2021-08-19 15:08:08'),
(365, 'MOCHILA ESTAMPADO', 'VERDE CLARITO CON ROSA', '5300.7', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-08-19 15:10:21'),
(366, 'LONCHERA LILA UNICORNIO', '.', '8633', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-19 15:11:59'),
(367, 'BOLSITO CON CORREA ESTAMPADO', '.', '15318.7', 4, 0, 0, 0, 0, 1300, 2, '', 0, 1, '', '2021-08-31 20:48:23'),
(368, 'BOLSITO CELESTE ESTAMPADO', '.', '44155', 4, 0, 0, 1, 0, 2000, 0, '', 0, 1, '', '2021-08-19 15:13:56'),
(369, 'BOLSO DE VIAJE PEITON', '.', '8769', 4, 0, 0, 2, 0, 2200, 0, '', 0, 1, '', '2021-08-19 15:15:37'),
(370, 'DAFNE CARTERA XL', 'SUELA', 'XT9SDCO700312', 4, 0, 0, 1, 0, 5900, 0, '', 0, 1, '', '2021-08-19 15:16:58'),
(371, 'CARTERA LIMA MANTECA', '.', 'h207', 4, 0, 0, 1, 0, 3900, 0, '', 0, 1, '', '2021-08-19 20:52:09'),
(372, 'NECESER PARAGUAS', '.', '9983', 4, 0, 0, 1, 0, 2200, 0, '', 0, 1, '', '2021-08-19 20:53:47'),
(373, 'BANDOLERA LIMA MANTECA', 'CON TACHITAS', 'H277', 4, 0, 0, 1, 0, 4900, 0, '', 0, 1, '', '2021-08-19 20:54:44'),
(374, 'BANDOLERA ZAPHIR', 'NEGRA CON HEBILLA DORADA', 'JA7301', 4, 0, 0, 1, 0, 3800, 0, '', 0, 1, '', '2021-08-19 20:56:28'),
(375, 'NECESER ESTRELLAS', 'JUEGO DE 3 ESTUCHES', '8195', 4, 0, 0, 0, 0, 1500, 1, '', 0, 1, '', '2021-08-23 22:09:38'),
(376, 'CARTERITA INDÚ', '.', '40012', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-19 20:58:27'),
(377, 'CARTERA REPTIL', '.', '15913.9', 4, 0, 0, 0, 0, 1500, 1, '', 0, 1, '', '2021-08-21 21:53:48'),
(378, 'BANDOLERA NATIVA DOBLE CIERRE', '.', '1129', 4, 0, 0, 1, 0, 3400, 0, '', 0, 1, '', '2021-08-19 21:02:41'),
(379, 'BANDOLERA CHAROL', 'NEGRO /ROSA', '45427.4', 4, 0, 0, 2, 0, 2300, 0, '', 0, 1, '', '2021-08-19 21:05:16'),
(380, 'NECESER PIERRE CARDIN', 'VISON', '10159', 4, 0, 0, 1, 0, 1000, 0, '', 0, 1, '', '2021-08-19 21:05:54'),
(381, 'BANDOLERA COLOR HUESO', 'DETALLE CADENA', 'ARTYW267', 4, 0, 0, 1, 0, 2900, 0, '', 0, 1, '', '2021-08-19 21:07:22'),
(382, 'CARTERA BOLSO ROJO NATIVA', '.', '778435', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-19 21:08:17'),
(383, 'GORRITA EVERLAST', 'VERDE AQUA', '11012', 4, 0, 0, 1, 0, 1400, 0, '', 0, 1, '', '2021-08-19 21:08:57'),
(384, 'SOMBRERITO INAMURAKAMI', '.', '8347', 4, 0, 0, 0, 0, 900, 1, '', 0, 1, '', '2021-09-02 21:12:15'),
(385, 'SOMBRERO ZAPHIR', 'BLANCO C/ NEGRO', 'HAT11', 4, 0, 0, 2, 0, 700, 0, '', 0, 1, '', '2021-08-19 21:10:40'),
(386, 'PORTA CIGARRILLOS', '.', '.238C', 4, 0, 0, 7, 0, 990, 0, '', 0, 1, '', '2021-08-19 21:12:22'),
(387, 'TARJETERO BEIGE TRAVEL TECH', '.', '20421', 4, 0, 0, 1, 0, 1300, 0, '', 0, 1, '', '2021-08-19 21:13:56'),
(388, 'TARJETERO ROJO CUERO', '.', 'art7001', 4, 0, 0, 1, 0, 900, 0, '', 0, 1, '', '2021-08-19 21:15:01'),
(389, 'TARJETERO TRENDY BRILLO', '.', '50055', 4, 0, 0, 2, 0, 800, 0, '', 0, 1, '', '2021-08-19 21:15:54'),
(390, 'TARJETERO', 'AZUL/ROJO', '578', 4, 0, 0, 2, 0, 600, 0, '', 0, 1, '', '2021-08-19 21:16:43'),
(391, 'TARJETERO ESTAMPADO', '.', '.243tarj', 4, 0, 0, 2, 0, 600, 0, '', 0, 1, '', '2021-08-19 21:17:44'),
(392, 'BILLETERA HOMBRE EVERLAST', '.', '.244BH', 4, 0, 0, 5, 0, 1200, 0, '', 0, 1, '', '2021-08-19 21:23:12'),
(393, 'BANDOLERITA  MULTI USO', 'LIMA CON HEBILLA', 'F017', 4, 0, 0, 1, 0, 3400, 0, '', 0, 1, '', '2021-08-19 21:24:28'),
(394, 'PORTA DOCUMENTO', 'CHICO NEGRO SIMPLE', '146', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-19 21:25:24'),
(395, 'SOBRE LIMA PLATEADO', '.', 'F06', 4, 0, 0, 1, 0, 2600, 0, '', 0, 1, '', '2021-08-19 21:26:24'),
(396, 'SOBRE BANDOLERA', 'PLATEADO TRENDY', '8078', 4, 0, 0, 1, 0, 1600, 0, '', 0, 1, '', '2021-08-19 21:28:46'),
(397, 'SOBRE BANDOLERA ELEGANTE', 'TERNDY DORADO C/NEGRO', '8080', 4, 0, 0, 1, 0, 1350, 0, '', 0, 1, '', '2021-08-19 21:29:38'),
(398, 'SOBRE ELEGANTE', 'NEGRO CON BRILLO TRENDY', '8093', 4, 0, 0, 1, 0, 2100, 0, '', 0, 1, '', '2021-08-19 21:30:54'),
(399, 'SOBRE DORADO DESTELLO', '.', '8098', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-19 21:31:57'),
(400, 'SOBRE CHICO DORADO TRENDY', '.', '7343', 4, 0, 0, 1, 0, 2900, 0, '', 0, 1, '', '2021-08-19 21:32:48'),
(401, 'SOBRE NEGRO ANILLO PLATEADO', '.', '7339', 4, 0, 0, 1, 0, 2900, 0, '', 0, 1, '', '2021-08-19 21:33:49'),
(402, 'RELOJ SHIREL BLACK SWEET', '.', '700516NE', 4, 0, 0, 1, 0, 4500, 0, '', 0, 1, '', '2021-08-19 21:35:01'),
(403, 'BILLETERA CHIMOLA CORTA', '.', 'B69', 4, 0, 0, 4, 0, 2400, 0, '', 0, 1, '', '2021-08-19 21:36:12'),
(404, 'BILLETERA GRANDE ROJA', 'CON TACHAS TRENDY', '25972', 4, 0, 0, 1, 0, 2400, 0, '', 0, 1, '', '2021-08-19 21:37:22'),
(405, 'BILLETERA DOBLE CIERRE', 'LIMA NEGRO', 'I281', 4, 0, 0, 1, 0, 3300, 0, '', 0, 1, '', '2021-08-19 21:41:07'),
(406, 'BILLETERA CHIMOLA CAMUFLADA', 'LILA', 'B54', 4, 0, 0, 1, 0, 2400, 0, '', 0, 1, '', '2021-08-19 21:42:03'),
(407, 'BILLETERA TELA DOBLE CIERRE', '.', 'MB118', 4, 0, 0, 4, 0, 2000, 0, '', 0, 1, '', '2021-08-19 21:43:20'),
(408, 'BILLETERA BLANCA CHICA', '.', 'WL-44012-2', 4, 0, 0, 1, 0, 900, 0, '', 0, 1, '', '2021-08-19 21:45:22'),
(409, 'BILLETERA MARRON', '.', 'WL-44012', 4, 0, 0, 1, 0, 1300, 0, '', 0, 1, '', '2021-08-19 22:00:50'),
(410, 'BILLETERA MOSTAZA LIMA', '.', 'I213', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-19 22:01:38'),
(411, 'BILLETERA LIMA REPTIL', '.', 'I217', 4, 0, 0, 1, 0, 2200, 1, '', 0, 1, '', '2021-09-07 23:02:06'),
(412, 'BILLETERA LIMA MARRON', '.', 'I234', 4, 0, 0, 1, 0, 2600, 0, '', 0, 1, '', '2021-08-19 22:04:18'),
(413, 'BILLETERA FLOREADA MARRON', '.', '01245', 4, 0, 0, 1, 0, 1100, 0, '', 0, 1, '', '2021-08-19 22:05:36'),
(414, 'BILLETERA TELA SIMPLE', '.', 'NB117', 4, 0, 0, 2, 0, 1300, 0, '', 0, 1, '', '2021-08-19 22:06:51'),
(415, 'BILLETERA SIMPLE TRICOLOR', '.', '19580', 4, 0, 0, 2, 0, 1200, 0, '', 0, 1, '', '2021-08-19 22:08:08'),
(416, 'BILLETERA VIA FINA AZUL OSCURA', '.', '28595', 4, 0, 0, 1, 0, 2200, 0, '', 0, 1, '', '2021-08-19 22:09:06'),
(417, 'BILLETERA LIMA AZUL', '.', 'I166', 4, 0, 0, 1, 0, 2200, 0, '', 0, 1, '', '2021-08-19 22:09:46'),
(418, 'BILLETERA VIA FINA LUNARES', '.', '28587', 4, 0, 0, 2, 0, 1700, 0, '', 0, 1, '', '2021-08-19 22:10:37'),
(419, 'BILLETERA RETRO SIMPLE', '.', 'NB110', 4, 0, 0, 3, 0, 1300, 0, '', 0, 1, '', '2021-08-19 22:12:14'),
(420, 'KIT DE PINCELES', '.', 'art9585', 4, 0, 0, 2, 0, 800, 0, '', 0, 1, '', '2021-08-19 22:14:46'),
(421, 'ESPEJITOS PIERRE CARDIN', '.', '9384', 4, 0, 0, 2, 0, 700, 0, '', 0, 1, '', '2021-08-19 22:15:47'),
(422, 'SET DE MANICURA RANA VERDE', '.', '9702', 4, 0, 0, 1, 0, 700, 0, '', 0, 1, '', '2021-08-19 22:16:38'),
(423, 'SET DE MANICURA TRENDY', '.', '9693', 4, 0, 0, 2, 0, 800, 0, '', 0, 1, '', '2021-08-19 22:17:14'),
(424, 'SET MANICURA TRENDY BRILLO', '.', '10583', 4, 0, 0, 4, 0, 800, 0, '', 0, 1, '', '2021-08-19 22:18:09'),
(425, 'PORTA VINO', '.', 'we487', 3, 0, 0, 1, 0, 1400, 0, '', 0, 1, '', '2021-08-19 22:18:41'),
(426, 'JUEGO DE CUCHILLO Y TENEDOR', '.', 'art38', 4, 0, 0, 4, 0, 490, 0, '', 0, 1, '', '2021-08-19 22:19:28'),
(427, 'TABLA CON CUCHILLO Y TENEDOR', '.', '4900', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-08-19 22:21:44'),
(428, 'MUAA NIGHT X 50ML', '.', '316510001', 4, 0, 0, 4, 0, 800, 0, '', 0, 1, '', '2021-08-19 22:24:30'),
(429, 'MUAA FREE SPIRIT', '.', '33651001', 4, 0, 0, 19, 0, 500, 0, '', 0, 1, '', '2021-08-19 22:25:29'),
(430, 'BODY SPLASH COOL (VERDECHICO)', '.', '306510003', 4, 0, 0, 22, 0, 300, 0, '', 0, 1, '', '2021-08-19 22:27:37'),
(431, 'BODY SPLASH LOVE X30 (ROSACHICO)', '.', '306510002', 4, 0, 0, 28, 0, 300, 0, '', 0, 1, '', '2021-08-19 22:28:54'),
(432, 'BODY SPLASH POP (LILACHICO)', '.', '306510004', 4, 0, 0, 11, 0, 300, 0, '', 0, 1, '', '2021-08-19 22:38:59'),
(433, 'BODY SPLASH X125ML (LILA)', '.', '306510007', 4, 0, 0, 16, 0, 490, 0, '', 0, 1, '', '2021-08-19 22:40:11'),
(434, 'BODY LOVE X125 (ROSA)', '.', '306510005', 4, 0, 0, 7, 0, 490, 0, '', 0, 1, '', '2021-08-19 22:41:07'),
(435, 'BODY COOL X125 (VERDE)', '.', '306510006', 4, 0, 0, 1, 0, 490, 0, '', 0, 1, '', '2021-08-19 22:42:42'),
(436, 'TASA MUAA', '.', 'CQ154', 4, 0, 0, 1, 0, 800, 0, '', 0, 1, '', '2021-08-19 22:43:17'),
(437, 'CINTO MOTOROIL', '.', 'Z1342', 4, 0, 0, 2, 0, 1600, 0, '', 0, 1, '', '2021-08-19 22:44:21'),
(438, 'CINTO MOTOROIL', '.', 'Z1343', 4, 0, 0, 1, 0, 1500, 0, '', 0, 1, '', '2021-08-19 22:45:14'),
(439, 'CINTO MOTOROIL', '.', 'Z1345', 4, 0, 0, 1, 0, 1400, 0, '', 0, 1, '', '2021-08-19 22:45:57'),
(440, 'CINTO MOTOROIL', '.', 'Z1352', 4, 0, 0, 1, 0, 1400, 0, '', 0, 1, '', '2021-08-19 22:46:41'),
(441, 'CINTO MOTOR OIL', '.', 'Z1353', 4, 0, 0, 1, 0, 1500, 0, '', 0, 1, '', '2021-08-19 22:50:56'),
(442, 'CINTO MOTOR OIL', '.', 'Z1354', 4, 0, 0, 2, 0, 1300, 0, '', 0, 1, '', '2021-08-19 22:51:40'),
(443, 'CINTO MOTOR OIL', '.', 'Z1356', 4, 0, 0, 1, 0, 1400, 0, '', 0, 1, '', '2021-08-19 22:52:34'),
(444, 'CINTO MOTOR OIL', '.', 'Z1357', 4, 0, 0, 1, 0, 1400, 0, '', 0, 1, '', '2021-08-19 22:53:29'),
(445, 'CINTO MOTOR OIL', '.', 'Z1358', 4, 0, 0, 1, 0, 1600, 0, '', 0, 1, '', '2021-08-19 22:54:17'),
(446, 'CINTO NATIVA', 'ROJO/ NEGRO', '209', 4, 0, 0, 4, 0, 700, 0, '', 0, 1, '', '2021-08-19 22:55:16'),
(447, 'CINTO MANTECA  HEBILLA CUADRADA', '.', '210', 4, 0, 0, 1, 0, 850, 0, '', 0, 1, '', '2021-08-19 22:57:26'),
(448, 'CINTO VERDE AQUA HEBILLA REDONDA', '.', '210', 4, 0, 0, 1, 0, 500, 0, '', 0, 1, '', '2021-08-19 22:58:54'),
(449, 'CINTO BEIGE HEBILLA CUADRADA', '.', 'COD 150', 4, 0, 0, 1, 0, 850, 0, '', 0, 1, '', '2021-08-19 23:00:08'),
(450, 'CINTO FUCSIA FINITO', '.', '828937', 4, 0, 0, 1, 0, 499, 0, '', 0, 1, '', '2021-08-19 23:00:46'),
(451, 'CINTO TRENDY TACHAS', '.', 'Z1433', 4, 0, 0, 1, 0, 999, 0, '', 0, 1, '', '2021-08-19 23:01:57'),
(452, 'PARAGUAS ANIMALPRINT NARANJA', '.', '9439', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-19 23:02:41'),
(453, 'PARAGUAS NEGRO PIERRE CARDIN', '.', '6182', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-19 23:03:12'),
(454, 'PARAGUAS TRENDY BEIGE/ MARRON', '.', '6172', 4, 0, 0, 1, 0, 900, 1, '', 0, 1, '', '2021-08-25 13:59:14'),
(455, 'PARAGUAS TRENDY NEGRO', '.', '6169', 4, 0, 0, 1, 0, 950, 0, '', 0, 1, '', '2021-08-19 23:04:40'),
(456, 'PARAGUAS COLORES MIS UNIQUE', '.', '6119', 4, 0, 0, 1, 0, 800, 0, '', 0, 1, '', '2021-08-19 23:05:11'),
(457, 'PARAGUAS ESTAMPADO TRENDY', '.', '6174', 4, 0, 0, 1, 0, 800, 0, '', 0, 1, '', '2021-08-19 23:05:50'),
(458, 'RIÑONERA EVERLAST (LETRAS)', '.', '20216', 4, 0, 0, 5, 0, 2500, 0, '', 0, 1, '', '2021-08-24 14:21:12'),
(459, 'RIÑONERA PEITON VERDE FLUOR', '.', '50114', 4, 0, 0, 2, 0, 1990, 0, '', 0, 1, '', '2021-09-02 12:25:49'),
(460, 'RIÑOERA WILSON CELESTE', '.', 'IC12101A', 4, 0, 0, 2, 0, 1500, 0, '', 0, 1, '', '2021-08-19 23:12:43'),
(461, 'RIÑOERA NEGRA GRANDE', '.', '7993', 4, 0, 0, 2, 0, 2400, 0, '', 0, 1, '', '2021-08-19 23:13:35'),
(462, 'PORTA CELULAR EVERLAST', '.', '10939', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-24 14:17:34'),
(463, 'PORTA CELULAR EVERLAST', '.', '10937', 4, 0, 0, 1, 0, 990, 0, '', 0, 1, '', '2021-08-24 14:17:12');
INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `codigo`, `id_categoria`, `proveedor`, `cantminima`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `obs`, `iva`, `activo`, `obsdel`, `fecha`) VALUES
(464, 'RIÑONERA LIMA ROJA', '.', 'F05', 4, 0, 0, 1, 0, 2900, 0, '', 0, 1, '', '2021-08-19 23:15:24'),
(465, 'RIÑONERA NATIVA', '.', '805', 4, 0, 0, 3, 0, 800, 0, '', 0, 1, '', '2021-08-19 23:15:57'),
(466, 'PORTA VALORES ANTIRROBO IMPERMEABLE', '.', 'PV', 4, 0, 0, 12, 0, 700, 0, '', 0, 1, '', '2021-08-24 14:30:13'),
(467, 'LLAVEROS HOMBRES JUAN CARTIER', '.', '.318', 4, 0, 0, 10, 0, 490, 0, '', 0, 1, '', '2021-08-19 23:19:11'),
(468, 'BILLETERA BALNDA  SIMPLE', '.', '1453', 4, 0, 0, 2, 0, 510, 0, '', 0, 1, '', '2021-08-19 23:19:49'),
(469, 'BILLETERA BLANDA SIMPLE', '.', '1452', 4, 0, 0, 4, 0, 450, 0, '', 0, 1, '', '2021-08-19 23:20:26'),
(470, 'BILLETERA SIMPLE BLANDA', '.', '1326', 4, 0, 0, 2, 0, 430, 0, '', 0, 1, '', '2021-08-19 23:21:00'),
(471, 'BILLETERA SIMPLE BLANDA', '.', '3194', 4, 0, 0, 2, 0, 500, 0, '', 0, 1, '', '2021-08-19 23:21:32'),
(472, 'MEDIAS FINAS MUAA', '.', 'MF', 4, 0, 0, 16, 0, 1, 0, '', 0, 1, '', '2021-08-19 23:22:19'),
(473, 'GORRITO CON POMPON TRENDY', '.', '10669', 4, 0, 0, 2, 0, 1000, 0, '', 0, 1, '', '2021-08-19 23:23:03'),
(474, 'GORRITO BLANCO CON POMPON', '.', '10671', 4, 0, 0, 1, 0, 1000, 0, '', 0, 1, '', '2021-08-19 23:23:43'),
(475, 'GORRITO AZUL', '.', '10704', 4, 0, 0, 1, 0, 1000, 0, '', 0, 1, '', '2021-08-19 23:24:15'),
(476, 'GORRITO POMPON', '.', '10684', 4, 0, 0, 2, 0, 1200, 0, '', 0, 1, '', '2021-08-19 23:24:56'),
(477, 'JUEGO DE GORRITO Y GUANTES AZUL', '.', '10688', 4, 0, 0, 1, 0, 900, 0, '', 0, 1, '', '2021-08-20 12:10:58'),
(478, 'GORRITO CON GUANTES NENA', '.', '10679', 4, 0, 0, 2, 0, 800, 0, '', 0, 1, '', '2021-08-20 12:16:41'),
(479, 'PIXIE BUFANDA CON JACKARD SIMIL', 'MUAA', '223810002', 4, 0, 0, 5, 0, 300, 0, '', 0, 1, '', '2021-08-20 12:17:49'),
(480, 'BUFANDA MARRON LANITA', '.', 'BUF.M', 4, 0, 0, 1, 0, 290, 0, '', 0, 1, '', '2021-08-20 12:18:58'),
(481, 'BUFANDA A RAYAS', '.', '1921', 4, 0, 0, 1, 0, 490, 0, '', 0, 1, '', '2021-08-20 12:21:11'),
(482, 'BUFANDON', '.', 'PA1492', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-20 12:22:35'),
(483, 'BUFANDA CUADRILLE', '.', 'PA1852', 4, 0, 0, 1, 0, 1900, 0, '', 0, 1, '', '2021-08-20 12:23:17'),
(484, 'BUFANDA GRIS', '.', 'PA1911', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-20 12:23:56'),
(485, 'GULLIES RUANA RAYADO MUAA', '.', 'RMU10P0052BA', 4, 0, 0, 1, 0, 750, 0, '', 0, 1, '', '2021-08-20 12:27:57'),
(486, 'BYFAN GRIS.', '.', 'PA1502', 4, 0, 0, 1, 0, 1400, 0, '', 0, 1, '', '2021-08-20 12:28:40'),
(487, 'BUFANDA LISA', '.', 'PA1924', 4, 0, 0, 3, 0, 1200, 0, '', 0, 1, '', '2021-08-20 12:29:34'),
(488, 'BUFANDA/CHALINA COMBINADA', '.', 'PA1393', 4, 0, 0, 1, 0, 1300, 0, '', 0, 1, '', '2021-08-20 12:34:16'),
(489, 'CHALINA AZUL', '.', 'PA2006', 4, 0, 0, 1, 0, 1300, 0, '', 0, 1, '', '2021-08-20 12:34:59'),
(490, 'CHALINAS', '.', 'PA-463', 4, 0, 0, 4, 0, 900, 0, '', 0, 1, '', '2021-08-20 12:42:27'),
(491, 'CHALINAS', '.', 'PA-911', 4, 0, 0, 5, 0, 800, 0, '', 0, 1, '', '2021-08-20 12:43:30'),
(492, 'CHALINAS FLOREADAS', '.', 'PA-866', 4, 0, 0, 2, 0, 800, 0, '', 0, 1, '', '2021-08-20 12:44:39'),
(493, 'CHALINAS', '.', 'PA-1393', 4, 0, 0, 3, 0, 900, 0, '', 0, 1, '', '2021-08-20 12:45:39'),
(494, 'CHALINAS TIPO PAREO', '.', 'PA1587', 4, 0, 0, 4, 0, 1300, 0, '', 0, 1, '', '2021-08-20 12:46:41'),
(495, 'CHALINA TIPO PAREO', '.', 'PA2004', 4, 0, 0, 2, 0, 1300, 0, '', 0, 1, '', '2021-08-20 12:47:17'),
(496, 'MAE PAÑUELO PLISADO', 'VERDE AMARILLO MUAA', '330110002', 4, 0, 0, 1, 0, 340, 0, '', 0, 1, '', '2021-08-20 12:48:49'),
(497, 'PAÑUELO', '.', 'PA1597', 4, 0, 0, 1, 0, 700, 0, '', 0, 1, '', '2021-08-20 12:49:51'),
(498, 'PAÑUELO ANIMAL PRAINT COLORES', '.', 'PA1967', 4, 0, 0, 1, 0, 650, 0, '', 0, 1, '', '2021-08-20 12:51:44'),
(499, 'PAÑUELO PLISADO', '.', 'PA1589', 4, 0, 0, 1, 0, 860, 1, '', 0, 1, '', '2021-09-01 12:50:43'),
(500, 'PAÑUELO AZUL', '.', 'art PA1587', 4, 0, 0, 1, 0, 480, 0, '', 0, 1, '', '2021-08-20 12:54:15'),
(501, 'PAñUELO', '.', 'PA1972', 4, 0, 0, 6, 0, 1000, 0, '', 0, 1, '', '2021-08-20 12:55:21'),
(502, 'PAÑUELO', '.', 'PA1782', 4, 0, 0, 3, 0, 490, 0, '', 0, 1, '', '2021-08-20 12:56:19'),
(503, 'PAÑUELO', '.', 'PA1595', 4, 0, 0, 4, 0, 800, 0, '', 0, 1, '', '2021-08-20 12:57:12'),
(504, 'MORRAL NEGRO BOSSI', '.', '8247', 4, 0, 0, 1, 0, 2100, 0, '', 0, 1, '', '2021-08-20 12:58:06'),
(505, 'MORRAL NEGRO BOSSI', '.', '8245', 4, 0, 0, 1, 0, 1900, 0, '', 0, 1, '', '2021-08-20 12:58:51'),
(506, 'MOCHILA LENTEJUELAS MEDIANA', '.', '2936.1', 4, 0, 0, 1, 0, 2400, 0, '', 0, 1, '', '2021-08-20 12:59:43'),
(507, 'BOLSO DE VIAJE MOTOROIL', '.', '25632', 4, 0, 0, 1, 0, 2500, 0, '', 0, 1, '', '2021-08-20 13:00:44'),
(508, 'BANDOLERA  PIERRE CARDIN', 'NEGRA C/ROJO', '20407', 4, 0, 0, 1, 0, 2990, 0, '', 0, 1, '', '2021-08-20 13:02:23'),
(509, 'BOLSO DE VIAJE PEITON', '.', '8771', 4, 0, 0, 2, 0, 2200, 0, '', 0, 1, '', '2021-08-20 13:03:09'),
(510, 'BOLSO DE VIAJE PEITON', '.', '8770', 4, 0, 0, 2, 0, 2200, 0, '', 0, 1, '', '2021-08-20 13:03:52'),
(511, 'BOLSITO TRANSPARENTE TRENDY', '.', '8196', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-08-20 13:04:45'),
(512, 'BOLSO DE VIAJE EVERLAST', '.', '26211', 4, 0, 0, 1, 0, 2900, 0, '', 0, 1, '', '2021-08-20 13:05:25'),
(513, 'MOCHILA MUAA OJITOS', '.', '355010011', 4, 0, 0, 5, 0, 2300, 0, '', 0, 1, '', '2021-08-20 13:30:37'),
(514, 'BOTITAS DE PROMO', '.', '.1BOT PROMO', 5, 0, 0, 3, 0, 1490, 0, '', 0, 1, '', '2021-08-20 21:15:19'),
(515, 'BLANCA CON LILA', '.', 'OJ HAWAIIAN', 6, 0, 0, 5, 0, 1200, 1, '', 0, 1, '', '2021-09-02 21:14:02'),
(516, 'BLANCA CON VERDE', '.', 'OJ HAWAIIAN', 6, 0, 0, 6, 0, 1200, 0, '', 0, 1, '', '2021-08-20 21:26:05'),
(517, 'NARANJA', '.', 'OJ HAWAIIAN', 6, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-08-20 21:26:44'),
(518, 'NEGRA', '.', 'OJ HAWAIIAN', 6, 0, 0, 11, 0, 1200, 0, '', 0, 1, '', '2021-08-20 21:27:27'),
(519, 'OJOTA BLANCA', '.', 'OJOTA IBIZA', 6, 0, 0, 2, 0, 1900, 0, '', 0, 1, '', '2021-08-20 21:30:00'),
(520, 'OJOTA ROSA', '.', 'OJOTA IBIZA', 6, 0, 0, 1, 0, 1900, 1, '', 0, 1, '', '2021-09-07 22:55:34'),
(521, 'OJOTA ROSA C/BLANCA', '.', 'SA DILET D', 6, 0, 0, 8, 0, 1900, 1, '', 0, 1, '', '2021-09-07 22:55:34'),
(522, 'OJOTA FUCSIA C/NEGRO', '.', 'HOJOTA HANNA', 6, 0, 0, 7, 0, 1900, 0, '', 0, 1, '', '2021-08-20 21:42:51'),
(523, 'BLANCA C/FUCSIA', '.', 'HOJOTA HANNA', 6, 0, 0, 1, 0, 1900, 0, '', 0, 1, '', '2021-08-20 21:43:43'),
(524, 'OJOTA BLANCA', '.', 'HOJOTA HANNA', 6, 0, 0, 1, 0, 1900, 0, '', 0, 1, '', '2021-08-20 21:45:14'),
(525, 'OJOTA NEGRA HOM', '.', 'OJOTA FIJI', 6, 0, 0, 21, 0, 1900, 0, '', 0, 1, '', '2021-08-20 21:48:12'),
(526, 'ZAP BLANCAS DAMA', '.', 'ZAP QUEEN', 2, 0, 0, 4, 0, 4990, 0, '', 0, 1, '', '2021-08-20 21:49:57'),
(527, 'ZAPATILLA NEGRA HOMBRE', '.', 'ZAP MH SWR100', 2, 0, 0, 4, 0, 2990, 0, '', 0, 1, '', '2021-10-19 23:53:50'),
(528, 'ZAP MARRON HOM', '.', 'MH REC 110', 2, 0, 0, 9, 0, 2990, 0, '', 0, 1, '', '2021-08-20 21:56:31'),
(529, 'ZAP GRIS C/ ROSA', '.', 'ZAP ULTTRA D', 2, 0, 0, 4, 0, 3000, 0, '', 0, 1, '', '2021-08-20 21:59:44'),
(530, 'ZAPATILLA DAMA T 40', 'NEGRA Y BLANCA', 'ZAP LV', 2, 0, 0, 10, 0, 5200, 0, '', 0, 1, '', '2021-10-19 23:10:07'),
(531, 'ZAP GRIS HOM', '.', 'ZAP ELASTIC HOMBRE', 2, 0, 0, 13, 0, 2800, 0, '', 0, 1, '', '2021-08-20 22:04:22'),
(532, 'ZAP GRIS DEPORTIVA HOM', '.', 'ZAP PICO', 2, 0, 0, 7, 0, 2800, 0, '', 0, 1, '', '2021-08-20 22:06:25'),
(533, 'ZAP GRIS DAMA', '.', 'ZAP ELASTIC DAMA', 2, 0, 0, 1, 0, 2800, 0, '', 0, 1, '', '2021-08-20 22:07:11'),
(534, 'ZAP NEGRA', '.', 'ZAP SPACE DAMA', 2, 0, 0, 2, 0, 3000, 0, '', 0, 1, '', '2021-08-20 22:08:25'),
(535, 'ZAP AZUL', '.', 'ZAP ELASTIC HOM AZUL', 2, 0, 0, 15, 0, 2800, 0, '', 0, 1, '', '2021-08-20 22:11:08'),
(536, 'ZAP NUDE', '.', 'ZAP DAMA DIOR', 2, 0, 0, 10, 0, 6900, 0, '', 0, 1, '', '2021-08-20 22:14:28'),
(537, 'ZAP AZUL C/FUCSIA', '.', 'ZAP LEVEL', 2, 0, 0, 11, 0, 4800, 0, '', 0, 1, '', '2021-08-20 22:15:42'),
(538, 'ZAP BLANCA C/NEGRA GRIS', '.', 'ZAP DAMA BELEN', 2, 0, 0, 5, 0, 7500, 0, '', 0, 1, '', '2021-08-20 22:16:50'),
(539, 'ZAP TODA NEGRA', '.', 'ZAP DAMA FORCE', 2, 0, 0, 12, 0, 5900, 0, '', 0, 1, '', '2021-08-20 22:18:10'),
(540, 'ZAP AV GRIS C/ROSA', '.', 'TENIS AVURA', 2, 0, 0, 4, 0, 4800, 2, '', 0, 1, '', '2021-08-25 14:53:06'),
(541, 'CHATITA NEGRA', 'CON BRILLITO', 'CH TINA', 7, 0, 0, 5, 0, 2100, 2, '', 0, 1, '', '2021-09-04 22:41:42'),
(542, 'CHATITA NEGRA', '.', 'CH CINTO', 7, 0, 0, 6, 0, 2900, 0, '', 0, 1, '', '2021-08-20 22:33:01'),
(543, 'CHATITA CON BORDADO', '.', 'CH SANDRA', 7, 0, 0, 8, 0, 2500, 0, '', 0, 1, '', '2021-08-20 22:34:24'),
(544, 'CHATITA SILVER GRIS', '.', 'CH HERNA', 7, 0, 0, 3, 0, 1400, 0, '', 0, 1, '', '2021-08-20 22:35:48'),
(545, 'CHATITA NUDE C/ TACHAS', '.', 'CH BRITA', 7, 0, 0, 2, 0, 1900, 0, '', 0, 1, '', '2021-08-20 22:36:50'),
(546, 'CHATITA NUDE', '.', 'CH ZOHE NUDE', 7, 0, 0, 2, 0, 2050, 0, '', 0, 1, '', '2021-08-20 22:37:57'),
(547, 'CHATITA PLATEADA', '.', 'CH CHAIN', 7, 0, 0, 2, 0, 2100, 0, '', 0, 1, '', '2021-08-20 22:40:03'),
(548, 'CHATITA NEGRA ZOHE', '.', 'CH ZOHE NEGRO', 7, 0, 0, 3, 0, 2050, 0, '', 0, 1, '', '2021-08-20 22:41:15'),
(549, 'ZAP NEGRA BAJITA', '.', 'ZAP CLASSIC NEGRO', 2, 0, 0, 4, 0, 2850, 0, '', 0, 1, '', '2021-08-20 22:43:02'),
(550, 'ZAP NEGRA QUEEN', '.', 'ZAP QUEEN NEGRA', 2, 0, 0, 1, 0, 4990, 0, '', 0, 1, '', '2021-08-20 22:44:09'),
(551, 'ZAP BLANCA Y FLUOR', '.', 'ZAP CLASSIC BLANCA', 2, 0, 0, 6, 0, 2850, 0, '', 0, 1, '', '2021-08-20 22:45:28'),
(552, 'ZAP BAJITA NUDE', '.', 'ZAP CLASSIC NUDE', 2, 0, 0, 4, 0, 2850, 0, '', 0, 1, '', '2021-08-20 22:46:17'),
(553, 'SUECO ROSA VIEJO', '.', 'CALMEL PU COR B19KI0208', 7, 0, 0, 8, 0, 2850, 0, '', 0, 1, '', '2021-08-20 22:48:37'),
(554, 'MOCASIN NEGRO FLOREADO', '.', 'MO BLOM NEGRO', 7, 0, 0, 2, 0, 2100, 0, '', 0, 1, '', '2021-08-20 22:49:45'),
(555, 'ZAP PARA PEQUES', '.', 'ZAP ELASTIC KIDS', 2, 0, 0, 7, 0, 1900, 0, '', 0, 1, '', '2021-08-20 22:51:09'),
(556, 'SUECO NEGRO ABROJO', '.', 'SAPARIS', 7, 0, 0, 3, 0, 1800, 0, '', 0, 1, '', '2021-08-20 22:53:04'),
(557, 'CHATITA NEGRA C/CHAROL', '.', 'CH METALIC NEGRO', 7, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-08-20 22:54:32'),
(558, 'BOTAS DE LLUVIA', '.', 'BOTAS DE LLUVIA', 5, 0, 0, 28, 0, 1500, 0, '', 0, 1, '', '2021-08-20 22:57:58'),
(559, 'BELFAST PANTALON AL TOBILLO T1', 'TALLE 1', '330001032', 1, 0, 0, 0, 0, 900, 1, '', 0, 1, '', '2021-08-23 22:05:10'),
(560, 'BARBIJO DE TELA', '.', '.1', 9, 0, 0, 26, 0, 200, 1, '', 0, 1, '', '2021-08-24 21:32:52'),
(561, 'BARBIJO DE FRISELINA', '.', '.2', 9, 0, 0, 96, 0, 50, 0, '', 0, 1, '', '2021-08-24 21:31:45'),
(562, 'CAMISA JANO T L', '.', '051652AA', 1, 0, 0, 0, 0, 500, 1, '', 0, 1, '', '2021-09-01 20:51:52'),
(563, 'BILLETERA PRATIS', '.', 'WL6704', 4, 0, 0, 4, 0, 1300, 0, '', 0, 1, '', '2021-09-03 21:15:27'),
(564, 'BILLETERA PRATIS', '.', 'WL44007', 4, 0, 0, 2, 0, 990, 0, '', 0, 1, '', '2021-09-03 21:17:50'),
(565, 'BILLETERA PRATIS FLORCITAS', '.', 'WL6609', 4, 0, 0, 2, 0, 1300, 0, '', 0, 1, '', '2021-09-03 21:19:01'),
(566, 'BILLETERA PRATIS', 'LILA/ROSA', 'WL6602', 4, 0, 0, 2, 0, 1100, 0, '', 0, 1, '', '2021-09-03 21:20:00'),
(567, 'BILLETERA PRATIS', 'BLANCO /MARRON', 'WL44004', 4, 0, 0, 1, 0, 1300, 1, '', 0, 1, '', '2021-09-08 13:56:06'),
(568, 'BILLETERA CORTA', 'MARRON  /CELESTE', 'WL6602-1', 4, 0, 0, 2, 0, 1300, 0, '', 0, 1, '', '2021-09-03 21:23:27'),
(569, 'BILLETERA CORTA', '.', 'WL6609-1', 4, 0, 0, 2, 0, 1100, 0, '', 0, 1, '', '2021-09-03 21:30:22'),
(570, 'BILLETERA CORTA', '.', 'WL6708-1', 4, 0, 0, 2, 0, 1100, 0, '', 0, 1, '', '2021-09-03 21:31:19'),
(571, 'BILLETERA CORTA', '.', 'WL6606-1', 4, 0, 0, 2, 0, 1100, 0, '', 0, 1, '', '2021-09-03 21:32:12'),
(572, 'BILLETERA CHICA', '.', 'WL44007-2', 4, 0, 0, 2, 0, 900, 0, '', 0, 1, '', '2021-09-03 21:32:51'),
(573, 'BILLETERA CHICA', '.', 'WL6606-2', 4, 0, 0, 4, 0, 900, 0, '', 0, 1, '', '2021-09-03 21:34:00'),
(574, 'RIÑONERA PEITON', '.', '50674', 4, 0, 0, 1, 0, 1700, 0, '', 0, 1, '', '2021-09-03 21:42:17'),
(575, 'RIñONERA PEITON', '.', '50673', 4, 0, 0, 2, 0, 1700, 0, '', 0, 1, '', '2021-09-03 21:42:52'),
(576, 'GORRITA CORAZON', '.', '11867', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-09-03 21:43:55'),
(577, 'GORRITA LOVE', '.', '11868', 4, 0, 0, 1, 0, 1200, 0, '', 0, 1, '', '2021-09-03 21:46:05'),
(578, 'GORRITA CORAZON LENTEJUELAS', '.', '11871', 4, 0, 0, 2, 0, 1200, 0, '', 0, 1, '', '2021-09-03 21:47:00'),
(579, 'GORRITA LETRAS LENTEJUELAS', '.', '11869', 4, 0, 0, 2, 0, 1200, 0, '', 0, 1, '', '2021-09-03 21:47:44'),
(580, 'BOTELLITA CON TOALLA EVERLAST', '.', '11452', 4, 0, 0, 1, 0, 999, 0, '', 0, 1, '', '2021-09-03 21:48:44'),
(581, 'TAZA CON DINO', '.', '11564', 4, 0, 0, 2, 0, 1300, 0, '', 0, 1, '', '2021-09-03 21:49:37'),
(582, 'VASO LAS OREIRO 480ML', '.', '11467', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-09-03 21:50:22'),
(583, 'VASO OREIRO 480ML', '.', '11468', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-09-03 21:59:11'),
(584, 'VASO LAS OREIRO 480ML', '.', '11470', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-09-03 22:00:03'),
(585, 'TERMITO CON TAPA TACTIL 500ML', '.', '11516', 4, 0, 0, 1, 0, 3500, 0, '', 0, 1, '', '2021-09-03 22:01:47'),
(586, 'VASO CON BOMBILLA 450ML', '.', '11705', 4, 0, 0, 2, 0, 1200, 0, '', 0, 1, '', '2021-09-03 22:02:53'),
(587, 'VASO DECO TRENDY LILA CON BRILLOS 550ML', '.', '11698', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-09-03 22:04:41'),
(588, 'VASO DECO TRENDY ROSA 550ML', '.', '11699', 4, 0, 0, 1, 0, 1800, 0, '', 0, 1, '', '2021-09-03 22:05:29'),
(589, 'TERMITO TRENDY COLORES', '.', '11427', 4, 0, 0, 2, 0, 3200, 0, '', 0, 1, '', '2021-09-03 22:12:00'),
(590, 'OTROS', 'VARIOS', 'otros', 4, 0, 0, 4, 0, 0, 1, '', 0, 1, '', '2021-09-06 23:01:06'),
(591, 'PRODUCTO 1', 'ES UNA DESCRIPCION', '.52', 3, 0, 0, 50, 0, 160, 0, '', 0, 1, '', '2021-10-19 22:59:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocliente`
--

CREATE TABLE `tipocliente` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `obs` text NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `obsdel` text NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Ariel Bernardo', 'superadmin', '$2a$07$asxx54ahjppf45sd87a5aukTGYNFXof01VBQcnReY3ypc9ZLonZ4m', 'Administrador', '', 1, '2021-07-30 18:40:34', '2021-07-30 23:40:34'),
(2, 'Gabriel Portillo', 'superadmin2', '$2a$07$asxx54ahjppf45sd87a5auexpvIRm5YvvHdhI3icZO1iNlpugneDW', 'Administrador', '', 1, '0000-00-00 00:00:00', '2018-10-03 11:46:56'),
(64, 'venededor', 'vendedor', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Vendedor', 'vistas/img/usuarios/vendedor/452.jpg', 1, '2021-10-14 16:12:38', '2021-10-14 21:12:38'),
(65, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Administrador', 'vistas/img/usuarios/admin2/130.jpg', 1, '2021-10-22 16:34:56', '2021-10-22 21:34:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vales`
--

CREATE TABLE `vales` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` text NOT NULL,
  `importe` float NOT NULL,
  `fc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vales`
--

INSERT INTO `vales` (`id`, `fecha`, `nombre`, `importe`, `fc`) VALUES
(2, '2019-04-10', 'CONSUMIDOR FINA', 490, '0001-00001162'),
(4, '2019-04-29', 'CONSUMIDOR FINAL', 1999, '0001-00001220'),
(5, '2019-05-08', 'CONSUMIDOR FINAL', 1399, '0001-00001246'),
(6, '2019-05-14', 'CONSUMIDOR FINAL', 850, '0001-00001269'),
(7, '2019-06-05', 'CONSUMIDOR FINAL', 1500, '0001-00001347'),
(8, '2019-06-05', 'CONSUMIDOR FINAL', 1100, '0001-00001347');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` text COLLATE utf8_spanish_ci NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `adeuda` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fechapago` date NOT NULL,
  `referenciapago` text COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `seleccionado` int(11) NOT NULL DEFAULT 0,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `tipo`, `codigo`, `id_cliente`, `nombre`, `documento`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `adeuda`, `metodo_pago`, `fechapago`, `referenciapago`, `observaciones`, `seleccionado`, `fechacreacion`) VALUES
(1, '2021-08-17', 'FC', '0001-00000102', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"3\",\"descripcion\":\"ZAPATILLA DAMA T 40\",\"codigo\":\"zap lv\",\"cantidad\":\"1\",\"precio\":\"5200.00\",\"descuento\":\"520.00\",\"total\":\"4680.00\"}]', 0, 0, 4680, 0, '[{\"id\":\"1\",\"fecha\":\"17-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"4680\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-17 15:32:56'),
(2, '2021-08-20', 'FC', '0001-00000103', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"1\",\"descripcion\":\"CALZA CON ESTAMPA T42\",\"codigo\":\"250023001\",\"cantidad\":\"1\",\"precio\":\"1350.00\",\"descuento\":\"750.00\",\"total\":\"600.00\"}]', 0, 0, 600, 0, '[{\"id\":\"1\",\"fecha\":\"20-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"600\",\"referencia\":\"EFECTIVO\"},{\"id\":\"2\",\"fecha\":\"20-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"0\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-20 15:30:45'),
(3, '2021-08-20', 'FC', '0001-00000104', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"32\",\"descripcion\":\"TERESITA POLLERA T 1\",\"codigo\":\"33B602007\",\"cantidad\":\"1\",\"precio\":\"300.00\",\"descuento\":\"0.00\",\"total\":\"300.00\"}]', 0, 0, 300, 0, '[{\"id\":\"1\",\"fecha\":\"20-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"300\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-20 15:31:59'),
(4, '2021-08-20', 'FC', '0001-00000105', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"91\",\"descripcion\":\"LOLY ROCKY BROOKEN T 32\",\"codigo\":\"061589CC\",\"cantidad\":\"1\",\"precio\":\"500.00\",\"descuento\":\"0.00\",\"total\":\"500.00\"},{\"id\":\"32\",\"descripcion\":\"TERESITA POLLERA T 1\",\"codigo\":\"33B602007\",\"cantidad\":\"1\",\"precio\":\"300.00\",\"descuento\":\"0.00\",\"total\":\"300.00\"}]', 0, 0, 800, 0, '[{\"id\":\"1\",\"fecha\":\"20-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"800\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-20 15:32:40'),
(5, '2021-08-20', 'FC', '0001-00000106', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"333\",\"descripcion\":\"VALIJA EJECUTIVA\",\"codigo\":\"26370\",\"cantidad\":\"1\",\"precio\":\"12000.00\",\"descuento\":\"0.00\",\"total\":\"12000.00\"}]', 0, 0, 12000, 0, '[{\"id\":\"1\",\"fecha\":\"20-08-2021\",\"tipo\":\"TARJETA\",\"importe\":\"12000\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-08-20 15:33:20'),
(6, '2021-08-20', 'FC', '0001-00000107', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"309\",\"descripcion\":\"MOCHILITA NATIVA MANTECA CON TACHITAS\",\"codigo\":\"9234\",\"cantidad\":\"1\",\"precio\":\"2100.00\",\"descuento\":\"0.00\",\"total\":\"2100.00\"}]', 0, 0, 2100, 0, '[{\"id\":\"1\",\"fecha\":\"20-08-2021\",\"tipo\":\"TARJETA\",\"importe\":\"2100\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-08-20 15:34:10'),
(7, '2021-08-20', 'FC', '0001-00000108', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"224\",\"descripcion\":\"MOCHILITA MARRON NATIVA\",\"codigo\":\"951\",\"cantidad\":\"1\",\"precio\":\"2100.00\",\"descuento\":\"0.00\",\"total\":\"2100.00\"}]', 0, 0, 2100, 0, '[{\"id\":\"1\",\"fecha\":\"20-08-2021\",\"tipo\":\"TARJETA\",\"importe\":\"2100\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-08-20 20:33:23'),
(8, '2021-08-20', 'FC', '0001-00000109', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"289\",\"descripcion\":\"MOCHILA MUAA\",\"codigo\":\"32S010010\",\"cantidad\":\"1\",\"precio\":\"2300.00\",\"descuento\":\"0.00\",\"total\":\"2300.00\"}]', 0, 0, 2300, 0, '[{\"id\":\"1\",\"fecha\":\"20-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"2300\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-20 20:45:40'),
(9, '2021-08-20', 'FC', '0001-00000110', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"76\",\"descripcion\":\"FAINTINI CAMISA ESCOCESA T2\",\"codigo\":\"305823014\",\"cantidad\":\"1\",\"precio\":\"900.00\",\"descuento\":\"0.00\",\"total\":\"900.00\"}]', 0, 0, 900, 0, '[{\"id\":\"1\",\"fecha\":\"20-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"900\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-20 20:47:58'),
(10, '2021-08-20', 'FC', '0001-00000111', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"54\",\"descripcion\":\"ALTAMIRA REMERA TOP VOLADO T2\",\"codigo\":\"PMU09P00694\",\"cantidad\":\"1\",\"precio\":\"300.00\",\"descuento\":\"0.00\",\"total\":\"300.00\"}]', 0, 0, 300, 0, '[{\"id\":\"1\",\"fecha\":\"20-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"300\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-20 21:03:47'),
(11, '2021-08-20', 'FC', '0001-00000112', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"540\",\"descripcion\":\"ZAP AV GRIS C/ROSA\",\"codigo\":\"TENIS AVURA\",\"cantidad\":\"1\",\"precio\":\"4800.00\",\"descuento\":\"0.00\",\"total\":\"4800.00\"}]', 0, 0, 4800, 0, '[{\"id\":\"1\",\"fecha\":\"20-08-2021\",\"tipo\":\"TARJETA\",\"importe\":\"4800\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-08-20 22:22:33'),
(12, '2021-08-20', 'FC', '0001-00000113', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"541\",\"descripcion\":\"CHATITA NEGRA\",\"codigo\":\"CH TINA\",\"cantidad\":\"1\",\"precio\":\"2100.00\",\"descuento\":\"0.00\",\"total\":\"2100.00\"}]', 0, 0, 2100, 0, '[{\"id\":\"1\",\"fecha\":\"20-08-2021\",\"tipo\":\"TARJETA\",\"importe\":\"2100\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-08-20 22:29:20'),
(13, '2021-08-20', 'FC', '0001-00000114', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"311\",\"descripcion\":\"MOCHILA NATIVA NEGRA OJALES\",\"codigo\":\"2940\",\"cantidad\":\"1\",\"precio\":\"2700.00\",\"descuento\":\"0.00\",\"total\":\"2700.00\"}]', 0, 0, 2700, 0, '[{\"id\":\"1\",\"fecha\":\"20-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"2700\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-20 22:31:19'),
(14, '2021-08-21', 'FC', '0001-00000115', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"377\",\"descripcion\":\"CARTERA REPTIL\",\"codigo\":\"15913.9\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 0, 0, 1500, 0, '[{\"id\":\"1\",\"fecha\":\"21-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"1500\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-21 21:53:48'),
(15, '2021-08-23', 'FC', '0001-00000116', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"367\",\"descripcion\":\"BOLSITO CON CORREA ESTAMPADO\",\"codigo\":\"15318.7\",\"cantidad\":\"1\",\"precio\":\"1300.00\",\"descuento\":\"0.00\",\"total\":\"1300.00\"}]', 0, 0, 1300, 0, '[{\"id\":\"1\",\"fecha\":\"23-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"1300\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-23 14:44:36'),
(16, '2021-08-23', 'FC', '0001-00000117', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"559\",\"descripcion\":\"BELFAST PANTALON AL TOBILLO T1\",\"codigo\":\"330001032\",\"cantidad\":\"1\",\"precio\":\"900.00\",\"descuento\":\"0.00\",\"total\":\"900.00\"}]', 0, 0, 900, 0, '[{\"id\":\"1\",\"fecha\":\"23-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"900\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-23 22:05:10'),
(17, '2021-08-23', 'FC', '0001-00000118', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"375\",\"descripcion\":\"NECESER ESTRELLAS\",\"codigo\":\"8195\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 0, 0, 1500, 0, '[{\"id\":\"1\",\"fecha\":\"23-08-2021\",\"tipo\":\"TARJETA\",\"importe\":\"1500\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-08-23 22:09:38'),
(18, '2021-08-24', 'FC', '0001-00000119', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"234\",\"descripcion\":\"BOLSO ESTAMPADO\",\"codigo\":\"4135\",\"cantidad\":\"1\",\"precio\":\"2000.00\",\"descuento\":\"0.00\",\"total\":\"2000.00\"}]', 0, 0, 2000, 0, '[{\"id\":\"1\",\"fecha\":\"24-08-2021\",\"tipo\":\"TARJETA\",\"importe\":\"2000\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-08-24 20:20:44'),
(19, '2021-08-24', 'FC', '0001-00000120', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"560\",\"descripcion\":\"BARBIJO DE TELA\",\"codigo\":\".1\",\"cantidad\":\"1\",\"precio\":\"200.00\",\"descuento\":\"0.00\",\"total\":\"200.00\"}]', 0, 0, 200, 0, '[{\"id\":\"1\",\"fecha\":\"24-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"200\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-24 21:32:52'),
(20, '2021-08-25', 'FC', '0001-00000121', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"126\",\"descripcion\":\"HOLDERS TRENSADO\",\"codigo\":\"2105\",\"cantidad\":\"1\",\"precio\":\"600.00\",\"descuento\":\"0.00\",\"total\":\"600.00\"},{\"id\":\"454\",\"descripcion\":\"PARAGUAS TRENDY BEIGE/ MARRON\",\"codigo\":\"6172\",\"cantidad\":\"1\",\"precio\":\"900.00\",\"descuento\":\"0.00\",\"total\":\"900.00\"}]', 0, 0, 1500, 0, '[{\"id\":\"1\",\"fecha\":\"25-08-2021\",\"tipo\":\"TARJETA\",\"importe\":\"1500\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-08-25 13:59:14'),
(21, '2021-08-25', 'FC', '0001-00000122', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"540\",\"descripcion\":\"ZAP AV GRIS C/ROSA\",\"codigo\":\"TENIS AVURA\",\"cantidad\":\"1\",\"precio\":\"4800.00\",\"descuento\":\"0.00\",\"total\":\"4800.00\"},{\"id\":\"146\",\"descripcion\":\"CARTUCHERA EVERLAST FUCSIA\",\"codigo\":\"11245\",\"cantidad\":\"1\",\"precio\":\"1100.00\",\"descuento\":\"0.00\",\"total\":\"1100.00\"},{\"id\":\"152\",\"descripcion\":\"CARTERA GAMUZADA MARRON\",\"codigo\":\"76875.6\",\"cantidad\":\"1\",\"precio\":\"1900.00\",\"descuento\":\"0.00\",\"total\":\"1900.00\"}]', 0, 0, 7800, 0, '[{\"id\":\"1\",\"fecha\":\"25-08-2021\",\"tipo\":\"TARJETA\",\"importe\":\"7800\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-08-25 14:53:06'),
(22, '2021-08-26', 'FC', '0001-00000123', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"97\",\"descripcion\":\"BLUSA JALES T M\",\"codigo\":\"210243AA\",\"cantidad\":\"1\",\"precio\":\"1000.00\",\"descuento\":\"0.00\",\"total\":\"1000.00\"},{\"id\":\"98\",\"descripcion\":\"BLUSA SEARA T M\",\"codigo\":\"210325AA\",\"cantidad\":\"1\",\"precio\":\"1200.00\",\"descuento\":\"0.00\",\"total\":\"1200.00\"}]', 0, 0, 2200, 0, '[{\"id\":\"1\",\"fecha\":\"26-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"2200\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-26 14:41:13'),
(23, '2021-08-26', 'FC', '0001-00000124', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"357\",\"descripcion\":\"MOCHILA DOBLE CIERRE NATIVA NEGRO\",\"codigo\":\"29320\",\"cantidad\":\"1\",\"precio\":\"4700.00\",\"descuento\":\"0.00\",\"total\":\"4700.00\"}]', 0, 0, 4700, 0, '[{\"id\":\"1\",\"fecha\":\"26-08-2021\",\"tipo\":\"TARJETA\",\"importe\":\"4700\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-08-26 21:12:51'),
(24, '2021-08-26', 'FC', '0001-00000125', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"222\",\"descripcion\":\"MOCHILITA MARRON NATIVA\",\"codigo\":\"18420\",\"cantidad\":\"1\",\"precio\":\"1950.00\",\"descuento\":\"0.00\",\"total\":\"1950.00\"}]', 0, 0, 1950, 0, '[{\"id\":\"1\",\"fecha\":\"26-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"1950\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-26 21:29:07'),
(25, '2021-08-28', 'FC', '0001-00000126', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"273\",\"descripcion\":\"MOCHILA LENTEJUELAS\",\"codigo\":\"2938.1\",\"cantidad\":\"1\",\"precio\":\"2400.00\",\"descuento\":\"0.00\",\"total\":\"2400.00\"}]', 0, 0, 2400, 0, '[{\"id\":\"1\",\"fecha\":\"28-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"2400\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-28 14:27:07'),
(26, '2021-08-28', 'FC', '0001-00000127', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"274\",\"descripcion\":\"MOCHILA MEDIANA LENTEJUELAS\",\"codigo\":\"19077.1\",\"cantidad\":\"1\",\"precio\":\"2400.00\",\"descuento\":\"0.00\",\"total\":\"2400.00\"}]', 0, 0, 2400, 0, '[{\"id\":\"1\",\"fecha\":\"28-08-2021\",\"tipo\":\"TARJETA\",\"importe\":\"2400\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-08-28 20:23:20'),
(27, '2021-08-30', 'FC', '0001-00000128', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"5\",\"descripcion\":\"FOUR PANTALON CHUPIN CON ROTURAS T 22\",\"codigo\":\"310001014\",\"cantidad\":\"1\",\"precio\":\"500.00\",\"descuento\":\"0.00\",\"total\":\"500.00\"}]', 0, 0, 500, 0, '[{\"id\":\"1\",\"fecha\":\"30-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"500\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-30 21:04:23'),
(28, '2021-08-31', 'FC', '0001-00000129', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"367\",\"descripcion\":\"BOLSITO CON CORREA ESTAMPADO\",\"codigo\":\"15318.7\",\"cantidad\":\"1\",\"precio\":\"1300.00\",\"descuento\":\"0.00\",\"total\":\"1300.00\"}]', 0, 0, 1300, 0, '[{\"id\":\"1\",\"fecha\":\"31-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"1300\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-31 20:48:23'),
(29, '2021-08-31', 'FC', '0001-00000130', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"253\",\"descripcion\":\"BOLSO NATIVA MARRON\",\"codigo\":\"407.4\",\"cantidad\":\"1\",\"precio\":\"2900.00\",\"descuento\":\"0.00\",\"total\":\"2900.00\"}]', 0, 0, 2900, 0, '[{\"id\":\"1\",\"fecha\":\"31-08-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"2900\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-08-31 22:15:22'),
(30, '2021-09-01', 'FC', '0001-00000131', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"499\",\"descripcion\":\"PAÑUELO PLISADO\",\"codigo\":\"PA1589\",\"cantidad\":\"1\",\"precio\":\"860.00\",\"descuento\":\"0.00\",\"total\":\"860.00\"}]', 0, 0, 860, 0, '[{\"id\":\"1\",\"fecha\":\"01-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"860\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-01 12:50:43'),
(31, '2021-09-01', 'FC', '0001-00000132', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"35\",\"descripcion\":\"DOUBLE FALDA DEMIN COMBINADA T 2\",\"codigo\":\"PMU02P01113\",\"cantidad\":\"1\",\"precio\":\"500.00\",\"descuento\":\"0.00\",\"total\":\"500.00\"},{\"id\":\"562\",\"descripcion\":\"CAMISA JANO T L\",\"codigo\":\"051652AA\",\"cantidad\":\"1\",\"precio\":\"500.00\",\"descuento\":\"0.00\",\"total\":\"500.00\"}]', 0, 0, 1000, 0, '[{\"id\":\"1\",\"fecha\":\"01-09-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"1000\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-09-01 20:51:52'),
(32, '2021-09-01', 'FC', '0001-00000133', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"96\",\"descripcion\":\"BLUSA IDAPOR T S\",\"codigo\":\"210342\",\"cantidad\":\"1\",\"precio\":\"1200.00\",\"descuento\":\"0.00\",\"total\":\"1200.00\"},{\"id\":\"33\",\"descripcion\":\"TERESITA POLLERA T2\",\"codigo\":\"33B602007\",\"cantidad\":\"1\",\"precio\":\"300.00\",\"descuento\":\"0.00\",\"total\":\"300.00\"},{\"id\":\"34\",\"descripcion\":\"TERESITA POLLERA T3\",\"codigo\":\"33B602007\",\"cantidad\":\"1\",\"precio\":\"300.00\",\"descuento\":\"0.00\",\"total\":\"300.00\"},{\"id\":\"53\",\"descripcion\":\"DUBLIN REMERA TOP NOCHE T 3\",\"codigo\":\"PMU0901099\",\"cantidad\":\"1\",\"precio\":\"300.00\",\"descuento\":\"0.00\",\"total\":\"300.00\"},{\"id\":\"97\",\"descripcion\":\"BLUSA JALES T M\",\"codigo\":\"210243AA\",\"cantidad\":\"1\",\"precio\":\"1000.00\",\"descuento\":\"0.00\",\"total\":\"1000.00\"}]', 0, 0, 3100, 0, '[{\"id\":\"1\",\"fecha\":\"01-09-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"3100\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-09-01 22:09:42'),
(33, '2021-09-02', 'FC', '0001-00000134', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"200\",\"descripcion\":\"VASO UNICORNIO\",\"codigo\":\"10982\",\"cantidad\":\"1\",\"precio\":\"1300.00\",\"descuento\":\"0.00\",\"total\":\"1300.00\"},{\"id\":\"384\",\"descripcion\":\"SOMBRERITO INAMURAKAMI\",\"codigo\":\"8347\",\"cantidad\":\"1\",\"precio\":\"900.00\",\"descuento\":\"0.00\",\"total\":\"900.00\"},{\"id\":\"181\",\"descripcion\":\"CARTERA DE MANO NEGRA\",\"codigo\":\"54\",\"cantidad\":\"1\",\"precio\":\"3200.00\",\"descuento\":\"0.00\",\"total\":\"3200.00\"}]', 0, 0, 5400, 0, '[{\"id\":\"1\",\"fecha\":\"02-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"5400\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-02 21:12:15'),
(34, '2021-09-02', 'FC', '0001-00000135', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"515\",\"descripcion\":\"BLANCA CON LILA\",\"codigo\":\"OJ HAWAIIAN\",\"cantidad\":\"1\",\"precio\":\"1200.00\",\"descuento\":\"0.00\",\"total\":\"1200.00\"}]', 0, 0, 1200, 0, '[{\"id\":\"1\",\"fecha\":\"02-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"1200\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-02 21:14:02'),
(35, '2021-09-03', 'FC', '0001-00000136', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"321\",\"descripcion\":\"CARTERA LIMA\",\"codigo\":\"M339\",\"cantidad\":\"1\",\"precio\":\"6200.00\",\"descuento\":\"0.00\",\"total\":\"6200.00\"},{\"id\":\"290\",\"descripcion\":\"CARTERA LIMA GRIS\",\"codigo\":\"H212\",\"cantidad\":\"1\",\"precio\":\"3900.00\",\"descuento\":\"0.00\",\"total\":\"3900.00\"}]', 0, 0, 10100, 0, '[{\"id\":\"1\",\"fecha\":\"03-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"10100\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-03 22:16:08'),
(36, '2021-09-03', 'FC', '0001-00000137', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"157\",\"descripcion\":\"MORRAL CUPLIN\",\"codigo\":\"532\",\"cantidad\":\"1\",\"precio\":\"900.00\",\"descuento\":\"0.00\",\"total\":\"900.00\"}]', 0, 0, 900, 0, '[{\"id\":\"1\",\"fecha\":\"03-09-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"900\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-09-03 22:16:46'),
(37, '2021-09-03', 'FC', '0001-00000138', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"216\",\"descripcion\":\"MOCHILITA CHAROL CRAQUELADA BORDO\",\"codigo\":\"9233·9\",\"cantidad\":\"1\",\"precio\":\"2100.00\",\"descuento\":\"0.00\",\"total\":\"2100.00\"},{\"id\":\"275\",\"descripcion\":\"MOCHILITA COLORES\",\"codigo\":\"9234.4\",\"cantidad\":\"1\",\"precio\":\"2500.00\",\"descuento\":\"0.00\",\"total\":\"2500.00\"}]', 0, 0, 4600, 0, '[{\"id\":\"1\",\"fecha\":\"03-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"4600\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-03 22:20:01'),
(38, '2021-09-03', 'FC', '0001-00000139', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"303\",\"descripcion\":\"MOCHILA TRIANGULAR ESTRELLITAS, COLORES\",\"codigo\":\"1801·4\",\"cantidad\":\"1\",\"precio\":\"2600.00\",\"descuento\":\"0.00\",\"total\":\"2600.00\"}]', 0, 0, 2600, 0, '[{\"id\":\"1\",\"fecha\":\"03-09-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"2600\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-09-03 22:22:30'),
(39, '2021-09-04', 'FC', '0001-00000140', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"221\",\"descripcion\":\"MOCHILITA FLECOS GAMUZA VERDE MILITAR\",\"codigo\":\"17290·3\",\"cantidad\":\"1\",\"precio\":\"1650.00\",\"descuento\":\"0.00\",\"total\":\"1650.00\"}]', 0, 0, 1650, 0, '[{\"id\":\"1\",\"fecha\":\"04-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"1650\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-04 15:25:00'),
(40, '2021-09-04', 'FC', '0001-00000141', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"541\",\"descripcion\":\"CHATITA NEGRA\",\"codigo\":\"CH TINA\",\"cantidad\":\"1\",\"precio\":\"2100.00\",\"descuento\":\"0.00\",\"total\":\"2100.00\"}]', 0, 0, 2100, 0, '[{\"id\":\"3\",\"fecha\":\"04-09-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"2100\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-09-04 22:41:42'),
(41, '2021-09-06', 'FC', '0001-00000142', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"125\",\"descripcion\":\"HOLDERS CADENA\",\"codigo\":\"2101\",\"cantidad\":\"1\",\"precio\":\"600.00\",\"descuento\":\"0.00\",\"total\":\"600.00\"}]', 0, 0, 600, 0, '[{\"id\":\"1\",\"fecha\":\"06-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"600\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-06 20:54:16'),
(42, '2021-09-06', 'FC', '0001-00000143', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"194\",\"descripcion\":\"BOLSITO LOVE YOU NATIVA\",\"codigo\":\"8002.6\",\"cantidad\":\"1\",\"precio\":\"1550.00\",\"descuento\":\"0.00\",\"total\":\"1550.00\"}]', 0, 0, 1550, 0, '[{\"id\":\"1\",\"fecha\":\"06-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"1550\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-06 22:50:13'),
(43, '2021-09-06', 'FC', '0001-00000144', 1, 'MORE', '40804417', 65, '[{\"id\":\"590\",\"descripcion\":\"OTROS\",\"codigo\":\"otros\",\"cantidad\":\"1\",\"precio\":\"0.00\",\"descuento\":\"-1000.00\",\"total\":\"1000.00\"}]', 0, 0, 1000, 0, '[{\"id\":\"1\",\"fecha\":\"06-09-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"1000\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-09-06 23:01:06'),
(44, '2021-09-06', 'FC', '0001-00000145', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"145\",\"descripcion\":\"CARTUCHERA EVERLAST LILA\",\"codigo\":\"11244\",\"cantidad\":\"1\",\"precio\":\"700.00\",\"descuento\":\"0.00\",\"total\":\"700.00\"}]', 0, 0, 700, 0, '[{\"id\":\"1\",\"fecha\":\"06-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"700\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-06 23:02:21'),
(45, '2021-09-07', 'FC', '0001-00000146', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"293\",\"descripcion\":\"PORTA PAPELES\",\"codigo\":\"ART08\",\"cantidad\":\"1\",\"precio\":\"1500.00\",\"descuento\":\"0.00\",\"total\":\"1500.00\"}]', 0, 0, 1500, 0, '[{\"id\":\"1\",\"fecha\":\"07-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"1500\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-07 22:52:31'),
(46, '2021-09-07', 'FC', '0001-00000147', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"304\",\"descripcion\":\"CARTERITA REDONDA CELESTE CON TACHAS\",\"codigo\":\"1265\",\"cantidad\":\"1\",\"precio\":\"900.00\",\"descuento\":\"0.00\",\"total\":\"900.00\"}]', 0, 0, 900, 0, '[{\"id\":\"1\",\"fecha\":\"07-09-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"900\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-09-07 22:53:08'),
(47, '2021-09-07', 'FC', '0001-00000148', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"520\",\"descripcion\":\"OJOTA ROSA\",\"codigo\":\"OJOTA IBIZA\",\"cantidad\":\"1\",\"precio\":\"1900.00\",\"descuento\":\"0.00\",\"total\":\"1900.00\"},{\"id\":\"521\",\"descripcion\":\"OJOTA ROSA C/BLANCA\",\"codigo\":\"SA DILET D\",\"cantidad\":\"1\",\"precio\":\"1900.00\",\"descuento\":\"0.00\",\"total\":\"1900.00\"}]', 0, 0, 3800, 0, '[{\"id\":\"1\",\"fecha\":\"07-09-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"3800\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-09-07 22:55:34'),
(48, '2021-09-07', 'FC', '0001-00000149', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"411\",\"descripcion\":\"BILLETERA LIMA REPTIL\",\"codigo\":\"I217\",\"cantidad\":\"1\",\"precio\":\"2200.00\",\"descuento\":\"0.00\",\"total\":\"2200.00\"}]', 0, 0, 2200, 2200, '[{\"id\":\"1\",\"fecha\":\"07-09-2021\",\"tipo\":\"CTA.CORRIENTE\",\"importe\":\"2200\",\"referencia\":\"CTA.CORRIENTE\"}]', '0000-00-00', '', '', 0, '2021-09-07 23:02:06'),
(49, '2021-09-08', 'FC', '0001-00000150', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"351\",\"descripcion\":\"BOLSO NATIVA NEGRO\",\"codigo\":\"79767·4\",\"cantidad\":\"1\",\"precio\":\"2900.00\",\"descuento\":\"0.00\",\"total\":\"2900.00\"}]', 0, 0, 2900, 0, '[{\"id\":\"1\",\"fecha\":\"08-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"2900\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-08 13:44:40'),
(50, '2021-09-08', 'FC', '0001-00000151', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"63\",\"descripcion\":\"JAQUIES REMERA T3\",\"codigo\":\"327809150\",\"cantidad\":\"1\",\"precio\":\"1600.00\",\"descuento\":\"0.00\",\"total\":\"1600.00\"}]', 0, 0, 1600, 0, '[{\"id\":\"1\",\"fecha\":\"08-09-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"1600\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-09-08 13:51:36'),
(51, '2021-09-08', 'FC', '0001-00000152', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"178\",\"descripcion\":\"MOCHILITA MARRON CON TACHITAS\",\"codigo\":\"2014\",\"cantidad\":\"1\",\"precio\":\"2100.00\",\"descuento\":\"0.00\",\"total\":\"2100.00\"}]', 0, 0, 2100, 0, '[{\"id\":\"1\",\"fecha\":\"08-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"2100\",\"referencia\":\"TARJETA\"},{\"id\":\"2\",\"fecha\":\"08-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"0\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-08 13:54:03'),
(52, '2021-09-08', 'FC', '0001-00000153', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"567\",\"descripcion\":\"BILLETERA PRATIS\",\"codigo\":\"WL44004\",\"cantidad\":\"1\",\"precio\":\"1300.00\",\"descuento\":\"0.00\",\"total\":\"1300.00\"}]', 0, 0, 1300, 0, '[{\"id\":\"1\",\"fecha\":\"08-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"1300\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-08 13:56:06'),
(53, '2021-09-08', 'FC', '0001-00000154', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"282\",\"descripcion\":\"BOSITO GAMUZA MOSTAZA\",\"codigo\":\"15306.6\",\"cantidad\":\"1\",\"precio\":\"1600.00\",\"descuento\":\"0.00\",\"total\":\"1600.00\"}]', 0, 0, 1600, 0, '[{\"id\":\"1\",\"fecha\":\"08-09-2021\",\"tipo\":\"TARJETA\",\"importe\":\"1600\",\"referencia\":\"TARJETA\"}]', '0000-00-00', '', '', 0, '2021-09-08 13:56:44'),
(59, '2021-10-22', 'FC', '0001-00000160', 3, 'CARMEN SOSA', '0', 65, '[{\"id\":\"342\",\"descripcion\":\"ZAPHIR CARTERA BORDO TACHAS DORADAS\",\"codigo\":\"YG4256\",\"cantidad\":\"1\",\"precio\":\"4200.00\",\"descuento\":\"0.00\",\"total\":\"4200.00\"}]', 0, 0, 4200, 0, '[{\"id\":\"1\",\"fecha\":\"22-10-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"4200\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-10-22 21:35:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `condicioniva`
--
ALTER TABLE `condicioniva`
  ADD PRIMARY KEY (`idcondicioniva`);

--
-- Indices de la tabla `datostitular`
--
ALTER TABLE `datostitular`
  ADD PRIMARY KEY (`iddatostitular`),
  ADD UNIQUE KEY `iddatostitular` (`iddatostitular`);

--
-- Indices de la tabla `descripcion_productos`
--
ALTER TABLE `descripcion_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modificacion_precios`
--
ALTER TABLE `modificacion_precios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nrocomprobante`
--
ALTER TABLE `nrocomprobante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipocliente`
--
ALTER TABLE `tipocliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vales`
--
ALTER TABLE `vales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `backup`
--
ALTER TABLE `backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `condicioniva`
--
ALTER TABLE `condicioniva`
  MODIFY `idcondicioniva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `descripcion_productos`
--
ALTER TABLE `descripcion_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modificacion_precios`
--
ALTER TABLE `modificacion_precios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nrocomprobante`
--
ALTER TABLE `nrocomprobante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=592;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipocliente`
--
ALTER TABLE `tipocliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `vales`
--
ALTER TABLE `vales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
