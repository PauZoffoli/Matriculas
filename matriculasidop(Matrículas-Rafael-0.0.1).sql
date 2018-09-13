-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-09-2018 a las 14:54:30
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
  `nombreComu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigoUnico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idProvincia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idTipo` int(10) UNSIGNED NOT NULL,
  `idPersona` int(10) UNSIGNED NOT NULL
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
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_persona_idtipo_foreign` (`idTipo`),
  ADD KEY `tipo_persona_idpersona_foreign` (`idPersona`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
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
-- Filtros para la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD CONSTRAINT `tipo_persona_idpersona_foreign` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tipo_persona_idtipo_foreign` FOREIGN KEY (`idTipo`) REFERENCES `tipos` (`id`) ON DELETE CASCADE;

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
