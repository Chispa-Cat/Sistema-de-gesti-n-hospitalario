-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2024 a las 22:27:28
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
-- Base de datos: `bdhospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `ID_AREA` int(20) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `UBICACION` varchar(50) NOT NULL,
  `NUMERO` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`ID_AREA`, `NOMBRE`, `UBICACION`, `NUMERO`) VALUES
(3, 'alexander', 'santa barbara', 2212025657);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camas`
--

CREATE TABLE `camas` (
  `ID_CAMA` int(20) NOT NULL,
  `HABITACION` int(30) NOT NULL,
  `AREA` varchar(30) NOT NULL,
  `ESTADO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `ID_EQUIPO` int(30) NOT NULL,
  `NOMBRE` int(30) NOT NULL,
  `DESCRIPCION` int(30) NOT NULL,
  `UBICACION` int(30) NOT NULL,
  `ESTADO` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `ID_HIST` int(30) NOT NULL,
  `PACIENTE` varchar(30) NOT NULL,
  `MEDICO` varchar(30) NOT NULL,
  `FECHA_VISITA` varchar(30) NOT NULL,
  `DIAGNOSTICO` varchar(30) NOT NULL,
  `TRATAMIENTO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `ID_MEDICO` int(20) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `APELLIDO` varchar(30) NOT NULL,
  `CARGO` varchar(30) NOT NULL,
  `NUMERO` bigint(30) NOT NULL,
  `CORREO` varchar(30) NOT NULL,
  `HORAS` int(30) NOT NULL,
  `AREA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`ID_MEDICO`, `NOMBRE`, `APELLIDO`, `CARGO`, `NUMERO`, `CORREO`, `HORAS`, `AREA`) VALUES
(2, 'isac', 'si', 'limpia baños', 23145642132, 'aaa@hgadsd', 151, 'fisico cuantico'),
(3, 'alexander', 'arriaga', 'secretario de conserje', 221710140, 'afsx@asv', 121, 'baño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `ID_PACIENTE` int(20) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `APELLIDO` varchar(30) NOT NULL,
  `FECHA` varchar(20) NOT NULL,
  `GENERO` varchar(20) NOT NULL,
  `NUMERO` varchar(20) NOT NULL,
  `CORREO` varchar(30) NOT NULL,
  `HISTORIAL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`ID_PACIENTE`, `NOMBRE`, `APELLIDO`, `FECHA`, `GENERO`, `NUMERO`, `CORREO`, `HISTORIAL`) VALUES
(3, 'Juan', 'Barrios', '5144-12-15', 'Femenino', '3435756878675', 'juan@uwu', 'sopa'),
(5, 'Adrian', 'Barrios', '2000-01-01', 'Femenino', '12121244475', 'jaxhbj@nkjah', 'no'),
(6, 'Isac', 'Alexander', '2000-02-20', 'Masculino', '5524512', 'sa@ha', 'no'),
(7, 'Isac', 'Alexander', '2000-02-20', 'Masculino', '5524512', 'sa@ha', 'no');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`ID_AREA`);

--
-- Indices de la tabla `camas`
--
ALTER TABLE `camas`
  ADD PRIMARY KEY (`ID_CAMA`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`ID_EQUIPO`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`ID_HIST`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`ID_MEDICO`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`ID_PACIENTE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `ID_AREA` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `camas`
--
ALTER TABLE `camas`
  MODIFY `ID_CAMA` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `ID_EQUIPO` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `ID_HIST` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `ID_MEDICO` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `ID_PACIENTE` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
