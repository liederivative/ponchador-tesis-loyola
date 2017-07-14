
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

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`ID`, `ACodigo`, `ANombre`, `ACuatrimestre`, `ACreditos`, `CNombre`, `ASeccion`, `Laboratorio`) VALUES
(1, 'mks-543', 'la vida atomica', 4, 5, 1, 1, b'1'),
(3, 'mta-456', 'Matematicas', 4, 5, 1, 1, b'0'),
(90, 'MTK-098', 'Literatura Avanzada', 1, 5, 3, 1, b'0'),
(93, 'mth-123', 'Matematicas II', 2, 5, 2, 1, b'0'),
(94, 'mta-456', 'Matematicas', 4, 5, 1, 1, b'0'),
(95, 'XXX-333', 'AnatomÃ­a Sub-AtÃ³mica', 12, 4, 4, 1, b'0'),
(96, 'MTA-862', 'Calculo', 7, 2, 4, 1, b'0'),
(100, 'mgk-873', 'Geneologia Asbtracta', 13, 2, 3, 1, b'0'),
(101, 'abc-123', 'ErgonometrÃ­a', 2, 3, 4, 1, b'0'),
(117, 'mta-002', 'EstoEstaDificir', 1, 2, 4, 1, b'1'),
(118, 'mta-001', 'manata', 3, 4, 2, 2, b'1'),
(119, 'mta-003', 'FedexCurrier', 2, 1, 2, 1, b'1'),
(120, 'mta-004', 'Desarrollo Op', 3, 1, 2, 1, b'1'),
(121, 'mta-005', 'Casi Casi', 3, 6, 2, 1, b'1'),
(122, 'mta-006', 'EstoEstaDificir', 2, 3, 2, 1, b'1'),
(123, 'mta-008', 'Gravity', 3, 2, 2, 2, b'1'),
(126, 'mta-009', 'Hellow', 12, 3, 4, 1, b'0'),
(128, 'mta-010', 'Azotes', 3, 2, 3, 3, b'1'),
(134, 'mta-020', 'Matematicas III', 5, 4, 1, 2, b'0'),
(137, 'aaa', 'aaa', 1, 2, 1, 1, b'0'),
(138, 'mta-018', 'Last test', 2, 3, 2, 1, b'1'),
(139, 'mtb-000', 'lalal mamama sss', 2, 4, 1, 1, b'1'),
(140, 'mtc-000', 'lalazo', 11, 5, 2, 1, b'0'),
(141, '', '', 0, 0, 1, 1, b'0');

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

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`ID`, `CNombre`) VALUES
(1, 'RyT'),
(2, 'Agroindustrial'),
(3, 'Electrica'),
(4, 'Industrial');

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

INSERT INTO `clases_creadas` (`ID`, `Nombre`, `PMatricula`, `ACodigo`, `ASeccion`, `NHorario`) VALUES
(19, 'primero', 'aaa', 'mta-008', '001', 'horario2'),
(20, 'primero2', '02-28-2017', 'mta-008', '002', 'horario2'),
(21, '', 'mtaa-4896', 'mtc-000', '001', 'klkmenor');

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

INSERT INTO `horarios` (`ID`, `PMatricula`, `ACodigo`, `ASeccion`, `Dia`, `HIN`, `HOUT`, `TipoHorario`) VALUES
(87, '02-28-2017', 'mta-456', 1, '4', '7:00', '7:00', b'0'),
(89, 'aaaa-1111', 'mta-002', 1, '1', '7:00', '8:00', b'0'),
(90, 'aaaa-1111', 'mta-002', 1, '3', '8:00', '9:00', b'0'),
(93, '', 'mta-002', 2, '', '7:00', '7:00', b'1'),
(94, '', 'XXX-333', 1, '04/12/2017', '7:00', '7:00', b'1'),
(95, '', 'mta-001', 1, '', '7:00', '7:00', b'1'),
(122, '02-28-2017', 'mth-123', 1, '4', '7:00', '7:00', b'0'),
(123, '15-98-2008', 'mks-543', 1, '3', '7:00', '7:00', b'0'),
(124, '02-28-2017', 'mta-009', 1, '3', '7:00', '7:00', b'0'),
(125, '02-28-2017', 'mta-009', 1, '5', '7:00', '7:00', b'0'),
(126, '02-28-2017', 'mta-004', 1, '4', '7:00', '7:00', b'0'),
(127, '2589-9853', 'mta-005', 1, '1', '7:00', '7:00', b'0'),
(128, '78-96-2586', 'mta-010', 3, '2', '7:00', '7:00', b'0'),
(129, '78-96-2586', 'mta-010', 3, '3', '7:00', '7:00', b'0');

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

INSERT INTO `horarios_creados` (`ID`, `Nombre`, `Alias`, `Dia`, `Entrada`, `Salida`) VALUES
(1, 'Horario01', 'HorarioLL2-4', 1, '07:00:00', '08:00:00'),
(2, 'horario2', 'lunes 5 a 6', 1, '17:00:00', '18:00:00'),
(3, 'horario3', 'todos los dias 3-4', 1, '15:00:00', '16:00:00'),
(4, 'horario3', 'todos los dias 3-4', 2, '15:00:00', '16:00:00'),
(5, 'horario3', 'todos los dias 3-4', 3, '15:00:00', '16:00:00'),
(6, 'horario3', 'todos los dias 3-4', 4, '15:00:00', '16:00:00'),
(7, 'horario3', 'todos los dias 3-4', 5, '15:00:00', '16:00:00'),
(8, 'horario3', 'todos los dias 3-4', 6, '15:00:00', '16:00:00'),
(9, 'klkmenor', 'joder', 1, '07:00:00', '09:00:00');

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

INSERT INTO `horarios_creados_linear` (`ID`, `Nombre`, `Alias`, `LunesDe`, `LunesHasta`, `MartesDe`, `MartesHasta`, `MiercolesDe`, `MiercolesHasta`, `JuevesDe`, `JuevesHasta`, `ViernesDe`, `ViernesHasta`, `SabadoDe`, `SabadoHasta`) VALUES
(1, 'Horario01', 'HorarioLL2-4', '07:00:00', '08:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(2, 'horario2', 'lunes 5 a 6', '17:00:00', '18:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(3, 'horario3', 'todos los dias 3-4', '15:00:00', '16:00:00', '15:00:00', '16:00:00', '15:00:00', '16:00:00', '15:00:00', '16:00:00', '15:00:00', '16:00:00', '15:00:00', '16:00:00'),
(4, 'klkmenor', 'joder', '07:00:00', '09:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00');

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

INSERT INTO `profesores` (`ID`, `PNombre`, `PApellido`, `PCedula`, `PCelular`, `PMatricula`, `PDireccion`, `Estatus`, `PTelefono`, `DisponibilidadLunes`, `DisponibilidadMartes`, `DisponibilidadMiercoles`, `DisponibilidadJueves`, `DisponibilidadViernes`, `DisponibilidadSabado`, `HorarioDiurno`, `HorarioVespertino`, `HorarioNocturno`) VALUES
(10, 'Oleo', 'Costa Ramirez', '024-1219562-1', '829-578-6247', '00000001', 'Calle la nova, ciudad catalina rondon 4to', 1, '456-789-4455', b'1', b'1', b'1', b'1', b'0', b'1', b'0', b'0', b'1'),
(11, 'aa', 'aa', 'aaaa', 'aa', '00000010', 'aa', 0, 'aa', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(12, 'leonel', 'acosta', '000-0000000-0', '879-987-8523', '00000002', 'prueba de funcionalidad 015', 1, '789-789-7894', b'1', b'1', b'0', b'0', b'1', b'0', b'0', b'1', b'0'),
(13, 'bombero', 'archimago', '000-0000000-7', '123-456-7890', '00000003', 'prueba de evaluacion final 014', 0, '789-789-7894', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1'),
(14, 'norverto', 'ramirez', '000-1921685-2', '897-456-1236', '00000005', 'distraction', 0, '809-819-4569', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1'),
(17, 'Mateo', 'surdeo', '000-0000000-7', '829-578-6247', '00000006', 'asdwadwsadw', 0, '829-578-6245', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1'),
(18, 'ramon', 'galarto', '000-0000000-7', '879-987-8523', '00000007', 'fefdesrgfsfcsr', 0, '829-578-6245', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1'),
(19, 'ramonada', 'galarto beta', '000-0200000-7', '879-987-8523', '00000008', 'fefdesrgfsfcsr', 0, '829-578-6145', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1'),
(20, 'djbuash', 'dhebudysb', '001-7894564-0', '809-895-5478', '00000009', '`cdsxaz', 0, '', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0');

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
