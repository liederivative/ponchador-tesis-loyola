
--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `ID` int(4) NOT NULL,
  `ACodigo` varchar(10) NOT NULL,
  `ANombre` varchar(30) NOT NULL,
  `ACuatrimestre` int(2) DEFAULT NULL COMMENT 'e.g. 1, 3 , 12',
  `ACreditos` int(1) NOT NULL,
  `CNombre` int(2) DEFAULT NULL,
  `ASeccion` int(11) NOT NULL,
  `Laboratorio` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para manejar todas las asignaturas de una universidad';


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturalab`
--

CREATE TABLE `asignaturalab` (
  `ID` bit(1) NOT NULL COMMENT 'ref. a ATieneLab',
  `laboratorio` varchar(15) NOT NULL COMMENT 'Si tiene o no lab'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignaturalab`
--

INSERT INTO `asignaturalab` (`ID`, `laboratorio`) VALUES
(b'0', 'No'),
(b'1', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `ID` int(11) NOT NULL,
  `CNombre` varchar(50) NOT NULL COMMENT 'Carreras que se imparten.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_creadas`
--

CREATE TABLE `clases_creadas` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `PMatricula` varchar(10) NOT NULL,
  `ACodigo` varchar(10) NOT NULL,
  `ASeccion` varchar(5) NOT NULL,
  `NHorario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases_creadas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `ID` int(4) NOT NULL COMMENT 'Not needs to be autoIncr',
  `DiaSemana` text NOT NULL COMMENT 'week day to join with horarios''s table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`ID`, `DiaSemana`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sabado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID` bit(1) NOT NULL,
  `Estado` varchar(10) NOT NULL COMMENT 'Si esta activo o no el profesor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`ID`, `Estado`) VALUES
(b'0', 'Activo'),
(b'1', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `ID` bit(1) NOT NULL COMMENT 'ID corresponde con el valor del estatus en table profesores',
  `Estatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`ID`, `Estatus`) VALUES
(b'0', 'Activo'),
(b'1', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `ID` int(4) NOT NULL,
  `PMatricula` varchar(15) NOT NULL COMMENT 'Matricula del profesor',
  `ACodigo` varchar(15) NOT NULL COMMENT 'Código de la asignatura',
  `ASeccion` int(2) NOT NULL COMMENT 'Sección de la asignatura',
  `Dia` varchar(10) NOT NULL,
  `HIN` varchar(30) NOT NULL COMMENT 'Hora de entrada asignatura',
  `HOUT` varchar(30) NOT NULL COMMENT 'Hora de salida asignatura',
  `TipoHorario` bit(1) NOT NULL COMMENT 'To know if it''s normal schedule or is a resetting schedule'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Descontianuada en segunda revicion';

--
-- Volcado de datos para la tabla `horarios`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_creados`
--

CREATE TABLE `horarios_creados` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Alias` varchar(50) NOT NULL,
  `Dia` int(11) NOT NULL,
  `Entrada` time NOT NULL,
  `Salida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios_creados`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_creados_linear`
--

CREATE TABLE `horarios_creados_linear` (
  `ID` int(5) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Alias` varchar(50),
  `LunesDe` time ,
  `LunesHasta` time ,
  `MartesDe` time ,
  `MartesHasta` time,
  `MiercolesDe` time,
  `MiercolesHasta` time ,
  `JuevesDe` time ,
  `JuevesHasta` time ,
  `ViernesDe` time ,
  `ViernesHasta` time ,
  `SabadoDe` time ,
  `SabadoHasta` time 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios_creados_linear`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `ID` int(2) NOT NULL,
  `Horario` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`ID`, `Horario`) VALUES
(1, '7:00'),
(2, '7:30'),
(3, '8:00'),
(4, '8:30'),
(5, '10:00'),
(6, '10:30'),
(7, '11:00'),
(8, '11:30'),
(9, '12:00'),
(10, '12:30'),
(11, '13:00'),
(12, '13:30'),
(13, '14:00'),
(14, '14:30'),
(15, '15:00'),
(16, '15:30'),
(17, '16:00'),
(18, '16:30'),
(19, '17:00'),
(20, '17:30'),
(21, '18:00'),
(22, '18:30'),
(23, '19:00'),
(24, '19:30'),
(25, '20:00'),
(26, '20:30'),
(27, '21:00'),
(28, '21:30'),
(29, '22:00'),
(30, '22:30'),
(31, '23:00'),
(32, '23:30'),
(33, '7:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `ID` int(4) NOT NULL,
  `PNombre` varchar(50) NOT NULL,
  `PApellido` varchar(50) NOT NULL,
  `PCedula` varchar(13) NOT NULL,
  `PCelular` varchar(15) NOT NULL,
  `PMatricula` varchar(30) NOT NULL,
  `PDireccion` varchar(100) NOT NULL,
  `Estatus` int(1) NOT NULL COMMENT 'Estatus del profesor',
  `PTelefono` varchar(30) NOT NULL,
  `DisponibilidadLunes` bit(1) NOT NULL,
  `DisponibilidadMartes` bit(1) NOT NULL,
  `DisponibilidadMiercoles` bit(1) NOT NULL,
  `DisponibilidadJueves` bit(1) NOT NULL,
  `DisponibilidadViernes` bit(1) NOT NULL,
  `DisponibilidadSabado` bit(1) NOT NULL,
  `HorarioDiurno` bit(1) NOT NULL,
  `HorarioVespertino` bit(1) NOT NULL,
  `HorarioNocturno` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reposiciones`
--

CREATE TABLE `reposiciones` (
  `ID` int(4) NOT NULL,
  `NombreClase` varchar(15) NOT NULL,
  `DiaReposicion` datetime(6) NOT NULL,
  `Entrada` time(6) NOT NULL,
  `Salida` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposhorariosnombres`
--

CREATE TABLE `tiposhorariosnombres` (
  `ID` bit(1) NOT NULL,
  `TypeScheduleNames` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiposhorariosnombres`
--

INSERT INTO `tiposhorariosnombres` (`ID`, `TypeScheduleNames`) VALUES
(b'0', 'Normal'),
(b'1', 'Reposición');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `clases_creadas`
--
ALTER TABLE `clases_creadas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `horarios_creados`
--
ALTER TABLE `horarios_creados`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `horarios_creados_linear`
--
ALTER TABLE `horarios_creados_linear`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `reposiciones`
--
ALTER TABLE `reposiciones`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `clases_creadas`
--
ALTER TABLE `clases_creadas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT COMMENT 'Not needs to be autoIncr', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT de la tabla `horarios_creados`
--
ALTER TABLE `horarios_creados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `horarios_creados_linear`
--
ALTER TABLE `horarios_creados_linear`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `horas`
--
ALTER TABLE `horas`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `reposiciones`
--
ALTER TABLE `reposiciones`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
