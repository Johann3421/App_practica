-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33064
-- Tiempo de generación: 20-09-2023 a las 23:58:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id` int(11) NOT NULL,
  `nombre_equipo` varchar(255) NOT NULL,
  `accesorios` text DEFAULT NULL,
  `partes_equipo` text DEFAULT NULL,
  `fabricante` varchar(255) DEFAULT NULL,
  `parametros_electricos` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id`, `nombre_equipo`, `accesorios`, `partes_equipo`, `fabricante`, `parametros_electricos`) VALUES
(1, '1', 'sdz', 'zxczxc', 'zxc', 'zxczxc'),
(2, '1', 'asdas', '12', 'asd', 'asdasd'),
(3, '1', 'asdas', '12', 'asd', 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `codigo` int(11) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `serie` varchar(50) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `fecha_mantenimiento` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`codigo`, `modelo`, `serie`, `imagen`, `fecha_mantenimiento`, `descripcion`) VALUES
(0, 'Modelo Ejemplo', 'Serie Ejemplo', 'ruta/de/la/imagen.jpg', '2023-09-06', 'obsoleto'),
(1, 'asd', 'acsa', 'zxcsad', '2023-09-14', 'q1ewasd'),
(2, '2145', '2421446', '131344613', '2023-09-15', '31354461354'),
(3, 'Modelo 3', 'Serie C789', 'imagen3.jpg', NULL, NULL),
(4, 'as', '1', 'zxcsad', '2023-09-05', 'sadasd'),
(5, 'volsbagen', '5', 'cxvsdf', '2023-08-17', 'sazxcdsa'),
(6, 'sdacxasc', 'zxcasdad', 'ascxca', '2023-09-14', 'sadxzcasd'),
(7, 'xzcasd', 'zxcasdasd', 'zxcasdas', '2023-09-08', 'zxcasdasdzxasaszxdaasasaxxzasazxsaasszx'),
(8, 'asdas', 'asdsadas', 'zxcasdasd', '2023-09-14', 'zcasdasads');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

CREATE TABLE `herramienta` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `lugar_venta` varchar(255) DEFAULT NULL,
  `precio_mercado` decimal(10,2) DEFAULT NULL,
  `almacenamiento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`codigo`, `nombre`, `lugar_venta`, `precio_mercado`, `almacenamiento`) VALUES
(1, 'asdczx', '1sdaads', 13.00, 'zcxzx'),
(2, 'asdasd', '2112', 14.00, 'asdxc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `unidades` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`codigo`, `descripcion`, `unidades`, `precio`) VALUES
(1, 'Destornillador', 10, 5.99),
(2, 'Martillo', 5, 9.99),
(3, 'Sierra', 3, 15.50),
(4, 'Llave Inglesa', 8, 7.25),
(5, 'Taladro', 2, 49.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos`
--

CREATE TABLE `mantenimientos` (
  `id` int(11) NOT NULL,
  `equipo` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_programada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mantenimientos`
--

INSERT INTO `mantenimientos` (`id`, `equipo`, `descripcion`, `fecha_programada`) VALUES
(1, '', 'asdasd', NULL),
(2, '123', 'asdasd', NULL),
(3, '134', ' asdasd', NULL),
(4, '123', 'asdwsad', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `lugar_venta` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `almacenamiento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `codigo`, `nombre`, `cantidad`, `lugar_venta`, `precio`, `almacenamiento`) VALUES
(1, '1', 'sadzxc', 12, 'czx', 12.00, 'zxcasd'),
(2, '1', 'ad', 21, '12asd', 12.00, 'asda'),
(3, '1', 'ad', 21, '12asd', 12.00, 'asda'),
(4, '5', 'ASas', 11, 'aSazx', 15.00, 'asdsad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `costo_unitario` decimal(10,2) DEFAULT NULL,
  `costo_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`codigo`, `descripcion`, `cantidad`, `costo_unitario`, `costo_total`) VALUES
(1, 'sacsaczxcsac', 20, 12.00, 21.00),
(2, 'Material de prueba 1', 5, 2.00, 100.00),
(3, 'Material de prueba 2', 50, 3.00, 90.00),
(4, 'Material de prueba 3', 50, 4.00, 80.00),
(5, 'Material de prueba 4', 40, 5.00, 200.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operarios`
--

CREATE TABLE `operarios` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `sueldo` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `operarios`
--

INSERT INTO `operarios` (`id`, `codigo`, `nombre`, `sueldo`, `imagen`) VALUES
(1, '1', 'asdads', 12.00, 'imagenes/png-transparent-software-developer-html-marketing-learning-computer-programming-videira-reading-cartoon-business.png'),
(2, '12asd', 'sad', 12.00, 'imagenes/png-transparent-software-developer-html-marketing-learning-computer-programming-videira-reading-cartoon-business.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

CREATE TABLE `procedimientos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procedimientos`
--

INSERT INTO `procedimientos` (`id`, `descripcion`) VALUES
(2, 'zxcasasdzxc'),
(3, 'asdzxc'),
(6, 'dvzcz'),
(7, 'sadsdas'),
(8, 'asdasdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `solucion` varchar(3) DEFAULT NULL,
  `detalle` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `solucion`, `detalle`) VALUES
(8, '', ''),
(9, 'si', 'asczxc'),
(10, '', ''),
(11, '', ''),
(12, 'si', 'sczxzxc'),
(13, 'si', 'daczxsa'),
(14, 'si', 'no esta solucionado correctamente'),
(15, 'no', 'no se puede arreglar'),
(16, 'no', 'adszxcas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_servicio`
--

CREATE TABLE `solicitudes_servicio` (
  `id` int(11) NOT NULL,
  `codigo_equipo` varchar(255) NOT NULL,
  `urgencia` enum('alta','media','baja') NOT NULL,
  `descripcion_falla` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes_servicio`
--

INSERT INTO `solicitudes_servicio` (`id`, `codigo_equipo`, `urgencia`, `descripcion_falla`, `fecha_creacion`) VALUES
(1, '1', 'alta', 'sacxzcas', '2023-09-13 20:07:02'),
(2, '1', 'alta', 'sdzxcas', '2023-09-13 20:08:57'),
(3, 'asdasd', 'alta', 'zxcasd', '2023-09-13 20:09:08'),
(4, '4', 'alta', 'adszxcasd', '2023-09-13 21:06:40'),
(5, '1', 'media', 'asdasd', '2023-09-19 21:22:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `sueldo` decimal(10,2) DEFAULT NULL,
  `horas_trabajadas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`codigo`, `nombre`, `foto`, `sueldo`, `horas_trabajadas`) VALUES
(1, 'Juan Pérez', 'juan.jpg', 15.00, NULL),
(2, 'María López', 'maria.jpg', 20.00, 30),
(3, 'Pedro García', 'pedro.jpg', 18.50, NULL),
(4, 'Laura Martínez', 'laura.jpg', 17.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`) VALUES
(1, 'johan12', 'johan12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `operarios`
--
ALTER TABLE `operarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes_servicio`
--
ALTER TABLE `solicitudes_servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `operarios`
--
ALTER TABLE `operarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `solicitudes_servicio`
--
ALTER TABLE `solicitudes_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
