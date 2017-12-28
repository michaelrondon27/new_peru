-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2017 a las 02:15:39
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_peru`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `act_intereses`
--

CREATE TABLE `act_intereses` (
  `id_act_intereses` int(11) NOT NULL,
  `act_extra` text,
  `voleibol` varchar(2) DEFAULT NULL,
  `basquet` varchar(2) DEFAULT NULL,
  `futbolito` varchar(2) DEFAULT NULL,
  `ajedrez` varchar(2) DEFAULT NULL,
  `danza` varchar(2) DEFAULT NULL,
  `teatro` varchar(2) DEFAULT NULL,
  `musica` varchar(2) DEFAULT NULL,
  `soc_boliv` varchar(2) DEFAULT NULL,
  `cruz_roja` varchar(2) DEFAULT NULL,
  `biblioteca` varchar(2) DEFAULT NULL,
  `mantenimiento` varchar(2) DEFAULT NULL,
  `conservacion` varchar(2) DEFAULT NULL,
  `id_alum` int(11) NOT NULL,
  `condiciones` text,
  `motivo` text,
  `num_serial` varchar(40) DEFAULT NULL,
  `denuncia` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `act_intereses`
--

INSERT INTO `act_intereses` (`id_act_intereses`, `act_extra`, `voleibol`, `basquet`, `futbolito`, `ajedrez`, `danza`, `teatro`, `musica`, `soc_boliv`, `cruz_roja`, `biblioteca`, `mantenimiento`, `conservacion`, `id_alum`, `condiciones`, `motivo`, `num_serial`, `denuncia`) VALUES
(1, 'fsafsafsafas', 'No', 'Si', 'Si', 'No', 'No', 'No', 'No', 'Si', 'Si', 'No', 'No', 'No', 2, '', 'fsafsafsaf', '', 'gsdgsdgsdg'),
(2, 'beisbol', 'No', 'Si', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Si', 'No', 'No', 3, '', '', NULL, NULL),
(3, '', 'Si', 'No', 'No', 'Si', 'No', 'No', 'No', 'No', 'No', 'Si', 'No', 'No', 4, '', 'no me la han dado', NULL, 'sgs'),
(4, '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 5, '', '', NULL, NULL),
(5, 'beisbol', 'Si', 'No', 'No', 'No', 'No', 'Si', 'No', 'No', 'Si', 'No', 'Si', 'No', 12, '', 'afasfasf', '', 'fasfasfasfas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alum` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `ced_escolar` varchar(30) NOT NULL,
  `pos_parto` varchar(50) DEFAULT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `lugar_nac` varchar(100) DEFAULT NULL,
  `fec_nac` date NOT NULL,
  `edad` varchar(2) DEFAULT NULL,
  `direccion` text,
  `hermano` varchar(2) DEFAULT NULL,
  `repre` varchar(20) DEFAULT NULL,
  `especifique` text,
  `fec_lopna` date DEFAULT NULL,
  `sexo` varchar(20) NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_madre` int(11) DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `id_padre` int(11) DEFAULT NULL,
  `id_repre` int(11) DEFAULT NULL,
  `id_repre_sup` int(11) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `id_tlf_cel` int(11) NOT NULL,
  `tlf_cel` int(11) NOT NULL,
  `lopna` varchar(2) NOT NULL,
  `estudiante` tinyint(4) NOT NULL DEFAULT '0',
  `foto_carnet` varchar(255) DEFAULT 'default.png',
  `foto_cedula` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alum`, `cedula`, `ced_escolar`, `pos_parto`, `apellidos`, `nombres`, `lugar_nac`, `fec_nac`, `edad`, `direccion`, `hermano`, `repre`, `especifique`, `fec_lopna`, `sexo`, `id_estado`, `id_madre`, `id_status`, `id_padre`, `id_repre`, `id_repre_sup`, `id_pais`, `correo`, `id_tlf_cel`, `tlf_cel`, `lopna`, `estudiante`, `foto_carnet`, `foto_cedula`) VALUES
(2, 20914008, '0020914008', 'Primero', 'Rondon Pereira', 'Michael Daniel', 'Caracas', '1993-02-27', '24', '', 'No', 'Madre', '', '0000-00-00', 'Masculino', 11, 2, 1, 1, 2, 2, 2, 'mrondon72@gmail.com', 5, 1468448, '', 1, '/alumnos/2/michael.png', 'default.png'),
(3, 20184608, '0020184608', '', 'Rondon Pereira', 'Jose David', '', '1996-10-25', '21', '', '', 'Sí', '', '0000-00-00', 'Masculino', 10, 2, 1, 1, 2, 2, 2, 'david_17@hotmail.com', 5, 1748975, '', 1, 'default.png', 'default.png'),
(4, 55254254, '0055254254', '', 'Reryfdfd', 'Gdgfdgfdg', '', '2000-10-09', '16', '', '', '', '', '0000-00-00', 'Masculino', 1, 2, 1, 1, 2, 2, 1, 'gfdgdfgfdgfd@fesgdsgdsfds', 1, 4565465, '', 2, 'default.png', 'default.png'),
(5, 22332323, '0022332323', '', 'Jhajeded', 'Ededeeded', 'Frfrfrft', '2001-10-03', '15', 'ggfgfhfgf', '', 'Madre', '', '0000-00-00', 'Masculino', 2, 2, 1, NULL, NULL, NULL, 2, 'khhjhjhQ@jjkk.com', 1, 7576447, '', 4, 'default.png', 'default.png'),
(12, 21549899, '0021549899', '', 'Dsgdsgfdsuo', 'Fasfasfsa', '', '2006-03-24', '10', '', '', '', '', '0000-00-00', 'Masculino', 1, 2, 1, 1, NULL, NULL, 1, 'ffasffsfas@ffsafs', 3, 2541654, '', 0, '/alumnos/12/michael.png', 'default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ante_medicos`
--

CREATE TABLE `ante_medicos` (
  `id_medicos` int(11) NOT NULL,
  `diabetes` varchar(2) NOT NULL,
  `hipertension` varchar(2) NOT NULL,
  `cardiopatia` varchar(2) NOT NULL,
  `asma` varchar(2) NOT NULL,
  `alergias` varchar(2) NOT NULL,
  `descrip_otras` text,
  `sarampion` varchar(2) NOT NULL,
  `rubeola` varchar(2) NOT NULL,
  `paperas` varchar(2) NOT NULL,
  `lentes` varchar(2) NOT NULL,
  `oido` varchar(2) NOT NULL,
  `diversidad` text,
  `psicolo1` varchar(2) NOT NULL,
  `tera_lengua1` varchar(2) NOT NULL,
  `psicopedagogia1` varchar(2) NOT NULL,
  `neurolo1` varchar(2) NOT NULL,
  `tera_ocup1` varchar(2) NOT NULL,
  `psiquiatria1` varchar(2) NOT NULL,
  `odontologia1` varchar(2) NOT NULL,
  `dermatologia1` varchar(2) NOT NULL,
  `fisiatria1` varchar(2) NOT NULL,
  `otro_esp1` text,
  `psicolo2` varchar(2) NOT NULL,
  `tera_lengua2` varchar(2) NOT NULL,
  `psicopedagogia2` varchar(2) NOT NULL,
  `neurolo2` varchar(2) NOT NULL,
  `tera_ocup2` varchar(2) NOT NULL,
  `psiquiatria2` varchar(2) NOT NULL,
  `odontologia2` varchar(2) NOT NULL,
  `dermatologia2` varchar(2) NOT NULL,
  `fisiatria2` varchar(2) NOT NULL,
  `otro_esp2` text,
  `act_medicado` text,
  `imp_depor` text,
  `seg_med` text,
  `lugar_trata` varchar(100) DEFAULT NULL,
  `id_alum` int(11) NOT NULL,
  `id_tipo_sangre` int(11) DEFAULT NULL,
  `lateralidad` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ante_medicos`
--

INSERT INTO `ante_medicos` (`id_medicos`, `diabetes`, `hipertension`, `cardiopatia`, `asma`, `alergias`, `descrip_otras`, `sarampion`, `rubeola`, `paperas`, `lentes`, `oido`, `diversidad`, `psicolo1`, `tera_lengua1`, `psicopedagogia1`, `neurolo1`, `tera_ocup1`, `psiquiatria1`, `odontologia1`, `dermatologia1`, `fisiatria1`, `otro_esp1`, `psicolo2`, `tera_lengua2`, `psicopedagogia2`, `neurolo2`, `tera_ocup2`, `psiquiatria2`, `odontologia2`, `dermatologia2`, `fisiatria2`, `otro_esp2`, `act_medicado`, `imp_depor`, `seg_med`, `lugar_trata`, `id_alum`, `id_tipo_sangre`, `lateralidad`) VALUES
(2, 'No', 'Si', 'No', 'Si', 'No', '', 'Si', 'Si', 'No', 'Si', 'Si', '', 'Si', 'No', 'No', 'Si', 'Si', 'No', 'No', 'No', 'No', '', 'Si', 'No', 'Si', 'No', 'No', 'No', 'No', 'No', 'No', '', '', '', '', '', 2, 4, 'Diestro'),
(3, 'No', 'No', 'No', 'Si', 'No', '', 'No', 'Si', 'No', 'No', 'Si', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '', '', '', '', 3, 4, 'Diestro'),
(4, 'Si', 'No', 'Si', 'No', 'No', '', 'Si', 'No', 'No', 'Si', 'Si', '', 'No', 'Si', 'Si', 'No', 'Si', 'No', 'No', 'No', 'No', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '', '', 'seguros altamira', '', 4, 5, 'Zurdo'),
(5, 'No', 'No', 'No', 'No', 'No', '', 'No', 'No', 'No', 'No', 'No', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', '', '', '', '', 5, 4, 'Diestro'),
(7, 'No', 'Si', 'No', 'Si', 'No', '', 'No', 'No', 'Si', 'Si', 'No', 'fsafasf', 'No', 'No', 'No', 'Si', 'No', 'No', 'Si', 'No', 'No', '', 'No', 'No', 'No', 'Si', 'No', 'No', 'Si', 'No', 'No', '', 'fasfasf', 'fasfas', 'fasfasfas', 'afsafas', 12, 3, 'Ambidiestro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antropometricas`
--

CREATE TABLE `antropometricas` (
  `id_antropometricas` int(11) NOT NULL,
  `id_alum` int(11) NOT NULL,
  `peso` varchar(15) NOT NULL,
  `parado` varchar(15) NOT NULL,
  `sentado` varchar(15) NOT NULL,
  `brazada` varchar(15) NOT NULL,
  `velocidad` varchar(15) NOT NULL,
  `salto` varchar(15) NOT NULL,
  `abdominales` varchar(15) NOT NULL,
  `flexiones` varchar(15) NOT NULL,
  `suma_fuerzas` varchar(15) NOT NULL,
  `flexibilidad` varchar(15) NOT NULL,
  `resistencia` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `antropometricas`
--

INSERT INTO `antropometricas` (`id_antropometricas`, `id_alum`, `peso`, `parado`, `sentado`, `brazada`, `velocidad`, `salto`, `abdominales`, `flexiones`, `suma_fuerzas`, `flexibilidad`, `resistencia`) VALUES
(1, 2, '60', '60', '50', '80', '15', '21', '20', '21', '62', '100', '36'),
(2, 12, '62', '45', '48', '85', '16', '25', '54', '14', '93', '54', '54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cod_tlf_cel`
--

CREATE TABLE `cod_tlf_cel` (
  `id_tlf_cel` int(11) NOT NULL,
  `cod_tlf_cel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cod_tlf_cel`
--

INSERT INTO `cod_tlf_cel` (`id_tlf_cel`, `cod_tlf_cel`) VALUES
(1, 412),
(2, 414),
(3, 416),
(4, 424),
(5, 426);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cod_tlf_local`
--

CREATE TABLE `cod_tlf_local` (
  `id_tlf_local` int(11) NOT NULL,
  `cod_tlf_local` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cod_tlf_local`
--

INSERT INTO `cod_tlf_local` (`id_tlf_local`, `cod_tlf_local`) VALUES
(1, 212),
(2, 239);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupos`
--

CREATE TABLE `cupos` (
  `id_cupo` int(11) NOT NULL,
  `id_escolar` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `cupos` int(11) NOT NULL,
  `cerrado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cupos`
--

INSERT INTO `cupos` (`id_cupo`, `id_escolar`, `id_grado`, `id_seccion`, `cupos`, `cerrado`) VALUES
(1, 1, 1, 1, 34, 1),
(2, 1, 3, 2, 34, 1),
(3, 1, 2, 1, 34, 1),
(4, 2, 4, 7, 32, 0),
(5, 1, 5, 3, 33, 1),
(7, 2, 2, 1, 35, 0),
(8, 2, 2, 2, 32, 0),
(9, 2, 1, 1, 29, 0),
(10, 2, 1, 2, 31, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escolar`
--

CREATE TABLE `escolar` (
  `id_escolar` int(11) NOT NULL,
  `escolar` varchar(9) NOT NULL,
  `cerrado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `escolar`
--

INSERT INTO `escolar` (`id_escolar`, `escolar`, `cerrado`) VALUES
(1, '2016-2017', 1),
(2, '2017-2018', 0),
(3, '2018-2019', 0),
(4, '2019-2020', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `id_pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`, `id_pais`) VALUES
(1, '', 1),
(2, 'Amazonas', 2),
(3, 'Anzoategui', 2),
(4, 'Apure', 2),
(5, 'Aragua', 2),
(6, 'Barinas', 2),
(7, 'Bolívar', 2),
(8, 'Carabobo', 2),
(9, 'Cojedes', 2),
(10, 'Delta Amacuro', 2),
(11, 'Distrito Capital', 2),
(12, 'Falcón', 2),
(13, 'Guárico', 2),
(14, 'Lara', 2),
(15, 'Mérida', 2),
(16, 'Miranda', 2),
(17, 'Monagas', 2),
(18, 'Nueva Esparta', 2),
(19, 'Portuguesa', 2),
(20, 'Sucre', 2),
(21, 'Táchira', 2),
(22, 'Trujillo', 2),
(23, 'Vargas', 2),
(24, 'Yaracuy', 2),
(25, 'Zulia', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id_grado` int(11) NOT NULL,
  `grado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id_grado`, `grado`) VALUES
(1, '1ero'),
(2, '2do'),
(3, '3ero'),
(4, '4to'),
(5, '5to');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_instruccion`
--

CREATE TABLE `grado_instruccion` (
  `id_instruccion` int(11) NOT NULL,
  `instruccion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado_instruccion`
--

INSERT INTO `grado_instruccion` (`id_instruccion`, `instruccion`) VALUES
(1, NULL),
(2, 'Bachiller'),
(3, 'TSU'),
(4, 'Licenciado'),
(5, 'Ingeniero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hermanos`
--

CREATE TABLE `hermanos` (
  `id_hermano` int(11) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `repitiente` varchar(2) DEFAULT NULL,
  `id_alum` int(11) NOT NULL,
  `id_grado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_inscripcion` int(11) NOT NULL,
  `id_escolar` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `condicion` text,
  `repitiente` text,
  `id_alum` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `procesado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id_inscripcion`, `id_escolar`, `fecha`, `condicion`, `repitiente`, `id_alum`, `id_grado`, `id_seccion`, `id_usuario`, `procesado`) VALUES
(2, 1, '2016-07-11', 'Regular', '', 3, 1, 1, 1, 0),
(3, 1, '2016-10-04', 'Regular', '', 2, 1, 1, 1, 0),
(4, 1, '2016-10-09', 'Regular', '', 4, 1, 1, 1, 0),
(5, 1, '2016-10-14', 'Regular', '', 5, 1, 1, 4, 0),
(6, 2, '2017-04-20', 'Regular', '', 3, 2, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `madre`
--

CREATE TABLE `madre` (
  `id_madre` int(11) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `edad` varchar(2) DEFAULT NULL,
  `cedula` int(11) NOT NULL,
  `ocupacion` text,
  `dir_empresa` text,
  `tlf_empresa` varchar(7) DEFAULT NULL,
  `dir_hab` text,
  `tlf_hab` varchar(7) NOT NULL,
  `tlf_cel` varchar(7) NOT NULL,
  `id_tlf_cel` int(11) NOT NULL,
  `id_tlf_local` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_instruccion` int(11) DEFAULT NULL,
  `cod_emp` varchar(4) DEFAULT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `madre`
--

INSERT INTO `madre` (`id_madre`, `apellidos`, `nombres`, `edad`, `cedula`, `ocupacion`, `dir_empresa`, `tlf_empresa`, `dir_hab`, `tlf_hab`, `tlf_cel`, `id_tlf_cel`, `id_tlf_local`, `id_status`, `id_instruccion`, `cod_emp`, `correo`) VALUES
(2, 'Pereira Gouveia', 'Maria Jose', '', 6045787, '', '', '', '', '8634792', '8646468', 1, 1, 1, 2, '', 'asdasdsa@dsdsads.com'),
(3, 'maoidsfdiugbiodfb', 'idbidsbfidsfo', '48', 5486417, 'dsfdsdgfds', NULL, NULL, 'gfdsgfdhhfhds', '8469878', '1394879', 3, 2, 1, 3, NULL, ''),
(4, 'Icnvosd Disnosdnf', 'Osnfoas Asnfoasn', '42', 5161614, 'Afiosa Fdgs Sdf Sdfdsg', 'Fmosdmfgdso Gmsdmngodsn Gsdogsd', '6516161', 'Sanfoasnf Asfasasf', '5194984', '1961981', 4, 2, 1, 3, '212', 'dsafsffas@sfs'),
(5, 'Grhkiu Kytnbfg', 'Juoyum Jykyt', '', 18434684, 'Hrehr', '', '', '', '4531587', '5684681', 3, 1, 1, 5, '', 'hfshfhsf@ghhrhr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` tinyint(4) NOT NULL,
  `logo` text COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `logo`, `nombre`) VALUES
(1, 'menu/peru.jpg', 'Peru De Lacroix'),
(2, 'inicio/peru.jpg', 'Sistema De Inscripcion Perú De Lacroix'),
(3, 'documento/manual.pdf', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_nota` bigint(20) NOT NULL,
  `id_alum` int(11) NOT NULL,
  `escolar` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
  `seccion` int(11) NOT NULL,
  `aprobo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `id_alum`, `escolar`, `grado`, `seccion`, `aprobo`) VALUES
(1, 3, 1, 1, 1, 'si'),
(2, 2, 1, 1, 1, 'si'),
(3, 5, 1, 1, 1, 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre`
--

CREATE TABLE `padre` (
  `id_padre` int(11) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `edad` varchar(2) DEFAULT NULL,
  `cedula` int(11) NOT NULL,
  `ocupacion` text,
  `dir_empresa` text,
  `dir_hab` text NOT NULL,
  `tlf_empresa` varchar(7) DEFAULT NULL,
  `tlf_cel` int(11) NOT NULL,
  `tlf_hab` int(11) NOT NULL,
  `id_tlf_cel` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_instruccion` int(11) DEFAULT NULL,
  `id_tlf_local` int(11) NOT NULL,
  `cod_emp` varchar(4) DEFAULT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `padre`
--

INSERT INTO `padre` (`id_padre`, `apellidos`, `nombres`, `edad`, `cedula`, `ocupacion`, `dir_empresa`, `dir_hab`, `tlf_empresa`, `tlf_cel`, `tlf_hab`, `id_tlf_cel`, `id_status`, `id_instruccion`, `id_tlf_local`, `cod_emp`, `correo`) VALUES
(1, 'Rondon Mata', 'Carlos Eulise', '', 5974618, '', '', '', '', 8646468, 8586876, 2, 1, 1, 1, '', 'mcsdisdfsd@ewefd.com'),
(2, 'Kjhgft Hbfdnhfg', 'Gqwegewgd Vsgsdg', '', 5466887, '', '', '', '', 9414246, 1711464, 4, 1, 5, 2, '', 'gvsdgsdgsd@fedfsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `pais` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `pais`) VALUES
(1, NULL),
(2, 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_eventos`
--

CREATE TABLE `registro_eventos` (
  `id_evento` bigint(20) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `evento` text NOT NULL,
  `operacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_eventos`
--

INSERT INTO `registro_eventos` (`id_evento`, `usuario`, `ip`, `fecha`, `evento`, `operacion`) VALUES
(0, 'mrondon', '::1', '2017-03-10 09:17:37', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(1, '', '192.168.9.254', '2017-03-02 12:00:32', 'Actualizo el nombre de la barra de navegacion a Michael Rondon, realizado por el usuario: ', 'UPDATE'),
(2, '', '192.168.9.254', '2017-03-02 12:03:49', 'Actualizo el nombre de la barra de navegacion a Peru De Lacroix, realizado por el usuario: ', 'UPDATE'),
(3, '', '192.168.9.254', '2017-03-02 12:03:54', 'Actualizo el nombre de la barra de navegacion a Peru De Lacroix y el logo menu/michael.png, realizado por el usuario: ', 'UPDATE'),
(4, '', '192.168.9.254', '2017-03-02 12:04:00', 'Actualizo el nombre de la barra de navegacion a Peru De Lacroix y el logo menu/peru.jpg, realizado por el usuario: ', 'UPDATE'),
(5, 'mrondon', '192.168.9.254', '2017-03-02 12:20:23', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(6, '', '192.168.9.254', '2017-03-02 12:23:41', 'Actualizo el nombre de la barra de navegacion a Michael Rondon, realizado por el usuario: ', 'UPDATE'),
(7, 'mrondon', '192.168.9.254', '2017-03-02 12:23:58', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(8, '', '192.168.9.254', '2017-03-02 12:25:32', 'Actualizo el nombre del inicio de sesión a Sistema De Inscripcion Perú De Lacroix y el logo menu/michael.png, realizado por el usuario: ', 'UPDATE'),
(9, '', '192.168.9.254', '2017-03-02 12:25:59', 'Actualizo el nombre del inicio de sesión a Sistema De Inscripcion Perú De Lacroix y el logo inicio/michael.png, realizado por el usuario: ', 'UPDATE'),
(10, 'mrondon', '192.168.9.254', '2017-03-02 12:26:09', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(11, '', '192.168.9.254', '2017-03-02 12:26:29', 'Actualizo el nombre del inicio de sesión a Sistema De Inscripcion Perú De Lacroix y el logo inicio/peru.jpg, realizado por el usuario: ', 'UPDATE'),
(12, 'mrondon', '192.168.9.254', '2017-03-02 14:31:33', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(13, 'mrondon', '192.168.9.254', '2017-03-02 14:39:52', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(14, '', '192.168.9.254', '2017-03-02 15:13:53', 'Actualizo el nombre de la barra de navegacion a Michael Rondon, realizado por el usuario: ', 'UPDATE'),
(15, '', '192.168.9.254', '2017-03-02 15:14:03', 'Actualizo el nombre de la barra de navegacion a Peru De Lacroix, realizado por el usuario: ', 'UPDATE'),
(16, '', '', '2017-03-02 15:22:36', 'Agrego al carrusel la imagen 1.jpg, realizado por el usuario: ', 'INSERT'),
(17, '', '', '2017-03-02 15:26:42', 'Agrego al carrusel la imagen 1.jpg, realizado por el usuario: ', 'INSERT'),
(18, 'mrondon', '192.168.9.254', '2017-03-02 15:43:17', 'Agrego al carrusel la imagen 1.jpg, realizado por el usuario: mrondon', 'INSERT'),
(19, 'mrondon', '192.168.9.254', '2017-03-02 15:50:18', 'Elimino al carrusel la imagen slider/1.jpg, realizado por el usuario: mrondon', 'INSERT'),
(20, 'mrondon', '192.168.9.254', '2017-03-02 15:50:25', 'Agrego al carrusel la imagen 1.jpg, realizado por el usuario: mrondon', 'INSERT'),
(21, 'mrondon', '192.168.9.254', '2017-03-02 15:50:29', 'Agrego al carrusel la imagen 2.jpg, realizado por el usuario: mrondon', 'INSERT'),
(22, 'mrondon', '192.168.9.254', '2017-03-02 15:50:33', 'Agrego al carrusel la imagen 3.jpg, realizado por el usuario: mrondon', 'INSERT'),
(23, 'mrondon', '192.168.9.254', '2017-03-02 15:50:36', 'Agrego al carrusel la imagen 4.jpg, realizado por el usuario: mrondon', 'INSERT'),
(24, 'mrondon', '192.168.9.254', '2017-03-02 15:50:40', 'Agrego al carrusel la imagen 5.jpg, realizado por el usuario: mrondon', 'INSERT'),
(25, 'mrondon', '192.168.9.254', '2017-03-02 16:08:15', 'Elimino al carrusel la imagen slider/2.jpg, realizado por el usuario: mrondon', 'INSERT'),
(26, 'mrondon', '192.168.9.254', '2017-03-03 11:22:37', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(27, 'mrondon', '192.168.9.254', '2017-03-03 11:38:19', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(28, 'mrondon', '192.168.9.254', '2017-03-03 11:49:12', 'Se bloqueo al usuario anderson, realizado por el usuario: mrondon', 'UPDATE'),
(29, 'mrondon', '192.168.9.254', '2017-03-03 12:00:58', 'Se desbloqueo al usuario anderson, realizado por el usuario: mrondon', 'UPDATE'),
(30, 'mrondon', '192.168.9.254', '2017-03-03 12:01:02', 'Se desbloqueo al usuario rj, realizado por el usuario: mrondon', 'UPDATE'),
(31, 'mrondon', '192.168.9.254', '2017-03-03 12:01:11', 'Se bloqueo al usuario bvelasquez, realizado por el usuario: mrondon', 'UPDATE'),
(32, 'mrondon', '192.168.9.254', '2017-03-03 12:01:15', 'Se desbloqueo al usuario bvelasquez, realizado por el usuario: mrondon', 'UPDATE'),
(33, 'mrondon', '192.168.9.254', '2017-03-03 14:39:14', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(34, 'mrondon', '192.168.9.254', '2017-03-03 15:31:12', 'Agregado el usuario fasfsafas', 'UPDATE'),
(35, 'mrondon', '192.168.9.254', '2017-03-03 15:32:35', 'Agregado el usuario fsafasfasf', 'UPDATE'),
(36, 'mrondon', '192.168.9.254', '2017-03-03 15:32:54', 'Agregado el usuario fsafasfasf', 'UPDATE'),
(37, 'mrondon', '192.168.9.254', '2017-03-03 15:34:08', 'Agregado el usuario gfhdfghdf', 'UPDATE'),
(38, 'mrondon', '192.168.9.254', '2017-03-03 15:34:52', 'Agregado el usuario gfdegdsfgdsfgsd', 'UPDATE'),
(39, 'mrondon', '192.168.11.201', '2017-03-03 15:44:17', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(40, 'mrondon', '192.168.11.201', '2017-03-03 15:48:26', 'Agregado el usuario rmfopgds', 'UPDATE'),
(41, 'mrondon', '::1', '2017-03-06 09:43:27', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(42, 'mrondon', '::1', '2017-03-06 10:24:52', 'Agrego el año escolar 2018-2019', 'INSERT'),
(43, 'mrondon', '::1', '2017-03-06 10:25:20', 'Agrego el año escolar 2019-2020', 'INSERT'),
(44, 'mrondon', '::1', '2017-03-06 10:48:29', 'Edito el año escolar 2019-2021 con el id 4', 'INSERT'),
(45, 'mrondon', '::1', '2017-03-06 10:48:33', 'Edito el año escolar 2019-2020 con el id 4', 'INSERT'),
(46, 'mrondon', '::1', '2017-03-06 12:04:28', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(47, 'mrondon', '::1', '2017-03-06 14:47:32', 'Agrego el grado 6to', 'INSERT'),
(48, 'mrondon', '::1', '2017-03-06 14:48:07', 'Agrego el grado 6to', 'INSERT'),
(49, 'mrondon', '::1', '2017-03-06 15:07:57', 'Edito el grado 6to con el id 6', 'UPDATE'),
(50, 'mrondon', '::1', '2017-03-06 15:08:00', 'Edito el grado 6tosfcas con el id 6', 'UPDATE'),
(51, 'mrondon', '::1', '2017-03-06 15:08:03', 'Edito el grado 6to con el id 6', 'UPDATE'),
(52, 'mrondon', '::1', '2017-03-06 15:38:09', 'Agrego el grado g', 'INSERT'),
(53, 'mrondon', '::1', '2017-03-06 15:38:51', 'Agrego la seccion H', 'INSERT'),
(54, 'mrondon', '::1', '2017-03-06 15:54:07', 'Edito el seccion G con el id 7', 'UPDATE'),
(55, 'mrondon', '::1', '2017-03-07 08:35:34', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(56, 'mrondon', '::1', '2017-03-07 09:35:15', 'Asigno la seccion Array al grado Array del año escolar Array', 'INSERT'),
(57, 'mrondon', '::1', '2017-03-07 09:37:13', 'Asigno la seccion D al grado 1ero del año escolar 2016-2017', 'INSERT'),
(58, 'mrondon', '::1', '2017-03-07 12:15:50', 'Agrego el grado de isntrucción Ingeniero', 'INSERT'),
(59, 'mrondon', '::1', '2017-03-07 12:24:48', 'Edito el seccion  con el id 5', 'UPDATE'),
(60, 'mrondon', '::1', '2017-03-07 12:25:37', 'Edito el seccion  con el id 5', 'UPDATE'),
(61, 'mrondon', '::1', '2017-03-07 12:25:42', 'Edito el seccion  con el id 5', 'UPDATE'),
(62, 'mrondon', '::1', '2017-03-07 12:26:26', 'Edito el seccion E con el id 5', 'UPDATE'),
(63, 'mrondon', '::1', '2017-03-07 12:26:43', 'Edito el grado de instruccion Ingenierofsafsa con el id 5', 'UPDATE'),
(64, 'mrondon', '::1', '2017-03-07 12:26:48', 'Edito el grado de instruccion Ingeniero con el id 5', 'UPDATE'),
(65, 'mrondon', '::1', '2017-03-07 16:18:29', 'Agrego a la madre 7787248 Fsafsagfsg ', 'INSERT'),
(66, 'mrondon', '::1', '2017-03-07 16:19:31', 'Agrego a la madre 81998949 Asfasfasfas ', 'INSERT'),
(67, 'mrondon', '::1', '2017-03-07 16:20:48', 'Agrego a la madre 15614646 Noisanvo Vinadsvo Mvoidnvoisdn Voidsnvosd', 'INSERT'),
(68, 'mrondon', '::1', '2017-03-07 16:23:29', 'Agrego a la madre 15614646 Noisanvo Vinadsvo Mvoidnvoisdn Voidsnvosd', 'INSERT'),
(69, 'mrondon', '::1', '2017-03-07 16:24:05', 'Agrego a la madre 5156165 Ifnscs Dfgmosd Nfo Oddfo', 'INSERT'),
(70, 'mrondon', '::1', '2017-03-07 16:30:22', 'Agrego a la madre 5161614 Osnfoas Asnfoasn Icnvosd Disnosdnf', 'INSERT'),
(71, 'mrondon', '::1', '2017-03-08 20:02:29', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(72, 'mrondon', '::1', '2017-03-08 21:18:19', 'Actualizo su foto de perfil', 'UPDATE'),
(73, 'mrondon', '::1', '2017-03-09 22:05:56', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(74, 'mrondon', '::1', '2017-03-09 22:47:50', 'Edito a la madre 6045787 Maria Jose Pereira Gouveiabdf con el id 2', 'UPDATE'),
(75, 'mrondon', '::1', '2017-03-09 22:48:25', 'Edito a la madre 60457871 Maria Jose Pereira Gouveia con el id 2', 'UPDATE'),
(76, 'mrondon', '::1', '2017-03-09 22:54:08', 'Edito a la madre 6045787 Maria Jose Pereira Gouveia con el id 2', 'UPDATE'),
(77, 'mrondon', '::1', '2017-03-09 22:59:22', 'Edito a la madre 6045787 Maria Jose Pereira Gouveia con el id 2', 'UPDATE'),
(78, 'mrondon', '::1', '2017-03-09 22:59:27', 'Edito a la madre 6045787 Maria Jose Pereira Gouveiaj??k con el id 2', 'UPDATE'),
(79, 'mrondon', '::1', '2017-03-09 22:59:35', 'Edito a la madre 60457874 Maria Jose Pereira Gouveia con el id 2', 'UPDATE'),
(80, 'mrondon', '::1', '2017-03-09 22:59:39', 'Edito a la madre 6045787 Maria Jose Pereira Gouveia con el id 2', 'UPDATE'),
(81, 'mrondon', '::1', '2017-03-10 09:40:51', 'Se bloqueo al usuario anderson', 'UPDATE'),
(82, 'mrondon', '::1', '2017-03-10 09:40:59', 'Se desbloqueo al usuario anderson', 'UPDATE'),
(83, 'mrondon', '::1', '2017-03-10 09:43:36', 'Se bloqueo al usuario anderson', 'UPDATE'),
(84, 'mrondon', '::1', '2017-03-10 09:43:40', 'Se desbloqueo al usuario anderson', 'UPDATE'),
(85, 'mrondon', '::1', '2017-03-10 10:07:41', 'Agrego al padre 5466887 Gqwegewgd Vsgsdg Gdfsgdsgwe Vsdg', 'INSERT'),
(86, 'mrondon', '::1', '2017-03-10 10:15:08', 'Edito al padre 5466887 Gqwegewgd Vsgsdg Kjhgft Hbfdnhfg con el id 2', 'UPDATE'),
(87, 'mrondon', '::1', '2017-03-10 10:15:27', 'Edito al padre 5466887 Gqwegewgd Vsgsdg Kjhgft Hbfdnhfg con el id 2', 'UPDATE'),
(88, 'mrondon', '::1', '2017-03-10 10:45:08', 'Agrego al representante legal 68464648 Sdfsdfs Dsgdsgfds', 'INSERT'),
(89, 'mrondon', '::1', '2017-03-10 11:01:05', 'Edito al representante legal 68464648 Sdfsdfsfas Dsgdsgfds con el id 3', 'UPDATE'),
(90, 'mrondon', '::1', '2017-03-10 14:22:16', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(91, 'mrondon', '::1', '2017-03-10 14:22:29', 'Edito al representante legal 68464648 Sdfsdfsfas Dsgdsgfdsuo con el id 3', 'UPDATE'),
(92, 'mrondon', '::1', '2017-03-10 14:43:58', 'Agrego a la madre 18434684 Juoyum Jykyt Grhkiu Kytnbfg', 'INSERT'),
(93, 'mrondon', '::1', '2017-03-10 14:45:27', 'Agrego al representante suplente 16868444 Hshs Dshsdh Jngdfb Hg Sgb', 'INSERT'),
(94, 'mrondon', '::1', '2017-03-10 14:46:29', 'Agrego al representante suplente 17465464 Gwsdgb Gwsedgv Fasfasvdf', 'INSERT'),
(95, 'mrondon', '::1', '2017-03-10 15:01:26', 'Edito al representante suplente 17465464 Gwsdgb Gwsedgv Fasfasvdf Gdsags con el id 3', 'UPDATE'),
(96, 'mrondon', '::1', '2017-03-10 15:02:49', 'Edito al representante suplente 17465464 Gwsdgb Gwsedgv Fasfasvdf Ghfsghdfg con el id 3', 'UPDATE'),
(97, 'mrondon', '::1', '2017-03-10 16:32:38', 'Se retiro del plantel al usuario Jose David Rondon Pereira', 'UPDATE'),
(98, 'mrondon', '::1', '2017-03-10 16:37:34', 'Se reingreso al plantel al alumno Jose David Rondon Pereira', 'UPDATE'),
(99, 'mrondon', '::1', '2017-03-10 16:37:38', 'Se reingreso al plantel al alumno Ededeeded Jhajeded', 'UPDATE'),
(100, 'mrondon', '::1', '2017-03-13 08:49:33', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(101, 'mrondon', '::1', '2017-03-15 14:21:36', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(102, 'mrondon', '::1', '2017-03-15 15:05:35', 'Edito el usuario mrondon, nombre: Michael, apellido: Rondon y perfil: 1', 'UPDATE'),
(103, 'mrondon', '::1', '2017-03-15 15:06:20', 'Actualizo la contraseña del usuario mrondon', 'UPDATE'),
(104, 'mrondon', '::1', '2017-03-17 15:11:45', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(105, 'mrondon', '192.168.9.24', '2017-03-17 15:16:14', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(106, 'mrondon', '::1', '2017-03-17 15:20:16', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(107, 'mrondon', '::1', '2017-03-17 16:19:43', 'Registro al alumno Dwadwadwadaw  con la cedula ', 'UPDATE'),
(108, 'mrondon', '::1', '2017-03-17 16:21:04', 'Registro al alumno Dwadwadwadaw  con la cedula 23456486', 'UPDATE'),
(109, 'mrondon', '::1', '2017-03-17 16:24:20', 'Registro al alumno Dwadwadwadaw Dwaadfwa con la cedula 23456486', 'UPDATE'),
(110, 'mrondon', '::1', '2017-03-20 09:16:04', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(111, 'mrondon', '::1', '2017-03-20 09:25:23', 'Registro al alumno Fasfasfsa Dsgdsgfdsuo con la cedula 21549899', 'UPDATE'),
(112, 'mrondon', '::1', '2017-03-20 09:27:34', 'Registro al alumno Fasfasfsa Dsgdsgfdsuo con la cedula 21549899', 'UPDATE'),
(113, 'mrondon', '::1', '2017-03-20 11:45:35', 'Registro al alumno Fasfasfsa Dsgdsgfdsuo con la cedula 21549899', 'UPDATE'),
(114, 'mrondon', '::1', '2017-03-20 15:23:39', 'Le asigno los representantes al alumno ', 'UPDATE'),
(115, 'mrondon', '::1', '2017-03-20 15:30:13', 'Le asigno los representantes al alumno Fasfasfsa Dsgdsgfdsuo', 'UPDATE'),
(116, 'mrondon', '::1', '2017-03-24 11:07:42', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(117, 'mrondon', '::1', '2017-03-27 11:43:57', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(118, 'mrondon', '::1', '2017-03-27 11:44:37', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(119, 'mrondon', '::1', '2017-03-27 11:44:46', 'Edito el usuario mrondon, nombre: Michael, apellido: Rondon y perfil: 3', 'UPDATE'),
(120, 'mrondon', '::1', '2017-03-28 09:49:08', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(121, 'mrondon', '::1', '2017-03-28 11:41:38', 'Le asigno los antecedentes medicos al alumno Fasfasfsa Dsgdsgfdsuo', 'UPDATE'),
(122, 'mrondon', '::1', '2017-03-28 11:43:34', 'Le asigno los antecedentes medicos al alumno Fasfasfsa Dsgdsgfdsuo', 'UPDATE'),
(123, 'mrondon', '::1', '2017-03-29 08:18:46', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(124, 'mrondon', '::1', '2017-03-29 08:33:04', 'Le asigno la informacion general al alumno Fasfasfsa Dsgdsgfdsuo', 'UPDATE'),
(125, 'mrondon', '::1', '2017-03-29 10:20:57', 'Le asigno las medidas antropometricas al alumno Fasfasfsa Dsgdsgfdsuo', 'UPDATE'),
(126, 'mrondon', '192.168.9.69', '2017-03-29 11:18:48', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(127, 'mrondon', '192.168.9.25', '2017-03-29 13:36:15', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(128, 'mrondon', '192.168.9.25', '2017-03-30 14:36:51', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(129, 'mrondon', '192.168.9.25', '2017-03-30 15:39:33', 'Edito los datos del alumno Michael Daniel Rondon Pereira con la cedula 20914008', 'UPDATE'),
(130, 'mrondon', '192.168.9.25', '2017-03-30 15:40:47', 'Edito los datos del alumno Michael Daniel Rondon Pereira con la cedula 20914008', 'UPDATE'),
(131, 'mrondon', '192.168.9.25', '2017-03-30 15:41:58', 'Edito los datos del alumno Michael Daniel Rondon Pereira con la cedula 20914008', 'UPDATE'),
(132, 'mrondon', '192.168.9.25', '2017-03-30 15:42:13', 'Edito los datos del alumno Michael Daniel Rondon Pereira con la cedula 20914008', 'UPDATE'),
(133, 'mrondon', '192.168.9.25', '2017-03-30 15:47:57', 'Edito los datos del alumno Michael Daniel Rondon Pereira con la cedula 20914008', 'UPDATE'),
(134, 'mrondon', '192.168.9.25', '2017-03-30 15:48:21', 'Edito los datos del alumno Michael Daniel Rondon Pereira con la cedula 20914008', 'UPDATE'),
(135, 'mrondon', '192.168.9.25', '2017-03-30 15:51:34', 'Edito los datos del alumno Michael Daniel Rondon Pereira con la cedula 20914008', 'UPDATE'),
(136, 'mrondon', '192.168.9.25', '2017-03-30 15:52:05', 'Edito los datos del alumno Michael Daniel Rondon Pereira con la cedula 20914008', 'UPDATE'),
(137, 'mrondon', '192.168.9.25', '2017-03-30 15:52:26', 'Edito los datos del alumno Jose David Rondon Pereira con la cedula 20184608', 'UPDATE'),
(138, 'mrondon', '192.168.9.25', '2017-04-03 08:48:58', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(139, 'mrondon', '192.168.9.25', '2017-04-03 08:49:28', 'Edito los datos del alumno Michael Daniel Rondon Pereira con la cedula 20914007', 'UPDATE'),
(140, 'mrondon', '192.168.9.25', '2017-04-03 08:49:36', 'Edito los datos del alumno Michael Daniel Rondon Pereira con la cedula 20914008', 'UPDATE'),
(141, 'mrondon', '192.168.9.25', '2017-04-03 15:14:30', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(142, 'mrondon', '192.168.9.25', '2017-04-03 15:44:30', 'Edito los representantes al alumno ', 'UPDATE'),
(143, 'mrondon', '192.168.9.25', '2017-04-03 15:44:35', 'Edito los representantes al alumno ', 'UPDATE'),
(144, 'mrondon', '192.168.9.25', '2017-04-03 15:45:35', 'Edito los representantes al alumno ', 'UPDATE'),
(145, 'mrondon', '192.168.9.25', '2017-04-03 15:45:42', 'Edito los representantes al alumno ', 'UPDATE'),
(146, '', '192.168.9.25', '2017-04-03 17:07:18', 'Edito los antecedentes medicos al alumno ', 'UPDATE'),
(147, '', '192.168.9.25', '2017-04-03 17:07:25', 'Edito los antecedentes medicos al alumno ', 'UPDATE'),
(148, 'mrondon', '192.168.9.25', '2017-04-05 08:48:38', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(149, '', '192.168.9.25', '2017-04-05 13:18:50', 'Edito la informacion general al alumno ', 'UPDATE'),
(150, '', '192.168.9.25', '2017-04-05 13:18:57', 'Edito la informacion general al alumno ', 'UPDATE'),
(151, '', '192.168.9.25', '2017-04-05 14:47:36', 'Edito las medidas antropometricas al alumno ', 'UPDATE'),
(152, '', '192.168.9.25', '2017-04-05 14:48:03', 'Edito las medidas antropometricas al alumno ', 'UPDATE'),
(153, '', '192.168.9.25', '2017-04-05 14:48:46', 'Edito las medidas antropometricas al alumno ', 'UPDATE'),
(154, '', '192.168.9.25', '2017-04-05 14:48:58', 'Edito las medidas antropometricas al alumno ', 'UPDATE'),
(155, 'mrondon', '192.168.9.25', '2017-04-05 15:40:00', 'Edito los antecedentes medicos al alumno Michael Daniel Rondon Pereira', 'UPDATE'),
(156, 'mrondon', '192.168.9.25', '2017-04-05 15:40:12', 'Edito la informacion general al alumno Michael Daniel Rondon Pereira', 'UPDATE'),
(157, 'mrondon', '192.168.9.25', '2017-04-05 15:40:27', 'Edito las medidas antropometricas al alumno Michael Daniel Rondon Pereira', 'UPDATE'),
(158, 'mrondon', '192.168.9.25', '2017-04-05 15:57:19', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(159, 'mrondon', '192.168.9.25', '2017-04-05 15:58:24', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(160, 'mrondon', '192.168.9.25', '2017-04-05 15:59:37', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(161, 'mrondon', '192.168.9.25', '2017-04-05 15:59:48', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(162, 'mrondon', '192.168.9.25', '2017-04-05 16:02:39', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(163, 'mrondon', '192.168.9.25', '2017-04-05 16:03:13', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(164, 'mrondon', '192.168.9.25', '2017-04-05 16:06:04', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(165, 'mrondon', '192.168.9.25', '2017-04-05 16:06:39', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(166, 'mrondon', '192.168.9.25', '2017-04-05 16:06:50', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(167, 'mrondon', '192.168.9.25', '2017-04-05 16:07:12', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(168, 'mrondon', '192.168.9.25', '2017-04-05 16:08:03', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(169, 'mrondon', '192.168.9.25', '2017-04-05 16:08:29', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(170, 'mrondon', '192.168.9.25', '2017-04-05 16:08:53', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(171, 'mrondon', '192.168.9.25', '2017-04-05 16:09:25', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(172, 'mrondon', '192.168.9.25', '2017-04-05 16:09:36', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(173, 'mrondon', '192.168.9.25', '2017-04-05 16:09:53', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(174, 'mrondon', '192.168.9.25', '2017-04-05 16:10:18', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(175, 'mrondon', '192.168.9.25', '2017-04-05 16:10:31', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(176, 'mrondon', '192.168.9.25', '2017-04-05 16:10:41', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(177, 'mrondon', '192.168.9.25', '2017-04-05 16:11:02', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(178, 'mrondon', '192.168.9.25', '2017-04-05 16:11:10', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(179, 'mrondon', '192.168.9.25', '2017-04-05 16:11:33', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(180, 'mrondon', '192.168.9.25', '2017-04-05 16:11:50', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(181, 'mrondon', '192.168.9.25', '2017-04-05 16:12:00', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(182, 'mrondon', '192.168.9.25', '2017-04-05 16:12:07', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(183, 'mrondon', '192.168.9.25', '2017-04-05 16:12:17', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(184, 'mrondon', '192.168.9.25', '2017-04-05 16:12:26', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(185, 'mrondon', '192.168.9.25', '2017-04-05 16:12:39', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(186, 'mrondon', '192.168.9.25', '2017-04-05 16:12:46', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(187, 'mrondon', '192.168.9.25', '2017-04-05 16:13:22', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(188, 'mrondon', '192.168.9.25', '2017-04-05 16:13:31', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(189, 'mrondon', '192.168.9.25', '2017-04-05 16:13:38', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(190, 'mrondon', '192.168.9.25', '2017-04-05 16:14:08', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(191, 'mrondon', '192.168.9.25', '2017-04-05 16:14:31', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(192, 'mrondon', '192.168.9.25', '2017-04-05 16:14:51', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(193, 'mrondon', '192.168.9.25', '2017-04-05 16:15:31', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(194, 'mrondon', '192.168.9.25', '2017-04-05 16:16:10', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(195, 'mrondon', '192.168.9.25', '2017-04-05 16:16:20', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(196, 'mrondon', '192.168.9.25', '2017-04-05 16:16:30', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(197, 'mrondon', '192.168.9.25', '2017-04-05 16:16:37', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(198, 'mrondon', '192.168.9.25', '2017-04-05 16:16:47', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(199, 'mrondon', '192.168.9.25', '2017-04-05 16:17:00', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(200, 'mrondon', '192.168.9.25', '2017-04-05 16:17:09', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(201, 'mrondon', '192.168.9.25', '2017-04-05 16:17:25', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(202, 'mrondon', '192.168.9.25', '2017-04-05 16:17:41', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(203, 'mrondon', '192.168.9.25', '2017-04-05 16:17:48', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(204, 'mrondon', '192.168.9.25', '2017-04-05 16:17:58', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(205, 'mrondon', '192.168.9.25', '2017-04-05 16:18:07', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(206, 'mrondon', '192.168.9.25', '2017-04-05 16:18:25', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(207, 'mrondon', '192.168.9.25', '2017-04-05 16:18:40', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(208, 'mrondon', '192.168.9.25', '2017-04-05 16:18:48', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(209, 'mrondon', '192.168.9.25', '2017-04-05 16:18:54', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(210, 'mrondon', '192.168.9.25', '2017-04-05 16:19:07', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(211, 'mrondon', '192.168.9.25', '2017-04-05 16:19:55', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(212, 'mrondon', '192.168.9.25', '2017-04-05 16:20:02', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(213, 'mrondon', '192.168.9.25', '2017-04-05 16:20:14', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(214, 'mrondon', '192.168.9.25', '2017-04-05 16:20:28', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(215, 'mrondon', '192.168.9.25', '2017-04-05 16:20:36', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(216, 'mrondon', '192.168.9.25', '2017-04-05 16:20:44', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(217, 'mrondon', '192.168.9.25', '2017-04-05 16:20:55', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(218, 'mrondon', '192.168.9.25', '2017-04-05 16:21:10', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(219, 'mrondon', '192.168.9.25', '2017-04-05 16:21:19', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(220, 'mrondon', '192.168.9.25', '2017-04-05 16:21:31', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(221, 'mrondon', '192.168.9.25', '2017-04-05 16:21:40', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(222, 'mrondon', '192.168.9.25', '2017-04-05 16:21:47', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(223, 'mrondon', '192.168.9.25', '2017-04-05 16:21:54', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(224, 'mrondon', '192.168.9.25', '2017-04-05 16:22:01', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(225, 'mrondon', '192.168.9.25', '2017-04-05 16:22:15', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(226, 'mrondon', '192.168.9.25', '2017-04-05 16:23:09', 'Reporte de la planilla de inscripcion del alumno con id=2', 'SELECT'),
(227, 'mrondon', '192.168.9.25', '2017-04-05 16:29:34', 'Reporte de la planilla de inscripcion del alumno con id=Michael Daniel Rondon Pereira', 'SELECT'),
(228, 'mrondon', '192.168.9.25', '2017-04-05 16:31:55', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(229, 'mrondon', '192.168.9.25', '2017-04-05 16:32:11', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(230, 'mrondon', '192.168.9.25', '2017-04-05 16:33:28', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(231, 'mrondon', '192.168.9.25', '2017-04-05 16:38:34', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(232, 'mrondon', '192.168.9.25', '2017-04-05 16:40:57', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(233, 'mrondon', '192.168.9.25', '2017-04-05 16:41:20', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(234, 'mrondon', '192.168.9.25', '2017-04-06 08:41:00', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(235, 'mrondon', '192.168.9.25', '2017-04-06 08:41:11', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(236, 'mrondon', '192.168.8.50', '2017-04-06 08:43:59', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(237, 'mrondon', '192.168.8.50', '2017-04-06 08:44:15', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(238, 'mrondon', '192.168.8.50', '2017-04-06 08:44:22', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(239, 'mrondon', '192.168.8.50', '2017-04-06 08:44:24', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(240, 'mrondon', '192.168.8.50', '2017-04-06 08:44:24', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(241, 'mrondon', '192.168.8.50', '2017-04-06 08:44:25', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(242, 'mrondon', '192.168.9.25', '2017-04-06 08:44:30', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(243, 'mrondon', '192.168.8.50', '2017-04-06 08:44:42', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(244, 'mrondon', '192.168.8.50', '2017-04-06 08:44:59', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(245, 'mrondon', '192.168.8.50', '2017-04-06 08:45:02', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(246, 'mrondon', '192.168.8.50', '2017-04-06 08:45:47', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(247, 'mrondon', '192.168.9.25', '2017-04-06 08:47:50', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(248, 'mrondon', '192.168.8.50', '2017-04-06 08:49:19', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(249, 'mrondon', '192.168.9.25', '2017-04-06 08:51:27', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(250, 'mrondon', '192.168.9.25', '2017-04-06 08:52:40', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(251, 'mrondon', '192.168.8.50', '2017-04-06 08:55:26', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(252, 'mrondon', '192.168.9.25', '2017-04-06 09:00:29', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(253, 'mrondon', '192.168.8.50', '2017-04-06 09:00:45', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(254, 'mrondon', '192.168.9.25', '2017-04-06 09:03:09', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(255, 'mrondon', '192.168.9.25', '2017-04-06 09:11:34', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(256, 'mrondon', '192.168.9.25', '2017-04-06 09:28:23', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(257, 'mrondon', '192.168.9.25', '2017-04-06 09:29:07', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(258, 'mrondon', '192.168.9.25', '2017-04-06 09:29:46', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(259, 'mrondon', '192.168.9.25', '2017-04-06 09:32:24', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(260, 'mrondon', '192.168.9.25', '2017-04-06 09:34:26', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(261, 'mrondon', '192.168.9.25', '2017-04-06 09:35:04', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(262, 'mrondon', '192.168.9.25', '2017-04-06 09:35:13', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(263, 'mrondon', '192.168.9.25', '2017-04-06 09:59:27', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(264, 'mrondon', '192.168.9.25', '2017-04-06 09:59:43', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(265, 'mrondon', '192.168.9.25', '2017-04-06 10:00:37', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(266, 'mrondon', '192.168.9.25', '2017-04-06 10:05:44', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(267, 'mrondon', '192.168.9.25', '2017-04-06 10:07:14', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(268, 'mrondon', '192.168.9.25', '2017-04-07 09:01:09', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(269, 'mrondon', '::1', '2017-04-17 10:52:38', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(270, 'mrondon', '::1', '2017-04-17 11:48:04', 'Asigno la seccion A al grado 2do del año escolar 2017-2018', 'INSERT'),
(271, 'mrondon', '::1', '2017-04-17 11:48:13', 'Asigno la seccion B al grado 2do del año escolar 2017-2018', 'INSERT'),
(272, 'mrondon', '::1', '2017-04-17 11:48:35', 'Asigno la seccion A al grado 1ero del año escolar 2017-2018', 'INSERT'),
(273, 'mrondon', '::1', '2017-04-17 11:48:42', 'Asigno la seccion B al grado 1ero del año escolar 2017-2018', 'INSERT'),
(274, 'mrondon', '::1', '2017-04-17 16:29:57', 'Edito el cupo con id: 1, le asigno 35 cupos', 'UPDATE'),
(275, 'mrondon', '::1', '2017-04-17 16:30:22', 'Edito el cupo con id: 1, le asigno 34 cupos', 'UPDATE'),
(276, 'mrondon', '::1', '2017-04-17 16:35:42', 'Edito el cupo con id: 4, le asigno 32 cupos', 'UPDATE'),
(277, 'mrondon', '::1', '2017-04-18 11:22:46', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(278, 'mrondon', '::1', '2017-04-18 11:30:11', 'Asigno 29 cupos a la seccion 1, grado 1 y el año escolar 2', 'UPDATE'),
(279, 'mrondon', '::1', '2017-04-20 09:04:44', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(280, 'mrondon', '::1', '2017-04-20 15:43:44', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(281, 'mrondon', '::1', '2017-04-20 16:28:19', 'Se inscribio al alumno Jose David Rondon Pereira para el año escolar con id 2, al grado con id 2 y a la seccion con id 1', 'INSERT'),
(282, 'mrondon', '::1', '2017-04-20 16:28:42', 'Reporte de la planilla de inscripcion del alumno Jose David Rondon Pereira', 'SELECT'),
(283, 'mrondon', '::1', '2017-04-24 08:37:48', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(284, 'mrondon', '::1', '2017-04-24 15:18:41', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(285, 'mrondon', '::1', '2017-04-25 08:57:59', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(286, 'mrondon', '::1', '2017-04-25 10:22:24', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(287, 'mrondon', '::1', '2017-04-25 10:23:18', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(288, 'rj', '192.168.8.50', '2017-04-25 10:26:51', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(289, 'rj', '192.168.8.50', '2017-04-25 10:31:48', 'Edito el usuario bvelasquez, nombre: Brandon, apellido: Velasquez y perfil: 1', 'UPDATE'),
(290, 'rj', '192.168.8.50', '2017-04-25 10:31:51', 'Edito el usuario bvelasquez, nombre: Brandon, apellido: Velasquez y perfil: 1', 'UPDATE'),
(291, 'rj', '192.168.8.50', '2017-04-25 10:31:54', 'Edito el usuario bvelasquez, nombre: Brandon, apellido: Velasquez y perfil: 1', 'UPDATE'),
(292, 'mrondon', '192.168.9.25', '2017-04-25 10:36:39', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(293, 'mrondon', '192.168.9.25', '2017-04-25 10:56:10', 'Reporte de la planilla de inscripcion del alumno Michael Daniel Rondon Pereira', 'SELECT'),
(294, 'mrondon', '192.168.9.25', '2017-04-25 13:26:30', 'Subio el Manual horario michael rondon.pdf', 'INSERT'),
(295, 'mrondon', '192.168.9.25', '2017-04-25 13:29:35', 'Subio el Manual horario michael rondon.pdf', 'INSERT'),
(296, 'mrondon', '192.168.9.25', '2017-04-25 13:33:36', 'Subio el Manual manual.pdf', 'INSERT'),
(297, 'mrondon', '192.168.9.25', '2017-04-25 13:34:09', 'Subio el Manual manual.pdf', 'INSERT'),
(298, 'mrondon', '192.168.9.25', '2017-04-25 13:34:50', 'Subio el Manual manual.docx', 'INSERT'),
(299, 'mrondon', '192.168.9.25', '2017-04-25 13:36:27', 'Subio el Manual manual.docx', 'INSERT'),
(300, 'mrondon', '192.168.9.25', '2017-04-25 13:36:35', 'Subio el Manual manual.docx', 'INSERT'),
(301, 'mrondon', '192.168.9.25', '2017-04-25 13:37:09', 'Subio el Manual CATALOGO MI CASA BIEN EQUIPADA COMPLETO.pptx', 'INSERT'),
(302, 'mrondon', '192.168.9.25', '2017-04-25 13:37:14', 'Subio el Manual expo.pptx', 'INSERT'),
(303, 'mrondon', '192.168.9.25', '2017-04-25 13:37:21', 'Subio el Manual horario michael rondon.pdf', 'INSERT'),
(304, 'mrondon', '192.168.9.25', '2017-04-25 15:44:27', 'Reporte del listado de alumnos del Año Escolar 2016-2017 Grado1ero SecciónA', 'SELECT'),
(305, 'mrondon', '192.168.9.25', '2017-04-25 15:46:50', 'Reporte del listado de alumnos del Año Escolar 2016-2017 Grado1ero SecciónA', 'SELECT'),
(306, 'mrondon', '192.168.9.25', '2017-04-25 15:47:03', 'Reporte del listado de alumnos del Año Escolar 2016-2017 Grado1ero SecciónA', 'SELECT'),
(307, 'mrondon', '192.168.9.25', '2017-04-25 15:54:28', 'Reporte del listado de alumnos del Año Escolar 2016-2017 Grado1ero SecciónA', 'SELECT'),
(308, 'mrondon', '192.168.9.25', '2017-04-25 16:52:43', 'Excel de listado de alumnos del Año Escolar 2016-2017 Grado 1ero Seccion A', 'SELECT'),
(309, 'mrondon', '192.168.9.25', '2017-04-25 16:53:29', 'Excel de listado de alumnos del Año Escolar 2016-2017 Grado 1ero Seccion A', 'SELECT'),
(310, 'mrondon', '192.168.9.25', '2017-04-26 14:31:02', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(311, 'mrondon', '192.168.9.25', '2017-04-27 13:21:29', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(312, 'mrondon', '192.168.9.25', '2017-04-28 08:49:11', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(313, 'mrondon', '192.168.9.195', '2017-04-28 09:17:14', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(314, 'mrondon', '192.168.9.25', '2017-04-28 15:04:59', 'Excel de listado de alumnos del Año Escolar 2016-2017 Grado 1ero Seccion A', 'SELECT'),
(315, 'mrondon', '192.168.9.25', '2017-04-28 16:25:49', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(316, 'mrondon', '192.168.9.25', '2017-05-02 10:03:30', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(317, 'mrondon', '192.168.9.25', '2017-05-02 10:03:49', 'Excel de listado de alumnos del Año Escolar 2016-2017 Grado 1ero Seccion A', 'SELECT'),
(318, 'rj', '192.168.9.225', '2017-05-02 14:52:41', 'Reporte del listado de alumnos del Año Escolar 2016-2017 Grado1ero SecciónA', 'SELECT'),
(319, 'rj', '192.168.9.225', '2017-05-02 14:53:19', 'Reporte de la planilla de inscripcion del alumno Jose David Rondon Pereira', 'SELECT'),
(320, 'mrondon', '192.168.9.225', '2017-05-02 14:56:13', 'Inicio de sesion del usuario: mrondon', 'LOGIN'),
(321, 'mrondon', '::1', '2017-05-05 19:48:22', 'Inicio de sesion del usuario: mrondon', 'LOGIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repre_legal`
--

CREATE TABLE `repre_legal` (
  `id_repre` int(11) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `edad` varchar(2) DEFAULT NULL,
  `cedula` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `repre_legal`
--

INSERT INTO `repre_legal` (`id_repre`, `apellidos`, `nombres`, `edad`, `cedula`, `id_status`) VALUES
(2, 'Pereira Gouveia', 'Rosa Fatima', '44', 5974618, 1),
(3, 'Dsgdsgfdsuo', 'Sdfsdfsfas', '58', 68464648, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repre_sup`
--

CREATE TABLE `repre_sup` (
  `id_repre_sup` int(11) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `parentesco` varchar(50) NOT NULL,
  `edad` varchar(2) DEFAULT NULL,
  `cedula` int(11) NOT NULL,
  `ocupacion` text,
  `dir_emp` text,
  `tlf_emp` varchar(7) DEFAULT NULL,
  `dir_hab` text NOT NULL,
  `tlf_hab` int(11) NOT NULL,
  `id_instruccion` int(11) DEFAULT NULL,
  `id_tlf_cel` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_tlf_local` int(11) NOT NULL,
  `cod_emp` varchar(3) DEFAULT NULL,
  `tlf_cel` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `repre_sup`
--

INSERT INTO `repre_sup` (`id_repre_sup`, `apellidos`, `nombres`, `parentesco`, `edad`, `cedula`, `ocupacion`, `dir_emp`, `tlf_emp`, `dir_hab`, `tlf_hab`, `id_instruccion`, `id_tlf_cel`, `id_status`, `id_tlf_local`, `cod_emp`, `tlf_cel`, `correo`) VALUES
(2, 'De Freitas Pereira', 'Mariela Del Carmen', '', '', 17161485, '', '', '', '', 8586876, 1, 2, 1, 1, '', 8646468, 'gsdgsdg@fsdfsdg'),
(3, 'Fasfasvdf Ghfsghdfg', 'Gwsdgb Gwsedgv', 'Wgfedsgdg', '', 17465464, 'Gsdgsdgsdg', '', '', 'Gdsagfg Gbdfb Esghbngfd', 1561646, 1, 3, 1, 2, '', 1584846, 'gewgeeg@gfgng');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `seccion` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `seccion`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `imagen` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id_slider`, `imagen`) VALUES
(2, 'slider/1.jpg'),
(4, 'slider/3.jpg'),
(5, 'slider/4.jpg'),
(6, 'slider/5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_sangre`
--

CREATE TABLE `tipo_sangre` (
  `id_tipo_sangre` int(11) NOT NULL,
  `sangre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_sangre`
--

INSERT INTO `tipo_sangre` (`id_tipo_sangre`, `sangre`) VALUES
(1, NULL),
(2, '0-'),
(3, '0+'),
(4, 'A-'),
(5, 'A+'),
(6, 'B-'),
(7, 'B+'),
(8, 'AB-'),
(9, 'AB+');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usu`
--

CREATE TABLE `tipo_usu` (
  `id_tipo_usu` int(11) NOT NULL,
  `tipo_usu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usu`
--

INSERT INTO `tipo_usu` (`id_tipo_usu`, `tipo_usu`) VALUES
(1, 'Administrador'),
(2, 'Secretario(a)'),
(3, 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `id_tipo_usu` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `nombre`, `apellido`, `id_tipo_usu`, `id_status`, `foto`) VALUES
(1, 'mrondon', '7e2f549eb221813c4a44f048cfdbf568', 'Michael', 'Rondon', 1, 1, 'usuarios/mrondon/michael.png'),
(2, 'rj', '25d55ad283aa400af464c76d713c07ad', 'Yoismer', 'Perez', 1, 1, 'default.png'),
(3, 'bvelasquez', '25d55ad283aa400af464c76d713c07ad', 'Brandon', 'Velasquez', 1, 1, 'default.png'),
(4, 'anderson', '25d55ad283aa400af464c76d713c07ad', 'Anderson', 'Aular', 1, 1, 'default.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `act_intereses`
--
ALTER TABLE `act_intereses`
  ADD PRIMARY KEY (`id_act_intereses`),
  ADD KEY `id_alum` (`id_alum`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alum`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `ced_escolar` (`ced_escolar`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_madre` (`id_madre`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_padre` (`id_padre`),
  ADD KEY `id_repre` (`id_repre`),
  ADD KEY `id_repre_sup` (`id_repre_sup`),
  ADD KEY `id_pais` (`id_pais`),
  ADD KEY `id_tlf_cel` (`id_tlf_cel`);

--
-- Indices de la tabla `ante_medicos`
--
ALTER TABLE `ante_medicos`
  ADD PRIMARY KEY (`id_medicos`),
  ADD KEY `id_alum` (`id_alum`),
  ADD KEY `id_tipo_sangre` (`id_tipo_sangre`);

--
-- Indices de la tabla `antropometricas`
--
ALTER TABLE `antropometricas`
  ADD PRIMARY KEY (`id_antropometricas`),
  ADD KEY `id_alum` (`id_alum`);

--
-- Indices de la tabla `cod_tlf_cel`
--
ALTER TABLE `cod_tlf_cel`
  ADD PRIMARY KEY (`id_tlf_cel`);

--
-- Indices de la tabla `cod_tlf_local`
--
ALTER TABLE `cod_tlf_local`
  ADD PRIMARY KEY (`id_tlf_local`);

--
-- Indices de la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD PRIMARY KEY (`id_cupo`),
  ADD KEY `id_escolar_FK` (`id_escolar`),
  ADD KEY `id_grado_FK` (`id_grado`),
  ADD KEY `id_seccion_FK` (`id_seccion`);

--
-- Indices de la tabla `escolar`
--
ALTER TABLE `escolar`
  ADD PRIMARY KEY (`id_escolar`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `grado_instruccion`
--
ALTER TABLE `grado_instruccion`
  ADD PRIMARY KEY (`id_instruccion`);

--
-- Indices de la tabla `hermanos`
--
ALTER TABLE `hermanos`
  ADD PRIMARY KEY (`id_hermano`),
  ADD KEY `id_alum` (`id_alum`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id_inscripcion`,`id_escolar`,`id_alum`),
  ADD KEY `id_alum` (`id_alum`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_seccion` (`id_seccion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `inscripcion_ibfk_5` (`id_escolar`);

--
-- Indices de la tabla `madre`
--
ALTER TABLE `madre`
  ADD PRIMARY KEY (`id_madre`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `id_tlf_cel` (`id_tlf_cel`),
  ADD KEY `id_tlf_local` (`id_tlf_local`),
  ADD KEY `id_instruccion` (`id_instruccion`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_alum` (`id_alum`),
  ADD KEY `escolar` (`escolar`),
  ADD KEY `grado` (`grado`),
  ADD KEY `seccion` (`seccion`);

--
-- Indices de la tabla `padre`
--
ALTER TABLE `padre`
  ADD PRIMARY KEY (`id_padre`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `id_tlf_cel` (`id_tlf_cel`),
  ADD KEY `id_tlf_local` (`id_tlf_local`),
  ADD KEY `id_instruccion` (`id_instruccion`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `registro_eventos`
--
ALTER TABLE `registro_eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `repre_legal`
--
ALTER TABLE `repre_legal`
  ADD PRIMARY KEY (`id_repre`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `repre_sup`
--
ALTER TABLE `repre_sup`
  ADD PRIMARY KEY (`id_repre_sup`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `id_tlf_cel` (`id_tlf_cel`),
  ADD KEY `id_tlf_local` (`id_tlf_local`),
  ADD KEY `id_instruccion` (`id_instruccion`),
  ADD KEY `id_status` (`id_status`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indices de la tabla `tipo_sangre`
--
ALTER TABLE `tipo_sangre`
  ADD PRIMARY KEY (`id_tipo_sangre`);

--
-- Indices de la tabla `tipo_usu`
--
ALTER TABLE `tipo_usu`
  ADD PRIMARY KEY (`id_tipo_usu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_tipo_usu` (`id_tipo_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `act_intereses`
--
ALTER TABLE `act_intereses`
  MODIFY `id_act_intereses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `ante_medicos`
--
ALTER TABLE `ante_medicos`
  MODIFY `id_medicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `antropometricas`
--
ALTER TABLE `antropometricas`
  MODIFY `id_antropometricas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cod_tlf_cel`
--
ALTER TABLE `cod_tlf_cel`
  MODIFY `id_tlf_cel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cod_tlf_local`
--
ALTER TABLE `cod_tlf_local`
  MODIFY `id_tlf_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cupos`
--
ALTER TABLE `cupos`
  MODIFY `id_cupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `escolar`
--
ALTER TABLE `escolar`
  MODIFY `id_escolar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `grado_instruccion`
--
ALTER TABLE `grado_instruccion`
  MODIFY `id_instruccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `hermanos`
--
ALTER TABLE `hermanos`
  MODIFY `id_hermano` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `madre`
--
ALTER TABLE `madre`
  MODIFY `id_madre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `padre`
--
ALTER TABLE `padre`
  MODIFY `id_padre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `registro_eventos`
--
ALTER TABLE `registro_eventos`
  MODIFY `id_evento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;
--
-- AUTO_INCREMENT de la tabla `repre_legal`
--
ALTER TABLE `repre_legal`
  MODIFY `id_repre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `repre_sup`
--
ALTER TABLE `repre_sup`
  MODIFY `id_repre_sup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_sangre`
--
ALTER TABLE `tipo_sangre`
  MODIFY `id_tipo_sangre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tipo_usu`
--
ALTER TABLE `tipo_usu`
  MODIFY `id_tipo_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `act_intereses`
--
ALTER TABLE `act_intereses`
  ADD CONSTRAINT `act_intereses_ibfk_1` FOREIGN KEY (`id_alum`) REFERENCES `alumnos` (`id_alum`);

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`id_madre`) REFERENCES `madre` (`id_madre`),
  ADD CONSTRAINT `alumnos_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `alumnos_ibfk_4` FOREIGN KEY (`id_padre`) REFERENCES `padre` (`id_padre`),
  ADD CONSTRAINT `alumnos_ibfk_5` FOREIGN KEY (`id_repre`) REFERENCES `repre_legal` (`id_repre`),
  ADD CONSTRAINT `alumnos_ibfk_6` FOREIGN KEY (`id_repre_sup`) REFERENCES `repre_sup` (`id_repre_sup`),
  ADD CONSTRAINT `alumnos_ibfk_7` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`),
  ADD CONSTRAINT `alumnos_ibfk_8` FOREIGN KEY (`id_tlf_cel`) REFERENCES `cod_tlf_cel` (`id_tlf_cel`);

--
-- Filtros para la tabla `ante_medicos`
--
ALTER TABLE `ante_medicos`
  ADD CONSTRAINT `ante_medicos_ibfk_1` FOREIGN KEY (`id_alum`) REFERENCES `alumnos` (`id_alum`),
  ADD CONSTRAINT `ante_medicos_ibfk_2` FOREIGN KEY (`id_tipo_sangre`) REFERENCES `tipo_sangre` (`id_tipo_sangre`);

--
-- Filtros para la tabla `antropometricas`
--
ALTER TABLE `antropometricas`
  ADD CONSTRAINT `antropometricas_ibfk_1` FOREIGN KEY (`id_alum`) REFERENCES `alumnos` (`id_alum`);

--
-- Filtros para la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD CONSTRAINT `id_escolar_FK` FOREIGN KEY (`id_escolar`) REFERENCES `escolar` (`id_escolar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_grado_FK` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_seccion_FK` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`);

--
-- Filtros para la tabla `hermanos`
--
ALTER TABLE `hermanos`
  ADD CONSTRAINT `hermanos_ibfk_1` FOREIGN KEY (`id_alum`) REFERENCES `alumnos` (`id_alum`),
  ADD CONSTRAINT `hermanos_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`id_alum`) REFERENCES `alumnos` (`id_alum`),
  ADD CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`),
  ADD CONSTRAINT `inscripcion_ibfk_3` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`),
  ADD CONSTRAINT `inscripcion_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `inscripcion_ibfk_5` FOREIGN KEY (`id_escolar`) REFERENCES `escolar` (`id_escolar`);

--
-- Filtros para la tabla `madre`
--
ALTER TABLE `madre`
  ADD CONSTRAINT `madre_ibfk_1` FOREIGN KEY (`id_tlf_cel`) REFERENCES `cod_tlf_cel` (`id_tlf_cel`),
  ADD CONSTRAINT `madre_ibfk_2` FOREIGN KEY (`id_tlf_local`) REFERENCES `cod_tlf_local` (`id_tlf_local`),
  ADD CONSTRAINT `madre_ibfk_3` FOREIGN KEY (`id_instruccion`) REFERENCES `grado_instruccion` (`id_instruccion`),
  ADD CONSTRAINT `madre_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_id_alum` FOREIGN KEY (`id_alum`) REFERENCES `alumnos` (`id_alum`),
  ADD CONSTRAINT `notas_id_escolar` FOREIGN KEY (`escolar`) REFERENCES `escolar` (`id_escolar`),
  ADD CONSTRAINT `notas_id_grado` FOREIGN KEY (`grado`) REFERENCES `grado` (`id_grado`),
  ADD CONSTRAINT `notas_id_seccion` FOREIGN KEY (`seccion`) REFERENCES `seccion` (`id_seccion`);

--
-- Filtros para la tabla `padre`
--
ALTER TABLE `padre`
  ADD CONSTRAINT `padre_ibfk_1` FOREIGN KEY (`id_tlf_cel`) REFERENCES `cod_tlf_cel` (`id_tlf_cel`),
  ADD CONSTRAINT `padre_ibfk_2` FOREIGN KEY (`id_tlf_local`) REFERENCES `cod_tlf_local` (`id_tlf_local`),
  ADD CONSTRAINT `padre_ibfk_3` FOREIGN KEY (`id_instruccion`) REFERENCES `grado_instruccion` (`id_instruccion`),
  ADD CONSTRAINT `padre_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Filtros para la tabla `repre_legal`
--
ALTER TABLE `repre_legal`
  ADD CONSTRAINT `repre_legal_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Filtros para la tabla `repre_sup`
--
ALTER TABLE `repre_sup`
  ADD CONSTRAINT `repre_sup_ibfk_1` FOREIGN KEY (`id_tlf_cel`) REFERENCES `cod_tlf_cel` (`id_tlf_cel`),
  ADD CONSTRAINT `repre_sup_ibfk_2` FOREIGN KEY (`id_tlf_local`) REFERENCES `cod_tlf_local` (`id_tlf_local`),
  ADD CONSTRAINT `repre_sup_ibfk_3` FOREIGN KEY (`id_instruccion`) REFERENCES `grado_instruccion` (`id_instruccion`),
  ADD CONSTRAINT `repre_sup_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_tipo_usu`) REFERENCES `tipo_usu` (`id_tipo_usu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
