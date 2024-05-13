-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-05-2024 a las 21:39:52
-- Versión del servidor: 10.8.3-MariaDB-log
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cenforp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(11) NOT NULL,
  `opcionOcupacional` varchar(50) NOT NULL,
  `condicion` varchar(50) NOT NULL,
  `turno` varchar(50) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `ocupacion` varchar(50) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `lugarNacimiento` varchar(50) NOT NULL,
  `idioma` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `institucion` varchar(100) DEFAULT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `nombreApoderado` varchar(100) DEFAULT NULL,
  `ocupacionApoderado` varchar(50) DEFAULT NULL,
  `grado` varchar(50) DEFAULT NULL,
  `estadoCivil` varchar(50) DEFAULT NULL,
  `nacionalidadApoderado` varchar(50) DEFAULT NULL,
  `domicilioApoderado` text DEFAULT NULL,
  `firma` varchar(30) DEFAULT NULL,
  `asistencia` int(11) DEFAULT 0,
  `mes` varchar(100) DEFAULT NULL,
  `notaUno` int(11) NOT NULL DEFAULT 0,
  `notaDos` int(11) NOT NULL DEFAULT 0,
  `notaTres` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `codigo`, `opcionOcupacional`, `condicion`, `turno`, `observaciones`, `nombre`, `dni`, `ocupacion`, `fechaNacimiento`, `nacionalidad`, `lugarNacimiento`, `idioma`, `correo`, `institucion`, `calle`, `numero`, `distrito`, `provincia`, `departamento`, `telefono`, `nombreApoderado`, `ocupacionApoderado`, `grado`, `estadoCivil`, `nacionalidadApoderado`, `domicilioApoderado`, `firma`, `asistencia`, `mes`, `notaUno`, `notaDos`, `notaTres`) VALUES
(12, 'CI00012023', 'COMPUTACIÓN E INFORMATICA', 'Becado', 'Mañana', 'NINGUNA', 'MONICA ROBLES LOPEZ', '74562318', 'COMPUTACIÓN E INFORMATICA', '1990-03-06', 'Peruana', 'HUANCAYO', 'Español', 'MONICA@GMAIL.COM', 'MARISCAL CASTILLA', 'AV. HUANCAVELICA Nº120', '3', 'CHILCA', 'HUANCAYO', 'JUNIN', '926444555', 'MONICA ROBLES PEREZ', 'Ama De Casa', 'Secundaria', 'Conviviente', 'Peruana', 'AV. HUANCAVELICA Nº120', 'NINGUNA', 10, 'Febrero', 14, 10, 13),
(13, 'CI00022023', 'COMPUTACIÓN E INFORMATICA', 'Becado', 'Mañana', 'NINGUNA', 'SLASH JORGE FLORES', '20365847', 'COMPUTACIÓN E INFORMATICA', '2000-10-25', 'Peruana', 'HUANCAYO', 'Español', 'SLASH@GMAIL.COM', 'MARISCAL CASTILLA', 'AV. HUANCAVELICA Nº125', '3', 'CHILCA', 'HUANCAYO', 'JUNIN', '958152637', 'FERMIN ROBLES FLORES', 'Trabajador Independiente', 'Superior Tecnico', 'Casado', 'Peruana', 'AV. HUANCAVELICA Nº120', 'NINGUNA', 3, 'Febrero', 2, 2, 2),
(14, 'MA00032023', 'ELECTRICIDAD INDUSTRIAL', 'Becado', 'Mañana', 'NINGUNA', 'Doris Teresa Gaspar Tovar', '87451236', 'ELECTRICIDAD INDUSTRIAL', '2000-02-05', 'Venezolana', 'HUANCAYO', 'Español', 'MONICA@GMAIL.COM', 'MARISCAL CASTILLA', 'AV. HUANCAVELICA Nº120', '3', 'CHILCA', 'HUANCAYO', 'JUNIN', '987456123', 'MONICA ROBLES PEREZ', 'Ama De Casa', 'Primaria', 'Soltero', 'Peruana', 'AV. HUANCAVELICA Nº120', 'NINGUNA', 0, NULL, 0, 0, 0),
(15, 'CI00062023', 'COMPUTACIÓN E INFORMATICA', 'Becado', 'Mañana', 'NINGUNA', 'Silvia Espejo Leon', '12345678', 'COMPUTACIÓN E INFORMATICA', '2000-05-16', 'Peruana', 'HUANCAYO', 'Español', 'MONICA@GMAIL.COM', 'MARISCAL CASTILLA', 'AV. HUANCAVELICA Nº120', '3', 'CHILCA', 'HUANCAYO', 'JUNIN', '965874123', 'MONICA ROBLES PEREZ', 'Soltero', 'Secundaria', 'Casado', 'Venezolano', 'AV. HUANCAVELICA Nº120', 'NINGUNA', 1, 'Enero', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupaciones`
--

CREATE TABLE `ocupaciones` (
  `id` int(11) NOT NULL,
  `opcionOcupacional` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `ocupaciones`
--

INSERT INTO `ocupaciones` (`id`, `opcionOcupacional`, `fecha`) VALUES
(1, 'ELECTRICIDAD INDUSTRIAL', '2023-05-26 16:38:20'),
(2, 'COMPUTACIÓN E INFORMATICA', '2023-05-26 16:38:29'),
(3, 'SOLDADURA Y CONSTRUCCIONES MET', '2023-05-26 17:03:14'),
(5, 'CARPINTERIA Y EBANISTERIA', '2023-05-26 16:39:42'),
(7, 'INDUSTRIAS ALIMENTARIAS', '2023-05-26 16:40:03'),
(8, 'MECANICA AUTOMOTRIZ', '2023-05-26 16:40:30'),
(10, 'DFGHH', '2023-07-11 14:32:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `password` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `foto` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `opcionOcupacional` varchar(30) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `opcionOcupacional`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', '', 1, NULL, '2023-07-17 21:33:28', '2023-07-18 02:33:28'),
(8, 'Silvia Espejo Leon', 'silviaDRTPE', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'Secretario', 'vistas/img/usuarios/silviaDRTPE/929.jpg', 1, '', '2023-07-17 21:22:05', '2023-07-18 02:22:05'),
(15, 'Cesar Robles Capcha', 'SCMCESAR', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'Docente', '', 1, 'SOLDADURA Y CONSTRUCCIONES MET', NULL, '2023-05-26 17:06:38'),
(16, 'Leopoldo Dante Mendez Aguirre', 'CILEOPOLDO', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'Docente', '', 1, 'COMPUTACIÓN E INFORMATICA', '2023-07-17 21:31:55', '2023-07-18 02:31:55'),
(17, 'Paul Javier Albino Mendez', 'CEPAUL', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'Docente', '', 1, 'CARPINTERIA Y EBANISTERIA', NULL, '2023-05-26 17:11:09'),
(18, 'Jesus Roberto Raymundo Cardenas', 'EIJESUS', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'Docente', '', 1, 'ELECTRICIDAD INDUSTRIAL', '2023-07-17 22:15:33', '2023-07-18 03:15:33'),
(19, 'Doris Teresa Gaspar Tovar', 'IADORIS', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'Docente', '', 1, 'INDUSTRIAS ALIMENTARIAS', NULL, '2023-05-26 17:12:28'),
(20, 'Cesar Robles Capcha', 'MACESAR', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'Docente', '', 1, 'MECANICA AUTOMOTRIZ', '2023-06-23 11:05:03', '2023-06-23 16:05:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_codigo` (`codigo`),
  ADD KEY `idx_curso` (`opcionOcupacional`),
  ADD KEY `idx_condicion` (`condicion`),
  ADD KEY `idx_turno` (`turno`),
  ADD KEY `idx_nombre` (`nombre`),
  ADD KEY `idx_dni` (`dni`),
  ADD KEY `idx_fechaNacimiento` (`fechaNacimiento`),
  ADD KEY `idx_lugarNacimiento` (`lugarNacimiento`),
  ADD KEY `idx_nombreApoderado` (`nombreApoderado`),
  ADD KEY `idx_estadoCivil` (`estadoCivil`),
  ADD KEY `idx_nacionalidad` (`nacionalidad`);

--
-- Indices de la tabla `ocupaciones`
--
ALTER TABLE `ocupaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ocupaciones`
--
ALTER TABLE `ocupaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
