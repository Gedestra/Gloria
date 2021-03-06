-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 07-02-2020 a las 17:01:43
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `crm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `nombre_actividad` varchar(255) DEFAULT NULL,
  `fecha_hora_inicio` datetime NOT NULL,
  `fecha_hora_termino` datetime NOT NULL,
  `id_tipo_actividad` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `gcal_evento_id` varchar(255) DEFAULT NULL,
  `sincronizar_actividad` varchar(255) DEFAULT NULL,
  `id_transaccion` int(11) DEFAULT NULL,
  `completado` varchar(255) NOT NULL,
  `confirmado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `nombre_actividad`, `fecha_hora_inicio`, `fecha_hora_termino`, `id_tipo_actividad`, `id_cliente`, `id_empleado`, `id_usuario`, `gcal_evento_id`, `sincronizar_actividad`, `id_transaccion`, `completado`, `confirmado`) VALUES
(1, 'Llamada', '2020-02-19 11:30:00', '2020-02-19 11:45:00', 2, 3, 6, 1, NULL, NULL, NULL, 'No completado', 'No confirmada'),
(2, 'test editar', '2020-02-20 12:00:00', '2020-02-20 14:00:00', 13, 4, 1, 1, NULL, NULL, NULL, 'No completado', 'Confirmada'),
(3, 'limpiar sucursal', '2020-02-05 11:30:00', '2020-02-05 13:00:00', 23, 1, 5, 1, NULL, NULL, NULL, 'No completado', NULL),
(4, 'Comprar', '2020-02-03 14:30:00', '2020-02-04 02:30:00', 22, 4, 1, 1, NULL, NULL, NULL, 'No completado', 'Confirmada'),
(5, 'enviar correos', '2020-02-05 20:15:00', '2020-02-05 21:00:00', 13, 3, 7, 1, NULL, NULL, NULL, 'No completado', 'No confirmada'),
(6, 'Enviar facturas', '2020-02-28 17:30:00', '2020-02-28 18:00:00', 4, 1, 1, 1, NULL, NULL, NULL, 'No completado', 'Confirmada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `municipio` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombres`, `apellidos`, `correo`, `telefono`, `sexo`, `fecha_nacimiento`, `ocupacion`, `direccion`, `estado`, `municipio`, `estatus`, `pais`) VALUES
(1, 'Jorge Luis', 'Ocejo Jimenez', 'ocejo@fivetwofive.mx', '(999) 327-2679', 'Hombre', '1988-01-21', 'Desarrollador', 'Jardines', 'YUCATÁN', 'Mérida', 'Activo', 'México'),
(2, 'Gloria Lilia', 'Alvarez González', 'test@gmail.com', '(814) 593-2580', 'mujer', '1995-05-17', 'Empresario', 'primero de mayo 1', 'NUEVO LEON', 'Monterrey', 'Activo', 'México'),
(3, 'test nombre', 'test apellido', 'test@gmail.com', '(999) 999-9999', 'Mujer', '1995-03-20', 'test ocupacion', 'test', 'AGUASCALIENTES', 'Asientos', 'Activo', 'México'),
(4, 'test 2 nombre', 'test 2 apellido', 'test2@gmail.com', '(999) 999-9999', 'Mujer', '1995-03-20', 'test 2 ocupacion', '', '', '', 'Activo', 'Mayotte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `escolaridad` varchar(255) DEFAULT NULL,
  `estado_civil` varchar(255) DEFAULT NULL,
  `numero_hijos` varchar(255) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `numero_imss` varchar(255) DEFAULT NULL,
  `curp` varchar(255) DEFAULT NULL,
  `rfc` varchar(255) DEFAULT NULL,
  `puesto` varchar(255) DEFAULT NULL,
  `estatus` varchar(255) NOT NULL,
  `id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellidos`, `correo`, `telefono`, `sexo`, `fecha_nacimiento`, `escolaridad`, `estado_civil`, `numero_hijos`, `fecha_ingreso`, `numero_imss`, `curp`, `rfc`, `puesto`, `estatus`, `id_sucursal`) VALUES
(1, 'Jorge Luis', 'Ocejo Jimenez', 'ocejojimenezjorgeluis@gmail.com', '(999) 327-2679', 'Hombre', '1989-02-15', 'Superior', 'Soltero', '0', '2020-01-14', '99999999', 'BJHDB43HJHSD', 'csjabsa223n', 'Desarrollador', 'Activo', 1),
(5, 'Gloria Lilia', 'Álvarez González', 'test@gmail.com', '(814) 593-2580', 'mujer', '1982-11-23', '', '', '', NULL, '', '', '', '', 'Activo', 2),
(6, 'test nombre', 'test apellido', 'test@gmail', '(555) 555-5555', 'mujer', '1995-03-20', 'secundaria', 'soltero', '', '2020-01-24', '123456789', 'IJND2343434', 'FDXFD54543', 'Desarrollador', 'Inactivo', 1),
(7, 'Patricia', 'Martinez Perez', 'paty@gmail.com', '(812) 580-1422', 'mujer', NULL, 'preescolar', 'casado', '', NULL, '03421188145', 'GUAJ802812NTYMI', 'GUAJ890518', 'Cordinador de sucursal', 'Activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_servicio`
--

CREATE TABLE `grupo_servicio` (
  `id_grupo_servicio` int(11) NOT NULL,
  `nombre_grupo_servicio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo_servicio`
--

INSERT INTO `grupo_servicio` (`id_grupo_servicio`, `nombre_grupo_servicio`) VALUES
(1, 'Pestañas'),
(2, 'Aparotologias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado_programacion_sms`
--

CREATE TABLE `listado_programacion_sms` (
  `id_programado` int(11) NOT NULL,
  `id_relacion_sms` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `fecha_programado` date NOT NULL,
  `id_herramienta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id_promocion` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `fecha_vigencia` date NOT NULL,
  `porcentaje` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id_promocion`, `nombre`, `estatus`, `fecha_vigencia`, `porcentaje`, `descripcion`) VALUES
(1, 'PROMO 40%', 'Activo', '2020-01-17', '20', 'Este es un mensaje de prueba1'),
(2, 'PROMO 20%', 'Activo', '2020-01-23', '20', 'Este es un mensaje de prueba2'),
(3, 'test', 'Inactivo', '2020-01-22', '20', 'Este es un mensaje de prueba para testear'),
(4, '40% CUMPLE', 'Activo', '2020-12-31', '25', 'Se otorga en le mes del cumple. \r\nRequiere INE para hacer ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razon_perdido`
--

CREATE TABLE `razon_perdido` (
  `id_razon_perdido` int(11) NOT NULL,
  `label_razon_perdido` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `razon_perdido`
--

INSERT INTO `razon_perdido` (`id_razon_perdido`, `label_razon_perdido`, `estatus`) VALUES
(1, 'No contesta las llamadas', 'Inactivo'),
(2, 'No llegó a su cita', 'Activo'),
(3, 'test', 'Inactivo'),
(4, 'No interesado', 'Activo'),
(5, 'test2', 'Inactivo'),
(6, 'Se le hizo caro', 'Inactivo'),
(7, 'test', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion_servicio_grupo`
--

CREATE TABLE `relacion_servicio_grupo` (
  `id_relacion_servicio` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_grupo_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `relacion_servicio_grupo`
--

INSERT INTO `relacion_servicio_grupo` (`id_relacion_servicio`, `id_servicio`, `id_grupo_servicio`) VALUES
(30, 1, 2),
(31, 5, 2),
(40, 2, 1),
(41, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(255) NOT NULL,
  `precio_lista` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre_servicio`, `precio_lista`, `tipo`, `estatus`) VALUES
(1, 'Tecnica perfecta', '12000', 'Servicio', 'Activo'),
(2, 'Tecnica Elite', '14000', 'Servicio', 'Activo'),
(3, 'Radiofrecuencia', '1700', 'Servicio', 'Activo'),
(4, 'Microdemoabrasion', '750', 'Producto', 'Activo'),
(5, 'Tecnica Volumizer', '2320', 'Servicio', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sms_relacion`
--

CREATE TABLE `sms_relacion` (
  `id_relacion_sms` int(11) NOT NULL,
  `id_sms` int(11) NOT NULL,
  `id_tipo_actividad` int(11) NOT NULL,
  `estatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sms_relacion`
--

INSERT INTO `sms_relacion` (`id_relacion_sms`, `id_sms`, `id_tipo_actividad`, `estatus`) VALUES
(14, 4, 13, 'Activo'),
(15, 3, 13, 'Activo'),
(18, 2, 22, 'Activo'),
(19, 4, 22, 'Activo'),
(27, 2, 12, 'Activo'),
(30, 2, 23, 'Activo'),
(31, 1, 23, 'Activo'),
(32, 5, 24, 'Activo'),
(34, 2, 1, 'Activo'),
(35, 4, 1, 'Activo'),
(37, 1, 26, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sms_tipo`
--

CREATE TABLE `sms_tipo` (
  `id_sms` int(11) NOT NULL,
  `etiqueta_sms` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `body` varchar(5500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sms_tipo`
--

INSERT INTO `sms_tipo` (`id_sms`, `etiqueta_sms`, `nombre`, `body`) VALUES
(1, 'Recordatorio cita', '1 día antes', 'No olvides asistir a tu día el día de mañana, y aprovechar nuestras promociones'),
(2, 'Promo del mes', '1 día antes', 'Aprovecha nuestra promo del mes, ven y deja que te consintamos.'),
(3, 'Vencimiento de gifcard', '3 días antes', '¡Tu GIFCARD esta apunto de vencer, ven y aprovéchala lo mas que se pueda!'),
(4, 'Recordatorio primera cita. ', '1 día antes', 'Mañana es tu primera cita,  no olvides llegar desmaquillada. '),
(5, 'test ocejo', '2 días antes', 'este es un test de prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id_sucursal` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id_sucursal`, `nombre`, `direccion`, `estatus`) VALUES
(1, 'Sucursal 1', 'primero de mayo 1', 'Activo'),
(2, 'sucursal 2', 'segundo de mayo', 'Activo'),
(3, 'Plaza Aleman', 'AV MIGUEL ALEMAN 123', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_actividad`
--

CREATE TABLE `tipo_actividad` (
  `id_tipo_actividad` int(11) NOT NULL,
  `nombre_tipo_actividad` varchar(255) NOT NULL,
  `estatus` varchar(255) NOT NULL,
  `confirmar` varchar(255) DEFAULT NULL,
  `sincronizar_tipo_actividad` varchar(255) NOT NULL,
  `id_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_actividad`
--

INSERT INTO `tipo_actividad` (`id_tipo_actividad`, `nombre_tipo_actividad`, `estatus`, `confirmar`, `sincronizar_tipo_actividad`, `id_icon`) VALUES
(1, 'Llamada', 'Activo', 'Confirmable', 'Activo', '3'),
(2, 'Envio de correo', 'Inactivo', '', 'Inactivo', '2'),
(3, 'Enviar sms', 'Activo', '', 'Activo', '2'),
(4, 'Enviar facturas', 'Activo', 'Confirmable', 'Inactivo', '4'),
(11, 'test 2', 'Inactivo', '', 'Inactivo', '5'),
(12, 'test 3', 'Inactivo', '', 'Activo', '3'),
(13, 'enviar correos', 'Activo', '', 'Activo', '2'),
(14, 'llamar cliente', 'Activo', '', 'Inactivo', '3'),
(22, 'Comprar', 'Activo', 'Confirmable', 'Inactivo', '5'),
(23, 'tuerca', 'Activo', '', 'Inactivo', '8'),
(24, 'test duracion', 'Activo', '', 'Activo', '10'),
(25, 'test confirmable', 'Activo', 'No confirmable', 'Inactivo', '7'),
(26, 'test de no confirmable', 'Inactivo', 'Confirmable', 'Activo', '9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_empleado`, `username`, `password`, `rol`) VALUES
(1, 1, 'alvarez3dl@gmail.com', '123', 'Administrador'),
(2, 5, 'test@gmail.com', '123', 'Empleado'),
(5, 7, 'Paty Martinez Perez', '123', 'Empleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_tipo_actividad` (`id_tipo_actividad`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `grupo_servicio`
--
ALTER TABLE `grupo_servicio`
  ADD PRIMARY KEY (`id_grupo_servicio`);

--
-- Indices de la tabla `listado_programacion_sms`
--
ALTER TABLE `listado_programacion_sms`
  ADD PRIMARY KEY (`id_programado`),
  ADD KEY `id_relacion_sms` (`id_relacion_sms`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id_promocion`);

--
-- Indices de la tabla `razon_perdido`
--
ALTER TABLE `razon_perdido`
  ADD PRIMARY KEY (`id_razon_perdido`);

--
-- Indices de la tabla `relacion_servicio_grupo`
--
ALTER TABLE `relacion_servicio_grupo`
  ADD PRIMARY KEY (`id_relacion_servicio`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_grupo_servicio` (`id_grupo_servicio`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `sms_relacion`
--
ALTER TABLE `sms_relacion`
  ADD PRIMARY KEY (`id_relacion_sms`),
  ADD KEY `id_sms` (`id_sms`),
  ADD KEY `id_tipo_actividad` (`id_tipo_actividad`);

--
-- Indices de la tabla `sms_tipo`
--
ALTER TABLE `sms_tipo`
  ADD PRIMARY KEY (`id_sms`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- Indices de la tabla `tipo_actividad`
--
ALTER TABLE `tipo_actividad`
  ADD PRIMARY KEY (`id_tipo_actividad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `grupo_servicio`
--
ALTER TABLE `grupo_servicio`
  MODIFY `id_grupo_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `listado_programacion_sms`
--
ALTER TABLE `listado_programacion_sms`
  MODIFY `id_programado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id_promocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `razon_perdido`
--
ALTER TABLE `razon_perdido`
  MODIFY `id_razon_perdido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `relacion_servicio_grupo`
--
ALTER TABLE `relacion_servicio_grupo`
  MODIFY `id_relacion_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sms_relacion`
--
ALTER TABLE `sms_relacion`
  MODIFY `id_relacion_sms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `sms_tipo`
--
ALTER TABLE `sms_tipo`
  MODIFY `id_sms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_actividad`
--
ALTER TABLE `tipo_actividad`
  MODIFY `id_tipo_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`id_tipo_actividad`) REFERENCES `tipo_actividad` (`id_tipo_actividad`),
  ADD CONSTRAINT `actividades_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `actividades_ibfk_3` FOREIGN KEY (`id_tipo_actividad`) REFERENCES `tipo_actividad` (`id_tipo_actividad`),
  ADD CONSTRAINT `actividades_ibfk_4` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `actividades_ibfk_5` FOREIGN KEY (`id_tipo_actividad`) REFERENCES `tipo_actividad` (`id_tipo_actividad`),
  ADD CONSTRAINT `actividades_ibfk_6` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `actividades_ibfk_7` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`),
  ADD CONSTRAINT `actividades_ibfk_8` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id_sucursal`);

--
-- Filtros para la tabla `listado_programacion_sms`
--
ALTER TABLE `listado_programacion_sms`
  ADD CONSTRAINT `listado_programacion_sms_ibfk_1` FOREIGN KEY (`id_relacion_sms`) REFERENCES `sms_relacion` (`id_relacion_sms`);

--
-- Filtros para la tabla `relacion_servicio_grupo`
--
ALTER TABLE `relacion_servicio_grupo`
  ADD CONSTRAINT `relacion_servicio_grupo_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`),
  ADD CONSTRAINT `relacion_servicio_grupo_ibfk_2` FOREIGN KEY (`id_grupo_servicio`) REFERENCES `grupo_servicio` (`id_grupo_servicio`);

--
-- Filtros para la tabla `sms_relacion`
--
ALTER TABLE `sms_relacion`
  ADD CONSTRAINT `sms_relacion_ibfk_1` FOREIGN KEY (`id_sms`) REFERENCES `sms_tipo` (`id_sms`),
  ADD CONSTRAINT `sms_relacion_ibfk_2` FOREIGN KEY (`id_tipo_actividad`) REFERENCES `tipo_actividad` (`id_tipo_actividad`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`);
