create table VENTA(
    codventa serial primary key,
    numero int,
    numero_ticket int,
    fecha date,
    subtotal decimal(10,2),
    igv decimal(10,2),
    total decimal(10,2),
    estado int,
    id int,
    codcliente int
);
/*hola pepe*/
create table CLIENTE(
    codcliente serial primary key,
    nombre varchar(100),
    direccion varchar(80),
    ruc_dni varchar(10),
    email varchar(40)
);



create table DETALLEVENTA(
    coddetalle serial primary key,
    precio decimal(10,2),
    cantidad int,
    codventa int,
    codproducto int
);


create table PRODUCTO(
    codproducto serial primary key,
    nombre varchar (40),
    precio decimal(10,2),
    stock int,
    codcategoria int
);

create table CATEGORIA(
    codcategoria serial primary key,
    descripcion varchar(40)
);





DROP TABLE IF EXISTS `cabeceraventas`;
CREATE TABLE IF NOT EXISTS `cabeceraventas` (
  `venta_id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int NOT NULL,
  `fecha_venta` date NOT NULL,
  `tipo_id` int NOT NULL,
  `nrodoc` varchar(9) NOT NULL,
  `subtotal` float NOT NULL,
  `igv` float NOT NULL,
  `total` float NOT NULL,
  `estado` tinyint NOT NULL,
  PRIMARY KEY (`venta_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cabeceraventas`
--

INSERT INTO `cabeceraventas` (`venta_id`, `cliente_id`, `fecha_venta`, `tipo_id`, `nrodoc`, `subtotal`, `igv`, `total`, `estado`) VALUES
(1, 1, '2021-01-06', 2, '000100', 100, 0, 100, 1),
(2, 1, '2021-01-20', 2, '001000', 0, 0, 5.9, 1);


DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `codcliente` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(60) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `ruc_dni` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `estado` tinyint NOT NULL,
  PRIMARY KEY (`codcliente`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`codcliente`, `nombres`, `direccion`, `ruc_dni`, `email`, `estado`) VALUES
(1, 'steven', 'jr trujillo 816', '70259401', 's@gmail.com', 1),
(2, 'raul', 'jr san martin', '1234567890', 'r@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

DROP TABLE IF EXISTS `detalleventas`;
CREATE TABLE IF NOT EXISTS `detalleventas` (
  `venta_id` int NOT NULL,
  `producto_id` int NOT NULL,
  `precio` float NOT NULL,
  `cantidad` float NOT NULL,
  PRIMARY KEY (`venta_id`,`producto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `detalleventas`
--

INSERT INTO `detalleventas` (`venta_id`, `producto_id`, `precio`, `cantidad`) VALUES
(1, 1, 5, 10),
(1, 2, 10, 5),
(2, 1, 5, 1);

DROP TABLE IF EXISTS `parametros`;
CREATE TABLE IF NOT EXISTS `parametros` (
  `tipo_id` int NOT NULL,
  `serie` char(3) NOT NULL,
  `numeracion` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`tipo_id`, `serie`, `numeracion`) VALUES
(1, '001', '000100'),
(2, '002', '001000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `codproducto` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  `codcategoria` int NOT NULL,
  `codunidad` int NOT NULL,
  `stock` int NOT NULL,
  `precio` int NOT NULL,
  `estado` tinyint NOT NULL,
  PRIMARY KEY (`codproducto`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codproducto`, `descripcion`, `codcategoria`, `codunidad`, `stock`, `precio`, `estado`) VALUES
(1, 'Pepsi', 2, 1, 19, 5, 1),
(2, 'coca', 2, 2, 3, 2, 1),
(3, 'Comestibles', 10, 1, 3, 2, 1),
(4, 'Bebidas', 5, 2, 2, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `tipo_id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`tipo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`tipo_id`, `descripcion`) VALUES
(1, 'Factura'),
(2, 'Boleta');


DROP TABLE IF EXISTS `unidades`;
CREATE TABLE IF NOT EXISTS `unidades` (
  `codunidad` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  `estado` tinyint NOT NULL,
  PRIMARY KEY (`codunidad`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `unidades` (`codunidad`, `descripcion`, `estado`) VALUES
(1, 'Botella', 1),
(2, 'Caja', 1);


DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
