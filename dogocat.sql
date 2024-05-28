-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2024 a las 08:01:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dogocat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_animales`
--

CREATE TABLE `tbl_animales` (
  `Id_Animal` int(11) NOT NULL,
  `Tipo_Animal` int(11) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Edad` varchar(20) NOT NULL,
  `Raza` varchar(25) NOT NULL,
  `Tamaño` varchar(20) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `Foto` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_animales`
--

INSERT INTO `tbl_animales` (`Id_Animal`, `Tipo_Animal`, `Nombre`, `Edad`, `Raza`, `Tamaño`, `Color`, `Sexo`, `Foto`) VALUES
(37, 1, 'Spike', 'Adulto', 'Labrador', 'Grande', 'Cafe', 'm', 0x696d675f6d6173636f74612e706e67),
(38, 1, 'pepe', 'Cachorro', 'Bulldog', 'Pequeño', 'Blanco', 'm', 0x696d675f6d6173636f74612e706e67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria_insumos`
--

CREATE TABLE `tbl_categoria_insumos` (
  `Id_Categoria` int(11) NOT NULL,
  `Nombre_Categoria` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_categoria_insumos`
--

INSERT INTO `tbl_categoria_insumos` (`Id_Categoria`, `Nombre_Categoria`) VALUES
(1, 'Comida'),
(2, 'Accesorios'),
(3, 'Productos Aseo'),
(4, 'Productos Veterinario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_controles`
--

CREATE TABLE `tbl_controles` (
  `Fecha` date NOT NULL,
  `Id_veterinario` int(11) NOT NULL,
  `Paciente` int(11) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `Raza` varchar(20) NOT NULL,
  `Edad` varchar(20) NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `Historial` varchar(200) NOT NULL,
  `Condicion` varchar(200) NOT NULL,
  `Tratamiento` varchar(200) NOT NULL,
  `Comentario` varchar(200) NOT NULL,
  `Corporal` varchar(200) NOT NULL,
  `Muscular` varchar(200) NOT NULL,
  `Peso` int(11) NOT NULL,
  `Mantener` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_dinero`
--

CREATE TABLE `tbl_dinero` (
  `id_dinero` int(11) NOT NULL,
  `Documento` int(11) NOT NULL,
  `Tipo_Donacion` varchar(20) NOT NULL,
  `Valor` int(11) NOT NULL,
  `Lugar` varchar(30) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_dinero`
--

INSERT INTO `tbl_dinero` (`id_dinero`, `Documento`, `Tipo_Donacion`, `Valor`, `Lugar`, `Fecha`) VALUES
(12, 1434, 'Transferencia', 100000, 'Bogota D.C.', '2024-05-18'),
(13, 123232, 'Transferencia', 100000, 'Bogota D.C.', '2024-05-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_formulario`
--

CREATE TABLE `tbl_formulario` (
  `id_formulario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `mental` varchar(200) NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `dinero` int(11) NOT NULL,
  `experiencia` text NOT NULL,
  `antes` varchar(200) NOT NULL,
  `casa` varchar(200) NOT NULL,
  `patio` varchar(200) NOT NULL,
  `niños` varchar(200) NOT NULL,
  `deacuerdo` varchar(200) NOT NULL,
  `enseñanza` varchar(200) NOT NULL,
  `libertad` varchar(200) NOT NULL,
  `condiciones` varchar(200) NOT NULL,
  `quedara` varchar(200) NOT NULL,
  `encerrar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_formulario`
--

INSERT INTO `tbl_formulario` (`id_formulario`, `nombre`, `correo`, `telefono`, `direccion`, `mental`, `motivo`, `dinero`, `experiencia`, `antes`, `casa`, `patio`, `niños`, `deacuerdo`, `enseñanza`, `libertad`, `condiciones`, `quedara`, `encerrar`) VALUES
(1, 'trtrtrtwer', 'dhdfhgfgh', 5464564, 'dgfgdfgs', 'Normal', 'dgdfghdfhfhdfg', 0, 'gfdgdt', '', 'Casa propia', 'NO', 'Entre los 12-17 años', 'SI', 'grhgfgjytj', 'SI', 'En el patio', 'Con un familiar', 'Solo cuado nos vayamos de viaje'),
(2, 'trtrtrtwer', 'dhdfhgfgh', 5464564, 'dgfgdfgs', 'Normal', 'dgdfghdfhfhdfg', 0, 'gfdgdt', '', 'Casa propia', 'NO', 'Entre los 12-17 años', 'SI', 'grhgfgjytj', 'SI', 'En el patio', 'Con un familiar', 'Solo cuado nos vayamos de viaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_insumos`
--

CREATE TABLE `tbl_insumos` (
  `id_insumo` int(11) NOT NULL,
  `Documento` int(11) NOT NULL,
  `Insumo` varchar(30) NOT NULL,
  `Descripcion` varchar(30) NOT NULL,
  `Lugar` varchar(30) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_insumos`
--

INSERT INTO `tbl_insumos` (`id_insumo`, `Documento`, `Insumo`, `Descripcion`, `Lugar`, `Fecha`) VALUES
(10, 1434, 'Comida', 'Dog show de carne para cachorr', 'Bogota D.C.', '2024-05-18'),
(11, 123244, 'Comida', 'Dog show de carne para cachorr', 'Bogota D.C.', '2024-05-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedidos`
--

CREATE TABLE `tbl_pedidos` (
  `Codigo_Insumo` int(11) NOT NULL,
  `Cantidad` int(200) NOT NULL,
  `Observaciones` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_pedidos`
--

INSERT INTO `tbl_pedidos` (`Codigo_Insumo`, `Cantidad`, `Observaciones`) VALUES
(1231232, 12, 'que sean de carne.'),
(453465, 123, '100 de carne y 23 de pollo.'),
(1231232, 100, '50 de carne y 50 de pollo.'),
(54564523, 10, 'shampoo para cachorro gaticos'),
(453465, 100, '50 cobijas para perro y 50 para gaticos'),
(1231232, 5, '5 bultos de comida de pollo para perros mayores de eedad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedores`
--

CREATE TABLE `tbl_proveedores` (
  `Nit` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Telefono` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_proveedores`
--

INSERT INTO `tbl_proveedores` (`Nit`, `Nombre`, `Direccion`, `Telefono`) VALUES
(12331234, 'CANINAS FC', 'Caracas -19 #45', 3114837115);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registrar_insumos`
--

CREATE TABLE `tbl_registrar_insumos` (
  `Categoria` int(11) NOT NULL,
  `Nombre_Insumo` varchar(30) NOT NULL,
  `Nombre_Proveedor` varchar(30) NOT NULL,
  `Codigo_Insumo` int(11) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_registrar_insumos`
--

INSERT INTO `tbl_registrar_insumos` (`Categoria`, `Nombre_Insumo`, `Nombre_Proveedor`, `Codigo_Insumo`, `Precio`) VALUES
(2, 'Cobijas ', 'Caninas', 453465, 10000),
(1, 'Dog Chow', 'Caninas', 1231232, 180000),
(2, 'Dog Chow', 'Caninas', 1232434, 180000),
(3, 'Shampoo', 'Caninas', 54564523, 70000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `Id_rol` int(11) NOT NULL,
  `Nombre_rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_roles`
--

INSERT INTO `tbl_roles` (`Id_rol`, `Nombre_rol`) VALUES
(1, 'Usuario'),
(2, 'Administrador'),
(3, 'Veterinario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_animales`
--

CREATE TABLE `tbl_tipo_animales` (
  `id_animal` int(11) NOT NULL,
  `Nombre_Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_tipo_animales`
--

INSERT INTO `tbl_tipo_animales` (`id_animal`, `Nombre_Tipo`) VALUES
(1, 'Perro'),
(2, 'Gato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Documento` int(11) NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Ciudad` varchar(15) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Rol` int(11) NOT NULL,
  `Contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`Id_usuario`, `Documento`, `Nombres`, `Apellidos`, `Ciudad`, `Direccion`, `Correo`, `Telefono`, `Rol`, `Contraseña`) VALUES
(34, 3224324, 'Diego', 'Alarcon', 'Bogota D.C.', 'calle 34', 'diego@gmail.com', 23432432, 1, '4321'),
(35, 1022, 'Carlos', 'Rico', 'Bogota D.C.', 'calle94', 'carlos@rico', 12445678, 2, '12345'),
(48, 10522, 'Diego', 'Alarcon', 'Bogota D.C.', 'calle #24', 'diego@gmail.com', 23424243, 2, '1234'),
(49, 23423, 'Luisa', 'Perez', 'Bogota D.C.', 'calle 45', 'Luis@gmail.com', 23243435, 3, '54321'),
(50, 1022, 'Luis', 'Perez', 'Bogota D.C.', 'calle #97', 'Luis@gmail.com', 23424545, 1, '54321'),
(51, 1012330493, 'Luisa', 'Gonzales', 'Bogota D.C.', 'calle #56', 'diego1@gmail.com', 23243435, 1, '1234'),
(52, 1231421, 'Lucia', 'Hernandez', 'Bogota D.C.', 'calle #75', 'lucia@gmail.com', 324324352, 2, '1234'),
(53, 1323, 'juanita', 'osorio', 'Bogota D.C.', 'calle 34', 'osorio@gmail.com', 12321322121, 2, '12345'),
(60, 1434, 'Luis', 'diaz', 'Bogota D.C.', 'calle #97', 'diaz@gmail.com', 3228974517, 1, '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_animales`
--
ALTER TABLE `tbl_animales`
  ADD PRIMARY KEY (`Id_Animal`),
  ADD KEY `Tipo_animal` (`Tipo_Animal`);

--
-- Indices de la tabla `tbl_categoria_insumos`
--
ALTER TABLE `tbl_categoria_insumos`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `tbl_controles`
--
ALTER TABLE `tbl_controles`
  ADD KEY `Id_veterinario` (`Id_veterinario`),
  ADD KEY `Paciente` (`Paciente`);

--
-- Indices de la tabla `tbl_dinero`
--
ALTER TABLE `tbl_dinero`
  ADD PRIMARY KEY (`id_dinero`);

--
-- Indices de la tabla `tbl_formulario`
--
ALTER TABLE `tbl_formulario`
  ADD PRIMARY KEY (`id_formulario`);

--
-- Indices de la tabla `tbl_insumos`
--
ALTER TABLE `tbl_insumos`
  ADD PRIMARY KEY (`id_insumo`);

--
-- Indices de la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  ADD KEY `codigo` (`Codigo_Insumo`);

--
-- Indices de la tabla `tbl_proveedores`
--
ALTER TABLE `tbl_proveedores`
  ADD PRIMARY KEY (`Nit`);

--
-- Indices de la tabla `tbl_registrar_insumos`
--
ALTER TABLE `tbl_registrar_insumos`
  ADD PRIMARY KEY (`Codigo_Insumo`),
  ADD KEY `categoria` (`Categoria`);

--
-- Indices de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`Id_rol`);

--
-- Indices de la tabla `tbl_tipo_animales`
--
ALTER TABLE `tbl_tipo_animales`
  ADD PRIMARY KEY (`id_animal`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Rol` (`Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_animales`
--
ALTER TABLE `tbl_animales`
  MODIFY `Id_Animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `tbl_dinero`
--
ALTER TABLE `tbl_dinero`
  MODIFY `id_dinero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_formulario`
--
ALTER TABLE `tbl_formulario`
  MODIFY `id_formulario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_insumos`
--
ALTER TABLE `tbl_insumos`
  MODIFY `id_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_animales`
--
ALTER TABLE `tbl_animales`
  ADD CONSTRAINT `Tipo_animal` FOREIGN KEY (`Tipo_Animal`) REFERENCES `tbl_tipo_animales` (`id_animal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_controles`
--
ALTER TABLE `tbl_controles`
  ADD CONSTRAINT `tbl_controles_ibfk_1` FOREIGN KEY (`Id_veterinario`) REFERENCES `tbl_usuarios` (`Id_usuario`),
  ADD CONSTRAINT `tbl_controles_ibfk_2` FOREIGN KEY (`Paciente`) REFERENCES `tbl_animales` (`Id_Animal`);

--
-- Filtros para la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  ADD CONSTRAINT `codigo` FOREIGN KEY (`Codigo_Insumo`) REFERENCES `tbl_registrar_insumos` (`Codigo_Insumo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_registrar_insumos`
--
ALTER TABLE `tbl_registrar_insumos`
  ADD CONSTRAINT `categoria` FOREIGN KEY (`Categoria`) REFERENCES `tbl_categoria_insumos` (`Id_Categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `Rol` FOREIGN KEY (`Rol`) REFERENCES `tbl_roles` (`Id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
