CREATE DATABASE IF NOT EXISTS bdprueba2023;
USE bdprueba2023;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2023 a las 01:42:46
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
-- Base de datos: `bdprueba2023`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativos`
--

CREATE TABLE `administrativos` (
  `iduser` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `nivel_estudios` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `administrativos`
--

INSERT INTO `administrativos` (`iduser`, `nombre`, `dni`, `fecha_nac`, `edad`, `genero`, `cargo`, `ocupacion`, `nivel_estudios`, `telefono`, `direccion`, `email`, `observaciones`, `condicion`) VALUES
(1, 'Dora Dalila Lopez', '0102199800170', '2023-09-09', 14, '', 'Administrador', 'Ama de casa', 'Licenciatura', '31551207', 'El pino', 'daralopez@gmail.com', 'nuevo ingreso', 1),
(2, 'Delmis Garcia', '0102789622145', '2023-08-27', 15, '', 'Asistente', 'Estudiante', 'Ciclo comun', '31551207', 'Tela', 'delmis@gmail.com', 'eficiente', 1),
(3, 'Luis Mejia', '0102199500150', '2023-09-02', 8, '', 'Asistente', 'psicólogo', 'Licenciatura', '31551207', 'Tela', 'luism@gmail.com', 'nuevo empleado', 1),
(4, 'Jason Turcios ', '0102199800460', '2023-09-03', 21, 'Masculino', '', 'asistente', 'Pasante universitario', '6598472', 'La ceiba', 'jasonjj@gmail.com', 'nuevo ingreso', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `idestudiante` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `grado` varchar(225) DEFAULT NULL,
  `jornada` varchar(225) DEFAULT NULL,
  `seccion` varchar(225) DEFAULT NULL,
  `maestro` varchar(225) DEFAULT NULL,
  `encargadonombre` varchar(225) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `idestudiante`, `nombre`, `grado`, `jornada`, `seccion`, `maestro`, `encargadonombre`, `condicion`) VALUES
(1, '0102199800170', 'Dania Romero', 'Primero', 'Matutina', 'A', 'Irma Ros Castellanos', 'Dunia', 1),
(2, '010203', 'Dania Romero', 'Primero', 'Matutina', 'A', 'Irma Ros Castellanos', 'Dunia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargado`
--

CREATE TABLE `encargado` (
  `ide` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `parentesco` varchar(255) DEFAULT NULL,
  `alumno` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `encargado`
--

INSERT INTO `encargado` (`ide`, `nombre`, `dni`, `parentesco`, `alumno`, `direccion`, `telefono`, `email`, `condicion`) VALUES
(1, '31', '31', '31', '31', '31', '33', '32', 1),
(2, 'Marcio Mejia', '0101199800170', '31', '31', '31', '31', '31', 1),
(3, 'Marcio Mejia', '55555555', 'hermanos', 'Carlos Daniel', 'El pino', '25369674', 'joses@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `NombreCliente` varchar(255) NOT NULL,
  `NumeroFactura` varchar(255) NOT NULL,
  `CAI` varchar(255) NOT NULL,
  `FechaEmision` timestamp NOT NULL DEFAULT current_timestamp(),
  `TipoPago` varchar(255) NOT NULL,
  `RTN` varchar(255) NOT NULL,
  `CambioEfectivo` double(8,2) NOT NULL,
  `EfectivoEntregado` double(8,2) NOT NULL,
  `ISV1` double(8,2) NOT NULL,
  `ISV2` double(8,2) NOT NULL,
  `Exonerado` double(8,2) NOT NULL,
  `Exento` double(8,2) NOT NULL,
  `Gravado1` double(8,2) NOT NULL,
  `Gravado2` double(8,2) NOT NULL,
  `Descuento` double(8,2) NOT NULL,
  `SubTotal` double(8,2) NOT NULL,
  `Total` double(8,2) NOT NULL,
  `Estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `idg` int(11) NOT NULL,
  `grado` varchar(255) DEFAULT NULL,
  `seccion` varchar(255) DEFAULT NULL,
  `jornada` varchar(255) DEFAULT NULL,
  `maestro` varchar(255) DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`idg`, `grado`, `seccion`, `jornada`, `maestro`, `condicion`) VALUES
(1, 'Primero', 'A', 'Matutina', 'manuel', 1),
(3, 'Primero', 'B', 'Vespertina', '', 1),
(4, 'Segundo', 'A', 'Vespertina', '', 1),
(5, 'Tercero', 'A', 'Matutina', 'Rosa Elena Garcia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idinv` int(11) NOT NULL,
  `idinventario` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha_adq` date DEFAULT NULL,
  `recibido` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `estatus_de_disponibilidad` varchar(255) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `responsable` varchar(255) DEFAULT NULL,
  `cantidad` int(100) DEFAULT NULL,
  `comentarios` varchar(300) DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idinv`, `idinventario`, `descripcion`, `fecha_adq`, `recibido`, `categoria`, `estado`, `estatus_de_disponibilidad`, `ubicacion`, `responsable`, `cantidad`, `comentarios`, `condicion`) VALUES
(29, '01020304', 'i pportante', '0000-00-00', '', 'seleccione', 'seleccione', 'seleccione', 'Administracion', '', 0, '', 0),
(30, '555555555', 'Sillas', '2023-09-03', 'Tania Vallecillos', 'Muebles', 'Nuevo', 'Disponible', 'Salon de clases', 'Teresa perez', 50, 'Donadas por la municipalidad', 0),
(31, '0102', 'pizarras', '2022-12-12', 'Dilcia Calix', 'Material de oficina', 'Nuevo', 'En uso', 'Salon de clases', 'Teresa perez', 3, 'ninguno', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `idalu` int(11) NOT NULL,
  `idalumno` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `grado` varchar(255) DEFAULT NULL,
  `jornada` varchar(255) DEFAULT NULL,
  `encargado` varchar(255) DEFAULT NULL,
  `parentesco` varchar(255) DEFAULT NULL,
  `idencargado` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`idalu`, `idalumno`, `nombre`, `fecha_nac`, `edad`, `sexo`, `grado`, `jornada`, `encargado`, `parentesco`, `idencargado`, `direccion`, `telefono`, `correo`, `condicion`) VALUES
(31, '0102199800170', 'Dania Romero', '2000-11-04', 23, 'Femenino', 'Grado 6', 'Vespertina', 'Dunia', 'Madre', '0101199800170', 'El pino', '31551207', 'duniavallecillos@gmail.com', 0),
(32, '123456789000', 'Carlos Daniel', '2023-09-08', 15, 'Masculino', 'Grado 4', 'Vespertina', 'Jose', 'tio', '151858618744', 'El porvenir', '5599663311', 'danielvallecillos@gmail.com', 1),
(33, '010203', 'Farid Mejia', '2023-09-08', 9, 'Masculino', '', '', 'Marcio Mejia Rodriguez', 'Padre', '7894561230', 'El pino', '78364592', 'jmerciomej@gmail.com', 0),
(34, '010256', 'Juan jose', '2023-09-24', 12, 'Masculino', 'Grado 4', 'Vespertina', 'juan', 'hermanos', '55555555', 'La ceiba', '25369674', 'joses@gmail.com', 1),
(35, '78255156', 'Sofia Guevara', '2023-09-02', 6, 'Femenino', 'Primer grado', 'Matutina', 'Alba Caceres', 'Madre', '12365489245', 'Tela', '1752949', 'alaba@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idpa` int(11) NOT NULL,
  `nombrecliente` varchar(255) DEFAULT NULL,
  `FechaEmision` timestamp NOT NULL DEFAULT current_timestamp(),
  `descripcion` varchar(255) DEFAULT NULL,
  `cantidadapagar` double(8,2) NOT NULL,
  `numerodealumnos` int(11) DEFAULT NULL,
  `tipopago` varchar(20) DEFAULT NULL,
  `cantidadrecibido` double(8,2) NOT NULL,
  `cambio` double(8,2) NOT NULL,
  `Descuento` double(8,2) NOT NULL,
  `SubTotal` double(8,2) NOT NULL,
  `Total` double(8,2) NOT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`idpa`, `nombrecliente`, `FechaEmision`, `descripcion`, `cantidadapagar`, `numerodealumnos`, `tipopago`, `cantidadrecibido`, `cambio`, `Descuento`, `SubTotal`, `Total`, `condicion`) VALUES
(1, '', '0000-00-00 00:00:00', 'Matricula', 150.00, 5, 'Efectivo', 200.00, 0.00, 0.00, 0.00, 0.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idp` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `grado` varchar(255) DEFAULT NULL,
  `seccion` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `condicion` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idp`, `nombre`, `dni`, `fecha_nac`, `edad`, `genero`, `area`, `grado`, `seccion`, `email`, `telefono`, `direccion`, `condicion`) VALUES
(1, 'Irma Ros Castellanos', '00000000000000000000', '0000-00-00', 0, 'Femenino', '', '', '', '', '', '', 1),
(2, 'jjuanx', '000000', '2023-08-27', 45, 'Femenino', 'espa;ol ', '', '', 'juancito@gmail.com', '87408277', 'el pino', 1),
(3, '101', '', '0000-00-00', 0, 'Femenino', '', '1', '1', '', '', '', 1),
(4, 'Dilcia', '9999999999999999999', '2023-09-15', 0, 'Femenino', '', '1', '1', '', '', '', 1),
(5, 'Luis', '0102365878', '0000-00-00', 0, 'Femenino', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `cargo`, `email`, `login`, `clave`, `imagen`, `condicion`) VALUES
(1, 'Tania', 'Administrador', 'pamelavallcillos@gmail.com', 'taniapamela', 'Programacion2020', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD PRIMARY KEY (`iduser`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encargado`
--
ALTER TABLE `encargado`
  ADD PRIMARY KEY (`ide`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`idg`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idinv`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`idalu`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idpa`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idp`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD KEY `idusuario` (`idusuario`,`nombre`,`imagen`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `encargado`
--
ALTER TABLE `encargado`
  MODIFY `ide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `idg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idinv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `idalu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idpa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
