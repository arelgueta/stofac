-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2017 a las 02:14:27
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'TECNO', 'Electronicos, tablet, PC'),
(2, 'COMESTIBLE', 'Galletas, etc'),
(3, 'ELECTRODOMESTICO', 'Lavarropas, heladeras'),
(4, 'Vinos', 'vinos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `id_destino` int(11) DEFAULT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cuit` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `direccion`, `id_destino`, `telefono`, `email`, `cuit`) VALUES
(1, 'Jose Juan Manuel', 'Luna', 'San Martin 520', 2, '4223355', 'jose@com.ar', ''),
(2, 'Luis', 'Alcorta', 'San Juan 1523', 1, '4122365', 'luis@com.ar', ''),
(4, 'Silvia', 'Rosas', 'Boedo 888', 1, '4859618', 'silvia', ''),
(6, 'pepito', 'Fulano', 'Salta', 1, '4444444', 'aisojhdao@gmail.com', ''),
(7, 'chancho', 'chanco', 'aslas', 2, '332211', 'asd@asd.com.ar', ''),
(9, 'agu', 'Lorenzo', 'ituzaingo', 2, '212231', 'kasl@hotmail.com', ''),
(10, 'Josefa', 'morsa', 'santiago liniers', 11, '7654567', 'qw@santiago', ''),
(11, 'Laura', 'Fermin', 'San Juan', 12, '123', 'asd@asd.com', ''),
(12, 'Bruno', 'Moncada', 'sarmiento', 1, '234', 'asd@asd.com.ar', ''),
(13, 'Sandra', 'Morelli', 'Jose F. Moreno', 11, '123', '213@21.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id_destino` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`id_destino`, `nombre`) VALUES
(1, 'Guaymallen'),
(2, 'Godoy Cruz'),
(11, 'Mza'),
(12, 'Maipu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_cliente`, `fecha`, `total`) VALUES
(1, 1, '2017-10-04 21:03:41', '68.00'),
(2, 6, '2017-10-04 21:09:26', '68.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_detalle`
--

CREATE TABLE `factura_detalle` (
  `id_detalle` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura_detalle`
--

INSERT INTO `factura_detalle` (`id_detalle`, `id_factura`, `id_producto`, `id_usuario`, `cantidad`, `precio`, `subtotal`) VALUES
(1, 1, 2, 0, 1, '68.00', '68.00'),
(1, 2, 2, 0, 1, '68.00', '68.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `stock`, `id_categoria`, `foto`, `codigo`) VALUES
(1, 'X-box 360', '4599.00', 2, 1, '1.jpg', 10),
(2, 'Aceite de girasol', '68.00', 201, 2, '', 20),
(3, 'Televisor 32', '5699.99', 1, 1, '', 30),
(4, 'coca', '44.00', 13, 1, '', 40),
(5, 'Cel', '10000.00', 1, 1, '', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cuit` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `apellido`, `direccion`, `fecha_nacimiento`, `telefono`, `email`, `cuit`) VALUES
(1, 'Juan J', 'Martinez', 'San Juan 520', '1973-02-11', '4333355', 'juan@com.ar', '12-33999888-7'),
(2, 'Pedro', 'Alvarez', 'Rioja 1523', '1962-03-11', '4555365', 'pedro@com.ar', '23-16547896-0'),
(4, 'Silvina', 'Rojas', 'salta 9219', '1985-09-11', '48596182', 'silvina@gmail.com', '27-23361466-7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `id_recibo` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recibo`
--

INSERT INTO `recibo` (`id_recibo`, `id_proveedor`, `fecha`, `total`) VALUES
(33, 2, '2017-09-16 16:42:47', '16066.98'),
(34, 4, '2017-09-16 16:44:25', '224.00'),
(35, 4, '2017-09-16 16:45:35', '30896.97'),
(36, 2, '2017-09-19 18:49:05', '4779.00'),
(37, 4, '2017-09-19 18:50:01', '10366.99'),
(38, 2, '2017-09-19 15:51:25', '4735.00'),
(39, 2, '2017-10-03 10:04:42', '140297.77');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo_detalle`
--

CREATE TABLE `recibo_detalle` (
  `id_detalle` int(11) NOT NULL,
  `id_recibo` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recibo_detalle`
--

INSERT INTO `recibo_detalle` (`id_detalle`, `id_recibo`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES
(1, 33, 1, 1, '4599.00', '4599.00'),
(1, 34, 4, 2, '44.00', '88.00'),
(1, 35, 1, 1, '4599.00', '4599.00'),
(1, 36, 4, 1, '44.00', '44.00'),
(1, 37, 1, 1, '4599.00', '4599.00'),
(1, 38, 1, 1, '4599.00', '4599.00'),
(1, 39, 1, 2, '4599.00', '9198.00'),
(2, 33, 2, 1, '68.00', '68.00'),
(2, 34, 2, 2, '68.00', '136.00'),
(2, 35, 3, 2, '5699.99', '11399.98'),
(2, 37, 2, 1, '68.00', '68.00'),
(2, 38, 2, 2, '68.00', '136.00'),
(2, 39, 3, 23, '5699.99', '131099.77'),
(3, 33, 3, 2, '5699.99', '11399.98'),
(3, 35, 1, 2, '4599.00', '9198.00'),
(3, 37, 3, 1, '5699.99', '5699.99'),
(4, 35, 3, 1, '5699.99', '5699.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `id_rutas` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `visitado` datetime NOT NULL,
  `id_factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `descripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `clave`, `nombre`, `apellido`, `email`, `id_tipo`) VALUES
(1, 'admin', '123456', 'Victor', 'Luna', 'victor@victor.com', 1),
(2, 'vendedor', '123456', 'Juan', 'Vera', 'juan@fac.com', 2),
(4, 'jaime', '123456', 'jaime', 'jaime', 'jaime@jaime.com', 2),
(7, 'pepe', 'pepe', 'sapo', 'pepe', 'sapo@pepe.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pieza`
--

CREATE TABLE `piezas` (
  `id_pieza` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidadMinima` int(11) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pieza`
--

INSERT INTO `piezas` (`id_pieza`, `nombre`, `descripcion`, `cantidad`, `cantidadMinima`) VALUES
(1, 'pieza1', 'Funciona en bomba 1',23,8),
(2, 'piezab', 'funciona en bomba 1',52,4),
(3, 'piezaw', 'funciona en bomba 3',22,5);

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `PiezaXProducto`
--

CREATE TABLE `PiezaXProducto` (
  `id_piezaProducto` int(11) NOT NULL,
  `id_pieza` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidadPieza` int(11) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `PiezaXProducto`
--

INSERT INTO `PiezaXProducto` (`id_piezaProducto`, `id_pieza`, `id_producto`, `cantidadPieza`) VALUES
(1,2,5,2),
(2,1,3,3),
(3,3,2,12);


-- --------------------------------------------------------
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `PiezaXProducto`
--
ALTER TABLE `PiezaXProducto`
  ADD PRIMARY KEY (`id_piezaProducto`);

--
-- Indices de la tabla `pieza`
--
ALTER TABLE `piezas`
  ADD PRIMARY KEY (`id_pieza`);

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
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id_destino`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD PRIMARY KEY (`id_detalle`,`id_factura`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`id_recibo`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `recibo_detalle`
--
ALTER TABLE `recibo_detalle`
  ADD PRIMARY KEY (`id_detalle`,`id_recibo`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id_rutas`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--
--
-- AUTO_INCREMENT de la tabla `PiezaXProducto`
--
ALTER TABLE `PiezaXProducto`
  MODIFY `id_piezaProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pieza`
--
ALTER TABLE `piezas`
  MODIFY `id_pieza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `recibo`
--
ALTER TABLE `recibo`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `recibo_detalle`
--
ALTER TABLE `recibo_detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id_rutas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD CONSTRAINT `recibo_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
