-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-09-2018 a las 03:08:37
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matriculasidop`
--
CREATE DATABASE IF NOT EXISTS `matriculasidop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `matriculasidop`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parentesco` enum('Padre','Madre','Padrastro','Madrastra','Tutor/Tutura Legal','Hermano/Hermana','Tío/Tía','Tío Abuelo/Tía Abuela','Primo/Prima','Abuelo/Abuela','Bisabuelo/Bisabuela','Tatarabuelo/Tatarabuela','Otro') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Padre',
  `otroParentesco` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repitencias` tinyint(4) NOT NULL DEFAULT '0',
  `condicion` enum('nuevo','antiguo') COLLATE utf8mb4_unicode_ci DEFAULT 'nuevo',
  `estado` enum('Revisar','Revisado','Aprobado','Rechazado','Otro') COLLATE utf8mb4_unicode_ci DEFAULT 'Revisar',
  `estadoCivilPadres` enum('Solteros/as','Casados/as','Viudo/a','Divorciados/as','Separados/as','Convivientes') COLLATE utf8mb4_unicode_ci DEFAULT 'Casados/as',
  `idPersona` int(10) UNSIGNED NOT NULL,
  `idApoderado` int(10) UNSIGNED NOT NULL,
  `idCursoActual` int(10) UNSIGNED DEFAULT NULL,
  `idCursoPostu` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_responsable`
--

CREATE TABLE `alumno_responsable` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parentesco` enum('Padre','Madre','Padrastro','Madrastra','Tutor/Tutura Legal','Hermano/Hermana','Tío/Tía','Tío Abuelo/Tía Abuela','Primo/Prima','Abuelo/Abuela','Bisabuelo/Bisabuela','Tatarabuelo/Tatarabuela','Otro') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Padre',
  `otroParentesco` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idPersona` int(10) UNSIGNED NOT NULL,
  `idAlumno` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoderados`
--

CREATE TABLE `apoderados` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nivelEducacional` enum('Sin estudios','Pre-Kínder','Kínder','1 ° Básico','2 ° Básico','3 ° Básico','4 ° Básico','5 ° Básico','6 ° Básico','7 ° Básico','8 ° Básico','1 ° Medio','2 ° Medio','3 ° Medio Científico-Humanista','3 ° Medio Técnico-Profesional','4 ° Medio Científico-Humanista','4 ° Medio Técnico-Profesional','Técnico Nivel Superior','Técnico Nivel Superior Incompleto','Profesional','Bachiller','Licenciatura','Magíster','Doctorado','PostDoctorado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pre-Kínder',
  `profesion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paisDeOrigen` enum('Afganistán','Albania','Alemania','Andorra','Angola','Antigua y Barbuda','Arabia Saudita','Argelia','Argentina','Armenia','Australia','Austria','Azerbaiyán','Bahamas','Bangladés','Barbados','Baréin','Bélgica','Belice','Benín','Bielorrusia','Birmania','Bolivia','Bosnia y Herzegovina','Botsuana','Brasil','Brunéi','Bulgaria','Burkina Faso','Burundi','Bután','Cabo Verde','Camboya','Camerún','Canadá','Catar','Chad','Chile','China','Chipre','Ciudad del Vaticano','Colombia','Comoras','Corea del Norte','Corea del Sur','Costa de Marfil','Costa Rica','Croacia','Cuba','Dinamarca','Dominica','Ecuador','Egipto','El Salvador','Emiratos Árabes Unidos','Eritrea','Eslovaquia','Eslovenia','España','Estados Unidos','Estonia','Etiopía','Filipinas','Finlandia','Fiyi','Francia','Gabón','Gambia','Georgia','Ghana','Granada','Grecia','Guatemala','Guyana','Guinea','Guinea ecuatorial','Guinea-Bisáu','Haití','Honduras','Hungría','India','Indonesia','Irak','Irán','Irlanda','Islandia','Islas Marshall','Islas Salomón','Israel','Italia','Jamaica','Japón','Jordania','Kazajistán','Kenia','Kirguistán','Kiribati','Kuwait','Laos','Lesoto','Letonia','Líbano','Liberia','Libia','Liechtenstein','Lituania','Luxemburgo','Madagascar','Malasia','Malaui','Maldivas','Malí','Malta','Marruecos','Mauricio','Mauritania','México','Micronesia','Moldavia','Mónaco','Mongolia','Montenegro','Mozambique','Namibia','Nauru','Nepal','Nicaragua','Níger','Nigeria','Noruega','Nueva Zelanda','Omán','Países Bajos','Pakistán','Palaos','Panamá','Papúa Nueva Guinea','Paraguay','Perú','Polonia','Portugal','Reino Unido','República Centroafricana','República Checa','República de Macedonia','República del Congo','República Democrática del Congo','República Dominicana','República Sudafricana','Ruanda','Rumanía','Rusia','Samoa','San Cristóbal y Nieves','San Marino','San Vicente y las Granadinas','Santa Lucía','Santo Tomé y Príncipe','Senegal','Serbia','Seychelles','Sierra Leona','Singapur','Siria','Somalia','Sri Lanka','Suazilandia','Sudán','Sudán del Sur','Suecia','Suiza','Surinam','Tailandia','Tanzania','Tayikistán','Timor Oriental','Togo','Tonga','Trinidad y Tobago','Túnez','Turkmenistán','Turquía','Tuvalu','Ucrania','Uganda','Uruguay','Uzbekistán','Vanuatu','Venezuela','Vietnam','Yemen','Yibuti','Zambia','Zimbabue') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chile',
  `idPersona` int(10) UNSIGNED DEFAULT NULL,
  `estado` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `becas`
--

CREATE TABLE `becas` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porcentaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

CREATE TABLE `comunas` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombreComu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigoUnico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idProvincia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comunas`
--

INSERT INTO `comunas` (`id`, `created_at`, `updated_at`, `nombreComu`, `codigoUnico`, `idProvincia`) VALUES
(1, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Arica', '15101', 1),
(2, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Camarones', '15102', 1),
(3, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'General Lagos', '15202', 2),
(4, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Putre', '15201', 2),
(5, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Alto Hospicio', '01107', 3),
(6, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Iquique', '01101', 3),
(7, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Camińa', '01402', 4),
(8, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Colchane', '01403', 4),
(9, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Huara', '01404', 4),
(10, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pica', '01405', 4),
(11, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pozo Almonte', '01401', 4),
(12, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Antofagasta', '02101', 5),
(13, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Mejillones', '02102', 5),
(14, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Sierra Gorda', '02103', 5),
(15, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Taltal', '02104', 5),
(16, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Calama', '02201', 6),
(17, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Ollague', '02202', 6),
(18, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Pedro de Atacama', '02203', 6),
(19, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'María Elena', '02302', 7),
(20, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Tocopilla', '02301', 7),
(21, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chańaral', '03201', 8),
(22, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Diego de Almagro', '03202', 8),
(23, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Caldera', '03102', 9),
(24, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Copiapó', '03101', 9),
(25, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Tierra Amarilla', '03103', 9),
(26, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Alto del Carmen', '03302', 10),
(27, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Freirina', '03303', 10),
(28, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Huasco', '03304', 10),
(29, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Vallenar', '03301', 10),
(30, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Canela', '04202', 11),
(31, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Illapel', '04201', 11),
(32, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Los Vilos', '04203', 11),
(33, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Salamanca', '04204', 11),
(34, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Andacollo', '04103', 12),
(35, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Coquimbo', '04102', 12),
(36, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Higuera', '04104', 12),
(37, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Serena', '04101', 12),
(38, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Paihuano', '04105', 12),
(39, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Vicuńa', '04106', 12),
(40, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Combarbalá', '04302', 13),
(41, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Monte Patria', '04303', 13),
(42, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Ovalle', '04301', 13),
(43, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Punitaqui', '04304', 13),
(44, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Río Hurtado', '04305', 13),
(45, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Isla de Pascua', '05201', 14),
(46, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Calle Larga', '05302', 15),
(47, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Los Andes', '05301', 15),
(48, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Rinconada', '05303', 15),
(49, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Esteban', '05304', 15),
(50, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Ligua', '05401', 16),
(51, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Papudo', '05403', 16),
(52, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Petorca', '05404', 16),
(53, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Zapallar', '05405', 16),
(54, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Hijuelas', '05503', 17),
(55, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Calera', '05502', 17),
(56, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Cruz', '05504', 17),
(57, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Limache', '05802', 17),
(58, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Nogales', '05506', 17),
(59, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Olmué', '05803', 17),
(60, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quillota', '05501', 17),
(61, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Algarrobo', '05602', 18),
(62, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cartagena', '05603', 18),
(63, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'El Quisco', '05604', 18),
(64, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'El Tabo', '0605', 18),
(65, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Antonio', '05601', 18),
(66, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Santo Domingo', '05606', 18),
(67, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Catemu', '05702', 19),
(68, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Llaillay', '05703', 19),
(69, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Panquehue', '05704', 19),
(70, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Putaendo', '05705', 19),
(71, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Felipe', '05701', 19),
(72, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Santa María', '05706', 19),
(73, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Casablanca', '05102', 20),
(74, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Concón', '05103', 20),
(75, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Juan Fernández', '05104', 20),
(76, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Puchuncaví', '05105', 20),
(77, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quilpué', '05801', 20),
(78, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quintero', '05107', 20),
(79, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Valparaíso', '05101', 20),
(80, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Villa Alemana', '05804', 20),
(81, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Vińa del Mar', '05109', 20),
(82, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Colina', '13301', 21),
(83, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lampa', '13302', 21),
(84, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Tiltil', '13303', 21),
(85, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pirque', '13202', 22),
(86, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Puente Alto', '13201', 22),
(87, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San José de Maipo', '13203', 22),
(88, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Buin', '13402', 23),
(89, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Calera de Tango', '13403', 23),
(90, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Paine', '13404', 23),
(91, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Bernardo', '13401', 23),
(92, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Alhué', '13502', 24),
(93, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Curacaví', '13503', 24),
(94, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'María Pinto', '13504', 24),
(95, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Melipilla', '13501', 24),
(96, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Pedro', '13505', 24),
(97, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cerrillos', '13102', 25),
(98, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cerro Navia', '13103', 25),
(99, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Conchalí', '13104', 25),
(100, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'El Bosque', '13105', 25),
(101, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Estación Central', '13106', 25),
(102, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Huechuraba', '13107', 25),
(103, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Independencia', '13108', 25),
(104, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Cisterna', '13109', 25),
(105, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Granja', '13111', 25),
(106, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Florida', '13110', 25),
(107, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Pintana', '13112', 25),
(108, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Reina', '13113', 25),
(109, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Las Condes', '13114', 25),
(110, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lo Barnechea', '13115', 25),
(111, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lo Espejo', '13116', 25),
(112, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lo Prado', '13117', 25),
(113, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Macul', '13118', 25),
(114, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Maipú', '13119', 25),
(115, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Ńuńoa', '13120', 25),
(116, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pedro Aguirre Cerda', '13121', 25),
(117, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Peńalolén', '13122', 25),
(118, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Providencia', '13123', 25),
(119, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pudahuel', '13124', 25),
(120, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quilicura', '13125', 25),
(121, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quinta Normal', '13126', 25),
(122, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Recoleta', '13127', 25),
(123, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Renca', '13128', 25),
(124, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Miguel', '13130', 25),
(125, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Joaquín', '13129', 25),
(126, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Ramón', '13131', 25),
(127, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Santiago', '13101', 25),
(128, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Vitacura', '13132', 25),
(129, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'El Monte', '13602', 26),
(130, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Isla de Maipo', '13603', 26),
(131, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Padre Hurtado', '13604', 26),
(132, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Peńaflor', '13605', 26),
(133, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Talagante', '13601', 26),
(134, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Codegua', '06102', 27),
(135, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Coínco', '06103', 27),
(136, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Coltauco', '06104', 27),
(137, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Dońihue', '06105', 27),
(138, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Graneros', '06106', 27),
(139, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Las Cabras', '06107', 27),
(140, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Machalí', '06108', 27),
(141, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Malloa', '06109', 27),
(142, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Mostazal', '06110', 27),
(143, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Olivar', '06111', 27),
(144, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Peumo', '06112', 27),
(145, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pichidegua', '06113', 27),
(146, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quinta de Tilcoco', '06114', 27),
(147, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Rancagua', '06101', 27),
(148, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Rengo', '06115', 27),
(149, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Requínoa', '06116', 27),
(150, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Vicente de Tagua Tagua', '06117', 27),
(151, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Estrella', '06202', 28),
(152, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Litueche', '06203', 28),
(153, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Marchihue', '06204', 28),
(154, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Navidad', '06205', 28),
(155, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Peredones', '06206', 28),
(156, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pichilemu', '06201', 28),
(157, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chépica', '06302', 29),
(158, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chimbarongo', '06303', 29),
(159, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lolol', '06304', 29),
(160, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Nancagua', '06305', 29),
(161, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Palmilla', '06306', 29),
(162, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Peralillo', '06307', 29),
(163, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Placilla', '06308', 29),
(164, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pumanque', '06309', 29),
(165, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Fernando', '06301', 29),
(166, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Santa Cruz', '06310', 29),
(167, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cauquenes', '07201', 30),
(168, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chanco', '07202', 30),
(169, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pelluhue', '07203', 30),
(170, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Curicó', '07301', 31),
(171, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Hualańé', '07302', 31),
(172, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Licantén', '07303', 31),
(173, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Molina', '07304', 31),
(174, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Rauco', '07305', 31),
(175, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Romeral', '07306', 31),
(176, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Sagrada Familia', '07307', 31),
(177, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Teno', '07308', 31),
(178, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Vichuquén', '07309', 31),
(179, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Colbún', '07402', 32),
(180, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Linares', '07401', 32),
(181, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Longaví', '07403', 32),
(182, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Parral', '07404', 32),
(183, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Retiro', '07405', 32),
(184, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Javier', '07406', 32),
(185, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Villa Alegre', '07407', 32),
(186, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Yerbas Buenas', '07408', 32),
(187, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Constitución', '07102', 33),
(188, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Curepto', '07103', 33),
(189, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Empedrado', '07104', 33),
(190, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Maule', '07105', 33),
(191, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pelarco', '07106', 33),
(192, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pencahue', '07107', 33),
(193, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Río Claro', '07108', 33),
(194, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Clemente', '07109', 33),
(195, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Rafael', '07110', 33),
(196, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Talca', '07101', 33),
(197, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Arauco', '08202', 34),
(198, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cańete', '08203', 34),
(199, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Contulmo', '08204', 34),
(200, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Curanilahue', '08205', 34),
(201, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lebu', '08201', 34),
(202, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Los Álamos', '08206', 34),
(203, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Tirúa', '08207', 34),
(204, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Alto Biobío', '08314', 35),
(205, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Antuco', '08302', 35),
(206, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cabrero', '08303', 35),
(207, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Laja', '08304', 35),
(208, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Los Ángeles', '08301', 35),
(209, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Mulchén', '08305', 35),
(210, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Nacimiento', '08306', 35),
(211, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Negrete', '08307', 35),
(212, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quilaco', '08308', 35),
(213, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quilleco', '08309', 35),
(214, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Rosendo', '08310', 35),
(215, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Santa Bárbara', '08311', 35),
(216, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Tucapel', '08312', 35),
(217, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Yumbel', '08313', 35),
(218, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chiguayante', '08103', 36),
(219, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Concepción', '08101', 36),
(220, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Coronel', '08102', 36),
(221, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Florida', '08104', 36),
(222, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Hualpén', '08112', 36),
(223, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Hualqui', '08105', 36),
(224, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lota', '08106', 36),
(225, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Penco', '08107', 36),
(226, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Pedro de La Paz', '08108', 36),
(227, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Santa Juana', '08109', 36),
(228, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Talcahuano', '08110', 36),
(229, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Tomé', '08111', 36),
(230, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Bulnes', '08402', 37),
(231, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chillán', '08401', 37),
(232, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chillán Viejo', '08406', 37),
(233, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cobquecura', '08403', 37),
(234, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Coelemu', '08404', 37),
(235, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Coihueco', '08405', 37),
(236, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'El Carmen', '08407', 37),
(237, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Ninhue', '08408', 37),
(238, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Ńiquen', '08409', 37),
(239, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pemuco', '08410', 37),
(240, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pinto', '08411', 37),
(241, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Portezuelo', '08412', 37),
(242, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quillón', '08413', 37),
(243, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quirihue', '08414', 37),
(244, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Ránquil', '08415', 37),
(245, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Carlos', '08416', 37),
(246, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Fabián', '08417', 37),
(247, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Ignacio', '08418', 37),
(248, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Nicolás', '08419', 37),
(249, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Treguaco', '08420', 37),
(250, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Yungay', '08421', 37),
(251, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Carahue', '09102', 38),
(252, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cholchol', '09121', 38),
(253, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cunco', '09103', 38),
(254, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Curarrehue', '09104', 38),
(255, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Freire', '09105', 38),
(256, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Galvarino', '09106', 38),
(257, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Gorbea', '09107', 38),
(258, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lautaro', '09108', 38),
(259, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Loncoche', '09109', 38),
(260, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Melipeuco', '09110', 38),
(261, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Nueva Imperial', '09111', 38),
(262, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Padre Las Casas', '09112', 38),
(263, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Perquenco', '09113', 38),
(264, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pitrufquén', '09114', 38),
(265, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Pucón', '09115', 38),
(266, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Saavedra', '09116', 38),
(267, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Temuco', '09101', 38),
(268, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Teodoro Schmidt', '09117', 38),
(269, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Toltén', '09118', 38),
(270, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Vilcún', '09119', 38),
(271, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Villarrica', '09120', 38),
(272, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Angol', '09201', 39),
(273, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Collipulli', '09202', 39),
(274, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Curacautín', '09203', 39),
(275, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Ercilla', '09204', 39),
(276, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lonquimay', '09205', 39),
(277, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Los Sauces', '09206', 39),
(278, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lumaco', '09207', 39),
(279, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Purén', '09208', 39),
(280, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Renaico', '09209', 39),
(281, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Traiguén', '09210', 39),
(282, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Victoria', '09211', 39),
(283, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Corral', '14102', 40),
(284, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lanco', '14103', 40),
(285, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Los Lagos', '14104', 40),
(286, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Máfil', '14105', 40),
(287, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Mariquina', '14106', 40),
(288, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Paillaco', '14107', 40),
(289, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Panguipulli', '14108', 40),
(290, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Valdivia', '14101', 40),
(291, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Futrono', '14202', 41),
(292, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Unión', '14201', 41),
(293, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lago Ranco', '14203', 41),
(294, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Río Bueno', '14204', 41),
(295, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Ancud', '10202', 42),
(296, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Castro', '10201', 42),
(297, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chonchi', '10203', 42),
(298, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Curaco de Vélez', '10204', 42),
(299, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Dalcahue', '10205', 42),
(300, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Puqueldón', '10206', 42),
(301, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Queilén', '10207', 42),
(302, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quemchi', '10209', 42),
(303, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quellón', '10208', 42),
(304, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quinchao', '10210', 42),
(305, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Calbuco', '10102', 43),
(306, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cochamó', '10103', 43),
(307, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Fresia', '10104', 43),
(308, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Frutillar', '10105', 43),
(309, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Llanquihue', '10107', 43),
(310, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Los Muermos', '10106', 43),
(311, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Maullín', '10108', 43),
(312, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Puerto Montt', '10101', 43),
(313, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Puerto Varas', '10109', 43),
(314, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Osorno', '10301', 44),
(315, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Puero Octay', '10302', 44),
(316, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Purranque', '10303', 44),
(317, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Puyehue', '10304', 44),
(318, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Río Negro', '10305', 44),
(319, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Juan de la Costa', '10306', 44),
(320, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Pablo', '10307', 44),
(321, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chaitén', '10401', 45),
(322, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Futaleufú', '10402', 45),
(323, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Hualaihué', '10403', 45),
(324, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Palena', '10404', 45),
(325, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Aisén', '11201', 46),
(326, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cisnes', '11202', 46),
(327, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Guaitecas', '11203', 46),
(328, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cochrane', '11301', 47),
(329, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'O\'higgins', '11302', 47),
(330, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Tortel', '11303', 47),
(331, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Coihaique', '11101', 48),
(332, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Lago Verde', '11102', 48),
(333, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chile Chico', '11401', 49),
(334, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Río Ibáńez', '11402', 49),
(335, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Antártica', '12202', 50),
(336, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cabo de Hornos', '12201', 50),
(337, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Laguna Blanca', '12102', 51),
(338, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Punta Arenas', '12101', 51),
(339, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Río Verde', '12103', 51),
(340, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Gregorio', '12104', 51),
(341, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Porvenir', '12301', 52),
(342, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Primavera', '12302', 52),
(343, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Timaukel', '12303', 52),
(344, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Natales', '12401', 53),
(345, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Torres del Paine', '12402', 53);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idApoderado` int(10) UNSIGNED DEFAULT NULL,
  `urlContrato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlPagare` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlContratoF` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlPagareF` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nroCuotas` int(11) NOT NULL,
  `fechaContrato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `anioAContratar` int(11) NOT NULL,
  `totalAPagar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nivel` int(11) NOT NULL,
  `basicaMedia` enum('Básico','Media') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Básico',
  `arancelAnual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_beca_alumno`
--

CREATE TABLE `detalle_beca_alumno` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idAlumno` int(10) UNSIGNED NOT NULL,
  `idBeca` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idComuna` int(10) UNSIGNED NOT NULL,
  `calle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nroCalle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bloqueTorre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_alumno`
--

CREATE TABLE `ficha_alumno` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ingresoFamiliarM` int(11) NOT NULL,
  `causas` int(11) NOT NULL,
  `nroConvivientes` int(11) NOT NULL,
  `totalHijos` int(11) NOT NULL,
  `nroDeHijo` int(11) NOT NULL,
  `nroHermaIDOP` int(11) NOT NULL,
  `tenenciaVivienda` enum('Arrendatario','Propietario','Allegado','Usufructuario') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Arrendatario',
  `estudiaCon` enum('Padre','Madre','Padrastro','Madrastra','Tutor/Tutura Legal','Hermano/Hermana','Tío/Tía','Tío Abuelo/Tía Abuela','Primo/Prima','Abuelo/Abuela','Bisabuelo/Bisabuela','Tatarabuelo/Tatarabuela','Amigo/Amiga','Otro') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Padre',
  `isapreFonasa` enum('Isapre','Fonasa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Isapre',
  `seguroComple` tinyint(4) NOT NULL DEFAULT '0',
  `enfermedades` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicamentos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `esAlergico` tinyint(4) NOT NULL DEFAULT '0',
  `AlergicoA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `grupoSanguineo` enum('A+','A-','AB+','AB-','B+','B-','O+','O-') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'O+',
  `idAlumno` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `PNombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SNombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TNombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ApPat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ApMat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonoFijo` int(11) DEFAULT NULL,
  `fonoCelu` int(11) DEFAULT NULL,
  `idUser` int(10) UNSIGNED DEFAULT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoPersona` enum('Apoderado','Alumno','Revisor','Secretariado','Administrador','Padre','Madre','PrimerContacto','SegundoContacto','Otro') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Apoderado',
  `genero` enum('Mujer','Hombre') COLLATE utf8mb4_unicode_ci DEFAULT 'Mujer',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechaNacimiento` datetime DEFAULT NULL,
  `fechaDefuncion` datetime DEFAULT NULL,
  `estadoCivil` enum('Soltero/a','Casado/a','Viudo/a','Divorciado/a','Separado/a','Conviviente') COLLATE utf8mb4_unicode_ci DEFAULT 'Soltero/a',
  `idDireccion` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombreProv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigoUnico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idRegion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `created_at`, `updated_at`, `nombreProv`, `codigoUnico`, `idRegion`) VALUES
(1, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Arica', '151', 1),
(2, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Parinacota', '152', 1),
(3, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Iquique', '011', 2),
(4, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'El Tamarugal', '014', 2),
(5, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Antofagasta', '021', 3),
(6, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'El Loa', '022', 3),
(7, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Tocopilla', '023', 3),
(8, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chańaral', '032', 4),
(9, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Copiapó', '031', 4),
(10, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Huasco', '033', 4),
(11, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Choapa', '042', 5),
(12, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Elqui', '041', 5),
(13, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Limarí', '043', 5),
(14, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Isla de Pascua', '052', 6),
(15, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Los Andes', '053', 6),
(16, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Petorca', '054', 6),
(17, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Quillota', '055', 6),
(18, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Antonio', '056', 6),
(19, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'San Felipe de Aconcagua', '057', 6),
(20, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Valparaiso', '051', 6),
(21, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chacabuco', '133', 7),
(22, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cordillera', '132', 7),
(23, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Maipo', '134', 7),
(24, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Melipilla', '135', 7),
(25, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Santiago', '131', 7),
(26, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Talagante', '136', 7),
(27, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cachapoal', '061', 8),
(28, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cardenal Caro', '062', 8),
(29, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Colchagua', '063', 8),
(30, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cauquenes', '072', 9),
(31, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Curicó', '073', 9),
(32, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Linares', '074', 9),
(33, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Talca', '071', 9),
(34, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Arauco', '082', 10),
(35, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Bio Bío', '083', 10),
(36, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Concepción', '081', 10),
(37, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Ńuble', '084', 10),
(38, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Cautín', '091', 11),
(39, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Malleco', '092', 11),
(40, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Valdivia', '141', 12),
(41, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Ranco', '142', 12),
(42, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Chiloé', '102', 13),
(43, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Llanquihue', '101', 13),
(44, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Osorno', '103', 13),
(45, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Palena', '104', 13),
(46, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Aisén', '112', 14),
(47, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Capitán Prat', '113', 14),
(48, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Coihaique', '111', 14),
(49, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'General Carrera', '114', 14),
(50, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Antártica Chilena', '122', 15),
(51, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Magallanes', '121', 15),
(52, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Tierra del Fuego', '123', 15),
(53, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Última Esperanza', '124', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombreReg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regionOrd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigoUnico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `created_at`, `updated_at`, `nombreReg`, `regionOrd`, `codigoUnico`) VALUES
(1, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Arica y Parinacota', 'XV', '15'),
(2, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Tarapacá', 'I', '01'),
(3, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Antofagasta', 'II', '02'),
(4, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Atacama', 'III', '03'),
(5, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Coquimbo', 'IV', '04'),
(6, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Valparaiso', 'V', '05'),
(7, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Metropolitana de Santiago', 'RM', '13'),
(8, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Libertador General Bernardo O\'Higgins', 'VI', '06'),
(9, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Maule', 'VII', '07'),
(10, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Biobío', 'VIII', '08'),
(11, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'La Araucanía', 'IX', '09'),
(12, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Los Ríos', 'XIV', '14'),
(13, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Los Lagos', 'X', '10'),
(14, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Aisén del General Carlos Ibáńez del Campo', 'XI', '11'),
(15, '2018-09-13 03:00:00', '2018-09-13 03:00:00', 'Magallanes y de la Antártica Chilena', 'XII', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repitencias`
--

CREATE TABLE `repitencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idAlumno` int(10) UNSIGNED NOT NULL,
  `idCurso` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_rol`
--

CREATE TABLE `user_rol` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idRol` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumnos_idpersona_foreign` (`idPersona`),
  ADD KEY `alumnos_idapoderado_foreign` (`idApoderado`),
  ADD KEY `alumnos_idcursoactual_foreign` (`idCursoActual`),
  ADD KEY `alumnos_idcursopostu_foreign` (`idCursoPostu`);

--
-- Indices de la tabla `alumno_responsable`
--
ALTER TABLE `alumno_responsable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_responsable_idpersona_foreign` (`idPersona`),
  ADD KEY `alumno_responsable_idalumno_foreign` (`idAlumno`);

--
-- Indices de la tabla `apoderados`
--
ALTER TABLE `apoderados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apoderados_idpersona_foreign` (`idPersona`);

--
-- Indices de la tabla `becas`
--
ALTER TABLE `becas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comunas_id_unique` (`id`),
  ADD KEY `comunas_idprovincia_foreign` (`idProvincia`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contratos_idapoderado_foreign` (`idApoderado`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_beca_alumno`
--
ALTER TABLE `detalle_beca_alumno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_beca_alumno_idalumno_foreign` (`idAlumno`),
  ADD KEY `detalle_beca_alumno_idbeca_foreign` (`idBeca`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `direcciones_idcomuna_foreign` (`idComuna`);

--
-- Indices de la tabla `ficha_alumno`
--
ALTER TABLE `ficha_alumno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ficha_alumno_idalumno_unique` (`idAlumno`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personas_iduser_foreign` (`idUser`),
  ADD KEY `personas_iddireccion_foreign` (`idDireccion`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provincias_id_unique` (`id`),
  ADD KEY `provincias_idregion_foreign` (`idRegion`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regiones_id_unique` (`id`);

--
-- Indices de la tabla `repitencias`
--
ALTER TABLE `repitencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repitencias_idalumno_foreign` (`idAlumno`),
  ADD KEY `repitencias_idcurso_foreign` (`idCurso`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_rol`
--
ALTER TABLE `user_rol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_rol_iduser_foreign` (`idUser`),
  ADD KEY `user_rol_idrol_foreign` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alumno_responsable`
--
ALTER TABLE `alumno_responsable`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apoderados`
--
ALTER TABLE `apoderados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `becas`
--
ALTER TABLE `becas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_beca_alumno`
--
ALTER TABLE `detalle_beca_alumno`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ficha_alumno`
--
ALTER TABLE `ficha_alumno`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `repitencias`
--
ALTER TABLE `repitencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_rol`
--
ALTER TABLE `user_rol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_idapoderado_foreign` FOREIGN KEY (`idApoderado`) REFERENCES `apoderados` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumnos_idcursoactual_foreign` FOREIGN KEY (`idCursoActual`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumnos_idcursopostu_foreign` FOREIGN KEY (`idCursoPostu`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumnos_idpersona_foreign` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `alumno_responsable`
--
ALTER TABLE `alumno_responsable`
  ADD CONSTRAINT `alumno_responsable_idalumno_foreign` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_responsable_idpersona_foreign` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `apoderados`
--
ALTER TABLE `apoderados`
  ADD CONSTRAINT `apoderados_idpersona_foreign` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD CONSTRAINT `comunas_idprovincia_foreign` FOREIGN KEY (`idProvincia`) REFERENCES `provincias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_idapoderado_foreign` FOREIGN KEY (`idApoderado`) REFERENCES `apoderados` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle_beca_alumno`
--
ALTER TABLE `detalle_beca_alumno`
  ADD CONSTRAINT `detalle_beca_alumno_idalumno_foreign` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalle_beca_alumno_idbeca_foreign` FOREIGN KEY (`idBeca`) REFERENCES `becas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_idcomuna_foreign` FOREIGN KEY (`idComuna`) REFERENCES `comunas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ficha_alumno`
--
ALTER TABLE `ficha_alumno`
  ADD CONSTRAINT `ficha_alumno_idalumno_foreign` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_iddireccion_foreign` FOREIGN KEY (`idDireccion`) REFERENCES `direcciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personas_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `provincias_idregion_foreign` FOREIGN KEY (`idRegion`) REFERENCES `regiones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `repitencias`
--
ALTER TABLE `repitencias`
  ADD CONSTRAINT `repitencias_idalumno_foreign` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `repitencias_idcurso_foreign` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_rol`
--
ALTER TABLE `user_rol`
  ADD CONSTRAINT `user_rol_idrol_foreign` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_rol_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
