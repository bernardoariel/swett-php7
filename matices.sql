-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2021 a las 17:20:33
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matices`
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
(1, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"ZAP1\",\"nombre\":\"ZAPATILLA DIOR TALLE 35\",\"descripcion\":\"DORADO\",\"stock\":\"8\",\"precio_compra\":\"0\",\"precio_venta\":\"1500\",\"ventas\":\"2\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-22 20:36:09\"}', '{\"id_categoria\":\"1\",\"codigo\":\"ZAP1\",\"nombre\":\"ZAPATILLA DIOR TALLE 35\",\"descripcion\":\"DORADO\",\"stock\":\"8\",\"precio_compra\":0,\"precio_venta\":\"1500\"}', '2021-10-22 23:38:02', 'Administrador'),
(2, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"ZAP1\",\"nombre\":\"ZAPATILLA DIOR TALLE 35\",\"descripcion\":\"DORADO\",\"stock\":\"7\",\"precio_compra\":\"500\",\"precio_venta\":\"1500\",\"ventas\":\"3\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-22 20:39:52\"}', '{\"id_categoria\":\"1\",\"codigo\":\"ZAP1\",\"nombre\":\"ZAPATILLA DIOR TALLE 35\",\"descripcion\":\"DORADO\",\"stock\":\"6\",\"precio_compra\":0,\"precio_venta\":\"1500\"}', '2021-10-22 23:48:13', 'Administrador'),
(3, 'productos', 'ELIMINAR', '{\"id_categoria\":\"1\",\"codigo\":\"ZAP1\",\"nombre\":\"ZAPATILLA DIOR TALLE 35\",\"descripcion\":\"DORADO\",\"stock\":\"6\",\"precio_compra\":\"0\",\"precio_venta\":\"1500\",\"ventas\":\"3\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-22 20:48:13\"}', '{\"id\":\"1\"}', '2021-10-23 22:30:29', 'Administrador'),
(4, 'productos', 'ELIMINAR', '{\"id_categoria\":\"1\",\"codigo\":\"ZAP2\",\"nombre\":\"ZAPA ATOMIK DAMA\",\"descripcion\":\"NEGRA\",\"stock\":\"10\",\"precio_compra\":\"0\",\"precio_venta\":\"2500\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-22 20:31:14\"}', '{\"id\":\"2\"}', '2021-10-23 22:30:34', 'Administrador'),
(5, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"4005\",\"nombre\":\"ZAP BOTITA ESTRELLA TALLE 37\",\"descripcion\":\"GRIS\",\"stock\":\"1\",\"precio_compra\":\"2150\",\"precio_venta\":\"4500\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-23 20:15:08\"}', '{\"id_categoria\":\"1\",\"codigo\":\"4005\",\"nombre\":\"ZAP BOTITA ESTRELLA TALLE 37\",\"descripcion\":\"GRIS\",\"stock\":\"1\",\"precio_compra\":\"2135\",\"precio_venta\":\"4500\"}', '2021-10-23 23:15:23', 'Administrador'),
(6, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"4005\",\"nombre\":\"ZAP BOTITA ESTRELLA TALLE 37\",\"descripcion\":\"GRIS\",\"stock\":\"1\",\"precio_compra\":\"2135\",\"precio_venta\":\"4500\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-23 20:15:23\"}', '{\"id_categoria\":\"1\",\"codigo\":\"4005\",\"nombre\":\"ZAP BOTITA ESTRELLA TALLE 36\",\"descripcion\":\"GRIS\",\"stock\":\"1\",\"precio_compra\":\"2135\",\"precio_venta\":\"4500\"}', '2021-10-23 23:15:42', 'Administrador'),
(7, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"4005\",\"nombre\":\"ZAP BOTITA ESTRELLA TALLE 36\",\"descripcion\":\"GRIS\",\"stock\":\"1\",\"precio_compra\":\"2135\",\"precio_venta\":\"4500\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-23 20:15:42\"}', '{\"id_categoria\":\"1\",\"codigo\":\"4005\",\"nombre\":\"ZAP BOTITA ESTRELLA TALLE 37\",\"descripcion\":\"GRIS\",\"stock\":\"1\",\"precio_compra\":\"2135\",\"precio_venta\":\"4500\"}', '2021-10-23 23:16:03', 'Administrador'),
(8, 'productos', 'ELIMINAR', '{\"id_categoria\":\"1\",\"codigo\":\"4005\",\"nombre\":\"ZAP BOTITA ESTRELLA TALLE 37\",\"descripcion\":\"GRIS\",\"stock\":\"1\",\"precio_compra\":\"2135\",\"precio_venta\":\"4500\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-23 20:16:04\"}', '{\"id\":\"35\"}', '2021-10-23 23:16:14', 'Administrador'),
(9, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"4005\",\"nombre\":\"ZAP BOTITA ESTRELLA TALLE 37\",\"descripcion\":\"GRIS\",\"stock\":\"1\",\"precio_compra\":\"2135\",\"precio_venta\":\"4500\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-23 20:16:04\"}', '{\"id_categoria\":\"1\",\"codigo\":\"4005\",\"nombre\":\"ZAP BOTITA ESTRELLA TALLE 36\",\"descripcion\":\"GRIS\",\"stock\":\"1\",\"precio_compra\":\"2135\",\"precio_venta\":\"4500\"}', '2021-10-23 23:16:25', 'Administrador'),
(10, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"490\",\"nombre\":\"KENDRA\",\"descripcion\":\"AMARILLA.ROJA\",\"stock\":\"6\",\"precio_compra\":\"1805\",\"precio_venta\":\"4200\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-25 09:42:43\"}', '{\"id_categoria\":\"2\",\"codigo\":\"490\",\"nombre\":\"KENDRA\",\"descripcion\":\"AMARILLA.ROJA\",\"stock\":\"6\",\"precio_compra\":\"1805\",\"precio_venta\":\"4200\"}', '2021-10-25 12:43:42', 'Administrador'),
(11, 'productos', 'UPDATE', '{\"id_categoria\":\"2\",\"codigo\":\"210\",\"nombre\":\"CALISTA\",\"descripcion\":\"NEGRO\",\"stock\":\"6\",\"precio_compra\":\"1860\",\"precio_venta\":\"4300\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-25 09:45:27\"}', '{\"id_categoria\":\"2\",\"codigo\":\"210\",\"nombre\":\"CALISTA\",\"descripcion\":\"NEGRO\",\"stock\":\"4\",\"precio_compra\":\"1860\",\"precio_venta\":\"4300\"}', '2021-10-25 12:54:40', 'Administrador'),
(12, 'productos', 'UPDATE', '{\"id_categoria\":\"2\",\"codigo\":\"atomik\",\"nombre\":\"CORDON GEODE\",\"descripcion\":\"NEGRO\",\"stock\":\"12\",\"precio_compra\":\"4481.08\",\"precio_venta\":\"10800\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-25 10:24:25\"}', '{\"id_categoria\":\"1\",\"codigo\":\"atomik\",\"nombre\":\"CORDON GEODE\",\"descripcion\":\"NEGRO\",\"stock\":\"12\",\"precio_compra\":\"4481.08\",\"precio_venta\":\"10800\"}', '2021-10-25 13:24:53', 'Administrador'),
(13, 'ventas', 'ELIMINAR', '{\"id\":\"2\",\"fecha\":\"2021-10-22\",\"codigo\":\"0001-00000002\",\"id_cliente\":\"1\",\"id_vendedor\":\"64\",\"productos\":\"[{\\\"id\\\":\\\"1\\\",\\\"descripcion\\\":\\\"ZAPATILLA DIOR TALLE 35\\\",\\\"codigo\\\":\\\"ZAP1\\\",\\\"cantidad\\\":\\\"1\\\",\\\"precio\\\":\\\"1500.00\\\",\\\"descuento\\\":\\\"0.00\\\",\\\"total\\\":\\\"1500.00\\\"}]\",\"impuesto\":\"0\",\"total\":\"1500\",\"adeuda\":\"0\",\"metodo_pago\":\"[{\\\"id\\\":\\\"1\\\",\\\"fecha\\\":\\\"22-10-2021\\\",\\\"tipo\\\":\\\"EFECTIVO\\\",\\\"importe\\\":\\\"1500\\\",\\\"referencia\\\":\\\"EFECTIVO\\\"}]\",\"fechapago\":\"0000-00-00\",\"referenciapago\":\"\",\"observaciones\":\"\"}', '{\"id\":\"2\"}', '2021-10-25 13:51:09', 'Administrador'),
(14, 'ventas', 'ELIMINAR', '{\"id\":\"1\",\"fecha\":\"2021-10-22\",\"codigo\":\"0001-00000001\",\"id_cliente\":\"1\",\"id_vendedor\":\"65\",\"productos\":\"[{\\\"id\\\":\\\"1\\\",\\\"descripcion\\\":\\\"ZAPATILLA DIOR TALLE 35\\\",\\\"codigo\\\":\\\"ZAP1\\\",\\\"cantidad\\\":\\\"2\\\",\\\"precio\\\":\\\"1500.00\\\",\\\"descuento\\\":\\\"0.00\\\",\\\"total\\\":\\\"3000.00\\\"}]\",\"impuesto\":\"0\",\"total\":\"3000\",\"adeuda\":\"0\",\"metodo_pago\":\"[{\\\"id\\\":\\\"1\\\",\\\"fecha\\\":\\\"22-10-2021\\\",\\\"tipo\\\":\\\"EFECTIVO\\\",\\\"importe\\\":\\\"3000\\\",\\\"referencia\\\":\\\"EFECTIVO\\\"}]\",\"fechapago\":\"0000-00-00\",\"referenciapago\":\"\",\"observaciones\":\"\"}', '{\"id\":\"1\"}', '2021-10-25 13:51:19', 'Administrador'),
(15, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"gummi\",\"nombre\":\"ZAP DAMA FORCE\",\"descripcion\":\"NEGRO\",\"stock\":\"12\",\"precio_compra\":\"1\",\"precio_venta\":\"5900\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-25 11:29:57\"}', '{\"id_categoria\":\"1\",\"codigo\":\"gummi\",\"nombre\":\"ZAP DAMA FORCE\",\"descripcion\":\"NEGRO\",\"stock\":\"12\",\"precio_compra\":\"1\",\"precio_venta\":\"6400\"}', '2021-10-25 14:31:17', 'Administrador'),
(16, 'productos', 'ELIMINAR', '{\"id_categoria\":\"1\",\"codigo\":\"gummi\",\"nombre\":\"ZAP DAMA FORCE\",\"descripcion\":\"NEGRO\",\"stock\":\"12\",\"precio_compra\":\"1\",\"precio_venta\":\"6400\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-25 11:31:17\"}', '{\"id\":\"79\"}', '2021-10-25 14:31:49', 'Administrador'),
(17, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"gummi\",\"nombre\":\"ZAP PICO\",\"descripcion\":\"GRIS\",\"stock\":\"10\",\"precio_compra\":\"1\",\"precio_venta\":\"4990\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-25 11:46:51\"}', '{\"id_categoria\":\"1\",\"codigo\":\"gummi\",\"nombre\":\"ZAP PICO\",\"descripcion\":\"GRIS\",\"stock\":\"7\",\"precio_compra\":\"1\",\"precio_venta\":\"4990\"}', '2021-10-25 14:47:42', 'Administrador'),
(18, 'productos', 'UPDATE', '{\"id_categoria\":\"1\",\"codigo\":\"gummi\",\"nombre\":\"ZAP PICO\",\"descripcion\":\"GRIS\",\"stock\":\"7\",\"precio_compra\":\"1\",\"precio_venta\":\"4990\",\"ventas\":\"0\",\"obs\":\"\",\"iva\":\"0\",\"activo\":\"1\",\"obsdel\":\"\",\"fecha\":\"2021-10-25 11:47:42\"}', '{\"id_categoria\":\"1\",\"codigo\":\"gummi\",\"nombre\":\"ZAP PICO\",\"descripcion\":\"GRIS\",\"stock\":\"7\",\"precio_compra\":\"1\",\"precio_venta\":\"4995\"}', '2021-10-25 15:18:47', 'Administrador');

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
(1, '2021-10-22', '0', '0', '0', '0', '0', '0'),
(2, '2021-10-23', '0', '0', '0', '0', '0', '0'),
(3, '2021-10-25', '3900', '0', '0', '0', '0', '0');

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
(1, 'ZAPATILLAS', 'ZAP', 63, 'SI', '', 1, '', '2021-10-25 14:46:51'),
(2, 'SANDALIAS', 'SAND', 21, 'SI', '', 1, '', '2021-10-25 14:42:20');

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
(1, 'CONSUMIDOR FINAL', '.', '(370) 426-3773', 40804417, '20', 2, 'EMAIL@EMAIL.COM', 1, 10, '2021-10-25 10:51:03', '.', 1, '', '2021-10-25 13:51:20');

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
(2, 'FC', 4);

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
(3, 3, '2021-10-25', 'EFECTIVO', 'EFECTIVO', 3900);

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
(1, 'PRECIO-COSTO', 'enabled'),
(2, 'JSON', 'SI'),
(3, 'RUTA', 'C:\\Users\\usuario\\Documents\\bd-respaldo'),
(4, 'BD', 'matices'),
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
(3, 'ZAP PASTEL TALLE 36', 'MULTICOLOR', '1220', 1, 0, 0, 1, 1895, 4300, 0, '', 0, 1, '', '2021-10-23 22:34:14'),
(4, 'ZAP PASTEL TALLE 38', 'MULTICOLOR', '1220', 1, 0, 0, 1, 1895, 4300, 0, '', 0, 1, '', '2021-10-23 22:34:51'),
(5, 'ZAP PASTEL TALLE 39', 'MULTICOLOR', '1220', 1, 0, 0, 1, 1895, 4300, 0, '', 0, 1, '', '2021-10-23 22:35:45'),
(6, 'ZAP PASTEL TALLE 40', 'MULTICOLOR', '1220', 1, 0, 0, 1, 1895, 4300, 0, '', 0, 1, '', '2021-10-23 22:36:53'),
(7, 'ZAP TALLE 36', 'ROJA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:41:57'),
(8, 'ZAP TALLE 37', 'ROJA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:42:24'),
(9, 'ZAP TALLE 38', 'ROJA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:43:03'),
(10, 'ZAP TALLE 39', 'ROJA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:43:41'),
(11, 'ZAP TALLE 40', 'ROJA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:44:13'),
(12, 'ZAP TALLE 35', 'BLANCA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:45:25'),
(13, 'ZAP TALLE 37', 'BLANCA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:45:59'),
(14, 'ZAP TALLE 36', 'BLANCA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:46:48'),
(15, 'ZAP TALLE 38', 'BLANCA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:47:48'),
(16, 'ZAP TALLE 39', 'BLANCA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:48:19'),
(17, 'ZAP TALLE 40', 'BLANCA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:48:54'),
(18, 'ZAP TALLE 35', 'NEGRA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:49:42'),
(19, 'ZAP TALLE 37', 'NEGRA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:50:21'),
(20, 'ZAP TALLE 38', 'NEGRA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:51:13'),
(21, 'ZAP TALLE 39', 'NEGRA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:52:02'),
(22, 'ZAP TALLE 40', 'NEGRA', '1190', 1, 0, 0, 1, 2080, 4800, 0, '', 0, 1, '', '2021-10-23 22:52:43'),
(23, 'ZAP BOTITA TALLE 36', 'NEGRA', '3005', 1, 0, 0, 1, 1895, 4200, 0, '', 0, 1, '', '2021-10-23 22:57:52'),
(24, 'ZAP BOTITA TALLE 37', 'NEGRA', '3005', 1, 0, 0, 1, 1895, 4200, 0, '', 0, 1, '', '2021-10-23 22:58:19'),
(25, 'ZAP BOTITA TALLE 38', 'NEGRA', '3005', 1, 0, 0, 1, 1895, 4200, 0, '', 0, 1, '', '2021-10-23 22:58:53'),
(26, 'ZAP BOTITA TALLE 39', 'NEGRA', '3005', 1, 0, 0, 1, 1895, 4200, 0, '', 0, 1, '', '2021-10-23 22:59:27'),
(27, 'ZAP BOTITA TALLE 40', 'NEGRA', '3005', 1, 0, 0, 1, 1895, 4200, 0, '', 0, 1, '', '2021-10-23 22:59:55'),
(28, 'ZAP CORDONES TALLE 35', 'NEGRA', '1102', 1, 0, 0, 1, 1950, 4300, 0, '', 0, 1, '', '2021-10-23 23:02:56'),
(29, 'ZAP CORDONES TALLE 36', 'NEGRA', '1102', 1, 0, 0, 1, 1950, 4300, 0, '', 0, 1, '', '2021-10-23 23:03:31'),
(30, 'ZAP CORDONES TALLE 37', 'NEGRA', '1102', 1, 0, 0, 1, 1950, 4300, 0, '', 0, 1, '', '2021-10-23 23:03:53'),
(31, 'ZAP CORDONES TALLE 38', 'NEGRA', '1102', 1, 0, 0, 1, 1950, 4300, 0, '', 0, 1, '', '2021-10-23 23:04:35'),
(32, 'ZAP CORDONES TALLE 39', 'NEGRA', '1102', 1, 0, 0, 1, 1950, 4300, 0, '', 0, 1, '', '2021-10-23 23:04:58'),
(33, 'ZAP CORDONES TALLE 40', 'NEGRA', '1102', 1, 0, 0, 1, 1950, 4300, 0, '', 0, 1, '', '2021-10-23 23:05:19'),
(34, 'ZAP BOTITA ESTRELLA TALLE 36', 'GRIS', '4005', 1, 0, 0, 1, 2135, 4500, 0, '', 0, 1, '', '2021-10-23 23:16:25'),
(36, 'ZAP BOTITA ESTRELLA TALLE 37', 'GRIS', '4005', 1, 0, 0, 1, 2135, 4500, 0, '', 0, 1, '', '2021-10-23 23:17:01'),
(37, 'ZAP BOTITA ESTRELLA TALLE 38', 'GRIS', '4005', 1, 0, 0, 1, 2135, 4300, 0, '', 0, 1, '', '2021-10-23 23:17:33'),
(38, 'ZAP BOTITA ESTRELLA TALLE 39', 'GRIS', '4005', 1, 0, 0, 1, 2135, 4500, 0, '', 0, 1, '', '2021-10-23 23:18:06'),
(39, 'ZAP BOTITA ESTRELLA TALLE 40', 'GRIS', '4005', 1, 0, 0, 1, 2135, 4500, 0, '', 0, 1, '', '2021-10-23 23:18:39'),
(40, 'ZAP BOTITA ESTRELLA', 'ROSA', '4005', 1, 0, 0, 6, 2135, 4500, 0, '', 0, 1, '', '2021-10-23 23:23:41'),
(41, 'ZAP BOTITA ESTRELLA', 'NEGRA', '4005', 1, 0, 0, 4, 2135, 4500, 0, '', 0, 1, '', '2021-10-23 23:24:09'),
(42, 'CORDON GEODE', 'NEGRO', 'atomik', 1, 0, 0, 12, 4481.08, 10800, 0, '', 0, 1, '', '2021-10-25 13:24:53'),
(43, 'CORDON GEODE', 'NEGRO', 'atomik', 1, 0, 0, 12, 4481.08, 10800, 0, '', 0, 1, '', '2021-10-25 13:24:53'),
(44, 'CORDON GEODE', 'NEGRO', 'atomik', 1, 0, 0, 12, 4481.08, 10800, 0, '', 0, 1, '', '2021-10-25 13:24:53'),
(45, 'CORDON GEODE', 'NEGRO', 'atomik', 1, 0, 0, 12, 4481.08, 10800, 0, '', 0, 1, '', '2021-10-25 13:24:53'),
(46, 'KENDRA', 'AMARILLA.ROJA', '490', 2, 0, 0, 6, 1805, 4200, 0, '', 0, 1, '', '2021-10-25 12:43:42'),
(47, 'CALISTA', 'NEGRO', '210', 2, 0, 0, 4, 1860, 4300, 0, '', 0, 1, '', '2021-10-25 12:54:40'),
(48, 'CHIA', 'MARRON', '1010', 2, 0, 0, 5, 1750, 3900, 1, '', 0, 1, '', '2021-10-25 13:51:03'),
(49, 'OJOTA', 'SELVA', '4030', 2, 0, 0, 6, 1640, 3600, 0, '', 0, 1, '', '2021-10-25 12:56:10'),
(50, 'SIDNEY', 'GRIS', '401', 2, 0, 0, 6, 1860, 4300, 0, '', 0, 1, '', '2021-10-25 12:58:05'),
(51, 'OJOTA PUNTA CUADRADA', 'NEGRO', '4040', 2, 0, 0, 6, 1640, 3600, 0, '', 0, 1, '', '2021-10-25 12:59:39'),
(52, 'OJOTA', 'MARMOL', '4030', 2, 0, 0, 6, 1640, 3600, 0, '', 0, 1, '', '2021-10-25 13:00:54'),
(53, 'SANDALIA', 'ANIMAL PRINT', '4010', 2, 0, 0, 6, 1640, 3600, 0, '', 0, 1, '', '2021-10-25 13:01:42'),
(54, 'SANDALIA', 'BLANCA', '407', 2, 0, 0, 6, 1860, 4300, 0, '', 0, 1, '', '2021-10-25 13:02:41'),
(55, 'SANDALIA', 'NEGRA', '1925', 2, 0, 0, 6, 1805, 4200, 0, '', 0, 1, '', '2021-10-25 13:03:36'),
(56, 'TACO', 'NEGRO', '1760', 2, 0, 0, 6, 2190, 4600, 0, '', 0, 1, '', '2021-10-25 13:05:18'),
(57, 'KENDRA', 'NEGRA.BLANCA', '490', 2, 0, 0, 5, 1805, 4200, 0, '', 0, 1, '', '2021-10-25 13:06:08'),
(58, 'SANDALIA', 'AMARILLA', '1320', 2, 0, 0, 6, 1420, 3700, 0, '', 0, 1, '', '2021-10-25 13:12:47'),
(59, 'SANDALIA', 'ROJA', '1320', 2, 0, 0, 5, 1420, 3700, 0, '', 0, 1, '', '2021-10-25 13:13:23'),
(60, 'SANDALIA', 'NEGRO', '1320', 2, 0, 0, 6, 1420, 3700, 0, '', 0, 1, '', '2021-10-25 13:13:52'),
(61, 'OJOTA PUNTA CUADRADA', 'SUELA', '4040', 2, 0, 0, 6, 1640, 3600, 0, '', 0, 1, '', '2021-10-25 13:15:01'),
(62, 'SANDALIA', 'NEGRA', '515', 2, 0, 0, 6, 1860, 4100, 0, '', 0, 1, '', '2021-10-25 13:15:41'),
(63, 'CORDON GEODE', 'NEGRO', 'atomik', 1, 0, 0, 12, 4481.08, 10800, 0, '', 0, 1, '', '2021-10-25 13:24:53'),
(64, 'CORDON GEODE', 'NEGRO', 'atomik', 1, 0, 0, 12, 4481.08, 10800, 0, '', 0, 1, '', '2021-10-25 13:24:53'),
(65, 'CORDON GEODE', 'NEGRO', 'atomik', 1, 0, 0, 12, 4481.08, 10800, 0, '', 0, 1, '', '2021-10-25 13:24:53'),
(66, 'CORDON GEODE', 'NEGRO', 'atomik', 1, 0, 0, 12, 4481.08, 10800, 0, '', 0, 1, '', '2021-10-25 13:24:53'),
(67, 'SURF BAJA', 'NEGRO.FRANCIA', 'atomik', 1, 0, 0, 14, 2372.97, 5800, 0, '', 0, 1, '', '2021-10-25 13:28:27'),
(68, 'ISMAEL', 'FUCSIA', 'atomik', 1, 0, 0, 15, 2697.3, 6600, 0, '', 0, 1, '', '2021-10-25 13:29:29'),
(69, 'JAMAICA', 'GRIS', 'atomik', 1, 0, 0, 15, 3183.78, 7700, 0, '', 0, 1, '', '2021-10-25 13:31:51'),
(70, 'RONNIE', 'FRANCIA', 'atomik', 1, 0, 0, 12, 2264.86, 5500, 0, '', 0, 1, '', '2021-10-25 13:32:50'),
(71, 'SANDALIA', 'BLANCA', '720', 2, 0, 0, 5, 1970, 4200, 0, '', 0, 1, '', '2021-10-25 13:34:08'),
(72, 'SANDALIA', 'NEGRA', '720', 2, 0, 0, 5, 1970, 4200, 0, '', 0, 1, '', '2021-10-25 13:35:20'),
(73, 'SANDALIA', 'CON TACHAS', '910', 2, 0, 0, 6, 2135, 4500, 0, '', 0, 1, '', '2021-10-25 13:36:08'),
(74, 'ZAP PICO', 'GRIS', 'gummi', 1, 0, 0, 7, 1, 4995, 0, '', 0, 1, '', '2021-10-25 15:18:47'),
(75, 'ZAP PICO', 'GRIS', 'gummi', 1, 0, 0, 7, 1, 4995, 0, '', 0, 1, '', '2021-10-25 15:18:47'),
(76, 'ZAP PICO', 'GRIS', 'gummi', 1, 0, 0, 7, 1, 4995, 0, '', 0, 1, '', '2021-10-25 15:18:47'),
(77, 'ZAP PICO', 'GRIS', 'gummi', 1, 0, 0, 7, 1, 4995, 0, '', 0, 1, '', '2021-10-25 15:18:47'),
(78, 'ZAP PICO', 'GRIS', 'gummi', 1, 0, 0, 7, 1, 4995, 0, '', 0, 1, '', '2021-10-25 15:18:47'),
(80, 'ZAP PICO', 'GRIS', 'gummi', 1, 0, 0, 7, 1, 4995, 0, '', 0, 1, '', '2021-10-25 15:18:47'),
(81, 'ZAP PICO', 'GRIS', 'gummi', 1, 0, 0, 7, 1, 4995, 0, '', 0, 1, '', '2021-10-25 15:18:47'),
(82, 'ZAP PICO', 'GRIS', 'gummi', 1, 0, 0, 7, 1, 4995, 0, '', 0, 1, '', '2021-10-25 15:18:47'),
(83, 'ZAP PICO', 'GRIS', 'gummi', 1, 0, 0, 7, 1, 4995, 0, '', 0, 1, '', '2021-10-25 15:18:47'),
(84, 'ZAP PICO', 'GRIS', 'gummi', 1, 0, 0, 7, 1, 4995, 0, '', 0, 1, '', '2021-10-25 15:18:47');

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
(64, 'venededor', 'vendedor', '$2a$07$asxx54ahjppf45sd87a5aunB4y206TBfA8Kb39yWqIUa3ilMXLo0S', 'Vendedor', 'vistas/img/usuarios/vendedor/452.jpg', 1, '2021-10-22 18:40:59', '2021-10-22 23:40:59'),
(65, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Administrador', 'vistas/img/usuarios/admin2/130.jpg', 1, '2021-10-25 09:27:16', '2021-10-25 14:27:16');

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
(3, '2021-10-25', 'FC', '0001-00000003', 1, 'CONSUMIDOR FINAL', '0', 65, '[{\"id\":\"48\",\"descripcion\":\"CHIA\",\"codigo\":\"1010\",\"cantidad\":\"1\",\"precio\":\"3900.00\",\"descuento\":\"0.00\",\"total\":\"3900.00\"}]', 0, 0, 3900, 0, '[{\"id\":\"1\",\"fecha\":\"25-10-2021\",\"tipo\":\"EFECTIVO\",\"importe\":\"3900\",\"referencia\":\"EFECTIVO\"}]', '0000-00-00', '', '', 0, '2021-10-25 13:51:03');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
